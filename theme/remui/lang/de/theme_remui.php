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
 * Language file.
 *
 * @package   theme_remui
 * @copyright 2016 Frédéric Massart
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['advancedsettings'] = 'Erweiterte Einstellungen';
$string['backgroundimage'] = 'Hintergrundbild';
$string['backgroundimage_desc'] = 'Das Bild, das als Hintergrund der Site angezeigt werden soll. Das Hintergrundbild, das Sie hier hochladen, überschreibt das Hintergrundbild in den Voreinstellungsdateien Ihres Themas.';
$string['brandcolor'] = 'Markenfarbe';
$string['brandcolor_desc'] = 'Die Akzentfarbe.';
$string['bootswatch'] = 'Bootswatch';
$string['bootswatch_desc'] = 'Eine Bootswatch ist ein Satz von Bootstrap-Variablen und CSS, um Bootstrap zu formatieren';
$string['choosereadme'] = '
<div class="about-remui-wrapper text-center">
    <div class="about-remui m-auto" style="max-width: 1000px;">
        <h1 class="text-center">Willkommen bei Edwiser RemUI</h1><br>
        <h5 class="text-muted">
Edwiser RemUI ist die neue Revolution in der Moodle-Benutzererfahrung. Es wurde entsprechend gestaltet
um E-Learning mit benutzerdefinierten Layouts, vereinfachter Navigation, Erstellung von Inhalten und Anpassungsoptionen zu verbessern. <br><br>
Wir sind sicher, dass Sie den umgestalteten Look genießen werden!
        </h5>
        <div class="text-center mt-50">
        <img src="' . $CFG->wwwroot . '/theme/remui/pix/selection.png" class="w-full" alt="Edwiser RemUI screen shot" style="max-width: 100%;"/>
        </div>
        <br><br>
        <div class="text-center">
            <div class="btn-group text-center" role="group" aria-label="...">
              <div class="btn-group mr-1" role="group">
                <a href="https://edwiser.helpscoutdocs.com/collection/78-edwiser-remui-theme" target="_blank" class="btn btn-primary btn-round">FAQ</a>
              </div>
              <div class="btn-group mr-1" role="group">
                <a href="https://edwiser.org/remui/documentation/" target="_blank" class="btn btn-primary btn-round">Documentation</a>
              </div>
              <div class="btn-group" role="group">
                <a href="https://edwiser.org/contact-us/" target="_blank" class="btn btn-primary btn-round">Unterstützung</a>
              </div>
            </div>
        </div>
        <br>
        <h1 class="text-center">Personalisieren Sie Ihr Thema</h1>
        <h5 class="text-muted text-center">
Wir verstehen, dass nicht jedes LMS gleich ist. Wir arbeiten mit Ihnen zusammen, um Ihre Bedürfnisse zu verstehen und eine Lösung zu entwerfen und zu entwickeln, die Ihre Ziele erreicht.
        </h5>
        <br><br>
        <div class="row wdm_generalbox">
            <div class="marketing-spots span3 col-lg-6 col-12">
                <div class="iconsquare">
                    <i class="fa fa-cogs"></i>
                </div>
                <div class="iconbox-content">
                    <h4>Theme-Anpassung</h4>
                </div>
            </div>
            <div class="marketing-spots span3 col-lg-6 col-12">
                <div class="iconsquare">
                    <i class="fa fa-edit"></i>
                </div>
                <div class="iconbox-content">
                    <h4>Funktionalitätsentwicklung</h4>
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
                    <h4>LMS-Beratung</h4>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="text-center">
            <a class="btn btn-primary btn-lg" target="_blank" href="https://edwiser.org/contact-us/">Kontaktiere uns</a>&nbsp;&nbsp;
        </div>
    </div>
</div>
<br />';
$string['aboutremui'] = 'Über Edwiser RemUI';
$string['currentinparentheses'] = '(aktuell)';
$string['configtitle'] = 'Edwiser RemUI';
$string['fontsize'] = 'Schriftgröße der Themenbasis';
$string['fontsize_desc'] = 'Geben Sie eine Schriftgröße in% ein';
$string['nobootswatch'] = 'Keiner';
$string['pluginname'] = 'Edwiser RemUI';
$string['presetfiles'] = 'Zusätzliche Voreinstellungsdateien für Themen';
$string['presetfiles_desc'] = 'Voreinstellungsdateien können verwendet werden, um das Erscheinungsbild des Themas drastisch zu ändern.';
$string['preset'] = 'Themenvoreinstellung';
$string['preset_desc'] = 'Wählen Sie eine Voreinstellung, um das Aussehen des Themas weitgehend zu ändern.';
$string['privacy:metadata'] = 'Das remui-Theme speichert keine persönlichen Daten über einen Benutzer.';
$string['rawscss'] = 'Raw SCSS';
$string['rawscss_desc'] = 'Verwenden Sie dieses Feld, um SCSS- oder CSS-Code bereitzustellen, der am Ende des Stylesheets eingefügt wird.';
$string['rawscsspre'] = 'Rohes anfängliches SCSS';
$string['rawscsspre_desc'] = 'In diesem Feld können Sie den initialisierenden SCSS-Code eingeben, der vor allen anderen Eingaben eingefügt wird. Meistens verwenden Sie diese Einstellung, um Variablen zu definieren.';
$string['region-side-pre'] = 'Rechts';
$string['privacy:metadata:preference:draweropennav'] = 'Die Präferenz des Benutzers zum Ausblenden oder Anzeigen der Schubladenmenünavigation.';
$string['privacy:drawernavclosed'] = 'Die aktuelle Einstellung für die Navigationsleiste ist geschlossen.';
$string['privacy:drawernavopen'] = 'Die aktuelle Einstellung für die Navigationsleiste ist geöffnet.';
$string['cachedef_courses'] = 'Cache für Kurse';
$string['cachedef_guestcourses'] = 'Cache für Gastkurse';
$string['cachedef_updates'] = 'Cache für Updates';

// Course view preference.
$string['privacy:metadata:preference:viewCourseCategory'] = 'Die Art der Anzeige, die der Benutzer für eine Liste von Kursen bevorzugt';
$string['viewCourseCategory_grid'] = 'Um die Kurse im Rasterformat anzuzeigen';
$string['viewCourseCategory_list'] = 'Um die Kurse im Listenformat anzuzeigen';

// Aside right view preference.
$string['privacy:metadata:preference:aside_right_state'] = 'Ob der Nebenblock rechts offen gehalten oder angedockt werden soll';
$string['aside_right_state_'] = 'Um den Seitenblock rechts als geöffnet anzuzeigen'; // Blank value.
$string['aside_right_state_overrideaside'] = 'Um den Seitenblock rechts als angedockt anzuzeigen'; // Overrideaside.

// Menu view preference.
$string['privacy:metadata:preference:menubar_state'] = 'Die Art der Anzeige, die der Benutzer für die Menüleiste bevorzugt';
$string['menubar_state_fold'] = 'Um die Menüleiste als gefaltet anzuzeigen';
$string['menubar_state_unfold'] = 'Um die Menüleiste als entfaltet anzuzeigen';
$string['menubar_state_open'] = 'Um die Menüleiste als geöffnet anzuzeigen';
$string['menubar_state_hide'] = 'Um die Menüleiste als ausgeblendet anzuzeigen';


// Profile Page.
$string['administrator'] = 'Administrator';
$string['contacts'] = 'Kontakten';
$string['blogentries'] = 'Blog Einträge';
$string['discussions'] = 'Diskussionen';
$string['aboutme'] = 'Über mich';
$string['courses'] = 'Kursen';
$string['interests'] = 'Interesse';
$string['institution'] = 'Abteilung & Institution';
$string['location'] = 'Ort';
$string['description'] = 'Beschreibung';
$string['editprofile'] = 'Profil bearbeiten';
$string['start_date'] = 'Anfangsdatum';
$string['complete'] = 'Komplett';
$string['surname'] = 'Nachname';
$string['actioncouldnotbeperformed'] = 'Vorgang konnte nicht ausgeführt werden!';
$string['enterfirstname'] = 'Geben Sie bitte Ihren Vornamen ein.';
$string['enterlastname'] = 'Geben Sie bitte Ihren Nachnamen ein.';
$string['enteremailid'] = 'Geben Sie bitte Ihre Email Adresse ein.';
$string['enterproperemailid'] = 'Geben Sie bitte Ihre richtige Email Adresse ein.';
$string['detailssavedsuccessfully'] = 'Details erfolgreich gespeichert!';
$string['forgotpassword'] = 'Passwort vergessen?';

// Left Navigation Drawer.
$string['createarchivepage'] = 'Kurs Archiv Seite';
$string['createanewcourse'] = 'Einen neuen kurs erstellen';
$string['remuisettings'] = 'RemUI Einstellungen';

