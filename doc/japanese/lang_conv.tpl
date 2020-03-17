<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=EUC-JP">
    <META http-equiv="Content-Style-Type" content="text/css">
    <TITLE>language_base.php �� language_convert.php ������</TITLE>
    <style type="text/css">
        <!--
        h3.SoftwareHead {
            text-align: center;
            background-color: #FFFFE0; /* LightYellow */
        }

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
<h3 class="SoftwareHead">WebLinks ��ȯ�Ը��� ʸ��</h3>
<h4>������ˤ��㤤</h4>
<h4>language_base.php �� language_convert.php ������</h4>
<P>���̤�<B><FONT color="#0000ff">language_base.php</FONT></B> �� ����ѥå����<B><FONT color="#0000ff">language_convert.php</FONT></B> �ǵۼ����Ƥ��롣<BR>
    language_convert.php �� language_base.php ���饯�饹��Ѿ����Ƥ��롣<BR>
    �ؿ��������򲼵��˼�����</P>
<H4>��ǽ������</H4>
<TABLE class="main" border="1">
    <TBODY>
    <TR>
        <TD width="20%" align="center">�ؿ�̾</TD>
        <TD width="40%" align="center">��ǽ</TD>
        <TD width="40%" align="center">����</TD>
    </TR>
    <TR>
        <TD colspan="3">�ޥ���Х��ȴؿ�����Ѥ�����</TD>
    </TR>
    <TR>
        <TD>convert_encode_to_utf8<BR>
            ($text, $encode)
        </TD>
        <TD>�ƥ�����($text)����ꤷ��ʸ��������($encode)����UTF-8���Ѵ�����</TD>
        <TD>��������RSS��UTF-8���Ѵ����롣<BR>
            RSS��ʸ�������ɤϡ�XML��encoding����Ƚ�Ǥ��Ƥ��롣<BR>
            ���������ꤵ��Ƥ��ʤ���Τϡ�UTF-8�ȸ��ʤ��Ƥ��롣<BR>
        </TD>
    </TR>
    <TR>
        <TD>convert_from_utf8($text)</TD>
        <TD>�ƥ�����($text)��UTF-8����������ʸ�������ɤ��Ѵ�����</TD>
        <TD>��������RSS����Ϥ�����̤����������ɤ��Ѵ�����</TD>
    </TR>
    <TR>
        <TD>convert_to_utf8($text)</TD>
        <TD>�ƥ�����($text)��������ʸ�������ɤ���UTF-8���Ѵ�����</TD>
        <TD>RSS����Ϥ���Ȥ��ˡ�UTF-8���Ѵ�����</TD>
    </TR>
    <TR>
        <TD>shorten_text($text,$max)</TD>
        <TD>�ƥ�����($text)����ꤷ��ʸ������$max�ˤǴݤ��</TD>
        <TD>������������</TD>
    </TR>
    <TR>
        <TD>send_mail<BR>
            ($mailto, $subject, $body, $header)
        </TD>
        <TD>�᡼�����������<BR>
            ������PHP��mail�ؿ���Ʊ��
        </TD>
        <TD>���ޥ�ɥ饤��ǻ��Ѥ���<BR>
        </TD>
    </TR>

    <TR>
        <TD colspan="3">�ޥ���Х��ȴؿ�����Ѥ�������ܸ�Ķ�����ͭ�ʤ�Ρ�</TD>
    </TR>
    <TR>
        <TD>convert_telafriend_subject($text)</TD>
        <TD>�ƥ�����($text)��������ʸ�������ɤ����̤�ʸ�������ɤ��Ѵ�����</TD>
        <TD>��ͧã�����פ�ʸ�������к�</TD>
    </TR>
    <TR>
        <TD>convert_telafriend_body($text)</TD>
        <TD>Ʊ��</TD>
        <TD>Ʊ��</TD>
    </TR>
    <TR>
        <TD>convert_download_filename($text)</TD>
        <TD>Ʊ��</TD>
        <TD>�֥�������ɥե�����̾�פ�ʸ�������к�<BR>
            ���ϻ��Ѥ��Ƥ��ʤ�
        </TD>
    </TR>
    <TR>
        <TD>convert_sjis_win_mac($text)</TD>
        <TD>���饤�����PC �� Windows ���뤤�� MAC �ΤȤ���<br>
            �ƥ�����($text)�� EUC-JP ���� SJIS ���Ѵ�����
        </TD>
        <TD>��ͧã�����פ�ʸ�������к�</TD>
    </TR>
    <TR>
        <TD>convert_space_zen_to_han($text)</TD>
        <TD>�ƥ�����($text)�����Ѷ����Ⱦ�Ѷ�����Ѵ�����</TD>
        <TD>�����������Ѷ����ñ��ζ��ڤ�Ȥ���</TD>
    </TR>

    <TR>
        <TD colspan="3">
            <P>�ޥ���Х��ȴؿ�����Ѥ��ʤ����</P>
        </TD>
    </TR>
    <TR>
        <TD>get_google_url()</TD>
        <TD>���δؿ������ꤷ��<BR>
            google�����Ȥ�URL���������<BR>
        </TD>
        <TD>����URL����<BR>
            ��󥯾���򸡺����륵���ȤȤʤ�
        </TD>
    </TR>
    <TR>
        <TD>get_country()</TD>
        <TD>���δؿ������ꤷ��<BR>
            ��̾���������
        </TD>
        <TD>���ι�̾�򸵤ˡ�<BR>
            �Ͽޥ����ȤΥ����ˡ�����򤹤�
        </TD>
    </TR>
    <TR>
        <TD>get_happy_linux_url()</TD>
        <TD>���δؿ������ꤷ��<BR>
            ��ȯ���Υ����Ȥ�URL���������
        </TD>
        <TD>����URL��<BR>
            Powered by �Υ����Ȥʤ�
        </TD>
    </TR>
    <TR>
        <TD>presume_agent()</TD>
        <TD>�֥饦���� agent ���¬����</TD>
        <TD>��ͧã�����פ�ʸ�������к�</TD>
    </TR>
    </TBODY>
