<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: table_manage_search.php,v 1.1 2007/12/24 20:06:39 ohwada Exp $

//================================================================
// WebLinks Module
// 2007-12-24 K.OHWADA
//================================================================

include 'admin_header.php';

//================================================================
// class TableManageSearch
//================================================================
class TableManageSearch extends Happylinux\Error
{
    public $_link_handler;
    public $_category_handler;
    public $_catlink_handler;
    public $_post;
    public $_system;
    public $_form;

    public $_link_table;

    public $_LIMIT = 100;
    public $_TITLE = 'Rebuild search field';

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct();

        // handlder
        $this->_link_handler = weblinks_get_handler('Link', WEBLINKS_DIRNAME);
        $this->_category_handler = handler('Category', WEBLINKS_DIRNAME);
        $this->_catlink_handler = weblinks_get_handler('CategoryLink', WEBLINKS_DIRNAME);

        $this->_post = Happylinux\Post::getInstance();
        $this->_system = Happylinux\System::getInstance();
        $this->_form = Happylinux\FormLib::getInstance();

        $this->_link_handler->set_debug_db_sql(0);
        $this->_link_handler->set_debug_db_error(1);
        $this->_link_table = $this->_link_handler->_table;

        $this->_init();
    }

    public static function getInstance()
    {
        static $instance;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

    //---------------------------------------------------------
    // init
    //---------------------------------------------------------
    public function _init()
    {
        $this->_category_handler->load();
    }

    public function get_post_op()
    {
        return $this->_post->get_post_get('op');
    }

    //---------------------------------------------------------
    // menu
    //---------------------------------------------------------
    public function menu()
    {
        weblinks_admin_print_header();
        weblinks_admin_print_menu();

        echo '<h3>' . _AM_WEBLINKS_TABLE_MANAGE . "</h3>\n";
        echo '<h4>' . $this->_TITLE . "</h4>\n";

        echo $this->_form->build_lib_box_button_style($this->_TITLE, 'Bug fix : necessary in the version up from v1.82 or before', 'rebuild', _HAPPYLINUX_EXECUTE, 'table_manage_search.php');
    }

    public function rebuild_search()
    {
        echo $this->build_bread_crumb();
        echo '<h4>' . $this->_TITLE . "</h4>\n";

        if (!$this->_form->check_token()) {
            xoops_error('Token Error');

            return false;
        }

        $offset = $this->_post->get_post_get('offset');
        $next = $this->_LIMIT + $offset;

        $total = $this->_link_handler->getCount();
        $objs = &$this->_link_handler->get_objects_all($this->_LIMIT, $offset);

        echo "total $total links <br>\n";
        echo "execute $offset -> $next <br><br>\n";

        foreach ($objs as $obj) {
            $lid = $obj->get('lid');
            $cid_arr = &$this->_catlink_handler->get_cid_array_by_lid($lid);
            $save_obj = new LinkSave(WEBLINKS_DIRNAME);
            $save_obj->_vars = &$obj->_vars;
            $search = $save_obj->build_search($cid_arr);
            $this->_update_link($lid, $search);

            $msg = "$lid : $search";
            echo $this->_sanitize($this->_shorten_text($msg, 100)) . " ... <br>\n";
        }

        echo "<br>\n";

        // next
        if ($total > $next) {
            $submit = 'NEXT ' . $this->_LIMIT;
            echo $this->_form->build_lib_box_limit_offset(null, null, $this->_LIMIT, $next, 'rebuild', $submit);
        } else {
            echo '<h4>' . 'FINISH' . "</h4>\n";
        }
    }

    public function _update_link($lid, $search)
    {
        $sql = 'UPDATE ' . $this->_link_table . ' SET ';
        $sql .= 'search=' . $this->_link_handler->quote($search);
        $sql .= ' WHERE lid=' . (int)$lid;

        return $this->_link_handler->query($sql);
    }

    public function build_bread_crumb()
    {
        $arr = [
            [
                'name' => $this->_system->get_module_name(),
                'url' => 'index.php',
            ],
            [
                'name' => _HAPPYLINUX_CONF_TABLE_MANAGE,
                'url' => 'table_manage.php',
            ],
            [
                'name' => $this->_TITLE,
            ],
        ];

        return $this->_form->build_html_bread_crumb($arr);
    }

    // --- class end ---
}

//================================================================
// main
//================================================================
// hack for multi site
weblinks_admin_multi_disable_feature();

$manage = TableManageSearch::getInstance();

$op = $manage->get_post_op();

xoops_cp_header();

switch ($op) {
    case 'rebuild':
        $manage->rebuild_search();
        break;
    case 'menu':
    default:
        $manage->menu();
        break;
}

weblinks_admin_print_footer();
xoops_cp_footer();
exit(); // --- main end ---
