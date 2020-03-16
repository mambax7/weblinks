<?php

use XoopsModules\Happylinux;
use XoopsModules\Weblinks;

// $Id: submit.php,v 1.28 2008/02/26 16:01:32 ohwada Exp $

// 2008-02-17 K.OHWADA
// title: lang_submitlink

// 2007-11-01 K.OHWADA
// happylinux_get_memory_usage_mb()

// 2007-10-30 K.OHWADA
// change check_access()

// 2007-09-20 K.OHWADA
// PHP5.2
// getInstance()

// 2007-09-12 K.OHWADA
// general revision
// user_add_link()

// 2007-09-11 K.OHWADA
// BUG 4702: Fatal error: Class 'happy_linux_rss_utility' not found

// 2007-09-01 K.OHWADA
// BUG 4693: not notify "New Link Submitted"
// notification to each category
// build_tags_newlink()
// discovery_by_post()

// 2007-08-01 K.OHWADA
// weblinks_header
// link_manage.php?op=listNewLinks -> modify_list.php?sortid=3

// 2007-07-14 K.OHWADA
// $DEBUG_MAIL

// 2007-06-18 K.OHWADA
// header_oh.php
// add WEBLINKS_URL in redirect_header

// 2007-05-18 K.OHWADA
// get_error_msg_addlink() -> get_errors_addlink()

// 2007-03-25 K.OHWADA
// small change

// 2007-03-01 K.OHWADA
// weblinks_link_handler.php
// update_category_link_count()

// 2006-12-10 K.OHWADA
// use weblinks_modify

// 2006-10-01 K.OHWADA
// use happy_linux
// use rssc WEBLINKS_RSSC_USE

// 2006-07-29 K.OHWADA
// REQ: countup xoops post count

// 2006-05-15 K.OHWADA
// add class weblinks_submit()
// use new handler
// use token ticket
// dont use global

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//================================================================
// WebLinks Module
// 2004/01/23 K.OHWADA
//================================================================

//---------------------------------------------------------
// TODO
// anonymous can choice recieve or not email
//---------------------------------------------------------

include 'header_edit.php';

//=========================================================
// class weblinks_submit
//=========================================================
class weblinks_submit extends Happylinux\Error
{
    public $_DIRNAME;

    public $_config_handler;
    public $_link_form_handler;
    public $_link_check_handler;
    public $_link_edit_handler;
    public $_link_req_handler;

    public $_auth;
    public $_template;
    public $_header;
    public $_rss_utility;
    public $_myts;
    public $_post;

    // config
    public $_conf;
    public $_has_auth_permit = false;
    public $_has_auth_auto = false;
    public $_has_auth_html = false;

    // system
    public $_system_is_module_admin;
    public $_system_is_user;
    public $_system_module_name;
    public $_system_uid;

