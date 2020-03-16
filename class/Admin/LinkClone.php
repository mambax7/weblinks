<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: link_clone_class.php,v 1.2 2007/11/11 03:22:59 ohwada Exp $

// 2007-11-01 K.OHWADA
// set_edit_handler()

//=========================================================
// WebLinks Module
// 2007-09-10 K.OHWADA
//=========================================================

//=========================================================
// class LinkClone
//=========================================================
class LinkClone extends LinkBase
{
    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct();
        $this->set_edit_handler('LinkAdd');
    }

    public static function getInstance()
    {
        static $instance;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

    //---------------------------------------------------------
    // clone_link
    //---------------------------------------------------------
    public function clone_link()
    {
        $lid = $this->get_post_lid();

        if (!$this->_get_obj()) {
            redirect_header('link_list.php', 3, _WLS_ERRORNOLINK);
            exit();
        }

        if (!$this->_check_token() || !$this->_check_clone_link()) {
            $this->_print_clone_preview();
            exit();
        }

        if ($this->_exec_clone_link($lid)) {
            // finish
            $url = $this->_build_url_mod_form($this->_newid);
            $com = 'admin clone link [' . $this->_newid . ']';
            $msg = _WLS_NEWLINKADDED;
            $msg .= $this->_build_comment($com);  // for test form
            redirect_header($url, 1, $msg);
            exit();
        }
        $this->_print_clone_db_error();
        exit();
    }

    public function _exec_clone_link($lid)
    {
        $newid = $this->_edit_handler->admin_clone_link($lid);
        if (!$newid) {
            $this->_set_errors($this->_edit_handler->getErrors());

            return false;
        }

        $this->_newid = $newid;

        return $newid;
    }

    public function _check_clone_link()
    {
        return true;
    }

    public function _print_clone_preview()
    {
        $this->_print_cp_header();
        $this->_print_bread_op($this->_LANG_TITLE_MOD, 'mod_form');
        $this->_print_title($this->_LANG_TITLE_MOD);
        $this->_print_token_error(1);

        $this->_form->show_admin_form('modify_preview');

        $this->_print_cp_footer();
    }

    public function _print_clone_db_error()
    {
        return $this->_print_add_db_error();
    }

    public function _build_url_mod_form($lid)
    {
        $url = 'link_manage.php?op=mod_form&amp;lid=' . $lid;

        return $url;
    }

    //---------------------------------------------------------
    // clone_module
    //---------------------------------------------------------
    public function clone_module()
    {
        $lid = $this->get_post_lid();

        if (!$this->_get_obj()) {
            redirect_header('link_list.php', 3, _WLS_ERRORNOLINK);
            exit();
        }

        if (!$this->_check_token() || !$this->_check_clone_link()) {
            $this->_print_clone_preview();
            exit();
        }

        $this->_print_cp_header();
        $this->_print_bread_op($this->_LANG_TITLE_MOD, 'mod_form');
        $this->_print_title($this->_LANG_TITLE_MOD);

        $this->_form->show_admin_clone_module_form($lid);

        $this->_print_cp_footer();
    }

    //---------------------------------------------------------
    // clone_module
    //---------------------------------------------------------
    public function clone_module_to()
    {
        $lid = $this->get_post_lid();
        $dirname = $this->_post->get_post_text('dirname');

        if (!$this->_check_token()) {
            $this->_print_clone_preview();
            exit();
        }

        if (empty($lid) || empty($dirname)) {
            $this->_print_clone_preview();
            exit();
        }

        $this->_print_cp_header();
        $this->_print_bread_op($this->_LANG_TITLE_MOD, 'mod_form');
        $this->_print_title($this->_LANG_TITLE_MOD);

        $this->_form->show_admin_clone_module_confirm_form($lid, $dirname);

        $this->_print_cp_footer();
    }

    //---------------------------------------------------------
    // clone_module_from
    //---------------------------------------------------------
    public function clone_module_from()
    {
        $from = $this->_post->get_post_get_int('from');
        $lid = $this->get_post_lid();

        if (!$this->_check_token()) {
            redirect_header('link_list.php', 3, _WLS_ERRORNOLINK);
            exit();
        }

        if ($this->_exec_clone_module_from($from, $lid)) {
            // finish
            $url = $this->_build_url_mod_form($this->_newid);
            $com = 'admin clone module from [' . $this->_newid . ']';
            $msg = _WLS_NEWLINKADDED;
            $msg .= $this->_build_comment($com);  // for test form
            redirect_header($url, 1, $msg);
            exit();
        }
        $this->_print_clone_module_from_db_error();
        exit();
    }

    public function _exec_clone_module_from($from, $lid)
    {
        $newid = $this->_edit_handler->admin_clone_module_from($from, $lid);
        if (!$newid) {
            $this->_set_errors($this->_edit_handler->getErrors());

            return false;
        }

        $this->_newid = $newid;

        return $newid;
    }

    public function _print_clone_module_from_db_error()
    {
        return $this->_print_add_db_error();
    }

    // --- class end ---
}
