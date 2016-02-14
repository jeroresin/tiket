<?php 
session_start();
	
	if(!isset($_SESSION['LEVEL'])){
		header("Location: login.php");
	}
include("koneksi.php");
mysql_connect("localhost","root","");
mysql_select_db("tiket");
//Fungsi autonumber
function autonumber($tabel, $kolom, $lebar=0, $awalan='')
{
	$query="select $kolom from $tabel order by $kolom desc limit 1";
	$hasil=mysql_query($query);
	$jumlahrecord = mysql_num_rows($hasil);
	if($jumlahrecord == 0)
		$nomor=1;
	else
	{
		$row=mysql_fetch_array($hasil);
		$nomor=intval(substr($row[0],strlen($awalan)))+1;
	}
	if($lebar>0)
		$angka = $awalan.str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
	else
		$angka = $awalan.$nomor;
	return $angka;
}


?>
<!DOCTYPE html>

<html>
	<head>
	
		<title>Form Tambah Data transaksi</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		
	</head>
	<body>
	<script src="selectharga.js"></script>
	
	<h2>Tambah Data transaksi</h2>
		<form method="post" enctype="multipart/form-data">
			<table class="table table-stripped">
			<tr>
				<td>ID transaksi</td>
				<td>:</td>
				<td><input type="text" name="idtransaksi" value="<?=autonumber("transaksi","ID_TRANSAKSI",3,"trans")?>" ></td>
				</tr>
		
				
				<tr>
				<td>Tanggal</td>
				<td>:</td>
				<td><input type="date" name="tanggal">
				</td>
				</tr>
				<tr>
				<td>Jumlah transaksi</td>
				<td>:</td>
				<td><input type="number" name="jumlah"></td>
				</tr>
				<tr>
				<td>Kategori Tiket</td>
				<td>:</td>
				<td><select name="kategori">
				<option value="Vip">VIP</option>
				<option value="Reguler">REGULER</option>
				
				</tr>
				
				
				<tr>
					<td colspan=3 align="center"><input type="submit" name="submit"> </td>
					 		
					</tr>
					<tr>
					 <td><button type = "button"><a href ="index.php">back</a></td>
					</tr>
			</table>
		</form>

 
		<?php 
			
			if(isset($_POST['submit'])){
				$idtransaksi=$_POST['idtransaksi'];
				$namatransaksi=$_POST['namatransaksi'];
				$jumlah=$_POST['jumlah'];
				$kategori=$_POST['kategori'];
				$tanggal = $_POST['tanggal'];
				$total;
				if ($kategori == 'Vip'){
					$total = $jumlah * 60000;
				}else if ($kategori == 'Reguler'){
					$total = $jumlah * 40000;
				}
				
				$username = $_SESSION ['ID_USER'];
				$queryinserttransaksi= "INSERT INTO `tiket`.`transaksi` (`ID_TRANSAKSI`, `ID_USER`, `TANGGAL`, `JENIS_TIKET`, `JUMLAH_TIKET`, `HARGA_TOTAL`) VALUES 
				('$idtransaksi', '$username', '$tanggal', '$kategori', '$jumlah', '$total');";
				if(mysqli_query($koneksi,$queryinserttransaksi)){
					echo "New record created succesfully ";		
					header ("Location:tambah-barang.php");
				} else {
					echo "Error: ". $queryinserttransaksi . "<br>" . mysqli_error($koneksi);
				}
				
				mysqli_close($koneksi);
			}
			
			?>
	</body>
</html>
				