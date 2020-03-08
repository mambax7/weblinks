<?php
// $Id: local.php,v 1.3 2007/07/28 12:03:09 ohwada Exp $

// 2007-07-28 K.OHWADA
// weblinks_uk_google.html

// 2006-10-05 K.OHWADA
// this is new file

//=========================================================
// WebLinks Module
// 2006-10-05 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('weblinks_locate_uk')) {
    //=========================================================
    // class weblinks_locate_uk
    // United Kingdom (UK)
    //=========================================================
    class weblinks_locate_uk extends weblinks_locate_base
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct()
        {
            parent::__construct();

            $arr = [
                'weblinks_map_template' => 'weblinks_uk_google.tpl',
            ];

            $this->array_merge($arr);
        }

        // --- class end ---
    }
    // === class end ===
}
