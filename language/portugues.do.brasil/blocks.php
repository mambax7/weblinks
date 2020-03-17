<?php

// $Id: blocks.php,v 1.1 2011/12/29 14:32:51 ohwada Exp $

// 2008-02-17 K.OHWADA
// _MB_WEBLINKS_GM_CONTROL

// 2007-10-10 K.OHWADA
// _MB_WEBLINKS_GM_MARKER_WIDTH

// 2007-08-01 K.OHWADA
// _MB_WEBLINKS_CAT_TITLE_LENGTH

// 2007-04-08
// _MB_WEBLINKS_PHOTOS

// 2007-03-25 K.OHWADA
// google map

// 2006-11-03 hiro
// random block

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//=========================================================
// WebLinks Module
// language for Blocks
//=========================================================

// --- define language begin ---
if (!defined('WEBLINKS_LANG_BL_LOADED')) {
    define('WEBLINKS_LANG_BL_LOADED', 1);
    // top.html
    define('_MB_WEBLINKS_DISP', 'Mostrar');
    define('_MB_WEBLINKS_LINKS', 'Links');
    define('_MB_WEBLINKS_CHARS', 'Comprimento do t�tulo');
    define('_MB_WEBLINKS_LENGTH', ' Caracteres');
    define('_MB_WEBLINKS_NEWDAYS', 'Dias de um novo link');
    define('_MB_WEBLINKS_DAYS', ' Dias');
    define('_MB_WEBLINKS_POPULAR', 'Acessos para o link ser popular');
    define('_MB_WEBLINKS_HITS', ' Acessos');
    define('_MB_WEBLINKS_PIXEL', ' Pixel');
    define('_MB_WEBLINKS_RATING', 'Avalia��o');
    define('_MB_WEBLINKS_VOTES', 'Votos');
    define('_MB_WEBLINKS_COMMENTS', 'Coment�rios');

    // catlist.html
    define('_MB_WEBLINKS_TOTAL_LINKS', 'Total');
    define('_MB_WEBLINKS_IMAGE_MODE', 'Selecionar a imagem da categoria');
    define('_MB_WEBLINKS_IMAGE_MODE_0', 'NENHUM');
    define('_MB_WEBLINKS_IMAGE_MODE_1', 'folder.gif');
    define('_MB_WEBLINKS_IMAGE_MODE_2', 'Configura��o da imagem');
    define('_MB_WEBLINKS_MAX_WIDTH', 'Largura m�xima da imagem');
    define('_MB_WEBLINKS_WIDTH_DEFAULT', 'Largura padr�o da imagem');
    define('_MB_WEBLINKS_DISPSUB', 'N�mero m�ximo de subcategorias');

    // atom feed
    define('_MB_WEBLINKS_NUM_FEED', 'N�mero de feeds');
    define('_MB_WEBLINKS_NUM_TITLE', 'Comprimento do t�tulo');
    define('_MB_WEBLINKS_NUM_SUMMARY', 'Comprimento do sum�rio');
    define('_MB_WEBLINKS_NUM_CONTENT', 'N�mro de feeds que mostram conte�do');
    define('_MB_WEBLINKS_LINK_ID', 'ID do link');
    define('_MB_WEBLINKS_NO_LINK_ID', 'Voc� esqueceu de informar o ID do link');
    define('_MB_WEBLINKS_NO_ATOMFEED', 'N�o h� feed correspondente');
    define('_MB_WEBLINKS_MORE', 'Mais detalhes');

    // 2006-11-03
    // random block
    define('_MB_WEBLINKS_MAX_DESC', 'Comprimento m�ximo da descri��o');
    define('_MB_WEBLINKS_SHOW_DATE', 'Mostrando a data');
    define('_MB_WEBLINKS_MODE_URL', 'Mostrando o estilo da URL');
    define('_MB_WEBLINKS_MODE_URL_SINGLE', 'singlelink.php');
    define('_MB_WEBLINKS_MODE_URL_VISIT', 'visit.php');
    define('_MB_WEBLINKS_MODE_URL_DIRECT', 'Mostrando a URL diretamente');
    define('_MB_WEBLINKS_URL_EMPTY', 'URL vazia');
    define('_MB_WEBLINKS_URL_EMPTY_INCLUDE', 'Incluir a URL vazia');
    define('_MB_WEBLINKS_URL_EMPTY_EXCLUDE', 'Excluir a URL vazia');
    define('_MB_WEBLINKS_CATEGORY', 'Categoria');
    define('_MB_WEBLINKS_WITH_SUBCAT', 'Com sub categorias');
    define('_MB_WEBLINKS_MODE', 'Modo link');
    define('_MB_WEBLINKS_RECOMMEND', 'Site recomendado');
    define('_MB_WEBLINKS_MUTUAL', 'Site rec�proco');
    define('_MB_WEBLINKS_RANDOM', 'Tipo aleat�rio');
    define('_MB_WEBLINKS_ORDER', 'Ordem');
    define('_MB_WEBLINKS_ORDER_DESC', 'V�lido quando "Tipo aleat�rio" � N�O');
    define('_MB_WEBLINKS_TIME_UPDATE', 'Tempo da atualiza��o');
    define('_MB_WEBLINKS_TIME_CREATE', 'Tempo da cria��o');
    define('_MB_WEBLINKS_TITLE', 'T�tulo');
    define('_MB_WEBLINKS_ASC', 'Ascendente');
    define('_MB_WEBLINKS_DESC', 'Descendente');

    // === 2007-03-25 ===
    // google map
    define('_MB_WEBLINKS_GM_MODE', 'Modo GoogleMap');
    define('_MB_WEBLINKS_GM_MODE_DSC', '0: N�o mostrar, 1: Padr�o, 2: Valor seguinte');
    define('_MB_WEBLINKS_GM_LATITUDE', 'Latitude');
    define('_MB_WEBLINKS_GM_LONGITUDE', 'Longitude');
    define('_MB_WEBLINKS_GM_ZOOM', 'Zoom');
    define('_MB_WEBLINKS_GM_HEIGHT', 'Altura do tamanho do mapa');
    define('_MB_WEBLINKS_GM_TIMEOUT', 'Defasagem de tempo para o desenho');
    define('_MB_WEBLINKS_GM_TIMEOUT_DSC', 'msec  -1:window.onload');

    // 2007-04-08
    define('_MB_WEBLINKS_PHOTOS', 'N�mero de fotos');

    // === 2007-08-01 ===
    define('_MB_WEBLINKS_CAT_TITLE_LENGTH', 'Comprimento do t�tulo da categoria');
    define('_MB_WEBLINKS_GM_DESC_LENGTH', 'Comprimento do conte�do no maker map');
    define('_MB_WEBLINKS_GM_WORDWRAP', 'Comprimento do wordwrap no maker map');

    // === 2007-10-10 ===
    define('_MB_WEBLINKS_GM_MARKER_WIDTH', 'Largura do maker map');

    // === 2008-02-17 ===
    define('_MB_WEBLINKS_GM_CONTROL', 'Controle do Map');
    define('_MB_WEBLINKS_GM_CONTROL_DSC', '0: N�o mostrar, 1: Mostrar');
    define('_MB_WEBLINKS_GM_TYPE_CONTROL', 'Tipo de controle do mapa');
}
// --- define language end ---
