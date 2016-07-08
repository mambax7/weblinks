<?php
// $Id: main.php,v 1.4 2008/01/18 14:10:34 ohwada Exp $

//=========================================================
// WebLinks Module
// Language for Main
//=========================================================

// 2008-01-18 22:49:00 ken
// tanslated by sato-san <http://www.xoops-magazine.com/>

// --- define language begin ---
if (!defined('WEBLINKS_LANG_MB_LOADED')) {
    define('WEBLINKS_LANG_MB_LOADED', '1');
    define('_WLS_CATEGORY', 'Kategorie');
    define('_WLS_HITS', 'Treffer');
    define('_WLS_RATING', 'Bewertung');
    define('_WLS_VOTE', 'Abstimmen');
    define('_WLS_ONEVOTE', '1 Stimme');
    define('_WLS_NUMVOTES', '%s Stimmen');
    define('_WLS_RATETHISSITE', 'Bewerte diese Seite');
    define('_WLS_REPORTBROKEN', 'Melde ung�ltigen Link');
    define('_WLS_TELLAFRIEND', 'Schicke diesen Link einem Freund');
    define('_WLS_EDITTHISLINK', 'Editiere diesen Link');
    define('_WLS_MODIFY', 'Modifiziere');
    define('_WLS_SUBMITLINKHEAD', 'Neuen Link eintragen');
    define('_WLS_SUBMITONCE', 'Tragen Sie den Link bitte nur einmal ein.');
    define('_WLS_DONTABUSE', 'Username und IP wird gespeichert - mi�brauchen Sie das System bitte nicht.');
    define('_WLS_TAKESHOT', 'Wir schauen uns die Seite an - es kann etwas dauern bis zum endg�ltigen Eintrag in die Datenbank.');
    define('_WLS_ALLPENDING', 'Der Linkeintrag wird erst nach �berpr�fung freigeschaltet.');
    // define("_WLS_WHENAPPROVED", "Sie werden per Mail benachrichtigt, wenn der Link freigeschaltet wurde.");
    define('_WLS_RECEIVED', 'Wir haben den Linkeintrag empfangen. Vielen Dank!');
    define('_WLS_REQUESTMOD', 'Anfrage auf Link�nderung');
    define('_WLS_THANKSFORINFO', 'Danke f�r die Information. Wir werden die Anfrage schnellstens bearbeiten.');
    define('_WLS_THANKSFORHELP', 'Danke, das Sie die Aktualit�t des Linkverzeichnis unterst�tzen.');
    define('_WLS_FORSECURITY', 'Zur Sicherheit wird der Username und die IP gespeichert.');
    define('_WLS_SEARCHFOR', 'Suche nach');
    define('_WLS_ANY', 'beliebig');
    define('_WLS_SEARCH', 'Suche');
    // define("_WLS_MAIN", "Home");
    define('_WLS_SUBMITLINK', 'Link hinzuf�gen');
    define('_WLS_POPULAR', 'Popul�r');
    define('_WLS_TOPRATED', 'Top bewertet');
    define('_WLS_NEWTHISWEEK', 'Neu diese Woche');
    define('_WLS_UPTHISWEEK', '�nderungen dieser Woche');
    define('_WLS_POPULARITYLTOM', 'Popularit�t (geringste zur h�chsten)');
    define('_WLS_POPULARITYMTOL', 'Popularit�t (h�chste zur geringsten)');
    define('_WLS_TITLEATOZ', 'Titel (A bis Z)');
    define('_WLS_TITLEZTOA', 'Titel (Z bis A)');
    define('_WLS_DATEOLD', 'Datum (�lteste Links zuerst)');
    define('_WLS_DATENEW', 'Datum (neueste Links zuerst)');
    define('_WLS_RATINGLTOH', 'Bewertung (niedrigste zur h�chsten)');
    define('_WLS_RATINGHTOL', 'Bewertung (h�chste zur niedrigsten)');
    define('_WLS_THEREARE', 'es befinden sich <b>%s</b> Links in der Datenbank');
    define('_WLS_LATESTLIST', 'Letzte Eintr�ge');
    define('_WLS_LINKID', 'Link ID');
    define('_WLS_SITETITLE', 'Seitentitel');
    define('_WLS_SITEURL', 'Webseite URL');
    define('_WLS_OPTIONS', 'Optionen');
    define('_WLS_NOTIFYAPPROVE', 'Benachrichtigen, wenn der Link eingetragen wurde');
    define('_WLS_SENDREQUEST', 'Sende Anfrage');
    define('_WLS_VOTEAPPRE', 'Ihre Bewertung wurde aufgenommen.');
    define('_WLS_THANKURATE', 'Danke, das Sie sich die zeit genommen und %s bewertet haben.');
    define('_WLS_VOTEFROMYOU', 'Die Mithilfe der Besucher hilft anderen Besuchern sich besser im Linkverzeichnis orientieren zu k�nnen.');
    define('_WLS_VOTEONCE', 'Bitte nicht mehrfach f�r die gleiche Seite abstimmen.');
    define('_WLS_RATINGSCALE', 'Bewertungsstufen von 1 (sehr schlecht) bis 10 (sehr gut).');
    define('_WLS_BEOBJECTIVE', 'Bitte objektiv bewerten, nur Bewertungen von 1 oder 10 sind wenig aussagekr�ftig.');
    define('_WLS_DONOTVOTE', 'Bitte nicht f�r die eigene Seite werten.');
    define('_WLS_RATEIT', 'Bewerte jetzt!');
    define('_WLS_INTRESTLINK', 'Ein interessanter Link auf %s');
    define('_WLS_INTLINKFOUND', 'Hier ist ein interessanter Link, gefunden auf %s');
    define('_WLS_RANK', 'Rang');
    define('_WLS_TOP10', '%s Top 10');
    define('_WLS_SEARCHRESULTS', 'Suchergebnisse f�r <b>%s</b>:');
    define('_WLS_SORTBY', 'Sortiert nach:');
    define('_WLS_TITLE', 'Titel');
    define('_WLS_DATE', 'Datum');
    define('_WLS_POPULARITY', 'Popularit�t');
    define('_WLS_CURSORTEDBY', 'Seiten momentan sortiert nach: %s');
    define('_WLS_PREVIOUS', 'Zur�ck');
    define('_WLS_NEXT', 'N�chste');
    define('_WLS_NOMATCH', 'Keine Ergebnisse gefunden');
    define('_WLS_SUBMIT', 'Hinzuf�gen');
    define('_WLS_CANCEL', 'Zur�ck');
    define('_WLS_ALREADYREPORTED', 'Sie haben erfolgreich die Meldung �ber einen ung�ltigen Link abgeschickt.');
    define('_WLS_MUSTREGFIRST', 'Entschuldigung, Sie haben keine Berechtigung f�r diese Aktion.<br />Bitte registrieren Sie sich oder loggen sich erst ein!');
    define('_WLS_NORATING', 'Keine Bewertung ausgew�hlt.');
    define('_WLS_CANTVOTEOWN', 'Sie k�nnen nicht den Link bewerten, den Sie selber hinzugef�gt haben.<br />Alle Bewertungen werden aufgezeichnet.');
    define('_WLS_VOTEONCE2', 'Bewerten Sie den Link nur einmal.<br />Alle Bewertungen werden aufgezeichnet.');
    define('_WLS_WEBLINKSCONF', 'WebLink Konfiguration');
    define('_WLS_GENERALSET', 'WebLink Generelle Einstellungen');
    define('_WLS_LINKSWAITING', 'Neue Links warten auf �berpr�fung');
    define('_WLS_MODREQUESTS', 'Ge�nderte Links warten auf �berpr�fung');
    define('_WLS_BROKENREPORTS', 'Ung�ltige Links Meldung');
    define('_WLS_SUBMITTER', 'Linkeintrager');
    define('_WLS_VISIT', 'Besuch');
    define('_WLS_LINKIMAGEMUST', ' Gib den Dateinamen im Verzeichnis %s f�r den Screenshot an. (z.b. shot.gif) Leer lassen, wenn keine Grafik vorhanden ist.');
    define('_WLS_APPROVE', 'Genehmigen');
    define('_WLS_DELETE', 'L�schen');
    define('_WLS_NOSUBMITTED', 'Keine neu hinzugef�gten Links.');
    define('_WLS_ADDMAIN', 'Hinzuf�gen einer Hauptkategorie');
    define('_WLS_TITLEC', 'Titel: ');
    define('_WLS_IMGURL', 'Grafik URL (OPTIONAL Grafikh�he wird auf 50 angepasst: ');
    define('_WLS_ADD', 'Hinzuf�gen');
    define('_WLS_ADDSUB', 'Hinzuf�gen einer Unterkategorie');
    define('_WLS_IN', 'in');
    define('_WLS_ADDNEWLINK', 'Hinzuf�gen eines neuen Links');
    define('_WLS_MODCAT', 'Kategorie�nderung');
    define('_WLS_MODLINK', 'Link�nderung');
    define('_WLS_TOTALVOTES', 'Link Bewertung (Alle Bewertungen: %s)');
    define('_WLS_USERTOTALVOTES', 'Registrierte Userbewertungen (Alle Bewertungen: %s)');
    define('_WLS_ANONTOTALVOTES', 'Anonyme Bewertungen (Alle Bewertungen: %s)');
    define('_WLS_USER', 'User');
    define('_WLS_IP', 'IP Adresse');
    define('_WLS_USERAVG', 'User AVG Rating');
    define('_WLS_TOTALRATE', 'Alle Bewertungen');
    define('_WLS_NOREGVOTES', 'Keine Bewertungen registrierter User');
    define('_WLS_NOUNREGVOTES', 'Keine Bewertungen anonymer User');
    define('_WLS_VOTEDELETED', 'Bewertung gel�scht.');
    define('_WLS_NOBROKEN', 'Keine gemeldeten ung�ltigen Links.');
    define('_WLS_IGNOREDESC', 'Ignoriere (Ignoriere die meldung und l�sche die <b>Ung�ltige Links Meldung</b>)');
    define('_WLS_DELETEDESC', 'L�sche (L�sche <b>die gemeldete Webseite</b> und die <b>Ung�ltige Links Meldung</b> f�r diesen Link.)');
    define('_WLS_REPORTER', 'Report Sender');
    define('_WLS_IGNORE', 'Ignoriere (L�sche)');
    define('_WLS_LINKDELETED', 'Link gel�scht.');
    define('_WLS_BROKENDELETED', 'Ung�ltiger Link Bericht gel�scht.');
    define('_WLS_ORIGINAL', 'Original');
    define('_WLS_PROPOSED', 'Vorgeschlagen');
    define('_WLS_OWNER', 'Besitzer');
    define('_WLS_NOMODREQ', 'Keine Link �nderungsanforderungen.');
    define('_WLS_DBUPDATED', 'Databank Aktualisierung erfolgreich!');
    define('_WLS_MODREQDELETED', '�nderunganfroderung gel�scht.');
    define('_WLS_IMGURLMAIN', 'Bild URL (OPTIONAL und nur f�r Hauptkategorie. Bildh�he wird auf 50 angepasst): ');
    define('_WLS_PARENT', 'Hauptkategorie:');
    define('_WLS_SAVE', 'Speicher �nderungen');
    define('_WLS_CATDELETED', 'Kategorie gel�scht.');
    define('_WLS_WARNING', 'WARNUNG: Sind Sie sicher, diese Kategorie mit allen darin befindlichen Links und Kommentaren l�schen zu wollen ?');
    define('_WLS_YES', 'Ja');
    define('_WLS_NO', 'Nein');
    define('_WLS_NEWCATADDED', 'Neue Kategorie erfolgreich hinzugef�gt!');
    define('_WLS_NEWLINKADDED', 'Neuer Link in die Datenbank hinzugef�gt.');
    define('_WLS_YOURLINK', 'Ihr Webseitenlink auf %s');
    define('_WLS_YOUCANBROWSE', 'Sie finden ihre Weblinks auf %s');
    define('_WLS_HELLO', 'Hallo %s');
    define('_WLS_WEAPPROVED', 'Ihr Linkeintrag wurde genehmigt und in die Datenbank hinzugef�gt.');
    define('_WLS_THANKSSUBMIT', 'Danke f�r den Eintrag!');
    define('_WLS_ISAPPROVED', 'Der Linkeintrag wurde genehmigt');
    define('_WLS_SUBMIT_NEW_LINK', 'Neuen Link hinzuf�gen');
    define('_WLS_SITE_POPULAR', 'Popul�re Seiten');
    define('_WLS_SITE_HIGHRATE', 'Top bewertete Seiten');
    define('_WLS_SITE_NEW', 'Neueste Eintr�ge');
    define('_WLS_SITE_UPDATE', 'Ge�nderte Seiten');
    define('_WLS_SITE_RECOMMEND', 'Empfohlene Seiten');
    define('_WLS_SITE_MUTUAL', 'Partnerseiten');
    define('_WLS_SITE_RANDOM', 'Zufallslink');
    define('_WLS_NEW_SITELIST', 'Letzter Seiteneintrag');
    define('_WLS_NEW_ATOMFEED', 'Letzte RSS/ATOM Eingabe');
    define('_WLS_SITE_RSS', 'RSS/ATOM Seite');
    define('_WLS_ATOMFEED', 'RSS/ATOM Feed');
    define('_WLS_LASTUPDATE', 'Letztes Update');
    define('_WLS_MORE', 'Mehr Details');
    define('_WLS_DESCRIPTION', 'Beschreibung');
    define('_WLS_PROMOTER', 'Firma / Organisation');
    define('_WLS_ZIP', 'PLZ');
    define('_WLS_ADDR', 'Adresse');
    define('_WLS_TEL', 'Telefonnummer');
    define('_WLS_FAX', 'Faxnummer');
    define('_WLS_BANNERURL', 'Banner URL');
    define('_WLS_NAME', 'Name');
    define('_WLS_EMAIL', 'Email');
    define('_WLS_COMPANY', 'Firma/Organisation');
    define('_WLS_STATE', 'Land');
    define('_WLS_CITY', 'Stadt');
    define('_WLS_ADDR2', 'Bundesland');
    define('_WLS_PUBLIC', 'ver�ffentlichen');
    define('_WLS_NOTPUBLIC', 'Nicht ver�ffentlichen');
    define('_WLS_NOTSELECT', 'Nicht gew�hlt');
    define('_WLS_SUBMIT_INDISPENSABLE', "<b>Felder mit Angabe des Sterns'<b>*</b>' sind Pflichtfelder !</b>");
    define('_WLS_SUBMIT_USER_COMMENT', " Im Feld \"Kommentar an den Admin\" schickt ihr mir zus�tzliche Infos zum Eintrag.<br />Dieser Kommentar erscheint nicht im Linkeintrag.");
    define('_WLS_USER_COMMENT', 'Kommentar an den Admin');
    define('_WLS_NOT_DISPLAY', 'Dieser Kommentar erscheint nicht im Linkeintrag.');
    define('_WLS_MODIFYAPPROVED', 'Ihre Link�nderung wurde genehmigt. ');
    define('_WLS_MODIFY_NOT_OWNER', 'Sie sind nicht der authorisierte Registrant des Links.');
    define('_WLS_MODIFY_PENDING', 'Link�nderung wurde registriert, und wird durch uns nach �berpr�fung frei geschaltet.');
    define('_WLS_LINKSUBMITTER', 'Link Hinzuf�ger');
    define('_WLS_PLEASEPASSWORD', 'Passwort eingeben');
    define('_WLS_REGSTERED', 'Registrierter User');
    define('_WLS_REGSTERED_DSC', 'Jeder kann den Link �ndern. <br>der Admin kontrolliert �nderungen vor der Freischaltung.');
    define('_WLS_EMAILNOTFOUND', 'Keine �bereinstimmende Email Adresse.');
    define('_WLS_ERROR_FILL', 'FEHLER: Eingabe %s');
    define('_WLS_ERROR_ILLEGAL', 'FEHLER: Falsches Format %s');
    define('_WLS_ERROR_CID', 'FEHLER: W�hle Kategorie');
    define('_WLS_ERROR_URL_EXIST', 'FEHLER: Dieser Link ist bereits vorhanden. ');
    define('_WLS_WARNING_URL_EXIST', 'Warnung: Dieser Eintrag existiert bereits. ');
    define('_WLS_ERRORNOLINK', 'FEHLER: Kein Link gefunden');
    define('_WLS_CATLIST', 'Kategorieliste');
    define('_WLS_LINKIMAGE', 'Link Grafik: ');
    define('_WLS_CATEGORYID', 'Kategorie ID: ');
    define('_WLS_TIMEUPDATE', 'Update');
    define('_WLS_NOTTIMEUPDATE', 'Kein Update');
    define('_WLS_LINKFLAG', 'Erstelle einen Link hier drunter ');
    define('_WLS_NOTLINKFLAG', 'Keinen Link hier drunter erstellen');
    define('_WLS_GOTOADMIN', 'Zur Adminseite');
    define('_WLS_DELCAT', 'L�sche Kategorie');
    define('_WLS_SUBCATEGORY', 'Unterkategorie');
    define('_WLS_SUBCATEGORY_NON', 'Keine Unterkategorie');
    define('_WLS_LINK_BELONG', 'verwandte Links');
    define('_WLS_LINK_BELONG_NUMBER', 'Anzahl der verwandeten Links');
    define('_WLS_LINK_BELONG_NON', 'Keine verwandten Links');
    define('_WLS_LINK_MAYBE_DELETE', 'Links zum l�schen');
    define('_WLS_LINK_MAYBE_DELETE_DSC', 'Ergebnisse k�nnen abweichen, wenn Unterkategorien vorhanden sind.Andere Links k�nnen gel�scht werden. ');
    define('_WLS_LINK_DELETE_NON', 'Keine Links zum l�schen');
    define('_WLS_CATEGORY_LINK_DELETE_EXCUTE', 'L�sche Kategorie und enthaltene Links');
    define('_WLS_CATEGORY_LINK_DELETED', 'Kategorie und enthaltene Links wurden gel�scht.');
    define('_WLS_CATEGORY_DELETED', 'gel�schte kategorien');
    define('_WLS_LINK_DELETED', 'gel�schte Links');
    define('_WLS_ERROR_CATEGORY', 'Fehler: Kategorie nicht ausgew�hlt');
    define('_WLS_ERROR_MAX_SUBCAT', 'Fehler: Anzahl der ausgew�hlten Kategorien �bersteigt die Zahl der auf einmal l�schbaren Kategorien');
    define('_WLS_ERROR_MAX_LINK_BELONG', 'Fehler: Anzahl der ausgew�hlten Links �bersteigt die Zahl der auf einmal l�schbaren Links. ');
    define('_WLS_ERROR_MAX_LINK_DEL', 'Fehler: Anzahl der ausgew�hlten Links �bersteigt die Zahl der auf einmal l�schbaren Links.');
    define('_WLS_MARK', 'mark');
    define('_WLS_ADMINCOMMENT', 'Admin Kommentar');
    define('_WLS_BROKEN_COUNTER', 'Ung�ltige-Links Z�hler');
    define('_WLS_RSS_URL', 'RSS/ATOM URL');
    define('_WLS_RSS_URL_0', 'nicht nutzen');
    define('_WLS_RSS_URL_1', 'RSS Typ');
    define('_WLS_RSS_URL_2', 'ATOM Typ');
    define('_WLS_RSS_URL_3', 'automatisch erkennen');
    define('_WLS_ATOMFEED_DISTRIBUTE', 'Stelle RSS/ATOM Feeds zur Verf�gung, welche hier angezeigt werden.');
    define('_WLS_ATOMFEED_FIREFOX',
           "Wenn Sie <a href='http://www.mozilla.org/products/firefox/' target='_blank'>Firefox</a> benutzen, k�nnen Sie durch setzen eines Lesezeichen die RSS/ATOM Feeds durchsuchen. ");
    define('_WLS_EMAIL_APPROVE', 'Benachrichtigen wenn best�tigt');
    define('_WLS_TOPTEN_TITLE', '%s Top %u');
    define('_WLS_TOPTEN_ERROR', 'Es gibt zu viele TOP Kategorien. Anzeigenstop bei %u');
    define('_WEBLINKS_MID', '�ndere ID');
    define('_WEBLINKS_USERID', 'Benutzer ID');
    define('_WEBLINKS_CREATE', 'Erzeugt');
    // define("_HOME", "Home");
    // define("_SAVE", "Speichern");
    // define("_SAVED", "Gespeichert");
    // define("_CREATE", "Erzeuge");
    // define("_CREATED", "Erzeugt");
    // define("_FINISH", "Fertigstellen");
    // define("_FINISHED", "Fertig");
    // define("_EXECUTE", "Ausf�hren");
    // define("_EXECUTED", "Ausgef�hrt");
    // define("_PRINT", "Drucken");
    // define("_SAMPLE", "Beispiel");
    define('_NO_MATCH_RECORD', 'Keine �bereinstimmenden Datens�tze');
    define('_MANY_MATCH_RECORD', 'Es gibt zwei oder mehr �bereinstimmende Datens�tze');
    define('_NO_CATEGORY', 'Keine Kategorie');
    define('_NO_LINK', 'Kein Link');
    define('_NO_TITLE', 'Kein Titel');
    define('_NO_URL', 'Keine URL');
    define('_NO_DESCRIPTION', 'Keine Beschreibung');
    // define("_GOTO_MAIN", "Gehe zur Haupt�bersicht");
    // define("_GOTO_MODULE", "Modul starten");
    // define("_WEBLINKS_INIT_NOT", "Die Konfigurations Tabelle ist nicht initialisiert");
    // define("_WEBLINKS_INIT_EXEC", "Initialisiere die Konfigurations Tabelle");
    // define("_WEBLINKS_VERSION_NOT", "Ist nicht Version  %s");
    // define("_WEBLINKS_UPGRADE_EXEC", "Aktualisiere die Konfigurations Tabelle");
    define('_WEBLINKS_OPTIONS', 'Optionen');
    define('_WEBLINKS_DOHTML', ' Aktiviere HTML tags');
    define('_WEBLINKS_DOIMAGE', ' Aktiviere images');
    define('_WEBLINKS_DOBREAK', ' Aktiviere Zeilenwechsel');
    define('_WEBLINKS_DOSMILEY', ' Aktiviere Smileys');
    define('_WEBLINKS_DOXCODE', ' Aktiviere XOOPS Code');
    define('_WEBLINKS_PASSWORD_INCORRECT', 'Falsches Passwort');
    define('_WEBLINKS_ETC', 'usw...');
    define('_WEBLINKS_AUTH_UID', 'Benutzer ID �bereinstimmung');
    define('_WEBLINKS_AUTH_PASSWD', 'Passwort �bereinstimmung');
    define('_WEBLINKS_BANNER_SIZE', 'Banner Gr��e');
    define('_WEBLINKS_MAP_USE', 'Verwende Map Icon');
    define('_WEBLINKS_RSSC_LID', 'RSSC Lid');
    define('_WEBLINKS_RSS_MODE', 'RSS Mode');
    define('_WEBLINKS_RSSC_NOT_INSTALLED', 'RSSC Modul ( %s ) ist nicht installiert');
    define('_WEBLINKS_RSSC_INSTALLED', 'RSSC Modul ( %s ) Version %s ist installiert');
    define('_WEBLINKS_RSSC_REQUIRE', 'Erfordert RSSC Modul Version %s oder h�her');
    define('_WEBLINKS_GOTO_SINGLELINK', 'Gehe zu Link Info');
    define('_WEBLINKS_WARN_NOT_READ_URL', 'Warnung: Kann die URL nicht lesen');
    define('_WEBLINKS_WARN_BANNER_NOT_GET_SIZE', 'Warnung: Bannergr��e konnte nicht ermittelt werden');
    define('_WEBLINKS_GM_LATITUDE', 'Latitude (geografische Breite)');
    define('_WEBLINKS_GM_LONGITUDE', 'Longitude (geografische L�nge)');
    define('_WEBLINKS_GM_ZOOM', 'Zoom Level');
    define('_WEBLINKS_GM_GET_LOCATION', 'Die Position wird mit GoogleMaps angezeigt');
    define('_WEBLINKS_GM_DEFAULT_LOCATION', 'Default Position');
    define('_WEBLINKS_GM_CURRENT_LOCATION', 'Aktuelle Position');
    define('_WEBLINKS_GOOGLE_MAPS', 'Google Maps');
    define('_WEBLINKS_JAVASCRIPT_INVALID', 'Ihr Browser kann kein JavaScript verwenden');
    define('_WEBLINKS_GM_NOT_COMPATIBLE', 'Ihr Browser kann GoogleMaps nicht verwenden');
    define('_WEBLINKS_GM_NEW_WINDOW', 'Anzeige in neuem Fenster');
    define('_WEBLINKS_GM_INLINE', 'Anzeige Inline');
    define('_WEBLINKS_GM_DISP_OFF', 'Anzeige deaktivieren');
    define('_WEBLINKS_GM_GET_LATITUDE', 'Bestimme Latitude/Longitude/Zoom');
    define('_WEBLINKS_GM_GET_ADDR', 'Bestimme Adresse');
    define('_WEBLINKS_GM_SEARCH_MAP_FROM_ADDRESS', 'Suche Karte nache Adresse');
    define('_WEBLINKS_GM_NO_MATCH_PLACE', 'Kein �bereinstimmender Platz');
    define('_WEBLINKS_GM_JP_SEARCH_MAP_FROM_ADDRESS', 'Suche Karte nach Adresse in Japan');
    define('_WEBLINKS_GM_JP_TOKYO_AC_GEOCODE', 'Japan Tokyo University');
    define('_WEBLINKS_GM_JP_MLIT_ISJ', 'Japan Ministry of Land Infrastructure and Transport');
    define('_WEBLINKS_TIME_PUBLISH', 'Ver�ffentlichungszeit');
    define('_WEBLINKS_TIME_EXPIRE', 'Ablaufzeit');
    define('_WEBLINKS_TEXTAREA', 'Textarea');
    define('_WEBLINKS_WARN_TIME_PUBLISH', 'Die Ver�ffentlichungszeit wurde noch nicht erreicht');
    define('_WEBLINKS_WARN_TIME_EXPIRE', 'Die Ablaufzeit wurde �berschritten');
    define('_WEBLINKS_WARN_BROKEN', 'Dieser Link ist m�glicherweise ung�ltig');
    define('_WEBLINKS_LATEST_FORUM', 'Letzte Forenbeitr�ge');
    define('_WEBLINKS_FORUM', 'Forum');
    define('_WEBLINKS_THREAD', 'Diskussion');
    define('_WEBLINKS_POST', 'Beitrag');
    define('_WEBLINKS_FORUM_ID', 'Forum ID');
    define('_WEBLINKS_FORUM_SEL', 'Forum w�hlen');
    define('_WEBLINKS_COMMENT_USE', 'Verwende XOOPS Kommentare');
    define('_WEBLINKS_CAT_AUX_TEXT_1', 'aux_text_1');
    define('_WEBLINKS_CAT_AUX_TEXT_2', 'aux_text_2');
    define('_WEBLINKS_CAT_AUX_INT_1', 'aux_int_1');
    define('_WEBLINKS_CAT_AUX_INT_2', 'aux_int_2');
    define('_WEBLINKS_CAPTCHA', 'Captcha');
    define('_WEBLINKS_CAPTCHA_DESC', 'Anti-Spam');
    define('_WEBLINKS_ERROR_CAPTCHA', 'Fehler: Eingabe nicht �berinstimmend');
    define('_WEBLINKS_ERROR', 'Fehler');
    define('_WEBLINKS_CAT_TITLE_JP', 'Japanischer Titel');
    define('_WEBLINKS_DISABLE_FEATURE', 'Deaktiviere diese Funktion');
    define('_WEBLINKS_REDIRECT_JP_SITE', 'Gehe zur japanischen Seite');
    define('_WEBLINKS_ALBUM_ID', 'Album ID');
    define('_WEBLINKS_ALBUM_SEL', 'Album w�hlen');
    define('_WEBLINKS_GM_TYPE', 'Google Map Typ');
    define('_WEBLINKS_GM_TYPE_MAP', 'Karte');
    define('_WEBLINKS_GM_TYPE_SATELLITE', 'Satellit');
    define('_WEBLINKS_GM_TYPE_HYBRID', 'Hybrid');
    define('_WEBLINKS_GM_CURRENT_ADDRESS', 'Aktuelle Adresse');
    define('_WEBLINKS_GM_SEARCH_LIST', 'Suche Trefferliste');
    define('_WEBLINKS_ADMIN_WAITING_LIST', 'Admin-Warteliste');
    define('_WEBLINKS_USER_WAITING_LIST', 'Ihre Warteliste');
    define('_WEBLINKS_USER_OWNER_LIST', 'Ihre Liste der Antr�ge');
    define('_WEBLINKS_TIME_PUBLISH_SET', 'Setzen Sie die Ver�ffentlichung Zeit');
    define('_WEBLINKS_TIME_PUBLISH_DESC', 'Wenn Sie die Zeit nicht �berpr�fen, bleibt diese undatiert.');
    define('_WEBLINKS_TIME_EXPIRE_SET', 'Ablaufzeit setzen');
    define('_WEBLINKS_TIME_EXPIRE_DESC', 'If you do not check it, expired setting will become undated');
    define('_WEBLINKS_DEL_LINK_CONFIRM', 'Best�tigen Sie das L�schen');
    define('_WEBLINKS_DEL_LINK_REASON', 'Grund zum l�schen');
    define('_WEBLINKS_ERROR_LENGTH', 'Fehler: %s muss kleiner sein als %s Zeichen');
}// --- define language end ---
;
