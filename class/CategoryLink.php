<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// $Id: CategoryLinkHandler.php,v 1.5 2007/03/06 02:01:51 ohwada Exp $

// 2007-03-01 K.OHWADA
// divid to CategoryLink_basic_handler
// hack for multi site

// 2006-09-20 K.OHWADA
// use happy_linux

// 2006-05-15 K.OHWADA
// new handler
// not use weblinks_module_base

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//=========================================================
// WebLinks Module
// this file contain 2 class
//   CategoryLink
//   CategoryLinkHandler
// 2004/08/10 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('CategoryLink')) {
    //=========================================================
    // class CategoryLink
    //=========================================================
    class CategoryLink extends Happylinux\BaseObject
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct()
        {
            parent::__construct();

            $this->initVar('jid', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('cid', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('lid', XOBJ_DTYPE_INT, 0, false);
        }

        // --- class end ---
    }
    // === class end ===
}
