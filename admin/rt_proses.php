<?php
include "includes/koneksi.php";

switch($_REQUEST['aksi'])
{
	case 'tambah' :
		$nik			= $_POST['txtnik'];
		$rw				= $_POST['cbrw'];
		$rt				= $_POST['txtrt'];
		$nama			= $_POST['txtnama'];
		$alamat			= $_POST['txtalamat'];
		if(!file_exists("../petugas/foto/")){
		mkdir("../petugas/foto/");
		}
		$asal_file 		= $_FILES['filefoto']['tmp_name'];
		$tujuan_file 	= "../petugas/foto/".$_FILES['filefoto']['name'];
		move_uploaded_file($asal_file, $tujuan_file);
		$a	= mysql_query("INSERT INTO rt VALUES('$nik', '$tujuan_file', '$rw', '$rt','$nama','$alamat')");
	if ($a == true){
	echo "<script>alert('Input Berhasil');</script>";
	}else{
	echo "<script>alert('Input Gagal');</script>";
	}
	break;
	
	case 'edit' :
		$nik			= $_POST['txtnik'];
		$idx			= $_POST['idx'];
		$rw				= $_POST['cbrw'];
		$rt				= $_POST['txtrt'];
		$nama			= $_POST['txtnama'];
		$alamat			= $_POST['txtalamat'];
	if ($_POST['cekfoto'] == 'ganti'){
		if(!file_exists("../petugas/foto/")){
			mkdir("../petugas/foto/");
			}
			$asal_file 		= $_FILES['filefoto']['tmp_name'];
			$tujuan_file 	= "../petugas/foto/".$_FILES['filefoto']['name'];
			move_uploaded_file($asal_file, $tujuan_file);
		$a	= mysql_query("UPDATE rt SET nik_rt = '$nik', foto = '$tujuan_file', nik_rw = '$rw', rt = '$rt', nama = '$nama', alamat = '$alamat' WHERE nik_rt = '$idx' ");
	}else{
		$a	= mysql_query("UPDATE rt SET nik_rt = '$nik', nik_rw = '$rw', rt = '$rt', nama = '$nama', alamat = '$alamat' WHERE nik_rt = '$idx' ");
	}
	if ($a == true){
	echo "<script>alert('Update Berhasil');</script>";
	}else{
	echo "<script>alert('Update Gagal');</script>";
	}
	break;
	
	case 'hapus' :
		$id		= $_GET['id'];
		$f = mysql_query("SELECT foto FROM rt WHERE nik_rt = '$id' ");
		$foto = mysql_fetch_array($f);
			if(file_exists($foto['foto'])){
				unlink($foto['foto']);
		}
		$a	= mysql_query("DELETE FROM rt WHERE nik_rt = '$id' ");
	if ($a == true){
	echo "<script>alert('Hapus Berhasil');</script>";
	}else{
	echo "<script>alert('Hapus Gagal');</script>";
	}
	break;
}
?>
<meta http-equiv="refresh" content="1;url=index.php?page=rt"/>