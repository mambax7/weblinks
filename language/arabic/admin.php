<?php

// $Id: admin.php,v 1.1 2011/12/29 14:32:45 ohwada Exp $

// 2007-12-09 K.OHWADA
// remove _WEBLINKS_ADMIN_CHECK
// add AM_WEBLINKS_D3FORUM_VIEW

// 2007-11-01 K.OHWADA
// _AM_WEBLINKS_GM_MARKER_WIDTH

// 2007-09-01 K.OHWADA
// nofitication
// change _WEBLINKS_LINK_APPROVED _AM_WEBLINKS_USE_HITS

// 2007-08-01 K.OHWADA
// config 0

// 2007-07-14 K.OHWADA
// highlight

// 2007-06-10 K.OHWADA
// d3forum

// 2007-04-08 K.OHWADA
// _AM_WEBLINKS_CAT_DESC_MODE

// 2007-03-25 K.OHWADA
// _AM_WEBLINKS_UPDATE_CAT_IMAGE_SIZE

// 2007-02-20 K.OHWADA
// performance

// 2006-12-11 K.OHWADA
// _AM_WEBLINKS_TIME_PUBLISH

// 2006-10-05 K.OHWADA
// _AM_WEBLINKS_MODULE_CONFIG_3
// google map

// 2006-05-15 K.OHWADA
// weblinks ver 1.1
// _AM_WEBLINKS_INDEX_DESC, etc

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module duplication

//=========================================================
// WebLinks Module
// language for admin
// 2004-10-20 K.OHWADA
//=========================================================