// Right Navigation Drawer.
$string['navbartype'] = 'Farbe der Navigationsleiste';
$string['sidebarcolor'] = 'Farbe der Seitenleiste';
$string['sitecolor'] = 'Farbe der Website';
$string['applysitewide'] = 'Für umfassende Website anwenden';
$string['applysitecolor'] = 'Site-Farbe anwenden';
$string['sidebarpinned'] = 'Seitenleiste fixiert';
$string['sidebarunpinned'] = 'Seitenleiste nicht fixiert';
$string['pinsidebar'] = 'Seitenleiste anheften';
$string['unpinsidebar'] = 'Seitenleiste lösen';
$string['primary'] = 'Primär';
$string['brown'] = 'Braun';
$string['cyan'] = 'Cyan';
$string['green'] = 'Grün';
$string['grey'] = 'Grau';
$string['indigo'] = 'Indigo';
$string['orange'] = 'Orange';
$string['pink'] = 'Rosa';
$string['purple'] = 'Lila';
$string['red'] = 'rot';
$string['teal'] = 'Blaugrün';
$string['custom-color'] = 'Freiwählbare Farbe';
$string['dark'] = 'Dunkel';
$string['light'] = 'Licht';

// General Settings.
$string['generalsettings'] = 'Allgemeine Einstellungen';
$string['enableannouncement'] = "Site-weite Ankündigung aktivieren";
$string['enableannouncementdesc'] = "Site-weite Ankündigung für alle Benutzer aktivieren.";
$string['enabledismissannouncement'] = "Verhinderbare Site-weite Ankündigung aktivieren";
$string['enabledismissannouncementdesc'] = "Wenn aktiviert, erlauben Sie Benutzern, die Ankündigung zu schließen.";

$string['announcementtext'] = "Ankündigung";
$string['announcementtextdesc'] = "AAnkündigung Nachricht, der auf die ganze Website gezeigt wird.";
$string['announcementtype'] = "Ansageart";
$string['announcementtypedesc'] = "Wählen Sie den Ansagetyp aus, um eine andere Hintergrundfarbe für die Ansage anzuzeigen.";
$string['typeinfo'] = "Information";
$string['typedanger'] = "Dringend";
$string['typewarning'] = "Warnung";
$string['typesuccess'] = "Erfolg";
$string['enablerecentcourses'] = 'Aktivieren Sie Kürzlich besuchte Kurse';
$string['enablerecentcoursesdesc'] = 'Wenn diese Option aktiviert ist, das Dropdown-Menü Letzte Kurse in der Kopfzeile angezeigt.';
$string['mergemessagingsidebar'] = 'Meldiergremium zusammenfassen';
$string['mergemessagingsidebardesc'] = 'Verschmelzung Message in die rechte Seitenleiste';
$string['none'] = 'Keiner';
$string['enablenewcoursecards'] = 'Kurskarten-Layouts';
$string['enablenewcoursecardsdesc'] = 'Wählen Sie das Kurskartenlayout aus, das auf der Kursarchivseite angezeigt werden soll';
$string['activitynextpreviousbutton'] = 'Aktivieren Sie die Schaltfläche für die nächste und vorherige Aktivität';
$string['activitynextpreviousbuttondesc'] = 'Wenn diese Option aktiviert ist, wird die Schaltfläche Nächste und Vorherige Aktivität auf der Seite Einzelaktivität angezeigt, um zwischen Aktivitäten zu wechseln';
$string['disablenextprevious'] = 'Deaktivieren';
$string['enablenextprevious'] = 'Aktivieren';
$string['enablenextpreviouswithname'] = 'Aktiviere mit Aktivitätsname';
$string['logoorsitename'] = 'Das Logo Format auswählen';
$string['logoorsitenamedesc'] = 'Logo - Nur das Logo wird angezeigt; <br /> Icon+Sitename - Ein Icon zusammen mit dem Sitenamen wird angezeigt. <br/> Site-Name mit Logo - Site-Name und Logo werden angezeigt (nur Kopfzeilen-Layout oberes Symbol unteres Menü)';
$string['onlylogo'] = 'Nur Logo';
$string['iconsitename'] = 'Icon und Seitenname';
$string['icononly'] = 'Nur Symbol';
$string['logo'] = 'Logo';
$string['logodesc'] = 'Sie können ein Logo hinzufügen, um es in der Kopfzeile anzuzeigen. Hinweis - Bevorzugte Größe ist 50px. Falls Sie es anpassen wollen, können Sie es aus der Custom CSS Box tun.';
$string['logomini'] = 'LogoMini';
$string['logominidesc'] = 'Sie können die Logomini hinzufügen, die in der Kopfzeile angezeigt werden sollen, wenn die Seitenleiste ausgeblendet ist. Hinweis: Die bevorzugte Höhe beträgt 50 Pixel. Falls Sie anpassen möchten, können Sie dies über das benutzerdefinierte CSS-Feld tun.';
$string['siteicon'] = 'Website-Symbol';
$string['siteicondesc'] = 'Haben Sie kein Logo? Sie können eines aus dieser Liste auswählen <a href="https://fontawesome.com/v4.7.0/cheatsheet/" target="_new"><b style="color:#17a2b8!important">hier</b></a>. Geben Sie nur das ein, was nach dem "fa-" kommt. ';
$string['customcss'] = 'Benutzerdefinierte CSS';
$string['customcssdesc'] = 'Sie können das CSS aus der Text Box anpassen. Diese Veränderungen werden auf alle Seiten Ihrer Installation angelegt.';
$string['favicon'] = 'Favicon';
$string['favicosize'] = 'Die erwartete Größe beträgt 16 x 16 Pixel';
$string['favicondesc'] = 'Ihr Website "Lieblings Icon". Hier können Sie Ihr Favicon für Ihre Website einsetzen.';
$string['fontselect'] = 'Schriftart Auswähler';
$string['fontselectdesc'] = 'Wählen Sie entweder die Standardmäßigen Schriftart oder <a href="https://fonts.google.com/" target="_new">Google-Webfonts</a>. Bitte zuerst speichern, um die Optionen für Ihre Auswahl zu zeigen. Hinweis: Wenn Anpassungsschrift auf Standard eingestellt ist, wird die Google Web-Schriftart angewendet.';
$string['fonttypestandard'] = 'Standardmäßige Schriftart';
$string['fonttypegoogle'] = 'Google-Webfonts';
$string['fontname'] = 'Site Font';
$string['fontnamedesc'] = 'Geben sie den genauen Namen von dem Font für Moodle ein.';
$string['googleanalytics'] = 'Google Analytics Tracking ID';
$string['googleanalyticsdesc'] = 'Bitte geben Sie Ihre  Google Analytics Tracking ID ein, um Analyticsauf Ihre Website zu aktivieren . Der  tracking ID Format sollte so sein  [UA-XXXXX-Y].<br />Bitte beachten Sie, dass Sie mit dieser Einstellung Daten an Google Analytics senden und sicherstellen sollten, dass Ihre Nutzer darüber informiert werden. In unserem Produkt werden keine Daten gespeichert, die an Google Analytics gesendet werden.';
$string['enablecoursestats'] = 'Kursstatistik aktivieren';
$string['enablecoursestatsdesc'] = 'Wenn diese Option aktiviert ist, sehen Administrator, Manager und Lehrer auf der Seite "Einzelkurs" Benutzerstatistiken zum angemeldeten Kurs.';
$string['enabledictionary'] = 'Wörterbuch aktivieren';
$string['enabledictionarydesc'] = 'Wenn aktiviert, wird die Dictionary-Funktion aktiviert und zeigt die Bedeutung des ausgewählten Textes in der Tooltip an.';
$string['more'] = 'Mehr...';

