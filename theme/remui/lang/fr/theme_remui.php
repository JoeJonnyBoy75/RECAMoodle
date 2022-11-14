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

$string['advancedsettings'] = 'Réglages avancés';
$string['backgroundimage'] = 'Image de fond';
$string['backgroundimage_desc'] = "L\'image à afficher en tant qu\'arrière-plan du site. L\'image d\'arrière-plan que vous téléchargez ici remplacera l\'image d\'arrière-plan dans vos fichiers de préréglage de thème.";
$string['brandcolor'] = 'Couleur de la marque';
$string['brandcolor_desc'] = "La couleur d\'accent.";
$string['bootswatch'] = 'Bootswatch';
$string['bootswatch_desc'] = 'Une montre de démarrage est un ensemble de variables Bootstrap et css pour styler Bootstrap';
$string['choosereadme'] = '
<div class="about-remui-wrapper text-center">
    <div class="about-remui m-auto" style="max-width: 1000px;">
        <h1 class="text-center">Bienvenu dans le thème Edwiser RemUI</h1><br>
        <h4 class="text-muted">Le thème Edwiser RemUI est la nouvelle révolution dans l\'expérience utilisateur de Moodle.
        Il a été spécialement conçu pour enrichir le e-learning avec une présentation personnalisée, une navigation simplifiée
        et des options personnalisables de création de contenu.<br><br>
        Nous sommes certain que vous apprécierez la possibilité de remodelé le design de votre site Moodle.!
        </h4>
        <div class="text-center mt-50">
        <img src="' . $CFG->wwwroot . '/theme/remui/pix/selection.png" class="w-full" alt="Edwiser RemUI screen shot" style="max-width: 100%;"/>
        </div>
        <br><br>
        <div class="text-center">
            <div class="btn-group text-center" role="group" aria-label="...">
              <div class="btn-group mr-1" role="group">
                <a href="https://edwiser.helpscoutdocs.com/collection/78-edwiser-remui-theme" target="_blank" class="btn btn-primary btn-round">FAQ</a>&nbsp;
              </div>
              <div class="btn-group mr-1" role="group">
                <a href="https://edwiser.org/remui/documentation/" target="_blank" class="btn btn-primary btn-round">Documentation</a>&nbsp;
              </div>
              <div class="btn-group" role="group">
                <a href="https://edwiser.org/contact-us/" target="_blank" class="btn btn-primary btn-round">Support</a>
              </div>
            </div>
        </div>
        <br>
        <h1 class="text-center">Personnalisez votre thème</h1>
        <h4 class="text-muted text-center">
            Nous comprenons que tous les LMS ne sont pas les mêmes. Nous allons travailler avec vous pour comprendre vos besoins, concevoir et développer une solution pour atteindre vos objectifs.
        </h4>
        <br><br>
        <div class="row wdm_generalbox">
            <div class="marketing-spots span3 col-lg-6 col-12">
                <div class="iconsquare">
                    <i class="fa fa-cogs"></i>
                </div>
                <div class="iconbox-content">
                    <h4>Personnalisation du thème</h4>
                </div>
            </div>
            <div class="marketing-spots span3 col-lg-6 col-12">
                <div class="iconsquare">
                    <i class="fa fa-edit"></i>
                </div>
                <div class="iconbox-content">
                    <h4>Développement de fonctionnalités</h4>
                </div>
            </div>
            <br>
            <div class="marketing-spots span3 col-lg-6 col-12">
                <div class="iconsquare">
                    <i class="fa fa-link"></i>
                </div>
                <div class="iconbox-content">
                    <h4>Intégration d\'API</h4>
                </div>
            </div>
            <div class="marketing-spots span3 col-lg-6 col-12">
                <div class="iconsquare">
                    <i class="fa fa-life-ring"></i>
                </div>
                <div class="iconbox-content">
                    <h4>Conseil LMS</h4>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="text-center">
            <a class="btn btn-primary btn-lg" target="_blank" href="https://edwiser.org/contact-us/">Contactez-nous</a>&nbsp;&nbsp;
        </div>
    </div>
</div>
<br />';
$string['aboutremui'] = 'About Edwiser RemUI';
$string['currentinparentheses'] = '(actuel)';
$string['configtitle'] = 'Edwiser RemUI';
$string['fontsize'] = 'Taille de la base de thème';
$string['fontsize_desc'] = 'Entrez une taille de police en%';
$string['nobootswatch'] = 'Aucun';
$string['pluginname'] = 'Edwiser RemUI';
$string['presetfiles'] = 'Fichiers de préréglage de thème supplémentaires';
$string['presetfiles_desc'] = 'Les fichiers prédéfinis peuvent être utilisés pour modifier radicalement l\'apparence du thème.';
$string['preset'] = 'Thème prédéfini';
$string['preset_desc'] = 'Choisissez un préréglage pour changer le look du thème.';
$string['privacy:metadata'] = 'Le thème remui ne stocke aucune donnée personnelle concernant un utilisateur.';
$string['rawscss'] = 'SCSS brut';
$string['rawscss_desc'] = 'Utilisez ce champ pour fournir le code SCSS ou CSS qui sera injecté à la fin de la feuille de style.';
$string['rawscsspre'] = 'SCSS initial brut';
$string['rawscsspre_desc'] = "Dans ce champ, vous pouvez fournir le code d\'initialisation SCSS, il sera injecté avant tout le reste. La plupart du temps, vous utiliserez ce paramètre pour définir des variables.";
$string['region-side-pre'] = 'Droite';
$string['privacy:metadata:preference:draweropennav'] = "Préférence de l\'utilisateur pour masquer ou afficher la navigation dans le menu du tiroir.";
$string['privacy:drawernavclosed'] = 'La préférence actuelle pour le tiroir de navigation est fermée.';
$string['privacy:drawernavopen'] = 'La préférence actuelle pour le tiroir de navigation est ouverte';
$string['cachedef_courses'] = 'Cache pour les cours';
$string['cachedef_guestcourses'] = 'Cache pour les cours d\'invité';
$string['cachedef_updates'] = 'Cache pour les mises à jour';

// Course view preference.
$string['privacy:metadata:preference:course_view_state'] = "Le type d\'affichage que l\'utilisateur préfère pour la liste des cours";
$string['course_view_state_description_grid'] = 'Pour afficher les cours en format de grille';
$string['course_view_state_description_list'] = 'Pour afficher les cours en format de liste';

// Course view preference.
$string['privacy:metadata:preference:viewCourseCategory'] = "Le type d\'affichage que l\'utilisateur préfère pour la liste des cours";
$string['viewCourseCategory_grid'] = 'Pour afficher les cours en format de grille';
$string['viewCourseCategory_list'] = 'Pour afficher les cours en format de liste';

// Aside right view preference.
$string['privacy:metadata:preference:aside_right_state'] = 'Si le bloc de côté à droite doit rester ouvert ou amarré';
$string['aside_right_state_'] = 'Pour afficher le bloc de côté à droite comme ouvert'; // Blank value.
$string['aside_right_state_overrideaside'] = 'Pour afficher le bloc de côté à droite comme ancré'; // Overrideaside.

// Menu view preference.
$string['privacy:metadata:preference:menubar_state'] = "Le type d\'affichage que l\'utilisateur préfère pour la barre de menus";
$string['menubar_state_fold'] = 'Pour afficher la barre de menus comme pliée';
$string['menubar_state_unfold'] = 'Pour afficher la barre de menus comme dépliée';
$string['menubar_state_open'] = 'Pour afficher la barre de menus comme ouverte';
$string['menubar_state_hide'] = 'Pour afficher la barre de menus comme masquée';

// Profile Page.
$string['administrator'] = 'Administrator';
$string['contacts'] = 'Contacts';
$string['blogentries'] = 'Entrées de blog';
$string['discussions'] = 'Discussions';
$string['aboutme'] = 'A propos de moi';
$string['courses'] = 'Cours';
$string['interests'] = "Centres d\'intérêt";
$string['institution'] = 'Département et institution';
$string['location'] = 'Localisation';
$string['description'] = 'Description';
$string['editprofile'] = 'Éditer le Profil';
$string['start_date'] = 'Début du cours';
$string['complete'] = 'Complété';
$string['surname'] = 'Nom';
$string['actioncouldnotbeperformed'] = "L\'action n\'a pas pu être effectuée !";
$string['enterfirstname'] = "Merci d\'entrer votre prénom.";
$string['enterlastname'] = "Merci d\'entrer votre nom.";
$string['enteremailid'] = "Merci d\'entrer votre adresse mail.";
$string['enterproperemailid'] = "Merci d\'entrer une adresse mail existante.";
$string['detailssavedsuccessfully'] = 'Informations enregistrés avec succès!';
$string['forgotpassword'] = 'Mot de passe oublié?';

// Left Navigation Drawer.
$string['createarchivepage'] = 'Liste des cours';
$string['createanewcourse'] = 'Créer un nouveau cours';
$string['remuisettings'] = 'Paramètres RemUI';

