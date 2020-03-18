<?php

// $Id: mail_users.php,v 1.1 2011/12/29 14:32:56 ohwada Exp $

// 2007-11-01 K.OHWADA
// weblinks_admin_print_footer()

// 2007-09-20 K.OHWADA
// PHP 5.2: Assigning the return value of new by reference is deprecated

// 2007-09-01 K.OHWADA
// happy_linux_mail_send happy_linux_mail_form

// 2007-07-16 K.OHWADA
// XC 2.1
// mailusers.php
// admin_mail_form

// 2007-05-18 K.OHWADA
// XC 2.1: remove $AUTHOR

// 2006-05-06 K.OHWADA
// BUG 4565: cannot show user manage, when too many links or users
// change print_form()

// 2006-12-10 K.OHWADA
// use user_name() user_mail()

// 2006-09-20 K.OHWADA
// use happy_linux
// use XoopsGTicket

// 2006-05-15 K.OHWADA
// new handler
// add class admin_mail_users
// use token ticket

// 2006-03-15 K.OHWADA
// use weblinks_pagenavi_basic::getInstance()

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//=========================================================
// WebLinks Module
// mailusers
// porting from xoops mailusers.php
// 2005-01-20 K.OHWADA
//=========================================================

include 'admin_header.php';
include 'admin_header_mail.php';

xoops_loadLanguage('mailusers', WEBLINKS_DIRNAME);

//=========================================================
// class admin_mail_users
//=========================================================

/**
 * Class admin_mail_users
 */
class admin_mail_users
{
    public $_MAX_USER = 50;

    public $_link_handler;
    public $_form;
    public $_mail_send;
    public $_post;
    public $_system;

    public $_start = 0;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        $this->_link_handler = weblinks_get_handler('link', WEBLINKS_DIRNAME);

        $this->_form = admin_mail_form::getInstance();
        $this->_form->set_max_user($this->_MAX_USER);

