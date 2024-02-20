-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2024 at 05:13 PM
-- Server version: 5.7.39
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbm_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id` int(10) NOT NULL,
  `id_laboratorium` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `spesifikasi` varchar(150) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `fungsi` varchar(50) DEFAULT NULL,
  `sumber` varchar(50) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `kondisi` int(11) DEFAULT NULL,
  `penggunaan` int(11) DEFAULT NULL,
  `keterangan` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id`, `id_laboratorium`, `nama`, `merk`, `spesifikasi`, `jumlah`, `fungsi`, `sumber`, `tahun`, `kondisi`, `penggunaan`, `keterangan`) VALUES
(61, '001', 'Monitor LCD 20\"', 'LG', '20 Inch', 15, 'Penunjang Praktikum', '-', '2015', 1, 1, '-'),
(62, '001', 'PC', 'Rakitan', 'Intel Core i3-4130 CPU @ 3.40 GHz', 15, 'Penunjang Praktikum', '-', '2015', 1, 1, '-'),
(63, '001', 'Keyboard', 'Logitech', '', 15, 'Penunjang Praktikum', '-', '2015', 1, 1, '-'),
(64, '001', 'Mouse', 'Logitech', '', 15, 'Penunjang Praktikum', '-', '2015', 1, 1, '-'),
(65, '001', 'Meja Komputer', 'Orbitrend', '', 16, 'Penunjang Praktikum', '-', '2016', 1, 1, '-'),
(66, '001', 'Kursi', 'Futura', '', 16, 'Penunjang Praktikum', '-', '2016', 1, 1, '-'),
(67, '001', 'Rak besi', '-', '', 1, '', '', '', 1, 1, '-'),
(68, '001', 'Monitor tabung 14\"', 'Samsung', '14 Inch', 1, '', '', '', 1, 1, '-'),
(69, '001', 'Air Conditioning (AC)', 'Sharp', '1 Pk', 2, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(70, '001', 'Switch Hub', 'D-Link', '24 Port', 1, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(71, '001', 'LCD', 'Epson', '', 1, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(72, '001', 'Layar LCD', '-', '', 1, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(73, '001', 'Keyboard', 'Six Stars', '', 1, '', '', '', 1, 1, '-'),
(74, '001', 'Mouse', 'Jet', '', 1, '', '', '', 1, 1, '-'),
(75, '002', 'Monitor LCD 19,5\"', 'Dell', '19,5 Inch', 20, 'Penunjang Praktikum', '-', '2018', 1, 1, '-'),
(76, '002', 'PC Dell Built In', 'Dell Vostro 3650', 'Intel Core i3-6098P, 4GB, 500GB HDD, DVD RW, Serial & Parallel Port, Nvidia GeForce 705, WiFi, BT, Ubuntu', 20, 'Penunjang Praktikum', '-', '2018', 1, 1, '-'),
(77, '002', 'Keyboard', 'Dell', '', 20, 'Penunjang Praktikum', '-', '2018', 1, 1, '-'),
(78, '002', 'Mouse', 'Dell', '', 20, 'Penunjang Praktikum', '-', '2018', 1, 1, '-'),
(79, '002', 'Meja Komputer', 'Expo', '', 21, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(80, '002', 'Kursi', 'Futura', '', 19, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(81, '002', 'Kursi', 'Chitose', '', 3, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(82, '002', 'Air Conditioning (AC)', 'Panasonic', '2 Pk', 1, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(83, '002', 'Switch Hub', 'D-Link', '24 Port', 1, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(84, '002', 'LCD', 'Epson', '', 1, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(85, '002', 'Layar LCD', '-', '', 1, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(86, '003', 'Monitor LCD 19,5\"', 'Acer', '19,5 Inch', 16, 'Penunjang Praktikum', '-', '2020', 1, 1, '-'),
(87, '003', 'PC Acer Built In', 'Acer Aspire TC-866', 'Intel® Core™ i7-9700 Processor, 8GB DDR4, HDD 1TB, NVIDIA® GeForce® GT 730, DVD Super-multi, Windows 10 Home', 16, 'Penunjang Praktikum', '-', '2020', 1, 1, '-'),
(88, '003', 'Keyboard', 'Acer', '', 16, 'Penunjang Praktikum', '-', '2020', 1, 1, '-'),
(89, '003', 'Mouse', 'Acer', '', 16, 'Penunjang Praktikum', '-', '2020', 1, 1, '-'),
(90, '003', 'Monitor LCD 20\"', 'Acer', '20 Inch', 4, 'Penunjang Praktikum', '-', '2018', 1, 1, '-'),
(91, '003', 'PC Acer Built In', 'Acer', 'Intel® Core™ i3-4170 Processor, 2GB DDR3, HDD 500GB, DVD Super Multi Drive, Integrated LAN', 4, 'Penunjang Praktikum', '-', '2018', 1, 1, '-'),
(92, '003', 'Keyboard', 'Acer', '', 4, 'Penunjang Praktikum', '-', '2018', 1, 1, '-'),
(93, '003', 'Mouse', 'Acer', '', 4, 'Penunjang Praktikum', '-', '2018', 1, 1, '-'),
(94, '003', 'Meja Komputer', 'Astec', '', 21, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(95, '003', 'Kursi', 'Futura', '', 22, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(96, '003', 'Air Conditioning (AC)', 'Panasonic', '2 Pk', 1, '', '', '', 1, 1, '-'),
(97, '003', 'Air Conditioning (AC)', 'Sharp', '1/2 Pk', 1, '', '', '', 1, 1, '-'),
(98, '003', 'Wifi Wireless', 'TP-Link TL-WA801ND', '300Mbps Wireless N Acces Point', 1, '', '', '', 1, 1, '-'),
(99, '003', 'LCD', 'Epson', '', 1, '', '', '', 1, 1, '-'),
(100, '001', 'Monitor LCD 20\"', 'LG', '20 Inch', 15, 'Penunjang Praktikum', '-', '2015', 1, 1, '-'),
(101, '001', 'PC', 'Rakitan', 'Intel Core i3-4130 CPU @ 3.40 GHz', 15, 'Penunjang Praktikum', '-', '2015', 1, 1, '-'),
(102, '001', 'Keyboard', 'Logitech', '', 15, 'Penunjang Praktikum', '-', '2015', 1, 1, '-'),
(103, '001', 'Mouse', 'Logitech', '', 15, 'Penunjang Praktikum', '-', '2015', 1, 1, '-'),
(104, '001', 'Meja Komputer', 'Orbitrend', '', 16, 'Penunjang Praktikum', '-', '2016', 1, 1, '-'),
(105, '001', 'Kursi', 'Futura', '', 16, 'Penunjang Praktikum', '-', '2016', 1, 1, '-'),
(106, '001', 'Rak besi', '-', '', 1, '', '', '', 1, 1, '-'),
(107, '001', 'Monitor tabung 14\"', 'Samsung', '14 Inch', 1, '', '', '', 1, 1, '-'),
(108, '001', 'Air Conditioning (AC)', 'Sharp', '1 Pk', 2, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(109, '001', 'Switch Hub', 'D-Link', '24 Port', 1, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(110, '001', 'LCD', 'Epson', '', 1, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(111, '001', 'Layar LCD', '-', '', 1, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(112, '001', 'Keyboard', 'Six Stars', '', 1, '', '', '', 1, 1, '-'),
(113, '001', 'Mouse', 'Jet', '', 1, '', '', '', 1, 1, '-'),
(114, '002', 'Monitor LCD 19,5\"', 'Dell', '19,5 Inch', 20, 'Penunjang Praktikum', '-', '2018', 1, 1, '-'),
(115, '002', 'PC Dell Built In', 'Dell Vostro 3650', 'Intel Core i3-6098P, 4GB, 500GB HDD, DVD RW, Serial & Parallel Port, Nvidia GeForce 705, WiFi, BT, Ubuntu', 20, 'Penunjang Praktikum', '-', '2018', 1, 1, '-'),
(116, '002', 'Keyboard', 'Dell', '', 20, 'Penunjang Praktikum', '-', '2018', 1, 1, '-'),
(117, '002', 'Mouse', 'Dell', '', 20, 'Penunjang Praktikum', '-', '2018', 1, 1, '-'),
(118, '002', 'Meja Komputer', 'Expo', '', 21, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(119, '002', 'Kursi', 'Futura', '', 19, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(120, '002', 'Kursi', 'Chitose', '', 3, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(121, '002', 'Air Conditioning (AC)', 'Panasonic', '2 Pk', 1, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(122, '002', 'Switch Hub', 'D-Link', '24 Port', 1, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(123, '002', 'LCD', 'Epson', '', 1, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(124, '002', 'Layar LCD', '-', '', 1, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(125, '003', 'Monitor LCD 19,5\"', 'Acer', '19,5 Inch', 16, 'Penunjang Praktikum', '-', '2020', 1, 1, '-'),
(126, '003', 'PC Acer Built In', 'Acer Aspire TC-866', 'Intel® Core™ i7-9700 Processor, 8GB DDR4, HDD 1TB, NVIDIA® GeForce® GT 730, DVD Super-multi, Windows 10 Home', 16, 'Penunjang Praktikum', '-', '2020', 1, 1, '-'),
(127, '003', 'Keyboard', 'Acer', '', 16, 'Penunjang Praktikum', '-', '2020', 1, 1, '-'),
(128, '003', 'Mouse', 'Acer', '', 16, 'Penunjang Praktikum', '-', '2020', 1, 1, '-'),
(129, '003', 'Monitor LCD 20\"', 'Acer', '20 Inch', 4, 'Penunjang Praktikum', '-', '2018', 1, 1, '-'),
(130, '003', 'PC Acer Built In', 'Acer', 'Intel® Core™ i3-4170 Processor, 2GB DDR3, HDD 500GB, DVD Super Multi Drive, Integrated LAN', 4, 'Penunjang Praktikum', '-', '2018', 1, 1, '-'),
(131, '003', 'Keyboard', 'Acer', '', 4, 'Penunjang Praktikum', '-', '2018', 1, 1, '-'),
(132, '003', 'Mouse', 'Acer', '', 4, 'Penunjang Praktikum', '-', '2018', 1, 1, '-'),
(133, '003', 'Meja Komputer', 'Astec', '', 21, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(134, '003', 'Kursi', 'Futura', '', 22, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(135, '003', 'Air Conditioning (AC)', 'Panasonic', '2 Pk', 1, '', '', '', 1, 1, '-'),
(136, '003', 'Air Conditioning (AC)', 'Sharp', '1/2 Pk', 1, '', '', '', 1, 1, '-'),
(137, '003', 'Wifi Wireless', 'TP-Link TL-WA801ND', '300Mbps Wireless N Acces Point', 1, '', '', '', 1, 1, '-'),
(138, '003', 'LCD', 'Epson', '', 1, '', '', '', 1, 1, '-'),
(139, '004', 'Monitor LCD 19,5\"', 'Dell', '19,5 Inch', 4, 'Penunjang Praktikum', '-', '2018', 1, 1, '-'),
(140, '004', 'CPU Komputer Dell Built In', 'Dell Vostro 3650', 'Intel Core i3-6098P, 4GB, 500GB HDD, DVD RW, Serial & Parallel Port, Nvidia GeForce 705, WiFi, BT, Ubuntu', 4, 'Penunjang Praktikum', '-', '2018', 1, 1, '-'),
(141, '004', 'Keyboard', 'Dell', '', 4, 'Penunjang Praktikum', '-', '2018', 1, 1, '-'),
(142, '004', 'Mouse', 'Dell', '', 4, 'Penunjang Praktikum', '-', '2018', 1, 1, '-'),
(143, '004', 'PC Acer Built In', 'Acer', 'Intel R Dual Core 2.2 Ghz, RAM 2GB DDR II, VGA 256 MB, HDD 160GB, DVD-RW, Win Xp', 9, 'Penunjang Praktikum', '-', '2008', 1, 1, '-'),
(144, '004', 'Monitor Acer 15\"', 'Acer', 'LCD 15\"', 9, 'Penunjang Praktikum', '-', '2008', 1, 1, '-'),
(145, '004', 'Monitor LCD 15\"', 'Samsung', 'LCD 15\"', 1, 'Penunjang Praktikum', '-', '2008', 1, 1, '-'),
(146, '004', 'Monitor LCD 15\"', 'LG', 'LCD 15\"', 1, 'Penunjang Praktikum', '-', '2008', 1, 1, '-'),
(147, '004', 'PC Rakitan', '', 'Intel R Dual Core, RAM DDR II 1Gb, HDD 80Gb, DVD', 2, 'Penunjang Praktikum', '-', '2008', 1, 1, '-'),
(148, '004', 'Keyboard', 'Acer', '', 9, 'Penunjang Praktikum', '-', '2008', 1, 1, '-'),
(149, '004', 'Mouse', 'Acer', '', 5, 'Penunjang Praktikum', '-', '2008', 1, 1, '-'),
(150, '004', 'Keyboard', 'Votre', '', 2, 'Penunjang Praktikum', '-', '2008', 1, 1, '-'),
(151, '004', 'Mouse', 'Logitech', '', 4, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(152, '004', 'Mouse', 'Jet', '', 2, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(153, '004', 'Meja Komputer', 'Astec', '', 10, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(154, '004', 'Meja Komputer', 'Pro Design', 'Model DC-110', 6, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(155, '004', 'Kursi', 'Futura', '', 17, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(156, '004', 'Air Conditioning (AC)', 'Sharp', '2 Pk', 1, 'Penunjang Praktikum', '', '', 1, 1, '-'),
(157, '004', 'Wifi Wireless', 'TP-Link TL-WA801ND', '300Mbps Wireless N Acces Point', 1, 'Penunjang Praktikum', '', '', 1, 1, '-');

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_lab`
--

CREATE TABLE `inventaris_lab` (
  `id` int(11) NOT NULL,
  `id_laboratorium` varchar(5) NOT NULL,
  `id_alat` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris_lab`
--

INSERT INTO `inventaris_lab` (`id`, `id_laboratorium`, `id_alat`, `jumlah`, `keterangan`) VALUES
(11, '001', 'D001', 15, '-'),
(12, '001', 'D001', 15, '-');

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium`
--

CREATE TABLE `laboratorium` (
  `id` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `penanggung_jawab` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorium`
--

INSERT INTO `laboratorium` (`id`, `nama`, `kapasitas`, `penanggung_jawab`) VALUES
('001', 'LABORATORIUM MULTIMEDIA', 15, 'Ir. Dadang Iskandar, S.T., M.Eng'),
('002', 'LABORATORIUM PEMROGRAMAN', 20, 'Bangun Wijayanto, S.T.,M.Cs'),
('003', 'LABORATORIUM JARINGAN', 20, 'Ir. Dadang Iskandar, S.T., M.Eng'),
('004', 'LABORATORIUM RISET', 15, 'Swahesti Puspita Rahayu , S.Kom.,M.T');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `ttd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`nip`, `nama`, `jabatan`, `ttd`) VALUES
('198107052008012024', 'Swahesti Puspita Rahayu , S.Kom.,M.T', 'Kepala Laboratorium Riset', NULL),
('198306182006041002', 'Bangun Wijayanto, S.T.,M.Cs', 'Kepala Laboratorium Pemrograman', 'TTD Pak Bangun.png'),
('198312022015041001', 'Ir. Dadang Iskandar, S.T., M.Eng', 'Kepala Laboratorium Jaringan', 'TTD Pak Dadang.png'),
('198703022014041002', 'Gilang Dwi Ratmana, A.Md', 'Teknisi Laboratorium', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surat_bebas`
--

CREATE TABLE `surat_bebas` (
  `no_surat` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `judul` varchar(1000) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_bebas`
--

INSERT INTO `surat_bebas` (`no_surat`, `nama`, `nim`, `judul`, `tanggal`) VALUES
('No : 001/LAB-TIF/PEN/06/2016', 'Safa Muazam', 'H1D017061', 'Rancang Bangun Sistem Computer Based Test (CBT) Dalam Proses Seleksi Penerimaan Prajurit Tahap Akademik Di TNI Angkatan Udara', '2023-10-31'),
('No : 002/LAB-TIF/PEN/06/2016', 'Nabilla Anggraini', 'H1D017045', 'Rancang Bangun Sistem Computer Based Test (CBT) Dalam Proses Seleksi Penerimaan Prajurit Tahap Akademik Di TNI Angkatan Udara', '2023-11-03'),
('No : 005/LAB-TIF/PEN/06/2016', 'Nabilla Anggraini', 'H1D017045', 'Rancang Bangun Sistem Computer Based Test (CBT) Dalam Proses Seleksi Penerimaan Prajurit Tahap Akademik Di TNI Angkatan Udara', '2023-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `surat_peminjaman`
--

CREATE TABLE `surat_peminjaman` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `noHp` varchar(15) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `pinjam` date DEFAULT NULL,
  `kembali` date DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL,
  `keperluan` varchar(255) DEFAULT NULL,
  `alat` json DEFAULT NULL,
  `jumlah` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_peminjaman`
--

INSERT INTO `surat_peminjaman` (`id`, `nama`, `nim`, `noHp`, `tanggal`, `pinjam`, `kembali`, `durasi`, `keperluan`, `alat`, `jumlah`) VALUES
(8, 'Safa Muazam', 'H1D017045', '6285258946706', '2023-11-09', '2023-11-09', '2023-11-09', 2, 'Ekskul', '[\"Node MCU\", \"Arduino\", \"Kabel\"]', '[\"3\", \"4\", \"13\"]'),
(9, 'Muhammad Ilham', 'H1D017045', '6285258946706', '2023-11-09', '2023-11-09', '2023-11-09', 2, 'Ekskul', '[\"Node MCU\", \"Arduino\", \"Breadboard\"]', '[\"3\", \"4\", \"1\"]'),
(11, 'fardan Muazam', 'H1D020059', '6285258946706', '2024-02-20', '2023-11-14', '2023-11-25', 11, 'Ekskul Robotika', '[\"Arduino\", \"Ralley\", \"Kabel Jumper\"]', '[\"7\", \"2\", \"34\"]'),
(14, 'fardan Maula', 'H1D020059', '6285258946706', '2024-02-20', '2023-11-14', '2023-11-25', 11, 'Ekskul Robotika', '[\"ard\"]', '[\"1\"]');

-- --------------------------------------------------------

--
-- Table structure for table `surat_penelitian`
--

CREATE TABLE `surat_penelitian` (
  `no_surat` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `judul` varchar(1000) NOT NULL,
  `tanggal` date NOT NULL,
  `namaDospem` varchar(100) NOT NULL,
  `nipDospem` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_penelitian`
--

INSERT INTO `surat_penelitian` (`no_surat`, `nama`, `nim`, `judul`, `tanggal`, `namaDospem`, `nipDospem`) VALUES
('No : 001/LAB-TIF/PEN/06/2016', 'Nabilla Anggraini', 'H1D017045', 'Rancang Bangun Sistem Computer Based Test (CBT) Dalam Proses Seleksi Penerimaan Prajurit Tahap Akademik Di TNI Angkatan Udara', '2023-11-08', 'Safa Muazam', '12435432523431'),
('No : 003/LAB-TIF/PEN/06/2016', 'Nabilla Anggraini', 'H1D017045', 'Rancang Bangun Sistem Computer Based Test (CBT) Dalam Proses Seleksi Penerimaan Prajurit Tahap Akademik Di TNI Angkatan Udara', '2023-11-01', 'Safa Muazam azizi', '123456778');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaris_lab`
--
ALTER TABLE `inventaris_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `surat_bebas`
--
ALTER TABLE `surat_bebas`
  ADD PRIMARY KEY (`no_surat`);

--
-- Indexes for table `surat_peminjaman`
--
ALTER TABLE `surat_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_penelitian`
--
ALTER TABLE `surat_penelitian`
  ADD PRIMARY KEY (`no_surat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `inventaris_lab`
--
ALTER TABLE `inventaris_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `surat_peminjaman`
--
ALTER TABLE `surat_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
