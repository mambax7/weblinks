<?php
// $Id: local.php,v 1.1 2007/07/28 12:03:09 ohwada Exp $

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
    class weblinks_locate_de extends LocateBase
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
