<{* $Id: weblinks2_viewcat.html,v 1.1 2007/08/08 04:20:59 ohwada Exp $ *}>

<{$weblinks_module_header}>

&nbsp;
<a href="<{$xoops_url}>/"><{$lang_home}></a>
&gt;&gt;
<a href="<{$xoops_url}>/modules/<{$dirname}>/?keywords=<{$keywords}>"><{$module_name}></a>
&gt;&gt;

<{* -- Start path list -- *}>
<{section name=j loop=$catpath}>
<{if $smarty.section.j.last}>
<span class="weblinks_bold"><{$catpath[j].title_s}></span>
<{else}>
<a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$catpath[j].cid}>&amp;keywords=<{$keywords}>"><{$catpath[j].title_s}></a>
&gt;&gt;
<{/if}>
<{/section}>
<{* -- End path list -- *}>

(<{$category.link_count}>)
<br><br>

<{$weblinks_header}>

<center>
    <{$weblinks_search_form}>
</center>

<{$weblinks_guidance}>
<br><br>

<{if $show_photo_list}>
<br>
<{$weblinks_photo_list}>
<br>
<{/if}>

<{if $show_map_jp}>
<center>
    <{$weblinks_map_jp}>
</center>
<br>
<{/if}>

<{if $show_gm_list}>
<{$weblinks_gm_list}>
<br><br>
<{/if}>

<{if $category_image_mode == 1}>
<a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$category.cid}>&amp;keywords=<{$keywords}>">
    <img src="<{$xoops_url}>/modules/<{$dirname}>/images/folder.gif" border="0" alt="category"/>
</a>
<{elseif ($category_image_mode == 2)||($category_image_mode == 3)}>
<a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$category.cid}>&amp;keywords=<{$keywords}>">
    <{if $category.imgurl_s != ""}>
    <{if ($category.img_show_width != 0) && ($category.img_show_height != 0)}>
    <img src="<{$category.imgurl_s}>" border="0" width="<{$category.img_show_width}>" height="<{$category.img_show_height}>" alt="category"/>
    <{else}>
    <img src="<{$category.imgurl_s}>" border="0" alt="category image"/>
    <{/if}>
    <{else}>
    <img src="<{$xoops_url}>/modules/<{$dirname}>/images/folder.gif" border="0" alt="category image"/>
    <{/if}>
</a>
<{/if}>

<{* -- Start path list -- *}>
<{section name=j loop=$catpath}>
<{if $smarty.section.j.last}>
<span class="weblinks_category_title"><{$catpath[j].title_s}></span>
<{else}>
<a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$catpath[j].cid}>&amp;keywords=<{$keywords}>"><{$catpath[j].title_s}></a>
&gt;&gt;
<{/if}>
<{/section}>
<{* -- End path list -- *}>

(<{$category.link_count}>)
<br>

<{if $show_category_navi}>
<{$weblinks_category_navi}>
<br>
<{/if}>

<{if $show_desc_disp}>
<div class="weblinks_viewcat_desc">
    <{$category.desc_disp}>
</div><br>
<{/if}>

<hr>

<{if $show_links}>
<{if $show_navi}>
<div class="weblinks_pagenavi">
    <{$lang_sortby}>&nbsp;&nbsp;
    <{$lang_title}> (<a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$category.cid}>&amp;sortid=0&amp;keywords=<{$keywords}>">
    <img src="<{$xoops_url}>/modules/<{$dirname}>/images/up.gif" border="0" align="middle" alt="<{$lang_sort_0}>"/></a>
    <a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$category.cid}>&amp;sortid=1&amp;keywords=<{$keywords}>">
        <img src="<{$xoops_url}>/modules/<{$dirname}>/images/down.gif" border="0" align="middle" alt="<{$lang_sort_1}>"/></a>)
    <{$lang_date}> (<a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$category.cid}>&amp;sortid=2&amp;keywords=<{$keywords}>">
    <img src="images/up.gif" border="0" align="middle" alt="<{$lang_sort_2}>"/></a>
    <a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$category.cid}>&amp;sortid=3&amp;keywords=<{$keywords}>">
        <img src="<{$xoops_url}>/modules/<{$dirname}>/images/down.gif" border="0" align="middle" alt="<{$lang_sort_3}>"/></a>)
    <{$lang_rating}> (<a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$category.cid}>&amp;sortid=4&amp;keywords=<{$keywords}>">
    <img src="<{$xoops_url}>/modules/<{$dirname}>/images/up.gif" border="0" align="middle" alt="<{$lang_sort_4}>"/></a>
    <a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$category.cid}>&amp;sortid=5&amp;keywords=<{$keywords}>">
        <img src="<{$xoops_url}>/modules/<{$dirname}>/images/down.gif" border="0" align="middle" alt="<{$lang_sort_5}>"/></a>)
    <{$lang_popularity}> (<a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$category.cid}>&amp;sortid=6&amp;keywords=<{$keywords}>">
    <img src="<{$xoops_url}>/modules/<{$dirname}>/images/up.gif" border="0" align="middle" alt="<{$lang_sort_6}>"/></a>
    <a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$category.cid}>&amp;sortid=7&amp;keywords=<{$keywords}>">
        <img src="<{$xoops_url}>/modules/<{$dirname}>/images/down.gif" border="0" align="middle" alt="<{$lang_sort_7}>"/></a>) <br>
    <b><{$lang_cursortedby}></b>
</div>
<hr>
<{/if}>
<br>

<div class="weblinks_viewcat_frame">
    <{$weblinks_links_full}>
</div><br>

<div class="weblinks_pagenavi">
    <{$page_navi}>
</div>

<{elseif $show_linklist}>
<h4><{$lang_latestlistings}></h4>

<div class="weblinks_viewcat_frame">
    <{$weblinks_links_list}>
</div>

<{else}>

<span class="weblinks_error"><{$lang_nomatch}></span>
<hr>

<{/if}>

<{if $show_forum_list}>
<br>
<span class="weblinks_subtitle"><{$lang_latest_forum}></span><br><br>
<div class="weblinks_viewcat_frame">
    <{$weblinks_forum_list}>
</div>
<{/if}>

<{include file="db:system_notification_select.tpl"}>

<hr>
<div class="weblinks_time">execution time <{$execution_time}> sec</div>
<{if $is_module_admin }>
<a href="./admin/index.php">go to admin cp</a>
<{/if}>
