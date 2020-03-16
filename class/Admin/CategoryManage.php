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
// class CategoryManage
//=========================================================
class CategoryManage extends Happylinux\Manage
{
    // class
    public $_config_handler;
    public $_link_vote_handler;
    public $_link_handler;
    public $_catlink_handler;
    public $_link_catlink_handler;

    public $_strings;
    public $_time_class;

    public $_cat_obj;

    public $_conf;
    public $_conf_cat_path_count;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct(WEBLINKS_DIRNAME);

        $this->set_handler('Category', WEBLINKS_DIRNAME, 'weblinks');
        $this->set_id_name('cid');
        $this->set_form_class(CategoryForm::class);
        $this->set_script('category_manage.php');
        $this->set_redirect('category_list.php', 'category_list.php?sortid=1');
        $this->set_title(_AM_WEBLINKS_ADD_CATEGORY, _WLS_MODCAT, _WLS_DELCAT);
        $this->set_err_no_record(_WEBLINKS_NO_CATEGORY);
        $this->set_module_dirname('weblinks');
        $this->set_flag_execute_time(true);

        $this->_config_handler = weblinks_get_handler('Config2Basic', WEBLINKS_DIRNAME);
        $this->_link_vote_handler = weblinks_get_handler('LinkVoteDel', WEBLINKS_DIRNAME);
        $this->_link_handler = weblinks_get_handler('Link', WEBLINKS_DIRNAME);
        $this->_catlink_handler = weblinks_get_handler('CategoryLink', WEBLINKS_DIRNAME);
        $this->_banner_handler = handler('Banner', WEBLINKS_DIRNAME);
        $this->_link_catlink_handler = weblinks_get_handler('LinkCategoryLinkBasic', WEBLINKS_DIRNAME);

        $this->_strings = Happylinux\Strings::getInstance();
        $this->_time_class = @\XoopsModules\Happylinux\Time::getInstance();

        $this->_conf = $this->_config_handler->get_conf();
        if ($this->_conf['cat_path'] || $this->_conf['cat_count']) {
            $this->_conf_cat_path_count = true;
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
        $op = 'main';
        if (isset($_POST['del_cat'])) {
            $op = 'del_cat';
        } elseif (isset($_POST['delete'])) {
            $op = 'del_cat';
        } elseif (isset($_POST['op'])) {
            $op = $_POST['op'];
        } elseif (isset($_GET['op'])) {
            $op = $_GET['op'];
        }

        return $op;
    }

    //---------------------------------------------------------
    // init
    //---------------------------------------------------------
    public function init()
    {
        $this->_handler->load();
    }

    //---------------------------------------------------------
    // main_add_form()
    //---------------------------------------------------------
    public function add_form()
    {
        $this->_main_add_form();
    }

    public function _print_add_form()
    {
        $obj = &$this->_handler->create();
        $obj->set('lflag', 1);
        $this->_form->_show_add($obj);

        return true;
    }

    //---------------------------------------------------------
    // main_add_table()
    //---------------------------------------------------------
    public function add_table()
    {
        $this->_main_add_table(true);
    }

    public function _main_add_table($check_flag = false)
    {
        if (!$this->_check_token() || !$this->_check_add_table()) {
            $this->_print_add_preview();
            exit();
        }

        if ($this->_exec_add_table()) {
            if ($this->_conf_cat_path_count) {
                $this->_print_update_path_form('add');
                exit();
            }

            $msg = $this->_LANG_MSG_ADD;
            $msg .= $this->_build_comment('add record');    // for test form
            redirect_header($this->_redirect_desc, 1, $msg);
            exit();
        }
        $this->_print_add_db_error();
        exit();
    }

    public function _check_add_table()
    {
        $this->_clear_errors();

        // support xoops protector
        if (!$this->_post->is_post_set('pid')) {
            $this->_set_errors(_WLS_ERROR_CATEGORY);
        }

        $this->_check_fill_by_post('title', _WLS_TITLEC);
        $this->_check_url_by_post('imgurl', _WEBLINKS_IMGURL_MAIN, false);

        return $this->returnExistError();
    }

