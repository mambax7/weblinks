<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="<{$xoops_langcode}>" lang="<{$xoops_langcode}>">
<html>
<head>
    <{* $Id: weblinks_print.html,v 1.1 2007/08/08 04:20:59 ohwada Exp $ *}>
    <meta http-equiv="content-type" content="text/html; charset=<{$xoops_charset}>"/>
    <meta http-equiv="content-language" content="<{$xoops_langcode}>"/>
    <meta name="robots" content="<{$xoops_meta_robots}>"/>
    <meta name="keywords" content="<{$xoops_meta_keywords}>"/>
    <meta name="description" content="<{$xoops_meta_description}>"/>
    <meta name="rating" content="<{$xoops_meta_rating}>"/>
    <meta name="author" content="<{$xoops_meta_author}>"/>
    <meta name="copyright" content="<{$xoops_meta_copyright}>"/>
    <meta name="generator" content="XOOPS"/>
    <title><{$xoops_sitename}> - <{$module_name}> - <{$link.title}></title>
    <link rel="stylesheet" type="text/css" media="all" href="<{$xoops_url}>/modules/<{$dirname}>/weblinks.css"/>

    <{* use google map *}>
    <{if $gm_use}>
    <script src="<{$gm_server}>maps?file=api&amp;hl=<{$xoops_langcode}>&amp;v=2&amp;key=<{$gm_apikey}>" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        <!--
        function gm_load() {
            if (GBrowserIsCompatible()) {
                var weblinks_gm_map = new GMap2(document.getElementById("weblinks_gm_map"));
                var point = new GLatLng(parseFloat( < {$link.gm_latitude
            }>) ,
                parseFloat( < {$link.gm_longitude
            }>) )
                ;
                weblinks_gm_map.setCenter(point, Math.floor( < {$link.gm_zoom
            }>) )
                ;
                weblinks_gm_map.addOverlay(new GMarker(point));
                weblinks_gm_map.disableDragging();
            }

            window.print();
        }
        //-->
    </script>

    <{* NOT use google map *}>
    <{else}>
    <script type="text/javascript">
        <!--
        function load() {
            window.print();
        }
        //-->
    </script>
    <{/if}>

</head>

<{if $gm_use}>
<body class="weblinks_print_body" onLoad="gm_load()" onUnload="GUnload()">
<{else}>
<body class="weblinks_print_body" onLoad="load()">
<{/if}>

<br>
&nbsp;
<a href="<{$xoops_url}>/"><{$xoops_sitename}></a>
&gt;&gt;
<a href="<{$xoops_url}>/modules/<{$dirname}>/"><{$module_name}></a>
&gt;&gt;
<a href="<{$xoops_url}>/modules/<{$dirname}>/singlelink.php?lid=<{$link.lid}>"><{$link.title}></a>
<br><br>

