<?php

use XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: bulk_manage.php,v 1.3 2012/04/09 10:20:04 ohwada Exp $

// 2012-04-02 K.OHWADA
// use camma by \2c
// use \n in textarea1,2
// comment_handler
// rssc_add.php
// link_geocoding.php

// 2010-04-28 K.OHWADA
// $_FLAG_LINK_INSERT;

// 2008-03-04 K.OHWADA
// set time_publish

// 2007-12-24 K.OHWADA
// BUG : not set search field

// 2007-12-16 K.OHWADA
// build_selbox_top()
// BUG: cannot register in TOP when exist

// 2007-11-01 K.OHWADA
// weblinks_admin_print_footer()

// 2007-09-20 K.OHWADA
// Fatal error: Class 'weblinks_link_edit_base_handler' not found
// admin_header_link.php

// 2007-08-01 K.OHWADA
// add_link_optional

// 2007-05-18 K.OHWADA
// BUG: set 0 in comment_use

// 2007-03-25 K.OHWADA
// small change

// 2007-03-01 K.OHWADA
// hack for multi site

// 2006-10-12 K.OHWADA
// BUG 4318: cannot register bulk links.

// 2006-09-20 K.OHWADA
// use happy_linux
// use XoopsGTicket

// 2006-05-15 K.OHWADA
// new handler
// use token ticket

//=========================================================
// WebLinks Module
// 2006-05-15 K.OHWADA
//=========================================================

include __DIR__ . '/admin_header.php';
include __DIR__ . '/admin_header_link.php';


//=========================================================
// main start
//=========================================================
// hack for multi site
weblinks_admin_multi_disable_feature();

$XOOPS_LANGUAGE = $xoopsConfig['language'];

// for local
$FILE_CAT = WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/bulk/cat_cvs.txt';
if (!file_exists($FILE_CAT)) {
    $FILE_CAT = WEBLINKS_ROOT_PATH . '/language/english/bulk/cat_cvs.txt';
}

$FILE_LINK = WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/bulk/link_cvs.txt';
if (!file_exists($FILE_LINK)) {
    $FILE_LINK = WEBLINKS_ROOT_PATH . '/language/english/bulk/link_cvs.txt';
}

$FILE_LINK_2 = WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/bulk/link_cvs_2.txt';
if (!file_exists($FILE_LINK_2)) {
    $FILE_LINK_2 = WEBLINKS_ROOT_PATH . '/language/english/bulk/link_cvs_2.txt';
}

$FILE_FILE_CAT = WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/bulk/cat_tab.txt';
if (!file_exists($FILE_FILE_CAT)) {
    $FILE_FILE_CAT = WEBLINKS_ROOT_PATH . '/language/english/bulk/cat_tab.txt';
}

$FILE_FILE_LINK = WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/bulk/link_tab.txt';
if (!file_exists($FILE_FILE_LINK)) {
    $FILE_FILE_LINK = WEBLINKS_ROOT_PATH . '/language/english/bulk/link_tab.txt';
}

$FILE_COMMENT = WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/bulk/comment_cvs.txt';
if (!file_exists($FILE_COMMENT)) {
    $FILE_COMMENT = WEBLINKS_ROOT_PATH . '/language/english/bulk/comment_cvs.txt';
}

$bulk_manage = Admin\BulkManage::getInstance();

$op = $bulk_manage->get_post_op();
$file = $bulk_manage->get_post_file();

