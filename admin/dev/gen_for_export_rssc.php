<?php

// $Id: gen_for_export_rssc.php,v 1.2 2011/12/29 19:54:56 ohwada Exp $

//================================================================
// WebLinks Module
// 2006-09-20 K.OHWADA
//================================================================

// ---------------------------------------------------------------
// 2011-12-29 K.OHWADA
// PHP 5.3 : Assigning the return value of new by reference is now deprecated.
// ---------------------------------------------------------------

include_once 'dev_header.php';

//=========================================================
// class genarate_rssc
//=========================================================

/**
 * Class weblinks_genarate_rssc
 */
class weblinks_genarate_rssc extends weblinks_gen_record
{
    //---------------------------------------------------------
    // constructor
    //---------------------------------------------------------
    public function __construct()
    {
        parent::__construct();
    }

    //---------------------------------------------------------
    // rssc link table
    //---------------------------------------------------------

    /**
     * @param $MAX_LINK
     */
    public function gen_rssc_link($MAX_LINK)
    {
        echo "<h4>generate rssc link table</h4>\n";

        if (0 == $MAX_LINK) {
            echo "skip <br>\n";

            return;
        }

        mt_srand((float)microtime() * 1000000);

        for ($i = 0; $i < $MAX_LINK; $i++) {
            $title = $this->get_randum_title();
            $newid = $this->insert_rssc_link($title);

            $num = mt_rand(1, 10);
            for ($j = 1; $j < $num; $j++) {
                $this->insert_rssc_feed($newid, $title);
            }
        }
    }

    /**
     * @param $MAX_LINK
     * @param $MAX_CAT
     */
    public function gen_link_without_rssc_link($MAX_LINK, $MAX_CAT)
    {
        echo "<h4>generate link table</h4>\n";

        if (0 == $MAX_LINK) {
            echo "skip <br>\n";

            return;
        }

        mt_srand((float)microtime() * 1000000);

        for ($i = 0; $i < $MAX_LINK; $i++) {
            $site_title = $this->get_randum_title();
            $rss_url = "http://$site_title/rss.xml";
            $rss_flag = 1;

            $newid = $this->insert_randum_link($site_title, $rss_flag, $rss_url);

            $catnum = mt_rand(1, 3);
            for ($j = 0; $j < $catnum; $j++) {
                $cid = mt_rand(1, $MAX_CAT);
                $this->insert_catlink($cid, $newid);
            }

            $num = mt_rand(1, 10);
            for ($j = 0; $j < $num; $j++) {
                $this->insert_atomfeed($newid, $site_title);
            }
        }
    }

    /**
     * @param $MAX_LINK
     * @param $MAX_CAT
     */
    public function gen_link_with_rssc_link($MAX_LINK, $MAX_CAT)
    {
        echo "<h4>generate link table and rssc link table</h4>\n";

        if (0 == $MAX_LINK) {
            echo "skip <br>\n";

            return;
        }

        mt_srand((float)microtime() * 1000000);

        for ($i = 0; $i < $MAX_LINK; $i++) {
            $site_title = $this->get_randum_title();
            $rss_url = "http://$site_title/rss.xml";
            $rss_flag = 1;
            $mode = 2;

            $newid = $this->insert_randum_link($site_title, $rss_flag, $rss_url);
            $new_rssc_lid = $this->insert_rssc_link($site_title, $mode, $rss_url);

            $catnum = mt_rand(1, 3);
            for ($j = 0; $j < $catnum; $j++) {
                $cid = mt_rand(1, $MAX_CAT);
                $this->insert_catlink($cid, $newid);
            }

            // same title & time
            for ($j = 0; $j < 3; $j++) {
                $title = $this->get_randum_title();
                $time = $this->get_randum_time();
                $this->insert_atomfeed($newid, $site_title, $title, $time);
                $this->insert_rssc_feed($new_rssc_lid, $site_title, $title, $time);
            }

            // same title
            for ($j = 0; $j < 3; $j++) {
                $title = $this->get_randum_title();
                $this->insert_atomfeed($newid, $site_title, $title);
                $this->insert_rssc_feed($new_rssc_lid, $site_title, $title);
            }

            // for each
            $num = mt_rand(1, 5);
            for ($j = 0; $j < $num; $j++) {
                $this->insert_atomfeed($newid, $site_title);
                $this->insert_rssc_feed($new_rssc_lid, $site_title);
            }
        }
    }

