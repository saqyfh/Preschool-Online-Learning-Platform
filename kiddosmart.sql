-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2024 at 12:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kiddosmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_firstName` varchar(50) NOT NULL,
  `admin_lastName` varchar(50) NOT NULL,
  `admin_phoneNum` varchar(50) NOT NULL,
  `admin_age` varchar(50) NOT NULL,
  `admin_gender` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `admin_password`, `admin_firstName`, `admin_lastName`, `admin_phoneNum`, `admin_age`, `admin_gender`, `admin_email`) VALUES
('admin_kiddo', 'aikha0711', 'Nur Zulaikha Syahirah', 'binti Shahrul Jamal', '0173277417', '22', 'Female', 'aikha07@kiddosmart.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custID` varchar(50) NOT NULL,
  `cust_password` varchar(50) NOT NULL,
  `cust_firstName` varchar(50) NOT NULL,
  `cust_lastName` varchar(50) NOT NULL,
  `cust_phoneNum` varchar(50) NOT NULL,
  `cust_age` varchar(50) NOT NULL,
  `cust_gender` varchar(50) NOT NULL,
  `cust_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custID`, `cust_password`, `cust_firstName`, `cust_lastName`, `cust_phoneNum`, `cust_age`, `cust_gender`, `cust_email`) VALUES
('abuabi', '$2y$10$vCOSR6Rm7hlWPvzkqnfZ5.xcYwJM5XP9QM/3qke9KbP', 'Zulaikha', 'abuu', '0173277417', '4', 'Girl', 'abu@gmail.com'),
('adam', '$2y$10$cqrCeV2lSH.UxaNLHA2HIekFTDk5nCCoKZq5UDw2v2C', 'Adam', 'Mikail', '0173277417', '5', 'Boy', 'adam@gmail'),
('AinaMira', 'aliyah2902', 'Nurul Aina Amira', 'Jahari', '011-5303614', '4', 'Girl', 'aimirajahari@gmail.com'),
('aisyah', '$2y$10$BY42Xms3rcn2XZEJesRo5.UFyv24Mu2TVlETYkF7u6q', 'aisyah mj', 'siti', '0144322141', '5', 'girl', 'aisyah@gmail.com'),
('AmandaInara', 'amanda2938', 'Amanda Inara', 'Mohd Naim', '013-7862190', '6', 'Girl', 'amandainara43@gmail.com'),
('Anis', '$2y$10$DyYpS0B0yBF06HwkqnaVSu67jeCguRXNZCXmfMpT5dQ', 'anis', 'saffiya', '01073635726', '6', 'Girl', 'anis@gmail.com'),
('farah', '12345678', 'Farah Aisyah', 'binti Shahrudin', '0145074355', '6', 'Girl', 'farrah01@gmail.com'),
('hshshs', '$2y$10$VqGgh5CZtEISHr8pabGu2.0PDTgT4n8Bvvgb4EraQOo', 'adada', 'dada', 'dadad', '5', 'ada', 'ainaalysha@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orderpackage`
--

CREATE TABLE `orderpackage` (
  `orderID` int(11) NOT NULL,
  `orderDate` date NOT NULL,
  `totalPrice` decimal(6,2) DEFAULT NULL,
  `packageID` int(11) NOT NULL,
  `adminID` varchar(50) NOT NULL,
  `custID` varchar(50) NOT NULL,
  `statusPayment` enum('completed','pending') DEFAULT 'pending',
  `paymentImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderpackage`
--

INSERT INTO `orderpackage` (`orderID`, `orderDate`, `totalPrice`, `packageID`, `adminID`, `custID`, `statusPayment`, `paymentImage`) VALUES
(38, '2024-06-25', 1.20, 5, 'admin_kiddo', 'AmandaInara', 'completed', 'image/Resume (3).pdf'),
(39, '2024-06-26', 123.00, 4, 'admin_kiddo', 'AmandaInara', 'completed', 'image/Resume (3).pdf'),
(40, '2024-06-26', 200.00, 2, 'admin_kiddo', 'AmandaInara', 'completed', 'image/Letter Of Applicaiton from UiTM (1).pdf'),
(41, '2024-06-26', 350.00, 11, 'admin_kiddo', 'AmandaInara', 'completed', 'image/dijah latte.JPG'),
(42, '2024-06-26', 750.00, 10, 'admin_kiddo', 'AmandaInara', 'completed', 'image/ENT300_GUIDELINES MAC2024 (3).pdf'),
(43, '2024-06-26', 123.00, 4, 'admin_kiddo', 'AmandaInara', 'completed', 'image/Letter Of Applicaiton from UiTM (1).pdf'),
(44, '2024-06-26', 675.00, 13, 'admin_kiddo', 'AmandaInara', 'completed', 'image/ISP250 STD .pdf');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `packageID` int(11) NOT NULL,
  `packageName` varchar(50) NOT NULL,
  `packagePrice` decimal(6,2) NOT NULL,
  `packageImage` varchar(255) DEFAULT NULL,
  `packageDesc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`packageID`, `packageName`, `packagePrice`, `packageImage`, `packageDesc`) VALUES
(1, 'Dijah', 9999.99, 'image/WIN_20240603_04_04_12_Pro.jpg', NULL),
(2, 'Tut Comel', 200.00, 'image/tut.png', NULL),
(3, 'Farah Aisyah', 1500.00, 'image/WhatsApp Image 2024-06-25 at 12.00.06 AM.jpeg', NULL),
(4, '3 Orang', 123.00, 'image/1719253536537.jpg', NULL),
(5, 'Dijah Burnt ', 1.20, 'image/FARAH.JPG', NULL),
(7, 'Saqifah', 9999.99, 'image/saqifah.jpg', NULL),
(8, 'Dijah Milky ', 5.50, 'image/WhatsApp Image 2024-06-25 at 12.00.06 AM.jpeg', NULL),
(10, 'Farah', 750.00, 'image/aisyah.JPG', NULL),
(11, 'Dhirah Cumils', 350.00, 'image/IMG_7054.JPG', NULL),
(12, 'Adib Kacak', 3451.00, 'image/adib.jpg', NULL),
(13, 'Dijah Latte', 675.00, 'image/dijah latte.JPG', NULL),
(14, 'Dijah Brownies', 350.00, 'image/photo_2024-06-25_03-05-55.jpg', NULL),
(15, 'Aikha', 350.00, 'image/aikha.jpg', NULL),
(16, 'Aikha', 350.00, 'image/aikha.jpg', NULL),
(17, 'Hazirah Handsome ', 56.00, 'image/Hazirah.JPG', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custID`);

--
-- Indexes for table `orderpackage`
--
ALTER TABLE `orderpackage`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `packageID` (`packageID`),
  ADD KEY `adminID` (`adminID`),
  ADD KEY `custID` (`custID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`packageID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderpackage`
--
ALTER TABLE `orderpackage`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `packageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderpackage`
--
ALTER TABLE `orderpackage`
  ADD CONSTRAINT `orderpackage_ibfk_1` FOREIGN KEY (`packageID`) REFERENCES `package` (`packageID`),
  ADD CONSTRAINT `orderpackage_ibfk_2` FOREIGN KEY (`adminID`) REFERENCES `admin` (`adminID`),
  ADD CONSTRAINT `orderpackage_ibfk_3` FOREIGN KEY (`custID`) REFERENCES `customer` (`custID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
