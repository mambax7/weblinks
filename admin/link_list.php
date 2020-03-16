<?php

use XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: link_list.php,v 1.3 2012/04/10 03:54:50 ohwada Exp $

// 2012-04-02 K.OHWADA
// link_geocoding.php
// link_csv.php

// 2007-11-11 K.OHWADA
// set_config_google_server()
// set_flag_execute_time()

// 2007-09-01 K.OHWADA
// sortid:7 _AM_WEBLINKS_LINK_USERCOMMENT_DESC
// _get_op_sortid_array()

// 2007-03-17 K.OHWADA
// BUG 4506: expired links not listed

// 2007-02-20 K.OHWADA
// hack for multi site

// 2006-12-10 K.OHWADA
// use time_publish time_expire

// 2006-10-05 K.OHWADA
// use happy_linux

// 2006-05-15 K.OHWADA
// new handler
// add class LinkList

// 2006-03-15 K.OHWADA
// use weblinks_pagenavi_basic::getInstance()

// 2006-01-06 K.OHWADA
// weblinks ver 1.0
// module depulication

//================================================================
// WebLinks Module
// view link list
// 2004-12-14 K.OHWADA
//================================================================

include 'admin_header.php';
include 'admin_header_list.php';


//=========================================================
// main
//=========================================================
xoops_cp_header();

weblinks_admin_print_header();
weblinks_admin_print_menu();

$list = Admin\LinkList::getInstance();
$list->_show();

xoops_cp_footer();
exit(); // --- end of main ---
