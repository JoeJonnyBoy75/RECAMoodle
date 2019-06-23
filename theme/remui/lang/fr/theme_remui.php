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
$string['region-side-post'] = 'Droite';
$string['region-side-pre'] = 'Droite';
$string['fullscreen'] = 'Plein écran';
$string['closefullscreen'] = 'Fermer le plein écran';
$string['licensesettings'] = 'Réglages de la Licence';
$string['edwiserremuilicenseactivation'] = 'Activation de la licence Edwiser RemUI ';
$string['overview'] = 'Aperçu';
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
        <img src="' . $CFG->wwwroot . '/theme/remui/pix/screenshot.jpg" class="w-full" alt="Edwiser RemUI screen shot" style="max-width: 100%;"/>
        </div>
        <br><br>
        <div class="text-center">
            <div class="btn-group text-center" role="group" aria-label="...">
              <div class="btn-group mr-1" role="group">
                <a href="https://edwiser.org/remui/#compatible-moodle-version" target="_blank" class="btn btn-primary btn-round">FAQ</a>&nbsp;
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
$string['presetfiles'] = 'Fichiers de préréglage de thème supplémentaires';
$string['presetfiles_desc'] = 'Les fichiers prédéfinis peuvent être utilisés pour modifier radicalement l\'apparence du thème.';
$string['preset'] = 'Thème prédéfini';
$string['preset_desc'] = 'Choisissez un préréglage pour changer le look du thème.';
$string['rawscss'] = 'SCSS brut';
$string['rawscss_desc'] = 'Utilisez ce champ pour fournir le code SCSS ou CSS qui sera injecté à la fin de la feuille de style.';
$string['rawscsspre'] = 'SCSS initial brut';
$string['rawscsspre_desc'] = 'Dans ce champ, vous pouvez fournir le code d\'initialisation SCSS, il sera injecté avant tout le reste. La plupart du temps, vous utiliserez ce paramètre pour définir des variables.';
$string['currentinparentheses'] = '(actuel)';
$string['advancedsettings'] = 'Réglages avancés';
$string['brandcolor'] = 'Couleur de la marque';
$string['brandcolor_desc'] = 'La couleur d\'accent.';

// Licence
$string['licensenotactive'] = '<strong>Attention !</strong> La licence n\'est pas activée, <strong>merci de l\'activer</strong> dans les réglages du thème RemUI.';
$string['licensenotactiveadmin'] = '<strong>Attention !</strong> La licence n\'est pas activée, <strong>merci de l\'activer</strong> <a href="'.$CFG->wwwroot.'/admin/settings.php?section=themesettingremui#remuilicensestatus" ><strong> ICI</strong></a>.';
$string['activatelicense'] = 'Activer la licence';
$string['deactivatelicense'] = 'Désactiver la licence';
$string['renewlicense'] = 'Renouveler la licence';
$string['active'] = 'Activée';
$string['notactive'] = 'N\'est pas activée';
$string['expired'] = 'Expirée';
$string['licensekey'] = 'Clef de licence';
$string['licensestatus'] = 'Status de la licence';
$string['noresponsereceived'] = 'Aucune réponse reçue du serveur. Veuillez réessayer plus tard.';
$string['licensekeydeactivated'] = 'La clef de la licence est désactivée.';
$string['siteinactive'] = 'Site inactif (Appuyez sur <i>Activer la licence</i> pour activer le thème).';
$string['entervalidlicensekey'] = 'Merci d\'entrer une clef de licence valide.';
$string['licensekeyisdisabled'] = 'Votre clef de licence est désactivée.';
$string['licensekeyhasexpired'] = "Votre clef de licence est expirée. Veuillez la renouveler.";
$string['licensekeyactivated'] = "Votre clef de licence est activée.";
$string['enterlicensekey'] = "Merci de d'entrer votre clef de licence.";

$string['activitynextpreviousbutton'] = 'Activer le bouton Activité suivante / précédente';
$string['activitynextpreviousbuttondesc'] = 'Le bouton d\'activité suivant / précédent apparaît en haut de l\'activité pour un changement rapide';
$string['disablenextprevious'] = 'Désactiver';
$string['enablenextprevious'] = 'Activer';
$string['enablenextpreviouswithname'] = 'Activer avec le nom de l\'activité';

// course
$string['nosummary'] = 'Aucun résumé n\'a été ajouté pour cette section.';
$string['defaultimg'] = 'Image par défaut 100 x 100.';
$string['choosecategory'] = 'Choisir une catégorie';
$string['allcategory'] = 'Toutes les catégories';
$string['viewcours'] = 'Afficher le cours';
$string['taught-by'] = 'Enseigné par';
$string['enroluser'] = 'Inscrire des utilisateurs';
$string['graderreport'] = 'Rapport d’niveleuse';
$string['activityeport'] = 'Rapport d’activité';
$string['editcourse'] = 'Éditer les cours';
// course sorting strings
$string['categorysort'] = 'Trier les catégories';
$string['sortdefault'] = 'Trier (aucun)';
$string['sortascending'] = 'Trier de A à Z';
$string['sortdescending'] = 'Trier de Z à A';

// Next Previous Activity
$string['activityprev'] = 'Activité précédente';
$string['activitynext'] = 'Activité suivante';

// dashboard element -> overview
$string['enabledashboardelements'] = 'Activer les éléments du tableau de bord';
$string['enabledashboardelementsdesc'] = 'Désélectionnez pour désactiver le widget personnalisé EdWiser RemUI sur le tableau de bord';
$string['totaldiskusage'] = 'Utilisation de l\'espace disque';
$string['activemembers'] = 'Utilisateur en ligne';
$string['newmembers'] = 'Nouvel utilisateur';
$string['coursesdiskusage'] = 'Espace disque utilisé par ce cours';
$string['activestudents'] = 'Apprenants actifs';

// Quick meesage
$string['quickmessage'] = 'Message';
$string['entermessage'] = 'Veuillez entrer votre message !';
$string['selectcontact'] = 'Veuillez sélectionner un contact !';
$string['selectacontact'] = 'sélectionner un contact';
$string['sendmessage'] = 'Envoyer le message';
$string['yourcontactlisistempty'] = 'Votre liste de contact est vide !';
$string['viewallmessages'] = 'Voir tous les messages';
$string['messagesent'] = 'Envoyé avec succès !';
$string['messagenotsent'] = 'Message non envoyé ! Assurez-vous d\'avoir entré la valeur correcte.';
$string['messagenotsenterror'] = 'Message non envoyé ! Quelque chose s\'est mal passé.';
$string['sendingmessage'] = 'Message en cours d\'envoi...';
$string['sendmoremessage'] = 'Envoyer d\'autre message.';

// General Seetings.
$string['generalsettings' ] = 'Paramètres généraux';
$string['navsettings'] = 'Paramétrages de navigation';
$string['colorsettings'] = 'Paramétrage des couleurs';
$string['fontsettings' ] = 'Paramétrage des polices';
$string['slidersettings'] = 'Paramétrage du carrousel';
$string['configtitle'] = 'Edwiser RemUI';

$string['dashboardsettingdesc'] = 'Les paramètres de tableau de bord auront les paramètres sur les blocs à ajouter';