</TABLE>
<h4>����ȹ�ˤ������ΰ㤤</h4>
<TABLE class="main" border="1">
    <TBODY>
    <TR>
        <TD width="20%" align="center">�ؿ�̾</TD>
        <TD width="30%" align="center">�ǥե���ȡʱѸ��<BR>
            language_base.php
        </TD>
        <TD width="30%" align="center">���ܸ�<BR>language_convert.php</TD>
        <TD width="20%" align="center">����¾�θ���</TD>
    </TR>
    <TR>
        <TD colspan="4">�ޥ���Х��ȴؿ�����Ѥ���</TD>
    </TR>
    <TR>
        <TD>convert_encode_to_utf8($text, $encode)</TD>
        <TD>���ꤵ�줿ʸ�������ɤ���UTF-8���Ѵ�����<BR>
            utf8_encode�ؿ�����Ѥ���
        </TD>
        <TD>���ꤵ�줿ʸ�������ɤ���UTF-8���Ѵ����� <BR>
            mb_convert_encoding�ؿ�����Ѥ���
        </TD>
        <TD>���ꤵ�줿ʸ�������ɤ���UTF-8���Ѵ�����</TD>
    </TR>
    <TR>
        <TD>convert_from_utf8($text)</TD>
        <TD>UTF-8����US-ASCII���Ѵ�����<BR>
            utf8_decode�ؿ�����Ѥ���
        </TD>
        <TD>UTF-8����EUC-JP���Ѵ�����<BR>
            mb_convert_encoding�ؿ�����Ѥ���
        </TD>
        <TD>UTF-8���餽�ι��ʸ�������ɤ��Ѵ�����</TD>
    </TR>
    <TR>
        <TD>convert_to_utf8($text)</TD>
        <TD>US-ASCII���餫��UTF-8���Ѵ�����<BR>
            utf8_encode�ؿ�����Ѥ���
        </TD>
        <TD>EUC-JP���餫��UTF-8���Ѵ����� <BR>
            mb_convert_encoding�ؿ�����Ѥ���
        </TD>
        <TD>���ι��ʸ�������ɤ���UTF-8���Ѵ�����</TD>
    </TR>
    <TR>
        <TD>shorten_text($text,$max)</TD>
        <TD>substr�ؿ�����Ѥ���<BR>
        </TD>
        <TD>mb_strimwidth�ؿ�����Ѥ���</TD>
        <TD>���ι��ʸ�������ɤ˹�碌�ơ�ʸ�����ݤ��</TD>
    </TR>
    <TR>
        <TD>send_mail($mailto, $subject, $body, $header)</TD>
        <TD>mail�ؿ��Υ�åѡ�</TD>
        <TD>mb_send_mail�ؿ��Υ�åѡ�<BR>
        </TD>
        <TD>���ι��ʸ�������ɤ˹�碌�ơ��᡼��ؿ������ꤹ��</TD>
    </TR>
    <TR>
        <TD colspan="4">�ޥ���Х��ȴؿ�����Ѥ�������ܸ�Ķ�����ͭ�ʤ�Ρ�</TD>
    </TR>
    <TR>
        <TD>convert_telafriend_subject($text)</TD>
        <TD>���⤷�ʤ�</TD>
        <TD>EUC-JP��SJIS���Ѵ�����<BR>
            convert_sjis_win_mac() ��ƤӽФ�
        </TD>
        <TD>�ä�ɬ�פʤ�</TD>
    </TR>
    <TR>
        <TD>convert_telafriend_body($text)</TD>
        <TD>Ʊ��</TD>
        <TD>Ʊ��</TD>
        <TD>Ʊ��</TD>
    </TR>
    <TR>
        <TD>convert_download_filename($text)</TD>
        <TD>Ʊ��</TD>
        <TD>Ʊ��</TD>
        <TD>Ʊ��</TD>
    </TR>
    <TR>
        <TD>convert_sjis_win_mac($text)</TD>
        <TD>---</TD>
        <TD>EUC-JP��SJIS���Ѵ�����<BR>mb_convert_encoding�ؿ�����Ѥ���</TD>
        <TD>Ʊ��</TD>
    </TR>
    <TR>
        <TD>convert_space_zen_to_han($text)</TD>
        <TD>���⤷�ʤ�</TD>
        <TD>���Ѷ����Ⱦ�Ѷ�����Ѵ�����<BR>mb_convert_kana�ؿ�����Ѥ���</TD>
        <TD>Ʊ��</TD>
    </TR>

    <TR>
        <TD colspan="4">�ޥ���Х��ȴؿ�����Ѥ��ʤ����</TD>
    </TR>
    <TR>
        <TD>get_google_url()</TD>
        <TD>http://www.google.com/search?<BR>
            hl=en&amp;amp;q=<BR>
        </TD>
        <TD>http://www.google.co.jp/search?<BR>
            hl=ja&amp;amp;q=
        </TD>
        <TD>���ι�˹�碌�ƥ����Ȥ����ꤹ��</TD>
    </TR>
    <TR>
        <TD>get_country()</TD>
        <TD>usa</TD>
        <TD>japan</TD>
        <TD>�ä�ɬ�פʤ�<BR>
            �ƹ�Ȱۤʤ�Ȥ��ϡ��ƥ�ץ졼�Ȥ��ѹ�����ɬ�פ���
        </TD>
    </TR>
    <TR>
        <TD>get_happy_linux_url()</TD>
        <TD>http://linux2.ohwada.net/</TD>
        <TD>http://linux.ohwada.jp/</TD>
        <TD>�ä�ɬ�פʤ�</TD>
    </TR>
    <TR>
        <TD>presume_agent()</TD>
        <TD>�֥饦����agent���¬����</TD>
        <TD>---</TD>
        <TD>---</TD>
    </TR>
    </TBODY>
</TABLE>
<br>
<hr>
<div align="center"><a href="index.html">�ܼ�</a></div>
$Id: lang_conv.html,v 1.1 2011/12/29 14:33:02 ohwada Exp $
</BODY>
</HTML>
