<!DOCTYPE html>
<?php 
include ("koneksi.php");
session_start();
?>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SUN 4 Jember</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
  </head>

  <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <a class="navbar-brand" href="#">Home</a>
			   <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                
                <li><a href="tambah-barang.php">tambah transaksi</a></li>
                
              </ul>
              
            </li>
			 
              
            </li>
             
			  <?php 
	
	if(!isset($_SESSION['LEVEL'])){
		echo "<li><a href='login.php'>login</a></li>";
	}
	?>
              
            </li>
			
          </ul>
		   <?php
		   
		   	include ("koneksi.php");
		   if($_SESSION['LEVEL']== "member"){
			   echo "
		  <div class='btn-group navbar-form pull-right'>
			<a class='btn btn-primary' href='welcome.php'><i class='icon-user icon-white'></i>" .$_SESSION['NAMA_USER']. "</a> 
			<a class='btn btn-primary dropdown-toggle' data-toggle='dropdown' href='#'><span class='caret'></span></a>
			<ul class='dropdown-menu'>
			<li><a href='logout.php'><i class='icon-off'></i> Logout</a></li>
			</ul>
        </div> ";
		   }
		  
		?>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
	  <table class="table table-bordered table-hover">
		<tr align="left">
		<td align="left">No.</td>
		<td align="left">id Transaksi</td>
		<td align="left">User</td>
		<td align="left">Tanggal Transaksi</td>
		<td align="left">Jumlah</td>
		<td align="left">Kategori</td>
		<td align="left">Total Harga</td>
			
		
		
		
		</tr>
		
        <?php
		
			include ("koneksi.php");
			$iduser = $_SESSION['ID_USER'];
		   if($_SESSION['LEVEL']== "member"){
	$no=1;
	$queryselecttransaksi="select * from transaksi where ID_USER = '$iduser'";
	$resultquery=mysqli_query($koneksi,$queryselecttransaksi);
	while($row=mysqli_fetch_array($resultquery,MYSQLI_ASSOC)){
				echo"<tr align='left'>";
				echo"<td>".$no."</td>";
				echo"<td>". $row['ID_TRANSAKSI'] . "</td>";
				echo"<td>". $row['ID_USER'] . "</td>";
				echo"<td>". $row['TANGGAL'] . "</td>";
				echo"<td>". $row['JUMLAH_TIKET'] . "</td>";
				echo"<td>". $row['JENIS_TIKET'] . "</td>";
				echo"<td>". $row['HARGA_TOTAL'] . "</td>";
				
				

				$no++;
			}
		   } else{
			   echo "harus login";
		   }
			?>
		</div>
      </div>
	  
  </body>
</html>