// Frontpage Old String
// Home Page Settings.
$string['homepagesettings'] = 'Startseiten Einstellungen';
$string['frontpagedesign'] = 'Titelseite gestalten';
$string['frontpagedesigndesc'] = 'Aktivieren Sie den Legacy Builder oder den Edwiser RemUI Homepage-Builder';
$string['frontpagechooser'] = 'Wählen Sie das Frontpage-Design';
$string['frontpagechooserdesc'] = 'Wählen Sie Ihr Frontpage-Design.';
$string['frontpagedesignold'] = 'Standard: Legacy-Homepage-Builder';
$string['frontpagedesignolddesc'] = 'Standard-Dashboard wie zuvor.';
$string['frontpagedesignnew'] = 'Neues Design';
$string['frontpagedesignnewdesc'] = 'Frisches neues Design mit mehreren Abschnitten. Sie können einzelne Abschnitte auf der Startseite konfigurieren.';
$string['newhomepagedescription'] = 'Klicken Sie in der Navigationsleiste auf "Homepage", um zum "Homepage Builder" zu gelangen und eine eigene Homepage zu erstellen';
$string['frontpageloader'] = 'Lade das Loader-Bild für die Startseite hoch';
$string['frontpageloaderdesc'] = 'Dadurch wird der Standardlader durch Ihr Image ersetzt';
$string['frontpageimagecontent'] = 'Inhalt von Kopfzeile';
$string['frontpageimagecontentdesc'] = ' Dieses Teil bezieht sich auf den obene Abschnitt Ihrer Startseite';
$string['frontpageimagecontentstyle'] = 'Stil';
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
$string['imageorvideo'] = 'Bild / Video';
$string['image'] = 'Bild';
$string['videourl'] = 'Video URL';
$string['slideinterval'] = 'Schiebeintervall';
$string['slideintervalplaceholder'] = 'Positive Ganzzahl in Millisekunden.';
$string['slideintervaldesc'] = 'Sie können die Übergangszeit zwischen den Folien einstellen. Falls es nur eine Folie gibt, wird diese Option gar keinen Einfluss darauf haben.';
$string['slidercount'] = 'Anzahl von Folien';
$string['slidercountdesc'] = '';
$string['one'] = '1';
$string['two'] = '2';
$string['three'] = '3';
$string['four'] = '4';
$string['five'] = '5';
$string['eight'] = '8';
$string['twelve'] = '12';
$string['slideimage'] = 'Bilder für Slider hochladen';
$string['slideimagedesc'] = 'Sie können hier ein Bild als Inhalt für den Slider hochladen.';
$string['sliderurl'] = 'Schieberegler Text Button Link';
$string['slidertext'] = 'Slider Text hinzufügen';
$string['defaultslidertext'] = '';
$string['slidertextdesc'] = 'Sie können den Text Inhalt von Ihrem Slider einsetzen, möglichst im HTML.';
$string['sliderbuttontext'] = 'Text Button von Slider hinzufügen ';
$string['sliderbuttontextdesc'] = 'Sie können eine Text Button auf Ihr Slider einsetzen.';
$string['sliderurldesc'] = 'Sie können den Link der Seite einsetzen, wo der Benutzer nur einmal umgeleitet werden, nachdem er/sie auf die Text Button klickt.';
$string['sliderautoplay'] = 'Slider Autoplay Einstellen';
$string['sliderautoplaydesc'] = 'Ja auswählen, wenn Sie einen automatischen Übergang in Ihrer Slideshow haben möchten.';
$string['true'] = 'Ja';
$string['false'] = 'Nein';
$string['frontpageblocks'] = 'Body Inhalt';
$string['frontpageblocksdesc'] = 'Sie können eine Überschrift für Ihren Webseiten-Inhalt einsetzen';
$string['frontpageblockdisplay'] = 'Über uns Abschnitt';
$string['frontpageblockdisplaydesc'] = 'Sie können den Bereich "Über uns" ein- oder ausblenden, Sie können ihn auch im gitterformat anzeigen';
$string['donotshowaboutus'] = 'Nicht zeigen';
$string['showaboutusinrow'] = 'Abschnitt in einer Reihe anzeigen';
$string['showaboutusingridblock'] = 'Abschnitt im Grid-Block anzeigen';

// About Us.
$string['frontpageaboutus'] = 'Titelseite Über uns';
$string['frontpageaboutusdesc'] = 'Dieser Teil ist für die Starteseite Über uns';
$string['frontpageaboutustitledesc'] = 'Titel hinzufügen zu Über uns Sektion';
$string['frontpageaboutusbody'] = 'Body Beschreibung für Über uns Abschnitt';
$string['frontpageaboutusbodydesc'] = 'Eine kurze Beschreibung dieses Abschnitts';
$string['enablesectionbutton'] = 'Buttons in diesem Abschnitt aktivieren ';
$string['enablesectionbuttondesc'] = 'Buttons auf dem Body Abschnitt aktivieren.';
$string['sectionbuttontextdesc'] = 'Geben Sie den Text für den Button in diesem Teil .';
$string['sectionbuttonlinkdesc'] = 'Geben Sie die URL für diesen Teil.';
$string['frontpageblocksectiondesc'] = 'Titel zu diesem Teil hinzufügen .';

// Block section 1.
$string['frontpageblocksection1'] = 'Body Titel für den erste Teil';
$string['frontpageblockdescriptionsection1'] = 'Body Beschreibung für den erste Teil';
$string['frontpageblockiconsection1'] = 'Font-Awesome iocn Teil 1';
$string['sectionbuttontext1'] = 'Button Text für Teil1';
$string['sectionbuttonlink1'] = 'URL Link Teil1';

// Block section 2.
$string['frontpageblocksection2'] = 'Body Titel für den zweite Teil';
$string['frontpageblockdescriptionsection2'] = 'Body Beschreibung für den zweite Teil';
$string['frontpageblockiconsection2'] = 'Font-Awesome iocn Teil  2';
$string['sectionbuttontext2'] = 'Button Text für Teil2';
$string['sectionbuttonlink2'] = 'URL Link Teil2';

// Block section 3.
$string['frontpageblocksection3'] = 'Body Titel für dritte Teil';
$string['frontpageblockdescriptionsection3'] = 'Body Beschreibung für das dritte Teil';
$string['frontpageblockiconsection3'] = 'Font-Awesome iocn Teil  3';
$string['sectionbuttontext3'] = 'Button Text für Teil3';
$string['sectionbuttonlink3'] = 'URL Link Teil3';

// Block section 4.
$string['frontpageblocksection4'] = 'Body Titel für den vierte Teil';
$string['frontpageblockdescriptionsection4'] = 'Body Beschreibung für den vierte Teil';
$string['frontpageblockiconsection4'] = 'Font-Awesome iocn Teil  4';
$string['sectionbuttontext4'] = 'Button Text für Teil4';
$string['sectionbuttonlink4'] = 'URL Link für Teil4';
$string['defaultdescriptionsection'] = 'Holistisch nutzen die Technologie rechtzeitig durch Unternehmenfällen';
$string['frontpageaboutus'] = 'Titelseite Über uns';
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
$string['testimonialcount'] = 'Testimonial Anzahl';
$string['testimonialcountdesc'] = 'Anzahl von Testimonials, die angezeigt werden müssen.';
$string['frontpagetestimonial'] = 'Testimonial auf der Titelseite';
$string['frontpagetestimonialdesc'] = 'Testimonial-Bereich auf der Titelseite';
$string['testimonialimage'] = 'Testimonial Bild';
$string['testimonialimagedesc'] = 'Bild des Benutzers, um mit dem Testimonial anzuzeigen';
$string['testimonialname'] = 'Benutzername';
$string['testimonialnamedesc'] = 'Benutzername';
$string['testimonialdesignation'] = 'Designation des Benutzers';
$string['testimonialdesignationdesc'] = 'Designation des Benutzers.';
$string['testimonialtext'] = 'Testimonial des Benutzers';
$string['testimonialtextdesc'] = 'Was der Benutzer sagt';
$string['frontpageblockimage'] = 'Bild hochladen';
$string['frontpageblockimagedesc'] = 'Sie können dazu ein Bild als Inhalt hochladen.';
$string['frontpageblockiconsectiondesc'] = 'Sie können irgendein Icon auswählen <a href="https://fontawesome.com/v4.7.0/cheatsheet/" target="_new">list</a>. Geben Sie den Text erst nach "fa-". ';
$string['frontpageblockdescriptionsectiondesc'] = 'Eine kurze Beschreibung über den Titel';


// Footer Page Settings.
$string['footersettings'] = 'Fußzeile Einstellungen';
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
$string['footerbottomtext'] = 'Fußzeilentext links unten';
$string['footerbottomlink'] = 'Fußzeile unten links link';
$string['footerbottomlinkdesc'] = 'Geben Sie den Link für den unteren linken Teil der Fußzeile. Zum Beispiel. http://www.EndlessBrain.com';
$string['footercolumn1heading'] = 'Fußzeile Inhalt für Spalte 1 (Links)';
$string['footercolumn1headingdesc'] = 'Dieses Teil bezieht sich auf den unteren Teil ( Spalte 1) von Ihrer Startseite.';
$string['footercolumn1title'] = 'Fußzeile Spalte 1 Titel ';
$string['footercolumn1titledesc'] = 'Hier können Sie einen Titel für die erste Spalte der Fußzeile hinzufügen.';
$string['footercolumn1customhtml'] = 'Benutzerdefiniertes HTML';
$string['footercolumn1customhtmldesc'] = 'Sie können HTML für Fußzeile Spalte 1 von der oberen Text Box anpassen.';
$string['footercolumn2heading'] = 'Fußzeile Inhalt für Spalte  2 (Mittel)';
$string['footercolumn2headingdesc'] = 'Dieser Teil bezieht sich auf den untere Teil ( Spalte 2) von Ihrer Startseite.';
$string['footercolumn2title'] = 'Fußzeile Spalte 2 Titel';
$string['footercolumn2titledesc'] = 'Hier können Sie einen Titel für die erste Spalte der Fußzeile hinzufügen.';
$string['footercolumn2customhtml'] = 'Benutzerdefiniertes HTML';
$string['footercolumn2customhtmldesc'] = 'Sie können HTML für Fußzeile Spalte 2 von der oberen Text Box anpassen.';
$string['footercolumn3heading'] = 'Fußzeile Inhalt für Spalte  3 (Rechts)';
$string['footercolumn3headingdesc'] = 'Dieser Teil bezieht sich auf den unteren Teil ( Spalte 3) von Ihrer Startseite.';
$string['footercolumn3title'] = 'Fußzeile Spalte 3 Titel';
$string['footercolumn3titledesc'] = 'Hier können Sie einen Titel für die erste Spalte der Fußzeile hinzufügen.';
$string['footercolumn3customhtml'] = 'Benutzerdefiniertes HTML';
$string['footercolumn3customhtmldesc'] = 'Sie können HTML für Fußzeile Spalte 3 von der oberen Text Box anpassen.';
$string['footerbottomheading'] = 'Einstellung Fußzeile Unterer Teil ';
$string['footerbottomdesc'] = 'Hier können Sie Ihren eigene Link einfügen, den Sie in dem unteren Teil der Fußzeile eingeben wollen.';
$string['footerbottomtextdesc'] = 'Geben Sie den Text für das Unten-Rechts Teil der Fußzeile ein.';
$string['poweredbyedwiser'] = 'Unterstützt von Edwiser';
$string['poweredbyedwiserdesc'] = 'Zum Entfernen deaktivieren  \'Unterstützt von Edwiser\' von Ihrer Website.';

