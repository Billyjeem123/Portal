-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 02:38 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iqrah_schools`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `tittle` varchar(200) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `photo`, `tittle`, `details`) VALUES
(1, '2.jpg', '', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam molestias repellat at distinctio. Ea cum odit culpa quod, magni unde porro aut, eos, id provident iste a voluptatem quaerat sit accusamus praesentium? Quis, cupiditate quisquam quod vitae earum cum suscipit debitis numquam est adipisci delectus impedit, voluptatum dolore nam neque. Necessitatibus quam mollitia culpa similique omnis soluta sed aut exercitationem. Veniam dolor exercitationem accusantium placeat ratione molestias ab eum saepe, nisi fugit tempora iusto impedit vero nihil natus voluptates eius amet accusamus, id animi. Dicta hic quis harum, qui dolor accusamus fugiat provident voluptate quod. Reiciendis fugiat rem tempore pariatur velit reprehenderit, itaque odio maxime aspernatur unde veniam necessitatibus. Nam sed, sequi ipsum blanditiis commodi debitis officiis velit adipisci in, similique porro nostrum. Atque, cumque aut nisi eius magnam maxime, voluptas fugit saepe, maiores dolore pariatur asperiores culpa! Est aperiam harum autem velit ratione soluta blanditiis minima atque molestiae sunt. Facilis quisquam reiciendis perspiciatis. Id voluptas qui ad illo recusandae, laboriosam quasi. Fugiat rerum quis impedit facere necessitatibus id placeat suscipit, quia atque temporibus dolore corporis asperiores, doloribus tempore vero nemo iusto consequuntur vitae aliquid autem? Sunt nihil ratione rerum minus, molestiae, distinctio tempora eos delectus ipsa quod officiis nobis excepturi soluta ad harum temporibus! Dolorem accusamus magnam consequatur facilis nulla iste iure, obcaecati optio, sequi facere autem cum mollitia asperiores quia pariatur quos debitis aliquam dolores animi magni. Iure perspiciatis explicabo dolore, doloribus est sint suscipit. Accusamus vitae velit consequatur deleniti reiciendis earum maiores? Officia incidunt quos pariatur nihil?</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `anthem` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exam_srms`
--

