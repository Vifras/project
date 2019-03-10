<?php
switch ($_REQUEST['aksi']) {
	case 'tambah':
		$nama 		= $_POST['txtnama'];
		$jabatan	= $_POST['cbjabatan'];
		$alamat		= $_POST['txtalamat'];
		$a 	= mysql_query("INSERT INTO eksekutif VALUES('','$nama','$alamat','$jabatan')");
		if ($a == true){
		echo "<script>alert('Input Berhasil');</script>";
		}else{
		echo "<script>alert('Input Gagal');</script>";
		}
		break;
	
	case 'edit' :
		$idx 		= $_POST['idx'];
		$nama		= $_POST['txtnama'];
		$jabatan	= $_POST['cbjabatan'];
		$alamat 	= $_POST['txtalamat'];
	$a	= mysql_query("UPDATE eksekutif SET nama = '$nama', alamat = '$alamat', id_jabatan = '$jabatan' WHERE id_eksekutif = '$idx' ");
	if ($a == true){
	echo "<script>alert('Update Berhasil');</script>";
	}else{
	echo "<script>alert('Update Gagal');</script>";
	}
		break;

	case 'hapus' :
			$id 	= $_GET['id'];
			$a 		= mysql_query("DELETE FROM eksekutif WHERE id_eksekutif = '$id' ");
			if ($a == true){
			echo "<script>alert('Hapus Berhasil');</script>";
			}else{
			echo "<script>alert('Hapus Gagal');</script>";
			}
		break;
}
?>
<meta http-equiv="refresh" content="1;url=index_petugas.php?page=eksekutif"/>