// Right Navigation Drawer.
$string['navbartype'] = 'Couleur de la barre de navigation';
$string['sidebarcolor'] = 'Couleur de la barre latérale';
$string['sitecolor'] = 'Couleur du site';
$string['applysitewide'] = "Appliquer sur l\'ensemble du site";
$string['applysitecolor'] = 'Appliquer la couleur du site';
$string['sidebarpinned'] = 'Barre latérale épinglée';
$string['sidebarunpinned'] = 'Barre latérale non épinglée';
$string['pinsidebar'] = 'Broche latérale';
$string['unpinsidebar'] = 'Détacher la barre latérale';
$string['primary'] = 'Primaire';
$string['brown'] = 'marron';
$string['cyan'] = 'Cyan';
$string['green'] = 'vert';
$string['grey'] = 'Gris';
$string['indigo'] = 'Indigo';
$string['orange'] = 'Orange';
$string['pink'] = 'Rose';
$string['purple'] = 'Violet';
$string['red'] = 'rouge';
$string['teal'] = 'Sarcelle';
$string['custom-color'] = 'Couleur personnalisée';
$string['dark'] = 'Foncé';
$string['light'] = 'Lumière';

// General Settings.
$string['generalsettings' ] = 'Paramètres généraux';
$string['enableannouncement'] = "Activer l'annonce à l'échelle du site";
$string['enableannouncementdesc'] = "Activer l'annonce à l'échelle du site pour tous les utilisateurs.";
$string['enabledismissannouncement'] = "Activer l'annonce à l'échelle du site pouvant être rejetée";
$string['enabledismissannouncementdesc'] = "Si activé, autorisez les utilisateurs à ignorer l'annonce.";

$string['announcementtext'] = "Annonce";
$string['announcementtextdesc'] = "Message d'annonce à afficher dans tout le site.";
$string['announcementtype'] = "Type d'annonce";
$string['announcementtypedesc'] = "Sélectionnez le type d'annonce pour afficher une couleur d'arrière-plan différente pour l'annonce.";
$string['typeinfo'] = "Informations";
$string['typedanger'] = "Urgent";
$string['typewarning'] = "Avertissement";
$string['typesuccess'] = "Succès";
$string['enablerecentcourses'] = 'Activer les cours récents';
$string['enablerecentcoursesdesc'] = "Si cette option est activée, le menu déroulant des cours récents s'affichera dans l'en-tête.";
$string['mergemessagingsidebar'] = 'Panneau fusionner les messages';
$string['mergemessagingsidebardesc'] = 'Fusionner le panneau de messages dans la barre latérale droite';
$string['none'] = 'Aucun';
$string['enablenewcoursecards'] = 'Mises en page des cartes de cours';
$string['enablenewcoursecardsdesc'] = "Sélectionnez la mise en page de la carte de cours pour qu'elle apparaisse sur la page d'archive du cours";
$string['activitynextpreviousbutton'] = 'Activer le bouton d\'activité suivante et précédente';
$string['activitynextpreviousbuttondesc'] = "Lorsqu'il est activé, le bouton d'activité suivante et précédente apparaîtra sur la page d'activité unique pour basculer entre les activités";
$string['disablenextprevious'] = 'Désactiver';
$string['enablenextprevious'] = 'Activer';
$string['enablenextpreviouswithname'] = "Activer avec le nom de l\'activité";
$string['logoorsitename'] = 'Choisissez le format de votre logo de site';
$string['onlylogo'] = 'Logo uniquement';
$string['logoorsitenamedesc'] = "Logo - Seul le logo sera affiché ; <br /> Icône + nom du site - Une icône avec le nom du site sera affichée. <br/> Nom du site avec logo - Le nom et le logo du site s'afficheront (menu du bas de l'icône du haut de la mise en page de l'en-tête uniquement).";
$string['onlylogo'] = 'Logo seulement';
$string['iconsitename'] = 'Icône et nom du site';
$string['icononly'] = 'Icône uniquement';
$string['logo'] = 'Logo';
$string['logodesc'] = "Vous pouvez ajouter le logo à afficher sur l\'en-tête. Noter que la hauteur préférable est de 50px. Si vous souhaitez la personnaliser, vous pouvez le faire à partir de la section Réglages généraux : CSS personnalisée.";
$string['logomini'] = 'LogoMini';
$string['logominidesc'] = "Vous pouvez ajouter le logomini à afficher dans l'en-tête lorsque la barre latérale est réduite. Remarque: la hauteur préférée est 50 px. Si vous souhaitez personnaliser, vous pouvez le faire à partir de la zone CSS personnalisée.";
$string['siteicon'] = "Icône dans l\'en-tête";
$string['siteicondesc'] = 'Vous n\'avez de logo ? Vous pouvez choisir une icône à partir de cette <a href="https://fontawesome.com/v4.7.0/cheatsheet/" target="_new"><b style="color:#17a2b8!important">liste</b></a>. <br /> Saisissez seulement le nom après le "fa-".';
$string['customcss'] = 'CSS personnalisée';
$string['customcssdesc'] = 'Les règles CSS que vous définissez ici seront ajoutées à chacune des pages, vous permettant ainsi de personnaliser facilement ce thème..';
$string['favicon'] = 'Favicon';
$string['favicosize'] = 'la taille attendue est de 16x16 pixels';
$string['favicondesc'] = 'Ici, Vous pouvez insérer le favicon pour votre site. <i> Pour l\'afficher tout de suite vous pouvez cocher le mode concepteur de thème.)</i>';
$string['fontselect'] = 'Sélecteur de polices';
$string['fontselectdesc'] = 'Choisissez parmi les polices standard sou les types de polices de <a href="https://fonts.google.com/" target="_new">Google</a> pour le Web. Veuillez enregistrer votre choix pour afficher les options. Remarque: Si la police de personnalisation est définie sur Standard, la police Web Google sera appliquée.';
$string['fonttypestandard'] = 'Police standard ';
$string['fonttypegoogle'] = 'Police Google pour le Web';
$string['fontname'] = 'Police du site';
$string['fontnamedesc'] = 'Entrez le nom exact de la police à utiliser pour Moodle.';
$string['googleanalytics'] = 'ID de suivi Google Analytics';
$string['googleanalyticsdesc'] = 'Merci d\'entrer votre code de suivi Google Analytics pour activier le suivi des visiteurs de votre site. L\'ID de suivi s\'affiche au format UA-XXXXXXXX-X.<br />
Sachez qu\'en incluant ce paramètre, vous enverrez des données à Google Analytics et assurez-vous que vos utilisateurs en sont avertis. Notre produit ne stocke aucune des données envoyées à Google Analytics.';
$string['enablecoursestats'] = 'Activer les statistiques du cours';
$string['enablecoursestatsdesc'] = "Si activé, l'administrateur, les gestionnaires et l'enseignant verront les statistiques des utilisateurs liées au cours inscrit sur la page Cours unique";
$string['enabledictionary'] = 'Activer le dictionnaire';
$string['enabledictionarydesc'] = "Si activé, la fonction Dictionnaire sera activée et affichera la signification du texte sélectionné dans l\'info-bulle.";
$string['more'] = 'Plus...';