    public function _exec_add_table()
    {
        $title = $this->_post->get_post_text('title');

        $obj = &$this->_handler->create();
        $obj->set_vars_by_post();
        $obj->set_pid_by_post();
        $obj->set_desc_by_post();

        // Notice [PHP]: Use of undefined constant imgurl
        $imgurl = $obj->get('imgurl');

        if ($imgurl) {
            list($orig_width, $orig_height, $show_width, $show_height) = $this->_get_image_size($imgurl);

            $obj->setVar('img_orig_width', $orig_width);
            $obj->setVar('img_orig_height', $orig_height);
            $obj->setVar('img_show_width', $show_width);
            $obj->setVar('img_show_height', $show_height);
        }

        $pid = $obj->get('pid');
        if ($pid > 0) {
            $obj->setVar('gm_mode', WEBLINKS_C_GM_MODE_PARENT);
        }

        $newid = $this->_handler->insert($obj);
        if (!$newid) {
            $this->_set_errors($this->_handler->getErrors());

            return false;
        }

        $tags = [];
        $tags['CATEGORY_NAME'] = $title;
        $tags['CATEGORY_URL'] = WEBLINKS_URL . '/viewcat.php?cid=' . $newid;
        $notification_handler = xoops_getHandler('notification');
        $notification_handler->triggerEvent('global', 0, 'new_category', $tags);

        return true;
    }

    //---------------------------------------------------------
    // main_mod_form()
    //---------------------------------------------------------
    public function mod_form()
    {
        $this->_main_mod_form();
    }

    //---------------------------------------------------------
    // main_mod_table()
    //---------------------------------------------------------
    public function mod_table()
    {
        $this->_main_mod_table();
    }

    public function _main_mod_table($check_flag = false)
    {
        if (!$this->_get_obj()) {
            redirect_header($this->_redirect_asc, 3, $this->_LANG_ERR_NO_RECORD);
            exit();
        }

        if (!$this->_check_token() || !$this->_check_mod_table()) {
            $this->_print_mod_preview();
            exit();
        }

        if ($this->_exec_mod_table()) {
            if ($this->_conf_cat_path_count) {
                $this->_print_update_path_form('mod');
                exit();
            }

            $msg = $this->_LANG_MSG_MOD;
            $msg .= $this->_build_comment('mod record');    // for test form
            redirect_header($this->_redirect_asc, 1, $msg);
            exit();
        }
        $this->_print_mod_db_error();
        exit();
    }

    public function _check_mod_table()
    {
        return $this->_check_add_table();
    }

    public function _exec_mod_table()
    {
        $orig_width = 0;
        $orig_height = 0;
        $show_width = 0;
        $show_height = 0;

        $this->_modid = $this->_get_post_get_id();

        $obj = &$this->_obj;
        $obj->set_vars_by_post();
        $obj->set_desc_by_post();

        // Notice [PHP]: Use of undefined constant imgurl
        $imgurl = $obj->get('imgurl');

        if ($imgurl) {
            list($orig_width, $orig_height, $show_width, $show_height) = $this->_get_image_size($imgurl);
        }

        $obj->setVar('img_orig_width', $orig_width);
        $obj->setVar('img_orig_height', $orig_height);
        $obj->setVar('img_show_width', $show_width);
        $obj->setVar('img_show_height', $show_height);

        if (!$this->_handler->update($obj)) {
            $this->_set_errors($this->_LANG_FAIL_MOD);
            $this->_set_errors($this->_handler->getErrors());

            return false;
        }

        return true;
    }