// Login Page Settings.
$string['loginsettings'] = 'Einstellungen Log-in Seite ';
$string['navlogin_popup'] = ' Login Popup aktivieren';
$string['navlogin_popupdesc'] = 'Aktivieren Sie das Anmelde-Popup, um sich schnell anzumelden, ohne auf die Anmeldeseite umzuleiten';
$string['loginsettingpic'] = 'Hier ein Bild hochladen';
$string['loginsettingpicdesc'] = 'Dieses Bild wird in dem Hintergrund des Log-in Formulars angezeigt.';
$string['signuptextcolor'] = 'Anmeldebeschreibung Farbe.';
$string['signuptextcolordesc'] = 'Wählen Sie die Textfarbe für die Anmeldespitze Beschreibung.';
$string['left'] = "Links";
$string['right'] = "Rechts";
$string['remember_me'] = "Mich erinnern";
$string['brandlogopos'] = "Logo auf der Anmeldeseite anzeigen";
$string['brandlogoposdesc'] = "Wenn aktiviert, wird das Markenlogo auf der Anmeldeseite angezeigt.";
$string['brandlogotext'] = "Seitenbeschreibung";
$string['brandlogotextdesc'] = "Fügen Sie Text für die Website-Beschreibung hinzu, die auf der anmelden- und Registrierungsseite angezeigt wird. Lassen Sie dieses Feld leer, wenn Sie keine Beschreibung eingeben möchten.";
$string['loginpagelayout'] = 'Anmeldeseitenlayout';
$string['loginpagelayoutdesc'] = '';
$string['centerlayout'] = 'Zentriertes Layout';
$string['overlaylayout'] = 'Rechtes Überlagerungslayout';

// License Settings.
$string['licensenotactive'] = '<strong>Alert!</strong>Lizenz ist nicht aktiviert, bitte <strong>aktivieren</strong> Sie die Lizenz in den RemUI Einstellungen.';
$string['licensenotactiveadmin'] = '<strong>Alert!</strong> Lizenz ist nicht aktiviert, bitte <strong>aktivieren</strong> Sie die Lizenz<a href="'.$CFG->wwwroot.'/admin/settings.php?section=themesettingremui#informationcenter" > hier</a>.';
$string['activatelicense'] = 'Lizenz aktivieren';
$string['deactivatelicense'] = 'Lizenz deaktivieren';
$string['renewlicense'] = 'Lizenz erneuern';
$string['deactivated'] = 'Deaktiviert';
$string['active'] = 'Aktiv';
$string['notactive'] = 'Nicht Aktiv';
$string['expired'] = 'Abgelaufen';
$string['licensekey'] = 'Lizenzschlüssel';
$string['licensestatus'] = 'Lizen Status';
$string['no_activations_left'] = 'Limit überschritten';
$string['activationfailed'] = 'Die Aktivierung des Lizenzschlüssels ist fehlgeschlagen. Bitte versuchen Sie es später noch einmal.';
$string['noresponsereceived'] = 'Keinen Antwort von dem Server. Bitte später noch einmal versuchen.';
$string['licensekeydeactivated'] = 'Lizenzschlüssel ist deaktiviert.';
$string['siteinactive'] = 'Seite ist deaktiviert (Auf Lizenz aktivieren klicken, um das Plugin zu aktivieren).';
$string['entervalidlicensekey'] = 'Bitte den gültigen Lizenzschlüssel eingeben.';
$string['licensekeyisdisabled'] = 'Ihr Lizenzschlüssel ist deaktiviert.';
$string['licensekeyhasexpired'] = "Ihr Lizenzschlüssel ist abgelaufen. Bitte erneuern Sie ihn.";
$string['licensekeyactivated'] = "Ihr Lizenzschlüssel ist aktiviert.";
$string['enterlicensekey'] = "Bitte den Lizenzschlüssel eingeben.";
$string['edwiserremuilicenseactivation'] = 'Edwiser RemUI Lizenz Aktivierung';
$string['nolicenselimitleft'] = 'Maximale Aktivierungsgrenze erreicht, Keine Aktivierungen links.';

// News And Updates Page.
$string['newsandupdates'] = 'Nachrichte und Updates';
$string['newupdatemessage'] = 'Neues Update für Edwiser-Plugin verfügbar. <a class="text-white" href="{$a}"><u>Klicken Sie hier</u></a> um zu sehen.';
$string['currentversionmessage'] = 'Ihre aktuelle Version ist';
$string['downloadupdate'] = ' Update herunterladen';
$string['latestversionmessage'] = 'Sie benutzen die neueste Version von RemUI.';
$string['rateremui'] = 'RemUI bewerten';
$string['fullname']  = 'Voller Name';
$string['providefeedback'] = 'Bitte geben Sie Ihren Feedback von RemUI ein';
$string['sendfeedback'] = 'Feedback schicken';
$string['recentnews'] = 'Neueste Nachricht';

// About Edwiser RemUI.
$string['aboutsettings'] = 'Über Edwiser RemUI';
$string['notenrolledanycourse'] = 'Sie haben sich für keinen angemeldet.';

// My Course Page.
$string['resume'] = 'Fortsetzen';
$string['start'] = 'Beginnen';
$string['completed'] = 'Fertig';

// Course.
$string['graderreport'] = 'Note Report';
$string['enroluser'] = 'Benutzer anmelden';
$string['activityeport'] = 'Aktivitätsreport';
$string['editcourse'] = 'Kurs bearbeiten';
$string['sections'] = "Abschnitte";

// Next Previous Activity.
$string['activityprev'] = 'Vorherige Aktivität';
$string['activitynext'] = 'Nächste Aktivität';

// Login Page.
$string['signin'] = 'Sich anmelden';
$string['signup'] = 'Sich registrieren';
$string['noaccount'] = 'Kein Konto?';

// Incourse Page.
$string['backtocourse'] = 'Kursüberblick';

// Header Section.
$string['togglefullscreen'] = 'Vollbild umschalten';
$string['recent'] = 'Kürzlich';

// Course Stats.
$string['enrolledusers'] = 'Registrierte <br>Studenten';
$string['studentcompleted'] = 'Studenten <br>Abgeschlossen';
$string['inprogress'] = 'In <br>Bearbeitung';
$string['yettostart'] = 'Noch <br>zu beginnen';

// Footer Content.
$string['followus'] = 'Uns folgen';
$string['poweredby'] = 'Von Edwiser RemUI betrieben';

// Course Archive Page.
$string['mycourses'] = "Meine Kurse";
$string['allcategories'] = 'Alle kategorien';
$string['categorysort'] = 'Kategorien sortieren';
$string['sortdefault'] = 'Sortieren (keine)';
$string['sortascending'] = 'Sortieren von A bis Z.';
$string['sortdescending'] = 'Sortieren Sie Z nach A';

// Dashboard Blocks.
$string['viewcourse'] = "KURS ANSEHEN";
$string['viewcourselow'] = "kurs ansehen";
$string['searchcourses'] = "Kurse suchen";

$string['hiddencourse'] = 'Versteckter Kurs';

// Usage tracking.
$string['enableusagetracking'] = "Aktivieren von Usage Tracking";
$string['enableusagetrackingdesc'] = "<strong>HINWEIS ZUR NUTZUNGSVERFOLGUNG</strong>

<hr class='text-muted' />

<p>Edwiser sammelt ab sofort anonyme Daten, um Produkt Nutzungsstatistiken zu generieren.</p>

<p>Diese Informationen werden uns helfen, die Entwicklung in die richtige Richtung zu lenken und die Edwiser-Gemeinschaft gedeiht.</p>

<p>Allerdings erfassen wir während dieses Vorgangs nicht Ihre personenbezogenen Daten oder Ihre Schüler. Sie können dies über das Plugin deaktivieren, wenn Sie diesen Dienst deaktivieren möchten.</p>

