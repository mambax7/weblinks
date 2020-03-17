<?php

// $Id: pagerank_sample.php,v 1.1 2011/12/29 14:32:32 ohwada Exp $

//=========================================================
// WebLinks Module
// 2008-02-17 K.OHWADA
//=========================================================

//---------------------------------------------------------
// name: pagerank
// description: get and show Google PageRank
// param: none
//---------------------------------------------------------

// === class begin ===
if (!class_exists('weblinks_htmlout_pagerank_sample')) {
    /**
     * Class weblinks_htmlout_pagerank_sample
     */
    class weblinks_htmlout_pagerank_sample extends weblinks_htmlout_base
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------

        /**
         * weblinks_htmlout_pagerank_sample constructor.
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
            return 'get and show Google PageRank';
        }

        /**
         * @return bool
         */
        public function execute_plugin()
        {
            $pagerank_handler = &$this->get_handler('pagerank');

            $lid = $this->get_item_by_key('lid');
            $pr = $pagerank_handler->get_page_rank($lid);

            $this->set_item_by_key('show_pagerank', true);
            $this->set_item_by_key('pagerank', $pr);

            return true;
        }

        // --- class end ---
    }
    // === class end ===
}
