<?php
include "includes/koneksi.php";
$nik_rw = $_GET['id'];
$a = mysql_query("SELECT nik_rw, foto, rw, nama, alamat FROM rw WHERE nik_rw = '$nik_rw' ");
$hasil = mysql_fetch_array($a); 
?>
<div id="container1">
<button type="button" style="margin-top:10px; margin-bottom: 5px; display:inline-block; background: url(images/user_edit.png)no-repeat right; padding-right:15px;background-color: #ABCDEF; color: #5262BA; " onclick="javascript: $('.tambah-data').slideToggle(750);">Update Data</button>
<!--<form method="POST" style="display:inline-block; " action="index.php?page=rw">
	<input type="text" name="txtcari" placeholder="Searching Data...."/>
	<input type="submit" style="color: #5262BA; background: url(images/b_search.png)no-repeat right; background-color: #ABCDEF; " value=""/>
</form>-->
<div class="tambah-data" style="width:325px; height:265px; border:1px solid #123ABC; border-radius:10px; background-color: #4D5B67;">
<form method="POST" action="index.php?page=rw_proses" enctype="multipart/form-data">
	<input type="hidden" name="aksi" value="edit"/>
	<input type="hidden" name="idx" value="<?php echo $hasil['nik_rw']?>"/>
	<table width="100%" style="margin-left:10px; margin-top:5px;">
		<tr>
			<td style="color:white;">NIK</td>
			<td><input type="text" name="txtnik" onkeyup="javascript:if(isNaN(this.value)){this.value='0'; this.select();}" value="<?php echo $hasil['nik_rw'];?>" required /></td>
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
			<td style="color:white;">RW</td>
			<td><input type="text" name="txtrw" onkeyup="javascript:if(isNaN(this.value)){this.value='0'; this.select();}" value="<?php echo $hasil['rw'];?>" required/></td>
		</tr>
		<tr>
			<td style="color:white;">Nama</td>
			<td><input type="text" name="txtnama" value="<?php echo $hasil['nama'];?>" required/></td>
		</tr>
		<tr>
			<td style="color:white;">Alamat</td>
			<td><textarea name ="txtalamat" value="" required><?php echo $hasil['alamat'];?></textarea></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Update" style= "background-color: #ABCDEF;"/>
				<input type="reset" value="Cancel" style="background-color: #ABCDEF;"/>
				<a href="index.php?page=rw">Back</a>
			</td>
		</tr>
	</table>
</form>
</div>
<h3>Data Kepala RW</h3>
<table class="table">
	<tr class="table-header">
		<th width="">No.</th>
		<th width="">NIK</th>
		<th width="">Foto</th>
		<th width="">RW</th>
		<th width="">Nama</th>
		<th width="">Alamat</th>
	</tr>
	<?php
	//Langkah 1 : Tentukan /cari banyak total data
	$jumlah = mysql_query("SELECT * FROM rw");
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
	$a = mysql_query("SELECT nik_rw, foto, rw, nama, alamat FROM rw ORDER BY nik_rw ASC LIMIT $start, $data");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='6' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			echo "<td align='center'>$b[nik_rw]</td>";
			echo "<td align='center'><img src='$b[foto]' width='50' height='50'/></td>";
			echo "<td align='center'>$b[rw]</td>";
			echo "<td align='center'>$b[nama]</td>";
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
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=rw_edit&start=".($start-$data)."'>Prev</a>";
}

//Link untuk masing-masing halamannya
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index.php?page=rw_edit&start=$x'>".($i+1)."</a>]";
	}
}

//Link untuk Next
if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=rw_edit&start=".($start+$data)."'>Next</a>";
}
?>
</div>