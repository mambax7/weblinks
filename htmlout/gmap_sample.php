<?php
// $Id: gmap_sample.php,v 1.1 2008/02/26 16:05:20 ohwada Exp $

//=========================================================
// WebLinks Module
// 2008-02-17 K.OHWADA
//=========================================================

//---------------------------------------------------------
// name: gmap_sample
// description: info in GoogleMaps Marker
// param:
//   0: max_title
//   1: max_desc
//   2: marker_width
//---------------------------------------------------------

// === class begin ===
if (!class_exists('weblinks_htmlout_gmap_sample')) {
    class weblinks_htmlout_gmap_sample extends weblinks_htmlout_base
    {
        public $_MAX_TITLE_DEFAULT = -1;
        public $_MAX_DESC_DEFAULT = 100;
        public $_MARKER_WIDTH_DEFAULT = 300;

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
            return 'info in GoogleMaps Marker';
        }

        public function usage()
        {
            return 'gmap_sample( [ max_title, max_desc, marker_width ] )';
        }

        public function execute_plugin()
        {
            $lid = $this->get('lid');
            $url = $this->get('url');

            $link = $this->get_weblinks_url() . '/singlelink.php?lid=' . $lid;

            $info_single = $this->_build_info($url, true);
            $info_list = $this->_build_info($link);

            $this->set('gm_info_single', $info_single);
            $this->set('gm_info_list', $info_list);

            return true;
        }

        public function _build_info($url, $flag_target = false)
        {
            $max_title = (int)$this->get_param_by_num(0, $this->_MAX_TITLE_DEFAULT);
            $max_desc = (int)$this->get_param_by_num(1, $this->_MAX_DESC_DEFAULT);
            $marker_width = (int)$this->get_param_by_num(2, $this->_MARKER_WIDTH_DEFAULT);

            $lid = $this->get('lid');
            $title = $this->get('title');
            $desc_disp = $this->get('description_disp');

            $title_short = happy_linux_mb_shorten($title, $max_title);
            $summary = happy_linux_mb_build_summary($desc_disp, $max_desc);

            $url_s = happy_linux_sanitize_url($url);
            $title_s = happy_linux_sanitize_text($title_short);

            $target = '';
            if ($flag_target) {
                $target = 'target="_blank"';
            }

            $desc = '<a href="' . $url_s . '" ' . $target . '>';
            $desc .= '<b>' . $title_s . '</b>';
            $desc .= '</a><br>';
            $desc .= '<font size="-2">' . $summary . '</font>';

            $info = $desc;

            if ($marker_width > 0) {
                $info = '<div style="width:' . $marker_width . 'px">';
                $info .= $desc;
                $info .= '</div>';
            }

            return $info;
        }

        // --- class end ---
    }
    // === class end ===
}
