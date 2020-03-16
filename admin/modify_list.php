<?php

use XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: modify_list.php,v 1.3 2007/11/11 03:22:59 ohwada Exp $

// 2007-11-01 K.OHWADA
// weblinks_admin_print_footer()

// 2007-09-01 K.OHWADA
// waiting delele
// _get_op_sortid_array()

// 2006-09-20 K.OHWADA
// this new file

//================================================================
// WebLinks Module
// 2006-09-20 K.OHWADA
//================================================================

include 'admin_header.php';
include 'admin_header_list.php';

//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_modify.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_modify_handler.php';


//=========================================================
// main
//=========================================================
xoops_cp_header();

weblinks_admin_print_header();
weblinks_admin_print_menu();

$list = Admin\ModifyList::getInstance();
$list->_show();

weblinks_admin_print_footer();
xoops_cp_footer();
exit(); // --- end of main ---
