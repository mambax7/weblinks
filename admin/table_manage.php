<?php

use XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: table_manage.php,v 1.7 2007/12/24 20:15:19 ohwada Exp $

// 2007-12-24 K.OHWADA
// _print_menu_rebuild_search()

// 2007-11-24 K.OHWADA
// divid to table_manage_zombie.php
// move clean_xml() from table_clean_xml.php
// Happylinux\TableManage()

// 2007-11-01 K.OHWADA
// weblinks_admin_print_footer()

// 2007-10-10 K.OHWADA
// xoops block table

// 2007-02-20 K.OHWADA
// hack for multi site
// show_clean_xml()

// 2006-09-20 K.OHWADA
// use happy_linux

// 2006-05-15 K.OHWADA
// use weblinks_db_basic_base

// 2005-10-14 K.OHWADA
// corresponding to too many links

//================================================================
// WebLinks Module
// check table validation
// 2005-01-20 K.OHWADA
//================================================================

include 'admin_header.php';
include 'admin_header_config.php';

include_once XOOPS_ROOT_PATH . '/modules/happylinux/api/module_install.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/table_manage.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/xoops_block_checker.php';

//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_modify.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_install.php';
//include_once WEBLINKS_ROOT_PATH . '/admin/table_manage_zombie_class.php';


//================================================================
// main
//================================================================
// hack for multi site
weblinks_admin_multi_disable_feature();

$manage = Admin\TableManage::getInstance();

$op = $manage->get_post_op();

switch ($op) {
    case 'renew_config':
        $manage->renew_config();
        break;
    case 'clean_xml':
        $manage->clean_xml();
        break;
    case 'remove_block':
        xoops_cp_header();
        $manage->remove_block();
        break;
    case 'menu':
    default:
        xoops_cp_header();
        $manage->menu();
        break;
}

weblinks_admin_print_footer();
xoops_cp_footer();
exit(); // --- main end ---
