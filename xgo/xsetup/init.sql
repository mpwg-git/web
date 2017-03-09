-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: edge-v6
-- ------------------------------------------------------
-- Server version	5.5.46-0+deb7u1

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
-- Table structure for table `assets_compressed`
--

DROP TABLE IF EXISTS `assets_compressed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assets_compressed` (
  `ac_id` int(11) NOT NULL AUTO_INCREMENT,
  `ac_output_md5` varchar(255) CHARACTER SET latin1 NOT NULL,
  `ac_files` varchar(100) CHARACTER SET latin1 NOT NULL,
  `ac_extension` enum('js','css','?') CHARACTER SET latin1 NOT NULL DEFAULT '?',
  `ac_file_ids` text NOT NULL,
  PRIMARY KEY (`ac_id`),
  KEY `ac_files` (`ac_output_md5`),
  KEY `ac_output_md5` (`ac_output_md5`,`ac_extension`),
  KEY `ac_output_md5_2` (`ac_output_md5`,`ac_files`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assets_compressed`
--

LOCK TABLES `assets_compressed` WRITE;
/*!40000 ALTER TABLE `assets_compressed` DISABLE KEYS */;
INSERT INTO `assets_compressed` VALUES (1,'a0d401e07707405493e9438ba0c6e6f0','','?',''),(2,'','','?',''),(3,'43468f3f01f844170a57a3c01be6a839','','?',''),(4,'eb3487f867014289156280f89c3784c6','','?',''),(5,'eb3487f867014289156280f89c3784c6','','?',''),(6,'','','?',',CSS_11,CSS_20,CSS_21,CSS_22,CSS_29,CSS_35,CSS_43,CSS_50,LESS_1,'),(7,'','','?',',CSS_11,CSS_20,CSS_21,CSS_22,CSS_29,CSS_35,CSS_43,CSS_50,LESS_1,'),(8,'','','?',''),(9,'','','?',',CSS_11,CSS_20,CSS_21,CSS_22,CSS_29,CSS_35,CSS_43,CSS_50,LESS_1,'),(10,'','','?',''),(11,'','','?',',CSS_11,CSS_20,CSS_21,CSS_22,CSS_29,CSS_35,CSS_43,CSS_50,LESS_1,'),(12,'','','?',''),(13,'','','?',',CSS_11,CSS_20,CSS_21,CSS_22,CSS_29,CSS_35,CSS_43,CSS_50,LESS_1,'),(14,'1b3f5d2232df54181f8bcd7a698c6894','mwlc_0d829d216fedf9c218dc4223d7d835bc','?',''),(15,'','','?',',CSS_11,CSS_20,CSS_21,CSS_22,CSS_29,CSS_35,CSS_43,CSS_50,LESS_1,'),(16,'','','?',',CSS_11,CSS_20,CSS_21,CSS_22,CSS_29,CSS_35,CSS_43,CSS_50,LESS_1,'),(17,'','','?',',CSS_11,CSS_20,CSS_21,CSS_22,CSS_29,CSS_35,CSS_43,CSS_50,LESS_1,'),(18,'3c892e7c804cf8c7b639cb805d1c8d91','','?',',CSS_11,CSS_20,CSS_21,CSS_22,CSS_29,CSS_35,CSS_43,CSS_50,LESS_1,'),(19,'3c892e7c804cf8c7b639cb805d1c8d91','','?',',CSS_11,CSS_20,CSS_21,CSS_22,CSS_29,CSS_35,CSS_43,CSS_50,LESS_1,'),(20,'3c892e7c804cf8c7b639cb805d1c8d91','','?',',CSS_11,CSS_20,CSS_21,CSS_22,CSS_29,CSS_35,CSS_43,CSS_50,LESS_1,'),(21,'3c892e7c804cf8c7b639cb805d1c8d91','','?',',CSS_11,CSS_20,CSS_21,CSS_22,CSS_29,CSS_35,CSS_43,CSS_50,LESS_1,'),(22,'','','?',',CSS_11,CSS_20,CSS_21,CSS_22,CSS_29,CSS_35,CSS_43,CSS_50,LESS_1,'),(23,'7da878b8cc2c69d8f25fdf7c9876cd39','mwlc_d41d8cd98f00b204e9800998ecf8427e','?',',CSS_11,CSS_20,CSS_21,CSS_22,CSS_29,CSS_35,CSS_43,CSS_50,LESS_1,');
/*!40000 ALTER TABLE `assets_compressed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atoms`
--

DROP TABLE IF EXISTS `atoms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atoms` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_db_name` tinytext NOT NULL,
  `a_vid` int(11) NOT NULL,
  `a_faceId` int(11) NOT NULL,
  `a_type` enum('ATOM','FRAME','WIZARD','CONFIX') NOT NULL,
  `a_s_id` int(11) NOT NULL,
  `a_fid` int(11) NOT NULL,
  `a_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `a_sort` int(11) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_name_cz` tinytext NOT NULL,
  `a_name_hu` tinytext NOT NULL,
  `a_name_sk` tinytext NOT NULL,
  `a_name_ro` tinytext NOT NULL,
  `a_name_it` tinytext NOT NULL,
  `a_name_fr` tinytext NOT NULL,
  `a_name_ru` tinytext NOT NULL,
  `a_name_en` tinytext NOT NULL,
  `a_name_de` tinytext NOT NULL,
  `a_name_bb` tinytext NOT NULL,
  `a_name_xx` tinytext NOT NULL,
  `a_revision` int(11) NOT NULL,
  `a_online` enum('Y','N') NOT NULL DEFAULT 'N',
  `a_isFrame` enum('Y','N') NOT NULL DEFAULT 'N',
  `a_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `a_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `a_lastmodBy` int(11) NOT NULL,
  `a_createdBy` int(11) NOT NULL,
  `a_contentType` int(11) NOT NULL COMMENT 'HTML, etc....',
  `a_language` varchar(2) NOT NULL COMMENT '* oder specific',
  `a_content` longtext NOT NULL,
  `a_content_size_bytes` int(11) NOT NULL,
  `a_wizard_online` enum('Y','N') NOT NULL DEFAULT 'Y',
  `a_wizard_as_p_id` int(11) NOT NULL,
  `a_wizard_as_p_name` int(11) NOT NULL,
  `a_wizard_as_p_name_wizard` tinytext NOT NULL,
  `a_wizardSettings` longtext NOT NULL,
  `a_content_3` longtext NOT NULL,
  `a_content_2` longtext NOT NULL,
  `a_content_1` longtext NOT NULL,
  `a_content_4` longtext NOT NULL,
  `a_gui_cols` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`a_id`),
  KEY `a_s_id` (`a_s_id`),
  KEY `a_fid` (`a_fid`,`a_del`),
  KEY `a_s_id_2` (`a_s_id`,`a_fid`,`a_del`),
  KEY `a_vid` (`a_vid`,`a_del`),
  KEY `xredaktor_atoms::getByVID` (`a_vid`)
) ENGINE=InnoDB AUTO_INCREMENT=1055 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atoms`
--

LOCK TABLES `atoms` WRITE;
/*!40000 ALTER TABLE `atoms` DISABLE KEYS */;
INSERT INTO `atoms` VALUES (67,'',0,0,'ATOM',0,0,'N',67,'Wizards','','','','','','','','','','','',0,'N','N','2011-08-09 21:32:17','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','0','','','','',2),(68,'',0,0,'FRAME',0,0,'N',68,'Coresite','','','','','','','','','','','',0,'N','N','2011-08-09 21:35:23','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','0','','','','',2),(69,'',0,0,'ATOM',0,0,'N',69,'User','','','','','','','','','','','',0,'N','N','2011-08-10 08:56:12','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','0','','','','',2),(70,'',100,0,'ATOM',0,67,'N',0,'settings','','','','','','','','','','','',0,'N','N','2011-08-10 09:11:56','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','0','','','','',2),(72,'',0,0,'ATOM',0,69,'N',0,'Configuration','','','','','','','','','','','',0,'N','N','2011-08-10 09:29:52','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','0','','','','',2),(73,'be_users',1000,0,'WIZARD',0,0,'N',1,'be_users','','','','','','','','','','','',0,'N','N','2011-08-10 09:35:26','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','{\"es_splashImage\":\"\",\"es_online\":null,\"es_CID\":\"\",\"es_TID\":\"\",\"es_detailPage\":\"\",\"es_titleSettings\":\"\",\"es_lockpwd_mod_settings\":\"\",\"es_databaseTableName\":\"be_users\",\"es_backupDatabase\":null,\"es_useInSearch\":null,\"es_postHooks\":\"xredaktor_core::updateSecurity\"}','','','','',2),(74,'',0,0,'ATOM',0,0,'N',71,'Atoms','','','','','','','','','','','',0,'N','N','2011-08-10 15:23:22','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','0','','','','',2),(75,'',0,0,'ATOM',0,74,'N',1,'Types','','','','','','','','','','','',0,'N','N','2011-08-10 15:23:31','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','0','','','','',2),(77,'',201,0,'ATOM',0,75,'N',1,'TEXTFIELD','','','','','','','','','','','',0,'N','N','2011-08-11 14:39:13','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(80,'',0,0,'ATOM',0,0,'N',74,'Backend','','','','','','','','','','','',0,'N','N','2011-08-11 21:21:57','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(81,'',50,0,'ATOM',0,80,'N',0,'xredaktor','','','','','','','','','','','',0,'N','N','2011-08-11 21:22:05','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(82,'',202,0,'ATOM',0,75,'N',2,'W2W','','','','','','','','','','','',0,'N','N','2011-08-11 21:47:34','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(83,'',0,0,'FRAME',0,0,'N',75,'Splashscreen','','','','','','','','','','','',0,'N','N','2011-08-15 12:04:24','0000-00-00 00:00:00',0,0,0,'','<div id=\'xr_welcome_infopool\'></div>\n<div id=\'xr_welcome_inhlatsseiten\'></div>\n<div id=\'xr_welcome_logo\'></div>',0,'Y',0,0,'','','','','','',2),(84,'',0,0,'ATOM',0,0,'N',76,'Gui','','','','','','','','','','','',0,'N','N','2011-08-15 12:07:43','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(85,'',0,0,'FRAME',0,0,'N',77,'Splashscreen - CRM','','','','','','','','','','','',0,'N','N','2011-08-16 00:00:50','0000-00-00 00:00:00',0,0,0,'','<div id=\'xr_welcome_infopool\'></div>\n<div id=\'xr_welcome_graph\'></div>\n<div id=\'xr_welcome_logo\'></div>',0,'Y',0,0,'','','','','','',2),(126,'countrylist',0,0,'WIZARD',0,0,'N',2,'countrylist','','','','','','','','','','','',0,'N','N','2011-10-17 08:24:27','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','{\"es_splashImage\":\"\",\"es_online\":\"\",\"es_CID\":\"\",\"es_TID\":\"\",\"es_detailPage\":\"\",\"ext_url\":\"\",\"ext_title\":\"\",\"ext_target\":\"_top\",\"p_title\":\"\",\"p_target\":\"_top\",\"email_subject\":\"\",\"email_to\":\"\",\"email_cc\":\"\",\"email_content\":\"\",\"infopool_pair\":\"\",\"textfield-6418-inputEl\":\"[X]\",\"es_titleSettings\":\"\",\"es_lockpwd_mod_settings\":\"d41d8cd98f00b204e9800998ecf8427e\",\"es_databaseTableName\":\"countrylist\",\"es_backupDatabase\":\"\",\"es_useInSearch\":\"\",\"es_postHooks\":\"\"}','','','','',2),(183,'',300,0,'ATOM',0,84,'N',0,'HTML-EDITOR','','','','','','','','','','','',0,'N','N','2011-12-01 22:26:26','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(196,'',0,0,'ATOM',0,183,'N',0,'lightboxStuff','','','','','','','','','','','',0,'N','N','2011-12-16 17:15:52','0000-00-00 00:00:00',0,0,0,'','<%$title%>\n<div id=\"fb_content_<%$PSA_ID%>\" style=\"display:none;\"><%$text%></div>',0,'Y',0,0,'','','','','','',2),(353,'',0,0,'FRAME',0,0,'N',78,'Standardtemplate','','','','','','','','','','','',0,'N','N','2015-02-24 15:56:28','0000-00-00 00:00:00',0,0,0,'','<%$CONTENT%>',0,'Y',0,0,'','','','','','',2),(533,'qmail',0,0,'WIZARD',0,0,'N',6,'qmail','','','','','','','','','','','',0,'N','N','2015-03-07 00:15:58','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','{\"es_splashImage\":\"\",\"es_online\":\"\",\"es_CID\":\"\",\"es_TID\":\"\",\"es_detailPage\":\"\",\"ext_url\":\"\",\"ext_title\":\"\",\"ext_target\":\"_top\",\"p_title\":\"\",\"p_target\":\"_top\",\"email_subject\":\"\",\"email_to\":\"\",\"email_cc\":\"\",\"email_content\":\"\",\"infopool_pair\":\"\",\"textfield-2657-inputEl\":\"[X]\",\"es_titleSettings\":\"\",\"es_lockpwd_mod_settings\":\"74be16979710d4c4e7c6647856088456\",\"es_databaseTableName\":\"qmail\",\"es_backupDatabase\":\"\",\"es_useInSearch\":\"\",\"es_postHooks\":\"\"}','','','','',2),(534,'cronjobs',0,0,'WIZARD',0,0,'N',7,'cronjobs','','','','','','','','','','','',0,'N','N','2015-03-07 00:16:03','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','{\"es_splashImage\":\"\",\"es_online\":\"\",\"es_CID\":\"\",\"es_TID\":\"\",\"es_detailPage\":\"\",\"ext_url\":\"\",\"ext_title\":\"\",\"ext_target\":\"_top\",\"p_title\":\"\",\"p_target\":\"_top\",\"email_subject\":\"\",\"email_to\":\"\",\"email_cc\":\"\",\"email_content\":\"\",\"infopool_pair\":\"\",\"textfield-2657-inputEl\":\"[X]\",\"es_titleSettings\":\"\",\"es_lockpwd_mod_settings\":\"d41d8cd98f00b204e9800998ecf8427e\",\"es_databaseTableName\":\"cronjobs\",\"es_backupDatabase\":\"\",\"es_useInSearch\":\"\",\"es_postHooks\":\"\"}','','','','',2),(535,'forms_actions_mails',0,0,'WIZARD',0,0,'N',8,'forms_actions_mails','','','','','','','','','','','',0,'N','N','2015-03-07 00:44:00','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','{\"es_splashImage\":\"\",\"es_online\":\"\",\"es_CID\":\"\",\"es_TID\":\"\",\"es_detailPage\":\"\",\"ext_url\":\"\",\"ext_title\":\"\",\"ext_target\":\"_top\",\"p_title\":\"\",\"p_target\":\"_top\",\"email_subject\":\"\",\"email_to\":\"\",\"email_cc\":\"\",\"email_content\":\"\",\"infopool_pair\":\"\",\"textfield-2657-inputEl\":\"[X]\",\"es_titleSettings\":\"\",\"es_lockpwd_mod_settings\":\"d41d8cd98f00b204e9800998ecf8427e\",\"es_databaseTableName\":\"forms_actions_mails\",\"es_backupDatabase\":\"\",\"es_useInSearch\":\"\",\"es_postHooks\":\"\"}','','','','',2),(536,'forms_settings',0,0,'WIZARD',0,0,'N',9,'forms_settings','','','','','','','','','','','',0,'N','N','2015-03-07 00:50:39','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','{\"es_splashImage\":\"\",\"es_online\":\"\",\"es_CID\":\"\",\"es_TID\":\"\",\"es_detailPage\":\"\",\"ext_url\":\"\",\"ext_title\":\"\",\"ext_target\":\"_top\",\"p_title\":\"\",\"p_target\":\"_top\",\"email_subject\":\"\",\"email_to\":\"\",\"email_cc\":\"\",\"email_content\":\"\",\"infopool_pair\":\"\",\"textfield-2657-inputEl\":\"[X]\",\"es_titleSettings\":\"\",\"es_lockpwd_mod_settings\":\"d41d8cd98f00b204e9800998ecf8427e\",\"es_databaseTableName\":\"forms_settings\",\"es_backupDatabase\":\"\",\"es_useInSearch\":\"\",\"es_postHooks\":\"\"}','','','','',2),(539,'',0,0,'WIZARD',0,0,'N',10,'storage_images_profiles','','','','','','','','','','','',0,'N','N','2015-03-07 12:04:02','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(540,'',0,0,'WIZARD',0,0,'N',11,'storage_images_cached','','','','','','','','','','','',0,'N','N','2015-03-07 12:18:31','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(541,'',0,0,'WIZARD',0,0,'N',12,'storage_images_s3','','','','','','','','','','','',0,'N','N','2015-03-07 12:19:28','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(542,'',0,0,'WIZARD',0,0,'N',14,'elasticsearch_indexes','','','','','','','','','','','',0,'N','N','2015-03-07 12:19:56','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(543,'',0,0,'WIZARD',0,0,'N',0,'s3_buckets','','','','','','','','','','','',0,'N','N','2015-03-07 12:21:47','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(544,'',0,0,'WIZARD',0,0,'N',15,'pager_settings','','','','','','','','','','','',0,'N','N','2015-03-07 12:27:57','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(545,'',0,0,'WIZARD',0,0,'N',16,'load_more','','','','','','','','','','','',0,'N','N','2015-03-07 12:29:53','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(546,'',0,0,'WIZARD',0,557,'N',0,'wizard_description ','','','','','','','','','','','',0,'N','N','2015-03-07 12:41:39','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(547,'',0,0,'WIZARD',0,557,'N',1,'wizard_vanity_url_segments','','','','','','','','','','','',0,'N','N','2015-03-07 12:41:48','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(550,'',6100,0,'WIZARD',0,557,'N',2,'xtypes','','','','','','','','','','','',0,'N','N','2015-03-07 13:47:57','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(551,'xtypes_wizard_1_n',6101,0,'WIZARD',0,550,'N',1,'wizard_1_n','','','','','','','','','','','',0,'N','N','2015-03-07 13:48:16','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','{\"es_splashImage\":\"\",\"es_online\":\"\",\"es_CID\":\"\",\"es_TID\":\"\",\"es_detailPage\":\"\",\"ext_url\":\"\",\"ext_title\":\"\",\"ext_target\":\"_top\",\"p_title\":\"\",\"p_target\":\"_top\",\"email_subject\":\"\",\"email_to\":\"\",\"email_cc\":\"\",\"email_content\":\"\",\"infopool_pair\":\"\",\"textfield-8686-inputEl\":\"[X]\",\"es_titleSettings\":\"\",\"es_lockpwd_mod_settings\":\"d41d8cd98f00b204e9800998ecf8427e\",\"es_databaseTableName\":\"xtypes_wizard_1_n\",\"es_backupDatabase\":\"\",\"es_useInSearch\":\"\",\"es_postHooks\":\"\"}','','','','',2),(554,'',0,0,'WIZARD',0,544,'N',1,'pager settings limits','','','','','','','','','','','',0,'N','N','2015-03-07 15:35:12','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(555,'',0,0,'WIZARD',0,545,'N',1,'load more limits','','','','','','','','','','','',0,'N','N','2015-03-07 15:51:14','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(557,'wizards',6000,0,'WIZARD',0,0,'N',13,'wizards','','','','','','','','','','','',0,'N','N','2015-03-07 16:30:04','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','{\"es_titleSettings\":\"\",\"es_useInSearch\":\"\",\"es_image_s_id\":\"\",\"es_postHooks\":\"\",\"es_databaseTableName\":\"wizards\",\"title-it\":\"\",\"basic\":\"\",\"vanity-url\":\"\",\"extended\":\"\"}','','','','',2),(558,'',0,0,'WIZARD',0,0,'N',18,'cache','','','','','','','','','','','',0,'N','N','2015-03-07 18:53:44','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(605,'xtypes_defaults',6102,0,'WIZARD',0,550,'N',2,'defaults','','','','','','','','','','','',0,'N','N','2015-03-09 12:02:43','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','{\"es_titleSettings\":\"\",\"es_vanitySettings\":\"\",\"es_postHooks\":\"\",\"es_databaseTableName\":\"xtypes_defaults\",\"es_image_s_id\":\"\",\"es_elastic_search_enabled\":\"\",\"es_elastic_search_title\":\"\",\"es_elastic_search_desc\":\"\",\"es_meta_keywords\":\"\",\"es_meta_description\":\"\",\"es_og_title\":\"\",\"es_og_image\":\"\"}','','','','',2),(612,'',6103,0,'WIZARD',0,550,'N',3,'tabs','','','','','','','','','','','',0,'N','N','2015-03-10 14:30:02','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(615,'open_graph_object_types',0,0,'WIZARD',0,0,'N',19,'open_graph_object_types','','','','','','','','','','','',0,'N','N','2015-03-11 15:04:03','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','{\"es_titleSettings\":\"\",\"es_vanitySettings\":\"\",\"es_postHooks\":\"\",\"es_databaseTableName\":\"open_graph_object_types\",\"es_image_s_id\":\"\",\"es_elastic_search_enabled\":\"\",\"es_elastic_search_title\":\"\",\"es_elastic_search_desc\":\"\",\"es_meta_keywords\":\"\",\"es_meta_description\":\"\",\"es_og_title\":\"\",\"es_og_image\":\"\",\"es_og_types\":\"\"}','','','','',2),(617,'',101,0,'ATOM',0,67,'N',1,'sseo','','','','','','','','','','','',0,'N','N','2015-03-11 18:13:22','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(622,'pages_niceurls_rel',0,0,'WIZARD',0,0,'N',21,'pages_niceurls_rel','','','','','','','','','','','',0,'N','N','2015-03-12 17:26:15','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','{\"es_titleSettings\":\"\",\"es_vanitySettings\":\"\",\"es_postHooks\":\"\",\"es_databaseTableName\":\"pages_niceurls_rel\",\"es_image_s_id\":\"\",\"es_elastic_search_enabled\":\"\",\"es_elastic_search_title\":\"\",\"es_elastic_search_desc\":\"\",\"es_meta_keywords\":\"\",\"es_meta_description\":\"\",\"es_og_title\":\"\",\"es_og_image\":\"\",\"es_og_types\":\"\"}','','','','',2),(636,'image_profiles',0,0,'WIZARD',0,0,'N',22,'image_profiles','','','','','','','','','','','',0,'N','N','2015-03-14 09:08:33','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','{\"es_titleSettings\":\"1963\",\"es_vanitySettings\":\"\",\"es_postHooks\":\"\",\"es_databaseTableName\":\"image_profiles\",\"es_image_s_id\":\"\",\"es_elastic_search_enabled\":\"\",\"es_elastic_search_title\":\"\",\"es_elastic_search_desc\":\"\",\"es_meta_keywords\":\"\",\"es_meta_description\":\"\",\"es_og_title\":\"\",\"es_og_image\":\"\",\"es_og_types\":\"\"}','','','','',2),(639,'wizard_relations',0,0,'WIZARD',0,0,'N',23,'wizard_relations','','','','','','','','','','','',0,'N','N','2015-03-14 16:29:37','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','{\"es_titleSettings\":\"\",\"es_vanitySettings\":\"\",\"es_postHooks\":\"\",\"es_databaseTableName\":\"wizard_relations\",\"es_image_s_id\":\"\",\"es_elastic_search_enabled\":\"\",\"es_elastic_search_title\":\"\",\"es_elastic_search_desc\":\"\",\"es_meta_keywords\":\"\",\"es_meta_description\":\"\",\"es_og_title\":\"\",\"es_og_image\":\"\",\"es_og_types\":\"\"}','','','','',2),(1044,'',0,0,'FRAME',1,0,'N',1,'Standardtemplate','','','','','','','','','','','',0,'N','N','2015-12-04 16:17:40','0000-00-00 00:00:00',0,0,0,'','<!DOCTYPE html>\n<html lang=\"<%$P_LANG%>\">\n    \n    <!-- HTML HEADER ATOM -->\n    <%xr_atom a_id=1046 return=1 desc=\'HTML Header\'%>\n     \n	<body>\n	    <!-- Google Tag Manager -->\n        <noscript><iframe src=\"//www.googletagmanager.com/ns.html?id=GTM-PCJ6\"\n        height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>\n        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':\n        new Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],\n        j=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\n        \'//www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);\n        })(window,document,\'script\',\'dataLayer\',\'GTM-PCJ6\');</script>\n        <!-- End Google Tag Manager -->\n	    \n	    <!-- HEADER -->\n	    <%xr_atom a_id=1048 return=1 desc=\'Header\'%>\n	    \n	    <!-- CONTENT -->\n		<%$CONTENT%>\n		\n		<!-- FOOTER -->\n		<%xr_atom a_id=1049 return=1 desc=\'Footer\'%>\n		\n	    <!-- JS ATOM -->\n		<%xr_atom a_id=1047 return=1 desc=\'js files\'%>\n	</body>\n</html>',0,'Y',0,0,'','','','','','',2),(1045,'',0,0,'ATOM',1,1050,'N',2,'Frontend','','','','','','','','','','','',0,'N','N','2015-12-04 16:26:17','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(1046,'',0,0,'ATOM',1,1045,'N',1,'HTML Header','','','','','','','','','','','',0,'N','N','2015-12-04 16:26:24','0000-00-00 00:00:00',0,0,0,'','<head>\r\n    <meta charset=\"utf-8\"><%$CMS%>\r\n    <!--[if lt IE 11]><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><![endif]-->\r\n	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, user-scalable=no\">\r\n	\r\n	<link rel=\"shortcut icon\" href=\"/xstorage/template/img/favicon/favicon.ico\">\r\n    <link rel=\"icon\" type=\"image/png\" href=\"/xstorage/template/img/favicon/favicon-16x16.png\" sizes=\"16x16\" />\r\n	<link rel=\"icon\" type=\"image/png\" href=\"/xstorage/template/img/favicon/favicon-32x32.png\" sizes=\"32x32\" />\r\n	\r\n    <%if $WTITLETAG !=\'\'%>\r\n        <title><%$WTITLETAG%> - <%xr_papsch postfix=\' - \'%><%xr_translate tag=\'###SITE_TITLE###\'%></title>\r\n    <%else%>\r\n        <%if $TITLETAG !=\'\'%>\r\n            <title><%$TITLETAG%><%if $P_ID != \'1\'%> - <%xr_papsch postfix=\' - \'%><%xr_translate tag=\'###SITE_TITLE###\'%><%/if%></title>\r\n        <%elseif $AHEADLINE!=\'\'%>\r\n            <title><%$AHEADLINE%> - <%xr_papsch postfix=\' - \'%><%xr_translate tag=\'###SITE_TITLE###\'%></title>\r\n        <%else%>\r\n            <title><%xr_translate tag=\'###SITE_TITLE###\'%></title>\r\n        <%/if%>\r\n    <%/if%>\r\n    \r\n    <meta name=\"description\" content=\"<%$DESCRIPTION%>\" />\r\n    <meta name=\"keywords\" content=\"<%$KEYWORDS%>\" />\r\n    <%if $ROBOTS == \'1\'%><meta name=\"robots\" content=\"noindex\" /><%/if%>\r\n    \r\n	<%xr_cssWrapperV3 less_ids=\'1\' css_ids=\'11,20,21,22,29,35,43,50\'%>\r\n\r\n	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->\r\n	<!--[if lt IE 9]>\r\n		<script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>\r\n		<script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>\r\n	<![endif]-->\r\n	\r\n	<!-- OG\r\n	<%$OG_IMAGE%>\r\n    -->\r\n    \r\n    <link rel=\"publisher\" href=\"https://plus.google.com/103372076990833143738/\" />\r\n    \r\n    <meta property=\"og:type\" content=\"website\"/>\r\n    <meta property=\"og:url\" content=\"https://<%$smarty.server.HTTP_HOST%><%$smarty.server.REDIRECT_URL%>\"/>\r\n    <%xr_img s_id=11524 var=\"ogImage\"%>\r\n    <meta property=\"og:image\" content=\"https://<%$smarty.server.HTTP_HOST%><%$ogImage.src%>\"/>\r\n    <meta property=\"og:description\" content=\"<%$P_SSEO.seo_desc%>\"/>\r\n    \r\n    <meta name=\"geo.region\" content=\"\" />\r\n    <meta name=\"geo.placename\" content=\"\" />\r\n    <meta name=\"geo.position\" content=\"\" />\r\n    <meta name=\"ICBM\" content=\"\" />\r\n</head>',0,'Y',0,0,'','','','','','',2),(1047,'',0,0,'ATOM',1,1045,'N',2,'JS Files','','','','','','','','','','','',0,'N','N','2015-12-04 16:26:30','0000-00-00 00:00:00',0,0,0,'','<%xr_jsWrapperV3 s_ids=\'48,12,23,30,36,46\' var=\"packedjs\"%>',0,'Y',0,0,'','','','','','',2),(1048,'',0,0,'ATOM',1,1050,'N',1,'Header','','','','','','','','','','','',0,'N','N','2015-12-04 16:37:59','0000-00-00 00:00:00',0,0,0,'','<header>\n    \n</header>',0,'Y',0,0,'','','','','','',2),(1049,'',0,0,'ATOM',1,1050,'N',0,'Footer','','','','','','','','','','','',0,'N','N','2015-12-04 16:38:01','0000-00-00 00:00:00',0,0,0,'','<footer>\n    \n</footer>',0,'Y',0,0,'','','','','','',2),(1050,'',0,0,'ATOM',1,0,'N',4,'Entwickler','','','','','','','','','','','',0,'N','N','2015-12-04 18:22:08','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(1051,'',0,0,'ATOM',1,0,'N',5,'Redakteur','','','','','','','','','','','',0,'N','N','2015-12-04 18:22:19','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2),(1052,'',0,0,'ATOM',1,1051,'N',1,'Headline','','','','','','','','','','','',0,'N','N','2015-12-04 18:24:34','0000-00-00 00:00:00',0,0,0,'','<div class=\"headline\">\n    <%if $HEADLINE1 != \'\'%><h1><%$HEADLINE1%></h1><%/if%>\n    <%if $HEADLINE2 != \'\'%><h2><%$HEADLINE2%></h2><%/if%>\n    <%if $HEADLINE3 != \'\'%><h3><%$HEADLINE3%></h3><%/if%>\n</div>',0,'Y',0,0,'','','','','','',2),(1053,'',0,0,'ATOM',1,1051,'N',2,'BannerSlider','','','','','','','','','','','',0,'N','N','2015-12-04 18:27:20','0000-00-00 00:00:00',0,0,0,'','<div class=\"banner-slider\">\n    <%foreach $SLIDES as $k => $slide%>\n        <div class=\"slide\">\n            <%xr_imgWrapper s_id=$slide.IMG w=1200 class=\"image\"%>\n            <div class=\"text\"></div>\n        </div>\n    <%/foreach%>\n</div>',0,'Y',0,0,'','','','','','',2),(1054,'',0,0,'ATOM',1,1050,'N',3,'BannerSlider Bausteinliste','','','','','','','','','','','',0,'N','N','2015-12-04 18:27:48','0000-00-00 00:00:00',0,0,0,'','',0,'Y',0,0,'','','','','','',2);
/*!40000 ALTER TABLE `atoms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atoms_history`
--

DROP TABLE IF EXISTS `atoms_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atoms_history` (
  `ah_id` int(11) NOT NULL AUTO_INCREMENT,
  `ah_a_id` int(11) NOT NULL,
  `ah_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ah_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ah_backup` longtext NOT NULL,
  `ah_backup_2` longtext NOT NULL,
  `ah_backup_3` longtext NOT NULL,
  `ah_backup_1` longtext NOT NULL,
  `ah_backup_4` longtext NOT NULL,
  PRIMARY KEY (`ah_id`),
  KEY `xredaktor_atoms::save2history` (`ah_a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atoms_history`
--

LOCK TABLES `atoms_history` WRITE;
/*!40000 ALTER TABLE `atoms_history` DISABLE KEYS */;
INSERT INTO `atoms_history` VALUES (1,1046,'2015-12-04 16:28:36','2015-12-04 16:28:36','<head>\r\n    <meta charset=\"utf-8\"><%$CMS%>\r\n    <!--[if lt IE 11]><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><![endif]-->\r\n	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, user-scalable=no\">\r\n	\r\n	<link rel=\"shortcut icon\" href=\"/xstorage/template/img/favicon.ico\">\r\n    <link rel=\"icon\" type=\"image/png\" href=\"/xstorage/template/img/favicon-16x16.png\" sizes=\"16x16\" />\r\n	<link rel=\"icon\" type=\"image/png\" href=\"/xstorage/template/img/favicon-32x32.png\" sizes=\"32x32\" />\r\n	\r\n    <%if $WTITLETAG !=\'\'%>\r\n        <title><%$WTITLETAG%> - <%xr_papsch postfix=\' - \'%><%xr_translate tag=\'###SITE_TITLE###\'%></title>\r\n    <%else%>\r\n        <%if $TITLETAG !=\'\'%>\r\n            <title><%$TITLETAG%><%if $P_ID != \'1\'%> - <%xr_papsch postfix=\' - \'%><%xr_translate tag=\'###SITE_TITLE###\'%><%/if%></title>\r\n        <%elseif $AHEADLINE!=\'\'%>\r\n            <title><%$AHEADLINE%> - <%xr_papsch postfix=\' - \'%><%xr_translate tag=\'###SITE_TITLE###\'%></title>\r\n        <%else%>\r\n            <title><%xr_translate tag=\'###SITE_TITLE###\'%></title>\r\n        <%/if%>\r\n    <%/if%>\r\n    \r\n    <meta name=\"description\" content=\"<%$DESCRIPTION%>\" />\r\n    <meta name=\"keywords\" content=\"<%$KEYWORDS%>\" />\r\n    <%if $ROBOTS == \'1\'%><meta name=\"robots\" content=\"noindex\" /><%/if%>\r\n    \r\n	<%xr_cssWrapperV2 s_ids=\'10089,10076,10050,10026,10956,10957,10958,10965,11327,11728\' var=\"packedcss\"%>\r\n	<%xr_lessWrapper ids=\'4,5\'%>\r\n\r\n	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->\r\n	<!--[if lt IE 9]>\r\n		<script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>\r\n		<script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>\r\n	<![endif]-->\r\n	\r\n	<!-- OG\r\n	<%$OG_IMAGE%>\r\n    -->\r\n    \r\n    <link rel=\"publisher\" href=\"https://plus.google.com/103372076990833143738/\" />\r\n    \r\n    <meta name=\"geo.region\" content=\"AT-7\" />\r\n    <meta name=\"geo.placename\" content=\"Kitzb&uuml;hel\" />\r\n    <meta name=\"geo.position\" content=\"47.45412;12.396761\" />\r\n    <meta name=\"ICBM\" content=\"47.45412, 12.396761\" />\r\n</head>','','','',''),(2,1046,'2015-12-04 16:29:04','2015-12-04 16:29:04','<head>\r\n    <meta charset=\"utf-8\"><%$CMS%>\r\n    <!--[if lt IE 11]><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><![endif]-->\r\n	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, user-scalable=no\">\r\n	\r\n	<link rel=\"shortcut icon\" href=\"/xstorage/template/img/favicon.ico\">\r\n    <link rel=\"icon\" type=\"image/png\" href=\"/xstorage/template/img/favicon-16x16.png\" sizes=\"16x16\" />\r\n	<link rel=\"icon\" type=\"image/png\" href=\"/xstorage/template/img/favicon-32x32.png\" sizes=\"32x32\" />\r\n	\r\n    <%if $WTITLETAG !=\'\'%>\r\n        <title><%$WTITLETAG%> - <%xr_papsch postfix=\' - \'%><%xr_translate tag=\'###SITE_TITLE###\'%></title>\r\n    <%else%>\r\n        <%if $TITLETAG !=\'\'%>\r\n            <title><%$TITLETAG%><%if $P_ID != \'1\'%> - <%xr_papsch postfix=\' - \'%><%xr_translate tag=\'###SITE_TITLE###\'%><%/if%></title>\r\n        <%elseif $AHEADLINE!=\'\'%>\r\n            <title><%$AHEADLINE%> - <%xr_papsch postfix=\' - \'%><%xr_translate tag=\'###SITE_TITLE###\'%></title>\r\n        <%else%>\r\n            <title><%xr_translate tag=\'###SITE_TITLE###\'%></title>\r\n        <%/if%>\r\n    <%/if%>\r\n    \r\n    <meta name=\"description\" content=\"<%$DESCRIPTION%>\" />\r\n    <meta name=\"keywords\" content=\"<%$KEYWORDS%>\" />\r\n    <%if $ROBOTS == \'1\'%><meta name=\"robots\" content=\"noindex\" /><%/if%>\r\n    \r\n	<%xr_cssWrapperV3 less_ids=\'1\' css_ids=\'\'%>\r\n\r\n	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->\r\n	<!--[if lt IE 9]>\r\n		<script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>\r\n		<script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>\r\n	<![endif]-->\r\n	\r\n	<!-- OG\r\n	<%$OG_IMAGE%>\r\n    -->\r\n    \r\n    <link rel=\"publisher\" href=\"https://plus.google.com/103372076990833143738/\" />\r\n    \r\n    <meta name=\"geo.region\" content=\"AT-7\" />\r\n    <meta name=\"geo.placename\" content=\"Kitzb&uuml;hel\" />\r\n    <meta name=\"geo.position\" content=\"47.45412;12.396761\" />\r\n    <meta name=\"ICBM\" content=\"47.45412, 12.396761\" />\r\n</head>','','','',''),(3,1044,'2015-12-04 16:29:56','2015-12-04 16:29:56','<!DOCTYPE html>\n<html lang=\"<%$P_LANG%>\">\n    \n    <!-- HTML HEADER ATOM -->\n    <%xr_atom a_id=647 return=1%>\n     \n	<body>\n	    <!-- Google Tag Manager -->\n        <noscript><iframe src=\"//www.googletagmanager.com/ns.html?id=GTM-PCJ6\"\n        height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>\n        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':\n        new Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],\n        j=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\n        \'//www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);\n        })(window,document,\'script\',\'dataLayer\',\'GTM-PCJ6\');</script>\n        <!-- End Google Tag Manager -->\n	    \n	    \n	    <!-- CONTENT -->\n		<%$CONTENT%>\n		\n		\n	    <!-- JS ATOM -->\n		<%xr_atom a_id=704 return=1 desc=\'js files\'%>\n	</body>\n</html>','','','',''),(4,1044,'2015-12-04 16:29:59','2015-12-04 16:29:59','<!DOCTYPE html>\n<html lang=\"<%$P_LANG%>\">\n    \n    <!-- HTML HEADER ATOM -->\n    <%xr_atom a_id=1046 return=1 desc=\'HTML Header\'%>\n     \n	<body>\n	    <!-- Google Tag Manager -->\n        <noscript><iframe src=\"//www.googletagmanager.com/ns.html?id=GTM-PCJ6\"\n        height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>\n        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':\n        new Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],\n        j=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\n        \'//www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);\n        })(window,document,\'script\',\'dataLayer\',\'GTM-PCJ6\');</script>\n        <!-- End Google Tag Manager -->\n	    \n	    \n	    <!-- CONTENT -->\n		<%$CONTENT%>\n		\n		\n	    <!-- JS ATOM -->\n		<%xr_atom a_id=1047 return=1 desc=\'js files\'%>\n	</body>\n</html>','','','',''),(5,1047,'2015-12-04 16:34:14','2015-12-04 16:34:14','<%xr_jsWrapperV3 s_ids=\'\' var=\"packedjs\"%>','','','',''),(6,1046,'2015-12-04 16:36:53','2015-12-04 16:36:53','<head>\r\n    <meta charset=\"utf-8\"><%$CMS%>\r\n    <!--[if lt IE 11]><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><![endif]-->\r\n	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, user-scalable=no\">\r\n	\r\n	<link rel=\"shortcut icon\" href=\"/xstorage/template/img/favicon.ico\">\r\n    <link rel=\"icon\" type=\"image/png\" href=\"/xstorage/template/img/favicon-16x16.png\" sizes=\"16x16\" />\r\n	<link rel=\"icon\" type=\"image/png\" href=\"/xstorage/template/img/favicon-32x32.png\" sizes=\"32x32\" />\r\n	\r\n    <%if $WTITLETAG !=\'\'%>\r\n        <title><%$WTITLETAG%> - <%xr_papsch postfix=\' - \'%><%xr_translate tag=\'###SITE_TITLE###\'%></title>\r\n    <%else%>\r\n        <%if $TITLETAG !=\'\'%>\r\n            <title><%$TITLETAG%><%if $P_ID != \'1\'%> - <%xr_papsch postfix=\' - \'%><%xr_translate tag=\'###SITE_TITLE###\'%><%/if%></title>\r\n        <%elseif $AHEADLINE!=\'\'%>\r\n            <title><%$AHEADLINE%> - <%xr_papsch postfix=\' - \'%><%xr_translate tag=\'###SITE_TITLE###\'%></title>\r\n        <%else%>\r\n            <title><%xr_translate tag=\'###SITE_TITLE###\'%></title>\r\n        <%/if%>\r\n    <%/if%>\r\n    \r\n    <meta name=\"description\" content=\"<%$DESCRIPTION%>\" />\r\n    <meta name=\"keywords\" content=\"<%$KEYWORDS%>\" />\r\n    <%if $ROBOTS == \'1\'%><meta name=\"robots\" content=\"noindex\" /><%/if%>\r\n    \r\n	<%xr_cssWrapperV3 less_ids=\'1\' css_ids=\'\'%>\r\n\r\n	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->\r\n	<!--[if lt IE 9]>\r\n		<script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>\r\n		<script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>\r\n	<![endif]-->\r\n	\r\n	<!-- OG\r\n	<%$OG_IMAGE%>\r\n    -->\r\n    \r\n    <link rel=\"publisher\" href=\"https://plus.google.com/103372076990833143738/\" />\r\n    \r\n    <meta name=\"geo.region\" content=\"\" />\r\n    <meta name=\"geo.placename\" content=\"\" />\r\n    <meta name=\"geo.position\" content=\"\" />\r\n    <meta name=\"ICBM\" content=\"\" />\r\n</head>','','','',''),(7,1046,'2015-12-04 16:37:47','2015-12-04 16:37:47','<head>\r\n    <meta charset=\"utf-8\"><%$CMS%>\r\n    <!--[if lt IE 11]><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><![endif]-->\r\n	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, user-scalable=no\">\r\n	\r\n	<link rel=\"shortcut icon\" href=\"/xstorage/template/img/favicon.ico\">\r\n    <link rel=\"icon\" type=\"image/png\" href=\"/xstorage/template/img/favicon-16x16.png\" sizes=\"16x16\" />\r\n	<link rel=\"icon\" type=\"image/png\" href=\"/xstorage/template/img/favicon-32x32.png\" sizes=\"32x32\" />\r\n	\r\n    <%if $WTITLETAG !=\'\'%>\r\n        <title><%$WTITLETAG%> - <%xr_papsch postfix=\' - \'%><%xr_translate tag=\'###SITE_TITLE###\'%></title>\r\n    <%else%>\r\n        <%if $TITLETAG !=\'\'%>\r\n            <title><%$TITLETAG%><%if $P_ID != \'1\'%> - <%xr_papsch postfix=\' - \'%><%xr_translate tag=\'###SITE_TITLE###\'%><%/if%></title>\r\n        <%elseif $AHEADLINE!=\'\'%>\r\n            <title><%$AHEADLINE%> - <%xr_papsch postfix=\' - \'%><%xr_translate tag=\'###SITE_TITLE###\'%></title>\r\n        <%else%>\r\n            <title><%xr_translate tag=\'###SITE_TITLE###\'%></title>\r\n        <%/if%>\r\n    <%/if%>\r\n    \r\n    <meta name=\"description\" content=\"<%$DESCRIPTION%>\" />\r\n    <meta name=\"keywords\" content=\"<%$KEYWORDS%>\" />\r\n    <%if $ROBOTS == \'1\'%><meta name=\"robots\" content=\"noindex\" /><%/if%>\r\n    \r\n	<%xr_cssWrapperV3 less_ids=\'1\' css_ids=\'11,20,21,22,29,35,43\'%>\r\n\r\n	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->\r\n	<!--[if lt IE 9]>\r\n		<script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>\r\n		<script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>\r\n	<![endif]-->\r\n	\r\n	<!-- OG\r\n	<%$OG_IMAGE%>\r\n    -->\r\n    \r\n    <link rel=\"publisher\" href=\"https://plus.google.com/103372076990833143738/\" />\r\n    \r\n    <meta name=\"geo.region\" content=\"\" />\r\n    <meta name=\"geo.placename\" content=\"\" />\r\n    <meta name=\"geo.position\" content=\"\" />\r\n    <meta name=\"ICBM\" content=\"\" />\r\n</head>','','','',''),(8,1047,'2015-12-04 16:37:51','2015-12-04 16:37:51','<%xr_jsWrapperV3 s_ids=\'48,12,23,30,36,46\' var=\"packedjs\"%>','','','',''),(9,1044,'2015-12-04 16:39:08','2015-12-04 16:39:08','<!DOCTYPE html>\n<html lang=\"<%$P_LANG%>\">\n    \n    <!-- HTML HEADER ATOM -->\n    <%xr_atom a_id=1046 return=1 desc=\'HTML Header\'%>\n     \n	<body>\n	    <!-- Google Tag Manager -->\n        <noscript><iframe src=\"//www.googletagmanager.com/ns.html?id=GTM-PCJ6\"\n        height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>\n        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':\n        new Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],\n        j=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\n        \'//www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);\n        })(window,document,\'script\',\'dataLayer\',\'GTM-PCJ6\');</script>\n        <!-- End Google Tag Manager -->\n	    \n	    <!-- CONTENT -->\n		<%$CONTENT%>\n		\n	    <!-- JS ATOM -->\n		<%xr_atom a_id=1047 return=1 desc=\'js files\'%>\n	</body>\n</html>','','','',''),(10,1046,'2015-12-04 16:54:21','2015-12-04 16:54:21','<head>\r\n    <meta charset=\"utf-8\"><%$CMS%>\r\n    <!--[if lt IE 11]><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><![endif]-->\r\n	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, user-scalable=no\">\r\n	\r\n	<link rel=\"shortcut icon\" href=\"/xstorage/template/img/favicon.ico\">\r\n    <link rel=\"icon\" type=\"image/png\" href=\"/xstorage/template/img/favicon-16x16.png\" sizes=\"16x16\" />\r\n	<link rel=\"icon\" type=\"image/png\" href=\"/xstorage/template/img/favicon-32x32.png\" sizes=\"32x32\" />\r\n	\r\n    <%if $WTITLETAG !=\'\'%>\r\n        <title><%$WTITLETAG%> - <%xr_papsch postfix=\' - \'%><%xr_translate tag=\'###SITE_TITLE###\'%></title>\r\n    <%else%>\r\n        <%if $TITLETAG !=\'\'%>\r\n            <title><%$TITLETAG%><%if $P_ID != \'1\'%> - <%xr_papsch postfix=\' - \'%><%xr_translate tag=\'###SITE_TITLE###\'%><%/if%></title>\r\n        <%elseif $AHEADLINE!=\'\'%>\r\n            <title><%$AHEADLINE%> - <%xr_papsch postfix=\' - \'%><%xr_translate tag=\'###SITE_TITLE###\'%></title>\r\n        <%else%>\r\n            <title><%xr_translate tag=\'###SITE_TITLE###\'%></title>\r\n        <%/if%>\r\n    <%/if%>\r\n    \r\n    <meta name=\"description\" content=\"<%$DESCRIPTION%>\" />\r\n    <meta name=\"keywords\" content=\"<%$KEYWORDS%>\" />\r\n    <%if $ROBOTS == \'1\'%><meta name=\"robots\" content=\"noindex\" /><%/if%>\r\n    \r\n	<%xr_cssWrapperV3 less_ids=\'1\' css_ids=\'11,20,21,22,29,35,43,50\'%>\r\n\r\n	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->\r\n	<!--[if lt IE 9]>\r\n		<script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>\r\n		<script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>\r\n	<![endif]-->\r\n	\r\n	<!-- OG\r\n	<%$OG_IMAGE%>\r\n    -->\r\n    \r\n    <link rel=\"publisher\" href=\"https://plus.google.com/103372076990833143738/\" />\r\n    \r\n    <meta name=\"geo.region\" content=\"\" />\r\n    <meta name=\"geo.placename\" content=\"\" />\r\n    <meta name=\"geo.position\" content=\"\" />\r\n    <meta name=\"ICBM\" content=\"\" />\r\n</head>','','','',''),(11,1046,'2015-12-04 18:23:21','2015-12-04 18:23:21','<head>\r\n    <meta charset=\"utf-8\"><%$CMS%>\r\n    <!--[if lt IE 11]><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><![endif]-->\r\n	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, user-scalable=no\">\r\n	\r\n	<link rel=\"shortcut icon\" href=\"/xstorage/template/img/favicon/favicon.ico\">\r\n    <link rel=\"icon\" type=\"image/png\" href=\"/xstorage/template/img/favicon/favicon-16x16.png\" sizes=\"16x16\" />\r\n	<link rel=\"icon\" type=\"image/png\" href=\"/xstorage/template/img/favicon/favicon-32x32.png\" sizes=\"32x32\" />\r\n	\r\n    <%if $WTITLETAG !=\'\'%>\r\n        <title><%$WTITLETAG%> - <%xr_papsch postfix=\' - \'%><%xr_translate tag=\'###SITE_TITLE###\'%></title>\r\n    <%else%>\r\n        <%if $TITLETAG !=\'\'%>\r\n            <title><%$TITLETAG%><%if $P_ID != \'1\'%> - <%xr_papsch postfix=\' - \'%><%xr_translate tag=\'###SITE_TITLE###\'%><%/if%></title>\r\n        <%elseif $AHEADLINE!=\'\'%>\r\n            <title><%$AHEADLINE%> - <%xr_papsch postfix=\' - \'%><%xr_translate tag=\'###SITE_TITLE###\'%></title>\r\n        <%else%>\r\n            <title><%xr_translate tag=\'###SITE_TITLE###\'%></title>\r\n        <%/if%>\r\n    <%/if%>\r\n    \r\n    <meta name=\"description\" content=\"<%$DESCRIPTION%>\" />\r\n    <meta name=\"keywords\" content=\"<%$KEYWORDS%>\" />\r\n    <%if $ROBOTS == \'1\'%><meta name=\"robots\" content=\"noindex\" /><%/if%>\r\n    \r\n	<%xr_cssWrapperV3 less_ids=\'1\' css_ids=\'11,20,21,22,29,35,43,50\'%>\r\n\r\n	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->\r\n	<!--[if lt IE 9]>\r\n		<script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>\r\n		<script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>\r\n	<![endif]-->\r\n	\r\n	<!-- OG\r\n	<%$OG_IMAGE%>\r\n    -->\r\n    \r\n    <link rel=\"publisher\" href=\"https://plus.google.com/103372076990833143738/\" />\r\n    \r\n    <meta name=\"geo.region\" content=\"\" />\r\n    <meta name=\"geo.placename\" content=\"\" />\r\n    <meta name=\"geo.position\" content=\"\" />\r\n    <meta name=\"ICBM\" content=\"\" />\r\n</head>','','','',''),(12,1052,'2015-12-04 18:26:41','2015-12-04 18:26:41','<h1></h1>\n<h2></h2>\n<h3></h3>','','','',''),(13,1052,'2015-12-04 18:27:07','2015-12-04 18:27:07','<%if $HEADLINE1 != \'\'%><h1><%$HEADLINE1%></h1><%/if%>\n<%if $HEADLINE2 != \'\'%><h2><%$HEADLINE2%></h2><%/if%>\n<%if $HEADLINE3 != \'\'%><h3><%$HEADLINE3%></h3><%/if%>','','','',''),(14,1053,'2015-12-04 18:29:42','2015-12-04 18:29:42','<div class=\"banner-slider\">\n    \n</div>','','','',''),(15,1053,'2015-12-04 18:30:36','2015-12-04 18:30:36','<div class=\"banner-slider\">\n    <%foreach $SLIDES as $k => $slide%>\n    <%/foreach%>\n</div>','','','','');
/*!40000 ALTER TABLE `atoms_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atoms_settings`
--

DROP TABLE IF EXISTS `atoms_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atoms_settings` (
  `as_id` int(11) NOT NULL AUTO_INCREMENT,
  `as_fid` int(11) NOT NULL DEFAULT '0',
  `as_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `as_a_id` int(11) NOT NULL,
  `as_gui` enum('NORMAL','HIDDEN','READONLY') NOT NULL DEFAULT 'NORMAL',
  `as_group` varchar(255) NOT NULL,
  `as_name` varchar(255) NOT NULL,
  `as_name_cz` tinytext NOT NULL,
  `as_name_hu` tinytext NOT NULL,
  `as_name_sk` tinytext NOT NULL,
  `as_name_ro` tinytext NOT NULL,
  `as_name_it` tinytext NOT NULL,
  `as_name_fr` tinytext NOT NULL,
  `as_name_ru` tinytext NOT NULL,
  `as_name_en` tinytext NOT NULL,
  `as_name_de` tinytext NOT NULL,
  `as_name_bb` tinytext NOT NULL,
  `as_label` varchar(255) NOT NULL,
  `as_help` longtext NOT NULL,
  `as_sort` int(11) NOT NULL,
  `as_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `as_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `as_createdBy` int(11) NOT NULL,
  `as_lastmodBy` int(11) NOT NULL,
  `as_type` enum('WID','WATTRIBUTE','WIZARD2WIZARD','UNDEFINED','TEXT','TEXTAREA','HTML','FILE','FLOAT','COMBO','CONTAINER','TIMESTAMP','DATE','TIME','INT','RADIO','CHECKBOX','COMMENT','LINK','ARRAY','WIZARD','CAPTCHA','HIDDEN','PASSWORD','UPLOAD','ATOMLIST','WIZARDLIST','MD5PASSWORD','GEO-POINT','GEO-BOX','GEO-POLY','CONTAINER-IMAGES','CONTAINER-FILES','YN','SIMPLE_W2W','UNIQUE_W2W','DIR','PAGE','FRAME','ATOM','ACTION','COLLECTOR','REMOTE_FIELD','STAMPER','IMAGE','INFOPOOL_RECORD','TIMEMACHINE','REMOTE_RECORD','JSON','IMG_GALLERY','COLOR','VIDEO') NOT NULL DEFAULT 'UNDEFINED',
  `as_type_multilang` enum('Y','N') NOT NULL DEFAULT 'N',
  `as_config` longtext NOT NULL,
  `as_init` longtext NOT NULL,
  `as_content` longtext NOT NULL,
  `as_useAsHeader` enum('Y','N') NOT NULL DEFAULT 'N',
  `as_db` tinytext NOT NULL,
  `as_collection` varchar(255) NOT NULL,
  `as_gui_mode` int(11) NOT NULL,
  `as_gui_pos` enum('L','R','F','H','3') NOT NULL DEFAULT 'F',
  `as_gui_width` int(11) NOT NULL DEFAULT '1',
  `as_gui_height` int(11) NOT NULL,
  `as_useAsHeaderSort` int(11) NOT NULL DEFAULT '100000',
  `as_use4Export` enum('Y','N') NOT NULL DEFAULT 'N',
  `as_use4ExportSort` int(11) NOT NULL DEFAULT '100000',
  `as_fe_forms_a_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`as_id`),
  KEY `as_fid` (`as_fid`,`as_del`,`as_a_id`),
  KEY `xredaktor_wizards::mapLanguageFieldsToNormFields` (`as_a_id`,`as_del`,`as_type`),
  KEY `xredaktor_wizards::toStaticArray` (`as_a_id`,`as_del`),
  KEY `xredaktor_render::getASsMultiLangRecordsByIDAId` (`as_a_id`,`as_type_multilang`),
  KEY `xredaktor_render::getASsNonMultiLangHTMLRecordsByIDAId` (`as_a_id`,`as_type_multilang`,`as_del`),
  KEY `xredaktor_render::getASsSettingsComboCheckRadioRecordsByIDAId` (`as_a_id`,`as_type`)
) ENGINE=InnoDB AUTO_INCREMENT=3086 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atoms_settings`
--

