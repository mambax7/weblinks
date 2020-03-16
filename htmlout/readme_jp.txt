$Id: readme_jp.txt,v 1.1 2008/02/26 16:05:20 ohwada Exp $

=================================================
HTML?o�̓v���O�C����?���
=================================================

�v���O�C������ "foobar" �Ƃ��܂�

1. �v���O�C���̋L?q��

htmlout/foobar.php
------
if( !class_exists('HtmloutFoobar') )
{

class HtmloutFoobar extends HtmloutBase
{

function weblinks_htmlout_foobar( $dirname )
{
    $this->HtmloutBase( $dirname );
}

function description()
{
    // �����͉p���?�����
    return "this is foobar description";
}

function execute_plugin()
{
    $content = $this->get_item_by_key( 'content' );
    $converted = xxx;   // �����ɕϊ�?��?��?���
    $this->set_item_by_key( 'content', $converted );
    return true;
}

} // class ��?I���
} // class_exists ��?I���
-----

2. ���{���?������̋L?q��

htmlout/language/japanese/foobar.php
-----
$PLUGIN_DESCRIPTION = "����� foobar ��?������ł�";
-----
