<?php

// $Id: main.php,v 1.1 2011/12/29 14:32:44 ohwada Exp $

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

// --- define language begin ---
if (!defined('WEBLINKS_LANG_MB_LOADED')) {
    define('WEBLINKS_LANG_MB_LOADED', 1);

    //---------------------------------------------------------
    // same as mylinks
    //---------------------------------------------------------

    //======         singlelink.php        ======
    define('_WLS_CATEGORY', '�����');
    define('_WLS_HITS', '��������');
    define('_WLS_RATING', '�������');
    define('_WLS_VOTE', '�������');
    define('_WLS_ONEVOTE', '��� ����');
    define('_WLS_NUMVOTES', '%s ���');
    define('_WLS_RATETHISSITE', '���� ��� ������');
    define('_WLS_REPORTBROKEN', '������ �� ���� �� ����');
    define('_WLS_TELLAFRIEND', '���� ����');
    define('_WLS_EDITTHISLINK', '����� ��� ������');
    define('_WLS_MODIFY', '�����');

    //======        submit.php        ======
    define('_WLS_SUBMITLINKHEAD', '����� ���� �����');
    define('_WLS_SUBMITONCE', '���� ����� ��� �����');
    define('_WLS_DONTABUSE', '�� ��� ����� �� ���� �� ���� �� ���� ������.');
    define('_WLS_TAKESHOT', '��� ���� ���� ����� �� ������ ���� ����� ��� ��� ���� �������� ��� ����� ��������.');
    define('_WLS_ALLPENDING', '��� ��� ������� �� ������ ��� ����� ');
    //define("_WLS_WHENAPPROVED","��� ���� �� ���� �� ���� ��������.");
    define('_WLS_RECEIVED', '��� ������ ������� ����� ���� ��!');

    //======        modlink.php        ======
    define('_WLS_REQUESTMOD', '��� �� ����� ����');
    define('_WLS_THANKSFORINFO', '���� ���� ��������� , ��� ��� ���� �� ���� ���.');

    define('_WLS_THANKSFORHELP', '���� �������� ������ ����� ��� ������.');
    define('_WLS_FORSECURITY', '������ ����� ����� ������ �� �� ���� ���� ������� ���� ����.');

    define('_WLS_SEARCHFOR', '��� ��'); //-no use
    define('_WLS_ANY', '��');
    define('_WLS_SEARCH', '���');

    //define("_WLS_MAIN","Main");
    define('_WLS_SUBMITLINK', '���� ����');
    define('_WLS_POPULAR', '�������');
    define('_WLS_TOPRATED', '���� �����');

    define('_WLS_NEWTHISWEEK', '���� �������');
    define('_WLS_UPTHISWEEK', '���� ��� �������');

    define('_WLS_POPULARITYLTOM', '������ ����� (��� ��� ���� ������)');
    define('_WLS_POPULARITYMTOL', '������ ����� (���� ��� ��� ������)');
    define('_WLS_TITLEATOZ', '������� (� ��� �)');
    define('_WLS_TITLEZTOA', '������� (� ��� �)');
    define('_WLS_DATEOLD', '������� (������� ������� ����)');
    define('_WLS_DATENEW', '������� (������� ������� ����)');
    define('_WLS_RATINGLTOH', '������ (�� ����� ��� ������)');
    define('_WLS_RATINGHTOL', '������� (�� ������ ��� �����)');

    //define("_WLS_NOSHOTS","�� ���� ���� ������");
    //define("_WLS_DESCRIPTIONC","�����: ");
    //define("_WLS_EMAILC","������: ");
    //define("_WLS_CATEGORYC","�����: ");
    //define("_WLS_LASTUPDATEC","��� �����: ");
    //define("_WLS_HITSC","��������: ");
    //define("_WLS_RATINGC","������: ");

    define('_WLS_THEREARE', '���� <b> %s </b> ����� �� ����� ��������');
    define('_WLS_LATESTLIST', '��� �������');

    //define("_WLS_LINKID","��� ������: ");
    //define("_WLS_SITETITLE","��� ������: ");
    //define("_WLS_SITEURL","����� ������: ");
    //define("_WLS_OPTIONS","������: ");
    define('_WLS_LINKID', '��� ������');
    define('_WLS_SITETITLE', '��� ������');
    define('_WLS_SITEURL', '����� ������');
    define('_WLS_OPTIONS', '������');

    define('_WLS_NOTIFYAPPROVE', '������ ��� ��� �������� ��� ������');
    //define("_WLS_SHOTIMAGE","���� �����: ");
    define('_WLS_SENDREQUEST', '���� ���');

    define('_WLS_VOTEAPPRE', '���� ��� �������');
    define('_WLS_THANKURATE', '���� �� ����� ��� ������ %s.');
    define('_WLS_VOTEFROMYOU', '������ �������  ���� ��� ��� ������ ������ ��� ����� �� ���� ��������.');
    define('_WLS_VOTEONCE', '���� �� ����� ������ ���� �� ���');
    define('_WLS_RATINGSCALE', '�� ����� ��������� �� 1 ��� 10� ��1 ���� ���� �10 ���� �����.');
    define('_WLS_BEOBJECTIVE', '���� �� ���ݡ ��� ����� �� ����  1 ��  10� ��� ��������� ���� ����� ���.');
    define('_WLS_DONOTVOTE', '�� ����� ������ ������.');
    define('_WLS_RATEIT', '�����!');

    define('_WLS_INTRESTLINK', '���� ���� ����� �� %s');  // %s is your site name
    define('_WLS_INTLINKFOUND', '��� ���� ���� ��� ���� ���� �� %s');  // %s is your site name

    define('_WLS_RANK', '�������');
    define('_WLS_TOP10', '%s Top 10'); // %s is a link category title

    define('_WLS_SEARCHRESULTS', '����� ����� �� <b>%s</b>:'); // %s is search keywords
    define('_WLS_SORTBY', '����� ���:');
    define('_WLS_TITLE', '�������');
    define('_WLS_DATE', '�������');
    define('_WLS_POPULARITY', '������ �����');
    define('_WLS_CURSORTEDBY', '������� ������ ����� ���: %s');
    define('_WLS_PREVIOUS', '������');
    define('_WLS_NEXT', '������');
    define('_WLS_NOMATCH', '�� ���� ������ �� ����');

    define('_WLS_SUBMIT', '�����');
    define('_WLS_CANCEL', '�����');

    define('_WLS_ALREADYREPORTED', '��� ���� ������ ����� �� ��� �����');
    define('_WLS_MUSTREGFIRST', '��ݡ ��� ���� ����� ����� ��� �������. <br> ���� ���� �� ���� ����!');
    define('_WLS_NORATING', '�� ���� ���� ����');
    define('_WLS_CANTVOTEOWN', ' �� ����� ������� ��� �����. <br> ��� ������� ����� ������.');
    define('_WLS_VOTEONCE2', '���� ����� ������ ��� �����. <br> ��� ������� ����� ������.');

    //%%%%%%        Admin          %%%%%

    define('_WLS_WEBLINKSCONF', '������ ����� �����');
    define('_WLS_GENERALSET', '������ ������� ������');
    //define("_WLS_ADDMODDELETE","Add, Modify, and Delete Categories/Links");
    define('_WLS_LINKSWAITING', '������� ������� ���� ����� ��������');
    define('_WLS_MODREQUESTS', '������� ������� ���� ����� ��������');
    define('_WLS_BROKENREPORTS', '������ ������� ���� �� ����');

    //define("_WLS_SUBMITTER","Submitter: ");
    define('_WLS_SUBMITTER', '������');

    define('_WLS_VISIT', '�����');

    //define("_WLS_SHOTMUST","Screenshot image must be a valid image file under %s directory (ex. shot.gif). Leave it blank if no image file.");
    define('_WLS_LINKIMAGEMUST', ' ���� ��� ��� ���� ������ ��� ���� %s . (���� ��� ���: - shot.gif) ���� ����� ���� ��� ��� ���� ��� ������.');

    define('_WLS_APPROVE', '������');
    define('_WLS_DELETE', '���');
    define('_WLS_NOSUBMITTED', '�� ���� ����� ����� �����.');
    define('_WLS_ADDMAIN', '��� ��� �����');
    define('_WLS_TITLEC', '�������: ');
    define('_WLS_IMGURL', '����� ������ (������ ������ ��� ���� ������ ��� 50): ');
    define('_WLS_ADD', '���');
    define('_WLS_ADDSUB', '��� ��� ����');
    define('_WLS_IN', '��');
    define('_WLS_ADDNEWLINK', '����� ���� �����');
    define('_WLS_MODCAT', '����� ���');
    define('_WLS_MODLINK', '����� ����');
    define('_WLS_TOTALVOTES', '����� ������� (����� ���������: %s)');
    define('_WLS_USERTOTALVOTES', '����� ������� �������� (����� ���������: %s)');
    define('_WLS_ANONTOTALVOTES', '����� ������ (����� ���������: %s)');
    define('_WLS_USER', '���');
    define('_WLS_IP', '��� ���� ��');
    define('_WLS_USERAVG', '����� ������');
    define('_WLS_TOTALRATE', '����� ������');
    define('_WLS_NOREGVOTES', '�� ���� ���� ������');
    define('_WLS_NOUNREGVOTES', '�� ���� ���� ������');
    define('_WLS_VOTEDELETED', '������ ������� ����.');
    define('_WLS_NOBROKEN', '�� ���� ������ �� ����� �� ����.');
    define('_WLS_IGNOREDESC', '���� (����� ������� ���� ��� <b> ����� ������� ���� �� ���� </b>) ');
    define('_WLS_DELETEDESC', '���� (��� <b> ������ ������ ������� ���� </b> �<b> ������ ������� ���� �� ���� </b> ������.)');
    define('_WLS_REPORTER', '����� ����');

    define('_WLS_IGNORE', '���');
    define('_WLS_LINKDELETED', '��� ������.');
    define('_WLS_BROKENDELETED', '����� �� ������ ���� �� ���� ���.');
    //define("_WLS_USERMODREQ","User Link Modification Requests");
    define('_WLS_ORIGINAL', '����');
    define('_WLS_PROPOSED', '�����');
    define('_WLS_OWNER', '������');
    define('_WLS_NOMODREQ', '�� ���� ��� ����� ����.');
    define('_WLS_DBUPDATED', '�� ����� ����� �������� �����!');
    define('_WLS_MODREQDELETED', '��� ����� ����.');
    define('_WLS_IMGURLMAIN', '����� ������ ( ��������: ���� ������� ��������. ������ ���� ����� ������ ��� 50):');
    define('_WLS_PARENT', '����� �������');
    define('_WLS_SAVE', '��� ��������');
    define('_WLS_CATDELETED', '����� ���.');
    define('_WLS_WARNING', '�����: �� ��� ����� ��� ���� ��� ����� ��� ������� ���������ǿ');
    define('_WLS_YES', '���');
    define('_WLS_NO', '��');
    define('_WLS_NEWCATADDED', '�� ����� ����� �����!');
    //define("_WLS_ERROREXIST","ERROR: The Link you provided is already in the database!");
    //define("_WLS_ERRORTITLE","ERROR: You need to enter a TITLE!");
    //define("_WLS_ERRORDESC","ERROR: You need to enter a DESCRIPTION!");
    define('_WLS_NEWLINKADDED', '����� ���� ����� ��� ����� ��������.');
    define('_WLS_YOURLINK', '���� ����� �� %s');
    define('_WLS_YOUCANBROWSE', ' ���� �� ����� ����� ������ �� %s');
    define('_WLS_HELLO', 'Hello %s');
    define('_WLS_WEAPPROVED', '��� ��� �������� ��� ���� ������');
    define('_WLS_THANKSSUBMIT', '���� �������!');
    define('_WLS_ISAPPROVED', '��� ��� �������� ��� ������');

    //---------------------------------------------------------
    // weblinks
    //---------------------------------------------------------

    //======        index.php        ======
    // guidance bar
    define('_WLS_SUBMIT_NEW_LINK', '��� �����');
    define('_WLS_SITE_POPULAR', '������� ������ �����');
    define('_WLS_SITE_HIGHRATE', '���� ������� �������');
    define('_WLS_SITE_NEW', '��� �������');
    define('_WLS_SITE_UPDATE', '������ ������');

    // corrected typo
    define('_WLS_SITE_RECOMMEND', '����� ���� ����');

    // BUG 3032: "mutual site" is not suitable English
    define('_WLS_SITE_MUTUAL', '������� ���������');

    define('_WLS_SITE_RANDOM', '���� ������');
    define('_WLS_NEW_SITELIST', '��� ����');
    define('_WLS_NEW_ATOMFEED', 'Latest RSS/ATOM Feed');
    define('_WLS_SITE_RSS', 'RSS/ATOM Site');
    define('_WLS_ATOMFEED', 'RSS/ATOM Feed');

    define('_WLS_LASTUPDATE', '��� ������');
    define('_WLS_MORE', '���� �� ��������');

    //======         singlelink.php        ======
    define('_WLS_DESCRIPTION', '�����');
    define('_WLS_PROMOTER', '������');
    define('_WLS_ZIP', '����� �������');
    define('_WLS_ADDR', '�������');
    define('_WLS_TEL', '��� �������');
    define('_WLS_FAX', '��� ������');

    //======         submit.php        ======
    define('_WLS_BANNERURL', '����� �����');
    define('_WLS_NAME', '�����');
    define('_WLS_EMAIL', '������');
    define('_WLS_COMPANY', '���� / �����');
    define('_WLS_STATE', '�������');
    define('_WLS_CITY', '�������');
    define('_WLS_ADDR2', '����� 2');
    define('_WLS_PUBLIC', '���');
    define('_WLS_NOTPUBLIC', '��� ���');
    define('_WLS_NOTSELECT', '��� �����');
    define('_WLS_SUBMIT_INDISPENSABLE', "����� ������ ' <b> * </b> ' ���� �������.");
    define('_WLS_SUBMIT_USER_COMMENT', '"����� ��� �������  <br> ��� ������ �� ���� ��� �����. <br> ���� ���� ����� ����� ��� ���� ���� �����ǡ ��� ���  ���� ��� "����� �����".');
    define('_WLS_USER_COMMENT', '����� ������');
    define('_WLS_NOT_DISPLAY', '��� ������ �� ���� ��� �����.');

    //======        modlink.php        ======
    define('_WLS_MODIFYAPPROVED', '��� �������� ��� ����� ����� ');
    define('_WLS_MODIFY_NOT_OWNER', '���� ���� ����� ����� ���� ���� ������ ������.');
    define('_WLS_MODIFY_PENDING', '����� ���� ����. ��� ��� ����� ��� ������ �� ������.');
    define('_WLS_LINKSUBMITTER', '����� �����');

    //======        user.php        ======
    define('_WLS_PLEASEPASSWORD', '���� ����� �����');
    define('_WLS_REGSTERED', '��� ����');
    define('_WLS_REGSTERED_DSC', '�� ��� ���� �� ���� ������� ����. <br> ����� ������ ����� ������� ��� �����.');
    define('_WLS_EMAILNOTFOUND', '������ ������ �� ������');

    // error message
    define('_WLS_ERROR_FILL', '���: ���� %s');
    define('_WLS_ERROR_ILLEGAL', '���: ������ ����� %s');
    define('_WLS_ERROR_CID', '���: ����� �����');
    define('_WLS_ERROR_URL_EXIST', '���: ������ ����� �� ���. ');
    define('_WLS_WARNING_URL_EXIST', '�����: �� ����� ���� ����� �� ���. ');
    define('_WLS_ERRORNOLINK', '���: �� ��� ������ ��� ������');

    define('_WLS_CATLIST', '����� �������');
    define('_WLS_LINKIMAGE', '���� ������: ');
    //define("_WLS_USERID","��� �����: ");
    define('_WLS_CATEGORYID', '��� �����: ');
    //define("_WLS_CREATEC","����� �������: ");
    define('_WLS_TIMEUPDATE', '�����');
    define('_WLS_NOTTIMEUPDATE', '��� �������');
    define('_WLS_LINKFLAG', '����� ����� �� ��� �����');
    define('_WLS_NOTLINKFLAG', '��� ����� ����� �� ��� �����');
    define('_WLS_GOTOADMIN', '������ ��� ���� ������');

    // category delete
    define('_WLS_DELCAT', '��� �����');
    define('_WLS_SUBCATEGORY', '��� ����');
    define('_WLS_SUBCATEGORY_NON', '�� ���� ��� ����');
    define('_WLS_LINK_BELONG', '���� �������');
    define('_WLS_LINK_BELONG_NUMBER', '��� ������� ���������');
    define('_WLS_LINK_BELONG_NON', '�� ���� ����� �������');
    define('_WLS_LINK_MAYBE_DELETE', '����� �����');
    define('_WLS_LINK_MAYBE_DELETE_DSC', '����� ������� �� ����� ��� ���� ����� ����� . ������� ������ �� ����.');
    define('_WLS_LINK_DELETE_NON', '�� ���� ����� ������');
    define('_WLS_CATEGORY_LINK_DELETE_EXCUTE', '��� ����� �� �������');
    define('_WLS_CATEGORY_LINK_DELETED', '�� ��� ����� �� �������.');
    define('_WLS_CATEGORY_DELETED', '������� ����');
    define('_WLS_LINK_DELETED', '������� ����');

    define('_WLS_ERROR_CATEGORY', '���: �� ��� ����� �����');
    define('_WLS_ERROR_MAX_SUBCAT', '���: ��� ������� ������� ����� ���� ������ ���� ����� �� �����');
    define('_WLS_ERROR_MAX_LINK_BELONG', '���: ��� ������� ��������� ����� ���� ������ ���� ����� �� �����');
    define('_WLS_ERROR_MAX_LINK_DEL', '���: ��� ������� ������� ����� ���� ������ ��� ���� �� �����');

    // recommend site, mutual site
    define('_WLS_MARK', '�����');
    define('_WLS_ADMINCOMMENT', '����� ������');

    // broken link check
    define('_WLS_BROKEN_COUNTER', '���� ������ �� ����');

    // RSS/ATOM URL
    define('_WLS_RSS_URL', 'URL of RSS/ATOM');
    define('_WLS_RSS_URL_0', '��� �������');
    define('_WLS_RSS_URL_1', 'RSS type');
    define('_WLS_RSS_URL_2', 'ATOM type');
    define('_WLS_RSS_URL_3', '������� ���');

    define('_WLS_ATOMFEED_DISTRIBUTE', 'Distributing RSS/ATOM feeds displayed here.');
    define('_WLS_ATOMFEED_FIREFOX', "If you use <a href='http://www.mozilla.org/products/firefox/' target='_blank'>Firefox</a>, bookmark this page, to browse our RSS/ATOM feed. ");

    // 2005-10-20
    define('_WLS_EMAIL_APPROVE', '������ �� ���� ��������');
    define('_WLS_TOPTEN_TITLE', '%s Top %u');
    // %s is a link category title
    // %u is number of links
    define('_WLS_TOPTEN_ERROR', '���� ������ �� ������� ��������. ���� ��� %u');
    // %u is munber of categories

    // 2006-04-02
    define('_WEBLINKS_MID', '����� ���');
    define('_WEBLINKS_USERID', '��� �����');
    define('_WEBLINKS_CREATE', '�����');

    // conflict with rssc
    //define('_HOME',  'Home');
    //define('_SAVE',  'Save');
    //define('_SAVED', 'Saved');
    //define('_CREATE', 'Create');
    //define('_CREATED','Created');
    define('_FINISH', '�������');
    define('_FINISHED', '����');
    //define('_EXECUTE', 'Execute');
    //define('_EXECUTED','Executed');
    define('_PRINT', '�����');
    define('_SAMPLE', '����');

    define('_NO_MATCH_RECORD', '�� ����� ����� ������');
    define('_MANY_MATCH_RECORD', '���� ����� �� ���� ����� ������ ');
    define('_NO_CATEGORY', '�� ���� ���');
    define('_NO_LINK', '�� ���� ����');
    define('_NO_TITLE', '�� ���� �����');
    define('_NO_URL', '�� ���� ����');
    define('_NO_DESCRIPTION', '�� ���� ���');

    define('_GOTO_MAIN', '������ ��� ��������');
    define('_GOTO_MODULE', '������ ��� ��������');

    // config
    define('_WEBLINKS_INIT_NOT', '�� ���� ������ ������');
    define('_WEBLINKS_INIT_EXEC', '������ ������ ����');
    define('_WEBLINKS_VERSION_NOT', 'This module is not version  %s yet. Update now');
    define('_WEBLINKS_UPGRADE_EXEC', '����� ������ ������');

    // html tag
    define('_WEBLINKS_OPTIONS', '������');
    define('_WEBLINKS_DOHTML', ' ����� ����� html ');
    define('_WEBLINKS_DOIMAGE', '����� �����');
    define('_WEBLINKS_DOBREAK', ' ����� ������');
    define('_WEBLINKS_DOSMILEY', ' ����� ����������');
    define('_WEBLINKS_DOXCODE', '����� ����� xoops');

    define('_WEBLINKS_PASSWORD_INCORRECT', '����� ����� ���');
    define('_WEBLINKS_ETC', 'etc');
    define('_WEBLINKS_AUTH_UID', 'User ID Match');
    define('_WEBLINKS_AUTH_PASSWD', 'Password Match');
    define('_WEBLINKS_BANNER_SIZE', '���� �����');

    // === 2006-10-01 ===
    // conflict with rssc
    //if( !defined('_SAVE') )
    //{
    //	define('_HOME',  'Home');
    //	define('_SAVE',  'Save');
    //	define('_SAVED', 'Saved');
    //	define('_CREATE', 'Create');
    //	define('_CREATED','Created');
    //	define('_EXECUTE', 'Execute');
    //	define('_EXECUTED','Executed');
    //}

    define('_WEBLINKS_MAP_USE', '������� ������ �������');

    // rssc
    define('_WEBLINKS_RSSC_LID', 'RSSC Lid');
    define('_WEBLINKS_RSS_MODE', 'RSS Mode');
    define('_WEBLINKS_RSSC_NOT_INSTALLED', 'RSSC module ( %s ) is not installed');
    define('_WEBLINKS_RSSC_INSTALLED', 'RSSC module ( %s ) ver %s is installed');
    define('_WEBLINKS_RSSC_REQUIRE', 'Requires RSSC module ver %s or later');
    define('_WEBLINKS_GOTO_SINGLELINK', '������ ��� ������� ������');

    // warnig
    define('_WEBLINKS_WARN_NOT_READ_URL', '�����: ��� ���� ��� ����� �������');
    define('_WEBLINKS_WARN_BANNER_NOT_GET_SIZE', '�����: ��� ���� ��� ��� ������ �����');

    // google map: hacked by wye <http://never-ever.info/>
    define('_WEBLINKS_GM_LATITUDE', '�� �����');
    define('_WEBLINKS_GM_LONGITUDE', '�� �����');
    define('_WEBLINKS_GM_ZOOM', '����� �������');
    define('_WEBLINKS_GM_GET_LOCATION', '�� ������� ������ ������ �� ����� ����');
    //define('_WEBLINKS_GM_GET_BUTTON', 'Get Latitude/Longitude/Zoom');
    define('_WEBLINKS_GM_DEFAULT_LOCATION', '������ ���������');
    define('_WEBLINKS_GM_CURRENT_LOCATION', '������ ������');

    // === 2006-11-04 ===
    // google map inline mode
    define('_WEBLINKS_GOOGLE_MAPS', '����� ����');
    define('_WEBLINKS_JAVASCRIPT_INVALID', '������ �� ���� ���� �����');
    define('_WEBLINKS_GM_NOT_COMPATIBLE', '������ �� ����� ������� �� �� ���� ����� ����');
    define('_WEBLINKS_GM_NEW_WINDOW', '��� �� ����� �����');
    define('_WEBLINKS_GM_INLINE', '��� �� ��� ������');
    define('_WEBLINKS_GM_DISP_OFF', '����� �����');

    // google map: inverse Geocoder
    define('_WEBLINKS_GM_GET_LATITUDE', 'Get Latitude/Longitude/Zoom');
    define('_WEBLINKS_GM_GET_ADDR', '���� �������');

    // === 2006-12-11 ===
    // google map: Geocode
    define('_WEBLINKS_GM_SEARCH_MAP_FROM_ADDRESS', '��� ������� �� �������');
    define('_WEBLINKS_GM_NO_MATCH_PLACE', '��� ���� ���� ������� �������');
    define('_WEBLINKS_GM_JP_SEARCH_MAP_FROM_ADDRESS', 'Search Map from the address in Japan');
    define('_WEBLINKS_GM_JP_TOKYO_AC_GEOCODE', 'Japan Tokyo University');
    define('_WEBLINKS_GM_JP_MLIT_ISJ', 'Japan Ministry of Land Infrastructure and Transport');

    // link item
    define('_WEBLINKS_TIME_PUBLISH', '����� �����');
    define('_WEBLINKS_TIME_EXPIRE', '����� ��������');
    define('_WEBLINKS_TEXTAREA', '����� ��');

    define('_WEBLINKS_WARN_TIME_PUBLISH', '�� ��� ��� ��������');
    define('_WEBLINKS_WARN_TIME_EXPIRE', '������ ����� �������');
    define('_WEBLINKS_WARN_BROKEN', '���� ������ �� ����');

    // === 2007-02-20 ===
    // forum
    define('_WEBLINKS_LATEST_FORUM', 'Leatest Forum');
    define('_WEBLINKS_FORUM', '�������');
    define('_WEBLINKS_THREAD', 'Thead');
    define('_WEBLINKS_POST', 'Post');
    define('_WEBLINKS_FORUM_ID', '��� �������');
    define('_WEBLINKS_FORUM_SEL', '����� �������');
    define('_WEBLINKS_COMMENT_USE', '������� ����� xoops');

    // aux
    define('_WEBLINKS_CAT_AUX_TEXT_1', 'aux_text_1');
    define('_WEBLINKS_CAT_AUX_TEXT_2', 'aux_text_2');
    define('_WEBLINKS_CAT_AUX_INT_1', 'aux_int_1');
    define('_WEBLINKS_CAT_AUX_INT_2', 'aux_int_2');

    // captcha
    define('_WEBLINKS_CAPTCHA', 'Captcha');
    define('_WEBLINKS_CAPTCHA_DESC', 'Anti-Spam');
    define('_WEBLINKS_ERROR_CAPTCHA', 'Error: Unmtach Captcha');
    define('_WEBLINKS_ERROR', 'Error');

    // hack for multi site
    define('_WEBLINKS_CAT_TITLE_JP', 'Japanse Title');
    define('_WEBLINKS_DISABLE_FEATURE', 'Disbale this feature');
    define('_WEBLINKS_REDIRECT_JP_SITE', 'Jump to Japanese Site');

    // === 2007-03-25 ===
    define('_WEBLINKS_ALBUM_ID', '��� �������');
    define('_WEBLINKS_ALBUM_SEL', '����� �������');

    // === 2007-04-08 ===
    define('_WEBLINKS_GM_TYPE', '��� ����� ����');
    define('_WEBLINKS_GM_TYPE_MAP', '�����');
    define('_WEBLINKS_GM_TYPE_SATELLITE', '������');
    define('_WEBLINKS_GM_TYPE_HYBRID', 'Hybrid');

    // === 2007-08-01 ===
    define('_WEBLINKS_GM_CURRENT_ADDRESS', '������� ������');
    define('_WEBLINKS_GM_SEARCH_LIST', '����� ����� �����');

    // === 2007-09-01 ===
    // waiting list
    define('_WEBLINKS_ADMIN_WAITING_LIST', '����� ������ ������');
    define('_WEBLINKS_USER_WAITING_LIST', '����� �������');
    define('_WEBLINKS_USER_OWNER_LIST', '����� ������');

    // submit form
    define('_WEBLINKS_TIME_PUBLISH_SET', '��� ��� �����');
    define('_WEBLINKS_TIME_PUBLISH_DESC', '��� �� ���� ��� ����� , ��� ���� ��� �����');
    define('_WEBLINKS_TIME_EXPIRE_SET', '��� ������ �����');
    define('_WEBLINKS_TIME_EXPIRE_DESC', '��� �� ���� ������ ����� , ��� �� �����');
    define('_WEBLINKS_DEL_LINK_CONFIRM', '����� �����');
    define('_WEBLINKS_DEL_LINK_REASON', '��� �����');

    // === 2007-11-01 ===
    define('_WEBLINKS_ERROR_LENGTH', 'Error: %s must be less than %s characters');
}
// --- define language end ---
