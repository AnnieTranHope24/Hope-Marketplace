-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 07:16 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

DROP DATABASE IF EXISTS `hopemarketplace`;
CREATE DATABASE IF NOT EXISTS `hopemarketplace`;
USE `hopemarketplace`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hopemarketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `ip_address` varchar(250) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--
DROP TABLE IF EXISTS `credentials`;
CREATE TABLE `credentials` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(64) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `seed` varchar(64) NOT NULL,
  `Email` VARCHAR(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`UserID`, `Username`, `Password`, `seed`) VALUES
(1, 'annie', '70694cfc8b7843acc55fc7ab474b5dbf', '1b8e33f9'),
(2, 'ngoc', '3f89a7d0e928cf97c84118786b383d69', '0c706f46'),
(3, 'Hey', '6f6dc26fb67249fa3a6a2d967f39ac15', 'c20201a3');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--
/*
CREATE TABLE `items` (
  `ID` INTEGER NOT NULL AUTO_INCREMENT, 
  `Name` VARCHAR(50), 
  `Category` VARCHAR(50), 
  `Subcategory` VARCHAR(50), 
  `Price` INTEGER, 
  `Image` VARCHAR(50), 
  `Seller` VARCHAR(50)
  PRIMARY KEY (`ID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'items'
#

INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('Anantomy & Physiology','academics','Textbooks',15.00,'textbook.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('Quantum Enigma','academics','Textbooks',10.00,'textbook1.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('Other People Children','academics','Textbooks',25.00,'textbook2.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('Gravitation','academics','Textbooks',15.00,'textbook3.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('The Pragmatic Programmer','academics','Textbooks',28.00,'textbook4.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('Algorithms','academics','Textbooks',30.00,'textbook5.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('HTML,CSS & JavaScript','academics','Textbooks',5.00,'textbook6.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('The Conscience of a Liberal','academics','Textbooks',20.00,'textbook7.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('Wage-Labour and Capital','academics','Textbooks',10.00,'textbook8.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('Pedagogy of the Oppressed','academics','Textbooks',15.00,'textbook9.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('Teaching with Poverty in Mind','academics','Textbooks',25.00,'textbook10.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('ACT Total Prep 2024','academics','Test Preps',25.00,'testprep.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('MCAT 528 Advanced Prep','academics','Test Preps',20.00,'testprep1.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('LSAT PreTest 84','academics','Test Preps',10.00,'testprep2.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('MCAT Physics and Math Review','academics','Test Preps',5.00,'testprep3.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('MCAT Organic Chemistry Review','academics','Test Preps',12.00,'testprep4.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('MCAT Organic Chemistry Review','academics','Test Preps',25.00,'testprep5.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('SAT Subject Test Biology','academics','Test Preps',10.00,'testprep6.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('Comparison Statements','academics','Test Preps',15.00,'testprep7.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('The Little Red Writing Book','academics','Test Preps',20.00,'testprep8.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('Algebra Review','academics','Test Preps',20.00,'testprep9.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('The ACT for Bad Test Takers','academics','Test Preps',10.00,'testprep10.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('The Girl Who Played With Fire','academics','Books',10.00,'book1.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('The Importance of Being Earnest','academics','Books',10.00,'book2.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('A Dolls House and Other Plays','academics','Books',12.00,'book3.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('Lysistrata and Other Plays','academics','Books',15.00,'book4.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('Fair Play','academics','Books',5.00,'book5.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('A Dolls House','academics','Books',15.00,'book6.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('Romeo & Juliet','academics','Books',10.00,'book7.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('Antigone','academics','Books',5.00,'book8.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('Medea','academics','Books',8.00,'book9.jpg','hopemarketplace');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`,`Seller`) Values ('Oedipus Rex','academics','Books',10.00,'book10.jpg','hopemarketplace');
# 32 records

#
# Table structure for table 'Credentials'
#

DROP TABLE IF EXISTS `Credentials`;

CREATE TABLE `Credentials` (
`UserID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`Username` VARCHAR( 64 ) NOT NULL ,
`Password` VARCHAR( 64 ) NOT NULL,
`seed` VARCHAR(64) NOT NULL,
`Email` VARCHAR(64) NOT NULL
) ENGINE = MYISAM;*/

