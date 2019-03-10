-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2016 at 11:04 AM
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
('10987654321', 'foto/TTD.PNG', '0987654321', 'Araku', 'Lebak Jaya Utara IV A Rawasan 43 ');

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
-- Table structure for table `kegiatan`
--

CREATE TABLE IF NOT EXISTS `kegiatan` (
  `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `perihal` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`id_kegiatan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `perihal`, `nama`, `tanggal_kegiatan`, `isi`) VALUES
(5, 'Kerja Bakti Kampung', 'Bpk. Yanto', '2017-01-08', '<p>Kerja bakti mulai jam 8 sampai selesai, bagi yang tidak mengikuti wajib membayar iuran sebesar Rp. 10.000,-. terima kasih.</p>'),
(4, 'Rapat Kartar', 'Saudara Galuh', '2017-01-06', '<p>Syukuran ba''da isya, ojok lali rek !</p>');

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE IF NOT EXISTS `keluarga` (
  `no_kk` varchar(20) NOT NULL,
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

INSERT INTO `keluarga` (`no_kk`, `kepkel`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kota`, `kode_pos`, `propinsi`) VALUES
('12345678910', 'Alif Rachmad Kurniawan', 'Lebak Jaya Utara IVA Rawasan No.44 ', '01', '01', 'Dukuh Setro', 'Tambaksari', 'Surabaya', '60138', 'Jawa Timur'),
('10987654321', 'Rachmad Kurniawan', 'Lebak Jaya Utara IV A Rawasan 43', '04', '05', 'Dukuh Setro', 'Tambaksari', 'Surabaya', '60138', 'Jawa Timur');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE IF NOT EXISTS `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT,
  `pekerjaan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pekerjaan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `pekerjaan`) VALUES
(2, 'Belum/Tidak Bekerja');

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
  `id_agama` varchar(10) NOT NULL,
  `id_pendidikan` varchar(10) NOT NULL,
  `id_pekerjaan` varchar(10) NOT NULL,
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
('12345678910', '1234567890', 'Mawa Yui', 'P', 'Japan', '2001-02-05', '2', '10', '2', '2', '3', 'WNA', '', '', 'Hanato Ryu', 'Hanato Ise');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul`, `pengumuman`, `pengirim`, `date`) VALUES
(3, 'Tinymce', '<p style="border: 0px; font-family: ''Lucida Grande'', Arial, ''Lucida Sans Unicode'', sans-serif; font-size: 13px; margin: 0px 0px 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: #666666; background-color: #efefef; text-align: justify;">Web designer mana yang tak kenal dengan TinyMCE ??? Menurut saya pasti hampir semua web designer menggunakan TinyMCE untuk aplikasi webnya, baik itu aplikasi berita, komentar dll. Nah bagi yang belum tau tentang TinyMCE, mari kita lihat pengertiannya dari situs resminya. Neh sekilas tentang TinyMCE dari situs resminya :</p>\r\n<p style="border: 0px; font-family: ''Lucida Grande'', Arial, ''Lucida Sans Unicode'', sans-serif; font-size: 13px; margin: 0px 0px 1.5em; outline: 0px; padding: 0px; vertical-align: baseline; color: #666666; background-color: #efefef; text-align: justify;">TinyMCE is a platform independent web based Javascript HTML WYSIWYG editor control released as Open Source under LGPL by Moxiecode Systems AB. TinyMCE has the ability to convert HTML TEXTAREA fields or other HTML elements to editor instances. TinyMCE is very easy to integrate into other Content Management Systems. (&nbsp;<a style="border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: #000000; text-decoration-line: none;" href="http://tinymce.moxiecode.com/">http://tinymce.moxiecode.com/</a>&nbsp;)</p>', 'Admin', '2016-12-26'),
(2, 'Mancing Mania !!! Mantap...', '<p>Ayo ikuti !!! langsung daftar ke <span style="text-decoration: underline;"><strong><em>Bpk. Yudhi</em></strong></span>... lho</p>', 'Admin', '2016-12-27'),
(4, 'Welcome to XAMPP for Windows Version 1.7.1 !', '<p><strong style="font-family: verdana, helvetica; font-size: 12px;">Congratulations:<br />You have successfully installed XAMPP on this system!</strong></p>\r\n<p style="font-family: verdana, helvetica; font-size: 12px;">Now you can start using Apache and Co. You should first try &raquo;Status&laquo; on the left navigation to make sure everything works fine.</p>\r\n<p style="font-family: verdana, helvetica; font-size: 12px;">For OpenSSL support please use the test certificate with&nbsp;<a style="color: #bb3902;" href="https://127.0.0.1/" target="_top">https://127.0.0.1</a>&nbsp;or&nbsp;<a style="color: #bb3902;" href="https://localhost/" target="_top">https://localhost</a></p>\r\n<p style="font-family: verdana, helvetica; font-size: 12px;">For this release a special thanks to&nbsp;<a style="color: #bb3902;" href="http://www.php.net/credits.php" target="_new">Uwe Steinmann</a>&nbsp;for his excellent development and compilation of all current "Special" modules!</p>\r\n<p style="font-family: verdana, helvetica; font-size: 12px;">Good luck, Kay Vogelgesang + Kai ''Oswald'' Seidler</p>', 'Admin', '2016-12-26'),
(6, 'Tinymce', '<p><span style="color: #666666; font-family: ''Lucida Grande'', Arial, ''Lucida Sans Unicode'', sans-serif; font-size: 13px; text-align: justify; background-color: #efefef;">TinyMCE adalah sebuah platform web editor yang dibuat berdasarkan Javascript HTML WYSIWYG (What You See Is What You Get)&nbsp; yang dikeluarkan sebagai open source dibawah lisensi LGPL oleh Moxiecode Systems AB. TinyMCE mempunyai kemampuan untuk mengkonversi TextArea HTML atau Elemen HTML lainnya menjadi tampilan teks penyunting. TinyMCE sangat mudah untuk berintergrasi dengan CMS lainnya. Untuk sekedar informasi aja, TinyMCE telah dipakai oleh Facebook, Microsoft, Apple, WordPress, Joomla, Oracle dan untuk CMS Indonesia yang menggunakannya adalah AuraCMS. Saya juga menggunakan TinyMCE untuk web sederhana yang saya buat</span><img class="emoji" style="background-color: #efefef; max-width: 100%; color: #666666; font-family: ''Lucida Grande'', Arial, ''Lucida Sans Unicode'', sans-serif; font-size: 13px; text-align: justify; display: inline !important; border: none !important; box-shadow: none !important; height: 27px; width: 27px; margin: 0px 0.07em !important; vertical-align: -0.1em !important; background-image: none !important; background-position: initial !important; background-size: initial !important; background-repeat: initial !important; background-attachment: initial !important; background-origin: initial !important; background-clip: initial !important; padding: 0px !important;" src="https://s0.wp.com/wp-content/mu-plugins/wpcom-smileys/twemoji/2/svg/1f61b.svg" alt="ðŸ˜›" /><span style="color: #666666; font-family: ''Lucida Grande'', Arial, ''Lucida Sans Unicode'', sans-serif; font-size: 13px; text-align: justify; background-color: #efefef;">&nbsp;Oke dah kita dah membahas sekilas tentang TinyMCE, yuk sekarang kita bahas cara menggunakan / menginstallnya.</span></p>', 'Admin', '2016-12-28');

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
('0987654321', 'foto/DSC_0872.JPG', '1234567890', '01', 'Mawa', 'Lebak Jaya Utara IV A Rawasan 43');

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
('1234567890', 'foto/DSC_0872.JPG', '01', 'Alif', 'Lebak Jaya Utara IV A Rawasan ');

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
