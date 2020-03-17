<?php

// $Id: weblinks_link_del_handler.php,v 1.1 2011/12/29 14:33:07 ohwada Exp $

// 2007-11-01 K.OHWADA
// link_vote_del_handler

// 2007-09-10 K.OHWADA
// divid from weblinks_link_edit_handler.php

//=========================================================
// WebLinks Module
// 2006-05-15 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('weblinks_link_del_handler')) {
    //=========================================================
    // class weblinks_link_del_handler
    //=========================================================

    /**
     * Class weblinks_link_del_handler
     */
    class weblinks_link_del_handler extends weblinks_link_edit_base_handler
    {
        public $_link_vote_handler;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------

        /**
         * weblinks_link_del_handler constructor.
         * @param $dirname
         */
        public function __construct($dirname)
        {
            parent::__construct($dirname);

            $this->_link_vote_handler = weblinks_get_handler('link_vote_del', $dirname);
        }

        //---------------------------------------------------------
        // delete link
        //---------------------------------------------------------

        /**
         * @param $lid
         * @return bool
         */
        public function user_del_link($lid)
        {
            $ret = $this->del_link_vote_comm_catlink_by_lid($lid);
            if (!$ret) {
                return false;
            }

            if ($this->_conf['cat_count']) {
                $this->update_category_link_count();
            }

            return true;
        }

        /**
         * @param $lid
         * @return mixed
         */
        public function admin_del_link($lid)
        {
            return $this->_del_link_common($lid);
        }

        /**
         * @param $modify_obj
         * @return bool
         */
        public function admin_approve_del_link(&$modify_obj)
        {
            $lid = $modify_obj->get('lid');
            $this->del_link_vote_comm_catlink_by_lid($lid);

            // delete modify
            $this->delete_modify($modify_obj);

            if ($this->_conf['cat_count']) {
                $this->update_category_link_count();
            }

            return $this->returnExistError();
        }

        /**
         * @param $lid
         * @return mixed
         */
        public function del_link_vote_comm_catlink_by_lid($lid)
        {
            return $this->_link_vote_handler->del_link_vote_comm_catlink_by_lid($lid);
        }

        // --- class end ---
    }
    // === class end ===
}
