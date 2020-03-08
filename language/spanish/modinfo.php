<?php
//=========================================================
// M�dulo WebLinks
// Traducido por Kirby y Dynamic Noiser
// Octubre 2007
//=========================================================

// --- define language begin ---
if (!defined('WEBLINKS_LANG_MI_LOADED')) {
    define('WEBLINKS_LANG_MI_LOADED', 1);

    //---------------------------------------------------------
    // same as mylinks
    //---------------------------------------------------------
    // The name of this module
    define('_MI_WEBLINKS_NAME', 'enlaces Web');

    // A brief description of this module
    define('_MI_WEBLINKS_DESC', 'Crear un directorio de enlaces en el que los usuarios puedan a�adir/modificar/eliminar enlaces.');

    // Names of blocks for this module (Not all module have blocks)
    define('_MI_WEBLINKS_BNAME1', 'enlaces Recientes');
    define('_MI_WEBLINKS_BNAME2', 'TOP enlaces');
    define('_MI_WEBLINKS_BNAME3', 'enlaces Populares');

    // Sub menu titles
    define('_MI_WEBLINKS_SMNAME1', 'A�adir');
    define('_MI_WEBLINKS_SMNAME2', 'Sitio Popular');
    define('_MI_WEBLINKS_SMNAME3', 'Sitio en el TOP');

    // Names of admin menu items
    define('_MI_WEBLINKS_ADMENU1', 'Configuraci�n del M�dulo 2');
    define('_MI_WEBLINKS_ADMENU2', 'Administrador de Categor�as');
    define('_MI_WEBLINKS_ADMENU3', 'Administrador de enlaces');
    define('_MI_WEBLINKS_ADMENU4', 'A�adir nuevo enlace');
    define('_MI_WEBLINKS_ADMENU5', 'Nuevos enlaces esperando validaci�n.');
    define('_MI_WEBLINKS_ADMENU6', 'enlaces modificados esperando validaci�n');
    define('_MI_WEBLINKS_ADMENU7', 'Reportes de enlaces Rotos');
    //define("_MI_WEBLINKS_ADMENU8","Checkeador de enlaces");

    //-------------------------------------
    // Title of config items
    // Description of each config items
    //-------------------------------------
    define('_MI_WEBLINKS_POPULAR', 'Selecciona el n�mero de Clicks para que un enlace sea Popular');
    define('_MI_WEBLINKS_POPULARDSC', 'Introduce el m�nimo de Clicks para que se muestre el icono "POPULAR". <br>  Si es 0, el icono no se mostrara. ');
    define('_MI_WEBLINKS_NEWLINKS', 'Selecciona el n�mero m�ximo de enlaces en el TOP');

    //define('_MI_WEBLINKS_NEWLINKSDSC', 'Introduce el n�mero m�ximo de enlaces mostrados en el bloque "Nuevos enlaces". ');
    define('_MI_WEBLINKS_NEWLINKSDSC', 'Introduce el m�ximo de enlaces mostrados en la p�gina principal. ');

    define('_MI_WEBLINKS_PERPAGE', 'Selecciona el n�mero de enlaces mostrados por p�gina');
    define('_MI_WEBLINKS_PERPAGEDSC', 'Selecciona el n�mero de enlaces detallados mostrados por p�gina');

    //define('_MI_WEBLINKS_USESHOTS', 'Selecciona "S�" para mostrar im�genes de pantalla para cada enlace');
    //define('_MI_WEBLINKS_USESHOTSDSC', '');
    //define('_MI_WEBLINKS_SHOTWIDTH', 'Anchura m�xima permitida de cada imagen');
    //define('_MI_WEBLINKS_SHOTWIDTHDSC', '');

    //define('_MI_WEBLINKS_ANONPOST','�Permitir a visitantes postear en enlaces?');
    //define('_MI_WEBLINKS_AUTOAPPROVE','�Autoaprovar enlaces sin intervenci�n del admin?');
    //define('_MI_WEBLINKS_AUTOAPPROVEDSC','');

    //-------------------------------------
    // Text for notifications
    //-------------------------------------
    define('_MI_WEBLINKS_GLOBAL_NOTIFY', 'Global');
    define('_MI_WEBLINKS_GLOBAL_NOTIFYDSC', 'Opciones Globales de Notificaciones de enlaces.');

    define('_MI_WEBLINKS_CATEGORY_NOTIFY', 'Categor�a');
    define('_MI_WEBLINKS_CATEGORY_NOTIFYDSC', 'Opciones de notificaci�n que se aplican a la actual categor�a de enlaces.');

    define('_MI_WEBLINKS_LINK_NOTIFY', 'enlace');
    define('_MI_WEBLINKS_LINK_NOTIFYDSC', 'Opciones de notificaci�n normales que en el actual enlace.');

    define('_MI_WEBLINKS_GLOBAL_NEWCATEGORY_NOTIFY', 'Nueva Categor�a');
    define('_MI_WEBLINKS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Notificarme de que una nueva categor�a a sido creada.');
    define('_MI_WEBLINKS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Notificarme de que un nuevo enlace ha sido creado.');
    define('_MI_WEBLINKS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Auto-Notificaci�n : Nueva Categor�a');

    define('_MI_WEBLINKS_GLOBAL_LINKMODIFY_NOTIFY', '[Admin] Modificar / Borrar enlace Requerido');
    define('_MI_WEBLINKS_GLOBAL_LINKMODIFY_NOTIFYCAP', '[Admin] Notificarme de cualquier solicitud para modificaci�n / eliminaci�n de enlaces.');
    define('_MI_WEBLINKS_GLOBAL_LINKMODIFY_NOTIFYDSC', 'Recibir notificaci�n cuando cualquier solicitud de los enlaces de modificaci�n / eliminaci�n sea agregada.');
    define('_MI_WEBLINKS_GLOBAL_LINKMODIFY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Auto-Notificaci�n : Modificaci�n / Eliminaci�n de enlace');

    define('_MI_WEBLINKS_GLOBAL_LINKBROKEN_NOTIFY', '[Admin] Reportaci�n de enlaces Rotos');
    define('_MI_WEBLINKS_GLOBAL_LINKBROKEN_NOTIFYCAP', '[Admin] Notificarme de cualquier enlace roto.');
    define('_MI_WEBLINKS_GLOBAL_LINKBROKEN_NOTIFYDSC', 'Notificarme si un enlace roto es Reportado.');
    define('_MI_WEBLINKS_GLOBAL_LINKBROKEN_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Auto-Notificaci�n : enlace Roto Reportado');

    define('_MI_WEBLINKS_GLOBAL_LINKSUBMIT_NOTIFY', '[Admin] Nuevo enlace agregado');
    define('_MI_WEBLINKS_GLOBAL_LINKSUBMIT_NOTIFYCAP', '[Admin] Notificarme cuando se agregue un enlace (en espera de aprobaci�n).');
    define('_MI_WEBLINKS_GLOBAL_LINKSUBMIT_NOTIFYDSC', 'Notificarme cuando se agregue un enlace (en espera de aprobaci�n).');
    define('_MI_WEBLINKS_GLOBAL_LINKSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Auto-Notificaci�n : Nuevo enlace Agregado');

    define('_MI_WEBLINKS_GLOBAL_NEWLINK_NOTIFY', 'Nuevo enlace');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_NOTIFYCAP', 'Notificarme cuando se postee un enlace.');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_NOTIFYDSC', 'Notificarme cuando se postee cualquier enlace.');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Auto-Notificaci�n : Nuevo enlace');

    define('_MI_WEBLINKS_CATEGORY_LINKSUBMIT_NOTIFY', '[Admin] Nuevo enlace agregado');
    define('_MI_WEBLINKS_CATEGORY_LINKSUBMIT_NOTIFYCAP', '[Admin] Notificarme cuando se agregue un enlace (en espera de aprobaci�n) a la categor�a actual.');
    define('_MI_WEBLINKS_CATEGORY_LINKSUBMIT_NOTIFYDSC', 'Notificarme cuando se agregue un enlace (en espera de aprobaci�n) a la categor�a actual.');
    define('_MI_WEBLINKS_CATEGORY_LINKSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Auto-Notificaci�n : Nuevo enlace agregado');

    define('_MI_WEBLINKS_CATEGORY_NEWLINK_NOTIFY', 'Nuevo enlace');
    define('_MI_WEBLINKS_CATEGORY_NEWLINK_NOTIFYCAP', 'Notificarme cuando se postee un enlace en la categor�a actual.');
    define('_MI_WEBLINKS_CATEGORY_NEWLINK_NOTIFYDSC', 'Notificarme cuando se postee cualquier enlace. en la categor�a actual');
    define('_MI_WEBLINKS_CATEGORY_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} Auto-Notificaci�n : Nuevo enlace en categor�a');

    //define('_MI_WEBLINKS_LINK_APPROVE_NOTIFY', 'enlace aprobado');
    //define('_MI_WEBLINKS_LINK_APPROVE_NOTIFYCAP', 'Notificarme cuando un enlace sea aprobado.');
    //define('_MI_WEBLINKS_LINK_APPROVE_NOTIFYDSC', 'Notificarme cuando cualquier enlace sea aprobado.');
    define('_MI_WEBLINKS_LINK_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} : Tu solicitud ha sido aprobada');

    //---------------------------------------------------------
    // weblinks
    //---------------------------------------------------------
    // === Names of blocks for this module ===
    define('_MI_WEBLINKS_BNAME4', 'Lista de Categor�as de la Web');
    define('_MI_WEBLINKS_BNAME5', 'Ultimas RSS/ATOM feeds de la Web');
    define('_MI_WEBLINKS_BNAME6', 'Mostrar Bolgs de la Web');

    //-------------------------------------
    // Title of config items
    //-------------------------------------
    define('_MI_WEBLINKS_LOGOSHOW', 'Mostrar logo');
    define('_MI_WEBLINKS_LOGOSHOWDSC', 'Selecciona "S�" para que se muestre el logo.');

    define('_MI_WEBLINKS_TITLESHOW', 'Mostrar T�tulo');
    define('_MI_WEBLINKS_TITLESHOWDSC', 'Selecciona "S�" para que se muestre el t�tulo');

    define('_MI_WEBLINKS_NEWDAYS', 'Selecciona el n�mero de di�s para que un enlace sea Nuevo');
    define('_MI_WEBLINKS_NEWDAYS_DSC', 'Introduce el n�mero de clicks necesarios para que se muestre el icono "NUEVO". <br> Si es 0, no se mostrar�. ');

    define('_MI_WEBLINKS_DESCSHORT', 'N�mero m�ximo de caracteres utilizados para describir ');
    define('_MI_WEBLINKS_DESCSHORTDSC', 'Introduce el N�mero m�ximo de caracteres utilizados para describir. ');

    define('_MI_WEBLINKS_ORDERBY', 'Orden a seguir en enlaces');
    define('_MI_WEBLINKS_ORDERBYDSC', 'Introduce el Orden.');
    define('_MI_WEBLINKS_ORDERBY0', 'T�tulo (de A a la Z)');
    define('_MI_WEBLINKS_ORDERBY1', 'T�tulo (de Z a la A)');
    define('_MI_WEBLINKS_ORDERBY2', 'Fecha (De registro, en orden ascendente)');
    define('_MI_WEBLINKS_ORDERBY3', 'Fecha (De registro, en orden descendente)');
    define('_MI_WEBLINKS_ORDERBY4', 'Puntuaci�n (en orden ascendente)');
    define('_MI_WEBLINKS_ORDERBY5', 'Puntuaci�n (en orden descendente)');
    define('_MI_WEBLINKS_ORDERBY6', 'Popularidad (en orden ascendente)');
    define('_MI_WEBLINKS_ORDERBY7', 'Popularidad (en orden descendente)');
    define('_MI_WEBLINKS_SEARCH_LINKS', 'N�mero de enlaces mostrados en un resultado de b�squeda');
    define('_MI_WEBLINKS_SEARCH_LINKSDSC', 'Introduce el N�mero de enlaces mostrados en un resultado de b�squeda');
    define('_MI_WEBLINKS_SEARCH_MIN', 'N�mero de caracteres m�nimos al buscar una palabra');
    define('_MI_WEBLINKS_SEARCH_MINDSC', 'Introduce el N�mero de caracteres m�nimos al buscar una palabra ');
    define('_MI_WEBLINKS_USEFRAMES', '�Te gustar�a mostrar las p�ginas dentro de un marco?');
    define('_MI_WEBLINKS_USEFRAMEDSC', 'Elige si deseas mostrar los enlaces dentro de un marco');
    define('_MI_WEBLINKS_BROKEN', 'N�mero de enlaces rotos reportados para poner fin a una pantalla');
    define(
        '_MI_WEBLINKS_BROKENDSC',
        'Introduce el N�mero de enlaces rotos reportados para poner fin a una pantalla. <br> Cuando por debajo de este valor, ser� considerado como un Error temporal, y no se har� nada. <br> Cuando este valor sobre el enlace ya no se visualiza.'
    );

    define('_MI_WEBLINKS_LISTIMAGE_USE', 'Utilice URLs de im�genes de un listado de enlaces');
    define('_MI_WEBLINKS_LISTIMAGE_WIDTH', 'Anchura m�xima de imagen');
    define('_MI_WEBLINKS_LISTIMAGE_HEIGHT', 'Altura m�xima de imagen');
    define('_MI_WEBLINKS_LISTIMAGE_USEDSC', 'Selecciona "SI" para Utilizar URLs de im�genes de un listado de enlaces');

    define('_MI_WEBLINKS_LINKIMAGE_USE', 'Utilice URLs de im�genes para los detalles de un enlace');
    define('_MI_WEBLINKS_LINKIMAGE_WIDTH', 'Anchura m�xima de imagen');
    define('_MI_WEBLINKS_LINKIMAGE_HEIGHT', 'Altura m�xima de imagen');
    define('_MI_WEBLINKS_LINKIMAGE_USEDSC', 'Selecciona "SI" para Utilizar URLs de im�genes para los detalles de un enlace.');

    define('_MI_WEBLINKS_TOPTEN_STYLE', 'Estilo del TOP');
    define('_MI_WEBLINKS_TOPTEN_STYLE_DSC', 'Selecciona el Estilo en "enlace Popular" y "enlace en el TOP". ');
    define('_MI_WEBLINKS_TOPTEN_STYLE_0', 'Una categor�a en el top');
    define('_MI_WEBLINKS_TOPTEN_STYLE_1', 'Mezclado : Entre todas las categor�as');

    define('_MI_WEBLINKS_TOPTEN_LINKS', 'M�ximo n�mero de enlaces en el TOP');
    define('_MI_WEBLINKS_TOPTEN_LINKS_DSC', 'Introduce el M�ximo n�mero de enlaces que se veran en "enlace Popular" y "enlace en el TOP". ');

    define('_MI_WEBLINKS_TOPTEN_CATS', 'Categor�as m�ximas en el TOP');
    define('_MI_WEBLINKS_TOPTEN_CATS_DSC', 'Introduce el n�mero de Categor�as m�ximas que se veran en "enlace Popular" y "enlace en el TOP". <br> Si seleccionas muchas categor�as habra error');

    // 2006-03-26
    // REQ 3807: Main Page Introductory Text
    //define('_MI_WEBLINKS_INDEX_DESC','Texto de Introducci�n en la P�gina principal');
    //define('_MI_WEBLINKS_INDEX_DESC_DSC', 'Puedes usar esto para Introduccir un Texto de Introducci�n en la P�gina principal. HTML permitido.');
    //define('_MI_WEBLINKS_INDEX_DESC_DEFAULT', '<div align="center"><font color="blue">Aqui tu texto de introduccion.<br>Editalo en "Configuraci�n del M�dulo 2".</font><br></div>');

    // 2006-05-15
    define('_MI_WEBLINKS_ADMENU0', '�ndice');

    // 2006-11-03
    // random block
    define('_MI_WEBLINKS_BNAME_RANDOM', 'enlace al azar');
    define('_MI_WEBLINKS_BNAME_GENERIC', 'Bloque de enlaces');

    // 2007-04-08
    define('_MI_WEBLINKS_BNAME_RANDOM_PHOTO', 'Fotograf�a al Azar');

    // 2007-09-01
    // notification: new_link_admin
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_ADMIN', '[Admin] Nuevo enlace (con comentario)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_ADMIN_CAP', '[Admin] Notificarme cuando se postee un enlace (con comentario)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_ADMIN_DSC', 'Notificarme cuando se postee cualquier enlace (con comentario).');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_ADMIN_SBJ', '[{X_SITENAME}] {X_MODULE} Auto-Notificaci�n : Nuevo enlace');

    // notification: new_link_comment
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_COMMENT', '[Admin] Nuevo enlace (cuando el admin reciba comentario)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_COMMENT_CAP', '[Admin] Notificarme cuando se postee un enlace (cuando el admin reciba comentario)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_COMMENT_DSC', 'Notificarme cuando se postee cualquier enlace (cuando el admin reciba comentario)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_COMMENT_SBJ', '[{X_SITENAME}] {X_MODULE} Auto-Notificaci�n : Nuevo enlace)');
}// --- define language begin ---
