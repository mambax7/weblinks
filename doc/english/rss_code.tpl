<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <META http-equiv="Content-Style-Type" content="text/css">
    <TITLE>Character code of RSS</TITLE>
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
<h4>Character code of RSS</h4>In generally, the character code of RSS is UTF-8<br>
<br>
XOOPS uses the differrent character code by language.<br>
In the English area, use US-ASCII .<br>
In Japan, use EUC-JP.<br>
Some web sites output RSS feed with the character code which is different in UTF-8.<br>
<br>
Moreover, PHP XML parser function can handle only US-ASCII and UTF-8.<br>
<H4>Processing of displaing RSS</H4>The getting RSS is displayed at the following step.<br>
<br>
(1) Convert the getting RSS into UTF-8 <br>
judge a character code by XML encoding.<br>
assume UTF-8, when encoding is empty.<br>
<br>
<div class="cyan">&lt;? xml version=&quot;1.0&quot; encoding=&quot;***&quot; ?&gt;</div>
<br>
<br>(2) Parse the RSS by PHP XML parser function <br>
<br>
(3) Convert the parsed result from UTF-8 to the XOOPS character code <br>
<br>
(4) Display in the XOOPS character code.<br>
<br>
<H4>Processing of outputing RSS</H4>
<br>(1) convert RSS from the XOOPS character code to UTF-8.<br>
(2) output RSS in UTF-8.<br>
<br>
<H4>Conversion of a character code</H4>
<br>the PHP multi-byte function is used in conversion of a character code. <br>
However, in the English area, many servers don't include the multi-byte function.<br>
<br>
Then, in default<br>
don't use the multi-byte function. <br>
it cause a chracter garble in foreign language except English. <br>
<br>
In the Japanese environment, must include the multi-byte function.<br>
if not include , it cause a chracter garble.<br>
<br>
using a multi-byte function, or not.<br>
It is selected by language code, Japanese or others.<br>
I described in language/xxx/language_convert.php<br>
<br>
<hr>
<div align="center"><a href="index.html">INDEX</a></div>
$Id: rss_code.html,v 1.1 2011/12/29 14:33:03 ohwada Exp $
</BODY>
</HTML>
