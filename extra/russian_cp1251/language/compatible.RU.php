<?php

// $Id: compatible.RU.php,v 1.1 2012/04/09 10:20:05 ohwada Exp $

// 2008-02-17 K.OHWADA
// pagerank, pagerank_update

// 2007-11-01 K.OHWADA
// _AM_WEBLINKS_GM_MARKER_WIDTH

// 2007-09-01 K.OHWADA
// waiting list

// 2007-08-01 K.OHWADA
// config 0

// 2007-07-14 K.OHWADA
// highlight

// 2007-06-10 K.OHWADA
// d3forum

// 2007-04-08 K.OHWADA
// _WEBLINKS_GM_TYPE

// 2007-03-25 K.OHWADA
// _WEBLINKS_ALBUM_ID

// 2007-02-20 K.OHWADA
// forum, performance

// 2006-12-11 K.OHWADA
// google map: googleGeocode
// _WEBLINKS_TIME_PUBLISH

// 2006-11-26 K.OHWADA
// google map: JP Geocode

// 2006-11-04 K.OHWADA
// google map: JP inverse Geocoder
// google map: inline mode

// 2006-10-05 K.OHWADA
// add _WEBLINKS_RSSC_LID
// google map

// 2006-05-15 K.OHWADA
// this is new file

//=========================================================
// WebLinks Module
// 2006-05-15 K.OHWADA
//=========================================================
// _LANGCODE: ru
// _CHARSET : cp1251
// Translator: Houston (Contour Design Studio http://www.cdesign.ru/)

//---------------------------------------------------------
// compatible for v1.90
//---------------------------------------------------------
if (!defined('_WEBLINKS_PAGERANK')) {
    // linkitem
    define('_WEBLINKS_PAGERANK', '�������� ��������');
    define('_WEBLINKS_PAGERANK_UPDATE', '����� ���������� �������� ��������');
    define('_WEBLINKS_GM_KML_DEBUG', '�������� ������� KML');

    // gmap
    define('_WEBLINKS_SITE_GMAP', '���� ���� Google');
    define('_WEBLINKS_KML_LIST', '������ KML');
    define('_WEBLINKS_KML_LIST_DESC', '������� KML � �������� � ����� Google');
    define('_WEBLINKS_KML_PERPAGE', '����� �����������');

    // pagerank
    define('_WEBLINKS_SITE_PAGERANK', '���� � ������� ��������� ��������');
}

if (!defined('_AM_WEBLINKS_CONF_MENU')) {
    // config
    define('_AM_WEBLINKS_MODULE_CONFIG_7', '������������ ������ 7');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_7', '����');
    define('_AM_WEBLINKS_CONF_MENU', '��� ����');
    define('_AM_WEBLINKS_CONF_MENU_DESC', '���������, ������� ��������� � ���� ����');
    define('_AM_WEBLINKS_CONF_TITLE', '��������� ����');

    // htmlout
    define('_AM_WEBLINKS_OUTPUT_PLUGIN_MANAGE', '���������� �������� ������ HTML');
    define('_AM_WEBLINKS_HTMLOUT', '������ HTML ������');
    define('_AM_WEBLINKS_RSSOUT', '������ RSS ������');
    define('_AM_WEBLINKS_KMLOUT', '������ KML ������');

    // pagerank
    define('_AM_WEBLINKS_LINK_CHECK_MANAGE', '���������� ��������� ������');
    define('_AM_WEBLINKS_USE_PAGERANK', '�������� �������� ��������');
    define('_AM_WEBLINKS_USE_PAGERANK_DESC', '"��������" : �������� �������� �������� � ����, ������ ������, ��������� ������');
    define('_AM_WEBLINKS_USE_PAGERANK_NON', '�� ����������');
    define('_AM_WEBLINKS_USE_PAGERANK_SHOW', '����������');
    define('_AM_WEBLINKS_USE_PAGERANK_CACHE', '����������, ��������� ��� ���������� �������� ��������');

    // kml
    define('_AM_WEBLINKS_KML_USE', '�������� KML');
}

//---------------------------------------------------------
// compatible for v1.80
//---------------------------------------------------------
if (!defined('_WEBLINKS_ERROR_LENGTH')) {
    define('_WEBLINKS_ERROR_LENGTH', '������: %s ������ ���� ������, ��� %s ��������');
}

if (!defined('_AM_WEBLINKS_GM_MARKER_WIDTH')) {
    // google map
    define('_AM_WEBLINKS_GM_MARKER_WIDTH', '[���������] ������ (�������)');
    define('_AM_WEBLINKS_GM_MARKER_WIDTH_DESC', '������ ��������������� ��������� �����<br><b>-1</b> �� ������');
    define('_AM_WEBLINKS_LINK_IMG_USE', '������������ %s');

    define('_AM_WEBLINKS_RSS_SITE', '���� ����');
    define('_AM_WEBLINKS_RSS_FEED', 'RSS �����');

    // nameflag mainflag
    define('_AM_WEBLINKS_CONF_LINK_USER', '������������ ����������� ������ ������������');
    define('_AM_WEBLINKS_USER_NAMEFLAG', '�������� ����� �����');
    define('_AM_WEBLINKS_USER_MAILFLAG', '�������� ����� ����������� �����');
    define('_AM_WEBLINKS_USER_NAME_MAIL_FLAG_DESC', '�������� �� ���������, ����� ������������ ��������������<br>������������� ����� �������� ��������');
    define('_AM_WEBLINKS_USER_NAME_MAIL_FLAG_SEL', '����� ������������');

    // description length
    define('_AM_WEBLINKS_DESC_LENGTH', '������������ ����� ��������');
    define('_AM_WEBLINKS_DESC_LENGTH_DSC', '<b>-1</b> ��� ���������������� ��������� : ����� 64KB<br>');
}

//---------------------------------------------------------
// compatible for v1.70
//---------------------------------------------------------
if (!defined('_WEBLINKS_ADMIN_WAITING_LIST')) {
    // waiting list
    define('_WEBLINKS_ADMIN_WAITING_LIST', '������ �������� ��������������');
    define('_WEBLINKS_USER_WAITING_LIST', '��� ������ ��������');
    define('_WEBLINKS_USER_OWNER_LIST', '��� ������ ������������');

    // submit form
    define('_WEBLINKS_TIME_PUBLISH_SET', '���������� ���� ����������');
    define('_WEBLINKS_TIME_PUBLISH_DESC', '���� �� �� ���������� ���, ���� ���������� ������ ����������');
    define('_WEBLINKS_TIME_EXPIRE_SET', '���������� ���� ���������');
    define('_WEBLINKS_TIME_EXPIRE_DESC', '���� �� �� ���������� ���, ���� ��������� ������ ����������');
    define('_WEBLINKS_DEL_LINK_CONFIRM', '����������� ��������');
    define('_WEBLINKS_DEL_LINK_REASON', '������� ��������');
}