// Font settings.
$string['fontselect'] = 'Sélecteur de polices';
$string['fontselectdesc'] = 'Choisissez parmi les polices standard sou les types de polices de Google pour le Web. Veuillez enregistrer votre choix pour afficher les options.';
$string['fonttypestandard'] = 'Police standard ';
$string['fonttypegoogle'] = 'Police Google pour le Web';
$string['fontnameheading'] = 'Police de titre';
$string['fontnameheadingdesc'] = 'Entrez le nom exact de la police à utiliser pour les en-têtes';
$string['fontnamebody'] = 'Police de texte';
$string['fontnamebodydesc'] = 'Entrez le nom exact de la police à utiliser pour tout autre texte';

/* Dashboard settings*/
$string['dashboardsetting'] = 'Paramétrage du tableau de bord';
$string['olddashboard'] = 'Vous avez un vieux plugin RemUI Block installé sur votre système. Pour bénéficier des nouvelles fonctionnalités et paramètres, veuillez mettre à jour votre plug-in RemUI Block avec la dernière version.';
$string['themecolor'] = 'Couleur du thème';
$string['themecolordesc'] = 'Quelle couleur générale doit être votre thème. Cela changera plusieurs composants pour proposer la couleur que vous souhaitez au travers le site Moodle.';
$string['themetextcolor'] = 'Couleur du texte';
$string['themetextcolordesc'] = 'Définir la couleur du texte.';
$string['layout'] = 'Choisir la présentation';
$string['layoutdesc'] = 'Activer la présentation avec la barre de menu supérieure fixe. (Elle apparaîtra lors du défilement vers le bas) En mode affichage standard elle reste en haut de la page.';
$string['defaultlayout'] = 'Affichage standard';
$string['fixedlayout'] = 'Menu supérieur fixe';
$string['defaultboxed'] = 'Encadrée';
$string['layoutimage'] = 'Image de fond encadrée';
$string['layoutimagedesc'] = 'Télécharger l\'image de fond à encadrer.';
$string['sidebar'] = 'Select sidebar';
$string['sidebardesc'] = 'Select sidebar style (Old / New)';
$string['rightsidebarslide'] = 'Afficher les blocs complémentaires à droite';
$string['rightsidebarslidedesc'] = 'Affichage des blocs complémentaires à droite par défaut.';
$string['leftsidebarslide'] = 'Toggle Left Sidebar';
$string['leftsidebarslidedesc'] = 'Toggle the left sidebar by default.';
$string['leftsidebarmini'] = 'Enable Left Sidebar-mini';
$string['leftsidebarminidesc'] = 'Enable the left sidebar-mini.';
$string['rightsidebarskin'] = 'Couleur de fond des blocs complémentaires à droite';
$string['rightsidebarskindesc'] = 'Changer la couleur de fond.';

/*color*/
$string['colorscheme'] = 'Choisissez une couleur de fond';
$string['colorschemedesc'] = 'Vous pouvez choisir une couleurs de fond parmi les suivantes: bleu, noir, violet, vert, jaune, bleu contrasté, noir contrasté, violet contrasté, vert contrasté & jaune contrasté. <b>Mettre en contraste</b> - Donner du contraste à votre site en faisant ressortir Les blocs de gauche.';
$string['blue'] = 'Bleu';
$string['white'] = 'Blanc';
$string['purple'] = 'Violet';
$string['green'] = 'Vert';
$string['red'] = 'Rouge';
$string['yellow'] = 'Jaune';
$string['bluelight'] = 'Bleu contrasté';
$string['whitelight'] = 'Blanc contrasté';
$string['purplelight'] = 'Violet contrasté';
$string['greenlight'] = 'Vert contrasté';
$string['redlight'] = 'Rouge contrasté';
$string['yellowlight'] = 'Jaune contrasté';
$string['custom'] = 'Personnalisée';
$string['customlight'] = 'Personnalisée et contrastée';
$string['customskin_color'] = 'Couleur de fond';
$string['customskin_color_desc'] = 'Vous pouvez choisir la couleur pour votre thème ici.';

/* Course setting*/
$string['courseperpage'] = 'Cours par page';
$string['enableimgsinglecourse'] = 'Afficher une image de section de cours.';
$string['enableimgsinglecoursedesc'] = 'décocher pour ne pas afficher l\'image de section de cours.';
$string['courseperpagedesc'] = 'Nombre de cours à afficher dur la page d\'accueil.';
$string['nocoursefound'] = 'Aucun cours trouvé';

/*logo*/
$string['logo'] = 'Logo';
$string['logodesc'] = 'Vous pouvez ajouter le logo à afficher sur l\'en-tête. Noter que la hauteur préférable est de 50px. Si vous souhaitez la personnaliser, vous pouvez le faire à partir de la section Réglages généraux : CSS personnalisée.';
$string['logomini'] = 'LogoMini';
$string['logominidesc'] = 'You may add the logomini to be displayed on the header when sidebar is collapsed. Note- Preferred height is 50px. In case you wish to customise, you can do so from the custom CSS box.';
$string['siteicon'] = 'Icône dans l\'en-tête';
$string['siteicondesc'] = 'Vous n\'avez de logo ? Vous pouvez choisir une icône à partir de cette <a href="https://fontawesome.com/v4.7.0/cheatsheet/" target="_new">liste</a>. <br /> Saisissez seulement le nom après le "fa-".';
$string['logoorsitename'] = 'Choisissez le format de votre logo de site';
$string['logoorsitenamedesc'] = 'Vous pouvez changer le logo de l\'en tête à votre guise. <br />Les options possibles sont : Logo - Seul le logo sera affiché; <br /> Icone + Nom du site - Une icône et le nom du site seront affichés.';
$string['onlylogo'] = 'Logo seulement';
$string['onlysitename'] = 'Nom du site seulement';
$string['iconsitename'] = 'Icône et nom du site';

/*favicon*/
$string['favicon'] = 'Favicon';
$string['favicondesc'] = 'Ici, Vous pouvez insérer le favicon pour votre site. <i> Pour l\'afficher tout de suite vous pouvez cocher le mode concepteur de thème.)</i>';
$string['enablehomedesc'] = 'Enable Home Desc';

/*custom css*/
$string['customcss'] = 'CSS personnalisée';
$string['customcssdesc'] = 'Les règles CSS que vous définissez ici seront ajoutées à chacune des pages, vous permettant ainsi de personnaliser facilement ce thème..';

/*google analytics*/
$string['googleanalytics'] = 'ID de suivi Google Analytics';
$string['googleanalyticsdesc'] = 'Merci d\'entrer votre code de suivi Google Analytics pour activier le suivi des visiteurs de votre site. L\'ID de suivi s\'affiche au format UA-XXXXXXXX-X.<br />
Sachez qu\'en incluant ce paramètre, vous enverrez des données à Google Analytics et assurez-vous que vos utilisateurs en sont avertis. Notre produit ne stocke aucune des données envoyées à Google Analytics.';

$string['frontpageimge'] = '';

$string['four'] = '4';
$string['eight'] = '8';
$string['twelve'] = '12';

$string['enablefrontpagecourseimg'] = 'Enable Images in Front Page Courses';
$string['enablefrontpagecourseimgdesc'] = 'Enable images in Front Page Courses Available section ';


// Social media settings
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

// Footer Section Settings
$string['footersetting'] = 'Paramétrages du pied de page';
// Footer  Column 1
$string['footercolumn1heading'] = 'Contenu de la 1ère colonne, à gauche, du pied de page.';
$string['footercolumn1headingdesc'] = 'Cette section se rapporte à la partie inférieure (colonne 1) de votre page d\'accueil.';

