<?php
// $Id: weblinks_language_convert.php,v 1.1 2006/01/16 07:24:57 ohwada Exp $

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//=========================================================
// class language_convert
// created since v0.7
// porting form XFsection
// 2004/08/10 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('weblinks_language_convert')) {
    //=========================================================
    // class weblinks_language_convert
    // dummy class for english
    //=========================================================
    class weblinks_language_convert extends weblinks_language_base
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct()
        {
            parent::__construct();
        }

        // --- class end ---
    }
    // === class end ===
}
