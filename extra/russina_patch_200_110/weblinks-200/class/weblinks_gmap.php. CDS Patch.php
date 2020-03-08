<?php
// $Id: weblinks_gmap.php.\040CDS\040Patch.php,v 1.1 2012/04/09 10:21:09 ohwada Exp $

// 2007-10-30 K.OHWADA
// gm_marker_width
// remove linkitem_handler->init()

//=========================================================
// WebLinks Module
// 2007-08-01 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('weblinks_gmap')) {
    //=========================================================
    // class google map
    //=========================================================
    class weblinks_gmap
    {
        public $_DIRNAME;

        public $_linkitem_handler;
        public $_strings;

        public $_conf;

        public $_template_list;
        public $_template_single;
        public $_template_iframe;

        public $_IFRAME_HEIGHT = '800px';

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            $this->_DIRNAME = $dirname;

            $config_handler = weblinks_getHandler('config2_basic', $dirname);
            $this->_linkitem_handler = weblinks_getHandler('linkitem_basic', $dirname);
            $this->_strings = happy_linux_strings::getInstance();

            $this->_conf = $config_handler->get_conf();

            /* CDS Patch. Weblinks. 2.00. 1. BOF */ global $xoopsConfig;
            $dir_theme = XOOPS_THEME_PATH . '/' . $xoopsConfig['theme_set'] . '/modules/' . $dirname . '/parts';
            $dir_parts = XOOPS_ROOT_PATH . '/modules/' . $dirname . '/templates/parts';
            if (file_exists($dir_theme . '/weblinks_gm_list.html')) {
                $this->_template_list = $dir_theme . '/weblinks_gm_list.html';
            } else {
                $this->_template_list = $dir_parts . '/weblinks_gm_list.html';
            }
            if (file_exists($dir_theme . '/weblinks_gm_single.html')) {
                $this->_template_single = $dir_theme . '/weblinks_gm_single.html';
            } else {
                $this->_template_single = $dir_parts . '/weblinks_gm_single.html';
            }
            if (file_exists($dir_theme . '/weblinks_gm_iframe.html')) {
                $this->_template_iframe = $dir_theme . '/weblinks_gm_iframe.html';
            } else {
                $this->_template_iframe = $dir_parts . '/weblinks_gm_iframe.html';
            }
            /* CDS Patch. Weblinks. 2.00. 1. EOF */
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
        // template
        //---------------------------------------------------------
        public function fetch_list($links, $param, $css_map = 'weblinks_gm_map_index')
        {
            $tpl = new XoopsTpl();
            $this->_assign_common($tpl, $param);
            $tpl->assign('css_map', $css_map);

            if (is_array($links) && count($links)) {
                foreach ($links as $link) {
                    $tpl->append('links', $link);
                }
            }

            $text = $tpl->fetch($this->_template_list);

            return $text;
        }

        public function fetch_single($link)
        {
            $tpl = new XoopsTpl();
            $this->_assign_common($tpl);
            $tpl->assign('link', $link);

            $text = $tpl->fetch($this->_template_single);

            return $text;
        }

        public function _assign_common($tpl, $param = null)
        {
            $gm_latitude = isset($param['gm_latitude']) ? $param['gm_latitude'] : 0;
            $gm_longitude = isset($param['gm_longitude']) ? $param['gm_longitude'] : 0;
            $gm_zoom = isset($param['gm_zoom']) ? $param['gm_zoom'] : 0;
            $gm_type = isset($param['gm_type']) ? $param['gm_type'] : 0;

            $linkitem = &$this->_linkitem_handler->get_conf();

            $gm_type_str = '';
            if (1 == $gm_type) {
                $gm_type_str = 'satellite';
            } elseif (2 == $gm_type) {
                $gm_type_str = 'hybrid';
            }

            // system parameter
            $tpl->assign('xoops_url', XOOPS_URL);
            $tpl->assign('xoops_langcode', _LANGCODE);
            $tpl->assign('dirname', $this->_DIRNAME);

            $tpl->assign('gm_server', $this->_conf['gm_server']);
            $tpl->assign('gm_apikey', $this->_conf['gm_apikey']);
            $tpl->assign('gm_map_control', $this->_conf['gm_map_control']);
            $tpl->assign('gm_marker_width', (int)$this->_conf['gm_marker_width']);

            $tpl->assign('bool_gm_use_type', $this->_strings->bool_to_str($this->_conf['gm_use_type_control']));
            $tpl->assign('bool_gm_use_scale', $this->_strings->bool_to_str($this->_conf['gm_use_scale_control']));
            $tpl->assign('bool_gm_use_overview', $this->_strings->bool_to_str($this->_conf['gm_use_overview_control']));
            $tpl->assign('bool_gm_use_center_marker', $this->_strings->bool_to_str($this->_conf['gm_use_center_marker']));

            $tpl->assign('gm_latitude', $gm_latitude);
            $tpl->assign('gm_longitude', $gm_longitude);
            $tpl->assign('gm_zoom', $gm_zoom);
            $tpl->assign('gm_type_str', $gm_type_str);

            $tpl->assign('lang_gm_latitude', happy_linux_sanitize_text($linkitem['gm_latitude']));
            $tpl->assign('lang_gm_longitude', happy_linux_sanitize_text($linkitem['gm_longitude']));
            $tpl->assign('lang_gm_zoom', happy_linux_sanitize_text($linkitem['gm_zoom']));

            $tpl->assign('lang_js_invalid', _WEBLINKS_JAVASCRIPT_INVALID);
            $tpl->assign('lang_not_compatible', _WEBLINKS_GM_NOT_COMPATIBLE);
            $tpl->assign('lang_more', _WLS_MORE);
        }

        public function build_form_iframe()
        {
            $text = '<div id="weblinks_gm_iframe"></div>';

            return $text;
        }

        public function build_form_desc()
        {
            // BUG 4313: same browser like opera cannot show gm_get_location.php
            // because the parent-child relationship of the windows isn't recognized.

            $WEBLINKS_URL = XOOPS_URL . '/modules/' . $this->_DIRNAME;
            $url_gm_get = $WEBLINKS_URL . '/gm_get_location.php?mode=opener';
            $url_image = $WEBLINKS_URL . '/images/google_maps.gif';

            $text = '<a name="google_map_desc"></a>' . "\n";

            $text .= '<a href="' . $url_gm_get . '" target="_blank">';
            $text .= '<img src="' . $url_image . '" border="0" alt="google map" />';
            $text .= '</a> ';
            $text .= _WEBLINKS_GM_GET_LOCATION;
            $text .= "<br>\n";
            $text .= '<a href="' . $url_gm_get . '" target="_blank">';
            $text .= _WEBLINKS_GM_NEW_WINDOW;
            $text .= "</a> <br>\n";
            $text .= '<a href="#google_map_desc" onclick="weblinks_gm_window_open()">';
            $text .= _WEBLINKS_GM_NEW_WINDOW . 'window.open';
            $text .= "</a> <br>\n";
            $text .= '<a href="#google_map_desc" onclick="weblinks_gm_disp_on()">';
            $text .= _WEBLINKS_GM_INLINE;
            $text .= "</a> <br>\n";

            return $text;
        }

        // --- class end ---
    }
    // === class end ===
}
