<?php 
include "admin/includes/koneksi.php";
?>
<link rel="stylesheet" href="admin/includes/popup-calendar/dhtmlgoodies_calendar.css" media="screen"></link>
<script type="text/javascript" src="admin/includes/popup-calendar/dhtmlgoodies_calendar.js"></script>
<h1 align="center">Data Pemasukan dan Pengeluaran Iuran</h1>
<table align="center" border="1">
	<tr>
		<th>No.</th>
		<th>Tanggal</th>
		<th>Keterangan</th>
		<th>Keluar</th>
		<th>Masuk</th>
		<th>Saldo</th>	
	</tr>

	</tr>
	<form method="POST" action="index.php?page=_iuran_proses&aksi=tambah">
	<?php
	$no=1;
	for($i=0; $i<count($bulan); $i++){
		echo "<tr>";
		echo "<td align='center'>$no</td>";

		echo "<td align='center'>
		<input type='text' name='txttanggal' id='txttanggalawal' value='' />&nbsp;<img src='admin/includes/popup-calendar/calendar.gif' width='24' height='12' onclick=\"displayCalendar(document.getElementById('txttanggalawal'),'dd/mm/yyyy',this)\" style='cursor:pointer;'></td>";

		echo "<td align='center'>keterangan</td>";
		echo "<td align='center'>Keluar</td>";
		echo "<td align='center'>Masuk</td>";
		echo "<td align='center'>Saldo</td>";
		echo "</tr>";
	}
	?>
	</table>
</form>