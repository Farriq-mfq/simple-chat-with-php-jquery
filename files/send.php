<?php 
	session_start();
	include_once '../config.php';

	$re = $_SESSION['user_click'];
	$uid = $_SESSION['login']['id'];
	$message = htmlspecialchars($config->real_escape_string($_POST['message_value']));

	if (!empty($message) && !empty($re) && !empty($uid)) {
		$config->query("INSERT INTO `message`(`uid`, `from_id`, `message`,`status`) VALUES ('$uid','$re','$message','0')");
	}

 ?>