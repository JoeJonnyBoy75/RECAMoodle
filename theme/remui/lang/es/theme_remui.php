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
$string['region-side-post'] = 'Derecha';
$string['region-side-pre'] = 'Derecha';
$string['fullscreen'] = 'Pantalla Completa';
$string['closefullscreen'] = 'Cerrar Pantalla Completa';
$string['licensesettings'] = 'Configuración de licencia';
$string['edwiserremuilicenseactivation'] = 'Edwiser RemUI Activación de Licencia';
$string['overview'] = 'Revision';
$string['choosereadme'] = '
<div class="about-remui-wrapper text-center">
    <div class="about-remui m-auto" style="max-width: 1000px;">
        <h1 class="text-center">Bienvenido a Edwiser RemUI</h1><br>
        <h4 class="text-muted">
        Edwiser RemUI es la nueva revolución en experiencia de Moodle. Ha sido diseñado para mejorar el aprendizaje con
		diseños personalizados y navegación simplificada.<br><br>
        Estamos seguros que te gustara el look remodelado!
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
                <a href="https://edwiser.org/remui/documentation/" target="_blank" class="btn btn-primary btn-round">Documentación</a>&nbsp;
              </div>
              <div class="btn-group" role="group">
                <a href="https://edwiser.org/contact-us/" target="_blank" class="btn btn-primary btn-round">Soporte</a>
              </div>
            </div>
        </div>
        <br>
        <h1 class="text-center">Personalice Su Tema</h1>
        <h4 class="text-muted text-center">
			Sabemos que ningún LMS es igual. Trabajaremos con usted para comprender sus necesidades, y diseñar y desarrollar una solución que satisfaga sus objetivos.
        </h4>
        <br><br>
        <div class="row wdm_generalbox">
            <div class="marketing-spots span3 col-lg-6 col-12">
                <div class="iconsquare">
                    <i class="fa fa-cogs"></i>
                </div>
                <div class="iconbox-content">
                    <h4>Personalización del Tema</h4>
                </div>
            </div>
            <div class="marketing-spots span3 col-lg-6 col-12">
                <div class="iconsquare">
                    <i class="fa fa-edit"></i>
                </div>
                <div class="iconbox-content">
                    <h4>Diseño de Funcionalidad</h4>
                </div>
            </div>
            <br>
            <div class="marketing-spots span3 col-lg-6 col-12">
                <div class="iconsquare">
                    <i class="fa fa-link"></i>
                </div>
                <div class="iconbox-content">
                    <h4>API Integración</h4>
                </div>
            </div>
            <div class="marketing-spots span3 col-lg-6 col-12">
                <div class="iconsquare">
                    <i class="fa fa-life-ring"></i>
                </div>
                <div class="iconbox-content">
                    <h4>LMS Consultoría</h4>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="text-center">
            <a class="btn btn-primary btn-lg" target="_blank" href="https://edwiser.org/contact-us/">Contactarnos</a>&nbsp;&nbsp;
        </div>
    </div>
</div>
<br />';

$string['licensenotactive'] = '<strong>Alerta!</strong> Su licencia no está activa, por favor <strong>actívela</strong> en la configuración de RemUI.';
$string['licensenotactiveadmin'] = '<strong>Alerta!</strong> Licencia no activada , por favor <strong>active</strong> la licencia <a href="'.$CFG->wwwroot.'/admin/settings.php?section=themesettingremui#remuilicensestatus" > here</a>.';
$string['activatelicense'] = 'Activar Licencia';
$string['deactivatelicense'] = 'Desactivar Licencia';
$string['renewlicense'] = 'Renovar Licencia';
$string['active'] = 'Activa';
$string['notactive'] = 'No Activa';
$string['expired'] = 'Caducada';
$string['licensekey'] = 'Clave de Licencia';
$string['licensestatus'] = 'Estado de la Licencia';
$string['noresponsereceived'] = 'No se pudo conectar con el servidor. Por favor intentelo más tarde.';
$string['licensekeydeactivated'] = 'Codigo de Licencia desactivado.';
$string['siteinactive'] = 'Sitio inactivo (Presione activar licencia).';
$string['entervalidlicensekey'] = 'Por favor ingrese un código de licencia valido.';
$string['licensekeyisdisabled'] = 'Su código de licencia esta desactivado.';
$string['licensekeyhasexpired'] = "Su licencia ha caducado. Por favor renuévela.";
$string['licensekeyactivated'] = "Su licencia ha sido activada.";
$string['enterlicensekey'] = "Por favor escriba un código de licencia valido.";

$string['activitynextpreviousbutton'] = 'Habilitar el botón de actividad Siguiente / Anterior';
$string['activitynextpreviousbuttondesc'] = 'El botón de actividad siguiente / anterior aparece en la parte superior de la actividad para un cambio rápido';
$string['disablenextprevious'] = 'Inhabilitar';
$string['enablenextprevious'] = 'Habilitar';
$string['enablenextpreviouswithname'] = 'Activar con el nombre de la actividad';

// course
$string['nosummary'] = 'A esta seccion del curso no se le ha agregado un programa o resumen.';
$string['defaultimg'] = 'Imagen por defecto 100 x 100.';
$string['choosecategory'] = 'Elegir Categoria';
$string['allcategory'] = 'Todas las Categorias';
$string['viewcours'] = 'Ver el Curso';
$string['taught-by'] = 'impartido por';
$string['enroluser'] = 'Inscribir Usuarios';
$string['graderreport'] = 'Informe de calificación';
$string['activityeport'] = 'Informe de actividades';
$string['editcourse'] = 'Editar curso';
// course sorting strings
$string['categorysort'] = 'Sort Categories';
$string['sortdefault'] = 'Sort (none)';
$string['sortascending'] = 'Sort A to Z';
$string['sortdescending'] = 'Sort Z to A';

// dashboard element -> overview
$string['enabledashboardelements'] = 'Activar Elementos de la Barra de Tareas';
$string['enabledashboardelementsdesc'] = 'Deseleccione para desactivar los widgets de Edwiser RemUI en la Barra de Tareas.';
$string['totaldiskusage'] = 'Uso total del disco';
$string['activemembers'] = 'Usuarios Activos';
$string['newmembers'] = 'Nuevos Usuarios';
$string['coursesdiskusage'] = 'Uso del disco por cursos';
$string['activestudents'] = 'Estudiantes activos';

// Quick meesage
$string['quickmessage'] = 'Mensaje Rapido';
$string['entermessage'] = 'Por favor, escriba algún mensaje!';
$string['selectcontact'] = 'Por favor, seleccione un contacto!';
$string['selectacontact'] = 'Seleccionar Contacto';
$string['sendmessage'] = 'Enviar Mensaje';
$string['yourcontactlisistempty'] = 'Su lista de contactos esta vacia!';
$string['viewallmessages'] = 'Ver todos los mensajes';
$string['messagesent'] = 'Enviado exitosamente!';
$string['messagenotsent'] = 'Mensaje No Enviado, asegúrese que ingreso la informacion correcta.';
$string['messagenotsenterror'] = 'Mensaje no enviado! Algo salió mal.';
$string['sendingmessage'] = 'Enviando mensaje...';
$string['sendmoremessage'] = 'Enviar más mensajes';

// General Seetings.
$string['generalsettings' ] = 'Configuración General';
$string['navsettings'] = 'Configuración de Navegación';
$string['colorsettings'] = 'Configurar Colores';
$string['fontsettings' ] = 'Configurar Fuentes';
$string['slidersettings'] = 'Configurar Slider';
$string['configtitle'] = 'Edwiser RemUI';

