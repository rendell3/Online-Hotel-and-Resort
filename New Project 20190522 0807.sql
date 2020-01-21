-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.21-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema dbresort
--

CREATE DATABASE IF NOT EXISTS dbresort;
USE dbresort;

--
-- Definition of table `currentbookrooms`
--

DROP TABLE IF EXISTS `currentbookrooms`;
CREATE TABLE `currentbookrooms` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `PRODUCTID` varchar(45) NOT NULL,
  `REFERENCENO` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currentbookrooms`
--

/*!40000 ALTER TABLE `currentbookrooms` DISABLE KEYS */;
INSERT INTO `currentbookrooms` (`ID`,`PRODUCTID`,`REFERENCENO`) VALUES 
 (4,'18','1288980973');
/*!40000 ALTER TABLE `currentbookrooms` ENABLE KEYS */;


--
-- Definition of table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `REFERENCENO` varchar(45) DEFAULT NULL,
  `DATEPAYMENT` date DEFAULT NULL,
  `AMOUNT` decimal(12,2) DEFAULT NULL,
  `REMARKS` longtext,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` (`ID`,`REFERENCENO`,`DATEPAYMENT`,`AMOUNT`,`REMARKS`) VALUES 
 (1,'217523770','2019-03-29','8000.00',NULL),
 (4,'217523770','2019-03-30','0.00',NULL),
 (5,'1167170289','2019-04-07','10000.00',NULL),
 (6,'1851771134','2019-04-07','10000.00',NULL),
 (7,'581174757','2019-04-07','10000.00',NULL),
 (8,'581174757','2019-04-07','10000.00',NULL),
 (9,'581174757','2019-04-07','10000.00',NULL),
 (10,'581174757','2019-04-07','10000.00',NULL),
 (11,'581174757','2019-04-07','0.00',NULL),
 (12,'894687620','2019-04-07','15000.00',NULL),
 (13,'894687620','2019-04-07','0.00',NULL),
 (14,'187032517','2019-04-23','22000.00',NULL),
 (15,'1492286191','2019-04-23','4500.00',NULL),
 (16,'799981226','2019-04-23','16000.00',NULL),
 (17,'1364098536','2019-04-23','16000.00',NULL),
 (18,'','2019-04-23','0.00',NULL),
 (19,'1364098536','2019-04-23','16000.00',NULL),
 (20,'1492286191','2019-04-23','0.00',NULL),
 (21,'2126466386','2019-04-25','10000.00',NULL),
 (22,'817997213','2019-04-25','7993.00',NULL),
 (23,'817997213','2019-04-25','0.00',NULL),
 (24,'721059643','2019-04-25','16000.00',NULL),
 (25,'721059643','2019-04-25','0.00',NULL),
 (26,'1580419968','2019-04-25','8000.00',NULL),
 (27,'1580419968','2019-04-25','0.00',NULL),
 (28,'1573481601','2019-04-25','6000.00',NULL),
 (37,'1364098536','2019-04-26','0.00',NULL),
 (31,'799981226','2019-04-25','0.00',NULL),
 (38,'24889304','2019-04-26','0.00',NULL),
 (33,'2126466386','2019-04-25','0.00',NULL),
 (34,'24889304','2019-04-26','16000.00',NULL),
 (36,'828671701','2019-04-26','0.00',NULL),
 (39,'95487632','2019-04-26','6000.00',NULL),
 (40,'95487632','2019-04-26','0.00',NULL),
 (41,'1711197693','2019-04-26','14000.00',NULL),
 (42,'1711197693','2019-04-26','0.00',NULL),
 (43,'1107721398','2019-04-28','4000.00',NULL),
 (44,'977120192','2019-04-28','4000.00',NULL),
 (45,'977120192','2019-04-28','0.00',NULL),
 (46,'897644387','2019-05-03','3000.00',NULL),
 (47,'766399802','2019-05-03','8000.00',NULL),
 (48,'766399802','2019-05-03','8000.00',NULL),
 (49,'188779345','2019-05-08','8000.00',NULL),
 (50,'2070189815','2019-05-08','3000.00',NULL),
 (51,'2070189815','2019-05-08','0.00',NULL),
 (52,'1804163899','2019-05-08','0.00',NULL),
 (53,'216237352','2019-05-08','0.00',NULL),
 (54,'790872544','2019-05-08','0.00',NULL),
 (55,'772846690','2019-05-08','0.00',NULL),
 (56,'1133101925','2019-05-08','0.00',NULL),
 (57,'342853794','2019-05-08','0.00',NULL),
 (58,'1107721398','2019-05-08','0.00',NULL),
 (59,'897644387','2019-05-08','0.00',NULL),
 (60,'766399802','2019-05-08','0.00',NULL),
 (61,'188779345','2019-05-08','0.00',NULL),
 (62,'1288980973','2019-05-08','4000.00',NULL),
 (63,'1951962818','2019-05-17','1500.00',''),
 (64,'1951962818','2019-05-17','0.00',''),
 (65,'1418982979','2019-05-17','3000.00','');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;


--
-- Definition of table `requestreschedule`
--

