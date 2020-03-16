<?php

use XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: weblinks120_to_rssc040.php,v 1.1 2006/09/30 03:15:20 ohwada Exp $

// 2006-09-20 K.OHWADA
// this is new file
// use rssc WEBLINKS_RSSC_EXIST

//================================================================
// WebLinks Module
// 2006-09-20 K.OHWADA
//================================================================

include 'admin_header.php';

//=========================================================
// main
//=========================================================

xoops_cp_header();

weblinks_admin_print_bread(_AM_WEBLINKS_EXPORT_MANAGE, 'export_manage.php', 'rssc');
echo '<h3>' . 'Export to RSSC module' . "</h3>\n";
echo "Export DB weblinks 1.20 to rssc 0.40 <br><br>\n";

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

$export = Admin\ExportWeblinks120ToRssc040::getInstance();
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
