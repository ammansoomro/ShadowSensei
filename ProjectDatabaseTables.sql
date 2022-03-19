-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Mar 19, 2022 at 01:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `First` varchar(25) NOT NULL,
  `Last` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`First`, `Last`, `Email`, `Username`, `Password`) VALUES
('laura', 'Mcgregor', 'Test@nu.edu.pk', 'abcd123', '12345'),
('Abdullah', 'Ansari', 'k191042@nu.edu.pk', 'abdullahansari', 'admin123'),
('Amman', 'Soomro', 'k191048@nu.edu.pk', 'ammansoomro', 'admin123'),
('Mashood', 'Nadeem', 'mashood@gmail.com', 'mashood', 'mashood'),
('Naba', 'Jafri', 'k191118@nu.edu.pk', 'nabajafri', 'admin123'),
('abdullah', 'ansari', 'as@fd.co', 'ordinall', '123');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `Lecture_num` int(11) NOT NULL,
  `Student_ID` varchar(25) NOT NULL,
  `Section_ID` varchar(25) NOT NULL,
  `val` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE `course_details` (
  `Course_ID` varchar(25) NOT NULL,
  `Course_Name` varchar(55) NOT NULL,
  `Credit_Hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`Course_ID`, `Course_Name`, `Credit_Hours`) VALUES
('CL2005', 'Database Systems - Lab', 1),
('CL3001', 'Computer Networks - Lab', 1),
('CS2005', 'Database Systems', 3),
('CS2009', 'Design and Analyis of Algorithms', 3),
('CS3001', 'Computer Networks', 3),
('SE3002', 'Software Quality Engineering', 3),
('SS2007', 'Technical Bussiness Writing', 3);

-- --------------------------------------------------------

--
-- Table structure for table `department_details`
--

CREATE TABLE `department_details` (
  `Department_ID` varchar(25) NOT NULL,
  `Department_Name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_details`
--

INSERT INTO `department_details` (`Department_ID`, `Department_Name`) VALUES
('CE', 'Civil Engineering'),
('CS', 'Computer Science'),
('EE', 'Electrical Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `Lecture_num` int(11) NOT NULL,
  `Section_ID` varchar(25) NOT NULL,
  `datee` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `section_details`
--

CREATE TABLE `section_details` (
  `Section_ID` varchar(25) NOT NULL,
  `Teacher_ID` varchar(25) NOT NULL,
  `Course_ID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section_details`
--

INSERT INTO `section_details` (`Section_ID`, `Teacher_ID`, `Course_ID`) VALUES
('Algo', 'K191048', 'CS2009'),
('CN', 'K191048', 'CS3001'),
('CN-Lab', 'K191048', 'CL3001'),
('DB', 'K191048', 'CS2005'),
('DB-Lab', 'K191048', 'CL2005'),
('SQE', 'K191048', 'SE3002'),
('TBW', 'K191048', 'SS2007');

-- --------------------------------------------------------

--
-- Table structure for table `section_enrollment`
--

CREATE TABLE `section_enrollment` (
  `Section_ID` varchar(25) NOT NULL,
  `Student_ID` varchar(25) NOT NULL,
  `as_marks` int(11) NOT NULL,
  `quiz_marks` int(11) NOT NULL,
  `mid1_marks` int(11) NOT NULL,
  `mid2_marks` int(11) NOT NULL,
  `final_marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section_enrollment`
--

INSERT INTO `section_enrollment` (`Section_ID`, `Student_ID`, `as_marks`, `quiz_marks`, `mid1_marks`, `mid2_marks`, `final_marks`) VALUES
('Algo', 'K1911000', 0, 0, 0, 0, 0),
('Algo', 'K191120', 0, 0, 0, 0, 0),
('CN', 'K1911000', 0, 0, 0, 0, 0),
('CN', 'K191120', 0, 0, 0, 0, 0),
('CN-Lab', 'K1911000', 0, 0, 0, 0, 0),
('CN-Lab', 'K191120', 0, 0, 0, 0, 0),
('DB', 'K1911000', 0, 0, 0, 0, 0),
('DB', 'K191120', 0, 0, 0, 0, 0),
('DB-Lab', 'K1911000', 0, 0, 0, 0, 0),
('DB-Lab', 'K191120', 0, 0, 0, 0, 0),
('SQE', 'K1911000', 0, 0, 0, 0, 0),
('SQE', 'K191120', 0, 0, 0, 0, 0),
('TBW', 'K1911000', 0, 0, 0, 0, 0),
('TBW', 'K191120', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `Name` varchar(25) NOT NULL,
  `Gender` varchar(8) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Student_ID` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`Name`, `Gender`, `Address`, `Student_ID`, `Password`) VALUES
