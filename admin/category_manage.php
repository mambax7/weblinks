<?php

use XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: category_manage.php,v 1.3 2012/04/10 18:52:29 ohwada Exp $

// 2012-04-02 K.OHWADA
// weblinks_webmap

// 2007-12-16 K.OHWADA
// build_selbox_top()

// 2007-11-01 K.OHWADA
// link_vote_del_handler
// set_flag_execute_time()

// 2007-09-20 K.OHWADA
// admin_header_link.php
// banner_handler

// 2007-09-01 K.OHWADA
// link_edit_handler -> link_edit_base_handler

// 2007-08-01 K.OHWADA
// weblinks_gmap

// 2007-06-10 K.OHWADA
// link_catlink_basic_handler
// get_options_for_cat_forum()

// 2007-05-12 K.OHWADA
// Notice [PHP]: Use of undefined constant imgurl

// 2007-04-08 K.OHWADA
// gm_type, description

// 2007-04-02 K.OHWADA
// Fatal error: Call to undefined function: print_warnig()
// Fatal error: Call to undefined function: _get_image_size()

// 2007-03-25 K.OHWADA
// update_image_size()
// remove del_cat() in CategoryForm

// 2007-02-20 K.OHWADA
// hack for multi site
// add forum_id field, etc
// update_path()

// 2006-11-18 K.OHWADA
// small change _save()

// 2006-09-20 K.OHWADA
// use happy_linux
// use XoopsGTicket

// 2006-09-18 K.OHWADA
// support xoops protector

// 2006-05-15 K.OHWADA
// new handler
// add class CategoryManage
// use token ticket

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//=========================================================
// WebLinks Module
// admin category manage
// 2004/01/14 K.OHWADA
//=========================================================

include 'admin_header.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_block_webmap.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_webmap.php';

//=========================================================
// main
//=========================================================
// hack for multi site
weblinks_admin_multi_redirect_jp_site();

$manage = Admin\CategoryManage::getInstance();

$manage->init();
$op = $manage->get_post_op();

switch ($op) {
    case 'addCat':
    case 'add_table':
        $manage->add_table();
        break;
    case 'modCat':
    case 'mod_form':
        $manage->mod_form();
        break;
    case 'modCatS':
    case 'mod_table':
        $manage->mod_table();
        break;
    case 'delCat':
    case 'delete':
    case 'del_cat':
        $manage->del_cat();
        break;
    case 'reorderCat':
    case 'reorder_cat':
        $manage->reorder_cat();
        break;
    case 'update_path_form':
        $manage->update_path_form();
        break;
    case 'update_path':
        $manage->update_path();
        break;
    case 'update_image_size_form':
        $manage->update_image_size_form();
        break;
    case 'update_image_size':
        $manage->update_image_size();
        break;
    case 'test':
        $manage->test();
        break;
    case 'main':
    case 'add_form':
    default:
        $manage->add_form();
        break;
}

exit(); // --- end of main ---
