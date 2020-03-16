<?php

use XoopsModules\Weblinks\Admin;

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

include 'admin_header.php';
include 'admin_header_mail.php';


//=========================================================
// main
//=========================================================
$mail_users = Admin\MailUsers::getInstance();

$op = $mail_users->get_post_op();

if ('form_user' == $op) {
    xoops_cp_header();
    weblinks_admin_print_header();
    weblinks_admin_print_menu();
    echo '<h4>' . _WEBLINKS_ADMIN_SENDMAIL . "</h4>\n";

    $mail_users->print_form_user();
} elseif ('send_user' == $op) {
    if (!$mail_users->check_token()) {
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
    if (!$mail_users->check_token()) {
        redirect_header('user_list.php', 5, 'Token Error');
        exit();
    }

    xoops_cp_header();
    $mail_users->send_link();
} elseif ('send_email' == $op) {
    if (!$mail_users->check_token()) {
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
