<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: table_manage_zombie_class.php,v 1.2 2007/11/26 05:36:10 ohwada Exp $

// 2007-11-24 K.OHWADA
// divid from table_manage.php

// 2007-11-01 K.OHWADA
// weblinks_admin_print_footer()

// 2007-10-10 K.OHWADA
// xoops block table

// 2007-02-20 K.OHWADA
// hack for multi site
// show_clean_xml()

// 2006-09-20 K.OHWADA
// use happy_linux

// 2006-05-15 K.OHWADA
// use weblinks_db_basic_base

// 2005-10-14 K.OHWADA
// corresponding to too many links

//================================================================
// WebLinks Module
// check table validation
// 2005-01-20 K.OHWADA
//================================================================

//=========================================================
// class TableManageZombieForm
//=========================================================
class TableManageZombieForm extends Happylinux\FormLib
{
    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct();
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
    // show form
    //---------------------------------------------------------
    public function show_zombie_start($title, $action)
    {
        echo "When there are many links, timeout may occure.<br>\n";
        echo 'Plaese set limit, and start at "check lid of link in catlink table"' . "<br>\n";
        echo "limit = 0 means unlimitd<br>\n";
        echo "<br>\n";

        $opt = [
            'CHECK ALL'                              => 'check_all',
            'check lid of link in catlink table'     => 'check_link_in_catlink',
            'check cid of category in catlink table' => 'check_cat_in_catlink',
            'check lid of catlink in link table'     => 'check_catlink_in_link',
            'check cid of catlink in cattgory table' => 'check_catlink_in_cat',
        ];

        // form start
        echo $this->build_form_begin('weblinks_zombie', $action);
        echo $this->build_token();
        echo $this->build_html_input_hidden('offset', 0);

        echo $this->build_form_table_begin();
        echo $this->build_form_table_title($title);

        $ele_op = $this->build_html_input_radio_select('op', 'check_all', $opt, "<br>\n");
        echo $this->build_form_table_line('op', $ele_op);

        $ele_limit = $this->build_html_input_text('limit', 0);
        echo $this->build_form_table_line('limit', $ele_limit);

        $ele_submit = $this->build_html_input_submit('submit', _HAPPYLINUX_EXECUTE);
        echo $this->build_form_table_line('', $ele_submit, 'foot', 'foot');

        echo $this->build_form_table_end();
        echo $this->build_form_end();
        // --- form end ---
    }

    // --- class end ---
}

?>