// Font settings.
$string['fontselect'] = 'Selector del Tipo de Fuente';
$string['fontselectdesc'] = 'Selecciones fuentes estándar o fuentes Google. Por favor guarde los cambios antes de mostrar su selección.';
$string['fonttypestandard'] = 'Fuente Estándar';
$string['fonttypegoogle'] = 'Fuente Google';
$string['fontnameheading'] = 'Fuente de Título';
$string['fontnameheadingdesc'] = 'Ingrese el nombre exacto de la fuente para el Título.';
$string['fontnamebody'] = 'Fuente del Texto';
$string['fontnamebodydesc'] = 'Entre el nombre exacto de la fuente para usar en el texto normal.';

/* Dashboard Settings*/
$string['dashboardsetting'] = 'Configuración de la Barra de Tareas';
$string['themecolor'] = 'Color del Tema';
$string['themecolordesc'] = 'Cual es el color que desea para su tema?. Este cambio afectara a múltiples componentes de su sitio Moodle';
$string['themetextcolor'] = 'Color del Texto';
$string['themetextcolordesc'] = 'Establecer el color del Texto.';
$string['layout'] = 'Elegir Diseño';
$string['layoutdesc'] = 'Elija Diseño Fijo (el menu se fijara en la parte superior) o Diseño por Defecto.'; // Boxed Layout or
$string['defaultlayout'] = 'Por Defecto';
$string['fixedlayout'] = 'Cabecera Fija';
$string['defaultboxed'] = 'Boxed';
$string['layoutimage'] = 'Boxed Layout Imagen de Fondo';
$string['layoutimagedesc'] = 'Cargar imagen de fondo para aplicar al Boxed Layout.';
$string['sidebar'] = 'Seleccionar sidebar';
$string['sidebardesc'] = 'Seleccionar el estilo del sidebar (Antiguo / Nuevo)';
$string['rightsidebarslide'] = 'Cambiar a Barra Lateral Derecha';
$string['rightsidebarslidedesc'] = 'Cambiar Barra Lateral Derecha por Defecto.';
$string['leftsidebarslide'] = 'Cambiar a Barra Lateral Izquierda';
$string['leftsidebarslidedesc'] = 'Cambiar la Barra Lateral Izquierda por defecto.';
$string['leftsidebarmini'] = 'Activar Barra Lateral Izquierda Mini';
$string['leftsidebarminidesc'] = 'Activar Barra Lateral Izquierda Mini.';
$string['rightsidebarskin'] = 'Cambiar la textura de la Barra Lateral Derecha';
$string['rightsidebarskindesc'] = 'Cambiar la Textura de la Barra Lateral Derecha.';

/*color*/
$string['colorscheme'] = 'Escoja un esquema de colores';
$string['colorschemedesc'] = 'Usted puede escoger un esquema de los siguientes - Azul, Negro, Purpura, Verde, Amarillo, Azul-Claro, Negro-Claro, Purpura-Claro, Verde-Claro & Amarillo-Claro. <br /> <b>Claro</b> - poner un color degradado a la izquierda de la barra lateral.';
$string['blue'] = 'Azul';
$string['white'] = 'Blanco';
$string['purple'] = 'Purpura';
$string['green'] = 'Verde';
$string['red'] = 'Rojo';
$string['yellow'] = 'Amarillo';
$string['bluelight'] = 'Azul Claro';
$string['whitelight'] = 'Blanco';
$string['purplelight'] = 'Purpura Claro';
$string['greenlight'] = 'Verde Claro';
$string['redlight'] = 'Rojo Claro';
$string['yellowlight'] = 'Amarillo Claro';
$string['custom'] = 'Oscuro personalizado';
$string['customlight'] = 'Luz personalizada';
$string['customskin_color'] = 'Color del Tema';
$string['customskin_color_desc'] = 'Usted puede elegir el color personalizado para su tema aquí.';

/* Course setting*/
$string['courseperpage'] = 'Cursos por Página';
$string['courseperpagedesc'] = 'Numero de cursos a mostrar por página en la página de archivo de cursos.';
$string['enableimgsinglecourse'] = 'Habilitar la imagen en la página de curso único';
$string['enableimgsinglecoursedesc'] = 'Desmarque para deshabilitar el formateo de la imagen en la página de curso único.';
$string['nocoursefound'] = 'No se encontraron cursos';

/*logo*/
$string['logo'] = 'Logo';
$string['logodesc'] = 'Usted puede agregar el logo que se mostrara en la cabecera. Nota - El alto preferido es 50px. Si desea personalizarlo, Puede hacerlo desde la caja CSS.';
$string['logomini'] = 'LogoMini';
$string['logominidesc'] = 'Puede agregar el logomini que se mostrará en el encabezado cuando la barra lateral esté contraída. Nota- La altura preferida es 50px. En caso de que desee personalizar, puede hacerlo desde el cuadro personalizado de CSS.';
$string['siteicon'] = 'Icono del sitio';
$string['siteicondesc'] = 'Si no tiene un icono puede elegir uno de <a href="https://fontawesome.com/v4.7.0/cheatsheet/" target="_new">list</a>. <br /> Solo ingrese el texto que aparece después de "fa-".';
$string['logoorsitename'] = 'Elegir el formato del logo';
$string['logoorsitenamedesc'] = 'Usted puede cambiar el logo del sitio las veces que quiera. <br />Las opciones disponibles son: Logo - Sólo se mostrará el logo; <br /> Icon+sitename - Se mostrará el icono y el nombre del sitio.';
$string['onlylogo'] = 'Únicamente el logo';
$string['onlysitename'] = 'Sólo nombre del sitio';
$string['iconsitename'] = 'Icono y nombre del sitio';

/*favicon*/
$string['favicon'] = 'Favicon';
$string['favicondesc'] = 'El favicon de su sitio. Inserte aquí el icono de su sitio.';
$string['enablehomedesc'] = 'Enable Home Desc';

/*custom css*/
$string['customcss'] = 'Personalizar CSS';
$string['customcssdesc'] = 'Usted puede personalizar las CSS Desde la caja de texto superior. Los cambios se reflejarán en todas las páginas de su sitio.';

/*google analytics*/
$string['googleanalytics'] = 'ID de seguimiento de Google Analytics';
$string['googleanalyticsdesc'] = 'Ingresa tu ID de seguimiento de Google Analytics para habilitar los análisis en tu sitio web. El formato de ID de seguimiento debe ser como [UA-XXXXX-Y].<br />
Tenga en cuenta que al incluir esta configuración, estará enviando datos a Google Analytics y debe asegurarse de que sus usuarios estén advertidos al respecto. Nuestro producto no almacena ninguno de los datos que se envían a Google Analytics.';

$string['frontpageimge'] = '';

$string['four'] = '4';
$string['eight'] = '8';
$string['twelve'] = '12';

$string['enablefrontpagecourseimg'] = 'Activar las imágenes en los cursos de la portada';
$string['enablefrontpagecourseimgdesc'] = 'Activar las imágenes en los cursos disponibles de la portada';


// Social media settings
$string['socialmedia'] = 'Configuración de redes sociales';
$string['socialmediadesc'] = 'Ingrese los enlaces de sus sitios sociales.';
$string['facebooksetting'] = 'Configuración de Facebook';
$string['facebooksettingdesc'] = 'Ingrese la dirección de su página de Facebook. https://www.facebook.com/pagename';
$string['twittersetting'] = 'Configuración de Twitter';
$string['twittersettingdesc'] = 'Ingrese la dirección de su página de Twitter. https://www.twitter.com/pagename';
$string['linkedinsetting'] = 'Configuración de LinkedIn';
$string['linkedinsettingdesc'] = 'Ingrese la dirección de su página de LinkedIn. https://www.linkedin.com/in/pagename';
$string['gplussetting'] = 'Configuración de Google Plus';
$string['gplussettingdesc'] = 'Ingrese la dirección de Google Plus. https://plus.google.com/pagename';
$string['youtubesetting'] = 'Configuración de YouTube';
$string['youtubesettingdesc'] = 'Ingrese la dirección de su sitio YouTube. https://www.youtube.com/channel/UCU1u6QtAAPJrV0v0_c2EISA';
$string['instagramsetting'] = 'Configuración de Instagram';
$string['instagramsettingdesc'] = 'Ingrese la dirección de su página de Instagram. https://www.instagram.com/name';
$string['pinterestsetting'] = 'Configuración de Pinterest';
$string['pinterestsettingdesc'] = 'Ingrese la dirección de su página de Pinterest. https://www.pinterest.com/name';
$string['quorasetting'] = 'Configuración de Quora';
$string['quorasettingdesc'] = 'Ingrese la dirección de su página de Quora. https://www.quora.com/name';

