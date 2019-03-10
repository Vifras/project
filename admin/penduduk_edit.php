<?php
include "includes/koneksi.php";
$nik 	= $_GET['id'];
$a 		= mysql_query("SELECT A.*, B.kepkel FROM penduduk AS A INNER JOIN keluarga AS B ON (A.no_kk = B.no_kk) WHERE nik = '$nik' ");
$result	= mysql_fetch_array($a);
?>
<div id="container1">
<h3>Tambah Anggota Keluarga</h3>
<hr>
<div class="tambah-data" style=" width:535px; height:425px; border:1px solid #123ABC; border-radius:10px; background-color: #4D5B67;">
<form method="POST" action="index.php?page=penduduk_proses" enctype="multipart/form-data">
	<input type="hidden" name="aksi" value="edit"/>
	<input type="hidden" name="nikx" value="<?php echo $result['nik'];?>"/>
	<input type="hidden" name="idx" value="<?php echo $result['no_kk'] ?>">
	<table width="100%" style="margin-left:10px; margin-top:5px;">
		<tr>
			<td style="color:white;">No. KK -- Kepala keluarga</td>
			<td style="color:white;"><input type="text" style="width:px;" name="txtkk" value="<?php echo $result['no_kk'];?>" onkeyup="javascript:if(isNaN(this.value)){this.value='0'; this.select();}" readonly /> -- <input type="text" value=" <?php echo $result['kepkel'];?>" readonly/></td>
		</tr>
		<tr>
			<td style="color:white;">Nama</td>
			<td><input type="text" name="txtnama" value="<?php echo $result['nama'];?>" required /></td>
		</tr>
		<tr>
			<td style="color:white;">NIK/NIKS</td>
			<td><input type="text" name="txtnik" value="<?php echo $result['nik'];?>" onkeyup="javascript:if(isNaN(this.value)){this.value='0'; this.select();}" required /></td>
		</tr>
		<tr>
			<td style="color:white;">Jenis kelamin</td>
			<td>
			<input type="radio" name="gender" value="L" <?php if($result['gender']=='L') echo "checked"; ?> />Laki-laki
			<input type="radio" name="gender" value="P" <?php if($result['gender']=='P') echo "checked"; ?>  />Perempuan
			</td>
		</tr>
		<tr>
			<td style="color:white;">Tempat, tanggal lahir</td>
		<td>
					<input type="text" name="txttempat" required value="<?php echo $result['tempat_lahir'];?>"/>,
					<input type="text" name="txttanggal" id="txttanggal" size="10" value="<?php echo ImplodeDate($result['tanggal_lahir']); ?>" />&nbsp;<img src="includes/popup-calendar/calendar.gif" width="24" height="12" onclick="displayCalendar(document.getElementById('txttanggal'),'dd/mm/yyyy',this)" style="cursor:pointer">
		</td>
		</tr>
		<tr>
			<td style="color:white;">Agama</td>
			<td>
				<select name="cbagama" required>
				<option value="">--Pilih Agama--</option>
				<?php
				$kat = mysql_query("SELECT * FROM agama ORDER BY id_agama ASC");
				while($hasil_kat = mysql_fetch_array($kat)){
				echo "<option value='$hasil_kat[id_agama]'";
					if($result['id_agama']==$hasil_kat['id_agama'])echo "selected";
					echo ">$hasil_kat[agama]</option>;";
					}
				?>
			</select>
			</td>	
		</tr>
		<tr>
			<td style="color:white;">Pendidikan</td>
			<td>
				<select name="cbpendidikan" required>
				<option value="">--Pilih Pendidikan--</option>
				<?php
				$kat = mysql_query("SELECT * FROM pendidikan ORDER BY id_pendidikan ASC");
				while($hasil_kat = mysql_fetch_array($kat)){
				echo "<option value='$hasil_kat[id_pendidikan]'";
					if($result['id_pendidikan']==$hasil_kat['id_pendidikan'])echo "selected";
					echo ">$hasil_kat[pendidikan]</option>;";
					}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td style="color:white;">Pekerjaan</td>
			<td>
				<select name="cbpekerjaan" required>
				<option value="">--Pilih Pekerjaan--</option>
				<?php
				$kat = mysql_query("SELECT * FROM pekerjaan ORDER BY id_pekerjaan ASC");
				while($hasil_kat = mysql_fetch_array($kat)){
				echo "<option value='$hasil_kat[id_pekerjaan]'";
					if($result['id_pekerjaan']==$hasil_kat['id_pekerjaan'])echo "selected";
					echo ">$hasil_kat[pekerjaan]</option>;";
					}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td style="color:white;">Status kawin</td>
			<td>
			<select name="cbstatus" required>
				<option value="">--Pilih Status--</option>
				<?php
				$kat = mysql_query("SELECT * FROM status ORDER BY id_status ASC");
				while($hasil_kat = mysql_fetch_array($kat)){
				echo "<option value='$hasil_kat[id_status]'";
					if($result['id_status']==$hasil_kat['id_status'])echo "selected";
					echo ">$hasil_kat[status]</option>;";
					}
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td style="color:white;">Hubungan keluarga</td>
			<td>
				<select name="cbhubungan" required>
				<option value="">--Pilih Hubungan--</option>
				<?php
				$kat = mysql_query("SELECT * FROM hubungan ORDER BY id_hubungan ASC");
				while($hasil_kat = mysql_fetch_array($kat)){
				echo "<option value='$hasil_kat[id_hubungan]'";
					if($result['id_hubungan']==$hasil_kat['id_hubungan'])echo "selected";
					echo ">$hasil_kat[hubungan]</option>;";
					}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td style="color:white;">Kewarnegaraan</td>
			<td>
			<input type="radio" name="kewar" value="WNI" <?php if($result['kewar']=='WNI') echo "checked"; ?>  required />WNI
			<input type="radio" name="kewar" value="WNA" <?php if($result['kewar']=='WNA') echo "checked"; ?>  required />WNA
			</td>
		</tr>
		<tr>
			<td style="color:white;">No. Paspor</td>
			<td><input type="text" name="txtpa" value="<?php echo $result['no_paspor'];?>" onkeyup="javascript:if(isNaN(this.value)){this.value='0'; this.select();}"/></td>
		</tr>
		<tr>
			<td style="color:white;">No. KITAS/KITAP </td>
			<td><input type="text" name="txtki" value="<?php echo $result['no_kitaskitap'];?>" onkeyup="javascript:if(isNaN(this.value)){this.value='0'; this.select();}"/></td>
		</tr>
		<tr>
			<td style="color:white;">Ayah</td>
			<td><input type="text" name="txtay" value="<?php echo $result['ayah'];?>" required /></td>
		</tr>
		<tr>
			<td style="color:white;">Ibu</td>
			<td><input type="text" name="txtib" value="<?php echo $result['ibu'];?>" required /></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Simpan" style= "background-color: #ABCDEF;"/>
				<input type="reset" value="Hapus" style="background-color: #ABCDEF;"/>
				<?php 
				echo "<a style='cursor:pointer;' title='Lihat Kartu Keluarga' border='0' onclick=\"javascript:window.location.href='index.php?page=lihat_kk&id=$result[no_kk]';\">Lihat Kartu Keluarga</a>";
				?>
			</td>
		</tr>
	</table>
</form>
</div>
</div>