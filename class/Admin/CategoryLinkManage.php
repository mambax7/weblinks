<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: catlink_manage.php,v 1.3 2007/11/11 03:22:59 ohwada Exp $

// 2007-11-01 K.OHWADA
// set_flag_execute_time()

// 2007-02-20 K.OHWADA
// hack for multi site

// 2006-09-20 K.OHWADA
// this new file

//================================================================
// WebLinks Module
// 2006-09-20 K.OHWADA
//================================================================


//=========================================================
// class CategoryLinkManage
//=========================================================
class CategoryLinkManage extends Happylinux\Manage
{
    public $_category_handler;
    public $_link_handler;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct(WEBLINKS_DIRNAME);
        $this->set_handler('CategoryLink', WEBLINKS_DIRNAME, 'weblinks');
        $this->set_id_name('jid');
        $this->set_form_class(CategoryLinkForm::class);
        $this->set_script('catlink_manage.php');
        $this->set_redirect('catlink_list.php', 'catlink_list.php?sortid=1');
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
    // main_mod_form()
    //---------------------------------------------------------
    public function mod_form()
    {
        $this->_main_mod_form();
    }

    //---------------------------------------------------------
    // main_mod_table()
    //---------------------------------------------------------
    public function mod_table()
    {
        $this->_main_mod_table(true);
    }

    //---------------------------------------------------------
    // main_del_table()
    //---------------------------------------------------------
    public function del_table()
    {
        $this->_main_del_table(true);
    }

    // --- class end ---
}
