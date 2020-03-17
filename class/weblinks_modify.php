<?php

// $Id: weblinks_modify.php,v 1.3 2012/04/10 03:54:50 ohwada Exp $

// 2012-04-02 K.OHWADA
// gm_icon

// 2008-02-17 K.OHWADA
// pagerank, pagerank_update in link, modify

// 2007-09-10 K.OHWADA
// user can delete link
// assign_add_object()

// 2007-09-01 K.OHWADA
// BUG 4690: not set rss_url in modify table
// notification to each category
// $_cid_array;

// 2007-08-01 K.OHWADA
// admin can add etc column

// 2007-04-08 K.OHWADA
// gm_type

// 2007-03-25 K.OHWADA
// album_id

// 2007-02-20 K.OHWADA
// add forum_id comment_use field

// 2006-12-10 K.OHWADA
// move from modify_handler
// add modify_save class
// add time_publish textarea1

//=========================================================
// WebLinks Module
// this file contain 2 class
//   weblinks_modify
//   weblinks_modify_save
// 2006-12-10 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('weblinks_modify')) {
    //=========================================================
    // class weblinks_modify
    //=========================================================

    /**
     * Class weblinks_modify
     */
    class weblinks_modify extends weblinks_link_base
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct()
        {
            parent::__construct();

            $this->initVar('mid', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('mode', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('muid', XOBJ_DTYPE_INT, 0, false);

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
            //	$this->initVar('width',    XOBJ_DTYPE_INT, 0, false);
            //	$this->initVar('height',   XOBJ_DTYPE_INT, 0, false);
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
            $this->initVar('notify', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('map_use', XOBJ_DTYPE_INT, 1);

            // rssc
            $this->initVar('rssc_lid', XOBJ_DTYPE_INT, 0);

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
            for ($i = 1; $i <= WEBLINKS_LINK_NUM_ETC; $i++) {
                $etc_name = 'etc' . $i;
                $this->initVar($etc_name, XOBJ_DTYPE_TXTBOX, null, false, 255);
            }
        }

        //---------------------------------------------------------
        // cid array for modify
        //---------------------------------------------------------

        /**
         * @return mixed
         */
        public function &cid_array()
        {
            $arr = unserialize($this->get('cids'));

            return $arr;
        }

        /**
         * @param $arr
         */
        public function set_cids_by_cid_array($arr)
        {
            $this->setVar('cids', serialize($arr));
        }

        // --- class end ---
    }

    //=========================================================
    // class weblinks_modify_save
    //=========================================================

    /**
     * Class weblinks_modify_save
     */
    class weblinks_modify_save extends weblinks_modify
    {
        public $_link_validate;
        public $_linkitem_define_handler;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------

        /**
         * weblinks_modify_save constructor.
         * @param $dirname
         */
        public function __construct($dirname)
        {
            parent::__construct();

            $this->_link_validate = weblinks_link_validate::getInstance($dirname);
            $this->_linkitem_define_handler = weblinks_get_handler('linkitem_define', $dirname);
        }

        //---------------------------------------------------------
        // assign add object
        // $_POST or bulk
        //---------------------------------------------------------
        // mode 0: add, 1:mod, 2:del

        /**
         * @param     $post
         * @param int $mode
         */
        public function assign_add_object(&$post, $mode = 0)
        {
            // delete
            if (2 == $mode) {
                $this->set('mode', $mode);
                $this->set('muid', $this->_xoops_uid);
                $this->setVar('notify', $post['notify']);
                $this->setVar('usercomment', $post['reason']);

                return;
            }

            // muid
            $this->set_validater_value_allow('muid', $this->_xoops_uid, true);

            $this->set_validater_name_prefix('weblinks');

            $this->_link_validate->init();
            $this->set_validater_conf_array($this->_link_validate->get_conf_array());

            $this->merge_validater_allow_list($this->_link_validate->get_allow_list());
            $this->set_validater_allow_true('notify');

            // BUG 4690: not set rss_url in modify table
            if ($this->_linkitem_define_handler->get_by_name('rss_url', 'user_mode') > 0) {
                $this->set_validater_allow_true('rss_url');
                $this->set_validater_allow_true('rss_flag');
            }

            // post value
            $this->merge_validater_value_list($this->validate_values_from_post($post));

            // mode
            $this->set_validater_value_allow('mode', $mode, true);

            // muid
            $this->set_validater_value_allow('muid', $this->_xoops_uid, true);

            // time
            $time = time();
            $this->set_validater_value_allow('time_update', $time, true);

            // mode
            if ($mode) {
                $uid = $this->get_int_xoops_uid($post, 'uid');
                $this->set_validater_value_allow('uid', $uid, true);
                $this->set_validater_value_allow_by_array($this->_link_validate->get_passwd_md5_mod_array($post));
            } else {
                $this->set_validater_value_allow('uid', $this->_xoops_uid, true);
                $this->set_validater_value_allow('time_create', $time, true);
                $this->set_validater_value_allow_by_array($this->_link_validate->get_passwd_md5_new_array($post));
            }

            $this->set_object_with_validater();

            // cid array
            $cid_arr = &$this->get_cid_array_form_post($post);
            $this->set_cids_by_cid_array($cid_arr);
        }

        // --- class end ---
    }
    // === class end ===
}
