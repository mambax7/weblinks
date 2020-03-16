<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: column_manage.php,v 1.1 2007/08/08 04:18:25 ohwada Exp $

//=========================================================
// WebLinks Module
// 2007-08-01 K.OHWADA
//=========================================================

//=========================================================
// class ColumnManage
//=========================================================
class ColumnForm extends Happylinux\FormLib
{
    public $_link_handler;
    public $_system;
    public $_post;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct();

        $this->_link_handler = weblinks_get_handler('Link', WEBLINKS_DIRNAME);
        $this->_system = Happylinux\System::getInstance();
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
    // form
    //---------------------------------------------------------
    public function print_form()
    {
        $num = $this->_post->get_post_int('num');

        echo $this->build_form_begin('column_form');
        echo $this->build_token();
        echo $this->build_html_input_hidden('op', 'add_column');
        echo $this->build_form_table_begin();
        echo $this->build_form_table_title(_AM_WEBLINKS_COLUMN_MANAGE);
        echo $this->build_form_table_text(_AM_WEBLINKS_COLUMN_NUM, 'num', $num);
        echo $this->build_form_table_submit('', 'submit', _HAPPYLINUX_ADD);
        echo $this->build_form_table_end();
        echo $this->build_form_end();
    }

    // --- class end ---
}
