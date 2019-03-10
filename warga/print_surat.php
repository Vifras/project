<?php
include "../admin/includes/koneksi.php";
$a = mysql_query("SELECT A.id, A.alamat, A.kelurahan, A.kecamatan, A.kota, A.kodepos, A.provinsi, B.rw, C.rt FROM profil AS A INNER JOIN rw AS B INNER JOIN rt AS C ON (A.nik_rw = B.nik_rw) AND (A.nik_rt = C.nik_rt)");
$b = mysql_fetch_array($a);
?>
<style type="text/css">
	#body {
		background: url(../images/index.png) no-repeat;
		background-position: center center ;
		height:100%;
	}
	table{
		margin: auto;
		border-collapse: collapse;
		font-family: arial;
	}
	td{
		width:30%;
		height:2%;
	}
	h2{
		margin-top: -5px;
	}
</style>
<page backtop="5mm" backbottom="10mm" backleft="10mm" backright="10mm">
<div id="body">
<h4 align="left">RT : <?php echo $b['rt']; ?> | RW : <?php echo $b['rw']; ?> <br/>
	KELURAHAN : <?php echo $b['kelurahan']; ?>
</h4>
<br/>
<br/>
<br/>
<h2 align='center'><b><u> SURAT PENGANTAR / KETERANGAN </u><br/>No. </b>....................................</h2>
	<br/>
<p>Yang bertanda tangan di bawah ini, menerangkan :</p>
	<table id="table">
	<?php
	$id = $_GET['id'];
	$a = mysql_query("SELECT * FROM surat WHERE id_surat = '$id' ");
	$b = mysql_fetch_array($a);
	// $c = ImplodeDate();
	$c = report_date($b[tanggal]);
	$d = strip_tags($b[keperluan]);
		echo "<tr><td align='left'>Nama Lengkap </td><td align='center'>:</td><td >$b[nama]</td></tr>";
		echo "<tr><td align='left'>Alamat </td><td align='center'>:</td><td>$b[alamat]</td></tr>";
		echo "<tr><td align='left'>Pekerjaan </td><td align='center'>:</td><td>$b[pekerjaan]</td></tr>";
		echo "<tr><td align='left'>jenis Kelamin </td><td align='center'>:</td><td>$b[gender]</td></tr>";
		echo "<tr><td align='left'>Tempat / tgl. lahir </td><td align='center'>:</td><td>$b[tempat], $c</td></tr>";
		echo "<tr><td align='left'>Agama </td><td align='center'>:</td><td>$b[agama]</td></tr>";
		echo "<tr><td align='left'>Kawin / tidak kawin </td><td align='center'>:</td><td>$b[kawin]</td></tr>";
		echo "<tr><td align='left'>Kewarnegaraan </td><td align='center'>:</td><td>$b[kewar]</td></tr>";
		echo "<tr><td align='left'>NIK </td><td align='center'>:</td><td>$b[nik]</td></tr>";
		echo "<tr><td align='left'>Keperluan </td><td align='center'>:</td><td>$d</td></tr>";
	?>
</table>
<p>Demikian agar mendapat bantuan seperlunya</p>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<table >
<tr><td align="center">Tanda tangan</td><td></td><td align="center">Surabaya,..........20.....</td></tr>
<tr><td align="center">Yang bersangkutan</td><td></td><td align="center">Ketua RT</td></tr>
<tr><td></td><td></td><td></td></tr>
<tr><td></td><td></td><td></td></tr>
<tr><td></td><td></td><td></td></tr>
<tr><td align="center">(..............................)</td><td></td><td align="center">(..............................)</td></tr>

<tr><td></td><td></td><td></td></tr>
<tr><td></td><td align="center">No...............................</td><td></td></tr>
<tr><td></td><td align="center">Mengetahui : </td><td></td></tr>
<tr><td></td><td align="center">Ketua RW</td><td></td></tr>
<tr><td></td><td></td><td></td></tr>
<tr><td></td><td></td><td></td></tr>
<tr><td></td><td></td><td></td></tr>
<tr><td></td><td align="center">(..............................)</td><td></td></tr>
</table>
</div>
</page>