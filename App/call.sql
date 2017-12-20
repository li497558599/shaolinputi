/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : shaolinsi

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-05-16 15:16:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for call
-- ----------------------------
DROP TABLE IF EXISTS `call`;
CREATE TABLE `call` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `phone` varchar(255) NOT NULL COMMENT '电话',
  `ctime` datetime NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of call
-- ----------------------------
INSERT INTO `call` VALUES ('1', '18237799825', '2017-05-05 05:00:00');

-- ----------------------------
-- Table structure for online
-- ----------------------------
DROP TABLE IF EXISTS `online`;
CREATE TABLE `online` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `years` varchar(255) NOT NULL COMMENT '年龄',
  `phone` varchar(255) NOT NULL COMMENT '电话',
  `content` varchar(255) NOT NULL COMMENT '留言内容',
  `ctime` datetime NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of online
-- ----------------------------
INSERT INTO `online` VALUES ('1', '张文豪', '21', '18237799825', '你好', '2017-05-21 00:00:00');

-- ----------------------------
-- Table structure for pics
-- ----------------------------
DROP TABLE IF EXISTS `pics`;
CREATE TABLE `pics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `pic` varchar(255) NOT NULL COMMENT '图片',
  `name` varchar(255) NOT NULL COMMENT '内容',
  `ctime` datetime NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pics
-- ----------------------------
INSERT INTO `pics` VALUES ('1', '/Public/Uploads/591aa04bc5cd7.png', '学生练功图片', '2017-05-16 14:46:35');
INSERT INTO `pics` VALUES ('2', '/Public/Uploads/591aa0a03cfd9.png', '校园环境', '2017-05-16 14:48:00');
INSERT INTO `pics` VALUES ('3', '/Public/Uploads/591aa0b8e4b63.png', ' 校园餐厅', '2017-05-16 14:48:24');
INSERT INTO `pics` VALUES ('4', '/Public/Uploads/591aa0d328e57.png', ' 部队入伍', '2017-05-16 14:48:51');

-- ----------------------------
-- Table structure for question
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `phone` varchar(255) NOT NULL COMMENT '电话',
  `ctime` datetime NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of question
-- ----------------------------
INSERT INTO `question` VALUES ('1', '张文豪', '18237799825', '2017-05-12 00:00:00');
