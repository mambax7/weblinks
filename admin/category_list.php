<?php

use XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: category_list.php,v 1.13 2007/12/16 07:08:44 ohwada Exp $

// 2007-12-16 K.OHWADA
// get_title_with_top()

// 2007-11-01 K.OHWADA
// set_flag_execute_time()

// 2007-03-25 K.OHWADA
// update_image_size_form

// 2007-03-01 K.OHWADA
// hack for multi site
// show aux_text_1
// update_path

// 2006-09-20 K.OHWADA
// use happy_linux

// 2006-05-15 K.OHWADA
// new handler
// add CategoryList

// 2006-03-15 K.OHWADA
// use weblinks_pagenavi_basic::getInstance()

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//================================================================
// WebLinks Module
// view category list
// 2004-12-14 K.OHWADA
//================================================================

include 'admin_header.php';
include 'admin_header_list.php';

define('WEBLINKS_CAT_LIST_ID_ASC', '0');
define('WEBLINKS_CAT_LIST_ID_DESC', '1');
define('WEBLINKS_CAT_LIST_TREE', '2');
define('WEBLINKS_CAT_LIST_ORDER', '3');


//=========================================================
// main
//=========================================================
xoops_cp_header();

weblinks_admin_print_header();
weblinks_admin_print_menu();

$list = Admin\CategoryList::getInstance();
$list->_show();

xoops_cp_footer();
exit(); // --- end of main ---
