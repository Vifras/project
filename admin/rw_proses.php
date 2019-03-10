<?php
include "includes/koneksi.php";

switch($_REQUEST['aksi'])
{
	case 'tambah' :
		$nik	= $_POST['txtnik'];
		$rw		= $_POST['txtrw'];
		$nama	= $_POST['txtnama'];
		$alamat	= $_POST['txtalamat'];
		if(!file_exists("../petugas/foto/")){
		mkdir("../petugas/foto/");
		}
		$asal_file 		= $_FILES['filefoto']['tmp_name'];
		$tujuan_file 	= "../petugas/foto/".$_FILES['filefoto']['name'];
		move_uploaded_file($asal_file, $tujuan_file);
		$a	= mysql_query("INSERT INTO rw VALUES('$nik', '$tujuan_file', '$rw' ,'$nama', '$alamat')");
	if ($a == true){
	echo "<script>alert('Input Berhasil');</script>";
	}else{
	echo "<script>alert('Input Gagal');</script>";
	}
	break;
	
	case 'edit' :
		$nik	= $_POST['txtnik'];
		$idx	= $_POST['idx'];
		$rw		= $_POST['txtrw'];
		$nama 	= $_POST['txtnama'];
		$alamat = $_POST['txtalamat'];
	if ($_POST['cekfoto'] == 'ganti'){
		if(!file_exists("../petugas/foto/")){
			mkdir("../petugas/foto/");
			}
			$asal_file 		= $_FILES['filefoto']['tmp_name'];
			$tujuan_file 	= "../petugas/foto/".$_FILES['filefoto']['name'];
			move_uploaded_file($asal_file, $tujuan_file);
		$a	= mysql_query("UPDATE rw SET nik_rw = '$nik', foto = '$tujuan_file', rw = '$rw', nama = '$nama', alamat = '$alamat' WHERE nik_rw = '$idx' ");
	}else{
		$a	= mysql_query("UPDATE rw SET nik_rw = '$nik', rw = '$rw', nama = '$nama', alamat = '$alamat' WHERE nik_rw = '$idx' ");
	}
	if ($a == true){
	echo "<script>alert('Update Berhasil');</script>";
	}else{
	echo "<script>alert('Update Gagal');</script>";
	}
	break;

	case 'hapus' :
		$nik	= $_GET['id'];
		$f = mysql_query("SELECT foto FROM rw WHERE nik_rw = '$nik' ");
		$foto = mysql_fetch_array($f);
			if(file_exists($foto['foto'])){
				unlink($foto['foto']);
		}
		$a	= mysql_query("DELETE FROM rw WHERE nik_rw = '$nik' ");
	if ($a == true){
	echo "<script>alert('Hapus Berhasil');</script>";
	}else{
	echo "<script>alert('Hapus Gagal');</script>";
	}
	break;
}
?>
<meta http-equiv="refresh" content="1;url=index.php?page=rw"/>