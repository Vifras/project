<?php
include "includes/koneksi.php";
?>
<div id="container1">
<button type="button" style="background: url(images/plus.gif) no-repeat right; padding-right: 10px; margin-top:10px; display:inline-block; background-color: #ABCDEF; color: #5262BA;" onclick="javascript: $('.tambah-data').slideToggle(750);">Tambah Data</button>
<form method="POST" style="display:inline-block; " action="index.php?page=rt">
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
<div class="tambah-data" style="display:none; width:325px; height:230px; border:1px solid #123ABC; border-radius:10px; background-color: #4D5B67;">
<form method="POST" action="index.php?page=rt_proses" enctype="multipart/form-data">
	<input type="hidden" name="aksi" value="tambah"/>
	<table width="100%" style="margin-left:10px; margin-top:5px;">
		<tr>
			<td style="color:white;">NIK</td>
			<td><input type="text" name="txtnik" onkeyup="javascript:if(isNaN(this.value)){this.value='0'; this.select();}" required /></td>
		</tr>
		<tr>
			<td style="color:white;">Foto</td>
			<td><input type="file" name="filefoto" required /></td>
		</tr>
		<tr>
			<td style="color:white;">RW</td>
			<td>
			<select name="cbrw" required>
			<option value="">-->Pilih RW<--</option>
				<?php
				$kat = mysql_query("SELECT nik_rw, foto, rw, nama, alamat FROM rw ");
				while($hasil_kat = mysql_fetch_array($kat)){
					echo "<option value='$hasil_kat[nik_rw]'>$hasil_kat[rw]</option>";}
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td style="color:white;">RT</td>
			<td><input type="text" name="txtrt" onkeyup="javascript:if(isNaN(this.value)){this.value='0'; this.select();}" required /></td>
		</tr>
		<tr>
			<td style="color:white;">Nama</td>
			<td><input type="text" name="txtnama" required /></td>
		</tr>
		<tr>
			<td style="color:white;">Alamat</td>
			<td><textarea name="txtalamat" required> </textarea></td>
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
<h3>Data Kepala RT</h3>
<table class="table">
	<tr class="table-header">
		<th width="">No.</th>
		<th width="">NIK</th>
		<th width="">Foto</th>
		<th widht="">RW</th>
		<th width="">RT</th>
		<th width="">Nama</th>
		<th width="">Alamat</th>
		<th width="">Edit</th>
		<th width="">Hapus</th>
	</tr>
	<?php
	//Langkah 1 : Tentukan /cari banyak total data
	$jumlah = mysql_query("SELECT * FROM rt");
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
	$a = mysql_query("
	SELECT A.nik_rt, A.foto, B.rw, A.rt, A.nama, A.alamat 
	FROM rt As A 
		INNER JOIN rw As B 
			ON ( A.nik_rw = B.nik_rw ) 
		WHERE A.nik_rt LIKE '%$katakunci%' OR 
			  B.rw LIKE '%$katakunci%' OR A.rt LIKE '%$katakunci%' OR A.nama LIKE '%$katakunci%' OR A.alamat LIKE '%$katakunci%'
		ORDER BY A.nik_rt ASC LIMIT $start, $data
		");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='14' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:red'><i>".$katakunci."</i></b>",$b['nik_rt'])."</td>";
			echo "<td align='center'><img src='$b[foto]' width='50' height='50'/></td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:yellow'><i>".$katakunci."</i></b>",$b['rw'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:blue'><i>".$katakunci."</i></b>",$b['rt'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:green'><i>".$katakunci."</i></b>",$b['nama'])."</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:green'><i>".$katakunci."</i></b>",$b['alamat'])."</td>";
			echo "<td align='center'><img src='images/b_edit.png' title='Edit' border='0' onclick=\"javascript:window.location.href='index.php?page=rt_edit&id=$b[nik_rt]';\"></td>";
			echo "<td align='center'> <img src='images/trash.png' title='Hapus' border='0' onclick=\"javascript: if(confirm('Data ingin dihapus ?')==true){window.location.href='index.php?page=rt_proses&id=$b[nik_rt]&aksi=hapus';}\"/></td>";
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
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=rt&start=".($start-$data)."'>Prev</a>";
}

//Link untuk masing-masing halamannya
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index.php?page=rt&start=$x'>".($i+1)."</a>]";
	}
}

//Link untuk Next
if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=rt&start=".($start+$data)."'>Next</a>";
}
?>
</div>