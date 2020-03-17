<?php

use XoopsModules\Happylinux;

// $Id: build_rss_feed.php,v 1.1 2007/10/22 02:24:55 ohwada Exp $

//=========================================================
// WebLinks Module
// 2007-10-10 K.OHWADA
//=========================================================

include 'admin_header.php';

include_once WEBLINKS_ROOT_PATH . '/api/build_rss_feed.php';

$builder = weblinks_get_handler('BuildRssFeed', WEBLINKS_DIRNAME);
$post = Happylinux\Post::getInstance();

$mode = $post->get_get_text('mode');

$builder->set_view_goto_title(_HAPPYLINUX_CONF_RSS_MANAGE);
$builder->set_view_goto_url(WEBLINKS_URL . '/admin/rss_build_manage.php');
$builder->view_for_weblinks($mode);

exit(); // --- main end ---
