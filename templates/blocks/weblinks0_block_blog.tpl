<{* $Id: weblinks0_block_blog.html,v 1.3 2006/05/24 02:20:00 ohwada Exp $ *}>

<{if $block.feed_show == 0}>
<font color="red"><{$block.lang_error}></font>
<{else}>
<a href="<{$block.site_url}>" target="_blank"><{$block.site_title}></a>
<ul>
    <{foreach name=blog item=feed from=$block.feeds}>
    <li>
        <a href="<{$feed.url}>" target="_blank"><{$feed.title}></a>&nbsp;

        <{if $feed.date != ""}>
        (<{$feed.date}>)&nbsp;
        <{/if}>

        <br>

        <{if $smarty.foreach.blog.iteration <= $block.num_content }>
        <{if $feed.content != ""}>
        <{$feed.content}>
        <{/if}>
        <{else}>
        <{if $feed.summary != ""}>
        <{$feed.summary}>
        <{/if}>
        <{/if}>

        <br><br>
    </li>
    <{/foreach}>
</ul>
<{/if}>