$string['footercolumn1title'] = 'Titre de la colonne 1 du pied de page';
$string['footercolumn1titledesc'] = 'Ajouter le titre de cette colonne.';
$string['footercolumn1customhtml'] = 'HTML personnalisé';
$string['footercolumn1customhtmldesc'] = 'Vous pouvez personnaliser le HTML de cette colonne en utilisant la zone de texte ci-dessus.';


// Footer  Column 2
$string['footercolumn2heading'] = 'Contenu de la 2ère colonne, au milieu, du pied de page.';
$string['footercolumn2headingdesc'] = 'Cette section se rapporte à la partie inférieure (colonne 2) de votre page d\'accueil.';

$string['footercolumn2title'] = 'Titre de la colonne 2 du pied de page';
$string['footercolumn2titledesc'] = 'Ajouter le titre de cette colonne.';
$string['footercolumn2customhtml'] = 'HTML personnalisé';
$string['footercolumn2customhtmldesc'] = 'Vous pouvez personnaliser le HTML de cette colonne en utilisant la zone de texte ci-dessus.';

// Footer  Column 3
$string['footercolumn3heading'] = 'Contenu de la 3ère colonne, à droite, du pied de page.';
$string['footercolumn3headingdesc'] = 'Cette section se rapporte à la partie inférieure (colonne 3) de votre page d\'accueil.';

$string['footercolumn3title'] = 'Titre de la colonne 3 du pied de page';
$string['footercolumn3titledesc'] = 'Ajouter le titre de cette colonne.';
$string['footercolumn3customhtml'] = 'HTML personnalisé';
$string['footercolumn3customhtmldesc'] = 'Vous pouvez personnaliser le HTML de cette colonne en utilisant la zone de texte ci-dessus.';

// Footer Bottom-Right Section
$string['footerbottomheading'] = 'Paramétrage de la zone basse du pied de page.';
$string['footerbottomdesc'] = 'Ici vous pouvez spécifier un lien que vous voulez afficher dans la section inférieure de pied de page';
$string['footerbottomtextdesc'] = 'Ajouter le texte en bas à droite du pied de page.';
$string['poweredbyedwiser'] = 'Élaboré par @jmd87fr en collaboration avec Edwiser';
$string['poweredbyedwiserdesc'] = 'Désélectionnez pour supprimer \'Élaboré par @jmd87fr en collaboration avec Edwiser\' de votre site.';

// Login settings page code begin.

$string['loginsettings'] = 'Paramétrages de la page de connexion.';
$string['navlogin_popup'] = 'Activer le menu de connexion dans la barre de navigation';
$string['navlogin_popupdesc'] = 'Activer le menu de connexion dans la barre de navigation dans l\'en-tête.';
$string['loginsettingpic'] = 'Télécharger l\'image de fond';
$string['loginsettingpicdesc'] = 'Télécharger une image comme de fon de la page avec le formulaire de connexion.';
$string['signuptextcolor'] = 'Couleur du texte du panneau d\'inscription';
$string['signuptextcolordesc'] = 'Sélectionnez la couleur du texte pour le panneau d\'inscription.';
$string['left'] = "Côté gauche";
$string['right'] = "Côté droit";
$string['remember_me'] = "Remember Me";
$string['brandlogopos'] = "Position du logo marque";
$string['brandlogoposdesc'] = "Si activé, le logo de la marque sera visible dans la barre latérale droite au-dessus du formulaire de connexion.";
$string['brandlogotext'] = "Description du site";
$string['brandlogotextdesc'] = "Ajoutez du texte pour la description du site qui s'affichera sur la page de connexion et d'inscription. Gardez ce champ vide si vous ne voulez pas mettre de description.";

// Login settings Page code end.

// From theme snap
$string['title'] = 'Titre';
$string['contents'] = 'Contenus';
$string['addanewsection'] = 'Créer une nouvelle section';
$string['createsection'] = 'Créer une section';

/* User Profile Page */

$string['blogentries'] = 'Entrées de blog';
$string['discussions'] = 'Discussions';
$string['discussionreplies'] = 'Réponses';
$string['aboutme'] = 'A propos de moi';

$string['addtocontacts'] = 'Ajouter un contact';
$string['removefromcontacts'] = 'Supprimer un contact';
$string['block'] = 'Bloc';
$string['removeblock'] = 'Supprimer le bloc';

$string['interests'] = 'Centres d\'intérêt';
$string['institution'] = 'Institution';
$string['location'] = 'Localisation';
$string['description'] = 'Description';

$string['commoncourses'] = 'Mes cours';
$string['editprofile'] = 'Éditer le Profil';

$string['firstname'] = 'Prénom';
$string['surname'] = 'Nom';
$string['email'] = 'Email';
$string['citytown'] = 'Ville';
$string['country'] = 'Pays';
$string['selectcountry'] = 'Choisir un pays';
$string['description'] = 'Description';

$string['nocommoncourses'] = 'Vous n\'avez pas inscrit cet utilisateur dans ce cours.';
$string['notenrolledanycourse'] = 'Vous n\'avez pas été inscrit à aucun cours.';
$string['usernotenrolledanycourse'] = '{$a} n\est pas inscrit dans aucun cours.';
$string['nobadgesyetcurrent'] = 'Vous n\'avez pas encore de badge.';
$string['nobadgesyetother'] = 'Cet utilisateur n\'a pas encore de badge.';
$string['grade'] = "Grade";
$string['viewnotes'] = "View Notes";

// User profile page js

$string['actioncouldnotbeperformed'] = 'L\'action n\'a pas pu être effectuée !';
$string['enterfirstname'] = 'Merci d\'entrer votre prénom.';
$string['enterlastname'] = 'Merci d\'entrer votre nom.';
$string['enteremailid'] = 'Merci d\'entrer votre adresse mail.';
$string['enterproperemailid'] = 'Merci d\'entrer une adresse mail existante.';
$string['detailssavedsuccessfully'] = 'Informations enregistrés avec succès!';

/* Header */

$string['startedsince'] = 'A commencé depuis ';
$string['startingin'] = 'À partir de ';

$string['userimage'] = 'Avatar de l\'utilisateur';

$string['seeallmessages'] = 'Voir tous les messages';
$string['viewallnotifications'] = 'Voir toutes les notifications';
$string['viewallupcomingevents'] = 'Voir tous les évènements à venir';

$string['youhavemessages'] = 'Vous avez {$a} nouveau(x) message(s).';
$string['youhavenomessages'] = 'Vous n\'avez pas de nouveau message.';

$string['youhavenotifications'] = 'Vous avez {$a} notifications';
$string['youhavenonotifications'] = 'Vous n\'avez pas de notifications';

$string['youhaveupcomingevents'] = 'Vous avez {$a} évènement(s) à venir.';
$string['youhavenoupcomingevents'] = 'Vous n\'avez pas d\'évènement à venir.';


/* Dashboard elements */

// Add notes
$string['addnotes'] = 'Ajouter des annotations';
$string['selectacourse'] = 'Choisir un cours';

$string['addsitenote'] = 'Ajouter une annotation de site';
$string['addcoursenote'] = 'Ajouter une annotation de cours';
$string['addpersonalnote'] = 'Ajouter une annotations sur un utilisateur ';
$string['deadlines'] = 'Dates limites';

