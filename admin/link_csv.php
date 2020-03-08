<?php
// $Id: link_csv.php,v 1.2 2012/04/10 19:47:02 ohwada Exp $

//=========================================================
// WebLinks Module
// 2012-04-02 K.OHWADA
//=========================================================

include '../../../include/cp_header.php';

include_once XOOPS_ROOT_PATH . '/modules/happy_linux/class/system.php';
include_once XOOPS_ROOT_PATH . '/modules/happy_linux/class/strings.php';
include_once XOOPS_ROOT_PATH . '/modules/happy_linux/class/html.php';

$XOOPS_LANGUAGE = $xoopsConfig['language'];

if (!defined('WEBLINKS_DIRNAME')) {
    define('WEBLINKS_DIRNAME', $xoopsModule->dirname());
}
if (!defined('WEBLINKS_ROOT_PATH')) {
    define('WEBLINKS_ROOT_PATH', XOOPS_ROOT_PATH . '/modules/' . WEBLINKS_DIRNAME);
}

// for main.php
if (file_exists(WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/main.php')) {
    include_once WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/main.php';
} else {
    include_once WEBLINKS_ROOT_PATH . '/language/english/main.php';
}

// for admin.php
if (file_exists(WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/admin.php')) {
    include_once WEBLINKS_ROOT_PATH . '/language/' . $XOOPS_LANGUAGE . '/admin.php';
} else {
    include_once WEBLINKS_ROOT_PATH . '/language/english/admin.php';
}

//=========================================================
// class link_csv
//=========================================================
class link_csv
{
    public $_db;
    public $_system_class;
    public $_html_class;

    public $_fp;
    public $_table_xoops_users;
    public $_table_link;
    public $_table_category;
    public $_table_catlink;
    public $_table_config2;
    public $_table_linkitem;
    public $_table_rssc_link = '';

    public $_error = '';
    public $_uid_uname_array = [];
    public $_category_title_array = [];

    public $_FIELD_NAME_ARRAY = [
        'lid' => _WLS_LINKID,
        'uid' => _WEBLINKS_USERID,
        'cids' => _WLS_CATEGORY,
        'title' => _WLS_SITETITLE,
        'url' => _WLS_SITEURL,
        'banner' => _WLS_BANNERURL,
        'description' => _WLS_DESCRIPTION,
        'name' => _WLS_NAME,
        //      "nameflag"
        'mail' => _WLS_EMAIL,
        //      "mailflag"
        'company' => _WLS_COMPANY,
        'addr' => _WLS_ADDR,
        'tel' => _WLS_TEL,
        //      "search",
        //      "passwd" => _US_PASSWORD ,
        'admincomment' => _WLS_ADMINCOMMENT,
        //      "mark",
        'time_create' => _WEBLINKS_CREATE,
        'time_update' => _WLS_LASTUPDATE,
        'hits' => _WLS_HITS,
        'rating' => _WLS_RATING,
        'votes' => _WLS_VOTE,
        'comments' => _COMMENTS,
        //      "width",
        //      "height",
        'recommend' => _WLS_SITE_RECOMMEND,
        'mutual' => _WLS_SITE_MUTUAL,
        'broken' => _WLS_BROKEN_COUNTER,
        'rss_url' => _WLS_RSS_URL,
        //      "rss_flag",
        //      "rss_xml",
        //      "rss_update",
        'usercomment' => _WLS_USER_COMMENT,
        'zip' => _WLS_ZIP,
        'state' => _WLS_STATE,
        'city' => _WLS_CITY,
        'addr2' => _WLS_ADDR2,
        'fax' => _WLS_FAX,
        //      "dohtml",
        //      "dosmiley",
        //      "doxcode",
        //      "doimage",
        //      "dobr",
        //      "etc1",
        //      "etc2",
        //      "etc3",
        //      "etc4",
        //      "etc5",
        'map_use' => _WEBLINKS_MAP_USE,
        'rssc_lid' => _WEBLINKS_RSSC_LID,
        'gm_latitude' => _WEBLINKS_GM_LATITUDE,
        'gm_longitude' => _WEBLINKS_GM_LONGITUDE,
        'gm_zoom' => _WEBLINKS_GM_ZOOM,
        //      "aux_int_1",
        //      "aux_int_2",
        //      "aux_text_1",
        //      "aux_text_2",
        'time_publish' => _WEBLINKS_TIME_PUBLISH,
        'time_expire' => _WEBLINKS_TIME_EXPIRE,
        //      "textarea1",
        //      "textarea2",
        //      "dohtml1",
        //      "dosmiley1",
        //      "doxcode1",
        //      "doimage1",
        //      "dobr1",
        'forum_id' => _WEBLINKS_FORUM_SEL,
        'comment_use' => _WEBLINKS_COMMENT_USE,
        'album_id' => _WEBLINKS_ALBUM_SEL,
        'gm_type' => _WEBLINKS_GM_TYPE,
        'pagerank' => _WEBLINKS_PAGERANK,
        'pagerank_update' => _WEBLINKS_PAGERANK_UPDATE,
        'gm_icon' => _WEBLINKS_GM_ICON,
        'uid_uname' => _WLS_REGSTERED,
    ];

    public $_DIRNAME;
    public $_DEBUG = true;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct($dirname)
    {
        $this->_DIRNAME = $dirname;

        $this->_db = XoopsDatabaseFactory::getDatabaseConnection();
        $this->_user_handler = xoops_getHandler('user');

        $this->_system_class = happy_linux_system::getInstance();
        $this->_html_class = happy_linux_html::getInstance();

        $this->_table_xoops_users = $this->_db->prefix('users');
        $this->_table_link = $this->_db->prefix($dirname . '_link');
        $this->_table_category = $this->_db->prefix($dirname . '_category');
        $this->_table_catlink = $this->_db->prefix($dirname . '_catlink');
        $this->_table_config2 = $this->_db->prefix($dirname . '_config2');
        $this->_table_linkitem = $this->_db->prefix($dirname . '_linkitem');
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
    // function
    //---------------------------------------------------------
    public function main()
    {
        $op = 'main';
        if (isset($_POST['op'])) {
            $op = $_POST['op'];
        }

        switch ($op) {
            case 'link_to_csv':
                $ret = $this->link_to_csv();
                if (!$ret) {
                    xoops_cp_header();
                    $this->print_title();
                    xoops_error($this->_error);
                    xoops_cp_footer();
                }
                break;
            case 'main':
            default:
                xoops_cp_header();
                $this->print_title();
                $this->start();
                xoops_cp_footer();
                break;
        }
    }

    //---------------------------------------------------------
    // start
    //---------------------------------------------------------
    public function start()
    {
        if ($this->check_trust_path()) {
            echo $this->get_start_form();
        } else {
            xoops_error('Require XOOPS_TRUST_PATH');
        }
    }

    public function get_start_form()
    {
        $sql = 'SELECT count(*) FROM ' . $this->_table_link;
        $count = $this->get_count_by_sql($sql);

        $option = '';
        if ('utf-8' != mb_strtolower(_CHARSET)) {
            $option = '<option value="' . _CHARSET . '">' . _CHARSET . '</option>';
        }

        $text = <<<EOF
<form action='#' method='post'>
<input type='hidden' name='op' value='link_to_csv'>
<table>
<tr>
<th colspan="2" class="head">link table ( $count )</td>
</tr>
<tr><td class="odd">
encoding
</td><td class="even">
<select name="encoding">
$option
<option value="UTF-8">UTF-8</option>
<option value="SJIS-win">SJIS</option>
</select>
<td></tr>
<tr><td class="foot"></td>
<td class="foot">
<input type='submit' value='Download csv' />
<td></tr>
</table>
</form>
EOF;

        return $text;
    }

    public function print_title()
    {
        $paths = [];
        $paths[] = [
            'name' => $this->_system_class->get_module_name(),
            'url' => 'index.php',
        ];
        $paths[] = [
            'name' => _WEBLINKS_ADMIN_LINK_LIST,
            'url' => 'link_list.php',
        ];
        $paths[] = [
            'name' => _AM_WEBLINKS_TITLE_LINK_CSV,
        ];

        echo $this->_html_class->build_html_bread_crumb($paths);

        echo '<h3>' . _AM_WEBLINKS_TITLE_LINK_CSV . "</h3>\n";
    }

    public function check_trust_path()
    {
        if (!defined('XOOPS_TRUST_PATH')) {
            return false;
        }
        if (!is_dir(XOOPS_TRUST_PATH)) {
            return false;
        }

        return true;
    }

    //---------------------------------------------------------
    // link_to_csv
    //---------------------------------------------------------
    public function link_to_csv()
    {
        $encoding = isset($_POST['encoding']) ? $_POST['encoding'] : '';

        $this->init_rssc();

        // file open
        $dir = $this->get_dir();
        if (!$dir) {
            return false;
        }

        $file_name = $this->get_file_name();
        $file_full = $dir . $file_name;
        $ret = $this->open($file_full);
        if (!$ret) {
            return false;
        }

        // field
        $fields = $this->get_fields();

        $line = '';
        foreach ($fields as $field) {
            $line .= '"' . $field . '",';
        }
        $line .= '"-"' . "\n";

        $this->write($line);

        // field name
        $linkitems = $this->get_linkitems();

        $line = '';
        foreach ($fields as $field) {
            if (isset($linkitems[$field]) && $linkitems[$field]) {
                $name = $linkitems[$field];
            } else {
                $name = $this->get_field_name($field);
            }

            $line .= '"' . $name . '",';
        }
        $line .= '"-"' . "\n";

        $this->write($line);

        // links
        $rows = $this->get_links();
        foreach ($rows as $row) {
            // each link
            $line = '';
            foreach ($fields as $field) {
                if ('uid_uname' == $field) {
                    $v = $this->get_uid_uname($row);
                } elseif ('cids' == $field) {
                    $v = $this->get_cids($row);
                } elseif ('time_create' == $field) {
                    $v = $this->get_time_create($row);
                } elseif ('time_update' == $field) {
                    $v = $this->get_time_update($row);
                } elseif ('time_publish' == $field) {
                    $v = $this->get_time_publish($row);
                } elseif ('time_expire' == $field) {
                    $v = $this->get_time_expire($row);
                } elseif ('pagerank_update' == $field) {
                    $v = $this->get_pagerank_update($row);
                } elseif ('rss_url' == $field) {
                    $v = $this->get_rss_url($row);
                } elseif ('search' == $field) {
                    $v = '-';
                } elseif ('passwd' == $field) {
                    $v = '-';
                } else {
                    $v = $row[$field];
                }

                $line .= '"' . $v . '",';
            }
            $line .= '"-"' . "\n";

            $this->write($line);
        }

        // file close
        $this->close();

        if (mb_strtolower($encoding) != mb_strtolower(_CHARSET)) {
            $file_full = $this->convert_encoding($file_full, $encoding);
        }

        // download
        $this->download($file_full, $file_name);

        return true;
    }

    public function init_rssc()
    {
        $configs = $this->get_configs();
        $dirname = $configs['rss_dirname'];
        if ($dirname && $configs['rss_use']) {
            $file = XOOPS_ROOT_PATH . '/modules/' . $dirname . '/include/rssc_version.php';
            if (file_exists($file)) {
                $this->_table_rssc_link = $this->_db->prefix($dirname . '_link');
            }
        }
    }

    public function get_file_name()
    {
        $now = date('YmdHis');
        $str = 'csv' . $now . '.csv';

        return $str;
    }

    public function get_dir()
    {
        $dir = XOOPS_TRUST_PATH . '/cache/';
        if (!is_dir($dir)) {
            $ret = mkdir($dir);
            if (!$ret) {
                $this->_error = 'NOT mkdir: ' . $dir;

                return false;
            }
        }

        $dir .= $this->_DIRNAME . '/';
        if (!is_dir($dir)) {
            $ret = mkdir($dir);
            if (!$ret) {
                $this->_error = 'NOT mkdir: ' . $dir;

                return false;
            }
        }

        $dir .= 'csv/';
        if (!is_dir($dir)) {
            $ret = mkdir($dir);
            if (!$ret) {
                $this->_error = 'NOT mkdir: ' . $dir;

                return false;
            }
        }

        return $dir;
    }

    public function open($file)
    {
        $this->_fp = fopen($file, 'wb');
        if (!$this->_fp) {
            $this->_error = 'NOT open file: ' . $file;

            return false;
        }

        return true;
    }

    public function close()
    {
        fclose($this->_fp);
    }

    public function write($data)
    {
        fwrite($this->_fp, $data);
    }

    public function get_field_name($field)
    {
        if (isset($this->_FIELD_NAME_ARRAY[$field])) {
            return $this->_FIELD_NAME_ARRAY[$field];
        }

        return $field;
    }

    public function get_uid_uname($row)
    {
        $uid = (int)$row['uid'];
        if (0 == $uid) {
            $uid = 1;
        }

        if (isset($this->_uid_uname_array[$uid])) {
            return $this->_uid_uname_array[$uid];
        }

        $uname = $this->get_xoops_users_uname($uid);
        $this->_uid_uname_array[$uid] = $uname;

        return $uname;
    }

    public function get_cids($row)
    {
        $lid = (int)$row['lid'];
        $rows = $this->get_catlink($lid);

        $str = '';
        foreach ($rows as $row) {
            $cid = (int)$row['cid'];
            $title = $this->get_cached_category_title($cid);
            $str .= $cid . ' : ' . $title . ", \n";
        }

        return $str;
    }

    public function get_time_create($row)
    {
        return date('Y-m-d H:i:s', $row['time_create']);
    }

    public function get_time_update($row)
    {
        return date('Y-m-d H:i:s', $row['time_update']);
    }

    public function get_time_publish($row)
    {
        if ($row['time_publish'] > 0) {
            return date('Y-m-d H:i:s', $row['time_publish']);
        }

        return '-';
    }

    public function get_time_expire($row)
    {
        if ($row['time_expire'] > 0) {
            return date('Y-m-d H:i:s', $row['time_expire']);
        }

        return '-';
    }

    public function get_pagerank_update($row)
    {
        if ($row['pagerank_update'] > 0) {
            return date('Y-m-d H:i:s', $row['pagerank_update']);
        }

        return '-';
    }

    public function get_rss_url($row)
    {
        $rssc_lid = (int)$row['rssc_lid'];
        if ($rssc_lid > 0) {
            return $this->get_rssc_link_rssurl($rssc_lid);
        }

        return '-';
    }

    public function get_fields()
    {
        $sql = 'SHOW COLUMNS FROM ' . $this->_table_link;
        $rows = $this->get_rows_by_sql($sql);

        $fields = [];
        foreach ($rows as $row) {
            $field = $row['Field'];
            $fields[] = $field;
            if ('uid' == $field) {
                $fields[] = 'uid_uname';
            }
        }

        return $fields;
    }

    public function get_xoops_users_uname($uid)
    {
        $sql = 'SELECT uname FROM ' . $this->_table_xoops_users;
        $sql .= ' WHERE uid=' . $uid;
        $row = $this->get_row_by_sql($sql);

        if (is_array($row)) {
            return $row['uname'];
        }

        return $uid;
    }

    public function get_links()
    {
        $sql = 'SELECT * FROM ' . $this->_table_link . ' ORDER BY lid';

        return $this->get_rows_by_sql($sql, 100);
    }

    public function get_catlink($lid)
    {
        $sql = 'SELECT cid FROM ' . $this->_table_catlink;
        $sql .= ' WHERE lid=' . $lid;

        return $this->get_rows_by_sql($sql);
    }

    public function get_cached_category_title($cid)
    {
        if (isset($this->_category_title_array[$cid])) {
            return $this->_category_title_array[$cid];
        }

        $title = $this->get_category_title($cid);
        $this->_category_title_array[$cid] = $title;

        return $title;
    }

    public function get_category_title($cid)
    {
        $sql = 'SELECT title FROM ' . $this->_table_category;
        $sql .= ' WHERE cid=' . $cid;
        $row = $this->get_row_by_sql($sql);

        if (is_array($row)) {
            return $title = $row['title'];
        }

        return $cid;
    }

    public function get_configs()
    {
        $sql = 'SELECT * FROM ' . $this->_table_config2 . ' ORDER BY id';
        $rows = $this->get_rows_by_sql($sql);

        $arr = [];
        foreach ($rows as $row) {
            $arr[$row['conf_name']] = $row['conf_value'];
        }

        return $arr;
    }

    public function get_linkitems()
    {
        $sql = 'SELECT * FROM ' . $this->_table_linkitem . ' ORDER BY id';
        $rows = $this->get_rows_by_sql($sql);

        $arr = [];
        foreach ($rows as $row) {
            $arr[$row['name']] = $row['description'];
        }

        return $arr;
    }

    public function get_rssc_link_rssurl($lid)
    {
        if (empty($this->_table_rssc_link)) {
            return '-';
        }

        $sql = 'SELECT mode, rdf_url, rss_url, atom_url FROM ' . $this->_table_rssc_link;
        $sql .= ' WHERE lid=' . $lid;
        $row = $this->get_row_by_sql($sql);

        if (!is_array($row)) {
            return $lid;
        }

        $url = $lid;
        switch ($row['mode']) {
            case 1:
                $url = $row['rdf_url'];
                break;
            case 2:
                $url = $row['rss_url'];
                break;
            case 3:
                $url = $row['atom_url'];
                break;
        }

        return $url;
    }

    public function get_count_by_sql($sql)
    {
        $res = $this->_db->query($sql);
        if (!$res) {
            if ($this->_DEBUG) {
                echo $sql;
                echo $this->_db->error();
            }

            return 0;
        }

        $array = $this->_db->fetchRow($res);
        $count = (int)$array[0];

        $this->_db->freeRecordSet($res);

        return $count;
    }

    public function get_rows_by_sql($sql, $limit = 0, $offset = 0)
    {
        $res = $this->_db->query($sql, $limit, $offset);
        if (!$res) {
            if ($this->_DEBUG) {
                echo $sql;
                echo $this->_db->error();
            }

            return false;
        }

        $arr = [];
        while ($row = $this->_db->fetchArray($res)) {
            $arr[] = $row;
        }

        $this->_db->freeRecordSet($res);

        return $arr;
    }

    public function get_row_by_sql($sql)
    {
        $res = $this->_db->query($sql, 1);
        if (!$res) {
            if ($this->_DEBUG) {
                echo $sql;
                echo $this->_db->error();
            }

            return false;
        }

        $row = $this->_db->fetchArray($res);

        $this->_db->freeRecordSet($res);

        return $row;
    }

    public function convert_encoding($file_in, $encoding)
    {
        $file_out = $file_in . '.txt';
        $text = file_get_contents($file_in);

        if (function_exists('mb_convert_encoding')) {
            $text = mb_convert_encoding($text, $encoding, _CHARSET);
        }

        file_put_contents($file_out, $text);

        return $file_out;
    }

    public function download($file, $name)
    {
        if (ini_get('zlib.output_compression')) {
            ini_set('zlib.output_compression', 'Off');
        }
        if (function_exists('mb_http_output')) {
            mb_http_output('pass');
        }

        $size = filesize($file);
        header('Pragma: public');
        header('Cache-Control: must-revaitem_idate, post-check=0, pre-check=0');
        header('Content-Description: File Transfer');
        header('Content-Type: text/plain');
        header('Content-Length: ' . $size);
        header('Content-Disposition: attachment; filename=' . $name);
        ob_clean();
        flush();
        readfile($file);
    }

    // --- class end ---
}

//=========================================================
// main
//=========================================================
$csv = link_csv::getInstance(WEBLINKS_DIRNAME);

$csv->main();
exit();
