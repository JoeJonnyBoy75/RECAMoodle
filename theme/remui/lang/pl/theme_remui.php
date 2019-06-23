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
$string['region-side-post'] = 'Prawa';
$string['region-side-pre'] = 'Prawa';
$string['fullscreen'] = 'Pełny ekran';
$string['closefullscreen'] = 'Zamknij pełny ekran';
$string['licensesettings'] = 'Ustawienia Licencji';
$string['edwiserremuilicenseactivation'] = ' Aktywacja licencji Edwiser RemUI';
$string['overview'] = 'Przegląd';

$string['choosereadme'] = '
<div class="about-remui-wrapper text-center">
    <div class="about-remui m-auto" style="max-width: 1000px;">
        <h1 class="text-center">Witaj w Edwiser RemUI</h1><br>
        <h4 class="text-muted">
        Edwiser RemUI to nowa rewolucja w doświadczaniu użytkowania platformy Moogle. Został odpowiednio zaprojektowany, aby podnosić poziom elearningu dzięki
        niestandardowym layoutom, uproszczonej nawigacji, tworzeniu i dostosywaniu treści <br><br>
        Jesteśmy przekonani, że docenisz przemodelowany wygląd!
        </h4>
        <div class="text-center mt-50">
        <img src="' . $CFG->wwwroot . '/theme/remui/pix/screenshot.jpg" class="w-full" alt="Edwiser RemUI screen shot" style="max-width: 100%;"/>
        </div>
        <br><br>
        <div class="text-center">
            <div class="btn-group text-center" role="group" aria-label="...">
              <div class="btn-group mr-1" role="group">
                <a href="https://edwiser.org/remui/#compatible-moodle-version" target="_blank" class="btn btn-primary btn-round">FAQ</a>
              </div>
              <div class="btn-group mr-1" role="group">
                <a href="https://edwiser.org/remui/documentation/" target="_blank" class="btn btn-primary btn-round">Dokumentacja</a>
              </div>
              <div class="btn-group" role="group">
                <a href="https://edwiser.org/contact-us/" target="_blank" class="btn btn-primary btn-round">Wsparcie</a>
              </div>
            </div>
        </div>
        <br>
        <h1 class="text-center">Dostosuj motyw</h1>
        <h4 class="text-muted text-center">
            Rozumiemy, że nie każdy system LMS jest taki sam. Będziemy pracować wspólnie z Tobą, aby realizować Twoje potrzeby.
        </h4>
        <br><br>
        <div class="row wdm_generalbox">
            <div class="marketing-spots span3 col-lg-6 col-12">
                <div class="iconsquare">
                    <i class="fa fa-cogs"></i>
                </div>
                <div class="iconbox-content">
                    <h4>Dopasowanie motywu</h4>
                </div>
            </div>
            <div class="marketing-spots span3 col-lg-6 col-12">
                <div class="iconsquare">
                    <i class="fa fa-edit"></i>
                </div>
                <div class="iconbox-content">
                    <h4>Rozwój funkcjonalności</h4>
                </div>
            </div>
            <br>
            <div class="marketing-spots span3 col-lg-6 col-12">
                <div class="iconsquare">
                    <i class="fa fa-link"></i>
                </div>
                <div class="iconbox-content">
                    <h4>Integracja API</h4>
                </div>
            </div>
            <div class="marketing-spots span3 col-lg-6 col-12">
                <div class="iconsquare">
                    <i class="fa fa-life-ring"></i>
                </div>
                <div class="iconbox-content">
                    <h4>Doradztwo związane z LMS</h4>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="text-center">
            <a class="btn btn-primary btn-lg" target="_blank" href="https://edwiser.org/contact-us/">Skontaktuj się z nami</a>&nbsp;&nbsp;
        </div>
    </div>
</div>
<br />';
$string['presetfiles'] = 'Dodatkowe pliki motywu';
$string['presetfiles_desc'] = 'Pliki ustawień można wykorzystać do radykalnej zmiany wyglądu motywu';
$string['preset'] = 'Ustawienia motywu';
$string['preset_desc'] = 'Wybierz ustawienie, aby znacząco zmienić wygląd motywu';
$string['rawscss'] = 'Czysty SCSS';
$string['rawscss_desc'] = 'Użyj tego pola, aby podać kod SCSS lub CSS, który zostanie wprowadzony na końcu arkusza stylów.';
$string['rawscsspre'] = 'Czysty początkowy SCSS';
$string['rawscsspre_desc'] = 'W tym polu możesz podać inicjujący kod SCSS, który zostanie wstrzyknięty przed wszystkim innym. W większości przypadków będziesz używać tego ustawienia do definiowania zmiennych.';
$string['currentinparentheses'] = '(aktualny)';
$string['advancedsettings'] = 'Ustawienia zaawansowane';
$string['brandcolor'] = 'Kolor marki';
$string['brandcolor_desc'] = 'Kolor akcentującu';

$string['licensenotactive'] = '<strong>Uwaga!</strong> Licencja nie jest aktywna, proszę <strong>aktywować</strong> licencję w ustawieniach RemUI.';
$string['licensenotactiveadmin'] = '<strong>Uwaga!</strong> Licencja nie jest aktywna, proszę <strong>aktywować</strong> licencję <a href="'.$CFG->wwwroot.'/admin/settings.php?section=themesettingremui#remuilicensestatus" >tutaj</a>.';
$string['activatelicense'] = 'Aktywuj licencję';
$string['deactivatelicense'] = 'Dezaktywuj licencję';
$string['renewlicense'] = 'Odnów licencję';
$string['active'] = 'Aktywna';
$string['notactive'] = 'Nieaktywna';
$string['expired'] = 'Wygasła';
$string['licensekey'] = 'Klucz licencyjny';
$string['licensestatus'] = 'Status licencji';
$string['noresponsereceived'] = 'Brak odpowiedzi z serwera. Proszę spróbować później.';
$string['licensekeydeactivated'] = 'Klucz licencyjny został dezaktywowany.';
$string['siteinactive'] = 'Strona nieaktywna (Naciśnij Aktywuj licencję w cely aktywowania wtyczki).';
$string['entervalidlicensekey'] = 'Proszę podać ważny klucz licencyjny.';
$string['licensekeyisdisabled'] = 'Twój klucz licencyjny jest wyłączony.';
$string['licensekeyhasexpired'] = "Twoja licencja wygasła. Prosimy o odnowienie.";
$string['licensekeyactivated'] = "Twój klucz licencyjny został aktywowany.";
$string['enterlicensekey'] = "Podaj poprawny klucz licencyjny.";

