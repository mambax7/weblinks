<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// $Id: weblinks_modify.php,v 1.3 2012/04/10 03:54:50 ohwada Exp $

// 2012-04-02 K.OHWADA
// gm_icon

// 2008-02-17 K.OHWADA
// pagerank, pagerank_update in link, modify

// 2007-09-10 K.OHWADA
// user can delete link
// assign_add_object()

// 2007-09-01 K.OHWADA
// BUG 4690: not set rss_url in modify table
// notification to each category
// $_cid_array;

// 2007-08-01 K.OHWADA
// admin can add etc column

// 2007-04-08 K.OHWADA
// gm_type

// 2007-03-25 K.OHWADA
// album_id

// 2007-02-20 K.OHWADA
// add forum_id comment_use field

// 2006-12-10 K.OHWADA
// move from modify_handler
// add modify_save class
// add time_publish textarea1

//=========================================================
// WebLinks Module
// this file contain 2 class
//   weblinks_modify
//   weblinks_modify_save
// 2006-12-10 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('ModifySave')) {

    //=========================================================
    // class weblinks_modify_save
    //=========================================================
    class ModifySave extends Modify
    {
        public $_link_validate;
        public $_linkitem_define_handler;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            parent::__construct();

            $this->_link_validate = LinkValidate::getInstance($dirname);
            $this->_linkitem_define_handler = weblinks_get_handler('LinkitemDefine', $dirname);
        }

        //---------------------------------------------------------
        // assign add object
        // $_POST or bulk
        //---------------------------------------------------------
        // mode 0: add, 1:mod, 2:del
        public function assign_add_object($post, $mode = 0)
        {
            // delete
            if (2 == $mode) {
                $this->set('mode', $mode);
                $this->set('muid', $this->_xoops_uid);
                $this->setVar('notify', $post['notify']);
                $this->setVar('usercomment', $post['reason']);

                return;
            }

            // muid
            $this->set_validater_value_allow('muid', $this->_xoops_uid, true);

            $this->set_validater_name_prefix('weblinks');

            $this->_link_validate->init();
            $this->set_validater_conf_array($this->_link_validate->get_conf_array());

            $this->merge_validater_allow_list($this->_link_validate->get_allow_list());
            $this->set_validater_allow_true('notify');

            // BUG 4690: not set rss_url in modify table
            if ($this->_linkitem_define_handler->get_by_name('rss_url', 'user_mode') > 0) {
                $this->set_validater_allow_true('rss_url');
                $this->set_validater_allow_true('rss_flag');
            }

            // post value
            $this->merge_validater_value_list($this->validate_values_from_post($post));

            // mode
            $this->set_validater_value_allow('mode', $mode, true);

            // muid
            $this->set_validater_value_allow('muid', $this->_xoops_uid, true);

            // time
            $time = time();
            $this->set_validater_value_allow('time_update', $time, true);

            // mode
            if ($mode) {
                $uid = $this->get_int_xoops_uid($post, 'uid');
                $this->set_validater_value_allow('uid', $uid, true);
                $this->set_validater_value_allow_by_array($this->_link_validate->get_passwd_md5_mod_array($post));
            } else {
                $this->set_validater_value_allow('uid', $this->_xoops_uid, true);
                $this->set_validater_value_allow('time_create', $time, true);
                $this->set_validater_value_allow_by_array($this->_link_validate->get_passwd_md5_new_array($post));
            }

            $this->set_object_with_validater();

            // cid array
            $cid_arr = &$this->get_cid_array_form_post($post);
            $this->set_cids_by_cid_array($cid_arr);
        }

        // --- class end ---
    }
    // === class end ===
}
