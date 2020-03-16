<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: link_geocoding.php,v 1.2 2012/04/10 11:24:42 ohwada Exp $

//================================================================
// WebLinks Module
// 2012-04-02 K.OHWADA
//================================================================

include 'admin_header.php';
include 'admin_header_list.php';

//include_once WEBLINKS_ROOT_PATH . '/class/Address.php';

//=========================================================
// class ManageGeocoding
//=========================================================
class ManageGeocoding extends Happylinux\Manage
{
    public $_latitude_list;
    public $_longitude_list;

    public $_ZOOM_DEFAULT = 12;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct($dirname)
    {
        parent::__construct($dirname);

        $this->set_handler('Link', $dirname, 'weblinks');
        $this->set_id_name('lid');
        $this->set_list_id_name('link_geocoding_id');
        $this->set_script('link_geocoding.php');
        $this->set_form_class(HappylinuxForm::class);
        $this->set_flag_execute_time(true);
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
    // POST param
    //---------------------------------------------------------
    public function get_op()
    {
        $op = 'list';
        if (isset($_POST['mod_all'])) {
            $op = 'mod_all';
        }

        return $op;
    }

    //---------------------------------------------------------
    // main_mod_all()
    //---------------------------------------------------------
    public function main_mod_all()
    {
        $this->_latitude_list = $this->_post->get_post('latitude_list');
        $this->_longitude_list = $this->_post->get_post('longitude_list');
        $request = $this->_post->get_post('request_uri');

        if ($request) {
            $this->set_redirect_mod_all($request);
        }

        $this->_main_mod_all(true);
    }

    public function &_get_obj_mod_all()
    {
        $id = $this->_id;
        if (0 == $id) {
            return $this->_obj;
        }

        if (!isset($this->_latitude_list[$id])) {
            return $this->_obj;
        }
        if (!isset($this->_longitude_list[$id])) {
            return $this->_obj;
        }

        $this->_obj->setVar('gm_latitude', $this->_latitude_list[$id]);
        $this->_obj->setVar('gm_longitude', $this->_longitude_list[$id]);
        $this->_obj->setVar('gm_zoom', $this->_ZOOM_DEFAULT);

        return $this->_obj;
    }

    // --- class end ---
}
