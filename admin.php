<?php 
	session_start();
	include ("koneksi.php");
	if(!isset($_SESSION['LEVEL_ADMIN'])){
		header("Location: loginadmin.php");
	}
	?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WELCOME Admin</title>
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
           <?php
		   if($_SESSION['LEVEL_ADMIN']== "admin"){
			    echo '
				 <a class="navbar-brand" href="#">Halaman Admin</a>
			   <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu Admin <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                
                <li><a href="totalpenjualan.php">total penjualan</a></li>
              </ul>
              
            
              
            </li>
			   ';
		   } 
            
			?>
          </ul>
		 <div class="btn-group navbar-form pull-right">
			<a class="btn btn-primary" href="#"><i class="icon-user icon-white"></i>ADMIN : <?php echo $_SESSION['ID_ADMIN'];?></a> 
			<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
			<ul class="dropdown-menu">
			<li><a href="logout.php"><i class="icon-off"></i> Logout</a></li>
			</ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
	  
	 <script>
		function delet(ID_TRANSAKSI,JENIS_TIKET){
		tanya = confirm("Yakin delete dengan nama: "+JENIS_TIKET);
		if(tanya == 1){
        window.location.href="delete-barang.php?idtransaksi="+ID_TRANSAKSI;
			}
		}
		</script>
        <table class="table table-bordered table-hover">
		<tr align="left">
		<td align="left">No.</td>
		<td align="left">id Transaksi</td>
		<td align="left">User</td>
		<td align="left">Tanggal Transaksi</td>
		<td align="left">Jumlah</td>
		<td align="left">Kategori</td>
		<td align="left">Total Harga</td>
			
		<td colspan="2" align="center">Action</td>
		
		
		</tr>
		
        <?php
		
	$no=1;
	$queryselecttransaksi="select * from transaksi";
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
				echo "<td><a href=\"javascript: delet('".$row['ID_TRANSAKSI']."','".$row['JENIS_TIKET']."')\"><img src='icon_modul_5/delete.png'style='width:30px;height:30px'/></a></td> </tr>";
				

				$no++;
			}
			
			?>
		
		</table>
		<p><a href="export.php"><button class ="btn">Export Data ke Excel</button></a></p>
      </div>
  </body>
</html>
