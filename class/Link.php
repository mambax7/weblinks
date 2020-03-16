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
if (!class_exists('Link')) {
    //=========================================================
    // class Link
    //=========================================================
    class Link extends LinkBase
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct()
        {
            parent::__construct();

            $this->initVar('lid', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('uid', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('cids', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('title', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('url', XOBJ_DTYPE_URL_AREA);
            $this->initVar('banner', XOBJ_DTYPE_URL, null, false, 255);
            $this->initVar('description', XOBJ_DTYPE_TXTAREA);
            $this->initVar('name', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('nameflag', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('mail', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('mailflag', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('company', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('addr', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('tel', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('search', XOBJ_DTYPE_TXTAREA);
            $this->initVar('passwd', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('admincomment', XOBJ_DTYPE_TXTAREA);
            $this->initVar('mark', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('time_create', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('time_update', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('hits', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('rating', XOBJ_DTYPE_FLOAT, 0.0, false);
            $this->initVar('votes', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('comments', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('width', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('height', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('recommend', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('mutual', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('broken', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('rss_url', XOBJ_DTYPE_URL, null, false, 255);
            $this->initVar('rss_flag', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('rss_xml', XOBJ_DTYPE_TXTAREA);
            $this->initVar('rss_update', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('usercomment', XOBJ_DTYPE_TXTAREA);
            $this->initVar('zip', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('state', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('city', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('addr2', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('fax', XOBJ_DTYPE_TXTBOX, null, false, 255);

            // html
            $this->initVar('dohtml', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('dosmiley', XOBJ_DTYPE_INT, 1, false);
            $this->initVar('doxcode', XOBJ_DTYPE_INT, 1, false);
            $this->initVar('doimage', XOBJ_DTYPE_INT, 1, false);
            $this->initVar('dobr', XOBJ_DTYPE_INT, 1, false);

            // rssc
            $this->initVar('rssc_lid', XOBJ_DTYPE_INT, 0);
            $this->initVar('map_use', XOBJ_DTYPE_INT, 1);

            // google map: hacked by wye
            $this->initVar('gm_latitude', XOBJ_DTYPE_FLOAT, 0, false);
            $this->initVar('gm_longitude', XOBJ_DTYPE_FLOAT, 0, false);
            $this->initVar('gm_zoom', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('gm_type', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('gm_icon', XOBJ_DTYPE_INT, 0, false);

            // publish
            $this->initVar('time_publish', XOBJ_DTYPE_INT, 0);
            $this->initVar('time_expire', XOBJ_DTYPE_INT, 0);
            $this->initVar('textarea1', XOBJ_DTYPE_TXTAREA);
            $this->initVar('textarea2', XOBJ_DTYPE_TXTAREA);
            $this->initVar('dohtml1', XOBJ_DTYPE_INT, 0);
            $this->initVar('dosmiley1', XOBJ_DTYPE_INT, 1);
            $this->initVar('doxcode1', XOBJ_DTYPE_INT, 1);
            $this->initVar('doimage1', XOBJ_DTYPE_INT, 1);
            $this->initVar('dobr1', XOBJ_DTYPE_INT, 1);

            // forum
            $this->initVar('forum_id', XOBJ_DTYPE_INT, 0);
            $this->initVar('comment_use', XOBJ_DTYPE_INT, 1);

            $this->initVar('album_id', XOBJ_DTYPE_INT, 0);

            // pagerank
            $this->initVar('pagerank', XOBJ_DTYPE_INT, 0);
            $this->initVar('pagerank_update', XOBJ_DTYPE_INT, 0);

            // aux
            $this->initVar('aux_int_1', XOBJ_DTYPE_INT, 0);
            $this->initVar('aux_int_2', XOBJ_DTYPE_INT, 0);
            $this->initVar('aux_text_1', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('aux_text_2', XOBJ_DTYPE_TXTBOX, null, false, 255);

            // etc1 .. etci
            for ($i = 1; $i <= WEBLINKS_LINK_NUM_ETC; ++$i) {
                $etc_name = 'etc' . $i;
                $this->initVar($etc_name, XOBJ_DTYPE_TXTBOX, null, false, 255);
            }
        }

        //---------------------------------------------------------
        // for admin/mail_users.php
        //---------------------------------------------------------
        // select from name title mail
        public function user_name($format, $flag_title = true, $flag_mail = true)
        {
            $title = $this->get('title');
            $name  = $this->get('name');
            $mail  = $this->get('mail');

            if ($name) {
                $user_name = $name;
            } elseif ($flag_title && $title) {
                $user_name = $title;
            } elseif ($flag_mail && $mail) {
                $user_name = $mail;
            }

            $user_name = $this->sanitize_format_text($user_name, $format);

            return $user_name;
        }

        // select from mail system_mail
        public function user_mail($format, $flag_system = true)
        {
            $uid  = $this->get('uid');
            $mail = $this->get('mail');

            $system_mail = $this->_system->get_email_by_uid($uid);

            $user_mail = '';
            if ($mail) {
                $user_mail = $mail;
            } elseif ($flag_system && $uid && $system_mail) {
                $user_mail = $system_mail;
            }

            $user_mail = $this->sanitize_format_text($user_mail, $format);

            return $user_mail;
        }

        // --- class end ---
    }
}
