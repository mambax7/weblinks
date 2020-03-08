<?php
// $Id: modinfo.php,v 1.11 2008/02/26 16:01:45 ohwada Exp $

// 2008-02-17
// remove _MI_WEBLINKS_SMNAME1

// 2007-09-01
// notification: new_link_admin

// 2007-08-25
// small change _MI_WEBLINKS_GLOBAL_LINKSUBMIT_NOTIFY

// 2007-04-08
// _MI_WEBLINKS_BNAME_RANDOM_IMAGE

// 2006-11-03 hiro
// random block

// 2006-05-15 K.OHWADA
// weblinks ver 1.1
// add _MI_WEBLINKS_ADMENU0

// 2006-03-26 K.OHWADA
// REQ 3807: Description in main page
// _MI_WEBLINKS_INDEX_DESC

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//=========================================================
// WebLinks Module
// language for Module Info
// 2004-10-24 K.OHWADA
// ͭ����������
//=========================================================

// --- define language begin ---
if (!defined('WEBLINKS_LANG_MI_LOADED')) {
    define('WEBLINKS_LANG_MI_LOADED', 1);

    //---------------------------------------------------------
    // same as mylinks
    //---------------------------------------------------------
    // The name of this module
    define('_MI_WEBLINKS_NAME', 'WEB��󥯽�');

    // A brief description of this module
    define('_MI_WEBLINKS_DESC', '�桼������ͳ�˥�󥯾������Ͽ��������ɾ����Ԥ��륻��������������ޤ���');

    // Names of blocks for this module (Not all module has blocks)
    define('_MI_WEBLINKS_BNAME1', '������');
    define('_MI_WEBLINKS_BNAME2', '�͵����');
    define('_MI_WEBLINKS_BNAME3', '��ɾ�����');

    // Sub menu titles
    //define("_MI_WEBLINKS_SMNAME1","��Ͽ����");
    //define("_MI_WEBLINKS_SMNAME2","�͵�������");
    //define("_MI_WEBLINKS_SMNAME3","��ɾ��������");

    // update of admin menu
    define('_MI_WEBLINKS_ADMENU1', '�⥸�塼������ꣲ');
    define('_MI_WEBLINKS_ADMENU2', '���ƥ���δ���');
    define('_MI_WEBLINKS_ADMENU3', '��󥯤δ���');
    define('_MI_WEBLINKS_ADMENU4', '������󥯤��ɲ�');
    define('_MI_WEBLINKS_ADMENU5', '��ǧ�Ԥ��ο������');
    define('_MI_WEBLINKS_ADMENU6', '��ǧ�Ԥ��ν������');
    define('_MI_WEBLINKS_ADMENU7', '����ڤ����');

    //-------------------------------------
    // Title of config items
    // Description of each config items
    //-------------------------------------
    define('_MI_WEBLINKS_POPULAR', '�ֿ͵���󥯡פˤʤ뤿��Υҥåȿ�');
    define('_MI_WEBLINKS_POPULARDSC', '��POPLUAR�ץ�������ɽ������뤿��Υҥåȿ�����ꤷ�Ƥ���������<br>0 ����ꤹ��ȡ����������ɽ������ʤ���');
    define('_MI_WEBLINKS_NEWLINKS', '�ֿ����󥯡פ�ɽ��������');
    define('_MI_WEBLINKS_NEWLINKSDSC', '�ȥåץڡ����ˡֿ����󥯡פ�ɽ���������������ꤷ�Ƥ���������');
    define('_MI_WEBLINKS_PERPAGE', '��󥯾���򣱥ڡ������ɽ��������');
    define('_MI_WEBLINKS_PERPAGEDSC', '��󥯾ܺ�ɽ���ǣ��ڡ����������ɽ���������������ꤷ�Ƥ���������');

    //define('_MI_WEBLINKS_ANONPOST','ƿ̾�桼���ˤ���󥯿�����Ͽ����Ĥ���');
    //define('_MI_WEBLINKS_AUTOAPPROVE','��󥯿�����Ͽ�μ�ư��ǧ');
    //define('_MI_WEBLINKS_AUTOAPPROVEDSC','�����Ԥξ�ǧ���ʤ��ǡ���󥯿�����Ͽ�ξ�ǧ��Ԥ����ϡ��֤Ϥ��פ����򤷤Ƥ���������');

    //-------------------------------------
    // Text for notifications
    //-------------------------------------
    define('_MI_WEBLINKS_GLOBAL_NOTIFY', '�⥸�塼������');
    define('_MI_WEBLINKS_GLOBAL_NOTIFYDSC', '��󥯽��⥸�塼�����Τˤ��������Υ��ץ����');

    define('_MI_WEBLINKS_CATEGORY_NOTIFY', 'ɽ����Υ��ƥ���');
    define('_MI_WEBLINKS_CATEGORY_NOTIFYDSC', 'ɽ����Υ��ƥ�����Ф������Υ��ץ����');

    define('_MI_WEBLINKS_LINK_NOTIFY', 'ɽ����Υ��');
    define('_MI_WEBLINKS_LINK_NOTIFYDSC', 'ɽ����Υ�󥯤��Ф������Υ��ץ����');

    define('_MI_WEBLINKS_GLOBAL_NEWCATEGORY_NOTIFY', '�������ƥ���');
    define('_MI_WEBLINKS_GLOBAL_NEWCATEGORY_NOTIFYCAP', '�������ƥ��꤬�������줿�������Τ���');
    define('_MI_WEBLINKS_GLOBAL_NEWCATEGORY_NOTIFYDSC', '�������ƥ��꤬�������줿�������Τ���');
    define('_MI_WEBLINKS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} : �������ƥ��꤬��������ޤ����ʥ�󥯽���');

    define('_MI_WEBLINKS_GLOBAL_LINKMODIFY_NOTIFY', '[������] ��󥯽���������Υꥯ������');
    define('_MI_WEBLINKS_GLOBAL_LINKMODIFY_NOTIFYCAP', '[������] ��󥯽���������Υꥯ�����Ȥ����ä��������Τ���');
    define('_MI_WEBLINKS_GLOBAL_LINKMODIFY_NOTIFYDSC', '��󥯽���������Υꥯ�����Ȥ����ä��������Τ���');
    define('_MI_WEBLINKS_GLOBAL_LINKMODIFY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}: ��󥯽���������Υꥯ�����Ȥ�����ޤ���');

    define('_MI_WEBLINKS_GLOBAL_LINKBROKEN_NOTIFY', '[������] ����ڤ����');
    define('_MI_WEBLINKS_GLOBAL_LINKBROKEN_NOTIFYCAP', '[������] ����ڤ����𤬤��ä��������Τ���');
    define('_MI_WEBLINKS_GLOBAL_LINKBROKEN_NOTIFYDSC', '����ڤ����𤬤��ä��������Τ���');
    define('_MI_WEBLINKS_GLOBAL_LINKBROKEN_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}: ����ڤ����𤬤���ޤ���');

    define('_MI_WEBLINKS_GLOBAL_LINKSUBMIT_NOTIFY', '[������] ������󥯤���� (��ǧ�Ԥ�) ');
    define('_MI_WEBLINKS_GLOBAL_LINKSUBMIT_NOTIFYCAP', '[������] ������� (��ǧ�Ԥ�) ����Ƥ����ä��������Τ���');
    define('_MI_WEBLINKS_GLOBAL_LINKSUBMIT_NOTIFYDSC', '������� (��ǧ�Ԥ�) ����Ƥ��ä��������Τ���');
    define('_MI_WEBLINKS_GLOBAL_LINKSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}: ������� (��ǧ�Ԥ�) ����Ƥ�����ޤ���');

    define('_MI_WEBLINKS_GLOBAL_NEWLINK_NOTIFY', '������󥯷Ǻ�');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_NOTIFYCAP', '������󥯤��Ǻܤ��줿�������Τ���');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_NOTIFYDSC', '������󥯤��Ǻܤ��줿�������Τ���');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}: ������󥯤��Ǻܤ���ޤ���');

    define('_MI_WEBLINKS_CATEGORY_LINKSUBMIT_NOTIFY', '[������] ���������ơ����ꥫ�ƥ���� (��ǧ�Ԥ�) ');
    define('_MI_WEBLINKS_CATEGORY_LINKSUBMIT_NOTIFYCAP', '[������] ���Υ��ƥ���ˤ����ƿ������ (��ǧ�Ԥ�) ����Ƥ��줿�������Τ���');
    define('_MI_WEBLINKS_CATEGORY_LINKSUBMIT_NOTIFYDSC', '���Υ��ƥ���ˤ����ƿ������ (��ǧ�Ԥ�) ����Ƥ��줿�������Τ���');
    define('_MI_WEBLINKS_CATEGORY_LINKSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}: ������� (��ǧ�Ԥ�) ����Ƥ�����ޤ���');

    define('_MI_WEBLINKS_CATEGORY_NEWLINK_NOTIFY', '������󥯷Ǻܡ����ꥫ�ƥ����');
    define('_MI_WEBLINKS_CATEGORY_NEWLINK_NOTIFYCAP', '���Υ��ƥ���ˤ����ƿ�����󥯤��Ǻܤ��줿�������Τ���');
    define('_MI_WEBLINKS_CATEGORY_NEWLINK_NOTIFYDSC', '���Υ��ƥ���ˤ����ƿ�����󥯤��Ǻܤ��줿�������Τ���');
    define('_MI_WEBLINKS_CATEGORY_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}: ������󥯤��Ǻܤ���ޤ���');

    //define('_MI_WEBLINKS_LINK_APPROVE_NOTIFY', '��󥯾�ǧ');
    //define('_MI_WEBLINKS_LINK_APPROVE_NOTIFYCAP', '���Υ�󥯤���ǧ���줿�������Τ���');
    //define('_MI_WEBLINKS_LINK_APPROVE_NOTIFYDSC', '���Υ�󥯤���ǧ���줿�������Τ���');
    //define('_MI_WEBLINKS_LINK_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE}: ��󥯤���ǧ����ޤ���');

    //---------------------------------------------------------
    // weblinks
    //---------------------------------------------------------
    // === Names of blocks for this module ===
    define('_MI_WEBLINKS_BNAME4', '��󥯽��Υ��ƥ������');
    define('_MI_WEBLINKS_BNAME5', '��󥯽��ο���RSS/ATOM����');
    define('_MI_WEBLINKS_BNAME6', '��󥯽���blogɽ��');

    //-------------------------------------
    // Title of config items
    //-------------------------------------
    define('_MI_WEBLINKS_LOGOSHOW', '�⥸�塼��Υ�������ɽ������');
    define('_MI_WEBLINKS_LOGOSHOWDSC', '�⥸�塼��Υ�������ɽ���ΤȤ��ϡ��֤Ϥ��פ����򤷤Ƥ���������');

    define('_MI_WEBLINKS_TITLESHOW', '�⥸�塼��Υ����ȥ�̾��ɽ������');
    define('_MI_WEBLINKS_TITLESHOWDSC', '�⥸�塼��Υ����ȥ�̾��ɽ���ΤȤ��ϡ��֤Ϥ��פ����򤷤Ƥ���������');

    define('_MI_WEBLINKS_NEWDAYS', '�ֿ����󥯡פˤʤ뤿�������');
    define('_MI_WEBLINKS_NEWDAYS_DSC', '��NEW�ץ�������ɽ������뤿�����������ꤷ�Ƥ���������<br>0 ����ꤹ��ȡ����������ɽ������ʤ���');

    define('_MI_WEBLINKS_DESCSHORT', '��󥯾���������κ���ʸ����');
    define('_MI_WEBLINKS_DESCSHORTDSC', '��󥯰���ɽ����������ɽ���������ʸ��������ꤷ�Ƥ���������');

    define('_MI_WEBLINKS_ORDERBY', '��󥯾���Υ����Ƚ�Υǥե������');
    define('_MI_WEBLINKS_ORDERBYDSC', '��󥯾ܺ�ɽ���ǥǥե���ȤȤʤ륽���Ƚ����ꤷ�Ƥ���������');
    define('_MI_WEBLINKS_ORDERBY0', '�����ȥ� (A to Z)');
    define('_MI_WEBLINKS_ORDERBY1', '�����ȥ� (Z to A)');
    define('_MI_WEBLINKS_ORDERBY2', '���� (��Ͽ���θŤ���)');
    define('_MI_WEBLINKS_ORDERBY3', '���� (��Ͽ���ο�������)');
    define('_MI_WEBLINKS_ORDERBY4', 'ɾ�� (ɾ�����㤤��)');
    define('_MI_WEBLINKS_ORDERBY5', 'ɾ�� (ɾ���ι⤤��)');
    define('_MI_WEBLINKS_ORDERBY6', '�͵� (�ҥåȿ��ξ��ʤ���)');
    define('_MI_WEBLINKS_ORDERBY7', '�͵� (�ҥåȿ���¿����)');

    define('_MI_WEBLINKS_SEARCH_LINKS', '������̤Σ��ڡ������ɽ��������');
    define('_MI_WEBLINKS_SEARCH_LINKSDSC', '�������ɽ���ǣ��ڡ����������ɽ���������������ꤷ�Ƥ���������');

    define('_MI_WEBLINKS_SEARCH_MIN', '�����Υ�����ɺ���ʸ����');
    define('_MI_WEBLINKS_SEARCH_MINDSC', '������Ԥ��ݤ�ɬ�פʥ�����ɤκ���ʸ��������ꤷ�Ƥ���������');

    define('_MI_WEBLINKS_USEFRAMES', '�ե졼�����Ѥ���');
    define('_MI_WEBLINKS_USEFRAMEDSC', '��󥯥ڡ�����ե졼�����ɽ�����뤫�ɤ���');

    define('_MI_WEBLINKS_BROKEN', 'ɽ����ߤ��֥���ڤ�ײ��');
    define(
        '_MI_WEBLINKS_BROKENDSC',
        '��󥯤�ɽ����ߤ�뤿��Ρ֥���ڤ�ײ������ꤷ�Ƥ���������<br>���ο��Ͱʲ��Ǥ���С����Ū�ʾ㳲�ȸ��ʤ������⤷�ޤ���<br>���ο��Ͱʾ�ˤʤ�С�����Ū�ʾ㳲�ȸ��ʤ�����󥯤�ɽ����ߤ�ޤ�'
    );

    define('_MI_WEBLINKS_LISTIMAGE_USE', '��󥯰���ɽ���˥�󥯲�������Ѥ���');
    define('_MI_WEBLINKS_LISTIMAGE_WIDTH', '��󥯰���ɽ���β������κ�����');
    define('_MI_WEBLINKS_LISTIMAGE_HEIGHT', '��󥯰���ɽ���β�����κ�����');
    define('_MI_WEBLINKS_LISTIMAGE_USEDSC', '��󥯰���ɽ���ΤȤ��ˡ���󥯲�����ɽ��������ϡ֤Ϥ��פ����򤷤Ƥ���������');

    define('_MI_WEBLINKS_LINKIMAGE_USE', '��󥯾ܺ�ɽ���˥�󥯲�������Ѥ���');
    define('_MI_WEBLINKS_LINKIMAGE_WIDTH', '��󥯾ܺ�ɽ���β������κ�����');
    define('_MI_WEBLINKS_LINKIMAGE_HEIGHT', '��󥯾ܺ�ɽ���β�����κ�����');
    define('_MI_WEBLINKS_LINKIMAGE_USEDSC', '��󥯾ܺ�ɽ���ΤȤ��ˡ���󥯲�����ɽ��������ϡ֤Ϥ��פ����򤷤Ƥ���������');

    // 2005-10-20 K.OHWADA
    define('_MI_WEBLINKS_TOPTEN_STYLE', '�ֿ͵���󥯡פΥ�������');
    define('_MI_WEBLINKS_TOPTEN_STYLE_DSC', '�ֿ͵���󥯡פȡֹ�ɾ����󥯡פ�ɽ�����륹���������ꤷ�Ƥ���������');
    define('_MI_WEBLINKS_TOPTEN_STYLE_0', '�ȥåס����ƥ������');
    define('_MI_WEBLINKS_TOPTEN_STYLE_1', '���ƤΥ��ƥ�������');

    define('_MI_WEBLINKS_TOPTEN_LINKS', '�ֿ͵���󥯡פ�ɽ�������󥯿�');
    define('_MI_WEBLINKS_TOPTEN_LINKS_DSC', '�ֿ͵���󥯡פȡֹ�ɾ����󥯡פ�ɽ���������Υ�󥯷������ꤷ�Ƥ���������');

    define('_MI_WEBLINKS_TOPTEN_CATS', '�ֿ͵���󥯡פ�ɽ�����륫�ƥ����');
    define('_MI_WEBLINKS_TOPTEN_CATS_DSC', '�ֿ͵���󥯡פȡֹ�ɾ����󥯡פ�ɽ���������Υ��ƥ��������ꤷ�Ƥ���������<br>���ƥ������¿������ȥ����ॢ���Ȥ��ޤ�');

    // 2006-03-26
    // REQ 3807: Description in main page
    //define('_MI_WEBLINKS_INDEX_DESC','�ᥤ��ڡ���������');
    //define('_MI_WEBLINKS_INDEX_DESC_DSC', '�ᥤ��ڡ�����ɽ������Ȥ��ϡ�����ʸ����ꤷ�Ƥ���������');
    //define('_MI_WEBLINKS_INDEX_DESC_DEFAULT', '<div align="center"><font color="blue">�����ˤ�����ʸ��ɽ�����ޤ���<br>����ʸ�ϡ֥⥸�塼������꣱�פˤ��Խ��Ǥ��ޤ���</font><br></div>');

    // 2006-05-15
    define('_MI_WEBLINKS_ADMENU0', '�ܼ�');

    // 2006-11-03
    // random block
    define('_MI_WEBLINKS_BNAME_RANDOM', '�����ࡦ���');
    define('_MI_WEBLINKS_BNAME_GENERIC', '���ѥ��ɽ��');

    // 2007-04-08
    define('_MI_WEBLINKS_BNAME_RANDOM_PHOTO', '������̿�');

    // 2007-09-01
    // notification: new_link_admin
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_ADMIN', '[������] ������󥯷Ǻ� (�����԰������Ȥ�ɽ��)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_ADMIN_CAP', '[������] ������󥯤��Ǻܤ��줿�������Τ��� (�����԰������Ȥ�ɽ��)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_ADMIN_DSC', '������󥯤��Ǻܤ��줿�������Τ��� (�����԰������Ȥ�ɽ��)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_ADMIN_SBJ', '[{X_SITENAME}] {X_MODULE}: ������󥯤��Ǻܤ���ޤ���');

    // notification: new_link_comment
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_COMMENT', '[������] ������󥯷Ǻ� (�����԰������Ȥε��ܤ���)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_COMMENT_CAP', '[������] ������󥯤��Ǻܤ��줿�������Τ��� (�����԰������Ȥε��ܤ���)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_COMMENT_DSC', '������󥯤��Ǻܤ��줿�������Τ��� (�����԰������Ȥε��ܤ���)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_COMMENT_SBJ', '[{X_SITENAME}] {X_MODULE}: ������󥯤��Ǻܤ���ޤ���');
}// --- define language begin ---
