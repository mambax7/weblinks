<{* $Id: weblinks1_block_catlist.html,v 1.3 2006/05/24 02:20:00 ohwada Exp $ *}>

<div style="text-align:right; padding-right: 5px;"><{$block.lang_total_links}> <b><{$block.total_links}></b> <{$block.lang_links}></div>

<{if count($block.categories) gt 0}>
<table border="0" cellspacing="10" cellpadding="0" align="center">
    <tr>

        <{* -- Start category loop -- *}>
        <{foreach item=category from=$block.categories}>
        <td valign="top" width="33%">

            <{if $block.image_mode == 1}>
            <a href="<{$xoops_url}>/modules/<{$block.dirname}>/viewcat.php?cid=<{$category.id}>">
                <img src="<{$xoops_url}>/modules/<{$block.dirname}>/images/folder.gif" border="0" alt="category"/>
            </a>&nbsp;
            <{elseif ($block.image_mode == 2) && ($category.imgurl != "") }>
            <a href="<{$xoops_url}>/modules/<{$block.dirname}>/viewcat.php?cid=<{$category.id}>">

                <{if ($category.width > 0 ) }>
                <img src="<{$category.imgurl}>" width="<{$category.width}>" border="0" alt="category"/>
                <{else}>
                <img src="<{$category.imgurl}>" border="0" alt="category"/>
                <{/if}>

            </a><br>
            <{/if}>

            <a href="<{$xoops_url}>/modules/<{$block.dirname}>/viewcat.php?cid=<{$category.id}>"><b><{$category.title}></b></a>&nbsp;(<{$category.totallink}>)<br>
            <{$category.subcategories}>
        </td>

        <{if $category.count is div by 3}>
    </tr>
    <tr>
        <{/if}>

        <{/foreach}>
        <{* -- End category loop -- *}>

    </tr>
</table>
<{/if}>
