<?php
require_once '../lib/string.func.php';
header("content-type:text/html;charset=gb2312");
//print_r($_FILES);
/*$filename = $_FILES['pImg']['name'];
$type = $_FILES['pImg']['type'];
$tmp_name = $_FILES['pImg']['tmp_name'];
$error = $_FILES['pImg']['error'];
$size = $_FILES['pImg']['size'];*/


function uploadImg($fileInfo,$path = "uploads",$allowExt = array("gif","jpeg","jpg","png","wbmp"),$maxSize = 1048576,$imgFlag = true){

        //判断错误信息
        if ($fileInfo['error'] == UPLOAD_ERR_OK) {
		$ext = getExt ( $fileInfo['name'] ); // 取得文件扩展名
		$filename = getUniName () . "." . $ext; // getUniName()获得唯一名字加上扩展名，即生成唯一文件名，保证可以重复上传一张图片
		// 上传文件类型是否在允许类型之中
		if (! in_array ( $ext, $allowExt )) {
			exit ( "非法文件类型!" );
		}
		// 限制上传文件大小
		if ($fileInfo['size'] > $maxSize) {
			exit ( "上传文件超过2M!" );
		}
		// 如果没有文件夹，自行创建
		if (! file_exists ( $path )) {
			mkdir ( $path, 0777, true ); // $path表示目录路径，0777代表目录操作权限为最大，true代表可以创建多级目录
		}
		// 检验文件是否真的为图片类型
		if ($imgFlag) {
			$info = getimagesize ( $fileInfo['tmp_name'] );
			if (! $info) {
				exit ( "该文件不是真正图片类型!" );
			}
		}
		$destination = $path . "/" . $filename;
		if (is_uploaded_file ( $fileInfo['tmp_name'] )) { // 判断文件是否通过HTTP POST方式上传的
			if (move_uploaded_file ( $fileInfo['tmp_name'], $destination )) {
				$mes = "文件上传成功";
			} else {
				$mes = "文件移动失败";
			}
		} else {
			$mes = "文件不是通过HTTP POST方式上传的";
		}
	} else {
		switch ($fileInfo['error']) {
			case 1 :
				$mes = "超过配置文件上传文件大小";
				break;
			case 2 :
				$mes = "超过表单设置上传文件大小";
				break;
			case 3 :
				$mes = "文件部分被上传";
				break;
			case 4 :
				$mes = "没有文件被上传";
				break;
			case 6 :
				$mes = "没有找到临时文件";
				break;
			case 7 :
				$mes = "文件不可写";
				break;
			case 8 :
				$mes = "由于PHP的扩展程序中断文件上传";
				break;
		}
	}
	return $filename;

}

