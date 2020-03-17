<?php

// $Id: weblinks_webmap.php,v 1.2 2012/10/14 00:38:10 ohwada Exp $

//=========================================================
// WebLinks Module
// 2012-04-02 K.OHWADA
//=========================================================

//---------------------------------------------------------
// 2012-10-14 K.OHWADA
// typo $mas -> $msg
//---------------------------------------------------------

// === class begin ===
if (!class_exists('weblinks_webmap')) {
    //=========================================================
    // class google map
    //=========================================================

    /**
     * Class weblinks_webmap
     */
    class weblinks_webmap extends weblinks_block_webmap
    {
        public $_DIRNAME;

        public $_map_class;
        public $_html_class;
        public $_form_class;

        public $_conf;

        public $_flag_webmap = false;
        public $_URL_IFRAME = '';
        public $_URL_OPENER = '';

        public $_map_div_id = '';
        public $_map_func = '';

        public $_lid = 0;
        public $_cid = 0;

        public $_info_max = 0;
        public $_info_width = 0;
        public $_IFRAME_HEIGHT = '800px';

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------

        /**
         * weblinks_webmap constructor.
         * @param $dirname
         */
        public function __construct($dirname)
        {
            parent::__construct($dirname);

            $this->_DIRNAME = $dirname;

            $config_handler = weblinks_get_handler('config2_basic', $dirname);

            $this->_conf = $config_handler->get_conf();

            $this->_URL_IFRAME = XOOPS_URL . '/modules/' . $dirname . '/get_location.php';
            $this->_URL_OPENER = XOOPS_URL . '/modules/' . $dirname . '/get_location.php?mode=opener';

            $this->_map_div_id = $dirname . '_google_map';
            $this->_map_func = $dirname . '_google_map_load';
        }

        /**
         * @param null $dirname
         * @return static
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
        // installed
        //---------------------------------------------------------

        /**
         * @return bool
         */
        public function check_installed()
        {
            $webmap_dirname = $this->get_webmap_dirname();
            if (!$webmap_dirname) {
                return false;
            }

            $file = XOOPS_ROOT_PATH . '/modules/' . $webmap_dirname . '/include/webmap3_version.php';
            if (!file_exists($file)) {
                return false;
            }

            include_once $file;
            if (!defined('_C_WEBMAP3_VERSION')) {
                return false;
            }

            return true;
        }

        /**
         * @return bool
         */
        public function get_webmap_dirname()
        {
            $dirname = $this->_conf['webmap3_dirname'];
            if (!$this->check_webmap_dirname($dirname)) {
                return false;
            }

            return $dirname;
        }

        /**
         * @return bool
         */
        public function check_version()
        {
            if (_C_WEBMAP3_VERSION < WEBLINKS_WEBMAP3_VERSION) {
                return false;
            }

            return true;
        }

        /**
         * @return string
         */
        public function build_display_iframe()
        {
            if (!$this->_flag_webmap) {
                return '';
            }

            $this->_html_class->set_display_iframe_url($this->_URL_IFRAME);

            return $this->_html_class->build_display_iframe();
        }

        //---------------------------------------------------------
        // init
        //---------------------------------------------------------

        /**
         * @return int
         */
        public function init_html()
        {
            $webmap_dirname = $this->get_webmap_dirname();
            if (!$webmap_dirname) {
                return 0;
            }

            $file = XOOPS_ROOT_PATH . '/modules/' . $webmap_dirname . '/include/api.php';
            if (!file_exists($file)) {
                return -1;
            }

            include_once $file;
            if (!class_exists('webmap3_api_html')) {
                return -1;
            }

            $this->_flag_webmap = true;
            $this->_html_class = webmap3_api_html::getSingleton($webmap_dirname);

            return 1;
        }

        /**
         * @return bool
         */
        public function init_map()
        {
            $webmap_dirname = $this->get_webmap_dirname();
            if (!$webmap_dirname) {
                return false;
            }

            $map_class = &$this->get_map_class($webmap_dirname);
            if (!is_object($map_class)) {
                return false;
            }

            $this->_flag_webmap = true;
            $this->_map_class = &$map_class;

            return true;
        }

        /**
         * @return string
         */
        public function get_init_error()
        {
            $msg = sprintf(_WEBLINKS_WEBMAP3_REQUIRE, WEBLINKS_WEBMAP3_VERSION);

            // typo $mas -> $msg
            return $msg;
        }

        //---------------------------------------------------------
        // category_manage
        //---------------------------------------------------------

        /**
         * @return int
         */
        public function init_form()
        {
            $webmap_dirname = $this->get_webmap_dirname();
            if (!$webmap_dirname) {
                return 0;
            }

            $file = XOOPS_ROOT_PATH . '/modules/' . $webmap_dirname . '/include/api.php';
            if (!file_exists($file)) {
                return -1;
            }

            include_once $file;
            if (!class_exists('webmap3_api_form')) {
                return -1;
            }

            $this->_flag_webmap = true;
            $this->_form_class = webmap3_api_form::getSingleton($webmap_dirname);

            return 1;
        }

        /**
         * @param $flag_header
         * @return string
         */
        public function get_form_js($flag_header)
        {
            if (!$this->_flag_webmap) {
                return '';
            }

            $js1 = $this->_form_class->build_form_js($flag_header);
            $js2 = $this->_form_class->build_display_html_js();
            $js = $js1 . $js2;

            return $js;
        }

        /**
         * @return string
         */
        public function get_display_js()
        {
            if (!$this->_flag_webmap) {
                return '';
            }

            return $this->_form_class->build_display_js();
        }

        /**
         * @return string
         */
        public function build_form_iframe()
        {
            if (!$this->_flag_webmap) {
                return '';
            }

            return $this->_form_class->build_div_html();
        }

        /**
         * @return string
         */
        public function build_form_desc()
        {
            if (!$this->_flag_webmap) {
                return '';
            }

            return $this->_form_class->build_form_desc_html();
        }

        /**
         * @param $id
         * @return mixed
         */
        public function build_ele_icon($id)
        {
            $this->_form_class->set_gicon_select_name('gm_icon');
            $this->_form_class->set_gicon_select_id('weblinks_gm_icon_id');
            $this->_form_class->set_gicon_img_id('weblinks_gm_icon_img');

            return $this->_form_class->build_ele_gicon($id);
        }

        public function set_display_url()
        {
            $url_iframe = $this->_URL_IFRAME;
            $url_opener = $this->_URL_OPENER;

            if ($this->_lid > 0) {
                $url_iframe .= '?lid=' . $this->_lid;
                $url_opener .= '&lid=' . $this->_lid;
            } elseif ($this->_cid > 0) {
                $url_iframe .= '?cid=' . $this->_cid;
                $url_opener .= '&cid=' . $this->_cid;
            }

            $this->_form_class->set_display_url_iframe($url_iframe);
            $this->_form_class->set_display_url_opener($url_opener);
        }

        /**
         * @param $v
         */
        public function set_lid($v)
        {
            $this->_lid = (int)$v;
        }

        /**
         * @param $v
         */
        public function set_cid($v)
        {
            $this->_cid = (int)$v;
        }

        //---------------------------------------------------------
        // index
        //---------------------------------------------------------

        /**
         * @param $links
         * @param $param
         * @return array
         */
        public function fetch_list($links, $param)
        {
            $show_webmap = false;

            $latitude = isset($param['gm_latitude']) ? $param['gm_latitude'] : 0;
            $longitude = isset($param['gm_longitude']) ? $param['gm_longitude'] : 0;
            $zoom = isset($param['gm_zoom']) ? $param['gm_zoom'] : 0;
            $type = isset($param['gm_type']) ? $param['gm_type'] : 0;

            $this->_map_class->init();

            $this->_map_class->set_latitude($latitude);
            $this->_map_class->set_longitude($longitude);
            $this->_map_class->set_zoom($zoom);
            $this->_map_class->set_map_type($this->get_map_type($type));

            $this->_map_class->set_title_length($this->_conf['gm_title_length']);
            $this->_map_class->set_info_max($this->_conf['gm_desc_length']);
            $this->_map_class->set_info_width($this->_conf['gm_wordwrap']);

            $this->_map_class->set_overview_map_control(true);
            $this->_map_class->set_overview_map_control_opened(true);

            // head
            $this->_map_class->assign_google_map_js_to_head();
            $this->_map_class->assign_map_js_to_head();
            $this->_map_class->assign_gicon_array_to_head();

            $markers = [];
            if (is_array($links) && count($links)) {
                foreach ($links as $link) {
                    if ($this->check_latlng_by_link($link)) {
                        $show_webmap = true;
                        $markers[] = $this->build_marker_list($link);
                    }
                }
            }

            // map
            $this->_map_class->set_map_div_id($this->_map_div_id);
            $this->_map_class->set_map_func($this->_map_func);

            $param = $this->_map_class->build_markers($markers);
            $this->_map_class->fetch_markers_head($param);

            $arr = [
                'show_webmap' => $show_webmap,
                'webmap_div_id' => $this->_map_div_id,
                'webmap_func' => $this->_map_func,
            ];

            return $arr;
        }

        /**
         * @param $type
         * @return string
         */
        public function get_map_type($type)
        {
            switch ($type) {
                case 1:
                    $map_type = 'satellite';
                    break;
                case 2:
                    $map_type = 'hybrid';
                    break;
                case 3:
                    $map_type = 'terrain';
                    break;
                case 0:
                default:
                    $map_type = 'roadmap';
                    break;
            }

            return $map_type;
        }

        //---------------------------------------------------------
        // single_link
        //---------------------------------------------------------

        /**
         * @param $link
         * @return array
         */
        public function fetch_single($link)
        {
            $show_webmap = false;

            $latitude = $link['gm_latitude'];
            $longitude = $link['gm_longitude'];
            $zoom = $link['gm_zoom'];
            $type = $link['gm_type'];

            $this->_map_class->init();

            $this->_map_class->set_latitude($latitude);
            $this->_map_class->set_longitude($longitude);
            $this->_map_class->set_zoom($zoom);
            $this->_map_class->set_map_type($this->get_map_type($type));

            $this->_map_class->set_title_length($this->_conf['gm_title_length']);
            $this->_map_class->set_info_max($this->_conf['gm_desc_length']);
            $this->_map_class->set_info_width($this->_conf['gm_wordwrap']);

            $this->_map_class->set_overview_map_control(true);
            $this->_map_class->set_overview_map_control_opened(true);

            // head
            $this->_map_class->assign_google_map_js_to_head();
            $this->_map_class->assign_map_js_to_head();
            $this->_map_class->assign_gicon_array_to_head();

            $markers = [];
            if ($this->check_latlng_by_link($link)) {
                $show_webmap = true;
                $markers[] = $this->build_marker_single($link);
            }

            // map
            $this->_map_class->set_map_div_id($this->_map_div_id);
            $this->_map_class->set_map_func($this->_map_func);

            $param = $this->_map_class->build_markers($markers);
            $this->_map_class->fetch_markers_head($param);

            $arr = [
                'show_webmap' => $show_webmap,
                'webmap_div_id' => $this->_map_div_id,
                'webmap_func' => $this->_map_func,
            ];

            return $arr;
        }

        //---------------------------------------------------------
        // marker
        //---------------------------------------------------------

        /**
         * @param $link
         * @return mixed
         */
        public function build_marker_list($link)
        {
            return $this->_map_class->build_single_marker(
                $link['gm_latitude'],
                $link['gm_longitude'],
                $this->build_info_list($link),
                $link['google_icon']
            );
        }

        /**
         * @param $link
         * @return mixed
         */
        public function build_marker_single($link)
        {
            return $this->_map_class->build_single_marker(
                $link['gm_latitude'],
                $link['gm_longitude'],
                $this->build_info_single($link),
                $link['google_icon']
            );
        }

        //---------------------------------------------------------
        // info
        //---------------------------------------------------------

        /**
         * @param $link
         * @return string
         */
        public function build_info_list($link)
        {
            $url = $this->_url_singlelink . '?lid=' . $link['lid'];
            $url_s = $this->sanitize($url);

            return $this->build_info_common($link, $url_s);
        }

        /**
         * @param $link
         * @return string
         */
        public function build_info_single($link)
        {
            $url_s = $this->sanitize($link['url']);

            return $this->build_info_common($link, $url_s);
        }

        /**
         * @param $link
         * @param $url_s
         * @return string
         */
        public function build_info_common($link, $url_s)
        {
            $title_s = $this->_map_class->build_title_short($link['title']);
            $summary = $this->_map_class->build_summary($link['description_disp']);

            return $this->build_info(
                $title_s,
                $url_s,
                $summary,
                $this->_conf['gm_marker_width']
            );
        }

        // --- class end ---
    }
    // === class end ===
}
