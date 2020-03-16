<?php

use XoopsModules\Weblinks\Admin;
use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: broken_list.php,v 1.2 2007/11/11 03:22:58 ohwada Exp $

// 2007-11-01 K.OHWADA
// weblinks_admin_print_footer()

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

$list = Admin\BrokenList::getInstance();
$list->_show();

weblinks_admin_print_footer();
xoops_cp_footer();
exit(); // --- end of main ---