<p>Eine Übersicht der erhobenen Daten finden Sie <strong><a href='https://forums.edwiser.org/topic/67/anonymously-tracking-the-usage-of-edwiser-products' target='_blank'>hier</a></strong>.</p>";

$string['focusmodesettings'] = 'Fokusmodus-Einstellungen';
$string['focusmode'] = 'Fokus Modus';
$string['enablefocusmode'] = 'Fokusmodus aktivieren';
$string['enablefocusmodedesc'] = 'Wenn aktiviert, wird auf der Kursseite eine Schaltfläche zum Wechseln zum ablenkungsfreien Lernen angezeigt';
$string['focusmodeenabled'] = 'Fokusmodus aktiviert';
$string['focusmodedisabled'] = 'Fokusmodus deaktiviert';
$string['coursedata'] = 'Kurs Daten';

$string['prev'] = 'Bisherige';
$string['next'] = 'Nächste';

// RemUI one-click update.
$string['errors'] = 'Fehler';
$string['invalidzip'] = 'Ungültige Zip-Datei. <b>{$a}</b>';
$string['errorfetching'] = 'Fehler beim Abrufen des Plugins ZIP. <b>{$a}</b>';
$string['errorfetchingexist'] = 'Fehler beim Abrufen des Plugins ZIP: Zielspeicherort vorhanden. <b>{$a}</b>';
$string['unabletounzip'] = '<b>{$a}</b> kann nicht entpackt werden';
$string['unabletoloadplugindetails'] = 'Plugin-Details <b>{$a}</b> können nicht geladen werden';
$string['requirehigherversion'] = 'Benötigt Moodle-Version: <b>{$a}</b>';
$string['noupdates'] = 'Alles ist auf dem neuesten Stand.';
$string['invalidjsonfile'] = 'Fehler: Ungültiger JSON der Edwiser-Produktliste.';
$string['recommendation'] = 'Empfohlene Plugins';
$string['comeswith'] = 'Kommt mit: {$a}';
$string['changelog'] = 'Änderungsprotokoll';
$string['currentrelease'] = 'Aktuelle Version: {$a}';
$string['updateavailable'] = 'Update verfügbar: {$a}';
$string['uptodate'] = 'Auf dem Laufenden';

// Information center.
$string['informationcenter'] = 'Informationszentrum';

$string['nocoursefound'] = 'Kein Kurs gefunden';

$string['badges'] = 'Abzeichen';

// Course Page Settings.
$string['coursesettings'] = "Kursseiteneinstellungen";
$string['enrolpagesettings'] = "Einstellungen für die Registrierungsseite";
$string['enrolpagesettingsdesc'] = "Verwalten Sie hier den Inhalt der Registrierungsseite.";
$string['coursearchivepagesettings'] = 'Einstellungen der Kursarchivseite';
$string['coursearchivepagesettingsdesc'] = 'Verwalten Sie das Layout und den Inhalt der Kursarchivseite.';

$string['enrolment_payment'] = 'Kurszahlung';
$string['enrolment_payment_desc'] = 'Einstellungen für Kursanmeldungspräferenzen. Sind alle Kurse kostenpflichtig oder sind einige kostenlos? Diese Einstellung bestimmt, wie die Kursanmeldung funktioniert und angezeigt wird.';
$string['allrequirepayment'] = 'Alle Kurse sind kostenpflichtig';
$string['somearefree'] = 'Einige Kurse sind kostenlos';
$string['allarefree'] = 'Alle Kurse sind kostenlos';

$string['showcoursepricing'] = 'Kurspreise anzeigen';
$string['showcoursepricingdesc'] = 'Aktivieren Sie diese Einstellung, um den Preisabschnitt auf der Registrierungsseite anzuzeigen.';
$string['fullwidthcourseheader'] = 'Kurskopf in voller Breite';
$string['fullwidthcourseheaderdesc'] = 'Aktivieren Sie diese Einstellung, damit der Kurskopf die volle Breite erreicht.';

$string['price'] = 'Preis';
$string['course_free'] = 'FREI';
$string['enrolnow'] = 'Jetzt einschreiben';
$string['buyand'] = 'Kaufen & ';
$string['notags'] = 'Keine Tags.';
$string['tags'] = 'Tags';

$string['enrolment_layout'] = 'Layout der Registrierungsseite';
$string['enrolment_layout_desc'] = 'Aktivieren Sie Edwiser Layout für ein neues und verbessertes Design der Registrierungsseite';
$string['disable'] = 'Deaktivieren';
$string['defaultlayout'] = 'Default Moodle layout';
$string['enable_layout1'] = 'Edwiser Layout';

$string['webpage'] = "Website";
$string['categorypagelayout'] = 'Kursarchiv Seitenlayout';
$string['categorypagelayoutdesc'] = 'Wählen Sie zwischen den Seitenlayouts des Kursarchivs';
$string['edwiserlayout'] = 'Edwiser-Layout';
$string['categoryfilter'] = 'Kategoriefilter';

$string['skill1'] = 'Anfänger';
$string['skill2'] = 'Mittlere';
$string['skill3'] = 'Fortgeschrittene';

$string['lastupdatedon'] = 'Zuletzt aktualisiert am ';

// Plural and Singular.
$string['hourcourse'] = ' Stunden kurs';
$string['hourscourse'] = '  Stunden Kurs';
$string['enrolledstudent'] = ' Student eingeschrieben';
$string['enrolledstudents'] = ' Eingeschriebene Studenten';
$string['downloadresource'] = ' Herunterladbare Ressource';
$string['assignment'] = ' Zuordnung';
$string['strcourse'] = ' Kurs';
$string['strcourses'] = ' Kurse';
$string['strstudent'] = ' Schüler';
$string['strstudents'] = ' Studenten';
$string['showenrolledcourses'] = 'Eingeschriebene Kurse anzeigen';
$string['categoryselectionrequired'] = 'Kategorieauswahl erforderlich.';
$string['courseoverview'] = 'Kursüberblick';
$string['coursecontent'] = 'Kursinhalt';
$string['startdate'] = 'Anfangsdatum';
$string['category'] = 'Kategorie';
$string['aboutinstructor'] = "Über den Instruktor";
$string['showmore'] = "Zeig mehr";
$string['coursefeatures'] = "Kursfunktionen";

$string['lectures'] = "Vorträge";
$string['quizzes'] = "Quizzes";
$string['startdate'] = "Anfangsdatum";
$string['skilllevel'] = "Spielstärke";
$string['language'] = "Sprache";
$string['assessments'] = "Bewertungen";

// Customizer strings.
$string['customizer-migrate-notice'] = 'Die Farbeinstellungen werden in den Customizer migriert. Klicken Sie auf die Schaltfläche unten, um den Customizer zu öffnen.';
$string['customizer-close-heading'] = 'Schließen Sie den Customizer';
$string['customizer-close-description'] = 'Nicht gespeicherte Änderungen werden verworfen. Möchten Sie fortfahren?';
$string['reset'] = 'zurücksetzen';
$string['reset-settings'] = 'Setzen Sie alle Customizer-Einstellungen zurück';
$string['reset-settings-description'] = '<div>Customizer-Einstellungen werden auf die Standardeinstellungen zurückgesetzt. Möchtest du weiter machen?</div><div class="mt-3 font-italic"><strong>Hinweis:</strong> Das der Einstellung hinzugefügte benutzerdefinierte CSS wird nicht entfernt.<br>
Sie müssen das CSS bei Bedarf manuell aus der benutzerdefinierten CSS-Einstellung entfernen.</div>';
$string['customizer'] = 'Customizer';
$string['error'] = 'Error';
$string['resetdesc'] = 'Setzen Sie die Einstellung auf die letzte Speicherung zurück oder auf die Standardeinstellung, wenn nichts gespeichert wurde';
$string['noaccessright'] = 'Es tut uns leid! Sie haben keine Rechte zur Nutzung dieser Seite';
$string['font-family'] = 'Schriftfamilie';
$string['font-family_help'] = 'Legen Sie die Schriftfamilie von {$a} fest';
$string['font-size'] = 'Schriftgröße';
$string['font-size_help'] = 'Stellen Sie die Schriftgröße auf {$a} ein';
$string['font-weight'] = 'Schriftgewicht';
$string['font-weight_help'] = 'Stellen Sie die Schriftgröße auf {$a} ein. Die Eigenschaft font-weight legt fest, wie dicke oder dünne Zeichen im Text angezeigt werden sollen.';
$string['line-height'] = 'Zeilenhöhe';
$string['line-height_help'] = 'Stellen Sie die Zeilenhöhe auf {$a} ein';
$string['global'] = 'Global';
$string['global_help'] = 'Sie können globale Einstellungen wie Farbe, Schriftart, Überschrift, Schaltflächen usw. verwalten.';
$string['site'] = 'Seite? ˅';
$string['text-color'] = 'Textfarbe';
$string['text-color_help'] = 'Stellen Sie die Textfarbe von {$a} ein';
$string['text-hover-color'] = 'Text Schwebefarbe';
$string['text-hover-color_help'] = 'Stellen Sie die Farbe für den Textschwebeflug auf {$a} ein';
$string['link-color'] = 'Verknüpfungsfarbe';
$string['link-color_help'] = 'Setze die Linkfarbe von {$a}';
$string['link-hover-color'] = 'Link Hover Farbe';
$string['link-hover-color_help'] = 'Setze die Link Hover Farbe von {$a}';
$string['typography'] = 'Typografie';
$string['inherit'] = 'Erben';
$string["weight-100"] = 'Dünne 100';
$string["weight-200"] = 'Extra-Light 200';
$string["weight-300"] = 'Licht 300';
$string["weight-400"] = 'Normal 400';
$string["weight-500"] = 'Medium 500';
$string["weight-600"] = 'Semi-Bold 600';
$string["weight-700"] = 'Fett 700';
$string["weight-800"] = 'Extra-Bold 800';
$string["weight-900"] = 'Ultra-Bold 900';
$string['text-transform'] = 'Texttransformation';
$string['text-transform_help'] = 'Die Eigenschaft text-transform steuert die Großschreibung von Text. Setze die Texttransformation von {$a}.';
$string["default"] = 'Standard';
$string["none"] = 'Keiner';
$string["capitalize"] = 'Profitieren';
$string["uppercase"] = 'Großbuchstaben';
$string["lowercase"] = 'Kleinbuchstaben';
$string['background-color'] = 'Hintergrundfarbe';
$string['background-color_help'] = 'Stellen Sie die Hintergrundfarbe von {$a} ein';
$string['background-hover-color'] = 'Hintergrundschwebefarbe';
$string['background-hover-color_help'] = 'Stellen Sie die Hintergrund-Schwebefarbe von {$a} ein';
$string['color'] = 'Farbe';
$string['customizing'] = 'Anpassen';
$string['savesuccess'] = 'Erfolgreich gespeichert.';
$string['mobile'] = 'Handy, Mobiltelefon';
$string['tablet'] = 'Tablette';
$string['hide-customizer'] = 'Customizer ausblenden';
$string['customcss_help'] = 'Sie können benutzerdefiniertes CSS hinzufügen. Dies wird auf alle Seiten Ihrer Website angewendet.';

