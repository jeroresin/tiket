<!DOCTYPE html>
<html>
	<head>
		<title>Praktikum 12 Pemrograman Web</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
	<body>
		<div class="container">
      
      <div class="hero-unit">
       <h2>Form Pendaftaran</h2>
	   <form class="form-horizontal" method="post">
	   <div class="control-group">
			<label class="control-label>">id_user</label>
			<div class="control"><input type="text" name="id_user" placeholder="id_user"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Password</label>
			<div class="control"><input type="password" name="password" placeholder="Password"></div>
		</div>
	   <div class="control-group">
			<label class="control-label>">Nama</label>
			<div class="control"><input type="text" name="nama" placeholder="Nama"></div>
		</div>
		
		
		
		
		<div class="control-group">
			<div class="control">
			<button type="submit" class="btn btn-info" name="submit">Submit</button> <a href="login.php">Login</a>
			
			</div>
		</div>
	</form>
      </div>
	
	<?php
		include("koneksi.php");
		
		if(isset($_POST['submit'])){
			$nama=$_POST['nama'];
			
			$id_user=$_POST['id_user'];
			$password=$_POST['password'];
		
		
		
			
			$sqlinsert="INSERT INTO tabel_user (`ID_USER`, `NAMA_USER`, `PASSWORD`, `LEVEL`) VALUES ('$id_user', '$nama ', '$password', 'member')";
			if(mysqli_query($koneksi,$sqlinsert)){
				echo "New Record created succesfully";
				echo '<META http-equiv="refresh" content="1;URL=form-registrasi.php">';
			}
		
				else{
					echo "Error:". $sqlinsert . "<br>" . mysqli_error($koneksi);
				}
				mysqli_close($koneksi);
			
		}		
	?>
	</div> 
	<div>
      <hr>
      <footer>
        <p>Praktikum 12 Pemrograman Web &copy; 2015</p>
      </footer>
    </div>
	</body>
	
</html>
