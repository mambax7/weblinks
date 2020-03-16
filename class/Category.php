<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// $Id: weblinks_category_handler.php,v 1.3 2012/04/09 10:20:04 ohwada Exp $

//  $this->initVar('gm_icon',      XOBJ_DTYPE_INT,   0, false );
//  $this->initVar('gm_location',  XOBJ_DTYPE_TXTBOX, null, false, 255);

// 2010-10-28 K.OHWADA
// get_cid_array_by_title_like()

// 2007-12-16 K.OHWADA
// build_selbox_top()

// 2007-11-01 K.OHWADA
// divid to weblinks_category_def_handler

// 2007-05-06 K.OHWADA
// Notice [PHP]: Use of undefined constant album_id - assumed 'album_id'

// 2007-04-08 K.OHWADA
// gm_type dohtml etc
// set_desc_by_post()

// 2007-03-25 K.OHWADA
// album_id img_orig_width gm_latitude etc

// 2007-03-24 K.OHWADA
// BUG 4519: Fatal error: Call to undefined function: get_cid_array_by_title()

// 2007-03-17 K.OHWADA
// BUG 4507: Fatal error: Call to undefined function: getallchildid()

// 2007-03-01 K.OHWADA
// divid to category_basic_handler
// hack for multi site
// hack for multi language
// add forum_id field, etc

// 2006-11-04 K.OHWADA
// small change

// 2006-10-14 K.OHWADA
// add get_parent_and_all_child_id()

// 2006-09-20 K.OHWADA
// use happy_linux
// add build_cat_path() get_cache_var_title()

// 2006-08-07 K.OHWADA
// bug: category is html sanitized twice in edit form

// 2006-05-15 K.OHWADA
// new handler
// not use weblinks_module_base
// NOT use another class

// 2006-05-12 K.OHWADA
// BUG 3922: Fatal error when use category image

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//=========================================================
// WebLinks Module
// this file contain 2 class
//   weblinks_category
//   weblinks_category_handler
// 2004/01/14 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('Category')) {
    define('WEBLINKS_C_CAT_TOP', 'TOP');

    //=========================================================
    // class weblinks_category
    //=========================================================
    class Category extends Happylinux\BaseObject
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct()
        {
            parent::__construct();

            $this->initVar('cid', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('pid', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('title', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('imgurl', XOBJ_DTYPE_URL, null, false, 255);
            $this->initVar('cflag', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('lflag', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('tflag', XOBJ_DTYPE_INT, 0);
            $this->initVar('displayimg', XOBJ_DTYPE_INT, 0);
            $this->initVar('description', XOBJ_DTYPE_TXTAREA);
            $this->initVar('catdescription', XOBJ_DTYPE_TXTAREA);
            $this->initVar('catfooter', XOBJ_DTYPE_TXTAREA);
            $this->initVar('groupid', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('orders', XOBJ_DTYPE_INT, 0);
            $this->initVar('editaccess', XOBJ_DTYPE_TXTBOX, null, false, 255);

            $this->initVar('forum_id', XOBJ_DTYPE_INT, 0);
            $this->initVar('tree_order', XOBJ_DTYPE_INT, 0);
            $this->initVar('cids_parent', XOBJ_DTYPE_TXTAREA);
            $this->initVar('cids_child', XOBJ_DTYPE_TXTAREA);
            $this->initVar('link_count', XOBJ_DTYPE_INT, 0);
            $this->initVar('link_update', XOBJ_DTYPE_INT, 0);

            // aux
            $this->initVar('aux_int_1', XOBJ_DTYPE_INT, 0);
            $this->initVar('aux_int_2', XOBJ_DTYPE_INT, 0);
            $this->initVar('aux_text_1', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('aux_text_2', XOBJ_DTYPE_TXTBOX, null, false, 255);

            $this->initVar('album_id', XOBJ_DTYPE_INT, 0);

            // image size
            $this->initVar('img_orig_width', XOBJ_DTYPE_INT, 0);
            $this->initVar('img_orig_height', XOBJ_DTYPE_INT, 0);
            $this->initVar('img_show_width', XOBJ_DTYPE_INT, 0);
            $this->initVar('img_show_height', XOBJ_DTYPE_INT, 0);

            // google map
            $this->initVar('gm_mode', XOBJ_DTYPE_INT, 1, false);
            $this->initVar('gm_latitude', XOBJ_DTYPE_FLOAT, 0, false);
            $this->initVar('gm_longitude', XOBJ_DTYPE_FLOAT, 0, false);
            $this->initVar('gm_zoom', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('gm_type', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('gm_icon', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('gm_location', XOBJ_DTYPE_TXTBOX, null, false, 255);

            // dhtml
            $this->initVar('dohtml', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('dosmiley', XOBJ_DTYPE_INT, 1, false);
            $this->initVar('doxcode', XOBJ_DTYPE_INT, 1, false);
            $this->initVar('doimage', XOBJ_DTYPE_INT, 1, false);
            $this->initVar('dobr', XOBJ_DTYPE_INT, 1, false);
        }

        //---------------------------------------------------------
        // set var
        //---------------------------------------------------------
        public function set_vars_by_post()
        {
            $this->setVars($_POST);
        }

        public function set_pid_by_post()
        {
            if (isset($_POST['pid'])) {
                $this->setVar('pid', (int)$_POST['pid']);
            } elseif (isset($_POST['cid'])) {
                $this->setVar('pid', (int)$_POST['cid']);
            }
        }

        public function set_desc_by_post()
        {
            $this->setVar('description', $_POST['weblinks_description']);
            $this->set_var_checkbox_by_global_post('dohtml');
            $this->set_var_checkbox_by_global_post('dosmiley');
            $this->set_var_checkbox_by_global_post('doxcode');
            $this->set_var_checkbox_by_global_post('doimage');
            $this->set_var_checkbox_by_global_post('dobr');
        }

        // --- class end ---
    }
    // === class end ===
}
