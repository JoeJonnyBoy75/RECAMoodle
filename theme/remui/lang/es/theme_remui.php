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

$string['advancedsettings'] = 'Ajustes avanzados';
$string['backgroundimage'] = 'Imagen de fondo';
$string['backgroundimage_desc'] = 'La imagen para mostrar como fondo del sitio. La imagen de fondo que cargue aquí anulará la imagen de fondo en sus archivos preestablecidos de tema.';
$string['brandcolor'] = 'Color de la marca';
$string['brandcolor_desc'] = 'El color de acento.';
$string['bootswatch'] = 'Bootswatch';
$string['bootswatch_desc'] = 'Un bootswatch es un conjunto de variables Bootstrap y css para diseñar Bootstrap';
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
        <img src="' . $CFG->wwwroot . '/theme/remui/pix/selection.png" class="w-full" alt="Edwiser RemUI screen shot" style="max-width: 100%;"/>
        </div>
        <br><br>
        <div class="text-center">
            <div class="btn-group text-center" role="group" aria-label="...">
              <div class="btn-group mr-1" role="group">
                <a href="https://edwiser.helpscoutdocs.com/collection/78-edwiser-remui-theme" target="_blank" class="btn btn-primary btn-round">FAQ</a>&nbsp;
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
$string['aboutremui'] = 'Acerca de Edwiser RemUI';
$string['currentinparentheses'] = '(actual)';
$string['configtitle'] = 'Edwiser RemUI';
$string['fontsize'] = 'Tamaño de fuente base del tema';
$string['fontsize_desc'] = 'Ingrese un tamaño de fuente en%';
$string['nobootswatch'] = 'Ninguno';
$string['pluginname'] = 'Edwiser RemUI';
$string['presetfiles'] = 'Archivos preestablecidos de temas adicionales';
$string['presetfiles_desc'] = 'Los archivos preestablecidos se pueden usar para alterar dramáticamente la apariencia del tema';
$string['preset'] = 'Tema preestablecido';
$string['preset_desc'] = 'Elija un ajuste preestablecido para cambiar ampliamente el aspecto del tema.';
$string['privacy:metadata'] = 'El tema remui no almacena ningún dato personal sobre ningún usuario.';
$string['rawscss'] = 'Raw SCSS';
$string['rawscss_desc'] = 'Use este campo para proporcionar código SCSS o CSS que se inyectará al final de la hoja de estilo.';
$string['rawscsspre'] = 'SCSS inicial sin procesar';
$string['rawscsspre_desc'] = 'En este campo puede proporcionar el código SCSS de inicialización, se inyectará antes que todo lo demás. La mayoría de las veces usará esta configuración para definir variables.';
$string['region-side-pre'] = 'Derecha';
$string['privacy:metadata:preference:draweropennav'] = 'La preferencia del usuario para ocultar o mostrar la navegación del menú del cajón.';
$string['privacy:drawernavclosed'] = 'La preferencia actual para el cajón de navegación está cerrada.';
$string['privacy:drawernavopen'] = 'La preferencia actual para el cajón de navegación está abierta.';
$string['privacy:metadata:preference:course_view_state'] = 'El tipo de pantalla que el usuario prefiere para la lista de cursos';
$string['cachedef_courses'] = 'Caché para cursos';
$string['cachedef_guestcourses'] = 'Caché para cursos de invitados';
$string['cachedef_updates'] = 'Caché para actualizaciones';
$string['course_view_state_description_grid'] = 'Para mostrar los cursos en formato de cuadrícula';
$string['course_view_state_description_list'] = 'Para mostrar los cursos en formato de lista';

// Course view preference.
$string['privacy:metadata:preference:viewCourseCategory'] = 'El tipo de pantalla que el usuario prefiere para la lista de cursos';
$string['viewCourseCategory_grid'] = 'Para mostrar los cursos en formato de cuadrícula';
$string['viewCourseCategory_list'] = 'Para mostrar los cursos en formato de lista';

// Aside right view preference.
$string['privacy:metadata:preference:aside_right_state'] = 'Si el bloque a un lado de la derecha debe mantenerse abierto o cerrado';
$string['aside_right_state_'] = 'Para mostrar el bloque a un lado a la derecha como abierto'; // Blank value.
$string['aside_right_state_overrideaside'] = 'Para mostrar el bloque a un lado a la derecha como cerrado'; // Overrideaside.

// Menu view preference.
$string['privacy:metadata:preference:menubar_state'] = 'El tipo de pantalla que el usuario prefiere para la barra de menú';
$string['menubar_state_fold'] = 'Para mostrar la barra de menú como doblada';
$string['menubar_state_unfold'] = 'Para mostrar la barra de menú como desplegada';
$string['menubar_state_open'] = 'Para mostrar la barra de menú como abierta';
$string['menubar_state_hide'] = 'Para mostrar la barra de menú como oculta';

// Profile Page.
$string['administrator'] = 'Administrador';
$string['contacts'] = 'Contactos';
$string['blogentries'] = 'Entradas de Blog';
$string['discussions'] = 'Discusiones';
$string['aboutme'] = 'Acerca de Mi';
$string['courses'] = 'Cursos';
$string['interests'] = 'Intereses';
$string['institution'] = 'Departamento e Institución';
$string['location'] = 'Lugar';
$string['description'] = 'Descripción';
$string['editprofile'] = 'Editar Perfil';
$string['start_date'] = 'Fecha de inicio';
$string['complete'] = 'Completado';
$string['surname'] = 'Apellido';
$string['actioncouldnotbeperformed'] = 'No se pudo ejecutar la accion!';
$string['enterfirstname'] = 'Por favor, ingrese su nombre.';
$string['enterlastname'] = 'Por favor, ingrese su apellido.';
$string['enteremailid'] = 'Ingrese su identificación de EMAIL.';
$string['enterproperemailid'] = 'Por favor, ingrese una dirección de EMAIL correcta.';
$string['detailssavedsuccessfully'] = 'Detalles Guardados Correctamente!';
$string['forgotpassword'] = 'Contraseña olvidada?';

// Left Navigation Drawer.
$string['createarchivepage'] = 'Página de archivo del curso';
$string['createanewcourse'] = 'Crear un curso nuevo';
$string['remuisettings'] = 'Configuración de RemUI';

// Right Navigation Drawer.
$string['navbartype'] = 'Color de la barra de navegación';
$string['sidebarcolor'] = 'Color de la barra lateral';
$string['sitecolor'] = 'Color del sitio';
$string['applysitewide'] = 'Aplicar en todo el sitio';
$string['applysitecolor'] = 'Aplicar Color del Sitio';
$string['sidebarpinned'] = 'Barra lateral fijada';
$string['sidebarunpinned'] = 'Barra lateral sin fijar';
$string['pinsidebar'] = 'Pin barra lateral';
$string['unpinsidebar'] = 'Desanclar barra lateral';
$string['primary'] = 'Primario';
$string['brown'] = 'marrón';
$string['cyan'] = 'Cian';
$string['green'] = 'Verde';
$string['grey'] = 'Gris';
$string['indigo'] = 'Índigo';
$string['orange'] = 'naranja';
$string['pink'] = 'Rosado';
$string['purple'] = 'Púrpura';
$string['red'] = 'rojo';
$string['teal'] = 'Verde azulado';
$string['custom-color'] = 'Color personalizado';
$string['dark'] = 'Oscuro';
$string['light'] = 'Ligero';

// General Settings.
$string['generalsettings' ] = 'Configuración General';
$string['enableannouncement'] = "Habilitar el anuncio en todo el sitio";
$string['enableannouncementdesc'] = "Habilitar anuncios en todo el sitio para todos los usuarios.";
$string['enabledismissannouncement'] = "Habilitar anuncios descartables en todo el sitio";
$string['enabledismissannouncementdesc'] = "Si está habilitado, permita que los usuarios ignoren el anuncio.";