if (!defined('_AM_WEBLINKS_AUTH_DELETE')) {
    // auth
    define('_AM_WEBLINKS_AUTH_DELETE', '����� �������');
    define('_AM_WEBLINKS_AUTH_DELETE_DSC', '������� ������, ������� ��������� ���������� ������� �� �������� ������');
    define('_AM_WEBLINKS_AUTH_DELETE_AUTO', '����� ���������� �������� ������');
    define('_AM_WEBLINKS_AUTH_DELETE_AUTO_DSC', '������� ������, ������� ��������� ���������� ������� �� �������� ������');

    // nofitication
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE', '���������� ������������');
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE_DESC', '��������� ��� ������� �������������� ������<br>��� ���� �����, ��� � ������� �������� ������');
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE_NOT_USE', '�� �� ������ ������������ � ��������� ������� XOOPS');
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE_PLEASE', '� ������ ������, ����������, ����������� ������� �������� ����� ������');
    define('_AM_WEBLINKS_SUBJ_LINK_MOD_APPROVED', '[{X_SITENAME}] {X_MODULE}: ��� ������ ��������� ������ ���������');
    define('_AM_WEBLINKS_SUBJ_LINK_MOD_REFUSED', '[{X_SITENAME}] {X_MODULE}: ��� ������ ��������� ������ ��������');
    define('_AM_WEBLINKS_SUBJ_LINK_DEL_APPROVED', '[{X_SITENAME}] {X_MODULE}: ��� ������ �� �������� ������ ���������');
    define('_AM_WEBLINKS_SUBJ_LINK_DEL_REFUSED', '[{X_SITENAME}] {X_MODULE}: ��� ������ �� �������� ������ ��������');

    // config
    define('_AM_WEBLINKS_ADMIN_WAITING_SHOW', '�������� ������ �������� ��������������');
    define('_AM_WEBLINKS_USER_WAITING_NUM', '���������� ������ ������ �������� ������������');
    define('_AM_WEBLINKS_USER_OWNER_NUM', '���������� ������ ������������� ������������� ������');
    define('_AM_WEBLINKS_USE_HITS_SINGLELINK', '����������� �������, ����� ������������ ��������� ������');
    define('_AM_WEBLINKS_USE_HITS_SINGLELINK_DSC', '�� ��������� ����������� ������� ���������, ����� ������������ ��������� ������');
    define('_AM_WEBLINKS_MODE_RANDOM', '������������� �� ��������� ���������');
    define('_AM_WEBLINKS_MODE_RANDOM_URL', '������������������ ����� �����');
    define('_AM_WEBLINKS_MODE_RANDOM_SINGLE', '��������� ������ � ���� ������');

    // request list
    define('_AM_WEBLINKS_DEL_REQS', '����������� ������ ��������� ��������');
    define('_AM_WEBLINKS_NO_DEL_REQ', '��� ������� ����������� ������');
    define('_AM_WEBLINKS_DEL_REQ_DELETED', '����������� ������ ������');

    // link list
    define('_AM_WEBLINKS_LINK_USERCOMMENT_DESC', '������ ������ � ������������� ��� �������������� (������ �� ����� ID)');

    // clone
    define('_AM_WEBLINKS_CLONE_LINK', '�����������');
    define('_AM_WEBLINKS_CLONE_MODULE', '����������� � ������ ������');
    define('_AM_WEBLINKS_CLONE_CONFIRM', '����������� ������������');
    define('_AM_WEBLINKS_NO_MODULE', '��� ���������������� ������');

    // link form
    define('_AM_WEBLINKS_MODIFIED', '��������');
    define('_AM_WEBLINKS_CHECK_CONFIRM', '������������');
    define('_AM_WEBLINKS_WARN_CONFIRM', '��������������: ��������� "������������" �� %s');
    define('_AM_WEBLINKS_RSSC_LID_EXIST_MORE', '���� ��� ��� ����� ������, � ������� ����� �� "RSSC ID"');

    // web shot
    define('_AM_WEBLINKS_LINK_IMG_THUMB', '������ ����������� ������');
    define('_AM_WEBLINKS_LINK_IMG_THUMB_DSC', '�������� �����������, ����� �� ����������� ����������� ������');
    define('_AM_WEBLINKS_LINK_IMG_NON', '���');
    define('_AM_WEBLINKS_LINK_IMG_MOZSHOT', '������������ <a href="http://mozshot.nemui.org/" target="_blank">MozShot</a>');
    define('_AM_WEBLINKS_LINK_IMG_SIMPLEAPI', '������������ <a href="http://img.simpleapi.net/" target="_blank">SimpleAPI</a>');
}

//---------------------------------------------------------
// compatible for v1.60
//---------------------------------------------------------
if (!defined('_WEBLINKS_GM_CURRENT_ADDRESS')) {
    define('_WEBLINKS_GM_CURRENT_ADDRESS', '������� �����');
    define('_WEBLINKS_GM_SEARCH_LIST', '������ ����������� ������');
}

