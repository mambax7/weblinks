<{* $Id: weblinks_forum_list.html,v 1.1 2011/12/29 14:32:37 ohwada Exp $ *}>

<div class="weblinks_viewcat_frame">

    <{if $forum_threads.forum_title}>
    <div class="weblinks_forum_title">
        <span class="weblinks_forum_lang_forum"><{$lang_forum}></span> :
        <a href="<{$forum_threads.forum_link}>"><{$forum_threads.forum_title}></a>
    </div>
    <{/if}>

    <{* -- start threads -- *}>
    <{foreach item=threads from=$forum_threads.threads}>
    <{if $forum_threads.forum_id == 0}>
    <div class="weblinks_forum_title">
        <span class="weblinks_forum_lang_forum"><{$lang_forum}></span> :
        <a href="<{$threads.forum_link}>"><{$threads.forum_title}></a>
    </div>
    <{/if}>

    <div class="weblinks_forum_thread_frame">
        <div class="weblinks_forum_thread_title">
            <span class="weblinks_forum_lang_thread"><{$lang_thread}></span> :
            <a href="<{$threads.thread_link}>"><{$threads.thread_title}></a>
        </div>

        <{* -- start posts -- *}>
        <{foreach item=posts from=$threads.posts}>
        <div class="weblinks_forum_post_title">
            <a href="<{$posts.post_link}>"><{$posts.post_title}></a>
            ( <{$posts.post_time_s}> )
        </div>
        <div class="weblinks_forum_post_text"><{$posts.post_text}></div>
        <{/foreach}>
        <{* -- end posts -- *}>

    </div>
    <{/foreach}>
    <{* -- end threads -- *}>

</div>