// Footer Section Settings
$string['footersetting'] = 'Configuración del pie de página';
// Footer  Column 1
$string['footercolumn1heading'] = 'Contenido de la primera columna (izquierda)';
$string['footercolumn1headingdesc'] = 'Esta sección pertenece a la zona izquierda del pie de página en la página principal.';

$string['footercolumn1title'] = 'Título de la primera columna';
$string['footercolumn1titledesc'] = 'Agregar título a esta columna.';
$string['footercolumn1customhtml'] = 'Personalizar HTML';
$string['footercolumn1customhtmldesc'] = 'Usted puede personalizar el html de esta columna utilizando la caja de texto superior.';


// Footer  Column 2
$string['footercolumn2heading'] = 'Contenido de la segunda columna (Medio)';
$string['footercolumn2headingdesc'] = 'Esta sección pertenece a la zona central del pie de página en la página principal.';

$string['footercolumn2title'] = 'Título de la segunda columna';
$string['footercolumn2titledesc'] = 'Agregar título a esta columna.';
$string['footercolumn2customhtml'] = 'Personalizar HTML';
$string['footercolumn2customhtmldesc'] = 'Usted puede personalizar el html de esta columna utilizando la caja superior.';

// Footer  Column 3
$string['footercolumn3heading'] = 'Contenido de la tercera columna (Derecha)';
$string['footercolumn3headingdesc'] = 'Esta sección pertenece a la zona derecha del pie de página en la página principal.';

$string['footercolumn3title'] = 'Titulo de la Tercera Columna';
$string['footercolumn3titledesc'] = 'Agregar Titulo a esta columna.';
$string['footercolumn3customhtml'] = 'Personalizar HTML';
$string['footercolumn3customhtmldesc'] = 'Personalizar HTML de esta columna utilizando la caja superior.';

// Footer Bottom-Right Section
$string['footerbottomheading'] = 'Configuración de la parte inferior del pie de pagina';
$string['footerbottomdesc'] = 'Aquí puede especificar su propio enlace para mostrar hasta abajo del pie de página';
$string['footerbottomtextdesc'] = 'Agregar texto para configurar la parte inferior del Pie de Página.';
$string['footerbottomlink'] = 'Enlace del Pie de Página';
$string['footerbottomlinkdesc'] = 'Ingresar la URL del enlace en la parte inferior del Pie de Página. http://www.yourcompany.com';
$string['poweredbyedwiser'] = 'Powered by Edwiser';
$string['poweredbyedwiserdesc'] = 'Desmarcar para eliminar \'Powered by Edwiser\' de su sitio.';

// Login settings page code begin.

$string['loginsettings'] = 'Configuración de la página de login';
$string['navlogin_popup'] = 'Habilitar el popup de inicio de sesión';
$string['navlogin_popupdesc'] = 'Habilitar el popup de inicio de sesión en el encabezado.';
$string['loginsettingpic'] = 'Cargar imagen de fondo';
$string['loginsettingpicdesc'] = 'Cargar una imagen como fondo para el formulario de ingreso.';
$string['signuptextcolor'] = 'Color de texto para el Panel de Registro';
$string['signuptextcolordesc'] = 'Seleccione un color de texto para el Panel de Registro.';
$string['left'] = "Izquierdo";
$string['right'] = "Derecho";
$string['remember_me'] = "Recuérdame";
$string['brandlogopos'] = "Posición del logotipo marca";
$string['brandlogoposdesc'] = "Si está habilitado, el logotipo de la marca estará visible en la barra lateral derecha encima del formulario de inicio de sesión.";
$string['brandlogotext'] = "Sitio descripción";
$string['brandlogotextdesc'] = "Agregar texto para la descripción del sitio que se mostrará en la página de inicio de sesión y registro. Manténgalo en blanco si no desea poner ninguna descripción.";
// Login settings Page code end.

// From theme snap
$string['title'] = 'Título';
$string['contents'] = 'Contenidos';
$string['addanewsection'] = 'Crear una nueva Sección';
$string['createsection'] = 'Crear Sección';

/* User Profile Page */

$string['blogentries'] = 'Entradas de Blog';
$string['discussions'] = 'Discusiones';
$string['discussionreplies'] = 'Replicas';
$string['aboutme'] = 'Acerca de Mi';

$string['addtocontacts'] = 'Agregar a Contactos';
$string['removefromcontacts'] = 'Eliminar de Contactos';
$string['block'] = 'Bloques';
$string['removeblock'] = 'Eliminar Bloques';

$string['interests'] = 'Intereses';
$string['institution'] = 'Institución';
$string['location'] = 'Lugar';
$string['description'] = 'Descripción';

$string['commoncourses'] = 'Cursos Comunes';
$string['editprofile'] = 'Editar Perfil';

$string['firstname'] = 'Nombre';
$string['surname'] = 'Apellido';
$string['email'] = 'Email';
$string['citytown'] = 'Ciudad';
$string['country'] = 'País';
$string['selectcountry'] = 'Seleccionar País';
$string['description'] = 'Descripción';

$string['nocommoncourses'] = 'Usted no comparte ningún curso en común con este usuario.';
$string['notenrolledanycourse'] = 'Usted no está inscrito(a) en ningún curso.';
$string['usernotenrolledanycourse'] = '{$a} no está inscrito(a) en ningún curso.';
$string['nobadgesyetcurrent'] = 'No tienes medallas todavía.';
$string['nobadgesyetother'] = 'Este usuario no tiene medallas todavía.';
$string['grade'] = "Grado";
$string['viewnotes'] = "Ver notas";

// User profile page js

$string['actioncouldnotbeperformed'] = 'No se pudo ejecutar la accion!';
$string['enterfirstname'] = 'Por favor, ingrese su nombre.';
$string['enterlastname'] = 'Por favor, ingrese su apellido.';
$string['enteremailid'] = 'Ingrese su identificación de EMAIL.';
$string['enterproperemailid'] = 'Por favor, ingrese una dirección de EMAIL correcta.';
$string['detailssavedsuccessfully'] = 'Detalles Guardados Correctamente!';

/* Header */

$string['startedsince'] = 'Empezado desde ';
$string['startingin'] = 'Empezando en ';

$string['userimage'] = 'Imagen de Usuario';

$string['seeallmessages'] = 'Ver todos los mensajes';
$string['viewallnotifications'] = 'Ver todas las notificaciones';
$string['viewallupcomingevents'] = 'Ver todos los eventos futuros';

$string['youhavemessages'] = 'Tiene {$a} sin leer (s)';
$string['youhavenomessages'] = 'No hay mensajes nuevos para leer';

$string['youhavenotifications'] = 'Tiene {$a} notificaciones';
$string['youhavenonotifications'] = 'No hay notificaciones';

$string['youhaveupcomingevents'] = 'Usted tiene {$a} eventos futuro(s)';
$string['youhavenoupcomingevents'] = 'No tiene eventos futuros';


/* Dashboard elements */

// Add notes
$string['addnotes'] = 'Agregar Comentario o Nota';
$string['selectacourse'] = 'Seleccionar un Curso';

$string['addsitenote'] = 'Agregar Comentario al Sitio';
$string['addcoursenote'] = 'Agregar Comentario al Curso';
$string['addpersonalnote'] = 'Agregar Nota Personal';
$string['deadlines'] = 'Fecha Limite';

