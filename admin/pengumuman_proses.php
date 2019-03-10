<?php
include "includes/koneksi.php";

switch ($_REQUEST['aksi']) {
	case 'tambah':
		$judul 		= $_POST['txtjudul'];
		$pengirim	= $_POST['txtpengirim'];
		$isi		= $_POST['txtpengumuman'];
		$a 	= mysql_query("INSERT INTO pengumuman VALUES('','$judul','$isi','$pengirim','".date('Y-m-d')."')");
		if ($a == true){
		echo "<script>alert('Input Berhasil');</script>";
		}else{
		echo "<script>alert('Input Gagal');</script>";
		}
		break;
	
	case 'edit' :
		$idx 		= $_POST['idx'];
		$judul		= $_POST['txtjudul'];
		$pengirim	= $_POST['txtpengirim'];
		$isi		= $_POST['txtpengumuman'];
	$a	= mysql_query("UPDATE pengumuman SET judul = '$judul', pengirim = '$pengirim', pengumuman = '$isi', date = '".date('Y-m-d')."' WHERE id_pengumuman = '$idx' ");
	if ($a == true){
	echo "<script>alert('Update Berhasil');</script>";
	}else{
	echo "<script>alert('Update Gagal');</script>";
	}
		break;

	case 'hapus' :
			$id 	= $_GET['id'];
			$a 		= mysql_query("DELETE FROM pengumuman WHERE id_pengumuman = '$id' ");
			if ($a == true){
			echo "<script>alert('Hapus Berhasil');</script>";
			}else{
			echo "<script>alert('Hapus Gagal');</script>";
			}
		break;
}
?>
<meta http-equiv="refresh" content="1;url=index.php?page=pengumuman"/>