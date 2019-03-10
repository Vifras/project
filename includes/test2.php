<?php
include "admin/includes/koneksi.php";
?>
<link rel="stylesheet" href="admin/includes/popup-calendar/dhtmlgoodies_calendar.css" media="screen"></link>
<script type="text/javascript" src="admin/includes/popup-calendar/dhtmlgoodies_calendar.js"></script>
<h2 align="center">Laporan Saldo Iuran</h2>
<hr/>
<style type="text/css">
</style>
<form action="test2.php" method="POST">
<table>
	<tr>
		<td>Dari Tanggal : </td>
		<td><input type="text" name="txttanggalawal" id="txttanggalawal" size="10" value="" />&nbsp;<img src="admin/includes/popup-calendar/calendar.gif" width="24" height="12" onclick="displayCalendar(document.getElementById('txttanggalawal'),'dd/mm/yyyy',this)" style="cursor:pointer"></td>
		<td>&nbsp; | &nbsp;</td>
		<td>Sampai Tanggal : </td>
		<td><input type="text" name="txttanggalakhir" id="txttanggalakhir" size="10" value="" />&nbsp;<img src="admin/includes/popup-calendar/calendar.gif" width="24" height="12" onclick="displayCalendar(document.getElementById('txttanggalakhir'),'dd/mm/yyyy',this)" style="cursor:pointer"></td>
		<td>&nbsp;<input type="submit" value="Cari" name="cari"></td>
		<td>&nbsp;<input type="reset" value="Batal"></td>
	</tr>
</table>
</form>
	<?php
	if(isset($_POST['cari']))
		
	?>