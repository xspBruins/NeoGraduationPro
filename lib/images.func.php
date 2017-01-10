<?php
require_once 'string.func.php';
// 通过GD库做验证码
function verifyImage($type = 1, $length = 5, $pixel = 100, $line = 11, $sess_name = "verify") {
	session_start();
	// 创建画布
	$width = 90;
	$height = 36;
	$image = imagecreatetruecolor ( $width, $height );
	$white = imagecolorallocate ( $image, 255, 255, 255 );
	$black = imagecolorallocate ( $image, 0, 0, 0 );
	
	// 填充矩形填充画布
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

//生成缩略图
function img_create_small($big_img, $width, $height, $small_img) {//原始大图地址，缩略图宽度，高度，缩略图地址
    $imgage = getimagesize($big_img); //得到原始大图片
    switch ($imgage[2]) { // 图像类型判断
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
    $src_W = $imgage[0]; //获取大图片宽度
    $src_H = $imgage[1]; //获取大图片高度
    $tn = imagecreatetruecolor($width, $height); //创建缩略图
    imagecopyresampled($tn, $im, 0, 0, 0, 0, $width, $height, $src_W, $src_H); //复制图像并改变大小
    imagejpeg($tn, $small_img); //输出图像
}
//截取图像并输出
function img_create_part($src_path,$x,$y){

    //创建源图的实例
    $src = imagecreatefromstring(file_get_contents($src_path));
    
    //裁剪开区域左上角的点的坐标
    $x = 100;
    $y = 12;
    //裁剪区域的宽和高
    $width = 123;
    $height = 123;
    //最终保存成图片的宽和高，和源要等比例，否则会变形
    $final_width = 100;
    $final_height = round($final_width * $height / $width);
    
    //将裁剪区域复制到新图片上，并根据源和目标的宽高进行缩放或者拉升
    $new_image = imagecreatetruecolor($final_width, $final_height);
    imagecopyresampled($new_image, $src, 0, 0, $x, $y, $final_width, $final_height, $width, $height);
    
    //输出图片
    header('Content-Type: image/jpeg');
    imagejpeg($new_image);
    
    imagedestroy($src);
    imagedestroy($new_image);
    
}