    // error
    public $_banner_error_code = 0;
    public $_rssc_error_code = 0;
    public $_discovery_error = null;
    public $_flag_error = 0;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct($dirname)
    {
        parent::__construct();
        $this->set_debug_print_error(WEBLINKS_DEBUG_ERROR);

        $this->_DIRNAME = $dirname;

        $this->_config_handler = weblinks_get_handler('Config2Basic', $dirname);
        $this->_link_edit_handler = weblinks_get_handler('LinkEdit', $dirname);
        $this->_link_form_handler = weblinks_get_handler('LinkForm', $dirname);
        $this->_link_check_handler = weblinks_get_handler('LinkFormCheck', $dirname);

        $this->_auth = Weblinks\Auth::getInstance($dirname);
        $this->_template = Weblinks\Template::getInstance($dirname);
        $this->_header = Weblinks\Header::getInstance($dirname);

        $this->_post = Happylinux\Post::getInstance();
        $this->_myts = \MyTextSanitizer::getInstance();

        $this->_conf = &$this->_config_handler->get_conf();

        $system = Happylinux\System::getInstance();
        $this->_system_is_module_admin = $system->is_module_admin();
        $this->_system_is_user = $system->is_user();
        $this->_system_module_name = $system->get_module_name();
        $this->_system_uid = $system->get_uid();
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
    // POST param
    //---------------------------------------------------------
    public function get_post_op()
    {
        $op = '';
        if (isset($_POST['submit'])) {
            $op = 'submit';
        } elseif (isset($_POST['preview'])) {
            $op = 'preview';
        }

        return $op;
    }

    //---------------------------------------------------------
    // check_access
    //---------------------------------------------------------
    public function check_access()
    {
        // admin
        if ($this->_system_is_module_admin) {
            return 'goto_admin';
        }

        list($code, $this->_has_auth_permit, $this->_has_auth_auto) = $this->_auth->get_auth_submit();

        if ('permit' == $code) {
            $this->_link_edit_handler->init();
        }

        return $code;
    }

    public function get_permit_param()
    {
        $ret = [$this->_has_auth_auto, $this->_system_is_user];

        return $ret;
    }

    //---------------------------------------------------------
    // submit_form
    //---------------------------------------------------------
    public function print_submit_form()
    {
        $this->print_submit_header();
        $this->print_submit_comment();

        $this->show_user_form('submit');
    }

    public function show_user_form($form_mode)
    {
        // show notify for user, hidden for guest
        $mode_notify = 0;
        if (!$this->_has_auth_auto) {
            if ($this->_system_is_user) {
                $mode_notify = 2;
            } else {
                $mode_notify = 1;
            }
        }

        $this->_link_form_handler->set_mode_notify($mode_notify);
        $this->_link_form_handler->show_user_form($form_mode);
    }

    //---------------------------------------------------------
    // preview
    //---------------------------------------------------------
    public function print_preview()
    {
        $this->print_submit_header();
        echo "<hr>\n";
        echo '<h4>' . _PREVIEW . "</h4>\n";

        if (WEBLINKS_RSSC_USE) {
            $this->discovery_by_post();
        }

        // check form
        if (!$this->_link_check_handler->check_form_addlink_by_post()) {
            $this->print_submit_error();
        }

        $arr_preview = $this->_link_edit_handler->build_submit_preview();

        // check preview error
        if (!$this->_link_edit_handler->check_preview_result()) {
            echo $this->_link_edit_handler->get_error_msg_preview();
            echo "<br>\n";
        }

        echo $this->_template->fetch_link_single($arr_preview);

        echo "<hr>\n";
        $this->print_submit_comment();

        $this->show_user_form('submit_preview');
    }

    //---------------------------------------------------------
    // submit
    //---------------------------------------------------------
    // execute when use rssc module
    public function discovery_by_post()
    {
        $rss_utility = Happylinux\RssUtility::getInstance();

        $this->_discovery_error = null;

        $url = $this->_post->get_post_url('url');
        $rss_url = $this->_post->get_post_url('rss_url');
        $rss_flag = $this->_post->get_post_int('rss_flag');

        if ($url && (HAPPYLINUX_RSS_MODE_AUTO == $rss_flag) && ('' == $rss_url)) {
            $ret = $rss_utility->discover($url);
            if (!$ret) {
                $msg = _RSSC_DISCOVER_FAILED;
                $this->_discovery_error = $msg;

                return false;
            }

            $_POST['rss_flag'] = $rss_utility->get_xml_mode();
            $_POST['rss_url'] = $rss_utility->get_xmlurl_by_mode();

            return true;
        }

        return true;    // no action
    }

    public function check_form()
    {
        $this->_flag_error = 0;
        if (!$this->_link_edit_handler->check_token()) {
            $this->_flag_error = 1;

            return false;
        }
        if (!$this->_link_check_handler->check_form_addlink_by_post()) {
            $this->_flag_error = 2;

            return false;
        }

        return true;
    }

    public function print_form_with_error()
    {
        $this->print_submit_header();

        if (1 == $this->_flag_error) {
            echo "<br>\n";
            xoops_error('Token Error');
            echo "<br>\n";
        }

        if (2 == $this->_flag_error) {
            $this->print_submit_error();
        }

        $this->print_submit_comment();
        $this->show_user_form('submit_preview');
    }

    public function print_submit_error()
    {
        echo '<div class="weblinks_submit_error">';
        echo $this->_link_check_handler->get_errors_addlink('s');
        echo $this->_link_check_handler->get_formated_error_addlink();
        if ($this->_discovery_error) {
            echo $this->_discovery_error . "<br>\n";
        }
        echo "</div>\n";
        echo "<br>\n";
    }

    public function post_auto_approve()
    {
        $newid = $this->_link_edit_handler->user_add_link();
        if (!$newid) {
            $this->_set_errors($this->_link_edit_handler->getErrors());

            return false;
        }
        $this->_banner_error_code = $this->_link_edit_handler->get_banner_error_code();
        $this->_rssc_error_code = $this->_link_edit_handler->get_rssc_error_code();

        return $newid;
    }

    public function post_admin_approve()
    {
        $newid = $this->_link_edit_handler->user_submit_admin_approve();
        if (!$newid) {
            $this->_set_errors($this->_link_edit_handler->getErrors());

            return false;
        }

        return $newid;
    }

    //---------------------------------------------------------
    // print
    //---------------------------------------------------------
    public function print_submit_header()
    {
        $this->_header->assign_module_header_submit();

        echo $this->_header->get_module_header_submit();
        echo '&nbsp;';
        echo '<a href="' . XOOPS_URL . '/">' . _HAPPYLINUX_HOME . '</a> &gt;&gt; ';
        echo '<a href="' . WEBLINKS_URL . '/">' . $this->_system_module_name . '</a> &gt;&gt; ';
        echo '<span class="weblinks_bold">' . $this->_conf['lang_submitlink'] . '</span><br><br>' . "\n";
    }

    public function print_submit_comment()
    {
        echo '<div style="width: 100%; margin: 5px; padding: 5px;">' . "\n";

        echo $this->_conf['submit_main'];

        if (!$this->_has_auth_auto) {
            echo $this->_conf['submit_pending'];
        }

        // check_double
        if ($this->_conf['check_double']) {
            echo $this->_conf['submit_double'];
        }

        echo "</div><br>\n";
    }

    //---------------------------------------------------------
    // get_add_link_msg
    //---------------------------------------------------------
    public function get_add_link_msg()
    {
        $msg = '';

        if ($this->_banner_error_code) {
            $msg .= _WEBLINKS_WARN_BANNER_NOT_GET_SIZE . "<br>\n";
        }

        switch ($this->_rssc_error_code) {
            case RSSC_CODE_DISCOVER_FAILED:
                $msg .= _RSSC_DISCOVER_FAILED . "<br>\n";
                break;
            case RSSC_CODE_PARSE_FAILED:
                $msg .= _RSSC_PARSE_FAILED . "<br>\n";
                break;
            case RSSC_CODE_PARSE_NOT_READ_XML_URL:
                $msg .= _RSSC_PARSE_NOT_READ_XML_URL . "<br>\n";
                break;
        }

        return $msg;
    }

    //---------------------------------------------------------
    // utility
    //---------------------------------------------------------
    public function build_comment($str)
    {
        $ret = $this->_link_edit_handler->build_comment($str);

        return $ret;
    }

    // --- class end ---
}

//=========================================================
// main
//=========================================================
$weblinks_submit = weblinks_submit::getInstance(WEBLINKS_DIRNAME);
$weblinks_time = @\XoopsModules\Happylinux\Time::getInstance();

// check permit
$check = $weblinks_submit->check_access();

if ('not_permit' == $check) {
    $msg = _NOPERM;
    $msg .= $weblinks_submit->build_comment('not permit');  // for test form
    redirect_header(WEBLINKS_URL . '/index.php', 2, $msg);
    exit();
}

if ('show_login' == $check) {
    $msg = _WLS_MUSTREGFIRST;
    $msg .= $weblinks_submit->build_comment('not user');    // for test form
    redirect_header(XOOPS_URL . '/user.php', 2, $msg);
    exit();
}

if ('goto_admin' == $check) {
    // add WEBLINKS_URL
    $url = WEBLINKS_URL . '/admin/link_manage.php?op=addLink';

    // REQ 3110: Add in this category
    if (isset($_GET['cid'])) {
        $url .= '&amp;cid=' . $_GET['cid'];
    }

    redirect_header($url, 2, _WLS_GOTOADMIN);
    exit();
}

$op = $weblinks_submit->get_post_op();

// start
list($has_auto_approve, $is_user) = $weblinks_submit->get_permit_param();

// save to DB
if ('submit' == $op) {
    // BUG 4702: Fatal error: Class 'happy_linux_rss_utility' not found
    if (WEBLINKS_RSSC_USE) {
        $weblinks_submit->discovery_by_post();
    }

    if (!$weblinks_submit->check_form()) {
        include XOOPS_ROOT_PATH . '/header.php';
        $weblinks_submit->print_form_with_error();
        include XOOPS_ROOT_PATH . '/footer.php';
        exit();
    }

    // auto approve
    if ($has_auto_approve) {
        $newid = $weblinks_submit->post_auto_approve();
        if (!$newid) {
            redirect_header(WEBLINKS_URL . '/index.php', 3, 'DB Error');
            exit();
        }

        $url_singlelink = WEBLINKS_URL . '/singlelink.php?lid=' . $newid;

        // redirect to single link
        $msg = _WLS_RECEIVED . "<br>\n";
        $msg .= _WLS_ISAPPROVED . "<br>\n";
        $msg2 = $weblinks_submit->get_add_link_msg();
        $time = $weblinks_time->get_elapse_time();

        if ($msg2) {
            $msg .= "<br>\n";
            $msg .= "$msg2 <br>\n";
            $msg .= "$time sec";
            redirect_header($url_singlelink, 5, $msg);
        }

        $com = 'submit approve link [' . $newid . ']';
        $msg .= "$time sec <br>\n";
        $msg .= $weblinks_submit->build_comment($com);    // for test form
        redirect_header($url_singlelink, 2, $msg);
    } // approve
    else {
        $modify_newid = $weblinks_submit->post_admin_approve();
        if (!$modify_newid) {
            redirect_header(WEBLINKS_URL . '/index.php', 3, 'DB Error');
            exit();
        }

        $com = 'submit request link [' . $modify_newid . ']';
        $msg = _WLS_RECEIVED;
        $msg .= $weblinks_submit->build_comment($com);    // for test form
        redirect_header(WEBLINKS_URL . '/index.php', 2, $msg);
    }

    exit();
} // preview mode
elseif ('preview' == $op) {
    include XOOPS_ROOT_PATH . '/header.php';
    $weblinks_submit->print_preview();
} // submit form
else {
    include XOOPS_ROOT_PATH . '/header.php';
    $weblinks_submit->print_submit_form();
}

echo "<br><hr>\n";
echo $happy_linux_time->build_elapse_time() . "<br>\n";
if (WEBLINKS_DEBUG_MEMORY) {
    echo happy_linux_build_memory_usage_mb() . "<br>\n";
}
include XOOPS_ROOT_PATH . '/footer.php';
exit(); // --- end of main ---