$string['activitynextpreviousbutton'] = 'Włącz przycisk Następna/Poprzednia aktwyność';
$string['activitynextpreviousbuttondesc'] = 'Przycisk Następna/Poprzednia aktywność pojawi się nad aktywnością dla szybkiego przełączania';
$string['disablenextprevious'] = 'Wyłącz';
$string['enablenextprevious'] = 'Włącz';
$string['enablenextpreviouswithname'] = 'Włącz z nazwą aktywności';

// course
$string['nosummary'] = 'Nie dodano podsumowanie w tej części kursu.';
$string['choosecategory'] = 'Wybierz kategorię';
$string['allcategory'] = 'Wszystkie kategorie';
$string['viewcours'] = 'Zobacz kurs';
$string['taught-by'] = 'Uczony przez';
$string['enroluser'] = 'Zapisz użytkowników';
$string['graderreport'] = 'Raport ocen';
$string['activityeport'] = 'Raport aktywności';
$string['editcourse'] = 'Edytuj kurs';
// course sorting strings
$string['categorysort'] = 'Sortuj kategorie';
$string['sortdefault'] = 'Sortuj';
$string['sortascending'] = 'Sortuj od A do Z';
$string['sortdescending'] = 'Sortuj od Z do A';

// Next Previous Activity
$string['activityprev'] = 'Poprzednia aktywność';
$string['activitynext'] = 'Następna aktywność';

// dashboard element -> overview
$string['enabledashboardelements'] = 'Włącz elementy kokpitu';
$string['enabledashboardelementsdesc'] = 'Odznacz, aby wyłączyć widget Edwiser RemUI w kokpicie.';
$string['totaldiskusage'] = 'Użycie przestrzeni dyskowej';
$string['activemembers'] = 'Aktywni członkowie';
$string['newmembers'] = 'Nowi członkowie';
$string['coursesdiskusage'] = 'Użycie przestrzeni dyskowej przez kursy';
$string['activestudents'] = 'Aktywni studenci';

// Quick meesage
$string['quickmessage'] = 'Szybka wiadomość';
$string['entermessage'] = 'Proszę wpisać wiadomość';
$string['selectcontact'] = 'Wybierz kontakt';
$string['selectacontact'] = 'Wybierz kontakt';
$string['sendmessage'] = 'Wyślij wiadomość';
$string['yourcontactlisistempty'] = 'Twoja lista kontaktów jest pusta';
$string['viewallmessages'] = 'Zobacz wszystkie wiadomości';
$string['messagesent'] = 'Wysłano';
$string['messagenotsent'] = 'Wiadomość nie wysłana! Sprawdź wpisane wartości.';
$string['messagenotsenterror'] = 'Wiadomość nie wysłana! Coś poszło nie tak.';
$string['sendingmessage'] = 'Wysyłanie wiadomości ...';
$string['sendmoremessage'] = 'Wyślij więcej wiadomości';

// General Seetings.
$string['generalsettings' ] = 'Ustawienia ogólne';
$string['navsettings'] = 'Ustawienia nawigacji';
$string['colorsettings'] = 'Ustawienie kolorów';
$string['fontsettings' ] = 'Ustawienia czcionek';
$string['slidersettings'] = 'Ustawienia slidera';
$string['configtitle'] = 'Edwiser RemUI';

// Font settings.
$string['fontselect'] = 'Wybór czcionki';
$string['fontselectdesc'] = 'Wybierz jedną z czcionek standardowych lub Google Fonts. Zapisz, aby wyświetlić opcje do wyboru.';
$string['fonttypestandard'] = 'Czcionka standardowa';
$string['fonttypegoogle'] = 'Google Fonts';
$string['fontnameheading'] = 'Czcionka nagłówka';
$string['fontnameheadingdesc'] = 'Wpisz dokładną nazwę czcionki, która będzie użyta w nagłówkach';
$string['fontnamebody'] = 'Czcionka tekstu';
$string['fontnamebodydesc'] = 'Wpisz dokładną nazwę czcionki, któ®a będzie użyta we wszystkich tekstach.';

/* Dashboard Settings*/
$string['dashboardsetting'] = 'Ustawienia kokpitu';
$string['themecolor'] = 'Kolor motywu';
$string['themecolordesc'] = 'Wybierz kolor motywu. Wybór zmieni wygląd wielu elementów Moodle.';
$string['themetextcolor'] = 'Kolor tekstu';
$string['themetextcolordesc'] = 'Ustaw kolor tekstu';
$string['layout'] = 'Wybierz układ';
$string['layoutdesc'] = 'Aktywuj układ nieruchomy (fixed) (menu nagłówka będzie trzymać się na górze) lub układ domyślny.'; // Boxed Layout or
$string['defaultlayout'] = 'domyślny';
$string['fixedlayout'] = 'Nieruchomy nagłówek (fixed)';
$string['defaultboxed'] = 'Boxed';
$string['layoutimage'] = 'Zdjęcie w tle układu boxed';
$string['layoutimagedesc'] = 'Wgraj zdjęcie w tle dla układu boxed.';
$string['sidebar'] = 'Wybierz sidebar';
$string['sidebardesc'] = 'Wybierz styl sidebara (stary / nowy)';
$string['rightsidebarslide'] = 'Przełącz prawy sidebar';
$string['rightsidebarslidedesc'] = 'Przełącz prawy sidebar domyślnie';
$string['leftsidebarslide'] = 'Przełącz lewy sidebar';
$string['leftsidebarslidedesc'] = 'Przełącz lewy sidebar domyślnie';
$string['leftsidebarmini'] = 'Aktywuj lewy mini-sidebar';
$string['leftsidebarminidesc'] = 'Aktywuj lewy mini-sidebar';
$string['rightsidebarskin'] = 'Przełącz wygląd prawego sidebara';
$string['rightsidebarskindesc'] = 'Zmień wygląd prawoe sidebara.';

