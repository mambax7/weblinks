<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: broken_manage.php,v 1.7 2007/11/11 09:23:10 ohwada Exp $

// 2007-11-01 K.OHWADA
// link_vote_del_handler
// set_flag_execute_time()

// 2007-09-20 K.OHWADA
// Fatal error: Class 'weblinks_link_edit_base_handler' not found
// admin_header_link.php

// 2007-02-20 K.OHWADA
// hack for multi site

// 2006-09-20 K.OHWADA
// use happy_linux
// use XoopsGTicket

// 2006-05-15 K.OHWADA
// new handler
// add class BrokenManage
// use token ticket

// 2006-03-22 K.OHWADA
// new handler: broken

// 2005-10-14 K.OHWADA
// BUG 3095: the number of links does not change, if delete link
// use del_link_vote_comm_catlink_by_lid($lid)

// 2005-09-04 K.OHWADA
// BUG 2932: dont work correctly when register_long_arrays = off

//================================================================
// WebLinks Module
// 2006-09-01 K.OHWADA
//================================================================


//=========================================================
// class BrokenForm
//=========================================================
class BrokenForm extends Happylinux\Form
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
        $form_title = 'modify broken';
        $op = 'mod_table';
        $button_val = _HAPPYLINUX_MODIFY;

        $this->set_obj($obj);

        $lid = $obj->get('lid');

        $flag_link_exist = false;
        $title_s = '';
        $url_s = '';
        $uid = '';

        $link_obj = &$this->_link_handler->get($lid);
        if (is_object($link_obj)) {
            $flag_link_exist = true;
            $title_s = $link_obj->getVar('title', 's');
            $url_s = $link_obj->getVar('url', 's');
            $uid = $link_obj->get('uid');
        }

        $user_param = $this->_system->get_user_by_uid($uid);
        $owner = $user_param['uname'];
        $owneremail = $user_param['email'];

        // form start
        echo $this->build_form_begin();
        echo $this->build_token();
        echo $this->build_html_input_hidden('op', $op);
        echo $this->build_html_input_hidden('bid', $obj->get('bid'));

        echo $this->build_form_table_begin();
        echo $this->build_form_table_title($form_title);

        echo $this->build_obj_table_label('bid', 'bid');

        echo $this->build_obj_table_text(_WLS_LINKID, 'lid');
        echo $this->build_form_table_line(_WLS_SITETITLE, $title_s);
        echo $this->build_form_table_line(_WLS_LINKSUBMITTER, $owner);

        echo $this->build_obj_table_text(_WLS_REPORTER, 'sender');
        echo $this->build_form_table_line('', $obj->get_uname());

        echo $this->build_obj_table_text(_WLS_IP, 'ip');

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
