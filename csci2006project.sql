-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 07:00 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csci2006project`
--

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `firstName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `lastName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `instructorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`firstName`, `lastName`, `instructorId`) VALUES
('Isaac', 'Leibniz', 1),
('Albert', 'Russell', 2),
('Ada', 'Turing', 3);

-- --------------------------------------------------------

--
-- Table structure for table `marketbooks`
--

CREATE TABLE `marketbooks` (
  `postId` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `author` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `category` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `isbn` varchar(255) CHARACTER SET utf8 NOT NULL,
  `condition` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` double(100,2) DEFAULT NULL,
  `sellerId` int(11) DEFAULT NULL,
  `bookCover` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderDetailsId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `postId` int(11) DEFAULT NULL,
  `price` double(100,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `orderDate` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `total` double(100,2) DEFAULT NULL,
  `payMethod` varchar(255) CHARACTER SET utf8 NOT NULL,
  `payExpire` varchar(255) CHARACTER SET utf8 NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `schoolbooks`
--

CREATE TABLE `schoolbooks` (
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `author` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `category` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `subjectId` int(11) NOT NULL,
  `isbn` varchar(255) CHARACTER SET utf8 NOT NULL,
  `edition` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `pubDate` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `newprice` double(100,2) DEFAULT NULL,
  `usedprice` double(100,2) DEFAULT NULL,
  `bookCover` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schoolbooks`
--

INSERT INTO `schoolbooks` (`title`, `author`, `category`, `subjectId`, `isbn`, `edition`, `pubDate`, `description`, `newprice`, `usedprice`, `bookCover`) VALUES
('Physics for Scientists & Engineers with Modern Physics (4th Edition)', 'Douglas C. Giancoli', 'PHYS', 202, '9780131495081', '4th 08', '2008', 'For the calculus-based General Physics course primarily taken by engineers and science majors (including physics majors).\r\n\r\n \r\n\r\nThis long-awaited and extensive revision maintains Giancoli\'s reputation for creating carefully crafted, highly accurate and precise physics texts. Physics for Scientists and Engineers combines outstanding pedagogy with a clear and direct narrative and applications that draw the student into the physics. The new edition also features an unrivaled suite of media and on-line resources that enhance the understanding of physics.\r\n\r\n \r\n\r\nThis book is written for students. It aims to explain physics in a readable and interesting manner that is accessible and clear, and to teach students by anticipating their needs and difficulties without oversimplifying.\r\n\r\n \r\n\r\nPhysics is a description of reality, and thus each topic begins with concrete observations and experiences that students can directly relate to. We then move on to the generalizations and more formal treatment of the topic. Not only does this make the material more interesting and easier to understand, but it is closer to the way physics is actually practiced.', 270.97, 149.38, 'textbook_phys2.jpg'),
('Starting Out with C++ from Control Structures to Objects / 8th Edition', 'Tony Gaddis', 'CSCI', 103, '9780133769395', '8TH 15', '2015', 'This text is intended for either a one-semester accelerated introductory course or a traditional two-semester sequence covering C++ programming. It is also suitable for readers interested in a comprehensive introduction to C++ programming.\r\n\r\nTony Gaddis\'s accessible, step-by-step presentation helps beginning students understand the important details necessary to become skilled programmers at an introductory level. Gaddis motivates the study of both programming skills and the C++ programming language by presenting all the details needed to understand the \"how\" and the \"why\"--but never losing sight of the fact that most beginners struggle with this material. His approach is both gradual and highly accessible, ensuring that students understand the logic behind developing high-quality programs.\r\n\r\nIn Starting Out with C++: From Control Structures through Objects, Gaddis covers control structures, functions, arrays, and pointers before objects and classes. As with all Gaddis texts, clear and easy-to-read code listings, concise and practical real-world examples, and an abundance of exercises appear in every chapter.\r\n\r\nMyProgrammingLab for Starting Out with C++ is a total learning package. MyProgrammingLab is an online homework, tutorial, and assessment program that truly engages students in learning. It helps students better prepare for class, quizzes, and exams-resulting in better performance in the course-and provides educators a dynamic set of tools for gauging individual and class progress.', 164.10, 123.10, 'textbook_csci.jpg'),
('Absolute Java', 'Walter Savitch, Kenrick Mock', 'CSCI', 203, '9780134041674', '6th 16', '2016', 'For courses in computer programming and engineering. Beginner to Intermediate Programming in Java Absolute Java provides a comprehensive reference to programming in the Java language. Accessible to both beginner and intermediate programmers, the text focuses around specifically using the Java language to practice programming techniques.\r\nThe Sixth Edition is extremely flexible and easily applicable to a wide range of users. Standalone and optional chapters allow instructors to adapt the text to a variety of curse content. Highly up-to-date with new content and information regarding the use of Java, this text introduces readers to the world of programming through a widely used and relevant language. ', 162.50, 121.90, 'textbook_csci2.jpg'),
('CALCULUS,SINGLE VARIABLE', 'HUGHES-HALLETT', 'MATH', 201, '9780470131596', '5th 09', '2009', 'Calculus teachers recognize Calculus as the leading resource among the \"reform\" projects that employ the rule of four and streamline the curriculum in order to deepen conceptual understanding. The fifth edition uses all strands of the \"Rule of Four\" - graphical, numeric, symbolic/algebraic, and verbal/applied presentations - to make concepts easier to understand. The book focuses on exploring fundamental ideas rather than comprehensive coverage of multiple similar cases that are not fundamentally unique.', 225.00, 168.75, 'textbook_math2.jpg'),
('Calculus Single Variable/4th Edition', 'HUGHES-HALLETT', 'MATH', 101, '978047148482', '4TH 05', '2005', 'CALCULUS 4/e brings together the best of both new and traditional curricula to meet the needs of even more instructors teaching calculus. The author team\'s extensive experience teaching from both traditional and innovative books and their expertise in developing innovative problems put them in an unique position to make this new curriculum meaningful to students going into mathematics and those going into the sciences and engineering. This edition will work well for those departments who are looking for a calculus book that offers a middle ground for their calculus instructors.\r\n\r\nCALCULUS 4/e exhibits the same strengths from earlier editions including the Rule of Four, an emphasis on modeling, exposition that students can read and understand and a flexible approach to technology. The conceptual and modeling problems, praised for their creativity and variety, continue to motivate and challenge students.', 188.75, 141.60, 'textbook_math.jpg'),
('Physics for Scientists and Engineers with Modern Physics, Technology Update / 9th Edition', 'Raymond A. Serway, John W. Jewett', 'PHYS', 102, '9781305714892', '9TH 16', '2016', 'Achieve success in your physics course by making the most of what PHYSICS FOR SCIENTISTS AND ENGINEERS Ninth Edition Technology Edition has to offer. From a host of in-text features to a range of outstanding technology resources, you\'ll have everything you need to understand the natural forces and principles of physics. Throughout every chapter, the authors have built in a wide range of examples, exercises, and illustrations that will help you to understand the laws of physics AND succeed in your course!', 161.25, 120.95, 'textbook_phys.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `category` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `subjectId` int(11) NOT NULL,
  `instructorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`title`, `category`, `subjectId`, `instructorId`) VALUES
('Single Variable Calculus 1', 'MATH', 101, 1),
('Physics 1', 'PHYS', 102, 2),
('Programming Fundamentals', 'CSCI', 103, 3),
('Single Variable Calculus 2', 'MATH', 201, 1),
('Physics 2', 'PHYS', 202, 2),
('Object-Oriented Programming', 'CSCI', 203, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `firstName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `lastName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `salt` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `streetAddress` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `payMethod` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `payExpire` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstName`, `lastName`, `userId`, `password`, `salt`, `email`, `streetAddress`, `city`, `state`, `zipcode`, `phone`, `payMethod`, `payExpire`) VALUES
('Tom', 'McDonald', 1, '408962f5e224d6f4b045983b2daf09d7', 'lKewTE2L1xB10gJj', 'tomM@example.com', '0001 Test Ave', 'Example', 'MN', 1, '111-111-1111', '1234123412341234', '11/20'),
('Shelby', 'Medlock', 2, 'c7ab20c071c121b5fe680dad61f97fdd', 'a8Gij24l2MfAtarN', 'shelbyM@example.com', '0002 Test Ave', 'Example', 'MN', 2, '222-222-2222', '1234123412341234', '12/22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructorId`);

--
-- Indexes for table `marketbooks`
--
ALTER TABLE `marketbooks`
  ADD PRIMARY KEY (`postId`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderDetailsId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `schoolbooks`
--
ALTER TABLE `schoolbooks`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subjectId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marketbooks`
--
ALTER TABLE `marketbooks`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `orderDetailsId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
