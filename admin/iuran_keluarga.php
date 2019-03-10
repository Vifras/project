<?php
include "includes/koneksi.php";
?>
<div id="container1">
<style type="text/css">
tr:nth-child(even) {background-color: #FFF}
</style>
<h3>Pengaturan Iuran Kampung</h3>
<hr>
<form method="POST" style="display:inline-block; " action="index.php?page=iuran_keluarga">
	<?php
	if(isset($_POST['txtcari'])){
		$katakunci = $_POST['txtcari'];
	}else{
		$katakunci = "";
	}
	?>
	Pencarian : <input type="text" name="txtcari" autocomplete="off" value="<?php echo $katakunci; ?>" onclick="this.select();"/>
	<input type="submit" style="color: #5262BA; background: url(images/b_search.png)no-repeat right; background-color: #ABCDEF; " value=""/>
</form>
<table class="table" style="margin-top:-5px">
	<tr class="table-header">
		<th width="">No.</th>
		<th width="">No. KK</th>
		<th width="">Kepala Keluarga</th>
		<th width="">Alamat</th>
		<th width="">View</th>
	</tr>
	<?php
	//Langkah 1 : Tentukan /cari banyak total data
	$jumlah = mysql_query("SELECT * FROM keluarga");
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
	$a = mysql_query("SELECT * FROM keluarga WHERE no_kk LIKE '%$katakunci%' OR kepkel LIKE '%$katakunci%' OR alamat LIKE '%$katakunci%' ORDER BY no_kk ASC LIMIT $start, $data"
		);
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='4' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>",$b['no_kk'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:blue'><i>".$katakunci."</i></b>",$b['kepkel'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:green'><i>".$katakunci."</i></b>",$b['alamat'])."</td>";
			echo "<td align='center'><img src='images/b_browse.png' title='Atur iuran keluarga' border='0' onclick=\"javascript:window.location.href='index.php?page=lihat_iuran&id=$b[no_kk]';\"></td>";
			echo "</tr>";
			$no++;
		}
	}		
	?>
</table>
<?php 
//Langkah 5 = Buat link pagingnya
echo "Total KK = $total data";
//Link untuk Prev
echo "<center>";
if($start !=0){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=iuran_keluarga&start=".($start-$data)."'>Prev</a>";
}

//Link untuk masing-masing halamannya
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index.php?page=iuran_keluarga&start=$x'>".($i+1)."</a>]";
	}
}

//Link untuk Next
if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=iuran_keluarga&start=".($start+$data)."'>Next</a>";
}
?>
</div>