/*
Navicat MySQL Data Transfer

Source Server         : ceh-cms
Source Server Version : 50709
Source Host           : 120.24.187.47:21011
Source Database       : ceh-cms

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2018-05-16 10:30:59
*/

SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `user_info_tab`;
CREATE TABLE `user_info_tab` (
  `user_id` varchar(64) NOT NULL COMMENT '用户ID',
  `company_id` varchar(64) NOT NULL COMMENT '公司ID',
  `login_id` varchar(64) NOT NULL COMMENT '用户名',
  `role_id` varchar(64) NOT NULL COMMENT '角色ID',
  `name` varchar(128) NOT NULL COMMENT '姓名',
  `sex` tinyint(1) DEFAULT NULL COMMENT '性别',
  `mobile` varchar(20) NOT NULL COMMENT '手机号码',
  `email` varchar(64) NOT NULL COMMENT '邮箱',
  `address` varchar(256) DEFAULT NULL COMMENT '通信地址',
  `reg_time` timestamp NOT NULL COMMENT '注册时间',
  `flag` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:启用;1:停用',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户信息表';

DROP TABLE IF EXISTS `company_info_tab`;
CREATE TABLE `company_info_tab` (
  `company_id` varchar(64) NOT NULL COMMENT '公司ID',
  `company_name` varchar(100) NOT NULL COMMENT '公司名称',
  `address` varchar(256) DEFAULT NULL COMMENT '公司地址',
  `company_web` varchar(100) DEFAULT "" COMMENT '公司主页',
  `link_man` varchar(20) DEFAULT "" COMMENT '公司联系人',
  `tel` varchar(20) DEFAULT NULL COMMENT '公司号码',
  `business_license` varchar(200) DEFAULT NULL COMMENT '公司营业执照',
  `check` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:初始化;1:审核通过;2:审核未通过;',
  `reason` varchar(256) NOT NULL DEFAULT '' COMMENT '审核未通过原因',
  `reg_time` timestamp NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  COMMENT='公司信息表';

-- ----------------------------
-- Table structure for material_tab
-- ----------------------------
DROP TABLE IF EXISTS `material_text_tab`;
CREATE TABLE `material_text_tab` (
  `material_id` varchar(64) NOT NULL COMMENT '素材ID',
  `company_id` varchar(64) NOT NULL COMMENT '公司ID',
  `user_id` varchar(64) NOT NULL COMMENT '用户ID',
  `material_name` varchar(32) NOT NULL DEFAULT '' COMMENT '素材名称',
  `material_brief` varchar(256) NOT NULL DEFAULT '' COMMENT '素材摘要',
  `content` text NOT NULL  COMMENT '素材内容',
  `create_time` timestamp NOT NULL COMMENT '创建时间',
  `update_time` timestamp NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`material_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文字素材表';

DROP TABLE IF EXISTS `material_h5_tab`;
CREATE TABLE `material_h5_tab` (
  `material_id` varchar(64) NOT NULL COMMENT '素材ID',
  `company_id` varchar(64) NOT NULL COMMENT '公司ID',
  `user_id` varchar(64) NOT NULL COMMENT '用户ID',
  `material_name` varchar(32) NOT NULL DEFAULT '' COMMENT '素材名称',
  `material_brief` varchar(256) NOT NULL DEFAULT '' COMMENT '素材摘要',
  `content` varchar(256) NOT NULL DEFAULT '' COMMENT '素材内容',
  `create_time` timestamp NOT NULL COMMENT '创建时间',
  `update_time` timestamp NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`material_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='h5素材表';

DROP TABLE IF EXISTS `material_pic_tab`;
CREATE TABLE `material_pic_tab` (
  `material_id` varchar(64) NOT NULL COMMENT '素材ID',
  `company_id` varchar(64) NOT NULL COMMENT '公司ID',
  `user_id` varchar(64) NOT NULL COMMENT '用户ID',
  `material_name` varchar(32) NOT NULL DEFAULT '' COMMENT '素材名称' ,
  `material_brief` varchar(256) NOT NULL DEFAULT '素材摘要',
  `content` varchar(256) NOT NULL DEFAULT '' COMMENT '素材内容',
  `file_name` varchar(256) NOT NULL DEFAULT '' COMMENT '本地文件路径',
  `short_url` varchar(256) NOT NULL DEFAULT  '' COMMENT '短URL',
  `flag` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:初始化;1:发布成功;2:发布失败;3:素材删除',
  `reason` varchar(256) NOT NULL DEFAULT '' COMMENT '失败原因',
  `create_time` timestamp NOT NULL COMMENT '创建时间',
  `update_time` timestamp NOT NULL COMMENT '更新时间',
  `publish_time` timestamp NOT NULL COMMENT '发布时间',
  PRIMARY KEY (`material_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='图片素材表';

DROP TABLE IF EXISTS `material_video_tab`;
CREATE TABLE `material_video_tab` (
  `material_id` varchar(64) NOT NULL COMMENT '素材ID',
  `company_id` varchar(64) NOT NULL COMMENT '公司ID',
  `user_id` varchar(64) NOT NULL COMMENT '用户ID',
  `material_name` varchar(32) NOT NULL DEFAULT '' COMMENT '素材名称',
  `material_brief` varchar(256) NOT NULL DEFAULT '' COMMENT '素材摘要',
  `content` varchar(256) NOT NULL DEFAULT '' COMMENT '素材内容',
  `file_name` varchar(256) NOT NULL DEFAULT  '' COMMENT '本地文件路径',
  `short_url` varchar(256) NOT NULL DEFAULT  '' COMMENT '短URL',
  `flag` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:初始化;1:发布成功;2:发布失败;3:素材删除',
  `reason` varchar(256) NOT NULL DEFAULT '' COMMENT '失败原因',
  `create_time` timestamp NOT NULL COMMENT '创建时间',
  `update_time` timestamp NOT NULL COMMENT '更新时间',
  `publish_time` timestamp NOT NULL COMMENT '发布时间',
  PRIMARY KEY (`material_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8  COMMENT='视频素材表';

DROP TABLE IF EXISTS `model_sms_tab`;
CREATE TABLE `model_sms_tab` (
  `model_id` varchar(64) NOT NULL COMMENT '模板ID',
  `company_id` varchar(64) NOT NULL COMMENT '公司ID',
  `user_id` varchar(64) NOT NULL COMMENT '用户ID',
  `model_name` varchar(32) NOT NULL DEFAULT '' COMMENT '模板名称',
  `content` text NOT NULL  COMMENT '模板内容',
  `create_time` timestamp NOT NULL COMMENT '创建时间',
  `update_time` timestamp NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`model_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8  COMMENT='短信模板表';

DROP TABLE IF EXISTS `model_mail_tab`;
CREATE TABLE `model_mail_tab` (
  `model_id` varchar(64) NOT NULL COMMENT '模板ID',
  `company_id` varchar(64) NOT NULL COMMENT '公司ID',
  `user_id` varchar(64) NOT NULL COMMENT '用户ID',
  `model_name` varchar(32) NOT NULL DEFAULT '' COMMENT '模板名称',
  `content` text NOT NULL  COMMENT '模板内容',
  `create_time` timestamp NOT NULL COMMENT '创建时间',
  `update_time` timestamp NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`model_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8  COMMENT='邮件模板表';

DROP TABLE IF EXISTS `model_weixin_tab`;
CREATE TABLE `model_weixin_tab` (
  `model_id` varchar(64) NOT NULL COMMENT '模板ID',
  `company_id` varchar(64) NOT NULL COMMENT '公司ID',
  `user_id` varchar(64) NOT NULL COMMENT '用户ID',
  `model_name` varchar(32) NOT NULL DEFAULT '' COMMENT '模板名称',
  `content` text NOT NULL  COMMENT '模板内容',
  `flag` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:初始化;1:发布成功;2:发布失败;3:素材删除',
  `reason` varchar(256) NOT NULL DEFAULT '' COMMENT '失败原因',
  `create_time` timestamp NOT NULL COMMENT '创建时间',
  `update_time` timestamp NOT NULL COMMENT '更新时间',
  `publish_time` timestamp NOT NULL COMMENT '发布时间',
  PRIMARY KEY (`model_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8  COMMENT='微信模板表';

DROP TABLE IF EXISTS `authority_info_tab`;
CREATE TABLE `authority_info_tab` (
  `authority_id` varchar(64) NOT NULL COMMENT '权限ID',
  `authority_des` varchar(128) NOT NULL COMMENT '权限说明',
  `module` varchar(128) NOT NULL COMMENT '模块',
  `controller` varchar(128) NOT NULL COMMENT 'controller',
  `action` varchar(128) NOT NULL COMMENT 'action',
  `create_time` timestamp NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`authority_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限信息表';

DROP TABLE IF EXISTS `role_authority_tab`;
CREATE TABLE `role_authority_tab` (
  `role_id` varchar(64) NOT NULL COMMENT '角色ID',
  `authority_id` varchar(64) NOT NULL COMMENT '权限ID',
  `create_time` timestamp NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`authority_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色与权限关系表';

DROP TABLE IF EXISTS `role_info_tab`;
CREATE TABLE `role_info_tab` (
  `role_id` varchar(64) NOT NULL COMMENT '角色ID',
  `role_name` varchar(64) NOT NULL COMMENT '角色名称',
  `role_des` varchar(128) NOT NULL COMMENT '角色说明',
  `create_time` timestamp NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色信息表';

