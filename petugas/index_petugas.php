<?php session_start(); ?>
<?php
include "../admin/includes/koneksi.php";
if(isset($_SESSION['nama']) == false){
	header("location:login_petugas.php");
}
?>
<html>
<meta charset="utf-8" />	
<head>
<title>.: Petugas Page :.</title>
<link rel="shortcut icon" href="images/home.png" type="image/x-icon" />
<link rel="stylesheet" href="includes/index_petugas.css"></link>
<script type="text/javascript" src="includes/jquery.js"></script>
<link rel="stylesheet" href="includes/popup-calendar/dhtmlgoodies_calendar.css" media="screen"></link>
<script type="text/javascript" src="includes/popup-calendar/dhtmlgoodies_calendar.js"></script>
<script type="text/javascript">
    //buat object date berdasarkan waktu di server
    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
    //buat object date berdasarkan waktu di client
    var clientTime = new Date();
    //hitung selisih
    var Diff = serverTime.getTime() - clientTime.getTime();    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayServerTime(){
        //buat object date berdasarkan waktu di client
        var clientTime = new Date();
        //buat object date dengan menghitung selisih waktu client dan server
        var time = new Date(clientTime.getTime() + Diff);
        //ambil nilai jam
        var sh = time.getHours().toString();
        //ambil nilai menit
        var sm = time.getMinutes().toString();
        //ambil nilai detik
        var ss = time.getSeconds().toString();
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>
<script type="text/javascript" src="includes/tooltip.js"></script>
<style type="text/css">
	#tooltip{
	position:absolute;
	border:1px solid #333;
	background:#f7f5d1;
	padding:10px;
	color:#333;
	display:none;
	border-radius: 8px;
}
</style>
</head>
<body onload="setInterval('displayServerTime()',1000);">
<div id="header">
	<p id="Admin">.: Petugas Page :. |<b id='copy'> <span id="clock" id="copy"><?php print date('H:i:s'); ?></span> | <?php
	$a = mysql_query("SELECT A.id, A.alamat, A.kelurahan, A.kecamatan, A.kota, A.kodepos, A.provinsi, B.rw, C.rt FROM profil AS A INNER JOIN rw AS B INNER JOIN rt AS C ON (A.nik_rw = B.nik_rw) AND (A.nik_rt = C.nik_rt) ");
	while($b = mysql_fetch_array($a)){
			echo "";
			echo "RW $b[rw] - ";
			echo "RT $b[rt]";
			echo ""; }
	?> </b></p>
	<div id="info-user">
		<b id="nama">Selamat Datang, 
		<?php echo $_SESSION['nama']; ?> | </b><a class="logout" href="#" onclick="javascript: if(confirm('Apakah mau keluar ?')==true){window.location.href='logout_petugas.php';}"><b>Logout </b></a>
	</div>
</div>
<div id="kiri">
	<div id="menu">
	<?php 
	$nama 	= $_SESSION['nama'];
	$status = $_SESSION['status'];
	?>
	<a href="#" class="tooltip" title="Bpk. <?php echo $nama ?> | Status sebagai <?php echo $status; ?>"><img src="<?php echo $_SESSION['foto']; ?>" style="width:95px;border-radius: 100px;margin-bottom: 5px;"/></a>
	<br>
			<h3 align="center">Main Menu</h3>
			<hr style="color:#AAFFBB;">

