<?php

use XoopsModules\Happylinux;

// $Id: build_rss.php,v 1.1 2007/10/22 02:24:55 ohwada Exp $

//=========================================================
// WebLinks Module
// 2007-10-10 K.OHWADA
//=========================================================

include 'admin_header.php';

$post = Happylinux\Post::getInstance();
$type = $post->get_get_text('type');
$mode = $post->get_get_text('mode');

if ('feed' == $type) {
    if (WEBLINKS_RSSC_EXIST) {
        include_once WEBLINKS_ROOT_PATH . '/api/build_rss_feed.php';

        $feed_builder = weblinks_get_handler('BuildRssFeed', WEBLINKS_DIRNAME);

        $feed_builder->set_view_goto_title(_HAPPYLINUX_CONF_RSS_MANAGE);
        $feed_builder->set_view_goto_url(WEBLINKS_URL . '/admin/rss_build_manage.php');
        $feed_builder->view_for_weblinks($mode);
    }
} else {
    include_once WEBLINKS_ROOT_PATH . '/api/build_rss.php';

    $rss_builder = weblinks_get_handler('BuildRss', WEBLINKS_DIRNAME);

    $rss_builder->set_view_goto_title(_HAPPYLINUX_CONF_RSS_MANAGE);
    $rss_builder->set_view_goto_url(WEBLINKS_URL . '/admin/rss_build_manage.php');
    $rss_builder->view($mode);
}

exit(); // --- main end ---
