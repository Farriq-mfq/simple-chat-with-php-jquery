<?php 
include_once 'config.php';
session_start();
	if (isset($_POST['login'])) {
		$user = $config->real_escape_string(htmlspecialchars($_POST['user']));
		$pass = $config->real_escape_string(htmlspecialchars($_POST['pass']));
		$config = $config->query("SELECT * FROM users WHERE username='$user' AND password='$pass'");
		$row = mysqli_num_rows($config);
		$fetch = $config->fetch_assoc();

		if ($row > 0) {
			$_SESSION['login'] = $fetch;
			// $_SESSION['online'] = 'online';
			header('Location:./');
		}else{
			$error = true;
		}
	}
	
	if (isset($_SESSION['login'])) {
			header('Location:./');
	}

    // register
  if (isset($_POST['register'])) {
    $name = $config->real_escape_string(htmlspecialchars($_POST['name']));
    $username = $config->real_escape_string(htmlspecialchars($_POST['userr']));
    $password = $config->real_escape_string(htmlspecialchars($_POST['passr']));
    $captha = $config->real_escape_string(htmlspecialchars($_POST['captha']));
    if ($captha == $_SESSION['captha']) {
      $query = $config->query("INSERT INTO `users`(`name`, `username`, `password`) VALUES ('$name','$username','$password')");
      if ($query) {
        $success = true;
      }else{
        $error  = true;
      }
    }
  }




 ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="login.css">

    <title>Login to Simple Chat </title>
  </head>
  <div class="sec">
  	<div class="container">
  		<div class="row">
  			<div class="col-lg-12">
          <div class="button__select">
            <button class="btn btn__login">Login</button>
            <button class="btn btn__register">Register</button>
          </div>  
  				<div class="form__">
            <div class="form-login">
              <form method="post">
                <h3>Simple Chat Login</h3>
                <?php if ($error): ?>
                <p class="text-danger text-center">Invalid Login</p>
                <?php endif ?>
                <div class="form-group">
                  <input type="text" name="user" class="form-control" placeholder="Username" required/ autocomplete="off" autofocus>
                </div>
                <div class="form-group">
                  <input type="password" name="pass" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <button class="btn btn-info" name="login">Login</button>
                </div>
             </form>
            </div>
            <div class="form-register">
              <form method="post">
                <h3>Simple Chat Register</h3>
                <?php if ($error): ?>
                <p class="text-danger text-center">Error Register </p>
                <?php endif ?>
                <?php if ($success): ?>
                <p class="text-success text-center">Success Register</p>
                <?php endif ?>
                <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="Name" required/ autocomplete="off" autofocus>
                </div> 
                <div class="form-group">
                  <input type="text" name="userr" class="form-control" placeholder="Username" required/ autocomplete="off">
                </div>
                <div class="form-group">
                  <input type="password" name="passr" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <img src="captha.php">
                  <input type="text" name="captha" class="form-control" placeholder="captha text in here..." required>
                </div>
                <div class="form-group">
                  <button class="btn btn-info" name="register">Login</button>
                </div>
             </form>
            </div>
          </div>
  			</div>
  		</div>
  	</div>	
  </div>



  	<!-- script -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="login.js"></script>
  </body>
</html>