if (!defined('_AM_WEBLINKS_MODULE_CONFIG_0')) {
    // config
    define('_AM_WEBLINKS_MODULE_CONFIG_0', '������������ ������');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_0', '�������');
    define('_AM_WEBLINKS_MODULE_CONFIG_5', '������������ ������ 5');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_5', '����������� ������');
    define('_AM_WEBLINKS_MODULE_CONFIG_6', '������������ ������ 6');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_6', '����� Google');

    // google map
    define('_AM_WEBLINKS_GM_MAP_CONT', '���������� �����');
    define('_AM_WEBLINKS_GM_MAP_CONT_DESC', 'GLargeMapControl, GSmallMapControl, GSmallZoomControl');
    define('_AM_WEBLINKS_GM_MAP_CONT_NON', '�� ����������');
    define('_AM_WEBLINKS_GM_MAP_CONT_LARGE', '������� ����������');
    define('_AM_WEBLINKS_GM_MAP_CONT_SMALL', '��������� ����������');
    define('_AM_WEBLINKS_GM_MAP_CONT_ZOOM', '���������� �����������');
    define('_AM_WEBLINKS_GM_USE_TYPE_CONT', '������������ ��� ���������� �����');
    define('_AM_WEBLINKS_GM_USE_TYPE_CONT_DESC', 'GMapTypeControl');
    define('_AM_WEBLINKS_GM_USE_SCALE_CONT', '������������ ���������� ������');
    define('_AM_WEBLINKS_GM_USE_SCALE_CONT_DESC', 'GScaleControl');
    define('_AM_WEBLINKS_GM_USE_OVERVIEW_CONT', '������������ ���������� ������� �����');
    define('_AM_WEBLINKS_GM_USE_OVERVIEW_CONT_DESC', 'GOverviewMapControl');
    define('_AM_WEBLINKS_GM_MAP_TYPE', '[�����] ��� �����');
    define('_AM_WEBLINKS_GM_MAP_TYPE_DESC', 'GMapType');
    define('_AM_WEBLINKS_GM_GEOCODE_KIND', '[�����] ��� �������');
    define('_AM_WEBLINKS_GM_GEOCODE_KIND_DESC', '����� ������ � ������� �� ������<br><b>������������ ���������</b><br>GClientGeocoder - getLatLng<br><b>������������� ���������</b><br>GClientGeocoder - getLocations');
    define('_AM_WEBLINKS_GM_GEOCODE_KIND_LATLNG', '������������ ���������: getLatLng');
    define('_AM_WEBLINKS_GM_GEOCODE_KIND_LOCATIONS', '������������� ���������: getLocations');
    define('_AM_WEBLINKS_GM_USE_GEOCODE_TOKYO', '[�����][������] ������������ CSIS');
    define('_AM_WEBLINKS_GM_USE_GEOCODE_TOKYO_DESC', '������������� � ������<br>����� ������ � ������� �� ������');
    define('_AM_WEBLINKS_GM_USE_NISHIOKA', '[�����][������] ������������� ��������� �������');
    define('_AM_WEBLINKS_GM_USE_NISHIOKA_DESC', '������������� � ������<br>����� ������ �� ������ � �������<br><a href="http://nishioka.sakura.ne.jp/google/" target="_blank">http://nishioka.sakura.ne.jp/google/</a>');
    define('_AM_WEBLINKS_GM_TITLE_LENGTH', '[���������] �������� �������� ��� ���������');
    define('_AM_WEBLINKS_GM_TITLE_LENGTH_DESC', '������������ ����� �������� ������������ ��� ��������� � ���������<br><b>-1</b> �� ����������');
    define('_AM_WEBLINKS_GM_DESC_LENGTH', '[���������] �������� �������� ��� ����������');
    define('_AM_WEBLINKS_GM_DESC_LENGTH_DESC', '������������ ����� �������� ������������ ��� ���������� � ���������<br><b>-1</b> �� ����������');
    define('_AM_WEBLINKS_GM_WORDWRAP', '[���������] �������� �������� ��� �������� �����');
    define('_AM_WEBLINKS_GM_WORDWRAP_DESC', '������������ ����� �������� ������������ ��� ������ ������ (������� ����) � ���������<br><b>-1</b> �� ����������');
    define('_AM_WEBLINKS_GM_USE_CENTER_MARKER', '[���������] ���������� ����������� ���������');
    define('_AM_WEBLINKS_GM_USE_CENTER_MARKER_DESC', '�� ������� �������� � �������� ���������, ���������� ����������� ���������');

    // map jp
    define('_AM_WEBLINKS_MAP_JP_MANAGE', '������������ ����� ������');

    // column
    define('_AM_WEBLINKS_COLUMN_MANAGE', '���������� ���������');
    define('_AM_WEBLINKS_COLUMN_MANAGE_DESC', '�������� ������� etc � ������� link � �������� �������');
    define('_AM_WEBLINKS_COLUMN_MANAGE_NOT_USE', '�� ������������');
    define('_AM_WEBLINKS_THERE_ARE_COLUMN', '����� <b>%s</b> etc ������� � ������� link');
    define('_AM_WEBLINKS_COLUMN_NUM', '���������� ����������� etc �������');
    define('_AM_WEBLINKS_COLUMN_BIGGER_USE', '���������� etc ������� ������, ��� ����� � ������� link');
    define('_AM_WEBLINKS_COLUMN_UNMATCH', '������� ����������� � ������� link, �������� �������');
    define('_AM_WEBLINKS_PHPMYADMIN', '�������� � ����������� ����������, ����� ��� phpMyAdmin');
    define('_AM_WEBLINKS_LINK_NUM_ETC', '���������� etc �������');

    // latest
    define('_AM_WEBLINKS_INDEX_MODE_LATEST', '������� ��������� ������');
    define('_AM_WEBLINKS_INDEX_MODE_LATEST_UPDATE', '���� ����������');
    define('_AM_WEBLINKS_INDEX_MODE_LATEST_CREATE', '���� ��������');

    // header
    define('_AM_WEBLINKS_CONF_HTML_STYLE', '������������ HTML �����');
    define('_AM_WEBLINKS_HEADER_MODE', '������������ ��������� ������ XOOPS');
    define('_AM_WEBLINKS_HEADER_MODE_DESC', '����� "���", ���������� ������� ������ � Javascript � ���� body<br>����� "��", ���������� ��� � ���� header, ��������� ��������� ������ XOOPS. ������, ���� ��������� ����, ������� �� ����� ���� ������������');

    // bulk
    define('_AM_WEBLINKS_BULK_SAMPLE', '�� ������ ���������� ������, ����� ������ ������');
    define('_AM_WEBLINKS_BULK_LINK_DSC10', '����������� ������� �����������');
    define('_AM_WEBLINKS_BULK_LINK_DSC20', '������������� ���������� ����������� �������');
    define('_AM_WEBLINKS_BULK_LINK_DSC21', '������ ��������');
    define('_AM_WEBLINKS_BULK_LINK_DSC22', '������ �������� � ���������');
    define('_AM_WEBLINKS_BULK_LINK_DSC23', '������� ����� ������������������ ������� � 1-�� ������.<br>������� �������������� ������ (---)');
    define('_AM_WEBLINKS_BULK_LINK_DSC24', '������� ������������������ ������ �� ������� � ������ ���������, ����������� �������(,) �� 2-�� ������.');
    define('_AM_WEBLINKS_BULK_CHECK_URL', '��������� ��������� ������');
    define('_AM_WEBLINKS_BULK_CHECK_DESCRIPTION', '��������� ��������� ��������');
}

//---------------------------------------------------------
// compatible for v1.51
//---------------------------------------------------------
if (!defined('_AM_WEBLINKS_USE_HIGHLIGHT')) {
    // highlight
    define('_AM_WEBLINKS_USE_HIGHLIGHT', '������������ ��������� �������� ����');
    define('_AM_WEBLINKS_CHECK_MAIL', '��������� ������ ������������ �����');
    define('_AM_WEBLINKS_CHECK_MAIL_DSC', '��� ����������� � ����� �����. <br> �� �����������, ��� ����� ����������� ����� � ������� abc@efg.com, ����� �������������� ������. ');
    define('_AM_WEBLINKS_NO_EMAIL', '�� ������ ����� ����������� �����');
}