<div class="weblinks_print_frame">

    <div class="weblinks_print_sitename"><{$xoops_sitename}></div>
    <div class="weblinks_print_modulename"><{$module_name}></div>
    <div class="weblinks_print_singlelink"><{$xoops_url}>/modules/<{$dirname}>/singlelink.php?lid=<{$link.lid}></div>

    <div class="weblinks_print_frame">
        <div class="weblinks_print_frame_link">

            <div class="weblinks_print_frame_link_title">
                <span class="weblinks_print_link_title"><{$link.title}></span><br>
                <span class="weblinks_print_link_url"><{$link.url}></span>
            </div>

            <div class="weblinks_print_frame_link_category">

                <{if $link.flag_new == 1}>
                <img src="<{$xoops_url}>/modules/<{$dirname}>/images/new.gif" border="0" alt="<{$lang_image_new}>"/>
                <{/if}>

                <{if $link.flag_update == 1}>
                <img src="<{$xoops_url}>/modules/<{$dirname}>/images/update.gif" border="0" alt="<{$lang_image_update}>"/>
                <{/if}>

                <{if $link.flag_pop == 1}>
                <img src="<{$xoops_url}>/modules/<{$dirname}>/images/pop.gif" border="0" alt="<{$lang_image_popular}>"/>
                <{/if}>

                <{if $link.flag_recommend == 1}>
                <img src="<{$xoops_url}>/modules/<{$dirname}>/images/cool.gif" border="0" alt="<{$lang_image_recommend}>"/>
                <{/if}>

                <{if $link.flag_mutual == 1}>
                <img src="<{$xoops_url}>/modules/<{$dirname}>/images/hot.gif" border="0" alt="<{$lang_image_mutual}>"/>
                <{/if}>

                <br>

                <span class="weblinks_bold"><{$lang_link_time_update}></span> <{$link.update}><br>

                <span class="weblinks_bold"><{$lang_link_cat}></span>&nbsp;

                <{* -- Start path loop -- *}>
                <{section name=ii loop=$link.catpaths}>
                <{section name=j loop=$link.catpaths[ii]}>
                <{$link.catpaths[ii][j].title}>
                <{if $smarty.section.j.last == false}>
                &nbsp;<img src="<{$xoops_url}>/modules/<{$dirname}>/images/arrow2.gif" border="0" alt="arrow"/>&nbsp;
                <{/if}>
                <{/section}>
                <{if $smarty.section.ii.last == false}>
                <br>
                <{/if}>
                <{/section}>
                <{* -- End path loop -- *}>
                <br>

                <{if $link.name_disp != "" or $link.mail_disp != "" or $link.company != ""}>
                <span class="weblinks_bold"><{$lang_promoter}></span>&nbsp;

                <{if $link.name_disp != ""}>

                <{if $link.mail_disp != ""}>
                <{$link.name_disp}> &nbsp; mailto:<{$link.mail_disp}>
                <{else}>
                <{$link.name_disp}>
                <{/if}>

                &nbsp;
                <{/if}>

                <{$link.company}><br>
                <{/if}>

                <{if $is_japanese }>

                <{if $link.zip != ""}>
                <span class="weblinks_bold"><{$lang_link_zip}></span> <{$link.zip}><br>
                <{/if}>

                <{if $link.flag_addr == 1 }>
                <span class="weblinks_bold"><{$lang_link_addr}></span>&nbsp;

                <{if $link.state != ""}>
                <{$link.state}>&nbsp;
                <{/if}>
                <{if $link.city != ""}>
                <{$link.city}>&nbsp;
                <{/if}>

                <{$link.addr}> <{$link.addr2}> <br>
                <{/if}>

                <{else}>

                <{if ($link.flag_addr == 1) || ($link.zip != "")}>
                <span class="weblinks_bold"><{$lang_link_zip}></span> <{$link.zip}><br>

                <span class="weblinks_bold"><{$lang_link_addr}></span>&nbsp;
                <{$link.addr2}> <{$link.addr}>

                <{if $link.city != ""}>
                , <{$link.city}>
                <{/if}>
                <{if $link.state != ""}>
                , <{$link.state}>
                <{/if}>

                <br>
                <{/if}>

                <{/if}>

                <{if $link.tel != ""}>
                <span class="weblinks_bold"><{$lang_link_tel}></span> <{$link.tel}> <br>
                <{/if}>

                <{if $link.fax != ""}>
                <span class="weblinks_bold"><{$lang_link_fax}></span> <{$link.fax}> <br>
                <{/if}>

            </div>
            <div class="weblinks_print_frame_link_description">

                <{if ($link_image_use == 1) && $link.image_url != ""}>
                <{if ($link.image_link_width != "") && ($link.image_link_height != "")}>
                <img src="<{$link.image_url}>" width="<{$link.image_link_width}>" height="<{$link.image_link_height}>" alt="banner" class="weblinks_print_link_image"/>
                <{else}>
                <img src="<{$link.image_url}>" alt="banner" class="weblinks_print_link_image"/>
                <{/if}>
                <{/if}>

                <span class="weblinks_bold"><{$lang_link_description}></span><br>
                <span class="weblinks_print_link_description"><{$link.description}></span><br>

                <{if $link.admincomment != ""}>
                <span class="weblinks_bold"><{$lang_link_admincommnet}></span><br>
                <span class="weblinks_print_link_admincomment"><{$link.admincomment}></span><br>
                <{/if}>

                <{if $link.etc1 != ""}>
                <span class="weblinks_bold"><{$lang_link_etc1}></span> <{$link.etc1}><br>
                <{/if}>

                <{if $link.etc2 != ""}>
                <span class="weblinks_bold"><{$lang_link_etc2}></span> <{$link.etc2}><br>
                <{/if}>

                <{if $link.etc3 != ""}>
                <span class="weblinks_bold"><{$lang_link_etc3}></span> <{$link.etc3}><br>
                <{/if}>

                <{if $link.etc4 != ""}>
                <span class="weblinks_bold"><{$lang_link_etc4}></span> <{$link.etc4}><br>
                <{/if}>

                <{if $link.etc5 != ""}>
                <span class="weblinks_bold"><{$lang_link_etc5}></span> <{$link.etc5}><br>
                <{/if}>

            </div>
            <div class="weblinks_print_frame_link_hits">

                <{if $show_hits}>
                <span class="weblinks_bold"><{$lang_link_hits}>:</span> <{$link.hits}>&nbsp;&nbsp;
                <{/if}>

                <{if $show_rating}>
                <span class="weblinks_bold"><{$lang_link_rating}>:</span> <{$link.rating_disp}> (<{$link.votes_disp}>)
                <{/if}>

            </div>
        </div>
        <br>

        <{if $link.textarea1 != ""}>
        <div class="weblinks_print_textarea1">
            <span class="weblinks_bold"><{$lang_link_textarea1}></span><br>
            <{$link.textarea1}>
        </div>
        <br>
        <{/if}>

        <{if $link.textarea2 != ""}>
        <div class="weblinks_print_textarea2">
            <span class="weblinks_bold"><{$lang_link_textarea2}></span><br>
            <{$link.textarea2}>
        </div>
        <br>
        <{/if}>

        <{if $gm_use}>
        <div id="weblinks_gm_map" class="weblinks_gm_map_print"></div>
        <br>
        <{/if}>

        <{if $link.rss_flag == 1}>
        <span class="weblinks_bold">RDF feed</span>&nbsp;&nbsp;
        <a href="<{$rss_url}>" target="_blank">
            <img src="<{$xoops_url}>/modules/<{$dirname}>/images/rdf.png" border="0" alt="rdf"/></a>&nbsp;
        <{elseif $link.rss_flag == 2}>
        <span class="weblinks_bold">RSS feed</span>&nbsp;&nbsp;
        <a href="<{$rss_url}>" target="_blank">
            <img src="<{$xoops_url}>/modules/<{$dirname}>/images/rss.png" border="0" alt="rss"/></a>&nbsp;
        <{elseif $link.rss_flag == 3}>
        <span class="weblinks_bold">ATOM feed</span>&nbsp;&nbsp;
        <a href="<{$rss_url}>" target="_blank">
            <img src="<{$xoops_url}>/modules/<{$dirname}>/images/atom.png" border="0" alt="atom"/></a>&nbsp;
        <{/if}>

        <{if ($link.rss_flag == 1) || ($link.rss_flag == 2) || ($link.rss_flag == 3) }>
        <{$lang_lastupdate}>&nbsp;<{$rss_update}>
        <br><br>

        <{* -- feed list begin -- *}>
        <div class="weblinks_print_frame_feed_all">
            <{if $rss_show}>
            <{foreach item=feed from=$feeds}>
            <div class="weblinks_print_frame_feed_each">
                <span class="weblinks_print_feed_title"><{$feed.title}></span><br>
                &nbsp; from <{$feed.site_title}>&nbsp;
                <{if $feed.updated_long != ""}>
                (<{$feed.updated_long}>)&nbsp;
                <{/if}>
                <br>
                <{if $feed.summary != ""}>
                <{$feed.summary}>
                <{/if}>
            </div>
            <{/foreach}>
            <{else}>
            <span class="weblinks_blue">No Feed</span>
            <{/if}>
        </div>
        <{* -- feed list end -- *}>

        <br>
        <{/if}>

        <{* -- start comments -- *}>
        <div class="weblinks_print_frame_comment">
            <{if $comment_mode == "flat"}>
            <{include file="db:system_comments_flat.tpl"}>
            <{elseif $comment_mode == "thread"}>
            <{include file="db:system_comments_thread.tpl"}>
            <{elseif $comment_mode == "nest"}>
            <{include file="db:system_comments_nest.tpl"}>
            <{/if}>
        </div>
        <{* -- end comments -- *}>

    </div>
</body>
</html>
