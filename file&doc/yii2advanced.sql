/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : yii2advanced

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-05-21 19:43:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yiiad_log
-- ----------------------------
DROP TABLE IF EXISTS `yiiad_log`;
CREATE TABLE `yiiad_log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '日志自增编号',
  `level` int(11) DEFAULT NULL COMMENT '日志等级',
  `category` varchar(255) DEFAULT NULL COMMENT '调用方法',
  `log_time` double DEFAULT NULL COMMENT '记录时间',
  `prefix` text COMMENT '日志前缀',
  `message` text COMMENT '日志',
  PRIMARY KEY (`id`),
  KEY `idx_log_level` (`level`),
  KEY `idx_log_category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COMMENT='日志表';

-- ----------------------------
-- Table structure for yiiad_message
-- ----------------------------
DROP TABLE IF EXISTS `yiiad_message`;
CREATE TABLE `yiiad_message` (
  `id` int(11) NOT NULL COMMENT 'source_message表自增id外键',
  `language` varchar(16) NOT NULL COMMENT 'language设置',
  `translation` text COMMENT '根据语种被翻译成的内容',
  PRIMARY KEY (`id`,`language`),
  CONSTRAINT `fk_message_source_message` FOREIGN KEY (`id`) REFERENCES `yiiad_source_message` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='关联到source_message表被翻译成的内容表';

-- ----------------------------
-- Table structure for yiiad_source_message
-- ----------------------------
DROP TABLE IF EXISTS `yiiad_source_message`;
CREATE TABLE `yiiad_source_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `category` varchar(255) DEFAULT NULL COMMENT '语言国际化分类,初始是lang',
  `message` text COMMENT '源语言内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='国际化源语言内容';

-- ----------------------------
-- Table structure for yiiad_user
-- ----------------------------
DROP TABLE IF EXISTS `yiiad_user`;
CREATE TABLE `yiiad_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `user_name` varchar(30) NOT NULL COMMENT '用户登录名',
  `user_pwd` varchar(16) DEFAULT NULL COMMENT '用户密码，文档显示只读，在此暂留作明文密码调试',
  `salt` char(4) DEFAULT NULL COMMENT '注册和修改密码时加密后缀,md5(user_pwd,salt)生成user_pwd_hash',
  `user_pwd_hash` char(60) NOT NULL COMMENT '用户密码hash',
  `user_pwd_reset_token` varchar(50) DEFAULT NULL COMMENT '密码重置token',
  `auth_key` char(32) NOT NULL COMMENT '用于自动登录验证',
  `user_email` varchar(255) DEFAULT NULL COMMENT '用户邮箱',
  `user_email_activate_token` varchar(255) DEFAULT NULL COMMENT '邮箱激活需要的token',
  `user_email_status` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '邮箱激活状态，可能会用于激活账号；0:未激活;1:激活;',
  `user_phonenum` tinyint(11) unsigned DEFAULT NULL COMMENT '用户手机号',
  `user_phone_activate_token` int(6) unsigned DEFAULT NULL COMMENT '手机激活码',
  `user_phone_status` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '手机激活状态;0:未激活;1:激活',
  `is_status` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '用户状态，需激活；0:未激活;1:激活;',
  `user_nickname` varchar(30) DEFAULT NULL COMMENT '用户昵称',
  `user_realname` varchar(15) DEFAULT NULL COMMENT '用户真实姓名',
  `user_sex` int(2) unsigned NOT NULL DEFAULT '0' COMMENT '性别外键；对应一张性别表user_sex，后台可以增加个系统管理来管理，模仿facebook',
  `user_location` varchar(255) DEFAULT NULL COMMENT '用户所在地，准备用json格式',
  `user_emotional_state` int(2) unsigned NOT NULL DEFAULT '0' COMMENT '感情状况；待定表名user_emotional_state',
  `user_birthday` tinyint(10) unsigned DEFAULT NULL COMMENT '用户生日',
  `user_blood_type` int(2) unsigned NOT NULL DEFAULT '0' COMMENT '1:A;2:B;3:AB;4:O;',
  `user_introduction` text COMMENT '用户简介',
  `user_qq` tinyint(15) unsigned NOT NULL DEFAULT '0' COMMENT '用户qq',
  `user_img` varchar(255) NOT NULL DEFAULT '../../preloader/preloader_002_64.gif' COMMENT '用户头像，会有注册时默认设置的',
  `create_time` tinyint(10) unsigned NOT NULL COMMENT '用户注册时间',
  `update_time` tinyint(10) unsigned NOT NULL COMMENT '用户上次修改资料时间',
  `login_ip` varchar(20) DEFAULT NULL COMMENT '上次登录ip',
  `login_time` tinyint(10) unsigned DEFAULT NULL COMMENT '上次登录时间',
  `is_delete` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '用户是否注销；0:未注销;1:注销;',
  `is_forbidden` int(1) unsigned NOT NULL COMMENT '是否被管理员禁用;0:未禁用;1:禁用;',
  `user_education_id` text COMMENT '暂定user_education表中，自己教育信息的id的json，查询比较快',
  `user_job_id` text COMMENT '暂定user_job中个人职业信息id的json，查询比较快',
  `user_tag_id` varchar(255) DEFAULT NULL COMMENT '暂定user_tags中个人标签id的json，查询比较快，上限数量暂定5个',
  `user_shipping_address` varchar(255) DEFAULT NULL COMMENT '暂定user_shipping_address表中个人收货地址的id的json，查询比较快',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='前台用户表';