// Frontpage Old String
// Home Page Settings.
$string['homepagesettings'] = "Paramétrage de la page d\'accueil";
$string['frontpagedesign'] = "Conception de la page d'accueil'";
$string['frontpagedesigndesc'] = "Activer Legacy Builder ou Edwiser RemUI Homepage builder";
$string['frontpagechooser'] = "Choisissez le design de la page d\'accueil";
$string['frontpagechooserdesc'] = "Choisissez votre design de page d\'accueil.";
$string['frontpagedesignold'] = 'Par défaut : Legacy Homepage Builder';
$string['frontpagedesignolddesc'] = 'Tableau de bord par défaut comme ci-dessus.';
$string['frontpagedesignnew'] = 'Nouveau design';
$string['frontpagedesignnewdesc'] = 'Nouveau design avec plusieurs sections. Vous pouvez configurer les sections individuellement sur Frontpage.';
$string['newhomepagedescription'] = "Cliquez sur \'Site Home\' dans la barre de navigation pour aller à \'Homepage Builder\' et créer votre propre page d\'accueil";
$string['frontpageloader'] = "Télécharger l\'image du chargeur pour Frontpage";
$string['frontpageloaderdesc'] = 'Ceci remplace le chargeur par défaut avec votre image';
$string['frontpageimagecontent'] = 'Contenu de en-tête';
$string['frontpageimagecontentdesc'] = 'Cette section se rapporte à la partie supérieure de votre première page.';
$string['frontpageimagecontentstyle'] = 'Style';
$string['frontpageimagecontentstyledesc'] = 'Vous pouvez choisir en image statique ou un carrousel.';
$string['staticcontent'] = 'Statique';
$string['slidercontent'] = 'Carrousel';
$string['addtext'] = 'Ajouter du texte';
$string['defaultaddtext'] = 'La formation est une voie éprouvée pour progresser.';
$string['addtextdesc'] = 'Ici, vous pouvez ajouter le texte à afficher en première page, de préférence en HTML.';
$string['uploadimage'] = 'Télécharger une image';
$string['uploadimagedesc'] = "Vous pouvez télécharger l\'image en tant que contenu pour la diapositive";
$string['video'] = 'Code iframe intégré';
$string['videodesc'] = ' Ici, vous pouvez insérer le code iframe intégré de la vidéo qui doit être incorporée.';
$string['contenttype'] = 'Sélectionner le type de contenu';
$string['contentdesc'] = "Vous pouvez choisir l\'image ou donner l\'URL de vidéo.";
$string['imageorvideo'] = 'Image/ Video';
$string['image'] = 'Image';
$string['videourl'] = 'URL de la Video';
$string['slideinterval'] = 'Intervalle entre les diapositives.';
$string['slideintervalplaceholder'] = 'Nombre entier positif en millisecondes.';
$string['slideintervaldesc'] = "Vous pouvez définir le temps de transition entre les diapositives. Dans le cas où il y a qu\'une diapositive, cette option n\'aura aucun effet.";
$string['slidercount'] = 'Nombre de diapositive';
$string['slidercountdesc'] = '';
$string['one'] = '1';
$string['two'] = '2';
$string['three'] = '3';
$string['four'] = '4';
$string['five'] = '5';
$string['eight'] = '8';
$string['twelve'] = '12';
$string['slideimage'] = 'Téléchargez des images pour le carrousel.';
$string['slideimagedesc'] = 'Vous pouvez télécharger une image en tant que contenu pour cette diapositive.';
$string['sliderurl'] = 'Ajouter un lien au bouton de la diapositive.';
$string['slidertext'] = 'Ajouter du texte à la diapositive.';
$string['defaultslidertext'] = '';
$string['slidertextdesc'] = 'Vous pouvez insérer le texte du contenu de cette diapositive. De préférence en HTML.';
$string['sliderbuttontext'] = 'Ajouter du texte sur le bouton de la diapositive.';
$string['sliderbuttontextdesc'] = 'Vous pouvez ajouter du texte sur le bouton de la diapositive.';
$string['sliderurldesc'] = "Vous pouvez insérer le lien de la page vers laquelle l\'utilisateur sera redirigé en cliquant sur le bouton.";
$string['sliderautoplay'] = 'Définir la lecture automatique du diaporama.';
$string['sliderautoplaydesc'] = 'Sélectionner ‘oui’ Si vous voulez une transition automatique dans votre diaporama.';
$string['true'] = 'Oui';
$string['false'] = 'Non';
$string['frontpageblocks'] = "Contenu du corps de la page d\'accueil";
$string['frontpageblocksdesc'] = 'Vous pouvez définir 4 sections markéting';
$string['frontpageblockdisplay'] = 'À propos de nous section';
$string['frontpageblockdisplaydesc'] = "Vous pouvez afficher ou masquer la section 'A propos de nous', vous pouvez également l'afficher en format de grille";
$string['donotshowaboutus'] = 'Ne pas montrer';
$string['showaboutusinrow'] = 'Afficher la section dans une rangée';
$string['showaboutusingridblock'] = 'Afficher la section dans le bloc de grille';

// About Us.
$string['frontpageaboutus'] = 'Front Page À propos de nous';
$string['frontpageaboutusdesc'] = 'Cette section présente le texte de <i>A propos de nous</i> sur la page d\'accueil.';
$string['frontpageaboutustitledesc'] = 'Ajouter un titre à la section À propos de nous';
$string['frontpageaboutusbody'] = 'Description corporelle pour la section À propos de nous';
$string['frontpageaboutusbodydesc'] = 'Une brève description de cette section';
$string['enablesectionbutton'] = 'Activer les boutons sur les sections markéting';
$string['enablesectionbuttondesc'] = 'Activer les boutons sur le corps des sections markéting.';
$string['sectionbuttontextdesc'] = 'Entrer le texte du bouton de cette section markéting.';
$string['sectionbuttonlinkdesc'] = "Entrer l\'URL en lien avec cette section markéting.";
$string['frontpageblocksectiondesc'] = 'Ajouter un titre à cette section markéting.';

// Block section 1.
$string['frontpageblocksection1'] = 'Titre de la 1ère section';
$string['frontpageblockdescriptionsection1'] = 'Description de la 1ère section';
$string['frontpageblockiconsection1'] = 'Icône Font-Awesome pour la 1ère section';
$string['sectionbuttontext1'] = 'Texte du bouton de la 1ère section';
$string['sectionbuttonlink1'] = 'URL du lien de la 1ère section';

// Block section 2.
$string['frontpageblocksection2'] = 'Titre de la 2ème section';
$string['frontpageblockdescriptionsection2'] = 'Description de la 2ème section';
$string['frontpageblockiconsection2'] = 'Icône Font-Awesome pour la 2ème section';
$string['sectionbuttontext2'] = 'Texte du bouton de la 2ème section';
$string['sectionbuttonlink2'] = 'URL du lien de la 2ème section';

// Block section 3.
$string['frontpageblocksection3'] = 'Titre de la 3ème section';
$string['frontpageblockdescriptionsection3'] = 'Description de la 3ème section';
$string['frontpageblockiconsection3'] = 'Icône Font-Awesome pour la 3ème section';
$string['sectionbuttontext3'] = 'Texte du bouton de la 3ème section';
$string['sectionbuttonlink3'] = 'URL du lien de la 3ème section';

// Block section 4.
$string['frontpageblocksection4'] = 'Titre de la 4ème section';
$string['frontpageblockdescriptionsection4'] = 'Description de la 4ème section';
$string['frontpageblockiconsection4'] = 'Icône Font-Awesome pour la 4ème section';
$string['sectionbuttontext4'] = 'Texte du bouton de la 4ème section';
$string['sectionbuttonlink4'] = 'URL du lien de la 4ème section';
$string['defaultdescriptionsection'] = "Approfondir de façon holistique les technologies \'just in time\' via des scénarios d\'entreprise.";
$string['frontpageaboutus'] = 'Front Page À propos de nous';
$string['frontpageaboutusdesc'] = 'Cette section présente le texte de <i>A propos de nous</i> sur la page d\'accueil.';
$string['enablefrontpageaboutus'] = 'Afficher la section <i>A propos de nous</i> ';
$string['enablefrontpageaboutusdesc'] = 'Afficher la section <i>A propos de nous</i> sur la page d\'accueil.';
$string['frontpageaboutusheading'] = 'En tête de <i>A propos de nous</i>';
$string['frontpageaboutusheadingdesc'] = 'Titre en en-tête pour la section <i>A propos de nous</i>.';
$string['frontpageaboutustext'] = 'Texte de <i>A propos de nous</i>';
$string['frontpageaboutustextdesc'] = 'Entrer le texte  de <i>A propos de nous</i> sur la page d\'accueil.';
$string['frontpageaboutusdefault'] = '<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Ut enim ad minim veniam.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.Lorem ipsum dolor sit amet,
                  consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                  labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur
                  adipisicing elit, sed do eiusmod tempor incididunt
                  ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>';
$string['testimonialcount'] = 'Compte Témoignage';
$string['testimonialcountdesc'] = 'Nombre de témoignages à montrer.';
$string['testimonialimage'] = 'Image de témoignage';
$string['testimonialimagedesc'] = 'Image de personne à afficher avec témoignage';
$string['testimonialname'] = "Nom d'une personne";
$string['testimonialnamedesc'] = 'Nom de personne';
$string['testimonialdesignation'] = 'Désignation de la personne';
$string['testimonialdesignationdesc'] = 'Désignation de la personne.';
$string['testimonialtext'] = 'Témoignage de la personne';
$string['testimonialtextdesc'] = 'Quelle personne dit';
$string['frontpagetestimonial'] = 'Témoignage en première page';
$string['frontpagetestimonialdesc'] = "'Section des témoignages de la page d'accueil'";
$string['frontpageblockimage'] = 'Télécharger une image';
$string['frontpageblockimagedesc'] = 'Vous pouvez télécharger une image en tant que contenu pour cela.';
$string['frontpageblockiconsectiondesc'] = 'Vous pouvez choisir une icône à partir de cette <a href="https://fontawesome.com/v4.7.0/cheatsheet/" target="_new">liste</a>. <br /> Saisissez seulement le nom après le "fa-". ';
$string['frontpageblockdescriptionsectiondesc'] = 'Une courte description.';


