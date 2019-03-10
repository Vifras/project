<?php
// include "includes/koneksi.php";

switch($_REQUEST['aksi'])
{
	case 'tambah' :
		$idx 		= $_POST['idx'];
		$keterangan	= $_POST['txtket'];
		$tanggal	= ExplodeDate($_POST['txttanggal']);
		if(!file_exists("../includes/album")){
		mkdir("../includes/album");
		}
		$asal_file 		= $_FILES['filefoto']['tmp_name'];
		$tujuan_file 	= "../includes/album".$_FILES['filefoto']['name'];
		move_uploaded_file($asal_file, $tujuan_file);
		$a	= mysql_query("INSERT INTO album_detil VALUES('', '$idx','$tujuan_file','$keterangan','$tanggal')");
	if ($a == true){
	echo "<script>alert('Input Berhasil');</script>";
	}else{
	echo "<script>alert('Input Gagal');</script>";
	}
	echo "<meta http-equiv='refresh' content='0;url=index_petugas.php?page=lihat_album&id=$idx'/>";
	break;
	
	case 'edit' :
		$idx			= $_POST['idx'];
		$id 			= $_POST['id'];
		$keterangan 	= $_POST['txtket'];
		$tanggal 		= ExplodeDate($_POST['txttanggal']);
	if ($_POST['cekfoto'] == 'ganti'){
		if(!file_exists("../includes/album")){
			mkdir("../includes/album");
			}
			$asal_file 		= $_FILES['filefoto']['tmp_name'];
			$tujuan_file 	= "../includes/album".$_FILES['filefoto']['name'];
			move_uploaded_file($asal_file, $tujuan_file);
		$a	= mysql_query("UPDATE album_detil SET id_alb = '$idx', id = '$id', foto = '$tujuan_file', keterangan = '$keterangan', tanggal = '$tanggal' WHERE id_alb = '$idx' ");
	}else{
		$a	= mysql_query("UPDATE album_detil SET id_alb = '$idx', id = '$id', keterangan = '$keterangan', tanggal = '$tanggal' WHERE id_alb = '$idx' ");
	}
	if ($a == true){
	echo "<script>alert('Update Berhasil');</script>";
	}else{
	echo "<script>alert('Update Gagal');</script>";
	}
	echo "<meta http-equiv='refresh' content='0;url=index_petugas.php?page=lihat_album&id=$id'/>";
	break;

	case 'hapus' :
		$idx	= $_GET['idx'];
		$id		= $_GET['id'];
		$f = mysql_query("SELECT foto FROM album_detil WHERE id_alb = '$idx' ");
		$foto = mysql_fetch_array($f);
			if(file_exists($foto['foto'])){
				unlink($foto['foto']);
		}
		$a	= mysql_query("DELETE FROM album_detil WHERE id_alb = '$idx' ");
	if ($a == true){
	echo "<script>alert('Hapus Berhasil');</script>";
	}else{
	echo "<script>alert('Hapus Gagal');</script>";
	}
	echo "<meta http-equiv='refresh' content='0;url=index_petugas.php?page=lihat_album&id=$id'/>";
	break;
}
?>