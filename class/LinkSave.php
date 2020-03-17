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
if (!class_exists('LinkSave')) {

    //=========================================================
    // class LinkSave
    //=========================================================
    class LinkSave extends Link
    {
        public $_banner_handler;
        public $_pagerank_handler;
        public $_link_validate;

        public $_search_list;

        // result
        public $_banner_error_code = 0;
        public $_banner_errors = null;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            parent::__construct();

            $this->_banner_handler = weblinks_get_handler('Banner', $dirname);
            $this->_pagerank_handler = weblinks_get_handler('Pagerank', $dirname);
            $this->_link_validate = LinkValidate::getInstance($dirname);

            // BUG : not set search field
            $this->_link_validate->init();

            $this->_search_list = &$this->_link_validate->get_search_list();
        }

        //---------------------------------------------------------
        // assign add object
        // $_POST or bulk
        //---------------------------------------------------------
        public function assign_add_object(&$post, $not_gpc = false, $flag_banner = false, $flag_pagerank = false)
        {
            $this->_set_vars_common($post, $not_gpc);

            // set object
            $this->set_object_with_validater();

            // time
            $time = time();
            $this->setVar('time_create', $time);
            $this->setVar('time_update', $time);

            // passwd
            $this->setVar('passwd', $this->_link_validate->get_passwd_md5_new($post));

            // banner
            if ($flag_banner) {
                $this->_set_obj_banner_size();
            }

            if ($flag_pagerank) {
                $this->_set_obj_pagerank();
            }

            // search
            $this->_set_obj_search($post);
        }

        //---------------------------------------------------------
        // assign mod object
        // $_POST or bulk
        //---------------------------------------------------------
        public function assign_mod_object(&$post, $not_gpc = false, $flag_banner = false, $flag_pagerank = false)
        {
            $this->_set_vars_common($post, $not_gpc);

            // time_update
            $this->set_validater_value_allow_by_array($this->get_value_allow_type_time_update_form_post($post, 'time_update'));

            // passwd
            $this->set_validater_value_allow_by_array($this->_link_validate->get_passwd_md5_mod_array($post));

            // rssc_lid
            $this->set_validater_value_allow_by_array($this->get_value_allow_type_int_with_flag_update_from_post($post, 'rssc_lid'));

            // set object
            $this->set_object_with_validater();

            // banner
            if ($flag_banner) {
                $this->_set_obj_banner_size();
            }

            if ($flag_pagerank) {
                $this->_set_obj_pagerank();
            }

            // search
            $this->_set_obj_search($post);
        }

        //---------------------------------------------------------
        // get parameter
        //---------------------------------------------------------
        public function get_banner_error_code()
        {
            return $this->_banner_error_code;
        }

        public function get_banner_errors()
        {
            return $this->_banner_errors;
        }

        //---------------------------------------------------------
        // assign vars
        //---------------------------------------------------------
        public function _set_vars_common($post, $not_gpc = false)
        {
            $this->set_validater_name_prefix('weblinks');

            $this->set_validater_conf_array($this->_link_validate->get_conf_array());
            $this->merge_validater_allow_list($this->_link_validate->get_allow_list());

            // post value
            $this->merge_validater_value_list($this->validate_values_from_post($post, $not_gpc));

            // uid
            $this->set_validater_value_allow_by_array($this->_link_validate->get_uid_array($post));
        }

        //---------------------------------------------------------
        // banner size field
        // presuppose to execute set_object_with_validater()
        //---------------------------------------------------------
        public function _set_obj_banner_size()
        {
            $banner = $this->get('banner');

            // return size zero, if not banner
            $size = &$this->_banner_handler->get_remote_banner_size($banner);

            if (is_array($size) && isset($size[0]) && isset($size[1])) {
                $this->setVar('width', $size[0]);
                $this->setVar('height', $size[1]);
            } elseif (!$size) {
                $this->_banner_error_code = $this->_banner_handler->getErrorCode();
                $this->_banner_errors = $this->_banner_handler->getErrors();
            }
        }

        //---------------------------------------------------------
        // pagerank field
        // presuppose to execute set_object_with_validater()
        //---------------------------------------------------------
        public function _set_obj_pagerank()
        {
            $pr = $this->_pagerank_handler->get_page_rank_from_google($this->get('url'), $this->get('pagerank'));

            $this->setVar('pagerank', $pr);
            $this->setVar('pagerank_update', time());
        }

        //---------------------------------------------------------
        // search field
        // presuppose to execute set_object_with_validater()
        //---------------------------------------------------------
        public function _set_obj_search($post)
        {
            $cid_arr = &$this->get_cid_array_form_post($post);
            $search = $this->build_search($cid_arr);
            $this->setVar('search', $search);
        }

        // for import_manege
        public function build_search($cid_arr)
        {
            $text = '';
            foreach ($this->gets() as $k => $v) {
                if (isset($this->_search_list[$k]) && $this->_search_list[$k]) {
                    $text .= $v . ' ';
                }
            }
            $text .= $this->name_disp('n') . ' ';
            $text .= $this->mail_disp('n') . ' ';
            $text .= $this->_strip_tags($this->description_disp(false)) . ' ';
            $text .= $this->_strip_tags($this->textarea1_disp(false)) . ' ';
            $text .= $this->_strip_tags($this->textarea2_disp(false)) . ' ';
            $text .= $this->_link_validate->build_search_category($cid_arr) . ' ';

            $search = preg_replace("/\n|\r/", ' ', $text);

            return $search;
        }

        public function _strip_tags($str)
        {
            return strip_tags(happy_linux_str_add_space_after_tag($str));
        }

        // --- class end ---
    }
}