// Customizer Global body.
$string['body'] = 'Körper';
$string['body-font-family_desc'] = 'Legen Sie die Font-Familie für die gesamte Site fest.HINWEIS Wenn der Tot-Standard eingestellt ist, wird die Schriftart von REMUI angewendet.';
$string['body-font-size_desc'] = 'Legen Sie die Basisschriftgröße für die gesamte Site fest.';
$string['body-fontweight_desc'] = 'Stellen Sie die Schriftgröße für die gesamte Site ein.';
$string['body-text-transform_desc'] = 'Festlegen der Texttransformation für die gesamte Site.';
$string['body-lineheight_desc'] = 'Stellen Sie die Linienhöhe für die gesamte Site ein.';
$string['faviconurl_help'] = 'Favicon URL';

// Customizer Global heading.
$string['heading'] = 'Üerschrift';
$string['use-custom-color'] = 'Verwenden Sie eine benutzerdefinierte Farbe';
$string['use-custom-color_help'] = 'Verwenden Sie eine benutzerdefinierte Farbe für {$a}';
$string['typography-heading-all-heading'] = 'Überschriften(H1 - H6)';
$string['typography-heading-h1-heading'] = 'Üerschrift 1';
$string['typography-heading-h2-heading'] = 'Üerschrift 2';
$string['typography-heading-h3-heading'] = 'Üerschrift 3';
$string['typography-heading-h4-heading'] = 'Üerschrift 4';
$string['typography-heading-h5-heading'] = 'Üerschrift 5';
$string['typography-heading-h6-heading'] = 'Üerschrift 6';

// Customizer Colors.
$string['primary-color'] = 'Primärfarbe';
$string['primary-color_help'] = 'Wenden Sie die Primärfarbe auf die gesamte Site an. Diese Farbe wird auf die Kopfzeilenmarke, den Primärknopf, den rechten Schubladen-Togler, den Goto-Top-Knopf usw. angewendet. Um sie zu verwenden, können Sie bg-primary für den Hintergrund und btn-primary für den Button anwenden.';
$string['page-background'] = 'Seitenhintergrund';
$string['page-background_help'] = 'Stellen Sie den benutzerdefinierten Seitenhintergrund auf den Seiteninhaltsbereich ein. Sie können Farbe, Farbverlauf oder Bild auswählen. Der Farbverlauf beträgt 100 Grad.';
$string['page-background-color'] = 'Hintergrundfarbe der Seite';
$string['page-background-color_help'] = 'Stellen Sie die Hintergrundfarbe auf den Seiteninhaltsbereich ein.';
$string['page-background-image'] = 'Seitenhintergrundbild';
$string['page-background-image_help'] = 'Legen Sie das Bild als Hintergrund für den Seiteninhaltsbereich fest.';
$string['gradient'] = 'Gradient';
$string['gradient-color1'] = 'Verlaufsfarbe 1';
$string['gradient-color1_help'] = 'Stellen Sie die erste Farbe des Verlaufs ein';
$string['gradient-color2'] = 'Verlaufsfarbe 2';
$string['gradient-color2_help'] = 'Stellen Sie die zweite Farbe des Verlaufs ein';
$string['page-background-imageattachment'] = 'Hintergrundbild Anhang';
$string['page-background-imageattachment_help'] = 'Die Eigenschaft für Hintergrundanhänge legt fest, ob ein Hintergrundbild mit dem Rest der Seite scrollt oder fest ist.';
$stirng['image'] = 'Bild';
$string['additional-css'] = 'Zusätzliche CSS';
$string['left-sidebar'] = 'Linke Seitenleiste';
$string['main-sidebar'] = 'Haupt-Seitenleiste';
$string['sidebar-links'] = 'Seitenleisten-Links';
$string['secondary-sidebar'] = 'Sekundäre Seitenleiste';
$string['header'] = 'Header';
$string['menu'] = 'Speisekarte';
$string['site-identity'] = 'Site-Identität';
$string['primary-header'] = 'Primärer Header';
$string['color'] = 'Farbe';

// Customizer Buttons.
$string['buttons'] = 'Tasten';
$string['border'] = 'Rand';
$string['border-width'] = 'Rahmenbreite';
$string['border-width_help'] = 'Stellen Sie die Rahmenbreite auf {$a} ein';
$string['border-color'] = 'Randfarbe';
$string['border-color_help'] = 'Setze die Rahmenfarbe von {$a}';
$string['border-hover-color'] = 'Rand Schwebefarbe';
$string['border-hover-color_help'] = 'Stellen Sie die Farbe des Rahmenschwebevorgangs auf {$a} ein';
$string['border-radius'] = 'Randradius';
$string['border-radius_help'] = 'Stellen Sie den Randradius von {$a} ein';
$string['letter-spacing'] = 'Buchstaben-Abstand';
$string['letter-spacing_help'] = 'Stellen Sie den Buchstabenabstand auf {$a} ein';
$string['text'] = 'Text';
$string['padding'] = 'Polsterung';
$string['padding-top'] = 'Polsterung oben';
$string['padding-top_help'] = 'Setze die Polsterung oben auf {$a}';
$string['padding-right'] = 'Polsterung richtig';
$string['padding-right_help'] = 'Stellen Sie die Polsterung rechts von {$a} ein';
$string['padding-bottom'] = 'Polsterung unten';
$string['padding-bottom_help'] = 'Setze den Polsterboden von {$a}';
$string['padding-left'] = 'Polsterung links';
$string['padding-left_help'] = 'Stellen Sie die Polsterung links von {$a} ein';
$string['secondary'] = 'Sekundär';
$string['colors'] = 'Farben';

// Customizer Header.
$string['header-background-color_help'] = 'Stellen Sie die Hintergrundfarbe der Kopfzeile ein. Die Hintergrundfarbe des Markenlogos ist die Primärfarbe. Diese Farbe wird für Menüelemente angewendet.';
$string['site-logo'] = 'Site-Logo';
$string['header-menu'] = 'Header-Menü';
$string['border-bottom-size'] = 'Randbodengröße';
$string['border-bottom-size_help'] = 'Legen Sie die untere Randgröße des Site-Headers fest';
$string['border-bottom-color'] = 'Randbodenfarbe';
$string['border-bottom-color_help'] = 'Legen Sie die untere Grundfarbe des Site-Headers fest';
$string['layout-desktop'] = 'Layout-Desktop';
$string['layout-desktop_help'] = 'Legen Sie das Layout des Headers für den Desktop fest';
$string['layout-mobile'] = 'Layout mobil';
$string['layout-mobile_help'] = 'Legen Sie das Layout des Headers für Mobilgeräte fest';
$string['header-left'] = 'Linkes Symbol rechtes Menü';
$string['header-right'] = 'Rechtes Symbol linkes Menü';
$string['header-top'] = 'Oberes Symbol unteres Menü';
$string['hover'] = 'Schweben';
$string['logo'] = 'Logo';
$string['applynavbarcolor'] = 'Stellen Sie die Site-Farbe der Navigationsleiste ein';
$string['header-background-color-warning'] = 'Wird nicht verwendet, wenn <strong> Site-Farbe der Navigationsleiste festlegen </strong> aktiviert ist.';
$string['applynavbarcolor_help'] = 'Die Primärfarbe der Site wird auf den gesamten Header angewendet. Durch Ändern der Primärfarbe wird die Hintergrundfarbe der Kopfzeile geändert. Sie können weiterhin benutzerdefinierte Textfarben und Hover-Farben auf Kopfzeilenmenüs anwenden.';
$string['logosize'] = 'Das erwartete Seitenverhältnis beträgt 130: 33 für die linke Ansicht und 140: 33 für die rechte Ansicht.';
$string['logominisize'] = 'Das erwartete Seitenverhältnis beträgt 40:33.';
$string['sitenamewithlogo'] = 'Site-Name mit Logo (nur Draufsicht)';

