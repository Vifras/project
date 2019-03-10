<?php
include "includes/koneksi.php";
$no_kk = $_GET['id'];
$a = mysql_query("SELECT A.no_kk, B.jenis_keluarga, A.kepkel, A.alamat, A.rt, A.rw, A.kelurahan, A.kecamatan, A.kota, A.kode_pos, A.propinsi FROM keluarga AS A INNER JOIN jenis_keluarga AS B ON (A.id_jenis_keluarga = B.id_jenis_keluarga) WHERE A.no_kk = '$no_kk' ");
$result = mysql_fetch_array($a);
$nik = $_GET['id'];
$c = mysql_query("SELECT * FROM penduduk WHERE nik = '$nik'");
?>
<div id="container1">
<style type="text/css">
tr:nth-child(even) {background-color: #FFF}
</style>
<h3 style="margin-top:-5px;" align="center" >Kartu Keluarga</h3>
<h4>
<center>No. <?php echo $result['no_kk'] ?></center>
<right>Jenis Keluarga : <?php echo $result['jenis_keluarga'] ?></right> </h4>
<hr>
<table  class="table">
	<!--<tr class="table-header">
		<th width="">KepKel</th>
		<th width="">Alamat</th>
		<th width="">RT</th>
		<th width="">RW</th>
		<th width="">Kelurahan</th>
		<th width="">Kecamatan</th>
		<th width="">Kota</th>
		<th width="">Kode Pos</th>
		<th width="">Provinsi</th>
		<th colspan="3" width="">Aksi</th>
	</tr>-->
	<?php
	//Langkah 1 : Tentukan /cari banyak total data
	$jumlah = mysql_query("SELECT * FROM keluarga WHERE no_kk = $no_kk");
	$total = mysql_num_rows($jumlah);
	
	//Langkah 2 : Tentukan Banyaknya data perhalaman yang diinginkan
	$data = 5;
	
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
	$a = mysql_query("SELECT no_kk, kepkel, alamat, rt, rw, kelurahan, kecamatan, kota, kode_pos, propinsi FROM keluarga WHERE/*no_kk LIKE '%$katakunci%' OR kepkel LIKE '%$katakunci%' OR alamat LIKE '%$katakunci%' OR rt LIKE '%$katakunci%' OR rw LIKE '%$katakunci%' OR kelurahan LIKE '%$katakunci%' OR kecamatan LIKE '%$katakunci%' OR kota LIKE '%$katakunci%' OR kode_pos LIKE '%$katakunci%' OR propinsi LIKE '%$katakunci%'*/ no_kk = '$no_kk'  ORDER BY no_kk ASC LIMIT $start, $data"
		);
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='14' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td width='200px'>&nbsp;Nama Kepala Keluarga</td>";
			echo "<td width='250px align=''>".str_replace($katakunci, "<b style='color:yellow'><i>".$katakunci."</i></b>",$b['kepkel'])."</td>";
			echo "<td>Kecamatan</td>";
			echo "<td align=''>".str_replace($katakunci, "<b style='color:green'><i>".$katakunci."</i></b>",$b['kecamatan'])."</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td>&nbsp;Alamat</td>";
			echo "<td align=''>".str_replace($katakunci, "<b style='color:green'><i>".$katakunci."</i></b>",$b['alamat'])."</td>";
			echo "<td>Kota</td>";
			echo "<td align=''>".str_replace($katakunci, "<b style='color:blue'><i>".$katakunci."</i></b>",$b['kota'])."</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td>&nbsp;RT/RW</td>";
			echo "<td align=''>".str_replace($katakunci, "<b style='color:blue'><i>".$katakunci."</i></b>",$b['rt'])." / ";
			echo "".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>",$b['rw'])."</td>";
			echo "<td>Kode Pos</td>";
			echo "<td align=''>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>",$b['kode_pos'])."</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td>&nbsp;Kelurahan</td>";
			echo "<td align=''>".str_replace($katakunci, "<b style='color:yellow'><i>".$katakunci."</i></b>",$b['kelurahan'])."</td>";
			echo "<td>Propinsi</td>";
			echo "<td align=''>".str_replace($katakunci, "<b style='color:yellow'><i>".$katakunci."</i></b>",$b['propinsi'])."</td>";
			echo "</tr>";

			echo "<td>&nbsp;Aksi</td>";
			echo "<td align='center'><img src='images/plus.gif' title='Tambah Anggota Keluarga' border='0' onclick=\"javascript:window.location.href='index.php?page=penduduk_tambah&id=$b[no_kk]';\"></td>";
			echo "<td align='center'><img src='images/b_edit.png' title='Edit' border='0' onclick=\"javascript:window.location.href='index.php?page=keluarga_edit&id=$b[no_kk]';\"></td>";
			echo "<td align='center'> <img src='images/trash.png' title='Hapus' border='0' onclick=\"javascript: if(confirm('Data ingin dihapus ?')==true){window.location.href='index.php?page=keluarga_proses&id=$b[no_kk]&aksi=hapus';}\"/></td>";
			echo "</tr>";
		}
	}		
	?>