/*color*/
$string['colorscheme'] = 'Wybierz schemat kolorów';
$string['colorschemedesc'] = 'Możesz wybrać schemat kolorów witryny spośród następujących kolorów: niebieski, czarny, fioletowy, zielony, żółty, jasno-niebieski, jasno-czarny, jano-fioletowy, jasno-zielony, jasno-żółty<br /> <b>Jasno-</b> - powoduje jasne tło w lewym pasku bocznym.';
$string['blue'] = 'Niebieski';
$string['white'] = 'Biały';
$string['purple'] = 'Fioletowy';
$string['green'] = 'Zielony';
$string['red'] = 'Czerwony';
$string['yellow'] = 'Żółty';
$string['bluelight'] = 'Jasno-niebieski';
$string['whitelight'] = 'Jasno-biały';
$string['purplelight'] = 'Jasno-fioletowy';
$string['greenlight'] = 'Jasno-zielony';
$string['redlight'] = 'Jasno-czerwony';
$string['yellowlight'] = 'Jasno-żółty';
$string['custom'] = 'Dowolny';
$string['customlight'] = 'Jasno-dowolny';
$string['customskin_color'] = 'Kolor skórki';
$string['customskin_color_desc'] = 'Tutaj możesz wybrać swój dowolny kolor motywu.';

/* Course setting*/
$string['courseperpage'] = 'Kursów na stronę';
$string['courseperpagedesc'] = 'Ilość kursów na stronę wyświetlanych na stronie archiwum.';
$string['enableimgsinglecourse'] = 'Włącz wyświetlanie obrazka na stronie kursu';
$string['enableimgsinglecoursedesc'] = 'Odznacz, aby wyłączyć formatowanie obrazka na stronie kurs';
$string['nocoursefound'] = 'No Course Found';

/*logo*/
$string['logo'] = 'Logo';
$string['logodesc'] = 'Możesz dodać logo, które będzie wyświetlane w nagłówku. Uwaga: preferowana wysokość to 50 pikseli. Jeśli chcesz dostosować, możesz to zrobić podając własny kod CSS.';
$string['logomini'] = 'LogoMini';
$string['logominidesc'] = 'Możesz dodać logomini do wyświetlenia w nagłówku, gdy pasek boczny jest zwinięty. Uwaga: preferowana wysokość to 50 pikseli. Jeśli chcesz dostosować, możesz to zrobić podając własny kod CSS.';
$string['siteicon'] = 'Ikona strony';
$string['siteicondesc'] = 'Nie masz logo? Możesz wybrać jedno z tej <a href="https://fontawesome.com/v4.7.0/cheatsheet/" target="_new">listy</a>. <br /> Wpisz tekst po "fa-".';
$string['logoorsitename'] = 'Wybierz format logo strony';
$string['logoorsitenamedesc'] = 'Możesz zmienić logo nagłówka witryny zgodnie z własnym wyborem. <br /> Dostępne opcje to: Tylko logo - wyświetlone zostanie tylko logo; <br /> Ikona + nazwa strony - Wyświetli się ikona wraz z nazwą witryny.';
$string['onlylogo'] = 'Tylko logo';
$string['onlysitename'] = 'Nazwa strony';
$string['iconsitename'] = 'Ikona + nazwa strony';

/*favicon*/
$string['favicon'] = 'Favicon';
$string['favicondesc'] = 'Tutaj możesz wstawić favicon swojej strony.';
$string['enablehomedesc'] = 'Włącz opis strony głównej';

/*custom css*/
$string['customcss'] = 'Własny kod CSS';
$string['customcssdesc'] = 'Tutaj możesz dostosować kod CSS. Będzie on miał zastosowanie w obrębie całej witryny.';

/*google analytics*/
$string['googleanalytics'] = 'Google Analytics Tracking ID';
$string['googleanalyticsdesc'] = 'Podaj Google Analytics Tracking ID, aby uruchomić analitykę na stronie. Format ID powienien być następujący: [UA-XXXXX-Y]';

$string['frontpageimge'] = '';

$string['four'] = '4';
$string['eight'] = '8';
$string['twelve'] = '12';

$string['enablefrontpagecourseimg'] = 'Włącz obrazki na stronie głównej kursów';
$string['enablefrontpagecourseimgdesc'] = 'Włącz obrazki na głównej stronie w sekcji dostępne kursy';


// Social media settings
$string['socialmedia'] = 'Ustawienia Social Media';
$string['socialmediadesc'] = 'Podaj linki do social mediów Twojej witryny';
$string['facebooksetting'] = 'Facebook';
$string['facebooksettingdesc'] = 'Podaj link do strony na Facebooku, np. https://www.facebook.com/pagename';
$string['twittersetting'] = 'Twitter';
$string['twittersettingdesc'] = 'Podaj link do strony na Twitterze, np. https://www.twitter.com/pagename';
$string['linkedinsetting'] = 'Linkedin';
$string['linkedinsettingdesc'] = 'Podaj link do strony na Linkedin, np. https://www.linkedin.com/in/pagename';
$string['gplussetting'] = 'Google Plus';
$string['gplussettingdesc'] = 'Podaj link do strony na Google Plus, np. https://plus.google.com/pagename';
$string['youtubesetting'] = 'YouTube';
$string['youtubesettingdesc'] = 'Podaj link do strony na Youtibe, np. https://www.youtube.com/channel/UCU1u6QtAAPJrV0v0_c2EISA';
$string['instagramsetting'] = 'Instagram';
$string['instagramsettingdesc'] = 'Podaj link do strony na Instagramie, np. https://www.instagram.com/name';
$string['pinterestsetting'] = 'Pinterest';
$string['pinterestsettingdesc'] = 'Podaj link do strony na Pinterest, np. https://www.pinterest.com/name';
$string['quorasetting'] = 'quora';
$string['quorasettingdesc'] = 'Podaj link do strony na quora, np. https://www.quora.com/name';

