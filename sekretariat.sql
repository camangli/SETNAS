-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 31 Mar 2021 pada 15.26
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekretariat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` int(11) NOT NULL,
  `nama_bagian` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `nama_bagian`) VALUES
(1, 'ADMIN'),
(2, 'PENGURUS'),
(3, 'SEKRETARIAT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL COMMENT 'auto increment',
  `id_bagian` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` char(14) DEFAULT NULL,
  `email` char(100) DEFAULT NULL,
  `foto` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `id_bagian`, `nama`, `jabatan`, `alamat`, `no_telp`, `email`, `foto`) VALUES
(1, 1, 'Gunawan', 'Administrasi', 'Jl. Bendungan Hilir Raya No. 29', '085723420875', 'gunawanku15@gmail.com', '1617109973.png'),
(3, 3, 'Fauzan', 'IT Support', 'villa mutiara serpong', '082249040465', 'fauzan@inkindo.org', '1617101852.png'),
(4, 3, 'Mahfud Sidik', 'IT Support', 'Jl. Bendungan Hilir Raya No. 29 Jakarta Pusat', '081321299846', 'mahfud@inkindo.org', '1617172642.JPG'),
(6, 3, 'Test', 'Test', 'Test', 'Test', 'Test@test', '1617115991.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegaitan` varchar(255) DEFAULT NULL,
  `penyelenggara_kegiatan` varchar(255) DEFAULT NULL,
  `tanggal_mulai_kegiatan` date DEFAULT NULL,
  `tanggal_berakhir_kegiatan` date DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL COMMENT 'auto increment',
  `id_suratkeluar` int(11) DEFAULT NULL COMMENT 'auto increment',
  `id_karyawan` int(11) DEFAULT NULL COMMENT 'auto increment',
  `nama_penerima` varchar(50) DEFAULT NULL,
  `jabatan_penerima` varchar(50) NOT NULL,
  `tanggal_kirim` date DEFAULT NULL,
  `kontak_penerima` varchar(50) NOT NULL,
  `nama_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_suratkeluar`, `id_karyawan`, `nama_penerima`, `jabatan_penerima`, `tanggal_kirim`, `kontak_penerima`, `nama_file`) VALUES
