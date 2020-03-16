<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// $Id: weblinks_htmlout.php,v 1.2 2008/02/28 02:52:17 ohwada Exp $

//=========================================================
// WebLinks Module
// 2008-02-17 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('Htmlout')) {
    //=========================================================
    // class word
    //=========================================================
    class Htmlout extends Happylinux\Plugin
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            parent::__construct();
            $this->set_dirname($dirname);
            $this->set_dir_plugins('htmlout');
            $this->set_prefix_class('Htmlout');
            $this->set_prefix_func_data('weblinks_htmlout_data');
        }

        public static function getInstance($dirname = null)
        {
            static $instance;
            if (null === $instance) {
                $instance = new static($dirname);
            }

            return $instance;
        }

        //---------------------------------------------------------
        // execute
        //---------------------------------------------------------
        public function execute($items)
        {
            // not use return references
            $arr = $items;
            $ret = $this->_execute($items);
            if ($ret) {
                $arr = $this->get_items();
            }

            return $arr;
        }

        // --- class end ---
    }
    // === class end ===
}
