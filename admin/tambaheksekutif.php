<?php
include "includes/koneksi.php";
?>
<div id="container1">
<h3>Tambah eksekutif</h3>
<hr>
<div class="tambah-data" style=" width:300px; height:150px; border:1px solid #123ABC; border-radius:10px; background-color: #4D5B67;">
<form method="POST" action="index.php?page=eksekutif_proses" enctype="multipart/form-data">
	<input type="hidden" name="aksi" value="tambah"/>
	<table width="100%" style="margin-left:10px; margin-top:5px;">
		<tr>
			<td style="color:white;">Nama</td>
			<td><input type="text" style="width:215px;" name="txtnama" required /></td>
		</tr>
		<tr>
			<td style="color:white;">Jabatan</td>
			<td><select name="cbjabatan" required>
			<option value="">------------>Pilih Jabatan<------------</option>
				<?php
				$kat = mysql_query("SELECT * FROM jabatan");
				while($hasil_kat = mysql_fetch_array($kat)){
					echo "<option value='$hasil_kat[id_jabatan]'>$hasil_kat[jabatan]</option>";}
				?>
			</select></td>
		</tr>
		<tr>
			<td style="color:white;">Alamat</td>
			<td><textarea name="txtalamat" required></textarea></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Simpan" style="background-color: #ABCDEF;"/>
				<input type="reset" value="Hapus" style="background-color: #ABCDEF;"/>
				<?php 
				echo "<a style='cursor:pointer;' title='Lihat eksekutif' border='0' onclick=\"javascript:window.location.href='index.php?page=eksekutif';\">Lihat Eksekutif</a>";
				?>
			</td>
		</tr>
	</table>
</form>
</div>
</div>