$string['announcementtext'] = "AVISO";
$string['announcementtextdesc'] = "Mensaje de aviso para mostrar en todo el sitio.";
$string['announcementtype'] = "Tipo de aviso";
$string['announcementtypedesc'] = "Seleccione el tipo de anuncio para mostrar un color de fondo diferente para el anuncio.";
$string['typeinfo'] = "información";
$string['typedanger'] = "urgente";
$string['typewarning'] = "Advertencia";
$string['typesuccess'] = "Éxito";
$string['enablerecentcourses'] = 'Habilitar cursos recientes';
$string['enablerecentcoursesdesc'] = 'Si está habilitado, el menú desplegable de los cursos recientes se mostrará en el encabezado.';
$string['mergemessagingsidebar'] = 'Panel de mensajes de combinación';
$string['mergemessagingsidebardesc'] = 'Fusionar el panel de mensajes en la barra lateral derecha';
$string['none'] = 'Ninguna';
$string['enablenewcoursecards'] = 'Diseños de tarjetas del curso';
$string['enablenewcoursecardsdesc'] = 'Seleccione el diseño de la tarjeta del curso para que aparezca en la página de archivo del curso';
$string['activitynextpreviousbutton'] = 'Habilitar el botón de actividad siguiente y anterior';
$string['activitynextpreviousbuttondesc'] = 'Cuando está habilitado, el botón Actividad siguiente y anterior aparecerá en la página Actividad única para cambiar entre actividades';
$string['disablenextprevious'] = 'Inhabilitar';
$string['enablenextprevious'] = 'Habilitar';
$string['enablenextpreviouswithname'] = 'Activar con el nombre de la actividad';
$string['logoorsitename'] = 'Elegir el formato del logo';
$string['logoorsitenamedesc'] = 'Logotipo: solo se mostrará el logotipo; <br /> Icono + nombre del sitio: se mostrará un icono junto con el nombre del sitio. <br/> Nombre del sitio con logotipo: el nombre y el logotipo del sitio se mostrarán (solo en el menú inferior del icono superior del diseño del encabezado)';
$string['onlylogo'] = 'Únicamente el logo';
$string['iconsitename'] = 'Icono y nombre del sitio';
$string['logo'] = 'Logo';
$string['logodesc'] = 'Usted puede agregar el logo que se mostrara en la cabecera. Nota - El alto preferido es 50px. Si desea personalizarlo, Puede hacerlo desde la caja CSS.';
$string['logomini'] = 'LogotipoMini';
$string['icononly'] = 'Solo icono';
$string['logominidesc'] = 'Puede agregar el logomini que se mostrará en el encabezado cuando la barra lateral esté contraída. Nota- La altura preferida es 50px. En caso de que desee personalizar, puede hacerlo desde el cuadro personalizado de CSS.';
$string['siteicon'] = 'Icono del sitio';
$string['siteicondesc'] = 'Si no tiene un icono puede elegir uno de <a href="https://fontawesome.com/v4.7.0/cheatsheet/" target="_new"><b style="color:#17a2b8!important">list</b></a>. <br /> Solo ingrese el texto que aparece después de "fa-".';
$string['customcss'] = 'Personalizar CSS';
$string['customcssdesc'] = 'Usted puede personalizar las CSS Desde la caja de texto superior. Los cambios se reflejarán en todas las páginas de su sitio.';
$string['favicon'] = 'Favicon';
$string['favicosize'] = 'El tamaño esperado es de 16x16 píxeles';
$string['favicondesc'] = 'El favicon de su sitio. Inserte aquí el icono de su sitio.';
$string['fontselect'] = 'Selector del Tipo de Fuente';
$string['fontselectdesc'] = 'Selecciones fuentes estándar o <a href="https://fonts.google.com/" target="_new">fuentes Google</a>. Por favor guarde los cambios antes de mostrar su selección. Nota: Si la fuente personalizadora se establece en el estándar, se aplicará la fuente Web de Google.';
$string['fonttypestandard'] = 'Fuente Estándar';
$string['fonttypegoogle'] = 'Fuente Google';
$string['fontname'] = 'Tipografía del sitio';
$string['fontnamedesc'] = 'Seleccione el nombre exacto de la tipografía para usar en Moodle.';
$string['googleanalytics'] = 'ID de seguimiento de Google Analytics';
$string['googleanalyticsdesc'] = 'Ingresa tu ID de seguimiento de Google Analytics para habilitar los análisis en tu sitio web. El formato de ID de seguimiento debe ser como [UA-XXXXX-Y].<br />
Tenga en cuenta que al incluir esta configuración, estará enviando datos a Google Analytics y debe asegurarse de que sus usuarios estén advertidos al respecto. Nuestro producto no almacena ninguno de los datos que se envían a Google Analytics.';
$string['enablecoursestats'] = 'Habilitar estadísticas del curso';
$string['enablecoursestatsdesc'] = 'Si está habilitado, el administrador, los gerentes y el profesor verán las estadísticas del usuario relacionadas con el curso inscrito en la página de un solo curso.';
$string['enabledictionary'] = 'Habilitar diccionario';
$string['enabledictionarydesc'] = 'Si está habilitado, la función Diccionario se activará y mostrará el significado del texto seleccionado.';
$string['more'] = 'Más...';


// Frontpage Old String
// Home Page Settings.
$string['homepagesettings'] = "ParamÃ©trage de la page d\'accueil";
$string['frontpagedesign'] = 'Diseño de portada';
$string['frontpagedesigndesc'] = 'Habilite Legacy Builder o el constructor de página de inicio de Edwiser RemUI';
$string['frontpagechooser'] = 'Elija diseño de portada';
$string['frontpagechooserdesc'] = 'Elija su diseño de portada.';
$string['frontpagedesignold'] = 'Predeterminado: Creador de página de inicio heredado';
$string['frontpagedesignolddesc'] = 'Panel predeterminado como el anterior.';
$string['frontpagedesignnew'] = 'Nuevo diseño';
$string['frontpagedesignnewdesc'] = 'Nuevo diseño fresco con múltiples secciones. Puede configurar las secciones individualmente en la portada.';
$string['newhomepagedescription'] = 'Haga clic en Inicio del sitio en la barra de navegación para ir a la página principal y crear su propia página de inicio';
$string['frontpageloader'] = 'Subir imagen del cargador para portada';
$string['frontpageloaderdesc'] = 'Esto reemplaza el cargador por defecto con su imagen';
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
$string['imageorvideo'] = 'Imagen / Video';
$string['image'] = 'Imagen';
$string['videourl'] = 'Video URL';
$string['slideinterval'] = 'Intervalo de diapositiva';
$string['slideintervalplaceholder'] = 'Número entero positivo en milisegundos.';
$string['slideintervaldesc'] = 'Usted puede establecer la transición de tiempo entre diapositivas. Si sólo hay una diapositiva esta opción no tendrá efecto.';
$string['slidercount'] = 'Número de diapositivas';
$string['slidercountdesc'] = '';
$string['one'] = '1';
$string['two'] = '2';
$string['three'] = '3';
$string['four'] = '4';
$string['five'] = '5';
$string['eight'] = '8';
$string['twelve'] = '12';
$string['slideimage'] = 'Cargar imágenes para diapositiva';
$string['slideimagedesc'] = 'Usted puede cargar una imagen como contenido para esta diapositiva.';
$string['sliderurl'] = 'Agregar enlace para el botón de la diapositiva';
$string['slidertext'] = 'Agregar texto de diapositiva';
$string['defaultslidertext'] = '';
$string['slidertextdesc'] = 'Usted puede insertar contenido de texto en este lugar, de preferencia en HTML.';
$string['sliderbuttontext'] = 'Agregar texto para el botón en la diapositiva';
$string['sliderbuttontextdesc'] = 'Usted puede agregar texto al botón en esta diapositiva.';
$string['sliderurldesc'] = 'Inserte el enlace de la página hacia donde será dirigido después de hacer clic en el botón.';
$string['sliderautoplay'] = 'Establecer Slider en Autoplay';
$string['sliderautoplaydesc'] = "Seleccione \'Si\' si quiere una transición automática en el show de diapositivas.";
$string['true'] = 'Si';
$string['false'] = 'No';
$string['frontpageblocks'] = 'Contenido del cuerpo';
$string['frontpageblocksdesc'] = 'Usted puede insertar un título para el cuerpo de su sitio.';
$string['frontpageblockdisplay'] = 'Sección Sobre nosotros';
$string['frontpageblockdisplaydesc'] = 'Puede mostrar u ocultar la sección "Acerca de nosotros", también puede mostrarla en formato de cuadrícula';
$string['donotshowaboutus'] = 'No mostrar';
$string['showaboutusinrow'] = 'Mostrar sección en una fila';
$string['showaboutusingridblock'] = 'Mostrar sección en bloque de cuadrícula';

