<div id="container1">
<h3>Tambah Pengumuman</h3>
<hr>
<script type="text/javascript" src="includes/tinymce/tiny_mce.js"></script>
<script type="text/javascript">
    tinymce.init({
    	selector:'textarea',
    	theme: "simple",
    	width:500,
    	height:225,
    	menubar:false,
    	resize:false,
    	statusbar:false
});
</script>
<div class="tambah-data" style=" width:530px; height:325px; border:1px solid #123ABC; border-radius:10px; background-color: #4D5B67;">
<form method="POST" action="index_petugas.php?page=pengumuman_proses" enctype="multipart/form-data">
	<input type="hidden" name="aksi" value="tambah"/>
	<table width="100%" style="margin-left:10px; margin-top:5px;">
		<tr>
			<td style="color:white;">Judul</td>
			<td><input type="text" style="width:425;" name="txtjudul" required /></td>
		</tr>
		<tr>
			<td style="color:white;">Pengirim</td>
			<td><input type="text" name="txtpengirim" required/></td>
		</tr>
		<tr>
			<td colspan="2"><textarea name="txtpengumuman"></textarea></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Simpan" style="background-color: #ABCDEF;"/>
				<input type="reset" value="Hapus" style="background-color: #ABCDEF;"/>
				<?php 
				echo "<a style='cursor:pointer;' title='Lihat pengumuman' border='0' onclick=\"javascript:window.location.href='index_petugas.php?page=pengumuman';\">Lihat pengumuman</a>";
				?>
			</td>
		</tr>
	</table>
</form>
</div>
</div>