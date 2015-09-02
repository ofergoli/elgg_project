-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: localhost    Database: 3bfef2f28965c791ee5b6158a8eea7b6
-- ------------------------------------------------------
-- Server version	5.6.24

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
-- Table structure for table `elgg_access_collection_membership`
--

DROP TABLE IF EXISTS `elgg_access_collection_membership`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_access_collection_membership` (
  `user_guid` int(11) NOT NULL,
  `access_collection_id` int(11) NOT NULL,
  PRIMARY KEY (`user_guid`,`access_collection_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_access_collection_membership`
--

LOCK TABLES `elgg_access_collection_membership` WRITE;
/*!40000 ALTER TABLE `elgg_access_collection_membership` DISABLE KEYS */;
/*!40000 ALTER TABLE `elgg_access_collection_membership` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_access_collections`
--

DROP TABLE IF EXISTS `elgg_access_collections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_access_collections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `owner_guid` bigint(20) unsigned NOT NULL,
  `site_guid` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `owner_guid` (`owner_guid`),
  KEY `site_guid` (`site_guid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_access_collections`
--

LOCK TABLES `elgg_access_collections` WRITE;
/*!40000 ALTER TABLE `elgg_access_collections` DISABLE KEYS */;
/*!40000 ALTER TABLE `elgg_access_collections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_annotations`
--

DROP TABLE IF EXISTS `elgg_annotations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_annotations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_guid` bigint(20) unsigned NOT NULL,
  `name_id` int(11) NOT NULL,
  `value_id` int(11) NOT NULL,
  `value_type` enum('integer','text') NOT NULL,
  `owner_guid` bigint(20) unsigned NOT NULL,
  `access_id` int(11) NOT NULL,
  `time_created` int(11) NOT NULL,
  `enabled` enum('yes','no') NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  KEY `entity_guid` (`entity_guid`),
  KEY `name_id` (`name_id`),
  KEY `value_id` (`value_id`),
  KEY `owner_guid` (`owner_guid`),
  KEY `access_id` (`access_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_annotations`
--

LOCK TABLES `elgg_annotations` WRITE;
/*!40000 ALTER TABLE `elgg_annotations` DISABLE KEYS */;
/*!40000 ALTER TABLE `elgg_annotations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_api_users`
--

DROP TABLE IF EXISTS `elgg_api_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_api_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_guid` bigint(20) unsigned DEFAULT NULL,
  `api_key` varchar(40) DEFAULT NULL,
  `secret` varchar(40) NOT NULL,
  `active` int(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `api_key` (`api_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_api_users`
--

LOCK TABLES `elgg_api_users` WRITE;
/*!40000 ALTER TABLE `elgg_api_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `elgg_api_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_config`
--