// About Us.
$string['frontpageaboutus'] = 'Página principal Sobre nosotros';
$string['frontpageaboutusdesc'] = 'Esta sección es para la página "sobre nosotros"';
$string['frontpageaboutustitledesc'] = 'Agregar título a la sección Acerca de nosotros';
$string['frontpageaboutusbody'] = 'Descripción del cuerpo de la sección Acerca de nosotros';
$string['frontpageaboutusbodydesc'] = 'Una breve descripción sobre esta sección';
$string['enablesectionbutton'] = 'Activar botones en secciones';
$string['enablesectionbuttondesc'] = 'Activar botones en las secciones de página.';
$string['sectionbuttontextdesc'] = 'Ingrese el texto para el botón en esta sección.';
$string['sectionbuttonlinkdesc'] = 'Ingrese la URL Para esta sección.';
$string['frontpageblocksectiondesc'] = 'Agregar un título a esta sección.';

// Block section 1.
$string['frontpageblocksection1'] = 'Título del texto para la primera sección';
$string['frontpageblockdescriptionsection1'] = 'Descripción de la primera sección';
$string['frontpageblockiconsection1'] = 'Icono de Font-Awesome para la primera sección';
$string['sectionbuttontext1'] = 'Texto del botón para la primera sección';
$string['sectionbuttonlink1'] = 'URL link Para la primera sección';

// Block section 2.
$string['frontpageblocksection2'] = 'Título para la segunda sección';
$string['frontpageblockdescriptionsection2'] = 'Descripción para la segunda sección';
$string['frontpageblockiconsection2'] = 'Icono Font-Awesome para la segunda sección';
$string['sectionbuttontext2'] = 'Texto del botón Para la segunda sección';
$string['sectionbuttonlink2'] = 'URL link Para la segunda sección';

// Block section 3.
$string['frontpageblocksection3'] = 'Título para la tercera sección';
$string['frontpageblockdescriptionsection3'] = 'Descripción para la tercera sección';
$string['frontpageblockiconsection3'] = 'Icono Font-Awesome para la tercera sección';
$string['sectionbuttontext3'] = 'Texto del botón Para la tercera sección';
$string['sectionbuttonlink3'] = 'URL link Para la tercera sección';

// Block section 4.
$string['frontpageblocksection4'] = 'Título para la cuarta sección';
$string['frontpageblockdescriptionsection4'] = 'Descripción para la cuarta sección';
$string['frontpageblockiconsection4'] = 'Icono Font-Awesome para la cuarta sección';
$string['sectionbuttontext4'] = 'Texto del botón para la cuarta sección';
$string['sectionbuttonlink4'] = 'URL link Para la cuarta sección';
$string['defaultdescriptionsection'] = 'Tecnologías a tiempo para escenarios corporativos.';
$string['frontpageaboutus'] = 'Página principal Sobre nosotros';
$string['frontpageaboutusdesc'] = 'Esta sección es para la página "sobre nosotros"';
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
$string['testimonialcount'] = 'Recuento de testimonios';
$string['testimonialcountdesc'] = 'Numero de testiomios para mostrar.';
$string['frontpagetestimonial'] = 'Testimonio de portada';
$string['frontpagetestimonialdesc'] = 'Sección de testimonios de la portada';
$string['testimonialimage'] = 'Imagen para testimonios';
$string['testimonialimagedesc'] = 'Imagen de la persona para mostrar con testimonios';
$string['testimonialname'] = 'Nombre de la persona';
$string['testimonialnamedesc'] = 'Nombre de la persona';
$string['testimonialdesignation'] = 'Designación de la persona';
$string['testimonialdesignationdesc'] = 'Designación de la persona\s.';
$string['testimonialtext'] = 'Testimonios de las persona\s';
$string['testimonialtextdesc'] = 'Qué dice la persona';
$string['frontpageblockimage'] = 'Cargar imagen';
$string['frontpageblockimagedesc'] = 'Puede cargar una imagen como contenido para esto.';
$string['frontpageblockiconsectiondesc'] = 'Usted puede elegir cualquier icono desde aquí <a href="https://fontawesome.com/v4.7.0/cheatsheet/" target="_new">list</a>. Sólo ingrese el texto después de "fa-". ';
$string['frontpageblockdescriptionsectiondesc'] = 'Una descripción corta sobre el título.';


// Footer Page Settings.
$string['footersettings'] = 'Configuración del pie de página';
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
$string['footerbottomtext'] = 'Texto de la parte inferior izquierda del pie de página.';
$string['footerbottomlink'] = 'Enlace del Pie de Página';
$string['footerbottomlinkdesc'] = 'Ingresar la URL del enlace en la parte inferior del Pie de Página. http://www.yourcompany.com';
$string['footercolumn1heading'] = 'Contenido de la primera columna (izquierda)';
$string['footercolumn1headingdesc'] = 'Esta sección pertenece a la zona izquierda del pie de página en la página principal.';
$string['footercolumn1title'] = 'Título de la primera columna';
$string['footercolumn1titledesc'] = 'Agregar título a esta columna.';
$string['footercolumn1customhtml'] = 'Personalizar HTML';
$string['footercolumn1customhtmldesc'] = 'Usted puede personalizar el html de esta columna utilizando la caja de texto superior.';
$string['footercolumn2heading'] = 'Contenido de la segunda columna (Medio)';
$string['footercolumn2headingdesc'] = 'Esta sección pertenece a la zona central del pie de página en la página principal.';
$string['footercolumn2title'] = 'Título de la segunda columna';
$string['footercolumn2titledesc'] = 'Agregar título a esta columna.';
$string['footercolumn2customhtml'] = 'Personalizar HTML';
$string['footercolumn2customhtmldesc'] = 'Usted puede personalizar el html de esta columna utilizando la caja superior.';
$string['footercolumn3heading'] = 'Contenido de la tercera columna (Derecha)';
$string['footercolumn3headingdesc'] = 'Esta sección pertenece a la zona derecha del pie de página en la página principal.';
$string['footercolumn3title'] = 'Titulo de la Tercera Columna';
$string['footercolumn3titledesc'] = 'Agregar Titulo a esta columna.';
$string['footercolumn3customhtml'] = 'Personalizar HTML';
$string['footercolumn3customhtmldesc'] = 'Personalizar HTML de esta columna utilizando la caja superior.';
$string['footerbottomheading'] = 'Configuración de la parte inferior del pie de pagina';
$string['footerbottomdesc'] = 'Aquí puede especificar su propio enlace para mostrar hasta abajo del pie de página';
$string['footerbottomtextdesc'] = 'Agregar texto para configurar la parte inferior del Pie de Página.';
$string['poweredbyedwiser'] = 'Desarrollado por Edwiser';
$string['poweredbyedwiserdesc'] = "Desmarcar para eliminar \'Desarrollado por Edwiser\' de su sitio.";

