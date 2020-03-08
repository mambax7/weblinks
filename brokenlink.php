<?php
// $Id: brokenlink.php,v 1.14 2007/11/02 11:36:27 ohwada Exp $

// 2007-10-30 K.OHWADA
// get_token_pair()

// 2007-09-20 K.OHWADA
// PHP5.2
// getInstance()

// 2007-08-01 K.OHWADA
// weblinks_header
// index.php?op=listBrokenLinks -> broken_list.php

// 2007-06-01 K.OHWADA
// header_oh.php

// 2007-03-01 K.OHWADA
// weblinks_link_handler

// 2006-10-01 K.OHWADA
// use happy_linux

// 2006-05-15 K.OHWADA
// add weblinks_brokenlink()
// use new handler
// use token ticket

// 2003-03-25 K.OHWADA
// BUG 3799: cannot display brokenlink

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//================================================================
// WebLinks Module
// submit broken link
// 2004/01/14 K.OHWADA
//================================================================

include 'header_oh.php';
include_once WEBLINKS_ROOT_PATH . '/class/weblinks_broken_handler.php';

//=========================================================
// class weblinks_brokenlink
//=========================================================
class weblinks_brokenlink extends happy_linux_error
{
    public $_link_handler;
    public $_broken_handler;
    public $_system;
    public $_post;
    public $_form;

    public $_system_uid;
    public $_remote_addr;
    public $_title_s;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct($dirname)
    {
        parent::__construct();
        $this->set_debug_print_error(WEBLINKS_DEBUG_ERROR);

        $config_handler        = weblinks_getHandler('config2_basic', $dirname);
        $this->_link_handler   = weblinks_getHandler('link', $dirname);
        $this->_broken_handler = weblinks_getHandler('broken', $dirname);
        $this->_system         = happy_linux_system::getInstance();
        $this->_post           = happy_linux_post::getInstance();
        $this->_form           = happy_linux_form::getInstance();

        $this->_system_uid  = $this->_system->get_uid();
        $this->_remote_addr = getenv('REMOTE_ADDR');

        $conf                       = $config_handler->get_conf();
        $this->_conf_use_brokenlink = $conf['use_brokenlink'];
    }

    public static function getInstance($dirname = null)
    {
        static $instance;
        if (null === $instance) {
            $instance = new static($dirname);
        }

        return $instance;
    }

    //---------------------------------------------------------
    // get POST
    //---------------------------------------------------------
    public function get_post_submit()
    {
        $ret = $this->_post->get_post_text('submit');

        return $ret;
    }

    public function get_post_get_lid()
    {
        $ret = $this->_post->get_post_get_int('lid');

        return $ret;
    }

    //---------------------------------------------------------
    // check_access
    //---------------------------------------------------------
    public function check_access($lid)
    {
        // not use
        if (!$this->_conf_use_brokenlink) {
            return -1;
        }

        if (!$this->_link_handler->is_exist($lid)) {
            return -2;
        }

        $this->_title_s = $this->_link_handler->get_title($lid, 's');

        return 0;
    }

    public function get_title()
    {
        return $this->_title_s;
    }

    //---------------------------------------------------------
    // check_broken_link
    //---------------------------------------------------------
    public function check_broken_link($lid)
    {
        if (0 != $this->_system_uid) {
            // Check if REG user is trying to report twice.
            $count = $this->_broken_handler->get_count_by_lid_uid($lid, $this->_system_uid);
            if ($count > 0) {
                return -11;
            }
        } else {
            // Check if the sender is trying to vote more than once.
            $count = $this->_broken_handler->get_count_by_lid_ip($lid, $this->_remote_addr);
            if ($count > 0) {
                return -12;
            }
        }

        return 0;   // OK
    }

    //---------------------------------------------------------
    // broken_link
    //---------------------------------------------------------
    public function broken_link()
    {
        $broken_obj = &$this->_broken_handler->create();
        $broken_obj->setVars($_POST);
        $broken_obj->setVar('sender', $this->_system_uid);
        $broken_obj->setVar('ip', $this->_remote_addr);
        $ret = $this->_broken_handler->insert($broken_obj);
        if (!$ret) {
            $this->_set_errors($this->_broken_handler->getErrors());

            return false;
        }

        return true;
    }

    //---------------------------------------------------------
    // token
    //---------------------------------------------------------
    public function check_token()
    {
        return $this->_form->check_token();
    }

    public function &get_token_pair()
    {
        return $this->_form->get_token_pair();
    }

    // --- class end ---
}

//=========================================================
// main
//=========================================================

$weblinks_template   = weblinks_template::getInstance(WEBLINKS_DIRNAME);
$weblinks_header     = weblinks_header::getInstance(WEBLINKS_DIRNAME);
$weblinks_brokenlink = weblinks_brokenlink::getInstance(WEBLINKS_DIRNAME);

// BUG 2932: dont work correctly when register_long_arrays = off
$submit = $weblinks_brokenlink->get_post_submit();
$lid    = $weblinks_brokenlink->get_post_get_lid();

$url_singlelink = 'singlelink.php?lid=' . $lid;

$check = $weblinks_brokenlink->check_access($lid);

if (-1 == $check) {
    redirect_header($url_singlelink, 3, _NOPERM);
    exit();
}

if (-2 == $check) {
    redirect_header('index.php', 3, _WLS_ERRORNOLINK);
    exit();
}

if ($submit) {
    if (!$weblinks_brokenlink->check_token()) {
        redirect_header($url_singlelink, 3, 'Token Error');
        exit();
    }

    $check = $weblinks_brokenlink->check_broken_link($lid);

    if (-11 == $check) {
        redirect_header($url_singlelink, 3, _WLS_ALREADYREPORTED);
        exit();
    }

    if (-12 == $check) {
        redirect_header($url_singlelink, 3, _WLS_ALREADYREPORTED);
        exit();
    }

    $ret = $weblinks_brokenlink->broken_link();
    if (!$ret) {
        redirect_header($url_singlelink, 5, 'DB Error');
        exit();
    }

    $tags                      = [];
    $tags['BROKENREPORTS_URL'] = WEBLINKS_URL . '/admin/broken_list.php';
    $notification_handler      = xoops_getHandler('notification');
    $notification_handler->triggerEvent('global', 0, 'link_broken', $tags);

    redirect_header($url_singlelink, 1, _WLS_THANKSFORINFO);
} else {
    // --- template start ---
    // xoopsOption[template_main] should be defined before including header.php
    $xoopsOption['template_main'] = WEBLINKS_DIRNAME . '_brokenlink.html';
    include XOOPS_ROOT_PATH . '/header.php';

    $title_s = $weblinks_brokenlink->get_title();
    list($token_name, $token_value) = $weblinks_brokenlink->get_token_pair();

    $weblinks_header->assign_module_header();

    // BUG 3799: cannot display brokenlink
    $weblinks_template->assignIndex();

    $xoopsTpl->assign('lang_reportbroken', _WLS_REPORTBROKEN);
    $xoopsTpl->assign('lang_thanksforhelp', _WLS_THANKSFORHELP);
    $xoopsTpl->assign('lang_forsecurity', _WLS_FORSECURITY);
    $xoopsTpl->assign('lang_cancel', _WLS_CANCEL);

    $xoopsTpl->assign('link_id', $lid);
    $xoopsTpl->assign('link_title', $title_s);
    $xoopsTpl->assign('token_name', $token_name);
    $xoopsTpl->assign('token_value', $token_value);

    include_once XOOPS_ROOT_PATH . '/footer.php';
}

exit(); // === main end ===
