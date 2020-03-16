<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// $Id: BrokenHandler.php,v 1.6 2007/02/27 14:46:00 ohwada Exp $

// 2007-02-20 K.OHWADA
// hack for multi site

// 2006-09-20 K.OHWADA
// use happy_linux

// 2006-05-15 K.OHWADA
// new handler
// not use weblinks_module_base

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//=========================================================
// WebLinks Module
// this file contain 2 class
//   Broken
//   BrokenHandler
// 2004/01/14 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('Broken')) {
    //=========================================================
    // class Broken
    //=========================================================
    class Broken extends Happylinux\BaseObject
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct()
        {
            parent::__construct();

            $this->initVar('bid', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('lid', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('sender', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('ip', XOBJ_DTYPE_TXTBOX, null, false, 20);
        }

        //---------------------------------------------------------
        // function
        //---------------------------------------------------------
        public function get_uname($usereal = 0)
        {
            $uid = $this->get('sender');
            $user_handler = xoops_getHandler('user');
            $user_obj = $user_handler->get($uid);
            $uname = '';

            if (is_object($user_obj)) {
                $uname = $user_obj::getUnameFromId($uid, $usereal);
            }

            return $uname;
        }

        public function get_email($format = 's')
        {
            $uid = $this->get('sender');
            $user_handler = xoops_getHandler('user');
            $user_obj = $user_handler->get($uid);
            $email = '';

            if (is_object($user_obj)) {
                $email = $user_obj->getVar('email', $format);
            }

            return $email;
        }

        // --- class end ---
    }

    // === class end ===
}
