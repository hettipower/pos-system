-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2019 at 11:51 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_system_opdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `Category` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `Category`, `Date`) VALUES
(2, 'ELECTROMECHANICAL EQUIPMENT', '2019-11-19 09:16:30'),
(3, 'DRILLS', '2019-11-19 09:17:50'),
(4, 'SCAFFOLDING', '2019-11-19 09:18:03'),
(5, 'POWER GENERATORS', '2019-11-19 09:18:20'),
(6, 'CONSTRUCTION EQUIPMENT', '2019-11-19 09:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `code` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `stock` int(11) NOT NULL,
  `buyingPrice` float NOT NULL,
  `sellingPrice` float NOT NULL,
  `sales` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `idCategory`, `code`, `description`, `image`, `stock`, `buyingPrice`, `sellingPrice`, `sales`, `date`) VALUES
(1, 2, '101', 'Industrial vacuum cleaner', '', 20, 1500, 2100, 0, '0000-00-00 00:00:00'),
(2, 2, '102', 'Float Plate for Palletizer', '', 20, 4500, 6300, 0, '0000-00-00 00:00:00'),
(3, 2, '103', 'Air Compressor for painting', '', 20, 3000, 4200, 0, '0000-00-00 00:00:00'),
(4, 2, '104', 'Adobe Cutter without Disk', '', 20, 4000, 5600, 0, '0000-00-00 00:00:00'),
(5, 2, '105', 'Floor Cutter without Disk', '', 20, 1540, 2156, 0, '0000-00-00 00:00:00'),
(6, 2, '106', 'Diamond Tip Disk', '', 20, 1100, 1540, 0, '0000-00-00 00:00:00'),
(7, 2, '107', 'Air extractor', '', 20, 1540, 2156, 0, '0000-00-00 00:00:00'),
(8, 2, '108', 'Mower', '', 20, 1540, 2156, 0, '0000-00-00 00:00:00'),
(9, 2, '109', 'Electric Water Washer', '', 20, 2600, 3640, 0, '0000-00-00 00:00:00'),
(10, 2, '110', 'Petrol pressure washer', '', 20, 2210, 3094, 0, '0000-00-00 00:00:00'),
(11, 2, '111', 'Gasoline motor pump', '', 20, 2860, 4004, 0, '0000-00-00 00:00:00'),
(12, 2, '112', 'Electric motor pump', '', 20, 2400, 3360, 0, '0000-00-00 00:00:00'),
(13, 2, '113', 'Circular saw', '', 20, 1100, 1540, 0, '0000-00-00 00:00:00'),
(14, 2, '114', 'Tungsten disc for circular saw', '', 20, 4500, 6300, 0, '0000-00-00 00:00:00'),
(15, 2, '115', 'Electric welder', '', 20, 1980, 2772, 0, '0000-00-00 00:00:00'),
(16, 2, '116', 'Welders face', '', 20, 4200, 5880, 0, '0000-00-00 00:00:00'),
(17, 2, '117', 'Illumination tower', '', 20, 1800, 2520, 0, '0000-00-00 00:00:00'),
(18, 3, '201', 'Floor Demolishing Hammer 110V', '', 20, 5600, 7840, 0, '0000-00-00 00:00:00'),
(19, 3, '202', 'Muela or chisel hammer demolishing floor', '', 20, 9600, 13440, 0, '0000-00-00 00:00:00'),
(20, 3, '203', 'Wall Wrecking Drill 110V', '', 20, 3850, 5390, 0, '0000-00-00 00:00:00'),
(21, 3, '204', 'Muela or chisel hammer demolition wall', '', 20, 9600, 13440, 0, '0000-00-00 00:00:00'),
(22, 3, '205', '1/2 Hammer Drill Wood and Metal', '', 20, 8000, 11200, 0, '0000-00-00 00:00:00'),
(23, 3, '206', 'Drill Percussion SDS Plus 110V', '', 20, 3900, 5460, 0, '0000-00-00 00:00:00'),
(24, 3, '207', 'Drill Percussion SDS Max 110V (Mining)', '', 20, 4600, 6440, 0, '0000-00-00 00:00:00'),
(25, 4, '301', 'Hanging scaffolding', '', 20, 1440, 2016, 0, '0000-00-00 00:00:00'),
(26, 4, '302', 'Scaffolding hanging spacer', '', 20, 1600, 2240, 0, '0000-00-00 00:00:00'),
(27, 4, '303', 'Modular scaffolding frame', '', 20, 900, 1260, 0, '0000-00-00 00:00:00'),
(28, 4, '304', 'Frame scaffolding scissors', '', 20, 100, 140, 0, '0000-00-00 00:00:00'),
(29, 4, '305', 'Scaffolding scissors', '', 20, 162, 2268, 0, '0000-00-00 00:00:00'),
(30, 4, '306', 'Internal ladder for scaffolding', '', 20, 270, 378, 0, '0000-00-00 00:00:00'),
(31, 4, '307', 'Security handrails', '', 20, 75, 105, 0, '0000-00-00 00:00:00'),
(32, 4, '308', 'Rotating wheel for scaffolding', '', 20, 168, 2352, 0, '0000-00-00 00:00:00'),
(33, 4, '309', 'safety harness', '', 20, 1750, 2450, 0, '0000-00-00 00:00:00'),
(34, 4, '310', 'Sling for harness', '', 20, 175, 245, 0, '0000-00-00 00:00:00'),
(35, 4, '311', 'Metallic Platform', '', 20, 420, 588, 0, '0000-00-00 00:00:00'),
(36, 5, '401', '6 Kva Diesel Power Plant', '', 20, 3500, 4900, 0, '0000-00-00 00:00:00'),
(37, 5, '402', '10 Kva Diesel Power Plant', '', 20, 3550, 4970, 0, '0000-00-00 00:00:00'),
(38, 5, '403', '20 Kva Diesel Power Plant', '', 20, 3600, 5040, 0, '0000-00-00 00:00:00'),
(39, 5, '404', '30 Kva Diesel Power Plant', '', 20, 3650, 5110, 0, '0000-00-00 00:00:00'),
(40, 5, '405', '60 Kva Diesel Power Plant', '', 20, 3700, 5180, 0, '0000-00-00 00:00:00'),
(41, 5, '406', '75 Kva Diesel Power Plant', '', 20, 3750, 5250, 0, '0000-00-00 00:00:00'),
(42, 5, '407', '100 Kva Diesel Power Plant', '', 20, 3800, 5320, 0, '0000-00-00 00:00:00'),
(43, 5, '408', '120 Kva Diesel Power Plant', '', 20, 3850, 5390, 0, '0000-00-00 00:00:00'),
(44, 6, '501', 'Aluminum Scissor Ladder', '', 20, 350, 490, 0, '0000-00-00 00:00:00'),
(45, 6, '502', 'Electric extension', '', 20, 370, 518, 0, '0000-00-00 00:00:00'),
(46, 6, '503', 'Tensioner cat', '', 20, 380, 532, 0, '0000-00-00 00:00:00'),
(47, 6, '504', 'Lamina Covers Gap', '', 20, 380, 532, 0, '0000-00-00 00:00:00'),
(48, 6, '505', 'Pipe wrench', '', 20, 480, 672, 0, '0000-00-00 00:00:00'),
(49, 6, '506', 'Manila by Metro', '', 20, 600, 840, 0, '0000-00-00 00:00:00'),
(50, 6, '507', '2-channel pulley', '', 20, 900, 1260, 0, '0000-00-00 00:00:00'),
(51, 6, '508', 'Tensor', '', 20, 100, 140, 0, '0000-00-00 00:00:00'),
(52, 6, '509', 'Weighing machine', '', 20, 130, 182, 0, '0000-00-00 00:00:00'),
(53, 6, '510', 'Hydrostatic pump', '', 20, 770, 1078, 0, '0000-00-00 00:00:00'),
(54, 6, '511', 'Chapeta', '', 20, 660, 924, 0, '0000-00-00 00:00:00'),
(55, 6, '512', 'Concrete sample cylinder', '', 20, 400, 560, 0, '2019-11-22 10:34:16'),
(56, 6, '513', 'Lever Shear', '', 20, 450, 630, 0, '0000-00-00 00:00:00'),
(57, 6, '514', 'Scissor Shear', '', 20, 580, 812, 0, '0000-00-00 00:00:00'),
(58, 6, '515', 'Pneumatic tire car', '', 20, 420, 588, 0, '0000-00-00 00:00:00'),
(59, 6, '516', 'Cone slump', '', 20, 140, 196, 0, '0000-00-00 00:00:00'),
(60, 6, '517', 'Baldosin cutter', '', 20, 930, 1302, 0, '2019-11-22 10:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `profile` text NOT NULL,
  `picture` text NOT NULL,
  `status` int(11) NOT NULL,
  `last_login` datetime NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `profile`, `picture`, `status`, `last_login`, `date`) VALUES
(3, 'Administator', 'admin', '$2a$07$asxx54ahjppf45sd87a5aunxs9bkpyGmGE/.vekdjFg83yRec789S', 'administrator', 'views/img/users/admin/179.jpg', 1, '2019-11-18 15:30:14', '2019-11-19 02:13:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
