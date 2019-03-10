<?php
function bulan($x){
	switch($x){
		case '0' : $bln = "01"; break;
		case '1' : $bln = "02"; break;
		case '2' : $bln = "03"; break;
		case '3' : $bln = "04"; break;
		case '4' : $bln = "05"; break;
		case '5' : $bln = "06"; break;
		case '6' : $bln = "07"; break;
		case '7' : $bln = "08"; break;
		case '8' : $bln = "09"; break;
		case '9' : $bln = "10"; break;
		case '10' : $bln = "11"; break;
		case '11' : $bln = "12"; break;
	}
	return $bln;
}

switch($_REQUEST['aksi'])
{
	case 'tambah' :
		$no_kk	= $_POST['idx'];
		//mysql_query("delete from iuran where no_kk = '$no_kk' ");
		for($i=0; $i<12; $i++){
			$ids 	= $_POST['ids'.$i]; //id_iuran
			$lunas	= $_POST['lunas'.$i]; //lunas checkbox
			$tagih 	= $_POST['tagih'.$i]; //tagih petugas
			$entry	= $_POST['entry'.$i]; //entry petugas
			$bayar	= $_POST['jumlah'.$i]; //bayar
			// $total 	= $_POST['txttotal']; //jumlah
			if($lunas == ''){
				$d = mysql_query("delete from _iuran where id_iuran = '$ids' ");
			}else{
				list($cek) = mysql_fetch_row(mysql_query("select count(*) from _iuran where id_iuran = '$ids' "));
				if($cek==0){
					$a	= mysql_query("INSERT INTO _iuran VALUES('$no_kk', '', '".bulan($i)."', '".date("Y")."', NOW(), '$entry','$tagih','$bayar','$lunas')");
				}else{
					$a	= mysql_query("UPDATE _iuran SET petugas_entry = '$entry', petugas_tagih = '$tagih', bayar = '$bayar' WHERE id_iuran = '$ids' ");
				}
			}
		}		
		
		if ($a == true){
		echo "<script>alert('Input Berhasil');</script>";
		}else{
		echo "<script>alert('Hapus Berhasil');</script>";
		}
		echo "<meta http-equiv='refresh' content='1;url=index_petugas.php?page=_iuran'/>";
	break;

	/*case "jumlah" :
	$pos = @$_REQUEST['pos'];
	$idx = @$_REQUEST['idx'];
	list($jumlah) = mysql_fetch_row(mysql_query("select jumlah from jenis_iuran where id_jenis_iuran = '$idx' "));
	echo "<script>document.getElementById('txtbayar$pos').value='$jumlah';</script>";
	break;*/
}
?>
<!--<meta http-equiv="refresh" content="1;url=index.php?page=lihat_kk"/>