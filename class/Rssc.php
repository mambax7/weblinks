<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// $Id: weblinks_rssc_handler.php,v 1.2 2011/12/29 19:54:56 ohwada Exp $

// 2011-12-29 K.OHWADA
// PHP 5.3 : Assigning the return value of new by reference is now deprecated.

// 2007-11-01 K.OHWADA
// WEBLINKS_RSSC_USE

// 2007-09-10 K.OHWADA
// return error_code in mod_link()

// 2007-06-01 K.OHWADA
// divid to weblinks_rssc_view_handler
// rssc_link_xml_handler

// 2007-05-06 K.OHWADA
// BUG 4564: Fatal error, when set rssc_use if not exist RSSC module
// Fatal error: Call to undefined function: rssc_get_handler()

// 2007-03-01 K.OHWADA
// weblinks_link_basic

// 2006-10-14 K.OHWADA
// add get_feeds_by_where()

// 2006-10-05 K.OHWADA
// this is new file

//=========================================================
// WebLinks Module
// 2006-10-05 K.OHWADA
//=========================================================

if (defined('WEBLINKS_RSSC_EXIST') && WEBLINKS_RSSC_EXIST && WEBLINKS_RSSC_USE) {
    include_once WEBLINKS_RSSC_ROOT_PATH . '/api/lang_main.php';
    include_once WEBLINKS_RSSC_ROOT_PATH . '/api/refresh.php';
    include_once WEBLINKS_RSSC_ROOT_PATH . '/api/manage.php';
}

if (!defined('RSSC_CODE_NORMAL')) {
    define('RSSC_CODE_NORMAL', 0);
    define('RSSC_CODE_XML_ENCODINGS_DEFAULT', 101);
    define('RSSC_CODE_PARSE_NOT_READ_XML_URL', 111);
    define('RSSC_CODE_PARSE_NOT_FIND_ENCODING', 112);
    define('RSSC_CODE_PARSE_FAILED', 113);
    define('RSSC_CODE_DB_ERROR', 121);
    define('RSSC_CODE_PARSE_MSG', 122);
    define('RSSC_CODE_REFRESH_ERROR', 123);
    define('RSSC_CODE_DISCOVER_SUCCEEDED', 131);
    define('RSSC_CODE_DISCOVER_FAILED', 132);
    define('RSSC_CODE_LINK_NOT_EXIST', 141);
    define('RSSC_CODE_LINK_ALREADY', 142);
    define('RSSC_CODE_LINK_EXIST_MORE', 143);
}

