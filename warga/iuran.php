<?php
session_start();
$_SESSION['nokk'];
?>
<style type="text/css">
	#table{
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
	}
	#table tr:nth-child(even) {background-color: #f2f2f2}
	#table tr:hover {background-color: #f5f5f5}
	h1,h2{
		text-align: center;
		margin-top: -5px;
		margin-bottom: -5px;
	}
	hr{
		border-style: dotted;
	}
</style>
<h1>Kartu Iuran Wajib Warga</h1>
<h2>Tahun <?php echo date('Y');?></h2>
<hr/>
<div id="table">
<table style="margin-top:px" width="auto">
	<tr >
		<th>No.</th>
		<th>Bulan</th>
		<th>Tanggal Bayar</th>
		<th>Iuran Wajib</th>
		<th>Petugas Entry</th>
		<th>Petugas Tagih</th>
	</tr>
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
}
	$no_kk = $_GET['id'];
	$c = mysql_query("SELECT * FROM keluarga WHERE no_kk = '".$_SESSION['nokk']."' ");
	$result = mysql_fetch_array($c);
	$pet=mysql_query("SELECT nama FROM bendahara WHERE jenis = 'Petugas Entry' ");
	$fat=mysql_fetch_array($pet);
	$pe=mysql_query("SELECT nama FROM bendahara WHERE jenis = 'Petugas Tagih' ");
	$fa=mysql_fetch_array($pe);
	$jum=mysql_query("SELECT * FROM jenis_iuran WHERE jenis_iuran = 'wajib' ");
	$to=mysql_fetch_array($jum);
	for($i=0; $i<count($bulan); $i++){
	//$id = $_GET['id'];
	$a = mysql_query("SELECT no_kk, id_iuran, bulan, tahun, tanggal, petugas_entry, petugas_tagih, bayar, status FROM _iuran WHERE no_kk = '".$_SESSION['nokk']."' AND bulan = '".bulan($i)."' AND tahun = '".date("Y")."' ");
	//echo "SELECT no_kk, id_iuran, bulan, tahun, tanggal, petugas_entry, petugas_tagih, bayar, status FROM _iuran WHERE no_kk = '".$_SESSION['nokk']."' AND bulan = '".bulan($i)."' AND tahun = '".date("Y")."' ";
	$b = mysql_fetch_array($a);
	$date = report_date($b['tanggal']);
		echo "<tr>";
		echo "<td align='center' >".($i+1).".</td>";
		echo "<td align='center' width=75px>$bulan[$i] / $tahun</td>";
		//echo "<td align=''><input type='hidden'  name='ids$i' id='ids$i' value='$b[id_iuran]' /><input style='border:none; text-align:center;' type='text' name='txttanggal$i' value='$date' readonly /></td>";
		echo "<td align='center' width=90px>$date</td>";
		//echo "<td><input type='text' value='Rp. 15000,-' name='txtiuranwajib$i' readonly /></td>";
		//echo "<td align='center'>Rp. <input type='hidden' name='jumlah$i' id='jumlah$i' value='$to[jumlah]' readonly/><input type='text' style='border:none;' id='bayar$i' name='bayar$i' value='$b[bayar]' readonly/></td>";
		echo "<td align='center'>$b[bayar]</td>";
		//echo "<td align='center'>	<input type='hidden' id='_entry$i' value='Bpk. $fat[nama]'>	<input style='border:none;' type='text' name='entry$i' id='entry$i' value='$b[petugas_entry]' readonly/></td>";
		echo "<td align='center'>$b[petugas_entry]</td>";
		//echo "<td align='center'>		<input type='hidden' id='_tagih$i' value='Bpk. $fa[nama]'>		<input style='border:none;' type='text' name='tagih$i' id='tagih$i' value='$b[petugas_tagih]' readonly/></td>";
		echo "<td align='center'>$b[petugas_tagih]</td>";
		// echo "<td align='center'>
		// <input type='hidden' value='0' id='angka$i' />
		// <input type='checkbox' name='lunas$i' value='L' onClick=\"javascript: 
		// if(this.checked==true){ 
		// 	document.getElementById('entry$i').value=document.getElementById('_entry$i').value; 
		// 	document.getElementById('tagih$i').value=document.getElementById('_tagih$i').value;
		// 	document.getElementById('bayar$i').value=document.getElementById('jumlah$i').value; 
		// 	document.getElementById('angka$i').value=document.getElementById('jumlah$i').value;
		// } else {
		// 	document.getElementById('entry$i').value=''; 
		// 	document.getElementById('tagih$i').value='';
		// 	document.getElementById('bayar$i').value=''; 
		// 	document.getElementById('angka$i').value='0';
		// }
		// var total=0; 
		// for(i=0; i<12; i++){ 
		// 	if(document.getElementById('angka'+i).value != '0'){
		// 		total = total + parseInt(document.getElementById('angka'+i).value); 
		// 	}
		// } 
		// document.getElementById('txttotal').value=total; \""; if($b['status']=='L') echo "checked /></td>";
		echo "</tr>";

	}
?>
</table>
</div>