$Id: readme_jp.txt,v 1.1 2011/12/29 14:32:32 ohwada Exp $

=================================================
HTML�o�̓v���O�C���̍���
=================================================

�v���O�C������ "foobar" �Ƃ��܂�

1. �v���O�C���̋L�q��

htmlout/foobar.php
------
if( !class_exists('weblinks_htmlout_foobar') ) 
{

class weblinks_htmlout_foobar extends weblinks_htmlout_base
{

function weblinks_htmlout_foobar( $dirname )
{
	parent::__construct( $dirname );
}

function description()
{
	// �����͉p��̐�����
	return "this is foobar description";
}

function execute_plugin()
{
	$content = $this->get_item_by_key( 'content' );
	$converted = xxx;	// �����ɕϊ�����������
	$this->set_item_by_key( 'content', $converted );
	return true;
}

} // class �̏I���
} // class_exists �̏I���
-----

2. ���{��̐������̋L�q��

htmlout/language/japanese/foobar.php
-----
$PLUGIN_DESCRIPTION = "����� foobar �̐������ł�";
-----
