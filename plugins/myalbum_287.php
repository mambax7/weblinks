<?php
// $Id: myalbum_287.php,v 1.6 2009/01/31 19:49:37 ohwada Exp $

// 2009-02-01 K.OHWADA
// The unification of the interface with Webphoto

// 2007-11-27 K.OHWADA
// Fatal error: Call to undefined function b_myalbum_rphoto_show()

// 2007-08-01 K.OHWADA
// module duplication

// 2007-06-10 K.OHWADA
// $opts['dirname']

// 2007-04-08 K.OHWADA
// sub category

//=========================================================
// WebLinks Module
// for myalbum 2.87 <https://xoops.peak.ne.jp/>
// 2007-03-25 K.OHWADA
//=========================================================

// --- functions begin ---
if (!function_exists('weblinks_plugin_albums_myalbum_287')) {
    function &weblinks_plugin_albums_myalbum_287($opts)
    {
        global $xoopsDB;

        $false   = false;
        $DIRNAME = isset($opts['dirname']) ? $opts['dirname'] : 'myalbum';

        $file = XOOPS_ROOT_PATH . '/modules/' . $DIRNAME . '/include/read_configs.php';
        if (file_exists($file)) {
            include $file;
        } else {
            return $false;
        }

        $arr = [];

        $sql = 'SELECT * FROM ' . $table_cat . ' ORDER BY cid';
        $res = $xoopsDB->query($sql);

        while ($row = $xoopsDB->fetchArray($res)) {
            $arr[$row['cid']] = $row['title'];
        }

        return $arr;
    }

    function &weblinks_plugin_photos_myalbum_287($opts)
    {
        $false   = false;
        $DIRNAME = isset($opts['dirname']) ? $opts['dirname'] : 'myalbum';

        $file = XOOPS_ROOT_PATH . '/modules/' . $DIRNAME . '/blocks/myalbum_rphoto.php';
        if (file_exists($file)) {
            include $file;
        } else {
            return $false;
        }

        $width       = isset($opts['width']) ? (int)$opts['width'] : 140;
        $album_limit = isset($opts['album_limit']) ? (int)$opts['album_limit'] : 1;
        $album_id    = isset($opts['album_id']) ? (int)$opts['album_id'] : 0;
        $mode_sub    = isset($opts['mode_sub']) ? (int)$opts['mode_sub'] : 1;
        $cycle       = isset($opts['cycle']) ? (int)$opts['cycle'] : 60;
        $cols        = isset($opts['cols']) ? (int)$opts['cols'] : 3;

        if (0 == $album_id) {
            return $false;
        } elseif (WEBLINKS_PLUGIN_ALL == $album_id) {
            $album_id = 0;  // all category
        }

        $options = [
            0 => $DIRNAME,      // dirname
            1 => $width,        // box_size
            2 => $album_limit,  // photos_num
            3 => $album_id,     // category
            4 => $mode_sub,     // sub category
            5 => $cycle,        // cycle (sec)
            6 => $cols,         // cols
        ];

        // Fatal error: Call to undefined function b_myalbum_rphoto_show()
        if (function_exists('b_myalbum_rphoto_show')) {
            $block = b_myalbum_rphoto_show($options);
        } else {
            return $false;
        }

        if (!is_array($block) || !count($block)) {
            return $false;
        }

        if (!is_array($block['photo']) || !count($block['photo'])) {
            return $false;
        }

        $href_base = XOOPS_URL . '/modules/' . $DIRNAME . '/photo.php?lid=';

        $ret = [];
        foreach ($block['photo'] as $photo) {
            $href    = $href_base . $photo['lid'] . '&amp;cid=' . $photo['cid'];
            $src     = $photo['thumbs_url'] . '/' . $photo['lid'] . '.' . $photo['ext'];
            $title   = $photo['title'];
            $attribs = $photo['img_attribs'];

            $ret[] = [
                'href'        => $href,
                'title'       => $title,
                'img_src'     => $src,
                'img_attribs' => $attribs,
            ];
        }

        return $ret;
    }
}// --- functions end ---
