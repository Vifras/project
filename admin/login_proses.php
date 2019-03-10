<?php
session_start();
include "includes/koneksi.php";
include "includes/securimage/securimage.php";
$username	= $_POST['username'];
$password	= $_POST['password'];
$kode		= $_POST['kode'];
$gambar		= new Securimage();
$cocok 		= $gambar->check($kode);
	$a = mysql_query("SELECT * FROM admin WHERE username='$username' AND password= MD5('$password')");
	$jumlah = mysql_num_rows($a);
	if($jumlah==0){
		echo "<script>alert('Username atau Password salah');</script>";
		}else{
		$b = mysql_fetch_array($a);
		echo "<script>alert('Selamat datang, $b[username]');</script>";
		$_SESSION['username']	= $b['username'];
		}
?>
<meta http-equiv="refresh" content="0;url=index.php"/>