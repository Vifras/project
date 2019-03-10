<?php
//$halaman = (isset($_GET['page'])) ? $_GET['page'] : "";
if(isset($_GET['page'])){
	$halaman = $_GET['page'];
}else{
	$halaman = "";
}
Switch($halaman){
	case 'admin' 			: include "admin.php"; break;
	case 'admin_proses'		: Include "admin_proses.php"; break;

	case 'rw' 				: include "rw.php"; break;
	case 'rw_proses' 		: include "rw_proses.php"; break;
	case 'rw_edit'			: include "rw_edit.php"; break;

	case 'rt' 				: include "rt.php"; break;
	case 'rt_proses' 		: include "rt_proses.php"; break;
	case 'rt_edit'			: include "rt_edit.php"; break;

	case 'bendahara' 		: include "bendahara.php"; break;
	case 'bendahara_proses' : include "bendahara_proses.php"; break;
	case 'bendahara_edit'	: include "bendahara_edit.php"; break;

	case 'lihat_kk'			: include "lihat_kk.php";	break;
	case 'keluarga'			: include "keluarga.php"; break;
	case 'keluarga_proses' 	: include "keluarga_proses.php"; break;
	case 'keluarga_edit' 	: include "keluarga_edit.php"; break;
	
	case 'pekerjaan'		: include "pekerjaan.php"; break;
	case 'pekerjaan_proses' 	: include "pekerjaan_proses.php"; break;
	case 'pekerjaan_edit' 		: include "pekerjaan_edit.php"; break;

	case 'agama' 			: include "agama.php"; break;
	case 'agama_proses' 	: include "agama_proses.php"; break;
	case 'agama_edit' 		: include "agama_edit.php"; break;

	case 'penduduk'			: include "penduduk.php"; break;
	case 'penduduk_tambah'	: include "penduduk_tambah.php"; break;
	case 'penduduk_proses' 	: include "penduduk_proses.php"; break;
	case 'penduduk_edit' 	: include "penduduk_edit.php"; break;
	
	case 'iuran_keluarga' 	: include "iuran_keluarga.php"; break;
	case 'jenis_iuran'		: include "jenis_iuran.php"; break;
	case 'jenis_iuran_proses' : include "jenis_iuran_proses.php"; break;
	case 'jenis_edit'		: include "jenis_edit.php"; break;
	case 'lihat_iuran'		: include "lihat_iuran.php"; break;
	case 'iuran_tambah'		: include "iuran_tambah.php"; break;
	case 'iuran_proses' 	: include "iuran_proses.php"; break;
	case 'iuran_edit' 		: include "iuran_edit.php"; break;
	case '_iuran'			: include "_iuran.php"; break;
	case '_iuran_proses'	: include "_iuran_proses.php"; break;
	case '_iuran_lunas'		: include "_iuran_lunas.php"; break;

	case 'kegiatan' 		: include "kegiatan.php"; break;
	case 'kegiatan_proses' 	: include "kegiatan_proses.php"; break;
	case 'kegiatan_edit' 	: include "kegiatan_edit.php"; break;

	case 'pengumuman'		: include "pengumuman.php"; break;
	case 'lihat_pengumuman'	: include "lihat_pengumuman.php"; break;
	case 'tambahpengumuman' : include "tambahpengumuman.php"; break;
	case 'pengumuman_proses': include "pengumuman_proses.php"; break;
	case 'pengumuman_edit'	: include "pengumuman_edit.php"; break;

	case 'profil'			: include "profil.php"; break;
	case 'profil_tambah'	: include "profil_tambah.php"; break;
	case 'profil_proses'	: include "profil_proses.php"; break;
	case 'profil_edit'		: include "profil_edit.php"; break;

	case 'eksekutif'		: include "eksekutif.php"; break;
	case 'tambaheksekutif'	: include "tambaheksekutif.php"; break;
	case 'eksekutif_proses' : include "eksekutif_proses.php"; break;
	case 'eksekutif_edit'	: include "eksekutif_edit.php"; break;

	case 'album'			: include "album.php"; break;
	case 'album_edit'		: include "album_edit.php"; break;
	case 'album_proses'		: include "album_proses.php"; break;
	case 'lihat_album'		: include "lihat_album.php"; break;
	case 'album_detail_edit'	: include "album_detail_edit.php"; break;
	case 'album_detail_proses' 	: include "album_detail_proses.php"; break;

	case 'laporanPenduduk' 	: include "laporanPenduduk.php"; break;

	case 'laporanIuran'		: include "laporanIuran.php"; break;
	case 'rekapIuran'		: include "rekapIuran.php"; break;
	case 'rekapIuran_proses': include "rekapIuran_proses.php"; break;

	//case 'iuran1'			: include "iuran1.php"; break;

	//case 'iuran2'			: include "iuran2.php";
		break;
	case 'surat'			: include "surat.php"; break;
	case 'lihat_surat'		: include "lihat_surat.php"; break;
	default : include "home.php"; break;
}
?>