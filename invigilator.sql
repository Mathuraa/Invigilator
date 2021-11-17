-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 12:47 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invigilator`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers_9879`
--

CREATE TABLE `answers_9879` (
  `a_id` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `eid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `eid` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `duration` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`eid`, `sub_id`, `duration`) VALUES
(1, 1, 50),
(2, 1, 120);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `emotion` varchar(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `stud_id`, `exam_id`, `emotion`, `date_time`) VALUES
(7, 5, 1, 'neutral', '2021-05-15 08:16:39'),
(8, 5, 1, 'happy', '2021-05-15 08:18:33'),
(9, 5, 1, 'neutral', '2021-05-15 10:09:26'),
(10, 5, 1, 'neutral', '2021-05-15 12:47:08'),
(11, 5, 1, 'neutral', '2021-05-15 12:50:26'),
(12, 7, 1, 'happy', '2021-05-15 12:55:17'),
(13, 7, 1, 'neutral', '2021-05-16 05:24:00'),
(14, 7, 1, 'neutral', '2021-05-16 05:41:50'),
(15, 7, 1, 'neutral', '2021-05-16 06:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `sqa_exam`
--

CREATE TABLE `sqa_exam` (
  `qid` int(11) NOT NULL,
  `question` varchar(300) NOT NULL,
  `answers` varchar(100) NOT NULL,
  `eid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sqa_exam`
--

INSERT INTO `sqa_exam` (`qid`, `question`, `answers`, `eid`) VALUES
(1, 'What is the maximum possible length of an identifier?', '16,32,64,None of these above\r\n', 1),
(2, 'Who developed the Python language?', 'Zim Den,Guido van Rossum,Niene Stom,Wick van Ross\r\n', 1),
(3, 'In which year was the Python language developed?', '1995,1972,1981,1989\r\n', 1),
(4, 'In which language is Python written?', 'English,PHP,C,All of the above\r\n', 1),
(5, 'Which one of the following is the correct extension of the Python file?', '.py,.python,.p,None of these\r\n', 1),
(6, 'In which year was the Python 3.0 version developed?', '2008,2000,2010,2005\r\n', 1),
(7, 'What do we use to define a block of code in Python language?', 'Key,Brackets,Indentation,None of these\r\n', 1),
(8, 'Which character is used in Python to make a single line comment?', '/,//,#,!\r\n', NULL),
(9, 'Which of the following statements is correct regarding the object-oriented programming concept in Python?', 'Classes are real-world entities while objects are not real,Objects are real-world entities while cla', 1),
(10, 'Which of the following statements is correct in this python code?', 'Key,Brackets,Indentation,None of these\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `store_id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `file_type` varchar(20) NOT NULL,
  `date_uploaded` varchar(100) NOT NULL,
  `stud_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`store_id`, `filename`, `file_type`, `date_uploaded`, `stud_no`) VALUES
(2, 'db_sfms.sql', 'application/octet-st', '2021-02-14, 05:53 AM', 98765);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` int(11) NOT NULL,
  `stud_no` int(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `yr&sec` varchar(5) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `stud_no`, `firstname`, `lastname`, `gender`, `yr&sec`, `password`) VALUES
(2, 98765, 'saman', 'kumara', 'Male', '2B', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 67890, 'nuwan', 'perera', 'Male', '3B', '5e4726682340d3300f979bc3bb0f3b14'),
(4, 1111, 'Mathura', 'Thusyanthan', 'Female', '3B', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 18006926, 'mathura', 'thusy', 'Male', '2B', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 3333, 'Thuvaraga', 'thusy', 'Female', '3B', 'e10adc3949ba59abbe56e057f20f883e'),
(7, 18006927, 'mathura', 'fdf', 'Female', '2B', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(20) NOT NULL,
  `yr&sec` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`, `yr&sec`) VALUES
(1, 'SQA', '3B');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `username`, `password`, `status`) VALUES
(1, 'Administrator', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `violation`
--

CREATE TABLE `violation` (
  `vid` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `violated_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `count` int(11) DEFAULT NULL,
  `proh_item` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `violation`
--

INSERT INTO `violation` (`vid`, `exam_id`, `stud_id`, `violated_time`, `count`, `proh_item`) VALUES
(130, 1, 2, '2021-04-07 08:27:18', 1173, 'Book'),
(135, 1, 4, '2021-05-08 06:10:02', 8, 'Book'),
(136, 1, 5, '2021-05-15 12:50:06', 16, 'Mobile phone & Mobile phone'),
(137, 1, 7, '2021-05-16 06:00:26', 7, 'Mobile phone');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers_9879`
--
ALTER TABLE `answers_9879`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `eid` (`eid`),
  ADD KEY `qid` (`qid`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `sqa_exam`
--
ALTER TABLE `sqa_exam`
  ADD PRIMARY KEY (`qid`),
  ADD KEY `eid` (`eid`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `violation`
--
ALTER TABLE `violation`
  ADD PRIMARY KEY (`vid`),
  ADD KEY `exam_id` (`exam_id`),
  ADD KEY `stud_id` (`stud_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers_9879`
--
ALTER TABLE `answers_9879`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sqa_exam`
--
ALTER TABLE `sqa_exam`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `violation`
--
ALTER TABLE `violation`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers_9879`
--
ALTER TABLE `answers_9879`
  ADD CONSTRAINT `answers_9879_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `exam` (`eid`),
  ADD CONSTRAINT `answers_9879_ibfk_2` FOREIGN KEY (`qid`) REFERENCES `sqa_exam` (`qid`);

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`);

--
-- Constraints for table `sqa_exam`
--
ALTER TABLE `sqa_exam`
  ADD CONSTRAINT `sqa_exam_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `exam` (`eid`);

--
-- Constraints for table `violation`
--
ALTER TABLE `violation`
  ADD CONSTRAINT `violation_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`eid`),
  ADD CONSTRAINT `violation_ibfk_2` FOREIGN KEY (`stud_id`) REFERENCES `student` (`stud_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
