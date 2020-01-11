-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2019 at 02:51 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xtraskool`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `cid` int(250) NOT NULL,
  `c_name` varchar(250) NOT NULL,
  `degree` varchar(250) NOT NULL,
  `pinid` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`cid`, `c_name`, `degree`, `pinid`) VALUES
(1, 'software engineering', 'engineering', '12345'),
(51, 'Volkswagen', 'biz', '44781'),
(52, 'BMW', 'biz', '69260'),
(53, 'Chevrolet', 'name', '75323'),
(54, 'Mercury', 'com', '19559'),
(55, 'Pontiac', 'biz', '4456'),
(56, 'Lexus', 'edu', '42993'),
(57, 'Dodge', 'mil', '50343'),
(58, 'Scion', 'name', '92538'),
(59, 'BMW', 'gov', '42380'),
(60, 'Infiniti', 'gov', '39488'),
(61, 'Porsche', 'gov', '46142'),
(62, 'BMW', 'gov', '96023'),
(63, 'Mazda', 'gov', '33113'),
(64, 'Chevrolet', 'org', '11513'),
(65, 'Mercury', 'name', '68328'),
(66, 'Mazda', 'org', '69489'),
(67, 'Buick', 'edu', '53249'),
(68, 'Chevrolet', 'name', '79583'),
(69, 'Volkswagen', 'net', '53242'),
(70, 'Math', 'CSE', '16542'),
(71, 'xyz', 'cse102', 'cse'),
(72, 'cname', 'degree', 'cpin'),
(73, 'cname', 'degree', 'cpin');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `gid` int(250) NOT NULL,
  `gname` varchar(250) NOT NULL,
  `g_pinid` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`gid`, `gname`, `g_pinid`) VALUES
(2, 'Lincoln National ', '56985'),
(4, 'Strayer Education, Inc.', '#46453d'),
(5, 'SunTrust Banks, Inc.', '#8bcc6a'),
(6, 'FlexShares STOXX US ESG Impact Index Fund', '#ff5b74'),
(7, 'Cross Timbers Royalty Trust', '#a00c62'),
(8, 'ArcelorMittal', '#e18777'),
(9, 'Torchmark Corporation', '#98cba5'),
(10, 'Rayonier Inc.', '#28dfa0'),
(11, 'ALPS/Dorsey Wright Sector Momentum ETF', '#277dbc'),
(12, 'ESCO Technologies Inc.', '#38b1ff'),
(13, 'Acadia Realty Trust', '#79a205'),
(14, 'Nuveen AMT-Free Municipal Value Fund', '#78a040'),
(15, 'NanoString Technologies, Inc.', '#891405'),
(16, 'USD Partners LP', '#48b9e4'),
(17, 'Handy & Harman Ltd.', '#789469'),
(18, 'Intellipharmaceutics International Inc.', '#9cf4ab'),
(19, 'Kelly Services, Inc.', '#bf1bbd'),
(20, 'Continental Building Products, Inc.', '#8297cf'),
(21, 'Credicorp Ltd.', '#c8684b'),
(22, 'Allegiant Travel Company', '#4a52fe'),
(23, 'NextEra Energy, Inc.', '#18689c'),
(24, 'Weingarten Realty Investors', '#31827d'),
(25, 'Royal Bank Of Canada', '#deb06d'),
(26, 'Town Sports International Holdings, Inc.', '#28a02b'),
(27, 'First Trust RiverFront Dynamic Europe ETF', '#d9d99f'),
(28, 'Ashford Hospitality Prime, Inc.', '#76a14d'),
(29, 'BiondVax Pharmaceuticals Ltd.', '#4652f2'),
(30, 'Pimco Global Stocksplus & Income Fund', '#9b2b5e'),
(31, 'iShares S&P Emerging Markets Infrastructure Index Fund', '#48e094'),
(32, 'J.C. Penney Company, Inc. Holding Company', '#27778a'),
(33, 'Wolverine World Wide, Inc.', '#ca0600'),
(34, 'Pacific Mercantile Bancorp', '#b87c52'),
(35, 'ServiceNow, Inc.', '#00fc93'),
(36, 'The Charles Schwab Corporation', '#93f9f2'),
(37, 'Canadian National Railway Company', '#8622fb'),
(38, 'ManpowerGroup', '#b90122'),
(39, 'Adamis Pharmaceuticals Corporation', '#6cc922'),
(40, 'Dynagas LNG Partners LP', '#780d9d'),
(41, 'Frontier Communications Corporation', '#328a20'),
(42, 'Gabelli Equity Trust, Inc. (The)', '#e73816'),
(43, 'Riverview Bancorp Inc', '#fd1653'),
(44, 'Jupai Holdings Limited', '#5247df'),
(45, 'American Vanguard Corporation', '#07327e'),
(46, 'Loews Corporation', '#50c19e'),
(47, 'First Citizens BancShares, Inc.', '#af79ff'),
(48, 'Comtech Telecommunications Corp.', '#bff026'),
(49, 'Westlake Chemical Partners LP', '#4ffc06'),
(50, 'Donaldson Company, Inc.', '#619742'),
(51, 'Boston Omaha Corporation', '#11b09b'),
(52, 'Lincoln Educational Services Corporation', '#2325bb'),
(53, 'EastGroup Properties, Inc.', '#9f9057'),
(54, 'Floor & Decor Holdings, Inc.', '#700c87'),
(55, 'USA Truck, Inc.', '#1de1b9'),
(56, 'Sun Communities, Inc.', '#040b78'),
(57, 'Leaf Group Ltd.', '#89ce65'),
(58, 'Monster Beverage Corporation', '#1b8398'),
(59, 'Landmark Infrastructure Partners LP', '#da7da5'),
(60, 'Blackrock MuniHoldings Fund, Inc.', '#d184f0'),
(61, 'EQT Midstream Partners, LP', '#580e97'),
(62, 'iPath US Treasury 2-year Bear ETN', '#839033'),
(63, 'Dillard\'s, Inc.', '#783436'),
(64, 'Gabelli Convertible and Income Securities Fund, Inc. (The)', '#dbad7e'),
(65, 'Public Storage', '#615b6f'),
(66, 'ServiceNow, Inc.', '#c701e3'),
(67, 'Worthington Industries, Inc.', '#f9280c'),
(68, 'Duff & Phelps Select Energy MLP Fund Inc.', '#422132'),
(69, 'TransMontaigne Partners L.P.', '#562e70'),
(70, 'Argos Therapeutics, Inc.', '#dba292'),
(71, 'HC2 Holdings, Inc.', '#9292f1'),
(72, 'OneMain Holdings, Inc.', '#fda20d'),
(73, 'Data I/O Corporation', '#7af95f'),
(74, 'Marinus Pharmaceuticals, Inc.', '#eb8234'),
(75, 'Atrion Corporation', '#3f81be'),
(76, 'The Hackett Group, Inc.', '#26bb5f'),
(77, 'Xencor, Inc.', '#81bd66'),
(78, 'KLX Inc.', '#ecc01b'),
(79, 'Barclays PLC', '#5cd801'),
(80, 'Mettler-Toledo International, Inc.', '#b507fb'),
(81, 'MS Structured Asset Corp Saturns GE Cap Corp Series 2002-14', '#1be6ac'),
(82, 'walton', '15246'),
(83, '', ''),
(84, '', ''),
(85, 'biology', 'bio1354');

-- --------------------------------------------------------

--
-- Table structure for table `internship`
--

CREATE TABLE `internship` (
  `intern_id` int(255) NOT NULL,
  `intern_title` text NOT NULL,
  `discription` text NOT NULL,
  `type` text NOT NULL,
  `intern_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internship`
--

INSERT INTO `internship` (`intern_id`, `intern_title`, `discription`, `type`, `intern_date`) VALUES
(1, '3 month internship', 'details', 'Free', '2019-10-18'),
(2, 'kkkkkkkkkkk', 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'Free', '2019-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(255) NOT NULL,
  `p_title` text NOT NULL,
  `p_body` tinytext NOT NULL,
  `c_date` datetime NOT NULL,
  `status` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `p_title`, `p_body`, `c_date`, `status`) VALUES
(1, 'First Post changed', 'First post body changed', '2019-10-10 01:17:09', 1),
(3, 'xxxxx', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '2019-10-16 00:05:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchage`
--

