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
class ColumnManage extends Happylinux\Error
{
    public $_link_handler;
    public $_modify_handler;
    public $_config_handler;
    public $_linkitem_store_handler;
    public $_form;
    public $_post;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        $this->_link_handler = weblinks_get_handler('Link', WEBLINKS_DIRNAME);
        $this->_modify_handler = handler('Modify', WEBLINKS_DIRNAME);
        $this->_config_handler = handler('Config2', WEBLINKS_DIRNAME);
        $this->_linkitem_store_handler = weblinks_get_handler('LinkitemStore', WEBLINKS_DIRNAME);

        $this->_form = ColumnForm::getInstance();
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

    public function get_post_num()
    {
        return $this->_post->get_post_int('num');
    }

    //---------------------------------------------------------
    // add_column
    //---------------------------------------------------------
    public function add_column()
    {
        $num = $this->get_post_num();

        if ($num <= 0) {
            $msg = sprintf(_HAPPYLINUX_ERR_FILL, _AM_WEBLINKS_COLUMN_NUM);

            return $msg;
        }

        $etc_arr = &$this->_link_handler->get_field_name_etc_array();
        $count = count($etc_arr);
        $start = $count + 1;
        $end = $count + $num;

        $ret = $this->_link_handler->add_column_table_etc($start, $end);
        if (!$ret) {
            $this->_set_errors($this->_link_handler->getErrors());
        }

        $ret = $this->_modify_handler->add_column_table_etc($start, $end);
        if (!$ret) {
            $this->_set_errors($this->_modify_handler->getErrors());
        }

        $ret = $this->_config_handler->update_by_name('link_num_etc', $end);
        if (!$ret) {
            $this->_set_errors($this->_config_handler->getErrors());
        }

        $this->_linkitem_store_handler->set_num_etc($end);
        $ret = $this->_linkitem_store_handler->upgrade();
        if (!$ret) {
            $this->_set_errors($this->_config_linkitem_handler->getErrors());
        }

        if (!$this->returnExistError()) {
            $msg = "DB Error <br>\n";
            $msg .= $this->getErrors('s');

            return $msg;
        }

        redirect_header('column_manage.php', 1, _HAPPYLINUX_ADDED);
        exit();
    }

    //---------------------------------------------------------
    // form
    //---------------------------------------------------------
    public function check_etc_column()
    {
        $link_etc_arr = &$this->_link_handler->get_field_name_etc_array();
        $modify_etc_arr = &$this->_modify_handler->get_field_name_etc_array();

        $count = count($link_etc_arr);

        echo sprintf(_AM_WEBLINKS_THERE_ARE_COLUMN, $count) . " <br>\n";

        foreach ($link_etc_arr as $name) {
            echo '- ' . $name . " <br>\n";
        }
        echo "<br>\n";

        if ($link_etc_arr != $modify_etc_arr) {
        }
    }

    public function print_form()
    {
        $link_etc_arr = &$this->_link_handler->get_field_name_etc_array();
        $modify_etc_arr = &$this->_modify_handler->get_field_name_etc_array();

        $count = count($link_etc_arr);

        echo sprintf(_AM_WEBLINKS_THERE_ARE_COLUMN, $count) . " <br>\n";

        foreach ($link_etc_arr as $name) {
            echo '- ' . $name . " <br>\n";
        }
        echo "<br>\n";

        if ($link_etc_arr != $modify_etc_arr) {
            $msg = _AM_WEBLINKS_COLUMN_UNMATCH . "<br>\n";
            $msg .= _AM_WEBLINKS_PHPMYADMIN . "<br>\n";
            $this->print_error_in_div($msg, false);
        }

        $this->_form->print_form();
    }

    public function check_token()
    {
        $ret = $this->_form->check_token();

        return $ret;
    }

    // --- class end ---
}
