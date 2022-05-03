<?php
$captcha_num = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
$captcha_num = substr(str_shuffle($captcha_num), 0, 6);
$_SESSION["code"] = $captcha_num;

$font_size = 30;
$img_width = 200;
$img_height = 40;

header('Content-type: image/jpeg');

$image = imagecreate($img_width, $img_height); // create background image with dimensions
imagecolorallocate($image, 255, 255, 255); // set background color

$text_color = imagecolorallocate($image, 0, 0, 0); // set captcha text color

imagettftext($image, $font_size, 0, 15, 30, $text_color, 'Poppins-Black.ttf', $captcha_num);
imagejpeg($image);