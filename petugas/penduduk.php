<div id="container1">
<h3>Data Penduduk Kampung</h3>
<hr>
<form method="POST" style="display:inline-block; " action="index_petugas.php?page=penduduk">
	<?php
	if(isset($_POST['txtcari'])){
		$katakunci = $_POST['txtcari'];
	}else{
		$katakunci = "";
	}
	?>
	Pencarian : <input type="text" name="txtcari" autocomplete="off" value="<?php echo $katakunci; ?>" onclick="this.select();"/>
	<input type="submit" style="color: #5262BA; background: url(images/b_search.png)no-repeat right; background-color: #ABCDEF;" value=""/>
</form>
<style type="text/css">
tr:nth-child(even) {background-color: #f2f2f2}
</style>
<table style="margin-top:-5px" class="table">
	<tr class="table-header">
		<th width="">No.</th>
		<th width="">Nama</th>
		<!--<th width="">NIK</th>-->
		<th width="">Jenis Kelamin</th>
		<th width="">Agama</th>
		<!--<th width="">Tempat Lahir</th>-->
		<!--th width="">Tanggal Lahir</th>-->
		<th width="">Pendidikan</th>
		<th width="">Pekerjaan</th>
		<th width="">Alamat</th>
	</tr>
	<?php
	//Langkah 1 : Tentukan /cari banyak total data
	$jumlah = mysql_query("SELECT * FROM penduduk");
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
	$a = mysql_query("SELECT A.nama,A.gender,B.agama,C.pendidikan,D.pekerjaan,E.alamat FROM penduduk As A INNER JOIN agama As B INNER JOIN pendidikan As C INNER JOIN pekerjaan As D INNER JOIN keluarga As E ON (A.id_agama = B.id_agama) AND (A.id_pendidikan = C.id_pendidikan) AND (A.id_pekerjaan = D.id_pekerjaan) AND (A.no_kk = E.no_kk) WHERE A.nama LIKE '%$katakunci%' OR A.gender LIKE '%$katakunci%' OR B.agama LIKE '%$katakunci%' OR C.pendidikan LIKE '%$katakunci%' OR D.pekerjaan LIKE '%$katakunci%' OR E.alamat LIKE '%$katakunci%' /* AND  no_kk = '$no_kk' */ ORDER BY A.nama ASC LIMIT $start, $data"
		);
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='9' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			echo "<td align=''>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>",$b['nama'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:'blue'><i>".$katakunci."</i></b>",$b['gender'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:green'><i>".$katakunci."</i></b>",$b['agama'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:blue'><i>".$katakunci."</i></b>",$b['pendidikan'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>",$b['pekerjaan'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:blue'><i>".$katakunci."</i></b>",$b['alamat'])."</td>";
			echo "</tr>";
			$no++;
		}
	}		
	?>
</table>
<?php 
//Langkah 5 = Buat link pagingnya
echo "Total Penduduk Kampung = $total Data";
//Link untuk Prev
echo "<center>";
if($start !=0){
	echo "&nbsp;<a style='font-size:17px' href='index_petugas.php?page=penduduk&start=".($start-$data)."'>Prev</a>";
}

//Link untuk masing-masing halamannya
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index_petugas.php?page=penduduk&start=$x'>".($i+1)."</a>]";
	}
}

//Link untuk Next
if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index_petugas.php?page=penduduk&start=".($start+$data)."'>Next</a>";
}
?>
</div>