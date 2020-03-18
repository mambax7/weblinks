<{* $Id: weblinks_catlist.html,v 1.1 2012/04/09 10:21:09 ohwada Exp $ *}>

<{$weblinks_module_header}>

&nbsp;
<a href="<{$xoops_url}>/"><{$lang_home}></a> &gt;&gt;
<{if $keywords != '' }>
<a href="<{$xoops_url}>/modules/<{$dirname}>/index.php?keywords=<{$keywords}>">
    <{else}>
    <a href="<{$xoops_url}>/modules/<{$dirname}>/index.php">
        <{/if}>
        <{$module_name}></a> &gt;&gt;
    <span class="weblinks_bold"><{$lang_catlist}></span>
    <br><br>

    <{$weblinks_header}>
    <{$weblinks_search_form}>
    <{$weblinks_guidance}>

    <{* -- Start category loop -- *}>
    <div class="weblinks_catlist_frame">
        <{foreach item=category from=$categories}>
        <{if $keywords != '' }>
        <a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$category.cid}>&amp;keywords=<{$keywords}>">
            <{else}>
            <a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$category.cid}>">
                <{/if}>
                <{$category.path}></a>&nbsp;(<{$category.count}>)<br>
            <{/foreach}>
    </div>
    <{* -- End category loop -- *}>

    <hr/>
    <div class="weblinks_execution_time"><{$smarty.const._WEBLINKS_EXECUTION_TIME}> : <{$execution_time}> <{$smarty.const._WEBLINKS_SEC}></div>
    <{if $is_module_admin }>
    <{if $memory_usage > 0}>
    <div class="weblinks_memory_usage"><{$smarty.const._WEBLINKS_MEMORY_USAGE}> : <{$memory_usage}> <{$smarty.const._WEBLINKS_MB}></div>
    <{/if}>
    <a href="<{$xoops_url}>/modules/<{$dirname}>/admin/index.php"><{$lang_goto_admin}></a>
    <{/if}>