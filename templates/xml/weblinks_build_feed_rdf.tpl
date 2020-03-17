<?xml version="1.0" encoding="UTF-8"?>
<rdf:RDF
        xmlns="http://purl.org/rss/1.0/"
        xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
        xmlns:dc="http://purl.org/dc/elements/1.1/"
        xmlns:content="http://purl.org/rss/1.0/modules/content/"
        xml:lang="<{$xml_lang}>">
    <channel rdf:about="<{$channel_link}>">
        <title><{$channel_title}></title>
        <link>
        <{$channel_link}></link>
        <{if $channel_description != ""}>
        <description><{$channel_description}></description>
        <{/if}>
        <{if $channel_dc_date != ""}>
        <dc:date><{$channel_dc_date}></dc:date>
        <{/if}>
        <{if $channel_dc_language != ""}>
        <dc:language><{$channel_dc_language}></dc:language>
        <{/if}>
        <items>
            <rdf:Seq>
                <{foreach item=item from=$items}>
            <rdf:li rdf:resource="<{$item.link}>"/>
                <{/foreach}>
            </rdf:Seq>
        </items>
    </channel>
    <{foreach item=item from=$items}>
    <item rdf:about="<{$item.link}>">
        <title><{$item.title}></title>
        <link>
        <{$item.link}></link>
        <{if $item.description != ""}>
        <description><{$item.description}></description>
        <{/if}>
        <{if $item.content_encoded != ""}>
        <content:encoded> <![CDATA[
            <{$item.content_encoded}>
            ]]>
        </content:encoded>
        <{/if}>
        <{if $item.dc_date != ""}>
        <dc:date><{$item.dc_date}></dc:date>
        <{/if}>
        <{if $item.dc_creator != ""}>
        <dc:creator><{$item.dc_creator}></dc:creator>
        <{/if}>
        <{if $item.dc_subject != ""}>
        <dc:subject><{$item.dc_subject}></dc:subject>
        <{/if}>
    </item>
    <{/foreach}>
</rdf:RDF>
