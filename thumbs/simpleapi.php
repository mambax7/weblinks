<?php
// $Id: simpleapi.php,v 1.1 2007/10/13 07:25:35 ohwada Exp $

// 2007-10-10 K.OHWADA
// add url

//=========================================================
// WebLinks Module
// 2007-09-10 K.OHWADA
//=========================================================

// === function begin ===
if (!function_exists('weblinks_thumb_simpleapi')) {
    //=========================================================
    // thumbnail web service
    //=========================================================
    function &weblinks_thumb_simpleapi($url)
    {
        $arr = [
            'name' => 'simpleapi',
            'url' => 'https://img.simpleapi.net/',
            'image' => 'https://img.simpleapi.net/small/' . $url,
            'width' => 128,
            'height' => 128,
        ];

        return $arr;
    }
    // === fucntion end ===
}
