<?php
// $Id: admin.php,v 1.4 2008/01/18 14:10:34 ohwada Exp $

//=========================================================
// WebLinks Module
// Language for Admin
//=========================================================

// 2008-01-18 22:52:31 ken
// tanslated by sato-san <https://www.xoops-magazine.com/>

// --- define language begin ---
if (!defined('WEBLINKS_LANG_AM_LOADED')) {
    define('WEBLINKS_LANG_AM_LOADED', '1');
    define('_WEBLINKS_ADMIN_INDEX', 'Admin Index');
    define('_WEBLINKS_ADMIN_MODULE_CONFIG_1', 'Modulkonfiguration 1');
    define('_WEBLINKS_ADMIN_MODULE_CONFIG_2', 'Modulkonfiguration 2');
    define('_WEBLINKS_ADMIN_ADD_LINK', 'Neuen Link hinzuf�gen');
    define('_WEBLINKS_ADMIN_OTHERFUNC', 'Weitere Funktionen');
    define('_WEBLINKS_ADMIN_GOTO_ADMIN_INDEX', 'Zur Admin�bersicht');
    define('_WEBLINKS_ADMIN_AUTH', 'Berechtigungen setzen');
    define('_WEBLINKS_ADMIN_AUTH_TEXT', 'Der Administrator hat alle Rechte');
    define('_WEBLINKS_AUTH_SUBMIT', 'Berechtigung zum Neueintragen eines Links');
    define('_WEBLINKS_AUTH_SUBMIT_DSC', 'Welche Gruppe darf neue Links hinzuf�gen:');
    define('_WEBLINKS_AUTH_SUBMIT_AUTO', 'Berechtigung zum Freischalten eines neuen Linkeintrages');
    define('_WEBLINKS_AUTH_SUBMIT_AUTO_DSC', 'Welche Gruppe darf Linkeintr�ge freischalten:');
    define('_WEBLINKS_AUTH_MODIFY', 'Berechtigung zur Link�nderung');
    define('_WEBLINKS_AUTH_MODIFY_DSC', 'Welche Gruppe darf Link�nderungen vornehmen:');
    define('_WEBLINKS_AUTH_MODIFY_AUTO', 'Berechtigung zum Freischalten ge�nderter Links');
    define('_WEBLINKS_AUTH_MODIFY_AUTO_DSC', 'Welche Gruppe darf Link�nderungen sofort/automatisch freischalten:');
    define('_WEBLINKS_AUTH_RATELINK', 'Wer darf Links bewerten');
    define('_WEBLINKS_AUTH_RATELINK_DSC', 'Spezifiziere die Gruppe, welche Links bewerten darf.<br>Nur g�ltig, wenn Linkbewertung <b>EIN</>.');
    define('_WEBLINKS_USE_PASSWD', 'Passwortpr�fung bei Link�nderungen');
    define('_WEBLINKS_USE_PASSWD_DSC', 'Wenn <b>JA</b> <br>und keine automatische Freischaltung aktiviert, wird das Passworteingabefeld angezeigt. ');
    define('_WEBLINKS_USE_RATELINK', 'Linkbewertung nutzen:');
    define('_WEBLINKS_USE_RATELINK_DSC', 'Wenn <b>JA</b>, <br>wird Linkbewertungsfeld und Ergebniss angezeigt.');
    define('_WEBLINKS_AUTH_UPDATED', '�nderungen durchgef�hrt');
    define('_WEBLINKS_ADMIN_RSS', 'Setting of RSS/ATOM Feeds');
    define('_WEBLINKS_RSS_MODE_AUTO', 'Auto update of RSS/ATOM feeds');
    define('_WEBLINKS_RSS_MODE_AUTO_DSC', "when select YES, perform 'Auto Discovery of RSS/ATOM url' and 'auto update', when show a link detail infomation. ");
    define('_WEBLINKS_RSS_MODE_DATA', 'Data of RSS/ATOM to show');
    define(
        '_WEBLINKS_RSS_MODE_DATA_DSC',
        "When select 'ATOM FEED', use the data in atomfeed table after parsing. <br>When select 'XML', use the data in link table before parsing. <br>Some datas may not be saved in atomfeed table since filtering. "
    );
    define('_WEBLINKS_RSS_CACHE', 'Cache time of RSS/ATOM feeds');
    define('_WEBLINKS_RSS_CACHE_DSC', 'Setting value is a 1 hour unit.');
    define('_WEBLINKS_RSS_LIMIT', 'The maximum number of RSS/ATOM feeds');
    define('_WEBLINKS_RSS_LIMIT_DSC', 'Enter the maximum number of RSS/ATOM feeds saved in atomfeed table<br>It will be cleared by old date, if this value is exceeded. <br>0 is unlimited. ');
    define('_WEBLINKS_RSS_SITE', 'RSS search site');
    define('_WEBLINKS_RSS_SITE_DSC', "Enter a list of RSS url of RSS search site. <br>divide by new-line when specifying more than one. <br>Don't enter ATOM url. ");
    define('_WEBLINKS_RSS_BLACK', 'Black list of RSS/ATOM url');
    define(
        '_WEBLINKS_RSS_BLACK_DSC',
        'Enter a list of url to refuse when collecting RSS/ATOM feeds. <br>divide by new-line when specifying more than one. <br>You can use the regular expression of perl. '
    );
    define('_WEBLINKS_RSS_WHITE', 'White list of RSS/ATOM url');
    define(
        '_WEBLINKS_RSS_WHITE_DSC',
        'Enter list of url to collect when matching with a blacklist. <br>divide by new-line when specifying more than one. <br>You can use the regular expression of perl. '
    );
    define('_WEBLINKS_RSS_URL_CHECK', 'There are some link urls matching with a blacklist. ');
    define('_WEBLINKS_RSS_URL_CHECK_DSC', 'Please copy and paste of the lower white list to a registration form, if you require. ');
    define('_WEBLINKS_RSS_UPDATED', 'Update RSS/ATOM setting');
    define('_WEBLINKS_ADMIN_RSS_VIEW', 'Setting of view of RSS/ATOM Feeds');
    define('_WEBLINKS_RSS_MODE_TITLE', 'Use of HTML tag of the title');
    define('_WEBLINKS_RSS_MODE_TITLE_DSC', 'When selcet "YES", show title with HTML tag, if title have HTML tag. <br>When selcet "NO", show title striping HTML tag. ');
    define('_WEBLINKS_RSS_MODE_CONTENT', 'Use of HTML tag of the content');
    define('_WEBLINKS_RSS_MODE_CONTENT_DSC', 'When selcet "YES", show content with HTML tag, if content have HTML tag. <br>When selcet "NO", show content striping HTML tag. ');
    define('_WEBLINKS_RSS_NEW', 'Select the maximum number of "new RSS/ATOM feeds" displayed on top page');
    define('_WEBLINKS_RSS_NEW_DSC', 'Enter the maximum number of new RSS/ATOM feeds to be displayed in the Main page.');
    define('_WEBLINKS_RSS_PERPAGE', 'Select the maximum number of RSS/ATOM feeds displayed in and Link detail page and RSS/ATOM page');
    define('_WEBLINKS_RSS_PERPAGE_DSC', 'Enter the maximum number of RSS/ATOM feeds to be shown in RSS/ATOM page. ');
    define('_WEBLINKS_RSS_NUM_CONTENT', 'Number of feeds which displays the content');
    define(
        '_WEBLINKS_RSS_NUM_CONTENT_DSC',
        'Enter the number of feeds which displays the content of RSS/ATOM feeds in Link detail page. <br>A summary is displayed on the feeds more than the number. '
    );
    define('_WEBLINKS_RSS_MAX_CONTENT', 'Maximum number of characters used for RSS/ATOM feed content');
    define(
        '_WEBLINKS_RSS_MAX_CONTENT_DSC',
        'Enter the maximum number of characters to be used for RSS/ATOM feed content in RSS/ATOM page.  <br>It is effective when "Use of HTML tag of the contents" is "no." '
    );
    define('_WEBLINKS_RSS_MAX_SUMMARY', 'Maximum number of characters used for RSS/ATOM feed summary');
    define('_WEBLINKS_RSS_MAX_SUMMARY_DSC', 'Enter the maximum number of characters to be used for RSS/ATOM feed summary in the Main page. ');
    define('_WEBLINKS_ADMIN_POST', 'Feldeinstellungen');
    define('_WEBLINKS_ADMIN_POST_TEXT_1', "Bei Auswahl von 'nicht nutzen', wird das Feld nicht in der Eintragsmaske angezeigt. ");
    define('_WEBLINKS_ADMIN_POST_TEXT_2', "Bei Auswahl von 'nutzen' wird das Feld in der Eingabemaske angezeigt. ");
    define('_WEBLINKS_ADMIN_POST_TEXT_3', "Bei Auswahl von 'Pflichtfeld', wird �berpr�ft, ob eine Eingabe erfolgt ist. ");
    define('_WEBLINKS_NO_USE', 'nicht nutzen');
    define('_WEBLINKS_USE', 'nutzen');
    define('_WEBLINKS_INDISPENSABLE', 'Pflichtfeld');
    define('_WEBLINKS_TYPE_DESC', 'Art der Linkbeschreibung im Eintragsformular');
    define('_WEBLINKS_TYPE_DESC_DSC', 'Wenn <b>NEIN</b>, <br>wird ein normales Texteingabefeld genutzt.<br>Wenn <b>JA</b>, <br>wird das XOOPS DHTML Textfenster genutzt. ');
    define('_WEBLINKS_CHECK_DOUBLE', '�berpr�fung bereits existierender Links');
    define('_WEBLINKS_CHECK_DOUBLE_DSC', 'Wenn <b>NEIN</b>, <br>erfolgt keine Pr�fung. <br> Wenn <b>JA</b>, <br>wird nach Doppeleintr�gen gepr�ft. ');
    define('_WEBLINKS_POST_UPDATED', '�nderungen abschicken');
    define('_WEBLINKS_ADMIN_CAT_SET', 'Kategorieeinstellungen');
    define('_WEBLINKS_CAT_SEL', 'Maximale Anzahl an w�hlbaren Kategorien');
    define('_WEBLINKS_CAT_SEL_DSC', '');
    define('_WEBLINKS_CAT_SUB', 'Anzeige der Unterkategorien');
    define('_WEBLINKS_CAT_SUB_DSC', 'Auswahl der angezeigten Unterkategorien');
    define('_WEBLINKS_CAT_IMG_MODE', 'W�hle Kategoriegrafik');
    define(
        '_WEBLINKS_CAT_IMG_MODE_DSC',
        'Wenn <b>KEINE</b>, erfolgt keine Kategoriegrafik. <br>Wenn <b>folder.gif</b>, wird diese Grafik angezeigt. <br>Wenn<b>Auswahlgrafik</b>, wird gew�hlte Grafikdatei aus der Kategorieeinstellung angezeigt. '
    );
    define('_WEBLINKS_CAT_IMG_MODE_1', 'folder.gif');
    define('_WEBLINKS_CAT_IMG_MODE_2', 'Auswahlgrafik');
    define('_WEBLINKS_CAT_IMG_WIDTH', 'Maximale H�he der Kategoriegrafik');
    define('_WEBLINKS_CAT_IMG_HEIGHT', 'Maximale Breite der Kategoriegrafik');
    define('_WEBLINKS_CAT_IMG_SIZE_DSC', 'Nur wenn <b>Auswahlgrafik</b> gew�hlt wurde, gelten diese Einstellungen. ');
    define('_WEBLINKS_CAT_UPDATED', '�nderungen abschicken');
    define('_WEBLINKS_ADMIN_CATEGORY_MANAGE', 'Kategoriemanagement');
    define('_WEBLINKS_ADMIN_CATEGORY_LIST', 'Liste der Kategorien');
    define('_WEBLINKS_ORDER_TREE', ' Baumstruktur');
    define('_WEBLINKS_CAT_ORDER', 'Kategorieordnung');
    define('_WEBLINKS_THERE_ARE_CATEGORY', 'Es sind <b>%s</b> Kategorien in der Datenbank');
    define('_WEBLINKS_ADMIN_CATEGORY_NOTICE_1', 'Bei Auswahl <b>Liste nach ID</b>, zur Kategorie�nderung. ');
    define('_WEBLINKS_ADMIN_CATEGORY_NOTICE_2', 'Auswahl <b>Oberkategorie</b> oder <b>Titel</b>, zur Anornung der Kategorieliste. ');
    define('_WEBLINKS_NO_CATEGORY', 'Keine entsprechende Kategorie gefunden. ');
    define('_WEBLINKS_NUM_SUBCAT', 'Nummer der Unterkategorie');
    define('_WEBLINKS_ORDERS_UPDATED', '�nderung abschicken');
    define('_WEBLINKS_IMGURL_MAIN', 'URL der Kategoriegrafik');
    define('_WEBLINKS_IMGURL_MAIN_DSC1', 'optional. <br>Gr��e wird automatisch angepasst. ');
    // define("_WEBLINKS_IMGURL_MAIN_DSC2", "Wird nur in der Kategorie�bersicht angezeigt. ");
    define('_WEBLINKS_ADMIN_LINK_MANAGE', 'Linkmanagement');
    define('_WEBLINKS_ADMIN_LINK_LIST', 'Liste der Links');
    define('_WEBLINKS_ADMIN_LINK_BROKEN', 'List der ung�ltigen Links');
    define('_WEBLINKS_ADMIN_LINK_ALL_ASC', 'Liste aller Links (sortiert nach �ltester ID) ');
    define('_WEBLINKS_ADMIN_LINK_ALL_DESC', 'Liste aller Links (sortiert nach neuester ID) ');
    define('_WEBLINKS_ADMIN_LINK_NOURL', 'Liste aller Links, deren URL nicht gesetzt ist');
    define('_WEBLINKS_COUNT_BROKEN', 'Anzahl ung�ltiger Links');
    define('_WEBLINKS_NO_LINK', 'Es gibt keine entsprechenden Links. ');
    define('_WEBLINKS_ADMIN_PRESENT_SAVE', 'Die Daten wurden in der datenbank gesichert. ');
    define('_WEBLINKS_ADMIN_LINK_CHECK_UPDATE', 'Link�berpr�fung und Update');
    define('_WEBLINKS_ADMIN_LINK_BROKEN_CHECK', 'Pr�fung ung�ltiger Links');
    define('_WEBLINKS_ADMIN_BROKEN_CHECK', 'pr�fen');
    define('_WEBLINKS_ADMIN_BROKEN_RESULT', 'Pr�fergebnis');
    define(
        '_WEBLINKS_ADMIN_LINK_BROKEN_CHECK_CAUTION',
        'Ein timeout ist aufgetreten, es gibt viele ung�ltige Links.<br>Bitte eine Maximalanzahl der zu �berpr�fenden Links w�hlen.<br>Bei Auswahl =0 gibt es keine Beschr�nkungen. <br>'
    );
    define('_WEBLINKS_ADMIN_LINK_BROKEN_CHECK_NOTICE', 'Link�nderungsseite wird bei Klick auf <b> Link ID<7B> ge�ffnet. <br>Linkentsprechung wird bei Klick auf <b>Webseite URL</b> ge�ffnet');
    define('_WEBLINKS_ADMIN_LINK_BROKEN_CHECK_GOOGLE', 'Googlesuche wird bei Klick auf <b>Webseitentitel</b> ge�ffnet');
    define('_WEBLINKS_ADMIN_LIMIT', 'Maximum der gepr�ften Links');
    define('_WEBLINKS_ADMIN_OFFSET', 'Offset (offset)');
    // define("_WEBLINKS_ADMIN_CHECK", "�berfr�fen");
    define('_WEBLINKS_ADMIN_TIME_START', 'Startzeit');
    define('_WEBLINKS_ADMIN_TIME_END', 'Endzeit');
    define('_WEBLINKS_ADMIN_TIME_ELAPSE', 'Elapse time');
    define('_WEBLINKS_ADMIN_LINK_NUM_ALL', 'Alle Links');
    define('_WEBLINKS_ADMIN_LINK_NUM_CHECK', 'Gepr�fte Links');
    define('_WEBLINKS_ADMIN_LINK_NUM_BROKEN', 'Ung�ltige Links');
    define('_WEBLINKS_ADMIN_NUM', 'Links');
    define('_WEBLINKS_ADMIN_MIN_SEC', '%s min %s sec');
    define('_WEBLINKS_ADMIN_CHECK_NEXT', '�berpr�fe n�chste %s Links');
    define('_WEBLINKS_ADMIN_RSS_MANAGE', 'Managemnt of RSS/ATOM feed');
    define('_WEBLINKS_ADMIN_RSS_REFRESH', 'Refresh of RSS/ATOM');
    define('_WEBLINKS_ADMIN_RSS_REFRESH_LINK', 'Refresh cache of link data');
    define('_WEBLINKS_ADMIN_RSS_REFRESH_SITE', 'Refresh cache of RSS search site');
    define('_WEBLINKS_ADMIN_NUM_REFRESH_RSS_URL', 'Number of RSS/ATOM url refreshed');
    define('_WEBLINKS_ADMIN_NUM_REFRESH_RSS_SITE', 'Number of RSS/ATOM site refreshed url');
    define('_WEBLINKS_ADMIN_NUM_REFRESH_ATOM_SITE', 'Number of RSS/ATOM site refreshed feed');
    define('_WEBLINKS_ADMIN_NUM_REFRESH_ATOMFEED', 'Number of RSS/ATOM feed refreshed');
    define('_WEBLINKS_ADMIN_RSS_CACHE_CLEAR', 'Clear cache of RSS/ATOM feed');
    define('_WEBLINKS_RSS_CLEAR_NUM', 'Clear cache of RSS/ATOM feed in the old order of a date, if more than the specified number of feeds.');
    define('_WEBLINKS_RSS_NUMBER', 'number of feeds');
    define('_WEBLINKS_RSS_CLEAR_LID', 'Clear cache which specified link ID');
    define('_WEBLINKS_RSS_CLEAR_ALL', 'Clear all cache');
    define('_WEBLINKS_NUM_RSS_CLEAR_LINK', 'Number of RSS/ATOM cache cleard');
    define('_WEBLINKS_NUM_RSS_CLEAR_ATOMFEED', 'Number of ATOM/RSS feed cleard');
    define('_WEBLINKS_ADMIN_USER_MANAGE', 'Usermanagement');
    define('_WEBLINKS_ADMIN_USER_EMAIL', 'List der User mit Mailadresse');
    define('_WEBLINKS_ADMIN_USER_LINK', 'Liste der registrierten User mit einem Linkeintrag');
    define('_WEBLINKS_ADMIN_USER_NOLINK', 'Liste der registrierten User ohne Linkeintrag');
    define('_WEBLINKS_ADMIN_USER_EMAIL_DSC', 'Nur eine Mailadresse wird bei Mehrfacheintr�gen angezeigt');
    // define("_WEBLINKS_ADMIN_USER_LINK_DSC", "Nutze \"Sende Mail an den User\"");
    // define("_WEBLINKS_USER_ALL", " (alle) ");
    // define("_WEBLINKS_USER_MAX", " (Liste von  %s Personen) ");
    define('_WEBLINKS_THERE_ARE_USER', '<b>%s</b> User gefunden');
    define('_WEBLINKS_USER_NUM', 'Anzeige von  %s . Person bis %s .Person.');
    define('_WEBLINKS_USER_NOFOUND', 'Keinen User gefunden');
    define('_WEBLINKS_UID_EMAIL', 'Emailadresse des Linkeinsenders');
    define('_WEBLINKS_ADMIN_SENDMAIL', 'Sende Email');
    define('_WEBLINKS_THERE_ARE_EMAIL', 'Es sind <b>%s</b> Mails');
    define('_WEBLINKS_SEND_NUM', 'Sende Mail von %s. Person bis %s. Person');
    // define("_WEBLINKS_SEND_NEXT", "Sende die n�chsten %s Mails");
    // define("_WEBLINKS_SUBJECT_FROM", "Informationen von %s");
    // define("_WEBLINKS_HELLO", "Hallo %s");
    define('_WEBLINKS_MAIL_TAGS1', '{W_NAME} Username wird eingef�gt');
    define('_WEBLINKS_MAIL_TAGS2', '{W_EMAIL} Mailadresse wird eingef�gt');
    define('_WEBLINKS_MAIL_TAGS3', '');
    // define("_WEBLINKS_WEBMASTER", "Webmaster");
    define('_WEBLINKS_SUBMITTER', 'Eintragender');
    define('_WEBLINKS_UPDATE', '�ndern');
    define('_WEBLINKS_SET_DEFAULT', 'Setze Standard');
    define('_WEBLINKS_CLEAR', 'L�sche');
    define('_WEBLINKS_CHECK', '�berpr�fe');
    define('_WEBLINKS_NON', 'Noting to do');
    // define("_WEBLINKS_SENDMAIL", "Sende Mail");
    define('_WEBLINKS_ADMIN_NO_LINK_BROKEN_CHECK', 'Es ist kein Link vorhanden zum &uuml;berpr&uuml;fen');
    define('_WEBLINKS_ADMIN_NO_RSS_REFRESH', 'Es ist kein RSS vorhanden zum updaten');
    define('_WEBLINKS_LINK_APPROVED', 'Der Link wurde genehmigt');
    define('_WEBLINKS_LINK_REFUSED', 'Der Link wurde abgelehnt');
    define('_AM_WEBLINKS_INDEX_DESC', 'Hauptseite - einleitender Text');
    define('_AM_WEBLINKS_INDEX_DESC_DSC', 'Du kannst diesen Abschnitt einen einleitenden Text anzuzeigen lassen. HTML ist erlaubt.');
    define(
        '_AM_WEBLINKS_INDEX_DESC_DEFAULT',
        '<div align="center" style="color: #0000ff">Here is where your page introduction goes.<br>Das kann eingestellt werden in "Modul Konfiguration 2".<br></div>'
    );
    define('_AM_WEBLINKS_ADD_CATEGORY', 'neue Kategorie hinzuf�gen');
    define('_AM_WEBLINKS_ERROR_SOME', 'Es gibt einige Fehlermeldungen');
    define('_AM_WEBLINKS_LIST_ID_ASC', 'Liste nach alter ID');
    define('_AM_WEBLINKS_LIST_ID_DESC', 'Liste nach neuer ID');
    // define("_AM_WEBLINKS_WARNING_NOT_WRITABLE", "Das Verzeichnis ist nich beschreibbar");
    define('_AM_WEBLINKS_CONF_LINK', 'Link Konfiguration');
    define('_AM_WEBLINKS_CONF_LINK_IMAGE', 'Link-Bild Konfiguration');
    define('_AM_WEBLINKS_CONF_VIEW', 'zeige Konfiguration');
    define('_AM_WEBLINKS_CONF_TOPTEN', 'TopTen konfigurieren');
    define('_AM_WEBLINKS_CONF_SEARCH', 'Suche konfigurieren');
    define('_AM_WEBLINKS_USE_BROKENLINK', 'Erlaube ung�ltigen Link zu melden');
    define('_AM_WEBLINKS_USE_BROKENLINK_DSC', 'Wenn JA gew�hlt, <br>k�nnen ung�ltige Links gemeldet werden');
    define('_AM_WEBLINKS_USE_HITS', 'Erlaube Link Zugriffsz�hler');
    define('_AM_WEBLINKS_USE_HITS_DSC', 'Wenn JA gew�hlt, <br>wird der Link Zugriffsz�hler aktiviert');
    define('_AM_WEBLINKS_USE_PASSWD', 'Passwort Authentifizierung');
    define(
        '_AM_WEBLINKS_USE_PASSWD_DSC',
        'Wenn JA gew�hlt,<br>k�nnen <b>anonyme Benutzer</b> einen Link durch Passwort Authentifizierung �ndern.<br>Wenn NEIN gew�hlt, <br>wird das Pwsswort Feld nicht angezeigt.'
    );
    define('_AM_WEBLINKS_PASSWD_MIN', 'Minimale L�nge des erforderlichen Passworts');
    define('_AM_WEBLINKS_POST_TEXT', 'Der Administrator hat alle Verwaltungsrechte');
    define('_AM_WEBLINKS_AUTH_DOHTML', 'Berechtigung, HTML Tags zu verwenden');
    define('_AM_WEBLINKS_AUTH_DOHTML_DSC', 'Gruppe angeben, die HTML Tags verwenden kann');
    define('_AM_WEBLINKS_AUTH_DOSMILEY', 'Berechtigung, Smileys zu verwenden');
    define('_AM_WEBLINKS_AUTH_DOSMILEY_DSC', 'Gruppe angeben, die Smileys verwenden kann');
    define('_AM_WEBLINKS_AUTH_DOXCODE', 'Berechtigung, XOOPS Code zu verwenden');
    define('_AM_WEBLINKS_AUTH_DOXCODE_DSC', 'Gruppe angeben, die XOOPS Code verwenden kann');
    define('_AM_WEBLINKS_AUTH_DOIMAGE', 'Berechtigung, Images zu verwenden');
    define('_AM_WEBLINKS_AUTH_DOIMAGE_DSC', 'Gruppe angeben, die Images verwenden k�nnen');
    define('_AM_WEBLINKS_AUTH_DOBR', 'Berechtigung, Zeilenwechsel zu verwenden');
    define('_AM_WEBLINKS_AUTH_DOBR_DSC', 'Gruppe angeben, die Zeilenwechsel verwenden k�nnen');
    define('_AM_WEBLINKS_SHOW_CATLIST', 'Zeige Kategorie Liste im Untermen�');
    define('_AM_WEBLINKS_SHOW_CATLIST_DSC', 'Wenn JA gew�hlt, <br>wird eine Liste der �bergeordneten Kategorien im Untermen� angezeigt');
    define('_AM_WEBLINKS_VIEW_URL', 'URL Anzeigestil');
    define(
        '_AM_WEBLINKS_VIEW_URL_DSC',
        'Wenn "kein" gew�hlt, <br>werden url und &lt;a&gt; tag nicht angezeigt.<br>Wenn "Indirekt" gew�hlt, <br>zeige visit.php im href Feld anstatt der URL. <br>Wenn "Direkt" gew�hlt, <br>zeige url im href Feld, JavaScript im onmousedown Feld und Zugriffe werden mit JavaScript gez�hlt.'
    );
    define('_AM_WEBLINKS_VIEW_URL_0', 'kein');
    define('_AM_WEBLINKS_VIEW_URL_1', 'Indirekte url');
    define('_AM_WEBLINKS_VIEW_URL_2', 'Direkte url');
    define('_AM_WEBLINKS_RECOMMEND_PRI', 'Priorit�t der vorgeschlagenen Seite');
    define(
        '_AM_WEBLINKS_RECOMMEND_PRI_DSC',
        'Wenn "keine" gew�hlt, <br>keine Anzeige.<br>Wenn "Normal" gew�hlt, <br>Anzeige im Header.<br>Wenn "H�her" gew�hlt, <br>Anzeige in h�herem Rang in jeder Kategorie.'
    );
    define('_AM_WEBLINKS_MUTUAL_PRI', 'Priorit�t der reziproken Seite');
    define(
        '_AM_WEBLINKS_MUTUAL_PRI_DSC',
        'Wenn "keine" gew�hlt, <br>keine Anzeige.<br>Wenn "Normal" gew�hlt, <br>Anzeige im Header.<br>Wenn "H�her" gew�hlt, <br>Anzeige in h�herem Rang in jeder Kategorie.'
    );
    define('_AM_WEBLINKS_PRI_0', 'keine');
    define('_AM_WEBLINKS_PRI_1', 'Normal');
    define('_AM_WEBLINKS_PRI_2', 'H�her');
    define('_AM_WEBLINKS_LINK_IMAGE_AUTO', 'Automatische Aktualisierung der Banner Image Gr��e');
    define('_AM_WEBLINKS_LINK_IMAGE_AUTO_DSC', 'Wenn JA gew�hlt, <br>wirde die Banner Image Gr��e automatisch aktualisiert, wenn eine Link Liste oder ein Link Detail Information angezeigt wird.');
    define('_AM_WEBLINKS_RSS_USE', 'Benutze RSS Feed');
    define('_AM_WEBLINKS_RSS_USE_DSC', 'Wenn JA gew�hlt, <br>erhalte und zeige RSS/ATOM Feed.');
    define('_AM_WEBLINKS_BULK_IMPORT', 'Massen Import');
    define('_AM_WEBLINKS_BULK_IMPORT_FILE', 'Massen Import aus Datei');
    define('_AM_WEBLINKS_BULK_CAT', 'Massen Import von Kategorien');
    define('_AM_WEBLINKS_BULK_CAT_DSC1', 'Beschreibe Kategorien');
    define('_AM_WEBLINKS_BULK_CAT_DSC2', 'Markieren Sie Unterkategorien durch eine spitze Klammer (>) am Anfang der Zeile.');
    define('_AM_WEBLINKS_BULK_LINK', 'Massen Import von Links');
    define('_AM_WEBLINKS_BULK_LINK_DSC1', 'Beschreiben Sie ein Kategorie in der ersten Zeile.');
    define('_AM_WEBLINKS_BULK_LINK_DSC2', 'Beschreiben Sie Titel, URL und Erkl�rung, getrennt durch Komma(,) in der zweiten Zeile.');
    define('_AM_WEBLINKS_BULK_LINK_DSC3', 'Wiederholte Spezifikation durch verwendung einer horizontalen Linie (---).');
    define('_AM_WEBLINKS_BULK_ERROR_LAYER', 'Spezifiere zwei oder mehrere Unterebenen in der Kategorie Baumstruktur.');
    define('_AM_WEBLINKS_BULK_ERROR_CID', 'Falsche Kategorie ID');
    define('_AM_WEBLINKS_BULK_ERROR_PID', 'Falsche �bergeordnete Kategorie ID');
    define('_AM_WEBLINKS_BULK_ERROR_FINISH', 'Fertiggestellt mit Fehler');
    // define("_AM_WEBLINKS_CREATE_CONFIG", "Erzeuge Konfigurations Datei");
    // define("_AM_WEBLINKS_TEST_EXEC", "Teste Ausf�hrung f�r %s");
    define('_AM_WEBLINKS_MODULE_CONFIG_3', 'Modul Konfiguration 3');
    define('_AM_WEBLINKS_MODULE_CONFIG_4', 'Modul Konfiguration 4');
    define('_AM_WEBLINKS_VOTE_LIST', 'Bewertungsliste');
    define('_AM_WEBLINKS_CATLINK_LIST', 'Kategorisierte Link Liste');
    // define("_AM_WEBLINKS_COMMAND_MANAGE", "Befehls Verwaltung");
    define('_AM_WEBLINKS_TABLE_MANAGE', 'DB Tabellen Verwaltung');
    define('_AM_WEBLINKS_IMPORT_MANAGE', 'Import Verwaltung');
    define('_AM_WEBLINKS_EXPORT_MANAGE', 'Export Verwaltung');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_2', 'Auth, Cat, etc');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_3', 'Link');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_4', 'RSS, Map');
    define('_AM_WEBLINKS_LINK_REGISTER', 'Link Einstellungen: Beschreibung ');
    // define("_AM_WEBLINKS_FORM_BIN", "Befehle Konfiguration");
    // define("_AM_WEBLINKS_FORM_BIN_DESC", "Verwendet bei bin Befehlen");
    // define("_AM_WEBLINKS_CONF_BIN_PASS", "Passwort");
    // define("_AM_WEBLINKS_CONF_BIN_SEND", "Sende Mail");
    // define("_AM_WEBLINKS_CONF_BIN_MAILTO", "Email senden an");
    // define("_AM_WEBLINKS_RSS_DIRNAME", "RSSC Modul Dirname");
    define('_AM_WEBLINKS_DEL_LINK', 'L&ouml;sche Link');
    define('_AM_WEBLINKS_ADD_RSSC', 'Link in RSSC Modul hinzuf�gen');
    define('_AM_WEBLINKS_MOD_RSSC', 'Link in RSSC Modul �ndern');
    define('_AM_WEBLINKS_REFRESH_RSSC', 'Link in RSSC Modul aktualisieren');
    define('_AM_WEBLINKS_APPROVE', 'Neuen Link best�tigen');
    define('_AM_WEBLINKS_APPROVE_MOD', 'Link �nderung best�tigen');
    define('_AM_WEBLINKS_RSSC_LID_SAVED', 'Gespeicherte rssc lid');
    define('_AM_WEBLINKS_GOTO_LINK_LIST', 'Gehe zu Link Liste');
    define('_AM_WEBLINKS_GOTO_LINK_EDIT', 'Gehe zu Link �ndern');
    define('_AM_WEBLINKS_ADD_BANNER', 'Banner Image Gr��e hinzuf�gen');
    define('_AM_WEBLINKS_MOD_BANNER', 'Banner Image Gr��e �ndern');
    define('_AM_WEBLINKS_VOTE_USER', 'Stimmen registrierter Benutzer');
    define('_AM_WEBLINKS_VOTE_ANON', 'Stimmen anonymer Benutzer');
    define('_AM_WEBLINKS_CONF_LOCATE', 'L&auml;nderkonfiguration');
    define('_AM_WEBLINKS_CONF_COUNTRY_CODE', 'L&auml;nder-Code');
    define(
        '_AM_WEBLINKS_CONF_COUNTRY_CODE_DESC',
        'Eingabe ccTLDs code (f&uuml;r Deutschland ist es: de)<br> <a href="https://www.iana.org/cctld/cctld-whois.htm" target="_blank">IANA: Country-Code Top-Level Domains</a>'
    );
    define('_AM_WEBLINKS_CONF_RENEW_COUNTRY_CODE_DESC', 'Aktualisiere das Objekt das sich auf den L�ndercode bezieht. <br> Das Objekt mit der <span style="color:#0000ff;">#</span> Markierung');
    define('_AM_WEBLINKS_RENEW', 'Erneuern');
    define('_AM_WEBLINKS_CONF_MAP', 'Kartenkonfiguration');
    define('_AM_WEBLINKS_CONF_MAP_USE', 'diese Karte nutzen?');
    define('_AM_WEBLINKS_CONF_MAP_TEMPLATE', 'Template der Karte');
    define('_AM_WEBLINKS_CONF_MAP_TEMPLATE_DESC', 'Enter template file name in template/map/ directory');
    define('_AM_WEBLINKS_CONF_GOOGLE_MAP', 'Google Map Konfiguration');
    define('_AM_WEBLINKS_CONF_GM_USE', 'Google Map benutzen');
    define('_AM_WEBLINKS_CONF_GM_APIKEY', 'Google Maps API key');
    define(
        '_AM_WEBLINKS_CONF_GM_APIKEY_DESC',
        'Holen Sie sich einen API key auf <br> <a href="https://www.google.com/apis/maps/signup.html" target="_blank">https://www.google.com/apis/maps/signup.html</a> <br> wenn Sie GoogleMaps benutzen.'
    );
    define('_AM_WEBLINKS_CONF_GM_SERVER', 'Server Name');
    define('_AM_WEBLINKS_CONF_GM_LANG', 'Sprachcode');
    define('_AM_WEBLINKS_CONF_GM_LOCATION', 'default Position');
    define('_AM_WEBLINKS_CONF_GM_LATITUDE', 'default Latitude');
    define('_AM_WEBLINKS_CONF_GM_LONGITUDE', 'default Longitude');
    define('_AM_WEBLINKS_CONF_GM_ZOOM', 'default Zoom Level');
    define('_AM_WEBLINKS_CONF_GOOGLE_SEARCH', 'Google Suche Best�tigung');
    define('_AM_WEBLINKS_CONF_GOOGLE_SERVER', 'Server Name');
    define('_AM_WEBLINKS_CONF_GOOGLE_LANG', 'Sprachcode');
    // define("_AM_WEBLINKS_CONF_TEMPLATE", "L�sche Cache der Vorlagen");
    define('_AM_WEBLINKS_CONF_TEMPLATE_DESC', 'MUSS ausgef�hrt werden wenn �nderungen in template/parts/ template/xml/ und template/map/ Verzeichnis durchgef�hrt wurden');
    // define("_AM_WEBLINKS_TIME_PUBLISH", "Setze Ver�ffentlichungszeit");
    // define("_AM_WEBLINKS_TIME_PUBLISH_DESC", "Wird dieser Punkt nicht gew�hlt, bleibt die Ver�ffentlichungszeit leer");
    // define("_AM_WEBLINKS_TIME_EXPIRE", "Setze Ablaufzeit");
    // define("_AM_WEBLINKS_TIME_EXPIRE_DESC", "Wird dieser Punkt nicht gew�hlt, bleibt die Ablaufzeit leer");
    define('_AM_WEBLINKS_LINK_TIME_PUBLISH_BEFORE', 'Link Liste vor Ver�ffentlichungszeit');
    define('_AM_WEBLINKS_LINK_TIME_EXPIRE_AFTER', 'Link Liste nach Ablaufzeit');
    define('_AM_WEBLINKS_SERVER_ENV', 'Server Umgebung ');
    define('_AM_WEBLINKS_DEBUG_CONF', 'Debug Variablen');
    define('_AM_WEBLINKS_ALL_GREEN', 'Alles Gr�n');
    define('_AM_WEBLINKS_UPDATE_CAT_PATH', 'Aktualisiere Kategorie Verzeichnispfad');
    define('_AM_WEBLINKS_UPDATE_CAT_COUNT', 'Aktualisiere Kategorie Linkz�hler');
    define('_AM_WEBLINKS_CAT_COUNT_UPDATED', 'Kategorie Verzeichnispfad aktualisiert');
    define('_AM_WEBLINKS_SYSTEM_POST_LINK', 'Beitragsz�hler erh�hen beim einsenden eines Link');
    define('_AM_WEBLINKS_SYSTEM_POST_LINK_DSC', 'JA erh�ht den Beitragsz�hler des Xoops Benutzer beim einsenden eines Link. ');
    define('_AM_WEBLINKS_SYSTEM_POST_RATE', 'Beitragsz�hler erh�hen beim bewerten eines Link');
    define('_AM_WEBLINKS_SYSTEM_POST_RATE_DSC', 'JA erh�ht den Beitragsz�hler des Xoops Benutzer beim bewerten eines Link ');
    define('_AM_WEBLINKS_VIEW_STYLE_CAT', 'Anzeigestil in jeder Kategorie');
    define('_AM_WEBLINKS_VIEW_STYLE_MARK', 'Anzeigestil in Seite empfehlen');
    define('_AM_WEBLINKS_VIEW_STYLE_MARK_DSC', 'G�ltig f�r Seite empfehlen, Partnerseite, RSS/ATOM Seite');
    define('_AM_WEBLINKS_VIEW_STYLE_0', 'Zusammenfassung');
    define('_AM_WEBLINKS_VIEW_STYLE_1', 'Alle Details');
    define('_AM_WEBLINKS_CONF_PERFORMANCE', 'Leistungsverbesserung');
    define(
        '_AM_WEBLINKS_CONF_PERFORMANCE_DSC',
        'Zur Leistungssteigerung werden ben�tigte Daten im voraus berrechnet und in der Datenbank gespeichert.<br>Bei der ersten Verwendung f�hren Sie bitte "Kategorie Liste" -> "Aktualisiere Kategorie Verzeichnispfad" aus'
    );
    define('_AM_WEBLINKS_CAT_PATH', 'Kategorie Verzeichnispfad');
    define('_AM_WEBLINKS_CAT_PATH_DSC', 'JA berechnet den Kategorie Verzeichnispfad und speichert ihn in der Kategorientagbelle.<br>NEIN berechnet erst beim anzeigen.');
    define('_AM_WEBLINKS_CAT_COUNT', 'Kategorie Linkz�hler');
    define('_AM_WEBLINKS_CAT_COUNT_DSC', 'JA berechnet den Kategorienz�hler und speichert ihn in der Kategorientabelle.<br>NEIN berechnet erst beim anzeigen.');
    define('_AM_WEBLINKS_POST_TEXT_4', 'Alle Objekte werden in der Admin Seite angezeigt');
    define('_AM_WEBLINKS_LINK_REGISTER_1', 'Link Einstellungen: Textarea');
    define('_AM_WEBLINKS_CONF_LINK_GUEST', 'Link registrieren Konfiguration');
    define('_AM_WEBLINKS_USE_CAPTCHA', 'Benutze CAPTCHA');
    define(
        '_AM_WEBLINKS_USE_CAPTCHA_DSC',
        'CAPTCHA ist eine Technik zur SPAM Vermeidung.<br>Dieses Option ben�tigt das CAPTCHA Modul.<br>JA, <b>anoyme Benutzer</b> m�ssen CAPTCHA benutzen um einen Link einzusenden oder zu �ndern.<br>NEIN zeigt das CAPTCHA Feld nicht an.'
    );
    define('_AM_WEBLINKS_CAPTCHA_FINDED', 'Captcha Modul Version %s wurde gefunden');
    define('_AM_WEBLINKS_CAPTCHA_NOT_FINDED', 'Captcha Modul wurde nicht gefunden');
    define('_AM_WEBLINKS_CONF_SUBMIT', 'Beschreibung des Link Register Form');
    define('_AM_WEBLINKS_SUBMIT_MAIN', 'Beschreibung von Link hinzuf�gen: 1');
    define('_AM_WEBLINKS_SUBMIT_PENDING', 'Beschreibung von Link hinzuf�gen: 2');
    define('_AM_WEBLINKS_SUBMIT_DOUBLE', 'Beschreibung von Link hinzuf�gen: 3');
    define('_AM_WEBLINKS_SUBMIT_MAIN_DSC', 'Immer anzeigen');
    define('_AM_WEBLINKS_SUBMIT_PENDING_DSC', 'Zeige wenn "Administrator Best�tigung erforderlich" aktiviert');
    define('_AM_WEBLINKS_SUBMIT_DOUBLE_DSC', 'Zeige wenn "�berpr�fe ob Link existiert" aktiviert');
    define('_AM_WEBLINKS_MODLINK_MAIN', 'Beschreibung von Link �ndern: 1');
    define('_AM_WEBLINKS_MODLINK_PENDING', 'Beschreibung von Link �ndern: 2');
    define('_AM_WEBLINKS_MODLINK_NOT_OWNER', 'Beschreibung von Link �ndern: 3');
    define('_AM_WEBLINKS_MODLINK_NOT_OWNER_DSC', 'Zeige wenn "Administrator Best�tigung erforderlich" aktiviert und der �ndernde ist nicht Eigent�mer');
    define('_AM_WEBLINKS_CONF_CAT_FORUM', 'Zeige Forum in Kategorie');
    define('_AM_WEBLINKS_CONF_LINK_FORUM', 'Zeige Forum in Link');
    // define("_AM_WEBLINKS_FORUM_SEL", "W�hle Forum Modul");
    define('_AM_WEBLINKS_FORUM_THREAD_LIMIT', 'Anzahl der angezeigten Diskussionen');
    define('_AM_WEBLINKS_FORUM_POST_LIMIT', 'Anzahl der angezeigten Beitr�ge in jeder Diskussion');
    define('_AM_WEBLINKS_FORUM_POST_ORDER', 'Sortierung der Beitr�ge');
    define('_AM_WEBLINKS_FORUM_POST_ORDER_0', 'Alte Beitr�ge zuerst');
    define('_AM_WEBLINKS_FORUM_POST_ORDER_1', 'Neue Beitr�ge zuerst');
    define('_AM_WEBLINKS_UPDATE_CAT_IMAGE_SIZE', 'Aktualisiere Kategorie Image Gr��e');
    define('_AM_WEBLINKS_CONF_INDEX', 'Index Seite Konfiguration');
    define('_AM_WEBLINKS_CONF_INDEX_GM_MODE', 'Google Map mode');
    define('_AM_WEBLINKS_CAT_SHOW_GM', 'Zeige Google map');
    define('_AM_WEBLINKS_MODE_NON', 'Nicht anzeigen');
    define('_AM_WEBLINKS_MODE_DEFAULT', 'Default Wert');
    define('_AM_WEBLINKS_MODE_PARENT', 'Wie in �bergeordneter Kategorie');
    define('_AM_WEBLINKS_MODE_FOLLOWING', 'Folgende Werte');
    define('_AM_WEBLINKS_CONF_CAT_ALBUM', 'Zeige Album in Kategorie');
    define('_AM_WEBLINKS_CONF_LINK_ALBUM', 'Zeige Album in Link');
    // remove in 1.83
    // define("_AM_WEBLINKS_ALBUM_SEL", "W�hle Album Modul");
    define('_AM_WEBLINKS_ALBUM_LIMIT', 'Anzahl der angezeigten Fotos');
    define('_AM_WEBLINKS_WHEN_OMIT', 'Verfahren wenn weggelassen');
    define('_AM_WEBLINKS_MODULE_INSTALLED', '%s Modul ( %s ) Version %s ist installiert');
    define('_AM_WEBLINKS_MODULE_NOT_INSTALLED', '%s Modul ( %s ) ist nicht installiert');
    define('_AM_WEBLINKS_CAT_DESC_MODE', 'Zeige Beschreibung');
    define('_AM_WEBLINKS_CAT_SHOW_FORUM', 'Zeige Forum');
    define('_AM_WEBLINKS_CAT_SHOW_ALBUM', 'Zeige Album');
    define('_AM_WEBLINKS_MODE_SETTING', 'Setze Wert');
    define('_AM_WEBLINKS_MODE_OMIT_PARENT', 'Wie �bergeordnete Kategorie wenn weggelassen');
    define('_AM_WEBLINKS_CONF_D3FORUM', 'Comment-integration with d3forum module');
    define('_AM_WEBLINKS_PLUGIN_SEL', 'Plugin Select');
    define('_AM_WEBLINKS_DIRNAME_SEL', 'Module Select');
    define('_AM_WEBLINKS_CAT_PATH_STYLE', 'View Style of Category Path');
    define('_AM_WEBLINKS_CONF_CAT_PAGE', 'Category Pgae Setting');
    define('_AM_WEBLINKS_CAT_COLS', 'Number of Columns in Categories');
    define('_AM_WEBLINKS_CAT_COLS_DESC', 'In category page, specify the number of the columns, when showing categories under one hierarchy');
    define('_AM_WEBLINKS_CAT_SUB_MODE', 'View Range of Sub Category');
    define('_AM_WEBLINKS_CAT_SUB_MODE_1', 'Only categories under one hierarchy');
    define('_AM_WEBLINKS_CAT_SUB_MODE_2', 'All caategories under one and more hierarchies');
    define('_AM_WEBLINKS_USE_HIGHLIGHT', 'Use keyword Highlight');
    define('_AM_WEBLINKS_CHECK_MAIL', 'Check Email Format');
    define('_AM_WEBLINKS_CHECK_MAIL_DSC', 'NO allows any format. <br> YES checks that email format is like abc@efg.com when register link. ');
    // define("_AM_WEBLINKS_NO_EMAIL", "Not Set Email Address");
    define('_AM_WEBLINKS_MODULE_CONFIG_0', 'Modulkonfiguration');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_0', 'Index');
    define('_AM_WEBLINKS_MODULE_CONFIG_5', 'Modulkonfiguration 5');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_5', 'Link Register Item');
    define('_AM_WEBLINKS_MODULE_CONFIG_6', 'Modulkonfiguration 6');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_6', 'Google Map');
    define('_AM_WEBLINKS_GM_MAP_CONT', 'Map Control');
    define('_AM_WEBLINKS_GM_MAP_CONT_DESC', 'GLargeMapControl, GSmallMapControl, GSmallZoomControl');
    define('_AM_WEBLINKS_GM_MAP_CONT_NON', 'Nicht zeigen');
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
    define('_AM_WEBLINKS_GM_GEOCODE_KIND', '[Search] Kind of Geocode');
    define(
        '_AM_WEBLINKS_GM_GEOCODE_KIND_DESC',
        'Search latitude and longitude from address<br><b>Single Result</b><br>GClientGeocoder - getLatLng<br><b>More Results</b><br>GClientGeocoder - getLocations'
    );
    define('_AM_WEBLINKS_GM_GEOCODE_KIND_LATLNG', 'Single Result: getLatLng');
    define('_AM_WEBLINKS_GM_GEOCODE_KIND_LOCATIONS', 'More Results: getLocations');
    define('_AM_WEBLINKS_GM_USE_GEOCODE_TOKYO', '[Search][Japan] Use CSI');
    define('_AM_WEBLINKS_GM_USE_GEOCODE_TOKYO_DESC', 'Valid in Japan<br>Search latitude and longitude from address');
    define('_AM_WEBLINKS_GM_USE_NISHIOKA', '[Search][Japan] Use Inverse Geocode');
    define(
        '_AM_WEBLINKS_GM_USE_NISHIOKA_DESC',
        'Valid in Japan<br>Search address from latitude and longitude<br><a href="https://nishioka.sakura.ne.jp/google/" target="_blank">https://nishioka.sakura.ne.jp/google/</a>'
    );
    define('_AM_WEBLINKS_GM_TITLE_LENGTH', '[Marker] Maximum characters for Title');
    define('_AM_WEBLINKS_GM_TITLE_LENGTH_DESC', 'Maximum number of characters used for Title in the marker<br><b>-1</b> is unlimited');
    define('_AM_WEBLINKS_GM_DESC_LENGTH', '[Marker] Maximum characters for Content');
    define('_AM_WEBLINKS_GM_DESC_LENGTH_DESC', 'Maximum number of characters used for Content in the marker<br><b>-1</b> is unlimited');
    define('_AM_WEBLINKS_GM_WORDWRAP', '[Marker] Maximum characters for wordwarp');
    define('_AM_WEBLINKS_GM_WORDWRAP_DESC', 'Maximum number of characters used for per line (wordwrap) in the marker<br><b>-1</b> is unlimited');
    define('_AM_WEBLINKS_GM_USE_CENTER_MARKER', '[Marker] Show the center marker');
    define('_AM_WEBLINKS_GM_USE_CENTER_MARKER_DESC', 'In Main page and Category page, show the center marker');
    define('_AM_WEBLINKS_MAP_JP_MANAGE', 'Japan Map Configuration');
    define('_AM_WEBLINKS_COLUMN_MANAGE', 'Column Management');
    define('_AM_WEBLINKS_COLUMN_MANAGE_DESC', 'Add etc columns in link table and modify table');
    define('_AM_WEBLINKS_COLUMN_MANAGE_NOT_USE', 'Nicht nutzen');
    define('_AM_WEBLINKS_THERE_ARE_COLUMN', 'There are <b>%s</b> etc columns in link table');
    define('_AM_WEBLINKS_COLUMN_NUM', 'Number of adding etc columns');
    define('_AM_WEBLINKS_COLUMN_BIGGER_USE', 'The number of the etc columns is bigger than the number in link table');
    define('_AM_WEBLINKS_COLUMN_UNMATCH', 'The columns is unmatch in link table and modify table');
    define('_AM_WEBLINKS_PHPMYADMIN', 'Correct in the management tool like as phpMyAdmin');
    define('_AM_WEBLINKS_LINK_NUM_ETC', 'The number of etc columns');
    define('_AM_WEBLINKS_INDEX_MODE_LATEST', 'Order of Latest Links');
    define('_AM_WEBLINKS_INDEX_MODE_LATEST_UPDATE', 'Updated Date');
    define('_AM_WEBLINKS_INDEX_MODE_LATEST_CREATE', 'Created Date');
    define('_AM_WEBLINKS_CONF_HTML_STYLE', 'HTML Style Configuration');
    define('_AM_WEBLINKS_HEADER_MODE', 'Use xoops module header');
    define(
        '_AM_WEBLINKS_HEADER_MODE_DESC',
        'When "No", show style sheet and Javascript in body tag<br>When "Yes", show them in header tag, using xoops module header<br>there are same themes which can not be used'
    );
    define('_AM_WEBLINKS_BULK_SAMPLE', 'You can see sample, click sample button');
    define('_AM_WEBLINKS_BULK_LINK_DSC10', 'Register items are fixed');
    define('_AM_WEBLINKS_BULK_LINK_DSC20', 'Admin specify register items');
    define('_AM_WEBLINKS_BULK_LINK_DSC21', 'First paragraph');
    define('_AM_WEBLINKS_BULK_LINK_DSC22', 'Second paragraph, and following');
    define('_AM_WEBLINKS_BULK_LINK_DSC23', 'Input the register item names on the 1st line.<br>Input horizontal bar (---)');
    define('_AM_WEBLINKS_BULK_LINK_DSC24', 'Describe the register items, by the order of in the first paragraph, divided by a comma(,) on the 2nd line.');
    define('_AM_WEBLINKS_BULK_CHECK_URL', 'Check to set URL');
    define('_AM_WEBLINKS_BULK_CHECK_DESCRIPTION', 'Check to set description');
    define('_AM_WEBLINKS_AUTH_DELETE', 'Can delete');
    define('_AM_WEBLINKS_AUTH_DELETE_DSC', 'Specify the groups allowed to submit link deletion requests');
    define('_AM_WEBLINKS_AUTH_DELETE_AUTO', 'Can approve link deletions');
    define('_AM_WEBLINKS_AUTH_DELETE_AUTO_DSC', 'Specify the groups allowed to approve link deletion requests');
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE', 'Notification Management');
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE_DESC', 'Setting for each module administrator<br>It is the same as the top page of the module');
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE_NOT_USE', "You cannot use in some XOOPS's version");
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE_PLEASE', 'In the case, please use in the top page of this module');
    define('_AM_WEBLINKS_SUBJ_LINK_MOD_APPROVED', '[{X_SITENAME}] {X_MODULE}: Your modification request link is approved');
    define('_AM_WEBLINKS_SUBJ_LINK_MOD_REFUSED', '[{X_SITENAME}] {X_MODULE}: Your modification request link is refused');
    define('_AM_WEBLINKS_SUBJ_LINK_DEL_APPROVED', '[{X_SITENAME}] {X_MODULE}: Your deletion request link is approved');
    define('_AM_WEBLINKS_SUBJ_LINK_DEL_REFUSED', '[{X_SITENAME}] {X_MODULE}: Your deletion request link is refused');
    define('_AM_WEBLINKS_ADMIN_WAITING_SHOW', 'Show admin waiting list');
    define('_AM_WEBLINKS_USER_WAITING_NUM', 'Number of links user waiting list');
    define('_AM_WEBLINKS_USER_OWNER_NUM', 'Number of list user submitted list');
    define('_AM_WEBLINKS_USE_HITS_SINGLELINK', 'Countup hits when show singlelink');
    define('_AM_WEBLINKS_USE_HITS_SINGLELINK_DSC', 'YES enables to countup link hits counter when show singlelink');
    define('_AM_WEBLINKS_MODE_RANDOM', 'Redirect of random jump');
    define('_AM_WEBLINKS_MODE_RANDOM_URL', 'registered site url');
    define('_AM_WEBLINKS_MODE_RANDOM_SINGLE', 'singlelink in this module');
    define('_AM_WEBLINKS_DEL_REQS', 'Deletion Links Waiting for Validation');
    define('_AM_WEBLINKS_NO_DEL_REQ', 'No Link Deletion Request');
    define('_AM_WEBLINKS_DEL_REQ_DELETED', 'Deletion Request Deleted');
    define('_AM_WEBLINKS_LINK_USERCOMMENT_DESC', 'Link list with comment for admin (Listed by new ID)');
    define('_AM_WEBLINKS_CLONE_LINK', 'Clone');
    define('_AM_WEBLINKS_CLONE_MODULE', 'Clone to other module');
    define('_AM_WEBLINKS_CLONE_CONFIRM', 'Confirm to clone');
    define('_AM_WEBLINKS_NO_MODULE', 'There is no corresponding module');
    define('_AM_WEBLINKS_MODIFIED', 'Modified');
    define('_AM_WEBLINKS_CHECK_CONFIRM', 'Confrimed');
    define('_AM_WEBLINKS_WARN_CONFIRM', 'Warning: Check to "Confirmed" of %s');
    define('_AM_WEBLINKS_RSSC_LID_EXIST_MORE', 'There are twe or more links which have same "RSSC ID"');
    define('_AM_WEBLINKS_LINK_IMG_THUMB', 'The substitution of the link image');
    define('_AM_WEBLINKS_LINK_IMG_THUMB_DSC', 'show the WEB site thumbnail instead of the link image, <br>using the thumbnail web service, <br>if not set the link image.');
    define('_AM_WEBLINKS_LINK_IMG_NON', 'none');
    define('_AM_WEBLINKS_GM_MARKER_WIDTH', '[Marker] Width (pixel)');
    define('_AM_WEBLINKS_GM_MARKER_WIDTH_DESC', 'Width of map marker info<br><b>-1</b> is unspecifid');
    define('_AM_WEBLINKS_LINK_IMG_USE', 'Use %s');
    define('_AM_WEBLINKS_RSS_SITE', 'This Site');
    define('_AM_WEBLINKS_RSS_FEED', 'RSS feeds');
    define('_AM_WEBLINKS_CONF_LINK_USER', 'User Link Register Configuration');
    define('_AM_WEBLINKS_USER_NAMEFLAG', 'Select view of nameflag');
    define('_AM_WEBLINKS_USER_MAILFLAG', 'Select view of mailflag');
    define('_AM_WEBLINKS_USER_NAME_MAIL_FLAG_DESC', 'The default value when the user register<br>The admin can change value');
    define('_AM_WEBLINKS_USER_NAME_MAIL_FLAG_SEL', 'The user choice');
    define('_AM_WEBLINKS_DESC_LENGTH', 'Max length of charcters');
    define('_AM_WEBLINKS_DESC_LENGTH_DSC', '<b>-1</b> or the admin : 64KB limit<br>');
    define('_AM_WEBLINKS_D3FORUM_VIEW', 'The view type of the comment');
}// --- define language end ---
