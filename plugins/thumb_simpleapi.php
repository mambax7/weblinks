<?php
// $Id: thumb_simpleapi.php,v 1.1 2007/09/17 09:46:45 ohwada Exp $

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
            'image' => 'https://img.simpleapi.net/small/' . $url,
            'width' => 128,
            'height' => 128,
        ];

        return $arr;
    }
    // === fucntion end ===
}
