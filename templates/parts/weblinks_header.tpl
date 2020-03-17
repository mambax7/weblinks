<{* $Id: weblinks_header.html,v 1.1 2011/12/29 14:32:37 ohwada Exp $ *}>

<{if $logoshow == 1}>
    <div class="weblinks_logo">
        <{if $keywords != '' }>
        <a href="<{$xoops_url}>/modules/<{$dirname}>/index.php?keywords=<{$keywords}>">
            <{else}>
            <a href="<{$xoops_url}>/modules/<{$dirname}>/index.php">
                <{/if}>
                <img src="<{$xoops_url}>/modules/<{$dirname}>/images/logo.gif" alt="logo"/></a>
    </div><br>
    <{/if}>

<{if $titleshow == 1}>
    <div class="weblinks_modulename"><{$module_name}></div><br>
    <{/if}>

<{if $index_desc != ''}>
    <{$index_desc}>
    <{/if}>
