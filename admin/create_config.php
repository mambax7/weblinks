<?php

use XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: create_config.php,v 1.6 2007/10/22 02:23:04 ohwada Exp $

// 2007-10-10 K.OHWADA
// _HAPPYLINUX_CONF_CREATE_CONFIG

// 2006-09-20 K.OHWADA
// use happy_linux
// remove class admin_config_file
// use bin_pass

// 2006-05-15 K.OHWADA
// use admin_config_file

//================================================================
// WebLinks Module
// create config file for bin/link_check.php
// 2004-10-20 K.OHWADA
//================================================================
include 'admin_header.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/config_file.php';

$conf_handler = weblinks_get_handler('Config2Basic', WEBLINKS_DIRNAME);
$config_file = Happylinux\ConfigFile::getInstance();

$DIR_CONFIG = WEBLINKS_ROOT_PATH . '/cache';
$FILE_CONFIG = $DIR_CONFIG . '/config.php';

xoops_cp_header();

$conf = &$conf_handler->get_conf();
$pass = $conf['bin_pass'];
$url = WEBLINKS_URL . '/bin/link_check.php?pass=' . $pass . '&amp;limit=10';

weblinks_admin_print_bread(_HAPPYLINUX_CONF_COMMAND_MANAGE, 'command_manage.php', _HAPPYLINUX_CONF_CREATE_CONFIG);
echo '<h3>' . _HAPPYLINUX_CONF_CREATE_CONFIG . "</h3>\n";
echo "Create config file for bin/link_check.php <br><br>\n";

if (is_writable($DIR_CONFIG)) {
    $config_file->_save_config($FILE_CONFIG);

    echo "<hr>\n";
    echo '<h4>' . _HAPPYLINUX_CREATED . "</h4>\n";
    echo '<a href="' . $url . '">' . _HAPPYLINUX_CONF_TEST_BIN . ": bin/link_check.php</a><br><br>\n";
} else {
    echo "<h3 style='color: #ff0000'>" . _HAPPYLINUX_CONF_NOT_WRITABLE . "</h3>\n";
    echo "$DIR_CONFIG <br><br>\n";
}

xoops_cp_footer();
exit();