(1, 1, 1, 'NamaG', 'Jabatan', '2021-03-21', 'Kontak', '1616904004.pdf'),
(4, 8, 1, 'Test', 'Test', '2021-03-28', 'Test', '1616901912.pdf'),
(5, 9, 1, 'Pengirimb', 'Jabatan', '2021-03-28', 'Jabatan', '1616902533.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suratkeluar`
--

CREATE TABLE `suratkeluar` (
  `id_suratkeluar` int(11) NOT NULL COMMENT 'auto increment',
  `no_surat` char(50) DEFAULT NULL,
  `tanggal_surat` date NOT NULL,
  `kepengurusan` char(20) DEFAULT NULL,
  `nama_pengirim` varchar(100) DEFAULT NULL,
  `jabatan_pengirim` varchar(100) DEFAULT NULL,
  `nama_tujuan` varchar(100) DEFAULT NULL,
  `jabatan_tujuan` varchar(100) DEFAULT NULL,
  `instansi_tujuan` varchar(255) DEFAULT NULL,
  `perihal` varchar(255) DEFAULT NULL,
  `nama_file` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Untuk Data Surat Keluar';

--
-- Dumping data untuk tabel `suratkeluar`
--

INSERT INTO `suratkeluar` (`id_suratkeluar`, `no_surat`, `tanggal_surat`, `kepengurusan`, `nama_pengirim`, `jabatan_pengirim`, `nama_tujuan`, `jabatan_tujuan`, `instansi_tujuan`, `perihal`, `nama_file`) VALUES
(1, '1912/TEST/VI/2021', '2021-03-21', 'DPN', 'test', 'test', 'Nama Tujuan Ubah', 'Jabatan Tujuan', 'Instansi Tujuan', 'Perihal surat', '1616944682.pdf'),
(4, '04/TEST/VII/2020', '2021-03-16', 'POKJA', 'test', 'test', 'test', 'test', 'test', 'test', '1616314027.pdf'),
(5, '05/TEST/VII/2020', '2021-03-16', 'DKN', 'test', 'Test', 'test', 'test', 'test', 'test', '1615901434.'),
(7, '12/TEST/VII/2020', '2021-03-17', 'DKN', 'Nama', 'Jabatan pengirim', 'Nama Tujuan', 'Jabatan Tujuan', 'Instansi Tujuan', 'Test Surat Aplikasi Disposisi\r\n', '1616314055.pdf'),
(8, '13/TEST/VII/2020', '2021-03-21', 'DPN', 'Nama', 'Jabatan Pengirim', 'Nama Tujuan', 'Jabatan Tujuan', 'Instansi Tujuan', 'Perihal Surat Yang akan disampaikan', '1616952240.pdf'),
(9, '1912/TEST/VI/2021', '2021-03-21', 'DKN', 'test', 'test', 'test', 'test', 'test', 'test', '1616915805.pdf'),
(13, '99/TEST/VII/2020', '2021-03-21', 'SETNAS', 'Nama Pengirim', 'Jabatan Pengirim', 'Nama Tujuan Update', 'Jabatan Tujuan', 'Instansi Tujuan', 'Perihal Surat', '1616321560.pdf'),
(16, '13/TEST/VII/2020', '2021-03-31', 'DPN', 'Nama', 'Jabatan pengirim', 'Nama Tujuan', 'Jabatan Tujuan', 'Instansi Tujuan', 'Perihal Surat', '1617169162.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suratmasuk`
--

CREATE TABLE `suratmasuk` (
  `id_suratmasuk` int(11) NOT NULL COMMENT 'auto increment',
  `no_agenda` char(25) DEFAULT NULL,
  `no_surat` char(100) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `jenis_surat` varchar(15) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `perihal` varchar(255) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Untuk Data Surat Masuk';

--
-- Dumping data untuk tabel `suratmasuk`
--

INSERT INTO `suratmasuk` (`id_suratmasuk`, `no_agenda`, `no_surat`, `tanggal_masuk`, `tanggal_surat`, `jenis_surat`, `nama`, `jabatan`, `instansi`, `perihal`, `nama_file`) VALUES
(1, '11/D/A/20121', '12/TEST/VII/2020', '2021-03-28', '2021-03-28', 'DPP', 'Nama', 'Jabatan pengirim', 'Instansi', 'Perihal Surat', '1616946261.pdf'),
(3, 'Agenda/A/IV/2021', '12/TEST/VII/2020', '2021-03-16', '2021-03-10', 'Luar Negeri', 'Nama', 'Jabatan pengirim', 'Instansi', 'Perihal', '1616935692.pdf'),
(6, '12/A/AS/II/2021', '13/TEST/VII/2020', '2021-03-31', '2021-03-31', 'Pemerintah', 'test', 'Test', 'Instansi Pemerintah', 'Perihal', '1617169104.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `id_suratmasuk` int(11) DEFAULT NULL,
  `tanggapan` text DEFAULT NULL,
  `waktu_tanggapan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_karyawan`, `id_suratmasuk`, `tanggapan`, `waktu_tanggapan`) VALUES
(7, 1, 1, 'aaaa', '2021-03-28 10:46:49'),
(8, 1, 1, 'Tangagpan', '2021-03-28 10:59:23'),
(10, 3, 1, 'test', '2021-03-28 11:53:04'),
(14, 1, 3, 'test tanggapan', '2021-03-29 17:59:35'),
(15, 4, 1, 'test tanggapan', '2021-03-29 18:00:57'),
(16, 4, 3, 'test tanggapan', '2021-03-29 18:01:11'),
(17, 3, 1, 'test', '2021-03-30 08:47:36'),
(18, 3, 1, 'tanggapan 2', '2021-03-30 17:42:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(100) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL COMMENT 'auto increment',
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='untuk login';

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_karyawan`, `password`) VALUES
('admin', 1, '21232f297a57a5a743894a0e4a801fc3'),
('fauzan@inkindo.org', 3, 'a720cd2b30232274ec8828b575b2aa46'),
('mahfud@inkindo.org', 4, 'a720cd2b30232274ec8828b575b2aa46'),
('Test', 6, '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `karyawan_ibfk_1` (`id_bagian`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `pengiriman_ibfk_1` (`id_suratkeluar`),
  ADD KEY `pengiriman_ibfk_2` (`id_karyawan`);

--
-- Indeks untuk tabel `suratkeluar`
--
ALTER TABLE `suratkeluar`
  ADD PRIMARY KEY (`id_suratkeluar`);

--
-- Indeks untuk tabel `suratmasuk`
--
ALTER TABLE `suratmasuk`
  ADD PRIMARY KEY (`id_suratmasuk`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_suratmasuk` (`id_suratmasuk`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `user_ibfk_1` (`id_karyawan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto increment', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto increment', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `suratkeluar`
--
ALTER TABLE `suratkeluar`
  MODIFY `id_suratkeluar` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto increment', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `suratmasuk`
--
ALTER TABLE `suratmasuk`
  MODIFY `id_suratmasuk` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto increment', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`id_suratkeluar`) REFERENCES `suratkeluar` (`id_suratkeluar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengiriman_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_suratmasuk`) REFERENCES `suratmasuk` (`id_suratmasuk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tanggapan_ibfk_3` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
