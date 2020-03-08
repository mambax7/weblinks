<?php
// $Id: mozshot.php,v 1.1 2007/10/13 07:25:35 ohwada Exp $

// 2007-10-10 K.OHWADA
// add url

//=========================================================
// WebLinks Module
// 2007-09-10 K.OHWADA
//=========================================================

// === function begin ===
if (!function_exists('weblinks_thumb_mozshot')) {
    //=========================================================
    // thumbnail web service
    //=========================================================
    function &weblinks_thumb_mozshot($url)
    {
        $arr = [
            'name'   => 'mozshot',
            'url'    => 'https://mozshot.nemui.org/',
            'image'  => 'https://mozshot.nemui.org/shot?' . $url,
            'width'  => 128,
            'height' => 128,
        ];

        return $arr;
    }
    // === fucntion end ===
}