</table>
<!--<form method="POST" style="display:inline-block; " action="index.php?page=lihat_kk">
	<?php
	if(isset($_POST['txtcari'])){
		$katakunci = $_POST['txtcari'];
	}else{
		$katakunci = "";
	}
	?>
	<input type="text" name="txtcari" placeholder="Searching Data...." autocomplete="off" value="<?php// echo $katakunci; ?>" onclick="this.select();"/>
	<input type="submit" style="color: #5262BA; background: url(images/b_search.png)no-repeat right; margin-top:10px;background-color: #ABCDEF; " value=""/>
</form>-->
<table style="margin-top:px" class="table">
	<tr class="table-header">
		<th width="">No.</th>
		<th width="">Nama</th>
		<th width="">NIK</th>
		<th width="">Jenis Kelamin</th>
		<th width="">Tempat Lahir</th>
		<th width="">Tanggal Lahir</th>
		<th width="">Agama</th>
		<th width="">Pendidikan</th>
		<th width="">Pekerjaan</th>
	</tr>
	<?php
	//Langkah 1 : Tentukan /cari banyak total data
	$jumlah = mysql_query("SELECT * FROM penduduk WHERE no_kk = '$no_kk'");
	$total = mysql_num_rows($jumlah);
	
	//Langkah 2 : Tentukan Banyaknya data perhalaman yang diinginkan
	$data = 5;
	
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
	$a = mysql_query("SELECT A.nik,A.nama,A.gender,A.tempat_lahir,A.tanggal_lahir,B.agama,C.pendidikan,D.pekerjaan FROM penduduk As A INNER JOIN agama As B INNER JOIN pendidikan As C INNER JOIN pekerjaan As D ON (A.id_agama = B.id_agama) AND (A.id_pendidikan = C.id_pendidikan) AND (A.id_pekerjaan = D.id_pekerjaan) WHERE /* A.nik LIKE '%$katakunci%' OR A.nama LIKE '%$katakunci%' OR A.gender LIKE '%$katakunci%' OR A.tempat_lahir LIKE '%$katakunci%' OR A.tanggal_lahir LIKE '%$katakunci%' OR B.agama LIKE '%$katakunci%' OR C.pendidikan LIKE '%$katakunci%' OR D.pekerjaan LIKE '%$katakunci%' AND */ no_kk = '$no_kk' ORDER BY A.nik ASC LIMIT $start, $data"
		);
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='9' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
		$data_date=$b['tanggal_lahir'];
	    $tgl_ind=substr($data_date,8,2)."-".substr($data_date,5,2)."-".substr($data_date,0,4);
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>",$b['nama'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:yellow'><i>".$katakunci."</i></b>",$b['nik'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:yellow'><i>".$katakunci."</i></b>",$b['gender'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:green'><i>".$katakunci."</i></b>",$b['tempat_lahir'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:blue'><i>".$katakunci."</i></b>", $tgl_ind)."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>",$b['agama'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:yellow'><i>".$katakunci."</i></b>",$b['pendidikan'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:green'><i>".$katakunci."</i></b>",$b['pekerjaan'])."</td>";
			echo "</tr>";
			$no++;
		}
	}		
	?>
