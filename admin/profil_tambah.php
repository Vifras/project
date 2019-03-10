<?php
include "includes/koneksi.php";
?>
<div id="container1">
<h3>Tambah Profil</h3>
<hr>
<div class="tambah-data" style=" width:325px; height:275px; border:1px solid #123ABC; border-radius:10px; background-color: #4D5B67;">
<form method="POST" action="index.php?page=profil_proses" enctype="multipart/form-data">
	<input type="hidden" name="aksi" value="tambah"/>
	<table width="100%" style="margin-left:10px; margin-top:5px;">
		<tr>
			<td style="color:white;">Rukun Tetangga</td>
			<td><select name="cbrt" required>
			<option value="">--> Pilih Rukun Tetangga <--</option>
				<?php
				$kat = mysql_query("SELECT nik_rt, foto, nik_rw, rt, nama, alamat FROM rt ");
				while($hasil_kat = mysql_fetch_array($kat)){
					echo "<option value='$hasil_kat[nik_rt]'>$hasil_kat[rt]</option>";}
				?>
			</select></td>
		</tr>
		<tr>
			<td style="color:white;">Rukun Warga</td>
			<td><select name="cbrw" required>
			<option value="">--> Pilih Rukun Warga <--</option>
				<?php
				$kat = mysql_query("SELECT nik_rw, foto, rw, nama, alamat FROM rw ");
				while($hasil_kat = mysql_fetch_array($kat)){
					echo "<option value='$hasil_kat[nik_rw]'>$hasil_kat[rw]</option>";}
				?>
			</select></td>
		</tr><tr>
			<td style="color:white;">Alamat</td>
			<td><textarea name="txtalamat" cols="16" rows="2" required> </textarea></td>
		</tr>
		<tr>
			<td style="color:white;">Kelurahan</td>
			<td><input type="text" name="txtkelu" required /></td>
		</tr>
		<tr>
			<td style="color:white;">Kecamatan</td>
			<td><input type="text" name="txtkeca" required /></td>
		</tr>
		<tr>
			<td style="color:white;">Kota</td>
			<td><input type="text" name="txtkota" required /></td>
		</tr>
		<tr>
			<td style="color:white;">Kode pos</td>
			<td><input type="text" name="txtkode" onkeyup="javascript:if(isNaN(this.value)){this.value='0'; this.select();}" /></td>
		</tr>
		<tr>
			<td style="color:white;">Provinsi</td>
			<td><input type="text" name="txtpro" required /></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Simpan" style="background-color: #ABCDEF;"/>
				<input type="reset" value="Hapus" style="background-color: #ABCDEF;"/>
				<?php 
				echo "<a style='cursor:pointer;' title='Lihat profil' border='0' onclick=\"javascript:window.location.href='index.php?page=profil';\">Lihat profil</a>";
				?>
			</td>
		</tr>
	</table>
</form>
</div>
</div>