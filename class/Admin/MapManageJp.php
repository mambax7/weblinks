<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: map_jp_manage.php,v 1.2 2007/11/11 03:22:59 ohwada Exp $

// 2007-11-01 K.OHWADA
// weblinks_admin_print_footer()
// admin_header_config.php

//=========================================================
// WebLinks Module
// 2007-08-01 K.OHWADA
//=========================================================

include 'admin_header.php';
include 'admin_header_config.php';

//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_map_jp.php';

if (file_exists(WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/map_jp.php')) {
    include_once WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/map_jp.php';
} else {
    include_once WEBLINKS_ROOT_PATH . '/language/english/map_jp.php';
}

//=========================================================
// class MapManageJp
//=========================================================
class MapManageJp extends Happylinux\Error
{
    public $_category_handler;
    public $_config_handler;
    public $_map_jp;
    public $_header;
    public $_form;
    public $_post;

    public $_pref_array = [];

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        $this->_category_handler = weblinks_get_handler('CategoryBasic', WEBLINKS_DIRNAME);
        $this->_config_handler   = handler('Config2', WEBLINKS_DIRNAME);
        $this->_map_jp           = MapJp::getInstance(WEBLINKS_DIRNAME);
        $this->_header           = Header::getInstance(WEBLINKS_DIRNAME);

        $this->_form = MapFormJp::getInstance();
        $this->_post = Happylinux\Post::getInstance();
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
    // post parameter
    //---------------------------------------------------------
    public function get_post_op()
    {
        return $this->_post->get_post_text('op');
    }

    //---------------------------------------------------------
    // save
    //---------------------------------------------------------
    public function save_map()
    {
        $pref_arr = $this->_post->get_post('pref');
        $name_arr = $this->_post->get_post('name');
        $cid_arr  = $this->_post->get_post('cid');

        if (!is_array($pref_arr) || (0 == count($pref_arr))) {
            $msg = 'Error';

            return $msg;
        }

        $arr   = [];
        $count = count($pref_arr);
        for ($i = 0; $i < $count; ++$i) {
            $pref               = $pref_arr[$i];
            $arr[$pref]['name'] = $name_arr[$i];
            $arr[$pref]['cid']  = $cid_arr[$i];
        }

        $ret = $this->_config_handler->update_by_name('map_jp_info', $arr);
        if (!$ret) {
            $this->_set_errors($this->_config_handler->getErrors());
        }

        if (!$this->returnExistError()) {
            $msg = "DB Error <br>\n";
            $msg .= $this->getErrors('s');

            return $msg;
        }

        redirect_header('map_jp_manage.php', 1, _HAPPYLINUX_SAVED);
        exit();
    }

    //---------------------------------------------------------
    // print map
    //---------------------------------------------------------
    public function print_map()
    {
        $this->_category_handler->load_once();
        $pref = &$this->_map_jp->get_pref_count_array($this->_pref_array);
        echo $this->_map_jp->fetch_template($pref);
    }

    public function &set_pref_array()
    {
        // get from config
        $ret = true;
        $arr = &$this->_map_jp->get_conf_pref_array();

        // get from map_jp
        if (!is_array($arr) || !isset($arr['hokkaido'])) {
            $ret = false;
            $arr = &$this->_map_jp->get_label_pref_array();
        }

        $this->_pref_array = &$arr;

        return $ret;
    }

    //---------------------------------------------------------
    // form
    //---------------------------------------------------------
    public function print_form()
    {
        $this->_form->print_form($this->_pref_array);
    }

    public function check_token()
    {
        $ret = $this->_form->check_token();

        return $ret;
    }

    //---------------------------------------------------------
    // header
    //---------------------------------------------------------
    public function print_header()
    {
        echo $this->_header->build_module_header_map_jp();
    }

    // --- class end ---
}
