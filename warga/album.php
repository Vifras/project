<style type="text/css">
	hr{
		border-style: dotted;
	}
	h1{
		margin-top: -5px;
	}	
	table{
		padding-left: auto;
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
<h1>Album Kampung</h1>
<hr>
<table>
<?php
$jumlah = mysql_query("SELECT * FROM album");
	$total = mysql_num_rows($jumlah);
	$data = 12;
	$hal = ceil($total/$data);
	if(isset($_GET['start'])){
		$start = $_GET['start'];
	}else{
		$start = 0;
	}
echo "<tr><td><ul style='list-style-type:none' id='produk'>";
$a = mysql_query("SELECT * FROM album LIMIT $start, $data");
while($b = mysql_fetch_array($a)){
$c = $b[0];
$nama = $b[nama];
$id = $b[id];
$d = mysql_query("SELECT * FROM album_detil WHERE id = '$c' ORDER BY RAND()");
$e = mysql_fetch_array($d);
$f = mysql_num_rows($d);

	if($f == 0){
	echo "<a href='#' onclick=\"javascript:alert('Maaf, album masih kosong..!')\" class='tooltip' title='$nama' alt='$nama'>
				<li class='lis-produk'>
					<div class='isi'><img src='admin/images/no-image.jpg'></div>
				</li>
			</a>";
	}else{
	echo "<a href='index.php?page=album_detil&id=$id' class='tooltip' title='$nama' alt='$nama'>
				<li class='lis-produk'>
					<div class='isi'><img src='admin/$e[foto]' ></div>
				</li></a>";
	}
	}echo "</ul></td></tr>";
?>
</table>
<?php
echo "<table align=center>";
echo "<tr><td>";
if($start !=0){
	echo "<ul class='pagination'><li><a  href='?page=album&start=".($start-$data)."'>&laquo;&laquo;</a></li></ul>";
}
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "<ul class='pagination'><li><a href='#'>".($i+1)."</a></li></ul>";
	}else{
		echo "<ul class='pagination'><li><a href='?page=album&start=$x'>".($i+1)."</a></li></ul>";
	}
}
if($start != $x){
	echo "<ul class='pagination'><li><a href='?page=album&start=".($start+$data)."'>&raquo;&raquo;</a></li></ul>";
	}
echo "</tr></td>";
echo "</table>";
?>