// Add notes js
$string['selectastudent'] = 'Seleccione un estudiante';
$string['total'] = 'Total';
$string['nousersenrolledincourse'] = 'No hay estudiantes inscritos en el {$a} Curso.';
$string['selectcoursetodisplayusers'] = 'Seleccione un curso para mostrar los estudiantes inscritos en el mismo.';


// Deadlines
$string['gotocalendar'] = 'Ir al calendario';
$string['noupcomingdeadlines'] = 'No hay fechas límite próximas!';
$string['in'] = 'En';
$string['since'] = 'Desde';

// Latest Members
$string['latestmembers'] = 'Últimos miembros';
$string['viewallusers'] = 'Ver todos los usuarios';

// Recently Active Forums
$string['recentlyactiveforums'] = 'Foros Activos Recientemente';

// Recent Assignments
$string['assignmentstobegraded'] = 'Tareas para Calificar';
$string['assignment'] = 'Tarea';
$string['recentfeedback'] = 'Comentarios Recientes';

// Recent Events
$string['upcomingevents'] = 'Eventos Futuros';
$string['productimage'] = 'Imagen del Producto';
$string['noupcomingeventstoshow'] = 'No hay eventos futuros para mostrar!';
$string['viewallevents'] = 'Ver Todos los Eventos';
$string['addnewevent'] = 'Agregar Nuevo Evento';

// Enrolled users stats
$string['enrolleduserstats'] = 'Estadísticas de Usuarios Inscritos por Categoría de Curso';
$string['problemwhileloadingdata'] = 'Lo sentimos, ha ocurrido un problema mientras cargábamos la información...';
$string['nocoursecategoryfound'] = 'No hay categorías de cursos en el sistema.';
$string['nousersincoursecategoryfound'] = 'Se han encontrado usuarios no inscritos en esta categoría de Curso.';

// Quiz stats
$string['quizstats'] = 'Estadísticas de intentos del ejercicio';
$string['totalusersattemptedquiz'] = 'Total de usuarios que han iniciado el ejercicio';
$string['totalusersnotattemptedquiz'] = 'Total de Usuarios que no han intentado el ejercicio';

/* Theme Controller */

$string['years'] = 'año(s)';
$string['months'] = 'mes(s)';
$string['days'] = 'día(s)';
$string['hours'] = 'hora(s)';
$string['mins'] = 'min(s)';

$string['parametermustbeobjectorintegerorstring'] = 'El parametro {$a} debe ser un objeto, un integro o una cadena numérica';
$string['usernotenrolledoncoursewithcapability'] = 'El usuario no tiene privilegios para inscribirse en este curso';
$string['userdoesnothaverequiredcoursecapability'] = 'El usuario no tiene privilegios necesarios';
$string['coursesetuptonotshowgradebook'] = 'El curso esta configurado para no mostrar calificación a los alumnos';
$string['coursegradeishiddenfromstudents'] = 'La calificación del curso está deshabilitada para los alumnos';
$string['feedbackavailable'] = 'Retroalimentación disponible';
$string['nograding'] = 'No tiene envíos para calificar.';


/* Calendar page */
$string['selectcoursetoaddactivity'] = 'Seleccionar el Curso para agregar una actividad';
$string['addnewactivity'] = 'Agregar Nueva Actividad';

// Calendar page js
$string['redirectingtocourse'] = 'Redireccionando al {$a} página del Curso..';
$string['nopermissiontoaddactivityinanycourse'] = 'Lo sentimos, usted no tiene privilegios para agregar actividades en cualquier curso.';
$string['nopermissiontoaddactivityincourse'] = 'Lo sentimos, no tiene permisos para agregar actividades en {$a} Curso.';
$string['selectyouroption'] = 'Seleccione su opción';


/* Blog Archive page */
$string['viewblog'] = 'Ver Blog Completo';


/* Course js */

$string['hidesection'] = 'Colapsar';
$string['showsection'] = 'Expandir';
$string['hidesections'] = 'Colapsar Secciones';
$string['showsections'] = 'Expandir Secciones';
$string['addsection'] = 'Agregar Sección';

$string['overdue'] = 'Atrasado';
$string['due'] = 'Debido';

/* Footer headings */
$string['quicklinks'] = 'Enlaces rápidos';

/*coruse activity navigation*/
$string['backtocourse'] = 'Resumen del curso';
$string['sectionnotitle'] = 'General';
$string['sectiondefaulttitle'] = 'Sección';

$string['sectionactivities'] = 'Actividades';
$string['showless'] = 'Mostrar menos';
$string['showmore'] = 'Mostrar más';
$string['allcategories'] = 'Todas las categorías';
$string['category'] = 'Categoría';
$string['administrator'] = 'Administrador';
$string['badges'] = 'Insignias';
$string['webpage'] = 'Página Web';
$string['contacts'] = 'Contactos';
$string['courses'] = 'Cursos';
$string['preferences'] = 'Preferencias';
$string['complete'] = 'Completado';
$string['start_date'] = 'Fecha de inicio';
$string['submit'] = 'Enviar';
$string['fontname'] = 'Tipografía del sitio';
$string['fontnamedesc'] = 'Seleccione el nombre exacto de la tipografía para usar en Moodle.';
$string['followus'] = 'Síguenos';
$string['poweredby'] = 'Powered by Edwiser RemUI';
$string['signin'] = 'Registrarse';
$string['forgotpassword'] = 'Contraseña olvidada?';
$string['noaccount'] = 'No tienes cuenta?';
$string['applysitewide'] = 'Aplicar en todo el sitio';
$string['applysitecolor'] = 'Aplicar Color del Sitio';

// User profile page js
$string['actioncouldnotbeperformed'] = 'La acción no pudo ser realizada!';
$string['enterfirstname'] = 'Por favor, introduzca su nombre.';
$string['enterlastname'] = 'Por favor, introduzca su apellido.';
$string['enteremailid'] = 'Por favor, introduzca su Email.';
$string['enterproperemailid'] = 'Por favor, introduzca un Email correcto.';
$string['detailssavedsuccessfully'] = 'Detalles guardados correctamente!';

/* Blog Archive page */
$string['viewblog'] = 'Ver el blog completo';
$string['author'] = 'Autor';

$string['createaccount'] = 'Aquí puede crear una cuenta nueva.';
$string['signup'] = 'Darse de alta';
$string['togglesearch'] = 'Cambiar búsqueda';
$string['togglefullscreen'] = 'Pantalla completa';
$string['navbartype'] = 'Color de la barra de navegación';
$string['sidebarcolor'] = 'Color de la barra lateral';
$string['sitecolor'] = 'Color del sitio';
$string['others'] = 'Otros';
$string['today'] = 'Hoy';
$string['yesterday'] = 'Ayer';
$string['you_do_not_have_permission_to_perform_this_action'] = 'No tiene permisos para realizar esta acción';
$string['viewallcourses'] = 'Ver todos los cursos';
$string['readmore'] = 'LEER MÁS';
$string['aboutremui'] = 'Acerca de Edwiser RemUI';

$string['remuisettings'] = 'Configuración de RemUI';
$string['createanewcourse'] = 'Crear un curso nuevo';
$string['createarchivepage'] = 'Página de archivo del curso';
$string['siteblog'] = 'Blog del sitio';
$string['selectcategory'] = 'Seleccione una categoría';
$string['nocoursesavail'] = 'Lo sentimos! No hay ningún curso disponible en este momento.';
$string['norecentfeedback'] = 'No hay ningún feedback reciente!';
$string['loadmore'] = 'Carga más';

