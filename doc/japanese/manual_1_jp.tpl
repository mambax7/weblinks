<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=EUC-JP">
    <META http-equiv="Content-Style-Type" content="text/css">
    <TITLE>WebLinks �ޥ˥奢��</TITLE>
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
<h3 class="SoftwareHead">WebLinks �ޥ˥奢��</h3>
¾�Υ⥸�塼��ȻȤ������㤦��Τ䡢����ä�ʬ����ˤ����Ȥ�����������Ƥ��ޤ���<br>
<h4>����RSS/ATOM�ط��Υ֥�å�</h4>
������ ��󥯽��ο���RSS/ATOM����<BR>
viewfeed.php ������ε�ǽ�Ǥ���<BR>
�ơ��֥� atomfeed �˳�Ǽ���줿RSS/ATOM���������դο������礫��ɽ�����ޤ���<BR>
���Υ֥�å���ɽ�����Ƥ⡢������RSS/ATOM�����μ����ϹԤ��ޤ���<BR>
�����˴ؤ��Ƥϡ�RSS/ATOM�����μ����פ�������������<BR>
<BR>
������ ��󥯽���blogɽ��<BR>
�ơ��֥� atomfeed �˳�Ǽ���줿RSS/ATOM�������顢����Υ�󥯤ε��������դο������礫��ɽ�����ޤ���<BR>
��������Ʊ�ͤˡ����Υ֥�å���ɽ�����Ƥ⡢������RSS/ATOM�����μ����ϹԤ��ޤ���<BR>
<BR>
�֥�å��������֥�󥯽���blogɽ���פ��Խ����̤򳫤���<BR>
ɽ������blog�Υ��ID�����ꤷ�ޤ���<BR>
<BR>
������ �������ࡦ�֥�å��ˤ�blog��ɽ������<BR>
������������ε�ǽ�Ǥ���<BR>
�㤤�ϡ����Ĥ���ޤ���<BR>
(1) ʣ���Υ�󥯤��Ф��ơ����줾��blog��ɽ���Ǥ��ޤ���<BR>
(2) ���Υ֥�å���ɽ������Ȥ��ˡ�������RSS/ATOM�����μ�����Ԥ��ޤ���<BR>
<BR>
�������ࡦ�֥�å���PHP�⡼�ɤǺ������������������롣<BR>
<div class='cyan'>
    include_once XOOPS_ROOT_PATH.&quot;/modules/weblinks/include/atomfeed.inc.php&quot;;<BR>
    weblinks_view_blog(???);<BR>
</div>
??? �ϥ��ID<BR>
<H4>��������ڤ�θ���</H4>
�ɤ����������ǥ���ڤ�򸡺����뤫��<BR>
���Ĥ���ˡ������ޤ���<BR>
<BR>
������ ���ѼԤ������դ����Ȥ��ˡ�����ڤ�����򤹤롣<BR>
mylinks ����Ѿ�������ˡ�Ǥ���<BR>
<BR>
������ �����Ԥ���ư�Ǹ������롣<BR>
<BR>
������ ���ޥ�ɥ饤��⡼�ɤǡ����Ū�˸������롣<BR>
<BR>
cache �ǥ��쥯�ȥꥣ ��񤭹��߲�ǽ�ˤ��롣<BR>
Weblinks�δ����Բ��̤�ꡢ�֤���¾�ε�ǽ�� -&gt; ��create config file for bin�� ��¹Ԥ��롣<BR>
bin/link_check.php �� $XOOPS_ROOT_PATH ��ʬ�δĶ��˹�碌���ѹ����롣<BR>
<BR>
crontab �˲����Τ褦�������ä��롣<BR>
<div class='cyan'>
    11 2 * * 0 /usr/bin/php4 -q -f /home/***/html/modules/weblinks/bin/link_check.php
</div>
<H4>����RSS/ATOM�����μ���</H4>
�ɤ�����������RSS/ATOM������������뤫��<BR>
���Ĥ���ˡ������ޤ���<BR>
<BR>
������ singlelink.php �ˤƥ�󥯾ܺ٤�ɽ������Ȥ��ˡ����Υ�󥯤����������<BR>
�������ꤷ�ʤ��Ȥ⡢�¹Ԥ���ޤ���<BR>
�����Բ��̤��饭��å�����֤�����Ǥ��ޤ���<BR>
����ͤ�24���֤Ǥ���<BR>
<BR>
������ �������ࡦ�֥�å��ˤ�blog��ɽ������Ȥ��ˡ����Υ�󥯤���������롣<BR>
<BR>
������ �����Ԥ���ư�����ƤΥ�󥯤����������<BR>
<BR>
������ ���ޥ�ɥ饤��⡼�ɤǡ����Ū�����ƤΥ�󥯤���������롣<BR>
<BR>
cache �ǥ��쥯�ȥꥣ ��񤭹��߲�ǽ�ˤ��롣<BR>
Weblinks�δ����Բ��̤�ꡢ�֤���¾�ε�ǽ�� -&gt; ��create config file for bin�� ��¹Ԥ��롣<BR>
bin/rss_refresh.php �� $XOOPS_ROOT_PATH ��ʬ�δĶ��˹�碌���ѹ����롣<BR>
<BR>
crontab �˲����Τ褦�������ä��롣<BR>
<div class='cyan'>
    22 3 * * * /usr/bin/php4 -q -f /home/***/html/modules/weblinks/bin/rss_refresh.php
