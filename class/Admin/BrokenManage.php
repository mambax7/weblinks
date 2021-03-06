<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: broken_manage.php,v 1.7 2007/11/11 09:23:10 ohwada Exp $

// 2007-11-01 K.OHWADA
// link_vote_del_handler
// set_flag_execute_time()

// 2007-09-20 K.OHWADA
// Fatal error: Class 'weblinks_link_edit_base_handler' not found
// admin_header_link.php

// 2007-02-20 K.OHWADA
// hack for multi site

// 2006-09-20 K.OHWADA
// use happy_linux
// use XoopsGTicket

// 2006-05-15 K.OHWADA
// new handler
// add class BrokenManage
// use token ticket

// 2006-03-22 K.OHWADA
// new handler: broken

// 2005-10-14 K.OHWADA
// BUG 3095: the number of links does not change, if delete link
// use del_link_vote_comm_catlink_by_lid($lid)

// 2005-09-04 K.OHWADA
// BUG 2932: dont work correctly when register_long_arrays = off

//================================================================
// WebLinks Module
// 2006-09-01 K.OHWADA
//================================================================


//=========================================================
// class BrokenManage
//=========================================================
class BrokenManage extends Happylinux\Manage
{
    public $_link_vote_handler;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct(WEBLINKS_DIRNAME);
        $this->set_handler('broken', WEBLINKS_DIRNAME, 'weblinks');
        $this->set_id_name('bid');
        $this->set_form_class(BrokenForm::class);
        $this->set_script('broken_manage.php');
        $this->set_redirect('broken_list.php', 'broken_list.php?sortid=1');
        $this->set_list_id_name('broken_id');
        $this->set_flag_execute_time(true);

        $this->_link_vote_handler = weblinks_get_handler('LinkVoteDel', WEBLINKS_DIRNAME);

        $this->set_debug_check_token(false);
        $this->_handler->set_debug_delete(false);
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
    // POST
    //---------------------------------------------------------
    public function get_post_bid()
    {
        return $this->_post->get_post_get_int('bid');
    }

    public function get_post_lid()
    {
        return $this->_post->get_post_get_int('lid');
    }

    //---------------------------------------------------------
    // main_mod_form()
    //---------------------------------------------------------
    public function mod_form()
    {
        $this->_main_mod_form();
    }

    //---------------------------------------------------------
    // main_mod_table()
    //---------------------------------------------------------
    public function mod_table()
    {
        $this->_main_mod_table(true);
    }

    //---------------------------------------------------------
    // main_del_table()
    //---------------------------------------------------------
    public function del_table()
    {
        if (!$this->_get_obj()) {
            redirect_header('broken_list.php', 3, $this->_LANG_ERR_NO_RECORD);
            exit();
        }

        if (!$this->_check_token()) {
            redirect_header('broken_list.php', 3, 'Token Error');
            exit();
        }

        if ($this->_exec_del_table()) {
            redirect_header('broken_list.php', 1, _WLS_BROKENDELETED);
            exit();
        }
        $this->_print_del_db_error();
        exit();
    }

    public function _exec_del_table()
    {
        $lid = $this->_obj->get('lid');

        $ret = $this->_handler->delete_by_lid($lid);
        if (!$ret) {
            $this - _set_errors($this->_handler->getErrors());

            return false;
        }

        return true;
    }

    public function _print_del_db_error()
    {
        $this->_print_cp_header();
        $this->_bread($this->_LANG_TITLE_DEL);
        xoops_error('DB Error');
        $this->_print_error();
        $this->_print_cp_footer();
    }

    //---------------------------------------------------------
    // del_all
    //---------------------------------------------------------
    public function del_all()
    {
        $this->_clear_errors();

        if (!$this->_check_token()) {
            redirect_header('broken_list.php', 3, 'Token Error');
            exit();
        }

        if ($this->_exec_del_all()) {
            redirect_header('broken_list.php', 1, _WLS_BROKENDELETED);
            exit();
        }
        $this->_print_del_db_error();
        exit();
    }

    public function _exec_del_all()
    {
        $id_arr = $this->_get_post_list_id();

        if (!is_array($id_arr) || (0 == count($id_arr))) {
            return true;
        }

        foreach ($id_arr as $id) {
            $this->_id = $id;
            $this->_obj = &$this->_handler->get($id);

            if (!is_object($this->_obj)) {
                continue;
            }

            $this->_exec_del_table();
        }

        return $this->returnExistError();
    }

    //---------------------------------------------------------
    // del_by_link
    //---------------------------------------------------------
    public function del_by_link()
    {
        if (!$this->_check_token()) {
            redirect_header('broken_list.php', 5, 'Token Error');
            exit();
        }

        if ($this->_exec_del_by_link()) {
            redirect_header('broken_list.php', 1, _WLS_BROKENDELETED);
            exit();
        }
        $this->_print_del_db_error();
        exit();

        $this->_main_del_table();
    }

    public function _exec_del_by_link()
    {
        $lid = $this->get_post_lid();

        $ret = $this->_handler->delete_by_lid($lid);
        if (!$ret) {
            $this - _set_errors($this->_handler->getErrors());

            return false;
        }

        return true;
    }

    //---------------------------------------------------------
    // delBrokenLinks
    //---------------------------------------------------------
    public function del_link()
    {
        if (!$this->_check_token()) {
            redirect_header('broken_list.php', 3, 'Token Error');
            exit();
        }

        if ($this->_exec_del_link()) {
            redirect_header('broken_list.php', 1, _WLS_LINKDELETED);
            exit();
        }
        $this->_print_del_db_error();
        exit();
    }

    public function _exec_del_link()
    {
        $this->_clear_errors();

        $lid = $this->get_post_lid();

        $ret = $this->_handler->delete_by_lid($lid);
        if (!$ret) {
            $this->_set_errors($this->_handler->getErrors());
        }

        // BUG 3095: the number of links does not change, if delete link
        $ret = $this->_link_vote_handler->del_link_vote_comm_catlink_by_lid($lid);
        if (!$ret) {
            $this->_set_errors($this->_link_vote_handler->getErrors());
        }

        return $this->returnExistError();
    }

    // --- class end ---
}
