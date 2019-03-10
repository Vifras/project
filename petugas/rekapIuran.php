<?php 

switch ($_REQUEST['aksi']) {
	case 'cetak':
		$tanggalawal = $_POST['txttanggalawal'];
		$tanggalakhir= $_POST['txttanggalakhir'];
		echo "<script>window.open('rekapIuran_proses.php?awal=$tanggalawal&akhir=$tanggalakhir', '_blank');</script>"; 
		break;
	}

?>
<div id="container1">
<h3>Cetak Laporan Iuran</h3>
<hr/>
<form method="POST" action="">
<input type="hidden" name="aksi" value="cetak">
Dari Tanggal :
		<input type="text" name="txttanggalawal" id="txttanggalawal" size="10" value="<?php echo $tanggalawal; ?>" onclick="this.select();"  />&nbsp;<img src="includes/popup-calendar/calendar.gif" width="24" height="12" onclick="displayCalendar(document.getElementById('txttanggalawal'),'yyyy/mm/dd',this)" style="cursor:pointer">
		&nbsp; | &nbsp;
		Sampai Tanggal :
		<input type="text" name="txttanggalakhir" id="txttanggalakhir" size="10" value="<?php echo $tanggalakhir; ?>" onclick="this.select();" />&nbsp;<img src="includes/popup-calendar/calendar.gif" width="24" height="12" onclick="displayCalendar(document.getElementById('txttanggalakhir'),'yyyy/mm/dd',this)" style="cursor:pointer">
		&nbsp;<input type="submit" value="Cetak" name="cari"/>
		&nbsp;<input type="reset" value="Batal">
</form>
</div>