DROP TABLE IF EXISTS `requestreschedule`;
CREATE TABLE `requestreschedule` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `IDBOOKPACKAGE` varchar(45) NOT NULL,
  `CHECKIN` datetime NOT NULL,
  `CHECKOUT` datetime NOT NULL,
  `TYPE` varchar(45) NOT NULL,
  `REFERENCENO` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestreschedule`
--

/*!40000 ALTER TABLE `requestreschedule` DISABLE KEYS */;
INSERT INTO `requestreschedule` (`ID`,`IDBOOKPACKAGE`,`CHECKIN`,`CHECKOUT`,`TYPE`,`REFERENCENO`) VALUES 
 (12,'37','2019-05-12 12:00:38','2019-05-15 12:00:44','Approved','1951962818'),
 (13,'37','2019-05-12 12:00:16','2019-05-15 12:00:18','Approved','1951962818'),
 (14,'37','2019-05-17 12:00:29','2019-05-22 12:00:44','Approved','1951962818'),
 (15,'37','2019-05-16 12:00:23','2019-05-31 12:00:31','Approved','1951962818'),
 (16,'37','2019-05-15 12:00:30','2019-05-22 12:00:36','Approved','1951962818'),
 (17,'37','2019-05-10 02:25:30','2019-05-19 12:00:32','Request Resched','1951962818');
/*!40000 ALTER TABLE `requestreschedule` ENABLE KEYS */;


--
-- Definition of table `roomcounters`
--

DROP TABLE IF EXISTS `roomcounters`;
CREATE TABLE `roomcounters` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NEXTID` int(10) unsigned NOT NULL,
  `CATEGORY` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomcounters`
--

/*!40000 ALTER TABLE `roomcounters` DISABLE KEYS */;
INSERT INTO `roomcounters` (`ID`,`NEXTID`,`CATEGORY`) VALUES 
 (1,105,'1'),
 (2,101,'2'),
 (3,102,'3'),
 (4,102,'4'),
 (5,100,'5'),
 (6,100,'6'),
 (7,100,'7'),
 (8,100,'8'),
 (9,100,'9'),
 (10,100,'10'),
 (11,100,'11'),
 (12,100,'12');
/*!40000 ALTER TABLE `roomcounters` ENABLE KEYS */;


--
-- Definition of table `tblbookings`
--

DROP TABLE IF EXISTS `tblbookings`;
CREATE TABLE `tblbookings` (
  `fldBookingId` int(11) NOT NULL AUTO_INCREMENT,
  `fldBookingStart` date NOT NULL,
  `fldBookingEnd` date NOT NULL,
  `fldBookingPackaged` tinyint(1) NOT NULL,
  `fldBookingPerson` int(11) NOT NULL,
  `fldBookingTotal` varchar(11) NOT NULL,
  `fldBookingPaid` tinyint(1) NOT NULL,
  `fldBookingApproved` tinyint(1) NOT NULL,
  `fldBookingDeleted` tinyint(1) NOT NULL,
  `fldBookingCreated` datetime NOT NULL,
  `fldBookingModified` datetime NOT NULL,
  `tblCustomers_fldCustomerId` int(11) NOT NULL,
  PRIMARY KEY (`fldBookingId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbookings`
--

/*!40000 ALTER TABLE `tblbookings` DISABLE KEYS */;
INSERT INTO `tblbookings` (`fldBookingId`,`fldBookingStart`,`fldBookingEnd`,`fldBookingPackaged`,`fldBookingPerson`,`fldBookingTotal`,`fldBookingPaid`,`fldBookingApproved`,`fldBookingDeleted`,`fldBookingCreated`,`fldBookingModified`,`tblCustomers_fldCustomerId`) VALUES 
 (1,'2019-02-14','2019-02-15',0,0,'18800',0,0,0,'2019-02-25 13:06:21','2019-02-25 13:06:21',1),
 (2,'2019-02-13','2019-02-14',0,0,'20800',1,1,0,'2019-02-25 16:30:20','2019-02-28 18:11:41',1),
 (3,'2019-02-28','2019-03-01',0,0,'19200',1,1,0,'2019-02-26 14:53:19','2019-02-28 18:34:34',1),
 (4,'2019-03-05','2019-03-06',0,0,'6800',1,1,0,'2019-02-28 19:19:13','2019-02-28 19:51:23',3),
 (5,'2019-03-07','2019-03-08',0,0,'3000',0,0,1,'2019-02-28 19:41:30','2019-02-28 20:56:51',3);
/*!40000 ALTER TABLE `tblbookings` ENABLE KEYS */;


--
-- Definition of table `tblbookingspackages`
--

DROP TABLE IF EXISTS `tblbookingspackages`;
CREATE TABLE `tblbookingspackages` (
  `fldBookingPackageId` int(11) NOT NULL AUTO_INCREMENT,
  `fldBookingPackageQuantity` int(11) NOT NULL,
  `fldBookingPackageDeleted` tinyint(1) NOT NULL,
  `fldBookingPackageCreated` datetime NOT NULL,
  `fldBookingPackageModified` datetime NOT NULL,
  `tblBookings_fldBookingId` int(11) NOT NULL,
  `tblPackages_fldPackageId` int(11) NOT NULL,
  PRIMARY KEY (`fldBookingPackageId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbookingspackages`
--

/*!40000 ALTER TABLE `tblbookingspackages` DISABLE KEYS */;
INSERT INTO `tblbookingspackages` (`fldBookingPackageId`,`fldBookingPackageQuantity`,`fldBookingPackageDeleted`,`fldBookingPackageCreated`,`fldBookingPackageModified`,`tblBookings_fldBookingId`,`tblPackages_fldPackageId`) VALUES 
 (1,1,0,'2019-02-25 13:06:21','2019-02-25 13:06:21',1,1),
 (2,1,0,'2019-02-25 16:30:20','2019-02-25 16:30:20',2,1),
 (3,1,0,'2019-02-26 14:53:19','2019-02-26 14:53:19',3,1);
/*!40000 ALTER TABLE `tblbookingspackages` ENABLE KEYS */;


--
-- Definition of table `tblbookingspayments`
--

DROP TABLE IF EXISTS `tblbookingspayments`;
CREATE TABLE `tblbookingspayments` (
  `fldBookingPaymentId` int(11) NOT NULL AUTO_INCREMENT,
  `fldBookingPaymentAmount` varchar(11) NOT NULL,
  `fldBookingPaymentDeleted` tinyint(1) NOT NULL,
  `fldBookingPaymentCreated` datetime NOT NULL,
  `fldBookingPaymentModified` datetime NOT NULL,
  `tblBookings_fldBookingId` int(11) NOT NULL,
  PRIMARY KEY (`fldBookingPaymentId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbookingspayments`
--

/*!40000 ALTER TABLE `tblbookingspayments` DISABLE KEYS */;
INSERT INTO `tblbookingspayments` (`fldBookingPaymentId`,`fldBookingPaymentAmount`,`fldBookingPaymentDeleted`,`fldBookingPaymentCreated`,`fldBookingPaymentModified`,`tblBookings_fldBookingId`) VALUES 
 (1,'10400.00',0,'2019-02-28 18:11:41','2019-02-28 18:11:41',2),
 (2,'9600.00',0,'2019-02-28 18:34:34','2019-02-28 18:34:34',3),
 (3,'6800.00',0,'2019-02-28 19:51:23','2019-02-28 19:51:23',4);
/*!40000 ALTER TABLE `tblbookingspayments` ENABLE KEYS */;


--
-- Definition of table `tblbookingsproducts`
--

DROP TABLE IF EXISTS `tblbookingsproducts`;
CREATE TABLE `tblbookingsproducts` (
  `fldBookingProductId` int(11) NOT NULL AUTO_INCREMENT,
  `fldBookingProductQuantity` int(11) NOT NULL,
  `fldBookingProductDeleted` tinyint(1) NOT NULL,
  `fldBookingProductCreated` datetime NOT NULL,
  `fldBookingProductModified` datetime NOT NULL,
  `tblBookings_fldBookingId` int(11) NOT NULL,
  `tblProducts_fldProductId` int(11) NOT NULL,
  PRIMARY KEY (`fldBookingProductId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbookingsproducts`
--

/*!40000 ALTER TABLE `tblbookingsproducts` DISABLE KEYS */;
INSERT INTO `tblbookingsproducts` (`fldBookingProductId`,`fldBookingProductQuantity`,`fldBookingProductDeleted`,`fldBookingProductCreated`,`fldBookingProductModified`,`tblBookings_fldBookingId`,`tblProducts_fldProductId`) VALUES 
 (1,1,0,'2019-02-25 13:06:21','2019-02-25 13:06:21',1,7),
 (2,1,0,'2019-02-25 16:30:20','2019-02-25 16:30:20',2,1),
 (3,1,0,'2019-02-25 16:30:20','2019-02-25 16:30:20',2,5),
 (4,4,0,'2019-02-26 14:53:19','2019-02-26 14:53:19',3,5),
 (5,1,0,'2019-02-28 19:19:13','2019-02-28 19:19:13',4,7),
 (6,1,0,'2019-02-28 19:19:13','2019-02-28 19:19:13',4,10),
 (7,1,0,'2019-02-28 19:41:30','2019-02-28 19:41:30',5,9);
/*!40000 ALTER TABLE `tblbookingsproducts` ENABLE KEYS */;


--
-- Definition of table `tblbookpackageitems`
--

DROP TABLE IF EXISTS `tblbookpackageitems`;
CREATE TABLE `tblbookpackageitems` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `REFERENCENO` varchar(45) DEFAULT NULL,
  `fldPackageId` varchar(45) DEFAULT NULL,
  `fldPackagePrice` decimal(12,5) DEFAULT NULL,
  `fldPackageName` varchar(45) DEFAULT NULL,
  `fldPackageQuantity` decimal(12,5) DEFAULT NULL,
  `fldPackageTotal` decimal(12,5) DEFAULT NULL,
  `Createdby` varchar(45) DEFAULT NULL,
  `BookDate` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbookpackageitems`
--

