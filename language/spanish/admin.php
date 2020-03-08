<?php
//=========================================================
// M�dulo WebLinks
// Traducido por Kirby y Dynamic Noiser
// Octubre 2007
//=========================================================

// --- define language begin ---
if (!defined('WEBLINKS_LANG_AM_LOADED')) {
    define('WEBLINKS_LANG_AM_LOADED', 1);

    define('_WEBLINKS_ADMIN_INDEX', 'Inicio de Administraci�n');

    // BUG 2931: unmatch popup menu 'preference' and index menu 'module setting'
    define('_WEBLINKS_ADMIN_MODULE_CONFIG_1', 'Configurar m�dulo 1 (Preferencias)');

    define('_WEBLINKS_ADMIN_MODULE_CONFIG_2', 'Configurar m�dulo 2');
    //define("_WEBLINKS_ADMIN_ADDMODDEL_CATEGORY","Agregar, modificar, y borrar categor�as");
    define('_WEBLINKS_ADMIN_ADD_LINK', 'Agregar nuevo enlace');
    define('_WEBLINKS_ADMIN_OTHERFUNC', 'Otras funciones');
    define('_WEBLINKS_ADMIN_GOTO_ADMIN_INDEX', 'Ir a inicio de Administraci�n');

    //======    config.php  ======
    // Permisos de acceso
    define('_WEBLINKS_ADMIN_AUTH', 'Permisos');
    define('_WEBLINKS_ADMIN_AUTH_TEXT', 'El administrador tiene toda la autoridad');
    define('_WEBLINKS_AUTH_SUBMIT', 'Puede agregar un nuevo enlace');
    define('_WEBLINKS_AUTH_SUBMIT_DSC', 'Especificar los grupos que pueden enviar un nuevo enlace');
    define('_WEBLINKS_AUTH_SUBMIT_AUTO', 'Pueden autom�ticamente aprobar nuevos enlaces');
    define('_WEBLINKS_AUTH_SUBMIT_AUTO_DSC', 'Especificar aquellos grupos cuyos enlaces ser�n aprobados autom�ticamente');
    define('_WEBLINKS_AUTH_MODIFY', 'Pueden modificar');
    define('_WEBLINKS_AUTH_MODIFY_DSC', 'Especificar aquellos grupos cuyas modificaciones de los enlaces ser�n aprobados autom�ticamente');
    define('_WEBLINKS_AUTH_MODIFY_AUTO', 'Pueden aprobar modificaciones de los enlaces');
    define('_WEBLINKS_AUTH_MODIFY_AUTO_DSC', 'Especificar aquellos grupos que pueden aprobar solicitudes de modificaciones de los enlaces');
    define('_WEBLINKS_AUTH_RATELINK', 'Pueden calificar los enlaces');
    define('_WEBLINKS_AUTH_RATELINK_DSC', 'Especificar aquellos grupos que pueden calificar los enlaces.<br>');
    define('_WEBLINKS_USE_PASSWD', 'Usar contrase�a de autenticaci�n cuando modifiques un enlace');
    define(
        '_WEBLINKS_USE_PASSWD_DSC',
        'Mostrar campo de contrase�a de autenticaci�n cuando SI/YES est� seleccionado, <br>para los grupos que no est� permitido enviar/aprobar solicitudes de modificaci�n. '
    );
    define('_WEBLINKS_USE_RATELINK', 'Permitir calificaciones');
    define('_WEBLINKS_USE_RATELINK_DSC', 'SI/YES permite a los usuarios calificar los enlaces.');
    define('_WEBLINKS_AUTH_UPDATED', 'Permissions Updated');

    // RSS/ATOM
    define('_WEBLINKS_ADMIN_RSS', 'Ajustes de RSS/ATOM');
    define('_WEBLINKS_RSS_MODE_AUTO', 'Actualizaci�n autom�tica de RSS/ATOM');
    define(
        '_WEBLINKS_RSS_MODE_AUTO_DSC',
        "SI/YES realiza 'Descubrimiento autom�tico de la direcci�n RSS/ATOM' y 'actualiza autom�ticamente' si los enlaces RSS/ATOM son incluidos en el formulario del enlace "
    );
    define('_WEBLINKS_RSS_MODE_DATA', 'Datos de RSS/ATOM a mostrar');
    define(
        '_WEBLINKS_RSS_MODE_DATA_DSC',
        'ATOM FEED, utiliza los datos de la tabla tras hacer el an�lisis. <br>XML utiliza los datos desde la tabla de enlace antes del an�lisis. <br>Algunos datos pueden no ser grabado despu�s del filtrado de tabla.'
    );
    define('_WEBLINKS_RSS_CACHE', 'Tiempo de cacheado de RSS/ATOM');
    define('_WEBLINKS_RSS_CACHE_DSC', 'En horas.');
    define('_WEBLINKS_RSS_LIMIT', 'N�mero m�ximo de RSS/ATOM');
    define(
        '_WEBLINKS_RSS_LIMIT_DSC',
        'Entra el n�mero m�ximo de RSS/ATOM que se grabar�n en la tabla<br>Los datos antiguos se borrar�n si se excede �ste valor. <br>Cero se considera ilimitado. '
    );
    define('_WEBLINKS_RSS_SITE', 'B�squeda RSS');
    define(
        '_WEBLINKS_RSS_SITE_DSC',
        'Entra una lista de direcciones RSS en el sito de b�squeda RSS.<br>Separa cada entrada con una nueva l�nea cuando especif�ques m�s de una. <br>No metas direcciones ATOM. '
    );
    define('_WEBLINKS_RSS_BLACK', 'Lista negra de direcciones RSS/ATOM');
    define(
        '_WEBLINKS_RSS_BLACK_DSC',
        'Entra una lista de direcciones que se rechazar�n cuando colecten RSS/ATOM. <br>Separa cada entrada con una nueva l�nea cuando especif�ques m�s de una.<br>Puedes usar expresiones regulares en lenguaje PERL. '
    );
    define('_WEBLINKS_RSS_WHITE', 'Lista blanca de direcciones RSS/ATOM');
    define(
        '_WEBLINKS_RSS_WHITE_DSC',
        'Entra una lista de direcciones a colectar cuando coincidan con entradas en la lista negra. <br>Separa cada entrada con una nueva l�nea cuando especif�ques m�s de una. <br>Puedes usar expresiones regulares en lenguaje PERL. '
    );
    define('_WEBLINKS_RSS_URL_CHECK', 'Hay algunas direcciones que est�n en la lista negra ');
    define('_WEBLINKS_RSS_URL_CHECK_DSC', 'Por favor, copia y pega desde abajo de la lista blanca al formulario de registro si es necesario. ');
    define('_WEBLINKS_RSS_UPDATED', 'Ajustes RSS/ATOM actualizados');

    // RSS/ATOM
    define('_WEBLINKS_ADMIN_RSS_VIEW', 'Ver ajustes RSS/ATOM');
    define('_WEBLINKS_RSS_MODE_TITLE', 'Usar etiquetas HTML en el t�tulo');
    define('_WEBLINKS_RSS_MODE_TITLE_DSC', 'SI/YES muestra etiquetas HTML en los enlaces del t�tulo, si el t�tulo tiene �sas etiquetas HTML. <br>NO desecha las etiquetas HTML del t�tulo. ');
    define('_WEBLINKS_RSS_MODE_CONTENT', 'Usar etiquetas HTML en el contenido');
    define(
        '_WEBLINKS_RSS_MODE_CONTENT_DSC',
        'SI/YES muestra etiquetas HTML en los enlaces del comntenido, si el contenido tiene �sas etiquetas HTML <br>NO desecha las todas las etiquetas HTML del contenido mostrado. '
    );
    define('_WEBLINKS_RSS_NEW', 'Selecciona el m�ximo n�mero de "nuevos RSS/ATOM" mostrados en el tope de la p�gina');
    define('_WEBLINKS_RSS_NEW_DSC', 'Selecciona el m�ximo n�mero de "nuevos RSS/ATOM" mostrados en la p�gina principal.');
    define('_WEBLINKS_RSS_PERPAGE', 'Selecciona el m�ximo n�mero de "nuevos RSS/ATOM" mostrados en la p�gina de detalles de los enlaces y en la p�gina de RSS/ATOM');
    define('_WEBLINKS_RSS_PERPAGE_DSC', 'Selecciona el m�ximo n�mero de "nuevos RSS/ATOM" mostrados en la p�gina RSS/ATOM. ');
    define('_WEBLINKS_RSS_NUM_CONTENT', 'N�mero de enlaces que ser�n mostrados');
    define(
        '_WEBLINKS_RSS_NUM_CONTENT_DSC',
        'Entra el n�mero de enlaces que mostrar�n contenido de los enlaces RSS/ATOM en los enlaces que contiene el detalle de la p�ginas. <br>Un sumario ser� mostrado en los enlaces remanentes. '
    );
    define('_WEBLINKS_RSS_MAX_CONTENT', 'M�ximo n�mero de caracteres usados para el contenido de los enlaces RSS/ATOM');
    define(
        '_WEBLINKS_RSS_MAX_CONTENT_DSC',
        'M�ximo n�mero de caracteres usados para el contenido de los enlaces RSS/ATOM enla p�gina RSS/ATOM.  <br>Para se usados cuando est� activada la utilizaci�n de etiquetas HTML '
    );
    define('_WEBLINKS_RSS_MAX_SUMMARY', 'M�ximo n�mero de caracteres usado para el sumario de RSS/ATOM');
    define('_WEBLINKS_RSS_MAX_SUMMARY_DSC', 'M�ximo n�mero de caracteres usado para el sumario de RSS/ATOM en la p�gina principal. ');

    // use link field
    define('_WEBLINKS_ADMIN_POST', 'Ajustes de los campos de enlaces');
    define(
        '_WEBLINKS_ADMIN_POST_TEXT_1',
        '
No usar �sto significa que el campo no se mostrar� en el formulario. '
    );
    define('_WEBLINKS_ADMIN_POST_TEXT_2', 'Usar �sto significa que el campo se mostrar� en el formulario para permitir a qui�n lo rellena la opci�n de meter datos en �l o no.');
    define('_WEBLINKS_ADMIN_POST_TEXT_3', ' Obligatorio usar el campo que debe ser rellenado.');
    define('_WEBLINKS_NO_USE', 'No usar');
    define('_WEBLINKS_USE', 'Usar');
    define('_WEBLINKS_INDISPENSABLE', 'Obligatorio');
    define('_WEBLINKS_TYPE_DESC', 'Usar caja de texto XOOPS DHTML para envio de formulario');
    define('_WEBLINKS_TYPE_DESC_DSC', 'NO usa una caja de texto normal.<br>SI/YES usa una caja de texto del tipo XOOPS DHTML para enviar el formulario. ');
    define('_WEBLINKS_CHECK_DOUBLE', 'Aceptar env�o de enlaces existentes');
    define('_WEBLINKS_CHECK_DOUBLE_DSC', 'NO permite el registro de enlaces existente. <br> SI/YES chequea si ya existe un enlace en la base de datos. ');
    define('_WEBLINKS_POST_UPDATED', 'Ajustes de los campos de enlaces actualizados');

    // categor�as
    define('_WEBLINKS_ADMIN_CAT_SET', 'Ajustes de categor�as');
    define('_WEBLINKS_CAT_SEL', 'M�ximo n�mero de categor�as/subcategor�as que pueden ser elegidas para incluir un enlace en ellas');
    define('_WEBLINKS_CAT_SEL_DSC', 'M�ximo n�mero de categor�as/subcategor�as que pueden ser elegidas para categorizar un enlace en ellas');
    define('_WEBLINKS_CAT_SUB', 'N�emro de subcategor�as a mostrar');
    define('_WEBLINKS_CAT_SUB_DSC', 'Ajusta el n�mero de subcategor�as mostradas en la lista de categor�as en p�gina principal');
    define('_WEBLINKS_CAT_IMG_MODE', 'Selecciona una imagen para �sta categor�a');
    define('_WEBLINKS_CAT_IMG_MODE_DSC', 'NONE/NINGUNA no muestra imagen. <br>Folder.gif muestra una imagen de una carpeta. <br>Ajusta la imagen que se mostrar� en cada categor�a. ');
    //define("_WEBLINKS_CAT_IMG_MODE_0","NONE/NINGUNA");
    define('_WEBLINKS_CAT_IMG_MODE_1', 'folder.gif');
    define('_WEBLINKS_CAT_IMG_MODE_2', 'Ajuste de imagen');
    define('_WEBLINKS_CAT_IMG_WIDTH', 'Ancho m�ximmo para la imagen de categor�a');
    define('_WEBLINKS_CAT_IMG_HEIGHT', 'Alto m�ximmo para la imagen de categor�a');
    define('_WEBLINKS_CAT_IMG_SIZE_DSC', 'Usar cuando elija "Ajuste de imagen". ');
    define('_WEBLINKS_CAT_UPDATED', 'Ajustes de categor�as actualizados');

    //======    category_list.php   ======
    define('_WEBLINKS_ADMIN_CATEGORY_MANAGE', 'Manejo de categor�as');
    define('_WEBLINKS_ADMIN_CATEGORY_LIST', 'Listado de categor�as');
    //define("_WEBLINKS_ORDER_ID"," Enlaces listados por Identificador ID");
    define('_WEBLINKS_ORDER_TREE', ' Enlaces listados por �rbol');
    define('_WEBLINKS_CAT_ORDER', 'Orden de categor�as');
    define('_WEBLINKS_THERE_ARE_CATEGORY', 'Existen <b>%s</b> categor�as en la base de datos');
    define('_WEBLINKS_ADMIN_CATEGORY_NOTICE_1', 'Haz click en el <b>Identificador ID de categor�a</b> para editar una categor�a espec�fica. ');
    define('_WEBLINKS_ADMIN_CATEGORY_NOTICE_2', 'Haz click en la <b>categor�a padre</b> � <b>t�tulo</b>, para mostrar las categor�as en orden. ');
    define('_WEBLINKS_NO_CATEGORY', 'No existe la categor�a correspondiente. ');
    define('_WEBLINKS_NUM_SUBCAT', 'N�mero de subcategor�a');
    define('_WEBLINKS_ORDERS_UPDATED', 'Actualizaci�n de las categor�as');

    //======    category_manage.php     ======
    define('_WEBLINKS_IMGURL_MAIN', 'Direcc�on de la imagen para la categor�a');
    define('_WEBLINKS_IMGURL_MAIN_DSC1', 'Opcional. <br>Los tama�os de las im�genes se ajustar�n autom�ticamente');
    //define("_WEBLINKS_IMGURL_MAIN_DSC2","Las im�genes s�lo se mostrar�n para las categor�as, no para las subcategor�as. ");

    //======    link_list.php   ======
    define('_WEBLINKS_ADMIN_LINK_MANAGE', 'Manejo de enlaces');
    define('_WEBLINKS_ADMIN_LINK_LIST', 'Listado de enlaces');
    define('_WEBLINKS_ADMIN_LINK_BROKEN', 'Listado de enlaces que se deben reparar');
    define('_WEBLINKS_ADMIN_LINK_ALL_ASC', 'Listado de todos los enlaces desde el m�s antiguo');
    define('_WEBLINKS_ADMIN_LINK_ALL_DESC', 'Listado de todos los enlaces desde el m�s nuevo');
    define('_WEBLINKS_ADMIN_LINK_NOURL', 'Listado de enlaces cuyas direcciones web a�n no han sido insertadas');
    define('_WEBLINKS_COUNT_BROKEN', 'Contador de enlaces que se deben reparar');
    define('_WEBLINKS_NO_LINK', 'No existe el enlace. ');
    define('_WEBLINKS_ADMIN_PRESENT_SAVE', 'Los datos grabados en la base de datos ser�n mostrados aqu�.');

    //======    link_manage.php     ======
    //define("_WEBLINKS_USERID","N�mero de usuario");
    //define("_WEBLINKS_CREATE","Creado");

    //======    link_broken_check.php   ======
    define('_WEBLINKS_ADMIN_LINK_CHECK_UPDATE', 'Chequear enlaces y actualizar');
    define('_WEBLINKS_ADMIN_LINK_BROKEN_CHECK', 'Chequear enlaces para reparar');
    define('_WEBLINKS_ADMIN_BROKEN_CHECK', 'Chequear');
    define('_WEBLINKS_ADMIN_BROKEN_RESULT', 'Chequear resultados');
    define(
        '_WEBLINKS_ADMIN_LINK_BROKEN_CHECK_CAUTION',
        'Si hay muchos enlaces que se deben reparar, puede ocurrir que el servidor te devuelva un mensaje de error por una espera muy larga. <br>Si �sto sucede, cambia el valor num�rico para limitar y compensar �sto. <br>Si el l�mite es igual a cero, no habr�n restricciones en cuanto a cantidad.'
    );
    define(
        '_WEBLINKS_ADMIN_LINK_BROKEN_CHECK_NOTICE',
        'Haciendo click <b>en el identificador ID del enlace</b> se abre una p�gina que te permite modificarlo. <br><b>La direcci�n de la p�gina web</b> te llevar� al sitio del enlace si haces click en �l. <br>'
    );
    define('_WEBLINKS_ADMIN_LINK_BROKEN_CHECK_GOOGLE', 'La b�squeda de Google se abrir� al hacer click en el <b>t�tulo de p�gina web</b>. <br>');
    define('_WEBLINKS_ADMIN_LIMIT', 'M�ximo n�mero de enlaces a chequear (l�mite)');
    define('_WEBLINKS_ADMIN_OFFSET', 'Compensaci�n');
    define('_WEBLINKS_ADMIN_CHECK', 'Chequeo');
    define('_WEBLINKS_ADMIN_TIME_START', 'Tiempo de inicio');
    define('_WEBLINKS_ADMIN_TIME_END', 'Tiempo de finalizaci�n');
    define('_WEBLINKS_ADMIN_TIME_ELAPSE', 'Tiempo transcurrido');
    define('_WEBLINKS_ADMIN_LINK_NUM_ALL', 'Todos los enlaces');
    define('_WEBLINKS_ADMIN_LINK_NUM_CHECK', 'Enlaces chequeados');
    define('_WEBLINKS_ADMIN_LINK_NUM_BROKEN', 'Enlaces a reparar');
    define('_WEBLINKS_ADMIN_NUM', 'enlaces');
    define('_WEBLINKS_ADMIN_MIN_SEC', '%s min %s seg');
    define('_WEBLINKS_ADMIN_CHECK_NEXT', 'Chequear los pr�ximos %s enlaces');
    //define("_WEBLINKS_ADMIN_RSS_REFRESH_NOTE","Simult�neamente ejecutar el descubrimiento autom�tico de direcciones RSS/ATOM");

    //======    rss_manage.php  ======
    define('_WEBLINKS_ADMIN_RSS_MANAGE', 'Manejo de RSS/ATOM');
    define('_WEBLINKS_ADMIN_RSS_REFRESH', 'Actualizar RSS/ATOM');
    define('_WEBLINKS_ADMIN_RSS_REFRESH_LINK', 'Actualizar datos del enlace del enlace que est�n en cach� ');
    define('_WEBLINKS_ADMIN_RSS_REFRESH_SITE', 'Actualizar b�squedas RSS');
    define('_WEBLINKS_ADMIN_NUM_REFRESH_RSS_URL', 'N�mero de direcciones web RSS/ATOM que han sido actualizadas');
    define('_WEBLINKS_ADMIN_NUM_REFRESH_RSS_SITE', 'N�mero de sitios RSS que han sido actualizados');
    define('_WEBLINKS_ADMIN_NUM_REFRESH_ATOM_SITE', 'N�mero de sitios ATOM que han sido actualizados');
    define('_WEBLINKS_ADMIN_NUM_REFRESH_ATOMFEED', 'N�mero de semillas ATOM que han sido actualizadas');
    define('_WEBLINKS_ADMIN_RSS_CACHE_CLEAR', 'Limpiar cach� de RSS/ATOM');
    define('_WEBLINKS_RSS_CLEAR_NUM', 'Limpiar cach� de RSS/ATOM por fecha, si es mayor del n�mero especificado en el m�dulo de configuraci�n 1.');
    define('_WEBLINKS_RSS_NUMBER', 'N�mero de RSS');
    define('_WEBLINKS_RSS_CLEAR_LID', 'Limpiar cach� de las ID especificadas');
    define('_WEBLINKS_RSS_CLEAR_ALL', 'Borrar toda la cach�');
    define('_WEBLINKS_NUM_RSS_CLEAR_LINK', 'N�mero de enlaces RSS/ATOM en la cach� que han sido limpiados');
    define('_WEBLINKS_NUM_RSS_CLEAR_ATOMFEED', 'N�mero de semillas RSS/ATOM en la cach� que han sido limpiados');

    //======    user_list.php   ======
    define('_WEBLINKS_ADMIN_USER_MANAGE', 'Manejo de usuarios');
    define('_WEBLINKS_ADMIN_USER_EMAIL', 'Listado de usuarios con e-mail');
    define('_WEBLINKS_ADMIN_USER_LINK', 'Listado de usuarios registrados con informaci�n de enlace');
    define('_WEBLINKS_ADMIN_USER_NOLINK', 'Listado de usuarios registrados sin informaci�n de enlace');
    define('_WEBLINKS_ADMIN_USER_EMAIL_DSC', 'Mostrar s�lo un e-mail si est� duplicado');
    //define("_WEBLINKS_ADMIN_USER_LINK_DSC", 'Usar "Enviar Mensaje a Usuarios" del n�cleo de  XOOPS');
    //define("_WEBLINKS_USER_ALL", " Todos ");
    //define("_WEBLINKS_USER_MAX", " cada %s usuarios ");
    define('_WEBLINKS_THERE_ARE_USER', '<b>%s</b> usuarios encontrados');
    define('_WEBLINKS_USER_NUM', 'Mostrar desde el %s usuario al %s de usuario.');
    define('_WEBLINKS_USER_NOFOUND', 'Usuarios no encontrados');
    define('_WEBLINKS_UID_EMAIL', 'E-mail de qui�n env�a');

    //======    mail_users.php  ======
    define('_WEBLINKS_ADMIN_SENDMAIL', 'Enviar e-mail');
    define('_WEBLINKS_THERE_ARE_EMAIL', 'Hay <b>%s</b> e-mails');
    define('_WEBLINKS_SEND_NUM', 'Enviar e-mail desde %s al usuario %s al usuario');
    //define("_WEBLINKS_SEND_NEXT","Enviar los pr�ximos %s e-mails");
    //define("_WEBLINKS_SUBJECT_FROM", "Informacion desde %s");
    //define("_WEBLINKS_HELLO", "Hola %s");
    define('_WEBLINKS_MAIL_TAGS1', '{W_NAME} puedes imprimir el nombre de usuario');
    define('_WEBLINKS_MAIL_TAGS2', '{W_EMAIL} puedes imprimir el e-mail del usuario');
    define('_WEBLINKS_MAIL_TAGS3', '{W_LID} puedes imprimir el n�mero de usuario');

    // general
    define('_WEBLINKS_WEBMASTER', 'Webmaster');
    define('_WEBLINKS_SUBMITTER', 'Enviado por');
    //define("_WEBLINKS_MID","Modificar ID");
    define('_WEBLINKS_UPDATE', 'Actualizar');
    define('_WEBLINKS_SET_DEFAULT', 'Ajustar a valores de f�brica');
    define('_WEBLINKS_CLEAR', 'Borrar');
    define('_WEBLINKS_CHECK', 'Chequear');
    define('_WEBLINKS_NON', 'No hay nada que hacer');
    define('_WEBLINKS_SENDMAIL', 'Enviar e-Mail');

    // 2005-08-09
    // BUG 2827: RSS refresh: Invalid argument supplied for foreach()
    define('_WEBLINKS_ADMIN_NO_LINK_BROKEN_CHECK', 'No hay enlace para chequear');
    define('_WEBLINKS_ADMIN_NO_RSS_REFRESH', 'No hay enlace para actualizar RSS');

    // 2005-10-20
    define('_WEBLINKS_LINK_APPROVED', '[{X_SITENAME}] {X_MODULE}: El enlace ha sido aprobado');
    define('_WEBLINKS_LINK_REFUSED', '[{X_SITENAME}] {X_MODULE}: El enlace ha sido rechazado');

    // 2006-05-15
    define('_AM_WEBLINKS_INDEX_DESC', 'Texto de introducci�n en p�gina principal');
    define('_AM_WEBLINKS_INDEX_DESC_DSC', 'Puedes utilizar �sta secci�n para mostrar texto descriptivo. HTML permitido.');
    define('_AM_WEBLINKS_INDEX_DESC_DEFAULT', '<div align="center" style="color: #0000ff">Aqu� va tu p�gina de introducci�n.<br>Puedes editarlo en el "M�dulo de configuraci�n 2".<br></div>');

    define('_AM_WEBLINKS_ADD_CATEGORY', 'Agrega una nueva categor�a');
    define('_AM_WEBLINKS_ERROR_SOME', 'Hay mensajes de error');
    define('_AM_WEBLINKS_LIST_ID_ASC', 'Listado desde el m�s antiguo');
    define('_AM_WEBLINKS_LIST_ID_DESC', 'Listado desde el m�s nuevo');

    // config
    define('_AM_WEBLINKS_WARNING_NOT_WRITABLE', 'El directorio no se puede escribir.');
    define('_AM_WEBLINKS_CONF_LINK', 'Configuraci�n de enlace');
    define('_AM_WEBLINKS_CONF_LINK_IMAGE', 'Configuraci�n de las im�genes del enlace');
    define('_AM_WEBLINKS_CONF_VIEW', 'Ver configuraci�n');
    define('_AM_WEBLINKS_CONF_TOPTEN', 'Configuraci�n del Top Ten');
    define('_AM_WEBLINKS_CONF_SEARCH', 'Configuraci�n de la b�squeda');

    define('_AM_WEBLINKS_USE_BROKENLINK', 'Reportar enlaces a reparar');
    define('_AM_WEBLINKS_USE_BROKENLINK_DSC', 'SI/YES permite a los usuario reportar cualquier enlace que contenga errores');
    define('_AM_WEBLINKS_USE_HITS', 'Contabilizar visita cuando visiten el sitio del enlace');
    define('_AM_WEBLINKS_USE_HITS_DSC', 'SI/YES activa el contador de visitas cuando visiten el enlace');
    define('_AM_WEBLINKS_USE_PASSWD', 'Autentificaci�n por contrase�a');
    define('_AM_WEBLINKS_USE_PASSWD_DSC', 'SI/YES, <b>usuario an�nimo</b> puede modificar un enlace con autentificaci�n de contrase�a.<br>NO, <br>ocultar� los campos de la contrase�a.');
    define('_AM_WEBLINKS_PASSWD_MIN', 'Longitud m�nima de la contrase�a');
    define('_AM_WEBLINKS_POST_TEXT', 'El administrador tiene toda la autoridad');
    define('_AM_WEBLINKS_AUTH_DOHTML', 'Permiso para utilizar etiquetas HTML');
    define('_AM_WEBLINKS_AUTH_DOHTML_DSC', 'Especificar que grupos pueden utilizar etiquetas HTML');
    define('_AM_WEBLINKS_AUTH_DOSMILEY', 'Permiso para utilizar iconos gestuales');
    define('_AM_WEBLINKS_AUTH_DOSMILEY_DSC', 'Especificar que grupos pueden utilizar iconos gestuales');
    define('_AM_WEBLINKS_AUTH_DOXCODE', 'Permiso para utilizar c�digos de XOOPS');
    define('_AM_WEBLINKS_AUTH_DOXCODE_DSC', 'Especificar que grupos pueden utilizar c�digos de XOOPS');
    define('_AM_WEBLINKS_AUTH_DOIMAGE', 'Permiso para utilizar im�genes');
    define('_AM_WEBLINKS_AUTH_DOIMAGE_DSC', 'Especificar que grupos pueden utilizar images');
    define('_AM_WEBLINKS_AUTH_DOBR', 'Permiso para utilizar l�neas');
    define('_AM_WEBLINKS_AUTH_DOBR_DSC', 'Especificar que grupos pueden utilizar l�neas');
    define('_AM_WEBLINKS_SHOW_CATLIST', 'Mostrar listado de categor�as en submen�');
    define('_AM_WEBLINKS_SHOW_CATLIST_DSC', 'SI/YES muestra listado de categor�as en submen�');
    define('_AM_WEBLINKS_VIEW_URL', 'Ver estilo de web');
    define(
        '_AM_WEBLINKS_VIEW_URL_DSC',
        'NONE <br>no hay web � se mostrar� etiqueta.<br>Indirectamente<br> se mostrar� visit.php en el campo de referencia de la web. <br>Directamente <br>se mostrar� la direcci�n web del enlace en el campo de referencia, usando el rat�n hacia abajo y haciendo click en �l, ser� contabilizado via JavaScript.'
    );
    define('_AM_WEBLINKS_VIEW_URL_0', 'NONE');
    define('_AM_WEBLINKS_VIEW_URL_1', 'Direcci�n web indirecta');
    define('_AM_WEBLINKS_VIEW_URL_2', 'Direcci�n web directa');
    define('_AM_WEBLINKS_RECOMMEND_PRI', 'Prioridad de los sitios recomendados');
    define(
        '_AM_WEBLINKS_RECOMMEND_PRI_DSC',
        'NONE <br>No se muestran.<br>NORMAL <br>Sitios recomendados se mostrar�n en la cabecera.<br>ALTA <br>Sitios recomendados se mostrar�n en la primera posici�n de cada categor�a.'
    );
    define('_AM_WEBLINKS_MUTUAL_PRI', 'Prioridad de los sitios asociados');
    define(
        '_AM_WEBLINKS_MUTUAL_PRI_DSC',
        'NONE <br>No se muestran.<br>NORMAL <br>Sitios asociados se mostrar�n en la cabecera.<br>ALTA <br>Sitios asociadose mostrar�n en la primera posici�n de cada categor�a.'
    );
    define('_AM_WEBLINKS_PRI_0', 'NONE');
    define('_AM_WEBLINKS_PRI_1', 'NORMAL');
    define('_AM_WEBLINKS_PRI_2', 'ALTA');
    define('_AM_WEBLINKS_LINK_IMAGE_AUTO', 'Actualizar autom�ticamente tama�o de la imagen del banner.');
    define('_AM_WEBLINKS_LINK_IMAGE_AUTO_DSC', 'SI/YES <br>Actualizar autom�ticamente tama�o de la imagen del banner.');
    define('_AM_WEBLINKS_RSS_USE', 'Usar semilla RSS');
    define('_AM_WEBLINKS_RSS_USE_DSC', 'SI/YES <br>Tomar y mostrar semilla RSS/ATOM.');

    // bulk import
    define('_AM_WEBLINKS_BULK_IMPORT', 'Importaci�n por bloque');
    define('_AM_WEBLINKS_BULK_IMPORT_FILE', 'Importaci�n por bloque de cada archivo');
    define('_AM_WEBLINKS_BULK_CAT', 'Importaci�n por bloque de las categor�as');
    define('_AM_WEBLINKS_BULK_CAT_DSC1', 'Describir categor�as');
    define('_AM_WEBLINKS_BULK_CAT_DSC2', 'Usar una flecha entre par�ntesis(>) al comienzo de la categor�a para definir una categor�a c�mo subcategor�a.');
    define('_AM_WEBLINKS_BULK_LINK', 'Importaci�n por bloque de los enlaces');
    define('_AM_WEBLINKS_BULK_LINK_DSC1', 'Introduce una categor�a en la primera l�nea.');
    define('_AM_WEBLINKS_BULK_LINK_DSC2', 'Describe t�tulo del enlace, direcci�n web, y una explicaci�n dividad por comas(,) en la segunda l�nea.');
    define('_AM_WEBLINKS_BULK_LINK_DSC3', 'Usar guiones para separar c�mo una barra horizontal (---) .');
    define('_AM_WEBLINKS_BULK_ERROR_LAYER', 'Especifica dos o m�s capas bajo la categor�a en la estructura. Esto necesita clarificaci�n G.S.');
    define('_AM_WEBLINKS_BULK_ERROR_CID', 'Error de ID de la categor�a');
    define('_AM_WEBLINKS_BULK_ERROR_PID', 'Error de ID de la categor�a padre');
    define('_AM_WEBLINKS_BULK_ERROR_FINISH', 'Un error ha detenido la operaci�n');

    // command
    define('_AM_WEBLINKS_CREATE_CONFIG', 'Crear arcTest execute fori�n');
    define('_AM_WEBLINKS_TEST_EXEC', 'Ejecutar test para %s');

    // === 2006-10-05 ===
    // menu
    define('_AM_WEBLINKS_MODULE_CONFIG_3', 'Configuraci�n del M�dulo 3');
    define('_AM_WEBLINKS_MODULE_CONFIG_4', 'Configuraci�n del M�dulo 4');
    define('_AM_WEBLINKS_VOTE_LIST', 'Listado de votos');
    define('_AM_WEBLINKS_CATLINK_LIST', 'Listado de enlaces por categor�as');
    define('_AM_WEBLINKS_COMMAND_MANAGE', 'Gesti�n de comandos');
    define('_AM_WEBLINKS_TABLE_MANAGE', 'Gesti�n de tablas de la base de datos');
    define('_AM_WEBLINKS_IMPORT_MANAGE', 'Gesti�n de importaci�n');
    define('_AM_WEBLINKS_EXPORT_MANAGE', 'Gesti�n de exportaci�n');

    // config
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_2', 'Autorizar, Categor�as, etc');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_3', 'Enlace');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_4', 'RSS, Foro, Mapa');
    define('_AM_WEBLINKS_LINK_REGISTER', 'Ajustes de enlace: Descripci�n');

    // bin configuration
    define('_AM_WEBLINKS_FORM_BIN', 'Configuraci�n de comandos');
    define('_AM_WEBLINKS_FORM_BIN_DESC', 'Es utilizado en comando binario');
    define('_AM_WEBLINKS_CONF_BIN_PASS', 'Contrase�a');
    //define('_AM_WEBLINKS_CONF_BIN_PASS_DESC','Contrase�a');
    define('_AM_WEBLINKS_CONF_BIN_SEND', 'Enviar e-mail');
    //define('_AM_WEBLINKS_CONF_BIN_SEND_DESC','Enviar e-mail desde el m�s antiguo');
    define('_AM_WEBLINKS_CONF_BIN_MAILTO', 'Email para enviar');
    //define('_AM_WEBLINKS_CONF_BIN_MAILTO_DESC','Email para enviar desde el m�s antiguo');

    // rssc
    //define('_AM_WEBLINKS_RSS_DIRNAME','Nombre del directorio del m�dulo RSSC');
    //define('_AM_WEBLINKS_RSS_DIRNAME_DESC','Nombre del directorio del m�dulo RSSC desde el m�s antiguo');

    // link manage
    define('_AM_WEBLINKS_DEL_LINK', 'Borrar enlace');
    define('_AM_WEBLINKS_ADD_RSSC', 'Agregar enlace en el m�dulo RSSC');
    define('_AM_WEBLINKS_MOD_RSSC', 'Modificar enlace en el m�dulo RSSC');
    define('_AM_WEBLINKS_REFRESH_RSSC', 'Actualizar enlace en el m�dulo RSSC');
    define('_AM_WEBLINKS_APPROVE', 'Aprobar nuevo enlace');
    define('_AM_WEBLINKS_APPROVE_MOD', 'Aprobar solicitud de modificaci�n de nuevo enlace');
    define('_AM_WEBLINKS_RSSC_LID_SAVED', 'Grabar RSSC lid');
    define('_AM_WEBLINKS_GOTO_LINK_LIST', 'Volver a listado de enlaces');
    define('_AM_WEBLINKS_GOTO_LINK_EDIT', 'Volver a edici�n de enlace');
    define('_AM_WEBLINKS_ADD_BANNER', 'Agregar tama�o de imagen del banner');
    define('_AM_WEBLINKS_MOD_BANNER', 'Modificar tama�o de imagen del banner');

    // vote list
    define('_AM_WEBLINKS_VOTE_USER', 'Votos de usuarios registrados');
    define('_AM_WEBLINKS_VOTE_ANON', 'Votos de usuarios an�nimos');

    // locate
    define('_AM_WEBLINKS_CONF_LOCATE', 'Configuraci�n de localizaci�n');
    define('_AM_WEBLINKS_CONF_COUNTRY_CODE', 'C�digo de Pa�s');
    define(
        '_AM_WEBLINKS_CONF_COUNTRY_CODE_DESC',
        'Introduce el c�digo ccTLDs <br> <a href="https://www.iana.org/cctld/cctld-whois.htm" target="_blank">IANA: Aqu� encontrar�s �se c�digo ccTLDs. En el caso de Espa�a, el c�digo es el (punto).es</a>'
    );
    define(
        '_AM_WEBLINKS_CONF_RENEW_COUNTRY_CODE_DESC',
        '
Actualizar el tema que se relaciona con el c�digo de pa�s. <br> El tema con <span style="color:#0000ff;">#</span> mark'
    );
    define('_AM_WEBLINKS_RENEW', 'Renovar');

    // map
    define('_AM_WEBLINKS_CONF_MAP', 'Configuraci�n de mapa en el sitio');
    define('_AM_WEBLINKS_CONF_MAP_USE', 'Usar mapa en el sitio');
    define('_AM_WEBLINKS_CONF_MAP_TEMPLATE', 'Plantilla del mapa de sitio');
    define('_AM_WEBLINKS_CONF_MAP_TEMPLATE_DESC', 'Introduce la plantilla del mapa de sitio por FTP en template/map/ directory');

    // google map: hacked by wye <https://never-ever.info/>
    define('_AM_WEBLINKS_CONF_GOOGLE_MAP', 'Configuraci�n de mapas de Google');
    define('_AM_WEBLINKS_CONF_GM_USE', 'Usar mapas de Google');
    define('_AM_WEBLINKS_CONF_GM_APIKEY', 'Introduce la llave API de los mapas de Google');
    define(
        '_AM_WEBLINKS_CONF_GM_APIKEY_DESC',
        'Consigue la llave API en <br> <a href="https://www.google.com/apis/maps/signup.html" target="_blank">La cerajerr�a API de Google :D</a> <br> cuando uses los mapas de Google'
    );
    define('_AM_WEBLINKS_CONF_GM_SERVER', 'Nombre del servidor');
    define('_AM_WEBLINKS_CONF_GM_LANG', 'C�digo de lenguaje');
    define('_AM_WEBLINKS_CONF_GM_LOCATION', 'Localizaci�n por defecto');
    define('_AM_WEBLINKS_CONF_GM_LATITUDE', 'Latitud por defecto');
    define('_AM_WEBLINKS_CONF_GM_LONGITUDE', 'Longitud por defecto');
    define('_AM_WEBLINKS_CONF_GM_ZOOM', 'Nivel de Zoom por defecto');

    // google search
    define('_AM_WEBLINKS_CONF_GOOGLE_SEARCH', 'Confirmaci�n de la b�squeda de Google');
    define('_AM_WEBLINKS_CONF_GOOGLE_SERVER', 'Nombre del servidor');
    define('_AM_WEBLINKS_CONF_GOOGLE_LANG', 'C�digo de lenguaje');

    // template
    define('_AM_WEBLINKS_CONF_TEMPLATE', 'Limpiar cach� de plantillas');
    define(
        '_AM_WEBLINKS_CONF_TEMPLATE_DESC',
        'DEBES ejecutar �sto cuando hayas cambiado algo en los archivos de plantillas que est�n en los directorios template/parts/ template/xml/ y template/map/'
    );

    // === 2006-12-11 ===
    // link item
    //define('_AM_WEBLINKS_TIME_PUBLISH','Ajusta la fecha de publicaci�n');
    //define('_AM_WEBLINKS_TIME_PUBLISH_DESC','Si no marcas �sto, la publicaci�n aparecer� sin fecha de inicio');
    //define('_AM_WEBLINKS_TIME_EXPIRE','Ajusta la fecha de finalizaci�n');
    //define('_AM_WEBLINKS_TIME_EXPIRE_DESC','Si no marcas �sto, la publicaci�n aparecer� sin fecha de finalizaci�n');
    define('_AM_WEBLINKS_LINK_TIME_PUBLISH_BEFORE', 'Listado de enlaces antes de ser publicados');
    define('_AM_WEBLINKS_LINK_TIME_EXPIRE_AFTER', 'Listado de enlaces despu�s de que hayan finalizado');

    define('_AM_WEBLINKS_SERVER_ENV', 'Variables del servidor ');
    define('_AM_WEBLINKS_DEBUG_CONF', 'Depurar variables');
    define('_AM_WEBLINKS_ALL_GREEN', 'Todo es correcto');

    // === 2007-02-20 ===
    // performance
    define('_AM_WEBLINKS_UPDATE_CAT_PATH', 'Actualizar la ruta del �rbol de categor�as');
    define('_AM_WEBLINKS_UPDATE_CAT_COUNT', 'Actualizaci�n de la categor�a de enlaces');
    define('_AM_WEBLINKS_CAT_COUNT_UPDATED', 'Ruta del �rbol de categor�as actualizada');

    // config
    define('_AM_WEBLINKS_SYSTEM_POST_LINK', 'Contabilizar cuando envien enlaces');
    define('_AM_WEBLINKS_SYSTEM_POST_LINK_DSC', 'SI/YES contabiliza al usuario cada vez que env�a un enlace. ');
    define('_AM_WEBLINKS_SYSTEM_POST_RATE', 'Contabilizar cuando califiquen enlaces');
    define('_AM_WEBLINKS_SYSTEM_POST_RATE_DSC', 'SI/YES contabiliza al usuario cada vez que califica un enlace');

    define('_AM_WEBLINKS_VIEW_STYLE_CAT', 'Ver estilo en cada categor�a');
    define('_AM_WEBLINKS_VIEW_STYLE_MARK', 'Ver estilo en cada sitio recomendado');
    define('_AM_WEBLINKS_VIEW_STYLE_MARK_DSC', 'Si se aplica en cada sitio recomendado, asociado � RSS/ATOM');
    define('_AM_WEBLINKS_VIEW_STYLE_0', 'Sumario');
    define('_AM_WEBLINKS_VIEW_STYLE_1', 'Todos los detalles');

    define('_AM_WEBLINKS_CONF_PERFORMANCE', 'Mejoras del rendimiento');
    define(
        '_AM_WEBLINKS_CONF_PERFORMANCE_DSC',
        'Debido a la mejora del rendimiento, que calcula los datos necesarios de antemano cuando se demuestre, y almacena en la base de datos.<br>Cuando se use por primera vez, ejecuta "listado de categor�as/category list" -> "Actualizar la ruta del �rbol de categor�as/Update category path tree"'
    );
    define('_AM_WEBLINKS_CAT_PATH', 'Ruta del �rbol de categor�as');
    define('_AM_WEBLINKS_CAT_PATH_DSC', 'SI/YES calcula la ruta del �rbol de categor�as y la almacena en la tabla de categor�as.<br>NO las calcula mientras se muestran.');
    define('_AM_WEBLINKS_CAT_COUNT', 'Contabilizar categor�as de enlace');
    define('_AM_WEBLINKS_CAT_COUNT_DSC', 'SIYES calcula y contabiliza las categor�as de enlace y las almacena en la tabla de categor�as.<br>NO las calcula mientras se muestran.');

    define('_AM_WEBLINKS_POST_TEXT_4', 'Todos los temas se muestran en la p�gina de administraci�n');
    define('_AM_WEBLINKS_LINK_REGISTER_1', 'Ajustes de enlace: Area de texto 1');

    define('_AM_WEBLINKS_CONF_LINK_GUEST', 'Configuraci�n del registro de enlace');
    define('_AM_WEBLINKS_USE_CAPTCHA', 'Usar CAPTCHA');
    define(
        '_AM_WEBLINKS_USE_CAPTCHA_DSC',
        'CAPTCHA Es una t�cnica para evitar el acceso p�blico no deseado, robots, spammers y otros relacionados.<br>Esta caracter�stica requiere que tengas instalado el m�dulo CAPTCHA.<br>SI/YES, <b>usuario an�nimo</b> debe usar CAPTCHA cuando agregue o modifique un enlace.<br>NO oculta el campo requerido para el m�dulo CAPTCHA.'
    );
    define('_AM_WEBLINKS_CAPTCHA_FINDED', 'M�dulo CAPTCHA versi�n %s est� instalado');
    define('_AM_WEBLINKS_CAPTCHA_NOT_FINDED', 'M�dulo CAPTCHA no est� instalado');

    define('_AM_WEBLINKS_CONF_SUBMIT', 'Descripci�n del formulario de registro del enlace');
    define('_AM_WEBLINKS_SUBMIT_MAIN', 'Descripci�n para a�adir nuevo enlace: 1');
    define('_AM_WEBLINKS_SUBMIT_PENDING', 'Descripci�n para a�adir nuevo enlace: 2');
    define('_AM_WEBLINKS_SUBMIT_DOUBLE', 'Descripci�n para a�adir nuevo enlace: 3');
    define('_AM_WEBLINKS_SUBMIT_MAIN_DSC', 'Mostrar siempre');
    define('_AM_WEBLINKS_SUBMIT_PENDING_DSC', 'Mostrar cuando "necesita ser aprobado por el administrador/supervisor" ');
    define('_AM_WEBLINKS_SUBMIT_DOUBLE_DSC', 'Mostrar cuando "exista el enlace" ');

    define('_AM_WEBLINKS_MODLINK_MAIN', 'Descrici�n del enlace modificado: 1');
    define('_AM_WEBLINKS_MODLINK_PENDING', 'Descrici�n del enlace modificado: 2');
    define('_AM_WEBLINKS_MODLINK_NOT_OWNER', 'Descrici�n del enlace modificado: 3');
    define('_AM_WEBLINKS_MODLINK_NOT_OWNER_DSC', 'Mostrar cuando "necesita ser aprobado por el administrador/supervisor" y no eres qui�n envi� �ste enlace');

    define('_AM_WEBLINKS_CONF_CAT_FORUM', 'Ver Foro en categor�a');
    define('_AM_WEBLINKS_CONF_LINK_FORUM', 'Ver Foro en enlace');
    //define('_AM_WEBLINKS_FORUM_SEL', 'Selecciona m�dulo para el foro');
    define('_AM_WEBLINKS_FORUM_THREAD_LIMIT', 'N�mero de hilos mostrados');
    define('_AM_WEBLINKS_FORUM_POST_LIMIT', 'N�mero de opiniones por cada hilo');
    define('_AM_WEBLINKS_FORUM_POST_ORDER', 'Orden de las opiniones');
    define('_AM_WEBLINKS_FORUM_POST_ORDER_0', 'Opiniones m�s antiguas');
    define('_AM_WEBLINKS_FORUM_POST_ORDER_1', 'Opiniones m�s nuevas');
    //define('_AM_WEBLINKS_FORUM_INSTALLED',     'M�dulo de foro ( %s ) versi�n %s est� instalada');
    //define('_AM_WEBLINKS_FORUM_NOT_INSTALLED', 'M�dulo de foro no est� instalado');

    // === 2007-03-25 ===
    define('_AM_WEBLINKS_UPDATE_CAT_IMAGE_SIZE', 'Actualizar tama�o de imagen de categor�a');

    define('_AM_WEBLINKS_CONF_INDEX', 'Configuraci�n de p�gina de inicio');
    define('_AM_WEBLINKS_CONF_INDEX_GM_MODE', 'Modo del mapa de Google');

    define('_AM_WEBLINKS_CAT_SHOW_GM', 'Mostrar mapa de Google');
    define('_AM_WEBLINKS_MODE_NON', 'No mostrar');
    define('_AM_WEBLINKS_MODE_DEFAULT', 'Valor por defecto');
    define('_AM_WEBLINKS_MODE_PARENT', 'Igual que en la categor�a anterior');
    define('_AM_WEBLINKS_MODE_FOLLOWING', 'Siguiente valor');

    define('_AM_WEBLINKS_CONF_CAT_ALBUM', 'Ver album en categor�a');
    define('_AM_WEBLINKS_CONF_LINK_ALBUM', 'Ver album en enlace');
    //define('_AM_WEBLINKS_ALBUM_SEL', 'Seleccionar m�dulo de album');
    define('_AM_WEBLINKS_ALBUM_LIMIT', 'N�mero de fotos mostradas');
    define('_AM_WEBLINKS_WHEN_OMIT', 'Proceso cuando se omita');

    define('_AM_WEBLINKS_MODULE_INSTALLED', '%s M�dulo ( %s ) versi�n %s est� instalado');
    define('_AM_WEBLINKS_MODULE_NOT_INSTALLED', '%s M�dulo ( %s ) no est� instalado');

    // === 2007-04-08 ===
    define('_AM_WEBLINKS_CAT_DESC_MODE', 'Mostrar descripci�n');
    define('_AM_WEBLINKS_CAT_SHOW_FORUM', 'Mostrar foro');
    define('_AM_WEBLINKS_CAT_SHOW_ALBUM', 'Mostrar album');
    define('_AM_WEBLINKS_MODE_SETTING', 'Ajustar valores');
    define('_AM_WEBLINKS_MODE_OMIT_PARENT', 'Igual que la categor�a anterior cuando se omita');

    // === 2007-06-10 ===
    // d3forum
    define('_AM_WEBLINKS_CONF_D3FORUM', 'Integraci�n de comentarios con m�dulo d3forum');
    define('_AM_WEBLINKS_PLUGIN_SEL', 'Seleccionar plugin');
    define('_AM_WEBLINKS_DIRNAME_SEL', 'Seleccionar m�dulo');

    // category
    define('_AM_WEBLINKS_CAT_PATH_STYLE', 'Ver estilo en ruta de categor�a');

    // category page
    define('_AM_WEBLINKS_CONF_CAT_PAGE', 'Ajustes de la p�gina de categor�as');
    define('_AM_WEBLINKS_CAT_COLS', 'N�mero de columnas en categor�as');
    define('_AM_WEBLINKS_CAT_COLS_DESC', 'En p�gina de categor�as, especificar el n�mero de columnas cuando se muestren las categor�as bajo una jerarqu�a');
    define('_AM_WEBLINKS_CAT_SUB_MODE', 'Ver rango de subcategor�as');
    define('_AM_WEBLINKS_CAT_SUB_MODE_1', 'S�lo categor�as bajo una jerarqu�a');
    define('_AM_WEBLINKS_CAT_SUB_MODE_2', 'todas las categor�as bajo una o m�s categor�as');

    // === 2007-07-14 ===
    // highlight
    define('_AM_WEBLINKS_USE_HIGHLIGHT', 'Resaltar palabras clave');
    define('_AM_WEBLINKS_CHECK_MAIL', 'Chequear formato de e-mail');
    define('_AM_WEBLINKS_CHECK_MAIL_DSC', 'NO permite cualquier formato. <br> SI/YES verifica que el formato sea del tipo abc@efg.com cuando registre un anuncio. ');
    //define('_AM_WEBLINKS_NO_EMAIL', 'No poner e-mail');

    // === 2007-08-01 ===
    // config
    define('_AM_WEBLINKS_MODULE_CONFIG_0', 'Configuraci�n del m�dulo');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_0', 'Inicio');
    define('_AM_WEBLINKS_MODULE_CONFIG_5', 'Configurar M�dulo 5');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_5', 'Registro de enlace');
    define('_AM_WEBLINKS_MODULE_CONFIG_6', 'Configurar M�dulo 6');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_6', 'Mapa de Google');

    // google map
    define('_AM_WEBLINKS_GM_MAP_CONT', 'Control del mapa');
    define('_AM_WEBLINKS_GM_MAP_CONT_DESC', 'Control del mapa largo, Control del mapa peque�o, Control del zoom del mapa');
    define('_AM_WEBLINKS_GM_MAP_CONT_NON', 'No mostrar');
    define('_AM_WEBLINKS_GM_MAP_CONT_LARGE', 'Control largo');
    define('_AM_WEBLINKS_GM_MAP_CONT_SMALL', 'Control peque�o');
    define('_AM_WEBLINKS_GM_MAP_CONT_ZOOM', 'Control de zoom');
    define('_AM_WEBLINKS_GM_USE_TYPE_CONT', 'Usar control del tipo de mapa');
    define('_AM_WEBLINKS_GM_USE_TYPE_CONT_DESC', 'Control del tipo de mapa');
    define('_AM_WEBLINKS_GM_USE_SCALE_CONT', 'Usar control de escala');
    define('_AM_WEBLINKS_GM_USE_SCALE_CONT_DESC', 'Control de escala');
    define('_AM_WEBLINKS_GM_USE_OVERVIEW_CONT', 'Usar control de vista general del mapa');
    define('_AM_WEBLINKS_GM_USE_OVERVIEW_CONT_DESC', 'Control de vista general del mapa');
    define('_AM_WEBLINKS_GM_MAP_TYPE', '[Buscar] Tipo de mapa');
    define('_AM_WEBLINKS_GM_MAP_TYPE_DESC', 'Tipo de mapa');
    define('_AM_WEBLINKS_GM_GEOCODE_KIND', '[UTF-8] Tipo de codificaci�n');
    define(
        '_AM_WEBLINKS_GM_GEOCODE_KIND_DESC',
        'Buscar latitud y longitud desde<br><b>Resultado Simple</b><br>GClientGeocoder - Consigue latitud y longitud<br><b>M�s resultados</b><br>GClientGeocoder - Consigue sitio'
    );
    define('_AM_WEBLINKS_GM_GEOCODE_KIND_LATLNG', 'Resultado simple: Conseguir latitud y longitud');
    define('_AM_WEBLINKS_GM_GEOCODE_KIND_LOCATIONS', 'M�s resultados: conseguir los sitios');
    define('_AM_WEBLINKS_GM_USE_GEOCODE_TOKYO', '[Buscar en Jap�n] Usa CSIS');
    define('_AM_WEBLINKS_GM_USE_GEOCODE_TOKYO_DESC', 'V�lido en Jap�n<br>Conseguir latitud y longitud de la direcci�n');
    define('_AM_WEBLINKS_GM_USE_NISHIOKA', '[Buscar en Jap�n] Usa Inverse Geocode');
    define(
        '_AM_WEBLINKS_GM_USE_NISHIOKA_DESC',
        'Valido en Jap�n<br>Busca direcciones desde latitud y longitud<br><a href="https://nishioka.sakura.ne.jp/google/" target="_blank">Esta el la web de mi amigo Nishioka</a>'
    );
    define('_AM_WEBLINKS_GM_TITLE_LENGTH', '[Marcador] M�ximos caracteres para el t�tulo');
    define('_AM_WEBLINKS_GM_TITLE_LENGTH_DESC', 'M�ximo n�mero de caracteres usados para el t�tulo en el marcador<br><b>-1</b> es ilimitado');
    define('_AM_WEBLINKS_GM_DESC_LENGTH', '[Marcador] M�ximos caracteres para el contenido');
    define('_AM_WEBLINKS_GM_DESC_LENGTH_DESC', 'M�ximo n�mero de caracteres usados para el t�tulo en el marcador<br><b>-1</b> es ilimitado');
    define('_AM_WEBLINKS_GM_WORDWRAP', '[Marcador] M�ximos caracteres para wordwarp');
    define('_AM_WEBLINKS_GM_WORDWRAP_DESC', 'M�ximo n�mero de caracteres usados para el t�tulo en el marcador<br><b>-1</b> es ilimitado');
    define('_AM_WEBLINKS_GM_USE_CENTER_MARKER', '[Marcador] Mostrar el centro del marcador');
    define('_AM_WEBLINKS_GM_USE_CENTER_MARKER_DESC', 'En p�gina principal y de categor�as, mostrar el centro del marcador');

    // map jp
    define('_AM_WEBLINKS_MAP_JP_MANAGE', 'Configuraci�n de mapa de Jap�n');

    // column
    define('_AM_WEBLINKS_COLUMN_MANAGE', 'Manejo de columnas');
    define('_AM_WEBLINKS_COLUMN_MANAGE_DESC', 'Agregar columnas en tabla de enlace y modificar tabla');
    define('_AM_WEBLINKS_COLUMN_MANAGE_NOT_USE', 'No usar');
    define('_AM_WEBLINKS_THERE_ARE_COLUMN', 'Hay <b>%s</b> etc columnas en tabla de enlace');
    define('_AM_WEBLINKS_COLUMN_NUM', 'N�mero de columnas a�adidas');
    define('_AM_WEBLINKS_COLUMN_BIGGER_USE', 'El n�mero de columnas a�adidas es mayor que el n�mero de la tabla del enlace');
    define('_AM_WEBLINKS_COLUMN_UNMATCH', 'Las columnas no coinciden en la tabla de enlaces ni en la modificada');
    define('_AM_WEBLINKS_PHPMYADMIN', 'phpMyAdmin es una herramienta para corregir problemas en las tablas');
    define('_AM_WEBLINKS_LINK_NUM_ETC', 'El n�mero de las columnas a�adidas');

    // latest
    define('_AM_WEBLINKS_INDEX_MODE_LATEST', 'Orden de los �ltimos enlaces');
    define('_AM_WEBLINKS_INDEX_MODE_LATEST_UPDATE', 'Fecha de actualizaci�n');
    define('_AM_WEBLINKS_INDEX_MODE_LATEST_CREATE', 'Fecha de creaci�n');

    // header
    define('_AM_WEBLINKS_CONF_HTML_STYLE', 'Configuraci�n del estilo HTML');
    define('_AM_WEBLINKS_HEADER_MODE', 'Usar cabecera del m�dulo XOOPS');
    define(
        '_AM_WEBLINKS_HEADER_MODE_DESC',
        'Cuando es "NO", mostrar hoja de estilo y Javascript en la etiqueta<br>Cuando es "SI/YES", mostrarlos en etiqueta de cabecera, usando la cabecera del m�dulo de XOOPS<br>hay temas que no pueden ser utilizados'
    );

    // bulk
    define('_AM_WEBLINKS_BULK_SAMPLE', 'Para ver el ejemplo, pulsa en el bot�n de ejemplo');
    define('_AM_WEBLINKS_BULK_LINK_DSC10', 'Registrado y reparado');
    define('_AM_WEBLINKS_BULK_LINK_DSC20', 'El administrador puede especificar temas de registro');
    define('_AM_WEBLINKS_BULK_LINK_DSC21', 'Primer p�rrafo');
    define('_AM_WEBLINKS_BULK_LINK_DSC22', 'Segundo p�rrafo, y siguientes');
    define('_AM_WEBLINKS_BULK_LINK_DSC23', 'Ingrese el registro de nombres de elementos en la primera l�nea.<br>Pon una barra horizontal con guiones (---)');
    define('_AM_WEBLINKS_BULK_LINK_DSC24', 'Describir el registro de productos, por el orden de en el primer p�rrafo, dividido por una coma (,) en la segunda l�nea.');
    define('_AM_WEBLINKS_BULK_CHECK_URL', 'Verifica para ajustar la p�gina web');
    define('_AM_WEBLINKS_BULK_CHECK_DESCRIPTION', 'Verifica la descripci�n');

    // === 2007-09-01 ===
    // auth
    define('_AM_WEBLINKS_AUTH_DELETE', 'Puedes borrar');
    define('_AM_WEBLINKS_AUTH_DELETE_DSC', 'Especifica los grupos permitidos para aprobar solicitudes de borrado de enlaces');
    define('_AM_WEBLINKS_AUTH_DELETE_AUTO', 'Pueden aprobar el borrado de enlaces');
    define('_AM_WEBLINKS_AUTH_DELETE_AUTO_DSC', 'Especifica los grupos permitidos para aprobar solicitudes de borrado de enlaces');

    // nofitication
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE', 'Manejo de notificaciones');
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE_DESC', 'Ajustes para cada m�dulo de administrador<br>Es el mismo que la parte superior de la p�gina del m�dulo');
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE_NOT_USE', 'No lo puedes usar en algunas versiones de XOOPS');
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE_PLEASE', 'Si es el caso, usa la parte superior de la p�gina de �ste m�dulo');
    define('_AM_WEBLINKS_SUBJ_LINK_MOD_APPROVED', '[{X_SITENAME}] {X_MODULE}: Tu solicitud de modificaci�n del enlace ha sido aceptada y efectuada');
    define('_AM_WEBLINKS_SUBJ_LINK_MOD_REFUSED', '[{X_SITENAME}] {X_MODULE}: Tu solicitud de modificaci�n del enlace ha sido rechazada');
    define('_AM_WEBLINKS_SUBJ_LINK_DEL_APPROVED', '[{X_SITENAME}] {X_MODULE}: Tu solicitud de borrado del enlace ha sido aceptada y efectuada');
    define('_AM_WEBLINKS_SUBJ_LINK_DEL_REFUSED', '[{X_SITENAME}] {X_MODULE}: Tu solicitud de borrado del enlace ha sido rechazada');

    // config
    define('_AM_WEBLINKS_ADMIN_WAITING_SHOW', 'Mostrar lista de espera del administrador');
    define('_AM_WEBLINKS_USER_WAITING_NUM', 'N�mero de usuarios en espera de ser aceptados');
    define('_AM_WEBLINKS_USER_OWNER_NUM', 'N�mero de usuarios en espera ');
    define('_AM_WEBLINKS_USE_HITS_SINGLELINK', 'Contabilizar cuando visualizen el enlace');
    define('_AM_WEBLINKS_USE_HITS_SINGLELINK_DSC', 'SI/YES activa el contador cuando visualizen el enlace');
    define('_AM_WEBLINKS_MODE_RANDOM', 'Redireccionar aleatoriamente');
    define('_AM_WEBLINKS_MODE_RANDOM_URL', 'Web registrada');
    define('_AM_WEBLINKS_MODE_RANDOM_SINGLE', 'Enlace de enlace en �ste m�dulo');

    // request list
    define('_AM_WEBLINKS_DEL_REQS', 'Solicitud de espera de borrado en validaci�n');
    define('_AM_WEBLINKS_NO_DEL_REQ', 'No se requiere borrado de enlace');
    define('_AM_WEBLINKS_DEL_REQ_DELETED', 'Solicitud de borrado de enlace denegada');

    // link list
    define('_AM_WEBLINKS_LINK_USERCOMMENT_DESC', 'Listado de enlaces con comentarios para el administrador (Listado por el m�s nuevo)');

    // clone
    define('_AM_WEBLINKS_CLONE_LINK', 'Clonar');
    define('_AM_WEBLINKS_CLONE_MODULE', 'Clonar a otro m�dulo');
    define('_AM_WEBLINKS_CLONE_CONFIRM', 'Confirmar el clonado');
    define('_AM_WEBLINKS_NO_MODULE', 'No corresponde al m�dulo');

    // link form
    define('_AM_WEBLINKS_MODIFIED', 'Modificado');
    define('_AM_WEBLINKS_CHECK_CONFIRM', 'Confirmado');
    define('_AM_WEBLINKS_WARN_CONFIRM', 'ATENCI�N: Marcar para "Confirmado" de %s');
    define('_AM_WEBLINKS_RSSC_EXIST_MORE', 'Hay dos o m�s enlaces con el mismo "RSSC ID"');

    // web shot
    define('_AM_WEBLINKS_LINK_IMG_THUMB', 'Sustituir el enlace de la imagen');
    define(
        '_AM_WEBLINKS_LINK_IMG_THUMB_DSC',
        'Mostrar el sitio WEB en miniatura en lugar de la imagen en el v�nculo, <br>usando el servicio de miniaturas, <br>si no estable el v�nculo de la imagen.'
    );
    define('_AM_WEBLINKS_LINK_IMG_NON', 'NINGUNA');
    define('_AM_WEBLINKS_LINK_IMG_MOZSHOT', 'Usar <a href="https://mozshot.nemui.org/" target="_blank">MozShot</a>');
    define('_AM_WEBLINKS_LINK_IMG_SIMPLEAPI', 'Usar <a href="https://img.simpleapi.net/" target="_blank">SimpleAPI</a>');
}// --- define language begin ---
