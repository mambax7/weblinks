<?php
// $Id: modules.php,v 1.1 2007/10/13 07:25:35 ohwada Exp $

//=========================================================
// WebLinks Module
// 2007-10-10 K.OHWADA
//=========================================================

include '../../../include/cp_header.php';
include_once XOOPS_ROOT_PATH . '/modules/happylinux/api/admin.php';

//=========================================================
// main
//=========================================================
xoops_cp_header();

$admin = Happylinux\Admin::getInstance();
$admin->print_modules();

xoops_cp_footer();
exit(); // --- end of main ---
