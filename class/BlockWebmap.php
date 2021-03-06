<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// $Id: BlockWebmap.php,v 1.1 2012/04/09 10:23:37 ohwada Exp $

//=========================================================
// WebLinks Module
// 2012-04-02 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('BlockWebmap')) {
    //=========================================================
    // class BlockWebmap
    //=========================================================
    class BlockWebmap
    {
        public $_map_class;

        public $_url_singlelink;

        public $_STYLE_DEFAULT = 'width:100%; height: border:1px solid #909090; margin-bottom:6px';

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            $this->_url_singlelink = XOOPS_URL . '/modules/' . $dirname . '/singlelink.php';
        }

        public static function &getSingleton($dirname)
        {
            static $singletons;
            if (!isset($singletons[$dirname])) {
                $singletons[$dirname] = new self($dirname);
            }

            return $singletons[$dirname];
        }

        //---------------------------------------------------------
        // block
        //---------------------------------------------------------
        public function build_map_block($param)
        {
            $dirname = $param['dirname'];
            $mode = $param['mode'];
            $name = $param['name'];
            $style_height = $param['style_height'];
            $links = $param['links'];
            $conf = $param['conf'];

            $webmap3_dirname = $conf['webmap3_dirname'];
            $use = $conf['gm_use'];
            $length = $conf['gm_desc_length'];
            $wordwrap = $conf['gm_wordwrap'];

            if (!$use) {
                return false;
            }

            if (!$this->check_webmap_dirname($webmap3_dirname)) {
                return false;
            }

            if (0 == $mode) {
                return false;
            // use config value
            } elseif (1 == $mode) {
                $latitude = $conf['gm_latitude'];
                $longitude = $conf['gm_longitude'];
                $zoom = $conf['gm_zoom'];
            } else {
                $latitude = $param['latitude'];
                $longitude = $param['longitude'];
                $zoom = $param['zoom'];
            }

            $show_webmap = false;
            $map_div_id = $name . '_map';
            $map_func = $name . '_map_load';
            $style = 'height:' . $style_height . 'px; ' . $this->_STYLE_DEFAULT;

            $this->_map_class = &$this->get_map_class($webmap3_dirname);
            if (!is_object($this->_map_class)) {
                return false;
            }

            $this->_map_class->init();

            $this->_map_class->set_latitude($latitude);
            $this->_map_class->set_longitude($longitude);
            $this->_map_class->set_zoom($zoom);

            $this->_map_class->set_info_max($length);
            $this->_map_class->set_info_width($wordwrap);

            // head
            $this->_map_class->assign_google_map_js_to_head();
            $this->_map_class->assign_map_js_to_head();
            $this->_map_class->assign_gicon_array_to_head();

            $markers = [];
            if (is_array($links) && count($links)) {
                foreach ($links as $link) {
                    if ($this->check_latlng_by_link($link)) {
                        $show_webmap = true;
                        $markers[] = $this->build_marker_block($link, $conf);
                    }
                }
            }

            // map
            $this->_map_class->set_map_div_id($map_div_id);
            $this->_map_class->set_map_func($map_func);

            $m_param = $this->_map_class->build_markers($markers);
            $this->_map_class->fetch_markers_head($m_param);

            $arr = [
                'show_webmap' => $show_webmap,
                'webmap_div_id' => $map_div_id,
                'webmap_func' => $map_func,
                'webmap_style' => $style,
            ];

            return $arr;
        }

        public function check_webmap_dirname($dirname)
        {
            if ('' == $dirname) {
                return false;
            }
            if ('-' == $dirname) {
                return false;
            }
            if ('---' == $dirname) {
                return false;
            }

            return true;
        }

        public function &get_map_class($webmap_dirname)
        {
            $false = false;

            $file = XOOPS_ROOT_PATH . '/modules/' . $webmap_dirname . '/include/api.php';
            if (!file_exists($file)) {
                return $false;
            }

            include_once $file;

            if (!class_exists('webmap3_api_map')) {
                return $false;
            }

            $map_class = &webmap3_api_map::getSingleton($webmap_dirname);

            return $map_class;
        }

        public function build_marker_block($link, $conf)
        {
            return $this->_map_class->build_single_marker($link['gm_latitude'], $link['gm_longitude'], $this->build_info_block($link, $conf), $link['google_icon']);
        }

        public function build_info_block($link, $conf)
        {
            $url = $this->_url_singlelink . '?lid=' . $link['lid'];
            $url_s = $this->sanitize($url);

            $summary = $this->_map_class->build_summary($link['desc_html']);

            return $this->build_info($link['title_disp'], $url_s, $summary, $conf['gm_marker_width']);
        }

        public function build_info($title, $url, $summary, $width, $flag_target = false)
        {
            $target = '';
            if ($flag_target) {
                $target = 'target="_blank"';
            }

            $info = '<a href="' . $url . '" ' . $target . '>';
            $info .= '<span style="font-weight:bold">' . $title . '</span>';
            $info .= '</a><br>';
            $info .= '<span style="font-size:80%">' . $summary . '</span>';

            if ($width > 0) {
                $info = '<div style="width:' . $width . 'px">' . $info . '</div>';
            }

            return $info;
        }

        public function check_latlng_by_link($link)
        {
            return $this->check_lat_lng_zoom($link['gm_latitude'], $link['gm_longitude'], $link['gm_zoom']);
        }

        public function check_lat_lng_zoom($latitude, $longitude, $zoom)
        {
            $zoom = (int)$zoom;
            if ($zoom > 0) {
                return true;
            }

            $lat = (int)($latitude * 1000000);
            $lng = (int)($longitude * 1000000);

            if (0 != $lat) {
                return true;
            }
            if (0 != $lng) {
                return true;
            }

            return false;
        }

        public function sanitize($str)
        {
            return htmlspecialchars($str, ENT_QUOTES);
        }

        // --- class end ---
    }
    // === class end ===
}
