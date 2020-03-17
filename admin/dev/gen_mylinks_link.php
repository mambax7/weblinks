<?php

// $Id: gen_mylinks_link.php,v 1.2 2011/12/29 19:54:56 ohwada Exp $

//================================================================
// WebLinks Module
// 2007-03-07 K.OHWADA
//================================================================

// ---------------------------------------------------------------
// 2011-12-29 K.OHWADA
// PHP 5.3 : Assigning the return value of new by reference is now deprecated.
// ---------------------------------------------------------------

include_once 'dev_header.php';
include_once 'gen_mylinks_class.php';

$genarete = new weblinks_gen_mylinks();

dev_header();

$CID = 1;
$MAX_LINK = 1000;

echo "<h3>generete mylinks link in one category</h3>\n";

for ($i = 1; $i <= $MAX_LINK; $i++) {
    // link table
    $link_title = $genarete->get_randum_title();
    $lid = $genarete->insert_mylinks_link($CID, $link_title);

    // text table
    $genarete->insert_mylinks_text($lid, $link_title);
}

echo "<h3>end</h3>\n";
echo "$MAX_LINK links in category $CID <br>\n";

dev_footer();
// =====
