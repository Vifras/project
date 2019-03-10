<?php
$no_kk = $_GET['id'];
$a = mysql_query("SELECT * FROM keluarga WHERE no_kk = '$no_kk' ");
$hasil = mysql_fetch_array($a);
?>
<div id="container1">
<h3>Tambah Anggota Keluarga</h3>
<hr>
<div class="tambah-data" style=" width:535px; height:425px; border:1px solid #123ABC; border-radius:10px; background-color: #4D5B67;">
<form method="POST" action="index_petugas.php?page=penduduk_proses" enctype="multipart/form-data">
	<input type="hidden" name="aksi" value="tambah"/>
	<input type="hidden" name="idx" value="<?php echo $hasil['no_kk'];?>"/>
	<table width="100%" style="margin-left:10px; margin-top:5px;">
		<tr>
			<td style="color:white;">No. KK -- Kepala keluarga</td>
			<td style="color:white;"><input type="text" style="width:px;" name="txtkk" value="<?php echo $hasil['no_kk'];?>" onkeyup="javascript:if(isNaN(this.value)){this.value='0'; this.select();}" readonly /> -- <input type="text" value=" <?php echo $hasil['kepkel'];?>" readonly/></td>
		</tr>
		<tr>
			<td style="color:white;">Nama</td>
			<td><input type="text" name="txtnama" required /></td>
		</tr>
		<tr>
			<td style="color:white;">NIK/NIKS</td>
			<td><input type="text" name="txtnik" onkeyup="javascript:if(isNaN(this.value)){this.value='0'; this.select();}" required /></td>
		</tr>
		<tr>
			<td style="color:white;">Jenis kelamin</td>
			<td>
			<input type="radio" name="gender" value="L" />Laki-laki
			<input type="radio" name="gender" value="P" />Perempuan
			</td>
		</tr>
		<tr>
			<td style="color:white;">Tempat, tanggal lahir</td>
		<td>
			<input type="text" name="txttempat" required />,
					<input type="text" name="txttanggal" id="txttanggal" size="10" value="" />&nbsp;<img src="includes/popup-calendar/calendar.gif" width="24" height="12" onclick="displayCalendar(document.getElementById('txttanggal'),'dd/mm/yyyy',this)" style="cursor:pointer">
		</td>
		</tr>
		<tr>
			<td style="color:white;">Agama</td>
			<td>
				<select name="cbagama" required>
			<option value="">-->Pilih Agama<--</option>
				<?php
				$kat = mysql_query("SELECT * FROM agama ");
				while($hasil_kat = mysql_fetch_array($kat)){
					echo "<option value='$hasil_kat[id_agama]'>$hasil_kat[agama]</option>";}
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td style="color:white;">Pendidikan</td>
			<td>
				<select name="cbpendidikan" required>
			<option value="">-->Pilih Pendidikan<--</option>
				<?php
				$kat = mysql_query("SELECT * FROM pendidikan ");
				while($hasil_kat = mysql_fetch_array($kat)){
					echo "<option value='$hasil_kat[id_pendidikan]'>$hasil_kat[pendidikan]</option>";}
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td style="color:white;">Pekerjaan</td>
			<td>
				<select name="cbpekerjaan" required>
			<option value="">-->Pilih Pekerjaan<--</option>
				<?php
				$kat = mysql_query("SELECT * FROM pekerjaan ");
				while($hasil_kat = mysql_fetch_array($kat)){
					echo "<option value='$hasil_kat[id_pekerjaan]'>$hasil_kat[pekerjaan]</option>";}
				?>
			</select>
			
			</td>
		</tr>
		<tr>
			<td style="color:white;">Status kawin</td>
			<td>
			<select name="cbstatus" required>
			<option value="">-->Pilih Status<--</option>
				<?php
				$kat = mysql_query("SELECT * FROM status ");
				while($hasil_kat = mysql_fetch_array($kat)){
					echo "<option value='$hasil_kat[id_status]'>$hasil_kat[status]</option>";}
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td style="color:white;">Hubungan keluarga</td>
			<td>
				<select name="cbhubungan" required>
			<option value="">-->Pilih Hubungan<--</option>
				<?php
				$kat = mysql_query("SELECT * FROM hubungan ");
				while($hasil_kat = mysql_fetch_array($kat)){
					echo "<option value='$hasil_kat[id_hubungan]'>$hasil_kat[hubungan]</option>";}
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td style="color:white;">Kewarnegaraan</td>
			<td>
			<input type="radio" name="kewar" value="WNI" required />WNI
			<input type="radio" name="kewar" value="WNA" required />WNA
			</td>
		</tr>
		<tr>
			<td style="color:white;">No. Paspor</td>
			<td><input type="text" name="txtpa" onkeyup="javascript:if(isNaN(this.value)){this.value='0'; this.select();}"/></td>
		</tr>
		<tr>
			<td style="color:white;">No. KITAS/KITAP </td>
			<td><input type="text" name="txtki" onkeyup="javascript:if(isNaN(this.value)){this.value='0'; this.select();}"/></td>
		</tr>
		<tr>
			<td style="color:white;">Ayah</td>
			<td><input type="text" name="txtay" required /></td>
		</tr>
		<tr>
			<td style="color:white;">Ibu</td>
			<td><input type="text" name="txtib" required /></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Simpan" style= "background-color: #ABCDEF;"/>
				<input type="reset" value="Hapus" style="background-color: #ABCDEF;"/>
				<?php 
				echo "<a style='cursor:pointer;' title='Lihat Kartu Keluarga' border='0' onclick=\"javascript:window.location.href='index_petugas.php?page=lihat_kk&id=$hasil[no_kk]';\">Lihat Kartu Keluarga</a>";
				?>
			</td>
		</tr>
	</table>
</form>
</div>
</div>