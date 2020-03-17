<?php

// $Id: gm_jp_geocode.php,v 1.1 2011/12/29 14:32:29 ohwada Exp $

// 2007-08-20 K.OHWADA
// check status
// urlencode

// 2007-07-01 K.OHWADA
// is_japanese()

//=========================================================
// WebLinks Module
// Geocode: <http://pc035.tkl.iis.u-tokyo.ac.jp/~sagara/geocode/>
// 2006-11-22  wye <http://never-ever.info/>
// ͭ����������
//=========================================================

//----------------------------------------------------------------
// CSIS����ץ른�������ǥ��󥰼¸� ���õ���
//   http://pc035.tkl.iis.u-tokyo.ac.jp/~sagara/geocode/modules/simple-geocode1/index.php?id=2
//
// ��礻��ˡ
//   http://geocode.csis.u-tokyo.ac.jp/cgi-bin/simple_geocode.cgi?addr=<����>[���ץ����ѥ�᡼��...]
//   addr:    ����
//   charset: x-euc-jp, Shift_JIS, ISO-2022-JP, UTF8 ,[�ǥե���ȼ�ư]
//   geosys:  tokyo(����¬�Ϸ�), [world](����¬�Ϸ�)
//   series:  [ADDRESS](����), STATION(��̾), PLACE(��̾), FACILITY(��������)
//   constraint: �ʤ���ߤ�����̾��ʸ����[��ά�������Ƥη�̤��֤�]
//
// ��礻���
//   <results>
//   <query>���Į</query>
//   <geodetic>wgs1984</geodetic>
//   <iConf>2</iConf>
//   <converted>���Į</converted>
//   <candidate>
//     <address>�̳�ƻ/ȡ�ۻ�/���Į</address>
//     <longitude>140.725098</longitude>
//     <latitude>41.769379</latitude>
//     <iLvl>5</iLvl>
//   </candidate>
//   <candidate>
//     <address>��긩/��ػ�/���Į</address>
//     <longitude>141.135269</longitude>
//     <latitude>38.928810</latitude>
//     <iLvl>5</iLvl>
//   </candidate>
//   </results>
//
// ��礻ʸ������Ŭ�ڤʤȤ�
//   <title>500 Internal Server Error</title>
//----------------------------------------------------------------

$DEBUG = false;

include_once '../../mainfile.php';
include_once XOOPS_ROOT_PATH . '/class/snoopy.php';
include_once XOOPS_ROOT_PATH . '/modules/happy_linux/include/multibyte.php';
include_once XOOPS_ROOT_PATH . '/modules/happy_linux/class/strings.php';
include_once XOOPS_ROOT_PATH . '/modules/happy_linux/class/system.php';
include_once XOOPS_ROOT_PATH . '/modules/happy_linux/class/post.php';

$snoopy = new Snoopy();
$system = happy_linux_system::getInstance();
$post = happy_linux_post::getInstance();

// null result
$xml = <<<END_OF_TEXT
<?xml version="1.0" encoding="UTF-8" ?>
<Errors>
<Error>
<Code>1</Code>
<Message>No Response</Message>
</Error>
</Errors>
END_OF_TEXT;

$query = $post->get_get_text('query');

if ($system->is_japanese() && $query) {
    $url = 'http://geocode.csis.u-tokyo.ac.jp/cgi-bin/simple_geocode.cgi' . '?addr=' . urlencode($query) . '&charset=UTF8' . '&geosys=world' . '&series=ADDRESS';

    if ($snoopy->fetch($url)) {
        // check status
        if (200 == $snoopy->status) {
            $xml = $snoopy->results;
        } elseif ($DEBUG) {
            $xml = $snoopy->results;
            $xml .= '<status>' . $snoopy->status . '</status>';
        }
    }
}

happy_linux_http_output('pass');
header('Content-type: application/xml;charset=utf-8');
echo $xml;
exit();
