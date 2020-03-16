<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: weblinks180_to_rssc070.php,v 1.2 2007/12/08 22:48:05 ohwada Exp $

// 2007-12-09 K.OHWADA
// BUG : Fatal error: Class 'happy_linux_rss_parser'

// 2007-10-10 K.OHWADA
// v1.80

// 2006-09-20 K.OHWADA
// this is new file
// use rssc WEBLINKS_RSSC_EXIST

//================================================================
// WebLinks Module
// 2006-09-20 K.OHWADA
//================================================================

include 'admin_header.php';

// BUG : Fatal error: Class 'happy_linux_rss_parser'
if (WEBLINKS_RSSC_USE) {
    include_once WEBLINKS_RSSC_ROOT_PATH . '/api/refresh.php';
}

//=========================================================
// class ExportWeblinks180ToRssc070
//=========================================================
class ExportWeblinks180ToRssc070 extends Happylinux\Error
{
    public $_LIMIT = 100;

    public $_system;
    public $_post;

    public $_weblinks_config_handler;
    public $_weblinks_link_handler;
    public $_weblinks_atomfeed_handler;

    // rssc handler
    public $_rssc_import_handler;

    // conf
    public $_conf_rss_site_arr;
    public $_conf_rss_black_arr;
    public $_conf_rss_white_arr;

    // post
    public $_op;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct();

        $this->_system = Happylinux\System::getInstance();
        $this->_post = Happylinux\Post::getInstance();

        $this->_weblinks_config_handler = weblinks_get_handler('Config2Basic', WEBLINKS_DIRNAME);
        $this->_weblinks_link_handler = weblinks_get_handler('Link', WEBLINKS_DIRNAME);
        $this->_weblinks_atomfeed_handler = handler('Atomfeed', WEBLINKS_DIRNAME);

        $conf = $this->_weblinks_config_handler->get_conf();
        $this->_conf_rss_site_arr = $conf['rss_site_arr'];
        $this->_conf_rss_black_arr = $conf['rss_black_arr'];
        $this->_conf_rss_white_arr = $conf['rss_white_arr'];

        if (WEBLINKS_RSSC_EXIST) {
            $this->_rssc_import_handler = rssc_get_handler('import', WEBLINKS_RSSC_DIRNAME);
            $this->_rssc_import_handler->set_mid_orig($this->_system->get_mid());
            $this->_rssc_import_handler->set_limit($this->_LIMIT);
        }
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
    // POST param
    //---------------------------------------------------------
    public function get_post_op()
    {
        $this->_op = $this->_post->get_post_get('op');

        return $this->_op;
    }

    //---------------------------------------------------------
    // menu
    //---------------------------------------------------------
    public function menu()
    {
        ?>
        <br>
        There are 5 steps. <br>
        1. export rss site to link table <br>
        2. export to black list <br>
        3. export to white list <br>
        4. export to link table <br>
        5. export to feed table <br>
        excute each <?php echo $this->_LIMIT; ?> records at a time <br>
        <br>
        <?php

        $this->_form_site();
    }

    //---------------------------------------------------------
    // export_site
    //---------------------------------------------------------
    public function export_site()
    {
        echo "<h4>STEP 1: export rss site to link table </h4>\n";

        $offset = $this->_rssc_get_post_offset();

        // weblinks list
        $site_list = $this->_conf_rss_site_arr;
        $total = count($site_list);

        echo 'There are <b>' . $total . "</b> rss site in weblinks<br><br>\n";

        $this->_rssc_clear_num();

        foreach ($site_list as $site_url) {
            $this->_rssc_import_handler->import_site_weblinks($site_url);
        }

        $this->_form_black();
    }