// Login Page Settings.
$string['loginsettings'] = 'Configuración de la página de login';
$string['navlogin_popup'] = 'Habilitar el popup de inicio de sesión';
$string['navlogin_popupdesc'] = 'Habilite la ventana emergente de inicio de sesión para iniciar sesión rápidamente sin redirigir a la página de inicio de sesión';
$string['loginsettingpic'] = 'Cargar imagen de fondo';
$string['loginsettingpicdesc'] = 'Cargar una imagen como fondo para el formulario de ingreso.';
$string['signuptextcolor'] = 'Signup Descripción Color';
$string['signuptextcolordesc'] = 'Seleccione el color de texto para la descripción de la página de registro.';
$string['left'] = "Izquierdo";
$string['right'] = "Derecho";
$string['remember_me'] = "Recuérdame";
$string['brandlogopos'] = "Mostrar logotipo en la página de inicio de sesión";
$string['brandlogoposdesc'] = "Si está habilitado, el logotipo de la marca se mostrará en la página de inicio de sesión.";
$string['brandlogotext'] = "Sitio descripción";
$string['brandlogotextdesc'] = "Agregar texto para la descripción del sitio que se mostrará en la página de inicio de sesión y registro. Manténgalo en blanco si no desea poner ninguna descripción.";
$string['loginpagelayout'] = 'Diseño de página de inicio de sesión';
$string['loginpagelayoutdesc'] = '';
$string['centerlayout'] = 'Diseño Centrado';
$string['overlaylayout'] = 'Diseño de superposición derecha';

// License Settings.
$string['licensenotactive'] = '<strong>Alerta!</strong> Su licencia no está activa, por favor <strong>actívela</strong> en la configuración de RemUI.';
$string['licensenotactiveadmin'] = '<strong>Alerta!</strong> Licencia no activada , por favor <strong>active</strong> la licencia <a href="'.$CFG->wwwroot.'/admin/settings.php?section=themesettingremui#informationcenter" > here</a>.';
$string['activatelicense'] = 'Activar Licencia';
$string['deactivatelicense'] = 'Desactivar Licencia';
$string['renewlicense'] = 'Renovar Licencia';
$string['deactivated'] = 'Desactivado';
$string['active'] = 'Activa';
$string['notactive'] = 'No Activa';
$string['expired'] = 'Caducada';
$string['licensekey'] = 'Clave de Licencia';
$string['licensestatus'] = 'Estado de la Licencia';
$string['no_activations_left'] = 'Límite excedido';
$string['activationfailed'] = 'La activación de la clave de licencia falló. Por favor, inténtelo de nuevo más tarde.';
$string['noresponsereceived'] = 'No se pudo conectar con el servidor. Por favor intentelo más tarde.';
$string['licensekeydeactivated'] = 'Codigo de Licencia desactivado.';
$string['siteinactive'] = 'Sitio inactivo (Presione activar licencia).';
$string['entervalidlicensekey'] = 'Por favor ingrese un código de licencia valido.';
$string['licensekeyisdisabled'] = 'Su código de licencia esta desactivado.';
$string['licensekeyhasexpired'] = "Su licencia ha caducado. Por favor renuévela.";
$string['licensekeyactivated'] = "Su licencia ha sido activada.";
$string['enterlicensekey'] = "Por favor escriba un código de licencia valido.";
$string['edwiserremuilicenseactivation'] = 'Edwiser RemUI Activación de Licencia';
$string['nolicenselimitleft'] = 'Límite máximo de activación alcanzado, No quedan activaciones.';

// News And Updates Page.
$string['newsandupdates'] = 'Novedades y actualizaciones';
$string['newupdatemessage'] = 'Nueva actualización disponible de RemUI. <a class="text-white" href="{$a}"><u>Haga clic aquí</u></a> para ver.';
$string['currentversionmessage'] = 'La versión actual es ';
$string['downloadupdate'] = 'Descargar actualización';
$string['latestversionmessage'] = 'Está utilizando la última versión de RemUI.';
$string['rateremui'] = 'Valore RemUI';
$string['fullname']  = 'Nombre completo';
$string['providefeedback'] = 'Denos su opinión sobre RemUI';
$string['sendfeedback'] = 'Enviar opinión';
$string['recentnews'] = 'Noticias recientes';

// About Edwiser RemUI.
$string['aboutsettings'] = 'Sobre Edwiser RemUI';
$string['notenrolledanycourse'] = 'Usted no está inscrito(a) en ningún curso.';

// My Course Page.
$string['resume'] = 'Reanudar';
$string['start'] = 'Comienzo';
$string['completed'] = 'Terminado';

// Course.
$string['graderreport'] = 'Informe de calificación';
$string['enroluser'] = 'Inscribir Usuarios';
$string['activityeport'] = 'Informe de actividades';
$string['editcourse'] = 'Editar curso';
$string['sections'] = "Secciones";

// Next Previous Activity.
$string['activityprev'] = 'Actividad previa';
$string['activitynext'] = 'Próxima actividad';

// Login Page.
$string['signin'] = 'Registrarse';
$string['signup'] = 'Darse de alta';
$string['noaccount'] = 'No tienes cuenta?';

// Incourse Page.
$string['backtocourse'] = 'Resumen del curso';

// Header Section.
$string['togglefullscreen'] = 'Pantalla completa';
$string['recent'] = 'Reciente';

// Course Stats.
$string['enrolledusers'] = 'Estudiantes <br>inscritos';
$string['studentcompleted'] = 'Estudiantes <br>completados';
$string['inprogress'] = 'En <br>progreso';
$string['yettostart'] = 'Aún <br>para empezar';

// Footer Content.
$string['followus'] = 'Síguenos';
$string['poweredby'] = 'Desarrollado por Edwiser RemUI';

// Course Archive Page.
$string['mycourses'] = "Mis cursos";
$string['allcategories'] = 'Todas las categorías';
$string['categorysort'] = 'Ordenar categorías';
$string['sortdefault'] = 'Ordenar (ninguno)';
$string['sortascending'] = 'Ordenar de la A a la Z';
$string['sortdescending'] = 'Ordenar Z a A';

// Dashboard Blocks.
$string['viewcourse'] = "VER CURSO";
$string['viewcourselow'] = "ver curso";
$string['searchcourses'] = "Buscar cursos";

$string['hiddencourse'] = 'Curso oculto';

// Usage tracking.
$string['enableusagetracking'] = "Habilitar tracking de uso";

$string['enableusagetrackingdesc'] = "<strong>AVISO DE SEGUIMIENTO DE USO</strong>

<hr class='text-muted' />

<p>Edwiser de ahora en adelante recopilará datos anónimos para generar estadísticas de uso del producto.</p>

<p>Esta información nos ayudará a guiar el desarrollo en la dirección correcta y la comunidad Edwiser prosperará.</p>

<p>Dicho esto, no recopilamos sus datos personales ni de sus alumnos durante este proceso. Puede desactivar esto desde el plugin siempre que desee optar por no participar en este servicio.</p>

<p>Una visión general de los datos recopilados está disponible <strong><a href='https://forums.edwiser.org/topic/67/anonymously-tracking-the-usage-of-edwiser-products' target='_blank'>aquí</a></strong>.</p>";

$string['focusmodesettings'] = 'Configuración del modo de enfoque';
$string['focusmode'] = 'Modo de enfoque';
$string['enablefocusmode'] = 'Habilitar modo de enfoque';
$string['enablefocusmodedesc'] = 'Si está habilitado, aparecerá un botón para cambiar al aprendizaje sin distracciones en la página del curso';
$string['focusmodeenabled'] = 'Modo de enfoque Habilitado';
$string['focusmodedisabled'] = 'Modo de enfoque Deshabilitado';
$string['coursedata'] = 'Datos del curso';

$string['prev'] = 'Previo';
$string['next'] = 'Próximo';

