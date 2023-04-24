DROP DATABASE IF EXISTS `hopemarketplace`;
CREATE DATABASE IF NOT EXISTS `hopemarketplace`;
USE `hopemarketplace`;

#
# Table structure for table 'items'
#

DROP TABLE IF EXISTS `items`;

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
) ENGINE = MYISAM;

UPDATE `Credentials` SET `Password` = MD5(CONCAT(`Password`, `seed`));
