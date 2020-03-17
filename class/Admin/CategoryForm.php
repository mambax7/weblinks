<?php

namespace XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: category_manage.php,v 1.3 2012/04/10 18:52:29 ohwada Exp $

// 2012-04-02 K.OHWADA
// weblinks_webmap

// 2007-12-16 K.OHWADA
// build_selbox_top()

// 2007-11-01 K.OHWADA
// link_vote_del_handler
// set_flag_execute_time()

// 2007-09-20 K.OHWADA
// admin_header_link.php
// banner_handler

// 2007-09-01 K.OHWADA
// link_edit_handler -> link_edit_base_handler

// 2007-08-01 K.OHWADA
// weblinks_gmap

// 2007-06-10 K.OHWADA
// link_catlink_basic_handler
// get_options_for_cat_forum()

// 2007-05-12 K.OHWADA
// Notice [PHP]: Use of undefined constant imgurl

// 2007-04-08 K.OHWADA
// gm_type, description

// 2007-04-02 K.OHWADA
// Fatal error: Call to undefined function: print_warnig()
// Fatal error: Call to undefined function: _get_image_size()

// 2007-03-25 K.OHWADA
// update_image_size()
// remove del_cat() in CategoryForm

// 2007-02-20 K.OHWADA
// hack for multi site
// add forum_id field, etc
// update_path()

// 2006-11-18 K.OHWADA
// small change _save()

// 2006-09-20 K.OHWADA
// use happy_linux
// use XoopsGTicket

// 2006-09-18 K.OHWADA
// support xoops protector

// 2006-05-15 K.OHWADA
// new handler
// add class CategoryManage
// use token ticket

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//=========================================================
// WebLinks Module
// admin category manage
// 2004/01/14 K.OHWADA
//=========================================================


//=========================================================
// class CategoryForm
//=========================================================
class CategoryForm extends Happylinux\Form
{
    public $_handler;
    public $_config_handle;
    public $_plugin;
    public $_header;
    public $_webmap_class;

    public $_flag_webmap = false;

    // hack for multi site
    public $_flag_show_aux_int_1 = false;
    public $_flag_show_aux_int_2 = false;
    public $_flag_show_aux_text_1 = false;
    public $_flag_show_aux_text_2 = false;
    public $_aux_text_1 = _WEBLINKS_CAT_AUX_TEXT_1;
    public $_aux_text_2 = _WEBLINKS_CAT_AUX_TEXT_2;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct();

        $this->_handler = weblinks_get_handler('Category', WEBLINKS_DIRNAME);
        $this->_config_handler = weblinks_get_handler('Config2Basic', WEBLINKS_DIRNAME);
        $this->_plugin = Weblinks\Plugin::getInstance(WEBLINKS_DIRNAME);
        $this->_header = Weblinks\Header::getInstance(WEBLINKS_DIRNAME);
        $this->_webmap_class = Weblinks\Webmap::getInstance(WEBLINKS_DIRNAME);

