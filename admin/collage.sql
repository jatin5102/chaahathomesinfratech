-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: sg2nlmysql1plsk.secureserver.net    Database: admin_CapitalBoonPhP
-- ------------------------------------------------------
-- Server version	5.7.26-29-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `amenities_logo`
--

DROP TABLE IF EXISTS `amenities_logo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `amenities_logo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `logo` varchar(120) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amenities_logo`
--

LOCK TABLES `amenities_logo` WRITE;
/*!40000 ALTER TABLE `amenities_logo` DISABLE KEYS */;
INSERT INTO `amenities_logo` VALUES (1,'Security','amenities-logo-2023-07-24-07-19-55.jpg',1,'2023-07-24 12:19:55'),(2,'RO Water System','amenities-logo-2023-07-24-07-25-46.png',1,'2023-07-24 12:25:46'),(3,'Air Conditioned','amenities-logo-2023-07-24-07-26-00.png',1,'2023-07-24 12:26:00'),(4,'Fire Fighting Equipment','amenities-logo-2023-07-24-07-26-13.png',1,'2023-07-24 12:26:13'),(5,'Power Back Up','amenities-logo-2023-07-24-07-26-29.png',1,'2023-07-24 12:26:29'),(6,'Swimming Pool','amenities-logo-2023-07-24-07-26-41.png',1,'2023-07-24 12:26:41'),(7,'Club House','amenities-logo-2023-07-24-07-26-59.png',1,'2023-07-24 12:26:59'),(8,'Elevator','amenities-logo-2023-07-24-07-27-13.png',1,'2023-07-24 12:27:13'),(9,'Reserved Parking','amenities-logo-2023-07-24-07-27-27.png',1,'2023-07-24 12:27:27'),(10,'Park','amenities-logo-2023-07-24-07-27-36.png',1,'2023-07-24 12:27:36'),(11,'children play','amenities-logo-2023-08-16-04-54-33.png',1,'2023-08-16 04:54:33'),(12,'outdoor park','amenities-logo-2023-08-25-07-33-36.png',1,'2023-08-25 07:33:36');
/*!40000 ALTER TABLE `amenities_logo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `awards`
--

DROP TABLE IF EXISTS `awards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `awards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) NOT NULL,
  `date` text NOT NULL,
  `cat_img` varchar(255) NOT NULL,
  `cat_vdo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `awards`
--

LOCK TABLES `awards` WRITE;
/*!40000 ALTER TABLE `awards` DISABLE KEYS */;
INSERT INTO `awards` VALUES (1,'GTF Awards','2023-08-11','awards-1147832812.jpg,awards-1069387020.jpg,awards-1813433638.jpg,awards-1094526777.jpg','awards-82330419.mp4'),(2,'Cine Awards','2023-08-20','awards-1005926687.jpg,awards-1427048799.jpg','awards-7280284.mp4');
/*!40000 ALTER TABLE `awards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(225) NOT NULL,
  `subHeading` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(11000) NOT NULL,
  `blogDate` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `createdDate` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,'Testing','test','blog-1236272907.jpg','but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus Pag.','2023-08-17',1,'2023-08-23 07:11:36.675370'),(2,'sparrow developer','sp developer','blog-38009829.jpg','but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus Pag.','2023-08-24',1,'2023-08-23 07:11:36.675370'),(3,'technologies','head','blog-1054796116.jpg','but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus Pag.','2023-08-27',1,'2023-08-23 07:11:36.675370'),(4,'GTF tech ','GTF tech sub head','blog-1894658131.jpg','GTF tech description','2023-08-25',1,'2023-08-25 07:08:39.982645'),(5,'testingnew','newm','blog-873497582.png','In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. ','2023-08-26',1,'2023-08-25 07:25:43.314409');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Residential',1,'2023-07-19 11:57:24'),(2,'Commercial',1,'2023-07-19 11:57:49');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,29,'New Delhi',1,'2023-08-03 12:55:49'),(2,1,'himachal2',1,'2023-08-16 10:19:43'),(3,29,'rajan nagar',1,'2023-08-25 12:59:27'),(4,29,'South Ex',1,'2023-09-02 03:02:16');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_us`
--

