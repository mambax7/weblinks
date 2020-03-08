<?php
// $Id: main.php,v 1.1 2012/04/09 10:21:09 ohwada Exp $

// 2008-02-17 K.OHWADA
// pagerank, pagerank_update

// 2007-11-01 K.OHWADA
// _WEBLINKS_ERROR_LENGTH
// remove _WEBLINKS_INIT_NOT

// 2007-09-01 K.OHWADA
// waiting list
// change _WLS_NOTIFYAPPROVE

// 2007-08-01 K.OHWADA
// _WEBLINKS_GM_CURRENT_ADDRESS
// <br> => <br>

// 2007-04-08 K.OHWADA
// _WEBLINKS_GM_TYPE

// 2007-03-25 K.OHWADA
// _WEBLINKS_ALBUM_ID

// 2007-02-20 K.OHWADA
// forum

// 2007-01-20 K.OHWADA
// _WEBLINKS_CAT_AUX_TEXT_1

// 2006-12-11 K.OHWADA
// google map: googleGeocode
// _WEBLINKS_TIME_PUBLISH

// 2006-11-26 K.OHWADA
// google map: JP Geocode

// 2006-11-04 K.OHWADA
// google map: JP inverse Geocoder
// google map: inline mode

// 2006-10-01 K.OHWADA
// conflict with rssc
// add _WEBLINKS_RSSC_LID
// google map

// 2006-05-15 K.OHWADA
// weblinks ver 1.1
// _WEBLINKS_MID, etc

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//=========================================================
// WebLinks Module
// language main
// 2004-10-24 K.OHWADA
//=========================================================
// _LANGCODE: ru
// _CHARSET : cp1251
// Translator: Houston (Contour Design Studio https://www.cdesign.ru/)

