<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: modify.php,v 1.7 2006/07/01 13:11:54 ohwada Exp $

// 2006-07-01 K.OHWADA
// BUG 4085: Fatal error: Call to undefined function: weblinks_page_frame_basic()

// 2006-05-15 K.OHWADA
// new handler

// 2006-03-15 K.OHWADA
// BUG 3743: fatal error ocucred when six or more links waiting to apoval

// 2005-10-20 K.OHWADA
// REQ 3028: send apoval email to anonymous user
// add send_approved_to_anonymous()
// add send_refused_to_user()

// 2005-09-27 K.OHWADA
// BUG 3031: timeout occurs if many waiting links
// add function list_xxx_link_xxx() print_xxx()

// 2005-01-20 K.OHWADA
// getErrorMsgAddLink

// 2004-12-14 K.OHWADA
// change caller index.php -> link_manage.php

// 2004-10-20 K.OHWADA
// URL-less mode
// bug fix: approve notify mail dont send

//=========================================================
// admin modify
// use class weblinksCategory, weblinksLink
// divid this file from index.php
// 2004/01/14 K.OHWADA
//=========================================================

//=========================================================
// class ListNewLinks
//=========================================================
class ListNewLinks extends weblinks_page_frame
{
    public $WEBLINKS_MAX_LINK_IN_DETAIL = 5;
    public $WEBLINKS_MAX_LINK_IN_PAGE = 5;

    public $_mode;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        // BUG: Fatal error: Call to undefined function: weblinks_page_frame_basic()
        parent::__construct();

        $this->set_handler('modify', WEBLINKS_DIRNAME);
        $this->set_id_name('mid');
        $this->set_flag_sortid(0);
        $this->set_perpage($this->WEBLINKS_MAX_LINK_IN_PAGE);
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
    // handler
    //---------------------------------------------------------
    public function show_new()
    {
        $this->_mode = 0;
        $this->_op = 'listNewLinks';
        $this->set_script('link_manage.php?op=listNewLinks');
        $this->show();
    }

    public function show_mod()
    {
        $this->_mode = 1;
        $this->_op = 'listModReq';
        $this->set_script('link_manage.php?op=listModReq');
        $this->show();
    }

    //---------------------------------------------------------
    // handler
    //---------------------------------------------------------
    public function get_table_header()
    {
        $arr = [
            _WEBLINKS_MID,
            _WLS_SITETITLE,
            _WLS_SITEURL,
        ];

        return $arr;
    }

    public function get_total()
    {
        $total = $this->_handler->get_count_by_mode($this->_mode);

        return $total;
    }

    public function &get_items($limit = 0, $start = 0)
    {
        $objs = $this->_handler->get_objects_by_mode($this->_mode, $limit, $start);

        return $objs;
    }

    public function &get_cols(&$obj)
    {
        $op = 'listNewLinks';
        $jump_id = 'link_manage.php?op=' . $this->_op . '&amp;mid=';
        $id_link = $this->build_html_id_link_by_obj($obj, 'mid', $jump_id);

        $title = $this->build_text_by_obj($obj, 'title');

        $url_link = $this->build_html_name_link_by_obj($obj, 'url', '', '_blank');

        $arr = [
            $id_link,
            $title,
            $url_link,
        ];

        return $arr;
    }

    //---------------------------------------------------------
    // print
    //---------------------------------------------------------
    public function print_top()
    {
        // dummy
    }

    // --- class end ---
}
