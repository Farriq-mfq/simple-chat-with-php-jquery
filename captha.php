<?php 
	session_start();
	header("Content-type: image/png");
	$random = md5(rand(0,9));
	$subs = substr($random, 0,5);
	$_SESSION['captha'] = $subs;
	$gbr = imagecreate(200, 50);
	imagecolorallocate($gbr, 0, 0, 0);
	$color = imagecolorallocate($gbr,250, 250, 250);
	$font = "fonts/Child Hood Style.otf"; 
	$ukuran_font = 20;
	$posisi = 32;
	$kemiringan= rand(0, 9);
	imagettftext($gbr, $ukuran_font, $kemiringan, 8+15*$i, $posisi, $color, $font,$subs);
	imagepng($gbr); 
	imagedestroy($gbr);

		
 ?>