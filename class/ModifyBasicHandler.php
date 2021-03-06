<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// $Id: weblinks_modify_basic_handler.php,v 1.1 2007/11/12 12:41:14 ohwada Exp $

// 2007-11-01 K.OHWADA
// divid from weblinks_modify_handler

//=========================================================
// WebLinks Module
// 2004/01/14 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('ModifyBasicHandler')) {
    define('WEBLINKS_C_MODIFY_NEW', 0);
    define('WEBLINKS_C_MODIFY_MOD', 1);
    define('WEBLINKS_C_MODIFY_DEL', 2);

    //=========================================================
    // class ModifyBasicHandler
    //=========================================================
    class ModifyBasicHandler extends Happylinux\BasicHandler
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            parent::__construct($dirname);
            $this->set_table_name('modify');
            $this->set_id_name('mid');

            $this->set_debug_db_sql(WEBLINKS_DEBUG_MODIFY_SQL);
            $this->set_debug_db_error(WEBLINKS_DEBUG_ERROR);
            $this->set_debug_print_time(WEBLINKS_DEBUG_TIME);

            // hack for multi site
            if (WEBLINKS_FLAG_MULTI_SITE) {
                $this->renew_prefix(WEBLINKS_DB_PREFIX);
            }
        }

        //---------------------------------------------------------
        // get count
        //---------------------------------------------------------
        public function get_count_by_mode($mode)
        {
            $sql = 'SELECT count(*) FROM ' . $this->_table . ' WHERE mode=' . (int)$mode;
            $count = $this->get_count_by_sql($sql);

            return $count;
        }

        public function get_count_new()
        {
            return $this->get_count_by_mode(WEBLINKS_C_MODIFY_NEW);
        }

        public function get_count_mod()
        {
            return $this->get_count_by_mode(WEBLINKS_C_MODIFY_MOD);
        }

        public function get_count_del()
        {
            return $this->get_count_by_mode(WEBLINKS_C_MODIFY_DEL);
        }

        // --- class end ---
    }
    // === class end ===
}
