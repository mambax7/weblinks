<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// === class begin ===
if (!class_exists('Config2DefineHandler')) {

    //=========================================================
    // class config handler
    //=========================================================
    class Config2DefineHandler extends Happylinux\ConfigBaseHandler
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            parent::__construct($dirname, 'config2', 'conf_id', 'Config2Define');

            $this->set_debug_db_sql(WEBLINKS_DEBUG_CONFIG2_SQL);
            $this->set_debug_db_error(WEBLINKS_DEBUG_ERROR);
        }

        // --- class end ---
    }
    // === class end ===
}
