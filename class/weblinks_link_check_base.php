<?php

// $Id: weblinks_link_check_base.php,v 1.1 2011/12/29 14:33:10 ohwada Exp $

// 2008-02-17 K.OHWADA
// divid from weblinks_link_broken_check.php

//=========================================================
// WebLinks Module
// 2004-10-20 K.OHWADA
//=========================================================

// === class begin ===
if (!class_exists('weblinks_link_check_base')) {
    //=========================================================
    // class weblinks_link_check_base
    //=========================================================

    /**
     * Class weblinks_link_check_base
     */
    class weblinks_link_check_base
    {
        public $_DIRNAME;

        public $_link_handler;

        public $_TITLE = null;
        public $_flag_echo = true;
        public $_flag_echo_lid = false;

        public $_total_link;
        public $_num_check;
        public $_time_start;
        public $_lid_start;
        public $_lid_end;
        public $_link_broken_list = null;
        public $_link_broken_line = null;

        //---------------------------------------------------------
        // constructor
        //---------------------------------------------------------

        /**
         * weblinks_link_check_base constructor.
         * @param $dirname
         */
        public function __construct($dirname)
        {
            $this->_DIRNAME = $dirname;

            // handler
            $this->_link_handler = weblinks_get_handler('link_bin', $dirname);
        }

        //---------------------------------------------------------
        // public
        //---------------------------------------------------------

        /**
         * @param int $limit
         * @param int $offset
         * @return bool
         */
        public function _execute($limit = 0, $offset = 0)
        {
            $this->_time_start = time();
            $this->_total_link = $this->get_link_count_all();

            $lid_array = &$this->_get_lid_array($limit, $offset);
            $lid_num = count($lid_array);
            $this->_num_check = $lid_num;

            if (0 == $lid_num) {
                $this->_print_write_data($this->_get_no_record());

                return true;    // no action
            }

            $this->_lid_start = $lid_array[0];
            $this->_lid_end = $lid_array[$lid_num - 1];

            $this->_print_write_data($this->_get_html_start());

            foreach ($lid_array as $lid) {
                if ($this->_flag_echo_lid) {
                    echo $lid;
                }

                $row = &$this->_get_link_row($lid);
                $url = $row['url'];

                // next, if url is null
                if (empty($url)) {
                    continue;
                }

                $this->_loop($row);

                if ($this->_flag_echo_lid) {
                    echo " \n";
                }
            }

            if ($this->_flag_echo_lid) {
                echo "<br>\n";
            }

            $this->_print_write_data($this->_get_html_end());

            return true;
        }

        /**
         * @param $row
         */
        public function _loop(&$row)
        {
            // duumy
        }

        /**
         * @param $value
         */
        public function set_flag_echo($value)
        {
            $this->_flag_echo = (bool)$value;
        }

        /**
         * @param $value
         */
        public function set_flag_echo_lid($value)
        {
            $this->_flag_echo_lid = (bool)$value;
        }

        public function get_total_link()
        {
            return $this->_total_link;
        }

        //---------------------------------------------------------
        // print HTML
        //---------------------------------------------------------

        /**
         * @return string
         */
        public function _get_html_start()
        {
            $time_now = $this->_get_time_now();
            $text = '<h4>' . $this->_TITLE . "</h4>\n";
            $text .= _WEBLINKS_ADMIN_TIME_START . " $time_now<br><br>\n";

            return $text;
        }

        /**
         * @return string
         */
        public function _get_html_end()
        {
            $time_now = $this->_get_time_now();
            $time_elapse = $this->_get_time_elapse($this->_time_start);

            $text = '';
            $text .= $this->_get_link_broken_list();

            $text .= _WEBLINKS_ADMIN_TIME_END . ' ' . $time_now . '<br><br>' . "\n";
            $text .= '<table><tr>';
            $text .= '<tr><td>' . _WEBLINKS_ADMIN_LINK_NUM_ALL . '</td>';
            $text .= '<td>' . $this->_total_link . ' ' . _WEBLINKS_ADMIN_NUM . '</td></tr>' . "\n";
            $text .= '<tr><td>' . _WEBLINKS_ADMIN_LINK_NUM_CHECK . '</td>';

            $text .= '<td> ' . $this->_num_check . ' ' . _WEBLINKS_ADMIN_NUM;
            if ($this->_lid_start) {
                $text .= ' (' . _WLS_LINKID . ' ' . $this->_lid_start . ' - ' . $this->_lid_end . ' )';
            }
            $text .= '</td></tr>' . "\n";

            $text .= $this->_get_link_broken_line();

            $text .= '<tr><td>' . _WEBLINKS_ADMIN_TIME_ELAPSE . '</td>';
            $text .= '<td>' . $time_elapse . '</td></tr>' . "\n";
            $text .= '</table>' . "\n";

            return $text;
        }

        /**
         * @return null
         */
        public function _get_link_broken_list()
        {
            return null;
        }

        /**
         * @return null
         */
        public function _get_link_broken_line()
        {
            return null;
        }

        /**
         * @return string
         */
        public function _get_no_record()
        {
            $text = '<h4>' . $this->_TITLE . "</h4>\n";
            $text .= _NO_MATCH_RECORD . "<br><br>\n";

            return $text;
        }

        //---------------------------------------------------------
        // time
        //---------------------------------------------------------

        /**
         * @return false|string
         */
        public function _get_time_now()
        {
            $text = date('Y-m-d H:i:s');

            return $text;
        }

        /**
         * @param $time_start
         * @return string
         */
        public function _get_time_elapse($time_start)
        {
            $time = time() - $time_start;
            $min = (int)($time / 60);
            $sec = $time - 60 * $min;
            $text = sprintf(_WEBLINKS_ADMIN_MIN_SEC, $min, $sec);

            return $text;
        }

        /**
         * @return float
         */
        public function _get_microtime()
        {
            [$usec, $sec] = explode(' ', microtime());
            $time = (float)$sec + (float)$usec;

            return $time;
        }

        /**
         * @param $data
         */
        public function print_write_data($data)
        {
            $this->_print_write_data($data);
        }

        /**
         * @param $data
         */
        public function _print_write_data($data)
        {
            if ($this->_flag_echo) {
                echo $data;
            }
            $this->_write_data($data);
        }

        /**
         * @param $data
         */
        public function _write_data($data)
        {
            // dummy
        }

        //---------------------------------------------------------
        // link_bin_handler
        //---------------------------------------------------------

        /**
         * @return mixed
         */
        public function &get_conf()
        {
            return $this->_link_handler->_get_config_data();
        }

        /**
         * @return mixed
         */
        public function get_link_count_all()
        {
            return $this->_link_handler->get_count_all();
        }

        /**
         * @param int $limit
         * @param int $offset
         * @return mixed
         */
        public function &_get_lid_array($limit = 0, $offset = 0)
        {
            return $this->_link_handler->get_id_array($limit, $offset);
        }

        /**
         * @param $lid
         * @return mixed
         */
        public function &_get_link_row($lid)
        {
            return $this->_link_handler->get_row_by_id($lid);
        }

        /**
         * @param $lid
         * @return mixed
         */
        public function _countup_link_broken($lid)
        {
            return $this->_link_handler->countup_broken($lid);
        }

        // --- class end ---
    }
    // === class end ===
}