// news and updates tab
$string['newsandupdates'] = 'Novedades y actualizaciones';
$string['newupdatemessage'] = 'Nueva actualización disponible de RemUI.';
$string['currentversionmessage'] = 'La versión actual es ';
$string['downloadupdate'] = 'Descargar actualización';
$string['latestversionmessage'] = 'Está utilizando la última versión de RemUI.';
$string['rateremui'] = 'Valore RemUI';
$string['fullname']  = 'Nombre completo';
$string['providefeedback'] = 'Denos su opinión sobre RemUI';
$string['sendfeedback'] = 'Enviar opinión';
$string['recentnews'] = 'Noticias recientes';

/* My Course Page */
$string['resume'] = 'Reanudar';
$string['start'] = 'Comienzo';
$string['completed'] = 'Completed';

/* Dashboard Page */
$string['welcome-msg'] = 'Bienvenido a su salpicadero';
$string['coursecompleted'] = 'CURSOS COMPLETADOS';
$string['activitycompleted'] = 'ACTIVIDADES COMPLETADAS';
$string['enrolledcourses'] = 'CURSOS MATRICULADOS';
$string['courseactivities'] = 'ACTIVIDADES DEL CURSO';
$string['noevents'] = "No hay eventos pendientes";
$string['overdue'] = "Atrasado";
$string['upcoming'] = "Próximos";
$string['expired'] = 'Finalizados';
$string['selectcourse'] = "Seleccionar curso";
$string['courseanlytics']="Analíticas del Curso";
$string['highestgrade']="GRADO MÁS ALTO";
$string['lowestgrade']="GRADO MÁS BAJO";
$string['averagegrade']="GRADO PROMEDIO";
$string['viewcourse'] = "VER CURSO";
$string['mycourses'] = "Mis cursos";
$string['tasks'] = "Tareas para completar";
$string['coursestats'] = "Estadísticas del curso";
$string['allActivities'] = "Todas las actividades";

/* Footer Setting */
$string['footerbottomtext'] = 'Texto de la parte inferior izquierda del pie de página.';

$string['enableannouncement'] = "Activar avisos del sitio";
$string['enableannouncementdesc'] = "Activar avisos en todo el sitio para visitantes/alumnos.";
$string['announcementtext'] = "AVISO";
$string['announcementtextdesc'] = "Mensaje de aviso para mostrar en todo el sitio.";
$string['announcementtype'] = "Tipo de aviso";
$string['announcementtypedesc'] = "información / alerta / peligro / éxito";
$string['typeinfo'] = "Aviso de información";
$string['typedanger'] = "Aviso urgente";
$string['typewarning'] = "Aviso de advertencia";
$string['typesuccess'] = "Aviso de éxito";

// Teacher Dashboard Strings
$string['courseprogress'] = "Progreso del Curso";
$string['course'] = "Curso";
$string['startdate'] = "Fecha de inicio";
$string['enrolledstudents'] = "Estudiantes";
$string['progress'] = "Progreso";
$string['name'] = "Nombre";
$string['status'] = "Estado";
$string['back'] = "Volver";

// Dashboard Edwiser Remui Blocks 
$string['courseprogressblock'] = 'Progreso del curso Block';
$string['enrolledusersblock'] = 'Enrolled Users Block';
$string['quizattemptsblock'] = 'Quiz Attempts Block';
$string['courseanlyticsblock'] = 'Course Anlytics Block';
$string['latestmembersblock'] = 'Latest Members Block';
$string['addnotesblock'] = 'Add Notes Block';
$string['recentfeedbackblock'] = 'Recent Feedback Block';
$string['recentforumsblock'] = 'Recent Forums Block';

$string['courseprogressblockdesc'] = 'Enable Course Progress Block ';
$string['enrolledusersblockdesc'] = 'Enable Enrolled Users Block';
$string['quizattemptsblockdesc'] = 'Enable Quiz Attempts Block';
$string['courseanlyticsblockdesc'] = 'Enable Course Anlytics Block';
$string['latestmembersblockdesc'] = 'Enable Latest Members Block';
$string['addnotesblockdesc'] = 'Enable Add Notes Block';
$string['recentfeedbackblockdesc'] = 'Enable Recent Feedback Block';
$string['recentforumsblockdesc'] = 'Enable Recent Forums Block';

$string['recentactivityblock'] = 'Bloque de actividades recientes';
$string['recentactivityblockdesc'] = 'Si está habilitado, el Bloque de actividades recientes estará visible en Dashboard';

$string['enablerecentcourses'] = 'Habilitar cursos recientes';
$string['enablerecentcoursesdesc'] = 'Si está habilitado, el menú desplegable de los cursos recientes se mostrará en el encabezado.';

$string['enablecoursestats'] = 'Habilitar estadísticas del curso';
$string['enablecoursestatsdesc'] = 'Si está habilitado, el Administrador, los Gerentes y el maestro verán las estadísticas relacionadas con el curso en la página del curso.';
$string['enabledictionary'] = 'Habilitar diccionario';
$string['enabledictionarydesc'] = 'Si está habilitado, la función Diccionario se activará y mostrará el significado del texto seleccionado.';
$string['more'] = 'Más...';
$string['coursedescimage'] = 'Configuración de la imagen de la sección general';
$string['coursedescimagedesc'] = 'Si está habilitado, la imagen de fondo de la descripción de la sección general se obtendrá de la descripción del resumen del curso ( Por defecto la primera Imagen ) de lo contrario, se obtendrá de Archivos de resumen del curso.';

/* GDPR compliance */

/* Google analytics help */
// $string['googleanalyticshelp'] = '<a class="btn btn-link p-a-0" role="button" data-container="body" data-toggle="popover" data-placement="left" data-content="<div class=&quot;no-overflow&quot;><p>
// Please be aware that by including this setting, you will be sending data to Google Analytics and you should make sure that your users are warned about this. Our product does not store any of the data being sent to Google Analytics.
// </p>

// </div>" data-html="true" tabindex="0" data-trigger="focus" data-original-title="" title="">
//   <i class="icon fa fa-question-circle text-info fa-fw " aria-hidden="true" title="Help with Choice" aria-label="Help with Choice"></i>
// </a>';
// $string['googleanalyticshelp'] = '<a class="btn btn-link p-a-0" role="button" data-container="body" data-toggle="popover" data-placement="left" data-content="<div class=&quot;no-overflow&quot;><p>Please be aware that by including this setting, you will be sending data to Google Analytics and you should make sure that your users are warned about this. Our product does not store any of the data being sent to Google Analytics.</p>
// </div> " data-html="true" tabindex="0" data-trigger="focus" data-original-title="" title="">
//   <i class="icon fa fa-question-circle text-info fa-fw " aria-hidden="true" title="Help with Display description on course page" aria-label="Help with Display description on course page"></i>
// </a>';
// $string['privacy:metadata:core_files'] = 'Stores Slider images and images for different sections for the home page. Also, a background image uploaded by the admin for the login page is stored by the theme.';

/* Course view preference */
$string['privacy:metadata:preference:course_view_state'] = 'El tipo de pantalla que el usuario prefiere para la lista de cursos';
$string['course_view_state_description_grid'] = 'Para mostrar los cursos en formato de cuadrícula';
$string['course_view_state_description_list'] = 'Para mostrar los cursos en formato de lista';

/* Course view preference */
$string['privacy:metadata:preference:viewCourseCategory'] = 'El tipo de pantalla que el usuario prefiere para la lista de cursos';
$string['viewCourseCategory_grid'] = 'Para mostrar los cursos en formato de cuadrícula';
$string['viewCourseCategory_list'] = 'Para mostrar los cursos en formato de lista';

/* Aside right view preference */
$string['privacy:metadata:preference:aside_right_state'] = 'Si el bloque a un lado de la derecha debe mantenerse abierto o cerrado';
$string['aside_right_state_'] = 'Para mostrar el bloque a un lado a la derecha como abierto'; // blank value
$string['aside_right_state_overrideaside'] = 'Para mostrar el bloque a un lado a la derecha como cerrado'; // overrideaside

