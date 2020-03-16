<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: map_jp_manage.php,v 1.2 2007/11/11 03:22:59 ohwada Exp $

// 2007-11-01 K.OHWADA
// weblinks_admin_print_footer()
// admin_header_config.php

//=========================================================
// WebLinks Module
// 2007-08-01 K.OHWADA
//=========================================================

include 'admin_header.php';
include 'admin_header_config.php';

//include_once WEBLINKS_ROOT_PATH . '/class/weblinks_map_jp.php';

if (file_exists(WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/map_jp.php')) {
    include_once WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/map_jp.php';
} else {
    include_once WEBLINKS_ROOT_PATH . '/language/english/map_jp.php';
}

//=========================================================
// class MapManageJp
//=========================================================
class MapFormJp extends Happylinux\FormLib
{
    public $_category_handler;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct();

        $this->_category_handler = weblinks_get_handler('CategoryBasic', WEBLINKS_DIRNAME);
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
    // form
    //---------------------------------------------------------
    public function print_form($info_arr)
    {
        echo $this->build_form_begin('map_jp_form');
        echo $this->build_token();
        echo $this->build_html_input_hidden('op', 'save_map');
        echo $this->build_form_table_begin();

        echo '<tr>';
        echo '<th colspan="4">' . _AM_WEBLINKS_MAP_JP_MANAGE . '</th>';
        echo '</tr>' . "\n";

        echo '<tr>';
        echo '<td class="head">' . _AM_WEBLINKS_MAP_JP_LABEL . '</td>';
        echo '<td class="head">' . _AM_WEBLINKS_MAP_JP_PREF . '</td>';
        echo '<td class="head">' . _WLS_CATEGORYID . '</td>';
        echo '<td class="head">' . _WLS_CATEGORY . '</td>';
        echo '</tr>' . "\n";

        foreach ($info_arr as $k => $v) {
            $cid        = $v['cid'];
            $category_s = $this->_category_handler->get_title($cid, 's');

            echo '<tr>';
            echo '<td class="even">';
            echo $k;
            echo $this->build_html_input_hidden('pref[]', $k);
            echo '</td>';
            echo '<td class="odd">';
            echo $this->build_html_input_text('name[]', $v['name'], 10);
            echo '</td>';
            echo '<td class="odd">';
            echo $this->build_html_input_text('cid[]', $cid, 5);
            echo '</td>';
            echo '<td class="odd">';
            echo $category_s;
            echo '</td>';
            echo '</tr>' . "\n";
        }

        echo '<tr>';
        echo '<td class="foot"></td>';
        echo '<td class="foot" colspan="3" >';
        echo $this->build_html_input_submit('sumit', _HAPPYLINUX_SAVE);
        echo '</td>';
        echo '</tr>' . "\n";

        echo $this->build_form_table_end();
        echo $this->build_form_end();
    }

    // --- class end ---
}
