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
  PRIMARY KEY (`ID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'items'
#

INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('Anantomy & Physiology','academics','textbook',15.00,'textbook.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('Quantum Enigma','academics','textbook',10.00,'textbook1.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('Other People Children','academics','textbook',25.00,'textbook2.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('Gravitation','academics','textbook',15.00,'textbook3.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('The Pragmatic Programmer','academics','textbook',28.00,'textbook4.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('Algorithms','academics','textbook',30.00,'textbook5.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('HTML,CSS & JavaScript','academics','textbook',5.00,'textbook6.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('The Conscience of a Liberal','academics','textbook',20.00,'textbook7.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('Wage-Labour and Capital','academics','textbook',10.00,'textbook8.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('Pedagogy of the Oppressed','academics','textbook',15.00,'textbook9.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('Teaching with Poverty in Mind','academics','textbook',25.00,'textbook10.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('ACT Total Prep 2024','academics','testprep',25.00,'testprep.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('MCAT 528 Advanced Prep','academics','testprep',20.00,'testprep1.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('LSAT PreTest 84','academics','testprep',10.00,'testprep2.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('MCAT Physics and Math Review','academics','testprep',5.00,'testprep3.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('MCAT Organic Chemistry Review','academics','testprep',12.00,'testprep4.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('MCAT Organic Chemistry Review','academics','testprep',25.00,'testprep5.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('SAT Subject Test Biology','academics','testprep',10.00,'testprep6.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('Comparison Statements','academics','testprep',15.00,'testprep7.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('The Little Red Writing Book','academics','testprep',20.00,'testprep8.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('Algebra Review','academics','testprep',20.00,'testprep9.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('The ACT for Bad Test Takers','academics','testprep',10.00,'testprep10.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('The Girl Who Played With Fire','academics','book',10.00,'book1.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('The Importance of Being Earnest','academics','book',10.00,'book2.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('A Dolls House and Other Plays','academics','book',12.00,'book3.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('Lysistrata and Other Plays','academics','book',15.00,'book4.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('Fair Play','academics','book',5.00,'book5.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('A Dolls House','academics','book',15.00,'book6.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('Romeo & Juliet','academics','book',10.00,'book7.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('Antigone','academics','book',5.00,'book8.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('Medea','academics','book',8.00,'book9.jpg');
INSERT INTO `items` (`Name`,`Category`,`Subcategory`,`Price`,`Image`) Values ('Oedipus Rex','academics','book',10.00,'book10.jpg');
# 32 records

#
# Table structure for table 'Credentials'
#

DROP TABLE IF EXISTS `Credentials`;

CREATE TABLE `Credentials` (
`UserID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`Username` VARCHAR( 64 ) NOT NULL ,
`Password` VARCHAR( 64 ) NOT NULL,
`seed` VARCHAR(64) NOT NULL
) ENGINE = MYISAM;

UPDATE `Credentials` SET `Password` = MD5(CONCAT(`Password`, `seed`));
