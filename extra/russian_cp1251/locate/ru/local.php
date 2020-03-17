<?php

// $Id: local.php,v 1.1 2012/04/09 10:21:09 ohwada Exp $

// 2007-07-28 K.OHWADA
// weblinks_ru_google.html

// 2006-10-05 K.OHWADA
// this is new file

//=========================================================
// WebLinks Module
// 2006-10-05 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('weblinks_locate_ru')) {
    //=========================================================
    // class weblinks_locate_ru
    // Russia (RU)
    //=========================================================

    /**
     * Class weblinks_locate_ru
     */
    class weblinks_locate_ru extends weblinks_locate_base
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct()
        {
            parent::__construct();

            $arr = [
                'weblinks_map_template' => 'weblinks_ru_google.html',
            ];

            $this->array_merge($arr);
        }

        // --- class end ---
    }
    // === class end ===
}
