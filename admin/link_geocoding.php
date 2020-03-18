<?php

// $Id: link_geocoding.php,v 1.2 2012/04/10 11:24:42 ohwada Exp $

//================================================================
// WebLinks Module
// 2012-04-02 K.OHWADA
//================================================================

include 'admin_header.php';
include 'admin_header_list.php';

include_once WEBLINKS_ROOT_PATH . '/class/weblinks_address.php';

//=========================================================
// class admin_manage_geocoding
//=========================================================

/**
 * Class admin_manage_geocoding
 */
class admin_manage_geocoding extends happy_linux_manage
{
    public $_latitude_list;
    public $_longitude_list;

    public $_ZOOM_DEFAULT = 12;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------

    /**
     * admin_manage_geocoding constructor.
     * @param $dirname
     */
    public function __construct($dirname)
    {
        parent::__construct($dirname);

        $this->set_handler('link', $dirname, 'weblinks');
        $this->set_id_name('lid');
        $this->set_list_id_name('link_geocoding_id');
        $this->set_script('link_geocoding.php');
        $this->set_form_class('happy_linux_form');
        $this->set_flag_execute_time(true);
    }

    /**
     * @param null $dirname
     * @return \admin_manage_geocoding|\happy_linux_manage|static
     */
    public static function getInstance($dirname = null)
    {
        static $instance;
        if (null === $instance) {
            $instance = new static($dirname);
        }

        return $instance;
    }

    //---------------------------------------------------------
    // POST param
    //---------------------------------------------------------

    /**
     * @return string
     */
    public function get_op()
    {
        $op = 'list';
        if (isset($_POST['mod_all'])) {
            $op = 'mod_all';
        }

        return $op;
    }

    //---------------------------------------------------------
    // main_mod_all()
    //---------------------------------------------------------
    public function main_mod_all()
    {
        $this->_latitude_list = $this->_post->get_post('latitude_list');
        $this->_longitude_list = $this->_post->get_post('longitude_list');
        $request = $this->_post->get_post('request_uri');

        if ($request) {
            $this->set_redirect_mod_all($request);
        }

        $this->_main_mod_all(true);
    }

    /**
     * @return mixed
     */
    public function &_get_obj_mod_all()
    {
        $id = $this->_id;
        if (0 == $id) {
            return $this->_obj;
        }

        if (!isset($this->_latitude_list[$id])) {
            return $this->_obj;
        }
        if (!isset($this->_longitude_list[$id])) {
            return $this->_obj;
        }

        $this->_obj->setVar('gm_latitude', $this->_latitude_list[$id]);
        $this->_obj->setVar('gm_longitude', $this->_longitude_list[$id]);
        $this->_obj->setVar('gm_zoom', $this->_ZOOM_DEFAULT);

        return $this->_obj;
    }

    // --- class end ---
}

//=========================================================
// class admin_list_geocoding
//=========================================================

/**
 * Class admin_list_geocoding
 */
class admin_list_geocoding extends happy_linux_page_frame
{
    public $_api_class;
    public $_system_class;
    public $_locate_clas;

    public $_flag_webmap = false;
    public $_conf;

    public $_DIRNAME;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------

    /**
     * admin_list_geocoding constructor.
     * @param $dirname
     */
    public function __construct($dirname)
    {
        $this->_DIRNAME = $dirname;

        parent::__construct();

        $this->set_handler('link', $dirname, 'weblinks');
        $this->set_id_name('lid');
        $this->set_max_sortid(1);
        $this->set_lang_no_item(_WEBLINKS_NO_LINK);
        $this->set_flag_execute_time(true);

        $this->set_flag_form(true);
        $this->set_form_name('link_geocoding');
        $this->set_action('link_geocoding.php');
        $this->set_operation('mod_all');
        $this->set_submit_colspan(1, 4, 4);
        $this->set_flag_print_request_uri(true);

        $this->_system_class = happy_linux_system::getInstance();

        $config_handler = weblinks_get_handler('config2_basic', $dirname);
        $config_handler->init();
        $this->_conf = $config_handler->get_conf();
    }

