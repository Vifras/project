<?php
include "includes/koneksi.php";
?><h3>Data Admin</h3>
<hr>
<style type="text/css">
tr:nth-child(even) {background-color: #f2f2f2}
</style>
<form method="POST" style="display:inline-block;" action="index.php?page=admin">
	<?php
	if(isset($_POST['txtcari'])){
		$katakunci = $_POST['txtcari'];
	}else{
		$katakunci = "";
	}
	?>
	Pencarian : <input type="text" name="txtcari" autocomplete="off" value="<?php echo $katakunci; ?>" onclick="this.select();"/>
	<input type="submit" style="color: #5262BA;  background: url(images/search.png)no-repeat right; background-color: #ABCDEF; " value=""/>
</form>
<table class="table" style="margin-top:-10px;">
	<tr class="table-header">
		<th width="">No.</th>
		<th width="">Username</th>
		<!-- <th width="">Hapus</th> -->
	</tr>
	<?php
	//Langkah 1 : Tentukan /cari banyak total data
	$jumlah = mysql_query("SELECT * FROM admin");
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
	$a = mysql_query("SELECT id, username FROM admin WHERE username LIKE '%$katakunci%' ORDER BY username ASC LIMIT $start, $data");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='3' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			echo "<td align='center'>".str_replace($katakunci, "<b style='color:orange'><i>".$katakunci."</i></b>",$b['username'])."</td>";
			//echo "<td align='center'> <img src='images/trash.png' title='Hapus' border='0' onclick=\"javascript: if(confirm('apakah data mau dihapus ?')==true){window.location.href='index.php?page=admin_proses&id=$b[id]&aksi=hapus';}\"/></td>";
			//echo "<td align='center'><button type='button' onclick=\"javascript: if(confirm('apakah data mau dihapus ?')==true){window.location.href='index.php?page=admin_proses&id=$b[id]&aksi=hapus';}\">Hapus</button></td>";
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
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=admin&start=".($start-$data)."'>Prev</a>";
}

//Link untuk masing-masing halamannya
for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index.php?page=admin&start=$x'>".($i+1)."</a>]";
	}
}

//Link untuk Next
if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index.php?page=admin&start=".($start+$data)."'>Next</a>";
}
?>
