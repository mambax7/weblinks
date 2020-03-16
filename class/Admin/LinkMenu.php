<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: link_manage.php,v 1.2 2012/04/09 10:20:04 ohwada Exp $

// 2012-04-02 K.OHWADA
// weblinks_webmap

// 2008-02-17 K.OHWADA
// weblinks_link_view_basic.php
// BUG : Fatal error: Undefined class name 'happy_linux_keyword' in weblinks_template.php

// 2007-11-20 K.OHWADA
// BUG : Fatal error: Undefined class name 'happy_linux_keyword' in weblinks_template.php

// 2007-11-11 K.OHWADA
// _include_link_add()
// WEBLINKS_OP_APPROVE_NEW

// 2007-09-20 K.OHWADA
// admin_header_link.php

// 2007-09-10 K.OHWADA
// general revision

// 2007-09-06 K.OHWADA
// BUG 4698: undefined method weblinks_link_edit_handler::build_tags_addlink()
// _notification_add_link()

// 2007-05-18 K.OHWADA
// get_error_msg_addlink() -> get_errors_addlink()
// get_error_msg_modlink() -> get_errors_modlink()

// 2007-03-01 K.OHWADA
// weblinks_link_view.php
// weblinks_link_edit.php
// hack for multi site
// add forum_id comment_use field
// update_cat()

// 2006-12-03 K.OHWADA
// Fatal error: Call to undefined method admin_link_manage::_print_mod_table_error()

// 2006-10-14 K.OHWADA
// use _AM_WEBLINKS_ADD_BANNER
// show _WLS_NEWLINKADDED in blue

// 2006-10-05 K.OHWADA
// use happy_linux
// use rssc WEBLINKS_RSSC_USE
// move delVote to votadata_manage

// 2006-05-15 K.OHWADA
// new handler
// add class admin_link_manage
// use token ticket

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//=========================================================
// WebLinks Module
// admin link manage
// divid this file from index.php
// 2004/01/14 K.OHWADA
//=========================================================

include 'admin_header_min.php';

//include_once XOOPS_ROOT_PATH . '/class/xoopstree.php';
//include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
//include_once XOOPS_ROOT_PATH . '/class/template.php';

include_once XOOPS_ROOT_PATH . '/modules/happylinux/api/remote_image.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/post.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/highlight.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/html.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/form.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/form_lib.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/object.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/object_validater.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/object_handler.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/manage.php';

//include_once XOOPS_ROOT_PATH.'/modules/happylinux/class/browser.php';
//include_once XOOPS_ROOT_PATH.'/modules/happylinux/class/search.php';
//include_once XOOPS_ROOT_PATH.'/modules/happylinux/class/pagenavi.php';
//include_once XOOPS_ROOT_PATH.'/modules/happylinux/class/page_frame.php';

include_once WEBLINKS_ROOT_PATH . '/plugins/d3forum_sel.php';
include_once WEBLINKS_ROOT_PATH . '/plugins/forum_sel.php';
include_once WEBLINKS_ROOT_PATH . '/plugins/album_sel.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_plugin.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_menu.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_auth.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_header.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_block_view.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_block_webmap.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_webmap.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_handler.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_notification.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_view_basic.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_view.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_edit.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_edit_base_handler.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_form_handler.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_form_admin_handler.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_form_check_handler.php';

if (WEBLINKS_RSSC_USE) {
    include_once WEBLINKS_RSSC_ROOT_PATH . '/api/lang_main.php';
    include_once WEBLINKS_RSSC_ROOT_PATH . '/api/view.php';
    include_once WEBLINKS_RSSC_ROOT_PATH . '/api/refresh.php';
    include_once WEBLINKS_RSSC_ROOT_PATH . '/api/manage.php';

//    include_once WEBLINKS_ROOT_PATH . '/class/weblinks_rssc_handler.php';
//    include_once WEBLINKS_ROOT_PATH . '/admin/rssc_manage_class.php';
}

//=========================================================
// class admin_link_manage
//=========================================================
class LinkMenu
{
    public $_category_handler;
    public $_link_add;
    public $_link_mod;
    public $_link_del;
    public $_link_clone;
    public $_modify_new;
    public $_modify_mod;
    public $_modify_del;
    public $_modify_notify;
    public $_rssc_manage;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        $this->_category_handler = handler('Category', WEBLINKS_DIRNAME);
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
    // POST param
    //---------------------------------------------------------
    public function get_post_op()
    {
        $op = 'main';
        if (isset($_POST['del_link'])) {
            $op = 'del_link';
        } elseif (isset($_POST['delete_link'])) {
            $op = 'del_link';
        } elseif (isset($_POST['del_form'])) {
            $op = 'del_form';
        } elseif (isset($_POST['refuse_new'])) {
            $op = 'refuse_new';
        } elseif (isset($_POST['refuse_mod'])) {
            $op = 'refuse_mod';
        } elseif (isset($_POST['refuse_del'])) {
            $op = 'refuse_del';
        } elseif (isset($_POST['clone_link'])) {
            $op = 'clone_link';
        } elseif (isset($_POST['clone_module'])) {
            $op = 'clone_module';
        } elseif (isset($_POST['ignore'])) {
            $op = 'ignore';
        } elseif (isset($_POST['cancel'])) {
            $op = 'cancel';
        } elseif (isset($_POST['op'])) {
            $op = $_POST['op'];
        } elseif (isset($_GET['op'])) {
            $op = $_GET['op'];
        }

        return $op;
    }

