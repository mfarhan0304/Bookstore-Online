-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2018 at 04:11 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookdetail`
--

CREATE TABLE `bookdetail` (
  `bookid` int(11) NOT NULL,
  `Title` text,
  `Writer` text,
  `Price` int(11) DEFAULT NULL,
  `Image` text,
  `Sinopsis` text,
  `RATING` int(11) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookdetail`
--

INSERT INTO `bookdetail` (`bookid`, `Title`, `Writer`, `Price`, `Image`, `Sinopsis`, `RATING`, `Amount`) VALUES
(1, 'Nota Hidup', 'Light R', 100000, 'https://images-na.ssl-images-amazon.com/images/I/51k0tMK9hiL.jpg', 'Creepy af', 4, 11),
(2, 'Harry Potter', 'JK Rowling', 120000, 'https://images-na.ssl-images-amazon.com/images/I/71Ui-NwYUmL.jpg', 'Pokoknya seru deh!', 5, 15),
(3, 'Upin-ipin', 'dimas gans', 350000, 'http://www.provoke-online.com/images/All_Articles/Movie/upinipin.jpg', 'Keren parah', 0, 5),
(4, 'To All The Boys', 'Jenny Han', 100000, 'https://www.frvpld.info/sites/default/files/u875/to-all-the-boys.jpg', 'The letter is out.', 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `bookreview`
--

CREATE TABLE `bookreview` (
  `ReviewID` int(11) NOT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Comment` text,
  `Rating` int(11) DEFAULT NULL,
  `BookID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookreview`
--

INSERT INTO `bookreview` (`ReviewID`, `Username`, `Comment`, `Rating`, `BookID`) VALUES
(1, 'niallhoran', 'Buku ini keren!', 4, 1),
(2, 'dhaniraaa', 'Such a GREAT one!', 5, 2),
(8, 'dhaniraaa', 'lucu bgt aku ketawa mulu bacanya heheheh', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `TransNo` int(11) NOT NULL,
  `BookID` int(11) DEFAULT NULL,
  `OrdersAmount` int(11) DEFAULT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `OrdersDate` date DEFAULT NULL,
  `ReviewID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`TransNo`, `BookID`, `OrdersAmount`, `Username`, `OrdersDate`, `ReviewID`) VALUES
(1, 2, 2, 'dhaniraaa', '2010-06-23', 2),
(2, 1, 1, 'niallhoran', '2018-10-20', 1),
(3, 3, 1, 'dhaniraaa', '2018-10-24', 8),
(4, 4, 2, 'dimasaditiap', '2018-10-23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(20) NOT NULL,
  `Password` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`) VALUES
('dhaniraaa', '03011998'),
('dimasaditiap', 'upinipin'),
('hunny', '12345678'),
('niallhoran', 'flicker');

-- --------------------------------------------------------

--
-- Table structure for table `userdetail`
--

CREATE TABLE `userdetail` (
  `Username` varchar(20) NOT NULL,
  `Email` text,
  `Name` text,
  `Address` text,
  `Phone` text,
  `Photo` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetail`
--

INSERT INTO `userdetail` (`Username`, `Email`, `Name`, `Address`, `Phone`, `Photo`) VALUES
('dhaniraaa', 'ramadhani.nira@gmail.com', 'Nira R', 'Dago Asri', '085716367454', 'nira.jpg'),
('dimasaditiap', 'dimasaditiap@gmail.com', 'Dimas Aditia P', 'Bandung', '081234567890', 'dimas.jpg'),
('niallhoran', 'niall@horan.com', 'Niall Horan', 'Setia Budi', '085711223344', 'niall.jpg'),
('hunny', 'mfarhan0304@gmail.com', 'Farhan', 'Tubis', '082111133498', 'Farhan.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookdetail`
--
ALTER TABLE `bookdetail`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `bookreview`
--
ALTER TABLE `bookreview`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `bookid_foreign` (`BookID`),
  ADD KEY `username_bookreview_foreign` (`Username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`TransNo`),
  ADD KEY `bookid_orders_foreign` (`BookID`),
  ADD KEY `reviewid_orders_foreign` (`ReviewID`),
  ADD KEY `username_orders_foreign` (`Username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD KEY `username_userdetail_foreign` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookdetail`
--
ALTER TABLE `bookdetail`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bookreview`
--
ALTER TABLE `bookreview`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `TransNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookreview`
--
ALTER TABLE `bookreview`
  ADD CONSTRAINT `bookid_foreign` FOREIGN KEY (`BookID`) REFERENCES `bookdetail` (`bookid`),
  ADD CONSTRAINT `username_bookreview_foreign` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `reviewid_orders_foreign` FOREIGN KEY (`ReviewID`) REFERENCES `bookreview` (`ReviewID`),
  ADD CONSTRAINT `username_orders_foreign` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`);

--
-- Constraints for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD CONSTRAINT `username_userdetail_foreign` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
