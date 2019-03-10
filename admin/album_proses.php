<?php
include "includes/koneksi.php";

switch($_REQUEST['aksi'])
{
	case 'tambah' :
		$nama	= $_POST['txtnama'];
		$a	= mysql_query("INSERT INTO album VALUES('', '$nama')");
	if ($a == true){
	echo "<script>alert('Input Berhasil');</script>";
	}else{
	echo "<script>alert('Input Gagal');</script>";
	}
	break;
	
	case 'edit' :
		$idx	= $_POST['idx'];
		$nama 	= $_POST['txtnama'];
	$a	= mysql_query("UPDATE album SET nama = '$nama' WHERE id = '$idx' ");
	if ($a == true){
	echo "<script>alert('Update Berhasil');</script>";
	}else{
	echo "<script>alert('Update Gagal');</script>";
	}
	break;

	case 'hapus' :
		$idx	= $_GET['id'];
		$a	= mysql_query("DELETE FROM album WHERE id = '$idx' ");
	if ($a == true){
	echo "<script>alert('Hapus Berhasil');</script>";
	}else{
	echo "<script>alert('Hapus Gagal');</script>";
	}
	break;
}
?>
<meta http-equiv="refresh" content="1;url=index.php?page=album"/>