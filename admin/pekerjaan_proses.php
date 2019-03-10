<?php
include "includes/koneksi.php";

switch($_REQUEST['aksi'])
{
	case 'tambah' :
		$pekerjaan		= $_POST['txtpekerjaan'];
		$a	= mysql_query("INSERT INTO pekerjaan VALUES('', '$pekerjaan')");
	if ($a == true){
	echo "<script>alert('Input Berhasil');</script>";
	}else{
	echo "<script>alert('Input Gagal');</script>";
	}
	break;
	
	case 'edit' :
		$idx			= $_POST['idx'];
		$pekerjaan			= $_POST['txtpekerjaan'];
		$a	= mysql_query("UPDATE pekerjaan SET pekerjaan = '$pekerjaan' WHERE id_pekerjaan = '$idx' ");
	if ($a == true){
	echo "<script>alert('Update Berhasil');</script>";
	}else{
	echo "<script>alert('Update Gagal');</script>";
	}
	break;
	
	case 'hapus' :
		$id		= $_GET['id'];
		$a	= mysql_query("DELETE FROM pekerjaan WHERE id_pekerjaan = '$id' ");
	if ($a == true){
	echo "<script>alert('Hapus Berhasil');</script>";
	}else{
	echo "<script>alert('Hapus Gagal');</script>";
	}
	break;
}
?>
<meta http-equiv="refresh" content="1;url=index.php?page=pekerjaan"/>