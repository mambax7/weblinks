<?php
// $Id: atom.php,v 1.8 2007/10/22 02:23:04 ohwada Exp $

// 2007-06-01 K.OHWADA
// api/rss_builder.php

// 2006-09-20 K.OHWADA
// renewal function: show link

//=========================================================
// WebLinks Module
// 2006-09-20 K.OHWADA
//=========================================================

include 'header.php';
include_once WEBLINKS_ROOT_PATH . '/api/build_rss.php';

//=========================================================
// main
//=========================================================
$weblinks_build_handler = weblinks_get_handler('BuildRss', WEBLINKS_DIRNAME);
$weblinks_build_handler->build('atom');
exit(); // --- main end ---
