<?php

// $Id: weblinks_build_rss_feed_handler.php,v 1.1 2011/12/29 14:33:07 ohwada Exp $

// 2007-10-10 K.OHWADA
// divid from feed_rss.php

// 2007-06-01 K.OHWADA
// rssc_view_handler
// api/rss_builder.php

// 2006-09-20 K.OHWADA
// this is new file
// porting from rssc_build_rss
// use rssc WEBLINKS_RSSC_EXIST

//=========================================================
// WebLinks Module
// 2006-09-20 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('weblinks_build_rss_feed_handler')) {
    //=========================================================
    // class weblinks_build_rss_feed_handler
    //=========================================================

    /**
     * Class weblinks_build_rss_feed_handler
     */
    class weblinks_build_rss_feed_handler extends rssc_build_rssc
    {
        public $_DIRNAME;
        public $_DIR_XML;

        public $_MAX_FEEDS = 20;

        public $_rssc_view_handler;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------

        /**
         * weblinks_build_rss_feed_handler constructor.
         * @param $dirname
         */
        public function __construct($dirname)
        {
            $DIR_XML = XOOPS_ROOT_PATH . '/modules/' . $dirname . '/templates/xml';

            parent::__construct($dirname);
            $this->set_rdf_template($DIR_XML . '/weblinks_build_feed_rdf.tpl');
            $this->set_rss_template($DIR_XML . '/weblinks_build_feed_rss.tpl');
            $this->set_atom_template($DIR_XML . '/weblinks_build_feed_atom.tpl');
            $this->set_cache_time_guest($this->_CACHE_TIME_ONE_HOUR);

            $this->_rssc_view_handler = weblinks_get_handler('rssc_view', $dirname);
        }

        //---------------------------------------------------------
        // public
        //---------------------------------------------------------

        /**
         * @param $mode
         */
        public function build_for_weblinks($mode)
        {
            $this->set_mode($mode);
            $this->build_rss();
        }

        /**
         * @param $mode
         */
        public function view_for_weblinks($mode)
        {
            $this->set_mode($mode);
            $this->view_rss();
        }

        //---------------------------------------------------------
        // private
        //---------------------------------------------------------

        /**
         * @return mixed
         */
        public function &_get_feeds_for_weblinks()
        {
            return $this->_rssc_view_handler->get_feed_list_latest($this->_MAX_FEEDS);
        }

        //=========================================================
        // override into build_rss
        //=========================================================

        /**
         * @return array
         */
        public function &_get_items()
        {
            return $this->_get_feeds_for_weblinks();
        }

        // --- class end ---
    }
    // === class end ===
}
