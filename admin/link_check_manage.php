<?php

use XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: link_check_manage.php,v 1.2 2008/02/27 01:45:06 ohwada Exp $

// 2008-02-17 K.OHWADA
// change file name link_broken_check.php -> link_check_manage.php
// update_pagerank()

// 2007-11-01 K.OHWADA
// set_flag_execute_time()

// 2007-06-10 K.OHWADA
// bin_file.php

// 2007-02-20 K.OHWADA
// hack for multi site

// 2006-10-01 K.OHWADA
// use happy_linux
// use XoopsGTicket
// use weblinks_locate

// 2006-05-15 K.OHWADA
// new handler
// add class LinkBrokenCheckForm
// use token ticket

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//=========================================================
// WebLinks Module
// 2004-10-20 K.OHWADA
//=========================================================

include 'admin_header.php';

//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/file.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/bin_file.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/locate.php';
//
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_locate.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_check_base.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_check_handler.php';
include_once WEBLINKS_ROOT_PATH . '/admin/admin_functions.php';

//=========================================================
// main
//=========================================================
// hack for multi site
weblinks_admin_multi_disable_feature();

$manage = Admin\LinkCheckManage::getInstance();
$op = $manage->get_post_op();

switch ($op) {
    case 'check':
        $manage->check_link();
        break;
    case 'update':
        $manage->update_pagerank();
        break;
    default:
        $manage->main_form();
        break;
}

xoops_cp_footer();
exit(); // --- end of main ---
