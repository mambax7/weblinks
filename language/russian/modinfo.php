<?php
// $Id: modinfo.php,v 1.1 2012/04/09 10:20:06 ohwada Exp $

// 2008-02-17
// remove _MI_WEBLINKS_SMNAME1

// 2007-12-09
// remove _MI_WEBLINKS_LINK_APPROVE_NOTIFYSBJ

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
//=========================================================
// _LANGCODE: ru
// _CHARSET : cp1251
// Translator: Houston (Contour Design Studio https://www.cdesign.ru/)

// --- define language begin ---
if (!defined('WEBLINKS_LANG_MI_LOADED')) {
    define('WEBLINKS_LANG_MI_LOADED', 1);

    //---------------------------------------------------------
    // same as mylinks
    //---------------------------------------------------------
    // The name of this module
    define('_MI_WEBLINKS_NAME', '���-������');

    // A brief description of this module
    define('_MI_WEBLINKS_DESC', '������� ������� ���-������, ��� ������������ ����� ������/����������/��������� ��������� ���-�����.');

    // Names of blocks for this module (Not all module have blocks)
    define('_MI_WEBLINKS_BNAME1', '��������� ������');
    define('_MI_WEBLINKS_BNAME2', '������ ������');
    define('_MI_WEBLINKS_BNAME3', '���������� ������');

    // Sub menu titles
    //define("_MI_WEBLINKS_SMNAME1","Submit");
    //define("_MI_WEBLINKS_SMNAME2","Popular Site");
    //define("_MI_WEBLINKS_SMNAME3","Top Rated Site");

    // Names of admin menu items
    define('_MI_WEBLINKS_ADMENU1', '������������ ������ 2');
    define('_MI_WEBLINKS_ADMENU2', '���������� �����������');
    define('_MI_WEBLINKS_ADMENU3', '���������� ��������');
    define('_MI_WEBLINKS_ADMENU4', '�������� ����� ������');
    define('_MI_WEBLINKS_ADMENU5', '����� ������, ��������� ��������');
    define('_MI_WEBLINKS_ADMENU6', '���������� ������, ��������� ��������');
    define('_MI_WEBLINKS_ADMENU7', '������ � ������������ �������');
    //define("_MI_WEBLINKS_ADMENU8","Link Checker");

    //-------------------------------------
    // Title of config items
    // Description of each config items
    //-------------------------------------
    define('_MI_WEBLINKS_POPULAR', '�������� ���������� ��������� ��� ������, ����� �������� ��� ����������');
    define('_MI_WEBLINKS_POPULARDSC', '������� ����������� ���������� ��������� ��� ������ ������ "����������". <br>  ���� 0, ������ �� ������������. ');
    define('_MI_WEBLINKS_NEWLINKS', '�������� ������������ ���������� ����� ������, ������������ �� ������� ��������');

    //define('_MI_WEBLINKS_NEWLINKSDSC', 'Enter the maximum number of links to be displayed in the "New Links" block. ');
    define('_MI_WEBLINKS_NEWLINKSDSC', '������� ������������ ���������� ������, ������������ � ������� ��������. ');

    define('_MI_WEBLINKS_PERPAGE', '�������� ������������ ���������� ������, ������������ �� ������ ��������');
    define('_MI_WEBLINKS_PERPAGEDSC', '������� ������������ ���������� ������, ������� ����� �������� � ��������� ����������� �� ��������');

    //define('_MI_WEBLINKS_USESHOTS', 'Select yes to display screenshot images for each link');
    //define('_MI_WEBLINKS_USESHOTSDSC', '');
    //define('_MI_WEBLINKS_SHOTWIDTH', 'Maximum allowed width of each screenshot image');
    //define('_MI_WEBLINKS_SHOTWIDTHDSC', '');

    //define('_MI_WEBLINKS_ANONPOST','Allow anonymous users to post links?');
    //define('_MI_WEBLINKS_AUTOAPPROVE','Auto approve new links without admin intervention?');
    //define('_MI_WEBLINKS_AUTOAPPROVEDSC','');

    //-------------------------------------
    // Text for notifications
    //-------------------------------------
    define('_MI_WEBLINKS_GLOBAL_NOTIFY', '����������');
    define('_MI_WEBLINKS_GLOBAL_NOTIFYDSC', '���������� ����� ���������� � �������.');

    define('_MI_WEBLINKS_CATEGORY_NOTIFY', '���������');
    define('_MI_WEBLINKS_CATEGORY_NOTIFYDSC', '����� ����������, ������� ����������� � ������� ������ ���������.');

    define('_MI_WEBLINKS_LINK_NOTIFY', '������');
    define('_MI_WEBLINKS_LINK_NOTIFYDSC', '����� ����������, ������� ����������� � ������� ������.');

    define('_MI_WEBLINKS_GLOBAL_NEWCATEGORY_NOTIFY', '����� ���������');
    define('_MI_WEBLINKS_GLOBAL_NEWCATEGORY_NOTIFYCAP', '���������� ����, ����� ��������� ����� ������ ���������.');
    define('_MI_WEBLINKS_GLOBAL_NEWCATEGORY_NOTIFYDSC', '�������� ����������, ����� ��������� ����� ������ ���������.');
    define('_MI_WEBLINKS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} ����-���������� : ����� ������ ���������');

    define('_MI_WEBLINKS_GLOBAL_LINKMODIFY_NOTIFY', '[�����������������] ��������� / �������� ������������� ������');
    define('_MI_WEBLINKS_GLOBAL_LINKMODIFY_NOTIFYCAP', '[�����������������] ���������� ���� � �����-���� ������� ��������� / �������� ������.');
    define('_MI_WEBLINKS_GLOBAL_LINKMODIFY_NOTIFYDSC', '�������� ����������, ����� ��������� �����-���� ������ ��������� / �������� ������.');
    define('_MI_WEBLINKS_GLOBAL_LINKMODIFY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} ����-���������� : ������ �� ��������� / �������� ������');

    define('_MI_WEBLINKS_GLOBAL_LINKBROKEN_NOTIFY', '[�����������������] ���������� ������������ ������');
    define('_MI_WEBLINKS_GLOBAL_LINKBROKEN_NOTIFYCAP', '[�����������������] ���������� ���� � �����-���� ������ � ������������ ������.');
    define('_MI_WEBLINKS_GLOBAL_LINKBROKEN_NOTIFYDSC', '�������� ����������, ����� ��������� �����-���� ����� � ������������ ������.');
    define('_MI_WEBLINKS_GLOBAL_LINKBROKEN_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} ����-���������� : ����� � ������������ ������');

    define('_MI_WEBLINKS_GLOBAL_LINKSUBMIT_NOTIFY', '[�����������������] ���������� ����� ������');
    define('_MI_WEBLINKS_GLOBAL_LINKSUBMIT_NOTIFYCAP', '[�����������������] ���������� ����, ����� ���������� �����-���� ����� ������ (������� �����������).');
    define('_MI_WEBLINKS_GLOBAL_LINKSUBMIT_NOTIFYDSC', '�������� ����������, ����� ���������� �����-���� ����� ������ (������� �����������).');
    define('_MI_WEBLINKS_GLOBAL_LINKSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} ����-���������� : ���������� ����� ������');

    define('_MI_WEBLINKS_GLOBAL_NEWLINK_NOTIFY', '����� ������');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_NOTIFYCAP', '���������� ����, ����� ������������ �����-���� ����� ������.');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_NOTIFYDSC', '�������� ����������, ����� ������������ �����-���� ����� ������.');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} ����-���������� : ����� ������');

    define('_MI_WEBLINKS_CATEGORY_LINKSUBMIT_NOTIFY', '[�����������������] ���������� ����� ������');
    define('_MI_WEBLINKS_CATEGORY_LINKSUBMIT_NOTIFYCAP', '[�����������������] ���������� ����, ����� ���������� �����-���� ����� ������ (������� �����������) � ������� ���������.');
    define('_MI_WEBLINKS_CATEGORY_LINKSUBMIT_NOTIFYDSC', '�������� ����������, ����� ���������� �����-���� ����� ������ (������� �����������) � ������� ���������.');
    define('_MI_WEBLINKS_CATEGORY_LINKSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} ����-���������� : ���������� ����� ������ � ���������');

    define('_MI_WEBLINKS_CATEGORY_NEWLINK_NOTIFY', '����� ������');
    define('_MI_WEBLINKS_CATEGORY_NEWLINK_NOTIFYCAP', '���������� ����, ����� ������������ �����-���� ����� ������ � ������� ���������.');
    define('_MI_WEBLINKS_CATEGORY_NEWLINK_NOTIFYDSC', '�������� ����������, ����� ������������ �����-���� ����� ������ � ������� ���������.');
    define('_MI_WEBLINKS_CATEGORY_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} ����-���������� : ����� ������ � ���������');

    //define('_MI_WEBLINKS_LINK_APPROVE_NOTIFY', 'Link Approved');
    //define('_MI_WEBLINKS_LINK_APPROVE_NOTIFYCAP', 'Notify me when this link is approved.');
    //define('_MI_WEBLINKS_LINK_APPROVE_NOTIFYDSC', 'Receive notification when this link is approved.');
    //define('_MI_WEBLINKS_LINK_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} : Your submit link is approved');

    //---------------------------------------------------------
    // weblinks
    //---------------------------------------------------------
    // === Names of blocks for this module ===
    define('_MI_WEBLINKS_BNAME4', '������ ��������� ���-������');
    define('_MI_WEBLINKS_BNAME5', '��������� RSS/ATOM ������ ���-������');
    define('_MI_WEBLINKS_BNAME6', '�������� ���� ���-������');

    //-------------------------------------
    // Title of config items
    //-------------------------------------
    define('_MI_WEBLINKS_LOGOSHOW', '�������� ����������� �������� ������');
    define('_MI_WEBLINKS_LOGOSHOWDSC', '�������� "��" ��� ������ ����������� �������� ������.');

    define('_MI_WEBLINKS_TITLESHOW', '���������� ��������� ������');
    define('_MI_WEBLINKS_TITLESHOWDSC', '�������� "��" ��� ������ ��������� ������');

    define('_MI_WEBLINKS_NEWDAYS', '�������� ���������� ���� ��� ������, ������� ����� �������� ��� �����');
    define('_MI_WEBLINKS_NEWDAYS_DSC', '������� ���������� ���� ��� ����������� ������ "�����". <br> ���� 0, ������ �� ������������. ');

    define('_MI_WEBLINKS_DESCSHORT', '������������ ���������� ��������, ������������ ��� ����������� ������ ������ ');
    define('_MI_WEBLINKS_DESCSHORTDSC', '������� ������������ ���������� ��������, ������� ����� ������������ ��� ����������� ������ ������. ');

    define('_MI_WEBLINKS_ORDERBY', '�������� �� ��������� ���������� ����������� ����������� ������');
    define('_MI_WEBLINKS_ORDERBYDSC', '������� �������� �� ��������� ���������� ����������� ����������� ������.');
    define('_MI_WEBLINKS_ORDERBY0', '��������� (�� � �� �)');
    define('_MI_WEBLINKS_ORDERBY1', '��������� (�� � �� �)');
    define('_MI_WEBLINKS_ORDERBY2', '���� (������ ������ ������������ �������)');
    define('_MI_WEBLINKS_ORDERBY3', '���� (����� ������ ������������ �������)');
    define('_MI_WEBLINKS_ORDERBY4', '������ (�� ���������� ������ � ���������� ������)');
    define('_MI_WEBLINKS_ORDERBY5', '������ (�� ���������� ������ � ���������� ������)');
    define('_MI_WEBLINKS_ORDERBY6', '������������ (�� ���������� � ���������� ����������)');
    define('_MI_WEBLINKS_ORDERBY7', '������������ (�� ���������� � ���������� ����������)');
    define('_MI_WEBLINKS_ORDERBY8', '���� ���������� (������ ������ ������������ �������)');
    define('_MI_WEBLINKS_ORDERBY9', '���� ���������� (����� ������ ������������ �������)');

    define('_MI_WEBLINKS_SEARCH_LINKS', '���������� ������, ������������ �� �������� ����������� ������');
    define('_MI_WEBLINKS_SEARCH_LINKSDSC', '������� ������������ ���������� ������, ������� ����� �������� �� �������� ����������� ������');

    define('_MI_WEBLINKS_SEARCH_MIN', '����������� ���������� ���� ��� ������ �� �������� ������');
    define('_MI_WEBLINKS_SEARCH_MINDSC', '������� ����������� ����� �������� ��� ������ �� �������� ������ ');

    define('_MI_WEBLINKS_USEFRAMES', '�� ������, ����� ������������ ��������� �������� �� ������?');
    define('_MI_WEBLINKS_USEFRAMEDSC', '��������, ������� �� ���������� ������� �������� ������ ������ ������');

    define('_MI_WEBLINKS_BROKEN', '���������� ������� � ������������ ������, ����� ���������� �����');
    define(
        '_MI_WEBLINKS_BROKENDSC',
        '������� ���������� ������� � ������������ ������, ����� ���������� �����. <br> ����� ���� ����� ��������, �� �� ����� ��������������� ��� ��������� ������, � ������ �� ����� �������. <br>����� ��� �������� ������, ������ �� ����� ������������.'
    );

    define('_MI_WEBLINKS_LISTIMAGE_USE', '������������ ����������� ������ ��� ������ ������');
    define('_MI_WEBLINKS_LISTIMAGE_WIDTH', '������������ ������ ����������� ������');
    define('_MI_WEBLINKS_LISTIMAGE_HEIGHT', '������������ ������ ����������� ������');
    define('_MI_WEBLINKS_LISTIMAGE_USEDSC', '�������� "��", ����� �������� ����������� ������ ��� ����������� ������ ������');

    define('_MI_WEBLINKS_LINKIMAGE_USE', '������������ ����������� ������ ��� ����������� ����������� ������');
    define('_MI_WEBLINKS_LINKIMAGE_WIDTH', '������������ ������ ����������� ������ ��� ����������� ����������� ������');
    define('_MI_WEBLINKS_LINKIMAGE_HEIGHT', '������������ ������ ����������� ������ ��� ����������� ����������� ������');
    define('_MI_WEBLINKS_LINKIMAGE_USEDSC', '�������� "��", ����� �������� ����������� ������ ��� ����������� ����������� ������.');

    // 2005-10-20 K.OHWADA
    define('_MI_WEBLINKS_TOPTEN_STYLE', '����� ������ �������');
    define('_MI_WEBLINKS_TOPTEN_STYLE_DSC', '�������� ����� � "���������� ����" � "������ ����". ');
    define('_MI_WEBLINKS_TOPTEN_STYLE_0', '������ ������� ���������');
    define('_MI_WEBLINKS_TOPTEN_STYLE_1', '���������: ��� ���������');

    define('_MI_WEBLINKS_TOPTEN_LINKS', '������������ ���������� ������ ������� ������');
    define('_MI_WEBLINKS_TOPTEN_LINKS_DSC', '������� ������������ ���������� ������, ������� ����� ������������ � "���������� ����" � "������ ����". ');

    define('_MI_WEBLINKS_TOPTEN_CATS', '������������ ���������� ��������� � ������ �������');
    define(
        '_MI_WEBLINKS_TOPTEN_CATS_DSC',
        '������� ������������ ���������� ���������, ������� ����� ������������ � "���������� ����" � "������ ����". <br>���������� ����-���, ���� ������� ����� ������� ��������� �������'
    );

    // 2006-03-26
    // REQ 3807: Main Page Introductory Text
    //define('_MI_WEBLINKS_INDEX_DESC','Main Page Introductory Text');
    //define('_MI_WEBLINKS_INDEX_DESC_DSC', 'You can use this section to display some descriptive or introductory text. HTML is allowed.');
    //define('_MI_WEBLINKS_INDEX_DESC_DEFAULT', '<div align="center"><font color="blue">Here is where your page introduction goes.<br>You can edit it at "Module Configuration 2".</font><br></div>');

    // 2006-05-15
    define('_MI_WEBLINKS_ADMENU0', '�������');

    // 2006-11-03
    // random block
    define('_MI_WEBLINKS_BNAME_RANDOM', '��������� ������');
    define('_MI_WEBLINKS_BNAME_GENERIC', '����� ���� ������');

    // 2007-04-08
    define('_MI_WEBLINKS_BNAME_RANDOM_PHOTO', '��������� ����������');

    // 2007-09-01
    // notification: new_link_admin
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_ADMIN', '[�����������������] ����� ������ (� ������������ ��� ��������������)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_ADMIN_CAP', '[�����������������] ���������� ����, ����� ������������ �����-���� ����� ������ (� ������������ ��� ��������������)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_ADMIN_DSC', '�������� ����������, ����� ������������ �����-���� ����� ������ (� ������������ ��� ��������������)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_ADMIN_SBJ', '[{X_SITENAME}] {X_MODULE} ����-���������� : ����� ������');

    // notification: new_link_comment
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_COMMENT', '[�����������������] ����� ������ (���� ������ ����������� ��� �������������� )');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_COMMENT_CAP', '[�����������������] ���������� ����, ����� ������������ �����-���� ����� ������ (���� ������ ����������� ��� ��������������)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_COMMENT_DSC', '�������� ����������, ����� ������������ �����-���� ����� ������ (���� ������ ����������� ��� ��������������)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_COMMENT_SBJ', '[{X_SITENAME}] {X_MODULE} ����-���������� : ����� ������)');
}// --- define language begin ---