// Footer Page Settings.
$string['footersettings'] = 'Paramétrages du pied de page';
$string['socialmedia'] = 'Paramètres des réseaux sociaux ';
$string['socialmediadesc'] = 'Entrer les liens des réseaux sociaux pour votre site.';
$string['facebooksetting'] = 'Paramétrage pour Facebook';
$string['facebooksettingdesc'] = 'Enter le lien de votre page Facebook. Par exemple https://www.facebook.com/pagename';
$string['twittersetting'] = 'Paramétrage pour Twitter';
$string['twittersettingdesc'] = 'Enter le lien de votre Twitter. Par exemple https://www.twitter.com/pagename';
$string['linkedinsetting'] = 'Paramétrage pour Linkedin';
$string['linkedinsettingdesc'] = 'Enter le lien de votre page Linkedin. Par exemple https://www.linkedin.com/in/pagename';
$string['gplussetting'] = 'Paramétrage pour Google Plus';
$string['gplussettingdesc'] = 'Enter le lien de votre page Google Plus. Par exemple https://plus.google.com/pagename';
$string['youtubesetting'] = 'Paramétrage pour YouTube';
$string['youtubesettingdesc'] = 'Enter le lien de votre page YouTube. Par exemple https://www.youtube.com/channel/UCU1u6QtAAPJrV0v0_c2EISA';
$string['instagramsetting'] = 'Paramétrage pour Instagram';
$string['instagramsettingdesc'] = 'Enter le lien de votre page Instagram. Par exemple https://www.linkedin.com/company/name';
$string['pinterestsetting'] = 'Paramétrage pour Pinterest';
$string['pinterestsettingdesc'] = 'Enter le lien de votre page Pinterest. Par exemple https://www.pinterest.com/name';
$string['quorasetting'] = 'Paramétrage pour quora';
$string['quorasettingdesc'] = 'Enter le lien de votre page quora. Par exemple https://www.quora.com/name';
$string['footerbottomtext'] = 'Texte en bas à gauche du pied de page';
$string['footerbottomlink'] = 'Lien en bas à gauche Du pied de page';
$string['footerbottomlinkdesc'] = 'Entrez le lien en bas à gauche du pied de page. Par exemple http://www.monblog.fr';
$string['footercolumn1heading'] = 'Contenu de la 1ère colonne, à gauche, du pied de page.';
$string['footercolumn1headingdesc'] = "Cette section se rapporte à la partie inférieure (colonne 1) de votre page d\'accueil.";
$string['footercolumn1title'] = 'Titre de la colonne 1 du pied de page';
$string['footercolumn1titledesc'] = 'Ajouter le titre de cette colonne.';
$string['footercolumn1customhtml'] = 'HTML personnalisé';
$string['footercolumn1customhtmldesc'] = 'Vous pouvez personnaliser le HTML de cette colonne en utilisant la zone de texte ci-dessus.';
$string['footercolumn2heading'] = 'Contenu de la 2ère colonne, au milieu, du pied de page.';
$string['footercolumn2headingdesc'] = 'Cette section se rapporte à la partie inférieure (colonne 2) de votre page d\'accueil.';
$string['footercolumn2title'] = 'Titre de la colonne 2 du pied de page';
$string['footercolumn2titledesc'] = 'Ajouter le titre de cette colonne.';
$string['footercolumn2customhtml'] = 'HTML personnalisé';
$string['footercolumn2customhtmldesc'] = 'Vous pouvez personnaliser le HTML de cette colonne en utilisant la zone de texte ci-dessus.';
$string['footercolumn3heading'] = 'Contenu de la 3ère colonne, à droite, du pied de page.';
$string['footercolumn3headingdesc'] = 'Cette section se rapporte à la partie inférieure (colonne 3) de votre page d\'accueil.';
$string['footercolumn3title'] = 'Titre de la colonne 3 du pied de page';
$string['footercolumn3titledesc'] = 'Ajouter le titre de cette colonne.';
$string['footercolumn3customhtml'] = 'HTML personnalisé';
$string['footercolumn3customhtmldesc'] = 'Vous pouvez personnaliser le HTML de cette colonne en utilisant la zone de texte ci-dessus.';
$string['footerbottomheading'] = 'Paramétrage de la zone basse du pied de page.';
$string['footerbottomdesc'] = 'Ici vous pouvez spécifier un lien que vous voulez afficher dans la section inférieure de pied de page';
$string['footerbottomtextdesc'] = 'Ajouter le texte en bas à droite du pied de page.';
$string['poweredbyedwiser'] = 'Élaboré par @jmd87fr en collaboration avec Edwiser';
$string['poweredbyedwiserdesc'] = 'Désélectionnez pour supprimer \'Élaboré par @jmd87fr en collaboration avec Edwiser\' de votre site.';

// Login Page Settings.
$string['loginsettings'] = 'Paramétrages de la page de connexion.';
$string['navlogin_popup'] = 'Activer le menu de connexion dans la barre de navigation';
$string['navlogin_popupdesc'] = "Activez la fenêtre contextuelle de connexion pour vous connecter rapidement sans rediriger vers la page de connexion";
$string['loginsettingpic'] = "Télécharger l\'image de fond";
$string['loginsettingpicdesc'] = 'Télécharger une image comme de fon de la page avec le formulaire de connexion.';
$string['signuptextcolor'] = 'Couleur description de la signification';
$string['signuptextcolordesc'] = 'Sélectionnez la couleur de texte pour la description de la page d\'inscription.';
$string['left'] = "Côté gauche";
$string['right'] = "Côté droit";
$string['remember_me'] = "Remember Me";
$string['brandlogopos'] = "Afficher le logo sur la page de connexion";
$string['brandlogoposdesc'] = "Si activé, le logo de la marque sera affiché sur la page de connexion.";
$string['brandlogotext'] = "Description du site";
$string['brandlogotextdesc'] = "Ajoutez du texte pour la description du site qui s'affichera sur la page de connexion et d'inscription. Gardez ce champ vide si vous ne voulez pas mettre de description.";
$string['loginpagelayout'] = 'Mise en page de connexion';
$string['loginpagelayoutdesc'] = '';
$string['centerlayout'] = 'Mise en page centrée';
$string['overlaylayout'] = 'Superposition droite';

// License Settings.
$string['licensenotactive'] = '<strong>Attention !</strong> La licence n\'est pas activée, <strong>merci de l\'activer</strong> dans les réglages du thème RemUI.';
$string['licensenotactiveadmin'] = '<strong>Attention !</strong> La licence n\'est pas activée, <strong>merci de l\'activer</strong> <a href="'.$CFG->wwwroot.'/admin/settings.php?section=themesettingremui#informationcenter" ><strong> ICI</strong></a>.';
$string['activatelicense'] = 'Activer la licence';
$string['deactivatelicense'] = 'Désactiver la licence';
$string['renewlicense'] = 'Renouveler la licence';
$string['deactivated'] = 'Désactivée';
$string['active'] = 'Activée';
$string['notactive'] = "N\'est pas activée";
$string['expired'] = 'Expirée';
$string['licensekey'] = 'Clef de licence';
$string['licensestatus'] = 'Status de la licence';
$string['no_activations_left'] = 'Limite dépassée';
$string['activationfailed'] = "L\'activation de la clé de licence a échoué. Veuillez réessayer plus tard.";
$string['noresponsereceived'] = 'Aucune réponse reçue du serveur. Veuillez réessayer plus tard.';
$string['licensekeydeactivated'] = 'La clef de la licence est désactivée.';
$string['siteinactive'] = 'Site inactif (Appuyez sur <i>Activer la licence</i> pour activer le thème).';
$string['entervalidlicensekey'] = "Merci d\'entrer une clef de licence valide.";
$string['licensekeyisdisabled'] = 'Votre clef de licence est désactivée.';
$string['licensekeyhasexpired'] = "Votre clef de licence est expirée. Veuillez la renouveler.";
$string['licensekeyactivated'] = "Votre clef de licence est activée.";
$string['enterlicensekey'] = "Merci de d'entrer votre clef de licence.";
$string['edwiserremuilicenseactivation'] = 'Activation de la licence Edwiser RemUI ';
$string['nolicenselimitleft'] = "Limite d'activation maximale atteinte, aucune activation restante.";

// News And Updates Page.
$string['newsandupdates'] = 'Nouvelles mise à jour';
$string['newupdatemessage'] = 'Nouvelle mise à jour disponible pour RemUI. <a class="text-white" href="{$a}"><u>Cliquez ici</u></a> pour voir.';
$string['currentversionmessage'] = 'Votre version actuelle est';
$string['downloadupdate'] = 'Télécharger la mise à jour';
$string['latestversionmessage'] = 'Vous utilisez la dernière version de RemUI.';
$string['rateremui'] = 'Noter RemUI';
$string['fullname']  = 'Nom complet';
$string['providefeedback'] = "S'il vous plaît fournir vos commentaires sur RemUI";
$string['sendfeedback'] = 'Envoyer des commentaires';
$string['recentnews'] = 'Nouvelles récentes';

// About Edwiser RemUI.
$string['aboutsettings'] = "À propos d'Edwiser RemUI";
$string['notenrolledanycourse'] = 'Non inscrit à aucun cours';

// My Course Page.
$string['resume'] = 'Continuer';
$string['start'] = 'Commencer';
$string['completed'] = 'Terminé';

