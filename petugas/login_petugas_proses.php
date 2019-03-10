<?php
session_start();
include "../admin/includes/koneksi.php";

	$status 	= strip_tags($_REQUEST['status']);
	$nik 	 	=$_POST['nik'];
	$nama		=$_POST['nama'];
switch($_REQUEST['status'])
{
	case 'rw' :
		$query 		=mysql_query("SELECT * FROM rw WHERE nik_rw='$nik' AND nama='$nama'");
		$cek 		=mysql_num_rows($query);
		$row 		=mysql_fetch_array($query);
		$nik_rw 	=$row['nik_rw'];
		$foto 		=$row['foto'];

		if($cek){
		$_SESSION['nik_rw']			=$nik_rw;
		$_SESSION['nama']			=$nama;
		$_SESSION['status'] 		=$status;
		$_SESSION['foto']			=$foto;
			echo "<script>alert('Selamat datang, $nama');</script>";
			echo "<meta http-equiv='refresh' content='0;url=index_petugas.php'/>";
			}else{
			echo "<script>alert('Nama, NIK, Tipe tidak cocok');</script>";
			echo "<meta http-equiv='refresh' content='0;url=login_petugas.php'/>";
		}	
	break;
	
	case 'rt' :
	$query 		=mysql_query("SELECT * FROM rt WHERE nik_rt ='$nik' AND nama='$nama'");
	$cek 		=mysql_num_rows($query);
	$row 		=mysql_fetch_array($query);
	$nik_rt 	=$row['nik_rt'];
	$foto 		=$row['foto'];

	if($cek){
		$_SESSION['nik_rt']		=$nik_rt;
		$_SESSION['nama']		=$nama;
		$_SESSION['status']		=$status;
		$_SESSION['foto']		=$foto;
		echo "<script>alert('Selamat datang, $nama');</script>";
		echo "<meta http-equiv='refresh' content='0;url=index_petugas.php'/>";
	}else{
		echo "<script>alert('Nama, NIK, Tipe tidak cocok');</script>";
		echo "<meta http-equiv='refresh' content='0;url=login_petugas.php'/>";	
			
		}
	break;
	
	case 'bendahara' :
	$query 			=mysql_query("SELECT * FROM bendahara WHERE nik_benda='$nik' AND nama='$nama'");
	$cek 			=mysql_num_rows($query);
	$row 			=mysql_fetch_array($query);
	$nik_bendahara	=$row['nik_benda'];
	$foto			=$row['foto'];

	if($cek){
		$_SESSION['nik_benda']		=$nik_bendahara;
		$_SESSION['nama']			=$nama;
		$_SESSION['status']			=$status;
		$_SESSION['foto']			=$foto;
		echo "<script>alert('Selamat datang, $nama');</script>";
		echo "<meta http-equiv='refresh' content='0;url=index_petugas.php'/>";
	}else{
		echo "<script>alert('Nama, NIK, Tipe tidak cocok');</script>";
		echo "<meta http-equiv='refresh' content='0;url=login_petugas.php'/>";
	}	
	break;
}
?>