/* Menu view preference */
$string['privacy:metadata:preference:menubar_state'] = 'El tipo de pantalla que el usuario prefiere para la barra de menú';
$string['menubar_state_fold'] = 'Para mostrar la barra de menú como doblada';
$string['menubar_state_unfold'] = 'Para mostrar la barra de menú como desplegada';
$string['menubar_state_open'] = 'Para mostrar la barra de menú como abierta';
$string['menubar_state_hide'] = 'Para mostrar la barra de menú como oculta';
$string['recent'] = 'Reciente';

$string['enableheaderbuttons'] = 'Show header buttons in dropdown';
$string['enableheaderbuttonsdesc'] = 'All the buttons which are displayed in header are converted to a single dropdown.';
$string['sidebarpinned'] = 'Sidebar pinned.';
$string['sidebarunpinned'] = 'Sidebar unpinned.';
$string['pinsidebar'] = 'Pin sidebar';
$string['unpinsidebar'] = 'Unpin sidebar';
$string['mergemessagingsidebar'] = 'Panel de mensajes de combinación';
$string['mergemessagingsidebardesc'] = 'Fusionar el panel de mensajes en la barra lateral derecha';

/** Course Stats */
$string['enrolstudents'] = 'Estudiantes <br>inscritos';
$string['studentcompleted'] = 'Estudiantes <br>completados';
$string['inprogress'] = 'En <br>progreso';
$string['yettostart'] = 'Aún <br>para empezar';

$string['none'] = 'Ninguna';
$string['fade'] = 'Descolorarse';
$string['slide-top'] = 'Deslice la parte superior';
$string['slide-bottom'] = 'Parte inferior de la diapositiva';
$string['slide-right'] = 'Deslice a la derecha';
$string['slide-left'] = 'Deslizar a la izquierda';
$string['slide-left-right'] = 'Alternativo: deslice a la izquierda y deslice a la derecha';
$string['scale-up'] = 'Aumentar proporcionalmente';
$string['scale-down'] = 'Reducir proporcionalmente';
$string['courseanimation'] = 'Curso de animacion';
$string['courseanimationdesc'] = 'Al habilitar esto, se agregará animación a los cursos en la página Archivo del curso.';
$string['enablenewcoursecards'] = 'Habilitar nuevas tarjetas de curso';
$string['enablenewcoursecardsdesc'] = 'Al habilitar esto, se mostrarán las nuevas tarjetas del curso en la página Archivo del curso.';
$string['publishfrontpage'] = 'Publicar';
$string['sectiondelete'] = 'Esta sección se eliminará de forma permanente en 30 segundos, deshacer para evitar cambios';
$string['undo'] = 'Deshacer dentro';
$string['frontpageheadercolor'] = 'Color del encabezado de la página de inicio';
$string['frontpageheadercolordesc'] = 'Si el encabezado es transparente, el color elegido se aplicará al encabezado de la página.';
$string['frontpagetransparentheader'] = 'Página de inicio encabezado transparente';
$string['frontpagetransparentheaderdesc'] = 'Cuando el control deslizante es la primera sección en la página de inicio, el encabezado aparecerá como transparente.';
$string['frontpageappearanimation'] = 'Sección aparece animación';
$string['frontpageappearanimationdesc'] = 'Habilitar esto para activar aparecer la animación para las secciones.';
$string['frontpageappearanimationstyle'] = 'Aparece estilo de animación';
$string['frontpageappearanimationstyledesc'] = 'Elija el estilo de animación para la sección.';
$string['migratorheader'] = 'Migrador';
$string['migrate'] = 'Emigrar';
$string['migratormessge'] = '<p>Bienvenido al nuevo diseño de la página de inicio de Edwiser Remui. Encontramos que tienes configuraciones de página de inicio más antiguas. ¿Te gusta migrar esas configuraciones?</p><p><strong>Emigrar</strong> - Se crearán nuevos bloques de configuraciones anteriores.</br><strong>Cancelar</strong>- Puede crear una página de inicio manualmente y este mensaje no volverá a aparecer.</p>';
$string['sectionupdated'] = 'Sección actualizada con éxito. Publicar para aplicar cambios.';

// Slider Section
$string['noofslides'] = 'Número de diapositivas';
$string['slideheading'] = "Slide Heading";
$string['slideheadingplaceholder'] = 'Introduzca el encabezado de la diapositiva aquí';
$string['slidedescription'] = "Slide Description";
$string['slidedescriptionplaceholder'] = 'Introduzca la descripción de la diapositiva aquí';
$string['btnlabel'] = 'Etiqueta de botón';
$string['btnlink'] = 'Botón de enlace';
$string['missingslide'] = 'Por favor suba la imagen o video';
$string['slideintervalplaceholder'] = 'Número entero positivo en milisegundos.';
$string['slideintervaldesc'] = 'You may set the transition time between the slides. In case if there is one slide, this option will have no effect. If interval is invalid(empty|0|less than 0) then default interval is 5000 milliseconds.';


// Contact Section
$string['contactlink'] = 'Enlace de contacto';
$string['contactus'] = 'Contáctenos';
$string['contactplaceholder'] = 'Ingrese los detalles del contacto, esto puede ser algo como correo electrónico o teléfono';
$string['missingcontactlink'] = 'Falta el enlace de contacto';
$string['titleplaceholder'] = 'Introduce el título aquí';
$string['missingtitle'] = 'Título perdido';
$string['descriptionplaceholder'] = 'Introduce la descripción aquí';
$string['contactlabelplaceholder'] = 'Introduce la etiqueta, por ejemplo. Correo electrónico, teléfono, etc.';
$string['missingdescription'] = 'Falta descripción';
$string['socialview'] = 'Vista de iconos';
$string['quora'] = 'Quora';
$string['google'] = 'Google';
$string['youtube'] = 'Youtube';
$string['twitter'] = 'Gorjeo';
$string['facebook'] = 'Facebook';
$string['linkedin'] = 'Linkedin';
$string['pinterest'] = 'Pinterest';
$string['instagram'] = 'Instagram';


// General Strings
$string['sectionpadding'] = 'Sección de relleno en píxeles';
$string['sectionsetting'] = 'Configuración de la sección';
$string['sectionbackground'] = 'Sección de imagen de fondo';
$string['bgcolor'] = 'Color de fondo';
$string['bgfixed'] = 'Fondo fijo';
$string['bgopacity'] = 'Opacidad de fondo';
$string['nobgfixed'] = 'Fondo no fijo';
$string['textbold'] = 'Negrita';
$string['textitalic'] = 'Itálico';
$string['titleeditor'] = 'Editor';
$string['fontsize'] = 'Tamaño de fuente';
$string['textunderline'] = 'Subrayar';
$string['color'] = 'Color';
$string['editingison'] = 'Modo de edición activado';
$string['fullwidth'] = 'Ancho completo';
$string['container'] = 'Ancho fijo del contenedor';
$string['shadowless'] = 'Sección Elementos Sombra';
$string['shadowcolor'] = 'Color de la sombra de la sección';
$string['shadowlessdesc'] = 'Habilitar esto para agregar algo de sombra a los elementos de sección';
$string['contactlabel'] = "Etiqueta de contacto";
$string['link'] = 'Enlazar';
$string['linklabel'] = 'Etiqueta de enlace';
$string['phone'] = 'Contacto No.';

// Section list string
$string['slidersection'] = "Sección deslizante";
$string['aboutussection'] = "Quiénes somos Sección";
$string['contactsection'] = "Sección de contacto";
$string['featuresection'] = "Sección de características";
$string['coursessection'] = "Seccion de cursos";
$string['teamsection'] = "Sección de Equipo";
$string['testimonialsection'] = "Sección de testimonios";
$string['htmlsection'] = "Sección html";
$string['separatorsection'] = "Seccion separadora";


// Slider Section
$string['textalign'] = 'Texto alineado';
$string['desccolor'] = 'Descripción Color';
$string['headingcolor'] = 'Color de encabezado';
$string['enablenav'] = 'Flechas de navegación';

