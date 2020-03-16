<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: link_check_manage.php,v 1.2 2008/02/27 01:45:06 ohwada Exp $

// 2008-02-17 K.OHWADA
// change file name link_broken_check.php -> link_check_manage.php
// update_pagerank()

// 2007-11-01 K.OHWADA
// set_flag_execute_time()

// 2007-06-10 K.OHWADA
// bin_file.php

// 2007-02-20 K.OHWADA
// hack for multi site

// 2006-10-01 K.OHWADA
// use happy_linux
// use XoopsGTicket
// use weblinks_locate

// 2006-05-15 K.OHWADA
// new handler
// add class LinkBrokenCheckForm
// use token ticket

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//=========================================================
// WebLinks Module
// 2004-10-20 K.OHWADA
//=========================================================

//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/file.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/bin_file.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/locate.php';
//
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_locate.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_check_base.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_check_handler.php';
include_once WEBLINKS_ROOT_PATH . '/admin/admin_functions.php';

//=========================================================
// class PageRankForm
//=========================================================
class PageRankForm extends Happylinux\FormLib
{
    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct();
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
    // function
    //---------------------------------------------------------
    public function show_first($op, $title, $limit = 0, $offset = 0)
    {
        echo $this->build_form_begin();
        echo $this->build_token();
        echo $this->build_html_input_hidden('op', $op);
        echo $this->build_form_table_begin();
        echo $this->build_form_table_title($title);

        echo $this->build_form_table_text(_WEBLINKS_ADMIN_LIMIT, 'limit', $limit);
        echo $this->build_form_table_text(_WEBLINKS_ADMIN_OFFSET, 'offset', $offset);
        echo $this->build_form_table_submit('', 'post', _HAPPYLINUX_EXECUTE);

        echo $this->build_form_table_end();
        echo $this->build_form_end();
    }

    public function show_next($op, $title, $limit = 0, $offset = 0)
    {
        $submit = sprintf('Next %s link', $limit);

        $desc = '';
        $action = '';
        $text = $this->build_lib_box_limit_offset($title, $desc, $limit, $offset, $op, $submit, $action);
        echo $text;
    }

    // --- class end ---
}

//=========================================================
// main
//=========================================================
// hack for multi site
weblinks_admin_multi_disable_feature();

$manage = LinkCheckManage::getInstance();
$op = $manage->get_post_op();

switch ($op) {
    case 'check':
        $manage->check_link();
        break;
    case 'update':
        $manage->update_pagerank();
        break;
    default:
        $manage->main_form();
        break;
}

xoops_cp_footer();
exit(); // --- end of main ---
