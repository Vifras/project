<?php
session_start(); 
include "admin/includes/koneksi.php";
include "includes/counter.php"; 
$o= mysql_query("SELECT A.id, A.alamat, A.kelurahan, A.kecamatan, A.kota, A.kodepos, A.provinsi, B.rw, C.rt FROM profil AS A INNER JOIN rw AS B INNER JOIN rt AS C ON (A.nik_rw = B.nik_rw) AND (A.nik_rt = C.nik_rt)");
$p = mysql_fetch_array($o);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>&trade; SIMARTW &copy;</title>
<link rel="shortcut icon" href="images/sby.jpg" type="image/x-icon" />
<script type="text/javascript" src="admin/includes/jquery.js"></script>
<link rel="stylesheet" href="includes/popup-calendar/dhtmlgoodies_calendar.css" media="screen"></link>
<script type="text/javascript" src="includes/popup-calendar/dhtmlgoodies_calendar.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/style2.css" rel="stylesheet" type="text/css" /> 
<link href="css/ticker-style.css" rel="stylesheet" type="text/css" /> 
<link href="css/menu.css" rel="stylesheet" type="text/css" /> 
<link href="css/slider.css" rel="stylesheet" type="text/css" /> 
<link href="css/breadcrumb.css" rel="stylesheet" type="text/css" /> 
<link href="css/chosen.css" rel="stylesheet" type="text/css"> 
<script language="javascript" src="js/jquery.ticker.js"></script>
<script language="javascript" src="js/site.js"></script>
<script type="text/javascript" src="js/jquery.jcarousel.min.js" ></script>
<script src="js/redactor/jquery-1.7.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/skrip.js" ></script>
<script language="javascript" src="js/menu.js"></script>
<link href="js/redactor/redactor.css" rel="stylesheet" type="text/css" />
<script src="js/redactor/redactor.min.js" type="text/javascript"></script>
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
<script type="text/javascript" src="js/fb/jquery.js"></script>
		<link rel="stylesheet" href="js/fb/jquery.fancybox.css?v=2.1.0" 
		type="text/css" media="screen" />
		<script type="text/javascript" src="js/fb/jquery.fancybox.pack.js?v=2.1.0"></script>
		<script type="text/javascript">$(document).ready(function() {
				/*
				 *  Simple image gallery. Uses default settings
				 */

				$('.fancybox').fancybox();
			});
		</script>
<script type="text/javascript" src="JS/tooltip.js"></script>
</head>

<body onload="setInterval('displayServerTime()',1000);">
<div id="first-top-menu">
<div id="main-menu">
<div id="inner-main-menu">
	<div id="MainMenu"><div id="Menu">
	  <div class="suckertreemenu">
		<ul id='treemenu1'>
		<li>
		<a style="cursor:pointer;" onclick="javascript:window.location.href='index.php?page=home';"><img src="images/icon-home.png" width="20px" style="margin-bottom:-7px;" />&nbsp;Beranda</a>
		</li>

		<li>
		<a style="cursor:pointer;" onclick="javascript:window.location.href='index.php?page=kegiatanv';"><img src="images/news-icon.png" width="25px" style="margin-bottom:-8px;" />&nbsp;Kegiatan Kampung</a>
		</li>

		<li>
			 <a style="cursor:pointer;" onclick="javascript:window.location.href='index.php?page=pengumuman';"><img src="images/pengumuman-icon.png" width="20px" style="margin-bottom:-7px;" />&nbsp;Pengumuman</a>
		</li>

		<li>
		<a style="cursor:pointer;"><img src="images/artikel-icon.png" width="20px" style="margin-bottom:-7px;" />&nbsp; Info Kampung &raquo;</a>
			<ul id=''>
			<li>
				<a style="cursor:pointer;" onclick="javascript:window.location.href='index.php?page=eksekutif';">&raquo;&nbsp;<img src="images/profil-icon.png" width="25px" style="margin-bottom:-7px;" /> Eksekutif Kampung</a>
			</li>
			<li>
				<a style="cursor:pointer;" onclick="javascript:window.location.href='index.php?page=profil';">&raquo;&nbsp;<img src="images/berita-icon.png" width="25px" style="margin-bottom:-7px;" /> Profil Kampung</a>
			</li>
			<li>
				<a style="cursor:pointer;" onclick="javascript:window.location.href='index.php?page=album';">&raquo;&nbsp;<img src="images/album-icon.png" width="25px" style="margin-bottom:-7px;" /> Album Kampung</a>
			</li>
			</ul>
		</li>

		<li>
			<?php if(!isset($_SESSION['nokk'])) { ?>
			<a onclick="javascript: alert('Maaf, Anda harus login terlebih dahulu');"  style="cursor:pointer;"><img src="images/icon-report.png" width="20px" style="margin-bottom:-7px;" />&nbsp;Lap. Iuran Kampung</a>
			<?php }else{ ?>
			<a style="cursor:pointer;" onclick="javascript:window.location.href='index.php?page=lap_iuran';"'>&nbsp;<img src="images/icon-report.png" width="20px" style="margin-bottom:-7px;" />&nbsp;Lap. Iuran Kampung</a>
			<?php } ?>
		</li>

		<li>
			<?php if(!isset($_SESSION['nokk'])) { ?>
			<a onclick="javascript: alert('Maaf, Anda harus login terlebih dahulu');"  style="cursor:pointer;"><img src="images/email.png" width="20px" style="margin-bottom:-7px;" />&nbsp;Surat Pengantar</a>
			<?php }else{ ?>
			<a style="cursor:pointer;" onclick="javascript:window.location.href='index.php?page=surat';"><img src="images/email.png" width="20px" style="margin-bottom:-7px;" />&nbsp;Surat Pengantar</a>
			<?php } ?>
		</li>
		</ul>
		</div>
	</div>
	</div>
	</div>
