<?php
// =======>Kirby Traductions<======= \\
// =======>  Dynamic Noiser  <======= \\

//=========================================================
// Modulo de Enlaces
// Idioma por defecto
// Idioma : Espa�ol
// 13-10-2007 Kirby & Dynamic Noiser
//=========================================================

// --- define language begin ---
if (!defined('WEBLINKS_LANG_MB_LOADED')) {
    define('WEBLINKS_LANG_MB_LOADED', 1);

    //---------------------------------------------------------
    // same as mylinks
    //---------------------------------------------------------

    //======     singlelink.php ======
    define('_WLS_CATEGORY', 'Categor�a');
    define('_WLS_HITS', 'Visitas');
    define('_WLS_RATING', 'Calificaci�n');
    define('_WLS_VOTE', 'Voto');
    define('_WLS_ONEVOTE', '1 voto');
    define('_WLS_NUMVOTES', '%s votos');
    define('_WLS_RATETHISSITE', 'Califica �ste Enlace');
    define('_WLS_REPORTBROKEN', 'Reporta un problema con �ste Enlace');
    define('_WLS_TELLAFRIEND', 'D�selo a un amigo');
    define('_WLS_EDITTHISLINK', 'Edita �ste Enlace');
    define('_WLS_MODIFY', 'Modifica');

    //======    submit.php  ======
    define('_WLS_SUBMITLINKHEAD', 'Env�a un nuevo Enlace');
    define('_WLS_SUBMITONCE', 'Env�a �ste Enlace una sola vez.');
    define('_WLS_DONTABUSE', 'El nombre e IP del usuario quedan registradas, por favor no abuse del sistema.');
    define('_WLS_TAKESHOT', 'Se tomar� una impresi�n de pantalla del sitio y puede tomar unos d�as para que sea agregado a nuestro directorio comercial.');
    define(
        '_WLS_ALLPENDING',
        'El env�o de su enlace es registrado <b>temporaralmente</b>, y es publicado despues de su verificaci�n por parte del staff. <br>Puede agregar informaci�n del enlace antes de su aprobaci�n.'
    );
    //define("_WLS_WHENAPPROVED","Recibir� un E-mail cuando sea aprobado");
    define('_WLS_RECEIVED', 'Recibimos la informaci�n del Enlace, gracias!');

    //======    modlink.php ======
    define('_WLS_REQUESTMOD', 'Solicitar modificaci�n de enlace');
    define('_WLS_THANKSFORINFO', 'racias por la informaci�n. Su solicitud ser� revisada a la brevedad.');
    define('_WLS_THANKSFORHELP', 'Gracias por ayudar a mantener la integridad de este directorio.');
    define('_WLS_FORSECURITY', 'Por razones de seguridad su usuario e Ip ser�n almacenados temporaralmente.');
    define('_WLS_SEARCHFOR', 'Buscar por'); //-no use
    define('_WLS_ANY', 'cualquiera');
    define('_WLS_SEARCH', 'Buscar');
    define('_WLS_MAIN', 'Inicio');
    define('_WLS_SUBMITLINK', 'Enviar Enlace');
    define('_WLS_POPULAR', 'Popular');
    define('_WLS_TOPRATED', 'M�s valorado');
    define('_WLS_NEWTHISWEEK', 'Nuevo �sta semana');
    define('_WLS_UPTHISWEEK', 'Actualizado �sta semana');
    define('_WLS_POPULARITYLTOM', 'Popular (de menos a m�s valorados)');
    define('_WLS_POPULARITYMTOL', 'Popular (de m�s a menos visitados)');
    define('_WLS_TITLEATOZ', 'T�tulo (A a Z)');
    define('_WLS_TITLEZTOA', 'T�tulo (Z a A)');
    define('_WLS_DATEOLD', 'Fecha (Enlaces m�s antiguos primero)');
    define('_WLS_DATENEW', 'Fecha (Enlaces m�s nuevos primero)');
    define('_WLS_RATINGLTOH', 'Valoraci�n (De menos a m�s)');
    define('_WLS_RATINGHTOL', 'Valoraci�n (De m�s a menos)');
    define('_WLS_NOSHOTS', 'Captura de pantalla no disponible');
    define('_WLS_DESCRIPTIONC', 'Nombre: ');
    define('_WLS_EMAILC', 'E-mail: ');
    define('_WLS_CATEGORYC', 'Categor�a: ');
    define('_WLS_LASTUPDATEC', '�ltima actualizaci�n: ');
    define('_WLS_HITSC', 'Visitas: ');
    define('_WLS_RATINGC', 'Valoraci�n: ');
    define('_WLS_THEREARE', 'Existen <b>%s</b> Enlaces en nuestro directorio comercial');
    define('_WLS_LATESTLIST', '�ltimos listados');

    //define("_WLS_LINKID","ID del Enlace: ");
    //define("_WLS_SITETITLE","T�tulo de Web: ");
    //define("_WLS_SITEURL","URL de la Web: ");
    //define("_WLS_OPTIONS","Opciones: ");
    define('_WLS_LINKID', 'ID del Enlace: ');
    define('_WLS_SITETITLE', 'T�tulo de Web: ');
    define('_WLS_SITEURL', 'URL de la Web: ');
    define('_WLS_OPTIONS', 'Opciones: ');
    define('_WLS_NOTIFYAPPROVE', 'Notificarme de si este Enlace es aceptado o rechazado');
    define('_WLS_SHOTIMAGE', 'Imagen: ');
    define('_WLS_SENDREQUEST', 'Enviar Solicitud');
    define('_WLS_VOTEAPPRE', 'Aprecieamos tu voto.');
    define('_WLS_THANKURATE', 'Gracias por tu tiempo y por ponerle un %s a este Enlace');
    define('_WLS_VOTEFROMYOU', 'Aportaciones de los usuarios, tales como a ti mismo ayudar� a otros visitantes decidir mejor que Enlace elegir.');
    define('_WLS_VOTEONCE', 'Por favor, no votes m�s de una vez a un Enlace.');
    define('_WLS_RATINGSCALE', 'La escala es del 1 al 10, con 1 es p�simo y con 10 es excelente.');
    define('_WLS_BEOBJECTIVE', 'Por favor, sea objetivo, si se recibe siempre 1 � 10, la valoraci�n no ser� �til.');
    define('_WLS_DONOTVOTE', 'No votes a tu Enlace.');
    define('_WLS_RATEIT', '�V�talo!');
    define('_WLS_INTRESTLINK', 'Webs interesantes en %s');  // %s es tu sitio
    define('_WLS_INTLINKFOUND', 'Hay Webs interesantes en %s');  // %s es tu sitio
    define('_WLS_RANK', 'Votos');
    define('_WLS_TOP10', '%s Top 10'); // %s is a link category title
    define('_WLS_SEARCHRESULTS', 'Resultados de la busqueda <b>%s</b>:'); // %s is search keywords
    define('_WLS_SORTBY', 'Ordenar por:');
    define('_WLS_TITLE', 'T�tulo');
    define('_WLS_DATE', 'Fecha');
    define('_WLS_POPULARITY', 'Popularidad');
    define('_WLS_CURSORTEDBY', 'Sitios actualmente ordenados por: %s');
    define('_WLS_PREVIOUS', 'Anterior');
    define('_WLS_NEXT', 'Siguiente');
    define('_WLS_NOMATCH', 'No se encontr� nada');
    define('_WLS_SUBMIT', 'Enviar');
    define('_WLS_CANCEL', 'Cancelar');
    define('_WLS_ALREADYREPORTED', 'Ya habias reportado este Enlace roto.');
    define('_WLS_MUSTREGFIRST', 'No tienes permisos para hacer esto.<br>�Necesitas registrarte o loguearte!');
    define('_WLS_NORATING', 'Ningun Voto seleccionado.');
    define('_WLS_CANTVOTEOWN', 'No puedes votar a tu Enlace.<br>Todos los votos son registrados y repasados.');
    define('_WLS_VOTEONCE2', 'Vota solo una vez.<br>Todos los votos son registrados y repasados.');

    //%%%%%%    Admin     %%%%%

    define('_WLS_WEBLINKSCONF', 'Configuraci�n de Enlaces');
    define('_WLS_GENERALSET', 'Ajustes Generales');
    define('_WLS_ADDMODDELETE', 'A�ade, modifica y/o elimina categor�as/Enlaces');
    define('_WLS_LINKSWAITING', 'Nuevos Enlaces esperando validaci�n');
    define('_WLS_MODREQUESTS', 'Enlaces modificados esperando validaci�n');
    define('_WLS_BROKENREPORTS', 'Reportar Enlaces para reparar');
    define('_WLS_SUBMITTER', 'Emisor');
    define('_WLS_VISIT', 'Visita');

    //define("_WLS_SHOTMUST","La imagen de captura de pantalla debe ser un archivo v�lido en el directorio %s (ejemplo. shot.gif). Deja �sta en blanco si no hay imagen.");
    define('_WLS_LINKIMAGEMUST', ' Introduce el enlace de la imagen %s. (ejemplo. shot.gif). Deja �sta en blanco si no hay imagen.');
    define('_WLS_APPROVE', 'Aprobado');
    define('_WLS_DELETE', 'Borrado');
    define('_WLS_NOSUBMITTED', 'No hay Enlaces nuevos.');
    define('_WLS_ADDMAIN', 'Crea una nueva categor�a');
    define('_WLS_TITLEC', 'T�tulo: ');
    define('_WLS_IMGURL', 'Direcci�n de imagen (OPCIONAL, ancho redimensionado a 50): ');
    define('_WLS_ADD', 'Agregar');
    define('_WLS_ADDSUB', 'Crear una nueva subcategor�a');
    define('_WLS_IN', 'En');
    define('_WLS_ADDNEWLINK', 'Agregar un nuevo Enlace');
    define('_WLS_MODCAT', 'Modificar categor�a');
    define('_WLS_MODLINK', 'Modificar Enlace');
    define('_WLS_TOTALVOTES', 'Votos del Enlace (total votos: %s)');
    define('_WLS_USERTOTALVOTES', 'Votos de usuarios registrados (total votos: %s)');
    define('_WLS_ANONTOTALVOTES', 'Votos de usuarios an�nimos (total votos: %s)');
    define('_WLS_USER', 'Usuarios');
    define('_WLS_IP', 'Direcci�n IP');
    define('_WLS_USERAVG', 'Calificaci�n AVG del usuario');
    define('_WLS_TOTALRATE', 'Calificaciones totales');
    define('_WLS_NOREGVOTES', 'No hay votos de usuarios registrados');
    define('_WLS_NOUNREGVOTES', 'No hay votos de usuarios an�nimos');
    define('_WLS_VOTEDELETED', 'Datos de votos borrados.');
    define('_WLS_NOBROKEN', 'No hay reporte de Enlaces para reparar.');
    define('_WLS_IGNOREDESC', 'Ignorar (Ignorar el reporte  y borrar el <b>enlace de Enlace para reparar</b>)');
    define('_WLS_DELETEDESC', 'Borrar (Borrar <b>los datos de sitios web</b> y <b>Enlaces para reparar reportados)');
    define('_WLS_REPORTER', 'Envi� el reporte');
    define('_WLS_IGNORE', 'Rechazado');
    define('_WLS_LINKDELETED', 'Enlace borrado.');
    define('_WLS_BROKENDELETED', 'Enlace para reparar borrado.');

    //define("_WLS_USERMODREQ","Usuario que solicita la modificaci�n del Enlace");
    define('_WLS_ORIGINAL', 'Original');
    define('_WLS_PROPOSED', 'Propuesto');
    define('_WLS_OWNER', 'Propietario');
    define('_WLS_NOMODREQ', 'No hay solicitud de modificaci�n.');
    define('_WLS_DBUPDATED', 'Directorio comercial actualizado correctamente');
    define('_WLS_MODREQDELETED', 'Solicitud de modificaci�n borrada.');
    define('_WLS_IMGURLMAIN', 'Direcci�n de imagen (OPCIONAL y s�lo v�lido para categor�as principales, ancho redimensionado a 50): ');
    define('_WLS_PARENT', 'Categor�a padre:');
    define('_WLS_SAVE', 'Grabar cambios');
    define('_WLS_CATDELETED', 'Categor�as borradas.');
    define('_WLS_WARNING', 'ATENCION: Est�s seguro que quieres borrar �sta categor�a? Si lo haces, borrar�s todos los Enlaces que hay en ella');
    define('_WLS_YES', 'SI');
    define('_WLS_NO', 'NO');
    define('_WLS_NEWCATADDED', 'Nueva categor�a creada correctamente');
    //define("_WLS_ERROREXIST","ERROR: El Enlace ya est� en el directorio");
    //define("_WLS_ERRORTITLE","ERROR: Escribe un T�TULO");
    //define("_WLS_ERRORDESC","ERROR: Escribe una DESCRIPCI�N");
    define('_WLS_NEWLINKADDED', 'Nuevo Enlace agregado al directorio.');
    define('_WLS_YOURLINK', 'Enlace a p�gina web en %s');
    define('_WLS_YOUCANBROWSE', 'Puedes ven nuestros Enlaces en %s');
    define('_WLS_HELLO', 'Hola %s');
    define('_WLS_WEAPPROVED', 'Env�o de Enlace al directorio aprobado.');
    define('_WLS_THANKSSUBMIT', 'Gracias por a�adir otro Enlace');
    define('_WLS_ISAPPROVED', 'Enlace aprobado');

    //---------------------------------------------------------
    // weblinks
    //---------------------------------------------------------

    //======    index.php   ======
    // guidance bar
    define('_WLS_SUBMIT_NEW_LINK', 'Env�a un nuevo Enlace');
    define('_WLS_SITE_POPULAR', 'Enlace popular');
    define('_WLS_SITE_HIGHRATE', 'Enlace mejor calificado');
    define('_WLS_SITE_NEW', 'Nuevo Enlace');
    define('_WLS_SITE_UPDATE', 'Enlace actualizado');

    // corrected typo
    define('_WLS_SITE_RECOMMEND', 'Enlace recomendado');

    // BUG 3032: "mutual site" is not suitable English
    define('_WLS_SITE_MUTUAL', 'Enlace asociado');
    define('_WLS_SITE_RANDOM', 'Enlace aleatorio');
    define('_WLS_NEW_SITELIST', 'Nuevo Enlace');
    define('_WLS_NEW_ATOMFEED', 'Nueva RSS/ATOM');
    define('_WLS_SITE_RSS', 'Enlace RSS/ATOM');
    define('_WLS_ATOMFEED', 'Semilla RSS/ATOM');
    define('_WLS_LASTUPDATE', '�ltima actualizaci�n');
    define('_WLS_MORE', 'M�s detalles');

    //======     singlelink.php ======
    define('_WLS_DESCRIPTION', 'Descripci�n');
    define('_WLS_PROMOTER', 'Promotor');
    define('_WLS_ZIP', 'C�digo postal');
    define('_WLS_ADDR', 'Direcci�n');
    define('_WLS_TEL', 'N�mero de tel�fono');
    define('_WLS_FAX', 'N�mero de fax');

    //======     submit.php ======
    define('_WLS_BANNERURL', 'Direcci�n del Banner');
    define('_WLS_NAME', 'Nombre');
    define('_WLS_EMAIL', 'E-mail');
    define('_WLS_COMPANY', 'Empresa');
    define('_WLS_STATE', 'Provincia');
    define('_WLS_CITY', 'Ciudad');
    define('_WLS_ADDR2', 'Direcci�n 2');
    define('_WLS_PUBLIC', 'Publicar');
    define('_WLS_NOTPUBLIC', 'No publicar');
    define('_WLS_NOTSELECT', 'No especificado');
    define('_WLS_SUBMIT_INDISPENSABLE', 'Lo que est� marcado con una estrella <b>*</b> es indispensable.');
    define(
        '_WLS_SUBMIT_USER_COMMENT',
        '"Comentar al administrador" usa �ste campo para escribirle al administrador.<br>Lo que aqu� escribas no saldr� en la web.<br>No te olvides de poner la web del Enlace si es que tiene".'
    );
    define('_WLS_USER_COMMENT', 'Comentar al administrador');
    define('_WLS_NOT_DISPLAY', 'Esto no se ver� en la web.');

    //======    modlink.php ======
    define('_WLS_MODIFYAPPROVED', 'La modificaci�n solicitada ha sido aprobada.');
    define('_WLS_MODIFY_NOT_OWNER', 'Por favor, aseg�rate de que eres t� la misma persona que insert� el Enlace.');
    define('_WLS_MODIFY_PENDING', 'Grabado. Pendiente de aprobaci�n');
    define('_WLS_LINKSUBMITTER', 'Ha enviado el Enlace');

    //======    user.php    ======
    //define('_WLS_PLEASEPASSWORD','Escribe contrase�a');
    define('_WLS_REGSTERED', 'Usuario registrado');
    define('_WLS_REGSTERED_DSC', 'Cualquiera puede modificar el Enlace. <br>Se verificar� antes de publicar.');
    define('_WLS_EMAILNOTFOUND', 'El e-mail no coincide.');

    // error message
    define('_WLS_ERROR_FILL', 'Error: Introduce %s');
    define('_WLS_ERROR_ILLEGAL', 'Error: Formato incorrecto %s');
    define('_WLS_ERROR_CID', 'Error: Selecciona categor�a');
    define('_WLS_ERROR_URL_EXIST', 'Error: El Enlace ya est� registrado. ');
    define('_WLS_WARNING_URL_EXIST', 'Advertencia: Un Enlace similar ya existe en el directorio. ');
    define('_WLS_ERRORNOLINK', 'Error: No se encuentra el Enlace');
    define('_WLS_CATLIST', 'Listado de categor�as');
    define('_WLS_LINKIMAGE', 'Enlace a la imagen: ');
    //define("_WLS_USERID","ID de usuario: ");
    define('_WLS_CATEGORYID', 'IDde categor�a: ');
    //define("_WLS_CREATEC","Fecha de registro: ");
    define('_WLS_TIMEUPDATE', 'Actualizado');
    define('_WLS_NOTTIMEUPDATE', 'No actualizado');
    define('_WLS_LINKFLAG', 'Crear un enlace bajo �sto');
    define('_WLS_NOTLINKFLAG', 'No crear un enlace bajo �stos');
    define('_WLS_GOTOADMIN', 'Ir a la p�gina de administraci�n');

    // category delete
    define('_WLS_DELCAT', 'Borrar categor�a');
    define('_WLS_SUBCATEGORY', 'Subcategor�a');
    define('_WLS_SUBCATEGORY_NON', 'No hay subcategor�a');
    define('_WLS_LINK_BELONG', 'Enlaces relacionados');
    define('_WLS_LINK_BELONG_NUMBER', 'Number Enlaces relacionados');
    define('_WLS_LINK_BELONG_NON', 'No hay Enlaces relacionados');
    define('_WLS_LINK_MAYBE_DELETE', 'Enlaces a ser borrados');
    define('_WLS_LINK_MAYBE_DELETE_DSC', 'Los resultados de la operaci�npueden ser diferentes si hay subcategor�as. Algunos Enlaces pueden ser borrados.');
    define('_WLS_LINK_DELETE_NON', 'No hay coemrcios para borrar');
    define('_WLS_CATEGORY_LINK_DELETE_EXCUTE', 'Borrar categor�a y Enlaces que hay en ella');
    define('_WLS_CATEGORY_LINK_DELETED', 'Categor�a y Enlaces borrados.');
    define('_WLS_CATEGORY_DELETED', 'Categor�as borradas');
    define('_WLS_LINK_DELETED', 'Enlaces borrados');
    define('_WLS_ERROR_CATEGORY', 'Error: Categor�a no seleccionada');
    define('_WLS_ERROR_MAX_SUBCAT', 'Error: Number of selected categories exceeds the maximum to be deleted at a time');
    define('_WLS_ERROR_MAX_LINK_BELONG', 'Error: El n�mero de Enlaces seleccionados para borrar supera el m�ximo permitido. ');
    define('_WLS_ERROR_MAX_LINK_DEL', 'Error: El n�mero de Enlaces seleccionados para borrar supera el m�ximo permitido de una sola vez.');

    // recommend site, mutual site
    define('_WLS_MARK', 'Marcador');
    define('_WLS_ADMINCOMMENT', 'Comentario del administrador');

    // broken link check
    define('_WLS_BROKEN_COUNTER', 'Contador de Enlaces debe ser reparado');

    // RSS/ATOM URL
    define('_WLS_RSS_URL', 'Direcci�n de RSS/ATOM');
    define('_WLS_RSS_URL_0', 'No se usa');
    define('_WLS_RSS_URL_1', 'Tipo RSS');
    define('_WLS_RSS_URL_2', 'Tipo ATOM');
    define('_WLS_RSS_URL_3', 'Autom�tico');

    define('_WLS_ATOMFEED_DISTRIBUTE', 'Distribuir semillas RSS/ATOM mostradas aqu�.');
    define('_WLS_ATOMFEED_FIREFOX', "Espero que est�s usando <a href='https://www.mozilla.org/products/firefox/' target='_blank'>Firefox</a>. Si es as�, a�ade a marcadores");

    // 2005-10-20
    define('_WLS_EMAIL_APPROVE', 'Se notificar� si se aprueba');
    define('_WLS_TOPTEN_TITLE', '%s Top %u');
    // %s es un t�tulo de Enlace
    // %u es el n�mero de Enlaces
    define('_WLS_TOPTEN_ERROR', 'Hay demasiadas categor�as principales. Detenido para mostrar %u');
    // %u es el n�mero de categor�as

    // 2006-04-02
    define('_WEBLINKS_MID', 'Modificar ID');
    define('_WEBLINKS_USERID', 'ID de usuario');
    define('_WEBLINKS_CREATE', 'Creado');

    // conflict with rssc
    //define('_HOME',  'Inicio');
    //define('_SAVE',  'Grabar');
    //define('_SAVED', 'Grabado');
    //define('_CREATE', 'Crear');
    //define('_CREATED','Creado');
    define('_FINISH', 'Finalizar');
    define('_FINISHED', 'Finalizado');
    //define('_EXECUTE', 'Ejecutar');
    //define('_EXECUTED','Ejecutado');
    define('_PRINT', 'Imprimir');
    define('_SAMPLE', 'Ejemplo');
    define('_NO_MATCH_RECORD', 'No hay coincidencias');
    define('_MANY_MATCH_RECORD', 'Hay dos o m�s coincidencias');
    define('_NO_CATEGORY', 'No hay categor�a');
    define('_NO_LINK', 'No hay Enlace');
    define('_NO_TITLE', 'No hay t�tulo');
    define('_NO_URL', 'No hay web');
    define('_NO_DESCRIPTION', 'No hay descripci�n');
    define('_GOTO_MAIN', 'Ir al principio');
    define('_GOTO_MODULE', 'Ir al m�dulo');

    // config
    define('_WEBLINKS_INIT_NOT', 'La tabla de configuraci�n no ha sido inicializada');
    define('_WEBLINKS_INIT_EXEC', 'Configuraci�n de la tabla inicializada');
    define('_WEBLINKS_VERSION_NOT', 'Este m�dulo es la versi�n %s . Actul�zalo');
    define('_WEBLINKS_UPGRADE_EXEC', 'Actualiza la tabla de configuraci�n');

    // html tag
    define('_WEBLINKS_OPTIONS', 'Opciones');
    define('_WEBLINKS_DOHTML', ' Activar etiquetas HTML');
    define('_WEBLINKS_DOIMAGE', ' Activar im�genes');
    define('_WEBLINKS_DOBREAK', ' Activar salto de l�nea');
    define('_WEBLINKS_DOSMILEY', ' Activar iconos gestuales');
    define('_WEBLINKS_DOXCODE', ' Activar c�digo de XOOPS');
    define('_WEBLINKS_PASSWORD_INCORRECT', 'Contrase�a incorrecta');
    define('_WEBLINKS_ETC', 'etc');
    define('_WEBLINKS_AUTH_UID', 'ID de usuario coincide');
    define('_WEBLINKS_AUTH_PASSWD', 'Contrase�a coincide');
    define('_WEBLINKS_BANNER_SIZE', 'Tama�o del Banner');

    // === 2006-10-01 ===
    // conflict with rssc
    if (!defined('_HOME')) {
        define('_HOME', 'Inicio');
        define('_SAVE', 'Grabar');
        define('_SAVED', 'Grabado');
        define('_CREATE', 'Crear');
        define('_CREATED', 'Creado');
        define('_EXECUTE', 'Ejecutar');
        define('_EXECUTED', 'Ejecutado');
    }

    define('_WEBLINKS_MAP_USE', 'Usar icono de mapa');

    // rssc
    define('_WEBLINKS_RSSC_LID', 'Lid RSSC');
    define('_WEBLINKS_RSS_MODE', 'Modo RSS');
    define('_WEBLINKS_RSSC_NOT_INSTALLED', 'M�dulo RSSC ( %s ) no instalado');
    define('_WEBLINKS_RSSC_INSTALLED', 'M�dulo RSSC ( %s ) versi�n %s instalado');
    define('_WEBLINKS_RSSC_REQUIRE', 'Requiere m�dulo RSSC versi�n %s o superior');
    define('_WEBLINKS_GOTO_SINGLELINK', 'Ir a informaci�n de Enlace');

    // warnig
    define('_WEBLINKS_WARN_NOT_READ_URL', 'ATENCION: No se puede leer la p�gina web');
    define('_WEBLINKS_WARN_BANNER_NOT_GET_SIZE', 'ATENCI�N: No se puede determinar el tama�o del banner');

    // google map: hacked by wye <https://never-ever.info/>
    define('_WEBLINKS_GM_LATITUDE', 'Latitud');
    define('_WEBLINKS_GM_LONGITUDE', 'Longitud');
    define('_WEBLINKS_GM_ZOOM', 'Nivel de Zoom');
    define('_WEBLINKS_GM_GET_LOCATION', 'Informaci�n tomada de GoogleMaps');
    //define('_WEBLINKS_GM_GET_BUTTON', 'Adquirir Latitud/Longitud/Zoom');
    define('_WEBLINKS_GM_DEFAULT_LOCATION', 'Localizaci�n por defecto');
    define('_WEBLINKS_GM_CURRENT_LOCATION', 'Localizaci�n actual');

    // === 2006-11-04 ===
    // google map inline mode
    define('_WEBLINKS_GOOGLE_MAPS', 'Google Maps');
    define('_WEBLINKS_JAVASCRIPT_INVALID', 'Tu navegador no est� usando JavaScript');
    define('_WEBLINKS_GM_NOT_COMPATIBLE', 'Tu navegador no puede usar GoogleMaps');
    define('_WEBLINKS_GM_NEW_WINDOW', 'Ver en nueva ventana');
    define('_WEBLINKS_GM_INLINE', 'Visualizaci�n en l�nea');
    define('_WEBLINKS_GM_DISP_OFF', 'Deshabilitar visualizaci�n');

    // google map: inverse Geocoder
    define('_WEBLINKS_GM_GET_LATITUDE', 'Adquirir Latitud/Longitud/Zoom');
    define('_WEBLINKS_GM_GET_ADDR', 'Adquirir direcci�n');

    // === 2006-12-11 ===
    // google map: Geocode
    define('_WEBLINKS_GM_SEARCH_MAP_FROM_ADDRESS', 'Buscar mapa desde direcci�n');
    define('_WEBLINKS_GM_NO_MATCH_PLACE', 'No se encuentra el sitio');
    define('_WEBLINKS_GM_JP_SEARCH_MAP_FROM_ADDRESS', 'Mapa de b�squeda de Jap�n');
    define('_WEBLINKS_GM_JP_TOKYO_AC_GEOCODE', 'Universidad de Tokyo Jap�n');
    define('_WEBLINKS_GM_JP_MLIT_ISJ', 'Ministerio de infraestructura y transporte de Jap�n');

    // link item
    define('_WEBLINKS_TIME_PUBLISH', 'Fecha de publicaci�n');
    define('_WEBLINKS_TIME_EXPIRE', 'Fecha de caducidad');
    define('_WEBLINKS_TEXTAREA', 'Area de texto');
    define('_WEBLINKS_WARN_TIME_PUBLISH', 'En espera para publicar');
    define('_WEBLINKS_WARN_TIME_EXPIRE', 'En breve finalizar�');
    define('_WEBLINKS_WARN_BROKEN', 'Este Enlace debe ser verificado');

    // === 2007-02-20 ===
    // forum
    define('_WEBLINKS_LATEST_FORUM', '�ltimo foro');
    define('_WEBLINKS_FORUM', 'Foro');
    define('_WEBLINKS_THREAD', 'Hilo');
    define('_WEBLINKS_POST', 'Post');
    define('_WEBLINKS_FORUM_ID', 'ID del foro');
    define('_WEBLINKS_FORUM_SEL', 'Seleccionar foro');
    define('_WEBLINKS_COMMENT_USE', 'Usar comentarios de XOOPS');

    // aux
    define('_WEBLINKS_CAT_AUX_TEXT_1', 'Texto auxiliar 1');
    define('_WEBLINKS_CAT_AUX_TEXT_2', 'Texto auxiliar 2');
    define('_WEBLINKS_CAT_AUX_INT_1', 'Texto auxiliar interno 1');
    define('_WEBLINKS_CAT_AUX_INT_2', 'Texto auxiliar interno 2');

    // captcha
    define('_WEBLINKS_CAPTCHA', 'Captcha');
    define('_WEBLINKS_CAPTCHA_DESC', 'Anti-Spam');
    define('_WEBLINKS_ERROR_CAPTCHA', 'Error: No coincide la imagen Captcha con lo que escribes');
    define('_WEBLINKS_ERROR', 'Error');

    // hack for multi site
    define('_WEBLINKS_CAT_TITLE_JP', 'T�tulo en Japon�s');
    define('_WEBLINKS_DISABLE_FEATURE', 'Desactivar �sta caracter�stica');
    define('_WEBLINKS_REDIRECT_JP_SITE', 'Ir a sitio japon�s');

    // === 2007-03-25 ===
    define('_WEBLINKS_ALBUM_ID', 'ID de album');
    define('_WEBLINKS_ALBUM_SEL', 'Seleccionar album');

    // === 2007-04-08 ===
    define('_WEBLINKS_GM_TYPE', 'Tipo de mapa de Google');
    define('_WEBLINKS_GM_TYPE_MAP', 'Vista de Mapa');
    define('_WEBLINKS_GM_TYPE_SATELLITE', 'Vista satelital');
    define('_WEBLINKS_GM_TYPE_HYBRID', 'Vista h�brida');

    // === 2007-08-01 ===
    define('_WEBLINKS_GM_CURRENT_ADDRESS', 'Direcci�n actual');
    define('_WEBLINKS_GM_SEARCH_LIST', 'Lista de resultados de la b�squeda');

    // === 2007-09-01 ===
    // waiting list
    define('_WEBLINKS_ADMIN_WAITING_LIST', 'Lista de espera del administrador');
    define('_WEBLINKS_USER_WAITING_LIST', 'Tu lista de espera');
    define('_WEBLINKS_USER_OWNER_LIST', 'Tu lista de enviados');

    // submit form
    define('_WEBLINKS_TIME_PUBLISH_SET', 'Ajusta la fecha de publicaci�n');
    define('_WEBLINKS_TIME_PUBLISH_DESC', 'Si no ajustas �sto, se publicar� sin fecha');
    define('_WEBLINKS_TIME_EXPIRE_SET', 'Ajusta la fecha de finalizaci�n');
    define('_WEBLINKS_TIME_EXPIRE_DESC', 'Si no ajustas �sto, finalizar� sin fecha');
    define('_WEBLINKS_DEL_LINK_CONFIRM', 'Confirma el borrado');
    define('_WEBLINKS_DEL_LINK_REASON', 'Raz�n para borrar');
}// --- define language end ---
