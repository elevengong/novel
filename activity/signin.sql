/*
Navicat MySQL Data Transfer

Source Server         : localmysql
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : signin

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-07-10 19:42:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `activity`
-- ----------------------------
DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `a_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `start_at` timestamp NULL DEFAULT NULL,
  `end_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of activity
-- ----------------------------
INSERT INTO `activity` VALUES ('1', '签到活动', '0', '2018-07-10 11:29:21', '2018-07-25 11:29:30', '2018-07-10 11:29:36', '2018-07-10 04:33:01');
INSERT INTO `activity` VALUES ('3', 'bbb', '1', '2018-07-10 13:43:56', '2018-07-26 13:43:57', '2018-07-10 05:44:00', '2018-07-10 06:52:58');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lastlogined_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'eyJpdiI6IlZBY1wvRXdlM3l3QVp2c0RnK1FqbUZBPT0iLCJ2YWx1ZSI6ImxuRmpMWEtcL0pyajVGK1dxZmRLcDlnPT0iLCJtYWMiOiI2MzViNTJhZjc3ZDQzOTAwNjE5ZTgzMzU4MDM0NjdiYzE0Y2RmMWM3YjUyY2I3MGU3Njc4NGY0M2JmM2EyZjZkIn0=', '1', '127.0.0.1', '2018-07-09 13:41:55', '2018-07-10 10:41:11', '2018-07-10 10:41:11');
INSERT INTO `admin` VALUES ('2', 'admin1', 'eyJpdiI6IlZBY1wvRXdlM3l3QVp2c0RnK1FqbUZBPT0iLCJ2YWx1ZSI6ImxuRmpMWEtcL0pyajVGK1dxZmRLcDlnPT0iLCJtYWMiOiI2MzViNTJhZjc3ZDQzOTAwNjE5ZTgzMzU4MDM0NjdiYzE0Y2RmMWM3YjUyY2I3MGU3Njc4NGY0M2JmM2EyZjZkIn0=', '1', '127.0.0.1', '2018-07-09 13:41:55', '2018-07-09 13:41:55', '2018-07-09 05:18:58');
INSERT INTO `admin` VALUES ('3', 'admin2', 'eyJpdiI6IlZBY1wvRXdlM3l3QVp2c0RnK1FqbUZBPT0iLCJ2YWx1ZSI6ImxuRmpMWEtcL0pyajVGK1dxZmRLcDlnPT0iLCJtYWMiOiI2MzViNTJhZjc3ZDQzOTAwNjE5ZTgzMzU4MDM0NjdiYzE0Y2RmMWM3YjUyY2I3MGU3Njc4NGY0M2JmM2EyZjZkIn0=', '0', '127.0.0.1', '2018-07-09 13:41:55', '2018-07-09 16:53:42', '2018-07-10 01:05:31');
INSERT INTO `admin` VALUES ('8', 'admin3', 'eyJpdiI6ImdXVWJvNys1UFBsWXpWb1dWMkJSSFE9PSIsInZhbHVlIjoiQUtYbzdLbVEyalZiUU1uUGNHbjdZZz09IiwibWFjIjoiOWU0M2M4ODkxOGM4MmI2YTU1NTUyYzgzM2UwMzZmOTA0NmQzODE0ZWY3YmE3YWI5M2ViY2I0MjVjY2NhMDkzNiJ9', '1', null, '2018-07-09 17:44:13', '2018-07-10 02:57:36', '2018-07-10 10:57:36');

-- ----------------------------
-- Table structure for `reward`
-- ----------------------------
DROP TABLE IF EXISTS `reward`;
CREATE TABLE `reward` (
  `r_id` int(9) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `activity_id` int(5) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `pay_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '后台是否已打款(手动)',
  `client_ip` varchar(20) NOT NULL,
  `ordersn` varchar(100) NOT NULL,
  `remark` text,
  `operate_admin` varchar(20) DEFAULT NULL COMMENT '记录哪位管理人员打的款',
  `pay_at` timestamp NULL DEFAULT NULL COMMENT '后台管理员打款的时间',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reward
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `login_ip` varchar(50) NOT NULL,
  `lastlogin_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'eleven', '127.0.0.1', '2018-07-10 14:58:46', '2018-07-10 14:58:48', '2018-07-10 14:58:51');
