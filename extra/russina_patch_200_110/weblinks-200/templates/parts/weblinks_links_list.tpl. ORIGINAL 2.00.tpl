<{* $Id: weblinks_links_list.html.\040ORIGINAL\0402.00.html,v 1.1 2012/04/09 10:22:24 ohwada Exp $ *}>

<{foreach item=link from=$links}>

    <div class="weblinks_links_list_frame">
        <div class="weblinks_links_list_frame_title">
            <table class="weblinks_links_list_title">
                <tr>
                    <td class="weblinks_links_list_title_left">

                        <{if $link.flag_url == 1}>
                        <a href="<{$xoops_url}>/modules/<{$dirname}>/visit.php?lid=<{$link.lid}>" target="_blank">
                            <{elseif $link.flag_url == 2}>
                            <a href="<{$link.url_s}>" onmousedown="return weblinks_hardlink(this,<{$link.lid}>)" target="_blank">
                                <{/if}>

                                <span class="weblinks_list_title"><{$link.title_s}></span>

                                <{if $link.flag_url != 0}>
                            </a>
                            <{/if}>

                            &nbsp;&nbsp;

                            <{if $link.name_disp != ""}>
                            <{if $link.mail_disp != ""}>
                            <a href="mailto:<{$link.mail_disp}>"><{$link.name_disp}></a>
                            <{else}>
                            <{$link.name_disp}>
                            <{/if}>
                            &nbsp;&nbsp;
                            <{/if}>

                            <{if $link.rss_flag == 1}>
                            <a href="<{$link.rss_url_s}>" target="_blank">
                                <img src="<{$xoops_url}>/modules/<{$dirname}>/images/rdf.png" border="0" alt="rdf"/></a>&nbsp;
                            <{elseif $link.rss_flag == 2}>
                            <a href="<{$link.rss_url_s}>" target="_blank">
                                <img src="<{$xoops_url}>/modules/<{$dirname}>/images/rss.png" border="0" alt="rss"/></a>&nbsp;
                            <{elseif $link.rss_flag == 3}>
                            <a href="<{$link.rss_url_s}>" target="_blank">
                                <img src="<{$xoops_url}>/modules/<{$dirname}>/images/atom.png" border="0" alt="atom"/></a>&nbsp;
                            <{/if}>

                            <{if $link.flag_new}>
                            <{if $keywords != '' }>
                            <a href="<{$xoops_url}>/modules/<{$dirname}>/index.php?keywords=<{$keywords}>">
                                <{else}>
                                <a href="<{$xoops_url}>/modules/<{$dirname}>/index.php">
                                    <{/if}>
                                    <img src="<{$xoops_url}>/modules/<{$dirname}>/images/new.gif" border="0" alt="<{$lang_site_new}>"/></a>
                                <{/if}>

                                <{if $link.flag_update}>
                                <{if $keywords != '' }>
                                <a href="<{$xoops_url}>/modules/<{$dirname}>/index.php?keywords=<{$keywords}>">
                                    <{else}>
                                    <a href="<{$xoops_url}>/modules/<{$dirname}>/index.php">
                                        <{/if}>
                                        <img src="<{$xoops_url}>/modules/<{$dirname}>/images/update.gif" border="0" alt="<{$lang_site_update}>"/></a>
                                    <{/if}>

                                    <{if $link.flag_pop}>
                                    <{if $keywords != '' }>
                                    <a href="<{$xoops_url}>/modules/<{$dirname}>/topten.php?hit=1&amp;keywords=<{$keywords}>">
                                        <{else}>
                                        <a href="<{$xoops_url}>/modules/<{$dirname}>/topten.php?hit=1}>">
                                            <{/if}>
                                            <img src="<{$xoops_url}>/modules/<{$dirname}>/images/pop.gif" border="0" alt="<{$lang_site_popular}>"/></a>
                                        <{/if}>

                                        <{if $link.flag_recommend}>
                                        <{if $keywords != '' }>
                                        <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=recommend&amp;keywords=<{$keywords}>">
                                            <{else}>
                                            <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=recommend">
                                                <{/if}>
                                                <img src="<{$xoops_url}>/modules/<{$dirname}>/images/cool.gif" border="0" alt="<{$lang_site_recommend}>"/></a>
                                            <{/if}>

                                            <{if $link.flag_mutual}>
                                            <{if $keywords != '' }>
                                            <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=mutual&amp;keywords=<{$keywords}>">
                                                <{else}>
                                                <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=mutual">
                                                    <{/if}>
                                                    <img src="<{$xoops_url}>/modules/<{$dirname}>/images/hot.gif" border="0" alt="<{$lang_site_mutual}>"/></a>
                                                <{/if}>

                                                <{if $link.flag_gm_use}>
                                                <{if $keywords != '' }>
                                                <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=gmap&amp;keywords=<{$keywords}>">
                                                    <{else}>
                                                    <a href="<{$xoops_url}>/modules/<{$dirname}>/viewmark.php?mark=gmap">
                                                        <{/if}>
                                                        <img src="<{$xoops_url}>/modules/<{$dirname}>/images/google_maps.png" border="0" alt="<{$lang_site_gmap}>"/></a>
                                                    <{/if}>

                                                    <{if $link.flag_kml_use}>
                                                    <a href="<{$xoops_url}>/modules/<{$dirname}>/kml/kml.php?lid=<{$link.lid}>">
                                                        <img src="<{$xoops_url}>/modules/<{$dirname}>/images/google_earth.png" border="0" alt="Google Earth"/>
                                                    </a>
                                                    <{/if}>

                    </td>

                    <{if $link.show_pagerank}>
                    <td class="weblinks_links_list_title_right">
                        PageRank<br>
                        <{$link.pagerank}>
                        <img src="<{$xoops_url}>/modules/<{$dirname}>/images/bar/bar<{$link.pagerank}>.png" border="0" alt="PageRank"/>
                    </td>
                    <{/if}>

                </tr>
            </table>
        </div>
        <div class="weblinks_links_list_frame_description">

            <{if $link.image_list_show}>
            <{if $link.flag_url == 1}>
            <a href="<{$xoops_url}>/modules/<{$dirname}>/visit.php?lid=<{$link.lid}>" target="_blank">
                <{elseif $link.flag_url == 2}>
                <a href="<{$link.url_s}>" onmousedown="return weblinks_hardlink(this,<{$link.lid}>)" target="_blank">
                    <{/if}>
                    <{if ($link.image_list_width != "") && ($link.image_list_height != "")}>
                <img src="<{$link.image_url}>" width="<{$link.image_list_width}>" height="<{$link.image_list_height}>" alt="banner" class="weblinks_list_image"/>
                    <{else}>
                <img src="<{$link.image_url}>" alt="banner" class="weblinks_list_image"/>
                    <{/if}>
                    <{if $link.flag_url != 0}>
                </a>
                <{/if}>
                <{/if}>

                <{if $link.show_catpaths}>
                <span class="weblinks_list_catpath">
