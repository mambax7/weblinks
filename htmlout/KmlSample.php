<?php
// $Id: kml_sample.php,v 1.1 2008/02/26 16:05:20 ohwada Exp $

//=========================================================
// WebLinks Module
// 2008-02-17 K.OHWADA
//=========================================================

//---------------------------------------------------------
// name: kml_sample
// description: kml: description with url
// param: none
//---------------------------------------------------------

// === class begin ===
if (!class_exists('KmlSample')) {
    class KmlSample extends HtmloutBase
    {
        public $_MAX_DESC_DEFAULT = 100;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct($dirname)
        {
            parent::__construct($dirname);
        }

        //---------------------------------------------------------
        // function
        //---------------------------------------------------------
        public function description()
        {
            return 'KML: description with url';
        }

        public function usage()
        {
            return 'kml_sample( [ max_desc ] )';
        }

        public function execute_plugin()
        {
            $max_desc = (int)$this->get_param_by_num(0, $this->_MAX_DESC_DEFAULT);

            $lid = $this->get('lid');
            $url = $this->get('url');
            $desc_disp = $this->get('description_disp');

            $summary = happy_linux_mb_build_summary($desc_disp, $max_desc);

            $link = $this->get_weblinks_url() . '/singlelink.php?lid=' . $lid;
            $url_s = happylinux_sanitize_url($url);
            $link_s = happylinux_sanitize_url($link);

            $text = '';

            if ($url_s) {
                $text .= '<a href="' . $url_s . '">' . $url_s . '</a>';
                $text .= "<br><br>\n";
            }

            $text .= $summary;
            $text .= "<br><br>\n";

            $text .= 'from ';
            $text .= '<a href="' . $link_s . '">' . $this->get_xoops_sitename() . '</a>';
            $text .= "<br>\n";

            $this->set('kml_description', $text);

            return true;
        }

        // --- class end ---
    }
    // === class end ===
}
