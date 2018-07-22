/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : novel

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-07-22 22:57:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for friendlink
-- ----------------------------
DROP TABLE IF EXISTS `friendlink`;
CREATE TABLE `friendlink` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `web` varchar(200) DEFAULT NULL,
  `webname` varchar(60) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `priority` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of friendlink
-- ----------------------------
INSERT INTO `friendlink` VALUES ('1', 'http://www.9527xsw.com', '9527小说网', '1', '2');
INSERT INTO `friendlink` VALUES ('2', 'http://abc123.com', 'abc123', '0', '1');
