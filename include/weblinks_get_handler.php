<?php
// $Id: weblinks_get_handler.php,v 1.3 2006/09/30 03:27:57 ohwada Exp $

// 2006-09-20 K.OHWADA
// use happylinux_get_handler

// 2006-04-17 K.OHWADA
// suppress notice : Only variable references should be returned by reference

//=========================================================
// WebLinks Module
// 2006-01-01 K.OHWADA
//=========================================================

// --- weblinks_get_handler begin ---
if (!function_exists('weblinks_get_handler')) {
    function &weblinks_get_handler($name = null, $module_dir = null)
    {
        //        $ret = happylinux_get_handler($name, $module_dir, 'weblinks');

        $helperType = '\XoopsModules' . '\\' . ucfirst($module_dir) . '\Helper';
        $helper     = $helperType::getInstance();
        $ret = $helper->getHandler(ucfirst($name));
        return $ret;
    }
}// --- weblinks_get_handler end ---
