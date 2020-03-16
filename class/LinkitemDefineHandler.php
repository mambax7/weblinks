<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// $Id: weblinks_linkitem_define_handler.php,v 1.2 2012/04/09 10:20:05 ohwada Exp $

//   $config[66]['name']        = 'gm_icon';

// 2008-02-17 K.OHWADA
// pagerank, pagerank_update in link, modify
// gm_kml

// 2007-09-01 K.OHWADA
// time_publish, time_expire: save_mode 2 -> 1
// notify: admin_form none -> hidden
// usercomment: textarea -> usercomment

// 2007-08-01 K.OHWADA
// admin can add etc column

// 2007-04-08 K.OHWADA
// gm_type

// 2007-03-25 K.OHWADA
// album_id

// 2007-02-20 K.OHWADA
// renew linkitem
// forum_id captcha

// 2007-02-04 K.OHWADA
// BUG 4476: reset hits rating votes commnets in modify link by admin

// 2006-12-10 K.OHWADA
// add data_type save_mode search_mode
// add time_publish textarea1
// add get_save_mode_list() get_search_list()

// 2006-10-01 K.OHWADA
// renewal order
// use rssc
// add rssc_lid
// google map

// 2006-05-15 K.OHWADA
// this is new file
// use new handler

//================================================================
// WebLinks Module
// this file contain 2 class
//   weblinks_linkitem_define
//   weblinks_linkitem_define_handler
// 2006-05-15 K.OHWADA
//================================================================

// === class begin ===
if (!class_exists('LinkitemDefineHandler')) {

    //=========================================================
    // class LinkitemDefineHandler
    //=========================================================
    class LinkitemDefineHandler
    {
        public $_linkitem_handler;
        public $_linkitem_define;

        // cache
        public $_cached_by_itemid = [];
        public $_cached_by_name = [];

        public $_is_module_admin;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            $this->_linkitem_handler = weblinks_get_handler('Linkitem', $dirname);
            $this->_linkitem_define = LinkitemDefine::getInstance($dirname);

            $system = Happylinux\System::getInstance();
            $this->_is_module_admin = $system->is_module_admin();
        }

        public static function getInstance($dirname = null)
        {
            static $instance;
            if (null === $instance) {
                $instance = new static($dirname);
            }

            return $instance;
        }

        //---------------------------------------------------------
        // load
        //---------------------------------------------------------
        public function &load()
        {
            $def_arr = $this->_linkitem_define->load();
            $this->_linkitem_handler->load();

            $this->_cached_by_itemid = [];
            $this->_cached_by_name = [];

            foreach ($def_arr as $id => $def) {
                $name = $this->_linkitem_define->get_cache_by_itemid_key($id, 'name');
                $title_def = $this->_linkitem_define->get_cache_by_itemid_key($id, 'title');
                $user_form = $this->_linkitem_define->get_cache_by_itemid_key($id, 'user_form');
                $admin_form = $this->_linkitem_define->get_cache_by_itemid_key($id, 'admin_form');
                $conf_form = $this->_linkitem_define->get_cache_by_itemid_key($id, 'conf_form');
                $save_mode = $this->_linkitem_define->get_cache_by_itemid_key($id, 'save_mode');
                $search_mode = $this->_linkitem_define->get_cache_by_itemid_key($id, 'search_mode');
                $data_type = $this->_linkitem_define->get_cache_by_itemid_key($id, 'data_type');
                $opt = $this->_linkitem_define->get_cache_by_itemid_key($id, 'options');
                $title = $this->_linkitem_handler->get_cache_by_itemid_key($id, 'title');
                $user_mode = $this->_linkitem_handler->get_cache_by_itemid_key($id, 'user_mode');
                $desc = $this->_linkitem_handler->get_cache_by_itemid_key($id, 'description');

                $arr = [
                    'item_id' => $id,
                    'name' => $name,
                    'title' => htmlspecialchars($title, ENT_QUOTES),
                    'user_mode' => $user_mode,
                    'title_def' => $title_def,
                    'description' => $desc,
                    'user_form' => $user_form,
                    'admin_form' => $admin_form,
                    'conf_form' => $conf_form,
                    'user_mode' => $user_mode,
                    'save_mode' => $save_mode,
                    'search_mode' => $search_mode,
                    'data_type' => $data_type,
                    'options' => $opt,
                ];

                $this->_cached_by_itemid[$id] = $arr;
                $this->_cached_by_name[$name] = $arr;
            }

            return $this->_cached_by_itemid;
        }

        //---------------------------------------------------------
        // get cache
        //---------------------------------------------------------
        public function &get_cached_by_itemid()
        {
            return $this->_cached_by_itemid;
        }

        public function &get_cached_by_name()
        {
            return $this->_cached_by_name;
        }

        public function get_by_itemid($id, $key)
        {
            if (isset($this->_cached_by_itemid[$id][$key])) {
                $val = $this->_cached_by_itemid[$id][$key];

                return $val;
            }

            return false;
        }

        public function get_by_name($name, $key)
        {
            if (isset($this->_cached_by_name[$name][$key])) {
                $val = $this->_cached_by_name[$name][$key];

                return $val;
            }

            return false;
        }

        public function build_caption_by_itemid($id, $flag = 0, $extra = '')
        {
            $mode = $this->get_by_itemid($id, 'user_mode');
            $title = $this->get_by_itemid($id, 'title');
            $title_def = $this->get_by_itemid($id, 'title_def');
            $desc = $this->get_by_itemid($id, 'description');
            $cap = $this->build_caption($title, $desc, $title_def, $mode, $flag, $extra);

            return $cap;
        }

        public function build_caption($title, $desc = '', $title_def = '', $mode = 0, $flag = 0, $extra = '')
        {
            if (2 == $mode) {
                $cap = "<span style='font-weight:bold;'> * $title * </span>";
            } else {
                $cap = "<span style='font-weight:normal;'>" . $title . '</span>';
            }

            if ($flag && ($title != $title_def)) {
                $cap .= "<br>\n";
                $cap .= "<span style='font-weight:normal;'> ( " . $title_def . ' ) </span>';
            }

            if ($extra) {
                $cap .= "<br>\n";
                $cap .= "<span style='font-weight:normal;'>" . $extra . '</span>';
            }

            if ($desc) {
                $cap .= "<br><br>\n";
                $cap .= "<span style='font-weight:normal;'>" . $desc . '</span>';
            }

            return $cap;
        }

        public function &get_save_mode_list()
        {
            $list = [];

            foreach ($this->_cached_by_name as $name => $item) {
                $flag = false;

                if ((1 == $item['save_mode']) && (($item['user_mode'] > 0) || $this->_is_module_admin)) {
                    $flag = true;
                } elseif ((2 == $item['save_mode']) && $this->_is_module_admin) {
                    $flag = true;
                }

                $list[$name] = $flag;
            }

            $list['nameflag'] = $list['name'];
            $list['mailflag'] = $list['mail'];
            $list['width'] = $list['banner'];
            $list['height'] = $list['banner'];

            return $list;
        }

        public function &get_search_list()
        {
            $list = [];
            foreach ($this->_cached_by_name as $name => $item) {
                if ($item['search_mode']) {
                    $list[$name] = true;
                }
            }

            return $list;
        }

        // --- class end ---
    }
    // === class end ===
}
