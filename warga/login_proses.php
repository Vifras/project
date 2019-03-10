<?php
session_start();
include "../admin/includes/koneksi.php";
$nama	= $_POST['nama'];
$nokk	= $_POST['txtkk'];
	//jika kode yang dimasukkan dan dituliskan sama
	$a = mysql_query("SELECT A.no_kk, B.jenis_keluarga, A.kepkel, A.alamat, A.rt, A.rw, A.kelurahan, A.kecamatan, A.kota, A.kode_pos, A.propinsi FROM keluarga AS A INNER JOIN jenis_keluarga AS B ON (A.id_jenis_keluarga = B.id_jenis_keluarga) WHERE A.kepkel='$nama' AND A.no_kk= '$nokk'");
	$jumlah = mysql_num_rows($a);
	if($jumlah==0){
		echo "<script>alert('Nama Kepala keluarga atau No. KK milik anda salah atau mungkin anda bukan warga kampung !');</script>";
		}else{
		$b = mysql_fetch_array($a);
		echo "<script>alert('Selamat datang, $b[kepkel] !');</script>";
		$_SESSION['nokk']	= $b['no_kk'];
		$_SESSION['kepkel']	= $b['kepkel'];
		$_SESSION['jenis']	= $b['jenis_keluarga'];
		$_SESSION['alamat']	= $b['alamat'];

		}
?>
<meta http-equiv="refresh" content="0;url=../index.php"/>