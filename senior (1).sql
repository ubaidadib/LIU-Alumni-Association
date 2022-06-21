-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2019 at 10:31 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `senior`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `alumni_users`
--

CREATE TABLE `alumni_users` (
  `alumni_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cv_file` varchar(55) NOT NULL,
  `graduation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni_users`
--

INSERT INTO `alumni_users` (`alumni_id`, `user_id`, `cv_file`, `graduation_date`) VALUES
(2, 2, '2_liu grading scale.pdf', '2019-06-26'),
(3, 5, '5_cse_ict_recommendation_form_2018.pdf', '2019-06-26'),
(4, 7, 'null', '2019-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `categories_relation`
--

CREATE TABLE `categories_relation` (
  `post_id` int(11) NOT NULL,
  `degree_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories_relation`
--

INSERT INTO `categories_relation` (`post_id`, `degree_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ceo_users`
--

CREATE TABLE `ceo_users` (
  `ceo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` varchar(55) NOT NULL,
  `date` datetime NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `content`, `date`, `type`) VALUES
(1, 6, 3, 'nice', '2019-06-17 11:05:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(55) NOT NULL,
  `company_address` text NOT NULL,
  `company_phonenumber` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company_name`, `company_address`, `company_phonenumber`) VALUES
(1, 'Akkar media', 'Saray Street Al rajab building ground floor Halba, halba , akkar', '06 694 737'),
(3, 'Ammar electronics & J-telecom', 'Tripoli, Lebanon', '06 435 035'),
(4, 'G8T Solutions Sarl', 'Ibrahim Chahine center, Main road Chekka (Batroun)Lebanon', '06 543364'),
(5, 'Neumann Sal', 'Neumann building, Shaghoura road, Cedars area Bcharreh (Bcharreh)Lebanon', '06 678150'),
(6, 'Tragging Sarl', '2nd floor, Saaidi Towers, Maarad street Tripoli (Tripoli) P.O.Box 113Lebanon', '06 424299'),
(7, 'DevAppLB Workshops', 'Ruwwad Al Tanmiya Center - Tripoli - Bab El Tebbeneh', ''),
(8, 'INTELEC', 'Tripoli bvd, Tripoli, Lebanon', '06-438478'),
(9, 'NASACO', 'Kiyal st, Tripoli, Lebanon', '06-444032'),
(10, 'Adra Com', 'Maarad st, Tripoli, Lebanon', '03-727710'),
(11, 'Mobinets Sal (Offshore)', 'Floor: 1, La Cite Center, Al Maarad Street, TRIPOLI, Tripoli, LEBANON', '06 - 625353'),
(12, 'robotics', 'Ground floor, Merhbi building, General Fouad Chehab boulevard Tripoli (Tripoli) Lebanon', '06-410806'),
(13, 'Francis Telecom', 'near armenian orphans - Jbeil, Lebanon', '09-546392'),
(14, 'Axecom', 'lebanon-jbeil-near Byblos Bank', '09-945300'),
(15, 'Sakr electronics', 'Jbeil Main Street, Blc Bank Bldg, Jbeil', '03-865840'),
(16, 'Bravenet', 'lebanon- jebil - near moulin dor', '71-219219'),
(17, 'CLIC-Lebanon', 'JBeil , Kassouba street 328', '09-944 441'),
(18, 'COMPUVISION', 'Kafarabida, Sea Road, Batroun. Lebanon', '03- 646577'),
(19, 'GC Group Sarl', 'Ground floor, Mitri building,Main road Kfarakka (Koura)Lebanon', '06-952282'),
(20, 'CODMUS', '479 Building, 4th Floor, Byblos', '81-377309'),
(21, 'code&dot', 'Rayan Center, El Mina Gardens, Tripoli, Lebanon', '+961 3 52 52 74'),
(22, 'smartsecurity', 'Boulvard - facing Seddik Mousque - Masoud Center (0.26 mi) Tripoli, Lebanon', '+961 6 432 620'),
(23, 'Softwave Company', '1st floor, Mouemen center, Madaress street Tripoli (Tripoli)  Lebanon', '+961 6 445567'),
(24, 'Net Watch', 'Ground floor, Ouzi building, Miatein street Tripoli (Tripoli) Lebanon', '+961 6 426539'),
(25, 'Options Mega Store', 'Ground floor, Bakri building, Mina road Tripoli (Tripoli) Lebanon', '+961 6 201308'),
(26, 'Arabic Co. for Industry & Commerce', '3rd floor, Helweh building, Azmi street Tripoli (Tripoli) P.O.Box 654 Lebanon', '+961 6 430871'),
(27, 'Solve plus', 'Tripoli maarad street, Tripoli', '76 008 419');

-- --------------------------------------------------------

--
-- Table structure for table `company_spec_relation`
--

CREATE TABLE `company_spec_relation` (
  `company_id` int(11) NOT NULL,
  `spec_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_spec_relation`
--

INSERT INTO `company_spec_relation` (`company_id`, `spec_id`) VALUES
(1, 1),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25);

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `degree_id` int(11) NOT NULL,
  `degree_abbreviation` varchar(55) NOT NULL,
  `degree_title` varchar(100) NOT NULL,
  `credits_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`degree_id`, `degree_abbreviation`, `degree_title`, `credits_number`) VALUES
(1, 'C.E.N.G', 'Computer Engineering ', 108),
(2, 'C.S.C.I', 'Computer Science ', 99),
(3, 'E.E.N.G', 'Electrical Engineering ', 108),
(4, 'M.E.N.G', 'Mechanical Engineering ', 108),
(5, 'T.E.N.G', 'Communication Engineering ', 108),
(6, 'M.C.S.C.I', 'Masters of Science in Computer Science', 36),
(7, 'M.B.E.N.G', 'Masters of Science in Electronic Engineering / Emphasis On Biomedical\r\n', 52),
(8, 'M.C.C.E', 'Masters of Science in Computer and Communication Engineering ', 52),
(9, 'M.E.E.N.G', 'Masters of Science In Electrical Engineering', 52),
(10, 'M.L.E.N.G', 'Masters of Science in Electronics Engineering', 52),
(11, 'M.M.E.N.G', 'Masters of Science in Mechanical Engineering', 52);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `status`) VALUES
(1, 5, 1, 0),
(2, 6, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `content` tinytext NOT NULL,
  `status` tinyint(1) NOT NULL,
  `type` varchar(55) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sender_id`, `receiver_id`, `content`, `status`, `type`, `date`) VALUES
(2, 1, 2, 'Admin ', 0, 'new', '2019-06-16 06:51:00'),
(3, 6, 5, 'hello', 1, 'reply', '2019-06-17 11:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_title` varchar(55) NOT NULL,
  `post_content` text NOT NULL,
  `post_status` tinyint(1) NOT NULL,
  `post_date` datetime NOT NULL,
  `image_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_title`, `post_content`, `post_status`, `post_date`, `image_path`) VALUES
(1, 2, 'Just Try', 'nothing', 0, '2019-06-17 10:51:18', '2_call.jpg'),
(2, 1, 'Hello', 'He;llo', 1, '2019-06-17 11:03:24', ''),
(3, 6, 'Hello', 'Mashi', 0, '2019-06-17 11:05:02', 'bonza.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `spec_id` int(11) NOT NULL,
  `spec_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`spec_id`, `spec_name`) VALUES
(1, 'full stack web and mobile applications\r\ndjango framework for web development          \r\nword press and php'),
(2, 'creating , designing and developping websites\r\n'),
(3, 'Software, coding and programming , Software, internet and intranet , Software, internet and intranet'),
(4, 'Software, systems\r\nSoftware, coding and programming\r\nSoftware, database and information management\r\nSoftware, internet and intranet\r\nSoftware, typesetting, editing and desktop publishing (DTP) design'),
(5, 'Software, systems\r\nSoftware, computer security\r\nSoftware, coding and programming\r\nSoftware, industrial\r\nSoftware, utilities\r\nWholesale trade'),
(6, 'authoring tools \r\ninterface design \r\nprograming using Objective C (for the iOS workshop) \r\nprogramming using Java (for the Android workshop) \r\nprogramming using Javascript (for the HTML5 workshop) \r\nBackend-as-a-service overview \r\nTouch Cloud functionalities \r\nTouch Cloud billing'),
(7, 'GSM site maintenance.\r\nGSM site implementation including SWAP ,(Survey, Civil, & Radio).\r\nFiber Optic Marconi (Ericsson STM4), Implementation, testing and commissioning.\r\nTransmission System implementation, testing & commissioning.\r\nMSC-BSC implementation & dismantling.\r\n2G & 3G Drive test teams.\r\nDesign and production of electrical distribution and Automatic Transfer Switch panels for GSM sites.'),
(8, 'web site design and publish , undertake supply and installation of SMATV systems, PABX , Fire Alarm , CCTV , Access control , UPS,Wireless systems (HF , VHF ,UHF , Microwave )\r\nmanufacturing various electronics products and as per customer specifications'),
(9, 'programming softwares'),
(10, 'network mobile \r\n'),
(11, 'Personal computers (PC)\r\nInput peripherals\r\nOptical disc drives (ODD)\r\nPrinters (computing)\r\nDocument scanners\r\nComputer accessories\r\nComputer cable assemblies'),
(12, 'Telecommunications Trouble Shooting\r\nTelephone Extensions\r\nSky Multi Room telephone point Installation\r\nBroadband Fault Diagnostic and Reporting\r\nTelephone Fault Finding and Testing\r\nCable Jointing\r\nTelephone Installations\r\nBroadband Networking Installations'),
(13, 'nbn plans\r\nphone and nbn bundles\r\nphone and ADSL bundles'),
(14, 'Sale and repair phones accessories and all kind of phones.'),
(15, 'ADSL , Wirless , JMN Services , Procom'),
(16, 'Mobile App Development\r\nWeb Development\r\nGame development\r\nUX/UI design'),
(17, 'Automation\r\nIP telephony\r\nIT Consultancy\r\nMobile App Development\r\nSoftware Development\r\nWeb Development'),
(18, 'Personal computers (PC)\r\nMonitors/display screens\r\nInput peripherals\r\nData storage devices for computing\r\nOptical disc drives (ODD)\r\nPrinters (computing)\r\nDocument scanners\r\nComputer accessories\r\nComputer cable assemblies\r\nComputer network equipment\r\nSoftware, industrial\r\nSoftware, utilities\r\nWholesale trade\r\n'),
(19, 'Web deleopment and  design\r\nsecurity\r\nmobile app development\r\nBranding and Creative Design'),
(20, 'Web development , SEM  ,Mobile apps , Chatbot services , internet services'),
(21, ' wireless solution , parking managment system , security systems and surveillance , access control and time attendance'),
(22, 'Information technology (IT) auditing and consulting services\r\nInformation technology (IT) engineering '),
(23, 'Personal computers (PC)\r\nMonitors/display screens\r\nInput peripherals\r\nPrinters (computing) \r\nComputer accessories\r\nComputer network equipment\r\nSoftware, utilities\r\nWholesale trade\r\nSecond-hand equipment'),
(24, 'Computer network equipment ,   Software, utilities ,  Personal computers (PC)\r\n'),
(25, 'Email Builder : \r\nCustom Email\r\nsend custom email containing custom timetable manual adjustment add custom logo\r\nchange colors or use predefined\r\nDistribution By Email\r\nsend custom email containing custom timetable manual adjacment  add custom logo\r\nchange colors or use predefined');

-- --------------------------------------------------------

--
-- Table structure for table `studies`
--

CREATE TABLE `studies` (
  `degree_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studies`
--

INSERT INTO `studies` (`degree_id`, `user_id`) VALUES
(1, 2),
(1, 5),
(1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `success_stories`
--

CREATE TABLE `success_stories` (
  `story_id` int(11) NOT NULL,
  `story_title` varchar(55) NOT NULL,
  `story_content` text NOT NULL,
  `image_path` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `success_stories`
--

INSERT INTO `success_stories` (`story_id`, `story_title`, `story_content`, `image_path`) VALUES
(2, 'Success', 'having a great job', 'img.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `fname` varchar(55) NOT NULL,
  `lname` varchar(55) NOT NULL,
  `gender` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `uni_email` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `birthdate` varchar(55) NOT NULL,
  `phone_number` varchar(55) NOT NULL,
  `user_profile` varchar(55) NOT NULL,
  `description` tinytext NOT NULL,
  `address` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_role_id`, `fname`, `lname`, `gender`, `email`, `uni_email`, `username`, `password`, `birthdate`, `phone_number`, `user_profile`, `description`, `address`) VALUES
(1, 3, 'ubaida', 'dib', 'male', 'obaidadeeb76@gmail.com', 'null', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'null', '76-574780', '1_profile.jpg', 'null', 'Naher El Bared Camp'),
(2, 3, 'mahmoud', 'alsayyed', '', 'mahmoud@gmail.com', 'null', 'mahmoud12', 'a45958517604f5cd90d6ee51ad9cfdb6', '', '71-253696', '2_profile.jpg', 'Programming \r\n', 'naher al bared'),
(5, 2, 'imad', 'ourabi', 'male', 'null', 'null', 'imad12', 'a45958517604f5cd90d6ee51ad9cfdb6', 'null', '03-987456', '', 'null', ''),
(6, 1, 'z', 'm', 'male', 'null', 'null', 'zm', '81dc9bdb52d04dc20036dbd8313ed055', 'null', '123456789', '', 'gggg', 'null'),
(7, 2, 'HH', 'LL', 'male', 'null', 'null', 'im', '81dc9bdb52d04dc20036dbd8313ed055', 'null', '', '', 'null', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `user_role_id` int(11) NOT NULL,
  `role` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role_id`, `role`) VALUES
(1, 'user'),
(2, 'alumni'),
(3, 'admin'),
(4, 'ceo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_fk0` (`user_id`);

--
-- Indexes for table `alumni_users`
--
ALTER TABLE `alumni_users`
  ADD PRIMARY KEY (`alumni_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories_relation`
--
ALTER TABLE `categories_relation`
  ADD KEY `post_id` (`post_id`),
  ADD KEY `degree_id` (`degree_id`);

--
-- Indexes for table `ceo_users`
--
ALTER TABLE `ceo_users`
  ADD PRIMARY KEY (`ceo_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_fk0` (`user_id`),
  ADD KEY `comments_fk1` (`post_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `company_spec_relation`
--
ALTER TABLE `company_spec_relation`
  ADD KEY `company_id` (`company_id`),
  ADD KEY `spec_id` (`spec_id`);

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`degree_id`),
  ADD KEY `degree_level_fk0` (`degree_abbreviation`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `messages_fk0` (`sender_id`),
  ADD KEY `messages_fk1` (`receiver_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `publisher_id` (`user_id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`spec_id`);

--
-- Indexes for table `studies`
--
ALTER TABLE `studies`
  ADD KEY `degree_id` (`degree_id`),
  ADD KEY `studies_ibfk_2` (`user_id`);

--
-- Indexes for table `success_stories`
--
ALTER TABLE `success_stories`
  ADD PRIMARY KEY (`story_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_role_id` (`user_role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD KEY `user_role_fk0` (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alumni_users`
--
ALTER TABLE `alumni_users`
  MODIFY `alumni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ceo_users`
--
ALTER TABLE `ceo_users`
  MODIFY `ceo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `degree`
--
ALTER TABLE `degree`
  MODIFY `degree_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `spec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `success_stories`
--
ALTER TABLE `success_stories`
  MODIFY `story_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `alumni_users`
--
ALTER TABLE `alumni_users`
  ADD CONSTRAINT `alumni_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories_relation`
--
ALTER TABLE `categories_relation`
  ADD CONSTRAINT `categories_relation_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categories_relation_ibfk_2` FOREIGN KEY (`degree_id`) REFERENCES `degree` (`degree_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ceo_users`
--
ALTER TABLE `ceo_users`
  ADD CONSTRAINT `ceo_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ceo_users_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_fk1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `company_spec_relation`
--
ALTER TABLE `company_spec_relation`
  ADD CONSTRAINT `company_spec_relation_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_spec_relation_ibfk_2` FOREIGN KEY (`spec_id`) REFERENCES `specialization` (`spec_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_fk0` FOREIGN KEY (`sender_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_fk1` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studies`
--
ALTER TABLE `studies`
  ADD CONSTRAINT `studies_ibfk_1` FOREIGN KEY (`degree_id`) REFERENCES `degree` (`degree_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studies_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`user_role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