// RemUI one-click update.
$string['errors'] = 'Errores';
$string['invalidzip'] = 'Archivo zip no válido. <b>{$a}</b>';
$string['errorfetching'] = 'Error al obtener el ZIP del complemento. <b>{$a}</b>';
$string['errorfetchingexist'] = 'Error al obtener el ZIP del complemento: existe la ubicación de destino. <b>{$a}</b>';
$string['unabletounzip'] = 'No se puede descomprimir <b>{$a}</b>';
$string['unabletoloadplugindetails'] = 'No se pueden cargar los detalles del complemento <b>{$a}</b>';
$string['requirehigherversion'] = 'Requiere la versión de Moodle: <b>{$a}</b>';
$string['noupdates'] = 'Todo está al día.';
$string['invalidjsonfile'] = 'Error: JSON no válido de la lista de productos de Edwiser.';
$string['recommendation'] = 'Complementos recomendados';
$string['comeswith'] = 'Viene con: {$a}';
$string['changelog'] = 'Registro de cambios';
$string['currentrelease'] = 'Versión actual: {$a}';
$string['updateavailable'] = 'Actualización disponible: {$a}';
$string['uptodate'] = 'A hoy';

// Information center.
$string['informationcenter'] = 'Centro de Información';

$string['nocoursefound'] = 'No se encontró curso';

$string['badges'] = 'Insignias';

// Course Page Settings.
$string['coursesettings'] = "Configuración de la página del curso";
$string['enrolpagesettings'] = "Configuración de la página de inscripción";
$string['enrolpagesettingsdesc'] = "Administre el contenido de la página de inscripción aquí.";
$string['coursearchivepagesettings'] = 'Configuración del curso archivepage';
$string['coursearchivepagesettingsdesc'] = 'Administre el diseño y el contenido de la página de archivo del curso.';

$string['enrolment_payment'] = 'Pago del curso';
$string['enrolment_payment_desc'] = 'Configuración de las preferencias de inscripción al curso. ¿Todos los cursos requieren pago o algunos son gratuitos? Esta configuración dicta cómo funcionará y se mostrará la inscripción al curso.';
$string['allrequirepayment'] = 'Todos los cursos requieren pago';
$string['somearefree'] = 'Algunos cursos son gratuitos';
$string['allarefree'] = 'Todos los cursos son gratuitos';

$string['showcoursepricing'] = 'Mostrar precios del curso';
$string['showcoursepricingdesc'] = 'Habilite esta configuración para mostrar la sección de precios en la página de inscripción.';
$string['fullwidthcourseheader'] = 'Encabezado del curso de ancho completo';
$string['fullwidthcourseheaderdesc'] = 'Habilite esta configuración para que el encabezado del curso sea de ancho completo.';

$string['price'] = 'Precio';
$string['course_free'] = 'GRATIS';
$string['enrolnow'] = 'Inscribirse ahora';
$string['buyand'] = 'Comprar & ';
$string['notags'] = 'No etiquetas.';
$string['tags'] = 'Etiquetas';

$string['enrolment_layout'] = 'Diseño de la página de inscripción';
$string['enrolment_layout_desc'] = 'Habilite Edwiser Layout para un diseño de página de inscripción nuevo y mejorado';
$string['disable'] = 'Inhabilitar';
$string['defaultlayout'] = 'Diseño predeterminado de Moodle';
$string['enable_layout1'] = 'Diseño de Edwiser';

$string['webpage'] = "Página web";
$string['categorypagelayout'] = 'Diseño de página de archivo del curso';
$string['categorypagelayoutdesc'] = 'Seleccione entre los diseños de página de archivo del curso';
$string['edwiserlayout'] = 'Diseño de Edwiser';
$string['categoryfilter'] = 'Filtro de categoría';

$string['skill1'] = 'Principiante';
$string['skill2'] = 'Intermedio';
$string['skill3'] = 'Avanzado';

$string['lastupdatedon'] = 'Ultima actualización en ';

// Plural and Singular.
$string['hourcourse'] = ' Curso de hora';
$string['hourscourse'] = ' Hours Course';
$string['enrolledstudent'] = ' Estudiante inscrito';
$string['enrolledstudents'] = ' Estudiantes inscritos';
$string['downloadresource'] = ' Recurso descargable';
$string['assignment'] = ' Asignación';
$string['strcourse'] = ' Curso';
$string['strcourses'] = ' Cursos';
$string['strstudent'] = ' Estudiante';
$string['strstudents'] = ' Estudiantes';
$string['showenrolledcourses'] = 'Mostrar cursos inscritos';
$string['categoryselectionrequired'] = 'Se requiere selección de categoría.';
$string['courseoverview'] = 'Resumen del curso';
$string['coursecontent'] = 'Contenido del curso';
$string['startdate'] = 'Fecha de inicio';
$string['category'] = 'Categoría';
$string['aboutinstructor'] = "Sobre el instructor";
$string['showmore'] = "Mostrar más";
$string['coursefeatures'] = "Características del curso";

$string['lectures'] = "Conferencias";
$string['quizzes'] = "Cuestionarios";
$string['startdate'] = "Fecha de inicio";
$string['skilllevel'] = "Nivel de habilidad";
$string['language'] = "Idioma";
$string['assessments'] = "Evaluaciones";

// Customizer strings.
$string['customizer-migrate-notice'] = 'La configuración de color se migra al Personalizador. Haga clic en el botón de abajo para abrir el personalizador.';
$string['customizer-close-heading'] = 'Cerrar personalizador';
$string['customizer-close-description'] = 'Se descartarán los cambios no guardados. ¿Te gustaria continuar?';
$string['reset'] = 'Reiniciar';
$string['reset-settings'] = 'Restablecer todas las configuraciones del personalizador';
$string['reset-settings-description'] = '<div>La configuración del personalizador se restaurará a los valores predeterminados. ¿Quieres continuar?</div><div class="mt-3 font-italic"><strong>Nota:</strong> No eliminará el CSS personalizado agregado a la configuración.<br>
Debe eliminar manualmente el CSS de la configuración de CSS personalizado si es necesario.</div>';
$string['customizer'] = 'Personalizador';
$string['error'] = 'Error';
$string['resetdesc'] = 'Restablecer la configuración al último guardado o predeterminado cuando no se guardó nada';
$string['noaccessright'] = '¡Lo siento! No tienes derechos para usar esta página.';
$string['font-family'] = 'Familia tipográfica';
$string['font-family_help'] = 'Establecer familia de fuentes de {$a}';
$string['font-size'] = 'Tamaño de fuente';
$string['font-size_help'] = 'Establecer tamaño de fuente de {$a}';
$string['font-weight'] = 'Peso de fuente';
$string['font-weight_help'] = 'Establezca el peso de la fuente de {$a}. La propiedad font-weight establece cómo se deben mostrar los caracteres gruesos o finos en el texto.';
$string['line-height'] = 'Altura de la línea';
$string['line-height_help'] = 'Establecer altura de línea de {$a}';
$string['global'] = 'Global';
$string['global_help'] = 'Puede administrar configuraciones globales como color, fuente, encabezado, botones, etc.';
$string['site'] = 'Sitio';
$string['text-color'] = 'Color de texto';
$string['text-color_help'] = 'Establecer el color del texto de {$a}';
$string['text-hover-color'] = 'Color de desplazamiento del texto';
$string['text-hover-color_help'] = 'Establecer el color de desplazamiento del texto de {$a}';
$string['link-color'] = 'Color de enlace';
$string['link-color_help'] = 'Establecer el color del enlace de {$a}';
$string['link-hover-color'] = 'Color de desplazamiento del enlace';
$string['link-hover-color_help'] = 'Establecer el color de desplazamiento del enlace de {$a}';
$string['typography'] = 'Tipografía';
$string['inherit'] = 'Heredar';
$string["weight-100"] = 'Delgado 100';
$string["weight-200"] = 'Extra-ligero 200';
$string["weight-300"] = 'Luz 300';
$string["weight-400"] = 'Normal 400';
$string["weight-500"] = 'Medio 500';
$string["weight-600"] = 'Semi-Negrita 600';
$string["weight-700"] = 'Negrita 700';
$string["weight-800"] = 'Extra-Negrita 800';
$string["weight-900"] = 'Ultra-audaz 900';
$string['text-transform'] = 'Transformación de texto';
$string['text-transform_help'] = 'La propiedad de transformación de texto controla el uso de mayúsculas en el texto. Establecer la transformación de texto de {$a}.';
$string["default"] = 'Defecto';
$string["none"] = 'Ninguna';
$string["capitalize"] = 'Capitalizar';
$string["uppercase"] = 'Mayúsculas';
$string["lowercase"] = 'Minúscula';
$string['background-color'] = 'Color de fondo';
$string['background-color_help'] = 'Establecer el color de fondo de {$a}';
$string['background-hover-color'] = 'Color de fondo al pasar el mouse';
$string['background-hover-color_help'] = 'Establecer el color de fondo al colocar el cursor sobre {$a}';
$string['color'] = 'Color';
$string['customizing'] = 'Personalización';
$string['savesuccess'] = 'Guardado exitosamente.';
$string['mobile'] = 'Móvil';
$string['tablet'] = 'Tableta';
$string['hide-customizer'] = 'Ocultar personalizador';
$string['customcss_help'] = 'Puede agregar CSS personalizado. Esto se aplicará en todas las páginas de su sitio.';