LOCK TABLES `contact_us` WRITE;
/*!40000 ALTER TABLE `contact_us` DISABLE KEYS */;
INSERT INTO `contact_us` VALUES (4,'test','test@gmail.com',7845214578,'test',1,'2023-08-25 07:22:59');
/*!40000 ALTER TABLE `contact_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `developer`
--

DROP TABLE IF EXISTS `developer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `developer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `address` varchar(120) DEFAULT NULL,
  `about` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `developer`
--

LOCK TABLES `developer` WRITE;
/*!40000 ALTER TABLE `developer` DISABLE KEYS */;
INSERT INTO `developer` VALUES (1,'Adani','developer-logo-2023-08-04-08-16-54.jpg','','',1,'2023-08-08 17:34:00'),(2,'M3M','developer-logo-2023-08-04-08-17-11.jpg','','',1,'2023-08-04 11:47:11'),(3,'DLF','developer-logo-2023-08-04-08-17-25.jpg','','',1,'2023-08-04 11:47:25'),(4,'Godrej Properties','developer-logo-2023-08-04-08-17-54.jpg','','',1,'2023-08-04 11:47:54'),(5,'Mahagun','developer-logo-2023-08-04-08-18-34.jpg','','',1,'2023-08-04 11:48:34'),(6,'Eldeco','developer-logo-2023-08-04-08-18-50.jpg','','',1,'2023-08-04 11:48:50'),(7,'L & T  Reality','developer-logo-2023-08-04-08-19-11.jpg','','',1,'2023-08-04 11:49:11'),(8,'Antara','developer-logo-2023-08-04-08-19-41.jpg','','',1,'2023-08-04 11:49:41'),(9,'Max Estates','developer-logo-2023-08-04-08-19-55.jpg','','',1,'2023-08-04 11:49:55'),(10,'County','developer-logo-2023-08-08-06-26-05.jpg','A - 612, ','&lt;p&gt;using for about&#039;s desc&lt;/p&gt;',1,'2023-08-08 09:56:05'),(12,'dosti','developer-logo-2023-08-16-04-53-12.png','noida','Raheja Developers is one of the largest Real Estate companies in India established in the year 1990 by Mr. Navin M. Raheja. The company has always maintained path breaking status and has pioneered various firsts in India. From trend setting luxury housing to providing homes for the poorest section of Indian society, from India’s tallest skyscrapers to 165 acres of plotted township, from changing the way people shop to changing the way people work, We have achieved it all.',1,'2023-08-15 21:53:12'),(13,'rajan','developer-logo-2023-08-25-07-31-34.png','rajan nagar 123','In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. ',1,'2023-08-25 00:31:34');
/*!40000 ALTER TABLE `developer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobapplication`
--

DROP TABLE IF EXISTS `jobapplication`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobapplication` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `resume` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobapplication`
--

LOCK TABLES `jobapplication` WRITE;
/*!40000 ALTER TABLE `jobapplication` DISABLE KEYS */;
INSERT INTO `jobapplication` VALUES (1,'puneet','puneet@gmail.com','9889489483','Dot Net Developer','5 years','i have applied for the post of dotnet','jobapplication-1864736393.pdf','2023-08-12 14:08:44'),(2,'Vishal','vishal@gmail.com','9889484343','Dot Net Developer','2 year','scalable hola vishal admin','jobapplication-883836875.pdf','2023-08-12 14:13:07'),(3,'jacky','jacky@gmail.com','9889489483','SEO Analytics','2','I m applying for the post of seo analytics','jobapplication-26009642.pdf','2023-08-14 00:45:37'),(4,'test by gtf','gtf@gmail.com','9999999999','graphic','4','testing','jobapplication-1226851752.docx','2023-08-15 22:33:57'),(5,'Sanjay dixit','sanjaydixit@gmail.com','98994894948','Graphics Designer','3','hi i applied for the post of graphics designer','jobapplication-643491323.pdf','2023-08-16 02:18:52'),(6,'sam','sam@gmail.com','98998948393','Dot Net Developer','3','hi i applied for the post','jobapplication-1006501757.pdf','2023-08-16 03:22:17'),(7,'test','ravi.thakur@gmail.com','8745214578','add','6','test','jobapplication-1451248117.pdf','2023-08-25 00:27:57');
/*!40000 ALTER TABLE `jobapplication` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locality`
--

DROP TABLE IF EXISTS `locality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locality`
--

LOCK TABLES `locality` WRITE;
/*!40000 ALTER TABLE `locality` DISABLE KEYS */;
INSERT INTO `locality` VALUES (1,1,'Abhay Garden',1,'2023-08-08 05:47:56'),(2,1,'Ajit Nagar',1,'2023-08-08 05:48:01'),(3,1,'Ajit Vihar',1,'2023-08-08 05:48:06'),(4,1,'Akshardham',1,'2023-08-08 05:48:14'),(5,1,'Arjun Nagar',1,'2023-08-08 05:48:21'),(6,1,'Arjun Vihar',1,'2023-08-08 05:48:28'),(7,1,'Aruna Nagar',1,'2023-08-08 05:48:35'),(8,1,'Arya Nagar',1,'2023-08-08 05:48:41'),(9,1,'Babu Nagar',1,'2023-08-08 05:48:47'),(10,1,'Balbir Nagar',1,'2023-08-08 05:48:53'),(11,1,'Civil Lines',1,'2023-08-08 05:49:02'),(12,1,'Dwarka',1,'2023-08-08 05:49:08'),(14,3,'rlocation',1,'2023-08-25 12:59:54');
/*!40000 ALTER TABLE `locality` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'admin@gmail.com','admin','2023-08-18 06:49:32'),(2,'test@gmail.com','admin','2023-08-18 07:02:36');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `micro_site`
--

DROP TABLE IF EXISTS `micro_site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `micro_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `developer_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `locality_id` int(11) NOT NULL,
  `page_url` varchar(500) NOT NULL,
  `title` varchar(150) NOT NULL,
  `keyword` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `project_brochure` varchar(200) NOT NULL,
  `name` varchar(130) NOT NULL,
  `address` varchar(250) NOT NULL,
  `payment_plan` varchar(100) DEFAULT NULL,
  `rera_no` varchar(100) NOT NULL,
  `complitaion_date` date NOT NULL,
  `project_ivr_no` bigint(12) NOT NULL,
  `whatapp_no` bigint(12) NOT NULL,
  `hot_project` tinyint(1) DEFAULT '0',
  `emi_cal_status` tinyint(1) DEFAULT '1',
  `releated_id` varchar(100) DEFAULT '0',
  `near_sale_id` varchar(100) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `micro_site`
--

LOCK TABLES `micro_site` WRITE;
/*!40000 ALTER TABLE `micro_site` DISABLE KEYS */;
INSERT INTO `micro_site` VALUES (1,3,1,1,3,29,1,1,'','Birla Navya Avik Sector 63A, Golf Course Ext., Gurgaon, 3/4 BHK Low Rise Residences | Hunting Hut','harset=utf-8','Introducing Premium Floor Residences at Avik by Birla Navya. These homes offer more than enough space for your dreams. So much so that abundance no longer feels like a luxury. Having the floor to yourself that offers the restful silence of a library, and the open windows usher in the sun&amp;#39;s warm','microsite-projects-brochure-2023-08-08-02-32-17.pdf','Birla Navya Avik','Sector 63A, Golf Course Extension, Gurgaon, Gurgaon','5crs','p685Il238fM','2023-08-18',8800126597,2200505684,1,1,'2,3,10','2,4,8,11',1,'2023-09-02 10:17:18'),(2,6,1,1,1,29,1,3,'','Sliver Glades, The Melia | Hunting Hut','shortcut icon','Silverglades The Melia in Sohna, Gurgaon is a ready-to-move housing society. It offers apartments in varied budget ranges. These units are a perfect combination of comfort and style, specifically designed to suit your requirements and conveniences. There are 2,3 4 BHK Apartments available in this pr','microsite-projects-brochure-2023-08-09-06-54-12.png','THE MELIA','Sohna, Gurgaon, Gurgaon','20 : 22 : 20','fd432fd321','2023-08-18',96254875192,96251942578,0,1,NULL,NULL,1,'2023-08-28 05:07:17'),(3,6,1,1,1,29,1,5,'','Godrej Prima, Okhla Delhi - Luxury 2/3/4 BHK Residences | Price List &amp; Floor Plan | Godrej Prima Brochure | Hunting Hut',' introduces its first gated','Godrej Properties introduces its first gated enclave in Delhi, Godrej Prima in Okhla. Soon to stand as one of the tallest residential towers in South Delhi, it is centrally located with great connectivity and comes with the lifestyle amenities you seek in a modern development. Take our boutique club','microsite-projects-brochure-2023-08-09-07-12-07.png','Godrej South Estate Prima','Delhi, Delhi','20 : 20 : 28','p93dp2248ll5f','2023-08-16',8800154299,5548769213,1,1,NULL,NULL,1,'2023-08-21 07:05:53'),(4,6,2,6,2,29,1,7,'','Omaxe Chandni Chowk Delhi | Omaxe Project Chandni Chowk - Omaxe Project | Hunting Hut','Chandni Chowk Delhi |','Omaxe Chandni Chowk Offers Best Retails Shops, Food Court  Commercial Spaces  Multi-level Car Parking. Give wings to your business! Explore the most strategic retail shops at Omaxe Chandni Chowk! Omaxe Ltd &amp; one of the smartest real estate players in NCR have intelligently designed the commercial sp','microsite-projects-brochure-2023-08-09-07-20-51.png','Omaxe Chandni Chowk','Chandni Chowk, Delhi, Delhi','30 : 30 : 58','9gfds95fd35','2023-08-24',8800151962,5500246921,1,0,NULL,NULL,1,'2023-08-28 05:06:58'),(5,3,2,6,3,29,1,8,'','Tarc Tripundra  Delhi - Pushpanjali Enclave | Hunting Hut',' Delhi. Step into ','Experience the epitome of opulence within the exquisite abodes of Tripundra. These luxurious residences are meticulously crafted to enhance your personal sanctuary, providing an unparalleled sense of belonging in the thriving neighbourhood of New Delhi. Step into a realm of elegantly designed spaces','microsite-projects-brochure-2023-08-09-07-36-27.png','Tarc Tripundra','','45 : 45 : 20','p8765jhgf54','2023-08-24',8800112536,5879654872,1,0,'1,3,5','2,4',1,'2023-08-28 05:06:58'),(8,12,1,5,3,1,2,0,'','a','a','a','microsite-projects-brochure-2023-08-16-05-11-43.pdf','test new one','noida','20:20:60','sdfdasfsdfdsfd','2023-08-30',9898989898,9999999999,1,1,'1,2,4,8','1,3',1,'2023-08-28 05:06:59'),(10,2,1,1,1,29,1,12,'','Sahni Developers','sahni developers, property in delhi, property in west delhi','sahni developers, property in delhi, property in west delhi','','Sahni Homes','Dwarka Sec 21','45:55:65','GIG/EDI/95587745822','2023-08-25',9910537889,9910537889,0,1,'10','10',1,'2023-08-24 10:13:42'),(11,13,1,8,3,29,3,14,'','rajan','rajan ','rajan','microsite-projects-brochure-2023-08-25-07-35-51.pdf','rajan project one','sector - 2, noida','20:50:30','784512457895','2023-08-26',8888888852,7845124578,0,1,'1,2,4','3',1,'2023-08-28 04:56:02'),(12,13,2,6,2,29,3,14,'','shanti niketan','shanti niketan','shanti niketan','microsite-projects-brochure-2023-08-29-08-43-38.pdf','shanti niketan','sector - 146','20:40:20','psmndk7874514548','2023-08-30',7854124581,1254874512,0,1,'5,8,10','5,8,10',1,'2023-08-29 11:43:39'),(13,3,1,2,3,29,1,7,'aigin-royal','','','','','Aigin Royal','Address','10 : 10 : 20','p8568158d688d','2023-09-15',9658748595,9658478965,0,1,'0','0',1,'2023-09-04 05:29:45');
/*!40000 ALTER TABLE `micro_site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `micro_site_amenities`
--

DROP TABLE IF EXISTS `micro_site_amenities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `micro_site_amenities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `amenities_logo_id` varchar(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `micro_site_amenities`
--

LOCK TABLES `micro_site_amenities` WRITE;
/*!40000 ALTER TABLE `micro_site_amenities` DISABLE KEYS */;
INSERT INTO `micro_site_amenities` VALUES (1,1,'10,9,8,6,4,',1,'2023-08-08 19:37:02'),(2,2,'10,9,7,3,1',1,'2023-08-09 11:58:10'),(3,3,'10,8,6,4,2,',1,'2023-08-09 12:14:53'),(4,4,'10,9,8,7,3,',1,'2023-08-09 12:22:43'),(5,5,'10,9,7,4,2,',1,'2023-08-09 12:38:33'),(6,8,'10,9,8,7,6,',1,'2023-08-16 05:23:22'),(7,10,'8,7,6,5,4,3',1,'2023-08-24 10:06:49'),(8,11,'11',1,'2023-08-25 09:14:16'),(9,12,'12,9,8,5',1,'2023-08-29 11:42:46');
/*!40000 ALTER TABLE `micro_site_amenities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `micro_site_banner`
--

DROP TABLE IF EXISTS `micro_site_banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `micro_site_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `win_images` text NOT NULL,
  `win_video` varchar(150) NOT NULL,
  `win_video_url` text NOT NULL,
  `mb_image` text NOT NULL,
  `mb_video` varchar(150) NOT NULL,
  `mb_video_url` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `micro_site_banner`
--

LOCK TABLES `micro_site_banner` WRITE;
/*!40000 ALTER TABLE `micro_site_banner` DISABLE KEYS */;
INSERT INTO `micro_site_banner` VALUES (1,1,'banner-win-image-602-08-08-2023-02-33-26.jpg,banner-win-image-138-08-08-2023-02-33-26.jpg,banner-win-image-16-08-08-2023-02-33-26.jpg,banner-win-image-536-08-08-2023-02-33-26.jpg','','saf','banner-win-image-910-08-08-2023-02-33-26.jpg,banner-win-image-99-08-08-2023-02-33-26.jpg,banner-win-image-922-08-08-2023-02-33-26.jpg,banner-win-image-653-08-08-2023-02-33-26.jpg','','saf',1,'2023-08-08 19:33:26'),(2,2,'banner-win-image-701-09-08-2023-06-56-13.jpg,banner-win-image-863-09-08-2023-06-56-13.jpg,banner-win-image-139-09-08-2023-06-56-13.jpg,banner-win-image-905-09-08-2023-06-56-13.jpg,banner-win-image-338-09-08-2023-06-56-13.jpg','','sad','banner-win-image-42-09-08-2023-06-56-13.jpg,banner-win-image-570-09-08-2023-06-56-13.jpg,banner-win-image-373-09-08-2023-06-56-13.jpg,banner-win-image-406-09-08-2023-06-56-13.jpg,banner-win-image-781-09-08-2023-06-56-13.jpg','','sad',1,'2023-08-09 11:56:13'),(3,3,'banner-win-image-205-09-08-2023-07-13-07.jpg,banner-win-image-54-09-08-2023-07-13-07.jpg,banner-win-image-721-09-08-2023-07-13-07.jpg,banner-win-image-195-09-08-2023-07-13-07.jpg,banner-win-image-678-09-08-2023-07-13-07.jpg,banner-win-image-195-09-08-2023-07-13-07.jpg','','sad','banner-win-image-917-09-08-2023-07-13-07.jpg,banner-win-image-399-09-08-2023-07-13-07.jpg,banner-win-image-382-09-08-2023-07-13-07.jpg,banner-win-image-226-09-08-2023-07-13-07.jpg,banner-win-image-956-09-08-2023-07-13-07.jpg,banner-win-image-24-09-08-2023-07-13-07.jpg','','sad',1,'2023-08-09 12:13:07'),(4,4,'banner-win-image-65-09-08-2023-07-21-23.jpg,banner-win-image-535-09-08-2023-07-21-23.jpg,banner-win-image-590-09-08-2023-07-21-23.jpg,banner-win-image-13-09-08-2023-07-21-23.jpg','','sad','banner-win-image-603-09-08-2023-07-21-23.jpg,banner-win-image-972-09-08-2023-07-21-23.jpg,banner-win-image-119-09-08-2023-07-21-23.jpg,banner-win-image-552-09-08-2023-07-21-23.jpg','','sad',1,'2023-08-09 12:21:23'),(5,5,'banner-win-image-507-09-08-2023-07-36-55.jpg,banner-win-image-335-09-08-2023-07-36-55.jpg,banner-win-image-937-09-08-2023-07-36-55.jpg,banner-win-image-197-09-08-2023-07-36-55.jpg,banner-win-image-160-09-08-2023-07-36-55.jpg,banner-win-image-56-09-08-2023-07-36-55.jpg','','sad','banner-win-image-582-09-08-2023-07-36-55.jpg,banner-win-image-773-09-08-2023-07-36-55.jpg,banner-win-image-39-09-08-2023-07-36-55.jpg,banner-win-image-124-09-08-2023-07-36-55.jpg,banner-win-image-436-09-08-2023-07-36-55.jpg,banner-win-image-814-09-08-2023-07-36-55.jpg','','sad',1,'2023-08-09 12:36:55'),(6,8,'banner-win-image-270-16-08-2023-05-17-40.jpg,banner-win-image-635-16-08-2023-05-17-40.jpg','','','banner-win-image-975-16-08-2023-05-17-40.jpg,banner-win-image-906-16-08-2023-05-17-40.jpg','','',1,'2023-08-16 05:17:40'),(7,10,'banner-win-image-767-29-08-2023-05-01-39.jpg,banner-win-image-198-29-08-2023-05-01-39.jpg,banner-win-image-427-29-08-2023-05-01-39.jpg,banner-win-image-400-29-08-2023-05-01-39.jpg','','','banner-win-image-530-29-08-2023-05-01-39.jpg,banner-win-image-976-29-08-2023-05-01-39.jpg,banner-win-image-562-29-08-2023-05-01-39.jpg,banner-win-image-813-29-08-2023-05-01-39.jpg','','',1,'2023-08-29 05:01:39'),(8,11,'','banner-win-video-926-28-08-2023-04-51-44.mp4','','banner-win-image-453-25-08-2023-07-38-38.jpg,banner-win-image-961-25-08-2023-07-38-38.jpg','banner-win-video-790-25-08-2023-09-45-35.mp4','',1,'2023-08-28 04:51:44'),(9,12,'banner-win-image-45-29-08-2023-08-46-09.jpg','banner-win-video-608-29-08-2023-08-45-24.mp4','','banner-win-image-993-29-08-2023-08-45-24.jpg,banner-win-image-102-29-08-2023-08-45-24.jpg','','',1,'2023-08-29 08:46:09');
/*!40000 ALTER TABLE `micro_site_banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `micro_site_builder`
--

DROP TABLE IF EXISTS `micro_site_builder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `micro_site_builder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `total_project` int(10) NOT NULL,
  `com_project` int(10) NOT NULL,
  `con_project` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `micro_site_builder`
--

LOCK TABLES `micro_site_builder` WRITE;
/*!40000 ALTER TABLE `micro_site_builder` DISABLE KEYS */;
INSERT INTO `micro_site_builder` VALUES (1,5,'',12,2,10,1,'2023-08-16 11:47:14'),(2,11,'',200,14,2,1,'2023-08-25 09:11:13'),(3,8,'',100,60,40,1,'2023-08-26 12:25:57');
/*!40000 ALTER TABLE `micro_site_builder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `micro_site_floorplan`
--

DROP TABLE IF EXISTS `micro_site_floorplan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `micro_site_floorplan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `bhk` varchar(255) NOT NULL,
  `customBHK` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `emi` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `micro_site_floorplan`
--

LOCK TABLES `micro_site_floorplan` WRITE;
/*!40000 ALTER TABLE `micro_site_floorplan` DISABLE KEYS */;
INSERT INTO `micro_site_floorplan` VALUES (1,1,'floorPlan-397915849.png','2',' + Study','632','25 L','001',1,'2023-08-25 04:32:33'),(2,1,'floorPlan-2117066421.png','3','+ Custom','1400','3 Cr','002',1,'2023-08-25 04:32:34'),(3,2,'floorPlan-689019589.png','2','+ Play','878','1350','003',1,'2023-08-09 12:04:50'),(4,2,'floorPlan-544124301.png','3','+ a','1750','1.35 Cr','004',1,'2023-08-09 12:05:20'),(5,3,'floorPlan-1214258097.png','2','+ new ','2266 ','3.52','005',1,'2023-08-09 12:16:00'),(6,3,'floorPlan-1100885548.png','3','+ library','3095','8.05 ','006',1,'2023-08-09 12:17:03'),(7,4,'floorPlan-13484416.png','2','432','256','54.00 ','007',1,'2023-08-09 12:24:05'),(8,5,'floorPlan-1197352275.png','1.5','1.5 + study','658','5.5 L','008',1,'2023-08-09 12:39:25'),(9,8,'floorPlan-1749422897.jpg','2.5','Study','1280','30','',1,'2023-08-16 05:25:14'),(10,8,'floorPlan-586727198.jpg','3','3 BHK + Study','1800','2.5 CR*','',1,'2023-08-16 06:11:32'),(16,10,'floorPlan-323002072.png','1','study','989','35 Lakh','',1,'2023-08-26 07:06:19'),(17,10,'floorPlan-1248616423.png','2.5','','989','989900000','',1,'2023-08-26 07:08:27'),(18,10,'floorPlan-1689445311.png','3','Study','9830','98000000','',1,'2023-08-26 07:07:01'),(21,11,'floorPlan-1312895526.jpg','3','Study','1800','10 L','',1,'2023-08-26 06:26:53'),(22,11,'floorPlan-29614244.jpg','1','','800','4 L','',1,'2023-08-28 05:00:17'),(23,12,'floorPlan-677329427.jpg','2','','1280','2 Cr','',1,'2023-08-29 11:43:18');
/*!40000 ALTER TABLE `micro_site_floorplan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `micro_site_highlights`
--

DROP TABLE IF EXISTS `micro_site_highlights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `micro_site_highlights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `meter` varchar(20) NOT NULL,
  `destination` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `micro_site_highlights`
--

LOCK TABLES `micro_site_highlights` WRITE;
/*!40000 ALTER TABLE `micro_site_highlights` DISABLE KEYS */;
INSERT INTO `micro_site_highlights` VALUES (1,5,'','In brief, we are NOT your “average” real',1,'2023-08-16 11:52:37'),(2,5,'','We provide services for diverse type of real estate transactions like residential, commercial & more',1,'2023-08-16 11:52:37'),(3,1,'','ID proof\'\'s',1,'2023-08-22 07:19:04'),(4,1,'','multiple\'s testing',1,'2023-08-22 07:19:52'),(5,1,'','local\'s',1,'2023-08-22 07:19:52'),(6,10,'','Nearby City Square Pacific Mall',1,'2023-08-24 10:00:30'),(7,10,'','Fatest Lift Services 15 Floor in 20 Sec',1,'2023-08-24 10:00:30'),(8,10,'','ITUS Technical University',1,'2023-08-24 10:00:30'),(9,10,'','Government college',1,'2023-08-24 10:00:30'),(10,11,'','one1',1,'2023-08-25 09:06:38'),(11,11,'','two2',1,'2023-08-25 09:06:38'),(12,12,'','test',1,'2023-08-29 11:39:53'),(13,12,'','test',1,'2023-08-29 11:39:53'),(14,12,'','test',1,'2023-08-29 11:39:53'),(15,12,'','test',1,'2023-08-29 11:39:53');
/*!40000 ALTER TABLE `micro_site_highlights` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `micro_site_location`
--

DROP TABLE IF EXISTS `micro_site_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `micro_site_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `iframe` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `micro_site_location`
--

LOCK TABLES `micro_site_location` WRITE;
/*!40000 ALTER TABLE `micro_site_location` DISABLE KEYS */;
INSERT INTO `micro_site_location` VALUES (1,1,'location-img-284-29-08-2023-12-03-30.png','',1,'2023-08-29 12:03:30'),(2,2,'location-img-284-29-08-2023-12-03-30.png','',1,'2023-08-29 12:03:30'),(3,3,'location-img-284-29-08-2023-12-03-30.png','',1,'2023-08-29 12:03:30'),(4,4,'location-img-284-29-08-2023-12-03-30.png','',1,'2023-08-29 12:03:30'),(5,5,'location-img-284-29-08-2023-12-03-30.png','',1,'2023-08-29 12:03:30'),(6,8,'location-img-284-29-08-2023-12-03-30.png','',1,'2023-08-29 12:03:30'),(7,10,'location-img-284-29-08-2023-12-03-30.png','',1,'2023-08-29 12:03:30'),(8,12,'','',1,'2023-08-29 12:04:01');
/*!40000 ALTER TABLE `micro_site_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `micro_site_location_list`
--

DROP TABLE IF EXISTS `micro_site_location_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `micro_site_location_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `meter` varchar(20) NOT NULL,
  `destination` varchar(180) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `micro_site_location_list`
--

LOCK TABLES `micro_site_location_list` WRITE;
/*!40000 ALTER TABLE `micro_site_location_list` DISABLE KEYS */;
INSERT INTO `micro_site_location_list` VALUES (1,8,'2.5 Km','Testing',1,'2023-08-16 05:22:24'),(2,8,'4.5Km','test',1,'2023-08-16 05:22:52'),(7,12,'1.2 KM','atsdagsjfs',1,'2023-08-29 11:42:15'),(8,12,'2','zxcxczxc',1,'2023-08-29 11:42:15'),(9,1,'2 KM ','Parkig',1,'2023-09-01 11:04:38'),(10,1,'3 KM','Hospital',1,'2023-09-01 11:04:38');
/*!40000 ALTER TABLE `micro_site_location_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `micro_site_overview`
--

DROP TABLE IF EXISTS `micro_site_overview`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `micro_site_overview` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `price` varchar(100) NOT NULL,
  `sold_price` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `total_unit` varchar(80) NOT NULL,
  `available` varchar(80) NOT NULL,
  `sold_unit` varchar(80) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `micro_site_overview`
--

LOCK TABLES `micro_site_overview` WRITE;
/*!40000 ALTER TABLE `micro_site_overview` DISABLE KEYS */;
INSERT INTO `micro_site_overview` VALUES (1,1,' 3.36 Crs -',' 3.36 Crs -','Introducing Premium Floor Residences at Avik by Birla Navya. These homes offer more than enough space for your dreams. So much so that abundance no longer feels like a luxury. Having the floor to yourself that offers the restful silence of a library, and the open windows usher in the sun warm rays, making your home the perfect sanctum for you and your loved ones.','4.00 ','4.00 ','4.00 ',1,'2023-08-08 19:34:45'),(2,2,' 1.03 Crs','1.85 Crs','Silverglades The Melia in Sohna, Gurgaon is a ready-to-move housing society. It offers apartments in varied budget ranges. These units are a perfect combination of comfort and style, specifically designed to suit your requirements and conveniences. There are 2, 3 & 4 BHK Apartments available in this project. This housing society is now ready to be called home as families have started moving in. Check out some of the features of Silverglades The Melia housing society:','233','22','11',1,'2023-08-09 11:57:00'),(3,3,'3.52 ','Lac','Godrej Properties introduces its first gated enclave in Delhi, Godrej Prima in Okhla. Soon to stand as one of the tallest residential towers in South Delhi, it is centrally located with great connectivity and comes with the lifestyle amenities you seek in a modern development. Take our boutique clubhouse for instance, it comes with indulgent and active lifestyle amenities, like a state-of-the-art fitness studio managed by Ramona Braganza, spa by Elle, a squash court, a lagoon-style pool, etc. We have designed it to take care of every single detail, including the air you breathe. We offer holistic air purification systems, both inside the residences and in the landscape area of Godrej Prima.','43','23','32',1,'2023-08-09 12:13:50'),(4,4,'54.00 ','54.00 ','Omaxe Chandni Chowk Offers Best Retails Shops, Food Court & Commercial Spaces & Multi-level Car Parking. Give wings to your business! Explore the most strategic retail shops at Omaxe Chandni Chowk! Omaxe Ltd – one of the smartest real estate players in NCR have intelligently designed the commercial spaces at Katra Neel Chandni Chowk under this new commercial project. Aim is to offer you with possibilities to widen your businesses at this commercial centre of Old Delhi. This place is known to be the heart centre of the city well connected with other localities. Loaded with plethora of smart amenities, this new commercial project is spread over 4.6 Acres. You will be amazed with the ample parking space availability at the project amidst plush locality. Good Quality Amenities to Support Your Businesses.','123','123','123',1,'2023-08-09 12:21:58'),(5,5,'32','23','Experience the epitome of opulence within the exquisite abodes of Tripundra. These luxurious residences are meticulously crafted to enhance your personal sanctuary, providing an unparalleled sense of belonging in the thriving neighbourhood of New Delhi. Step into a realm of elegantly designed spaces that seamlessly align with your desires for comfort and functionality, adapting effortlessly to your individual taste and preferences. This extraordinary haven redefines the essence of luxury living, offering a harmonious fusion of lavishness and sophistication. Immerse yourself in a myriad of exclusive encounters tailored to cater to every generation&amp;s diverse needs and interests.','22','11','33',1,'2023-08-09 12:37:55'),(6,8,'','','Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','','','',1,'2023-08-16 05:19:55'),(7,10,'','','Here is an overview of how Adrafinil increases levels of key neurotransmitters in the brain: Dopamine: Adrafinil may increase total brain dopamine levels inhibiting the reuptake of dopamine, and promoting the release of dopamine from nerve cells','','','',1,'2023-08-24 09:58:54'),(8,11,'','','In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. ','','','',1,'2023-08-25 09:07:50'),(9,12,'','','It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','','','',1,'2023-08-29 11:39:25');
/*!40000 ALTER TABLE `micro_site_overview` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `micro_site_price_insight`
--

DROP TABLE IF EXISTS `micro_site_price_insight`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `micro_site_price_insight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `price_cr` varchar(80) NOT NULL,
  `price_am` varchar(80) NOT NULL,
  `price_sq` varchar(20) NOT NULL,
  `sold_cr` varchar(80) NOT NULL,
  `sold_am` varchar(80) NOT NULL,
  `sold_sq` varchar(20) NOT NULL,
  `estimate_cr` varchar(80) NOT NULL,
  `estimate_am` varchar(80) NOT NULL,
  `estimate_sq` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `micro_site_price_insight`
--

LOCK TABLES `micro_site_price_insight` WRITE;
/*!40000 ALTER TABLE `micro_site_price_insight` DISABLE KEYS */;
/*!40000 ALTER TABLE `micro_site_price_insight` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `micro_site_price_list`
--

DROP TABLE IF EXISTS `micro_site_price_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `micro_site_price_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `years` int(5) NOT NULL,
  `quartly` varchar(20) NOT NULL,
  `price_per_sq` varchar(25) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `current_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `micro_site_price_list`
--

LOCK TABLES `micro_site_price_list` WRITE;
/*!40000 ALTER TABLE `micro_site_price_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `micro_site_price_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `micro_site_transaction`
--

DROP TABLE IF EXISTS `micro_site_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `micro_site_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `sold_price` varchar(80) NOT NULL,
  `registry_date` varchar(20) NOT NULL,
  `area` varchar(60) NOT NULL,
  `floor` varchar(80) NOT NULL,
  `price` varchar(80) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `micro_site_transaction`
--

LOCK TABLES `micro_site_transaction` WRITE;
/*!40000 ALTER TABLE `micro_site_transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `micro_site_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projectstatus`
--

DROP TABLE IF EXISTS `projectstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projectstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `createdDate` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projectstatus`
--

LOCK TABLES `projectstatus` WRITE;
/*!40000 ALTER TABLE `projectstatus` DISABLE KEYS */;
INSERT INTO `projectstatus` VALUES (1,'Ready To Move',1,'2023-07-19 12:02:59.338872'),(2,'Under Construction',1,'2023-07-19 12:02:59.603302'),(3,'New Launch',1,'2023-07-19 12:02:59.851844');
/*!40000 ALTER TABLE `projectstatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property`
--

DROP TABLE IF EXISTS `property`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property`
--

LOCK TABLES `property` WRITE;
/*!40000 ALTER TABLE `property` DISABLE KEYS */;
INSERT INTO `property` VALUES (1,'1','Residential Apartment','2023-08-04 13:32:38'),(2,'1','Independent House/Villa','2023-08-04 13:32:49'),(3,'2','Residential Land','2023-08-04 13:32:56'),(4,'1','Independent/ builder Floor','2023-08-04 13:33:50'),(5,'1','Farm House','2023-08-04 13:34:02'),(6,'2','Commercial Shops','2023-08-04 13:34:12'),(7,'1','land','2023-08-16 04:53:54'),(8,'1','areaa','2023-08-25 07:32:31');
/*!40000 ALTER TABLE `property` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_query`
--

DROP TABLE IF EXISTS `property_query`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `property_query` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `developer_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `property_name` varchar(140) NOT NULL,
  `property_address` varchar(250) NOT NULL,
  `property_type_modal` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_query`
--

LOCK TABLES `property_query` WRITE;
/*!40000 ALTER TABLE `property_query` DISABLE KEYS */;
INSERT INTO `property_query` VALUES (1,6,'test by gtf','gtf@gmaial.com','test','','','',1,'2023-08-28 05:06:14'),(3,13,'User ','user@gmail.com','Like this property','Godrej South Estate Prima','','',1,'2023-08-28 06:21:26'),(4,13,'User ','user@gmail.com','Like this property','Godrej South Estate Prima','','',1,'2023-08-28 06:21:37'),(5,12,'shanti niketan','test@gmail.com','','shanti niketan','sector - 146','  Commercial Shops',1,'2023-08-29 08:47:03'),(6,12,'test','test@gmail.com','','shanti niketan','sector - 146','  Commercial Shops',1,'2023-08-29 08:48:15'),(7,12,'shanti','test@gmail.com','','shanti niketan','sector - 146','  Commercial Shops',1,'2023-08-29 08:48:59'),(8,12,'test','test@gmail.com','','shanti niketan','sector - 146','  Commercial Shops',1,'2023-08-29 08:50:18'),(9,13,'User ','user@gmail.com','','shanti niketan','sector - 146','  Commercial Shops',1,'2023-08-29 09:19:21'),(10,13,'gtf','gtf@gmail.com','','shanti niketan','sector - 146','  Commercial Shops',1,'2023-08-29 09:21:45'),(11,13,'testing ','test@gmail.com','More Query','shanti niketan','sector - 146','  Commercial Shops',1,'2023-08-29 09:24:44'),(12,13,'test','testbygtf','test','rajan project one','sector - 2, noida','1,3 BHK areaa',1,'2023-08-29 11:26:46'),(13,13,'test','testbygtf','test','shanti niketan','sector - 146','  Commercial Shops',1,'2023-08-29 11:28:35');
/*!40000 ALTER TABLE `property_query` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` VALUES (1,'Andhra Pradesh',1,'2023-08-03 12:44:08'),(2,'Arunachal Pradesh',1,'2023-08-03 12:44:14'),(3,'Assam',1,'2023-08-03 12:44:20'),(4,'Bihar',1,'2023-08-03 12:44:26'),(5,'Chhattisgarh',1,'2023-08-03 12:44:32'),(6,'Goa',1,'2023-08-03 12:44:38'),(7,'Gujarat',1,'2023-08-03 12:44:43'),(8,'Haryana',1,'2023-08-03 12:44:48'),(9,'Himachal Pradesh',1,'2023-08-03 12:44:53'),(10,'Jharkhand',1,'2023-08-03 12:44:58'),(11,'Karnataka',1,'2023-08-03 12:45:03'),(12,'Kerala',1,'2023-08-03 12:45:08'),(13,'Madhya Pradesh',1,'2023-08-03 12:45:13'),(14,'Maharashtra',1,'2023-08-03 12:45:19'),(15,'Manipur',1,'2023-08-03 12:45:23'),(16,'Meghalaya',1,'2023-08-03 12:45:29'),(17,'Mizoram',1,'2023-08-03 12:45:36'),(18,'Nagaland',1,'2023-08-03 12:45:42'),(19,'Odisha',1,'2023-08-03 12:45:47'),(20,'Punjab',1,'2023-08-03 12:45:51'),(21,'Rajasthan',1,'2023-08-03 12:45:56'),(22,'Sikkim',1,'2023-08-03 12:46:01'),(23,'Tamil Nadu',1,'2023-08-03 12:46:07'),(24,'Telangana',1,'2023-08-03 12:46:11'),(25,'Tripura',1,'2023-08-03 12:46:16'),(26,'Uttar Pradesh',1,'2023-08-03 12:46:22'),(27,'Uttarakhand',1,'2023-08-03 12:46:27'),(28,'West Bengal',1,'2023-08-03 12:46:32'),(29,'Delhi',1,'2023-08-03 12:46:32');
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials_emp`
--

DROP TABLE IF EXISTS `testimonials_emp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonials_emp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `createdDate` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials_emp`
--

LOCK TABLES `testimonials_emp` WRITE;
/*!40000 ALTER TABLE `testimonials_emp` DISABLE KEYS */;
INSERT INTO `testimonials_emp` VALUES (29,'Rakshit Malhotra','testimonials-1190861425.jpg','Product Designer','Show up at the right time and place across the vast Google Ads ecosystem. Let Google’s AI find your best performing ad formats across Youtube, Discover, Search, and more to maximise conversions.',1,'2023-08-12 09:38:28.978937'),(30,'Deepshika Shekhawat','testimonials-1965946096.jpg','Project Coordinator','Actually you do need encoding but text() is doing it for you. Incidentally, you should really start using meaningful variable names. I nearly gave up on your post',1,'2023-08-07 11:18:41.501539'),(37,'Jatinder Baggak','testimonials-1294771054.jpg','Marketing Head1','raheja groups details 31',1,'2023-08-25 05:41:01.137370'),(38,'employee new','testimonials-1480009285.jpg','testing','In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. ',1,'2023-08-25 05:40:10.935936');
/*!40000 ALTER TABLE `testimonials_emp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workculturegallery`
--

DROP TABLE IF EXISTS `workculturegallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workculturegallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) NOT NULL,
  `date` text NOT NULL,
  `cat_img` varchar(255) NOT NULL,
  `cat_vdo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workculturegallery`
--

LOCK TABLES `workculturegallery` WRITE;
/*!40000 ALTER TABLE `workculturegallery` DISABLE KEYS */;
INSERT INTO `workculturegallery` VALUES (3,'timeWork','2023-08-10','work-culture-1608090747.jpg,work-culture-197895786.jpg','work-culture-559906399.mp4'),(11,'test25','2023-08-30','work-culture-957223748.png,work-culture-430060168.jpg,work-culture-769890649.jpg,work-culture-1686373177.jpg','work-culture-1853089661.mp4');
/*!40000 ALTER TABLE `workculturegallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workwithus`
--

DROP TABLE IF EXISTS `workwithus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workwithus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workwithus`
--

LOCK TABLES `workwithus` WRITE;
/*!40000 ALTER TABLE `workwithus` DISABLE KEYS */;
INSERT INTO `workwithus` VALUES (1,'Associate Hiring Manager','noida','Bachelors degree in Human Resources, Business Administration, or related field (or equivalent work experience).,Proven experience as a hiring manager or recruiter, preferably in a call center or customer service environment.,Proficient in using HR softwar','We are a well-balanced team of experienced entrepreneurs and are backed by top investors across India and Silicon Valley (Chiratae Ventures, Blume Ventures, Abstract Ventures, Emergent Ventures; Senior execs at Google, Square, Genpact & Flipkart; Co-found','Proficient in using HR software, applicant tracking systems, and other recruitment tools','2023-08-16 06:57:47'),(2,'Dot Net Developer','Greater Noida','Participate in requirements analysis,Collaborate with internal teams to produce software design and architecture,Write clean, scalable code using .NET programming languages,Test and deploy applications and systems','4 - 9 years','Participate in requirements analysis','2023-08-16 06:57:47'),(3,'Project Manager','noida','photoshop,illustrator','4 years','Required 5+ years experience of project manager','2023-08-16 06:57:47'),(4,'Graphics Designer','Noida','HTML,CSS,Javascript,Jquery','Min 2 years','We have an urgent opening of graphics designer having atleast 2years of experience','2023-08-16 09:16:40'),(5,'add','Noida west','one,two,three,four','5 Years','In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. ','2023-08-25 06:00:30');
/*!40000 ALTER TABLE `workwithus` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-04 12:44:01
