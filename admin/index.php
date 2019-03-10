<?php session_start(); ?>
<?php
if(isset($_SESSION['username']) == false){
	header("location:login.php");
}
?>
<html>
<meta charset="utf-8" />	
<head>
<title>.: Admin Page :.</title>
<link rel="stylesheet" href="includes/index.css"></link>
</head>
<div id="header">
</div>
<div id="kiri">
	<div id="menu">
			<h3 align="center">Main Menu</h3>
			<hr style="color:#AAFFBB;">
<div id="nav">
	<ul>
		<li>
			<a href="index.php?page=home" title="Home"><b>Home</b></a>
		</li>
		<li>
			<a href="#" title="Info Kampung"><b>Info&nbsp;&raquo;</b></a>
			<ul>
				<li><a href="index.php?page=profil" title="Profil Kampung">Profil</a></li>
				<li><a href="index.php?page=eksekutif" title="Data Eksekutif">Eksekutif</a></li>
				<li><a href="index.php?page=album" title="Data Album"><b>Album</b></a></li>
			</ul>
		</li>
		<li>
			<a href="#" title="Data Petugas"><b>Petugas&nbsp;&raquo;</b></a>
			<ul>
				<li><a href="index.php?page=rw" title="Data RW">RW</a></li>
				<li><a href="index.php?page=rt" title="Data RT">RT</a></li>
				<li><a href="index.php?page=bendahara" title="Data Bendahara">Bendahara</a></li>
			</ul>
		</li>
		<li><a href="#" title="Data Keluarga"><b>Keluarga&nbsp;&raquo;</b></a>
			<ul>
				<li><a href="index.php?page=keluarga" title="Data Keluarga">Data Kartu Keluarga</a></li><li>
				<a href="#" title="Data Master">Data Master&nbsp;&raquo;</a>
					<ul>
						<li><a href="index.php?page=pekerjaan">Pekerjaan</a></li>
						<li><a href="index.php?page=agama">Agama</a></li>
					</ul>
				</li>
			</ul>
		</li>
		<li>
			<a href="#" title="Iuran"><b>Iuran&nbsp;&raquo;</b></a>
			<ul>
				<li>
					<a href="index.php?page=_iuran" title="Data Iuran">Transaksi Iuran Belum Lunas</a>
					<!-- <ul> 
						<li><a href="index.php?page=iuran_keluarga">Iuran Belum Lunas</a></li>
						<li><a href="index.php?page=iuran_lunas"> Iuran Lunas</a></li>
					</ul>-->
				</li>
				<li>
					<a href="index.php?page=_iuran_lunas" title="Iuran Lunas">Iuran Lunas</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="#" title="Laporan"><b>Laporan&nbsp;&raquo;</b></a>
			<ul>
				<li>
					<a href="index.php?page=laporanPenduduk" title="Laporan Data Penduduk">Laporan Data Penduduk </a>
				</li>
				<li>
					<a href="#" title="Laporan Data Iuran">Laporan Data Iuran&nbsp;&raquo;</a>
					<ul>
						<li><a href="index.php?page=laporanIuran" title="Profil Kampung">Transaksi</a></li>
						<li><a href="index.php?page=rekapIuran" title="Data Eksekutif">Rekap Iuran</a></li>
					</ul>
				</li>
			</ul>
		</li>
		<!-- <li> 
			<a href="index.php?page=_iuran" title="Data Iuran"><b>_Iuran</b></a>
		</li>-->
		<!--<li>
			<a href="index.php?page=iuran2" title="Data Iuran"><b>Iuran1</b></a>
		</li>-->
		<li>
			<a href="index.php?page=penduduk" title="Data Penduduk"><b>Penduduk</b></a>
		</li>
		<li>
			<a href="index.php?page=surat" title="Data Surat"t><b>Surat</b></a>
		</li>
		<li>
			<a href="index.php?page=kegiatan" title="Data Kegiatan"><b>Kegiatan</b></a>
		</li>
		<li>
			<a href="index.php?page=pengumuman" title="Data Pengumuman"><b>Pengumuman</b></a>
		</li>
	</ul>
</div>	

		<!--<div class="sub1">
				
				
				<div class="sub2">
				
					<div class="sub2-content">
                    
                    
              		
                    </div>
                </div>
				<hr>
				<div class="sub2">
				
					<div class="sub2-content">
                    
                    
                    </div>
                </div>
				<hr>
				
				
				
				
		</div>-->
	</div>
</div>
	<div id="kanan">
		<?php include "isi.php"; ?>
	</div>
	<div id="footer">	
	<p id="copy" style="float:right;" ><i> Copyright @ <?php echo date("Y");?> ARAKU | SIMARTW</i> &trade;</p>
	</div>
</body>
</html>