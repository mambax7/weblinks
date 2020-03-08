<?php
// $Id: weblinks_get_handler.php,v 1.3 2006/09/30 03:27:57 ohwada Exp $

// 2006-09-20 K.OHWADA
// use happy_linux_get_handler

// 2006-04-17 K.OHWADA
// suppress notice : Only variable references should be returned by reference

//=========================================================
// WebLinks Module
// 2006-01-01 K.OHWADA
//=========================================================

// --- weblinks_get_handler begin ---
if (!function_exists('weblinks_get_handler')) {
    function &weblinks_getHandler($name = null, $module_dir = null)
    {
        $ret = happy_linux_getHandler($name, $module_dir, 'weblinks');

        return $ret;
    }
}// --- weblinks_get_handler end ---
