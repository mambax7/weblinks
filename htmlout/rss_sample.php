<?php

// $Id: rss_sample.php,v 1.1 2011/12/29 14:32:31 ohwada Exp $

//=========================================================
// WebLinks Module
// 2008-02-17 K.OHWADA
//=========================================================

//---------------------------------------------------------
// name: rss_sample
// description: RSS: url in description
// param: none
//---------------------------------------------------------

// === class begin ===
if (!class_exists('weblinks_htmlout_rss_sample')) {
    /**
     * Class weblinks_htmlout_rss_sample
     */
    class weblinks_htmlout_rss_sample extends weblinks_htmlout_base
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------

        /**
         * weblinks_htmlout_rss_sample constructor.
         * @param $dirname
         */
        public function __construct($dirname)
        {
            parent::__construct($dirname);
        }

        //---------------------------------------------------------
        // function
        //---------------------------------------------------------

        /**
         * @return string
         */
        public function description()
        {
            return 'RSS: url in description';
        }

        /**
         * @return bool
         */
        public function execute_plugin()
        {
            $url = $this->get('url');
            $desc_disp = $this->get('description_disp');

            $text = '';
            if ($url) {
                $url_s = happy_linux_sanitize_url($url);
                $text .= '<a href="' . $url_s . '" target="_blank">';
                $text .= $url_s . '</a> <br><br>';
            }
            $text .= $desc_disp;

            $this->set('rss_content', $text);

            return true;
        }

        // --- class end ---
    }
    // === class end ===
}