//---------------------------------------------------------
// compatible for v1.50
//---------------------------------------------------------
if (!defined('_AM_WEBLINKS_CONF_D3FORUM')) {
    // d3forum
    define('_AM_WEBLINKS_CONF_D3FORUM', '���������� ������������ � ������� d3forum');
    define('_AM_WEBLINKS_PLUGIN_SEL', '�������� ������');
    define('_AM_WEBLINKS_DIRNAME_SEL', '�������� ������');

    // category
    define('_AM_WEBLINKS_CAT_PATH_STYLE', '����� ��������� ���� ���������');

    // category page
    define('_AM_WEBLINKS_CONF_CAT_PAGE', '��������� �������� ���������');
    define('_AM_WEBLINKS_CAT_COLS', '����� ������� � ����������');
    define('_AM_WEBLINKS_CAT_COLS_DESC', '�� �������� ���������, ������� ����� �������, ��� ������ ��������� ��� ����� ���������');
    define('_AM_WEBLINKS_CAT_SUB_MODE', '�������� ��������� ������������');
    define('_AM_WEBLINKS_CAT_SUB_MODE_1', '������ ��������� ��� ����� ���������');
    define('_AM_WEBLINKS_CAT_SUB_MODE_2', '��� ��������� ��� ����� � ����� ���������');
}

//---------------------------------------------------------
// compatible for v1.42
//---------------------------------------------------------
if (!defined('_WEBLINKS_GM_TYPE')) {
    define('_WEBLINKS_GM_TYPE', '��� ����� Google');
    define('_WEBLINKS_GM_TYPE_MAP', '�����');
    define('_WEBLINKS_GM_TYPE_SATELLITE', '�������');
    define('_WEBLINKS_GM_TYPE_HYBRID', '������');
}

if (!defined('_AM_WEBLINKS_CAT_DESC_MODE')) {
    define('_AM_WEBLINKS_CAT_DESC_MODE', '�������� ��������');
    define('_AM_WEBLINKS_CAT_SHOW_FORUM', '�������� �����');
    define('_AM_WEBLINKS_CAT_SHOW_ALBUM', '�������� ������');
    define('_AM_WEBLINKS_MODE_SETTING', '��������� ��������');
    define('_AM_WEBLINKS_MODE_OMIT_PARENT', '����� ��, ��� ������������ ���������, ����� ������������');
}

//---------------------------------------------------------
// compatible for v1.41
//---------------------------------------------------------
if (!defined('_WEBLINKS_ALBUM_ID')) {
    define('_WEBLINKS_ALBUM_ID', 'ID �������');
    define('_WEBLINKS_ALBUM_SEL', '�������� ������');
}

if (!defined('_AM_WEBLINKS_UPDATE_CAT_IMAGE_SIZE')) {
    define('_AM_WEBLINKS_UPDATE_CAT_IMAGE_SIZE', '���������� ������� ����������� ���������');

    define('_AM_WEBLINKS_CONF_INDEX', '������������ ������� ��������');
    define('_AM_WEBLINKS_CONF_INDEX_GM_MODE', '����� ����� Google');

    define('_AM_WEBLINKS_CAT_SHOW_GM', '�������� ����� Google');
    define('_AM_WEBLINKS_MODE_NON', '�� ����������');
    define('_AM_WEBLINKS_MODE_DEFAULT', '�������� �� ���������');
    define('_AM_WEBLINKS_MODE_PARENT', '����� ��, ��� ������������ ���������');
    define('_AM_WEBLINKS_MODE_FOLLOWING', '��������� ��������');

    define('_AM_WEBLINKS_CONF_CAT_ALBUM', '�������� ������� � ���������');
    define('_AM_WEBLINKS_CONF_LINK_ALBUM', '�������� ������� � ������');
    define('_AM_WEBLINKS_ALBUM_SEL', '�������� ������ �������');
    define('_AM_WEBLINKS_ALBUM_LIMIT', '���������� ������������ ����������');
    define('_AM_WEBLINKS_WHEN_OMIT', '�������, ����� ������������');

    define('_AM_WEBLINKS_MODULE_INSTALLED', '%s ������ ( %s ) ������ %s ����������');
    define('_AM_WEBLINKS_MODULE_NOT_INSTALLED', '%s ������ ( %s ) �� ����������');
}

//---------------------------------------------------------
// compatible for v1.4x
//---------------------------------------------------------
if (!defined('_WEBLINKS_LATEST_FORUM')) {
    // forum
    define('_WEBLINKS_LATEST_FORUM', '��������� �����');
    define('_WEBLINKS_FORUM', '�����');
    define('_WEBLINKS_THREAD', '����');
    define('_WEBLINKS_POST', '���������');
    define('_WEBLINKS_FORUM_ID', 'ID ������');
    define('_WEBLINKS_FORUM_SEL', '�������� �����');
    define('_WEBLINKS_COMMENT_USE', '������������ ����������� XOOPS');

    // aux
    define('_WEBLINKS_CAT_AUX_TEXT_1', 'aux_text_1');
    define('_WEBLINKS_CAT_AUX_TEXT_2', 'aux_text_2');
    define('_WEBLINKS_CAT_AUX_INT_1', 'aux_int_1');
    define('_WEBLINKS_CAT_AUX_INT_2', 'aux_int_2');

    // captcha
    define('_WEBLINKS_CAPTCHA', 'Captcha');
    define('_WEBLINKS_CAPTCHA_DESC', '����-����');
    define('_WEBLINKS_ERROR_CAPTCHA', '������: �������������� Captcha');
    define('_WEBLINKS_ERROR', '������');

    // hack for multi site
    define('_WEBLINKS_CAT_TITLE_JP', '�������� ���������');
    define('_WEBLINKS_DISABLE_FEATURE', '��������� ��� �������');
    define('_WEBLINKS_REDIRECT_JP_SITE', '������� �� �������� ����');
}

