<?php 
	session_start();
	date_default_timezone_set("Asia/Bangkok");
	include_once '../config.php';
	$id = $_GET['id'];
	$uid = $_SESSION['login']['id'];
	$query = $config->query("SELECT * FROM message WHERE uid='$id' AND from_id='$uid' AND status='0'");
	$querya = $config->query("SELECT * FROM message WHERE uid='$id' AND from_id='$uid' AND status='0' ORDER BY id DESC LIMIT 1");
	$now = date('Y-m-d H:i:s');
	$config->query("UPDATE users SET last_login='$now' WHERE id='$uid'");
	$queryaa = $config->query("SELECT * FROM users WHERE id = '$id'");
	$act = $queryaa->fetch_assoc();
	$activity = $act['last_login'];
	$current = strtotime('-10 seconds');
	$currents = date('Y-m-d H:i:s',$current);
	if ($currents < $activity ) {
		$on = 'online';
	}else{
		$on = 'offline';
	}
	$fetch = $querya->fetch_assoc();
	$lastmessage = $fetch['message'];
	$time = $fetch['time'];
	function getTime($time)
	{
		$strtime =  strtotime($time);
		$current = time();
		$time_def = $current - $strtime;
		$second = $time_def;
		$minutes= round($second/60);
		$hours= round($second/3600);
		$day=round($second/86400);
		$weeks=round($second/604800);
		$months=  round($second/2629440);
		$years = round($second/31553280);

		if ($second <= 60) {
			return 'Just Now';
		}elseif ($minutes <= 60 ) {
			if ($minutes == 1) {
				return '1 minutes ago';
			}else{
				return $minutes.' minutes ago';
			}
		}elseif ($hours <= 24) {
			if ($hours == 1) {
				return '1 hours ago';
			}else{
				return $hours.' hours ago';
			}
		}elseif ($day <= 7) {
			if ($day == 1) {
				return 'yasterday';
			}else{
				return $day.' day ago';
			}
		}elseif ($weeks <= 4.3) {
			if ($weeks == 1) {
				return 'a week ago';
			}else{
				return $weeks.' week ago';
			}
		}elseif ($months <= 12) {
			if ($months == 1) {
				return 'a months ago';
			}else{
				return $months.' months ago';
			}
		}elseif ($years <= 12) {
			if ($years == 1) {
				return 'a years ago';
			}else{
				return $years.' years ago';
			}
		}

	}
	$notify = array(
		'lastmessage' => $lastmessage,
		'notify'	=> mysqli_num_rows($query),
		'time'	=>getTime($time),
		'activity' => $on
		 );
	echo json_encode($notify);
 ?>