/*!40000 ALTER TABLE `tblbookpackageitems` DISABLE KEYS */;
INSERT INTO `tblbookpackageitems` (`ID`,`REFERENCENO`,`fldPackageId`,`fldPackagePrice`,`fldPackageName`,`fldPackageQuantity`,`fldPackageTotal`,`Createdby`,`BookDate`) VALUES 
 (5,'217523770','3','5000.00000','Me-time Package','1.00000','5000.00000','sample1@gmail.com','0000-00-00'),
 (6,'217523770','4','14000.00000','Asynchronous','1.00000','14000.00000','sample1@gmail.com','0000-00-00'),
 (7,'1167170289','1','16000.00000','Save and Relax Package','1.00000','16000.00000','sample2@gmail.com','2019-04-07'),
 (8,'1851771134','1','16000.00000','Save and Relax Package','1.00000','16000.00000','sample2@gmail.com','1970-01-01'),
 (9,'581174757','1','16000.00000','Save and Relax Package','1.00000','16000.00000','sample2@gmail.com','0000-00-00'),
 (10,'894687620','1','16000.00000','Save and Relax Package','1.00000','16000.00000','sample2@gmail.com','2019-04-07'),
 (11,'187032517','1','16000.00000','Save and Relax Package','1.00000','16000.00000','skgnaybe16@gmail.com','2019-04-23'),
 (12,'799981226','1','16000.00000','Save and Relax Package','1.00000','16000.00000','sample1@gmail.com','2019-04-23'),
 (13,'1492286191','K-01','500.00000','Karaoke','1.00000','500.00000','skgnaybe16@gmail.com','2019-04-23'),
 (14,'1364098536','1','16000.00000','Save and Relax Package','1.00000','16000.00000','sample1@gmail.com','2019-04-23'),
 (15,'721059643','1','16000.00000','Save and Relax Package','1.00000','16000.00000','skgnaybe16@gmail.com','2019-04-25'),
 (16,'817997213','1','16000.00000','Save and Relax Package','1.00000','16000.00000','sample2@gmail.com','2019-04-25'),
 (17,'828671701','1','16000.00000','Save and Relax Package','1.00000','16000.00000','skgnaybe16@gmail.com','2019-04-25'),
 (18,'1580419968','1','16000.00000','Save and Relax Package','1.00000','16000.00000','sample2@gmail.com','2019-04-25'),
 (19,'24889304','1','16000.00000','Save and Relax Package','1.00000','16000.00000','sample1@gmail.com','2019-04-25'),
 (20,'143116529','1','16000.00000','Save and Relax Package','1.00000','16000.00000','skgnaybe16@yahoo.com','2019-04-25'),
 (21,'143116529','1','16000.00000','Save and Relax Package','1.00000','16000.00000','skgnaybe16@yahoo.com','2019-04-25'),
 (22,'1711197693','4','14000.00000','Asynchronous','1.00000','14000.00000','skgnaybe16@yahoo.com','2019-04-26'),
 (23,'95487632','1','16000.00000','Save and Relax Package','1.00000','16000.00000','sample2@gmail.com','2019-04-26'),
 (24,'891135327','K-01','500.00000','Karaoke','1.00000','500.00000','mrmitschek@dlsud.edu.ph','2019-04-26'),
 (25,'1133101925','C-CA1','800.00000','Calesa','1.00000','800.00000','mrmitschek@dlsud.edu.ph','2019-04-26'),
 (26,'876918508','R-100','1500.00000','testroom','1.00000','1500.00000','sample1@gmail.com','2019-04-28'),
 (27,'977120192','K-01','4000.00000','King\'s Room','1.00000','4000.00000','sample1@gmail.com','2019-04-28'),
 (28,'1195211218','R-104','4000.00000','Kings Room','2.00000','8000.00000','sample1@gmail.com','2019-05-03'),
 (29,'897644387','R-103','3000.00000','Couples Deluxe','1.00000','3000.00000','sample1@gmail.com','2019-05-03'),
 (30,'766399802','R-104','4000.00000','Kings Room','2.00000','8000.00000','sample1@gmail.com','2019-05-03'),
 (31,'188779345','R-104','4000.00000','Kings Room','2.00000','8000.00000','sample1@gmail.com','2019-05-08'),
 (32,'2070189815','R-103','3000.00000','Couples Deluxe','1.00000','3000.00000','sample1@gmail.com','2019-05-08'),
 (33,'1288980973','R-104','4000.00000','Kings Room','2.00000','8000.00000','sample1@gmail.com','2019-05-08'),
 (34,'1951962818','R-103','3000.00000','Couples Deluxe','1.00000','3000.00000','sample1@gmail.com','2019-05-10'),
 (35,'1418982979','R-103','3000.00000','Couples Deluxe','1.00000','3000.00000','sample1@gmail.com','2019-05-17'),
 (36,'121998876','1','16000.00000','Save and Relax Package','1.00000','16000.00000','sample1@gmail.com','2019-05-17'),
 (37,'457016759','1','16000.00000','Save and Relax Package','1.00000','16000.00000','sample1@gmail.com','2019-05-17');
/*!40000 ALTER TABLE `tblbookpackageitems` ENABLE KEYS */;


--
-- Definition of table `tblbookpackages`
--

DROP TABLE IF EXISTS `tblbookpackages`;
CREATE TABLE `tblbookpackages` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CREATEDBY` varchar(45) DEFAULT NULL,
  `DATECREATED` datetime DEFAULT NULL,
  `CHECKIN` datetime DEFAULT NULL,
  `CHECKOUT` datetime DEFAULT NULL,
  `STATUS` varchar(45) DEFAULT NULL,
  `REFERENCENO` varchar(45) DEFAULT NULL,
  `BOOKDATE` date DEFAULT NULL,
  `TOTAL` decimal(12,5) DEFAULT NULL,
  `DATEPAYMENT` date DEFAULT NULL,
  `TYPEOFTRANSACTION` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbookpackages`
--

