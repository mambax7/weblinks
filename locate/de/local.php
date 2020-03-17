<?php

// $Id: local.php,v 1.1 2011/12/29 14:32:32 ohwada Exp $

// 2006-10-05 K.OHWADA
// this is new file

//=========================================================
// WebLinks Module
// 2006-10-05 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('weblinks_locate_de')) {
    //=========================================================
    // class weblinks_locate_de
    // Germany (DE)
    //=========================================================

    /**
     * Class weblinks_locate_de
     */
    class weblinks_locate_de extends weblinks_locate_base
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct()
        {
            parent::__construct();

            $arr = [
                'weblinks_map_template' => 'weblinks_de_google.tpl',
            ];

            $this->array_merge($arr);
        }

        // --- class end ---
    }
    // === class end ===
}
