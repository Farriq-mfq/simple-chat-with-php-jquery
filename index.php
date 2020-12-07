<?php 
	include_once 'config.php';
	session_start();
if (!isset($_SESSION['login'])) {
	header('Location:login.php');
}
$uid = $_SESSION['login']['id'];
$username = $_SESSION['login']['name'];

 ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Simple Chat </title>
  </head>
  <body>
  	<div class="sec">
  		<a href="logout.php" class="btn btn-danger" id="logout" onclick="return confirm('Sure ?')">Logout</a>
  		<h1>Hallo , <?= $username ?></h1>
  		<div class="container">
  			<div class="row">
  			<div class="col-lg-12 mb-5" id="org_box">
  				<div class="header__org">
		  				<h3>Chat simple</h3>
		  				<div class="search">
		  					<input type="text" name="search" id="search__contact" class="form-control" placeholder="search Contact...">
		  				</div>
	  				</div>
	  			<div class="info_org">
	  				<?php $configg = $config->query("SELECT * FROM users WHERE id != '$uid' ");
	  				 ?>
  				 <?php foreach ($configg as $users): ?>
	  				<div class="msg__info ">
	  					<div class="photos">
	  						<span class="notif" data-id="<?= $users['id'] ?>"></span>
	  						<img src="img/avatar.jpg" class="img-thumbnail rounded-circle">
	  						<span class="text-success bold activity"></span>
	  					</div>
	  					<div class="msg">
	  						<div class="user__msg">
	  							<?php  $name = explode(' ', $users['username']); ?>
	  							<h5><a href="<?= $name[0] ?>" id="user_click" data-id="<?= $users['id'] ?>"><?= $name[0] ?></a></h5>
	  						</div>
	  						<span class="last__messages">

	  						</span>
	  					</div>
	  					<div class="time">
	  						<span></span>
	  					</div>
	  				</div>
  				 <?php endforeach ?>
	  			</div>
  			</div>	
  			<div class="col-lg-6" id="show__msg__box" style="display: none;">
				<div class="header__msg">
	  				<img src="img/avatar.jpg" class="img-thumbnail rounded-circle">
	  				<h3 class="user__name">Farriq</h3>
	  				<div class="search__msg">
	  					<input type="text" name="search" class="form-control" placeholder="search message">
	  				</div>
	  				<button class="btn btn-danger" type="button" id="close__msg__box">Close</button>	
  				</div>
	  			<div class="info_msg"> 
	  				<!-- <div class="msg__value" data-aos="fade-right" >
	  					<div class="container">
	  						<div class="msg__from">
	  							<img src="img/avatar.jpg" class="img-thumbnail rounded-circle">
	  							<span>Hallo World</span>
	  						</div>
	  					</div>
	  					<div class="container">
	  						<div class="msg__recaive">
	  							<span>lorem</span>
	  							<img src="img/avatar.jpg" class="img-thumbnail rounded-circle">
	  						</div>
	  					</div>
	  				</div> -->
	  			</div>
	  			<div class="scroll"></div>
	  			<form id="send_message">
	  				<div class="form-group send">
	  					<input type="text" autofocus autocomplete="off" name="message_value" class="form-control" required/ placeholder="Type message...">
	  					<button class="btn btn-info">Send</button>
	  				</div>
	  			</form>
  			</div>		
  		</div>
  		</div>
  	</div>






  	<!-- script -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
</html>