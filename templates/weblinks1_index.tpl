<{* $Id: weblinks1_index.html,v 1.2 2012/04/09 10:20:06 ohwada Exp $ *}>

<{if $show_webmap}>
<script type="text/javascript">
    //<![CDATA[
    window.onload =
    <
    {
        $webmap_func
    }
    >
    ;
    //]]>
</script>
<{/if}>

<{$weblinks_module_header}>

&nbsp;
<a href="<{$xoops_url}>/"><{$lang_home}></a> &gt;&gt;
<{if $keywords != '' }>
<a href="<{$xoops_url}>/modules/<{$dirname}>/index.php?keywords=<{$keywords}>">
    <{else}>
    <a href="<{$xoops_url}>/modules/<{$dirname}>/index.php">
        <{/if}>
        <{$module_name}></a> &gt;&gt;
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

    <{if $show_webmap}>
    <div id="<{$webmap_div_id}>" class="weblinks_gm_map_index">Loading ...</div>
    <br>
    <{/if}>

    <span class="weblinks_bold"><{$lang_main}></span><br>
    <{if $show_links_list }>
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

    <{if $is_module_admin && $show_admin_waiting_list }>
    <span class="weblinks_subtitle"><{$lang_admin_waiting_list}></span><br>
    <{* -- Start admin_waiting_list loop -- *}>
    <ul>
        <{foreach item=list from=$admin_waiting_list}>
        <li><a href="<{$list.adminlink}>"><{$list.lang_linkname}></a>
            <{if $list.pendingnum}>
            (<span class="weblinks_waiting_highlight"><{$list.pendingnum}></span>)
            <{else}>
            (<{$list.pendingnum}>)
            <{/if}>
        </li>
        <{/foreach}>
    </ul>
    <{* -- End admin_waiting_list loop -- *}>
    <br>
    <{/if}>

    <{if $show_user_waiting_list }>
    <span class="weblinks_subtitle"><{$lang_user_waiting_list}></span><br>
    <{* -- Start user_waiting_list loop -- *}>
    <ul>
        <{foreach item=list from=$user_waiting_list}>
        <li>
            <{if (($list.mode == 1)||($list.mode == 2)) }>
            <a href="<{$xoops_url}>/modules/<{$dirname}>/singlelink.php?lid=<{$list.lid}>">
                <img src="<{$xoops_url}>/modules/<{$dirname}>/images/link.gif" border="0"/>
            </a>
            <{/if}>
            <{if $list.url != "" }>
            <a href="<{$list.url}>">
                <{/if}>
                <{$list.title}>
                <{if $list.url != "" }>
            </a>
            <{/if}>
            <{if $list.mode == 1 }>
            (<{$lang_modreqs}>)
            <{elseif $list.mode == 2 }>
            (<{$lang_delreqs}>)
            <{else}>
            (<{$lang_waitings}>)
            <{/if}>
        </li>
        <{/foreach}>
    </ul>
    <{* -- End user_waiting_list loop -- *}>
    <br>
    <{/if}>

    <{if $show_user_owner_list }>
    <span class="weblinks_subtitle"><{$lang_user_owner_list}></span><br>
    <{* -- Start user_owner_list loop -- *}>
    <ul>
        <{foreach item=list from=$user_owner_list}>
        <li>
            <a href="<{$xoops_url}>/modules/<{$dirname}>/singlelink.php?lid=<{$list.lid}>">
                <{$list.title}>
            </a>
            <{if $list.warn_time_publish }>
            (<{$lang_warn_time_publish}>)
            <{/if}>
            <{if $list.warn_time_expire }>
            (<{$lang_warn_time_expire}>)
            <{/if}>
            <{if $list.warn_broken }>
            (<{$lang_warn_broken}>)
            <{/if}>
        </li>
        <{/foreach}>
    </ul>
    <{* -- End user_waiting_list loop -- *}>
    <br>
    <{/if}>

    <br>
    <a name='new_sitelist'></a>

    <{if $show_links_list }>
    <span class="weblinks_subtitle"><{$lang_new_sitelist}></span><br>
    <{$weblinks_links_list}>
    <br>
    <{/if}>

    <a name='new_atomfeed'></a>

    <{if $show_new_atomfeed }>
    <span class="weblinks_subtitle"><{$lang_new_atomfeed}></span><br>
    <{if $keywords != '' }>
    <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=rss&amp;keywords=<{$keywords}>">
        <{else}>
        <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=rss">
            <{/if}>
            <{$lang_site_rss}></a> (<{$total_site_rss}>) <br>
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

        <{include file="db:system_notification_select.html"}>

        <br>

        <hr>
        <noscript>
            <div class="weblinks_error"><{$lang_js_invalid}></div>
        </noscript>

        <div class="weblinks_execution_time">execution time : <{$execution_time}> sec</div>
        <{if $is_module_admin && ($memory_usage > 0)}>
        <div class="weblinks_memory_usage">memory usage : <{$memory_usage}> MB</div>
        <{/if}>

        <{* this is NOT copyright. you can remove this. *}>
        <div class="weblinks_powered">
            <a href="<{$happy_linux_url}>" target="_blank">Powered by Happy Linux</a>
        </div>

        <{if $is_module_admin }>
        <a href="<{$xoops_url}>/modules/<{$dirname}>/admin/index.php"><{$lang_goto_admin}></a>
        <{/if}>