// Course.
$string['graderreport'] = 'Rapport d’niveleuse';
$string['enroluser'] = 'Inscrire des utilisateurs';
$string['activityeport'] = 'Rapport d’activité';
$string['editcourse'] = 'Éditer les cours';
$string['sections'] = "Sections";

// Next Previous Activity.
$string['activityprev'] = 'Activité précédente';
$string['activitynext'] = 'Activité suivante';

// Login Page.
$string['signin'] = 'Connexion';
$string['signup'] = "S'inscrire";
$string['noaccount'] = 'Pas de compte?';

// Incourse Page.
$string['backtocourse'] = 'Aperçu du cours';

// Header Section.
$string['togglefullscreen'] = 'Passer en plein écran';
$string['recent'] = 'récente/récent';

// Course Stats.
$string['enrolledusers'] = 'Étudiants <br>inscrits';
$string['studentcompleted'] = 'Étudiants <br>terminés';
$string['inprogress'] = 'En <br>cours';
$string['yettostart'] = 'Mais <br>pour commencer';

// Footer Content.
$string['followus'] = 'Suivez nous';
$string['poweredby'] = 'Powered by Edwiser RemUI';

// Course Archive Page.
$string['mycourses'] = "Mes cours";
$string['allcategories'] = 'Toutes les catégories';
$string['categorysort'] = 'Trier les catégories';
$string['sortdefault'] = 'Trier (aucun)';
$string['sortascending'] = 'Trier de A à Z';
$string['sortdescending'] = 'Trier de Z à A';

// Dashboard Blocks.
$string['viewcourse'] = "VUE COURS";
$string['viewcourselow'] = "vue cours";
$string['searchcourses'] = "Rechercher des cours";

$string['hiddencourse'] = 'Cours caché';

// Usage tracking.
$string['enableusagetracking'] = "Activer le tracking d'utilisation";

$string['enableusagetrackingdesc'] = "<strong>AVIS DE SUIVI DE L'UTILISATION</strong>

<hr class='text-muted' />

<p>Edwiser collectera désormais des données anonymes pour générer des statistiques d'utilisation des produits.</p>

<p>Ces informations nous aideront à guider le développement dans la bonne direction et à faire prospérer la communauté Edwiser.</p>

<p>Cela dit, nous ne collectons pas vos données personnelles ni celles de vos étudiants au cours de ce processus. Vous pouvez désactiver cela à partir du plugin chaque fois que vous souhaitez vous désinscrire de ce service.</p>

<p>Un aperçu des données collectées est disponible <strong><a href='https://forums.edwiser.org/topic/67/anonymously-tracking-the-usage-of-edwiser-products' target='_blank'>ici</a></strong>.</p>";

$string['focusmodesettings'] = 'Paramètres du mode de mise au point';
$string['focusmode'] = 'Mode de mise au point';
$string['enablefocusmode'] = 'Activer le mode de mise au point';
$string['enablefocusmodedesc'] = 'Si activé, un bouton pour passer à l\'apprentissage sans distraction apparaîtra sur la page du cours';
$string['focusmodeenabled'] = 'Mode de mise au point activé';
$string['focusmodedisabled'] = 'Mode de mise au point désactivé';
$string['coursedata'] = 'Données du cours';

$string['prev'] = 'Précédent';
$string['next'] = 'Prochain';

// RemUI one-click update.
$string['errors'] = 'les erreurs';
$string['invalidzip'] = 'Fichier zip non valide. <b>{$a}</b>';
$string['errorfetching'] = 'Erreur lors de la récupération du fichier ZIP du plugin. <b>{$a}</b>';
$string['errorfetchingexist'] = 'Erreur lors de la récupération du fichier ZIP du plugin: l\'emplacement cible existe. <b>{$a}</b>';
$string['unabletounzip'] = 'Impossible de décompresser <b>{$a}</b>';
$string['unabletoloadplugindetails'] = 'Impossible de charger les détails du plug-in <b>{$a}</b>';
$string['requirehigherversion'] = 'Nécessite la version Moodle: <b>{$a}</b>';
$string['noupdates'] = 'Tout est à jour.';
$string['invalidjsonfile'] = 'Erreur: json non valide de la liste de produits Edwiser.';
$string['recommendation'] = 'Plugins recommandés';
$string['comeswith'] = 'Livré avec: {$a}';
$string['changelog'] = 'Changelog';
$string['currentrelease'] = 'Version actuelle: {$a}';
$string['updateavailable'] = 'Mise à jour disponible: {$a}';
$string['uptodate'] = 'À jour';

// Information center.
$string['informationcenter'] = 'Centre d\'information';

$string['nocoursefound'] = 'Aucun cours trouvé';

$string['badges'] = 'Badges';

// Course Page Settings.
$string['coursesettings'] = "Paramètres de la page du cours";
$string['enrolpagesettings'] = "Paramètres de la page d'inscription";
$string['enrolpagesettingsdesc'] = "Gérez le contenu de la page d\'inscription ici.";
$string['coursearchivepagesettings'] = "Paramètres de la page d\'archive du cours";
$string['coursearchivepagesettingsdesc'] = "Gérez la mise en page et le contenu de la page d\'archive du cours.";

$string['enrolment_payment'] = 'Paiement du cours';
$string['enrolment_payment_desc'] = "Paramètres des préférences d\'inscription aux cours. Tous les cours sont-ils payants ou certains sont-ils gratuits? Ce paramètre dicte la manière dont l\'inscription aux cours fonctionnera et sera affichée.";
$string['allrequirepayment'] = 'Tous les cours nécessitent un paiement';
$string['somearefree'] = 'Certains cours sont gratuits';
$string['allarefree'] = 'Tous les cours sont gratuits';

$string['showcoursepricing'] = 'Afficher les prix des cours';
$string['showcoursepricingdesc'] = "Activez ce paramètre pour afficher la section de tarification sur la page d\'inscription.";
$string['fullwidthcourseheader'] = 'En-tête de cours pleine largeur';
$string['fullwidthcourseheaderdesc'] = "Activez ce paramètre pour que l\'en-tête du cours soit pleine largeur.";

$string['price'] = 'Prix';
$string['course_free'] = 'LIBRE';
$string['enrolnow'] = 'Inscrivez-vous maintenant';
$string['buyand'] = 'Acheter & ';
$string['notags'] = 'Pas de balises.';
$string['tags'] = 'Balise';

$string['enrolment_layout'] = "Mise en page de la page d\'inscription";
$string['enrolment_layout_desc'] = "Activer la mise en page Edwiser pour une conception nouvelle et améliorée de la page d'inscription";
$string['disable'] = 'Désactiver';
$string['defaultlayout'] = 'Mise en page par défaut de Moodle';
$string['enable_layout1'] = 'Mise en page Edwiser';

$string['webpage'] = "Web Page";
$string['categorypagelayout'] = 'Mise en page des archives du cours';
$string['categorypagelayoutdesc'] = "Choisissez entre les mises en page des archives du cours";
$string['edwiserlayout'] = 'Mise en page Edwiser';
$string['categoryfilter'] = 'Filtre de catégorie';

$string['skill1'] = 'Débutant';
$string['skill2'] = 'Intermédiaire';
$string['skill3'] = 'Avancée';

$string['lastupdatedon'] = 'Dernière mise à jour le ';

// Plural and Singular.
$string['hourcourse'] = ' Cours heure';
$string['hourscourse'] = " Cours d\'heures";
$string['enrolledstudent'] = '  Étudiant inscrit';
$string['enrolledstudents'] = '  Étudiant inscrits';
$string['downloadresource'] = ' Ressource téléchargeable';
$string['assignment'] = ' Affectation';
$string['strcourse'] = ' Cours';
$string['strcourses'] = ' Cours';
$string['strstudent'] = ' Étudiant';
$string['strstudents'] = ' Élèves';
$string['showenrolledcourses'] = 'Afficher les cours inscrits';
$string['categoryselectionrequired'] = 'Sélection de catégorie requise.';
$string['courseoverview'] = 'Aperçu du cours';
$string['coursecontent'] = 'Le contenu des cours';
$string['startdate'] = 'Date de début';
$string['category'] = 'Catégorie';
$string['aboutinstructor'] = "À propos de l'instructeur";
$string['showmore'] = "Montre plus";
$string['coursefeatures'] = "Caractéristiques du cours";

$string['lectures'] = "Conférences";
$string['quizzes'] = "Quizzes";
$string['startdate'] = "Date de début";
$string['skilllevel'] = "Niveau de compétence";
$string['language'] = "Langue";
$string['assessments'] = "Évaluations";

