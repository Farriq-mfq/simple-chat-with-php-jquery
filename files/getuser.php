<?php 
	include_once '../config.php';
	session_start();
	$uid = $_SESSION['login']['id'];
	$id = $_GET['id'];
	$query = $config->query("SELECT * FROM message WHERE uid='$uid' AND from_id='$id' OR from_id='$uid' AND uid='$id' ORDER BY id ASC");
	$_SESSION['user_click'] = $id;
	$config->query("UPDATE message SET status='1' WHERE uid='$id' AND from_id='$uid'");
 ?>	
 <?php foreach ($query as $message): ?>
 	<div class="msg__value" data-aos="fade-right" >
	  					<?php if ($message['uid'] == $uid): ?>
	  						<div class="container">
	  						<div class="msg__recaive">
	  							<span><?= $message['message'] ?></span>
	  							<img src="img/avatar.jpg" class="img-thumbnail rounded-circle">
	  						</div>
	  					</div>
	  					<?php else: ?>
	  						<div class="container">
	  						<div class="msg__from">
	  							<img src="img/avatar.jpg" class="img-thumbnail rounded-circle">
	  							<span><?= $message['message'] ?></span>
	  						</div>
	  					</div>
	  					<?php endif ?>
	  				</div>
 <?php endforeach ?>