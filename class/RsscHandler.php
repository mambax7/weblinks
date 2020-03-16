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
    // class RsscHandler
    //=========================================================
    class RsscHandler extends Happylinux\Error
    {
        // handler
        public $_weblinks_link_handler;

        public $_rssc_refresh_handler;
        public $_rssc_link_xml_handler;

        public $_conf;

        // set variable
        public $_mid;

        // result
        public $_lid_exist = 0;

        public $_error_code = 0;
        public $_parse_error_code = 0;
        public $_parse_result = null;
        public $_exist_list_msg = null;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            parent::__construct();

            $weblinks_config_handler = weblinks_get_handler('Config2Basic', $dirname);
            $this->_weblinks_link_handler = weblinks_get_handler('LinkBasic', $dirname);

            // Fatal error: Call to undefined function: rssc_get_handler()
            if (WEBLINKS_RSSC_EXIST && function_exists('rssc_get_handler')) {
                $this->_rssc_refresh_handler = rssc_get_handler('refresh', WEBLINKS_RSSC_DIRNAME);
                $this->_rssc_link_xml_handler = rssc_get_handler('LinkXml', WEBLINKS_RSSC_DIRNAME);
            }

            global $xoopsModule;
            if (is_object($xoopsModule)) {
                $this->set_mid($xoopsModule->getVar('mid'));
            }

            $this->_conf = $weblinks_config_handler->get_conf();
        }

        //---------------------------------------------------------
        // create
        //---------------------------------------------------------
        public function &create()
        {
            $obj = new Rssc();

            return $obj;
        }

        // caller : class/weblinks_link_edit_handler.php
        public function &create_new_rssc_obj($lid = 0, $form_mode = null)
        {
            $obj = false;
            if (WEBLINKS_RSSC_USE) {
                $obj = &$this->create();
                $obj->build_rssc($lid, $form_mode);
            }

            return $obj;
        }

        public function &create_rssc_obj_by_lid($lid, $form_mode = null)
        {
            $obj = &$this->create();
            $obj->build_rssc($lid, $form_mode);

            $rssc_lid = $this->_weblinks_link_handler->get_rssc_lid($lid);
            if ($rssc_lid) {
                $obj->set('rssc_lid', $rssc_lid);
            }

            return $obj;
        }

        public function &create_exist_rssc_obj_by_lid($lid, $form_mode = null)
        {
            $obj = &$this->create();
            $obj->build_rssc($lid, $form_mode);

            $rssc_lid = $this->_weblinks_link_handler->get_rssc_lid($lid);
            if ($rssc_lid) {
                $rssc_link_obj = $this->get_rssc_link($rssc_lid);

                $obj->set('rssc_lid', $rssc_lid);

                if (is_object($rssc_link_obj)) {
                    $obj->set('rdf_url', $rssc_link_obj->get('rdf_url'));
                    $obj->set('rss_url', $rssc_link_obj->get('rss_url'));
                    $obj->set('atom_url', $rssc_link_obj->get('atom_url'));
                }
            }

            return $obj;
        }

        //---------------------------------------------------------
        // get
        //---------------------------------------------------------
        public function get_rssc_link($rssc_lid)
        {
            $obj = &$this->_rssc_link_xml_handler->get($rssc_lid);

            return $obj;
        }

        //---------------------------------------------------------
        // check fill in rss_flag & rss_url
        // it is OK that rss_flag is auto and rss_url is blank
        //---------------------------------------------------------
        public function check_post_param($rssc_obj)
        {
            $rss_url = $rssc_obj->get('cur_rss_url');
            $rss_flag = $rssc_obj->get('cur_rss_flag');

            $this->_clear_errors();

            if ((RSSC_C_MODE_RDF == $rss_flag) || (RSSC_C_MODE_RSS == $rss_flag) || (RSSC_C_MODE_ATOM == $rss_flag)) {
                if (empty($rss_flag)) {
                    $this->_set_errors(sprintf(_WLS_ERROR_FILL, _WEBLINKS_RSS_MODE));
                }

                if (empty($rss_url)) {
                    $this->_set_errors(sprintf(_WLS_ERROR_FILL, _WLS_RSS_URL));
                }
            }

            return $this->returnExistError();
        }

        //---------------------------------------------------------
        // check exist_lid
        //---------------------------------------------------------
        public function check_get_rssc_exist_lid($rssc_obj)
        {
            $lid_exist = 0;
            $rssc_lid = $rssc_obj->get('rssc_lid');
            $rdf_url = $rssc_obj->get('rdf_url');
            $rss_url = $rssc_obj->get('rss_url');
            $atom_url = $rssc_obj->get('atom_url');

            $script = XOOPS_URL . '/modules/' . WEBLINKS_RSSC_DIRNAME . '/admin/';
            $script .= 'link_manage.php?op=mod_form&amp;lid=';

            $this->_clear_errors();

            $list = $this->_rssc_link_xml_handler->get_list_by_rssurl($rdf_url, $rss_url, $atom_url, $rssc_lid);
            if ($list) {
                $this->_exist_list_msg = $this->_rssc_link_xml_handler->build_error_rssurl_list($list, $script);
                $lid_exist = $list[0];
            }

            $this->_lid_exist = $lid_exist;

            return $lid_exist;
        }

        public function get_rssc_exist_lid()
        {
            return $this->_lid_exist;
        }

        public function get_exist_list_msg()
        {
            return $this->_exist_list_msg;
        }

        //---------------------------------------------------------
        // add link
        //---------------------------------------------------------
        public function add_link($rssc_obj)
        {
            // disposing just in case
            // SHOULD check, before call this function
            if (0 != $rssc_obj->check_result()) {
                $this->_set_errors('RsscHandler: not correct rssc object');

                return false;
            }

            $time = $this->_conf['rss_cache_time'] * 3600;  // hour -> sec

            $link_obj = $this->_rssc_link_xml_handler->create();
            $link_obj->setVar('title', $rssc_obj->get('title'));
            $link_obj->setVar('url', $rssc_obj->get('url'));
            $link_obj->setVar('rdf_url', $rssc_obj->get('rdf_url'));
            $link_obj->setVar('rss_url', $rssc_obj->get('rss_url'));
            $link_obj->setVar('atom_url', $rssc_obj->get('atom_url'));
            $link_obj->setVar('mode', $rssc_obj->get('rss_flag'));
            $link_obj->setVar('p1', $rssc_obj->get('link_lid'));
            $link_obj->setVar('uid', $this->get_xoops_uid());
            $link_obj->setVar('mid', $this->_mid);
            $link_obj->setVar('refresh', $time);

            $newid = $this->_rssc_link_xml_handler->insert($link_obj);
            if (!$newid) {
                $this->_set_errors($this->_rssc_link_xml_handler->getErrors());

                return false;
            }

            return $newid;
        }

        //---------------------------------------------------------
        // mod link
        //---------------------------------------------------------
        public function mod_link($rssc_obj)
        {
            // disposing just in case
            // SHOULD check, before call this function
            if (0 != $rssc_obj->check_result('mod')) {
                $this->_set_error_code(RSSC_CODE_DB_ERROR);
                $this->_set_errors('RsscHandler: not correct rssc object');

                return false;
            }

            $rssc_lid = $rssc_obj->get('rssc_lid');
            $mode = $rssc_obj->get('rss_flag');
            $rdf_url = $rssc_obj->get('rdf_url');
            $rss_url = $rssc_obj->get('rss_url');
            $atom_url = $rssc_obj->get('atom_url');

            $link_obj = $this->_rssc_link_xml_handler->get($rssc_lid);
            if (!is_object($link_obj)) {
                $this->_set_error_code(RSSC_CODE_LINK_NOT_EXIST);
                $msg = 'no rssc link : rssc_lid = ' . $rssc_lid;
                $this->_set_errors($msg);

                return false;
            }

            $link_obj->setVar('title', $rssc_obj->get('title'));
            $link_obj->setVar('url', $rssc_obj->get('url'));
            $link_obj->setVar('mode', $mode);

            switch ($mode) {
                case RSSC_C_MODE_AUTO:
                    $link_obj->set('rdf_url', $rdf_url);
                    $link_obj->set('rss_url', $rss_url);
                    $link_obj->set('atom_url', $atom_url);

                // no break
                case RSSC_C_MODE_RSS:
                    $link_obj->set('rss_url', $rss_url);
                    break;
                case RSSC_C_MODE_RDF:
                    $link_obj->set('rdf_url', $rdf_url);
                    break;
                case RSSC_C_MODE_ATOM:
                    $link_obj->set('atom_url', $atom_url);
                    break;
                default:
                    break;
            }

            $ret = $this->_rssc_link_xml_handler->update($link_obj);
            if (!$ret) {
                $this->_set_error_code(RSSC_CODE_DB_ERROR);
                $this->_set_errors($this->_rssc_link_xml_handler->getErrors());

                return false;
            }

            return $ret;
        }

        //---------------------------------------------------------
        // link_handler object
        //---------------------------------------------------------
        public function get_var($lid, $key)
        {
            switch ($key) {
                case 'cachetime':
                    $key = 'refresh';
                    break;
            }

            $link_obj = &$this->_rssc_link_xml_handler->get($lid);
            if (is_object($link_obj)) {
                return $link_obj->getVar($key, 'n');
            }

            return false;
        }

        public function get_var_rssurl($lid)
        {
            $link_obj = &$this->_rssc_link_xml_handler->get($lid);
            if (!is_object($link_obj)) {
                return false;
            }

            $rss_url = $link_obj->get_rssurl_by_mode('n');

            return $rss_url;
        }

        //---------------------------------------------------------
        // POST
        //---------------------------------------------------------
        public function get_post_url($array, $key)
        {
            if (isset($array[$key]) && ('https://' != $array[$key])) {
                return $array[$key];
            }

            return '';
        }

        public function get_post_encoding($value)
        {
            if ('auto' == $value) {
                return '';
            }

            return $value;
        }

        public function get_xoops_uid()
        {
            global $xoopsUser;

            $uid = 0;
            if (is_object($xoopsUser)) {
                $uid = $xoopsUser->getVar('uid');
            }

            return $uid;
        }

        public function set_mid($value)
        {
            $this->_mid = (int)$value;
        }

        public function get_rss_url_flag($rssc_lid = 0)
        {
            $obj = &$this->_rssc_link_xml_handler->create();
            $url = '';
            $flag = RSSC_C_MODE_NON;

            if ($rssc_lid) {
                $obj = &$this->_rssc_link_xml_handler->get($rssc_lid);
                if (is_object($obj)) {
                    $url = $obj->get_rssurl_by_mode('n');
                    $flag = $obj->get('mode');
                }
            }

            return [$url, $flag];
        }

        public function get_rss_flag_default()
        {
            return RSSC_C_MODE_AUTO;
        }

        public function get_rss_opt()
        {
            $obj = &$this->_rssc_link_xml_handler->create();
            $opt = $obj->get_mode_option();

            return $opt;
        }

        public function refresh_link($rssc_lid)
        {
            $ret = $this->_rssc_refresh_handler->refresh($rssc_lid);
            if (!$ret) {
                $this->_set_errors($this->_rssc_refresh_handler->getErrors());

                return false;
            }

            return true;
        }

        public function refresh_link_for_add_link($rssc_lid)
        {
            $this->_rssc_refresh_handler->set_force_refresh(true);

            $ret = $this->_rssc_refresh_handler->refresh_link_for_add_link($rssc_lid);
            switch ($ret) {
                case 0:
                    break;
                case RSSC_CODE_PARSE_MSG:
                    $this->_parse_result = $this->_rssc_refresh_handler->get_parse_result();
                    break;
                case RSSC_CODE_PARSE_FAILED:
                    $this->_parse_error_code = $this->_rssc_refresh_handler->get_parse_error_code();
                    $this->_set_errors($this->_rssc_refresh_handler->getErrors());
                    break;
                case RSSC_CODE_DB_ERROR:
                case RSSC_CODE_REFRESH_ERROR:
                default:
                    $this->_set_errors($this->_rssc_refresh_handler->getErrors());
                    break;
            }

            return $ret;
        }

        public function get_error_code()
        {
            return $this->_error_code;
        }

        public function get_parse_error_code()
        {
            return $this->_parse_error_code;
        }

        public function get_parse_result()
        {
            return $this->_parse_result;
        }

        // --- class end ---
    }
}