UPDATE `Credentials` SET `Password` = MD5(CONCAT(`Password`, `seed`));
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `Subcategory` varchar(50) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ID`, `Name`, `Category`, `Subcategory`, `Price`, `Image`) VALUES
(1, 'Anantomy & Physiology', 'academics', 'Textbooks', 15, 'textbook.jpg'),
(2, 'Quantum Enigma', 'academics', 'Textbooks', 10, 'textbook1.jpg'),
(3, 'Other People Children', 'academics', 'Textbooks', 25, 'textbook2.jpg'),
(4, 'Gravitation', 'academics', 'Textbooks', 15, 'textbook3.jpg'),
(5, 'The Pragmatic Programmer', 'academics', 'Textbooks', 28, 'textbook4.jpg'),
(6, 'Algorithms', 'academics', 'Textbooks', 30, 'textbook5.jpg'),
(7, 'HTML,CSS & JavaScript', 'academics', 'Textbooks', 5, 'textbook6.jpg'),
(8, 'The Conscience of a Liberal', 'academics', 'Textbooks', 20, 'textbook7.jpg'),
(9, 'Wage-Labour and Capital', 'academics', 'Textbooks', 10, 'textbook8.jpg'),
(10, 'Pedagogy of the Oppressed', 'academics', 'Textbooks', 15, 'textbook9.jpg'),
(11, 'Teaching with Poverty in Mind', 'academics', 'Textbooks', 25, 'textbook10.jpg'),
(12, 'ACT Total Prep 2024', 'academics', 'Test Preps', 25, 'testprep.jpg'),
(13, 'MCAT 528 Advanced Prep', 'academics', 'Test Preps', 20, 'testprep1.jpg'),
(14, 'LSAT PreTest 84', 'academics', 'Test Preps', 10, 'testprep2.jpg'),
(15, 'MCAT Physics and Math Review', 'academics', 'Test Preps', 5, 'testprep3.jpg'),
(16, 'MCAT Organic Chemistry Review', 'academics', 'Test Preps', 12, 'testprep4.jpg'),
(17, 'MCAT Organic Chemistry Review', 'academics', 'Test Preps', 25, 'testprep5.jpg'),
(18, 'SAT Subject Test Biology', 'academics', 'Test Preps', 10, 'testprep6.jpg'),
(19, 'Comparison Statements', 'academics', 'Test Preps', 15, 'testprep7.jpg'),
(20, 'The Little Red Writing Book', 'academics', 'Test Preps', 20, 'testprep8.jpg'),
(21, 'Algebra Review', 'academics', 'Test Preps', 20, 'testprep9.jpg'),
(22, 'The ACT for Bad Test Takers', 'academics', 'Test Preps', 10, 'testprep10.jpg'),
(23, 'The Girl Who Played With Fire', 'academics', 'Books', 10, 'book1.jpg'),
(24, 'The Importance of Being Earnest', 'academics', 'Books', 10, 'book2.jpg'),
(25, 'A Dolls House and Other Plays', 'academics', 'Books', 12, 'book3.jpg'),
(26, 'Lysistrata and Other Plays', 'academics', 'Books', 15, 'book4.jpg'),
(27, 'Fair Play', 'academics', 'Books', 5, 'book5.jpg'),
(28, 'A Dolls House', 'academics', 'Books', 15, 'book6.jpg'),
(29, 'Romeo & Juliet', 'academics', 'Books', 10, 'book7.jpg'),
(30, 'Antigone', 'academics', 'Books', 5, 'book8.jpg'),
(31, 'Medea', 'academics', 'Books', 8, 'book9.jpg'),
(32, 'Oedipus Rex', 'academics', 'Books', 10, 'book10.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