    //---------------------------------------------------------
    // init
    //---------------------------------------------------------
    public function init()
    {
        $this->_category_handler->load();
    }

    //---------------------------------------------------------
    // add link
    //---------------------------------------------------------
    public function _include_link_add()
    {
//        include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_add_handler.php';
//        include_once WEBLINKS_ROOT_PATH . '/admin/link_base_class.php';
//        include_once WEBLINKS_ROOT_PATH . '/admin/link_add_class.php';

        $this->_link_add = LinkAdd::getInstance();
    }

    public function add_form()
    {
        $this->_include_link_add();
        $this->_link_add->add_form();
    }

    public function add_link()
    {
        $this->_include_link_add();
        $this->_link_add->add_link();
    }

    public function add_banner()
    {
        $this->_include_link_add();
        $this->_link_add->add_banner();
    }

    public function update_cat_form()
    {
        $this->_include_link_add();
        $this->_link_add->update_cat_form();
    }

    public function update_cat()
    {
        $this->_include_link_add();
        $this->_link_add->update_cat();
    }

    //---------------------------------------------------------
    // mod link
    //---------------------------------------------------------
    public function _include_link_mod()
    {
//        include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/pagenavi.php';
//        include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/page_frame.php';
//        include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_mod_handler.php';
//        include_once WEBLINKS_ROOT_PATH . '/class/weblinks_votedata_handler.php';
//        include_once WEBLINKS_ROOT_PATH . '/admin/link_base_class.php';
//        include_once WEBLINKS_ROOT_PATH . '/admin/link_mod_class.php';
//        include_once WEBLINKS_ROOT_PATH . '/admin/votedata_list_class.php';

        $this->_link_mod = LinkMod::getInstance();
    }

    public function mod_form()
    {
        $this->_include_link_mod();
        $this->_link_mod->mod_form();
    }

    public function mod_link()
    {
        $this->_include_link_mod();
        $this->_link_mod->mod_link();
    }

    public function mod_banner()
    {
        $this->_include_link_mod();
        $this->_link_mod->mod_banner();
    }

    //---------------------------------------------------------
    // del link
    //---------------------------------------------------------
    public function _include_link_del()
    {
        $this->_include_template();

//        include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_del_handler.php';
//        include_once WEBLINKS_ROOT_PATH . '/admin/link_base_class.php';
//        include_once WEBLINKS_ROOT_PATH . '/admin/link_del_class.php';

        $this->_link_del = LinkDelete::getInstance();
    }

    public function _include_template()
    {
        // BUG : Fatal error: Undefined class name 'happy_linux_keyword' in weblinks_template.php
//        include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/keyword.php';
//        include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/browser.php';

//        include_once WEBLINKS_ROOT_PATH . '/class/weblinks_template.php';
    }

    public function del_form()
    {
        $this->_include_link_del();
        $this->_link_del->del_form();
    }

    public function del_link()
    {
        $this->_include_link_del();
        $this->_link_del->del_link();
    }

    //---------------------------------------------------------
    // clone link
    //---------------------------------------------------------
    public function _include_link_clone()
    {
//        include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_add_handler.php';
//        include_once WEBLINKS_ROOT_PATH . '/admin/link_base_class.php';
//        include_once WEBLINKS_ROOT_PATH . '/admin/link_add_class.php';
//        include_once WEBLINKS_ROOT_PATH . '/admin/link_clone_class.php';

        $this->_link_clone = LinkClone::getInstance();
    }

    public function clone_link()
    {
        $this->_include_link_clone();
        $this->_link_clone->clone_link();
    }

    public function clone_module()
    {
        $this->_include_link_clone();
        $this->_link_clone->clone_module();
    }

    public function clone_module_to()
    {
        $this->_include_link_clone();
        $this->_link_clone->clone_module_to();
    }

    public function clone_module_from()
    {
        $this->_include_link_clone();
        $this->_link_clone->clone_module_from();
    }

    //---------------------------------------------------------
    // rssc manage
    //---------------------------------------------------------
    public function _include_rssc_manage()
    {
        $this->_rssc_manage = RssManage::getInstance();
    }

    public function add_rssc()
    {
        $this->_include_rssc_manage();
        $this->_rssc_manage->add_rssc();
    }

    public function mod_rssc()
    {
        $this->_include_rssc_manage();
        $this->_rssc_manage->mod_rssc();
    }

    public function refresh_rssc()
    {
        $this->_include_rssc_manage();
        $this->_rssc_manage->refresh_link();
    }