// Footer Section Settings
$string['footersetting'] = 'Ustawienia stopki';
// Footer  Column 1
$string['footercolumn1heading'] = 'Zawartość pierwszej kolumny stopki (lewa strona)';
$string['footercolumn1headingdesc'] = 'Ta sekcja odnosi się do dolnej części Twojej strony głównej (1. kolumna)';

$string['footercolumn1title'] = 'Tytuł pierwszej kolumny stopki';
$string['footercolumn1titledesc'] = 'Dodaj tytuł do tej kolumny.';
$string['footercolumn1customhtml'] = 'Kod HTML';
$string['footercolumn1customhtmldesc'] = 'Możesz dostosować treść tej kolumny korzystając z HTML.';


// Footer  Column 2
$string['footercolumn2heading'] = 'Zawartość drugiej kolumny stopki (środkowa część)';
$string['footercolumn2headingdesc'] = 'Ta sekcja odnosi się do dolnej części Twojej strony głównej (2. kolumna)';

$string['footercolumn2title'] = 'Tytuł drugiej kolumny stopki';
$string['footercolumn2titledesc'] = 'Dodaj tytuł do tej kolumny.';
$string['footercolumn2customhtml'] = 'Kod HTML';
$string['footercolumn2customhtmldesc'] = 'Możesz dostosować treść tej kolumny korzystając z HTML.';

// Footer  Column 3
$string['footercolumn3heading'] = 'Zawartość pierwszej kolumny stopki (prawa strona)';
$string['footercolumn3headingdesc'] = 'Ta sekcja odnosi się do dolnej części Twojej strony głównej (3. kolumna)';

$string['footercolumn3title'] = 'Tytuł trzeciej kolumny stopki';
$string['footercolumn3titledesc'] = 'Dodaj tytuł do tej kolumny.';
$string['footercolumn3customhtml'] = 'Kod HTML';
$string['footercolumn3customhtmldesc'] = 'Możesz dostosować treść tej kolumny korzystając z HTML.';

// Footer Bottom-Right Section
$string['footerbottomheading'] = 'Ustawienia dolnej części stopki';
$string['footerbottomdesc'] = 'Tutaj możesz podać własny link, jaki chcesz, żeby był widoczny w dolnej części stopki';
$string['footerbottomtextdesc'] = 'Dodaj tekst do dolnej części stopki';
$string['poweredbyedwiser'] = 'Powered by Edwiser';
$string['poweredbyedwiserdesc'] = 'Odnzacz, aby usunąć \'Powered by Edwiser\' ze swojej strony.';

// Login settings page code begin.
$string['loginsettings'] = 'Ustawienia strony logowania';
$string['navlogin_popup'] = 'Włącz okno popup do logowania';
$string['navlogin_popupdesc'] = 'Włącz okno popup do logowania w nagłówku.';
$string['loginsettingpic'] = 'Wgraj obrazek w tle';
$string['loginsettingpicdesc'] = 'Wgraj grafikę, która będzie tłem okna logowania.';
$string['signuptextcolor'] = 'Kolor tekstu panelu rejestracji';
$string['signuptextcolordesc'] = 'Wybierz kolor tekstu w palenu rejestracji.';
$string['left'] = "Lewa strona";
$string['right'] = "Prawa strona";
$string['remember_me'] = "Zapamiętaj mnie";
$string['brandlogopos'] = "Pozycja logotypu";
$string['brandlogoposdesc'] = "Jeśli aktywne, logotyp będzie widoczny po prawje stronie panelu bocznego, powyżej formularza logowania.";
$string['brandlogotext'] = "Opis strony";
$string['brandlogotextdesc'] = "Dodaj tekst opisu witryny, który będzie wyświetlany na stronie logowania i rejestracji. Pozostaw to pole puste, jeśli nie chcesz wstawiać żadnego opisu.";
// Login settings Page code end.

// From theme snap
$string['title'] = 'Tytuł';
$string['contents'] = 'Zawartość';
$string['addanewsection'] = 'Stwórz nową sekcję';
$string['createsection'] = 'Stwórz sekcję';

/* User Profile Page */

$string['blogentries'] = 'Wpisy na blogu';
$string['discussions'] = 'Dyskusje';
$string['aboutme'] = 'O mnie';

$string['interests'] = 'Zainteresowania';
$string['institution'] = 'Firma i wydział';
$string['location'] = 'Lokalizacja';
$string['description'] = 'Opis';
$string['editprofile'] = 'Edytuj profil';

$string['firstname'] = 'Imię';
$string['surname'] = 'Nazwisko';
$string['email'] = 'Adres email';
$string['citytown'] = 'Miasto';
$string['country'] = 'Państwo';
$string['selectcountry'] = 'Wybierz kraj';
$string['description'] = 'Opis';

$string['notenrolledanycourse'] = 'Niezapisany do żadnego kursu';
$string['grade'] = "Ocena";
$string['viewnotes'] = "Zobacz notatki";

// User profile page js

$string['actioncouldnotbeperformed'] = 'Akcja nie może być wykonana!';
$string['enterfirstname'] = 'Podaj swoje imię.';
$string['enterlastname'] = 'Podaj swoje nazwisko.';
$string['enteremailid'] = 'Podaj swój adres email';
$string['enterproperemailid'] = 'Podaj swój poprawny adres email.';
$string['detailssavedsuccessfully'] = 'Szczegóły zapisane pomyślnie!';

/* Header */

$string['startedsince'] = 'Rozpoczęty od ';
$string['startingin'] = 'Rozpoczyna się ';

$string['userimage'] = 'Zdjęcie użytkownika';

$string['seeallmessages'] = 'Zobacyz wszystkiego wiadomości';
$string['viewallnotifications'] = 'Zobacz wszystkie powiadomienia';
$string['viewallupcomingevents'] = 'ZObacz wszystkie nadchodzące wydarzenia';

$string['youhavemessages'] = 'Ilość nowych wiadomości: {$a}';
$string['youhavenomessages'] = 'Nie masz nowych wiadomości';

$string['youhavenotifications'] = 'Ilość powiadomień: {$a}';
$string['youhavenonotifications'] = 'Nie masz nowych powwiadomień';

$string['youhaveupcomingevents'] = 'Ilość nadchodzących wydarzeń: {$a}';
$string['youhavenoupcomingevents'] = 'Nie masz nadchodzących wydarzeń';


