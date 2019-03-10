<?php
include "includes/koneksi.php";
$nik_benda = $_GET['id'];
$a = mysql_query("SELECT nik_benda, foto, nik_rt, nama,jenis, alamat FROM bendahara WHERE nik_benda = '$nik_benda' ");
$hasil = mysql_fetch_array($a); 
?>
<div id="container1">
<button type="button" style="margin-top:10px; margin-bottom: 5px; display:inline-block; background: url(images/user_edit.png)no-repeat right; padding-right:15px;background-color: #ABCDEF; color: #5262BA; " onclick="javascript: $('.tambah-data').slideToggle(750);">Update Data</button>
<!--<form method="POST" style="display:inline-block; " action="index.php?page=bendahara">
	<input type="text" name="txtcari" placeholder="Searching Data...."/>
	<input type="submit" style="color: #5262BA; background: url(images/b_search.png)no-repeat right; background-color: #ABCDEF; " value=""/>
</form>-->
<div class="tambah-data" style="width:325px; height:285px; border:1px solid #123ABC; border-radius:10px; background-color: #4D5B67;">
<form method="POST" action="index.php?page=bendahara_proses" enctype="multipart/form-data">
	<input type="hidden" name="aksi" value="edit"/>
	<input type="hidden" name="idx" value="<?php echo $hasil['nik_benda']?>"/>
	<table width="100%" style="margin-left:10px; margin-top:5px;">
		<tr>
			<td style="color:white;">NIK</td>
			<td><input type="text" name="txtnik" value="<?php echo $hasil['nik_benda'];?>" onkeyup="javascript:if(isNaN(this.value)){this.value='0'; this.select();}" required /></td>
		</tr>
		<tr>
			<td style="color:white;">Foto</td>
			<td colspan="2" width="10px">
		<?php
				if(file_exists($hasil['foto'])==true){
					echo "<img src='$hasil[foto]' width='50' height='50' id='foto' />";
					}
				?>
		<input type="checkbox" name="cekfoto" value="ganti" onclick="javascript: if(this.checked==true){ document.getElementById('foto').style.display='none'; }else{ document.getElementById('foto').style.display='block'; }" /> Centang untuk ganti foto
		<input type="file" name="filefoto"/>
		</td>
		</tr>
		<tr>
			<td style="color:white;">RT</td>
			<td>
				<select name="cbrt" required>
				<option value="">--Pilih RT--</option>
				<?php
				$kat = mysql_query("SELECT nik_rt, foto, nik_rw, rt, nama, alamat FROM rt ORDER BY rt ASC");
				while($hasil_kat = mysql_fetch_array($kat)){
				echo "<option value='$hasil_kat[nik_rt]'";
					if($hasil['nik_rt']==$hasil_kat['nik_rt'])echo "selected";
					echo ">$hasil_kat[rt]</option>;";
					}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td style="color:white;">Nama</td>
			<td><input type="text" name="txtnama" value="<?php echo $hasil['nama'];?>" required/></td>
		</tr>
		<tr>
		<td style="color:white;">Jenis Bendahara</td>
		<td style="color:white;"><input type="radio" name="jenis" value="Petugas Entry" <?php if($hasil['jenis']=='Petugas Entry') echo "checked"; ?> />Petugas Entry
			<input type="radio" name="jenis" value="Petugas Tagih" <?php if($hasil['jenis']=='Petugas Tagih') echo "checked"; ?>  />Petugas Tagih</td>
		</tr>
		<tr>
			<td style="color:white;">Alamat</td>
			<td><textarea name ="txtalamat" value="" required><?php echo $hasil['alamat'];?></textarea></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Update" style= "background-color: #ABCDEF;"/>
				<input type="reset" value="Cancel" style="background-color: #ABCDEF;"/>
				<a href="index.php?page=bendahara">Back</a>
			</td>
		</tr>
	</table>
</form>
</div>
<h3>Data Bendahara</h3>
<table class="table">
	<tr class="table-header">
		<th width="">No.</th>
		<th width="">NIK</th>
		<th width="">Foto</th>
		<th width="">RT</th>
		<th width="">Nama</th>
		<th width="">Jenis</th>
		<th width="">Alamat</th>
	</tr>
	<?php
	//Langkah 1 : Tentukan /cari banyak total data
	$jumlah = mysql_query("SELECT * FROM bendahara");
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
	?>
	<?php 
	$a = mysql_query("
	SELECT A.nik_benda, A.foto, B.rt, A.nama, A.jenis, A.alamat 
	FROM bendahara As A 
		INNER JOIN rt As B 
			ON ( A.nik_rt = B.nik_rt ) 
		WHERE A.nik_benda LIKE '%$katakunci%' OR 
			  B.rt LIKE '%$katakunci%' OR A.nama LIKE '%$katakunci%' OR A.alamat LIKE '%$katakunci%'
		ORDER BY A.nik_benda ASC LIMIT $start, $data
		");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='8' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			echo "<td align='center'>$b[nik_benda]</td>";
			echo "<td align='center'><img src='$b[foto]' width='50' height='50'/></td>";
			echo "<td align='center'>$b[rt]</td>";
			echo "<td align='center'>$b[nama]</td>";
			echo "<td align='center'>$b[jenis]</td>";
			echo "<td align='center'>$b[alamat]</td>";
			echo "</tr>";
			$no++;
		}
	}		
	?>
</table>
<?php 
//Langkah 5 = Buat link pagingnya
echo "Total data yang ditampilkan = $total Data";
//Link untuk Prev
echo "<center>";
if($start !=0){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=bendahara_edit&start=".($start-$data)."'>Prev</a>";
}

//Link untuk masing-masing halamannya
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index.php?page=bendahara_edit&start=$x'>".($i+1)."</a>]";
	}
}

//Link untuk Next
if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=bendahara_edit&start=".($start+$data)."'>Next</a>";
}
?>
</div>