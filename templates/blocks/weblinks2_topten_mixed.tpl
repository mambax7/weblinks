<{* $Id: weblinks2_topten_mixed.html,v 1.1 2011/12/29 14:32:40 ohwada Exp $ *}>

<{$weblinks_module_header}>

&nbsp;
<a href="<{$xoops_url}>/"><{$lang_home}></a>
&gt;&gt;
<a href="<{$xoops_url}>/modules/<{$dirname}>/?keywords=<{$keywords}>"><{$module_name}></a>
&gt;&gt;
<span class="weblinks_bold"><{$lang_topten_title}></span>
<br><br>

<{$weblinks_header}>

<center>
    <{$weblinks_search_form}>
</center>

<{$weblinks_guidance}>

<{$weblinks_links_list}>

<hr/>
<div class="weblinks_time">execution time <{$execution_time}> sec</div>
<{if $is_module_admin }>
    <a href="./admin/index.php">go to admin cp</a>
    <{/if}>
