<?php

use XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: link_geocoding.php,v 1.2 2012/04/10 11:24:42 ohwada Exp $

//================================================================
// WebLinks Module
// 2012-04-02 K.OHWADA
//================================================================

include 'admin_header.php';
include 'admin_header_list.php';

//include_once WEBLINKS_ROOT_PATH . '/class/Address.php';


//=========================================================
// main
//=========================================================
$manage = Admin\ManageGeocoding::getInstance(WEBLINKS_DIRNAME);
$list = Admin\LinkGeocoding::getInstance(WEBLINKS_DIRNAME);

$op = $manage->get_op();
switch ($op) {
    case 'mod_all':
        $manage->main_mod_all();
        break;
    default:
        xoops_cp_header();
        $list->_show();
        xoops_cp_footer();
        break;
}

exit(); // --- end of main ---
