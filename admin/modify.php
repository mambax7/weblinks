<?php
// $Id: modify.php,v 1.7 2006/07/01 13:11:54 ohwada Exp $

// 2006-07-01 K.OHWADA
// BUG 4085: Fatal error: Call to undefined function: weblinks_page_frame_basic()

// 2006-05-15 K.OHWADA
// new handler

// 2006-03-15 K.OHWADA
// BUG 3743: fatal error ocucred when six or more links waiting to apoval

// 2005-10-20 K.OHWADA
// REQ 3028: send apoval email to anonymous user
// add send_approved_to_anonymous()
// add send_refused_to_user()

// 2005-09-27 K.OHWADA
// BUG 3031: timeout occurs if many waiting links
// add function list_xxx_link_xxx() print_xxx()

// 2005-01-20 K.OHWADA
// getErrorMsgAddLink

// 2004-12-14 K.OHWADA
// change caller index.php -> link_manage.php

// 2004-10-20 K.OHWADA
// URL-less mode
// bug fix: approve notify mail dont send

//=========================================================
// admin modify
// use class weblinksCategory, weblinksLink
// divid this file from index.php
// 2004/01/14 K.OHWADA
//=========================================================

//=========================================================
// class admin_modify_manage
//=========================================================
class admin_modify_manage extends weblinks_error
{
    public $WEBLINKS_MAX_LINK_IN_DETAIL = 5;
    public $WEBLINKS_MAX_LINK_IN_PAGE = 10;
    public $FLAG_EVENT_USER = 1;  // send email to user
    public $FLAG_EVENT_ANONYMOUS = 1;  // send email to anonymous

    public $_modify_handler;
    public $_link_edit_handler;
    public $_link_form_handler;

    public $_sendmail;
    public $_post;

    // local
    public $_tags;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        $this->_modify_handler = weblinks_getHandler('modify', WEBLINKS_DIRNAME);
        $this->_link_edit_handler = weblinks_getHandler('link_edit', WEBLINKS_DIRNAME);
        $this->_link_form_handler = weblinks_getHandler('link_form', WEBLINKS_DIRNAME);
        $this->_sendmail = weblinks_sendmail::getInstance(WEBLINKS_DIRNAME);
        $this->_post = weblinks_post::getInstance();
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
    // list New Links
    //---------------------------------------------------------
    public function listNewLinks()
    {
        // List links waiting for validation
        $total = $this->_modify_handler->get_count_new();

        echo '<h4>' . _WLS_LINKSWAITING . "&nbsp;($total)</h4>\n";

        // BUG 3031: timeout occurs if many waiting links
        if ($total > 0) {
            $mid = $this->_post->get_get_int('mid');

            if ($mid > 0) {
                $this->list_new_link_one($mid);
            } elseif ($total <= $this->WEBLINKS_MAX_LINK_IN_DETAIL) {
                $this->list_new_link_detail();
            } else {
                $this->list_new_link_page();
            }
        } else {
            echo _WLS_NOSUBMITTED . "<br>\n";
        }
    }

    public function list_new_link_detail()
    {
        $mid_arr = $this->_modify_handler->get_mid_array_new();

        foreach ($mid_arr as $mid) {
            $this->list_new_link_one($mid);
        }
    }

    public function list_new_link_one($mid)
    {
        $this->_link_form_handler->show_admin_form('approve', $mid);
        echo "<br><br>\n";
    }

    public function list_new_link_page()
    {
        $list = admin_list_new_links::getInstance();
        $list->show_new();
    }

    //---------------------------------------------------------
    // delete New Link
    //---------------------------------------------------------
    public function delNewLink()
    {
        $mid = $this->_post->get_post_get_int('mid');
        $ret = $this->delete_modify_by_mid($mid);

        return $ret;
    }

    public function send_refuse()
    {
        // send email to user and anonymous, refused to new link
        // REQ 3028: send refused email to registered user and anonymous user

        $flag_send = false;
        if ($this->FLAG_EVENT_USER && $_POST['uid']) {
            $flag_send = true;
        } elseif ($this->FLAG_EVENT_ANONYMOUS && (0 == $_POST['uid']) && !empty($_POST['mail'])) {
            $flag_send = true;
        }

        if ($flag_send) {
            $ret = $this->_sendmail->send_refused_to_user();
            if (!$ret) {
                $this->_set_errors($this->_sendmail->getErrors());
            }

            return $ret;
        }

        return true;    // no action
    }