// Add notes js
$string['selectastudent'] = 'Sélectionner un utilisateur';
$string['total'] = 'Total';
$string['nousersenrolledincourse'] = 'Il n\'y a pas utilisateur inscrit dans le cours {$a} .';
$string['selectcoursetodisplayusers'] = 'Sélectionner un cours pour afficher les utilisateurs inscrits.';


// Deadlines
$string['gotocalendar'] = 'Aller à l\'agenda';
$string['noupcomingdeadlines'] = 'Il n\'y a pas de dates limites à venir!';
$string['in'] = 'Dans';
$string['since'] = 'Depuis';

// Latest Members
$string['latestmembers'] = 'Derniers membres';
$string['viewallusers'] = 'Voir tous les utilisateurs';

// Recently Active Forums
$string['recentlyactiveforums'] = 'Derniers messages de forum';
$string['norecentlyactiveforums'] = 'Aucun forum récemment actif!';

// Recent Assignments
$string['assignmentstobegraded'] = 'Devoir à noter';
$string['assignment'] = 'Devoir';
$string['recentfeedback'] = 'Commentaires reçus récemment';

// Recent Events
$string['upcomingevents'] = 'Évènements à venir';
$string['productimage'] = 'Images produit';
$string['noupcomingeventstoshow'] = 'Aucun évènement à afficher !';
$string['viewallevents'] = 'Voir tous les évènements';
$string['addnewevent'] = 'Ajouter un nouvel évènement';

// Enrolled users stats
$string['enrolleduserstats'] = 'Statistiques sur les utilisateurs inscrits par catégories de cours';
$string['problemwhileloadingdata'] = 'Désolé, un problème s\'est produit lors du chargement des données.';
$string['nocoursecategoryfound'] = 'Il n\'y a pas de catégorie de cours sans le site.';
$string['nousersincoursecategoryfound'] = 'Il n\'y a pas utilisateur inscrit dans cette catégorie de cours.';

// Quiz stats
$string['quizstats'] = 'Statistiques sur les tentatives effectuées dans l\'activité \'test\'du cours';
$string['totalusersattemptedquiz'] = 'Nombre total d\'utilisateurs qui ont tenté l\'activité \'test\'';
$string['totalusersnotattemptedquiz'] = 'Nombre total des utilisateurs qui non pas tenté l\'activité \'test\'';

/* Theme Controller */

$string['years'] = 'année(s)';
$string['months'] = 'mois(s)';
$string['days'] = 'jour(s)';
$string['hours'] = 'heure(s)';
$string['mins'] = 'min(s)';

$string['parametermustbeobjectorintegerorstring'] = 'Le paramètre {$a} doit être un objet ou un entier ou une chaîne numérique';
$string['usernotenrolledoncoursewithcapability'] = 'Utilisateur avec la capacité non inscrit au cours ';
$string['userdoesnothaverequiredcoursecapability'] = 'L\'utilisateur n\'a pas la capacité requise dans ce cours';
$string['coursesetuptonotshowgradebook'] = 'Ce cours ne montre pas le carnet de notes aux apprenants';
$string['coursegradeishiddenfromstudents'] = 'Les notes du cours sont cachés aux apprenants';
$string['feedbackavailable'] = 'Les commentaires en feedback sont disponibles';
$string['nograding'] = 'Vous n\'avez pas de devoirs à corriger.';


/* Calendar page */
$string['selectcoursetoaddactivity'] = 'Sélectionnez un cours pour ajouter une activité';
$string['addnewactivity'] = 'Ajouter une nouvelle activité';

// Calendar page js
$string['redirectingtocourse'] = 'Redirigé vers le cours {$a} ';
$string['nopermissiontoaddactivityinanycourse'] = 'Désolé, Vous n\'avez pas la permission d\'ajouter des activités dans les cours.';
$string['nopermissiontoaddactivityincourse'] = 'Désolé, Vous n\'avez pas la permission d\'ajouter des activités dans le cours {$a} .';
$string['selectyouroption'] = 'Sélectionner votre option';


/* Blog Archive page */
$string['viewblog'] = 'Voir en entier';


/* Course js */

$string['hidesection'] = 'Réduire';
$string['showsection'] = 'Déplier';
$string['hidesections'] = 'Sections repliées';
$string['showsections'] = 'Sections dépliées';
$string['addsection'] = 'Ajouter une section';

$string['overdue'] = 'En retard';
$string['due'] = 'Due';

/* Footer headings */
$string['quicklinks'] = 'Liens rapides';

/*coruse activity navigation*/
$string['backtocourse'] = 'Aperçu du cours';
$string['sectionnotitle'] = 'Général';
$string['sectiondefaulttitle'] = 'Section';

$string['sectionactivities'] = 'Activités';
$string['showless'] = 'Show Less';
$string['showmore'] = 'Show More';
$string['allcategories'] = 'Toutes les catégories';
$string['category'] = 'Category';
$string['administrator'] = 'Administrator';
$string['badges'] = 'Badges';
$string['webpage'] = 'Web Page';
$string['contacts'] = 'Contacts';
$string['courses'] = 'Cours';
$string['preferences'] = 'Preferences';
$string['complete'] = 'Complété';
$string['start_date'] = 'Début du cours';
$string['submit'] = 'Submit';
$string['fontname'] = 'Site Font';
$string['fontnamedesc'] = 'Enter the exact name of the font to use for Moodle.';
$string['followus'] = 'Follow Us';
$string['poweredby'] = 'Powered by Edwiser RemUI';
$string['signin'] = 'Connexion';
$string['forgotpassword'] = 'Mot de passe oublié?';
$string['noaccount'] = 'No Account?';
$string['applysitewide'] = 'Apply Sitewide';
$string['applysitecolor'] = 'Appliquer la couleur du site';


// User profile page js
$string['actioncouldnotbeperformed'] = 'Action could not be performed!';
$string['enterfirstname'] = 'Please enter your First Name.';
$string['enterlastname'] = 'Please enter your Last Name.';
$string['enteremailid'] = 'Please enter your Email ID.';
$string['enterproperemailid'] = 'Please enter a proper Email ID.';
$string['detailssavedsuccessfully'] = 'Details Saved Successfully!';

/* Blog Archive page */
$string['viewblog'] = 'View full Blog';
$string['author'] = 'Author';

$string['createaccount'] = 'Here you can create a new account.';
$string['signup'] = 'Sign Up';
$string['togglesearch'] = 'Toggle Search';
$string['togglefullscreen'] = 'Toggle fullscreen';
$string['navbartype'] = 'Navbar Color';
$string['sidebarcolor'] = 'barre cote Color';
$string['sitecolor'] = 'Site Color';
$string['others'] = 'Others';
$string['today'] = 'Aujourd’hui';
$string['yesterday'] = 'Yesterday';
$string['you_do_not_have_permission_to_perform_this_action'] = 'You do not have permission to perform this action';
$string['viewallcourses'] = 'View All Courses';
$string['readmore'] = 'READ MORE';
$string['aboutremui'] = 'About Edwiser RemUI';

$string['remuisettings'] = 'RemUI Settings';
$string['createanewcourse'] = 'Create A New Course';
$string['createarchivepage'] = 'Liste des cours';
$string['siteblog'] = 'Site Blog';
$string['selectcategory'] = 'Select Category';
$string['nocoursesavail'] = 'Sorry! No courses available at the moment.';
$string['norecentfeedback'] = 'Aucun commentaire récent';

$string['loadmore'] = 'Charger plus';