    //---------------------------------------------------------
    // main_del_table()
    //---------------------------------------------------------
    public function del_cat()
    {
        if (!$this->_get_obj()) {
            redirect_header('category_list.php', 3, _WEBLINKS_NO_CATEGORY);
            exit();
        }

        if (!$this->_check_token()) {
            redirect_header($this->_build_script_mod_form(), 3, 'Token Error');
            exit();
        }

        $cid = $this->_post->get_post_int('cid');
        $ok = $this->_post->get_post_int('ok');

        $this->_print_cp_header();
        $this->_print_bread_op(_WLS_DELCAT);
        $this->_print_title(_WLS_DELCAT);

        $MAX_SUBCAT_DEL = 4;
        $MAX_LINK_BELONG = 10;
        $MAX_LINK_DEL = 10;

        if (1 == $ok) {
            echo '<h3>' . _WLS_DELCAT . "</h3>\n";
        } else {
            echo "<h3 style='color: #0000ff'>" . _WLS_WARNING . "</h3>\n";
        }

        // The specified category
        echo '<h4>' . _WLS_CATEGORY . "</h4>\n";

        $title_s = $this->_obj->getVar('title', 's');
        echo "$cid: $title_s <br>\n";

        // sub categories
        echo '<h4>' . _WLS_SUBCATEGORY . "</h4>\n";

        $sub_arr = $this->_handler->getAllChildId($cid);

        $sub_count = count($sub_arr);
        if ($sub_count > 0) {
            foreach ($sub_arr as $sub) {
                $obj2 = $this->_handler->get($sub);
                $title_s = $obj2->getVar('title', 's');
                echo "$sub: $title_s <br>\n";
            }
        } else {
            echo _WLS_SUBCATEGORY_NON . "<br>\n";
        }

        // limit over
        if ($sub_count > $MAX_SUBCAT_DEL) {
            echo "<br>\n";
            echo $this->_form->build_html_highlight(_WLS_ERROR_MAX_SUBCAT);
            echo " ($MAX_SUBCAT_DEL) <br>\n";
            echo "<hr>\n";
            $this->_print_cp_footer_with_goto_list();
            exit();
        }

        // all link belonging to this category
        echo '<h4>' . _WLS_LINK_BELONG . "</h4>\n";

        $cid_arr = array_merge([$cid], $sub_arr);
        $lid_arr = $this->_catlink_handler->get_lid_array_by_cid_array($cid_arr);
        $cid_count = count($cid_arr);
        $link_count = count($lid_arr);
        $link_del_count = 0;

        if ($link_count > 0) {
            echo _WLS_LINK_BELONG_NUMBER . ': ' . count($lid_arr) . "<br>\n";
            echo '<h4>' . _WLS_LINK_MAYBE_DELETE . "</h4>\n";

            if ($cid_count > 0) {
                echo _WLS_LINK_MAYBE_DELETE_DSC . "<br><br>\n";
            }

            foreach ($lid_arr as $lid) {
                // get the number of the categories belonging to this link
                $num = $this->_catlink_handler->get_count_by_lid($lid);

                // the link belongs only to this category
                if (1 == $num) {
                    $link_obj = $this->_link_handler->get($lid);

                    if (is_object($link_obj)) {
                        $link_title_s = $link_obj->getVar('title', 's');
                        echo "link: $lid: $link_title_s <br>\n";
                    } else {
                        $msg = "link not exist lid = $lid";
                        $this->print_error($msg);
                    }

                    ++$link_del_count;
                }
            }

            if (0 == $link_del_count) {
                echo $this->_form->build_html_highlight(_WLS_LINK_DELETE_NON, '#0000ff');
            }
        } else {
            echo _WLS_LINK_BELONG_NON . "<br>\n";
        }

        // limit over
        if ($link_del_count > $MAX_LINK_DEL) {
            echo "<br>\n";
            echo $this->_form->build_html_highlight(_WLS_ERROR_MAX_LINK_DEL);
            echo " ($MAX_LINK_DEL) <br>\n";
            echo "<hr>\n";
            $this->_print_cp_footer_with_goto_list();
            exit();
        }

        // limit over
        if ($link_count > $MAX_LINK_BELONG) {
            echo "<br>\n";
            echo $this->_form->build_html_highlight(_WLS_ERROR_MAX_LINK_BELONG);
            echo " ($MAX_LINK_BELONG) <br>\n";
            echo "<hr>\n";
            $this->_print_cp_footer_with_goto_list();
            exit();
        }

        // excute
        if (1 == $ok) {
            echo "<br><hr>\n";
            echo '<h4>' . _WLS_CATEGORY_LINK_DELETE_EXCUTE . "</h4>\n";

            $flag_error = false;

            // sub category
            foreach ($sub_arr as $sub) {
                $ret = $this->_exec_del_cat($sub);
                if (!$ret) {
                    $flag_error = true;
                }
            }

            $ret = $this->_exec_del_cat($cid);
            if (!$ret) {
                $flag_error = true;
            }

            echo '<h4>' . _WLS_CATEGORY_LINK_DELETED . "</h4>\n";

            if ($flag_error) {
                $this->print_error(_AM_WEBLINKS_ERROR_SOME);
            }

            echo "<hr>\n";

            if ($this->_conf_cat_path_count) {
                $this->_form->update_path();
            }

            $this->_print_cp_footer_with_goto_list();

            return;
        } // confirm

        $this->_form->del_cat_ok($cid);
        xoops_cp_footer();

        return;
        xoops_cp_footer();  // dummy
    }

