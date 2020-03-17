<?php

// $Id: weblinks_htmlout_base.php,v 1.1 2011/12/29 14:32:32 ohwada Exp $

//=========================================================
// WebLinks Module
// 2008-02-17 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('weblinks_htmlout_base')) {
    /**
     * Class weblinks_htmlout_base
     */
    class weblinks_htmlout_base
    {
        public $_item_vars = [];
        public $_param_vars = [];
        public $_log_vars = [];

        public $_DIRNAME;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------

        /**
         * weblinks_htmlout_base constructor.
         * @param $dirname
         */
        public function __construct($dirname)
        {
            $this->set_dirname($dirname);
        }

        //---------------------------------------------------------
        // interface
        //---------------------------------------------------------
        //---------------------------------------------------------
        // function: init
        // return value: none
        // note: reserve for future
        //---------------------------------------------------------
        public function init()
        {
            // dummy
        }

        //---------------------------------------------------------
        // function: description
        // return value:
        //    strings: plugin description in English
        //
        //  exsample:
        //	return "this is plugin description";
        //---------------------------------------------------------

        /**
         * @return string
         */
        public function description()
        {
            return '';
        }

        //---------------------------------------------------------
        // function: usage
        // return value:
        //    strings: plugin usage in English
        //
        //  exsample:
        //	return "plugin_name ( param_1, param_2 )";
        //---------------------------------------------------------

        /**
         * @return string
         */
        public function usage()
        {
            return '';
        }

        //---------------------------------------------------------
        // function: execute
        // input value:
        //    array items
        // return value:
        //    array items
        //---------------------------------------------------------

        /**
         * @param $items
         * @return array
         */
        public function execute($items)
        {
            $arr = $items;
            $this->init();
            $this->set_item_array($items);

            $ret = $this->execute_plugin();
            if ($ret) {
                $arr = $this->get_item_array();
            }

            return $arr;
        }

        //---------------------------------------------------------
        // function: execute_plugin
        // input value: none
        // return value:
        //    true or false
        //---------------------------------------------------------

        /**
         * @return bool
         */
        public function execute_plugin()
        {
            return false;
        }

        //---------------------------------------------------------
        // get name
        //---------------------------------------------------------

        /**
         * @return string|string[]
         */
        public function name()
        {
            $name = get_class($this);
            $name = str_replace('weblinks_htmlout_', '', $class);

            return $name;
        }

        //---------------------------------------------------------
        // set & get param
        //---------------------------------------------------------

        /**
         * @param $arr
         */
        public function set_param_array(&$arr)
        {
            if (is_array($arr)) {
                $this->_param_vars = &$arr;
            }
        }

        /**
         * @param $num
         * @param $value
         */
        public function set_param_by_num($num, $value)
        {
            $this->_param_vars[$num] = $value;
        }

        /**
         * @return array
         */
        public function get_param_array()
        {
            return $this->_param_vars;
        }

        /**
         * @param      $num
         * @param bool $default
         * @return bool|mixed
         */
        public function get_param_by_num($num, $default = false)
        {
            if (isset($this->_param_vars[$num])) {
                return $this->_param_vars[$num];
            }

            return $default;
        }

        //---------------------------------------------------------
        // set & get value
        //---------------------------------------------------------
        public function clear_item_array()
        {
            $this->_item_vars = [];
        }

        /**
         * @param $arr
         */
        public function set_item_array($arr)
        {
            if (is_array($arr)) {
                $this->_item_vars = &$arr;
            }
        }

        /**
         * @param $key
         * @param $value
         */
        public function set($key, $value)
        {
            $this->set_item_by_key($key, $value);
        }

        /**
         * @param $key
         * @param $value
         */
        public function set_item_by_key($key, $value)
        {
            $this->_item_vars[$key] = $value;
        }

        /**
         * @return array
         */
        public function &get_item_array()
        {
            return $this->_item_vars;
        }

        /**
         * @param      $key
         * @param bool $default
         * @return bool|mixed
         */
        public function &get($key, $default = false)
        {
            return $this->get_item_by_key($key, $default = false);
        }

        /**
         * @param      $key
         * @param bool $default
         * @return bool|mixed
         */
        public function &get_item_by_key($key, $default = false)
        {
            if (isset($this->_item_vars[$key])) {
                return $this->_item_vars[$key];
            }

            return $default;
        }

        //---------------------------------------------------------
        // set & get log
        //---------------------------------------------------------
        public function clear_logs()
        {
            $this->_log_vars = [];
        }

        /**
         * @param $arr
         */
        public function set_logs($arr)
        {
            if (is_array($arr)) {
                foreach ($arr as $text) {
                    $this->_log_vars[] = $text;
                }
            } else {
                $this->_log_vars[] = $arr;
            }
        }

        /**
         * @return array
         */
        public function &get_logs()
        {
            return $this->_log_vars;
        }

        //---------------------------------------------------------
        // set & get dirname
        //---------------------------------------------------------

        /**
         * @param $val
         */
        public function set_dirname($val)
        {
            $this->_DIRNAME = $val;
        }

        public function get_dirname()
        {
            return $this->_DIRNAME;
        }

        /**
         * @return string
         */
        public function get_weblinks_root_path()
        {
            return XOOPS_ROOT_PATH . '/modules/' . $this->_DIRNAME;
        }

        /**
         * @return string
         */
        public function get_weblinks_url()
        {
            return XOOPS_URL . '/modules/' . $this->_DIRNAME;
        }

        /**
         * @param $name
         * @return bool|mixed
         */
        public function &get_handler($name)
        {
            return weblinks_get_handler($name, $this->_DIRNAME);
        }

        //---------------------------------------------------------
        // xoops param
        //---------------------------------------------------------

        /**
         * @return mixed
         */
        public function get_xoops_sitename()
        {
            global $xoopsConfig;

            return $xoopsConfig['sitename'];
        }

        // --- class end ---
    }
    // === class end ===
}