switch ($op) {
    case 'view':
        $bulk_manage->print_setting_file($file);
        exit();
        break;
    case 'add_cat':
        if (!$bulk_manage->check_token()) {
            redirect_header('bulk_manage.php', 5, 'Token Error');
            exit();
        }

        $cid = $bulk_manage->get_post_cid();
        $cat_lines = $bulk_manage->get_post_catlist();

        if (!$bulk_manage->check_lines($cat_lines)) {
            redirect_header('bulk_manage.php', 2, _NO_CATEGORY);
            exit();
        }

        xoops_cp_header();
        weblinks_admin_print_bread(_AM_WEBLINKS_BULK_IMPORT, 'bulk_manage.php', _AM_WEBLINKS_BULK_CAT);
        $bulk_manage->add_cat($cid, $cat_lines);
        break;
    case 'add_link':
        if (!$bulk_manage->check_token()) {
            redirect_header('bulk_manage.php', 5, 'Token Error');
            exit();
        }

        $link_lines = $bulk_manage->get_post_linklist();

        if (!$bulk_manage->check_lines($link_lines)) {
            redirect_header('index.php', 2, _NO_LINK);
            exit();
        }

        xoops_cp_header();
        weblinks_admin_print_bread(_AM_WEBLINKS_BULK_IMPORT, 'bulk_manage.php', _AM_WEBLINKS_BULK_LINK);
        $bulk_manage->add_link($link_lines);
        break;
    case 'add_link_optional':
        if (!$bulk_manage->check_token()) {
            redirect_header('bulk_manage.php', 5, 'Token Error');
            exit();
        }

        $link_lines = $bulk_manage->get_post_linklist();

        if (!$bulk_manage->check_lines($link_lines)) {
            redirect_header('index.php', 2, _NO_LINK);
            exit();
        }

        xoops_cp_header();
        weblinks_admin_print_bread(_AM_WEBLINKS_BULK_IMPORT, 'bulk_manage.php', _AM_WEBLINKS_BULK_LINK);
        $bulk_manage->add_link_optional($link_lines);
        break;
    case 'add_comment':
        if (!$bulk_manage->check_token()) {
            redirect_header('bulk_manage.php', 5, 'Token Error');
            exit();
        }

        $comment_lines = $bulk_manage->get_post_comment_list();

        if (!$bulk_manage->check_lines($comment_lines)) {
            redirect_header('bulk_manage.php', 2, _AM_WEBLINKS_NO_COMMENT);
            exit();
        }

        xoops_cp_header();
        weblinks_admin_print_bread(_AM_WEBLINKS_BULK_IMPORT, 'bulk_manage.php', _AM_WEBLINKS_BULK_COMMENT);
        $bulk_manage->add_comment($comment_lines);
        break;
    case 'file_cat':
        xoops_cp_header();
        $bulk_manage->file_cat($file);
        break;
    case 'file_link':
        xoops_cp_header();
        $bulk_manage->file_link($file);
        break;
    case 'form_link':
        xoops_cp_header();
        weblinks_admin_print_header();
        weblinks_admin_print_menu();
        $bulk_manage->print_menu();
        $bulk_manage->print_form_link($FILE_LINK);
        break;
    case 'form_link_optional':
        xoops_cp_header();
        weblinks_admin_print_header();
        weblinks_admin_print_menu();
        $bulk_manage->print_menu();
        $bulk_manage->print_form_link_optional($FILE_LINK_2);
        break;
    case 'form_file_cat':
        xoops_cp_header();
        weblinks_admin_print_header();
        weblinks_admin_print_menu();
        echo '<h3>' . _AM_WEBLINKS_BULK_IMPORT . "</h3>\n";
        $bulk_manage->print_form_file($TITLE_FILE_CAT, $DESC_FILE_CAT, $FILE_FILE_CAT, 'file_cat');
        break;
    case 'form_file_link':
        xoops_cp_header();
        weblinks_admin_print_header();
        weblinks_admin_print_menu();
        echo '<h3>' . _AM_WEBLINKS_BULK_IMPORT . "</h3>\n";
        $bulk_manage->print_form_file($TITLE_FILE_LINK, $DESC_FILE_LINK, $FILE_FILE_LINK, 'file_link');
        break;
    case 'form_comment':
        xoops_cp_header();
        weblinks_admin_print_header();
        weblinks_admin_print_menu();
        $bulk_manage->print_menu();
        $bulk_manage->print_form_comment($FILE_COMMENT);
        break;
    case 'form_cat':
    case 'menu':
    default:
        xoops_cp_header();
        weblinks_admin_print_header();
        weblinks_admin_print_menu();
        $bulk_manage->print_menu();
        $bulk_manage->print_form_category($FILE_CAT);
        break;
}

weblinks_admin_print_footer();
xoops_cp_footer();
exit();
// --- end of main ---

?>