/*!40000 ALTER TABLE `tblbookpackages` DISABLE KEYS */;
INSERT INTO `tblbookpackages` (`ID`,`CREATEDBY`,`DATECREATED`,`CHECKIN`,`CHECKOUT`,`STATUS`,`REFERENCENO`,`BOOKDATE`,`TOTAL`,`DATEPAYMENT`,`TYPEOFTRANSACTION`) VALUES 
 (3,'sample1@gmail.com','0000-00-00 00:00:00','2019-03-22 11:30:55','2019-03-24 05:00:58','Cancelled','217523770','2019-03-22','23000.00000','2019-03-29','Online Booking'),
 (4,'Rendell Sampat','2019-04-07 19:02:08','0000-00-00 00:00:00','0000-00-00 00:00:00','Checked Out','581174757','2019-04-07','10000.00000','2019-04-07','Walk In'),
 (5,'RENDELL SAMPAT','2019-04-07 19:05:24','2019-04-07 00:00:00','2019-04-10 00:00:00','Checked Out','894687620','2019-04-07','15000.00000','2019-04-07','Walk In'),
 (6,'skgnaybe16@gmail.com','2019-04-23 13:33:51','2019-04-23 01:00:25','2019-04-24 01:00:37','Cancelled','187032517','2019-04-23','22000.00000','2019-04-23','Online Booking'),
 (7,'sample1@gmail.com','2019-04-23 13:42:19','2019-04-23 01:40:05','2019-04-24 01:40:07','Cancelled','799981226','2019-04-23','16000.00000','2019-04-23','Online Booking'),
 (12,'Czarina Altea','2019-04-25 09:03:41','2019-04-25 00:00:00','2019-04-25 00:00:00','Checked Out','817997213','2019-04-25','7993.00000','2019-04-25','Walk In'),
 (8,'skgnaybe16@gmail.com','2019-04-23 14:06:13','2019-04-23 02:03:54','2019-04-24 02:00:03','Cancelled','1492286191','2019-04-23','4500.00000','2019-04-23','Online Booking'),
 (9,'sample1@gmail.com','2019-04-23 15:16:16','2019-04-23 03:14:04','2019-04-24 03:10:06','Cancelled','1364098536','2019-04-23','16000.00000','2019-04-23','Online Booking'),
 (10,'skgnaybe16@gmail.com','2019-04-25 08:55:54','2019-04-26 01:00:22','2019-04-27 01:00:43','Checked Out','2126466386','2019-04-25','10000.00000','2019-04-25','Online Booking'),
 (11,'skgnaybe16@gmail.com','2019-04-25 09:00:08','2019-04-25 08:57:53','2019-04-27 01:00:56','Cancelled','721059643','2019-04-25','16000.00000','2019-04-25','Online Booking'),
 (13,'skgnaybe16@gmail.com','2019-04-25 18:43:57','2019-04-25 06:41:48','2019-04-26 06:40:51','Checked Out','828671701','2019-04-25','16000.00000','0000-00-00','Online Booking'),
 (14,'Rendell Sampat','2019-04-25 19:15:59','2019-04-25 00:00:00','2019-04-25 00:00:00','Checked Out','1580419968','2019-04-25','8000.00000','2019-04-25','Walk In'),
 (15,'sample1@gmail.com','2019-04-25 19:20:57','2019-04-25 07:18:40','2019-04-26 10:15:43','Cancelled','24889304','2019-04-25','16000.00000','2019-04-26','Online Booking'),
 (16,'skgnaybe16@yahoo.com','2019-04-25 23:11:09','2019-04-25 01:00:16','2019-04-26 01:00:57','Cancelled','143116529','2019-04-25','32000.00000','0000-00-00','Online Booking'),
 (17,'skgnaybe16@yahoo.com','2019-04-25 23:12:00','2019-04-25 11:09:38','2019-04-26 11:05:42','Checked Out','1573481601','2019-04-25','6000.00000','2019-04-25','Online Booking'),
 (18,'skgnaybe16@yahoo.com','2019-04-25 23:12:24','2019-04-25 11:10:03','2019-04-30 11:10:07','Checked Out','1804163899','0000-00-00','0.00000','2019-04-25','Online Booking'),
 (20,'skgnaybe16@yahoo.com','2019-04-26 13:43:12','2019-04-27 01:00:50','2019-04-28 01:00:02','Checked Out','342853794','2019-04-26','8000.00000','0000-00-00','Online Booking'),
 (19,'sample1@gmail.com','2019-04-26 08:58:49','2019-04-26 08:56:39','2019-04-27 08:55:41','Cancelled','216237352','2019-04-26','4000.00000','2019-04-26','Online Booking'),
 (21,'skgnaybe16@yahoo.com','2019-04-26 13:43:45','2019-04-29 01:00:24','2019-04-30 01:00:34','Checked Out','1711197693','2019-04-26','14000.00000','2019-04-26','Online Booking'),
 (22,'Marivic Mitschek','2019-04-26 14:43:12','2019-04-26 00:00:00','2019-04-26 00:00:00','Checked Out','95487632','2019-04-26','6000.00000','2019-04-26','Walk In'),
 (23,'mrmitschek@dlsud.edu.ph','2019-04-26 14:58:09','2019-04-27 01:00:00','2019-04-28 01:00:56','Cancelled','891135327','2019-04-26','4500.00000','0000-00-00','Online Booking'),
 (24,'mrmitschek@dlsud.edu.ph','2019-04-26 14:59:44','2019-04-27 01:00:16','2019-04-30 01:00:28','Checked Out','1133101925','2019-04-26','2800.00000','0000-00-00','Online Booking'),
 (25,'mrmitschek@dlsud.edu.ph','2019-04-26 15:01:28','2019-04-27 01:00:05','2019-04-28 01:00:15','Checked Out','772846690','2019-04-26','0.00000','0000-00-00','Online Booking'),
 (26,'mrmitschek@dlsud.edu.ph','2019-04-26 15:02:03','2019-04-30 01:00:37','2019-05-01 01:00:47','Checked Out','790872544','2019-04-26','4000.00000','0000-00-00','Online Booking'),
 (27,'sample1@gmail.com','2019-04-28 02:24:35','2019-04-28 02:24:20','2019-05-01 12:00:18','Cancelled','1107721398','2019-04-28','4000.00000','2019-04-28','Online Booking'),
 (28,'sample1@gmail.com','2019-04-28 02:42:03','2019-04-28 02:41:02','2019-05-01 12:00:08','Cancelled','1575852720','2019-04-28','2000.00000','0000-00-00','Online Booking'),
 (29,'sample1@gmail.com','2019-04-28 02:43:03','2019-04-28 02:42:51','2019-05-03 12:00:56','Cancelled','876918508','2019-04-28','1500.00000','0000-00-00','Online Booking'),
 (30,'sample1@gmail.com','2019-04-28 02:44:19','2019-04-28 02:44:08','2019-05-03 12:00:13','Cancelled','977120192','2019-04-28','4000.00000','2019-04-28','Online Booking'),
 (32,'sample1@gmail.com','2019-05-03 22:20:01','2019-05-03 10:19:48','2019-05-05 12:00:50','Cancelled','897644387','2019-05-03','3000.00000','2019-05-03','Online Booking'),
 (31,'sample1@gmail.com','2019-05-03 22:18:38','2019-05-03 10:18:25','2019-05-05 12:00:28','Cancelled','1195211218','2019-05-03','8000.00000','0000-00-00','Online Booking'),
 (33,'sample1@gmail.com','2019-05-03 22:33:40','2019-05-03 10:33:06','2019-05-05 12:00:13','Cancelled','766399802','2019-05-03','8000.00000','2019-05-03','Online Booking'),
 (34,'sample1@gmail.com','2019-05-08 09:58:43','2019-05-08 09:58:34','2019-05-09 12:00:35','Checked Out','188779345','2019-05-08','8000.00000','2019-05-08','Online Booking'),
 (35,'sample1@gmail.com','2019-05-08 11:31:30','2019-05-08 11:31:24','2019-05-09 12:00:25','Cancelled','2070189815','2019-05-08','3000.00000','2019-05-08','Online Booking'),
 (36,'sample1@gmail.com','2019-05-08 11:57:18','2019-05-08 11:57:11','2019-05-10 12:00:13','Half Payment','1288980973','2019-05-08','8000.00000','2019-05-08','Online Booking'),
 (37,'sample1@gmail.com','2019-05-10 10:36:25','2019-05-15 12:00:30','2019-05-22 12:00:36','Checked Out','1951962818','2019-05-10','3000.00000','2019-05-17','Online Booking'),
 (38,'sample1@gmail.com','2019-05-17 08:22:53','2019-05-17 08:22:45','2019-05-19 12:20:46','Fully Payment','1418982979','2019-05-17','3000.00000','2019-05-17','Online Booking'),
 (39,'sample1@gmail.com','2019-05-17 08:31:52','2019-05-17 08:31:46','2019-05-19 12:00:47','Cancelled','121998876','2019-05-17','16000.00000','0000-00-00','Online Booking'),
 (40,'sample1@gmail.com','2019-05-17 09:27:52','2019-05-17 09:27:46','2019-05-19 12:00:48','Cancelled','457016759','2019-05-17','16000.00000','0000-00-00','Online Booking');
/*!40000 ALTER TABLE `tblbookpackages` ENABLE KEYS */;


--
-- Definition of table `tblcategories`
--

