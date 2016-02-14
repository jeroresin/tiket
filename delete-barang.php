<?php 
	include ("koneksi.php");
	$idtransaksi=$_GET['idtransaksi'];
	$queryupdatebarang="delete from transaksi where ID_TRANSAKSI='$idtransaksi'";
			if(mysqli_query($koneksi,$queryupdatebarang)){
				echo "Data has been delete succesfully";
				header ("Location:admin.php");
			}
			else{
				echo "Error". $queryupdatebarang . "<br/>" .mysqli_error($koneksi);
			}
			mysqli_close($koneksi);
	?>