<div id="nav">
	<ul>
		<li>
			<a href="index_petugas.php?page=home" title="Home"><b>Home</b></a>
		</li>
		<li>
			<?php if(!isset($_SESSION['nik_rt'])) { ?>
			<a href="#" title="Info Kampung" onclick="javascript: alert('Maaf, Anda harus login sebagai RT');"><b>Info&nbsp;&raquo;</b></a>
			<?php }else{ ?>
			<a href="#" title="Info Kampung"><b>Info&nbsp;&raquo;</b></a>
			<ul>
				<li><a href="index_petugas.php?page=profil" title="Profil Kampung">Profil</a></li>
				<li><a href="index_petugas.php?page=eksekutif" title="Data Eksekutif">Eksekutif</a></li>
				<li><a href="index_petugas.php?page=album" title="Data Album"><b>Album</b></a></li>
			</ul>
			<?php } ?>
		</li>
		<li>
			<?php if(!isset($_SESSION['nik_rw'])) { ?>
		<a href="#" title="Data Keluarga"><b>Keluarga&nbsp;&raquo;</b></a>
			<ul>
				<li>
				<a href="index_petugas.php?page=keluarga" title="Data Keluarga">Data Kartu Keluarga</a></li>
				<li>
				<?php if(!isset($_SESSION['nik_rt'])) { ?>
				<a href="#" onclick="javascript: alert('Maaf, Anda harus login sebagai RT');" title="Data Master">Data Master&nbsp;&raquo;</a>
				<?php }else{ ?>
				<a href="#" title="Data Master">Data Master&nbsp;&raquo;</a>
					<ul>
						<li><a href="index_petugas.php?page=pekerjaan">Pekerjaan</a></li>
						<li><a href="index_petugas.php?page=agama">Agama</a></li>
					</ul>
				<?php } ?>
				</li>
			</ul>
			<?php }else{ ?>
		<a href="#" title="Data Keluarga" onclick="javascript: alert('Maaf, Anda harus login sebagai RT atau Bendahara');"><b>Keluarga&nbsp;&raquo;</b></a>
		
		<?php } ?>
		</li>
		<li>
			<?php if(!isset($_SESSION['nik_benda'])) { ?>
			<a href="#" onclick="javascript: alert('Maaf, Anda harus login sebagai Bendahara');" title="Data Iuran"><b>Iuran&nbsp;&raquo;</b></a>
			<?php }else{ ?>
			<a href="#" title="Iuran"><b>Iuran&nbsp;&raquo;</b></a>
			<ul>
				<li>
					<a href="index_petugas.php?page=_iuran" title="Data Iuran">Transaksi Iuran Belum Lunas</a>
				</li>
				<li>
					<a href="index_petugas.php?page=_iuran_lunas" title="Data Iuran Lunas">Iuran Lunas</a>
				</li>
			</ul>
			<?php } ?>
		</li>

		<li>
			<a href="#" title="Laporan"><b>Laporan&nbsp;&raquo;</b></a>
			<ul>
				<li>
					<a href="index_petugas.php?page=laporanPenduduk" title="Laporan Data Penduduk">Laporan Data Penduduk </a>
				</li>
				<li>
					<?php if(!isset($_SESSION['nik_rw'])) { ?>
					<a href="#" title="Laporan Data Iuran">Laporan Data Iuran&nbsp;&raquo;</a>
					<ul>
						<li><a href="index_petugas.php?page=laporanIuran" title="Profil Kampung">Transaksi</a></li>
						<li><a href="index_petugas.php?page=rekapIuran" title="Data Eksekutif">Rekap Iuran</a></li>
					</ul>
					<?php }else{ ?>
					<a href="#"  onclick="javascript: alert('Maaf, Anda harus login sebagai RT atau Bendahara')" title="Laporan Data Iuran">Laporan Data Iuran</a>
					<?php } ?>
				</li>
			</ul>
		</li>

		<li>
		<?php if(!isset($_SESSION['nik_rt'])) { ?>
			<a href="#" onclick="javascript: alert('Maaf, Anda harus login sebagai RT');"><b>Penduduk</b></a>
		<?php }else{ ?>
			<a href="index_petugas.php?page=penduduk" title="Data Penduduk"><b>Penduduk</b></a>
		<?php } ?>
		</li>
		

		<li>
		<?php if(!isset($_SESSION['nik_rt'])) { ?>
			<a href="#" title="Data Surat" onclick="javascript: alert('Maaf, Anda harus login sebagai RT');"><b>Surat</b></a>
		<?php }else{ ?>
			<a href="index_petugas.php?page=surat" title="Data Surat"><b>Surat</b></a>
		<?php } ?>
		</li>

		<li>
		<?php if(!isset($_SESSION['nik_rt'])) { ?>
			<a href="#" title="Data Kegiatan" onclick="javascript: alert('Maaf, Anda harus login sebagai RT');"><b>Kegiatan</b></a>
		<?php }else{ ?>
			<a href="index_petugas.php?page=kegiatan" title="Data Kegiatan"><b>Kegiatan</b></a>
		<?php } ?>
		</li>

		<li>
			<a href="index_petugas.php?page=pengumuman" title="Data Pengumuman"><b>Pengumuman</b></a>
		</li>
	</ul>
</div>	
</div>
</div>

	<div id="kanan">
		<?php include "isi_petugas.php"; ?>
	</div>
	<div id="footer">
	<p id="copy" align="right"><i> Copyright @ <?php echo date("Y");?> ARAKU | SIMARTW</i> &trade;</p>
	</div>
</body>
</html>