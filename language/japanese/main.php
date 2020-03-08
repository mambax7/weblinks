<?php
// $Id: main.php,v 1.2 2012/04/09 10:20:05 ohwada Exp $

// 2008-02-17 K.OHWADA
// pagerank, pagerank_update

// 2007-12-09 K.OHWADA
// remove _WEBLINKS_DISPLAY_SUMMARY

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

// 2006-11-04 wye & K.OHWADA
// google map: JP inverse Geocoder
// google map inline mode

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
// language for main
// 2004-10-24 K.OHWADA
// ͭ����������
//=========================================================

// --- define language begin ---
if (!defined('WEBLINKS_LANG_MB_LOADED')) {
    define('WEBLINKS_LANG_MB_LOADED', 1);

    //---------------------------------------------------------
    // same as mylinks
    //---------------------------------------------------------

    //======     singlelink.php ======
    define('_WLS_CATEGORY', '���ƥ���');
    define('_WLS_HITS', '�ҥåȿ�');
    define('_WLS_RATING', 'ɾ��');
    define('_WLS_VOTE', '��ɼ��');
    define('_WLS_ONEVOTE', '��ɼ�� 1');
    define('_WLS_NUMVOTES', '��ɼ�� %s ');
    define('_WLS_RATETHISSITE', '���Υ����Ȥ�ɾ������');
    define('_WLS_REPORTBROKEN', '����ڤ����');
    define('_WLS_TELLAFRIEND', 'ͧã�˾Ҳ�');
    define('_WLS_EDITTHISLINK', '���Υ�󥯤��Խ�');
    define('_WLS_MODIFY', '����');

    //======    submit.php  ======
    //define("_WLS_SUBMITLINKHEAD","��󥯥ե��������Ͽ");
    define('_WLS_SUBMITLINKHEAD', '������󥯤���Ͽ����');
    define('_WLS_SUBMITONCE', 'Ʊ��Υ����ϣ��󤷤���Ͽ�Ǥ��ޤ���');
    define('_WLS_DONTABUSE', '���ʤ��Υ桼��̾��IP ���ɥ쥹�ϵ�Ͽ����ޤ��Τǡ������ʤɤϤ��ߤ᤯��������');
    define('_WLS_TAKESHOT', '���ʤ��Υ����֥����ȤΥ����꡼�󥷥�åȤ��뤫�⤷��ޤ���');
    define('_WLS_ALLPENDING', '��󥯾���ϰ�ö <b>����Ͽ</b> ���졢�����åդˤ���ǧ���������ޤ���<br>�����Ͽ�˻��֤��������礬���뤫�⤷��ޤ���ͽ�ᤴλ������������');
    //define("_WLS_WHENAPPROVED","��󥯾���ϡ��������ȥ����åդˤ�뾵ǧ��������ǺܤȤʤ뤳�Ȥ�λ������������");
    define('_WLS_RECEIVED', '�����֥����Ⱦ������դ��ޤ��������꤬�Ȥ��������ޤ���');

    //======    modlink.php ======
    //define("_WLS_REQUESTMOD","��󥯽����ꥯ������");
    define('_WLS_REQUESTMOD', '��󥯤�������');
    define('_WLS_THANKSFORINFO', '����򤢤꤬�Ȥ��������ޤ��������������ꥯ�����ȤϤ�����Ĵ�����ޤ���');

    define('_WLS_THANKSFORHELP', '���Υǥ��쥯�ȥ�ݻ��ˤ����Ϥ����������꤬�Ȥ��������ޤ���');
    define('_WLS_FORSECURITY', '�������ƥ����ΰ٤˰��Ū�ˤ��ʤ��Υ桼��̾��IP���ɥ쥹��Ͽ�����Ƥ��������ޤ���');

    define('_WLS_SEARCHFOR', '����'); //-no use
    define('_WLS_ANY', '�ɤ줫');
    define('_WLS_SEARCH', '����');

    //define("_WLS_MAIN","�ᥤ��");

    define('_WLS_SUBMITLINK', '�����Ͽ');
    define('_WLS_POPULAR', '�͵�');
    define('_WLS_TOPRATED', '�ȥåץ졼��');

    define('_WLS_NEWTHISWEEK', '�����κǿ�������');
    define('_WLS_UPTHISWEEK', '�����ι���������');

    define('_WLS_POPULARITYLTOM', '�͵� (�ҥåȿ��ξ��ʤ���)');
    define('_WLS_POPULARITYMTOL', '�͵� (�ҥåȿ���¿����)');
    define('_WLS_TITLEATOZ', '�����ȥ� (A to Z)');
    define('_WLS_TITLEZTOA', '�����ȥ� (Z to A)');
    define('_WLS_DATEOLD', '���� (��Ͽ���θŤ���)');
    define('_WLS_DATENEW', '���� (��Ͽ���ο�������)');
    define('_WLS_RATINGLTOH', 'ɾ�� (ɾ�����㤤��)');
    define('_WLS_RATINGHTOL', 'ɾ�� (ɾ���ι⤤��)');

    //define("_WLS_NOSHOTS","�����꡼�󥷥�åȤʤ�");
    //define("_WLS_DESCRIPTIONC","������");
    //define("_WLS_EMAILC","�ť᡼�륢�ɥ쥹: ");
    //define("_WLS_CATEGORYC","���ƥ���: ");
    //define("_WLS_LASTUPDATEC","�ǽ�������: ");
    //define("_WLS_HITSC","�ҥåȿ�: ");
    //define("_WLS_RATINGC","ɾ��: ");

    define('_WLS_THEREARE', '���ߥǡ����١����ˤ�<b>%s</b>��Υ�󥯤���Ͽ����Ƥ��ޤ���');
    define('_WLS_LATESTLIST', '�ǿ��ꥹ��');

    //define("_WLS_LINKID","��� ID: ");
    //define("_WLS_SITETITLE","�����֥�����̾: ");
    //define("_WLS_SITEURL","�����֥����� URL: ");
    //define("_WLS_OPTIONS", '���ץ����');
    define('_WLS_LINKID', '��� ID');
    define('_WLS_SITETITLE', '�����֥�����̾');
    define('_WLS_SITEURL', '�����֥����� URL');
    define('_WLS_OPTIONS', '���ץ����');
    define('_WLS_NOTIFYAPPROVE', '���Υ�󥯤���ǧ���뤤�ϵ��ݤ��줿�������Τ���');
    //define("_WLS_SHOTIMAGE","�����꡼�󥷥�åȲ���: ");
    define('_WLS_SENDREQUEST', '�ꥯ�����Ȥ�����');

    define('_WLS_VOTEAPPRE', '���ʤ�����ɼ��ȿ�Ǥ���ޤ���');
    define('_WLS_THANKURATE', '%s�ˤ����Ϥ��꤬�Ȥ��������ޤ���');
    define('_WLS_VOTEFROMYOU', '���ʤ�����ɼ��¾�Υ桼������󥯤������Ƚ�Ǵ�����Ω���ޤ���');
    define('_WLS_VOTEONCE', 'Ʊ�쥵���Ȥ��Ф�����ɼ�Ǥ���Τϣ���¤�Ȥ����Ƥ��������ޤ���');
    define('_WLS_RATINGSCALE', 'ɾ����1��10�δ֤��餪���Ӥ����������������礭���ۤ�ɾ�����⤤���Ȥ򼨤��ޤ���');
    define('_WLS_BEOBJECTIVE', '������Ƚ�Ǥˤ����ɼ�򤪴ꤤ�פ��ޤ�');
    define('_WLS_DONOTVOTE', '��ʬ���ȤΥ����Ȥ��Ф��Ƥ���ɼ�ϤǤ��ޤ���');
    define('_WLS_RATEIT', 'ɾ������');

    define('_WLS_INTRESTLINK', '%s�Ǥζ�̣���������֥����ȥ��');  // %s is your site name
    define('_WLS_INTLINKFOUND', '%s�ˤƤȤƤⶽ̣���������֥����Ȥ򸫤Ĥ��ޤ�����');  // %s is your site name

    define('_WLS_RANK', '���');
    define('_WLS_TOP10', '%s �ȥå� 10'); // %s is a link category title

    define('_WLS_SEARCHRESULTS', '�������: <b>%s</b>:'); // %s is search keywords
    define('_WLS_SORTBY', '�����Ƚ�:');
    define('_WLS_TITLE', '�����ȥ�');
    define('_WLS_DATE', '����');
    define('_WLS_POPULARITY', '�͵�');
    define('_WLS_CURSORTEDBY', '���ߤΥ����Ƚ祵����: %s');
    define('_WLS_PREVIOUS', '���Υڡ���');
    define('_WLS_NEXT', '���Υڡ���');
    define('_WLS_NOMATCH', '���פ���ǡ����ϸ��Ĥ���ޤ���Ǥ�����');

    define('_WLS_SUBMIT', '����');
    define('_WLS_CANCEL', '���');

    define('_WLS_ALREADYREPORTED', '���ʤ�����Υ���ڤ�����ϴ��˼����դ��ޤ�����');
    define('_WLS_MUSTREGFIRST', '�������������ޤ��󤬤��ʤ��Ϥ��Υڡ����ˤϥ��������Ǥ��ޤ���<br>�ޤ���Ͽ����뤫�������󤷤Ʋ�������');
    define('_WLS_NORATING', 'ɾ�������򤵤�Ƥ��ޤ���');
    define('_WLS_CANTVOTEOWN', '���ʤ�����Ͽ������󥯤ˤ���ɼ�Ǥ��ޤ���<br>��ɼ�����Ƶ�Ͽ����Ĵ������ޤ���');
    define('_WLS_VOTEONCE2', '����������ޤ��󤬡�Ʊ���󥯾���ؤ���ɼ�ϰ��¤�Ȥ����Ƥ��������Ƥ��ޤ���');

    //%%%%%%    Admin     %%%%%

    define('_WLS_WEBLINKSCONF', '��󥯽�����');
    define('_WLS_GENERALSET', '��������');
    //define("_WLS_ADDMODDELETE","���ƥ��ꤪ��ӥ�󥯾�����ɲá����������");
    define('_WLS_LINKSWAITING', '��ǧ�Ԥ��ο������');
    define('_WLS_MODREQUESTS', '��ǧ�Ԥ��ν������');
    define('_WLS_BROKENREPORTS', '����ڤ����');

    //define("_WLS_SUBMITTER","��Ƽ�: ");
    define('_WLS_SUBMITTER', '��Ƽ�');

    define('_WLS_VISIT', 'ˬ��');

    //define("_WLS_SHOTMUST","�����꡼�󥷥�åȲ����� %s �ǥ��쥯�ȥ겼�Υե�����̾�ǻ��ꤷ�Ʋ������� (��. shot.gif). �⤷�����ե����뤬�ʤ����϶���ˤ��Ƥ����Ʋ�������");
    define('_WLS_LINKIMAGEMUST', '��󥯲����� %s �ǥ��쥯�ȥ겼�Υե�����̾�ǻ��ꤷ�Ʋ������� (��. shot.gif). �⤷�����ե����뤬�ʤ����϶���ˤ��Ƥ����Ʋ�������');

    define('_WLS_APPROVE', '��ǧ����');
    define('_WLS_DELETE', '���');
    define('_WLS_NOSUBMITTED', '�����������Ͽ�ο����Ϥ���ޤ���');
    define('_WLS_ADDMAIN', '�ᥤ�󥫥ƥ����ɲ�');
    define('_WLS_TITLEC', '�����ȥ�: ');
    define('_WLS_IMGURL', '���ƥ������URL�ʥ��ץ����Ǥ��������ե�����ι⤵�ϼ�ưŪ��50�ԥ������Ĵ������ޤ����ᥤ�󥫥ƥ����ѡˡ�');
    define('_WLS_ADD', '�ɲ�');
    define('_WLS_ADDSUB', '���֥��ƥ����ɲ�');
    define('_WLS_IN', '�ƥ��ƥ��ꡧ');
    define('_WLS_ADDNEWLINK', '������󥯤��ɲ�');
    define('_WLS_MODCAT', '���ƥ��꽤��');
    define('_WLS_MODLINK', '��󥯽���');
    define('_WLS_TOTALVOTES', '��󥯤���ɼ�� (��ɼ���ι��: %s)');
    define('_WLS_USERTOTALVOTES', '��Ͽ�桼���ˤ��ɾ���� (��ɼ���ι��: %s)');
    define('_WLS_ANONTOTALVOTES', '̤��Ͽ�桼���ˤ��ɾ���� (��ɼ���ι��: %s)');
    define('_WLS_USER', '�桼��');
    define('_WLS_IP', 'IP ���ɥ쥹');
    define('_WLS_USERAVG', '�桼����ʿ��ɾ����');
    define('_WLS_TOTALRATE', '��ɾ��');
    define('_WLS_NOREGVOTES', '��Ͽ�桼���ˤ��ɾ���Ϥ���ޤ���');
    define('_WLS_NOUNREGVOTES', '̤��Ͽ�桼���ˤ��ɾ���Ϥ���ޤ���');
    define('_WLS_VOTEDELETED', '��ɼ�ǡ����Ϻ������ޤ�����');
    define('_WLS_NOBROKEN', '����ڤ����Ϥ���ޤ���');
    define('_WLS_IGNOREDESC', '̵�뤹�� (<b>����ڤ����</b>������������̵�뤹��)');
    define('_WLS_DELETEDESC', '������� (<b>���ˤ��ä������֥����ȤΥǡ���</b>��<b>����ڤ����</b>��������)');
    define('_WLS_REPORTER', '�����ԡ�');

    define('_WLS_IGNORE', '���ݤ���');
    define('_WLS_LINKDELETED', '��󥯾���������ޤ�����');
    define('_WLS_BROKENDELETED', '����ڤ����������ޤ�����');
    //define("_WLS_USERMODREQ","��󥯽����ꥯ�����ȥ桼��");
    define('_WLS_ORIGINAL', '������');
    define('_WLS_PROPOSED', '������');
    define('_WLS_OWNER', '��󥯾����󶡼�');
    define('_WLS_NOMODREQ', '��󥯽����ꥯ�����ȤϤ���ޤ���');
    define('_WLS_DBUPDATED', '�ǡ����١����򹹿����ޤ�����');
    define('_WLS_MODREQDELETED', '�����ꥯ�����Ȥ������ޤ�����');
    define('_WLS_IMGURLMAIN', '���ƥ������URL�ʥ��ץ����Ǥ��������ե�����ι⤵�ϼ�ưŪ��50�ԥ������Ĵ������ޤ����ᥤ�󥫥ƥ����ѡˡ�');
    define('_WLS_PARENT', '�ƥ��ƥ���:');
    define('_WLS_SAVE', '�ѹ�����¸');
    define('_WLS_CATDELETED', '���ƥ���������ޤ�����');
    define('_WLS_WARNING', '���: �����ˤ��Υ��ƥ���ڤӤ���˴�Ϣ�����󥯡������Ȥ������ޤ�����');
    define('_WLS_YES', '�Ϥ�');
    define('_WLS_NO', '������');
    define('_WLS_NEWCATADDED', '���ƥ�����ɲä��ޤ�����');

    define('_WLS_NEWLINKADDED', '��������󥯤ϥǡ����١������ɲä���ޤ�����');
    define('_WLS_YOURLINK', 'Your link submitted at %s'); //[MADA]
    define('_WLS_YOUCANBROWSE', '%s�Υ�󥯽��ˤ��͡��ʥ����֥����ȤΥ�󥯾�������ˤʤ�ޤ���');
    define('_WLS_HELLO', '%s���󡢤���ˤ���');
    define('_WLS_WEAPPROVED', '���ʤ�����Υ����֥�󥯤Υǡ����١����ؤΥ����Ͽ�����Ͼ�ǧ����ޤ�����');
    define('_WLS_THANKSSUBMIT', '�����Ͽ�������꤬�Ȥ��������ޤ���');
    define('_WLS_ISAPPROVED', '���ʤ�����Υ����Ͽ�����Ͼ�ǧ����ޤ�����');

    //---------------------------------------------------------
    // weblinks
    //---------------------------------------------------------

    //======    index.php   ======
    // guidance bar
    define('_WLS_SUBMIT_NEW_LINK', '��Ͽ����');
    define('_WLS_SITE_NEW', '���奵����');
    define('_WLS_SITE_UPDATE', '����������');
    define('_WLS_SITE_POPULAR', '�͵�������');
    define('_WLS_SITE_HIGHRATE', '��ɾ��������');
    define('_WLS_SITE_RECOMMEND', '�������᥵����');
    define('_WLS_SITE_MUTUAL', '��ߥ�󥯥�����');
    define('_WLS_SITE_RANDOM', '�����ॸ����');
    define('_WLS_NEW_SITELIST', '���� ������');
    define('_WLS_NEW_ATOMFEED', '���� RSS/ATOM');
    define('_WLS_SITE_RSS', 'RSS/ATOM �б�������');
    define('_WLS_ATOMFEED', 'RSS/ATOM ����');

    define('_WLS_LASTUPDATE', '�ǽ�������');
    define('_WLS_MORE', '��äȾܤ���');

    //======     singlelink.php ======
    define('_WLS_DESCRIPTION', '����');
    define('_WLS_PROMOTER', '��ż�');
    define('_WLS_ZIP', '͹���ֹ�');
    define('_WLS_ADDR', '����');
    define('_WLS_TEL', '�����ֹ�');
    define('_WLS_FAX', 'FAX�ֹ�');

    //======     submit.php ======
    define('_WLS_BANNERURL', '�Хʡ���URL');
    define('_WLS_NAME', '̾�����ϥ�ɥ�̾');
    define('_WLS_EMAIL', '�ť᡼�륢�ɥ쥹');
    define('_WLS_COMPANY', '���̾������̾');
    define('_WLS_STATE', '��ƻ�ܸ�');
    define('_WLS_CITY', '��Į¼');
    define('_WLS_ADDR2', '�ӥ�̾�ʤ�');
    define('_WLS_PUBLIC', '��������');
    define('_WLS_NOTPUBLIC', '�������ʤ�');
    define('_WLS_NOTSELECT', '���ꤷ�ʤ�');
    define('_WLS_SUBMIT_INDISPENSABLE', '����(<b>*</b>)�ϡ�ɬ�ܹ��ܤǤ���');
    define(
        '_WLS_SUBMIT_USER_COMMENT',
        '�ִ����ԤؤΥ����ȡפϤ��ո�������˾�ʤɤ��Ȥ�����������<br>�������WEB�ˤ�ɽ������ޤ���<br>����ߥ�󥯡פ򤴴�˾�ξ��ϡ��������Ȥ���󥯤���Ƥ��뵮���Υ����Ȥ�URL�򤴵�������������'
    );
    define('_WLS_USER_COMMENT', '�����ԤؤΥ�����');
    define('_WLS_NOT_DISPLAY', '�������WEB�ˤ�ɽ������ޤ���');

    //======    modlink.php ======
    define('_WLS_MODIFYAPPROVED', '���ʤ�����Υ���ѹ������Ͼ�ǧ����ޤ�����');
    define('_WLS_MODIFY_NOT_OWNER', '���ʤ�����󥯾������Ͽ�ԤǤ��뤫�ɤ�����ưŪ�ˤ�Ƚ�ǤǤ��ޤ���Ǥ�����');
    define('_WLS_MODIFY_PENDING', '��󥯾���ν����ϰ�ö <b>����Ͽ</b> ���졢�����åդˤ���ǧ���������ޤ���<br>��󥯽����˻��֤��������礬���뤫�⤷��ޤ���ͽ�ᤴλ������������');
    define('_WLS_LINKSUBMITTER', '��󥯾����󶡼ԡ�');

    //======    user.php    ======
    define('_WLS_PLEASEPASSWORD', '�ѥ���ɤ����Ϥ��Ƥ�������');
    define('_WLS_REGSTERED', '��Ͽ�桼����');
    define('_WLS_REGSTERED_DSC', '��󥯾�����󶡼ԤǤʤ��Ȥ⡢�����Ǥ��ޤ���<br>�����Ԥ���ǧ��˷Ǻܤ���ޤ���');
    define('_WLS_EMAILNOTFOUND', '�᡼�륢�ɥ쥹�����פ��ޤ���Ǥ�����');

    // error message
    define('_WLS_ERROR_FILL', '���顼: %s �����Ϥ��Ʋ�������');
    define('_WLS_ERROR_ILLEGAL', '���顼: %s �η����������Ǥ�');
    define('_WLS_ERROR_CID', '���顼: ���ƥ�������򤷤Ƥ�������');
    define('_WLS_ERROR_URL_EXIST', '���顼: ���Υ�󥯤ϴ��˥ǡ����١�������Ͽ����Ƥ��ޤ���');
    define('_WLS_WARNING_URL_EXIST', '�ٹ�: ����Υ�󥯤��ǡ����١�������Ͽ����Ƥ��ޤ���');
    define('_WLS_ERRORNOLINK', '���顼: ���������󥯤Ϥ���ޤ���');

    //define("_WLS_ERROR_TITLE", "���顼: �����ȥ�����Ϥ��Ʋ�������");
    //define("_WLS_ERROR_DESC",  "���顼: ���������Ϥ��Ʋ�������");
    //define("_WLS_ERROR_NAME",  "���顼: ̾�������Ϥ��Ƥ�������");
    //define("_WLS_ERROR_MAIL",  "���顼: �ť᡼�륢�ɥ쥹�����Ϥ��Ƥ�������");
    //define("_WLS_ERROR_URL",   "���顼: URL�����Ϥ��Ƥ�������");
    //define("_WLS_ERROR_URLILLEGAL","���顼: URL�η����������Ǥ�");
    //define("_WLS_ERROR_BANNERILLEGAL","���顼: �Хʡ�URL�η����������Ǥ�");

    define('_WLS_CATLIST', '���ƥ������');
    define('_WLS_LINKIMAGE', '��󥯲���: ');
    define('_WLS_CATEGORYID', '���ƥ��� ID: ');
    define('_WLS_TIMEUPDATE', '��������');
    define('_WLS_NOTTIMEUPDATE', '�������ʤ�');
    define('_WLS_LINKFLAG', '���β��˥�󥯤���');
    define('_WLS_NOTLINKFLAG', '���β��˥�󥯤���ʤ�');

    //define("_WLS_ADDMODCATEGORY","���ƥ�����ɲá����������");
    //define("_WLS_ADDMODLINK","��󥯤��ɲá����������");
    //define("_WLS_ADDMODLINK","������󥯤��ɲ�");

    define('_WLS_GOTOADMIN', '�����Բ��̤˰�ư���ޤ�');

    // category delete
    define('_WLS_DELCAT', '���ƥ�����');
    define('_WLS_SUBCATEGORY', '���֥��ƥ���');
    define('_WLS_SUBCATEGORY_NON', '���֥��ƥ��� �ʤ�');
    define('_WLS_LINK_BELONG', '��Ϣ������');
    define('_WLS_LINK_BELONG_NUMBER', '��Ϣ�����󥯿�');
    define('_WLS_LINK_BELONG_NON', '��Ϣ������ �ʤ�');
    define('_WLS_LINK_MAYBE_DELETE', '����������');
    define('_WLS_LINK_MAYBE_DELETE_DSC', '���֥��ƥ��꤬������ϡ����Τ�ͽ�ۤ�����ޤ��� ����ʳ��ˤ���������󥯤�����Ȼפ��ޤ���');
    define('_WLS_LINK_DELETE_NON', '���������� �ʤ�');
    define('_WLS_CATEGORY_LINK_DELETE_EXCUTE', '���ƥ���ȴ�Ϣ�����󥯤������ޤ�');
    define('_WLS_CATEGORY_LINK_DELETED', '���ƥ���ȴ�Ϣ�����󥯤������ޤ���');
    define('_WLS_CATEGORY_DELETED', '����������ƥ���');
    define('_WLS_LINK_DELETED', '����������');

    define('_WLS_ERROR_CATEGORY', '���顼: ���ƥ��꤬���ꤵ��Ƥ��ʤ�');
    define('_WLS_ERROR_MAX_SUBCAT', '���顼: ���Ǻ���Ǥ��륫�ƥ������Ķ���Ƥ��ޤ�');
    define('_WLS_ERROR_MAX_LINK_BELONG', '���顼: ���Ǻ���Ǥ����Ϣ�����󥯿���Ķ���Ƥ��ޤ�');
    define('_WLS_ERROR_MAX_LINK_DEL', '���顼: ���Ǻ���Ǥ����󥯿���Ķ���Ƥ��ޤ�');

    // recommend site, mutual site
    define('_WLS_MARK', '�ޡ���');
    define('_WLS_ADMINCOMMENT', '�����ԤΥ�����');

    // broken link check
    define('_WLS_BROKEN_COUNTER', '����ڤ쥫����');

    // RSS/ATOM URL
    define('_WLS_RSS_URL', 'RSS/ATOM��URL');
    define('_WLS_RSS_URL_0', '̤����');
    define('_WLS_RSS_URL_1', 'RSS����');
    define('_WLS_RSS_URL_2', 'ATOM����');
    define('_WLS_RSS_URL_3', '��ư����');

    define('_WLS_ATOMFEED_DISTRIBUTE', '������ɽ������Ƥ��� RSS/ATOM ������ RSS �� ATOM ���ۿ����Ƥ��ޤ���');
    define('_WLS_ATOMFEED_FIREFOX', "<a href='https://www.mozilla-japan.org/products/firefox/' target='_blank'>Firefox</a> �����Ѥ����Ϥ��Υڡ�����֥å��ޡ�������ȡ��ۿ����Ƥ������ˤʤ�ޤ���");

    // 2005-10-20
    define('_WLS_EMAIL_APPROVE', '��ǧ���������Τ��ޤ�');
    define('_WLS_TOPTEN_TITLE', '%s �ȥå� %u');
    // %s is a link category title
    // %u is number of links
    define('_WLS_TOPTEN_ERROR', '�ȥåס����ƥ��꤬¿�����ޤ��� %u �Ĥ�ɽ�����Ǥ��ڤ�ޤ�����');
    // %u is munber of categories

    // 2006-05-15
    define('_WEBLINKS_MID', '���� ID');
    define('_WEBLINKS_USERID', '�桼�� ID');
    define('_WEBLINKS_CREATE', '��Ͽ��');

    // conflict with rssc
    //define('_HOME',  '�ۡ���');
    //define('_SAVE',  '��¸');
    //define('_SAVED', '��¸����');
    //define('_CREATE', '����');
    //define('_CREATED','��������');
    //define('_FINISH',   '��λ');
    //define('_FINISHED', '��λ����');
    //define('_EXECUTE', '�¹�');
    //define('_EXECUTED','�¹Ԥ���');
    //define('_PRINT','����');
    //define('_SAMPLE','����');

    define('_NO_MATCH_RECORD', '��������쥳���ɤ�¸�ߤ��ޤ���');
    define('_MANY_MATCH_RECORD', '��������쥳���ɤ����İʾ� ¸�ߤ��ޤ�');
    define('_NO_CATEGORY', '���ƥ��꤬�ʤ�');
    define('_NO_LINK', '��󥯤��ʤ�');
    define('_NO_TITLE', '�����ȥ뤬�ʤ�');
    define('_NO_URL', 'URL���ʤ�');
    define('_NO_DESCRIPTION', '�������ʤ�');

    //define('_GOTO_MAIN',   '�ᥤ�󎥥ڡ��� ��');
    //define('_GOTO_MODULE', '�⥸�塼�� ��');

    // config
    //define('_WEBLINKS_INIT_NOT', '����ơ��֥뤬���������Ƥ��ʤ�');
    //define('_WEBLINKS_INIT_EXEC', '����ơ��֥����������');
    //define('_WEBLINKS_VERSION_NOT','�С������ %s �ǤϤʤ�');
    //define('_WEBLINKS_UPGRADE_EXEC','����ơ��֥�򥢥åץ��졼�ɤ���');

    // html tag
    define('_WEBLINKS_OPTIONS', '���ץ����');
    //define('_WEBLINKS_DISPLAY_SUMMARY', '���פ�ɽ������');
    define('_WEBLINKS_DOHTML', ' HTML ������ͭ���ˤ���');
    define('_WEBLINKS_DOIMAGE', ' ������ͭ���ˤ���');
    define('_WEBLINKS_DOBREAK', ' ���Ԥ�ͭ���ˤ���');
    define('_WEBLINKS_DOSMILEY', ' ���ޥ��꡼���������ͭ���ˤ���');
    define('_WEBLINKS_DOXCODE', ' XOOPS �����ɤ�ͭ���ˤ���');

    define('_WEBLINKS_PASSWORD_INCORRECT', '�ѥ���ɤ��������ʤ�');
    define('_WEBLINKS_ETC', '����¾');
    define('_WEBLINKS_AUTH_UID', '�桼��ID ����');
    define('_WEBLINKS_AUTH_PASSWD', '�ѥ���� ����');
    define('_WEBLINKS_BANNER_SIZE', '�Хʡ��Υ�����');

    // === 2006-10-01 ===
    // conflict with rssc
    //if( !defined('_SAVE') )
    //{
    //  define('_HOME', '�ۡ���');
    //  define('_SAVE', '��¸');
    //  define('_SAVED','��¸����');
    //  define('_CREATE', '����');
    //  define('_CREATED','��������');
    //  define('_EXECUTE', '�¹�');
    //  define('_EXECUTED','�¹Ԥ���');
    //}

    define('_WEBLINKS_MAP_USE', '�Ͽޥ��������ɽ��');

    // rssc
    define('_WEBLINKS_RSS_MODE', 'RSS �⡼��');
    define('_WEBLINKS_RSSC_LID', 'RSSC Lid');
    define('_WEBLINKS_RSSC_NOT_INSTALLED', 'RSSC �⥸�塼�� ( %s ) �ϥ��󥹥ȡ��뤵��Ƥ��ʤ�');
    define('_WEBLINKS_RSSC_INSTALLED', 'RSSC �⥸�塼�� ( %s ) ver %s �ϥ��󥹥ȡ��뤵��Ƥ���');
    define('_WEBLINKS_RSSC_REQUIRE', 'RSSC �⥸�塼�� ver %s ������ʹߤ�ɬ�פǤ�');
    define('_WEBLINKS_GOTO_SINGLELINK', '��󥯾ܺ٤�');

    // warnig
    define('_WEBLINKS_WARN_NOT_READ_URL', '�ٹ�: URL ���ɤ߽Ф��ʤ�');
    define('_WEBLINKS_WARN_BANNER_NOT_GET_SIZE', '�ٹ�: �Хʡ��������������Ǥ��ʤ�');

    // google map: hacked by wye <https://never-ever.info/>
    define('_WEBLINKS_GM_LATITUDE', '����');
    define('_WEBLINKS_GM_LONGITUDE', '����');
    define('_WEBLINKS_GM_ZOOM', '�����ࡦ��٥�');
    //define('_WEBLINKS_GM_LATITUDE_DESC',  '-90(���) ���� +90(�̰�) ');
    //define('_WEBLINKS_GM_LONGITUDE_DESC', '-180(����) ���� +180(���)');
    //define('_WEBLINKS_GM_ZOOM_DESC', '0 ���� +17');
    define('_WEBLINKS_GM_GET_LOCATION', 'GoogleMaps �ǰ��־�����������');
    //define('_WEBLINKS_GM_GET_BUTTON', '���־�����������');
    define('_WEBLINKS_GM_DEFAULT_LOCATION', '��ά���ΰ���');
    define('_WEBLINKS_GM_CURRENT_LOCATION', '���ߤΰ���');

    // === 2006-11-04 ===
    // google map inline mode
    define('_WEBLINKS_GOOGLE_MAPS', 'Google Maps');
    define('_WEBLINKS_JAVASCRIPT_INVALID', '�����Υ֥饦���Ǥ� JavaScript �����ѤǤ��ޤ���');
    define('_WEBLINKS_GM_NOT_COMPATIBLE', '�����Υ֥饦���Ǥ� GoogleMaps ��ɽ���Ǥ��ޤ���');
    define('_WEBLINKS_GM_NEW_WINDOW', '������������ɤ�ɽ������');
    define('_WEBLINKS_GM_INLINE', '����饤���ɽ������');
    define('_WEBLINKS_GM_DISP_OFF', 'ɽ����ä�');

    // google map: inverse Geocoder
    define('_WEBLINKS_GM_GET_LATITUDE', '���١����٤��������');
    define('_WEBLINKS_GM_GET_ADDR', '������������');

    // === 2006-12-11 ===
    // google map: Geocode
    define('_WEBLINKS_GM_SEARCH_MAP_FROM_ADDRESS', '���꤫���Ͽޤ򸡺�����');
    define('_WEBLINKS_GM_NO_MATCH_PLACE', '���������꤬�ʤ�');
    define('_WEBLINKS_GM_JP_SEARCH_MAP_FROM_ADDRESS', '���꤫���Ͽޤ򸡺�����(������)');
    define('_WEBLINKS_GM_JP_TOKYO_AC_GEOCODE', '������ CSIS����ץ른�������ǥ��󥰼¸�');
    define('_WEBLINKS_GM_JP_MLIT_ISJ', '���ڸ��̾� �����٥���ֻ��Ⱦ���');

    // link item
    define('_WEBLINKS_TIME_PUBLISH', 'ȯ����');
    define('_WEBLINKS_TIME_EXPIRE', '��λ��');
    define('_WEBLINKS_TEXTAREA', 'Textarea');

    define('_WEBLINKS_WARN_TIME_PUBLISH', 'ȯ�������ޤ���Ƥ��ʤ�');
    define('_WEBLINKS_WARN_TIME_EXPIRE', '��λ����᤮�Ƥ���');
    define('_WEBLINKS_WARN_BROKEN', '����ڤ�β�ǽ��������');

    // === 2007-02-20 ===
    // forum
    define('_WEBLINKS_LATEST_FORUM', '�ǿ��Υե������');
    define('_WEBLINKS_FORUM', '�ե������');
    define('_WEBLINKS_THREAD', '����å�');
    define('_WEBLINKS_POST', '���');
    define('_WEBLINKS_FORUM_ID', '�ե�������ֹ�');
    define('_WEBLINKS_FORUM_SEL', '�ե�����������');
    define('_WEBLINKS_COMMENT_USE', 'XOOPS�����Ȥ���Ѥ���');

    // aux
    define('_WEBLINKS_CAT_AUX_TEXT_1', 'aux_text_1');
    define('_WEBLINKS_CAT_AUX_TEXT_2', 'aux_text_2');
    define('_WEBLINKS_CAT_AUX_INT_1', 'aux_int_1');
    define('_WEBLINKS_CAT_AUX_INT_2', 'aux_int_2');

    // captcha
    define('_WEBLINKS_CAPTCHA', '����ǧ��');
    define('_WEBLINKS_CAPTCHA_DESC', '���ѥ��к�');
    define('_WEBLINKS_ERROR_CAPTCHA', '���顼: ����ǧ�ڤ����פ��ʤ�');
    define('_WEBLINKS_ERROR', '���顼');

    // hack for multi site
    define('_WEBLINKS_CAT_TITLE_JP', '���ܸ� �����ȥ�');
    define('_WEBLINKS_DISABLE_FEATURE', '���ε�ǽ�ϻ��ѤǤ��ޤ���');
    define('_WEBLINKS_REDIRECT_JP_SITE', '���ܸ쥵���Ȥ˥����פ��ޤ�');

    // === 2007-03-25 ===
    define('_WEBLINKS_ALBUM_ID', '����Х��ֹ�');
    define('_WEBLINKS_ALBUM_SEL', '����Х������');

    // === 2007-04-08 ===
    define('_WEBLINKS_GM_TYPE', 'Google Map Type');
    define('_WEBLINKS_GM_TYPE_MAP', '�Ͽ�');
    define('_WEBLINKS_GM_TYPE_SATELLITE', '�����̿�');
    define('_WEBLINKS_GM_TYPE_HYBRID', '�Ͽ�+�̿�');

    // === 2007-08-01 ===
    define('_WEBLINKS_GM_CURRENT_ADDRESS', '���ߤν���');
    define('_WEBLINKS_GM_SEARCH_LIST', '������̤ΰ���');

    // === 2007-09-01 ===
    // waiting list
    define('_WEBLINKS_ADMIN_WAITING_LIST', '�����Ԥξ�ǧ�Ԥ��ꥹ��');
    define('_WEBLINKS_USER_WAITING_LIST', '���ʤ��ξ�ǧ�Ԥ��ꥹ��');
    define('_WEBLINKS_USER_OWNER_LIST', '���ʤ�����Ͽ�ꥹ��');

    // submit form
    define('_WEBLINKS_TIME_PUBLISH_SET', 'ȯ���������ꤹ��');
    define('_WEBLINKS_TIME_PUBLISH_DESC', '���ꤷ�ʤ��Ȥ��ϡ����ɽ�������');
    define('_WEBLINKS_TIME_EXPIRE_SET', '��λ�������ꤹ��');
    define('_WEBLINKS_TIME_EXPIRE_DESC', '���ꤷ�ʤ��Ȥ��ϡ����ɽ�������');
    define('_WEBLINKS_DEL_LINK_CONFIRM', '������ޤ���');
    define('_WEBLINKS_DEL_LINK_REASON', '�����ͳ');

    // === 2007-11-01 ===
    define('_WEBLINKS_ERROR_LENGTH', '���顼: %s ��ʸ������ %s ʸ���ʲ��ˤ��Ʋ�����');

    // === 2008-02-17 ===
    // linkitem
    define('_WEBLINKS_PAGERANK', '�ڡ������');
    define('_WEBLINKS_PAGERANK_UPDATE', '�ڡ�����󥯹�������');
    define('_WEBLINKS_GM_KML_DEBUG', 'KML �ΥǥХå�ɽ��');

    // gmap
    define('_WEBLINKS_SITE_GMAP', 'GoogleMaps �б�������');
    define('_WEBLINKS_KML_LIST', 'KML ����');
    define('_WEBLINKS_KML_LIST_DESC', 'KML ���������ɤ��ơ�GoogleEarth �Ǹ���');
    define('_WEBLINKS_KML_PERPAGE', 'ʬ�䤹����');

    // pagerank
    define('_WEBLINKS_SITE_PAGERANK', '�� PageRank ������');

    //---------------------------------------------------------
    // 2012-04-02 v2.10
    //---------------------------------------------------------
    // webmap3
    define('_WEBLINKS_WEBMAP3_NOT_INSTALLED', 'WEBMAP3 �⥸�塼�� ( %s ) �ϥ��󥹥ȡ��뤵��Ƥ��ʤ�');
    define('_WEBLINKS_WEBMAP3_INSTALLED', 'WEBMAP3 �⥸�塼�� ( %s ) ver %s �ϥ��󥹥ȡ��뤵��Ƥ���');
    define('_WEBLINKS_WEBMAP3_REQUIRE', 'WEBMAP3 �⥸�塼�� ver %s ������ʹߤ�ɬ�פǤ�');

    // google map
    define('_WEBLINKS_GM_LOCATION', '���');
    define('_WEBLINKS_GM_ICON', 'Google��������');
}// --- define language end ---