/* Dashboard elements */

// Add notes
$string['addnotes'] = 'Dodaj notatki';
$string['selectacourse'] = 'Wybierz kurs';

$string['addsitenote'] = 'Dodaj notatkę do strony';
$string['addcoursenote'] = 'Dodaj notatkę do kursu';
$string['addpersonalnote'] = 'Dodaj osobistą notatkę';
$string['deadlines'] = 'Deadline';

// Add notes js
$string['selectastudent'] = 'Wybierz kursanta';
$string['total'] = 'W sumie';
$string['nousersenrolledincourse'] = 'Nie ma żadnych zapisanych użytkowników w kursie {$a} .';
$string['selectcoursetodisplayusers'] = 'Wybierz kurs, aby wyświetlić zapisanych użytkowników.';


// Deadlines
$string['gotocalendar'] = 'Przejdź do kalendarza';
$string['noupcomingdeadlines'] = 'Nie ma żadnych nadchodzących deadlinów!';
$string['in'] = 'W';
$string['since'] = 'Od';

// Latest Members
$string['latestmembers'] = 'Najnowsi członkowie';
$string['viewallusers'] = 'Zobacz wszystkich użytkowników';

// Recently Active Forums
$string['recentlyactiveforums'] = 'Ostatnio aktywne fora';
$string['norecentlyactiveforums'] = 'Brak ostatnio aktywnych forów';

// Recent Assignments
$string['assignmentstobegraded'] = 'Zadania do ocenienia.';
$string['assignment'] = '`Zadanie';
$string['recentfeedback'] = 'Osatnie opinie';

// Recent Events
$string['upcomingevents'] = 'Nadchodzące wydarzenia';
$string['productimage'] = 'Zdjęcie produktu';
$string['noupcomingeventstoshow'] = 'Brak nadchodzących wydarzeń!';
$string['viewallevents'] = 'Zobacz wszystkie wydarzenia';
$string['addnewevent'] = 'Dodaj nowe wydarzenie.';

// Enrolled users stats
$string['enrolleduserstats'] = 'Statystyki zapisanych użytkowników';
$string['problemwhileloadingdata'] = 'Przepraszamy, powstał błąd podczas wczytywania danych.';
$string['nocoursecategoryfound'] = 'Nie znaleziono kategorii kursów w systemie.';
$string['nousersincoursecategoryfound'] = 'Brak zapisanych użytkowników w tej kategorii kursów.';

// Quiz stats
$string['quizstats'] = 'Próby podejścia do quizu';
$string['totalusersattemptedquiz'] = 'Liczba użytkowników, którzy podeszli do quizu';
$string['totalusersnotattemptedquiz'] = 'Liczba użytkowników niepodchodzących do quizu';

/* Theme Controller */

$string['years'] = 'rok/lata';
$string['months'] = 'miesiąc(e)';
$string['days'] = 'dzień/dni';
$string['hours'] = 'godzina/godziny';
$string['mins'] = 'minuta/minuty';

$string['parametermustbeobjectorintegerorstring'] = 'Parametr {$a} musi być okiektem, liczbą lub ciągiem numerycznym';
$string['usernotenrolledoncoursewithcapability'] = 'Użytkownik nie zapisał się na kurs ze zdolnością';
$string['userdoesnothaverequiredcoursecapability'] = 'Użytkownik nie ma wymaganego kursu';
$string['coursesetuptonotshowgradebook'] = 'Kurs ustawiony tak, aby nie pokazywać ocen studentom.';
$string['coursegradeishiddenfromstudents'] = 'Ocena z kursu jest ukryta przed studentami.';
$string['feedbackavailable'] = 'Dostępna ocena do dodania';
$string['nograding'] = 'Nie masz żadnych zgłoszeń do oceny.';


/* Calendar page */
$string['selectcoursetoaddactivity'] = 'Wybierz kurs, aby dodać aktywność';
$string['addnewactivity'] = 'Dodaj nową aktywność';

// Calendar page js
$string['redirectingtocourse'] = 'Przekierowanie do strony kursu {$a} ...';
$string['nopermissiontoaddactivityinanycourse'] = 'Niestety nie masz uprawnień, aby dodać aktywność w żadnym kursie.';
$string['nopermissiontoaddactivityincourse'] = 'Niestety nie masz uprawnień, aby dodać aktywność w kursie {$a}.';
$string['selectyouroption'] = 'Wybierz opcję';


/* Blog Archive page */
$string['viewblog'] = 'Zobacz cały blog';

/* Course js */

// $string['hidesection'] = 'Collapse';
// $string['showsection'] = 'Expand';
// $string['hidesections'] = 'Collapse Sections';
// $string['showsections'] = 'Expand Sections';
// $string['addsection'] = 'Add Section';

$string['overdue'] = 'Zaległy';
$string['due'] = 'Przypisany';

/* Footer headings */
$string['quicklinks'] = 'Szybkie linki';

/*coruse activity navigation*/
$string['backtocourse'] = 'Przegląd kursu';
$string['sectionnotitle'] = 'Ogólne';
$string['sectiondefaulttitle'] = 'Sekcja';

$string['sectionactivities'] = 'Aktywności';
$string['showless'] = 'Wyświetl mniej';
$string['showmore'] = 'Wyświetl więcej';
$string['allcategories'] = 'Wszystkie kategorie';
$string['category'] = 'Kategoria';
$string['administrator'] = 'Administrator';
$string['badges'] = 'Odznaki';
$string['webpage'] = 'Strona www';
$string['contacts'] = 'Kontakty';
$string['courses'] = 'Kursy';
$string['preferences'] = 'Preferencje';
$string['complete'] = 'Zakończ';
$string['start_date'] = 'Data rozpoczęcia';
$string['submit'] = 'Zatwierdź';
$string['fontname'] = 'Czcionka witryny';
$string['fontnamedesc'] = 'Wpisz dokładną nazwę czcionki, która będzie używana w Moodle.';
$string['followus'] = 'Obserwuj nas';
$string['poweredby'] = 'Wspierane przez Edwiser RemUI';
$string['signin'] = 'Zaloguj';
$string['forgotpassword'] = 'Nie pamiętasz hasła?';
$string['noaccount'] = 'Nie masz konta?';
$string['applysitewide'] = 'Zastosuj w obrębie całej strony.';
$string['applysitecolor'] = 'Zastosuj kolor strony';