DROP TABLE IF EXISTS `tblcategories`;
CREATE TABLE `tblcategories` (
  `fldCategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `fldCategoryName` varchar(100) NOT NULL,
  `fldCategoryDeleted` tinyint(1) NOT NULL,
  `fldCategoryCreated` datetime NOT NULL,
  `fldCategoryModified` datetime NOT NULL,
  PRIMARY KEY (`fldCategoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategories`
--

/*!40000 ALTER TABLE `tblcategories` DISABLE KEYS */;
INSERT INTO `tblcategories` (`fldCategoryId`,`fldCategoryName`,`fldCategoryDeleted`,`fldCategoryCreated`,`fldCategoryModified`) VALUES 
 (1,'Rooms',0,'2019-02-16 18:41:51','2019-02-16 18:41:51'),
 (2,'Cottages',0,'2019-02-16 18:41:59','2019-02-16 18:41:59'),
 (3,'Amenities',0,'2019-02-16 18:50:32','2019-02-16 18:50:32'),
 (4,'Recreational Activities',0,'2019-02-16 18:50:39','2019-02-21 11:08:16'),
 (5,'Venues',0,'2019-02-21 09:54:04','2019-02-21 11:08:08'),
 (6,'Food',0,'2019-02-21 09:54:11','2019-02-21 10:31:54'),
 (7,'Trial',1,'2019-02-21 10:11:54','2019-02-21 10:14:12'),
 (8,'Testing',1,'2019-02-21 10:17:03','2019-02-21 10:17:10'),
 (9,'Sample',1,'2019-02-26 14:48:58','2019-02-26 14:49:02'),
 (10,'test',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (11,'1',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (12,'Test',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tblcategories` ENABLE KEYS */;


--
-- Definition of table `tblconfigs`
--

DROP TABLE IF EXISTS `tblconfigs`;
CREATE TABLE `tblconfigs` (
  `fldConfigId` int(11) NOT NULL AUTO_INCREMENT,
  `fldConfigName` varchar(255) NOT NULL,
  `fldConfigValue` varchar(255) NOT NULL,
  `fldConfigGlobal` tinyint(1) NOT NULL,
  `fldConfigType` varchar(255) NOT NULL,
  `fldConfigLabel` varchar(255) NOT NULL,
  `fldConfigDeleted` tinyint(1) NOT NULL,
  `fldConfigCreated` datetime NOT NULL,
  `fldConfigModified` datetime NOT NULL,
  PRIMARY KEY (`fldConfigId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblconfigs`
--

/*!40000 ALTER TABLE `tblconfigs` DISABLE KEYS */;
INSERT INTO `tblconfigs` (`fldConfigId`,`fldConfigName`,`fldConfigValue`,`fldConfigGlobal`,`fldConfigType`,`fldConfigLabel`,`fldConfigDeleted`,`fldConfigCreated`,`fldConfigModified`) VALUES 
 (1,'Door Charge','250',1,'Hidden','Door Charge per Person',0,'2019-02-17 00:00:00','2019-02-17 00:00:00'),
 (2,'Extra Mattress','250',1,'Hidden','Extra Mattress Charge',0,'2019-02-17 00:00:00','2019-02-17 00:00:00'),
 (3,'Reschedule Span','14',1,'Hidden','Rescheduling Span',0,'2019-02-17 00:00:00','2019-02-17 00:00:00');
/*!40000 ALTER TABLE `tblconfigs` ENABLE KEYS */;


--
-- Definition of table `tblcustomers`
--

DROP TABLE IF EXISTS `tblcustomers`;
CREATE TABLE `tblcustomers` (
  `fldCustomerId` int(11) NOT NULL AUTO_INCREMENT,
  `fldCustomerFirstname` varchar(60) NOT NULL,
  `fldCustomerLastname` varchar(60) NOT NULL,
  `fldCustomerEmail` varchar(60) NOT NULL,
  `fldCustomerMobile` varchar(20) NOT NULL,
  `fldCustomerDeleted` tinyint(1) NOT NULL,
  `fldCustomerCreated` datetime NOT NULL,
  `fldCustomerModified` datetime NOT NULL,
  `tblUsers_fldUserId` int(11) NOT NULL,
  PRIMARY KEY (`fldCustomerId`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcustomers`
--

/*!40000 ALTER TABLE `tblcustomers` DISABLE KEYS */;
INSERT INTO `tblcustomers` (`fldCustomerId`,`fldCustomerFirstname`,`fldCustomerLastname`,`fldCustomerEmail`,`fldCustomerMobile`,`fldCustomerDeleted`,`fldCustomerCreated`,`fldCustomerModified`,`tblUsers_fldUserId`) VALUES 
 (1,'John','Doe','sample1@gmail.com','09161111111',0,'2019-02-25 16:02:52','2019-02-25 16:02:52',2),
 (2,'asd','asd','sample12@gmail.com','09161111111',0,'2019-02-25 16:17:56','2019-02-25 16:17:56',3),
 (3,'Lorem','Ipsum','sample13@gmail.com','09161111111',0,'2019-02-28 18:55:51','2019-02-28 18:55:51',4),
 (4,'Rendell','Sampat','','09753359558',0,'2019-04-07 18:51:59','2019-04-07 18:51:59',2),
 (5,'Rendell','Sampat','','09753359558',0,'2019-04-07 18:55:38','2019-04-07 18:55:38',2),
 (6,'Rendell','Sampat','','09753359558',0,'2019-04-07 19:00:11','2019-04-07 19:00:11',2),
 (7,'Rendell','Sampat','','09753359558',0,'2019-04-07 19:00:26','2019-04-07 19:00:26',2),
 (8,'Rendell','Sampat','','09753359558',0,'2019-04-07 19:01:34','2019-04-07 19:01:34',2),
 (9,'Rendell','Sampat','','09753359558',0,'2019-04-07 19:02:08','2019-04-07 19:02:08',2),
 (10,'RENDELL','SAMPAT','','09753359558',0,'2019-04-07 19:05:24','2019-04-07 19:05:24',2),
 (11,'RendellKyut','Sampat','rsampat03945@gmail.com','9753359558',0,'2019-04-23 17:13:25','2019-04-23 17:13:25',2),
 (12,'Sean Kyle','Naybe','skgnaybe16@gmail.com','09268903475',0,'2019-04-25 08:52:57','2019-04-25 08:52:57',2),
 (17,'Marivic','Mitschek','','09222222222',0,'2019-04-26 14:43:12','2019-04-26 14:43:12',2),
 (14,'Rendell','Sampat','rsampat0394@gmail.com','+639753359558',0,'2019-04-25 19:15:59','2019-04-25 19:15:59',2),
 (15,'Sean Kyle','Naybe','skgnaybe16@gmail.com','09268903475',0,'2019-04-25 23:05:24','2019-04-25 23:05:24',2),
 (16,'Sean Kyle','Naybe','skgnaybe16@yahoo.com','09268903475',0,'2019-04-25 23:08:00','2019-04-25 23:08:00',2),
 (18,'Marivic','Mitschek','mrmitschek@dlsud.edu.ph','09222222222',0,'2019-04-26 14:55:33','2019-04-26 14:55:33',2);
/*!40000 ALTER TABLE `tblcustomers` ENABLE KEYS */;


--
-- Definition of table `tblgrants`
--

DROP TABLE IF EXISTS `tblgrants`;
CREATE TABLE `tblgrants` (
  `tblPermissions_fldPermissionId` int(11) NOT NULL,
  `tblRoles_fldRoleId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgrants`
--

/*!40000 ALTER TABLE `tblgrants` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblgrants` ENABLE KEYS */;


--
-- Definition of table `tblimages`
--

DROP TABLE IF EXISTS `tblimages`;
CREATE TABLE `tblimages` (
  `fldImageId` int(11) NOT NULL AUTO_INCREMENT,
  `fldImageName` varchar(100) NOT NULL,
  `fldImageDescription` text NOT NULL,
  `fldImagePath` varchar(100) NOT NULL,
  `fldImageDeleted` tinyint(1) NOT NULL,
  `fldImageCreated` datetime NOT NULL,
  `fldImageModified` datetime NOT NULL,
  PRIMARY KEY (`fldImageId`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblimages`
--

/*!40000 ALTER TABLE `tblimages` DISABLE KEYS */;
INSERT INTO `tblimages` (`fldImageId`,`fldImageName`,`fldImageDescription`,`fldImagePath`,`fldImageDeleted`,`fldImageCreated`,`fldImageModified`) VALUES 
 (1,'Pool Image','Greenfields Resort Pool Image','6927c9b9585ee758b30cb42e7590ace7.jpg',0,'2019-02-16 18:27:49','2019-02-16 18:27:49'),
 (2,'Pool Image 2','Greenfields Resort Pool Image 2','ca10a96ee5d7ea8baeec99b9c912a05f.jpg',0,'2019-02-16 18:28:36','2019-02-16 18:28:36'),
 (3,'Room Image','Greenfields Resort Room Image','c1c28d85a2576cc81347466d66af0ce0.jpg',0,'2019-02-16 18:29:28','2019-02-16 18:29:28'),
 (4,'Restroom Image','Greenfields Resort Restroom Image','9aaa48787351378bb68c04e1bab646a5.jpg',0,'2019-02-16 18:30:09','2019-02-16 18:30:09'),
 (5,'Room Image 2','Greenfields Resort Room Image 2','6dac12097b27749b32bc63917041af14.jpg',0,'2019-02-16 18:31:57','2019-02-16 18:31:57'),
 (6,'Restroom Image 2','Greenfields Resort Restroom Image 2','703ab6fd4f3653ab81c3783d1cbd6ddd.jpg',0,'2019-02-16 18:32:37','2019-02-16 18:32:37'),
 (7,'Pool Image 3','Greenfields Resort Pool Image 3','199051d738d0f98851b064d6dc0e78ae.jpg',0,'2019-02-16 18:33:16','2019-02-16 18:33:16'),
 (8,'Room Image 3','Greenfields Resort Room Image 3','f994f6aa2ee1c258f70cc191ddaa0f77.jpg',0,'2019-02-16 18:34:07','2019-02-16 18:34:07'),
 (9,'Events Place','Greenfields Resort Events Place','43db1e0ce6a5cb34489a64f0d2cadf6f.jpg',0,'2019-02-16 18:34:54','2019-02-16 18:34:54'),
 (10,'Room Image 4','Greenfields Resort Room Image 4','2e1197f67d9df4258e989e9425668c9e.jpg',0,'2019-02-16 18:35:37','2019-02-16 18:35:37'),
 (11,'Restroom Image 3','Greenfields Resort Restroom Image 3','ea551d27a6c51ef67bad900e22e0cefe.jpg',0,'2019-02-16 18:37:44','2019-02-16 18:37:44'),
 (12,'Sample','Sample','3cecbca78652071768f3b6066ba1bbaa.jpg',1,'2019-02-21 08:58:32','2019-02-21 09:31:05'),
 (13,'Sample','Banner','dfba7583f305f01fb661b31b3bee710d.jpg',1,'2019-02-21 08:59:20','2019-02-21 09:30:48'),
 (14,'Hacker','Hacker','d387c9d64866b3280a06eedb2cc47917.jpg',1,'2019-02-21 09:00:18','2019-02-21 09:27:42'),
 (15,'Sample','Sample','6afa31baa9f84af4b9879fa843103f2e.png',1,'2019-02-26 14:48:25','2019-02-26 14:48:38'),
 (18,'test','test','9znjqecltwf1hfkb042xd6a8yvurs3oig57m.jpg',1,'2019-03-25 22:32:59','2019-03-25 22:32:59'),
 (19,'test','test','5wa7tffu21e6b43jklczvgdyon89irs0qhxm.png',0,'2019-04-25 19:26:25','2019-04-25 19:26:25');
/*!40000 ALTER TABLE `tblimages` ENABLE KEYS */;


--
-- Definition of table `tblmodbookpackages`
--

DROP TABLE IF EXISTS `tblmodbookpackages`;
CREATE TABLE `tblmodbookpackages` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fldPackageId` varchar(45) DEFAULT NULL,
  `fldPackagePrice` decimal(12,5) DEFAULT NULL,
  `fldPackageName` varchar(45) DEFAULT NULL,
  `fldPackageQuantity` decimal(12,5) DEFAULT NULL,
  `fldPackageTotal` decimal(12,5) DEFAULT NULL,
  `Createdby` varchar(45) DEFAULT NULL,
  `BookDate` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmodbookpackages`
--

/*!40000 ALTER TABLE `tblmodbookpackages` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblmodbookpackages` ENABLE KEYS */;


--
-- Definition of table `tblmodpackagesproducts`
--

DROP TABLE IF EXISTS `tblmodpackagesproducts`;
CREATE TABLE `tblmodpackagesproducts` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CODE` varchar(45) DEFAULT '',
  `PRODUCTID` varchar(45) DEFAULT '',
  `DATECREATED` varchar(45) NOT NULL,
  `CREATEDBY` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmodpackagesproducts`
--

/*!40000 ALTER TABLE `tblmodpackagesproducts` DISABLE KEYS */;
INSERT INTO `tblmodpackagesproducts` (`ID`,`CODE`,`PRODUCTID`,`DATECREATED`,`CREATEDBY`) VALUES 
 (1,'PACK-1','4','2019-03-24 20:49:13','superadmin@gmail.com'),
 (2,'PACK-1','5','2019-03-24 20:49:13','superadmin@gmail.com');
/*!40000 ALTER TABLE `tblmodpackagesproducts` ENABLE KEYS */;


--
-- Definition of table `tblpackages`
--

DROP TABLE IF EXISTS `tblpackages`;
CREATE TABLE `tblpackages` (
  `fldPackageId` int(11) NOT NULL AUTO_INCREMENT,
  `fldPackageName` varchar(100) NOT NULL,
  `fldPackageDescription` text NOT NULL,
  `fldPackagePrice` varchar(11) NOT NULL,
  `fldPackageSucceeding` int(11) NOT NULL,
  `fldPackageDeleted` tinyint(1) NOT NULL,
  `fldPackageCreated` datetime NOT NULL,
  `CODE` varchar(45) DEFAULT NULL,
  `PRODUCTS` varchar(100) NOT NULL,
  PRIMARY KEY (`fldPackageId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpackages`
--

/*!40000 ALTER TABLE `tblpackages` DISABLE KEYS */;
INSERT INTO `tblpackages` (`fldPackageId`,`fldPackageName`,`fldPackageDescription`,`fldPackagePrice`,`fldPackageSucceeding`,`fldPackageDeleted`,`fldPackageCreated`,`CODE`,`PRODUCTS`) VALUES 
 (1,'Save and Relax Package','','16000',0,0,'2019-02-16 19:26:56',NULL,''),
 (2,'Couple\'s Package','','6000',0,0,'2019-02-16 19:31:47',NULL,''),
 (3,'Me-time Package','','5000',0,1,'2019-02-16 19:32:31',NULL,''),
 (4,'Asynchronous','<h2>Where does it come from?</h2>\n\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text.\nIt has roots in a piece of classical Latin literature from 45 BC, making it\nover 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney\nCollege in Virginia, looked up one of the more obscure Latin words,\nconsectetur, from a Lorem Ipsum passage, and going through the cites of the\nword in classical literature, discovered the undoubtable source. Lorem Ipsum\ncomes from sections 1.10.32 and 1.10.33 of \\\"de Finibus Bonorum et\nMalorum\\\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This\nbook is a treatise on the theory of ethics, very popular during the\nRenaissance. The first line of Lorem Ipsum, \\\"Lorem ipsum dolor sit\namet..\\\", comes from a line in section 1.10.32.</p><br>','14000',2500,0,'2019-02-21 13:26:47',NULL,''),
 (5,'PACKAGE1','                                                                                                TEST                                                                                        ','123',4,0,'2019-03-24 20:49:13','PACK-1','Billiards,Calesa'),
 (6,'test','test','10000',150,1,'2019-04-25 08:51:45','P01','');
/*!40000 ALTER TABLE `tblpackages` ENABLE KEYS */;


--
-- Definition of table `tblpackagesproducts`
--

DROP TABLE IF EXISTS `tblpackagesproducts`;
CREATE TABLE `tblpackagesproducts` (
  `fldPackageProductId` int(11) NOT NULL AUTO_INCREMENT,
  `fldPackageProductQuantity` int(11) NOT NULL,
  `fldPackageProductDeleted` tinyint(1) NOT NULL,
  `fldPackageProductCreated` datetime NOT NULL,
  `fldPackageProductModified` datetime NOT NULL,
  `tblPackages_fldPackageId` int(11) NOT NULL,
  `tblProducts_fldProductId` int(11) NOT NULL,
  `CODE` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`fldPackageProductId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpackagesproducts`
--

/*!40000 ALTER TABLE `tblpackagesproducts` DISABLE KEYS */;
INSERT INTO `tblpackagesproducts` (`fldPackageProductId`,`fldPackageProductQuantity`,`fldPackageProductDeleted`,`fldPackageProductCreated`,`fldPackageProductModified`,`tblPackages_fldPackageId`,`tblProducts_fldProductId`,`CODE`) VALUES 
 (1,1,0,'2019-02-16 19:26:56','2019-02-16 19:26:56',1,1,NULL),
 (2,1,0,'2019-02-16 19:26:56','2019-02-16 19:26:56',1,3,NULL),
 (3,1,0,'2019-02-16 19:26:56','2019-02-16 19:26:56',1,5,NULL),
 (4,1,0,'2019-02-16 19:26:56','2019-02-16 19:26:56',1,7,NULL),
 (5,1,0,'2019-02-16 19:31:47','2019-02-16 19:31:47',2,2,NULL),
 (6,1,0,'2019-02-16 19:31:47','2019-02-16 19:31:47',2,6,NULL),
 (7,1,0,'2019-02-16 19:31:47','2019-02-16 19:31:47',2,7,NULL),
 (8,1,0,'2019-02-16 19:32:31','2019-02-16 19:32:31',3,2,NULL),
 (9,1,0,'2019-02-21 13:26:47','2019-02-21 13:26:47',4,1,NULL),
 (10,1,0,'2019-02-21 13:26:47','2019-02-21 13:26:47',4,2,NULL);
/*!40000 ALTER TABLE `tblpackagesproducts` ENABLE KEYS */;


--
-- Definition of table `tblpermissions`
--

DROP TABLE IF EXISTS `tblpermissions`;
CREATE TABLE `tblpermissions` (
  `fldPermissionId` int(11) NOT NULL AUTO_INCREMENT,
  `fldPermissionName` varchar(255) NOT NULL,
  `fldPermissionGroup` varchar(255) NOT NULL,
  `fldPermissionDescription` varchar(255) NOT NULL,
  PRIMARY KEY (`fldPermissionId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpermissions`
--

/*!40000 ALTER TABLE `tblpermissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblpermissions` ENABLE KEYS */;


--
-- Definition of table `tblproducts`
--

DROP TABLE IF EXISTS `tblproducts`;
CREATE TABLE `tblproducts` (
  `fldProductId` int(11) NOT NULL AUTO_INCREMENT,
  `fldProductName` varchar(100) NOT NULL,
  `fldProductUnit` varchar(100) NOT NULL,
  `fldProductQuantity` int(11) NOT NULL,
  `fldProductDescription` text NOT NULL,
  `fldProductPrice` varchar(11) NOT NULL,
  `fldProductSucceeding` int(11) NOT NULL,
  `fldProductDeleted` tinyint(1) NOT NULL,
  `fldProductCreated` datetime NOT NULL,
  `fldProductModified` datetime NOT NULL,
  `tblCategories_fldCategoryId` int(11) NOT NULL,
  `IMAGES` varchar(100) NOT NULL,
  `fldProductCode` varchar(45) NOT NULL,
  PRIMARY KEY (`fldProductId`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproducts`
--

/*!40000 ALTER TABLE `tblproducts` DISABLE KEYS */;
INSERT INTO `tblproducts` (`fldProductId`,`fldProductName`,`fldProductUnit`,`fldProductQuantity`,`fldProductDescription`,`fldProductPrice`,`fldProductSucceeding`,`fldProductDeleted`,`fldProductCreated`,`fldProductModified`,`tblCategories_fldCategoryId`,`IMAGES`,`fldProductCode`) VALUES 
 (25,'Kings Room','Quantity',4,' Large room with TV.','4000',0,0,'2019-04-28 19:46:02','0000-00-00 00:00:00',1,'urh1i6jgekamxydlowbz87f35snv4c0fq2t9.jpg','R-104'),
 (24,'Rock Climbing','Hour',0,' Activity in which participants climb up, down or across natural rock formations.','6000',0,0,'2019-04-28 19:45:05','0000-00-00 00:00:00',4,'4oz0j6myfcvhgi9xl8f53rnu1wdsqa2bkt7e.jpg','R-101'),
 (23,'Zipline','Hour',0,'A zip line consists of a pulley suspended on a cable.','2800',0,0,'2019-04-28 19:42:24','0000-00-00 00:00:00',4,'v1dxhy5lu4cgwq80i3zfoejrs2n6t7k9bmfa.jpg','R-100'),
 (17,'Kings Room','Quantity',4,'Large room with TV','4000',0,0,'2019-04-28 19:31:21','0000-00-00 00:00:00',1,'9ut7q34o2ncryhd8wgibxmvj1e6alfkfz05s.jpg','R-101'),
 (18,'Peasants Room','Quantity',4,'A small room with solo size bed','2000',0,0,'2019-04-28 19:37:50','0000-00-00 00:00:00',1,'duqfe2r3ixa5hl04mb8sj91czkvf6o7wgnty.jpg','R-102'),
 (19,'Couples Deluxe','Quantity',2,'When looking for a luxury room for couples','3000',0,0,'2019-04-28 19:37:33','0000-00-00 00:00:00',1,'rwes5zo3l8gn6m9a1qtj2huykv07ff4cibxd.jpg','R-103'),
 (20,'Billiards','Hour',0,'Small room with a wide variety of games played','1600',0,0,'2019-04-28 19:38:57','0000-00-00 00:00:00',3,'slbzr9fqk3fgntm1647joyw2iha805xdeucv.jpg','A-100'),
 (21,'Calesa','Hour',0,'Ride with calesa','800',0,0,'2019-04-28 19:39:59','0000-00-00 00:00:00',3,'4rf1tjy5xg9nsacl36vwz07e8om2uqkbhidf.jpg','A-101'),
 (22,'Kubo (BIG)','Hour',0,' A big hut which can accommodate 15 persons.','1600',0,0,'2019-04-28 19:41:05','0000-00-00 00:00:00',2,'52ve4z9dkfolg8msxjhrwaf6ybuitn3170cq.jpg','C-100');
/*!40000 ALTER TABLE `tblproducts` ENABLE KEYS */;


--
-- Definition of table `tblproductsimages`
--

DROP TABLE IF EXISTS `tblproductsimages`;
CREATE TABLE `tblproductsimages` (
  `fldProductImageId` int(11) NOT NULL AUTO_INCREMENT,
  `fldProductImagePath` varchar(100) NOT NULL,
  `fldProductImageDeleted` tinyint(1) NOT NULL,
  `fldProductImageCreated` datetime NOT NULL,
  `fldProductImageModified` datetime NOT NULL,
  `tblProducts_fldProductId` int(11) NOT NULL,
  PRIMARY KEY (`fldProductImageId`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproductsimages`
--

/*!40000 ALTER TABLE `tblproductsimages` DISABLE KEYS */;
INSERT INTO `tblproductsimages` (`fldProductImageId`,`fldProductImagePath`,`fldProductImageDeleted`,`fldProductImageCreated`,`fldProductImageModified`,`tblProducts_fldProductId`) VALUES 
 (1,'d014f7e2b41f6587f0c1be9744f9c9bf.jpg',0,'2019-02-16 18:54:07','2019-02-16 18:54:07',1),
 (2,'c4703011042feccc8408e29e3f8a8c7d.jpg',0,'2019-02-16 18:56:07','2019-02-16 18:56:07',2),
 (3,'6b74da60dc26e9d3a7f566f7be4d16b6.jpg',0,'2019-02-16 18:59:56','2019-02-16 18:59:56',3),
 (4,'ae9f748ca7aa6c0d0c599fe4d438876a.jpg',0,'2019-02-16 19:01:12','2019-02-16 19:01:12',4),
 (5,'63e51d4794e03968c64b27d8bbdf31be.jpg',0,'2019-02-16 19:07:56','2019-02-16 19:07:56',5),
 (6,'f3f92011061634659a8b127768286ca5.jpg',0,'2019-02-17 00:00:00','2019-02-17 00:00:00',6),
 (7,'6f767ef361161a8c84b0842059931387.jpg',0,'2019-02-16 19:16:57','2019-02-16 19:16:57',7),
 (8,'41fa346ce9391a9e377f5cb479b35cb1.jpg',0,'2019-02-16 19:19:39','2019-02-16 19:19:39',8),
 (9,'3d6bcd68d56d0392ddd4a5fb7b20dc90.jpg',0,'2019-02-16 20:17:00','2019-02-16 20:17:00',9),
 (10,'4c001ef176b390cf29857c4df215e9ec.jpg',0,'2019-02-21 11:58:53','2019-02-21 11:58:53',10),
 (11,'d4ccf93220a1c0e5dfab8e8910875fd2.jpg',0,'2019-02-21 12:09:05','2019-02-21 12:09:05',11),
 (12,'d90a9bd1934cbe91db0988ee9fb495e3.jpg',0,'2019-02-26 14:49:49','2019-02-26 14:49:49',12);
/*!40000 ALTER TABLE `tblproductsimages` ENABLE KEYS */;


--
-- Definition of table `tblroles`
--

DROP TABLE IF EXISTS `tblroles`;
CREATE TABLE `tblroles` (
  `fldRoleId` int(11) NOT NULL AUTO_INCREMENT,
  `fldRoleName` varchar(60) NOT NULL,
  `fldRoleCreated` datetime NOT NULL,
  `fldRoleModified` datetime NOT NULL,
  `fldRoleDeleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`fldRoleId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblroles`
--

/*!40000 ALTER TABLE `tblroles` DISABLE KEYS */;
INSERT INTO `tblroles` (`fldRoleId`,`fldRoleName`,`fldRoleCreated`,`fldRoleModified`,`fldRoleDeleted`) VALUES 
 (1,'Administrator','2018-08-05 07:24:00','2018-08-05 07:24:00',0),
 (2,'Customer','2018-08-05 07:24:00','2018-08-05 07:24:00',0),
 (3,'','0000-00-00 00:00:00','0000-00-00 00:00:00',1),
 (4,'Receptionist','0000-00-00 00:00:00','0000-00-00 00:00:00',0);
/*!40000 ALTER TABLE `tblroles` ENABLE KEYS */;


--
-- Definition of table `tblusers`
--

DROP TABLE IF EXISTS `tblusers`;
CREATE TABLE `tblusers` (
  `fldUserId` int(11) NOT NULL AUTO_INCREMENT,
  `fldUserUsername` varchar(60) NOT NULL,
  `fldUserSalt` varchar(255) DEFAULT NULL,
  `fldUserPassword` varchar(255) NOT NULL,
  `fldUserPin` varchar(255) DEFAULT NULL,
  `fldUserPicture` varchar(255) DEFAULT NULL,
  `fldUserRememberToken` varchar(255) DEFAULT NULL,
  `fldUserStatus` varchar(45) NOT NULL,
  `fldUserLastLogin` datetime DEFAULT NULL,
  `fldUserLoginCount` int(11) DEFAULT NULL,
  `fldUserCreated` datetime NOT NULL,
  `fldUserModified` datetime NOT NULL,
  `fldUserDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `tblRoles_fldRoleId` int(11) DEFAULT NULL,
  PRIMARY KEY (`fldUserId`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

/*!40000 ALTER TABLE `tblusers` DISABLE KEYS */;
INSERT INTO `tblusers` (`fldUserId`,`fldUserUsername`,`fldUserSalt`,`fldUserPassword`,`fldUserPin`,`fldUserPicture`,`fldUserRememberToken`,`fldUserStatus`,`fldUserLastLogin`,`fldUserLoginCount`,`fldUserCreated`,`fldUserModified`,`fldUserDeleted`,`tblRoles_fldRoleId`) VALUES 
 (1,'superadmin@gmail.com',NULL,'4297f44b13955235245b2497399d7a93',NULL,NULL,NULL,'Active',NULL,NULL,'2019-02-16 18:22:10','2019-02-16 18:22:10',0,1),
 (2,'sample1@gmail.com',NULL,'4297f44b13955235245b2497399d7a93','3127',NULL,NULL,'Active',NULL,NULL,'2019-02-25 16:02:52','2019-02-25 16:03:56',0,2),
 (3,'sample12@gmail.com',NULL,'4297f44b13955235245b2497399d7a93','7291',NULL,NULL,'Pending',NULL,NULL,'2019-02-25 16:17:56','2019-02-25 16:17:58',1,2),
 (11,'sample2@gmail.com',NULL,'4297f44b13955235245b2497399d7a93',NULL,NULL,NULL,'Active',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,4),
 (12,'rsampat0394@gmail.com',NULL,'4297f44b13955235245b2497399d7a93','1683',NULL,NULL,'Pending',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,2),
 (18,'skgnaybe16@gmail.com',NULL,'4297f44b13955235245b2497399d7a93','6102',NULL,NULL,'Active',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,2),
 (14,'sample3@gmail.com',NULL,'e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,'Active',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,4),
 (15,'rsampat03945@gmail.com',NULL,'4297f44b13955235245b2497399d7a93','6870',NULL,NULL,'Pending',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,2),
 (19,'skgnaybe16@yahoo.com',NULL,'4297f44b13955235245b2497399d7a93','7146',NULL,NULL,'Active',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,2),
 (17,'sample4@gmail.com',NULL,'4297f44b13955235245b2497399d7a93',NULL,NULL,NULL,'Active',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',1,4),
 (20,'mrmitschek@dlsud.edu.ph',NULL,'4297f44b13955235245b2497399d7a93','7204',NULL,NULL,'Active',NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,2);
/*!40000 ALTER TABLE `tblusers` ENABLE KEYS */;


--
-- Definition of table `tblwalkinpackages`
--

DROP TABLE IF EXISTS `tblwalkinpackages`;
CREATE TABLE `tblwalkinpackages` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CREATEDBY` varchar(45) DEFAULT NULL,
  `DATECREATED` datetime DEFAULT NULL,
  `CHECKIN` date DEFAULT NULL,
  `CHECKOUT` date DEFAULT NULL,
  `STATUS` varchar(45) DEFAULT NULL,
  `REFERENCENO` varchar(45) DEFAULT NULL,
  `TOTAL` decimal(12,5) DEFAULT NULL,
  `DATEPAYMENT` date DEFAULT NULL,
  `TYPEOFTRANSACTION` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblwalkinpackages`
--

/*!40000 ALTER TABLE `tblwalkinpackages` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblwalkinpackages` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
