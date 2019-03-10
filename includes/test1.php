<?php
include "admin/includes/koneksi.php";
$bulan = array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agt", "Sep", "Okt", "Nov", "Des");
$tahun = date('Y');
?>
<style type="text/css">
	td{
		text-align: center;
	}
	table{
		border-collapse: collapse;
	}
</style>
<form method="POST" style="" action="index.php?page=test1">
	<?php
		if(isset($_POST['txtbln'])){
			$katakunci = $_POST['txtbln'];
		}else{
			$katakunci = "";
		}
	?>
<h3 align="center">Daftar Iuran Wajib Warga Lunas</h3>
<hr/>
<table width="100%">
<tr>
<td>
	<label>Bulan/Thn </label>
</td>
<td><input type="text" name="txtkep" autocomplete="off" value="<?php echo $katakunci; ?>" onclick="this.select();" /></td>
</td><td><input type="submit" value="CARI"/></td>
</tr>
</table>
<table width="100%" border="1">
	<tr>
		<th>No.</th>
		<th>Nama</th>
		<th>Bulan</th>
		<th>Tanggal Bayar</th>
		<th>Iuran Wajib</th>
		<th>Petugas Entry</th>
		<th>Petugas Tagih</th>
		<th>Status</th>
	</tr>
	<?php
	// for($i=0; $i<count($bulan); $i++){
		// echo "<tr>";
		/*/echo "<td>".($i+1).".</td>";
		echo "<td>sya</td>";
		echo "<td>$bulan[$i] / $tahun</td>";
		echo "<td><input style='border:none;' type='text' name='txttanggal$i' /></td>";
		//echo "<td><input type='text' value='Rp. 15000,-' name='txtiuranwajib$i' readonly /></td>";
		echo "<td>Rp. 15.000,-</td>";
		echo "<td>sya</td>";
		echo "<td>sya</td>";
		echo "<td>Lunas</td>";*/
		// echo "</tr>";
	// }

	$jumlah = mysql_query("SELECT * FROM _iuran");
	$total = mysql_num_rows($jumlah);
	$data = 20;
	$hal = ceil($total/$data);

	if(isset($_GET['start'])){
		$start = $_GET['start'];
	}else{
		$start = 0;
	}
	
	if(isset($_POST['txtbln'])){
		$katakunci = $_POST['txtbln'];
	}else{
		$katakunci = "";
	}
		$a = mysql_query("SELECT A.id_iuran, A.bulan, A.tahun, A.tanggal, A.petugas_entry, A.petugas_tagih, A.bayar, A.status, B.kepkel FROM _iuran AS A INNER JOIN keluarga AS B ON (A.no_kk = B.no_kk)");
		$jumlah = mysql_num_rows($a);
		if($jumlah == 0){
			echo "<tr><td colspan='8' align='center'><b>Belum ada data</b></td></tr>";
		}else{
			$no=$start+1;
			while($b = mysql_fetch_array($a)){
				$jumlah = mysql_num_rows($a);
				$date = report_date($b['tanggal']);
				echo "<tr>";
				echo "<td>$no.</td>";
				echo "<td>$b[kepkel]</td>";
				echo "<td>$b[bulan]</td>";
				echo "<td>$date</td>";
				echo "<td>
				<input type='hidden' id='bayar' name='bayar' value='$b[bayar]' />
				<input type='hidden' id='jumlah' value='$jumlah' />
				$b[bayar]</td>";
				echo "<td>$b[petugas_entry]</td>";
				echo "<td>$b[petugas_tagih]</td>";
				echo "<td>$b[status]</td>";
				echo "</tr>";
				$no++;
			}	
		}
	?>
	<tr><td colspan='4'>Total Bayar</td>
	<td><input type="text" readonly name="txttotal" autocomplete="off"
	onmouseenter="javascript:
	document.getElementById('txttotal').value = 
	document.getElementById('bayar').value*parseInt(document.getElementById('jumlah').value);"
	 id="txttotal" /></td>
	<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
</table>