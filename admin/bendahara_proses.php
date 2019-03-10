<?php
include "includes/koneksi.php";

switch($_REQUEST['aksi'])
{
	case 'tambah' :
		$nik			= $_POST['txtnik'];
		$rt				= $_POST['cbrt'];
		$nama			= $_POST['txtnama'];
		$jenis			= $_POST['jenis'];
		$alamat			= $_POST['txtalamat'];
		if(!file_exists("../petugas/foto/")){
		mkdir("../petugas/foto/");
		}
		$asal_file 		= $_FILES['filefoto']['tmp_name'];
		$tujuan_file 	= "../petugas/foto/".$_FILES['filefoto']['name'];
		move_uploaded_file($asal_file, $tujuan_file);
		$a	= mysql_query("INSERT INTO bendahara VALUES('$nik', '$tujuan_file', '$rt','$nama', '$jenis','$alamat')");
	if ($a == true){
	echo "<script>alert('Input Berhasil');</script>";
	}else{
	echo "<script>alert('Input Gagal');</script>";
	}
	break;
	
	case 'edit' :
		$nik			= $_POST['txtnik'];
		$idx			= $_POST['idx'];
		$rt				= $_POST['cbrt'];
		$nama			= $_POST['txtnama'];
		$jenis 			= $_POST['jenis'];
		$alamat			= $_POST['txtalamat'];
	if ($_POST['cekfoto'] == 'ganti'){
		if(!file_exists("../petugas/foto/")){
			mkdir("../petugas/foto/");
			}
			$asal_file 		= $_FILES['filefoto']['tmp_name'];
			$tujuan_file 	= "../petugas/foto/".$_FILES['filefoto']['name'];
			move_uploaded_file($asal_file, $tujuan_file);
		$a	= mysql_query("UPDATE bendahara SET nik_benda = '$nik', foto = '$tujuan_file', nik_rt = '$rt', nama = '$nama', jenis = '$jenis' ,alamat = '$alamat' WHERE nik_benda = '$idx' ");
	}else{
		$a	= mysql_query("UPDATE bendahara SET nik_benda = '$nik', nik_rt = '$rt', nama = '$nama',jenis = '$jenis' , alamat = '$alamat' WHERE nik_benda = '$idx' ");
	}
	if ($a == true){
	echo "<script>alert('Update Berhasil');</script>";
	}else{
	echo "<script>alert('Update Gagal');</script>";
	}
	break;
	
	case 'hapus' :
		$id		= $_GET['id'];
		$f = mysql_query("SELECT foto FROM bendahara WHERE nik_benda = '$id' ");
		$foto = mysql_fetch_array($f);
			if(file_exists($foto['foto'])){
				unlink($foto['foto']);
		}
		$a	= mysql_query("DELETE FROM bendahara WHERE nik_benda = '$id' ");
	if ($a == true){
	echo "<script>alert('Hapus Berhasil');</script>";
	}else{
	echo "<script>alert('Hapus Gagal');</script>";
	}
	break;
}
?>
<meta http-equiv="refresh" content="1;url=index.php?page=bendahara"/>