$string['nonav'] = 'No hay flechas de navegación';
$string['navarrows'] = 'Flechas de navegación predeterminadas';
$string['navarrowscircle'] = 'Flechas de navegación con fondo circular';
$string['navarrowssquare'] = 'Flechas de navegación con fondo cuadrado';

// Team Section
$string['meetourteam'] = 'Conozca a nuestro equipo';
$string['rows'] = 'Número de filas';
$string['members'] = 'Número de miembros';
$string['quote'] = 'Ingrese cotización';
$string['teammembernameplaceholder'] = "Ingrese el nombre del miembro del equipo aquí";
$string['teammemberquoteplaceholder'] = "Ingrese la cotización del miembro del equipo aquí";

// Feature Section
$string['feature'] = 'Característica';
$string['features'] = 'Número de características';
$string['featurenameplaceholder'] = 'Introduce la característica aquí';
$string['missingname'] = 'Falta el nombre';
$string['featureiconplaceholder'] = 'Introduce el icono de la característica aquí';
$string['missingicon'] = 'Icono que falta';
$string['colorhex'] = 'Valor hexadecimal para el color';

// Courses section
$string['all'] = 'Todos';
$string['allcourses'] = 'Todos los cursos';
$string['future'] = 'Futuro';
$string['coursessectioninprogress'] = 'En progreso';
$string['past'] = 'Pasado';
$string['coursecategoriesplaceholder'] = 'Busca la categoría del curso aquí';
$string['categories'] = 'Las categorías';
$string['categoryandcourses'] = 'Categoría y Cursos';
$string['hiddencategory'] = 'Categoría oculta';

// Testimonial Section
$string['testimonials'] = 'Número de testimonios';
$string['testimonial'] = 'Testimonial';
$string['testimonialplaceholder'] = "Enter person's testimonial here";
$string['missingtestimonial'] = 'Testimonio faltante';
$string['designation'] = 'Designacion';
$string['designationplaceholder'] = "Enter person's designation here";
$string['borderradius'] = 'Radio de la frontera';
$string['noradius'] = 'Sin radio de frontera';
$string['px'] = '  Pixel';
$string['fullnameplaceholder'] = "Enter person\'s full name here";
$string['namecolor'] = 'Nombre del autor campo Color';
$string['namecolordesc'] = 'Este color se aplicará a todo el texto de nombre completo';
$string['designationcolor'] = 'Color del campo de designación';
$string['designationcolordesc'] = 'Este color se aplicará a todos los textos de designación.';
$string['testimonialcolor'] = 'Color del campo testimonial';
$string['testimonialcolordesc'] = 'Este color se aplicará a todos los textos de testimonios.';
$string['testimonialproperties'] = 'Propiedades de texto para testimonial';
$string['testimonialpropertiesdesc'] = 'Estas propiedades se aplicarán a todos los testimonios del autor.';
$string['backgroundstyle'] = 'Estilo de fondo testimonial';
$string['solidcolor'] = 'Sólido';
$string['gradientcolor'] = 'Gradiente';
$string['testimonialcolor1'] = 'Si el estilo de fondo es sólido, este color se aplicará a todo el testimonio. Si el estilo de fondo es degradado, este será el primer color.';
$string['testimonialcolor2'] = 'Este será el segundo color para el fondo testimonial.';
$string['layout1'] = 'Diseño 1';
$string['layout2'] = 'Diseño 2';

// Edit Menu
$string['edit'] = 'Editar';
$string['moveup'] = 'Ascender';
$string['movedown'] = 'Mover hacia abajo';
$string['hide'] = 'Esconder';
$string['show'] = 'Show';
$string['delete'] = 'Borrar';

// HTML Section
$string['blocks'] = 'Numero de bloques';
$string['cssstyle'] = 'Estilos CSS';
$string['cssstyleplaceholder'] = 'Introduzca los estilos css aquí. Los cambios en vivo se reflejarán en el editor. Ex:
div {
    border: 2px dashed #ccc;
}
';
$string['htmldefaultcontent'] = 'Pon tu contenido aquí';
$string['applyfilter'] = 'Aplicar filtros';
$string['applyfilterdesc'] = 'Aplicar filtros moodle en el contenido antes de mostrar la sección.';

// Separator Section
$string['separatorstyle'] = 'Estilo separador';
$string['separatorsolid'] = 'Sólido';
$string['separatordouble'] = 'Doble';
$string['separatordashed'] = 'Salpicado';
$string['separatordotted'] = 'Punteado';
$string['separatorblur'] = 'Difuminar';
$string['separatorblurend'] = 'Desenfoque final';
$string['separatorgradient'] = 'Gradiente';
$string['separatorwidth'] = 'Ancho en porcentaje';
$string['separatorheight'] = 'Altura';
$string['separatorresult'] = 'Resultado';

// About us section
$string['aboutus'] = 'Sobre nosotros';
$string['aboutusblock'] = 'Sobre nosotros bloque';
$string['view'] = 'Ver';
$string['icon'] = 'Icono (<a href="https:\/\/fontawesome.com\/v4.7.0\/cheatsheet\/" target="\_new"> Fuente impresionante </a>)';
$string['aboutusicondesc'] = 'Puedes elegir cualquier icono desde este <a href="http:\/\/fortawesome.github.io\/Font-Awesome\/cheatsheet\/" target="_new">lista</a>. Solo ingresa el texto después de "fa-".';
$string['backgroudimage'] = 'Imagen de fondo';
$string['rowview'] = "Row";
$string['gridview'] = "Grid";
$string['columnview'] = 'Columna';
$string['clickhere'] = 'Haga clic aquí';
$string['btnlink'] = "Button Link";
$string['btnlinkplaceholder'] = 'Introduzca el enlace del botón aquí';
$string['btnlabel'] = "Button Label";
$string['btnlabelplaceholder'] = 'Introduce la etiqueta del botón aquí';
$string['colorhex'] = 'Color (código hexadecimal)';
$string['colorhexdesc'] = 'Haga clic en el cuadro de arriba para elegir el color';
$string['blockbackground'] = 'Fondo del bloque';
$string['transparent'] = 'Transparente';
$string['noborder'] = 'Sin bordes';
$string['border'] = 'Bordeado';
$string['cardradius'] = 'Radio de la tarjeta';

// Frontpage old string

$string['homepagesettings'] = 'ParamÃ©trage de la page d\'accueil';

$string['frontpagedesign'] = 'Diseño de portada';
$string['frontpagedesigndesc'] = 'Esta sección se relaciona con el estilo de diseño de la portada.';
$string['frontpagechooser'] = 'Elija diseño de portada';
$string['frontpagechooserdesc'] = 'Elija su diseño de portada.';
$string['frontpagedesignold'] = 'Diseño antiguo predeterminado';
$string['frontpagedesignolddesc'] = 'Panel predeterminado como el anterior.';
$string['frontpagedesignnew'] = 'Nuevo diseño';
$string['frontpagedesignnewdesc'] = 'Nuevo diseño fresco con múltiples secciones. Puede configurar las secciones individualmente en la portada.';
$string['newhomepagedescription'] = 'Haga clic en Inicio del sitio en la barra de navegación para ir a la página principal y crear su propia página de inicio';
$string['frontpageloader'] = 'Subir imagen del cargador para portada';
$string['frontpageloaderdesc'] = 'Esto reemplaza el cargador por defecto con su imagen';

/*theme_remUI_frontpage*/

 $string['frontpageimagecontent'] = 'Contenido de la cabecera';
