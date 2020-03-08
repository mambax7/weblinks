<{* $Id: weblinks_category_navi.html,v 1.4 2007/11/16 12:07:58 ohwada Exp $ *}>

<table class="weblinks_frame_category">

    <{* -- Start main category loop -- *}>
    <{foreach name=weblinks_main_category item=main from=$main_categories}>

    <{* -- open table row -- *}>
    <{if $category_cols == 1}>
    <tr>
        <{elseif $smarty.foreach.weblinks_main_category.iteration mod $category_cols == 1}>
    <tr>
        <{/if}>

        <{* -- open table column -- *}>
        <td class="weblinks_main_category" width="<{$category_width}>%">

            <{if ($category_image_mode == 1)||($category_image_mode == 2)||($category_image_mode == 3)}>
            <{if $keywords != '' }>
            <a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$main.cid}>&amp;keywords=<{$keywords}>">
                <{else}>
                <a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$main.cid}>">
                    <{/if}>
                    <{if $category_image_mode == 1}>
                    <img src="<{$xoops_url}>/modules/<{$dirname}>/images/dir.gif" border="0" alt="category"/>
                </a> &nbsp;
                <{elseif ($category_image_mode == 2)||($category_image_mode == 3)}>
                <{if $main.imgurl_s }>
                <{if ($main.img_show_width != 0) && ($main.img_show_height != 0)}>
                <img src="<{$main.imgurl_s}>" border="0" width="<{$main.img_show_width}>" height="<{$main.img_show_height}>" alt="category"/>
                <{else}>
                <img src="<{$main.imgurl_s}>" border="0" alt="category image"/>
                <{/if}>
            </a><br>
            <{else}>
            <img src="<{$xoops_url}>/modules/<{$dirname}>/images/dir.gif" border="0" alt="category"/>
            </a>&nbsp;
            <{/if}>
            <{/if}>
            <{/if}>

            <{if $keywords != '' }>
            <a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$main.cid}>&amp;keywords=<{$keywords}>">
                <{else}>
                <a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$main.cid}>">
                    <{/if}>
                    <span class="weblinks_main_category_title"><{$main.title_s}></span>
                </a> (<{$main.link_count}>)
                <br>

                <span class="weblinks_sub_category">

<{* -- Start sub category loop -- *}>
  <{foreach name=weblinks_sub_category item=sub from=$main.sub_categories}>
    <{if $sub.cid > 0}>
      <{if $keywords != '' }>
        <a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$sub.cid}>&amp;keywords=<{$keywords}>">
      <{else}>
        <a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$sub.cid}>">
      <{/if}>
      <{$sub.title_s}></a>
      <{if !$smarty.foreach.weblinks_sub_category.last }>
        ,
      <{/if}>
    <{else}>
      ...
    <{/if}>
  <{/foreach}>
<{* -- End sub category loop -- *}>

  </span>

                <{* -- open table column -- *}>
        </td>

        <{* -- close table row -- *}>
        <{if $category_cols == 1}>
    </tr>
    <{elseif $smarty.foreach.weblinks_main_category.iteration is div by $category_cols}>
    </tr>
    <{/if}>

    <{/foreach}>
    <{* -- End main category loop -- *}>

    <{* -- Start remain category loop -- *}>
    <{section name=weblinks_cols_remainder loop=$cols_remainder}>
    <td class="weblinks_main_category" width="<{$category_width}>">
        &nbsp;
    </td>

    <{* -- close table row -- *}>
    <{if $smarty.section.weblinks_cols_remainder.last}>
    </tr>
    <{/if}>

    <{/section}>
    <{* -- End remain category loop -- *}>

</table>
