<?php
switch($_REQUEST['aksi'])
{
	case 'tambah' :
		$no_kk		= $_POST['txtkk'];
		$jenis		= $_POST['cbjenis'];
		$kep		= $_POST['txtkep'];
		$alamat		= $_POST['txtalamat'];
		$rt			= $_POST['txtrt'];
		$rw			= $_POST['txtrw'];
		$kelu		= $_POST['txtkelu'];
		$keca		= $_POST['txtkeca'];
		$kota		= $_POST['txtkota'];
		$kode		= $_POST['txtkode'];
		$pro		= $_POST['txtpro'];
		$a	= mysql_query("INSERT INTO keluarga VALUES('$no_kk', '$jenis', '$kep', '$alamat','$rt','$rw','$kelu','$keca','$kota','$kode','$pro')");
	if ($a == true){
	echo "<script>alert('Input Berhasil');</script>";
	}else{
	echo "<script>alert('Input Gagal');</script>";
	}
	break;
	
	case 'edit' :
		$no_kk		= $_POST['txtkk'];
		$jenis		= $_POST['cbjenis'];
		$idx 		= $_POST['idx'];
		$kep		= $_POST['txtkep'];
		$alamat		= $_POST['txtalamat'];
		$rt			= $_POST['txtrt'];
		$rw			= $_POST['txtrw'];
		$kelu		= $_POST['txtkelu'];
		$keca		= $_POST['txtkeca'];
		$kota		= $_POST['txtkota'];
		$kode		= $_POST['txtkode'];
		$pro		= $_POST['txtpro'];
	$a	= mysql_query("UPDATE keluarga SET no_kk = '$no_kk', id_jenis_keluarga = '$jenis', kepkel = '$kep', alamat = '$alamat', rt = '$rt', rw = '$rw', kelurahan = '$kelu', kecamatan = '$keca', kota = '$kota', kode_pos = '$kode', propinsi = '$pro' WHERE no_kk = '$idx' ");
	if ($a == true){
	echo "<script>alert('Update Berhasil');</script>";
	}else{
	echo "<script>alert('Update Gagal');</script>";
	}
	break;
	
	case 'hapus' :
		$id		= $_GET['id'];
		$a	= mysql_query("DELETE FROM keluarga WHERE no_kk = '$id' ");
	if ($a == true){
	echo "<script>alert('Hapus Berhasil');</script>";
	}else{
	echo "<script>alert('Hapus Gagal');</script>";
	}
	break;
}
?>
<meta http-equiv="refresh" content="1;url=index_petugas.php?page=keluarga"/>