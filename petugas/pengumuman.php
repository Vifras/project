<div id="container1">
<style type="text/css">
tr:nth-child(even) {background-color: #f2f2f2}
</style><h3>Pengaturan Pengumuman</h3>
<hr>
<form method="POST" style="display:inline-block; " action="index_petugas.php?page=pengumuman">
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
	<th>Tanggal</th>
	<th>Judul Pengumuman</th>
	<th>Pengirim</th>
	<th colspan="3">Proses</th>
</tr>
<?php
	$jumlah = mysql_query("SELECT * FROM pengumuman");
	$total = mysql_num_rows($jumlah);
	$data = 5;
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

	$a = mysql_query("SELECT * FROM pengumuman WHERE judul LIKE '%$katakunci%' OR pengirim LIKE '%$katakunci%' ORDER BY date ASC LIMIT $start, $data");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='4' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
		$data_date=$b['date'];
	    $tgl_ind=report_date($data_date);
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>",$tgl_ind)."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:orange'><i>".$katakunci."</i></b>",$b['judul'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:green'><i>".$katakunci."</i></b>",$b['pengirim'])."</td>";
			echo "<td align='right'><img src='images/b_browse.png' title='Lihat' border='0' onclick=\"javascript:window.location.href='index_petugas.php?page=lihat_pengumuman&id=$b[id_pengumuman]';\"></td>";
			echo "<td align='center'><img src='images/b_edit.png' title='Edit' border='0' onclick=\"javascript:window.location.href='index_petugas.php?page=pengumuman_edit&id=$b[id_pengumuman]';\"></td>";
			echo "<td align='left'> <img src='images/trash.png' title='Hapus' border='0' onclick=\"javascript: if(confirm('Data ingin dihapus ?')==true){window.location.href='index_petugas.php?page=pengumuman_proses&id=$b[id_pengumuman]&aksi=hapus';}\"/></td>";
			echo "</tr>";
			$no++;
		}
	}		
	?>
</table>
<?php 
echo "Total data yang ditampilkan = $total Data";

echo "<center>";
if($start !=0){
	echo "&nbsp;<a style='font-size:17px' href='index_petugas.php?page=pengumuman&start=".($start-$data)."'>Prev</a>";
}

for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index_petugas.php?page=pengumuman&start=$x'>".($i+1)."</a>]";
	}
}

if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index_petugas.php?page=pengumuman&start=".($start+$data)."'>Next</a>";
}
?>
<br>
<br>
<a href="index_petugas.php?page=tambahpengumuman" class="btn-login"> 
<input type="button" value="Tambah pengumuman" class="btn-login" /> </a>
</div>