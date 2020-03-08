<{* $Id: weblinks_block_photo.html,v 1.2 2012/04/10 04:41:09 ohwada Exp $ *}>

<{foreach item=photo from=$block.photos }>
<{if $block.show_title }>
<a href="<{$photo.href}>">
    <{$photo.title|escape}></a> in
<a href="<{$photo.cat_href}>">
    <{$photo.cat_title|escape}></a><br>
<{/if}>
<a href="<{$photo.href}>">
    <img src="<{$photo.img_src}>" alt="<{$photo.title|escape}>" title="<{$photo.title|escape}>" <{$photo.img_attribs}> style="margin:0px;padding:5px;" /></a><br>
<{/foreach}>
