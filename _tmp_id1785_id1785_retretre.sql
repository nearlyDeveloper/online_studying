-- MySQL dump 10.16  Distrib 10.2.24-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: id1785_retretre
-- ------------------------------------------------------
-- Server version	10.2.24-MariaDB-log

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
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `cource` int(11) DEFAULT NULL,
  `text` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (4,'Знакомство','fa fa-slack',1,'<p><strong>Знакомство с React и его экосистемой.</strong></p>\r\n\r\n<p>В этом блоке мы начнем с того, на чем остановились в скринкасте по Реакт. Научимся писать простые компоненты и узнаем, в чем принципиальное отличие React.js от других популярных фреймворков. Создадим первые компоненты, используя декларативный подход, познакомимся с экосистемой, научимся использовать сторонние компоненты и работать с формами.</p>\r\n\r\n<ul>\r\n	<li>Разбераем как работает create-react-app.</li>\r\n	<li>Глубже знакомимся с Реактом, Virtual DOM, JSX.</li>\r\n	<li>Разбераем React Hooks, их отличия от стейта и lifecycle методов.</li>\r\n	<li>Разберем примеры тестирования компонент с помощью Jest и Enzyme.</li>\r\n	<li>Учимся переиспользовать код с помощью наследования, декораторов и кастомных хуков.</li>\r\n	<li>Связь с DOM: keys &amp; refs.</li>\r\n	<li>Анимации в React, CSSTransitionGroup.</li>\r\n	<li>Подключаем сторонние компоненты.</li>\r\n</ul>\r\n'),(5,'test','test',2,'<p>test</p>\r\n'),(6,'test','test',2,'<p>test</p>\r\n');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cources`
--

DROP TABLE IF EXISTS `cources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `descr` varchar(255) DEFAULT NULL,
  `test` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cources`
--

LOCK TABLES `cources` WRITE;
/*!40000 ALTER TABLE `cources` DISABLE KEYS */;
INSERT INTO `cources` VALUES (1,'Курс для начинающих','https://cdn.auth0.com/blog/react-js/react.png','dfdsf','[{\"text\":\"Факты, закономерности и механизмы психики являются предметом изучения в?\",\"answer\":3,\"answers\":[\"когнитивной психологии\",\"гештальтпсихологии\",\"бихевиоризме\",\"отечественной психологии\"]},{\"text\":\"Основной задачей психологии является?\",\"answer\":0,\"answers\":[\"коррекция социальных норм поведения\",\"изучение законов психической деятельности\",\"разработка проблем истории психологии\",\"совершенствование методов исследования\"]},{\"text\":\"К психическим процессам относится?\",\"answer\":2,\"answers\":[\"темперамент\",\"характер\",\"ощущение\",\"способности\"]}]'),(2,'Курс для продвинутых','https://cdn.auth0.com/blog/react-js/react.png','Курс нацелен на получение таких то знаний по таким то разделам',NULL);
/*!40000 ALTER TABLE `cources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `group` int(11) NOT NULL DEFAULT 1 COMMENT '1 - user, 2 - admin',
  `articles` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Lifesobad','0aca988c4ed2cb55f9b48b186eff895a','alexx87690@gmail.com',2,'[\"3\",\"4\",\"7\"]'),(2,'sadsadasdasd','827ccb0eea8a706c4c34a16891f84e7b','imnochek@gmail.com',1,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'id1785_retretre'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-08 14:02:55
