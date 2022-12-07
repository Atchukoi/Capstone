-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2022 at 09:03 AM
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
-- Database: `laperfecta_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladditional`
--

CREATE TABLE `tbladditional` (
  `Id` int(11) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladditional`
--

INSERT INTO `tbladditional` (`Id`, `Name`, `Price`) VALUES
(1, 'Seafood 100 Pax', 5000),
(2, 'Pork 100 Pax', 4500),
(3, 'Chicken 100 Pax', 4000),
(4, 'Vegetables 100 Pax', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `tblextra`
--

CREATE TABLE `tblextra` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Quantity` varchar(11) NOT NULL,
  `Cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblextra`
--

INSERT INTO `tblextra` (`Id`, `Name`, `Description`, `Quantity`, `Cost`) VALUES
(1, 'Extra Bed', 'Single Bed', '1', 500),
(2, 'Pillow', 'Large Cotton Pillow', '1', 150);

-- --------------------------------------------------------

--
-- Table structure for table `tblfoodpackage`
--

CREATE TABLE `tblfoodpackage` (
  `Id` int(11) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `Description` varchar(225) NOT NULL,
  `Menu` varchar(255) NOT NULL,
  `Pax50` double NOT NULL,
  `Pax80` double NOT NULL,
  `Pax100` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfoodpackage`
--

INSERT INTO `tblfoodpackage` (`Id`, `Name`, `Description`, `Menu`, `Pax50`, `Pax80`, `Pax100`) VALUES
(1, 'Bundle A', '3 Main Courses', 'Pork or Beef, Chicken, Vegetables, Rice, Dessert (Buko Pandan Salad) & Iced Tea', 320, 300, 280),
(2, 'Bundle B', '4 Main Courses', 'Pork or Beef, Chicken, Vegetables, Rice, Dessert (Buko Pandan Salad) & Iced Tea', 340, 320, 300),
(3, 'Bundle C', '5 Main Courses', 'Pork or Beef, Chicken, Vegetables, Rice, Dessert (Buko Pandan Salad) & Iced Tea', 390, 370, 350);

-- --------------------------------------------------------

--
-- Table structure for table `tblguest`
--

CREATE TABLE `tblguest` (
  `Id` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `BirthDay` date NOT NULL,
  `Phone` int(11) NOT NULL,
  `Company` varchar(255) NOT NULL,
  `CompanyAddress` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblguest`
--

INSERT INTO `tblguest` (`Id`, `FirstName`, `LastName`, `Address`, `BirthDay`, `Phone`, `Company`, `CompanyAddress`, `Email`, `Password`) VALUES
(1, 'John Christopher', ' Dangilan', 'Marasat Pequeno', '2000-01-12', 2147483647, 'ISU', 'Ilagan City', 'jcdangilan@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Shelby', ' Panget', 'Bannawag Sur', '1999-04-08', 2147483647, 'Remson Auto Parts', 'Santiago, Isabela', 'shelbygabuya@gmail.com', '1a64a010767f0725fb52111b0a9e9f84'),
(3, 'Dj', ' Papatricio', 'marikina', '1999-01-01', 123456789, 'RealExcellence', 'Makati', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(38, 'Mark', 'De Leon', 'Ilagan City', '0000-00-00', 2147483647, '', '', '', ''),
(39, 'Mark', 'De Leon', 'Ilagan City', '0000-00-00', 2147483647, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblhall`
--

CREATE TABLE `tblhall` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Time` int(11) NOT NULL,
  `Cost` double NOT NULL,
  `Exceeding` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblhall`
--

INSERT INTO `tblhall` (`Id`, `Name`, `Description`, `Time`, `Cost`, `Exceeding`) VALUES
(1, 'Function Hall 1', 'Fully-Airconditioned', 4, 8000, 800),
(2, 'Function Hall 2', 'Fully-Airconditioned', 4, 8000, 800),
(3, 'Ballroom Hall', 'Fully-Airconditioned', 4, 10000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tblhallpackage`
--

CREATE TABLE `tblhallpackage` (
  `Id` int(11) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `Description` varchar(225) NOT NULL,
  `Pax` int(11) NOT NULL,
  `Time` int(11) NOT NULL,
  `Cost` double NOT NULL,
  `Exceeding` double NOT NULL,
  `Inclusion` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblhallpackage`
--

INSERT INTO `tblhallpackage` (`Id`, `Name`, `Description`, `Pax`, `Time`, `Cost`, `Exceeding`, `Inclusion`) VALUES
(1, 'Package A', 'Fully Air-Conditioned Function Hall', 50, 4, 11000, 800, '4 hours fully air-conditionedHigh-Quality Sound with Full LightsTables with Cloth &Tiffany Chairs With Foam'),
(2, 'Package B', 'Fully Air-Conditioned Function Hall', 80, 4, 12000, 800, '4 hours fully air-conditioned\r\nHigh-Quality Sound with Full Lights\r\nTables with Cloth &\r\nTiffany Chairs With Foam'),
(3, 'Package C', 'Fully air-conditioned Ballroom Hall\r\n', 100, 4, 15000, 1000, '4 hours fully air-conditioned\r\nHigh-Quality Sound with Full Lights\r\nPar Led Lights\r\nTables with Cloth &\r\nTiffany Chairs With Foam'),
(4, 'Package D', 'Fully air-conditioned Ballroom Hall', 150, 4, 20000, 1000, '4 hours fully air-conditioned\r\nHigh-Quality Sound with Full Lights\r\nPar Led Lights\r\nTables with Cloth &\r\nTiffany Chairs With Foam');

-- --------------------------------------------------------

--
-- Table structure for table `tblmisc`
--

CREATE TABLE `tblmisc` (
  `Id` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmisc`
--

INSERT INTO `tblmisc` (`Id`, `Description`, `Name`, `Quantity`, `Cost`) VALUES
(1, '1 Solo Plate', 'Sphagetti', 1, 120),
(44, '5 cups of White Rice', 'Barkada Rice', 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `SUMMARYID` int(11) NOT NULL,
  `TRANSDATE` datetime NOT NULL,
  `CONFIRMATIONCODE` varchar(30) CHARACTER SET latin1 NOT NULL,
  `PQTY` int(11) NOT NULL,
  `GUESTID` int(11) NOT NULL,
  `SPRICE` double NOT NULL,
  `MSGVIEW` tinyint(1) NOT NULL,
  `STATUS` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblrentals`
--

CREATE TABLE `tblrentals` (
  `Id` int(11) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `Description` varchar(225) NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblrentals`
--

INSERT INTO `tblrentals` (`Id`, `Name`, `Description`, `Price`) VALUES
(1, 'High-Quality Sound System', '', 1500),
(2, 'Evening Event or Full Lights', '', 1000),
(3, 'Moving Lights / pc', '', 1500),
(4, 'Projector', '', 2000),
(5, 'Stage Basic Decorations', '', 10000),
(6, 'Stage Decoration with Theme/Motif', '', 12000),
(7, 'Venue Basic Decorations', '', 15000),
(8, 'Venue Decorations', '', 20000),
(9, 'Venue Full Decorations', '', 30000),
(10, 'Fully Furnished Round Table', 'per pc', 50),
(11, 'Round Table with Cloth', 'per pc', 40),
(12, 'Rectangular Table with Cloth', 'per pc', 40),
(13, 'Tiffany Chair (Gold/Silver) with Foam', 'per pc', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tblreservation`
--

CREATE TABLE `tblreservation` (
  `Id` int(11) NOT NULL,
  `Code` varchar(11) NOT NULL,
  `TransactionDate` datetime NOT NULL DEFAULT current_timestamp(),
  `RoomId` int(11) NOT NULL,
  `Arrival` datetime NOT NULL,
  `Departure` datetime NOT NULL,
  `Total` int(11) NOT NULL,
  `Deposit` int(11) NOT NULL,
  `GuestId` int(11) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Remarks` varchar(250) NOT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblreservation`
--

INSERT INTO `tblreservation` (`Id`, `Code`, `TransactionDate`, `RoomId`, `Arrival`, `Departure`, `Total`, `Deposit`, `GuestId`, `Status`, `Remarks`, `UserId`) VALUES
(1, '784256130', '2022-11-07 10:10:29', 2, '2022-11-10 14:00:46', '2022-11-12 14:00:46', 7000, 3000, 1, 'Accepted', 'Wedding Anniversary', 0),
(91, '', '2022-11-09 00:34:00', 102, '2022-11-10 14:00:46', '2022-11-12 14:00:46', 7000, 3000, 39, 'Accepted', 'Wedding Anniversary', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblroom`
--

CREATE TABLE `tblroom` (
  `Id` int(11) NOT NULL,
  `Number` int(11) NOT NULL,
  `RoomTypeId` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `GuestId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblroom`
--

INSERT INTO `tblroom` (`Id`, `Number`, `RoomTypeId`, `Status`, `GuestId`) VALUES
(1, 101, 1, 'Vacant', 0),
(2, 102, 1, 'Maintenance', 0),
(3, 103, 1, 'Cleaning', 0),
(4, 201, 2, 'Cleaning', 0),
(5, 202, 2, 'Cleaning', 0),
(6, 203, 2, 'Vacant', 0),
(7, 301, 3, 'Vacant', 0),
(8, 302, 3, 'Vacant', 0),
(9, 303, 3, 'Vacant', 0),
(10, 401, 4, 'Vacant', 0),
(11, 402, 4, 'Vacant', 0),
(12, 403, 4, 'Cleaning', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblroomtype`
--

CREATE TABLE `tblroomtype` (
  `Id` int(11) NOT NULL,
  `Type` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Person` int(1) NOT NULL,
  `Rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblroomtype`
--

INSERT INTO `tblroomtype` (`Id`, `Type`, `Description`, `Person`, `Rate`) VALUES
(1, 'Presidential Villa', 'Fully Air-Conditioned', 2, 3500),
(2, 'Suite Villa', '', 2, 3200),
(3, 'Mini Dorm', '', 4, 3000),
(4, 'Standard', '', 2, 2500);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `Id` int(11) NOT NULL,
  `Role` varchar(25) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Contact` varchar(11) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`Id`, `Role`, `FirstName`, `Email`, `LastName`, `Contact`, `Address`, `Username`, `Password`) VALUES
(1, 'Administrator', 'John Christopher', 'jcdangilan@gmail.com', 'Dangilan', '09122992291', 'Mabini Street Purok 1, Marasat Pequeñ0, San Mateo Isabela', 'admin', 'admin'),
(24, 'Receptionist', 'test123', 'test123@gmail.com', 'testr123', '1231231', '123 test1231', 'test123', 'test123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting_contact`
--

CREATE TABLE `tbl_setting_contact` (
  `SetCon_ID` int(11) NOT NULL,
  `SetConLocation` varchar(99) CHARACTER SET latin1 NOT NULL,
  `SetConEmail` varchar(99) CHARACTER SET latin1 NOT NULL,
  `SetConContactNo` varchar(99) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_setting_contact`
--

INSERT INTO `tbl_setting_contact` (`SetCon_ID`, `SetConLocation`, `SetConEmail`, `SetConContactNo`) VALUES
(1, 'Daramuangan Norte, San Mateo ,Isabela', 'VillaLaPerfecta@gmail.com', '0917-5500-399');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladditional`
--
ALTER TABLE `tbladditional`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblextra`
--
ALTER TABLE `tblextra`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblfoodpackage`
--
ALTER TABLE `tblfoodpackage`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblguest`
--
ALTER TABLE `tblguest`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblhall`
--
ALTER TABLE `tblhall`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblhallpackage`
--
ALTER TABLE `tblhallpackage`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblmisc`
--
ALTER TABLE `tblmisc`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`SUMMARYID`),
  ADD UNIQUE KEY `CONFIRMATIONCODE` (`CONFIRMATIONCODE`) USING BTREE,
  ADD KEY `GUESTID` (`GUESTID`) USING BTREE;

--
-- Indexes for table `tblrentals`
--
ALTER TABLE `tblrentals`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblreservation`
--
ALTER TABLE `tblreservation`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblroom`
--
ALTER TABLE `tblroom`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblroomtype`
--
ALTER TABLE `tblroomtype`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_setting_contact`
--
ALTER TABLE `tbl_setting_contact`
  ADD PRIMARY KEY (`SetCon_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladditional`
--
ALTER TABLE `tbladditional`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblextra`
--
ALTER TABLE `tblextra`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tblfoodpackage`
--
ALTER TABLE `tblfoodpackage`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `tblguest`
--
ALTER TABLE `tblguest`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tblhall`
--
ALTER TABLE `tblhall`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblhallpackage`
--
ALTER TABLE `tblhallpackage`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblmisc`
--
ALTER TABLE `tblmisc`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tblpayment`
--
ALTER TABLE `tblpayment`
  MODIFY `SUMMARYID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblrentals`
--
ALTER TABLE `tblrentals`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblreservation`
--
ALTER TABLE `tblreservation`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tblroom`
--
ALTER TABLE `tblroom`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=404;

--
-- AUTO_INCREMENT for table `tblroomtype`
--
ALTER TABLE `tblroomtype`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_setting_contact`
--
ALTER TABLE `tbl_setting_contact`
  MODIFY `SetCon_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
