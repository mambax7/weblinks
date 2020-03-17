<?php

// $Id: local.php,v 1.1 2011/12/29 14:32:32 ohwada Exp $

// 2007-07-28 K.OHWADA
// weblinks_jp_google.html

// 2006-10-05 K.OHWADA
// this is new file

//=========================================================
// WebLinks Module
// 2006-10-05 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('weblinks_locate_jp')) {
    //=========================================================
    // class weblinks_locate_jp
    // Japan (JP)
    //=========================================================

    /**
     * Class weblinks_locate_jp
     */
    class weblinks_locate_jp extends weblinks_locate_base
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct()
        {
            parent::__construct();

            $arr = [
                'happy_linux_url' => 'http://linux.ohwada.jp/',    // reset this value
                'weblinks_map_template' => 'weblinks_jp_google.tpl',
            ];

            $this->array_merge($arr);
        }

        // --- class end ---
    }
    // === class end ===
}
