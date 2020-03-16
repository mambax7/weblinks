<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: votedata_manage.php,v 1.3 2007/11/11 03:22:59 ohwada Exp $

// 2007-11-01 K.OHWADA
// set_flag_execute_time()

// 2007-02-20 K.OHWADA
// hack for multi site

// 2006-09-20 K.OHWADA
// this new file

//================================================================
// WebLinks Module
// 2006-09-20 K.OHWADA
//================================================================
include 'admin_header.php';

//=========================================================
// class black manage
//=========================================================
class VotedataManage extends Happylinux\Manage
{
    public $_link_handler;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct(WEBLINKS_DIRNAME);
        $this->set_handler('votedata', WEBLINKS_DIRNAME, 'weblinks');
        $this->set_id_name('ratingid');
        $this->set_form_class(VotedataForm::class);
        $this->set_script('votedata_manage.php');
        $this->set_redirect('votedata_list.php', 'votedata_list.php?sortid=1');
        $this->set_flag_execute_time(true);

        $this->_link_handler = weblinks_get_handler('Link', WEBLINKS_DIRNAME);
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
    // POST GET parameter
    //---------------------------------------------------------
    public function _get_post_list_id()
    {
        $arr = false;
        if (isset($_POST['votedata_id'])) {
            $arr = $_POST['votedata_id'];
        } elseif (isset($_POST['votedata_user_id'])) {
            $arr = $_POST['votedata_user_id'];
        } elseif (isset($_POST['votedata_anoymous_id'])) {
            $arr = $_POST['votedata_anoymous_id'];
        }
        $this->_list_id = $arr;

        return $this->_list_id;
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
        $this->_main_mod_table();
    }

    public function _check_mod_table()
    {
        return true;
    }

    //---------------------------------------------------------
    // main_del_table()
    //---------------------------------------------------------
    public function del_table()
    {
        $this->_clear_errors();
        $this->_main_del_table();
    }

    public function _exec_del_table()
    {
        $ret = $this->_handler->delete($this->_obj);
        if (!$ret) {
            $this->_set_errors($this->_handler->getErrors());
        }

        $lid = $this->_obj->get('lid');
        list($finalrating, $votesDB) = $this->_handler->calc_rating_by_lid($lid);

        $ret = $this->_link_handler->update_rating($lid, $finalrating, $votesDB);
        if (!$ret) {
            $this->_set_errors($this->_link_handler->getErrors());
        }

        return $this->returnExistError();
    }

    public function _check_del_table()
    {
        return true;
    }

    //---------------------------------------------------------
    // del_all
    //---------------------------------------------------------
    public function del_all()
    {
        $this->_main_del_all();
    }

    public function _exec_del_all_each()
    {
        $this->_exec_del_table();
    }

    public function _check_del_all()
    {
        return true;
    }

    // --- class end ---
}
