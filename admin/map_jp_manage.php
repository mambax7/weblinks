<?php

use XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: map_jp_manage.php,v 1.2 2007/11/11 03:22:59 ohwada Exp $

// 2007-11-01 K.OHWADA
// weblinks_admin_print_footer()
// admin_header_config.php

//=========================================================
// WebLinks Module
// 2007-08-01 K.OHWADA
//=========================================================

include 'admin_header.php';
include 'admin_header_config.php';

//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_map_jp.php';

if (file_exists(WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/map_jp.php')) {
    include_once WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/map_jp.php';
} else {
    include_once WEBLINKS_ROOT_PATH . '/language/english/map_jp.php';
}


//=========================================================
// main
//=========================================================
$manage = Admin\MapManageJp::getInstance();
$config_form = Admin\ConfigForm::getInstance();
$config_store = Admin\ConfigStore::getInstance();

$op = $manage->get_post_op();
$error = '';

if ('save' == $op) {
    if (!$config_form->check_token()) {
        redirect_header('map_jp_manage.php', 5, 'Token Error');
        exit();
    }
    $ret = $config_store->save_config();
    if ($ret) {
        redirect_header('map_jp_manage.php', 1, _WLS_DBUPDATED);
    } else {
        $error = "DB Error <br>\n";
        $error .= $config_store->getErrors(1);
    }
} elseif ('save_map' == $op) {
    if (!$manage->check_token()) {
        redirect_header('map_jp_manage.php', 5, 'Token Error');
        exit();
    }

    $error = $manage->save_map();
}

xoops_cp_header();
$manage->print_header();
weblinks_admin_print_header();
weblinks_admin_print_menu();
echo '<h4>' . _AM_WEBLINKS_MAP_JP_MANAGE . "</h4>\n";
echo _AM_WEBLINKS_MAP_JP_MANAGE_DESC . "<br><br>\n";

$ret = $manage->set_pref_array();
if (!$ret) {
    xoops_error(_HAPPYLINUX_FORM_INIT_NOT);
    echo "<br>\n";
}

if ($error) {
    $manage->print_error_in_div($error, false);
}

$manage->print_map();
echo "<br>\n";

$config_form->show_by_catid(31, _AM_WEBLINKS_MAP_JP_MANAGE);
echo "<br>\n";

$manage->print_form();

weblinks_admin_print_footer();
xoops_cp_footer();
exit();