<{* -- Start path loop -- *}>
  <{section name=ii loop=$link.catpaths}>
    <{section name=j loop=$link.catpaths[ii]}>
      <{if $keywords != '' }>
        <a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$link.catpaths[ii][j].cid}>&amp;keywords=<{$keywords}>">
      <{else}>        
        <a href="<{$xoops_url}>/modules/<{$dirname}>/viewcat.php?cid=<{$link.catpaths[ii][j].cid}>">
      <{/if}>     
      <{$link.catpaths[ii][j].title_s}></a>
      <{if $smarty.section.j.last == false}>
        &nbsp;<img src="<{$xoops_url}>/modules/<{$dirname}>/images/arrow2.gif" border="0" alt="arrow"/>&nbsp;
      <{/if}>
    <{/section}>
    <{if $smarty.section.ii.last == false}>
      &nbsp;:&nbsp;
    <{/if}>
  <{/section}>
<{* -- End path loop -- *}>
</span>
                <{else}>
                <span class="weblinks_error">No Category</span>
                <{/if}>
                <br>

                <{if $link.desc_short != ""}>
                <span class="weblinks_list_description"><{$link.desc_short}></span>
                <{/if}>

                <{if $link.image_list_show}>
            <br class="weblinks_list_image_clear"/>
                <{else}>
            <br>
                <{/if}>

                <span class="weblinks_list_footer">
  <{$lang_link_time_update}>: <{$link.update_short}> &nbsp; 
  <{if $show_hits}>
    <{$lang_link_hits}>: <{$link.hits}> &nbsp; 
  <{/if}>
  <{if $show_rating}>
    <{$lang_link_rating}>: <{$link.rating_disp}> &nbsp; 
  <{/if}>
  <{if $keywords != '' }>
    <a href="<{$xoops_url}>/modules/<{$dirname}>/singlelink.php?lid=<{$link.lid}>&amp;keywords=<{$keywords}>">
  <{else}>
    <a href="<{$xoops_url}>/modules/<{$dirname}>/singlelink.php?lid=<{$link.lid}>">
  <{/if}>
  <{$lang_more}></a> 
</span>

        </div>

    </div>

    <{/foreach}>
