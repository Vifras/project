<?php
error_reporting(0)or die (mysql_error());
include "../admin/includes/koneksi.php"; 
switch($_REQUEST['aksi'])
{
	case 'tambah' :
$c 		= mysql_query("SELECT id_surat AS idx FROM surat ORDER BY cast(substring(id_surat,6)AS decimal) desc limit 0,1 ");
$d 		= mysql_fetch_array($c);
$idmax 	=$d['idx'];
$idangka= substr($idmax,5);
$id 	= $idangka + 1;
$idsurat= "surat".$id;

$idx		=	$_POST['idx'];
$nik		=	$_POST['cbnik'];
$nama		=	$_POST['nama'];
$alamat		= 	$_POST['alamat'];
$pekerjaan 	= 	$_POST['pekerjaan'];
$gender		=	$_POST['gender'];
$tempat 	= 	$_POST['tempat'];
$tanggal 	=	$_POST['tanggal'];
$agama 		= 	$_POST['agama'];
$kawin 		= 	$_POST['kawin'];
$kewar 		= 	$_POST['kewar'];
$keperluan	=	$_POST['keperluan'];
$a = mysql_query("INSERT INTO surat VALUES('$idx','$idsurat','$nik','$nama','$alamat','$pekerjaan','$gender','$tempat','$tanggal','$agama','$kawin','$kewar','$keperluan','".date('Y-m-d')."')");
if ($a == true){
	echo "<script>alert('Selamat data telah tersimpan !');</script>";
	echo "<script>window.open('warga/surat_cetak.php?id=$idsurat', '_blank');</script>";
	}else{
	echo "<script>alert('Maaf, input gagal');</script>";
	}
	break;

case "jumlah" :
	$idx = @$_REQUEST['id'];
	// echo "select nama,gender,tempat_lahir,tanggal_lahir,id_agama,id_pekerjaan,kewar from penduduk where nik = '$idx'";
	list($nama, $alamat, $pekerjaan ,$gender, $tempat, $tanggal, $agama, $kawin, $kewar) = mysql_fetch_row(mysql_query("SELECT A.nama,B.alamat,C.pekerjaan,A.gender,A.tempat_lahir,A.tanggal_lahir,D.agama,E.status,A.kewar FROM penduduk AS A INNER JOIN keluarga AS B INNER JOIN pekerjaan AS C INNER JOIN agama AS D INNER JOIN status AS E ON (A.no_kk=B.no_kk) AND (A.id_pekerjaan=C.id_pekerjaan) AND (A.id_agama=D.id_agama) AND (A.id_status=E.id_status) where nik = '$idx' "));
	echo "<script>
	document.getElementById('nama').value='$nama';
	document.getElementById('alamat').value='$alamat';
	document.getElementById('pekerjaan').value='$pekerjaan';
	document.getElementById('genderL').value='$gender';
	document.getElementById('genderP').value='$gender';
	document.getElementById('tempat').value='$tempat';
	document.getElementById('tanggal').value='$tanggal';
	document.getElementById('agama').value='$agama';
	document.getElementById('kawin').value='$kawin';
	document.getElementById('kewar').value='$kewar';
	</script>";
	break;
}
?>
<meta http-equiv="refresh" content="1;url=index.php?page=tutorial"/>