if (!defined('_AM_WEBLINKS_UPDATE_CAT_PATH')) {
    // performance
    define('_AM_WEBLINKS_UPDATE_CAT_PATH', '���������� ����� ������ ���������');
    define('_AM_WEBLINKS_UPDATE_CAT_COUNT', '���������� �������� ������ ����������');
    define('_AM_WEBLINKS_CAT_COUNT_UPDATED', '���� ������ ��������� ���������');

    // config
    define('_AM_WEBLINKS_SYSTEM_POST_LINK', '���������� ���������, ����� ������������ ������');
    define('_AM_WEBLINKS_SYSTEM_POST_LINK_DSC', '�� ����������� ��������� XOOPS ������������, ����� ������������ ���������� ����� ������. ');
    define('_AM_WEBLINKS_SYSTEM_POST_RATE', '���������� ���������, ����� ����������� ������');
    define('_AM_WEBLINKS_SYSTEM_POST_RATE_DSC', '�� ����������� ��������� XOOPS ������������, ����� ������������ ��������� ������. ');

    define('_AM_WEBLINKS_VIEW_STYLE_CAT', '����� ��������� � ������ ���������');
    define('_AM_WEBLINKS_VIEW_STYLE_MARK', '����� ��������� � ������������� ������');
    define('_AM_WEBLINKS_VIEW_STYLE_MARK_DSC', '��� ����������� � ������������� ������, ������ ������, RSS/ATOM ������');
    define('_AM_WEBLINKS_VIEW_STYLE_0', '�������');
    define('_AM_WEBLINKS_VIEW_STYLE_1', '������');

    define('_AM_WEBLINKS_CONF_PERFORMANCE', '��������� �������������');
    define('_AM_WEBLINKS_CONF_PERFORMANCE_DSC', '���� ��������� ������������������, �� ����������� ����������� ������ �������, ����� ������������, � ��� �������� � ���� ������.<br>����� ������������ � ������ ���, ��������� "������ ���������" -> "���������� ����� ������ ���������"');
    define('_AM_WEBLINKS_CAT_PATH', '���� ������ ���������');
    define('_AM_WEBLINKS_CAT_PATH_DSC', '�� ��������� ���� ������ ���������, � �� �������� � ������� ���������.<br>��� �����������, ����� ������������.');
    define('_AM_WEBLINKS_CAT_COUNT', '������� ������ ����������');
    define('_AM_WEBLINKS_CAT_COUNT_DSC', '�� ��������� ������� ������ ���������, � �� �������� � ������� ���������.<br>��� �����������, ����� ������������.');

    define('_AM_WEBLINKS_POST_TEXT_4', '��� �������� ������������ �� �������� �����������������');
    define('_AM_WEBLINKS_LINK_REGISTER_1', '��������� ������: ��������� ���� 1');

    define('_AM_WEBLINKS_CONF_LINK_GUEST', '������������ �������� ����������� ������');
    define('_AM_WEBLINKS_USE_CAPTCHA', '������������ CAPTCHA');
    define('_AM_WEBLINKS_USE_CAPTCHA_DSC', 'CAPTCHA �������� ����������� ����-�����.<br>��� ���� ������� ����� ������ Captcha.<br>��, <b>��������� ������������</b> ������ ������������ CAPTCHA ����� ��������� ��� �������� ������.<br>��� �� ���������� ���� CAPTCHA.');
    define('_AM_WEBLINKS_CAPTCHA_FINDED', '������ Captcha ������ %s ������');
    define('_AM_WEBLINKS_CAPTCHA_NOT_FINDED', '������ Captcha �� ������');

    define('_AM_WEBLINKS_CONF_SUBMIT', '�������� ��������������� ����� ������');
    define('_AM_WEBLINKS_SUBMIT_MAIN', '�������� ��� ���������� ����� ������: 1');
    define('_AM_WEBLINKS_SUBMIT_PENDING', '�������� ��� ���������� ����� ������: 2');
    define('_AM_WEBLINKS_SUBMIT_DOUBLE', '�������� ��� ���������� ����� ������: 3');
    define('_AM_WEBLINKS_SUBMIT_MAIN_DSC', '�������� ������');
    define('_AM_WEBLINKS_SUBMIT_PENDING_DSC', '����������, ����� ����� "���������� ��������� ���������������"');
    define('_AM_WEBLINKS_SUBMIT_DOUBLE_DSC', '����������, ����� ����� "��������� ��� ������������ ������"');

    define('_AM_WEBLINKS_MODLINK_MAIN', '�������� ��� ��������� ������: 1');
    define('_AM_WEBLINKS_MODLINK_PENDING', '�������� ��� ��������� ������: 2');
    define('_AM_WEBLINKS_MODLINK_NOT_OWNER', '�������� ��� ��������� ������: 3');
    define('_AM_WEBLINKS_MODLINK_NOT_OWNER_DSC', '����������, ����� ����� "���������� ��������� ���������������" � ��� ���������');

    define('_AM_WEBLINKS_CONF_CAT_FORUM', '�������� ������ � ���������');
    define('_AM_WEBLINKS_CONF_LINK_FORUM', '�������� ������ � ������');
    define('_AM_WEBLINKS_FORUM_SEL', '�������� ������ ������');
    define('_AM_WEBLINKS_FORUM_THREAD_LIMIT', '���������� ������������ ���');
    define('_AM_WEBLINKS_FORUM_POST_LIMIT', '���������� ������������ ��������� � ������ ����');
    define('_AM_WEBLINKS_FORUM_POST_ORDER', '������� ���������');
    define('_AM_WEBLINKS_FORUM_POST_ORDER_0', '�� ���� ������� ���������');
    define('_AM_WEBLINKS_FORUM_POST_ORDER_1', '�� ���� ����� ���������');
    define('_AM_WEBLINKS_FORUM_INSTALLED', '������ ������ ( %s ) ������ %s ����������');
    define('_AM_WEBLINKS_FORUM_NOT_INSTALLED', '������ ������ ( %s ) �� ����������');
}

//---------------------------------------------------------
// compatible for v1.3x
//---------------------------------------------------------
if (!defined('_WEBLINKS_GM_SEARCH_MAP_FROM_ADDRESS')) {
    // google map: Geocode
    define('_WEBLINKS_GM_SEARCH_MAP_FROM_ADDRESS', '����� ����� �� ������');
    define('_WEBLINKS_GM_NO_MATCH_PLACE', '��� �����, ���������������� ������');
    define('_WEBLINKS_GM_JP_SEARCH_MAP_FROM_ADDRESS', '����� ����� �� ������ � ������');
    define('_WEBLINKS_GM_JP_TOKYO_AC_GEOCODE', '�������� ��������� �����������');
    define('_WEBLINKS_GM_JP_MLIT_ISJ', '�������� ������������ ��������� �������������� � ����������');

    // link item
    define('_WEBLINKS_TIME_PUBLISH', '���� ����������');
    define('_WEBLINKS_TIME_EXPIRE', '���� ���������');
    define('_WEBLINKS_TEXTAREA', '��������� ����');

    define('_WEBLINKS_WARN_TIME_PUBLISH', '����� ���������� ��� �� ���������');
    define('_WEBLINKS_WARN_TIME_EXPIRE', '�������� ���� ���������');
    define('_WEBLINKS_WARN_BROKEN', '������ ����� ���� ������������');
}

if (!defined('_AM_WEBLINKS_LINK_TIME_PUBLISH_BEFORE')) {
    // link item
    //	define('_AM_WEBLINKS_TIME_PUBLISH','Set the publication time');
    //	define('_AM_WEBLINKS_TIME_PUBLISH_DESC','If you do not check it, published time will become undated');
    //	define('_AM_WEBLINKS_TIME_EXPIRE','Set expiration time');
    //	define('_AM_WEBLINKS_TIME_EXPIRE_DESC','If you do not check it, expired setting will become undated');

    define('_AM_WEBLINKS_LINK_TIME_PUBLISH_BEFORE', '������ ������ �� ������� ����������');
    define('_AM_WEBLINKS_LINK_TIME_EXPIRE_AFTER', '������ ������ ����� ��������� �������');

    define('_AM_WEBLINKS_SERVER_ENV', '��������� �����');
    define('_AM_WEBLINKS_DEBUG_CONF', '���������� �������');
    define('_AM_WEBLINKS_ALL_GREEN', '��� �������');
}

