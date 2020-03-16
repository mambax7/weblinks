<?php

use XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: votedata_manage.php,v 1.3 2007/11/11 03:22:59 ohwada Exp $

// 2007-11-01 K.OHWADA
// set_flag_execute_time()

// 2007-02-20 K.OHWADA
// hack for multi site

// 2006-09-20 K.OHWADA
// this new file

//================================================================
// WebLinks Module
// 2006-09-20 K.OHWADA
//================================================================
include 'admin_header.php';


//=========================================================
// main
//=========================================================
// hack for multi site
weblinks_admin_multi_redirect_jp_site();

$manage = Admin\VotedataManage::getInstance();

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
