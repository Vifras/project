<?php
include "includes/koneksi.php";

switch($_REQUEST['aksi'])
{
	case 'tambah' :
		$no_kk				= $_POST['idx'];
		$nik				= $_POST['txtnik'];
		$nama				= $_POST['txtnama'];
		$gender				= $_POST['gender'];
		$tempat				= $_POST['txttempat'];
		$tanggal 			= ExplodeDate($_POST['txttanggal']);
		$agama				= $_POST['cbagama'];
		$pendidikan			= $_POST['cbpendidikan'];
		$pekerjaan			= $_POST['cbpekerjaan'];
		$status				= $_POST['cbstatus'];
		$hubungan			= $_POST['cbhubungan'];
		$kewar				= $_POST['kewar'];
		$paspor				= $_POST['txtpa'];
		$kitas				= $_POST['txtki'];
		$ayah				= $_POST['txtay'];
		$ibu				= $_POST['txtib'];
		$a	= mysql_query("INSERT INTO penduduk VALUES('$no_kk', '$nik','$nama', '$gender','$tempat','$tanggal','$agama','$pendidikan','$pekerjaan','$status','$hubungan','$kewar','$paspor','$kitas','$ayah','$ibu')");
	if ($a == true){
	echo "<script>alert('Input Berhasil');</script>";
	}else{
	echo "<script>alert('Input Gagal');</script>";
	}
	echo "<meta http-equiv='refresh' content='1;url=index.php?page=lihat_kk&id=$no_kk'/>";
	break;
	
	case 'edit' :
		$no_kk				= $_POST['idx'];
		$nik				= $_POST['txtnik'];
		$nikx 				= $_POST['nikx'];
		$nama				= $_POST['txtnama'];
		$gender				= $_POST['gender'];
		$tempat				= $_POST['txttempat'];
		$tanggal 			= ExplodeDate($_POST['txttanggal']);
		$agama				= $_POST['cbagama'];
		$pendidikan			= $_POST['cbpendidikan'];
		$pekerjaan			= $_POST['cbpekerjaan'];
		$status				= $_POST['cbstatus'];
		$hubungan			= $_POST['cbhubungan'];
		$kewar				= $_POST['kewar'];
		$paspor				= $_POST['txtpa'];
		$kitas				= $_POST['txtki'];
		$ayah				= $_POST['txtay'];
		$ibu				= $_POST['txtib'];
	$a	= mysql_query("UPDATE penduduk SET no_kk = '$no_kk', nik = '$nik', nama = '$nama', gender = '$gender', tempat_lahir = '$tempat', tanggal_lahir = '$tanggal', id_agama = '$agama', id_pendidikan = '$pendidikan', id_pekerjaan = '$pekerjaan', id_status ='$status', id_hubungan = '$hubungan', kewar = '$kewar', no_paspor = '$paspor', no_kitaskitap = '$kitas', ayah = '$ayah', ibu = '$ibu' WHERE nik = '$nikx' ");
	if ($a == true){
	echo "<script>alert('Update Berhasil');</script>";
	}else{
	echo "<script>alert('Update Gagal');</script>";
	}
	echo "<meta http-equiv='refresh' content='1;url=index.php?page=lihat_kk&id=$no_kk'/>";
	break;
	
	case 'hapus' :
		$id		= $_GET['id'];
		$no_kk 	= $_GET['no_kk'];
		$a	= mysql_query("DELETE FROM penduduk WHERE nik = '$id' ");
	if ($a == true){
	echo "<script>alert('Hapus Berhasil');</script>";
	}else{
	echo "<script>alert('Hapus Gagal');</script>";
	}
	echo "<meta http-equiv='refresh' content='1;url=index.php?page=lihat_kk&id=$no_kk'/>";
	break;
}
?>
<!--<meta http-equiv="refresh" content="1;url=index.php?page=lihat_kk"/>