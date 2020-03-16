<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: config_manage_6.php,v 1.2 2012/04/09 10:20:04 ohwada Exp $

// 2012-04-02 K.OHWADA
// ConfigForm6
// weblinks_webmap

// 2008-02-17 K.OHWADA
// print_kml_list()

// 2007-11-11 K.OHWADA
// move form_locate from config_manage_4.php
// weblinks_admin_print_footer()

// 2007-09-20 K.OHWADA
// admin_header_config.php

// 2007-08-01 K.OHWADA
// divid from config_manage_4.php

//=========================================================
// WebLinks Module
// 2006-10-05 K.OHWADA
//=========================================================


//================================================================
// class ConfigForm6
//================================================================
class ConfigForm6 extends Happylinux\ConfigForm
{
    public $_webmap_class;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct();

        $this->_webmap_class = Weblinks\Webmap::getInstance(WEBLINKS_DIRNAME);
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
    // webmap
    //---------------------------------------------------------
    public function print_webmap3_module_installed()
    {
        $webmap_dirname = $this->_webmap_class->get_webmap_dirname();

        if ($this->_webmap_class->check_installed()) {
            if ($this->_webmap_class->check_version()) {
                $msg = sprintf(_WEBLINKS_WEBMAP3_INSTALLED, $webmap_dirname, _C_WEBMAP3_VERSION);
                echo '<h4 style="color: #0000ff;">' . $msg . "</h4>\n";
            } else {
                $msg = sprintf(_WEBLINKS_WEBMAP3_REQUIRE, WEBLINKS_WEBMAP3_VERSION);
                xoops_error($msg);
            }
        } elseif ($webmap_dirname) {
            $msg = sprintf(_WEBLINKS_WEBMAP3_NOT_INSTALLED, $webmap_dirname);
            xoops_error($msg);
        }
    }

    public function webmap_init()
    {
        $ret = $this->_webmap_class->init_html();
        if (1 == $ret) {
            return true;
        }

        return false;
    }

    public function build_webmap_iframe()
    {
        return $this->_webmap_class->build_display_iframe();
    }

    //---------------------------------------------------------
    // kml
    //---------------------------------------------------------
    public function print_kml_list()
    {
        $link_handler = weblinks_get_handler('LinkBasic', WEBLINKS_DIRNAME);

        $kml_perpage = isset($_GET['kml_perpage']) ? (int)$_GET['kml_perpage'] : WEBLINKS_C_KML_PERPAGE;

        $total = $link_handler->get_count_gmap();
        $max_page = $link_handler->get_gmap_kml_page($total, $kml_perpage);

        echo '<a name="gm_kml_debug"></a>' . "\n";
        echo '<h4>' . _WEBLINKS_GM_KML_DEBUG . '</h4>' . "\n";
        printf(_WLS_THEREARE, $total);
        echo "<br><br>\n";

        echo '<form method="get">' . "\n";
        echo _WEBLINKS_KML_PERPAGE;
        echo ' <input type="text" name="kml_perpage" value="' . $kml_perpage . '" />' . "\n";
        echo ' <input type="submit" name="submit" value="' . _HAPPYLINUX_EXECUTE . '" />' . "\n";
        echo '</form>' . "\n";
        echo "<br>\n";

        for ($i = 1; $i <= $max_page; ++$i) {
            echo '<a href="build_kml.php?page=' . $i . '&amp;limit=' . $kml_perpage . '" target="_blank" >';
            echo '[page ' . $i . ']</a> ';
        }

        echo "<br>\n";
    }

    // --- class end ---
}
