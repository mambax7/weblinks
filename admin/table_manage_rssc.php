<?php

use XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: table_manage_rssc.php,v 1.2 2007/11/26 03:04:36 ohwada Exp $

// 2007-11-24 K.OHWADA
// weblinks_admin_print_footer()

// 2006-09-20 K.OHWADA
// this is new file
// use rssc WEBLINKS_RSSC_EXIST

//================================================================
// WebLinks Module
// 2006-09-20 K.OHWADA
//================================================================

include 'admin_header.php';

if (WEBLINKS_RSSC_EXIST) {
    include_once WEBLINKS_RSSC_ROOT_PATH . '/api/lang_main.php';
    include_once WEBLINKS_RSSC_ROOT_PATH . '/api/view.php';
    include_once WEBLINKS_RSSC_ROOT_PATH . '/api/refresh.php';
    include_once WEBLINKS_RSSC_ROOT_PATH . '/api/manage.php';

//    include_once WEBLINKS_ROOT_PATH . '/class/weblinks_rssc_handler.php';
//    include_once WEBLINKS_ROOT_PATH . '/admin/rssc_manage_class.php';
}


//================================================================
// main
//================================================================

xoops_cp_header();

$title = 'RSSC Check';
weblinks_admin_print_bread(_AM_WEBLINKS_TABLE_MANAGE, 'table_manage.php', $title);
echo '<h3>' . $title . "</h3>\n";

if (!WEBLINKS_RSSC_USE) {
    echo '<h4 style="color: #ff0000;"> not set rss_use </h4>';
    xoops_cp_footer();
    exit();
}

if (WEBLINKS_RSSC_EXIST) {
    // check rssc version
    if (RSSC_VERSION < WEBLINKS_RSSC_VERSION) {
        $msg = sprintf(_WEBLINKS_RSSC_REQUIRE, WEBLINKS_RSSC_VERSION);
        xoops_error($msg);
        xoops_cp_footer();
        exit();
    }
    $msg = sprintf(_WEBLINKS_RSSC_INSTALLED, WEBLINKS_RSSC_DIRNAME, RSSC_VERSION);
    echo '<h4 style="color: #0000ff;">' . $msg . "</h4>\n";
} else {
    $msg = sprintf(_WEBLINKS_RSSC_NOT_INSTALLED, WEBLINKS_RSSC_DIRNAME);
    xoops_error($msg);
    xoops_cp_footer();
    exit();
}

$manage = Admin\TableManageRssc::getInstance();
$op = $manage->get_post_param();

switch ($op) {
    case 'check_link':
        $manage->check_link();
        break;
    case 'menu':
    default:
        $manage->menu();
        break;
}

weblinks_admin_print_footer();
xoops_cp_footer();
exit(); // --- main end ---
