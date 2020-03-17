<?php

// $Id: address.php,v 1.1 2012/04/10 11:24:42 ohwada Exp $

//=========================================================
// WebLinks Module
// 2012-04-02 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('weblinks_address_us')) {
    //=========================================================
    // class weblinks_address_us
    // USA (JS)
    //=========================================================

    /**
     * Class weblinks_address_us
     */
    class weblinks_address_us
    {
        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------
        public function __construct()
        {
            // dummy
        }

        //---------------------------------------------------------
        // function
        //---------------------------------------------------------

        /**
         * @param $state
         * @param $city
         * @param $addr
         * @return string
         */
        public function build_address($state, $city, $addr)
        {
            $state = trim($state);
            $city = trim($city);
            $addr = trim($addr);

            if (empty($state) && empty($city) && empty($addr)) {
                return '';
            }

            // European style: addr, city, state
            $str = '';
            if ($addr) {
                $str .= $addr . ', ';
            }
            if ($city) {
                $str .= $city . ', ';
            }
            if ($state) {
                $str .= $state;
            }

            return $str;
        }

        // --- class end ---
    }
    // === class end ===
}
