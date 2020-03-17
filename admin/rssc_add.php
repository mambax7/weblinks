<?php

use XoopsModules\Weblinks\Admin;

use XoopsModules\Weblinks;
use XoopsModules\Weblinks\Helper;
use XoopsModules\Happylinux;

// $Id: rssc_add.php,v 1.3 2012/04/11 06:10:31 ohwada Exp $

//=========================================================
// WebLinks Module
// 2012-04-02 K.OHWADA
//=========================================================

//-------------------------------
// TODO
// $_POST['title'] = $title;
//-------------------------------

include 'admin_header.php';

if (WEBLINKS_RSSC_USE) {
    include_once WEBLINKS_RSSC_ROOT_PATH . '/api/lang_main.php';
    include_once WEBLINKS_RSSC_ROOT_PATH . '/api/view.php';
    include_once WEBLINKS_RSSC_ROOT_PATH . '/api/refresh.php';
    include_once WEBLINKS_RSSC_ROOT_PATH . '/api/manage.php';

//    include_once WEBLINKS_ROOT_PATH . '/class/weblinks_rssc_handler.php';
//    include_once WEBLINKS_ROOT_PATH . '/admin/rssc_manage_class.php';
}

//=========================================================
// class RsscAdd
//=========================================================
class RsscAdd
{
    public $_db;
    public $_system_class;
    public $_html_class;
    public $_rss_utility;
    public $_rssc_edit_handler;

    public $_table_link;

    public $_error = null;

    public $_LIMIT = 50;

    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct($dirname)
    {
        $this->_db = XoopsDatabaseFactory::getDatabaseConnection();

        $this->_table_link = $this->_db->prefix($dirname . '_link');

        $this->_system_class = Happylinux\System::getInstance();
        $this->_html_class = happy_linux_html::getInstance();

        $this->_rss_utility = happy_linux_rss_utility::getInstance();
        $this->_rssc_edit_handler = weblinks_get_handler('RsscEdit', $dirname);
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
        if (WEBLINKS_RSSC_USE) {
            $this->main_execute();
        } else {
            xoops_error('require rssc module');
        }
    }

    public function main_execute()
    {
        $op = 'main';
        if (isset($_POST['op'])) {
            $op = $_POST['op'];
        }

        $sql = 'SELECT count(*) FROM ' . $this->_table_link;
        $total = $this->get_count_by_sql($sql);

        $this->print_title();

        switch ($op) {
            case 'link_to_rssc':
                $this->link_to_rssc($total);
                break;
            case 'main':
            default:
                $this->form_next_link($total, 0);
                break;
        }
    }

    public function print_title()
    {
        $paths = [];
        $paths[] = [
            'name' => $this->_system_class->get_module_name(),
            'url' => 'index.php',
        ];
        $paths[] = [
            'name' => _AM_WEBLINKS_TITLE_RSSC_MANAGE,
            'url' => 'rssc_manage.php',
        ];
        $paths[] = [
            'name' => _AM_WEBLINKS_TITLE_RSSC_ADD,
        ];

        echo $this->_html_class->build_html_bread_crumb($paths);

        echo '<h3>' . _AM_WEBLINKS_TITLE_RSSC_ADD . "</h3>\n";
        echo _AM_WEBLINKS_TITLE_RSSC_ADD_DSC;
        echo "<br><br>\n";
    }

    public function link_to_rssc($total)
    {
        $offset = 0;
        if (isset($_POST['offset'])) {
            $offset = $_POST['offset'];
        }

        $start = $offset + 1;
        $next = $offset + $this->_LIMIT;

        echo "Excute $start - $next th link <br><br>";

        $sql = 'SELECT * FROM ' . $this->_table_link . ' ORDER BY lid';
        $rows = $this->get_rows_by_sql($sql, $this->_LIMIT, $offset);

        foreach ($rows as $row) {
            $lid = $row['lid'];
            $title = $row['title'];
            $url = $row['url'];
            $rssc_lid = $row['rssc_lid'];

            if (empty($url)) {
                echo "$lid : skip no url <br>\n";
                continue;
            }

            if ($rssc_lid) {
                echo "$lid : skip already rss_lid <br>\n";
                continue;
            }

            $ret = $this->add_rssc($lid, $title, $url);
            if ($ret) {
                echo "$lid : added rssc <br>\n";
            } else {
                echo "$lid : " . $this->_error . "<br>\n";
            }
        }

        if ($total > $next) {
            $this->form_next_link($total, $next);
        } else {
            $this->finish();
        }
    }

    public function add_rssc($lid, $title, $url)
    {
        $this->_error = null;

        $ret1 = $this->discovery($url);
        if (!$ret1) {
            return false;
        }

        // catch in build_rssc of weblinks_rssc_handler.php
        $_POST['title'] = $title;
        $_POST['url'] = $url;

        $this->_rssc_edit_handler->clear_errors_logs();
        $ret2 = $this->_rssc_edit_handler->add_rssc($lid);
        switch ($ret2) {
            case 0:
                return true;
            // update_rssc_lid
            case RSSC_CODE_LINK_ALREADY:
                $this->_error = 'link already';

                return false;
            // check_necessary_param
            case RSSC_CODE_DISCOVER_FAILED:
                $this->_error = 'discover failed';

                return false;
            // check_necessary_param
            case WEBLINKS_CODE_RSSC_NOT_FIND_PARAM:
                $this->_error = 'not find param';

                return false;
            // refresh_link
            case RSSC_CODE_PARSE_MSG:
                $this->_error = $this->_rssc_edit_handler->get_parse_result();

                return false;
            // refresh_link
            case RSSC_CODE_PARSE_FAILED:
            case RSSC_CODE_REFRESH_ERROR:
            case WEBLINKS_CODE_DB_ERROR:
            default:
                $error = $this->_rssc_edit_handler->getErrors(1);
                if (empty($error)) {
                    $error = " error code $ret2 ";
                }
                $this->_error = $error;

                return false;
        }

        return true;
    }

    public function discovery($url)
    {
        $ret = $this->_rss_utility->discover($url);
        if (!$ret) {
            $this->_error = _RSSC_DISCOVER_FAILED;

            return false;
        }

        // catch in build_rssc of weblinks_rssc_handler.php
        $_POST['rss_flag'] = $this->_rss_utility->get_xml_mode();
        $_POST['rss_url'] = $this->_rss_utility->get_xmlurl_by_mode();

        return true;
    }

    public function form_next_link($total, $next)
    {
        $action = xoops_getenv('PHP_SELF');
        $submit = "GO next $this->_LIMIT links";
        $next2 = $next + $this->_LIMIT;

        $text = <<<EOF
<br>
<hr>
<h4>excute link table</h4>
There are $total links <br>
$next - $next2 th link<br>
<br>
<form action="$action" method="post">
<input type="hidden" name="op" value="link_to_rssc">
<input type="hidden" name="offset" value="$next">
<input type="submit" value="$submit">
</form>
EOF;

        echo $text;
    }

    public function finish()
    {
        echo "<br><hr>\n";
        echo "<h4>FINISHED</h4>\n";
        echo "<a href='index.php'>GOTO Admin Menu</a><br>\n";
    }

    //---------------------------------------------------------
    // sql
    //---------------------------------------------------------
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

    // --- class end ---
}

//=========================================================
// main
//=========================================================
$rssc = RsscAdd::getInstance(WEBLINKS_DIRNAME);

xoops_cp_header();
$rssc->main();
xoops_cp_footer();
exit();
