/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : car_trading

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-09-21 14:48:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `car_category1`
-- ----------------------------
DROP TABLE IF EXISTS `car_category1`;
CREATE TABLE `car_category1` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_category1
-- ----------------------------

-- ----------------------------
-- Table structure for `car_category2`
-- ----------------------------
DROP TABLE IF EXISTS `car_category2`;
CREATE TABLE `car_category2` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_category2
-- ----------------------------

-- ----------------------------
-- Table structure for `car_category3`
-- ----------------------------
DROP TABLE IF EXISTS `car_category3`;
CREATE TABLE `car_category3` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_category3
-- ----------------------------

-- ----------------------------
-- Table structure for `car_info`
-- ----------------------------
DROP TABLE IF EXISTS `car_info`;
CREATE TABLE `car_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `main_image` varchar(255) NOT NULL,
  `iamge2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `iamge5` varchar(255) DEFAULT NULL,
  `iamge6` varchar(255) DEFAULT NULL,
  `image7` varchar(255) DEFAULT NULL,
  `image8` varchar(255) DEFAULT NULL,
  `image9` varchar(255) DEFAULT NULL,
  `image10` varchar(255) DEFAULT NULL,
  `image11` varchar(255) DEFAULT NULL,
  `image12` varchar(255) DEFAULT NULL,
  `body_condition` varchar(255) NOT NULL,
  `technical_condition` varchar(255) NOT NULL,
  `mot` date NOT NULL,
  `tax` date NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `purchase_type` set('Buy','Lease','Finance') NOT NULL,
  `year` smallint(6) NOT NULL,
  `mileage` int(11) NOT NULL,
  `fuel_type` set('Petrol','Diesel','Electric','hybrid') NOT NULL,
  `engine_size` float NOT NULL,
  `fuel_consumption` varchar(255) DEFAULT NULL,
  `acceleration` varchar(255) DEFAULT NULL,
  `gerbox` set('Auto','Manual') NOT NULL,
  `co2_emmision` tinyint(4) DEFAULT NULL,
  `no_of_doors` tinyint(4) DEFAULT NULL,
  `body_type` set('Saloon','Coupe','Convertible') NOT NULL,
  `no_of_seats` tinyint(4) DEFAULT NULL,
  `insurance_group` smallint(6) DEFAULT NULL,
  `tax_price` smallint(6) DEFAULT NULL,
  `colour` char(20) DEFAULT NULL,
  `small_description` varchar(255) NOT NULL,
  `main_description` text NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `dislikes` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `date_entered` date NOT NULL,
  `sold` bit(1) NOT NULL DEFAULT b'0',
  `inspiration_list` bit(1) DEFAULT NULL,
  `evaluated_price` decimal(10,2) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_info
-- ----------------------------
INSERT INTO `car_info` VALUES ('36', 'TOYOTA', 'e076d-toyota.jpg', null, null, null, null, null, null, null, null, null, null, null, 'good', 'good', '2016-08-24', '2016-08-24', '22', '222', '2222.00', '', 'Lease', '2002', '20000', '', '4', null, null, 'Manual', null, null, 'Coupe', null, null, null, null, '', '', '20', '0', '10', '0000-00-00', '', null, null, null);
INSERT INTO `car_info` VALUES ('37', 'KIA', '7454f-kia.png', null, null, null, null, null, null, null, null, null, null, null, 'aa', 'aa', '2016-08-02', '2016-08-10', 'aa', 'aa', '0.00', '', '', '0', '22', '', '33', null, null, '', null, null, '', null, null, null, null, '', '', '50', '0', '20', '0000-00-00', '', null, null, null);
INSERT INTO `car_info` VALUES ('38', 'GOLF', '6647a-golf.jpg', '', null, null, null, null, null, null, null, null, null, null, 'aa', 'aa', '2016-08-25', '2016-08-11', 'aa', 'aa', '0.00', '', '', '0', '2147483647', '', '0', null, null, '', null, null, '', null, null, null, null, '', '', '1', '0', '30', '0000-00-00', '', null, null, null);
INSERT INTO `car_info` VALUES ('39', 'FORD', '74daf-ford.jpg', null, null, null, null, null, null, null, null, null, null, null, 'asf', 'asf', '2016-08-13', '2016-08-12', 'asf', 'asdf', '0.00', '', '', '0', '23324', '', '0', null, null, '', null, null, '', null, null, null, null, '', '', '0', '0', '100', '0000-00-00', '', null, null, null);

-- ----------------------------
-- Table structure for `customer`
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `pwas` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` char(20) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `account_status` enum('inactive','active') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('1', 'khalil@gmail.com', 'Khalil', null, 'khalil', null, null, null, null);
INSERT INTO `customer` VALUES ('2', 'bahasaqr@gmail.com', 'Baha', null, 'baha', null, null, null, null);
INSERT INTO `customer` VALUES ('3', 'hafed@email.com', 'Hafed', 'Mustafa', 'hafed', null, null, null, 'inactive');
INSERT INTO `customer` VALUES ('4', 'hafed@email2.com', 'Hafed', 'Mustafa', 'hafed', null, null, null, 'inactive');
INSERT INTO `customer` VALUES ('5', 'hafed2@email.com', 'Hafed', 'Mustafa', 'hafed', null, null, null, 'inactive');
INSERT INTO `customer` VALUES ('6', 'hafed@email3.com', 'Hafed', 'Mustafa', 'hafed', null, null, null, 'inactive');
