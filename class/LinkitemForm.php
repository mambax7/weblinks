<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// $Id: weblinks_linkitem_store_handler.php,v 1.4 2007/08/08 04:18:35 ohwada Exp $

// 2007-08-01 K.OHWADA
// admin can add etc column
// set_num_etc()

// 2007-02-20 K.OHWADA
// add description field
// add_column_table_140()

// 2006-09-20 K.OHWADA
// use happy_linux
// add upgrade() clean()

// 2006-05-15 K.OHWADA
// this is new file
// use new handler

//================================================================
// WebLinks Module
// this file contain 2 class
//   LinkitemForm
//   weblinks_linkitem_store_handler
// 2006-05-15 K.OHWADA
//================================================================

// === class begin ===
if (!class_exists('LinkitemForm')) {
    //=========================================================
    // class LinkitemForm
    //=========================================================
    class LinkitemForm extends Happylinux\Form
    {
        public $_linkitem_define_handler;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            parent::__construct();

            $this->_linkitem_define_handler = weblinks_get_handler('LinkitemDefine', $dirname);
            $this->set_form_name('Linkitem');
        }

        public static function getInstance($dirname = null)
        {
            static $instance;
            if (null === $instance) {
                $instance = new static($dirname);
            }

            return $instance;
        }

        //---------------------------------------------------------
        // main function
        //---------------------------------------------------------
        public function show($form_title)
        {
            $ROWS = 1;
            $COLS = 50;
            $SIZE = 50;

            $linkitem_arr = $this->_linkitem_define_handler->load();

            // form start
            echo $this->build_form_begin();
            echo $this->build_token();
            echo $this->build_html_input_hidden('op', 'save');
            echo $this->build_html_input_hidden('save_linkitem', 1);
            echo $this->build_form_table_begin();
            echo $this->make_table3_title($form_title);

            $options = [
                _WEBLINKS_NO_USE => 0,
                _WEBLINKS_USE => 1,
                _WEBLINKS_INDISPENSABLE => 2,
            ];

            // list from config array
            foreach ($linkitem_arr as $item_id => $linkitem) {
                $name = $linkitem['name'];
                $conf_form = $linkitem['conf_form'];
                $title = $linkitem['title'];
                $user_mode = $linkitem['user_mode'];
                $desc = $linkitem['description'];

                if (0 == $conf_form) {
                    continue;
                }

                $name_d = $name;
                $name_d .= $this->build_html_input_hidden('item_ids[]', $item_id);

                $ele1 = $this->build_html_input_text("title[$item_id]", $title, $SIZE);
                $ele1 .= "<br>\n";
                $ele1 .= $this->build_html_textarea("description[$item_id]", $desc, $ROWS, $COLS);

                if (2 == $conf_form) {
                    $ele2 = $this->get_option_name($user_mode, $options);
                } else {
                    $ele2 = $this->build_html_input_radio_select("user_mode[$item_id]", $user_mode, $options);
                }

                echo $this->make_table3_line($name_d, $ele1, $ele2);
            }

            $button = $this->build_html_input_submit('submit', _WEBLINKS_UPDATE);

            echo $this->make_table3_submit($button);
            echo $this->build_form_table_end();
            echo $this->build_form_end();
            // form end
        }

        //---------------------------------------------------------
        // make table form
        //---------------------------------------------------------
        public function make_table3_title($title)
        {
            $text = $this->build_form_table_title($title, 3);

            return $text;
        }

        public function make_table3_line($title, $ele1, $ele2)
        {
            $text = "<tr valign='top' align='left'>";
            $text .= $this->build_form_td_class($title, 'head');
            $text .= $this->build_form_td_class($ele1, 'odd');
            $text .= $this->build_form_td_class($ele2, 'odd');
            $text .= "</tr>\n";

            return $text;
        }

        public function make_table3_submit($button)
        {
            $text = "<tr valign='top' align='left'>";
            $text .= $this->build_form_td_class('', 'foot');
            $text .= $this->build_html_td_tag_begin('center', '', 2, '', 'foot');
            $text .= $this->substute_blank($button);
            $text .= $this->build_html_td_tag_end();

            $text .= "</tr>\n";

            return $text;
        }

        public function get_option_name($value, $options)
        {
            foreach ($options as $opt_name => $opt_val) {
                if (isset($value) && ($value == $opt_val)) {
                    return $opt_name;
                }
            }

            return '';
        }

        // --- class end ---
    }
}
