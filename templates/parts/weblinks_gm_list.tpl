<{* $Id: weblinks_gm_list.html,v 1.1 2011/12/29 14:32:37 ohwada Exp $ *}>

<{* google map script 1 *}>
<script type="text/javascript">
    //<![CDATA[

    weblinks_gm_url = "<{$xoops_url}>/modules/<{$dirname}>";
    weblinks_gm_latitude =
    <{$gm_latitude}>
    ;
    weblinks_gm_longitude =
    <{$gm_longitude}>
    ;
    weblinks_gm_zoom =
    <{$gm_zoom}>
    ;
    weblinks_gm_marker_width =
    <{$gm_marker_width}>
    ;
    weblinks_gm_type = "<{$gm_type_str}>";
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
    weblinks_gm_use_center_marker =
    <{$bool_gm_use_center_marker}>
    ;
    weblinks_gm_lang_not_compatible = "<{$lang_not_compatible}>";

    //]]>
</script>

<{counter name="link_i" assign="link_i" start=0 print=false}><br>
<{foreach item=link from=$links}>
    <{if $link.flag_gm_use }>

    <{* google map script 2 *}>
    <script type="text/javascript">
        //<![CDATA[

        weblinks_gm_info[ <{$link_i}>
        ]
        = new Array( <{$link.gm_latitude}>,
        <{$link.gm_longitude}>,
        '<{$link.gm_info_list}>'
        )
        ;

        //]]>
    </script>

    <{counter name="link_i" assign="link_i" print=false }>
    <{/if}>
    <{/foreach}>

<{* google map script 3 *}>
<script type="text/javascript">
    //<![CDATA[

    window.onload = weblinks_gm_load;
    window.onunload = GUnload;

    //]]>
</script>

<noscript>
    <div class="weblinks_error"><{$lang_js_invalid}></div>
</noscript>

<div id="weblinks_gm_not_compatible" class="weblinks_error"></div>
<div id="weblinks_gm_map" class="<{$css_map}>"></div>
