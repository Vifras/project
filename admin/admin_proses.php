<?php
include "includes/koneksi.php";

switch($_REQUEST['aksi'])
{	
	case 'hapus' :
		$id		= $_GET['id'];
		$a	= mysql_query("DELETE FROM admin WHERE id='$id' ");
	if ($a == true){
	echo "<script>alert('Selamat, Hapus Berhasil dilakukan');</script>";
	}else{
	echo "<script>alert('Maaf, gagal untuk meng-Hapus ');</script>";
	}
	break;
}
?>
<meta http-equiv="refresh" content="1;url=index.php?page=admin"/>