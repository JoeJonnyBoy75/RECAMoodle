<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Edwiser RemUI
 * @package    theme_remui
 * @copyright  (c) 2018 WisdmLabs (https://wisdmlabs.com/)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['pluginname'] = 'Edwiser RemUI';
$string['region-side-post'] = 'Rechts';
$string['region-side-pre'] = 'Rechts';
$string['fullscreen'] = 'Vollbild';
$string['closefullscreen'] = 'Vollbild schließen';
$string['licensesettings'] = 'Lizenz Einstellungen';
$string['edwiserremuilicenseactivation'] = 'Edwiser RemUI Lizenz Aktivierung';
$string['overview'] = 'Übersicht';
$string['choosereadme'] = '
<div class="about-remui-wrapper text-center">
    <div class="about-remui m-auto" style="max-width: 1000px;">
        <h1 class="text-center">Willkommen bei Edwiser RemUI</h1><br>
        <h4 class="text-muted">
     Edwiser RemUI ist die neue Revolution in der Benutzererfahrung. Es wurde so gestaltet, dass die die Benutzerfreundlichkeit erhöt wurde, mit einer einfachen Navigation, Inhaltserstellung und Anpassungsoptionen <br><br>
Wir sind uns sicher, dass Sie das neue Aussehen mögen werden.  </h4>
        <div class="text-center mt-50">
        <img src="' . $CFG->wwwroot . '/theme/remui/pix/screenshot.jpg" class="w-full" alt="Edwiser RemUI screen shot" style="max-width: 100%;"/>
        </div>
        <br><br>
        <div class="text-center">
            <div class="btn-group text-center" role="group" aria-label="...">
              <div class="btn-group mr-1" role="group">
                <a href="https://edwiser.org/remui/#compatible-moodle-version" target="_blank" class="btn btn-primary btn-round">FAQ</a>&nbsp;
              </div>
              <div class="btn-group mr-1" role="group">
                <a href="https://edwiser.org/remui/documentation/" target="_blank" class="btn btn-primary btn-round">Dokumentation</a>&nbsp;
              </div>
              <div class="btn-group" role="group">
                <a href="https://edwiser.org/contact-us/" target="_blank" class="btn btn-primary btn-round">Support</a>
              </div>
            </div>
        </div>
        <br>
        <h1 class="text-center">Ihr Theme personalisieren </h1>
        <h4 class="text-muted text-center">

            Wir verstehen, dass nicht jedes LMS gleich ist.
            Wir werden mit Ihenen zusammenarbeiten um Ihre Anforderungen zu verstehen um eine Lösung zu entwickeln und zu designen, die Ihren Vorstellungen entspricht.
        </h4>
        <br><br>
        <div class="row wdm_generalbox">
            <div class="marketing-spots span3 col-lg-6 col-12">
                <div class="iconsquare">
                    <i class="fa fa-cogs"></i>
                </div>
                <div class="iconbox-content">
                    <h4>Theme Anpassung</h4>
                </div>
            </div>
            <div class="marketing-spots span3 col-lg-6 col-12">
                <div class="iconsquare">
                    <i class="fa fa-edit"></i>
                </div>
                <div class="iconbox-content">
                    <h4>Funktionalität Entwicklung</h4>
                </div>
            </div>
            <br>
            <div class="marketing-spots span3 col-lg-6 col-12">
                <div class="iconsquare">
                    <i class="fa fa-link"></i>
                </div>
                <div class="iconbox-content">
                    <h4>API Integration</h4>
                </div>
            </div>
            <div class="marketing-spots span3 col-lg-6 col-12">
                <div class="iconsquare">
                    <i class="fa fa-life-ring"></i>
                </div>
                <div class="iconbox-content">
                    <h4>LMS Beratung</h4>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="text-center">
            <a class="btn btn-primary btn-lg" target="_blank" href="https://edwiser.org/contact-us/">Uns kontaktieren</a>&nbsp;&nbsp;
        </div>
    </div>
</div>
<br />';
$string['presetfiles'] = 'Zusätzliche Voreinstellungsdateien für Themen';
$string['presetfiles_desc'] = 'Voreinstellungsdateien können verwendet werden, um das Erscheinungsbild des Themas drastisch zu ändern.';
$string['preset'] = 'Themenvoreinstellung';
$string['preset_desc'] = 'Wählen Sie eine Voreinstellung, um das Aussehen des Themas weitgehend zu ändern.';
$string['rawscss'] = 'Raw SCSS';
$string['rawscss_desc'] = 'Verwenden Sie dieses Feld, um SCSS- oder CSS-Code bereitzustellen, der am Ende des Stylesheets eingefügt wird.';
$string['rawscsspre'] = 'Rohes anfängliches SCSS';
$string['rawscsspre_desc'] = 'In diesem Feld können Sie den initialisierenden SCSS-Code eingeben, der vor allen anderen Eingaben eingefügt wird. Meistens verwenden Sie diese Einstellung, um Variablen zu definieren.';
$string['currentinparentheses'] = '(aktuell)';
$string['advancedsettings'] = 'Erweiterte Einstellungen';
$string['brandcolor'] = 'Markenfarbe';
$string['brandcolor_desc'] = 'Die Akzentfarbe.';

$string['licensenotactive'] = '<strong>Alert!</strong>Lizenz ist nicht aktiviert, bitte <strong>aktivieren</strong> Sie die Lizenz in den RemUI Einstellungen.';
$string['licensenotactiveadmin'] = '<strong>Alert!</strong> Lizenz ist nicht aktiviert, bitte <strong>aktivieren</strong> Sie die Lizenz<a href="'.$CFG->wwwroot.'/admin/settings.php?section=themesettingremui#remuilicensestatus" > hier</a>.';
$string['activatelicense'] = 'Lizenz aktivieren';
$string['deactivatelicense'] = 'Lizenz deaktivieren';
$string['renewlicense'] = 'Lizenz erneuern';
$string['active'] = 'Aktiv';
$string['notactive'] = 'Nicht Aktiv';
$string['expired'] = 'Abgelaufen';
$string['licensekey'] = 'Lizenzschlüssel';
$string['licensestatus'] = 'Lizen Status';
$string['noresponsereceived'] = 'Keinen Antwort von dem Server. Bitte später noch einmal versuchen.';
$string['licensekeydeactivated'] = 'Lizenzschlüssel ist deaktiviert.';
$string['siteinactive'] = 'Seite ist deaktiviert (Auf Lizenz aktivieren klicken, um das Plugin zu aktivieren).';
$string['entervalidlicensekey'] = 'Bitte den gültigen Lizenzschlüssel eingeben.';
$string['licensekeyisdisabled'] = 'Ihr Lizenzschlüssel ist deaktiviert.';
$string['licensekeyhasexpired'] = "Ihr Lizenzschlüssel ist abgelaufen. Bitte erneuern Sie ihn.";
$string['licensekeyactivated'] = "Ihr Lizenzschlüssel ist aktiviert.";
$string['enterlicensekey'] = "Bitte den Lizenzschlüssel eingeben.";

$string['activitynextpreviousbutton'] = 'Aktivieren Sie die Schaltfläche Nächste / Vorherige Aktivität';
$string['activitynextpreviousbuttondesc'] = 'Die Schaltfläche Nächste / Vorherige Aktivität wird oben auf der Aktivität angezeigt, um schnell zu wechseln
';
$string['disablenextprevious'] = 'Deaktivieren';
$string['enablenextprevious'] = 'Aktivieren';
$string['enablenextpreviouswithname'] = 'Aktiviere mit Aktivitätsname
';

// course
$string['nosummary'] = 'Es wurde keine Zusammenfassung in dem Kurs hinzugefügt.';
$string['defaultimg'] = 'Voreingestelltes Bild 100 x 100.';
$string['choosecategory'] = 'Kategorie auswählen';
$string['allcategory'] = 'Alle Kategorien';
$string['viewcours'] = 'Kurs ansehen';
$string['taught-by'] = 'Lehrer';
$string['enroluser'] = 'Benutzer anmelden';
$string['graderreport'] = 'Note Report';
$string['activityeport'] = 'Aktivitätsreport';
$string['editcourse'] = 'Kurs bearbeiten';
// course sorting strings
$string['categorysort'] = 'Kategorien sortieren';
$string['sortdefault'] = 'Sortieren (keine)';
$string['sortascending'] = 'Sortieren von A bis Z.';
$string['sortdescending'] = 'Sortieren Sie Z nach A';

// Next Previous Activity
$string['activityprev'] = 'Vorherige Aktivität';
$string['activitynext'] = 'Nächste Aktivität';

// Dashboard Element -> overview
$string['enabledashboardelements'] = 'Enable Dashboard Elements';
$string['enabledashboardelementsdesc'] = 'Uncheck to disable Edwiser RemUI custom widget on dashboard.';
$string['totaldiskusage'] = 'Gesamte Speicherplatznutzung';
$string['activemembers'] = 'Aktive Mitglieder';
$string['newmembers'] = 'Neue Mitgliedern';
$string['coursesdiskusage'] = 'Kurs - Speicherplatznutzung';
$string['activestudents'] = 'Aktive Studenten';

// Schnelle Nachricht
$string['quickmessage'] = 'Schnelle Nachricht';
$string['entermessage'] = 'Bitte eine Nachricht eingeben!';
$string['selectcontact'] = 'Bitte einen Kontakt auswählen!';
$string['selectacontact'] = 'Einen Kontakt auswählen';
$string['sendmessage'] = 'Nachricht schicken';
$string['yourcontactlisistempty'] = 'Ihre Kontaktliste ist leer!';
$string['viewallmessages'] = 'Alle Nachrichten sehen';
$string['messagesent'] = 'Erfolgreich gesendet!';
$string['messagenotsent'] = 'Nachricht nicht gesendet! Geben Sie bitte die richtige Werte ein.';
$string['messagenotsenterror'] = 'Nachricht nicht gesendet! Etwas ist schief gelaufen.';
$string['sendingmessage'] = 'Nachricht wird gesendet...';
$string['sendmoremessage'] = 'Weitere Nachricht senden';

// Allgemeine Einstellungen
$string['generalsettings' ] = 'Allgemeine Einstellungen';
$string['navsettings'] = 'Nav Einstellungen';
$string['colorsettings'] = 'Farbeinstellungen';
$string['fontsettings' ] = 'Schriftart Einstellungen';
$string['slidersettings'] = 'Schieberegler-Einstellungen';
$string['configtitle'] = 'Edwiser RemUI';

$string['dashboardsettingdesc'] = 'Die Dashboard-Einstellungen enthalten die Einstellungen zu den Blöcken, die hinzugefügt werden sollen';

// Font Einstellungen.
$string['fontselect'] = 'Schriftart Auswähler';
$string['fontselectdesc'] = 'Wählen Sie entweder die Standardmäßigen Schriftart oder Google Web Font. Bitte zuerst speichern, um die Optionen für Ihre Auswahl zu zeigen.';
$string['fonttypestandard'] = 'Standardmäßige Schriftart';
$string['fonttypegoogle'] = 'Google web Font';
$string['fontnameheading'] = 'Überschrift- Font';
$string['fontnameheadingdesc'] = 'Den genauen Schriftartnamen für die Überschriften eingeben.';
$string['fontnamebody'] = 'Text Font';
$string['fontnamebodydesc'] = 'Geben Sie den genauen Namen für die Schriftart ein, um diese für alle anderen Texte zu nutzten.';

/* Dashboard Einstellungen*/
$string['dashboardsetting'] = 'Dashboard Einstellungen';
$string['olddashboard'] = 'Auf Ihrem System ist ein altes RemUI-Block-Plugin installiert. Um neue Funktionen und Einstellungen zu erhalten, aktualisieren Sie bitte Ihr RemUI Block-Plugin auf die neueste Version.';
$string['themecolor'] = 'Theme Farbe';
$string['themecolordesc'] = 'Welche Farbe soll Ihr Theme haben. Dies wird viele Komponenten ändern, um die gewünschte Farbe auf den Moodle Seiten zu erzeugen.';
$string['themetextcolor'] = 'Text Farbe';
$string['themetextcolordesc'] = 'Wählen Sie die Farbe für Ihren Text.';
$string['layout'] = 'Layout auswählen';
$string['layoutdesc'] = 'Aktivieren Sie das Layout entweder das Fixed Layout ( Kopfzeilen Menü wird oben fest stehen) oder aus dem Deafault Layout. '; // Boxed Layout oder
$string['defaultlayout'] = 'Voreinstellung';
$string['fixedlayout'] = 'Feste Kopfzeile';
$string['defaultboxed'] = 'Boxed';
$string['layoutimage'] = 'Boxed Layout Hintergrundbild';
$string['layoutimagedesc'] = 'Das Hintergrundbild hochladen, um es auf das Boxed Layout anzulegen .';
$string['sidebar'] = 'Seitenleiste auswählen';
$string['sidebardesc'] = 'Art der Seitenleiste auswählen';
$string['rightsidebarslide'] = 'Rechte Seitenleiste umschalten';
$string['rightsidebarslidedesc'] = 'Standardmäßit die rechte Seitenleiste umschalte.';
$string['leftsidebarslide'] = 'Linke Seitenleiste umschalten';
$string['leftsidebarslidedesc'] = 'Standardmäßit die linke Seitenleiste umschalte..';
$string['leftsidebarmini'] = 'Seitenleiste-mini aktivieren';
$string['leftsidebarminidesc'] = 'Seitenleiste-mini aktivieren';
$string['rightsidebarskin'] = 'Rechte Seitenleisteoberfläche umschalten ';
$string['rightsidebarskindesc'] = 'Rechte Seitenleisteoberfläche ändern.';

/*Farbe*/
$string['colorscheme'] = 'Ein Farbschema auswählen';
$string['colorschemedesc'] = 'Sie können ein Farbschema für Ihre Website aus diesesn Optionen auswählen- Blau, Schwarz, Purpur, Grün, Gelb, Blau-hell, Purpur-hell, Grün-hell und Gelb-hell. <br /> <b>Hell</b> - gibt einen hellen Hintergrund für Ihr left side bar.';
$string['blue'] = 'Blau';
$string['white'] = 'Weiß';
$string['purple'] = 'Purpur';
$string['green'] = 'Grün';
$string['red'] = 'Rot';
$string['yellow'] = 'Gelb';
$string['bluelight'] = 'Blau hell';
$string['whitelight'] = 'Weiß hell';
$string['purplelight'] = 'Purpur hell';
$string['greenlight'] = 'Grün hell';
$string['redlight'] = 'Rot hell';
$string['yellowlight'] = 'Gelb hell';
$string['custom'] = 'Dunkel-kundenspezifisch';
$string['customlight'] = 'Hell-kundenspezifisch';
$string['customskin_color'] = 'Skin Farbe';
$string['customskin_color_desc'] = 'Sie können eine custom Farbe für Ihr Theme hier auswählen.';

/* Kurseinstellungen*/
$string['courseperpage'] = 'Kurse pro Seite';
$string['courseperpagedesc'] = 'Die Anzahl von Kursen, die pro Seite in der Kurs Archiv Seite angezeigt werden soll.';
$string['enableimgsinglecourse'] = 'Enable image on single course page';
$string['enableimgsinglecoursedesc'] = 'Uncheck to disable formating of image on single course page.';
$string['nocoursefound'] = 'Keinen Kurs gefunden';

/*logo*/
$string['logo'] = 'Logo';
$string['logodesc'] = 'Sie können ein Logo hinzufügen, um es in der Kopfzeile anzuzeigen. Hinweis - Bevorzugte Größe ist 50px. Falls Sie es anpassen wollen, können Sie es aus der Custom CSS Box tun.';
$string['logomini'] = 'LogoMini';
$string['logominidesc'] = 'You may add the logomini to be displayed on the header when sidebar is collapsed. Note- Preferred height is 50px. In case you wish to customise, you can do so from the custom CSS box.';
$string['siteicon'] = 'Website-Symbol';
$string['siteicondesc'] = 'Haben Sie kein Logo? Sie können eines aus dieser Liste auswählen <a href="https://fontawesome.com/v4.7.0/cheatsheet/" target="_new">hier</a>. Geben Sie nur das ein, was nach dem "fa-" kommt. ';
$string['logoorsitename'] = 'Das Logo Format auswählen';
$string['logoorsitenamedesc'] = 'Sie können das Aussehen des Seiten Kopfzeile-Logos ändern. Die verfügbare Möglichkeiten sind: Logo- Nur das Logo wird gezeigt; Icon+Sitename - Ein Icon zusammen mit einem Seitennamen wird gezeigt.';
$string['onlylogo'] = 'Nur Logo';
$string['onlysitename'] = 'Nur Seitenname';
$string['iconsitename'] = 'Icon und Seitenname';

/*favicon*/
$string['favicon'] = 'Favicon';
$string['favicondesc'] = 'Ihr Website "Lieblings Icon". Hier können Sie Ihr Favicon für Ihre Website einsetzen.';
$string['enablehomedesc'] = 'Home Desc aktivieren';

/*custom css*/
$string['customcss'] = 'Custom CSS';
$string['customcssdesc'] = 'Sie können das CSS aus der Text Box anpassen. Diese Veränderungen werden auf alle Seiten Ihrer Installation angelegt.';

/*google analytics*/
$string['googleanalytics'] = 'Google Analytics Tracking ID';
$string['googleanalyticsdesc'] = 'Bitte geben Sie Ihre  Google Analytics Tracking ID ein, um Analyticsauf Ihre Website zu aktivieren . Der  tracking ID Format sollte so sein  [UA-XXXXX-Y].<br />Bitte beachten Sie, dass Sie mit dieser Einstellung Daten an Google Analytics senden und sicherstellen sollten, dass Ihre Nutzer darüber informiert werden. In unserem Produkt werden keine Daten gespeichert, die an Google Analytics gesendet werden.';

$string['frontpageimge'] = '';

$string['four'] = '4';
$string['eight'] = '8';
$string['twelve'] = '12';

$string['enablefrontpagecourseimg'] = 'Enable Images in Front Page Courses';
$string['enablefrontpagecourseimgdesc'] = 'Enable images in Front Page Courses Available section ';

// Social media settings
$string['socialmedia'] = 'Social Media Einstellungen';
$string['socialmediadesc'] = 'Geben Sie den social media Link für Ihre Seite ein.';
$string['facebooksetting'] = 'Facebook Einstellungen';
$string['facebooksettingdesc'] = 'Geben Sie Ihren Facebook Link ein. Zum Beispiel. https://www.facebook.com/EndlessBrain';
$string['twittersetting'] = 'Twitter Einstellungen';
$string['twittersettingdesc'] = 'Geben Sie Ihren Twitter Link ein. Zum Beispiel. https://www.twitter.com/EndlessBrain';
$string['linkedinsetting'] = 'Linkedin Einstellungen';
$string['linkedinsettingdesc'] = 'Geben Sie Ihren Linkedin Link ein. Zum Beispiel. https://www.linkedin.com/in/pagename <br/> Falls Ihr Land Indien ist.';
$string['gplussetting'] = 'Google Plus Einstellungen';
$string['gplussettingdesc'] = 'Geben Sie Ihren Google Plus Page Link ein. Zum Beispiel. https://plus.google.com/pagename';
$string['youtubesetting'] = 'YouTube Einstellungen';
$string['youtubesettingdesc'] = 'Geben Sie Ihren YouTube Link ein.Zum Beispiel. https://www.youtube.com/channel/UCU1u6QtAAPJrV0v0_c2EISA';
$string['instagramsetting'] = 'Instagram Einstellungen';
$string['instagramsettingdesc'] = 'Geben Sie Ihren Instagram Link ein. Zum Beispiel. https://www.instagram.com/name';
$string['pinterestsetting'] = 'Pinterest Einstellungen';
$string['pinterestsettingdesc'] = 'Geben Sie Ihren Pinterest Link ein. Zum Beispiel. https://www.pinterest.com/name';
$string['quorasetting'] = 'Quora Einstellungen';
$string['quorasettingdesc'] = 'Geben Sie Ihren Quora Link ein. Zum Beispiel. https://www.quora.com/name';


// Fußzeile Teil Einstellungen
$string['footersetting'] = 'Fußzeile Einstellungen';
// Fußzeile Spalte 1
$string['footercolumn1heading'] = 'Fußzeile Inhalt für Spalte 1 (Links)';
$string['footercolumn1headingdesc'] = 'Dieses Teil bezieht sich auf den unteren Teil ( Spalte 1) von Ihrer Startseite.';

$string['footercolumn1title'] = 'Fußzeile Spalte 1 Titel ';
$string['footercolumn1titledesc'] = 'Hier können Sie einen Titel für die erste Spalte der Fußzeile hinzufügen.';
$string['footercolumn1customhtml'] = 'Custom HTML';
$string['footercolumn1customhtmldesc'] = 'Sie können HTML für Fußzeile Spalte 1 von der oberen Text Box anpassen.';


// Footer  Column 2
$string['footercolumn2heading'] = 'Fußzeile Inhalt für Spalte  2 (Mittel)';
$string['footercolumn2headingdesc'] = 'Dieser Teil bezieht sich auf den untere Teil ( Spalte 2) von Ihrer Startseite.';

$string['footercolumn2title'] = 'Fußzeile Spalte 2 Titel';
$string['footercolumn2titledesc'] = 'Hier können Sie einen Titel für die erste Spalte der Fußzeile hinzufügen.';
$string['footercolumn2customhtml'] = 'Custom HTML';
$string['footercolumn2customhtmldesc'] = 'Sie können HTML für Fußzeile Spalte 2 von der oberen Text Box anpassen.';

// Footer  Column 3
$string['footercolumn3heading'] = 'Fußzeile Inhalt für Spalte  3 (Rechts)';
$string['footercolumn3headingdesc'] = 'Dieser Teil bezieht sich auf den unteren Teil ( Spalte 3) von Ihrer Startseite.';

$string['footercolumn3title'] = 'Fußzeile Spalte 3 Titel';
$string['footercolumn3titledesc'] = 'Hier können Sie einen Titel für die erste Spalte der Fußzeile hinzufügen.';
$string['footercolumn3customhtml'] = 'Custom HTML';
$string['footercolumn3customhtmldesc'] = 'Sie können HTML für Fußzeile Spalte 3 von der oberen Text Box anpassen.';

// Fußzeile Unten-Rechts Teil
$string['footerbottomheading'] = 'Einstellung Fußzeile Unterer Teil ';
$string['footerbottomdesc'] = 'Hier können Sie Ihren eigene Link einfügen, den Sie in dem unteren Teil der Fußzeile eingeben wollen.';
$string['footerbottomtextdesc'] = 'Geben Sie den Text für das Unten-Rechts Teil der Fußzeile ein.';
$string['poweredbyedwiser'] = 'Powered by Edwiser';
$string['poweredbyedwiserdesc'] = 'Uncheck to remove  \'Powered by Edwiser\' from your site.';

// Log-in Einstellungen Seite Code beginnt.

$string['loginsettings'] = 'Einstellungen Log-in Seite ';
$string['navlogin_popup'] = ' Login Popup aktivieren';
$string['navlogin_popupdesc'] = ' Login popup in Kopfzeile aktivieren.';
$string['loginsettingpic'] = 'Hier ein Bild hochladen';
$string['loginsettingpicdesc'] = 'Dieses Bild wird in dem Hintergrund des Log-in Formulars angezeigt.';
$string['signuptextcolor'] = 'Registrierungs Panel Textfarbe';
$string['signuptextcolordesc'] = 'Wählen Sie die Textfarbe für das Registrierungs Panel aus, die zu Ihrem Hintergrund Bild Ihrer Log-in Seite passt.';
$string['left'] = "Links";
$string['right'] = "Rechts";
$string['remember_me'] = "Mich erinnern";
$string['brandlogopos'] = "Markenlogo Position";
$string['brandlogoposdesc'] = "Ob aktiviert, wird das Markenlogo in der rechten Seitenleiste über dem Anmeldeformular angezeigt.";
$string['brandlogotext'] = "Seitenbeschreibung";
$string['brandlogotextdesc'] = "Fügen Sie Text für die Website-Beschreibung hinzu, die auf der anmelden- und Registrierungsseite angezeigt wird. Lassen Sie dieses Feld leer, wenn Sie keine Beschreibung eingeben möchten.";
// Log-in Einstellungen Seite Code beendet.

// von theme snap
$string['title'] = 'Titel';
$string['contents'] = 'Inhalte';
$string['addanewsection'] = 'Ein neuen Inhalt erstellen';
$string['createsection'] = 'Inhalt erstellen';



/* Benutzerprofil Seite*/

$string['blogentries'] = 'Blog Einträge';
$string['discussions'] = 'Diskussionen';
$string['discussionreplies'] = 'Antworten';
$string['aboutme'] = 'Über mich';

$string['addtocontacts'] = 'Zu Kontakten hinzufügen';
$string['removefromcontacts'] = 'Aus Kontakten entfernen ';
$string['block'] = 'Blockieren';
$string['removeblock'] = 'Blockierung entfernen';

$string['interests'] = 'Interesse';
$string['institution'] = 'Institution';
$string['location'] = 'Ort';
$string['description'] = 'Beschreibung';

$string['commoncourses'] = 'Gemeinsame Kursen';
$string['editprofile'] = 'Profil bearbeiten';

$string['firstname'] = 'Vorname';
$string['surname'] = 'Nachname';
$string['email'] = 'Email';
$string['citytown'] = 'Stadt';
$string['country'] = 'Land';
$string['selectcountry'] = 'Land auswählen';
$string['description'] = 'Beschreibung';

$string['nocommoncourses'] = 'Sie haben sich mit diesem Benutzer in keinem gemeinsamen Kursen angemeldet.';
$string['notenrolledanycourse'] = 'Sie haben sich für keinen angemeldet.';
$string['nobadgesyetcurrent'] = 'Sie haben noch keine Abzeichen.';
$string['nobadgesyetother'] = 'Dieser Benutzer hat noch keine Abzeichen.';
$string['grade'] = "Note";
$string['viewnotes'] = "Anmerkungen ansehen";

// Benutzerprofil Seite js

$string['actioncouldnotbeperformed'] = 'Vorgang konnte nicht ausgeführt werden!';
$string['enterfirstname'] = 'Geben Sie bitte Ihren Vornamen ein.';
$string['enterlastname'] = 'Geben Sie bitte Ihren Nachnamen ein.';
$string['enteremailid'] = 'Geben Sie bitte Ihre Email Adresse ein.';
$string['enterproperemailid'] = 'Geben Sie bitte Ihre richtige Email Adresse ein.';
$string['detailssavedsuccessfully'] = 'Details erfolgreich gespeichert!';



/* Kopfzeile */

$string['startedsince'] = 'Begonnen seit ';
$string['startingin'] = 'beginnt ab ';

$string['userimage'] = 'Benutzer Bild';

$string['seeallmessages'] = 'Alle Nachrichten ansehen';
$string['viewallnotifications'] = 'Alle Benachrichtigungen ansehen';
$string['viewallupcomingevents'] = 'Alle kommenden Events ansehen';

$string['youhavemessages'] = 'Sie haben {$a} ungelesene Nachricht (en)';
$string['youhavenomessages'] = 'Sie haben keine ungelesene Nachrichten';

$string['youhavenotifications'] = 'Sie haben {$a} Benachrichtigungen';
$string['youhavenonotifications'] = 'Sie haben keine Benachrichtigungen';

$string['youhaveupcomingevents'] = 'Sie haben {$a} kommende Event(s)';
$string['youhavenoupcomingevents'] = 'Sie haben keine kommende Events';


/* Dashboard Elemente */

// Hinweise hinzufügen
$string['addnotes'] = 'Hinweise hinzufügen';
$string['selectacourse'] = 'Einen Kurs auswählen';

$string['addsitenote'] = 'Seitenhinweis hinzufügen';
$string['addcoursenote'] = 'Kurshinweis hinzufügen';
$string['addpersonalnote'] = 'persönlichen Hinweis hinzufügen';
$string['deadlines'] = 'Fristen';

// Hinweise hinzufügen js
$string['selectastudent'] = 'Einen Studenten auswählen';
$string['total'] = 'Insgesamt';
$string['nousersenrolledincourse'] = 'Es gibt keine angemeldeten Benutzer im  {$a} Kurs.';
$string['selectcoursetodisplayusers'] = 'Einen Kurs auswählen, um die angemeldeten Benutzer hier zu zeigen.';


// Deadlines
$string['gotocalendar'] = 'Zum Kalender gehen ';
$string['noupcomingdeadlines'] = 'Es gibt keine bevorstehende Frist!';
$string['in'] = 'In';
$string['since'] = 'Seit';

// Neueste Mitgliedern
$string['latestmembers'] = 'Neueste Mitglieder';
$string['viewallusers'] = 'Alle Benutzer sehen';

// Neulich aktive Forums
$string['recentlyactiveforums'] = 'Zuletzt aktive Forums ';
$string['norecentlyactiveforums'] = 'Keine kürzlich aktiven Foren!';

// Neueste Aufgaben
$string['assignmentstobegraded'] = 'Aufgaben zum benoten ';
$string['assignment'] = 'Aufgabe';
$string['recentfeedback'] = 'Neuestes Feedback';

// Neueste Events
$string['upcomingevents'] = 'Kommende Veranstaltungen ';
$string['productimage'] = 'Produkt Bild';
$string['noupcomingeventstoshow'] = 'Es gibt keine bevorstehende Veranstaltungen!';
$string['viewallevents'] = 'Alle Veranstaltungen sehen';
$string['addnewevent'] = 'Neue Veranstaltungen hinzufügen';

// Angemeldete Benutzer statistiken
$string['enrolleduserstats'] = 'Angemeldete Benutzer Statistiken für diese Kurskategorien ';
$string['problemwhileloadingdata'] = 'Sorry, beim laden der Daten ist etwas schief gelaufen.';
$string['nocoursecategoryfound'] = 'Keine Kurskategorien in dem System gefunden.';
$string['nousersincoursecategoryfound'] = 'Keine angemeldeten Benutzer in dieser Kurskategorie gefunden.';

// Quiz statistiken
$string['quizstats'] = 'Quiz Versuche Statistik für diese Kurse';
$string['totalusersattemptedquiz'] = 'Alle Benutzer, die das Quiz versucht haben ';
$string['totalusersnotattemptedquiz'] = 'Alle Benutzer, die das Quiz nicht versucht haben ';

/* Theme Kontroller */

$string['years'] = 'Jahr(e)';
$string['months'] = 'Monat(e)';
$string['days'] = 'Tag(e)';
$string['hours'] = 'Stunde(n)';
$string['mins'] = 'Minute(n)';

$string['parametermustbeobjectorintegerorstring'] = 'Übergabevariable {$a} muss entweder ein Objekt oder ein Integer oder numerische String sein.';
$string['usernotenrolledoncoursewithcapability'] = 'Benutzer wird nicht mit Fähigkeit mit dem Kurs angemeldet werden.';
$string['userdoesnothaverequiredcoursecapability'] = 'Benutzer hat die erforderliche Kurs Fähigkeit nicht.';
$string['coursesetuptonotshowgradebook'] = 'Kurs so eingestellt, dass die Studenten das Notenbuch nicht sehen können.';
$string['coursegradeishiddenfromstudents'] = 'Kurs Noten sind vor den Studenten versteckt.';
$string['feedbackavailable'] = 'Feedback verfügbar';
$string['nograding'] = 'Sie haben nichts eingereicht, was benotet werden kann.';


/* Kalender Seite */
$string['selectcoursetoaddactivity'] = 'Kurs auswählen, um eine Aktivität hinzuzufügen';
$string['addnewactivity'] = 'Neue Aktivität hinzufügen';

// Kalender Seite js
$string['redirectingtocourse'] = 'Zur {$a} Kursseite umleiten..';
$string['nopermissiontoaddactivityinanycourse'] = 'Sie haben keine Erlaubnis, Aktivitäten in einem Kurs hinzuzufügen. .';
$string['nopermissiontoaddactivityincourse'] = 'Sie haben keine Erlaubnis, eine Aktivität in  {$a} Kurs hinzuzufügen.';
$string['selectyouroption'] = 'Ihre Option auswählen ';


/* Blog Archiv Seite */
$string['viewblog'] = 'Den ganzen Blog sehen';


/* Kurs js */

$string['hidesection'] = 'Teil verstecken';
$string['showsection'] = 'Teil zeigen';
$string['hidesections'] = 'Abschnitt verstecken';
$string['showsections'] = 'Abschnitt zeigen';
$string['addsection'] = 'Abschnitt hinzufügen';

$string['overdue'] = 'überfällig';
$string['due'] = 'fällig';

/* Footer headings */
$string['quicklinks'] = 'Schnelle Links';

/*coruse activity navigation*/
$string['backtocourse'] = 'Kursüberblick';
$string['sectionnotitle'] = 'Allgemein';
$string['sectiondefaulttitle'] = 'Abschnitt';

$string['sectionactivities'] = 'Aktivitäten';
$string['showless'] = 'Weniger zeigen';
$string['showmore'] = 'Mehr zeigen';
$string['allcategories'] = 'Alle kategorien';
$string['category'] = 'kategorie';
$string['administrator'] = 'Administrator';
$string['badges'] = 'Kennzeichen';
$string['webpage'] = 'Webseite';
$string['contacts'] = 'Kontakten';
$string['courses'] = 'Kursen';
$string['preferences'] = 'Bevorzugungen';
$string['complete'] = 'Komplett';
$string['start_date'] = 'Anfangsdatum';
$string['submit'] = 'Abgeben';
$string['fontname'] = 'Site Font';
$string['fontnamedesc'] = 'Geben sie den genauen Namen von dem Font für Moodle ein.';
$string['followus'] = 'Uns folgen';
$string['poweredby'] = 'Von Edwiser RemUI betrieben';
$string['signin'] = 'Sich anmelden';
$string['forgotpassword'] = 'Passwort vergessen?';
$string['noaccount'] = 'Kein Konto?';
$string['applysitewide'] = 'Für umfassende Website anwenden';
$string['applysitecolor'] = 'Site-Farbe anwenden';

// User profile page js
$string['actioncouldnotbeperformed'] = 'Aktion konnte nicht ausgeführt werden!';
$string['enterfirstname'] = 'Bitte geben Sie Ihren Vornamen ein.';
$string['enterlastname'] = 'Bitte geben Sie Ihren Nachnamen ein.';
$string['enteremailid'] = 'Bitte geben Sie Ihre Email Adresse ein.';
$string['enterproperemailid'] = 'Bitte geben Sie eine gültige Email Adresse ein.';
$string['detailssavedsuccessfully'] = 'Details erfolgreich gespeichert!';

/* Blog Archive page */
$string['viewblog'] = 'Ganzen Blog ansehen';
$string['author'] = 'Autor';

$string['createaccount'] = 'Hier können Sie ein neues Konto erstellen.';
$string['signup'] = 'Sich registrieren';
$string['togglesearch'] = 'Suche umschalten';
$string['togglefullscreen'] = 'Vollbild umschalten';
$string['navbartype'] = 'Farbe der Navigationsleiste';
$string['sidebarcolor'] = 'Farbe der Seitenleiste';
$string['sitecolor'] = 'Farbe der Website';
$string['others'] = 'Andere';
$string['today'] = 'Heute';
$string['yesterday'] = 'Gestern';
$string['you_do_not_have_permission_to_perform_this_action'] = 'Sie dürfen diese Aktion nicht ausführen';
$string['viewallcourses'] = 'Alle Kursen ansehen';
$string['readmore'] = 'WEITER LESEN';
$string['aboutremui'] = 'Über Edwiser RemUI';

$string['remuisettings'] = 'RemUI Einstellungen';
$string['createanewcourse'] = 'Einen neuen kurs erstellen';
$string['createarchivepage'] = 'Kurs Archiv Seite';
$string['siteblog'] = 'Site Blog';
$string['selectcategory'] = 'Kategorie auswählen';
$string['nocoursesavail'] = 'Entschuldigung. Derzeit stehen keine Kurse zur Verfügung.';
$string['norecentfeedback'] = 'Keine neue Feedbacks!';

$string['loadmore'] = 'Mehr laden';

// Nachricht und Updates Tab
$string['newsandupdates'] = 'Nachrichte und Updates';
$string['newupdatemessage'] = 'Neue Update für RemUI steht zur Verfügung.';
$string['currentversionmessage'] = 'Ihre aktuelle Version ist';
$string['downloadupdate'] = ' Update herunterladen';
$string['latestversionmessage'] = 'Sie benutzen die neueste Version von RemUI.';
$string['rateremui'] = 'RemUI bewerten';
$string['fullname']  = 'Voller Name';
$string['providefeedback'] = 'Bitte geben Sie Ihren Feedback von RemUI ein';
$string['sendfeedback'] = 'Feedback schicken';
$string['recentnews'] = 'Neueste Nachricht';

/* Grey Box Image Home Page */
$string['frontpageblockimage'] = 'Bild hochladen';
$string['frontpageblockimagedesc'] = 'Sie können dazu ein Bild als Inhalt hochladen.';

/* Meine Kursseite */
$string['resume'] = 'Fortsetzen';
$string['start'] = 'Beginnen';
$string['completed'] = 'Fertig';

/* Dashboard Page */
$string['welcome-msg'] = 'Willkommen in Ihrem Dashboard';
$string['coursecompleted'] = 'KURSE ABGESCHLOSSEN';
$string['activitycompleted'] = 'AKTIVITÄTEN ABGESCHLOSSEN';
$string['enrolledcourses'] = 'EINGESCHRIEBENE KURSE';
$string['courseactivities'] = 'KURSAKTIVITÄTEN';
$string['noevents'] = "Keine fälligen Ereignisse";
$string['overdue'] = "Overdue";
$string['upcoming'] = "Bevorstehende";
$string['expired'] = 'Abgelaufen';
$string['selectcourse'] = "Wählen Sie einen Kurs aus";
$string['courseanlytics'] = "Kursanalyse";
$string['highestgrade'] = "HÖCHSTE KLASSE";
$string['lowestgrade'] = "NIEDRIGSTE KLASSE";
$string['averagegrade'] = "DURCHSCHNITTLICH KLASSE";
$string['viewcourse'] = "KURS ANSEHEN";
$string['mycourses'] = "Meine Kurse";
$string['tasks'] = "Aufgaben zum Abschluss";
$string['coursestats'] = "Kursstatistiken";
$string['allActivities'] = "Alle Aktivitäten";


/* Footer Setting */
$string['footerbottomtext'] = 'Fußzeilentext links unten';
$string['footerbottomlink'] = 'Fußzeile unten links link';
$string['footerbottomlinkdesc'] = 'Geben Sie den Link für den unteren linken Teil der Fußzeile. Zum Beispiel. http://www.EndlessBrain.com';

$string['enableannouncement'] = "Website-Ankündigung aktivieren";
$string['enableannouncementdesc'] = "Eine Website-umfassende Ankündigung für Site Besucher/ Studenten aktivieren.";
$string['announcementtext'] = "Ankündigung";
$string['announcementtextdesc'] = "AAnkündigung Nachricht, der auf die ganze Website gezeigt wird.";
$string['announcementtype'] = "Art der Ankündigung";
$string['announcementtypedesc'] = "info/alert/danger/success";
$string['typeinfo'] = "Ankündigung von Information";
$string['typedanger'] = "Dringende Ankündigung";
$string['typewarning'] = "Ankündigung von Warnung";
$string['typesuccess'] = "Ankündigung von Erfolg";


// Dashboard Edwiser Remui Blocks
$string['courseprogressblock'] = 'Kurs Fortschritts Block';
$string['enrolledusersblock'] = 'Registrierte Benutzer Block';
$string['quizattemptsblock'] = 'Quiz Versuche Block';
$string['courseanlyticsblock'] = 'Kursanalyse Block';
$string['latestmembersblock'] = 'Neueste Mitglieder Block';
$string['addnotesblock'] = 'Notizen hinzufügen Block';
$string['recentfeedbackblock'] = 'Neueste Feedback Block';
$string['recentforumsblock'] = 'Neueste Forums Block';

$string['courseprogressblockdesc'] = 'Aktivieren Kurs Fortschritts Block';
$string['enrolledusersblockdesc'] = 'Aktivieren Registrierte Benutzer Block';
$string['quizattemptsblockdesc'] = 'Aktivieren Quiz Versuche Block';
$string['courseanlyticsblockdesc'] = 'Aktivieren Kursanalyse Block';
$string['latestmembersblockdesc'] = 'Aktivieren Neueste Mitglieder Block';
$string['addnotesblockdesc'] = 'Aktivieren Notizen Hinzufügen Block';
$string['recentfeedbackblockdesc'] = 'Aktivieren Neueste Feedback Block';
$string['recentforumsblockdesc'] = 'Aktivieren Neueste Forums Block';

// Teacher Dashboard Strings
$string['courseprogress'] = "Kurs Fortschritt";
$string['course'] = "Kurs";
$string['startdate'] = "Anfangsdatum";
$string['enrolledstudents'] = "Studenten";
$string['progress'] = "Fortschritt";
$string['name'] = "Name";
$string['status'] = "Status";
$string['back'] = "Zurück";


$string['recentactivityblock'] = 'Kürzliche Aktivitäten Block';
$string['recentactivityblockdesc'] = 'Wenn diese Option aktiviert ist, wird der Block "Kürzliche Aktivitäten
" im Dashboard angezeigt';

$string['enablerecentcourses'] = 'Aktivieren Sie Kürzlich besuchte Kurse';
$string['enablerecentcoursesdesc'] = 'Wenn diese Option aktiviert ist, das Dropdown-Menü Letzte Kurse in der Kopfzeile angezeigt.';

$string['enablecoursestats'] = 'Kursstatistik aktivieren';
$string['enablecoursestatsdesc'] = 'Wenn aktiviert, sehen der Administrator, die Manager und der Lehrer die Statistiken zum Kurs auf der Kursseite.';
$string['enabledictionary'] = 'Wörterbuch aktivieren';
$string['enabledictionarydesc'] = 'Wenn aktiviert, wird die Dictionary-Funktion aktiviert und zeigt die Bedeutung des ausgewählten Textes in der Tooltip an.';
$string['more'] = 'Mehr...';

$string['coursedescimage'] = 'Allgemeine Sektion Bildeinstellungen';
$string['coursedescimagedesc'] = 'Wenn diese Option aktiviert ist, wird das Hintergrundbild des allgemeinen Abschnitts aus der Kursübersichtsbeschreibung abgerufen ( Standardmäßig das erste Bild ) andernfalls wird es aus Kurszusammenfassungsdateien abgerufen..';

/* GDPR compliance */

/* Google analytics help */
// $string['googleanalyticshelp'] = '<a class="btn btn-link p-a-0" role="button" data-container="body" data-toggle="popover" data-placement="left" data-content="<div class=&quot;no-overflow&quot;><p>
// Please be aware that by including this setting, you will be sending data to Google Analytics and you should make sure that your users are warned about this. Our product does not store any of the data being sent to Google Analytics.
// </p>

// </div>" data-html="true" tabindex="0" data-trigger="focus" data-original-title="" title="">
// <i class="icon fa fa-question-circle text-info fa-fw " aria-hidden="true" title="Help with Choice" aria-label="Help with Choice"></i>
// </a>';
// $string['googleanalyticshelp'] = '<a class="btn btn-link p-a-0" role="button" data-container="body" data-toggle="popover" data-placement="left" data-content="<div class=&quot;no-overflow&quot;><p>Please be aware that by including this setting, you will be sending data to Google Analytics and you should make sure that your users are warned about this. Our product does not store any of the data being sent to Google Analytics.</p>
// </div> " data-html="true" tabindex="0" data-trigger="focus" data-original-title="" title="">
// <i class="icon fa fa-question-circle text-info fa-fw " aria-hidden="true" title="Help with Display description on course page" aria-label="Help with Display description on course page"></i>
// </a>';
// $string['privacy:metadata:core_files'] = 'Stores Slider images and images for different sections for the home page. Also, a background image uploaded by the admin for the login page is stored by the theme.';

/* Course view preference */
$string['privacy:metadata:preference:course_view_state'] = 'Die Art der Anzeige, die der Benutzer für eine Liste von Kursen bevorzugt';
$string['course_view_state_description_grid'] = 'Um die Kurse im Rasterformat anzuzeigen';
$string['course_view_state_description_list'] = 'Um die Kurse im Listenformat anzuzeigen';

/* Course view preference */
$string['privacy:metadata:preference:viewCourseCategory'] = 'Die Art der Anzeige, die der Benutzer für eine Liste von Kursen bevorzugt';
$string['viewCourseCategory_grid'] = 'Um die Kurse im Rasterformat anzuzeigen';
$string['viewCourseCategory_list'] = 'Um die Kurse im Listenformat anzuzeigen';

/* Aside right view preference */
$string['privacy:metadata:preference:aside_right_state'] = 'Ob der Nebenblock rechts offen gehalten oder angedockt werden soll';
$string['aside_right_state_'] = 'Um den Seitenblock rechts als geöffnet anzuzeigen'; // blank value
$string['aside_right_state_overrideaside'] = 'Um den Seitenblock rechts als angedockt anzuzeigen'; // overrideaside

/* Menu view preference */
$string['privacy:metadata:preference:menubar_state'] = 'Die Art der Anzeige, die der Benutzer für die Menüleiste bevorzugt';
$string['menubar_state_fold'] = 'Um die Menüleiste als gefaltet anzuzeigen';
$string['menubar_state_unfold'] = 'Um die Menüleiste als entfaltet anzuzeigen';
$string['menubar_state_open'] = 'Um die Menüleiste als geöffnet anzuzeigen';
$string['menubar_state_hide'] = 'Um die Menüleiste als ausgeblendet anzuzeigen';
$string['recent'] = 'Kürzlich';

$string['enableheaderbuttons'] = 'Show header buttons in dropdown';
$string['enableheaderbuttonsdesc'] = 'All the buttons which are displayed in header are converted to a single dropdown.';
$string['sidebarpinned'] = 'Sidebar pinned.';
$string['sidebarunpinned'] = 'Sidebar unpinned.';
$string['pinsidebar'] = 'Pin sidebar';
$string['unpinsidebar'] = 'Unpin sidebar';
$string['mergemessagingsidebar'] = 'Meldiergremium zusammenfassen';
$string['mergemessagingsidebardesc'] = 'Verschmelzung Message in die rechte Seitenleiste';

// Course Stats
$string['enrolstudents'] = 'Registrierte <br>Studenten';
$string['studentcompleted'] = 'Studenten <br>Abgeschlossen';
$string['inprogress'] = 'In <br>Bearbeitung';
$string['yettostart'] = 'Noch <br>zu beginnen';

$string['none'] = 'Keiner';
$string['fade'] = 'Verblassen';
$string['slide-top'] = 'Schieben Sie nach oben';
$string['slide-bottom'] = 'Schieben Sie nach unten';
$string['slide-right'] = 'Nach rechts schieben';
$string['slide-left'] = 'Schieben Sie nach links';
$string['slide-left-right'] = 'Alternative: Nach links und Nach rechts schieben';
$string['scale-up'] = 'Vergrößern';
$string['scale-down'] = 'Herunterskalieren';
$string['courseanimation'] = 'Kursanimation';
$string['courseanimationdesc'] = 'Wenn Sie dies aktivieren, wird den Kursen auf der Kursarchivseite eine Animation hinzugefügt';
$string['enablenewcoursecards'] = 'Neue Kurskarten aktivieren';
$string['enablenewcoursecardsdesc'] = 'Wenn Sie dies aktivieren, werden auf der Kursarchivseite neue Kurskarten angezeigt';
$string['publishfrontpage'] = 'Veröffentlichen';
$string['sectiondelete'] = 'Dieser Abschnitt wird in 30 Sekunden endgültig gelöscht, um Änderungen zu vermeiden';
$string['undo'] = 'Innerhalb rückgängig machen';
$string['frontpageheadercolor'] = 'Homepage-Header-Farbe';
$string['frontpageheadercolordesc'] = 'Wenn der Header transparent ist, wird die ausgewählte Farbe auf den Seitenkopf angewendet.';
$string['frontpagetransparentheader'] = 'Homepage transparente Überschrift';
$string['frontpagetransparentheaderdesc'] = 'Wenn der Schieberegler der erste Abschnitt auf der Startseite ist, wird die Kopfzeile als transparent angezeigt.';
$string['frontpageappearanimation'] = 'Abschnitt erscheinen animation';
$string['frontpageappearanimationdesc'] = 'Aktivieren Sie diese Option, um die Anzeige von Animationen für Abschnitte zu aktivieren.';
$string['frontpageappearanimationstyle'] = 'Animationsstil anzeigen';
$string['frontpageappearanimationstyledesc'] = 'Wählen Sie den Animationsstil für den Abschnitt.';
$string['migratorheader'] = 'Migrator';
$string['migrate'] = 'Wandern';
$string['migratormessge'] = '<p> Willkommen beim brandneuen Design von Edwiser Remuis Homepage. Wir haben festgestellt, dass Sie ältere Homepage-Einstellungen haben. Möchten Sie diese Einstellungen migrieren? </ P> <p> <strong> Migrieren </ strong> - Aus älteren Einstellungen werden neue Blöcke erstellt. </ Br> <strong> Abbrechen </ strong> - Sie können eine Startseite erstellen manuell und diese Meldung wird nicht erneut angezeigt. </ p>';
$string['sectionupdated'] = 'Abschnitt erfolgreich aktualisiert. Veröffentlichen, um Änderungen anzuwenden.';
$string['sectiondeleted'] = 'Abschnitt erfolgreich gelöscht. Veröffentlichen, um Änderungen anzuwenden.';

// Slider Section
$string['noofslides'] = 'Anzahl der Folien';
$string['slideheading'] = "Slide Heading";
$string['slideheadingplaceholder'] = 'Geben Sie hier die Folienüberschrift ein';
$string['slidedescription'] = "Slide Description";
$string['slidedescriptionplaceholder'] = 'Geben Sie hier die Folienbeschreibung ein';
$string['btnlabel'] = 'Tastenbeschriftung';
$string['btnlink'] = 'Button Link';
$string['missingslide'] = 'Bitte lade ein Bild oder Video hoch';
$string['slideintervalplaceholder'] = 'Positive Ganzzahl in Millisekunden.';

// Contact Section
$string['contactlink'] = 'Kontakt-Link';
$string['contactus'] = 'Kontaktiere uns';
$string['contactplaceholder'] = 'Geben Sie Ihre Kontaktdaten ein. Dies kann eine E-Mail oder ein Telefon sein';
$string['missingcontactlink'] = 'Fehlender Kontaktlink';
$string['titleplaceholder'] = 'Titel hier eingeben';
$string['missingtitle'] = 'Fehlender Titel';
$string['descriptionplaceholder'] = 'Geben Sie hier eine Beschreibung ein';
$string['contactlabelplaceholder'] = 'Label eingeben, z. E-Mail, Telefon usw.';
$string['missingdescription'] = 'Fehlende Beschreibung';
$string['socialview'] = 'Icons anzeigen';
$string['quora'] = 'Quora';
$string['google'] = 'Google';
$string['youtube'] = 'Youtube';
$string['twitter'] = 'Twitter';
$string['facebook'] = 'Facebook';
$string['linkedin'] = 'Linkedin';
$string['pinterest'] = 'Pinterest';
$string['instagram'] = 'Instagram';


// General Strings
$string['sectionpadding'] = 'Abschnittsauffüllung In Pixel';
$string['sectionsetting'] = 'Abschnitt Einstellungen';
$string['sectionbackground'] = 'Abschnitt Hintergrundbild';
$string['bgcolor'] = 'Hintergrundfarbe';
$string['bgfixed'] = 'Feststehender Hintergrund';
$string['bgopacity'] = 'Hintergrundopazität';
$string['nobgfixed'] = 'Kein fester Hintergrund';
$string['textbold'] = 'Fett gedruckt';
$string['textitalic'] = 'Kursiv';
$string['titleeditor'] = 'Editor';
$string['fontsize'] = 'Schriftgröße';
$string['textunderline'] = 'Unterstreichen';
$string['color'] = 'Farbe';
$string['editingison'] = 'Bearbeitungsmodus Ein';
$string['fullwidth'] = 'Gesamtbreite';
$string['container'] = 'Feste Breite des Containers';
$string['shadowless'] = 'Abschnitt Elemente Schatten';
$string['shadowcolor'] = 'Schattenfarbe des Abschnitts';
$string['shadowlessdesc'] = 'Aktivieren Sie diese Option, um den Abschnittselementen Schatten hinzuzufügen';
$string['contactlabel'] = "Contact Label";
$string['link'] = 'Verknüpfung';
$string['linklabel'] = 'Verknüpfungsbezeichnung';
$string['phone'] = 'Kontakt Nr.';

// Section list string
$string['slidersection'] = "Slider-Bereich";
$string['aboutussection'] = "Über uns Sektion";
$string['contactsection'] = "Kontaktbereich";
$string['featuresection'] = "Feature-Bereich";
$string['coursessection'] = "Kursbereich";
$string['teamsection'] = "Team-Bereich";
$string['testimonialsection'] = "Testimonial Section";
$string['htmlsection'] = "HTML-Abschnitt";
$string['separatorsection'] = "Separator Section";


// Slider Section
$string['textalign'] = 'Textausrichtung';
$string['desccolor'] = 'Beschreibung Farbe';
$string['headingcolor'] = 'Überschriftenfarbe';
$string['enablenav'] = 'Navigationspfeile';

$string['nonav'] = 'Keine Navigationspfeile';
$string['navarrows'] = 'Standard-Navigationspfeile';
$string['navarrowscircle'] = 'Navigationspfeile mit kreisförmigen Hintergrund';
$string['navarrowssquare'] = 'Navigationspfeile mit quadratischem Hintergrund';

// Team Section
$string['meetourteam'] = 'Triff unser Team';
$string['rows'] = 'Reihenanzahl';
$string['members'] = 'Anzahl der Mitglieder';
$string['quote'] = 'Zitat eingeben';
$string['teammembernameplaceholder'] = "Geben Sie hier den Namen des Teammitglieds ein";
$string['teammemberquoteplaceholder'] = "Geben Sie hier das Angebot des Teammitglieds ein";

// Feature Section
$string['feature'] = 'Merkmal';
$string['features'] = 'Anzahl der Funktionen';
$string['featurenameplaceholder'] = 'Feature hier eingeben';
$string['missingname'] = 'Fehlender Name';
$string['featureiconplaceholder'] = 'Geben Sie hier das Funktionssymbol ein';
$string['missingicon'] = 'Fehlendes Symbol';
$string['colorhex'] = 'Hexwert für Farbe';

// Courses section
$string['all'] = 'Alles';
$string['allcourses'] = 'Alle Kurse';
$string['future'] = 'Zukunft';
$string['coursessectioninprogress'] = 'In Bearbeitung';
$string['past'] = 'Vergangenheit';
$string['coursecategoriesplaceholder'] = 'Hier Kurskategorie suchen';
$string['categories'] = 'Kategorien';
$string['categoryandcourses'] = 'Kategorie und Kurse';
$string['hiddencategory'] = 'Versteckte Kategorie';

// Testimonial Section
$string['testimonials'] = 'Anzahl der Testimonials';
$string['testimonial'] = 'Zeugnis';
$string['testimonialplaceholder'] = "Geben Sie hier das Zeugnis der Person ein";
$string['missingtestimonial'] = 'Fehlender Testimonial';
$string['designation'] = 'Bezeichnung';
$string['designationplaceholder'] = "Geben Sie hier die Bezeichnung der Person ein";
$string['borderradius'] = 'Grenzradius';
$string['noradius'] = 'Kein Randradius';
$string['px'] = '  Pixel';
$string['fullnameplaceholder'] = "Geben Sie hier den vollständigen Namen der Person ein";
$string['namecolor'] = 'Feld Autorenname Farbe';
$string['namecolordesc'] = 'Diese Farbe wird auf allen Vollnamentext angewendet';
$string['designationcolor'] = 'Bezeichnung Feldfarbe';
$string['designationcolordesc'] = 'Diese Farbe wird auf alle Bezeichnungstexte angewendet.';
$string['testimonialcolor'] = 'Testimonial Feldfarbe';
$string['testimonialcolordesc'] = 'Diese Farbe wird auf alle Testimonial-Texte angewendet.';
$string['testimonialproperties'] = 'Texteigenschaften für Testimonial';
$string['testimonialpropertiesdesc'] = 'Diese Eigenschaften werden auf alle Testimonials des Autors angewendet.';
$string['backgroundstyle'] = 'Testimonial Hintergrundstil';
$string['solidcolor'] = 'Solide';
$string['gradientcolor'] = 'Gradient';
$string['testimonialcolor1'] = 'Wenn der Hintergrundstil solide ist, wird diese Farbe für den gesamten Testimonial angewendet. Wenn der Hintergrundstil ein Farbverlauf ist, ist dies die erste Farbe.';
$string['testimonialcolor2'] = 'Dies ist die zweite Farbe für den Hintergrund des Testimonials.';
$string['layout1'] = 'Layout 1';
$string['layout2'] = 'Layout 2';

// Edit Menu
$string['edit'] = 'Bearbeiten';
$string['moveup'] = 'Nach oben bewegen';
$string['movedown'] = 'Sich abwärts bewegen';
$string['hide'] = 'verbergen';
$string['show'] = 'Show';
$string['delete'] = 'Löschen';

// HTML Section
$string['blocks'] = 'Anzahl der Blöcke';
$string['cssstyle'] = 'CSS-Stile';
$string['cssstyleplaceholder'] = 'Geben Sie hier CSS-Stile ein. Live-Änderungen werden im Editor angezeigt. Ex:
div {
    border: 2px dashed #ccc;
}
';
$string['htmldefaultcontent'] = 'Fügen Sie hier Ihren Inhalt ein';
$string['applyfilter'] = 'Filter anwenden';
$string['applyfilterdesc'] = 'Wenden Sie Moodle-Filter auf den Inhalt an, bevor Sie den Abschnitt anzeigen.';

// Separator Section
$string['separatorstyle'] = 'Separator-Stil';
$string['separatorsolid'] = 'Solide';
$string['separatordouble'] = 'Doppelt';
$string['separatordashed'] = 'Gestrichelt';
$string['separatordotted'] = 'Gepunktet';
$string['separatorblur'] = 'Verwischen';
$string['separatorblurend'] = 'Ende verwischen';
$string['separatorgradient'] = 'Gradient';
$string['separatorwidth'] = 'Breite in Prozent';
$string['separatorheight'] = 'Höhe';
$string['separatorresult'] = 'Ergebnis';

// About us section
$string['aboutus'] = 'Über uns';
$string['aboutusblock'] = 'Über uns sperren';
$string['view'] = 'Aussicht';
$string['icon'] = 'Symbol (<a href="https://fontawesome.com/v4.7.0/cheatsheet/" target="_new">Font-Awesome</a>)';
$string['aboutusicondesc'] = 'Sie können ein beliebiges Symbol auswählen <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_new">list</a>. Geben Sie einfach den Text danach ein "fa-".';
$string['backgroudimage'] = 'Hintergrundbild';
$string['rowview'] = "Reihe";
$string['gridview'] = "Gitter";
$string['columnview'] = 'Säule';
$string['clickhere'] = 'Klick hier';
$string['btnlink'] = "Button Link";
$string['btnlinkplaceholder'] = 'Geben Sie hier den Link für die Schaltfläche ein';
$string['btnlabel'] = "Tastenbeschriftung";
$string['btnlabelplaceholder'] = 'Geben Sie hier die Tastenbezeichnung ein';
$string['colorhex'] = 'Farbe (Hex-Code)';
$string['colorhexdesc'] = 'Klicken Sie auf das obige Kästchen, um eine Farbe auszuwählen';
$string['blockbackground'] = 'Hintergrund blockieren';
$string['transparent'] = 'Transparent';
$string['noborder'] = 'Keine Grenze';
$string['border'] = 'Eingefasst';
$string['cardradius'] = 'Kartenradius';


// Frontpage old string
$string['homepagesettings'] = 'Startseiten Einstellungen';

$string['frontpagedesign'] = 'Frontpage Design';
$string['frontpagedesigndesc'] = 'Dieser Abschnitt bezieht sich auf den Designstil der Startseite.';
$string['frontpagechooser'] = 'Wählen Sie das Frontpage-Design';
$string['frontpagechooserdesc'] = 'Wählen Sie Ihr Frontpage-Design.';
$string['frontpagedesignold'] = 'Standard altes Design';
$string['frontpagedesignolddesc'] = 'Standard-Dashboard wie zuvor.';
$string['frontpagedesignnew'] = 'Neues Design';
$string['frontpagedesignnewdesc'] = 'Frisches neues Design mit mehreren Abschnitten. Sie können einzelne Abschnitte auf der Startseite konfigurieren.';
$string['newhomepagedescription'] = 'Klicken Sie in der Navigationsleiste auf "Homepage", um zum "Homepage Builder" zu gelangen und eine eigene Homepage zu erstellen';
$string['frontpageloader'] = 'Lade das Loader-Bild für die Startseite hoch';
$string['frontpageloaderdesc'] = 'Dadurch wird der Standardlader durch Ihr Image ersetzt';

$string['frontpageimagecontent'] = 'Inhalt von Kopfzeile';
$string['frontpageimagecontentdesc'] = ' Dieses Teil bezieht sich auf den obene Abschnitt Ihrer Startseite';
$string['frontpageimagecontentstyle'] = 'Stil';
$string['imageorvideo'] = 'Bild / Video';
$string['frontpageimagecontentstyledesc'] = 'Sie können aus statischen Inhalten und Slider Inhalten auswählen.';
$string['staticcontent'] = 'Statische Inhalte';
$string['slidercontent'] = 'Slider Inhalte';
$string['addtext'] = 'Text hinzufügen';
$string['defaultaddtext'] = 'Bildung ist einen lange erprobt Weg zum Erfolg.';
$string['addtextdesc'] = 'Hier können Sie den Text hinzufügen, der auf der Startseite gezeigt werden soll, möglichst in HTML.';
$string['uploadimage'] = 'Bild hochladen';
$string['uploadimagedesc'] = 'Hier können Sie Ihr eigenes Bild hochladen ';
$string['video'] = 'iframe Embedded code';
$string['videodesc'] = 'Hier können Sie den iframe Embedded Code des Videos einsetzen, der integriert werden soll.';
$string['contenttype'] = 'Art des Inhalts auswählen';
$string['contentdesc'] = 'Sie können aus dem Bild oder Video url auswählen.';
$string['image'] = 'Bild';
$string['videourl'] = 'Video URL';
$string['frontpageimge'] = '';

$string['slidercount'] = 'Anzahl von Folien ';
$string['slidercountdesc'] = '';
$string['one'] = '1';
$string['two'] = '2';
$string['three'] = '3';
$string['five'] = '5';

$string['slideimage'] = 'Bilder für Slider hochladen';
$string['slideimagedesc'] = 'Sie können hier ein Bild als Inhalt für den Slider hochladen.';
$string['slidertext'] = 'Slider Text hinzufügen';
$string['defaultslidertext'] = '<h2><span>Bildung ist einen lange erprobt Weg zum Erfolg</span><br>YOU ENTER TO LEARN, LEAVE TO ACHIEVE</h2><p>Education ignites a purpose within us and beckons us on a path of enlightenment. It allows for a progressive mind to flourish that builds a self-sustaining society.</p>';
$string['slidertextdesc'] = 'Sie können den Text Inhalt von Ihrem Slider einsetzen, möglichst im HTML.';
$string['sliderurl'] = 'Slider Text Button Link';
$string['sliderbuttontext'] = 'Text Button von Slider hinzufügen ';
$string['sliderbuttontextdesc'] = 'Sie können eine Text Button auf Ihr Slider einsetzen.';
$string['sliderurldesc'] = 'Sie können den Link der Seite einsetzen, wo der Benutzer nur einmal umgeleitet werden, nachdem er/sie auf die Text Button klickt.';
$string['slideinterval'] = 'Slide Interval';
$string['slideintervaldesc'] = 'Sie können die Übergangszeit zwischen den Folien einstellen. Falls es nur eine Folie gibt, wird diese Option gar keinen Einfluss darauf haben. ';
$string['sliderautoplay'] = 'Slider Autoplay Einstellen';
$string['sliderautoplaydesc'] = 'Ja auswählen, wenn Sie einen automatischen Übergang in Ihrer Slideshow haben möchten.';
$string['true'] = 'Ja';
$string['false'] = 'Nein';

$string['frontpageblocks'] = 'Body Inhalt';
$string['frontpageblocksdesc'] = 'Sie können eine Überschrift für Ihren Webseiten-Inhalt einsetzen';

$string['enablesectionbutton'] = 'Buttons in diesem Abschnitt aktivieren ';
$string['enablesectionbuttondesc'] = 'Buttons auf dem Body Abschnitt aktivieren.';

/* General section descriptions */
$string['frontpageblockiconsectiondesc'] = 'Sie können irgendein Icon auswählen <a href="https://fontawesome.com/v4.7.0/cheatsheet/" target="_new">list</a>. Geben Sie den Text erst nach "fa-". ';
$string['frontpageblockdescriptionsectiondesc'] = 'Eine kurze Beschreibung über den Titel';
$string['defaultdescriptionsection'] = 'Holistisch nutzen die Technologie rechtzeitig durch Unternehmenfällen';
$string['sectionbuttontextdesc'] = 'Geben Sie den Text für den Button in diesem Teil .';
$string['sectionbuttonlinkdesc'] = 'Geben Sie die URL für diesen Teil.';
$string['frontpageblocksectiondesc'] = 'Titel zu diesem Teil hinzufügen .';

/*block Teil 1*/
$string['frontpageblocksection1'] = 'Body Titel für den erste Teil';
$string['frontpageblockdescriptionsection1'] = 'Body Beschreibung für den erste Teil';
$string['frontpageblockiconsection1'] = 'Font-Awesome iocn Teil 1';
$string['sectionbuttontext1'] = 'Button Text für Teil1';
$string['sectionbuttonlink1'] = 'URL Link Teil1';


/*block Teil 2*/
$string['frontpageblocksection2'] = 'Body Titel für den zweite Teil';
$string['frontpageblockdescriptionsection2'] = 'Body Beschreibung für den zweite Teil';
$string['frontpageblockiconsection2'] = 'Font-Awesome iocn Teil  2';
$string['sectionbuttontext2'] = 'Button Text für Teil2';
$string['sectionbuttonlink2'] = 'URL Link Teil2';


/*block Teil 3*/
$string['frontpageblocksection3'] = 'Body Titel für dritte Teil';
$string['frontpageblockdescriptionsection3'] = 'Body Beschreibung für das dritte Teil';
$string['frontpageblockiconsection3'] = 'Font-Awesome iocn Teil  3';
$string['sectionbuttontext3'] = 'Button Text für Teil3';
$string['sectionbuttonlink3'] = 'URL Link Teil3';


/*block Teil 4*/
$string['frontpageblocksection4'] = 'Body Titel für den vierte Teil';
$string['frontpageblockdescriptionsection4'] = 'Body Beschreibung für den vierte Teil';
$string['frontpageblockiconsection4'] = 'Font-Awesome iocn Teil  4';
$string['sectionbuttontext4'] = 'Button Text für Teil4';
$string['sectionbuttonlink4'] = 'URL Link für Teil4';

// Capability String
$string['remui:editfrontpage'] = 'Frontpage bearbeiten';

// Frontpage Aboutus settings
$string['frontpageaboutus'] = 'Titelseite Über uns';
$string['frontpageaboutusdesc'] = 'Dieser Teil ist für die Starteseite Über uns';
$string['frontpageaboutustitledesc'] = 'Titel hinzufügen zu Über uns Sektion';
$string['frontpageaboutusbody'] = 'Body Beschreibung für Über uns Abschnitt';
$string['frontpageaboutusbodydesc'] = 'Eine kurze Beschreibung dieses Abschnitts';

// Startseite Überuns Einstellungen
$string['frontpageaboutus'] = 'Startseite Über Uns ';
$string['frontpageaboutusdesc'] = 'Dieser Teil ist für die Starteseite Über uns';

$string['enablefrontpageaboutus'] = 'Über uns Teil aktivieren';
$string['enablefrontpageaboutusdesc'] = 'Den Über uns Teil auf die Startseite aktivieren.';
$string['frontpageaboutusheading'] = 'Über uns Überschrift';
$string['frontpageaboutusheadingdesc'] = 'Überschrift für default heading Text für diesen Teil ';
$string['frontpageaboutustext'] = 'Über uns Text';
$string['frontpageaboutustextdesc'] = 'Geben Sie den über uns Text für die Startseite ein.';
$string['frontpageaboutusdefault'] = '<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Ut enim ad minim veniam.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.Lorem ipsum dolor sit amet,
                  consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                  labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur
                  adipisicing elit, sed do eiusmod tempor incididunt
                  ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>';
$string['frontpageaboutusimage'] = 'Startseite über uns Bild';
$string['frontpageaboutusimagedesc'] = 'Das Bild für Startseite über uns Teil hochladen';

// latest 3.3 to be arranged later
$string['testimonialcount'] = 'Testimonial Anzahl';
$string['testimonialcountdesc'] = 'Anzahl von Testimonials, die angezeigt werden müssen.';
$string['testimonialimage'] = 'Testimonial Bild';
$string['testimonialimagedesc'] = 'Bild des Benutzers, um mit dem Testimonial anzuzeigen';
$string['testimonialname'] = 'Benutzername';
$string['testimonialnamedesc'] = 'Benutzername';
$string['testimonialdesignation'] = 'Designation des Benutzers';
$string['testimonialdesignationdesc'] = 'Designation des Benutzers.';
$string['testimonialtext'] = 'Testimonial des Benutzers';
$string['testimonialtextdesc'] = 'Was der Benutzer sagt';

/*Front Page Setting for About Us Block*/
$string['frontpageblockdisplay'] = 'Über uns Abschnitt';
$string['frontpageblockdisplaydesc'] = 'Sie können den Bereich "Über uns" ein- oder ausblenden, Sie können ihn auch im gitterformat anzeigen';
$string['donotshowaboutus'] = 'Nicht zeigen';
$string['showaboutusinrow'] = 'Abschnitt in einer Reihe anzeigen';
$string['showaboutusingridblock'] = 'Abschnitt im Grid-Block anzeigen';
