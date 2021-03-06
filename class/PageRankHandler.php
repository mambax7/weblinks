<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// $Id: weblinks_pagerank_handler.php,v 1.2 2008/03/03 06:31:17 ohwada Exp $

//=========================================================
// WebLinks Module
// 2008-02-17 K.OHWADA
//=========================================================

//=========================================================
// class PageRankHandler
//=========================================================

// === class begin ===
if (!class_exists('PageRankHandler')) {
    class PageRankHandler extends Happylinux\Error
    {
        public $_DIRNAME;

        public $_link_handler;
        public $_pagerank;

        public $_CACHE_TIME_LONG = 0;
        public $_CACHE_TIME_SHORT = 0;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            $this->_DIRNAME = $dirname;

            $this->_link_handler = weblinks_get_handler('LinkBasic', $dirname);
            $this->_pagerank = Happylinux\PageRank::getInstance($dirname);//happylinux_get_singleton('pagerank');

            $this->_CACHE_TIME_LONG = 30 * 24 * 60 * 60; // one month
            $this->_CACHE_TIME_SHORT = 24 * 60 * 60; // one day
        }

        //---------------------------------------------------------
        // public
        //---------------------------------------------------------
        public function get_page_rank($lid, $flag_cache = true, $flag_force = false)
        {
            $row = $this->_link_handler->get_cache_by_lid($lid);
            if (!is_array($row) || !count($row)) {
                return 0;
            }

            $url = $row['url'];
            $pagerank = $row['pagerank'];
            $pagerank_update = $row['pagerank_update'];

            $pr = $pagerank;

            if ($flag_force
                || ($flag_cache && !$this->_check_time($pagerank, $pagerank_update))) {
                $pr = $this->get_page_rank_from_google($url, $pagerank);
                $this->_update($lid, $pr);
            }

            if ($pr < _HAPPYLINUX_PAGERANK_C_MIN) {
                $pr = _HAPPYLINUX_PAGERANK_C_MIN;
            }
            if ($pr > _HAPPYLINUX_PAGERANK_C_MAX) {
                $pr = _HAPPYLINUX_PAGERANK_C_MAX;
            }

            return (int)$pr;
        }

        public function get_page_rank_from_google($url, $pr_prev)
        {
            $pr = $this->_pagerank->get_page_rank($url);
            switch ($pr) {
                case _HAPPYLINUX_PAGERANK_C_CONN:
                    $this->_set_errors($this->_pagerank->errstr);
                    break;
                case _HAPPYLINUX_PAGERANK_C_RANK:
                    $this->_set_errors($this->_pagerank->google_url);
                    $this->_set_errors($this->_pagerank->contents);
                    break;
            }

            // probably temporary error
            if (($pr < _HAPPYLINUX_PAGERANK_C_MIN) && ($pr_prev > _HAPPYLINUX_PAGERANK_C_MIN)) {
                $pr = $pr_prev;
            }

            return $pr;
        }

        public function _check_time($pagerank, $pagerank_update)
        {
            $cache_time = $this->_CACHE_TIME_LONG;
            if ($pagerank < _HAPPYLINUX_PAGERANK_C_MIN) {
                $cache_time = $this->_CACHE_TIME_SHORT;
            }

            if (time() < ($pagerank_update + $cache_time)) {
                return true;
            }

            return false;
        }

        public function _update($lid, $pr)
        {
            $ret = $this->_link_handler->update_pagerank($lid, $pr, time());
            if (!$ret) {
                $this->_set_errors($this->_link_handler->getErrors('n'));
            }
        }

        // --- class end ---
    }
    // === class end ===
}
