<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: votedata_manage.php,v 1.3 2007/11/11 03:22:59 ohwada Exp $

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
// class VotedataForm
//=========================================================
class VotedataForm extends Happylinux\Form
{
    public $_link_handler;
    public $_system;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct();

        $this->_link_handler = weblinks_get_handler('Link', WEBLINKS_DIRNAME);
        $this->_system = Happylinux\System::getInstance();
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
        $form_title = 'modify votedata';
        $op = 'mod_table';
        $button_val = _HAPPYLINUX_MODIFY;

        $this->set_obj($obj);

        $title_s = '';

        $lid = $obj->get('lid');
        $link_obj = &$this->_link_handler->get($lid);
        if (is_object($link_obj)) {
            $title_s = $link_obj->getVar('title', 's');
        }

        // form start
        echo $this->build_form_begin();
        echo $this->build_token();
        echo $this->build_html_input_hidden('op', $op);
        echo $this->build_html_input_hidden('ratingid', $obj->get('ratingid'));

        echo $this->build_form_table_begin();
        echo $this->build_form_table_title($form_title);

        echo $this->build_obj_table_label('ratingid', 'ratingid');

        echo $this->build_obj_table_text(_WLS_LINKID, 'lid');
        echo $this->build_form_table_line(_WLS_SITETITLE, $title_s);

        echo $this->build_obj_table_text(_WLS_USER, 'ratinguser');
        echo $this->build_form_table_line('', $obj->get_uname());

        echo $this->build_obj_table_text(_WLS_IP, 'ratinghostname');
        echo $this->build_obj_table_text(_WLS_RATING, 'rating');
        echo $this->build_obj_table_text(_WLS_DATE, 'ratingtimestamp');
        echo $this->build_form_table_line('', $obj->get_formatted_timestamp());

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

//=========================================================
// main
//=========================================================
// hack for multi site
weblinks_admin_multi_redirect_jp_site();

$manage = VotedataManage::getInstance();

$op = $manage->_main_get_op();

switch ($op) {
    case 'mod_form':
        $manage->mod_form();
        break;
    case 'mod_table':
        $manage->mod_table();
        break;
    case 'del_table':
        $manage->del_table();
        break;
    case 'del_all':
        $manage->del_all();
        break;
    default:
        xoops_cp_header();
        echo '<h4>No Action</h4>';
        break;
}

xoops_cp_footer();
exit(); // --- end of main ---