//---------------------------------------------------------
// compatible for v1.2x
//---------------------------------------------------------
// main
if (!defined('_WEBLINKS_GOOGLE_MAPS')) {
    // google map inline mode
    define('_WEBLINKS_GOOGLE_MAPS', '����� Google');
    define('_WEBLINKS_JAVASCRIPT_INVALID', '��� ������� �� ����� ������������ JavaScript');
    define('_WEBLINKS_GM_NOT_COMPATIBLE', '��� ������� �� ����� ������������ ����� Google');
    define('_WEBLINKS_GM_NEW_WINDOW', '�������� � ����� ����');
    define('_WEBLINKS_GM_INLINE', '�������� ���������');
    define('_WEBLINKS_GM_DISP_OFF', '��������� �����');

    // google map: inverse Geocoder
    define('_WEBLINKS_GM_GET_LATITUDE', '�������� ������/�������/������� ����������');
    define('_WEBLINKS_GM_GET_ADDR', '�������� �����');
}

//---------------------------------------------------------
// compatible for v1.1x
//---------------------------------------------------------
// main
if (!defined('_WEBLINKS_MAP_USE')) {
    define('_WEBLINKS_MAP_USE', '������������ ������ �����');

    // rssc
    define('_WEBLINKS_RSSC_LID', 'RSSC Lid');
    define('_WEBLINKS_RSS_MODE', '����� RSS');
    define('_WEBLINKS_RSSC_NOT_INSTALLED', '������ RSSC ( %s ) �� ����������');
    define('_WEBLINKS_RSSC_INSTALLED', '������ RSSC ( %s ) ������ %s is ����������');
    define('_WEBLINKS_RSSC_REQUIRE', '��������� ������ RSSC ������ %s ��� �������');
    define('_WEBLINKS_GOTO_SINGLELINK', '������� � ���������� ������');

    // warnig
    define('_WEBLINKS_WARN_NOT_READ_URL', '��������������: �� ������� ��������� �����');
    define('_WEBLINKS_WARN_BANNER_NOT_GET_SIZE', '��������������: �� ������� �������� ������ �������');

    // google map
    define('_WEBLINKS_GM_LATITUDE', '������');
    define('_WEBLINKS_GM_LONGITUDE', '�������');
    define('_WEBLINKS_GM_ZOOM', '������� ����������');
    define('_WEBLINKS_GM_GET_LOCATION', '���������� � ��������������, ���������� � ���� Google');
    define('_WEBLINKS_GM_GET_BUTTON', '�������� ������/�������/������� ����������');
    define('_WEBLINKS_GM_DEFAULT_LOCATION', '�������������� �� ���������');
    define('_WEBLINKS_GM_CURRENT_LOCATION', '������� ��������������');
}

// admin
if (!defined('_AM_WEBLINKS_MODULE_CONFIG_3')) {
    // menu
    define('_AM_WEBLINKS_MODULE_CONFIG_3', '������������ ������ 3');
    define('_AM_WEBLINKS_MODULE_CONFIG_4', '������������ ������ 4');
    define('_AM_WEBLINKS_VOTE_LIST', '������ �����������');
    define('_AM_WEBLINKS_CATLINK_LIST', '������ ������ �� ����������');
    define('_AM_WEBLINKS_COMMAND_MANAGE', '���������� ��������');
    define('_AM_WEBLINKS_TABLE_MANAGE', '���������� ��������� ���� ������');
    define('_AM_WEBLINKS_IMPORT_MANAGE', '���������� ��������');
    define('_AM_WEBLINKS_EXPORT_MANAGE', '���������� ���������');

    // config
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_2', '��������������, ���������, �.�.');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_3', '������');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_4', 'RSS, �����, �����');
    define('_AM_WEBLINKS_LINK_REGISTER', '��������� ������: ��������');

    // bin configuration
    define('_AM_WEBLINKS_FORM_BIN', '������������ �������');
    define('_AM_WEBLINKS_FORM_BIN_DESC', '�� ������������ �� �������� �������');
    define('_AM_WEBLINKS_CONF_BIN_PASS', '������');
    //define('_AM_WEBLINKS_CONF_BIN_PASS_DESC','');
    define('_AM_WEBLINKS_CONF_BIN_SEND', '��������� �����');
    //define('_AM_WEBLINKS_CONF_BIN_SEND_DESC','');
    define('_AM_WEBLINKS_CONF_BIN_MAILTO', '����������� ����� ��� ��������');
    //define('_AM_WEBLINKS_CONF_BIN_MAILTO_DESC','');

    // rssc
    define('_AM_WEBLINKS_RSS_DIRNAME', '���������� ������ RSSC');
    //define('_AM_WEBLINKS_RSS_DIRNAME_DESC','');

    // link manage
    define('_AM_WEBLINKS_DEL_LINK', '������� ������');
    define('_AM_WEBLINKS_ADD_RSSC', '�������� ������ � ������ RSSC');
    define('_AM_WEBLINKS_MOD_RSSC', '�������� ������ � ������ RSSC');
    define('_AM_WEBLINKS_REFRESH_RSSC', '�������� ������ � ������ RSSC');
    define('_AM_WEBLINKS_APPROVE', '��������� ����� ������');
    define('_AM_WEBLINKS_APPROVE_MOD', '��������� ������ ��������� ������');
    define('_AM_WEBLINKS_RSSC_LID_SAVED', '����������� rssc lid');
    define('_AM_WEBLINKS_GOTO_LINK_LIST', '������� � ������ ������');
    define('_AM_WEBLINKS_GOTO_LINK_EDIT', '������� � ��������� ������');
    define('_AM_WEBLINKS_ADD_BANNER', '�������� ������� ����������� �������');
    define('_AM_WEBLINKS_MOD_BANNER', '�������� ������ ����������� �������');

    // vote list
    define('_AM_WEBLINKS_VOTE_USER', '������ ������������������ �������������');
    define('_AM_WEBLINKS_VOTE_ANON', '������ ��������� �������������');

    // locate
    define('_AM_WEBLINKS_CONF_LOCATE', '������������ ����������');
    define('_AM_WEBLINKS_CONF_COUNTRY_CODE', '��� ������');
    define('_AM_WEBLINKS_CONF_COUNTRY_CODE_DESC', '������� ccTLDs ��� <br/> <a href="http://www.iana.org/cctld/cctld-whois.htm" target="_blank">IANA: ���� ����� ������� �������� ������</a>');
    define('_AM_WEBLINKS_CONF_RENEW_COUNTRY_CODE_DESC', '�������� �����, ������� ��������� � ���� ������. <br/> ����� � �������� <span style="color:#0000ff;">#</span>');
    define('_AM_WEBLINKS_RENEW', '��������');

    // map
    define('_AM_WEBLINKS_CONF_MAP', '������������ ����� �����');
    define('_AM_WEBLINKS_CONF_MAP_USE', '������������ ����� �����');
    define('_AM_WEBLINKS_CONF_MAP_TEMPLATE', '������ ����� �����');
    define('_AM_WEBLINKS_CONF_MAP_TEMPLATE_DESC', '������� ��� ������� ����� � ���������� template/map/');

    // google map
    define('_AM_WEBLINKS_CONF_GOOGLE_MAP', '������������ ���� Google');
    define('_AM_WEBLINKS_CONF_GM_USE', '������������ ����� Google');
    define('_AM_WEBLINKS_CONF_GM_APIKEY', '���� API ���� Google');
    define('_AM_WEBLINKS_CONF_GM_APIKEY_DESC', '�������� ���� API �� <br/> <a href="http://www.google.com/apis/maps/signup.html" target="_blank">http://www.google.com/apis/maps/signup.html</a> <br/> ��� ������������� ���� Google.');
    define('_AM_WEBLINKS_CONF_GM_SERVER', '��� �������');
    define('_AM_WEBLINKS_CONF_GM_LANG', '��� �����');
    define('_AM_WEBLINKS_CONF_GM_LOCATION', '�������������� �� ���������');
    define('_AM_WEBLINKS_CONF_GM_LATITUDE', '������ �� ���������');
    define('_AM_WEBLINKS_CONF_GM_LONGITUDE', '������� �� ���������');
    define('_AM_WEBLINKS_CONF_GM_ZOOM', '������� ���������� �� ���������');

    // google search
    define('_AM_WEBLINKS_CONF_GOOGLE_SEARCH', '������������ ������ Google');
    define('_AM_WEBLINKS_CONF_GOOGLE_SERVER', '��� �������');
    define('_AM_WEBLINKS_CONF_GOOGLE_LANG', '��� �����');

    // template
    define('_AM_WEBLINKS_CONF_TEMPLATE', '�������� ��� ��������');
    define('_AM_WEBLINKS_CONF_TEMPLATE_DESC', '���������� ���������, ��� ��������� ������ ������� � ����������� template/parts/ template/xml/ � template/map/');
}