    /**
     * @param        $lid
     * @param        $site_title
     * @param string $title
     * @param int    $time_created
     */
    public function insert_atomfeed($lid, $site_title, $title = '', $time_created = 0)
    {
        if ('' == $title) {
            $title = $this->get_randum_title();
        }

        if (0 == $time_created) {
            $time_created = $this->get_randum_time();
        }

        $site_url = "http://$site_title/";
        $url = "http://$title/";
        $time_issued = $time_created;
        $time_modified = $time_created;

        $content = "$title\n $time_created\n";

        $entry_id = '';
        $guid = '';
        $author_name = '';
        $author_url = '';
        $author_email = '';

        // insert
        $atomfeed_table = $this->prefix('atomfeed');

        $sql = 'INSERT INTO ' . $atomfeed_table . ' (';
        $sql .= 'lid, ';
        $sql .= 'site_title, ';
        $sql .= 'site_url, ';
        $sql .= 'title, ';
        $sql .= 'url, ';
        $sql .= 'entry_id, ';
        $sql .= 'guid, ';
        $sql .= 'time_modified, ';
        $sql .= 'time_issued, ';
        $sql .= 'time_created, ';
        $sql .= 'author_name, ';
        $sql .= 'author_url, ';
        $sql .= 'author_email, ';
        $sql .= 'content ';
        $sql .= ') VALUES (';
        $sql .= (int)$lid . ', ';
        $sql .= $this->quote($site_title) . ', ';
        $sql .= $this->quote($site_url) . ', ';
        $sql .= $this->quote($title) . ', ';
        $sql .= $this->quote($url) . ', ';
        $sql .= $this->quote($entry_id) . ', ';
        $sql .= $this->quote($guid) . ', ';
        $sql .= $time_modified . ', ';
        $sql .= $time_issued . ', ';
        $sql .= (int)$time_created . ', ';
        $sql .= $this->quote($author_name) . ', ';
        $sql .= $this->quote($author_url) . ', ';
        $sql .= $this->quote($author_email) . ', ';
        $sql .= $this->quote($content) . ' ';
        $sql .= ')';

        $this->query($sql);
    }

    /**
     * @param        $title
     * @param int    $mode
     * @param string $rss_url
     * @return mixed
     */
    public function insert_rssc_link($title, $mode = 0, $rss_url = '')
    {
        global $RSSC_DIRNAME;
        $rssc_link_table = $this->db_prefix($RSSC_DIRNAME . '_link');

        $rdf_url = '';
        $atom_url = '';

        if (0 == $mode) {
            $mode = mt_rand(1, 3);
            $rdf_url = "http://$title/rdf.xml";
            $rss_url = "http://$title/rss.xml";
            $atom_url = "http://$title/atom.xml";
        }

        $url = "http://$title/";
        $ltype = mt_rand(0, 1);
        $headline = mt_rand(0, 10);
        $updated_unix = $this->get_randum_time();

        $uid = 1;    // admin
        $mid = 0;
        $p1 = 0;
        $p2 = 0;
        $p3 = 0;
        $encoding = 'utf-8';
        $refresh = 3600;
        $channel = '';
        $xml = '';
        $aux_int_1 = 0;
        $aux_int_2 = 0;
        $aux_text_1 = '';
        $aux_text_2 = '';

        // insert
        $sql = 'INSERT INTO ' . $rssc_link_table . ' (';
        $sql .= 'uid, ';
        $sql .= 'mid, ';
        $sql .= 'p1, ';
        $sql .= 'p2, ';
        $sql .= 'p3, ';
        $sql .= 'title, ';
        $sql .= 'url, ';
        $sql .= 'ltype, ';
        $sql .= 'rdf_url, ';
        $sql .= 'rss_url, ';
        $sql .= 'atom_url, ';
        $sql .= 'mode, ';
        $sql .= 'encoding, ';
        $sql .= 'refresh, ';
        $sql .= 'headline, ';
        $sql .= 'updated_unix, ';
        $sql .= 'channel, ';
        $sql .= 'xml, ';
        $sql .= 'aux_int_1, ';
        $sql .= 'aux_int_2, ';
        $sql .= 'aux_text_1, ';
        $sql .= 'aux_text_2 ';
        $sql .= ') VALUES (';
        $sql .= $uid . ', ';
        $sql .= $mid . ', ';
        $sql .= $p1 . ', ';
        $sql .= $p2 . ', ';
        $sql .= $p3 . ', ';
        $sql .= $this->quote($title) . ', ';
        $sql .= $this->quote($url) . ', ';
        $sql .= $ltype . ', ';
        $sql .= $this->quote($rdf_url) . ', ';
        $sql .= $this->quote($rss_url) . ', ';
        $sql .= $this->quote($atom_url) . ', ';
        $sql .= (int)$mode . ', ';
        $sql .= $this->quote($encoding) . ', ';
        $sql .= $refresh . ', ';
        $sql .= $headline . ', ';
        $sql .= $updated_unix . ', ';
        $sql .= $this->quote($channel) . ', ';
        $sql .= $this->quote($xml) . ', ';
        $sql .= $aux_int_1 . ', ';
        $sql .= $aux_int_2 . ', ';
        $sql .= $this->quote($aux_text_1) . ', ';
        $sql .= $this->quote($aux_text_2) . ' ';
        $sql .= ')';

        $this->query($sql);
        $newid = $this->getInsertId();

        return $newid;
    }