// news and updates tab
$string['newsandupdates'] = 'News & Updates';
$string['newupdatemessage'] = 'New Update Available for RemUI.';
$string['currentversionmessage'] = 'Your current version is ';
$string['downloadupdate'] = 'Download Update';
$string['latestversionmessage'] = 'You are using the latest version of RemUI.';
$string['rateremui'] = 'Rate RemUI';
$string['fullname']  = 'Full Name';
$string['providefeedback'] = 'Please provide your feedback about RemUI';
$string['sendfeedback'] = 'Send Feedback';
$string['recentnews'] = 'Recent News';

/* Grey Box Image Home Page */
$string['frontpageblockimage'] = 'Télécharger une image';
$string['frontpageblockimagedesc'] = 'Vous pouvez télécharger une image en tant que contenu pour cela.';

/* My Course Page */
$string['resume'] = 'Continuer';
$string['start'] = 'Commencer';
$string['completed'] = 'Terminé';

/* Dashboard Page */
$string['welcome-msg'] = 'Bienvenue dans votre tableau de bord';
$string['coursecompleted'] = 'COURS TERMINÉS';
$string['activitycompleted'] = 'ACTIVITÉS TERMINÉES';
$string['enrolledcourses'] = 'COURS INSCRITS';
$string['courseactivities'] = 'ACTIVITÉS DE COURS';
$string['noevents'] = "Aucun événement dû";
$string['overdue'] = "impayé";
$string['upcoming'] = "prochain";
$string['expired'] = 'Expiré';
$string['selectcourse'] = "Sélectionnez un cours";
$string['courseanlytics'] = "Analyse de cours";
$string['highestgrade'] = "LE PLUS ÉLEVÉ GRADE";
$string['lowestgrade'] = "LE PLUS BAS GRADE";
$string['averagegrade'] = "MOYENNE GRADE";
$string['viewcourse'] = "VUE COURS";
$string['mycourses'] = "Mes cours";
$string['tasks'] = "Tâches à compléter";
$string['coursestats'] = "Stats du cours";
$string['allActivities'] = "Toutes les activités";

/* Footer Setting */
$string['footerbottomtext'] = 'Texte en bas à gauche du pied de page';
$string['footerbottomlink'] = 'Lien en bas à gauche Du pied de page';
$string['footerbottomlinkdesc'] = 'Entrez le lien en bas à gauche du pied de page. Par exemple http://www.monblog.fr';

$string['enableannouncement'] = "Enable Site Announcement";
$string['enableannouncementdesc'] = "Enable a sitewide announcement for site visitors/students.";
$string['announcementtext'] = "Announcement";
$string['announcementtextdesc'] = "Announcement message to be displayed sitewide.";
$string['announcementtype'] = "Announcement type";
$string['announcementtypedesc'] = "info/alert/danger/success";
$string['typeinfo'] = "Information announcement";
$string['typedanger'] = "Urgent announcement";
$string['typewarning'] = "Warning announcement";
$string['typesuccess'] = "Success announcement";

// Teacher Dashboard Strings
$string['courseprogress'] = "Cours Le progrès";
$string['course'] = "Cours";
$string['startdate'] = "Date de début";
$string['enrolledstudents'] = "Élèves";
$string['progress'] = "Progrès";
$string['name'] = "Nom";
$string['status'] = "Statut";
$string['back'] = "Arrière";

// Dashboard Edwiser Remui Blocks
$string['courseprogressblock'] = 'Progression du cours Bloc';
$string['enrolledusersblock'] = 'Inscrire Utilisateurs Bloc';
$string['quizattemptsblock'] = 'Quiz Tentatives Bloc';
$string['courseanlyticsblock'] = 'Analyse de cours Bloc';
$string['latestmembersblock'] = 'Derniers membres Bloc';
$string['addnotesblock'] = 'Ajouter des notes Bloc';
$string['recentfeedbackblock'] = 'Récent retour d\'information Bloc';
$string['recentforumsblock'] = 'Récent Forums Bloc';

$string['courseprogressblockdesc'] = 'Activer Progression du cours Bloc ';
$string['enrolledusersblockdesc'] = 'Activer Inscrire Utilisateurs Bloc';
$string['quizattemptsblockdesc'] = 'Activer Quiz Tentatives Bloc';
$string['courseanlyticsblockdesc'] = 'Activer Analyse de cours Bloc';
$string['latestmembersblockdesc'] = 'Activer Derniers membres Bloc';
$string['addnotesblockdesc'] = 'Activer Ajouter des notes Bloc';
$string['recentfeedbackblockdesc'] = 'Activer Récent retour d\'information Bloc';
$string['recentforumsblockdesc'] = 'Activer Récent Forums Bloc';

$string['recentactivityblock'] = 'Activités récentes Block';
$string['recentactivityblockdesc'] = "Si activé, Bloc d'activités récentes sera visible sur le tableau de bord";

$string['enablerecentcourses'] = 'Activer les cours récents';
$string['enablerecentcoursesdesc'] = "Si cette option est activée, le menu déroulant des cours récents s'affichera dans l'en-tête.";

$string['enablecoursestats'] = 'Activer les statistiques du cours';
$string['enablecoursestatsdesc'] = "Si cette option est activée, l'administrateur, les gestionnaires et l'enseignant verront les statistiques relatives à la page du cours.";
$string['enabledictionary'] = 'Activer le dictionnaire';
$string['enabledictionarydesc'] = "Si activé, la fonction Dictionnaire sera activée et affichera la signification du texte sélectionné dans l'info-bulle.";
$string['more'] = 'Plus...';
$string['coursedescimage'] = "Généraux section l'image Paramètres";
$string['coursedescimagedesc'] = "If enabled, Si cette option est activée, l'image de fond de la description de la section générale sera extraite de la description du résumé du cours ( Par défaut première image ) sinon, il sera récupéré à partir de Fichiers de résumé de cours.";

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
$string['privacy:metadata:preference:course_view_state'] = 'Le type d\'affichage que l\'utilisateur préfère pour la liste des cours';
$string['course_view_state_description_grid'] = 'Pour afficher les cours en format de grille';
$string['course_view_state_description_list'] = 'Pour afficher les cours en format de liste';

/* Course view preference */
$string['privacy:metadata:preference:viewCourseCategory'] = 'Le type d\'affichage que l\'utilisateur préfère pour la liste des cours';
$string['viewCourseCategory_grid'] = 'Pour afficher les cours en format de grille';
$string['viewCourseCategory_list'] = 'Pour afficher les cours en format de liste';

/* Aside right view preference */
$string['privacy:metadata:preference:aside_right_state'] = 'Si le bloc de côté à droite doit rester ouvert ou amarré';
$string['aside_right_state_'] = 'Pour afficher le bloc de côté à droite comme ouvert'; // blank value
$string['aside_right_state_overrideaside'] = 'Pour afficher le bloc de côté à droite comme ancré'; // overrideaside

/* Menu view preference */
$string['privacy:metadata:preference:menubar_state'] = 'Le type d\'affichage que l\'utilisateur préfère pour la barre de menus';
$string['menubar_state_fold'] = 'Pour afficher la barre de menus comme pliée';
$string['menubar_state_unfold'] = 'Pour afficher la barre de menus comme dépliée';
$string['menubar_state_open'] = 'Pour afficher la barre de menus comme ouverte';
$string['menubar_state_hide'] = 'Pour afficher la barre de menus comme masquée';
$string['recent'] = 'Récent';