// Customizer strings.
$string['customizer-migrate-notice'] = 'Les paramètres de couleur sont migrés vers le personnalisateur. Veuillez cliquer sur le bouton ci-dessous pour ouvrir le personnalisateur.';
$string['customizer-close-heading'] = 'Fermer le personnalisateur';
$string['customizer-close-description'] = 'Les modifications non enregistrées seront supprimées. Voulez-vous continuer?';
$string['reset'] = 'réinitialiser';
$string['reset-settings'] = 'Réinitialiser tous les paramètres de personnalisation';
$string['reset-settings-description'] = '<div>Les paramètres de personnalisation seront restaurés par défaut. Voulez-vous continuer?</div><div class="mt-3 font-italic"><strong>Remarque :</strong> Cela ne supprimera pas le CSS personnalisé ajouté au paramètre.<br>
Vous devez supprimer manuellement le CSS du paramètre CSS personnalisé si nécessaire.</div>';
$string['customizer'] = 'Personnalisateur';
$string['error'] = 'Erreur';
$string['resetdesc'] = "Réinitialiser le paramètre au dernier enregistrement ou par défaut lorsque rien n\'est enregistré";
$string['noaccessright'] = "Désolé! Vous n \'avez pas le droit d\' utiliser cette page";
$string['font-family'] = 'Famille de polices';
$string['font-family_help'] = 'Définir la famille de polices de {$a}';
$string['font-size'] = 'Taille de police';
$string['font-size_help'] = 'Définir la taille de police de {$a}';
$string['font-weight'] = 'Poids de la police';
$string['font-weight_help'] = 'Définissez l\'épaisseur de la police sur {$a}. La propriété font-weight définit la façon dont les caractères épais ou fins du texte doivent être affichés.';
$string['line-height'] = 'Hauteur de la ligne';
$string['line-height_help'] = 'Définir la hauteur de ligne de {$a}';
$string['global'] = 'Mondiale/Mondial';
$string['global_help'] = "Vous pouvez gérer les paramètres globaux tels que la couleur, la police, l\'en-tête, les boutons, etc.";
$string['site'] = 'Site';
$string['text-color'] = 'Couleur du texte';
$string['text-color_help'] = 'Définir la couleur du texte de {$a}';
$string['text-hover-color'] = 'Couleur de survol du texte';
$string['text-hover-color_help'] = 'Définir la couleur de survol du texte de {$a}';
$string['link-color'] = 'Couleur du lien';
$string['link-color_help'] = 'Définir la couleur du lien de {$a}';
$string['link-hover-color'] = 'Couleur de survol du lien';
$string['link-hover-color_help'] = 'Définir la couleur de survol du lien de {$a}';
$string['typography'] = 'Typographie';
$string['inherit'] = 'Hériter';
$string["weight-100"] = 'Mince 100';
$string["weight-200"] = 'Extra-léger 200';
$string["weight-300"] = 'Lumière 300';
$string["weight-400"] = 'Normale 400';
$string["weight-500"] = 'Moyen 500';
$string["weight-600"] = 'Semi-gras 600';
$string["weight-700"] = 'Gras 700';
$string["weight-800"] = 'Extra-gras 800';
$string["weight-900"] = 'Ultra-audacieux 900';
$string['text-transform'] = 'Transformation de texte';
$string['text-transform_help'] = 'La propriété text-transform contrôle la capitalisation du texte. Définissez la transformation de texte de {$a}.';
$string["default"] = 'Défaut';
$string["none"] = 'Aucun';
$string["capitalize"] = 'Capitaliser';
$string["uppercase"] = 'Majuscule';
$string["lowercase"] = 'Minuscule';
$string['background-color'] = "Couleur de l\'arrière plan";
$string['background-color_help'] = 'Définir la couleur d\'arrière-plan de {$a}';
$string['background-hover-color'] = "Couleur de survol d\'arrière-plan";
$string['background-hover-color_help'] = 'Définir la couleur de survol d\'arrière-plan de {$a}';
$string['color'] = 'Couleur';
$string['customizing'] = 'Personnalisation';
$string['savesuccess'] = 'Enregistré avec succès.';
$string['mobile'] = 'Mobile';
$string['tablet'] = 'Tablette';
$string['hide-customizer'] = 'Masquer le personnalisateur';
$string['customcss_help'] = 'Vous pouvez ajouter du CSS personnalisé. Ceci sera appliqué sur toutes les pages de votre site.';

// Customizer Global body.
$string['body'] = 'Corps';
$string['body-font-family_desc'] = "Définissez la famille de polices pour un site entier.Remarque Si défini Standard TOT Standard, la police de la police de Remui sera appliquée.";
$string['body-font-size_desc'] = "Définissez la taille de police de base pour l\'ensemble du site.";
$string['body-fontweight_desc'] = "Définissez le poids de la police pour l\'ensemble du site.";
$string['body-text-transform_desc'] = "Définissez la transformation de texte pour l\'ensemble du site.";
$string['body-lineheight_desc'] = "Définissez la hauteur de ligne pour l\'ensemble du site.";
$string['faviconurl_help'] = 'URL de Favicon';

// Customizer Global heading.
$string['heading'] = 'titre';
$string['use-custom-color'] = 'Utiliser une couleur personnalisée';
$string['use-custom-color_help'] = 'Utiliser une couleur personnalisée pour {$a}';
$string['typography-heading-all-heading'] = 'rubriques (H1 - H6)';
$string['typography-heading-h1-heading'] = 'Rubrique 1';
$string['typography-heading-h2-heading'] = 'Rubrique 2';
$string['typography-heading-h3-heading'] = 'Rubrique 3';
$string['typography-heading-h4-heading'] = 'Rubrique 4';
$string['typography-heading-h5-heading'] = 'Rubrique 5';
$string['typography-heading-h6-heading'] = 'Rubrique 6';

// Customizer Colors.
$string['primary-color'] = 'Couleur primaire';
$string['primary-color_help'] = "Appliquez la couleur principale sur l\'ensemble du site. Cette couleur sera appliquée à la marque d\'en-tête, au bouton principal, au bouton bascule du tiroir droit, au bouton aller en haut, etc. Pour l\'utiliser, vous pouvez appliquer bg-primary pour l\'arrière-plan et btn-primary pour le bouton.";
$string['page-background'] = 'Arrière-plan de la page';
$string['page-background_help'] = "Définissez l\'arrière-plan de la page personnalisé dans la zone de contenu de la page. Vous pouvez choisir la couleur, le dégradé ou l\'image. L\'angle de couleur du dégradé est de 100 degrés.";
$string['page-background-color'] = "Couleur d\'arrière-plan de la page";
$string['page-background-color_help'] = "Définissez la couleur d\'arrière-plan de la zone de contenu de la page.";
$string['page-background-image'] = "Image d\'arrière-plan de la page";
$string['page-background-image_help'] = "Définissez l\'image comme arrière-plan de la zone de contenu de la page.";
$string['gradient'] = 'Pente';
$string['gradient-color1'] = 'Dégradé de couleur 1';
$string['gradient-color1_help'] = 'Définir la première couleur du dégradé';
$string['gradient-color2'] = 'Dégradé de couleur 2';
$string['gradient-color2_help'] = 'Définir la deuxième couleur du dégradé';
$string['page-background-imageattachment'] = "Pièce jointe d\'image d\'arrière-plan";
$string['page-background-imageattachment_help'] = "La propriété background-attachment définit si une image d\'arrière-plan défile avec le reste de la page ou est fixe.";
$stirng['image'] = 'Image';
$string['additional-css'] = 'CSS supplémentaire';
$string['left-sidebar'] = 'Barre latérale de gauche';
$string['main-sidebar'] = 'Barre latérale principale';
$string['sidebar-links'] = 'Liens de la barre latérale';
$string['secondary-sidebar'] = 'Barre latérale secondaire';
$string['header'] = 'Entête';
$string['menu'] = 'Menu';
$string['site-identity'] = 'Identité du site';
$string['primary-header'] = 'En-tête principal';
$string['color'] = 'Couleur';

// Customizer Buttons.
$string['buttons'] = 'Boutons';
$string['border'] = 'Frontière';
$string['border-width'] = 'Largeur de la bordure';
$string['border-width_help'] = 'Définir la largeur de la bordure de {$a}';
$string['border-color'] = 'Couleur de la bordure';
$string['border-color_help'] = 'Définir la couleur de la bordure de {$a}';
$string['border-hover-color'] = 'Couleur de survol de la bordure';
$string['border-hover-color_help'] = 'Définir la couleur de survol de la bordure de {$a}';
$string['border-radius'] = 'Rayon de la bordure';
$string['border-radius_help'] = 'Définir le rayon de bordure de {$a}';
$string['letter-spacing'] = "L\'espacement des lettres";
$string['letter-spacing_help'] = 'Définir l\'espacement des lettres de {$a}';
$string['text'] = 'Texte';
$string['padding'] = 'Rembourrage';
$string['padding-top'] = 'Haut rembourré';
$string['padding-top_help'] = 'Définir le haut de remplissage de {$a}';
$string['padding-right'] = 'Rembourrage à droite';
$string['padding-right_help'] = 'Définir le remplissage à droite de {$a}';
$string['padding-bottom'] = 'Fond de rembourrage';
$string['padding-bottom_help'] = 'Définir le fond de remplissage de {$a}';
$string['padding-left'] = 'Rembourrage à gauche';
$string['padding-left_help'] = 'Définir le remplissage à gauche de {$a}';
$string['secondary'] = 'Secondaire';
$string['colors'] = 'Couleurs';