// === class begin ===
if (!class_exists('RsscHandler')) {
    //=========================================================
    // class Rssc
    //=========================================================
    class Rssc extends Happylinux\BasicObject
    {
        public $_rssc_xml_utility;
        public $_post;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct()
        {
            parent::__construct();

            $this->_post = Happylinux\Post::getInstance();

            if (WEBLINKS_RSSC_EXIST && WEBLINKS_RSSC_USE) {
                $this->_rssc_xml_utility = rssc_xml_utility::getInstance();
            }
        }

        //---------------------------------------------------------
        // set
        //---------------------------------------------------------
        public function build_rssc($lid, $form_mode = null)
        {
            $cur_rss_flag = $this->_post->get_post_int('rss_flag');

            // refresh
            if ('add_rssc' == $form_mode) {
                $cur_rss_url = $this->_post->get_post_url('show_rss_url');
            } // normal
            else {
                $cur_rss_url = $this->_post->get_post_url('rss_url');
            }

            $this->set('cur_rss_flag', $cur_rss_flag);
            $this->set('cur_rss_url', $cur_rss_url);
            $this->set('show_rss_url', $cur_rss_url);
            $this->set('link_lid', $lid);
            $this->set('auto_code', 0);
            $this->set('title', $this->_post->get_post_text('title'));
            $this->set('url', $this->_post->get_post_url('url'));

            if (isset($_POST['rss_flag'])) {
                $this->set('rss_flag', $this->_post->get_post_int('rss_flag'));
            }

            if (isset($_POST['rss_url'])) {
                $this->set('rss_url', $this->_post->get_post_url('rss_url'));
            }

            if (isset($_POST['rdf_url'])) {
                $this->set('rdf_url', $this->_post->get_post_url('rdf_url'));
            }

            if (isset($_POST['atom_url'])) {
                $this->set('atom_url', $this->_post->get_post_url('atom_url'));
            }

            switch ($cur_rss_flag) {
                case RSSC_C_MODE_AUTO:
                    $this->set_by_discover();
                    break;
                case RSSC_C_MODE_RSS:
                    $this->set('rss_url', $cur_rss_url);
                    break;
                case RSSC_C_MODE_RDF:
                    $this->set('rdf_url', $cur_rss_url);
                    break;
                case RSSC_C_MODE_ATOM:
                    $this->set('atom_url', $cur_rss_url);
                    break;
                default:
                    break;
            }
        }

        public function set_by_discover()
        {
            $sel = RSSC_C_SEL_ATOM;

            $url = $this->get('url');
            $cur_rss_flag = $this->get('cur_rss_flag');
            $cur_rss_url = $this->get('cur_rss_url');

            $mode_rss_url = '';
            $mode_rdf_url = '';
            $mode_atom_url = '';
            $show_rss_url = '';

            switch ($cur_rss_flag) {
                case RSSC_C_MODE_RDF:
                    $mode_rdf_url = $cur_rss_url;
                    break;
                case RSSC_C_MODE_ATOM:
                    $mode_atom_url = $cur_rss_url;
                    break;
                case RSSC_C_MODE_RSS:
                default:
                    $mode_rss_url = $cur_rss_url;
                    break;
            }

            // RSS auto discovary
            $auto_code = $this->_rssc_xml_utility->discover_for_manage($cur_rss_flag, $url, $mode_rdf_url, $mode_rss_url, $mode_atom_url, $sel);

            $auto_rss_flag = $this->_rssc_xml_utility->get_xml_mode();
            $auto_rdf_url = $this->_rssc_xml_utility->get_rdf_url();
            $auto_rss_url = $this->_rssc_xml_utility->get_rss_url();
            $auto_atom_url = $this->_rssc_xml_utility->get_atom_url();

            switch ($auto_rss_flag) {
                case RSSC_C_MODE_RDF:
                    $show_rss_url = $auto_rdf_url;
                    break;
                case RSSC_C_MODE_ATOM:
                    $show_rss_url = $auto_atom_url;
                    break;
                case RSSC_C_MODE_RSS:
                default:
                    $show_rss_url = $auto_rss_url;
                    break;
            }

            $this->set('rss_flag', $auto_rss_flag);
            $this->set('rss_url', $auto_rss_url);
            $this->set('rdf_url', $auto_rdf_url);
            $this->set('atom_url', $auto_atom_url);
            $this->set('show_rss_url', $show_rss_url);
            $this->set('auto_code', $auto_code);
        }

        public function check_result($mode = 'add')
        {
            // check rss url
            $rdf_url = $this->get('rdf_url');
            $rss_url = $this->get('rss_url');
            $atom_url = $this->get('atom_url');
            $rss_flag = $this->get('rss_flag');

            switch ($rss_flag) {
                case RSSC_C_MODE_RDF:
                    if (empty($rdf_url)) {
                        return WEBLINKS_CODE_RSSC_NO_RDF_URL;
                    }
                    break;
                case RSSC_C_MODE_RSS:
                    if (empty($rss_url)) {
                        return WEBLINKS_CODE_RSSC_NO_RSS_URL;
                    }
                    break;
                case RSSC_C_MODE_ATOM:
                    if (empty($atom_url)) {
                        return WEBLINKS_CODE_RSSC_NO_ATOM_URL;
                    }
                    break;
                case RSSC_C_MODE_AUTO:
                    return WEBLINKS_CODE_RSSC_MODE_AUTO;
                case 0:
                default:
                    // NOT allow rss_flag = 0, when add rssc
                    if ('add' == $mode) {
                        return WEBLINKS_CODE_RSSC_NO_RSS_FLAG;
                    }
                    break;
            }

            return 0;
        }

        public function check_necessary_param($mode = 'add')
        {
            $code = $this->get('auto_code');
            switch ($code) {
                case RSSC_CODE_DISCOVER_FAILED:
                    return $code;
            }

            if ($this->check_result($mode)) {
                return WEBLINKS_CODE_RSSC_NOT_FIND_PARAM;
            }

            return 0;
        }

        // --- class end ---
    }
}