//---------------------------------------------------------
// compatible for v1.0x
//---------------------------------------------------------
// main
if (!defined('_WEBLINKS_OPTIONS')) {
    //	define('_HOME',  'Home');
    //	define('_SAVE',  'Save');
    //	define('_SAVED', 'Saved');
    //	define('_CREATE', 'Create');
    //	define('_CREATED','Created');
    //	define('_FINISH',   'Finish');
    //	define('_FINISHED', 'Finished');
    //	define('_EXECUTE', 'Execute');
    //	define('_EXECUTED','Executed');
    //	define('_PRINT','Print');
    //	define('_SAMPLE','Sample');

    define('_NO_MATCH_RECORD', '��� ��������������� ������');
    define('_MANY_MATCH_RECORD', '���� ��� ��� ����� �������������� ������');
    define('_NO_CATEGORY', '��� ���������');
    define('_NO_LINK', '��� ������');
    define('_NO_TITLE', '��� ���������');
    define('_NO_URL', '��� ������');
    define('_NO_DESCRIPTION', '��� ��������');

    //	define('_GOTO_MAIN',   'Goto Main');
    //	define('_GOTO_MODULE', 'Goto Module');

    // config
    //	define('_WEBLINKS_INIT_NOT', 'The config table is not initialized');
    //	define('_WEBLINKS_INIT_EXEC', 'Initialized the config table');
    //	define('_WEBLINKS_VERSION_NOT','It is not version  %s');
    //	define('_WEBLINKS_UPGRADE_EXEC','Upgrad the config table');

    // html tag
    define('_WEBLINKS_OPTIONS', '�����');
    define('_WEBLINKS_DOHTML', ' �������� HTML-����');
    define('_WEBLINKS_DOIMAGE', ' �������� �����������');
    define('_WEBLINKS_DOBREAK', ' �������� ������� ������');
    define('_WEBLINKS_DOSMILEY', ' �������� ������ ���������');
    define('_WEBLINKS_DOXCODE', ' �������� XOOPS-����');

    define('_WEBLINKS_PASSWORD_INCORRECT', '������������ ������');
    define('_WEBLINKS_ETC', '������');
    define('_WEBLINKS_AUTH_UID', 'ID ������������ ���������');
    define('_WEBLINKS_AUTH_PASSWD', '������ ���������');
    define('_WEBLINKS_BANNER_SIZE', '������ �������');
}

