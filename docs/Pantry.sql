create database foodpantry;
use foodpantry;

--
-- Table structure for table `Basket`
--

DROP TABLE IF EXISTS `Basket`;
CREATE TABLE `Basket` (
  `basketID` int(11) NOT NULL,
  `basketDate` date DEFAULT NULL,
  PRIMARY KEY (`basketID`)
);

--
-- Dumping data for table `Basket`
--

INSERT INTO `Basket` VALUES (1,'2022-10-25'),(2,'2022-10-26'),(3,'2022-10-25'),(4,'2022-10-26'),(5,'2022-10-25'),(6,'2022-10-26'),(7,'2022-10-26'),(8,'2022-10-27'),(9,'2022-10-27'),(10,'2022-10-27'),(11,'2022-10-27'),(12,'2022-10-28'),(13,'2022-10-29'),(14,'2022-10-29'),(15,'2022-10-23'),(16,'2022-10-24');

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryType` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`categoryID`)
);
--
-- Dumping data for table `category`
--

INSERT INTO `category` VALUES (1,'breakfast_foods'),(2,'canned_goods'),(3,'fresh_foods'),(4,'snacks'),(5,'wellness_products');

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `class_name` varchar(20) NOT NULL,
  `students` int(11) NOT NULL
);

--
-- Dumping data for table `class`
--

INSERT INTO `class` VALUES (1,'7th class',48),(2,'8th class',49),(3,'9th glass',32),(4,'10th class',62);

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(45) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `catID` int(11) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`productID`),
  KEY `catID` (`catID`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`catID`) REFERENCES `category` (`categoryID`)
);
--
-- Dumping data for table `product`
--

INSERT INTO `product` VALUES (101,'cereal',317,1,'images/breakfastTest.jpg'),(102,'oatmeals',251,1,'images/products/2023_06_29_08_01_39.jpg'),(103,'fruit_cups',150,1,'images/breakfastTest.jpg'),(201,'vegetables',38,2,'images/cannedgoodsTest.jpg'),(202,'sauce_cans',15,2,'images/cannedgoodsTest.jpg'),(203,'beans',17,2,'images/cannedgoodsTest.jpg'),(204,'fruit',4,2,'images/cannedgoodsTest.jpg'),(205,'miscellaneous',60,2,'images/cannedgoodsTest.jpg'),(206,'soups',54,2,'images/cannedgoodsTest.jpg'),(207,'pasta_products',13,2,'images/pastaTest.jpg'),(208,'rice',41,2,'images/pastaTest.jpg'),(301,'produce',10,3,'images/FreshfoodsTest.jpg'),(302,'dairy',3,3,'images/FreshfoodsTest.jpg'),(303,'frozen',4,3,'images/FreshfoodsTest.jpg'),(304,'bread',7,3,'images/FreshfoodsTest.jpg'),(305,'drinks',38,3,'images/FreshfoodsTest.jpg'),(401,'popcorn',7,4,'images/snacksTest.jpg'),(402,'chips',11,4,'images/snacksTest.jpg'),(403,'jerky',8,4,'images/snacksTest.jpg'),(404,'jello',12,4,'images/snacksTest.jpg'),(405,'candy',21,4,'images/snacksTest.jpg'),(406,'condiments',18,4,'images/products/2023_08_24_12_18_50.jpg'),(501,'paper_products',200,5,'images/wellnessTest.jpg'),(502,'menstrual_products',137,5,'images/wellnessTest.jpg'),(503,'cleaning_products',218,5,'images/wellnessTest.jpg');


--
-- Table structure for table `BasketItem`
--

DROP TABLE IF EXISTS `BasketItem`;
CREATE TABLE `BasketItem` (
  `BasketItemID` int(11) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `basketID` int(11) DEFAULT NULL,
  PRIMARY KEY (`BasketItemID`),
  KEY `productID` (`productID`),
  KEY `basketID` (`basketID`),
  CONSTRAINT `BasketItem_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`),
  CONSTRAINT `BasketItem_ibfk_2` FOREIGN KEY (`basketID`) REFERENCES `Basket` (`basketID`)
);
--
-- Dumping data for table `BasketItem`
--

INSERT INTO `BasketItem` VALUES (1,101,1),(2,101,1),(3,202,1),(4,201,1),(5,101,2),(6,202,2),(7,202,2),(8,201,2),(9,102,3),(10,102,3),(11,201,3),(12,201,3),(13,103,3),(14,101,4),(15,101,4),(16,102,4),(17,202,4),(18,301,5),(19,304,5),(20,402,5),(21,402,5),(22,102,6),(23,205,6),(24,205,6),(25,101,7),(26,201,8),(27,403,7),(28,502,7),(29,302,8),(30,503,8),(31,503,8),(32,402,8),(33,101,9),(34,502,9),(35,303,10),(36,303,10),(37,103,11),(38,201,12),(39,305,13),(40,403,14),(41,301,15),(42,502,15),(43,405,16),(44,405,16),(45,203,16),(46,102,16);


--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`userid`)
);
--
-- Dumping data for table `user`
--

INSERT INTO `user` VALUES (1,'jays','$2y$10$Ux7yFlVtPZsdxRL3eLDnqev89gsHQJzhXe7Rh1c3/Doe4qWUINZ6i');

