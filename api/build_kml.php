<?php
// $Id: build_kml.php,v 1.1 2008/02/26 16:08:22 ohwada Exp $

//=========================================================
// WebLinks Module
// 2008-02-17 K.OHWADA
//=========================================================

//---------------------------------------------------------
// system
//---------------------------------------------------------
include_once XOOPS_ROOT_PATH . '/class/template.php';

//---------------------------------------------------------
// happy_linux
//---------------------------------------------------------
include_once XOOPS_ROOT_PATH . '/modules/happylinux/include/functions.php';
include_once XOOPS_ROOT_PATH . '/modules/happylinux/include/multibyte.php';
include_once XOOPS_ROOT_PATH . '/modules/happylinux/include/sanitize.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/build_xml.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/build_kml.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/error.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/system.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/strings.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/plugin.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/basic_object.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/basic_handler.php';

//---------------------------------------------------------
// whatsnew
//---------------------------------------------------------
if (!isset($WEBLINKS_DIRNAME)) {
    $WEBLINKS_DIRNAME = basename(dirname(__DIR__));
}

include_once XOOPS_ROOT_PATH . '/modules/' . $WEBLINKS_DIRNAME . '/include/weblinks_constant.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $WEBLINKS_DIRNAME . '/include/functions.php';
//include_once XOOPS_ROOT_PATH . '/modules/' . $WEBLINKS_DIRNAME . '/class/weblinks_link_view_basic.php';
//include_once XOOPS_ROOT_PATH . '/modules/' . $WEBLINKS_DIRNAME . '/class/weblinks_link_bin_handler.php';
//include_once XOOPS_ROOT_PATH . '/modules/' . $WEBLINKS_DIRNAME . '/class/weblinks_link_basic_handler.php';
//include_once XOOPS_ROOT_PATH . '/modules/' . $WEBLINKS_DIRNAME . '/class/weblinks_build_kml_handler.php';
//include_once XOOPS_ROOT_PATH . '/modules/' . $WEBLINKS_DIRNAME . '/class/weblinks_htmlout.php';
//include_once XOOPS_ROOT_PATH . '/modules/' . $WEBLINKS_DIRNAME . '/htmlout/weblinks_htmlout_base.php';