        $this->_mail_send = happy_linux_mail_send::getInstance();
        $this->_post = happy_linux_post::getInstance();
        $this->_system = happy_linux_system::getInstance();
    }

    /**
     * @return static
     */
    public static function getInstance()
    {
        static $instance;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

    //---------------------------------------------------------
    // post parameter
    //---------------------------------------------------------

    /**
     * @return string|string[]|null
     */
    public function get_post_op()
    {
        return $this->_post->get_post_text('op');
    }

    /**
     * @return int
     */
    public function _get_post_start()
    {
        $this->_start = $this->_post->get_post_int('start');

        return $this->_start;
    }

    /**
     * @param $total
     * @return int
     */
    public function _calc_end($total)
    {
        $end = $total;
        if ($total > ($this->_start + $this->_MAX_USER)) {
            $end = $this->_start + $this->_MAX_USER;
        }

        return $end;
    }

    //---------------------------------------------------------
    // send user
    //---------------------------------------------------------
    public function send_user()
    {
        $this->print_bread();
        echo '<h4>' . _WEBLINKS_ADMIN_SENDMAIL . "</h4>\n";

        if (!isset($_POST['user_list']) || !is_array($_POST['user_list'])) {
            $this->_print_error_no_email();

            return;
        }

        $user_list = $_POST['user_list'];

        $added = [];
        $added_id = [];

        foreach ($user_list as $uid) {
            if (!in_array($uid, $added_id)) {
                // Assigning the return value of new by reference is deprecated
                $added[] = new XoopsUser($uid);

                $added_id[] = $uid;
            }
        }

        $total = count($added);
        $start = $this->_get_post_start();
        $end = $this->_calc_end($total);

        $param = [
            'from_name' => $this->_post->get_post_text('from_name'),
            'from_email' => $this->_post->get_post_text('from_email'),
            'subject' => $this->_post->get_post_text('subject'),
            'body' => $this->_post->get_post_text('body'),
        ];

        printf(_WEBLINKS_THERE_ARE_EMAIL, $total);
        echo "<br>\n";

        if ($total > 0) {
            printf(_WEBLINKS_SEND_NUM, $start + 1, $end);
            echo "<br><br>\n";

            $users = [];
            for ($i = $start; $i < $end; $i++) {
                $users[] = $added[$i];
            }

            $param['users'] = $users;
            $param['debug'] = true;
            $this->_mail_send->send($param);

            echo $this->_mail_send->getLogs(1);
            echo $this->_mail_send->getErrors(1);

            if ($total > $end) {
                $this->_form->print_form_next($end);
            } else {
                echo '<h4>' . _AM_SENDCOMP . '</h4>';
            }
        } else {
            echo '<h4>' . _AM_NOUSERMATCH . '</h4>';
        }
    }

    public function _print_error_no_email()
    {
        echo '<h4 style="color: #ff0000">' . _HAPPY_LINUX_MAIL_NO_TO_EMAIL . '</h4>' . "\n";
    }

    //---------------------------------------------------------
    // send link users
    //---------------------------------------------------------
    public function send_link()
    {
        $this->print_bread();
        echo '<h4>' . _WEBLINKS_ADMIN_SENDMAIL . "</h4>\n";

        if (!isset($_POST['user_list']) || !is_array($_POST['user_list'])) {
            $this->_print_error_no_email();

            return;
        }

        $user_list = $_POST['user_list'];

        $total = 0;
        if (is_array($user_list)) {
            $total = count($user_list);
        }

        $start = $this->_get_post_start();
        $end = $this->_calc_end($total);

        $param = [
            'from_name' => $this->_post->get_post_text('from_name'),
            'from_email' => $this->_post->get_post_text('from_email'),
            'subject' => $this->_post->get_post_text('subject'),
            'body' => $this->_post->get_post_text('body'),
            'debug' => true,
        ];

        printf(_WEBLINKS_THERE_ARE_EMAIL, $total);
        echo "<br>\n";

        if ($total > 0) {
            printf(_WEBLINKS_SEND_NUM, $start + 1, $end);
            echo "<br><br>\n";

            // send each user
            for ($i = $start; $i < $end; $i++) {
                $lid = (int)$user_list[$i];
                $obj = $this->_link_handler->get($lid);

                $user_name = $obj->user_name('n');
                $user_mail = $obj->user_mail('n');

                $tags = [
                    'W_LID' => $lid,
                    'W_NAME' => $user_name,
                    'W_EMAIL' => $user_mail,
                ];

                $param['to_emails'] = $user_mail;
                $param['tags'] = $tags;

                $this->_mail_send->send($param);

                echo $this->_mail_send->getLogs(1);
                echo $this->_mail_send->getErrors(1);
            }

            if ($total > $end) {
                $this->_form->print_form_next($end);
            } else {
                echo '<h4>' . _AM_SENDCOMP . '</h4>';
            }
        } else {
            echo '<h4>' . _AM_NOUSERMATCH . '</h4>';
        }
    }

    //---------------------------------------------------------
    // send_email
    //---------------------------------------------------------
    public function send_email()
    {
        $this->print_bread();
        echo '<h4>' . _WEBLINKS_ADMIN_SENDMAIL . "</h4>\n";

        $to_email = $this->_post->get_post_text('to_email');
        if (empty($to_email)) {
            $this->_print_error_no_email();
            $this->print_form_email();

            return;
        }

        $ret = $this->_mail_send->send_email_by_post(true);
        if ($ret) {
            echo '<h4>' . _AM_SENDCOMP . "</h4>\n";
            echo $this->_mail_send->getLogs(1);
        } else {
            echo '<h4 style="color: #ff0000">' . 'Mail Failed' . '</h4>' . "\n";
            echo $this->_mail_send->getErrors(1);
        }
    }

    //---------------------------------------------------------
    // form
    //---------------------------------------------------------
    public function print_form_user()
    {
        if (!isset($_POST['memberslist_id']) || !is_array($_POST['memberslist_id'])) {
            $this->_print_error_no_email();

            return;
        }

        $this->_form->print_form_user();
    }

    public function print_form_link()
    {
        if (!isset($_POST['memberslist_id']) || !is_array($_POST['memberslist_id'])) {
            $this->_print_error_no_email();

            return;
        }

        $this->_form->print_form_link();
    }

    public function print_form_email()
    {
        $this->_form->print_form_email();
    }

    public function print_bread()
    {
        $arr = [
            [
                'name' => $this->_system->get_module_name(),
                'url' => 'index.php',
            ],
            [
                'name' => _WEBLINKS_ADMIN_SENDMAIL,
                'url' => 'mail_users.php',
            ],
        ];
        echo $this->_form->build_html_bread_crumb($arr);
    }

    /**
     * @return mixed
     */
    public function check_token()
    {
        $ret = $this->_form->check_token();

        return $ret;
    }

    // --- class end ---
}

//=========================================================
// class admin_mail_users
//=========================================================

/**
 * Class admin_mail_form
 */
