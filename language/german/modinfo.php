<?php

// $Id: modinfo.php,v 1.1 2011/12/29 14:32:43 ohwada Exp $

//=========================================================
// WebLinks Module
// Language for Module Info
//=========================================================

// 2008-01-18 22:57:02 ken
// tanslated by sato-san <http://www.xoops-magazine.com/>

// --- define language begin ---
if (!defined('WEBLINKS_LANG_MI_LOADED')) {
    define('WEBLINKS_LANG_MI_LOADED', '1');
    define('_MI_WEBLINKS_NAME', 'Web Links');
    define('_MI_WEBLINKS_DESC', 'Erstellung eines Linkverzeichnisses mit Suchfunktion, Linkeintragung und Bewertungen.');
    define('_MI_WEBLINKS_BNAME1', 'Neueste Links');
    define('_MI_WEBLINKS_BNAME2', 'Top Links');
    define('_MI_WEBLINKS_BNAME3', 'Popul�re Links');
    define('_MI_WEBLINKS_SMNAME1', 'Eintragen');
    define('_MI_WEBLINKS_SMNAME2', 'Popul�re Seite');
    define('_MI_WEBLINKS_SMNAME3', 'Top bewertete Seite');
    define('_MI_WEBLINKS_ADMENU1', 'Modul Konfiguration 2');
    define('_MI_WEBLINKS_ADMENU2', 'Kategoriemanagement');
    define('_MI_WEBLINKS_ADMENU3', 'Linkmanagement');
    define('_MI_WEBLINKS_ADMENU4', 'Link hinzuf�gen');
    define('_MI_WEBLINKS_ADMENU5', 'Wartende Links zur �berpr�fung');
    define('_MI_WEBLINKS_ADMENU6', 'Ge�nderte Links zur �berpr�fung');
    define('_MI_WEBLINKS_ADMENU7', 'Ung�ltige Links Meldung');
    define('_MI_WEBLINKS_POPULAR', 'Wieviel Zugriffe sind erforderlich f�r einen popul�ren Link');
    define('_MI_WEBLINKS_POPULARDSC', 'Ab wieviel Zugriffen wird das "Popul�r" Logo angezeigt.<br> Bei Engabe von 0, erfolgt keine Anzeige. ');
    define('_MI_WEBLINKS_NEWLINKS', 'Wieviel neue Links werden auf der Hauptseite angezeigt');
    define('_MI_WEBLINKS_NEWLINKSDSC', 'Wieviel Links werden auf der Hauptseite angezeigt. ');
    define('_MI_WEBLINKS_PERPAGE', 'Wieviele Links werden pro Seite untereinander angezeigt');
    define('_MI_WEBLINKS_PERPAGEDSC', 'Wieviele Links werden pro Seite mit Detailanzeige angezeigt');
    define('_MI_WEBLINKS_GLOBAL_NOTIFY', 'Globale Einstellungen');
    define('_MI_WEBLINKS_GLOBAL_NOTIFYDSC', 'Global Linkoptionen.');
    define('_MI_WEBLINKS_CATEGORY_NOTIFY', 'Kategorie');
    define('_MI_WEBLINKS_CATEGORY_NOTIFYDSC', 'Anzeigeoptionen der Linkkategorien.');
    define('_MI_WEBLINKS_LINK_NOTIFY', 'Links');
    define('_MI_WEBLINKS_LINK_NOTIFYDSC', 'Anzeigeoptionen der Links.');
    define('_MI_WEBLINKS_GLOBAL_NEWCATEGORY_NOTIFY', 'Neue Kategorie');
    define('_MI_WEBLINKS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Benachrichtige mich, wenn eine neue Linkkategorie erzeugt wurde.');
    define('_MI_WEBLINKS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Best�tigungsnachricht, wenn eine neue Linkkategorie erzeugt wurde.');
    define('_MI_WEBLINKS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} automatische Benachrichtigung : Neue Linkkategorie.');
    define('_MI_WEBLINKS_GLOBAL_LINKMODIFY_NOTIFY', 'Link�nderung erbeten');
    define('_MI_WEBLINKS_GLOBAL_LINKMODIFY_NOTIFYCAP', 'Benachrichtige mich, wenn eine Link�nderung erbeten wird.');
    define('_MI_WEBLINKS_GLOBAL_LINKMODIFY_NOTIFYDSC', 'Best�tigungsnachricht, wenn eine Link�nderung erbeten wurde.');
    define('_MI_WEBLINKS_GLOBAL_LINKMODIFY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} automatische Benachrichtigung: Link�nderung erbeten');
    define('_MI_WEBLINKS_GLOBAL_LINKBROKEN_NOTIFY', 'Ung�ltiger Link gemeldet');
    define('_MI_WEBLINKS_GLOBAL_LINKBROKEN_NOTIFYCAP', 'Benachrichtige mich, wenn ein ung�ltiger Link gemeldet wurde.');
    define('_MI_WEBLINKS_GLOBAL_LINKBROKEN_NOTIFYDSC', 'Best�tigungsnachricht, wenn ein ung�ltiger Linkmeldung erfolgt ist.');
    define('_MI_WEBLINKS_GLOBAL_LINKBROKEN_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} automatische Benachrichtigung : Ung�ltiger Link gemeldet');
    define('_MI_WEBLINKS_GLOBAL_LINKSUBMIT_NOTIFY', 'Neuer Link hinzugef�gt');
    define('_MI_WEBLINKS_GLOBAL_LINKSUBMIT_NOTIFYCAP', 'Benachrichtige mich, wenn ein neuer Link hinzugef�gt wurde (auf Freischaltung wartend).');
    define('_MI_WEBLINKS_GLOBAL_LINKSUBMIT_NOTIFYDSC', 'Best�tigungsnachricht, wenn ein neuer Link hinzugef�gt wurde (Auf Freischaltung wartend).');
    define('_MI_WEBLINKS_GLOBAL_LINKSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} automatische Benachrichtigung : Neuer Link hinzugef�gt');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_NOTIFY', 'Neuer Link');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_NOTIFYCAP', 'Benachrichtige mich, wenn ein neuer Link gepostet wurde.');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_NOTIFYDSC', 'Best�tigungsnachricht, wenn ein neuer Link gepostet wurde.');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} automatische Benachrichtigung: Neuer Link');
    define('_MI_WEBLINKS_CATEGORY_LINKSUBMIT_NOTIFY', 'Neuer Link hinzugef�gt');
    define('_MI_WEBLINKS_CATEGORY_LINKSUBMIT_NOTIFYCAP', 'Benachrichtige mich, wenn in dieser Kategorie ein neuer Link hinzugef�gt wurde.');
    define('_MI_WEBLINKS_CATEGORY_LINKSUBMIT_NOTIFYDSC', 'Best�tigungsnachricht, wenn in dieser Kategorie ein neuer Link hinzugef�gt wurde.');
    define('_MI_WEBLINKS_CATEGORY_LINKSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} automatische Benachrichtigung : Neuer Link in dieser Kategorie hinzugef�gt');
    define('_MI_WEBLINKS_CATEGORY_NEWLINK_NOTIFY', 'Neuer Link');
    define('_MI_WEBLINKS_CATEGORY_NEWLINK_NOTIFYCAP', 'Benachrichtige mich, wenn in dieser Kategorie ein neuer Link gepostet wurde.');
    define('_MI_WEBLINKS_CATEGORY_NEWLINK_NOTIFYDSC', 'Best�tigungsnachricht, wenn in dieser Kategorie ein neuer Link gepostet wurde.');
    define('_MI_WEBLINKS_CATEGORY_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} automatische Benachrichtigung: Neuer Link in dieser Kategorie');
    // define("_MI_WEBLINKS_LINK_APPROVE_NOTIFY", "Linkeintrag genehmigt");
    // define("_MI_WEBLINKS_LINK_APPROVE_NOTIFYCAP", "Benachrichtige mich, wenn der Linkeintrag genehmigt wurde.");
    // define("_MI_WEBLINKS_LINK_APPROVE_NOTIFYDSC", "Best�tigungsnachricht bei genehmigtem Linkeintrag.");
    // define("_MI_WEBLINKS_LINK_APPROVE_NOTIFYSBJ", "[{X_SITENAME}] {X_MODULE} automatische Benachrichtigung: Linkeintrag wurde genehmigt");
    define('_MI_WEBLINKS_BNAME4', 'Kategorieliste');
    define('_MI_WEBLINKS_BNAME5', 'Letzte RSS/ATOM Feeds');
    define('_MI_WEBLINKS_BNAME6', 'Verlaufanzeige');
    define('_MI_WEBLINKS_LOGOSHOW', 'Anzeige der Modulgrafik');
    define('_MI_WEBLINKS_LOGOSHOWDSC', 'W�hle  "JA" zur Anzeige der Modulgrafik.');
    define('_MI_WEBLINKS_TITLESHOW', 'Anzeige des Modultitels');
    define('_MI_WEBLINKS_TITLESHOWDSC', 'W�hle "JA" zur Anzeige des Modultitels');
    define('_MI_WEBLINKS_NEWDAYS', 'Wieviele Tage wird ein Link als "NEU" gekennzeichnet');
    define('_MI_WEBLINKS_NEWDAYS_DSC', 'Bei Eingabe von "0", erfolgt keine Anzeige der "NEU" Grafik. ');
    define('_MI_WEBLINKS_DESCSHORT', 'Wieviel Zeichen d�rfen zur Linkbeschreibung genutzt werden. ');
    define('_MI_WEBLINKS_DESCSHORTDSC', 'Eingabe der Zeichenanzahl f�r die Linkbeschreibung. ');
    define('_MI_WEBLINKS_ORDERBY', 'Voreinstellung zur sortierten Linkanzeige');
    // remove in 1.83
    // define("_MI_WEBLINKS_ODERBYTDSC", "Eingabe der Sortierkriterien zur Linkanzeige.");
    define('_MI_WEBLINKS_ORDERBY0', 'Titel (A bis Z)');
    define('_MI_WEBLINKS_ORDERBY1', 'Titel (Z bis A)');
    define('_MI_WEBLINKS_ORDERBY2', 'Eintragsdatum (aufsteigend)');
    define('_MI_WEBLINKS_ORDERBY3', 'Eintragsdatum (absteig)');
    define('_MI_WEBLINKS_ORDERBY4', 'Bewertung (aufsteigend)');
    define('_MI_WEBLINKS_ORDERBY5', 'Bewertung (absteigend)');
    define('_MI_WEBLINKS_ORDERBY6', 'Popul�r (aufsteigend)');
    define('_MI_WEBLINKS_ORDERBY7', 'Popul�r (absteigend)');
    define('_MI_WEBLINKS_SEARCH_LINKS', 'Anzahl der Linksanzeige bei Suchergebnissen');
    define('_MI_WEBLINKS_SEARCH_LINKSDSC', 'Wieviel Links werden nach einer Suche pro Seite angezeigt');
    define('_MI_WEBLINKS_SEARCH_MIN', 'Mindestanzahl an Zeichen f�r eine Suche');
    define('_MI_WEBLINKS_SEARCH_MINDSC', 'Wieviel Zeichen m�ssen mindestens f�r eine Suche eingegeben werden');
    define('_MI_WEBLINKS_USEFRAMES', 'Sollen die gelinkten Seiten im Frame angezeigt werden?');
    define('_MI_WEBLINKS_USEFRAMEDSC', 'Anzeige der gelinkten Seite im eigenen Frame....');
    define('_MI_WEBLINKS_BROKEN', 'Bei wievielen ung�ltigen Linkmeldungen wird der Eintrag nicht mehr angezeigt');
    define('_MI_WEBLINKS_BROKENDSC', 'Ab dieser Zahl an Meldungen wird der Link nicht mehr angezeigt. Der Link wird dabei nicht gel�scht.');
    define('_MI_WEBLINKS_LISTIMAGE_USE', 'Nutze Grafiken der Linkliste');
    define('_MI_WEBLINKS_LISTIMAGE_WIDTH', 'Maximale Breite der Linkgrafik');
    define('_MI_WEBLINKS_LISTIMAGE_HEIGHT', 'Maximale H�he der Linkgrafik');
    define('_MI_WEBLINKS_LISTIMAGE_USEDSC', 'W�hle "JA" zur Anzeige der Linkgrafik in der Linkliste');
    define('_MI_WEBLINKS_LINKIMAGE_USE', 'Nutze Linkgrafik in der Detailanzeige des Links');
    define('_MI_WEBLINKS_LINKIMAGE_WIDTH', 'Maximale Breite der Grafik in der Detailanzeige');
    define('_MI_WEBLINKS_LINKIMAGE_HEIGHT', 'Maximale H�he der Grafik in der Detailanzeige');
    define('_MI_WEBLINKS_LINKIMAGE_USEDSC', 'W�hle "JA" zur Anzeige der Linkgrafik in der Detailansicht.');
    define('_MI_WEBLINKS_TOPTEN_STYLE', 'Stil der Topten');
    define('_MI_WEBLINKS_TOPTEN_STYLE_DSC', 'W�hle Anzeigestil in "popul�re Seiten" und "Best bewertete Seiten". ');
    define('_MI_WEBLINKS_TOPTEN_STYLE_0', 'Jede Top Kategorie');
    define('_MI_WEBLINKS_TOPTEN_STYLE_1', 'Mixe alle Kategorien');
    define('_MI_WEBLINKS_TOPTEN_LINKS', 'Maximum Anzahl von Links in den TopTen');
    define('_MI_WEBLINKS_TOPTEN_LINKS_DSC', 'Maximale Anzahl von Links die in "popul�re Seiten" und "best bewertete Seiten" angezeigt werden sollen. ');
    define('_MI_WEBLINKS_TOPTEN_CATS', 'Maximale Anzahl von Kategorien in den TopTen');
    define('_MI_WEBLINKS_TOPTEN_CATS_DSC', 'Festlegen der maximalen Anzahl an Kategorien die in "Popul�re Seiten" und "Best bewertete Seiten" angezeigt werden. <br>Zeit�berschreitung kann durch zu viele Kategorien verursacht werden');
    define('_MI_WEBLINKS_ADMENU0', 'Index');
    define('_MI_WEBLINKS_BNAME_RANDOM', 'Zuf�lliger Link');
    define('_MI_WEBLINKS_BNAME_GENERIC', 'Eigener Link Block');
    define('_MI_WEBLINKS_BNAME_RANDOM_PHOTO', 'Zuf�lliges Foto');
    define('_MI_WEBLINKS_ORDERBYDSC', 'Enter default value of sort on link detail display.');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_ADMIN', '[Admin] New Link (with the comment for admin)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_ADMIN_CAP', '[Admin] Notify me when any new link is posted (with the comment the admin)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_ADMIN_DSC', 'Receive notification when any new link is posted (with the comment for admin)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_ADMIN_SBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New Link');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_COMMENT', '[Admin] New Link (if entered the comment for admin)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_COMMENT_CAP', '[Admin] Notify me when any new link is posted (if entered the comment the admin)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_COMMENT_DSC', 'Receive notification when any new link is posted (if entered the comment for admin)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_COMMENT_SBJ', '[{X_SITENAME}] {X_MODULE} auto-notify : New Link)');
}
// --- define language begin ---
