<?php
include "includes/koneksi.php";
$id 	= $_GET['id'];
$a 		= mysql_query("SELECT * FROM eksekutif WHERE id_eksekutif = '$id' ");
$hasil = mysql_fetch_array($a);
?>
<div id="container1">
<h3>Edit eksekutif</h3>
<hr>
<div class="tambah-data" style=" width:300px; height:150px; border:1px solid #123ABC; border-radius:10px; background-color: #4D5B67;">
<form method="POST" action="index.php?page=eksekutif_proses" enctype="multipart/form-data">
	<input type="hidden" name="aksi" value="edit"/>
	<input type="hidden" name="idx" value="<?php echo $hasil['id_eksekutif']?>"/>
	<table width="100%" style="margin-left:10px; margin-top:5px;">
		<tr>
			<td style="color:white;">Nama</td>
			<td><input type="text" style="width:215px;" name="txtnama" value="<?php echo $hasil['nama']?>" required /></td>
		</tr>
		<tr>
			<td style="color:white;">Jabatan</td>
			<td><select name="cbjabatan" required>
				<option value="">------------>Pilih Jabatan<------------</option>
				<?php
				$kat = mysql_query("SELECT * FROM jabatan ORDER BY id_jabatan ASC");
				while($hasil_kat = mysql_fetch_array($kat)){
				echo "<option value='$hasil_kat[id_jabatan]'";
					if($hasil['id_jabatan']==$hasil_kat['id_jabatan'])echo "selected";
					echo ">$hasil_kat[jabatan]</option>;";
					}
				?>
				</select></td>
		</tr>
		<tr>
			<td style="color:white;">Alamat</td>
			<td><textarea name="txtalamat" required><?php echo $hasil['alamat']?></textarea></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Simpan" style="background-color: #ABCDEF;"/>
				<input type="reset" value="Hapus" style="background-color: #ABCDEF;"/>
				<?php 
				echo "<a style='cursor:pointer;' title='Lihat eksekutif' border='0' onclick=\"javascript:window.location.href='index.php?page=eksekutif';\">Back</a>";
				?>
			</td>
		</tr>
	</table>
</form>
</div>
</div>