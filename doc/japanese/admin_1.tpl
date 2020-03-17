<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=EUC-JP">
    <META http-equiv="Content-Style-Type" content="text/css">
    <TITLE>WebLinks �����Ը��� ʸ��</TITLE>
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
<h3 class="SoftwareHead">WebLinks �����Ը��� ʸ��</h3>
¾�Υ⥸�塼��ȻȤ������㤦��Τ䡢����ä�ʬ����ˤ����Ȥ�����������Ƥ��ޤ���<br>
<H4>�����Ͽޥ����ȤؤΥ����ˡ</H4>
<A href="http://map.yahoo.co.jp/" target="_blank"><b>Yahoo</b></A> �ʥǥե���ȡ�<br>
<br>
�ƥ�ץ졼�Ȥϲ����Τ褦�����ꤵ��Ƥ��ޤ�
<div class="yellow">
    &lt;{if $link.addr_encode != &quot;&quot;}&gt;<br>
    &lt;a href=&quot;http ://search.map.yahoo.co.jp/search?p=&lt;{$link.addr_encode}&gt;&quot; target=_blank&gt;<br>
    &lt;img src=&quot;&lt;{$module_url}&gt;/images/map.png&quot; board=&quot;0&quot; alt=&quot;map&quot;&gt;&lt;/a&gt;<br>
    &lt;{/if}&gt;<br>
</div>
<br>
���ѵ�§<br>
Yahoo �����Ѥ�����ϡ��桼����Ͽ�ʤɤ�ɬ�פϤʤ��褦�Ǥ���<br>
<A href="http://help.yahoo.co.jp/help/jp/maps/maps-12.html" target="_blank">Yahoo
    ��󥯡�ž�ܡ������ѤˤĤ���</A><br>
<br>
<b><A href="http://www.mapfan.com/" target="_blank">Mapfan</A></b><br>
<br>
�ƥ�ץ졼�Ȥ򲼵��Τ褦���ѹ����Ƥ�������<br>
<div class="cyan">
    &lt;{if $link.addr_encode != &quot;&quot;}&gt;<br>
    &lt;a href=&quot;http ://www.mapfan.com/index.cgi?ADDR=&lt;{$link.addr_encode}&gt;&quot; target=_blank&gt;<br>
&lt;img src=&quot;http ://www.mapfan.com/images/55_20.gif&quot; border=0 alt=&quot;mapfan&quot; /&gt;&lt;/a&gt;<br>
    &lt;{/if}&gt;<br>
</div>
<br>
���ѵ�§<br>
Mapfan �����Ѥ�����ϡ��桼����Ͽ��ɬ�פǤ���<br>
<A href="http://www.mapfan.com/mfwlink/linkservice.cgi" target="_blank">Mapfan
    �Ͽޥ�󥯥����ӥ�</A><br>
<br>

<h4>����RSS/ATOM�ط��Υ֥�å�</h4>
������ ��󥯽��ο���RSS/ATOM����<br>
viewfeed.php ������ε�ǽ�Ǥ���<br>
�ơ��֥� atomfeed �˳�Ǽ���줿RSS/ATOM���������դο������礫��ɽ�����ޤ���<br>
���Υ֥�å���ɽ�����Ƥ⡢������RSS/ATOM�����μ����ϹԤ��ޤ���<br>
�����˴ؤ��Ƥϡ�RSS/ATOM�����μ����פ�������������<br>
<br>
������ ��󥯽���blogɽ��<br>
�ơ��֥� atomfeed �˳�Ǽ���줿RSS/ATOM�������顢����Υ�󥯤ε��������դο������礫��ɽ�����ޤ���<br>
��������Ʊ�ͤˡ����Υ֥�å���ɽ�����Ƥ⡢������RSS/ATOM�����μ����ϹԤ��ޤ���<br>
<br>
�֥�å��������֥�󥯽���blogɽ���פ��Խ����̤򳫤���<br>
ɽ������blog�Υ��ID�����ꤷ�ޤ���<br>
<br>
������ �������ࡦ�֥�å��ˤ�blog��ɽ������<br>
������������ε�ǽ�Ǥ���<br>
�㤤�ϡ����Ĥ���ޤ���<br>
(1) ʣ���Υ�󥯤��Ф��ơ����줾��blog��ɽ���Ǥ��ޤ���<br>
(2) ���Υ֥�å���ɽ������Ȥ��ˡ�������RSS/ATOM�����μ�����Ԥ��ޤ���<br>
<br>
�������ࡦ�֥�å���PHP�⡼�ɤǺ������������������롣<br>
<div class='cyan'>
    include_once XOOPS_ROOT_PATH.&quot;/modules/weblinks/include/atomfeed.inc.php&quot;;<br>
    weblinks_view_blog(???);<br>
