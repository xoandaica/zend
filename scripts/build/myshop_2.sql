/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : myshop

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-01-12 17:30:29
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
-- Table structure for `functions`
-- ----------------------------
DROP TABLE IF EXISTS `functions`;
CREATE TABLE `functions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `id_module` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of functions
-- ----------------------------
INSERT INTO `functions` VALUES ('1', 'Hiển thị menu', 'Hiển thị danh sách các menu', '1');
INSERT INTO `functions` VALUES ('2', 'Thêm menu', 'Thêm một menu', '1');
INSERT INTO `functions` VALUES ('3', 'Sửa menu', 'Sửa menu', '1');
INSERT INTO `functions` VALUES ('4', 'Xóa menu', 'Xóa menu', '1');

-- ----------------------------
-- Table structure for `menus`
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `root_menu` int(11) DEFAULT NULL,
  `module` int(11) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menus
-- ----------------------------

-- ----------------------------
-- Table structure for `modules`
-- ----------------------------
DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `link` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modules
-- ----------------------------
INSERT INTO `modules` VALUES ('1', 'Quản lý menu', 'Quản lý danh sách menu, thêm sửa xóa', '/zend_demo/public/manageMenu/Home/index');

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
  `detail` text CHARACTER SET utf8,
  `create_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'Quần đùi', 'http://thoitrangchuyensi.com/uploads/shops/thumb/dam-suong-co-tru-2793-1.jpg', '100.000', '1', '4,5', '{\r\n\"ID\":\"Q1001\",\r\n\"name\":\"Quần đùi chính hãng\",\r\n\"origin\":\"Việt Nam\",\r\n\"color\":\"Đỏ, xanh, tím\",\r\n\"size\":\"L, XL, XXL\",\r\n\"image\":\"http://thoitrangchuyensi.com/uploads/shops/thumb/dam-suong-co-tru-2793-1.jpg,http://thoitrangchuyensi.com/uploads/shops/thumb/dam-suong-co-tru-2793-1.jpg,http://thoitrangchuyensi.com/uploads/shops/thumb/dam-suong-co-tru-2793-1.jpg,http://thoitrangchuyensi.com/uploads/shops/thumb/dam-suong-co-tru-2793-1.jpg,http://thoitrangchuyensi.com/uploads/shops/thumb/dam-suong-co-tru-2793-1.jpg\"\r\n\r\n\r\n\r\n}', '2017-01-09');
INSERT INTO `products` VALUES ('2', 'Quần đùi1', 'http://thoitrangchuyensi.com/uploads/shops/thumb/dam-suong-co-tru-2793-1.jpg', '110.000', '1', '4,5', null, null);
INSERT INTO `products` VALUES ('3', 'Quần đùi2', 'http://thoitrangchuyensi.com/uploads/shops/thumb/dam-suong-co-tru-2793-1.jpg', '120.000', '1', '4,6', null, null);
INSERT INTO `products` VALUES ('4', 'Quần đùi3', 'http://thoitrangchuyensi.com/uploads/shops/thumb/dam-suong-co-tru-2793-1.jpg', '130.000', '1', '5,7', null, null);
INSERT INTO `products` VALUES ('5', 'Quần đùi4', 'http://thoitrangchuyensi.com/uploads/shops/thumb/dam-suong-co-tru-2793-1.jpg', '140.000', '1', '4,8', null, null);
INSERT INTO `products` VALUES ('6', 'Quần đùi5', 'http://thoitrangchuyensi.com/uploads/shops/thumb/dam-suong-co-tru-2793-1.jpg', '150.000', '2', '4,8,9', null, null);
INSERT INTO `products` VALUES ('7', 'Quần đùi6', 'http://thoitrangchuyensi.com/uploads/shops/thumb/dam-suong-co-tru-2793-1.jpg', '160.000', '2', '5,7,8', null, null);
INSERT INTO `products` VALUES ('8', 'Quần đùi7', 'http://thoitrangchuyensi.com/uploads/shops/thumb/dam-suong-co-tru-2793-1.jpg', '170.000', '2', '5,8,9', null, null);

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `id_functions` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'administrator', '1,2,3,4');
INSERT INTO `roles` VALUES ('2', 'supporter', '1');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `information` text CHARACTER SET utf8,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '123456', 'kiendt@vnpt-technology.vn', '', '1');
INSERT INTO `users` VALUES ('2', 'kiendt', '123456', 'admin@vnpt-technology.vn', '', '2');
