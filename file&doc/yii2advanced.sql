/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : yii2advanced

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-05-18 22:25:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yiiad_message
-- ----------------------------
DROP TABLE IF EXISTS `yiiad_message`;
CREATE TABLE `yiiad_message` (
  `id` int(11) NOT NULL DEFAULT '0' COMMENT '关联source_message表的id',
  `language` varchar(16) NOT NULL DEFAULT '' COMMENT '语种;类似en-US',
  `translation` text COMMENT '与source_message关联后显示的内容',
  PRIMARY KEY (`id`,`language`),
  CONSTRAINT `fk_message_source_message` FOREIGN KEY (`id`) REFERENCES `yiiad_source_message` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='根据source_message替换语言内容的表';

-- ----------------------------
-- Table structure for yiiad_source_message
-- ----------------------------
DROP TABLE IF EXISTS `yiiad_source_message`;
CREATE TABLE `yiiad_source_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `category` varchar(32) DEFAULT NULL COMMENT '分类;配置组件时的参数，初始为lang',
  `message` text COMMENT '源语言的内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='源语言内容表，根据自增id匹配message表的id字段再匹配语种language';

-- ----------------------------
-- Table structure for yiiad_user
-- ----------------------------
DROP TABLE IF EXISTS `yiiad_user`;
CREATE TABLE `yiiad_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `user_name` varchar(30) NOT NULL COMMENT '用户登录名',
  `user_pwd` varchar(16) DEFAULT NULL COMMENT '用户密码',
  `salt` char(4) NOT NULL COMMENT '注册和修改密码时加密后缀,md5(user_pwd,salt)生成user_pwd_hash',
  `user_pwd_hash` char(32) NOT NULL COMMENT '用户密码hash',
  `user_email` varchar(255) DEFAULT NULL COMMENT '用户邮箱',
  `email_code` varchar(255) DEFAULT NULL COMMENT '邮箱激活需要的code',
  `user_email_status` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '邮箱激活状态，可能会用于激活账号；0:未激活;1:激活;',
  `user_phonenum` tinyint(11) unsigned DEFAULT NULL COMMENT '用户手机号',
  `user_phone_status` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '手机激活状态;0:未激活;1:激活',
  `is_status` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '用户状态，需激活；0:未激活;1:激活;',
  `user_nickname` varchar(30) DEFAULT NULL COMMENT '用户昵称',
  `user_realname` varchar(15) DEFAULT NULL COMMENT '用户真实姓名',
  `user_sex` int(2) unsigned NOT NULL DEFAULT '0' COMMENT '性别外键；对应一张性别表user_sex，后台可以增加个系统管理来管理，模仿facebook',
  `user_location` varchar(255) DEFAULT NULL COMMENT '用户所在地，准备用json格式',
  `user_emotional_state` int(2) unsigned NOT NULL DEFAULT '0' COMMENT '感情状况；与性别的信息表一起，待定表名user_emotional_state',
  `user_birthday` tinyint(10) unsigned DEFAULT NULL COMMENT '用户生日',
  `user_blood_type` int(2) unsigned NOT NULL DEFAULT '0' COMMENT '1:A;2:B;3:AB;4:O;',
  `user_introduction` text COMMENT '用户简介',
  `user_qq` tinyint(15) unsigned NOT NULL DEFAULT '0' COMMENT '用户qq',
  `user_img` varchar(255) NOT NULL DEFAULT '../../preloader/preloader_002_64.gif' COMMENT '用户头像，会有注册时默认设置的',
  `user_creatime` tinyint(10) unsigned NOT NULL COMMENT '用户注册时间',
  `user_updatime` tinyint(10) unsigned NOT NULL COMMENT '用户上次修改资料时间',
  `login_ip` varchar(20) DEFAULT NULL COMMENT '上次登录ip',
  `login_time` tinyint(10) unsigned DEFAULT NULL COMMENT '上次登录时间',
  `is_delete` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否被用户删除；0:未被删除;1:已删除;',
  `user_education_id` text COMMENT '暂定user_education表中，自己教育信息的id的json，查询比较快',
  `user_job_id` text COMMENT '暂定user_job中个人职业信息id的json，查询比较快',
  `user_tag_id` varchar(255) DEFAULT NULL COMMENT '暂定user_tags中个人标签id的json，查询比较快，上限数量暂定5个',
  `user_shipping_address` varchar(255) DEFAULT NULL COMMENT '暂定user_shipping_address表中个人收货地址的id的json，查询比较快',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='前台用户表';
