<?php
include "includes/koneksi.php";
$bulan = array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agt", "Sep", "Okt", "Nov", "Des");
$tahun = date('Y');
?>
<style type="text/css">
	td{
		/*text-align: center;*/
	}
	table{
		border-collapse: collapse;
	}
	tr:nth-child(even) {background-color: #f2f2f2}
</style>
<div id="container1">
<h3 align="center">Daftar Iuran Wajib Warga Lunas Tahun <?php echo date("Y"); ?></h3>
<hr/>
<form action="index.php?page=_iuran_lunas" method="POST">
<?php
if(isset($_POST['cari'])){
		$tanggalawal = $_POST['txttanggalawal'];
		$tanggalakhir= $_POST['txttanggalakhir'];
	}else{
		$tanggalawal = "";
		$tanggalakhir= "";
	}
?>
<table>
	<tr>
		<td>Dari Tanggal : </td>
		<td><input type="text" name="txttanggalawal" id="txttanggalawal" size="10" value="<?php echo $tanggalawal; ?>" onclick="this.select();"  />&nbsp;<img src="includes/popup-calendar/calendar.gif" width="24" height="12" onclick="displayCalendar(document.getElementById('txttanggalawal'),'yyyy/mm/dd',this)" style="cursor:pointer"></td>
		<td>&nbsp; | &nbsp;</td>
		<td>Sampai Tanggal : </td>
		<td><input type="text" name="txttanggalakhir" id="txttanggalakhir" size="10" value="<?php echo $tanggalakhir; ?>" onclick="this.select();" />&nbsp;<img src="includes/popup-calendar/calendar.gif" width="24" height="12" onclick="displayCalendar(document.getElementById('txttanggalakhir'),'yyyy/mm/dd',this)" style="cursor:pointer"></td>
		<td>&nbsp;<input type="submit" value="Cari" name="cari"></td>
		<td>&nbsp;<input type="reset" value="Batal"></td>
	</tr>
</table>
</form>
<table width="100%" class='table' border="1">
	<tr class="table-header">
		<th>No.</th>
		<th>Nama</th>
		<th>Bulan / Tahun</th>
		<th>Tanggal Bayar</th>
		<th>Iuran Wajib</th>
		<th>Petugas Entry</th>
		<th>Petugas Tagih</th>
		<th>Status</th>
	</tr>
	<?php
	$jumlah = mysql_query("SELECT * FROM _iuran");
	$total = mysql_num_rows($jumlah);
	$data = 20;
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
			$filter = "AND A.tanggal BETWEEN '$tanggalawal' AND '$tanggalakhir LIMIT $start, $data '";
		}
		
	//echo "SELECT A.id_iuran, A.bulan, A.tahun, A.tanggal, A.petugas_entry, A.petugas_tagih, A.bayar, A.status, B.kepkel FROM _iuran AS A INNER JOIN keluarga AS B ON (A.no_kk = B.no_kk) WHERE A.tanggal BETWEEN '$tanggalawal' AND '$tanggalakhir' ";
		//echo "SELECT A.id_iuran, A.bulan, A.tahun, A.tanggal, A.petugas_entry, A.petugas_tagih, A.bayar, A.status, B.kepkel FROM _iuran AS A INNER JOIN keluarga AS B ON (A.no_kk = B.no_kk) WHERE  true ".$filter;
		$a = mysql_query("SELECT A.id_iuran, A.bulan, A.tahun, A.tanggal, A.petugas_entry, A.petugas_tagih, A.bayar, A.status, B.kepkel FROM _iuran AS A INNER JOIN keluarga AS B ON (A.no_kk = B.no_kk) WHERE  true ".$filter."LIMIT $start, $data ");
		$jumlah = mysql_num_rows($a);
		if($jumlah == 0){
			echo "<tr><td colspan='8' align='center'><b>Belum ada data</b></td></tr>";
		}else{
			$no=$start+1;
			while($b = mysql_fetch_array($a)){
				//$jumlah = mysql_num_rows($a);
				//$date = report_date($b['tanggal']);
		$data_date=$b['tanggal'];
	    $tgl_ind=substr($data_date,8,2)."-".substr($data_date,5,2)."-".substr($data_date,0,4);
				echo "<tr>";
				echo "<td>$no.</td>";
				echo "<td>$b[kepkel]</td>";
				echo "<td align='center'>$b[bulan] / $b[tahun]</td>";
				echo "<td align='center'>$tgl_ind</td>";
				echo "<td align='center'>
				<input type='hidden' id='bayar' name='bayar' value='$b[bayar]' />
				<input type='hidden' id='jumlah' value='$jumlah' />Rp.
				$b[bayar]</td>";
				echo "<td>$b[petugas_entry]</td>";
				echo "<td>$b[petugas_tagih]</td>";
				echo "<td align='center'>$b[status]</td>";
				echo "</tr>";
				$no++;
			}	
		}
		$i=mysql_query("SELECT sum(A.bayar) as bayar FROM _iuran AS A WHERE true ".$filter) or die (mysql_error());
		$j=mysql_fetch_array($i);
	?>
	<tr style="background-color: grey;color:white;text-align: center;"><td  colspan='4'>Total</td>
	<td align="center">Rp. <?php echo $j[bayar];?></td>
	<td colspan="3" style="background-color: grey;">&nbsp;</td></tr>
</table>
<?php
echo "Menampilkan = $total Data ";
echo "<center>";
if($start !=0){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=_iuran_lunas&start=".($start-$data)."'>&laquo;</a>";
}
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index.php?page=_iuran_lunas&start=$x'>".($i+1)."</a>]";
	}
}
if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=_iuran_lunas&start=".($start+$data)."'>&raquo;</a>";
}
?>
</div>
<!-- onmouseenter="javascript: 
	document.getElementById('txttotal').value = 
	document.getElementById('bayar').value*parseInt(document.getElementById('jumlah').value);" -->