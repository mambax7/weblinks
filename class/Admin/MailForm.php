<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: mail_users.php,v 1.16 2007/11/11 03:22:59 ohwada Exp $

// 2007-11-01 K.OHWADA
// weblinks_admin_print_footer()

// 2007-09-20 K.OHWADA
// PHP 5.2: Assigning the return value of new by reference is deprecated

// 2007-09-01 K.OHWADA
// happy_linux_mail_send happy_linux_mail_form

// 2007-07-16 K.OHWADA
// XC 2.1
// mailusers.php
// MailForm

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
// add class MailUsers
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


//=========================================================
// class MailUsers
//=========================================================
class MailForm extends happy_linux_mail_form
{
    public $_link_handler;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct();

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
    // form
    //---------------------------------------------------------
    public function print_form_link()
    {
        $subject_caption = $this->build_mail_caption($this->_LANG_SUBJECT, $this->_LANG_MAILTAGS, _WEBLINKS_MAIL_TAGS1);

        $desc2 = _WEBLINKS_MAIL_TAGS1 . "<br>\n";
        $desc2 .= _WEBLINKS_MAIL_TAGS2 . "<br>\n";
        $desc2 .= _WEBLINKS_MAIL_TAGS3 . "<br>\n";

        $body_caption = $this->build_mail_caption($this->_LANG_BODY, $this->_LANG_MAILTAGS, $desc2);

        list($user_list, $users_label) = $this->get_post_memberslist_link();

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

    public function get_post_memberslist_link()
    {
        if (isset($_POST['memberslist_id']) && is_array($_POST['memberslist_id'])) {
            $user_list = &$_POST['memberslist_id'];
            $link_count = count($user_list);
            $display_names = '';

            for ($i = 0; $i < $link_count; ++$i) {
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