// --- define language begin ---
if (!defined('WEBLINKS_LANG_AM_LOADED')) {
    define('WEBLINKS_LANG_AM_LOADED', 1);

    define('_WEBLINKS_ADMIN_INDEX', '���� ������');

    // BUG 2931: unmatch popup menu 'preference' and index menu 'module setting'
    define('_WEBLINKS_ADMIN_MODULE_CONFIG_1', '������ �������� 1');

    define('_WEBLINKS_ADMIN_MODULE_CONFIG_2', '������ �������� 2');
    //define("_WEBLINKS_ADMIN_ADDMODDEL_CATEGORY","Add, Modify, and Delete Categories");
    define('_WEBLINKS_ADMIN_ADD_LINK', '��� ���� ����');
    define('_WEBLINKS_ADMIN_OTHERFUNC', '������� ������');
    define('_WEBLINKS_ADMIN_GOTO_ADMIN_INDEX', '������ ��� ���� ������');

    //======        config.php         ======
    // Access Authority
    define('_WEBLINKS_ADMIN_AUTH', '��������');
    define('_WEBLINKS_ADMIN_AUTH_TEXT', '������ ���� �� ���� �������');
    define('_WEBLINKS_AUTH_SUBMIT', '���� �� ���� ���� �����');
    define('_WEBLINKS_AUTH_SUBMIT_DSC', '��� ��������� ���� ��� ������� ����� ���� �����');
    define('_WEBLINKS_AUTH_SUBMIT_AUTO', '���� �� ����� ������ ������� �������');
    define('_WEBLINKS_AUTH_SUBMIT_AUTO_DSC', '��� ��������� ���� ����� ������ ��� �������');
    define('_WEBLINKS_AUTH_MODIFY', '������ �������');
    define('_WEBLINKS_AUTH_MODIFY_DSC', '��� ��������� ���� ��� ������� ������ ����� ����� ������');
    define('_WEBLINKS_AUTH_MODIFY_AUTO', '���� �� ����� ��� ������� ������');
    define('_WEBLINKS_AUTH_MODIFY_AUTO_DSC', '��� ��������� ���� ��� ������� �������� ��� ����� ����� ������');
    define('_WEBLINKS_AUTH_RATELINK', '���� �� ���� ����');
    define('_WEBLINKS_AUTH_RATELINK_DSC', '��� ��������� ���� ��� ������� ����� ����.<br> ���� ��� ������ ��� ��� ����� ���� ����� ����� �������');
    define('_WEBLINKS_USE_PASSWD', '���� �� ���� ���� ��� ����� ��� ����');
    define('_WEBLINKS_USE_PASSWD_DSC', '��� ��� ���� �� ���� ���� ����� ���� ���� ��� ����ѡ <br> ��������� ���� ��� ��� ������� ������ / ���� ����� �������.');
    define('_WEBLINKS_USE_RATELINK', '���� �������');
    define('_WEBLINKS_USE_RATELINK_DSC', '��� ���� ������� ������ �������.');
    define('_WEBLINKS_AUTH_UPDATED', '��������� ����');

    // RSS/ATOM
    define('_WEBLINKS_ADMIN_RSS', '������ RSS/ATOM Feeds');
    define('_WEBLINKS_RSS_MODE_AUTO', '����� ��� RSS/ATOM feeds');
    define('_WEBLINKS_RSS_MODE_AUTO_DSC', "��� '������ ������ ������ RSS/ATOM' � '����� ������' ��� ����� RSS/ATOM ������ ���� . ");
    define('_WEBLINKS_RSS_MODE_DATA', '������ ��� RSS/ATOM ������');
    define('_WEBLINKS_RSS_MODE_DATA_DSC', 'ATOM FEED, uses the data in the Atom feed table after parsing. <br>XML uses the data from the link table before parsing. <br>Some data may not be saved in atomfeed table after filtering. ');
    define('_WEBLINKS_RSS_CACHE', '��� ����� �� RSS/ATOM feeds');
    define('_WEBLINKS_RSS_CACHE_DSC', '���� �� �������');
    define('_WEBLINKS_RSS_LIMIT', '���� ��� �� RSS/ATOM feeds');
    define('_WEBLINKS_RSS_LIMIT_DSC', '���� ���� ��� �� RSS/ATOM feeds ������ �� ���� �������<br>�������� ������� ��� ���� ��� ���� ������ ������� ���. <br>0 ��� �����. ');
    define('_WEBLINKS_RSS_SITE', 'RSS search site');
    define('_WEBLINKS_RSS_SITE_DSC', '���� ����� ������ RSS. <br>���� ���� ���� ��� ��� ���� �� ����. <br>�� ���� ������ ATOM. ');
    define('_WEBLINKS_RSS_BLACK', '������� ������� �� ����� RSS/ATOM');
    define('_WEBLINKS_RSS_BLACK_DSC', '���� ����� ������ ������� ������ ��� ��� ������ �� RSS/ATOM feeds . <br>���� �� ����� ��� ���� ��� ����� ���� �� ����. <br>���� �� ���� ����� PERL. ');
    define('_WEBLINKS_RSS_WHITE', '������� ������� �� ����� RSS/ATOM');
    define('_WEBLINKS_RSS_WHITE_DSC', '���� ����� ������ ������� ������ ����� ������ �� ������� ������� feeds . <br>���� �� ����� ��� ���� ��� ����� ���� �� ����. <br>���� �� ���� ����� PERL.  ');
    define('_WEBLINKS_RSS_URL_CHECK', '���� ��� ����� urls ���� �������� �� ������� �������. ');
    define('_WEBLINKS_RSS_URL_CHECK_DSC', '���� ���� ����� �� ������� ������� ��� ����� ������� ��� ��� �����. ');
    define('_WEBLINKS_RSS_UPDATED', '����� ������ RSS/ATOM');

    // RSS/ATOM
    define('_WEBLINKS_ADMIN_RSS_VIEW', '������ ������ RSS/ATOM Feeds');
    define('_WEBLINKS_RSS_MODE_TITLE', '������� ��� HTML �� �������');
    define('_WEBLINKS_RSS_MODE_TITLE_DSC', '��� ��� ��� HTML �� ������� ��� ��� ����� ��� ��� HTML. <br>�� ���� ��� HTML. ');
    define('_WEBLINKS_RSS_MODE_CONTENT', '������� ��� HTML �� �������');
    define('_WEBLINKS_RSS_MODE_CONTENT_DSC', '��� ��� ��� HTML �� ������� ��� ��� ����� ��� ��� HTML. <br>�� ���� ��� HTML. ');
    define('_WEBLINKS_RSS_NEW', '���� ���� ��� ��"RSS/ATOM feeds" ����� �� ���� ������');
    define('_WEBLINKS_RSS_NEW_DSC', '���� ���� ��� �� RSS/ATOM feeds ����� �� ������ ��������.');
    define('_WEBLINKS_RSS_PERPAGE', '���� ����� ������ � RSS/ATOM feeds ��� ���� ��� ���� ����� � ���� RSS/ATOM');
    define('_WEBLINKS_RSS_PERPAGE_DSC', '���� ���� ��� �� RSS/ATOM feeds ��� ���� ��� ���� RSS/ATOM.');
    define('_WEBLINKS_RSS_NUM_CONTENT', '��� feeds ���� ���� �����');
    define('_WEBLINKS_RSS_NUM_CONTENT_DSC', '���� ��� FEED ���� ���� ����� RSS/ATOM feeds �� ���� ������ ������. <br>������� ������ ��� ���� FEED . ');
    define('_WEBLINKS_RSS_MAX_CONTENT', '���� ��� �� ������ �� ����� RSS/ATOM feed');
    define('_WEBLINKS_RSS_MAX_CONTENT_DSC', '���� ���� ��� �� ������ ������ RSS/ATOM feed ���� ��� ���� �� ���� RSS/ATOM.  <br>������ ��� ��� "������ ��� HTML �� �������" "���." ');
    define('_WEBLINKS_RSS_MAX_SUMMARY', '���� ��� �� ������ �� ����� RSS/ATOM feed');
    define('_WEBLINKS_RSS_MAX_SUMMARY_DSC', '���� ���� ��� �� ������ ������ RSS/ATOM feed ���� ���� �� ������ ��������. ');

    // use link field
    define('_WEBLINKS_ADMIN_POST', '������ ���� �������');
    define('_WEBLINKS_ADMIN_POST_TEXT_1', '�� ������ ���� �� ���� �� ����� �������. ');
    define('_WEBLINKS_ADMIN_POST_TEXT_2', '������ ������ ������.');
    define('_WEBLINKS_ADMIN_POST_TEXT_3', '������ �������� ��� �� ����. ');
    define('_WEBLINKS_NO_USE', '�� ������');
    define('_WEBLINKS_USE', '������');
    define('_WEBLINKS_INDISPENSABLE', '�����');
    define('_WEBLINKS_TYPE_DESC', '������� ���� XOOPS DHTML �� �����');
    define('_WEBLINKS_TYPE_DESC_DSC', '"��" ������� ������ ������ ���� �����. <br> "���" ������� ���� XOOPS DHTML.');
    define('_WEBLINKS_CHECK_DOUBLE', '�������� ��� ������ ����� ������');
    define('_WEBLINKS_CHECK_DOUBLE_DSC', '"��" ���� ������ ������ ����� ������.<br> "���" �� ���� ��� ��� ��� ������ ������.');
    define('_WEBLINKS_POST_UPDATED', '����� ���� ������ ����');

    // cateogry
    define('_WEBLINKS_ADMIN_CAT_SET', '������ �������');
    define('_WEBLINKS_CAT_SEL', '��� ������� ���� ������ �� ����� ���� ���� ������');
    define('_WEBLINKS_CAT_SEL_DSC', '���� ��� ������� ���� ������ �� ����� ���� ���� ������ ');
    define('_WEBLINKS_CAT_SUB', '��� ��� ������� �������');
    define('_WEBLINKS_CAT_SUB_DSC', '��� ��� ������� ������� ���� ���� �� ����� ������� ���� ������');
    define('_WEBLINKS_CAT_IMG_MODE', '���� ���� �����');
    define(
        '_WEBLINKS_CAT_IMG_MODE_DSC',
        '"�� ����" (���� ���� )<br> folder.gif (������ ����)<br>"������ ������" (( ������ ���� ������� ����� ) ��� &nbsp;&gt;&gt;��� ������ &gt;&gt;)<br>"����� ��������" �� ���� ���� ����� ((folder.gif) ��� &nbsp;&gt;&gt;��� ������ &gt;&gt;) <br> ���� ��� ��� ������� ���� �� ��� ����� ������ �� ������ ���� ������� ��� �����'
    );
    //define("_WEBLINKS_CAT_IMG_MODE_0","NONE");
    define('_WEBLINKS_CAT_IMG_MODE_1', 'folder.gif');
    define('_WEBLINKS_CAT_IMG_MODE_2', '������ ������');
    define('_WEBLINKS_CAT_IMG_WIDTH', '���� ��� ����� �����');
    define('_WEBLINKS_CAT_IMG_HEIGHT', '���� ��� ����� �����');
    define('_WEBLINKS_CAT_IMG_SIZE_DSC', '������ ��� ����� "������ ������". ');
    define('_WEBLINKS_CAT_UPDATED', '�� ����� ������ �����');

    //======        cateogry_list.php         ======
    define('_WEBLINKS_ADMIN_CATEGORY_MANAGE', '����� �����');
    define('_WEBLINKS_ADMIN_CATEGORY_LIST', '����� �������');
    //define("_WEBLINKS_ORDER_ID"," Listed by ID");
    define('_WEBLINKS_ORDER_TREE', ' ��� ������');
    define('_WEBLINKS_CAT_ORDER', '����� �����');
    define('_WEBLINKS_THERE_ARE_CATEGORY', '���� <b> %s </b> ����� �� ����� ��������');
    define('_WEBLINKS_ADMIN_CATEGORY_NOTICE_1', '���� <b> ��� ����� </b> ������ ��� ����. ');
    define('_WEBLINKS_ADMIN_CATEGORY_NOTICE_2', '���� <b> ����� �������</b> �� <b> ������� </b>� ���� ����� �������.');
    define('_WEBLINKS_NO_CATEGORY', '�� ���� ��� ');
    define('_WEBLINKS_NUM_SUBCAT', '��� ������� �������');
    define('_WEBLINKS_ORDERS_UPDATED', '��� ����� �����');

    //======        cateogry_manage.php         ======
    define('_WEBLINKS_IMGURL_MAIN', '���� ���� �����');
    define('_WEBLINKS_IMGURL_MAIN_DSC1', '�������. <br> ������ ������ ���� ������');
    //define("_WEBLINKS_IMGURL_MAIN_DSC2","Images are for the main category only. ");

    //======        link_list.php         ======
    define('_WEBLINKS_ADMIN_LINK_MANAGE', '����� ����');
    define('_WEBLINKS_ADMIN_LINK_LIST', '����� �������');
    define('_WEBLINKS_ADMIN_LINK_BROKEN', '����� ������� ���� �� ����');
    define('_WEBLINKS_ADMIN_LINK_ALL_ASC', '��� ����� ������');
    define('_WEBLINKS_ADMIN_LINK_ALL_DESC', '��� ����� ������');
    define('_WEBLINKS_ADMIN_LINK_NOURL', '����� ������� ���� �� ����');
    define('_WEBLINKS_COUNT_BROKEN', '����� ������� ���� �� ����');
    define('_WEBLINKS_NO_LINK', '�� ���� �����. ');
    define('_WEBLINKS_ADMIN_PRESENT_SAVE', '�������� �������� �� ����� �������� ���� ���. ');

    //======        link_manage.php         ======
    //define("_WEBLINKS_USERID","User ID");
    //define("_WEBLINKS_CREATE","Created");

    //======        link_broken_check.php         ======
    define('_WEBLINKS_ADMIN_LINK_CHECK_UPDATE', '��� ���� �������');
    define('_WEBLINKS_ADMIN_LINK_BROKEN_CHECK', '��� ����� �� ����');
    define('_WEBLINKS_ADMIN_BROKEN_CHECK', '���');
    define('_WEBLINKS_ADMIN_BROKEN_RESULT', '����� �����');
    define('_WEBLINKS_ADMIN_LINK_BROKEN_CHECK_CAUTION', '������ ����� �� ���ˡ ��� ���� ������ �� ����� �� ����. <br> ��� ��� ����� ���ߡ ���� ��� ������ ������� ������. <br> ������ = 0� �� ���� ����.');
    define('_WEBLINKS_ADMIN_LINK_BROKEN_CHECK_NOTICE', '���� <b> ��� ������ </b> �������. <br>  ���� </b><b>����� ������ </b> ������ ��� ������.<br>');
    define('_WEBLINKS_ADMIN_LINK_BROKEN_CHECK_GOOGLE', '���� <b> ��� ������ </b>. ����� �� ������ �� ����.<br>');
    define('_WEBLINKS_ADMIN_LIMIT', '���� ��� �� ������� ������ (�����)');
    define('_WEBLINKS_ADMIN_OFFSET', '���� ��');
    define('_WEBLINKS_ADMIN_CHECK', '���');
    define('_WEBLINKS_ADMIN_TIME_START', '��� �����');
    define('_WEBLINKS_ADMIN_TIME_END', '��� ��������');
    define('_WEBLINKS_ADMIN_TIME_ELAPSE', '����� �����');
    define('_WEBLINKS_ADMIN_LINK_NUM_ALL', '���� �������');
    define('_WEBLINKS_ADMIN_LINK_NUM_CHECK', '��� �������');
    define('_WEBLINKS_ADMIN_LINK_NUM_BROKEN', '����� �� ����');
    define('_WEBLINKS_ADMIN_NUM', '�����');
    define('_WEBLINKS_ADMIN_MIN_SEC', '%s ����� %s �����');
    define('_WEBLINKS_ADMIN_CHECK_NEXT', '��� ������ %s ����');
    //define("_WEBLINKS_ADMIN_RSS_REFRESH_NOTE","Simultaneously execute an Auto Discovery of RSS/ATOM urls ");

    //======        rss_manage.php         ======
    define('_WEBLINKS_ADMIN_RSS_MANAGE', '����� RSS/ATOM feed');
    define('_WEBLINKS_ADMIN_RSS_REFRESH', '����� RSS/ATOM');
    define('_WEBLINKS_ADMIN_RSS_REFRESH_LINK', '����� ����� ������� �������');
    define('_WEBLINKS_ADMIN_RSS_REFRESH_SITE', '����� ��� ���� ��� RSS');
    define('_WEBLINKS_ADMIN_NUM_REFRESH_RSS_URL', '��� �������� ������� �� RSS/ATOM');
    define('_WEBLINKS_ADMIN_NUM_REFRESH_RSS_SITE', '��� ������ ������� ������� �� RSS/ATOM');
    define('_WEBLINKS_ADMIN_NUM_REFRESH_ATOM_SITE', '��� ������� ������� �� RSS/ATOM');
    define('_WEBLINKS_ADMIN_NUM_REFRESH_ATOMFEED', '��� FEEDS ������� �� RSS/ATOM');
    define('_WEBLINKS_ADMIN_RSS_CACHE_CLEAR', '��� ��� RSS/ATOM feed');
    define('_WEBLINKS_RSS_CLEAR_NUM', 'Clear cache of RSS/ATOM feed by order of date, if more than the specified number of feeds in Module Configuration 1.');
    define('_WEBLINKS_RSS_NUMBER', '��� feeds');
    define('_WEBLINKS_RSS_CLEAR_LID', '��� ����� ����� ������� ');
    define('_WEBLINKS_RSS_CLEAR_ALL', '��� ���� �����');
    define('_WEBLINKS_NUM_RSS_CLEAR_LINK', '��� RSS/ATOM ����� �����');
    define('_WEBLINKS_NUM_RSS_CLEAR_ATOMFEED', '��� ������� �� ATOM/RSS feed ');

    //======        user_list.php         ======
    define('_WEBLINKS_ADMIN_USER_MANAGE', '������ �����');
    define('_WEBLINKS_ADMIN_USER_EMAIL', '����� ������� �� ������ ������ ����������');
    define('_WEBLINKS_ADMIN_USER_LINK', '����� ������� �������� �� ������� ������');
    define('_WEBLINKS_ADMIN_USER_NOLINK', '����� ������� �������� ���� ������� ������');
    define('_WEBLINKS_ADMIN_USER_EMAIL_DSC', '��� ��� ����� ���� �������� ���� ��� �����');
    //define("_WEBLINKS_ADMIN_USER_LINK_DSC", 'Use "Send Message to Users" of XOOPS core');
    //define("_WEBLINKS_USER_ALL", " (all) ");
    //define("_WEBLINKS_USER_MAX", " (each %s persons) ");
    define('_WEBLINKS_THERE_ARE_USER', '<b>%s</b> ����� �����');
    define('_WEBLINKS_USER_NUM', 'Show from %s th person to %s th person.');
    define('_WEBLINKS_USER_NOFOUND', '�� ��� ������ ��� �����');
    define('_WEBLINKS_UID_EMAIL', '���� ������');

    //======        mail_users.php         ======
    define('_WEBLINKS_ADMIN_SENDMAIL', '���� ����');
    define('_WEBLINKS_THERE_ARE_EMAIL', '���� <b>%s</b> ����');
    define('_WEBLINKS_SEND_NUM', '���� �� %s ��� %s  ���');
    //define("_WEBLINKS_SEND_NEXT","Send next %s emails");
    //define("_WEBLINKS_SUBJECT_FROM", "Information from %s");
    //define("_WEBLINKS_HELLO", "Hello %s");
    define('_WEBLINKS_MAIL_TAGS1', '{W_NAME} ����� ��� �����');
    define('_WEBLINKS_MAIL_TAGS2', '{W_EMAIL} ����� ���� �����');
    define('_WEBLINKS_MAIL_TAGS3', '{W_LID} ����� ��� ���� �����');

    // general
    define('_WEBLINKS_WEBMASTER', '������');
    define('_WEBLINKS_SUBMITTER', '������');
    //define("_WEBLINKS_MID","Modify ID");
    define('_WEBLINKS_UPDATE', '�����');
    define('_WEBLINKS_SET_DEFAULT', '����� ���������');
    define('_WEBLINKS_CLEAR', '���');
    define('_WEBLINKS_CHECK', '���');
    define('_WEBLINKS_NON', '�� ���� ��');
    define('_WEBLINKS_SENDMAIL', '����� ����');

    // 2005-08-09
    // BUG 2827: RSS refresh: Invalid argument supplied for foreach()
    define('_WEBLINKS_ADMIN_NO_LINK_BROKEN_CHECK', '�� ���� ����� ������');
    define('_WEBLINKS_ADMIN_NO_RSS_REFRESH', '�� ���� ����� ������� RSS');

    // 2005-10-20
    define('_WEBLINKS_LINK_APPROVED', '[{X_SITENAME}] {X_MODULE}: ��� �������� ��� ������');
    define('_WEBLINKS_LINK_REFUSED', '[{X_SITENAME}] {X_MODULE}: �� ��� ������');

    // 2006-05-15
    define('_AM_WEBLINKS_INDEX_DESC', '��� ������ �������� ��������');
    define('_AM_WEBLINKS_INDEX_DESC_DSC', '����� �� ������ ��� ����� ���� ��� ���� ������ �� ��������. ����� �� �� �� ����� ���.');
    define('_AM_WEBLINKS_INDEX_DESC_DEFAULT', '<div align="center" style="color: #0000ff">��� ����� ���� ���� �������.<br>���� ������ �� ���� ������ �������� 2.<br></div>');

    define('_AM_WEBLINKS_ADD_CATEGORY', '��� ��� ����');
    define('_AM_WEBLINKS_ERROR_SOME', '���� ��� ����� �����');
    define('_AM_WEBLINKS_LIST_ID_ASC', '��� ����� ������');
    define('_AM_WEBLINKS_LIST_ID_DESC', '��� ����� ������');

    // config
    //define('_AM_WEBLINKS_WARNING_NOT_WRITABLE','������ �� ���� �������');

    define('_AM_WEBLINKS_CONF_LINK', '������ �������');
    define('_AM_WEBLINKS_CONF_LINK_IMAGE', '������ ���� ������');
    define('_AM_WEBLINKS_CONF_VIEW', '������ �����');
    define('_AM_WEBLINKS_CONF_TOPTEN', '������ ����� �������');
    define('_AM_WEBLINKS_CONF_SEARCH', '������ �����');

    define('_AM_WEBLINKS_USE_BROKENLINK', '������ ������� ���� �� ����');
    define('_AM_WEBLINKS_USE_BROKENLINK_DSC', '��� ������ ������� ������ ������ �� ����� �� ����');
    define('_AM_WEBLINKS_USE_HITS', '���� �������� ��� ������ ������');
    define('_AM_WEBLINKS_USE_HITS_DSC', '��� ���� �������� ��� ������ ������');
    define('_AM_WEBLINKS_USE_PASSWD', '����� ���� ����');
    define('_AM_WEBLINKS_USE_PASSWD_DSC', '"���"� <b> ������ </b> ������ ����� ������ ���� ������ �� ���� ���� <br> "��"� ��� ��� ��� ���� ����.');
    define('_AM_WEBLINKS_PASSWD_MIN', '���� ��� ����� ����');
    define('_AM_WEBLINKS_POST_TEXT', '������ ���� �� ���������');
    define('_AM_WEBLINKS_AUTH_DOHTML', '����� �������� ������ HTML ���');
    define('_AM_WEBLINKS_AUTH_DOHTML_DSC', '����� �������� ������ ��� �������� HTML ���');
    define('_AM_WEBLINKS_AUTH_DOSMILEY', '����� �������� ����������');
    define('_AM_WEBLINKS_AUTH_DOSMILEY_DSC', '����� �������� ������ ��� �������� ����������');
    define('_AM_WEBLINKS_AUTH_DOXCODE', '����� �������� ����� XOOPS');
    define('_AM_WEBLINKS_AUTH_DOXCODE_DSC', '����� �������� ������ ��� �������� ����� XOOPS');
    define('_AM_WEBLINKS_AUTH_DOIMAGE', '����� �������� �����');
    define('_AM_WEBLINKS_AUTH_DOIMAGE_DSC', '��� �������� ������ ��� �������� �����');
    define('_AM_WEBLINKS_AUTH_DOBR', '����� �������� ������');
    define('_AM_WEBLINKS_AUTH_DOBR_DSC', '����� �������� ������ ��� �������� ������');
    define('_AM_WEBLINKS_SHOW_CATLIST', '��� ������� �� ������� ��������');
    define('_AM_WEBLINKS_SHOW_CATLIST_DSC', '"���"��� ������� �� ������� ��������');
    define('_AM_WEBLINKS_VIEW_URL', '����� ��� ����� ������');
    define('_AM_WEBLINKS_VIEW_URL_DSC', '"�� ���"  ��� ��� ������ �����. <br> "��� �����" ���� ������ ���� visit.php?lid=2   . <br> "�����" ���� ����� ������ ��� ���� ������ ��� ������ (���� �����).');
    define('_AM_WEBLINKS_VIEW_URL_0', '�� ���');
    define('_AM_WEBLINKS_VIEW_URL_1', '��� ������');
    define('_AM_WEBLINKS_VIEW_URL_2', '������');
    define('_AM_WEBLINKS_RECOMMEND_PRI', '������ ������� ������ ���');
    define('_AM_WEBLINKS_RECOMMEND_PRI_DSC', '"�� ���" �� ����. <br> "����"  �� ������ �������� ��������. <br> "����" ��� ������� ���� ���� �� ���� �� ���.');
    define('_AM_WEBLINKS_MUTUAL_PRI', '������ ������� ���������');
    define('_AM_WEBLINKS_MUTUAL_PRI_DSC', '"�� ���"  �� ����. <br> "����"  �� ������ �������� ��������. <br> "����"  ��� ������� �� ���� �� �������.');
    define('_AM_WEBLINKS_PRI_0', '�� ���');
    define('_AM_WEBLINKS_PRI_1', '����');
    define('_AM_WEBLINKS_PRI_2', '����');
    define('_AM_WEBLINKS_LINK_IMAGE_AUTO', '����� ������ ���� �����');
    define('_AM_WEBLINKS_LINK_IMAGE_AUTO_DSC', '��� <br>����� ������ ���� �����.');
    define('_AM_WEBLINKS_RSS_USE', 'Use RSS feed');
    define('_AM_WEBLINKS_RSS_USE_DSC', 'YES <br>Get and display RSS/ATOM feed.');

    // bulk import
    define('_AM_WEBLINKS_BULK_IMPORT', '������� ��� ����(�������)');
    define('_AM_WEBLINKS_BULK_IMPORT_FILE', '������� �� ���');
    define('_AM_WEBLINKS_BULK_CAT', '������� �� �������');
    define('_AM_WEBLINKS_BULK_CAT_DSC1', '����� �������');
    define('_AM_WEBLINKS_BULK_CAT_DSC2', '������ ����� �������� ������ (>) �� ����� ����� ������ ����� ���� ����');
    define('_AM_WEBLINKS_BULK_LINK', '������� ���� �������');
    define('_AM_WEBLINKS_BULK_LINK_DSC1', '����� ����� �� ��� �����');
    define('_AM_WEBLINKS_BULK_LINK_DSC2', '��� ����� ������, ����� ������, ������ �� ����(,) �� ����� ������.');
    define('_AM_WEBLINKS_BULK_LINK_DSC3', '������ (---)  ����� ��� �������.');
    define('_AM_WEBLINKS_BULK_ERROR_LAYER', 'Specified two or more under layers at the category tree structure. This need clarification G.S.');
    define('_AM_WEBLINKS_BULK_ERROR_CID', '��� ��� �����');
    define('_AM_WEBLINKS_BULK_ERROR_PID', '��� ��� ����� �������');
    define('_AM_WEBLINKS_BULK_ERROR_FINISH', '��� ��� ���� �������');

    // command
    //define('_AM_WEBLINKS_CREATE_CONFIG', '���� ��� ������');
    //define('_AM_WEBLINKS_TEST_EXEC', '����� �������� �� %s');

    // === 2006-10-05 ===
    // menu
    define('_AM_WEBLINKS_MODULE_CONFIG_3', '������ �������� 3');
    define('_AM_WEBLINKS_MODULE_CONFIG_4', '������ �������� 4');
    define('_AM_WEBLINKS_VOTE_LIST', '����� ���������');
    define('_AM_WEBLINKS_CATLINK_LIST', '����� ���� �������');
    //define('_AM_WEBLINKS_COMMAND_MANAGE', '����� �������');
    define('_AM_WEBLINKS_TABLE_MANAGE', '����� ����� ��������');
    define('_AM_WEBLINKS_IMPORT_MANAGE', '����� ���������');
    define('_AM_WEBLINKS_EXPORT_MANAGE', '����� �������');

    // config
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_2', '�������, �������, ���');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_3', '�����');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_4', 'RSS, �������, �����');
    define('_AM_WEBLINKS_LINK_REGISTER', '������ �������: ����� (��� ����� ���� ���� ���� ����� �����)');

    // bin configuration
    define('_AM_WEBLINKS_FORM_BIN', '������ �������');
    define('_AM_WEBLINKS_FORM_BIN_DESC', 'It is used on bin command');
    define('_AM_WEBLINKS_CONF_BIN_PASS', '����� �����');
    //define('_AM_WEBLINKS_CONF_BIN_PASS_DESC','');
    define('_AM_WEBLINKS_CONF_BIN_SEND', '����� ����');
    //define('_AM_WEBLINKS_CONF_BIN_SEND_DESC','');
    define('_AM_WEBLINKS_CONF_BIN_MAILTO', '������ �������');
    //define('_AM_WEBLINKS_CONF_BIN_MAILTO_DESC','');

    // rssc
    //define('_AM_WEBLINKS_RSS_DIRNAME','RSSC Module Dirname');
    //define('_AM_WEBLINKS_RSS_DIRNAME_DESC','');

    // link manage
    define('_AM_WEBLINKS_DEL_LINK', '��� ����');
    define('_AM_WEBLINKS_ADD_RSSC', '��� ���� ��� ������ RSSC ');
    define('_AM_WEBLINKS_MOD_RSSC', '����� ���� �� ������ RSSC');
    define('_AM_WEBLINKS_REFRESH_RSSC', '����� ���� �� ������ RSSC');
    define('_AM_WEBLINKS_APPROVE', '�������� ��� ���� ����');
    define('_AM_WEBLINKS_APPROVE_MOD', '�������� ��� ����� ����');
    define('_AM_WEBLINKS_RSSC_LID_SAVED', '��� ����� ���� �������');
    define('_AM_WEBLINKS_GOTO_LINK_LIST', '������ ��� ����� �������');
    define('_AM_WEBLINKS_GOTO_LINK_EDIT', '������ ��� ����� ���������');
    define('_AM_WEBLINKS_ADD_BANNER', '��� ��� ������');
    define('_AM_WEBLINKS_MOD_BANNER', '���� �����');

    // vote list
    define('_AM_WEBLINKS_VOTE_USER', '������� �������');
    define('_AM_WEBLINKS_VOTE_ANON', '������� ������');

    // locate
    define('_AM_WEBLINKS_CONF_LOCATE', '����� ������');
    define('_AM_WEBLINKS_CONF_COUNTRY_CODE', '��� ������');
    define('_AM_WEBLINKS_CONF_COUNTRY_CODE_DESC', 'Enter ccTLDs code <br/> <a href="http://www.iana.org/cctld/cctld-whois.htm" target="_blank">IANA: Country-Code Top-Level Domains</a>');
    define('_AM_WEBLINKS_CONF_RENEW_COUNTRY_CODE_DESC', 'Refresh the item which relates to the country code. <br/> The item with the <span style="color:#0000ff;">#</span> mark');
    define('_AM_WEBLINKS_RENEW', '�����');

    // map
    define('_AM_WEBLINKS_CONF_MAP', '������ ����� ������');
    define('_AM_WEBLINKS_CONF_MAP_USE', '����� ����� ����');
    define('_AM_WEBLINKS_CONF_MAP_TEMPLATE', '���� �������');
    define('_AM_WEBLINKS_CONF_MAP_TEMPLATE_DESC', '���� ��� ��� ������ �� template/map/');

    // google map: hacked by wye <http://never-ever.info/>
    define('_AM_WEBLINKS_CONF_GOOGLE_MAP', '������ ����� ����');
    define('_AM_WEBLINKS_CONF_GM_USE', '����� ����� ����');
    define('_AM_WEBLINKS_CONF_GM_APIKEY', 'Google Maps API key');
    define('_AM_WEBLINKS_CONF_GM_APIKEY_DESC', 'Get the API key on <br/> <a href="http://www.google.com/apis/maps/signup.html" target="_blank">http://www.google.com/apis/maps/signup.html</a> <br/> When you use GoogleMaps.');
    define('_AM_WEBLINKS_CONF_GM_SERVER', '��� �������');
    define('_AM_WEBLINKS_CONF_GM_LANG', '��� �����');
    define('_AM_WEBLINKS_CONF_GM_LOCATION', '������ ���������');
    define('_AM_WEBLINKS_CONF_GM_LATITUDE', '��� ����� ���������');
    define('_AM_WEBLINKS_CONF_GM_LONGITUDE', '��� ����� ���������');
    define('_AM_WEBLINKS_CONF_GM_ZOOM', '����� ������� ���������');

    // google search
    define('_AM_WEBLINKS_CONF_GOOGLE_SEARCH', '����� ��� ����');
    define('_AM_WEBLINKS_CONF_GOOGLE_SERVER', '��� �������');
    define('_AM_WEBLINKS_CONF_GOOGLE_LANG', '��� �����');

    // template
    define('_AM_WEBLINKS_CONF_TEMPLATE', '��� ��� �������');
    define('_AM_WEBLINKS_CONF_TEMPLATE_DESC', '��� �� ���С ����� ����� ��� ���� ������ template/parts/ template/xml/ and template/map/ directory');

    // === 2006-12-11 ===
    // link item
    //define('_AM_WEBLINKS_TIME_PUBLISH','Set the publication time');
    //define('_AM_WEBLINKS_TIME_PUBLISH_DESC','If you do not check it, published time will become undated');
    //define('_AM_WEBLINKS_TIME_EXPIRE','Set expiration time');
    //define('_AM_WEBLINKS_TIME_EXPIRE_DESC','If you do not check it, expired setting will become undated');
    define('_AM_WEBLINKS_LINK_TIME_PUBLISH_BEFORE', '����� ������� ��� ��� �����');
    define('_AM_WEBLINKS_LINK_TIME_EXPIRE_AFTER', '����� ������� ��� ������ �����');

    define('_AM_WEBLINKS_SERVER_ENV', '���� ������� ');
    define('_AM_WEBLINKS_DEBUG_CONF', '���� ����� �������(���������)');
    define('_AM_WEBLINKS_ALL_GREEN', '������ �����');

    // === 2007-02-20 ===
    // performance
    define('_AM_WEBLINKS_UPDATE_CAT_PATH', '����� ���� �����');
    define('_AM_WEBLINKS_UPDATE_CAT_COUNT', '����� ����� ����� �������');
    define('_AM_WEBLINKS_CAT_COUNT_UPDATED', '�� ����� ���� �����');

    // config
    define('_AM_WEBLINKS_SYSTEM_POST_LINK', '������ �� ����� ���� ����');
    define('_AM_WEBLINKS_SYSTEM_POST_LINK_DSC', '"���" ������ �������� �� ����� ���� ����');
    define('_AM_WEBLINKS_SYSTEM_POST_RATE', '������ �������');
    define('_AM_WEBLINKS_SYSTEM_POST_RATE_DSC', '"���" ��� ��� ������ �������� ��� ���� ����');

    define('_AM_WEBLINKS_VIEW_STYLE_CAT', '����� ��� �����');
    define('_AM_WEBLINKS_VIEW_STYLE_MARK', '����� ��� "����� ���� ����" ');
    define('_AM_WEBLINKS_VIEW_STYLE_MARK_DSC', '����� �� ������� ������ ���, ������� ���������, ����� RSS/ATOM');
    define('_AM_WEBLINKS_VIEW_STYLE_0', '�������');
    define('_AM_WEBLINKS_VIEW_STYLE_1', '��� ����');

    define('_AM_WEBLINKS_CONF_PERFORMANCE', '����� ������');
    define('_AM_WEBLINKS_CONF_PERFORMANCE_DSC', '���� ����� ������� ���� �������� ����� ����� ���֡ ����� �� ����� ��������. <br> ����� ������� ��� ��ɡ ���� �� "����� �������" -> "����� ���� �������"');
    define('_AM_WEBLINKS_CAT_PATH', '���� �����');
    define('_AM_WEBLINKS_CAT_PATH_DSC', '"���" ���� ���� ����� ����� �� ���� �����. <br> "��" �� ���� ����� ����.');
    define('_AM_WEBLINKS_CAT_COUNT', '����� ����� �����');
    define('_AM_WEBLINKS_CAT_COUNT_DSC', '���" ���� ����� ����ء ����� �� ���� �����. <br> "��" �� ���� ����� ����.');

    define('_AM_WEBLINKS_POST_TEXT_4', '���� ������ ���� �� ���� ������');
    define('_AM_WEBLINKS_LINK_REGISTER_1', '������ �������: ����� ���� (��� ����� ���� ���� ���� ����� ��)');

    define('_AM_WEBLINKS_CONF_LINK_GUEST', '������ ��� ����� ����');
    define('_AM_WEBLINKS_USE_CAPTCHA', 'Use CAPTCHA');
    define('_AM_WEBLINKS_USE_CAPTCHA_DSC', 'CAPTCHA is technique for anti-spam.<br>This feature Need Captcha module.<br>YES, <b>anoymous user</b> must use CAPTCHA when add or modify link.<br>NO does not show CAPTCHA field.');
    define('_AM_WEBLINKS_CAPTCHA_FINDED', 'Captcha module ver %s is finded');
    define('_AM_WEBLINKS_CAPTCHA_NOT_FINDED', '������ Captcha ��� ����');

    define('_AM_WEBLINKS_CONF_SUBMIT', '��� ��� (������ �� ���� ������ ��� ����� ����) ����� ����');
    define('_AM_WEBLINKS_SUBMIT_MAIN', '��� ��� ����� ���� ����: 1');
    define('_AM_WEBLINKS_SUBMIT_PENDING', '��� ��� ����� ���� ����: 2');
    define('_AM_WEBLINKS_SUBMIT_DOUBLE', '��� ��� ����� ���� ����: 3');
    define('_AM_WEBLINKS_SUBMIT_MAIN_DSC', '���� �����');
    define('_AM_WEBLINKS_SUBMIT_PENDING_DSC', '���� ����� "����� ��� ������ ������"<br> ���� ������ �������� 2');
    define('_AM_WEBLINKS_SUBMIT_DOUBLE_DSC', '���� ����� ���� �������� ��� ������ ����� ������ �����.<br> ���� ������ ������ �� ������');

    define('_AM_WEBLINKS_MODLINK_MAIN', '��� ��� ����� ����: 1');
    define('_AM_WEBLINKS_MODLINK_PENDING', '��� ��� ����� ����: 2');
    define('_AM_WEBLINKS_MODLINK_NOT_OWNER', '��� ��� ����� ����: 3');
    define('_AM_WEBLINKS_MODLINK_NOT_OWNER_DSC', '���� ����� ������ ���� ������');

    define('_AM_WEBLINKS_CONF_CAT_FORUM', '��� ������� �� �����');
    define('_AM_WEBLINKS_CONF_LINK_FORUM', '��� ������� �� ���� �������');
    //define('_AM_WEBLINKS_FORUM_SEL', 'Select Forum module');
    define('_AM_WEBLINKS_FORUM_THREAD_LIMIT', '��� ��������');
    define('_AM_WEBLINKS_FORUM_POST_LIMIT', '��� ��������� �� �������');
    define('_AM_WEBLINKS_FORUM_POST_ORDER', '����� ���������');
    define('_AM_WEBLINKS_FORUM_POST_ORDER_0', '������');
    define('_AM_WEBLINKS_FORUM_POST_ORDER_1', '������');
    //define('_AM_WEBLINKS_FORUM_INSTALLED',     'Forum module ( %s ) ver %s is installed');
    //define('_AM_WEBLINKS_FORUM_NOT_INSTALLED', 'Forum module ( %s ) is not installed');

    // === 2007-03-25 ===
    define('_AM_WEBLINKS_UPDATE_CAT_IMAGE_SIZE', '����� ���� ���� �����');

    define('_AM_WEBLINKS_CONF_INDEX', '������ ������ ��������');
    define('_AM_WEBLINKS_CONF_INDEX_GM_MODE', '��� ����� ����');

    define('_AM_WEBLINKS_CAT_SHOW_GM', '��� ����� ����');
    define('_AM_WEBLINKS_MODE_NON', '�� ����');
    define('_AM_WEBLINKS_MODE_DEFAULT', '���������');
    define('_AM_WEBLINKS_MODE_PARENT', '��� ����� �������');
    define('_AM_WEBLINKS_MODE_FOLLOWING', '��� ������� ��������');

    define('_AM_WEBLINKS_CONF_CAT_ALBUM', '��� ����� ����� �� �����');
    define('_AM_WEBLINKS_CONF_LINK_ALBUM', '��� ����� ����� �� ������');
    //define('_AM_WEBLINKS_ALBUM_SEL', 'Select Album module');
    define('_AM_WEBLINKS_ALBUM_LIMIT', '��� �����');
    define('_AM_WEBLINKS_WHEN_OMIT', 'Process when omit');

    define('_AM_WEBLINKS_MODULE_INSTALLED', '%s ������ ( %s ) ����� %s ����');
    define('_AM_WEBLINKS_MODULE_NOT_INSTALLED', '%s ������ ( %s ) �� ����');

    // === 2007-04-08 ===
    define('_AM_WEBLINKS_CAT_DESC_MODE', '��� �����');
    define('_AM_WEBLINKS_CAT_SHOW_FORUM', '��� �������');
    define('_AM_WEBLINKS_CAT_SHOW_ALBUM', '��� �������');
    define('_AM_WEBLINKS_MODE_SETTING', '����� ������');
    define('_AM_WEBLINKS_MODE_OMIT_PARENT', '����� ��������');

    // === 2007-06-10 ===
    // d3forum
    define('_AM_WEBLINKS_CONF_D3FORUM', 'Comment-integration with d3forum module');
    define('_AM_WEBLINKS_PLUGIN_SEL', '���� �������');
    define('_AM_WEBLINKS_DIRNAME_SEL', '���� ��������');

    // category
    define('_AM_WEBLINKS_CAT_PATH_STYLE', '����� ��� ������� �� ����� �������');

    // category page
    define('_AM_WEBLINKS_CONF_CAT_PAGE', '������ ���� �����');
    define('_AM_WEBLINKS_CAT_COLS', '��� ����� ������� �� ������ ��������');
    define('_AM_WEBLINKS_CAT_COLS_DESC', '��� ����� ������� ������� �� ������ ����� �������');
    define('_AM_WEBLINKS_CAT_SUB_MODE', '����� ��� ������� �������<br>�� ���� ���� ��� ��� ������� ������� �� ��������<br>��� ��� ���� ���� ���� ��� ��� ���� ����� ����');
    define('_AM_WEBLINKS_CAT_SUB_MODE_1', '��� ��� ���� ����');
    define('_AM_WEBLINKS_CAT_SUB_MODE_2', '��� ���� �������');

    // === 2007-07-14 ===
    // highlight
    define('_AM_WEBLINKS_USE_HIGHLIGHT', '����� ���� �����');
    define('_AM_WEBLINKS_CHECK_MAIL', '��� ���� �������');
    define('_AM_WEBLINKS_CHECK_MAIL_DSC', '�� ���� ��� ����. <br> ��� ���� ��� ���� ������� ��� abc@efg.com ��� ����� ����.');
    //define('_AM_WEBLINKS_NO_EMAIL', 'Not Set Email Address');

    // === 2007-08-01 ===
    // config
    define('_AM_WEBLINKS_MODULE_CONFIG_0', '������ ��������');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_0', '��������');
    define('_AM_WEBLINKS_MODULE_CONFIG_5', '������ �������� 5');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_5', '����, �����(���)��� ����� ������');
    define('_AM_WEBLINKS_MODULE_CONFIG_6', '������ �������� 6');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_6', '����� ����');

    // google map
    define('_AM_WEBLINKS_GM_MAP_CONT', 'Map Control');
    define('_AM_WEBLINKS_GM_MAP_CONT_DESC', 'GLargeMapControl, GSmallMapControl, GSmallZoomControl');
    define('_AM_WEBLINKS_GM_MAP_CONT_NON', '�� ����');
    define('_AM_WEBLINKS_GM_MAP_CONT_LARGE', 'Large Control');
    define('_AM_WEBLINKS_GM_MAP_CONT_SMALL', 'Small Control');
    define('_AM_WEBLINKS_GM_MAP_CONT_ZOOM', 'Zoom Control');
    define('_AM_WEBLINKS_GM_USE_TYPE_CONT', 'Use Map Type Control');
    define('_AM_WEBLINKS_GM_USE_TYPE_CONT_DESC', 'GMapTypeControl');
    define('_AM_WEBLINKS_GM_USE_SCALE_CONT', 'Use Scale Control');
    define('_AM_WEBLINKS_GM_USE_SCALE_CONT_DESC', 'GScaleControl');
    define('_AM_WEBLINKS_GM_USE_OVERVIEW_CONT', 'Use Overview Map Control');
    define('_AM_WEBLINKS_GM_USE_OVERVIEW_CONT_DESC', 'GOverviewMapControl');
    define('_AM_WEBLINKS_GM_MAP_TYPE', '[Search] Map Type');
    define('_AM_WEBLINKS_GM_MAP_TYPE_DESC', 'GMapType');
    define('_AM_WEBLINKS_GM_GEOCODE_KIND', '[����] Kind of Geocode');
    define('_AM_WEBLINKS_GM_GEOCODE_KIND_DESC', 'Search latitude and longitude from address<br><b>Single Result</b><br>GClientGeocoder - getLatLng<br><b>More Results</b><br>GClientGeocoder - getLocations');
    define('_AM_WEBLINKS_GM_GEOCODE_KIND_LATLNG', 'Single Result: getLatLng');
    define('_AM_WEBLINKS_GM_GEOCODE_KIND_LOCATIONS', 'More Results: getLocations');
    define('_AM_WEBLINKS_GM_USE_GEOCODE_TOKYO', '[Search][Japan] Use CSIS');
    define('_AM_WEBLINKS_GM_USE_GEOCODE_TOKYO_DESC', 'Valid in Japan<br>Search latitude and longitude from address');
    define('_AM_WEBLINKS_GM_USE_NISHIOKA', '[Search][Japan] Use Inverse Geocode');
    define('_AM_WEBLINKS_GM_USE_NISHIOKA_DESC', 'Valid in Japan<br>Search address from latitude and longitude<br><a href="http://nishioka.sakura.ne.jp/google/" target="_blank">http://nishioka.sakura.ne.jp/google/</a>');
    define('_AM_WEBLINKS_GM_TITLE_LENGTH', '[Marker] Maximum characters for Title');
    define('_AM_WEBLINKS_GM_TITLE_LENGTH_DESC', 'Maximum number of characters used for Title in the marker<br><b>-1</b> is unlimited');
    define('_AM_WEBLINKS_GM_DESC_LENGTH', '[Marker] Maximum characters for Content');
    define('_AM_WEBLINKS_GM_DESC_LENGTH_DESC', 'Maximum number of characters used for Content in the marker<br><b>-1</b> is unlimited');
    define('_AM_WEBLINKS_GM_WORDWRAP', '[Marker] Maximum characters for wordwarp');
    define('_AM_WEBLINKS_GM_WORDWRAP_DESC', 'Maximum number of characters used for per line (wordwrap) in the marker<br><b>-1</b> is unlimited');
    define('_AM_WEBLINKS_GM_USE_CENTER_MARKER', '[Marker] Show the center marker');
    define('_AM_WEBLINKS_GM_USE_CENTER_MARKER_DESC', 'In Main page and Category page, show the center marker');

    // map jp
    define('_AM_WEBLINKS_MAP_JP_MANAGE', 'Japan Map Configuration');

    // column
    define('_AM_WEBLINKS_COLUMN_MANAGE', 'Column Management');
    define('_AM_WEBLINKS_COLUMN_MANAGE_DESC', 'Add etc columns in link table and modify table');
    define('_AM_WEBLINKS_COLUMN_MANAGE_NOT_USE', 'Not Use');
    define('_AM_WEBLINKS_THERE_ARE_COLUMN', 'There are <b>%s</b> etc columns in link table');
    define('_AM_WEBLINKS_COLUMN_NUM', 'Number of adding etc columns');
    define('_AM_WEBLINKS_COLUMN_BIGGER_USE', 'The number of the etc columns is bigger than the number in link table');
    define('_AM_WEBLINKS_COLUMN_UNMATCH', 'The columns is unmatch in link table and modify table');
    define('_AM_WEBLINKS_PHPMYADMIN', 'Correct in the management tool like as phpMyAdmin');
    define('_AM_WEBLINKS_LINK_NUM_ETC', 'The number of etc columns');

    // latest
    define('_AM_WEBLINKS_INDEX_MODE_LATEST', '��� ��� ����');
    define('_AM_WEBLINKS_INDEX_MODE_LATEST_UPDATE', '����� �������');
    define('_AM_WEBLINKS_INDEX_MODE_LATEST_CREATE', '����� �������');

    // header
    define('_AM_WEBLINKS_CONF_HTML_STYLE', '������ HTML');
    define('_AM_WEBLINKS_HEADER_MODE', '������� xoops ����');
    define('_AM_WEBLINKS_HEADER_MODE_DESC', '"��"���� ���� css ������� ����� �� body tag <br>  "���"� ��� ���� �� body tag <br> ���� ������ ����� ���� �� ���� �� ������');

    // bulk
    define('_AM_WEBLINKS_BULK_SAMPLE', '����� �� ��� ���� , ���� ��� �� ����');
    define('_AM_WEBLINKS_BULK_LINK_DSC10', '����� �����');
    define('_AM_WEBLINKS_BULK_LINK_DSC20', '������ ���� ������� �������');
    define('_AM_WEBLINKS_BULK_LINK_DSC21', '������ ������');
    define('_AM_WEBLINKS_BULK_LINK_DSC22', '������ ������ɡ �������');
    define('_AM_WEBLINKS_BULK_LINK_DSC23', '���� ������� ������� �� ����� �����.<br>���� �� ����(---)');
    define('_AM_WEBLINKS_BULK_LINK_DSC24', '��� ������� ������ɡ ��� ������� �� ����� ����� ��� ��(,)��� ����� ������.');
    define('_AM_WEBLINKS_BULK_CHECK_URL', '��� ����� ��� ������');
    define('_AM_WEBLINKS_BULK_CHECK_DESCRIPTION', '��� ����� �����');

    // === 2007-09-01 ===
    // auth
    define('_AM_WEBLINKS_AUTH_DELETE', '������ �����');
    define('_AM_WEBLINKS_AUTH_DELETE_DSC', '���� ��������� ���� ������ ����� ��� ������');
    define('_AM_WEBLINKS_AUTH_DELETE_AUTO', '������ �������� ��� ��� ����');
    define('_AM_WEBLINKS_AUTH_DELETE_AUTO_DSC', '���� ��������� ���� ���� �������� ��� ����� ��� ������');

    // nofitication
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE', '����� ���������');
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE_DESC', '���� ��� ������ ����<br>��� ������� �� ���� ������ ���� ��������');
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE_NOT_USE', '�� ���� ��������� �� ��� ������� XOOPS');
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE_PLEASE', '�� ��� �����ɡ ���� ������ �� ���� ������ �� ��� ��������');
    define('_AM_WEBLINKS_SUBJ_LINK_MOD_APPROVED', '[{X_SITENAME}] {X_MODULE}: ��� ������ ����');
    define('_AM_WEBLINKS_SUBJ_LINK_MOD_REFUSED', '[{X_SITENAME}] {X_MODULE}: ���� ������ �����');
    define('_AM_WEBLINKS_SUBJ_LINK_DEL_APPROVED', '[{X_SITENAME}] {X_MODULE}: ������ ��� ���� ���� ������');
    define('_AM_WEBLINKS_SUBJ_LINK_DEL_REFUSED', '[{X_SITENAME}] {X_MODULE}: ��� ��� ���� ���� ������');

    // config
    define('_AM_WEBLINKS_ADMIN_WAITING_SHOW', '��� ����� ������ ������');
    define('_AM_WEBLINKS_USER_WAITING_NUM', '��� ����� ������ ����� �������');
    define('_AM_WEBLINKS_USER_OWNER_NUM', '��� ��� ������� ������� �� ����� �� "����� ������"');
    define('_AM_WEBLINKS_USE_HITS_SINGLELINK', '������ �������� ��� ����� ��� " ���� �� ��������"');
    define('_AM_WEBLINKS_USE_HITS_SINGLELINK_DSC', '"���"������ �������� ��� ����� ��� " ���� �� ��������"');
    define('_AM_WEBLINKS_MODE_RANDOM', '������ ��������');
    define('_AM_WEBLINKS_MODE_RANDOM_URL', '������ ��� ������');
    define('_AM_WEBLINKS_MODE_RANDOM_SINGLE', '������ ��� ���� ������ �� ������');

    // request list
    define('_AM_WEBLINKS_DEL_REQS', '����� ����� �����');
    define('_AM_WEBLINKS_NO_DEL_REQ', '�� ���� ����� ���� �������');
    define('_AM_WEBLINKS_DEL_REQ_DELETED', '��� ����� ���');

    // link list
    define('_AM_WEBLINKS_LINK_USERCOMMENT_DESC', '����� ������� �������� ������� (��� �����)');

    // clone
    define('_AM_WEBLINKS_CLONE_LINK', '����� ���');
    define('_AM_WEBLINKS_CLONE_MODULE', '��� ��� ������ ���');
    define('_AM_WEBLINKS_CLONE_CONFIRM', '����� �����');
    define('_AM_WEBLINKS_NO_MODULE', '��� ���� ������ �����');

    // link form
    define('_AM_WEBLINKS_MODIFIED', '���');
    define('_AM_WEBLINKS_CHECK_CONFIRM', '���');
    define('_AM_WEBLINKS_WARN_CONFIRM', '�����: ��� �� "����" %s');
    define('_AM_WEBLINKS_RSSC_LID_EXIST_MORE', '���� ���� �� ���� ��� ��� ����� "��� ���� ��������"');

    // web shot
    define('_AM_WEBLINKS_LINK_IMG_THUMB', '���� ������');
    define('_AM_WEBLINKS_LINK_IMG_THUMB_DSC', '��� ���� ����� �����ڡ <br> �������� ���� �����ɡ <br> ��� ��� �� �� ���� ������ �������.');
    define('_AM_WEBLINKS_LINK_IMG_NON', '��');
    define('_AM_WEBLINKS_LINK_IMG_MOZSHOT', '������ ���� <a href="http://mozshot.nemui.org/" target="_blank">MozShot</a>');
    define('_AM_WEBLINKS_LINK_IMG_SIMPLEAPI', '������ ���� <a href="http://img.simpleapi.net/" target="_blank">SimpleAPI</a>');

    // === 2007-11-01 ===
    // google map
    define('_AM_WEBLINKS_GM_MARKER_WIDTH', '[Marker] Width (pixel)');
    define('_AM_WEBLINKS_GM_MARKER_WIDTH_DESC', 'Width of map marker info<br><b>-1</b> is unspecifid');
    define('_AM_WEBLINKS_LINK_IMG_USE', '������ %s');

    define('_AM_WEBLINKS_RSS_SITE', '��� ������');
    define('_AM_WEBLINKS_RSS_FEED', 'RSS feeds');

    // nameflag mainflag
    define('_AM_WEBLINKS_CONF_LINK_USER', '���� ����� �������');
    define('_AM_WEBLINKS_USER_NAMEFLAG', 'Select view of nameflag');
    define('_AM_WEBLINKS_USER_MAILFLAG', 'Select view of mailflag');
    define('_AM_WEBLINKS_USER_NAME_MAIL_FLAG_DESC', '������ ���������� ��� ����� �����<br>������ ������ �� ���� ������');
    define('_AM_WEBLINKS_USER_NAME_MAIL_FLAG_SEL', '������ �����');

    // description length
    define('_AM_WEBLINKS_DESC_LENGTH', '���� ��� �� ������');
    define('_AM_WEBLINKS_DESC_LENGTH_DSC', '<b>-1</b> or the admin : 64KB limit<br>');

    // === 2007-12-09 ===
    define('_AM_WEBLINKS_D3FORUM_VIEW', '��� ��� �����');
}
// --- define language begin ---
