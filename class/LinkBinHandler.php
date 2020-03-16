<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// $Id: weblinks_link_bin_handler.php,v 1.1 2007/09/23 05:19:24 ohwada Exp $

// 2007-09-20 K.OHWADA
// divid from weblinks_link_basic_handler.php

//=========================================================
// WebLinks Module
// 2006-03-01 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('LinkBinHandler')) {
    //=========================================================
    // class LinkBinHandler
    // this class using for command line
    // this class define config table
    // weblinks_link_basic_handler inherit this class
    //=========================================================
    class LinkBinHandler extends Happylinux\BasicHandler
    {
        // hack for multi language
        public $_flag_replace = false;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            parent::__construct($dirname);
            $this->set_table_name('link');
            $this->set_id_name('lid');
            $this->set_conf_table($this->prefix('config2'));

            $this->set_debug_db_sql(WEBLINKS_DEBUG_LINK_BASIC_SQL);
            $this->set_debug_db_error(WEBLINKS_DEBUG_ERROR);
            $this->set_debug_print_time(WEBLINKS_DEBUG_TIME);

            // hack for multi site
            if (WEBLINKS_FLAG_MULTI_SITE) {
                $this->renew_prefix(WEBLINKS_DB_PREFIX);
            }

            // hack for multi language
            if (weblinks_multi_is_japanese_site()) {
                $this->_flag_replace = true;
            }
        }

        //---------------------------------------------------------
        // link table
        //---------------------------------------------------------
        public function countup_broken($lid)
        {
            $sql = 'UPDATE ' . $this->_table . ' SET broken = broken+1 WHERE lid=' . (int)$lid;
            $ret = $this->query($sql);

            return $ret;
        }

        // --- class end ---
    }
    // === class end ===
}