    //---------------------------------------------------------
    // export_black
    //---------------------------------------------------------
    public function export_black()
    {
        echo "<h4>STEP 2: export to block list</h4>\n";

        $offset = $this->_rssc_get_post_offset();

        // weblinks list
        $site_list = $this->_conf_rss_black_arr;
        $total = count($site_list);

        echo 'There are <b>' . $total . "</b> black list in weblinks<br><br>\n";

        $this->_rssc_clear_num();

        foreach ($site_list as $site_url) {
            $this->_rssc_import_handler->import_black_weblinks($site_url);
        }

        $this->_form_white();
    }

    //---------------------------------------------------------
    // export_white
    //---------------------------------------------------------
    public function export_white()
    {
        echo "<h4>STEP 3: export to white list</h4>\n";

        $offset = $this->_rssc_get_post_offset();

        // weblinks list
        $site_list = $this->_conf_rss_white_arr;
        $total = count($site_list);

        echo 'There are <b>' . $total . "</b> white list in weblinks<br><br>\n";

        $this->_rssc_clear_num();

        foreach ($site_list as $site_url) {
            $this->_rssc_import_handler->import_white_weblinks($site_url);
        }

        $this->_form_link();
    }

    //---------------------------------------------------------
    // export_link
    //---------------------------------------------------------
    public function export_link()
    {
        echo "<h4>STEP 4: export to link table</h4>\n";

        $total = $this->_weblinks_link_handler->get_count_rss_flag_prev_ver();
        $offset = $this->_rssc_get_post_offset();
        $next = $this->_rssc_calc_next($total);

        echo 'There are <b>' . $total . "</b> rss links in weblinks<br>\n";
        echo 'Transfer ' . $offset . ' - ' . $next . " record <br><br>\n";

        $weblinks_link_objs = &$this->_weblinks_link_handler->get_objects_rss_flag_prev_ver($this->_LIMIT, $offset);
        foreach ($weblinks_link_objs as $obj) {
            $weblinks_lid = $obj->get('lid');
            $rssc_lid = $this->_rssc_import_handler->import_link_weblinks($obj);

            // weblinks link table
            if ($rssc_lid) {
                $this->_weblinks_link_handler->update_rssc_lid($weblinks_lid, $rssc_lid);
            }
        }

        if ($total > $next) {
            $this->_form_link($next);
        } else {
            $this->_form_feed();
        }
    }

    //---------------------------------------------------------
    // export_feed
    //---------------------------------------------------------
    public function export_feed()
    {
        echo "<h4>STEP 5: export to feed table</h4>\n";

        $total = $this->_weblinks_atomfeed_handler->getCount();
        $offset = $this->_rssc_get_post_offset();
        $next = $this->_rssc_calc_next($total);

        echo 'There are <b>' . $total . "</b> feeds in weblinks<br>\n";
        echo 'Transfer ' . $offset . ' - ' . $next . " record <br><br>\n";

        $weblinks_atomfeed_objs = &$this->_weblinks_atomfeed_handler->get_objects_asc($this->_LIMIT, $offset);

        $this->_rssc_set_lid_list();

        foreach ($weblinks_atomfeed_objs as $obj) {
            $this->_rssc_import_handler->import_feed_weblinks($obj);
        }

        if ($total > $next) {
            $this->_form_feed($next);
        } else {
            $this->_print_finish();
        }
    }

    //---------------------------------------------------------
    // print form
    //---------------------------------------------------------
    public function _print_finish()
    {
        echo "<br><hr>\n";
        echo "<h4>FINISHED</h4>\n";
        echo "<a href='index.php'>GOTO Admin Menu</a><br>\n";
    }

    public function _form_site()
    {
        $title = 'STEP 1 : export rss site to link table';
        $op = 'export_site';
        $submit = 'GO STEP 1';

        $this->_print_form_next($title, $op, $submit);
    }

    public function _form_black()
    {
        $title = 'STEP 2 : export to black list';
        $op = 'export_black';
        $submit = 'GO STEP 2';

        $this->_print_form_next($title, $op, $submit);
    }

    public function _form_white()
    {
        $title = 'STEP 3 : export to white list';
        $op = 'export_white';
        $submit = 'GO STEP 3';

        $this->_print_form_next($title, $op, $submit);
    }