</div>
	
	<!-- <div style="float:right; width:105px; padding-top:10px; padding-left: 6px;"> -->
	<?php
	echo "";
	?>
	 
	<!-- <form class="quick_search"> -->
	<!-- <input type="text" style="width: 115px;" placeholder="Pencarian...."> -->
	<!-- <input type="submit" value="SEARCH" style="padding: 3px;" /> 
	</form>-->
	<!-- </div> -->
	<div class="cleaner_h0"></div>
</div>
<!-- <div class="cleaner_h50"></div> -->
<!-- <div class="cleaner_h50"></div> -->
<!-- <div class="cleaner_h20"></div> -->
<!-- <div class="cleaner_h1"></div> -->
<!-- <div class="cleaner_h1"></div> -->
<!-- <div class="cleaner_h1"></div> -->
<!-- <div class="cleaner_h1"></div>  -->
<div id="main-menu">
<div id="inner-main-menu-bottom">
<img src="images/header.jpg" style="width:102%;height:115px;margin-left: -10px;">
</div>

<!-- <div class="cleaner_h10"></div> -->
<div id="content">
		<ul id="crumbs">
		<?php
if($_GET['page']==''){
echo "<li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=home';\">Beranda</a></li><li>Selamat datang di website kampung <b>$p[alamat]|| RW. $p[rw] RT. $p[rt] </b></li>";
}
elseif($_GET['page']=='home'){
echo "<li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=home';\">Beranda</a></li>
	<li>Selamat datang di website kampung <b>$p[alamat]|| RW. $p[rw] RT. $p[rt] </b></li>";
}
elseif($_GET['page']=='pengumuman'){
echo "<li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=home';\">Beranda</a></li><li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=pengumuman';\">Pengumuman</a></li>";
}
elseif($_GET['page']=='kegiatanv'){
echo "<li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=home';\">Beranda</a></li><li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=kegiatanv';\">Kegiatan</a></li>";
}
elseif($_GET['page']=='eksekutif'){
echo "<li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=home';\">Beranda</a></li><li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=eksekutif';\"'>Data Eksekutif Kampung</a></li>";
}
elseif($_GET['page']=='profil'){
echo "<li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=home';\">Beranda</a></li><li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=profil';\">Profil Kampung</a></li>";
}
elseif($_GET['page']=='album'){
echo "<li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=home';\">Beranda</a></li><li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=album';\">Album Kampung</a></li>";
}
elseif($_GET['page']=='album_detil'){
echo "<li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=home';\">Beranda</a></li><li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=album';\">Album Kampung</a></li>";
$idx = $_GET['id'];
$al = mysql_query("SELECT A.id_alb,B.nama,B.id,A.foto,A.keterangan,A.tanggal FROM album_detil AS A INNER JOIN album AS B ON (A.id = B.id) WHERE B.id = '$idx' ");
$la = mysql_fetch_array($al);
echo "<li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=album_detil&id=$la[id] ';\">$la[nama]</a></li>";
}
elseif($_GET['page']=='surat'){
echo "<li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=home';\">Beranda</a></li><li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=surat';\">Buat Surat Pengantar</a></li>";
}
elseif($_GET['page']=='tutorial'){
echo "<li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=home';\">Beranda</a></li><li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=tutorial';\">Tutorial Mencetak Surat Pengantar</a></li>";
}
elseif($_GET['page']=='lap_iuran'){
echo "<li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=home';\">Beranda</a></li><li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=lap_iuran';\">Laporan Iuran Kampung</a></li>";
}
elseif($_GET['page']=='iuran'){
echo "<li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=home';\">Beranda</a></li><li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=iuran';\">Kartu Iuran Wajib Warga</a></li>";
}
elseif($_GET['page']=='kegiatan_proses'){
echo "<li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=home';\">Beranda</a></li><li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=kegiatanv';\">Kegiatan</a></li>";
$idx = $_GET['id'];
$c = mysql_query("SELECT * FROM kegiatan WHERE id_kegiatan = '$idx' ");
$d = mysql_fetch_array($c);
echo "<li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=kegiatan_proses&id=$d[id_kegiatan] ';\">$d[perihal]</a></li>";
}
elseif($_GET['page']=='pengumuman_proses'){
echo "<li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=home';\">Beranda</a></li><li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=pengumuman';\">Pengumuman</a></li>";
$idx = $_GET['id'];
$e = mysql_query("SELECT * FROM pengumuman WHERE id_pengumuman = '$idx' ");
$f = mysql_fetch_array($e);
echo "<li><a style='cursor:pointer;' onclick=\"javascript:window.location.href='index.php?page=pengumuman_proses&id=$f[id_penguman] ';\">$f[judul]</a></li>";
}
?>			
		</ul>
