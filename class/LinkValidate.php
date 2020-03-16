<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// $Id: weblinks_link.php,v 1.3 2012/04/10 03:54:50 ohwada Exp $

// 2012-04-02 K.OHWADA
// gm_icon

// 2008-02-17 K.OHWADA
// pagerank, pagerank_update in link, modify
// _set_obj_pagerank();

// change assign_mod_object() clear pagerank update time

// 2007-12-24 K.OHWADA
// BUG : not set search field

// 2007-11-24 K.OHWADA
// _strip_tags()

// 2007-11-01 K.OHWADA
// weblinks_auth
// BUG : not set password
// WEBLINKS_OP_APPROVE_NEW

// 2007-09-10 K.OHWADA
// check_public()

// 2007-09-01 K.OHWADA
// notification to each category
// description_short()

// 2007-08-01 K.OHWADA
// admin can add etc column

// 2007-05-06 K.OHWADA
// BUG 4565: cannot show user manage, when too many links or users
// change user_name() user_mail()

// 2007-04-08 K.OHWADA
// gm_type

// 2007-03-25 K.OHWADA
// album_id

// 2007-03-01 K.OHWADA
// add forum_id comment_use field
// BUG: admin approve wrong password when guest submit
// BUG: cannot use bbcode in admincomment

// 2006-12-10 K.OHWADA
// add link_save class
// use happy_linux_object_validater
// add time_publish textarea1

// 2006-10-12 K.OHWADA
// BUG 4318: cannot register bulk links.
// add set_not_gpc()

// 2006-10-01 K.OHWADA
// divided from weblinks_link_handler
// google map
// change addr_urlencode()

//=========================================================
// WebLinks Module
// this file contain 4 class
//   LinkBase
//   weblinks_link
//   LinkSave
//   LinkValidate
// 2006-09-20 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('LinkValidate')) {

    //=========================================================
    // class LinkValidate
    //=========================================================
    class LinkValidate
    {
        public $_config_handler;
        public $_category_handler;
        public $_linkitem_define_handler;
        public $_auth;
        public $_system;
        public $_post;

        // local
        public $_conf;
        public $_xoops_uid;
        public $_is_xoops_module_admin;
        public $_is_xoops_guest;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            $this->_config_handler = weblinks_get_handler('Config2Basic', $dirname);
            $this->_category_handler = handler('Category', $dirname);
            $this->_linkitem_define_handler = weblinks_get_handler('LinkitemDefine', $dirname);
            $this->_auth = Auth::getInstance($dirname);

            $this->_system = Happylinux\System::getInstance();
            $this->_post = Happylinux\Post::getInstance();

            $this->_conf = &$this->_config_handler->get_conf();

            $this->_xoops_uid = $this->_system->get_uid();
            $this->_is_xoops_module_admin = $this->_system->is_module_admin();
            $this->_is_xoops_guest = $this->_system->is_guest();
        }

        public static function getInstance($dirname = null)
        {
            static $instance;
            if (null === $instance) {
                $instance = new static($dirname);
            }

            return $instance;
        }

        //---------------------------------------------------------
        // config
        //---------------------------------------------------------
        public function init()
        {
            $this->_linkitem_define_handler->load();
        }

        public function &get_conf_array()
        {
            $arr = &$this->_linkitem_define_handler->get_cached_by_name();

            return $arr;
        }

        public function &get_allow_list()
        {
            $arr1 = &$this->_linkitem_define_handler->get_save_mode_list();
            $arr2 = &$this->_auth->has_auth_desc_option();
            $arr3 = array_merge($arr1, $arr2);

            return $arr3;
        }

        public function &get_search_list()
        {
            $arr = &$this->_linkitem_define_handler->get_search_list();

            return $arr;
        }

        //---------------------------------------------------------
        // xoops param
        //---------------------------------------------------------
        public function get_xoops_uid()
        {
            return $this->_xoops_uid;
        }

        public function is_xoops_module_admin()
        {
            return $this->_is_xoops_module_admin;
        }

        public function is_xoops_guest()
        {
            return $this->_is_xoops_guest;
        }

        //---------------------------------------------------------
        // uid field
        //---------------------------------------------------------
        public function get_uid_array($post)
        {
            $uid = $this->get_uid($post);

            return ['uid', $uid, true];
        }

        public function get_uid($post)
        {
            // default: submitter
            $uid = $this->get_xoops_uid();

            // if admin
            if ($this->is_xoops_module_admin() && isset($post['uid'])) {
                $uid = (int)$post['uid'];
            }

            return $uid;
        }

        //---------------------------------------------------------
        // passwd field
        //---------------------------------------------------------
        public function get_passwd_md5_new_array($post)
        {
            $passwd = $this->get_passwd_md5_new($post);

            return ['passwd', $passwd, 'true'];
        }

        public function get_passwd_md5_new($post)
        {
            // admin or guest specify
            if ($this->_has_passwd() && isset($post['passwd_new']) && $post['passwd_new']) {
                $passwd = $this->_post->get_text_from_post($post, 'passwd_new');
                $passwd = md5($passwd);
            }

            // admin approve new link
            // BUG : not set password
            elseif ($this->_is_approve_passwd($post, WEBLINKS_OP_APPROVE_NEW)) {
                $passwd = $this->_post->get_text_from_post($post, 'passwd_md5');
            }

            // default
            if (empty($passwd)) {
                $passwd = md5(xoops_makepass());
            }

            return $passwd;
        }

        public function get_passwd_md5_mod_array($post)
        {
            // default
            $passwd = '';
            $allow = false;

            // admin or guest specify
            if ($this->_has_passwd() && isset($post['passwd_new']) && $post['passwd_new']) {
                $passwd = $this->_post->get_text_from_post($post, 'passwd_new');
                $passwd = md5($passwd);
                $allow = true;
            } // admin approve mod link
            elseif ($this->_is_approve_passwd($post, WEBLINKS_OP_APPROVE_MOD)) {
                $passwd = $this->_post->get_text_from_post($post, 'passwd_md5');
                $allow = true;
            }

            return ['passwd', $passwd, $allow];
        }

        public function _is_approve_passwd($post, $op)
        {
            // BUG: admin approve wrong password when guest submit
            if ($this->is_xoops_module_admin()
                && isset($post['op'])
                && ($post['op'] == $op)
                && isset($post['passwd_md5'])
                && $post['passwd_md5']) {
                return true;
            }

            return false;
        }

        public function _has_passwd()
        {
            // admin
            if ($this->is_xoops_module_admin()) {
                return true;
            }
            // use passwd & guest
            if ($this->_conf['use_passwd'] && $this->is_xoops_guest()) {
                return true;
            }

            return false;
        }

        //---------------------------------------------------------
        // search field
        //---------------------------------------------------------
        public function build_search_category($cid_arr)
        {
            $search = '';
            if (is_array($cid_arr)) {
                foreach ($cid_arr as $cid) {
                    $path_array = $this->_category_handler->get_parent_path($cid);
                    foreach ($path_array as $path) {
                        $search .= $path['title'] . ' ';
                    }
                }
            }

            return $search;
        }

        // --- class end ---
    }
    // === class end ===
}
