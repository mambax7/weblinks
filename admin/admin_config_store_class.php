<?php
// $Id: admin_config_store_class.php,v 1.3 2007/11/16 15:09:09 ohwada Exp $

// 2007-11-11 K.OHWADA
// divid from admin_config_class.php
// remove weblinks_config_check_handler

//=========================================================
// WebLinks Module
// 2006-05-15 K.OHWADA
//================================================================

//================================================================
// class admin_config
//================================================================
class admin_config_store extends happy_linux_error
{
    public $_STYLE_SHEET = 'weblinks.css';

    // handler
    public $_config_store_handler;
    public $_linkitem_store_handler;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct();

        // config_store_handler
        $define = weblinks_config2_define::getInstance(WEBLINKS_DIRNAME);
        $this->_config_store_handler = happy_linux_config_store_handler::getInstance();
        $this->_config_store_handler->set_handler('config2', WEBLINKS_DIRNAME, 'weblinks');
        $this->_config_store_handler->set_define($define);

        // handler
        $this->_linkitem_store_handler = weblinks_getHandler('linkitem_store', WEBLINKS_DIRNAME);
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
    // save config
    //---------------------------------------------------------
    public function save_config()
    {
        if (isset($_POST['save_linkitem'])) {
            $ret = $this->_linkitem_store_handler->save();
            if (!$ret) {
                $this->_set_errors($this->_linkitem_store_handler->getErrors());
            }
        } else {
            $ret = $this->_config_store_handler->save();
            if (!$ret) {
                $this->_set_errors($this->_config_store_handler->getErrors());
            }
        }

        return $ret;
    }

    //---------------------------------------------------------
    // renew config
    //---------------------------------------------------------
    public function renew_config()
    {
        $ret = $this->_config_store_handler->renew_by_country_code();
        if (!$ret) {
            $this->_set_errors($this->_config_store_handler->getErrors());
        }

        return $ret;
    }

    //---------------------------------------------------------
    // rss cache clear
    //---------------------------------------------------------
    public function rss_cache_clear()
    {
        include_once XOOPS_ROOT_PATH . '/modules/happy_linux/api/rss_builder.php';
        include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_view.php';

        $rss_builder = weblinks_getHandler('build_rss', WEBLINKS_DIRNAME);
        $rss_builder->clear_all_guest_cache();

        if (WEBLINKS_RSSC_EXIST) {
            include_once WEBLINKS_RSSC_ROOT_PATH . '/class/rssc_build_rssc.php';

            $feed_builder = weblinks_getHandler('build_rss_feed', WEBLINKS_DIRNAME);
            $feed_builder->clear_all_guest_cache();
        }
    }

    public function template_compiled_clear()
    {
        include_once XOOPS_ROOT_PATH . '/modules/happy_linux/api/module_install.php';
        include_once WEBLINKS_ROOT_PATH . '/class/weblinks_install.php';

        $install = weblinks_install::getInstance(WEBLINKS_DIRNAME);
        $install->clear_all_template();
    }

    public function print_style_sheet()
    {
        $url = WEBLINKS_URL . '/' . $this->_STYLE_SHEET;
        echo '<link rel="stylesheet" type="text/css" href="' . $url . '" />';
    }

    // --- class end ---
}
