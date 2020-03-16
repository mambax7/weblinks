<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// $Id: weblinks_linkitem_store_handler.php,v 1.4 2007/08/08 04:18:35 ohwada Exp $

// 2007-08-01 K.OHWADA
// admin can add etc column
// set_num_etc()

// 2007-02-20 K.OHWADA
// add description field
// add_column_table_140()

// 2006-09-20 K.OHWADA
// use happy_linux
// add upgrade() clean()

// 2006-05-15 K.OHWADA
// this is new file
// use new handler

//================================================================
// WebLinks Module
// this file contain 2 class
//   LinkitemForm
//   weblinks_linkitem_store_handler
// 2006-05-15 K.OHWADA
//================================================================

// === class begin ===
if (!class_exists('LinkitemStoreHandler')) {

    //================================================================
    // class LinkitemStoreHandler
    //================================================================
    class LinkitemStoreHandler extends Happylinux\Error
    {
        public $_handler;
        public $_define;
        public $_post;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            parent::__construct();

            $this->_handler = weblinks_get_handler('Linkitem', $dirname);
            $this->_define_handler = weblinks_get_handler('LinkitemDefine', $dirname);
            $this->_define = LinkitemDefine::getInstance($dirname);

            $this->_post = Happylinux\Post::getInstance();
        }

        //---------------------------------------------------------
        // init config
        //---------------------------------------------------------
        public function init()
        {
            $this->_clear_errors();

            $define_arr = $this->_define->get_define();

            // list from Define
            foreach ($define_arr as $item_id => $def) {
                $name = $def['name'];

                $title = '';
                if (isset($def['title'])) {
                    $title = $def['title'];
                }

                $user_mode = '';
                if (isset($def['user_mode'])) {
                    $user_mode = $def['user_mode'];
                }

                $description = '';
                if (isset($def['description'])) {
                    $description = $def['description'];
                }

                $obj = &$this->_handler->create();
                $obj->setVar('item_id', $item_id);
                $obj->setVar('name', $name);
                $obj->setVar('title', $title);
                $obj->setVar('user_mode', $user_mode);
                $obj->setVar('description', $description);

                $ret = $this->_handler->insert($obj);
                if (!$ret) {
                    $flag_error = true;
                    $this->_set_errors($this->_handler->getErrors());
                }

                unset($obj);
            }

            return $this->returnExistError();
        }

        //---------------------------------------------------------
        // upgrade config
        //---------------------------------------------------------
        public function upgrade()
        {
            $this->_clear_errors();

            $define_arr = $this->_define->get_define();

            // list from Define
            foreach ($define_arr as $item_id => $def) {
                $obj = &$this->_handler->get_by_itemid($item_id);
                if (is_object($obj)) {
                    continue;
                }

                // insert, when not in MySQL
                $name = $def['name'];

                $title = '';
                if (isset($def['title'])) {
                    $title = $def['title'];
                }

                $user_mode = '';
                if (isset($def['user_mode'])) {
                    $user_mode = $def['user_mode'];
                }

                $description = '';
                if (isset($def['description'])) {
                    $description = $def['description'];
                }

                $obj = &$this->_handler->create();
                $obj->setVar('item_id', $item_id);
                $obj->setVar('name', $name);
                $obj->setVar('title', $title);
                $obj->setVar('user_mode', $user_mode);
                $obj->setVar('description', $description);

                $ret = $this->_handler->insert($obj);
                if (!$ret) {
                    $this->_set_errors($this->_handler->getErrors());
                }

                unset($obj);
            }

            return $this->returnExistError();
        }

        //---------------------------------------------------------
        // save config
        //---------------------------------------------------------
        public function save()
        {
            $this->_clear_errors();

            $itemid_arr = $this->_post->get_post_array_int('item_ids');
            $mode_arr = $this->_post->get_post_array_int('user_mode');
            $title_arr = $this->_post->get_post_array_text('title');
            $desc_arr = $this->_post->get_post_array_text('description');

            $count = count($itemid_arr);
            if ($count <= 0) {
                return true;
            }  // no action

            // list from POST
            for ($i = 0; $i < $count; ++$i) {
                $itemid = $itemid_arr[$i];

                $obj = &$this->_handler->get_by_itemid($itemid);
                if (!is_object($obj)) {
                    continue;
                }

                $title_current = $obj->getVar('title');
                $mode_current = $obj->getVar('user_mode');
                $desc_current = $obj->getVar('description');

                $title = '';
                $mode = 0;

                if (isset($title_arr[$itemid])) {
                    $title = $title_arr[$itemid];
                    $obj->setVar('title', $title);
                }

                if (isset($mode_arr[$itemid])) {
                    $mode = $mode_arr[$itemid];
                    $obj->setVar('user_mode', $mode);
                }

                if (isset($desc_arr[$itemid])) {
                    $desc = $desc_arr[$itemid];
                    $obj->setVar('description', $desc);
                }

                if (($title != $title_current) || ($mode != $mode_current) || ($desc != $desc_current)) {
                    $ret = $this->_handler->update($obj);
                    if (!$ret) {
                        $flag_error = true;
                        $this->_set_errors($this->_handler->getErrors());
                    }
                }

                unset($obj);
            }

            return $this->returnExistError();
        }

        //---------------------------------------------------------
        // linkitem_handler
        //---------------------------------------------------------
        public function load()
        {
            $this->_handler->load();
        }

        public function existsTable()
        {
            $ret = $this->_handler->existsTable();

            return $ret;
        }

        public function getCount()
        {
            $count = $this->_handler->getCount();

            return $count;
        }

        public function create_table()
        {
            $ret = $this->_handler->create_table();
            if (!$ret) {
                $this->_set_errors($this->_handler->getErrors());
            }

            return $ret;
        }

        public function clean_table()
        {
            $magic = $this->_handler->get_magic_word();
            $ret = $this->_handler->clean_table($magic);
            if (!$ret) {
                $this->_set_errors($this->_handler->getErrors());
            }

            return $ret;
        }

        public function check_exist_by_name($name)
        {
            $arr = $this->_handler->get_cache_by_name($name);
            if (is_array($arr) && count($arr)) {
                return true;
            }

            return false;
        }

        //---------------------------------------------------------
        // add_column_table
        //---------------------------------------------------------
        public function check_version_140()
        {
            $ret = $this->_handler->check_version_140();

            return $ret;
        }

        public function add_column_table_140()
        {
            $ret = $this->_handler->add_column_table_140();

            return $ret;
        }

        //---------------------------------------------------------
        // set param
        //---------------------------------------------------------
        public function set_num_etc($val)
        {
            $this->_define->set_num_etc($val);
        }

        // --- class end ---
    }
    // === class end ===
}
