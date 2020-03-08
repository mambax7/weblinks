<?php
// $Id: local.php,v 1.1 2006/12/22 15:26:37 ohwada Exp $

//=========================================================
// WebLinks Module
// 2006-10-17 K.OHWADA
//=========================================================

//---------------------------------------------------------
// for Iran user
// I dont verficate in Iran mode
// please correct the actual status.
// and post in the support forum
//---------------------------------------------------------

// === class begin ===
if (!class_exists('weblinks_locate_ir')) {
    //=========================================================
    // class weblinks_locate_ir
    // Iran (ir)
    //=========================================================
    class weblinks_locate_ir extends weblinks_locate_base
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct()
        {
            parent::__construct();

            // yahoo does not support in Iran
            // and then substitue in USA
            $arr = [
                'weblinks_map_template' => 'weblinks_us_yahoo.tpl',
            ];

            $this->array_merge($arr);
        }

        // --- class end ---
    }
    // === class end ===
}
