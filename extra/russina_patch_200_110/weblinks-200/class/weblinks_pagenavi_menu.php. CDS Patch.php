<?php
// $Id: weblinks_pagenavi_menu.php.\040CDS\040Patch.php,v 1.1 2012/04/09 10:21:09 ohwada Exp $

// 2006-09-20 K.OHWADA
// use happy_linux

// 2006-05-15 K.OHWADA
// rename class pagenavi to pagenavi_menu
// not use global

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//=========================================================
// WebLinks Module
// class page navi
// 2005-01-20 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('PageNaviMenu')) {
    //=========================================================
    // class PageNaviMenu
    //=========================================================
    class PageNaviMenu extends happy_linux_pagenavi
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct()
        {
            parent::__construct();

            $this->add_sort(_WLS_TITLEATOZ, 'title', 'ASC');
            $this->add_sort(_WLS_TITLEZTOA, 'title', 'DESC');
            $this->add_sort(_WLS_DATEOLD, 'time_update', 'ASC');
            $this->add_sort(_WLS_DATENEW, 'time_update', 'DESC');
            $this->add_sort(_WLS_RATINGLTOH, 'rating', 'ASC');
            $this->add_sort(_WLS_RATINGHTOL, 'rating', 'DESC');
            $this->add_sort(_WLS_POPULARITYLTOM, 'hits', 'ASC');
            $this->add_sort(_WLS_POPULARITYMTOL, 'hits', 'DESC');
            /* CDS Patch. Weblinks. 2.00. 10. BOF */
            $this->add_sort(_WLS_TIMEPUBLISHNEW, 'time_publish', 'ASC');
            $this->add_sort(_WLS_TIMEPUBLISHOLD, 'time_publish', 'DESC');
            /* CDS Patch. Weblinks. 2.00. 10. EOF */

            $this->set_flag_sortid(1);
        }

        public static function getInstance()
        {
            static $instance;
            if (null === $instance) {
                $instance = new static();
            }

            return $instance;
        }

        //=========================================================
        // template
        //=========================================================
        public function assign_navi($tpl, $script)
        {
            $show_navi = false;
            $navi = '';

            //if 2 or more items, show the sort menu
            if ($this->_total > 1) {
                $navi = $this->build($script);
                $show_navi = true;
            }

            $tpl->assign('show_navi', $show_navi);
            $tpl->assign('page_navi', $navi);
            $this->assign_navi_orderby($tpl);
        }

        public function assign_navi_orderby($tpl)
        {
            // bug fix: Call-time pass-by-reference

            $lang_orderby = $this->get_sort_value($this->_sortid, 'title');

            $tpl->assign('lang_sortby', _WLS_SORTBY);
            $tpl->assign('lang_title', _WLS_TITLE);
            $tpl->assign('lang_date', _WLS_DATE);
            $tpl->assign('lang_rating', _WLS_RATING);
            $tpl->assign('lang_popularity', _WLS_POPULARITY);
            /* CDS Patch. Weblinks. 2.00. 10. BOF */
            $tpl->assign('lang_publish', _WLS_PUBLISHED);
            /* CDS Patch. Weblinks. 2.00. 10. EOF */
            $tpl->assign('lang_sort_0', _WLS_TITLEATOZ);
            $tpl->assign('lang_sort_1', _WLS_TITLEZTOA);
            $tpl->assign('lang_sort_2', _WLS_DATEOLD);
            $tpl->assign('lang_sort_3', _WLS_DATENEW);
            $tpl->assign('lang_sort_4', _WLS_RATINGLTOH);
            $tpl->assign('lang_sort_5', _WLS_RATINGHTOL);
            $tpl->assign('lang_sort_6', _WLS_POPULARITYLTOM);
            $tpl->assign('lang_sort_7', _WLS_POPULARITYMTOL);
            /* CDS Patch. Weblinks. 2.00. 10. BOF */
            $tpl->assign('lang_sort_8', _WLS_TIMEPUBLISHNEW);
            $tpl->assign('lang_sort_9', _WLS_TIMEPUBLISHOLD);
            /* CDS Patch. Weblinks. 2.00. 10. EOF */

            $tpl->assign('lang_cursortedby', sprintf(_WLS_CURSORTEDBY, $lang_orderby));
        }

        // --- class end ---
    }
    // === class end ===
}