// User profile page js
$string['actioncouldnotbeperformed'] = 'Nie można wykonać akcji.';
$string['enterfirstname'] = 'Proszę podać imię';
$string['enterlastname'] = 'Proszę podać nazwisko';
$string['enteremailid'] = 'Proszę podać adres email';
$string['enterproperemailid'] = 'Proszę wpisać poprawny adres email.';
$string['detailssavedsuccessfully'] = 'Dane zapisane pomyślnie!';

/* Blog Archive page */
$string['viewblog'] = 'Zobacz cały blog';
$string['author'] = 'Autor';

$string['createaccount'] = 'Tutaj możesz utworzyć nowe konto.';
$string['signup'] = 'Zapisz się';
$string['togglesearch'] = 'Przełącz na wyszukiwanie';
$string['togglefullscreen'] = 'Przełącz na tryb pełnoekranowy';
$string['navbartype'] = 'Kolor paska nawigacyjnego';
$string['sidebarcolor'] = 'Kolor paska bocznego';
$string['sitecolor'] = 'Kolor strony';
$string['others'] = 'Pozostałe';
$string['today'] = 'Dzisiaj';
$string['yesterday'] = 'Wczoraj';
$string['you_do_not_have_permission_to_perform_this_action'] = 'Nie masz uprawnień, aby dokonać tej akcji';
$string['viewallcourses'] = 'Zobacz wszystkie kursy';
$string['readmore'] = 'ZOBACZ WIĘCEJ';
$string['aboutremui'] = 'O Edwiser RemUI';

$string['remuisettings'] = 'Ustawienia RemUI';
$string['createanewcourse'] = 'Stwórz nowy kurs';
$string['createarchivepage'] = 'Strona archiwum kursów';
$string['siteblog'] = 'Blog';
$string['selectcategory'] = 'Wybierz kategorię';
$string['nocoursesavail'] = 'Przepraszamy. Brak aktualnie dostępnych kursów';
$string['norecentfeedback'] = 'Brak ostatnich opinii.';

// news and updates tab
$string['newsandupdates'] = 'Aktualności i Aktualizacje';
$string['newupdatemessage'] = 'Dostępna jest nowa aktualizacja dla RemUI.';
$string['currentversionmessage'] = 'Aktualna wersja to: ';
$string['downloadupdate'] = 'Pobierz aktualizację';
$string['latestversionmessage'] = 'Korzystasz z najnowszej wersji RemUI.';
$string['rateremui'] = 'Oceń RemUI';
$string['fullname']  = 'Pełna nazwa';
$string['providefeedback'] = 'Przekaż nam opinię o RemUI';
$string['sendfeedback'] = 'Wyślij opinię';
$string['recentnews'] = 'Ostatnie aktualności';

/* Grey Box Image Home Page */
$string['frontpageblockimage'] = 'Wgraj obrazek';
$string['frontpageblockimagedesc'] = 'Możesz wgrać obrazek jako zawartość.';

/* My Course Page */
$string['resume'] = 'Wznów';
$string['start'] = 'Start';
$string['completed'] = 'Ukończony';

/* Footer Setting */
$string['footerbottomtext'] = 'Tekst w lewej dolnej części stopki';
$string['footerbottomlink'] = 'Link w lewej dolnej częsci stopki';
$string['footerbottomlinkdesc'] = 'Wpisz link w dolej lewej części stopki. Np. http://www.TwojaFirma.pl';

/* Dashboard Page */
$string['welcome-msg'] = 'Witam w swoim kokpicie';
$string['coursecompleted'] = 'UKOŃCZONE KURSY';
$string['activitycompleted'] = 'UKOŃCZONE AKTYWNOŚCI';
$string['enrolledcourses'] = 'TWOJE KURSY';
$string['courseactivities'] = 'AKTYWNOŚCI KURSÓW';
$string['noevents'] = "Brak zdarzeń";
$string['overdue'] = "Zaległe";
$string['upcoming'] = "Nadchodzące";
$string['expired'] = 'Wygasłe';
$string['selectcourse'] = "Wybierz kurs";
$string['courseanlytics']="Analiza kursów";
$string['highestgrade']="NAJWYŻSZA OCENA";
$string['lowestgrade']="NAJNIŻSZA OCENA";
$string['averagegrade']="ŚREDNIA OCENA";
$string['viewcourse'] = "ZOBACZ KURS";
$string['mycourses'] = "Moje kursy";
$string['tasks'] = "Zadania do ukończenia";
$string['coursestats'] = "Statystyki kursu";
$string['allActivities'] = "Wszystkie aktywności";
$string['enabledashboard'] = "Aktywuj nowy kokpit";
$string['enabledashboarddesc'] = "Aktywuj nowy kokpit dla wszystkich uzytkowników";

$string['enableannouncement'] = "Aktywuj komunikaty strony";
$string['enableannouncementdesc'] = "Aktywuj komunikaty strony dla odwiedzających/studentów.";
$string['announcementtext'] = "Komunikat";
$string['announcementtextdesc'] = "Komunikat wyświetlany w obrębie strony.";
$string['announcementtype'] = "Typ komunikatu.";
$string['announcementtypedesc'] = "informacja/alert/zagrożenie/sukces";
$string['typeinfo'] = "Komunikat informacyjny";
$string['typedanger'] = "Ważny komunikat";
$string['typewarning'] = "Komunikat ostrzegający";
$string['typesuccess'] = "Komunikat o sukcesie";

// Teacher Dashboard Strings
$string['courseprogress'] = "Postęp kursu";
$string['course'] = "Kurs";
$string['startdate'] = "Data rozpoczęcia";
$string['enrolledstudents'] = "Kursanci";
$string['progress'] = "Postęp";
$string['name'] = "Nazwa";
$string['status'] = "Status";
$string['back'] = "Wstecz";


