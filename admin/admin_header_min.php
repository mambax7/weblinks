<?php
// $Id: admin_header_min.php,v 1.5 2008/02/16 10:40:26 ohwada Exp $

// 2008-02-16 K.OHWADA
// BUG: Fatal error, if not exist happy_linux

// 2007-11-11 K.OHWADA
// divid from admin_header.php
// minimum to necessary

//=========================================================
// WebLinks Module
// admin header
// 2004-10-13 K.OHWADA
//=========================================================

use XoopsModules\Happylinux;

//---------------------------------------------------------
// system
//---------------------------------------------------------
include dirname(__DIR__) . '/preloads/autoloader.php';

require dirname(dirname(dirname(__DIR__))) . '/include/cp_header.php';
//require $GLOBALS['xoops']->path('www/class/xoopsformloader.php');
require dirname(__DIR__) . '/include/common.php';

$moduleDirName = basename(dirname(__DIR__));

$helper = \XoopsModules\Weblinks\Helper::getInstance();

/** @var \Xmf\Module\Admin $adminObject */
$adminObject = \Xmf\Module\Admin::getInstance();

//$myts = \MyTextSanitizer::getInstance();

//if (!isset($GLOBALS['xoopsTpl']) || !($GLOBALS['xoopsTpl'] instanceof XoopsTpl)) {
//    require $GLOBALS['xoops']->path('class/template.php');
//    $xoopsTpl = new XoopsTpl();
//}

//$pathIcon16      = Xmf\Module\Admin::iconUrl('', 16);
//$pathIcon32      = Xmf\Module\Admin::iconUrl('', 32);
//$pathModIcon32 = $helper->getModule()->getInfo('modicons32');

// Local icons path
//$xoopsTpl->assign('pathIcon16', $pathIcon16);
//$xoopsTpl->assign('pathIcon32', $pathIcon32);

// Load language files
$helper->loadLanguage('admin');
$helper->loadLanguage('modinfo');
$helper->loadLanguage('common');

$XOOPS_LANGUAGE = $xoopsConfig['language'];

// system user.php
if (file_exists(XOOPS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/user.php')) {
    include_once XOOPS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/user.php';
} else {
    include_once XOOPS_ROOT_PATH . '/language/english/user.php';
}

//---------------------------------------------------------
// weblinks constant
//---------------------------------------------------------
if (!defined('WEBLINKS_DIRNAME')) {
    define('WEBLINKS_DIRNAME', $xoopsModule->dirname());
}

if (!defined('WEBLINKS_ROOT_PATH')) {
    define('WEBLINKS_ROOT_PATH', XOOPS_ROOT_PATH . '/modules/' . WEBLINKS_DIRNAME);
}

if (!defined('WEBLINKS_URL')) {
    define('WEBLINKS_URL', XOOPS_URL . '/modules/' . WEBLINKS_DIRNAME);
}

include_once WEBLINKS_ROOT_PATH . '/include/weblinks_version.php';
include_once WEBLINKS_ROOT_PATH . '/include/weblinks_constant.php';

//---------------------------------------------------------
// happy_linux
//---------------------------------------------------------
if (!file_exists(XOOPS_ROOT_PATH . '/modules/happylinux/include/version.php')) {
    xoops_cp_header();
    xoops_error('require happy_linux module');
    xoops_cp_footer();
    exit();
}

include_once XOOPS_ROOT_PATH . '/modules/happylinux/include/version.php';

// check happy_linux version
if (HAPPYLINUX_VERSION < WEBLINKS_HAPPYLINUX_VERSION) {
    $msg = 'require happy_linux module v' . WEBLINKS_HAPPYLINUX_VERSION . ' or later';
    xoops_cp_header();
    xoops_error($msg);
    xoops_cp_footer();
    exit();
}

// start execution time
$happy_linux_time = Happylinux\Time::getInstance(true);
if (WEBLINKS_DEBUG_TIME) {
    $happy_linux_time->print_lap_time();
}

include_once XOOPS_ROOT_PATH . '/modules/happylinux/include/memory.php';
include_once XOOPS_ROOT_PATH . '/modules/happylinux/include/functions.php';
include_once XOOPS_ROOT_PATH . '/modules/happylinux/include/multibyte.php';
include_once XOOPS_ROOT_PATH . '/modules/happylinux/include/gtickets.php';
include_once XOOPS_ROOT_PATH . '/modules/happylinux/api/language.php';
include_once XOOPS_ROOT_PATH . '/modules/happylinux/api/locate.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/error.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/strings.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/system.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/basic_handler.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/admin_menu.php';

//---------------------------------------------------------
// weblinks
//---------------------------------------------------------
include_once WEBLINKS_ROOT_PATH . '/include/functions.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_bin_handler.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_basic_handler.php';

// for main.php
if (file_exists(WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/main.php')) {
    include_once WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/main.php';
} else {
    include_once WEBLINKS_ROOT_PATH . '/language/english/main.php';
}

// for modinfo.php
if (file_exists(WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/modinfo.php')) {
    include_once WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/modinfo.php';
} else {
    include_once WEBLINKS_ROOT_PATH . '/language/english/modinfo.php';
}

// compatible to old version
include_once WEBLINKS_ROOT_PATH . '/language/compatible.php';

include_once WEBLINKS_ROOT_PATH . '/admin/admin_functions.php';

//---------------------------------------------------------
// config
//---------------------------------------------------------
//$weblinks_config_handler = weblinks_get_handler('Config2Basic', WEBLINKS_DIRNAME);
$weblinks_config_handler = $helper->getHandler('Config2Basic');
$weblinks_config_handler->init();
$rss_dirname = $weblinks_config_handler->get_conf_by_name('rss_dirname');
$rss_use     = $weblinks_config_handler->get_conf_by_name('rss_use');

//---------------------------------------------------------
// rssc
//---------------------------------------------------------
if (!defined('WEBLINKS_RSSC_DIRNAME')) {
    define('WEBLINKS_RSSC_DIRNAME', $rss_dirname);
}

if (!defined('WEBLINKS_RSSC_ROOT_PATH')) {
    define('WEBLINKS_RSSC_ROOT_PATH', XOOPS_ROOT_PATH . '/modules/' . WEBLINKS_RSSC_DIRNAME);
}

if (!defined('WEBLINKS_RSSC_URL')) {
    define('WEBLINKS_RSSC_URL', XOOPS_URL . '/modules/' . WEBLINKS_RSSC_DIRNAME);
}

// rssc module install check
$module_handler = xoops_getHandler('module');
$module         = $module_handler->getByDirname(WEBLINKS_RSSC_DIRNAME);
if (is_object($module)) {
    // rssc module exists check, if missed to remove files
    if (file_exists(WEBLINKS_RSSC_ROOT_PATH . '/include/rssc_version.php')) {
        include_once WEBLINKS_RSSC_ROOT_PATH . '/include/rssc_version.php';

        define('WEBLINKS_RSSC_EXIST', 1);
        if ($rss_use) {
            define('WEBLINKS_RSSC_USE', 1);
        }
    }
}

if (!defined('WEBLINKS_RSSC_EXIST')) {
    define('WEBLINKS_RSSC_EXIST', 0);
}

if (!defined('WEBLINKS_RSSC_USE')) {
    define('WEBLINKS_RSSC_USE', 0);
}

// check rssc version
if (WEBLINKS_RSSC_USE && (RSSC_VERSION < WEBLINKS_RSSC_VERSION)) {
    $msg = 'require rssc module v' . WEBLINKS_RSSC_VERSION . ' or later';
    xoops_cp_header();
    xoops_error($msg);
    xoops_cp_footer();
    exit();
}