$string['enableheaderbuttons'] = 'Show header buttons in dropdown';
$string['enableheaderbuttonsdesc'] = 'All the buttons which are displayed in header are converted to a single dropdown.';
$string['sidebarpinned'] = 'Sidebar pinned.';
$string['sidebarunpinned'] = 'Sidebar unpinned.';
$string['pinsidebar'] = 'Pin sidebar';
$string['unpinsidebar'] = 'Unpin sidebar';
$string['mergemessagingsidebar'] = 'Panneau fusionner les messages';
$string['mergemessagingsidebardesc'] = 'Fusionner le panneau de messages dans la barre latérale droite';

// Course Stats
$string['enrolstudents'] = 'Étudiants <br>inscrits';
$string['studentcompleted'] = 'Étudiants <br>terminés';
$string['inprogress'] = 'En <br>cours';
$string['yettostart'] = 'Mais <br>pour commencer';

$string['none'] = 'Aucun';
$string['fade'] = 'Fondu';
$string['slide-top'] = 'Glisser dessus';
$string['slide-bottom'] = 'Glisser le fond';
$string['slide-right'] = 'Glisser vers la droite';
$string['slide-left'] = 'Glisser à gauche';
$string['slide-left-right'] = 'Alternate: Glisser à gauche et Glisser à droite';
$string['scale-up'] = 'Scale Up';
$string['scale-down'] = 'Réduire';
$string['courseanimation'] = 'Animation du cours';
$string['courseanimationdesc'] = 'Activer ceci ajoutera une animation aux cours dans la page d\'archive de cours';
$string['enablenewcoursecards'] = 'Activer les nouvelles cartes de cours';
$string['enablenewcoursecardsdesc'] = 'Activer ceci affichera les nouvelles fiches de cours sur la page d\'archives de cours';
$string['publishfrontpage'] = 'Publier';
$string['sectiondelete'] = 'Cette section sera définitivement supprimée dans 30 secondes, annulez pour éviter tout changement.';
$string['undo'] = 'Annuler dans';
$string['frontpageheadercolor'] = 'Couleur de l\'en-tête de la page d\'accueil';
$string['frontpageheadercolordesc'] = 'Si l\'en-tête est transparent, la couleur choisie sera appliquée à l\'en-tête de la page.';
$string['frontpagetransparentheader'] = 'Tête de page transparente';
$string['frontpagetransparentheaderdesc'] = 'Lorsque le curseur est la première section de la page d\'accueil, l\'en-tête apparaîtra comme transparent.';
$string['frontpageappearanimation'] = 'Section apparaissent animation';
$string['frontpageappearanimationdesc'] = 'Activez cette option pour activer l’apparence de l’animation pour les sections.';
$string['frontpageappearanimationstyle'] = 'Apparaître style d\'animation';
$string['frontpageappearanimationstyledesc'] = 'Choisissez le style d\'animation pour la section.';
$string['migratorheader'] = 'Migrateur';
$string['migrate'] = 'Émigrer';
$string['migratormessge'] = '<p> Bienvenue dans le tout nouveau design de la page d’accueil d’Edwiser Remui. Nous avons constaté que vos paramètres de page d\'accueil étaient anciens. Aimez-vous migrer ces paramètres? </P> <p> <strong> Migrer </strong>: de nouveaux blocs seront créés à partir d\'anciens paramètres. </Br> <strong> Annuler </strong>: vous pouvez créer une page d\'accueil. manuellement et ce message ne s\'affichera plus. </p>';
$string['sectionupdated'] = 'Section mise à jour avec succès. Publier pour appliquer les modifications.';
$string['sectiondeleted'] = 'Section supprimée avec succès. Publier pour appliquer les modifications.';

// Slider Section
$string['noofslides'] = 'Nombre de diapositives';
$string['slideheading'] = "Titre de la diapositive";
$string['slideheadingplaceholder'] = 'Entrez le titre de la diapositive ici';
$string['slidedescription'] = "Description de la diapositive";
$string['slidedescriptionplaceholder'] = 'Entrez la description de la diapositive ici';
$string['btnlabel'] = 'Étiquette du bouton';
$string['btnlink'] = 'Lien bouton';
$string['missingslide'] = 'Veuillez télécharger une image ou une vidéo';
$string['slideintervalplaceholder'] = 'Nombre entier positif en millisecondes.';
$string['slideintervaldesc'] = 'You may set the transition time between the slides. In case if there is one slide, this option will have no effect. If interval is invalid(empty|0|less than 0) then default interval is 5000 milliseconds.';


// Contact Section
$string['contactlink'] = 'Lien de contact';
$string['contactus'] = 'Contactez nous';
$string['contactplaceholder'] = 'Entrez les détails du contact, cela peut être quelque chose comme email ou téléphone';
$string['missingcontactlink'] = 'Lien de contact manquant';
$string['titleplaceholder'] = 'Entrez le titre ici';
$string['missingtitle'] = 'Titre manquant';
$string['descriptionplaceholder'] = 'Entrez la description ici';
$string['contactlabelplaceholder'] = 'Entrez l\'étiquette, par exemple Email, téléphone, etc.';
$string['missingdescription'] = 'Description manquante';
$string['socialview'] = 'Icons Voir';
$string['quora'] = 'Quora';
$string['google'] = 'Google';
$string['youtube'] = 'Youtube';
$string['twitter'] = 'Twitter';
$string['facebook'] = 'Facebook';
$string['linkedin'] = 'Linkedin';
$string['pinterest'] = 'Pinterest';
$string['instagram'] = 'Instagram';


// General Strings
$string['sectionpadding'] = 'Rembourrage de section en pixel';
$string['sectionsetting'] = 'Paramètres de section';
$string['sectionbackground'] = 'Image de fond de la section';
$string['bgcolor'] = 'Couleur de fond';
$string['bgfixed'] = 'Arrière-plan fixe';
$string['bgopacity'] = 'Opacité du fond';
$string['nobgfixed'] = 'Fond non fixé';
$string['textbold'] = 'Audacieux';
$string['textitalic'] = 'Italique';
$string['titleeditor'] = 'Éditeur';
$string['fontsize'] = 'Taille de police';
$string['textunderline'] = 'Souligner';
$string['color'] = 'Couleur';
$string['editingison'] = 'Mode d\'édition activé';
$string['fullwidth'] = 'Pleine largeur';
$string['container'] = 'Conteneur Largeur Fixe';
$string['shadowless'] = 'Éléments de section Shadow';
$string['shadowcolor'] = 'Section Ombre Couleur';
$string['shadowlessdesc'] = 'Activez cette option pour ajouter une ombre aux éléments de la section';
$string['contactlabel'] = "Étiquette de contact";
$string['link'] = 'Lien';
$string['linklabel'] = 'Étiquette de lien';
$string['phone'] = 'Numéro de contact';

// Section list string
$string['slidersection'] = "Section coulissante";
$string['aboutussection'] = "Qui sommes nous?";
$string['contactsection'] = "Section de contact";
$string['featuresection'] = "Section caractéristique";
$string['coursessection'] = "Section des cours";
$string['teamsection'] = "Section d'équipe";
$string['testimonialsection'] = "Section témoignage";
$string['htmlsection'] = "Section HTML";
$string['separatorsection'] = "Section de séparation";


// Slider Section
$string['textalign'] = 'Alignement du texte';
$string['desccolor'] = 'Description Couleur';
$string['headingcolor'] = 'Couleur de titre';
$string['enablenav'] = 'Flèches de navigation';

