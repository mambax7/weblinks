<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: bulk_manage.php,v 1.3 2012/04/09 10:20:04 ohwada Exp $

// 2012-04-02 K.OHWADA
// use camma by \2c
// use \n in textarea1,2
// comment_handler
// rssc_add.php
// link_geocoding.php

// 2010-04-28 K.OHWADA
// $_FLAG_LINK_INSERT;

// 2008-03-04 K.OHWADA
// set time_publish

// 2007-12-24 K.OHWADA
// BUG : not set search field

// 2007-12-16 K.OHWADA
// build_selbox_top()
// BUG: cannot register in TOP when exist

// 2007-11-01 K.OHWADA
// weblinks_admin_print_footer()

// 2007-09-20 K.OHWADA
// Fatal error: Class 'weblinks_link_edit_base_handler' not found
// admin_header_link.php

// 2007-08-01 K.OHWADA
// add_link_optional

// 2007-05-18 K.OHWADA
// BUG: set 0 in comment_use

// 2007-03-25 K.OHWADA
// small change

// 2007-03-01 K.OHWADA
// hack for multi site

// 2006-10-12 K.OHWADA
// BUG 4318: cannot register bulk links.

// 2006-09-20 K.OHWADA
// use happy_linux
// use XoopsGTicket

// 2006-05-15 K.OHWADA
// new handler
// use token ticket

//=========================================================
// WebLinks Module
// 2006-05-15 K.OHWADA
//=========================================================

//=========================================================
// class BulkForm
//=========================================================
class BulkForm extends Happylinux\Form
{
    public $ROWS = 40;
    public $COLS = 80;

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
    // public
    //---------------------------------------------------------
    public function print_form_category($file, $selbox)
    {
        echo $this->_build_table_begin(_AM_WEBLINKS_BULK_CAT);

        // add category
        echo $this->build_form_begin('add_cat');
        echo $this->build_token();
        echo $this->build_html_input_hidden('op', 'add_cat');

        echo '&nbsp;' . _WLS_IN . '&nbsp;' . $selbox . "<br><br>\n";
        echo _AM_WEBLINKS_BULK_CAT_DSC1 . "<br>\n";
        echo _AM_WEBLINKS_BULK_CAT_DSC2 . "<br>\n";
        echo _AM_WEBLINKS_BULK_SAMPLE . "<br><br>\n";

        echo $this->build_html_textarea('catlist', '', $this->ROWS, $this->COLS);
        echo "<br>\n";
        echo $this->build_html_input_submit('submit', _ADD);
        echo $this->build_html_input_button_cancel('cancel', _BACK);
        echo $this->build_form_end();

        // view file
        $this->_print_view_file('view_cat', $file);

        echo $this->_build_table_end();
    }

    public function print_form_link($file)
    {
        $msg = _AM_WEBLINKS_BULK_LINK . ' ( ' . _AM_WEBLINKS_BULK_LINK_DSC10 . ' )';
        echo $this->_build_table_begin($msg);

        // add link
        echo $this->build_form_begin('add_link');
        echo $this->build_token();
        echo $this->build_html_input_hidden('op', 'add_link');

        echo _AM_WEBLINKS_BULK_LINK_DSC1 . "<br>\n";
        echo _AM_WEBLINKS_BULK_LINK_DSC2 . "<br>\n";
        echo _AM_WEBLINKS_BULK_LINK_DSC3 . "<br>\n";
        echo _AM_WEBLINKS_BULK_SAMPLE . "<br><br>\n";

        echo $this->build_html_textarea('linklist', '', $this->ROWS, $this->COLS);
        echo "<br>\n";
        echo $this->build_html_input_checkbox('check_url', 1, 'checked');
        echo _AM_WEBLINKS_BULK_CHECK_URL . "<br>\n";
        echo $this->build_html_input_checkbox('check_desc', 1, 'checked');
        echo _AM_WEBLINKS_BULK_CHECK_DESCRIPTION . "<br>\n";
        echo "<br>\n";
        echo $this->build_html_input_submit('submit', _ADD);
        echo $this->build_html_input_button_cancel('cancel', _BACK);
        echo $this->build_form_end();

        // view file
        $this->_print_view_file('view_link', $file);

        echo $this->_build_table_end();
    }