    /**
     * @param        $lid
     * @param        $site_title
     * @param string $title
     * @param int    $updated_unix
     */
    public function insert_rssc_feed($lid, $site_title, $title = '', $updated_unix = 0)
    {
        global $RSSC_DIRNAME;
        $rssc_feed_table = $this->db_prefix($RSSC_DIRNAME . '_feed');

        if ('' == $title) {
            $title = $this->get_randum_title();
        }

        if (0 == $updated_unix) {
            $updated_unix = $this->get_randum_time();
        }

        $site_link = "http://$site_title/";
        $link = "http://$title/";
        $published_unix = $updated_unix;

        $content = "$title\n $updated_unix\n";

        $uid = 1;    // admin
        $mid = 0;
        $p1 = 0;
        $p2 = 0;
        $p3 = 0;
        $entry_id = '';
        $guid = '';
        $category = '';
        $author_name = '';
        $author_uri = '';
        $author_email = '';
        $type_cont = 0;
        $raws = '';
        $aux_int_1 = 0;
        $aux_int_2 = 0;
        $aux_text_1 = '';
        $aux_text_2 = '';
        $enclosure_url = '';
        $enclosure_type = '';
        $enclosure_length = 0;

        $search = "$title $link $content";

        // insert
        $sql = 'INSERT INTO ' . $rssc_feed_table . ' (';
        $sql .= 'lid, ';
        $sql .= 'uid, ';
        $sql .= 'mid, ';
        $sql .= 'p1, ';
        $sql .= 'p2, ';
        $sql .= 'p3, ';
        $sql .= 'site_title, ';
        $sql .= 'site_link, ';
        $sql .= 'title, ';
        $sql .= 'link, ';
        $sql .= 'entry_id, ';
        $sql .= 'guid, ';
        $sql .= 'updated_unix, ';
        $sql .= 'published_unix, ';
        $sql .= 'category, ';
        $sql .= 'author_name, ';
        $sql .= 'author_uri, ';
        $sql .= 'author_email, ';
        $sql .= 'type_cont, ';
        $sql .= 'raws, ';
        $sql .= 'content, ';
        $sql .= 'search, ';
        $sql .= 'aux_int_1, ';
        $sql .= 'aux_int_2, ';
        $sql .= 'aux_text_1, ';
        $sql .= 'aux_text_2, ';
        $sql .= 'enclosure_url, ';
        $sql .= 'enclosure_type, ';
        $sql .= 'enclosure_length ';
        $sql .= ') VALUES (';
        $sql .= (int)$lid . ', ';
        $sql .= $uid . ', ';
        $sql .= $mid . ', ';
        $sql .= $p1 . ', ';
        $sql .= $p2 . ', ';
        $sql .= $p3 . ', ';
        $sql .= $this->quote($site_title) . ', ';
        $sql .= $this->quote($site_link) . ', ';
        $sql .= $this->quote($title) . ', ';
        $sql .= $this->quote($link) . ', ';
        $sql .= $this->quote($entry_id) . ', ';
        $sql .= $this->quote($guid) . ', ';
        $sql .= (int)$updated_unix . ', ';
        $sql .= $published_unix . ', ';
        $sql .= $this->quote($category) . ', ';
        $sql .= $this->quote($author_name) . ', ';
        $sql .= $this->quote($author_uri) . ', ';
        $sql .= $this->quote($author_email) . ', ';
        $sql .= $this->quote($type_cont) . ', ';
        $sql .= $this->quote($raws) . ', ';
        $sql .= $this->quote($content) . ', ';
        $sql .= $this->quote($search) . ', ';
        $sql .= $aux_int_1 . ', ';
        $sql .= $aux_int_2 . ', ';
        $sql .= $this->quote($aux_text_1) . ', ';
        $sql .= $this->quote($aux_text_2) . ', ';
        $sql .= $this->quote($enclosure_url) . ', ';
        $sql .= $this->quote($enclosure_type) . ', ';
        $sql .= $enclosure_length . ' ';

        $sql .= ')';

        $this->query($sql);
    }

    // --- class end ---
}

//=========================================================
// main
//=========================================================
$genarete = new weblinks_genarate_rssc();

dev_header();

$RSSC_DIRNAME = 'rssc';
$MAX_CAT = 10;
$MAX_PARENT = 3;
$MAX_LINK = 100;
$MAX_VOTE = 30;
$MAX_COM = 30;
$MAX_RSSC_LINK = 10;

echo "<h3>generate table data for export rssc</h3>\n";

if (!$genarete->is_exist_module($RSSC_DIRNAME)) {
    $msg = $RSSC_DIRNAME . " module is not installed \n";
    echo '<h1 style="color: #ff0000; ">' . $msg . "</h1>\n";
    dev_footer();
    exit();
}

//gen_category( $MAX_CAT,  $MAX_PARENT );
//gen_link(     $MAX_LINK, $MAX_CAT );
//gen_votedata( $MAX_VOTE, $MAX_VOTE/4 );
//gen_comment(  $MAX_COM,  $MAX_COM/4 );

$genarete->gen_rssc_link($MAX_RSSC_LINK);
$genarete->gen_link_without_rssc_link($MAX_RSSC_LINK, $MAX_CAT);
$genarete->gen_link_with_rssc_link($MAX_RSSC_LINK, $MAX_CAT);

echo '<h3>end</h3>';
dev_footer();
// =====
