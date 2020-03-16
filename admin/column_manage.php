<?php

use XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: column_manage.php,v 1.1 2007/08/08 04:18:25 ohwada Exp $

//=========================================================
// WebLinks Module
// 2007-08-01 K.OHWADA
//=========================================================

include 'admin_header.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/config_base_handler.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/config_define_handler.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/config_store_handler.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_config2_handler.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_config2_define_handler.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_linkitem_handler.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_linkitem_define_handler.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_linkitem_store_handler.php';

//=========================================================
// main
//=========================================================
$manage = Admin\ColumnManage::getInstance();

$op = $manage->get_post_op();
$error = '';

if ('add_column' == $op) {
    if (!$manage->check_token()) {
        redirect_header('column_manage.php', 5, 'Token Error');
        exit();
    }

    $error = $manage->add_column();
}

xoops_cp_header();
weblinks_admin_print_header();
weblinks_admin_print_menu();
echo '<h4>' . _AM_WEBLINKS_COLUMN_MANAGE . "</h4>\n";
echo _AM_WEBLINKS_COLUMN_MANAGE_DESC . "<br><br>\n";

if (WEBLINKS_USE_LINK_NUM_ETC) {
    if ($error) {
        $manage->print_error_in_div($error, false);
    }
    $manage->print_form();
} else {
    echo '<h4 style="color: #ff0000;">' . _AM_WEBLINKS_COLUMN_MANAGE_NOT_USE . "</h4>\n";
}

xoops_cp_footer();
exit();
