<?php
switch($_REQUEST['aksi'])
{
	case 'tambah' :
		$perihal	= $_POST['txtperihal'];
		$nama		= $_POST['txtnama'];
		$tanggal	= ExplodeDate($_POST['txttanggal']);
		$isi		= $_POST['txtisi'];
		$a	= mysql_query("INSERT INTO kegiatan VALUES('','$perihal','$nama','$tanggal','$isi')");
	if ($a == true){
	echo "<script>alert('Input Berhasil');</script>";
	}else{
	echo "<script>alert('Input Gagal');</script>";
	}
	break;
	
	case 'edit' :
		$idx 		= $_POST['idx'];
		$perihal	= $_POST['txtperihal'];
		$nama		= $_POST['txtnama'];
		$tanggal	= ExplodeDate($_POST['txttanggal']);
		$isi		= $_POST['txtisi'];
	$a	= mysql_query("UPDATE kegiatan SET perihal = '$perihal', nama = '$nama', tanggal_kegiatan = '$tanggal', isi = '$isi' WHERE id_kegiatan = '$idx' ");
	if ($a == true){
	echo "<script>alert('Update Berhasil');</script>";
	}else{
	echo "<script>alert('Update Gagal');</script>";
	}
	break;
	
	case 'hapus' :
		$id		= $_GET['id'];
		$a	= mysql_query("DELETE FROM kegiatan WHERE id_kegiatan = '$id' ");
	if ($a == true){
	echo "<script>alert('Hapus Berhasil');</script>";
	}else{
	echo "<script>alert('Hapus Gagal');</script>";
	}
	break;
}
?>
<meta http-equiv="refresh" content="1;url=index_petugas.php?page=kegiatan"/>