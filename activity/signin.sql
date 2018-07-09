/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : signin

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-07-10 01:44:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `login_ip` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lastlogined_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'eyJpdiI6IlZBY1wvRXdlM3l3QVp2c0RnK1FqbUZBPT0iLCJ2YWx1ZSI6ImxuRmpMWEtcL0pyajVGK1dxZmRLcDlnPT0iLCJtYWMiOiI2MzViNTJhZjc3ZDQzOTAwNjE5ZTgzMzU4MDM0NjdiYzE0Y2RmMWM3YjUyY2I3MGU3Njc4NGY0M2JmM2EyZjZkIn0=', '1', '127.0.0.1', '2018-07-09 13:41:55', '2018-07-09 16:10:58', '2018-07-09 05:19:18');
INSERT INTO `admin` VALUES ('2', 'admin1', 'eyJpdiI6IlZBY1wvRXdlM3l3QVp2c0RnK1FqbUZBPT0iLCJ2YWx1ZSI6ImxuRmpMWEtcL0pyajVGK1dxZmRLcDlnPT0iLCJtYWMiOiI2MzViNTJhZjc3ZDQzOTAwNjE5ZTgzMzU4MDM0NjdiYzE0Y2RmMWM3YjUyY2I3MGU3Njc4NGY0M2JmM2EyZjZkIn0=', '1', '127.0.0.1', '2018-07-09 13:41:55', '2018-07-09 13:41:55', '2018-07-09 05:18:58');
INSERT INTO `admin` VALUES ('3', 'admin2', 'eyJpdiI6IlZBY1wvRXdlM3l3QVp2c0RnK1FqbUZBPT0iLCJ2YWx1ZSI6ImxuRmpMWEtcL0pyajVGK1dxZmRLcDlnPT0iLCJtYWMiOiI2MzViNTJhZjc3ZDQzOTAwNjE5ZTgzMzU4MDM0NjdiYzE0Y2RmMWM3YjUyY2I3MGU3Njc4NGY0M2JmM2EyZjZkIn0=', '0', '127.0.0.1', '2018-07-09 13:41:55', '2018-07-09 16:53:42', '2018-07-10 01:05:31');
INSERT INTO `admin` VALUES ('8', 'admin3', 'eyJpdiI6ImdXVWJvNys1UFBsWXpWb1dWMkJSSFE9PSIsInZhbHVlIjoiQUtYbzdLbVEyalZiUU1uUGNHbjdZZz09IiwibWFjIjoiOWU0M2M4ODkxOGM4MmI2YTU1NTUyYzgzM2UwMzZmOTA0NmQzODE0ZWY3YmE3YWI5M2ViY2I0MjVjY2NhMDkzNiJ9', '1', null, '2018-07-09 17:44:13', '2018-07-09 17:44:13', null);
