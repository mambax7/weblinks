<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// $Id: weblinks_locate.php,v 1.4 2007/11/14 11:50:24 ohwada Exp $

// 2007-11-11 K.OHWADA
// set_config_google_server( $val )

// 2006-12-17 K.OHWADA
// BUG 4417: singleton done not work correctly
// change weblinks_get_value()

// 2006-10-05 K.OHWADA
// this is new file

//=========================================================
// Happy Linux Framework Module
// 2006-10-01 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('LocateBase')) {
    //=========================================================
    // class weblinks_locate
    //=========================================================
    class LocateBase extends Happylinux\LocateBase
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
}