class admin_mail_form extends happy_linux_mail_form
{
    public $_link_handler;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct();

        $this->_link_handler = weblinks_get_handler('link', WEBLINKS_DIRNAME);
    }

    /**
     * @return \admin_mail_form|\happy_linux_form|\happy_linux_html|\happy_linux_mail_form|static
     */
    public static function getInstance()
    {
        static $instance;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

    //---------------------------------------------------------
    // form
    //---------------------------------------------------------
    public function print_form_link()
    {
        $subject_caption = $this->build_mail_caption($this->_LANG_SUBJECT, $this->_LANG_MAILTAGS, _WEBLINKS_MAIL_TAGS1);

        $desc2 = _WEBLINKS_MAIL_TAGS1 . "<br>\n";
        $desc2 .= _WEBLINKS_MAIL_TAGS2 . "<br>\n";
        $desc2 .= _WEBLINKS_MAIL_TAGS3 . "<br>\n";

        $body_caption = $this->build_mail_caption($this->_LANG_BODY, $this->_LANG_MAILTAGS, $desc2);

        [$user_list, $users_label] = $this->get_post_memberslist_link();

        $param = [
            'op' => 'send_link',
            'user_list' => $user_list,
            'users_label' => $users_label,
            'subject_caption' => $subject_caption,
            'body_caption' => $body_caption,
            'body' => $this->get_body('{W_NAME}'),
        ];

        $this->print_form($param);
    }

    /**
     * @return array
     */
    public function get_post_memberslist_link()
    {
        if (isset($_POST['memberslist_id']) && is_array($_POST['memberslist_id'])) {
            $user_list = &$_POST['memberslist_id'];
            $link_count = count($user_list);
            $display_names = '';

            for ($i = 0; $i < $link_count; $i++) {
                $lid = (int)$user_list[$i];

                $obj = &$this->_link_handler->get($lid);
                $user_name_s = $obj->user_name('s');
                $user_mail_s = $obj->user_mail('s');

                if ($user_name_s && $user_mail_s) {
                    $name_d = "<a href='mailto:" . $user_mail_s . "'>" . $user_name_s . '</a>';
                }

                if (empty($name_d)) {
                    $name_d = '<span style="color:#ff0000;">---</span>';
                }

                $display_names .= $name_d . ', ';
            }

            $users_label = mb_substr($display_names, 0, -2);
        }

        return [$user_list, $users_label];
    }

    // --- class end ---
}

//=========================================================
// main
//=========================================================
$mail_users = admin_mail_users::getInstance();

$op = $mail_users->get_post_op();

if ('form_user' == $op) {
    xoops_cp_header();
    weblinks_admin_print_header();
    weblinks_admin_print_menu();
    echo '<h4>' . _WEBLINKS_ADMIN_SENDMAIL . "</h4>\n";

    $mail_users->print_form_user();
} elseif ('send_user' == $op) {
    if (!($mail_users->check_token())) {
        redirect_header('mail_users.php', 5, 'Token Error');
        exit();
    }

    xoops_cp_header();
    $mail_users->send_user();
} elseif ('form_link' == $op) {
    xoops_cp_header();
    weblinks_admin_print_header();
    weblinks_admin_print_menu();
    echo '<h4>' . _WEBLINKS_ADMIN_SENDMAIL . "</h4>\n";

    $mail_users->print_form_link();
} elseif ('send_link' == $op) {
    if (!($mail_users->check_token())) {
        redirect_header('user_list.php', 5, 'Token Error');
        exit();
    }

    xoops_cp_header();
    $mail_users->send_link();
} elseif ('send_email' == $op) {
    if (!($mail_users->check_token())) {
        xoops_cp_header();
        weblinks_admin_print_header();
        echo '<h4>' . _WEBLINKS_ADMIN_SENDMAIL . "</h4>\n";
        xoops_error('Token Error');
        $mail_users->print_form_email();
    } else {
        xoops_cp_header();
        $mail_users->send_email();
    }
} else {
    xoops_cp_header();
    weblinks_admin_print_header();
    weblinks_admin_print_menu();
    echo '<h4>' . _WEBLINKS_ADMIN_SENDMAIL . "</h4>\n";
    $mail_users->print_form_email();
}

weblinks_admin_print_footer();
echo "<br>\n";
echo "<a href='index.php'>" . _WEBLINKS_ADMIN_GOTO_ADMIN_INDEX . "</a></br />\n";

xoops_cp_footer();
exit();
