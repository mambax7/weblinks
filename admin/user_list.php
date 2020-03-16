<?php

use XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: user_list.php,v 1.13 2007/11/12 12:41:13 ohwada Exp $

// 2007-11-01 K.OHWADA
// set_flag_execute_time()

// 2007-07-16 K.OHWADA
// XC 2.1
// _print_form_begin()

// 2007-05-06 K.OHWADA
// BUG 4565: cannot show user manage, when too many links or users
// use weblinks_users_link_handler.php
// remove init() get_uid_list()
// remove _get_lid_array_with_email() _get_uid_list_with_use() _get_uid_list_without_use()
// NOT use user_name() user_mail()

// 2006-12-10 K.OHWADA
// use user_name() user_mail()

// 2006-09-20 K.OHWADA
// use happy_linux

// 2006-05-15 K.OHWADA
// new handler
// add class UserList

// 2006-03-15 K.OHWADA
// use weblinks_pagenavi_basic::getInstance()

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//================================================================
// WebLinks Module
// user list
// 2005-01-20 K.OHWADA
//================================================================

include 'admin_header.php';
include 'admin_header_list.php';
include_once WEBLINKS_ROOT_PATH . '/class/weblinks_users_link_handler.php';


//=========================================================
// main
//=========================================================
xoops_cp_header();

weblinks_admin_print_header();
weblinks_admin_print_menu();

$list = Admin\UserList::getInstance();
$list->_show();

xoops_cp_footer();
exit(); // --- end of main ---
