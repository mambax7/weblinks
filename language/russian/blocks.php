<?php
// $Id: blocks.php,v 1.1 2012/04/09 10:20:06 ohwada Exp $

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
//=========================================================
// _LANGCODE: ru
// _CHARSET : cp1251
// Translator: Houston (Contour Design Studio https://www.cdesign.ru/)

// --- define language begin ---
if (!defined('WEBLINKS_LANG_BL_LOADED')) {
    define('WEBLINKS_LANG_BL_LOADED', 1);
    // top.html
    define('_MB_WEBLINKS_DISP', '����������');
    define('_MB_WEBLINKS_LINKS', '������');
    define('_MB_WEBLINKS_CHARS', '����� ���������');
    define('_MB_WEBLINKS_LENGTH', ' ��������');
    define('_MB_WEBLINKS_NEWDAYS', '���� ����� ������');
    define('_MB_WEBLINKS_DAYS', ' ����');
    define('_MB_WEBLINKS_POPULAR', '��������� ���������� ������');
    define('_MB_WEBLINKS_HITS', ' ���������');
    define('_MB_WEBLINKS_PIXEL', ' ��������');
    define('_MB_WEBLINKS_RATING', '������');
    define('_MB_WEBLINKS_VOTES', '�������');
    define('_MB_WEBLINKS_COMMENTS', '������������');

    // catlist.html
    define('_MB_WEBLINKS_TOTAL_LINKS', '�����');
    define('_MB_WEBLINKS_IMAGE_MODE', '�������� ����������� ���������');
    define('_MB_WEBLINKS_IMAGE_MODE_0', 'NONE');
    define('_MB_WEBLINKS_IMAGE_MODE_1', 'folder.gif');
    define('_MB_WEBLINKS_IMAGE_MODE_2', '��������� �����������');
    define('_MB_WEBLINKS_MAX_WIDTH', '������������ ������ �����������');
    define('_MB_WEBLINKS_WIDTH_DEFAULT', '������ ����������� �� ���������');
    define('_MB_WEBLINKS_DISPSUB', '������������ ����� ������������');

    // atom feed
    define('_MB_WEBLINKS_NUM_FEED', '���������� �������');
    define('_MB_WEBLINKS_NUM_TITLE', '����� ���������');
    define('_MB_WEBLINKS_NUM_SUMMARY', '����� �������� ����������');
    define('_MB_WEBLINKS_NUM_CONTENT', '���������� �������, ������� ���������� ����������');
    define('_MB_WEBLINKS_LINK_ID', 'ID ������');
    define('_MB_WEBLINKS_NO_LINK_ID', '�� ������ ������ ID ������');
    define('_MB_WEBLINKS_NO_ATOMFEED', '��� ���������������� ������');
    define('_MB_WEBLINKS_MORE', '���������');

    // 2006-11-03
    // random block
    define('_MB_WEBLINKS_MAX_DESC', '������������ ����� ��������');
    define('_MB_WEBLINKS_SHOW_DATE', '���������� ����');
    define('_MB_WEBLINKS_MODE_URL', '����� ������ ������');
    define('_MB_WEBLINKS_MODE_URL_SINGLE', 'singlelink.php');
    define('_MB_WEBLINKS_MODE_URL_VISIT', 'visit.php');
    define('_MB_WEBLINKS_MODE_URL_DIRECT', '���������� ������ �����');
    define('_MB_WEBLINKS_URL_EMPTY', '������ �����');
    define('_MB_WEBLINKS_URL_EMPTY_INCLUDE', '�������� ������ �����');
    define('_MB_WEBLINKS_URL_EMPTY_EXCLUDE', '��������� ������ �����');
    define('_MB_WEBLINKS_CATEGORY', '���������');
    define('_MB_WEBLINKS_WITH_SUBCAT', '� ��������������');
    define('_MB_WEBLINKS_MODE', '����� ������');
    define('_MB_WEBLINKS_RECOMMEND', '��������������� ����');
    define('_MB_WEBLINKS_MUTUAL', '������ ����');
    define('_MB_WEBLINKS_RANDOM', '��������� ����������');
    define('_MB_WEBLINKS_ORDER', '�������');
    define('_MB_WEBLINKS_ORDER_DESC', '�������������, ����� "��������� ����������" ���');
    define('_MB_WEBLINKS_TIME_UPDATE', '����� ����������');
    define('_MB_WEBLINKS_TIME_CREATE', '����� ��������');
    define('_MB_WEBLINKS_TITLE', '���������');
    define('_MB_WEBLINKS_ASC', '�����������');
    define('_MB_WEBLINKS_DESC', '��������');

    // === 2007-03-25 ===
    // google map
    define('_MB_WEBLINKS_GM_MODE', '����� ����� Google');
    define('_MB_WEBLINKS_GM_MODE_DSC', '0:�� ����������, 1:�� ���������, 2:��������� ��������');
    define('_MB_WEBLINKS_GM_LATITUDE', '������');
    define('_MB_WEBLINKS_GM_LONGITUDE', '�������');
    define('_MB_WEBLINKS_GM_ZOOM', '����������');
    define('_MB_WEBLINKS_GM_HEIGHT', '������ ������� �����');
    define('_MB_WEBLINKS_GM_TIMEOUT', '����� �������� ��� ���������');
    define('_MB_WEBLINKS_GM_TIMEOUT_DSC', '��  -1:window.onload');

    // 2007-04-08
    define('_MB_WEBLINKS_PHOTOS', '���������� ����������');

    // === 2007-08-01 ===
    define('_MB_WEBLINKS_CAT_TITLE_LENGTH', '����� ��������� ���������');
    define('_MB_WEBLINKS_GM_DESC_LENGTH', '����� ���������� � ��������� �����');
    define('_MB_WEBLINKS_GM_WORDWRAP', '����� �������� ����� � ��������� �����');

    // === 2007-10-10 ===
    define('_MB_WEBLINKS_GM_MARKER_WIDTH', '������ ��������� �����');

    // === 2008-02-17 ===
    define('_MB_WEBLINKS_GM_CONTROL', '���������� �����');
    define('_MB_WEBLINKS_GM_CONTROL_DSC', '0:�� ����������, 1:����������');
    define('_MB_WEBLINKS_GM_TYPE_CONTROL', '��� ���������� �����');
}// --- define language end ---
