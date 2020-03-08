<?php
// $Id: blocks.php,v 1.10 2008/02/26 16:01:45 ohwada Exp $

// 2008-02-17 K.OHWADA
// _MB_WEBLINKS_GM_CONTROL

// 2007-10-10 K.OHWADA
// _MB_WEBLINKS_GM_MARKER_WIDTH

// 2007-08-01 K.OHWADA
// _MB_WEBLINKS_CAT_TITLE_LENGTH

// 2007-04-08
// _MB_WEBLINKS_PHOTOS

// 2007-03-25 K.OHWADA
// google map

// 2006-11-03 hiro
// random block

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//=========================================================
// WebLinks Module
// language for Blocks
// 2004-10-24 K.OHWADA
// ͭ����������
//=========================================================

// --- define language begin ---
if (!defined('WEBLINKS_LANG_BL_LOADED')) {
    define('WEBLINKS_LANG_BL_LOADED', 1);

    // top.html
    define('_MB_WEBLINKS_DISP', 'ɽ����󥯿�');
    define('_MB_WEBLINKS_LINKS', ' ��');
    define('_MB_WEBLINKS_CHARS', 'ɽ�����̾��Ĺ��');
    define('_MB_WEBLINKS_LENGTH', ' �Х���');
    define('_MB_WEBLINKS_NEWDAYS', '�����󥯤�����');
    define('_MB_WEBLINKS_DAYS', ' ��');
    define('_MB_WEBLINKS_POPULAR', '�͵���󥯤Υҥåȿ�');
    define('_MB_WEBLINKS_HITS', ' �ҥåȿ�');
    define('_MB_WEBLINKS_PIXEL', ' �ԥ�����');
    define('_MB_WEBLINKS_RATING', 'ɾ��');
    define('_MB_WEBLINKS_VOTES', '��ɼ��');
    define('_MB_WEBLINKS_COMMENTS', '������');

    // catlist.html
    define('_MB_WEBLINKS_TOTAL_LINKS', '����Ͽ��󥯿�');
    define('_MB_WEBLINKS_IMAGE_MODE', '���ƥ������������');
    define('_MB_WEBLINKS_IMAGE_MODE_0', '�ʤ�');
    define('_MB_WEBLINKS_IMAGE_MODE_1', 'folder.gif');
    define('_MB_WEBLINKS_IMAGE_MODE_2', '���ꤷ������');
    define('_MB_WEBLINKS_MAX_WIDTH', '�����κ���ɽ����');
    define('_MB_WEBLINKS_WIDTH_DEFAULT', '�����Υǥե����ɽ����');

    // by Tom
    define('_MB_WEBLINKS_DISPSUB', '���֥��ƥ���κ���ɽ������');

    // atom feed
    define('_MB_WEBLINKS_NUM_FEED', 'ɽ��������');
    define('_MB_WEBLINKS_NUM_TITLE', '�����ȥ��Ĺ��');
    define('_MB_WEBLINKS_NUM_SUMMARY', '�����Ĺ��');
    define('_MB_WEBLINKS_NUM_CONTENT', '��ʸ��ɽ�����뵭����');
    define('_MB_WEBLINKS_LINK_ID', '���ID');
    define('_MB_WEBLINKS_NO_LINK_ID', '���ID�����򤵤�Ƥ��ʤ�');
    define('_MB_WEBLINKS_NO_ATOMFEED', '�������뵭�����ʤ�');
    define('_MB_WEBLINKS_MORE', '��äȾܤ���');

    // 2006-11-03 added by hiro
    // random block
    define('_MB_WEBLINKS_MAX_DESC', '��ʸ��ʸ����');
    define('_MB_WEBLINKS_SHOW_DATE', '���դ���ɽ������');
    define('_MB_WEBLINKS_MODE_URL', 'URL��ɽ����ˡ');
    define('_MB_WEBLINKS_MODE_URL_SINGLE', 'singlelink.php');
    define('_MB_WEBLINKS_MODE_URL_VISIT', 'visit.php');
    define('_MB_WEBLINKS_MODE_URL_DIRECT', 'URL��ľ��ɽ��');
    define('_MB_WEBLINKS_URL_EMPTY', '����URL');
    define('_MB_WEBLINKS_URL_EMPTY_INCLUDE', '����URL��ޤ�');
    define('_MB_WEBLINKS_URL_EMPTY_EXCLUDE', '����URL���������');
    define('_MB_WEBLINKS_CATEGORY', '���ƥ������');
    define('_MB_WEBLINKS_WITH_SUBCAT', '���֥��ƥ����ޤ�');
    define('_MB_WEBLINKS_MODE', '��󥯡��⡼��');
    define('_MB_WEBLINKS_RECOMMEND', '�������᥵����');
    define('_MB_WEBLINKS_MUTUAL', '��ߥ�󥯥�����');
    define('_MB_WEBLINKS_RANDOM', '��󥯤�������ɽ������');
    define('_MB_WEBLINKS_ORDER', 'ɽ���Υ����Ƚ�');
    define('_MB_WEBLINKS_ORDER_DESC', '�֥�󥯤�������ɽ������פ��֤������פΤȤ���ͭ��');
    define('_MB_WEBLINKS_TIME_UPDATE', '������');
    define('_MB_WEBLINKS_TIME_CREATE', '��Ͽ��');
    define('_MB_WEBLINKS_TITLE', '�����ȥ�');
    define('_MB_WEBLINKS_ASC', '����');
    define('_MB_WEBLINKS_DESC', '�߽�');

    // === 2007-03-25 ===
    // google map
    define('_MB_WEBLINKS_GM_MODE', 'GoogleMap �⡼��');
    define('_MB_WEBLINKS_GM_MODE_DSC', '0:��ɽ��, 1:�ǥե����, 2:������������');
    define('_MB_WEBLINKS_GM_LATITUDE', '����');
    define('_MB_WEBLINKS_GM_LONGITUDE', '����');
    define('_MB_WEBLINKS_GM_ZOOM', '������');
    define('_MB_WEBLINKS_GM_HEIGHT', 'ɽ���ι⤵');
    define('_MB_WEBLINKS_GM_TIMEOUT', 'ɽ�����ٱ����');
    define('_MB_WEBLINKS_GM_TIMEOUT_DSC', '�ߥ���  -1:window.onload');

    // 2007-04-08
    define('_MB_WEBLINKS_PHOTOS', '�̿������');

    // === 2007-08-01 ===
    define('_MB_WEBLINKS_CAT_TITLE_LENGTH', '���ƥ��ꡦ�����ȥ��ʸ����');
    define('_MB_WEBLINKS_GM_DESC_LENGTH', 'map����ʸ��ʸ����');
    define('_MB_WEBLINKS_GM_WORDWRAP', 'map��wordwrap��ʸ����');

    // === 2007-10-10 ===
    define('_MB_WEBLINKS_GM_MARKER_WIDTH', 'map�Υޡ������β���');

    // === 2008-02-17 ===
    define('_MB_WEBLINKS_GM_CONTROL', 'map�Υޥåס�����ȥ���');
    define('_MB_WEBLINKS_GM_CONTROL_DSC', '0:��ɽ��, 1:ɽ��');
    define('_MB_WEBLINKS_GM_TYPE_CONTROL', 'map���Ͽ޷����ܥ���');
}// --- define language end ---
