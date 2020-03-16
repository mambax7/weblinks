<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// $Id: Config2Handler.php,v 1.3 2006/09/30 03:15:21 ohwada Exp $

// 2006-09-20 K.OHWADA
// use happy_linux

// 2006-06-11 K.OHWADA
// BUG 4032 : cannot create table in MySQL 3.23

// 2006-05-15 K.OHWADA
// this is new file
// use new handler

//================================================================
// WebLinks Module
// this file contain 2 class
//   Config2
//   Config2Handler
// porting form RSSC
// 2006-05-15 K.OHWADA
//================================================================

// === class begin ===
if (!class_exists('Config2Handler')) {

    //=========================================================
    // class config handler
    //=========================================================
    class Config2Handler extends Happylinux\ConfigBaseHandler
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            parent::__construct($dirname, 'config2', 'conf_id', 'Config2');

            $this->set_debug_db_sql(WEBLINKS_DEBUG_CONFIG2_SQL);
            $this->set_debug_db_error(WEBLINKS_DEBUG_ERROR);
        }

        // --- class end ---
    }
    // === class end ===
}