// Customizer Header.
$string['header-background-color_help'] = "Définissez la couleur d\'arrière-plan de l\'en-tête. La couleur d\'arrière-plan du logo de la marque sera la couleur principale. Cette couleur sera appliquée aux éléments de menu.";
$string['site-logo'] = 'Logo du site';
$string['header-menu'] = "Menu d\'en-tête";
$string['border-bottom-size'] = 'Taille inférieure de la bordure';
$string['border-bottom-size_help'] = "Définir la taille inférieure de la bordure de l\'en-tête du site";
$string['border-bottom-color'] = 'Couleur du bas de la bordure';
$string['border-bottom-color_help'] = "Définir la couleur inférieure de la bordure de l\'en-tête du site";
$string['layout-desktop'] = 'Bureau de disposition';
$string['layout-desktop_help'] = "Définir la disposition de l\'en-tête pour le bureau";
$string['layout-mobile'] = 'Mise en page mobile';
$string['layout-mobile_help'] = "Définir la disposition de l\'en-tête pour mobile";
$string['header-left'] = 'Icône gauche menu droit';
$string['header-right'] = 'Icône de droite menu de gauche';
$string['header-top'] = "Menu inférieur de l\'icône du haut";
$string['hover'] = 'Flotter';
$string['logo'] = 'Logo';
$string['applynavbarcolor'] = 'Définir la couleur du site de la barre de navigation';
$string['header-background-color-warning'] = 'Ne sera pas utilisé si <strong> Définir la couleur du site de la barre de navigation </strong> est activé.';
$string['applynavbarcolor_help'] = "La couleur principale du site sera appliquée à tout l\'en-tête. Changer la couleur principale changera la couleur d\'arrière-plan de l\'en-tête. Vous pouvez toujours appliquer une couleur de texte personnalisée et une couleur de survol aux menus d\'en-tête.";
$string['logosize'] = 'Le rapport hauteur / largeur attendu est de 130: 33 pour la vue de gauche, 140: 33 pour la vue de droite.';
$string['logominisize'] = 'Le rapport hauteur / largeur attendu est de 40:33.';
$string['sitenamewithlogo'] = 'Nom du site avec logo (vue de dessus uniquement)';

// Customizer Sidebar.
$string['link-text'] = 'Texte du lien';
$string['link-text_help'] = 'Définir la couleur du texte du lien de {$a}';
$string['link-icon'] = 'Icône de lien';
$string['link-icon_help'] = 'Définir la couleur de l\'icône du lien de {$a}';
$string['active-link-color'] = 'Couleur du lien actif';
$string['active-link-color_help'] = 'Définir une couleur personnalisée sur le lien actif de {$a}';
$string['active-link-background'] = 'Arrière-plan du lien actif';
$string['active-link-background_help'] = 'Définir une couleur personnalisée pour l\'arrière-plan du lien actif de {$a}';
$string['link-hover-background'] = 'Fond de survol du lien';
$string['link-hover-background_help'] = 'Définir l\'arrière-plan du survol du lien sur {$a}';
$string['link-hover-text'] = 'Lien texte de survol';
$string['link-hover-text_help'] = 'Définir la couleur du texte de survol du lien de {$a}';
$string['hide-dashboard'] = 'Masquer le tableau de bord';
$string['hide-dashboard_help'] = "En activant cette option, l\'élément du tableau de bord de la barre latérale sera masqué";
$string['hide-home'] = 'Masquer la maison';
$string['hide-home_help'] = "En activant cette option, l\'élément d\'accueil de la barre latérale sera masqué";
$string['hide-calendar'] = 'Masquer le calendrier';
$string['hide-calendar_help'] = "En activant cette option, l\'élément de calendrier de la barre latérale sera masqué";
$string['hide-private-files'] = 'Masquer les fichiers privés';
$string['hide-private-files_help'] = "En activant cela, l\'élément Fichiers privés de la barre latérale sera masqué";
$string['hide-my-courses'] = 'Masquer mes cours';
$string['hide-my-courses_help'] = 'En activant cette option, mes cours et les éléments de cours imbriqués de la barre latérale seront masqués';
$string['hide-content-bank'] = 'Masquer la banque de contenu';
$string['hide-content-bank_help'] = "En activant cette option, l\'élément de la banque de contenu de la barre latérale sera masqué";

// Customizer Footer.
$string['footer'] = 'Bas de page';
$string['basic'] = 'De base';
$string['advance'] = 'Avance';
$string['footercolumn'] = 'Widget';
$string['footercolumndesc'] = 'Nombre de widgets à montrer dans le pied de page.';
$string['footercolumntype'] = 'Taper';
$string['footercolumntypedesc'] = 'Vous pouvez choisir le type de widget de pied de page';
$string['footercolumnsocial'] = 'Liens des médias sociaux';
$string['footercolumnsocialdesc'] = 'Afficher les médias sociaux sélectifs';
$string['footercolumntitle'] = 'Titre';
$string['footercolumntitledesc'] = 'Ajoutez le titre à ce widget.';
$string['footercolumncustomhtml'] = 'Contenu';
$string['footercolumncustomhtmldesc'] = 'Vous pouvez personnaliser le contenu de cette version ultérieure en utilisant ci-dessous éditeur.';
$string['both'] = 'Tous les deux';
$string['footercolumnsize'] = 'Taille du widget';
$string['footercolumnsizenote'] = 'Faites glisser la ligne verticale pour régler la taille du widget.';
$string['footercolumnsizedesc'] = 'Vous pouvez définir une taille de widget individuel.';
$string['footercolumnmenu'] = 'menu';
$string['footercolumnmenudesc'] = 'Menu de liaison';
$string['footermenu'] = 'menu';
$string['footermenudesc'] = 'Ajouter un menu dans le widget de pied de page.';
$string['customizermenuadd'] = 'Ajouter un élément de menu';
$string['customizermenuedit'] = 'Modifier l\'élément de menu';
$string['customizermenumoveup'] = 'Déplacer l\'élément de menu Up';
$string['customizermenuemovedown'] = 'Déplacer l\'élément de menu vers le bas';
$string['customizermenuedelete'] = 'Supprimer l\'élément de menu';
$string['menutext'] = 'Texte';
$string['menuaddress'] = 'Adresse';
$string['menuorientation'] = 'Orientation du menu';
$string['menuorientationdesc'] = 'Définir l\'orientation du menu. L\'orientation peut être verticale ou horizontale.';
$string['menuorientationvertical'] = 'Verticale';
$string['menuorientationhorizontal'] = 'Horizontale';
$string['footershowlogo'] = 'Logo';
$string['footershowlogodesc'] = 'Montrer le logo dans le pied de page secondaire.';
$string['footersecondarysocial'] = 'Liens des médias sociaux';
$string['footersecondarysocialdesc'] = 'Afficher les liens de médias sociaux dans le pied de page secondaire.';
$string['footertermsandconditionsshow'] = 'Afficher les conditions générales';
$string['footertermsandconditions'] = 'termes et conditions';
$string['footertermsandconditionsdesc'] = 'Vous pouvez ajouter un lien pour la page Termes & Conditions.';
$string['footerprivacypolicyshow'] = 'Afficher la politique de confidentialité';
$string['footerprivacypolicy'] = 'Lien de politique de confidentialité';
$string['footerprivacypolicydesc'] = 'Vous pouvez ajouter un lien pour la page de la stratégie de confidentialité.';
$string['footercopyrightsshow'] = 'Afficher le contenu du droit d\'auteur';
$string['footercopyrights'] = 'Droits d\'auteur';
$string['footercopyrightsdesc'] = 'Ajouter Copyrights Contenu au bas de la page.';
$string['footercopyrightstags'] = 'Mots clés:<br>[site]  -  Nom du site<br>[year]  -  Année actuelle';
$string['termsandconditions'] = 'termes et conditions';
$string['privacypolicy'] = 'Politique de confidentialité';

// Customizer login.
$string['login'] = 'Connexion';
$string['panel'] = 'Panneau';
$string['page'] = 'page';
$string['loginbackgroundopacity'] = 'Opacité de fond de connexion';
$string['loginbackgroundopacity_help'] = 'Appliquez l\'opacité de la connexion de la page d\'identification de l\'image de fond.';
$string['loginpanelbackgroundcolor_help'] = 'Appliquez la couleur de fond sur le panneau de connexion.';
$string['loginpaneltextcolor_help'] = 'Appliquez la couleur du texte sur le panneau de connexion.';
$string['loginpanellinkcolor_help'] = 'Appliquez la couleur de la liaison au panneau de connexion.';
$string['loginpanellinkhovercolor_help'] = 'Appliquer la couleur de la liaison sur le panneau de connexion.';
$string['login-panel-position'] = 'Position du panneau de connexion';
$string['login-panel-position_help'] = 'Définir la position du panneau de connexion et d\'inscription';
$string['login-panel-logo-default'] = 'Logo d\'en-tête';
$string['login-panel-logo-desc'] = 'Dépend de <strong>Choisissez le format du logo du site</strong>';
$string['login-page-info'] = 'La page de connexion ne peut pas être prévisualisée dans le personnalisateur car elle ne peut être visualisée que par un utilisateur déconnecté.
Vous pouvez tester les paramètres en enregistrant et en ouvrant la page de connexion en mode incognito.';

