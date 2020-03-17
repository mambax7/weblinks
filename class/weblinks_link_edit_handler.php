<?php

// $Id: weblinks_link_edit_handler.php,v 1.1 2011/12/29 14:33:03 ohwada Exp $

// 2007-11-01 K.OHWADA
// BUG: not object

// 2007-09-20 K.OHWADA
// BUG: Missing argument 2
// Fatal error: Call to undefined method weblinks_link_edit_handler::create_add_link_by_arr()

// 2007-09-10 K.OHWADA
// general revision
// divid to weblinks_link_add_handler.php
// divid to weblinks_link_mod_handler.php
// divid to weblinks_link_del_handler.php
// divid to weblinks_link_req_handler.php

// 2007-09-01 K.OHWADA
// BUG 4693: not notify "New Link Submitted"
// notification to each category
// build_tags_newlink()

// 2007-06-01 K.OHWADA
// link_catlink_basic_handler

// 2007-03-01 K.OHWADA
// update_category_link_count()
// build_comment()

// 2006-12-10 K.OHWADA
// use link_save modify_save

// 2006-10-12 K.OHWADA
// BUG 4318: cannot register bulk links.
// add create_add_link_by_arr()

// 2006-09-20 K.OHWADA
// use happy_linux
// use rssc
// change del_link_vote_comm_by_lid()

// 2006-07-23 K.OHWADA
// BUG 4154: always update time_update in admin mode

// 2006-06-10 K.OHWADA
// BUG 4030: cannot change recommend, mutual

// 2006-05-15 K.OHWADA
// this is new file
// use new handler

//=========================================================
// WebLinks Module
// 2006-05-15 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('weblinks_link_edit_handler')) {
    //=========================================================
    // class weblinks_link_edit_handler
    // this is facade class
    //=========================================================

    /**
     * Class weblinks_link_edit_handler
     */
    class weblinks_link_edit_handler extends weblinks_link_edit_base_handler
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------

        /**
         * weblinks_link_edit_handler constructor.
         * @param $dirname
         */
        public function __construct($dirname)
        {
            parent::__construct($dirname);

            $this->_link_add_handler = weblinks_get_handler('link_add', $dirname);
            $this->_link_mod_handler = weblinks_get_handler('link_mod', $dirname);
            $this->_link_del_handler = weblinks_get_handler('link_del', $dirname);
            $this->_link_req_handler = weblinks_get_handler('link_req', $dirname);
        }

        //---------------------------------------------------------
        // add new link
        //---------------------------------------------------------

        /**
         * @return mixed
         */
        public function user_add_link()
        {
            return $this->_link_add_handler->user_add_link();
        }

        /**
         * @return mixed
         */
        public function build_submit_preview()
        {
            return $this->_link_add_handler->build_submit_preview();
        }

        /**
         * @return mixed
         */
        public function admin_add_link()
        {
            return $this->_link_add_handler->admin_add_link();
        }

        /**
         * @param $mid
         * @return mixed
         */
        public function admin_approve_new_link($mid)
        {
            return $this->_link_add_handler->admin_approve_new_link($mid);
        }

        /**
         * @param $lid
         * @return mixed
         */
        public function admin_clone_link($lid)
        {
            return $this->_link_add_handler->admin_clone_link($lid);
        }

        /**
         * @param $module_id
         * @param $lid
         * @return mixed
         */
        public function admin_clone_module_from($module_id, $lid)
        {
            return $this->_link_add_handler->admin_clone_module_from($module_id, $lid);
        }

        // for bulk manage
        // Fatal error: Call to undefined method weblinks_link_edit_handler::create_add_link_by_arr()

        /**
         * @param      $post
         * @param bool $not_gpc
         * @param bool $flag_banner
         * @return mixed
         */
        public function create_add_link_by_arr(&$post, $not_gpc = false, $flag_banner = false)
        {
            return $this->_link_add_handler->_create_add_link_by_arr($post, $not_gpc, $flag_banner);
        }

        //---------------------------------------------------------
        // modify link
        //---------------------------------------------------------

        /**
         * @param $lid
         * @return mixed
         */
        public function user_mod_link($lid)
        {
            return $this->_link_mod_handler->user_mod_link($lid);
        }

        /**
         * @param $lid
         * @return mixed
         */
        public function build_modify_preview($lid)
        {
            return $this->_link_mod_handler->build_modify_preview($lid);
        }

        /**
         * @param $lid
         * @return mixed
         */
        public function admin_mod_link($lid)
        {
            return $this->_link_mod_handler->admin_mod_link($lid);
        }

        // BUG: not object

        /**
         * @param $obj
         * @return mixed
         */
        public function admin_approve_mod_link(&$obj)
        {
            return $this->_link_mod_handler->admin_approve_mod_link($obj);
        }

        //---------------------------------------------------------
        // delete link
        //---------------------------------------------------------

        /**
         * @param $lid
         * @return mixed
         */
        public function user_del_link($lid)
        {
            return $this->_link_del_handler->user_del_link($lid);
        }

        /**
         * @param $lid
         * @return mixed
         */
        public function admin_del_link($lid)
        {
            return $this->_link_del_handler->admin_del_link($lid);
        }

        // BUG: Missing argument 2

        /**
         * @param $obj
         * @return mixed
         */
        public function admin_approve_del_link(&$obj)
        {
            return $this->_link_del_handler->admin_approve_del_link($obj);
        }

        //---------------------------------------------------------
        // request admin_approve
        //---------------------------------------------------------

        /**
         * @return mixed
         */
        public function user_submit_admin_approve()
        {
            return $this->_link_req_handler->user_submit_admin_approve();
        }

        /**
         * @return mixed
         */
        public function user_modify_admin_approve()
        {
            return $this->_link_req_handler->user_modify_admin_approve();
        }

        /**
         * @return mixed
         */
        public function user_delete_admin_approve()
        {
            return $this->_link_req_handler->user_delete_admin_approve();
        }

        // --- class end ---
    }
    // === class end ===
}
