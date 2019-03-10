<?php
include "includes/koneksi.php";
$id_jenis = $_GET['id'];
$a = mysql_query("SELECT * FROM jenis_iuran WHERE id_jenis_iuran = '$id_jenis' ");
$hasil = mysql_fetch_array($a); 
?>
<div id="container1">
<button type="button" style="margin-top:10px; margin-bottom: 5px; display:inline-block; background: url(images/user_edit.png)no-repeat right; padding-right:15px;background-color: #ABCDEF; color: #5262BA; " onclick="javascript: $('.tambah-data').slideToggle(750);">Update Data</button>
<!--<form method="POST" style="display:inline-block; " action="index.php?page=jenis">
	<input type="text" name="txtcari" placeholder="Searching Data...."/>
	<input type="submit" style="color: #5262BA; background: url(images/b_search.png)no-repeat right; background-color: #ABCDEF; " value=""/>
</form>-->
<div class="tambah-data" style="width:250px; height:85px; border:1px solid #123ABC; border-radius:10px; background-color: #4D5B67;">
<form method="POST" action="index.php?page=jenis_iuran_proses" enctype="multipart/form-data">
	<input type="hidden" name="aksi" value="edit"/>
	<input type="hidden" name="idx" value="<?php echo $hasil['id_jenis_iuran']?>"/>
	<table width="100%" style="margin-left:10px; margin-top:5px;">
		<tr>
			<td style="color:white;">Jenis</td>
			<td><input type="text" name="txtjenis" value="<?php echo $hasil['jenis_iuran'];?>" required/></td>
		</tr>
		<tr>
			<td style="color:white;">Jumlah</td>
			<td style="color:white;">Rp.<input type="text" name="txtjumlah" value="<?php echo $hasil['jumlah'];?>"onkeyup="javascript:if(isNaN(this.value)){this.value='0'; this.select();}" required /></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Update" style= "background-color: #ABCDEF;"/>
				<input type="reset" value="Cancel" style="background-color: #ABCDEF;"/>
				<a href="index.php?page=jenis_iuran">Back</a>
			</td>
		</tr>
	</table>
</form>
</div>
<h3>Data jenis</h3>
<table class="table">
	<tr class="table-header">
		<th width="">No.</th>
		<th width="">Jenis Iuran</th>
		<th width="">Jumlah</th>
	</tr>
	<?php
	//Langkah 1 : Tentukan /cari banyak total data
	$jumlah = mysql_query("SELECT * FROM jenis_iuran");
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
	$a = mysql_query("SELECT id_jenis_iuran, jenis_iuran, jumlah FROM jenis_iuran ORDER BY id_jenis_iuran ASC LIMIT $start, $data");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='3' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			echo "<td align='center'>$b[jenis_iuran]</td>";
			echo "<td align='center'>$b[jumlah]</td>";
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
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=jenis_edit&start=".($start-$data)."'>Prev</a>";
}

//Link untuk masing-masing halamannya
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index.php?page=jenis_edit&start=$x'>".($i+1)."</a>]";
	}
}

//Link untuk Next
if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=jenis_edit&start=".($start+$data)."'>Next</a>";
}
?>
</div>