('Amman Soomro', 'Male', '-', 'K191048', 'K191048'),
('Hammad Ahmed', 'Male', '-', 'K1911000', 'K191100'),
('Rohaan Khan', 'Male', '-', 'K191120', 'K191120');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_details`
--

CREATE TABLE `teacher_details` (
  `Name` varchar(20) NOT NULL,
  `Gender` varchar(8) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Salary` int(8) NOT NULL,
  `Teacher_ID` varchar(10) NOT NULL,
  `Department_ID` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_details`
--

INSERT INTO `teacher_details` (`Name`, `Gender`, `Address`, `Salary`, `Teacher_ID`, `Department_ID`, `Password`) VALUES
('Amman Soomro', 'Male', '-', 9000000, 'K191048', 'CS', 'K191048');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`Lecture_num`,`Student_ID`,`Section_ID`),
  ADD KEY `StudentIDForiegn` (`Student_ID`),
  ADD KEY `SectionIDForeignnn` (`Section_ID`);

--
-- Indexes for table `course_details`
--
ALTER TABLE `course_details`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `department_details`
--
ALTER TABLE `department_details`
  ADD PRIMARY KEY (`Department_ID`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`Lecture_num`,`Section_ID`),
  ADD KEY `Section_IDforeignlecture` (`Section_ID`);

--
-- Indexes for table `section_details`
--
ALTER TABLE `section_details`
  ADD PRIMARY KEY (`Section_ID`),
  ADD KEY `teacherForeign` (`Teacher_ID`),
  ADD KEY `courseForeign` (`Course_ID`);

--
-- Indexes for table `section_enrollment`
--
ALTER TABLE `section_enrollment`
  ADD PRIMARY KEY (`Section_ID`,`Student_ID`),
  ADD KEY `StudentForeign` (`Student_ID`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`Student_ID`);

--
-- Indexes for table `teacher_details`
--
ALTER TABLE `teacher_details`
  ADD PRIMARY KEY (`Teacher_ID`),
  ADD KEY `Dept_ID` (`Department_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `SectionIDForeignnn` FOREIGN KEY (`Section_ID`) REFERENCES `section_details` (`Section_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `StudentIDForiegn` FOREIGN KEY (`Student_ID`) REFERENCES `student_details` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lect` FOREIGN KEY (`Lecture_num`) REFERENCES `lectures` (`Lecture_num`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lectures`
--
ALTER TABLE `lectures`
  ADD CONSTRAINT `Section_IDforeignlecture` FOREIGN KEY (`Section_ID`) REFERENCES `section_details` (`Section_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `section_details`
--
ALTER TABLE `section_details`
  ADD CONSTRAINT `courseForeign` FOREIGN KEY (`Course_ID`) REFERENCES `course_details` (`Course_ID`),
  ADD CONSTRAINT `teacherForeign` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher_details` (`Teacher_ID`);

--
-- Constraints for table `section_enrollment`
--
ALTER TABLE `section_enrollment`
  ADD CONSTRAINT `SectionForeign` FOREIGN KEY (`Section_ID`) REFERENCES `section_details` (`Section_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `StudentForeign` FOREIGN KEY (`Student_ID`) REFERENCES `student_details` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_details`
--
ALTER TABLE `teacher_details`
  ADD CONSTRAINT `Dept_ID` FOREIGN KEY (`Department_ID`) REFERENCES `department_details` (`Department_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
