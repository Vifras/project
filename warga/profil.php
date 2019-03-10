<style type="text/css">
	table{
		font-size: 14px;
	}
	hr{
		border-style: dotted;
	}
	h1{
		margin-top: -5px;
	}
	p{
		font-size: 12px;
	}
</style>
<?php 
echo "<h1>Profil Kampung</h1>";
echo "<hr/>";
echo "<table>";
$a= mysql_query("SELECT A.id, A.alamat, A.kelurahan, A.kecamatan, A.kota, A.kodepos, A.provinsi, B.rw, C.rt FROM profil AS A INNER JOIN rw AS B INNER JOIN rt AS C ON (A.nik_rw = B.nik_rw) AND (A.nik_rt = C.nik_rt)");
while($b=mysql_fetch_array($a)){
	echo "<tr>";
	echo "<td>Alamat &nbsp;&nbsp;&nbsp; </td><td>:</td><td>$b[alamat]</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Rukun Warga &nbsp;&nbsp;&nbsp; </td><td>:</td><td>$b[rw]</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Rukun Tetangga &nbsp;&nbsp;&nbsp; </td><td>:</td><td>$b[rt]</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Kelurahan &nbsp;&nbsp;&nbsp; </td><td>:</td><td>$b[kelurahan]</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Kecamatan &nbsp;&nbsp;&nbsp; </td><td>:</td><td>$b[kecamatan]</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Kota &nbsp;&nbsp;&nbsp; </td><td>:</td><td>$b[kota]</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Kode Pos &nbsp;&nbsp;&nbsp; </td><td>:</td><td>$b[kodepos]</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Provinsi &nbsp;&nbsp;&nbsp; </td><td>:</td><td>$b[provinsi]</td>";
	echo "</tr>";
	echo "</table>";
}

?>
