<{* $Id: weblinks1_index.html,v 1.1 2007/08/08 04:20:58 ohwada Exp $ *}>

<{$weblinks_module_header}>

&nbsp;
<a href="<{$xoops_url}>/"><{$lang_home}></a>
&gt;&gt;
<a href="<{$xoops_url}>/modules/<{$dirname}>/?keywords=<{$keywords}>"><{$module_name}></a>
&gt;&gt;
<span class="weblinks_bold"><{$lang_main}></span>
<br><br>

<{$weblinks_header}>

<center>
    <{$weblinks_search_form}>
</center>

<{$weblinks_guidance}>

<{if $show_map_jp}>
<center>
    <{$weblinks_map_jp}>
</center>
<br>
<{/if}>

<{* google map : hacked by wye *}>
<{if $show_gm_list}>
<{$weblinks_gm_list}><br>
<{/if}>

<span class="weblinks_bold"><{$lang_main}></span><br>
<{if $show_links_list != ""}>
- <a href="<{$xoops_url}>/modules/<{$dirname}>/index.php#new_sitelist"><{$lang_new_sitelist}></a><br>
<{/if}>
<{if $show_new_atomfeed }>
- <a href="<{$xoops_url}>/modules/<{$dirname}>/index.php#new_atomfeed"><{$lang_new_atomfeed}></a><br>
<{/if}>
<br>

<{if $show_category_navi}>
<{$weblinks_category_navi}>
<br><br>
<{/if}>

<{$lang_thereare}><br>
<hr>

<br>
<a name='new_sitelist'></a>

<{if $show_links_list != ""}>
<span class="weblinks_subtitle"><{$lang_new_sitelist}></span><br>
<{$weblinks_links_list}>
<br>
<{/if}>

<a name='new_atomfeed'></a>

<{if $show_new_atomfeed }>
<span class="weblinks_subtitle"><{$lang_new_atomfeed}></span><br>

<a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=rss&amp;keywords=<{$keywords}>"><{$lang_site_rss}></a>
(<{$total_site_rss}>) <br>
<a href="<{$xoops_url}>/modules/<{$dirname}>/viewfeed.php"><{$lang_atomfeed}></a>
(<{$total_atomfeed}>) <br>
<a href="<{$xoops_url}>/modules/<{$dirname}>/feed_rdf.php" target='_blank'>
    <img src="<{$xoops_url}>/modules/<{$dirname}>/images/rdf.png" border="0" alt="rdf"/></a>&nbsp;
<a href="<{$xoops_url}>/modules/<{$dirname}>/feed_rss.php" target='_blank'>
    <img src="<{$xoops_url}>/modules/<{$dirname}>/images/rss.png" border="0" alt="rss"/></a>&nbsp;
<a href="<{$xoops_url}>/modules/<{$dirname}>/feed_atom.php" target='_blank'>
    <img src="<{$xoops_url}>/modules/<{$dirname}>/images/atom.png" border="0" alt="atom"/></a>&nbsp;
<br><br>

<{* -- feed list begin -- *}>
<{if $show_feeds_list }>
<{foreach item=feed from=$feeds}>
<div class="weblinks_index_frame_feed">
    <div class="weblinks_feed_frame_title">
        <a href="<{$feed.link}>" target="_blank"><span class="weblinks_feed_title"><{$feed.title}></span></a><br>
        &nbsp; from <a href="<{$feed.site_link}>" target="_blank"><{$feed.site_title}></a>&nbsp;
        <{if $feed.updated_short != ""}>
        (<{$feed.updated_short}>)&nbsp;
        <{/if}>
    </div>
    <div class="weblinks_feed_frame_summary">
        <{if $feed.summary != ""}>
        <{$feed.summary}>
        <{/if}>
    </div>
</div>
<{/foreach}>
<br>
<{/if}>
<{* -- feed list end -- *}>

<{/if}>

<{include file="db:system_notification_select.tpl"}>

<br>

<hr>
<noscript>
    <div class="weblinks_error"><{$lang_js_invalid}></div>
</noscript>
<div class="weblinks_time">execution time <{$execution_time}> sec</div>
<div class="weblinks_powered">
    <a href="<{$happy_linux_url}>" target="_blank">
        Powered by Happy Linux
    </a>
</div>
<{if $is_module_admin }>
<a href="./admin/index.php">go to admin cp</a>
<{/if}>
