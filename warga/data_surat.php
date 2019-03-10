<?php
session_start();
$_SESSION['nokk'];
?>
<table width="100%" border="1">
<?php 
	$id = $_GET['id'];
	$a = mysql_query("SELECT * FROM surat WHERE no_kk = '".$_SESSION['nokk']."' ");
	$b = mysql_fetch_array($a);
		echo "<tr><td>Nama Lengkap </td><td>:</td><td>$b[nama]</td></tr>";
		echo "<tr><td>Alamat </td><td>:</td><td>$b[alamat]</td></tr>";
		echo "<tr><td>Pekerjaan </td><td>:</td><td>$b[pekerjaan]</td></tr>";
		echo "<tr><td>jenis Kelamin </td><td>:</td><td>$b[gender]</td></tr>";
		echo "<tr><td>Tempat / tgl. lahir </td><td>:</td><td>$b[tempat],$b[tanggal]</td></tr>";
		echo "<tr><td>Agama </td><td>:</td><td>$b[agama]</td></tr>";
		echo "<tr><td>Kawin / tidak kawin </td><td>:</td><td>$b[kawin]</td></tr>";
		echo "<tr><td>Kewarnegaraan </td><td>:</td><td>$b[kewar]</td></tr>";
		echo "<tr><td>NIK </td><td>:</td><td>$b[nik]</td></tr>";
		echo "<tr><td>Keperluan </td><td>:</td><td>$b[keperluan]</td></tr>";
	?>
</table>