-- MySQL Script generated by MySQL Workbench
-- Thu Sep  7 08:49:18 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering



-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema foodpantry
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema foodpantry
-- -----------------------------------------------------
DROP DATABASE foodpantry;
CREATE DATABASE foodpantry;

USE `foodpantry` ;

-- -----------------------------------------------------
-- Table `foodpantry`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `foodpantry`.`user` ;

CREATE TABLE IF NOT EXISTS `foodpantry`.`user` (
  `userID` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(150) NOT NULL UNIQUE,
  `isAdmin` TINYINT NOT NULL DEFAULT 0,
  `password` VARCHAR(200) NULL,
  PRIMARY KEY (`userID`)
  );
  
-- ----------------------------------------------------
-- Table structure for table `class`
-- ----------------------------------------------------
  
CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(20) NOT NULL,
  `students` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);
 

CREATE TABLE `registration` (
`userID` INT(11), 
`firstUse` TINYINT, 
`children` VARCHAR(50), 
`adult` VARCHAR(50), 
`senior` VARCHAR(50), 
FOREIGN KEY (userID) REFERENCES user(userID) );



-- -----------------------------------------------------
-- Table `foodpantry`.`basket`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `foodpantry`.`basket` ;

CREATE TABLE IF NOT EXISTS `foodpantry`.`basket` (
  `basketID` INT(11) NOT NULL AUTO_INCREMENT,
  `basketDate` DATE,
  `userID` INT(11) NOT NULL,
  PRIMARY KEY (`basketID`),
  INDEX `fk_basket_user1_idx` (`userID` ASC),
  CONSTRAINT `fk_basket_user1`
    FOREIGN KEY (`userID`)
    REFERENCES `foodpantry`.`user` (`userID`)
    );
   


-- -----------------------------------------------------
-- Table `foodpantry`.`category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `foodpantry`.`category` ;

CREATE TABLE IF NOT EXISTS `foodpantry`.`category` (
  `categoryID` INT(11) NOT NULL AUTO_INCREMENT,
  `categoryType` VARCHAR(45),
  PRIMARY KEY (`categoryID`)
  );


-- -----------------------------------------------------
-- Table `foodpantry`.`product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `foodpantry`.`product` ;


CREATE TABLE IF NOT EXISTS `product` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(45) NOT NULL,
  `quantity` int(11) NOT NULL,
  `catID` int(11),
  `img` varchar(50),
  PRIMARY KEY (`productID`),
  KEY `catID` (`catID`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`catID`) REFERENCES `category` (`categoryID`)
);
-- -----------------------------------------------------
-- Table `foodpantry`.`basketItem`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `foodpantry`.`basketItem` ;

CREATE TABLE IF NOT EXISTS `foodpantry`.`basketItem` (
  `basketItemID` INT(11) NOT NULL AUTO_INCREMENT,
  `productID` INT(11) NOT NULL,
  `basketID` INT(11) NOT NULL,
  PRIMARY KEY (`basketItemID`),
  CONSTRAINT `BasketItem_ibfk_1`
    FOREIGN KEY (`productID`)
    REFERENCES `foodpantry`.`product` (`productID`),
  CONSTRAINT `BasketItem_ibfk_2`
    FOREIGN KEY (`basketID`)
    REFERENCES `foodpantry`.`basket` (`basketID`)
    );


