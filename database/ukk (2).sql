-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 04. Nopember 2016 jam 20:32
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
-- Struktur dari tabel `bendahara`
--

CREATE TABLE IF NOT EXISTS `bendahara` (
  `nik_benda` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nik_rt` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  PRIMARY KEY (`nik_benda`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bendahara`
--

INSERT INTO `bendahara` (`nik_benda`, `foto`, `nik_rt`, `nama`, `alamat`) VALUES
('0987654321', 'foto/DSC_0872.JPG', '0987654321', 'Araku', 'Lebak Jaya Utara IV A Rawasan No. 43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluarga`
--

CREATE TABLE IF NOT EXISTS `keluarga` (
  `no_kk` varchar(20) NOT NULL,
  `kepkel` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
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
('1234567890', 'Alif', 'Lebak', '01', '01', 'dukuh', 'tambaksari', 'surabaya', '60138', 'jawa timur'),
('10987654321', 'Araku', 'Lebak Jaya Utara IV A Rawasan 43', '02', '01', 'Dukuh Setro', 'Tambaksari', 'Surabaya', '60138', 'Jawa Timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rt`
--

CREATE TABLE IF NOT EXISTS `rt` (
  `nik_rt` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nik_rw` varchar(20) NOT NULL,
  `rt` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  PRIMARY KEY (`nik_rt`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rt`
--

INSERT INTO `rt` (`nik_rt`, `foto`, `nik_rw`, `rt`, `nama`, `alamat`) VALUES
('0987654321', 'foto/DSC_0872.JPG', '12345678910', '01', 'Alif Rachmad K', 'Lebak Jaya Utara IV A Rawasan No. 43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rw`
--

CREATE TABLE IF NOT EXISTS `rw` (
  `nik_rw` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  PRIMARY KEY (`nik_rw`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rw`
--

INSERT INTO `rw` (`nik_rw`, `foto`, `rw`, `nama`, `alamat`) VALUES
('12345678910', 'foto/DSC_0872.JPG', '01', 'Alif', 'Lebak Jaya Utara IV A Rawasan No. 43');
