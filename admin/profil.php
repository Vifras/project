<?php
include "includes/koneksi.php";
?>
<style type="text/css">
tr:nth-child(even) {background-color: #FFF}
td{
	text-align: center;
}
</style>
<div id="container1">
<h3>Pengaturan Profil</h3>
<hr>
<table class="table" style="margin-top: -10px;">
<tr class="table-header">
	<th>Rukun Tetangga</th>
	<th>Rukun Warga</th>
	<th>Alamat</th>
	<th>Kelurahan</th>
	<th>Kecamatan</th>
	<th>Kota</th>
	<th>Kode Pos</th>
	<th>Provinsi</th>
	<th colspan="1">Proses</th>
</tr>
<?php
	$a = mysql_query("SELECT A.id, A.alamat, A.kelurahan, A.kecamatan, A.kota, A.kodepos, A.provinsi, B.rw, C.rt FROM profil AS A INNER JOIN rw AS B INNER JOIN rt AS C ON (A.nik_rw = B.nik_rw) AND (A.nik_rt = C.nik_rt) ");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='9' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td>$b[rt]</td>";
			echo "<td>$b[rw]</td>";
			echo "<td>$b[alamat]</td>";
			echo "<td>$b[kelurahan]</td>";
			echo "<td>$b[kecamatan]</td>";
			echo "<td>$b[kota]</td>";
			echo "<td>$b[kodepos]</td>";
			echo "<td>$b[provinsi]</td>";
			echo "<td align='center'><img src='images/b_edit.png' title='Edit' border='0' onclick=\"javascript:window.location.href='index.php?page=profil_edit&id=$b[id]';\"></td>";
			echo "</tr>";
		}
	}		
	?>
</table>
</div>