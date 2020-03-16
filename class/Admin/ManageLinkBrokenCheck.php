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

include 'admin_header.php';

//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/file.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/bin_file.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/locate.php';
//
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_locate.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_check_handler.php';
include_once WEBLINKS_ROOT_PATH . '/admin/admin_functions.php';

//=========================================================
// class link_broken_check manage
//=========================================================
class ManageLinkBrokenCheck extends Happylinux\Manage
{
    public $_post;

    public $_limit;
    public $_offset;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct(WEBLINKS_DIRNAME);

        $this->set_handler('LinkCheck', WEBLINKS_DIRNAME, 'weblinks');
        $this->set_id_name('lid');
        $this->set_form_class('LinkBrokenCheckForm');
        $this->set_script('link_broken_check.php');
        $this->set_flag_execute_time(true);

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
    // POST
    //---------------------------------------------------------
    public function get_post_op()
    {
        return $this->_post->get_post_get('op');
    }

    public function get_post_limit()
    {
        $this->_limit = $this->_post->get_post_int('limit');
        if ($this->_limit < 0) {
            $this->_limit = 0;
        }

        return $this->_limit;
    }

    public function get_post_offset()
    {
        $this->_offset = $this->_post->get_post_int('offset');
        if ($this->_offset < 0) {
            $this->_offset = 0;
        }

        return $this->_offset;
    }

    //---------------------------------------------------------
    // main_form()
    //---------------------------------------------------------
    public function main_form()
    {
        $total_link = $this->_handler->get_link_count_all();

        $this->_print_cp_header();
        $this->_print_bread_op(_WEBLINKS_ADMIN_LINK_BROKEN_CHECK, 'main_form');

        weblinks_admin_print_header();
        weblinks_admin_print_menu();

        echo '<h4>' . _WEBLINKS_ADMIN_LINK_BROKEN_CHECK . "</h4>\n";
        printf(_WLS_THEREARE, $total_link);
        echo "<br><br>\n";
        echo _WEBLINKS_ADMIN_LINK_BROKEN_CHECK_CAUTION . "<br>\n";

        $this->_print_form();
        $this->_print_cp_footer();
    }

    public function _print_form()
    {
        $limit = $this->get_post_limit();
        $offset = $this->get_post_offset();

        $this->_form->show_first($limit, $offset);
    }

    //---------------------------------------------------------
    // check_link
    //---------------------------------------------------------
    public function check_link()
    {
        $limit = $this->get_post_limit();
        $offset = $this->get_post_offset();

        $total_link = $this->_handler->get_link_count_all();

        $this->_print_cp_header();
        $this->_print_bread_op(_WEBLINKS_ADMIN_LINK_BROKEN_CHECK, 'main_form');

        if (!$this->_check_token()) {
            $this->_print_preview();
            exit();
        }

        $this->_handler->check($limit, $offset);

        $next = $offset + $limit;
        if (($limit > 0) && ($next < $total_link)) {
            echo "<br>\n";
            $this->_form->show_next($limit, $next);
        } else {
            echo '<h4>' . _HAPPYLINUX_EXECUTED . "</h4>\n";
        }

        $this->_print_cp_footer();
    }

    public function _print_preview()
    {
        $this->_print_token_error(1);
        $this->_print_form();
        $this->_print_cp_footer();
    }

    // --- class end ---
}
