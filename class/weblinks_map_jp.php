<?php
// $Id: weblinks_map_jp.php,v 1.3 2007/11/11 08:48:19 ohwada Exp $

// 2007-11-01 K.OHWADA
// link_count_handler, category_basic_handler

//=========================================================
// WebLinks Module
// 2007-08-01 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('weblinks_map_jp')) {
    //=========================================================
    // class table_category
    //=========================================================
    class weblinks_map_jp extends happy_linux_basic_handler
    {
        public $_DIRNAME;

        public $_LABEL_ARRAY = [
            'hokkaido',
            'aomori',
            'iwate',
            'akita',
            'miyagi',
            'yamagata',
            'fukushima',
            'niigata',
            'toyama',
            'ishikawa',
            'fukui',
            'ibaraki',
            'tochigi',
            'gunma',
            'chiba',
            'saitama',
            'yamanashi',
            'tokyo',
            'kanagawa',
            'nagano',
            'gifu',
            'shizuoka',
            'aichi',
            'mie',
            'shiga',
            'kyoto',
            'nara',
            'osaka',
            'wakayama',
            'hyogo',
            'tottori',
            'shimane',
            'okayama',
            'hiroshima',
            'yamaguchi',
            'kagawa',
            'ehime',
            'tokushima',
            'kochi',
            'fukuoka',
            'saga',
            'nagasaki',
            'oita',
            'kumamoto',
            'miyazaki',
            'kagoshima',
            'okinawa',
        ];

        public $_config_handler;
        public $_category_handler;
        public $_link_count_handler;

        public $_template;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            $this->_DIRNAME = $dirname;

            $this->_config_handler     = weblinks_getHandler('config2_basic', $dirname);
            $this->_category_handler   = weblinks_getHandler('category_basic', $dirname);
            $this->_link_count_handler = weblinks_getHandler('link_count', $dirname);

            $this->_template = XOOPS_ROOT_PATH . '/modules/' . $dirname . '/templates/parts/weblinks_map_jp.html';
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
        // public
        //---------------------------------------------------------
        public function fetch_template($pref = null)
        {
            if (empty($pref)) {
                $pref = &$this->get_pref_count_array();
            }

            $tpl = new XoopsTpl();
            $tpl->assign('xoops_url', XOOPS_URL);
            $tpl->assign('dirname', $this->_DIRNAME);
            $tpl->assign('pref', $pref);
            $text = $tpl->fetch($this->_template);

            return $text;
        }

        public function &get_pref_count_array($pref = null)
        {
            if (empty($pref)) {
                $pref = &$this->get_conf_pref_array();
            }

            $arr = [];
            foreach ($pref as $k => $v) {
                $cid  = $v['cid'];
                $name = $v['name'];

                $arr[$k] = [
                    'cid'   => $cid,
                    'name'  => htmlspecialchars($name, ENT_QUOTES),
                    'count' => $this->_link_count_handler->get_all_link_count_by_cid($cid),
                ];
            }

            return $arr;
        }

        public function &get_conf_pref_array()
        {
            $conf = $this->_config_handler->get_conf();
            $arr  = unserialize($conf['map_jp_info']);

            return $arr;
        }

        public function &get_label_pref_array()
        {
            $arr = [];
            foreach ($this->_LABEL_ARRAY as $k) {
                $lang = '_WEBLINKS_JP_' . mb_strtoupper($k);
                if (defined($lang)) {
                    $name = constant($lang);

                    $arr[$k] = [
                        'name' => $name,
                        'cid'  => $this->_get_cid_by_like_title($name),
                    ];
                }
            }

            return $arr;
        }

        public function _get_cid_by_like_title($title)
        {
            $cid  = '';
            $rows = &$this->_category_handler->get_rows_by_like_title($title);
            if (is_array($rows) && isset($rows[0]['cid'])) {
                $cid = (int)$rows[0]['cid'];
            }

            return $cid;
        }

        // --- class end ---
    }
    // === class end ===
}
