<?php
require_once 'string.func.php';
// ͨ��GD������֤��
function verifyImage($type = 1, $length = 5, $pixel = 100, $line = 11, $sess_name = "verify") {
	session_start();
	// ��������
	$width = 90;
	$height = 36;
	$image = imagecreatetruecolor ( $width, $height );
	$white = imagecolorallocate ( $image, 255, 255, 255 );
	$black = imagecolorallocate ( $image, 0, 0, 0 );
	
	// ��������仭��
	$type = 1;
	$length = 5;
	imagefilledrectangle ( $image, 1, 1, $width - 2, $height - 2, $white );
	$chars = bulidRandomString ( $type, $length );
	$_SESSION [$sess_name] = $chars;
	$fontfiles = array (
			"BITSUMISHI.TTF",
			"MSYH.TTF",
			"MSYHBD.TTF",
			"SIMKAI.TTF",
			"SIMSUN.TTC" 
	);
	
	for($i = 0; $i < $length; $i ++) {
		$size = mt_rand ( 14, 18 );
		$angle = mt_rand ( - 15, 15 );
		$x = 18 * $i + 4;
		$y = mt_rand ( 20, 26 );
		$color = imagecolorallocate ( $image, mt_rand ( 50, 90 ), mt_rand ( 80, 200 ), mt_rand ( 90, 180 ) );
		$fontfile = "../fonts/" . $fontfiles [mt_rand ( 0, count ( $fontfiles ) - 1 )];
		$text = substr ( $chars, $i, 1 );
		imagettftext ( $image, $size, $angle, $x, $y, $color, $fontfile, $text );
	}
	
	for($i = 0; $i < $pixel; $i ++) {
		imagesetpixel ( $image, mt_rand ( 0, $width - 1 ), mt_rand ( 0, $height - 1 ), $black );
	}
	
	for($i = 1; $i < $line; $i ++) {
		$color = imagecolorallocate ( $image, mt_rand ( 50, 90 ), mt_rand ( 80, 200 ), mt_rand ( 90, 180 ) );
		imageline ( $image, mt_rand ( 0, $width - 1 ), mt_rand ( 0, $height - 1 ), mt_rand ( 0, $width - 1 ), mt_rand ( 0, $height - 1 ), $color );
	}
	
	header ( "content-type:image/gif" );
	imagegif ( $image );
	imagedestroy ( $image );
}

//��������ͼ
function img_create_small($big_img, $width, $height, $small_img) {//ԭʼ��ͼ��ַ������ͼ��ȣ��߶ȣ�����ͼ��ַ
    $imgage = getimagesize($big_img); //�õ�ԭʼ��ͼƬ
    switch ($imgage[2]) { // ͼ�������ж�
        case 1:
            $im = imagecreatefromgif($big_img);
            break;
        case 2:
            $im = imagecreatefromjpeg($big_img);
            break;
        case 3:
            $im = imagecreatefrompng($big_img);
            break;
    }
    $src_W = $imgage[0]; //��ȡ��ͼƬ���
    $src_H = $imgage[1]; //��ȡ��ͼƬ�߶�
    $tn = imagecreatetruecolor($width, $height); //��������ͼ
    imagecopyresampled($tn, $im, 0, 0, 0, 0, $width, $height, $src_W, $src_H); //����ͼ�񲢸ı��С
    imagejpeg($tn, $small_img); //���ͼ��
}
//��ȡͼ�����
function img_create_part($src_path,$x,$y){

    //����Դͼ��ʵ��
    $src = imagecreatefromstring(file_get_contents($src_path));
    
    //�ü����������Ͻǵĵ������
    $x = 100;
    $y = 12;
    //�ü�����Ŀ�͸�
    $width = 123;
    $height = 123;
    //���ձ����ͼƬ�Ŀ�͸ߣ���ԴҪ�ȱ�������������
    $final_width = 100;
    $final_height = round($final_width * $height / $width);
    
    //���ü������Ƶ���ͼƬ�ϣ�������Դ��Ŀ��Ŀ�߽������Ż�������
    $new_image = imagecreatetruecolor($final_width, $final_height);
    imagecopyresampled($new_image, $src, 0, 0, $x, $y, $final_width, $final_height, $width, $height);
    
    //���ͼƬ
    header('Content-Type: image/jpeg');
    imagejpeg($new_image);
    
    imagedestroy($src);
    imagedestroy($new_image);
    
}


