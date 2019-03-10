<style type="text/css">
	p{
		font-size: 12px;
		text-indent: 20px;
		font-family: arial;
	}
	h2{
		margin-top: -5px;
	}
	hr{
		border-style: dotted;
	}
</style>
<?php
$a = mysql_query("SELECT * FROM profil");
$b = mysql_fetch_array($a);
echo "<h2>Sistem Informasi Manajemen RT & RW</h2>
<hr/>
<p>Hai !!! Selamat datang di <b> Kampung $b[alamat]</b>, Silahkan pilih menu yang ada untuk dapat melakukan info yang anda cari. Untuk warga kampung silahkan login untuk akses yang lebih banyak :D</p>
<center><img src='images/sby.jpg' width='250' /></center>
";
?>