    //---------------------------------------------------------
    // modify new
    //---------------------------------------------------------
    public function _include_modify_new()
    {
//        include_once WEBLINKS_ROOT_PATH . '/class/weblinks_modify.php';
//        include_once WEBLINKS_ROOT_PATH . '/class/weblinks_modify_handler.php';
//        include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_add_handler.php';
        include_once WEBLINKS_ROOT_PATH . '/admin/admin_header_mail.php';
//        include_once WEBLINKS_ROOT_PATH . '/admin/link_base_class.php';
//        include_once WEBLINKS_ROOT_PATH . '/admin/link_add_class.php';
//        include_once WEBLINKS_ROOT_PATH . '/admin/modify_base_class.php';
//        include_once WEBLINKS_ROOT_PATH . '/admin/modify_new_class.php';

        $this->_modify_new = ModifyNew::getInstance();
    }

    public function list_new()
    {
        $this->_include_modify_new();
        $this->_modify_new->list_new();
    }

    public function approve_new()
    {
        $this->_include_modify_new();
        $this->_modify_new->approve_new();
    }

    public function refuse_new()
    {
        $this->_include_modify_new();
        $this->_modify_new->refuse_new();
    }

    //---------------------------------------------------------
    // modify mod
    //---------------------------------------------------------
    public function _include_modify_mod()
    {
//        include_once WEBLINKS_ROOT_PATH . '/class/weblinks_modify.php';
//        include_once WEBLINKS_ROOT_PATH . '/class/weblinks_modify_handler.php';
//        include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_mod_handler.php';
        include_once WEBLINKS_ROOT_PATH . '/admin/admin_header_mail.php';
//        include_once WEBLINKS_ROOT_PATH . '/admin/link_base_class.php';
//        include_once WEBLINKS_ROOT_PATH . '/admin/link_mod_class.php';
//        include_once WEBLINKS_ROOT_PATH . '/admin/modify_base_class.php';
//        include_once WEBLINKS_ROOT_PATH . '/admin/modify_mod_class.php';

        $this->_modify_mod = ModifyMod::getInstance();
    }

    public function list_mod()
    {
        $this->_include_modify_mod();
        $this->_modify_mod->list_mod();
    }

    public function approve_mod()
    {
        $this->_include_modify_mod();
        $this->_modify_mod->approve_mod();
    }

    public function refuse_mod()
    {
        $this->_include_modify_mod();
        $this->_modify_mod->refuse_mod();
    }

    //---------------------------------------------------------
    // modify del
    //---------------------------------------------------------
    public function _include_modify_del()
    {
        $this->_include_template();

//        include_once WEBLINKS_ROOT_PATH . '/class/weblinks_modify.php';
//        include_once WEBLINKS_ROOT_PATH . '/class/weblinks_modify_handler.php';
//        include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_del_handler.php';
        include_once WEBLINKS_ROOT_PATH . '/admin/admin_header_mail.php';
//        include_once WEBLINKS_ROOT_PATH . '/admin/link_base_class.php';
//        include_once WEBLINKS_ROOT_PATH . '/admin/link_del_class.php';
//        include_once WEBLINKS_ROOT_PATH . '/admin/modify_base_class.php';
//        include_once WEBLINKS_ROOT_PATH . '/admin/modify_del_class.php';

        $this->_modify_del = ModifyDel::getInstance();
    }

    public function list_del()
    {
        $this->_include_modify_del();
        $this->_modify_del->list_del();
    }

    public function approve_del_confirm()
    {
        $this->_include_modify_del();
        $this->_modify_del->approve_del_confirm();
    }

    public function approve_del()
    {
        $this->_include_modify_del();
        $this->_modify_del->approve_del();
    }

    public function refuse_del()
    {
        $this->_include_modify_del();
        $this->_modify_del->refuse_del();
    }

    //---------------------------------------------------------
    // modify del
    //---------------------------------------------------------
    public function _include_modify_notify()
    {
        include_once WEBLINKS_ROOT_PATH . '/admin/modify_base_class.php';
        include_once WEBLINKS_ROOT_PATH . '/admin/modify_notify_class.php';
        include_once WEBLINKS_ROOT_PATH . '/admin/admin_header_mail.php';

        $this->_modify_notify = ModifyNotify::getInstance();
    }

    public function send_approve_new()
    {
        $this->_include_modify_notify();
        $this->_modify_notify->send_approve_new();
    }

    public function send_refuse_new()
    {
        $this->_include_modify_notify();
        $this->_modify_notify->send_refuse_new();
    }

    public function send_approve_mod()
    {
        $this->_include_modify_notify();
        $this->_modify_notify->send_approve_mod();
    }

    public function send_refuse_mod()
    {
        $this->_include_modify_notify();
        $this->_modify_notify->send_refuse_mod();
    }

    public function send_approve_del()
    {
        $this->_include_modify_notify();
        $this->_modify_notify->send_approve_del();
    }

    public function send_refuse_del()
    {
        $this->_include_modify_notify();
        $this->_modify_notify->send_refuse_del();
    }

    // --- class end ---
}
