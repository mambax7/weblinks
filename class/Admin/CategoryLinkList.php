<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: catlink_list.php,v 1.2 2007/11/11 03:22:59 ohwada Exp $

// 2007-11-01 K.OHWADA
// set_flag_execute_time()

// 2006-09-20 K.OHWADA
// this new file

//================================================================
// WebLinks Module
// 2006-09-20 K.OHWADA
//================================================================


//=========================================================
// class CategoryLinkList
//=========================================================
class CategoryLinkList extends Happylinux\PageFrame
{
    public $_category_handler;
    public $_link_handler;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct();
        $this->set_handler('CategoryLink', WEBLINKS_DIRNAME, 'weblinks');
        $this->set_id_name('jid');
        $this->set_lang_title('catlink list');
        $this->set_flag_execute_time(true);

        $this->_category_handler = weblinks_get_handler('Category', WEBLINKS_DIRNAME);
        $this->_link_handler = weblinks_get_handler('Link', WEBLINKS_DIRNAME);
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
    public function &_get_table_header()
    {
        $arr = [
            'jid',
            _WLS_CATEGORYID,
            _WLS_TITLEC,
            _WLS_LINKID,
            _WLS_SITETITLE,
        ];

        return $arr;
    }

    public function &_get_cols($obj)
    {
        $jid = $obj->get('jid');
        $cid = $obj->get('cid');
        $lid = $obj->get('lid');

        $cat_title_s = '';
        $link_title_s = '';

        $cat_obj = &$this->_category_handler->get($cid);
        if (is_object($cat_obj)) {
            $cat_title_s = $cat_obj->getVar('title', 's');
        }

        $link_obj = &$this->_link_handler->get($lid);
        if (is_object($link_obj)) {
            $link_title_s = $link_obj->getVar('title', 's');
        }

        $jump_catlink = 'catlink_manage.php?op=mod_form&jid=';
        $jump_cat = 'category_manage.php?op=mod_form&cid=';
        $jump_link = 'link_manage.php?op=mod_form&lid=';
        $link_catlink = $this->_build_page_id_link_by_obj($obj, 'jid', $jump_catlink);
        $link_cat = $this->_build_page_id_link_by_obj($obj, 'cid', $jump_cat);
        $link_link = $this->_build_page_id_link_by_obj($obj, 'lid', $jump_link);

        $arr = [
            $link_catlink,
            $link_cat,
            $cat_title_s,
            $link_link,
            $link_title_s,
        ];

        return $arr;
    }

    // --- class end ---
}
