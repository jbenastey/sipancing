-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Agu 2019 pada 05.02
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sipancing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `sipancing_faktur`
--

CREATE TABLE `sipancing_faktur` (
  `faktur_id` varchar(10) NOT NULL,
  `faktur_keranjang_id` varchar(10) NOT NULL,
  `faktur_bank` enum('bni','bri','cod') NOT NULL,
  `faktur_status` enum('belum','sudah','tunggu') NOT NULL DEFAULT 'belum',
  `faktur_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sipancing_faktur`
--

INSERT INTO `sipancing_faktur` (`faktur_id`, `faktur_keranjang_id`, `faktur_bank`, `faktur_status`, `faktur_date_created`) VALUES
('INV-18975', 'CRT-18955', 'bri', 'sudah', '2019-08-09 09:49:35'),
('INV-59212', 'CRT-56277', 'bri', 'belum', '2019-08-08 17:13:32'),
('INV-59641', 'CRT-59627', 'cod', 'sudah', '2019-08-08 17:20:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sipancing_kategori`
--

CREATE TABLE `sipancing_kategori` (
  `kategori_id` varchar(10) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL,
  `kategori_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sipancing_kategori`
--

INSERT INTO `sipancing_kategori` (`kategori_id`, `kategori_nama`, `kategori_date_created`) VALUES
('CAT-41989', 'Pakan Burung', '2019-08-08 12:26:29'),
('CAT-42019', 'Pakan Ikan', '2019-08-08 12:26:59'),
('CAT-42051', 'Reel Pancing', '2019-08-08 12:27:31'),
('CAT-42058', 'Joran Pancing', '2019-08-08 12:27:38'),
('CAT-42068', 'Senar Pancing', '2019-08-08 12:27:48'),
('CAT-42087', 'Kail Pancing', '2019-08-08 12:28:07'),
('CAT-42099', 'Pakan Ayam', '2019-08-08 12:28:19'),
('CAT-42108', 'Tas Pancing', '2019-08-08 12:28:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sipancing_keranjang`
--

CREATE TABLE `sipancing_keranjang` (
  `keranjang_id` varchar(10) NOT NULL,
  `keranjang_pengguna_id` int(11) NOT NULL,
  `keranjang_total` int(11) NOT NULL,
  `keranjang_status` enum('belum','sudah') NOT NULL DEFAULT 'belum',
  `keranjang_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sipancing_keranjang`
--

INSERT INTO `sipancing_keranjang` (`keranjang_id`, `keranjang_pengguna_id`, `keranjang_total`, `keranjang_status`, `keranjang_date_created`) VALUES
('CRT-18955', 2, 24000, 'sudah', '2019-08-09 09:49:15'),
('CRT-56277', 2, 60000, 'sudah', '2019-08-08 16:24:37'),
('CRT-59627', 2, 30000, 'sudah', '2019-08-08 17:20:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sipancing_konfirmasi`
--

CREATE TABLE `sipancing_konfirmasi` (
  `konfirmasi_id` varchar(10) NOT NULL,
  `konfirmasi_faktur_id` varchar(10) NOT NULL,
  `konfirmasi_rekening` varchar(30) NOT NULL,
  `konfirmasi_atas_nama` varchar(50) NOT NULL,
  `konfirmasi_nominal` int(11) NOT NULL,
  `konfirmasi_struk` text NOT NULL,
  `konfirmasi_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sipancing_konfirmasi`
--

INSERT INTO `sipancing_konfirmasi` (`konfirmasi_id`, `konfirmasi_faktur_id`, `konfirmasi_rekening`, `konfirmasi_atas_nama`, `konfirmasi_nominal`, `konfirmasi_struk`, `konfirmasi_date_created`) VALUES
('CFM-19032', 'INV-18975', '1312312', 'Jihad', 24000, 'fishing-background.jpg', '2019-08-09 09:50:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sipancing_pengguna`
--

CREATE TABLE `sipancing_pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_username` varchar(255) NOT NULL,
  `pengguna_password` varchar(255) NOT NULL,
  `pengguna_nama` varchar(255) NOT NULL,
  `pengguna_nomor_hp` varchar(20) NOT NULL,
  `pengguna_email` varchar(255) NOT NULL,
  `pengguna_level` enum('administrator','pemesan') NOT NULL,
  `pengguna_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sipancing_pengguna`
--

INSERT INTO `sipancing_pengguna` (`pengguna_id`, `pengguna_username`, `pengguna_password`, `pengguna_nama`, `pengguna_nomor_hp`, `pengguna_email`, `pengguna_level`, `pengguna_date_created`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'yosi', '081234567890', 'yosi@gmail.com', 'administrator', '2019-08-08 11:52:17'),
(2, 'pemesan', 'd58910536eed6faa657ba7dbc012534c', 'Bambang', '081234567890', 'pemesan@gmail.com', 'pemesan', '2019-08-08 14:51:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sipancing_pesanan`
--

CREATE TABLE `sipancing_pesanan` (
  `pesanan_id` varchar(10) NOT NULL,
  `pesanan_produk_id` varchar(10) NOT NULL,
  `pesanan_keranjang_id` varchar(10) NOT NULL,
  `pesanan_jumlah` int(11) NOT NULL,
  `pesanan_total` int(11) NOT NULL,
  `pesanan_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sipancing_pesanan`
--

INSERT INTO `sipancing_pesanan` (`pesanan_id`, `pesanan_produk_id`, `pesanan_keranjang_id`, `pesanan_jumlah`, `pesanan_total`, `pesanan_date_created`) VALUES
('ORD-18955', 'PRD-50257', 'CRT-18955', 2, 24000, '2019-08-09 09:49:15'),
('ORD-56277', 'PRD-50257', 'CRT-56277', 3, 36000, '2019-08-08 16:24:37'),
('ORD-57261', 'PRD-48420', 'CRT-56277', 3, 24000, '2019-08-08 16:41:01'),
('ORD-59627', 'PRD-49926', 'CRT-59627', 3, 30000, '2019-08-08 17:20:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sipancing_produk`
--

CREATE TABLE `sipancing_produk` (
  `produk_id` varchar(10) NOT NULL,
  `produk_kategori_id` varchar(10) NOT NULL,
  `produk_nama` varchar(255) NOT NULL,
  `produk_harga` bigint(20) NOT NULL,
  `produk_deskripsi` text NOT NULL,
  `produk_foto` text NOT NULL,
  `produk_stok` int(11) NOT NULL,
  `produk_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sipancing_produk`
--

INSERT INTO `sipancing_produk` (`produk_id`, `produk_kategori_id`, `produk_nama`, `produk_harga`, `produk_deskripsi`, `produk_foto`, `produk_stok`, `produk_date_created`) VALUES
('PRD-48420', 'CAT-41989', 'Gold King class \'A\' Birdfeed. ', 8000, 'Ingredients : mazie, unpolished rice, grounded fish powder, grounded prawn powder, grounded soyabean powder, honey, rice hull, cod liver oil, fine oats, vitamins, yolk, deworming powder, kaoliang, digestions enzyme\r\n', 'WhatsApp_Image_2019-08-04_at_12_27_35.jpeg', 17, '2019-08-08 14:13:40'),
('PRD-49926', 'CAT-42099', 'HI-PRO-VITE MEDICATED', 10000, 'ini deskripsi', 'WhatsApp_Image_2019-08-04_at_16_03_32.jpeg', 17, '2019-08-08 14:38:46'),
('PRD-50257', 'CAT-41989', 'Gold coin ', 12000, 'perkutut diramu dari biji-bijian terbaik serta memadukan resep tradisional dengan teknology mutakhir, sehingga menghasilkan pakan bersih, lezat, dan penuh gizi yang di perlukan perkutut anda seperti : protein, mineral dan berbagai vitamin.\r\n', 'WhatsApp_Image_2019-08-04_at_12_27_49.jpeg', 15, '2019-08-08 14:44:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `sipancing_faktur`
--
ALTER TABLE `sipancing_faktur`
  ADD PRIMARY KEY (`faktur_id`);

--
-- Indeks untuk tabel `sipancing_kategori`
--
ALTER TABLE `sipancing_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `sipancing_keranjang`
--
ALTER TABLE `sipancing_keranjang`
  ADD PRIMARY KEY (`keranjang_id`);

--
-- Indeks untuk tabel `sipancing_konfirmasi`
--
ALTER TABLE `sipancing_konfirmasi`
  ADD PRIMARY KEY (`konfirmasi_id`);

--
-- Indeks untuk tabel `sipancing_pengguna`
--
ALTER TABLE `sipancing_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indeks untuk tabel `sipancing_pesanan`
--
ALTER TABLE `sipancing_pesanan`
  ADD PRIMARY KEY (`pesanan_id`);

--
-- Indeks untuk tabel `sipancing_produk`
--
ALTER TABLE `sipancing_produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `sipancing_pengguna`
--
ALTER TABLE `sipancing_pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