CREATE TABLE `exam_srms` (
  `exam_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `exam_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `exam_result_date` date NOT NULL,
  `exam_result_published` enum('No','Yes') COLLATE utf8_unicode_ci NOT NULL,
  `exam_status` enum('Enable','Disabled') COLLATE utf8_unicode_ci NOT NULL,
  `exam_added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam_srms`
--

INSERT INTO `exam_srms` (`exam_id`, `class_id`, `exam_name`, `exam_result_date`, `exam_result_published`, `exam_status`, `exam_added_on`) VALUES
(1, 0, '1st term exam', '0000-00-00', 'No', 'Enable', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `exam_test`
--

CREATE TABLE `exam_test` (
  `result_id` int(11) NOT NULL,
  `StudentId` int(111) NOT NULL,
  `ClassId` int(111) NOT NULL,
  `exam_Id` int(111) NOT NULL,
  `session_ids` int(111) NOT NULL,
  `term_ids` int(111) NOT NULL,
  `head_master` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_test`
--

INSERT INTO `exam_test` (`result_id`, `StudentId`, `ClassId`, `exam_Id`, `session_ids`, `term_ids`, `head_master`) VALUES
(15, 39, 1, 1, 5, 1, 'c ');

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

CREATE TABLE `programme` (
  `id` int(11) NOT NULL,
  `photo` varchar(20) NOT NULL,
  `short_desc` varchar(50) NOT NULL,
  `programmes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`id`, `photo`, `short_desc`, `programmes`) VALUES
(1, '', '<p><strong>Primary</strong></p>\r\n', ''),
(2, '', '<p><strong>Secondary</strong></p>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `mark_id` int(11) NOT NULL,
  `result_id` int(111) NOT NULL,
  `subject_id` int(111) NOT NULL,
  `exam_marks` varchar(111) NOT NULL,
  `test_marks` varchar(111) NOT NULL,
  `comment` varchar(111) DEFAULT '0',
  `ca_test` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`mark_id`, `result_id`, `subject_id`, `exam_marks`, `test_marks`, `comment`, `ca_test`) VALUES
(1, 1, 1, '67', '9', '0', '9'),
(2, 1, 3, '9', '9', '0', '9'),
(3, 1, 2, '9', '9', '0', '9'),
(4, 2, 1, '25', '8', '0', '8'),
(5, 2, 3, '65', '8', '0', '8'),
(6, 2, 2, '45', '8', '0', '8'),
(7, 3, 1, '56', '20', '0', '10'),
(8, 4, 1, '50', '20', '0', '18'),
(9, 5, 1, '50', '25', '0', '25'),
(10, 5, 3, '47', '20', '0', '14'),
(11, 6, 1, '50', '15', '0', '15'),
(12, 6, 3, '45', '16', '0', '14'),
(13, 7, 1, '45', '16', '0', '16'),
(14, 7, 3, '20', '17', '0', '5'),
(15, 8, 1, '7', '7', '0', '7'),
(16, 8, 1, '7', '7', '0', '7'),
(17, 8, 3, '7', '7', '0', '7'),
(18, 9, 1, '7', '7', '0', '7'),
(19, 9, 1, '7', '7', '0', '7'),
(20, 9, 3, '7', '7', '0', '7'),
(21, 10, 1, '4', '4', '0', '4'),
(22, 10, 1, '4', '4', '0', '4'),
(23, 10, 3, '4', '4', '0', '4'),
(24, 11, 1, '66', '14', '0', '15'),
(25, 11, 1, '23', '6', '0', '6'),
(26, 11, 3, '44', '7', '0', '13'),
(27, 12, 1, '36', '14', '0', '17'),
(28, 12, 1, '22', '14', '0', '16'),
(29, 12, 3, '49', '`7', '0', '25'),
(30, 13, 1, '33', '15', '0', '14'),
(31, 13, 1, '66', '25', '0', '13'),
(32, 13, 3, '88', '7', '0', '7'),
(33, 14, 1, '44', '13', '0', '16'),
(34, 14, 1, '22', '10', '0', '14'),
(35, 14, 3, '36', '11', '0', '13'),
(36, 15, 1, '62', '6', '0', '6'),
(37, 15, 3, '61', '6', '0', '6');

-- --------------------------------------------------------

--
-- Table structure for table `tblclasses`
--

CREATE TABLE `tblclasses` (
  `id` int(11) NOT NULL,
  `ClassName` varchar(80) DEFAULT NULL,
  `Section` int(11) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclasses`
--

INSERT INTO `tblclasses` (`id`, `ClassName`, `Section`, `CreationDate`) VALUES
(1, 'Primary 1', 0, '2021-12-07 03:12:00'),
(2, 'Primary 2', 0, '2021-12-07 03:12:16'),
(3, 'Primary 3', 0, '2021-12-07 03:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `tblevent`
--

CREATE TABLE `tblevent` (
  `id` int(11) NOT NULL,
  `photo` varchar(400) NOT NULL,
  `date` varchar(11) NOT NULL,
  `details` text NOT NULL,
  `tittle` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblevent`
--

INSERT INTO `tblevent` (`id`, `photo`, `date`, `details`, `tittle`) VALUES
(5, 'Screenshot (1).png,Screenshot (2).png,Screenshot (3).png,Screenshot (4).png', '2021-12-15', '<p>A day in the life of a programmerA day in the life of a programmerA day in the life of a programmerA day in the life of a programmerA day in the life of a programmerA day in the life of a programmerA day in the life of a programmerA day in the life of a programmerA day in the life of a programmerA day in the life of a programmerA day in the life of a programmerA day in the life of a programmerA day in the life of a programmerA day in the life of a programmerA day in the life of a programmerA day in the life of a programmer</p>\r\n', 'A day in the life of a programmer'),
(6, 'Screenshot (26).png,Screenshot (27).png,Screenshot (28).png,Screenshot (30).png,Screenshot (31).png,Screenshot (32).png', '2021-12-08', '<p>God Bless NigeriaGod Bless NigeriaGod Bless NigeriaGod Bless NigeriaGod Bless NigeriaGod Bless NigeriaGod Bless NigeriaGod Bless NigeriaGod Bless NigeriaGod Bless NigeriaGod Bless NigeriaGod Bless NigeriaGod Bless NigeriaGod Bless Nigeria</p>\r\n', 'God Bless Nigeria');

-- --------------------------------------------------------

--
-- Table structure for table `tbllog`
--

CREATE TABLE `tbllog` (
  `id` int(11) NOT NULL,
  `transaction` text NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbllog`
--

INSERT INTO `tbllog` (`id`, `transaction`, `teacher_id`, `date_added`) VALUES
(27, 'umar added a New Student', 19, '2021-12-22 16:18:58'),
(28, 'umar added a New Student', 19, '2021-12-22 16:30:36'),
(29, 'umar added New Result ', 19, '2021-12-22 16:31:13'),
(30, 'umar added New Result ', 19, '2021-12-24 02:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `tblsession`
--

CREATE TABLE `tblsession` (
  `id` int(50) NOT NULL,
  `session` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsession`
--

INSERT INTO `tblsession` (`id`, `session`) VALUES
(5, '2021-2028');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `StudentId` int(11) NOT NULL,
  `StudentName` varchar(100) DEFAULT NULL,
  `RollId` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `DOB` varchar(100) DEFAULT NULL,
  `ClassId` int(20) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `Status` int(1) DEFAULT NULL,
  `session_ids` int(20) NOT NULL,
  `term_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`StudentId`, `StudentName`, `RollId`, `image`, `Gender`, `DOB`, `ClassId`, `RegDate`, `Status`, `session_ids`, `term_id`) VALUES
(38, 'hammad', '14455', '', 'Male', '2021-12-16', 3, '2021-12-22 16:30:36', 1, 5, 1),
(39, 'Umar faruq', '555', '', 'Male', '0022-05-02', 1, '2021-12-24 02:58:05', 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjectcombination`
--

CREATE TABLE `tblsubjectcombination` (
  `id` int(11) NOT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `Updationdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjectcombination`
--

INSERT INTO `tblsubjectcombination` (`id`, `ClassId`, `SubjectId`, `status`, `CreationDate`, `Updationdate`) VALUES
(1, 1, 1, 0, '2021-12-07 03:13:35', '2021-12-10 08:40:06'),
(3, 1, 3, 1, '2021-12-07 03:13:46', '2021-12-10 08:35:31'),
(4, 2, 1, 1, '2021-12-09 18:12:19', '2021-12-10 08:41:16'),
(5, 2, 3, 1, '2021-12-14 05:00:52', NULL),
(6, 1, 4, 1, '2021-12-14 05:00:58', NULL),
(7, 2, 1, 1, '2021-12-21 22:38:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `SubjectCode` varchar(100) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `SubjectName`, `SubjectCode`, `Creationdate`, `UpdationDate`) VALUES
(1, 'English Lanaguage', '121', '2021-12-07 03:12:37', NULL),
(2, 'Mathematics', '200', '2021-12-07 03:12:49', NULL),
(3, 'Govt', '124', '2021-12-07 03:13:00', NULL),
(4, 'Physics', '121', '2021-12-07 03:13:10', NULL),
(5, 't', '6', '2021-12-10 07:39:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblteacher`
--

CREATE TABLE `tblteacher` (
  `teacher_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(33) NOT NULL,
  `gender` varchar(33) NOT NULL,
  `ClassId` int(23) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `role` varchar(11) NOT NULL,
  `image` varchar(222) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblteacher`
--

INSERT INTO `tblteacher` (`teacher_id`, `name`, `email`, `gender`, `ClassId`, `password`, `date`, `role`, `image`, `token`) VALUES
(5, 'admin', 'taofeeq@gmail.com', 'Male', 9, '$2y$12$vzyDboivdzijmPTF.DFq..Y6bX5phhkPs3Nj76k3ySCKujQFrOMxq', '2021-10-29', 'admin', '6_nasaspacescapes_0014_15 (2).jpg', '3ee1d248bc5f9ce0a5b202b451340c8f34b31321e8a3c25cf3e6ff64f26f2552112f9abad1bcc97a076935823f10205b351a'),
(16, 'Adams oshiomole', 'billyhadiattaofeeq@gmail.com', 'Male', 1, '$2y$12$Rwz8rcKSVm9C3s6u1jukIuJ6l7CV3uroNee8inj1PDccDAYGuOV.q', '2021-11-18', 'teacher', '5_13.jpg', 'e1492f3aff697f018bab62f4511d93cb9727f3e6465fa2e0793b239c218871a86403ee674c0a9210990668f85424e75813ac'),
(19, 'umar', 'umar@gmail.com', 'Female', 2, '$2y$12$6eSKcxL4VkUEZlEKFVRpPuvDco4sHLrIXTWqenR6GRjsraixcuQx2', '2021-12-29', 'teacher', '00007 (4).jpg', '6ae84da8c21fc81944e89e56decbfb9dabf313c155ffaf785c5a3b283441f679edf04800fe5a3305501ab58e1d6a648e32dc');

-- --------------------------------------------------------

--
-- Table structure for table `tblterm`
--

CREATE TABLE `tblterm` (
  `id` int(40) NOT NULL,
  `term` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblterm`
--

INSERT INTO `tblterm` (`id`, `term`) VALUES
(1, '1st term');

-- --------------------------------------------------------

--
-- Table structure for table `tbltest`
--

CREATE TABLE `tbltest` (
  `id` int(12) NOT NULL,
  `test` varchar(100) NOT NULL,
  `result_id` int(22) NOT NULL,
  `babab` int(88) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltest`
--

INSERT INTO `tbltest` (`id`, `test`, `result_id`, `babab`) VALUES
(1, '1st C.A test', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_srms`
--
ALTER TABLE `exam_srms`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `exam_test`
--
ALTER TABLE `exam_test`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`mark_id`);

--
-- Indexes for table `tblclasses`
--
ALTER TABLE `tblclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblevent`
--
ALTER TABLE `tblevent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbllog`
--
ALTER TABLE `tbllog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsession`
--
ALTER TABLE `tblsession`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`StudentId`);

--
-- Indexes for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblteacher`
--
ALTER TABLE `tblteacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `tblterm`
--
ALTER TABLE `tblterm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltest`
--
ALTER TABLE `tbltest`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_srms`
--
ALTER TABLE `exam_srms`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exam_test`
--
ALTER TABLE `exam_test`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `programme`
--
ALTER TABLE `programme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tblclasses`
--
ALTER TABLE `tblclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblevent`
--
ALTER TABLE `tblevent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbllog`
--
ALTER TABLE `tbllog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblsession`
--
ALTER TABLE `tblsession`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblteacher`
--
ALTER TABLE `tblteacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblterm`
--
ALTER TABLE `tblterm`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbltest`
--
ALTER TABLE `tbltest`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
