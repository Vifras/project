<div id="container1">
<?php if(!isset($_SESSION['nik_rt'])) { ?>
<button type="button" style="background: url(images/plus.gif) no-repeat right; padding-right: 10px; margin-top:10px; display:inline-block; background-color: #ABCDEF; color: #5262BA;"  onclick="javascript: alert('Maaf, Anda harus login sebagai RT');">Tambah Data</button>
<?php }else{ ?>
<button type="button" style="background: url(images/plus.gif) no-repeat right; padding-right: 10px; margin-top:10px; display:inline-block; background-color: #ABCDEF; color: #5262BA;" onclick="javascript: $('.tambah-data').slideToggle(750);">Tambah Data</button>
<?php } ?>
<form method="POST" style="display:inline-block; " action="index_petugas.php?page=keluarga">
	<?php
	if(isset($_POST['txtcari'])){
		$katakunci = $_POST['txtcari'];
	}else{
		$katakunci = "";
	}
	?>
	<input type="text" name="txtcari" autocomplete="off" value="<?php echo $katakunci; ?>" onclick="this.select();"/>
	<input type="submit" style="color: #5262BA; background: url(images/b_search.png)no-repeat right; background-color: #ABCDEF; " value=""/>
</form>
<div class="tambah-data" style="display:none; width:300px; height:355px; border:1px solid #123ABC; border-radius:10px; background-color: #4D5B67;">
<form method="POST" action="index_petugas.php?page=keluarga_proses" enctype="multipart/form-data">
	<input type="hidden" name="aksi" value="tambah"/>
	<table width="100%" style="margin-left:10px; margin-top:5px;">
		<tr>
			<td style="color:white;">No. KK</td>
			<td><input type="text" name="txtkk" onkeyup="javascript:if(isNaN(this.value)){this.value='0'; this.select();}" required /></td>
		</tr>
		<tr>
			<td style="color:white;">Jenis KK/Keluarga</td>
			<td>
			<select name="cbjenis" required>
			<option value="">----->Pilih Jenis<-----</option>
				<?php
				$kat = mysql_query("SELECT * FROM jenis_keluarga ");
				while($hasil_kat = mysql_fetch_array($kat)){
					echo "<option value='$hasil_kat[id_jenis_keluarga]'>$hasil_kat[jenis_keluarga]</option>";}
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td style="color:white;">Kepala keluarga</td>
			<td><input type="text" name="txtkep" required /></td>
		</tr>
		<tr>
			<td style="color:white;">Alamat</td>
			<td><textarea name="txtalamat" cols="16" rows="2" required> </textarea></td>
		</tr>
		<tr>
			<td style="color:white;">RT</td>
			<td><input type="text" name="txtrt" onkeyup="javascript:if(isNaN(this.value)){this.value='0'; this.select();}" /></td>
		</tr>
		<tr>
			<td style="color:white;">RW</td>
			<td><input type="text" name="txtrw" onkeyup="javascript:if(isNaN(this.value)){this.value='0'; this.select();}" /></td>
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
				<input type="submit" value="Simpan" style= "background-color: #ABCDEF;"/>
				<input type="reset" value="Hapus" style="background-color: #ABCDEF;"/>
			</td>
		</tr>
	</table>
</form>
</div>
<h3>Data Keluarga</h3>
<table class="table">
	<tr class="table-header">
		<th width="">No.</th>
		<th width="">No. KK</th>
		<th width="">Kepala Keluarga</th>
		<th width="">Kelurahan</th>
		<th width="">Kecamatan</th>
		<th width="">Kota/Kabupaten</th>
		<th width="">Propinsi</th>
		<th width="">View</th>
	</tr>
	<?php
	//Langkah 1 : Tentukan /cari banyak total data
	$jumlah = mysql_query("SELECT * FROM keluarga");
	$total = mysql_num_rows($jumlah);
	
	//Langkah 2 : Tentukan Banyaknya data perhalaman yang diinginkan
	$data = 5;
	
	//Langkah 3 : cari banyaknya halaman
	$hal = ceil($total/$data);
	
	//Langkah 4 : merubah query dengan menggunakan batas/limit
	if(isset($_GET['start'])){
		$start = $_GET['start'];
	}else{
		$start = 0;
	}
	
	if(isset($_POST['txtcari'])){
		$katakunci = $_POST['txtcari'];
	}else{
		$katakunci = "";
	}
	$a = mysql_query("SELECT no_kk, kepkel, alamat, rt, rw, kelurahan, kecamatan, kota, kode_pos, propinsi FROM keluarga WHERE no_kk LIKE '%$katakunci%' OR kepkel LIKE '%$katakunci%' OR alamat LIKE '%$katakunci%' OR kelurahan LIKE '%$katakunci%' OR kecamatan LIKE '%$katakunci%' OR kota LIKE '%$katakunci%' OR kode_pos LIKE '%$katakunci%' OR propinsi LIKE '%$katakunci%' ORDER BY no_kk ASC LIMIT $start, $data"
		);
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='14' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>",$b['no_kk'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:blue'><i>".$katakunci."</i></b>",$b['kepkel'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>",$b['kelurahan'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:green'><i>".$katakunci."</i></b>",$b['kecamatan'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:blue'><i>".$katakunci."</i></b>",$b['kota'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>",$b['propinsi'])."</td>";
			if(!isset($_SESSION['nik_rt'])) {
			echo "<td align='center'><a onclick=\"javascript: alert('Maaf, Anda harus login sebagai RT');\"><img src='images/b_browse.png' title='Lihat' border='0' ></a></td>";
			}else{
			echo "<td align='center'><img src='images/b_browse.png' title='Lihat' border='0' onclick=\"javascript:window.location.href='index_petugas.php?page=lihat_kk&id=$b[no_kk]';\"></td>";
			}
			echo "</tr>";
			$no++;
		}
	}		
	?>
</table>
<?php 
//Langkah 5 = Buat link pagingnya
echo "Total Kepala Keluarga = $total data";
//Link untuk Prev
echo "<center>";
if($start !=0){
	echo "&nbsp;<a style='font-size:17px' href='index_petugas.php?page=keluarga&start=".($start-$data)."'>Prev</a>";
}

//Link untuk masing-masing halamannya
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index_petugas.php?page=keluarga&start=$x'>".($i+1)."</a>]";
	}
}

//Link untuk Next
if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index_petugas.php?page=keluarga&start=".($start+$data)."'>Next</a>";
}
?>
</div>