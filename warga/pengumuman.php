<style type="text/css">
	hr{
		border-style: dotted;
	}
	h1{
		margin-top: -5px;
		font-family: halvetica;
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
<h1>Pengumuman</h1>
<hr />
<form class="quick_search" method="POST" style="display:inline-block; margin-top:10px;" action="index.php?page=pengumuman">
	<?php
	if(isset($_POST['txtcari'])){
		$katakunci = $_POST['txtcari'];
	}else{
		$katakunci = "";
	}
	?>
	<input type="text" style="width:200px; margin-top: -5px; margin-left:-1px;" name="txtcari" autocomplete="off" placeholder="Pencarian Pengumuman..." value="<?php echo $katakunci; ?>" onclick="this.select();"/>
	<input type="submit" value="SEARCH" />
</form>
<?php
	$jumlah = mysql_query("SELECT * FROM pengumuman");
	$total = mysql_num_rows($jumlah);
	$data = 4;
	$hal = ceil($total/$data);
	if(isset($_GET['start'])){
		$start = $_GET['start'];
	}else{
		$start = 0;
	}

	echo("
		<table>
		<tr><td>");
	//echo "SELECT * FROM pengumuman ORDER BY date DESC LIMIT $start, $data";
	$a = mysql_query("SELECT * FROM pengumuman WHERE pengumuman LIKE '%$katakunci%' ORDER BY date DESC LIMIT $start, $data");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<b>Belum ada data</b>";
	}else{
	while($b = mysql_fetch_array($a)){
		$pengumuman =$b['pengumuman'];
		$tgl = $b['date'];
		$tgl_ind=report_date($tgl);
			$cuplikan=array();
			$pecah=explode(" ",$pengumuman);
			for ($i=0; $i<50; $i++)
				$cuplikan[$i] = $pecah[$i];
			$cuplikan = implode(" ", $cuplikan);
			$cuplikan = strip_tags($cuplikan);
			$link = "<a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=pengumuman_proses&id=$b[id_pengumuman]';\">&nbsp;&nbsp;Read More &raquo;&raquo;</a>";
		
			echo("<h2 style='margin-top:-5px;'><b>&raquo;  <a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=pengumuman_proses&id=$b[id_pengumuman]';\">".str_replace($katakunci, "<b style='color:orange'><i>".$katakunci."</i></b>",$b['judul'])."</a> &laquo;</h2></b>"); 
				if(sizeof($pecah)<50){
					echo ($cuplikan);
				}else{
					echo ($cuplikan.' . . .'.$link);
				}
			echo("<br/><br/><p>Posted by : <b>$b[pengirim]</b> | 
				Tanggal : <b>$tgl_ind</b></p>
				");	
		}
		echo("</td></tr></table>");
	}
echo "<center>";
if($start !=0){
	echo "<ul class='pagination'><li><a  href='?page=pengumuman&start=".($start-$data)."'>&laquo;&laquo;</a></li></ul>";
}
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "<ul class='pagination'><li><a href='#'>".($i+1)."</a></li></ul>";
	}else{
		echo "<ul class='pagination'><li><a href='?page=pengumuman&start=$x'>".($i+1)."</a></li></ul>";
	}
}
if($start != $x){
	echo "<ul class='pagination'><li><a href='?page=pengumuman&start=".($start+$data)."'>&raquo;&raquo;</a></li></ul>";
}
?>