// Customizer Global body.
$string['body'] = 'Cuerpo';
$string['body-font-family_desc'] = 'Establecer la familia de fuentes para todo el sitio.Nota Si se establece el estándar, se aplicará la fuente de la configuración de Remui.';
$string['body-font-size_desc'] = 'Establezca el tamaño de fuente base para todo el sitio.';
$string['body-fontweight_desc'] = 'Establece el peso de la fuente para todo el sitio.';
$string['body-text-transform_desc'] = 'Configure la transformación de texto para todo el sitio.';
$string['body-lineheight_desc'] = 'Establezca la altura de la línea para todo el sitio.';
$string['faviconurl_help'] = 'URL de favicon';

// Customizer Global heading.
$string['heading'] = 'Título';
$string['use-custom-color'] = 'Usar color personalizado';
$string['use-custom-color_help'] = 'Usar color personalizado para {$a}';
$string['typography-heading-all-heading'] = 'Encabezados (H1 - H6)';
$string['typography-heading-h1-heading'] = 'Título 1';
$string['typography-heading-h2-heading'] = 'Título 2';
$string['typography-heading-h3-heading'] = 'Título 3';
$string['typography-heading-h4-heading'] = 'Título 4';
$string['typography-heading-h5-heading'] = 'Título 5';
$string['typography-heading-h6-heading'] = 'Título 6';

// Customizer Colors.
$string['primary-color'] = 'Color primario';
$string['primary-color_help'] = 'Aplica color primario a todo el sitio. Este color se aplicará a la marca del encabezado, el botón principal, el conmutador del cajón derecho, el botón Ir a la parte superior, etc. Para usarlo, puede aplicar bg-primary para el fondo y btn-primary para el botón.';
$string['page-background'] = 'Fondo de la página';
$string['page-background_help'] = 'Establecer fondo de página personalizado en el área de contenido de la página. Puedes elegir color, degradado o imagen. El ángulo de color degradado es de 100 grados.';
$string['page-background-color'] = 'Color de fondo de la página';
$string['page-background-color_help'] = 'Establezca el color de fondo en el área de contenido de la página.';
$string['page-background-image'] = 'Imagen de fondo de la página';
$string['page-background-image_help'] = 'Establecer imagen como fondo para el área de contenido de la página.';
$string['gradient'] = 'Degradado';
$string['gradient-color1'] = 'Color degradado 1';
$string['gradient-color1_help'] = 'Establecer el primer color de degradado';
$string['gradient-color2'] = 'Color degradado 2';
$string['gradient-color2_help'] = 'Establecer segundo color de degradado';
$string['page-background-imageattachment'] = 'Adjunto de imagen de fondo';
$string['page-background-imageattachment_help'] = 'La propiedad background-attachments establece si una imagen de fondo se desplaza con el resto de la página o es fija.';
$stirng['image'] = 'Imagen';
$string['additional-css'] = 'CSS adicional';
$string['left-sidebar'] = 'Barra lateral izquierda';
$string['main-sidebar'] = 'Barra lateral principal';
$string['sidebar-links'] = 'Enlaces de la barra lateral';
$string['secondary-sidebar'] = 'Barra lateral secundaria';
$string['header'] = 'Encabezamiento';
$string['menu'] = 'Menú';
$string['site-identity'] = 'Identidad del sitio';
$string['primary-header'] = 'Encabezado principal';
$string['color'] = 'Color';

// Customizer Buttons.
$string['buttons'] = 'Botones';
$string['border'] = 'Frontera';
$string['border-width'] = 'Ancho del borde';
$string['border-width_help'] = 'Establecer el ancho del borde de {$a}';
$string['border-color'] = 'Color del borde';
$string['border-color_help'] = 'Establecer el color del borde de {$a}';
$string['border-hover-color'] = 'Color de desplazamiento del borde';
$string['border-hover-color_help'] = 'Establecer el color de desplazamiento del borde de {$a}';
$string['border-radius'] = 'Radio de borde';
$string['border-radius_help'] = 'Establecer radio de borde de {$a}';
$string['letter-spacing'] = 'Espaciado de letras';
$string['letter-spacing_help'] = 'Establecer espacio entre letras de {$a}';
$string['text'] = 'Texto';
$string['padding'] = 'Relleno';
$string['padding-top'] = 'Acolchado superior';
$string['padding-top_help'] = 'Establecer la parte superior de relleno de {$a}';
$string['padding-right'] = 'Relleno a la derecha';
$string['padding-right_help'] = 'Establecer relleno a la derecha de {$a}';
$string['padding-bottom'] = 'Fondo acolchado';
$string['padding-bottom_help'] = 'Establecer fondo acolchado de {$a}';
$string['padding-left'] = 'Relleno a la izquierda';
$string['padding-left_help'] = 'Establecer el relleno a la izquierda de {$a}';
$string['secondary'] = 'Secundario';
$string['colors'] = 'Colores';

// Customizer Header.
$string['header-background-color_help'] = 'Establecer el color de fondo del encabezado. El color de fondo del logotipo de la marca será el color primario. Este color se aplicará a los elementos del menú.';
$string['site-logo'] = 'Logotipo del sitio';
$string['header-menu'] = 'Menú de encabezado';
$string['border-bottom-size'] = 'Tamaño del borde inferior';
$string['border-bottom-size_help'] = 'Establecer el tamaño del borde inferior del encabezado del sitio';
$string['border-bottom-color'] = 'Color de la parte inferior del borde';
$string['border-bottom-color_help'] = 'Establecer el color del borde inferior del encabezado del sitio';
$string['layout-desktop'] = 'Diseño de escritorio';
$string['layout-desktop_help'] = 'Establecer el diseño del encabezado para el escritorio';
$string['layout-mobile'] = 'Diseño móvil';
$string['layout-mobile_help'] = 'Establecer el diseño del encabezado para dispositivos móviles';
$string['header-left'] = 'Menú derecho icono izquierdo';
$string['header-right'] = 'Ícono derecho menú izquierdo';
$string['header-top'] = 'Menú inferior del icono superior';
$string['hover'] = 'Flotar';
$string['logo'] = 'Logo';
$string['applynavbarcolor'] = 'Establecer el color del sitio de la barra de navegación';
$string['header-background-color-warning'] = 'No se utilizará si está habilitado <strong> Establecer el color del sitio de la barra de navegación </strong>.';
$string['applynavbarcolor_help'] = 'El color primario del sitio se aplicará a todo el encabezado. Cambiar el color primario cambiará el color de fondo del encabezado. Aún puede aplicar color de texto personalizado y color de desplazamiento a los menús de encabezado.';
$string['logosize'] = 'La relación de aspecto esperada es 130: 33 para la vista izquierda, 140: 33 para la vista derecha.';
$string['logominisize'] = 'La relación de aspecto esperada es 40:33.';
$string['sitenamewithlogo'] = 'Nombre del sitio con logotipo (solo vista superior)';