DROP TABLE IF EXISTS `elgg_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_config` (
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `site_guid` int(11) NOT NULL,
  PRIMARY KEY (`name`,`site_guid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_config`
--

LOCK TABLES `elgg_config` WRITE;
/*!40000 ALTER TABLE `elgg_config` DISABLE KEYS */;
INSERT INTO `elgg_config` VALUES ('view','\"\"\"\"\"\"\"s:7:\"\"\"\"\"\"\"\"default\"\"\"\"\"\"\"\";\"\"\"\"\"\"\"',1),('language','\"\"\"\"\"\"\"s:2:\"\"\"\"\"\"\"\"en\"\"\"\"\"\"\"\";\"\"\"\"\"\"\"',1),('default_access','\"\"\"\"\"\"\"s:7:\"\"\"\"\"\"\"\"Private\"\"\"\"\"\"\"\";\"\"\"\"\"\"\"',1),('allow_registration','b:1;',1),('walled_garden','b:0;',1),('allow_user_default_access','\"\"\"\"\"\"\"s:0:\"\"\"\"\"\"\"\"\"\"\"\"\"\"\"\";\"\"\"\"\"\"\"',1);
/*!40000 ALTER TABLE `elgg_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_datalists`
--

DROP TABLE IF EXISTS `elgg_datalists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_datalists` (
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_datalists`
--

LOCK TABLES `elgg_datalists` WRITE;
/*!40000 ALTER TABLE `elgg_datalists` DISABLE KEYS */;
INSERT INTO `elgg_datalists` VALUES ('installed','1436340464\n'),('path','C:/xampp/htdocs/elgg_project/social_networks/3bfef2f28965c791ee5b6158a8eea7b6/elgg-1.9.5/\n'),('dataroot','C:/xampp/htdocs/elgg_project/social_networks/3bfef2f28965c791ee5b6158a8eea7b6/elgg-1.9.5/\n'),('default_site','1\n'),('version','2014050600\n'),('simplecache_enabled','1\n'),('system_cache_enabled','1\n'),('simplecache_lastupdate','1436340464\n'),('processed_upgrades','\"a:58:{i:0;s:14:\"\"2008100701.php\"\";i:1;s:14:\"\"2008101303.php\"\";i:2;s:14:\"\"2009022701.php\"\";i:3;s:14:\"\"2009041701.php\"\";i:4;s:14:\"\"2009070101.php\"\";i:5;s:14:\"\"2009102801.php\"\";i:6;s:14:\"\"2010010501.php\"\";i:7;s:14:\"\"2010033101.php\"\";i:8;s:14:\"\"2010040201.php\"\";i:9;s:14:\"\"2010052601.php\"\";i:10;s:14:\"\"2010060101.php\"\";i:11;s:14:\"\"2010060401.php\"\";i:12;s:14:\"\"2010061501.php\"\";i:13;s:14:\"\"2010062301.php\"\";i:14;s:14:\"\"2010062302.php\"\";i:15;s:14:\"\"2010070301.php\"\";i:16;s:14:\"\"2010071001.php\"\";i:17;s:14:\"\"2010071002.php\"\";i:18;s:14:\"\"2010111501.php\"\";i:19;s:14:\"\"2010121601.php\"\";i:20;s:14:\"\"2010121602.php\"\";i:21;s:14:\"\"2010121701.php\"\";i:22;s:14:\"\"2010123101.php\"\";i:23;s:14:\"\"2011010101.php\"\";i:24;s:61:\"\"2011021800-1.8_svn-goodbye_walled_garden-083121a656d06894.php\"\";i:25;s:61:\"\"2011022000-1.8_svn-custom_profile_fields-390ac967b0bb5665.php\"\";i:26;s:60:\"\"2011030700-1.8_svn-blog_status_metadata-4645225d7b440876.php\"\";i:27;s:51:\"\"2011031300-1.8_svn-twitter_api-12b832a5a7a3e1bd.php\"\";i:28;s:57:\"\"2011031600-1.8_svn-datalist_grows_up-0b8aec5a55cc1e1c.php\"\";i:29;s:61:\"\"2011032000-1.8_svn-widgets_arent_plugins-61836261fa280a5c.php\"\";i:30;s:59:\"\"2011032200-1.8_svn-admins_like_widgets-7f19d2783c1680d3.php\"\";i:31;s:14:\"\"2011052801.php\"\";i:32;s:60:\"\"2011061200-1.8b1-sites_need_a_site_guid-6d9dcbf46c0826cc.php\"\";i:33;s:62:\"\"2011092500-1.8.0.1-forum_reply_river_view-5758ce8d86ac56ce.php\"\";i:34;s:54:\"\"2011123100-1.8.2-fix_friend_river-b17e7ff8345c2269.php\"\";i:35;s:53:\"\"2011123101-1.8.2-fix_blog_status-b14c2a0e7b9e7d55.php\"\";i:36;s:50:\"\"2012012000-1.8.3-ip_in_syslog-87fe0f068cf62428.php\"\";i:37;s:50:\"\"2012012100-1.8.3-system_cache-93100e7d55a24a11.php\"\";i:38;s:59:\"\"2012041800-1.8.3-dont_filter_passwords-c0ca4a18b38ae2bc.php\"\";i:39;s:58:\"\"2012041801-1.8.3-multiple_user_tokens-852225f7fd89f6c5.php\"\";i:40;s:59:\"\"2013010200-1.9.0_dev-river_target_guid-66cbcae057cfa3ad.php\"\";i:41;s:62:\"\"2013010400-1.9.0_dev-comments_to_entities-faba94768b055b08.php\"\";i:42;s:61:\"\"2013021000-1.9.0_dev-web_services_plugin-85a61b4884b9b9e3.php\"\";i:43;s:60:\"\"2013022000-1.9.0-datadir_dates_to_guids-efb02ff11b9d6444.php\"\";i:44;s:59:\"\"2013030600-1.8.13-update_user_location-8999eb8bf1bdd9a3.php\"\";i:45;s:62:\"\"2013051700-1.8.15-add_missing_group_index-52a63a3a3ffaced2.php\"\";i:46;s:53:\"\"2013052900-1.8.15-ipv6_in_syslog-f5c2cc0196e9e731.php\"\";i:47;s:50:\"\"2013060900-1.8.15-site_secret-404fc165cf9e0ac9.php\"\";i:48;s:63:\"\"2013062200-1.9.0_dev-new_remember_me_table-da1bfc6f36c7952e.php\"\";i:49;s:54:\"\"2013062700-1.9.0_dev-add_db_queue-e6af82afc6d3eee3.php\"\";i:50;s:50:\"\"2014012000-1.8.18-remember_me-9a8a433685cf7be9.php\"\";i:51;s:61:\"\"2014031100-1.9.0_dev-elgg_upgrade_object-5577af53c93abd1a.php\"\";i:52;s:55:\"\"2014032200-1.9.0_dev-tinymce_to_ck-bbd2daa1912deaef.php\"\";i:53;s:60:\"\"2014042500-1.9.0_dev-site-notifications-0aae171afb7a00d8.php\"\";i:54;s:61:\"\"2014050600-1.9.0_dev-replies_to_entities-094ea0e36bc027d3.php\"\";i:55;s:60:\"\"2014070600-1.9.0_rc.3-river_enabled_col-bef9e6f0533ac338.php\"\";i:56;s:60:\"\"2014090900-1.9.0-fix_processed_upgrades-183ad189c71872d8.php\"\";i:57;s:62:\"\"2014111600-1.9.4-recheck_comments_upgrade-9da270072a5b0cad.php\"\";}\"\n'),('admin_registered','1\n');
/*!40000 ALTER TABLE `elgg_datalists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_entities`
--

DROP TABLE IF EXISTS `elgg_entities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_entities` (
  `guid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('object','user','group','site') NOT NULL,
  `subtype` int(11) DEFAULT NULL,
  `owner_guid` bigint(20) unsigned NOT NULL,
  `site_guid` bigint(20) unsigned NOT NULL,
  `container_guid` bigint(20) unsigned NOT NULL,
  `access_id` int(11) NOT NULL,
  `time_created` int(11) NOT NULL,
  `time_updated` int(11) NOT NULL,
  `last_action` int(11) NOT NULL DEFAULT '0',
  `enabled` enum('yes','no') NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`guid`),
  KEY `type` (`type`),
  KEY `subtype` (`subtype`),
  KEY `owner_guid` (`owner_guid`),
  KEY `site_guid` (`site_guid`),
  KEY `container_guid` (`container_guid`),
  KEY `access_id` (`access_id`),
  KEY `time_created` (`time_created`),
  KEY `time_updated` (`time_updated`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_entities`
--

LOCK TABLES `elgg_entities` WRITE;
/*!40000 ALTER TABLE `elgg_entities` DISABLE KEYS */;
INSERT INTO `elgg_entities` VALUES (1,'site',0,0,1,0,2,1436340463,1436340463,1436340463,''),(2,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(3,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(4,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(5,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(6,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(7,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(8,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(9,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(10,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(11,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(12,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(13,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(14,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(15,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(16,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(17,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(18,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(19,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(20,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(21,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(22,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(23,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(24,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(25,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(26,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(27,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(28,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(29,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(30,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(31,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(32,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(33,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(34,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(35,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(36,'object',1,1,1,1,2,1436340464,1436340464,1436340464,''),(37,'user',0,0,1,0,2,1436340465,1436340465,1436340465,''),(38,'object',3,37,1,37,0,1436340465,1436340465,1436340465,''),(39,'object',3,37,1,37,0,1436340465,1436340465,1436340465,''),(40,'object',3,37,1,37,0,1436340465,1436340465,1436340465,''),(41,'object',3,37,1,37,0,1436340465,1436340465,1436340465,''),(42,'object',3,37,1,37,0,1436340465,1436340465,1436340465,'');
/*!40000 ALTER TABLE `elgg_entities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_entity_relationships`
--

DROP TABLE IF EXISTS `elgg_entity_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_entity_relationships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid_one` bigint(20) unsigned NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `guid_two` bigint(20) unsigned NOT NULL,
  `time_created` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `guid_one` (`guid_one`,`relationship`,`guid_two`),
  KEY `relationship` (`relationship`),
  KEY `guid_two` (`guid_two`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_entity_relationships`
--

LOCK TABLES `elgg_entity_relationships` WRITE;
/*!40000 ALTER TABLE `elgg_entity_relationships` DISABLE KEYS */;
INSERT INTO `elgg_entity_relationships` VALUES (1,2,'active_plugin',1,1436340464),(2,3,'active_plugin',1,1436340464),(3,4,'active_plugin',1,1436340464),(4,6,'active_plugin',1,1436340464),(5,13,'active_plugin',1,1436340464),(6,14,'active_plugin',1,1436340464),(7,15,'active_plugin',1,1436340464),(8,16,'active_plugin',1,1436340464),(9,17,'active_plugin',1,1436340464),(10,19,'active_plugin',1,1436340464),(11,20,'active_plugin',1,1436340464),(12,21,'active_plugin',1,1436340464),(13,22,'active_plugin',1,1436340464),(14,23,'active_plugin',1,1436340464),(15,24,'active_plugin',1,1436340464),(16,25,'active_plugin',1,1436340464),(17,26,'active_plugin',1,1436340464),(18,27,'active_plugin',1,1436340464),(19,28,'active_plugin',1,1436340464),(20,29,'active_plugin',1,1436340464),(21,32,'active_plugin',1,1436340464),(22,34,'active_plugin',1,1436340464),(23,36,'active_plugin',1,1436340464),(24,37,'member_of_site',1,1436340465);
/*!40000 ALTER TABLE `elgg_entity_relationships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_entity_subtypes`
--

DROP TABLE IF EXISTS `elgg_entity_subtypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_entity_subtypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('object','user','group','site') NOT NULL,
  `subtype` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`,`subtype`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_entity_subtypes`
--

LOCK TABLES `elgg_entity_subtypes` WRITE;
/*!40000 ALTER TABLE `elgg_entity_subtypes` DISABLE KEYS */;
INSERT INTO `elgg_entity_subtypes` VALUES (1,'object','plugin','ElggPlugin\n'),(2,'object','file','ElggFile\n'),(3,'object','widget','ElggWidget\n'),(4,'object','comment','ElggComment\n'),(5,'object','elgg_upgrade','ElggUpgrade\n'),(6,'object','blog','ElggBlog\n'),(7,'object','discussion_reply','ElggDiscussionReply\n'),(8,'object','thewire','ElggWire\n');
/*!40000 ALTER TABLE `elgg_entity_subtypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_geocode_cache`
--

DROP TABLE IF EXISTS `elgg_geocode_cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_geocode_cache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(128) DEFAULT NULL,
  `lat` varchar(20) DEFAULT NULL,
  `long` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `location` (`location`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_geocode_cache`
--

LOCK TABLES `elgg_geocode_cache` WRITE;
/*!40000 ALTER TABLE `elgg_geocode_cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `elgg_geocode_cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_groups_entity`
--

DROP TABLE IF EXISTS `elgg_groups_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_groups_entity` (
  `guid` bigint(20) unsigned NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`guid`),
  KEY `name` (`name`(50)),
  KEY `description` (`description`(50)),
  FULLTEXT KEY `name_2` (`name`,`description`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_groups_entity`
--

LOCK TABLES `elgg_groups_entity` WRITE;
/*!40000 ALTER TABLE `elgg_groups_entity` DISABLE KEYS */;
/*!40000 ALTER TABLE `elgg_groups_entity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_hmac_cache`
--

DROP TABLE IF EXISTS `elgg_hmac_cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_hmac_cache` (
  `hmac` varchar(255) NOT NULL,
  `ts` int(11) NOT NULL,
  PRIMARY KEY (`hmac`),
  KEY `ts` (`ts`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_hmac_cache`
--

LOCK TABLES `elgg_hmac_cache` WRITE;
/*!40000 ALTER TABLE `elgg_hmac_cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `elgg_hmac_cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_metadata`
--

DROP TABLE IF EXISTS `elgg_metadata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_metadata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_guid` bigint(20) unsigned NOT NULL,
  `name_id` int(11) NOT NULL,
  `value_id` int(11) NOT NULL,
  `value_type` enum('integer','text') NOT NULL,
  `owner_guid` bigint(20) unsigned NOT NULL,
  `access_id` int(11) NOT NULL,
  `time_created` int(11) NOT NULL,
  `enabled` enum('yes','no') NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  KEY `entity_guid` (`entity_guid`),
  KEY `name_id` (`name_id`),
  KEY `value_id` (`value_id`),
  KEY `owner_guid` (`owner_guid`),
  KEY `access_id` (`access_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_metadata`
--

LOCK TABLES `elgg_metadata` WRITE;
/*!40000 ALTER TABLE `elgg_metadata` DISABLE KEYS */;
INSERT INTO `elgg_metadata` VALUES (1,1,1,2,'text',0,2,1436340463,''),(2,37,3,4,'text',37,2,1436340465,''),(3,37,5,4,'text',0,2,1436340465,''),(4,37,6,7,'text',0,2,1436340465,'');
/*!40000 ALTER TABLE `elgg_metadata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_metastrings`
--

DROP TABLE IF EXISTS `elgg_metastrings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_metastrings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `string` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `string` (`string`(50))
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_metastrings`
--

LOCK TABLES `elgg_metastrings` WRITE;
/*!40000 ALTER TABLE `elgg_metastrings` DISABLE KEYS */;
INSERT INTO `elgg_metastrings` VALUES (1,'email\n'),(2,'liorer@post.bgu.ac.il\n'),(3,'notification:method:email\n'),(4,'1\n'),(5,'validated\n'),(6,'validated_method\n'),(7,'admin_user\n');
/*!40000 ALTER TABLE `elgg_metastrings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_objects_entity`
--

DROP TABLE IF EXISTS `elgg_objects_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_objects_entity` (
  `guid` bigint(20) unsigned NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`guid`),
  FULLTEXT KEY `title` (`title`,`description`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_objects_entity`
--

LOCK TABLES `elgg_objects_entity` WRITE;
/*!40000 ALTER TABLE `elgg_objects_entity` DISABLE KEYS */;
INSERT INTO `elgg_objects_entity` VALUES (2,'aalborg_theme','\n'),(3,'blog','\n'),(4,'bookmarks','\n'),(5,'categories','\n'),(6,'ckeditor','\n'),(7,'custom_index','\n'),(8,'dashboard','\n'),(9,'developers','\n'),(10,'diagnostics','\n'),(11,'embed','\n'),(12,'externalpages','\n'),(13,'file','\n'),(14,'garbagecollector','\n'),(15,'groups','\n'),(16,'htmlawed','\n'),(17,'invitefriends','\n'),(18,'legacy_urls','\n'),(19,'likes','\n'),(20,'logbrowser','\n'),(21,'logrotate','\n'),(22,'members','\n'),(23,'messageboard','\n'),(24,'messages','\n'),(25,'notifications','\n'),(26,'pages','\n'),(27,'profile','\n'),(28,'reportedcontent','\n'),(29,'search','\n'),(30,'site_notifications','\n'),(31,'tagcloud','\n'),(32,'thewire','\n'),(33,'twitter_api','\n'),(34,'uservalidationbyemail','\n'),(35,'web_services','\n'),(36,'zaudio','\n'),(38,'','\n'),(39,'','\n'),(40,'','\n'),(41,'','\n'),(42,'','\n');
/*!40000 ALTER TABLE `elgg_objects_entity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_private_settings`
--

DROP TABLE IF EXISTS `elgg_private_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_private_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_guid` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entity_guid` (`entity_guid`,`name`),
  KEY `name` (`name`),
  KEY `value` (`value`(50))
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_private_settings`
--

LOCK TABLES `elgg_private_settings` WRITE;
/*!40000 ALTER TABLE `elgg_private_settings` DISABLE KEYS */;
INSERT INTO `elgg_private_settings` VALUES (1,2,'elgg:internal:priority','35\n'),(2,3,'elgg:internal:priority','1\n'),(3,4,'elgg:internal:priority','2\n'),(4,5,'elgg:internal:priority','3\n'),(5,6,'elgg:internal:priority','4\n'),(6,7,'elgg:internal:priority','5\n'),(7,8,'elgg:internal:priority','6\n'),(8,9,'elgg:internal:priority','7\n'),(9,10,'elgg:internal:priority','8\n'),(10,11,'elgg:internal:priority','9\n'),(11,12,'elgg:internal:priority','10\n'),(12,13,'elgg:internal:priority','11\n'),(13,14,'elgg:internal:priority','12\n'),(14,15,'elgg:internal:priority','13\n'),(15,16,'elgg:internal:priority','14\n'),(16,17,'elgg:internal:priority','15\n'),(17,18,'elgg:internal:priority','16\n'),(18,19,'elgg:internal:priority','17\n'),(19,20,'elgg:internal:priority','18\n'),(20,21,'elgg:internal:priority','19\n'),(21,22,'elgg:internal:priority','20\n'),(22,23,'elgg:internal:priority','21\n'),(23,24,'elgg:internal:priority','22\n'),(24,25,'elgg:internal:priority','23\n'),(25,26,'elgg:internal:priority','24\n'),(26,27,'elgg:internal:priority','25\n'),(27,28,'elgg:internal:priority','26\n'),(28,29,'elgg:internal:priority','27\n'),(29,30,'elgg:internal:priority','28\n'),(30,31,'elgg:internal:priority','29\n'),(31,32,'elgg:internal:priority','30\n'),(32,33,'elgg:internal:priority','31\n'),(33,34,'elgg:internal:priority','32\n'),(34,35,'elgg:internal:priority','33\n'),(35,36,'elgg:internal:priority','34\n'),(36,32,'limit','140\n'),(37,38,'handler','control_panel\n'),(38,38,'context','admin\n'),(39,38,'column','1\n'),(40,38,'order','0\n'),(41,39,'handler','admin_welcome\n'),(42,39,'context','admin\n'),(43,39,'order','10\n'),(44,39,'column','1\n'),(45,40,'handler','online_users\n'),(46,40,'context','admin\n'),(47,40,'column','2\n'),(48,40,'order','0\n'),(49,41,'handler','new_users\n'),(50,41,'context','admin\n'),(51,41,'order','10\n'),(52,41,'column','2\n'),(53,42,'handler','content_stats\n'),(54,42,'context','admin\n'),(55,42,'order','20\n'),(56,42,'column','2\n');
/*!40000 ALTER TABLE `elgg_private_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_queue`
--

DROP TABLE IF EXISTS `elgg_queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `data` mediumblob NOT NULL,
  `timestamp` int(11) NOT NULL,
  `worker` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `retrieve` (`timestamp`,`worker`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_queue`
--

LOCK TABLES `elgg_queue` WRITE;
/*!40000 ALTER TABLE `elgg_queue` DISABLE KEYS */;
/*!40000 ALTER TABLE `elgg_queue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_river`
--

DROP TABLE IF EXISTS `elgg_river`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_river` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(8) NOT NULL,
  `subtype` varchar(32) NOT NULL,
  `action_type` varchar(32) NOT NULL,
  `access_id` int(11) NOT NULL,
  `view` text NOT NULL,
  `subject_guid` int(11) NOT NULL,
  `object_guid` int(11) NOT NULL,
  `target_guid` int(11) NOT NULL,
  `annotation_id` int(11) NOT NULL,
  `posted` int(11) NOT NULL,
  `enabled` enum('yes','no') NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `action_type` (`action_type`),
  KEY `access_id` (`access_id`),
  KEY `subject_guid` (`subject_guid`),
  KEY `object_guid` (`object_guid`),
  KEY `target_guid` (`target_guid`),
  KEY `annotation_id` (`annotation_id`),
  KEY `posted` (`posted`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_river`
--

LOCK TABLES `elgg_river` WRITE;
/*!40000 ALTER TABLE `elgg_river` DISABLE KEYS */;
/*!40000 ALTER TABLE `elgg_river` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_sites_entity`
--

DROP TABLE IF EXISTS `elgg_sites_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_sites_entity` (
  `guid` bigint(20) unsigned NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`guid`),
  UNIQUE KEY `url` (`url`),
  FULLTEXT KEY `name` (`name`,`description`,`url`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_sites_entity`
--

LOCK TABLES `elgg_sites_entity` WRITE;
/*!40000 ALTER TABLE `elgg_sites_entity` DISABLE KEYS */;
INSERT INTO `elgg_sites_entity` VALUES (1,'TestNetwork','','http://localhost/elgg_project/social_networks/3bfef2f28965c791ee5b6158a8eea7b6/elgg-1.9.5/\n');
/*!40000 ALTER TABLE `elgg_sites_entity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_system_log`
--

DROP TABLE IF EXISTS `elgg_system_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_system_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) NOT NULL,
  `object_class` varchar(50) NOT NULL,
  `object_type` varchar(50) NOT NULL,
  `object_subtype` varchar(50) NOT NULL,
  `event` varchar(50) NOT NULL,
  `performed_by_guid` int(11) NOT NULL,
  `owner_guid` int(11) NOT NULL,
  `access_id` int(11) NOT NULL,
  `enabled` enum('yes','no') NOT NULL DEFAULT 'yes',
  `time_created` int(11) NOT NULL,
  `ip_address` varchar(46) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `object_id` (`object_id`),
  KEY `object_class` (`object_class`),
  KEY `object_type` (`object_type`),
  KEY `object_subtype` (`object_subtype`),
  KEY `event` (`event`),
  KEY `performed_by_guid` (`performed_by_guid`),
  KEY `access_id` (`access_id`),
  KEY `time_created` (`time_created`),
  KEY `river_key` (`object_type`,`object_subtype`,`event`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_system_log`
--

LOCK TABLES `elgg_system_log` WRITE;
/*!40000 ALTER TABLE `elgg_system_log` DISABLE KEYS */;
INSERT INTO `elgg_system_log` VALUES (1,2,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(2,3,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(3,4,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(4,5,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(5,6,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(6,7,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(7,8,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(8,9,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(9,10,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(10,11,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(11,12,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(12,13,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(13,14,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(14,15,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(15,16,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(16,17,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(17,18,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(18,19,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(19,20,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(20,21,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(21,22,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(22,23,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(23,24,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(24,25,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(25,26,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(26,27,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(27,28,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(28,29,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(29,30,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(30,31,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(31,32,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(32,33,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(33,34,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(34,35,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(35,36,'ElggPlugin','object','plugin','create',0,1,2,'yes',1436340464,'::1\n'),(36,1,'ElggRelationship','relationship','active_plugin','create',0,0,2,'yes',1436340464,'::1\n'),(37,24,'ElggRelationship','relationship','member_of_site','create',0,0,2,'yes',1436340465,'::1\n'),(38,37,'ElggUser','user','','create',0,0,2,'yes',1436340465,'::1\n'),(39,2,'ElggMetadata','metadata','notification:method:email','create',0,37,2,'yes',1436340465,'::1\n'),(40,38,'ElggWidget','object','widget','create',0,37,2,'yes',1436340465,'::1\n'),(41,39,'ElggWidget','object','widget','create',0,37,2,'yes',1436340465,'::1\n'),(42,40,'ElggWidget','object','widget','create',0,37,2,'yes',1436340465,'::1\n'),(43,41,'ElggWidget','object','widget','create',0,37,2,'yes',1436340465,'::1\n'),(44,42,'ElggWidget','object','widget','create',0,37,2,'yes',1436340465,'::1\n'),(45,37,'ElggUser','user','','make_admin',0,0,2,'yes',1436340465,'::1\n'),(46,3,'ElggMetadata','metadata','validated','create',0,0,2,'yes',1436340465,'::1\n'),(47,4,'ElggMetadata','metadata','validated_method','create',0,0,2,'yes',1436340465,'::1\n'),(48,37,'ElggUser','user','','login:before',0,0,2,'yes',1436340465,'::1\n'),(49,37,'ElggUser','user','','login',37,0,2,'yes',1436340465,'::1\n'),(50,37,'ElggUser','user','','login:after',37,0,2,'yes',1436340465,'::1\n');
/*!40000 ALTER TABLE `elgg_system_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_users_apisessions`
--

DROP TABLE IF EXISTS `elgg_users_apisessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_users_apisessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_guid` bigint(20) unsigned NOT NULL,
  `site_guid` bigint(20) unsigned NOT NULL,
  `token` varchar(40) DEFAULT NULL,
  `expires` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_guid` (`user_guid`,`site_guid`),
  KEY `token` (`token`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_users_apisessions`
--

LOCK TABLES `elgg_users_apisessions` WRITE;
/*!40000 ALTER TABLE `elgg_users_apisessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `elgg_users_apisessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_users_entity`
--

DROP TABLE IF EXISTS `elgg_users_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_users_entity` (
  `guid` bigint(20) unsigned NOT NULL,
  `name` text NOT NULL,
  `username` varchar(128) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `salt` varchar(8) NOT NULL DEFAULT '',
  `email` text NOT NULL,
  `language` varchar(6) NOT NULL DEFAULT '',
  `banned` enum('yes','no') NOT NULL DEFAULT 'no',
  `admin` enum('yes','no') NOT NULL DEFAULT 'no',
  `last_action` int(11) NOT NULL DEFAULT '0',
  `prev_last_action` int(11) NOT NULL DEFAULT '0',
  `last_login` int(11) NOT NULL DEFAULT '0',
  `prev_last_login` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`guid`),
  UNIQUE KEY `username` (`username`),
  KEY `password` (`password`),
  KEY `email` (`email`(50)),
  KEY `last_action` (`last_action`),
  KEY `last_login` (`last_login`),
  KEY `admin` (`admin`),
  FULLTEXT KEY `name` (`name`),
  FULLTEXT KEY `name_2` (`name`,`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_users_entity`
--

LOCK TABLES `elgg_users_entity` WRITE;
/*!40000 ALTER TABLE `elgg_users_entity` DISABLE KEYS */;
INSERT INTO `elgg_users_entity` VALUES (37,'liorer','liorer','719ffd2e28e90151811d468e5d5deb2d','avjniZeV','liorer@post.bgu.ac.il','en','no','yes',0,0,1436340465,0),(27,'liorrirer','liodfdrer','719ffd2e28e90151811d468e5d5deb2d','avjniZeV','liordser@post.bgu.ac.il','en','no','yes',0,0,1436340465,0);
/*!40000 ALTER TABLE `elgg_users_entity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_users_remember_me_cookies`
--

DROP TABLE IF EXISTS `elgg_users_remember_me_cookies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_users_remember_me_cookies` (
  `code` varchar(32) NOT NULL,
  `guid` bigint(20) unsigned NOT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`code`),
  KEY `timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_users_remember_me_cookies`
--

LOCK TABLES `elgg_users_remember_me_cookies` WRITE;
/*!40000 ALTER TABLE `elgg_users_remember_me_cookies` DISABLE KEYS */;
/*!40000 ALTER TABLE `elgg_users_remember_me_cookies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elgg_users_sessions`
--

DROP TABLE IF EXISTS `elgg_users_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elgg_users_sessions` (
  `session` varchar(255) NOT NULL,
  `ts` int(11) unsigned NOT NULL DEFAULT '0',
  `data` mediumblob,
  PRIMARY KEY (`session`),
  KEY `ts` (`ts`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elgg_users_sessions`
--

LOCK TABLES `elgg_users_sessions` WRITE;
/*!40000 ALTER TABLE `elgg_users_sessions` DISABLE KEYS */;
INSERT INTO `elgg_users_sessions` VALUES ('htqtrkr71rpqn0gn2vdfo6bo54',1436340465,'\"guid|i:37;msg|a:1:{s:7:\"\"success\"\";a:1:{i:0;s:31:\"\"Admin account has been created.\"\";}}\"\n');
/*!40000 ALTER TABLE `elgg_users_sessions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-02 20:45:25
