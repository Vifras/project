<?php
include "includes/koneksi.php";
$id = $_GET['id'];
$a = mysql_query("SELECT * FROM album WHERE id = '$id' ");
$b = mysql_fetch_array($a);
?>
<div id='container1'>
<button type="button" style="background: url(images/plus.gif) no-repeat right; padding-right: 10px; margin-top:10px; display:inline-block; background-color: #ABCDEF; color: #5262BA;" onclick="javascript: $('.tambah-data').slideToggle(750);">Tambah Data</button>
<form method="POST" style="display:inline-block; " action="index.php?page=lihat_album&id=<?php echo $id ?>">
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
<div class="tambah-data" style="display:none; width:325px; height:115px; border:1px solid #123ABC; border-radius:10px; background-color: #4D5B67;">
<form method="POST" action="index.php?page=album_detail_proses" enctype="multipart/form-data">
	<input type="hidden" name="aksi" value="tambah"/>
	<input type="hidden" name="idx" value="<?php echo $b[id] ?>">
	<table width="100%" style="margin-left:10px; margin-top:5px;">
		<tr>
			<td style="color:white;">Foto</td>
			<td><input type="file" name="filefoto" required></td>
		</tr>
		<tr>
			<td style="color:white;">Keterangan</td>
			<td><input type="text" name="txtket" required> 
		</tr>
		<tr>
			<td style="color:white;">Tanggal</td>
		<td>
					<input type="text" name="txttanggal" id="txttanggal" size="10" value="<?php echo date("d/m/Y"); ?>" />&nbsp;<img src="includes/popup-calendar/calendar.gif" width="24" height="12" onclick="displayCalendar(document.getElementById('txttanggal'),'dd/mm/yyyy',this)" style="cursor:pointer" required>
		</td>
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
<h3>Upload Foto : <i>"<?php echo $b['nama'] ?>"</i></h3>
<table class="table">
	<tr class="table-header">
		<th width="">No.</th>
		<th width="">Foto</th>
		<th width="">Keterangan</th>
		<th width="">Tanggal</th>
		<th width="">Edit</th>
		<th width="">Hapus</th>
	</tr>
	<?php
	//Langkah 1 : Tentukan /cari banyak total data
	$jumlah = mysql_query("SELECT * FROM album_detil WHERE id = '$id' ");
	$total = mysql_num_rows($jumlah);
	
	//Langkah 2 : Tentukan Banyaknya data perhalaman yang diinginkan
	$data = 10;
	
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
	$a = mysql_query("SELECT * FROM album_detil WHERE keterangan LIKE '%$katakunci%' AND id = '$id' ORDER BY id_alb ASC LIMIT $start, $data");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='6' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			echo "<td align='center'><img src='$b[foto]' width='100' height='100'/></td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>",$b['keterangan'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>",report_date($b['tanggal']))."</td>";
			echo "<td align='center'><img src='images/b_edit.png' title='Edit' border='0' onclick=\"javascript:window.location.href='index.php?page=album_detail_edit&id=$b[id]&idx=$b[id_alb]';\"></td>";
			echo "<td align='center'> <img src='images/trash.png' title='Hapus' border='0' onclick=\"javascript: if(confirm('Data ingin dihapus ?')==true){window.location.href='index.php?page=album_detail_proses&idx=$b[id_alb]&id=$id&aksi=hapus';}\"/></td>";
			echo "</tr>";
			$no++;
		}
	}		
	?>
</table>
<?php 
//Langkah 5 = Buat link pagingnya
echo "Total data yang ditampilkan = $total Data";
echo "&nbsp; | <a href='index.php?page=album'>Kembali</a>";
//Link untuk Prev
echo "<center>";
if($start !=0){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=album&start=".($start-$data)."'>Prev</a>";
}

//Link untuk masing-masing halamannya
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index.php?page=album&start=$x'>".($i+1)."</a>]";
	}
}

//Link untuk Next
if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=album&start=".($start+$data)."'>Next</a>";
}
?>
</div>