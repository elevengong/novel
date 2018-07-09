/*
Navicat MySQL Data Transfer

Source Server         : localmysql
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : signin

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-07-09 19:45:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `login_ip` varchar(50) DEFAULT NULL,
  `created_at` time DEFAULT NULL,
  `update_at` time DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'eyJpdiI6IlZBY1wvRXdlM3l3QVp2c0RnK1FqbUZBPT0iLCJ2YWx1ZSI6ImxuRmpMWEtcL0pyajVGK1dxZmRLcDlnPT0iLCJtYWMiOiI2MzViNTJhZjc3ZDQzOTAwNjE5ZTgzMzU4MDM0NjdiYzE0Y2RmMWM3YjUyY2I3MGU3Njc4NGY0M2JmM2EyZjZkIn0=', '1', null, null, null);
