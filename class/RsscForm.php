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
if (!class_exists('RsscForm')) {

    //=========================================================
    // class RsscForm
    //=========================================================
    // _RSSC_REFRESH_LINK, _RSSC_REFRESH_LINK_DSC
    //---------------------------------------------------------
    class RsscForm extends Happylinux\FormLib
    {
        public $_rssc_link_xml_handler;

        public $_post;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct()
        {
            parent::__construct();

            $this->_post = Happylinux\Post::getInstance();

            // Fatal error: Call to undefined function: rssc_get_handler()
            if (WEBLINKS_RSSC_EXIST && function_exists('rssc_get_handler')) {
                $this->_rssc_link_xml_handler = rssc_get_handler('Link', WEBLINKS_RSSC_DIRNAME);
            }
        }

        public static function getInstance()
        {
            static $instance;
            if (null === $instance) {
                $instance = new static();
            }

            return $instance;
        }

        //---------------------------------------------------------
        // form
        //---------------------------------------------------------
        public function show_add_rssc($obj, $op_mode)
        {
            $this->set_obj($obj);

            switch ($op_mode) {
                case 'mod_link':
                case 'approve_mod':
                    $form_title = _AM_WEBLINKS_MOD_RSSC;
                    $op = 'mod_rssc';
                    $url_cancel = 'link_list.php';
                    break;
                case 'add_link':
                case 'approve_new':
                default:
                    $form_title = _AM_WEBLINKS_ADD_RSSC;
                    $op = 'add_rssc';
                    $url_cancel = 'link_list.php?sortid=1';
                    break;
            }

            // --- form start---
            echo $this->build_form_begin('add_rssc', 'link_manage.php');
            echo $this->build_token();
            echo $this->build_html_input_hidden('op', $op);
            echo $this->build_html_input_hidden('op_mode', $op_mode);
            echo $this->build_html_input_hidden('rssc_lid', (int)$obj->get('rssc_lid'));
            echo $this->build_html_input_hidden('link_lid', (int)$obj->get('link_lid'));
            echo $this->build_html_input_hidden('title', $this->sanitize_text($obj->get('title')));
            echo $this->build_html_input_hidden('url', $this->sanitize_url($obj->get('url')));
            echo $this->build_html_input_hidden('rdf_url', $this->sanitize_url($obj->get('rdf_url')));
            echo $this->build_html_input_hidden('rss_url', $this->sanitize_url($obj->get('rss_url')));
            echo $this->build_html_input_hidden('atom_url', $this->sanitize_url($obj->get('atom_url')));

            echo $this->build_form_table_begin();
            echo $this->build_form_table_title($form_title);

            echo $this->build_obj_table_label(_WLS_LINKID, 'link_lid');
            echo $this->build_obj_table_label(_WEBLINKS_RSSC_LID, 'rssc_lid');
            echo $this->build_obj_table_label(_WLS_SITETITLE, 'title');
            echo $this->build_obj_table_label(_WLS_SITEURL, 'url');

            $ele_rss_url = $this->build_edit_url_with_visit('show_rss_url', $obj->get('show_rss_url'));
            echo $this->build_form_table_line(_WLS_RSS_URL, $ele_rss_url);

            $ele_mode = $this->build_html_input_radio_select('rss_flag', $obj->get('rss_flag'), $this->get_mode_option());
            echo $this->build_form_table_line(_WEBLINKS_RSS_MODE, $ele_mode);

            $ele_submit = $this->build_html_input_submit('submit', _HAPPYLINUX_EXECUTE);
            $ele_cancel = $this->build_html_input_button_location('cancel', _CANCEL, $url_cancel);
            $ele_button = $ele_submit . ' ' . $ele_cancel;
            echo $this->build_form_table_line('', $ele_button, 'foot', 'foot');

            echo $this->build_form_table_end();
            echo $this->build_form_end();
            // --- form end ---
        }

        public function show_refresh_link($link_lid, $rssc_lid, $op_mode)
        {
            switch ($op_mode) {
                case 'mod_link':
                case 'appove_mod':
                    $location_url = 'link_list.php';
                    break;
                case 'add_link':
                case 'appove_new':
                default:
                    $location_url = 'link_list.php?sortid=1';
                    break;
            }

            $arr = [
                'op' => 'refresh_link',
                'op_mode' => $op_mode,
                'link_lid' => $link_lid,
                'rssc_lid' => $rssc_lid,
            ];

            $form_name = '';
            $action = '';
            $submit_name = 'submit';
            $submit_value = _HAPPYLINUX_EXECUTE;
            $cancel_name = '';
            $cancel_value = '';
            $location_name = 'cancel';
            $location_value = _CANCEL;

            $val = $this->build_lib_button_hidden_array($arr, $form_name, $action, $submit_name, $submit_value, $cancel_name, $cancel_value, $location_name, $location_value, $location_url);
            $text = $this->build_lib_box_style(_RSSC_REFRESH_LINK, _RSSC_REFRESH_LINK_DSC, $val);
            echo $text;
        }

        public function get_mode_option()
        {
            $obj = &$this->_rssc_link_xml_handler->create();
            $mode_opt = $obj->get_mode_option();

            return $mode_opt;
        }

        // --- class end ---
    }
    // === class end ===
}