// Customizer Sidebar.
$string['link-text'] = 'Texto del enlace';
$string['link-text_help'] = 'Establecer el color del texto del vínculo de {$a}';
$string['link-icon'] = 'Icono de enlace';
$string['link-icon_help'] = 'Establecer el color del icono de enlace de {$a}';
$string['active-link-color'] = 'Color de enlace activo';
$string['active-link-color_help'] = 'Establecer color personalizado para el enlace activo de {$a}';
$string['active-link-background'] = 'Fondo de enlace activo';
$string['active-link-background_help'] = 'Establecer un color personalizado para el fondo del vínculo activo de {$a}';
$string['link-hover-background'] = 'Fondo de desplazamiento del enlace';
$string['link-hover-background_help'] = 'Establecer el fondo de desplazamiento del vínculo en {$a}';
$string['link-hover-text'] = 'Texto de desplazamiento del enlace';
$string['link-hover-text_help'] = 'Establecer el color del texto de desplazamiento del enlace de {$a}';
$string['hide-dashboard'] = 'Ocultar panel';
$string['hide-dashboard_help'] = 'Al habilitar esto, el elemento del panel de la barra lateral se ocultará';
$string['hide-home'] = 'Ocultar casa';
$string['hide-home_help'] = 'Al habilitar esto, el elemento de inicio de la barra lateral se ocultará';
$string['hide-calendar'] = 'Ocultar calendario';
$string['hide-calendar_help'] = 'Al habilitar esto, el elemento de calendario de la barra lateral se ocultará';
$string['hide-private-files'] = 'Ocultar archivos privados';
$string['hide-private-files_help'] = 'Al habilitar esto, el elemento Archivos privados de la barra lateral se ocultará';
$string['hide-my-courses'] = 'Ocultar mis cursos';
$string['hide-my-courses_help'] = 'Al habilitar esto, Mis cursos y los elementos del curso anidados de la barra lateral se ocultarán';
$string['hide-content-bank'] = 'Ocultar banco de contenido';
$string['hide-content-bank_help'] = 'Al habilitar esto, el elemento del banco de contenido de la barra lateral se ocultará';

// Customizer Footer.
$string['footer'] = 'Pie de página';
$string['basic'] = 'Básica';
$string['advance'] = 'Avance';
$string['footercolumn'] = 'Widget';
$string['footercolumndesc'] = 'Número de widgets para mostrar en pie de página.';
$string['footercolumntype'] = 'Tipo';
$string['footercolumntypedesc'] = 'Puedes elegir el tipo de widget de pie de página';
$string['footercolumnsocial'] = 'Enlaces de redes sociales';
$string['footercolumnsocialdesc'] = 'Mostrar enlaces selectivos de redes sociales';
$string['footercolumntitle'] = 'Título';
$string['footercolumntitledesc'] = 'Añadir título a este widget.';
$string['footercolumncustomhtml'] = 'Contenido';
$string['footercolumncustomhtmldesc'] = 'Puede personalizar el contenido de este widgest usando el editor dado a continuación.';
$string['both'] = 'Ambas';
$string['footercolumnsize'] = 'Tamaño del widget';
$string['footercolumnsizenote'] = 'Arrastre la línea vertical para ajustar el tamaño del widget.';
$string['footercolumnsizedesc'] = 'Puede configurar el tamaño del widget individual.';
$string['footercolumnmenu'] = 'Menú';
$string['footercolumnmenudesc'] = 'Menú de enlace';
$string['footermenu'] = 'Menú';
$string['footermenudesc'] = 'Añadir menú en el widget de pie de página.';
$string['customizermenuadd'] = 'Añadir elemento de menú';
$string['customizermenuedit'] = 'Editar elemento del menú';
$string['customizermenumoveup'] = 'Mueve el elemento del menú hasta';
$string['customizermenuemovedown'] = 'Mueva el elemento del menú hacia abajo';
$string['customizermenuedelete'] = 'Eliminar elemento del menú';
$string['menutext'] = 'Texto';
$string['menuaddress'] = 'Habla a';
$string['menuorientation'] = 'Orientación del menú';
$string['menuorientationdesc'] = 'Establecer orientación del menú.La orientación puede ser vertical u horizontal.';
$string['menuorientationvertical'] = 'Vertical';
$string['menuorientationhorizontal'] = 'Horizontal';
$string['footershowlogo'] = 'Logo';
$string['footershowlogodesc'] = 'Mostrar logo en el pie de página secundaria.';
$string['footersecondarysocial'] = 'Enlaces de redes sociales';
$string['footersecondarysocialdesc'] = 'Mostrar enlaces de redes sociales en el pie de página secundaria.';
$string['footertermsandconditionsshow'] = 'Mostrar Términos y Condiciones';
$string['footertermsandconditions'] = 'Términos y condiciones';
$string['footertermsandconditionsdesc'] = 'Puede agregar enlace para la página Términos y condiciones.';
$string['footerprivacypolicyshow'] = 'Mostrar política de privacidad';
$string['footerprivacypolicy'] = 'Enlace política de privacidad';
$string['footerprivacypolicydesc'] = 'Puede agregar enlace para la página Política de privacidad.';
$string['footercopyrightsshow'] = 'Mostrar contenido de derechos de autor';
$string['footercopyrights'] = 'copyrights';
$string['footercopyrightsdesc'] = 'Agregue contenido de derechos de autor en la parte inferior de la página.';
$string['footercopyrightstags'] = 'Etiquetas:<br>[site]  -  Nombre del sitio<br>[year]  -  Año corriente';
$string['termsandconditions'] = 'Términos y condiciones';
$string['privacypolicy'] = 'Política de privacidad';

// Customizer login.
$string['login'] = 'Acceso';
$string['panel'] = 'panel';
$string['page'] = 'Página';
$string['loginbackgroundopacity'] = 'Iniciar sesión Fondo Opacidad';
$string['loginbackgroundopacity_help'] = 'Aplicar la opacidad para iniciar sesión en la página de fondo de la página.';
$string['loginpanelbackgroundcolor_help'] = 'Aplique el color de fondo al panel de inicio de sesión.';
$string['loginpaneltextcolor_help'] = 'Aplique el color de texto al panel de inicio de sesión.';
$string['loginpanellinkcolor_help'] = 'Aplique el color de enlace al panel de inicio de sesión.';
$string['loginpanellinkhovercolor_help'] = 'Aplicar enlace Coloree el color al panel de inicio de sesión.';
$string['login-panel-position'] = 'Posición del panel de inicio de sesión';
$string['login-panel-position_help'] = 'Establecer posición para el inicio de sesión y el panel de registro';
$string['login-panel-logo-default'] = 'El logotipo de cabecera';
$string['login-panel-logo-desc'] = 'Depende de <strong>Elija el ajuste del formato del logotipo del sitio</strong>';
$string['login-page-info'] = 'La página de inicio de sesión no se puede obtener una vista previa en el personalizador porque se puede ver solo por usuario que se ha desconectado.
Puede probar la configuración guardando y abriendo la página de inicio de sesión en modo de incógnito.';

// One click report  bug/feedback.
$string['sendfeedback'] = "Enviar comentarios a edwiser";
$string['descriptionmodal_text1'] = "<p>La retroalimentación le permite enviarnos sugerencias sobre nuestros productos.Damos la bienvenida a los informes de problemas, las ideas de características y los comentarios generales.</p><p>Comience escribiendo una breve descripción:</p>";
$string['descriptionmodal_text2'] = "<p>A continuación, le permitiremos identificar áreas de la página relacionadas con su descripción.</p>";
$string['emptydescription_error'] = "Por favor ingrese una descripción.";
$string['incorrectemail_error'] = "Por favor ingrese la ID de correo electrónico adecuada.";