    public function print_form_link_optional($file)
    {
        $msg = _AM_WEBLINKS_BULK_LINK . ' ( ' . _AM_WEBLINKS_BULK_LINK_DSC20 . ' )';
        echo $this->_build_table_begin($msg);

        // add link
        echo $this->build_form_begin('add_link_optional');
        echo $this->build_token();
        echo $this->build_html_input_hidden('op', 'add_link_optional');

        echo _AM_WEBLINKS_BULK_LINK_DSC21 . "<br>\n";
        echo _AM_WEBLINKS_BULK_LINK_DSC23 . "<br><br>\n";
        echo _AM_WEBLINKS_BULK_LINK_DSC22 . "<br>\n";
        echo _AM_WEBLINKS_BULK_LINK_DSC1 . "<br>\n";
        echo _AM_WEBLINKS_BULK_LINK_DSC24 . "<br>\n";
        echo _AM_WEBLINKS_BULK_LINK_DSC3 . "<br><br>\n";
        echo _AM_WEBLINKS_BULK_SAMPLE . "<br><br>\n";

        echo $this->build_html_textarea('linklist', '', $this->ROWS, $this->COLS);
        echo "<br>\n";
        echo $this->build_html_input_checkbox('check_url', 1, 'checked');
        echo _AM_WEBLINKS_BULK_CHECK_URL . "<br>\n";
        echo $this->build_html_input_checkbox('check_desc', 1, 'checked');
        echo _AM_WEBLINKS_BULK_CHECK_DESCRIPTION . "<br>\n";
        echo "<br>\n";
        echo $this->build_html_input_submit('submit', _ADD);
        echo $this->build_html_input_button_cancel('cancel', _BACK);
        echo $this->build_form_end();

        // view file
        $this->_print_view_file('view_link', $file);

        echo $this->_build_table_end();
    }

    public function print_form_comment($file)
    {
        echo $this->_build_table_begin(_AM_WEBLINKS_BULK_COMMENT);

        // add category
        echo $this->build_form_begin('add_comment');
        echo $this->build_token();
        echo $this->build_html_input_hidden('op', 'add_comment');

        echo _AM_WEBLINKS_BULK_COMMENT_DSC1 . "<br>\n";
        echo _AM_WEBLINKS_BULK_SAMPLE . "<br><br>\n";

        echo $this->build_html_textarea('commentlist', '', $this->ROWS, $this->COLS);
        echo "<br>\n";
        echo $this->build_html_input_submit('submit', _ADD);
        echo $this->build_html_input_button_cancel('cancel', _BACK);
        echo $this->build_form_end();

        // view file
        $this->_print_view_file('view_comment', $file);

        echo $this->_build_table_end();
    }

    public function print_file_in_form($file, $rows = 40, $cols = 80)
    {
        echo "<form>\n";
        echo "<textarea rows='" . $rows . "' cols='" . $cols . "'>\n";

        readfile($file);

        echo "\n</textarea>\n";
        echo "</form>\n";
    }

    public function print_form_exec($file, $op, $button = '')
    {
        if (empty($button)) {
            $button = _HAPPYLINUX_EXECUTE;
        }

        echo $this->build_form_begin('add_link');
        echo $this->build_token();
        echo $this->build_html_input_hidden('op', $op);
        echo $this->build_html_input_hidden('file', $file);
        echo $this->build_html_input_submit('submit', $button);
        echo $this->build_html_input_button_cancel('cancel', _BACK);
    }

    //---------------------------------------------------------
    // private
    //---------------------------------------------------------
    public function _print_view_file($form_name, $file)
    {
        $action = '';
        $extra = 'target="_blank"';

        echo $this->build_form_begin($form_name, $action, 'post', '', $extra);
        echo $this->build_html_input_hidden('op', 'view');
        echo $this->build_html_input_hidden('file', $file);
        echo $this->build_html_input_submit('submit', _HAPPYLINUX_SAMPLE);
        echo $this->build_form_end();
    }

    public function _build_table_begin($title)
    {
        $text = "<table width='100%' border='0' cellspacing='1' class='outer'>\n";
        $text .= "<tr class='odd'><td>\n";
        $text .= $this->_build_html_title($title);

        return $text;
    }

    public function _build_table_end()
    {
        $text = "</td></tr></table><br>\n";

        return $text;
    }

    public function _build_html_title($title)
    {
        $text = "<h4>$title</h4>\n";

        return $text;
    }

    // --- class end ---
}
