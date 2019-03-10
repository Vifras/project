<?php
// include "includes/koneksi.php";
$album = $_GET['id'];
$a = mysql_query("SELECT id, nama FROM album WHERE id = '$album' ");
$hasil = mysql_fetch_array($a); 
?>
<div id="container1">
<button type="button" style="margin-top:10px; margin-bottom: 5px; display:inline-block; background: url(images/user_edit.png)no-repeat right; padding-right:15px;background-color: #ABCDEF; color: #5262BA; " onclick="javascript: $('.tambah-data').slideToggle(750);">Update Data</button>
<div class="tambah-data" style="width:325px; height:65px; border:1px solid #123ABC; border-radius:10px; background-color: #4D5B67;">
<form method="POST" action="index_petugas.php?page=album_proses" enctype="multipart/form-data">
	<input type="hidden" name="aksi" value="edit"/>
	<input type="hidden" name="idx" value="<?php echo $hasil['id']?>"/>
	<table width="100%" style="margin-left:10px; margin-top:5px;">
		<tr>
			<td style="color:white;">Nama</td>
			<td><input type="text" name="txtnama" value="<?php echo $hasil['nama'];?>" required/></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Update" style= "background-color: #ABCDEF;"/>
				<input type="reset" value="Cancel" style="background-color: #ABCDEF;"/>
				<a href="index_petugas.php?page=album">Back</a>
			</td>
		</tr>
	</table>
</form>
</div>
<h3>Data Album</h3>
<table class="table">
	<tr class="table-header">
		<th width="">No.</th>
		<th width="">Foto</th>
		<th width="">Nama</th>
	</tr>
	<?php
	//Langkah 1 : Tentukan /cari banyak total data
	$jumlah = mysql_query("SELECT * FROM album");
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
	$a = mysql_query("SELECT id, nama FROM album ORDER BY id ASC LIMIT $start, $data");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='6' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=1;
		while($b = mysql_fetch_array($a)){
		$c = $b[0];
		$d = mysql_query("SELECT * FROM album_detil WHERE id = '$c' ORDER BY RAND()");
		$e = mysql_fetch_array($d);
		$f = mysql_num_rows($d);
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			if($f == 0){
			echo "<td align='center'><img src='images/no-image.jpg' width='100' height='100'/></td>";
			}else{
			echo "<td align='center'><img src='$e[foto]' width='100' height='100'/></td>";
			}
			echo "<td align='center'>$b[nama]</td>";
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
	echo "&nbsp;<a style='font-size:17px' href='index_petugas.php?page=album_edit&start=".($start-$data)."'>Prev</a>";
}

//Link untuk masing-masing halamannya
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index_petugas.php?page=album_edit&start=$x'>".($i+1)."</a>]";
	}
}

//Link untuk Next
if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index_petugas.php?page=album_edit&start=".($start+$data)."'>Next</a>";
}
?>
</div>