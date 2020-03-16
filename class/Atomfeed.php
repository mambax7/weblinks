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
if (!class_exists('Atomfeed')) {
    //=========================================================
    // class Atomfeed
    //=========================================================
    class Atomfeed extends Happylinux\BaseObject
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        // BUG : Use of undefined constant XOBJ_DTYPE_STRING
        public function __construct()
        {
            parent::__construct();

            $this->initVar('aid', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('lid', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('site_title', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('site_url', XOBJ_DTYPE_URL, null, false, 255);
            $this->initVar('title', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('url', XOBJ_DTYPE_URL, null, false, 255);
            $this->initVar('entry_id', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('guid', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('time_modified', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('time_issued', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('time_created', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('author_name', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('author_url', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('author_email', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('content', XOBJ_DTYPE_TXTAREA);
        }

        // --- class end ---
    }
}
