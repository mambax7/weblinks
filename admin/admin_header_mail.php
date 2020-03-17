<?php

// $Id: admin_header_mail.php,v 1.1 2011/12/29 14:32:51 ohwada Exp $

// 2007-11-01 K.OHWADA
// global $xoopsConfig;

// 2007-09-20 K.OHWADA
// remove admin_header.php

//=========================================================
// WebLinks Module
// 2007-09-01 K.OHWADA
//=========================================================

include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
include_once XOOPS_ROOT_PATH . '/modules/happy_linux/class/mail_form.php';
include_once XOOPS_ROOT_PATH . '/modules/happy_linux/class/mail_send.php';
include_once XOOPS_ROOT_PATH . '/modules/happy_linux/class/mail_template.php';

//---------------------------------------------------------
// language
//---------------------------------------------------------
global $xoopsConfig;
$XOOPS_LANGUAGE = $xoopsConfig['language'];

// XC 2.1 dont have system module
if (file_exists(XOOPS_ROOT_PATH . '/modules/system/language/' . $XOOPS_LANGUAGE . '/admin.php')) {
    include_once XOOPS_ROOT_PATH . '/modules/system/language/' . $XOOPS_LANGUAGE . '/admin.php';
} elseif (file_exists(XOOPS_ROOT_PATH . '/modules/system/language/english/admin.php')) {
    include_once XOOPS_ROOT_PATH . '/modules/system/language/english/admin.php';
} else {
    define('_MD_AM_DBUPDATED', _WLS_DBUPDATED);
}

if (file_exists(XOOPS_ROOT_PATH . '/modules/system/language/' . $XOOPS_LANGUAGE . '/admin/mailusers.php')) {
    include_once XOOPS_ROOT_PATH . '/modules/system/language/' . $XOOPS_LANGUAGE . '/admin/mailusers.php';
} elseif (file_exists(WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/mailusers.php')) {
    include_once WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/mailusers.php';
} else {
    include_once WEBLINKS_ROOT_PATH . '/language/english/mailusers.php';
}
