<?php

use XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: weblinks180_to_rssc070.php,v 1.2 2007/12/08 22:48:05 ohwada Exp $

// 2007-12-09 K.OHWADA
// BUG : Fatal error: Class 'happy_linux_rss_parser'

// 2007-10-10 K.OHWADA
// v1.80

// 2006-09-20 K.OHWADA
// this is new file
// use rssc WEBLINKS_RSSC_EXIST

//================================================================
// WebLinks Module
// 2006-09-20 K.OHWADA
//================================================================

include 'admin_header.php';

// BUG : Fatal error: Class 'happy_linux_rss_parser'
if (WEBLINKS_RSSC_USE) {
    include_once WEBLINKS_RSSC_ROOT_PATH . '/api/refresh.php';
}


//=========================================================
// main
//=========================================================

xoops_cp_header();

weblinks_admin_print_bread(_AM_WEBLINKS_EXPORT_MANAGE, 'export_manage.php', 'rssc');
echo '<h3>' . 'Export to RSSC module' . "</h3>\n";
echo 'Export DB weblinks ' . WEBLINKS_VERSION . ' to rssc ' . WEBLINKS_RSSC_VERSION . " <br><br>\n";

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

$export = Admin\ExportWeblinks180ToRssc070::getInstance();
$op = 'main';
if (isset($_POST['op'])) {
    $op = $_POST['op'];
}

switch ($op) {
    case 'export_site':
        if (!$export->check_token()) {
            xoops_error('Token Error');
        } else {
            $export->export_site();
        }
        break;
    case 'export_black':
        if (!$export->check_token()) {
            xoops_error('Token Error');
        } else {
            $export->export_black();
        }
        break;
    case 'export_white':
        if (!$export->check_token()) {
            xoops_error('Token Error');
        } else {
            $export->export_white();
        }
        break;
    case 'export_link':
        if (!$export->check_token()) {
            xoops_error('Token Error');
        } else {
            $export->export_link();
        }
        break;
    case 'export_feed':
        if (!$export->check_token()) {
            xoops_error('Token Error');
        } else {
            $export->export_feed();
        }
        break;
    case 'menu':
    default:
        $export->menu();
        break;
}

xoops_cp_footer();
exit();

?>
