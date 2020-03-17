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
// class CategoryLinkForm
//=========================================================
class CategoryLinkForm extends Happylinux\Form
{
    public $_category_handler;
    public $_link_handler;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct();

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
    // show black & white
    //---------------------------------------------------------
    public function _show($obj, $extra = null, $mode = 0)
    {
        $form_title = 'modify catlink';
        $op = 'mod_table';
        $button_val = _HAPPYLINUX_MODIFY;

        $this->set_obj($obj);

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

        // form start
        echo $this->build_form_begin();
        echo $this->build_token();
        echo $this->build_html_input_hidden('op', $op);
        echo $this->build_html_input_hidden('jid', $obj->get('jid'));

        echo $this->build_form_table_begin();
        echo $this->build_form_table_title($form_title);

        echo $this->build_obj_table_label('jid', 'jid');

        echo $this->build_obj_table_text(_WLS_CATEGORYID, 'cid');
        echo $this->build_form_table_line(_WLS_TITLEC, $cat_title_s);

        echo $this->build_obj_table_text(_WLS_LINKID, 'lid');
        echo $this->build_form_table_line(_WLS_SITETITLE, $link_title_s);

        $ele_submit = $this->build_html_input_submit('submit', $button_val);
        echo $this->build_form_table_line('', $ele_submit, 'foot', 'foot');

        $ele_del = $this->build_html_input_submit('del_table', _DELETE);
        $ele_cancel = $this->build_html_input_button_cancel('cancel', _CANCEL);
        echo $this->build_form_table_line('', $ele_del . '  ' . $ele_cancel, 'foot', 'foot');

        echo $this->build_form_table_end();
        echo $this->build_form_end();
        // --- form end ---
    }

    // --- class end ---
}
