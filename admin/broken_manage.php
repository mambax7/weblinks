<?php

use XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: broken_manage.php,v 1.7 2007/11/11 09:23:10 ohwada Exp $

// 2007-11-01 K.OHWADA
// link_vote_del_handler
// set_flag_execute_time()

// 2007-09-20 K.OHWADA
// Fatal error: Class 'weblinks_link_edit_base_handler' not found
// admin_header_link.php

// 2007-02-20 K.OHWADA
// hack for multi site

// 2006-09-20 K.OHWADA
// use happy_linux
// use XoopsGTicket

// 2006-05-15 K.OHWADA
// new handler
// add class BrokenManage
// use token ticket

// 2006-03-22 K.OHWADA
// new handler: broken

// 2005-10-14 K.OHWADA
// BUG 3095: the number of links does not change, if delete link
// use del_link_vote_comm_catlink_by_lid($lid)

// 2005-09-04 K.OHWADA
// BUG 2932: dont work correctly when register_long_arrays = off

//================================================================
// WebLinks Module
// 2006-09-01 K.OHWADA
//================================================================

include 'admin_header.php';
include 'admin_header_list.php';

//=========================================================
// main
//=========================================================
// hack for multi site
weblinks_admin_multi_redirect_jp_site();

$manage = Admin\BrokenManage::getInstance();

$op = $manage->_main_get_op();

switch ($op) {
    case 'mod_form':
        $manage->mod_form();
        break;
    case 'mod_table':
        $manage->mod_table();
        break;
    case 'del_table':
        $manage->del_table();
        break;
    case 'del_all':
        $manage->del_all();
        break;
    default:
        xoops_cp_header();
        echo '<h4>No Action</h4>';
        break;
}

xoops_cp_footer();
exit(); // --- end of main ---
