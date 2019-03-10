<?php
include "includes/koneksi.php";
$id_iuran 	= $_GET['id'];
$a 			= mysql_query("SELECT A.*, B.kepkel FROM iuran AS A INNER JOIN keluarga AS B ON (A.no_kk = B.no_kk) WHERE id_iuran = '$id_iuran' ");
$result	= mysql_fetch_array($a);
?>
<div id="container1">
<h3>Edit Data Iuran</h3>
<hr>
<div class="tambah-data" style=" width:535px; height:150px; border:1px solid #123ABC; border-radius:10px; background-color: #4D5B67;">
<form method="POST" action="index_petugas.php?page=iuran_proses" enctype="multipart/form-data">
	<input type="hidden" name="aksi" value="edit"/>
	<input type="hidden" name="idix" value="<?php echo $result['id_iuran'];?>"/>
	<input type="hidden" name="idx" value="<?php echo $result['no_kk'] ?>">
	<table width="100%" style="margin-left:10px; margin-top:5px;">
		<tr>
			<td style="color:white;">No. KK -- Kepala keluarga</td>
			<td style="color:white;"><input type="text" style="width:px;" name="txtkk" value="<?php echo $result['no_kk'];?>" onkeyup="javascript:if(isNaN(this.value)){this.value='0'; this.select();}" readonly /> -- <input type="text" value=" <?php echo $result['kepkel'];?>" readonly/></td>
		</tr>
		<tr>
			<td style="color:white;">Bulan</td>
			<td>
				<select name="cbbulan" required>
			<option value="">-->Pilih Bulan<--</option>
				<?php
				$kat = mysql_query("SELECT * FROM bulan ORDER BY id_bulan ASC");
				while($hasil_kat = mysql_fetch_array($kat)){
				echo "<option value='$hasil_kat[id_bulan]'";
					if($result['id_bulan']==$hasil_kat['id_bulan'])echo "selected";
					echo ">$hasil_kat[bulan]</option>;";
					}
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td style="color:white;">Jenis Iuran</td>
			<td>
				<select name="cbjenis" required>
			<option value="">-->Pilih Jenis<--</option>
				<?php
				$kat = mysql_query("SELECT * FROM jenis_iuran ORDER BY id_jenis_iuran ASC");
				while($hasil_kat = mysql_fetch_array($kat)){
				echo "<option value='$hasil_kat[id_jenis_iuran]'";
					if($result['id_jenis_iuran']==$hasil_kat['id_jenis_iuran'])echo "selected";
					echo ">$hasil_kat[jenis_iuran]</option>;";
					}
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td style="color:white;">Bayar</td>
			<td style="color:white;">Rp. <input type="text" name="txtbayar" value="<?php echo $result['bayar'];?>" onkeyup="javascript:if(isNaN(this.value)){this.value='0'; this.select();}" /></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Simpan" style= "background-color: #ABCDEF;"/>
				<input type="reset" value="Hapus" style="background-color: #ABCDEF;"/>
				<?php 
				echo "<a style='cursor:pointer;' title='Lihat Iuran' border='0' onclick=\"javascript:window.location.href='index_petugas.php?page=lihat_iuran&id=$result[no_kk]';\">Lihat Iuran</a>";
				?>
			</td>
		</tr>
	</table>
</form>
</div>
</div>