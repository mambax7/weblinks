<?php

use XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: table_manage_search.php,v 1.1 2007/12/24 20:06:39 ohwada Exp $

//================================================================
// WebLinks Module
// 2007-12-24 K.OHWADA
//================================================================

include 'admin_header.php';


//================================================================
// main
//================================================================
// hack for multi site
weblinks_admin_multi_disable_feature();

$manage = Admin\TableManageSearch::getInstance();

$op = $manage->get_post_op();

xoops_cp_header();

switch ($op) {
    case 'rebuild':
        $manage->rebuild_search();
        break;
    case 'menu':
    default:
        $manage->menu();
        break;
}

weblinks_admin_print_footer();
xoops_cp_footer();
exit(); // --- main end ---
