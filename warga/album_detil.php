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
<?php
$id = $_GET['id'];
$jumlah = mysql_query("SELECT A.id_alb,B.nama,B.id,A.foto,A.keterangan,A.tanggal from album_detil AS A INNER JOIN album AS B ON (A.id = B.id) WHERE B.id = '$id' ");
$judul= mysql_fetch_array($jumlah);
echo "<h1>Album Kampung : <i>".$judul[nama]."</i></h1><hr>";
	$total = mysql_num_rows($jumlah);
	$data = 12;
	$hal = ceil($total/$data);
	if(isset($_GET['start'])){
		$start = $_GET['start'];
	}else{
		$start = 0;
	} 

$query="SELECT A.id_alb,B.nama,B.id,A.foto,A.keterangan,A.tanggal from album_detil AS A INNER JOIN album AS B ON (A.id = B.id) WHERE B.id = '$id' ";
$result=mysql_query($query) or die(mysql_error());
//proses menampilkan data

while($rows=mysql_fetch_object($result)){
		?>

		<a class="fancybox" class="tooltip" title="<?php echo $rows -> keterangan;?> | <?php echo report_date($rows -> tanggal);?>" href='admin/<?=$rows -> foto;?>'
		data-fancybox-group="gallery"> <img class="tooltip" class="img-polaroid"
		title="<?php echo $rows -> keterangan;?> | <?php echo report_date($rows -> tanggal);?>"
		src='admin/<?=$rows -> foto;?>'
		width='100' height='100' alt=""  /> </a>

		<?php
}
?>
<br>
<a style='cursor:pointer;' border='0' onclick="javascript:window.location.href='index.php?page=album'";><img src='images/fancy_nav_left.png' title='Kembali ke album' alt='Kembali' width='30' height='30' border='0' /></a>
<br>
<?php
echo "<table align=center>";
echo "<tr><td>";
if($start !=0){
	echo "<ul class='pagination'><li><a  href='?page=album_detil&start=".($start-$data)."'>&laquo;&laquo;</a></li></ul>";
}
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "<ul class='pagination'><li><a href='#'>".($i+1)."</a></li></ul>";
	}else{
		echo "<ul class='pagination'><li><a href='?page=album_detil&start=$x'>".($i+1)."</a></li></ul>";
	}
}
if($start != $x){
	echo "<ul class='pagination'><li><a href='?page=album_detil&start=".($start+$data)."'>&raquo;&raquo;</a></li></ul>";
	}
echo "</tr></td>";
echo "</table>";
?>