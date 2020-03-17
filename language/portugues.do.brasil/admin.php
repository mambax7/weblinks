<?php

// $Id: admin.php,v 1.1 2011/12/29 14:32:51 ohwada Exp $

// 2008-02-17 K.OHWADA
// htmlout

// 2007-12-09 K.OHWADA
// remove _WEBLINKS_ADMIN_CHECK
// add AM_WEBLINKS_D3FORUM_VIEW

// 2007-11-01 K.OHWADA
// _AM_WEBLINKS_GM_MARKER_WIDTH

// 2007-09-01 K.OHWADA
// nofitication
// change _WEBLINKS_LINK_APPROVED _AM_WEBLINKS_USE_HITS

// 2007-08-01 K.OHWADA
// config 0

// 2007-07-14 K.OHWADA
// highlight

// 2007-06-10 K.OHWADA
// d3forum

// 2007-04-08 K.OHWADA
// _AM_WEBLINKS_CAT_DESC_MODE

// 2007-03-25 K.OHWADA
// _AM_WEBLINKS_UPDATE_CAT_IMAGE_SIZE

// 2007-02-20 K.OHWADA
// performance

// 2006-12-11 K.OHWADA
// _AM_WEBLINKS_TIME_PUBLISH

// 2006-10-05 K.OHWADA
// _AM_WEBLINKS_MODULE_CONFIG_3
// google map

// 2006-05-15 K.OHWADA
// weblinks ver 1.1
// _AM_WEBLINKS_INDEX_DESC, etc

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module duplication

//=========================================================
// WebLinks Module
// language for admin
// 2004-10-20 K.OHWADA
//=========================================================

