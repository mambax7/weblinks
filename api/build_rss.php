<?php
// $Id: build_rss.php,v 1.2 2008/02/26 16:01:35 ohwada Exp $

// 2008-02-17 K.OHWADA
// weblinks_link_view_basic.php

//=========================================================
// WebLinks Module
// 2007-10-10 K.OHWADA
//=========================================================

//---------------------------------------------------------
// happy_linux
//---------------------------------------------------------
include_once XOOPS_ROOT_PATH . '/modules/happylinux/api/rss_builder.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/plugin.php';

//---------------------------------------------------------
// whatsnew
//---------------------------------------------------------
if (!isset($WEBLINKS_DIRNAME)) {
    $WEBLINKS_DIRNAME = basename(dirname(__DIR__));
}

//include_once XOOPS_ROOT_PATH . '/modules/' . $WEBLINKS_DIRNAME . '/class/weblinks_link_view_basic.php';
//include_once XOOPS_ROOT_PATH . '/modules/' . $WEBLINKS_DIRNAME . '/class/weblinks_link_view.php';
//include_once XOOPS_ROOT_PATH . '/modules/' . $WEBLINKS_DIRNAME . '/class/BuildRssHandler.php';
//include_once XOOPS_ROOT_PATH . '/modules/' . $WEBLINKS_DIRNAME . '/class/weblinks_htmlout.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $WEBLINKS_DIRNAME . '/htmlout/weblinks_htmlout_base.php';
