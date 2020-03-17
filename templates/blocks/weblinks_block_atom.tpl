<{* $Id: weblinks_block_atom.html,v 1.1 2011/12/29 14:32:39 ohwada Exp $ *}>

<ul>
    <{foreach item=feed from=$block.feeds}>
    <li>
        <a href="<{$feed.url}>" target="_blank"><{$feed.title}></a>&nbsp;

        <{if $feed.date != ""}>
        (<{$feed.date}>)&nbsp;
        <{/if}>

        <br>
        &nbsp; from <a href="<{$feed.site_url}>" target="_blank"><{$feed.site_title}></a>

        <{if $feed.summary != ""}>
    <br>
        <{$feed.summary}>
        <{/if}>

        <br><br>
    </li>
    <{/foreach}>
</ul>

<a href="<{$xoops_url}>/modules/<{$block.dirname}>/feed_rdf.php" target="_blank">
    <img src="<{$xoops_url}>/modules/<{$block.dirname}>/images/rdf.png" border="0" alt="rdf"/></a>
<a href="<{$xoops_url}>/modules/<{$block.dirname}>/feed_rss.php" target="_blank">
    <img src="<{$xoops_url}>/modules/<{$block.dirname}>/images/rss.png" border="0" alt="rss"/></a>
<a href="<{$xoops_url}>/modules/<{$block.dirname}>/feed_atom.php" target="_blank">
    <img src="<{$xoops_url}>/modules/<{$block.dirname}>/images/atom.png" border="0" alt="atom"/></a>
<br>
<a href="<{$xoops_url}>/modules/<{$block.dirname}>/viewfeed.php"><{$block.lang_more}></a>