    public function _exec_del_cat($cid)
    {
        $flag_error = false;

        $mid = $this->_system->get_mid();

        // get the link id is belonging to this category
        $lid_arr = $this->_catlink_handler->get_lid_array_by_cid($cid);

        foreach ($lid_arr as $lid) {
            // get the number of the categories belonging to this link
            $num = $this->_catlink_handler->get_count_by_lid($lid);

            // delete this link, if it belongs only to this category
            if (1 == $num) {
                $link_obj = $this->_link_handler->get($lid);

                if (is_object($link_obj)) {
                    $title_s = $link_obj->getVar('title', 's');
                    echo "$lid: $title_s <br>\n";
                } else {
                    $flag_error = true;
                    $msg = "link not exist lid = $lid ";
                    $this->print_error($msg);
                }

                // BUG 3095: the number of links does not change, if delete link
                $ret = $this->_link_vote_handler->del_link_vote_comm_by_lid($lid);
                if (!$ret) {
                    $flag_error = true;
                    $msg = $this->_link_vote_handler->getErrors(1);
                    $this->print_error($msg);
                }
            }
        }

        // delete category
        $obj = $this->_handler->get($cid);

        if (is_object($obj)) {
            $title_s = $obj->getVar('title', 's');
            echo _WLS_CATEGORY_DELETED . ": $cid: $title_s <br>\n";

            $ret = $this->_handler->delete($obj);
            if (!$ret) {
                $flag_error = true;
                $msg = $this->_handler->getErrors(1);
                $this->print_error($msg);
            }
        } else {
            $flag_error = true;
            $msg = "category not exist cid = $cid ";
            $this->print_error($msg);
        }

        // delete comments & notifications
        xoops_notification_deletebyitem($mid, 'category', $cid);

        if ($flag_error) {
            return false;
        }

        return true;
    }

    public function _print_cp_footer_with_goto_list()
    {
        echo "<br>\n";
        echo '- <a href="category_list.php">' . _WEBLINKS_ADMIN_CATEGORY_LIST . "</a><br>\n";
        xoops_cp_footer();
    }

    //---------------------------------------------------------
    // reorder_cat
    //---------------------------------------------------------
    public function reorder_cat()
    {
        $pid = $this->_post->get_post_get_int('pid');
        $url = 'category_list.php?sortid=3&amp;pid=' . $pid;

        if (!$this->_check_token()) {
            redirect_header($url, 3, 'Token Error');
            exit();
        }

        if ($this->_exec_reorder_cat()) {
            redirect_header($url, 1, _WEBLINKS_ORDERS_UPDATED);
            exit();
        }

        xoops_cp_header();
        $this->_print_bread_op(_WLS_DELCAT);
        $this->_print_title(_WLS_DELCAT);
        xoops_error('DB Error');
        echo $this->getErrors(1);
        xoops_cp_footer();
    }

    public function _exec_reorder_cat()
    {
        $this->_clear_errors();

        $order_arr = $this->_post->get_post('orders');

        foreach ($order_arr as $key => $value) {
            $cid = (int)$key;
            $orders = (int)$value;
            $obj = &$this->_handler->get($cid);

            if (is_object($obj)) {
                $obj->setVar('orders', $orders);

                $ret = $this->_handler->update($obj);
                if (!$ret) {
                    $this->_set_error($this->_handler->getErrors(1));
                }
            } else {
                $msg = "category not exist cid = $cid ";
                $this->_set_error($msg);
            }
        }

        return $this->returnExistError();
    }

    //---------------------------------------------------------
    // update_path
    //---------------------------------------------------------
    public function update_path_form()
    {
        $this->_print_update_path_form('update_path');
    }

    public function _print_update_path_form($op_mode)
    {
        $name = _AM_WEBLINKS_UPDATE_CAT_PATH;

        switch ($op_mode) {
            case 'add':
                $title = _AM_WEBLINKS_ADD_CATEGORY;
                $op = 'add_form';
                break;
            case 'mod':
                $title = _WLS_MODCAT;
                $op = 'mod_form';
                break;
            default:
            case 'update_path':
                $title = _AM_WEBLINKS_UPDATE_CAT_PATH;
                $op = 'update_path_form';
                $name = '';
                break;
        }

        $this->_print_cp_header();
        $this->_print_bread_op($title, $op, $name);
        $this->_print_title(_AM_WEBLINKS_UPDATE_CAT_PATH);
        $this->_form->update_path();
        $this->_print_cp_footer();
    }

    public function update_path()
    {
        $url_end = 'category_list.php';
        $url_err = 'category_manage.php?op=update_path_form';

        if (!$this->_check_token()) {
            redirect_header($url_err, 3, 'Token Error');
            exit();
        }

        if ($this->_exec_update_path()) {
            $time = $this->_time_class->get_elapse_time();
            $msg = _WLS_DBUPDATED . " : $time sec ";
            $msg .= $this->_build_comment('update path');   // for test form
            redirect_header($url_end, 1, $msg);
            exit();
        }

        xoops_cp_header();
        $this->_print_bread_op(_AM_WEBLINKS_UPDATE_CAT_PATH);
        $this->_print_title(_AM_WEBLINKS_UPDATE_CAT_PATH);
        xoops_error('DB Error');
        echo $this->getErrors(1);
        xoops_cp_footer();
    }

