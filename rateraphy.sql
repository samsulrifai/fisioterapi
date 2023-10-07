-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Sep 2023 pada 03.59
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rateraphy`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(12) NOT NULL,
  `id_detail_menu` text NOT NULL,
  `id_meja` int(12) NOT NULL,
  `nama_pemesan` varchar(250) NOT NULL,
  `nomor_hp` varchar(250) NOT NULL,
  `tanggal_pesan` datetime NOT NULL,
  `tanggal_reservasi` date NOT NULL,
  `total_pembayaran` int(12) NOT NULL,
  `total_sudah_dibayar` int(12) NOT NULL,
  `batas_pembayaran_dp` datetime NOT NULL,
  `status_pembayaran` varchar(250) NOT NULL,
  `bukti_pembayaran` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id_booking`, `id_detail_menu`, `id_meja`, `nama_pemesan`, `nomor_hp`, `tanggal_pesan`, `tanggal_reservasi`, `total_pembayaran`, `total_sudah_dibayar`, `batas_pembayaran_dp`, `status_pembayaran`, `bukti_pembayaran`) VALUES
(20, 'INV20230426115550', 1, 'BIYU', '082271513853', '2023-04-26 11:55:50', '2023-04-26', 65000, 65000, '2023-04-27 11:55:50', 'Pesanan Selesai', '26042023065624ayu2.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_menu`
--

CREATE TABLE `gambar_menu` (
  `id_gambar` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
  `nama_pasien` varchar(255) DEFAULT NULL,
  `nik` int(11) DEFAULT NULL,
  `umur` varchar(10) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tanggal_teraphy` date DEFAULT NULL,
  `jam_teraphy` varchar(32) DEFAULT NULL,
  `keluhan` text DEFAULT NULL,
  `diagnosa` text DEFAULT NULL,
  `intervensi` varchar(255) DEFAULT NULL,
  `terapi_ke` varchar(10) DEFAULT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `status_transaksi` bit(1) DEFAULT NULL,
  `total_harga` varchar(255) DEFAULT NULL,
  `harga_teraphy` text DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `nama_pasien`, `nik`, `umur`, `alamat`, `tanggal_teraphy`, `jam_teraphy`, `keluhan`, `diagnosa`, `intervensi`, `terapi_ke`, `id_pasien`, `status_transaksi`, `total_harga`, `harga_teraphy`, `no_hp`) VALUES
(41, 'Laura', 1231, '26', 'guntung', '2023-07-17', '11:11', 'Mual,Pegal-pegal,Pusing', 'asdad', 'Assesment,UPS', '1', 25, b'1', '45000', '15000,30000', NULL),
(42, 'Abiyyu Aqil', 47561, '18', 'Perumahan STI PUSAT C01-C02', '2023-07-18', '09:53', 'Mual,Pegal-pegal,Pusing', 'asdad', 'Assesment,UPS', '1', 24, b'1', '45000', '15000,30000', NULL),
(43, 'Laura', 1231, '26', 'guntung', '2023-07-18', '11:06', 'Pusing,Mual,Pegal-pegal', 'EDIT edit', 'Assesment,UPS', '55', 25, b'1', '45000', NULL, '085520220250'),
(44, 'astri', 11222224, '20', 'SAMBU', '2023-09-24', '07:43', 'Pegal-pegal', 'asdgs', 'Assesment', '1', 28, b'1', '15000', '15000', '0822115441220'),
(45, 'samsul', 2147483647, '23', 'gandrungmangu', '2023-09-24', '12:45', 'Mual,Pegal-pegal,Pusing', 'kurang makan jadi kurus', 'Assesment,UPS', '1', 29, b'1', '45000', '15000,30000', '089821347823');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoicew`
--

CREATE TABLE `invoicew` (
  `header_id` int(11) NOT NULL,
  `nama_pasien` varchar(255) DEFAULT NULL,
  `nik` int(11) DEFAULT NULL,
  `umur` varchar(10) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tanggal_teraphy` date DEFAULT NULL,
  `jam_teraphy` varchar(32) DEFAULT NULL,
  `keluhan` text DEFAULT NULL,
  `diagnosa` text DEFAULT NULL,
  `intervensi` varchar(255) DEFAULT NULL,
  `terapi_ke` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluhan`
--

CREATE TABLE `keluhan` (
  `id_keluhan` int(11) NOT NULL,
  `keluhan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keluhan`
--

INSERT INTO `keluhan` (`id_keluhan`, `keluhan`) VALUES
(27, 'Pusing'),
(28, 'Mual'),
(29, 'Pegal-pegal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lupa_password`
--

CREATE TABLE `lupa_password` (
  `id_lupa_password` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `pertanyaankeamanan1` varchar(255) NOT NULL,
  `pertanyaankeamanan2` varchar(255) NOT NULL,
  `jawabankeamanan1` varchar(255) NOT NULL,
  `jawabankeamanan2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lupa_password`
--

INSERT INTO `lupa_password` (`id_lupa_password`, `id_pegawai`, `pertanyaankeamanan1`, `pertanyaankeamanan2`, `jawabankeamanan1`, `jawabankeamanan2`) VALUES
(1, 1, 'Berapa angka favorit anda?(Contoh: 99)', 'Siapakah nama hewan peliharaan anda?', '7', 'alfan'),
(2, 3, 'Apa hewan kesayangan anda?', 'Apa cita-cita anda semasa kecil?', 'Harimau Sumatra', 'Progamer'),
(3, 6, 'Siapa nama belakang ibu anda?', 'Apa hobi anda?', 'Rahida', 'Ngoding'),
(4, 7, 'Apa hewan kesayangan anda?', 'Apa hobi anda?', 'kucing', 'salto'),
(5, 8, 'Apa hewan kesayangan anda?', 'Apa hobi anda?', 'kucing', 'ngoding');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_dibooking`
--

CREATE TABLE `menu_dibooking` (
  `id_menu_dibooking` int(12) NOT NULL,
  `id_detail_menu` text NOT NULL,
  `nama_makanan` varchar(250) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `sub_total` int(12) NOT NULL,
  `status_order` varchar(255) NOT NULL DEFAULT 'success'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu_dibooking`
--

INSERT INTO `menu_dibooking` (`id_menu_dibooking`, `id_detail_menu`, `nama_makanan`, `jumlah`, `sub_total`, `status_order`) VALUES
(15, 'INV20211015132542', 'Bakso', 1, 20000, 'success'),
(16, 'INV20211015132542', 'Nasi Goreng', 1, 25000, 'success'),
(17, 'INV20211015133852', 'Bakso', 2, 40000, 'success'),
(18, 'INV20211015133852', 'Es Teh', 2, 16000, 'success'),
(19, 'INV20211016130044', 'Bakso', 2, 40000, 'success'),
(20, 'INV20211016130044', 'Es Jeruk', 2, 20000, 'success'),
(21, 'INV20211027131246', 'Nasi Goreng', 2, 50000, 'success'),
(22, 'INV20211027131246', 'Soto Lamongan ', 2, 30000, 'success'),
(23, 'INV20211027131246', 'Es Jeruk', 4, 40000, 'success'),
(24, 'INV20211027134031', 'Es Jeruk', 2, 20000, 'success'),
(25, 'INV20211027134031', 'Bakso', 2, 40000, 'success'),
(26, 'INV20211029135257', 'Es Jeruk', 1, 10000, 'success'),
(27, 'INV20211029135257', 'Nasi Goreng', 1, 25000, 'success'),
(28, 'INV20211029135257', 'Soto Lamongan ', 1, 15000, 'success'),
(29, 'INV20211029200131', 'Nasi Goreng', 1, 25000, 'success'),
(30, 'INV20211029200131', 'Soto Lamongan ', 1, 15000, 'success'),
(31, 'INV20211029200131', 'Es Jeruk', 1, 10000, 'success'),
(32, 'INV20211029201010', 'Nasi Goreng', 1, 25000, 'success'),
(33, 'INV20211016130044', 'Es Teh', 1, 8000, 'success'),
(34, 'INV20211029135257', 'Es Jeruk', 1, 10000, 'success'),
(35, 'INV20211101132112', 'Bakso', 1, 20000, 'success'),
(36, 'INV20211101132112', 'Es Teh', 1, 8000, 'success'),
(37, 'INV20211101132112', 'Es Jeruk', 1, 10000, 'success'),
(38, 'INV20211101132112', 'Sate Daging', 1, 25000, 'success'),
(39, 'INV20211114143545', 'Es Jeruk', 2, 20000, 'success'),
(40, 'INV20211114143545', 'Soto Lamongan ', 2, 30000, 'success'),
(41, 'INV20211114190627', 'Es Teh', 2, 16000, 'success'),
(42, 'INV20211114190627', 'Bakso', 2, 40000, 'success'),
(43, 'INV20211114143545', 'Milkshake', 1, 15000, 'success'),
(44, 'INV20211114143545', 'Milkshake', 1, 15000, 'success'),
(45, 'INV20230426115550', 'Nasi Goreng', 1, 25000, 'success'),
(46, 'INV20230426115550', 'Bakso', 1, 20000, 'success'),
(47, 'INV20230426115550', 'Es Jeruk', 2, 20000, 'success');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id_metode` int(12) NOT NULL,
  `nama_merchant` varchar(250) NOT NULL,
  `atas_nama` varchar(250) NOT NULL,
  `kode_pembayaran` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id_metode`, `nama_merchant`, `atas_nama`, `kode_pembayaran`) VALUES
(1, 'BRI', 'Samsul Rifai', '238452395879283');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `umur` varchar(50) NOT NULL,
  `nik` int(11) NOT NULL,
  `no_hp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `alamat`, `umur`, `nik`, `no_hp`) VALUES
(29, 'samsul', 'gandrungmangu', '23', 2147483647, '089821347823');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `jabatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `email`, `alamat`, `password`, `telepon`, `jenis_kelamin`, `jabatan`) VALUES
(6, 'Abiyyu Aqil', 'abiyyu.aqil@gmail.com', 'Komplek STI PUSAT, C.01- C.02', '21232f297a57a5a743894a0e4a801fc3', '082271513853', 'Laki-Laki', 'admin'),
(7, 'Laura Tirta Sary', 'laura', 'Jl. Telaga Raja No-110, Tagaraja, Kateman', '680e89809965ec41e64dc7e447f175ab', '081279444197', 'Perempuan', 'admin'),
(8, 'fai', 'fai@gmail.com', 'gandrungmangu', '21232f297a57a5a743894a0e4a801fc3', '0895357921614', 'Laki-laki', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_usaha`
--

CREATE TABLE `profil_usaha` (
  `id` int(12) NOT NULL,
  `nama_usaha` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `nomor_telepon` varchar(17) NOT NULL,
  `email` varchar(100) NOT NULL,
  `instagram` varchar(50) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `maps_link` text NOT NULL,
  `foto_usaha_1` text NOT NULL,
  `foto_usaha_2` text NOT NULL,
  `foto_usaha_3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profil_usaha`
--

INSERT INTO `profil_usaha` (`id`, `nama_usaha`, `deskripsi`, `alamat`, `nomor_telepon`, `email`, `instagram`, `facebook`, `maps_link`, `foto_usaha_1`, `foto_usaha_2`, `foto_usaha_3`) VALUES
(1, 'PRAKTEK FISIOTERAPI Fai ganteng', 'Praktek Fisioterapi', 'Jl. Gandrungmangu', '0895357921614', 'samsulrifai48@gmail.com', 'samsulrifai', 'Samsul Rifai', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.4605139706314!2d108.83813357489213!3d-7.524643574256099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6579460b30d945%3A0x617196ac55737777!2sKonveksi%20Teguh!5e0!3m2!1sid!2sid!4v1695516794547!5m2!1sid!2sid', '180720231142411.jpg', '180720231150502.jpg', '180720231150503.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teraphy`
--

CREATE TABLE `teraphy` (
  `id_teraphy` int(11) NOT NULL,
  `nama_teraphy` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `kode` varchar(50) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `teraphy`
--

INSERT INTO `teraphy` (`id_teraphy`, `nama_teraphy`, `deskripsi`, `kode`, `harga`) VALUES
(20, 'Assesment', 'Assesment teraphy', 'as', 15000),
(22, 'UPS', 'ups teraphy', 'ups', 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `level_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `level_user`, `username`, `password`) VALUES
(1, 'abiyyu', 'admin', 'biyu', 'biyu123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indeks untuk tabel `gambar_menu`
--
ALTER TABLE `gambar_menu`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`) USING BTREE;

--
-- Indeks untuk tabel `invoicew`
--
ALTER TABLE `invoicew`
  ADD PRIMARY KEY (`header_id`);

--
-- Indeks untuk tabel `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id_keluhan`) USING BTREE;

--
-- Indeks untuk tabel `lupa_password`
--
ALTER TABLE `lupa_password`
  ADD PRIMARY KEY (`id_lupa_password`);

--
-- Indeks untuk tabel `menu_dibooking`
--
ALTER TABLE `menu_dibooking`
  ADD PRIMARY KEY (`id_menu_dibooking`);

--
-- Indeks untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`) USING BTREE;

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `profil_usaha`
--
ALTER TABLE `profil_usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `teraphy`
--
ALTER TABLE `teraphy`
  ADD PRIMARY KEY (`id_teraphy`) USING BTREE;

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `gambar_menu`
--
ALTER TABLE `gambar_menu`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id_keluhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `lupa_password`
--
ALTER TABLE `lupa_password`
  MODIFY `id_lupa_password` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `menu_dibooking`
--
ALTER TABLE `menu_dibooking`
  MODIFY `id_menu_dibooking` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `id_metode` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `profil_usaha`
--
ALTER TABLE `profil_usaha`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `teraphy`
--
ALTER TABLE `teraphy`
  MODIFY `id_teraphy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
