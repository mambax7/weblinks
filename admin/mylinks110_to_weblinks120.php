<?php

use XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: mylinks110_to_weblinks120.php,v 1.3 2007/05/09 13:08:27 ohwada Exp $

// 2007-05-06 K.OHWADA
// BUG 4562: Fatal error
// Fatal error: Class 'weblinks_link_view' not found in weblinks_link_view_handler.php
// Fatal error: Call to undefined method weblinks_link_edit_handler::build_search()

// 2006-09-20 K.OHWADA
// this new file
// based on my11_to_web09.php

//================================================================
// WebLinks Module
// 2006-09-20 K.OHWADA
//================================================================

// system files
include 'admin_header.php';

//=========================================================
// main
//=========================================================
xoops_cp_header();

$import = Admin\ImportMylinks110ToWeblinks120::getInstance();

weblinks_admin_print_bread(_AM_WEBLINKS_IMPORT_MANAGE, 'import_manage.php', 'mylinks');
echo '<h3>' . 'Imort from mylinks module' . "</h3>\n";
echo "Import DB mylinks 1.10 to weblinks 1.20 or later <br><br>\n";

if (!$import->exist_source_module()) {
    xoops_error($import->get_source_msg_not_installed());
    xoops_cp_footer();
    exit();
}

$op = $import->get_post_op();

switch ($op) {
    case 'import_image':
        if (!$import->check_token()) {
            xoops_error('Token Error');
        } else {
            $import->import_image();
        }
        break;
    case 'import_category':
        if (!$import->check_token()) {
            xoops_error('Token Error');
        } else {
            $import->import_category();
        }
        break;
    case 'import_link':
        if (!$import->check_token()) {
            xoops_error('Token Error');
        } else {
            $import->import_link();
        }
        break;
    case 'import_votedate':
        if (!$import->check_token()) {
            xoops_error('Token Error');
        } else {
            $import->import_votedate();
        }
        break;
    case 'import_comment':
        if (!$import->check_token()) {
            xoops_error('Token Error');
        } else {
            $import->import_comment();
        }
        break;
    case 're_create':
        if (!$import->check_token()) {
            xoops_error('Token Error');
        } else {
            $import->re_create();
        }
        break;
    case 'menu':
    default:
        $import->menu();
        break;
}

xoops_cp_footer();
exit();

?>