    public function _exec_update_path()
    {
        $this->_handler->build_tree();

        foreach ($this->_handler->get_cat_info_array() as $cid => $info) {
            if (0 == $cid) {
                continue;
            }

            $tree = $info['tree'];
            $parent = implode('|', $info['parent']);
            $child = implode('|', $info['child']);
            $count = 0;

            $arr = &$this->_handler->get_parent_and_all_child_id($cid);
            $count = $this->_link_catlink_handler->get_count_by_cid_array($arr);

            $obj = &$this->_handler->get($cid);
            $obj->setVar('tree_order', $tree);
            $obj->setVar('cids_parent', $parent);
            $obj->setVar('cids_child', $child);
            $obj->setVar('link_count', $count);

            $ret = $this->_handler->update($obj);
            if (!$ret) {
                $this->_set_errors($this->_handler->getErrors());
            }
        }

        return $this->returnExistError();
    }

    //---------------------------------------------------------
    // update_image_size
    //---------------------------------------------------------
    public function update_image_size_form()
    {
        $this->_print_cp_header();
        $this->_print_bread_op(_AM_WEBLINKS_UPDATE_CAT_IMAGE_SIZE, 'update_image_size_form');
        $this->_print_title(_AM_WEBLINKS_UPDATE_CAT_IMAGE_SIZE);
        $this->_form->update_image_size();
        $this->_print_cp_footer();
    }

    public function update_image_size()
    {
        $url_end = 'category_list.php';
        $url_err = 'category_manage.php?op=update_image_size_form';

        if (!$this->_check_token()) {
            redirect_header($url_err, 3, 'Token Error');
            exit();
        }

        if ($this->_exec_update_image_size()) {
            $time = $this->_time_class->get_elapse_time();
            $msg = _WLS_DBUPDATED . " : $time sec ";
            $msg .= $this->_build_comment('update image size'); // for test form
            redirect_header($url_end, 1, $msg);
            exit();
        }

        xoops_cp_header();
        $this->_print_bread_op(_AM_WEBLINKS_UPDATE_CAT_IMAGE_SIZE);
        $this->_print_title(_AM_WEBLINKS_UPDATE_CAT_IMAGE_SIZE);
        xoops_error('DB Error');
        echo $this->getErrors(1);
        xoops_cp_footer();
    }

    public function _exec_update_image_size()
    {
        $list = &$this->_handler->getList();

        foreach ($list as $cid) {
            $obj = &$this->_handler->get($cid);

            $imgurl = $obj->get('imgurl');
            if (empty($imgurl)) {
                continue;
            }

            list($orig_width, $orig_height, $show_width, $show_height) = $this->_get_image_size($imgurl);

            if ((0 == $orig_width) || (0 == $orig_height)) {
                continue;
            }

            $obj->setVar('img_orig_width', $orig_width);
            $obj->setVar('img_orig_height', $orig_height);
            $obj->setVar('img_show_width', $show_width);
            $obj->setVar('img_show_height', $show_height);

            $ret = $this->_handler->update($obj);
            if (!$ret) {
                $this->_set_errors($this->_handler->getErrors());
            }

            unset($obj);
        }

        return $this->returnExistError();
    }

    //---------------------------------------------------------
    // banner handler
    //---------------------------------------------------------
    public function _get_image_size($url)
    {
        $size = $this->_banner_handler->get_cat_image_size($url);
        if (!$size) {
            return [0, 0, 0, 0];
        }

        $arr = [
            $size['orig_width'],
            $size['orig_height'],
            $size['show_width'],
            $size['show_height'],
        ];

        return $arr;
    }

    //---------------------------------------------------------
    // form test
    //---------------------------------------------------------
    public function test()
    {
        $arr = [
            'cid' => 0,
            'title' => 'TEST',
            'lflag' => 1,
            'orders' => 0,
            'pid' => 0,
            'imgurl' => 'https://TEST/',
        ];

        xoops_cp_header();
        $obj = &$this->_handler->create();
        $obj->assignVars($arr);
        $this->_form->_show_add_preview($obj);
        xoops_cp_footer();
    }

    //---------------------------------------------------------
    // private print
    //---------------------------------------------------------
    public function _print_menu()
    {
        weblinks_admin_print_header();
        weblinks_admin_print_menu();
    }

    // --- class end ---
}
