<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<{$xoops_langcode}>" lang="<{$xoops_langcode}>">
<head>
    <{* $Id: weblinks_gm_location.html,v 1.1 2011/12/29 14:32:37 ohwada Exp $ *}>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Cache-Control" content="no-cache"/>
    <meta http-equiv="Expires" content="Thu, 01 Dec 1994 16:00:00 GMT"/>
    <title>weblinks - <{$lang_title}></title>
    <link href="<{$xoops_url}>/modules/<{$dirname}>/include/weblinks_gmap_location.css" rel="stylesheet" type="text/css" media="screen"/>
    <script src="<{$gm_server}>maps?file=api&amp;hl=<{$xoops_langcode}>&amp;v=2&amp;key=<{$gm_apikey}>" type="text/javascript" charset="utf-8"></script>
    <script src="<{$xoops_url}>/modules/<{$dirname}>/include/weblinks_gmap_location.js" type="text/javascript"></script>
    <script type="text/javascript">
        //<![CDATA[

        weblinks_url = "<{$xoops_url}>/modules/<{$dirname}>";
        weblinks_default_latitude =
        <{$default_latitude}>
        ;
        weblinks_default_longitude =
        <{$default_longitude}>
        ;
        weblinks_default_zoom =
        <{$default_zoom}>
        ;
        weblinks_opener_mode = "<{$opener_mode}>";
        weblinks_geocode_kind = "<{$geocode_kind}>";
        weblinks_map_control = "<{$map_control}>";
        weblinks_use_type =
        <{$bool_use_type}>
        ;
        weblinks_use_scale =
        <{$bool_use_scale}>
        ;
        weblinks_use_overview =
        <{$bool_use_overview}>
        ;
        weblinks_is_japanese =
        <{$bool_is_japanese}>
        ;
        weblinks_use_nishioka_inverse =
        <{$bool_use_nishioka_inverse}>
        ;

        weblinks_lang_not_compatible = "<{$lang_not_compatible}>";
        weblinks_lang_no_match_place = "<{$lang_no_match_place}>";
        weblinks_lang_latitude = "<{$lang_latitude}>";
        weblinks_lang_longitude = "<{$lang_longitude}>";
        weblinks_lang_zoom = "<{$lang_zoom}>";

        window.onload = weblinks_load;
        window.onunload = GUnload;

        //]]>
    </script>
</head>
<body>
<h3><{$lang_title}></h3>

<noscript>
    <div class="weblinks_error"><{$lang_js_invalid}></div>
</noscript>

<div id="weblinks_not_compatible" class="weblinks_error"></div>

<form action="#" onsubmit="weblinks_searchAddress(this.weblinks_address.value); return false">
    <input type="text" id="weblinks_address" name="weblinks_address" size="60"/>
    <input type="submit" value="<{$lang_search_map_from_addr}>"/>
</form>
<br>

<{if $flag_use_geocode_tokyo_univ }>
<input type="button" value="<{$lang_jp_search_map_from_addr}>" onclick="weblinks_searchAddressJp()"/>
<br>
    <span class="weblinks_small">
  <a href="http://pc035.tkl.iis.u-tokyo.ac.jp/~sagara/geocode/" target="_blank">
  <{$lang_jp_tokyo_geocode}>
  </a> (<a href="http://nlftp.mlit.go.jp/isj/" target="_blank">
  <{$lang_jp_mlit_isj}>
  </a>) </span>
<br><br>
    <{/if}>

<b><{$lang_default_location}></b><br>
<{$default_location}><br>
<{$lang_latitude}>: <{$default_latitude}> /
<{$lang_longitude}>: <{$default_longitude}> /
<{$lang_zoom}>: <{$default_zoom}>
<br><br>

<{if $geocoder_kind != 'latlng' }>
    <b><{$lang_search_list}></b><br>
    <div id="weblinks_list"></div>
<br>
    <{/if}>

<a name="weblinks_label"></a>
<div id="weblinks_map" style="width:100%; height:<{$map_height}>px; border:1px solid #909090; margin-bottom:6px;"></div>
<br><br>

<b><{$lang_current_location}></b><br>
<div id="weblinks_current_location"></div>
<br>

<{if $flag_use_nishioka_inverse }>
    <b><{$lang_current_address}></b><br>
    <div id="weblinks_current_address"></div>
<br>
    <{/if}>

<input type="button" value="<{$lang_get_latitude}>" onclick="weblinks_setLatitude()"/>

<{if $show_set_addr_jp }>
<input type="button" value="<{$lang_get_addr}>" onclick="weblinks_setAddressJp()"/>
    <{/if}>

<{if $show_close }>
<input type="button" value="<{$lang_close}>" onclick="window.close()"/>
    <{/if}>

<{if $show_disp_off }>
<input type="button" value="<{$lang_disp_off}>" onclick="weblinks_dispOff()">
    <{/if}>

<br><br>

</body>
</html>
