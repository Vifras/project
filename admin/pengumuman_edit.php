<!doctype html>
<?php
include "includes/koneksi.php";
$id 	= $_GET['id'];
$a 		= mysql_query("SELECT * FROM pengumuman WHERE id_pengumuman = '$id' ");
$hasil = mysql_fetch_array($a);
?>
<div id="container1">
<h3>Edit pengumuman</h3>
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
<form method="POST" action="index.php?page=pengumuman_proses" enctype="multipart/form-data">
	<input type="hidden" name="aksi" value="edit"/>
	<input type="hidden" name="idx" value="<?php echo $hasil['id_pengumuman']?>"/>
	<table width="100%" style="margin-left:10px; margin-top:5px;">
		<tr>
			<td style="color:white;">Judul</td>
			<td><input type="text" style="width:425;" name="txtjudul" value="<?php echo $hasil['judul']?>" required /></td>
		</tr>
		<tr>
			<td style="color:white;">Pengirim</td>
			<td><input type="text" name="txtpengirim"  value="<?php echo $hasil['pengirim']?>" required /></td>
		</tr>
		<tr>
			<td colspan="2"><textarea name="txtpengumuman"><?php echo $hasil['pengumuman']?></textarea></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Simpan" style="background-color: #ABCDEF;"/>
				<input type="reset" value="Hapus" style="background-color: #ABCDEF;"/>
				<?php 
				echo "<a style='cursor:pointer;' title='Lihat pengumuman' border='0' onclick=\"javascript:window.location.href='index.php?page=pengumuman';\">Back</a>";
				?>
			</td>
		</tr>
	</table>
</form>
</div>
</div>