-- -----------------------------------------------------
-- Table `foodpantry`.`transactions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `foodpantry`.`transactions` ;

CREATE TABLE IF NOT EXISTS `foodpantry`.`transactions` (
  `transactionID` INT NOT NULL AUTO_INCREMENT,
  `date` DATE,
  `userID` INT(11) NOT NULL,
  PRIMARY KEY (`transactionID`),
  CONSTRAINT `fk_transactions_user1`
    FOREIGN KEY (`userID`)
    REFERENCES `foodpantry`.`user` (`userID`)
    );



-- -----------------------------------------------------
-- Table `foodpantry`.`transactionsDetails`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `foodpantry`.`transactionsDetails` ;

CREATE TABLE IF NOT EXISTS `foodpantry`.`transactionsDetails` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `transactionID` INT NOT NULL,
  `quantity` INT NOT NULL,
  `productID` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `productID`
    FOREIGN KEY (`productID`)
    REFERENCES `foodpantry`.`product` (`productID`),
  CONSTRAINT `transactionID`
    FOREIGN KEY (`transactionID`)
    REFERENCES `foodpantry`.`transactions` (`transactionID`)
    );

INSERT INTO `user` VALUES (1,'aba2dc56c0c9a7ce7350ab8adf3cbef69ec9dc2fcdd07a9f856442d9758be1b7',1,'$2y$10$Ux7yFlVtPZsdxRL3eLDnqev89gsHQJzhXe7Rh1c3/Doe4qWUINZ6i');
INSERT INTO `user` (`username`, `isAdmin`, `password`) VALUES ('user1', 0, 'password1'), ('user2', 0, 'password2'), ('user3', 0, 'password3');
INSERT INTO `basket` VALUES (1,'2022-10-25', 1),(2,'2022-10-26', 1),(3,'2022-10-25', 1),(4,'2022-10-26', 1),(5,'2022-10-25', 1),(6,'2022-10-26',1 ),(7,'2022-10-26', 1),(8,'2022-10-27', 1),(9,'2022-10-27',1 ),(10,'2022-10-27', 1),(11,'2022-10-27', 1),(12,'2022-10-28',1),(13,'2022-10-29',1),(14,'2022-10-29',1),(15,'2022-10-23',1),(16,'2022-10-24',1);
INSERT INTO `category` VALUES (1,'breakfast_foods'),(2,'canned_goods'),(3,'fresh_foods'),(4,'snacks'),(5,'wellness_products');
INSERT INTO `class` VALUES (1,'7th class',48),(2,'8th class',49),(3,'9th glass',32),(4,'10th class',62);
INSERT INTO `product` VALUES (101,'cereal',317,1,'images/breakfastTest.jpg'),(102,'oatmeals',251,1,'images/products/2023_06_29_08_01_39.jpg'),(103,'fruit_cups',150,1,'images/breakfastTest.jpg'),(201,'vegetables',38,2,'images/cannedgoodsTest.jpg'),(202,'sauce_cans',15,2,'images/cannedgoodsTest.jpg'),(203,'beans',17,2,'images/cannedgoodsTest.jpg'),(204,'fruit',4,2,'images/cannedgoodsTest.jpg'),(205,'miscellaneous',60,2,'images/cannedgoodsTest.jpg'),(206,'soups',54,2,'images/cannedgoodsTest.jpg'),(207,'pasta_products',13,2,'images/pastaTest.jpg'),(208,'rice',41,2,'images/pastaTest.jpg'),(301,'produce',10,3,'images/FreshfoodsTest.jpg'),(302,'dairy',3,3,'images/FreshfoodsTest.jpg'),(303,'frozen',4,3,'images/FreshfoodsTest.jpg'),(304,'bread',7,3,'images/FreshfoodsTest.jpg'),(305,'drinks',38,3,'images/FreshfoodsTest.jpg'),(401,'popcorn',7,4,'images/snacksTest.jpg'),(402,'chips',11,4,'images/snacksTest.jpg'),(403,'jerky',8,4,'images/snacksTest.jpg'),(404,'jello',12,4,'images/snacksTest.jpg'),(405,'candy',21,4,'images/snacksTest.jpg'),(406,'condiments',18,4,'images/products/2023_08_24_12_18_50.jpg'),(501,'paper_products',200,5,'images/wellnessTest.jpg'),(502,'menstrual_products',137,5,'images/wellnessTest.jpg'),(503,'cleaning_products',218,5,'images/wellnessTest.jpg');
INSERT INTO `basketItem` VALUES (1,101,1),(2,101,1),(3,202,1),(4,201,1),(5,101,2),(6,202,2),(7,202,2),(8,201,2),(9,102,3),(10,102,3),(11,201,3),(12,201,3),(13,103,3),(14,101,4),(15,101,4),(16,102,4),(17,202,4),(18,301,5),(19,304,5),(20,402,5),(21,402,5),(22,102,6),(23,205,6),(24,205,6),(25,101,7),(26,201,8),(27,403,7),(28,502,7),(29,302,8),(30,503,8),(31,503,8),(32,402,8),(33,101,9),(34,502,9),(35,303,10),(36,303,10),(37,103,11),(38,201,12),(39,305,13),(40,403,14),(41,301,15),(42,502,15),(43,405,16),(44,405,16),(45,203,16),(46,102,16);
INSERT INTO `transactions` VALUES (1, CURDATE(), 1);
INSERT INTO `transactions` (`date`, `userID`) VALUES ('2023-09-20', 1), ('2023-09-21', 2), ('2023-09-22', 3);
INSERT INTO `transactionsDetails` (`transactionID`, `quantity`, `productID`) VALUES (1, 3, 101), (1, 2, 201), (2, 4, 102), (3, 1, 301), (3, 2, 502);

