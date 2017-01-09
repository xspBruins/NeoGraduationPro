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
		exit ( "字符串长度不够" );
	}
	$char = str_shuffle ( $char ); // 随机打乱字符
	return substr ( $char, 0, $length );
}

//生成唯一字符串，uniqid生成唯一字符，microtime表示加前缀
function getUniName(){
	return md5(uniqid(microtime(true),true));
}
//得到文件扩展名
function getExt($filename){
	$prv_filename = explode(".", $filename);
	return strtolower(end($prv_filename));
}
