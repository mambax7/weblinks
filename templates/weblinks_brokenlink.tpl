<{* $Id: weblinks_brokenlink.html,v 1.1 2011/12/29 14:32:35 ohwada Exp $ *}>

<{$weblinks_module_header}>

&nbsp;
<a href="<{$xoops_url}>/"><{$lang_home}></a>
&gt;&gt;
<a href="<{$xoops_url}>/modules/<{$dirname}>/"><{$module_name}></a>
&gt;&gt;
<a href="<{$xoops_url}>/modules/<{$dirname}>/singlelink.php?lid=<{$link_id}>"><{$link_title}></a>
&gt;&gt;
<span class="weblinks_bold"><{$lang_reportbroken}></span>
<br><br>

<div class="weblinks_brokenlink_frame">
    <ul>
        <li><{$lang_thanksforhelp}></li>
        <li><{$lang_forsecurity}><br></li>
    </ul>

    <div class="weblinks_brokenlink_form">
        <form action="<{$xoops_url}>/modules/<{$dirname}>/brokenlink.php" method="post">
            <input type="hidden" name="lid" value="<{$link_id}>"/>
            <input type="hidden" name="<{$token_name}>" value="<{$token_value}>"/>
            <input type="submit" name="submit" value="<{$lang_reportbroken}>"/>&nbsp;
            <input type="button" value="<{$lang_cancel}>" onclick="javascript:history.go(-1)"/>
        </form>
    </div>

</div>
