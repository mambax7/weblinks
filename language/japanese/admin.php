<?php

// $Id: admin.php,v 1.3 2012/04/10 18:52:29 ohwada Exp $

// 2008-02-17 K.OHWADA
// htmlout

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

// 2006-10-25 K.OHWADA
// �������

// 2006-10-05 K.OHWADA
// _AM_WEBLINKS_MODULE_CONFIG_3
// google map

// weblinks ver 1.1
// _AM_WEBLINKS_INDEX_DESC, etc

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//=========================================================
// WebLinks Module
// language for admin
// 2004-10-24 K.OHWADA
// EUC-JP ͭ����������
//=========================================================

// --- define language begin ---
if (!defined('WEBLINKS_LANG_AM_LOADED')) {
    define('WEBLINKS_LANG_AM_LOADED', 1);

    define('_WEBLINKS_ADMIN_INDEX', '�������ܼ�');

    // BUG 2931: unmatch popup menu 'prefrence' and index menu 'module setting'
    define('_WEBLINKS_ADMIN_MODULE_CONFIG_1', '�⥸�塼������꣱<br>(��������) ');

    define('_WEBLINKS_ADMIN_MODULE_CONFIG_2', '�⥸�塼������ꣲ');
    //define("_WEBLINKS_ADMIN_ADDMODDEL_CATEGORY","���ƥ�����ɲá����������");
    define('_WEBLINKS_ADMIN_ADD_LINK', '������󥯤��ɲ�');
    define('_WEBLINKS_ADMIN_OTHERFUNC', '����¾�ε�ǽ');
    define('_WEBLINKS_ADMIN_GOTO_ADMIN_INDEX', '�������ܼ���');

    //======	config.php 	======
    // ������������
    define('_WEBLINKS_ADMIN_AUTH', '�����������¤�����');
    define('_WEBLINKS_ADMIN_AUTH_TEXT', '�����ȴ����Ԥ����Ƥδ������¤���äƤ���');
    define('_WEBLINKS_AUTH_SUBMIT', '���������Ͽ�θ���');
    define('_WEBLINKS_AUTH_SUBMIT_DSC', '������󥯤���Ͽ���븢�¤�Ϳ�����륰�롼�פ���ꤹ��');
    define('_WEBLINKS_AUTH_SUBMIT_AUTO', '���������Ͽ�μ�ư��ǧ�θ���');
    define('_WEBLINKS_AUTH_SUBMIT_AUTO_DSC', '������󥯤���Ͽ�����Ȥ��˼�ư��ǧ����븢�¤�Ϳ�����륰�롼�פ���ꤹ��');
    define('_WEBLINKS_AUTH_MODIFY', '����Խ��θ���');
    define('_WEBLINKS_AUTH_MODIFY_DSC', '��󥯤��Խ����븢�¤�Ϳ�����륰�롼�פ���ꤹ��');
    define('_WEBLINKS_AUTH_MODIFY_AUTO', '����Խ��μ�ư��ǧ�θ���');
    define('_WEBLINKS_AUTH_MODIFY_AUTO_DSC', '��󥯤��Խ������Ȥ��˼�ư��ǧ����븢�¤�Ϳ�����륰�롼�פ���ꤹ��');
    define('_WEBLINKS_AUTH_RATELINK', '������ɾ���θ���');
    define('_WEBLINKS_AUTH_RATELINK_DSC', '�����Ȥ�ɾ�����븢�¤�Ϳ�����륰�롼�פ���ꤹ��<br>�֥�����ɾ������Ѥ���פ��֤Ϥ��פξ���ͭ���Ǥ���');
    define('_WEBLINKS_USE_PASSWD', '����Խ����Υѥ����ǧ��');
    define('_WEBLINKS_USE_PASSWD_DSC', '�֤Ϥ��פ����򤹤�ȡ�<br>����Խ����˼�ư��ǧ�θ��¤�Ϳ�����Ƥ��ʤ����ϡ�<br>�ѥ����ǧ�ڲ��̤�ɽ������ޤ���');
    define('_WEBLINKS_USE_RATELINK', '������ɾ������Ѥ���');
    define('_WEBLINKS_USE_RATELINK_DSC', '�֤Ϥ��פ����򤹤�ȡ�<br>�֤��Υ����Ȥ�ɾ������פȡ�ɾ���׷�̤�ɽ�����ޤ���');
    define('_WEBLINKS_AUTH_UPDATED', '�����������¤򹹿�����');

    // RSS/ATOM
    define('_WEBLINKS_ADMIN_RSS', 'RSS/ATOM������');
    //define('_WEBLINKS_RSS_POST','RSS/ATOM��URL����Ƥ���Ĥ���');
    //define('_WEBLINKS_RSS_POST_DSC','�֤Ϥ��פ����򤹤�ȡ�RSS/ATOM��URL��������ɽ�����ޤ���');
    define('_WEBLINKS_RSS_MODE_AUTO', 'RSS/ATOM�����μ�ư����');
    define('_WEBLINKS_RSS_MODE_AUTO_DSC', '�֤Ϥ��פ����򤹤�ȡ��ܺ�ɽ���ΤȤ���RSS/ATOM��URL�μ�ư���Фȵ����μ�ư������¹Ԥ��ޤ���');
    define('_WEBLINKS_RSS_MODE_DATA', 'ɽ������RSS/ATOM�Υǡ���');
    define('_WEBLINKS_RSS_MODE_DATA_DSC', '��ATOM FEED�פ����򤹤�ȡ�atomfeed�ơ��֥�ˤ��빽ʸ���ϸ�Υǡ�������Ѥ��ޤ���<br>��XML�פ����򤹤�ȡ�link�ơ��֥�ˤ��빽ʸ��������XML�ǡ�������Ѥ��ޤ���<br>atomfeed�ơ��֥�ϡ��ե��륿���������äƤ���Τǡ����ƤΥǡ�������¸����Ƥ��ʤ����Ȥ�����ޤ���');
    define('_WEBLINKS_RSS_CACHE', 'RSS/ATOM�Υ���å������');
    define('_WEBLINKS_RSS_CACHE_DSC', '�����ͤϣ�����ñ�̤Ǥ���');
    define('_WEBLINKS_RSS_LIMIT', 'RSS/ATOM�����κ���η��');
    define('_WEBLINKS_RSS_LIMIT_DSC', 'atomfeed �ơ��֥�˳�Ǽ����RSS/ATOM�����κ���η������ꤹ��<br>�����ͤ�Ķ��������դθŤ������饯�ꥢ����롣<br>0 �����¤ʤ���');
    define('_WEBLINKS_RSS_SITE', 'RSS����������');
    define('_WEBLINKS_RSS_SITE_DSC', 'RSS���������Ȥ�RSS��URL�ΰ�������ꤹ�롣<br>ʣ�����ꤹ��Ȥ��ϲ��ԤǶ��ڤ롣<br>ATOM��URL�ϻ���Ǥ��ʤ���');
    define('_WEBLINKS_RSS_BLACK', 'RSS/ATOM�Υ֥�å��ꥹ��');
    define('_WEBLINKS_RSS_BLACK_DSC', 'RSS/ATOM���鵭�����������Ȥ��˵��ݤ���URL�ΰ�������ꤹ�롣<br>ʣ�����ꤹ��Ȥ��ϲ��ԤǶ��ڤ롣<br>perl����������ɽ�������ѤǤ���');
    define('_WEBLINKS_RSS_WHITE', 'RSS/ATOM�Υۥ磻�ȥꥹ��');
    define('_WEBLINKS_RSS_WHITE_DSC', '�֥�å��ꥹ�Ȥ˰��פ������Ǥ���Ͽ����URL�ΰ�������ꤹ�롣<br>ʣ�����ꤹ��Ȥ��ϲ��ԤǶ��ڤ롣<br>perl����������ɽ�������ѤǤ���');
    define('_WEBLINKS_RSS_URL_CHECK', '��󥯾����URL�ˡ��֥�å��ꥹ�ȤȰ��פ����Τ�����ޤ���');
    define('_WEBLINKS_RSS_URL_CHECK_DSC', 'ɬ�פǤ���С����ʤΥۥ磻�ȥꥹ�Ȥ����Ƥ���Ͽ�ե�����˥��ԡ����ڡ����Ȥ��Ƥ���������');
    define('_WEBLINKS_RSS_UPDATED', 'RSS/ATOM������򹹿�����');

    // RSS/ATOM view
    define('_WEBLINKS_ADMIN_RSS_VIEW', 'RSS/ATOM��ɽ��������');
    define('_WEBLINKS_RSS_MODE_TITLE', '�����ȥ��HTML������ɽ��');
    define('_WEBLINKS_RSS_MODE_TITLE_DSC', '�֤Ϥ��פ����򤹤�ȡ�HTML����������Ȥ��ϡ����Τޤ�ɽ�����롣<br>�֤������פ����򤹤�ȡ�HTML������������ɽ�����롣');
    define('_WEBLINKS_RSS_MODE_CONTENT', '��ʸ��HTML������ɽ��');
    define('_WEBLINKS_RSS_MODE_CONTENT_DSC', '�֤Ϥ��פ����򤹤�ȡ�HTML����������Ȥ��ϡ����Τޤ�ɽ�����롣<br>�֤������פ����򤹤�ȡ�HTML������������ɽ�����롣');
    define(
        '_WEBLINKS_RSS_NEW',
        '�ֿ���RSS/ATOM�����פ�ɽ��������
'
    );
    define('_WEBLINKS_RSS_NEW_DSC', '�ȥåץڡ����ˡֿ���RSS/ATOM�����פ�ɽ���������������ꤷ�Ƥ�����������');
    define(
        '_WEBLINKS_RSS_PERPAGE',
        'RSS/ATOM�����򣱥ڡ������ɽ��������
'
    );
    define('_WEBLINKS_RSS_PERPAGE_DSC', '��󥯾ܺ٥ڡ�����RSS/ATOM�����ڡ����ǣ��ڡ����������ɽ���������������ꤷ�Ƥ���������');
    define('_WEBLINKS_RSS_NUM_CONTENT', 'RSS/ATOM��������ʸ��ɽ��������');
    define('_WEBLINKS_RSS_NUM_CONTENT_DSC', '��󥯾ܺ٥ڡ�����RSS/ATOM��������ʸ��ɽ�����뵭��������ꤷ�Ƥ���������<br>���η���ʾ�ε����ˤ������ɽ�����롣');
    define('_WEBLINKS_RSS_MAX_CONTENT', 'RSS/ATOM�����κ���ʸ����');
    define('_WEBLINKS_RSS_MAX_CONTENT_DSC', 'RSS/ATOM�����Υڡ�����RSS/ATOM������ɽ���������ʸ��������ꤷ�Ƥ���������<br>����ʸ��HTML������ɽ���פ��֤������פΤȤ���ͭ���Ǥ���');
    define('_WEBLINKS_RSS_MAX_SUMMARY', 'RSS/ATOM����������κ���ʸ����');
    define('_WEBLINKS_RSS_MAX_SUMMARY_DSC', '�ȥåץڡ�����RSS/ATOM�����������ɽ���������ʸ��������ꤷ�Ƥ���������');

    // use link field
    define('_WEBLINKS_ADMIN_POST', '�����Ͽ���ܤ�����');
    define('_WEBLINKS_ADMIN_POST_TEXT_1', '��̤���ѡפ����򤹤�ȡ��桼����������ɽ�����ޤ���');
    define('_WEBLINKS_ADMIN_POST_TEXT_2', '�ֻ��ѡפ����򤹤�ȡ��桼����������ɽ�����ޤ���');
    define('_WEBLINKS_ADMIN_POST_TEXT_3', '��ɬ�ܡפ����򤹤�ȡ��桼����������ɽ������ɬ�ܹ��ܤȤʤ�ޤ���');
    define('_WEBLINKS_NO_USE', '̤����');
    define('_WEBLINKS_USE', '����');
    define('_WEBLINKS_INDISPENSABLE', 'ɬ��');
    define('_WEBLINKS_TYPE_DESC', '��Ͽ�ե������������η���');
    define('_WEBLINKS_TYPE_DESC_DSC', '�֤������פ����򤹤�ȡ��̾�Υƥ����ȥܥå��������Ѥ��ޤ���<br>�֤Ϥ��פ����򤹤�ȡ�XOOPS��DHTML��������Ѥ��ޤ���');
    define('_WEBLINKS_CHECK_DOUBLE', 'Ʊ����������Ͽ������å�����');
    define('_WEBLINKS_CHECK_DOUBLE_DSC', '�֤������פ����򤹤�ȡ�Ʊ������褬��Ͽ�Ǥ��ޤ���<br>�֤Ϥ��פ����򤹤�ȡ�Ʊ������褬��Ͽ����Ƥ��ʤ��������å����ޤ���');
    define('_WEBLINKS_POST_UPDATED', '�����Ͽ���ܤ�����򹹿�����');

    // cateogry
    define('_WEBLINKS_ADMIN_CAT_SET', '���ƥ��������');
    define('_WEBLINKS_CAT_SEL', '����Ǥ��륫�ƥ���κ����');
    define('_WEBLINKS_CAT_SEL_DSC', '���ĤΥ�󥯤�����Ǥ��륫�ƥ���κ��������ꤷ�Ƥ���������');
    define('_WEBLINKS_CAT_SUB', '���֥��ƥ���κ���ɽ����');

    //define('_WEBLINKS_CAT_SUB_DSC','�ȥåץڡ����Υ��ƥ������ɽ���ˤ����ơ����֥��ƥ���κ���ɽ��������ꤷ�Ƥ���������');
    define('_WEBLINKS_CAT_SUB_DSC', '���ƥ���ڡ����ˤ����ơ����Ĳ��Υ��ƥ��� (���֥��ƥ���) ��ɽ������Ȥ��Ρ�����ɽ��������ꤹ��<br><b>0</b> ��ɽ�����ʤ�<br><b>-1</b> �����¤ʤ�');

    define('_WEBLINKS_CAT_IMG_MODE', '���ƥ���ɽ���Υ��ƥ�������λ���');
    define('_WEBLINKS_CAT_IMG_MODE_DSC', '�֤ʤ��פΤȤ��ϡ�������ɽ�����ʤ���<br>��folder.gif�פΤȤ��ϡ�folder.gif ��ɽ�����롣<br>�����ꤷ�������פΤȤ��ϡ����ƥ���������ꤵ�줿������ɽ�����롣');
    //define("_WEBLINKS_CAT_IMG_MODE_0","�ʤ�");
    define('_WEBLINKS_CAT_IMG_MODE_1', 'folder.gif');
    define('_WEBLINKS_CAT_IMG_MODE_2', '���ꤷ������');
    define('_WEBLINKS_CAT_IMG_WIDTH', '���ƥ���ɽ���β������κ�����');
    define('_WEBLINKS_CAT_IMG_HEIGHT', '���ƥ���ɽ���β�����κ�����');
    define('_WEBLINKS_CAT_IMG_SIZE_DSC', '�����ꤷ�������פΤȤ���ͭ����');
    define('_WEBLINKS_CAT_UPDATED', '���ƥ��������򹹿�����');

    //======	cateogry_list.php 	======
    define('_WEBLINKS_ADMIN_CATEGORY_MANAGE', '���ƥ������');
    define('_WEBLINKS_ADMIN_CATEGORY_LIST', '���ƥ������');
    //define("_WEBLINKS_ORDER_ID","ID ��");
    define('_WEBLINKS_ORDER_TREE', '�ĥ꡼��');
    define('_WEBLINKS_CAT_ORDER', '���ƥ�����¤ӽ�');
    define('_WEBLINKS_THERE_ARE_CATEGORY', '���ߥǡ����١����ˤ� <b>%s</b> ��Υ��ƥ��꤬��Ͽ����Ƥ��ޤ���');
    define('_WEBLINKS_ADMIN_CATEGORY_NOTICE_1', '<b>���ƥ���ID</b> �򥯥�å�����ȡ����ƥ��꽤���Υڡ����������ޤ���');
    define('_WEBLINKS_ADMIN_CATEGORY_NOTICE_2', '<b>�ƥ��ƥ���</b> ���뤤�� <b>�����ȥ�</b> �򥯥�å�����ȡ����Υ��ƥ�����¤ӽ礬�����ޤ���');
    define('_WEBLINKS_NO_CATEGORY', '�������륫�ƥ���Ϥ���ޤ���');
    define('_WEBLINKS_NUM_SUBCAT', '���֥��ƥ����');
    define('_WEBLINKS_ORDERS_UPDATED', '���ƥ�����¤ӽ�򹹿�����');

    //======	cateogry_manage.php 	======
    define('_WEBLINKS_IMGURL_MAIN', '���ƥ������URL');
    define('_WEBLINKS_IMGURL_MAIN_DSC1', '���ץ����Ǥ���<br>�����ե�������礭���ϼ�ưŪ��Ĵ������ޤ���');
    //define("_WEBLINKS_IMGURL_MAIN_DSC2","�ᥤ�󡦥��ƥ����ͭ���Ǥ���");

    //======	link_list.php 	======
    define('_WEBLINKS_ADMIN_LINK_MANAGE', '��󥯴���');
    define('_WEBLINKS_ADMIN_LINK_LIST', '��󥯰���');
    define('_WEBLINKS_ADMIN_LINK_BROKEN', '����ڤ�ΰ���ɽ��');
    define('_WEBLINKS_ADMIN_LINK_ALL_ASC', '���ƤΥ�󥯤ΰ���ɽ����ID ���');
    define('_WEBLINKS_ADMIN_LINK_ALL_DESC', '���ƤΥ�󥯤ΰ���ɽ����ID �ս��');
    define('_WEBLINKS_ADMIN_LINK_NOURL', 'URL�����ꤵ��Ƥ��ʤ���󥯤ΰ���ɽ��');
    define('_WEBLINKS_COUNT_BROKEN', '����ڤ���');
    define('_WEBLINKS_NO_LINK', '���������󥯾���Ϥ���ޤ���');
    define('_WEBLINKS_ADMIN_PRESENT_SAVE', '������ɽ������Ƥ���Τϡ�������¸����Ƥ���ǡ����Ǥ���');

    //======	link_manage.php 	======
    //define("_WEBLINKS_USERID","�桼�� ID");
    //define("_WEBLINKS_CREATE","��Ͽ��");

    //======	link_broken_check.php 	======
    define('_WEBLINKS_ADMIN_LINK_CHECK_UPDATE', '��󥯤θ����ȹ���');
    define('_WEBLINKS_ADMIN_LINK_BROKEN_CHECK', '����ڤ�θ���');
    define('_WEBLINKS_ADMIN_BROKEN_CHECK', '����');
    define('_WEBLINKS_ADMIN_BROKEN_RESULT', '�������');
    define('_WEBLINKS_ADMIN_LINK_BROKEN_CHECK_CAUTION', '��󥯿���¿���ȡ������ॢ���Ȥ��뤳�Ȥ�����ޤ���<br>���ΤȤ��ϡ�limit �� offset �ο��ͤ��ѹ����Ƥ���������<br>limit=0 �����¤ʤ��Ǥ���<br>');
    define('_WEBLINKS_ADMIN_LINK_BROKEN_CHECK_NOTICE', '<b>���ID</b> �򥯥�å�����ȡ���󥯽����Υڡ����������ޤ���<br><b>�����֥�����URL</b> �򥯥�å�����ȡ���������URL�������ޤ���<br>');
    define('_WEBLINKS_ADMIN_LINK_BROKEN_CHECK_GOOGLE', '<b>�����֥�����̾</b> �򥯥�å�����ȡ�google�����������ޤ���<br>');
    define('_WEBLINKS_ADMIN_LIMIT', '��󥯿��ξ��(limit)');
    define('_WEBLINKS_ADMIN_OFFSET', '���ե��å�(offset)');
    define('_WEBLINKS_ADMIN_TIME_START', '���ϻ���');
    define('_WEBLINKS_ADMIN_TIME_END', '��λ����');
    define('_WEBLINKS_ADMIN_TIME_ELAPSE', '�в����');
    define('_WEBLINKS_ADMIN_LINK_NUM_ALL', '����󥯿�');
    define('_WEBLINKS_ADMIN_LINK_NUM_CHECK', '����������󥯿�');
    define('_WEBLINKS_ADMIN_LINK_NUM_BROKEN', '����ڤ�Υ�󥯿�');
    define('_WEBLINKS_ADMIN_NUM', '��');
    define('_WEBLINKS_ADMIN_MIN_SEC', '%s ʬ %s ��');
    define('_WEBLINKS_ADMIN_CHECK_NEXT', '���� %s ��򸡺�����');
    //define("_WEBLINKS_ADMIN_RSS_REFRESH_NOTE","Ʊ����RSS/ATOM�μ�ư���Ф�Ԥ��ޤ�");

    //======	rss_manage.php 	======
    define('_WEBLINKS_ADMIN_RSS_MANAGE', 'RSS/ATOM����');
    define('_WEBLINKS_ADMIN_RSS_REFRESH', 'RSS/ATOM�Υ���å��幹��');
    define('_WEBLINKS_ADMIN_RSS_REFRESH_LINK', '��󥯾���Υ���å��幹��');
    define('_WEBLINKS_ADMIN_RSS_REFRESH_SITE', 'RSS���������ȤΥ���å��幹��');
    define('_WEBLINKS_ADMIN_NUM_REFRESH_RSS_URL', '��������RSS/ATOM��URL��');
    define('_WEBLINKS_ADMIN_NUM_REFRESH_RSS_SITE', '��������RSS/ATOM�Υ����ȿ�');
    define('_WEBLINKS_ADMIN_NUM_REFRESH_ATOM_SITE', '��������ATOM FEED�Υ����ȿ�');
    define('_WEBLINKS_ADMIN_NUM_REFRESH_ATOMFEED', '��������ATOM FEED�ε�����');
    define('_WEBLINKS_ADMIN_RSS_CACHE_CLEAR', 'RSS/ATOM�Υ���å��塦���ꥢ');
    define('_WEBLINKS_RSS_CLEAR_NUM', '���ꤷ������ʾ�ʤ�С����դθŤ���˥��ꥢ����');
    define('_WEBLINKS_RSS_NUMBER', '���');
    define('_WEBLINKS_RSS_CLEAR_LID', '���ID����ꤷ�ƥ��ꥢ����');
    define('_WEBLINKS_RSS_CLEAR_ALL', '���ƥ��ꥢ����');
    define('_WEBLINKS_NUM_RSS_CLEAR_LINK', '���ꥢ����RSS/ATOM�Υ���å���');
    define('_WEBLINKS_NUM_RSS_CLEAR_ATOMFEED', '���ꥢ����RSS/ATOM�����ο�');

    //======	user_list.php 	======
    define('_WEBLINKS_ADMIN_USER_MANAGE', '�桼������');
    define('_WEBLINKS_ADMIN_USER_EMAIL', '�ť᡼�륢�ɥ쥹����ĥ桼���ΰ���');
    define('_WEBLINKS_ADMIN_USER_LINK', '��󥯾������Ͽ���Ƥ�����Ͽ�桼���ΰ���');
    define('_WEBLINKS_ADMIN_USER_NOLINK', '��󥯾������Ͽ���Ƥ��ʤ���Ͽ�桼���ΰ���');
    define('_WEBLINKS_ADMIN_USER_EMAIL_DSC', '��ʣ���Ƥ���ť᡼�륢�ɥ쥹�ϣ��Ĥ���ɽ������ޤ�');
    //define("_WEBLINKS_ADMIN_USER_LINK_DSC", "XOOPS�����Ρ֥�å������������פ���Ѥ��ޤ�");
    //define("_WEBLINKS_USER_ALL", "�����ơ�");
    //define("_WEBLINKS_USER_MAX", "�� %s �����");
    define('_WEBLINKS_THERE_ARE_USER', '<b>%s</b> �ͤΥ桼�������Ĥ���ޤ���');
    define('_WEBLINKS_USER_NUM', '%s ���ܤ��� %s ���ܤޤǤ�ɽ�����ޤ�');
    define('_WEBLINKS_USER_NOFOUND', '���˹礦�桼�������Ĥ���ޤ���Ǥ���');
    define('_WEBLINKS_UID_EMAIL', '��ƼԤΣť᡼�륢�ɥ쥹');

    //======	mail_users.php 	======
    define('_WEBLINKS_ADMIN_SENDMAIL', '�ť᡼�������');
    define('_WEBLINKS_THERE_ARE_EMAIL', '<b>%s</b> �Ͱ��Σť᡼�뤬����ޤ�');
    define('_WEBLINKS_SEND_NUM', '%s ���ܤ��� %s ���ܤޤǤ��������ޤ�');
    //define("_WEBLINKS_SEND_NEXT","���� %s �����������");
    //define("_WEBLINKS_SUBJECT_FROM", "%s ����Τ��Τ餻");
    //define("_WEBLINKS_HELLO", "%s ���� ����ˤ���");
    define('_WEBLINKS_MAIL_TAGS1', '{W_NAME} �ϥ桼��̾��ɽ�����ޤ�');
    define('_WEBLINKS_MAIL_TAGS2', '{W_EMAIL} �ϥ桼���Υ᡼�륢�ɥ쥹��ɽ�����ޤ�');
    define('_WEBLINKS_MAIL_TAGS3', '{W_LID} �ϥ��ID��ɽ�����ޤ�');

    // general
    //define('_WEBLINKS_WEBMASTER', 'WEB������');
    define('_WEBLINKS_SUBMITTER', '��Ƽ�');
    //define("_WEBLINKS_MID","���� ID");
    define('_WEBLINKS_UPDATE', '����');
    define('_WEBLINKS_SET_DEFAULT', '�ǥե�����ͤ����ꤹ��');
    define('_WEBLINKS_CLEAR', '���ꥢ');
    define('_WEBLINKS_CHECK', '����');
    define('_WEBLINKS_NON', '���⤷�ʤ�');
    //define("_WEBLINKS_SENDMAIL", "�ť᡼�����������");

    // 2005-08-09
    // BUG 2827: RSS refresh: Invalid argument supplied for foreach()
    define('_WEBLINKS_ADMIN_NO_LINK_BROKEN_CHECK', '���������󥯤��ʤ�');
    define('_WEBLINKS_ADMIN_NO_RSS_REFRESH', '���������󥯤��ʤ�');

    // 2005-10-20
    define('_WEBLINKS_LINK_APPROVED', '[{X_SITENAME}] {X_MODULE}: �����Ͽ���꤬��ǧ����ޤ���');
    define('_WEBLINKS_LINK_REFUSED', '[{X_SITENAME}] {X_MODULE}: �����Ͽ���꤬���ݤ���ޤ���');

    // 2006-05-15
    define('_AM_WEBLINKS_INDEX_DESC', '�ᥤ��ڡ���������');
    define('_AM_WEBLINKS_INDEX_DESC_DSC', '�ᥤ��ڡ�����ɽ������Ȥ��ϡ�����ʸ����ꤷ�Ƥ���������');
    define('_AM_WEBLINKS_INDEX_DESC_DEFAULT', '<div align="center" style="color: #0000ff">�����ˤ�����ʸ��ɽ�����ޤ���<br>����ʸ�ϡ֥⥸�塼������ꣲ�פˤ��Խ��Ǥ��ޤ���<br></div>');

    // category
    define('_AM_WEBLINKS_ADD_CATEGORY', '�������ƥ�����ɲ�');
    define('_AM_WEBLINKS_ERROR_SOME', '�����Ĥ����顼����å�����������ޤ�');
    define('_AM_WEBLINKS_LIST_ID_ASC', 'ID ����');
    define('_AM_WEBLINKS_LIST_ID_DESC', 'ID �ս�');

    // config
    //define('_AM_WEBLINKS_WARNING_NOT_WRITABLE','�ǥ��쥯�ȥ�ν���ߵ��Ĥ��ʤ�');

    define('_AM_WEBLINKS_CONF_LINK', '��󥯾��������');
    define('_AM_WEBLINKS_CONF_LINK_IMAGE', '��󥯲���������');
    define('_AM_WEBLINKS_CONF_VIEW', 'ɽ��������');
    define('_AM_WEBLINKS_CONF_TOPTEN', '�ȥå�10������');
    define('_AM_WEBLINKS_CONF_SEARCH', '����������');
    define('_AM_WEBLINKS_USE_BROKENLINK', '�֥���ڤ����פλ���');
    define('_AM_WEBLINKS_USE_BROKENLINK_DSC', '�֤Ϥ��פ����򤹤�ȡ�<br>�֥���ڤ����פ����ѤǤ��ޤ�');
    define('_AM_WEBLINKS_USE_HITS', '�����פ� "�ҥåȿ�" �λ���');
    define('_AM_WEBLINKS_USE_HITS_DSC', '�֤Ϥ��פ����򤹤�ȡ�<br>��Ͽ���줿�����Ȥ˥����פ���Ȥ��ˡ�"�ҥåȿ�" ��������ȥ��åפ���ޤ�');
    define('_AM_WEBLINKS_USE_PASSWD', '�ѥ���ɤθ���');
    define('_AM_WEBLINKS_USE_PASSWD_DSC', '�֤Ϥ��פ����򤹤�ȡ�<br><b>������</b> �ϥѥ����ǧ�ڤˤ���󥯤��ѹ����Ǥ��ޤ���<br>�֤������פ����򤹤�ȡ�<br>�ѥ�������ɽ������ʤ���');
    define('_AM_WEBLINKS_PASSWD_MIN', '�ѥ���ɤκǾ���ʸ����');
    define('_AM_WEBLINKS_POST_TEXT', '�����ȴ����Ԥ����Ƥδ������¤���äƤ���');
    define('_AM_WEBLINKS_AUTH_DOHTML', 'HTML�����θ���');
    define('_AM_WEBLINKS_AUTH_DOHTML_DSC', 'HTML��������Ѥ��븢�¤�Ϳ�����륰�롼�פ���ꤹ��');
    define('_AM_WEBLINKS_AUTH_DOSMILEY', '���ޥ��꡼��������θ���');
    define('_AM_WEBLINKS_AUTH_DOSMILEY_DSC', '���ޥ��꡼�����������Ѥ��븢�¤�Ϳ�����륰�롼�פ���ꤹ��');
    define('_AM_WEBLINKS_AUTH_DOXCODE', 'XOOPS�����ɤθ���');
    define('_AM_WEBLINKS_AUTH_DOXCODE_DSC', 'XOOPS�����ɤ���Ѥ��븢�¤�Ϳ�����륰�롼�פ���ꤹ��');
    define('_AM_WEBLINKS_AUTH_DOIMAGE', '�����θ���');
    define('_AM_WEBLINKS_AUTH_DOIMAGE_DSC', '��������Ѥ��븢�¤�Ϳ�����륰�롼�פ���ꤹ��');
    define('_AM_WEBLINKS_AUTH_DOBR', '���Ԥθ���');
    define('_AM_WEBLINKS_AUTH_DOBR_DSC', '���Ԥ���Ѥ��븢�¤�Ϳ�����륰�롼�פ���ꤹ��');
    define('_AM_WEBLINKS_SHOW_CATLIST', '���֥�˥塼�ؤΥ��ƥ��������ɽ��');
    define('_AM_WEBLINKS_SHOW_CATLIST_DSC', '�֤Ϥ��פ����򤹤�ȡ�<br>���֥�˥塼�˥��ƥ��������ɽ������');
    define('_AM_WEBLINKS_VIEW_URL', 'URL��ɽ������');
    define(
        '_AM_WEBLINKS_VIEW_URL_DSC',
        '����ɽ���פ����򤹤�ȡ�<br>URL �� &lt;a&gt; ������ɽ������ʤ���<br>�ִ���ɽ���פ����򤹤�ȡ�<br>href °���� URL�ǤϤʤ���visit.php ��ɽ�����롣<br>��ľ��ɽ���פ����򤹤�ȡ�<br>href °���� URL ��ɽ������onmousedown °���� JavaScript ��ɽ������JavaScript ���ͳ���ƥҥåȿ��򥫥���Ȥ��롣<br>'
    );
    define('_AM_WEBLINKS_VIEW_URL_0', '��ɽ��');
    define('_AM_WEBLINKS_VIEW_URL_1', '����ɽ��');
    define('_AM_WEBLINKS_VIEW_URL_2', 'ľ��ɽ��');
    define('_AM_WEBLINKS_RECOMMEND_PRI', '�֤������᥵���ȡפ�ͥ����');
    define('_AM_WEBLINKS_RECOMMEND_PRI_DSC', '����ɽ���פ����򤹤�ȡ�ɽ������ʤ���<br>���̾�פ����򤹤�ȡ���˥塼���С���ɽ�����롣<br>��ͥ��פ����򤹤�ȡ����ƥ�����˾�̤�ɽ������롣');
    define('_AM_WEBLINKS_MUTUAL_PRI', '����ߥ�󥯡פ�ͥ����');
    define('_AM_WEBLINKS_MUTUAL_PRI_DSC', '����ɽ���פ����򤹤�ȡ�ɽ������ʤ���<br>���̾�פ����򤹤�ȡ���˥塼���С���ɽ�����롣<br>��ͥ��פ����򤹤�ȡ����ƥ�����˾�̤�ɽ������롣');
    define('_AM_WEBLINKS_PRI_0', '̤����');
    define('_AM_WEBLINKS_PRI_1', '�̾�');
    define('_AM_WEBLINKS_PRI_2', 'ͥ��');
    define('_AM_WEBLINKS_LINK_IMAGE_AUTO', '�Хʡ����������μ�ư����');
    define('_AM_WEBLINKS_LINK_IMAGE_AUTO_DSC', '�֤Ϥ��פ����򤹤�ȡ�<br>�Хʡ�������������Ͽ���ѹ����˼����Ǥ��ʤ��ä����ˡ���󥯰������󥯾ܺ٤�ɽ������Ȥ��ˡ����� ��ưŪ�˼������롣<br>');
    define('_AM_WEBLINKS_RSS_USE', 'RSS �����λ���');
    define('_AM_WEBLINKS_RSS_USE_DSC', '�֤Ϥ��פ����򤹤�ȡ�<br>RSS/ATOM �����������ɽ������');

    // bulk import
    define('_AM_WEBLINKS_BULK_IMPORT', '�����Ͽ');
    define('_AM_WEBLINKS_BULK_IMPORT_FILE', '�ե����뤫��ΰ����Ͽ�Υǥ�');
    define('_AM_WEBLINKS_BULK_CAT', '���ƥ�������Ͽ');
    define('_AM_WEBLINKS_BULK_CAT_DSC1', '���ƥ��� �򵭽Ҥ���');
    define('_AM_WEBLINKS_BULK_CAT_DSC2', '�ҥ��ƥ���ϡ���Ƭ�˺�������(>)�򵭽Ҥ���');
    define('_AM_WEBLINKS_BULK_LINK', '��󥯰����Ͽ');
    define('_AM_WEBLINKS_BULK_LINK_DSC1', '�����ܤˡ����ƥ��� �򵭽Ҥ���');
    define('_AM_WEBLINKS_BULK_LINK_DSC2', '�����ܰʹߤˡ������ȥ�, URL, ���� �򥫥��(,)�Ƕ��ڤäƵ��Ҥ���');
    define('_AM_WEBLINKS_BULK_LINK_DSC3', '���� (---) �Ƕ��ڤ�ȡ����֤��ƻ���Ǥ���');
    define('_AM_WEBLINKS_BULK_ERROR_LAYER', '���ƥ���γ��ع�¤�ǣ��ʳ��ʾ� ������ꤷ�Ƥ��ޤ�');
    define('_AM_WEBLINKS_BULK_ERROR_CID', '���ƥ����ֹ椬�������ʤ�');
    define('_AM_WEBLINKS_BULK_ERROR_PID', '�ƤΥ��ƥ����ֹ椬�������ʤ�');
    define('_AM_WEBLINKS_BULK_ERROR_FINISH', '���顼�ˤ�꽪λ����');

    // command
    //define('_AM_WEBLINKS_CREATE_CONFIG', '����ե����������');
    //define('_AM_WEBLINKS_TEST_EXEC', '�ƥ��ȼ¹� %s');

    // === 2006-10-05 ===
    // menu
    define('_AM_WEBLINKS_MODULE_CONFIG_3', '�⥸�塼������ꣳ');
    define('_AM_WEBLINKS_MODULE_CONFIG_4', '�⥸�塼������ꣴ');
    define('_AM_WEBLINKS_VOTE_LIST', '��ɼ����');
    define('_AM_WEBLINKS_CATLINK_LIST', 'CatLink ����');
    //define('_AM_WEBLINKS_COMMAND_MANAGE', '���ޥ�ɴ���');
    define('_AM_WEBLINKS_TABLE_MANAGE', 'DB�ơ��֥����');
    define('_AM_WEBLINKS_IMPORT_MANAGE', '����ݡ��ȴ���');
    define('_AM_WEBLINKS_EXPORT_MANAGE', '�������ݡ��ȴ���');

    // config
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_2', '���¡����ƥ��ꡢ¾');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_3', '���');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_4', 'RSS���ե�����ࡤ�Ͽ�');
    define('_AM_WEBLINKS_LINK_REGISTER', '�����Ͽ: ���� (description) ������');

    // bin configuration
    //define('_AM_WEBLINKS_FORM_BIN', '���ޥ������');
    //define('_AM_WEBLINKS_FORM_BIN_DESC', 'bin ���ޥ�ɤ˻��Ѥ���');
    //define('_AM_WEBLINKS_CONF_BIN_PASS','�ѥ����');
    //define('_AM_WEBLINKS_CONF_BIN_PASS_DESC','');
    //define('_AM_WEBLINKS_CONF_BIN_SEND','�᡼�����������');
    //define('_AM_WEBLINKS_CONF_BIN_SEND_DESC','');
    //define('_AM_WEBLINKS_CONF_BIN_MAILTO','�᡼��������');
    //define('_AM_WEBLINKS_CONF_BIN_MAILTO_DESC','');

    // rssc
    //define('_AM_WEBLINKS_RSS_DIRNAME','RSSC�⥸�塼���Dirname');
    //define('_AM_WEBLINKS_RSS_DIRNAME_DESC','');

    // link manage
    define('_AM_WEBLINKS_DEL_LINK', '��󥯺��');
    define('_AM_WEBLINKS_ADD_RSSC', 'RSSC�⥸�塼��ؤΥ���ɲ�');
    define('_AM_WEBLINKS_MOD_RSSC', 'RSSC�⥸�塼��Υ���ѹ�');
    define('_AM_WEBLINKS_REFRESH_RSSC', 'RSSC�⥸�塼���RSS����');
    define('_AM_WEBLINKS_APPROVE', '����ɲäξ�ǧ');
    define('_AM_WEBLINKS_APPROVE_MOD', '����ѹ��ξ�ǧ');
    define('_AM_WEBLINKS_RSSC_LID_SAVED', 'RSSC lid ����¸����');
    define('_AM_WEBLINKS_GOTO_LINK_LIST', '��󥯰�����');
    define('_AM_WEBLINKS_GOTO_LINK_EDIT', '����ѹ���');
    define('_AM_WEBLINKS_ADD_BANNER', '�Хʡ��β������������ɲ�');
    define('_AM_WEBLINKS_MOD_BANNER', '�Хʡ��β������������ѹ�');

    // vote list
    define('_AM_WEBLINKS_VOTE_USER', '��Ͽ�桼������ɼ');
    define('_AM_WEBLINKS_VOTE_ANON', '�����Ȥ���ɼ');

    // locate
    define('_AM_WEBLINKS_CONF_LOCATE', '��������');
    define('_AM_WEBLINKS_CONF_COUNTRY_CODE', '�񥳡���');
    define('_AM_WEBLINKS_CONF_COUNTRY_CODE_DESC', 'ccTLDs �����Ϥ��� <br/> <a href="http://www.iana.org/cctld/cctld-whois.htm" target="_blank">IANA: Country-Code Top-Level Domains</a>');
    define('_AM_WEBLINKS_CONF_RENEW_COUNTRY_CODE_DESC', '�񥳡��ɤ˴�Ϣ������ܤ�����ꤹ��<br/> <span style="color:#0000ff;">#</span> �����Ĥ��Ƥ������');
    define('_AM_WEBLINKS_RENEW', '������');

    // map
    define('_AM_WEBLINKS_CONF_MAP', '�Ͽޥ����Ȥ�����');
    define('_AM_WEBLINKS_CONF_MAP_USE', '�Ͽޥ����Ȥ���Ѥ���');
    define('_AM_WEBLINKS_CONF_MAP_TEMPLATE', '�Ͽޥ����ȤΥƥ�ץ졼��');
    define('_AM_WEBLINKS_CONF_MAP_TEMPLATE_DESC', 'template/map/ �ǥ��쥯�ȥ�ˤ���ƥ�ץ졼�ȡ��ե��������ꤹ��');

    // google map: hacked by wye <http://never-ever.info/>
    define('_AM_WEBLINKS_CONF_GOOGLE_MAP', 'Google Maps ������');
    define('_AM_WEBLINKS_CONF_GM_USE', 'Google Maps ����Ѥ���');
    define('_AM_WEBLINKS_CONF_GM_APIKEY', 'Google Maps API key');
    define('_AM_WEBLINKS_CONF_GM_APIKEY_DESC', 'GoogleMaps�����Ѥ������ <br> <a href="http://www.google.com/apis/maps/signup.html" target="_blank">http://www.google.com/apis/maps/signup.html</a> �� <br> API key ��������Ƥ�������');
    define('_AM_WEBLINKS_CONF_GM_SERVER', '�����С�̾');
    define('_AM_WEBLINKS_CONF_GM_LANG', '���쥳����');
    define('_AM_WEBLINKS_CONF_GM_LOCATION', '��ά���ξ��̾');
    define('_AM_WEBLINKS_CONF_GM_LATITUDE', '��ά���ΰ���');
    define('_AM_WEBLINKS_CONF_GM_LONGITUDE', '��ά���η���');
    define('_AM_WEBLINKS_CONF_GM_ZOOM', '��ά���Υ������٥�');

    // google search
    define('_AM_WEBLINKS_CONF_GOOGLE_SEARCH', 'Google ����������');
    define('_AM_WEBLINKS_CONF_GOOGLE_SERVER', '�����С�̾');
    define('_AM_WEBLINKS_CONF_GOOGLE_LANG', '���쥳����');

    // template
    //define('_AM_WEBLINKS_CONF_TEMPLATE','�ƥ�ץ졼�ȤΥ���å��塦���ꥢ');
    define('_AM_WEBLINKS_CONF_TEMPLATE_DESC', 'template/parts/ template/xml/ template/map/ �ǥ��쥯�ȥ�ˤ���ƥ�ץ졼�Ȥ��ѹ������Ȥ��ˤϡ��¹Ԥ��뤳��');

    // === 2006-12-11 ===
    // link item
    //define('_AM_WEBLINKS_TIME_PUBLISH','ȯ���������ꤹ��');
    //define('_AM_WEBLINKS_TIME_PUBLISH_DESC','���ꤷ�ʤ��Ȥ��ϡ����ɽ�������');
    //define('_AM_WEBLINKS_TIME_EXPIRE','��λ�������ꤹ��');
    //define('_AM_WEBLINKS_TIME_EXPIRE_DESC','���ꤷ�ʤ��Ȥ��ϡ����ɽ�������');
    define('_AM_WEBLINKS_LINK_TIME_PUBLISH_BEFORE', 'ȯ���������Υ�󥯰���');
    define('_AM_WEBLINKS_LINK_TIME_EXPIRE_AFTER', '��λ���ʹߤΥ�󥯰���');

    define('_AM_WEBLINKS_SERVER_ENV', '�����С��Ķ��ѿ�');
    define('_AM_WEBLINKS_DEBUG_CONF', '�ǥХå��ѿ�');
    define('_AM_WEBLINKS_ALL_GREEN', '��������');

    // === 2007-02-20 ===
    // performance
    define('_AM_WEBLINKS_UPDATE_CAT_PATH', '�ѥ����ĥ꡼����ι���');
    define('_AM_WEBLINKS_UPDATE_CAT_COUNT', '���ƥ���Υ�󥯿��ι���');
    define('_AM_WEBLINKS_CAT_COUNT_UPDATED', '���ƥ���Υ�󥯿��򹹿�����');

    // config
    define('_AM_WEBLINKS_SYSTEM_POST_LINK', '�����Ͽ������ƿ�');
    define('_AM_WEBLINKS_SYSTEM_POST_LINK_DSC', '�֤Ϥ��פ����򤹤�ȡ�<br>��󥯤���Ͽ�����Ȥ��ˡ�XOOPS�桼������ƿ��򥫥���ȥ��åפ��ޤ���');
    define('_AM_WEBLINKS_SYSTEM_POST_RATE', 'ɾ��������ƿ�');
    define('_AM_WEBLINKS_SYSTEM_POST_RATE_DSC', '�֤Ϥ��פ����򤹤�ȡ�<br>ɾ���򤷤��Ȥ��ˡ�XOOPS�桼������ƿ��򥫥���ȥ��åפ��ޤ���');

    define('_AM_WEBLINKS_VIEW_STYLE_CAT', '���ƥ��ꡦ�ڡ�����ɽ������');
    define('_AM_WEBLINKS_VIEW_STYLE_MARK', '�������᥵���ȡ��ڡ�����ɽ������');
    define('_AM_WEBLINKS_VIEW_STYLE_MARK_DSC', '�������᥵���ȡ���ߥ�󥯥����ȡ�RSS/ATOM �б������� ��Ŭ�Ѥ����');
    define('_AM_WEBLINKS_VIEW_STYLE_0', '����');
    define('_AM_WEBLINKS_VIEW_STYLE_1', '�ܺ�');

    define('_AM_WEBLINKS_CONF_PERFORMANCE', '��ǽ����');
    define('_AM_WEBLINKS_CONF_PERFORMANCE_DSC', '��ǽ����Τ���ˡ�ɽ������Ȥ���ɬ�פʾ��������˷׻������ǡ����١����˳�Ǽ���ޤ�<br>���ƻ��Ѥ���Ȥ��ϡ��֥��ƥ��������->�֥ѥ����ĥ꡼����ι����פ�¹Ԥ��뤳��');
    define('_AM_WEBLINKS_CAT_PATH', '���ƥ���Υѥ����ĥ꡼����');
    define('_AM_WEBLINKS_CAT_PATH_DSC', '�֤Ϥ��פ����򤹤�ȡ�<br>���ƥ���Υѥ����ĥ꡼���������˷׻��������ƥ��ꡦ�ơ��֥�˳�Ǽ���ޤ���<br>�֤������פ����򤹤�ȡ�<br>ɽ������Ȥ��˷׻����ޤ���');
    define('_AM_WEBLINKS_CAT_COUNT', '���ƥ���Υ�󥯿�');
    define('_AM_WEBLINKS_CAT_COUNT_DSC', '�֤Ϥ��פ����򤹤�ȡ�<br>���ƥ�����Υ�󥯿�������˷׻��������ƥ��ꡦ�ơ��֥�˳�Ǽ���ޤ���<br>�֤������פ����򤹤�ȡ�<br>ɽ������Ȥ��˷׻����ޤ���');

    define('_AM_WEBLINKS_POST_TEXT_4', '�����Ԥ���Ʋ��̤ˤ����Ƥι��ܤ�ɽ�������');
    define('_AM_WEBLINKS_LINK_REGISTER_1', '�����Ͽ: textarea1 ������');

    define('_AM_WEBLINKS_CONF_LINK_GUEST', '�����ȤΥ����Ͽ���ܤ�����');
    define('_AM_WEBLINKS_USE_CAPTCHA', 'CAPTCHA (����ǧ��) ����Ѥ���');
    define('_AM_WEBLINKS_USE_CAPTCHA_DSC', 'CAPTCHA �ϲ���ǧ�ڤˤ�륹�ѥ��к��Ǥ���<br>���Ѥ���ˤϡ�Captcha �⥸�塼�뤬ɬ�פǤ���<br>�֤Ϥ��פ����򤹤�ȡ�<br><b>������</b> �ΤȤ��ϥ�󥯤���Ͽ���ѹ����� CAPTCHA ����Ѥ��ޤ���<br>�֤������פ����򤹤�ȡ�<br>CAPTCHA ���ɽ������ʤ���');
    define('_AM_WEBLINKS_CAPTCHA_FINDED', 'Captcha �⥸�塼�� ver %s �����Ĥ���ޤ���');
    define('_AM_WEBLINKS_CAPTCHA_NOT_FINDED', 'Captcha �⥸�塼��ϸ��Ĥ���ޤ���');

    define('_AM_WEBLINKS_CONF_SUBMIT', '��Ͽ�ե����������');
    define('_AM_WEBLINKS_SUBMIT_MAIN', '������Ͽ��������');
    define('_AM_WEBLINKS_SUBMIT_PENDING', '������Ͽ��������');
    define('_AM_WEBLINKS_SUBMIT_DOUBLE', '������Ͽ��������');
    define('_AM_WEBLINKS_SUBMIT_MAIN_DSC', '���ɽ�������');
    define('_AM_WEBLINKS_SUBMIT_PENDING_DSC', '�ִ����Ԥ���ǧ����ץ⡼�ɤΤȤ���ɽ�������');
    define('_AM_WEBLINKS_SUBMIT_DOUBLE_DSC', '��Ʊ����������Ͽ������å�����ץ⡼�ɤΤȤ���ɽ�������');

    define('_AM_WEBLINKS_MODLINK_MAIN', '����ѹ���������');
    define('_AM_WEBLINKS_MODLINK_PENDING', '����ѹ���������');
    define('_AM_WEBLINKS_MODLINK_NOT_OWNER', '����ѹ���������');
    define('_AM_WEBLINKS_MODLINK_NOT_OWNER_DSC', '�ִ����Ԥ���ǧ����ץ⡼�ɤǡ���ƼԤǤʤ��Ȥ��ˡ�ɽ�������');

    define('_AM_WEBLINKS_CONF_CAT_FORUM', '���ƥ���Υե������ɽ��');
    define('_AM_WEBLINKS_CONF_LINK_FORUM', '��󥯤Υե������ɽ��');
    //define('_AM_WEBLINKS_FORUM_SEL', '�ե�����ࡦ�⥸�塼�������');
    define('_AM_WEBLINKS_FORUM_THREAD_LIMIT', 'ɽ�����륹��åɿ�');
    define('_AM_WEBLINKS_FORUM_POST_LIMIT', 'ɽ�����륹��å������ƿ�');
    define('_AM_WEBLINKS_FORUM_POST_ORDER', '��Ƥ��¤ӽ�');
    define('_AM_WEBLINKS_FORUM_POST_ORDER_0', '������θŤ���');
    define('_AM_WEBLINKS_FORUM_POST_ORDER_1', '������ο�������');
    //define('_AM_WEBLINKS_FORUM_INSTALLED',     '�ե�����ࡦ�⥸�塼�� ( %s ) ver %s �ϥ��󥹥ȡ��뤵��Ƥ���');
    //define('_AM_WEBLINKS_FORUM_NOT_INSTALLED', '�ե�����ࡦ�⥸�塼�� ( %s ) �ϥ��󥹥ȡ��뤵��Ƥ��ʤ�');

    // === 2007-03-25 ===
    define('_AM_WEBLINKS_UPDATE_CAT_IMAGE_SIZE', '���ƥ���β����������ι���');

    define('_AM_WEBLINKS_CONF_INDEX', '�ȥåץڡ���������');
    define('_AM_WEBLINKS_CONF_INDEX_GM_MODE', 'Google Map �⡼��');

    define('_AM_WEBLINKS_CAT_SHOW_GM', 'Google Map ��ɽ��');
    define('_AM_WEBLINKS_MODE_NON', 'ɽ�����ʤ�');
    define('_AM_WEBLINKS_MODE_DEFAULT', '�ǥե���Ȥ�������');
    define('_AM_WEBLINKS_MODE_PARENT', '�ƥ��ƥ����Ʊ��');
    define('_AM_WEBLINKS_MODE_FOLLOWING', '������������');

    define('_AM_WEBLINKS_CONF_CAT_ALBUM', '���ƥ���Υ���Х�ɽ��');
    define('_AM_WEBLINKS_CONF_LINK_ALBUM', '��󥯤Υ���Х�ɽ��');
    //define('_AM_WEBLINKS_ALBUM_SEL', '����Хࡦ�⥸�塼�������');
    define('_AM_WEBLINKS_ALBUM_LIMIT', 'ɽ������̿��ο�');
    define('_AM_WEBLINKS_WHEN_OMIT', '��ά���ν���');
    define('_AM_WEBLINKS_MODULE_INSTALLED', '%s �⥸�塼�� ( %s ) ver %s �ϥ��󥹥ȡ��뤵��Ƥ���');
    define('_AM_WEBLINKS_MODULE_NOT_INSTALLED', '%s �⥸�塼�� ( %s ) �ϥ��󥹥ȡ��뤵��Ƥ��ʤ�');

    // === 2007-04-08 ===
    define('_AM_WEBLINKS_CAT_DESC_MODE', '������ɽ��');
    define('_AM_WEBLINKS_CAT_SHOW_FORUM', '�ե�������ɽ��');
    define('_AM_WEBLINKS_CAT_SHOW_ALBUM', '����Х��ɽ��');
    define('_AM_WEBLINKS_MODE_SETTING', '���ꤷ������');
    define('_AM_WEBLINKS_MODE_OMIT_PARENT', '��ά���Ͽƥ��ƥ����Ʊ��');

    // === 2007-06-10 ===
    // d3forum
    define('_AM_WEBLINKS_CONF_D3FORUM', 'd3forum �⥸�塼��Υ���������');
    define('_AM_WEBLINKS_PLUGIN_SEL', '�ץ饰���������');
    define('_AM_WEBLINKS_DIRNAME_SEL', '�⥸�塼�������');
    define('_AM_WEBLINKS_D3FORUM_VIEW', '�����Ȥ�ɽ����ˡ');

    // category
    define('_AM_WEBLINKS_CAT_PATH_STYLE', '���ƥ���ѥ���ɽ������');

    // category page
    define('_AM_WEBLINKS_CONF_CAT_PAGE', '���ƥ���ڡ���������');
    define('_AM_WEBLINKS_CAT_COLS', '���ƥ���ɽ���β������');
    define('_AM_WEBLINKS_CAT_COLS_DESC', '���ƥ���ڡ����ˤ����ơ����Ĳ��Υ��ƥ����ɽ������Ȥ��Ρ�������� (column) ����ꤹ��');
    define('_AM_WEBLINKS_CAT_SUB_MODE', '���֥��ƥ����ɽ���ϰ�');
    define('_AM_WEBLINKS_CAT_SUB_MODE_1', '���Ĳ��Υ��ƥ���Τ�');
    define('_AM_WEBLINKS_CAT_SUB_MODE_2', '���Ĳ��ʹߤΥ��ƥ����ޤ��');

    // === 2007-07-14 ===
    // highlight
    define('_AM_WEBLINKS_USE_HIGHLIGHT', '������ɡ��ϥ��饤�Ȥ���Ѥ���');
    define('_AM_WEBLINKS_CHECK_MAIL', '�᡼��η���������å�����');
    define('_AM_WEBLINKS_CHECK_MAIL_DSC', '�֤Ϥ��פ����򤹤�ȡ���Ͽ����᡼�륢�ɥ쥹�� abc@efg.com �Τ褦�ʷ����Ǥ��뤫�����å����ޤ���');
    //define('_AM_WEBLINKS_NO_EMAIL', '�᡼�륢�ɥ쥹�����ꤵ��Ƥ��ʤ�');

    // === 2007-08-01 ===
    // config
    define('_AM_WEBLINKS_MODULE_CONFIG_0', '�⥸�塼�������');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_0', '�ܼ�');
    define('_AM_WEBLINKS_MODULE_CONFIG_5', '�⥸�塼������ꣵ');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_5', '�����Ͽ����');
    define('_AM_WEBLINKS_MODULE_CONFIG_6', '�⥸�塼������ꣶ');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_6', 'Google Map');

    // google map
    define('_AM_WEBLINKS_GM_MAP_CONT', '�ޥåס�����ȥ���');
    define('_AM_WEBLINKS_GM_MAP_CONT_DESC', 'GLargeMapControl, GSmallMapControl, GSmallZoomControl');
    define('_AM_WEBLINKS_GM_MAP_CONT_NON', 'ɽ�����ʤ�');
    define('_AM_WEBLINKS_GM_MAP_CONT_LARGE', '�礭������ȥ���: Large');
    define('_AM_WEBLINKS_GM_MAP_CONT_SMALL', '����������ȥ���: Small');
    define('_AM_WEBLINKS_GM_MAP_CONT_ZOOM', '������: Zoom');
    define('_AM_WEBLINKS_GM_USE_TYPE_CONT', '�Ͽ޷����ܥ������Ѥ���');
    define('_AM_WEBLINKS_GM_USE_TYPE_CONT_DESC', 'GMapTypeControl');
    define('_AM_WEBLINKS_GM_USE_SCALE_CONT', '��Υɽ������Ѥ���');
    define('_AM_WEBLINKS_GM_USE_SCALE_CONT_DESC', 'GScaleControl');
    define('_AM_WEBLINKS_GM_USE_OVERVIEW_CONT', '�����ξ������Ͽޤ���Ѥ���');
    define('_AM_WEBLINKS_GM_USE_OVERVIEW_CONT_DESC', 'GOverviewMapControl');
    define('_AM_WEBLINKS_GM_MAP_TYPE', '[����] �Ͽޤη���');
    define('_AM_WEBLINKS_GM_MAP_TYPE_DESC', 'GMapType');
    define('_AM_WEBLINKS_GM_GEOCODE_KIND', '[����] ���������ɤμ���');
    define('_AM_WEBLINKS_GM_GEOCODE_KIND_DESC', '���꤫����١����٤򸡺�����<br><b>ñ��θ���</b><br>GClientGeocoder - getLatLng<br><b>ʣ���θ���</b><br>GClientGeocoder - getLocations');
    define('_AM_WEBLINKS_GM_GEOCODE_KIND_LATLNG', 'ñ��θ���: getLatLng');
    define('_AM_WEBLINKS_GM_GEOCODE_KIND_LOCATIONS', 'ʣ���θ���: getLocations');
    define('_AM_WEBLINKS_GM_USE_GEOCODE_TOKYO', '[����][����] ������ CSIS ����Ѥ���');
    define('_AM_WEBLINKS_GM_USE_GEOCODE_TOKYO_DESC', '���ܤǤΤ�ͭ��<br>���꤫����١����٤򸡺�����<br><a href="http://pc035.tkl.iis.u-tokyo.ac.jp/~sagara/geocode/" target="_blank">������ ����ץ른�������ǥ��󥰼¸�</a>');
    define('_AM_WEBLINKS_GM_USE_NISHIOKA', '[����][����] �ե��������ɤ���Ѥ���');
    define('_AM_WEBLINKS_GM_USE_NISHIOKA_DESC', '���ܤǤΤ�ͭ��<br>���١����٤��齻��򸡺�����<br><a href="http://nishioka.sakura.ne.jp/google/" target="_blank">http://nishioka.sakura.ne.jp/google/</a>');
    define('_AM_WEBLINKS_GM_TITLE_LENGTH', '[Marker] �����ȥ��ʸ����');
    define('_AM_WEBLINKS_GM_TITLE_LENGTH_DESC', '�ޡ�������ɽ�����륿���ȥ��ʸ����<br><b>-1</b> �����¤ʤ�');
    define('_AM_WEBLINKS_GM_DESC_LENGTH', '[Marker] ��ʸ��ʸ����');
    define('_AM_WEBLINKS_GM_DESC_LENGTH_DESC', '�ޡ�������ɽ��������ʸ��ʸ����<br><b>-1</b> �����¤ʤ�');
    define('_AM_WEBLINKS_GM_WORDWRAP', '[Marker] ��ʸ�Σ��Ԥ�ʸ����');
    define('_AM_WEBLINKS_GM_WORDWRAP_DESC', '�ޡ�������ɽ��������ʸ�Σ��Ԥ����� (wordwrap) ��ʸ����<br><b>-1</b> �����¤ʤ�');
    define('_AM_WEBLINKS_GM_USE_CENTER_MARKER', '[Marker] �濴�ޡ�������ɽ������');
    define('_AM_WEBLINKS_GM_USE_CENTER_MARKER_DESC', '�ȥåץڡ����ȥ��ƥ���ڡ����ˤơ��濴���֤˥ޡ�������ɽ������');

    // map jp
    define('_AM_WEBLINKS_MAP_JP_MANAGE', '�����Ͽޤ�����');

    // column
    define('_AM_WEBLINKS_COLUMN_MANAGE', '��������');
    define('_AM_WEBLINKS_COLUMN_MANAGE_DESC', 'link �ơ��֥�� modify �ơ��֥�� etc �������ɲä���');
    define('_AM_WEBLINKS_COLUMN_MANAGE_NOT_USE', '���ѤǤ��ޤ���');
    define('_AM_WEBLINKS_THERE_ARE_COLUMN', 'link �ơ��֥�� <b>%s</b> ��� etc ����ब����ޤ�');
    define('_AM_WEBLINKS_COLUMN_NUM', '�ɲä��� etc ������');
    define('_AM_WEBLINKS_COLUMN_BIGGER_USE', '���Ѥ��� etc �������� link �ơ��֥�Υ��������¿��');
    define('_AM_WEBLINKS_COLUMN_UNMATCH', 'link �ơ��֥�� modify �ơ��֥�Υ���ब���פ��ʤ�');
    define('_AM_WEBLINKS_PHPMYADMIN', 'phpMyAdmin �ʤɤδ����ġ���ǽ������Ƥ�������');
    define('_AM_WEBLINKS_LINK_NUM_ETC', '���Ѥ��� etc ������');

    // latest
    define('_AM_WEBLINKS_INDEX_MODE_LATEST', '���奵���Ȥ��¤ӽ�');
    define('_AM_WEBLINKS_INDEX_MODE_LATEST_UPDATE', '�������ο�������');
    define('_AM_WEBLINKS_INDEX_MODE_LATEST_CREATE', '��Ͽ���ο�������');

    // header
    define('_AM_WEBLINKS_CONF_HTML_STYLE', 'HTML ɽ���˴ؤ�������');
    define('_AM_WEBLINKS_HEADER_MODE', 'xoops module header ����Ѥ���');
    define('_AM_WEBLINKS_HEADER_MODE_DESC', '�֤������פΤȤ��ϡ��������륷���Ȥ� Javascript �λ���� body �������ɽ�����ޤ�<br>�֤Ϥ��פΤȤ��ϡ�xoops module header ����Ѥ��ơ�header �������ɽ�����ޤ�<br>�ơ��ޤˤ�äƤϻ��ѤǤ��ʤ���Τ�����ޤ�');

    // bulk
    define('_AM_WEBLINKS_BULK_SAMPLE', '[����]�򥯥�å�����ȡ����ܤ�����ޤ�');
    define('_AM_WEBLINKS_BULK_LINK_DSC10', '��Ͽ���ܤϸ���');
    define('_AM_WEBLINKS_BULK_LINK_DSC20', '�����Ԥ���Ͽ���ܤ���ꤹ��');
    define('_AM_WEBLINKS_BULK_LINK_DSC21', '�裱����');
    define('_AM_WEBLINKS_BULK_LINK_DSC22', '�裲���� �ʹ�');
    define('_AM_WEBLINKS_BULK_LINK_DSC23', '�����ܤˡ���Ͽ����̾ �򵭽Ҥ���<br>����(---)�Ƕ��ڤ�');
    define('_AM_WEBLINKS_BULK_LINK_DSC24', '�����ܰʹߤˡ��裱����ǻ��ꤷ�����֤ˡ���Ͽ���Ƥ򥫥��(,)�Ƕ��ڤäƵ��Ҥ���');
    define('_AM_WEBLINKS_BULK_CHECK_URL', 'URL�����ꤵ��Ƥ��뤫��������');
    define('_AM_WEBLINKS_BULK_CHECK_DESCRIPTION', '����ʸ�����ꤵ��Ƥ��뤫��������');

    // === 2007-09-01 ===
    // auth
    define('_AM_WEBLINKS_AUTH_DELETE', '��󥯺���θ���');
    define('_AM_WEBLINKS_AUTH_DELETE_DSC', '��󥯤������븢�¤�Ϳ�����륰�롼�פ���ꤹ��');
    define('_AM_WEBLINKS_AUTH_DELETE_AUTO', '��󥯺���μ�ư��ǧ�θ���');
    define('_AM_WEBLINKS_AUTH_DELETE_AUTO_DSC', '��󥯤��������Ȥ��˼�ư��ǧ����븢�¤�Ϳ�����륰�롼�פ���ꤹ��');

    // nofitication
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE', '���٥�����Τ�����');
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE_DESC', '�⥸�塼������� �̤�����Ǥ�<br>�⥸�塼��Υȥåץڡ�����Ʊ����ΤǤ�');
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE_NOT_USE', 'XOOPS �ΥС������ˤ�äƤϻ��ѤǤ��ޤ���');
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE_PLEASE', '���ξ��ϡ��⥸�塼��Υȥåץڡ�������Ѥ��Ƥ�������');
    define('_AM_WEBLINKS_SUBJ_LINK_MOD_APPROVED', '[{X_SITENAME}] {X_MODULE}: ��󥯽������꤬��ǧ����ޤ���');
    define('_AM_WEBLINKS_SUBJ_LINK_MOD_REFUSED', '[{X_SITENAME}] {X_MODULE}: ��󥯽������꤬���ݤ���ޤ���');
    define('_AM_WEBLINKS_SUBJ_LINK_DEL_APPROVED', '[{X_SITENAME}] {X_MODULE}: ��󥯺�����꤬��ǧ����ޤ���');
    define('_AM_WEBLINKS_SUBJ_LINK_DEL_REFUSED', '[{X_SITENAME}] {X_MODULE}: ��󥯺�����꤬���ݤ���ޤ���');

    // config
    define('_AM_WEBLINKS_ADMIN_WAITING_SHOW', '�����Ԥξ�ǧ�Ԥ��ꥹ�Ȥ�ɽ������');
    define('_AM_WEBLINKS_USER_WAITING_NUM', '�桼���ξ�ǧ�Ԥ��ꥹ�Ȥη��');
    define('_AM_WEBLINKS_USER_OWNER_NUM', '�桼������Ͽ�ꥹ�Ȥη��');
    define('_AM_WEBLINKS_USE_HITS_SINGLELINK', '��󥯾ܺ٤� "�ҥåȿ�" �λ���');
    define('_AM_WEBLINKS_USE_HITS_SINGLELINK_DSC', '�֥����פ� "�ҥåȿ�" �λ��ѡפ��֤Ϥ��פΤȤ���ͭ��<br>�֤Ϥ��פ����򤹤�ȡ�<br>��󥯾ܺ� singlelink ��ɽ�������Ȥ��ˡ��ҥåȿ� ��������ȥ��åפ���ޤ�');
    define('_AM_WEBLINKS_MODE_RANDOM', '�����ॸ���פ�������');
    define('_AM_WEBLINKS_MODE_RANDOM_URL', '��Ͽ���줿�����Ȥ�URL');
    define('_AM_WEBLINKS_MODE_RANDOM_SINGLE', '�⥸�塼�����singlelink');

    // request list
    define('_AM_WEBLINKS_DEL_REQS', '��ǧ�Ԥ��κ�����');
    define('_AM_WEBLINKS_NO_DEL_REQ', '��󥯺���ꥯ�����ȤϤ���ޤ���');
    define('_AM_WEBLINKS_DEL_REQ_DELETED', '����ꥯ�����Ȥ������ޤ���');

    // link list
    define('_AM_WEBLINKS_LINK_USERCOMMENT_DESC', '�����԰������ȤΤ����󥯰��� (ID�ս�)');

    // clone
    define('_AM_WEBLINKS_CLONE_LINK', '��󥯤�ʣ��');
    define('_AM_WEBLINKS_CLONE_MODULE', '¾�Υ⥸�塼��ؤΥ�󥯤�ʣ��');
    define('_AM_WEBLINKS_CLONE_CONFIRM', 'ʣ�����ޤ���');
    define('_AM_WEBLINKS_NO_MODULE', '��������⥸�塼�뤬�ʤ�');

    // link form
    define('_AM_WEBLINKS_MODIFIED', '�ѹ�����');
    define('_AM_WEBLINKS_CHECK_CONFIRM', '��ǧ����');
    define('_AM_WEBLINKS_WARN_CONFIRM', '���: %s �Ρֳ�ǧ�����פ˥����å����Ƥ�������');
    define('_AM_WEBLINKS_RSSC_LID_EXIST_MORE', 'Ʊ����RSSC ID�פ����ʣ���Υ�󥯤����Ĥ���ޤ���');

    // web shot
    define('_AM_WEBLINKS_LINK_IMG_THUMB', '��󥯲���������');
    define(
        '_AM_WEBLINKS_LINK_IMG_THUMB_DSC',
        '��󥯲��������ꤵ��Ƥ��ʤ��Ȥ��ˡ�����ͥ��� WEB �����ӥ������Ѥ��ơ�
WEB�����ȤΥ���ͥ����ɽ������'
    );
    define('_AM_WEBLINKS_LINK_IMG_NON', '�ʤ�');
    //define('_AM_WEBLINKS_LINK_IMG_MOZSHOT', '<a href="http://mozshot.nemui.org/" target="_blank">MozShot</a> �����Ѥ���');
    //define('_AM_WEBLINKS_LINK_IMG_SIMPLEAPI', '<a href="http://img.simpleapi.net/" target="_blank">SimpleAPI</a> �����Ѥ���');

    // === 2007-11-01 ===
    // google map
    define('_AM_WEBLINKS_GM_MARKER_WIDTH', '[Marker] ���� (pixel)');
    define('_AM_WEBLINKS_GM_MARKER_WIDTH_DESC', '�ޡ������ο�Ф��β���<br><b>-1</b> �ϻ���ʤ�');
    define('_AM_WEBLINKS_LINK_IMG_USE', '%s �����Ѥ���');

    define('_AM_WEBLINKS_RSS_SITE', '�����Ȥ�ɽ��');
    define('_AM_WEBLINKS_RSS_FEED', 'RSS������ɽ��');

    // nameflag mainflag
    define('_AM_WEBLINKS_CONF_LINK_USER', '�桼���Υ����Ͽ���ܤ�����');
    define('_AM_WEBLINKS_USER_NAMEFLAG', '̾��ɽ�� nameflag ������');
    define('_AM_WEBLINKS_USER_MAILFLAG', '�᡼��ɽ�� mailflag ������');
    define('_AM_WEBLINKS_USER_NAME_MAIL_FLAG_DESC', '�桼������Ͽ������ν����<br>�����Ԥ��ѹ��Ǥ���');
    define('_AM_WEBLINKS_USER_NAME_MAIL_FLAG_SEL', '�桼�������򤹤�');

    // description length
    define('_AM_WEBLINKS_DESC_LENGTH', 'ʸ����������');
    define('_AM_WEBLINKS_DESC_LENGTH_DSC', '<b>-1</b> ���뤤�� �����Ԥ� 64KB ����<br>');

    // === 2008-02-17 ===
    // config
    define('_AM_WEBLINKS_MODULE_CONFIG_7', '�⥸�塼������ꣷ');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_7', '��˥塼');
    define('_AM_WEBLINKS_CONF_MENU', '��˥塼��ɽ��');
    define('_AM_WEBLINKS_CONF_MENU_DESC', '��˥塼��ɽ���˴�Ϣ��������');
    define('_AM_WEBLINKS_CONF_TITLE', '��˥塼�Υ����ȥ�');

    // htmlout
    define('_AM_WEBLINKS_OUTPUT_PLUGIN_MANAGE', '���ϥץ饰�������');
    define('_AM_WEBLINKS_HTMLOUT', 'HTML ���ϥץ饰����');
    define('_AM_WEBLINKS_RSSOUT', 'RSS ���ϥץ饰����');
    define('_AM_WEBLINKS_KMLOUT', 'KML ���ϥץ饰����');

    // pagerank
    define('_AM_WEBLINKS_LINK_CHECK_MANAGE', '��󥯸�������');
    define('_AM_WEBLINKS_USE_PAGERANK', 'PageRank ��ɽ��');
    define('_AM_WEBLINKS_USE_PAGERANK_DESC', '��ɽ������פ����򤹤�ȡ�<br>��˥塼���С��ȥ�󥯳��פȥ�󥯾ܺ٤�ɽ�����롣');
    define('_AM_WEBLINKS_USE_PAGERANK_NON', 'ɽ�����ʤ�');
    define('_AM_WEBLINKS_USE_PAGERANK_SHOW', 'ɽ������');
    define('_AM_WEBLINKS_USE_PAGERANK_CACHE', '�������� PageRank �򥭥�å��夷�ơ�ɽ������');

    // kml
    define('_AM_WEBLINKS_KML_USE', 'KML ��ɽ��');

    //---------------------------------------------------------
    // 2012-04-02 v2.10
    //---------------------------------------------------------
    define('_AM_WEBLINKS_VIEW_URL_SUMMARY', '���פΥ����');
    define('_AM_WEBLINKS_VIEW_URL_SUMMARY_DSC', '���ƥ��ꡢ�������᥵���Ȥʤɤǡ����� �����򤷤��Ȥ���Ŭ�Ѥ����');
    define('_AM_WEBLINKS_VIEW_URL_SUMMARY_0', '�����Ȥ�url');
    define('_AM_WEBLINKS_VIEW_URL_SUMMARY_1', 'Weblinks��singlelink');

    define('_AM_WEBLINKS_TITLE_RSSC_MANAGE', 'RSSC ����');
    define('_AM_WEBLINKS_TITLE_RSSC_ARCHIVE', 'RSSC ���������ִ���');
    define('_AM_WEBLINKS_TITLE_RSSC_ADD', '��󥯤� RSS URL ���ɲä���');
    define('_AM_WEBLINKS_TITLE_RSSC_ADD_DSC', '<b>���</b> ���󥿡��ͥåȤ�Ȥäơ�RSS��URL��ư���Ф��뤿�ᡢ���֤�������ޤ�');

    define('_AM_WEBLINKS_BULK_COMMENT', '�����Ȱ����Ͽ');
    define('_AM_WEBLINKS_BULK_COMMENT_DSC1', '��󥯤Υ����ȥ�, uid, �����ȤΥ����ȥ�, �����Ȥ���ʸ �򥫥��(,)�Ƕ��ڤäƵ��Ҥ���<br>uid �Ͼ�ά�ġ������Ԥ�uid �����Ѥ����<br/ >�����ȤΥ����ȥ� �Ͼ�ά�ġ���󥯤Υ����ȥ� �����Ѥ����');
    define('_AM_WEBLINKS_NO_COMMENT', '�����Ȥ��ʤ�');
    define('_AM_WEBLINKS_COMMENT_ADDED', '�����Ȥ��ɲä���');
    define('_AM_WEBLINKS_BULK_DSC1', '����ޤȲ��Ԥ����̤ʵ�ˡ�ǵ��ҤǤ��ޤ�<br>�����(,)�� \2c �ȵ��Ҥ���<br/ >���Ԥ� \n �ȵ��Ҥ���');

    define('_AM_WEBLINKS_TITLE_LINK_GEOCODING', '��󥯤ΰ��١����٤ΰ���');
    define(
        '_AM_WEBLINKS_TITLE_LINK_GEOCODING_DSC',
        '���꤫����١����٤򸡺����ޤ�<br>���Ǥ���Ͽ����Ƥ����Τϸ�������ޤ���<br>������̤�<span style="color:#0000ff">�Ļ�</span>��ɽ������ޤ�<br>�����Ǥ��ʤ��ä��Ȥ���<span style="color:#ff0000">�ֻ�</span>��ɽ������ޤ�<br><b>���</b> ���󥿡��ͥåȤ�Ȥäơ����١����٤򸡺����뤿�ᡢ���֤�������ޤ�'
    );
    define('_AM_WEBLINKS_SEARCHED_ADDRESS', '�������줿����');
    define('_AM_WEBLINKS_GOTO_NEXT_PAGE', '���Υڡ�����');
    define('_AM_WEBLINKS_LAST_PAGE', '�����ϺǸ�Υڡ����Ǥ�');
    define('_AM_WEBLINKS_GEO_ADD', '��󥯤˰��١����٤��ɲä���');

    define('_AM_WEBLINKS_TITLE_LINK_CSV', '��󥯾����CSV�����ǥ�������ɤ���');

    define('_AM_WEBLINKS_CAT_GM_LOCATION_DSC', '���١����٤ξ��򼨤����');
    define('_AM_WEBLINKS_CAT_GM_ICON_DSC', '(default) �ΤȤ��� �ƥ��ƥ���Υ������󤬷Ѿ������');
}
// --- define language end ---
