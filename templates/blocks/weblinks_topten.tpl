<{* $Id: weblinks_topten.html,v 1.1 2011/12/29 14:32:38 ohwada Exp $ *}>

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
<div class="weblinks_time">execution time <{$execution_time}> sec</div>
<{if $is_module_admin }>
    <a href="./admin/index.php">go to admin cp</a>
    <{/if}>
