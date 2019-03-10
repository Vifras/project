-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 21, 2017 at 12:20 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ukk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE IF NOT EXISTS `agama` (
  `id_agama` int(11) NOT NULL AUTO_INCREMENT,
  `agama` varchar(30) NOT NULL,
  PRIMARY KEY (`id_agama`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
(1, 'Hindu'),
(2, 'Islam'),
(4, 'Kristen'),
(5, 'Budha'),
(6, 'Katolik'),
(7, 'Kong Hu Cou');

-- --------------------------------------------------------

--
-- Table structure for table `bendahara`
--

CREATE TABLE IF NOT EXISTS `bendahara` (
  `nik_benda` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nik_rt` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  PRIMARY KEY (`nik_benda`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bendahara`
--

INSERT INTO `bendahara` (`nik_benda`, `foto`, `nik_rt`, `nama`, `jenis`, `alamat`) VALUES
('10987654321', 'foto/Koala.jpg', '0987654321', 'Araku', 'Petugas Entry', 'Lebak Jaya Utara IV A Rawasan 43 '),
('11223344556677', 'foto/Penguins.jpg', '0987654321', 'Mawa', 'Petugas Tagih', 'Lebak Jaya');

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE IF NOT EXISTS `bulan` (
  `id_bulan` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_bulan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `eksekutif`
--

CREATE TABLE IF NOT EXISTS `eksekutif` (
  `id_eksekutif` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  PRIMARY KEY (`id_eksekutif`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `eksekutif`
--

INSERT INTO `eksekutif` (`id_eksekutif`, `nama`, `alamat`, `id_jabatan`) VALUES
(2, 'Alif Rachmad Kurniawan', '', 1),
(3, 'Mawa', 'Lebak Jaya Utara IV A Rawasan 43', 2),
(4, 'Arach', '', 3),
(5, 'Yui', '', 4),
(6, 'Araku', '', 5),
(7, 'Afif Faras', 'Lebak Jaya Utara IV A Rawasan No. 43', 6);

-- --------------------------------------------------------

--
-- Table structure for table `hubungan`
--

CREATE TABLE IF NOT EXISTS `hubungan` (
  `id_hubungan` varchar(10) NOT NULL,
  `hubungan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_hubungan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hubungan`
--

INSERT INTO `hubungan` (`id_hubungan`, `hubungan`) VALUES
('1', 'Kepala Keluarga'),
('2', 'Suami'),
('3', 'Istri'),
('4', 'Anak'),
('5', 'Menantu'),
('6', 'Cucu'),
('7', 'Orang Tua'),
('8', 'Mertua'),
('9', 'Famili Lain'),
('10', 'Pembantu');

-- --------------------------------------------------------

--
-- Table structure for table `iuran`
--

CREATE TABLE IF NOT EXISTS `iuran` (
  `no_kk` varchar(20) NOT NULL,
  `id_iuran` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` char(2) NOT NULL,
  `tahun` year(4) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `id_jenis_iuran` int(11) NOT NULL,
  `jumlah` double NOT NULL,
  PRIMARY KEY (`id_iuran`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `iuran`
--


-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Ketua RW'),
(2, 'Ketua RT'),
(3, 'Wakil Ketua RT'),
(4, 'Sekretaris'),
(5, 'Bendahara'),
(6, 'Bidang Keamanan'),
(7, 'Bidang Kebersihan'),
(8, 'Bidang Pemuda'),
(9, 'Bidang Sarana & Prasarana'),
(10, 'Bidang Humas'),
(11, 'Bidang Agama & Sosial'),
(12, 'Bidang Khusus Rukun Kematian'),
(13, 'Kelompok Kerja (POKJA)');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_iuran`
--

CREATE TABLE IF NOT EXISTS `jenis_iuran` (
  `id_jenis_iuran` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_iuran` varchar(20) NOT NULL,
  `jumlah` float NOT NULL,
  PRIMARY KEY (`id_jenis_iuran`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jenis_iuran`
--

INSERT INTO `jenis_iuran` (`id_jenis_iuran`, `jenis_iuran`, `jumlah`) VALUES
(1, 'Wajib', 10000),
(2, 'Sukarela / Sumbangan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_keluarga`
--

CREATE TABLE IF NOT EXISTS `jenis_keluarga` (
  `id_jenis_keluarga` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_keluarga` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jenis_keluarga`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jenis_keluarga`
--

INSERT INTO `jenis_keluarga` (`id_jenis_keluarga`, `jenis_keluarga`) VALUES
(1, 'Tetap'),
(2, 'KK Tidak Berdomisili'),
(3, 'Kontrak'),
(4, 'Kost');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE IF NOT EXISTS `kegiatan` (
  `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `perihal` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`id_kegiatan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `perihal`, `nama`, `tanggal_kegiatan`, `isi`) VALUES
(5, 'Kerja Bakti Kampung', 'Bpk. Yanto', '2017-01-08', '<p>Kerja bakti mulai jam 8 sampai selesai, bagi yang tidak mengikuti wajib membayar iuran sebesar Rp. 10.000,-. terima kasih.</p>'),
(11, 'Presentasi UKK', 'Admin', '2017-01-25', '<p>Siap - siap semua tinggal 3 minggu menuju UKK :D</p>'),
(8, 'Makan Besar', 'Bpk. Yusron', '2017-01-15', '<p>Rumah Bapak Yusron, makan soto daging Wachid setelah sholat isya.</p>'),
(9, 'wew', 'alif', '2017-01-14', '<p>ashdkahskjasdkhjahsdjhakjsdhjashdhasjkdasdhak</p>'),
(10, 'wew', 'alif', '2017-01-14', '<p>askhdkjashkdhashdjahks</p>');

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE IF NOT EXISTS `keluarga` (
  `no_kk` varchar(20) NOT NULL,
  `id_jenis_keluarga` int(11) NOT NULL,
  `kepkel` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `kelurahan` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `kode_pos` varchar(20) NOT NULL,
  `propinsi` varchar(20) NOT NULL,
  PRIMARY KEY (`no_kk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`no_kk`, `id_jenis_keluarga`, `kepkel`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kota`, `kode_pos`, `propinsi`) VALUES
('12345678910', 3, 'Alif Rachmad Kurniawan', 'Lebak Jaya Utara IVA Rawasan No.44 ', '01', '01', 'Dukuh Setro', 'Tambaksari', 'Surabaya', '60138', 'Jawa Timur'),
('10987654321', 4, 'Rachmad Kurniawan', 'Lebak Jaya Utara IV A Rawasan 43', '04', '05', 'Dukuh Setro', 'Tambaksari', 'Surabaya', '60138', 'Jawa Timur'),
('091209312', 1, 'Achmad Chasan', 'JL Rembang 74 B ', '01', '04', 'Dupak', 'Krembangan', 'Surabaya', '60138', 'Jawa Timur'),
('2907432908', 1, 'Sutrisno', 'Putat Jaya C Timur 45 ', '03', '05', 'Sawahan', 'Sawahan', 'Surabaya', '60138', 'Jawa Timur');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE IF NOT EXISTS `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT,
  `pekerjaan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pekerjaan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `pekerjaan`) VALUES
(2, 'Belum/Tidak Bekerja'),
(4, 'Mengurus Rumah Tangga'),
(5, 'Pelajar/Mahasiswa'),
(6, 'Pensiunan'),
(7, 'Pegawai Negeri Sipil ( PNS)'),
(8, 'Tentara Nasional Indonesia (TNI)'),
(9, 'Kepolisian RI (Polri)'),
(10, 'Perdagangan'),
(11, 'Petani/Pekebun'),
(12, 'Ternak'),
(13, 'Nelayan/Perikanan'),
(14, 'Industri'),
(15, 'Konstruksi'),
(16, 'Transportasi'),
(17, 'Karyawan Swasta'),
(18, 'Karyawan BUMN'),
(19, 'Karyawan BUMD'),
(20, 'Karyawan Honorer'),
(21, 'Buruh Harian Lepas'),
(22, 'Buruh Tani/Perkebunan'),
(23, 'Buruh Nelayan/Perikanan'),
(24, 'Buruh Peternakan'),
(25, 'Pembantu Rumah Tangga'),
(26, 'Tukang Cukur'),
(27, 'Tukang Listrik'),
(28, 'Tukang Batu'),
(29, 'Tukang Kayu'),
(30, 'Tukang Sol Sepatu'),
(31, 'Tukang Las/Pandai besi'),
(32, 'Tukang Jahit'),
(33, 'Tukang Gigi'),
(34, 'Penata Rias'),
(35, 'Penata Busana'),
(36, 'Penata Rambut'),
(37, 'Mekanik'),
(38, 'Seniman'),
(39, 'Tabib'),
(40, 'Paraji'),
(41, 'Perancang Busana'),
(42, 'Penerjemah'),
(43, 'Imam Masjid'),
(44, 'Pendeta'),
(45, 'Pastor'),
(46, 'Wartawan'),
(47, 'Ustadz/Mubaligh'),
(48, 'Juru Masak'),
(49, 'Promotor Acara'),
(50, 'Anggota DPR'),
(51, 'Anggota DPD'),
(52, 'Anggota BPK'),
(53, 'Presiden'),
(54, 'Wakil Presiden'),
(55, 'Anggota Mahkamah Konstitusi'),
(56, 'Anggota Kabinet/Kementrian'),
(57, 'Duta Besar'),
(58, 'Gubernur'),
(59, 'Wakil Gubernur'),
(60, 'Bupati'),
(61, 'Wakil Bupati'),
(62, 'Walikota'),
(63, 'Wakil Walikota'),
(64, 'Anggota DPRD Prop'),
(65, 'Anggota DPRD Kab/kota'),
(66, 'Dosen'),
(67, 'Guru'),
(68, 'Pilot'),
(69, 'Pengacara'),
(70, 'Notaris'),
(71, 'Arsitek'),
(72, 'Akuntan'),
(73, ' Konsultan'),
(74, 'Dokter'),
(75, 'Bidan'),
(76, 'Pegawai'),
(77, 'Apoteker'),
(78, 'Psikiater/Psikolog'),
(79, 'Penyiar Televisi'),
(80, 'Penyiar Radio'),
(81, 'Pelaut'),
(82, 'Penulis'),
(83, 'Sopir'),
(84, 'Pialang'),
(85, 'Paranormal'),
(86, 'Pedagang'),
(87, 'Perangkat Desa'),
(88, 'Kepala Desa'),
(89, 'Biarawati'),
(90, 'Wiraswasta'),
(91, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE IF NOT EXISTS `pendidikan` (
  `id_pendidikan` varchar(10) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pendidikan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `pendidikan`) VALUES
('1', 'Tidak/Belum Sekolah'),
('2', 'Tidak Tamat SD/Sederajat'),
('3', 'Tamat SD/Sederajat'),
('4', 'SLTP/Sederajat'),
('5', 'SLTA/Sederajat'),
('6', 'Diploma I/II'),
('7', 'Akademi/Diploma III/S. Muda'),
('8', 'Diploma IV/Strata I'),
('9', 'Strata II'),
('10', 'Strata III');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE IF NOT EXISTS `penduduk` (
  `no_kk` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_agama` int(11) NOT NULL,
  `id_pendidikan` varchar(10) NOT NULL,
  `id_pekerjaan` int(11) NOT NULL,
  `id_status` varchar(10) NOT NULL,
  `id_hubungan` varchar(10) NOT NULL,
  `kewar` varchar(50) NOT NULL,
  `no_paspor` varchar(20) NOT NULL,
  `no_kitaskitap` varchar(20) NOT NULL,
  `ayah` varchar(30) NOT NULL,
  `ibu` varchar(30) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`no_kk`, `nik`, `nama`, `gender`, `tempat_lahir`, `tanggal_lahir`, `id_agama`, `id_pendidikan`, `id_pekerjaan`, `id_status`, `id_hubungan`, `kewar`, `no_paspor`, `no_kitaskitap`, `ayah`, `ibu`) VALUES
('12345678910', '1234567890', 'Mawa Yui', 'P', 'Japan', '2001-02-05', 2, '10', 2, '2', '3', 'WNA', '', '', 'Hanato Ryu', 'Hanato Ise'),
('10987654321', '1234567891011', 'Alif', 'L', 'Surabaya', '1999-01-07', 2, '5', 2, '1', '4', 'WNI', '', '', 'Rachmad Kurniawan', 'Fitriyah Azizah'),
('12345678910', '1234567891012', 'Aoai Mawa', 'P', 'Japan', '2017-05-06', 2, '1', 2, '1', '4', 'WNA', '', '', ' Alif Rachmad Kurniawan', 'Yui Hanato'),
('091209312', '10293810', 'Wiwik Sagita', 'P', 'Samarinda', '1981-05-04', 2, '5', 2, '2', '3', 'WNI', '', '', 'Alm. Atim', 'Yuyun Tumena'),
('091209312', '127391', 'Ary Ichsan P', 'L', 'Surabaya', '1999-11-10', 7, '5', 2, '1', '4', 'WNI', '', '', 'Achmad Achsan', 'Wiwik Sagita'),
('091209312', '0000001', 'Achmad Chasan', 'L', 'Surabaya', '1985-02-21', 2, '5', 16, '2', '2', 'WNI', '', '', 'saya', 'saya');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE IF NOT EXISTS `pengumuman` (
  `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `pengumuman` text NOT NULL,
  `pengirim` varchar(30) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_pengumuman`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul`, `pengumuman`, `pengirim`, `date`) VALUES
(3, 'Tinymce', '<p style="border: 0px; font-family: ''Lucida Grande'', Arial, ''Lucida Sans Unicode'', sans-serif; font-size: 13px; margin: 0px 0px 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: #666666; background-color: #efefef; text-align: justify;">Web designer mana yang tak kenal dengan <strong>TinyMCE</strong> ??? Menurut saya pasti hampir semua web designer menggunakan TinyMCE untuk aplikasi webnya, baik itu aplikasi berita, komentar dll. Nah bagi yang belum tau tentang TinyMCE, mari kita lihat pengertiannya dari situs resminya. Neh sekilas tentang TinyMCE dari situs resminya :</p>\r\n<p style="border: 0px; font-family: ''Lucida Grande'', Arial, ''Lucida Sans Unicode'', sans-serif; font-size: 13px; margin: 0px 0px 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: #666666; background-color: #efefef; text-align: justify;">TinyMCE is a platform independent web based Javascript HTML WYSIWYG editor control released as Open Source under LGPL by Moxiecode Systems AB. TinyMCE has the ability to convert HTML TEXTAREA fields or other HTML elements to editor instances. TinyMCE is very easy to integrate into other Content Management Systems. (&nbsp;<a style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: #000000; text-decoration-line: none;" href="http://tinymce.moxiecode.com/">http://tinymce.moxiecode.com/</a>&nbsp;)</p>', 'Admin', '2016-12-31'),
(2, 'Mancing Mania !!! Mantap...', '<p>Ayo ikuti !!! langsung daftar ke <span style="text-decoration: underline;"><strong><em>Bpk. Yudhi</em></strong></span>... lho</p>', 'Admin', '2016-12-27'),
(4, 'Welcome to XAMPP for Windows Version 1.7.1 !', '<p><strong style="font-family: verdana, helvetica; font-size: 12px;">Congratulations:<br />You have successfully installed XAMPP on this system!</strong></p>\r\n<p style="font-family: verdana, helvetica; font-size: 12px;">Now you can start using Apache and Co. You should first try &raquo;Status&laquo; on the left navigation to make sure everything works fine.</p>\r\n<p style="font-family: verdana, helvetica; font-size: 12px;">For OpenSSL support please use the test certificate with&nbsp;<a style="color: #bb3902;" href="https://127.0.0.1/" target="_top">https://127.0.0.1</a>&nbsp;or&nbsp;<a style="color: #bb3902;" href="https://localhost/" target="_top">https://localhost</a></p>\r\n<p style="font-family: verdana, helvetica; font-size: 12px;">For this release a special thanks to&nbsp;<a style="color: #bb3902;" href="http://www.php.net/credits.php" target="_new">Uwe Steinmann</a>&nbsp;for his excellent development and compilation of all current "Special" modules!</p>\r\n<p style="font-family: verdana, helvetica; font-size: 12px;">Good luck, Kay Vogelgesang + Kai ''Oswald'' Seidler</p>', 'Admin', '2016-12-26'),
(10, 'Iuran Wajib Kampung', '<p>Assalamualikum wr. wb.</p>\r\n<p>Setiap warga wajib menyetorkan iuran paling lambat tanggal 5 setiap bulannya, pengurus bendahara akan memberikan surat teguran jika terdapat tunggakan.</p>\r\n<p>Terima kasih atas perhatiannya,</p>\r\n<p>Wassalamualikum wr. wb.</p>\r\n<p>Bpk. Araku</p>', 'Bendahara', '2017-01-10'),
(13, 'Tentang Kami', '<p><span style="color: black;">Clothing Store adalah butik online yang menyediakan berbagai koleksi baju terkini dengan harga yang sangat terjangkau. Kami menyediakan berbagai model baju untuk pria dan wanita. Dengan harga yang sangat murah, namun tetap tidak menomorduakan kualitas. Selain itu kini kami melangkapi koleksi kami dengan baju-baju impor namun tetap dengan harga terjangkau. Segera nikmati kemudahan berbelanja tanpa batas di mana pun Anda berada.</span></p>', 'Admin', '2017-01-11'),
(14, 'Cara Pemesanan', '<p><span style="font-family: verdana; font-size: small;"><span style="color: black;"><span style="font-family: verdana; font-size: small;">\r\n<ul>\r\n<li>\r\n<p align="justify">Langkah pertama yang harus Anda lakukan adalah Login dengan menggunakan nama pengguna dan sandi yang telah Anda daftarkan sebelumnya.</p>\r\n</li>\r\n<li>Klik pada tombol&nbsp;<span style="font-weight: bold;">Beli</span> pada produk yang ingin Anda pesan.</li>\r\n<li>\r\n<p align="justify">Produk yang Anda pesan akan masuk ke dalam <span style="font-weight: bold;">Keranjang Belanja</span>. Anda dapat melakukan perubahan jumlah produk yang diinginkan dengan mengganti angka di kolom <span style="font-weight: bold;">Jumlah</span>, kemudian klik tombol <span style="font-weight: bold;">Update</span>. Sedangkan untuk menghapus sebuah produk dari Keranjang Belanja, klik tombol Kali yang berada di kolom paling kanan.</p>\r\n</li>\r\n<li>\r\n<p align="justify">Jika sudah selesai, klik tombol <span style="font-weight: bold;">Selesai</span>, maka akan tampil form untuk pengisian data kustomer/pembeli.</p>\r\n</li>\r\n<li>\r\n<p align="justify">Setelah data pembeli selesai diisikan, klik tombol <span style="font-weight: bold;">Proses</span>, maka akan tampil data pembeli beserta produk yang dipesan (jika diperlukan catat nomor ordernya). Dan juga ada total pembayaran serta nomor rekening pembayaran.</p>\r\n</li>\r\n<li>\r\n<p align="justify">Lakukan pembayaran melalui transfer ke rekening bank kami (tambahkan angka unik pada saat transfer, misal: Rp 2.000.000 menjadi Rp 2.000.088 untuk memudahkan pengecekan dalam rekening kami) :</p>\r\n<ul>\r\n<li><span style="font-weight: bold;">BCA</span> 0331490252 an: Suwondo</li>\r\n<li><span style="font-weight: bold;">Mandiri</span> 1440012113475 an: Suwondo</li>\r\n<li><span style="font-weight: bold;">BNI</span> 0050365393 an: Suwondo</li>\r\n<li><span style="font-weight: bold;">BRI</span> 320701018697533 an: Suwondo</li>\r\n</ul>\r\n</li>\r\n<li>\r\n<p align="justify">Apabila pembayaran telah terlaksana, kami akan memproses pengiriman produk yang anda pesan</p>\r\n</li>\r\n</ul>\r\n</span></span></span></p>', 'Admin', '2017-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik_rt` varchar(20) NOT NULL,
  `nik_rw` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kelurahan` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `kodepos` varchar(20) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `nik_rt`, `nik_rw`, `alamat`, `kelurahan`, `kecamatan`, `kota`, `kodepos`, `provinsi`) VALUES
(0, '0987654321', '1234567890', 'Lebak Jaya Utara IV A Rawasan     ', 'Dukuh Setro', 'Tambaksari', 'Surabaya', '60138', 'Jawa Timur');

-- --------------------------------------------------------

--
-- Table structure for table `rt`
--

CREATE TABLE IF NOT EXISTS `rt` (
  `nik_rt` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nik_rw` varchar(20) NOT NULL,
  `rt` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  PRIMARY KEY (`nik_rt`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rt`
--

INSERT INTO `rt` (`nik_rt`, `foto`, `nik_rw`, `rt`, `nama`, `alamat`) VALUES
('0987654321', 'foto/DSC_0872.JPG', '1234567890', '04', 'Mawa', 'Lebak Jaya Utara IV A Rawasan 43');

-- --------------------------------------------------------

--
-- Table structure for table `rw`
--

CREATE TABLE IF NOT EXISTS `rw` (
  `nik_rw` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  PRIMARY KEY (`nik_rw`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rw`
--

INSERT INTO `rw` (`nik_rw`, `foto`, `rw`, `nama`, `alamat`) VALUES
('1234567890', 'foto/Koala.jpg', '05', 'Alif', 'Lebak Jaya Utara IV A Rawasan ');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id_status` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
('1', 'Belum Kawin'),
('2', 'Kawin'),
('3', 'Cerai Hidup'),
('4', 'Cerai Mati');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE IF NOT EXISTS `surat` (
  `no_kk` varchar(20) NOT NULL,
  `id_surat` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pekerjaan` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `kawin` varchar(20) NOT NULL,
  `kewar` varchar(20) NOT NULL,
  `keperluan` text NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`no_kk`, `id_surat`, `nik`, `nama`, `alamat`, `pekerjaan`, `gender`, `tempat`, `tanggal`, `agama`, `kawin`, `kewar`, `keperluan`) VALUES
('12345678910', 'surat1', '1234567890', 'a', 'a', 'a', 'Laki-laki', 'a', '0000-00-00', 'a', 'a', 'a', 'a'),
('12345678910', 'surat2', '1234567890', 'a', 'a', 'a', 'Laki-laki', 'a', '0000-00-00', 'a', 'a', 'a', 'aa'),
('12345678910', 'surat3', '1234567890', 'Alif', 'Lebak Jaya Utara IV A Rawasan 43', 'Siswa', 'Laki-laki', 'Surabaya', '1999-07-01', 'Islam', 'Tidak Kawi', 'WNI', 'Buat KTP Baru'),
('12345678910', 'surat4', '1234567890', 'Alif Rachmad Kurniawan', 'Lebak Jaya Utara IV A Rawasan 43', 'Siswa', 'Laki-laki', 'Surabaya', '1999-07-01', 'Islam', 'Tidak Kawi', 'WNI', 'Pembuatan KTP baru'),
('12345678910', 'surat5', '1234567890', 'Alif Rachmad Kurniawan', 'Lebak Jaya Utara IV A Rawasan 43', 'Siswa', 'Laki-laki', 'Surabaya', '1999-07-01', 'Islam', 'Tidak Kawin', 'WNI', 'Buat KTP baru');