// admin
if (!defined('_AM_WEBLINKS_ADD_CATEGORY')) {
    // category
    define('_AM_WEBLINKS_ADD_CATEGORY', '�������� ����� ���������');
    define('_AM_WEBLINKS_ERROR_SOME', '���� ��������� ��������� �� �������');
    define('_AM_WEBLINKS_LIST_ID_ASC', '������ �� ������ ID');
    define('_AM_WEBLINKS_LIST_ID_DESC', '������ �� ����� ID');

    // config
    define('_AM_WEBLINKS_WARNING_NOT_WRITABLE', '���������� ���������� ��� ������');
    define('_AM_WEBLINKS_CONF_LINK', '������������ ������');
    define('_AM_WEBLINKS_CONF_LINK_IMAGE', '������������ ����������� ������');
    define('_AM_WEBLINKS_CONF_VIEW', '������������ ���������');
    define('_AM_WEBLINKS_CONF_TOPTEN', '������������ ������ �������');
    define('_AM_WEBLINKS_CONF_SEARCH', '������������ ������');
    define('_AM_WEBLINKS_USE_BROKENLINK', '������ ������������ ������');
    define('_AM_WEBLINKS_USE_BROKENLINK_DSC', '�� ��������� ������������� ����������� � ������������ �������');
    define('_AM_WEBLINKS_USE_HITS', '����������� ������� ��������� ����� ��������� �� ����');
    define('_AM_WEBLINKS_USE_HITS_DSC', '�� ��������� ����������� ������� ���������, ����� ��������� �� ����');
    define('_AM_WEBLINKS_USE_PASSWD', '�������������� �� ������');
    define('_AM_WEBLINKS_USE_PASSWD_DSC', '��, <b>��������� ������������</b> ����� �������� ������ � ��������������� �� ������.<br>���, <br>���� ������ �� ������������.');
    define('_AM_WEBLINKS_PASSWD_MIN', '����������� ����� ���������� ������');
    define('_AM_WEBLINKS_POST_TEXT', '������������� ����� ��� ���������� ����������');
    define('_AM_WEBLINKS_AUTH_DOHTML', '���������� �� ������������� HTML-�����');
    define('_AM_WEBLINKS_AUTH_DOHTML_DSC', '������� ������, ������� ��������� ������������ HTML-����');
    define('_AM_WEBLINKS_AUTH_DOSMILEY', '���������� �� ������������� ������ ���������');
    define('_AM_WEBLINKS_AUTH_DOSMILEY_DSC', '������� ������, ������� ��������� ������������ ������ ���������');
    define('_AM_WEBLINKS_AUTH_DOXCODE', '���������� �� ������������� XOOPS-�����');
    define('_AM_WEBLINKS_AUTH_DOXCODE_DSC', '������� ������, ������� ��������� ������������ XOOPS-����');
    define('_AM_WEBLINKS_AUTH_DOIMAGE', '���������� �� ������������� �����������');
    define('_AM_WEBLINKS_AUTH_DOIMAGE_DSC', '������� ������, ������� ��������� ������������ �����������');
    define('_AM_WEBLINKS_AUTH_DOBR', '���������� �� ������������� �������� �����');
    define('_AM_WEBLINKS_AUTH_DOBR_DSC', '������� ������, ������� ��������� ������������ �������� �����');
    define('_AM_WEBLINKS_SHOW_CATLIST', '�������� ������ ��������� � �������');
    define('_AM_WEBLINKS_SHOW_CATLIST_DSC', '�� �������� ������ ������� ��������� � �������');
    define('_AM_WEBLINKS_VIEW_URL', '����� ��������� ������');
    define('_AM_WEBLINKS_VIEW_URL_DSC', 'NONE <br>�� ���������� ����� ��� &lt;a&gt; ���.<br>��������<br> ���������� visit.php � ������ ���� ������ ������. <br>������ <br>���������� ����� � ������ ����, ����� JavaScript � ������� onmousedown ���� ��������� ��������� ����� JavaScript.');
    define('_AM_WEBLINKS_VIEW_URL_0', 'NONE');
    define('_AM_WEBLINKS_VIEW_URL_1', '�������� �����');
    define('_AM_WEBLINKS_VIEW_URL_2', '������ �����');
    define('_AM_WEBLINKS_RECOMMEND_PRI', '��������� ������������� ������');
    define('_AM_WEBLINKS_RECOMMEND_PRI_DSC', 'NONE <br>�� ����������.<br>���������� <br>������������� ����� ������������ � ���������.<br>������� <br>���������� ��������������� ����� ������� ������ ��������������� ���������.');
    define('_AM_WEBLINKS_MUTUAL_PRI', '��������� ������ ������');
    define('_AM_WEBLINKS_MUTUAL_PRI_DSC', 'NONE <br>�� ����������.<br>���������� <br>������ ����� ������������ � ���������.<br>������� <br>���������� ������ ����� ������� ������ ��������������� ���������.');
    define('_AM_WEBLINKS_PRI_0', 'NONE');
    define('_AM_WEBLINKS_PRI_1', '����������');
    define('_AM_WEBLINKS_PRI_2', '�������');
    define('_AM_WEBLINKS_LINK_IMAGE_AUTO', '�������������� ���������� ������� �������');
    define('_AM_WEBLINKS_LINK_IMAGE_AUTO_DSC', '�� <br>��������� ������ ����������� ������� �������������.');
    define('_AM_WEBLINKS_RSS_USE', '������������ RSS ������');
    define('_AM_WEBLINKS_RSS_USE_DSC', '�� <br>�������� � ���������� RSS/ATOM ������.');

    // bulk import
    define('_AM_WEBLINKS_BULK_IMPORT', '�������� ������');
    define('_AM_WEBLINKS_BULK_IMPORT_FILE', '�������� ������ �� �����');
    define('_AM_WEBLINKS_BULK_CAT', '�������� ������ ���������');
    define('_AM_WEBLINKS_BULK_CAT_DSC1', '������� ���������');
    define('_AM_WEBLINKS_BULK_CAT_DSC2', '����������� ����� ������� ������ (>)  � ������ ��������� ��� ����������� ��������� ��� ������������.');
    define('_AM_WEBLINKS_BULK_LINK', '�������� ������ ������');
    define('_AM_WEBLINKS_BULK_LINK_DSC1', '������� ��������� � 1-� ������.');
    define('_AM_WEBLINKS_BULK_LINK_DSC2', '������� ��������� ������, ����� � ����������, ����������� �������(,) �� 2-�� ������.');
    define('_AM_WEBLINKS_BULK_LINK_DSC3', '����������� ���� ��� ���������� ������ �������������� ������� (---) .');
    define('_AM_WEBLINKS_BULK_ERROR_LAYER', '������� ��� ��� ����� �������� � ��������� ������ ���������. ��� ���������� ��������.');
    define('_AM_WEBLINKS_BULK_ERROR_CID', '�������� ID ���������');
    define('_AM_WEBLINKS_BULK_ERROR_PID', '��������� ID ������������ ���������');
    define('_AM_WEBLINKS_BULK_ERROR_FINISH', '�������� ����������� �����-�� �������');

    // command
    define('_AM_WEBLINKS_CREATE_CONFIG', '������� ���� ������������');
    define('_AM_WEBLINKS_TEST_EXEC', '��������� ���� ��� %s');
}

// these words are added in v1.01
// rename MI_xx to AM_xx
if (!defined('_AM_WEBLINKS_INDEX_DESC')) {
    define('_AM_WEBLINKS_INDEX_DESC', '������������� ����� ������� ��������');
    define('_AM_WEBLINKS_INDEX_DESC_DSC', '�� ������ ������������ ���� ������, ����� �������� ��������� �������� ��� ������� �����. HTML �����������.');
    define('_AM_WEBLINKS_INDEX_DESC_DEFAULT', '<div align="center" style="color: #0000ff">��� ����� ��������� �������� ����� ��������.<br>�� ������ ��������������� ��� � "������������ ������ 2".<br></div>');
}

// these words are defined in admin.php
// use for linkitem_define
if (!defined('_WEBLINKS_MID')) {
    define('_WEBLINKS_MID', '�������� ID');
    define('_WEBLINKS_USERID', 'ID ������������');
    define('_WEBLINKS_CREATE', '�������');
}

// these words are NOT defined in xoops 2.2.3 english
if (!defined('_US_PASSWORD')) {
    define('_US_PASSWORD', '������');
    define('_US_TYPEPASSTWICE', '(������� ����� ������ ������, ����� �������� ���)');
    define('_US_PASSNOTSAME', '��� ������ ��������. ��� ������ ���� ���������.');
    define('_US_PWDTOOSHORT', '� ���������, ��� ������ ������ ���� �� ������� ���� <b>%s</b> �������� �������.');
    define('_US_VERIFYPASS', '������������� ������');
}

if (!defined('_WEBLINKS_FROM')) {
    define('_WEBLINKS_FROM', '��');        // From
    define('_WEBLINKS_EXECUTION_TIME', '����� ����������');        // execution time
    define('_WEBLINKS_MEMORY_USAGE', '������������� ������');        // memory usage
    define('_WEBLINKS_SEC', '���');        // sec
    define('_WEBLINKS_MB', '��');        // MB
    define('_WEBLINKS_FILE', '����');        //file

    define('_WEBLINKS_RDF_FEED', 'RDF �����');        //RDF feed
    define('_WEBLINKS_RSS_FEED', 'RSS �����');        //RSS feed
    define('_WEBLINKS_ATOM_FEED', 'ATOM �����');        //ATOM feed
    define('_WEBLINKS_NOFEED', '��� ������');        //No Feed
    define('_WEBLINKS_IN', '�');        //in
}