</table>
<?php/* 
//Langkah 5 = Buat link pagingnya
echo "Total data yang ditampilkan = $total Data";
//Link untuk Prev
echo "<center>";
if($start !=0){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=penduduk&start=".($start-$data)."'>Prev</a>";
}

//Link untuk masing-masing halamannya
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index.php?page=penduduk&start=$x'>".($i+1)."</a>]";
	}
}

//Link untuk Next
if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=penduduk&start=".($start+$data)."'>Next</a>";
}*/

?>
<table class="table">
	<tr class="table-header">
		<th width="">Status Perkawinan</th>
		<th width="">Hubungan Keluarga</th>
		<th width="">Kewarnegaraan</th>
		<th width="">No.Paspor</th>
		<th width="">No.KITAS/KITAP</th>
		<th width="">Ayah</th>
		<th width="">Ibu</th>
		<th width="" colspan="2">Aksi</th>
	</tr>
	<?php
	//Langkah 1 : Tentukan /cari banyak total data
	/*$jumlah = mysql_query("SELECT * FROM penduduk");
	$total = mysql_num_rows($jumlah);
	
	//Langkah 2 : Tentukan Banyaknya data perhalaman yang diinginkan
	$data = 5;
	
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
	}*/
	$a = mysql_query("SELECT  A.nik, E.status, F.hubungan, A.kewar, A.no_paspor, A.no_kitaskitap, A.ayah, A.ibu FROM penduduk As A INNER JOIN status As E INNER JOIN hubungan As F ON (A.id_status = E.id_status) AND (A.id_hubungan = F.id_hubungan) WHERE /* E.status LIKE '%$katakunci%' OR F.hubungan LIKE '%$katakunci%' OR A.kewar LIKE '%$katakunci%' OR A.no_paspor LIKE '%$katakunci%' OR A.no_kitaskitap LIKE '%$katakunci%' OR A.ayah LIKE '%$katakunci%' OR A.ibu LIKE '%$katakunci%' AND */ no_kk='$no_kk' ORDER BY A.nik ASC LIMIT $start, $data"
		);
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='8' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:blue'><i>".$katakunci."</i></b>",$b['status'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>",$b['hubungan'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:yellow'><i>".$katakunci."</i></b>",$b['kewar'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:green'><i>".$katakunci."</i></b>",$b['no_paspor'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:blue'><i>".$katakunci."</i></b>",$b['no_kitaskitap'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>",$b['ayah'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:yellow'><i>".$katakunci."</i></b>",$b['ibu'])."</td>";
			echo "<td align='center'><img src='images/b_edit.png' title='Edit' border='0' onclick=\"javascript:window.location.href='index.php?page=penduduk_edit&id=$b[nik]&no_kk=$no_kk';\"></td>";
			echo "<td align='center'> <img src='images/trash.png' title='Hapus' border='0' onclick=\"javascript: if(confirm('Data ingin dihapus ?')==true){window.location.href='index.php?page=penduduk_proses&id=$b[nik]&no_kk=$no_kk&aksi=hapus';}\"/></td>";
			echo "</tr>";
			$no++;
		}
	}		
	?>
</table>
<?php 
//Langkah 5 = Buat link pagingnya
echo "Total Anggota Keluarga = $total Data";
echo "&nbsp; | <a href='index.php?page=keluarga'>Lihat Kepala Keluarga</a>";
//Link untuk Prev
echo "<center>";
if($start !=0){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=lihat_kk&start=".($start-$data)."'>Prev</a>";
}

//Link untuk masing-masing halamannya
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index.php?page=lihat_kk&start=$x'>".($i+1)."</a>]";
	}
}

//Link untuk Next
if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=lihat_kk&start=".($start+$data)."'>Next</a>";
}
?>
</div>