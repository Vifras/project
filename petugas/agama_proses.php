<?php
switch($_REQUEST['aksi'])
{
	case 'tambah' :
		$agama		= $_POST['txtagama'];
		$a	= mysql_query("INSERT INTO agama VALUES('','$agama')");
	if ($a == true){
	echo "<script>alert('Input Berhasil');</script>";
	}else{
	echo "<script>alert('Input Gagal');</script>";
	}
	break;
	
	case 'edit' :
		$idx			= $_POST['idx'];
		$agama			= $_POST['txtagama'];
		$a	= mysql_query("UPDATE agama SET agama = '$agama' WHERE id_agama = '$idx' ");
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
<meta http-equiv="refresh" content="1;url=index_petugas.php?page=agama"/>