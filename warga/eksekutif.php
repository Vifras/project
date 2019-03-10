<style type="text/css">
	hr{
		border-style: dotted;
	}
	h1{
		margin-top: -5px;
	}
	p{
		font-size: 12px;
	}
	ul.pagination {
    display: inline-block;
    padding: 0;
    margin: 0;
}

ul.pagination li {display: inline;}

ul.pagination li a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
    font-size: 18px;
}
</style>
<?php
$judul= mysql_query("SELECT A.id, A.alamat, A.kelurahan, A.kecamatan, A.kota, A.kodepos, A.provinsi, B.rw, C.rt FROM profil AS A INNER JOIN rw AS B INNER JOIN rt AS C ON (A.nik_rw = B.nik_rw) AND (A.nik_rt = C.nik_rt)");
	while($pecah=mysql_fetch_array($judul)){
		echo "<h1>Eksekutif Kampung $pecah[alamat]</h1>";
	}
echo "<hr/>";
$jumlah = mysql_query("SELECT * FROM eksekutif");
	$total = mysql_num_rows($jumlah);
	$data = 5;
	$hal = ceil($total/$data);
	if(isset($_GET['start'])){
		$start = $_GET['start'];
	}else{
		$start = 0;
	}
echo "<table>";
$a= mysql_query("SELECT A.id_eksekutif, A.nama, A.alamat, B.id_jabatan, B.jabatan FROM eksekutif AS A INNER JOIN jabatan AS B ON (A.id_jabatan = B.id_jabatan) LIMIT $start, $data ");
if($jumlah == 0){
		echo "<b>Belum ada data</b>";
	}else{
while($b=mysql_fetch_array($a)){
	echo "<tr>";
	echo "<td>Nama Petugas </td><td> : </td><td> $b[nama]</td></tr>";
	echo "<tr>";
	echo "<td>Jabatan </td><td> : </td><td>$b[jabatan]</td></tr>";
	echo "<tr>";
	echo "<td>Alamat </td><td> : </td><td>$b[alamat]</td></tr>";
	echo "<tr><td><br></td></tr>";
}
}
echo "</table>";
echo "<center>";
if($start !=0){
	echo "<ul class='pagination'><li><a  href='?page=eksekutif&start=".($start-$data)."'>&laquo;&laquo;</a></li></ul>";
}
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "<ul class='pagination'><li><a href='#'>".($i+1)."</a></li></ul>";
	}else{
		echo "<ul class='pagination'><li><a href='?page=eksekutif&start=$x'>".($i+1)."</a></li></ul>";
	}
}
if($start != $x){
	echo "<ul class='pagination'><li><a href='?page=eksekutif&start=".($start+$data)."'>&raquo;&raquo;</a></li></ul>";
	}
?>
