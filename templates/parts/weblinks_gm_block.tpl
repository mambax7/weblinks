<{* $Id: weblinks_gm_block.html,v 1.1 2011/12/29 14:32:37 ohwada Exp $ *}>

<{* google map script 1 *}>
<{if $block.gm_load_server}>
    <script src="<{$block.gm_server}>maps?file=api&amp;hl=<{$xoops_langcode}>&amp;v=2&amp;key=<{$block.gm_apikey}>" type="text/javascript" charset="utf-8"></script>
    <{/if}>

<{* google map script 2 *}>
<{if $block.gm_load_block}>
    <script src="<{$xoops_url}>/modules/<{$block.dirname}>/include/weblinks_gmap_block.js" type="text/javascript"></script>
    <{/if}>

<{* google map script 3 *}>
<script type="text/javascript">
    //<![CDATA[

    var <{$block.gm_name}>
    _info = new Array();
    var <{$block.gm_name}>
    _marker_width =
    <{$block.gm_marker_width}>
    ;

    function <{$block.gm_name}>

    _show()
    {
        var <{$block.gm_name}>
        _gmap = new GMap2(document.getElementById("<{$block.gm_name}>_map"));
        var point = new Array( <{$block.gm_latitude}>, <{$block.gm_longitude}>,  <{$block.gm_zoom}> )
        ;
        weblinks_gm_b_show( <{$block.gm_name}> _gmap, point,
    <{$block.gm_name}>
        _info,
    <{$block.gm_control}>, <{$block.gm_type_control}> )
        ;
    }

    //]]>
</script>

<{counter name="link_i" assign="link_i" start=0 print=false}><br>
<{foreach item=link from=$block.gm_links}>
    <{if $link.flag_gm_use }>

    <{* google map script 4 *}>
    <script type="text/javascript">
        //<![CDATA[

        var text = '<a href="<{$xoops_url}>/modules/<{$block.dirname}>/singlelink.php?lid=<{$link.lid}>"><b><{$link.title}></b></a><br><font size="-2"><{$link.gm_desc_wrap}></font>';

        if (<{$block.gm_name}>
        _marker_width > 0
        )
        {
            text = '<div style="width:' + <{$block.gm_name}> _marker_width + 'px">' + text + '</div>';
        }

        <{$block.gm_name}>
        _info[ <{$link_i}>
        ]
        = new Array( <{$link.gm_latitude}>,
        <{$link.gm_longitude}>,
        text
        )
        ;

        //]]>
    </script>

    <{counter name="link_i" assign="link_i" print=false }>
    <{/if}>
    <{/foreach}>

<{* google map script 5 *}>
<script type="text/javascript">
    //<![CDATA[

    <{if $block.gm_timeout > 0}>
    setTimeout('<{$block.gm_name}>_show()', <{$block.gm_timeout}>
    )
    ;
    <{else}>
    window.onload =
    <{$block.gm_name}>
    _show;
    <{/if}>
    window.onunload = GUnload;

    //]]>
</script>

<div id="<{$block.gm_name}>_map" style="width:100%; height:<{$block.gm_height}>px; border:1px solid #909090; margin-bottom:6px;"></div>
