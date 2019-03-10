<?php

$a = mysql_query("SELECT SUM(bayar) AS bayar FROM _iuran");
$b = mysql_fetch_array($a);
?>
<style type="text/css">
	#table{
		font-size: 12px;
		width: 100%;
		border-collapse: collapse;
		border:1px solid black;
	}
	#table th {
		padding:7px;
		background-color: #000;
    	color: white;

	}
	#table td{
		padding: 3px;
		border:1px solid black;
		width: auto;
	}
	#table tr:nth-child(even) {background-color: #f2f2f2}
	#table tr:hover {background-color: #f5f5f5}
	h1,h2{
		/*text-align: center;*/
		/*margin-top: -5px;*/
		/*margin-bottom: -5px;*/
	}
	hr{
		border-style: dotted;
	}
	h1{
		margin-top: -5px;
		font-family: halvetica;
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
<h1>Laporan Iuran</h1>
<hr>
<form action="index.php?page=lap_iuran" method="POST">
<?php
if(isset($_POST['cari'])){
		$tanggalawal = $_POST['txttanggalawal'];
		$tanggalakhir= $_POST['txttanggalakhir'];
	}else{
		$tanggalawal = "";
		$tanggalakhir= "";
	}
?>
<table style="width: 100%;">
	<tr>
		<td><input type="text" name="txttanggalawal" id="txttanggalawal" style="width: 75px;" value="<?php echo $tanggalawal; ?>" onclick="this.select();" required />&nbsp;<img src="includes/popup-calendar/calendar.gif" width="24" height="12" onclick="displayCalendar(document.getElementById('txttanggalawal'),'yyyy/mm/dd',this)" style="cursor:pointer"></td>
		<td> - </td>
		<td><input type="text" name="txttanggalakhir" id="txttanggalakhir"  style="width: 75px;" value="<?php echo $tanggalakhir; ?>" onclick="this.select();" required />&nbsp;<img src="includes/popup-calendar/calendar.gif" width="24" height="12" onclick="displayCalendar(document.getElementById('txttanggalakhir'),'yyyy/mm/dd',this)" style="cursor:pointer"></td>
		<td align="center">&nbsp;<input type="submit" value="Cari" name="cari">&nbsp;<input type="reset" value="Batal"></td>
	</tr>
</table>
</form>
<table id="table" style="margin-top: 5px;">
<tr id="table-header">
	<th>No.</th>
	<th>Tanggal</th>
	<th>Keterangan</th>
	<th>Keluar</th>
	<th>Masuk</th>
	<th>Saldo</th>
</tr>
<?php
	$jumlah = mysql_query("SELECT * FROM _lap_iuran");
	$total = mysql_num_rows($jumlah);
	$data = 15;
	$hal = ceil($total/$data);

		if(isset($_GET['start'])){
			$start = $_GET['start'];
		}else{
			$start = 0;
		}

		if(@$_POST['txttanggalawal']=='' && @$_POST['txttanggalakhir']==''){
			$filter = "";
		}else{
			$tanggalawal = $_POST['txttanggalawal'];
			$tanggalakhir= $_POST['txttanggalakhir'];
			$filter = "AND tgl BETWEEN '$tanggalawal' AND '$tanggalakhir'";
		}
		// echo "SELECT * FROM _lap_iuran WHERE true ".$filter." ORDER BY tgl ASC LIMIT $start, $data";
	$a = mysql_query("SELECT * FROM _lap_iuran WHERE true ".$filter." ORDER BY tgl ASC LIMIT $start, $data");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='7' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
		$data_date=$b['tgl'];
	    $tgl_ind=substr($data_date,8,2)."-".substr($data_date,5,2)."-".substr($data_date,0,4);
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			echo "<td align='center'>$tgl_ind</td>";
			echo "<td>$b[ket]</td>";
			echo "<td align='center'>$b[keluar]</td>";
			echo "<td align='center'>$b[masuk]</td>";
			echo "<td align='center'>$b[saldo]</td>";
			echo "</tr>";
			$no++;
		}
	}	
		$i=mysql_query("SELECT sum(masuk) as masuk FROM _lap_iuran WHERE true ".$filter);
		$j=mysql_fetch_array($i);
		$masuk = $j['masuk'];
		$k=mysql_query("SELECT sum(keluar) as keluar FROM _lap_iuran WHERE true ".$filter);
		$l=mysql_fetch_array($k);	
		$keluar = $l['keluar'];
		$m=mysql_query("SELECT saldo FROM _lap_iuran WHERE true ".$filter);
		$n=mysql_fetch_array($m);	
		$saldo = $n['saldo'];
	?>
	<tr style="color:white;background-color: grey;">
	<td colspan='3'>Total (Rp.)</td>
	<td align="center"><?php echo $keluar;?></td>
	<td align="center"><?php echo $masuk;?></td>
	<td align="center"><?php echo $masuk-$keluar; ?></td>
	</tr>
</table>
<?php 
echo "<br/><center>";
if($start !=0){
	echo "<ul class='pagination'><li><a  href='?page=lap_iuran&start=".($start-$data)."'>&laquo;&laquo;</a></li></ul>";
}
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "<ul class='pagination'><li><a href='#'>".($i+1)."</a></li></ul>";
	}else{
		echo "<ul class='pagination'><li><a href='?page=lap_iuran&start=$x'>".($i+1)."</a></li></ul>";
	}
}
if($start != $x){
	echo "<ul class='pagination'><li><a href='?page=lap_iuran&start=".($start+$data)."'>&raquo;&raquo;</a></li></ul>";
}
?>