<?php
include "includes/koneksi.php";

switch($_REQUEST['aksi'])
{
	case 'tambah' :
		$no_kk				= $_POST['idx'];
		$bulan				= $_POST['cbbulan'];
		$jenis				= $_POST['cbjenis'];
		$bayar				= $_POST['txtbayar'];
		$a	= mysql_query("INSERT INTO iuran VALUES('$no_kk', '','$bulan','".date('Y-m-d')."','$jenis','$bayar')");
	if ($a == true){
	echo "<script>alert('Input Berhasil');</script>";
	}else{
	echo "<script>alert('Input Gagal');</script>";
	}
	echo "<meta http-equiv='refresh' content='1;url=index_petugas.php?page=lihat_iuran&id=$no_kk'/>";
	break;
	
	case 'edit' :
		$no_kk				= $_POST['idx'];
		$idix 				= $_POST['idix'];
		$bulan				= $_POST['cbbulan'];
		$jenis				= $_POST['cbjenis'];
		$bayar				= $_POST['txtbayar'];
	$a	= mysql_query("UPDATE iuran SET no_kk = '$no_kk', id_bulan = '$bulan', tanggal_bayar = '".date('Y-m-d')."', id_jenis_iuran = '$jenis', bayar = '$bayar' WHERE id_iuran = '$idix' ");
	if ($a == true){
	echo "<script>alert('Update Berhasil');</script>";
	}else{
	echo "<script>alert('Update Gagal');</script>";
	}
	echo "<meta http-equiv='refresh' content='1;url=index_petugas.php?page=lihat_iuran&id=$no_kk'/>";
	break;
	
	case 'hapus' :
		$id		= $_GET['id'];
		$no_kk 	= $_GET['no_kk'];
		$a	= mysql_query("DELETE FROM iuran WHERE id_iuran = '$id' ");
	if ($a == true){
	echo "<script>alert('Hapus Berhasil');</script>";
	}else{
	echo "<script>alert('Hapus Gagal');</script>";
	}
	echo "<meta http-equiv='refresh' content='1;url=index_petugas.php?page=lihat_iuran&id=$no_kk'/>";
	break;
}
?>
<!--<meta http-equiv="refresh" content="1;url=index.php?page=lihat_kk"/>