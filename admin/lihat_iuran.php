<?php
include "includes/koneksi.php";
function bulan($x){
	switch($x){
		case '0' : $bln = "01"; break;
		case '1' : $bln = "02"; break;
		case '2' : $bln = "03"; break;
		case '3' : $bln = "04"; break;
		case '4' : $bln = "05"; break;
		case '5' : $bln = "06"; break;
		case '6' : $bln = "07"; break;
		case '7' : $bln = "08"; break;
		case '8' : $bln = "09"; break;
		case '9' : $bln = "10"; break;
		case '10' : $bln = "11"; break;
		case '11' : $bln = "12"; break;
	}
	return $bln;
}
$no_kk = $_GET['id'];
$a = mysql_query("SELECT * FROM keluarga WHERE no_kk = '$no_kk' ");
$result = mysql_fetch_array($a);
?>
<div id="container1">
<style type="text/css">
tr:nth-child(even) {background-color: #f2f2f2}
</style>
<h3 style="margin-top:5px;" align="center">Iuran Wajib Bulanan Tahun <?php echo date('Y');?></h3>
<br>
<table class="table" border="1" style="margin-top:-5px; margin-bottom: 5px;">
	<?php
	//Langkah 1 : Tentukan /cari banyak total data
	$jumlah = mysql_query("SELECT * FROM keluarga WHERE no_kk = $no_kk");
	$total = mysql_num_rows($jumlah);

	$a = mysql_query("SELECT * FROM keluarga WHERE no_kk = '$no_kk' ORDER BY no_kk ASC"
		);
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='3' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td>&nbsp;Nama Kepala Keluarga</td>";
			echo "<td>".str_replace($katakunci, "<b style='color:yellow'><i>".$katakunci."</i></b>",$b['kepkel'])."</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td>&nbsp;Alamat</td>";
			echo "<td align=''>".str_replace($katakunci, "<b style='color:green'><i>".$katakunci."</i></b>",$b['alamat'])."</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td>&nbsp;No. KK</td>";
			echo "<td align=''>".str_replace($katakunci, "<b style='color:green'><i>".$katakunci."</i></b>",$b['no_kk'])."</td>";
			echo "</tr>";
		}
	}		
echo "</table>";
?>
<style type="text/css">
tr:nth-child(even) {background-color: #f2f2f2}
</style>
<form method="POST" action="index.php?page=iuran_proses">
<input type="hidden" name="aksi" value="tambah"/>
<input type="hidden" name="idx" value="<?php echo $result['no_kk'];?>"/>
<table style="margin-top:5px" class="table">
	<tr class="table-header">
		<th width="">No.</th>
		<th width="">Bulan</th>
		<th width="">Tanggal Bayar</th>
		<th width="">Jenis Iuran</th>
		<th width="">Bayar</th>
	</tr>
	<?php
	
	$bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	for($i=0; $i<count($bulan); $i++){
		$a = mysql_query("SELECT A.id_iuran, A.tanggal_bayar, A.id_jenis_iuran, B.jenis_iuran, A.jumlah FROM iuran AS A INNER JOIN jenis_iuran AS B ON (A.id_jenis_iuran = B.id_jenis_iuran) WHERE no_kk = '$no_kk' AND A.bulan = '".bulan($i)."' AND A.tahun = '".date("Y")."' ");
		$b = mysql_fetch_array($a);
		echo "<tr>";
		echo "<td align='center'>".($i+1).".</td>";
		echo "<td align='center'>$bulan[$i]</td>";
		echo "<td align='center'>
		<input type='hidden' name='ids$i' id='ids$i' value='$b[id_iuran]' />
		<input type='text' name='txttanggal$i'  value='$b[tanggal_bayar]' readonly/></td>";
		echo "<td align='center'>
		<span id='span$i'></span>
		<select name='cbjenis$i' onchange=\"javascript: $('#span$i').load('iuran_proses.php?aksi=jumlah&pos=$i&idx='+this.value); \">";
		echo "<option value=''></option>";
				$kat = mysql_query("SELECT * FROM jenis_iuran ");
				while($hasil_kat = mysql_fetch_array($kat)){
		echo "<option value='$hasil_kat[id_jenis_iuran]'";
		if($b['id_jenis_iuran'] == $hasil_kat['id_jenis_iuran']) echo " selected";
		echo ">$hasil_kat[jenis_iuran]</option>";}
		echo "</select>";
		echo "<td align='center'><input type='text' name='txtbayar$i' id='txtbayar$i'  value='$b[jumlah]'/></td>";
		echo "</tr>";
	}
echo "</table>";
echo "<input type='submit' value='Tambah Data Iuran' class='btn-login' /></a>";
echo "<br/><a style='cursor:pointer;' border='0' onclick=\"javascript:window.location.href='index.php?page=iuran_keluarga';\"><img src='images/back.png' title='Kembali ke iuran keluarga' alt='Kembali' width='30' height='30' border='0' /></a>";
?>
</table>
</form>
</div>