-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 11:07 AM
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
(4, 'Vegetables 100 Pax', 4000),
(5, 'Lechon', 1000),
(6, 'Wine / Brandy', 500),
(7, ' Foods / Others', 300);

-- --------------------------------------------------------

--
-- Table structure for table `tblextra`
--

CREATE TABLE `tblextra` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Quantity` varchar(11) NOT NULL,
  `Cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblextra`
--

INSERT INTO `tblextra` (`Id`, `Name`, `Quantity`, `Cost`) VALUES
(1, 'Extra Bed', '1', 500),
(2, 'Pillow', '1', 150),
(43, 'Blanket', '1', 100);

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
  `Phone` bigint(11) NOT NULL,
  `Company` varchar(255) NOT NULL,
  `CompanyAddress` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Otp` int(11) NOT NULL,
  `Verify` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblguest`
--

INSERT INTO `tblguest` (`Id`, `FirstName`, `LastName`, `Address`, `BirthDay`, `Phone`, `Company`, `CompanyAddress`, `Email`, `Password`, `Otp`, `Verify`) VALUES
(1, 'John Christopher', ' Dangilan', 'Marasat Pequeno', '2000-01-12', 2147483647, 'ISU', 'Ilagan City', 'jcdangilan@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 0, 1),
(2, 'Shelby', ' Panget', 'Bannawag Sur', '1999-04-08', 2147483647, 'Remson Auto Parts', 'Santiago, Isabela', 'shelbygabuya@gmail.com', '1a64a010767f0725fb52111b0a9e9f84', 0, 1),
(3, 'Dj', ' Papatricio', 'marikina', '1999-01-01', 123456789, 'RealExcellence', 'Makati', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', 0, 1),
(295, 'Kenneth ', 'Marquez', 'Cabatuan, Isabela', '0000-00-00', 9123456789, '', '', '', '', 0, 1),
(296, 'Dennis ', 'Patricio', 'Pasay', '0000-00-00', 9987645312, '', '', '', '', 0, 1),
(300, 'Dennis Jayvee', 'Patricio', 'Villa Gamiao, San Mateo, Isabela', '0000-00-00', 9456789123, '', '', '', '', 0, 1),
(301, 'Federick', 'Martin', 'Marasat Peqeño, San Mateo, Isabela', '0000-00-00', 93216549874, '', '', '', '', 0, 1),
(302, 'Edward', 'Lazaro', 'Daramuangan Norte, San Mateo, Isabela', '0000-00-00', 9987321654, '', '', '', '', 0, 1),
(335, 'test', ' test', '123', '2022-11-15', 123, '', '', 'johndoe@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, 0),
(336, 'test', 'test', '123', '0000-00-00', 123, '', '', '', '', 0, 0);

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
(1, 'Package A', 'Fully Air-Conditioned Function Hall', 50, 4, 11000, 800, 'Fully air-conditionedHigh-Quality Sound with Full LightsTables with Cloth &Tiffany Chairs With Foam'),
(2, 'Package B', 'Fully Air-Conditioned Function Hall', 80, 4, 12000, 800, 'Fully air-conditionedHigh-Quality Sound with Full LightsTables with Cloth &Tiffany Chairs With Foam'),
(3, 'Package C', 'Fully air-conditioned Ballroom Hall', 100, 4, 15000, 1000, 'Fully air-conditionedHigh-Quality Sound with Full LightsPar Led LightsTables with Cloth &Tiffany Chairs With Foam'),
(4, 'Package D', 'Fully air-conditioned Ballroom Hall', 150, 4, 20000, 1000, 'Fully air-conditionedHigh-Quality Sound with Full LightsPar Led LightsTables with Cloth &Tiffany Chairs With Foam');

-- --------------------------------------------------------

--
-- Table structure for table `tblhallreservation`
--

CREATE TABLE `tblhallreservation` (
  `Id` int(11) NOT NULL,
  `Code` int(20) NOT NULL,
  `TransactionDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Status` varchar(25) NOT NULL,
  `GuestId` int(11) NOT NULL,
  `Arrival` datetime NOT NULL,
  `ExtraHours` int(11) NOT NULL,
  `HallId` int(11) NOT NULL,
  `HallTotal` double NOT NULL,
  `HalllPackageId` int(11) NOT NULL,
  `SoundSytem` int(11) NOT NULL,
  `FullLights` int(11) NOT NULL,
  `Projector` int(11) NOT NULL,
  `VenueBasic` int(11) NOT NULL,
  `VenueDecoration` int(11) NOT NULL,
  `VenueFull` int(11) NOT NULL,
  `StageBasic` int(11) NOT NULL,
  `StageTheme` int(11) NOT NULL,
  `MovingLights` int(11) NOT NULL,
  `FurnishedRoundTable` int(11) NOT NULL,
  `RoundTable` int(11) NOT NULL,
  `RectangularTable` int(11) NOT NULL,
  `TiffanyChair` int(11) NOT NULL,
  `RentTotal` double NOT NULL,
  `FoodPackageId` int(11) NOT NULL,
  `NumberPax` int(11) NOT NULL,
  `PricePax` double NOT NULL,
  `FoodTotal` double NOT NULL,
  `AddSeafood` int(11) NOT NULL,
  `AddPork` int(11) NOT NULL,
  `AddChicken` int(11) NOT NULL,
  `AddVegetables` int(11) NOT NULL,
  `AddTotal` double NOT NULL,
  `Lechon` int(11) NOT NULL,
  `Wine` int(11) NOT NULL,
  `OtherFood` int(11) NOT NULL,
  `CorkageTotal` double NOT NULL,
  `Remarks` varchar(225) NOT NULL,
  `Deposit` double NOT NULL,
  `Grand Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='CorkageTotal';

