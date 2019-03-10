<?php
include "includes/koneksi.php";
$no_kk = $_GET['id'];
$a = mysql_query("SELECT * FROM keluarga WHERE no_kk = '$no_kk' ");
$result = mysql_fetch_array($a);
?>
<div id="container1">
<style type="text/css">
tr:nth-child(even) {background-color: #f2f2f2}
</style>
<h3 style="margin-top:5px;" align="center"><u>Iuran Wajib Bulanan </u></h3>
<br>
<table class="table" style="margin-top:-5px; margin-bottom: 5px;">
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
echo "";
echo "<a href='index_petugas.php?page=iuran_tambah&id=$no_kk' class='btn-login'>";
echo "<input type='button' value='Tambah Data Iuran' class='btn-login' /></a>";
?>
<style type="text/css">
tr:nth-child(even) {background-color: #f2f2f2}
</style>
<table style="margin-top:5px" class="table">
	<tr class="table-header">
		<th width="">No.</th>
		<th width="">Bulan</th>
		<th width="">Tanggal Bayar</th>
		<th width="">Jenis Iuran</th>
		<th colspan="2" width="">Aksi</th>
	</tr>
	<?php
	//Langkah 1 : Tentukan /cari banyak total data
	/*$jumlah = mysql_query("SELECT * FROM iuran WHERE no_kk = '$no_kk'");
	$total = mysql_num_rows($jumlah);
	
	//Langkah 2 : Tentukan Banyaknya data perhalaman yang diinginkan
	$data = 10;
	
	//Langkah 3 : cari banyaknya halaman
	$hal = ceil($total/$data);
	
	//Langkah 4 : merubah query dengan menggunakan batas/limit
	if(isset($_GET['start'])){
		$start = $_GET['start'];
	}else{
		$start = 0;
	}
	
	if(isset($_POST['txtcari'])){
		$katakunci = $_POST['txtcari'];
	}else{
		$katakunci = "";
	}
	$a = mysql_query("SELECT A.id_iuran, A.tanggal_bayar, A.bayar, B.bulan, C.jenis_iuran FROM iuran AS A INNER JOIN bulan AS B INNER JOIN jenis_iuran AS C ON (A.id_bulan = B.id_bulan) AND (A.id_jenis_iuran = C.id_jenis_iuran) WHERE no_kk = '$no_kk' ORDER BY A.tanggal_bayar ASC LIMIT $start, $data"
		);
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='6' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
		$data_date=$b['tanggal_bayar'];
	    $tgl_ind=substr($data_date,8,2)."-".substr($data_date,5,2)."-".substr($data_date,0,4);
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>",$tgl_ind)."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:'blue'><i>".$katakunci."</i></b>",$b['bulan'])."</td>";
			echo "<td align='left'>Rp. ".str_replace($katakunci, "<b style='color:green'><i>".$katakunci."</i></b>",$b['bayar'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:blue'><i>".$katakunci."</i></b>",$b['jenis_iuran'])."</td>";
			echo "<td align='center'><img src='images/b_edit.png' title='Edit' border='0' onclick=\"javascript:window.location.href='index_petugas.php?page=iuran_edit&id=$b[id_iuran]';\"></td>";
			echo "<td align='left'> <img src='images/trash.png' title='Hapus' border='0' onclick=\"javascript: if(confirm('Data ingin dihapus ?')==true){window.location.href='index_petugas.php?page=iuran_proses&id=$b[id_iuran]&no_kk=$no_kk&aksi=hapus';}\"/></td>";
			echo "</tr>";
			$no++;
		}
	}		
	?>
</table>
</table>
<?php 
//Langkah 5 = Buat link pagingnya
echo "Total data = $total Data";
//Link untuk Prev
echo "<center>";
if($start !=0){
	echo "&nbsp;<a style='font-size:17px' href='index_petugas.php?page=iuran&start=".($start-$data)."'>Prev</a>";
}

//Link untuk masing-masing halamannya
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index_petugas.php?page=iuran&start=$x'>".($i+1)."</a>]";
	}
}

//Link untuk Next
if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index_petugas.php?page=iuran&start=".($start+$data)."'>Next</a>";
}
echo "</center>";
echo "<a style='cursor:pointer;' border='0' onclick=\"javascript:window.location.href='index_petugas.php?page=iuran_keluarga';\"><img src='images/back.png' title='Kembali ke iuran keluarga' alt='Kembali' width='30' height='30' border='0' /></a>"*/
?>
</div>