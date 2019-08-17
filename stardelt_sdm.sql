-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 14, 2019 at 05:31 AM
-- Server version: 5.6.44
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stardelt_sdm`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`    
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `keterangan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `keterangan`) VALUES
(2, 'katolik'),
(4, 'hindu'),
(5, 'buda'),
(6, 'konghucu'),
(13, 'islam'),
(14, 'kristen');

-- --------------------------------------------------------

--
-- Table structure for table `arus_khas`
--

CREATE TABLE `arus_khas` (
  `id_arus_khas` int(11) NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `id_subkategori_khas` int(11) NOT NULL,
  `dt` date NOT NULL,
  `dtime` datetime NOT NULL,
  `posting` enum('N','Y') NOT NULL,
  `orders` enum('N','Y') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arus_khas`
--

INSERT INTO `arus_khas` (`id_arus_khas`, `debit`, `kredit`, `keterangan`, `id_subkategori_khas`, `dt`, `dtime`, `posting`, `orders`) VALUES
(33, 0, 900000, 'makan malam', 14, '2019-08-06', '2019-08-06 04:24:03', 'N', 'N'),
(34, 0, 100000, 'makan siang ', 14, '2019-08-06', '2019-08-06 12:05:49', 'N', 'N'),
(31, 0, 900000, 'makan siang', 14, '2019-08-06', '2019-08-06 04:01:38', 'N', 'N'),
(30, 0, 100000, 'makan malam di coder', 14, '2019-08-06', '2019-08-06 03:47:08', 'N', 'N'),
(32, 0, 900000, 'makan malam', 14, '2019-08-06', '2019-08-06 04:02:46', 'N', 'N'),
(35, 0, 294000, '<p>transaksi pembelian periode 2019-08-06 s/d 2019-08-06 <small><i>diposing oleh admin</i></small> </p>', 12, '2019-08-06', '0000-00-00 00:00:00', 'N', 'Y'),
(36, 0, 90000, 'makan malam', 14, '2019-08-07', '2019-08-07 15:23:58', 'N', 'N'),
(37, 0, 90000, 'makan malam', 14, '2019-08-08', '2019-08-08 04:48:33', 'N', 'N'),
(38, 0, 900000, 'makan malam', 14, '2019-08-10', '2019-08-10 02:34:23', 'N', 'N'),
(39, 0, 90000, 'makan malam', 14, '2019-08-10', '2019-08-10 17:05:41', 'N', 'N'),
(40, 0, 200000, 'ngopi excelso', 14, '2019-08-12', '2019-08-12 16:28:24', 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `hpp`
--

CREATE TABLE `hpp` (
  `id_hpp` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `qty` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `kode_item` varchar(20) NOT NULL,
  `nama_item` varchar(50) NOT NULL,
  `satuan` varchar(12) NOT NULL,
  `qty` varchar(12) NOT NULL,
  `id_suplier` int(12) NOT NULL,
  `price` varchar(20) NOT NULL,
  `sell` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`kode_item`, `nama_item`, `satuan`, `qty`, `id_suplier`, `price`, `sell`, `username`, `date`) VALUES
('BRG000', 'Fresh Milk', 'pcs', '1', 13, '16000', '', 'admin', '2018-05-09'),
('BRG001', 'Kopi Aceh Gayo', 'gram', '250', 8, '50000', '', 'admin', '2018-05-09'),
('BRG002', 'isi ulang', 'pcs', '1', 0, '4500', '', 'admin', '2018-05-09'),
('BRG003', 'Kopi Aceh Gayo', 'gram', '250', 12, '50000', '', 'admin', '2018-05-09'),
('BRG004', 'Paper filter v60', 'pcs', '100', 14, '100000', '', 'admin', '2018-05-09'),
('BRG005', 'Tepung', 'gram', '1000', 13, '11750', '', 'admin', '2018-05-10'),
('BRG006', 'Bimoli Spesial R', 'gram', '1000', 13, '26000', '', 'admin', '2018-05-10'),
('BRG007', 'Ajinomoto', 'gram', '150', 13, '5000', '', 'admin', '2018-05-10'),
('BRG008', ' garam', 'gram', '150', 13, '6500', '', 'admin', '2018-05-10'),
('BRG009', ' Vanili', 'pcs', '5', 13, '3300', '', 'admin', '2018-05-10'),
('BRG010', '   lafonte saus pasta', 'gram', '500', 13, '16750', '', 'admin', '2018-05-10'),
('BRG011', 'Mayones', 'gram', '1000', 13, '26250', '', 'admin', '2018-05-10'),
('BRG012', 'Backing Powder', 'pcs', '1', 13, '4500', '', 'admin', '2018-05-10'),
('BRG013', 'Saos Tiram', 'pcs', '1', 13, '7800', '', 'admin', '2018-05-10'),
('BRG014', 'Telur ', 'gram', '1000', 13, '20500', '', 'admin', '2018-05-10'),
('BRG015', 'Frenchfries', 'gram', '1000', 13, '31250', '', 'admin', '2018-05-10'),
('BRG016', ' Kecap ABC', 'pcs', '1', 13, '5500', '', 'admin', '2018-05-10'),
('BRG017', 'Tepung Sajiku', 'gram', '1000', 13, '24000', '', 'admin', '2018-05-10'),
('BRG018', ' Blue Bland', 'gram', '250', 13, '10650', '', 'admin', '2018-05-10'),
('BRG019', ' Bawang Bombay', 'gram', '250', 13, '7000', '', 'admin', '2018-05-10'),
('BRG020', 'Jamur', 'pcs', '1', 13, '5000', '', 'admin', '2018-05-10'),
('BRG021', 'Saos Sambel', 'gram', '1000', 13, '27000', '', 'admin', '2018-05-10'),
('BRG022', ' Saos Tomat', 'gram', '1000', 13, '14000', '', 'admin', '2018-05-10'),
('BRG023', 'Gula Pasir', 'gram', '1000', 13, '10000', '', 'admin', '2018-05-10'),
('BRG024', 'Selada', 'pcs', '1', 13, '3500', '', 'admin', '2018-05-10'),
('BRG025', ' es tube viavalen ', 'pcs', '1', 11, '13000', '', 'admin', '2019-01-03'),
('BRG026', '   Freshmilk Chimori ', 'dus', '1', 18, '156000', '', 'admin', '2019-01-04'),
('BRG027', '  caramel sirup', 'pcs', '1', 10, '110000', '', 'admin', '2019-02-21'),
('BRG028', '   house blend romokopi', 'pcs', '500', 16, '150000', '', 'admin', '2019-02-23'),
('BRG029', 'surya 12', 'pcs', '1', 19, '15100', '', 'admin', '2019-08-12'),
('BRG030', '  surya 12', 'pcs', '10', 20, '15100', '16000', 'widyo@gmail.com', '2019-08-12'),
('BRG031', 'marlboro', 'pcs', '10', 20, '23000', '25000', 'widyo@gmail.com', '2019-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_khas`
--

CREATE TABLE `kategori_khas` (
  `id_kategori_khas` int(11) NOT NULL,
  `nama_kategori_khas` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_khas`
--

INSERT INTO `kategori_khas` (`id_kategori_khas`, `nama_kategori_khas`, `date`) VALUES
(12, 'PENDAPATAN USAHA                                  ', '2018-05-08'),
(13, 'BIAYA ATAS PENDAPATAN                             ', '2018-05-08'),
(14, 'PENGELUARAN OPRASIONAL                            ', '2018-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_menu`
--

CREATE TABLE `kategori_menu` (
  `id_kategori_menu` int(11) NOT NULL,
  `nama_kategori_menu` varchar(90) NOT NULL,
  `username` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `status` enum('active','nonactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_menu`
--

INSERT INTO `kategori_menu` (`id_kategori_menu`, `nama_kategori_menu`, `username`, `date`, `status`) VALUES
(8, 'Espresso  Base                                                                            ', 'admin', '2018-05-08', 'active'),
(9, 'Non Coffee                                                                                ', 'admin', '2018-05-08', 'active'),
(10, 'Tea                                                                                       ', 'admin', '2018-05-08', 'active'),
(11, 'Single Origin                              ', 'admin', '2018-05-08', 'active'),
(12, 'Signature Coffee                              ', 'admin', '2018-06-20', 'active'),
(13, 'Snack', 'cabalagi@gmail.com', '2019-03-11', 'active'),
(14, 'stardelta', 'admin', '2019-08-12', 'active'),
(15, 'Rokok                              ', 'widyo@gmail.com', '2019-08-12', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` int(11) NOT NULL,
  `sell` varchar(50) NOT NULL,
  `kode_item` varchar(50) NOT NULL,
  `id_kategori_menu` int(11) NOT NULL,
  `status` enum('active','nonactive') NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `name`, `price`, `sell`, `kode_item`, `id_kategori_menu`, `status`, `username`) VALUES
(8, 'Espresso', 12000, '', '', 8, 'active', ''),
(9, 'Doble espresso', 15000, '', '', 8, 'active', ''),
(10, 'Red Velved', 18000, '', '', 9, 'active', ''),
(11, 'Lemon Tea', 10000, '', '', 10, 'active', ''),
(12, 'v60', 15000, '', '', 11, 'active', ''),
(13, 'chemex', 40000, '', '', 11, 'active', ''),
(14, 'Syphone', 35000, '', '', 11, 'active', ''),
(15, 'French Pres', 20000, '', '', 11, 'active', ''),
(17, 'Americano', 15000, '', '', 8, 'active', ''),
(18, 'Long Black', 15000, '', '', 8, 'active', ''),
(19, 'Espresso Matchiato', 18000, '', '', 8, 'active', ''),
(20, 'Espresso Con Panna', 18000, '', '', 8, 'active', ''),
(21, 'Picolo', 18000, '', '', 8, 'active', ''),
(22, 'Cappucino', 20000, '', '', 8, 'active', ''),
(23, 'Cafe Latte', 20000, '', '', 8, 'active', ''),
(24, 'Cafe Mocha', 25000, '', '', 8, 'active', ''),
(25, 'Flat White', 25000, '', '', 8, 'active', ''),
(26, 'Caramel Machiato', 25000, '', '', 8, 'active', ''),
(27, 'Vanilla Latte', 25000, '', '', 8, 'active', ''),
(28, 'Hazelnut Latte', 25000, '', '', 8, 'active', ''),
(29, 'Affogato', 25000, '', '', 8, 'active', ''),
(30, 'Taro', 18000, '', '', 9, 'active', ''),
(31, 'Chocolate', 18000, '', '', 9, 'active', ''),
(34, 'Bon Bon', 15000, '', '', 12, 'active', ''),
(35, 'Vietname Coffee', 15000, '', '', 12, 'active', ''),
(36, 'Espresso Block', 15000, '', '', 12, 'active', ''),
(37, 'Matcha Frappe Latte', 15000, '', '', 12, 'active', ''),
(38, 'Wafle', 15000, '', '', 13, 'active', ''),
(39, 'Frech Fries', 10000, '', '', 13, 'active', ''),
(40, 'Onion Ring', 10000, '', '', 13, 'active', ''),
(41, 'Fresh Milk', 10000, '', '', 9, 'active', ''),
(42, 'Aeropress', 20000, '', '', 11, 'active', ''),
(43, 'Green Tea', 18000, '', '', 9, 'active', ''),
(44, 'surya12', 0, '', '', 14, 'active', ''),
(50, '  surya 12', 15100, '16000', 'BRG030', 15, 'active', ''),
(51, 'marlboro', 23000, '25000', 'BRG031', 15, 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id` varchar(20) NOT NULL,
  `transaksi` enum('penjualan','pembelian','biaya') NOT NULL,
  `id_menu` int(11) NOT NULL,
  `kode_item` varchar(16) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `dt` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `clear` enum('N','Y') NOT NULL,
  `price` varchar(50) NOT NULL,
  `sell` varchar(50) NOT NULL,
  `metode` varchar(12) DEFAULT NULL,
  `cashier` enum('N','Y') NOT NULL,
  `proses` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id`, `transaksi`, `id_menu`, `kode_item`, `qty`, `date`, `dt`, `username`, `clear`, `price`, `sell`, `metode`, `cashier`, `proses`) VALUES
(1, '', 'pembelian', 0, 'BRG030', 3, '2019-08-12 21:17:25', '2019-08-12', 'widyo@gmail.com', 'N', '15100', '', NULL, 'N', 'N'),
(2, '', 'pembelian', 0, 'BRG031', 3, '2019-08-12 21:17:25', '2019-08-12', 'widyo@gmail.com', 'N', '23000', '', NULL, 'N', 'N'),
(3, 'SDM00003', 'penjualan', 50, 'BRG00050', 1, '2019-08-12 21:17:58', '2019-08-12', 'widyo@gmail.com', 'N', '16000', '', NULL, 'Y', 'N'),
(4, 'SDM00003', 'penjualan', 51, 'BRG00051', 1, '2019-08-12 21:17:58', '2019-08-12', 'widyo@gmail.com', 'N', '25000', '', NULL, 'Y', 'N'),
(5, 'SDM00003', 'penjualan', 50, 'BRG00050', 17, '2019-08-12 22:21:21', '2019-08-12', 'widyo@gmail.com', 'N', '16000', '', NULL, 'Y', 'N'),
(6, 'SDM00003', 'penjualan', 51, 'BRG00051', 37, '2019-08-12 22:21:21', '2019-08-12', 'widyo@gmail.com', 'N', '25000', '', NULL, 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `desa` varchar(90) NOT NULL,
  `kecamatan` text NOT NULL,
  `kabupaten` text NOT NULL,
  `kode_pos` text NOT NULL,
  `provinsi` text NOT NULL,
  `telpon` text NOT NULL,
  `logo` text NOT NULL,
  `logo-prov` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`desa`, `kecamatan`, `kabupaten`, `kode_pos`, `provinsi`, `telpon`, `logo`, `logo-prov`) VALUES
('Mekarwangi', 'Lembang', 'Bandung', '64421', 'Jawa Barat', '(0271) 53889', '58Logo Provinsi Jawa Barat png.PNG', '');

-- --------------------------------------------------------

--
-- Table structure for table `subkategori_khas`
--

CREATE TABLE `subkategori_khas` (
  `id_subkategori_khas` int(11) NOT NULL,
  `nama_subkategori_khas` varchar(80) NOT NULL,
  `date` date NOT NULL,
  `id_kategori_khas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkategori_khas`
--

INSERT INTO `subkategori_khas` (`id_subkategori_khas`, `nama_subkategori_khas`, `date`, `id_kategori_khas`) VALUES
(11, 'Pendapatan Usaha', '2018-05-08', 12),
(12, 'Biaya Produksi', '2018-05-08', 13),
(13, 'Biaya Lain', '2018-05-08', 13),
(14, 'Biaya Oprasional', '2018-05-08', 14),
(15, 'Biaya Non Oprasional', '2018-05-08', 14);

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(70) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `salesman` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `rekening` text NOT NULL,
  `status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama_suplier`, `alamat`, `kontak`, `salesman`, `username`, `rekening`, `status`) VALUES
(8, 'RepubliKopi                                                           ', 'nganjuk', '081327717847', '        bagus', 'simpus@gmail.com', '--', 'notactive'),
(9, 'Mochabika                        ', 'surabaya', '081327717847', '          lek  Budi', 'simpus@gmail.com', '--', 'notactive'),
(10, 'Toffin            ', 'surabaya', '081327717847', '      Lek Romi', 'simpus@gmail.com', '--', 'notactive'),
(12, 'Kopi Omahan        ', 'jombang', '081327717847', '    Mas Lubi', 'simpus@gmail.com', '--', 'notactive'),
(13, 'Prima s.      ', 'Nganjuk', '--', '     --', 'simpus@gmail.com', '--', 'notactive'),
(14, 'Onepresso          ', 'surabaya', '081327717847', '    Mas ricky', 'admin', '--', 'notactive'),
(15, 'Estube via        ', 'jombang', '-', '    -', 'admin', '--', 'notactive'),
(16, 'Romo kopi  ', 'kediri', '--', ' andre', 'admin', '--', 'notactive'),
(17, 'Labore', 'malang', '--', 'kartika a', 'admin', '--', 'notactive'),
(18, 'Indoguna    ', 'surabaya', '--', '  deden', 'admin', '--', 'notactive'),
(19, 'candra toko', 'sda', '--', 'candra', 'admin', '--', 'notactive'),
(20, 'gudang', 'candi - sidoarjo', '0812000000', 'tri arif', 'widyo@gmail.com', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(12) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','invest','akun','ID') NOT NULL,
  `blokir` enum('N','Y') NOT NULL,
  `email` varchar(90) NOT NULL,
  `nama` varchar(90) NOT NULL,
  `no_hp` varchar(90) NOT NULL,
  `alamat` text NOT NULL,
  `rd` date NOT NULL,
  `sponsoring` varchar(50) NOT NULL,
  `id` varchar(12) NOT NULL,
  `lastlogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `password`, `level`, `blokir`, `email`, `nama`, `no_hp`, `alamat`, `rd`, `sponsoring`, `id`, `lastlogin`) VALUES
(15, '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'N', 'admin', '0', '0', '0', '0000-00-00', '', 'SDM00000', '2019-08-12 10:45:35'),
(34, '81dc9bdb52d04dc20036dbd8313ed055', 'invest', 'N', 'triarif@gmail.com', 'tri arif', '081327717847', 'candi - sidoarjo', '2019-08-12', 'SDM00000', 'SDM0000001', '2019-08-13 06:11:48'),
(35, '81dc9bdb52d04dc20036dbd8313ed055', 'invest', 'N', 'widyo@gmail.com', 'widyo nugroho', '081327717847', 'candi - sidoarjo', '2019-08-12', 'SDM00000', 'SDM0000002', '0000-00-00 00:00:00'),
(36, '81dc9bdb52d04dc20036dbd8313ed055', 'invest', 'N', 'alif@gmail.com', 'elif arfan setyawan', '081327717847', 'candi - sidoarjo', '2019-08-12', 'SDM00000', 'SDM0000003', '0000-00-00 00:00:00'),
(37, '81dc9bdb52d04dc20036dbd8313ed055', 'invest', 'N', 'khoirul@gmail.com', 'khoirul  ', '081327717847', 'candi - sidoarjo', '2019-08-12', 'SDM00000', 'SDM0000004', '0000-00-00 00:00:00'),
(38, '81dc9bdb52d04dc20036dbd8313ed055', 'invest', 'N', 'ribut@gmail.com', 'ribut ardianto', '081327717847', 'candi - sidoarjo', '2019-08-12', 'SDM00000', 'SDM0000005', '0000-00-00 00:00:00'),
(39, '81dc9bdb52d04dc20036dbd8313ed055', 'invest', 'N', 'thecodercoffeebar@gmail.com', 'M Aang Syaifun Naja', '081327717847', 'nganjuk', '2019-08-12', 'SDM00000', 'SDM0000006', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `web_master`
--

CREATE TABLE `web_master` (
  `id_plan` int(11) NOT NULL,
  `title` text NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `website` text NOT NULL,
  `instagram` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_master`
--

INSERT INTO `web_master` (`id_plan`, `title`, `address`, `phone`, `website`, `instagram`) VALUES
(1, 'Sdmart', 'surabaya jatim', '081327717847', 'http://www.codercoffee.id/', 'codercoffee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `arus_khas`
--
ALTER TABLE `arus_khas`
  ADD PRIMARY KEY (`id_arus_khas`);

--
-- Indexes for table `hpp`
--
ALTER TABLE `hpp`
  ADD PRIMARY KEY (`id_hpp`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`kode_item`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kategori_khas`
--
ALTER TABLE `kategori_khas`
  ADD PRIMARY KEY (`id_kategori_khas`);

--
-- Indexes for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  ADD PRIMARY KEY (`id_kategori_menu`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`desa`);

--
-- Indexes for table `subkategori_khas`
--
ALTER TABLE `subkategori_khas`
  ADD PRIMARY KEY (`id_subkategori_khas`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `web_master`
--
ALTER TABLE `web_master`
  ADD PRIMARY KEY (`id_plan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `arus_khas`
--
ALTER TABLE `arus_khas`
  MODIFY `id_arus_khas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `hpp`
--
ALTER TABLE `hpp`
  MODIFY `id_hpp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_khas`
--
ALTER TABLE `kategori_khas`
  MODIFY `id_kategori_khas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  MODIFY `id_kategori_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subkategori_khas`
--
ALTER TABLE `subkategori_khas`
  MODIFY `id_subkategori_khas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