<div class="cleaner_h20"></div><div id="content-left">

<div id="bg-sidebar">
<div id="head-sidebar">WARGA'S AREA</div>
<div id="content-sidebar">
<?php
	if(isset($_SESSION['nokk'])){
		include "warga/warga.php";
	}else{
?>
<form action="warga/login_proses.php" method="post" accept-charset="utf-8"><div style="display:none">
<input type="hidden" name="" value="" />
</div><label for="username">Nama Kepala Keluarga : </label>
<input type="text" name="nama" id="username" autocomplete="off" placeholder="Masukkan Nama...." required />
<label for="password">No. Kartu Keluarga : </label>
<input type="password" onmouseover="javascript: this.type='text';" onmouseout="javascript: this.type='password';" name="txtkk" autocomplete="off" id="password" placeholder="Masukkan No. KK...." required />
<div class="cleaner_h0"></div>	
	<input type="submit" value="LOGIN" />
	<input type="reset" value="RESET" />
<?php
	}
?>
</div>
</form><div class="cleaner_h10"></div>	

</div>

<div class="cleaner_h20"></div>	

<div id="bg-sidebar">
<div id="head-sidebar">FOTO KETUA RT</div>
<div id="content-sidebar">
<?php include "warga/ketua.php"; ?>
<div class="cleaner_h0"></div>	
</div>
</div>

<div class="cleaner_h20"></div>	

</div><div id="content-center">
<?php include "warga/isi.php"; ?>

</div>
<div id="content-right">
	<div id="bg-sidebar">
	<div id="head-sidebar">KEGIATAN KAMPUNG TERBARU</div>
	<div id="content-sidebar">
	<?php include "warga/kegiatan.php"; ?>
	</div>
	</div>

<div class="cleaner_h20"></div>	
	<div id="bg-sidebar">
	<div id="head-sidebar">STATISTIK PENGUNJUNG</div>
	<div id="content-sidebar">
	<ul>
		<li>Jam saat ini : <b><span id="clock"><?php print date('H:i:s'); ?></b></span></li>
		<li> <?php echo 'Dikunjungi sebanyak  : <b>'.file_get_contents($filename);	//menampilkan counter di website ?></b> kali</li>
		<!--<li>IP Anda : <b><?php /*echo $_SERVER['REMOTE_ADDR'];?></b></li>
		<li><?php

if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Gecko') )
{
if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape') )
{
$browser = 'Netscape (Gecko/Netscape)';
}
else if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') )
{
$browser = 'Mozilla Firefox (Gecko/Firefox)';
}
else
{
$browser = 'Mozilla (Gecko/Mozilla)';
}
}
else if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') )
{
if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') )
{
$browser = 'Opera (MSIE/Opera/Compatible)';
}
else
{
$browser = 'Internet Explorer (MSIE/Compatible)';
}
}
else
{
$browser = 'Others browsers';
}

echo $browser;*/
?></li>-->
	</ul>
	</div>
</div>


<div class="cleaner_h20"></div>	
	<div id="bg-sidebar">
	<div id="head-sidebar">KALENDER</div>
	<div id="content-sidebar">
	<?php include "includes/calendar.php"; ?>
	</div>
	</div>
</div>

<div class="cleaner_h20"></div>
</div>
<div class="cleaner_h0"></div>	
</div>

<div id="footer">
<div id="inner-footer">

</div>
<div class="cleaner_h20"></div>
<div class="cleaner_h10"></div>
Copyright &copy; <?php echo date('Y'); ?> Sistem Informasi Manajemen RT & RW | Powered by <a href="http://kurnia336@gmail.com" style="text-decoration: none;"> Alif Rachmad Kurniawan</a><br>
Designed by Gede Lumbung - <a style="text-decoration: none;color:blue;cursor:pointer;" onclick="javascript:window.location.href='http://gedelumbung.com';" target="blank" >http://gedelumbung.com</a>
<div class="cleaner_h40"></div>
</div>
</body>
</html>