--
-- Dumping data for table `tblhallreservation`
--

INSERT INTO `tblhallreservation` (`Id`, `Code`, `TransactionDate`, `Status`, `GuestId`, `Arrival`, `ExtraHours`, `HallId`, `HallTotal`, `HalllPackageId`, `SoundSytem`, `FullLights`, `Projector`, `VenueBasic`, `VenueDecoration`, `VenueFull`, `StageBasic`, `StageTheme`, `MovingLights`, `FurnishedRoundTable`, `RoundTable`, `RectangularTable`, `TiffanyChair`, `RentTotal`, `FoodPackageId`, `NumberPax`, `PricePax`, `FoodTotal`, `AddSeafood`, `AddPork`, `AddChicken`, `AddVegetables`, `AddTotal`, `Lechon`, `Wine`, `OtherFood`, `CorkageTotal`, `Remarks`, `Deposit`, `Grand Total`) VALUES
(5, 278226331, '2022-11-17 03:25:44', 'Pending', 239, '2022-11-16 19:41:00', 6, 1, 10500, 4, 1, 0, 1, 0, 1, 0, 1, 0, 1, 2, 3, 4, 5, 20000, 2, 100, 300, 30000, 1, 2, 3, 4, 50000, 1, 2, 3, 9000, 'Birthday boy of 13, Theme Cars', 5000, 95315),
(27, 700782937, '2022-11-18 21:38:56', 'Accepted', 288, '2022-11-19 21:29:00', 0, 2, 20000, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 93150, 2, 10, 0, 4000, 1, 1, 1, 1, 17500, 1, 20, 1, 1320, 'wedding', 70000, 135970),
(28, 972444606, '2022-11-20 11:06:07', 'Accepted', 292, '2022-11-24 11:00:00', 4, 3, 14000, 0, 1, 1, 1, 0, 0, 1, 0, 1, 5, 20, 0, 0, 100, 57000, 3, 0, 0, 3500, 1, 1, 1, 1, 17500, 2, 20, 5, 13500, '', 500, 105500),
(34, 35012247, '2022-11-20 11:12:46', 'Pending', 293, '2022-11-30 11:11:00', 0, 1, 19000, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Conference', 10000, 19000),
(35, 91302660, '2022-11-20 11:27:13', 'Pending', 296, '2022-11-30 11:22:00', 2, 3, 32000, 4, 1, 1, 1, 0, 0, 1, 0, 1, 5, 5, 0, 0, 0, 54250, 1, 180, 0, 57600, 2, 0, 0, 0, 10000, 2, 1, 1, 2800, 'Itallian Classic', 100000, 156650),
(36, 687835531, '2022-11-20 13:27:08', 'Accepted', 299, '2022-11-20 13:26:00', 0, 2, 8000, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 30000, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 5000, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `tblhotel`
--

CREATE TABLE `tblhotel` (
  `Id` int(11) NOT NULL,
  `RoomId` int(11) NOT NULL,
  `Arrival` date NOT NULL,
  `Departure` date NOT NULL,
  `GuestId` int(11) NOT NULL,
  `RoomExtraId` int(255) NOT NULL,
  `Remarks` varchar(255) NOT NULL,
  `Deposit` double NOT NULL,
  `Discount` double NOT NULL,
  `Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblhotel`
--

INSERT INTO `tblhotel` (`Id`, `RoomId`, `Arrival`, `Departure`, `GuestId`, `RoomExtraId`, `Remarks`, `Deposit`, `Discount`, `Total`) VALUES
(1, 1, '0000-00-00', '0000-00-00', 0, 0, '', 0, 0, 0),
(2, 2, '2022-11-15', '2022-11-21', 300, 0, '', 4500, 0, 14000),
(3, 3, '0000-00-00', '0000-00-00', 0, 0, '', 0, 0, 0),
(4, 4, '0000-00-00', '0000-00-00', 0, 0, '', 0, 0, 0),
(5, 5, '0000-00-00', '0000-00-00', 0, 0, '', 0, 0, 0),
(6, 6, '2022-11-21', '2022-11-30', 301, 0, '', 13000, 0, 28800),
(7, 7, '0000-00-00', '0000-00-00', 0, 0, '', 0, 0, 0),
(8, 8, '0000-00-00', '0000-00-00', 0, 0, '', 0, 0, 0),
(9, 9, '0000-00-00', '0000-00-00', 0, 0, '', 0, 0, 0),
(10, 10, '0000-00-00', '0000-00-00', 0, 0, '', 0, 0, 0),
(11, 11, '2022-11-30', '2022-12-05', 295, 0, 'Give Complementary Drinks', 3500, 0, 12500),
(12, 12, '2022-11-30', '2022-12-05', 302, 0, '', 6000, 0, 12500);

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
(44, '5 cups of White Rice', 'Barkada Rice', 1, 100),
(48, '1 Litre', 'Coke', 1, 120),
(49, '1 Pitcher', 'Iced Tea', 1, 150);

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
  `Arrival` date NOT NULL,
  `Departure` date NOT NULL,
  `Total` int(11) NOT NULL,
  `Deposit` int(11) NOT NULL,
  `GuestId` int(11) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Remarks` varchar(250) NOT NULL,
  `PaymentLink` varchar(255) NOT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblreservation`
--

INSERT INTO `tblreservation` (`Id`, `Code`, `TransactionDate`, `RoomId`, `Arrival`, `Departure`, `Total`, `Deposit`, `GuestId`, `Status`, `Remarks`, `PaymentLink`, `UserId`) VALUES
(111, '689881131', '2022-11-20 11:21:21', 11, '2022-11-30', '2022-12-05', 12500, 3500, 295, 'Accepted', 'Give Complementary Drinks', '', 1),
(112, '452395385', '2022-11-20 19:56:32', 2, '2022-11-21', '2022-11-25', 14000, 5000, 300, 'Accepted', '', '', 1),
(113, '553461156', '2022-11-20 19:57:40', 6, '2022-11-21', '2022-11-30', 28800, 13000, 301, 'Accepted', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblroom`
--

CREATE TABLE `tblroom` (
  `Id` int(11) NOT NULL,
  `Number` varchar(255) NOT NULL,
  `RoomTypeId` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `GuestId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblroom`
--

INSERT INTO `tblroom` (`Id`, `Number`, `RoomTypeId`, `Status`, `GuestId`) VALUES
(1, '101', 1, 'Vacant', 0),
(2, '102', 1, 'Occupied', 300),
(3, '103', 1, 'Vacant', 0),
(4, '201', 2, 'Vacant', 0),
(5, '202', 2, 'Vacant', 0),
(6, '203', 2, 'Occupied', 301),
(7, '301', 3, 'Vacant', 0),
(8, '302', 3, 'Vacant', 0),
(9, '303', 3, 'Maintenance', 0),
(10, '401', 4, 'Maintenance', 0),
(11, '402', 4, 'Occupied', 295),
(12, '403', 4, 'Occupied', 302);

-- --------------------------------------------------------

--
-- Table structure for table `tblroomextra`
--

CREATE TABLE `tblroomextra` (
  `Id` int(11) NOT NULL,
  `ExtraId` int(11) NOT NULL,
  `HotelId` int(11) NOT NULL,
  `GuestId` int(11) NOT NULL,
  `IsActive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblroomextra`
--

INSERT INTO `tblroomextra` (`Id`, `ExtraId`, `HotelId`, `GuestId`, `IsActive`) VALUES
(104, 1, 2, 300, 1),
(105, 1, 2, 300, 1),
(106, 1, 2, 300, 1),
(107, 1, 2, 300, 1),
(108, 2, 2, 300, 1),
(109, 43, 2, 300, 1);

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
(1, 'Presidential Villa', '1 Queen Size Bed', 2, 3500),
(2, 'Suite Villa', '1 King Size Bed', 2, 3200),
(3, 'Mini Dorm', '2 Double Deck Bed', 4, 3000),
(4, 'Standard', '2 Single Bed', 2, 2500);

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
(24, 'Receptionist', 'test123', 'test123@gmail.com', 'testr123', '1231231', '123 test1231', 'test', 'test');

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
-- Indexes for table `tblhallreservation`
--
ALTER TABLE `tblhallreservation`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblhotel`
--
ALTER TABLE `tblhotel`
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
-- Indexes for table `tblroomextra`
--
ALTER TABLE `tblroomextra`
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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblextra`
--
ALTER TABLE `tblextra`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tblfoodpackage`
--
ALTER TABLE `tblfoodpackage`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `tblguest`
--
ALTER TABLE `tblguest`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

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
-- AUTO_INCREMENT for table `tblhallreservation`
--
ALTER TABLE `tblhallreservation`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tblhotel`
--
ALTER TABLE `tblhotel`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblmisc`
--
ALTER TABLE `tblmisc`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `tblroom`
--
ALTER TABLE `tblroom`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- AUTO_INCREMENT for table `tblroomextra`
--
ALTER TABLE `tblroomextra`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `tblroomtype`
--
ALTER TABLE `tblroomtype`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_setting_contact`
--
ALTER TABLE `tbl_setting_contact`
  MODIFY `SetCon_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
