<?php

namespace XoopsModules\Weblinks;

use XoopsModules\Happylinux;

// $Id: weblinks_votedata_handler.php,v 1.6 2007/11/26 11:33:58 ohwada Exp $

// 2007-11-24 K.OHWADA
// move create_table() to weblinks_install.php

// 2007-02-20 K.OHWADA
// hack for multi site

// 2006-09-30 K.OHWADA
// use happy_linux
// add get_count_user()

// 2006-05-15 K.OHWADA
// new handler
// not use weblinks_module_base

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//=========================================================
// WebLinks Module
// this file contain 2 class
//   weblinks_votedata
//   weblinks_votedata_handler
// 2004/01/14 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('Votedata')) {
    //=========================================================
    // class weblinks_votedata
    //=========================================================
    class Votedata extends Happylinux\BaseObject
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct()
        {
            parent::__construct();

            $this->initVar('ratingid', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('lid', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('ratinguser', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('rating', XOBJ_DTYPE_INT, 0, false);
            $this->initVar('ratinghostname', XOBJ_DTYPE_TXTBOX, null, false, 255);
            $this->initVar('ratingtimestamp', XOBJ_DTYPE_INT, 0);
        }

        //---------------------------------------------------------
        // function
        //---------------------------------------------------------
        // name for "anonymous" if not found
        public function get_uname($usereal = 0)
        {
            $uid = $this->get('ratinguser');
            $uname = XoopsUser::getUnameFromId($uid, $usereal);

            return $uname;
        }

        public function get_formatted_timestamp()
        {
            $timestamp = $this->get('ratingtimestamp');
            $formatted = formatTimestamp($timestamp);

            return $formatted;
        }

        // --- class end ---
    }
}
