<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// $Id: weblinks_linkitem_handler.php,v 1.6 2007/11/26 11:33:58 ohwada Exp $

// 2007-11-24 K.OHWADA
// move create_table() to weblinks_install.php

// 2007-02-20 K.OHWADA
// add description field
// add_column_table_140()

// 2006-09-20 K.OHWADA
// use happy_linux
// add get_cache_by_itemid() get_cache_by_name()

// 2006-06-11 K.OHWADA
// BUG 4032 : cannot create table in MySQL 3.23

// 2006-05-15 K.OHWADA
// this is new file
// use new handler

//================================================================
// WebLinks Module
// this file contain 2 class
//   weblinks_linkitem
//   weblinks_linkitem_handler
// 2006-05-15 K.OHWADA
//================================================================

// === class begin ===
if (!class_exists('Linkitem')) {
    //================================================================
    // class Linkitem
    //================================================================
    class Linkitem extends Happylinux\BaseObject
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct()
        {
            parent::__construct();

            $this->initVar('id', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('item_id', XOBJ_DTYPE_INT, 0, true);
            $this->initVar('name', XOBJ_DTYPE_TXTBOX, null, true, 255);
            $this->initVar('title', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('user_mode', XOBJ_DTYPE_INT, 0);
            $this->initVar('aux_int_1', XOBJ_DTYPE_INT, 0);
            $this->initVar('aux_int_2', XOBJ_DTYPE_INT, 0);
            $this->initVar('aux_text_1', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('aux_text_2', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('description', XOBJ_DTYPE_TXTAREA);
        }

        // --- class end ---
    }
}