$string['nonav'] = 'Pas de flèches de navigation';
$string['navarrows'] = 'Flèches de navigation par défaut';
$string['navarrowscircle'] = 'Flèches de navigation avec fond circulaire';
$string['navarrowssquare'] = 'Flèches de navigation avec fond carré';

// Team Section
$string['meetourteam'] = 'Rencontrez notre équipe';
$string['rows'] = 'Nombre de rangées';
$string['members'] = 'Nombre de membres';
$string['quote'] = 'Entrer un devis';
$string['teammembernameplaceholder'] = "Entrez le nom du membre de l'équipe ici";
$string['teammemberquoteplaceholder'] = "Entrez la citation d'un membre de l'équipe ici";

// Feature Section
$string['feature'] = 'Fonctionnalité';
$string['features'] = 'Nombre de fonctionnalités';
$string['featurenameplaceholder'] = 'Entrez fonctionnalité ici';
$string['missingname'] = 'Nom manquant';
$string['featureiconplaceholder'] = 'Entrez l\'icône de la fonctionnalité ici';
$string['missingicon'] = 'Icône manquante';
$string['colorhex'] = 'Valeur hexadécimale pour la couleur';

// Courses section
$string['all'] = 'Tout';
$string['allcourses'] = 'Tous les cours';
$string['future'] = 'Futur';
$string['coursessectioninprogress'] = 'En cours';
$string['past'] = 'Passé';
$string['coursecategoriesplaceholder'] = 'Recherchez la catégorie de cours ici';
$string['categories'] = 'Les catégories';
$string['categoryandcourses'] = 'Catégorie et cours';
$string['hiddencategory'] = 'Catégorie cachée';

// Testimonial Section
$string['testimonials'] = 'Nombre de témoignages';
$string['testimonial'] = 'Témoignage';
$string['testimonialplaceholder'] = "Entrez le témoignage de la personne ici";
$string['missingtestimonial'] = 'Témoignage manquant';
$string['designation'] = 'La désignation';
$string['designationplaceholder'] = "Entrez la désignation de la personne ici";
$string['borderradius'] = 'Rayon de la frontière';
$string['noradius'] = 'Aucun rayon de frontière';
$string['px'] = '  Pixel';
$string['fullnameplaceholder'] = "Entrez le nom complet de la personne ici";
$string['namecolor'] = 'Couleur du champ Nom de l\'auteur';
$string['namecolordesc'] = 'Cette couleur sera appliquée à tous les Fullname Text';
$string['designationcolor'] = 'Couleur du champ de désignation';
$string['designationcolordesc'] = 'Cette couleur sera appliquée à tous les textes de désignation.';
$string['testimonialcolor'] = 'Témoignage sur le terrain';
$string['testimonialcolordesc'] = 'Cette couleur sera appliquée à tout le texte du témoignage.';
$string['testimonialproperties'] = 'Propriétés du texte pour le témoignage';
$string['testimonialpropertiesdesc'] = 'Ces propriétés seront appliquées à tous les témoignages d’auteurs.';
$string['backgroundstyle'] = 'Style d\'arrière-plan témoignage';
$string['solidcolor'] = 'Solide';
$string['gradientcolor'] = 'Pente';
$string['testimonialcolor1'] = 'Si le style d\'arrière-plan est uni, cette couleur sera appliquée à l\'ensemble du témoignage. Si le style d\'arrière-plan est dégradé, il s\'agira de la première couleur.';
$string['testimonialcolor2'] = 'Ce sera la deuxième couleur pour l\'arrière-plan de témoignage.';
$string['layout1'] = 'Disposition 1';
$string['layout2'] = 'Disposition 2';

// Edit Menu
$string['edit'] = 'modifier';
$string['moveup'] = 'Déplacer vers le haut';
$string['movedown'] = 'Descendre';
$string['hide'] = 'Cacher';
$string['show'] = 'Spectacle';
$string['delete'] = 'Effacer';

// HTML Section
$string['blocks'] = 'Nombre de blocs';
$string['cssstyle'] = 'Styles CSS';
$string['cssstyleplaceholder'] = 'Entrez les styles css ici. Les changements en direct seront reflétés dans l\'éditeur. Ex:
div {
    border: 2px dashed #ccc;
}
';
$string['htmldefaultcontent'] = 'Mettez votre contenu ici';
$string['applyfilter'] = 'Appliquer des filtres';
$string['applyfilterdesc'] = 'Appliquez des filtres moodle sur le contenu avant d\'afficher la section.';

// Separator Section
$string['separatorstyle'] = 'Style séparateur';
$string['separatorsolid'] = 'Solide';
$string['separatordouble'] = 'Double';
$string['separatordashed'] = 'En pointillés';
$string['separatordotted'] = 'À pois';
$string['separatorblur'] = 'Brouiller';
$string['separatorblurend'] = 'Flou fin';
$string['separatorgradient'] = 'Pente';
$string['separatorwidth'] = 'Largeur en pourcentage';
$string['separatorheight'] = 'la taille';
$string['separatorresult'] = 'Résultat';

// About us section
$string['aboutus'] = 'À propos de nous';
$string['aboutusblock'] = 'À propos de nous bloquer';
$string['view'] = 'Vue';
$string['icon'] = 'Icône (<a href="https://fontawesome.com/v4.7.0/cheatsheet/" target="_new">Font-Awesome</a>)';
$string['aboutusicondesc'] = 'Vous pouvez choisir n\'importe quelle icône de cette <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_new">list</a>. Il suffit d\'entrer le texte après "fa-".';
$string['backgroudimage'] = 'Image de fond';
$string['rowview'] = "Rangée";
$string['gridview'] = "la grille";
$string['columnview'] = 'Colonne';
$string['clickhere'] = 'Cliquez ici';
$string['btnlink'] = "Lien bouton";
$string['btnlinkplaceholder'] = 'Entrez le lien du bouton ici';
$string['btnlabel'] = "Étiquette du bouton";
$string['btnlabelplaceholder'] = 'Entrez l\'étiquette du bouton ici';
$string['colorhex'] = 'Couleur (code hexadécimal)';
$string['colorhexdesc'] = 'Cliquez sur la case ci-dessus pour choisir la couleur';
$string['blockbackground'] = 'Bloquer le fond';
$string['transparent'] = 'Transparent';
$string['noborder'] = 'Pas de frontière';
$string['border'] = 'Bordé';
$string['cardradius'] = 'Rayon de la carte';

// Frontpage old string

$string['homepagesettings'] = 'Paramétrage de la page d\'accueil';

$string['frontpagedesign'] = 'Design Frontpage';
$string['frontpagedesigndesc'] = 'Cette section concerne le style de conception de la page d\'accueil.';
$string['frontpagechooser'] = 'Choisissez le design de la page d\'accueil';
$string['frontpagechooserdesc'] = 'Choisissez votre design de page d\'accueil.';
$string['frontpagedesignold'] = 'Ancienne conception par défaut';
$string['frontpagedesignolddesc'] = 'Tableau de bord par défaut comme ci-dessus.';
$string['frontpagedesignnew'] = 'Nouveau design';
$string['frontpagedesignnewdesc'] = 'Nouveau design avec plusieurs sections. Vous pouvez configurer les sections individuellement sur Frontpage.';
$string['newhomepagedescription'] = 'Cliquez sur "Site Home" dans la barre de navigation pour aller à "Homepage Builder" et créer votre propre page d\'accueil';
$string['frontpageloader'] = 'Télécharger l\'image du chargeur pour Frontpage';
$string['frontpageloaderdesc'] = 'Ceci remplace le chargeur par défaut avec votre image';