    /**
     * @param null $dirname
     * @return \admin_list_geocoding|\happy_linux_form|\happy_linux_html|\happy_linux_page_frame|static
     */
    public static function getInstance($dirname = null)
    {
        static $instance;
        if (null === $instance) {
            $instance = new static($dirname);
        }

        return $instance;
    }

    //---------------------------------------------------------
    // init
    //---------------------------------------------------------
    public function _init()
    {
        $this->_init_locate();
        $this->_init_api();
    }

    public function _init_locate()
    {
        $address_class = weblinks_address::getInstance($this->_DIRNAME);
        $this->_locate_class = &$address_class->get_instance_locate();
    }

    public function _init_api()
    {
        $webmap_dirname = $this->_conf['webmap3_dirname'];
        if ('' == $webmap_dirname) {
            return;
        }
        if ('-' == $webmap_dirname) {
            return;
        }
        if ('---' == $webmap_dirname) {
            return;
        }

        $file = XOOPS_ROOT_PATH . '/modules/' . $webmap_dirname . '/include/api.php';
        if (!file_exists($file)) {
            return;
        }

        include_once $file;
        if (!class_exists('webmap3_api_geocoding')) {
            return;
        }

        $this->_flag_webmap = true;
        $this->_api_class = webmap3_api_geocoding::getSingleton($webmap_dirname);
    }

    //---------------------------------------------------------
    // handler
    //---------------------------------------------------------

    /**
     * @return array|string[]
     */
    public function &_get_table_header()
    {
        $arr = [
            _WLS_LINKID,
            _WLS_SITETITLE,
            _WLS_STATE,
            _WLS_ADDR,
            _WLS_CITY,
            $this->build_form_js_checkall(),
            _AM_WEBLINKS_SEARCHED_ADDRESS,
            _WEBLINKS_GM_LATITUDE,
            _WEBLINKS_GM_LONGITUDE,
        ];

        return $arr;
    }

    /**
     * @param int $limit
     * @param int $start
     * @return bool
     */
    public function _get_items($limit = 0, $start = 0)
    {
        return $this->_handler->get_objects_all($limit, $start);
    }

    /**
     * @param $obj
     * @return array
     */
    public function &_get_cols($obj)
    {
        $lid = $obj->getVar('lid', 'n');
        $title = $obj->getVar('title', 'n');
        $state = $obj->getVar('state', 'n');
        $city = $obj->getVar('city', 'n');
        $addr = $obj->getVar('addr', 'n');
        $latitude = $obj->getVar('gm_latitude', 'n');
        $longitude = $obj->getVar('gm_longitude', 'n');
        $zoom = $obj->getVar('gm_zoom', 'n');

        $jump_link = 'link_manage.php?op=mod_form&lid=';
        $link_link = $this->_build_page_id_link_by_obj(
            $obj,
            'lid',
            $jump_link,
            '',
            '_blank'
        );

        $result = '-';
        $style = '';
        $checkbox = '-';

        if (0 == $zoom) {
            $search = $this->_locate_class->build_address($state, $city, $addr);

            if ($search) {
                $p = $this->fetch($search);

                if (is_array($p)) {
                    $checkbox = $this->build_form_js_checkbox($lid);
                    $result = $p['address'];
                    $latitude = $p['latitude'];
                    $longitude = $p['longitude'];
                    $style = 'color:#0000ff;';
                } else {
                    $result = 'NOT search';
                    $latitude = '-';
                    $longitude = '-';
                    $style = 'color:#ff0000;';
                }
            }
        }

        $disp_result = '<span style="' . $style . '">' . $result . '</span>';
        $disp_lat = '<span style="' . $style . '">' . $latitude . '</span>';
        $disp_lng = '<span style="' . $style . '">' . $longitude . '</span>';

        $name_lat = 'latitude_list[' . $lid . ']';
        $name_lng = 'longitude_list[' . $lid . ']';

        $disp_lat .= $this->build_html_input_hidden($name_lat, $latitude);
        $disp_lng .= $this->build_html_input_hidden($name_lng, $longitude);

        $arr = [
            $link_link,
            $this->sanitize_text($title),
            $this->sanitize_text($state),
            $this->sanitize_text($city),
            $this->sanitize_text($addr),
            $checkbox,
            $disp_result,
            $disp_lat,
            $disp_lng,
        ];

        return $arr;
    }

