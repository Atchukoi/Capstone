-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2023 at 12:58 PM
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
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Id` int(11) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `Email` varchar(225) NOT NULL,
  `Subject` varchar(225) NOT NULL,
  `Message` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Id`, `Name`, `Email`, `Subject`, `Message`) VALUES
(9, 'John Christopher Dangilan', 'dangilanjc@gmail.com', ' I like to make a reservation for your Ballroom Hall', 'i like to know about food packages you offer'),
(10, '11', '1@gmail.com', ' 1', '1'),
(11, '1', '1@gmail.com', ' 1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `extracategory`
--

CREATE TABLE `extracategory` (
  `Id` int(11) NOT NULL,
  `Title` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `extracategory`
--

INSERT INTO `extracategory` (`Id`, `Title`) VALUES
(1, 'Room Rentals'),
(2, 'Hall Rentals'),
(3, 'Food Package'),
(4, 'Additional Menu'),
(5, 'Corckage');

-- --------------------------------------------------------

--
-- Table structure for table `foodpackage`
--

CREATE TABLE `foodpackage` (
  `Id` int(11) NOT NULL,
  `Title` varchar(225) NOT NULL,
  `Description` varchar(225) NOT NULL,
  `Menu` varchar(255) NOT NULL,
  `Minimum` int(2) NOT NULL,
  `Maximum` int(2) NOT NULL,
  `Cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodpackage`
--

INSERT INTO `foodpackage` (`Id`, `Title`, `Description`, `Menu`, `Minimum`, `Maximum`, `Cost`) VALUES
(1, '50Pax (Min) - Bundle A ', '3 Main Courses', 'Pork or Beef, Chicken, Vegetables, Rice, Dessert (Buko Pandan Salad) & Iced Tea', 50, 79, 320),
(2, '80Pax (Min) - Bundle A', '3 Main Courses', 'Pork or Beef, Chicken, Vegetables, Rice, Dessert (Buko Pandan Salad) & Iced Tea', 80, 99, 300),
(3, '100Pax Or More - Bundle A', '3 Main Courses', 'Pork or Beef, Chicken, Vegetables, Rice, Dessert (Buko Pandan Salad) & Iced Tea', 100, 10000, 280),
(126, '50Pax (Min) - Bundle B', '4 Main Courses ', 'Pork, Beef, Chicken, Vegetables, Rice, Dessert (Buko Pandan Salad) & Iced Tea', 50, 79, 340),
(127, '80Pax (Min) - Bundle B', '4 Main Courses ', 'Pork, Beef, Chicken, Vegetables, Rice, Dessert (Buko Pandan Salad) & Iced Tea', 80, 99, 320),
(128, '100Pax or More - Bundle B', '4 Main Courses ', 'Pork, Beef, Chicken, Vegetables, Rice, Dessert (Buko Pandan Salad) & Iced Tea', 100, 10000, 300),
(129, '50Pax (Min) Bundle C', '5 Main Courses', 'Seafood, Pork, Beef, Chicken, Vegetables, Rice, Dessert (Buko Pandan Salad) & Iced Tea', 50, 79, 390),
(130, '80Pax (Min) Bundle C', '5 Main Courses', 'Seafood, Pork, Beef, Chicken, Vegetables, Rice, Dessert (Buko Pandan Salad) & Iced Tea', 80, 99, 370),
(131, '100Pax or More Bundle C', '5 Main Courses', 'Seafood, Pork, Beef, Chicken, Vegetables, Rice, Dessert (Buko Pandan Salad) & Iced Tea', 100, 10000, 350);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `Id` int(11) NOT NULL,
  `TransactionId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `PaymentTerms` varchar(50) NOT NULL,
  `AmountTender` double NOT NULL,
  `AmountChange` double NOT NULL,
  `DateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`Id`, `TransactionId`, `UserId`, `PaymentTerms`, `AmountTender`, `AmountChange`, `DateTime`) VALUES
(17, 1, 357, 'Cash', 18000, 666.67, '2023-01-20 07:41:58'),
(18, 2, 0, '-- Select Payment Method --', 14000, 0, '2023-01-20 07:44:41'),
(19, 2, 0, '-- Select Payment Method --', 0, 0, '2023-01-20 07:45:20'),
(20, 2, 0, '-- Select Payment Method --', 14000, 0, '2023-01-20 07:48:43'),
(21, 2, 0, '-- Select Payment Method --', 0, 0, '2023-01-20 07:50:39'),
(22, 2, 0, 'Cash', 14000, 0, '2023-01-20 07:52:07'),
(23, 2, 0, 'Cash', 14000, 0, '2023-01-20 07:54:12'),
(24, 10, 0, 'Cash', 13000, 0, '2023-01-20 09:56:00'),
(25, 3, 0, 'Cash', 6000, 0, '2023-01-20 13:45:03'),
(26, 1, 0, 'Cash', 2100, 0, '2023-01-20 14:05:26'),
(27, 1, 0, 'Cash', 2100, 0, '2023-01-20 14:07:16'),
(28, 1, 0, 'Cash', 2100, 0, '2023-01-20 14:08:44'),
(29, 1, 0, 'Cash', 2400, 0, '2023-01-20 14:11:23'),
(30, 1, 0, 'Cash', 2400, 0, '2023-01-20 14:11:46'),
(31, 1, 0, 'Cash', 2400, 0, '2023-01-20 14:12:08'),
(32, 1, 0, 'Cash', 2450, 0, '2023-01-20 14:12:18'),
(33, 1, 0, 'Cash', 2450, 0, '2023-01-20 14:12:41'),
(34, 2, 0, 'Cash', 3000, 52.92, '2023-01-20 14:13:30'),
(35, 4, 0, 'Cash', 8150, 0, '2023-01-20 14:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `Id` int(11) NOT NULL,
  `Title` varchar(225) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`Id`, `Title`, `Description`) VALUES
(1, 'Administrator', ''),
(2, 'Receptionist', ''),
(3, 'Guest', '');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `RoomTypeId` varchar(255) NOT NULL,
  `RoomCategoryId` int(11) NOT NULL,
  `RoomStatusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Id`, `Title`, `RoomTypeId`, `RoomCategoryId`, `RoomStatusId`) VALUES
(1, 'Room 101', '1', 1, 2),
(2, 'Room 102', '1', 1, 2),
(3, 'Room 103', '1', 1, 2),
(4, 'Room 201', '1', 2, 2),
(5, 'Room 202', '1', 2, 2),
(6, 'Room 203', '1', 2, 2),
(7, 'Room 301', '1', 3, 2),
(8, 'Room 302', '1', 3, 2),
(9, 'Room 303', '1', 3, 2),
(10, 'Room 401', '1', 4, 2),
(11, 'Room 402', '1', 4, 2),
(12, 'Room 403', '1', 4, 2),
(13, 'Function Hall 1', '2', 5, 2),
(14, 'Function Hall 2', '2', 5, 2),
(15, 'Ballroom Hall', '2', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roomcategory`
--

CREATE TABLE `roomcategory` (
  `Id` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Title` varchar(30) CHARACTER SET latin1 NOT NULL,
  `Description` varchar(255) NOT NULL,
  `RoomTypeId` int(11) NOT NULL,
  `PersonCount` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomcategory`
--

INSERT INTO `roomcategory` (`Id`, `Image`, `Title`, `Description`, `RoomTypeId`, `PersonCount`) VALUES
(1, 'Presidential.png', 'Presidential Villa', 'Fully Air-Conditioned Room ', 1, 2),
(2, 'SuiteVilla.png', 'Suite Villa', 'Fully Air-Conditioned  Room', 1, 2),
(3, 'DormRoom.png', 'Mini Dorm', 'Fully Air-Conditioned  Room', 1, 4),
(4, 'Standard.png', 'Standard', 'Fully Air-Conditioned  Room', 1, 2),
(5, '', 'Function Hall', 'Fully-Airconditioned Function Hall\r\n', 2, 0),
(6, '', 'Ballroom Hall', 'Fully-Airconditioned Ballroom Hall\r\n', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roomextra`
--

CREATE TABLE `roomextra` (
  `Id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Cost` double NOT NULL,
  `ExtraCategoryId` int(11) NOT NULL,
  `RoomTypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomextra`
--

INSERT INTO `roomextra` (`Id`, `Title`, `Description`, `Cost`, `ExtraCategoryId`, `RoomTypeID`) VALUES
(1, 'Extra Bed', '', 500, 1, 1),
(2, 'Pillow', '', 150, 1, 1),
(3, 'Blanket', '', 100, 1, 1),
(5, 'Evening Event or Full Lights', '', 1000, 2, 2),
(6, 'Moving Lights / pc', '', 1500, 2, 2),
(7, 'Projector', '', 2000, 2, 2),
(8, 'Stage Basic Decorations', '', 10000, 2, 2),
(9, 'Stage Decoration with Theme/Motif', '', 12000, 2, 2),
(10, 'Venue Basic Decorations', '', 15000, 2, 2),
(11, 'Venue Decorations', '', 20000, 2, 2),
(12, 'Venue Full Decorations', '', 30000, 2, 2),
(13, 'Fully Furnished Round Table', 'per pc', 50, 2, 2),
(14, 'Round Table with Cloth', 'per pc', 40, 2, 2),
(15, 'Rectangular Table with Cloth', 'per pc', 40, 2, 2),
(16, 'Tiffany Chair (Gold/Silver) with Foam', 'per pc', 20, 2, 2),
(17, 'Seafood 100 Pax', '', 5000, 4, 2),
(18, 'Pork 100 Pax', '', 4500, 4, 2),
(19, 'Chicken 100 Pax', '', 4000, 4, 2),
(20, 'Vegetables 100 Pax', '', 4000, 4, 2),
(21, 'Lechon', '', 1000, 5, 2),
(22, 'Wine / Brandy', '', 500, 5, 2),
(23, ' Foods / Others', '', 300, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roomrate`
--

CREATE TABLE `roomrate` (
  `Id` int(11) NOT NULL,
  `Title` varchar(225) NOT NULL,
  `Description` text NOT NULL,
  `RoomTypeID` int(11) NOT NULL,
  `RoomCategoryId` int(11) NOT NULL,
  `RoomPriceTrailId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomrate`
--

INSERT INTO `roomrate` (`Id`, `Title`, `Description`, `RoomTypeID`, `RoomCategoryId`, `RoomPriceTrailId`) VALUES
(1, 'Presidential Villa Standard Rate', 'with 1 Queen Size Bed and Breakfast Meal Included', 1, 1, 1),
(2, 'Suite Villa Standard Rate', 'with 1 King Size Bed and Breakfast Meal Included', 1, 2, 2),
(3, 'Mini Dorm Standard Rate', 'with 2 Double Deck Beds and Breakfast Meal Included', 1, 3, 3),
(4, 'Standard Room Standard Rate', 'with 2 Single Bed and Breakfast Meal Included', 1, 4, 4),
(5, 'Function Hall Standard Rate', 'None', 2, 5, 5),
(6, 'Ballroom Hall Standard Rate', 'None', 2, 6, 6),
(7, '50 Pax - Function Hall Package A ', 'High-Quality Sound with \r\nFull Lights\r\nTables with Cloth &\r\nTiffany Chairs With Foam', 2, 5, 7),
(8, '80 Pax - Function Hall Package B', 'High-Quality Sound with \r\nFull Lights\r\nTables with Cloth &\r\nTiffany Chairs With Foam', 2, 5, 8),
(9, '100 Pax - Ballroom Hall Package A', 'High-Quality Sound with \r\nFull Lights\r\nPar Led Lights\r\nTables with Cloth &\r\nTiffany Chairs With Foam', 2, 6, 9),
(10, '150 Pax -Ballroom Hall Package B', 'High-Quality Sound with \r\nFull Lights\r\nPar Led Lights\r\nTables with Cloth &\r\nTiffany Chairs With Foam', 2, 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `roomratepricetrail`
--

CREATE TABLE `roomratepricetrail` (
  `Id` int(11) NOT NULL,
  `RoomRateId` int(11) NOT NULL,
  `DateTimeCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `Rate` double NOT NULL,
  `InitialTime` int(11) NOT NULL,
  `ExceedingRatePerHour` double NOT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomratepricetrail`
--

INSERT INTO `roomratepricetrail` (`Id`, `RoomRateId`, `DateTimeCreated`, `Rate`, `InitialTime`, `ExceedingRatePerHour`, `IsActive`) VALUES
(1, 1, '2022-12-07 00:59:06', 3500, 22, 300, b'1'),
(2, 2, '2022-12-07 00:59:06', 3200, 22, 250, b'1'),
(3, 3, '2022-12-07 00:59:06', 3000, 22, 200, b'1'),
(4, 4, '2022-12-07 00:59:06', 2500, 22, 150, b'1'),
(5, 5, '2022-12-07 01:26:13', 8000, 4, 800, b'1'),
(6, 6, '2022-12-07 01:26:13', 10000, 4, 1000, b'1'),
(7, 7, '2022-12-07 02:31:08', 11000, 4, 800, b'1'),
(8, 8, '2022-12-07 02:31:08', 12000, 4, 800, b'1'),
(9, 9, '2022-12-07 02:31:08', 15000, 4, 1000, b'1'),
(10, 10, '2022-12-07 02:31:08', 20000, 4, 1000, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `roomreservation`
--

CREATE TABLE `roomreservation` (
  `Id` int(11) NOT NULL,
  `Code` varchar(11) NOT NULL,
  `TransactionDate` datetime NOT NULL DEFAULT current_timestamp(),
  `RoomRateId` int(11) NOT NULL,
  `Arrival` date NOT NULL,
  `Departure` date NOT NULL,
  `Total` int(11) NOT NULL,
  `Deposit` int(11) NOT NULL,
  `GuestId` int(11) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Notes` text NOT NULL,
  `PaymentType` varchar(255) NOT NULL,
  `PaymentLink` varchar(255) NOT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomreservation`
--

INSERT INTO `roomreservation` (`Id`, `Code`, `TransactionDate`, `RoomRateId`, `Arrival`, `Departure`, `Total`, `Deposit`, `GuestId`, `Status`, `Notes`, `PaymentType`, `PaymentLink`, `UserId`) VALUES
(157, '456764790', '2022-11-28 22:10:45', 3, '2022-12-04', '2022-12-06', 9188, 1000, 433, 'Lapsed', '', '', '', 27),
(161, '378094936', '2022-11-28 22:33:00', 4, '2022-12-20', '2022-12-25', 19153, 10000, 439, 'Lapsed', '', '', '', 27),
(165, '540963109', '2022-11-28 22:47:58', 2, '2022-12-11', '2022-12-14', 9067, 1000, 443, 'Lapsed', '', '', '', 27),
(168, '963147625', '2022-11-28 22:55:46', 3, '2022-12-01', '2022-12-03', 6267, 1000, 446, 'Lapsed', '', '', '', 27),
(170, '428548660', '2022-11-28 23:04:53', 3, '2022-12-17', '2022-12-20', 9600, 1000, 449, 'Lapsed', '', '', '', 27),
(171, '114831540', '2022-11-29 00:21:43', 4, '2022-12-01', '2022-11-17', -48426, 0, 1, 'Pending', '', '', '', 0),
(178, '436424322', '2023-01-15 18:15:10', 4, '2023-01-15', '2023-01-22', 17500, 10000, 36, 'Booked', 'wedding anniversary', '', '', 1),
(182, '778133265', '2023-01-17 10:47:51', 1, '2023-01-19', '2023-01-20', 3500, 1500, 308, 'Booked', 'None', '', '', 1),
(184, '49155507', '2023-01-19 23:04:15', 1, '2023-01-25', '2023-01-30', 17500, 10000, 357, 'Booked', '', '', '', 27),
(185, '612199567', '2023-01-19 23:04:58', 1, '2023-01-25', '2023-01-30', 17500, 11000, 358, 'Booked', '', '', '', 27),
(186, '351115720', '2023-01-19 23:05:39', 1, '2023-01-25', '2023-01-30', 17500, 12000, 359, 'Booked', '', '', '', 27),
(187, '274279937', '2023-01-20 01:30:28', 2, '2023-01-30', '2023-02-02', 9600, 0, 356, 'Booked', 'None', 'Gcash', '710503010', 27),
(188, '860667494', '2023-01-20 01:32:08', 1, '2023-01-23', '2023-01-25', 7000, 1000, 356, 'Pending', 'design the room with lavander petals', 'Gcash', '123456789', 27),
(190, '776015955', '2023-01-20 05:33:12', 1, '2023-01-23', '2023-01-31', 28000, 14000, 360, 'Booked', 'Design the room for bday surprise', '', '', 29),
(191, '771930314', '2023-01-20 09:32:15', 1, '2023-01-22', '2023-01-23', 3500, 1500, 361, 'Booked', '', '', '', 29),
(192, '20609699', '2023-01-20 10:18:26', 2, '2023-01-22', '2023-01-27', 16000, 8000, 363, 'Booked', '', '', '', 29),
(193, '772495163', '2023-01-20 10:19:06', 4, '2023-01-22', '2023-01-23', 2500, 1500, 364, 'Accepted', '', '', '', 29),
(194, '799573380', '2023-01-20 10:22:41', 10, '2023-01-31', '0000-00-00', 143570, 40000, 365, 'Booked', 'Alice in Wonderland Theme', '', '', 29),
(195, '250046906', '2023-01-20 10:46:37', 7, '2023-01-20', '0000-00-00', 27000, 10000, 366, 'Accepted', 'Conference', '', '', 29),
(196, '336097518', '2023-01-20 17:13:00', 2, '2023-01-27', '2023-01-30', 9600, 0, 356, 'Pending', '', '', '', 29);

-- --------------------------------------------------------

--
-- Table structure for table `roomreservationextra`
--

CREATE TABLE `roomreservationextra` (
  `Id` int(11) NOT NULL,
  `RoomReservationId` int(11) NOT NULL,
  `RoomExtraId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomreservationextra`
--

INSERT INTO `roomreservationextra` (`Id`, `RoomReservationId`, `RoomExtraId`, `Quantity`) VALUES
(1, 130, 13, 1),
(2, 130, 16, 2),
(3, 183, 13, 1),
(4, 183, 14, 2),
(5, 183, 15, 3),
(6, 183, 16, 1),
(7, 194, 13, 1),
(8, 194, 16, 1),
(9, 194, 17, 1),
(10, 194, 18, 1),
(11, 194, 19, 1),
(12, 194, 20, 1),
(13, 194, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roomstatus`
--

CREATE TABLE `roomstatus` (
  `Id` int(11) NOT NULL,
  `Title` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomstatus`
--

INSERT INTO `roomstatus` (`Id`, `Title`) VALUES
(1, 'Occupied'),
(2, 'Vacant'),
(3, 'Maintenance'),
(4, 'Cleaning');

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `Id` int(11) NOT NULL,
  `Title` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`Id`, `Title`) VALUES
(1, 'Hotel'),
(2, 'Hall');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `Id` int(11) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Phone` varchar(250) NOT NULL,
  `Telephone` varchar(250) NOT NULL,
  `Twitter` varchar(250) NOT NULL,
  `Facebook` varchar(250) NOT NULL,
  `Instagram` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`Id`, `Address`, `Phone`, `Telephone`, `Twitter`, `Facebook`, `Instagram`) VALUES
(1, '', '', '', '', '', '');

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
  `Event` varchar(250) NOT NULL,
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
  `GrandTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='CorkageTotal';

--
-- Dumping data for table `tblhallreservation`
--

INSERT INTO `tblhallreservation` (`Id`, `Code`, `TransactionDate`, `Status`, `GuestId`, `Arrival`, `Event`, `ExtraHours`, `HallId`, `HallTotal`, `HalllPackageId`, `SoundSytem`, `FullLights`, `Projector`, `VenueBasic`, `VenueDecoration`, `VenueFull`, `StageBasic`, `StageTheme`, `MovingLights`, `FurnishedRoundTable`, `RoundTable`, `RectangularTable`, `TiffanyChair`, `RentTotal`, `FoodPackageId`, `NumberPax`, `PricePax`, `FoodTotal`, `AddSeafood`, `AddPork`, `AddChicken`, `AddVegetables`, `AddTotal`, `Lechon`, `Wine`, `OtherFood`, `CorkageTotal`, `Remarks`, `Deposit`, `GrandTotal`) VALUES
(42, 821988922, '2022-11-28 14:20:34', 'Pending', 1, '2022-12-10 14:00:00', 'Birthday Party', 0, 3, 20000, 4, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 30000, 2, 150, 0, 0, 1, 0, 0, 0, 5000, 1, 20, 0, 11000, '', 25000, 66000),
(52, 542308078, '2022-11-29 03:03:26', 'Pending', 453, '2022-12-07 08:00:00', 'Seminar', 0, 1, 11000, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 80, 0, 0, 4, 0, 0, 0, 20000, 0, 0, 0, 0, '', 0, 31000);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `Id` int(11) NOT NULL,
  `RoomId` int(11) NOT NULL,
  `ArrivalDateTime` datetime NOT NULL,
  `DepartureDateTime` datetime NOT NULL,
  `UserId` int(11) NOT NULL,
  `Notes` text NOT NULL,
  `RoomPriceTrailId` int(11) NOT NULL,
  `RoomChargesTotal` double NOT NULL,
  `ExtraChargesTotal` double NOT NULL,
  `SubTotal` double NOT NULL,
  `Deposit` int(11) NOT NULL,
  `Discount` double NOT NULL,
  `Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`Id`, `RoomId`, `ArrivalDateTime`, `DepartureDateTime`, `UserId`, `Notes`, `RoomPriceTrailId`, `RoomChargesTotal`, `ExtraChargesTotal`, `SubTotal`, `Deposit`, `Discount`, `Total`) VALUES
(1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0', 0, 0, 0, 0, 0, 0, 0),
(2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0', 0, 0, 0, 0, 0, 0, 0),
(3, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0', 0, 0, 0, 0, 0, 0, 0),
(4, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0', 0, 0, 0, 0, 0, 0, 0),
(5, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0', 0, 0, 0, 0, 0, 0, 0),
(6, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0', 0, 0, 0, 0, 0, 0, 0),
(7, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0', 0, 0, 0, 0, 0, 0, 0),
(8, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0', 0, 0, 0, 0, 0, 0, 0),
(9, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0', 0, 0, 0, 0, 0, 0, 0),
(10, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0', 0, 0, 0, 0, 0, 0, 0),
(11, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0', 0, 0, 0, 0, 0, 0, 0),
(12, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0', 0, 0, 0, 0, 0, 0, 0),
(13, 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', 0, 0, 0, 0, 0, 0, 0),
(14, 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', 0, 0, 0, 0, 0, 0, 0),
(15, 15, '2023-01-31 00:00:00', '0000-00-00 00:00:00', 365, 'Alice in Wonderland Theme', 10, 0, 0, 0, 40000, 0, 143570),
(16, 0, '2023-01-25 00:00:00', '2023-02-01 16:00:00', 357, '', 1, 26833.33, 500, 27333.33, 10000, 0, 17333.33),
(17, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 359, '359', 359, 359, 359, 359, 359, 359, 359);

-- --------------------------------------------------------

--
-- Table structure for table `transactionextra`
--

CREATE TABLE `transactionextra` (
  `Id` int(11) NOT NULL,
  `TransactionId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `RoomExtraId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `TotalAmount` double NOT NULL,
  `IsActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactionextra`
--

INSERT INTO `transactionextra` (`Id`, `TransactionId`, `UserId`, `RoomExtraId`, `Quantity`, `TotalAmount`, `IsActive`) VALUES
(19, 1, 361, 2, 2, 300, 0),
(20, 3, 359, 1, 1, 500, 0),
(21, 1, 361, 2, 1, 150, 0),
(22, 2, 368, 1, 1, 500, 0),
(23, 4, 363, 2, 1, 150, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactionhistory`
--

CREATE TABLE `transactionhistory` (
  `Id` int(11) NOT NULL,
  `TransactionId` int(11) NOT NULL,
  `RoomId` int(11) NOT NULL,
  `ArrivalDateTime` datetime NOT NULL,
  `DepartureDateTime` datetime NOT NULL,
  `UserId` int(11) NOT NULL,
  `Notes` text NOT NULL,
  `RoomPriceTrailId` int(11) NOT NULL,
  `RoomChargesTotal` double NOT NULL,
  `ExtraChargesTotal` double NOT NULL,
  `SubTotal` double NOT NULL,
  `Deposit` int(11) NOT NULL,
  `Discount` double NOT NULL,
  `Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactionhistory`
--

INSERT INTO `transactionhistory` (`Id`, `TransactionId`, `RoomId`, `ArrivalDateTime`, `DepartureDateTime`, `UserId`, `Notes`, `RoomPriceTrailId`, `RoomChargesTotal`, `ExtraChargesTotal`, `SubTotal`, `Deposit`, `Discount`, `Total`) VALUES
(7, 3, 3, '2023-01-25 00:00:00', '2023-01-30 00:00:00', 359, '', 1, 17500, 500, 18000, 12000, 0, 6000),
(8, 1, 1, '2023-01-22 00:00:00', '2023-01-23 00:00:00', 361, '', 1, 3500, 450, 3950, 1500, 0, 2450),
(9, 2, 2, '2023-01-20 07:13:12', '2023-01-21 00:00:00', 368, '0', 0, 2447.08, 500, 2947.08, 0, 0, 2947.08),
(10, 4, 4, '2023-01-22 00:00:00', '2023-01-27 00:00:00', 363, '', 2, 16000, 150, 16150, 8000, 0, 8150);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `BirthDate` date NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact` varchar(11) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `RoleId` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `OneTimePassword` int(5) NOT NULL,
  `IsVerified` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `FirstName`, `LastName`, `BirthDate`, `Email`, `Contact`, `Address`, `RoleId`, `Username`, `Password`, `OneTimePassword`, `IsVerified`) VALUES
(29, 'John Christopher', ' Dangilan', '2023-01-15', 'dangilanjc@gmail.com', '09663220282', 'Marasat Pequeno', 1, 'admin', '098f6bcd4621d373cade4e832627b4f6', 0, b'1'),
(308, 'Germalyn', 'Marin', '0000-00-00', '', '12345678910', 'Pruok 1, San Antonio, Ilagan City', 3, '', '', 0, b'1'),
(356, 'Arvin', ' Pacursa', '1999-06-30', 'arvinpacursa30@gmail.com', '09262610181', 'Purok 5 Centro, San Antonio, City of Ilagan, Isabela', 3, '', 'bebf3efbeb46dc58b01a3ffdb55f2577', 0, b'1'),
(357, 'Edward', 'Lazaro', '0000-00-00', '', '09663220282', 'San Andres, San Mateo, Isabela', 3, '', '', 0, b'0'),
(358, 'Cherry', 'Rumbao', '0000-00-00', '', '09457812963', 'San Andres, San Mateo, Isabela', 3, '', '', 0, b'0'),
(359, 'Niko', 'Torres', '0000-00-00', '', '09156847923', 'Daramuangan Norte, San Mateo, Isabela', 3, '', '', 0, b'0'),
(360, 'Juan', 'DelaCruz', '0000-00-00', '', '09153265847', 'Bella Luz, San Mateo, Isabela', 3, '', '', 0, b'0'),
(361, 'Kenneth', 'Marquez', '0000-00-00', '', '09663220282', 'San Mateo', 3, '', '', 0, b'0'),
(362, 'Arvin', 'Pacursa', '0000-00-00', '', '09663220282', 'Ilagan City', 0, '', '', 0, b'0'),
(363, 'Edward', 'Lazaro', '0000-00-00', '', '09126549876', 'Bella Luz, San Mateo, Isabela', 3, '', '', 0, b'0'),
(364, 'Era', 'Gabuya', '0000-00-00', '', '09184864949', 'Santiago City,', 3, '', '', 0, b'0'),
(365, 'Kyla', 'Pucut', '0000-00-00', '', '09984875123', 'Cabatuan, Isabela', 0, '', '', 0, b'0'),
(366, 'Ryan', 'Fernandez', '0000-00-00', '', '09663220282', 'San Antonio, Ilagan, Isabela', 0, '', '', 0, b'0'),
(368, 'yesy', 'defe', '0000-00-00', '', '09663220282', '{Purok 1 San Mateo', 0, '', '', 0, b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `extracategory`
--
ALTER TABLE `extracategory`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `foodpackage`
--
ALTER TABLE `foodpackage`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `roomcategory`
--
ALTER TABLE `roomcategory`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `roomextra`
--
ALTER TABLE `roomextra`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `roomrate`
--
ALTER TABLE `roomrate`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `roomratepricetrail`
--
ALTER TABLE `roomratepricetrail`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `roomreservation`
--
ALTER TABLE `roomreservation`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `roomreservationextra`
--
ALTER TABLE `roomreservationextra`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `roomstatus`
--
ALTER TABLE `roomstatus`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblhallreservation`
--
ALTER TABLE `tblhallreservation`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `transactionextra`
--
ALTER TABLE `transactionextra`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `transactionhistory`
--
ALTER TABLE `transactionhistory`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `extracategory`
--
ALTER TABLE `extracategory`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `foodpackage`
--
ALTER TABLE `foodpackage`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=408;

--
-- AUTO_INCREMENT for table `roomcategory`
--
ALTER TABLE `roomcategory`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roomextra`
--
ALTER TABLE `roomextra`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `roomrate`
--
ALTER TABLE `roomrate`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roomratepricetrail`
--
ALTER TABLE `roomratepricetrail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roomreservation`
--
ALTER TABLE `roomreservation`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `roomreservationextra`
--
ALTER TABLE `roomreservationextra`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roomstatus`
--
ALTER TABLE `roomstatus`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblhallreservation`
--
ALTER TABLE `tblhallreservation`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transactionextra`
--
ALTER TABLE `transactionextra`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `transactionhistory`
--
ALTER TABLE `transactionhistory`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