// Customizer Sidebar.
$string['link-text'] = 'Link Text';
$string['link-text_help'] = 'Setzen Sie die Link-Textfarbe auf {$a}';
$string['link-icon'] = 'Link-Symbol';
$string['link-icon_help'] = 'Stellen Sie die Link-Symbolfarbe auf {$a} ein';
$string['active-link-color'] = 'Aktive Linkfarbe';
$string['active-link-color_help'] = 'Stellen Sie die benutzerdefinierte Farbe auf den aktiven Link von {$a} ein';
$string['active-link-background'] = 'Aktiver Linkhintergrund';
$string['active-link-background_help'] = 'Stellen Sie die benutzerdefinierte Farbe auf den aktiven Linkhintergrund von {$a} ein';
$string['link-hover-background'] = 'Link Hover Hintergrund';
$string['link-hover-background_help'] = 'Setzen Sie den Link-Hover-Hintergrund auf {$a}';
$string['link-hover-text'] = 'Link-Hover-Text';
$string['link-hover-text_help'] = 'Stellen Sie die Link-Hover-Textfarbe auf {$a} ein';
$string['hide-dashboard'] = 'Dashboard ausblenden';
$string['hide-dashboard_help'] = 'Wenn Sie dies aktivieren, wird das Dashboard-Element in der Seitenleiste ausgeblendet';
$string['hide-home'] = 'Zuhause verstecken';
$string['hide-home_help'] = 'Wenn Sie dies aktivieren, wird das Home-Element in der Seitenleiste ausgeblendet';
$string['hide-calendar'] = 'Kalender ausblenden';
$string['hide-calendar_help'] = 'Wenn Sie dies aktivieren, wird das Kalenderelement in der Seitenleiste ausgeblendet';
$string['hide-private-files'] = 'Private Dateien ausblenden';
$string['hide-private-files_help'] = 'Wenn Sie dies aktivieren, wird das Element "Private Dateien" in der Seitenleiste ausgeblendet';
$string['hide-my-courses'] = 'Verstecke meine Kurse';
$string['hide-my-courses_help'] = 'Wenn Sie dies aktivieren, werden Meine Kurse und verschachtelte Kurselemente in der Seitenleiste ausgeblendet';
$string['hide-content-bank'] = 'Inhaltsbank ausblenden';
$string['hide-content-bank_help'] = 'Wenn Sie diese Option aktivieren, wird das Element der Inhaltsbank in der Seitenleiste ausgeblendet';

// Customizer Footer.
$string['footer'] = 'Fusszeile';
$string['basic'] = 'Basic';
$string['advance'] = 'Vorrücken';
$string['footercolumn'] = 'Widget';
$string['footercolumndesc'] = 'Anzahl der Widgets in Fußzeile.';
$string['footercolumntype'] = 'Art';
$string['footercolumntypedesc'] = 'Sie können den Fußzeilen-Widget-Typ auswählen';
$string['footercolumnsocial'] = 'Social Media-Links';
$string['footercolumnsocialdesc'] = 'Selektive Social-Media-Links anzeigen';
$string['footercolumntitle'] = 'Titel';
$string['footercolumntitledesc'] = 'Fügen Sie diesem Widget den Titel hinzu.';
$string['footercolumncustomhtml'] = 'Inhalt';
$string['footercolumncustomhtmldesc'] = 'Sie können den Inhalt dieser verbreiteten Verwendung unterhalb des angegebenen Editors anpassen.';
$string['both'] = 'Beide';
$string['footercolumnsize'] = 'Widget-Größe.';
$string['footercolumnsizenote'] = 'Ziehen Sie die vertikale Linie, um die Widget-Größe anzupassen.';
$string['footercolumnsizedesc'] = 'Sie können die individuelle Widget-Größe einstellen.';
$string['footercolumnmenu'] = 'Speisekarte';
$string['footercolumnmenudesc'] = 'Link-Menü.';
$string['footermenu'] = 'Speisekarte';
$string['footermenudesc'] = 'Menü in Fußzeilen-Widget hinzufügen.';
$string['customizermenuadd'] = 'Menüpunkt hinzufügen.';
$string['customizermenuedit'] = 'Menüpunkt bearbeiten.';
$string['customizermenumoveup'] = 'MOVE-MENU-IST UP';
$string['customizermenuemovedown'] = 'Move-Menüeintrag';
$string['customizermenuedelete'] = 'Menüpunkt löschen.';
$string['menutext'] = 'text';
$string['menuaddress'] = 'Adresse';
$string['menuorientation'] = 'Menüorientierung.';
$string['menuorientationdesc'] = 'Legen Sie die Ausrichtung des Menüs fest.Orientierung kann entweder vertikal oder horizontal sein.';
$string['menuorientationvertical'] = 'Vertikal';
$string['menuorientationhorizontal'] = 'horizontal';
$string['footershowlogo'] = 'Logo';
$string['footershowlogodesc'] = 'Logo in der sekundären Fußzeile anzeigen.';
$string['footersecondarysocial'] = 'Social Media-Links';
$string['footersecondarysocialdesc'] = 'Social Media-Links in der Sekundärzeile zeigen.';
$string['footertermsandconditionsshow'] = 'Allgemeine Geschäftsbedingungen anzeigen';
$string['footertermsandconditions'] = 'Terms & amp; Bedingungen';
$string['footertermsandconditionsdesc'] = 'Sie können einen Link für die AGB-Bedingungen hinzufügen.';
$string['footerprivacypolicyshow'] = 'Datenschutzerklärung anzeigen.';
$string['footerprivacypolicy'] = 'Datenschutzerklärung Link.';
$string['footerprivacypolicydesc'] = 'Sie können einen Link für die Datenschutzrichtlinie hinzufügen.';
$string['footercopyrightsshow'] = 'Copyrights-Inhalte anzeigen.';
$string['footercopyrights'] = 'Urheberrechte';
$string['footercopyrightsdesc'] = 'Fügen Sie in der Seite der Seite Copyrights-Inhalte hinzu.';
$string['footercopyrightstags'] = 'Stichworte:<br>[site]  -  Site-Name<br>[year]  -  Laufendes Jahr';
$string['termsandconditions'] = 'Terms & Bedingungen';
$string['privacypolicy'] = 'Datenschutz-Bestimmungen';

// Customizer login.
$string['login'] = 'Anmeldung';
$string['panel'] = 'Tafel';
$string['page'] = 'Seite';
$string['loginbackgroundopacity'] = 'Login Hintergrund Deckkraft';
$string['loginbackgroundopacity_help'] = 'Wenden Sie die Deckkraft an, um das HINTERGRUND-Bild anzumelden.';
$string['loginpanelbackgroundcolor_help'] = 'Wenden Sie die Hintergrundfarbe an das Anmeldefeld an.';
$string['loginpaneltextcolor_help'] = 'Wenden Sie die Textfarbe an das Anmeldefeld an.';
$string['loginpanellinkcolor_help'] = 'Anwenden der Linkfarbe an das Login-Panel.';
$string['loginpanellinkhovercolor_help'] = 'Anwenden der Link-Schwebefarbe an das Login-Panel.';
$string['login-panel-position'] = 'Anmeldungspanelposition.';
$string['login-panel-position_help'] = 'Setzen Sie die Position für das Anmelde- und Registrierungsbereich';
$string['login-panel-logo-default'] = 'Header-Logo';
$string['login-panel-logo-desc'] = 'Kommt drauf an <strong>Wählen Sie Site-Logo-Formateinstellung</strong>';
$string['login-page-info'] = 'Die Anmeldeseite kann nicht in Customizer in der Vorschau angezeigt werden, da es nur von dem Angemeldeten Benutzer angezeigt werden kann.
Sie können die Einstellung testen, indem Sie die Anmogin-Seite im Incognito-Modus speichern und öffnen.';

