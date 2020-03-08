<?php
// $Id: weblinks_category_basic_handler.php,v 1.4 2012/04/11 12:00:10 ohwada Exp $

// 2012-04-02 K.OHWADA
// gm_icon gm_location

// 2007-08-01 K.OHWADA
// get_rows_by_like_title()
// base on W3C

// 2007-06-10 K.OHWADA
// REQ 4501: category path becomes too long
// change build_sub_categories()

// 2007-04-08 K.OHWADA
// gm_type, description

// 2007-03-25 K.OHWADA
// get_parent_forum_id()

// 2007-03-01 K.OHWADA
// divid from weblinks_category_handler

//=========================================================
// WebLinks Module
// 2007-03-01 K.OHWADA
//=========================================================

//---------------------------------------------------------
// TODO
// build_sub_categories: use cache for performance
//---------------------------------------------------------

// === class begin ===
if (!class_exists('weblinks_category_basic_handler')) {
    //=========================================================
    // class table_category
    //=========================================================
    class weblinks_category_basic_handler extends happy_linux_basic_handler
    {
        // class
        public $_tree;
        public $_strings;

        // config
        public $_conf;

        // cache
        public $_cached_cid_tree = [];
        public $_cached_info = [];
        public $_total_count = 0;

        // local variable
        public $_tree_order = 0;

        // hack for multi language
        public $_flag_replace = false;

        public $_CAT_GLUE = ' : ';
        public $_CAT_DEPTH = '-';

        // base on W3C
        public $_SELECTED = 'selected="selected"';

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            parent::__construct($dirname);
            $this->set_table_name('category');
            $this->set_id_name('cid');

            $this->set_debug_db_sql(WEBLINKS_DEBUG_CATEGORY_BASIC_SQL);
            $this->set_debug_db_error(WEBLINKS_DEBUG_ERROR);
            $this->set_debug_print_time(WEBLINKS_DEBUG_TIME);

            // hack for multi site
            if (WEBLINKS_FLAG_MULTI_SITE) {
                $this->renew_prefix(WEBLINKS_DB_PREFIX);
            }

            // hack for multi language
            if (weblinks_multi_is_japanese_site()) {
                $this->_flag_replace = true;
            }

            $this->_tree = new XoopsTree($this->_table, 'cid', 'pid');

            $config_basic_handler = weblinks_getHandler('config2_basic', $dirname);
            $this->_strings = happy_linux_strings::getInstance();

            $this->_conf = $config_basic_handler->get_conf();
        }

        //---------------------------------------------------------
        // init
        //---------------------------------------------------------
        public function load_once()
        {
            static $flag_init_load;

            if (!isset($flag_init_load)) {
                $flag_init_load = 1;
                $this->_load_cache();
            }
        }

        public function _load_cache()
        {
            if ($this->get_debug_print_time()) {
                $happy_linux_time = happy_linux_time::getInstance();
                $happy_linux_time->print_lap_time('weblinks_category_basic_handler');
            }

            $this->_total_count = $this->get_count_all();

            $rows = &$this->get_rows_tree_order();

            $this->_cached = [];
            foreach ($rows as $row) {
                $this->_cached[$row['cid']] = $this->_multi_replace($row);
            }

            if ($this->_conf['cat_path']) {
                $this->_cached_cid_tree = [];
                foreach ($rows as $row) {
                    $cid = $row['cid'];
                    $this->_cached_cid_tree[] = $row['cid'];
                }

                $this->_get_tree_form_db();
            } else {
                $this->build_tree();
            }

            if ($this->get_debug_print_time()) {
                $happy_linux_time->print_lap_time();
            }
        }

        public function &_multi_replace(&$row)
        {
            $arr = &$row;
            if ($this->_flag_replace && $row['aux_text_1']) {
                $arr['title'] = $row['aux_text_1'];
            }

            return $arr;
        }

        //---------------------------------------------------------
        // get count
        //---------------------------------------------------------
        public function get_count_by_pid($pid)
        {
            $sql = 'SELECT count(*) FROM ' . $this->_table . ' WHERE pid=' . (int)$pid;
            $count = $this->get_count_by_sql($sql);

            return $count;
        }

        public function get_total()
        {
            return $this->_total_count;
        }

        //---------------------------------------------------------
        // get rows
        //---------------------------------------------------------
        public function &get_rows_tree_order($limit = 0, $start = 0)
        {
            $sql = 'SELECT * FROM ' . $this->_table;
            $sql .= ' ORDER BY tree_order ASC, orders ASC, cid ASC';
            $arr = &$this->get_rows_by_sql($sql, $limit, $start);

            return $arr;
        }

        public function &get_rows_by_pid($pid = 0, $limit = 0, $start = 0)
        {
            $sql = 'SELECT * FROM ' . $this->_table;
            $sql .= ' WHERE pid=' . (int)$pid;
            $sql .= ' ORDER BY orders ASC, cid ASC';
            $arr = &$this->get_rows_by_sql($sql, $limit, $start);

            return $arr;
        }

        public function &get_rows_by_like_title($title, $limit = 0, $start = 0)
        {
            $sql = 'SELECT * FROM ' . $this->_table;
            $sql .= " WHERE title LIKE '" . addslashes($title) . "%' ";
            $arr = &$this->get_rows_by_sql($sql, $limit, $start);

            return $arr;
        }

        //---------------------------------------------------------
        // get cid array
        //---------------------------------------------------------
        public function &get_cid_array_by_pid($pid = 0, $limit = 0, $start = 0)
        {
            $sql = 'SELECT cid FROM ' . $this->_table;
            $sql .= ' WHERE pid=' . (int)$pid;
            $sql .= ' ORDER BY orders ASC, cid ASC';
            $arr = &$this->get_first_row_by_sql($sql, $limit, $start);

            return $arr;
        }

        //---------------------------------------------------------
        // cache array
        //---------------------------------------------------------
        public function cache_exists($cid)
        {
            if (isset($this->_cached[(int)$cid])) {
                return true;
            }

            return false;
        }

        public function &get_cache($cid)
        {
            $row = false;
            if (isset($this->_cached[$cid])) {
                $row = &$this->_cached[$cid];
                $row['title'] = $this->get_title($cid, 'n');
            }

            return $row;
        }

        public function get_lflag($cid)
        {
            $val = false;
            if (isset($this->_cached[$cid]['lflag'])) {
                $val = (int)$this->_cached[$cid]['lflag'];
            }

            return $val;
        }

        public function get_link_count($cid)
        {
            $val = false;
            if (isset($this->_cached[$cid]['link_count'])) {
                $val = (int)$this->_cached[$cid]['link_count'];
            }

            return $val;
        }

        //---------------------------------------------------------
        // imgurl size
        //---------------------------------------------------------
        public function &get_imgurl_size($cid)
        {
            $arr = [
                'imgurl' => false,
                'img_show_width' => 0,
                'img_show_height' => 0,
            ];

            if (isset($this->_cached[$cid]['imgurl'])) {
                $arr = [
                    'imgurl' => $this->_cached[$cid]['imgurl'],
                    'img_show_width' => $this->_cached[$cid]['img_show_width'],
                    'img_show_height' => $this->_cached[$cid]['img_show_height'],
                ];
            }

            return $arr;
        }

        public function &get_parent_imgurl_size($cid)
        {
            $arr = [
                'imgurl' => false,
                'img_show_width' => 0,
                'img_show_height' => 0,
            ];

            $pid_arr = &$this->get_cached_pid_array_by_cid($cid);

            foreach ($pid_arr as $pid) {
                $parent = &$this->get_imgurl_size($pid);

                // self
                if ($parent['imgurl']) {
                    $arr = &$parent;
                    break;
                } // parent

                continue;
            }

            return $arr;
        }

        //---------------------------------------------------------
        // desc disp
        //---------------------------------------------------------
        public function get_desc_disp($cid)
        {
            $val = null;

            if (isset($this->_cached[$cid]['description'])) {
                $desc = $this->_cached[$cid]['description'];
                $dohtml = $this->_cached[$cid]['dohtml'];
                $dosmiley = $this->_cached[$cid]['dosmiley'];
                $doxcode = $this->_cached[$cid]['doxcode'];
                $doimage = $this->_cached[$cid]['doimage'];
                $dobr = $this->_cached[$cid]['dobr'];

                if ($desc) {
                    $myts = MyTextSanitizer::getInstance();
                    $val = $myts->displayTarea($desc, $dohtml, $dosmiley, $doxcode, $doimage, $dobr);
                }
            }

            return $val;
        }

        public function get_parent_desc_disp($cid)
        {
            $val = null;

            $pid_arr = &$this->get_cached_pid_array_by_cid($cid);

            foreach ($pid_arr as $pid) {
                $parent = &$this->get_desc_disp($pid);

                // self
                if ($parent) {
                    $val = $parent;
                    break;
                } // parent

                continue;
            }

            return $val;
        }

        //---------------------------------------------------------
        // forum id
        //---------------------------------------------------------
        public function get_forum_id($cid)
        {
            $val = false;
            if (isset($this->_cached[$cid]['forum_id'])) {
                $val = (int)$this->_cached[$cid]['forum_id'];
            }

            return $val;
        }

        public function get_parent_forum_id($cid)
        {
            $forum_id = 0;

            $pid_arr = &$this->get_cached_pid_array_by_cid($cid);

            foreach ($pid_arr as $pid) {
                $parent_forum_id = &$this->get_forum_id($pid);

                // self
                if ($parent_forum_id) {
                    $forum_id = $parent_forum_id;
                    break;
                } // parent

                continue;
            }

            return $forum_id;
        }

        //---------------------------------------------------------
        // album id
        //---------------------------------------------------------
        public function get_album_id($cid)
        {
            $val = false;
            if (isset($this->_cached[$cid]['album_id'])) {
                $val = (int)$this->_cached[$cid]['album_id'];
            }

            return $val;
        }

        public function get_parent_album_id($cid)
        {
            $album_id = 0;

            $pid_arr = &$this->get_cached_pid_array_by_cid($cid);

            foreach ($pid_arr as $pid) {
                $parent_album_id = &$this->get_album_id($pid);

                // self
                if ($parent_album_id) {
                    $album_id = $parent_album_id;
                    break;
                } // parent

                continue;
            }

            return $album_id;
        }

        //---------------------------------------------------------
        // gm_value
        //---------------------------------------------------------
        public function &get_gm_value($cid)
        {
            $arr = [
                'gm_mode' => false,
                'gm_latitude' => null,
                'gm_longitude' => null,
                'gm_zoom' => null,
                'gm_type' => null,
                'gm_icon' => null,
                'gm_location' => null,
            ];

            $cache = &$this->get_cache($cid);

            if (is_array($cache) && count($cache)) {
                $arr = &$cache;
            }

            return $arr;
        }

        public function get_parent_gm_value($cid)
        {
            $arr = [
                'gm_mode' => false,
                'gm_latitude' => null,
                'gm_longitude' => null,
                'gm_zoom' => null,
                'gm_type' => null,
                'gm_icon' => null,
                'gm_location' => null,
            ];

            $pid_arr = &$this->get_cached_pid_array_by_cid($cid);

            foreach ($pid_arr as $pid) {
                $cache = &$this->get_gm_value($pid);

                if (!isset($cache['gm_mode'])) {
                    break;
                }

                switch ($cache['gm_mode']) {
                    // parent
                    case WEBLINKS_C_GM_MODE_PARENT:
                        continue;
                    // config or self
                    case WEBLINKS_C_GM_MODE_DEFAULT:
                    case WEBLINKS_C_GM_MODE_FOLLOWING:
                        $arr = &$cache;
                        break;
                    // not show
                    case WEBLINKS_C_GM_MODE_NON:
                    default:
                        break;
                }
            }

            return $arr;
        }

        //---------------------------------------------------------
        // hack for multi language
        //---------------------------------------------------------
        public function get_title($cid, $format = 's')
        {
            $val = false;
            if (isset($this->_cached[$cid]['title'])) {
                $val = $this->_cached[$cid]['title'];
            }
            $val = $this->_strings->sanitize_format_text($val, $format);

            return $val;
        }

        //---------------------------------------------------------
        // build_sub_categories
        //---------------------------------------------------------
        // Hack by Tom  $chitem
        // admin can change the display number of subcategory
        // for viewcat.php
        public function build_sub_categories($cid, $sub_num = -1, $sub_mode = 1)
        {
            $i = 0;
            $arr = [];

            $last_arr = [];
            $last_arr['cid'] = -1;
            $last_arr['title'] = '...';
            $last_arr['title_s'] = '...';

            // bug fix: show all sub categories when $sub_num = 0
            if (0 == $sub_num) {
                return $arr;
            }

            switch ($sub_mode) {
                case 0:
                    return $arr;
                    break;
                // TODO: use cache for performance
                case 2:
                    $child_arr = $this->getAllChildId($cid);
                    break;
                case 1:
                default:
                    $child_arr = $this->get_cid_child_array_from_cache_by_cid($cid);
                    break;
            }

            foreach ($child_arr as $ch_id) {
                $temp_arr = &$this->get_cache($ch_id);
                $temp_arr['title_s'] = $this->get_title($ch_id, 's');

                // unlimited if chitem = -1
                if (($sub_num > 0) && ($i >= $sub_num)) {
                    $arr[] = &$last_arr;
                    break;
                }

                $arr[] = &$temp_arr;
                ++$i;
            }

            return $arr;
        }

        //=========================================================
        // category tree
        //=========================================================
        //---------------------------------------------------------
        // get tree
        // recursive function
        //---------------------------------------------------------
        public function build_tree()
        {
            $this->_tree_order = 0;
            $this->_cached_cid_tree = [];
            $this->_cached_info = [];
            $this->_cached_info[0]['tree'] = 0;
            $this->_cached_info[0]['parent'] = [];
            $this->_cached_info[0]['child'] = [];

            $this->_build_tree_recursive(0);
        }

        public function _build_tree_recursive($pid)
        {
            $cid_arr = $this->get_cid_array_by_pid($pid);

            if (!is_array($cid_arr) || (0 == count($cid_arr))) {
                $this->_cached_info[$pid]['child'] = [];

                return false;
            }

            $this->_cached_info[$pid]['child'] = $cid_arr;

            foreach ($cid_arr as $cid) {
                if (0 == $pid) {
                    $parent = [$cid];
                } else {
                    $parent = $this->_cached_info[$pid]['parent'];
                    $parent[] = $cid;
                }

                $this->_tree_order++;
                $this->_cached_cid_tree[] = $cid;
                $this->_cached_info[$cid]['tree'] = $this->_tree_order;
                $this->_cached_info[$cid]['parent'] = $parent;

                $this->_build_tree_recursive($cid);
            }

            return true;
        }

        public function _get_tree_form_db()
        {
            $this->_cached_info = [];

            foreach ($this->_cached as $cid => $row) {
                $parent_path = $this->_strings->convert_string_to_array($row['cids_parent'], '|');
                $child = $this->_strings->convert_string_to_array($row['cids_child'], '|');
                $this->_cached_info[$cid]['parent'] = $parent_path;
                $this->_cached_info[$cid]['child'] = $child;
            }
        }

        //---------------------------------------------------------
        // get_tree
        //---------------------------------------------------------
        public function &get_tree($limit = 0, $start = 0)
        {
            $limit = (int)$limit;
            $start = (int)$start;

            if ((0 == $limit) && (0 == $start)) {
                return $this->_cached_cid_tree;
            }

            $total = $this->_total_count;
            $end = $start + $limit;

            if ($start < 0) {
                return false;
            }
            if ($end < 0) {
                return false;
            }
            if ($start > $total) {
                return false;
            }
            if ($end > $total) {
                $end = $total;
            }

            $arr = [];

            for ($i = $start; $i < $end; ++$i) {
                $arr[] = $this->_cached_cid_tree[$i];
            }

            return $arr;
        }

        //---------------------------------------------------------
        // get cat_info_array
        //---------------------------------------------------------
        public function &get_cat_info_array()
        {
            return $this->_cached_info;
        }

        public function &get_cached_pid_array_by_cid($cid)
        {
            $val = false;
            if (isset($this->_cached_info[$cid]['parent'])) {
                $val = $this->_cached_info[$cid]['parent'];
            }

            return $val;
        }

        public function &get_cid_child_array_from_cache_by_cid($cid)
        {
            $val = false;
            if (isset($this->_cached_info[$cid]['child'])) {
                $val = $this->_cached_info[$cid]['child'];
            }

            return $val;
        }

        public function get_cid_depth_from_cache_by_cid($cid)
        {
            $depth = 0;
            $cid_arr = &$this->get_cached_pid_array_by_cid($cid);
            if (is_array($cid_arr)) {
                $count = count($cid_arr);
                if ($count > 0) {
                    $depth = count($cid_arr) - 1;
                }
            }

            return $depth;
        }

        //---------------------------------------------------------
        // category path
        //---------------------------------------------------------
        // REQ 4501: category path becomes too long
        public function build_cat_path($cid, $format = 's')
        {
            $catpath = '';

            $pid_arr = $this->get_cached_pid_array_by_cid($cid);
            if (!is_array($pid_arr) || (0 == count($pid_arr))) {
                return $catpath;
            }

            switch ($this->_conf['cat_path_style']) {
                case 2:
                    $catpath = $this->_build_cat_path_2($pid_arr, $format);
                    break;
                case 1:
                default:
                    $catpath = $this->_build_cat_path_1($pid_arr, $format);
                    break;
            }

            return $catpath;
        }

        //----------------------------------------------
        // style 1
        // cat1 : cat2 : cat3
        //----------------------------------------------
        public function _build_cat_path_1($pid_arr, $format = 's')
        {
            $catpath = '';

            foreach ($pid_arr as $pid) {
                if ($catpath) {
                    $catpath .= $this->_CAT_GLUE;
                }
                $catpath .= $this->get_title($pid, $format);
            }

            return $catpath;
        }

        //----------------------------------------------
        // style 2
        // cat1
        // -- cat2
        // ---- cat3
        //----------------------------------------------
        public function _build_cat_path_2($pid_arr, $format = 's')
        {
            $catpath = '';
            $count = count($pid_arr);
            $pid = $pid_arr[$count - 1];

            if ($count > 1) {
                for ($i = 1; $i < $count; ++$i) {
                    $catpath .= $this->_CAT_DEPTH;
                }
                $catpath .= ' ';
            }

            $catpath .= $this->get_title($pid, $format);

            return $catpath;
        }

        public function &get_parent_path($cid)
        {
            $pid_arr = $this->get_cached_pid_array_by_cid($cid);
            $path_array = [];

            if (is_array($pid_arr)) {
                foreach ($pid_arr as $pid) {
                    $pid = (int)$pid;
                    $path_array[] = [
                        'cid' => $pid,
                        'title' => $this->get_title($pid, 'n'),
                        'title_s' => $this->get_title($pid, 's'),
                    ];
                }
            }

            return $path_array;
        }

        public function &build_parent_path_multi($cid_arr)
        {
            $path_array = [];

            if (0 == count($cid_arr)) {
                return $path_array;
            }

            foreach ($cid_arr as $cid) {
                $path_array[] = $this->get_parent_path($cid);
            }

            return $path_array;
        }

        //---------------------------------------------------------
        // google map
        //---------------------------------------------------------
        public function find_gm_icon_by_cid_array($cid_arr)
        {
            // search category
            foreach ($cid_arr as $cid) {
                // find in category
                $row = $this->get_cache_row($cid);
                if ($row['gm_icon'] > 0) {
                    return $row['gm_icon'];
                }
            }

            // search parent category
            foreach ($cid_arr as $cid) {
                // find in parent category
                $icon = $this->find_gm_icon_in_parent_by_cid($cid);
                if ($icon > 0) {
                    return $icon;
                }
            }

            // not find
            return 0;
        }

        public function find_gm_icon_in_parent_by_cid($cid)
        {
            $pid_arr = $this->get_cached_pid_array_by_cid($cid);

            // from bottom to top
            $pid_reverse_arr = array_reverse($pid_arr);
            foreach ($pid_reverse_arr as $pid) {
                // find in parent category
                $row = $this->get_cache_row($pid);
                if ($row['gm_icon'] > 0) {
                    return $row['gm_icon'];
                }
            }

            return 0;
        }

        //=========================================================
        // selbox
        //=========================================================
        public function show_selbox_multi($cid_arr = '')
        {
            if (0 == count($cid_arr)) {
                return '';
            }

            $selbox = '';

            foreach ($cid_arr as $cid) {
                $title_s = $this->get_title($cid, 's');
                $selbox .= $title_s . "<br>\n";
            }

            return $selbox;
        }

        //---------------------------------------------------------
        // porting from makeMySelBox of xoopstree.php
        // makes a nicely ordered selection box
        // $preset_id is used to specify a preselected item
        // set $none to 1 to add a option with value 0
        //---------------------------------------------------------
        public function build_selbox($preset_id = 0, $none = 0, $sel_name = '', $onchange = '', $none_name = '---', $flag = 0)
        {
            $selbox = '';
            $selbox .= '<select name="' . $sel_name . '"';

            if ('' != $onchange) {
                $selbox .= ' onchange="' . $onchange . '"';
            }

            $selbox .= '>' . "\n";

            if ($none) {
                $selbox .= '<option value="0">' . $none_name . '</option>' . "\n\n";
            }

            foreach ($this->_cached_cid_tree as $cid) {
                $lflag = $this->get_lflag($cid);

                if ((1 == $flag) && (0 == $lflag)) {
                    continue;
                }

                $catpath = $this->build_cat_path($cid, 's');

                $sel = '';
                if ($cid == $preset_id) {
                    $sel = $this->_SELECTED;
                }

                $selbox .= '<option value="' . $cid . '" ' . $sel . '>' . $catpath . '</option>' . "\n";
            }

            $selbox .= '</select>' . "\n";

            return $selbox;
        }

        public function build_selbox_multi($cid_arr = [])
        {
            // show always, if cid array is empty

            if (is_array($cid_arr)) {
                $cid_count = count($cid_arr);
            } else {
                $cid_count = 0;
            }

            $catsel_max = $this->_conf['cat_sel'];
            if ($catsel_max < $cid_count) {
                $catsel_max = $cid_count;
            }

            $selbox = '';

            for ($i = 0; $i < $catsel_max; ++$i) {
                $cid = 0;

                if ($i < $cid_count) {
                    $cid = array_shift($cid_arr);
                }

                $selbox .= $this->build_selbox($cid, 1, 'cid[]', '', _WLS_NOTSELECT, 1);
                $selbox .= "<br>\n";
            }

            return $selbox;
        }

        //=========================================================
        // use tree class
        //=========================================================
        // XoopsTree::getAllChildId is recursible function
        public function &getAllChildId($cid, $order = 'cid')
        {
            $idarray = [];
            $arr = $this->_tree->getAllChildId($cid, $order, $idarray);
            $arr_out = array_unique($arr);

            return $arr_out;
        }

        public function &get_parent_and_all_child_id($cid, $order = 'cid')
        {
            $arr = $this->getAllChildId($cid, $order);
            $arr_out = array_unique(array_merge([$cid], $arr));

            return $arr_out;
        }

        // --- class end ---
    }
    // === class end ===
}
