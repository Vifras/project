<?php
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
//$idr = $_GET['idp'];
//$pi = mysql_query("SELECT * FROM keluarga WHERE no_kk = '$idr' ");
//$idt = mysql_fetch_array($pi);
}
?>
<style type="text/css">
	#table table{
		/*border:1px solid black;*/
		/*text-align: center;*/
	}
	#table td {
		border-left:1px solid black;
		border-right:1px solid black;
	}
	/*#table tr:nth-child(even) {background-color: #f2f2f2}*/
	#table th{background-color: #000;color: white;padding:7px;}
	/*#table tr:hover {background-color: #f5f5f5}*/
</style>
<form method="POST" style="" action="index_petugas.php?page=_iuran">
	<?php
		if(isset($_POST['txtkk'])){
			$katakunci = $_POST['txtkk'];
		}else{
			$katakunci = "";
		}

	?>
<h3 align="center">Transaksi Iuran Wajib Warga  Belum Lunas</h3>
<hr/>
<table style="margin-top:-5px;padding: 3px;" cellpadding="1" cellspacing="1" >
<tr>
	<td>
		<label>Pencarian Kepala Keluarga</label><td>:</td>
	</td>
	<td>
		&nbsp;<input type="text" name="txtkk" id="cek" autocomplete="off"  placeholder="Masukkan No. KK...." value="<?php echo $katakunci; ?>" onclick="this.select();"onkeyup="javascript:
						if(isNaN(this.value)){
							this.value='0'; this.select();
							document.getElementById('label_error').innerHTML='Maaf, harus angka !'; document.getElementById('label_error').style.display='inline-block';
							document.getElementById('tombol').disabled=true;
						}else{
							document.getElementById('label_error').style.display='none';
							document.getElementById('tombol').disabled=false;
								if((this.value).length >= 17){
								document.getElementById('cekno').innerHTML='&nbsp;No. KK Sip';
								document.getElementById('cekno').style.color='green';
								document.getElementById('submit').disabled=false;
							}else{
								document.getElementById('cekno').innerHTML='&nbsp;No KK minimal 16 Angka !';
								document.getElementById('cekno').style.color='red';
								document.getElementById('submit').disabled=true;
							}
						}"
						onkeyup="javascript: "/>
						&nbsp;
	</td>
	<td>
		&nbsp;&nbsp;<input type="submit" id="tombol" value="Cari"/>
		<input type="reset" value="Hapus">&nbsp;&nbsp;</td><td><div align="center" id="label_error" style="display:none;color:red;font-style:italic;"></div><div id="cekno" style="display:inline;font-style:italic;"></div>
	</td>
</tr>
</form>
<tr>
<?php
$qry = mysql_query("SELECT * FROM keluarga");
	$row = mysql_num_rows($qry);
	$a = mysql_query("SELECT * FROM keluarga WHERE no_kk LIKE '%$katakunci%' ");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<td align='center' colspan='4'  style='color:red;font-style:italic;'><b>&raquo; Belum ada data,  Coba cari di halaman Keluarga ! &laquo;</b></td></tr>";
	}else{
		$b = mysql_fetch_array($a);	}
	?>
		<tr><td><label>No. KK</label></td><td>:</td>
		<td colspan="2">&nbsp;<input type="text" name="nokk" style="border:none;width:250px;"" autocomplete="off" readonly value="<?php if($_POST['txtkk'] == '') echo ""; else echo str_replace($katakunci,$katakunci,$b['no_kk'])?>"/></td></tr>
		<tr><td><label>Nama</label></td><td>:</td>
		<td colspan="2">&nbsp;<input type="text" name="kepkel" style="border:none;width:250px;" autocomplete="off" readonly value="<?php if($_POST['txtkk'] == '') echo ""; else echo str_replace($katakunci,$katakunci,$b['kepkel'])?>"/></td></tr>
		<tr><td><label>Alamat</label></td><td>:</td>
		<td colspan="2">&nbsp;
		<input type="text" name="alamat" style="border:none;width:250px;" autocomplete="off" readonly value="<?php if($_POST['txtkk'] == '') echo ""; else echo str_replace($katakunci,$katakunci,$b['alamat'])?>"/>
		<!-- <textarea name="alamat" readonly style="border:none;resize:none;" cols="30" autocomplete="off"><?php //if($_POST['txtkep'] == '') echo ""; else echo str_replace($katakunci,$katakunci,$b['alamat'])?></textarea> -->
		</td></tr>

