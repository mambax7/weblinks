<{* $Id: weblinks_topten.html,v 1.1 2012/04/09 10:21:09 ohwada Exp $ *}>

<{$weblinks_module_header}>

&nbsp;
<a href="<{$xoops_url}>/"><{$lang_home}></a> &gt;&gt;
<{if $keywords != '' }>
<a href="<{$xoops_url}>/modules/<{$dirname}>/index.php?keywords=<{$keywords}>">
    <{else}>
    <a href="<{$xoops_url}>/modules/<{$dirname}>/index.php">
        <{/if}>
        <{$module_name}></a> &gt;&gt;
    <span class="weblinks_bold"><{$lang_topten_title}></span>
    <br><br>

    <{$weblinks_header}>

    <center>
        <{$weblinks_search_form}>
    </center>

    <{$weblinks_guidance}>

    <{if $lang_topten_error }>
    <span class="weblinks_error"><{$lang_topten_error}></span><br><br>
    <{/if}>

    <ul>
        <{foreach item=top from=$rankings}>
        <li><a href="#<{$top.cid}>"><{$top.title}></a></li>
        <{/foreach}>
    </ul>
    <br>

    <{* -- Start ranking loop -- *}>
    <{foreach item=ranking from=$rankings}>
    <a name="<{$ranking.cid}>"></a>
    <div class="weblinks_topten_frame">
        <{$ranking.title}> (<{$lang_sortby}>)
    </div>

    <{$ranking.links_list}>
<br>
    <{/foreach}>
    <{* -- End ranking loop -- *}>

    <hr/>
    <div class="weblinks_execution_time"><{$smarty.const._WEBLINKS_EXECUTION_TIME}> : <{$execution_time}> <{$smarty.const._WEBLINKS_SEC}></div>
    <{if $is_module_admin }>
    <{if $memory_usage > 0}>
    <div class="weblinks_memory_usage"><{$smarty.const._WEBLINKS_MEMORY_USAGE}> : <{$memory_usage}> <{$smarty.const._WEBLINKS_MB}></div>
    <{/if}>
    <a href="<{$xoops_url}>/modules/<{$dirname}>/admin/index.php"><{$lang_goto_admin}></a>
    <{/if}>
