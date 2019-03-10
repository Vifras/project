-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 18. Nopember 2016 jam 17:35
-- Versi Server: 5.1.33
-- Versi PHP: 5.2.9

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
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agama`
--

CREATE TABLE IF NOT EXISTS `agama` (
  `id_agama` varchar(10) NOT NULL,
  `agama` varchar(10) NOT NULL,
  PRIMARY KEY (`id_agama`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
('1', 'Islam'),
('2', 'Kristen'),
('3', 'Khatolik'),
('4', 'Hindu'),
('5', 'Budha'),
('6', 'Khong Hucu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bendahara`
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
-- Dumping data untuk tabel `bendahara`
--

INSERT INTO `bendahara` (`nik_benda`, `foto`, `nik_rt`, `nama`, `alamat`) VALUES
('10987654321', 'foto/TTD.PNG', '0987654321', 'Araku', 'Lebak Jaya Utara IV A Rawasan 43 ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubungan`
--

CREATE TABLE IF NOT EXISTS `hubungan` (
  `id_hubungan` varchar(10) NOT NULL,
  `hubungan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_hubungan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hubungan`
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
-- Struktur dari tabel `keluarga`
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
-- Dumping data untuk tabel `keluarga`
--

INSERT INTO `keluarga` (`no_kk`, `kepkel`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kota`, `kode_pos`, `propinsi`) VALUES
('12345678910', 'Alif Rachmad Kurniawan', 'Lebak Jaya Utara IVA Rawasan No.43 ', '01', '01', 'Dukuh Setro', 'Tambaksari', 'Surabaya', '60138', 'Jawa Timur'),
('10987654321', 'Araku Mawa', 'Kapas Gading Madya ', '02', '01', 'Gading', 'Tambaksari', 'Surabaya', '60138', 'Jawa Timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE IF NOT EXISTS `pekerjaan` (
  `id_pekerjaan` varchar(10) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pekerjaan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `pekerjaan`) VALUES
('1', 'Belum/Tidak Bekerja'),
('2', 'Mengurus Rumah Tangga'),
('3', 'Pelajar/Mahasiswa'),
('4', 'Pensiunan'),
('5', 'Pegawai Negeri Sipil'),
('6', 'Tentara Nasional Indonesia'),
('7', 'Kepolisian RI'),
('8', 'Petani/Pekebun'),
('9', 'Karyawan Swasta'),
('10', 'Buruh Harian Lepas'),
('11', 'Pembantu Rumah Tangga'),
('12', 'Guru'),
('13', 'Dokter'),
('14', 'Bidan'),
('15', 'Perawat'),
('16', 'Sopir'),
('17', 'Wiraswasta'),
('18', 'Dosen'),
('19', 'Perdagangan'),
('20', 'Industri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE IF NOT EXISTS `pendidikan` (
  `id_pendidikan` varchar(10) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pendidikan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendidikan`
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
-- Struktur dari tabel `penduduk`
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
-- Dumping data untuk tabel `penduduk`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `rt`
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
-- Dumping data untuk tabel `rt`
--

INSERT INTO `rt` (`nik_rt`, `foto`, `nik_rw`, `rt`, `nama`, `alamat`) VALUES
('0987654321', 'foto/DSC_0872.JPG', '1234567890', '01', 'Mawa', 'Lebak Jaya Utara IV A Rawasan 43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rw`
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
-- Dumping data untuk tabel `rw`
--

INSERT INTO `rw` (`nik_rw`, `foto`, `rw`, `nama`, `alamat`) VALUES
('1234567890', 'foto/Koala.jpg', '01', 'Alif Rachmad K', 'Lebak Jaya Utara IV A Rawasan ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id_status` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
('1', 'Belum Kawin'),
('2', 'Kawin'),
('3', 'Cerai Hidup'),
('4', 'Cerai Mati');
