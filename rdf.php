<?php
// $Id: rdf.php,v 1.3 2007/10/22 02:23:04 ohwada Exp $

// 2007-06-01 K.OHWADA
// api/rss_builder.php

// 2006-09-20 K.OHWADA
// this is new file

//=========================================================
// WebLinks Module
// 2006-09-20 K.OHWADA
//=========================================================

include 'header.php';
include_once WEBLINKS_ROOT_PATH . '/api/build_rss.php';

//=========================================================
// main
//=========================================================
$weblinks_build_handler = handler('BuildRss', WEBLINKS_DIRNAME);
$weblinks_build_handler->build('rdf');
exit(); // --- main end ---
