<div id="container1">
<h3>Data surat</h3>
<hr>
<style type="text/css">
tr:nth-child(even) {background-color: #f2f2f2}
</style>
<form method="POST" style="display:inline-block;" action="index_petugas.php?page=surat">
	<?php
	if(isset($_POST['txtcari'])){
		$katakunci = $_POST['txtcari'];
	}else{
		$katakunci = "";
	}
	?>
	Pencarian : <input type="text" name="txtcari" autocomplete="off" value="<?php echo $katakunci; ?>" onclick="this.select();"/>
	<input type="submit" style="color: #5262BA;  background: url(images/search.png)no-repeat right; background-color: #ABCDEF; " value=""/>
</form>
<table class="table" style="margin-top:-10px;">
	<tr class="table-header">
		<th width="">No.</th>
		<!-- <th width="">No KK</th> -->
		<th width="">NIK</th>
		<th width="">Nama</th>
		<th width="">Alamat</th>
		<!--<th width="">Pekerjaan</th>
		<th width="">Gender</th>
		<th width="">Tempat / tgl. lahir</th>
		<th width="">Agama</th>
		<th width="">Status</th>
		<th width="">Kewar</th>-->
		<th width="">Keperluan</th>
		<th width="">Lihat</th>
	</tr>
	<?php
	//Langkah 1 : Tentukan /cari banyak total data
	$jumlah = mysql_query("SELECT * FROM surat");
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
	$a = mysql_query("SELECT * FROM surat WHERE no_kk LIKE '%$katakunci%' OR nik LIKE '%$katakunci%' OR nama LIKE '%$katakunci%' OR alamat LIKE '%$katakunci%' OR keperluan LIKE '%$katakunci%'  ORDER BY id_surat ASC LIMIT $start, $data");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='3' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			//echo "<td align='center'>".str_replace($katakunci, "<b style='color:orange'><i>".$katakunci."</i></b>",$b['no_kk'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>",$b['nik'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:lime'><i>".$katakunci."</i></b>",$b['nama'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:green'><i>".$katakunci."</i></b>",$b['alamat'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:orange'><i>".$katakunci."</i></b>",$b['keperluan'])."</td>";
			echo "<td align='center'><img src='images/b_browse.png' title='Lihat' border='0' onclick=\"javascript:window.location.href='index_petugas.php?page=lihat_surat&id=$b[id_surat]';\"></td>";
			//echo "<td align='center'>".str_replace($katakunci, "<b style='color:orange'><i>".$katakunci."</i></b>",$b['no_kk'])."</td>";
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
	echo "&nbsp;<a style='font-size:17px' href='index_petugas.php?page=surat&start=".($start-$data)."'>Prev</a>";
}

//Link untuk masing-masing halamannya
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index_petugas.php?page=surat&start=$x'>".($i+1)."</a>]";
	}
}

//Link untuk Next
if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index_petugas.php?page=surat&start=".($start+$data)."'>Next</a>";
}
?>
</div>