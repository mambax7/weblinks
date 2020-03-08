<{* $Id: weblinks2_singlelink.html,v 1.2 2012/04/09 10:20:06 ohwada Exp $ *}>

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
    <span class="weblinks_bold"><{$link.title_s}></span>
    <br><br>

    <{$weblinks_header}>

    <center>
        <{$weblinks_search_form}>
    </center>

    <{$weblinks_guidance}>

    <{if $show_photo_list}>
    <br>
    <{$weblinks_photo_list}>
    <br>
    <{/if}>

    <{if $show_webmap}>
    <div id="<{$webmap_div_id}>" class="weblinks_gm_map_singlelink">Loading ...</div>
    <br>
    <div class="weblinks_gm_location">
        <a href="https://maps.google.com/maps?hl=<{$xoops_langcode}>&amp;q=<{$link.gm_latitude}>,+<{$link.gm_longitude}>&amp;z=<{$link.gm_zoom}>" target="_blank">
            <img src="<{$xoops_url}>/modules/<{$dirname}>/images/google_maps.gif" border="0" alt="google map"/> </a>
        <{$lang_gm_latitude}> : <{$link.gm_latitude}> / <{$lang_gm_longitude}> : <{$link.gm_longitude}> / <{$lang_gm_zoom}> : <{$link.gm_zoom}>
    </div>
    <br>
    <{/if}>

    <{if $link.warn_time_publish}>
    <span class="weblinks_waning"><{$lang_warn_time_publish}></span> :
    <{$link.time_publish_long}><br>
    <{/if}>

    <{if $link.warn_time_expire}>
    <span class="weblinks_waning"><{$lang_warn_time_expire}></span> :
    <{$link.time_expire_long}><br>
    <{/if}>

    <{if $link.warn_broken}>
    <span class="weblinks_waning"><{$lang_warn_broken}></span> :
    <{$lang_broken_counter}> = <{$link.broken}><br>
    <{/if}>
    <br>

    <div class="weblinks_singlelink_frame">

        <{* -- Start path loop -- *}>
        <{section name=i loop=$catpaths}>
        <{if $keywords != '' }>
        <a href="<{$xoops_url}>/modules/<{$dirname}>/index.php?keywords=<{$keywords}>">
            <{else}>
            <a href="<{$xoops_url}>/modules/<{$dirname}>/index.php">
                <{/if}>
                <{$lang_main}></a>
            <img src="<{$xoops_url}>/modules/<{$dirname}>/images/arrow1.gif" border="0" alt="arrow"/>&nbsp;
            <{section name=j loop=$catpaths[i]}>
            <{if $keywords != '' }>
            <a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$catpaths[i][j].cid}>&amp;keywords=<{$keywords}>">
                <{else}>
                <a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$catpaths[i][j].cid}>">
                    <{/if}>
                    <{$catpaths[i][j].title_s}></a>
                <{if $smarty.section.j.last == false}>
                &nbsp;<img src="<{$xoops_url}>/modules/<{$dirname}>/images/arrow2.gif" border="0" alt="arrow"/>&nbsp;
                <{/if}>
                <{/section}>
                <br>
                <{/section}>
                <{* -- End path loop -- *}>

    </div>
    <br>

    <div class="weblinks_singlelink_frame">
        <{$weblinks_link_single}>
    </div>
    <br>

    <{if $link.textarea1_disp}>
    <div class="weblinks_singlelink_textarea1">
        <span class="weblinks_bold"><{$lang_link_textarea1}></span><br>
        <{$link.textarea1_disp}>
    </div>
    <br>
    <{/if}>

    <{if $link.textarea2_disp}>
    <div class="weblinks_singlelink_textarea2">
        <span class="weblinks_bold"><{$lang_link_textarea2}></span><br>
        <{$link.textarea2_disp}>
    </div>
    <br>
    <{/if}>

    <a name="rss"></a>

    <{if $rss_flag == 1}>
    <span class="weblinks_bold">RDF feed</span>&nbsp;&nbsp;
    <a href="<{$rss_url}>" target="_blank">
        <img src="<{$xoops_url}>/modules/<{$dirname}>/images/rdf.png" border="0" alt="rdf"/></a>&nbsp;
    <{elseif $rss_flag == 2}>
    <span class="weblinks_bold">RSS feed</span>&nbsp;&nbsp;
    <a href="<{$rss_url}>" target="_blank">
        <img src="<{$xoops_url}>/modules/<{$dirname}>/images/rss.png" border="0" alt="rss"/></a>&nbsp;
    <{elseif $rss_flag == 3}>
    <span class="weblinks_bold">ATOM feed</span>&nbsp;&nbsp;
    <a href="<{$rss_url}>" target="_blank">
        <img src="<{$xoops_url}>/modules/<{$dirname}>/images/atom.png" border="0" alt="atom"/></a>&nbsp;
    <{/if}>

    <{if ($rss_flag == 1) || ($rss_flag == 2) || ($rss_flag == 3) }>
    <{$lang_lastupdate}>&nbsp;<{$rss_update}>
    <br><br>

    <{* -- feed list begin -- *}>
    <div class="weblinks_singlelink_frame_feed">
        <{if $rss_show}>
        <{foreach name=weblinks_single_feed item=feed from=$feeds}>
        <div class="weblinks_feed_frame_title">
            <a href="<{$feed.link}>" target="_blank"><span class="weblinks_feed_title"><{$feed.title}></span></a><br>
            &nbsp; from <a href="<{$feed.site_link}>" target="_blank"><{$feed.site_title}></a>&nbsp;
            <{if $feed.updated_long}>
            (<{$feed.updated_long}>)&nbsp;
            <{/if}>
        </div>
        <{if $smarty.foreach.weblinks_single_feed.iteration <= $rss_num_content}>
        <div class="weblinks_feed_frame_content">
            <{if $feed.content}>
            <{$feed.content}>
            <{/if}>
        </div>
        <{else}>
        <div class="weblinks_feed_frame_summary">
            <{if $feed.summary}>
            <{$feed.summary}>
            <{/if}>
        </div>
        <{/if}>
        <{/foreach}>
        <{else}>
        <span class="weblinks_blue">No Feed</span>
        <{/if}>
    </div>
    <br>
    <{* -- feed list end -- *}>

    <{/if}>

    <a name="comment"></a>

    <{if $show_forum_list}>
    <br>
    <span class="weblinks_subtitle"><{$lang_latest_forum}></span><br><br>
    <div class="weblinks_viewcat_frame">
        <{$weblinks_forum_list}>
    </div>
    <{/if}>

    <{$d3forum_comment}>

    <{if $show_comment}>
    <div class="weblinks_comment_navi">
        <{$commentsnav}>
        <{$lang_notice}>
    </div>

    <{* -- start comments -- *}>
    <div class="weblinks_frame_comment">
        <{if $comment_mode == "flat"}>
        <{include file="db:system_comments_flat.tpl"}>
        <{elseif $comment_mode == "thread"}>
        <{include file="db:system_comments_thread.tpl"}>
        <{elseif $comment_mode == "nest"}>
        <{include file="db:system_comments_nest.tpl"}>
        <{/if}>
    </div>
    <{* -- end comments -- *}>

    <{include file="db:system_notification_select.tpl"}>
    <{/if}>

    <hr>
    <div class="weblinks_execution_time">execution time : <{$execution_time}> sec</div>
    <{if $is_module_admin }>
    <{if $memory_usage > 0}>
    <div class="weblinks_memory_usage">memory usage : <{$memory_usage}> MB</div>
    <{/if}>
    <a href="<{$xoops_url}>/modules/<{$dirname}>/admin/index.php"><{$lang_goto_admin}></a>
    <{/if}>
