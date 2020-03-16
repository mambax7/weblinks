<?php

use XoopsModules\Weblinks\Admin;
use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;


// $Id: output_plugin_manage.php,v 1.1 2008/02/26 16:06:47 ohwada Exp $

//=========================================================
// WebLinks Module
// 2008-02-17 K.OHWADA
//=========================================================

include 'admin_header.php';

//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/plugin.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/plugin_manage.php';

//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_htmlout.php';
//include_once WEBLINKS_ROOT_PATH . '/htmlout/weblinks_htmlout_base.php';


//=========================================================
// main
//=========================================================

include_once 'admin_header.php';
include_once 'admin_header_config.php';

// hack for multi site
weblinks_admin_multi_disable_feature();

// class
$config_form = Admin\ConfigForm::getInstance();
$config_store = Admin\ConfigStore::getInstance();
$manage = Admin\OutputPluginManage::getInstance();

$op = $config_form->get_post_get_op();

switch ($op) {
    case 'save':
        if (!$config_form->check_token()) {
            xoops_cp_header();
            $config_form->print_xoops_token_error();
        } else {
            $config_store->save_config();
            redirect_header('output_plugin_manage.php', 1, _HAPPYLINUX_UPDATED);
        }
        break;
    case 'execute':
        xoops_cp_header();
        weblinks_admin_print_bread(_AM_WEBLINKS_OUTPUT_PLUGIN_MANAGE, 'output_plugin_manage.php', _HAPPYLINUX_PLUGIN_TEST);
        $manage->execute();
        xoops_cp_footer();
        exit();
        break;
    default:
        xoops_cp_header();
        break;
}

weblinks_admin_print_header();
weblinks_admin_print_menu();

echo '<h4>' . _AM_WEBLINKS_OUTPUT_PLUGIN_MANAGE . "</h4>\n";

$config_form->set_form_title(_AM_WEBLINKS_HTMLOUT);
$config_form->show_by_catid(39);
echo "<br>\n";

$config_form->set_form_title(_AM_WEBLINKS_RSSOUT);
$config_form->show_by_catid(40);
echo "<br>\n";

$config_form->set_form_title(_AM_WEBLINKS_KMLOUT);
$config_form->show_by_catid(41);
echo "<br>\n";

$manage->show_form();

weblinks_admin_print_footer();
xoops_cp_footer();
exit(); // --- end of main ---
