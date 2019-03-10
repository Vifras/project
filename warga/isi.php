<?php
//$halaman = (isset($_GET['page'])) ? $_GET['page'] : "";
if(isset($_GET['page'])){
	$halaman = $_GET['page'];
}else{
	$halaman = "";
}
Switch($halaman){
	
	case 'pengumuman' 	: include "pengumuman.php";  break;
	case 'pengumuman_proses' : include "pengumuman_proses.php"; break;
	case 'kegiatan'		: include "kegiatan.php"; break;
	case 'kegiatanv'	: include "kegiatanv.php";	break;
	case 'kegiatan_proses' : include "kegiatan_proses.php"; break;
	case 'profil'		: include "profil.php"; break;
	case 'eksekutif'	: include "eksekutif.php"; break;
	case 'album'		: include "album.php"; break;
	case 'album_detil'	: include "album_detil.php"; break;
	case 'surat'		: include "surat.php"; break;
	case 'surat_proses'	: include "surat_proses.php"; break;
	case 'surat_cetak'	: include "surat_cetak.php"; break;
	case 'print_surat'	: include "print_surat.php"; break;
	case 'data_surat'	: include "data_surat.php"; break;
	case 'tutorial'		: include "tutorial.php"; break;
	case 'kk_cetak'		: include "kk_cetak.php"; break;
	case 'iuran'		: include "iuran.php"; break;
	case 'lap_iuran' 	: include "lap_iuran.php"; break;
	default : include "home.php"; break;
}
?>