/*theme_remUI_frontpage*/

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
$string['uploadimagedesc'] = 'Vous pouvez télécharger l\'image en tant que contenu pour la diapositive';
$string['video'] = 'Code iframe intégré';
$string['videodesc'] = ' Ici, vous pouvez insérer le code iframe intégré de la vidéo qui doit être incorporée.';
$string['contenttype'] = 'Sélectionner le type de contenu';
$string['contentdesc'] = 'Vous pouvez choisir l\'image ou donner l\'URL de vidéo.';
$string['imageorvideo'] = 'Image / Vidéo';
$string['image'] = 'Image';
$string['videourl'] = 'URL de la Video';

$string['slidercount'] = 'Nombre de diapositive';
$string['slidercountdesc'] = '';
$string['one'] = '1';
$string['two'] = '2';
$string['three'] = '3';
$string['five'] = '5';

$string['slideimage'] = 'Téléchargez des images pour le carrousel.';
$string['slideimagedesc'] = 'Vous pouvez télécharger une image en tant que contenu pour cette diapositive.';
$string['slidertext'] = 'Ajouter du texte à la diapositive.';
$string['defaultslidertext'] = '';
$string['slidertextdesc'] = 'Vous pouvez insérer le texte du contenu de cette diapositive. De préférence en HTML.';
$string['sliderurl'] = 'Ajouter un lien au bouton de la diapositive.';
$string['sliderbuttontext'] = 'Ajouter du texte sur le bouton de la diapositive.';
$string['sliderbuttontextdesc'] = 'Vous pouvez ajouter du texte sur le bouton de la diapositive.';
$string['sliderurldesc'] = 'Vous pouvez insérer le lien de la page vers laquelle l\'utilisateur sera redirigé en cliquant sur le bouton.';
$string['slideinterval'] = 'Intervalle entre les diapositives.';
$string['slideintervaldesc'] = 'Vous pouvez définir le temps de transition entre les diapositives. Dans le cas où il y a qu\'une diapositive, cette option n\'aura aucun effet.';
$string['sliderautoplay'] = 'Définir la lecture automatique du diaporama.';
$string['sliderautoplaydesc'] = 'Sélectionner ‘oui’ Si vous voulez une transition automatique dans votre diaporama.';
$string['true'] = 'Oui';
$string['false'] = 'Non';

$string['frontpageblocks'] = 'Contenu du corps de la page d\'accueil';
$string['frontpageblocksdesc'] = 'Vous pouvez définir 4 sections markéting';

$string['enablesectionbutton'] = 'Activer les boutons sur les sections markéting';
$string['enablesectionbuttondesc'] = 'Activer les boutons sur le corps des sections markéting.';

/* General section descriptions */
$string['frontpageblockiconsectiondesc'] = 'Vous pouvez choisir une icône à partir de cette <a href="https://fontawesome.com/v4.7.0/cheatsheet/" target="_new">liste</a>. <br /> Saisissez seulement le nom après le "fa-". ';
$string['frontpageblockdescriptionsectiondesc'] = 'Une courte description.';
$string['defaultdescriptionsection'] = 'Approfondir de façon holistique les technologies \'just in time\' via des scénarios d\'entreprise..';
$string['sectionbuttontextdesc'] = 'Entrer le texte du bouton de cette section markéting.';
$string['sectionbuttonlinkdesc'] = 'Entrer l\'URL en lien avec cette section markéting.';
$string['frontpageblocksectiondesc'] = 'Ajouter un titre à cette section markéting.';

/* block section 1 */
$string['frontpageblocksection1'] = 'Titre de la 1ère section';
$string['frontpageblockdescriptionsection1'] = 'Description de la 1ère section';
$string['frontpageblockiconsection1'] = 'Icône Font-Awesome pour la 1ère section';
$string['sectionbuttontext1'] = 'Texte du bouton de la 1ère section';
$string['sectionbuttonlink1'] = 'URL du lien de la 1ère section';


/* block section 2 */
$string['frontpageblocksection2'] = 'Titre de la 2ème section';
$string['frontpageblockdescriptionsection2'] = 'Description de la 2ème section';
$string['frontpageblockiconsection2'] = 'Icône Font-Awesome pour la 2ème section';
$string['sectionbuttontext2'] = 'Texte du bouton de la 2ème section';
$string['sectionbuttonlink2'] = 'URL du lien de la 2ème section';


/* block section 3 */
$string['frontpageblocksection3'] = 'Titre de la 3ème section';
$string['frontpageblockdescriptionsection3'] = 'Description de la 3ème section';
$string['frontpageblockiconsection3'] = 'Icône Font-Awesome pour la 3ème section';
$string['sectionbuttontext3'] = 'Texte du bouton de la 3ème section';
$string['sectionbuttonlink3'] = 'URL du lien de la 3ème section';


/* block section 4 */
$string['frontpageblocksection4'] = 'Titre de la 4ème section';
$string['frontpageblockdescriptionsection4'] = 'Description de la 4ème section';
$string['frontpageblockiconsection4'] = 'Icône Font-Awesome pour la 4ème section';
$string['sectionbuttontext4'] = 'Texte du bouton de la 4ème section';
$string['sectionbuttonlink4'] = 'URL du lien de la 4ème section';

// Capability String
$string['remui:editfrontpage'] = 'Modifier la page d\'accueil';

// Frontpage Aboutus settings
$string['frontpageaboutus'] = 'Front Page À propos de nous';
$string['frontpageaboutusdesc'] = 'Cette section présente le texte de <i>A propos de nous</i> sur la page d\'accueil.';
$string['frontpageaboutustitledesc'] = 'Ajouter un titre à la section À propos de nous';
$string['frontpageaboutusbody'] = 'Description corporelle pour la section À propos de nous';
$string['frontpageaboutusbodydesc'] = 'Une brève description de cette section';

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
$string['frontpageaboutusimage'] = 'Image sur la page d\'accueil de la section <i>A propos de nous</i>.';
$string['frontpageaboutusimagedesc'] = 'Télécharger l\'image de la section <i>A propos de nous</i> sur la page d\'accueil.';

// latest 3.3 to be arranged later
$string['testimonialcount'] = 'Testimonial Count';
$string['testimonialcountdesc'] = 'Number of testimonials to show.';
$string['testimonialimage'] = 'Testimonial Image';
$string['testimonialimagedesc'] = 'Person image to display with testimonial';
$string['testimonialname'] = 'Person Name';
$string['testimonialnamedesc'] = 'Name of person';
$string['testimonialdesignation'] = 'Person Designation';
$string['testimonialdesignationdesc'] = 'Person\'s designation.';
$string['testimonialtext'] = 'Person\'s Testimonial';
$string['testimonialtextdesc'] = 'What person says';


/*Front Page Setting for About Us Block*/
$string['frontpageblockdisplay'] = 'À propos de nous section';
$string['frontpageblockdisplaydesc'] = "Vous pouvez afficher ou masquer la section 'A propos de nous', vous pouvez également l'afficher en format de grille";
$string['donotshowaboutus'] = 'Ne pas montrer';
$string['showaboutusinrow'] = 'Afficher la section dans une rangée';
$string['showaboutusingridblock'] = 'Afficher la section dans le bloc de grille';