// Dashboard Edwiser Remui Blocks 
$string['courseprogressblock'] = 'Postępy kursu Blok';
$string['enrolledusersblock'] = 'Zarejestrowani użytkownicy Blok';
$string['quizattemptsblock'] = 'Próby quizu Blok';
$string['courseanlyticsblock'] = 'Analiza kursów Blok';
$string['latestmembersblock'] = 'Ostatni członkowie Blok';
$string['addnotesblock'] = 'Dodaj notatki Blok';
$string['recentfeedbackblock'] = 'Niedawny sprzężenie zwrotne Blok';
$string['recentforumsblock'] = 'Niedawny Fora Blok';

$string['courseprogressblockdesc'] = 'Umożliwiać Postępy kursu Blok ';
$string['enrolledusersblockdesc'] = 'Umożliwiać Zarejestrowani użytkownicy Blok';
$string['quizattemptsblockdesc'] = 'Umożliwiać Próby quizu Blok';
$string['courseanlyticsblockdesc'] = 'Umożliwiać Analiza kursów Blok';
$string['latestmembersblockdesc'] = 'Umożliwiać Ostatni członkowie Blok';
$string['addnotesblockdesc'] = 'Umożliwiać Dodaj notatki Blok';
$string['recentfeedbackblockdesc'] = 'Umożliwiać Niedawny sprzężenie zwrotne Blok';
$string['recentforumsblockdesc'] = 'Umożliwiać Niedawny Fora Blok';

$string['recentactivityblock'] = 'Blok Ostatnie Aktywności';
$string['recentactivityblockdesc'] = 'Jeśli aktywne, Ostatnie Aktywności będą widoczne w Kokpicie';

$string['enablerecentcourses'] = 'Włącz Ostatnie Kursy';
$string['enablerecentcoursesdesc'] = 'Jeśli aktywne, menu Ostatnie Kursy będzie widoczne w nagłówku.';

$string['enablecoursestats'] = 'Włącz statystyki kursu';
$string['enablecoursestatsdesc'] = 'Po włączeniu Administrator, Menedżerowie i nauczyciel zobaczą statystyki związane z kursem na stronie kursu.';
$string['enabledictionary'] = 'Włącz Słownik';
$string['enabledictionarydesc'] = 'Jeśli aktywne, funkcja Słownik będzie aktywowana i będzie pokazywać znaczenie zaznaczonego tekstu w oknie popup.';
$string['more'] = 'More...';

$string['coursedescimage'] = 'Sekcja Ustawienia Obrazu';
$string['coursedescimagedesc'] = 'Jeśli aktywne, obraz tła sekcji Ogólne zostanie pobrany z opisu podsumowania kursu (domyślnie pierwszy obraz), w przeciwnym razie zostanie pobrany z plików podsumowania kursu.';
$string['recent'] = 'Niedawny';

$string['enableheaderbuttons'] = 'Show header buttons in dropdown';
$string['enableheaderbuttonsdesc'] = 'All the buttons which are displayed in header are converted to a single dropdown.';
$string['sidebarpinned'] = 'Sidebar pinned.';
$string['sidebarunpinned'] = 'Sidebar unpinned.';
$string['pinsidebar'] = 'Pin sidebar';
$string['unpinsidebar'] = 'Unpin sidebar';
$string['mergemessagingsidebar'] = 'Panel korespondencji seryjnej';
$string['mergemessagingsidebardesc'] = 'Scalanie panelu wiadomości na prawym pasku bocznym';

/** Course Stats */
$string['enrolstudents'] = 'Zarejestrowani <br>Studenci';
$string['studentcompleted'] = 'Studenci <br>ukończeni';
$string['inprogress'] = 'W <br>trakcie';
$string['yettostart'] = 'Jeszcze <br>na start';

// Frontpage old strings

$string['homepagesettings'] = 'Ustawienia strony głównej';

/*theme_remUI_frontpage*/

$string['frontpageimagecontent'] = 'Zawartość nagłówka';
$string['frontpageimagecontentdesc'] = 'Ta sekcja dotyczy górnej części Twojej strony głównej.';
$string['frontpageimagecontentstyle'] = 'Rodzaj';
$string['frontpageimagecontentstyledesc'] = 'Możesz wybrać pomiędzy statycznym a sliderem.';
$string['staticcontent'] = 'Statyczny';
$string['slidercontent'] = 'Slider';
$string['addtext'] = 'Dodaj tekst';
$string['defaultaddtext'] = 'Edukacja to sprawdzona droga do postępu.';
$string['addtextdesc'] = 'Tutaj możesz dodać tekst do wyświetlenia na stronie głównej, najlepiej w HTML.';
$string['uploadimage'] = 'Wgraj opbrazek';
$string['uploadimagedesc'] = 'Możesz wgrać obrazek jako zawartość slidera';
$string['video'] = 'Kod osadzony w iframe';
$string['videodesc'] = ' Tutaj możesz wkleić kod do filmu, który będzie  osadzony w iframe.';
$string['contenttype'] = 'Wybierz rodzaj zawartości';
$string['contentdesc'] = 'Możesz wybrać pomiędzy obrazkiem a linkiem do filmu.';
$string['image'] = 'Obrazek';
$string['videourl'] = 'Link do filmu';

$string['slidercount'] = 'Ilość slajdów';
$string['slidercountdesc'] = '';
$string['one'] = '1';
$string['two'] = '2';
$string['three'] = '3';
$string['five'] = '5';

$string['slideimage'] = 'Wgraj obrazki do slidera';
$string['slideimagedesc'] = 'Możesz wgrać obrazek jako zawartość tego slajdu.';
$string['slidertext'] = 'Dodaj tekst do slidera';
$string['defaultslidertext'] = '';
$string['slidertextdesc'] = 'Możesz wstawić tekst jako zawartość tego slajdu. Preferowany HTML.';
$string['sliderurl'] = 'Dodaj link do przycisku slidera';
$string['sliderbuttontext'] = 'Dodaj przycisk tekstowy na slajdzie';
$string['sliderbuttontextdesc'] = 'Możesz dodać tekst na przycisk na tym slajdzie.';
$string['sliderurldesc'] = 'Możesz podać link do strony, do której użytkownik będzie przekierowany po kliknięciu w przycisk.';
$string['slideinterval'] = 'Odstęp pomiędzy slajdami';
$string['slideintervaldesc'] = 'Możesz ustawić czas pomiędzy zmianą slajdów. W przypadku, jeśli wybrany jest tylko jeden slajd, opcja ta nie będzie powodowała żadnych efektów.';
$string['sliderautoplay'] = 'Automatyczne przełączanie slajdera';
$string['sliderautoplaydesc'] = 'Wybierz "tak", aby włączyć automatyczne przełączanie slajdów.';
$string['true'] = 'Tak';
$string['false'] = 'Nie';