$string['frontpageimagecontentdesc'] = ' Esta sección pertenece a la parte superior de la página principal.';
$string['frontpageimagecontentstyle'] = 'Estilo';
$string['frontpageimagecontentstyledesc'] = 'Usted puede escoger entre Static & Slider.';
$string['staticcontent'] = 'Estático';
$string['slidercontent'] = 'Slider';
$string['addtext'] = 'Agregar texto';
$string['defaultaddtext'] = 'La educación es el camino comprobado hacia el progreso.';
$string['addtextdesc'] = 'Desde aquí usted puede agregar el texto que se mostrará en la página principal, de preferencia en HTML.';
$string['uploadimage'] = 'Cargar imagen';
$string['uploadimagedesc'] = 'Usted puede cargar una imagen como contenido para la diapositiva';
$string['video'] = 'iframe Embedded code';
$string['videodesc'] = ' Aquí usted puede insertar el código iframe Embedded del vídeo que desea insertar.';
$string['contenttype'] = 'Seleccione tipo de contenido';
$string['contentdesc'] = 'Usted puede escoger una imagen o insertar una dirección url de vídeo.';
$string['image'] = 'Imagen';
$string['videourl'] = 'Video URL';

$string['slidercount'] = 'Número de diapositivas';
$string['slidercountdesc'] = '';
$string['one'] = '1';
$string['two'] = '2';
$string['three'] = '3';
$string['five'] = '5';

$string['slideimage'] = 'Cargar imágenes para diapositiva';
$string['slideimagedesc'] = 'Usted puede cargar una imagen como contenido para esta diapositiva.';
$string['slidertext'] = 'Agregar texto de diapositiva';
$string['defaultslidertext'] = '';
$string['slidertextdesc'] = 'Usted puede insertar contenido de texto en este lugar, de preferencia en HTML.';
$string['sliderurl'] = 'Agregar enlace para el botón de la diapositiva';
$string['sliderbuttontext'] = 'Agregar texto para el botón en la diapositiva';
$string['sliderbuttontextdesc'] = 'Usted puede agregar texto al botón en esta diapositiva.';
$string['sliderurldesc'] = 'Inserte el enlace de la página hacia donde será dirigido después de hacer clic en el botón.';
$string['slideinterval'] = 'Intervalo de diapositiva';
$string['slideintervaldesc'] = 'Usted puede establecer la transición de tiempo entre diapositivas. Si sólo hay una diapositiva esta opción no tendrá efecto.';
$string['sliderautoplay'] = 'Establecer Slider en Autoplay';
$string['sliderautoplaydesc'] = 'Seleccione ‘Si’ si quiere una transición automática en el show de diapositivas.';
$string['true'] = 'Si';
$string['false'] = 'No';

$string['frontpageblocks'] = 'Contenido del cuerpo';
$string['frontpageblocksdesc'] = 'Usted puede insertar un título para el cuerpo de su sitio.';

$string['enablesectionbutton'] = 'Activar botones en secciones';
$string['enablesectionbuttondesc'] = 'Activar botones en las secciones de página.';

/* General section descriptions */
$string['frontpageblockiconsectiondesc'] = 'Usted puede elegir cualquier icono desde aquí <a href="https://fontawesome.com/v4.7.0/cheatsheet/" target="_new">list</a>. Sólo ingrese el texto después de "fa-". ';
$string['frontpageblockdescriptionsectiondesc'] = 'Una descripción corta sobre el título.';
$string['defaultdescriptionsection'] = 'Tecnologías a tiempo para escenarios corporativos.';
$string['sectionbuttontextdesc'] = 'Ingrese el texto para el botón en esta sección.';
$string['sectionbuttonlinkdesc'] = 'Ingrese la URL Para esta sección.';
$string['frontpageblocksectiondesc'] = 'Agregar un título a esta sección.';

/* block section 1 */
$string['frontpageblocksection1'] = 'Título del texto para la primera sección';
$string['frontpageblockdescriptionsection1'] = 'Descripción de la primera sección';
$string['frontpageblockiconsection1'] = 'Icono de Font-Awesome para la primera sección';
$string['sectionbuttontext1'] = 'Texto del botón para la primera sección';
$string['sectionbuttonlink1'] = 'URL link Para la primera sección';


/* block section 2 */
$string['frontpageblocksection2'] = 'Título para la segunda sección';
$string['frontpageblockdescriptionsection2'] = 'Descripción para la segunda sección';
$string['frontpageblockiconsection2'] = 'Icono Font-Awesome para la segunda sección';
$string['sectionbuttontext2'] = 'Texto del botón Para la segunda sección';
$string['sectionbuttonlink2'] = 'URL link Para la segunda sección';


/* block section 3 */
$string['frontpageblocksection3'] = 'Título para la tercera sección';
$string['frontpageblockdescriptionsection3'] = 'Descripción para la tercera sección';
$string['frontpageblockiconsection3'] = 'Icono Font-Awesome para la tercera sección';
$string['sectionbuttontext3'] = 'Texto del botón Para la tercera sección';
$string['sectionbuttonlink3'] = 'URL link Para la tercera sección';


/* block section 4 */
$string['frontpageblocksection4'] = 'Título para la cuarta sección';
$string['frontpageblockdescriptionsection4'] = 'Descripción para la cuarta sección';
$string['frontpageblockiconsection4'] = 'Icono Font-Awesome para la cuarta sección';
$string['sectionbuttontext4'] = 'Texto del botón para la cuarta sección';
$string['sectionbuttonlink4'] = 'URL link Para la cuarta sección';

// Frontpage Aboutus settings
$string['frontpageaboutus'] = 'Página principal Sobre nosotros';
$string['frontpageaboutusdesc'] = 'Esta sección es para la página "sobre nosotros"';
$string['frontpageaboutustitledesc'] = 'Agregar título a la sección Acerca de nosotros';
$string['frontpageaboutusbody'] = 'Descripción del cuerpo de la sección Acerca de nosotros';
$string['frontpageaboutusbodydesc'] = 'Una breve descripción sobre esta sección';

$string['enablefrontpageaboutus'] = 'Activar la sección sobre nosotros';
$string['enablefrontpageaboutusdesc'] = 'Activar la sección sobre nosotros en la página principal.';
$string['frontpageaboutusheading'] = 'Título sobre nosotros';
$string['frontpageaboutusheadingdesc'] = 'Cabecera de texto de esta sección';
$string['frontpageaboutustext'] = 'Texto sobre nosotros';
$string['frontpageaboutustextdesc'] = 'Ingresar el texto sobre nosotros.';
$string['frontpageaboutusdefault'] = '<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Ut enim ad minim veniam.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.Lorem ipsum dolor sit amet,
                  consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                  labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur
                  adipisicing elit, sed do eiusmod tempor incididunt
                  ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>';
$string['frontpageaboutusimage'] = 'Imagen sobre nosotros';
$string['frontpageaboutusimagedesc'] = 'Cargar la imagen sobre nosotros';

// latest 3.3 to be arranged later
$string['testimonialcount'] = 'Recuento de testimonios';
$string['testimonialcountdesc'] = 'Numero de testiomios para mostrar.';
$string['testimonialimage'] = 'Imagen para testimonios';
$string['testimonialimagedesc'] = 'Imagen de la persona para mostrar con testimonios';
$string['testimonialname'] = 'Nombre de la persona';
$string['testimonialnamedesc'] = 'Nombre de la persona';
$string['testimonialdesignation'] = 'Designación de la persona';
$string['testimonialdesignationdesc'] = 'Designación de la persona\s.';
$string['testimonialtext'] = 'Testimonios de las persona\s';
$string['testimonialtextdesc'] = 'Qué dice la persona';

/*Front Page Setting for About Us Block*/
$string['frontpageblockdisplay'] = 'Sección Sobre nosotros';
$string['frontpageblockdisplaydesc'] = 'Puede mostrar u ocultar la sección "Acerca de nosotros", también puede mostrarla en formato de cuadrícula';
$string['donotshowaboutus'] = 'No mostrar';
$string['showaboutusinrow'] = 'Mostrar sección en una fila';
$string['showaboutusingridblock'] = 'Mostrar sección en bloque de cuadrícula';
