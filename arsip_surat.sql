-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 07:27 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsip_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_instansi`
--

CREATE TABLE `tb_instansi` (
  `id_instansi` int(11) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `alamat_instansi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_instansi`
--

INSERT INTO `tb_instansi` (`id_instansi`, `nama_instansi`, `alamat_instansi`) VALUES
(9, 'Polsek Bantul', 'Jl. Marsda A. Sutjiptono 109'),
(11, 'Koperasi BMT Bina Ihsanul Fikri', 'Jl. Tegalturi no.2, Giwangan, Kec. Umbulharjo, Yogyakarta'),
(12, 'Koperasi KSPPS Bina Warga Sejahtera', 'Jl. Raya Sambiroto, Purnomartani, Kec. Kalasan, Kab. Sleman, Yogyakarta'),
(13, 'KSPPS BMT Tegalrejo', 'Jl. Karangwaru, Tegalrejo, Yogyakarta'),
(14, 'Universitas Teknologi Yogyakarta', 'Jl. Siliwangi (Ringroad Utara) Jombor, Sleman, Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Ketua'),
(2, 'Wakil'),
(3, 'Bendahara'),
(4, 'Sekretaris'),
(5, 'Pengawas Manajemen'),
(8, 'Pengawas Syahriah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_surat`
--

