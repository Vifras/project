<?php 
include "admin/includes/koneksi.php";
?>
<script type="text/javascript" src="admin/includes/tinymce/tiny_mce.js"></script>
<script type="text/javascript">
    tinymce.init({
    	selector:'textarea',
    	theme: "simple",
    	width:50,
    	height:50,
    	menubar:false,
    	resize:false,
    	statusbar:false
});
</script>
<style type="text/css">

</style>
<link rel="stylesheet" href="admin/includes/popup-calendar/dhtmlgoodies_calendar.css" media="screen"></link>
<script type="text/javascript" src="admin/includes/popup-calendar/dhtmlgoodies_calendar.js"></script>

<form method="POST" action="pembukuan_proses.php">
<h3>Proses Keluar Masuk Iuran</h3>
<table border="1">
	<tr>
		<td>Tanggal</td>
		<td><input type="text" name="txttanggal" id="txttanggal" size="15" autocomplete="off" value="" />&nbsp;<img src="admin/includes/popup-calendar/calendar.gif" width="24" height="12" onclick="displayCalendar(document.getElementById('txttanggal'),'dd/mm/yyyy',this)" style="cursor:pointer"></td>
	</tr>
	<tr>
		<td>Keterangan</td>
		<td><textarea name="txtketerangan"></textarea></td>
	</tr>
	<tr>
		<td>Proses</td>
		<td>
			<input type="radio" name="proses" value="masuk" />Debit
			<input type="radio" name="proses" value="keluar" />Kredit
		</td>
	</tr>
	<tr>
		<td>Jumlah</td>
		<td>Rp.<input type="text" name="txtjumlah" onkeyup="javascript:if(isNaN(this.value)){this.value='0'; this.select();}"></td>
	</tr>
</table>
</form>