$string['highlightmodal_text1'] = "Haga clic y arrastre en la página para ayudarnos a comprender mejor sus comentarios.Puede mover este diálogo si está en el camino.";
$string['highlight_button'] = "Área destacada";
$string['blackout_button'] = "Ocultar información";
$string['highlight_button_tooltip'] = "Resalte las áreas relevantes para sus comentarios.";
$string['blackout_button_tooltip'] = "Ocultar cualquier información personal.";

$string['feedbackmodal_next'] = 'Continuar';
$string['feedbackmodal_skipnext'] = 'Omitir captura de pantalla y continuar';
$string['feedbackmodal_previous'] = 'atrás';
$string['feedbackmodal_submit'] = 'Enviar';
$string['feedbackmodal_ok'] = 'Okey';

$string['description_heading'] = 'Descripción';
$string['feedback_email_heading'] = 'Correo electrónico';
$string['additional_info'] = 'información adicional';
$string['additional_info_none'] = 'None';
$string['additional_info_browser'] = 'Información del navegador';
$string['additional_info_page'] = 'Información de la página';
$string['additional_info_pagestructure'] = 'Estructura de la página';
$string['feedback_screenshot'] = 'Captura de pantalla';
$string['feebdack_datacollected_desc'] = 'Una descripción general de los datos recopilados está disponible <strong><a href="https://forums.edwiser.org/topic/67/anonymously-tracking-the-usage-of-edwiser-products" target="_blank">aquí</a></strong>.';

$string['submit_loading'] = 'Cargando...';
$string['submit_success'] = 'Gracias por tus comentarios. Valoramos cada pieza de retroalimentación que recibimos.';
$string['submit_error'] = 'Lamentablemente, se produjo un error al enviar sus comentarios.Inténtalo de nuevo.';
$string['send_feedback_license_error'] = "Por favor, active la licencia para obtener soporte de productos.";

// Setup wizard.
$string['setupwizard'] = "Asistente de Configuración";
$string['general'] = "General";
$string['coursepage'] = "Página curso";
$string['pagelayout'] = "Página Layout";
$string['loginpage'] = "Página Login";
$string['skipsetupwizard'] = "Omitir el asistente de configuración";
$string['setupwizardmodalmsg'] = "A un paso de usar Edwiser RemUI, Haga clic en Asistente de configuración para personalizar el tema, \"Cancelar\" para usar la configuración predeterminada.";
$string["alert"] = "Alerta";
$string["success"] = "Éxito";
$string['coursesection'] = "Contenido del curso";
$string['coursespecificlinks'] = "Navegación del curso";
$string['universallinks'] = 'Sitio de navegacion';

// Importer.
$string['importer'] = 'Importer';
$string['showimporter'] = 'Mostrar importador';
$string['showimporterdesc'] = 'Mostrar icono del importador en la barra lateral izquierda.';
$string['importer-missing'] = 'Edwiser Site Importer plugin is missing. Please visit <a href="https://edwiser.org">Edwiser</a> site to download this plugin.';

// Notification

$string["noti_enrolandcompletion"] = 'Los diseños modernos y de aspecto profesional de Edwiser RemUI han ayudado de manera brillante a aumentar la participación general de los alumnos con <b>{$a->enrolment} nuevas inscripciones y {$a->completion} finalizaciones de cursos </b> este mes';

$string["noti_completion"] = 'Edwiser RemUI ha mejorado sus niveles de participación de los estudiantes: tiene un total de <b> {$a->completion} cursos completados </b> este mes';

$string["noti_enrol"] = 'El diseño de su LMS se ve muy bien con Edwiser RemUI: tiene <b> {$a->enrolment} nuevas inscripciones en cursos </b> en su portal este mes';

$string["coolthankx"] = "Gracias!";

// Languages
$string["en"] = "English";

$string['coursepagesettings'] = "Configuración de la página del curso";
$string['coursepagesettingsdesc'] = "Cursos relacionados con la configuración";
$string['setthemeasdefault'] = "Establecer RemUI como tema predeterminado";
$string['setthemeasdefaultwithwizard'] = "Configure RemUI como tema predeterminado y ejecute el asistente de configuración";
$string['setthememanually'] = "Hágalo más tarde manualmente";

$string["formsettings"] = "Configuración de formularios";
$string["formsdesign"] = "Diseño de entrada de formularios";
$string["formsdesigndesc"] = "Esta configuración le ayudará a cambiar el diseño de los elementos del formulario";
$string["formsdesign1"] = "Diseño de elementos de formulario 1";
$string["formsdesign2"] = "Diseño de elementos de formulario 2";
$string["formsdesign3"] = "Diseño de elementos de formulario 3";

$string["iconsettings"] = "Configuración de iconos";
$string["icondesign"] = "Diseño de iconos";
$string["icondesigndesc"] = "Esta configuración le ayudará a cambiar el diseño de los elementos del icono";
$string["icondesign1"] = "Oscuro";
$string["icondesign2"] = "Ligero";

$string["formgroupdesign"] = 'Diseño de grupos de formularios';
$string["formgroupdesigndesc"] = "Esta configuración le ayudará a cambiar el diseño de los elementos del formulario";

$string["formselementdesign"] = "Diseño de elementos de formulario";
$string["formgroupdesign"] = "Diseño de grupos de formularios";


// strings for loginleft login right and center
$string['logincenter'] = 'Inicio de sesión alineado al centro';
$string['loginleft'] = 'Inicio de sesión del lado izquierdo';
$string['loginright'] = 'Inicio de sesión del lado derecho';

$string['enableedwfeedback'] = "Comentarios y soporte de Edwiser";
$string['enableedwfeedbackdesc'] = "Habilitar comentarios y soporte de Edwiser, visible solo para administradores.";
$string["checkfaq"] = "Edwiser RemUI - Consultar preguntas frecuentes";
$string["gotop"] = "Ve arriba";
$string["coursecarddesign"] = "Layout der Edwiser-Kurskarte";

$string['coursecategories'] = 'Categorías';
$string['enabledisablecoursecategorymenu'] = "Categoría desplegable en el encabezado";
$string['enabledisablecoursecategorymenudesc'] = "Manténgalo activado si desea mostrar el menú desplegable de categorías en el encabezado.";
$string['coursecategoriestext'] = "Menú desplegable Cambiar nombre de categoría en el encabezado";
$string['coursecategoriestextdesc'] = "Puede agregar un nombre personalizado para el menú desplegable de categorías en el encabezado";

$string['courseperpage'] = 'Cursos por Página';
$string['courseperpagedesc'] = 'Numero de cursos a mostrar por página en la página de archivo de cursos.';
$string['none'] = 'Ninguna';
$string['fade'] = 'Descolorarse';
$string['slide-top'] = 'Deslice la parte superior';
$string['slide-bottom'] = 'Parte inferior de la diapositiva';
$string['slide-right'] = 'Deslice a la derecha';
$string['scale-up'] = 'Aumentar proporcionalmente';
$string['scale-down'] = 'Reducir proporcionalmente';
$string['courseanimation'] = 'Animación de la tarjeta del curso';
$string['courseanimationdesc'] = 'Seleccione la animación de la tarjeta del curso para que aparezca en la página de archivo del curso';

$string['gridview'] = 'Vista en cuadrícula';
$string['listview'] = 'Vista de la lista';


$string['searchcatplaceholdertext'] = 'Búsqueda';
$string['versionforheading'] = '  <span class="small remuiversion">versión {$a}</span>';
$string['themeversionforinfo'] = '<span>Versión instalada actualmente: Edwiser RemUI v{$a}</span>';
$string['hiddenlogo'] = "Deshabilitar";
$string['sidebarregionlogo'] = 'En la tarjeta de inicio de sesión';
$string['maincontentregionlogo'] = 'En la región central';
