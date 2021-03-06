<?php
// $Id: kml.php,v 1.1 2008/02/26 16:03:05 ohwada Exp $

//=========================================================
// WebLinks Module
// 2008-02-17 K.OHWADA
//=========================================================

$WEBLINKS_DIRNAME = basename(dirname(__DIR__));

include '../../../mainfile.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $WEBLINKS_DIRNAME . '/api/build_kml.php';

//=========================================================
// main
//=========================================================
$weblinks_config_handler = weblinks_get_handler('Config2Basic', $WEBLINKS_DIRNAME);
$weblinks_config_handler->init();

$weblinks_build_handler = handler('KmlBuild', $WEBLINKS_DIRNAME);
$weblinks_build_handler->build();

exit(); // --- main end ---