$string['frontpageblocks'] = 'Zawartość główna';
$string['frontpageblocksdesc'] = 'Możesz wstawić nagłówek na swojej witrynie';

$string['enablesectionbutton'] = 'Włącz przyciski na sekcjach';
$string['enablesectionbuttondesc'] = 'Włącz przyciski w głównej sekcji.';

/* General section descriptions */
$string['frontpageblockiconsectiondesc'] = 'Możesz wybrać dowolną ikonę z tej <a href="https://fontawesome.com/v4.7.0/cheatsheet/" target="_new">listy</a>. Wpisz tekst po "fa-". ';
$string['frontpageblockdescriptionsectiondesc'] = 'Krótki opis tytułu.';
$string['defaultdescriptionsection'] = 'Standardowy opis ';
$string['sectionbuttontextdesc'] = 'Wpisz tekst na przycisku w tej sekcji.';
$string['sectionbuttonlinkdesc'] = 'Wpisz URL dla linka w tej sekcji.';
$string['frontpageblocksectiondesc'] = 'Dodaj tytuł do tej sekcji.';

/* block section 1 */
$string['frontpageblocksection1'] = 'Tytuł dla pierwszej sekcji';
$string['frontpageblockdescriptionsection1'] = 'Opis dla pierwszej sekcji';
$string['frontpageblockiconsection1'] = 'Ikona Font-Awesome dla pierwszej sekcji';
$string['sectionbuttontext1'] = 'Tekst na przycisku w pierwszej sekcji';
$string['sectionbuttonlink1'] = 'URL linka dla pierwszej sekcji';


/* block section 2 */
$string['frontpageblocksection2'] = 'Tytuł dla drugiej sekcji';
$string['frontpageblockdescriptionsection2'] = 'Opis dla drugiej sekcji';
$string['frontpageblockiconsection2'] = 'Ikona Font-Awesome dla drugiej sekcji';
$string['sectionbuttontext2'] = 'Tekst na przycisku w drugiej sekcji';
$string['sectionbuttonlink2'] = 'URL linka dla drugiej sekcji';


/* block section 3 */
$string['frontpageblocksection3'] = 'Tytuł dla trzeciej sekcji';
$string['frontpageblockdescriptionsection3'] = 'Opis dla trzeciej sekcji';
$string['frontpageblockiconsection3'] = 'Ikona Font-Awesome dla trzeciej sekcji';
$string['sectionbuttontext3'] = 'Tekst na przycisku w trzeciej sekcji';
$string['sectionbuttonlink3'] = 'URL linka dla trzeciej sekcji';


/* block section 4 */
$string['frontpageblocksection4'] = 'Tytuł dla czwartej sekcji';
$string['frontpageblockdescriptionsection4'] = 'Opis dla czwartej sekcji';
$string['frontpageblockiconsection4'] = 'Ikona Font-Awesome dla czwartej sekcji';
$string['sectionbuttontext4'] = 'Tekst na przycisku w czwartej sekcji';
$string['sectionbuttonlink4'] = 'URL linka dla czwartej sekcji';


// Frontpage Aboutus settings
$string['frontpageaboutus'] = 'Strona główna O nas';
$string['frontpageaboutusdesc'] = 'Sekcja O nas na stronie głównej ';
$string['frontpageaboutustitledesc'] = 'Dodaj tytuł do sekcji O nas';
$string['frontpageaboutusbody'] = 'Opis dla sekcji o Nas';
$string['frontpageaboutusbodydesc'] = 'Krótki opis tej sekcji';

$string['enablefrontpageaboutus'] = 'Włącz sekcję O nas';
$string['enablefrontpageaboutusdesc'] = 'Włącz sekcję O nas na stronie głównej.';
$string['frontpageaboutusheading'] = 'Nagłówek O nas';
$string['frontpageaboutusheadingdesc'] = 'Tekst nagłówka tej sekcji';
$string['frontpageaboutustext'] = 'Tekst O nas';
$string['frontpageaboutustextdesc'] = 'Wpisz tekst O nas na stronie głównej.';
$string['frontpageaboutusdefault'] = '<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Ut enim ad minim veniam.</p>';
$string['frontpageaboutusimage'] = 'Obrazek w sekcji O nas na stornie głównej';
$string['frontpageaboutusimagedesc'] = 'Wgraj obrazek wyświetlany na stronie głównej w tej sekcji';

// latest 3.3 to be arranged later
$string['testimonialcount'] = 'Ilość opini';
$string['testimonialcountdesc'] = 'Ilość opini do wyświetlenia';
$string['testimonialimage'] = 'Obrazek opini';
$string['testimonialimagedesc'] = 'Obrazek osoby w opini';
$string['testimonialname'] = 'Imię osoby';
$string['testimonialnamedesc'] = 'Imię osoby';
$string['testimonialdesignation'] = 'Oznaczenia osoby';
$string['testimonialdesignationdesc'] = 'Oznaczenia osoby';
$string['testimonialtext'] = 'Opinie użytkowników';
$string['testimonialtextdesc'] = 'Co powiedzieli inni';


/*Front Page Setting for About Us Block*/
$string['frontpageblockdisplay'] = 'Sekcja O nas';
$string['frontpageblockdisplaydesc'] = 'Możesz pokazać lub ukryć sekcję "O nas", możesz także wyświetlić sekcję "O nas" w formacie siatki "';
$string['donotshowaboutus'] = 'Nie pokazuj';
$string['showaboutusinrow'] = 'Pokaż sekcję w wierszu';
$string['showaboutusingridblock'] = 'Pokaż sekcję w formacie siatki';
 
