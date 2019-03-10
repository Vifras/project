<?php
include "includes/koneksi.php";
?>
<style type="text/css">
tr:nth-child(even) {background-color: #FFF}
</style>
<div id="container1">
<h3>Pengaturan Eksekutif</h3>
<hr>
<form method="POST" style="display:inline-block; " action="index.php?page=eksekutif">
<?php
if(isset($_POST['txtcari'])){
	$katakunci = $_POST['txtcari'];
}else{
	$katakunci = "";
}
?>
Pencarian : <input type="text" name="txtcari" placeholder="" autocomplete="off" value="<?php echo $katakunci; ?>" onclick="this.select();"/>
<input type="submit" style="color: #5262BA;  background: url(images/search.png)no-repeat right;background-color: #ABCDEF;" value=""/>
</form>
<table class="table" style="margin-top: -10px;">
<tr class="table-header">
	<th>No.</th>
	<th>Nama</th>
	<th>Jabatan</th>
	<th>Alamat</th>
	<th colspan="2">Proses</th>
</tr>
<?php
	$jumlah = mysql_query("SELECT * FROM eksekutif");
	$total = mysql_num_rows($jumlah);
	$data = 10;
	$hal = ceil($total/$data);

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

	$a = mysql_query("SELECT A.id_eksekutif, A.nama, A.alamat, B.id_jabatan, B.jabatan FROM eksekutif AS A INNER JOIN jabatan AS B ON (A.id_jabatan = B.id_jabatan) WHERE A.nama LIKE '%$katakunci%' OR A.alamat LIKE '%$katakunci%' OR B.jabatan LIKE '%$katakunci%' ORDER BY B.id_jabatan ASC LIMIT $start, $data");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='5' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>",$b['nama'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:orange'><i>".$katakunci."</i></b>",$b['jabatan'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:yellow'><i>".$katakunci."</i></b>",$b['alamat'])."</td>";
			echo "<td align='center'><img src='images/b_edit.png' title='Edit' border='0' onclick=\"javascript:window.location.href='index.php?page=eksekutif_edit&id=$b[id_eksekutif]';\"></td>";
			echo "<td align='center'> <img src='images/trash.png' title='Hapus' border='0' onclick=\"javascript: if(confirm('Data ingin dihapus ?')==true){window.location.href='index.php?page=eksekutif_proses&id=$b[id_eksekutif]&aksi=hapus';}\"/></td>";
			echo "</tr>";
			$no++;
		}
	}		
	?>
</table>
<?php 
echo "Total Eksekutif = $total";

echo "<center>";
if($start !=0){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=eksekutif&start=".($start-$data)."'>Prev</a>";
}

for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index.php?page=eksekutif&start=$x'>".($i+1)."</a>]";
	}
}

if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=eksekutif&start=".($start+$data)."'>Next</a>";
}
?>
<br>
<br>
<a href="index.php?page=tambaheksekutif" class="btn-login"> 
<input type="button" value="Tambah Eksekutif" class="btn-login" /></a>
</div>