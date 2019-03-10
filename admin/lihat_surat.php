<div id="container1">
<h3>Data surat</h3>
<hr/>
<table id="table">
	<?php
	include "includes/koneksi.php";
	$id = $_GET['id'];
	$a = mysql_query("SELECT * FROM surat WHERE id_surat = '$id' ");
	$b = mysql_fetch_array($a);
	$d = report_date($b[tanggal]);
	$e = report_date($b[tanggal_buat]);
		echo "<tr><td align='left'>Nama Lengkap </td><td align='center'>:</td><td >$b[nama]</td></tr>";
		echo "<tr><td align='left'>Alamat </td><td align='center'>:</td><td>$b[alamat]</td></tr>";
		echo "<tr><td align='left'>Pekerjaan </td><td align='center'>:</td><td>$b[pekerjaan]</td></tr>";
		echo "<tr><td align='left'>jenis Kelamin </td><td align='center'>:</td><td>$b[gender]</td></tr>";
		echo "<tr><td align='left'>Tempat / tgl. lahir </td><td align='center'>:</td><td>$b[tempat], $d</td></tr>";
		echo "<tr><td align='left'>Agama </td><td align='center'>:</td><td>$b[agama]</td></tr>";
		echo "<tr><td align='left'>Kawin / tidak kawin </td><td align='center'>:</td><td>$b[kawin]</td></tr>";
		echo "<tr><td align='left'>Kewarnegaraan </td><td align='center'>:</td><td>$b[kewar]</td></tr>";
		echo "<tr><td align='left'>NIK </td><td align='center'>:</td><td>$b[nik]</td></tr>";
		echo "<tr><td align='left'>Keperluan </td><td align='center'>:</td><td>$b[keperluan]</td></tr>";
		echo "<tr><td align='left'>Tanggal Buat </td><td align='center'>:</td><td>$e</td></tr>";
	?>
</table>
<a style='cursor:pointer;' border='0' onclick="javascript:window.location.href='index.php?page=surat';"><img src='images/back.png' title='Kembali ke daftar pengumuman' alt='Kembali' width='30' height='30' border='0' /></a>
</div>