    //---------------------------------------------------------
    // approve New Link
    //---------------------------------------------------------
    public function approveCheck()
    {
        $ret = $this->_link_edit_handler->check_form_modlink($_POST);

        return $ret;
    }

    public function approveError()
    {
        echo '<h4>' . _WLS_MODLINK . '</h4><br>';
        echo "<hr>\n";
        echo $this->_link_edit_handler->get_error_msg_modlink();
        echo "<hr>\n";

        $this->_link_form_handler->show_admin_form('approve_preview');
    }

    public function approve()
    {
        $newid = $this->_link_edit_handler->add_link($_POST);
        if (!$newid) {
            $this->_set_errors($this->_link_edit_handler->getErrors());

            return false;
        }

        $mid = $this->_post->get_post_get_int('mid');
        $this->delete_modify_by_mid($mid);

        // notification
        list($tags, $cid) = $this->_link_edit_handler->build_tags_addlink($newid);

        $notification_handler = xoops_getHandler('notification');
        $notification_handler->triggerEvent('global', 0, 'new_link', $tags);
        $notification_handler->triggerEvent('category', $cid, 'new_link', $tags);

        // send email to user, appoval to new link
        // bug fix: approve notify mail dont send
        $notification_handler->triggerEvent('link', $mid, 'approve', $tags);

        $this->_tags = $tags;

        return true;
    }

    public function send_approve()
    {
        // send email to anonymous, appoval to new link
        // REQ 3028: send appoval email to anonymous user

        if ($this->FLAG_EVENT_ANONYMOUS && (0 == $_POST['uid']) && !empty($_POST['mail'])) {
            $ret = $this->_sendmail->send_approved_to_anonymous($this->_tags);
            if (!$ret) {
                $this->_set_errors($this->_sendmail->getErrors());
            }

            return $ret;
        }

        return true;    // no action
    }

    //---------------------------------------------------------
    // list Modify Request
    //---------------------------------------------------------
    public function listModReq()
    {
        $total = $this->_modify_handler->get_count_mod();

        echo '<h4>' . _WLS_MODREQUESTS . "&nbsp;($total)</h4>\n";

        // BUG 3031: timeout occurs if many waiting links
        if ($total > 0) {
            $mid = $this->_post->get_get_int('mid');

            if ($mid > 0) {
                $this->list_mod_req_one($mid);
            } elseif ($total <= $this->WEBLINKS_MAX_LINK_IN_DETAIL) {
                $this->list_mod_req_detail();
            } else {
                $this->list_mod_req_page();
            }
        } else {
            echo _WLS_NOMODREQ . "<br>\n";
        }
    }

    public function list_mod_req_detail()
    {
        $mid_arr = $this->_modify_handler->get_mid_array_mod();

        foreach ($mid_arr as $mid) {
            $this->list_mod_req_one($mid);
        }
    }

    public function list_mod_req_one($mid)
    {
        $this->_link_form_handler->show_admin_mod_approve_form('approve', $mid);
        echo "<br><br>\n";
    }

    public function list_mod_req_page()
    {
        $list = admin_list_new_links::getInstance();
        $list->show_mod();
    }

    //---------------------------------------------------------
    // approve Modify Request
    // modLinkS and ignoreModReq
    //---------------------------------------------------------
    public function approveModReqCheck()
    {
        $ret = $this->_link_edit_handler->check_form_modlink_for_owner($_POST);

        return $ret;
    }

    public function approveModReqError()
    {
        echo '<h4>' . _WLS_MODREQUESTS . '</h4><br>';
        echo "<hr>\n";
        echo $this->_link_edit_handler->get_error_msg_modlink();
        echo "<hr>\n";

        $this->_link_form_handler->show_admin_mod_approve_form('preview');
    }

    public function approveModReq()
    {
        $this->_clear_errors();

        $mid = $this->_post->get_post_int('mid');
        $lid = $this->_post->get_post_int('lid');

        // update link
        $ret = $this->_link_edit_handler->mod_link($lid, $_POST);
        if (!$ret) {
            $this->_set_errors($this->_link_edit_handler->getErrors());
        }

        // delete modify
        $this->delete_modify_by_mid($mid);

        return $this->returnExistError();
    }

