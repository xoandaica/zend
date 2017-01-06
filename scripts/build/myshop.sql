/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : myshop

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-01-05 17:29:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8,
  `parent_category` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'men fashion', null);
INSERT INTO `categories` VALUES ('2', 'woman fashion', null);
INSERT INTO `categories` VALUES ('3', 'kid fashion', null);
INSERT INTO `categories` VALUES ('4', 'Áo khoác nam', '1');
INSERT INTO `categories` VALUES ('5', 'Quần đùi nam', '1');
INSERT INTO `categories` VALUES ('6', 'Quần sịp nam', '1');
INSERT INTO `categories` VALUES ('7', 'Áo khoác nữ', '2');
INSERT INTO `categories` VALUES ('8', 'Áo phông nữ', '2');
INSERT INTO `categories` VALUES ('9', 'Quần đùi nữ', '2');
INSERT INTO `categories` VALUES ('10', 'Quần sà lỏn', '2');
INSERT INTO `categories` VALUES ('11', 'Quần đùi con nít', '3');
INSERT INTO `categories` VALUES ('12', 'Quần dài con nít', '3');
INSERT INTO `categories` VALUES ('13', 'Quần Ngắn tay', '3');
INSERT INTO `categories` VALUES ('14', 'Quần ba lỗ', '3');

-- ----------------------------
-- Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 NOT NULL,
  `images` text CHARACTER SET utf8,
  `price` text CHARACTER SET utf8 NOT NULL,
  `root_category` int(11) NOT NULL,
  `sub_category` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'Quần đùi', 'http://thoitrangchuyensi.com/uploads/shops/thumb/dam-suong-co-tru-2793-1.jpg', '100.000', '1', '4,5');
INSERT INTO `products` VALUES ('2', 'Quần đùi1', 'http://thoitrangchuyensi.com/uploads/shops/thumb/dam-suong-co-tru-2793-1.jpg', '110.000', '1', '4,5');
INSERT INTO `products` VALUES ('3', 'Quần đùi2', 'http://thoitrangchuyensi.com/uploads/shops/thumb/dam-suong-co-tru-2793-1.jpg', '120.000', '1', '4,6');
INSERT INTO `products` VALUES ('4', 'Quần đùi3', 'http://thoitrangchuyensi.com/uploads/shops/thumb/dam-suong-co-tru-2793-1.jpg', '130.000', '1', '5,7');
INSERT INTO `products` VALUES ('5', 'Quần đùi4', 'http://thoitrangchuyensi.com/uploads/shops/thumb/dam-suong-co-tru-2793-1.jpg', '140.000', '1', '4,8');
INSERT INTO `products` VALUES ('6', 'Quần đùi5', 'http://thoitrangchuyensi.com/uploads/shops/thumb/dam-suong-co-tru-2793-1.jpg', '150.000', '2', '4,8,9');
INSERT INTO `products` VALUES ('7', 'Quần đùi6', 'http://thoitrangchuyensi.com/uploads/shops/thumb/dam-suong-co-tru-2793-1.jpg', '160.000', '2', '5,7,8');
INSERT INTO `products` VALUES ('8', 'Quần đùi7', 'http://thoitrangchuyensi.com/uploads/shops/thumb/dam-suong-co-tru-2793-1.jpg', '170.000', '2', '5,8,9');