// One click report  bug/feedback.
$string['sendfeedback'] = "Envoyer des commentaires à Edwiser";
$string['descriptionmodal_text1'] = "<p>Les commentaires vous permettent de nous envoyer des suggestions sur nos produits.Nous accueillons des rapports problématiques, des idées de fonctionnalités et des commentaires généraux.</p><p>Commencez par écrire une brève description:</p>";
$string['descriptionmodal_text2'] = "<p>Ensuite, nous vous laisserons identifier les zones de la page liées à votre description.</p>";
$string['emptydescription_error'] = "S\'il vous plaît entrer une description.";
$string['incorrectemail_error'] = "Veuillez entrer un identifiant de messagerie approprié.";

$string['highlightmodal_text1'] = "Cliquez et faites glisser sur la page pour nous aider à mieux comprendre vos commentaires.Vous pouvez déplacer cette boîte de dialogue s\'il est dans la voie.";
$string['highlight_button'] = "Zone de surbrillance";
$string['blackout_button'] = "Masquer les informations";
$string['highlight_button_tooltip'] = "Mettre en évidence les domaines pertinents pour vos commentaires.";
$string['blackout_button_tooltip'] = "Cacher toute information personnelle.";

$string['feedbackmodal_next'] = "Prenez la capture d\'écran et continuez";
$string['feedbackmodal_skipnext'] = 'Skip et continuer';
$string['feedbackmodal_previous'] = 'Retour';
$string['feedbackmodal_submit'] = 'Nous faire parvenir';
$string['feedbackmodal_ok'] = "D\'accord";

$string['description_heading'] = 'description';
$string['feedback_email_heading'] = 'E-mail';
$string['additional_info'] = 'information additionnelle';
$string['additional_info_none'] = 'None';
$string['additional_info_browser'] = 'Info du navigateur';
$string['additional_info_page'] = 'Informations';
$string['additional_info_pagestructure'] = 'Structure de page';
$string['feedback_screenshot'] = "Capture d\'écran";
$string['feebdack_datacollected_desc'] = 'Un aperçu des données collectées est disponible <strong><a href="https://forums.edwiser.org/topic/67/anonymously-tracking-the-usage-of-edwiser-products" target="_blank">ici</a></strong>.';

$string['submit_loading'] = 'Chargement...';
$string['submit_success'] = 'Merci pour votre avis.Nous valorisons chaque feuille de retour que nous recevons.';
$string['submit_error'] = "Malheureusement, une erreur s\'est produite lors de l\'envoi de vos commentaires. Veuillez réessayer.";
$string['send_feedback_license_error'] = "Veuillez activer la licence pour obtenir le support de produit.";

// Setup wizard.
$string['setupwizard'] = "Assistant de configuration";
$string['general'] = "Général";
$string['coursepage'] = "Page du cours";
$string['pagelayout'] = "Mise en page";
$string['loginpage'] = "Page de connexion";
$string['skipsetupwizard'] = "Ignorer l'assistant de configuration";
$string['setupwizardmodalmsg'] = "À un pas de l'utilisation d'Edwiser RemUI, Cliquez sur l'assistant de configuration pour personnaliser le thème, \"Annuler\" pour utiliser le paramètre par défaut.";
$string["alert"] = "Alerte";
$string["success"] = "Succès";
$string['coursesection'] = "Le contenu des cours";
$string['coursespecificlinks'] = "Navigation dans les cours";
$string['universallinks'] = 'Navigation sur le site';

// Importer.
$string['importer'] = 'Importer';
$string['importer-missing'] = 'Edwiser Site Importer plugin is missing. Please visit <a href="https://edwiser.org">Edwiser</a> site to download this plugin.';

// Notification

$string["noti_enrolandcompletion"] = 'Les mises en page Edwiser RemUI modernes et d\'aspect professionnel ont contribué de manière remarquable à augmenter l\'engagement global de vos apprenants avec <b> de {$a->enrolment} nouvelles inscriptions et {$a->completion} achèvements de cours</b> ce mois-ci';

$string["noti_completion"] = 'Edwiser RemUI a amélioré les niveaux d\'engagement de vos étudiants : vous avez un total de <b>{$a->completion} cours terminés</b> ce mois-ci';

$string["noti_enrol"] = 'Votre conception LMS est superbe avec Edwiser RemUI : vous avez <b>{$a-enrolment} nouvelles inscriptions à des cours</b> sur votre portail ce mois-ci';

$string["coolthankx"] = "Merci!";

// Languages
$string["en"] = "English";

$string['coursepagesettings'] = "Paramètres de la page du cours";
$string['coursepagesettingsdesc'] = "Paramètres liés aux cours";
$string['setthemeasdefault'] = "Définir RemUI comme thème par défaut";
$string['setthemeasdefaultwithwizard'] = "Définissez RemUI comme thème par défaut et exécutez l'assistant de configuration";
$string['setthememanually'] = "Faites-le plus tard manuellement";

$string["formsettings"] = "Paramètres des formulaires";
$string["formsdesign"] = "Conception de saisie de formulaires";
$string["formsdesigndesc"] = "Ce paramètre vous aidera à modifier la conception des éléments de formulaire";
$string["formsdesign1"] = "Conception d'éléments de formulaire 1";
$string["formsdesign2"] = "Conception d'éléments de formulaire 2";
$string["formsdesign3"] = "Conception d'éléments de formulaire 3";

$string["iconsettings"] = "Paramètres des icônes";
$string["icondesign"] = "Conception d'icônes";
$string["icondesigndesc"] = "Ce paramètre vous aidera à modifier la conception des éléments d'icône.";
$string["icondesign1"] = "Foncé";
$string["icondesign2"] = "Lumière";
$string["formgroupdesign"] = 'Conception de groupe de formulaires,';
$string["formgroupdesigndesc"] = "Ce paramètre vous aidera à modifier la conception des éléments de formulaire";

$string["formselementdesign"] = "Conception d'éléments de formulaire";
$string["formgroupdesign"] = "Conception de groupe de formulaires";


$string['logincenter'] = 'Connexion alignée au centre';
$string['loginleft'] = 'Connexion côté gauche';
$string['loginright'] = 'Connexion côté droit';

$string['enableedwfeedback'] = "Commentaires et assistance d'Edwiser";
$string['enableedwfeedbackdesc'] = "Activez Edwiser Feedback & Support, visible uniquement par les administrateurs.";
$string["checkfaq"] = "Edwiser RemUI - Consultez la FAQ";
$string["gotop"] = "Aller en haut";
$string["coursecarddesign"] = "Disposition de la carte de cours Edwiser";

$string['coursecategories'] = 'Catégories';
$string['enabledisablecoursecategorymenu'] = "Liste déroulante des catégories dans l'en-tête";
$string['enabledisablecoursecategorymenudesc'] = "Laissez cette option activée si vous souhaitez afficher le menu déroulant de la catégorie dans l'en-tête";
$string['coursecategoriestext'] = "Renommer la catégorie déroulante dans l'en-tête";
$string['coursecategoriestextdesc'] = "Vous pouvez ajouter un nom personnalisé pour la liste déroulante des catégories dans l'en-tête.";

$string['courseperpage'] = 'Cours par page';
$string['courseperpagedesc'] = "Nombre de cours à afficher dur la page d\'accueil.";
$string['none'] = 'Aucun';
$string['fade'] = 'Fondu';
$string['slide-top'] = 'Glisser dessus';
$string['slide-bottom'] = 'Glisser le fond';
$string['slide-right'] = 'Glisser vers la droite';
$string['scale-up'] = 'Scale Up';
$string['scale-down'] = 'Réduire';
$string['courseanimation'] = 'Animation carte de cours';
$string['courseanimationdesc'] = "Sélectionnez Animation de carte de cours pour qu'elle apparaisse sur la page d'archives du cours";

$string['gridview'] = 'Vue grille';
$string['listview'] = 'Affichage de liste';


$string['searchcatplaceholdertext'] = 'Chercher';
$string['versionforheading'] = '  <span class="small remuiversion">version {$a}</span>';
$string['themeversionforinfo'] = '<span>Version actuellement installée: Edwiser RemUI v{$a}</span>';
$string['hiddenlogo'] = "Désactiver";
$string['sidebarregionlogo'] = 'Sur la carte de connexion';
$string['maincontentregionlogo'] = 'Sur la région centrale';
