<?php
include "includes/koneksi.php";
$id = $_GET['id'];
$idx = $_GET['idx'];
$a = mysql_query("SELECT * FROM album_detil WHERE id = '$id' AND id_alb = '$idx' ");
$hasil = mysql_fetch_array($a); 
?>
<div id="container1">
<button type="button" style="margin-top:10px; margin-bottom: 5px; display:inline-block; background: url(images/user_edit.png)no-repeat right; padding-right:15px;background-color: #ABCDEF; color: #5262BA; " onclick="javascript: $('.tambah-data').slideToggle(750);">Update Data</button>
<div class="tambah-data" style="width:325px; height:200px; border:1px solid #123ABC; border-radius:10px; background-color: #4D5B67;">
<form method="POST" action="index.php?page=album_detail_proses" enctype="multipart/form-data">
	<input type="hidden" name="aksi" value="edit"/>
	<input type="hidden" name="id" value="<?php echo $hasil['id'] ?>">
	<input type="hidden" name="idx" value="<?php echo $hasil['id_alb']?>"/>
	<table width="100%" style="margin-left:10px; margin-top:5px;">
		<tr>
			<td style="color:white;">Foto</td>
			<td colspan="2" width="10px">
		<?php
				if(file_exists($hasil['foto'])==true){
					echo "<img src='$hasil[foto]' width='75' height='75' id='foto' />";
					}
				?>
		<input type="checkbox" name="cekfoto" value="ganti" onclick="javascript: if(this.checked==true){ document.getElementById('foto').style.display='none'; }else{ document.getElementById('foto').style.display='block'; }" /> Centang untuk ganti foto
		<input type="file" name="filefoto"/>
		</td>
		</tr>
		<tr>
			<td style="color:white;">Keterangan</td>
			<td><input type="text" name="txtket" value="<?php echo $hasil['keterangan'];?>" required/></td>
		</tr>
		<tr>
			<td style="color:white;">Tanggal</td>
		<td>
			<input type="text" name="txttanggal" id="txttanggal" size="10" value="<?php echo ImplodeDate($hasil['tanggal']); ?>" />&nbsp;<img src="includes/popup-calendar/calendar.gif" width="24" height="12" onclick="displayCalendar(document.getElementById('txttanggal'),'dd/mm/yyyy',this)" style="cursor:pointer">
		</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Update" style= "background-color: #ABCDEF;"/>
				<input type="reset" value="Cancel" style="background-color: #ABCDEF;"/>
				<?php 
				echo "<a style='cursor:pointer;' title='Lihat Kartu Keluarga' border='0' onclick=\"javascript:window.location.href='index.php?page=lihat_album&id=$hasil[id]';\">Lihat Album</a>";
				?>
			</td>
		</tr>
	</table>
</form>
</div>
<h3>Data album</h3>
<table class="table">
	<tr class="table-header">
		<th width="">No.</th>
		<th width="">Foto</th>
		<th width="">Keterangan</th>
		<th width="">Tanggal</th>
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
	?>
	<?php 
	$a = mysql_query("
	SELECT * FROM album_detil WHERE id = '$id' ORDER BY id_alb ASC LIMIT $start, $data
		");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='4' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			echo "<td align='center'><img src='$b[foto]' width='100' height='100'/></td>";
			echo "<td align='center'>$b[keterangan]</td>";
			echo "<td align='center'>".report_date($b[tanggal])."</td>";
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
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=album_detail_edit&start=".($start-$data)."'>Prev</a>";
}

//Link untuk masing-masing halamannya
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index.php?page=album_detail_edit&start=$x'>".($i+1)."</a>]";
	}
}

//Link untuk Next
if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=album_detail_edit&start=".($start+$data)."'>Next</a>";
}
?>
</div>