CREATE TABLE `tb_jenis_surat` (
  `id_js` int(11) NOT NULL,
  `jenis_surat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis_surat`
--

INSERT INTO `tb_jenis_surat` (`id_js`, `jenis_surat`) VALUES
(3, 'Magang'),
(5, 'Undangan'),
(6, 'Perizinan'),
(14, 'Permohonan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(150) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nama_karyawan`, `id_jabatan`) VALUES
(1, 'Bandri', 1),
(2, 'Sugiri Tunggul Widodo, S.E', 4),
(3, 'Priyan Pradita', 5),
(4, 'Sri Wuryani', 3),
(5, 'Jumirah', 1),
(6, 'Abdul Basyir, S.ag', 8),
(10, 'Septi', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_keluar`
--

CREATE TABLE `tb_surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL,
  `no_surat` varchar(150) NOT NULL,
  `tgl_surat` date DEFAULT NULL,
  `id_instansi` int(11) NOT NULL,
  `id_js` int(11) NOT NULL,
  `perihal` varchar(150) NOT NULL,
  `ket` text NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_surat_keluar`
--

INSERT INTO `tb_surat_keluar` (`id_surat_keluar`, `no_surat`, `tgl_surat`, `id_instansi`, `id_js`, `perihal`, `ket`, `lampiran`, `created`, `modified`) VALUES
(1, '063/KSPPS/IX/2019', '2019-09-02', 9, 6, 'Perizinan', 'Permohonan izin', 'example.pdf', '2019-09-02 10:20:33', '2021-01-24 14:42:24'),
(2, '001/G/I/2020', '2020-01-19', 11, 5, 'Pelaksaan RAT tahun 2019', 'Rapat anggota tahunan yang dilaksanakan setahun sekali dengan ketentuan yang telah berlaku. ', 'example1.pdf', '2021-02-04 19:55:41', NULL),
(3, '001/SU-RAT/BWS/2020', '2020-01-23', 12, 5, 'Undangan rapat anggota tahunan (RAT)KSPPS Bina Warga Sejahtera', 'Undangan rapat tahunan yang akan dilaksanakan sesuai dengan aturan yang berlaku.', 'example2.pdf', '2021-02-04 20:00:15', NULL),
(4, '009/KOP/GKPRI/2020', '2020-01-28', 9, 5, 'Undangan Worksop', 'Worksop', 'example5.pdf', '2021-02-04 20:03:42', '2021-02-04 23:23:50'),
(5, '1429/F.TIE-UTY/D-KI/II/2020', '2020-02-03', 14, 6, 'Izin Melaksanakan Kerja Praktek', 'Perizinan Mahasiswa Universitas Teknologi Yogyakarta untuk melakukan kerja praktek atau penelitian di Koperasi BMT Sehati Bantul', 'example4.pdf', '2021-02-04 20:07:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_masuk`
--

CREATE TABLE `tb_surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `no_surat` varchar(150) NOT NULL,
  `tgl_surat` date DEFAULT NULL,
  `id_instansi` int(11) NOT NULL,
  `id_js` int(11) NOT NULL,
  `perihal` varchar(150) NOT NULL,
  `ket` text NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_surat_masuk`
--

INSERT INTO `tb_surat_masuk` (`id_surat_masuk`, `no_surat`, `tgl_surat`, `id_instansi`, `id_js`, `perihal`, `ket`, `lampiran`, `created`, `modified`) VALUES
(5, '001/G/I/2020', '2020-01-19', 11, 5, 'Rapat', 'Pelaksanaan Rapat Anggota Tahunan', 'example.pdf', '2020-01-19 12:01:24', '2021-01-24 14:51:35'),
(6, '1429/F.TIE-UTY/D-K1/I/2020', '2020-01-21', 14, 3, 'Magang', 'Izin melaksanakan magang kerja praktik', 'surat_uty_versi_new.pdf', '2020-02-03 11:13:36', '2021-01-24 14:53:23'),
(7, 'UTY/2021', '2021-01-25', 14, 3, 'Magang', 'Magang Kerja Praktik', 'example1.pdf', '2021-01-25 16:57:01', NULL),
(9, '006/Kop.SMJ/IV2018', '2020-10-13', 12, 14, 'Permohonan Kegiatan', 'Mengajukan permohonan kegiatan pendidikan dan pelatihan kewirausahaan, yaitu wira usaha pemula. ', 'example3.pdf', '2021-02-04 19:52:26', '2021-02-04 22:32:09'),
(10, 'UTY/K1/2021', '2021-02-04', 14, 3, 'Magang', 'Magang Kerja Praktik', 'example4.pdf', '2021-02-05 16:50:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','ketua') NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `level`, `id_karyawan`, `created`, `modified`) VALUES
(8, 'widodo', '21232f297a57a5a743894a0e4a801fc3', 'admin', 2, '0000-00-00 00:00:00', '2021-01-15 13:55:03'),
(29, 'bandri', '00719910bb805741e4b7f28527ecb3ad', 'ketua', 1, '2021-02-04 22:25:58', NULL),
(30, 'jumi', '0c47c1fb234be7df3f6545e5f2153400', 'ketua', 5, '2021-02-04 22:27:12', NULL),
(31, 'septi', '00719910bb805741e4b7f28527ecb3ad', 'ketua', 10, '2021-02-05 16:52:41', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_instansi`
--
ALTER TABLE `tb_instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_jenis_surat`
--
ALTER TABLE `tb_jenis_surat`
  ADD PRIMARY KEY (`id_js`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `tb_surat_keluar`
--
ALTER TABLE `tb_surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`),
  ADD KEY `id_instansi2` (`id_instansi`),
  ADD KEY `id_js2` (`id_js`);

--
-- Indexes for table `tb_surat_masuk`
--
ALTER TABLE `tb_surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`),
  ADD KEY `id_instansi` (`id_instansi`),
  ADD KEY `id_js` (`id_js`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_instansi`
--
ALTER TABLE `tb_instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_jenis_surat`
--
ALTER TABLE `tb_jenis_surat`
  MODIFY `id_js` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_surat_keluar`
--
ALTER TABLE `tb_surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_surat_masuk`
--
ALTER TABLE `tb_surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD CONSTRAINT `id_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`);

--
-- Constraints for table `tb_surat_keluar`
--
ALTER TABLE `tb_surat_keluar`
  ADD CONSTRAINT `id_instans2i` FOREIGN KEY (`id_instansi`) REFERENCES `tb_instansi` (`id_instansi`),
  ADD CONSTRAINT `id_js2` FOREIGN KEY (`id_js`) REFERENCES `tb_jenis_surat` (`id_js`);

--
-- Constraints for table `tb_surat_masuk`
--
ALTER TABLE `tb_surat_masuk`
  ADD CONSTRAINT `id_instansi` FOREIGN KEY (`id_instansi`) REFERENCES `tb_instansi` (`id_instansi`),
  ADD CONSTRAINT `id_js` FOREIGN KEY (`id_js`) REFERENCES `tb_jenis_surat` (`id_js`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