LOCK TABLES `atoms_settings` WRITE;
/*!40000 ALTER TABLE `atoms_settings` DISABLE KEYS */;
INSERT INTO `atoms_settings` VALUES (369,0,'N',70,'NORMAL','Vanity','es_vanityPage','','','','','','','','','','','Vanity Page','',598,'2015-10-30 16:21:35','2011-08-10 09:17:55',0,0,'PAGE','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(370,0,'N',70,'NORMAL','Vanity','es_titleSettings','','','','','','','','','','','Datensatz Beschreibung','',595,'2015-10-30 16:21:35','2011-08-10 09:17:55',0,0,'TEXTAREA','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(373,0,'N',72,'NORMAL','','u_salutation','','','','','','','','','','','Anrede','',659,'2015-10-30 16:21:35','2011-08-10 09:30:04',0,0,'UNDEFINED','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(374,0,'N',73,'NORMAL','','u_title','','','','','','','','','','','Titel','',739,'2015-10-30 16:21:35','2011-08-11 13:30:59',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(375,0,'N',73,'NORMAL','','u_firstName','','','','','','','','','','','Vorname','',755,'2015-10-30 16:21:35','2011-08-11 13:30:59',0,0,'TEXT','N','','','','Y','','',0,'F',1,0,100000,'N',100000,0),(376,0,'N',73,'NORMAL','','u_lastName','','','','','','','','','','','Nachname','',759,'2015-10-30 16:21:35','2011-08-11 13:30:59',0,0,'TEXT','N','','','','Y','','',0,'F',1,0,100000,'N',100000,0),(377,0,'N',73,'NORMAL','','u_email','','','','','','','','','','','E-Mail','',707,'2015-10-30 16:21:35','2011-08-11 13:30:59',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(378,0,'N',73,'NORMAL','','u_username','','','','','','','','','','','Username','',650,'2015-10-30 16:21:35','2011-08-11 13:30:59',0,0,'TEXT','N','','','','Y','','',0,'F',1,0,100000,'N',100000,0),(379,0,'N',73,'NORMAL','','u_password','','','','','','','','','','','Passwort','',668,'2015-10-30 16:21:35','2011-08-11 13:30:59',0,0,'MD5PASSWORD','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(380,0,'N',73,'NORMAL','','u_company','','','','','','','','','','','Firma','',714,'2015-10-30 16:21:35','2011-08-11 13:30:59',0,0,'TEXT','N','','','','Y','','',0,'F',1,0,100000,'N',100000,0),(381,0,'N',73,'NORMAL','','u_phone','','','','','','','','','','','Telefon','',769,'2015-10-30 16:21:35','2011-08-11 13:30:59',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(382,0,'N',73,'NORMAL','','u_mobile','','','','','','','','','','','Mobil','',785,'2015-10-30 16:21:35','2011-08-11 13:30:59',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(384,0,'N',70,'NORMAL','Extended','es_databaseTableName','','','','','','','','','','','Datenbankname','',601,'2015-10-30 16:21:35','2011-08-10 09:36:23',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(388,0,'N',73,'NORMAL','','u_gender','','','','','','','','','','','Geschlecht','',733,'2015-10-30 16:21:35','2011-08-11 13:30:59',0,0,'RADIO','N','{\"l\":[{\"v\":\"W\",\"g\":\"Frau\",\"DE\":\"Frau\",\"EN\":\"Frau\"},{\"v\":\"M\",\"g\":\"Mann\",\"DE\":\"Mann\",\"EN\":\"Mann\"}],\"a\":{\"W\":{\"v\":\"W\",\"g\":\"Frau\",\"DE\":\"Frau\",\"EN\":\"Frau\"},\"M\":{\"v\":\"M\",\"g\":\"Mann\",\"DE\":\"Mann\",\"EN\":\"Mann\"}}}','','','N','','',0,'F',1,0,100000,'N',100000,0),(401,0,'N',77,'NORMAL','','allowBlank','','','','','','','','','','','Leere Eingabe','',647,'2015-10-30 16:21:35','2011-08-11 14:42:35',0,0,'RADIO','N','{\"l\":[{\"v\":\"Y\",\"g\":\"Ja\",\"DE\":\"Ja\",\"EN\":\"JA\"},{\"v\":\"N\",\"g\":\"Nein\",\"DE\":\"Nein\",\"EN\":\"Nein\"}],\"a\":{\"Y\":{\"v\":\"Y\",\"g\":\"Ja\",\"DE\":\"Ja\",\"EN\":\"JA\"},\"N\":{\"v\":\"N\",\"g\":\"Nein\",\"DE\":\"Nein\",\"EN\":\"Nein\"}}}','','','N','','',0,'F',1,0,100000,'N',100000,0),(402,0,'N',77,'NORMAL','','vtype','','','','','','','','','','','Validierungen','',683,'2015-10-30 16:21:35','2011-08-11 14:42:35',0,0,'RADIO','N','{\"l\":[{\"v\":\"email\",\"g\":\"E-Mail\",\"DE\":\"E-Mail\",\"EN\":\"\"},{\"v\":\"url\",\"g\":\"URL\",\"DE\":\"URL\",\"EN\":\"\"},{\"v\":\"ip\",\"g\":\"IP-Adresse\",\"DE\":\"IP-Adresse\",\"EN\":\"\"},{\"v\":\"youtube\",\"g\":\"Youtube Link\",\"DE\":\"Youtube Link\",\"EN\":\"\"},{\"v\":\"twitter\",\"g\":\"Twitter Link\",\"DE\":\"Twitter Link\",\"EN\":\"\"},{\"v\":\"facebook\",\"g\":\"Facebook Link\",\"DE\":\"Facebook Link\",\"EN\":\"\"}],\"a\":{\"email\":{\"v\":\"email\",\"g\":\"E-Mail\",\"DE\":\"E-Mail\",\"EN\":\"\"},\"url\":{\"v\":\"url\",\"g\":\"URL\",\"DE\":\"URL\",\"EN\":\"\"},\"ip\":{\"v\":\"ip\",\"g\":\"IP-Adresse\",\"DE\":\"IP-Adresse\",\"EN\":\"\"},\"youtube\":{\"v\":\"youtube\",\"g\":\"Youtube Link\",\"DE\":\"Youtube Link\",\"EN\":\"\"},\"twitter\":{\"v\":\"twitter\",\"g\":\"Twitter Link\",\"DE\":\"Twitter Link\",\"EN\":\"\"},\"facebook\":{\"v\":\"facebook\",\"g\":\"Facebook Link\",\"DE\":\"Facebook Link\",\"EN\":\"\"}}}','','','N','','',0,'F',1,0,100000,'N',100000,0),(406,0,'N',81,'NORMAL','','niceurl','','','','','','','','','','','Einstiegspunkt','',651,'2015-10-30 16:21:35','2011-08-11 21:23:53',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(408,0,'N',82,'NORMAL','','wa_attr','','','','','','','','','','','Wizard A - n:n Attribute','',675,'2015-10-30 16:21:35','2011-08-11 21:47:42',0,0,'WATTRIBUTE','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(409,0,'N',82,'NORMAL','','wb_attr','','','','','','','','','','','Wizard B - n:n Attribute','',713,'2015-10-30 16:21:35','2011-08-11 21:47:43',0,0,'WATTRIBUTE','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(415,0,'N',70,'NORMAL','Extended','es_postHooks','','','','','','','','','','','AutoHook','',600,'2015-10-30 16:21:35','2011-08-15 05:59:33',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(556,0,'N',126,'NORMAL','','ISO_CODE','','','','','','','','','','','','',654,'2015-10-30 16:21:35','2011-10-17 08:24:32',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(768,0,'N',183,'NORMAL','1. Verknüpfung','LINK','','','','','','','','','','','Verlinkung','',670,'2015-10-30 16:21:35','2011-12-01 22:29:00',0,0,'LINK','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(769,0,'N',183,'NORMAL','2. Filearchiv','FA','','','','','','','','','','','Datei','',700,'2015-10-30 16:21:35','2011-12-01 22:29:00',0,0,'FILE','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(770,0,'N',183,'HIDDEN','Allgemein','CHOOSE','','','','','','','','','','','Aktive Einstellung','',610,'2015-10-30 16:21:35','2011-12-01 22:29:00',0,0,'RADIO','N','{\"l\":[{\"v\":\"LINK\",\"g\":\"Link\",\"DE\":\"Verlinkung\",\"EN\":\"\",\"RU\":\"\",\"IT\":\"\",\"FR\":\"\",\"RO\":\"\",\"HU\":\"\",\"CZ\":\"\"},{\"v\":\"LB\",\"g\":\"Lightbox\",\"DE\":\"Lightbox\",\"EN\":\"\",\"RU\":\"\",\"IT\":\"\",\"FR\":\"\",\"RO\":\"\",\"HU\":\"\",\"CZ\":\"\"},{\"v\":\"EMAIL\",\"g\":\"E-Mail\",\"DE\":\"E-Mail\"},{\"v\":\"FA\",\"g\":\"File-Archiv\",\"DE\":\"File-Archiv\"}],\"a\":{\"LINK\":{\"v\":\"LINK\",\"g\":\"Link\",\"DE\":\"Verlinkung\",\"EN\":\"\",\"RU\":\"\",\"IT\":\"\",\"FR\":\"\",\"RO\":\"\",\"HU\":\"\",\"CZ\":\"\"},\"LB\":{\"v\":\"LB\",\"g\":\"Lightbox\",\"DE\":\"Lightbox\",\"EN\":\"\",\"RU\":\"\",\"IT\":\"\",\"FR\":\"\",\"RO\":\"\",\"HU\":\"\",\"CZ\":\"\"},\"EMAIL\":{\"v\":\"EMAIL\",\"g\":\"E-Mail\",\"DE\":\"E-Mail\"},\"FA\":{\"v\":\"FA\",\"g\":\"File-Archiv\",\"DE\":\"File-Archiv\"}}}','{\"CHOOSE\":\"LINK\"}','','N','','',0,'F',1,0,100000,'N',100000,0),(856,0,'N',196,'NORMAL','','text','','','','','','','','','','','Inhalt','',667,'2015-10-30 16:21:35','2011-12-16 17:15:57',0,0,'HTML','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(857,0,'N',196,'HIDDEN','','_tag_name','','','','','','','','','','','Tag-Name','',709,'2015-10-30 16:21:35','2011-12-16 17:27:22',0,0,'TEXT','N','','{\"_tag_name\":\"a\"}','','N','','',0,'F',1,0,100000,'N',100000,0),(858,0,'N',196,'HIDDEN','','_tag_class','','','','','','','','','','','Tag-Class','',718,'2015-10-30 16:21:35','2011-12-16 17:27:23',0,0,'TEXT','N','','{\"_tag_class\":\"lightboxclassreini\"}','','N','','',0,'F',1,0,100000,'N',100000,0),(859,0,'N',196,'NORMAL','','_tag_title','','','','','','','','','','','Title','',646,'2015-10-30 16:21:35','2011-12-16 17:27:42',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(862,0,'N',183,'NORMAL','4. LightBox','LB_TITLE','','','','','','','','','','','Title','',765,'2015-10-30 16:21:35','2011-12-16 21:13:18',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(863,0,'N',183,'NORMAL','4. LightBox','LB_HTML','','','','','','','','','','','Html','',774,'2015-10-30 16:21:35','2011-12-16 21:14:39',0,0,'HTML','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(931,0,'N',183,'NORMAL','3. E-Mail','E_MAIL_TO','','','','','','','','','','','E-Mail Adresse','',788,'2015-10-30 16:21:35','2012-02-19 21:31:05',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(932,0,'N',183,'NORMAL','3. E-Mail','E_MAIL_SUBJECT','','','','','','','','','','','Betreff','',784,'2015-10-30 16:21:35','2012-02-19 21:32:09',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(933,0,'N',183,'NORMAL','3. E-Mail','E_MAIL_BODY','','','','','','','','','','','Inhalt','',800,'2015-10-30 16:21:35','2012-02-19 21:35:34',0,0,'TEXTAREA','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(934,0,'N',183,'NORMAL','3. E-Mail','E_MAIL_CC','','','','','','','','','','','E-Mail Adresse (CC)','',794,'2015-10-30 16:21:35','2012-02-19 21:35:49',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(935,0,'N',183,'NORMAL','2. Filearchiv','FA_RESIZE_W','','','','','','','','','','','Breite','',745,'2015-10-30 16:21:35','2012-02-20 02:55:01',0,0,'INT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(936,0,'N',183,'NORMAL','2. Filearchiv','FA_RESIZE_H','','','','','','','','','','','Höhe','',756,'2015-10-30 16:21:35','2012-02-20 02:55:02',0,0,'INT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(937,0,'N',183,'NORMAL','2. Filearchiv','FA_RESIZE','','','','','','','','','','','Größenänderung','',727,'2015-10-30 16:21:35','2012-02-20 02:55:14',0,0,'COMBO','N','{\"l\":[{\"v\":\"N\",\"g\":\"Nein\",\"DE\":\"\"},{\"v\":\"Y\",\"g\":\"Ja\",\"DE\":\"\"}],\"a\":{\"N\":{\"v\":\"N\",\"g\":\"Nein\",\"DE\":\"\"},\"Y\":{\"v\":\"Y\",\"g\":\"Ja\",\"DE\":\"\"}}}','','','N','','',0,'F',1,0,100000,'N',100000,0),(938,0,'N',183,'NORMAL','2. Filearchiv','FA_MODE','','','','','','','','','','','Modus','',721,'2015-10-30 16:21:35','2012-02-20 02:57:06',0,0,'COMBO','N','{\"l\":[{\"v\":\"DOWNLOAD\",\"g\":\"Download\",\"DE\":\"\"},{\"v\":\"OPEN\",\"g\":\"In einem neuen Fenster \\u00f6ffnen\",\"DE\":\"\"}],\"a\":{\"DOWNLOAD\":{\"v\":\"DOWNLOAD\",\"g\":\"Download\",\"DE\":\"\"},\"OPEN\":{\"v\":\"OPEN\",\"g\":\"In einem neuen Fenster \\u00f6ffnen\",\"DE\":\"\"}}}','','','N','','',0,'F',1,0,100000,'N',100000,0),(1371,0,'N',353,'NORMAL','','CONTENT','','','','','','','','','','','alle Bausteine','',642,'2015-10-30 16:21:35','2015-02-24 15:56:35',0,0,'ATOMLIST','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1809,0,'N',534,'NORMAL','','NAME','','','','','','','','','','','','',819,'2015-10-30 16:21:35','2015-03-07 00:16:24',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1810,0,'N',534,'NORMAL','','URL','','','','','','','','','','','','',820,'2015-10-30 16:21:35','2015-03-07 00:18:34',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1811,0,'N',533,'NORMAL','','ip','','','','','','','','','','','','',821,'2015-10-30 16:21:35','2015-03-07 00:22:01',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1812,0,'N',533,'NORMAL','','settings','','','','','','','','','','','','',822,'2015-10-30 16:21:35','2015-03-07 00:22:03',0,0,'JSON','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1813,0,'N',533,'READONLY','','sent','','','','','','','','','','','','',823,'2015-10-30 16:21:35','2015-03-07 00:22:48',0,0,'TIMESTAMP','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1814,0,'N',533,'NORMAL','','status','','','','','','','','','','','','',824,'2015-10-30 16:21:35','2015-03-07 00:22:54',0,0,'COMBO','N','{\"l\":[{\"v\":\"WAIT\",\"g\":\"WAIT\",\"DE\":\"\",\"EN\":\"\"},{\"v\":\"DONE\",\"g\":\"DONE\",\"DE\":\"\",\"EN\":\"\"},{\"v\":\"ERROR\",\"g\":\"ERROR\",\"DE\":\"\",\"EN\":\"\"}],\"a\":{\"WAIT\":{\"v\":\"WAIT\",\"g\":\"WAIT\",\"DE\":\"\",\"EN\":\"\"},\"DONE\":{\"v\":\"DONE\",\"g\":\"DONE\",\"DE\":\"\",\"EN\":\"\"},\"ERROR\":{\"v\":\"ERROR\",\"g\":\"ERROR\",\"DE\":\"\",\"EN\":\"\"}}}','','','N','','',0,'F',1,0,100000,'N',100000,0),(1815,0,'N',126,'NORMAL','','NAME','','','','','','','','','','','','',825,'2015-10-30 16:21:35','2015-03-07 00:38:40',0,0,'TEXT','Y','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1816,0,'N',535,'NORMAL','','F_ID','','','','','','','','','','','Form ID','',826,'2015-10-30 16:21:35','2015-03-07 00:46:19',0,0,'WIZARD','N','536','','','N','','',0,'F',1,0,100000,'N',100000,0),(1817,0,'N',535,'NORMAL','','EMAIL_USER','','','','','','','','','','','E-Mail User','',827,'2015-10-30 16:21:35','2015-03-07 00:48:03',0,0,'TEXT','N','','','','Y','','',0,'F',1,0,1,'N',100000,0),(1818,0,'N',535,'NORMAL','','EMAIL_BODY','','','','','','','','','','','E-Mail Baustein ID','',828,'2015-10-30 16:21:35','2015-03-07 00:48:29',0,0,'INT','N','','','','Y','','',0,'F',1,0,3,'N',100000,0),(1820,0,'N',536,'NORMAL','','mail_actions','','','','','','','','','','','Mails','',830,'2015-10-30 16:21:35','2015-03-07 00:51:13',0,0,'WIZARDLIST','N','1816','','','N','','',0,'F',1,0,100000,'N',100000,0),(1821,0,'N',536,'NORMAL','','action_js','','','','','','','','','','','Action JS','',831,'2015-10-30 16:21:35','2015-03-07 00:52:42',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1822,0,'N',536,'NORMAL','','action_goto_page','','','','','','','','','','','Goto Page','',832,'2015-10-30 16:21:35','2015-03-07 00:52:52',0,0,'PAGE','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1826,0,'N',535,'NORMAL','','EMAIL_SUBJECT','','','','','','','','','','','Subject Baustein ID','',613,'2015-10-30 16:21:35','2015-03-07 11:38:16',0,0,'INT','Y','','','','Y','','',0,'F',1,0,2,'N',100000,0),(1827,0,'N',533,'NORMAL','','RESEND','','','','','','','','','','','Resend','',833,'2015-10-30 16:21:35','2015-03-07 11:44:54',0,0,'ACTION','N','{\"hook\":\"qmail::resend\",\"window_type\":\"hidden\"}','','','N','','',0,'F',1,0,100000,'N',100000,0),(1828,0,'N',533,'NORMAL','','OPEN','','','','','','','','','','','Open','',834,'2015-10-30 16:21:35','2015-03-07 11:45:35',0,0,'ACTION','N','{\"hook\":\"qmail::open\",\"window_type\":\"internal\"}','','','N','','',0,'F',1,0,100000,'N',100000,0),(1829,0,'N',539,'NORMAL','','NAME','','','','','','','','','','','','',835,'2015-10-30 16:21:35','2015-03-07 12:15:59',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1830,0,'N',539,'NORMAL','','IMG_W','','','','','','','','','','','','',836,'2015-10-30 16:21:35','2015-03-07 12:17:58',0,0,'UNDEFINED','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1831,0,'N',539,'NORMAL','','IMG_H','','','','','','','','','','','','',837,'2015-10-30 16:21:35','2015-03-07 12:18:01',0,0,'UNDEFINED','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1832,0,'N',539,'NORMAL','','RMODE','','','','','','','','','','','','',838,'2015-10-30 16:21:35','2015-03-07 12:18:04',0,0,'UNDEFINED','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1833,0,'N',539,'NORMAL','','QUALITY','','','','','','','','','','','','',839,'2015-10-30 16:21:35','2015-03-07 12:18:11',0,0,'UNDEFINED','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1834,0,'N',539,'NORMAL','','EXTENSION','','','','','','','','','','','','',840,'2015-10-30 16:21:35','2015-03-07 12:18:18',0,0,'UNDEFINED','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1835,0,'N',539,'NORMAL','','SITE_ID','','','','','','','','','','','','',841,'2015-10-30 16:21:35','2015-03-07 12:18:54',0,0,'UNDEFINED','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1836,0,'N',540,'NORMAL','','S_ID','','','','','','','','','','','','',842,'2015-10-30 16:21:35','2015-03-07 12:21:00',0,0,'UNDEFINED','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1837,0,'N',540,'NORMAL','','PROFILE_ID','','','','','','','','','','','','',843,'2015-10-30 16:21:35','2015-03-07 12:21:10',0,0,'UNDEFINED','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1838,0,'N',541,'NORMAL','','SIC_ID','','','','','','','','','','','','',844,'2015-10-30 16:21:35','2015-03-07 12:21:39',0,0,'UNDEFINED','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1839,0,'N',543,'NORMAL','','name','','','','','','','','','','','','',845,'2015-10-30 16:21:35','2015-03-07 12:22:07',0,0,'UNDEFINED','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1840,0,'N',543,'NORMAL','','cfg','','','','','','','','','','','','',846,'2015-10-30 16:21:35','2015-03-07 12:22:11',0,0,'UNDEFINED','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1841,0,'N',543,'NORMAL','','site_id','','','','','','','','','','','','',847,'2015-10-30 16:21:35','2015-03-07 12:23:26',0,0,'UNDEFINED','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1842,0,'N',544,'NORMAL','','SITE_ID','','','','','','','','','','','','',848,'2015-10-30 16:21:35','2015-03-07 12:28:51',0,0,'INT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1843,0,'N',544,'NORMAL','','LIMITS','','','','','','','','','','','','',849,'2015-10-30 16:21:35','2015-03-07 12:28:59',0,0,'WIZARDLIST','N','1880','','','N','','',0,'F',1,0,100000,'N',100000,0),(1844,0,'N',545,'NORMAL','','SITE_ID','','','','','','','','','','','Site Id','',850,'2015-10-30 16:21:35','2015-03-07 12:29:58',0,0,'INT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1845,0,'N',545,'NORMAL','','INITAL','','','','','','','','','','','','',851,'2015-10-30 16:21:35','2015-03-07 12:30:05',0,0,'WIZARDLIST','N','1881','','','N','','',0,'F',1,0,100000,'N',100000,0),(1846,0,'N',545,'NORMAL','','LIMITS','','','','','','','','','','','','',852,'2015-10-30 16:21:35','2015-03-07 12:30:14',0,0,'WIZARDLIST','N','1881','','','N','','',0,'F',1,0,100000,'N',100000,0),(1869,0,'N',551,'HIDDEN','','FAS_ID','','','','','','','','','','','FAS-ID','',853,'2015-10-30 16:21:35','2015-03-07 13:48:46',0,0,'INT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1870,0,'N',551,'NORMAL','','VIEW_MODE','','','','','','','','','','','View Mode','',854,'2015-10-30 16:21:35','2015-03-07 13:49:34',0,0,'RADIO','N','{\"l\":[{\"v\":\"PAGER\",\"g\":\"Pager\",\"DE\":\"\",\"EN\":\"\"},{\"v\":\"LOADMORE\",\"g\":\"Load More\",\"DE\":\"\",\"EN\":\"\"}],\"a\":{\"PAGER\":{\"v\":\"PAGER\",\"g\":\"Pager\",\"DE\":\"\",\"EN\":\"\"},\"LOADMORE\":{\"v\":\"LOADMORE\",\"g\":\"Load More\",\"DE\":\"\",\"EN\":\"\"}}}','','','N','','',0,'F',1,0,100000,'N',100000,0),(1871,0,'N',551,'NORMAL','','PAGER_PROFILE_ID','','','','','','','','','','','Pager Profile ID','',855,'2015-10-30 16:21:35','2015-03-07 13:50:10',0,0,'INT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1872,0,'N',551,'NORMAL','','LOADMORE_PROFILE_ID','','','','','','','','','','','LoadMore Profile ID','',856,'2015-10-30 16:21:35','2015-03-07 13:50:19',0,0,'INT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1873,0,'N',551,'NORMAL','','RECORD_ADD','','','','','','','','','','','Add Record','',857,'2015-10-30 16:21:35','2015-03-07 13:51:22',0,0,'YN','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1874,0,'N',551,'NORMAL','','RECORD_DEL','','','','','','','','','','','Delete Record','',858,'2015-10-30 16:21:35','2015-03-07 13:51:27',0,0,'YN','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1875,0,'N',551,'NORMAL','','RECORD_MOD','','','','','','','','','','','Edit Record','',859,'2015-10-30 16:21:35','2015-03-07 13:51:31',0,0,'YN','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1876,0,'N',551,'NORMAL','','RECORD_VIEW_A_ID','','','','','','','','','','','Record View Atom-ID','',860,'2015-10-30 16:21:35','2015-03-07 13:51:48',0,0,'ATOM','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1877,0,'N',551,'NORMAL','','RECORD_EDIT_A_ID','','','','','','','','','','','Record Edit Atom-ID','',861,'2015-10-30 16:21:35','2015-03-07 13:51:58',0,0,'ATOM','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1878,0,'N',551,'NORMAL','','RECORD_DEL_NOTIFY','','','','','','','','','','','Record Delete Message','',862,'2015-10-30 16:21:35','2015-03-07 13:52:26',0,0,'TEXT','Y','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1880,0,'N',554,'NORMAL','','LIMIT','','','','','','','','','','','','',864,'2015-10-30 16:21:35','2015-03-07 15:35:58',0,0,'INT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1881,0,'N',555,'NORMAL','','LIMIT','','','','','','','','','','','','',865,'2015-10-30 16:21:35','2015-03-07 15:54:38',0,0,'INT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1886,0,'N',547,'NORMAL','','WZ_ID','','','','','','','','','','','W-ID','',869,'2015-10-30 16:21:35','2015-03-07 16:26:42',0,0,'WIZARD','N','557','','','Y','','',0,'F',1,0,100000,'N',100000,0),(1887,0,'N',547,'NORMAL','','WZ_ATTRIBUTE','','','','','','','','','','','Attribut','',870,'2015-10-30 16:21:35','2015-03-07 16:26:46',0,0,'WATTRIBUTE','N','','','','Y','','',0,'F',1,0,100000,'N',100000,0),(1888,0,'N',547,'NORMAL','','TEXT','','','','','','','','','','','Text','',871,'2015-10-30 16:21:35','2015-03-07 16:28:39',0,0,'TEXT','N','','','','Y','','',0,'F',1,0,100000,'N',100000,0),(1889,0,'N',557,'NORMAL','','useInSerach','','','','','','','','','','','','',872,'2015-10-30 16:21:35','2015-03-07 16:34:19',0,0,'YN','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1890,0,'N',557,'NORMAL','','vanityUrls','','','','','','','','','','','','',873,'2015-10-30 16:21:35','2015-03-07 16:34:38',0,0,'WIZARDLIST','N','1886','','','N','','',0,'F',1,0,100000,'N',100000,0),(1891,0,'N',70,'NORMAL','Vanity','es_vanitySettings','','','','','','','','','','','Vanity Segements','',599,'2015-10-30 16:21:35','2015-03-07 16:39:40',0,0,'TEXTAREA','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1892,0,'N',547,'NORMAL','','Alternativ','','','','','','','','','','','Alternativ Text','',607,'2015-10-30 16:21:35','2015-03-07 16:42:33',0,0,'YN','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1895,0,'N',70,'NORMAL','SSEO','es_meta_keywords','','','','','','','','','','','Meta Keywörter','',876,'2015-11-03 23:13:49','2015-03-07 17:40:16',0,0,'WATTRIBUTE','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1896,0,'N',70,'NORMAL','SSEO','es_meta_description','','','','','','','','','','','Meta Titel','',877,'2015-11-03 23:13:43','2015-03-07 17:40:25',0,0,'WATTRIBUTE','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1897,0,'N',70,'NORMAL','SSEO','es_og_title','','','','','','','','','','','OpenGraph Titel','',878,'2015-11-03 23:13:24','2015-03-07 17:41:47',0,0,'WATTRIBUTE','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1898,0,'N',70,'NORMAL','SSEO','es_og_image','','','','','','','','','','','OpenGraph Bild','',879,'2015-11-03 23:11:18','2015-03-07 17:41:53',0,0,'WATTRIBUTE','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1913,0,'N',605,'NORMAL','','placeholder','','','','','','','','','','','Placeholder','',882,'2015-10-30 16:21:35','2015-03-09 12:04:44',0,0,'TEXT','Y','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1914,0,'N',605,'NORMAL','','required','','','','','','','','','','','Required','',883,'2015-10-30 16:21:35','2015-03-09 12:04:49',0,0,'YN','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1915,0,'N',605,'NORMAL','','validator','','','','','','','','','','','Valitation','',884,'2015-10-30 16:21:35','2015-03-09 12:04:52',0,0,'COMBO','N','{\"l\":[{\"v\":\"N\",\"g\":\"No\",\"DE\":\"\",\"EN\":\"\"},{\"v\":\"EMAIL\",\"g\":\"E-Mail\",\"DE\":\"\",\"EN\":\"\"},{\"v\":\"NOTEMPTY\",\"g\":\"Not Empty\",\"DE\":\"\",\"EN\":\"\"},{\"v\":\"NUMERIC\",\"g\":\"Numeric\",\"DE\":\"\",\"EN\":\"\"}],\"a\":{\"N\":{\"v\":\"N\",\"g\":\"No\",\"DE\":\"\",\"EN\":\"\"},\"EMAIL\":{\"v\":\"EMAIL\",\"g\":\"E-Mail\",\"DE\":\"\",\"EN\":\"\"},\"NOTEMPTY\":{\"v\":\"NOTEMPTY\",\"g\":\"Not Empty\",\"DE\":\"\",\"EN\":\"\"},\"NUMERIC\":{\"v\":\"NUMERIC\",\"g\":\"Numeric\",\"DE\":\"\",\"EN\":\"\"}}}','','','N','','',0,'F',1,0,100000,'N',100000,0),(1916,0,'N',605,'NORMAL','','value','','','','','','','','','','','Default Value','',885,'2015-10-30 16:21:35','2015-03-09 12:06:34',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1917,0,'N',605,'NORMAL','','readonly','','','','','','','','','','','Readonly','',886,'2015-10-30 16:21:35','2015-03-09 12:07:03',0,0,'YN','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1918,0,'N',605,'NORMAL','','hidden','','','','','','','','','','','Hidden','',887,'2015-10-30 16:21:35','2015-03-09 12:08:54',0,0,'YN','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1919,0,'N',605,'HIDDEN','','FAS_ID','','','','','','','','','','','FAS-ID','',568,'2015-10-30 16:21:35','2015-03-09 12:43:10',0,0,'INT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1920,0,'N',551,'NORMAL','','RECORD_EDIT_F_ID','','','','','','','','','','','Record Edit Form ID','',606,'2015-10-30 16:21:35','2015-03-09 15:26:40',0,0,'INT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1923,0,'N',612,'NORMAL','','active','','','','','','','','','','','Active State','',888,'2015-10-30 16:21:35','2015-03-10 14:30:37',0,0,'RADIO','N','{\"l\":[{\"v\":\"NO\",\"g\":\"No\",\"DE\":\"\",\"EN\":\"\"},{\"v\":\"YES\",\"g\":\"Yes\",\"DE\":\"\",\"EN\":\"\"},{\"v\":\"CONDITION\",\"g\":\"Condition\",\"DE\":\"\",\"EN\":\"\"}],\"a\":{\"NO\":{\"v\":\"NO\",\"g\":\"No\",\"DE\":\"\",\"EN\":\"\"},\"YES\":{\"v\":\"YES\",\"g\":\"Yes\",\"DE\":\"\",\"EN\":\"\"},\"CONDITION\":{\"v\":\"CONDITION\",\"g\":\"Condition\",\"DE\":\"\",\"EN\":\"\"}}}','','','N','','',0,'F',1,0,100000,'N',100000,0),(1924,0,'N',612,'NORMAL','','field','','','','','','','','','','','Condition - Field','',889,'2015-10-30 16:21:35','2015-03-10 14:31:12',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1925,0,'N',612,'NORMAL','','value','','','','','','','','','','','Condition - Value','',890,'2015-10-30 16:21:35','2015-03-10 14:37:21',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1936,0,'N',615,'NORMAL','','name','','','','','','','','','','','','',892,'2015-10-30 16:21:35','2015-03-11 15:05:08',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1943,0,'N',622,'NORMAL','','pnu_id_1','','','','','','','','','','','','',893,'2015-10-30 16:21:35','2015-03-12 17:26:56',0,0,'UNDEFINED','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1944,0,'N',622,'NORMAL','','pnu_id_2','','','','','','','','','','','','',894,'2015-10-30 16:21:35','2015-03-12 17:27:00',0,0,'UNDEFINED','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1963,0,'N',636,'NORMAL','','name','','','','','','','','','','','Name','',895,'2015-10-30 16:21:35','2015-03-14 09:08:56',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1964,0,'N',636,'NORMAL','','w','','','','','','','','','','','Breite','',896,'2015-10-30 16:21:35','2015-03-14 09:08:58',0,0,'INT','N','','','','Y','','',0,'F',1,0,100000,'N',100000,0),(1965,0,'N',636,'NORMAL','','h','','','','','','','','','','','Höhe','',897,'2015-10-30 16:21:35','2015-03-14 09:09:02',0,0,'INT','N','','','','Y','','',0,'F',1,0,100000,'N',100000,0),(1966,0,'N',636,'NORMAL','','q','','','','','','','','','','','Qualität','',898,'2015-10-30 16:21:35','2015-03-14 09:09:08',0,0,'INT','N','','','','Y','','',0,'F',1,0,100000,'N',100000,0),(1967,0,'N',636,'NORMAL','','rmode','','','','','','','','','','','Mode','',899,'2015-10-30 16:21:35','2015-03-14 09:09:14',0,0,'TEXT','N','','','','Y','','',0,'F',1,0,100000,'N',100000,0),(1968,0,'N',636,'NORMAL','','class','','','','','','','','','','','Class','',900,'2015-10-30 16:21:35','2015-03-14 09:09:16',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(1969,0,'N',636,'NORMAL','','ext','','','','','','','','','','','Extension','',901,'2015-10-30 16:21:35','2015-03-14 09:09:19',0,0,'TEXT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(2011,0,'N',639,'NORMAL','','wz_id','','','','','','','','','','','','',902,'2015-10-30 16:21:35','2015-03-14 16:29:49',0,0,'INT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(2012,0,'N',639,'NORMAL','','wz_r_id','','','','','','','','','','','','',903,'2015-10-30 16:21:35','2015-03-14 16:29:53',0,0,'INT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(2013,0,'N',639,'NORMAL','','type','','','','','','','','','','','','',904,'2015-10-30 16:21:35','2015-03-14 16:30:02',0,0,'COMBO','N','{\"l\":[{\"v\":\"FILE\",\"g\":\"FILE\",\"DE\":\"\",\"EN\":\"\"},{\"v\":\"LINK\",\"g\":\"LINK\",\"DE\":\"\",\"EN\":\"\"},{\"v\":\"RECORD\",\"g\":\"RECORD\",\"DE\":\"\",\"EN\":\"\"},{\"v\":\"ATOM\",\"g\":\"ATOM\",\"DE\":\"\",\"EN\":\"\"},{\"v\":\"TM\",\"g\":\"TM\",\"DE\":\"\",\"EN\":\"\"}],\"a\":{\"FILE\":{\"v\":\"FILE\",\"g\":\"FILE\",\"DE\":\"\",\"EN\":\"\"},\"LINK\":{\"v\":\"LINK\",\"g\":\"LINK\",\"DE\":\"\",\"EN\":\"\"},\"RECORD\":{\"v\":\"RECORD\",\"g\":\"RECORD\",\"DE\":\"\",\"EN\":\"\"},\"ATOM\":{\"v\":\"ATOM\",\"g\":\"ATOM\",\"DE\":\"\",\"EN\":\"\"},\"TM\":{\"v\":\"TM\",\"g\":\"TM\",\"DE\":\"\",\"EN\":\"\"}}}','','','N','','',0,'F',1,0,100000,'N',100000,0),(2014,0,'N',639,'NORMAL','','wz_idx','','','','','','','','','','','','',905,'2015-10-30 16:21:35','2015-03-14 16:30:09',0,0,'INT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(2015,0,'N',639,'NORMAL','','wz_r_idx','','','','','','','','','','','','',906,'2015-10-30 16:21:35','2015-03-14 16:30:14',0,0,'INT','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(3059,0,'N',617,'NORMAL','SEO','seo_url','','','','','','','','','','','URL','',0,'2015-11-03 16:27:56','2015-11-03 15:19:50',0,0,'TEXT','Y','','','','N','','',0,'F',1,0,100000,'N',100000,0),(3060,0,'N',617,'NORMAL','SEO','seo_title','','','','','','','','','','','Titel','',1,'2015-11-03 16:10:58','2015-11-03 15:19:51',0,0,'TEXT','Y','','','','N','','',0,'F',1,0,100000,'N',100000,0),(3061,0,'N',617,'NORMAL','SEO','seo_desc','','','','','','','','','','','Beschreibung','',2,'2015-11-03 16:10:59','2015-11-03 15:19:52',0,0,'TEXTAREA','Y','','','','N','','',0,'F',1,0,100000,'N',100000,0),(3062,0,'N',617,'NORMAL','SEO','seo_keys','','','','','','','','','','','Keywords','',3,'2015-11-03 16:11:02','2015-11-03 15:19:52',0,0,'TEXTAREA','Y','','','','N','','',0,'F',1,0,100000,'N',100000,0),(3063,0,'N',617,'NORMAL','OG','og_title','','','','','','','','','','','Titel','',5,'2015-11-03 16:11:08','2015-11-03 15:24:57',0,0,'TEXT','Y','','','','N','','',0,'F',1,0,100000,'N',100000,0),(3064,0,'N',617,'NORMAL','OG','og_desc','','','','','','','','','','','Beschreibung','',6,'2015-11-03 16:11:10','2015-11-03 15:25:06',0,0,'TEXTAREA','Y','','','','N','','',0,'F',1,0,100000,'N',100000,0),(3065,0,'N',617,'NORMAL','OG','og_img','','','','','','','','','','','Bild','',7,'2015-11-03 16:11:14','2015-11-03 15:25:13',0,0,'IMAGE','Y','','','','N','','',0,'F',1,0,100000,'N',100000,0),(3066,0,'N',617,'NORMAL','OG','og_type','','','','','','','','','','','Typ','',8,'2015-11-03 16:11:15','2015-11-03 15:25:20',0,0,'COMBO','Y','{\"l\":[{\"v\":\"website\",\"g\":\"Website\",\"DE\":\"\",\"EN\":\"\"},{\"v\":\"profile\",\"g\":\"Profile\",\"DE\":\"\",\"EN\":\"\"},{\"v\":\"book\",\"g\":\"Book\",\"DE\":\"\",\"EN\":\"\"},{\"v\":\"article\",\"g\":\"Article\",\"DE\":\"\",\"EN\":\"\"},{\"v\":\"video\",\"g\":\"Video\",\"DE\":\"\",\"EN\":\"\"},{\"v\":\"music\",\"g\":\"Music\",\"DE\":\"\",\"EN\":\"\"}],\"a\":{\"website\":{\"v\":\"website\",\"g\":\"Website\",\"DE\":\"\",\"EN\":\"\"},\"profile\":{\"v\":\"profile\",\"g\":\"Profile\",\"DE\":\"\",\"EN\":\"\"},\"book\":{\"v\":\"book\",\"g\":\"Book\",\"DE\":\"\",\"EN\":\"\"},\"article\":{\"v\":\"article\",\"g\":\"Article\",\"DE\":\"\",\"EN\":\"\"},\"video\":{\"v\":\"video\",\"g\":\"Video\",\"DE\":\"\",\"EN\":\"\"},\"music\":{\"v\":\"music\",\"g\":\"Music\",\"DE\":\"\",\"EN\":\"\"}}}','','','N','','',0,'F',1,0,100000,'N',100000,0),(3067,0,'N',617,'NORMAL','SEO','seo_canonical','','','','','','','','','','','Canonical','',4,'2015-11-03 16:11:17','2015-11-03 15:27:13',0,0,'LINK','Y','','','','N','','',0,'F',1,0,100000,'N',100000,0),(3075,0,'N',1044,'NORMAL','SEO','TITLETAG','','','','','','','','','','','Seitentitel','',79,'2015-12-04 16:24:32','2015-12-04 16:24:32',0,0,'TEXT','Y','','','','N','','',0,'F',1,0,100000,'N',100000,0),(3076,0,'N',1044,'NORMAL','SEO','KEYWORDS','','','','','','','','','','','Keywords','',127,'2015-12-04 16:24:32','2015-12-04 16:24:32',0,0,'TEXTAREA','Y','','','','N','','',0,'F',1,0,100000,'N',100000,0),(3077,0,'N',1044,'NORMAL','SEO','DESCRIPTION','','','','','','','','','','','Description','',152,'2015-12-04 16:24:32','2015-12-04 16:24:32',0,0,'TEXTAREA','Y','','','','N','','',0,'F',1,0,100000,'N',100000,0),(3078,0,'N',1044,'NORMAL','SEO','ROBOTS','','','','','','','','','','','Seite vor Robots verbergen','',158,'2015-12-04 16:24:32','2015-12-04 16:24:32',0,0,'COMBO','N','{\"l\":[{\"v\":\"0\",\"g\":\"nein\",\"DE\":\"nein\",\"EN\":\"no\",\"RU\":\"\",\"FR\":\"\",\"IT\":\"\",\"RO\":\"\",\"HU\":\"\",\"CZ\":\"\"},{\"v\":\"1\",\"g\":\"ja\",\"DE\":\"ja\",\"EN\":\"yes\",\"RU\":\"\",\"FR\":\"\",\"IT\":\"\",\"RO\":\"\",\"HU\":\"\",\"CZ\":\"\"}],\"a\":{\"0\":{\"v\":\"0\",\"g\":\"nein\",\"DE\":\"nein\",\"EN\":\"no\",\"RU\":\"\",\"FR\":\"\",\"IT\":\"\",\"RO\":\"\",\"HU\":\"\",\"CZ\":\"\"},\"1\":{\"v\":\"1\",\"g\":\"ja\",\"DE\":\"ja\",\"EN\":\"yes\",\"RU\":\"\",\"FR\":\"\",\"IT\":\"\",\"RO\":\"\",\"HU\":\"\",\"CZ\":\"\"}}}','{\"ROBOTS\":\"0\"}','','N','','',0,'F',1,0,100000,'N',100000,0),(3079,0,'N',1044,'NORMAL','','CONTENT','','','','','','','','','','','Bausteine','',160,'2015-12-04 16:24:32','2015-12-04 16:24:32',0,0,'CONTAINER','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(3080,0,'N',1052,'NORMAL','','HEADLINE1','','','','','','','','','','','Überschrift 1','',0,'2015-12-04 18:25:30','2015-12-04 18:24:50',0,0,'TEXT','Y','','','','N','','',0,'F',1,0,100000,'N',100000,0),(3081,0,'N',1052,'NORMAL','','HEADLINE2','','','','','','','','','','','Überschrift 2','',1,'2015-12-04 18:25:44','2015-12-04 18:25:04',0,0,'TEXT','Y','','','','N','','',0,'F',1,0,100000,'N',100000,0),(3082,0,'N',1052,'NORMAL','','HEADLINE3','','','','','','','','','','','Überschrift 3','',2,'2015-12-04 18:25:47','2015-12-04 18:25:17',0,0,'TEXT','Y','','','','N','','',0,'F',1,0,100000,'N',100000,0),(3083,0,'N',1054,'NORMAL','','IMG','','','','','','','','','','','Bild','',0,'2015-12-04 18:28:15','2015-12-04 18:27:51',0,0,'IMAGE','N','','','','N','','',0,'F',1,0,100000,'N',100000,0),(3084,0,'N',1054,'NORMAL','','TEXT','','','','','','','','','','','Text','',1,'2015-12-04 18:28:22','2015-12-04 18:27:57',0,0,'TEXT','Y','','','','N','','',0,'F',1,0,100000,'N',100000,0),(3085,0,'N',1053,'NORMAL','','SLIDES','','','','','','','','','','','Slides','',0,'2015-12-04 18:29:01','2015-12-04 18:28:32',0,0,'ATOMLIST','N','1054','','','N','','',0,'F',1,0,100000,'N',100000,0);
/*!40000 ALTER TABLE `atoms_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `be_language`
--

DROP TABLE IF EXISTS `be_language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `be_language` (
  `bel_id` int(11) NOT NULL AUTO_INCREMENT,
  `bel_ISO` varchar(2) NOT NULL,
  `bel_name` varchar(255) NOT NULL,
  `bel_online` enum('Y','N') NOT NULL DEFAULT 'N',
  `bel_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `bel_sort` int(11) NOT NULL,
  `bel_fid` int(11) NOT NULL,
  `bel_lastMod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bel_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bel_lastModBy` int(11) NOT NULL,
  `bel_createdBy` int(11) NOT NULL,
  PRIMARY KEY (`bel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `be_language`
--

LOCK TABLES `be_language` WRITE;
/*!40000 ALTER TABLE `be_language` DISABLE KEYS */;
INSERT INTO `be_language` VALUES (1,'DE','Deutsch','Y','N',0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0),(2,'EN','English','Y','N',0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0),(3,'RU','Russia','N','N',0,0,'2013-03-11 11:53:17','0000-00-00 00:00:00',0,0);
/*!40000 ALTER TABLE `be_language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `be_tags`
--

DROP TABLE IF EXISTS `be_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `be_tags` (
  `bet_id` int(11) NOT NULL AUTO_INCREMENT,
  `bet_fid` int(11) NOT NULL,
  `bet_sort` int(11) NOT NULL,
  `bet_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `bet_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bet_lastChangedBy` int(11) NOT NULL,
  `bet_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bet_createdBy` int(11) NOT NULL,
  `bet_found` enum('Y','N') NOT NULL DEFAULT 'N',
  `bet_foundFile` tinytext NOT NULL,
  `bet_type` enum('AUTO','MANUAL') NOT NULL DEFAULT 'AUTO',
  `bet_exportAlways` enum('Y','N') NOT NULL DEFAULT 'N',
  `bet_tag` varchar(255) NOT NULL,
  `bet_t_cz` tinytext NOT NULL,
  `bet_t_hu` tinytext NOT NULL,
  `bet_t_sk` tinytext NOT NULL,
  `bet_t_ro` tinytext NOT NULL,
  `bet_t_it` tinytext NOT NULL,
  `bet_t_fr` tinytext NOT NULL,
  `bet_t_ru` tinytext NOT NULL,
  `bet_t_en` tinytext NOT NULL,
  `bet_t_de` tinytext NOT NULL,
  `bet_t_bb` tinytext NOT NULL,
  `bet_tag_md5` varchar(50) NOT NULL,
  `bet_t_xx` tinytext NOT NULL,
  PRIMARY KEY (`bet_id`),
  UNIQUE KEY `bet_tag_md5` (`bet_tag_md5`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `be_tags`
--

LOCK TABLES `be_tags` WRITE;
/*!40000 ALTER TABLE `be_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `be_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `be_users`
--

DROP TABLE IF EXISTS `be_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `be_users` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_og_mode_en` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_og_mode_de` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_seo_mode_en` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_seo_mode_de` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_u_title` text NOT NULL COMMENT '374::TEXT:: Titel',
  `wz_u_firstName` text NOT NULL COMMENT '375::TEXT:: Vorname',
  `wz_u_lastName` text NOT NULL COMMENT '376::TEXT:: Nachname',
  `wz_u_email` text NOT NULL COMMENT '377::TEXT:: E-Mail',
  `wz_u_username` text NOT NULL COMMENT '378::TEXT:: Username',
  `wz_u_password` tinytext NOT NULL COMMENT '379::MD5PASSWORD:: Passwort',
  `wz_u_company` text NOT NULL COMMENT '380::TEXT:: Firma',
  `wz_u_phone` text NOT NULL COMMENT '381::TEXT:: Telefon',
  `wz_u_mobile` text NOT NULL COMMENT '382::TEXT:: Mobil',
  `wz_u_gender` enum('W','M') NOT NULL DEFAULT 'W' COMMENT '388::RADIO:: Geschlecht',
  `wz_u_is_admin` enum('Y','N') NOT NULL DEFAULT 'N',
  `wz_u_start_cfg` longtext NOT NULL COMMENT '1580::TEXTAREA:: Start - Konfiguration',
  `wz_u_limit_sites` longtext NOT NULL COMMENT '1571::TEXTAREA:: Projekte',
  `wz_u_limit_pages` longtext NOT NULL COMMENT '1572::TEXTAREA:: Seiten',
  `wz_u_limit_mode` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '1573::COMBO:: Limitierungen',
  `wz_u_limits_SITES` enum('on','off') NOT NULL DEFAULT 'off' COMMENT '1574::CHECKBOX:: Zugänge',
  `wz_u_limits_PAGES` enum('on','off') NOT NULL DEFAULT 'off' COMMENT '1574::CHECKBOX:: Zugänge',
  `wz_u_limits_FRAMES` enum('on','off') NOT NULL DEFAULT 'off' COMMENT '1574::CHECKBOX:: Zugänge',
  `wz_u_limits_ATOMS` enum('on','off') NOT NULL DEFAULT 'off' COMMENT '1574::CHECKBOX:: Zugänge',
  `wz_u_limits_WIZARDS` enum('on','off') NOT NULL DEFAULT 'off' COMMENT '1574::CHECKBOX:: Zugänge',
  `wz_u_limits_FA` enum('on','off') NOT NULL DEFAULT 'off' COMMENT '1574::CHECKBOX:: Zugänge',
  `wz_u_limits_INFOPOOL` enum('on','off') NOT NULL DEFAULT 'off' COMMENT '1574::CHECKBOX:: Zugänge',
  `wz_u_limits_FE_TRANS` enum('on','off') NOT NULL DEFAULT 'off' COMMENT '1574::CHECKBOX:: Zugänge',
  `wz_u_limit_frames` longtext NOT NULL COMMENT '1575::TEXTAREA:: Seitenelemente',
  `wz_u_limit_atoms` longtext NOT NULL COMMENT '1576::TEXTAREA:: Bausteine',
  `wz_u_limit_wizards` longtext NOT NULL COMMENT '1577::TEXTAREA:: Wizards',
  `wz_u_limit_fa` longtext NOT NULL COMMENT '1578::TEXTAREA:: Filearchiv',
  `wz_u_limit_infopool` longtext NOT NULL COMMENT '1579::TEXTAREA:: Infopool',
  `wz_xme_pages_root` int(11) NOT NULL COMMENT '1239::INT:: Seiten-Wurzel',
  `wz_xme_frames` longtext NOT NULL COMMENT '1240::TEXTAREA:: Templates (Frames)',
  `wz_xme_siteid` int(11) NOT NULL COMMENT '1241::INT:: Newsletter SID',
  `wz_u_start_lang` text NOT NULL COMMENT '1581::TEXT:: Start Sprache',
  PRIMARY KEY (`wz_id`),
  KEY `wz_fid` (`wz_fid`,`wz_del`),
  KEY `wz_fid_2` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `wz_del` (`wz_del`),
  KEY `wz_del_2` (`wz_del`,`wz_online`),
  KEY `wz_fid_3` (`wz_fid`,`wz_del`),
  KEY `wz_fid_4` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `wz_del_3` (`wz_del`),
  KEY `wz_del_4` (`wz_del`,`wz_online`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='WIZARD :: be_users (73)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `be_users`
--

LOCK TABLES `be_users` WRITE;
/*!40000 ALTER TABLE `be_users` DISABLE KEYS */;
INSERT INTO `be_users` VALUES (1,'AUTO','AUTO','AUTO','AUTO',0,1,'','',0,'N','Y','2015-02-24 15:25:32','2011-08-15 08:36:34',0,0,'','gitgo','GmbH','webdev@gitgo.at','admin','2037acddc3f0379ecee17a10be843524','gitgo','0268222688','','M','Y','','','','N','off','off','off','off','off','off','off','off','','','','','',0,'',0,'');
/*!40000 ALTER TABLE `be_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `be_users_history`
--

DROP TABLE IF EXISTS `be_users_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `be_users_history` (
  `buh_id` int(11) NOT NULL AUTO_INCREMENT,
  `buh_sort` int(11) NOT NULL,
  `buh_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `buh_fid` int(11) NOT NULL,
  `buh_name` varchar(10) NOT NULL,
  `buh_r_id` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `buh_wz_id` int(11) NOT NULL,
  `buh_wz_name` varchar(255) NOT NULL,
  `buh_table` varchar(255) NOT NULL,
  `buh_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `buh_createdBy` int(11) NOT NULL,
  `buh_type` enum('INSERT','UPDATE','DELETE','OTHER','LOGIN','LOGOFF','UPLOAD','FILE_DELETE','FILE_MOVE','DIR_CREATED','DIR_DELETE','DIR_MOVE','FILE_COPY','USER_DELETE','USER_INSERT','USER_UPDATE','ROLE_INSERT','ROLE_UPDATE','ROLE_DELETE','CREATE','MOVE','SORT') NOT NULL DEFAULT 'OTHER',
  `buh_scope` varchar(50) NOT NULL,
  `buh_human` varchar(255) NOT NULL,
  `buh_diff` longtext NOT NULL,
  PRIMARY KEY (`buh_id`),
  KEY `buh_scope` (`buh_scope`),
  KEY `buh_scope_2` (`buh_scope`),
  KEY `buh_wz_id` (`buh_wz_id`,`buh_scope`),
  KEY `buh_del` (`buh_del`,`buh_wz_id`,`buh_scope`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `be_users_history`
--

LOCK TABLES `be_users_history` WRITE;
/*!40000 ALTER TABLE `be_users_history` DISABLE KEYS */;
INSERT INTO `be_users_history` VALUES (1,0,'N',0,'',0,0,'','','2015-12-04 15:59:06',1,'LOGIN','','User 1: LOGIN',''),(2,0,'N',0,'',0,0,'','','2015-12-04 15:59:27',1,'LOGIN','','User 1: RELOAD',''),(3,0,'N',0,'',0,0,'','','2015-12-04 16:06:55',1,'LOGIN','','User 1: RELOAD',''),(4,0,'N',0,'',0,0,'','','2015-12-04 16:07:01',1,'LOGIN','','User 1: RELOAD',''),(5,0,'N',0,'',0,0,'','','2015-12-04 16:07:22',1,'LOGIN','','User 1: RELOAD',''),(6,0,'N',0,'',0,0,'','','2015-12-04 16:07:29',1,'LOGIN','','User 1: RELOAD',''),(7,0,'N',0,'',0,0,'','','2015-12-04 16:08:21',1,'LOGIN','','User 1: LOGIN',''),(8,0,'N',0,'',0,0,'','','2015-12-04 16:08:34',1,'LOGIN','','User 1: RELOAD',''),(9,0,'N',0,'',1,0,'','storage','2015-12-04 16:09:58',1,'INSERT','','Datensatz 1 wurde angelegt',''),(10,0,'N',0,'',1,0,'','storage','2015-12-04 16:09:58',1,'DIR_CREATED','','Verzeichnis 1 wurde angelegt.',''),(11,0,'N',0,'',2,0,'','storage','2015-12-04 16:10:27',1,'INSERT','','Datensatz 2 wurde angelegt',''),(12,0,'N',0,'',2,0,'','storage','2015-12-04 16:10:27',1,'DIR_CREATED','','Verzeichnis 2 wurde angelegt.',''),(13,0,'N',0,'',3,0,'','storage','2015-12-04 16:10:31',1,'INSERT','','Datensatz 3 wurde angelegt',''),(14,0,'N',0,'',3,0,'','storage','2015-12-04 16:10:31',1,'DIR_CREATED','','Verzeichnis 3 wurde angelegt.',''),(15,0,'N',0,'',4,0,'','storage','2015-12-04 16:10:35',1,'INSERT','','Datensatz 4 wurde angelegt',''),(16,0,'N',0,'',4,0,'','storage','2015-12-04 16:10:35',1,'DIR_CREATED','','Verzeichnis 4 wurde angelegt.',''),(17,0,'N',0,'',5,0,'','storage','2015-12-04 16:11:32',1,'INSERT','','Datensatz 5 wurde angelegt',''),(18,0,'N',0,'',5,0,'','storage','2015-12-04 16:11:32',1,'DIR_CREATED','','Verzeichnis 5 wurde angelegt.',''),(19,0,'N',0,'',6,0,'','storage','2015-12-04 16:12:44',1,'INSERT','','Datensatz 6 wurde angelegt',''),(20,0,'N',0,'',6,0,'','storage','2015-12-04 16:12:44',1,'DIR_CREATED','','Verzeichnis 6 wurde angelegt.',''),(21,0,'N',0,'',7,0,'','storage','2015-12-04 16:12:50',1,'UPLOAD','','Datei 7 wurde upgeloaded.',''),(22,0,'N',0,'',7,0,'','storage','2015-12-04 16:13:05',1,'FILE_DELETE','','Datei 7 wurde gelöscht.',''),(23,0,'N',0,'',8,0,'','storage','2015-12-04 16:13:08',1,'INSERT','','Datensatz 8 wurde angelegt',''),(24,0,'N',0,'',8,0,'','storage','2015-12-04 16:13:08',1,'DIR_CREATED','','Verzeichnis 8 wurde angelegt.',''),(25,0,'N',0,'',9,0,'','storage','2015-12-04 16:13:11',1,'INSERT','','Datensatz 9 wurde angelegt',''),(26,0,'N',0,'',9,0,'','storage','2015-12-04 16:13:11',1,'DIR_CREATED','','Verzeichnis 9 wurde angelegt.',''),(27,0,'N',0,'',10,0,'','storage','2015-12-04 16:13:14',1,'INSERT','','Datensatz 10 wurde angelegt',''),(28,0,'N',0,'',10,0,'','storage','2015-12-04 16:13:14',1,'DIR_CREATED','','Verzeichnis 10 wurde angelegt.',''),(29,0,'N',0,'',11,0,'','storage','2015-12-04 16:13:19',1,'UPLOAD','','Datei 11 wurde upgeloaded.',''),(30,0,'N',0,'',12,0,'','storage','2015-12-04 16:13:26',1,'UPLOAD','','Datei 12 wurde upgeloaded.',''),(31,0,'N',0,'',13,0,'','storage','2015-12-04 16:13:32',1,'UPLOAD','','Datei 13 wurde upgeloaded.',''),(32,0,'N',0,'',14,0,'','storage','2015-12-04 16:13:32',1,'UPLOAD','','Datei 14 wurde upgeloaded.',''),(33,0,'N',0,'',15,0,'','storage','2015-12-04 16:13:32',1,'UPLOAD','','Datei 15 wurde upgeloaded.',''),(34,0,'N',0,'',16,0,'','storage','2015-12-04 16:13:32',1,'UPLOAD','','Datei 16 wurde upgeloaded.',''),(35,0,'N',0,'',17,0,'','storage','2015-12-04 16:13:33',1,'UPLOAD','','Datei 17 wurde upgeloaded.',''),(36,0,'N',0,'',18,0,'','storage','2015-12-04 16:14:29',1,'INSERT','','Datensatz 18 wurde angelegt',''),(37,0,'N',0,'',18,0,'','storage','2015-12-04 16:14:29',1,'DIR_CREATED','','Verzeichnis 18 wurde angelegt.',''),(38,0,'N',0,'',19,0,'','storage','2015-12-04 16:14:50',1,'UPLOAD','','Datei 19 wurde upgeloaded.',''),(39,0,'N',0,'',20,0,'','storage','2015-12-04 16:14:50',1,'UPLOAD','','Datei 20 wurde upgeloaded.',''),(40,0,'N',0,'',21,0,'','storage','2015-12-04 16:14:50',1,'UPLOAD','','Datei 21 wurde upgeloaded.',''),(41,0,'N',0,'',22,0,'','storage','2015-12-04 16:14:50',1,'UPLOAD','','Datei 22 wurde upgeloaded.',''),(42,0,'N',0,'',23,0,'','storage','2015-12-04 16:14:50',1,'UPLOAD','','Datei 23 wurde upgeloaded.',''),(43,0,'N',0,'',24,0,'','storage','2015-12-04 16:14:51',1,'UPLOAD','','Datei 24 wurde upgeloaded.',''),(44,0,'N',0,'',25,0,'','storage','2015-12-04 16:15:32',1,'INSERT','','Datensatz 25 wurde angelegt',''),(45,0,'N',0,'',25,0,'','storage','2015-12-04 16:15:32',1,'DIR_CREATED','','Verzeichnis 25 wurde angelegt.',''),(46,0,'N',0,'',26,0,'','storage','2015-12-04 16:15:37',1,'INSERT','','Datensatz 26 wurde angelegt',''),(47,0,'N',0,'',26,0,'','storage','2015-12-04 16:15:37',1,'DIR_CREATED','','Verzeichnis 26 wurde angelegt.',''),(48,0,'N',0,'',27,0,'','storage','2015-12-04 16:15:40',1,'INSERT','','Datensatz 27 wurde angelegt',''),(49,0,'N',0,'',27,0,'','storage','2015-12-04 16:15:40',1,'DIR_CREATED','','Verzeichnis 27 wurde angelegt.',''),(50,0,'N',0,'',28,0,'','storage','2015-12-04 16:15:44',1,'INSERT','','Datensatz 28 wurde angelegt',''),(51,0,'N',0,'',28,0,'','storage','2015-12-04 16:15:44',1,'DIR_CREATED','','Verzeichnis 28 wurde angelegt.',''),(52,0,'N',0,'',29,0,'','storage','2015-12-04 16:15:50',1,'UPLOAD','','Datei 29 wurde upgeloaded.',''),(53,0,'N',0,'',30,0,'','storage','2015-12-04 16:15:59',1,'UPLOAD','','Datei 30 wurde upgeloaded.',''),(54,0,'N',0,'',31,0,'','storage','2015-12-04 16:16:06',1,'UPLOAD','','Datei 31 wurde upgeloaded.',''),(55,0,'N',0,'',32,0,'','storage','2015-12-04 16:16:06',1,'UPLOAD','','Datei 32 wurde upgeloaded.',''),(56,0,'N',0,'',33,0,'','storage','2015-12-04 16:16:06',1,'UPLOAD','','Datei 33 wurde upgeloaded.',''),(57,0,'N',0,'',34,0,'','storage','2015-12-04 16:16:51',1,'INSERT','','Datensatz 34 wurde angelegt',''),(58,0,'N',0,'',34,0,'','storage','2015-12-04 16:16:51',1,'DIR_CREATED','','Verzeichnis 34 wurde angelegt.',''),(59,0,'N',0,'',35,0,'','storage','2015-12-04 16:16:58',1,'UPLOAD','','Datei 35 wurde upgeloaded.',''),(60,0,'N',0,'',36,0,'','storage','2015-12-04 16:16:58',1,'UPLOAD','','Datei 36 wurde upgeloaded.',''),(61,0,'N',0,'',1,0,'','pages','2015-12-04 16:17:08',1,'INSERT','','Datensatz 1 wurde angelegt',''),(62,0,'N',0,'',2,0,'','pages','2015-12-04 16:17:12',1,'INSERT','','Datensatz 2 wurde angelegt',''),(63,0,'N',0,'',1044,0,'','atoms','2015-12-04 16:17:40',1,'INSERT','','Datensatz 1044 wurde angelegt',''),(64,0,'N',0,'',1,0,'','css_less','2015-12-04 16:20:42',1,'INSERT','','Datensatz 1 wurde angelegt',''),(65,0,'N',0,'',2,0,'','css_less','2015-12-04 16:20:47',1,'INSERT','','Datensatz 2 wurde angelegt',''),(66,0,'N',0,'',0,0,'','','2015-12-04 16:26:01',1,'LOGIN','','User 1: RELOAD',''),(67,0,'N',0,'',1045,0,'','atoms','2015-12-04 16:26:17',1,'INSERT','','Datensatz 1045 wurde angelegt',''),(68,0,'N',0,'',1046,0,'','atoms','2015-12-04 16:26:24',1,'INSERT','','Datensatz 1046 wurde angelegt',''),(69,0,'N',0,'',1047,0,'','atoms','2015-12-04 16:26:30',1,'INSERT','','Datensatz 1047 wurde angelegt',''),(70,0,'N',0,'',47,0,'','storage','2015-12-04 16:32:51',1,'INSERT','','Datensatz 47 wurde angelegt',''),(71,0,'N',0,'',47,0,'','storage','2015-12-04 16:32:51',1,'DIR_CREATED','','Verzeichnis 47 wurde angelegt.',''),(72,0,'N',0,'',48,0,'','storage','2015-12-04 16:33:06',1,'UPLOAD','','Datei 48 wurde upgeloaded.',''),(73,0,'N',0,'',49,0,'','storage','2015-12-04 16:37:38',1,'INSERT','','Datensatz 49 wurde angelegt',''),(74,0,'N',0,'',49,0,'','storage','2015-12-04 16:37:38',1,'DIR_CREATED','','Verzeichnis 49 wurde angelegt.',''),(75,0,'N',0,'',50,0,'','storage','2015-12-04 16:37:42',1,'UPLOAD','','Datei 50 wurde upgeloaded.',''),(76,0,'N',0,'',1048,0,'','atoms','2015-12-04 16:37:59',1,'INSERT','','Datensatz 1048 wurde angelegt',''),(77,0,'N',0,'',1049,0,'','atoms','2015-12-04 16:38:01',1,'INSERT','','Datensatz 1049 wurde angelegt',''),(78,0,'N',0,'',0,0,'','','2015-12-04 16:49:38',1,'LOGIN','','User 1: RELOAD',''),(79,0,'N',0,'',51,0,'','storage','2015-12-04 16:53:43',1,'INSERT','','Datensatz 51 wurde angelegt',''),(80,0,'N',0,'',51,0,'','storage','2015-12-04 16:53:43',1,'DIR_CREATED','','Verzeichnis 51 wurde angelegt.',''),(81,0,'N',0,'',52,0,'','storage','2015-12-04 16:53:47',1,'UPLOAD','','Datei 52 wurde upgeloaded.',''),(82,0,'N',0,'',53,0,'','storage','2015-12-04 16:53:47',1,'UPLOAD','','Datei 53 wurde upgeloaded.',''),(83,0,'N',0,'',54,0,'','storage','2015-12-04 16:53:47',1,'UPLOAD','','Datei 54 wurde upgeloaded.',''),(84,0,'N',0,'',0,0,'','','2015-12-04 18:21:21',1,'LOGIN','','User 1: LOGIN',''),(85,0,'N',0,'',0,0,'','','2015-12-04 18:21:32',1,'LOGIN','','User 1: RELOAD',''),(86,0,'N',0,'',1050,0,'','atoms','2015-12-04 18:22:08',1,'INSERT','','Datensatz 1050 wurde angelegt',''),(87,0,'N',0,'',1051,0,'','atoms','2015-12-04 18:22:19',1,'INSERT','','Datensatz 1051 wurde angelegt',''),(88,0,'N',0,'',0,0,'','','2015-12-04 18:22:27',1,'LOGIN','','User 1: RELOAD',''),(89,0,'N',0,'',1052,0,'','atoms','2015-12-04 18:24:34',1,'INSERT','','Datensatz 1052 wurde angelegt',''),(90,0,'N',0,'',3080,0,'','atoms_settings','2015-12-04 18:24:50',1,'INSERT','','Datensatz 3080 angelegt',''),(91,0,'N',0,'',3080,1052,'Headline','atoms_settings','2015-12-04 18:24:50',1,'INSERT','AS','Feld  wurde angeleget',''),(92,0,'N',0,'',3080,1052,'Headline','atoms_settings','2015-12-04 18:24:56',1,'UPDATE','AS','Feld 3080 wurde geändert','{\"as_name\":{\"old\":\"\",\"new\":\"\\u00dcberschrift1\"},\"as_lastmod\":{\"old\":\"2015-12-04 19:24:50\",\"new\":\"2015-12-04 19:24:56\"}}'),(93,0,'N',0,'',3080,1052,'Headline','atoms_settings','2015-12-04 18:24:58',1,'UPDATE','AS','Feld 3080 wurde geändert','{\"as_lastmod\":{\"old\":\"2015-12-04 19:24:56\",\"new\":\"2015-12-04 19:24:58\"},\"as_type_multilang\":{\"old\":\"N\",\"new\":\"Y\"}}'),(94,0,'N',0,'',3080,1052,'Headline','atoms_settings','2015-12-04 18:25:03',1,'UPDATE','AS','Feld 3080 wurde geändert','{\"as_lastmod\":{\"old\":\"2015-12-04 19:24:58\",\"new\":\"2015-12-04 19:25:03\"},\"as_type\":{\"old\":\"UNDEFINED\",\"new\":\"TEXT\"}}'),(95,0,'N',0,'',3081,0,'','atoms_settings','2015-12-04 18:25:04',1,'INSERT','','Datensatz 3081 angelegt',''),(96,0,'N',0,'',3081,1052,'Headline','atoms_settings','2015-12-04 18:25:04',1,'INSERT','AS','Feld  wurde angeleget',''),(97,0,'N',0,'',3081,1052,'Headline','atoms_settings','2015-12-04 18:25:07',1,'UPDATE','AS','Feld 3081 wurde geändert','{\"as_name\":{\"old\":\"\",\"new\":\"\\u00dc\"},\"as_lastmod\":{\"old\":\"2015-12-04 19:25:04\",\"new\":\"2015-12-04 19:25:07\"}}'),(98,0,'N',0,'',3080,1052,'Headline','atoms_settings','2015-12-04 18:25:13',1,'UPDATE','AS','Feld 3080 wurde geändert','{\"as_name\":{\"old\":\"\\u00dcberschrift1\",\"new\":\"HEADLINE1\"},\"as_lastmod\":{\"old\":\"2015-12-04 19:25:03\",\"new\":\"2015-12-04 19:25:13\"}}'),(99,0,'N',0,'',3081,1052,'Headline','atoms_settings','2015-12-04 18:25:16',1,'UPDATE','AS','Feld 3081 wurde geändert','{\"as_name\":{\"old\":\"\\u00dc\",\"new\":\"HEADLINE2\"},\"as_lastmod\":{\"old\":\"2015-12-04 19:25:07\",\"new\":\"2015-12-04 19:25:16\"}}'),(100,0,'N',0,'',3082,0,'','atoms_settings','2015-12-04 18:25:17',1,'INSERT','','Datensatz 3082 angelegt',''),(101,0,'N',0,'',3082,1052,'Headline','atoms_settings','2015-12-04 18:25:17',1,'INSERT','AS','Feld  wurde angeleget',''),(102,0,'N',0,'',3082,1052,'Headline','atoms_settings','2015-12-04 18:25:22',1,'UPDATE','AS','Feld 3082 wurde geändert','{\"as_name\":{\"old\":\"\",\"new\":\"HEADLINE3\"},\"as_lastmod\":{\"old\":\"2015-12-04 19:25:17\",\"new\":\"2015-12-04 19:25:22\"}}'),(103,0,'N',0,'',3080,1052,'Headline','atoms_settings','2015-12-04 18:25:25',1,'UPDATE','AS','Feld 3080 wurde geändert','{\"as_label\":{\"old\":\"\",\"new\":\"HEADLINE1\"},\"as_lastmod\":{\"old\":\"2015-12-04 19:25:13\",\"new\":\"2015-12-04 19:25:25\"}}'),(104,0,'N',0,'',3081,1052,'Headline','atoms_settings','2015-12-04 18:25:26',1,'UPDATE','AS','Feld 3081 wurde geändert','{\"as_label\":{\"old\":\"\",\"new\":\"HEADLINE2\"},\"as_lastmod\":{\"old\":\"2015-12-04 19:25:16\",\"new\":\"2015-12-04 19:25:26\"}}'),(105,0,'N',0,'',3082,1052,'Headline','atoms_settings','2015-12-04 18:25:27',1,'UPDATE','AS','Feld 3082 wurde geändert','{\"as_label\":{\"old\":\"\",\"new\":\"HEADLINE2\"},\"as_lastmod\":{\"old\":\"2015-12-04 19:25:22\",\"new\":\"2015-12-04 19:25:26\"}}'),(106,0,'N',0,'',3080,1052,'Headline','atoms_settings','2015-12-04 18:25:30',1,'UPDATE','AS','Feld 3080 wurde geändert','{\"as_label\":{\"old\":\"HEADLINE1\",\"new\":\"\\u00dcberschrift 1\"},\"as_lastmod\":{\"old\":\"2015-12-04 19:25:25\",\"new\":\"2015-12-04 19:25:30\"}}'),(107,0,'N',0,'',3081,1052,'Headline','atoms_settings','2015-12-04 18:25:34',1,'UPDATE','AS','Feld 3081 wurde geändert','{\"as_label\":{\"old\":\"HEADLINE2\",\"new\":\"\\u00dcberschrift 2\"},\"as_lastmod\":{\"old\":\"2015-12-04 19:25:26\",\"new\":\"2015-12-04 19:25:34\"}}'),(108,0,'N',0,'',3082,1052,'Headline','atoms_settings','2015-12-04 18:25:37',1,'UPDATE','AS','Feld 3082 wurde geändert','{\"as_label\":{\"old\":\"HEADLINE2\",\"new\":\"\\u00dcberschrift 3\"},\"as_lastmod\":{\"old\":\"2015-12-04 19:25:26\",\"new\":\"2015-12-04 19:25:37\"}}'),(109,0,'N',0,'',3081,1052,'Headline','atoms_settings','2015-12-04 18:25:40',1,'UPDATE','AS','Feld 3081 wurde geändert','{\"as_lastmod\":{\"old\":\"2015-12-04 19:25:34\",\"new\":\"2015-12-04 19:25:40\"},\"as_type_multilang\":{\"old\":\"N\",\"new\":\"Y\"}}'),(110,0,'N',0,'',3082,1052,'Headline','atoms_settings','2015-12-04 18:25:41',1,'UPDATE','AS','Feld 3082 wurde geändert','{\"as_lastmod\":{\"old\":\"2015-12-04 19:25:37\",\"new\":\"2015-12-04 19:25:41\"},\"as_type_multilang\":{\"old\":\"N\",\"new\":\"Y\"}}'),(111,0,'N',0,'',3081,1052,'Headline','atoms_settings','2015-12-04 18:25:44',1,'UPDATE','AS','Feld 3081 wurde geändert','{\"as_lastmod\":{\"old\":\"2015-12-04 19:25:40\",\"new\":\"2015-12-04 19:25:44\"},\"as_type\":{\"old\":\"UNDEFINED\",\"new\":\"TEXT\"}}'),(112,0,'N',0,'',3082,1052,'Headline','atoms_settings','2015-12-04 18:25:47',1,'UPDATE','AS','Feld 3082 wurde geändert','{\"as_lastmod\":{\"old\":\"2015-12-04 19:25:41\",\"new\":\"2015-12-04 19:25:47\"},\"as_type\":{\"old\":\"UNDEFINED\",\"new\":\"TEXT\"}}'),(113,0,'N',0,'',1053,0,'','atoms','2015-12-04 18:27:20',1,'INSERT','','Datensatz 1053 wurde angelegt',''),(114,0,'N',0,'',1054,0,'','atoms','2015-12-04 18:27:48',1,'INSERT','','Datensatz 1054 wurde angelegt',''),(115,0,'N',0,'',3083,0,'','atoms_settings','2015-12-04 18:27:51',1,'INSERT','','Datensatz 3083 angelegt',''),(116,0,'N',0,'',3083,1054,'BannerSlider Bausteinliste','atoms_settings','2015-12-04 18:27:51',1,'INSERT','AS','Feld  wurde angeleget',''),(117,0,'N',0,'',3083,1054,'BannerSlider Bausteinliste','atoms_settings','2015-12-04 18:27:53',1,'UPDATE','AS','Feld 3083 wurde geändert','{\"as_name\":{\"old\":\"\",\"new\":\"IMG\"},\"as_lastmod\":{\"old\":\"2015-12-04 19:27:51\",\"new\":\"2015-12-04 19:27:53\"}}'),(118,0,'N',0,'',3083,1054,'BannerSlider Bausteinliste','atoms_settings','2015-12-04 18:27:56',1,'UPDATE','AS','Feld 3083 wurde geändert','{\"as_label\":{\"old\":\"\",\"new\":\"Bild\"},\"as_lastmod\":{\"old\":\"2015-12-04 19:27:53\",\"new\":\"2015-12-04 19:27:56\"}}'),(119,0,'N',0,'',3084,0,'','atoms_settings','2015-12-04 18:27:57',1,'INSERT','','Datensatz 3084 angelegt',''),(120,0,'N',0,'',3084,1054,'BannerSlider Bausteinliste','atoms_settings','2015-12-04 18:27:57',1,'INSERT','AS','Feld  wurde angeleget',''),(121,0,'N',0,'',3084,1054,'BannerSlider Bausteinliste','atoms_settings','2015-12-04 18:28:05',1,'UPDATE','AS','Feld 3084 wurde geändert','{\"as_name\":{\"old\":\"\",\"new\":\"TEXT\"},\"as_lastmod\":{\"old\":\"2015-12-04 19:27:57\",\"new\":\"2015-12-04 19:28:05\"}}'),(122,0,'N',0,'',3084,1054,'BannerSlider Bausteinliste','atoms_settings','2015-12-04 18:28:07',1,'UPDATE','AS','Feld 3084 wurde geändert','{\"as_label\":{\"old\":\"\",\"new\":\"Text\"},\"as_lastmod\":{\"old\":\"2015-12-04 19:28:05\",\"new\":\"2015-12-04 19:28:07\"}}'),(123,0,'N',0,'',3084,1054,'BannerSlider Bausteinliste','atoms_settings','2015-12-04 18:28:10',1,'UPDATE','AS','Feld 3084 wurde geändert','{\"as_lastmod\":{\"old\":\"2015-12-04 19:28:07\",\"new\":\"2015-12-04 19:28:10\"},\"as_type_multilang\":{\"old\":\"N\",\"new\":\"Y\"}}'),(124,0,'N',0,'',3083,1054,'BannerSlider Bausteinliste','atoms_settings','2015-12-04 18:28:15',1,'UPDATE','AS','Feld 3083 wurde geändert','{\"as_lastmod\":{\"old\":\"2015-12-04 19:27:56\",\"new\":\"2015-12-04 19:28:15\"},\"as_type\":{\"old\":\"UNDEFINED\",\"new\":\"IMAGE\"}}'),(125,0,'N',0,'',3084,1054,'BannerSlider Bausteinliste','atoms_settings','2015-12-04 18:28:22',1,'UPDATE','AS','Feld 3084 wurde geändert','{\"as_lastmod\":{\"old\":\"2015-12-04 19:28:10\",\"new\":\"2015-12-04 19:28:22\"},\"as_type\":{\"old\":\"UNDEFINED\",\"new\":\"TEXT\"}}'),(126,0,'N',0,'',3085,0,'','atoms_settings','2015-12-04 18:28:32',1,'INSERT','','Datensatz 3085 angelegt',''),(127,0,'N',0,'',3085,1053,'BannerSlider','atoms_settings','2015-12-04 18:28:32',1,'INSERT','AS','Feld  wurde angeleget',''),(128,0,'N',0,'',3085,1053,'BannerSlider','atoms_settings','2015-12-04 18:28:43',1,'UPDATE','AS','Feld 3085 wurde geändert','{\"as_name\":{\"old\":\"\",\"new\":\"IMAGES\"},\"as_lastmod\":{\"old\":\"2015-12-04 19:28:32\",\"new\":\"2015-12-04 19:28:43\"}}'),(129,0,'N',0,'',3085,1053,'BannerSlider','atoms_settings','2015-12-04 18:28:48',1,'UPDATE','AS','Feld 3085 wurde geändert','{\"as_name\":{\"old\":\"IMAGES\",\"new\":\"SLIDES\"},\"as_lastmod\":{\"old\":\"2015-12-04 19:28:43\",\"new\":\"2015-12-04 19:28:48\"}}'),(130,0,'N',0,'',3085,1053,'BannerSlider','atoms_settings','2015-12-04 18:28:51',1,'UPDATE','AS','Feld 3085 wurde geändert','{\"as_label\":{\"old\":\"\",\"new\":\"Slides\"},\"as_lastmod\":{\"old\":\"2015-12-04 19:28:48\",\"new\":\"2015-12-04 19:28:51\"}}'),(131,0,'N',0,'',3085,1053,'BannerSlider','atoms_settings','2015-12-04 18:28:55',1,'UPDATE','AS','Feld 3085 wurde geändert','{\"as_lastmod\":{\"old\":\"2015-12-04 19:28:51\",\"new\":\"2015-12-04 19:28:55\"},\"as_type\":{\"old\":\"UNDEFINED\",\"new\":\"ATOMLIST\"}}'),(132,0,'N',0,'',0,0,'','','2015-12-04 18:40:12',1,'LOGIN','','User 1: RELOAD',''),(133,0,'N',0,'',0,0,'','','2015-12-04 18:41:26',1,'LOGIN','','User 1: RELOAD',''),(134,0,'N',0,'',0,0,'','','2015-12-04 18:47:58',1,'LOGIN','','User 1: LOGIN',''),(135,0,'N',0,'',0,0,'','','2015-12-04 18:48:23',1,'LOGIN','','User 1: RELOAD',''),(136,0,'N',0,'',0,0,'','','2015-12-04 18:48:41',1,'LOGIN','','User 1: RELOAD',''),(137,0,'N',0,'',0,0,'','','2015-12-04 18:48:47',1,'LOGIN','','User 1: RELOAD',''),(138,0,'N',0,'',0,0,'','','2015-12-04 18:58:02',1,'LOGIN','','User 1: RELOAD',''),(139,0,'N',0,'',0,0,'','','2015-12-04 19:03:24',1,'LOGIN','','User 1: RELOAD',''),(140,0,'N',0,'',0,0,'','','2015-12-05 10:22:15',1,'LOGIN','','User 1: LOGIN',''),(141,0,'N',0,'',0,0,'','','2015-12-05 10:58:09',1,'LOGIN','','User 1: RELOAD',''),(142,0,'N',0,'',0,0,'','','2015-12-06 10:41:47',1,'LOGIN','','User 1: LOGIN',''),(143,0,'N',0,'',0,0,'','','2015-12-06 10:45:31',1,'LOGIN','','User 1: RELOAD',''),(144,0,'N',0,'',0,0,'','','2015-12-06 18:15:01',1,'LOGIN','','User 1: LOGIN',''),(145,0,'N',0,'',1,0,'','faces','2015-12-06 18:15:57',1,'INSERT','','Datensatz 1 angelegt',''),(146,0,'N',0,'',2,0,'','faces','2015-12-06 18:15:58',1,'INSERT','','Datensatz 2 angelegt',''),(147,0,'N',0,'',0,0,'','','2015-12-06 18:18:47',1,'LOGIN','','User 1: RELOAD',''),(148,0,'N',0,'',0,0,'','','2015-12-06 18:20:10',1,'LOGIN','','User 1: RELOAD',''),(149,0,'N',0,'',0,0,'','','2015-12-06 18:22:36',1,'LOGIN','','User 1: RELOAD','');
/*!40000 ALTER TABLE `be_users_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countrylist`
--

DROP TABLE IF EXISTS `countrylist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countrylist` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_og_mode_en` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_og_mode_de` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_seo_mode_en` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_seo_mode_de` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_ISO_CODE` text NOT NULL COMMENT '556::TEXT:: ',
  `wz_NAME` text NOT NULL COMMENT '1815::TEXT:: ',
  `_DE_wz_NAME` text NOT NULL COMMENT '1815::TEXT:: ',
  `_EN_wz_NAME` text NOT NULL COMMENT '1815::TEXT:: ',
  `_RU_wz_NAME` text NOT NULL COMMENT '1815::TEXT:: ',
  `_FR_wz_NAME` text NOT NULL COMMENT '1815::TEXT:: ',
  `_IT_wz_NAME` text NOT NULL COMMENT '1815::TEXT:: ',
  `_RO_wz_NAME` text NOT NULL COMMENT '1815::TEXT:: ',
  `_HU_wz_NAME` text NOT NULL COMMENT '1815::TEXT:: ',
  `_CZ_wz_NAME` text NOT NULL COMMENT '1815::TEXT:: ',
  PRIMARY KEY (`wz_id`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='WIZARD :: countrylist (126)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countrylist`
--

LOCK TABLES `countrylist` WRITE;
/*!40000 ALTER TABLE `countrylist` DISABLE KEYS */;
/*!40000 ALTER TABLE `countrylist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cronjobs`
--

DROP TABLE IF EXISTS `cronjobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cronjobs` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_og_mode_en` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_og_mode_de` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_seo_mode_en` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_seo_mode_de` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_NAME` text NOT NULL COMMENT '1809::TEXT:: ',
  `wz_URL` text NOT NULL COMMENT '1810::TEXT:: ',
  PRIMARY KEY (`wz_id`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='WIZARD :: cronjobs (534)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cronjobs`
--

LOCK TABLES `cronjobs` WRITE;
/*!40000 ALTER TABLE `cronjobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `cronjobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `css_less`
--

DROP TABLE IF EXISTS `css_less`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `css_less` (
  `cl_id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_vid` int(11) NOT NULL,
  `cl_s_id` int(11) NOT NULL,
  `cl_fid` int(11) NOT NULL,
  `cl_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `cl_sort` int(11) NOT NULL,
  `cl_name` varchar(255) NOT NULL,
  `cl_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cl_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cl_lastmodBy` int(11) NOT NULL,
  `cl_createdBy` int(11) NOT NULL,
  `cl_content` longtext NOT NULL,
  `cl_content_size_bytes` int(11) NOT NULL,
  PRIMARY KEY (`cl_id`),
  KEY `cl_s_id` (`cl_s_id`),
  KEY `cl_fid` (`cl_fid`,`cl_del`),
  KEY `cl_s_id_2` (`cl_s_id`,`cl_fid`,`cl_del`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `css_less`
--

LOCK TABLES `css_less` WRITE;
/*!40000 ALTER TABLE `css_less` DISABLE KEYS */;
INSERT INTO `css_less` VALUES (1,0,1,0,'N',1,'styles','2015-12-04 16:20:42','0000-00-00 00:00:00',0,0,'@import \"2.less\"; \n\nbody{\n    background:pink; \n}\n\nheader{\n    \n}\n\nfooter{\n    \n}',0),(2,0,1,0,'N',2,'mixins','2015-12-04 16:20:47','0000-00-00 00:00:00',0,0,'//FONTS\r\n\r\n//COLORS\r\n\r\n//MEDIA QUERIES\r\n@retina: ~\"only screen and (-webkit-min-device-pixel-ratio: 1.5)\",\r\n         ~\"only screen and (min--moz-device-pixel-ratio: 1.5)\",\r\n         ~\"only screen and (-o-min-device-pixel-ratio: 3/2)\",\r\n         ~\"only screen and (min-device-pixel-ratio: 1.5)\";\r\n         \r\n@sm: ~\"(min-width: 768px)\";\r\n@md: ~\"(min-width: 992px)\";\r\n@lg: ~\"(min-width: 1200px)\";\r\n@xl: ~\"(min-width: 1400px)\";\r\n@xxl: ~\"(min-width: 1600px)\";\r\n\r\n@smretina: ~\"(min-width: 768px) and (-webkit-min-device-pixel-ratio: 1.5)\",\r\n           ~\"(min-width: 768px) and (min--moz-device-pixel-ratio: 1.5)\",\r\n           ~\"(min-width: 768px) and (-o-min-device-pixel-ratio: 3/2)\",\r\n           ~\"(min-width: 768px) and (min-device-pixel-ratio: 1.5)\";\r\n\r\n\r\n.v-center{\r\n    float:none;\r\n    display:inline-block;\r\n    vertical-align:middle;\r\n}\r\n.v-bottom{\r\n    float:none;\r\n    display:inline-block;\r\n    vertical-align:bottom;\r\n}\r\n\r\n//MIXINS\r\n.clearfix() {\r\n  &:before,\r\n  &:after {\r\n    content: \" \"; // 1\r\n    display: table; // 2\r\n  }\r\n  &:after {\r\n    clear: both;\r\n  }\r\n}\r\n\r\n.columncount(@count: 2, @gap: 30px){\r\n  -webkit-column-count: @count;\r\n  -moz-column-count: @count;\r\n  column-count: @count;\r\n  -webkit-column-gap: @gap;\r\n  -moz-column-gap: @gap;\r\n  column-gap: @gap;\r\n}\r\n\r\n.background-image-size(){\r\n  background-size:cover!important;\r\n  background-position:center center!important;\r\n  background-repeat:no-repeat!important;\r\n}\r\n\r\n.icon(){\r\n  font-family: \'icomoon\';\r\n  speak: none;\r\n  font-style: normal;\r\n  font-weight: normal;\r\n  font-variant: normal;\r\n  text-transform: none;\r\n  line-height: 1;\r\n  -webkit-font-smoothing: antialiased;\r\n  -moz-osx-font-smoothing: grayscale;\r\n}\r\n\r\n\r\n.flex(){\r\n  display: -webkit-box;\r\n  display: -moz-box;\r\n  display: -ms-flexbox;\r\n  display: -webkit-flex;\r\n  display: flex;\r\n}\r\n\r\n.justify-content(){\r\n  -webkit-justify-content: space-between;\r\n  justify-content: space-between;\r\n  -webkit-box-pack: justify;\r\n  -moz-box-pack: justify;\r\n  -ms-flex-pack: justify;\r\n}\r\n\r\n.text-shadow (@string: 0 1px 3px rgba(0, 0, 0, 0.25)) {\r\n  text-shadow: @string;\r\n}\r\n.box-shadow (@string) {\r\n  -webkit-box-shadow: @string;\r\n  -moz-box-shadow:    @string;\r\n  box-shadow:         @string;\r\n}\r\n\r\n.no-box-shadow() {\r\n  -webkit-box-shadow: none !important;\r\n  -moz-box-shadow:    none !important;\r\n  box-shadow:         none !important;\r\n}\r\n\r\n.no-outline {\r\n    outline: 0 !important;\r\n}\r\n\r\n.drop-shadow (@x: 0, @y: 1px, @blur: 2px, @spread: 0, @alpha: 0.25) {\r\n  -webkit-box-shadow: @x @y @blur @spread rgba(0, 0, 0, @alpha);\r\n  -moz-box-shadow:  @x @y @blur @spread rgba(0, 0, 0, @alpha);\r\n  box-shadow:   @x @y @blur @spread rgba(0, 0, 0, @alpha);\r\n}\r\n.inner-shadow (@x: 0, @y: 1px, @blur: 2px, @spread: 0, @alpha: 0.25) {\r\n  -webkit-box-shadow: inset @x @y @blur @spread rgba(0, 0, 0, @alpha);\r\n  -moz-box-shadow:    inset @x @y @blur @spread rgba(0, 0, 0, @alpha);\r\n  box-shadow:         inset @x @y @blur @spread rgba(0, 0, 0, @alpha);\r\n}\r\n\r\n.blackandwhite() {\r\n    -webkit-filter: grayscale(100%);\r\n    filter: grayscale(100%);\r\n}\r\n\r\n.blackandwhiteNO() {\r\n    -webkit-filter: none;\r\n    filter: none;\r\n}\r\n\r\n.box-sizing (@type: border-box) {\r\n  -webkit-box-sizing: @type;\r\n  -moz-box-sizing:    @type;\r\n  box-sizing:         @type;\r\n}\r\n\r\n.border-radius (@radius: 5px) {\r\n  -webkit-border-radius: @radius;\r\n  -moz-border-radius:    @radius;\r\n  border-radius:         @radius;\r\n\r\n  -moz-background-clip:    padding;\r\n  -webkit-background-clip: padding-box;\r\n  background-clip:         padding-box;\r\n}\r\n.border-radiuses (@topright: 0, @bottomright: 0, @bottomleft: 0, @topleft: 0) {\r\n  -webkit-border-top-right-radius:    @topright;\r\n  -webkit-border-bottom-right-radius: @bottomright;\r\n  -webkit-border-bottom-left-radius:  @bottomleft;\r\n  -webkit-border-top-left-radius:     @topleft;\r\n\r\n  -moz-border-radius-topright:        @topright;\r\n  -moz-border-radius-bottomright:     @bottomright;\r\n  -moz-border-radius-bottomleft:      @bottomleft;\r\n  -moz-border-radius-topleft:         @topleft;\r\n\r\n  border-top-right-radius:            @topright;\r\n  border-bottom-right-radius:         @bottomright;\r\n  border-bottom-left-radius:          @bottomleft;\r\n  border-top-left-radius:             @topleft;\r\n\r\n  -moz-background-clip:    padding; \r\n  -webkit-background-clip: padding-box; \r\n  background-clip:         padding-box; \r\n}\r\n\r\n.opacity (@opacity: 0.5) {\r\n  -webkit-opacity:  @opacity;\r\n  -moz-opacity:     @opacity;\r\n  opacity:    @opacity;\r\n}\r\n\r\n.gradient (@startColor: #eee, @endColor: white) {\r\n  background-color: @startColor;\r\n  background: -webkit-gradient(linear, left top, left bottom, from(@startColor), to(@endColor));\r\n  background: -webkit-linear-gradient(top, @startColor, @endColor);\r\n  background: -moz-linear-gradient(top, @startColor, @endColor);\r\n  background: -ms-linear-gradient(top, @startColor, @endColor);\r\n  background: -o-linear-gradient(top, @startColor, @endColor);\r\n}\r\n.horizontal-gradient (@startColor: #eee, @endColor: white) {\r\n  background-color: @startColor;\r\n  background-image: -webkit-gradient(linear, left top, right top, from(@startColor), to(@endColor));\r\n  background-image: -webkit-linear-gradient(left, @startColor, @endColor);\r\n  background-image: -moz-linear-gradient(left, @startColor, @endColor);\r\n  background-image: -ms-linear-gradient(left, @startColor, @endColor);\r\n  background-image: -o-linear-gradient(left, @startColor, @endColor);\r\n}\r\n\r\n.radial-gradient(@centerX: center, @centerY: center, @shape: circle, @size: contain, @startColor: #555, @startPos: 0, @endColor: #333, @endPos: 100%) {\r\n  background-color:@endColor;\r\n  background-image: -moz-radial-gradient(@centerX @centerY, @shape @size, @startColor @startPos, @endColor @endPos);\r\n  background-image: -webkit-gradient(radial, @centerX @centerY, @shape @size, @startColor @startPos, @endColor @endPos);\r\n  background-image: -webkit-radial-gradient(@centerX @centerY, @shape @size, @startColor @startPos, @endColor @endPos);\r\n  background-image: -o-radial-gradient(@centerX @centerY, @shape @size, @startColor @startPos, @endColor @endPos);\r\n  background-image: -ms-radial-gradient(@centerX @centerY, @shape @size, @startColor @startPos, @endColor @endPos);\r\n  background-image: radial-gradient(@shape at @centerX @centerY, @startColor @startPos, @endColor @endPos);\r\n}\r\n\r\n\r\n.animation (@name, @duration: 300ms, @delay: 0, @ease: ease) {\r\n  -webkit-animation: @name @duration @delay @ease;\r\n  -moz-animation:    @name @duration @delay @ease;\r\n  -ms-animation:     @name @duration @delay @ease;\r\n}\r\n\r\n.transition (@transition) {\r\n  -webkit-transition: @transition;  \r\n  -moz-transition:    @transition;\r\n  -ms-transition:     @transition; \r\n  -o-transition:      @transition;  \r\n}\r\n.transition-duration(@duration){\r\n    -webkit-transition-duration: @duration;\r\n    -moz-transition-duration: @duration;\r\n    -o-transition-duration: @duration;\r\n    transition-duration: @duration;\r\n}\r\n.transform(@string){\r\n  -webkit-transform: @string;\r\n  -moz-transform:    @string;\r\n  -ms-transform:     @string;\r\n  -o-transform:      @string;\r\n}\r\n.scale (@factor) {\r\n  -webkit-transform: scale(@factor);\r\n  -moz-transform:    scale(@factor);\r\n  -ms-transform:     scale(@factor);\r\n  -o-transform:      scale(@factor);\r\n}\r\n.rotate (@deg) {\r\n  -webkit-transform: rotate(@deg);\r\n  -moz-transform:    rotate(@deg);\r\n  -ms-transform:     rotate(@deg);\r\n  -o-transform:      rotate(@deg);\r\n}\r\n.skew (@deg, @deg2) {\r\n  -webkit-transform:       skew(@deg, @deg2);\r\n  -moz-transform:    skew(@deg, @deg2);\r\n  -ms-transform:     skew(@deg, @deg2);\r\n  -o-transform:      skew(@deg, @deg2);\r\n}\r\n.translate (@x, @y:0) {\r\n  -webkit-transform:       translate(@x, @y);\r\n  -moz-transform:    translate(@x, @y);\r\n  -ms-transform:     translate(@x, @y);\r\n  -o-transform:      translate(@x, @y);\r\n}\r\n.translate3d (@x, @y: 0, @z: 0) {\r\n  -webkit-transform:       translate3d(@x, @y, @z);\r\n  -moz-transform:    translate3d(@x, @y, @z);\r\n  -ms-transform:     translate3d(@x, @y, @z);\r\n  -o-transform:      translate3d(@x, @y, @z);\r\n}\r\n.perspective (@value: 1000) {\r\n  -webkit-perspective:  @value;\r\n  -moz-perspective:   @value;\r\n  -ms-perspective:  @value;\r\n  perspective:    @value;\r\n}\r\n.transform-origin (@x:center, @y:center) {\r\n  -webkit-transform-origin: @x @y;\r\n  -moz-transform-origin:    @x @y;\r\n  -ms-transform-origin:     @x @y;\r\n  -o-transform-origin:      @x @y;\r\n}\r\n.blur(@value){\r\n    filter: blur(@value);\r\n    -webkit-filter: blur(@value);\r\n    -moz-filter: blur(@value);\r\n    -ms-filter: blur(@value);\r\n    -o-filter: blur(@value);\r\n}\r\n\r\n\r\n.placeholder(@fontfamily @color)\r\n{\r\n    ::-webkit-input-placeholder {\r\n       font-family:@fontfamily;\r\n       color:@color;\r\n    }\r\n    \r\n    :-moz-placeholder { /* Firefox 18- */\r\n       font-family:@fontfamily;\r\n       color:@color; \r\n    }\r\n    \r\n    ::-moz-placeholder {  /* Firefox 19+ */\r\n       font-family:@fontfamily;\r\n       color:@color;\r\n    }\r\n    \r\n    :-ms-input-placeholder {  \r\n       font-family:@fontfamily;\r\n       color:@color; \r\n    }\r\n}\r\n\r\n\r\n\r\n\r\n// BOOTSTRAP XL BREAKPOINT\r\n.col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9 .col-xl-10, .col-xl-11, .col-xl-12,\r\n.col-xxl-1, .col-xxl-2, .col-xxl-3, .col-xxl-4, .col-xxl-5, .col-xxl-6, .col-xxl-7, .col-xxl-8, .col-xxl-9 .col-xxl-10, .col-xxl-11, .col-xxl-12{\r\n  position: relative;\r\n  min-height: 1px;\r\n  padding-right: 15px;\r\n  padding-left: 15px;\r\n}\r\n@media (min-width: 1400px) {\r\n  .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12 {\r\n    float: left;\r\n  }\r\n  .col-xl-12 {\r\n    width: 100%;\r\n  }\r\n  .col-xl-11 {\r\n    width: 91.66666667%;\r\n  }\r\n  .col-xl-10 {\r\n    width: 83.33333333%;\r\n  }\r\n  .col-xl-9 {\r\n    width: 75%;\r\n  }\r\n  .col-xl-8 {\r\n    width: 66.66666667%;\r\n  }\r\n  .col-xl-7 {\r\n    width: 58.33333333%;\r\n  }\r\n  .col-xl-6 {\r\n    width: 50%;\r\n  }\r\n  .col-xl-5 {\r\n    width: 41.66666667%;\r\n  }\r\n  .col-xl-4 {\r\n    width: 33.33333333%;\r\n  }\r\n  .col-xl-3 {\r\n    width: 25%;\r\n  }\r\n  .col-xl-2 {\r\n    width: 16.66666667%;\r\n  }\r\n  .col-xl-1 {\r\n    width: 8.33333333%;\r\n  }\r\n  .col-xl-pull-12 {\r\n    right: 100%;\r\n  }\r\n  .col-xl-pull-11 {\r\n    right: 91.66666667%;\r\n  }\r\n  .col-xl-pull-10 {\r\n    right: 83.33333333%;\r\n  }\r\n  .col-xl-pull-9 {\r\n    right: 75%;\r\n  }\r\n  .col-xl-pull-8 {\r\n    right: 66.66666667%;\r\n  }\r\n  .col-xl-pull-7 {\r\n    right: 58.33333333%;\r\n  }\r\n  .col-xl-pull-6 {\r\n    right: 50%;\r\n  }\r\n  .col-xl-pull-5 {\r\n    right: 41.66666667%;\r\n  }\r\n  .col-xl-pull-4 {\r\n    right: 33.33333333%;\r\n  }\r\n  .col-xl-pull-3 {\r\n    right: 25%;\r\n  }\r\n  .col-xl-pull-2 {\r\n    right: 16.66666667%;\r\n  }\r\n  .col-xl-pull-1 {\r\n    right: 8.33333333%;\r\n  }\r\n  .col-xl-pull-0 {\r\n    right: auto;\r\n  }\r\n  .col-xl-push-12 {\r\n    left: 100%;\r\n  }\r\n  .col-xl-push-11 {\r\n    left: 91.66666667%;\r\n  }\r\n  .col-xl-push-10 {\r\n    left: 83.33333333%;\r\n  }\r\n  .col-xl-push-9 {\r\n    left: 75%;\r\n  }\r\n  .col-xl-push-8 {\r\n    left: 66.66666667%;\r\n  }\r\n  .col-xl-push-7 {\r\n    left: 58.33333333%;\r\n  }\r\n  .col-xl-push-6 {\r\n    left: 50%;\r\n  }\r\n  .col-xl-push-5 {\r\n    left: 41.66666667%;\r\n  }\r\n  .col-xl-push-4 {\r\n    left: 33.33333333%;\r\n  }\r\n  .col-xl-push-3 {\r\n    left: 25%;\r\n  }\r\n  .col-xl-push-2 {\r\n    left: 16.66666667%;\r\n  }\r\n  .col-xl-push-1 {\r\n    left: 8.33333333%;\r\n  }\r\n  .col-xl-push-0 {\r\n    left: auto;\r\n  }\r\n  .col-xl-offset-12 {\r\n    margin-left: 100%;\r\n  }\r\n  .col-xl-offset-11 {\r\n    margin-left: 91.66666667%;\r\n  }\r\n  .col-xl-offset-10 {\r\n    margin-left: 83.33333333%;\r\n  }\r\n  .col-xl-offset-9 {\r\n    margin-left: 75%;\r\n  }\r\n  .col-xl-offset-8 {\r\n    margin-left: 66.66666667%;\r\n  }\r\n  .col-xl-offset-7 {\r\n    margin-left: 58.33333333%;\r\n  }\r\n  .col-xl-offset-6 {\r\n    margin-left: 50%;\r\n  }\r\n  .col-xl-offset-5 {\r\n    margin-left: 41.66666667%;\r\n  }\r\n  .col-xl-offset-4 {\r\n    margin-left: 33.33333333%;\r\n  }\r\n  .col-xl-offset-3 {\r\n    margin-left: 25%;\r\n  }\r\n  .col-xl-offset-2 {\r\n    margin-left: 16.66666667%;\r\n  }\r\n  .col-xl-offset-1 {\r\n    margin-left: 8.33333333%;\r\n  }\r\n  .col-xl-offset-0 {\r\n    margin-left: 0;\r\n  }\r\n  .hidden-xl{\r\n    display:none!important;\r\n  }\r\n  .visible-xl{\r\n    display:block!important;\r\n  }\r\n}\r\n.inline-block-xl{\r\n  @media @xl{\r\n    display:inline-block!important;\r\n  }\r\n}\r\n\r\n',0);
/*!40000 ALTER TABLE `css_less` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domains`
--

DROP TABLE IF EXISTS `domains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `domains` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(255) NOT NULL,
  `d_s_id` int(11) NOT NULL COMMENT 'site',
  `d_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `d_fid` int(11) NOT NULL,
  `d_sort` int(11) NOT NULL,
  `d_online` enum('Y','N') NOT NULL,
  `d_lastMod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `d_lastModBy` int(11) NOT NULL,
  `d_createdBy` int(11) NOT NULL,
  PRIMARY KEY (`d_id`),
  UNIQUE KEY `d_name_2` (`d_name`),
  KEY `d_name` (`d_name`),
  KEY `xredaktor_niceurl::getSiteConfigViaHttpHost` (`d_name`,`d_del`,`d_online`,`d_s_id`,`d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domains`
--

LOCK TABLES `domains` WRITE;
/*!40000 ALTER TABLE `domains` DISABLE KEYS */;
/*!40000 ALTER TABLE `domains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faces`
--

DROP TABLE IF EXISTS `faces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faces` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_origin` enum('CMS','APP','CORE') NOT NULL DEFAULT 'CMS',
  `f_origin_vid` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `f_desc` varchar(255) NOT NULL,
  `f_sort` int(11) NOT NULL,
  `f_fid` int(11) NOT NULL,
  `f_lastMod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `f_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `f_lastModBy` int(11) NOT NULL,
  `f_createdBy` int(11) NOT NULL,
  `f_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `f_online` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`f_id`),
  KEY `all` (`f_id`,`f_origin`,`f_origin_vid`,`f_name`,`f_sort`,`f_fid`,`f_lastMod`,`f_created`,`f_lastModBy`,`f_createdBy`,`f_del`,`f_online`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faces`
--

LOCK TABLES `faces` WRITE;
/*!40000 ALTER TABLE `faces` DISABLE KEYS */;
INSERT INTO `faces` VALUES (1,'CMS',0,'Mobile','',0,0,'2015-12-06 18:16:16','2015-12-06 18:15:57',0,0,'N','N'),(2,'CMS',0,'Tablet','',1,0,'2015-12-06 18:16:20','2015-12-06 18:15:58',0,0,'N','N');
/*!40000 ALTER TABLE `faces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fe_language`
--

DROP TABLE IF EXISTS `fe_language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fe_language` (
  `fel_id` int(11) NOT NULL AUTO_INCREMENT,
  `fel_ISO` varchar(2) NOT NULL,
  `fel_name` varchar(255) NOT NULL,
  `fel_sort` int(11) NOT NULL,
  `fel_fid` int(11) NOT NULL,
  `fel_lastMod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fel_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fel_lastModBy` int(11) NOT NULL,
  `fel_createdBy` int(11) NOT NULL,
  `fel_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `fel_online` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`fel_id`),
  KEY `xredaktor_translate::doTranslate__translated_false` (`fel_del`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fe_language`
--

LOCK TABLES `fe_language` WRITE;
/*!40000 ALTER TABLE `fe_language` DISABLE KEYS */;
INSERT INTO `fe_language` VALUES (1,'DE','DE',0,0,'2011-12-16 21:31:57','0000-00-00 00:00:00',0,0,'N','Y'),(2,'EN','EN',1,0,'2012-03-08 10:27:21','0000-00-00 00:00:00',0,0,'N','Y'),(3,'RU','RU',5,0,'2011-12-16 21:51:39','0000-00-00 00:00:00',0,0,'N','N'),(4,'FR','FR',2,0,'2011-12-16 21:51:31','0000-00-00 00:00:00',0,0,'N','N'),(5,'IT','IT',3,0,'2011-12-16 21:51:34','0000-00-00 00:00:00',0,0,'N','N'),(6,'RO','RO',6,0,'2011-12-16 21:51:42','0000-00-00 00:00:00',0,0,'N','N'),(7,'SK','SK',1,0,'2015-12-04 15:27:30','2011-08-09 21:13:03',0,0,'N','N'),(8,'HU','HU',4,0,'2011-12-16 21:51:35','2011-10-10 15:50:13',0,0,'N','N'),(9,'CZ','CZ',7,0,'2011-12-16 21:51:44','2011-10-10 15:50:56',0,0,'N','N');
/*!40000 ALTER TABLE `fe_language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fe_tags`
--

DROP TABLE IF EXISTS `fe_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fe_tags` (
  `fet_id` int(11) NOT NULL AUTO_INCREMENT,
  `fet_s_id` int(11) NOT NULL,
  `fet_fid` int(11) NOT NULL,
  `fet_sort` int(11) NOT NULL,
  `fet_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `fet_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fet_lastChangedBy` int(11) NOT NULL,
  `fet_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fet_createdBy` int(11) NOT NULL,
  `fet_tag` varchar(255) NOT NULL,
  `fet_t_cz` tinytext NOT NULL,
  `fet_t_hu` tinytext NOT NULL,
  `fet_t_sk` tinytext NOT NULL,
  `fet_t_ro` tinytext NOT NULL,
  `fet_t_it` tinytext NOT NULL,
  `fet_t_fr` tinytext NOT NULL,
  `fet_t_ru` tinytext NOT NULL,
  `fet_t_en` tinytext NOT NULL,
  `fet_t_de` tinytext NOT NULL,
  `fet_t_bb` tinytext NOT NULL,
  `fet_tag_md5` varchar(50) NOT NULL,
  PRIMARY KEY (`fet_id`),
  UNIQUE KEY `fet_tag_md5` (`fet_tag_md5`),
  KEY `xredaktor_translate::doTranslate` (`fet_s_id`,`fet_tag_md5`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fe_tags`
--

LOCK TABLES `fe_tags` WRITE;
/*!40000 ALTER TABLE `fe_tags` DISABLE KEYS */;
INSERT INTO `fe_tags` VALUES (1,1,0,0,'N','2015-12-04 16:44:18',0,'2015-12-04 16:44:18',0,'###SITE_TITLE###','###SITE_TITLE###','###SITE_TITLE###','###SITE_TITLE###','###SITE_TITLE###','###SITE_TITLE###','###SITE_TITLE###','###SITE_TITLE###','###SITE_TITLE###','###SITE_TITLE###','','a42e8a760c70281cc003d73c2923c814');
/*!40000 ALTER TABLE `fe_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forms`
--

DROP TABLE IF EXISTS `forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forms` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `f_type` enum('BE','FE') NOT NULL,
  `f_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `f_sort` int(11) NOT NULL COMMENT 'SORT',
  `f_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `f_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `f_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `f_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `f_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `f_s_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `f_a_id` int(11) NOT NULL,
  PRIMARY KEY (`f_id`),
  KEY `f_type` (`f_type`,`f_del`,`f_s_id`,`f_a_id`),
  KEY `f_type_2` (`f_type`,`f_del`,`f_a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='JULIAN-FORMS';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forms`
--

LOCK TABLES `forms` WRITE;
/*!40000 ALTER TABLE `forms` DISABLE KEYS */;
/*!40000 ALTER TABLE `forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forms_actions_mails`
--

DROP TABLE IF EXISTS `forms_actions_mails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forms_actions_mails` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_og_mode_en` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_og_mode_de` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_seo_mode_en` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_seo_mode_de` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_F_ID` int(11) NOT NULL COMMENT '1816::WIZARD:: Form ID',
  `wz_EMAIL_USER` text NOT NULL COMMENT '1817::TEXT:: E-Mail User',
  `wz_EMAIL_BODY` int(11) NOT NULL COMMENT '1818::INT:: E-Mail Baustein ID',
  `wz_EMAIL_SUBJECT` int(11) NOT NULL COMMENT '1826::INT:: Subject Baustein ID',
  `_DE_wz_EMAIL_SUBJECT` int(11) NOT NULL COMMENT '1826::INT:: Subject Baustein ID',
  `_EN_wz_EMAIL_SUBJECT` int(11) NOT NULL COMMENT '1826::INT:: Subject Baustein ID',
  `_RU_wz_EMAIL_SUBJECT` int(11) NOT NULL COMMENT '1826::INT:: Subject Baustein ID',
  `_FR_wz_EMAIL_SUBJECT` int(11) NOT NULL COMMENT '1826::INT:: Subject Baustein ID',
  `_IT_wz_EMAIL_SUBJECT` int(11) NOT NULL COMMENT '1826::INT:: Subject Baustein ID',
  `_RO_wz_EMAIL_SUBJECT` int(11) NOT NULL COMMENT '1826::INT:: Subject Baustein ID',
  `_HU_wz_EMAIL_SUBJECT` int(11) NOT NULL COMMENT '1826::INT:: Subject Baustein ID',
  `_CZ_wz_EMAIL_SUBJECT` int(11) NOT NULL COMMENT '1826::INT:: Subject Baustein ID',
  PRIMARY KEY (`wz_id`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='WIZARD :: forms_actions_mails (535)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forms_actions_mails`
--

LOCK TABLES `forms_actions_mails` WRITE;
/*!40000 ALTER TABLE `forms_actions_mails` DISABLE KEYS */;
/*!40000 ALTER TABLE `forms_actions_mails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forms_atoms_settings`
--

DROP TABLE IF EXISTS `forms_atoms_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forms_atoms_settings` (
  `fas_id` int(11) NOT NULL AUTO_INCREMENT,
  `fas_type` enum('GUI','AS') CHARACTER SET latin1 NOT NULL,
  `fas_gui_type` varchar(50) CHARACTER SET latin1 NOT NULL,
  `fas_name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `fas_del` enum('Y','N') CHARACTER SET latin1 NOT NULL DEFAULT 'N',
  `fas_sort` int(11) NOT NULL,
  `fas_fid` int(11) NOT NULL,
  `fas_f_id` int(11) NOT NULL COMMENT 'form',
  `fas_as_id` int(11) NOT NULL COMMENT 'as',
  `fas_placeholder` varchar(255) CHARACTER SET latin1 NOT NULL,
  `fas_required` enum('Y','N') CHARACTER SET latin1 NOT NULL DEFAULT 'N',
  `fas_validator` enum('','EMAIL','NOT_EMPTY','NUMERIC') CHARACTER SET latin1 NOT NULL DEFAULT '',
  `fas_col_xs` int(11) NOT NULL DEFAULT '12',
  `fas_col_sm` int(11) NOT NULL,
  `fas_col_md` int(11) NOT NULL,
  `fas_col_lg` int(11) NOT NULL,
  `fas_row` int(11) NOT NULL,
  `fas_css_class` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`fas_id`),
  KEY `f_id` (`fas_f_id`),
  KEY `fas_del` (`fas_del`,`fas_fid`,`fas_f_id`),
  KEY `fas_del_2` (`fas_del`,`fas_fid`),
  KEY `fas_f_id` (`fas_f_id`),
  KEY `fas_del_3` (`fas_del`,`fas_f_id`),
  KEY `fas_gui_type` (`fas_gui_type`,`fas_del`,`fas_fid`,`fas_f_id`),
  KEY `fas_name` (`fas_name`,`fas_del`,`fas_f_id`),
  KEY `fas_name_2` (`fas_name`,`fas_del`,`fas_f_id`,`fas_as_id`),
  KEY `fas_type` (`fas_type`,`fas_name`,`fas_del`,`fas_f_id`,`fas_as_id`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forms_atoms_settings`
--

LOCK TABLES `forms_atoms_settings` WRITE;
/*!40000 ALTER TABLE `forms_atoms_settings` DISABLE KEYS */;
INSERT INTO `forms_atoms_settings` VALUES (1,'GUI','row','es_online','N',3,0,1,0,'','N','',12,0,0,0,0,''),(2,'AS','','','Y',0,1,1,1373,'','N','',8,0,0,0,0,''),(3,'AS','','','Y',0,4,1,1760,'','N','',2,4,6,10,0,''),(4,'GUI','row','es_online','N',4,0,1,0,'','N','',12,0,0,0,0,''),(5,'GUI','fieldcontainer','containerx','N',7,0,1,0,'','N','',12,0,0,0,0,''),(6,'AS','','','Y',2,5,1,1770,'','N','',12,0,0,0,0,''),(7,'GUI','grid','Grid container','N',8,0,1,0,'','N','',7,0,0,0,0,''),(8,'GUI','grid_column','es_online','N',1,7,1,0,'','N','',8,6,4,2,0,''),(9,'GUI','grid_column','es_online','N',0,7,1,0,'','N','',4,2,0,0,0,''),(10,'AS','','','Y',3,9,1,1771,'','N','',12,0,0,0,0,''),(11,'AS','','','Y',0,9,1,1761,'','N','',12,0,0,0,0,''),(12,'GUI','grid_column','es_online','N',3,7,1,0,'','N','',6,0,0,0,0,''),(13,'AS','','','Y',8,12,1,1766,'','N','',12,0,0,0,0,''),(14,'GUI','tabpanel','es_online','N',6,0,1,0,'','N','',12,0,0,0,0,''),(15,'GUI','tab','es_online','N',1,14,1,0,'','N','',12,0,0,0,0,''),(16,'GUI','tab','es_online','N',2,14,1,0,'','N','',12,0,0,0,0,''),(17,'AS','','','Y',12,15,1,1762,'','N','',12,0,0,0,0,''),(18,'AS','','','Y',13,16,1,1779,'','N','',12,0,0,0,0,''),(19,'AS','','','Y',1,9,1,1764,'','N','',12,0,0,0,0,''),(20,'AS','','','Y',2,9,1,1765,'','N','',12,0,0,0,0,''),(21,'AS','','','Y',16,8,1,1767,'','N','',12,0,0,0,0,''),(22,'AS','','','Y',17,8,1,1768,'','N','',12,0,0,0,0,''),(23,'AS','','','Y',18,8,1,1763,'','N','',12,0,0,0,0,''),(24,'AS','','','Y',19,8,1,1769,'','N','',12,0,0,0,0,''),(25,'AS','','','Y',20,8,1,1758,'','N','',12,0,0,0,0,''),(26,'AS','','','Y',21,8,1,1789,'','N','',12,0,0,0,0,''),(27,'AS','','','Y',22,8,1,1772,'','N','',12,0,0,0,0,''),(28,'AS','','','Y',23,8,1,1463,'','N','',12,0,0,0,0,''),(29,'AS','','','Y',24,8,1,1409,'','N','',12,0,0,0,0,''),(30,'AS','','','Y',25,8,1,1757,'','N','',12,0,0,0,0,''),(31,'AS','','','Y',26,8,1,1791,'','N','',12,0,0,0,0,''),(32,'AS','','Color','N',0,5,1,1789,'','N','',12,0,0,0,0,''),(33,'AS','','Link','N',1,5,1,1758,'','N','',12,0,0,0,0,''),(34,'AS','','Dummy Text','N',0,69,1,1373,'placeholder text','Y','',12,4,2,1,0,''),(35,'AS','','Textfeld','N',0,68,1,1760,'','N','',12,0,0,0,0,''),(36,'AS','','Password','N',1,69,1,1761,'','N','',12,0,0,0,0,''),(37,'AS','','Html','N',32,9,1,1762,'','N','',12,0,0,0,0,''),(38,'AS','','DROPBOX','N',1,67,1,1763,'','N','',12,0,0,0,0,''),(39,'AS','','RB','N',3,67,1,1764,'','N','',12,0,0,0,0,''),(40,'AS','','CB','N',2,67,1,1765,'','N','',12,0,0,0,0,''),(41,'AS','','YN','N',36,9,1,1766,'','N','',12,0,0,0,0,''),(42,'AS','','Datum','N',37,9,1,1767,'','N','',12,0,0,0,0,''),(43,'AS','','Uhrzeit','N',38,9,1,1768,'','N','',12,0,0,0,0,''),(44,'AS','','TS','N',39,9,1,1769,'','N','',12,0,0,0,0,''),(45,'AS','','Int','N',40,9,1,1770,'','N','',12,0,0,0,0,''),(46,'AS','','Float','N',41,9,1,1771,'','N','',12,0,0,0,0,''),(47,'AS','','Files','N',42,8,1,1463,'','N','',12,0,0,0,0,''),(48,'AS','','Images','N',43,8,1,1409,'','N','',12,0,0,0,0,''),(49,'AS','','Flie','N',44,8,1,1779,'','N','',12,0,0,0,0,''),(50,'AS','','Bild','N',45,8,1,1757,'','N','',12,0,0,0,0,''),(51,'AS','','Video','N',46,8,1,1791,'','N','',12,0,0,0,0,''),(52,'AS','','Geo Point','N',47,12,1,1772,'','N','',12,0,0,0,0,''),(53,'AS','','Header Bilder','N',48,1,1,1788,'','N','',12,0,0,0,0,''),(54,'AS','','N_N_REL 3','N',49,15,1,1490,'','N','',12,0,0,0,0,''),(55,'AS','','N_N_REL 2','N',50,15,1,1380,'','N','',12,0,0,0,0,''),(56,'AS','','N_N_REL 1','N',51,15,1,1391,'','N','',12,0,0,0,0,''),(57,'AS','','N_N_REL 0','N',52,15,1,1489,'','N','',12,0,0,0,0,''),(58,'AS','','SIMPLE_W2W 3','N',53,16,1,1494,'','N','',12,0,0,0,0,''),(59,'AS','','SIMPLE_W2W 2','N',54,16,1,1495,'','N','',12,0,0,0,0,''),(60,'AS','','SIMPLE_W2W 1','N',55,16,1,1493,'','N','',12,0,0,0,0,''),(61,'AS','','SIMPLE_W2W 0','N',56,16,1,1407,'','N','',12,0,0,0,0,''),(62,'GUI','tab','es_online','N',0,14,1,0,'','N','',12,0,0,0,0,''),(63,'AS','','Wizard Datensatz Liste','N',57,62,1,1491,'','N','',12,0,0,0,0,''),(64,'AS','','Datensatz','N',58,62,1,1792,'','N','',12,0,0,0,0,''),(65,'AS','','','Y',59,16,1,1786,'','N','',12,0,0,0,0,''),(66,'GUI','tabpanel','Testtabpanel','N',0,0,1,0,'','N','',12,0,0,0,0,''),(67,'GUI','tab','ich bin tab 1','N',1,66,1,0,'','N','',12,0,0,0,0,''),(68,'GUI','tab','ich bin tab 2','N',2,66,1,0,'','N','',12,0,0,0,0,''),(69,'GUI','tab','ich bin tab 3','N',3,66,1,0,'','N','',12,0,0,0,0,''),(70,'GUI','grid','','N',5,0,1,0,'','N','',7,0,0,0,0,''),(71,'GUI','grid_column','','N',1,70,1,0,'','N','',2,0,0,0,0,''),(72,'GUI','grid_column','','N',0,70,1,0,'','N','',12,0,0,0,0,''),(73,'AS','','','N',61,72,1,1823,'','N','',12,0,0,0,0,''),(74,'AS','','','N',62,71,1,1825,'','N','',12,0,0,0,0,''),(75,'GUI','grid_column','','N',63,70,1,0,'','N','',7,5,0,0,0,''),(76,'AS','','','N',0,75,1,1824,'','N','',12,0,0,0,0,''),(77,'GUI','grid_column','','N',64,7,1,0,'','N','',12,0,0,0,0,''),(78,'GUI','grid_column','','N',65,7,1,0,'','N','',12,0,0,0,0,''),(79,'AS','','TX_1','N',66,78,1,1785,'','N','',12,0,0,0,0,''),(80,'AS','','TX_2','N',67,78,1,1786,'','N','',12,0,0,0,0,''),(81,'GUI','grid','','Y',1,0,5,0,'','N','',12,0,0,0,0,''),(82,'GUI','grid_column',' ','Y',1,81,5,0,'','N','',12,0,0,0,0,''),(83,'GUI','grid_column','','Y',2,81,5,0,'','N','',12,0,0,0,0,''),(84,'AS','','','Y',3,82,5,1865,'','N','',12,0,0,0,0,''),(85,'AS','','','Y',4,82,5,1857,'','N','',12,0,0,0,0,''),(86,'AS','','','Y',5,82,5,1856,'','N','',12,0,0,0,0,''),(87,'AS','','','Y',6,82,5,1859,'','N','',12,0,0,0,0,''),(88,'AS','','','Y',2,0,5,1853,'','N','',12,0,0,0,0,''),(89,'GUI','tabpanel','','N',7,0,5,0,'','N','',12,0,0,0,0,'tabs_as_radio'),(90,'GUI','tab','Privatperson','N',0,89,5,0,'','N','',12,0,0,0,0,''),(91,'GUI','tab','Firma','N',1,89,5,0,'','N','',12,0,0,0,0,''),(92,'AS','','Anrede','N',1,90,5,1864,'','N','',12,0,0,0,0,''),(93,'AS','','Vorname','N',3,90,5,1858,'','N','',12,0,0,0,0,''),(94,'AS','','PLZ','N',7,90,5,1860,'','N','',12,0,0,0,0,''),(95,'AS','','Ort','N',6,90,5,1861,'','N','',12,0,0,0,0,''),(96,'AS','','Land','N',9,90,5,1862,'','N','',12,0,0,0,0,''),(97,'AS','','Telefon','N',8,90,5,1863,'','N','',12,0,0,0,0,''),(98,'AS','','Firmen UID','N',1,91,5,1854,'','N','',12,0,0,0,0,''),(99,'AS','','Firmen Name','N',2,91,5,1855,'','N','',12,0,0,0,0,''),(100,'AS','','','N',0,0,7,1849,'','N','',12,0,0,0,0,''),(101,'AS','','U_TYPE','N',0,90,5,1853,'','N','',12,0,0,0,0,''),(102,'AS','','Anrede','N',3,91,5,1864,'','N','',12,0,0,0,0,''),(103,'AS','','Titel','N',4,91,5,1865,'','N','',12,0,0,0,0,''),(104,'AS','','','Y',19,0,5,1858,'','N','',12,0,0,0,0,''),(105,'GUI','row','','Y',20,0,5,0,'','N','',12,0,0,0,0,''),(106,'GUI','tab','','Y',21,0,5,0,'','N','',12,0,0,0,0,''),(107,'GUI','row','','Y',22,0,5,0,'','N','',12,0,0,0,0,''),(108,'GUI','row','','Y',23,0,5,0,'','N','',12,0,0,0,0,''),(109,'AS','','','Y',24,0,5,1853,'','N','',12,0,0,0,0,''),(110,'AS','','','Y',25,0,5,1852,'','N','',12,0,0,0,0,''),(111,'AS','','','Y',26,0,5,1853,'','N','',12,0,0,0,0,''),(112,'AS','','','Y',27,0,5,1853,'','N','',12,0,0,0,0,''),(113,'AS','','','Y',28,0,5,1853,'','N','',12,0,0,0,0,''),(114,'AS','','','Y',29,0,5,1865,'','N','',12,0,0,0,0,''),(115,'AS','','','Y',30,0,5,1859,'','N','',12,0,0,0,0,''),(116,'AS','','','Y',31,0,5,1856,'','N','',12,0,0,0,0,''),(117,'AS','','','Y',32,0,5,1858,'','N','',12,0,0,0,0,''),(118,'AS','','','Y',33,0,5,1864,'','N','',12,0,0,0,0,''),(119,'AS','','','Y',34,0,5,1852,'','N','',12,0,0,0,0,''),(120,'AS','','','Y',35,0,5,1853,'','N','',12,0,0,0,0,''),(121,'AS','','','Y',36,0,5,1853,'','N','',12,0,0,0,0,''),(122,'AS','','','Y',37,0,5,1853,'','N','',12,0,0,0,0,''),(123,'AS','','','Y',38,0,5,1852,'','N','',12,0,0,0,0,''),(124,'AS','','','Y',39,0,5,1853,'','N','',12,0,0,0,0,''),(125,'AS','','U_TYPE','N',0,91,5,1853,'','N','',12,0,0,0,0,''),(126,'AS','','','Y',40,0,5,1853,'','N','',12,0,0,0,0,''),(127,'AS','','Link','N',0,67,1,1758,'','N','',12,0,0,0,0,''),(128,'AS','','Vorname','N',41,91,5,1858,'','N','',12,0,0,0,0,''),(129,'AS','','Land','N',42,91,5,1862,'','N','',12,0,0,0,0,''),(130,'GUI','fieldcontainer','','Y',43,0,5,0,'','N','',12,0,0,0,0,''),(131,'AS','','','N',44,130,5,1858,'','N','',12,0,0,0,0,''),(132,'AS','','','N',45,130,5,1859,'','N','',12,0,0,0,0,''),(133,'AS','','Titel','N',2,90,5,1865,'','N','',12,0,0,0,0,''),(134,'AS','','Nachname','N',4,90,5,1859,'','N','',12,0,0,0,0,''),(135,'AS','','Strasse','N',5,90,5,1856,'','N','',12,0,0,0,0,''),(136,'AS','','Nr','N',10,90,5,1857,'','N','',12,0,0,0,0,''),(137,'AS','','Ort','N',46,91,5,1861,'','N','',12,0,0,0,0,''),(138,'AS','','PLZ','N',47,91,5,1860,'','N','',12,0,0,0,0,''),(139,'AS','','Nachname','N',48,91,5,1859,'','N','',12,0,0,0,0,''),(140,'AS','','Telefon','N',49,91,5,1863,'','N','',12,0,0,0,0,''),(141,'AS','','Produktname','N',0,0,8,1396,'','N','',12,0,0,0,0,''),(142,'AS','','Kategoriezuweisung','N',1,0,8,1536,'','N','',12,0,0,0,0,''),(143,'GUI','row','','N',0,0,9,0,'','N','',12,0,0,0,0,''),(144,'AS','','','N',1,143,9,1994,'','N','',12,0,0,0,0,''),(145,'AS','','','N',2,143,9,1903,'','N','',12,0,0,0,0,''),(146,'GUI','tabpanel','','N',3,0,9,0,'','N','',12,0,0,0,0,''),(147,'AS','','','N',4,0,9,1937,'','N','',12,0,0,0,0,'');
/*!40000 ALTER TABLE `forms_atoms_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forms_mappings`
--

DROP TABLE IF EXISTS `forms_mappings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forms_mappings` (
  `fm_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `fm_type` varchar(100) NOT NULL,
  `fm_a_id` int(11) NOT NULL,
  `fm_config_wz_id` int(11) NOT NULL DEFAULT '0',
  `fm_fid` int(11) NOT NULL DEFAULT '0',
  `fm_sort` int(11) NOT NULL COMMENT 'SORT',
  `fm_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `fm_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `fm_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `fm_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `fm_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `fm_s_id` int(11) NOT NULL,
  `fm_avail_fe` enum('Y','N') NOT NULL DEFAULT 'Y',
  `fm_avail_be` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`fm_id`),
  KEY `fm_type` (`fm_type`),
  KEY `fm_avail_fe` (`fm_avail_fe`),
  KEY `fm_avail_be` (`fm_avail_be`),
  KEY `fm_s_id` (`fm_s_id`,`fm_avail_fe`),
  KEY `fm_s_id_2` (`fm_s_id`,`fm_avail_fe`),
  KEY `fm_del` (`fm_del`,`fm_s_id`,`fm_avail_be`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COMMENT='COMMENT';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forms_mappings`
--

LOCK TABLES `forms_mappings` WRITE;
/*!40000 ALTER TABLE `forms_mappings` DISABLE KEYS */;
INSERT INTO `forms_mappings` VALUES (1,'COMBO',457,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(2,'INT',518,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(3,'LINK',499,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(4,'TEXTAREA',456,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(5,'RADIO',458,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(6,'CHECKBOX',455,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(7,'TEXT',454,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(8,'MD5PASSWORD',501,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(9,'FILE',506,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(10,'WIZARD',493,0,0,0,'N','2015-03-10 11:13:41','0000-00-00 00:00:00',0,0,1,'Y','Y'),(11,'WIZARD2WIZARD',0,0,0,0,'N','2015-03-06 23:11:25','0000-00-00 00:00:00',0,0,1,'N','Y'),(12,'WATTRIBUTE',0,0,0,0,'N','2015-03-06 23:11:23','0000-00-00 00:00:00',0,0,1,'N','Y'),(13,'WID',0,0,0,0,'N','2015-03-06 23:03:46','0000-00-00 00:00:00',0,0,1,'N','Y'),(14,'TIMESTAMP',520,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(15,'HTML',502,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(16,'ATOMLIST',0,0,0,0,'N','2015-03-06 23:02:52','0000-00-00 00:00:00',0,0,1,'N','Y'),(17,'CONTAINER',0,0,0,0,'N','2015-03-06 23:02:55','0000-00-00 00:00:00',0,0,1,'N','Y'),(18,'DATE',460,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(19,'TIME',503,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(20,'SIMPLE_W2W',512,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(21,'CONTAINER-IMAGES',505,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(22,'REMOTE_FIELD',494,0,0,0,'N','2015-03-06 23:03:34','0000-00-00 00:00:00',0,0,1,'N','Y'),(23,'REMOTE_RECORD',495,0,0,0,'N','2015-03-06 23:11:50','0000-00-00 00:00:00',0,0,1,'N','Y'),(24,'WIZARDLIST',491,6101,0,0,'N','2015-03-09 17:06:26','0000-00-00 00:00:00',0,0,1,'Y','Y'),(25,'CONTAINER-FILES',504,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(26,'YN',474,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(27,'FLOAT',519,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(28,'UNIQUE_W2W',513,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(29,'IMAGE',507,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(30,'COLOR',498,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(31,'STAMPER',510,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(32,'JSON',0,0,0,0,'Y','2015-03-06 23:02:12','0000-00-00 00:00:00',0,0,1,'Y','Y'),(33,'GEO-POINT',496,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(34,'PAGE',0,0,0,0,'N','2015-03-06 23:12:39','0000-00-00 00:00:00',0,0,1,'N','Y'),(35,'FRAME',0,0,0,0,'N','2015-03-06 23:12:41','0000-00-00 00:00:00',0,0,1,'N','Y'),(36,'ATOM',0,0,0,0,'N','2015-03-06 23:12:33','0000-00-00 00:00:00',0,0,1,'N','Y'),(37,'INFOPOOL_RECORD',492,0,0,0,'N','2015-03-06 23:12:24','0000-00-00 00:00:00',0,0,1,'N','Y'),(38,'COLLECTOR',515,0,0,0,'N','2015-03-06 23:12:11','0000-00-00 00:00:00',0,0,1,'N','Y'),(39,'IMG_GALLERY',482,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(40,'GEO-POLY',497,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'N','Y'),(41,'VIDEO',508,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(47,'GUI_FORM',434,0,0,1,'N','2015-03-09 12:40:40','2015-03-06 16:03:40',0,0,1,'Y','Y'),(48,'',0,0,0,2,'Y','2015-03-06 23:02:12','2015-03-06 18:39:47',0,0,1,'Y','Y'),(49,'GUI_row',523,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(50,'GUI_tabpanel',524,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(51,'GUI_col',526,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(52,'GUI_fieldcontainer',527,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(53,'GUI_grid',528,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(54,'GUI_grid_column',529,0,0,0,'N','2015-03-09 12:40:40','0000-00-00 00:00:00',0,0,1,'Y','Y'),(55,'GUI_tab',530,6103,0,0,'N','2015-03-10 14:33:59','0000-00-00 00:00:00',0,0,1,'Y','Y'),(56,'GUI_pager',552,0,0,3,'N','2015-03-09 18:01:07','2015-03-09 18:00:43',0,0,1,'Y','Y'),(57,'GUI_loadmore',552,0,0,4,'N','2015-03-09 18:23:22','2015-03-09 18:23:05',0,0,1,'Y','Y');
/*!40000 ALTER TABLE `forms_mappings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forms_settings`
--

DROP TABLE IF EXISTS `forms_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forms_settings` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_og_mode_en` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_og_mode_de` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_seo_mode_en` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_seo_mode_de` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_placeholder` text NOT NULL COMMENT '1819::TEXT:: Placeholder',
  `_DE_wz_placeholder` text NOT NULL COMMENT '1819::TEXT:: Placeholder',
  `_EN_wz_placeholder` text NOT NULL COMMENT '1819::TEXT:: Placeholder',
  `_RU_wz_placeholder` text NOT NULL COMMENT '1819::TEXT:: Placeholder',
  `_FR_wz_placeholder` text NOT NULL COMMENT '1819::TEXT:: Placeholder',
  `_IT_wz_placeholder` text NOT NULL COMMENT '1819::TEXT:: Placeholder',
  `_RO_wz_placeholder` text NOT NULL COMMENT '1819::TEXT:: Placeholder',
  `_HU_wz_placeholder` text NOT NULL COMMENT '1819::TEXT:: Placeholder',
  `_CZ_wz_placeholder` text NOT NULL COMMENT '1819::TEXT:: Placeholder',
  `wz_action_goto_page` int(11) NOT NULL COMMENT '1822::PAGE:: Goto Page',
  `wz_action_js` text NOT NULL COMMENT '1821::TEXT:: Action JS',
  PRIMARY KEY (`wz_id`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='WIZARD :: forms_settings (536)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forms_settings`
--

LOCK TABLES `forms_settings` WRITE;
/*!40000 ALTER TABLE `forms_settings` DISABLE KEYS */;
INSERT INTO `forms_settings` VALUES (1,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-07 00:55:57','2015-03-07 00:55:57',0,0,'','','','','','','','','',0,''),(3,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-07 01:55:29','0000-00-00 00:00:00',0,0,'','','','','','','','','',0,''),(4,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-07 12:47:47','0000-00-00 00:00:00',0,0,'','','','','','','','','',0,''),(5,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-07 13:08:56','0000-00-00 00:00:00',0,0,'','','','','','','','','',0,''),(6,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-07 13:27:26','0000-00-00 00:00:00',0,0,'','','','','','','','','',0,''),(7,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-07 13:30:55','0000-00-00 00:00:00',0,0,'','','','','','','','','',0,''),(8,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-10 11:16:06','0000-00-00 00:00:00',0,0,'','','','','','','','','',0,''),(9,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-04-14 08:53:40','0000-00-00 00:00:00',0,0,'','','','','','','','','',0,'');
/*!40000 ALTER TABLE `forms_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image_profiles`
--

DROP TABLE IF EXISTS `image_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image_profiles` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_name` text NOT NULL COMMENT '1963::TEXT:: Name',
  `wz_w` int(11) NOT NULL COMMENT '1964::INT:: Breite',
  `wz_h` int(11) NOT NULL COMMENT '1965::INT:: Höhe',
  `wz_q` int(11) NOT NULL COMMENT '1966::INT:: Qualität',
  `wz_rmode` text NOT NULL COMMENT '1967::TEXT:: Mode',
  `wz_class` text NOT NULL COMMENT '1968::TEXT:: Class',
  `wz_ext` text NOT NULL COMMENT '1969::TEXT:: Extension',
  PRIMARY KEY (`wz_id`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='WIZARD :: image_profiles (636)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_profiles`
--

LOCK TABLES `image_profiles` WRITE;
/*!40000 ALTER TABLE `image_profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `image_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `open_graph_object_types`
--

DROP TABLE IF EXISTS `open_graph_object_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `open_graph_object_types` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_og_mode_en` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_og_mode_de` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_seo_mode_en` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_seo_mode_de` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_name` text NOT NULL COMMENT '1936::TEXT:: ',
  PRIMARY KEY (`wz_id`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='WIZARD :: open_graph_object_types (615)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `open_graph_object_types`
--

LOCK TABLES `open_graph_object_types` WRITE;
/*!40000 ALTER TABLE `open_graph_object_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `open_graph_object_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_goto_link` text NOT NULL,
  `p_goto_active` enum('N','Y') NOT NULL DEFAULT 'N',
  `p_sseo` mediumtext NOT NULL,
  `p_sseo_link` tinytext NOT NULL,
  `p_full_cache` enum('N','Y') NOT NULL DEFAULT 'N',
  `p_vid` int(11) NOT NULL,
  `p_s_id` int(11) NOT NULL,
  `p_isOnline` enum('Y','N') NOT NULL DEFAULT 'N',
  `p_online_cz` enum('N','Y') NOT NULL DEFAULT 'Y',
  `p_online_hu` enum('N','Y') NOT NULL DEFAULT 'Y',
  `p_online_sk` enum('N','Y') NOT NULL DEFAULT 'Y',
  `p_online_ro` enum('N','Y') NOT NULL DEFAULT 'Y',
  `p_online_it` enum('N','Y') NOT NULL DEFAULT 'Y',
  `p_online_fr` enum('N','Y') NOT NULL DEFAULT 'Y',
  `p_online_ru` enum('N','Y') NOT NULL DEFAULT 'Y',
  `p_online_en` enum('N','Y') NOT NULL DEFAULT 'Y',
  `p_online_de` enum('N','Y') NOT NULL DEFAULT 'Y',
  `p_online_bb` enum('N','Y') NOT NULL DEFAULT 'Y',
  `p_inMenue` enum('Y','N') NOT NULL DEFAULT 'N',
  `p_menu_cz` enum('N','Y') NOT NULL DEFAULT 'Y',
  `p_menu_hu` enum('N','Y') NOT NULL DEFAULT 'Y',
  `p_menu_sk` enum('N','Y') NOT NULL DEFAULT 'Y',
  `p_menu_ro` enum('N','Y') NOT NULL DEFAULT 'Y',
  `p_menu_it` enum('N','Y') NOT NULL DEFAULT 'Y',
  `p_menu_fr` enum('N','Y') NOT NULL DEFAULT 'Y',
  `p_menu_ru` enum('N','Y') NOT NULL DEFAULT 'Y',
  `p_menu_en` enum('N','Y') NOT NULL DEFAULT 'Y',
  `p_menu_de` enum('N','Y') NOT NULL DEFAULT 'Y',
  `p_menu_bb` enum('N','Y') NOT NULL DEFAULT 'Y',
  `p_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `p_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `p_sort` int(11) NOT NULL DEFAULT '99999999',
  `p_vars` text NOT NULL,
  `p_nice` varchar(255) NOT NULL,
  `p_nice_cz` tinytext NOT NULL,
  `p_nice_hu` tinytext NOT NULL,
  `p_nice_sk` tinytext NOT NULL,
  `p_nice_ro` tinytext NOT NULL,
  `p_nice_it` tinytext NOT NULL,
  `p_nice_fr` tinytext NOT NULL,
  `p_nice_ru` tinytext NOT NULL,
  `p_nice_en` tinytext NOT NULL,
  `p_nice_de` tinytext NOT NULL,
  `p_nice_bb` tinytext NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_name_cz` tinytext NOT NULL,
  `p_name_hu` tinytext NOT NULL,
  `p_name_sk` tinytext NOT NULL,
  `p_name_ro` tinytext NOT NULL,
  `p_name_it` tinytext NOT NULL,
  `p_name_fr` tinytext NOT NULL,
  `p_name_ru` tinytext NOT NULL,
  `p_name_en` tinytext NOT NULL,
  `p_name_de` tinytext NOT NULL,
  `p_name_bb` tinytext NOT NULL,
  `p_name_xx` tinytext NOT NULL,
  `p_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `p_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `p_lastmodBy` int(11) NOT NULL,
  `p_createdBy` int(11) NOT NULL,
  `p_frameid` int(11) NOT NULL COMMENT 'frameid',
  `p_inMenue_2` enum('Y','N') NOT NULL DEFAULT 'N',
  `p_inMenue_3` enum('Y','N') NOT NULL DEFAULT 'N',
  `p_inMenue_1` enum('Y','N') NOT NULL DEFAULT 'N',
  `p_inMenue_4` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`p_id`),
  KEY `xredaktor_pages::getPapsch` (`p_id`,`p_fid`),
  KEY `xredaktor_pages::getPagesOfPage` (`p_fid`,`p_del`),
  KEY `xredaktor_pages::getChildrenOfPId` (`p_fid`,`p_inMenue`,`p_inMenue_2`,`p_inMenue_3`,`p_inMenue_1`,`p_del`,`p_isOnline`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'','N','','','N',0,1,'Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','N',0,1,'','','','','','','','','','','','','Startseite','','','','','','','','','','','','2015-12-04 16:22:57','2015-12-04 16:17:08',0,0,1044,'N','N','N','N'),(2,'','N','','','N',0,1,'Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','N',0,2,'','','','','','','','','','','','','Error 404','','','','','','','','','','','','2015-12-04 16:22:55','2015-12-04 16:17:12',0,0,1044,'N','N','N','N');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages_niceurls`
--

DROP TABLE IF EXISTS `pages_niceurls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages_niceurls` (
  `pnu_id` int(11) NOT NULL AUTO_INCREMENT,
  `pnu_http_status` enum('404','301') NOT NULL,
  `pnu_goto_pnu_id` int(11) NOT NULL,
  `pnu_goto_pnu_id_url` longtext NOT NULL,
  `pnu_siteId` int(11) NOT NULL,
  `pnu_md5` varchar(32) NOT NULL,
  `pnu_nice_url` text NOT NULL,
  `pnu_p_id` int(11) NOT NULL,
  `pnu_lang` varchar(2) NOT NULL,
  `pnu_settings_serialized` text NOT NULL,
  `pnu_wz_w_id` int(11) NOT NULL DEFAULT '0' COMMENT 'wizard id',
  `pnu_wz_r_id` int(11) NOT NULL DEFAULT '0' COMMENT 'record id',
  `pnu_wz_c_id` int(11) NOT NULL DEFAULT '0' COMMENT 'categorie as_id',
  `pnu_wz_t_id` int(11) NOT NULL DEFAULT '0' COMMENT 'title as_id',
  `pnu_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `pnu_sort` int(11) NOT NULL,
  `pnu_last_cached` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pnu_id`),
  UNIQUE KEY `pnu_name_compressed` (`pnu_md5`),
  KEY `pnu_siteId` (`pnu_siteId`,`pnu_md5`),
  KEY `pnu_siteId_2` (`pnu_siteId`,`pnu_md5`,`pnu_del`),
  KEY `xredaktor_niceurl::cache_exists($URL)` (`pnu_siteId`,`pnu_md5`,`pnu_del`),
  KEY `pnu_p_id` (`pnu_p_id`),
  KEY `pnu_siteId_3` (`pnu_siteId`),
  KEY `pnu_siteId_4` (`pnu_siteId`,`pnu_md5`,`pnu_wz_w_id`,`pnu_wz_r_id`),
  KEY `pnu_siteId_5` (`pnu_siteId`,`pnu_md5`),
  KEY `pnu_siteId_6` (`pnu_siteId`,`pnu_del`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages_niceurls`
--

LOCK TABLES `pages_niceurls` WRITE;
/*!40000 ALTER TABLE `pages_niceurls` DISABLE KEYS */;
INSERT INTO `pages_niceurls` VALUES (1,'404',0,'',1,'6caddb726229d96e6ceefe1ee321fc8b','//startseite.html',1,'','a:2:{s:4:\"lang\";s:2:\"de\";s:4:\"p_id\";s:1:\"1\";}',0,0,0,0,'N',0,'2015-12-04 16:22:57'),(2,'404',0,'',1,'abea7749af44bc231efbd3fceda5c058','//error-404.html',2,'','a:2:{s:4:\"p_id\";s:1:\"2\";s:4:\"lang\";s:2:\"de\";}',0,0,0,0,'N',0,'2015-12-04 16:34:52');
/*!40000 ALTER TABLE `pages_niceurls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages_niceurls_match`
--

DROP TABLE IF EXISTS `pages_niceurls_match`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages_niceurls_match` (
  `pnm_id` int(11) NOT NULL AUTO_INCREMENT,
  `pnm_name` varchar(255) NOT NULL,
  `pnm_fid` int(11) NOT NULL,
  `pnm_sort` int(11) NOT NULL,
  `pnm_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `pnm_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `pnm_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pnm_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pnm_http_code` enum('301','410','404') NOT NULL DEFAULT '301',
  `pnm_url_match` tinytext NOT NULL,
  `pnm_url_transport` tinytext NOT NULL,
  `pnm_siteId` int(11) NOT NULL,
  PRIMARY KEY (`pnm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages_niceurls_match`
--

LOCK TABLES `pages_niceurls_match` WRITE;
/*!40000 ALTER TABLE `pages_niceurls_match` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages_niceurls_match` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages_niceurls_rel`
--

DROP TABLE IF EXISTS `pages_niceurls_rel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages_niceurls_rel` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  PRIMARY KEY (`wz_id`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='COMMENT';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages_niceurls_rel`
--

LOCK TABLES `pages_niceurls_rel` WRITE;
/*!40000 ALTER TABLE `pages_niceurls_rel` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages_niceurls_rel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages_not_found`
--

DROP TABLE IF EXISTS `pages_not_found`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages_not_found` (
  `pnf_id` int(11) NOT NULL AUTO_INCREMENT,
  `pnf_url` text NOT NULL,
  `pnf_ts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pnf_ip` varchar(50) NOT NULL,
  `pnf_host` text NOT NULL,
  `pnf_refr` text NOT NULL,
  `pnf_browser` varchar(50) NOT NULL,
  `pnf_browser_version` varchar(10) NOT NULL,
  `pnf_browser_platform` varchar(30) NOT NULL,
  `pnf_browser_agent` varchar(255) NOT NULL,
  PRIMARY KEY (`pnf_id`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages_not_found`
--

LOCK TABLES `pages_not_found` WRITE;
/*!40000 ALTER TABLE `pages_not_found` DISABLE KEYS */;
INSERT INTO `pages_not_found` VALUES (1,'/xstorage/template/img/favicon-32x32.png','2015-12-04 16:34:52','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(2,'/xstorage/template/img/favicon-16x16.png','2015-12-04 16:34:53','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(3,'/xstorage/template/img/favicon.ico','2015-12-04 16:34:53','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(4,'/xstorage/template/img/favicon-32x32.png','2015-12-04 16:39:30','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(5,'/xstorage/template/img/favicon-16x16.png','2015-12-04 16:39:30','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(6,'/xstorage/template/img/favicon.ico','2015-12-04 16:39:30','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(7,'/xstorage/template/img/favicon-32x32.png','2015-12-04 16:41:22','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(8,'/xstorage/template/img/favicon-16x16.png','2015-12-04 16:41:22','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(9,'/xstorage/template/img/favicon.ico','2015-12-04 16:41:22','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(10,'/xstorage/template/img/favicon-32x32.png','2015-12-04 16:44:30','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(11,'/xstorage/template/img/favicon-16x16.png','2015-12-04 16:44:30','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(12,'/xstorage/template/img/favicon.ico','2015-12-04 16:44:30','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(13,'/xstorage/template/img/favicon-32x32.png','2015-12-04 16:45:37','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(14,'/xstorage/template/img/favicon-16x16.png','2015-12-04 16:45:37','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(15,'/xstorage/template/img/favicon.ico','2015-12-04 16:45:37','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(16,'/xstorage/template/img/favicon-32x32.png','2015-12-04 16:48:08','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(17,'/xstorage/template/img/favicon-16x16.png','2015-12-04 16:48:08','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(18,'/xstorage/template/img/favicon.ico','2015-12-04 16:48:08','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(19,'/xstorage/template/img/favicon-32x32.png','2015-12-04 16:48:38','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(20,'/xstorage/template/img/favicon-16x16.png','2015-12-04 16:48:38','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(21,'/xstorage/template/img/favicon.ico','2015-12-04 16:48:38','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(22,'/xstorage/template/img/favicon-32x32.png','2015-12-04 16:48:48','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(23,'/xstorage/template/img/favicon-16x16.png','2015-12-04 16:48:48','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(24,'/xstorage/template/img/favicon.ico','2015-12-04 16:48:48','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(25,'/xstorage/template/img/favicon-32x32.png','2015-12-04 16:48:49','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(26,'/xstorage/template/img/favicon-16x16.png','2015-12-04 16:48:49','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(27,'/xstorage/template/img/favicon.ico','2015-12-04 16:48:49','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(28,'/xstorage/template/img/favicon-32x32.png','2015-12-04 16:48:51','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(29,'/xstorage/template/img/favicon-16x16.png','2015-12-04 16:48:51','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(30,'/xstorage/template/img/favicon.ico','2015-12-04 16:48:51','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(31,'/xstorage/template/img/favicon-32x32.png','2015-12-04 16:49:00','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(32,'/xstorage/template/img/favicon-16x16.png','2015-12-04 16:49:00','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(33,'/xstorage/template/img/favicon.ico','2015-12-04 16:49:00','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(34,'/xstorage/template/img/favicon-32x32.png','2015-12-04 16:49:14','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(35,'/xstorage/template/img/favicon-16x16.png','2015-12-04 16:49:14','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(36,'/xstorage/template/img/favicon.ico','2015-12-04 16:49:14','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(37,'/xstorage/template/img/favicon-32x32.png','2015-12-04 16:49:44','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(38,'/xstorage/template/img/favicon-16x16.png','2015-12-04 16:49:44','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(39,'/xstorage/template/img/favicon.ico','2015-12-04 16:49:44','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(40,'/xstorage/template/img/favicon-32x32.png','2015-12-04 16:54:24','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(41,'/xstorage/template/img/favicon-16x16.png','2015-12-04 16:54:24','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(42,'/xstorage/template/img/favicon.ico','2015-12-04 16:54:24','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(43,'/xstorage/template/img/favicon-32x32.png','2015-12-04 16:54:25','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(44,'/xstorage/template/img/favicon-16x16.png','2015-12-04 16:54:25','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(45,'/xstorage/template/img/favicon.ico','2015-12-04 16:54:25','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(46,'/xstorage/template/img/favicon-32x32.png','2015-12-04 16:54:36','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(47,'/xstorage/template/img/favicon-16x16.png','2015-12-04 16:54:36','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(48,'/xstorage/template/img/favicon.ico','2015-12-04 16:54:36','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(49,'/xstorage/template/img/favicon-32x32.png','2015-12-04 16:57:32','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(50,'/xstorage/template/img/favicon-16x16.png','2015-12-04 16:57:32','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(51,'/xstorage/template/img/favicon.ico','2015-12-04 16:57:32','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(52,'/xstorage/template/img/favicon-32x32.png','2015-12-04 16:58:05','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(53,'/xstorage/template/img/favicon-16x16.png','2015-12-04 16:58:05','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(54,'/xstorage/template/img/favicon.ico','2015-12-04 16:58:05','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(55,'/xstorage/template/img/favicon-32x32.png','2015-12-04 17:06:25','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(56,'/xstorage/template/img/favicon-16x16.png','2015-12-04 17:06:25','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(57,'/xstorage/template/img/favicon.ico','2015-12-04 17:06:25','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(58,'/xstorage/template/img/favicon-32x32.png','2015-12-04 17:06:28','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(59,'/xstorage/template/img/favicon-16x16.png','2015-12-04 17:06:28','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(60,'/xstorage/template/img/favicon.ico','2015-12-04 17:06:28','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(61,'/xstorage/template/img/favicon-32x32.png','2015-12-04 17:26:44','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(62,'/xstorage/template/img/favicon-16x16.png','2015-12-04 17:26:44','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(63,'/xstorage/template/img/favicon.ico','2015-12-04 17:26:44','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(64,'/xstorage/template/img/favicon-32x32.png','2015-12-04 17:26:56','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(65,'/xstorage/template/img/favicon-16x16.png','2015-12-04 17:26:56','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(66,'/xstorage/template/img/favicon.ico','2015-12-04 17:26:56','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(67,'/xstorage/template/img/favicon-32x32.png','2015-12-04 17:29:27','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(68,'/xstorage/template/img/favicon-16x16.png','2015-12-04 17:29:27','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(69,'/xstorage/template/img/favicon.ico','2015-12-04 17:29:27','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(70,'/xstorage/template/img/favicon-32x32.png','2015-12-04 17:29:39','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(71,'/xstorage/template/img/favicon-16x16.png','2015-12-04 17:29:39','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(72,'/xstorage/template/img/favicon.ico','2015-12-04 17:29:40','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(73,'/xstorage/template/img/favicon-32x32.png','2015-12-04 17:29:41','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(74,'/xstorage/template/img/favicon-16x16.png','2015-12-04 17:29:41','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(75,'/xstorage/template/img/favicon.ico','2015-12-04 17:29:41','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(76,'/xstorage/template/img/favicon-32x32.png','2015-12-04 17:29:57','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(77,'/xstorage/template/img/favicon-16x16.png','2015-12-04 17:29:57','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(78,'/xstorage/template/img/favicon.ico','2015-12-04 17:29:57','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(79,'/xstorage/template/img/favicon-32x32.png','2015-12-04 17:30:37','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(80,'/xstorage/template/img/favicon-16x16.png','2015-12-04 17:30:37','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(81,'/xstorage/template/img/favicon.ico','2015-12-04 17:30:37','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(82,'/xstorage/template/img/favicon-32x32.png','2015-12-04 17:31:53','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(83,'/xstorage/template/img/favicon-16x16.png','2015-12-04 17:31:53','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(84,'/xstorage/template/img/favicon.ico','2015-12-04 17:31:53','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(85,'/xstorage/template/img/favicon-32x32.png','2015-12-04 17:32:10','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(86,'/xstorage/template/img/favicon-16x16.png','2015-12-04 17:32:10','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(87,'/xstorage/template/img/favicon.ico','2015-12-04 17:32:10','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(88,'/xstorage/template/img/favicon-32x32.png','2015-12-04 17:32:44','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(89,'/xstorage/template/img/favicon-16x16.png','2015-12-04 17:32:44','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(90,'/xstorage/template/img/favicon.ico','2015-12-04 17:32:44','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/?FLUSH_ASSETS_CSS','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(91,'/xstorage/template/img/favicon-32x32.png','2015-12-04 17:42:18','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(92,'/xstorage/template/img/favicon-16x16.png','2015-12-04 17:42:19','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(93,'/xstorage/template/img/favicon.ico','2015-12-04 17:42:19','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(94,'/xstorage/template/img/favicon-32x32.png','2015-12-04 17:42:27','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(95,'/xstorage/template/img/favicon-16x16.png','2015-12-04 17:42:27','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(96,'/xstorage/template/img/favicon.ico','2015-12-04 17:42:27','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(97,'/xstorage/template/img/favicon-32x32.png','2015-12-04 17:42:29','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(98,'/xstorage/template/img/favicon-16x16.png','2015-12-04 17:42:29','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(99,'/xstorage/template/img/favicon.ico','2015-12-04 17:42:29','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(100,'/xstorage/template/img/favicon-32x32.png','2015-12-04 17:42:29','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(101,'/xstorage/template/img/favicon-16x16.png','2015-12-04 17:42:29','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(102,'/xstorage/template/img/favicon.ico','2015-12-04 17:42:30','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(103,'/xstorage/template/img/favicon-32x32.png','2015-12-04 17:47:43','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(104,'/xstorage/template/img/favicon-16x16.png','2015-12-04 17:47:43','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(105,'/xstorage/template/img/favicon.ico','2015-12-04 17:47:43','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(106,'/xstorage/template/img/favicon-32x32.png','2015-12-04 17:48:25','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(107,'/xstorage/template/img/favicon-16x16.png','2015-12-04 17:48:25','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(108,'/xstorage/template/img/favicon.ico','2015-12-04 17:48:25','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(109,'/xstorage/template/img/favicon-32x32.png','2015-12-04 17:48:43','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(110,'/xstorage/template/img/favicon-16x16.png','2015-12-04 17:48:43','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(111,'/xstorage/template/img/favicon.ico','2015-12-04 17:48:43','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(112,'/xstorage/template/img/favicon-32x32.png','2015-12-04 17:57:19','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(113,'/xstorage/template/img/favicon-16x16.png','2015-12-04 17:57:19','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(114,'/xstorage/template/img/favicon.ico','2015-12-04 17:57:19','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(115,'/xstorage/template/img/favicon-32x32.png','2015-12-04 18:03:07','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(116,'/xstorage/template/img/favicon-16x16.png','2015-12-04 18:03:07','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(117,'/xstorage/template/img/favicon.ico','2015-12-04 18:03:07','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(118,'/xstorage/template/img/favicon-32x32.png','2015-12-04 18:03:13','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(119,'/xstorage/template/img/favicon-16x16.png','2015-12-04 18:03:14','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(120,'/xstorage/template/img/favicon.ico','2015-12-04 18:03:14','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(121,'/xstorage/template/img/favicon-32x32.png','2015-12-04 18:03:22','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(122,'/xstorage/template/img/favicon-16x16.png','2015-12-04 18:03:22','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(123,'/xstorage/template/img/favicon.ico','2015-12-04 18:03:22','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(124,'/xstorage/template/img/favicon-32x32.png','2015-12-04 18:03:35','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(125,'/xstorage/template/img/favicon-16x16.png','2015-12-04 18:03:35','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(126,'/xstorage/template/img/favicon.ico','2015-12-04 18:03:35','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(127,'/xstorage/template/img/favicon-32x32.png','2015-12-04 18:03:36','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(128,'/xstorage/template/img/favicon-16x16.png','2015-12-04 18:03:36','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(129,'/xstorage/template/img/favicon.ico','2015-12-04 18:03:36','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(130,'/xstorage/template/img/favicon-32x32.png','2015-12-04 18:03:36','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(131,'/xstorage/template/img/favicon-16x16.png','2015-12-04 18:03:36','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(132,'/xstorage/template/img/favicon.ico','2015-12-04 18:03:37','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(133,'/xstorage/template/img/favicon-32x32.png','2015-12-04 18:03:38','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(134,'/xstorage/template/img/favicon-16x16.png','2015-12-04 18:03:38','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(135,'/xstorage/template/img/favicon.ico','2015-12-04 18:03:38','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://weinakademiker.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(136,'/xstorage/template/img/favicon-32x32.png','2015-12-04 18:05:00','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://edge.v6.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(137,'/xstorage/template/img/favicon-16x16.png','2015-12-04 18:05:00','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://edge.v6.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(138,'/xstorage/template/img/favicon.ico','2015-12-04 18:05:00','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://edge.v6.xgodev.com/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(139,'/xstorage/template/img/favicon-32x32.png','2015-12-05 09:57:17','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://edge.v6.donefor.me/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(140,'/xstorage/template/img/favicon-16x16.png','2015-12-05 09:57:17','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://edge.v6.donefor.me/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(141,'/xstorage/template/img/favicon.ico','2015-12-05 09:57:17','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://edge.v6.donefor.me/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(142,'/xstorage/template/img/favicon-32x32.png','2015-12-05 10:41:08','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://edge.v6.donefor.me/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(143,'/xstorage/template/img/favicon-16x16.png','2015-12-05 10:41:08','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://edge.v6.donefor.me/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(144,'/xstorage/template/img/favicon.ico','2015-12-05 10:41:09','62.178.65.83','chello062178065083.22.11.vie.surfer.at','http://edge.v6.donefor.me/','','','','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'),(145,'/xstorage/template/img/favicon-16x16.png','2015-12-05 10:42:35','104.45.18.178','104.45.18.178','','','','','Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5');
/*!40000 ALTER TABLE `pages_not_found` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages_settings_atoms`
--

DROP TABLE IF EXISTS `pages_settings_atoms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages_settings_atoms` (
  `psa_id` int(11) NOT NULL AUTO_INCREMENT,
  `psa_fid` int(11) NOT NULL DEFAULT '0',
  `psa_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `psa_p_id` int(11) NOT NULL,
  `psa_a_id` int(11) NOT NULL,
  `psa_as_id` int(11) NOT NULL,
  `psa_json_cfg` longtext NOT NULL,
  `psa_inline_a_id` int(11) NOT NULL DEFAULT '0',
  `psa_sort` int(11) NOT NULL DEFAULT '0',
  `psa_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `psa_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `psa_tm_id` int(11) NOT NULL,
  PRIMARY KEY (`psa_id`),
  KEY `psa_fid` (`psa_fid`,`psa_del`,`psa_as_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages_settings_atoms`
--

LOCK TABLES `pages_settings_atoms` WRITE;
/*!40000 ALTER TABLE `pages_settings_atoms` DISABLE KEYS */;
INSERT INTO `pages_settings_atoms` VALUES (1,0,'N',1,1044,3079,'',0,0,'2015-12-04 16:34:49','2015-12-04 16:34:49',0),(2,0,'N',2,1044,3079,'',0,1,'2015-12-04 16:40:03','2015-12-04 16:40:03',0),(3,1,'N',1,0,3079,'{}',1052,0,'2015-12-04 18:31:01','2015-12-04 18:30:56',0);
/*!40000 ALTER TABLE `pages_settings_atoms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages_settings_atoms_history`
--

DROP TABLE IF EXISTS `pages_settings_atoms_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages_settings_atoms_history` (
  `psah_id` int(11) NOT NULL AUTO_INCREMENT,
  `psah_psa_id` int(11) NOT NULL,
  `psah_psa_cfg_old` mediumtext NOT NULL,
  `psah_psa_cfg_new` mediumtext NOT NULL,
  `psah_psa_cfg_diff` mediumtext NOT NULL,
  `psah_user_id` int(11) NOT NULL,
  `psah_user_ip` varchar(50) NOT NULL,
  `psah_user_host` text NOT NULL,
  `psah_ts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`psah_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages_settings_atoms_history`
--

LOCK TABLES `pages_settings_atoms_history` WRITE;
/*!40000 ALTER TABLE `pages_settings_atoms_history` DISABLE KEYS */;
INSERT INTO `pages_settings_atoms_history` VALUES (1,3,'','{}','[]',1,'62.178.65.83','chello062178065083.22.11.vie.surfer.at','2015-12-04 18:31:01');
/*!40000 ALTER TABLE `pages_settings_atoms_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qmail`
--

DROP TABLE IF EXISTS `qmail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qmail` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_og_mode_en` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_og_mode_de` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_seo_mode_en` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_seo_mode_de` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_settings` mediumtext NOT NULL COMMENT '1812::JSON:: ',
  `wz_status` enum('WAIT','DONE','ERROR') NOT NULL DEFAULT 'WAIT' COMMENT '1814::COMBO:: ',
  `wz_sent` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '1813::TIMESTAMP:: ',
  `wz_ip` text NOT NULL COMMENT '1811::TEXT:: ',
  `wz_RESEND` int(11) NOT NULL COMMENT '1827::ACTION:: Resend',
  `wz_OPEN` int(11) NOT NULL COMMENT '1828::ACTION:: Open',
  PRIMARY KEY (`wz_id`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='WIZARD :: qmail (533)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qmail`
--

LOCK TABLES `qmail` WRITE;
/*!40000 ALTER TABLE `qmail` DISABLE KEYS */;
/*!40000 ALTER TABLE `qmail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_s_id` int(11) NOT NULL,
  `r_isOnline` enum('Y','N') NOT NULL DEFAULT 'N',
  `r_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `r_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `r_sort` int(11) NOT NULL DEFAULT '99999999',
  `r_name` varchar(255) NOT NULL,
  `r_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `r_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `r_lastmodBy` int(11) NOT NULL,
  `r_createdBy` int(11) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles_settings`
--

DROP TABLE IF EXISTS `roles_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles_settings` (
  `rs_id` int(11) NOT NULL AUTO_INCREMENT,
  `rs_s_id` int(11) NOT NULL,
  `rs_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `rs_r_id` int(11) NOT NULL DEFAULT '-1' COMMENT 'role',
  `rs_x_read` enum('Y','N') NOT NULL DEFAULT 'N',
  `rs_x_insert` enum('Y','N') NOT NULL DEFAULT 'N',
  `rs_x_update` enum('Y','N') NOT NULL DEFAULT 'N',
  `rs_x_delete` enum('Y','N') NOT NULL DEFAULT 'N',
  `rs_x_recursive` enum('Y','N') NOT NULL DEFAULT 'N',
  `rs_tag` varchar(255) NOT NULL,
  `rs_f_tid` int(11) NOT NULL DEFAULT '-1' COMMENT 'foreign table id',
  `rs_f_rid` int(11) NOT NULL DEFAULT '-1' COMMENT 'foreign record id',
  PRIMARY KEY (`rs_id`),
  KEY `rs_r_id` (`rs_r_id`,`rs_tag`,`rs_f_rid`),
  KEY `rs_r_id_2` (`rs_r_id`,`rs_tag`,`rs_f_tid`,`rs_f_rid`),
  KEY `rs_s_id` (`rs_s_id`,`rs_tag`,`rs_f_rid`),
  KEY `rs_s_id_2` (`rs_s_id`,`rs_del`,`rs_r_id`,`rs_x_read`,`rs_tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_settings`
--

LOCK TABLES `roles_settings` WRITE;
/*!40000 ALTER TABLE `roles_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles_tags`
--

DROP TABLE IF EXISTS `roles_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles_tags` (
  `rt_id` int(11) NOT NULL AUTO_INCREMENT,
  `rt_s_id` int(11) NOT NULL,
  `rt_sys_tag` enum('Y','N') NOT NULL DEFAULT 'N',
  `rt_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `rt_name` varchar(255) NOT NULL,
  `rt_name_human` varchar(255) NOT NULL,
  `rt_fid` int(11) NOT NULL,
  `rt_sort` int(11) NOT NULL,
  `rt_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rt_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rt_lastmodBy` int(11) NOT NULL,
  `rt_createdBy` int(11) NOT NULL,
  PRIMARY KEY (`rt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_tags`
--

LOCK TABLES `roles_tags` WRITE;
/*!40000 ALTER TABLE `roles_tags` DISABLE KEYS */;
INSERT INTO `roles_tags` VALUES (98,1,'Y','N','infopool','Infopool',0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0),(99,1,'Y','N','fa','Fa',0,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0),(100,1,'Y','N','pages','Seiten',0,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0),(103,1,'N','N','translations','Übersetzungen',0,4,'0000-00-00 00:00:00','2015-11-20 00:33:26',0,0),(105,1,'Y','N','log_history','Log History',0,0,'0000-00-00 00:00:00','2015-11-20 00:13:05',0,0),(106,1,'N','N','users','Benutzer',0,5,'2015-02-24 18:12:21','2015-02-24 18:12:26',0,0),(107,1,'N','N','sites','Sitesettings',0,6,'2015-02-24 18:12:32','2015-02-24 18:13:03',0,0);
/*!40000 ALTER TABLE `roles_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles_tags_roles`
--

DROP TABLE IF EXISTS `roles_tags_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles_tags_roles` (
  `rtr_id` int(11) NOT NULL AUTO_INCREMENT,
  `rtr_rt_id` int(11) NOT NULL,
  `rtr_u_id` int(11) NOT NULL,
  PRIMARY KEY (`rtr_id`),
  KEY `rtr_u_id` (`rtr_u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_tags_roles`
--

LOCK TABLES `roles_tags_roles` WRITE;
/*!40000 ALTER TABLE `roles_tags_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles_tags_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles_tags_user`
--

DROP TABLE IF EXISTS `roles_tags_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles_tags_user` (
  `rtu_id` int(11) NOT NULL AUTO_INCREMENT,
  `rtu_rt_id` int(11) NOT NULL,
  `rtu_u_id` int(11) NOT NULL,
  PRIMARY KEY (`rtu_id`),
  KEY `rtu_u_id` (`rtu_u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_tags_user`
--

LOCK TABLES `roles_tags_user` WRITE;
/*!40000 ALTER TABLE `roles_tags_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles_tags_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles_user`
--

DROP TABLE IF EXISTS `roles_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles_user` (
  `ru_id` int(11) NOT NULL AUTO_INCREMENT,
  `ru_u_id` int(11) NOT NULL,
  `ru_r_id` int(11) NOT NULL,
  `ru_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ru_createdBy` int(11) NOT NULL,
  PRIMARY KEY (`ru_id`),
  KEY `ru_u_id` (`ru_u_id`,`ru_r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_user`
--

LOCK TABLES `roles_user` WRITE;
/*!40000 ALTER TABLE `roles_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sites` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_defaultSite` enum('Y','N') NOT NULL DEFAULT 'N',
  `s_fid` int(11) NOT NULL,
  `s_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `s_sort` int(11) NOT NULL,
  `s_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `s_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `s_name` varchar(255) NOT NULL,
  `s_p_id` int(11) NOT NULL COMMENT 'RootPage',
  `s_online` enum('Y','N') NOT NULL DEFAULT 'N',
  `s_maintenance` enum('Y','N') NOT NULL DEFAULT 'N',
  `s_s_storage_scope` int(11) NOT NULL,
  `s_error_p_id` int(11) NOT NULL,
  `s_maintenance_p_id` int(11) NOT NULL,
  `s_suffix` varchar(255) NOT NULL,
  `s_redirectTLP` enum('Y','N') NOT NULL DEFAULT 'N',
  `s_redirectTLP_domain` text NOT NULL,
  `s_robots_txt` longtext NOT NULL,
  `s_mail_from_name` text NOT NULL,
  `s_mail_from_email` text NOT NULL,
  `s_mail_smtp_server` text NOT NULL,
  `s_mail_smtp_user` text NOT NULL,
  `s_mail_smtp_pwd` text NOT NULL,
  `s_errorPage_mailing` int(11) NOT NULL,
  `s_errorPage_internalError` int(11) NOT NULL,
  `s_html_editor` longtext NOT NULL,
  `s_p_id_mobile` int(11) NOT NULL,
  `s_p_id_outofdate` int(11) NOT NULL,
  `s_p_forms` int(11) NOT NULL,
  `s_humans_txt` longtext NOT NULL,
  `s_default_lang` varchar(2) NOT NULL,
  `s_default_be_lang` varchar(2) NOT NULL,
  `s_mail_smtp_server_port` text NOT NULL,
  `s_mail_smtp_server_auth` text NOT NULL,
  `s_default_img_s_id` int(11) NOT NULL DEFAULT '0',
  `s_favico_s_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`s_id`),
  KEY `s_defaultSite` (`s_defaultSite`),
  KEY `xredaktor_niceurl::getSiteConfigViaPageId_def` (`s_defaultSite`,`s_del`,`s_online`),
  KEY `xredaktor_niceurl::getSiteConfigViaPageId` (`s_id`,`s_del`,`s_online`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sites`
--

LOCK TABLES `sites` WRITE;
/*!40000 ALTER TABLE `sites` DISABLE KEYS */;
INSERT INTO `sites` VALUES (1,'Y',0,'N',0,'2015-12-04 16:07:48','0000-00-00 00:00:00','website',1,'Y','N',0,2,0,'.html','N','','','','','','','',0,0,'',0,0,0,'','','','','',0,0);
/*!40000 ALTER TABLE `sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sites_be_languages`
--

DROP TABLE IF EXISTS `sites_be_languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sites_be_languages` (
  `sbl_id` int(11) NOT NULL AUTO_INCREMENT,
  `sbl_s_id` int(11) NOT NULL,
  `sbl_bl_id` int(11) NOT NULL,
  `sbl_online` enum('Y','N') NOT NULL DEFAULT 'Y',
  `sbl_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `sbl_fid` int(11) NOT NULL,
  `sbl_sort` int(11) NOT NULL,
  `sbl_lastMod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sbl_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sbl_lastModBy` int(11) NOT NULL,
  `sbl_createdBy` int(11) NOT NULL,
  PRIMARY KEY (`sbl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sites_be_languages`
--

LOCK TABLES `sites_be_languages` WRITE;
/*!40000 ALTER TABLE `sites_be_languages` DISABLE KEYS */;
INSERT INTO `sites_be_languages` VALUES (1,1,1,'Y','N',0,0,'2015-12-06 18:15:12','0000-00-00 00:00:00',0,0),(2,1,2,'Y','N',0,0,'2015-12-06 18:15:12','0000-00-00 00:00:00',0,0),(3,1,3,'Y','N',0,0,'2015-12-06 18:15:12','0000-00-00 00:00:00',0,0);
/*!40000 ALTER TABLE `sites_be_languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sites_faces`
--

DROP TABLE IF EXISTS `sites_faces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sites_faces` (
  `sf_id` int(11) NOT NULL AUTO_INCREMENT,
  `sf_s_id` int(11) NOT NULL,
  `sf_f_id` int(11) NOT NULL,
  `sf_online` enum('Y','N') NOT NULL DEFAULT 'Y',
  `sf_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `sf_fid` int(11) NOT NULL,
  `sf_sort` int(11) NOT NULL,
  `sf_lastMod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sf_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sf_lastModBy` int(11) NOT NULL,
  `sf_createdBy` int(11) NOT NULL,
  PRIMARY KEY (`sf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sites_faces`
--

LOCK TABLES `sites_faces` WRITE;
/*!40000 ALTER TABLE `sites_faces` DISABLE KEYS */;
INSERT INTO `sites_faces` VALUES (1,1,1,'Y','N',0,0,'2015-12-06 18:16:30','0000-00-00 00:00:00',0,0),(2,1,2,'Y','N',0,0,'2015-12-06 18:16:30','0000-00-00 00:00:00',0,0);
/*!40000 ALTER TABLE `sites_faces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sites_fe_languages`
--

DROP TABLE IF EXISTS `sites_fe_languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sites_fe_languages` (
  `sfl_id` int(11) NOT NULL AUTO_INCREMENT,
  `sfl_s_id` int(11) NOT NULL,
  `sfl_fl_id` int(11) NOT NULL,
  `sfl_online` enum('Y','N') NOT NULL DEFAULT 'Y',
  `sfl_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `sfl_fid` int(11) NOT NULL,
  `sfl_sort` int(11) NOT NULL,
  `sfl_lastMod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sfl_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sfl_lastModBy` int(11) NOT NULL,
  `sfl_createdBy` int(11) NOT NULL,
  PRIMARY KEY (`sfl_id`),
  KEY `xredaktor_pages::getValidLangs` (`sfl_online`,`sfl_del`,`sfl_fl_id`,`sfl_s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sites_fe_languages`
--

LOCK TABLES `sites_fe_languages` WRITE;
/*!40000 ALTER TABLE `sites_fe_languages` DISABLE KEYS */;
INSERT INTO `sites_fe_languages` VALUES (1,1,1,'Y','N',0,0,'2015-12-06 18:15:12','0000-00-00 00:00:00',0,0),(2,1,2,'Y','N',0,0,'2015-12-06 18:15:12','0000-00-00 00:00:00',0,0),(3,1,3,'Y','N',0,0,'2015-12-06 18:15:12','0000-00-00 00:00:00',0,0),(4,1,4,'Y','N',0,0,'2015-12-06 18:15:12','0000-00-00 00:00:00',0,0),(5,1,5,'Y','N',0,0,'2015-12-06 18:15:12','0000-00-00 00:00:00',0,0),(6,1,6,'Y','N',0,0,'2015-12-06 18:15:12','0000-00-00 00:00:00',0,0),(7,1,7,'Y','N',0,0,'2015-12-06 18:15:12','0000-00-00 00:00:00',0,0),(8,1,8,'Y','N',0,0,'2015-12-06 18:15:12','0000-00-00 00:00:00',0,0),(9,1,9,'Y','N',0,0,'2015-12-06 18:15:12','0000-00-00 00:00:00',0,0);
/*!40000 ALTER TABLE `sites_fe_languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `storage`
--

DROP TABLE IF EXISTS `storage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `storage` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_crop_original_s_id` int(11) NOT NULL,
  `s_crop_data` text NOT NULL,
  `s_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `s_dir` enum('Y','N') NOT NULL DEFAULT 'Y',
  `s_storage_scope` int(255) NOT NULL,
  `s_isOnline` enum('Y','N') NOT NULL DEFAULT 'N',
  `s_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `s_sort` int(11) NOT NULL DEFAULT '99999999',
  `s_nice_hash_cz` tinytext NOT NULL,
  `s_nice_url_cz` tinytext NOT NULL,
  `s_nice_hash_ro` tinytext NOT NULL,
  `s_nice_url_ro` tinytext NOT NULL,
  `s_nice_hash_ru` tinytext NOT NULL,
  `s_nice_url_ru` tinytext NOT NULL,
  `s_nice_hash_hu` tinytext NOT NULL,
  `s_nice_url_hu` tinytext NOT NULL,
  `s_nice_hash_it` tinytext NOT NULL,
  `s_nice_url_it` tinytext NOT NULL,
  `s_nice_hash_fr` tinytext NOT NULL,
  `s_nice_url_fr` tinytext NOT NULL,
  `s_nice_hash_en` tinytext NOT NULL,
  `s_nice_url_en` tinytext NOT NULL,
  `s_nice_hash_de` tinytext NOT NULL,
  `s_nice_url_de` tinytext NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_name_cz` tinytext NOT NULL,
  `s_name_hu` tinytext NOT NULL,
  `s_name_sk` tinytext NOT NULL,
  `s_name_ro` tinytext NOT NULL,
  `s_name_it` tinytext NOT NULL,
  `s_name_fr` tinytext NOT NULL,
  `s_name_ru` tinytext NOT NULL,
  `s_name_en` tinytext NOT NULL,
  `s_name_de` tinytext NOT NULL,
  `s_name_bb` tinytext NOT NULL,
  `s_onDisk` text NOT NULL,
  `s_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `s_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `s_lastmodBy` int(11) NOT NULL,
  `s_createdBy` int(11) NOT NULL,
  `s_fileSizeBytes` int(11) NOT NULL,
  `s_fileSizeBytesHuman` varchar(50) NOT NULL,
  `s_mimeType` varchar(255) NOT NULL,
  `s_media_w` int(11) NOT NULL,
  `s_media_h` int(11) NOT NULL,
  `s_alts` longtext NOT NULL,
  `s_del_soft` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `s_del_hard` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `s_del_softBy` int(11) NOT NULL,
  `s_del_hardBy` int(11) NOT NULL,
  `s_version` int(11) NOT NULL DEFAULT '1',
  `s_title` text NOT NULL,
  `s_desc` text NOT NULL,
  `s_desc_long` text NOT NULL,
  `s_exif` text NOT NULL,
  `s_geopoint_lat` double NOT NULL,
  `s_geopoint_long` double NOT NULL,
  `s_geopoint_alt` float NOT NULL,
  `s_keywords` text NOT NULL,
  PRIMARY KEY (`s_id`),
  KEY `s_onDisk` (`s_onDisk`(255)),
  KEY `s_del` (`s_del`,`s_dir`,`s_storage_scope`,`s_fid`,`s_onDisk`(255)),
  KEY `s_del_2` (`s_del`,`s_dir`,`s_storage_scope`,`s_fid`),
  KEY `s_del_3` (`s_del`,`s_dir`,`s_fid`,`s_name`),
  KEY `s_id` (`s_id`,`s_del`,`s_dir`),
  KEY `s_id_2` (`s_id`,`s_del`),
  KEY `s_del_4` (`s_del`,`s_fid`),
  KEY `s_fid` (`s_fid`),
  KEY `s_del_5` (`s_del`,`s_dir`,`s_storage_scope`),
  KEY `s_dir` (`s_dir`,`s_fid`),
  KEY `s_del_6` (`s_del`,`s_storage_scope`,`s_fid`,`s_name`),
  KEY `s_name` (`s_name`),
  KEY `s_mimeType` (`s_mimeType`),
  KEY `s_id_3` (`s_id`,`s_mimeType`),
  KEY `s_crop_original_s_id` (`s_crop_original_s_id`),
  KEY `s_id_4` (`s_id`,`s_del`,`s_mimeType`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `storage`
--

LOCK TABLES `storage` WRITE;
/*!40000 ALTER TABLE `storage` DISABLE KEYS */;
INSERT INTO `storage` VALUES (1,0,'','N','Y',1,'N',0,1,'','','','','','','','','','','','','','','','','template','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template','2015-12-04 16:09:58','0000-00-00 00:00:00',0,0,0,'','',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(2,0,'','N','Y',1,'N',1,1,'','','','','','','','','','','','','','','','','js','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/js','2015-12-04 16:10:27','0000-00-00 00:00:00',0,0,0,'','',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(3,0,'','N','Y',1,'N',1,2,'','','','','','','','','','','','','','','','','css','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/css','2015-12-04 16:10:31','0000-00-00 00:00:00',0,0,0,'','',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(4,0,'','N','Y',1,'N',1,3,'','','','','','','','','','','','','','','','','img','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/img','2015-12-04 16:10:35','0000-00-00 00:00:00',0,0,0,'','',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(5,0,'','N','Y',1,'N',1,4,'','','','','','','','','','','','','','','','','libs','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs','2015-12-04 16:11:32','0000-00-00 00:00:00',0,0,0,'','',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(6,0,'','N','Y',1,'N',5,1,'','','','','','','','','','','','','','','','','bootstrap','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/bootstrap','2015-12-04 16:12:44','0000-00-00 00:00:00',0,0,0,'','',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(7,0,'','Y','N',1,'N',6,0,'','','','','','','','','','','','','','','','','bootstrap.min.css','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/bootstrap/bootstrap.min.css','2015-12-04 16:13:05','2015-12-04 16:12:50',0,0,121260,'118.42 kB','text/css',0,0,'','2015-12-04 16:13:05','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(8,0,'','N','Y',1,'N',6,1,'','','','','','','','','','','','','','','','','css','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/bootstrap/css','2015-12-04 16:13:08','0000-00-00 00:00:00',0,0,0,'','',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(9,0,'','N','Y',1,'N',6,2,'','','','','','','','','','','','','','','','','js','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/bootstrap/js','2015-12-04 16:13:11','0000-00-00 00:00:00',0,0,0,'','',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(10,0,'','N','Y',1,'N',6,3,'','','','','','','','','','','','','','','','','fonts','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/bootstrap/fonts','2015-12-04 16:13:14','0000-00-00 00:00:00',0,0,0,'','',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(11,0,'','N','N',1,'N',8,0,'','','','','','','','','','','','','','','','','bootstrap.min.css','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/bootstrap/css/bootstrap.min.css','2015-12-04 16:31:40','2015-12-04 16:13:19',0,0,121260,'118.42 kB','text/css',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(12,0,'','N','N',1,'N',9,0,'','','','','','','','','','','','','','','','','bootstrap.min.js','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/bootstrap/js/bootstrap.min.js','2015-12-04 16:31:40','2015-12-04 16:13:26',0,0,36868,'36.00 kB','application/javascript',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(13,0,'','N','N',1,'N',10,0,'','','','','','','','','','','','','','','','','glyphicons-halflings-regular.eot','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/bootstrap/fonts/glyphicons-halflings-regular.eot','2015-12-04 16:31:40','2015-12-04 16:13:32',0,0,20127,'19.66 kB','application/octet-stream',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(14,0,'','N','N',1,'N',10,1,'','','','','','','','','','','','','','','','','glyphicons-halflings-regular.woff2','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/bootstrap/fonts/glyphicons-halflings-regular.woff2','2015-12-04 16:31:40','2015-12-04 16:13:32',0,0,18028,'17.61 kB','application/octet-stream',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(15,0,'','N','N',1,'N',10,1,'','','','','','','','','','','','','','','','','glyphicons-halflings-regular.ttf','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/bootstrap/fonts/glyphicons-halflings-regular.ttf','2015-12-04 16:31:40','2015-12-04 16:13:32',0,0,45404,'44.34 kB','application/octet-stream',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(16,0,'','N','N',1,'N',10,2,'','','','','','','','','','','','','','','','','glyphicons-halflings-regular.svg','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/bootstrap/fonts/glyphicons-halflings-regular.svg','2015-12-04 16:31:40','2015-12-04 16:13:32',0,0,108738,'106.19 kB','image/svg+xml',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(17,0,'','N','N',1,'N',10,3,'','','','','','','','','','','','','','','','','glyphicons-halflings-regular.woff','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/bootstrap/fonts/glyphicons-halflings-regular.woff','2015-12-04 16:31:40','2015-12-04 16:13:33',0,0,23424,'22.88 kB','application/octet-stream',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(18,0,'','N','Y',1,'N',5,2,'','','','','','','','','','','','','','','','','owlCarousel','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/owlCarousel','2015-12-04 16:14:29','0000-00-00 00:00:00',0,0,0,'','',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(19,0,'','N','N',1,'N',18,0,'','','','','','','','','','','','','','','','','grabbing.png','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/owlCarousel/grabbing.png','2015-12-04 16:31:40','2015-12-04 16:14:50',0,0,116,'116 B','image/png',16,16,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(20,0,'','N','N',1,'N',18,1,'','','','','','','','','','','','','','','','','owl.carousel.css','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/owlCarousel/owl.carousel.css','2015-12-04 16:31:40','2015-12-04 16:14:50',0,0,1476,'1.44 kB','text/css',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(21,0,'','N','N',1,'N',18,2,'','','','','','','','','','','','','','','','','owl.theme.css','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/owlCarousel/owl.theme.css','2015-12-04 16:31:40','2015-12-04 16:14:50',0,0,1665,'1.63 kB','text/css',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(22,0,'','N','N',1,'N',18,3,'','','','','','','','','','','','','','','','','owl.transitions.css','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/owlCarousel/owl.transitions.css','2015-12-04 16:31:40','2015-12-04 16:14:50',0,0,4476,'4.37 kB','text/css',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(23,0,'','N','N',1,'N',18,4,'','','','','','','','','','','','','','','','','owl.carousel.min.js','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/owlCarousel/owl.carousel.min.js','2015-12-04 16:31:40','2015-12-04 16:14:50',0,0,23890,'23.33 kB','application/javascript',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(24,0,'','N','N',1,'N',18,5,'','','','','','','','','','','','','','','','','AjaxLoader.gif','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/owlCarousel/AjaxLoader.gif','2015-12-04 16:31:40','2015-12-04 16:14:51',0,0,1517,'1.48 kB','image/gif',32,32,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(25,0,'','N','Y',1,'N',5,3,'','','','','','','','','','','','','','','','','swipeBox','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/swipeBox','2015-12-04 16:15:32','0000-00-00 00:00:00',0,0,0,'','',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(26,0,'','N','Y',1,'N',25,1,'','','','','','','','','','','','','','','','','css','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/swipeBox/css','2015-12-04 16:15:37','0000-00-00 00:00:00',0,0,0,'','',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(27,0,'','N','Y',1,'N',25,2,'','','','','','','','','','','','','','','','','js','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/swipeBox/js','2015-12-04 16:15:40','0000-00-00 00:00:00',0,0,0,'','',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(28,0,'','N','Y',1,'N',25,3,'','','','','','','','','','','','','','','','','img','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/swipeBox/img','2015-12-04 16:15:44','0000-00-00 00:00:00',0,0,0,'','',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(29,0,'','N','N',1,'N',26,0,'','','','','','','','','','','','','','','','','swipebox.min.css','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/swipeBox/css/swipebox.min.css','2015-12-04 16:31:40','2015-12-04 16:15:50',0,0,4308,'4.21 kB','text/css',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(30,0,'','N','N',1,'N',27,0,'','','','','','','','','','','','','','','','','jquery.swipebox.min.js','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/swipeBox/js/jquery.swipebox.min.js','2015-12-04 16:31:40','2015-12-04 16:15:59',0,0,12843,'12.54 kB','application/javascript',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(31,0,'','N','N',1,'N',28,0,'','','','','','','','','','','','','','','','','icons.svg','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/swipeBox/img/icons.svg','2015-12-04 16:31:40','2015-12-04 16:16:06',0,0,1431,'1.40 kB','image/svg+xml',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(32,0,'','N','N',1,'N',28,1,'','','','','','','','','','','','','','','','','loader.gif','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/swipeBox/img/loader.gif','2015-12-04 16:31:40','2015-12-04 16:16:06',0,0,2608,'2.55 kB','image/gif',31,31,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(33,0,'','N','N',1,'N',28,2,'','','','','','','','','','','','','','','','','icons.png','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/swipeBox/img/icons.png','2015-12-04 16:31:40','2015-12-04 16:16:06',0,0,729,'729 B','image/png',120,24,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(34,0,'','N','Y',1,'N',5,4,'','','','','','','','','','','','','','','','','selectOrDie','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/selectOrDie','2015-12-04 16:16:51','0000-00-00 00:00:00',0,0,0,'','',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(35,0,'','N','N',1,'N',34,0,'','','','','','','','','','','','','','','','','selectordie.css','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/selectOrDie/selectordie.css','2015-12-04 16:31:40','2015-12-04 16:16:58',0,0,8325,'8.13 kB','text/css',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(36,0,'','N','N',1,'N',34,1,'','','','','','','','','','','','','','','','','selectordie.min.js','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/selectOrDie/selectordie.min.js','2015-12-04 16:31:40','2015-12-04 16:16:58',0,0,9556,'9.33 kB','application/javascript',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(37,0,'','N','Y',1,'N',5,999999,'','','','','','','','','','','','','','','','','icomoon','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/icomoon','2015-12-04 16:18:54','2015-12-04 16:18:54',0,0,0,'','',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(38,0,'','N','Y',1,'N',37,999999,'','','','','','','','','','','','','','','','','fonts','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/icomoon/fonts','2015-12-04 16:18:54','2015-12-04 16:18:54',0,0,0,'','',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(39,0,'','N','N',1,'N',38,999999,'','','','','','','','','','','','','','','','','icomoon.woff','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/icomoon/fonts/icomoon.woff','2015-12-04 16:31:40','2015-12-04 16:18:54',0,0,18664,'18.23 kB','application/octet-stream',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(40,0,'','N','N',1,'N',38,999999,'','','','','','','','','','','','','','','','','icomoon.svg','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/icomoon/fonts/icomoon.svg','2015-12-04 16:31:40','2015-12-04 16:18:54',0,0,69574,'67.94 kB','image/svg+xml',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(41,0,'','N','N',1,'N',38,999999,'','','','','','','','','','','','','','','','','icomoon.eot','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/icomoon/fonts/icomoon.eot','2015-12-04 16:31:40','2015-12-04 16:18:54',0,0,18752,'18.31 kB','application/octet-stream',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(42,0,'','N','N',1,'N',38,999999,'','','','','','','','','','','','','','','','','icomoon.ttf','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/icomoon/fonts/icomoon.ttf','2015-12-04 16:31:40','2015-12-04 16:18:54',0,0,18588,'18.15 kB','application/octet-stream',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(43,0,'','N','N',1,'N',37,999999,'','','','','','','','','','','','','','','','','style.css','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/icomoon/style.css','2015-12-04 16:31:40','2015-12-04 16:18:54',0,0,7550,'7.37 kB','text/css',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(44,0,'','N','N',1,'N',3,999999,'','','','','','','','','','','','','','','','','styles.less','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/css/styles.less','2015-12-04 16:31:40','2015-12-04 16:31:40',0,0,46643,'45.55 kB','text/less',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(45,0,'','N','N',1,'N',3,999999,'','','','','','','','','','','','','','','','','mixinsAndVars.less','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/css/mixinsAndVars.less','2015-12-04 16:31:40','2015-12-04 16:31:40',0,0,15200,'14.84 kB','text/less',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(46,0,'','N','N',1,'N',2,999999,'','','','','','','','','','','','','','','','','script.js','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/js/script.js','2015-12-04 16:31:40','2015-12-04 16:31:40',0,0,0,'0 B','application/javascript',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(47,0,'','N','Y',1,'N',5,1000000,'','','','','','','','','','','','','','','','','jQuery','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/jQuery','2015-12-04 16:32:51','0000-00-00 00:00:00',0,0,0,'','',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(48,0,'','N','N',1,'N',47,0,'','','','','','','','','','','','','','','','','jquery-1.11.3.min.js','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/jQuery/jquery-1.11.3.min.js','2015-12-04 16:33:06','2015-12-04 16:33:06',0,0,95957,'93.71 kB','application/javascript',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(49,0,'','N','Y',1,'N',5,1000001,'','','','','','','','','','','','','','','','','animateCSS','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/animateCSS','2015-12-04 16:37:38','0000-00-00 00:00:00',0,0,0,'','',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(50,0,'','N','N',1,'N',49,0,'','','','','','','','','','','','','','','','','animate.css','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/libs/animateCSS/animate.css','2015-12-04 16:37:42','2015-12-04 16:37:42',0,0,70824,'69.16 kB','text/css',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(51,0,'','N','Y',1,'N',4,1,'','','','','','','','','','','','','','','','','favicon','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/img/favicon','2015-12-04 16:53:43','0000-00-00 00:00:00',0,0,0,'','',0,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(52,0,'','N','N',1,'N',51,0,'','','','','','','','','','','','','','','','','favicon.ico','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/img/favicon/favicon.ico','2015-12-04 16:53:47','2015-12-04 16:53:47',0,0,5430,'5.30 kB','image/vnd.microsoft.icon',32,32,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(53,0,'','N','N',1,'N',51,1,'','','','','','','','','','','','','','','','','favicon-16x16.png','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/img/favicon/favicon-16x16.png','2015-12-04 16:53:47','2015-12-04 16:53:47',0,0,255,'255 B','image/png',16,16,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,''),(54,0,'','N','N',1,'N',51,2,'','','','','','','','','','','','','','','','','favicon-32x32.png','','','','','','','','','','','/srv/gitgo_daten/www/weinakademiker.xgodev.com/web/xstorage/template/img/favicon/favicon-32x32.png','2015-12-04 16:53:47','2015-12-04 16:53:47',0,0,513,'513 B','image/png',32,32,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,1,'','','','',0,0,0,'');
/*!40000 ALTER TABLE `storage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `storage_groups`
--

DROP TABLE IF EXISTS `storage_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `storage_groups` (
  `sg_id` int(11) NOT NULL AUTO_INCREMENT,
  `sg_moveAble` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `sg_fid` int(11) NOT NULL,
  `sg_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sg_name_cz` tinytext NOT NULL,
  `sg_name_hu` tinytext NOT NULL,
  `sg_name_sk` tinytext NOT NULL,
  `sg_name_ro` tinytext NOT NULL,
  `sg_name_it` tinytext NOT NULL,
  `sg_name_fr` tinytext NOT NULL,
  `sg_name_ru` tinytext NOT NULL,
  `sg_name_en` tinytext NOT NULL,
  `sg_name_de` tinytext NOT NULL,
  `sg_name_bb` tinytext NOT NULL,
  `sg_del` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `sg_sort` int(11) NOT NULL,
  `sg_lastMod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sg_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sg_lastModBy` int(11) NOT NULL,
  `sg_createdBy` int(11) NOT NULL,
  `sg_dirname` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `storage_groups`
--

LOCK TABLES `storage_groups` WRITE;
/*!40000 ALTER TABLE `storage_groups` DISABLE KEYS */;
INSERT INTO `storage_groups` VALUES (1,'N',0,'xstorage','xstorage','xstorage','','xstorage','xstorage','xstorage','xstorage','xstorage','xstorage','','N',0,'2015-02-24 15:08:16','2011-10-10 22:22:57',0,0,'xstorage');
/*!40000 ALTER TABLE `storage_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_tags`
--

DROP TABLE IF EXISTS `sys_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_tags` (
  `sys_id` int(11) NOT NULL AUTO_INCREMENT,
  `sys_fid` int(11) NOT NULL,
  `sys_sort` int(11) NOT NULL,
  `sys_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `sys_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sys_lastChangedBy` int(11) NOT NULL,
  `sys_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sys_createdBy` int(11) NOT NULL,
  `sys_found` enum('Y','N') NOT NULL DEFAULT 'N',
  `sys_foundFile` tinytext NOT NULL,
  `sys_type` enum('AUTO','MANUAL') NOT NULL DEFAULT 'AUTO',
  `sys_exportAlways` enum('Y','N') NOT NULL DEFAULT 'N',
  `sys_tag` varchar(255) NOT NULL,
  `sys_tag_md5` varchar(50) NOT NULL,
  `sys_t_de` tinytext NOT NULL,
  `sys_t_cz` tinytext NOT NULL,
  `sys_t_hu` tinytext NOT NULL,
  `sys_t_bb` tinytext NOT NULL,
  `sys_t_xx` tinytext NOT NULL,
  `sys_t_en` tinytext NOT NULL,
  `sys_t_ru` tinytext NOT NULL,
  `sys_t_it` tinytext NOT NULL,
  `sys_t_fr` tinytext NOT NULL,
  `sys_t_ro` tinytext NOT NULL,
  PRIMARY KEY (`sys_id`),
  UNIQUE KEY `bet_tag_md5` (`sys_tag_md5`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_tags`
--

LOCK TABLES `sys_tags` WRITE;
/*!40000 ALTER TABLE `sys_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timemachine`
--

DROP TABLE IF EXISTS `timemachine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timemachine` (
  `tm_id` int(11) NOT NULL AUTO_INCREMENT,
  `tm_s_id` int(11) NOT NULL,
  `tm_name` varchar(255) NOT NULL,
  `tm_desc` varchar(255) NOT NULL,
  `tm_sort` int(11) NOT NULL,
  `tm_fid` int(11) NOT NULL,
  `tm_lastMod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tm_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tm_lastModBy` int(11) NOT NULL,
  `tm_createdBy` int(11) NOT NULL,
  `tm_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `tm_online` enum('Y','N') NOT NULL DEFAULT 'N',
  `tm_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tm_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`tm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timemachine`
--

LOCK TABLES `timemachine` WRITE;
/*!40000 ALTER TABLE `timemachine` DISABLE KEYS */;
/*!40000 ALTER TABLE `timemachine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wizard_auto_539`
--

DROP TABLE IF EXISTS `wizard_auto_539`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wizard_auto_539` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_NAME` text NOT NULL COMMENT '1829::TEXT:: ',
  PRIMARY KEY (`wz_id`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='WIZARD :: storage_images_profiles (539)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wizard_auto_539`
--

LOCK TABLES `wizard_auto_539` WRITE;
/*!40000 ALTER TABLE `wizard_auto_539` DISABLE KEYS */;
/*!40000 ALTER TABLE `wizard_auto_539` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wizard_auto_540`
--

DROP TABLE IF EXISTS `wizard_auto_540`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wizard_auto_540` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  PRIMARY KEY (`wz_id`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='COMMENT';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wizard_auto_540`
--

LOCK TABLES `wizard_auto_540` WRITE;
/*!40000 ALTER TABLE `wizard_auto_540` DISABLE KEYS */;
/*!40000 ALTER TABLE `wizard_auto_540` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wizard_auto_541`
--

DROP TABLE IF EXISTS `wizard_auto_541`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wizard_auto_541` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  PRIMARY KEY (`wz_id`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='COMMENT';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wizard_auto_541`
--

LOCK TABLES `wizard_auto_541` WRITE;
/*!40000 ALTER TABLE `wizard_auto_541` DISABLE KEYS */;
/*!40000 ALTER TABLE `wizard_auto_541` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wizard_auto_543`
--

DROP TABLE IF EXISTS `wizard_auto_543`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wizard_auto_543` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  PRIMARY KEY (`wz_id`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='COMMENT';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wizard_auto_543`
--

LOCK TABLES `wizard_auto_543` WRITE;
/*!40000 ALTER TABLE `wizard_auto_543` DISABLE KEYS */;
/*!40000 ALTER TABLE `wizard_auto_543` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wizard_auto_544`
--

DROP TABLE IF EXISTS `wizard_auto_544`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wizard_auto_544` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_SITE_ID` int(11) NOT NULL COMMENT '1842::INT:: ',
  PRIMARY KEY (`wz_id`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='WIZARD :: pager_settings (544)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wizard_auto_544`
--

LOCK TABLES `wizard_auto_544` WRITE;
/*!40000 ALTER TABLE `wizard_auto_544` DISABLE KEYS */;
/*!40000 ALTER TABLE `wizard_auto_544` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wizard_auto_545`
--

DROP TABLE IF EXISTS `wizard_auto_545`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wizard_auto_545` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_SITE_ID` int(11) NOT NULL COMMENT '1844::INT:: Site Id',
  PRIMARY KEY (`wz_id`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='WIZARD :: load_more (545)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wizard_auto_545`
--

LOCK TABLES `wizard_auto_545` WRITE;
/*!40000 ALTER TABLE `wizard_auto_545` DISABLE KEYS */;
/*!40000 ALTER TABLE `wizard_auto_545` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wizard_auto_547`
--

DROP TABLE IF EXISTS `wizard_auto_547`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wizard_auto_547` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_WZ_ATTRIBUTE` int(11) NOT NULL COMMENT '1887::WATTRIBUTE:: Attribut',
  `wz_TEXT` text NOT NULL COMMENT '1888::TEXT:: Text',
  `wz_WZ_ID` int(11) NOT NULL COMMENT '1886::WIZARD:: W-ID',
  `wz_Alternativ` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '1892::YN:: Alternativ Text',
  PRIMARY KEY (`wz_id`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='WIZARD :: wizard_vanity_url_segments (547)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wizard_auto_547`
--

LOCK TABLES `wizard_auto_547` WRITE;
/*!40000 ALTER TABLE `wizard_auto_547` DISABLE KEYS */;
/*!40000 ALTER TABLE `wizard_auto_547` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wizard_auto_554`
--

DROP TABLE IF EXISTS `wizard_auto_554`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wizard_auto_554` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_LIMIT` int(11) NOT NULL COMMENT '1880::INT:: ',
  PRIMARY KEY (`wz_id`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='WIZARD :: pager settings limits (554)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wizard_auto_554`
--

LOCK TABLES `wizard_auto_554` WRITE;
/*!40000 ALTER TABLE `wizard_auto_554` DISABLE KEYS */;
/*!40000 ALTER TABLE `wizard_auto_554` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wizard_auto_555`
--

DROP TABLE IF EXISTS `wizard_auto_555`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wizard_auto_555` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_LIMIT` int(11) NOT NULL COMMENT '1881::INT:: ',
  PRIMARY KEY (`wz_id`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='WIZARD :: load more limits (555)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wizard_auto_555`
--

LOCK TABLES `wizard_auto_555` WRITE;
/*!40000 ALTER TABLE `wizard_auto_555` DISABLE KEYS */;
/*!40000 ALTER TABLE `wizard_auto_555` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wizard_auto_612`
--

DROP TABLE IF EXISTS `wizard_auto_612`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wizard_auto_612` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_field` text NOT NULL COMMENT '1924::TEXT:: Condition - Field',
  `wz_value` text NOT NULL COMMENT '1925::TEXT:: Condition - Value',
  `wz_active` enum('NO','YES','CONDITION') NOT NULL DEFAULT 'NO' COMMENT '1923::RADIO:: Active State',
  PRIMARY KEY (`wz_id`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='WIZARD :: tabs (612)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wizard_auto_612`
--

LOCK TABLES `wizard_auto_612` WRITE;
/*!40000 ALTER TABLE `wizard_auto_612` DISABLE KEYS */;
/*!40000 ALTER TABLE `wizard_auto_612` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wizard_relations`
--

DROP TABLE IF EXISTS `wizard_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wizard_relations` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_wz_id` int(11) NOT NULL COMMENT '2011::INT:: ',
  `wz_wz_r_id` int(11) NOT NULL COMMENT '2012::INT:: ',
  `wz_wz_idx` int(11) NOT NULL COMMENT '2014::INT:: ',
  `wz_wz_r_idx` int(11) NOT NULL COMMENT '2015::INT:: ',
  `wz_type` enum('FILE','LINK','RECORD','ATOM','TM') NOT NULL DEFAULT 'FILE' COMMENT '2013::COMBO:: ',
  PRIMARY KEY (`wz_id`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='WIZARD :: wizard_relations (639)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wizard_relations`
--

LOCK TABLES `wizard_relations` WRITE;
/*!40000 ALTER TABLE `wizard_relations` DISABLE KEYS */;
/*!40000 ALTER TABLE `wizard_relations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wizards`
--

DROP TABLE IF EXISTS `wizards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wizards` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_og_mode_en` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_og_mode_de` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_seo_mode_en` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_seo_mode_de` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_useInSerach` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '1889::YN:: ',
  PRIMARY KEY (`wz_id`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='WIZARD :: wizards (557)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wizards`
--

LOCK TABLES `wizards` WRITE;
/*!40000 ALTER TABLE `wizards` DISABLE KEYS */;
INSERT INTO `wizards` VALUES (1,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-07 16:42:49','2015-03-07 16:42:49',0,0,'N');
/*!40000 ALTER TABLE `wizards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xcore_internal_reporting`
--

DROP TABLE IF EXISTS `xcore_internal_reporting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xcore_internal_reporting` (
  `xir_id` int(11) NOT NULL AUTO_INCREMENT,
  `xir_ns` varchar(255) NOT NULL,
  `xir_type` enum('ERROR','INFO','WARNING') NOT NULL,
  `xir_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xir_ip` int(11) NOT NULL,
  `xir_host` int(11) NOT NULL,
  `xir_hr` varchar(255) NOT NULL,
  `xir_no` varchar(255) NOT NULL,
  `xir_error` text NOT NULL,
  PRIMARY KEY (`xir_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xcore_internal_reporting`
--

LOCK TABLES `xcore_internal_reporting` WRITE;
/*!40000 ALTER TABLE `xcore_internal_reporting` DISABLE KEYS */;
/*!40000 ALTER TABLE `xcore_internal_reporting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xgo_version_info`
--

DROP TABLE IF EXISTS `xgo_version_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xgo_version_info` (
  `xgvi_id` int(11) NOT NULL AUTO_INCREMENT,
  `xgvi_notes` text NOT NULL,
  PRIMARY KEY (`xgvi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xgo_version_info`
--

LOCK TABLES `xgo_version_info` WRITE;
/*!40000 ALTER TABLE `xgo_version_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `xgo_version_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xm_be_logs`
--

DROP TABLE IF EXISTS `xm_be_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xm_be_logs` (
  `xmbl_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmbl_scope` varchar(256) CHARACTER SET latin1 NOT NULL,
  `xmbl_function` varchar(256) CHARACTER SET latin1 NOT NULL,
  `xmbl_ip` varchar(256) CHARACTER SET latin1 NOT NULL,
  `xmbl_host` varchar(256) CHARACTER SET latin1 NOT NULL,
  `xmbl_user_id` int(11) NOT NULL,
  `xmbl_ts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`xmbl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xm_be_logs`
--

LOCK TABLES `xm_be_logs` WRITE;
/*!40000 ALTER TABLE `xm_be_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `xm_be_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xm_cronjobs`
--

DROP TABLE IF EXISTS `xm_cronjobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xm_cronjobs` (
  `xmc_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmc_ts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmc_ip` char(15) CHARACTER SET latin1 NOT NULL,
  `xmc_bounces_cnt_connectors` int(11) NOT NULL,
  `xmc_bounces_popping_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmc_bounces_popping_duration` int(11) NOT NULL,
  PRIMARY KEY (`xmc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xm_cronjobs`
--

LOCK TABLES `xm_cronjobs` WRITE;
/*!40000 ALTER TABLE `xm_cronjobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `xm_cronjobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xm_cronjobs_logs`
--

DROP TABLE IF EXISTS `xm_cronjobs_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xm_cronjobs_logs` (
  `xmcl_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmcl_ts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmcl_e_id` int(11) NOT NULL,
  `xmcl_e_left_open` int(11) NOT NULL,
  `xmcl_CRON_SLOT_ID` int(11) NOT NULL,
  PRIMARY KEY (`xmcl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xm_cronjobs_logs`
--

LOCK TABLES `xm_cronjobs_logs` WRITE;
/*!40000 ALTER TABLE `xm_cronjobs_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `xm_cronjobs_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xm_cronjobs_slots`
--

DROP TABLE IF EXISTS `xm_cronjobs_slots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xm_cronjobs_slots` (
  `xmcs_id` int(11) NOT NULL,
  `xmcs_last_call` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`xmcs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xm_cronjobs_slots`
--

LOCK TABLES `xm_cronjobs_slots` WRITE;
/*!40000 ALTER TABLE `xm_cronjobs_slots` DISABLE KEYS */;
/*!40000 ALTER TABLE `xm_cronjobs_slots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xm_emissions`
--

DROP TABLE IF EXISTS `xm_emissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xm_emissions` (
  `xme_id` int(11) NOT NULL AUTO_INCREMENT,
  `xme_s_id` int(11) NOT NULL,
  `xme_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `xme_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `xme_sort` int(11) NOT NULL DEFAULT '99999999',
  `xme_name` varchar(255) NOT NULL,
  `xme_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xme_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xme_lastmodBy` int(11) NOT NULL,
  `xme_createdBy` int(11) NOT NULL,
  `xme_p_id` int(11) NOT NULL,
  `xme_subject` text NOT NULL,
  `xme_state` enum('CONFIG','SENDING','DONE','PAUSE','START_SENDING','READY_4_SENDING') NOT NULL DEFAULT 'CONFIG',
  `xme_tested` int(11) NOT NULL,
  `xme_q_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xme_q_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xme_q_time` int(11) NOT NULL,
  `xme_q_error` text NOT NULL,
  `xme_attach` text NOT NULL,
  PRIMARY KEY (`xme_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xm_emissions`
--

LOCK TABLES `xm_emissions` WRITE;
/*!40000 ALTER TABLE `xm_emissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `xm_emissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xm_emissions_lists`
--

DROP TABLE IF EXISTS `xm_emissions_lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xm_emissions_lists` (
  `xmel_id` int(11) NOT NULL,
  `xmel_e_id` int(11) NOT NULL,
  `xmel_l_id` int(11) NOT NULL,
  KEY `xmel_e_id` (`xmel_e_id`,`xmel_l_id`),
  KEY `xmel_e_id_2` (`xmel_e_id`),
  KEY `xmel_l_id` (`xmel_l_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xm_emissions_lists`
--

LOCK TABLES `xm_emissions_lists` WRITE;
/*!40000 ALTER TABLE `xm_emissions_lists` DISABLE KEYS */;
/*!40000 ALTER TABLE `xm_emissions_lists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xm_emissions_senders`
--

DROP TABLE IF EXISTS `xm_emissions_senders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xm_emissions_senders` (
  `xmes_id` int(11) NOT NULL,
  `xmes_e_id` int(11) NOT NULL,
  `xmes_s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xm_emissions_senders`
--

LOCK TABLES `xm_emissions_senders` WRITE;
/*!40000 ALTER TABLE `xm_emissions_senders` DISABLE KEYS */;
/*!40000 ALTER TABLE `xm_emissions_senders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xm_lists`
--

DROP TABLE IF EXISTS `xm_lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xm_lists` (
  `xml_id` int(11) NOT NULL AUTO_INCREMENT,
  `xml_s_id` int(11) NOT NULL,
  `xml_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `xml_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `xml_sort` int(11) NOT NULL DEFAULT '99999999',
  `xml_name` varchar(255) NOT NULL,
  `xml_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xml_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xml_lastmodBy` int(11) NOT NULL,
  `xml_createdBy` int(11) NOT NULL,
  `xml_type` enum('LOCAL','REMOTE','TEST') NOT NULL DEFAULT 'LOCAL',
  `xml_remote_endpoint_sync` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'INACTIVE',
  `xml_remote_endpoint_sync_min` int(11) NOT NULL,
  `xml_remote_endpoint_url` text NOT NULL,
  `xml_remote_endpoint_security` text NOT NULL,
  `xml_remote_latest_sync` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`xml_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xm_lists`
--

LOCK TABLES `xm_lists` WRITE;
/*!40000 ALTER TABLE `xm_lists` DISABLE KEYS */;
/*!40000 ALTER TABLE `xm_lists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xm_lists_import`
--

DROP TABLE IF EXISTS `xm_lists_import`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xm_lists_import` (
  `xmli_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmli_s_id` int(11) NOT NULL,
  `xmli_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `xmli_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `xmli_sort` int(11) NOT NULL DEFAULT '99999999',
  `xmli_file_name` text NOT NULL,
  `xmli_file_size` int(11) NOT NULL,
  `xmli_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xmli_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmli_lastmodBy` int(11) NOT NULL,
  `xmli_createdBy` int(11) NOT NULL,
  `xmli_state` enum('OK','ERROR','PROCESSING','NOTSET','CANCELED','UPLOADED') NOT NULL DEFAULT 'NOTSET',
  `xmli_state_detail` text NOT NULL,
  `xmli_state_new` int(11) NOT NULL,
  `xmli_state_updated` int(11) NOT NULL,
  `xmli_state_failures` int(11) NOT NULL,
  `xmli_state_nochanges` int(11) NOT NULL,
  `xmli_state_duplicates` int(11) NOT NULL,
  `xmli_state_duplicates_mails` text NOT NULL,
  `xmli_ip` varchar(25) NOT NULL,
  `xmli_host` text NOT NULL,
  `xmli_l_id` int(11) NOT NULL,
  `xmli_feedbackImporter` text NOT NULL,
  `xmli_processed_line` int(11) NOT NULL,
  `xmli_errors` longtext NOT NULL,
  `xmli_type` enum('LOCAL','REMOTE') NOT NULL DEFAULT 'LOCAL',
  PRIMARY KEY (`xmli_id`),
  KEY `xmli_s_id` (`xmli_s_id`,`xmli_del`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xm_lists_import`
--

LOCK TABLES `xm_lists_import` WRITE;
/*!40000 ALTER TABLE `xm_lists_import` DISABLE KEYS */;
/*!40000 ALTER TABLE `xm_lists_import` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xm_lists_remote`
--

DROP TABLE IF EXISTS `xm_lists_remote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xm_lists_remote` (
  `xmlr_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmlr_s_id` int(11) NOT NULL,
  `xmlr_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `xmlr_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `xmlr_sort` int(11) NOT NULL DEFAULT '99999999',
  `xmlr_name` varchar(255) NOT NULL,
  `xmlr_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xmlr_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmlr_lastmodBy` int(11) NOT NULL,
  `xmlr_createdBy` int(11) NOT NULL,
  `xmlr_ts_fetch` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmlr_ts_download_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmlr_ts_download_time` int(11) NOT NULL,
  `xmlr_pre_check` enum('OK','NOK','DOWNLOADING','ERROR_STORING_DOWNLOAD','EMPTY_URL','UPLOAD_HANDLER_ERROR','NOT_ACTIVE','INVALID_URL') NOT NULL,
  `xmlr_error` text NOT NULL,
  `xmlr_cfg_url` text NOT NULL,
  `xmlr_cfg_secret` text NOT NULL,
  `xmlr_cfg_xml_id` int(11) NOT NULL,
  `xmlr_xmli_id` int(11) NOT NULL,
  `xmlr_caller` enum('AUTO','MANUAL') NOT NULL DEFAULT 'AUTO',
  PRIMARY KEY (`xmlr_id`),
  KEY `xmlr_s_id` (`xmlr_s_id`,`xmlr_del`),
  KEY `xmlr_s_id_2` (`xmlr_s_id`,`xmlr_del`,`xmlr_cfg_xml_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xm_lists_remote`
--

LOCK TABLES `xm_lists_remote` WRITE;
/*!40000 ALTER TABLE `xm_lists_remote` DISABLE KEYS */;
/*!40000 ALTER TABLE `xm_lists_remote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xm_recipients`
--

DROP TABLE IF EXISTS `xm_recipients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xm_recipients` (
  `xmr_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmr_s_id` int(11) NOT NULL,
  `xmr_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `xmr_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `xmr_sort` int(11) NOT NULL DEFAULT '99999999',
  `xmr_name` varchar(255) NOT NULL,
  `xmr_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xmr_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmr_lastmodBy` int(11) NOT NULL,
  `xmr_createdBy` int(11) NOT NULL,
  `wz_id` int(11) NOT NULL,
  `xmr_name_first` varchar(256) NOT NULL,
  `xmr_name_last` varchar(256) NOT NULL,
  `xmr_email` varchar(256) NOT NULL,
  `xmr_type` enum('W','M','F','C','X') NOT NULL DEFAULT 'X',
  `xmr_title_pre` varchar(256) NOT NULL,
  `xmr_title_post` varchar(256) NOT NULL,
  `xmr_full_salutation` varchar(256) NOT NULL,
  `xmr_canceled` enum('N','Y') NOT NULL DEFAULT 'N',
  `xmr_canceled_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmr_lang` int(11) NOT NULL,
  `xmr_origin` enum('I','M','U') NOT NULL DEFAULT 'U',
  `xmr_origin_id` int(11) NOT NULL,
  PRIMARY KEY (`xmr_id`),
  KEY `userExistsByEMail` (`xmr_s_id`,`xmr_del`,`xmr_email`(200)),
  KEY `xmr_id` (`xmr_id`,`xmr_del`,`xmr_canceled`),
  KEY `xmr_s_id` (`xmr_s_id`),
  KEY `xmr_s_id_2` (`xmr_s_id`,`xmr_del`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xm_recipients`
--

LOCK TABLES `xm_recipients` WRITE;
/*!40000 ALTER TABLE `xm_recipients` DISABLE KEYS */;
/*!40000 ALTER TABLE `xm_recipients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xm_recipients2lists`
--

DROP TABLE IF EXISTS `xm_recipients2lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xm_recipients2lists` (
  `xmr2l_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmr2l_s_id` int(11) NOT NULL,
  `xmr2l_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `xmr2l_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `xmr2l_sort` int(11) NOT NULL DEFAULT '99999999',
  `xmr2l_name` varchar(255) NOT NULL,
  `xmr2l_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xmr2l_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmr2l_lastmodBy` int(11) NOT NULL,
  `xmr2l_createdBy` int(11) NOT NULL,
  `xmr2l_l_id` int(11) NOT NULL,
  `xmr2l_r_id` int(11) NOT NULL,
  PRIMARY KEY (`xmr2l_id`),
  KEY `xmr2l_s_id` (`xmr2l_s_id`,`xmr2l_del`,`xmr2l_l_id`,`xmr2l_r_id`),
  KEY `xmr2l_s_id_2` (`xmr2l_s_id`),
  KEY `xmr2l_del` (`xmr2l_del`,`xmr2l_l_id`,`xmr2l_r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xm_recipients2lists`
--

LOCK TABLES `xm_recipients2lists` WRITE;
/*!40000 ALTER TABLE `xm_recipients2lists` DISABLE KEYS */;
/*!40000 ALTER TABLE `xm_recipients2lists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xm_recipients_history`
--

DROP TABLE IF EXISTS `xm_recipients_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xm_recipients_history` (
  `xmrh_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmrh_s_id` int(11) NOT NULL,
  `xmrh_xmr_id` int(11) NOT NULL,
  `xmrh_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `xmrh_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `xmrh_sort` int(11) NOT NULL DEFAULT '99999999',
  `xmrh_name` varchar(255) NOT NULL,
  `xmrh_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xmrh_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmrh_lastmodBy` int(11) NOT NULL,
  `xmrh_createdBy` int(11) NOT NULL,
  `wz_id` int(11) NOT NULL,
  `xmrh_r_id` int(11) NOT NULL,
  `xmrh_ts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmrh_beu_id` int(11) NOT NULL,
  `xmrh_beu_name` tinytext NOT NULL,
  `xmrh_action` longtext NOT NULL,
  `xmrh_details` longtext NOT NULL,
  `xmrh_import_id` int(11) NOT NULL,
  PRIMARY KEY (`xmrh_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xm_recipients_history`
--

LOCK TABLES `xm_recipients_history` WRITE;
/*!40000 ALTER TABLE `xm_recipients_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `xm_recipients_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xm_send_connectors`
--

DROP TABLE IF EXISTS `xm_send_connectors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xm_send_connectors` (
  `xmsc_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmsc_s_id` int(11) NOT NULL,
  `xmsc_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `xmsc_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `xmsc_sort` int(11) NOT NULL DEFAULT '99999999',
  `xmsc_name` varchar(255) NOT NULL,
  `xmsc_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xmsc_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmsc_lastmodBy` int(11) NOT NULL,
  `xmsc_createdBy` int(11) NOT NULL,
  `xmsc_smtp_host` tinytext NOT NULL,
  `xmsc_smtp_user` tinytext NOT NULL,
  `xmsc_smtp_pwd` tinytext NOT NULL,
  `xmsc_smtp_limit_time` int(11) NOT NULL,
  `xmsc_smtp_limit_cnt` int(11) NOT NULL,
  `xmsc_from_mail` tinytext NOT NULL,
  `xmsc_from_name` tinytext NOT NULL,
  `xmsc_reply_mail` tinytext NOT NULL,
  `xmsc_reply_name` tinytext NOT NULL,
  `xmsc_pop_host` tinytext NOT NULL,
  `xmsc_pop_user` tinytext NOT NULL,
  `xmsc_pop_password` tinytext NOT NULL,
  `xmsc_pop_active` enum('Y','N') NOT NULL DEFAULT 'N',
  `xmsc_last_popped` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`xmsc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xm_send_connectors`
--

LOCK TABLES `xm_send_connectors` WRITE;
/*!40000 ALTER TABLE `xm_send_connectors` DISABLE KEYS */;
/*!40000 ALTER TABLE `xm_send_connectors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xm_send_connectors_bounces`
--

DROP TABLE IF EXISTS `xm_send_connectors_bounces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xm_send_connectors_bounces` (
  `xmscb_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmscb_s_id` int(11) NOT NULL,
  `xmscb_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `xmscb_fid` int(11) NOT NULL DEFAULT '-1' COMMENT 'father',
  `xmscb_sort` int(11) NOT NULL DEFAULT '99999999',
  `xmscb_name` varchar(255) NOT NULL,
  `xmscb_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xmscb_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmscb_lastmodBy` int(11) NOT NULL,
  `xmscb_createdBy` int(11) NOT NULL,
  `xmscb_r_id` int(11) NOT NULL,
  `xmscb_r_email` text NOT NULL,
  `xmscb_e_id` int(11) NOT NULL,
  `xmscb_q_id` int(11) NOT NULL,
  `xmscb_html` longtext NOT NULL,
  `xmscb_ts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmscb_json_full` longtext NOT NULL,
  `xmscb_message_id` text NOT NULL,
  `xmscb_valid` enum('N','Y') NOT NULL DEFAULT 'N',
  `xmscb_xmsc_id` int(11) NOT NULL,
  `xmscb_subject` text NOT NULL,
  PRIMARY KEY (`xmscb_id`),
  KEY `xmscb_r_id` (`xmscb_r_id`,`xmscb_e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xm_send_connectors_bounces`
--

LOCK TABLES `xm_send_connectors_bounces` WRITE;
/*!40000 ALTER TABLE `xm_send_connectors_bounces` DISABLE KEYS */;
/*!40000 ALTER TABLE `xm_send_connectors_bounces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xm_send_connectors_popping`
--

DROP TABLE IF EXISTS `xm_send_connectors_popping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xm_send_connectors_popping` (
  `xmscp_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmscp_xmsc_id` int(11) NOT NULL,
  `xmscp_xmsc_ts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmscp_xmsc_duration` int(11) NOT NULL,
  `xmscp_xmsc_mails_ok` int(11) NOT NULL,
  `xmscp_xmsc_mails_nok` int(11) NOT NULL,
  `xmscp_initiator` enum('MANUAL','CRON','UNSET') CHARACTER SET latin1 NOT NULL DEFAULT 'UNSET',
  PRIMARY KEY (`xmscp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xm_send_connectors_popping`
--

LOCK TABLES `xm_send_connectors_popping` WRITE;
/*!40000 ALTER TABLE `xm_send_connectors_popping` DISABLE KEYS */;
/*!40000 ALTER TABLE `xm_send_connectors_popping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xm_send_queue`
--

DROP TABLE IF EXISTS `xm_send_queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xm_send_queue` (
  `xmsq_id` int(11) NOT NULL AUTO_INCREMENT,
  `xmsq_s_id` int(11) NOT NULL,
  `xmsq_e_id` int(11) NOT NULL,
  `xmsq_r_id` int(11) NOT NULL,
  `xmsq_del` enum('Y','N') NOT NULL DEFAULT 'N',
  `xmsq_lastmod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xmsq_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmsq_subject` mediumtext NOT NULL,
  `xmsq_html` blob NOT NULL,
  `xmsq_state` enum('Q','S','E1','E2','E3','EE','E_SMTP_CONFIG','E_IMAGE_NOT_FOUND','WAIT_4_Q','SALUTATION_EMPTY','EMAIL_ERROR') NOT NULL DEFAULT 'WAIT_4_Q',
  `xmsq_smtp_last_contact` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmsq_ts_Q` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmsq_ts_S` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmsq_ts_E1` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmsq_ts_E2` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmsq_ts_E3` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmsq_ts_EE` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `xmsq_error_h` text NOT NULL,
  `xmsq_mine` varchar(256) NOT NULL,
  PRIMARY KEY (`xmsq_id`),
  KEY `xmsq_s_id` (`xmsq_s_id`,`xmsq_e_id`,`xmsq_r_id`),
  KEY `xmsq_e_id` (`xmsq_e_id`),
  KEY `xmsq_e_id_2` (`xmsq_e_id`,`xmsq_state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xm_send_queue`
--

LOCK TABLES `xm_send_queue` WRITE;
/*!40000 ALTER TABLE `xm_send_queue` DISABLE KEYS */;
/*!40000 ALTER TABLE `xm_send_queue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xm_tracking_clicks`
--

DROP TABLE IF EXISTS `xm_tracking_clicks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xm_tracking_clicks` (
  `xmtc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `xmtc_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `xmtc_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `xmtc_HTTP_USER_AGENT` tinytext NOT NULL COMMENT '938::TEXT:: HTTP_USER_AGENT',
  `xmtc_sq_id` int(11) NOT NULL COMMENT 'send que',
  `xmtc_e_id` int(11) NOT NULL,
  `xmtc_r_id` int(11) NOT NULL,
  `xmtc_link_id` int(11) NOT NULL COMMENT '940::WIZARD:: link_id',
  `xmtc_ip` tinytext NOT NULL COMMENT '941::TEXT:: ip',
  `xmtc_host` tinytext NOT NULL COMMENT '942::TEXT:: host',
  `xmtc_ref` tinytext NOT NULL COMMENT '945::TEXT:: ref',
  PRIMARY KEY (`xmtc_id`),
  KEY `xmtc_e_id` (`xmtc_e_id`),
  KEY `xmtc_e_id_2` (`xmtc_e_id`,`xmtc_r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='COMMENT';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xm_tracking_clicks`
--

LOCK TABLES `xm_tracking_clicks` WRITE;
/*!40000 ALTER TABLE `xm_tracking_clicks` DISABLE KEYS */;
/*!40000 ALTER TABLE `xm_tracking_clicks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xm_tracking_links`
--

DROP TABLE IF EXISTS `xm_tracking_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xm_tracking_links` (
  `xmtl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `xmtl_s_id` int(11) NOT NULL,
  `xmtl_e_id` int(11) NOT NULL,
  `xmtl_sort` int(11) NOT NULL COMMENT 'SORT',
  `xmtl_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `xmtl_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `xmtl_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `xmtl_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `xmtl_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `xmtl_tl_title` tinytext NOT NULL COMMENT '839::TEXT:: Title - KEY',
  `xmtl_tl_url` tinytext NOT NULL COMMENT '747::TEXT:: Transport URL',
  `xmtl_tl_target` tinytext NOT NULL COMMENT '843::TEXT:: Transport Target',
  `xmtl_tl_urlOrig` tinytext NOT NULL COMMENT '937::TEXT:: Original URL',
  PRIMARY KEY (`xmtl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='COMMENT';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xm_tracking_links`
--

LOCK TABLES `xm_tracking_links` WRITE;
/*!40000 ALTER TABLE `xm_tracking_links` DISABLE KEYS */;
/*!40000 ALTER TABLE `xm_tracking_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xm_tracking_opening_rates`
--

DROP TABLE IF EXISTS `xm_tracking_opening_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xm_tracking_opening_rates` (
  `xmor_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `xmor_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `xmor_sort` int(11) NOT NULL COMMENT 'SORT',
  `xmor_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `xmor_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `xmor_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `xmor_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `xmor_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `xmor_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `xmor_online_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE START',
  `xmor_online_stop` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE END',
  `xmor_HTTP_USER_AGENT` longtext NOT NULL COMMENT '913::TEXTAREA:: HTTP_USER_AGENT',
  `xmor_sq_id` int(11) NOT NULL COMMENT 'send que',
  `xmor_e_id` int(11) NOT NULL COMMENT 'emission id',
  `xmor_r_id` int(11) NOT NULL COMMENT 'reciepient',
  `xmor_ip` tinytext NOT NULL COMMENT '943::TEXT:: ip',
  `xmor_host` tinytext NOT NULL COMMENT '944::TEXT:: host',
  `xmor_ref` tinytext NOT NULL COMMENT '946::TEXT:: ref',
  PRIMARY KEY (`xmor_id`),
  KEY `xmor_e_id` (`xmor_e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='COMMENT';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xm_tracking_opening_rates`
--

LOCK TABLES `xm_tracking_opening_rates` WRITE;
/*!40000 ALTER TABLE `xm_tracking_opening_rates` DISABLE KEYS */;
/*!40000 ALTER TABLE `xm_tracking_opening_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xm_tracking_unsubscription`
--

DROP TABLE IF EXISTS `xm_tracking_unsubscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xm_tracking_unsubscription` (
  `xmtu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `xmtu_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `xmtu_sort` int(11) NOT NULL COMMENT 'SORT',
  `xmtu_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `xmtu_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `xmtu_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `xmtu_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `xmtu_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `xmtu_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `xmtu_online_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE START',
  `xmtu_online_stop` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD ONLINE END',
  `xmtu_ts_unsub` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'unsub',
  `xmtu_e_id` int(11) NOT NULL COMMENT 'emission id',
  `xmtu_r_id` int(11) NOT NULL COMMENT 'recepit',
  PRIMARY KEY (`xmtu_id`),
  KEY `xmtu_e_id` (`xmtu_e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='COMMENT';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xm_tracking_unsubscription`
--

LOCK TABLES `xm_tracking_unsubscription` WRITE;
/*!40000 ALTER TABLE `xm_tracking_unsubscription` DISABLE KEYS */;
/*!40000 ALTER TABLE `xm_tracking_unsubscription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xr_state_provider`
--

DROP TABLE IF EXISTS `xr_state_provider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xr_state_provider` (
  `xrsp_id` int(11) NOT NULL AUTO_INCREMENT,
  `xrsp_u_id` int(11) NOT NULL,
  `xrsp_name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `xrsp_value` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`xrsp_id`),
  KEY `xrsp_u_id` (`xrsp_u_id`,`xrsp_name`),
  KEY `xrsp_u_id_2` (`xrsp_u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xr_state_provider`
--

LOCK TABLES `xr_state_provider` WRITE;
/*!40000 ALTER TABLE `xr_state_provider` DISABLE KEYS */;
INSERT INTO `xr_state_provider` VALUES (48,1,'xr_css_less_mpanel_tree','{\"columns\":[{\"id\":\"header-2104\"},{\"id\":\"header-2061\"},{\"id\":\"header-2062\"},{\"id\":\"header-2063\",\"hidden\":true},{\"id\":\"header-2064\",\"hidden\":true}]}'),(55,1,'xr_atom_mpanel_tree','{\"columns\":[{\"id\":\"header-1562\"},{\"id\":\"header-1517\"},{\"id\":\"header-1518\"},{\"id\":\"header-1519\",\"hidden\":true},{\"id\":\"header-1520\",\"hidden\":true},{\"id\":\"header-1521\",\"hidden\":true}]}'),(56,1,'xr_infopool_wizard_main_panel','{}');
/*!40000 ALTER TABLE `xr_state_provider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xtypes_defaults`
--

DROP TABLE IF EXISTS `xtypes_defaults`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xtypes_defaults` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_og_mode_en` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_og_mode_de` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_seo_mode_en` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_seo_mode_de` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_FAS_ID` int(11) NOT NULL COMMENT '1919::INT:: FAS-ID',
  `wz_placeholder` text NOT NULL COMMENT '1913::TEXT:: Placeholder',
  `_DE_wz_placeholder` text NOT NULL COMMENT '1913::TEXT:: Placeholder',
  `_EN_wz_placeholder` text NOT NULL COMMENT '1913::TEXT:: Placeholder',
  `wz_required` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '1914::YN:: Required',
  `wz_validator` enum('N','EMAIL','NOTEMPTY','NUMERIC') NOT NULL DEFAULT 'N' COMMENT '1915::COMBO:: Valitation',
  `wz_value` text NOT NULL COMMENT '1916::TEXT:: Default Value',
  `wz_readonly` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '1917::YN:: Readonly',
  `wz_hidden` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '1918::YN:: Hidden',
  `_RU_wz_placeholder` text NOT NULL COMMENT '1913::TEXT:: Placeholder',
  `_FR_wz_placeholder` text NOT NULL COMMENT '1913::TEXT:: Placeholder',
  `_IT_wz_placeholder` text NOT NULL COMMENT '1913::TEXT:: Placeholder',
  `_RO_wz_placeholder` text NOT NULL COMMENT '1913::TEXT:: Placeholder',
  `_HU_wz_placeholder` text NOT NULL COMMENT '1913::TEXT:: Placeholder',
  `_CZ_wz_placeholder` text NOT NULL COMMENT '1913::TEXT:: Placeholder',
  PRIMARY KEY (`wz_id`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM AUTO_INCREMENT=143 DEFAULT CHARSET=utf8 COMMENT='WIZARD :: defaults (605)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xtypes_defaults`
--

LOCK TABLES `xtypes_defaults` WRITE;
/*!40000 ALTER TABLE `xtypes_defaults` DISABLE KEYS */;
INSERT INTO `xtypes_defaults` VALUES (1,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-09 12:54:04','2015-03-09 12:54:04',0,0,125,'','','','N','N','','N','N','','','','','',''),(2,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-09 12:54:10','2015-03-09 12:54:10',0,0,101,'','','','N','N','','N','N','','','','','',''),(3,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-09 14:08:31','2015-03-09 14:08:31',0,0,96,'','','','N','N','','N','N','','','','','',''),(4,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-09 14:18:26','2015-03-09 14:18:26',0,0,89,'','','','N','N','','N','N','','','','','',''),(5,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-09 15:00:09','2015-03-09 15:00:09',0,0,41,'','','','N','N','','N','N','','','','','',''),(92,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-09 22:12:52','2015-03-09 22:12:52',0,0,0,'','','','N','N','','N','N','','','','','',''),(93,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-10 10:28:46','2015-03-09 22:13:28',0,0,0,'','','','Y','N','','N','N','','','','','',''),(94,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-10 10:29:02','2015-03-09 22:16:05',0,0,0,'','','','Y','N','','N','N','','','','','',''),(95,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-10 10:28:56','2015-03-10 10:25:11',0,0,0,'','','','Y','N','','N','N','','','','','',''),(96,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-10 10:29:09','2015-03-10 10:27:35',0,0,0,'','','','Y','N','','N','N','','','','','',''),(97,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-10 10:27:33','2015-03-10 10:27:33',0,0,0,'','','','N','N','','N','N','','','','','',''),(98,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-10 10:27:43','2015-03-10 10:27:43',0,0,0,'','','','N','N','','N','N','','','','','',''),(99,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-10 10:32:42','2015-03-10 10:27:48',0,0,0,'','','','Y','N','','N','N','','','','','',''),(101,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-09 22:29:29','2015-03-09 22:01:33',0,0,0,'','','','N','N','CUSTOMER','N','Y','','','','','',''),(102,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-10 10:27:51','2015-03-10 10:27:51',0,0,0,'','','','N','N','','N','N','','','','','',''),(103,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-10 10:27:53','2015-03-10 10:27:53',0,0,0,'','','','N','N','','N','N','','','','','',''),(125,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-09 22:29:39','2015-03-09 22:28:51',0,0,0,'','','','N','N','COMPANY','N','Y','','','','','',''),(128,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-10 10:27:56','2015-03-10 10:27:56',0,0,0,'','','','N','N','','N','N','','','','','',''),(129,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-10 10:27:58','2015-03-10 10:27:58',0,0,0,'','','','N','N','','N','N','','','','','',''),(133,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-10 10:24:37','2015-03-10 10:24:37',0,0,0,'','','','N','N','','N','N','','','','','',''),(134,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-10 10:28:51','2015-03-10 10:25:07',0,0,0,'','','','Y','N','','N','N','','','','','',''),(135,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-10 10:25:26','2015-03-10 10:25:26',0,0,0,'','','','N','N','','N','N','','','','','',''),(136,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-10 10:29:14','2015-03-10 10:27:38',0,0,0,'','','','Y','N','','N','N','','','','','',''),(137,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-10 10:32:49','2015-03-10 10:28:03',0,0,0,'','','','Y','N','','N','N','','','','','',''),(138,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-10 10:32:54','2015-03-10 10:28:08',0,0,0,'','','','Y','N','','N','N','','','','','',''),(139,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-10 10:32:58','2015-03-10 10:28:10',0,0,0,'','','','Y','N','','N','N','','','','','',''),(140,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-10 10:28:15','2015-03-10 10:28:15',0,0,0,'','','','N','N','','N','N','','','','','',''),(141,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-10 11:16:49','2015-03-10 11:16:49',0,0,0,'','','','N','N','','N','N','','','','','',''),(142,'AUTO','AUTO','AUTO','AUTO',0,0,'','',0,'N','N','2015-03-10 11:17:23','2015-03-10 11:17:23',0,0,0,'','','','N','N','','N','N','','','','','','');
/*!40000 ALTER TABLE `xtypes_defaults` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xtypes_wizard_1_n`
--

DROP TABLE IF EXISTS `xtypes_wizard_1_n`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xtypes_wizard_1_n` (
  `wz_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY ID',
  `wz_og_mode_en` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_og_mode_de` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_seo_mode_en` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_seo_mode_de` enum('MANUAL','AUTO') NOT NULL DEFAULT 'AUTO',
  `wz_fid` int(11) NOT NULL COMMENT 'FATHER ID',
  `wz_sort` int(11) NOT NULL COMMENT 'SORT',
  `wz_static` mediumtext NOT NULL COMMENT 'STATIC JSON',
  `wz_sseo` mediumtext NOT NULL COMMENT 'SSEO JSON',
  `wz_sort_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'SORT TREE',
  `wz_del` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS SOFT DELTED',
  `wz_online` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'IS ONLINE',
  `wz_lastChanged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'RECORD LAST CHANGE',
  `wz_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'RECORD WAS CREATED',
  `wz_lastChangedBy` int(11) NOT NULL COMMENT 'WAS CHANGED BY BE_USER',
  `wz_createdBy` int(11) NOT NULL COMMENT 'WAS CREATED BY BE_USER',
  `wz_FAS_ID` int(11) NOT NULL COMMENT '1869::INT:: FAS-ID',
  `wz_VIEW_MODE` enum('PAGER','LOADMORE') NOT NULL DEFAULT 'PAGER' COMMENT '1870::RADIO:: View Mode',
  `wz_PAGER_PROFILE_ID` int(11) NOT NULL COMMENT '1871::INT:: Pager Profile ID',
  `wz_LOADMORE_PROFILE_ID` int(11) NOT NULL COMMENT '1872::INT:: LoadMore Profile ID',
  `wz_RECORD_DEL_NOTIFY` text NOT NULL COMMENT '1878::TEXT:: Record Delete Message',
  `_DE_wz_RECORD_DEL_NOTIFY` text NOT NULL COMMENT '1878::TEXT:: Record Delete Message',
  `_EN_wz_RECORD_DEL_NOTIFY` text NOT NULL COMMENT '1878::TEXT:: Record Delete Message',
  `_RU_wz_RECORD_DEL_NOTIFY` text NOT NULL COMMENT '1878::TEXT:: Record Delete Message',
  `_FR_wz_RECORD_DEL_NOTIFY` text NOT NULL COMMENT '1878::TEXT:: Record Delete Message',
  `_IT_wz_RECORD_DEL_NOTIFY` text NOT NULL COMMENT '1878::TEXT:: Record Delete Message',
  `_RO_wz_RECORD_DEL_NOTIFY` text NOT NULL COMMENT '1878::TEXT:: Record Delete Message',
  `_HU_wz_RECORD_DEL_NOTIFY` text NOT NULL COMMENT '1878::TEXT:: Record Delete Message',
  `_CZ_wz_RECORD_DEL_NOTIFY` text NOT NULL COMMENT '1878::TEXT:: Record Delete Message',
  `wz_RECORD_EDIT_A_ID` int(11) NOT NULL COMMENT '1877::ATOM:: Record Edit Atom-ID',
  `wz_RECORD_VIEW_A_ID` int(11) NOT NULL COMMENT '1876::ATOM:: Record View Atom-ID',
  `wz_RECORD_MOD` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '1875::YN:: Edit Record',
  `wz_RECORD_DEL` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '1874::YN:: Delete Record',
  `wz_RECORD_ADD` enum('N','Y') NOT NULL DEFAULT 'N' COMMENT '1873::YN:: Add Record',
  `wz_RECORD_EDIT_F_ID` int(11) NOT NULL COMMENT '1920::INT:: Record Edit Form ID',
  PRIMARY KEY (`wz_id`),
  KEY `wz_FAS_ID` (`wz_FAS_ID`),
  KEY `xr_auto_index__0afc9207de65cc3729d444e941b0bb9e` (`wz_fid`,`wz_del`),
  KEY `xr_auto_index__df7ba881bead1ae93c343a28b18b43f6` (`wz_fid`,`wz_del`,`wz_online`),
  KEY `xr_auto_index__17c358f5ce7647aa749a3b6ed13ac681` (`wz_del`),
  KEY `xr_auto_index__9fd7447904e23fca4228ccafc9c96733` (`wz_del`,`wz_online`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='WIZARD :: wizard_1_n (551)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xtypes_wizard_1_n`
--

LOCK TABLES `xtypes_wizard_1_n` WRITE;
/*!40000 ALTER TABLE `xtypes_wizard_1_n` DISABLE KEYS */;
/*!40000 ALTER TABLE `xtypes_wizard_1_n` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-06 20:05:25
