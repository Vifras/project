-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 04, 2017 at 10:17 PM
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
  `alamat` varchar(50) NOT NULL,
  PRIMARY KEY (`nik_benda`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bendahara`
--

INSERT INTO `bendahara` (`nik_benda`, `foto`, `nik_rt`, `nama`, `alamat`) VALUES
('10987654321', 'foto/Koala.jpg', '0987654321', 'Araku', 'Lebak Jaya Utara IV A Rawasan 43 ');

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
  `id_bulan` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `id_jenis_iuran` int(11) NOT NULL,
  `bayar` float NOT NULL,
  PRIMARY KEY (`id_iuran`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `iuran`
--

INSERT INTO `iuran` (`no_kk`, `id_iuran`, `id_bulan`, `tanggal_bayar`, `id_jenis_iuran`, `bayar`) VALUES
('12345678910', 2, 1, '2016-12-30', 1, 10000),
('10987654321', 6, 12, '2016-12-31', 2, 1000),
('10987654321', 7, 12, '2016-12-30', 1, 10000),
('10987654321', 8, 1, '2016-12-31', 1, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_iuran`
--

CREATE TABLE IF NOT EXISTS `jenis_iuran` (
  `id_jenis_iuran` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_iuran` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jenis_iuran`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jenis_iuran`
--

INSERT INTO `jenis_iuran` (`id_jenis_iuran`, `jenis_iuran`) VALUES
(1, 'Wajib'),
(2, 'Sukarela / Sumbangan');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `perihal`, `nama`, `tanggal_kegiatan`, `isi`) VALUES
(5, 'Kerja Bakti Kampung', 'Bpk. Yanto', '2017-01-08', '<p>Kerja bakti mulai jam 8 sampai selesai, bagi yang tidak mengikuti wajib membayar iuran sebesar Rp. 10.000,-. terima kasih.</p>'),
(4, 'Rapat Kartar', 'Saudara Galuh', '2017-01-06', '<p>Syukuran ba''da isya, ojok lali rek !</p>'),
(6, 'Kunjungan Wali Kota', 'Pak RW', '2017-03-05', '<p><span class="Apple-style-span" style="border-collapse: separate; color: #000000; font-family: ''Times New Roman''; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-align: -webkit-auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-border-horizontal-spacing: 0px; -webkit-border-vertical-spacing: 0px; -webkit-text-decorations-in-effect: none; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; font-size: medium;"><span class="Apple-style-span" style="border-collapse: collapse; color: #222222; font-family: verdana; font-size: 13px; line-height: 20px; text-align: justify; text-indent: 10%;">Masyarakat kelurahan empangsari diharapkan hadir di aula kelurahan empangsari, karena bapak walikota akan melakukan inspeksi rutin ke kelurahan empangsari. terima kasih sebelumnya.</span></span></p>');

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
('091209312', 1, 'Achmad Chasan', 'JL Rembang 74 B ', '01', '04', 'Dupak', 'Krembangan', 'Surabaya', '60138', 'Jawa Timur');

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
('091209312', '127391', 'Ary Ichsan P', 'L', 'Surabaya', '1999-11-10', 7, '5', 2, '1', '4', 'WNI', '', '', 'Achmad Achsan', 'Wiwik Sagita');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul`, `pengumuman`, `pengirim`, `date`) VALUES
(3, 'Tinymce', '<p style="border: 0px; font-family: ''Lucida Grande'', Arial, ''Lucida Sans Unicode'', sans-serif; font-size: 13px; margin: 0px 0px 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: #666666; background-color: #efefef; text-align: justify;">Web designer mana yang tak kenal dengan <strong>TinyMCE</strong> ??? Menurut saya pasti hampir semua web designer menggunakan TinyMCE untuk aplikasi webnya, baik itu aplikasi berita, komentar dll. Nah bagi yang belum tau tentang TinyMCE, mari kita lihat pengertiannya dari situs resminya. Neh sekilas tentang TinyMCE dari situs resminya :</p>\r\n<p style="border: 0px; font-family: ''Lucida Grande'', Arial, ''Lucida Sans Unicode'', sans-serif; font-size: 13px; margin: 0px 0px 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: #666666; background-color: #efefef; text-align: justify;">TinyMCE is a platform independent web based Javascript HTML WYSIWYG editor control released as Open Source under LGPL by Moxiecode Systems AB. TinyMCE has the ability to convert HTML TEXTAREA fields or other HTML elements to editor instances. TinyMCE is very easy to integrate into other Content Management Systems. (&nbsp;<a style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: #000000; text-decoration-line: none;" href="http://tinymce.moxiecode.com/">http://tinymce.moxiecode.com/</a>&nbsp;)</p>', 'Admin', '2016-12-31'),
(2, 'Mancing Mania !!! Mantap...', '<p>Ayo ikuti !!! langsung daftar ke <span style="text-decoration: underline;"><strong><em>Bpk. Yudhi</em></strong></span>... lho</p>', 'Admin', '2016-12-27'),
(4, 'Welcome to XAMPP for Windows Version 1.7.1 !', '<p><strong style="font-family: verdana, helvetica; font-size: 12px;">Congratulations:<br />You have successfully installed XAMPP on this system!</strong></p>\r\n<p style="font-family: verdana, helvetica; font-size: 12px;">Now you can start using Apache and Co. You should first try &raquo;Status&laquo; on the left navigation to make sure everything works fine.</p>\r\n<p style="font-family: verdana, helvetica; font-size: 12px;">For OpenSSL support please use the test certificate with&nbsp;<a style="color: #bb3902;" href="https://127.0.0.1/" target="_top">https://127.0.0.1</a>&nbsp;or&nbsp;<a style="color: #bb3902;" href="https://localhost/" target="_top">https://localhost</a></p>\r\n<p style="font-family: verdana, helvetica; font-size: 12px;">For this release a special thanks to&nbsp;<a style="color: #bb3902;" href="http://www.php.net/credits.php" target="_new">Uwe Steinmann</a>&nbsp;for his excellent development and compilation of all current "Special" modules!</p>\r\n<p style="font-family: verdana, helvetica; font-size: 12px;">Good luck, Kay Vogelgesang + Kai ''Oswald'' Seidler</p>', 'Admin', '2016-12-26'),
(6, 'Tinymce', '<p><span style="color: #666666; font-family: ''Lucida Grande'', Arial, ''Lucida Sans Unicode'', sans-serif; font-size: 13px; text-align: justify; background-color: #efefef;">TinyMCE adalah sebuah platform web editor yang dibuat berdasarkan Javascript HTML WYSIWYG (What You See Is What You Get)&nbsp; yang dikeluarkan sebagai open source dibawah lisensi LGPL oleh Moxiecode Systems AB. TinyMCE mempunyai kemampuan untuk mengkonversi TextArea HTML atau Elemen HTML lainnya menjadi tampilan teks penyunting. TinyMCE sangat mudah untuk berintergrasi dengan CMS lainnya. Untuk sekedar informasi aja, TinyMCE telah dipakai oleh Facebook, Microsoft, Apple, WordPress, Joomla, Oracle dan untuk CMS Indonesia yang menggunakannya adalah AuraCMS. Saya juga menggunakan TinyMCE untuk web sederhana yang saya buat</span><img class="emoji" style="background-color: #efefef; max-width: 100%; color: #666666; font-family: ''Lucida Grande'', Arial, ''Lucida Sans Unicode'', sans-serif; font-size: 13px; text-align: justify; display: inline !important; border: none !important; box-shadow: none !important; height: 27px; width: 27px; margin: 0px 0.07em !important; vertical-align: -0.1em !important; background-image: none !important; background-position: initial !important; background-size: initial !important; background-repeat: initial !important; background-attachment: initial !important; background-origin: initial !important; background-clip: initial !important; padding: 0px !important;" src="https://s0.wp.com/wp-content/mu-plugins/wpcom-smileys/twemoji/2/svg/1f61b.svg" alt="ðŸ˜›" /><span style="color: #666666; font-family: ''Lucida Grande'', Arial, ''Lucida Sans Unicode'', sans-serif; font-size: 13px; text-align: justify; background-color: #efefef;">&nbsp;Oke dah kita dah membahas sekilas tentang TinyMCE, yuk sekarang kita bahas cara menggunakan / menginstallnya.</span></p>', 'Admin', '2016-12-28'),
(8, 'Informasi Pelaksanaan Pemilihan Lurah', '<p style="text-align: justify; text-indent: 10%; line-height: 20px; padding: 10px; margin: 0px;">Dalam rangka pelaksanaan pemilihan lurah empangsari, sebagai tahap persiapan kami sampaikan hal-hal sebagai berikut:</p>\r\n<ol>\r\n<li>pendaftaran lurah dilaksanakan tanggal<span class="Apple-converted-space">&nbsp;</span><strong>27 Februari s.d. 2 Maret 2014</strong>,</li>\r\n<li>pendaftaran susulan dilaksanakan tanggal :<strong>4 s.d. 5 Maret 2014</strong></li>\r\n<li>Penyerahan berkas dilaksanakan :<span class="Apple-converted-space">&nbsp;</span><strong>Jumat, 15 Maret 2014 Pkl. 08.00 s.d. 11.00 di kelurahan</strong></li>\r\n</ol>\r\n<p><span class="Apple-style-span" style="border-collapse: separate; color: #000000; font-family: ''Times New Roman''; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-align: -webkit-auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-border-horizontal-spacing: 0px; -webkit-border-vertical-spacing: 0px; -webkit-text-decorations-in-effect: none; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; font-size: medium;"><span class="Apple-style-span" style="border-collapse: collapse; color: #222222; font-family: verdana; font-size: 13px; text-align: justify;">Atas perhatian dan kerjasama Bapak/Ibu kami ucapkan terima kasih</span></span></p>', 'Pak RT', '2016-12-28'),
(9, 'Pengadaan komputer untuk petugas', '<p><span class="Apple-style-span" style="border-collapse: separate; color: #000000; font-family: ''Times New Roman''; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-align: -webkit-auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-border-horizontal-spacing: 0px; -webkit-border-vertical-spacing: 0px; -webkit-text-decorations-in-effect: none; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; font-size: medium;"><span class="Apple-style-span" style="border-collapse: collapse; color: #222222; font-family: verdana; font-size: 13px; text-align: justify;">Dinas kepegawaian pada tahun 2015 menargetkan satu komputer untuk 2 petugas di tiap-tiap kelurahan di seluruh Indonesia.<span class="Apple-converted-space">&nbsp;</span><br /><br />Hal ini diakui Setditjen PMTK Depdiknas, Giri Suryatmana, sebagai salah satu usaha Diknas untuk meningkatkan mutu pengajaran di tiap-tiap sekolah lewat internet.<span class="Apple-converted-space">&nbsp;</span><br /><br />Sekarang kan satu komputer untuk 2.000 siswa, nah ke depan kita mau kejar 1 komputer 20 siswa. Targetnya pada tahun 2015 dan biayanya dari APBN, katanya seusai jumpa pers pemberian penghargaan Intel Education Award 2009 terhadap 6 orang guru di Restoran Pulau Dua, Jakarta, Minggu (16/8).<span class="Apple-converted-space">&nbsp;</span><br /><br />Menurutnya, metode belajar lewat jaringan internet saat ini amatlah penting karena akses informasi yang sedemikian cepatnya dapat diperoleh saat ini dapat diperoleh dari internet.<span class="Apple-converted-space">&nbsp;</span><br /><br />Misal di Maluku Selatan, kalau kita bangun bangunan sekolah itu akan percuma, karena enam sampai tujuh bulan ke depan sekolah itu akan kosong karena para murid akan ikut orangtuanya berlayar. Karenanya, Bupati sana mencanangkan program guru dengan laptop untuk melakukan proses belajar mengajar, katanya.<span class="Apple-converted-space">&nbsp;</span><br /><br />Untuk lebih memudahkan para guru dan siswa, pihak Diknas, menurutnya, telah memasang jaringan pendidikan nasional (Jardiknas) yang berfungsi untuk mendukung jaringan internet di seluruh sekolah di Indonesia.<span class="Apple-converted-space">&nbsp;</span><br /><br />Dari Jardiknas tersebut para guru dan siswa dapat mengunduh berbagai macam buku dan informasi belajar mengajar. Tapi memang sampai sekarang masih ada kendala di operasinya. Tapi itu sudah bisa diakses di seluruh Indonesia, dan semua bisa diunduh dari sana, misal buku teks, pelatihan-pelatihan guru, apa saja bisa diunduh di sana, ujarnya.</span></span></p>', 'Pak RT', '2016-12-28'),
(10, 'Iuran Wajib Kampung', '<p>Assalamualikum wr. wb.</p>\r\n<p>Setiap warga wajib menyetorkan iuran paling lambat tanggal 5 setiap bulannya, pengurus bendahara akan memberikan surat teguran jika terdapat teguran.</p>\r\n<p>Terima kasih atas perhatiannya,</p>\r\n<p>Wassalamualikum wr. wb.</p>\r\n<p>Bpk. Araku</p>', 'Bendahara', '2016-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `rt`
--

CREATE TABLE IF NOT EXISTS `rt` (
  `nik_rt` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nik_rw` varchar(20) NOT NULL,
  `rt` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  PRIMARY KEY (`nik_rt`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rt`
--

INSERT INTO `rt` (`nik_rt`, `foto`, `nik_rw`, `rt`, `nama`, `alamat`) VALUES
('0987654321', 'foto/Koala.jpg', '1234567890', '01', 'Mawa', 'Lebak Jaya Utara IV A Rawasan 43');

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
('1234567890', 'foto/Koala.jpg', '01', 'Alif', 'Lebak Jaya Utara IV A Rawasan ');

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
