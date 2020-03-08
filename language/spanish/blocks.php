<?php
//=========================================================
// M�dulo WebLinks
// Traducido por Kirby y Dynamic Noiser
// Octubre 2007
//=========================================================

// --- define language begin ---
if (!defined('WEBLINKS_LANG_BL_LOADED')) {
    define('WEBLINKS_LANG_BL_LOADED', 1);
    // top.html
    define('_MB_WEBLINKS_DISP', 'Mostrar');
    define('_MB_WEBLINKS_LINKS', 'Enlaces');
    define('_MB_WEBLINKS_CHARS', 'Longitud del t�tulo');
    define('_MB_WEBLINKS_LENGTH', ' Caracteres');
    define('_MB_WEBLINKS_NEWDAYS', 'D�as de nuevo Enlace');
    define('_MB_WEBLINKS_DAYS', ' D�as');
    define('_MB_WEBLINKS_POPULAR', 'Visitas para ser popular');
    define('_MB_WEBLINKS_HITS', ' Visitas');
    define('_MB_WEBLINKS_PIXEL', ' Pixel');
    define('_MB_WEBLINKS_RATING', 'Calificaci�n');
    define('_MB_WEBLINKS_VOTES', 'Votos');
    define('_MB_WEBLINKS_COMMENTS', 'Comentarios');

    // catlist.html
    define('_MB_WEBLINKS_TOTAL_LINKS', 'Total');
    define('_MB_WEBLINKS_IMAGE_MODE', 'Selecciona imagen de categor�a');
    define('_MB_WEBLINKS_IMAGE_MODE_0', 'NONE');
    define('_MB_WEBLINKS_IMAGE_MODE_1', 'folder.gif');
    define('_MB_WEBLINKS_IMAGE_MODE_2', 'Elige imagen');
    define('_MB_WEBLINKS_MAX_WIDTH', 'Ancho m�ximo de imagen');
    define('_MB_WEBLINKS_WIDTH_DEFAULT', 'Ancho de imagen por defecto');
    define('_MB_WEBLINKS_DISPSUB', 'M�ximo n�mero de subcategor�as');

    // atom feed
    define('_MB_WEBLINKS_NUM_FEED', 'N�mero de semillas');
    define('_MB_WEBLINKS_NUM_TITLE', 'Longitud del t�tulo');
    define('_MB_WEBLINKS_NUM_SUMMARY', 'Longitud del sumario');
    define('_MB_WEBLINKS_NUM_CONTENT', 'N�mero de semillas que pueden mostrar contenido');
    define('_MB_WEBLINKS_LINK_ID', 'ID de Enlace');
    define('_MB_WEBLINKS_NO_LINK_ID', 'Olvidaste introducir el ID del Enlace');
    define('_MB_WEBLINKS_NO_ATOMFEED', 'No hay semilla que corresponda');
    define('_MB_WEBLINKS_MORE', 'M�s detalles');

    // 2006-11-03
    // random block
    define('_MB_WEBLINKS_MAX_DESC', 'M�xima logitud de la descripci�n');
    define('_MB_WEBLINKS_SHOW_DATE', 'Mostrar fecha');
    define('_MB_WEBLINKS_MODE_URL', 'Mostrar estilo de la direcci�n web');
    define('_MB_WEBLINKS_MODE_URL_SINGLE', 'singlelink.php');
    define('_MB_WEBLINKS_MODE_URL_VISIT', 'visit.php');
    define('_MB_WEBLINKS_MODE_URL_DIRECT', 'Mostrar p�gina web directamente');
    define('_MB_WEBLINKS_URL_EMPTY', 'Sin p�gina web');
    define('_MB_WEBLINKS_URL_EMPTY_INCLUDE', 'Incluir sin p�gina web');
    define('_MB_WEBLINKS_URL_EMPTY_EXCLUDE', 'Excluir sin p�gina web');
    define('_MB_WEBLINKS_CATEGORY', 'Categor�a');
    define('_MB_WEBLINKS_WITH_SUBCAT', 'Con subcategor�as');
    define('_MB_WEBLINKS_MODE', 'Modo');
    define('_MB_WEBLINKS_RECOMMEND', 'Enlace recomendado');
    define('_MB_WEBLINKS_MUTUAL', 'Enlace asociado');
    define('_MB_WEBLINKS_RANDOM', 'Selecci�n de Enlace aleatoria');
    define('_MB_WEBLINKS_ORDER', 'Ordenado');
    define('_MB_WEBLINKS_ORDER_DESC', 'V�lido cuando "Selecci�n de Enlace aleatoria" es NO');
    define('_MB_WEBLINKS_TIME_UPDATE', 'Actualizado');
    define('_MB_WEBLINKS_TIME_CREATE', 'Creado');
    define('_MB_WEBLINKS_TITLE', 'T�tulo');
    define('_MB_WEBLINKS_ASC', 'Ascendente');
    define('_MB_WEBLINKS_DESC', 'Descendente');

    // === 2007-03-25 ===
    // google map
    define('_MB_WEBLINKS_GM_MODE', 'Modo del mapa de Google');
    define('_MB_WEBLINKS_GM_MODE_DSC', '0:No mostrado, 1:Por defecto, 2:Siguiente valor');
    define('_MB_WEBLINKS_GM_LATITUDE', 'Latitud');
    define('_MB_WEBLINKS_GM_LONGITUDE', 'Longitud');
    define('_MB_WEBLINKS_GM_ZOOM', 'Zoom');
    define('_MB_WEBLINKS_GM_HEIGHT', 'Altura del tama�o del mapa');
    define('_MB_WEBLINKS_GM_TIMEOUT', 'Tiempo de retraso para obtener imagen');
    define('_MB_WEBLINKS_GM_TIMEOUT_DSC', 'msec  -1:window.onload');

    // 2007-04-08
    define('_MB_WEBLINKS_PHOTOS', 'N�mero de fotos');

    // === 2007-08-01 ===
    define('_MB_WEBLINKS_CAT_TITLE_LENGTH', 'Longitud del t�tulo de categor�a');
    define('_MB_WEBLINKS_GM_DESC_LENGTH', 'Longitud del contenido en marcador de mapa');
    define('_MB_WEBLINKS_GM_WORDWRAP', 'Longitud de wordwrap en marcador de mapa');
}// --- define language end ---
