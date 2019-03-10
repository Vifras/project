<?php
include "includes/koneksi.php";
?>
<div id="container1">
<script type="text/javascript" src="includes/tinymce/tiny_mce.js"></script>
<script type="text/javascript">
    tinymce.init({
    	selector:'textarea',
    	theme: "simple",
    	width:275,
    	height:125,
    	menubar:false,
    	resize:false,
    	statusbar:false
});
</script>
<button type="button" style="background: url(images/plus.gif) no-repeat right; padding-right: 10px; margin-top:10px; display:inline-block; background-color: #ABCDEF; color: #5262BA;" onclick="javascript: $('.tambah-data').slideToggle(750);">Tambah Data</button>
<form method="POST" style="display:inline-block; " action="index.php?page=kegiatan">
	<?php
	if(isset($_POST['txtcari'])){
		$katakunci = $_POST['txtcari'];
	}else{
		$katakunci = "";
	}
	?>
	<input type="text" name="txtcari" autocomplete="off" value="<?php echo $katakunci; ?>" onclick="this.select();"/>
	<input type="submit" style="color: #5262BA; background: url(images/b_search.png)no-repeat right; background-color: #ABCDEF; " value=""/>
</form>
<div class="tambah-data" style="display:none; width:365px; height:250px; border:1px solid #123ABC; border-radius:10px; background-color: #4D5B67;">
<form method="POST" action="index.php?page=kegiatan_proses">
	<input type="hidden" name="aksi" value="tambah"/>
	<table width="100%" style="margin-left:10px; margin-top:5px;">
		<tr>
			<td style="color:white;">Perihal</td>
			<td><input type="text" name="txtperihal" required /></td>
		</tr>
		<tr>
			<td style="color:white;">Nama</td>
			<td><input type="text" name="txtnama" required /></td>
		</tr>
		<tr>
			<td style="color:white;">Tanggal</td>
		<td>
					<input type="text" name="txttanggal" id="txttanggal" size="10" value="<?php echo date("d/m/Y"); ?>" />&nbsp;<img src="includes/popup-calendar/calendar.gif" width="24" height="12" onclick="displayCalendar(document.getElementById('txttanggal'),'dd/mm/yyyy',this)" style="cursor:pointer">
		</td>
		</tr>
		<tr>
			<td style="color:white;">Isi</td>
			<td><textarea name="txtisi" required> </textarea></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Simpan" style= "background-color: #ABCDEF;"/>
				<input type="reset" value="Hapus" style="background-color: #ABCDEF;"/>
			</td>
		</tr>
	</table>
</form>
</div>
<h3>Data Kegiatan</h3>
<table class="table">
	<tr class="table-header">
		<th width="">No.</th>
		<th width="">Tanggal Kegiatan</th>
		<th width="">Nama</th>
		<th width="">Perihal</th>
		<th width="200px">Isi</th>
		<th width="" colspan="2">Aksi</th>
	</tr>
	<?php
	//Langkah 1 : Tentukan /cari banyak total data
	$jumlah = mysql_query("SELECT * FROM kegiatan");
	$total = mysql_num_rows($jumlah);
	
	//Langkah 2 : Tentukan Banyaknya data perhalaman yang diinginkan
	$data = 5;
	
	//Langkah 3 : cari banyaknya halaman
	$hal = ceil($total/$data);
	
	//Langkah 4 : merubah query dengan menggunakan batas/limit
	if(isset($_GET['start'])){
		$start = $_GET['start'];
	}else{
		$start = 0;
	}
	
	if(isset($_POST['txtcari'])){
		$katakunci = $_POST['txtcari'];
	}else{
		$katakunci = "";
	}
	$a = mysql_query("SELECT * FROM kegiatan WHERE perihal LIKE '%$katakunci%' OR tanggal_kegiatan LIKE '%$katakunci%' OR nama LIKE '%$katakunci%' OR isi LIKE '%$katakunci%' ORDER BY tanggal_kegiatan ASC LIMIT $start, $data");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='7' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
			$data_date=$b['tanggal_kegiatan'];
	    	//$tgl_ind=substr($data_date,8,2)."-".substr($data_date,5,2)."-".substr($data_date,0,4);
	    	$tgl_ind=report_date($data_date);
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:blue'><i>".$katakunci."</i></b>",$tgl_ind)."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:green'><i>".$katakunci."</i></b>",$b['nama'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:blue'><i>".$katakunci."</i></b>",$b['perihal'])."</td>";
			echo "<td align='left' width='50%'>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>",$b['isi'])."</td>";
			//echo "<td align='center'>".str_replace($katakunci, "<b style='color:yellow'><i>".$katakunci."</i></b>",$b['keterangan'])."</td>";
			echo "<td align='center'><img src='images/b_edit.png' title='Edit' border='0' onclick=\"javascript:window.location.href='index.php?page=kegiatan_edit&id=$b[id_kegiatan]';\"></td>";
			echo "<td align='center'> <img src='images/trash.png' title='Hapus' border='0' onclick=\"javascript: if(confirm('Data ingin dihapus ?')==true){window.location.href='index.php?page=kegiatan_proses&id=$b[id_kegiatan]&aksi=hapus';}\"/></td>";
			echo "</tr>";
			$no++;
		}
	}		
	?>
</table>
<?php 
//Langkah 5 = Buat link pagingnya
echo "Total data yang ditampilkan = $total Data";
//Link untuk Prev
echo "<center>";
if($start !=0){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=kegiatan&start=".($start-$data)."'>Prev</a>";
}

//Link untuk masing-masing halamannya
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index.php?page=kegiatan&start=$x'>".($i+1)."</a>]";
	}
}

//Link untuk Next
if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=kegiatan&start=".($start+$data)."'>Next</a>";
}
?>
</div>