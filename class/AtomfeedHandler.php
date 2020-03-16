<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// 2007-12-09 K.OHWADA
// BUG : Use of undefined constant XOBJ_DTYPE_STRING

// 2007-10-10 K.OHWADA
// restore this class for weblinks180_to_rssc070.php

// 2006-05-15 K.OHWADA
// new handler
// not use weblinks_module_base

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//=========================================================
// WebLinks Module
// this file contain 2 class
//   weblinks_atomfeed
//   weblinks_atomfeed_handler
// 2004-11-28 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('AtomfeedHandler')) {
    //=========================================================
    // class AtomfeedHandler
    //=========================================================
    class AtomfeedHandler extends Happylinux\BaseObjectHandler
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            parent::__construct($dirname, 'atomfeed', 'aid', 'Atomfeed');
            $this->set_debug_db_error(WEBLINKS_DEBUG_ERROR);
        }

        // --- class end ---
    }
    // === class end ===
}
