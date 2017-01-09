<?php
function bulidRandomString($type=1,$length=5){

	if ($type == 1) {
		$char = join ( "", range ( 0, 9 ) );
	} elseif ($type == 2) {
		$char = join ( "", array_merge ( range ( "a", "z" ), range ( "A", "Z" ) ) );
	} elseif ($type == 3) {
		$char = join ( "", array_merge ( range ( "a", "z" ), range ( "A", "Z" ), range ( 0, 9 ) ) );
	}
	
	if ($length > strlen ( $char )) {
		exit ( "�ַ������Ȳ���" );
	}
	$char = str_shuffle ( $char ); // ��������ַ�
	return substr ( $char, 0, $length );
}

//����Ψһ�ַ�����uniqid����Ψһ�ַ���microtime��ʾ��ǰ׺
function getUniName(){
	return md5(uniqid(microtime(true),true));
}
//�õ��ļ���չ��
function getExt($filename){
	$prv_filename = explode(".", $filename);
	return strtolower(end($prv_filename));
}