    public function _form_link($offset = 0)
    {
        $title = 'STEP 4 : export to link table';
        $op = 'export_link';

        if ($offset) {
            $submit = 'GO next ' . $this->_LIMIT . ' links';
        } else {
            $submit = 'GO STEP 4';
        }

        $this->_print_form_next($title, $op, $submit, $offset);
    }

    public function _form_feed($offset = 0)
    {
        $title = 'STEP 5 : export to feed table';
        $op = 'export_feed';

        if ($offset) {
            $submit = 'GO next ' . $this->_LIMIT . ' feeds';
        } else {
            $submit = 'GO STEP 5';
        }

        $this->_print_form_next($title, $op, $submit, $offset);
    }

    //---------------------------------------------------------
    // rssc_import_handler
    //---------------------------------------------------------
    public function _rssc_get_post_offset()
    {
        return $this->_rssc_import_handler->get_post_offset();
    }

    public function _rssc_clear_num()
    {
        $this->_rssc_import_handler->clear_num();
    }

    public function _rssc_calc_next($total = null)
    {
        return $this->_rssc_import_handler->calc_next($total);
    }

    public function _rssc_set_lid_list()
    {
        $this->_rssc_import_handler->set_lid_list();
    }

    public function _print_form_next($title, $op, $submit, $offset = 0)
    {
        echo $this->_rssc_import_handler->build_form_next($title, $op, $submit, $offset, 'Export');
    }

    public function check_token()
    {
        return $this->_rssc_import_handler->check_token();
    }

    // --- class end ---
}

//=========================================================
// main
//=========================================================

xoops_cp_header();

weblinks_admin_print_bread(_AM_WEBLINKS_EXPORT_MANAGE, 'export_manage.php', 'rssc');
echo '<h3>' . 'Export to RSSC module' . "</h3>\n";
echo 'Export DB weblinks ' . WEBLINKS_VERSION . ' to rssc ' . WEBLINKS_RSSC_VERSION . " <br><br>\n";

if (WEBLINKS_RSSC_EXIST) {
    // check rssc version
    if (RSSC_VERSION < WEBLINKS_RSSC_VERSION) {
        $msg = sprintf(_WEBLINKS_RSSC_REQUIRE, WEBLINKS_RSSC_VERSION);
        xoops_error($msg);
        xoops_cp_footer();
        exit();
    }
    $msg = sprintf(_WEBLINKS_RSSC_INSTALLED, WEBLINKS_RSSC_DIRNAME, RSSC_VERSION);
    echo '<h4 style="color: #0000ff;">' . $msg . "</h4>\n";
} else {
    $msg = sprintf(_WEBLINKS_RSSC_NOT_INSTALLED, WEBLINKS_RSSC_DIRNAME);
    xoops_error($msg);
    xoops_cp_footer();
    exit();
}

$export = ExportWeblinks180ToRssc070::getInstance();
$op = 'main';
if (isset($_POST['op'])) {
    $op = $_POST['op'];
}

switch ($op) {
    case 'export_site':
        if (!$export->check_token()) {
            xoops_error('Token Error');
        } else {
            $export->export_site();
        }
        break;
    case 'export_black':
        if (!$export->check_token()) {
            xoops_error('Token Error');
        } else {
            $export->export_black();
        }
        break;
    case 'export_white':
        if (!$export->check_token()) {
            xoops_error('Token Error');
        } else {
            $export->export_white();
        }
        break;
    case 'export_link':
        if (!$export->check_token()) {
            xoops_error('Token Error');
        } else {
            $export->export_link();
        }
        break;
    case 'export_feed':
        if (!$export->check_token()) {
            xoops_error('Token Error');
        } else {
            $export->export_feed();
        }
        break;
    case 'menu':
    default:
        $export->menu();
        break;
}

xoops_cp_footer();
exit();

?>
