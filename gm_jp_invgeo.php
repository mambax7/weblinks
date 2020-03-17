<?php

// $Id: gm_jp_invgeo.php,v 1.1 2011/12/29 14:32:28 ohwada Exp $

// 2007-08-20 K.OHWADA
// check status

// 2007-07-01 K.OHWADA
// is_japanese()

// 2006-11-22 K.OHWADA
// use $xoopsConfig

//================================================================
// WebLinks Module
// inverse Geocoder: <http://nishioka.sakura.ne.jp/>
// 2006-11-04 wye <http://never-ever.info/>
// ͭ����������
//================================================================

//----------------------------------------------------------------
// ��礻��ˡ
//   http://nishioka.sakura.ne.jp/google/ws.php?lon=137.243183&lat=35.091722&format=simple
//
// ��礻���
//   <geometry>
//   <version>0.1</version>
//   <point>
//   <lat>35.09491</lat>
//   <lon>137.229332</lon>
//   <address>���θ�˭�Ļ�����Į����253</address>
//   <pref>���θ�</pref>
//   <city>˭�Ļ�</city>
//   <town>����Į����</town>
//   <number>253</number>
//   <distance>1311.58281657</distance>
//   </point>
//   </geometry>
//
//  <Errors>
//  <Error>
//  <Code>1</Code>
//  <Message>����ǡ����ϸ��Ĥ���ޤ���Ǥ���</Message>
//  </Error>
//  </Errors>
//
//  <Errors>
//  <Error>
//  <Code>1</Code>
//  <Message>�����ϰϳ��Ǥ���... </Message>
//  </Error>
//  </Errors>
//----------------------------------------------------------------

$DEBUG = false;

include_once '../../mainfile.php';
include_once XOOPS_ROOT_PATH . '/class/snoopy.php';
include_once XOOPS_ROOT_PATH . '/modules/happy_linux/include/multibyte.php';
include_once XOOPS_ROOT_PATH . '/modules/happy_linux/class/system.php';

$snoopy = new Snoopy();
$system = happy_linux_system::getInstance();

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

// Akashi Muncipal Planetaruim: Akashi, Japan
$lon = 34.649334665716;
$lat = 135.0;
if (isset($_GET['lon']) && isset($_GET['lat'])) {
    $lon = (float)$_GET['lon'];
    $lat = (float)$_GET['lat'];
}

if ($system->is_japanese()) {
    $url = 'http://nishioka.sakura.ne.jp/google/ws.php' . '?lon=' . $lon . '&lat=' . $lat . '&format=simple' . '&version=0.1';

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
