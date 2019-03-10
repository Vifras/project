<?php
switch($_REQUEST['aksi'])
{
	case 'tambah' :
		$alamat		= $_POST['txtalamat'];
		$rt			= $_POST['cbrt'];
		$rw			= $_POST['cbrw'];
		$kelu		= $_POST['txtkelu'];
		$keca		= $_POST['txtkeca'];
		$kota		= $_POST['txtkota'];
		$kode		= $_POST['txtkode'];
		$pro		= $_POST['txtpro'];
		$a	= mysql_query("INSERT INTO profil VALUES('', '$rt','$rw', '$alamat','$kelu','$keca','$kota','$kode','$pro')");
	if ($a == true){
	echo "<script>alert('Input Berhasil');</script>";
	}else{
	echo "<script>alert('Input Gagal');</script>";
	}
	break;
	
	case 'edit' :
		$idx 		= $_POST['idx'];
		$alamat		= $_POST['txtalamat'];
		$rt			= $_POST['cbrt'];
		$rw			= $_POST['cbrw'];
		$kelu		= $_POST['txtkelu'];
		$keca		= $_POST['txtkeca'];
		$kota		= $_POST['txtkota'];
		$kode		= $_POST['txtkode'];
		$pro		= $_POST['txtpro'];
	$a	= mysql_query("UPDATE profil SET id = '', nik_rt = '$rt', nik_rw = '$rw', alamat = '$alamat', kelurahan = '$kelu', kecamatan = '$keca', kota = '$kota', kodepos = '$kode', provinsi = '$pro' WHERE id = '$idx' ");
	if ($a == true){
	echo "<script>alert('Update Berhasil');</script>";
	}else{
	echo "<script>alert('Update Gagal');</script>";
	}
	break;
	
}
?>
<meta http-equiv="refresh" content="1;url=index_petugas.php?page=profil"/>