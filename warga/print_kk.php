<?php
session_start();
include "../admin/includes/koneksi.php";
$s = mysql_query("SELECT A.no_kk, B.jenis_keluarga, A.kepkel, A.alamat, A.rt, A.rw, A.kelurahan, A.kecamatan, A.kota, A.kode_pos, A.propinsi FROM keluarga AS A INNER JOIN jenis_keluarga AS B ON (A.id_jenis_keluarga = B.id_jenis_keluarga) WHERE A.no_kk = '".$_SESSION['nokk']."' ");
$d = mysql_fetch_array($s);
?>
<style type="text/css">
	.table1{
		margin:auto;
		width: 100%;
		font-size: 14px;
	}
	.table1 td{
		width:30%;
		height:3%;
		padding: 3px;
	}
	.table {
		margin:auto;
		width: 100%;
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
		width:11%;
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
<h1 style="margin-top:-5px;" align="center" >Kartu Keluarga</h1>
<h3 align="center" style="margin-top:-5px;">No. <?php echo $d['no_kk'] ?></h3>
<br/>
<h3 align="right" style="margin-top:-5px;">Jenis Keluarga : <?php echo $d['jenis_keluarga'] ?></h3>
<hr style="margin-top:-5px;">
<br/>
<br/>
<table class="table1">
	<?php
	$a = mysql_query("SELECT no_kk, kepkel, alamat, rt, rw, kelurahan, kecamatan, kota, kode_pos, propinsi FROM keluarga WHERE no_kk = '".$_SESSION['nokk']."'  ORDER BY no_kk ASC "
		);
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='14' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td>Nama Kepala Keluarga</td>";
			echo "<td>$b[kepkel]</td>";
			echo "<td>Kecamatan</td>";
			echo "<td>$b[kecamatan]</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td>Alamat</td>";
			echo "<td>$b[alamat]</td>";
			echo "<td>Kota</td>";
			echo "<td>$b[kota]</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td>RT/RW</td>";
			echo "<td>$b[rt] / $b[rw]</td> ";
			echo "<td>Kode Pos</td>";
			echo "<td>$b[kode_pos]</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td>Kelurahan</td>";
			echo "<td>$b[kelurahan]</td>";
			echo "<td>Propinsi</td>";
			echo "<td>$b[propinsi]</td>";
			echo "</tr>";
		}
	}		
	?>
</table>
<br/>
<br/>
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
	$a = mysql_query("SELECT A.nik,A.nama,A.gender,A.tempat_lahir,A.tanggal_lahir,B.agama,C.pendidikan,D.pekerjaan FROM penduduk As A INNER JOIN agama As B INNER JOIN pendidikan As C INNER JOIN pekerjaan As D ON (A.id_agama = B.id_agama) AND (A.id_pendidikan = C.id_pendidikan) AND (A.id_pekerjaan = D.id_pekerjaan) WHERE no_kk = '".$_SESSION['nokk']."' ORDER BY A.nik ASC "
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
			echo "<td align='center'>$b[nama]</td>";
			echo "<td align='center'>$b[nik]</td>";
			echo "<td align='center'>$b[gender]</td>";
			echo "<td align='center'>$b[tempat_lahir]</td>";
			echo "<td align='center'>$tgl_ind</td>";
			echo "<td align='center'>$b[agama]</td>";
			echo "<td align='center'>$b[pendidikan]</td>";
			echo "<td align='center'>$b[pekerjaan]</td>";
			echo "</tr>";
			$no++;
		}
	}		
	?>
	<tr class="table-header">
		<th colspan="2" width="">Status Perkawinan</th>
		<th colspan="2" width="">Hubungan Keluarga</th>
		<th width="">Kewarnegaraan</th>
		<th width="">No.Paspor</th>
		<th width="">No.KITAS/KITAP</th>
		<th width="">Ayah</th>
		<th width="">Ibu</th>
	</tr>
	<?php
	$a = mysql_query("SELECT  A.nik, E.status, F.hubungan, A.kewar, A.no_paspor, A.no_kitaskitap, A.ayah, A.ibu FROM penduduk As A INNER JOIN status As E INNER JOIN hubungan As F ON (A.id_status = E.id_status) AND (A.id_hubungan = F.id_hubungan) WHERE no_kk= '".$_SESSION['nokk']."' ORDER BY A.nik ASC "
		);
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='9' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td colspan='2' align='center'>$b[status]</td>";
			echo "<td colspan='2' align='center'>$b[hubungan]</td>";
			echo "<td align='center'>$b[kewar]</td>";
			echo "<td align='center'>$b[no_paspor]</td>";
			echo "<td align='center'>$b[no_kitaskitap]</td>";
			echo "<td align='center'>$b[ayah]</td>";
			echo "<td align='center'>$b[ibu]</td>";
			echo "</tr>";
		}
	}		
	?>
</table>
</page>