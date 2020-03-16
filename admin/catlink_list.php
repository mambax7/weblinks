<?php

use XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: catlink_list.php,v 1.2 2007/11/11 03:22:59 ohwada Exp $

// 2007-11-01 K.OHWADA
// set_flag_execute_time()

// 2006-09-20 K.OHWADA
// this new file

//================================================================
// WebLinks Module
// 2006-09-20 K.OHWADA
//================================================================

include 'admin_header.php';
include 'admin_header_list.php';

//=========================================================
// main
//=========================================================
xoops_cp_header();
weblinks_admin_print_header();
weblinks_admin_print_menu();

$list = Admin\CategoryLinkList::getInstance();
$list->_show();

xoops_cp_footer();
exit(); // --- end of main ---
