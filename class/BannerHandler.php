<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// $Id: BannerHandler.php,v 1.10 2008/01/14 06:07:13 ohwada Exp $

// 2008-01-10 K.OHWADA
// Warning [PHP]: fopen(): failed to open stream: No such file or directory

// 2007-11-01 K.OHWADA
// init_dir_work()
// get_thumb_options()
// Only variables should be assigned by reference

// 2007-09-20 K.OHWADA
// get_cat_image_size()

// 2007-09-10 K.OHWADA
// support mozshot simpleapi

// 2007-05-06 K.OHWADA
// remove image_list_width

// 2007-03-01 K.OHWADA
// change build_show_image

//=========================================================
// WebLinks Module
// 2006-12-10 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('BannerHandler')) {
    //=========================================================
    // class BannerHandler
    //=========================================================
    class BannerHandler extends Happylinux\Error
    {
        public $_DIRNAME;
        public $_DIR_THUMBS;

        public $_config_handler;
        public $_link_handler;
        public $_remote_image;
        public $_image_size;
        public $_strings;
        public $_class_dir;

        public $_conf;

        public $_web_size = [
            'link_width' => 0,
            'link_height' => 0,
            'list_width' => 0,
            'list_height' => 0,
        ];

        public $_dir_work;

        //-----------------------------------------------
        // This is for lower compatibility of mylinks
        //-----------------------------------------------
        public $_DIR_SHOTS;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            parent::__construct();

            $this->_DIRNAME = $dirname;
            $this->_DIR_THUMBS = '/modules/' . $dirname . '/thumbs';
            $this->_DIR_SHOTS = '/modules/' . $dirname . '/images/shots';

            $this->_config_handler = weblinks_get_handler('Config2Basic', $dirname);
            $this->_link_handler = weblinks_get_handler('LinkBasic', $dirname);
            $this->_remote_image = Happylinux\RemoteImage::getInstance();
            $this->_image_size =  Happylinux\ImageSize::getInstance();
            $this->_strings = Happylinux\Strings::getInstance();
            $this->_class_dir = Happylinux\Dir::getInstance();

            $this->_dir_work = $this->_class_dir->init_dir_work();
            $this->_remote_image->set_dir_work($this->_dir_work);

            $this->_conf = &$this->_config_handler->get_conf();

            // if init config
            if (isset($this->_conf['link_img_thumb'])) {
                $this->_init_web_size();
            }
        }

        //---------------------------------------------------------
        // get param
        //---------------------------------------------------------
        public function get_dir_work()
        {
            return $this->_dir_work;
        }

        //---------------------------------------------------------
        // show banner
        //---------------------------------------------------------
        public function &build_show_image_web($banner, $width, $height, $url)
        {
            $arr1 = &$this->build_show_image($banner, $width, $height);

            $image_url = $arr1['image_url'];
            $image_link_width = $arr1['image_link_width'];
            $image_link_height = $arr1['image_link_height'];
            $image_list_width = $arr1['image_list_width'];
            $image_list_height = $arr1['image_list_height'];

            if (empty($image_url) && $url) {
                $image_url = $this->_build_web_url($url);
                if ($image_url) {
                    $image_url = $this->_strings->sanitize_url($image_url);
                    $image_link_width = $this->_web_size['link_width'];
                    $image_link_height = $this->_web_size['link_height'];
                    $image_list_width = $this->_web_size['list_width'];
                    $image_list_height = $this->_web_size['list_height'];
                }
            }

            $arr2 = [
                'image_url' => $image_url,
                'image_link_width' => $image_link_width,
                'image_link_height' => $image_link_height,
                'image_list_width' => $image_list_width,
                'image_list_height' => $image_list_height,
            ];

            return $arr2;
        }

        public function &build_show_image($banner, $width, $height)
        {
            $image_url = '';
            $link_width = 0;
            $link_height = 0;
            $list_width = 0;
            $list_height = 0;

            if ($banner) {
                $image_url = $this->_assume_banner_url($banner);

                // size exist
                if ($width && $height) {
                    $arr1 = &$this->_adjust_size($width, $height);
                    $link_width = $arr1['link_width'];
                    $link_height = $arr1['link_height'];
                    $list_width = $arr1['list_width'];
                    $list_height = $arr1['list_height'];
                }

                $image_url = $this->_strings->sanitize_url($image_url);
            }

            $arr2 = [
                'image_url' => $image_url,
                'image_link_width' => $link_width,
                'image_link_height' => $link_height,
                'image_list_width' => $list_width,
                'image_list_height' => $list_height,
            ];

            return $arr2;
        }

        public function _assume_banner_url($banner)
        {
            if (empty($banner)) {
                return $banner;
            }

            // URL style: "https://" or "https://"
            $url = $banner;
            if (preg_match('|^https?://|', $url)) {
                return $url;
            }

            // abbreviated style
            $url = XOOPS_URL . $banner;
            $file = XOOPS_ROOT_PATH . $banner;

            // if exist
            // fopen(): failed to open stream: No such file or directory
            if (file_exists($file)) {
                $fp = fopen($file, 'rb');
                if ($fp) {
                    fclose($fp);

                    return $url;
                }
            }

            // mylinks style
            $url = XOOPS_URL . $this->_DIR_SHOTS . '/' . $banner;
            $file = XOOPS_ROOT_PATH . $this->_DIR_SHOTS . '/' . $banner;

            // if exist
            if (file_exists($file)) {
                $fp = fopen($file, 'rb');
                if ($fp) {
                    fclose($fp);

                    return $url;
                }
            }

            return false;
        }

        public function &_adjust_size($width, $height)
        {
            list($list_width, $list_height) = $this->_image_size->adjust_size($width, $height, $this->_conf['list_image_width'], $this->_conf['list_image_height']);

            list($link_width, $link_height) = $this->_image_size->adjust_size($width, $height, $this->_conf['link_image_width'], $this->_conf['link_image_height']);

            $arr = [
                'link_width' => $link_width,
                'link_height' => $link_height,
                'list_width' => $list_width,
                'list_height' => $list_height,
            ];

            return $arr;
        }

        //---------------------------------------------------------
        // get banner size
        //---------------------------------------------------------
        public function &get_remote_banner_size($banner)
        {
            $size = [0, 0, 0, ''];

            if (empty($banner)) {
                return $size;
            }

            $url = $this->_assume_banner_url($banner);

            $size = &$this->_remote_image->get_image_size($url);
            if (!$size) {
                $this->_set_error_code($this->_remote_image->getErrorCode());
                $this->_set_errors($this->_remote_image->getErrors());
            }

            return $size;
        }

        //---------------------------------------------------------
        // get category image size
        //---------------------------------------------------------
        public function &get_cat_image_size($url)
        {
            $false = false;

            if (empty($url) || ('https://' == $url) || ('https://' == $url)) {
                return $false;
            }

            $size = &$this->_remote_image->get_image_size($url);
            if (!$size) {
                $this->_set_error_code($this->_remote_image->getErrorCode());
                $this->_set_errors($this->_remote_image->getErrors());

                return $false;
            }

            list($orig_width, $orig_height) = $size;

            list($show_width, $show_height) = $this->_image_size->adjust_size($orig_width, $orig_height, $this->_conf['cat_img_width'], $this->_conf['cat_img_height']);

            $arr = [
                'orig_width' => $orig_width,
                'orig_height' => $orig_height,
                'show_width' => $show_width,
                'show_height' => $show_height,
            ];

            return $arr;
        }

        //---------------------------------------------------------
        // web thumbnail
        //---------------------------------------------------------
        public function get_thumb_options()
        {
            $opts = [];
            $opts['non'] = _AM_WEBLINKS_LINK_IMG_NON;

            $files = &$this->_class_dir->get_files_in_dir($this->_DIR_THUMBS, 'php');

            foreach ($files as $file) {
                $key = str_replace('.php', '', $file);
                $arr = &$this->_exec_plugin($key);
                if (isset($arr['name']) && isset($arr['url'])) {
                    $str = '<a href="' . $arr['url'] . '" target="_blank">' . $arr['name'] . '</a>';
                    $opts[$key] = sprintf(_AM_WEBLINKS_LINK_IMG_USE, $str);
                }
            }

            $arr2 = array_flip($opts);

            return $arr2;
        }

        public function _init_web_size()
        {
            $arr = &$this->_get_web_size();
            if (is_array($arr) && count($arr)) {
                $this->_web_size = &$arr;
            }
        }

        // Only variables should be assigned by reference
        public function &_get_web_size()
        {
            $arr2 = null;
            if ('non' != $this->_conf['link_img_thumb']) {
                $arr1 = &$this->_exec_plugin($this->_conf['link_img_thumb']);
                if (is_array($arr1) && isset($arr1['width']) && isset($arr1['height'])) {
                    $arr2 = &$this->_adjust_size($arr1['width'], $arr1['height']);
                }
            }

            return $arr2;
        }

        public function _build_web_url($url)
        {
            $image = '';
            if ('non' != $this->_conf['link_img_thumb']) {
                $arr = &$this->_exec_plugin($this->_conf['link_img_thumb'], $url);
                if (is_array($arr) && isset($arr['image'])) {
                    $image = $arr['image'];
                }
            }

            return $image;
        }

        public function &_exec_plugin($key, $url = '')
        {
            $file = $this->_DIR_THUMBS . '/' . $key . '.php';
            $func = 'weblinks_thumb_' . $key;

            $arr = [];

            if (file_exists(XOOPS_ROOT_PATH . '/' . $file)) {
                include_once XOOPS_ROOT_PATH . '/' . $file;
            } else {
                return $arr;
            }

            if (function_exists($func)) {
                $arr = &$func($url);
            }

            return $arr;
        }

        // --- class end ---
    }
    // === class end ===
}