        // hack for multi site
        if (weblinks_multi_is_japanese_site()) {
            $this->_flag_show_aux_text_1 = true;
            $this->_aux_text_1 = _WEBLINKS_CAT_TITLE_JP;
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
    // show category
    //---------------------------------------------------------
    public function _show($obj, $extra = null, $show_mode = 0)
    {
        $cid = $obj->getVar('cid', 'e');

        echo $this->_header->build_module_header_submit();

        $ret = $this->_webmap_class->init_form();
        if (1 == $ret) {
            $this->_flag_webmap = true;
            $this->_webmap_class->set_cid($cid);
            $this->_webmap_class->set_display_url();
            echo $this->_webmap_class->get_form_js(false);
        } elseif (-1 == $ret) {
            xoops_error($this->_webmap_class->get_init_error());
        }

        switch ($show_mode) {
            case HAPPYLINUX_MODE_MOD:
            case HAPPYLINUX_MODE_MOD_PREVIEW:
                $show_mode = HAPPYLINUX_MODE_MOD;
                $form_title = _WLS_MODCAT;
                $op = 'mod_table';
                $button_val = _WLS_MODIFY;
                break;
            case HAPPYLINUX_MODE_ADD:
            case HAPPYLINUX_MODE_ADD_PREVIEW:
            default:
                $form_title = _AM_WEBLINKS_ADD_CATEGORY;
                $op = 'add_table';
                $button_val = _WLS_ADD;
                break;
        }

        $this->set_obj($obj);

        $selbox = $this->_handler->build_selbox_top($obj->get('pid'), 1, 'pid', '');

        $forum_opt = $this->_plugin->get_options_for_cat_forum();
        $forum_sel = $this->build_html_select('forum_id', $obj->get('forum_id'), $forum_opt);
        $forum_dirname = $this->_config_handler->get_module_name('cat_forum_dirname');
        if ($forum_dirname) {
            $forum_sel .= ' in ' . $forum_dirname;
        }

        $album_opt = $this->_plugin->get_options_for_cat_album();
        $album_sel = $this->build_html_select('album_id', $obj->get('album_id'), $album_opt);
        $album_dirname = $this->_config_handler->get_module_name('cat_album_dirname');
        if ($album_dirname) {
            $album_sel .= ' in ' . $album_dirname;
        }

        $desc = $this->_build_cat_desc($obj);
        $desc_opt = $this->_build_cat_desc_opt($obj);

        echo $this->build_form_begin('modCat');
        echo $this->build_token();
        echo $this->build_html_input_hidden('op', $op);
        echo $this->build_html_input_hidden('cid', $cid);
        echo $this->build_form_table_begin();
        echo $this->build_form_table_title($form_title);

        if (HAPPYLINUX_MODE_MOD == $show_mode) {
            echo $this->build_form_table_line(_WLS_CATEGORYID, '<b>' . $cid . '</b>');
        }

        echo $this->build_obj_table_text(_WLS_TITLEC, 'title');
        echo $this->_build_cat_lflag($obj->getVar('lflag'));
        echo $this->build_obj_table_text(_WEBLINKS_CAT_ORDER, 'orders');
        echo $this->build_form_table_line(_WLS_PARENT, $selbox);
        echo $this->build_form_table_line(_WEBLINKS_FORUM_SEL, $forum_sel);
        echo $this->build_form_table_line(_WEBLINKS_ALBUM_SEL, $album_sel);

        if ($this->_flag_webmap) {
            echo $this->_build_cat_gm_mode();
            echo $this->build_form_table_line('', $this->_webmap_class->build_form_desc());
            echo $this->_build_cat_gm();
            echo $this->_build_cat_gm_location();
            echo $this->build_obj_table_text(_WEBLINKS_GM_LATITUDE, 'gm_latitude');
            echo $this->build_obj_table_text(_WEBLINKS_GM_LONGITUDE, 'gm_longitude');
            echo $this->build_obj_table_text(_WEBLINKS_GM_ZOOM, 'gm_zoom');
            echo $this->_build_cat_gm_type();
            echo $this->_build_cat_gm_icon();
        }

        echo $this->build_form_table_line(_WLS_DESCRIPTION, $desc);
        echo $this->build_form_table_line(_WEBLINKS_OPTIONS, $desc_opt);
        echo $this->_build_cat_imgurl($obj);

        if ($this->_flag_show_aux_int_1) {
            echo $this->build_obj_table_text(_WEBLINKS_CAT_AUX_INT_1, 'aux_int_1');
        }

        if ($this->_flag_show_aux_int_2) {
            echo $this->build_obj_table_text(_WEBLINKS_CAT_AUX_INT_2, 'aux_int_2');
        }

        if ($this->_flag_show_aux_text_1) {
            echo $this->build_obj_table_text($this->_aux_text_1, 'aux_text_1');
        }

        if ($this->_flag_show_aux_text_2) {
            echo $this->build_obj_table_text($this->_aux_text_1, 'aux_text_2');
        }

        $button = $this->build_html_input_submit('post', $button_val);
        if (HAPPYLINUX_MODE_MOD == $show_mode) {
            $button .= ' ' . $this->build_html_input_submit('delete', _DELETE);
            $button .= ' ' . $this->build_html_input_button_cancel('cancel', _CANCEL);
        }
        echo $this->build_form_table_line('', $button, 'foot', 'foot');

        echo $this->build_form_table_end();
        echo $this->build_form_end();
    }

    public function del_cat_ok($cid)
    {
        echo $this->build_form_begin('delCat');
        echo $this->build_token();
        echo $this->build_html_input_hidden('op', 'delCat');
        echo $this->build_html_input_hidden('ok', 1);
        echo $this->build_html_input_hidden('cid', $cid);
        echo $this->build_form_table_begin();
        echo $this->build_form_table_title(_WLS_DELCAT);

        $button = $this->build_html_input_submit('post', _DELETE);
        $button .= ' ' . $this->build_html_input_button_cancel('cancel', _CANCEL);
        echo $this->build_form_table_line('', $button, 'foot', 'foot');

        echo $this->build_form_table_end();
        echo $this->build_form_end();
    }

    public function _build_cat_lflag($value = 1)
    {
        $opt = [
            _WLS_NOTLINKFLAG => 0,
            _WLS_LINKFLAG => 1,
        ];

        $ele = $this->build_form_table_radio_select('', 'lflag', $value, $opt);

        return $ele;
    }

    public function _build_cat_gm_mode()
    {
        $val = $this->_obj->getVar('gm_mode', 'n');
        $opt = [
            _AM_WEBLINKS_MODE_NON => WEBLINKS_C_GM_MODE_NON,
            _AM_WEBLINKS_MODE_DEFAULT => WEBLINKS_C_GM_MODE_DEFAULT,
            _AM_WEBLINKS_MODE_PARENT => WEBLINKS_C_GM_MODE_PARENT,
            _AM_WEBLINKS_MODE_FOLLOWING => WEBLINKS_C_GM_MODE_FOLLOWING,
        ];

        $ele = $this->build_form_table_radio_select(_AM_WEBLINKS_CAT_SHOW_GM, 'gm_mode', $val, $opt);

        return $ele;
    }

    public function _build_cat_gm_type()
    {
        $val = $this->_obj->getVar('gm_icon', 'n');
        $opt = [
            _WEBLINKS_GM_TYPE_MAP => 0,
            _WEBLINKS_GM_TYPE_SATELLITE => 1,
            _WEBLINKS_GM_TYPE_HYBRID => 2,
        ];

        $ele = $this->build_form_table_radio_select(_WEBLINKS_GM_TYPE, 'gm_type', $val, $opt);

        return $ele;
    }

    public function _build_cat_gm_location()
    {
        $cap = $this->build_form_caption(_WEBLINKS_GM_LOCATION, _AM_WEBLINKS_CAT_GM_LOCATION_DSC);
        $ele = $this->build_obj_text('gm_location');
        $line = $this->build_form_table_line($cap, $ele);

        return $line;
    }

    public function _build_cat_gm_icon()
    {
        $cap = $this->build_form_caption(_WEBLINKS_GM_ICON, _AM_WEBLINKS_CAT_GM_ICON_DSC);
        $val = $this->_obj->getVar('gm_icon', 'n');
        $ele = $this->_webmap_class->build_ele_icon($val);
        $line = $this->build_form_table_line($cap, $ele);

        return $line;
    }

    public function _build_cat_gm()
    {
        $text = $this->build_html_tr_tag_begin('left', 'top');
        $text .= $this->build_html_td_tag_begin('', '', 2, '', 'odd');
        $text .= $this->_webmap_class->build_form_iframe();
        $text .= $this->build_html_td_tag_end();
        $text .= $this->build_html_tr_tag_end();

        return $text;
    }

    public function _build_cat_desc($obj)
    {
        $name_dhtml = 'weblinks_description';
        $value = $obj->getVar('description', 'n');
        $rows = 10;
        $cols = 50;

        $text = $this->build_form_dhtml_textarea($name_dhtml, $value, $rows, $cols);

        return $text;
    }

    public function _build_cat_desc_opt($obj)
    {
        $text = $this->_build_cat_opt($obj, 'dohtml');
        $text .= $this->_build_cat_opt($obj, 'dosmiley');
        $text .= $this->_build_cat_opt($obj, 'doxcode');
        $text .= $this->_build_cat_opt($obj, 'doimage');

        $name = 'dobr';
        $value = $obj->getVar($name, 'n');
        $options = [
            _WEBLINKS_DOBREAK => 1,
        ];
        $text .= $this->build_html_input_checkbox_select($name, $value, $options);

        return $text;
    }

    public function _build_cat_opt($obj, $name)
    {
        $value = $obj->getVar($name, 'n');
        $const_name = '_WEBLINKS_' . mb_strtoupper($name);
        $const = constant($const_name);
        $options = [
            $const => 1,
        ];

        $text = $this->build_html_input_checkbox_select($name, $value, $options);
        $text .= "<br>\n";

        return $text;
    }

    public function _build_cat_imgurl($obj)
    {
        $imgurl = $obj->getVar('imgurl', 'e');
        $orig_width = $obj->getVar('img_orig_width');
        $orig_height = $obj->getVar('img_orig_height');
        $show_width = $obj->getVar('img_show_width');
        $show_height = $obj->getVar('img_show_height');

        $imgurl_desc = _WEBLINKS_IMGURL_MAIN_DSC1;

        $imgurl_disp = $imgurl;
        if (empty($imgurl_disp)) {
            $imgurl_disp = 'https://';
        }

        $imgurl_cap = $this->build_form_caption(_WEBLINKS_IMGURL_MAIN, $imgurl_desc);
        $imgurl_text = $this->build_html_input_text('imgurl', $imgurl_disp, 100, 255);

        $text = $this->build_html_tr_tag_begin('left', 'top');
        $text .= $this->build_html_td_tag_begin('left', '', 2, '', 'head');
        $text .= $this->substute_blank($imgurl_cap);
        $text .= $this->build_html_td_tag_end();
        $text .= $this->build_html_tr_tag_end();
        $text .= $this->build_html_td_tag_begin('left', '', 2, '', 'odd');
        $text .= $this->substute_blank($imgurl_text);

        if ($imgurl) {
            $text .= "<br><br>\n";
            $text .= $this->build_html_img_tag($imgurl, $show_width, $show_height, 0, 'category image');
            $text .= "<br>\n";
            $text .= $orig_width . ' x ' . $orig_height;
            $text .= "<br>\n";
        }

        $text .= $this->build_html_td_tag_end();
        $text .= $this->build_html_tr_tag_end();

        return $text;
    }

    //---------------------------------------------------------
    // update_path
    //---------------------------------------------------------
    public function update_path()
    {
        echo $this->build_form_begin('update_path');
        echo $this->build_token();
        echo $this->build_html_input_hidden('op', 'update_path');
        echo $this->build_form_table_begin();
        echo $this->build_form_table_title(_AM_WEBLINKS_UPDATE_CAT_PATH);
        echo $this->build_form_table_submit('', 'submit', _HAPPYLINUX_EXECUTE);
        echo $this->build_form_table_end();
        echo $this->build_form_end();
    }

    //---------------------------------------------------------
    // update_image_size
    //---------------------------------------------------------
    public function update_image_size()
    {
        echo $this->build_form_begin('update_image_size');
        echo $this->build_token();
        echo $this->build_html_input_hidden('op', 'update_image_size');
        echo $this->build_form_table_begin();
        echo $this->build_form_table_title(_AM_WEBLINKS_UPDATE_CAT_IMAGE_SIZE);
        echo $this->build_form_table_submit('', 'submit', _HAPPYLINUX_EXECUTE);
        echo $this->build_form_table_end();
        echo $this->build_form_end();
    }

    // --- class end ---
}
