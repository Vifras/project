<?php
switch($_REQUEST['aksi'])
{
	case 'tambah' :
		$jenis		= $_POST['txtjenis'];
		$jumlah		= $_POST['txtjumlah'];
		$a	= mysql_query("INSERT INTO jenis_iuran VALUES('','$jenis','$jumlah')");
	if ($a == true){
	echo "<script>alert('Input Berhasil');</script>";
	}else{
	echo "<script>alert('Input Gagal');</script>";
	}
	break;
	
	case 'edit' :
		$idx			= $_POST['idx'];
		$jenis			= $_POST['txtjenis'];
		$jumlah			= $_POST['txtjumlah'];
		$a	= mysql_query("UPDATE jenis_iuran SET jenis_iuran = '$jenis', jumlah = '$jumlah' WHERE id_jenis_iuran = '$idx' ");
	if ($a == true){
	echo "<script>alert('Update Berhasil');</script>";
	}else{
	echo "<script>alert('Update Gagal');</script>";
	}
	break;
	
	case 'hapus' :
		$id		= $_GET['id'];
		$a	= mysql_query("DELETE FROM agama WHERE id_agama = '$id' ");
	if ($a == true){
	echo "<script>alert('Hapus Berhasil');</script>";
	}else{
	echo "<script>alert('Hapus Gagal');</script>";
	}
	break;
}
?>
<meta http-equiv="refresh" content="1;url=index_petugas.php?page=jenis_iuran"/>