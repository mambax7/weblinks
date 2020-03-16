<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: link_broken_check.php,v 1.11 2007/11/11 03:22:59 ohwada Exp $

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
// check link broken
// 2004-10-20 K.OHWADA
//=========================================================

//=========================================================
// class LinkBrokenCheckForm
//=========================================================
class LinkBrokenCheckForm extends Happylinux\FormLib
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
    public function show_first($limit = 0, $offset = 0)
    {
        echo $this->build_form_begin('check');
        echo $this->build_token();
        echo $this->build_html_input_hidden('op', 'check');
        echo $this->build_form_table_begin();
        echo $this->build_form_table_title(_WEBLINKS_ADMIN_LINK_BROKEN_CHECK);

        echo $this->build_form_table_text(_WEBLINKS_ADMIN_LIMIT, 'limit', $limit);
        echo $this->build_form_table_text(_WEBLINKS_ADMIN_OFFSET, 'offset', $offset);
        echo $this->build_form_table_submit('', 'post', _WEBLINKS_CHECK);

        echo $this->build_form_table_end();
        echo $this->build_form_end();
    }

    public function show_next($limit = 0, $offset = 0)
    {
        $submit = sprintf(_WEBLINKS_ADMIN_CHECK_NEXT, $limit);

        $desc = '';
        $action = '';
        $text = $this->build_lib_box_limit_offset(_WEBLINKS_ADMIN_LINK_BROKEN_CHECK, $desc, $limit, $offset, 'check', $submit, $action);
        echo $text;
    }

    // --- class end ---
}

//=========================================================
// main
//=========================================================
// hack for multi site
weblinks_admin_multi_disable_feature();

$manage = ManageLinkBrokenCheck::getInstance();
$op = $manage->get_post_op();

switch ($op) {
    case 'check':
        $manage->check_link();
        break;
    default:
        $manage->main_form();
        break;
}

xoops_cp_footer();
exit(); // --- end of main ---