</div>
??? �ϥ��ID<br>

<H4>��������ڤ�θ���</H4>
�ɤ����������ǥ���ڤ�򸡺����뤫��<br>
���Ĥ���ˡ������ޤ���<br>
<br>
������ ���ѼԤ������դ����Ȥ��ˡ�����ڤ�����򤹤롣<br>
mylinks ����Ѿ�������ˡ�Ǥ���<br>
<br>
������ �����Ԥ���ư�Ǹ������롣<br>
<br>
������ ���ޥ�ɥ饤��⡼�ɤǡ����Ū�˸������롣<br>
������ˡ<br>
(1) cache �ǥ��쥯�ȥꥣ ��񤭹��߲�ǽ�ˤ��롣<br>
(2) Weblinks�δ����Բ��̤�ꡢ�֤���¾�ε�ǽ�� -&gt; ��create config file for bin�� ��¹Ԥ��롣<br>
(3) bin/link_check.php �� $XOOPS_ROOT_PATH ��ʬ�δĶ��˹�碌���ѹ����롣<br>
<br>
(4) crontab �˲����Τ褦�������ä��롣<br>
<div class='cyan'>
    11 2 * * 0 /usr/bin/php4 -q -f /home/***/html/modules/weblinks/bin/link_check.php
</div>

<H4>����RSS/ATOM�����μ���</H4>
�ɤ�����������RSS/ATOM������������뤫��<br>
���Ĥ���ˡ������ޤ���<br>
<br>
������ singlelink.php �ˤƥ�󥯾ܺ٤�ɽ������Ȥ��ˡ����Υ�󥯤����������<br>
�������ꤷ�ʤ��Ȥ⡢�¹Ԥ���ޤ���<br>
�����Բ��̤��饭��å�����֤�����Ǥ��ޤ���<br>
����ͤ�24���֤Ǥ���<br>
<br>
������ �������ࡦ�֥�å��ˤ�blog��ɽ������Ȥ��ˡ����Υ�󥯤���������롣<br>
<br>
������ �����Ԥ���ư�����ƤΥ�󥯤����������<br>
<br>
������ ���ޥ�ɥ饤��⡼�ɤǡ����Ū�����ƤΥ�󥯤���������롣<br>
������ˡ<br>
(1) cache �ǥ��쥯�ȥꥣ ��񤭹��߲�ǽ�ˤ��롣<br>
(2) Weblinks�δ����Բ��̤�ꡢ�֤���¾�ε�ǽ�� -&gt; ��create config file for bin�� ��¹Ԥ��롣<br>
(3) bin/rss_refresh_link.php �� $XOOPS_ROOT_PATH ��ʬ�δĶ��˹�碌���ѹ����롣<br>
<br>
(4) crontab �˲����Τ褦�������ä��롣<br>
<div class='cyan'>
    22 3 * * * /usr/bin/php4 -q -f /home/***/html/modules/weblinks/bin/rss_refresh_link.php
</div>
<br>
�ʤ���bin/rss_refresh_site.php �ϡ�<br>�֥⥸�塼������ꣲ�פΡ�RSS���������ȡפ����ꤷ�������Ȥ򹹿����륳�ޥ�ɤǤ���<br>
<br>
������ �⤦���Ĥ���ˡ<br>
�֥�󥯽��ο���RSS/ATOM�����פΥ֥�å���ɽ������Ȥ��ˡ����ƤΥ�󥯤���������롣<br>
���ݡ��Ȥ��Ƥ��ʤ���<br>
RSS/ATOM�б��Υ�󥯤�¿���ȡ������ॢ���Ȥ����ǽ�����ꡣ<br>
<br>
<hr>
<div align="center"><a href="index.html">�ܼ�</a></div>
$Id: admin_1.html,v 1.1 2011/12/29 14:33:02 ohwada Exp $
</BODY>
</HTML>