// --- define language begin ---
if (!defined('WEBLINKS_LANG_AM_LOADED')) {
    define('WEBLINKS_LANG_AM_LOADED', 1);

    define('_WEBLINKS_ADMIN_INDEX', 'Index Administra��o');

    // BUG 2931: unmatch popup menu 'preference' and index menu 'module setting'
    define('_WEBLINKS_ADMIN_MODULE_CONFIG_1', 'Configura��o do m�dulo 1 (Prefer�ncias)');

    define('_WEBLINKS_ADMIN_MODULE_CONFIG_2', 'Configura��o do m�dulo 2');
    //define("_WEBLINKS_ADMIN_ADDMODDEL_CATEGORY","Add, Modify, and Delete Categories");
    define('_WEBLINKS_ADMIN_ADD_LINK', 'Adicionar novo Link');
    define('_WEBLINKS_ADMIN_OTHERFUNC', 'Outras fun��es');
    define('_WEBLINKS_ADMIN_GOTO_ADMIN_INDEX', 'Ir para o Index da Administra��o');

    //======	config.php 	======
    // Access Authority
    define('_WEBLINKS_ADMIN_AUTH', 'Permiss�es');
    define('_WEBLINKS_ADMIN_AUTH_TEXT', 'O administrador tem todas as permiss�es');
    define('_WEBLINKS_AUTH_SUBMIT', 'Pode submeter um novo link');
    define('_WEBLINKS_AUTH_SUBMIT_DSC', 'Especificar o grupo que pode enviar um novo link');
    define('_WEBLINKS_AUTH_SUBMIT_AUTO', 'Pode aprovar automaticamente os mais novos links enviados');
    define('_WEBLINKS_AUTH_SUBMIT_AUTO_DSC', 'Especificar os grupos cujos links enviados s�o automaticamente aprovados');
    define('_WEBLINKS_AUTH_MODIFY', 'Pode modificar');
    define('_WEBLINKS_AUTH_MODIFY_DSC', 'Especificar os grupos que podem enviar pedidos de modifica��o de links');
    define('_WEBLINKS_AUTH_MODIFY_AUTO', 'Pode aprovar modifica��es de link');
    define('_WEBLINKS_AUTH_MODIFY_AUTO_DSC', 'Especificar os grupos com permiss�o para aprovar pedidos de modifica��o de link');
    define('_WEBLINKS_AUTH_RATELINK', 'Pode avaliar um link');
    define('_WEBLINKS_AUTH_RATELINK_DSC', 'Especificar os grupos com permiss�o para avaliar um link.<br>Esta caracter�stica trabalha unicamente quando � permitido aos  usu�rios avaliar links.');
    define('_WEBLINKS_USE_PASSWD', 'Usar senha de autentica��o quando da modifica��o de um link');
    define('_WEBLINKS_USE_PASSWD_DSC', 'Mostrar um campo de senha de autentica��o quando for selecionado SIM, <br>para grupos que n�o � permitido enviar ou aprovar pedidos de modifica��o. ');
    define('_WEBLINKS_USE_RATELINK', 'Permitir avalia��es');
    define('_WEBLINKS_USE_RATELINK_DSC', 'SIM permite os usu�rios avaliar links.');
    define('_WEBLINKS_AUTH_UPDATED', 'Permiss�es atualizadas');

    // RSS/ATOM
    define('_WEBLINKS_ADMIN_RSS', 'Configura��es dos Feeds RSS/ATOM');
    define('_WEBLINKS_RSS_MODE_AUTO', 'Auto atualiza��o dos feeds RSS/ATOM');
    define('_WEBLINKS_RSS_MODE_AUTO_DSC', "YES executa 'Auto descoberta da url do RSS/ATOM' e 'auto atualiza��o' se os links RSS/ATOM est�o inclu�dos no link submetido. ");
    define('_WEBLINKS_RSS_MODE_DATA', 'Dados do RSS/ATOM para mostrar');
    define('_WEBLINKS_RSS_MODE_DATA_DSC', 'ATOM FEED, usa osw dados na tabela Atom feed  ap�s da an�lise. <br>XML usa os dados da tabela de links antes da an�lise. <br>Alguns dados possivelmente n�o ser�o salvos na tabela atom feed depois da filtragem. ');
    define('_WEBLINKS_RSS_CACHE', 'Tempo em cache dos feeds RSS/ATOM');
    define('_WEBLINKS_RSS_CACHE_DSC', 'Medido em horas.');
    define('_WEBLINKS_RSS_LIMIT', 'N�mero m�ximo de feeds RSS/ATOM');
    define('_WEBLINKS_RSS_LIMIT_DSC', 'Informe o n�mero m�ximo de feeds RSS/ATOM salvos na tabela atom feed<br>Os dados antigos ser�o varridos se este valor for excedido. <br>0 � sem limite. ');
    define('_WEBLINKS_RSS_SITE', 'Buscar site RSS');
    define('_WEBLINKS_RSS_SITE_DSC', 'Informe a lista de url RSS buscadas no site. <br>Separe cada entrada com uma nova linha, quando especificar mais de uma. <br>N�o informe a url ATOM. ');
    define('_WEBLINKS_RSS_BLACK', 'Lista negra de url RSS/ATOM');
    define('_WEBLINKS_RSS_BLACK_DSC', 'Informe a lista de urls recusadas quando da coleta de feeds RSS/ATOM. <br>Separe cada entrada com uma nova linha, quando especificar mais de uma. <br>Voc� pode usar express�es regulares PERL. ');
    define('_WEBLINKS_RSS_WHITE', 'Lista branca de url RSS/ATOM');
    define('_WEBLINKS_RSS_WHITE_DSC', 'Informe a lista de uls para coletar, quando combinadas com uma lista negra. <br>Separe cada entrada com uma nova linha, quando especificar mais de uma. <br>Voc� pode usar express�es regulares PERL. ');
    define('_WEBLINKS_RSS_URL_CHECK', 'Existem alguma urls de links combinadas na lista negra. ');
    define('_WEBLINKS_RSS_URL_CHECK_DSC', 'Por favor, copie e cole no formul�rio de registro a partir da mais baixa lista branca, se necess�rio. ');
    define('_WEBLINKS_RSS_UPDATED', 'Configura��es do RSS/ATOM atualizadas');

    // RSS/ATOM
    define('_WEBLINKS_ADMIN_RSS_VIEW', 'Vizualizar configura��es dos Feeds RSS/ATOM');
    define('_WEBLINKS_RSS_MODE_TITLE', 'Usar tags HTML no t�tulo');
    define('_WEBLINKS_RSS_MODE_TITLE_DSC', 'YES mostra tags HTML no titulo do link, se o t�tulo tiver tags HTML. <br>N�O tira tags HTML do t�tulo. ');
    define('_WEBLINKS_RSS_MODE_CONTENT', 'Usar tags HTML no conte�do');
    define('_WEBLINKS_RSS_MODE_CONTENT_DSC', 'YES mostra o link do conte�do com tag HTML, se o conte�do tiver tag HTML. <br>N�O tira todas as tags HTML do conte�do mostrado. ');
    define('_WEBLINKS_RSS_NEW', 'Selecione o n�mero m�ximo de "novos feeds RSS/ATOM" mostrados na p�gina top');
    define('_WEBLINKS_RSS_NEW_DSC', 'Informar o n�mero m�ximo de novos feeds RSS/ATOM a serem mostrados n� pagina principal.');
    define('_WEBLINKS_RSS_PERPAGE', 'Selecione o n�mero m�ximo de feeds RSS/ATOM a serem mostrados na p�gina de detalhe do link e p�gina do RSS/ATOM');
    define('_WEBLINKS_RSS_PERPAGE_DSC', 'Informe o n�mero m�ximo de feeds RSS/ATOM a serem mostrados na p�gina de RSS/ATOM. ');
    define('_WEBLINKS_RSS_NUM_CONTENT', 'N�mero de feeds mostrando conte�do');
    define('_WEBLINKS_RSS_NUM_CONTENT_DSC', 'Informe o n�mero de feeds mostrando o conte�do de feeds RSS/ATOM na p�gina de detalhes do link. <br>Um sum�rio � mostrado nos feeds remanescentes. ');
    define('_WEBLINKS_RSS_MAX_CONTENT', 'N�mero m�ximo de caracteres usados para o conte�do feed RSS/ATOM');
    define('_WEBLINKS_RSS_MAX_CONTENT_DSC', 'Informe o n�mero m�ximo de caracteres a serem usados para o conte�do feed RSS/ATOM na p�gina RSS/ATOM.  <br>� usado quando "Usar tags HTML nos conte�dos" � "sim." ');
    define('_WEBLINKS_RSS_MAX_SUMMARY', 'N�mero m�ximo de caracteres usados para o sum�rio do feed RSS/ATOM');
    define('_WEBLINKS_RSS_MAX_SUMMARY_DSC', 'Informe o n�mero m�ximo de caracteres a serem usados para o sumario do feed RSS/ATOM na p�gina principal. ');

    // use link field
    define('_WEBLINKS_ADMIN_POST', 'Configura��o dos campos do Link');
    define('_WEBLINKS_ADMIN_POST_TEXT_1', 'N�o usando significa que o campo n�o ser� mostrado no formul�rio de registro. ');
    define('_WEBLINKS_ADMIN_POST_TEXT_2', 'O uso significa que o campo ser� mostrado no formul�rio de registro permitindo ao usu�rio informar ou n�o dados no campo ');
    define('_WEBLINKS_ADMIN_POST_TEXT_3', 'Indispens�vel significa que o campo DEVE ser preenchido. ');
    define('_WEBLINKS_NO_USE', 'N�o usar');
    define('_WEBLINKS_USE', 'Usar');
    define('_WEBLINKS_INDISPENSABLE', 'Indispens�vel');
    define('_WEBLINKS_TYPE_DESC', 'Usar a caixa de texto XOOPS DHTML para as submiss�es');
    define('_WEBLINKS_TYPE_DESC_DSC', 'N�O usa uma caixa de texto normal.<br>SIM usa caixa de texto tipo XOOPS DHTML no formul�rio de registro. ');
    define('_WEBLINKS_CHECK_DOUBLE', 'Aceitar o envio de links existentes');
    define('_WEBLINKS_CHECK_DOUBLE_DSC', 'N�O permite o registro de links existentes. <br> SIM verifica se o mesmo link j� existe no banco de dados. ');
    define('_WEBLINKS_POST_UPDATED', 'Configura���es dos campos do Link atualizado');

    // cateogry
    define('_WEBLINKS_ADMIN_CAT_SET', 'Configura��es das Categorias');
    define('_WEBLINKS_CAT_SEL', 'N�mero m�ximo de categorias que um usu�rio pode selecionar para enviar links');
    define('_WEBLINKS_CAT_SEL_DSC', 'Informe o n�mero de categorias que um usu�rio pode selecionar para classificar os links enviados');
    define('_WEBLINKS_CAT_SUB', 'N�mero de subcategorias para mostradar');
    define('_WEBLINKS_CAT_SUB_DSC', 'Configurar o n�mero de subcategorias mostradas na lista de categorias mostradas na p�gina top');
    define('_WEBLINKS_CAT_IMG_MODE', 'Selecionar a imagem da categoria');
    define('_WEBLINKS_CAT_IMG_MODE_DSC', 'NENHUMA sem imagem. <br>Folder.gif mostra folder.gif. <br>Configure a imagem mostrada configurando a imagem de cada categoria. ');
    //define("_WEBLINKS_CAT_IMG_MODE_0","NONE");
    define('_WEBLINKS_CAT_IMG_MODE_1', 'folder.gif');
    define('_WEBLINKS_CAT_IMG_MODE_2', 'Configura��o da Imagem');
    define('_WEBLINKS_CAT_IMG_WIDTH', 'Largura m�xima da imagem da categoria');
    define('_WEBLINKS_CAT_IMG_HEIGHT', 'Altura m�xima da imagem da categoria');
    define('_WEBLINKS_CAT_IMG_SIZE_DSC', 'Usar quando selecionado "Configura��o da Imagem". ');
    define('_WEBLINKS_CAT_UPDATED', 'Configura��o das Categorias atualizada');

    //======	cateogry_list.php 	======
    define('_WEBLINKS_ADMIN_CATEGORY_MANAGE', 'Administra��o das Categorias');
    define('_WEBLINKS_ADMIN_CATEGORY_LIST', 'Lista das Categorias');
    //define("_WEBLINKS_ORDER_ID"," Listed by ID");
    define('_WEBLINKS_ORDER_TREE', ' Listados por �rvore');
    define('_WEBLINKS_CAT_ORDER', 'Ordem da Categoria');
    define('_WEBLINKS_THERE_ARE_CATEGORY', 'Existem <b>%s</b> categorias no banco de dados');
    define('_WEBLINKS_ADMIN_CATEGORY_NOTICE_1', 'Clique <b>ID da categoria</b> para editar uma categoria espec�fica. ');
    define('_WEBLINKS_ADMIN_CATEGORY_NOTICE_2', 'Clique <b>Categoria pai</b> ou <b>T�tulo</b>, para mostrar a ordena��o da lista de categorias. ');
    define('_WEBLINKS_NO_CATEGORY', 'N�o h� categoria corresponente. ');
    define('_WEBLINKS_NUM_SUBCAT', 'N�mero da subcategoria');
    define('_WEBLINKS_ORDERS_UPDATED', 'Ordena��o da catagoria atualizada');

    //======	cateogry_manage.php 	======
    define('_WEBLINKS_IMGURL_MAIN', 'URL da imagem da categoria');
    define('_WEBLINKS_IMGURL_MAIN_DSC1', 'Opcional. <br>O tamanho das imagens s�o ajustadas automaticamente');
    //define("_WEBLINKS_IMGURL_MAIN_DSC2","Images are for the main category only. ");

    //======	link_list.php 	======
    define('_WEBLINKS_ADMIN_LINK_MANAGE', 'Aministra��o dos Link');
    define('_WEBLINKS_ADMIN_LINK_LIST', 'Lista do Link');
    define('_WEBLINKS_ADMIN_LINK_BROKEN', 'Lista de link Quebrado');
    define('_WEBLINKS_ADMIN_LINK_ALL_ASC', 'Lista de todos os links (Listados pelo antigo ID) ');
    define('_WEBLINKS_ADMIN_LINK_ALL_DESC', 'Lista de todos os links (Listados pelo novo ID) ');
    define('_WEBLINKS_ADMIN_LINK_NOURL', 'Lista dos link que a URL n�o esta configurada');
    define('_WEBLINKS_COUNT_BROKEN', 'Contar links quebrados');
    define('_WEBLINKS_NO_LINK', 'N�o h� link correspondente. ');
    define('_WEBLINKS_ADMIN_PRESENT_SAVE', 'dado salvo no banco de dados mostrado aqui. ');

    //======	link_manage.php 	======
    //define("_WEBLINKS_USERID","User ID");
    //define("_WEBLINKS_CREATE","Created");

    //======	link_broken_check.php 	======
    define('_WEBLINKS_ADMIN_LINK_CHECK_UPDATE', 'Checagem e atualiza��o de link');
    define('_WEBLINKS_ADMIN_LINK_BROKEN_CHECK', 'Checar link quebrado');
    define('_WEBLINKS_ADMIN_BROKEN_CHECK', 'Checar');
    define('_WEBLINKS_ADMIN_BROKEN_RESULT', 'Checar Resultados');
    define('_WEBLINKS_ADMIN_LINK_BROKEN_CHECK_CAUTION', 'Um esgotamento do tempo possivelmente ocorra, se existirem muitos links quebrados. <br>Se isso ocorrer, por favor mude o valor num�rico do limite e saia da configura��o. <br>limite= 0, ou Sem restri��es.');
    define('_WEBLINKS_ADMIN_LINK_BROKEN_CHECK_NOTICE', 'Clicando o <b>ID do link</b> abre uma p�gina de modifica��o do link. <br><b>URL do Website</b> conduzir� voc� a um link de um website, quando clicado. <br>');
    define('_WEBLINKS_ADMIN_LINK_BROKEN_CHECK_GOOGLE', 'A busca Google abrir� quando clicado <b>t�tulo website</b>. <br>');
    define('_WEBLINKS_ADMIN_LIMIT', 'M�ximo de links para checar (limite)');
    define('_WEBLINKS_ADMIN_OFFSET', 'Offset (offset)');
    //define("_WEBLINKS_ADMIN_CHECK","CHECK");
    define('_WEBLINKS_ADMIN_TIME_START', 'Tempo incial');
    define('_WEBLINKS_ADMIN_TIME_END', 'Tempo final');
    define('_WEBLINKS_ADMIN_TIME_ELAPSE', 'Tempo decorrido');
    define('_WEBLINKS_ADMIN_LINK_NUM_ALL', 'Todos os links');
    define('_WEBLINKS_ADMIN_LINK_NUM_CHECK', 'Links checados');
    define('_WEBLINKS_ADMIN_LINK_NUM_BROKEN', 'Links verificados');
    define('_WEBLINKS_ADMIN_NUM', 'links');
    define('_WEBLINKS_ADMIN_MIN_SEC', '%s min %s seg');
    define('_WEBLINKS_ADMIN_CHECK_NEXT', 'Checar pr�ximos %s links');
    //define("_WEBLINKS_ADMIN_RSS_REFRESH_NOTE","Simultaneously execute an Auto Discovery of RSS/ATOM urls ");

    //======	rss_manage.php 	======
    define('_WEBLINKS_ADMIN_RSS_MANAGE', 'Administra��o feed RSS/ATOM');
    define('_WEBLINKS_ADMIN_RSS_REFRESH', 'Atualizar RSS/ATOM');
    define('_WEBLINKS_ADMIN_RSS_REFRESH_LINK', 'Atualizar cache dos dados do link');
    define('_WEBLINKS_ADMIN_RSS_REFRESH_SITE', 'Atualizar cache da busca do site RSS');
    define('_WEBLINKS_ADMIN_NUM_REFRESH_RSS_URL', 'N�mero de urls RSS/ATOM atualizadas');
    define('_WEBLINKS_ADMIN_NUM_REFRESH_RSS_SITE', 'N�mero de sites RSS/ATOM atualizados url');
    define('_WEBLINKS_ADMIN_NUM_REFRESH_ATOM_SITE', 'N�mero de sites RSS/ATOM atualizados');
    define('_WEBLINKS_ADMIN_NUM_REFRESH_ATOMFEED', 'N�mero de feeds RSS/ATOM atualizados');
    define('_WEBLINKS_ADMIN_RSS_CACHE_CLEAR', 'Limpar cache dos feed RSS/ATOM');
    define('_WEBLINKS_RSS_CLEAR_NUM', 'Limpar cache do feed RSS/ATOM por ordem de data, se maior que o n�mero de feeds especificado na Configura��o do M�dulo 1.');
    define('_WEBLINKS_RSS_NUMBER', 'N�mero de feeds');
    define('_WEBLINKS_RSS_CLEAR_LID', 'Limpar cache dos IDS dos links especificados');
    define('_WEBLINKS_RSS_CLEAR_ALL', 'Limpar todo o cache');
    define('_WEBLINKS_NUM_RSS_CLEAR_LINK', 'N�mero de cache RSS/ATOM apagados');
    define('_WEBLINKS_NUM_RSS_CLEAR_ATOMFEED', 'N�mero de feed ATOM/RSS feed apagados');

    //======	user_list.php 	======
    define('_WEBLINKS_ADMIN_USER_MANAGE', 'Administra��o do Usu�rio');
    define('_WEBLINKS_ADMIN_USER_EMAIL', 'Lista de usu�rios com endere�o de e-mail');
    define('_WEBLINKS_ADMIN_USER_LINK', 'Lista de usu�rios registrados com informa��o de link');
    define('_WEBLINKS_ADMIN_USER_NOLINK', 'Lista de usu�rios registrados sem informa��o de link');
    define('_WEBLINKS_ADMIN_USER_EMAIL_DSC', 'Mostrar apenas um endere�o de e-mail, se duplicado');
    //define("_WEBLINKS_ADMIN_USER_LINK_DSC", 'Use "Send Message to Users" of XOOPS core');
    //define("_WEBLINKS_USER_ALL", " (all) ");
    //define("_WEBLINKS_USER_MAX", " (each %s persons) ");
    define('_WEBLINKS_THERE_ARE_USER', '<b>%s</b> usu�rios encontrados');
    define('_WEBLINKS_USER_NUM', 'Mostrar de %s th pessoas para %s th pessoa.');
    define('_WEBLINKS_USER_NOFOUND', 'N�o foram encontrados usu�rios');
    define('_WEBLINKS_UID_EMAIL', 'Endere�o de e-mail de quem enviou');

    //======	mail_users.php 	======
    define('_WEBLINKS_ADMIN_SENDMAIL', 'Enviar e-mail');
    define('_WEBLINKS_THERE_ARE_EMAIL', 'Existem <b>%s</b> e-mails');
    define('_WEBLINKS_SEND_NUM', 'Enviado e-mail de %s th pessoa para %s th pessoa');
    //define("_WEBLINKS_SEND_NEXT","Send next %s emails");
    //define("_WEBLINKS_SUBJECT_FROM", "Information from %s");
    //define("_WEBLINKS_HELLO", "Hello %s");
    define('_WEBLINKS_MAIL_TAGS1', '{W_NAME} imprimir� o nome do usu�rio');
    define('_WEBLINKS_MAIL_TAGS2', '{W_EMAIL} imprimir� o e-mail do usu�rio');
    define('_WEBLINKS_MAIL_TAGS3', '{W_LID} imprimir� o id do link do usu�rio');

    // general
    //define('_WEBLINKS_WEBMASTER', 'Webmaster');
    define('_WEBLINKS_SUBMITTER', 'Quem envia');
    //define("_WEBLINKS_MID","Modify ID");
    define('_WEBLINKS_UPDATE', 'ATUALIZA��O');
    define('_WEBLINKS_SET_DEFAULT', 'Configura��o padr�o');
    define('_WEBLINKS_CLEAR', 'APAGAR');
    define('_WEBLINKS_CHECK', 'CHECAR');
    define('_WEBLINKS_NON', 'Nada a fazer');
    //define("_WEBLINKS_SENDMAIL", "SEND Email");

    // 2005-08-09
    // BUG 2827: RSS refresh: Invalid argument supplied for foreach()
    define('_WEBLINKS_ADMIN_NO_LINK_BROKEN_CHECK', 'N�o h� link para checar');
    define('_WEBLINKS_ADMIN_NO_RSS_REFRESH', 'N�o h� link para atualizar RSS');

    // 2005-10-20
    define('_WEBLINKS_LINK_APPROVED', '[{X_SITENAME}] {X_MODULE}: O link enviado foi aprovado');
    define('_WEBLINKS_LINK_REFUSED', '[{X_SITENAME}] {X_MODULE}: O link enviado foi reprovado');

    // 2006-05-15
    define('_AM_WEBLINKS_INDEX_DESC', 'Texto introdut�rio da P�gina Principal');
    define('_AM_WEBLINKS_INDEX_DESC_DSC', 'Voc� pode usar esta se��o para mostrar algum texto descritivo ou introdut�rio. HTML e permitido.');

    define('_AM_WEBLINKS_INDEX_DESC_DEFAULT', '<div align="center" style="color: #0000ff">Aqui � onde sua p�gina introdut�ria vai.<br>Voc� pode edit�-la em "Configura��o do M�dulo 2".<br></div>');

    define('_AM_WEBLINKS_ADD_CATEGORY', 'Adicionar nova categoria');
    define('_AM_WEBLINKS_ERROR_SOME', 'Existem algumas mensagens de erro');
    define('_AM_WEBLINKS_LIST_ID_ASC', 'Listado pelo ID antigo');
    define('_AM_WEBLINKS_LIST_ID_DESC', 'Listado pelo ID novo');

    // config
    //define('_AM_WEBLINKS_WARNING_NOT_WRITABLE','The directory is not writeable');

    define('_AM_WEBLINKS_CONF_LINK', 'Configura��o do link');
    define('_AM_WEBLINKS_CONF_LINK_IMAGE', 'Configura��o da imagem do link');
    define('_AM_WEBLINKS_CONF_VIEW', 'Vizualizar configura��o');
    define('_AM_WEBLINKS_CONF_TOPTEN', 'Configura��o Top 10');
    define('_AM_WEBLINKS_CONF_SEARCH', 'Configura��o da Busca');

    define('_AM_WEBLINKS_USE_BROKENLINK', 'Relat�rios dos Links Quebrados');
    define('_AM_WEBLINKS_USE_BROKENLINK_DSC', 'SIM permite os usu�rios comunicarem link quebrado');
    define('_AM_WEBLINKS_USE_HITS', 'Contar acessos quando pular para o site');
    define('_AM_WEBLINKS_USE_HITS_DSC', 'SIM habilita o contador de acesso do link quando pular para o site');
    define('_AM_WEBLINKS_USE_PASSWD', 'Autentica��o da senha');
    define('_AM_WEBLINKS_USE_PASSWD_DSC', 'SIM, <b>usu�rio an�nimo</b> pode modificar um link com autentica��o de senha.<br>NO, <br>campo da senha n�o � mostrado.');
    define('_AM_WEBLINKS_PASSWD_MIN', 'Comprimento m�nimo requerido para a senha');
    define('_AM_WEBLINKS_POST_TEXT', 'O administrador tem toda a autoridade para administrar');
    define('_AM_WEBLINKS_AUTH_DOHTML', 'Permiss�o para usar tags HTML');
    define('_AM_WEBLINKS_AUTH_DOHTML_DSC', 'Especificar os grupos com permiss�o de uso de tags HTML');
    define('_AM_WEBLINKS_AUTH_DOSMILEY', 'Permiss�o para usar �cones smiley');
    define('_AM_WEBLINKS_AUTH_DOSMILEY_DSC', 'Especificar os grupos com permiss�o de uso de �cones smiley');
    define('_AM_WEBLINKS_AUTH_DOXCODE', 'Permiss�o para usar c�digos XOOPS');
    define('_AM_WEBLINKS_AUTH_DOXCODE_DSC', 'Especificar os grupos com permiss�o de uso de c�digos XOOPS');
    define('_AM_WEBLINKS_AUTH_DOIMAGE', 'Permiss�es para uso de imagens');
    define('_AM_WEBLINKS_AUTH_DOIMAGE_DSC', 'Especificar os grupos com permiss�o de uso de imagens');
    define('_AM_WEBLINKS_AUTH_DOBR', 'Permiss�o de uso de quebras de linhas');
    define('_AM_WEBLINKS_AUTH_DOBR_DSC', 'Especificar os grupos com permiss�o de uso de quebras de linhas');
    define('_AM_WEBLINKS_SHOW_CATLIST', 'Mostrar a lista de categorias no submenu');
    define('_AM_WEBLINKS_SHOW_CATLIST_DSC', 'SIM mostra a lista da categoria tops no submenu');
    define('_AM_WEBLINKS_VIEW_URL', 'Ver estilo da URL');
    define('_AM_WEBLINKS_VIEW_URL_DSC', 'NENHUM <br>sem url ou &lt;a&gt; tag � mostrada.<br>Indireto<br> mostra visit.php em href campo ao inv�s da URL. <br>Direto <br>Mostra url em href campo, JavaScript no campo onmousedown e os acessos s�o contados atrav�s do JavaScript.');
    define('_AM_WEBLINKS_VIEW_URL_0', 'NENHUM');
    define('_AM_WEBLINKS_VIEW_URL_1', 'URL indireta');
    define('_AM_WEBLINKS_VIEW_URL_2', 'URL direta');
    define('_AM_WEBLINKS_RECOMMEND_PRI', 'Prioridade de recomenda��o de sites');
    define('_AM_WEBLINKS_RECOMMEND_PRI_DSC', 'NENHUM <br>N�o mostra.<br>Normal <br>Sites recomendados s�o mostrados no cabe�alho.<br>Mais alto <br>Mostra os sites recomendados no topo da respectiva categoria.');
    define('_AM_WEBLINKS_MUTUAL_PRI', 'Prioridade de Reciprocidade de Sites');
    define('_AM_WEBLINKS_MUTUAL_PRI_DSC', 'NENHUM <br>N�o mostra.<br>Normal <br>Sites rec�procos s�o mostrados no cabe�alho.<br>Mais alto <br>Mostra os sites rec�procos no topo da respectiva categoria');
    define('_AM_WEBLINKS_PRI_0', 'NENHUM');
    define('_AM_WEBLINKS_PRI_1', 'Normal');
    define('_AM_WEBLINKS_PRI_2', 'Mais alto');
    define('_AM_WEBLINKS_LINK_IMAGE_AUTO', 'Auto atualiza��o do tamanho da imagem do banner');
    define('_AM_WEBLINKS_LINK_IMAGE_AUTO_DSC', 'SIM <br>atualiza otamanho da imagem do banner automaticamente.');
    define('_AM_WEBLINKS_RSS_USE', 'Usar feed RSS');
    define('_AM_WEBLINKS_RSS_USE_DSC', 'SIM <br>Obter e mostrar feed RSS/ATOM.');

    // bulk import
    define('_AM_WEBLINKS_BULK_IMPORT', 'Volume importado');
    define('_AM_WEBLINKS_BULK_IMPORT_FILE', 'Volume importado por arquivo');
    define('_AM_WEBLINKS_BULK_CAT', 'Volume importado de categorias');
    define('_AM_WEBLINKS_BULK_CAT_DSC1', 'Descreve as categorias');
    define('_AM_WEBLINKS_BULK_CAT_DSC2', 'Usar seta a esquerda dos par�nteses (>) no come�o da categoria para definir a categoria como uma subcategoria.');
    define('_AM_WEBLINKS_BULK_LINK', 'Volume importado de links');
    define('_AM_WEBLINKS_BULK_LINK_DSC1', 'Informe a categoria na primeira linha.');
    define('_AM_WEBLINKS_BULK_LINK_DSC2', 'Descreve o t�tulo do link, URL, e explana��o dividada por uma v�rgula(,) na segunda linha.');
    define('_AM_WEBLINKS_BULK_LINK_DSC3', 'Usar tra�os para separar a barra horizontal de links(---) .');
    define('_AM_WEBLINKS_BULK_ERROR_LAYER', 'Especificar duas ou mais camadas sob a estrutura da �rvore da categoria. Isto precisa esclarecimento G.S.');
    define('_AM_WEBLINKS_BULK_ERROR_CID', 'ID da categoria errada');
    define('_AM_WEBLINKS_BULK_ERROR_PID', 'ID da categoria m�e errada');
    define('_AM_WEBLINKS_BULK_ERROR_FINISH', 'Um erro interrompeu a opera��o');

    // command
    //define('_AM_WEBLINKS_CREATE_CONFIG', 'Create Config File');
    //define('_AM_WEBLINKS_TEST_EXEC', 'Test execute for %s');

    // === 2006-10-05 ===
    // menu
    define('_AM_WEBLINKS_MODULE_CONFIG_3', 'Configura��o do M�dulo 3');
    define('_AM_WEBLINKS_MODULE_CONFIG_4', 'Configura��o do M�dulo 4');
    define('_AM_WEBLINKS_VOTE_LIST', 'Lista de vota��o');
    define('_AM_WEBLINKS_CATLINK_LIST', 'Categorizar a lista de Link');
    //define('_AM_WEBLINKS_COMMAND_MANAGE', 'Command Management');
    define('_AM_WEBLINKS_TABLE_MANAGE', 'Administra��o da tabela do Banco de dados');
    define('_AM_WEBLINKS_IMPORT_MANAGE', 'Administrar Importa��o');
    define('_AM_WEBLINKS_EXPORT_MANAGE', 'Administrar Exporta��o');

    // config
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_2', 'Auth, Cat, etc');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_3', 'Link');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_4', 'RSS, F�rum, Mapa');
    define('_AM_WEBLINKS_LINK_REGISTER', 'Configura��es do Link: Descri��o');

    // bin configuration
    //define('_AM_WEBLINKS_FORM_BIN', 'Command Config');
    //define('_AM_WEBLINKS_FORM_BIN_DESC', 'It is used on bin command');
    //define('_AM_WEBLINKS_CONF_BIN_PASS','Password');
    //define('_AM_WEBLINKS_CONF_BIN_PASS_DESC','');
    //define('_AM_WEBLINKS_CONF_BIN_SEND','Send Mail');
    //define('_AM_WEBLINKS_CONF_BIN_SEND_DESC','');
    //define('_AM_WEBLINKS_CONF_BIN_MAILTO','Email to send');
    //define('_AM_WEBLINKS_CONF_BIN_MAILTO_DESC','');

    // rssc
    //define('_AM_WEBLINKS_RSS_DIRNAME','RSSC Module Dirname');
    //define('_AM_WEBLINKS_RSS_DIRNAME_DESC','');

    // link manage
    define('_AM_WEBLINKS_DEL_LINK', 'Deletar link');
    define('_AM_WEBLINKS_ADD_RSSC', 'Adicionar link no m�dulo RSSC');
    define('_AM_WEBLINKS_MOD_RSSC', 'Modificar link no m�dulo RSSC');
    define('_AM_WEBLINKS_REFRESH_RSSC', 'Atualizar o link no m�dulo RSSC');
    define('_AM_WEBLINKS_APPROVE', 'Approvar novo Link');
    define('_AM_WEBLINKS_APPROVE_MOD', 'Aprovar solicita��o de modifica��o de Link');
    define('_AM_WEBLINKS_RSSC_LID_SAVED', 'Salva lid rssc');
    define('_AM_WEBLINKS_GOTO_LINK_LIST', 'IR PARA lista de link');
    define('_AM_WEBLINKS_GOTO_LINK_EDIT', 'IR PARA editar link');
    define('_AM_WEBLINKS_ADD_BANNER', 'Adicionar tamanho da imagem do banner');
    define('_AM_WEBLINKS_MOD_BANNER', 'Modificar tamanho da imagem do banner');

    // vote list
    define('_AM_WEBLINKS_VOTE_USER', 'Votos de usu�rios registrados');
    define('_AM_WEBLINKS_VOTE_ANON', 'Votos de usu�rios an�nimos');

    // locate
    define('_AM_WEBLINKS_CONF_LOCATE', 'Configura��o do local');
    define('_AM_WEBLINKS_CONF_COUNTRY_CODE', 'C�digo do pa�s');
    define('_AM_WEBLINKS_CONF_COUNTRY_CODE_DESC', 'Informe o c�digo ccTLDs <br/> <a href="http://www.iana.org/cctld/cctld-whois.htm" target="_blank">IANA: Country-Code Top-Level Domains</a>');
    define('_AM_WEBLINKS_CONF_RENEW_COUNTRY_CODE_DESC', 'Atualizar os �tens relacionados ao c�digo do pa�s. <br/> O �tem com o <span style="color:#0000ff;">#</span> mark');
    define('_AM_WEBLINKS_RENEW', 'Renovar');

    // map
    define('_AM_WEBLINKS_CONF_MAP', 'Configura��o do Mapa do Site');
    define('_AM_WEBLINKS_CONF_MAP_USE', 'Usar Mapa do Site');
    define('_AM_WEBLINKS_CONF_MAP_TEMPLATE', 'Modelo do Mapa do Site');
    define('_AM_WEBLINKS_CONF_MAP_TEMPLATE_DESC', 'Informar o nome do modelo de arquivo do diret�rio template/map/ ');

    // google map: hacked by wye <http://never-ever.info/>
    define('_AM_WEBLINKS_CONF_GOOGLE_MAP', 'Configura��o do Google Maps');
    define('_AM_WEBLINKS_CONF_GM_USE', 'Usar Google Maps');
    define('_AM_WEBLINKS_CONF_GM_APIKEY', 'Chave API do Google Maps');
    define('_AM_WEBLINKS_CONF_GM_APIKEY_DESC', 'Obter a chave API em <br/> <a href="http://www.google.com/apis/maps/signup.html" target="_blank">http://www.google.com/apis/maps/signup.html</a> <br/> Quando voc� usar o GoogleMaps.');
    define('_AM_WEBLINKS_CONF_GM_SERVER', 'Nome do Servidor');
    define('_AM_WEBLINKS_CONF_GM_LANG', 'C�digo da Linguagem');
    define('_AM_WEBLINKS_CONF_GM_LOCATION', 'Local padr�o');
    define('_AM_WEBLINKS_CONF_GM_LATITUDE', 'Latitude padr�o');
    define('_AM_WEBLINKS_CONF_GM_LONGITUDE', 'Longitude padr�o');
    define('_AM_WEBLINKS_CONF_GM_ZOOM', 'N�vel de zoom padr�o');

    // google search
    define('_AM_WEBLINKS_CONF_GOOGLE_SEARCH', 'Confirma��o Busca Google');
    define('_AM_WEBLINKS_CONF_GOOGLE_SERVER', 'Nome do Servidor');
    define('_AM_WEBLINKS_CONF_GOOGLE_LANG', 'C�digo da Linguagem');

    // template
    //define('_AM_WEBLINKS_CONF_TEMPLATE','Clear cache of Templates');
    define('_AM_WEBLINKS_CONF_TEMPLATE_DESC', 'DEVE executar, quando da modifica��o dos arquivos de modelo nos diret�rios template/parts/ template/xml/ e template/map/ ');

    // === 2006-12-11 ===
    // link item
    //define('_AM_WEBLINKS_TIME_PUBLISH','Set the publication time');
    //define('_AM_WEBLINKS_TIME_PUBLISH_DESC','If you do not check it, published time will become undated');
    //define('_AM_WEBLINKS_TIME_EXPIRE','Set expiration time');
    //define('_AM_WEBLINKS_TIME_EXPIRE_DESC','If you do not check it, expired setting will become undated');
    define('_AM_WEBLINKS_LINK_TIME_PUBLISH_BEFORE', 'Listar link antes do tempo da publica��o');
    define('_AM_WEBLINKS_LINK_TIME_EXPIRE_AFTER', 'Listar link depois do tempo de vencimento da publica��o');

    define('_AM_WEBLINKS_SERVER_ENV', 'Ambiente do servidor ');
    define('_AM_WEBLINKS_DEBUG_CONF', 'Vari�veis depuradas');
    define('_AM_WEBLINKS_ALL_GREEN', 'Tudo Verde');

    // === 2007-02-20 ===
    // performance
    define('_AM_WEBLINKS_UPDATE_CAT_PATH', 'Atualizar percurso da �rvore da categoria');
    define('_AM_WEBLINKS_UPDATE_CAT_COUNT', 'Atualizar contagem da categoria do link');
    define('_AM_WEBLINKS_CAT_COUNT_UPDATED', 'percurso da �rvore da categoria atualizada');

    // config
    define('_AM_WEBLINKS_SYSTEM_POST_LINK', 'Postar contagem quando enviar link');
    define('_AM_WEBLINKS_SYSTEM_POST_LINK_DSC', 'SIM conta o post do usu�rio XOOPS quando ele enviar um novo link. ');
    define('_AM_WEBLINKS_SYSTEM_POST_RATE', 'Postar contagem quando avaliar link');
    define('_AM_WEBLINKS_SYSTEM_POST_RATE_DSC', 'SIM conta o post do usu�rio XOOPS quando ele avaliar o link. ');

    define('_AM_WEBLINKS_VIEW_STYLE_CAT', 'Vizualizar o estilo de cada categoria');
    define('_AM_WEBLINKS_VIEW_STYLE_MARK', 'Ver o estilo no Site Recomendado');
    define('_AM_WEBLINKS_VIEW_STYLE_MARK_DSC', 'Isso aplica em Site Recomendado, Site Rec�proco e Site RSS/ATOM');
    define('_AM_WEBLINKS_VIEW_STYLE_0', 'Sum�rio');
    define('_AM_WEBLINKS_VIEW_STYLE_1', 'Todos os detalhes');

    define('_AM_WEBLINKS_CONF_PERFORMANCE', 'Melhoria da performance');
    define('_AM_WEBLINKS_CONF_PERFORMANCE_DSC', 'Por causa da melhoria na performance, isso processa os dados necess�rios antes, quando mostrado, e os armazena no banco de dados.<br>Quando usado pela primeira vez, execute "lista de categoria" -> "Atualiza��o do percurso da �rvore da categoria"');
    define('_AM_WEBLINKS_CAT_PATH', 'Percurso da �rvore da categoria');
    define('_AM_WEBLINKS_CAT_PATH_DSC', 'SIM processa o percurso da �rvore da categoria e o armazena na tabela da categoria.<br>N�O processa quando mostrado.');
    define('_AM_WEBLINKS_CAT_COUNT', 'Category link count');
    define('_AM_WEBLINKS_CAT_COUNT_DSC', 'SIM processa a contagem da categoria do link e a armazena na tabela da categoria.<br>N�O processa quando mostrado.');

    define('_AM_WEBLINKS_POST_TEXT_4', 'Tods os itens s�o mostrados na p�gina administrativa');
    define('_AM_WEBLINKS_LINK_REGISTER_1', 'Configura��es do Link: Textarea1');

    define('_AM_WEBLINKS_CONF_LINK_GUEST', 'Configura��o do registro do link de convidado');
    define('_AM_WEBLINKS_USE_CAPTCHA', 'Usar CAPTCHA');
    define('_AM_WEBLINKS_USE_CAPTCHA_DSC', 'CAPTCHA � uma tecnica para anti-spam.<br>Esta caracter�stica precisa do m�dulo Captcha.<br>YES, <b>usu�rio an�nimo</b> deve usar CAPTCHA quando adicionar ou modificar um link.<br>N�O n�o mostra o campo CAPTCHA.');
    define('_AM_WEBLINKS_CAPTCHA_FINDED', 'M�dulo Captcha ver %s � encontrado');
    define('_AM_WEBLINKS_CAPTCHA_NOT_FINDED', 'M�dulo Captcha n�o encontrado');

    define('_AM_WEBLINKS_CONF_SUBMIT', 'Descri��o do link no formulario de registro');
    define('_AM_WEBLINKS_SUBMIT_MAIN', 'Descri��o de adicionar novo link: 1');
    define('_AM_WEBLINKS_SUBMIT_PENDING', 'Descri��o de adicionar novo link: 2');
    define('_AM_WEBLINKS_SUBMIT_DOUBLE', 'Descri��o de adicionar novo link: 3');
    define('_AM_WEBLINKS_SUBMIT_MAIN_DSC', 'Mostrar sempre');
    define('_AM_WEBLINKS_SUBMIT_PENDING_DSC', 'Mostrar quando no modo "Administrador necessita aprovar"');
    define('_AM_WEBLINKS_SUBMIT_DOUBLE_DSC', 'Mostrar quando no modo "Existe alguma checagem de link"');

    define('_AM_WEBLINKS_MODLINK_MAIN', 'Descri��o da modifica��o de link: 1');
    define('_AM_WEBLINKS_MODLINK_PENDING', 'Descri��o da modifica��o de link: 2');
    define('_AM_WEBLINKS_MODLINK_NOT_OWNER', 'Descri��o da modifica��o de link: 3');
    define('_AM_WEBLINKS_MODLINK_NOT_OWNER_DSC', 'Mostrar quando no modo "Administrador necessita aprovar" e n�o o propriet�rio');

    define('_AM_WEBLINKS_CONF_CAT_FORUM', 'Vizualizar o F�rum na categoria');
    define('_AM_WEBLINKS_CONF_LINK_FORUM', 'Vizualizar o F�rum no link');
    //define('_AM_WEBLINKS_FORUM_SEL', 'Select Forum module');
    define('_AM_WEBLINKS_FORUM_THREAD_LIMIT', 'N�mero de Thread mostrado');
    define('_AM_WEBLINKS_FORUM_POST_LIMIT', 'N�mero de posts mostrados em cada Thread');
    define('_AM_WEBLINKS_FORUM_POST_ORDER', 'Ordena��o do Post');
    define('_AM_WEBLINKS_FORUM_POST_ORDER_0', 'Data do post mais antigo');
    define('_AM_WEBLINKS_FORUM_POST_ORDER_1', 'Data do �ltimo post');
    //define('_AM_WEBLINKS_FORUM_INSTALLED',     'Forum module ( %s ) ver %s is installed');
    //define('_AM_WEBLINKS_FORUM_NOT_INSTALLED', 'Forum module ( %s ) is not installed');

    // === 2007-03-25 ===
    define('_AM_WEBLINKS_UPDATE_CAT_IMAGE_SIZE', 'Atualiza��o do tamanho da imagem da categoria');

    define('_AM_WEBLINKS_CONF_INDEX', 'Configura��o da P�gina Index');
    define('_AM_WEBLINKS_CONF_INDEX_GM_MODE', 'Modo Google Map');

    define('_AM_WEBLINKS_CAT_SHOW_GM', 'Mostrar Google map');
    define('_AM_WEBLINKS_MODE_NON', 'N�o mostrar');
    define('_AM_WEBLINKS_MODE_DEFAULT', 'Valor Padr�o');
    define('_AM_WEBLINKS_MODE_PARENT', 'Como categoria m�e');
    define('_AM_WEBLINKS_MODE_FOLLOWING', 'valor seguinte');

    define('_AM_WEBLINKS_CONF_CAT_ALBUM', 'Vizualizar �lbum na categoria');
    define('_AM_WEBLINKS_CONF_LINK_ALBUM', 'Vizualizar �lbum no link');
    //define('_AM_WEBLINKS_ALBUM_SEL', 'Select Album module');
    define('_AM_WEBLINKS_ALBUM_LIMIT', 'N�mero de fotos mostradas');
    define('_AM_WEBLINKS_WHEN_OMIT', 'Processar quando omitida');

    define('_AM_WEBLINKS_MODULE_INSTALLED', '%s m�dulo ( %s ) ver %s est� instalado');
    define('_AM_WEBLINKS_MODULE_NOT_INSTALLED', '%s m�dulo ( %s ) n�o est� instalado');

    // === 2007-04-08 ===
    define('_AM_WEBLINKS_CAT_DESC_MODE', 'Mostrar descri��o');
    define('_AM_WEBLINKS_CAT_SHOW_FORUM', 'Mostrar F�rum');
    define('_AM_WEBLINKS_CAT_SHOW_ALBUM', 'Mostrar �lbum');
    define('_AM_WEBLINKS_MODE_SETTING', 'Configura��o de valor');
    define('_AM_WEBLINKS_MODE_OMIT_PARENT', 'Igual a categoria m�e quando omitido');

    // === 2007-06-10 ===
    // d3forum
    define('_AM_WEBLINKS_CONF_D3FORUM', 'Integra��o de coment�rios com o m�dulo d3forum');
    define('_AM_WEBLINKS_PLUGIN_SEL', 'Selecionar Plugin');
    define('_AM_WEBLINKS_DIRNAME_SEL', 'Selecionar M�dulo');

    // category
    define('_AM_WEBLINKS_CAT_PATH_STYLE', 'Vizualizar o estilo do percurso da categoria');

    // category page
    define('_AM_WEBLINKS_CONF_CAT_PAGE', 'Configura��o da p�gina da Categoria');
    define('_AM_WEBLINKS_CAT_COLS', 'N�mero de colunas nas categorias');
    define('_AM_WEBLINKS_CAT_COLS_DESC', 'Na p�gina da categoria especifique o n�mero de colunas, quando mostrar as categorias sob uma hierarquia');
    define('_AM_WEBLINKS_CAT_SUB_MODE', 'Vizualizar a faixa da subcategoria');
    define('_AM_WEBLINKS_CAT_SUB_MODE_1', 'Apenas categorias sob uma hierarquia');
    define('_AM_WEBLINKS_CAT_SUB_MODE_2', 'Todas as categorias sob uma ou mais hierarquias');

    // === 2007-07-14 ===
    // highlight
    define('_AM_WEBLINKS_USE_HIGHLIGHT', 'Usar palavra-chave sublinhada');
    define('_AM_WEBLINKS_CHECK_MAIL', 'Checar formato do e-mail');
    define('_AM_WEBLINKS_CHECK_MAIL_DSC', 'N�OO permite qualquer formato. <br> SIM checa se o formato do e-mail � como abc@efg.com quando do registro do link. ');
    //define('_AM_WEBLINKS_NO_EMAIL', 'Not Set Email Address');

    // === 2007-08-01 ===
    // config
    define('_AM_WEBLINKS_MODULE_CONFIG_0', 'Configura��o do M�dulo');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_0', 'Index');
    define('_AM_WEBLINKS_MODULE_CONFIG_5', 'Configura��o do M�dulo 5');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_5', 'Item do registro do Link');
    define('_AM_WEBLINKS_MODULE_CONFIG_6', 'Configura��o do M�dulo 6');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_6', 'Google Map');

    // google map
    define('_AM_WEBLINKS_GM_MAP_CONT', 'Controle do Map');
    define('_AM_WEBLINKS_GM_MAP_CONT_DESC', 'GLargeMapControl, GSmallMapControl, GSmallZoomControl');
    define('_AM_WEBLINKS_GM_MAP_CONT_NON', 'N�o mostrar');
    define('_AM_WEBLINKS_GM_MAP_CONT_LARGE', 'Controle amplo');
    define('_AM_WEBLINKS_GM_MAP_CONT_SMALL', 'Controle pequeno');
    define('_AM_WEBLINKS_GM_MAP_CONT_ZOOM', 'Zoom do Controle');
    define('_AM_WEBLINKS_GM_USE_TYPE_CONT', 'Usar controle do tipo de Mapa');
    define('_AM_WEBLINKS_GM_USE_TYPE_CONT_DESC', 'GMapTypeControl');
    define('_AM_WEBLINKS_GM_USE_SCALE_CONT', 'Usar controle da escala');
    define('_AM_WEBLINKS_GM_USE_SCALE_CONT_DESC', 'GScaleControl');
    define('_AM_WEBLINKS_GM_USE_OVERVIEW_CONT', 'Usar controle sobrescrito do Mapa');
    define('_AM_WEBLINKS_GM_USE_OVERVIEW_CONT_DESC', 'GOverviewMapControl');
    define('_AM_WEBLINKS_GM_MAP_TYPE', '[Busca] Tipo de Mapa');
    define('_AM_WEBLINKS_GM_MAP_TYPE_DESC', 'GMapType');
    define('_AM_WEBLINKS_GM_GEOCODE_KIND', '[Busca] Tipo de Geocode');
    define('_AM_WEBLINKS_GM_GEOCODE_KIND_DESC', 'Buscar latitude e longitude para o endere�o<br><b>Resultado �nico</b><br>GClientGeocoder - getLatLng<br><b>Mais resultados</b><br>GClientGeocoder - getLocations');
    define('_AM_WEBLINKS_GM_GEOCODE_KIND_LATLNG', 'Resultado �nico: getLatLng');
    define('_AM_WEBLINKS_GM_GEOCODE_KIND_LOCATIONS', 'Mais resultados: getLocations');
    define('_AM_WEBLINKS_GM_USE_GEOCODE_TOKYO', '[Busca][Japan] Usar CSIS');
    define('_AM_WEBLINKS_GM_USE_GEOCODE_TOKYO_DESC', 'V�lido no Jap�o<br>Buscar latitude e longitude para o endere�o');
    define('_AM_WEBLINKS_GM_USE_NISHIOKA', '[Busca][Jap�o] Use Inverse Geocode');
    define('_AM_WEBLINKS_GM_USE_NISHIOKA_DESC', 'V�lido no Jap�o<br>Buscar endere�o para a latitude e longitude<br><a href="http://nishioka.sakura.ne.jp/google/" target="_blank">http://nishioka.sakura.ne.jp/google/</a>');
    define('_AM_WEBLINKS_GM_TITLE_LENGTH', '[Marcador] M�ximo de caracteres para o t�tulo');
    define('_AM_WEBLINKS_GM_TITLE_LENGTH_DESC', 'N�mero m�ximo de caracteres usados no t�tulo no marcador<br><b>-1</b> � ilimitado');
    define('_AM_WEBLINKS_GM_DESC_LENGTH', '[Marcador] M�ximo de caracteres para o conte�do');
    define('_AM_WEBLINKS_GM_DESC_LENGTH_DESC', 'N�mero m�ximo de caracteres usados para o conte�do no marcador<br><b>-1</b> � ilimitado');
    define('_AM_WEBLINKS_GM_WORDWRAP', '[Marcador] M�ximo de caracteres no procesamento das palavras');
    define('_AM_WEBLINKS_GM_WORDWRAP_DESC', 'N�mero m�ximo de caracteres usados por linha wordwrap) mo marcador<br><b>-1</b> � ilimitado');
    define('_AM_WEBLINKS_GM_USE_CENTER_MARKER', '[Marcador] Mostrar o centro do marcador');
    define('_AM_WEBLINKS_GM_USE_CENTER_MARKER_DESC', 'Mostrar o centro do marcador na p�gina principal e p�gina da categoria');

    // map jp
    define('_AM_WEBLINKS_MAP_JP_MANAGE', 'Configura��o do mapa do Jap�o');

    // column
    define('_AM_WEBLINKS_COLUMN_MANAGE', 'Administrar coluna');
    define('_AM_WEBLINKS_COLUMN_MANAGE_DESC', 'Adicionar colunas na tabela dos links e modificar tabela');
    define('_AM_WEBLINKS_COLUMN_MANAGE_NOT_USE', 'N�o usar');
    define('_AM_WEBLINKS_THERE_ARE_COLUMN', 'Existem <b>%s</b> colunas na tabela do link');
    define('_AM_WEBLINKS_COLUMN_NUM', 'N�mero de colunas adicionadas');
    define('_AM_WEBLINKS_COLUMN_BIGGER_USE', 'O n�mero de colunas � maior do que o n�mero na tabela de links');
    define('_AM_WEBLINKS_COLUMN_UNMATCH', 'As colunas n�o combinam na tabela do link e tabela modificada');
    define('_AM_WEBLINKS_PHPMYADMIN', 'Corriga nas ferramentas administrativa como o phpMyAdmin');
    define('_AM_WEBLINKS_LINK_NUM_ETC', 'O n�mero de colunas');

    // latest
    define('_AM_WEBLINKS_INDEX_MODE_LATEST', 'Ordena��o dos �ltimos links');
    define('_AM_WEBLINKS_INDEX_MODE_LATEST_UPDATE', 'Dado Atualizado');
    define('_AM_WEBLINKS_INDEX_MODE_LATEST_CREATE', 'Dado criado');

    // header
    define('_AM_WEBLINKS_CONF_HTML_STYLE', 'Configura��o do estilo do HTML');
    define('_AM_WEBLINKS_HEADER_MODE', 'Usar m�dulo xoops cabe�alho');
    define('_AM_WEBLINKS_HEADER_MODE_DESC', 'Quando "N�o", mostra a folha de estilo e tag Javascript no corpo<br>Quando "Sim", mostra as tags no cabe�alho, usando o cabe�alho do m�dulor xoops<br>existem alguns temas que n�o podem ser usados');

    // bulk
    define('_AM_WEBLINKS_BULK_SAMPLE', 'Voc� pode ver um exemplo clicando no bot�o');
    define('_AM_WEBLINKS_BULK_LINK_DSC10', 'Registro dos itens est�o solucionados');
    define('_AM_WEBLINKS_BULK_LINK_DSC20', 'Administra��o dos itens de registros espec�ficos');
    define('_AM_WEBLINKS_BULK_LINK_DSC21', 'Primeiro par�grafo');
    define('_AM_WEBLINKS_BULK_LINK_DSC22', 'Segundo par�grafo e seguintes');
    define('_AM_WEBLINKS_BULK_LINK_DSC23', 'Informe os nomes do item registrado na primeira linha.<br>Informe a barra horizontal (---)');
    define('_AM_WEBLINKS_BULK_LINK_DSC24', 'Descreve os itens registrados para a ordena��o do primeiro par�grafo, divido por uma v�rgula(,) na segunda linha.');
    define('_AM_WEBLINKS_BULK_CHECK_URL', 'Checar a configura��o da URL');
    define('_AM_WEBLINKS_BULK_CHECK_DESCRIPTION', 'Checar a configura��o da descri��o');

    // === 2007-09-01 ===
    // auth
    define('_AM_WEBLINKS_AUTH_DELETE', 'Pode deletar');
    define('_AM_WEBLINKS_AUTH_DELETE_DSC', 'Especificar os grupos com permiss�o para enviar solicita��es para apagar links');
    define('_AM_WEBLINKS_AUTH_DELETE_AUTO', 'Pode aprovar apagamento de link');
    define('_AM_WEBLINKS_AUTH_DELETE_AUTO_DSC', 'Especificar os grupos com permiss�o para aprovar solicita��es para apagar links');

    // nofitication
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE', 'Administra��o de Notifica��es');
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE_DESC', 'Configura��o para cada administrador do m�dulo<br>� a mesma da p�gina top do m�dulo');
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE_NOT_USE', 'Voc� n�o pode usar em algumas vers�es do XOOPS');
    define('_AM_WEBLINKS_NOTIFICATION_MANAGE_PLEASE', 'Neste cado, por favor use na p�gina top deste m�dulo');
    define('_AM_WEBLINKS_SUBJ_LINK_MOD_APPROVED', '[{X_SITENAME}] {X_MODULE}: Sua solicita��o de modifica��o de link foi aprovada');
    define('_AM_WEBLINKS_SUBJ_LINK_MOD_REFUSED', '[{X_SITENAME}] {X_MODULE}: Sua solicita��o de modifica��o de link foi rejeitada');
    define('_AM_WEBLINKS_SUBJ_LINK_DEL_APPROVED', '[{X_SITENAME}] {X_MODULE}: Sua solicita��o de apagar o link foi aprovada');
    define('_AM_WEBLINKS_SUBJ_LINK_DEL_REFUSED', '[{X_SITENAME}] {X_MODULE}: Sua solicita��o de apagar o link foi rejeitada');

    // config
    define('_AM_WEBLINKS_ADMIN_WAITING_SHOW', 'Mostrar administra��o da lista de pend�ncias');
    define('_AM_WEBLINKS_USER_WAITING_NUM', 'N�mero de links usados na lista de pend�ncias');
    define('_AM_WEBLINKS_USER_OWNER_NUM', 'N�mero de usu�rios listados que submeteram lista');
    define('_AM_WEBLINKS_USE_HITS_SINGLELINK', 'Contagem de acessos quando mostra link �nico');
    define('_AM_WEBLINKS_USE_HITS_SINGLELINK_DSC', 'SIM habilita a contagem do contador de acessos, quando mostra o link �nico');
    define('_AM_WEBLINKS_MODE_RANDOM', 'Redirecionar para salto aleat�rio');
    define('_AM_WEBLINKS_MODE_RANDOM_URL', 'url do site registrado');
    define('_AM_WEBLINKS_MODE_RANDOM_SINGLE', 'link �nico neste m�dulo');

    // request list
    define('_AM_WEBLINKS_DEL_REQS', 'Apagamento de Links aguardadando por valida��o');
    define('_AM_WEBLINKS_NO_DEL_REQ', 'Sem pedidos de apagamento de links');
    define('_AM_WEBLINKS_DEL_REQ_DELETED', 'Pedido de apagamento deletado');

    // link list
    define('_AM_WEBLINKS_LINK_USERCOMMENT_DESC', 'Lista de link com coment�rios para administrar (Listados por novo ID)');

    // clone
    define('_AM_WEBLINKS_CLONE_LINK', 'Clonar');
    define('_AM_WEBLINKS_CLONE_MODULE', 'Clomnar para outro m�dulo');
    define('_AM_WEBLINKS_CLONE_CONFIRM', 'Confirmar para clonar');
    define('_AM_WEBLINKS_NO_MODULE', 'N�o h� m�dulo correspondente');

    // link form
    define('_AM_WEBLINKS_MODIFIED', 'Modificado');
    define('_AM_WEBLINKS_CHECK_CONFIRM', 'Confirmado');
    define('_AM_WEBLINKS_WARN_CONFIRM', 'Aviso: Checar para "Confirmar" de %s');
    define('_AM_WEBLINKS_RSSC_LID_EXIST_MORE', 'Existem dois ou mais links que tem o mesmo "ID RSSC"');

    // web shot
    define('_AM_WEBLINKS_LINK_IMG_THUMB', 'A substitui��o da imagem do link');
    define('_AM_WEBLINKS_LINK_IMG_THUMB_DSC', 'mostrar a miniatura do WEB site ao inv�s do link da imagem, <br>usando a miniatura do servi�o web, <br>se n�o configurado o link da imagem.');
    define('_AM_WEBLINKS_LINK_IMG_NON', 'nenhum');
    //define('_AM_WEBLINKS_LINK_IMG_MOZSHOT', 'Use <a href="http://mozshot.nemui.org/" target="_blank">MozShot</a>');
    //define('_AM_WEBLINKS_LINK_IMG_SIMPLEAPI', 'Use <a href="http://img.simpleapi.net/" target="_blank">SimpleAPI</a>');

    // === 2007-11-01 ===
    // google map
    define('_AM_WEBLINKS_GM_MARKER_WIDTH', '[Marcador] Largura(pixel)');
    define('_AM_WEBLINKS_GM_MARKER_WIDTH_DESC', 'Largura do marcador do mapa info<br><b>-1</b> est� n�o especificado');
    define('_AM_WEBLINKS_LINK_IMG_USE', 'Usar %s');

    define('_AM_WEBLINKS_RSS_SITE', 'Este site');
    define('_AM_WEBLINKS_RSS_FEED', 'Feeds RSS');

    // nameflag mainflag
    define('_AM_WEBLINKS_CONF_LINK_USER', 'Configura��o do usu�rio que regstrou o link');
    define('_AM_WEBLINKS_USER_NAMEFLAG', 'Selecionar a vizualiza��o do nome da bandeira');
    define('_AM_WEBLINKS_USER_MAILFLAG', 'Selecionar a vizualiza��o da bandeira do e-mail');
    define('_AM_WEBLINKS_USER_NAME_MAIL_FLAG_DESC', 'O valor padr�o quando o usu�rio registrado<br>O administrador pode mudar o valor');
    define('_AM_WEBLINKS_USER_NAME_MAIL_FLAG_SEL', 'A escolha do usu�rio');

    // description length
    define('_AM_WEBLINKS_DESC_LENGTH', 'Comprimento m�ximo dos caracteres');
    define('_AM_WEBLINKS_DESC_LENGTH_DSC', '<b>-1</b> ou o administrador: limite 64KB<br>');

    // === 2007-12-09 ===
    define('_AM_WEBLINKS_D3FORUM_VIEW', 'Tipo de vizualiza��o do coment�rio');

    // === 2008-02-17 ===
    // config
    define('_AM_WEBLINKS_MODULE_CONFIG_7', 'Configura��o do M�dulo 7');
    define('_AM_WEBLINKS_MODULE_CONFIG_DESC_7', 'Menu');
    define('_AM_WEBLINKS_CONF_MENU', 'Vizualiza��o do Menu');
    define('_AM_WEBLINKS_CONF_MENU_DESC', 'A configura��o que remete � vista do menu');
    define('_AM_WEBLINKS_CONF_TITLE', 'T�tulo do Menu');

    // htmlout
    define('_AM_WEBLINKS_OUTPUT_PLUGIN_MANAGE', 'Administra��o do pluglin do HTML de sa�da');
    define('_AM_WEBLINKS_HTMLOUT', 'Plugin de saida do HTML');
    define('_AM_WEBLINKS_RSSOUT', 'Plugin de saida do RSS');
    define('_AM_WEBLINKS_KMLOUT', 'Plugin de saida do KML');

    // pagerank
    define('_AM_WEBLINKS_LINK_CHECK_MANAGE', 'Administrar checagem de Link');
    define('_AM_WEBLINKS_USE_PAGERANK', 'Mostrar PageRank');
    define('_AM_WEBLINKS_USE_PAGERANK_DESC', '"Mostrar" : mostra o pagerank na barra do menu, lista o link e o link �nico');
    define('_AM_WEBLINKS_USE_PAGERANK_NON', 'N�o mostrar');
    define('_AM_WEBLINKS_USE_PAGERANK_SHOW', 'Mostrar');
    define('_AM_WEBLINKS_USE_PAGERANK_CACHE', 'Mostrar usando cache da obtern��o do PageRank');

    // kml
    define('_AM_WEBLINKS_KML_USE', 'Mostrar KML');
}
// --- define language begin ---