// One click report  bug/feedback.
$string['sendfeedback'] = "Feedback an edwiser senden";
$string['descriptionmodal_text1'] = "<p>Mit dem Feedback können Sie uns Anregungen zu unseren Produkten senden.Wir begrüßen Problemberichte, verfügen über Ideen und allgemeine Kommentare.</p><p>Beginnen Sie mit dem Schreiben einer kurzen Beschreibung:</p>";
$string['descriptionmodal_text2'] = "<p>Als Nächstes können Sie Bereiche der Seite mit Ihrer Beschreibung identifizieren.</p>";
$string['emptydescription_error'] = "Bitte geben Sie eine Beschreibung ein.";
$string['incorrectemail_error'] = "Bitte geben Sie die ordnungsgemäße E-Mail-ID ein.";

$string['highlightmodal_text1'] = "Klicken Sie auf die Seite und ziehen Sie sie auf der Seite, um das Feedback besser zu verstehen.Sie können diesen Dialog verschieben, wenn es im Weg ist.";
$string['highlight_button'] = "Highlight-Bereich";
$string['blackout_button'] = "Informationen ausblenden.";
$string['highlight_button_tooltip'] = "Markierungsbereiche, die für Ihr Feedback relevant sind.";
$string['blackout_button_tooltip'] = "Persönliche Informationen ausblenden.";

$string['feedbackmodal_next'] = 'Nehmen Screenshot und fahren fort';
$string['feedbackmodal_skipnext'] = 'Überspringen und weiterfahren';
$string['feedbackmodal_previous'] = 'Zurück';
$string['feedbackmodal_submit'] = 'einreichen';
$string['feedbackmodal_ok'] = 'okay';

$string['description_heading'] = 'Beschreibung';
$string['feedback_email_heading'] = 'email';
$string['additional_info'] = 'zusätzliche Information';
$string['additional_info_none'] = 'Keiner';
$string['additional_info_browser'] = 'Browserinfo.';
$string['additional_info_page'] = 'Seiteninfo';
$string['additional_info_pagestructure'] = 'Seitenstruktur';
$string['feedback_screenshot'] = 'Bildschirmfoto';
$string['feebdack_datacollected_desc'] = 'Eine Übersicht der gesammelten Daten ist verfügbar <strong><a href="https://forums.edwiser.org/topic/67/anonymously-tracking-the-usage-of-edwiser-products" target="_blank">Hier</a></strong>.';

$string['submit_loading'] = 'Wird geladen...';
$string['submit_success'] = 'Danke für Ihre Rückmeldung.Wir schätzen jedes Stück Feedback, das wir erhalten.';
$string['submit_error'] = 'Leider ist ein Fehler beim Senden Ihres Feedbacks aufgetreten.Bitte versuche es erneut.';
$string['send_feedback_license_error'] = "Bitte aktivieren Sie die Lizenz, um den Produktsupport zu erhalten.";

// Setup wizard.
$string['setupwizard'] = "Setup Wizard";
$string['general'] = "Allgemeines";
$string['coursepage'] = "Kursseite";
$string['pagelayout'] = "Seitenlayout";
$string['loginpage'] = "Loginseite";
$string['skipsetupwizard'] = "Überspringen Sie den Setup-Assistenten";
$string['setupwizardmodalmsg'] = "Ein Schritt von der Verwendung von Edwiser RemUI entfernt, Klicken Sie auf Setup-Assistent, um das Thema anzupassen, \"Abbrechen\", um die Standardeinstellung zu verwenden.";
$string["alert"] = "Aufgeweckt";
$string["success"] = "Erfolg";
$string['coursesection'] = "Kursinhalt";
$string['coursespecificlinks'] = "Kursnavigation";
$string['universallinks'] = 'Seitennavigation';

// Importer.
$string['importer'] = 'Importeur';
$string['importer-missing'] = 'Das Edwiser Site Importer Plugin fehlt.Bitte besuchen Sie die <a href="https://edwiser.org"> Edwiser </a> Website, um dieses Plugin herunterzuladen.';


$string['inproductnotification'] = "Update user preferences (In-product Notification) - RemUI";

$string["noti_enrolandcompletion"] = 'Die modernen, professionell aussehenden Edwiser RemUI-Layouts haben hervorragend dazu beigetragen, das Engagement der Lernenden insgesamt mit <b>{$a->enrolment} neuen Kursanmeldungen und {$a->completion} Kursabschlüssen</b> in diesem Monat zu steigern';

$string["noti_completion"] = 'Edwiser RemUI hat das Engagement Ihrer Schüler verbessert: Sie haben diesen Monat insgesamt <b>{$a->completion} Kursabschlüsse</b>.';

$string["noti_enrol"] = 'Ihr LMS-Design sieht mit Edwiser RemUI großartig aus: Sie haben diesen Monat <b>{$a->enrolment} neue Kursanmeldungen</b> in Ihrem Portal';

$string["coolthankx"] = "Danke!";

// Languages
$string["en"] = "English";

$string['coursepagesettings'] = "Einstellungen der Kursseite";
$string['coursepagesettingsdesc'] = "Kursbezogene Einstellungen";
$string['setthemeasdefault'] = "RemUI als Standardthema festlegen";
$string['setthemeasdefaultwithwizard'] = "Legen Sie RemUI als Standardthema fest und führen Sie den Setup-Assistenten aus";
$string['setthememanually'] = "Mach es später manuell";

$string["formsettings"] = "Formulareinstellungen";
$string["formsdesign"] = "Formulareingabedesign";
$string["formsdesigndesc"] = "Diese Einstellung hilft Ihnen, das Design von Formularelementen zu ändern";
$string["formsdesign1"] = "Gestaltung von Formularelementen 1";
$string["formsdesign2"] = "Gestaltung von Formularelementen 2";
$string["formsdesign3"] = "Gestaltung von Formularelementen 3";

$string["iconsettings"] = "Symboleinstellungen";
$string["icondesign"] = "Icons-Design";
$string["icondesigndesc"] = "Diese Einstellung hilft Ihnen, das Design von Symbolelementen zu ändern.";
$string["icondesign1"] = "Dunkel";
$string["icondesign2"] = "Hell";
$string["formgroupdesign"] = 'Formulare Gruppendesign';
$string["formgroupdesigndesc"] = "Diese Einstellung hilft Ihnen, das Design von Formularelementen zu ändern";

$string["formselementdesign"] = "Gestaltung von Formularelementen";
$string["formgroupdesign"] = "Formulargruppendesign";

$string['logincenter'] = 'Zentrierte Anmeldung';
$string['loginleft'] = 'Login auf der linken Seite';
$string['loginright'] = 'Login rechts';

$string['enableedwfeedback'] = "Edwiser Feedback & Support";
$string['enableedwfeedbackdesc'] = "Edwiser Feeback & Support aktivieren, nur für Administratoren sichtbar.";
$string["checkfaq"] = "Edwiser RemUI - Häufig gestellte Fragen überprüfen";
$string["gotop"] = "Zum Seitenanfang";
$string["coursecarddesign"] = "Diseño de la tarjeta del curso de Edwiser";

$string['coursecategories'] = 'Kategorien';
$string['enabledisablecoursecategorymenu'] = "Kategorie-Dropdown in der Kopfzeile";
$string['enabledisablecoursecategorymenudesc'] = "Lassen Sie dies aktiviert, wenn Sie das Kategorie-Dropdown-Menü in der Kopfzeile anzeigen möchten";
$string['coursecategoriestext'] = "Dropdown-Menü Kategorie umbenennen in der Kopfzeile";
$string['coursecategoriestextdesc'] = "Sie können einen benutzerdefinierten Namen für das Dropdown-Menü der Kategorie in der Kopfzeile hinzufügen.";

$string['courseperpage'] = 'Kurse pro Seite';
$string['courseperpagedesc'] = 'Die Anzahl von Kursen, die pro Seite in der Kurs Archiv Seite angezeigt werden soll.';
$string['none'] = 'Keiner';
$string['fade'] = 'Verblassen';
$string['slide-top'] = 'Schieben Sie nach oben';
$string['slide-bottom'] = 'Schieben Sie nach unten';
$string['slide-right'] = 'Nach rechts schieben';
$string['scale-up'] = 'Vergrößern';
$string['scale-down'] = 'Herunterskalieren';
$string['courseanimation'] = 'Animation der Kurskarte';
$string['courseanimationdesc'] = 'Wählen Sie Kurskartenanimation aus, um auf der Kursarchivseite angezeigt zu werden';

$string['gridview'] = 'Rasteransicht';
$string['listview'] = 'Listenansicht';


$string['searchcatplaceholdertext'] = 'Suche';
$string['versionforheading'] = '  <span class="small remuiversion">Ausführung {$a}</span>';
$string['themeversionforinfo'] = '<span>Aktuell installierte Version: Edwiser RemUI v{$a}</span>';
$string['hiddenlogo'] = "Deaktivieren";
$string['sidebarregionlogo'] = 'Auf der Login-Karte';
$string['maincontentregionlogo'] = 'Auf der zentralen Region';
