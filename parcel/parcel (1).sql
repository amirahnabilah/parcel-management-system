-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2019 at 12:51 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parcel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin123', '');

-- --------------------------------------------------------

--
-- Table structure for table `parcel_info`
--

CREATE TABLE `parcel_info` (
  `id` int(11) NOT NULL,
  `studID` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `no_track` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `stud_address` varchar(100) NOT NULL,
  `penalty` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parcel_info`
--

INSERT INTO `parcel_info` (`id`, `studID`, `date`, `no_track`, `status`, `stud_address`, `penalty`) VALUES
(17, 'MAS18274', '2019-01-09', 'EF006144864MY', 'pending', 'SQ-Q-5-03-A(1), Lekiu, Satria', 134),
(18, 'MAS12652', '2019-01-17', 'TR108T10', 'pending', 'SQ-Q-8-03-C(2), Lekiu, Satria', 126),
(20, 'MAS21450', '2019-01-22', '12HAA1200345', 'received', 'SQ-Q-8-05-E(2), Lekiu, Satria', 0),
(21, 'MAS28915', '2019-02-01', 'MYCA00367920', 'pending', 'SQ-Q-7-11-A(2), Lekiu, Satria', 111),
(22, 'MAS30808', '2019-02-11', 'ERA144852526MY', 'received', 'SQ-Q-6-01-B(1), Lekiu, Satria', 0),
(23, 'MAS15793', '2019-02-20', 'my0309281955', 'received', 'SQ-Q-4-03-C(2), Lekiu, Satria', 0),
(24, 'MAS25238', '2019-02-28', 'mymp000009363797', 'received', 'SQ-Q-1-08-B(2), Lekiu, Satria', 0),
(25, 'MAS20912', '2019-03-05', 'SHX15625390BMY', 'pending', 'SQ-Q-6-12-C(1), Lekiu, Satria', 79),
(26, 'MAS6185', '2019-03-14', 'en345821675my', 'received', 'SQ-Q-7-02-A(1), Lekiu, Satria', 0),
(27, 'MAS24087', '2019-03-19', 'er855665316my', 'pending', 'SQ-Q-9-10-E(2), Lekiu, Satria', 65),
(28, 'MAS30638', '2019-03-29', 'LPG000006698778', 'received', 'SQ-Q-2-08-D(1), Lekiu, Satria', 0),
(29, 'MAS16900', '2019-03-31', '620019744814', 'received', 'SQ-Q-11-05-A(1), Lekiu, Satria', 0),
(30, 'MAS1005', '2019-04-13', 'en240674301my', 'received', 'SQ-Q-8-01-E(1), Lekiu, Satria', 0),
(31, 'MAS10575', '2019-04-15', 'lg243376275my', 'received', 'SQ-Q-8-01-D(1), Lekiu, Satria', 0),
(32, 'MAS22748', '2019-04-18', 'shx18319040bmy', 'received', 'SQ-Q-3-03-B(1), Lekiu, Satria', 0),
(33, 'MAS4642', '2019-04-20', 'nvmysxcmy001363449', 'received', 'SQ-Q-1-01-A(1), Lekiu, Satria', 0),
(34, 'MAS24762', '2019-04-25', 'MY0306661413', 'pending', 'SQ-Q-2-06-E(1), Lekiu, Satria', 28),
(35, 'MAS17587', '2019-04-26', 'eu013671217my', 'pending', 'SQ-Q-10-01-D(2), Lekiu, Satria', 27),
(36, 'MAS31344', '2019-04-28', 'NVMYCARCO000005927', 'pending', 'SQ-Q-12-01-D(2), Lekiu, Satria', 25),
(37, 'MAS29161', '2019-05-02', 'eha018445481my', 'received', 'SQ-Q-4-06-A(1), Lekiu, Satria', 0),
(38, 'MAS9928', '2019-05-04', 'EH893907110MY', 'received', 'SQ-Q-8-01-A(1), Lekiu, Satria', 0),
(39, 'MAS11886', '2019-05-07', 'gam004148457', 'received', 'SQ-Q-7-04-C(1), Lekiu, Satria', 0),
(40, 'MAS30991', '2019-05-11', 'mysu000001810505', 'pending', 'SQ-Q-9-01-B(1), Lekiu, Satria', 12),
(41, 'MAS19868', '2019-05-13', 'fe003843249my', 'pending', 'SQ-Q-7-07-D(1), Lekiu, Satria', 10),
(42, 'MAS19050', '2019-05-20', 'TRX104567MY', 'pending', 'SQ-Q-5-12-A(2), Lekiu, Satria', 3),
(43, 'MAS11099', '2019-05-27', 'ER78107TYX', 'pending', 'SQ-Q-9-04-B(1), Lekiu, Satria', 0),
(44, 'MAS31015', '2019-05-27', 'ep525747150my', 'pending', 'SQ-Q-7-01-C(1), Lekiu, Satria', 0),
(45, 'MAS21370', '2019-05-29', 'MY14251627E', 'pending', 'Lekiu', 0),
(46, 'MAS1921', '2019-05-29', 'MY14232627E', 'pending', 'Tuah', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studId` varchar(150) NOT NULL,
  `studName` varchar(500) NOT NULL,
  `telPhone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studId`, `studName`, `telPhone`) VALUES
