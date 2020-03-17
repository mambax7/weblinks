<{* $Id: weblinks1_block_top.html,v 1.2 2012/04/09 10:20:06 ohwada Exp $ *}>

<{* google map *}>
<{if $block.show_webmap}>
    <script type="text/javascript">
        //<![CDATA[
        setTimeout('<{$block.webmap_func}>()', <{$block.webmap_timeout}>
        )
        ;
        //]]>
    </script>

    <div id="<{$block.webmap_div_id}>" style="<{$block.webmap_style}>"></div>
    <{/if}>

<{* top hits links *}>
<ul>
    <{foreach item=link from=$block.links}>
    <li>
        <{if $link.show_banner == 1}>
        <a href="<{$xoops_url}>/modules/<{$block.dirname}>/singlelink.php?lid=<{$link.lid}>">
            <{if $link.banner_width > 0 }>
        <img src="<{$link.banner_s}>" width="<{$link.banner_width}>" border="0" alt="banner"/>
            <{else}>
        <img src="<{$link.banner_s}>" border="0" alt="banner"/>
            <{/if}>
        </a>
        <{/if}>
        <a href="<{$xoops_url}>/modules/<{$block.dirname}>/singlelink.php?lid=<{$link.lid}>"><{$link.title_disp}></a> (<{$link.hits_disp}>)
        <{if $link.show_new == 1}>
    <img src="<{$xoops_url}>/modules/<{$block.dirname}>/images/new.gif" border="0" alt="new"/>
        <{/if}>
        <{if $link.show_update == 1}>
    <img src="<{$xoops_url}>/modules/<{$block.dirname}>/images/update.gif" border="0" alt="update"/>
        <{/if}>
        <{if $link.show_pop == 1}>
    <img src="<{$xoops_url}>/modules/<{$block.dirname}>/images/pop.gif" border="0" alt="popular"/>
        <{/if}>
        <{if $link.show_cat_title }>
    <br> in
        <a href="<{$xoops_url}>/modules/<{$block.dirname}>/viewcat.php?cid=<{$link.cid}>"><{$link.cat_title_disp}></a>
        <{/if}>
        <{if $link.show_desc }>
    <br>
        <span style="font-size: 90%;">
    <{$link.desc_short}>
    </span>
        <{/if}>
    </li>
    <{/foreach}>
</ul>
