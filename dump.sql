-- MySQL dump 10.13  Distrib 5.6.26, for Win32 (x86)
--
-- Host: localhost    Database: testt
-- ------------------------------------------------------
-- Server version	5.6.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `attach`
--

DROP TABLE IF EXISTS `attach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attach` (
  `attach_idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_type_num` tinyint(3) unsigned NOT NULL,
  `attach_name` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `b_con_idx` int(10) unsigned NOT NULL,
  PRIMARY KEY (`attach_idx`),
  KEY `attach_board_b_con_idx_fk` (`b_con_idx`),
  KEY `attach_file_type_file_type_num_fk` (`file_type_num`),
  CONSTRAINT `attach_board_b_con_idx_fk` FOREIGN KEY (`b_con_idx`) REFERENCES `board` (`b_con_idx`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `attach_file_type_file_type_num_fk` FOREIGN KEY (`file_type_num`) REFERENCES `file_type` (`file_type_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attach`
--

LOCK TABLES `attach` WRITE;
/*!40000 ALTER TABLE `attach` DISABLE KEYS */;
/*!40000 ALTER TABLE `attach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b_category`
--

DROP TABLE IF EXISTS `b_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_category` (
  `b_category_num` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `b_category_name` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`b_category_num`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_category`
--

LOCK TABLES `b_category` WRITE;
/*!40000 ALTER TABLE `b_category` DISABLE KEYS */;
INSERT INTO `b_category` VALUES (1,'심심해'),(2,'배고파'),(3,'궁금해'),(4,'불편해');
/*!40000 ALTER TABLE `b_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `board`
--

DROP TABLE IF EXISTS `board`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `board` (
  `b_con_idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `u_num` int(10) unsigned NOT NULL,
  `b_category_num` tinyint(3) unsigned NOT NULL,
  `college_num` tinyint(3) unsigned NOT NULL,
  `b_subject` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `b_content` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `b_date` varchar(18) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `attach` tinyint(1) NOT NULL,
  `ls_html` tinyint(1) NOT NULL,
  `like_count` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`b_con_idx`),
  KEY `board_b_category_b_category_num_fk` (`b_category_num`),
  KEY `board_user_u_num_fk` (`u_num`),
  KEY `board_college_list_college_num_fk` (`college_num`),
  CONSTRAINT `board_b_category_b_category_num_fk` FOREIGN KEY (`b_category_num`) REFERENCES `b_category` (`b_category_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `board_college_list_college_num_fk` FOREIGN KEY (`college_num`) REFERENCES `college_list` (`college_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `board_user_u_num_fk` FOREIGN KEY (`u_num`) REFERENCES `user` (`u_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `board`
--

LOCK TABLES `board` WRITE;
/*!40000 ALTER TABLE `board` DISABLE KEYS */;
INSERT INTO `board` VALUES (1,2,1,1,'몰랑','몰랑','2015-12-31 12:03',0,0,0);
/*!40000 ALTER TABLE `board` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `college_list`
--

DROP TABLE IF EXISTS `college_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `college_list` (
  `college_num` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `college_name` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`college_num`),
  UNIQUE KEY `college_list_college_name_uindex` (`college_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci COMMENT='대학리스트';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `college_list`
--

LOCK TABLES `college_list` WRITE;
/*!40000 ALTER TABLE `college_list` DISABLE KEYS */;
INSERT INTO `college_list` VALUES (2,'영남'),(1,'영진');
/*!40000 ALTER TABLE `college_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `c_idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `b_con_idx` int(10) unsigned NOT NULL,
  `c_content` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `c_date` varchar(18) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `u_num` int(10) unsigned NOT NULL,
  `like_count` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`c_idx`),
  KEY `comment_board_b_con_idx_fk` (`b_con_idx`),
  KEY `comment_user_u_num_fk` (`u_num`),
  CONSTRAINT `comment_board_b_con_idx_fk` FOREIGN KEY (`b_con_idx`) REFERENCES `board` (`b_con_idx`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comment_user_u_num_fk` FOREIGN KEY (`u_num`) REFERENCES `user` (`u_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `file_type`
--

DROP TABLE IF EXISTS `file_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `file_type` (
  `file_type_num` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `file_path_info` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`file_type_num`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `file_type`
--

LOCK TABLES `file_type` WRITE;
/*!40000 ALTER TABLE `file_type` DISABLE KEYS */;
INSERT INTO `file_type` VALUES (1,'/public/img/'),(2,'/public/mov/');
/*!40000 ALTER TABLE `file_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `follow`
--

DROP TABLE IF EXISTS `follow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `follow` (
  `u_num` int(10) unsigned NOT NULL,
  `fol_u_num` int(10) unsigned NOT NULL,
  `follow_idx` int(10) unsigned NOT NULL,
  PRIMARY KEY (`u_num`,`fol_u_num`),
  UNIQUE KEY `follow_idx` (`follow_idx`),
  CONSTRAINT `follow_user_u_num_fk` FOREIGN KEY (`u_num`) REFERENCES `user` (`u_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follow`
--

LOCK TABLES `follow` WRITE;
/*!40000 ALTER TABLE `follow` DISABLE KEYS */;
/*!40000 ALTER TABLE `follow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interest`
--

DROP TABLE IF EXISTS `interest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interest` (
  `in_num` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `in_name` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`in_num`),
  UNIQUE KEY `in_name` (`in_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interest`
--

LOCK TABLES `interest` WRITE;
/*!40000 ALTER TABLE `interest` DISABLE KEYS */;
/*!40000 ALTER TABLE `interest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interest_u`
--

DROP TABLE IF EXISTS `interest_u`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interest_u` (
  `in_u_num` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `in_num` tinyint(3) unsigned NOT NULL,
  `u_num` int(10) unsigned NOT NULL,
  PRIMARY KEY (`in_u_num`),
  KEY `interest_u_user_u_num_fk` (`u_num`),
  KEY `interest_u_interest_in_num_fk` (`in_num`),
  CONSTRAINT `interest_u_interest_in_num_fk` FOREIGN KEY (`in_num`) REFERENCES `interest` (`in_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `interest_u_user_u_num_fk` FOREIGN KEY (`u_num`) REFERENCES `user` (`u_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interest_u`
--

LOCK TABLES `interest_u` WRITE;
/*!40000 ALTER TABLE `interest_u` DISABLE KEYS */;
/*!40000 ALTER TABLE `interest_u` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `like_board`
--

DROP TABLE IF EXISTS `like_board`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `like_board` (
  `u_num` int(10) unsigned NOT NULL,
  `b_con_idx` int(10) unsigned NOT NULL,
  `like_idx` int(11) NOT NULL,
  PRIMARY KEY (`u_num`,`b_con_idx`),
  UNIQUE KEY `like_idx` (`like_idx`),
  KEY `like_board_board_b_con_idx_fk` (`b_con_idx`),
  CONSTRAINT `like_board_board_b_con_idx_fk` FOREIGN KEY (`b_con_idx`) REFERENCES `board` (`b_con_idx`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `like_board_user_u_num_fk` FOREIGN KEY (`u_num`) REFERENCES `user` (`u_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like_board`
--

LOCK TABLES `like_board` WRITE;
/*!40000 ALTER TABLE `like_board` DISABLE KEYS */;
/*!40000 ALTER TABLE `like_board` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `like_comment`
--

DROP TABLE IF EXISTS `like_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `like_comment` (
  `u_num` int(10) unsigned NOT NULL,
  `c_idx` int(10) unsigned NOT NULL,
  `like_co_idx` int(10) unsigned NOT NULL,
  PRIMARY KEY (`u_num`,`c_idx`),
  UNIQUE KEY `like_co_idx` (`like_co_idx`),
  KEY `like_comment_comment_c_idx_fk` (`c_idx`),
  CONSTRAINT `like_comment_comment_c_idx_fk` FOREIGN KEY (`c_idx`) REFERENCES `comment` (`c_idx`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `like_comment_user_u_num_fk` FOREIGN KEY (`u_num`) REFERENCES `user` (`u_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like_comment`
--

LOCK TABLES `like_comment` WRITE;
/*!40000 ALTER TABLE `like_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `like_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `noti_idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `u_num` int(10) unsigned NOT NULL,
  `noti_type_num` tinyint(3) unsigned NOT NULL,
  `noti_content` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `noti_created` varchar(18) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`noti_idx`),
  KEY `notification_notification_type_noti_type_num_fk` (`noti_type_num`),
  KEY `notification_user_u_num_fk` (`u_num`),
  CONSTRAINT `notification_notification_type_noti_type_num_fk` FOREIGN KEY (`noti_type_num`) REFERENCES `notification_type` (`noti_type_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `notification_user_u_num_fk` FOREIGN KEY (`u_num`) REFERENCES `user` (`u_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification_type`
--

DROP TABLE IF EXISTS `notification_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification_type` (
  `noti_type_num` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `noti_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`noti_type_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification_type`
--

LOCK TABLES `notification_type` WRITE;
/*!40000 ALTER TABLE `notification_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pe_category`
--

DROP TABLE IF EXISTS `pe_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pe_category` (
  `pe_category_num` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `pe_category_idx` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `pe_category_name` varchar(10) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `pe_category_link` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`pe_category_idx`),
  UNIQUE KEY `pe_category_pe_category_name_uindex` (`pe_category_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pe_category`
--

LOCK TABLES `pe_category` WRITE;
/*!40000 ALTER TABLE `pe_category` DISABLE KEYS */;
INSERT INTO `pe_category` VALUES (0,0,NULL,''),(2,1,'한식','korean'),(2,2,'중식','chinese'),(2,3,'일식','japanese'),(2,4,'양식','western'),(2,5,'분식','carb_snack'),(1,6,'PC방','pc'),(1,7,'영화','movie'),(1,8,'노래방','karaoke'),(1,9,'카페','cafe'),(1,10,'공부','study');
/*!40000 ALTER TABLE `pe_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pe_group`
--

DROP TABLE IF EXISTS `pe_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pe_group` (
  `pe_group_idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pe_group_category` tinyint(3) unsigned NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`pe_group_idx`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pe_group`
--

LOCK TABLES `pe_group` WRITE;
/*!40000 ALTER TABLE `pe_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `pe_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pe_join_info`
--

DROP TABLE IF EXISTS `pe_join_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pe_join_info` (
  `pe_join_idx` int(10) unsigned NOT NULL,
  `pe_category_idx` tinyint(3) unsigned NOT NULL,
  `u_num` int(10) unsigned NOT NULL,
  PRIMARY KEY (`pe_join_idx`),
  KEY `pe_category_idx` (`pe_category_idx`),
  KEY `u_num` (`u_num`),
  CONSTRAINT `pe_join_info_ibfk_1` FOREIGN KEY (`pe_category_idx`) REFERENCES `pe_category` (`pe_category_idx`),
  CONSTRAINT `pe_join_info_ibfk_2` FOREIGN KEY (`u_num`) REFERENCES `user` (`u_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pe_join_info`
--

LOCK TABLES `pe_join_info` WRITE;
/*!40000 ALTER TABLE `pe_join_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `pe_join_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uncomfortable`
--

DROP TABLE IF EXISTS `uncomfortable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uncomfortable` (
  `un_idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `u_num` int(10) unsigned NOT NULL,
  `un_subject` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `un_content` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `un_date` varchar(18) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`un_idx`),
  KEY `uncomfortable_user_u_num_fk` (`u_num`),
  CONSTRAINT `uncomfortable_user_u_num_fk` FOREIGN KEY (`u_num`) REFERENCES `user` (`u_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uncomfortable`
--

LOCK TABLES `uncomfortable` WRITE;
/*!40000 ALTER TABLE `uncomfortable` DISABLE KEYS */;
/*!40000 ALTER TABLE `uncomfortable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `u_num` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` varchar(16) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `u_pass` varchar(16) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `u_nick` varchar(10) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `u_tel` varchar(15) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `u_email` varchar(30) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `u_pic` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `u_birth` varchar(7) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `u_status` tinyint(1) NOT NULL,
  `u_in_list` varchar(30) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `college_num` tinyint(3) unsigned DEFAULT NULL,
  `pe_category_idx` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`u_num`),
  KEY `user_college_list_college_num_fk` (`college_num`),
  KEY `pe_category_idx` (`pe_category_idx`),
  CONSTRAINT `user_college_list_college_num_fk` FOREIGN KEY (`college_num`) REFERENCES `college_list` (`college_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`pe_category_idx`) REFERENCES `pe_category` (`pe_category_idx`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci COMMENT='유저테이블';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'user2','2','USER2','321-4567-4523','user2@yjc.ac.kr','','930522',1,'1',1,0),(3,'user3','3','USER3','121-4544-4422','user3@yjc.edu.com','','930516',1,'1',2,0),(4,'user4','4','USER4','124-1242-4124','user4@yjc.ac.kr',NULL,'910303',0,'1',2,0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-19 20:46:31
