<{* $Id: weblinks_catlist.html,v 1.1 2012/04/09 10:22:24 ohwada Exp $ *}>

<{$weblinks_module_header}>

&nbsp;
<a href="<{$xoops_url}>/"><{$lang_home}></a>
&gt;&gt;
<a href="<{$xoops_url}>/modules/<{$dirname}>/?keywords=<{$keywords}>"><{$module_name}></a>
&gt;&gt;
<span class="weblinks_bold"><{$lang_catlist}></span>
<br><br>

<{$weblinks_header}>
<{$weblinks_search_form}>
<{$weblinks_guidance}>

<{* -- Start category loop -- *}>
<div class="weblinks_catlist_frame">
    <{foreach item=category from=$categories}>
    <a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$category.cid}>&amp;keywords=<{$keywords}>"><{$category.path}></a>&nbsp;(<{$category.count}>)<br>
    <{/foreach}>
</div>
<{* -- End category loop -- *}>

<hr/>
<div class="weblinks_time"><{$smarty.const._WEBLINKS_EXECUTION_TIME}> <{$execution_time}> <{$smarty.const._WEBLINKS_SEC}></div>
<{if $is_module_admin }>
    <a href="./admin/index.php"><{$lang_goto_admin}></a>
    <{/if}>
