<?php
include "includes/koneksi.php";
$id_pekerjaan = $_GET['id'];
$a = mysql_query("SELECT * FROM pekerjaan WHERE id_pekerjaan = '$id_pekerjaan' ");
$hasil = mysql_fetch_array($a); 
?>
<div id="container1">
<button type="button" style="margin-top:10px; margin-bottom: 5px; display:inline-block; background: url(images/user_edit.png)no-repeat right; padding-right:15px;background-color: #ABCDEF; color: #5262BA; " onclick="javascript: $('.tambah-data').slideToggle(750);">Update Data</button>
<!--<form method="POST" style="display:inline-block; " action="index.php?page=pekerjaan">
	<input type="text" name="txtcari" placeholder="Searching Data...."/>
	<input type="submit" style="color: #5262BA; background: url(images/b_search.png)no-repeat right; background-color: #ABCDEF; " value=""/>
</form>-->
<div class="tambah-data" style="width:250px; height:65px; border:1px solid #123ABC; border-radius:10px; background-color: #4D5B67;">
<form method="POST" action="index.php?page=pekerjaan_proses" enctype="multipapekerjaan/form-data">
	<input type="hidden" name="aksi" value="edit"/>
	<input type="hidden" name="idx" value="<?php echo $hasil['id_pekerjaan']?>"/>
	<table width="100%" style="margin-left:10px; margin-top:5px;">
		<tr>
			<td style="color:white;">Pekerjaan</td>
			<td><input type="text" name="txtpekerjaan" value="<?php echo $hasil['pekerjaan'];?>" required/></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="Update" style= "background-color: #ABCDEF;"/>
				<input type="reset" value="Cancel" style="background-color: #ABCDEF;"/>
				<a href="index.php?page=pekerjaan">Back</a>
			</td>
		</tr>
	</table>
</form>
</div>
<h3>Data Pekerjaan</h3>
<table class="table">
	<tr class="table-header">
		<th width="">No.</th>
		<th width="">Pekerjaan</th>
	</tr>
	<?php
	//Langkah 1 : Tentukan /cari banyak total data
	$jumlah = mysql_query("SELECT * FROM pekerjaan");
	$total = mysql_num_rows($jumlah);
	
	//Langkah 2 : Tentukan Banyaknya data perhalaman yang diinginkan
	$data = 10;
	
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
	$a = mysql_query("SELECT id_pekerjaan, pekerjaan FROM pekerjaan WHERE pekerjaan LIKE '%$katakunci%' ORDER BY id_pekerjaan ASC LIMIT $start, $data");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='2' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			echo "<td align='center'>$b[pekerjaan]</td>";
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
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=pekerjaan_edit&start=".($start-$data)."'>Prev</a>";
}

//Link untuk masing-masing halamannya
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index.php?page=pekerjaan_edit&start=$x'>".($i+1)."</a>]";
	}
}

//Link untuk Next
if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=pekerjaan_edit&start=".($start+$data)."'>Next</a>";
}
?>
</div>