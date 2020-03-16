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

include 'admin_header.php';

//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/file.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/bin_file.php';
//include_once XOOPS_ROOT_PATH . '/modules/happylinux/class/locate.php';
//
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_locate.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_check_base.php';
//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_link_check_handler.php';
include_once WEBLINKS_ROOT_PATH . '/admin/admin_functions.php';

//=========================================================
// class link_check_manage
//=========================================================
class LinkCheckManage extends Happylinux\Manage
{
    public $_config_handler;
    public $_check_handler;
    public $_update_handler;

    public $_post;

    public $_conf = null;
    public $_limit = 0;
    public $_offset = 0;

    public $_TITLE_UPDATE = 'PageRank Update';

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct(WEBLINKS_DIRNAME);

        $this->set_handler('Link', WEBLINKS_DIRNAME, 'weblinks');
        $this->set_id_name('lid');
        $this->set_form_class(PageRankForm::class);
        $this->set_script('link_check_manage.php');
        $this->set_flag_execute_time(true);

        $this->_config_handler = weblinks_get_handler('Config2Basic', WEBLINKS_DIRNAME);
        $this->_check_handler = weblinks_get_handler('LinkCheck', WEBLINKS_DIRNAME);
        $this->_update_handler = handler('Pagerank_update', WEBLINKS_DIRNAME);

        $this->_post = Happylinux\Post::getInstance();

        $this->_conf = $this->_config_handler->get_conf();
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
        $total = $this->_check_handler->get_link_count_all();

        $this->_print_cp_header();
        $this->_print_bread_op(_AM_WEBLINKS_LINK_CHECK_MANAGE, 'main_form');

        weblinks_admin_print_header();
        weblinks_admin_print_menu();

        echo '<h4>' . _AM_WEBLINKS_LINK_CHECK_MANAGE . "</h4>\n";
        printf(_WLS_THEREARE, $total);
        echo "<br><br>\n";
        echo _WEBLINKS_ADMIN_LINK_BROKEN_CHECK_CAUTION;
        echo "<br><br>\n";

        $this->_print_form('check', _WEBLINKS_ADMIN_LINK_BROKEN_CHECK);
        echo "<br><br>\n";

        $this->_print_form('update', $this->_TITLE_UPDATE);
        echo "<br><br>\n";

        $this->_print_cp_footer();
    }

    public function _print_form($op, $title)
    {
        $limit = $this->get_post_limit();
        $offset = $this->get_post_offset();

        $this->_form->show_first($op, $title, $limit, $offset);
    }

    //---------------------------------------------------------
    // update_pagerank
    //---------------------------------------------------------
    public function check_link()
    {
        $this->_print_header();

        $this->_check_handler->check($this->_limit, $this->_offset);

        $this->_print_footer('check', _WEBLINKS_ADMIN_LINK_BROKEN_CHECK);
    }

    public function update_pagerank()
    {
        $this->_print_header();

        $this->_update_handler->update($this->_limit, $this->_offset);

        $this->_print_footer('update', $this->_TITLE_UPDATE);
    }

    public function _print_header()
    {
        $limit = $this->get_post_limit();
        $offset = $this->get_post_offset();

        $this->_print_cp_header();
        $this->_print_bread_op(_AM_WEBLINKS_LINK_CHECK_MANAGE, 'main_form');

        if (!$this->_check_token()) {
            $this->_print_preview();
            exit();
        }
    }

    public function _print_footer($op, $title)
    {
        $limit = $this->_limit;
        $offset = $this->_offset;
        $next = $offset + $limit;

        $total = $this->_check_handler->get_link_count_all();

        if (($limit > 0) && ($next < $total)) {
            echo "<br>\n";
            $this->_form->show_next($op, $title, $limit, $next);
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