// --- define language begin ---
if (!defined('WEBLINKS_LANG_MB_LOADED')) {
    define('WEBLINKS_LANG_MB_LOADED', 1);

    //---------------------------------------------------------
    // same as mylinks
    //---------------------------------------------------------

    //======     singlelink.php ======
    define('_WLS_CATEGORY', '���������');
    define('_WLS_HITS', '���������');
    define('_WLS_RATING', '������');
    define('_WLS_VOTE', '�����');
    define('_WLS_ONEVOTE', '1 �����');
    define('_WLS_NUMVOTES', '%s �������');
    define('_WLS_RATETHISSITE', '������� ���� ����');
    define('_WLS_REPORTBROKEN', '�������� � ������������ ������');
    define('_WLS_TELLAFRIEND', '���������� �������');
    define('_WLS_EDITTHISLINK', '������������� ��� ������');
    define('_WLS_MODIFY', '��������');

    //======    submit.php  ======
    define('_WLS_SUBMITLINKHEAD', '��������� ����� ������');
    define('_WLS_SUBMITONCE', '����������� ���� ������ ������ ���� ���.');
    define('_WLS_DONTABUSE', '��� ������������ � IP ��������, �������, ����������, �� ��������������� ��������.');
    define('_WLS_TAKESHOT', '�� ������� ������ ������ ������ ���-����� � ��� ����� ������ ��������� ���� ��� ������ ������ ���-�����, ����� �������� ��� � ���� ���� ������.');
    define('_WLS_ALLPENDING', '������������ ������ ���������������� � ����� ������������ ����� ��������. ');
    //define("_WLS_WHENAPPROVED","You'll receive an E-mail when it's approved.");
    define('_WLS_RECEIVED', '�� �������� ���������� � ����� ���-�����. �������!');

    //======    modlink.php ======
    define('_WLS_REQUESTMOD', '������ ��������� ������');
    define('_WLS_THANKSFORINFO', '������� �� ����������. �� ���������� ��� ������ � ��������� �����.');

    define('_WLS_THANKSFORHELP', '�������, ��� ��������� � ���������� ��������.');
    define('_WLS_FORSECURITY', '�� ������������ ������������ ���� ��� ������������ � IP ����� ����� �������� ��������.');

    define('_WLS_SEARCHFOR', '����� ���'); //-no use
    define('_WLS_ANY', '�����');
    define('_WLS_SEARCH', '�����');

    //define("_WLS_MAIN","Main");
    define('_WLS_SUBMITLINK', '��������� ������');
    define('_WLS_POPULAR', '����������');
    define('_WLS_TOPRATED', '������');

    define('_WLS_NEWTHISWEEK', '����� �� ���� ������');
    define('_WLS_UPTHISWEEK', '����������� �� ���� ������');

    define('_WLS_POPULARITYLTOM', '������������ (�� ���������� � ���������� ����������)');
    define('_WLS_POPULARITYMTOL', '������������ (�� ���������� � ���������� ����������)');
    define('_WLS_TITLEATOZ', '��������� (�� � �� �)');
    define('_WLS_TITLEZTOA', '��������� (�� � �� �)');
    define('_WLS_DATEOLD', '���� (������ ������ ������������ �������)');
    define('_WLS_DATENEW', '���� (����� ������ ������������ �������)');
    define('_WLS_RATINGLTOH', '������ (�� ���������� ������ � ���������� ������)');
    define('_WLS_RATINGHTOL', '������ (�� ���������� ������ � ���������� ������)');
    define('_WLS_TIMEPUBLISHNEW', '���� ���������� (������ ������ ������������ �������)');
    define('_WLS_TIMEPUBLISHOLD', '���� ���������� (����� ������ ������������ �������)');

    //define("_WLS_NOSHOTS","No Screenshots Available");
    //define("_WLS_DESCRIPTIONC","Description: ");
    //define("_WLS_EMAILC","Email: ");
    //define("_WLS_CATEGORYC","Category: ");
    //define("_WLS_LASTUPDATEC","Last Update: ");
    //define("_WLS_HITSC","Hits: ");
    //define("_WLS_RATINGC","Rating: ");

    define('_WLS_THEREARE', '������� <b>%s</b> ������ � ����� ���� ������');
    define('_WLS_LATESTLIST', '��������� ������');

    //define("_WLS_LINKID","Link ID: ");
    //define("_WLS_SITETITLE","Website Title: ");
    //define("_WLS_SITEURL","Website URL: ");
    //define("_WLS_OPTIONS","Options: ");
    define('_WLS_LINKID', 'ID ������');
    define('_WLS_SITETITLE', '��������� ���-�����');
    define('_WLS_SITEURL', '����� ���-�����');
    define('_WLS_OPTIONS', '�����');

    define('_WLS_NOTIFYAPPROVE', '�������� ���, ����� ��� ������ ����� ���������� ��� ���������');
    //define("_WLS_SHOTIMAGE","Screenshot Img: ");
    define('_WLS_SENDREQUEST', '��������� ������');

    define('_WLS_VOTEAPPRE', '��� ����� ������.');
    define('_WLS_THANKURATE', '�������, ��� ����� �����, ����� ������� ���� �����, � %s.');
    define('_WLS_VOTEFROMYOU', '����� �������������, �����, ��� ������ ���� ������� ������ ����������� ����� ������, ����� ������ �������.');
    define('_WLS_VOTEONCE', '���������� �� ��������� �� ���� � ��� �� ������ ����� ������ ����.');
    define('_WLS_RATINGSCALE', '������ �� 10-������� �������. 1 - �����, 10 - �������.');
    define('_WLS_BEOBJECTIVE', '����������, ������ ����������, ���� ������ ����� ��������� 1 ��� 10, �� ������� �� ����� ��������.');
    define('_WLS_DONOTVOTE', '���������� �� ��������� �� ����������� ������.');
    define('_WLS_RATEIT', '�������!');

    define('_WLS_INTRESTLINK', '���������� ������ ���-����� %s');  // %s is your site name
    define('_WLS_INTLINKFOUND', '��� ���������� ������ ���-�����, ������� � ����� �� %s');  // %s is your site name

    define('_WLS_RANK', '��������');
    define('_WLS_TOP10', '%s ������ 10'); // %s is a link category title

    define('_WLS_SEARCHRESULTS', '���������� ������ ��� <b>%s</b>:'); // %s is search keywords
    define('_WLS_SORTBY', '����������� ��:');
    define('_WLS_TITLE', '���������');
    define('_WLS_DATE', '����');
    define('_WLS_POPULARITY', '������������');
    define('_WLS_PUBLISHED', '���� ����������');
    define('_WLS_CURSORTEDBY', '����� ����������� ��: %s');
    define('_WLS_PREVIOUS', '����������');
    define('_WLS_NEXT', '���������');
    define('_WLS_NOMATCH', '�� ������� ������������ ������ �������');

    define('_WLS_SUBMIT', '���������');
    define('_WLS_CANCEL', '��������');

    define('_WLS_ALREADYREPORTED', '�� ��� ��������� ������ � ������������ ������ ����� �������.');
    define('_WLS_MUSTREGFIRST', '��������, � ��� ��� ���������� �� ���������� ����� ��������.<br>����������, ������� ����������������� ��� �����!');
    define('_WLS_NORATING', '������ �� �������.');
    define('_WLS_CANTVOTEOWN', '�� �� ������ ���������� �� ������, ������� �� ���������.<br>��� ������ ������������ � �������������.');
    define('_WLS_VOTEONCE2', '��������� �� ��������� ������ ������ ���� ���.<br>��� ������ ������������ � �������������.');

    //%%%%%%    Admin     %%%%%

    define('_WLS_WEBLINKSCONF', '������������ ���-������');
    define('_WLS_GENERALSET', '����� ��������� ���-������');
    //define("_WLS_ADDMODDELETE","Add, Modify, and Delete Categories/Links");
    define('_WLS_LINKSWAITING', '����� ������, ��������� ��������');
    define('_WLS_MODREQUESTS', '���������� ������, ��������� ��������');
    define('_WLS_BROKENREPORTS', '������ � ������������ �������');

    //define("_WLS_SUBMITTER","Submitter: ");
    define('_WLS_SUBMITTER', '�����������');

    define('_WLS_VISIT', '��������');

    //define("_WLS_SHOTMUST","Screenshot image must be a valid image file under %s directory (ex. shot.gif). Leave it blank if no image file.");
    define('_WLS_LINKIMAGEMUST', ' Enter link image fie name under %s directory. (e.g. shot.gif) Leave the field blank if there is no image file. ');

    define('_WLS_APPROVE', '���������');
    define('_WLS_DELETE', '�������');
    define('_WLS_NOSUBMITTED', '��� ����� ������������ ������.');
    define('_WLS_ADDMAIN', '�������� ������� ���������');
    define('_WLS_TITLEC', '���������: ');
    define('_WLS_IMGURL', '����� ����������� (������������� ������ ����������� �������� �� 50): ');
    define('_WLS_ADD', '��������');
    define('_WLS_ADDSUB', '�������� ������������');
    define('_WLS_IN', '�');
    define('_WLS_ADDNEWLINK', '�������� ����� ������');
    define('_WLS_MODCAT', '�������� ���������');
    define('_WLS_MODLINK', '�������� ������');
    define('_WLS_TOTALVOTES', '������� ������ (����� �������: %s)');
    define('_WLS_USERTOTALVOTES', '������� ������������������ ������������� (����� �������: %s)');
    define('_WLS_ANONTOTALVOTES', '������� ��������� ������������� (����� �������: %s)');
    define('_WLS_USER', '������������');
    define('_WLS_IP', 'IP-�����');
    define('_WLS_USERAVG', '������� ������ ������������');
    define('_WLS_TOTALRATE', '����� ������');
    define('_WLS_NOREGVOTES', '��� ������� ������������������ �������������');
    define('_WLS_NOUNREGVOTES', '��� ������� �������������������� �������������');
    define('_WLS_VOTEDELETED', '������ ����������� �������.');
    define('_WLS_NOBROKEN', '�� ���������� � ������������ �������.');
    define('_WLS_IGNOREDESC', '������������ (���������� ����� � ������� ������ <b>����� � ������������ ������</b>)');
    define('_WLS_DELETEDESC', '������� (������� <b>���������� ������ ���-�����</b> � <b>����� � ������������ ������</b> ��� ������.)');
    define('_WLS_REPORTER', '����������� ������');

    define('_WLS_IGNORE', '���������');
    define('_WLS_LINKDELETED', '������ �������.');
    define('_WLS_BROKENDELETED', '����� � ������������ ������ ������.');
    //define("_WLS_USERMODREQ","User Link Modification Requests");
    define('_WLS_ORIGINAL', '���������');
    define('_WLS_PROPOSED', '������������');
    define('_WLS_OWNER', '��������');
    define('_WLS_NOMODREQ', '��� ������� �� ��������� ������.');
    define('_WLS_DBUPDATED', '���� ������ ��������� �������!');
    define('_WLS_MODREQDELETED', '������ �� ��������� ������.');
    define('_WLS_IMGURLMAIN', '����� ����������� (������������� � ������������� ������ ��� ������� ���������. ������ ����������� �������� �� 50): ');
    define('_WLS_PARENT', '������������ ���������:');
    define('_WLS_SAVE', '��������� ���������');
    define('_WLS_CATDELETED', '��������� �������.');
    define('_WLS_WARNING', '��������������: �� �������, ��� ������ ������� ��� ��������� � ��� ������ � ����������� � ���?');
    define('_WLS_YES', '��');
    define('_WLS_NO', '���');
    define('_WLS_NEWCATADDED', '����� ��������� ������� ���������!');
    //define("_WLS_ERROREXIST","ERROR: The Link you provided is already in the database!");
    //define("_WLS_ERRORTITLE","ERROR: You need to enter a TITLE!");
    //define("_WLS_ERRORDESC","ERROR: You need to enter a DESCRIPTION!");
    define('_WLS_NEWLINKADDED', '����� ������ ��������� � ���� ������New Link added to the Database.');
    define('_WLS_YOURLINK', '������ ������ ���-����� �� %s');
    define('_WLS_YOUCANBROWSE', '�� ������ ����������� ���� ���-������ �� %s');
    define('_WLS_HELLO', '������������ %s');
    define('_WLS_WEAPPROVED', '�� ��������� ������������ ���� ������ � ����� ���� ������ ���-������.');
    define('_WLS_THANKSSUBMIT', '������� �� ���� �����������!');
    define('_WLS_ISAPPROVED', '�� ��������� ������������ ���� ������');

    //---------------------------------------------------------
    // weblinks
    //---------------------------------------------------------

    //======    index.php   ======
    // guidance bar
    define('_WLS_SUBMIT_NEW_LINK', '��������� ����� ������');
    define('_WLS_SITE_POPULAR', '���������� ����');
    define('_WLS_SITE_HIGHRATE', '������ ����');
    define('_WLS_SITE_NEW', '��������� ����');
    define('_WLS_SITE_UPDATE', '����������� ����');

    // corrected typo
    define('_WLS_SITE_RECOMMEND', '��������������� ����');

    // BUG 3032: "mutual site" is not suitable English
    define('_WLS_SITE_MUTUAL', '������ ����');

    define('_WLS_SITE_RANDOM', '��������� ����');
    define('_WLS_NEW_SITELIST', '��������� ����');
    define('_WLS_NEW_ATOMFEED', '��������� RSS/ATOM �����');
    define('_WLS_SITE_RSS', 'RSS/ATOM ����');
    define('_WLS_ATOMFEED', 'RSS/ATOM �����');

    define('_WLS_LASTUPDATE', '��������� ����������');
    define('_WLS_MORE', '���������');

    //======     singlelink.php ======
    define('_WLS_DESCRIPTION', '��������');
    define('_WLS_PROMOTER', '���������');
    define('_WLS_ZIP', '�������� ������');
    define('_WLS_ADDR', '�����');
    define('_WLS_TEL', '����� ��������');
    define('_WLS_FAX', '����� �����');

    //======     submit.php ======
    define('_WLS_BANNERURL', '����� �������');
    define('_WLS_NAME', '���');
    define('_WLS_EMAIL', '����������� �����');
    define('_WLS_COMPANY', '��������/�����������');
    define('_WLS_STATE', '������');
    define('_WLS_CITY', '�����');
    define('_WLS_ADDR2', '����� 2');
    define('_WLS_PUBLIC', '������������');
    define('_WLS_NOTPUBLIC', '�� ��������������');
    define('_WLS_NOTSELECT', '�� ����������');
    define('_WLS_SUBMIT_INDISPENSABLE', "������� ���������� '<b>*</b>' �������� ������������ �����.");
    define(
        '_WLS_SUBMIT_USER_COMMENT',
        '"����������� ��������������" ������� ������������ ��� ������, ������� � �.�.<br>���� ������� �� ������������ �� ���.<br>����������, ��������� ����� ������ ����� � ��� ��� ������� � ���� ������, ���� �� ������ �������� ��� ��� "������ ����".'
    );
    define('_WLS_USER_COMMENT', '����������� ��������������');
    define('_WLS_NOT_DISPLAY', '���� ������� �� ������������ �� ���.');

    //======    modlink.php ======
    define('_WLS_MODIFYAPPROVED', '������ ��������� ����� ������ ���� ����������. ');
    define('_WLS_MODIFY_NOT_OWNER', '����������, ���������, ��� �� �������, ������� ���������� ��������� ������.');
    define('_WLS_MODIFY_PENDING', '��������� ������ ��������. ��� ����� ������������ ����� ��������.');
    define('_WLS_LINKSUBMITTER', '����������� ������');

    //======    user.php    ======
    define('_WLS_PLEASEPASSWORD', '������� ��� ������');
    define('_WLS_REGSTERED', '������������������ ������������');
    define('_WLS_REGSTERED_DSC', '��� ������ ����� �������� ���������� ������. <br>���-������ �������� ��������� ����� �����������.');
    define('_WLS_EMAILNOTFOUND', '����� ����������� ����� �� �������������.');

    // error message
    define('_WLS_ERROR_FILL', '������: ������� %s');
    define('_WLS_ERROR_ILLEGAL', '������: ������������ ������ %s');
    define('_WLS_ERROR_CID', '������: �������� ���������');
    define('_WLS_ERROR_URL_EXIST', '������: ������ ��� ���� ����������������. ');
    define('_WLS_WARNING_URL_EXIST', '��������������: ������� ������ ��� ���� ����������������. ');
    define('_WLS_ERRORNOLINK', '������: �� ������� ����� ������');

    define('_WLS_CATLIST', '������ ���������');
    define('_WLS_LINKIMAGE', '����������� ������: ');
    //define("_WLS_USERID","User ID: ");
    define('_WLS_CATEGORYID', 'ID ���������: ');
    //define("_WLS_CREATEC","Registration Date: ");
    define('_WLS_TIMEUPDATE', '��������');
    define('_WLS_NOTTIMEUPDATE', '�� ���������');
    define('_WLS_LINKFLAG', '��������� ������ ��� ���� ');
    define('_WLS_NOTLINKFLAG', '�� ��������� ������ ��� ����');
    define('_WLS_GOTOADMIN', '������� � �������� �����������������');

    // category delete
    define('_WLS_DELCAT', '������� ���������');
    define('_WLS_SUBCATEGORY', '������������');
    define('_WLS_SUBCATEGORY_NON', '��� ������������');
    define('_WLS_LINK_BELONG', '��������� ������');
    define('_WLS_LINK_BELONG_NUMBER', '���������� ��������� ������');
    define('_WLS_LINK_BELONG_NON', '��� ��������� ������');
    define('_WLS_LINK_MAYBE_DELETE', '������ ��� ��������');
    define('_WLS_LINK_MAYBE_DELETE_DSC', '���������� �������� ����� ����������, ���� ���� ������������. ��������� ������ ������ ����� ���� �������. ');
    define('_WLS_LINK_DELETE_NON', '��� ������ ��� ��������');
    define('_WLS_CATEGORY_LINK_DELETE_EXCUTE', '������� ��������� � ��������� ������');
    define('_WLS_CATEGORY_LINK_DELETED', '��������� � ��������� ������ ���� �������.');
    define('_WLS_CATEGORY_DELETED', '��������� ���������');
    define('_WLS_LINK_DELETED', '��������� ������');

    define('_WLS_ERROR_CATEGORY', '������: ��������� �� �������Category is not selected');
    define('_WLS_ERROR_MAX_SUBCAT', '������: ���������� ��������� ��������� ��������� �������� ��� �������� �� ���� ���');
    define('_WLS_ERROR_MAX_LINK_BELONG', '������: ���������� ��������� ��������� ��������������� �������� ��� �������� �� ���� ���. ');
    define('_WLS_ERROR_MAX_LINK_DEL', '������: ���������� ��������� ������ ��������� ��������  ��� �������� �� ���� ���.');

    // recommend site, mutual site
    define('_WLS_MARK', '�������');
    define('_WLS_ADMINCOMMENT', '����������� ��������������');

    // broken link check
    define('_WLS_BROKEN_COUNTER', '������� ������������ ������');

    // RSS/ATOM URL
    define('_WLS_RSS_URL', '����� RSS/ATOM');
    define('_WLS_RSS_URL_0', '�� ������������');
    define('_WLS_RSS_URL_1', '��� RSS');
    define('_WLS_RSS_URL_2', '��� ATOM');
    define('_WLS_RSS_URL_3', '�������������� �����������');

    define('_WLS_ATOMFEED_DISTRIBUTE', '���������������� RSS/ATOM ������ ������������ �����.');
    define(
        '_WLS_ATOMFEED_FIREFOX',
        "���� �� ����������� <a href='https://www.mozilla.org/products/firefox/' target='_blank'>Firefox</a>, �������� �������� ���� ��������, ��� ��������� ������ RSS/ATOM ������. "
    );

    // 2005-10-20
    define('_WLS_EMAIL_APPROVE', '����������, ���� ����������');
    define('_WLS_TOPTEN_TITLE', '%s ������ %u');
    // %s is a link category title
    // %u is number of links
    define('_WLS_TOPTEN_ERROR', '������� ����� ������� ���������. �����������, ����� �������� �� %u');
    // %u is munber of categories

    // 2006-04-02
    define('_WEBLINKS_MID', '�������� ID');
    define('_WEBLINKS_USERID', 'ID ������������');
    define('_WEBLINKS_CREATE', '�������');

    // conflict with rssc
    //define('_HOME',  'Home');
    //define('_SAVE',  'Save');
    //define('_SAVED', 'Saved');
    //define('_CREATE', 'Create');
    //define('_CREATED','Created');
    //define('_FINISH',   'Finish');
    //define('_FINISHED', 'Finished');
    //define('_EXECUTE', 'Execute');
    //define('_EXECUTED','Executed');
    //define('_PRINT','Print');
    //define('_SAMPLE','Sample');

    define('_NO_MATCH_RECORD', '��� ��������������� ������');
    define('_MANY_MATCH_RECORD', '���� ��� ��� ����� �������������� ������');
    define('_NO_CATEGORY', '��� ���������');
    define('_NO_LINK', '��� ������');
    define('_NO_TITLE', '��� ���������');
    define('_NO_URL', '��� ������');
    define('_NO_DESCRIPTION', '��� ��������');

    //define('_GOTO_MAIN',   'Go to Main');
    //define('_GOTO_MODULE', 'Go to Module');

    // config
    //define('_WEBLINKS_INIT_NOT', 'The config table is not initialized');
    //define('_WEBLINKS_INIT_EXEC', 'Config Table Initialized');
    //define('_WEBLINKS_VERSION_NOT','This module is not version  %s yet. Update now');
    //define('_WEBLINKS_UPGRADE_EXEC','Upgrade the config table');

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

    // === 2006-10-01 ===
    // conflict with rssc
    //if( !defined('_SAVE') )
    //{
    //  define('_HOME',  'Home');
    //  define('_SAVE',  'Save');
    //  define('_SAVED', 'Saved');
    //  define('_CREATE', 'Create');
    //  define('_CREATED','Created');
    //  define('_EXECUTE', 'Execute');
    //  define('_EXECUTED','Executed');
    //}

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

    // google map: hacked by wye <https://never-ever.info/>
    define('_WEBLINKS_GM_LATITUDE', '������');
    define('_WEBLINKS_GM_LONGITUDE', '�������');
    define('_WEBLINKS_GM_ZOOM', '������� ����������');
    define('_WEBLINKS_GM_GET_LOCATION', '���������� � ��������������, ���������� � ���� Google');
    //define('_WEBLINKS_GM_GET_BUTTON', 'Get Latitude/Longitude/Zoom');
    define('_WEBLINKS_GM_DEFAULT_LOCATION', '�������������� �� ���������');
    define('_WEBLINKS_GM_CURRENT_LOCATION', '������� ��������������');

    // === 2006-11-04 ===
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

    // === 2006-12-11 ===
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

    // === 2007-02-20 ===
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

    // === 2007-03-25 ===
    define('_WEBLINKS_ALBUM_ID', 'ID �������');
    define('_WEBLINKS_ALBUM_SEL', '�������� ������');

    // === 2007-04-08 ===
    define('_WEBLINKS_GM_TYPE', '��� ����� Google');
    define('_WEBLINKS_GM_TYPE_MAP', '�����');
    define('_WEBLINKS_GM_TYPE_SATELLITE', '�������');
    define('_WEBLINKS_GM_TYPE_HYBRID', '������');

    // === 2007-08-01 ===
    define('_WEBLINKS_GM_CURRENT_ADDRESS', '������� �����');
    define('_WEBLINKS_GM_SEARCH_LIST', '������ ����������� ������');

    // === 2007-09-01 ===
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

    // === 2007-11-01 ===
    define('_WEBLINKS_ERROR_LENGTH', '������: %s ������ ���� ������, ��� %s ��������');

    // === 2008-02-17 ===
    // linkitem
    define('_WEBLINKS_PAGERANK', '�������� ��������');
    define('_WEBLINKS_PAGERANK_UPDATE', '����� ���������� �������� ��������');
    define('_WEBLINKS_GM_KML_DEBUG', '������� KML');

    // gmap
    define('_WEBLINKS_SITE_GMAP', '���� ���� Google');
    define('_WEBLINKS_KML_LIST', '������ KML');
    define('_WEBLINKS_KML_LIST_DESC', '������� KML � �������� � ����� Google');
    define('_WEBLINKS_KML_PERPAGE', '����� �����������');

    // pagerank
    define('_WEBLINKS_SITE_PAGERANK', '���� � ������� ��������� ��������');

    define('_WEBLINKS_FROM', '��');     // From
    define('_WEBLINKS_EXECUTION_TIME', '����� ����������');     // execution time
    define('_WEBLINKS_MEMORY_USAGE', '������������� ������');       // memory usage
    define('_WEBLINKS_SEC', '���');     // sec
    define('_WEBLINKS_MB', '��');       // MB
    define('_WEBLINKS_FILE', '����');       //file

    define('_WEBLINKS_RDF_FEED', 'RDF �����');      //RDF feed
    define('_WEBLINKS_RSS_FEED', 'RSS �����');      //RSS feed
    define('_WEBLINKS_ATOM_FEED', 'ATOM �����');        //ATOM feed
    define('_WEBLINKS_NOFEED', '��� ������');       //No Feed
    define('_WEBLINKS_IN', '�');        //in
}// --- define language end ---
