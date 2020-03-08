<{* $Id: weblinks_viewfeed.html,v 1.13 2007/11/16 12:07:58 ohwada Exp $ *}>

<{$weblinks_module_header}>

&nbsp;
<a href="<{$xoops_url}>/"><{$lang_home}></a> &gt;&gt;
<{if $keywords != '' }>
<a href="<{$xoops_url}>/modules/<{$dirname}>/index.php?keywords=<{$keywords}>">
    <{else}>
    <a href="<{$xoops_url}>/modules/<{$dirname}>/index.php">
        <{/if}>
        <{$module_name}></a> &gt;&gt;
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

    <{include file="db:system_notification_select.html"}>

    <hr>
    <div class="weblinks_execution_time">execution time : <{$execution_time}> sec</div>
    <{if $is_module_admin }>
    <{if $memory_usage > 0}>
    <div class="weblinks_memory_usage">memory usage : <{$memory_usage}> MB</div>
    <{/if}>
    <a href="<{$xoops_url}>/modules/<{$dirname}>/admin/index.php"><{$lang_goto_admin}></a>
    <{/if}>
