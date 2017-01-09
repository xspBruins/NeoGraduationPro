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

        //�жϴ�����Ϣ
        if ($fileInfo['error'] == UPLOAD_ERR_OK) {
		$ext = getExt ( $fileInfo['name'] ); // ȡ���ļ���չ��
		$filename = getUniName () . "." . $ext; // getUniName()���Ψһ���ּ�����չ����������Ψһ�ļ�������֤�����ظ��ϴ�һ��ͼƬ
		// �ϴ��ļ������Ƿ�����������֮��
		if (! in_array ( $ext, $allowExt )) {
			exit ( "�Ƿ��ļ�����!" );
		}
		// �����ϴ��ļ���С
		if ($fileInfo['size'] > $maxSize) {
			exit ( "�ϴ��ļ�����2M!" );
		}
		// ���û���ļ��У����д���
		if (! file_exists ( $path )) {
			mkdir ( $path, 0777, true ); // $path��ʾĿ¼·����0777����Ŀ¼����Ȩ��Ϊ���true������Դ����༶Ŀ¼
		}
		// �����ļ��Ƿ����ΪͼƬ����
		if ($imgFlag) {
			$info = getimagesize ( $fileInfo['tmp_name'] );
			if (! $info) {
				exit ( "���ļ���������ͼƬ����!" );
			}
		}
		$destination = $path . "/" . $filename;
		if (is_uploaded_file ( $fileInfo['tmp_name'] )) { // �ж��ļ��Ƿ�ͨ��HTTP POST��ʽ�ϴ���
			if (move_uploaded_file ( $fileInfo['tmp_name'], $destination )) {
				$mes = "�ļ��ϴ��ɹ�";
			} else {
				$mes = "�ļ��ƶ�ʧ��";
			}
		} else {
			$mes = "�ļ�����ͨ��HTTP POST��ʽ�ϴ���";
		}
	} else {
		switch ($fileInfo['error']) {
			case 1 :
				$mes = "���������ļ��ϴ��ļ���С";
				break;
			case 2 :
				$mes = "�����������ϴ��ļ���С";
				break;
			case 3 :
				$mes = "�ļ����ֱ��ϴ�";
				break;
			case 4 :
				$mes = "û���ļ����ϴ�";
				break;
			case 6 :
				$mes = "û���ҵ���ʱ�ļ�";
				break;
			case 7 :
				$mes = "�ļ�����д";
				break;
			case 8 :
				$mes = "����PHP����չ�����ж��ļ��ϴ�";
				break;
		}
	}
	return $filename;

}

