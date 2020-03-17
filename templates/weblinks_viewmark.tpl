<{* $Id: weblinks_viewmark.html,v 1.1 2011/12/29 14:32:36 ohwada Exp $ *}>

<{$weblinks_module_header}>

&nbsp;
<a href="<{$xoops_url}>/"><{$lang_home}></a> &gt;&gt;
<{if $keywords != '' }>
<a href="<{$xoops_url}>/modules/<{$dirname}>/index.php?keywords=<{$keywords}>">
    <{else}>
    <a href="<{$xoops_url}>/modules/<{$dirname}>/index.php">
        <{/if}>
        <{$module_name}></a> &gt;&gt;
    <span class="weblinks_bold"><{$lang_mark_title}></span> (<{$mark_total}>)
    <br><br>

    <{$weblinks_header}>

    <center>
        <{$weblinks_search_form}>
    </center>

    <{$weblinks_guidance}>

    <{if $show_links == true}>
    <{if $show_navi == true}>
    <div class="weblinks_pagenavi">
        <{$lang_sortby}>&nbsp;&nbsp;
        <{$lang_title}> (
        <{if $keywords != '' }>
        <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=<{$mark}>&amp;sortid=0&amp;keywords=<{$keywords}>">
            <{else}>
            <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=<{$mark}>&amp;sortid=0">
                <{/if}>
                <img src="<{$xoops_url}>/modules/<{$dirname}>/images/up.gif" border="0" align="middle" alt="<{$lang_sort_0}>"/></a>
            <{if $keywords != '' }>
            <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=<{$mark}>&amp;sortid=1&amp;keywords=<{$keywords}>">
                <{else}>
                <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=<{$mark}>&amp;sortid=1">
                    <{/if}>
                    <img src="<{$xoops_url}>/modules/<{$dirname}>/images/down.gif" border="0" align="middle" alt="<{$lang_sort_1}>"/></a>)
                <{$lang_date}> (
                <{if $keywords != '' }>
                <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=<{$mark}>&amp;sortid=2&amp;keywords=<{$keywords}>">
                    <{else}>
                    <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=<{$mark}>&amp;sortid=2">
                        <{/if}>
                        <img src="images/up.gif" border="0" align="middle" alt="<{$lang_sort_2}>"/></a>
                    <{if $keywords != '' }>
                    <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=<{$mark}>&amp;sortid=3&amp;keywords=<{$keywords}>">
                        <{else}>
                        <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=<{$mark}>&amp;sortid=3">
                            <{/if}>
                            <img src="images/down.gif" border="0" align="middle" alt="<{$lang_sort_3}>"/></a>)
                        <{$lang_rating}> (
                        <{if $keywords != '' }>
                        <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=<{$mark}>&amp;sortid=4&amp;keywords=<{$keywords}>">
                            <{else}>
                            <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=<{$mark}>&amp;sortid=4">
                                <{/if}>
                                <img src="<{$xoops_url}>/modules/<{$dirname}>/images/up.gif" border="0" align="middle" alt="<{$lang_sort_4}>"/></a>
                            <{if $keywords != '' }>
                            <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=<{$mark}>&amp;sortid=5&amp;keywords=<{$keywords}>">
                                <{else}>
                                <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=<{$mark}>&amp;sortid=5">
                                    <{/if}>
                                    <img src="<{$xoops_url}>/modules/<{$dirname}>/images/down.gif" border="0" align="middle" alt="<{$lang_sort_5}>"/></a>)
                                <{$lang_popularity}> (
                                <{if $keywords != '' }>
                                <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=<{$mark}>&amp;sortid=6&amp;keywords=<{$keywords}>">
                                    <{else}>
                                    <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=<{$mark}>&amp;sortid=6">
                                        <{/if}>
                                        <img src="<{$xoops_url}>/modules/<{$dirname}>/images/up.gif" border="0" align="middle" alt="<{$lang_sort_6}>"/></a>
                                    <{if $keywords != '' }>
                                    <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=<{$mark}>&amp;sortid=7&amp;keywords=<{$keywords}>">
                                        <{else}>
                                        <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=<{$mark}>&amp;sortid=7">
                                            <{/if}>
                                            <img src="<{$xoops_url}>/modules/<{$dirname}>/images/down.gif" border="0" align="middle" alt="<{$lang_sort_7}>"/></a>) <br>
                                        <span class="weblinks_bold"><{$lang_cursortedby}></span>
    </div>
<hr/>
    <{/if}>
<br>

    <div class="weblinks_viewcat_frame">
        <{$weblinks_links_full}>
    </div><br>

    <div class="weblinks_pagenavi">
        <{$page_navi}>
    </div>

    <{else}>

    <span class="weblinks_error"><{$lang_nomatch}></span>
<hr/>

    <{/if}>

    <{if $show_kml_list}>
    <{* -- Start kml loop -- *}>
    <div class="weblinks_viewmark_kml_frame">
        <img src="<{$xoops_url}>/modules/<{$dirname}>/images/google_earth.png" border="0" alt="Google Earth"/>
        <span class="weblinks_viewmark_kml_title"><{$lang_kml_list}></span>
        <br><br>
        <{$lang_kml_list_desc}><br>
        <{$lang_thereare}><br>
        <br>
        <form method="get">
            <{$lang_kml_perpage}>
            <input type="text" name="kml_perpage" value="<{$kml_perpage}>"/>
            <input type="submit" name="submit" value="<{$lang_execute}>"/>
            <input type="hidden" name="mark" value="<{$mark}>"/>
        </form>
        <br>
        <{foreach item=kml from=$kml_list}>
        <a href="<{$xoops_url}>/modules/<{$dirname}>/kml/kml.php?page=<{$kml.page}>&amp;limit=<{$kml_perpage}>" target="_blank">
            [file <{$kml.page}>]</a>
        <{/foreach}>
    </div>
<br>
    <{* -- End kml loop -- *}>
    <{/if}>

    <{include file="db:system_notification_select.html"}>

    <hr/>
    <div class="weblinks_execution_time">execution time : <{$execution_time}> sec</div>
    <{if $is_module_admin }>
    <{if $memory_usage > 0}>
    <div class="weblinks_memory_usage">memory usage : <{$memory_usage}> MB</div>
    <{/if}>
    <a href="<{$xoops_url}>/modules/<{$dirname}>/admin/index.php"><{$lang_goto_admin}></a>
    <{/if}>
