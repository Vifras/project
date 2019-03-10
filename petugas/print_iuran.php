<?php
include "../admin/includes/koneksi.php";
$tanggalawal	= @$_GET['awal'];
$tanggalakhir	= @$_GET['akhir'];
$d = mysql_query("SELECT * FROM _lap_iuran WHERE tgl BETWEEN '$tanggalawal' AND '$tanggalakhir' ");
// echo "SELECT * FROM _lap_iuran WHERE tgl BETWEEN '$tanggalawal' AND '$tanggalakhir'";
$e = mysql_fetch_array($d);
$tglawal=substr($tanggalawal,8,2)."-".substr($tanggalawal,5,2)."-".substr($tanggalawal,0,4);
$tglakhir=substr($tanggalakhir,8,2)."-".substr($tanggalakhir,5,2)."-".substr($tanggalakhir,0,4);
?>
<style type="text/css">
	.table1{
		font-size: 14px; 
	}
	.table1 td{
		width:30%;
		height:3%;
		width: auto;
		padding: 3px;
	}
	.table {
		margin:auto;
		width: 150%;
		font-size: 13px;
		border:1px solid #5262BA; 
		border-collapse:collapse;  
		-moz-border-radius: 5px 5px 5px 5px; 
		-webkit-border-radius: 5px 5px 5px 5px; 
		border-radius: 5px 5px 5px 5px; 
		-moz-box-shadow:0px 0px 5px #aaa;
	    -webkit-box-shadow:0px 0px 5px #aaa;
	    box-shadow:0px 0px 5px #aaa;
	}
	.table-header{
	background-color: silver; color: #ffffff;
}	
	.table td{
		/*width:12%;*/
		padding: 5px;
		height:2%;
		/*word-wrap:break-word;*/
	}
	.table  th{
		/*width:auto;*/
		padding: 5px;
		height:2%;
		text-align: center;
		/*word-wrap:break-word;*/
	}
	.table td {
    /*border: 2px solid black;*/
    /*border-collapse: collapse;*/
	}

</style>
<page backtop="5mm" backbottom="10mm" backleft="5mm" backright="10mm">
<h1  align="center" >Rekap Laporan Iuran</h1>
<h2 align="center" style="margin-top:-5px;">Periode <?php echo $tglawal." sampai ".$tglakhir ?></h2>
<hr style="margin-top:-5px;">
<br/>
<table class="table1">
<?php	
	$a = mysql_query("SELECT * FROM bendahara WHERE jenis = 'petugas entry' ");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='2' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td>Petugas</td>";
			echo "<td>$b[nama]</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td>Alamat</td>";
			echo "<td>$b[alamat]</td>";
			echo "</tr>";
		}
	}		
	?>
</table>
<table style="margin-top:px" class="table">
	<tr class="table-header">
		<th width="">No.</th>
		<th width="">Tanggal</th>
		<th width="">Keterangan</th>
		<th width="">Keluar</th>
		<th width="">Masuk</th>
		<th width="">Saldo</th>
	</tr>
	<?php
		$tanggalawal	= @$_GET['awal'];
		$tanggalakhir	= @$_GET['akhir'];
		//echo "SELECT * FROM _lap_iuran WHERE tgl BETWEEN '$tanggalawal' AND '$tanggalakhir'";
		$d = mysql_query("SELECT * FROM _lap_iuran WHERE tgl BETWEEN '$tanggalawal' AND '$tanggalakhir' ");
	$jumlah = mysql_num_rows($d);
	if($jumlah == 0){
		echo "<tr><td colspan='9' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($d)){
		$data_date=$b['tgl'];
	    $tgl_ind=substr($data_date,8,2)."-".substr($data_date,5,2)."-".substr($data_date,0,4);
			echo "<tr>";
			echo "<td width='3' align='center'>$no.</td>";
			echo "<td  align='center'>$tgl_ind</td>";
			echo "<td width='375' >$b[ket]</td>";
			echo "<td width='2' align='center'>$b[keluar]</td>";
			echo "<td width='2' align='center'>$b[masuk]</td>";
			echo "<td width='2' align='center'>$b[saldo]</td>";
			echo "</tr>";
			$no++;
		}
	}
		$i=mysql_query("SELECT sum(masuk) as masuk FROM _lap_iuran WHERE tgl BETWEEN '$tanggalawal' AND '$tanggalakhir' ");
		$j=mysql_fetch_array($i);
		$masuk = $j['masuk'];
		$k=mysql_query("SELECT sum(keluar) as keluar FROM _lap_iuran WHERE tgl BETWEEN '$tanggalawal' AND '$tanggalakhir' ");
		$l=mysql_fetch_array($k);	
		$keluar = $l['keluar'];		
	?>
	<tr style="color:white;background-color: grey;">
	<td colspan='3'>Total</td>
	<td align="center">Rp. <?php echo $keluar;?></td>
	<td align="center">Rp. <?php echo $masuk;?></td>
	<td align="center">Rp. <?php echo $masuk-$keluar; ?></td>
	</tr>
</table>
</page>