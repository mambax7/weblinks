<{* $Id: weblinks_gm_single.html,v 1.1 2011/12/29 14:32:37 ohwada Exp $ *}>

<{* google map script 1 *}>
<script type="text/javascript">
    //<![CDATA[

    weblinks_gm_latitude =
    <{$link.gm_latitude}>
    ;
    weblinks_gm_longitude =
    <{$link.gm_longitude}>
    ;
    weblinks_gm_zoom =
    <{$link.gm_zoom}>
    ;
    weblinks_gm_marker_width =
    <{$gm_marker_width}>
    ;
    weblinks_gm_type = "<{$link.gm_type_str}>";
    weblinks_gm_map_control = "<{$gm_map_control}>";
    weblinks_gm_use_type =
    <{$bool_gm_use_type}>
    ;
    weblinks_gm_use_scale =
    <{$bool_gm_use_scale}>
    ;
    weblinks_gm_use_overview =
    <{$bool_gm_use_overview}>
    ;
    weblinks_gm_lang_not_compatible = "<{$lang_not_compatible}>";

    weblinks_gm_info[0] = new Array( <{$link.gm_latitude}>,
    <{$link.gm_longitude}>,
    '<{$link.gm_info_single}>'
    )
    ;

    window.onload = weblinks_gm_load;
    window.onunload = GUnload;

    //]]>
</script>

<noscript>
    <div class="weblinks_error"><{$lang_js_invalid}></div>
</noscript>

<div id="weblinks_gm_not_compatible" class="weblinks_error"></div>
<div id="weblinks_gm_map" class="weblinks_gm_map_singlelink"></div>
<div class="weblinks_gm_location">
    <a href="<{$gm_server}>maps?hl=<{$xoops_langcode}>&amp;q=<{$link.gm_latitude}>,+<{$link.gm_longitude}>&amp;z=<{$link.gm_zoom}>" target="_blank">
        <img src="<{$xoops_url}>/modules/<{$dirname}>/images/google_maps.gif" border="0" alt="google map"/> </a>
    <{$lang_gm_latitude}> : <{$link.gm_latitude}> / <{$lang_gm_longitude}> : <{$link.gm_longitude}> / <{$lang_gm_zoom}> : <{$link.gm_zoom}>
</div>
<br>
