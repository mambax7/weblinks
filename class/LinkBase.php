<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// $Id: weblinks_link.php,v 1.3 2012/04/10 03:54:50 ohwada Exp $

// 2012-04-02 K.OHWADA
// gm_icon

// 2008-02-17 K.OHWADA
// pagerank, pagerank_update in link, modify
// _set_obj_pagerank();

// change assign_mod_object() clear pagerank update time

// 2007-12-24 K.OHWADA
// BUG : not set search field

// 2007-11-24 K.OHWADA
// _strip_tags()

// 2007-11-01 K.OHWADA
// weblinks_auth
// BUG : not set password
// WEBLINKS_OP_APPROVE_NEW

// 2007-09-10 K.OHWADA
// check_public()

// 2007-09-01 K.OHWADA
// notification to each category
// description_short()

// 2007-08-01 K.OHWADA
// admin can add etc column

// 2007-05-06 K.OHWADA
// BUG 4565: cannot show user manage, when too many links or users
// change user_name() user_mail()

// 2007-04-08 K.OHWADA
// gm_type

// 2007-03-25 K.OHWADA
// album_id

// 2007-03-01 K.OHWADA
// add forum_id comment_use field
// BUG: admin approve wrong password when guest submit
// BUG: cannot use bbcode in admincomment

// 2006-12-10 K.OHWADA
// add link_save class
// use happy_linux_object_validater
// add time_publish textarea1

// 2006-10-12 K.OHWADA
// BUG 4318: cannot register bulk links.
// add set_not_gpc()

// 2006-10-01 K.OHWADA
// divided from weblinks_link_handler
// google map
// change addr_urlencode()

//=========================================================
// WebLinks Module
// this file contain 4 class
//   LinkBase
//   weblinks_link
//   LinkSave
//   LinkValidate
// 2006-09-20 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('LinkBase')) {
    //=========================================================
    // class LinkBase
    //=========================================================
    class LinkBase extends Happylinux\ObjectValidater
    {
        // result
        public $_cid_array = null;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct()
        {
            parent::__construct();
        }

        //---------------------------------------------------------
        // show
        //---------------------------------------------------------
        public function name_disp($format = 's')
        {
            $name = $this->getVar('name', $format);
            $flag = $this->getVar('nameflag');
            $text = $this->name_mail_disp_common($name, $flag);

            return $text;
        }

        public function mail_disp($format = 's')
        {
            $mail = $this->getVar('mail', $format);
            $flag = $this->getVar('mailflag');
            $text = $this->name_mail_disp_common($mail, $flag);

            return $text;
        }

        public function name_mail_disp_common($value, $flag)
        {
            $text = null;
            if ($flag) {
                $text = $value;
            }

            return $text;
        }

        public function description_disp($flag_dohtml = true)
        {
            $myts = \MyTextSanitizer::getInstance();

            $context = $this->get('description');
            $dosmiley = $this->get('dosmiley');
            $doxcode = $this->get('doxcode');
            $doimage = $this->get('doimage');
            $dobr = $this->get('dobr');

            $dohtml = 1;
            if ($flag_dohtml) {
                $dohtml = $this->get('dohtml');
            }

            $text = $myts->displayTarea($context, $dohtml, $dosmiley, $doxcode, $doimage, $dobr);

            return $text;
        }

        public function textarea1_disp($flag_dohtml = true)
        {
            $myts = \MyTextSanitizer::getInstance();

            $context = $this->get('textarea1');
            $dosmiley = $this->get('dosmiley1');
            $doxcode = $this->get('doxcode1');
            $doimage = $this->get('doimage1');
            $dobr = $this->get('dobr1');

            $dohtml = 1;
            if ($flag_dohtml) {
                $dohtml = $this->get('dohtml1');
            }

            $text = $myts->displayTarea($context, $dohtml, $dosmiley, $doxcode, $doimage, $dobr);

            return $text;
        }

        public function textarea2_disp($flag_dohtml = true)
        {
            $myts = \MyTextSanitizer::getInstance();

            $context = $this->get('textarea2');
            $dosmiley = 1;
            $doxcode = 1;
            $doimage = 1;
            $dobr = 1;

            $dohtml = 1;
            if ($flag_dohtml) {
                $dohtml = 0;
            }

            $text = $myts->displayTarea($context, $dohtml, $dosmiley, $doxcode, $doimage, $dobr);

            return $text;
        }

        // BUG: cannot use bbcode in admincomment
        public function admincomment_disp()
        {
            $myts = \MyTextSanitizer::getInstance();

            $context = $this->get('admincomment');
            $dohtml = 0;
            $dosmiley = 1;
            $doxcode = 1;
            $doimage = 1;
            $dobr = 1;

            $text = $myts->displayTarea($context, $dohtml, $dosmiley, $doxcode, $doimage, $dobr);

            return $text;
        }

        //---------------------------------------------------------
        // short for save
        //---------------------------------------------------------
        public function description_short($max)
        {
            $text = happy_linux_mb_shorten($this->get('description'), $max);

            return $text;
        }

        public function usercomment_short($max)
        {
            $text = happy_linux_mb_shorten($this->get('usercomment'), $max);

            return $text;
        }

        //---------------------------------------------------------
        // check
        //---------------------------------------------------------
        public function check_public($broken)
        {
            if ($this->is_warn_broken($broken)
                || $this->is_warn_time_publish()
                || $this->is_warn_time_expire()) {
                return false;
            }

            return true;
        }

        public function is_warn_broken($broken)
        {
            if ((0 == $this->get('broken')) || ($this->get('broken') < $broken)) {
                return false;
            }

            return true;
        }

        public function is_warn_time_publish()
        {
            if ((0 == $this->get('time_publish')) || ($this->get('time_publish') < time())) {
                return false;
            }

            return true;
        }

        public function is_warn_time_expire()
        {
            if ((0 == $this->get('time_expire')) || ($this->get('time_expire') > time())) {
                return false;
            }

            return true;
        }

        //---------------------------------------------------------
        // cid array field
        //---------------------------------------------------------
        public function &get_cid_array()
        {
            return $this->_cid_array;
        }

        public function &get_cid_array_form_post($post)
        {
            $this->_cid_array = &$this->_post->get_int_unique_array_without_from_post($post, 'cid', 0);

            return $this->_cid_array;
        }

        // --- class end ---
    }
}
