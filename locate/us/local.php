<?php
// $Id: local.php,v 1.3 2007/07/28 12:03:09 ohwada Exp $

// 2007-07-28 K.OHWADA
// weblinks_us_google.html

// 2006-10-05 K.OHWADA
// this is new file

//=========================================================
// WebLinks Module
// 2006-10-05 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('weblinks_locate_us')) {

    //=========================================================
    // class weblinks_locate_us
    // United Sates of America (US)
    //=========================================================
    class weblinks_locate_us extends weblinks_locate_base
    {

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct()
        {
            parent::__construct();

            $arr = array(
                'weblinks_map_template' => 'weblinks_us_google.html'
            );

            $this->array_merge($arr);
        }

        // --- class end ---
    }

    // === class end ===
}