    public function delete_modify_by_mid($mid)
    {
        $obj = $this->_modify_handler->get($mid);
        if (!is_object($obj)) {
            $msg = "no modify record mid=$mid ";
            $this->_set_error($msg);

            return false;
        }

        $ret = $this->_modify_handler->delete($obj);
        if (!$ret) {
            $this->_set_error($this->_modify_handler->getErrors());

            return false;
        }

        return true;
    }

    //---------------------------------------------------------
    // ignore Modify Request
    //---------------------------------------------------------
    public function ignoreModReq()
    {
        $mid = $this->_post->get_post_get_int('mid');
        $ret = $this->delete_modify_by_mid($mid);

        return $ret;
    }

    //---------------------------------------------------------
    // redirect URL
    //---------------------------------------------------------
    public function get_redirect_at_new()
    {
        $total = $this->_modify_handler->get_count_new();

        // jump same page when remain New link
        if ($total > 0) {
            return 'link_manage.php?op=listNewLinks';
        }

        return 'link_list.php?sortid=1';
    }

    public function get_redirect_at_mod()
    {
        $total = $this->_modify_handler->get_count_mod();

        // jump same page when remain New link
        if ($total > 0) {
            return 'link_manage.php?op=listModReq';
        }

        return 'link_list.php';
    }

    //---------------------------------------------------------
    // set parameter
    //---------------------------------------------------------
    public function set_max_link_in_detail($value)
    {
        $this->WEBLINKS_MAX_LINK_IN_DETAIL = (int)$value;
    }

    public function set_max_link_in_page($value)
    {
        $this->WEBLINKS_MAX_LINK_IN_PAGE = (int)$value;
    }

    // --- class end ---
}

//=========================================================
// class admin_list_new_links
//=========================================================
class admin_list_new_links extends weblinks_page_frame
{
    public $WEBLINKS_MAX_LINK_IN_DETAIL = 5;
    public $WEBLINKS_MAX_LINK_IN_PAGE = 5;

    public $_mode;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        // BUG: Fatal error: Call to undefined function: weblinks_page_frame_basic()
        parent::__construct();

        $this->set_handler('modify', WEBLINKS_DIRNAME);
        $this->set_id_name('mid');
        $this->set_flag_sortid(0);
        $this->set_perpage($this->WEBLINKS_MAX_LINK_IN_PAGE);
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
    // handler
    //---------------------------------------------------------
    public function show_new()
    {
        $this->_mode = 0;
        $this->_op = 'listNewLinks';
        $this->set_script('link_manage.php?op=listNewLinks');
        $this->show();
    }

    public function show_mod()
    {
        $this->_mode = 1;
        $this->_op = 'listModReq';
        $this->set_script('link_manage.php?op=listModReq');
        $this->show();
    }

    //---------------------------------------------------------
    // handler
    //---------------------------------------------------------
    public function get_table_header()
    {
        $arr = [
            _WEBLINKS_MID,
            _WLS_SITETITLE,
            _WLS_SITEURL,
        ];

        return $arr;
    }

    public function get_total()
    {
        $total = $this->_handler->get_count_by_mode($this->_mode);

        return $total;
    }

    public function &get_items($limit = 0, $start = 0)
    {
        $objs = $this->_handler->get_objects_by_mode($this->_mode, $limit, $start);

        return $objs;
    }

    public function &get_cols(&$obj)
    {
        $op = 'listNewLinks';
        $jump_id = 'link_manage.php?op=' . $this->_op . '&amp;mid=';
        $id_link = $this->build_html_id_link_by_obj($obj, 'mid', $jump_id);

        $title = $this->build_text_by_obj($obj, 'title');

        $url_link = $this->build_html_name_link_by_obj($obj, 'url', '', '_blank');

        $arr = [
            $id_link,
            $title,
            $url_link,
        ];

        return $arr;
    }

    //---------------------------------------------------------
    // print
    //---------------------------------------------------------
    public function print_top()
    {
        // dummy
    }

    // --- class end ---
}
