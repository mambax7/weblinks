<{* $Id: weblinks_photo_list.html,v 1.1 2011/12/29 14:32:37 ohwada Exp $ *}>

<table width='100%' cellspacing='0' cellpadding='0' border='0'>
    <{foreach item=photo key=count from=$album_photos name=photo_list}>
    <{* -- table line start -- *}>
    <{if $smarty.foreach.photo_list.iteration mod $album_cols == 1}>
    <tr>
    <{/if}>
    <{* -- table column -- *}>
    <td align='center' style='margin:0px;padding:5px 0px;'>
        <a href="<{$photo.href}>">
            <img src="<{$photo.img_src}>" <{$photo.img_attribs}> alt="<{$photo.title}>" title="<{$photo.title}>" /></a>
    </td>
    <{* -- table line end -- *}>
    <{if ($smarty.foreach.photo_list.iteration is div by $album_cols) || $smarty.foreach.photo_list.last}>
    </tr>
    <{/if}>
    <{/foreach}>
</table>
