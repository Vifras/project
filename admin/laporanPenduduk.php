<div id="container1">
<h3 style="margin-top:-5px;">Laporan Data Penduduk</h3>
<hr/>
<button type="button" style="padding-right: 10px; display:inline-block; background-color: #ABCDEF; color: #5262BA;" onclick="javascript: $('.gender').slideToggle(750);">Grafik Gender</button>
<button type="button" style="padding-right: 10px; display:inline-block; background-color: #ABCDEF; color: #5262BA;" onclick="javascript: $('.agama').slideToggle(750);">Grafik Agama</button>
<button type="button" style="padding-right: 10px; display:inline-block; background-color: #ABCDEF; color: #5262BA;" onclick="javascript: $('.pendidikan').slideToggle(750);">Grafik Pendidikan</button>
<button type="button" style="padding-right: 10px; display:inline-block; background-color: #ABCDEF; color: #5262BA;" onclick="javascript: $('.kk').slideToggle(750);">Grafik Jenis KK</button>

<div class="gender" style="display:none; width:auto; height:auto;">
<br>
	<?php include "laporanGender.php"; ?>
</div>

<div class="agama" style="display:none; width:auto; height:auto;">
<br>
	<?php include "laporanAgama.php"; ?>
</div>

<div class="pendidikan" style="display:none; width:auto; height:auto;">
<br>
	<?php include "laporanPendidikan.php"; ?>
</div>

<div class="kk" style="display:none; width:auto; height:auto;">
<br>
	<?php include "laporanJenisKeluarga.php"; ?>
</div>



</div>