CREATE TABLE `purchage` (
  `pid` int(250) NOT NULL,
  `pname` varchar(250) NOT NULL,
  `pdate` date NOT NULL,
  `trans_id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchage`
--

INSERT INTO `purchage` (`pid`, `pname`, `pdate`, `trans_id`) VALUES
(52, 'Amdad', '2019-10-02', '12345 '),
(54, 'pname', '2019-05-08', '1659874');

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `scholar_id` int(255) NOT NULL,
  `title` text NOT NULL,
  `discription` text NOT NULL,
  `cdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scholarships`
--

INSERT INTO `scholarships` (`scholar_id`, `title`, `discription`, `cdate`) VALUES
(1, 'title', 'body', '2019-10-17'),
(2, '12345', '123456789', '2019-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sid` int(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `s_name` varchar(250) NOT NULL,
  `alias` varchar(250) NOT NULL,
  `gender` text NOT NULL,
  `edu_start` varchar(255) NOT NULL,
  `duration` varchar(250) NOT NULL,
  `interest` varchar(250) NOT NULL,
  `University_id` int(255) NOT NULL,
  `course_id` int(255) NOT NULL,
  `group_id` int(255) NOT NULL,
  `purchage_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sid`, `username`, `password`, `s_name`, `alias`, `gender`, `edu_start`, `duration`, `interest`, `University_id`, `course_id`, `group_id`, `purchage_id`) VALUES
(156, '', '', 'Amdadul hoque', 'Amdad', 'male', 'Winter 2018/2019', '3', 'CSE', 0, 0, 0, 0),
(157, 'ratul', '54321', 'ratul hossain', 'ratul', 'male', 'edu_start', 'duration', 'biology,math', 43, 71, 85, 54);

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `uid` int(250) NOT NULL,
  `u_name` varchar(250) NOT NULL,
  `u_location` varchar(250) NOT NULL,
  `u_country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`uid`, `u_name`, `u_location`, `u_country`) VALUES
(1, 'Bangladesh University of business and technology', 'Dhaka', 'BD'),
(3, 'Universidade Gregorio Semedo', 'AO', 'Angola'),
(5, 'Universitas Nasional Jakarta', 'ID', 'Indonesia'),
(6, 'Universitas Sriwijaya', 'ID', 'Indonesia'),
(7, 'Ho Chi Minh City University of Agriculture and Forestry', 'VN', 'Vietnam'),
(33, 'u_name', 'u_location', 'u_country'),
(34, 'u_name', 'u_location', 'u_country'),
(35, 'pubt', 'mirpur', 'bd'),
(36, 'pubt', 'mirpur', 'bd'),
(37, 'pubt', 'mirpur', 'bd'),
(38, 'pubt', 'mirpur', 'bd'),
(39, 'pubt', 'mirpur', 'bd'),
(40, '', '', ''),
(41, '', '', ''),
(42, '', '', ''),
(43, 'IUB', 'Dhaka', 'bd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `internship`
--
ALTER TABLE `internship`
  ADD PRIMARY KEY (`intern_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `purchage`
--
ALTER TABLE `purchage`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`scholar_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `cid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `gid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `internship`
--
ALTER TABLE `internship`
  MODIFY `intern_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchage`
--
ALTER TABLE `purchage`
  MODIFY `pid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `scholar_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `uid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
