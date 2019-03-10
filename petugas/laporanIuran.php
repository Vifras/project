<?php
$a = mysql_query("SELECT SUM(bayar) AS bayar FROM _iuran");
$b = mysql_fetch_array($a);

// if(@$_POST['submit']){
switch($_REQUEST['aksi']){
	case 'tambah':
	$bayar		= $_POST['txtbayar'];
		$ket   		= $_POST['txtket'];
		$tanggal	= ExplodeDate($_POST['txttanggal']);
		$type		= $_POST['jenis'];
		$sal_akhir 	= mysql_query("SELECT saldo FROM _lap_iuran ORDER BY id DESC LIMIT 0, 1");
		$akhir 		= mysql_fetch_array($sal_akhir);
		$akh 		= $akhir['saldo'];
		if($type=='keluar'){
			$saldo	= $akh - $bayar;
		}elseif($type=='masuk'){
			$saldo 	= $akh + $bayar;
		}
		$a = mysql_query("INSERT INTO _lap_iuran SET $type = '$bayar', tgl = '$tanggal', ket='$ket', saldo='$saldo'");
		if ($a == true){
		echo "<script>alert('Tambah Berhasil');</script>";
		echo "<script>window.location.href='index_petugas.php?page=laporanIuran';</script>";
		}else{
		echo "<script>alert('Tambah Gagal');</script>";
		echo "<script>window.location.href='index_petugas.php?page=laporanIuran';</script>";
		}
		break;
	case 'edit':
	// $idx		= $_POST['idx'];
	// $bayar		= $_POST['txtbayar'];
	// $ket   		= $_POST['txtket'];
	// $tanggal	= ExplodeDate($_POST['txttanggal']);
	// $type		= $_POST['jenis'];
	// $sal_akhir 	= mysql_query("SELECT saldo FROM _lap_iuran ORDER BY id DESC LIMIT 0, 1");
	// $akhir 		= mysql_fetch_array($sal_akhir);
	// $akh 		= $akhir['saldo'];
	// if($type=='keluar'){
	// 	$saldo	= $akh - $bayar;
	// }elseif($type=='masuk'){
	// 	$saldo 	= $akh + $bayar;
	// }
	// echo "UPDATE _lap_iuran SET tgl = '$tanggal', ket = '$ket', $type = '$bayar', saldo = '$saldo' WHERE id = '$idx' ";
	// $b	= mysql_query("UPDATE _lap_iuran SET tgl = '$tanggal', ket = '$ket', $type = '$bayar', saldo = '$saldo' WHERE id = '$idx' ");
	// if ($b== true){
	// echo "<script>alert('Hapus Berhasil');</script>";
	// echo "<meta http-equiv='refresh' content='1;url=index_petugas.php?page=laporanIuran'/>";
	// }else{
	// echo "<script>alert('Hapus Gagal');</script>";
	// echo "<meta http-equiv='refresh' content='1;url=index_petugas.php?page=laporanIuran'/>";
	//  	}
	break;

	case 'hapus':
	$id = @$_REQUEST['id'];
	$query = mysql_query("DELETE FROM _lap_iuran WHERE id = '$id' ");
	//echo "DELETE * FROM _lap_iuran WHERE id = '$id'";
	if ($query == true){
	echo "<script>alert('Hapus Berhasil');</script>";
	echo "<script>window.location.href='index_petugas.php?page=laporanIuran';</script>";
	}else{
	echo "<script>alert('Hapus Gagal');</script>";
	echo "<script>window.location.href='index_petugas.php?page=laporanIuran';</script>";
	}
	break;
}
// }
?>
<style type="text/css">
	tr:nth-child(even) {background-color: #f2f2f2}
</style>
<script type='text/javascript'>
    function cek_ok(){
        var valu=document.forms['form']['jenis'].value;
        if(valu=='pilih'){
            document.forms['form']['submit'].disabled=true;
        }else{
            document.forms['form']['submit'].disabled=false;
        }
    }
</script>
<div id="container1">
<h3>Data Transaksi Laporan Iuran</h3>
<hr>
<?php
/*	if(isset($_POST['submit'])) {
		$bayar		= $_POST['txtbayar'];
		$ket   		= $_POST['txtket'];
		$tanggal	= ExplodeDate($_POST['txttanggal']);
		$type		= $_POST['jenis'];
		$sal_akhir 	= mysql_query("SELECT saldo FROM _lap_iuran ORDER BY id DESC LIMIT 0, 1");
		$akhir 		= mysql_fetch_array($sal_akhir);
		$akh 		= $akhir['saldo'];
		if($type=='keluar'){
			$saldo	= $akh - $bayar;
		}elseif($type=='masuk'){
			$saldo 	= $akh + $bayar;
		}
		mysql_query("INSERT INTO _lap_iuran SET $type = '$bayar', tgl = '$tanggal', ket='$ket', saldo='$saldo'");
	}
*/
/*$id 	= @$_REQUEST['id'];
$edit 	= mysql_query("SELECT * FROM _lap_iuran WHERE id = '$id' ");
$que 	= mysql_fetch_array($edit);*/
?>
<form method="POST" name="form" action="index_petugas.php?page=laporanIuran">
<input type="hidden" name="aksi" value="tambah">
<!-- <input type="hidden" name="aksi" value="edit"> -->
<!-- <input type="text" name="idx" value="<?php //echo $que[id]; ?>"> -->
<label>Rp.</label>&nbsp;<input type="text" value="<?php if($que[masuk]=='0'){echo $que[keluar];}else{echo $que[masuk];}
	 ?>
	" onkeyup="javascript:if(isNaN(this.value)){this.value='0'; this.select();}" style="width:75px;" name="txtbayar" value="" required/> | 
<label>Keterangan</label>&nbsp;<input value="<?php echo $que[ket] ?>" style="width:250px;" type="text" name="txtket" required/>
<select name="jenis" onchange="cek_ok()">
 			<option value='pilih'>Pilih</option>
            <option value='keluar'>Keluar</option>
            <option value='masuk'>Masuk</option>
</select>
<input type="text" style="width:75px;" id="txttanggal" value="<?php echo ImplodeDate($que['tgl']); ?>" name="txttanggal" required/>&nbsp;<img src="includes/popup-calendar/calendar.gif" width="24" height="12" onclick="displayCalendar(document.getElementById('txttanggal'),'dd/mm/yyyy',this)" style="cursor:pointer" >
<input type="submit" value="Ok" name="submit">
<input type="reset" value="Clear" />
</form>
<table class="table" style="margin-top: 5px;">
<tr class="table-header">
	<th>No.</th>
	<th>Tanggal</th>
	<th>Keterangan</th>
	<th>Keluar</th>
	<th>Masuk</th>
	<th>Saldo</th>
	<th colspan="">Proses</th>
</tr>
<?php
	$jumlah = mysql_query("SELECT * FROM _lap_iuran");
	$total = mysql_num_rows($jumlah);
	$data = 50;
	$hal = ceil($total/$data);

		if(isset($_GET['start'])){
			$start = $_GET['start'];
		}else{
			$start = 0;
		}

	$a = mysql_query("SELECT * FROM _lap_iuran ORDER BY tgl ASC LIMIT $start, $data");
	$jumlah = mysql_num_rows($a);
	if($jumlah == 0){
		echo "<tr><td colspan='7' align='center'><b>Belum ada data</b></td></tr>";
	}else{
		$no=$start+1;
		while($b = mysql_fetch_array($a)){
		$data_date=$b['tgl'];
	    $tgl_ind=substr($data_date,8,2)."-".substr($data_date,5,2)."-".substr($data_date,0,4);
			echo "<tr>";
			echo "<td align='center'>$no.</td>";
			echo "<td align='center'>$tgl_ind</td>";
			echo "<td>$b[ket]</td>";
			echo "<td align='center'>$b[keluar]</td>";
			echo "<td align='center'>$b[masuk]</td>";
			echo "<td align='center'>$b[saldo]</td>";
			// echo "<td align='right'><img src='images/b_browse.png' title='Lihat' border='0' onclick=\"javascript:window.location.href='index_petugas.php?page=lihat_laporanIuran&id=$b[id_laporanIuran]';\"></td>";
			//echo "<td align='center'><img src='images/b_edit.png' title='Edit' border='0' onclick=\"javascript:window.location.href='index_petugas.php?page=laporanIuran&id=$b[id]';\"></td>";
			echo "<td align='center'> <img src='images/trash.png' title='Hapus' border='0' onclick=\"javascript: if(confirm('Data ingin dihapus ?')==true){window.location.href='index_petugas.php?page=laporanIuran&id=$b[id]&aksi=hapus';}\"/></td>";
			echo "</tr>";
			$no++;
		}
	}	
		$i=mysql_query('SELECT sum(masuk) as masuk FROM _lap_iuran');
		$j=mysql_fetch_array($i);
		$masuk = $j['masuk'];
		$k=mysql_query('SELECT sum(keluar) as keluar FROM _lap_iuran');
		$l=mysql_fetch_array($k);	
		$keluar = $l['keluar'];
	?>
	<tr style="color:white;background-color: grey;">
	<td colspan='3'>Total</td>
	<td align="center">Rp. <?php echo $keluar;?></td>
	<td align="center">Rp. <?php echo $masuk;?></td>
	<td align="center">Rp. <?php echo $masuk-$keluar; ?></td>
	<td></td>
	</tr>
</table>
<?php 
echo "<center>";
if($start !=0){
	echo "&nbsp;<a style='font-size:17px' href='index_petugas.php?page=laporanIuran&start=".($start-$data)."'>Prev</a>";
}

for ($i=0; $i<$hal; $i++){
	$x = $i * $data;
	if($start == $x){
		echo "[".($i+1)."]";
	}else{
		echo "&nbsp;[<a href='index_petugas.php?page=laporanIuran&start=$x'>".($i+1)."</a>]";
	}
}

if($start != $x){
	echo "&nbsp;<a style='font-size:17px' href='index_petugas.php?page=laporanIuran&start=".($start+$data)."'>Next</a>";
}
?>