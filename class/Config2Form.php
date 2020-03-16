<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// $Id: Config2Form.php,v 1.2 2012/04/09 10:20:05 ohwada Exp $

// 2012-04-02 K.OHWADA
// _build_conf_extra_webmap3_dirname_list()

// 2007-10-10 K.OHWADA
// extra_link_img_thumb

// 2007-09-10 K.OHWADA
// extra_rssc_dirname_list

//================================================================
// WebLinks Module
// 2007-06-10 K.OHWADA
//================================================================

// === class begin ===
if (!class_exists('Config2Form')) {
    //=========================================================
    // class Config2Form
    //=========================================================
    class Config2Form extends Happylinux\ConfigForm
    {
        public $_DIRNAME;

        // class
        public $_plugin;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            $this->_DIRNAME = $dirname;

            parent::__construct();

            $define = Config2Define::getInstance($dirname);
            $this->set_config_handler('config2', $dirname, 'weblinks');
            $this->set_config_define($define);

            $this->_plugin = Plugin::getInstance($dirname);
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
        // build config
        //---------------------------------------------------------
        public function build_conf_extra_func($config)
        {
            $formtype = $config['formtype'];
            $valuetype = $config['valuetype'];
            $name = $config['name'];
            $value = $config['value'];
            $options = $config['options'];
            $value_s = $this->sanitize_text($value);

            switch ($formtype) {
                case 'extra_dirname_list':
                    $ele = $this->_build_conf_extra_dirname_list($config);
                    break;
                case 'extra_rssc_dirname_list':
                    $ele = $this->_build_conf_extra_rssc_dirname_list($config);
                    break;
                case 'extra_webmap3_dirname_list':
                    $ele = $this->_build_conf_extra_webmap3_dirname_list($config);
                    break;
                case 'extra_forum_plugin':
                    $ele = $this->_build_conf_extra_forum_plugin($config);
                    break;
                case 'extra_album_plugin':
                    $ele = $this->_build_conf_extra_album_plugin($config);
                    break;
                case 'extra_d3forum_plugin':
                    $ele = $this->_build_conf_extra_d3forum_plugin($config);
                    break;
                case 'extra_d3forum_forum_id':
                    $ele = $this->_build_conf_extra_d3forum_forum_id($config);
                    break;
                case 'extra_link_img_thumb':
                    $ele = $this->_build_conf_extra_link_img_thumb($config);
                    break;
                default:
                    $ele = $this->build_html_input_text($name, $value_s);
                    break;
            }

            return $ele;
        }

        public function _build_conf_extra_dirname_list($config)
        {
            return $this->_build_conf_extra_dirname_list_common($config, null);
        }

        public function _build_conf_extra_rssc_dirname_list($config)
        {
            return $this->_build_conf_extra_dirname_list_common($config, 'include/rssc_version.php');
        }

        public function _build_conf_extra_webmap3_dirname_list($config)
        {
            return $this->_build_conf_extra_dirname_list_common($config, 'include/webmap3_version.php');
        }

        public function _build_conf_extra_dirname_list_common($config, $file)
        {
            $name = $config['name'];
            $value = $config['value'];

            $param = [
                'dirname_except' => $this->_DIRNAME,
                'none_flag' => true,
                'dirname_default' => $value,
            ];

            if ($file) {
                $param['file'] = $file;
            }

            $modules = &$this->_system->get_module_list($param);
            $options = &$this->_system->get_dirname_list($modules, $param);

            return $this->build_html_select($name, $value, $options);
        }

        public function _build_conf_extra_forum_plugin($config)
        {
            $name = $config['name'];
            $value = $config['value'];
            $options = &$this->_plugin->get_config_options('forum');

            return $this->build_html_select($name, $value, $options);
        }

        public function _build_conf_extra_album_plugin($config)
        {
            $name = $config['name'];
            $value = $config['value'];
            $options = &$this->_plugin->get_config_options('album');

            return $this->build_html_select($name, $value, $options);
        }

        public function _build_conf_extra_d3forum_plugin($config)
        {
            $name = $config['name'];
            $value = $config['value'];
            $options = &$this->_plugin->get_config_options('d3forum');

            return $this->build_html_select($name, $value, $options);
        }

        public function _build_conf_extra_d3forum_forum_id($config)
        {
            $name = $config['name'];
            $value = $config['value'];
            $options = &$this->_plugin->get_options_for_d3forum();

            return $this->build_html_select($name, $value, $options);
        }

        public function _build_conf_extra_link_img_thumb($config)
        {
            $banner_handler = handler('Banner', $this->_DIRNAME);

            $name = $config['name'];
            $value = $config['value'];
            $options = $banner_handler->get_thumb_options();

            return $this->build_html_input_radio_select($name, $value, $options, '<br>', false);
        }

        // --- class end ---
    }
    // === class end ===
}
