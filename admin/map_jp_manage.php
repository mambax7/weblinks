<?php

// $Id: map_jp_manage.php,v 1.1 2011/12/29 14:32:56 ohwada Exp $

// 2007-11-01 K.OHWADA
// weblinks_admin_print_footer()
// admin_header_config.php

//=========================================================
// WebLinks Module
// 2007-08-01 K.OHWADA
//=========================================================

include 'admin_header.php';
include 'admin_header_config.php';

include_once WEBLINKS_ROOT_PATH . '/class/weblinks_map_jp.php';

if (file_exists(WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/map_jp.php')) {
    include_once WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/map_jp.php';
} else {
    include_once WEBLINKS_ROOT_PATH . '/language/english/map_jp.php';
}

//=========================================================
// class admin_map_jp_manage
//=========================================================

/**
 * Class admin_map_jp_manage
 */
class admin_map_jp_manage extends happy_linux_error
{
    public $_category_handler;
    public $_config_handler;
    public $_map_jp;
    public $_header;
    public $_form;
    public $_post;

    public $_pref_array = [];

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        $this->_category_handler = weblinks_get_handler('category_basic', WEBLINKS_DIRNAME);
        $this->_config_handler = weblinks_get_handler('config2', WEBLINKS_DIRNAME);
        $this->_map_jp = weblinks_map_jp::getInstance(WEBLINKS_DIRNAME);
        $this->_header = weblinks_header::getInstance(WEBLINKS_DIRNAME);

        $this->_form = admin_map_jp_form::getInstance();
        $this->_post = happy_linux_post::getInstance();
    }

    /**
     * @return \admin_map_jp_manage|static
     */
    public static function getInstance()
    {
        static $instance;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

    //---------------------------------------------------------
    // post parameter
    //---------------------------------------------------------

    /**
     * @return string|string[]|null
     */
    public function get_post_op()
    {
        return $this->_post->get_post_text('op');
    }

    //---------------------------------------------------------
    // save
    //---------------------------------------------------------

    /**
     * @return string
     */
    public function save_map()
    {
        $pref_arr = $this->_post->get_post('pref');
        $name_arr = $this->_post->get_post('name');
        $cid_arr = $this->_post->get_post('cid');

        if (!is_array($pref_arr) || (0 == count($pref_arr))) {
            $msg = 'Error';

            return $msg;
        }

        $arr = [];
        $count = count($pref_arr);
        for ($i = 0; $i < $count; $i++) {
            $pref = $pref_arr[$i];
            $arr[$pref]['name'] = $name_arr[$i];
            $arr[$pref]['cid'] = $cid_arr[$i];
        }

        $ret = $this->_config_handler->update_by_name('map_jp_info', $arr);
        if (!$ret) {
            $this->_set_errors($this->_config_handler->getErrors());
        }

        if (!$this->returnExistError()) {
            $msg = "DB Error <br>\n";
            $msg .= $this->getErrors('s');

            return $msg;
        }

        redirect_header('map_jp_manage.php', 1, _HAPPY_LINUX_SAVED);
        exit();
    }

    //---------------------------------------------------------
    // print map
    //---------------------------------------------------------
    public function print_map()
    {
        $this->_category_handler->load_once();
        $pref = &$this->_map_jp->get_pref_count_array($this->_pref_array);
        echo $this->_map_jp->fetch_template($pref);
    }

    /**
     * @return bool
     */
    public function &set_pref_array()
    {
        // get from config
        $ret = true;
        $arr = &$this->_map_jp->get_conf_pref_array();

        // get from map_jp
        if (!is_array($arr) || !isset($arr['hokkaido'])) {
            $ret = false;
            $arr = &$this->_map_jp->get_label_pref_array();
        }

        $this->_pref_array = &$arr;

        return $ret;
    }

    //---------------------------------------------------------
    // form
    //---------------------------------------------------------
    public function print_form()
    {
        $this->_form->print_form($this->_pref_array);
    }

    /**
     * @return mixed
     */
    public function check_token()
    {
        $ret = $this->_form->check_token();

        return $ret;
    }

    //---------------------------------------------------------
    // header
    //---------------------------------------------------------
    public function print_header()
    {
        echo $this->_header->build_module_header_map_jp();
    }

    // --- class end ---
}

//=========================================================
// class admin_map_jp_manage
//=========================================================

/**
 * Class admin_map_jp_form
 */
class admin_map_jp_form extends happy_linux_form_lib
{
    public $_category_handler;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct();

        $this->_category_handler = weblinks_get_handler('category_basic', WEBLINKS_DIRNAME);
    }

    /**
     * @return \admin_map_jp_form|\happy_linux_form|\happy_linux_form_lib|\happy_linux_html|static
     */
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

    /**
     * @param $info_arr
     */
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
            $cid = $v['cid'];
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
        echo $this->build_html_input_submit('sumit', _HAPPY_LINUX_SAVE);
        echo '</td>';
        echo '</tr>' . "\n";

        echo $this->build_form_table_end();
        echo $this->build_form_end();
    }

    // --- class end ---
}

//=========================================================
// main
//=========================================================
$manage       = admin_map_jp_manage::getInstance();
$config_form  = admin_config_form::getInstance();
$config_store = admin_config_store::getInstance();

$op = $manage->get_post_op();
$error = '';

if ('save' == $op) {
    if (!$config_form->check_token()) {
        redirect_header('map_jp_manage.php', 5, 'Token Error');
        exit();
    }
    $ret = $config_store->save_config();
    if ($ret) {
        redirect_header('map_jp_manage.php', 1, _WLS_DBUPDATED);
    } else {
        $error = "DB Error <br>\n";
        $error .= $config_store->getErrors(1);
    }
} elseif ('save_map' == $op) {
    if (!($manage->check_token())) {
        redirect_header('map_jp_manage.php', 5, 'Token Error');
        exit();
    }

    $error = $manage->save_map();
}

xoops_cp_header();
$manage->print_header();
weblinks_admin_print_header();
weblinks_admin_print_menu();
echo '<h4>' . _AM_WEBLINKS_MAP_JP_MANAGE . "</h4>\n";
echo _AM_WEBLINKS_MAP_JP_MANAGE_DESC . "<br><br>\n";

$ret = $manage->set_pref_array();
if (!$ret) {
    xoops_error(_HAPPY_LINUX_FORM_INIT_NOT);
    echo "<br>\n";
}

if ($error) {
    $manage->print_error_in_div($error, false);
}

$manage->print_map();
echo "<br>\n";

$config_form->show_by_catid(31, _AM_WEBLINKS_MAP_JP_MANAGE);
echo "<br>\n";

$manage->print_form();

weblinks_admin_print_footer();
xoops_cp_footer();
exit();
