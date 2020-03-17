<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <META http-equiv="Content-Style-Type" content="text/css">
    <TITLE>The difference by the country or the language</TITLE>
    <style type="text/css">
        <!--
        h3.SoftwareHead {text-align: center; background-color: #FFFFE0;} /* LightYellow */

        div.cyan {
            background-color: #E0FFFF; /* LightCyan */
            border-color: #808080; /* */
            border-width: 1px;
            border-style: solid;
            width: 500px;
            padding: 2px;
        }

        -->
    </style>
</HEAD>
<BODY>
<h3 class="SoftwareHead">WebLinks Developer's Document</h3>
<h4>The difference by the country or the language</h4>
<h4>Descripition of language_base.php and language_convert.php</h4>
<P>It is sopported by <B><FONT color="#0000ff">language_base.php</FONT></B> for comon and <FONT color="#0000ff"><B>language_convert.php</B></FONT> for every language pack. <BR>
    The class function of language_convert.php is inherited from language_base.php. <BR>
    Explanation of a function is shown below. <BR>
</P>
<H4>Function and use</H4>
<TABLE class="main" border="1">
    <TBODY>
    <TR>
        <TD width="20%" align="center">function name</TD>
        <TD width="40%" align="center">function</TD>
        <TD width="40%" align="center">use</TD>
    </TR>
    <TR>
        <TD colspan="3">use multi-byte function</TD>
    </TR>
    <TR>
        <TD>convert_encode_to_utf8<BR>
            ($text, $encode)
        </TD>
        <TD>convert the text ($text) from the specified character code ($encode) to
            UTF-8<BR>
        </TD>
        <TD>convert the getting RSS into UTF-8. <BR>
            The code of RSS is judged by encoding of XML. <BR>
            assume UTF-8, when encoding is empty.<BR>
        </TD>
    </TR>
    <TR>
        <TD>convert_from_utf8($text)</TD>
        <TD>convert the text ($text) from the internal character code to UTF-8</TD>
        <TD>convert the parsed RSS into an internal code.</TD>
    </TR>
    <TR>
        <TD>convert_to_utf8($text)</TD>
        <TD>convert the text ($text) from UTF-8 to the internal character code to UTF-8</TD>
        <TD>convert the outputing RSS into UTF-8</TD>
    </TR>
    <TR>
        <TD>shorten_text($text,$max)</TD>
        <TD>truncate the text ($text) with specified width ($max)</TD>
        <TD>make a summary</TD>
    </TR>
    <TR>
        <TD>send_mail<BR>
            ($mailto, $subject, $body, $header)
        </TD>
        <TD>send encoded mail<BR>
            parameters are same as PHP mail function
        </TD>
        <TD>use by a command line</TD>
    </TR>

    <TR>
        <TD colspan="3">use multi-byte function (specially for Japanese environment)</TD>
    </TR>
    <TR>
        <TD>convert_telafriend_subject($text)</TD>
        <TD>convert the text ($text) from the internal character code to another character
            code
        </TD>
        <TD>measures of garble for &quot;tel a friend&quot;</TD>
    </TR>
    <TR>
        <TD>convert_telafriend_body($text)</TD>
        <TD>same as the above</TD>
        <TD>Same as the above</TD>
    </TR>
    <TR>
        <TD>convert_download_filename($text)</TD>
        <TD>same as the above</TD>
        <TD>measures of garble for &quot;download file name&quot;<BR>
            now, not use
        </TD>
    </TR>
    <TR>
        <TD>convert_sjis_win_mac($text)</TD>
        <TD>convert the text ($text) from EUC-JP to SJIS,<BR>
            when a client PC is Windows or MAC.
        </TD>
        <TD>measures of garble for &quot;tel a friend&quot;</TD>
    </TR>
    <TR>
        <TD>convert_space_zen_to_han($text)</TD>
        <TD>convert the text ($text) from &quot;zen-kaku&quot; space to &quot;han-kaku&quot;
        </TD>
        <TD>in searching, &quot;zen-kaku&quot; space is considered delimit of the word</TD>
    </TR>

    <TR>
        <TD colspan="3">
            <P>not use multi-byte function </P>
        </TD>
    </TR>
    <TR>
        <TD>get_google_url()</TD>
        <TD>get the url of google site <BR>
            which is setted up by this function
        </TD>
        <TD>this url is the site which searches link information</TD>
    </TR>
    <TR>
        <TD>get_country()</TD>
        <TD>get the name of country <BR>
            which is setted up by this function
        </TD>
        <TD>this name choice the method of link to the map site</TD>
    </TR>
    <TR>
        <TD>get_happy_linux_url()</TD>
        <TD>get the url of development site <BR>
            which is setted up by this function
        </TD>
        <TD>this url is the site of poweredby</TD>
    </TR>
    <TR>
        <TD>presume_agent()</TD>
        <TD>presume the agent of web browser</TD>
        <TD>measures of garble for &quot;tel a friend&quot;</TD>
    </TR>
    </TBODY>
</TABLE>

<h4>The difference in processing by the country or the language</h4>
<TABLE class="main" border="1">
    <TBODY>
    <TR>
        <TD width="20%" align="center">function name</TD>
        <TD width="30%" align="center">default (English)<BR>
            language_base.php
        </TD>
        <TD width="30%" align="center">Japanse<BR>language_convert.php</TD>
        <TD width="20%" align="center">other language</TD>
    </TR>
    <TR>
        <TD colspan="4">use multi-byte function</TD>
    </TR>
    <TR>
        <TD>convert_encode_to_utf8($text, $encode)</TD>
        <TD>convert from the specified character code to UTF-8<BR>
            use PHP utf8_encode function
        </TD>
        <TD>convert from the specified character code to UTF-8<BR>
            use PHP mb_convert_encoding function
        </TD>
        <TD>convert from the specified character code to UTF-8</TD>
    </TR>
    <TR>
        <TD>convert_from_utf8($text)</TD>
        <TD>convert from UTF-8 to US-ASCII<BR>
            use PHP utf8_decode function
        </TD>
        <TD>convert from UTF-8 to EUC-JP<BR>
            use PHP mb_convert_encoding function
        </TD>
        <TD>convert from UTF-8 to the country's character code</TD>
    </TR>
    <TR>
        <TD>convert_to_utf8($text)</TD>
        <TD>convert from US-ASCII to UTF-8<BR>
            use PHP utf8_encode function
        </TD>
        <TD>convert from EUC-JP to UTF-8<BR>
            use PHP mb_convert_encoding function
        </TD>
        <TD>convert from the country's character code to UTF-8</TD>
    </TR>
    <TR>
        <TD>shorten_text($text,$max)</TD>
        <TD>use PHP substr function</TD>
        <TD>use PHP mb_strimwidth function</TD>
        <TD>truncate,<BR>
            uniting the country's character code
        </TD>
    </TR>
    <TR>
        <TD>send_mail($mailto, $subject, $body, $header)</TD>
        <TD>wrapper of PHP mail function</TD>
        <TD>wrapper of PHP mb_send_mail function</TD>
        <TD>mail function is set up,<BR>
            uniting the country's character code
        </TD>
    </TR>
    <TR>
        <TD colspan="4">use multi-byte function (specially for Japanese environment)</TD>
    </TR>
    <TR>
        <TD>convert_telafriend_subject($text)</TD>
        <TD>nothing to do</TD>
        <TD>convert from EUC-JP to SJIS<BR>
            call convert_sjis_win_mac()
        </TD>
        <TD>no necessary</TD>
    </TR>
    <TR>
        <TD>convert_telafriend_body($text)</TD>
        <TD>nothing to do</TD>
        <TD>same as the above</TD>
        <TD>no necessary</TD>
    </TR>
    <TR>
        <TD>convert_download_filename($text)</TD>
        <TD>nothing to do</TD>
        <TD>same as the above</TD>
        <TD>no necessary</TD>
    </TR>
    <TR>
        <TD>convert_sjis_win_mac($text)</TD>
        <TD>---</TD>
        <TD>convert from EUC-JP to SJIS<BR>
            use PHP mb_convert_encoding function
        </TD>
        <TD>no necessary</TD>
    </TR>
    <TR>
        <TD>convert_space_zen_to_han($text)</TD>
        <TD>nothing to do</TD>
        <TD>convert from &quot;zen-kaku&quot; space to &quot;han-kaku&quot;</TD>
        <TD>no necessary</TD>
    </TR>

    <TR>
        <TD colspan="4">not use multi-byte function</TD>
    </TR>
    <TR>
        <TD>get_google_url()</TD>
        <TD>http://www.google.com/search?<BR>
            hl=en&amp;amp;q=<BR>
        </TD>
        <TD>http://www.google.co.jp/search?<BR>
            hl=ja&amp;amp;q=
        </TD>
        <TD>url is set up,<BR>
            uniting the country's character code
        </TD>
    </TR>
    <TR>
        <TD>get_country()</TD>
        <TD>usa</TD>
        <TD>japan</TD>
        <TD>no necessary<BR>
            <BR>
            require to change a template when differ from the U.S style.
        </TD>
    </TR>
    <TR>
        <TD>get_happy_linux_url()</TD>
        <TD>http://linux2.ohwada.net/</TD>
        <TD>http://linux.ohwada.jp/</TD>
        <TD>no necessary</TD>
    </TR>
    <TR>
        <TD>presume_agent()</TD>
        <TD>presume the agent of web browser</TD>
        <TD>---</TD>
        <TD>---</TD>
    </TR>
    </TBODY>
</TABLE>
<br>
<hr>
<div align="center"><a href="index.html">INDEX</a></div>
$Id: lang_conv.html,v 1.1 2011/12/29 14:33:03 ohwada Exp $
</BODY>
</HTML>
