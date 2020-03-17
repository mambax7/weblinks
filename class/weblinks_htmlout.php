<?php

// $Id: weblinks_htmlout.php,v 1.1 2011/12/29 14:33:10 ohwada Exp $

//=========================================================
// WebLinks Module
// 2008-02-17 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('weblinks_htmlout')) {
    //=========================================================
    // class word
    //=========================================================

    /**
     * Class weblinks_htmlout
     */
    class weblinks_htmlout extends happy_linux_plugin
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------

        /**
         * weblinks_htmlout constructor.
         * @param $dirname
         */
        public function __construct($dirname)
        {
            parent::__construct();
            $this->set_dirname($dirname);
            $this->set_dir_plugins('htmlout');
            $this->set_prefix_class('weblinks_htmlout');
            $this->set_prefix_func_data('weblinks_htmlout_data');
        }

        /**
         * @param null $dirname
         * @return \weblinks_htmlout|static
         */
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

        /**
         * @param $items
         * @return |null |null |null
         */
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