</table>
<table width="100%" id="table" style="margin-top: -5px;">
	<tr>
		<th>No.</th>
		<th>Bulan</th>
		<th>Tanggal Bayar</th>
		<th>Iuran Wajib</th>
		<th>Petugas Entry</th>
		<th>Petugas Tagih</th>
		<th>Status Lunas</th>
	</tr>
	<form method="POST" action="index_petugas.php?page=_iuran_proses&aksi=tambah">
	<input type="hidden" name="idx" value="<?php echo $b['no_kk']; ?>">
	<?php
	$pet=mysql_query("SELECT nama FROM bendahara WHERE jenis = 'Petugas Entry' ");
	$fat=mysql_fetch_array($pet);
	$pe=mysql_query("SELECT nama FROM bendahara WHERE jenis = 'Petugas Tagih' ");
	$fa=mysql_fetch_array($pe);
	$jum=mysql_query("SELECT * FROM jenis_iuran WHERE jenis_iuran = 'wajib' ");
	$to=mysql_fetch_array($jum);
	for($i=0; $i<count($bulan); $i++){
	//$id = $_GET['id'];
	$a = mysql_query("SELECT no_kk, id_iuran, bulan, tahun, tanggal, petugas_entry, petugas_tagih, bayar, status FROM _iuran WHERE no_kk = '$katakunci' AND bulan = '".bulan($i)."' AND tahun = '".date("Y")."' ");
	$b = mysql_fetch_array($a);
	$date = report_date($b['tanggal']);
		echo "<tr>";
		echo "<td align='center'>".($i+1).".</td>";
		echo "<td align='center'>$bulan[$i] / $tahun</td>";
		echo "<td align=''><input type='hidden'  name='ids$i' id='ids$i' value='$b[id_iuran]' /><input style='border:none; text-align:center;' type='text' name='txttanggal$i' value='$date' readonly /></td>";
		//echo "<td><input type='text' value='Rp. 15000,-' name='txtiuranwajib$i' readonly /></td>";
		echo "<td align='center'>Rp. <input type='hidden' name='jumlah$i' id='jumlah$i' value='$to[jumlah]' readonly/>
			<input type='text' style='border:none;' id='bayar$i' name='bayar$i' value='$b[bayar]' readonly/>
			</td>";

		echo "<td align='center'>
		<input type='hidden' id='_entry$i' value='Bpk. $fat[nama]'>
		<input style='border:none;' type='text' name='entry$i' id='entry$i' value='$b[petugas_entry]' readonly/></td>";

		echo "<td align='center'>
		<input type='hidden' id='_tagih$i' value='Bpk. $fa[nama]'>
		<input style='border:none;' type='text' name='tagih$i' id='tagih$i' value='$b[petugas_tagih]' readonly/>
		</td>";
		
		echo "<td align='center'>
		<input type='hidden' value='0' id='angka$i' />
		<input type='checkbox' name='lunas$i' value='L' onClick=\"javascript: 
		if(this.checked==true){ 
			document.getElementById('entry$i').value=document.getElementById('_entry$i').value; 
			document.getElementById('tagih$i').value=document.getElementById('_tagih$i').value;
			document.getElementById('bayar$i').value=document.getElementById('jumlah$i').value; 
			document.getElementById('angka$i').value=document.getElementById('jumlah$i').value;
		} else {
			document.getElementById('entry$i').value=''; 
			document.getElementById('tagih$i').value='';
			document.getElementById('bayar$i').value=''; 
			document.getElementById('angka$i').value='0';
		}
		var total=0; 
		for(i=0; i<12; i++){ 
			if(document.getElementById('angka'+i).value != '0'){
				total = total + parseInt(document.getElementById('angka'+i).value); 
			}
		} 
		document.getElementById('txttotal').value=total; \""; if($b['status']=='L') echo "checked /></td>";
		echo "</tr>";

	}		
	?>
	<tr><td colspan='6' align="center" style="background-color:black;color:white;border-top: 1px solid black;border-bottom:1px solid black;">Total Bayar</td>
	<td style="border-top: 1px solid black;border-bottom:1px solid black;"><input type="text" style="border:none;text-align: center;" readonly name="txttotal" id="txttotal" value="<?php echo $b['jumlah']; ?>" /></td>
	</tr>
</table>
<input type="submit" style="float:right; width:185px;" id="submit" value="Bayar" />
</form>