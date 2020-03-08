<?php
// $Id: websitethumbnails.php,v 1.1 2007/10/13 07:25:35 ohwada Exp $

//=========================================================
// WebLinks Module
// 2007-10-10 K.OHWADA
//=========================================================

// === function begin ===
if (!function_exists('weblinks_thumb_websitethumbnails')) {
    //=========================================================
    // thumbnail web service
    //=========================================================
    function &weblinks_thumb_websitethumbnails($url)
    {
        $arr = [
            'name' => 'website thumbnails',
            'url' => 'https://www.websitethumbnails.net/',
            'image' => 'https://www.websitethumbnails.net/view.php?url=' . $url,
            'width' => 120,
            'height' => 90,
        ];

        return $arr;
    }
    // === fucntion end ===
}
