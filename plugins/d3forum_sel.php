<?php
// $Id: d3forum_sel.php,v 1.2 2007/08/08 11:43:05 ohwada Exp $

// 2007-08-01 K.OHWADA
// module duplication

//================================================================
// WebLinks Module
// 2007-06-10 K.OHWADA
//================================================================

// --- functions begin ---
if (!function_exists('weblinks_plugin_d3forum_sel')) {
    function &weblinks_plugin_d3forum_sel()
    {
        $sel = [];

        $sel[1]['name'] = 'd3forum_073';
        $sel[1]['dirname'] = 'd3forum';
        $sel[1]['description'] = 'd3forum v0.73';

        return $sel;
    }
}// --- functions end ---
