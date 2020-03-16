<?php
// $Id: dev_header.php,v 1.7 2008/02/26 16:01:39 ohwada Exp $

// 2008-02-17 K.OHWADA
// server.php -> browser.php

// 2007-10-30 K.OHWADA
// weblinks_auth

// 2007-09-20 K.OHWADA
// weblinks_link_bin_handler.php

// 2007-06-01 K.OHWADA
// weblinks_link_catlink_basic_handler

// 2007-03-01 K.OHWADA
// functions.php

//================================================================
// WebLinks Module
// 2006-12-10 K.OHWADA
//================================================================

include '../../../mainfile.php';

//===== header.php begin =====
// set module object
$url_arr = explode('/', mb_strstr($xoopsRequestUri, '/modules/'));
$module_handler = xoops_getHandler('module');
$xoopsModule = $module_handler->getByDirname($url_arr[2]);
unset($url_arr);

// set config values for this module
if (1 == $xoopsModule->getVar('hasconfig') || 1 == $xoopsModule->getVar('hascomments')) {
    $config_handler    = xoops_getHandler('config');
    $xoopsModuleConfig = &$config_handler->getConfigsByCat(0, $xoopsModule->getVar('mid'));
}

// include the default language file for the admin interface
if (file_exists('../language/' . $xoopsConfig['language'] . '/main.php')) {
    include '../language/' . $xoopsConfig['language'] . '/main.php';
} elseif (file_exists('../language/english/main.php')) {
    include '../language/english/main.php';
}
//===== header.php end =====

include_once XOOPS_ROOT_PATH . '/class/xoopstree.php';
include_once XOOPS_ROOT_PATH . '/class/snoopy.php';

//---------------------------------------------------------
// happy_linux
//---------------------------------------------------------
include_once XOOPS_ROOT_PATH . '/modules/happylinux/include/version.php';
include_once XOOPS_ROOT_PATH . '/modules/happylinux/include/functions.php';
include_once XOOPS_ROOT_PATH . '/modules/happylinux/include/multibyte.php';
include_once XOOPS_ROOT_PATH . '/modules/happylinux/include/search.php';
include_once XOOPS_ROOT_PATH . '/modules/happylinux/api/language.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/language.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/time.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/error.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/strings.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/highlight.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/post.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/system.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/dir.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/image_size.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/remote_file.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/remote_image.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/convert_encoding.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/html.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/form.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/form_lib.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/pagenavi.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/search.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/basic_object.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/basic_handler.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/object.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/object_validater.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/object_handler.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/config_define_handler.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/browser.php';

//---------------------------------------------------------
// weblinks
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

$XOOPS_LANGUAGE = $xoopsConfig['language'];

// include file
include_once WEBLINKS_ROOT_PATH . '/include/weblinks_version.php';
include_once WEBLINKS_ROOT_PATH . '/include/weblinks_constant.php';
include_once WEBLINKS_ROOT_PATH . '/include/functions.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_menu.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_template.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_config2_basic_handler.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_bin_handler.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_basic_handler.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_handler.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_category_handler.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_catlink_handler.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_catlink_basic_handler.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_banner_handler.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_modify.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_modify_handler.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_auth.php';

// search.php
if (file_exists(XOOPS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/search.php')) {
    include_once XOOPS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/search.php';
} else {
    include_once XOOPS_ROOT_PATH . '/language/english/search.php';
}

// user.php
if (file_exists(XOOPS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/user.php')) {
    include_once XOOPS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/user.php';
} else {
    include_once XOOPS_ROOT_PATH . '/language/english/user.php';
}

// compatible to old version
include_once WEBLINKS_ROOT_PATH . '/language/compatible.php';

//---------------------------------------------------------
// locate
//---------------------------------------------------------
$weblinks_config_handler = weblinks_get_handler('Config2Basic', WEBLINKS_DIRNAME);
$weblinks_config_handler->init();
$country_code = $weblinks_config_handler->get_conf_by_name('country_code');
$rss_dirname = $weblinks_config_handler->get_conf_by_name('rss_dirname');
$rss_use = $weblinks_config_handler->get_conf_by_name('rss_use');

//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/locate.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_locate.php';

//---------------------------------------------------------
// dev
//---------------------------------------------------------
include_once WEBLINKS_ROOT_PATH . '/admin/dev/dev_handler_class.php';
include_once WEBLINKS_ROOT_PATH . '/admin/dev/gen_record_class.php';
include_once WEBLINKS_ROOT_PATH . '/admin/dev/test_class_class.php';
include_once WEBLINKS_ROOT_PATH . '/dev/dev_functions.php';
include_once WEBLINKS_ROOT_PATH . '/dev/test_class_user_class.php';

if (WEBLINKS_DEV_PERMIT != 1) {
    dev_header();
    echo '<h1 style="color: #ff0000;">not permit</h1>' . "\n";
    dev_footer();
}

if (!is_object($xoopsUser) && (WEBLINKS_DEV_PERMIT_GUEST != 1)) {
    dev_header();
    echo '<h1 style="color: #ff0000;">not permit</h1>' . "\n";
    dev_footer();
}
