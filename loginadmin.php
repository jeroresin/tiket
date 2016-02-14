<!DOCTYPE html>
<html>
  <head>
    <title>login Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>

  </head>
<body>
	<div class="container">
	
	<form class="form-signin" method="post">
		<h2 class="form-signin-heading">Please Sign In </h2>
		<input type="text" name="username" class="input-block-level" placeholder="Username">
		<input type="password" name="password" class="input-block-level" placeholder="Password">
		<button class="btn btn-large btn-primary" type="submit" name="submit">Sign In</button>
		
	</form>
	
	<?php 
	include("koneksi.php");
	
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$sqlselect= "select * from admin where ID_ADMIN='$username' and PASSWORD='$password'";
		$result= mysqli_query($koneksi,$sqlselect);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		if(mysqli_num_rows($result)== 1){
			session_start();
			$_SESSION['ID_ADMIN']= $row['USERNAME_ADMIN'];
			$_SESSION['LEVEL_ADMIN'] = $row['LEVEL_ADMIN'];
			header("location: admin.php");
		} else{
			echo "<div class='alert alert-danger' role='alert'>Login gagal, Cek kembali </div>";
		}
		mysqli_close($koneksi);
	}
	?>
<hr>
      <footer>
        <p align="center">E-Commerce &copy; 2015</p>
      </footer>

    </div> 
  </body>
</html>
		