('MAS1005', 'Anita', '01788105107'),
('MAS1010', 'Afif Syakir', '1110406557'),
('MAS10575', 'Adibah', '01877104568'),
('MAS11099', 'Arbaien Ariff', '0198756103'),
('MAS11886', 'Fatin Shazwani', '018769201012'),
('MAS12326', 'Abil', '0111040281'),
('MAS12652', 'Amirah Nabilah', '0132209910'),
('MAS14518', 'Amin Nasri', '0182230109'),
('MAS15724', 'lala', '`1234567890---0'),
('MAS15793', 'Nabihah', '0123221089'),
('MAS16181', 'Syakir', '0123456789'),
('MAS16900', 'Munirah', '01920187610'),
('MAS17076', 'rita', '0123456789'),
('MAS17587', 'Awin', '0133105678'),
('MAS17965', 'Afif syakir', '0182230109'),
('MAS18007', 'Jeyshalini', '0145678910'),
('MAS18274', 'Ain Nadhirah', '0145678910'),
('MAS19050', 'Afifah', '0145671092'),
('MAS1921', 'Afif', '01110406557'),
('MAS195', 'AIN', 'saas'),
('MAS19596', 'Abil', '0111040281'),
('MAS19868', 'Aina aqilah', '0163356710'),
('MAS20912', 'Huda', '018334510'),
('MAS21370', 'Abil', '0111040281'),
('MAS21450', 'Alia Natasha', '0143342108'),
('MAS22748', 'Rita Rudaini', '0192345671'),
('MAS22945', 'muni', '123456789'),
('MAS24087', 'Zaiti', '0134678109'),
('MAS24641', 'syida', '0132209910'),
('MAS24762', 'Joyce', '018911670'),
('MAS25238', 'Liyana Sobri', '0193345567'),
('MAS26106', 'AIN', '123456789'),
('MAS28629', 'Afif', '0111040281'),
('MAS28915', 'Siti Nur Liyana', '0162245101'),
('MAS29161', 'Umairah Ashifa', '0134567180'),
('MAS30638', 'Syahirah', '0145587108'),
('MAS30808', 'Maimunah', '01322771989'),
('MAS30991', 'Fatin afeefa', '0189910451'),
('MAS31015', 'Nurin Nisadayana', '0176891056'),
('MAS31344', 'Wana Hasriti', '01998104567'),
('MAS4642', 'Fatin Nirwarna', '017653240'),
('MAS6185', 'Iylia ', '0197788195'),
('MAS6225', 'Ifa ', '014566710'),
('MAS9013', 'syida ', '0145678910'),
('MAS9928', 'Nadia Fatima', '0145627910');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcel_info`
--
ALTER TABLE `parcel_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studID` (`studID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `parcel_info`
--
ALTER TABLE `parcel_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `parcel_info`
--
ALTER TABLE `parcel_info`
  ADD CONSTRAINT `parcel_info_ibfk_1` FOREIGN KEY (`studID`) REFERENCES `student` (`studId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
