<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: modify_del_class.php,v 1.2 2007/11/11 03:22:59 ohwada Exp $

// 2007-11-01 K.OHWADA
// set_edit_handler()
// WEBLINKS_OP_APPROVE_DEL

//=========================================================
// admin modify
// 2007-09-10 K.OHWADA
//=========================================================

//=========================================================
// class ModifyDel
//=========================================================
class ModifyDel extends ModifyBase
{
    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct();
        $this->set_edit_handler('LinkDel');
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
    // list delete Request
    //---------------------------------------------------------
    public function list_del()
    {
        $total = $this->_handler->get_count_del();
        $mid = $this->get_post_mid();

        if ($total > 0) {
            if ($mid > 0) {
                $obj = &$this->_handler->get($mid);
                if (!is_object($obj)) {
                    redirect_header('modify_list.php?op=list_del', 3, _WLS_ERRORNOLINK);
                    exit();
                }
            } else {
                $mid_arr = $this->_handler->get_mid_array_del(1);
                if (!isset($mid_arr[0])) {
                    redirect_header('modify_list.php', 3, _WLS_ERRORNOLINK);
                    exit();
                }
                $mid = $mid_arr[0];
            }

            $total_s = $this->_form->build_html_highlight_number($total);

            $this->_print_cp_header();
            $this->_print_bread_op(_AM_WEBLINKS_DEL_REQS, 'list_del');
            echo '<h4>' . _AM_WEBLINKS_DEL_REQS . "</h4>\n";
            echo sprintf(_HAPPYLINUX_THERE_ARE, $total_s) . "<br><br>\n";
            $this->_print_approve_del_form($mid);
            echo "<br><br>\n";
        } else {
            $this->_print_cp_header();
            weblinks_admin_print_menu();
            echo '<h4>' . _AM_WEBLINKS_DEL_REQS . "</h4>\n";

            echo _AM_WEBLINKS_NO_DEL_REQ . "<br>\n";
        }

        $this->_print_cp_footer();
    }

    public function _print_approve_del_form($mid)
    {
        $obj = &$this->_handler->get($mid);
        if (!is_object($obj)) {
            redirect_header('modify_list.php?op=list_del', 3, _WLS_ERRORNOLINK);
            exit();
        }

        $lid = $obj->get('lid');

        echo $this->_edit_handler->build_style_sheet();
        echo $this->_edit_handler->build_show_link($lid);

        $this->_form->show_admin_approve_del_form($obj);
    }

    //---------------------------------------------------------
    // list delete Request
    //---------------------------------------------------------
    public function approve_del_confirm()
    {
        $mid = $this->get_post_mid();

        $this->_print_cp_header();
        $this->_print_bread_op(_AM_WEBLINKS_DEL_REQS, 'list_del');
        echo '<h4>' . _AM_WEBLINKS_DEL_REQS . "</h4>\n";

        $this->_print_approve_del_confirm_form($mid);

        $this->_print_cp_footer();
    }

    public function _print_approve_del_confirm_form($mid)
    {
        $obj = &$this->_handler->get($mid);
        if (!is_object($obj)) {
            redirect_header('modify_list.php?op=list_del', 3, _WLS_ERRORNOLINK);
            exit();
        }

        $lid = $obj->get('lid');

        echo $this->_edit_handler->build_style_sheet();
        echo $this->_edit_handler->build_show_link($lid);

        $this->_form->show_del_confirm_form(0, $mid, WEBLINKS_OP_APPROVE_DEL);
    }

    //---------------------------------------------------------
    // approve delete Request
    //---------------------------------------------------------
    public function approve_del()
    {
        if (!$this->_get_obj()) {
            $redirect = $this->_get_redirect_at_mod();
            redirect_header($redirect, 3, _WLS_ERRORNOLINK);
            exit();
        }

        if (!$this->_check_token() || !$this->_check_approve_del()) {
            $this->_print_approve_del_preview($mid);
            exit();
        }

        if ($this->_exec_approve_del()) {
            // show notification form
            if ($this->_check_notification()) {
                $this->_print_notification_form_common(WEBLINKS_OP_APPROVE_DEL);
                exit();
            }

            $msg = _WLS_DBUPDATED;
            $msg .= $this->build_comment('approve del link'); // for test form
            redirect_header($this->_get_redirect_at_mod(), 1, $msg);
            exit();
        }
        $this->_print_approve_del_error('DB Error');
        exit();
    }

    public function _exec_approve_del()
    {
        $ret = $this->_edit_handler->admin_approve_del_link($this->_obj);
        if (!$ret) {
            $this->_set_errors($this->_edit_handler->getErrors());
        }

        return true;
    }

    public function _check_approve_del()
    {
        return true;
    }

    public function _print_approve_del_preview($mid)
    {
        $this->_print_cp_header();
        $this->_print_bread_op(_AM_WEBLINKS_DEL_REQS, 'list_del');
        $this->_print_title(_AM_WEBLINKS_DEL_REQS);
        $this->_print_token_error(1);
        $this->_print_approve_del_confirm_form($mid);
        $this->_print_cp_footer();
    }

    public function _print_approve_del_error($title)
    {
        $this->_print_cp_header();
        $this->_print_bread_op(_AM_WEBLINKS_DEL_REQS, 'list_del');
        $this->_print_title(_AM_WEBLINKS_DEL_REQS);
        xoops_error($title);
        $this->_print_error();
        $this->_print_cp_footer();
    }

    //---------------------------------------------------------
    // ignore Modify Request
    //---------------------------------------------------------
    public function refuse_del()
    {
        if (!$this->_get_obj()) {
            $redirect = $this->_get_redirect_at_mod();
            redirect_header($redirect, 3, _WLS_ERRORNOLINK);
            exit();
        }

        if (!$this->_check_token()) {
            $redirect = $this->_get_redirect_at_mod();
            redirect_header($redirect, 3, _WLS_ERRORNOLINK);
            exit();
        }

        if ($this->_delete_modify()) {
            // show notification form
            if ($this->_check_notification()) {
                $this->_print_notification_form_common('refuse_del');
                exit();
            }

            $msg = _AM_WEBLINKS_DEL_REQ_DELETED;
            $msg .= $this->build_comment('refuse del link');  // for test form
            redirect_header($this->_get_redirect_at_del(), 1, $msg);
        } else {
            $this->_print_del_del_error('DB Error');
        }
    }

    public function _print_del_del_error($title)
    {
        $this->_print_cp_header();
        $this->_print_bread_op(_AM_WEBLINKS_DEL_REQS, 'list_del');
        $this->_print_title(_AM_WEBLINKS_DEL_REQS);
        xoops_error($title);
        $this->_print_error();
        $this->_print_cp_footer();
    }

    // --- class end ---
}