</div>
<BR>
������ �֥�󥯽��ο���RSS/ATOM�����פΥ֥�å���ɽ������Ȥ��ˡ����ƤΥ�󥯤���������롣<BR>
���ݡ��Ȥ��Ƥ��ʤ���<BR>
RSS/ATOM�б��Υ�󥯤�¿���ȡ������ॢ���Ȥ����ǽ�����ꡣ<BR>
<H4>�����ϰ��¸��</H4>
�����ϰ��¸��<BR>
������ �Ͽޥ����ȡ�yahoo�ˤؤΥ��<BR>
���ܤ��ƹ�Ǥ��������ۤʤ롣<BR>
<BR>
(1) ���ܤǤϡ�yahoo�ؽ�����Ϥ������򡢸����Ǥ��롣<BR>
<div class='cyan'>
    &lt;a href=&quot;http��//search.map.yahoo.co.jp/search?p=&lt;{$link.addr_encode}&gt;&quot; target=_blank&gt;<BR>
    &lt;img src=&quot;&lt;{$module_url}&gt;/images/map.png&quot; board=&quot;0&quot; alt=&quot;map&quot;&gt;&lt;/a&gt;<BR>
</div>

<BR>
(2) �ƹ�Ǥϡ�����ʳ��ˡ�͹���ֹ桢������ ���Ϥ�ɬ�פ����롣<BR>
<div class='cyan'>
    &lt;form action=&quot;http��//us.rd.yahoo.com/maps/home/submit_a/*-http://maps.yahoo.com/maps&quot; target=&quot;_blank&quot; method=get&gt;<BR>
    &lt;input type=&quot;hidden&quot; name=&quot;addr&quot; value=&quot;&lt;{$link.address}&gt;&quot;&gt;<BR>
    &lt;input type=&quot;hidden&quot; name=&quot;csz&quot; value=&quot;&lt;{$link.city}&gt;, &lt;{$link.state}&gt; &lt;{$link.zip}&gt;&quot;&gt;<BR>
    &lt;input type=&quot;hidden&quot; name=&quot;country&quot; value=&quot;us&quot;&gt;<BR>
    &lt;input type=hidden name=srchtype value=a&gt;<BR>
    &lt;input type=submit name=&quot;getmap&quot; value=&quot;Map&quot;&gt;<BR>
    &lt;/form&gt;<BR>
</div>
<BR>
(3) �㤤�εۼ�<BR>
����ϡ��ƥ�ץ졼�� weblinks_link.html �������ޤ�Ƥ��롣<BR>
�����ϡ������ѤΤ�Τ����ʤ���<BR>
<BR>
������ ���������ȡ�googole�ˤؤΥ��<BR>
���ܤ��ƹ�Ǥ�gogole��URL���ۤʤ롣<BR>
<BR>
(1) ����<BR>
http��//www.google.co.jp/search?hl=ja&amp;amp;q=<BR>
<BR>
(2) �ƹ�<BR>
http��//www.google.com/search?hl=en&amp;amp;q=<BR>
<BR>
(3) �㤤�εۼ�<BR>
URL�� �����̥ե������ admin.php �ˤ����ꤷ�Ƥ��롣<BR>
<BR>
������ ͧã�˶�����<BR>
���ܸ�ͭ�λ��𤬤��롣<BR>
ʸ�������ɤ� SJIS,JIS,EUC-JP ��ʣ�����롣<BR>
�����С���ʸ�������ɤȥ��饤�����PC��ʸ�������ɤ��ۤʤ�ȡ�<BR>
��ͧã�˶�����פ�ʸ���������롣<BR>
����ˡ����饤�����PC�ˤƻ��Ѥ��Ƥ���᡼�롦���ץꡦ���եȤ�ط����Ƥ��ꡢʣ���ʸ��ݤ򵯤����Ƥ��롣<BR>
<BR>
�ҤȤޤ����к��Ȥ��ơ�<BR>
���饤�����PC��OS����Windows �� MAC �Ǥ���С�<BR>
ʸ�������ɤ� SJIS ���Ѵ����Ƥ��롣<BR>
<BR>
�㤤�εۼ�<BR>
���ν����ϡ������̽����ե������ language_convert.php �ˤƼ������Ƥ��롣<BR>
<BR>
<hr>
<div align="center"><a href="index.html">�ܼ�</a></div>
$Id: manual_1_jp.html,v 1.1 2011/12/29 14:33:02 ohwada Exp $
</BODY>
</HTML>
