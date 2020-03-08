<?php
// $Id: modinfo.php,v 1.4 2009/03/22 03:27:25 ohwada Exp $

// 2008-02-17
// remove _MI_WEBLINKS_SMNAME1

// 2007-12-09
// remove _MI_WEBLINKS_LINK_APPROVE_NOTIFYSBJ

// 2007-09-01
// notification: new_link_admin

// 2007-08-25
// small change _MI_WEBLINKS_GLOBAL_LINKSUBMIT_NOTIFY

// 2007-04-08
// _MI_WEBLINKS_BNAME_RANDOM_IMAGE

// 2006-11-03 hiro
// random block

// 2006-05-15 K.OHWADA
// weblinks ver 1.1
// add _MI_WEBLINKS_ADMENU0

// 2006-03-26 K.OHWADA
// REQ 3807: Description in main page
// _MI_WEBLINKS_INDEX_DESC

// 2006-01-01 K.OHWADA
// weblinks ver 1.0
// module depulication

//=========================================================
// WebLinks Module
// language for Module Info
// 2004-10-24 K.OHWADA
//=========================================================

// --- define language begin ---
if (!defined('WEBLINKS_LANG_MI_LOADED')) {
    define('WEBLINKS_LANG_MI_LOADED', 1);

    //---------------------------------------------------------
    // same as mylinks
    //---------------------------------------------------------
    // The name of this module
    define('_MI_WEBLINKS_NAME', 'Links');

    // A brief description of this module
    define('_MI_WEBLINKS_DESC', 'Cria uma se��o de links onde usu�rios podem buscar/enviar/avaliar varios web sites.');

    // Names of blocks for this module (Not all module has blocks)
    define('_MI_WEBLINKS_BNAME1', 'Links recentes');
    define('_MI_WEBLINKS_BNAME2', 'Top Links');
    define('_MI_WEBLINKS_BNAME3', 'Links populares');

    // Sub menu titles
    define('_MI_WEBLINKS_SMNAME1', 'Enviar');
    define('_MI_WEBLINKS_SMNAME2', 'Site Popular ');
    define('_MI_WEBLINKS_SMNAME3', 'Site melhor avaliado');

    // Names of admin menu items
    define('_MI_WEBLINKS_ADMENU1', 'Configura��o do Modulo 2');
    define('_MI_WEBLINKS_ADMENU2', 'Gerenciamento de Categoria');
    define('_MI_WEBLINKS_ADMENU3', 'Gerenciamento de Link');
    define('_MI_WEBLINKS_ADMENU4', 'Incluir novo Link');
    define('_MI_WEBLINKS_ADMENU5', 'Novos Links esperando valida��o');
    define('_MI_WEBLINKS_ADMENU6', 'Links modificados esperando por valida��o');
    define('_MI_WEBLINKS_ADMENU7', 'Relat�rio de Links quebrados');
    //define("_MI_WEBLINKS_ADMENU8","Verificador de Link");

    //-------------------------------------
    // T�tulo of config items
    // Description of each config items
    //-------------------------------------
    define('_MI_WEBLINKS_POPULAR', 'Selecione o numero de hits para um link ser marcado como popular');
    define('_MI_WEBLINKS_POPULARDSC', 'Informe o numero minimo de hits para exibir o icone "POPULAR". <br> Quando selecionado 0, n�o exibe o �cone. ');
    define('_MI_WEBLINKS_NEWLINKS', 'Selecione o numero maximo de novos links exibidos na top page');

    //define('_MI_WEBLINKS_NEWLINKSDSC', 'Informe o numero maximo de links a ser exibidos no bloco "Novos Links". ');
    define('_MI_WEBLINKS_NEWLINKSDSC', 'Informe o numero maximo de links a ser exibidos na p�gina principal. ');

    define('_MI_WEBLINKS_PERPAGE', 'Informe o numero maximo de links a ser exibido em cada p�gina');
    define('_MI_WEBLINKS_PERPAGEDSC', 'Informe o numero maximo de links para exibir detalhes por p�gina');

    //define('_MI_WEBLINKS_USESHOTS', 'Selecione sim para exibir screenshot para cada link');
    //define('_MI_WEBLINKS_USESHOTSDSC', '');
    //define('_MI_WEBLINKS_SHOTWIDTH', 'Largura maxima permitida para cada imagem de screenshot');
    //define('_MI_WEBLINKS_SHOTWIDTHDSC', '');

    //define('_MI_WEBLINKS_ANONPOST','Permitir visitantes enviarem links?');
    //define('_MI_WEBLINKS_AUTOAPPROVE','Auto aprova��o de novos links sem interven��o do administrdor?');
    //define('_MI_WEBLINKS_AUTOAPPROVEDSC','');

    //-------------------------------------
    // Text for notifications
    //-------------------------------------
    define('_MI_WEBLINKS_GLOBAL_NOTIFY', 'Global');
    define('_MI_WEBLINKS_GLOBAL_NOTIFYDSC', 'Op��o de notifica��o de links globais.');

    define('_MI_WEBLINKS_CATEGORY_NOTIFY', 'Categoria');
    define('_MI_WEBLINKS_CATEGORY_NOTIFYDSC', 'Op��es de notifica��o que se aplica a categoria do link corrente.');

    define('_MI_WEBLINKS_LINK_NOTIFY', 'Link');
    define('_MI_WEBLINKS_LINK_NOTIFYDSC', 'Op��es de notifica��o que se aplicam ao link currente.');

    define('_MI_WEBLINKS_GLOBAL_NEWCATEGORY_NOTIFY', 'Nova categoria');
    define('_MI_WEBLINKS_GLOBAL_NEWCATEGORY_NOTIFYCAP', 'Notificar-me quando uma nova categoria for criada.');
    define('_MI_WEBLINKS_GLOBAL_NEWCATEGORY_NOTIFYDSC', 'Receber uma notifica��o quando uma nova categoria for criada.');
    define('_MI_WEBLINKS_GLOBAL_NEWCATEGORY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notifica��o : Nova categoria');

    define('_MI_WEBLINKS_GLOBAL_LINKMODIFY_NOTIFY', 'Requisitada modifica��o de Link');
    define('_MI_WEBLINKS_GLOBAL_LINKMODIFY_NOTIFYCAP', 'Notificar qualquer requisi��o de modifica��o de link.');
    define('_MI_WEBLINKS_GLOBAL_LINKMODIFY_NOTIFYDSC', 'Receber uma notifica��o quando qualquer requisi��o de modifica��o for enviada.');
    define('_MI_WEBLINKS_GLOBAL_LINKMODIFY_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notifica��o : Requisitado modifca��o de link');

    define('_MI_WEBLINKS_GLOBAL_LINKBROKEN_NOTIFY', 'Link quebrado enviado');
    define('_MI_WEBLINKS_GLOBAL_LINKBROKEN_NOTIFYCAP', 'Notificar qualquer relat�rio de broken link.');
    define('_MI_WEBLINKS_GLOBAL_LINKBROKEN_NOTIFYDSC', 'Receber uma notifica��o quando qualquer relat�rio de broken link report for enviado.');
    define('_MI_WEBLINKS_GLOBAL_LINKBROKEN_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notifica��o : Relat�rio de Broken Link');

    define('_MI_WEBLINKS_GLOBAL_LINKSUBMIT_NOTIFY', 'Novo link enviado');
    define('_MI_WEBLINKS_GLOBAL_LINKSUBMIT_NOTIFYCAP', 'Notificar quando qualquer novo link for enviado (aguardando aprova��o).');
    define('_MI_WEBLINKS_GLOBAL_LINKSUBMIT_NOTIFYDSC', 'Receber notifica��o quando qualquer novo link for enviado (aguardando aprova��o).');
    define('_MI_WEBLINKS_GLOBAL_LINKSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notifica��o : Novo link enviado');

    define('_MI_WEBLINKS_GLOBAL_NEWLINK_NOTIFY', 'Novo link');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_NOTIFYCAP', 'Notificar quando qualquer novo link for afixado.');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_NOTIFYDSC', 'Receber notifica��o quando qualquer novo link for afixado.');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notifica��o : Novo link');

    define('_MI_WEBLINKS_CATEGORY_LINKSUBMIT_NOTIFY', 'Novo link enviado');
    define('_MI_WEBLINKS_CATEGORY_LINKSUBMIT_NOTIFYCAP', 'Notificar quando um novo link for enviado (aguardando aprova��o) para a categoria corrente.');
    define('_MI_WEBLINKS_CATEGORY_LINKSUBMIT_NOTIFYDSC', 'Receber notifica��o quando um novo link for enviado (aguardando aprova��o) para a categoria corrente.');
    define('_MI_WEBLINKS_CATEGORY_LINKSUBMIT_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notifica��o : Novo link enviado na categoria');

    define('_MI_WEBLINKS_CATEGORY_NEWLINK_NOTIFY', 'Novo link');
    define('_MI_WEBLINKS_CATEGORY_NEWLINK_NOTIFYCAP', 'Notificar quando um novo link for afixado para a categoria corrente.');
    define('_MI_WEBLINKS_CATEGORY_NEWLINK_NOTIFYDSC', 'Receber notifica��o quando um novo link for afixado para a categoria corrente.');
    define('_MI_WEBLINKS_CATEGORY_NEWLINK_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notifica��o : Novo link na categoria');

    define('_MI_WEBLINKS_LINK_APPROVE_NOTIFY', 'Link aprovado');
    define('_MI_WEBLINKS_LINK_APPROVE_NOTIFYCAP', 'Notificar quando este link for aprovado.');
    define('_MI_WEBLINKS_LINK_APPROVE_NOTIFYDSC', 'Receber notifica��o quando este link for aprovado.');
    define('_MI_WEBLINKS_LINK_APPROVE_NOTIFYSBJ', '[{X_SITENAME}] {X_MODULE} auto-notifica��o : Link aprovado');

    //---------------------------------------------------------
    // weblinks
    //---------------------------------------------------------
    // === Names of blocks for this module ===
    define('_MI_WEBLINKS_BNAME4', 'Categorias de Web links');
    define('_MI_WEBLINKS_BNAME5', 'Ultimos RSS/ATOM feeds de Web links');
    define('_MI_WEBLINKS_BNAME6', 'Exibe blog de Web links');

    //-------------------------------------
    // T�tulo of config items
    //-------------------------------------
    define('_MI_WEBLINKS_LOGOSHOW', 'Exibir o mm�dulo de logo imagem');
    define('_MI_WEBLINKS_LOGOSHOWDSC', 'Selecione "SIM" para exibir o modulo logo imagem.');

    define('_MI_WEBLINKS_TITLESHOW', 'Exibe o modulo de t�tulo');
    define('_MI_WEBLINKS_TITLESHOWDSC', 'Selecione "SIM" para exibir o modulo t�tulo');

    define('_MI_WEBLINKS_NEWDAYS', 'Selecione o numero de dias para links serem marcados como novo');
    define('_MI_WEBLINKS_NEWDAYS_DSC', 'Informe o numero de hits para exibir o �cone "NOVO". <br> Quando selecionado 0, n�o exibe �cone. ');

    define('_MI_WEBLINKS_DESCSHORT', 'Numero maximo de caracteres usados para a lista de explana��o do link ');
    define('_MI_WEBLINKS_DESCSHORTDSC', 'Informe o numero maximo de caracteres para ser usado para lista de explanaa��o de um link. ');

    define('_MI_WEBLINKS_ORDERBY', 'Valor padr�o para ordem na exibi��o de detalhes do link');
    define('_MI_WEBLINKS_ODERBYTDSC', 'Informe valor padr�o na exibi��o de detalhes do link.');
    define('_MI_WEBLINKS_ORDERBY0', 'T�tulo (A a Z)');
    define('_MI_WEBLINKS_ORDERBY1', 'T�tulo (Z a A)');
    define('_MI_WEBLINKS_ORDERBY2', 'Data (Registro em ordem ascendente)');
    define('_MI_WEBLINKS_ORDERBY3', 'Data (Registro em ordem descendente)');
    define('_MI_WEBLINKS_ORDERBY4', 'Avalia��o (ordem ascendente)');
    define('_MI_WEBLINKS_ORDERBY5', 'Avalia��o (ordem descendente)');
    define('_MI_WEBLINKS_ORDERBY6', 'Popularidade (ordem ascendente)');
    define('_MI_WEBLINKS_ORDERBY7', 'Popularidade (ordem descendente)');

    define('_MI_WEBLINKS_SEARCH_LINKS', 'Numero de links exibidos em resultado de busca');
    define('_MI_WEBLINKS_SEARCH_LINKSDSC', 'Informe o numero maximo de links para exibir em resultado de busca');

    define('_MI_WEBLINKS_SEARCH_MIN', 'Minimo de letras para uma chave de busca');
    define('_MI_WEBLINKS_SEARCH_MINDSC', 'Informe o numero minimo de caracteres para uma chave de busca ');

    define('_MI_WEBLINKS_USEFRAMES', 'Voc� gostaria de exibir a p�gina de links em um frame?');
    define('_MI_WEBLINKS_USEFRAMEDSC', 'Se exibe uma p�gina de link dentro de um frame');

    define('_MI_WEBLINKS_BROKEN', 'Quantidde de link broken para parar exibi��o');
    define(
        '_MI_WEBLINKS_BROKENDSC',
        'Informe quantidade de link broken para parar exibi��o. <br> Quando abaixo deste valor, ser� considerado como um erro tempor�rio, e n�o executa nada. <br>Quando ultrapassar este valor, ser� considerado um erro para corre��o, e para a exibi��o.'
    );

    define('_MI_WEBLINKS_LISTIMAGE_USE', 'Use imagens de link para uma lista de link');
    define('_MI_WEBLINKS_LISTIMAGE_WIDTH', 'Largura maxima de uma imagem do link');
    define('_MI_WEBLINKS_LISTIMAGE_HEIGHT', 'Tamanho maximo de uma imagem de link');
    define('_MI_WEBLINKS_LISTIMAGE_USEDSC', 'Selecione "SIM" para exibir imagens de links quando exibindo uma lista de links');

    define('_MI_WEBLINKS_LINKIMAGE_USE', 'Use imagens de link para exibir detalhes do link');
    define('_MI_WEBLINKS_LINKIMAGE_WIDTH', 'Largura maxima de uma imagem para detalhes de um link');
    define('_MI_WEBLINKS_LINKIMAGE_HEIGHT', 'Tamanho maximo de uma imagem para exibir detalhes de um link');
    define('_MI_WEBLINKS_LINKIMAGE_USEDSC', 'Selecione "SIM" para exibir imagens de link quando exibindo detalhes de um link.');

    // 2005-10-20 K.OHWADA
    define('_MI_WEBLINKS_TOPTEN_STYLE', 'Estilo do top dez');
    define('_MI_WEBLINKS_TOPTEN_STYLE_DSC', 'Selecionar estilo no "Site popular" e "Site melhor avaliado". ');
    define('_MI_WEBLINKS_TOPTEN_STYLE_0', 'Cada categoria top');
    define('_MI_WEBLINKS_TOPTEN_STYLE_1', 'Mixado: Todas as categorias');

    define('_MI_WEBLINKS_TOPTEN_LINKS', 'O n�mero m�ximo de links top dez');
    define('_MI_WEBLINKS_TOPTEN_LINKS_DSC', 'Informe o n�mero m�ximo de links a serem mostrados em "Site Popular" e "Site melhor avaliado". ');

    define('_MI_WEBLINKS_TOPTEN_CATS', 'O n�mero m�ximo de categorias no top dez topten');
    define(
        '_MI_WEBLINKS_TOPTEN_CATS_DSC',
        'Informe o n�mero m�ximo de categorias a serem mostradas em "Site Popular" e "Site melhor avaliado". <br>Tempo esgotado pode ocorrer se muitas categorias top forem selecionadas'
    );

    // 2006-03-26
    // REQ 3807: Main Page Introductory Text
    //define('_MI_WEBLINKS_INDEX_DESC','Main Page Introductory Text');
    //define('_MI_WEBLINKS_INDEX_DESC_DSC', 'You can use this section to display some descriptive or introductory text. HTML is allowed.');
    //define('_MI_WEBLINKS_INDEX_DESC_DEFAULT', '<div align="center"><font color="blue">Here is where your page introduction goes.<br>You can edit it at "Module Configuration 2".</font><br></div>');

    // 2006-05-15
    define('_MI_WEBLINKS_ADMENU0', 'Index');

    // 2006-11-03
    // random block
    define('_MI_WEBLINKS_BNAME_RANDOM', 'Link aleat�rio');
    define('_MI_WEBLINKS_BNAME_GENERIC', 'Bloco de link gen�rico');

    // 2007-04-08
    define('_MI_WEBLINKS_BNAME_RANDOM_PHOTO', 'Foto aleat�ria');

    // 2007-09-01
    // notification: new_link_admin
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_ADMIN', '[Admin] Novo link (com o coment�rio para o admin)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_ADMIN_CAP', '[Admin] Notifique-me quando algum novo link for postado (com o coment�rio do admin)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_ADMIN_DSC', 'Receber notifica��o quando algum novo link for postado (com o coment�rio para o admin)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_ADMIN_SBJ', '[{X_SITENAME}] {X_MODULE} auto-notifica��o: Novo link');

    // notification: new_link_comment
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_COMMENT', '[Admin] Novo link (se informado o coment�rio para o admin)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_COMMENT_CAP', '[Admin] Notifique-me quando um novo link for postado (se informado o coment�rio ao admin)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_COMMENT_DSC', 'Receber notifica��o quando um novo link for postado (se informado o coment�rio para o admin)');
    define('_MI_WEBLINKS_GLOBAL_NEWLINK_COMMENT_SBJ', '[{X_SITENAME}] {X_MODULE} auto-notifica��o : Novo link)');
}// --- define language begin ---
