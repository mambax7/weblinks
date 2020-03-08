<?php
// $Id: weblinks_singlelink.php,v 1.13 2007/11/16 12:07:58 ohwada Exp $

// 2007-11-11 K.OHWADA
// set_keyword_array()

// 2007-09-01 K.OHWADA
// countup_hits()

// 2007-06-10 K.OHWADA
// rssc_view_handler

// 2007-03-25 K.OHWADA
// get_link_album_photos_by_lid()

// 2007-03-01 K.OHWADA
// get_forum_threads()
// _update_banner_size()

// 2006-12-10 K.OHWADA
// add is_admin()

// 2006-09-25 K.OHWADA
// use happy_linux
// use rssc WEBLINKS_RSSC_USE
// highlight_keyword

// 2006-09-24 K.OHWADA
// BUG 4279: Undefined index: rss_num in file singlelink.php

// 2006-05-15 K.OHWADA
// this is new file
// use new handler

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//================================================================
// WebLinks Module
// move from singlelink.php
// 2006-05-15 K.OHWADA
//================================================================

// === class begin ===
if (!class_exists('weblinks_singlelink')) {
    //=========================================================
    // class weblinks_singlelink
    //=========================================================
    class weblinks_singlelink
    {
        public $_DIRNAME;

        public $_link_handler;
        public $_link_view_handler;
        public $_banner_handler;
        public $_rssc_view_handler;
        public $_system;
        public $_post;

        public $_conf;

        public $_keyword_array  = [];
        public $_flag_highlight = false;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            $this->_DIRNAME = $dirname;

            $config_basic_handler     = weblinks_getHandler('config2_basic', $dirname);
            $this->_link_handler      = weblinks_getHandler('link_basic', $dirname);
            $this->_link_view_handler = weblinks_getHandler('link_view', $dirname);
            $this->_banner_handler    = weblinks_getHandler('banner', $dirname);
            $this->_rssc_view_handler = weblinks_getHandler('rssc_view', $dirname);
            $this->_rssc_handler      = weblinks_getHandler('rssc', $dirname);

            $this->_system = happy_linux_system::getInstance();
            $this->_post   = happy_linux_post::getInstance();

            $this->_conf = &$config_basic_handler->get_conf();

            $this->_link_view_handler->init();
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
        // update banner size
        //---------------------------------------------------------
        public function _update_banner_size($lid)
        {
            $row = &$this->_link_handler->get_cache_by_lid($lid);
            if (isset($row['banner']) && isset($row['width']) && isset($row['height'])) {
                $banner = $row['banner'];
                $width  = $row['width'];
                $height = $row['height'];

                // read remote file, when not set
                if ($banner && empty($width) && empty($height)) {
                    // read remote file, when not set
                    $size = &$this->_banner_handler->get_remote_banner_size($banner);
                    if (is_array($size) && isset($size[0]) && isset($size[1])) {
                        $ret = $this->_link_handler->update_banner_size($lid, $size[0], $size[1]);

                        return $ret;
                    }
                }
            }

            return true;    // no action
        }

        //---------------------------------------------------------
        // countup_hits
        //---------------------------------------------------------
        public function countup_hits($lid)
        {
            return $this->_link_handler->countup_hits($lid);
        }

        //---------------------------------------------------------
        // link_view_handler
        //---------------------------------------------------------
        public function get_get_lid()
        {
            return $this->_link_view_handler->get_get_lid();
        }

        public function &get_catpath_arr($lid)
        {
            return $this->_link_view_handler->get_catpath_array_by_lid($lid);
        }

        public function &get_link_forum_threads_by_lid($lid)
        {
            return $this->_link_view_handler->get_link_forum_threads_by_lid($lid);
        }

        public function &get_link_album_photos_by_lid($lid)
        {
            return $this->_link_view_handler->get_link_album_photos_by_lid($lid);
        }

        public function get_get_keywords()
        {
            return $this->_post->get_get_keywords();
        }

        public function &get_conf()
        {
            return $this->_conf;
        }

        //---------------------------------------------------------
        // get_link
        //---------------------------------------------------------
        public function &get_link($lid)
        {
            if ($this->_conf['link_image_auto']) {
                $this->_update_banner_size($lid);
            }

            $link = &$this->_link_view_handler->get_link_by_lid($lid);

            return $link;
        }

        //---------------------------------------------------------
        // get ATOM feed
        // RSS/ATOM auto discovery
        //---------------------------------------------------------
        public function get_atomfeed($lid)
        {
            // BUG 4279: Undefined index: rss_num in file singlelink.php
            $arr = [
                'rss_show'   => false,
                'rss_num'    => 0,
                'rss_flag'   => 0,
                'rss_url'    => '',
                'rss_update' => '',
                'feeds'      => [],
            ];

            if (WEBLINKS_RSSC_USE) {
                $arr = $this->get_atomfeed_auto($lid);
            }

            return $arr;
        }

        public function get_atomfeed_auto($lid)
        {
            $arr = [
                'rss_show'   => false,
                'rss_num'    => 0,
                'rss_flag'   => 0,
                'rss_url'    => '',
                'rss_update' => '',
                'feeds'      => [],
            ];

            $rssc_lid = $this->_link_view_handler->get_link_rssc_lid($lid);

            if ($rssc_lid) {
                $feeds = [];

                if ($this->_conf['rss_mode_auto']) {
                    $this->_rssc_handler->refresh_link($rssc_lid);
                }

                $this->_rssc_view_handler->set_feed_flag_title_html($this->_conf['rss_mode_title']);
                $this->_rssc_view_handler->set_feed_flag_content_html($this->_conf['rss_mode_content']);
                $this->_rssc_view_handler->set_feed_max_content($this->_conf['rss_max_content']);
                $this->_rssc_view_handler->set_feed_max_summary($this->_conf['rss_max_summary']);
                $this->_rssc_view_handler->set_feed_keyword_array($this->_keyword_array);
                $this->_rssc_view_handler->set_feed_highlight($this->_flag_highlight);

                // current record
                $feeds = &$this->_rssc_view_handler->get_feed_list_latest_by_rssclid($rssc_lid, $this->_conf['rss_perpage']);

                // new record after refresh
                $rssc_link_show = &$this->_rssc_view_handler->get_rssc_link_by_rssc_lid($rssc_lid);
                if (!is_array($rssc_link_show)) {
                    return $arr;
                }

                $rss_flag   = $rssc_link_show['mode'];
                $rss_url    = $rssc_link_show['url_xml'];
                $rss_update = $rssc_link_show['updated_long'];

                $rss_show = false;
                if (is_array($feeds) && count($feeds)) {
                    $rss_show = true;
                }

                $arr = [
                    'rss_num'    => $this->_conf['rss_num_content'],
                    'rss_show'   => $rss_show,
                    'rss_flag'   => $rss_flag,
                    'rss_url'    => $rss_url,
                    'rss_update' => $rss_update,
                    'feeds'      => $feeds,
                ];
            }

            return $arr;
        }

        //---------------------------------------------------------
        // system parameter
        //---------------------------------------------------------
        public function get_site_name()
        {
            return $this->_system->get_sitename();
        }

        public function get_module_name()
        {
            return $this->_system->get_module_name();
        }

        public function is_module_admin()
        {
            return $this->_system->is_module_admin();
        }

        //---------------------------------------------------------
        // set keyword property
        //---------------------------------------------------------
        public function set_highlight($value)
        {
            $this->_link_view_handler->set_highlight($value);
            $this->_flag_highlight = (bool)$value;
        }

        public function set_keyword_array(&$arr)
        {
            $this->_link_view_handler->set_keyword_array($arr);
            $this->_keyword_array = &$arr;
        }

        // --- class end ---
    }
    // === class end ===
}
