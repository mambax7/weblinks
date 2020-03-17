<?php

// $Id: lostpass.php,v 1.1 2011/12/29 14:32:29 ohwada Exp $

// 2007-09-01 K.OHWADA
// send_passwd()

// 2007-07-20 K.OHWADA
// mail error

// 2007-06-01 K.OHWADA
// header_oh.php

// 2007-03-01 K.OHWADA
// weblinks_link_handler

// 2006-09-20 K.OHWADA
// use happy_linux

// 2006-05-15 K.OHWADA
// add weblinks_lostpass()
// use new handler
// use token ticket

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//================================================================
// WebLinks Module
// lostpass
// porting from system
// 2004/01/23 K.OHWADA
//================================================================

include 'header_oh.php';

//=========================================================
// class weblinks_lostpass
//=========================================================

/**
 * Class weblinks_lostpass
 */
class weblinks_lostpass extends happy_linux_error
{
    public $_DIRNAME;

    public $_link_handler;
    public $_mail_template;
    public $_system;
    public $_post;
    public $_form;

    // post
    public $_post_lid;
    public $_post_email;

    // link recored
    public $_link_name;

    // local
    public $_passwd;
    public $_name;

    public $_DEBUG_MAIL = false;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------

    /**
     * weblinks_lostpass constructor.
     * @param $dirname
     */
    public function __construct($dirname)
    {
        $this->_DIRNAME = $dirname;

        parent::__construct();
        $this->set_debug_print_error(WEBLINKS_DEBUG_ERROR);

        $this->_link_handler = weblinks_get_handler('link', $dirname);

        $this->_mail_template = happy_linux_mail_template::getInstance($dirname);
        $this->_system = happy_linux_system::getInstance();
        $this->_post = happy_linux_post::getInstance();
        $this->_form = happy_linux_form::getInstance();
    }

    /**
     * @param null $dirname
     * @return \weblinks_lostpass|static
     */
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

    /**
     * @return int
     */
    public function get_post_lid()
    {
        $this->_post_lid = $this->_post->get_post_int('lid');

        return $this->_post_lid;
    }

    /**
     * @return string|string[]|null
     */
    public function get_post_email()
    {
        $this->_post_email = $this->_post->get_post_text('email');

        return $this->_post_email;
    }

    //---------------------------------------------------------
    // update password
    //---------------------------------------------------------

    /**
     * @param $lid
     * @return int
     */
    public function update_password($lid)
    {
        $email = $this->get_post_email();

        $obj = $this->_link_handler->get($lid);
        if (!is_object($obj)) {
            return -1;
        }

        if (!$this->_form->check_token()) {
            return -2;
        }

        $link_mail = $obj->get('mail');
        $this->_link_name = $obj->get('name');

        if ($email != $link_mail) {
            return -3;
        }

        $this->_passwd = xoops_makepass();
        $passwd_md5 = md5($this->_passwd);
        $obj->setVar('passwd', $passwd_md5);

        $ret = $this->_link_handler->update($obj);
        if (!$ret) {
            return -4;
        }

        return 0;    // OK
    }

    //---------------------------------------------------------
    // send mail
    //---------------------------------------------------------

    /**
     * @return bool
     */
    public function send_passwd()
    {
        $SITEURL = $this->_mail_template->get_xoops_siteurl();
        $SITENAME = $this->_mail_template->get_xoops_sitename();
        $ADMINMAIL = $this->_mail_template->get_xoops_adminmail();

        $file_tpl = 'lostpass.tpl';
        $dir_tpl = $this->_mail_template->get_dir_mail_template($file_tpl);

        $WEBLINKS_URL = XOOPS_URL . '/modules/' . $this->_DIRNAME;
        $entry = $WEBLINKS_URL . '/modlink.php?lid=' . $this->_post_lid . '&code=' . $this->_passwd;

        $xoopsMailer = getMailer();
        $xoopsMailer->useMail();
        $xoopsMailer->setTemplateDir($dir_tpl);
        $xoopsMailer->setTemplate($file_tpl);
        $xoopsMailer->assign('SITENAME', $SITENAME);
        $xoopsMailer->assign('ADMINMAIL', $ADMINMAIL);
        $xoopsMailer->assign('SITEURL', $SITEURL);
        $xoopsMailer->assign('IP', xoops_getenv('REMOTE_ADDR'));
        $xoopsMailer->assign('NAME', $this->_get_name());
        $xoopsMailer->assign('ENTRY', $entry);
        $xoopsMailer->setToEmails($this->_post_email);
        $xoopsMailer->setFromEmail($ADMINMAIL);
        $xoopsMailer->setFromName($SITENAME);
        $xoopsMailer->setSubject(sprintf(_US_NEWPWDREQ, $SITENAME));

        $ret = $xoopsMailer->send(true);
        if (!$ret) {
            $this->_set_errors($xoopsMailer->getErrors(false));

            return false;
        }

        return true;
    }

    /**
     * @return string
     */
    public function get_msg_success()
    {
        return sprintf(_US_CONFMAIL, happy_linux_sanitize($this->_name));
    }

    /**
     * @return string
     */
    public function get_msg_mail_error()
    {
        $msg = 'Mail Error: ';
        if ($this->_DEBUG_MAIL) {
            $msg .= $this->getErrors('s');
        }

        return $msg;
    }

    /**
     * @return mixed
     */
    public function _get_name()
    {
        if ($this->_link_name) {
            $name = $this->_link_name;
        } else {
            $name = $this->_system->get_uname();
        }
        $this->_name = $name;

        return $name;
    }

    // --- class end ---
}

//=========================================================
// main
//=========================================================

$weblinks_lostpass = weblinks_lostpass::getInstance(WEBLINKS_DIRNAME);

$xoopsOption['pagetype'] = 'user';

$lid = $weblinks_lostpass->get_post_lid();
$singlelink = 'singlelink.php?lid=' . $lid;

$ret = $weblinks_lostpass->update_password($lid);

if (-1 == $ret) {
    redirect_header('index.php', 3, _WLS_ERRORNOLINK);
    exit();
}

if (-2 == $ret) {
    redirect_header($singlelink, 3, 'Token Error');
    exit();
}

if (-3 == $ret) {
    redirect_header($singlelink, 3, _WLS_EMAILNOTFOUND);
    exit();
}

if (-4 == $ret) {
    redirect_header($singlelink, 3, _US_MAILPWDNG);
    exit();
}

$ret = $weblinks_lostpass->send_passwd();
if (!$ret) {
    redirect_header($singlelink, 5, $weblinks_lostpass->get_msg_mail_error());
    exit();
}

redirect_header($singlelink, 1, $weblinks_lostpass->get_msg_success());
exit();

// --- main end ---
