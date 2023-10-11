-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 09:02 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `sumber` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `kondisi_sebelum` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jdl_pengajuan`
--

CREATE TABLE `tbl_jdl_pengajuan` (
  `id_judul` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nodok` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Bahan'),
(8, 'Alat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `id_log` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `aktivitas` varchar(255) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`id_log`, `id_user`, `aktivitas`, `waktu`, `is_deleted`) VALUES
(224, 'Admin1', 'Delete data <b>ASD-4</b> di tabel <b>Barang<b>', '2023-October-11 13:37:38', 0),
(225, 'Admin1', 'Delete data <b>ASD-3</b> di tabel <b>Barang<b>', '2023-October-11 13:37:40', 0),
(226, 'Admin1', 'Delete data <b>ASD-2</b> di tabel <b>Barang<b>', '2023-October-11 13:37:41', 0),
(227, 'Admin1', 'Delete data <b>ASD-1</b> di tabel <b>Barang<b>', '2023-October-11 13:37:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `waktu_pinjam` datetime NOT NULL,
  `waktu_kembali` datetime NOT NULL,
  `kondisi_sesudah` varchar(30) NOT NULL,
  `status_peminjaman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan`
--

CREATE TABLE `tbl_pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_judul` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `spek` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga` int(20) NOT NULL,
  `total_harga` int(40) NOT NULL,
  `untuk` varchar(255) NOT NULL,
  `urgensi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `nama_sarpras` varchar(50) NOT NULL,
  `nip_sarpras` varchar(50) NOT NULL,
  `nama_kepsek` varchar(50) NOT NULL,
  `nip_kepsek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`nama_sarpras`, `nip_sarpras`, `nama_kepsek`, `nip_kepsek`) VALUES
('Puguh Hartono, S.Pd.', '19700315 200312 1 009', 'Drs. Gunawan Dwiyono, S.ST., M.Pd', '19700315 200312 1 009');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jurusan` varchar(15) NOT NULL,
  `abjad` varchar(10) NOT NULL,
  `no_identitas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nama_siswa`, `kelas`, `jurusan`, `abjad`, `no_identitas`) VALUES
(20, 'ABHINAYA REI AHMAD SYAFAWI', 'X', 'Animasi', 'A', '25225 / 1510 . 127'),
(21, 'AHMAD RIDWAN MAULANA', 'X', 'Animasi', 'A', '25226 / 1511 . 127'),
(22, 'ANANDA RIZKY PUTRA PAMUNGKAS', 'X', 'Animasi', 'A', '25227 / 1512 . 127'),
(23, 'ANDIKA BAYU PRATAMA', 'X', 'Animasi', 'A', '25228 / 1513 . 127'),
(24, 'ANISA ARBI ASA AULIA', 'X', 'Animasi', 'A', '25229 / 1514 . 127'),
(25, 'ASYA FARAH AZZAHRA', 'X', 'Animasi', 'A', '25230 / 1515 . 127'),
(26, 'AYASHA ALMA KHAIRUNNISA', 'X', 'Animasi', 'A', '25231 / 1516 . 127'),
(27, 'AZKA AZKIYA PUTRI ALYA', 'X', 'Animasi', 'A', '25232 / 1517 . 127'),
(28, 'AZKA HAURA', 'X', 'Animasi', 'A', '25233 / 1518 . 127'),
(29, 'CANIA RAMADHANI', 'X', 'Animasi', 'A', '25234 / 1519 . 127'),
(30, 'CHALSIA MAYANG SARI', 'X', 'Animasi', 'A', '25235 / 1520 . 127'),
(31, 'DEVI AMALLIA SAPUTRI', 'X', 'Animasi', 'A', '25236 / 1521 . 127'),
(32, 'ECCA PUTRI LESTARI', 'X', 'Animasi', 'A', '25237 / 1522 . 127'),
(33, 'FAIZ ALDILA ROMADHON', 'X', 'Animasi', 'A', '25238 / 1523 . 127'),
(34, 'FARIS FIRMANSYAH', 'X', 'Animasi', 'A', '25239 / 1524 . 127'),
(35, 'FARIDDUDIN ATTAR', 'X', 'Animasi', 'A', '25240 / 1525 . 127'),
(36, 'HAIFANI CHITA HANDYALEVI ', 'X', 'Animasi', 'A', '25241 / 1526 . 127'),
(37, 'HAURA LATIFA FARRAS', 'X', 'Animasi', 'A', '25242 / 1527 . 127 '),
(38, 'INAYAH PUTRI', 'X', 'Animasi', 'A', '25243 / 1528 . 127'),
(39, 'MOCHAMMAD RIFQI KHOIRUDIN', 'X', 'Animasi', 'A', '25244 / 1529 . 127'),
(40, 'MOHAMMAD ALDY HABBIBIE', 'X', 'Animasi', 'A', '25245 / 1530 . 127'),
(41, 'MUHAMMAD IBTISAM MAGRIBI', 'X', 'Animasi', 'A', '25246 / 1531 . 127'),
(42, 'NABILA KANIA ASTRIVIANI', 'X', 'Animasi', 'A', '25247 / 1532 . 127'),
(43, 'NASYWAA YULISA ELFIRA', 'X', 'Animasi', 'A', '25248 / 1533 . 127'),
(44, 'PRAMUDITA PARAMESWARA', 'X', 'Animasi', 'A', '25249 / 1534 . 127'),
(45, 'RADITYA OKTALYON JUMANTARA ATMAJA', 'X', 'Animasi', 'A', '25220 / 1535 . 127'),
(46, 'RICKO AFRIZAL DIKDAYA', 'X', 'Animasi', 'A', '25251 / 1536 . 127'),
(47, 'RIZQI FARADILA SANDY', 'X', 'Animasi', 'A', '25252 / 1537 . 127'),
(48, 'RUIZ ZACHDIN', 'X', 'Animasi', 'A', '25253 / 1538 . 127'),
(49, 'SEKAR ANANDITA DEWI', 'X', 'Animasi', 'A', '25254 / 1539 / 127'),
(50, 'SHAKIRA SAHWAHITA', 'X', 'Animasi', 'A', '25255 / 1540 . 127'),
(51, 'SHILA APRILIA PUTRI NUGROHO', 'X', 'Animasi', 'A', '25256 / 1541 . 127'),
(52, 'TSANA SHAZIA JASMINE RAHARJO', 'X', 'Animasi', 'A', '25257 / 1542 . 127'),
(53, 'TSANIA AYU PRAHAPSARI', 'X', 'Animasi', 'A', '25258 / 1543 . 127'),
(54, 'WICHITA MARSAA AQIL', 'X', 'Animasi', 'A', '25259 / 1544 . 127'),
(55, 'YUSUF BAIHAQI', 'X', 'Animasi', 'A', '25260 / 1545 . 127'),
(56, 'ABIMANYU GATHAN ALVARO', 'X', 'Animasi', 'B', '25261 / 1546 . 127'),
(57, 'ADI SYAPUTRA WIJIARTHA', 'X', 'Animasi', 'B', '25262 / 1547 . 127'),
(58, 'ADZWAN RIVI SANTOSO', 'X', 'Animasi', 'B', '25263 / 1548 . 127'),
(59, 'AKHTAR DZAKWAN', 'X', 'Animasi', 'B', '25264 / 1549 . 127'),
(60, 'ALVINO RULIANZA MUHAMMAD', 'X', 'Animasi', 'B', '25265 / 1550 . 127'),
(61, 'ANDIKA ACHMAD DHIYAUDDIN ALAZMI', 'X', 'Animasi', 'B', '25266 / 1551 . 127'),
(62, 'ARLA HAVIZA ARINDA HASIB', 'X', 'Animasi', 'B', '25267 / 1552 . 127'),
(63, 'AURELLIA EGLESSIAS NURYAHYA RAHMAN', 'X', 'Animasi', 'B', '25268 / 1553 . 127'),
(64, 'CATUR DANU SATRIYO PAMUNGKAS', 'X', 'Animasi', 'B', '25269 / 1554 . 127'),
(65, 'DAVA ADYTIYA SAPUTRA', 'X', 'Animasi', 'B', '25270 / 1555 . 127'),
(66, 'DESEMBRIAR BAGAS AREMANSYAH', 'X', 'Animasi', 'B', '25271 / 1556 . 127'),
(67, 'DHANIA PUTRI PERMANA', 'X', 'Animasi', 'B', '25272 / 1557 . 127'),
(68, 'DURRANI SABRINA ASFA', 'X', 'Animasi', 'B', '25273 / 1558 . 127'),
(69, 'ELVARA SALSABILAH', 'X', 'Animasi', 'B', '25274 / 1559 . 127'),
(70, 'GELYA CALISTA NAFLAH BEFANI', 'X', 'Animasi', 'B', '25275 / 1560 . 127'),
(71, 'HERCINDIO RAYHAN BUDI PRATHAMA', 'X', 'Animasi', 'B', '25276 / 1561 . 127'),
(72, 'JIDAN ADIJAYA', 'X', 'Animasi', 'B', '25277 / 1562 . 127'),
(73, 'LILA AYU PUTRI FEBRIANI', 'X', 'Animasi', 'B', '25278 / 1563 . 127'),
(74, 'MADDY SETYO RENDIKA', 'X', 'Animasi', 'B', '25279 / 1564 . 127'),
(75, 'MERISA DWI WULANDARI YANUAR', 'X', 'Animasi', 'B', '25280 / 1565 . 127'),
(76, 'MOCH DWI ANDRIANSYAH', 'X', 'Animasi', 'B', '25281 / 1566 . 127'),
(77, 'MOCHAMMAD FAREL FIRMANSYAH', 'X', 'Animasi', 'B', '25282 / 1567 . 127'),
(78, 'MUHAMAD AGUNG FIRMANSYAH', 'X', 'Animasi', 'B', '25283 / 1568 . 127'),
(79, 'MUHAMMAD ALAIKA BITTUQO', 'X', 'Animasi', 'B', '25284 / 1569 . 127'),
(80, 'MUHAMMAD RIANDY WAHYU ROMADHON', 'X', 'Animasi', 'B', '25285 / 1570 . 127'),
(81, 'RACHEL CRISNATASYA', 'X', 'Animasi', 'B', '25286 / 1571 . 127'),
(82, 'RAJUAN RAFI PUTRA SUWANTO', 'X', 'Animasi', 'B', '25287 / 1572 . 127'),
(83, 'RIZKY PRASTYA ADJI', 'X', 'Animasi', 'B', '25288 / 1573 . 127'),
(84, 'SALAISYA ZAHIRA PUTRI NABILA', 'X', 'Animasi', 'B', '25289 / 1574 . 127'),
(85, 'SHABIRA AQHIEL HERNANDA PUTRI', 'X', 'Animasi', 'B', '25290 / 1575 . 127'),
(86, 'SHIFA PUTRI MAULIDYA', 'X', 'Animasi', 'B', '25291 / 1576 . 127'),
(87, 'SYERA AISHARISMA MAHARANI', 'X', 'Animasi', 'B', '25292 / 1577 . 127'),
(88, 'YUDA PUTRA PRATAMA', 'X', 'Animasi', 'B', '25293 / 1578 . 127'),
(89, 'ZAHRA AMELIA', 'X', 'Animasi', 'B', '25294 / 1579 . 127'),
(90, 'ZAENAB MIFTAKHUL KARBELANI', 'X', 'Animasi', 'B', '25295 / 1580 . 127'),
(91, 'ACHMAD ADITYA', 'X', 'Animasi', 'C', '25296 / 1581 . 127'),
(92, 'ADITYA DWI RIZKY RAMADHAN', 'X', 'Animasi', 'C', '25297 / 1582 . 127'),
(93, 'AILEEN CARELIA WIDI GAYNELL THEOPHANIA', 'X', 'Animasi', 'C', '25298 / 1583 . 127'),
(94, 'ALBYAN MAULANA IZHA', 'X', 'Animasi', 'C', '25299 / 1584 . 127'),
(95, 'AMANDA WIBOWO PUTRI', 'X', 'Animasi', 'C', '25300 / 1585 . 127'),
(96, 'ANINNATUS SHOLIHA', 'X', 'Animasi', 'C', '25301 / 1586 . 127'),
(97, 'AULIA PUAN PRAMUDHITA', 'X', 'Animasi', 'C', '25302 / 1587 . 127'),
(98, 'BAGAS RINGGA HADY SAPUTRA', 'X', 'Animasi', 'C', '25303 / 1588 . 127'),
(99, 'CHELSEA MAURA SIONO', 'X', 'Animasi', 'C', '25304 / 1589 . 127'),
(100, 'DAVAN DWI PRASTYO', 'X', 'Animasi', 'C', '25305 / 1590 . 127'),
(101, 'DEWITA SITI AZRIVAH', 'X', 'Animasi', 'C', '25306 / 1591 . 127'),
(102, 'DICKY THUFAIL RAFI SENA', 'X', 'Animasi', 'C', '25307 / 1592 . 127'),
(103, 'ELQUEENA AISHAFIRA SHAFA', 'X', 'Animasi', 'C', '25308 / 1593 . 127'),
(104, 'FARREL AURELIO SETYA BASWARA ', 'X', 'Animasi', 'C', '25309 / 1594 . 127'),
(105, 'HANIFAH ALTHAFUNNISA', 'X', 'Animasi', 'C', '25310 / 1595 . 127'),
(106, 'IRHAM FAIZ WIBOWO', 'X', 'Animasi', 'C', '25311 / 1596 . 127'),
(107, 'KELVIN MUJI SETYA WIJAYA', 'X', 'Animasi', 'C', '25312 / 1597 . 127'),
(108, 'LINGGAR ADITYA FERNANDO', 'X', 'Animasi', 'C', '25313 / 1598 . 127'),
(109, 'MARCELINO AHMAD BAYU SYAHPUTRA', 'X', 'Animasi', 'C', '25314 / 1599 . 127'),
(110, 'MOCH ASWAN RAMADHANI', 'X', 'Animasi', 'C', '25315 / 1600 . 127'),
(111, 'MOCH RAFI SATRYO', 'X', 'Animasi', 'C', '25316 / 1601 . 127'),
(112, 'MOHAMMAD RAKA ABIDZAR', 'X', 'Animasi', 'C', '25317 / 1602 . 127 '),
(113, 'MUHAMMAD AGUNG GHONY ILHAM HABIBI', 'X', 'Animasi', 'C', '25318 / 1603 . 127'),
(114, 'MUHAMMAD ANDI CAHYONO', 'X', 'Animasi', 'C', '25319 / 1604 . 127'),
(115, 'MUHAMMAD RAKHA TSAQIF MARANGGRAPUTRA', 'X', 'Animasi', 'C', '25320 / 1605 . 127'),
(116, 'MUHAMMAD RIZAL ZAHMI ', 'X', 'Animasi', 'C', '25321 / 1606 . 127'),
(117, 'NAVY HAFISH ADINNANSYAH WIBISONO', 'X', 'Animasi', 'C', '25322 / 1607 . 127'),
(118, 'RAFEL BIRAMA WINARNO', 'X', 'Animasi', 'C', '25323 / 1608 . 127'),
(119, 'SAFINATUR ROHMAH', 'X', 'Animasi', 'C', '25324 / 1609 . 127'),
(120, 'SEFIRA NOVIA RARA INDAHYANI', 'X', 'Animasi', 'C', '25325 / 1610 . 127'),
(121, 'SHERINDA SENDANG KINASIH', 'X', 'Animasi', 'C', '25326 / 1611 . 127'),
(122, 'SHIKANARA DIANDRA VAREMANITA', 'X', 'Animasi', 'C', '25327 / 1612 . 127'),
(123, 'SITI INDAH WASTUTI', 'X', 'Animasi', 'C', '25328 / 1613 . 127'),
(124, 'YOGA PANJI PANGESTU', 'X', 'Animasi', 'C', '25329 / 1614 . 127'),
(125, 'ZAZKYA SYAFARA NOFRA HADINDA', 'X', 'Animasi', 'C', '25330 / 1615 . 127'),
(126, 'ABIYYU DZAKY SHOFWAN', 'XI', 'Animasi', 'A', '24326 / 1404 . 127'),
(127, 'ARDIANSYAH PANDU ARLIYADI', 'XI', 'Animasi', 'A', '24327 / 1405 . 127'),
(128, 'ARINA HASNA AULIA', 'XI', 'Animasi', 'A', '24328 / 1406 . 127'),
(129, 'ARNETTA NANDA PRAMUDIA', 'XI', 'Animasi', 'A', '24329 / 1407 . 127'),
(130, 'AXELLE JAUZA WIDI PRATAMA', 'XI', 'Animasi', 'A', '24330 / 1408 . 127'),
(131, 'BILQIS PUTRI GIKA VALENCIA', 'XI', 'Animasi', 'A', '24331 / 1409 . 127'),
(132, 'DEVEN KHRISNA PUTRA KUSUMA', 'XI', 'Animasi', 'A', '24334 / 1412 . 127'),
(133, 'DHOZER MARQUESH SUGIARTO', 'XI', 'Animasi', 'A', '24335 / 1413 . 127'),
(134, 'DIRGA EKA RAMADHANI', 'XI', 'Animasi', 'A', '24336 / 1414 . 127'),
(135, 'DZAKYA RAHMA ARHEANSYAH', 'XI', 'Animasi', 'A', '24337 / 1415 . 127'),
(136, 'IAN IMMANUEL SUSILO', 'XI', 'Animasi', 'A', '24338 / 1416 . 127'),
(137, 'KHUROIDATUN NADZIFAH', 'XI', 'Animasi', 'A', '24339 / 1417 . 127'),
(138, 'KINAN NUR HIASATI', 'XI', 'Animasi', 'A', '24340 / 1418 . 127'),
(139, 'LARASHATI TORIQO ISLAMI', 'XI', 'Animasi', 'A', '24341 / 1419 . 127'),
(140, 'MUHAMAD ZAKLY HAKIM', 'XI', 'Animasi', 'A', '24342 / 1420 . 127'),
(141, 'MUHAMMAD FARREL NUR ALIF', 'XI', 'Animasi', 'A', '24343 / 1421 . 127'),
(142, 'MUHAMMAD IQBAL AZZAHIR', 'XI', 'Animasi', 'A', '24344 / 1422 . 127'),
(143, 'MUHAMMAD YAQDHAN RAFIF B', 'XI', 'Animasi', 'A', '24345 / 1423 . 127'),
(144, 'NABILA HAYA AGUSTIN', 'XI', 'Animasi', 'A', '24346 / 1424 . 127'),
(145, 'NAJWA AURORA MAHSYA', 'XI', 'Animasi', 'A', '24347 / 1425 . 127'),
(146, 'NATAKA JURO BALAKOSA', 'XI', 'Animasi', 'A', '24348 / 1426 . 127'),
(147, 'NATANIA ZAHRA WAHYU CAHYANI', 'XI', 'Animasi', 'A', '24349 / 1427 . 127'),
(148, 'NAYLA PUTRI RAMADHANI', 'XI', 'Animasi', 'A', '24350 / 1428 . 127'),
(149, 'RAFFAN AHMAD AUFAL BAHRI', 'XI', 'Animasi', 'A', '24351 / 1429 . 127'),
(150, 'RASYA RAHMADANI PUTRI', 'XI', 'Animasi', 'A', '24352 / 1430 . 127'),
(151, 'ROIS GIZA MUSTHOFA AL ISLAMI', 'XI', 'Animasi', 'A', '24353 / 1431 . 127'),
(152, 'SABRINA EKA PRATIWI', 'XI', 'Animasi', 'A', '24355 / 1433 . 127'),
(153, 'SALSABILA SAFIRA CANDRAWATI', 'XI', 'Animasi', 'A', '24356 / 1434 . 127'),
(154, 'SELLYRA MELODIS CAVALERA', 'XII', 'Animasi', 'A', '24357 / 1435 . 127'),
(155, 'SHEVA ISMA WICAKSANA', 'XI', 'Animasi', 'A', '24358 / 1436 . 127'),
(156, 'SUKMA RENDRA FATAHILLAH', 'XI', 'Animasi', 'A', '24359 / 1437 . 127'),
(157, 'SYAHRUL RAMADHAN', 'XI', 'Animasi', 'A', '24360 / 1438 . 127'),
(158, 'ADITYA CRISHNA PRADANA', 'XI', 'Animasi', 'B', '24361 / 1439 . 127'),
(159, 'AMALIA AZKIYAH', 'XI', 'Animasi', 'B', '24362 / 1440 . 127'),
(160, 'ANDINNI CITRAHANNA HAPSARI', 'XI', 'Animasi', 'B', '24363 / 1441 . 127'),
(161, 'ANNISA NANDA PRATIWI', 'XI', 'Animasi', 'B', '24364 / 1442 . 127'),
(162, 'APRILIA RIZKI ISTIQOMAH', 'XI', 'Animasi', 'B', '24365 / 1443 . 127'),
(163, 'AQILAH LUQMANUL HAKIM', 'XI', 'Animasi', 'B', '24366 / 1444 . 127'),
(164, 'ARZHO ALPUTRA NDOEN', 'XI', 'Animasi', 'B', '24368 / 1446 . 127'),
(165, 'DIANDRINA ARISKA PUTRI', 'XI', 'Animasi', 'B', '24369 / 1447 . 127'),
(166, 'ERIKA NOVIA ARDIANI', 'XI', 'Animasi', 'B', '24370 / 1448 . 127'),
(167, 'FAHRIEL WAHYUHADIST SYAHPUTRA', 'XI', 'Animasi', 'B', '24371 / 1449 . 127'),
(168, 'FAJARUL RAUFIZZAT NURIAWAN PUTRO', 'XI', 'Animasi', 'B', '24372 / 1450 . 127'),
(169, 'FANDI FEBRIANSYAH', 'XI', 'Animasi', 'B', '24373 / 1451 . 127'),
(170, 'FIO JUAN PRASETYA', 'XI', 'Animasi', 'B', '24374 / 1452 . 127'),
(171, 'GENIUZ GZA DJAUZIYYA', 'XI', 'Animasi', 'B', '24375 / 1453 . 127'),
(172, 'HAIDAR RAFI', 'XI', 'Animasi', 'B', '24376 / 1454 . 127'),
(173, 'JENICA ZAHRA VALIDIA', 'XI', 'Animasi', 'B', '24377 / 1455 . 127'),
(174, 'MOCH FEBRIYAN ZAKARIA', 'XI', 'Animasi', 'B', '24379 / 1457 . 127'),
(175, 'MOCH. AQHDAN AFIZ', 'XI', 'Animasi', 'B', '24380 / 1458 . 127'),
(176, 'MOCHAMAD RAFI PRATAMA', 'XI', 'Animasi', 'B', '24381 / 1459 . 127'),
(177, 'MOCHAMMAD DIXIE TANDYAN PRIBADI', 'XI', 'Animasi', 'B', '24382 / 1460 . 127'),
(178, 'MUHAMAD DYLAN SYAH PUTRA', 'XI', 'Animasi', 'B', '24383 / 1461 . 127	'),
(179, 'MUHAMMAD AKHTAR RAFI', 'XI', 'Animasi', 'B', '24384 / 1462 . 127'),
(180, 'NADIA AULIA RAHMA', 'XI', 'Animasi', 'B', '24385 / 1463 . 127'),
(181, 'NADILA NURAINI', 'XI', 'Animasi', 'B', '24386 / 1464 . 127'),
(182, 'NAFIS ABIYYU BASTIAN', 'XI', 'Animasi', 'B', '24387 / 1465 . 127'),
(183, 'NAYLA ARASHY KAMAL', 'XI', 'Animasi', 'B', '24388 / 1466 . 127'),
(184, 'ORIEZA AULIA DZIKRI', 'XI', 'Animasi', 'B', '24389 / 1467 . 127'),
(185, 'OVILIA BUNGA CITRA LAUDYA', 'XI', 'Animasi', 'B', '24390 / 1468 . 127'),
(186, 'RIZKY KHARISMA INDAH HAPSARI', 'XI', 'Animasi', 'B', '24393 / 1471 . 127'),
(187, 'SASKIA LAILI RAMADHANI', 'XI', 'Animasi', 'B', '24394 / 1472 . 127'),
(188, 'ACHMAD DWI DHARMAWAN H.', 'XI', 'Animasi', 'C', '24396 / 1474 . 127'),
(189, 'ADDIANA NAYLA PUTRI AMANI', 'XI', 'Animasi', 'C', '24397 / 1475 . 127'),
(190, 'AL FARREL ENZO FAHRIZA', 'XI', 'Animasi', 'C', '24398 / 1476 . 127'),
(191, 'ALLISYA RENA NATHANIYA', 'XI', 'Animasi', 'C', '24400 / 1478 . 127'),
(192, 'ANABEL TSAMIRA AZIZ', 'XI', 'Animasi', 'C', '24401 / 1479 . 127'),
(193, 'ANDIKA EKA SAPUTRA', 'XI', 'Animasi', 'C', '24402 / 1480 . 127'),
(194, 'ARTETA PUTRA YUDHA', 'XI', 'Animasi', 'C', '24403 / 1481 . 127'),
(195, 'ARVIN NADHIF FIRMANSYAH', 'XI', 'Animasi', 'C', '24404 / 1482 . 127'),
(196, 'BINTAR AGUNG TRIANTORO', 'XI', 'Animasi', 'C', '24405 / 1483 . 127'),
(197, 'CHARLENE AMALINA HUWAIDA', 'XI', 'Animasi', 'C', '24406 / 1484 . 127'),
(198, 'FARHAN CHANDRA PUTRA SANTOSO', 'XI', 'Animasi', 'C', '24407 / 1485 . 127'),
(199, 'FATIH MUHAMMAD ROGHIB', 'XI', 'Animasi', 'C', '24408 / 1486 . 127'),
(200, 'FIRMAN ABDUL AZIZ', 'XI', 'Animasi', 'C', '24409 / 1487 . 127'),
(201, 'FRANYOSA FEBY JECONIAH', 'XI', 'Animasi', 'C', '24410 / 1488 . 127'),
(202, 'GALERY CAHYANING ROMADHON', 'XI', 'Animasi', 'C', '24411 / 1489 . 127'),
(203, 'GANDHES WANODYANING WIGATI', 'XI', 'Animasi', 'C', '24412 / 1490 . 127'),
(204, 'KEISHA RAMADHANI NARARIA PUTRI', 'XI', 'Animasi', 'C', '24413 / 1491 . 127'),
(205, 'KEVIN ARLIANTO PUTRA', 'XI', 'Animasi', 'C', '24414 / 1492 . 127'),
(206, 'LYUSIVA AYUNDA FADESA', 'XI', 'Animasi', 'C', '24415 / 1493 . 127'),
(207, 'M. HAFIZ HIDAYTULLOH', 'XI', 'Animasi', 'C', '24416 / 1494 . 127'),
(208, 'MOHAMAD YOSI ADITIA', 'XI', 'Animasi', 'C', '24418 / 1496 . 127'),
(209, 'NADIRA WURYANDARI SYARIFAH', 'XI', 'Animasi', 'C', '24419 / 1497 . 127'),
(210, 'NADYA BINTANG ANDIRA', 'XI', 'Animasi', 'C', '24420 / 1498 . 127'),
(211, 'NAFIZ AL KALIFI', 'XI', 'Animasi', 'C', '24421 / 1499 . 127'),
(212, 'NAILAH ZHAFIRAH PUTRI', 'XI', 'Animasi', 'C', '24422 / 1500 . 127'),
(213, 'NAJWA KAISAURA NUR RAVIKI', 'XI', 'Animasi', 'C', '24423 / 1501 . 127'),
(214, 'NAVIOLA SAFA KYETA', 'XI', 'Animasi', 'C', '24424 / 1502 . 127'),
(215, 'PURUSHOTTAMA', 'XI', 'Animasi', 'C', '24425 / 1503 . 127'),
(216, 'RAHMA NUR AZIZA', 'XI', 'Animasi', 'C', '24426 / 1504 . 127'),
(217, 'SALSABILA MAFULA ZASKIA', 'XI', 'Animasi', 'C', '24427 / 1505 . 127'),
(218, 'TRI SAYOGO YUWONO', 'XI', 'Animasi', 'C', '24428 / 1506 . 127'),
(219, 'ULFIAH FITRIASIH WARDHANA', 'XI', 'Animasi', 'C', '24429 / 1507 . 127'),
(220, 'VARELL PANDU HARDI WINATA', 'XI', 'Animasi', 'C', '24430 / 1508 . 127'),
(221, 'ACHMAD RIZKI', 'XII', 'Animasi', 'A', '22448 / 1303 . 128'),
(222, 'ADE CHRISTIAN PUTRA SETYAWAN ASTRO', 'XII', 'Animasi', 'A', '22449 / 1304 . 128'),
(223, 'ADIMAS FEBRIAN RACHMAN', 'XII', 'Animasi', 'A', '22450 / 1305 . 128'),
(224, 'AYU AGUSTIN WULANDARI', 'XII', 'Animasi', 'A', '22451 / 1306 . 128'),
(225, 'AZ ZAKY AL ASKARI', 'XII', 'Animasi', 'A', '22452 / 1307 . 128'),
(226, 'DAVINA NAJWA MICHELLE FEBRIANT', 'XII', 'Animasi', 'A', '22453 / 1308 . 128'),
(227, 'DEVINA ANGELIA AGATHA', 'XII', 'Animasi', 'A', '22454 / 1309 . 128'),
(228, 'DEVITA PUTRI ANANTA USMAN', 'XII', 'Animasi', 'A', '22455 / 1310 . 128'),
(229, 'ElSA SASI RAMADHANI', 'XII', 'Animasi', 'A', '22456 / 1311 . 128'),
(230, 'FARELLINO KEVIN FIRDIANSYAH', 'XII', 'Animasi', 'A', '22457 / 1312 . 128'),
(231, 'FARISKA IZZA ZAHIRA', 'XII', 'Animasi', 'A', '22458 / 1313 . 128'),
(232, 'FARIZAL NUGRAHA', 'XII', 'Animasi', 'A', '22459 / 1314 . 128'),
(233, 'FITRI AYU WULAN SARI', 'XII', 'Animasi', 'A', '22460 / 1315 . 128'),
(234, 'GALIH PRADIPA PURBOWANTO', 'XII', 'Animasi', 'A', '22461 / 1316 . 128'),
(235, 'HELMY AMINUDIN', 'XII', 'Animasi', 'A', '22463 / 1318 . 128'),
(236, 'LILIS LESTARI', 'XII', 'Animasi', 'A', '22465 / 1320 . 128'),
(237, 'M. ADRIAN PRATAMA', 'XII', 'Animasi', 'A', '22466 / 1321 . 128'),
(238, 'MELANIE ISMI HAMIDAH', 'XII', 'Animasi', 'A', '22467 / 1322 . 128'),
(239, 'MOH FAJAR SANDI', 'XII', 'Animasi', 'A', '22469 / 1324 . 128'),
(240, 'MOHAMMAD DZAELANI', 'XII', 'Animasi', 'A', '22470 / 1325 . 128'),
(241, 'MUHAMMAD RAFEL ALFARIZAL', 'XII', 'Animasi', 'A', '22471 / 1326 . 128'),
(242, 'MUHAMMAD RAUF ', 'XII', 'Animasi', 'A', '22472 / 1327 . 128'),
(243, 'MUJTABA MAHDAVI', 'XII', 'Animasi', 'A', '22473 / 1328 . 128'),
(244, 'NADHIFA SATIA SALOKO', 'XII', 'Animasi', 'A', '22474 / 1329 . 128'),
(245, 'NASHITA AURELLIA MEIKA PUTRI NURDHITA', 'XII', 'Animasi', 'A', '22475 / 1330 . 128'),
(246, 'NAYLA GHEA ANANDA', 'XII', 'Animasi', 'A', '22476 / 1331 . 128'),
(247, 'RADITYA FERDINAND HIZKIA', 'XII', 'Animasi', 'A', '22477 / 1332 . 128'),
(248, 'RADITYA NAUFAL AL ROSYID', 'XII', 'Animasi', 'A', '22478 / 1333 . 128'),
(249, 'RIANDANA DARMAWAN', 'XII', 'Animasi', 'A', '21590 / 1224 . 128'),
(250, 'RIVA CINDI AYU LESTARI', 'XII', 'Animasi', 'A', '21629 / 1263 . 128	'),
(251, 'SOFIA TINA ARIELLA', 'XII', 'Animasi', 'A', '22479 / 1334 . 128'),
(252, 'VIGO STEVE GONZALES', 'XII', 'Animasi', 'A', '22480 / 1335 . 128'),
(253, 'ZULFA NAILURROHMAH', 'XII', 'Animasi', 'A', '22481 / 1336 . 128'),
(254, 'ABEL AURELIA THALITHA', 'XII', 'Animasi', 'B', '22482 / 1337 . 128'),
(255, 'AISHA LUNA RATIMAYA', 'XII', 'Animasi', 'B', '22483 / 1338 . 128'),
(256, 'AKHMAD SHAFAR ARDIANO', 'XII', 'Animasi', 'B', '22484 / 1339 . 128'),
(257, 'ANDELLA MARETYA WAHYULANDA', 'XII', 'Animasi', 'B', '22485 / 1340 . 128'),
(258, 'ANESTA YUSTITIA', 'XII', 'Animasi', 'B', '22486 / 1341 .	128'),
(259, 'BINAR ILHAM MAULANA FANDI SETYAWAN', 'XII', 'Animasi', 'B', '22487 / 1342 . 128'),
(260, 'DAVA TANTO TRI WIJAYA', 'XII', 'Animasi', 'B', '22488 / 1343 . 128'),
(261, 'DICKY DWI ARDIANSYAH', 'XII', 'Animasi', 'B', '22489 / 1344 . 128'),
(262, 'DIMAS SATRIA MAULANA', 'XII', 'Animasi', 'B', '22490 / 1345 . 128'),
(263, 'DWI ARTIKA SARI', 'XII', 'Animasi', 'B', '22491 / 1346 . 128'),
(264, 'DWI NOVITA SARI', 'XII', 'Animasi', 'B', '22492 / 1347 . 128'),
(265, 'FEBRIANI DWI PERMATASARI', 'XII', 'Animasi', 'B', '22493 / 1348 . 128'),
(266, 'FIBRI AYU MAHARANI', 'XII', 'Animasi', 'B', '22494 / 1349 .	128'),
(267, 'FITRI SURYANING ANGGRAENI', 'XII', 'Animasi', 'B', '22495 / 1350 .	128'),
(268, 'GHARIZA TADAYYUN M', 'XII', 'Animasi', 'B', '22496 / 1351 . 128'),
(269, 'HILDA AMALIA', 'XII', 'Animasi', 'B', '22497 / 1352 . 128'),
(270, 'IAN ADI ANDRI DIVA PRATAMA', 'XII', 'Animasi', 'B', '22498 / 1353 . 128'),
(271, 'JASMINE SUKMA ISLAMI', 'XII', 'Animasi', 'B', '22499 / 1354 . 128'),
(272, 'KEVIN BAEYUNG WAHYUDI AJI', 'XII', 'Animasi', 'B', '22500 / 1355 . 128'),
(273, 'MOCHAMAD ARIEL R', 'XII', 'Animasi', 'B', '22501 / 1356 . 128'),
(274, 'MOHAMMAD MARCELL WITOELAR', 'XII', 'Animasi', 'B', '22502 / 1357 . 128'),
(275, 'MUHAMMAD DARYL SAPUTRA', 'XII', 'Animasi', 'B', '22503 / 1358 . 128'),
(276, 'NAISA DWI INDRIANI', 'XII', 'Animasi', 'B', '22504 / 1359 .	128'),
(277, 'NANSYE PRISCILLA TAMBUWUN', 'XII', 'Animasi', 'B', '22505 / 1360 . 128	'),
(278, 'NARENDRA ADHINE FIANDRA PUTRA', 'XII', 'Animasi', 'B', '22506 / 1361 . 128'),
(279, 'RAFAEL NICANDRO SEPTARINO', 'XII', 'Animasi', 'B', '22507 / 1362 . 128'),
(280, 'RAYFANZA DIMAS ISLAMI', 'XII', 'Animasi', 'B', '22508 / 1363 . 128'),
(281, 'REHAN ULUL ALBAB ', 'XII', 'Animasi', 'B', '22509 / 1364 . 128'),
(282, 'RHEO PAKSI ARDADEDHALI', 'XII', 'Animasi', 'B', '22510 / 1365 . 128'),
(283, 'RIFDA NURHALIZA ALIEF', 'XII', 'Animasi', 'B', '22511 / 1366 . 128'),
(284, 'SURYA BAHRUZAHDI', 'XII', 'Animasi', 'B', '22512 / 1367 .	128'),
(285, 'SYAREEFA CHEFFALUNA RAMADHANIA', 'XII', 'Animasi', 'B', '22513 / 1368 . 128'),
(286, 'VERO RAYA KAUTSAR', 'XII', 'Animasi', 'B', '22514 / 1369 . 128'),
(287, 'YOAN REGA REYNATA', 'XII', 'Animasi', 'B', '22515 / 1370 . 128'),
(288, 'ADAM RISVIARDO', 'XII', 'Animasi', 'C', '22517 / 1372 . 128'),
(289, 'ALMIRA AMAZEVA MARDYSAINS', 'XII', 'Animasi', 'C', '22518 / 1373 . 128'),
(290, 'AULIA VIANDA', 'XII', 'Animasi', 'C', '22519 / 1374 .	128'),
(291, 'AYU DYA CITRA NABILA', 'XII', 'Animasi', 'C', '22520 / 1375 . 128'),
(292, 'BASYASYAH DHIWA AQILLAH', 'XII', 'Animasi', 'C', '22521 / 1376 . 128'),
(293, 'DAVINA FAIZAH RAHMA', 'XII', 'Animasi', 'C', '22522 / 1377 . 128'),
(294, 'DZAKY ZAKARIA DARMAYITNO', 'XII', 'Animasi', 'C', '22523 / 1378 . 128'),
(295, 'ELIEZER DOVA PUTRA HANDOKO', 'XII', 'Animasi', 'C', '22524 / 1379 .	128'),
(296, 'ERSAN HIDAYAT', 'XII', 'Animasi', 'C', '22525 / 1380 . 128	'),
(297, 'FEBRYAN DENATA', 'XII', 'Animasi', 'C', '22526 / 1381 . 128'),
(298, 'FIDAH INTAN PAVITA ', 'XII', 'Animasi', 'C', '22527 / 1382 . 128'),
(299, 'KIRANAYA AURELIA MAIA EFENDI', 'XII', 'Animasi', 'C', '22528 / 1383 . 128'),
(300, 'KRISNA RADITYA PUTRA WAHYUDI', 'XII', 'Animasi', 'C', '22529 / 1384 . 128'),
(301, 'LILIS LINDASARI', 'XII', 'Animasi', 'C', '22530 / 1385 . 128'),
(302, 'MOCHAMAD NOR KHOLID', 'XII', 'Animasi', 'C', '22531 / 1386 . 128'),
(303, 'MOCHAMAD RIZKI PRASTIYO', 'XII', 'Animasi', 'C', '22532 / 1387 . 128'),
(304, 'MUHAMMAD SYAHRUL RAMADHAN', 'XII', 'Animasi', 'C', '22533 / 1388 . 128'),
(305, 'MUHAMMAD ZAQHLUL FAHREZY', 'XII', 'Animasi', 'C', '22534 / 1389 . 128'),
(306, 'NABILA DWI WILUJENG ', 'XII', 'Animasi', 'C', '22535 / 1390 . 128'),
(307, 'NABILA INDRIANINGTYAS', 'XII', 'Animasi', 'C', '22536 / 1391 . 128'),
(308, 'NADILA NUR RAMADHANI', 'XII', 'Animasi', 'C', '22537 / 1392 . 128'),
(309, 'NASYWA SYAFIQOH ARIEFIANTI', 'XII', 'Animasi', 'C', '22538 / 1393 . 128'),
(310, 'NATALIA FLOURENTIN MERSHELIA BUPU', 'XII', 'Animasi', 'C', '22539 / 1394 . 128'),
(311, 'RAMADHAN FARRAS ALFARIZI', 'XII', 'Animasi', 'C', '22540 / 1395 . 128'),
(312, 'RAYFIRMAHN BETHAMIDZI SUDARMADI', 'XII', 'Animasi', 'C', '22541 / 1396 . 128'),
(313, 'REYNALDO LOIS MARCELINO', 'XII', 'Animasi', 'C', '22542 / 1397 . 128'),
(314, 'RIFKY ADITYA SURYAWAN', 'XII', 'Animasi', 'C', '21628 / 1262 . 128'),
(315, 'RIJALUL IBAD', 'XII', 'Animasi', 'C', '22543 / 1398 . 128'),
(316, 'RIO BALADIN SYAFANI', 'XII', 'Animasi', 'C', '22544 / 1399 . 128'),
(317, 'SATYA PORNAMA ROZAQI', 'XII', 'Animasi', 'C', '22545 / 1400 .	128'),
(318, 'SAVA MAHAWIRA AIDYN', 'XII', 'Animasi', 'C', '22546 / 1401 . 128'),
(319, 'SHOFI AKIFAH ROCHIMA PUTRI ', 'XII', 'Animasi', 'C', '22547 / 1402 .	128'),
(320, 'TIERI HENRY APRILLINO BUDI PRATAMA', 'XII', 'Animasi', 'C', '22548 / 1403 . 128');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `role` varchar(1) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_profil` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `role`, `username`, `password`, `foto_profil`) VALUES
(32, '1', 'Admin1', 'cefdf4d318ba7a86c0f1dde04d57f6f1', '944607389_qrcode.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_jdl_pengajuan`
--
ALTER TABLE `tbl_jdl_pengajuan`
  ADD PRIMARY KEY (`id_judul`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_jdl_pengajuan`
--
ALTER TABLE `tbl_jdl_pengajuan`
  MODIFY `id_judul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
