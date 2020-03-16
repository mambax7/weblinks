<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// $Id: Config2BasicHandler.php,v 1.14 2007/11/02 11:36:29 ohwada Exp $

// 2007-10-30 K.OHWADA
// move show_modify to weblinks_auth
// _has_conf_cached()

// 2007-09-20 K.OHWADA
// BUG 4707: Only variables should be assigned by reference

// 2007-09-01 K.OHWADA
// user can delete link
// auth_delete

// 2007-08-01 K.OHWADA
// admin can add etc column

// 2007-06-10 K.OHWADA
// get_module_name()

// 2007-03-07 K.OHWADA
// notice in module initial

// 2007-03-01 K.OHWADA
// user can use textarea1
// change has_auth_desc_option()

// 2007-02-04 K.OHWADA
// Notice: Only variables should be assigned by reference in file class/weblinks_link.php

// 2007-01-20 K.OHWADA
// auth_dohtml_1

// 2006-12-10 K.OHWADA
// add _load()

// 2006-09-20 K.OHWADA
// use happy_linux

// 2006-05-15 K.OHWADA
// this is new file
// use new handler

//=========================================================
// WebLinks Module
// 2006-05-15 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('Config2BasicHandler')) {
    //=========================================================
    // class Config2BasicHandler
    // this class handle MySQL table directly
    // this class does not use another class
    //=========================================================
    class Config2BasicHandler extends Happylinux\BasicHandler
    {
        public $_system;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            parent::__construct($dirname);

            $this->set_table_name('config2');
            $this->set_id_name('conf_id');

            $this->set_debug_db_sql(WEBLINKS_DEBUG_CONFIG2_BASIC_SQL);
            $this->set_debug_db_error(WEBLINKS_DEBUG_ERROR);
            $this->set_debug_print_time(WEBLINKS_DEBUG_TIME);

            $this->_system = Happylinux\System::getInstance();
        }

        //---------------------------------------------------------
        // initiatl load
        // caller: header.php
        //---------------------------------------------------------
        public function init()
        {
            if (!$this->_has_conf_cached()) {
                $this->load_config();
            }
        }

        // for debug: test_class_user_class
        public function load_config()
        {
            if ($this->get_debug_print_time()) {
                $happy_linux_time = @\XoopsModules\Happylinux\Time::getInstance();
                $happy_linux_time->print_lap_time('Config2BasicHandler');
            }

            $arr = &$this->_get_config_data();

            // if not initial
            if (!is_array($arr) || (0 == count($arr))) {
                return false;
            }

            $arr['rss_site_arr'] = &$this->_conv_to_array($arr['rss_site']);
            $arr['rss_black_arr'] = &$this->_conv_to_array($arr['rss_black']);
            $arr['rss_white_arr'] = &$this->_conv_to_array($arr['rss_white']);

            // added in v1.60
            if (isset($arr['link_num_etc'])) {
                if ($arr['link_num_etc'] < 0) {
                    $arr['link_num_etc'] = 0;
                } elseif ($arr['link_num_etc'] > WEBLINKS_LINK_NUM_ETC) {
                    $arr['link_num_etc'] = WEBLINKS_LINK_NUM_ETC;
                }
            } else {
                $arr['link_num_etc'] = WEBLINKS_LINK_NUM_ETC;
            }

            $this->_conf_cached = $arr;

            if ($this->get_debug_print_time()) {
                $happy_linux_time->print_lap_time();
            }
        }

        //=========================================================
        // function for MySQL table
        //=========================================================
        public function &_conv_to_array($str)
        {
            $ret = &$this->convert_string_to_array($str, "\n");

            return $ret;
        }

        //---------------------------------------------------------
        // module_name
        //---------------------------------------------------------
        public function get_module_name($name, $flag_dirname = true, $flag_mod_name = true, $format = 's')
        {
            $val = false;

            $dirname = $this->get_conf_by_name($name);
            if ($dirname) {
                $module_name = $this->_system->get_module_name_by_dirname($dirname, $format);

                if ($flag_dirname && $flag_mod_name) {
                    $val = $dirname . ': ' . $module_name;
                } elseif ($flag_dirname) {
                    $val = $dirname;
                } elseif ($flag_mod_name) {
                    $val = $module_name;
                }
            }

            return $val;
        }

        // --- class end ---
    }
    // === class end ===
}