    /**
     * @param $address
     * @return array|bool
     */
    public function fetch($address)
    {
        if (!$this->_flag_webmap) {
            return false;
        }

        $this->_api_class->set_search_address($address);
        $ret = $this->_api_class->fetch();
        if (!$ret) {
            return false;
        }

        $results = $this->_api_class->get_results();
        if (!is_array($results) || !count($results)) {
            return false;
        }

        $arr = [
            'address' => $results[0]['formatted_address'],
            'latitude' => $results[0]['lat'],
            'longitude' => $results[0]['lng'],
        ];

        return $arr;
    }

    //---------------------------------------------------------
    // print
    //---------------------------------------------------------
    public function _print_top()
    {
        $paths = [];
        $paths[] = [
            'name' => $this->_system_class->get_module_name(),
            'url' => 'index.php',
        ];
        $paths[] = [
            'name' => _WEBLINKS_ADMIN_LINK_LIST,
            'url' => 'link_list.php',
        ];
        $paths[] = [
            'name' => _AM_WEBLINKS_TITLE_LINK_GEOCODING,
        ];

        echo $this->build_html_bread_crumb($paths);
        echo '<h4>' . _AM_WEBLINKS_TITLE_LINK_GEOCODING . "</h4>\n";
        echo _AM_WEBLINKS_TITLE_LINK_GEOCODING_DSC;
        echo "<br><br>\n";
        printf(_WLS_THEREARE, $this->_total_all);
        echo "<br><br>\n";
    }

    //---------------------------------------------------------
    // form
    //---------------------------------------------------------

    /**
     * @param int $colspan1
     * @param int $colspan2
     * @param int $colspan3
     * @return string
     */
    public function _build_page_submit($colspan1, $colspan2, $colspan3)
    {
        $text = '<tr>';
        $text .= $this->_build_page_col_submit_null($colspan1);
        $text .= $this->_build_page_col_submit_next($colspan2);
        $text .= $this->_build_page_col_submit_add($colspan3);

        return $text;
    }

    /**
     * @param $colspan
     * @return string
     */
    public function _build_page_col_submit_next($colspan)
    {
        $lang_next = '[' . _AM_WEBLINKS_GOTO_NEXT_PAGE . ']';
        $lang_last = '[' . _AM_WEBLINKS_LAST_PAGE . ']';

        $page = $this->get_page_current();
        $last = $this->get_page_last();
        $next = $page + 1;
        $url = $this->_ACTION . '?page=' . $next;

        if ($next > $last) {
            $str = $lang_last;
        } else {
            $str = $this->build_html_a_href_name($url, $lang_next);
        }

        $text = $this->build_html_td_tag_begin($this->_SUBMIT_ALIGN, $this->_SUBMIT_VALIGN, $colspan, $this->_SUBMIT_ROWSPAN, $this->_SUBMIT_CLASS);
        $text .= $str;
        $text .= $this->build_html_td_tag_end();

        return $text;
    }

    /**
     * @param $colspan
     * @return string
     */
    public function _build_page_col_submit_add($colspan)
    {
        $text = $this->build_html_td_tag_begin($this->_SUBMIT_ALIGN, $this->_SUBMIT_VALIGN, $colspan, $this->_SUBMIT_ROWSPAN, $this->_SUBMIT_CLASS);
        $text .= $this->build_html_input_submit('mod_all', _ADD);
        $text .= $this->build_html_td_tag_end();

        return $text;
    }

    //---------------------------------------------------------
    // script
    //---------------------------------------------------------

    /**
     * @return string
     */
    public function _get_script()
    {
        return xoops_getenv('PHP_SELF');
    }

    // --- class end ---
}

//=========================================================
// main
//=========================================================
$manage = admin_manage_geocoding::getInstance(WEBLINKS_DIRNAME);
$list   = admin_list_geocoding::getInstance(WEBLINKS_DIRNAME);

$op = $manage->get_op();
switch ($op) {
    case 'mod_all':
        $manage->main_mod_all();
        break;
    default:
        xoops_cp_header();
        $list->_show();
        xoops_cp_footer();
        break;
}

exit();
// --- end of main ---
