<{* $Id: weblinks_block_photo.html,v 1.1 2012/04/09 10:22:24 ohwada Exp $ *}>

<{foreach item=photo from=$block.photos }>
    <{if $block.show_title }>
    <a href="<{$xoops_url}>/modules/<{$block.album_dirname}>/photo.php?lid=<{$photo.lid}>&amp;cid=<{$photo.cid}>">
        <{$photo.title}></a> <{$smarty.const._WEBLINKS_IN}>
    <a href="<{$xoops_url}>/modules/<{$block.album_dirname}>/viewcat.php?cid=<{$photo.cid}>">
        <{$photo.cat_title}></a><br>
    <{/if}>
    <a href="<{$xoops_url}>/modules/<{$block.album_dirname}>/photo.php?lid=<{$photo.lid}>&amp;cid=<{$photo.cid}>">
        <img src="<{$photo.thumbs_url}>/<{$photo.lid}>.<{$photo.ext}>" alt="<{$photo.title}>" title="<{$photo.title}>" style="margin:0px;padding:5px;"/></a><br>
    <{/foreach}>
