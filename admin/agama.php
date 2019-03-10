<?php
include "includes/koneksi.php";
?>
<div id="container1">
<button type="button" style="background: url(images/plus.gif) no-repeat right; padding-right: 10px; margin-top:10px; display:inline-block; background-color: #ABCDEF; color: #5262BA;" onclick="javascript: $('.tambah-data').slideToggle(750);">Tambah Data</button>
<form method="POST" style="display:inline-block; margin-top:10px;" action="index.php?page=agama">
	<?php
	if(isset($_POST['txtcari'])){
		$katakunci = $_POST['txtcari'];
	}else{
		$katakunci = "";
	}
	?>
	<input type="text" name="txtcari" autocomplete="off" value="<?php echo $katakunci; ?>" onclick="this.select();"/>
	<input type="submit" style="color: #5262BA;  background: url(images/search.png)no-repeat right; background-color: #ABCDEF; " value=""/>
</form>
<div class="tambah-data" style="display:none; width:250px; height:65px; border:1px solid #123ABC; border-radius:10px; background-color: #4D5B67;">
<form method="POST" action="index.php?page=agama_proses" enctype="multipart/form-data">
	<input type="hidden" name="aksi" value="tambah"/>
	<table width="100%" style="margin-left:10px; margin-top:5px;">
		<tr>
			<td style="color:white;">Agama</td>
			<td><input type="text" name="txtagama" required /></td>
		</tr>
			<td colspan="2">
				<input type="submit" value="Simpan" style= "background-color: #ABCDEF;"/>
				<input type="reset" value="Hapus" style="background-color: #ABCDEF;"/>
			</td>
		</tr>
	</table>
</form>
</div>
<h3 style="padding-bottom: 5px; margin-top: 5px;">Data Agama</h3>
<table class="table" style="margin-top:-1px;">
	<tr class="table-header">
		<th width="">No.</th>
		<th width="">Agama</th>
		<th colspan="2" width="">Aksi</th>
	</tr>
	<?php
	//Langkah 1 : Tentukan /cari banyak total data
	$jumlah = mysql_query("SELECT * FROM agama");
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
	$a = mysql_query("SELECT id_agama, agama FROM agama WHERE agama LIKE '%$katakunci%' ORDER BY agama ASC LIMIT $start, $data");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='3' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:orange'><i>".$katakunci."</i></b>",$b['agama'])."</td>";
			echo "<td align='center'><img src='images/b_edit.png' title='Edit' border='0' onclick=\"javascript:window.location.href='index.php?page=agama_edit&id=$b[id_agama]';\"></td>";
			echo "<td align='center'> <img src='images/trash.png' title='Hapus' border='0' onclick=\"javascript: if(confirm('Data ingin dihapus ?')==true){window.location.href='index.php?page=agama_proses&id=$b[id_agama]&aksi=hapus';}\"/></td>";
			echo "</tr>";
			$no++;
		}
	}		
	?>
</table>
<?php 
//Langkah 5 = Buat link pagingnya
echo "Total Agama = $total Data";
//Link untuk Prev
echo "<center>";
if($start !=0){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=agama&start=".($start-$data)."'>Prev</a>";
}

//Link untuk masing-masing halamannya
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index.php?page=agama&start=$x'>".($i+1)."</a>]";
	}
}

//Link untuk Next
if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=agama&start=".($start+$data)."'>Next</a>";
}
?>
</div>