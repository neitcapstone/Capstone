CREATE DATABASE  IF NOT EXISTS `datadesigner` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `datadesigner`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: datadesigner
-- ------------------------------------------------------
-- Server version	5.6.12-log

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
-- Table structure for table `accesstype`
--

DROP TABLE IF EXISTS `accesstype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accesstype` (
  `idaccessType` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `desc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idaccessType`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accesstype`
--

LOCK TABLES `accesstype` WRITE;
/*!40000 ALTER TABLE `accesstype` DISABLE KEYS */;
INSERT INTO `accesstype` VALUES (1,'read','read only'),(2,'write','write only'),(3,'owner','full site'),(4,'admin','full domain');
/*!40000 ALTER TABLE `accesstype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `idcustomer` int(11) NOT NULL AUTO_INCREMENT,
  `fName` varchar(45) DEFAULT NULL,
  `lName` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zip` varchar(45) DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idcustomer`),
  KEY `fk_customer_user1_idx` (`iduser`),
  CONSTRAINT `fk_customer_user1` FOREIGN KEY (`iduser`) REFERENCES `user_admin` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Fred','Freddy','f@fred.com','666-666-6666','34 5th ave','Cranston','RI','11111',1,1),(2,'Barb','Smth','barb@b.com','222-222-2222','2 1st str','Boston','MA','23456',2,1),(3,'Jim','Doey','j@JJ.com','444-444-4444','23 cat AVe','Johnson','RI','23445',3,1),(4,'Don','Duck','d@d.com','111-111-3456','23 dog AVe','Braintree','MA','12344',3,1),(5,'Gizmo','Stripe','g@g.com','234-789-3466','45 goofy st','Cranston','RI','43211',5,1),(6,'Tommy','Boy','bb@bbb.com','345-235-9876','12 1st ave','Hope','RI','23545',5,1);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `idemployee` int(11) NOT NULL AUTO_INCREMENT,
  `fName` varchar(45) DEFAULT NULL,
  `lName` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zip` varchar(45) DEFAULT NULL,
  `socialSecurity` varchar(45) DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idemployee`),
  KEY `fk_employee_user_idx` (`iduser`),
  CONSTRAINT `fk_employee_user` FOREIGN KEY (`iduser`) REFERENCES `user_admin` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'Gary','Simmons','222-222-2222','1 new str','Providence','RI','22222','000999888',1,1),(2,'Sally','Silly','111-111-1111','20 bob ave','Providence','RI','44444','123456789',2,1),(3,'Bob','Smite','555-555-5555','34 g str','Johnston','RI','33333','234234234',3,1),(4,'Jane','Gurr','444-444-4444','43 first ave','Attleboro','MA','44444','234782354',3,1),(5,'Missy','Miss','111-111-1111','5 main st','Putnam','CT','55555','435567890',5,1),(6,'Mickey','Mouse','777-777-7777','23 circle ave','Hope','RI','66666','099782354',5,1);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory` (
  `idinventory` int(11) NOT NULL AUTO_INCREMENT,
  `idproduct` int(11) NOT NULL,
  `count` int(11) DEFAULT NULL,
  `idlocation` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idinventory`),
  KEY `fk_inventory_product1_idx` (`idproduct`),
  KEY `fk_inventory_location1_idx` (`idlocation`),
  CONSTRAINT `fk_inventory_location1` FOREIGN KEY (`idlocation`) REFERENCES `location` (`idlocation`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventory_product1` FOREIGN KEY (`idproduct`) REFERENCES `product` (`idproduct`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (1,1,20,1,1),(2,2,10,2,1),(3,3,100,4,1),(4,4,90,6,1),(5,5,45,4,1);
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location` (
  `idlocation` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zip` varchar(45) DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idlocation`),
  KEY `fk_location_user1_idx` (`iduser`),
  CONSTRAINT `fk_location_user1` FOREIGN KEY (`iduser`) REFERENCES `user_admin` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (1,'Joe\'s Toys','1 elm str','Providence','RI','11111',1,NULL,1),(2,'John\'s Pants','2 main str','Providence','RI','11111',2,NULL,1),(3,'Mike\'s Lawns','2 Java Str','Franklin','RI','44444',3,'401-987-6541',1),(4,'Sally\'s Sports','3 PHP str','Boston','MA','12345',5,NULL,1),(5,'Bob\'s Lawns','2 Sharp Ave','Johnston','RI','33333',4,NULL,1),(6,'Sally\'s Sports','5 JS str','Providence','RI','99999',5,NULL,1),(7,'Mike\'s Lawn Shed','3 industry way','Johnston','RI','09876',3,NULL,1);
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `idproduct` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `desc` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `ProdCode` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idproduct`),
  KEY `fk_product_user1_idx` (`iduser`),
  CONSTRAINT `fk_product_user1` FOREIGN KEY (`iduser`) REFERENCES `user_admin` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'toy','plaything','1.00',1,1,NULL),(2,'pants','size 36','20.00',2,1,NULL),(3,'Baseball','Official MLB ball','10',5,1,NULL),(4,'Football','Official NFL ball','25',5,1,'23-ert'),(5,'Puck','Hockey Puck','15',5,1,NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sale_product`
--

DROP TABLE IF EXISTS `sale_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sale_product` (
  `idsale_product` int(11) NOT NULL AUTO_INCREMENT,
  `idlocation` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `idproduct` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idcustomer` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idsale_product`),
  KEY `fk_sale_product_location1_idx` (`idlocation`),
  KEY `fk_sale_product_product1_idx` (`idproduct`),
  KEY `fk_sale_product_user1_idx` (`iduser`),
  KEY `fk_sale_product_customer1_idx` (`idcustomer`),
  CONSTRAINT `fk_sale_product_customer1` FOREIGN KEY (`idcustomer`) REFERENCES `customer` (`idcustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sale_product_location1` FOREIGN KEY (`idlocation`) REFERENCES `location` (`idlocation`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sale_product_product1` FOREIGN KEY (`idproduct`) REFERENCES `product` (`idproduct`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sale_product_user1` FOREIGN KEY (`iduser`) REFERENCES `user_admin` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale_product`
--

LOCK TABLES `sale_product` WRITE;
/*!40000 ALTER TABLE `sale_product` DISABLE KEYS */;
INSERT INTO `sale_product` VALUES (1,1,'2013-02-02',1,1,1,1,1),(2,2,'2012-01-01',2,2,2,2,1),(3,4,'2012-01-01',3,5,5,3,1),(4,6,'2012-04-01',4,5,6,2,1);
/*!40000 ALTER TABLE `sale_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sale_service`
--

DROP TABLE IF EXISTS `sale_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sale_service` (
  `idsale_service` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `idlocation` int(11) DEFAULT NULL,
  `idservice` int(11) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `idcustomer` int(11) NOT NULL,
  `hours` decimal(2,0) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idsale_service`),
  KEY `fk_sale_service_user1_idx` (`iduser`),
  KEY `fk_sale_service_service1_idx` (`idservice`),
  KEY `fk_sale_service_location1_idx` (`idlocation`),
  KEY `fk_sale_service_customer1_idx` (`idcustomer`),
  CONSTRAINT `fk_sale_service_customer1` FOREIGN KEY (`idcustomer`) REFERENCES `customer` (`idcustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sale_service_location1` FOREIGN KEY (`idlocation`) REFERENCES `location` (`idlocation`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sale_service_service1` FOREIGN KEY (`idservice`) REFERENCES `service` (`idservice`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sale_service_user1` FOREIGN KEY (`iduser`) REFERENCES `user_admin` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale_service`
--

LOCK TABLES `sale_service` WRITE;
/*!40000 ALTER TABLE `sale_service` DISABLE KEYS */;
INSERT INTO `sale_service` VALUES (4,'2013-03-04',3,1,3,3,2,1),(5,'2014-01-05',3,6,3,4,3,1);
/*!40000 ALTER TABLE `sale_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service` (
  `idservice` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `serviceName` varchar(45) DEFAULT NULL,
  `desc` varchar(45) DEFAULT NULL,
  `price-hour` decimal(2,0) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idservice`),
  KEY `fk_service_user1_idx` (`iduser`),
  CONSTRAINT `fk_service_user1` FOREIGN KEY (`iduser`) REFERENCES `user_admin` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (1,3,'Lawn Cut','Basic lawn cut',20,1),(6,3,'Bush Grooming','trim hedges',25,1),(7,3,'Seed Lawn','Lawn seeding',30,1);
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_schedule`
--

DROP TABLE IF EXISTS `service_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_schedule` (
  `idservice_schedule` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idservice` int(11) NOT NULL,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `idcustomer` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idservice_schedule`),
  KEY `fk_service_schedule_user1_idx` (`iduser`),
  KEY `fk_service_schedule_service1_idx` (`idservice`),
  KEY `fk_service_schedule_customer1_idx` (`idcustomer`),
  CONSTRAINT `fk_service_schedule_customer1` FOREIGN KEY (`idcustomer`) REFERENCES `customer` (`idcustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_schedule_service1` FOREIGN KEY (`idservice`) REFERENCES `service` (`idservice`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_schedule_user1` FOREIGN KEY (`iduser`) REFERENCES `user_admin` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_schedule`
--

LOCK TABLES `service_schedule` WRITE;
/*!40000 ALTER TABLE `service_schedule` DISABLE KEYS */;
INSERT INTO `service_schedule` VALUES (2,3,1,'03:00:00','2013-01-20',3,1),(7,3,6,'13:00:00','2014-02-15',4,1),(8,3,7,'02:00:00','2014-03-23',3,1);
/*!40000 ALTER TABLE `service_schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tablesused`
--

DROP TABLE IF EXISTS `tablesused`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tablesused` (
  `idtablesUsed` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `inventory` int(11) DEFAULT NULL,
  `customer_table` int(11) DEFAULT NULL,
  `employee_table` int(11) DEFAULT NULL,
  `location_table` int(11) DEFAULT NULL,
  `product_table` int(11) DEFAULT NULL,
  `sale_service_table` int(11) DEFAULT NULL,
  `sale_product_table` int(11) DEFAULT NULL,
  `service_schedule_table` int(11) DEFAULT NULL,
  `service_table` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtablesUsed`),
  KEY `fk_tablesUsed_user_admin1_idx` (`iduser`),
  CONSTRAINT `fk_tablesUsed_user_admin1` FOREIGN KEY (`iduser`) REFERENCES `user_admin` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tablesused`
--

LOCK TABLES `tablesused` WRITE;
/*!40000 ALTER TABLE `tablesused` DISABLE KEYS */;
INSERT INTO `tablesused` VALUES (1,1,1,1,1,1,1,0,0,0,0,1),(2,2,1,1,1,1,1,0,1,0,0,1),(3,3,0,1,1,1,0,1,0,1,1,2);
/*!40000 ALTER TABLE `tablesused` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_admin`
--

DROP TABLE IF EXISTS `user_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_admin` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `fName` varchar(45) NOT NULL,
  `lName` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_admin`
--

LOCK TABLES `user_admin` WRITE;
/*!40000 ALTER TABLE `user_admin` DISABLE KEYS */;
INSERT INTO `user_admin` VALUES (1,'joe@joe.com','Joe','Sample','xxx',1),(2,'john@john.com','John','Doe','xxx',1),(3,'mike@mike.com','Mike','Sav','xxx',1),(4,'bob@bob.com','Bob','Jones','xxx',1),(5,'sal@sal.com','Sally','Smith','xxx',1),(6,'jack@jack.com','Jack','Rola','xxx',1),(7,'josh@josh.com','Josh','Legoff','xxx',1);
/*!40000 ALTER TABLE `user_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `idusers` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `lName` varchar(45) DEFAULT NULL,
  `fName` varchar(45) DEFAULT NULL,
  `idaccessType` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idusers`),
  KEY `fk_users_user_admin1_idx` (`iduser`),
  KEY `fk_users_accessType1_idx` (`idaccessType`),
  CONSTRAINT `fk_users_accessType1` FOREIGN KEY (`idaccessType`) REFERENCES `accesstype` (`idaccessType`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_user_admin1` FOREIGN KEY (`iduser`) REFERENCES `user_admin` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,3,'m@m.com','xxx','Mike','Jones',2,1),(2,2,'j@k.com','xxx','Kyle','Bob',1,1),(3,3,'t@t.com','xxx','Ern','Ernie',1,1),(4,3,'j@j.com','xxx','Smith','Bill',2,1),(5,3,'b@b.com','xxx','Doe','Jane',3,1),(6,5,'c@c.com','xxx','Kye','Dick',1,1),(7,5,'d@d.com','xxx','Bye','Joe',2,1),(8,5,'e@e.com','xxx','Lye','Dirk',3,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-01-26 23:02:39
