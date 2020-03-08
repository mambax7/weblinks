<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0"
     xmlns:dc="https://purl.org/dc/elements/1.1/"
     xmlns:content="https://purl.org/rss/1.0/modules/content/"
     xmlns:atom="https://www.w3.org/2005/Atom"
     xmlns:geo="https://www.w3.org/2003/01/geo/wgs84_pos#"
     xmlns:georss="https://www.georss.org/georss"
     xmlns:media="https://search.yahoo.com/mrss/">
    <channel>
        <title><{$channel_title}></title>
        <link>
        <{$channel_link}></link>
        <{if $channel_description != ""}>
        <description><{$channel_description}></description>
        <{/if}>
        <{if $channel_pubdate != ""}>
        <pubDate><{$channel_pubdate}></pubDate>
        <{/if}>
        <{if $channel_lastbuild != ""}>
        <lastBuildDate><{$channel_lastbuild}></lastBuildDate>
        <{/if}>
        <{if $channel_docs != ""}>
        <docs><{$channel_docs}></docs>
        <{/if}>
        <{if $channel_generator != ""}>
        <generator><{$channel_generator}></generator>
        <{/if}>
        <{if $channel_category != ""}>
        <category><{$channel_category}></category>
        <{/if}>
        <{if $channel_managingeditor != ""}>
        <managingEditor><{$channel_managingeditor}></managingEditor>
        <{/if}>
        <{if $channel_webmaster != ""}>
        <webMaster><{$channel_webmaster}></webMaster>
        <{/if}>
        <{if $channel_copyright != ""}>
        <copyright><{$channel_copyright}></copyright>
        <{/if}>
        <{if $channel_language != ""}>
        <language><{$channel_language}></language>
        <{/if}>
        <{if $channel_atom_link != ""}>
        <atom:link href="<{$channel_atom_link}>" rel="self" type="application/rss+xml"/>
        <{/if}>
        <{if $image_url != ""}>
        <image>
            <title><{$image_title}></title>
            <link>
            <{$image_link}></link>
            <url><{$image_url}></url>
            <width><{$image_width}></width>
            <height><{$image_height}></height>
        </image>
        <{/if}>
        <{foreach item=item from=$items}>
        <{* === item begin === *}>
        <item>
            <title><{$item.title}></title>
            <link>
            <{$item.link}></link>
            <{if $item.description != ""}>
            <description><{$item.description}></description>
            <{/if}>
            <{if $item.pubdate != ""}>
            <pubDate><{$item.pubdate}></pubDate>
            <{/if}>
            <{if $item.guid != ""}>
            <guid><{$item.guid}></guid>
            <{/if}>
            <{if $item.category != ""}>
            <category><{$item.category}></category>
            <{/if}>
            <{if $item.enclosure_url != ""}>
            <{if ($item.enclosure_type != "") &&($item.enclosure_length != "") }>
            <enclosure url="<{$item.enclosure_url}>" type="<{$item.enclosure_type}>" length="<{$item.enclosure_length}>"/>
            <{else}>
            <enclosure url="<{$item.enclosure_url}>"/>
            <{/if}>
            <{/if}>
            <{* === content === *}>
            <{if $item.content_encoded != ""}>
            <content:encoded> <![CDATA[
                <{$item.content_encoded}>
                ]]>
            </content:encoded>
            <{/if}>
            <{* === dc === *}>
            <{if $item.dc_creator != ""}>
            <dc:creator><{$item.dc_creator}></dc:creator>
            <{/if}>
            <{* === geo === *}>
            <{if ($item.geo_lat != "")&&($item.geo_long != "") }>
            <geo:Point>
                <geo:lat><{$item.geo_lat}></geo:lat>
                <geo:long><{$item.geo_long}></geo:long>
            </geo:Point>
            <{/if}>
            <{* === georss === *}>
            <{if $item.georss_point != ""}>
            <georss:point><{$item.georss_point}></georss:point>
            <{/if}>
            <{* === media rss begin === *}>
            <{if $item.media_group != ""}>
            <media:group>
                <{if $item.media_title != ""}>
                <media:title type="plain"><{$item.media_title}></media:title>
                <{/if}>
                <{if $item.media_description != ""}>
                <media:description type="plain"><{$item.media_description}></media:description>
                <{/if}>
                <{if $item.media_text != ""}>
                <media:text type="html"><{$item.media_text}></media:text>
                <{/if}>
                <{if $item.media_keywords != ""}>
                <media:keywords><{$item.media_keywords}></media:keywords>
                <{/if}>
                <{if $item.media_credit != ""}>
                <media:credit><{$item.media_credit}></media:credit>
                <{/if}>
                <{if $item.media_content_url != ""}>
                <media:content url="<{$item.media_content_url}>" height="<{$item.media_content_height}>" width="<{$item.media_content_width}>" type="<{$item.media_content_type}>" medium="image"/>
                <{/if}>
                <{if $item.media_thumbnail_url != ""}>
                <media:thumbnail url="<{$item.media_thumbnail_url}>" height="<{$item.media_thumbnail_height}>" width="<{$item.media_thumbnail_width}>"/>
                <{/if}>
            </media:group>
            <{/if}>
            <{* --- media rss end --- *}>
        </item>
        <{* --- item end --- *}>
        <{/foreach}>
    </channel>
</rss>
