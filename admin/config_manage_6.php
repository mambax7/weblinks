<?php

use XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: config_manage_6.php,v 1.2 2012/04/09 10:20:04 ohwada Exp $

// 2012-04-02 K.OHWADA
// ConfigForm6
// weblinks_webmap

// 2008-02-17 K.OHWADA
// print_kml_list()

// 2007-11-11 K.OHWADA
// move form_locate from config_manage_4.php
// weblinks_admin_print_footer()

// 2007-09-20 K.OHWADA
// admin_header_config.php

// 2007-08-01 K.OHWADA
// divid from config_manage_4.php

//=========================================================
// WebLinks Module
// 2006-10-05 K.OHWADA
//=========================================================

include_once 'admin_header.php';
include_once 'admin_header_config.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_block_webmap.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_webmap.php';

//================================================================
// main
//================================================================

$config_form = Admin\ConfigForm::getInstance();
$config_store = Admin\ConfigStore::getInstance();
$weblinks_header = Weblinks\Header::getInstance(WEBLINKS_DIRNAME);

$op = $config_form->get_post_get_op();

if ('save' == $op) {
    if (!$config_form->check_token()) {
        xoops_cp_header();
        xoops_error('Token Error');
        echo "<br>\n";
        echo $config_form->get_token_error(1);
        echo "<br>\n";
    } else {
        $ret = $config_store->save_config();
        if ($ret) {
            redirect_header('config_manage_6.php', 1, _WLS_DBUPDATED);
        } else {
            xoops_cp_header();
            xoops_error('DB Error');
            echo $config_store->getErrors(1);
        }
    }
} elseif ('renew' == $op) {
    if (!$config_form->check_token()) {
        xoops_cp_header();
        xoops_error('Token Error');
        echo "<br>\n";
        echo $config_form->get_token_error(1);
        echo "<br>\n";
    } else {
        $ret = $config_store->renew_config();
        if ($ret) {
            redirect_header('config_manage_6.php', 1, _WLS_DBUPDATED);
        } else {
            xoops_cp_header();
            xoops_error('DB Error');
            echo $config_store->getErrors(1);
        }
    }
} else {
    xoops_cp_header();
}

echo $weblinks_header->build_module_header_submit();

weblinks_admin_print_header();
weblinks_admin_print_menu();
$config_form->print_menu_6();
echo "<br>\n";
$config_form->set_submit_value(_WEBLINKS_UPDATE);
$config_form->init_form();

// google map
echo '<a name="form_google_map"></a>' . "\n";
echo '<h4>' . _AM_WEBLINKS_CONF_GOOGLE_MAP . "</h4>\n";

$config_form->print_webmap3_module_installed();
$ret = $config_form->webmap_init();
if ($ret) {
    echo $config_form->build_webmap_iframe();
}

$config_form->show_by_catid(21, _AM_WEBLINKS_CONF_GOOGLE_MAP);

echo '<a name="form_index"></a>' . "\n";
echo '<h4>' . _AM_WEBLINKS_CONF_INDEX . "</h4>\n";
$config_form->show_by_catid(29, _AM_WEBLINKS_CONF_INDEX);

echo '<a name="form_cat_page"></a>' . "\n";
echo '<h4>' . _AM_WEBLINKS_CONF_CAT_PAGE . "</h4>\n";
$config_form->show_by_catid(30, _AM_WEBLINKS_CONF_CAT_PAGE);

echo '<a name="form_locate"></a>' . "\n";
echo '<h4>' . _AM_WEBLINKS_CONF_LOCATE . "</h4>\n";
$config_form->show_form_country_code(_AM_WEBLINKS_CONF_LOCATE);

echo '<a name="form_map"></a>' . "\n";
echo '<h4>' . _AM_WEBLINKS_CONF_MAP . "</h4>\n";
$config_form->show_by_catid(20, _AM_WEBLINKS_CONF_MAP);
echo "<br>\n";

echo '<a name="form_google_seach"></a>' . "\n";
echo '<h4>' . _AM_WEBLINKS_CONF_GOOGLE_SEARCH . "</h4>\n";
$config_form->show_by_catid(22, _AM_WEBLINKS_CONF_GOOGLE_SEARCH);

$config_form->print_kml_list();

weblinks_admin_print_footer();
xoops_cp_footer();
exit(); // --- main end ---
