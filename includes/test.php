<?php
include "admin/includes/koneksi.php";
$bulan = array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agt", "Sep", "Okt", "Nov", "Des");
$tahun = date('Y');

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
?>
<style type="text/css">
	#table table{
		border:1px solid black;
		text-align: center;
	}
	#table tr:nth-child(even) {background-color: #f2f2f2}
	#table th{background-color: #000;color: white;padding:7px;}
	#table tr:hover {background-color: #f5f5f5}
</style>
<form method="POST" style="" action="test.php">
	<?php
		if(isset($_POST['txtkep'])){
			$katakunci = $_POST['txtkep'];
		}else{
			$katakunci = "";
		}
	?>
<h3 align="center">Daftar Iuran Wajib Warga  Belum Lunas</h3>
<hr/>
<table style="margin-bottom: -10px;padding: 3px;" cellpadding="3" cellspacing="3" >
<tr>
	<td>
		<label>Pencarian Kepala Keluarga</label><td>:</td>
	</td>
	<td>
		&nbsp;<input type="text" name="txtkep" id="cek" autocomplete="off"  placeholder="Nama Lengkap...." value="<?php echo $katakunci; ?>" onclick="this.select();" onkeyup="javascript: if((this.value).length >= 3){
							document.getElementById('label_error').style.display='none';
							document.getElementById('tombol').disabled=false;
						}else{
							document.getElementById('label_error').innerHTML='Nama terlalu pendek'; document.getElementById('label_error').style.display='inline-block';
							document.getElementById('tombol').disabled=true;
						}"/>&nbsp;
						
	</td>
	<td>
		&nbsp;&nbsp;<input type="submit" id="tombol" value="Cari"/>
		<input type="reset" value="Hapus">&nbsp;&nbsp;<div align="center" id="label_error" style="display:none;color:red;font-style:italic;"></div>
	</td>
</tr>

</form>
<tr>
<?php
$qry = mysql_query("SELECT * FROM keluarga");
	$row = mysql_num_rows($qry);
	$a = mysql_query("SELECT * FROM keluarga WHERE kepkel LIKE '%$katakunci%' ");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<td align='center' colspan='4'  style='color:red;font-style:italic;'><b>&raquo; Belum ada data,  Coba cari di halaman Keluarga ! &laquo;</b></td></tr>";
	}else{
		$b = mysql_fetch_array($a);	}
	?>
		<tr><td><label>No. KK</label></td><td>:</td>
		<td colspan="2">&nbsp;<input type="text" name="nokk" style="border:none;width:250px;"" autocomplete="off" readonly value="<?php if($_POST['txtkep'] == '') echo ""; else echo str_replace($katakunci,$katakunci,$b['no_kk'])?>"/></td></tr>
		<tr><td><label>Nama</label></td><td>:</td>
		<td colspan="2">&nbsp;<input type="text" name="kepkel" style="border:none;width:250px;" autocomplete="off" readonly value="<?php if($_POST['txtkep'] == '') echo ""; else echo str_replace($katakunci,$katakunci,$b['kepkel'])?>"/></td></tr>
		<tr><td><label>Alamat</label></td><td>:</td>
		<td colspan="2">&nbsp;<textarea name="alamat" readonly style="border:none;resize:none;" cols="30" autocomplete="off"><?php if($_POST['txtkep'] == '') echo ""; else echo str_replace($katakunci,$katakunci,$b['alamat'])?></textarea></td></tr>

</table>
<br/>
<table width="100%" id="table">
	<tr>
		<th>No.</th>
		<th>Bulan</th>
		<th>Tanggal Bayar</th>
		<th>Iuran Wajib</th>
		<th>Petugas Entry</th>
		<th>Petugas Tagih</th>
		<th>Status Lunas</th>
	</tr>
	<?php
	$pet=mysql_query("SELECT nama FROM bendahara WHERE jenis = 'Petugas Entry' ");
	$fat=mysql_fetch_array($pet);
	$pe=mysql_query("SELECT nama FROM bendahara WHERE jenis = 'Petugas Tagih' ");
	$fa=mysql_fetch_array($pe);
	$jum=mysql_query("SELECT * FROM jenis_iuran WHERE jenis_iuran = 'wajib' ");
	$to=mysql_fetch_array($jum);
	for($i=0; $i<count($bulan); $i++){
	$a = mysql_query("SELECT A.tanggal_bayar, A.id_jenis_iuran, B.jenis_iuran, A.jumlah FROM iuran AS A INNER JOIN jenis_iuran AS B ON (A.id_jenis_iuran = B.id_jenis_iuran) WHERE no_kk = '".$katakunci."' AND A.bulan = '".bulan($i)."' AND A.tahun = '".date("Y")."' ");
	$b = mysql_fetch_array($a);
		echo "<tr>";
		echo "<td>".($i+1)."</td>";
		echo "<td align='center'>$bulan[$i] / $tahun</td>";
		echo "<td align='center'><input style='border:none;' type='text' name='txttanggal$i' /></td>";
		//echo "<td><input type='text' value='Rp. 15000,-' name='txtiuranwajib$i' readonly /></td>";
		echo "<td align='center'>Rp. <input type='text' name='jumlah$i' id='jumlah$i' style='border:none;' value='$to[jumlah]'/></td>";

		echo "<td align='center'>
		<input type='hidden' id='_entry$i' value='Bpk. $fat[nama]'>
		<input style='border:none;' type='text' id='entry$i' autocomplete='off' readonly/></td>";

		echo "<td align='center'>
		<input type='hidden' id='_tagih$i' value='Bpk. $fa[nama]'>
		<input style='border:none;' type='text' id='tagih$i' autocomplete='off' readonly/>
		</td>";
		
		echo "<td align='center'>
		<input type='hidden' value='0' id='angka$i' />
		<input type='checkbox' name='lunas$i' value='' onClick=\"javascript: 
		if(this.checked==true){ 
			document.getElementById('entry$i').value=document.getElementById('_entry$i').value; 
			document.getElementById('tagih$i').value=document.getElementById('_tagih$i').value; 
			document.getElementById('angka$i').value=document.getElementById('jumlah$i').value;
		} else {
			document.getElementById('entry$i').value=''; 
			document.getElementById('tagih$i').value=''; 
			document.getElementById('angka$i').value='0';
		}
		var total=0; 
		for(i=0; i<12; i++){ 
			if(document.getElementById('angka'+i).value != '0'){
				total = total + parseInt(document.getElementById('angka'+i).value); 
			}
		} 
		document.getElementById('txttotal').value=total; \" /></td>";
		echo "</tr>";
	}		
	?>
	<tr><td colspan='6' align="center">Total Bayar</td>
	<td><input type="text" style="border:none;" readonly autocomplete='off' name="txttotal" id="txttotal" /></td>
	</tr>
</table>
<input type="submit" style="float:right; width:185px;" value="SUBMIT" />