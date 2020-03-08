<{* $Id: weblinks1_viewfeed.html,v 1.1 2007/08/08 04:20:58 ohwada Exp $ *}>

<{$weblinks_module_header}>

&nbsp;
<a href="<{$xoops_url}>/"><{$lang_home}></a>
&gt;&gt;
<a href="<{$xoops_url}>/modules/<{$dirname}>/"><{$module_name}></a>
&gt;&gt;
<span class="weblinks_bold"><{$lang_atomfeed}></span> (<{$total_atomfeed}>) <br>
<br><br>

<{$weblinks_header}>

<center>
    <{$weblinks_search_form}>
</center>

<{$weblinks_guidance}>

<{$lang_atomfeed_distribute}><br>
<{$lang_atomfeed_firefox}><br>
<br>
<a href="<{$xoops_url}>/modules/<{$dirname}>/feed_rdf.php" target="_blank">
    <img src="<{$xoops_url}>/modules/<{$dirname}>/images/rdf.png" border="0" alt="rdf"/></a>&nbsp;
<a href="<{$xoops_url}>/modules/<{$dirname}>/feed_rss.php" target="_blank">
    <img src="<{$xoops_url}>/modules/<{$dirname}>/images/rss.png" border="0" alt="rss"/></a>&nbsp;
<a href="<{$xoops_url}>/modules/<{$dirname}>/feed_atom.php" target="_blank">
    <img src="<{$xoops_url}>/modules/<{$dirname}>/images/atom.png" border="0" alt="atom"/></a>&nbsp;
<br><br>

<{if $show_feeds == true}>

<{* -- feed full list begin -- *}>
<{foreach item=feed from=$feeds}>
<div class="weblinks_viewfeed_frame_feed">
    <div class="weblinks_feed_frame_title">
        <a href="<{$feed.link}>" target="_blank"><span class="weblinks_feed_title"><{$feed.title}></span></a><br>
        &nbsp; from <a href="<{$feed.site_link}>" target="_blank"><{$feed.site_title}></a>&nbsp;
        <{if $feed.updated_long != ""}>
        (<{$feed.updated_long}>)&nbsp;
        <{/if}>
    </div>
    <div class="weblinks_feed_frame_content">
        <{if $feed.content != ""}>
        <{$feed.content}>
        <{/if}>
    </div>
</div>
<{/foreach}>
<br>
<{* -- feed full list end -- *}>

<br><br>

<div class="weblinks_pagenavi">
    <{$page_navi}>
</div>

<{else}>

<hr>
<span class="weblinks_error"><{$lang_nomatch}></span>
<hr>

<{/if}>

<{include file="db:system_notification_select.tpl"}>

<hr>
<div class="weblinks_time">execution time <{$execution_time}> sec</div>
<{if $is_module_admin }>
<a href="./admin/index.php">go to admin cp</a>
<{/if}>
