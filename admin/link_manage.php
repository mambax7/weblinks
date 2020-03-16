<?php

use XoopsModules\Weblinks\Admin;

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

include_once XOOPS_ROOT_PATH . '/class/xoopstree.php';
include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
include_once XOOPS_ROOT_PATH . '/class/template.php';

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
// main
//=========================================================
// hack for multi site
weblinks_admin_multi_redirect_jp_site();

$manage = Admin\LinkMenu::getInstance();

$op = $manage->get_post_op();

// start
$manage->init();

switch ($op) {
    case 'addLinkS':
    case 'add_link':
    case 'add_table':
        $manage->add_link();
        break;
    case 'modLink':
    case 'mod_form':
        $manage->mod_form();
        break;
    case 'modLinkS':
    case 'mod_link':
    case 'mod_table':
        $manage->mod_link();
        break;
    case 'add_banner':
        $manage->add_banner();
        break;
    case 'mod_banner':
        $manage->mod_banner();
        break;
    case 'del_form':
        $manage->del_form();
        break;
    case 'delLink':
    case 'delete_link':
    case 'del_link':
    case 'del_table':
        $manage->del_link();
        break;
    case 'clone_link':
        $manage->clone_link();
        break;
    case 'clone_module':
        $manage->clone_module();
        break;
    case 'clone_module_to':
        $manage->clone_module_to();
        break;
    case 'clone_module_from':
        $manage->clone_module_from();
        break;
    case 'update_cat_form':
        $manage->update_cat_form();
        break;
    case 'update_cat':
        $manage->update_cat();
        break;
    case 'add_rssc':
        $manage->add_rssc();
        break;
    case 'mod_rssc':
        $manage->mod_rssc();
        break;
    case 'refresh_link':
        $manage->refresh_rssc();
        break;
    case 'listNewLinks':
    case 'list_new':
        $manage->list_new();
        break;
    case WEBLINKS_OP_APPROVE_NEW:   // approve_new
        $manage->approve_new();
        break;
    case 'delNewLink':
    case 'delete_new':
    case 'del_new':
    case 'refuse_new':
        $manage->refuse_new();
        break;
    case 'listModReq':
    case 'list_mod':
        $manage->list_mod();
        break;
    case WEBLINKS_OP_APPROVE_MOD:   // approve_mod
        $manage->approve_mod();
        break;
    case 'ignore':
    case 'ignoreModReq':
    case 'del_mod':
    case 'refuse_mod':
        $manage->refuse_mod();
        break;
    case 'list_del':
        $manage->list_del();
        break;
    case 'approve_del_confirm':
        $manage->approve_del_confirm();
        break;
    case WEBLINKS_OP_APPROVE_DEL:   // approve_del
        $manage->approve_del();
        break;
    case 'refuse_del':
        $manage->refuse_del();
        break;
    case 'send_approve_new':
        $manage->send_approve_new();
        break;
    case 'send_refuse_new':
        $manage->send_refuse_new();
        break;
    case 'send_approve_mod':
        $manage->send_approve_mod();
        break;
    case 'send_refuse_mod':
        $manage->send_refuse_mod();
        break;
    case 'send_approve_del':
        $manage->send_approve_del();
        break;
    case 'send_refuse_del':
        $manage->send_refuse_del();
        break;
    case 'main':
    case 'add_form':
    default:
        $manage->add_form();
        break;
}

exit(); // --- end of main ---
