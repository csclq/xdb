/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50718
Source Host           : localhost:3306
Source Database       : gxc

Target Server Type    : MYSQL
Target Server Version : 50718
File Encoding         : 65001

Date: 2017-05-09 10:23:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for xdb_category
-- ----------------------------
DROP TABLE IF EXISTS `xdb_category`;
CREATE TABLE `xdb_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `uniacid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for xdb_comment
-- ----------------------------
DROP TABLE IF EXISTS `xdb_comment`;
CREATE TABLE `xdb_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `star` tinyint(3) unsigned NOT NULL DEFAULT '5',
  `comment` text,
  `openid` char(30) DEFAULT '',
  `nickname` varchar(60) DEFAULT NULL,
  `add_ip` char(16) DEFAULT '',
  `add_time` int(11) unsigned DEFAULT NULL,
  `praise` smallint(6) unsigned DEFAULT '0',
  `oid` int(10) unsigned DEFAULT '0',
  `img` text,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `oid` (`oid`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for xdb_member
-- ----------------------------
DROP TABLE IF EXISTS `xdb_member`;
CREATE TABLE `xdb_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `openid` char(28) NOT NULL,
  `nickname` varchar(50) DEFAULT '',
  `add_at` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `openid` (`openid`),
  KEY `add_at` (`add_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for xdb_order
-- ----------------------------
DROP TABLE IF EXISTS `xdb_order`;
CREATE TABLE `xdb_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `openid` varchar(100) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `unit_price` decimal(10,2) unsigned NOT NULL,
  `quantity` tinyint(3) unsigned NOT NULL,
  `fullname` varchar(10) NOT NULL,
  `province` varchar(40) NOT NULL,
  `city` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `postcode` varchar(6) NOT NULL DEFAULT '',
  `mobile` varchar(11) NOT NULL,
  `split_number` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `submitted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `express_courier` varchar(10) DEFAULT NULL,
  `express_no` varchar(30) DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `message` varchar(300) DEFAULT NULL,
  `uniacid` varchar(100) NOT NULL DEFAULT '0',
  `last_id` int(11) DEFAULT '0',
  `paid` varchar(255) DEFAULT '',
  `send` varchar(255) DEFAULT '',
  `request` varchar(255) DEFAULT '',
  `active` tinyint(2) unsigned DEFAULT '0',
  `product_detail` text,
  `output` tinyint(2) unsigned DEFAULT '0',
  `hit_number` int(10) unsigned DEFAULT '0',
  `buy_number` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1554 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for xdb_order_hit
-- ----------------------------
DROP TABLE IF EXISTS `xdb_order_hit`;
CREATE TABLE `xdb_order_hit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned DEFAULT NULL,
  `order_openid` char(28) DEFAULT NULL,
  `openid` char(28) DEFAULT NULL,
  `add_at` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `openid` (`openid`),
  KEY `order_openid` (`order_openid`),
  KEY `order_openid_2` (`order_openid`,`openid`),
  CONSTRAINT `xdb_order_hit_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `xdb_order` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for xdb_order_payment
-- ----------------------------
DROP TABLE IF EXISTS `xdb_order_payment`;
CREATE TABLE `xdb_order_payment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `paid` decimal(10,2) NOT NULL DEFAULT '0.00',
  `refunded` decimal(10,2) NOT NULL DEFAULT '0.00',
  `paid_at` timestamp NULL DEFAULT NULL,
  `refunded_at` timestamp NULL DEFAULT NULL,
  `refund_applied` tinyint(1) NOT NULL DEFAULT '0',
  `refund_applied_at` timestamp NULL DEFAULT NULL,
  `last_id` int(11) DEFAULT '0',
  `goods_id` int(11) DEFAULT '0',
  `status` tinyint(2) DEFAULT '0',
  `express_courier` varchar(50) DEFAULT '' COMMENT '快递名称',
  `express_no` varchar(100) DEFAULT '' COMMENT '快递号',
  `send_id` int(11) DEFAULT '0',
  `send_time` int(11) unsigned DEFAULT '0',
  `myid` int(10) unsigned DEFAULT '0',
  `expire` tinyint(2) unsigned DEFAULT '0',
  `posit` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2560 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for xdb_product
-- ----------------------------
DROP TABLE IF EXISTS `xdb_product`;
CREATE TABLE `xdb_product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` varchar(20) DEFAULT NULL COMMENT '商品自编号',
  `pic_url` varchar(255) DEFAULT NULL,
  `price` decimal(6,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `on_sale` tinyint(1) NOT NULL DEFAULT '1',
  `num_sold` int(10) unsigned NOT NULL DEFAULT '0',
  `description` text,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `uniacid` varchar(100) NOT NULL DEFAULT '1',
  `select_count` int(11) DEFAULT '0',
  `sale_count` int(11) DEFAULT '0',
  `send_count` int(11) DEFAULT '0',
  `sort` int(11) DEFAULT '0',
  `hot` tinyint(2) DEFAULT '0',
  `new` tinyint(2) DEFAULT '0',
  `fashion` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `hot` (`hot`),
  KEY `new` (`new`),
  KEY `fashion` (`fashion`)
) ENGINE=MyISAM AUTO_INCREMENT=285 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for xdb_repository
-- ----------------------------
DROP TABLE IF EXISTS `xdb_repository`;
CREATE TABLE `xdb_repository` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL DEFAULT '0',
  `measure` varchar(70) DEFAULT '',
  `color` varchar(70) DEFAULT '',
  `price` decimal(10,2) DEFAULT '0.00',
  `type` tinyint(2) unsigned DEFAULT '1',
  `number` int(10) unsigned DEFAULT '1',
  `inventory` int(11) unsigned DEFAULT '0',
  `add_time` int(11) unsigned DEFAULT '0',
  `add_ip` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `product_id_2` (`product_id`,`measure`),
  KEY `product_id_3` (`product_id`,`color`),
  KEY `product_id_4` (`product_id`,`measure`,`color`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for xdb_specification
-- ----------------------------
DROP TABLE IF EXISTS `xdb_specification`;
CREATE TABLE `xdb_specification` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `value` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for xdb_star_rule
-- ----------------------------
DROP TABLE IF EXISTS `xdb_star_rule`;
CREATE TABLE `xdb_star_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hit_number` int(11) DEFAULT NULL,
  `buy_number` int(11) DEFAULT NULL,
  `star` tinyint(4) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `star` (`star`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for yzt_admin
-- ----------------------------
DROP TABLE IF EXISTS `yzt_admin`;
CREATE TABLE `yzt_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `role_id` int(10) unsigned DEFAULT '1' COMMENT '角色ID',
  `merchant_id` int(10) unsigned DEFAULT '0' COMMENT '商家ID',
  `realname` varchar(20) DEFAULT '' COMMENT '真实姓名',
  `phone` varchar(20) DEFAULT '' COMMENT '电话',
  `integral` int(10) unsigned DEFAULT '0' COMMENT '积分',
  `add_at` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  `add_ip` char(16) DEFAULT NULL COMMENT '添加IP',
  `update_at` int(11) unsigned DEFAULT NULL COMMENT '最后修改时间',
  `active` tinyint(1) unsigned DEFAULT '1' COMMENT '是否有效',
  PRIMARY KEY (`id`),
  KEY `merchant_id` (`merchant_id`),
  KEY `role_id` (`role_id`),
  KEY `active` (`active`),
  CONSTRAINT `yzt_admin_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `yzt_role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for yzt_app
-- ----------------------------
DROP TABLE IF EXISTS `yzt_app`;
CREATE TABLE `yzt_app` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '' COMMENT '分类名称',
  `remark` varchar(255) DEFAULT '' COMMENT '分类描述',
  `pid` int(11) DEFAULT '0' COMMENT '父级ID',
  `level` tinyint(4) DEFAULT '1' COMMENT '分类级别',
  `img` varchar(255) DEFAULT '' COMMENT '小图标',
  `color` varchar(10) DEFAULT '' COMMENT '颜色',
  `active` tinyint(4) DEFAULT '1' COMMENT '是否有效',
  `show` tinyint(2) DEFAULT '1' COMMENT '是否显示',
  `add_time` int(10) unsigned DEFAULT '0',
  `add_ip` char(16) DEFAULT '',
  `update_time` int(10) unsigned DEFAULT '0',
  `update_ip` char(16) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8 COMMENT='应用';

-- ----------------------------
-- Table structure for yzt_area
-- ----------------------------
DROP TABLE IF EXISTS `yzt_area`;
CREATE TABLE `yzt_area` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL COMMENT '名称',
  `level` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '1：省，2：市，3：区',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `spell` varchar(20) DEFAULT '' COMMENT '拼音(简拼)',
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `parent_id` (`parent_id`),
  KEY `spell` (`spell`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='省市区';

-- ----------------------------
-- Table structure for yzt_article
-- ----------------------------
DROP TABLE IF EXISTS `yzt_article`;
CREATE TABLE `yzt_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text,
  `user_id` int(10) unsigned DEFAULT NULL,
  `label` varchar(200) DEFAULT '',
  `describ` varchar(200) DEFAULT '',
  `sort` tinyint(4) DEFAULT '0',
  `add_at` int(11) unsigned DEFAULT NULL,
  `update_at` int(11) unsigned DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `sort` (`sort`),
  KEY `active` (`active`),
  FULLTEXT KEY `title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for yzt_auth
-- ----------------------------
DROP TABLE IF EXISTS `yzt_auth`;
CREATE TABLE `yzt_auth` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned DEFAULT NULL,
  `app_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `app_id` (`app_id`),
  CONSTRAINT `yzt_auth_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `yzt_role` (`id`),
  CONSTRAINT `yzt_auth_ibfk_2` FOREIGN KEY (`app_id`) REFERENCES `yzt_app` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=236 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for yzt_error
-- ----------------------------
DROP TABLE IF EXISTS `yzt_error`;
CREATE TABLE `yzt_error` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` char(255) DEFAULT '' COMMENT '内容',
  `add_at` int(11) unsigned DEFAULT NULL COMMENT '发生时间',
  `namespace` varchar(60) DEFAULT '' COMMENT '命名空间',
  `module` varchar(20) DEFAULT '' COMMENT '模块',
  `controller` varchar(20) DEFAULT '' COMMENT '控制器',
  `action` varchar(20) DEFAULT '' COMMENT '方法',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for yzt_gxc_apply_partner
-- ----------------------------
DROP TABLE IF EXISTS `yzt_gxc_apply_partner`;
CREATE TABLE `yzt_gxc_apply_partner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  `identity_card` char(18) NOT NULL DEFAULT '' COMMENT '身份证号',
  `phone` int(11) unsigned NOT NULL COMMENT '手机号',
  `level` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '1:县（区）代，2:市代,3:省代',
  `recommend_cardsn` varchar(20) NOT NULL DEFAULT '' COMMENT '推荐人卡号',
  `province` smallint(6) DEFAULT NULL,
  `city` smallint(6) DEFAULT NULL,
  `area` smallint(6) DEFAULT NULL,
  `money` int(11) unsigned DEFAULT NULL COMMENT '入股金额',
  `bank` varchar(20) DEFAULT '' COMMENT '开户行',
  `add_at` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  `update_at` int(11) unsigned DEFAULT NULL COMMENT '最后修改时间',
  `status` tinyint(2) unsigned DEFAULT '1' COMMENT '状态,0:审核不通过，1：待审核 ，2：审核通过',
  `verify_at` int(11) unsigned DEFAULT NULL COMMENT '审核时间',
  `verify_user` varchar(40) DEFAULT NULL COMMENT '审核人',
  `verify_content` char(255) DEFAULT '' COMMENT '审核回复内容',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='申请成为合伙人';

-- ----------------------------
-- Table structure for yzt_gxc_love_story
-- ----------------------------
DROP TABLE IF EXISTS `yzt_gxc_love_story`;
CREATE TABLE `yzt_gxc_love_story` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `content` text COMMENT '内容',
  `keyword` varchar(255) DEFAULT '' COMMENT '搜索关键词',
  `brief` varchar(255) DEFAULT '' COMMENT '简介',
  `praise` int(10) unsigned DEFAULT '0' COMMENT '点赞数',
  `trample` int(10) unsigned DEFAULT '0' COMMENT '踩踏数',
  `add_at` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  `update_at` int(11) unsigned DEFAULT NULL COMMENT '最后修改时间',
  `verify_at` int(11) unsigned DEFAULT NULL COMMENT '审核时间',
  `verify_uid` int(10) unsigned DEFAULT NULL COMMENT '审核者UID',
  `active` tinyint(2) unsigned DEFAULT '0' COMMENT '是否有效',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `title` (`title`),
  KEY `active` (`active`),
  FULLTEXT KEY `keyword` (`keyword`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='爱心故事';

-- ----------------------------
-- Table structure for yzt_gxc_love_story_praise
-- ----------------------------
DROP TABLE IF EXISTS `yzt_gxc_love_story_praise`;
CREATE TABLE `yzt_gxc_love_story_praise` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(10) unsigned DEFAULT NULL COMMENT '爱心故事ID',
  `user_id` int(10) unsigned DEFAULT NULL COMMENT '用户ID',
  `praise` tinyint(1) unsigned DEFAULT '0' COMMENT '点赞',
  `trample` tinyint(1) unsigned DEFAULT '0' COMMENT '踩踏',
  `add_at` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  `add_ip` char(16) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='爱心故事点赞';

-- ----------------------------
-- Table structure for yzt_gxc_partner
-- ----------------------------
DROP TABLE IF EXISTS `yzt_gxc_partner`;
CREATE TABLE `yzt_gxc_partner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `merchant_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `money` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned DEFAULT '1' COMMENT '状态,0:审核失败,1:审核中，2：已审核',
  `add_at` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  `verify_at` int(11) unsigned DEFAULT NULL COMMENT '审核时间',
  `verify_user` varchar(40) DEFAULT '' COMMENT '审核者',
  `verify_content` varchar(255) DEFAULT '' COMMENT '审核回复内容',
  PRIMARY KEY (`id`),
  KEY `merchant_id` (`merchant_id`),
  KEY `user_id` (`user_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='审请成功股东';

-- ----------------------------
-- Table structure for yzt_gxc_publish
-- ----------------------------
DROP TABLE IF EXISTS `yzt_gxc_publish`;
CREATE TABLE `yzt_gxc_publish` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `content` text NOT NULL,
  `type` tinyint(4) unsigned DEFAULT '10' COMMENT '1：需求，2：项目',
  `brief` varchar(255) DEFAULT '' COMMENT '简介',
  `label` varchar(255) DEFAULT '' COMMENT '标签',
  `money` decimal(8,2) DEFAULT '0.00' COMMENT '价格',
  `praise` int(11) unsigned DEFAULT '0' COMMENT '点赞数',
  `active` tinyint(2) unsigned DEFAULT '0' COMMENT '是否有效',
  `add_at` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  `update_at` int(11) unsigned DEFAULT NULL COMMENT '最后更新时间',
  `verify_at` int(11) unsigned DEFAULT NULL COMMENT '审核 时间',
  `verify_uid` int(11) unsigned DEFAULT NULL COMMENT '审核者UID',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `type` (`type`),
  KEY `active` (`active`),
  FULLTEXT KEY `label` (`label`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for yzt_gxc_publish_praise
-- ----------------------------
DROP TABLE IF EXISTS `yzt_gxc_publish_praise`;
CREATE TABLE `yzt_gxc_publish_praise` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(10) unsigned DEFAULT NULL COMMENT '项目ID',
  `user_id` int(10) unsigned DEFAULT NULL COMMENT '用户UID',
  `add_at` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  `praise` tinyint(2) unsigned DEFAULT '1' COMMENT '点赞',
  `add_ip` char(16) DEFAULT NULL COMMENT '添加IP',
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for yzt_gxc_repast
-- ----------------------------
DROP TABLE IF EXISTS `yzt_gxc_repast`;
CREATE TABLE `yzt_gxc_repast` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `repast_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `cate_id` smallint(6) NOT NULL COMMENT '类型ID',
  `cate_secid` smallint(6) unsigned NOT NULL COMMENT '二级分类ID',
  `name` varchar(60) NOT NULL DEFAULT '' COMMENT '商品名称',
  `price` decimal(8,2) DEFAULT '0.00' COMMENT '单价',
  `memb_price` decimal(8,2) DEFAULT '0.00' COMMENT '会员价格',
  `shop_price` decimal(8,2) DEFAULT '0.00' COMMENT '本店价格',
  `privilege_price` decimal(8,2) DEFAULT '0.00' COMMENT '优惠价',
  `discount` tinyint(3) unsigned DEFAULT '0' COMMENT '折扣',
  `keyword` varchar(255) DEFAULT '' COMMENT '关键词搜索',
  `img` varchar(255) DEFAULT '' COMMENT '图片',
  `sort` tinyint(4) unsigned DEFAULT '0' COMMENT '排序,越大越前',
  `is_hot` tinyint(1) unsigned DEFAULT '0' COMMENT '是否热买',
  `is_recommend` tinyint(1) unsigned DEFAULT '0' COMMENT '是否推荐',
  `is_new` tinyint(1) unsigned DEFAULT '0' COMMENT '是否新款',
  `label` varchar(255) DEFAULT '' COMMENT '标签',
  `add_at` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  `update_at` int(11) unsigned DEFAULT NULL COMMENT '最后修改时间',
  `active` tinyint(1) unsigned DEFAULT '1',
  `describe` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `cate_id` (`cate_id`),
  KEY `cate_secid` (`cate_secid`),
  KEY `is_hot` (`is_hot`),
  KEY `is_recommend` (`is_recommend`),
  KEY `is_new` (`is_new`),
  KEY `active` (`active`),
  KEY `sort` (`sort`),
  KEY `repast_id` (`repast_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `yzt_gxc_repast_ibfk_1` FOREIGN KEY (`repast_id`) REFERENCES `yzt_merchant_repast` (`id`),
  CONSTRAINT `yzt_gxc_repast_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `yzt_gxc_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='餐饮';

-- ----------------------------
-- Table structure for yzt_gxc_repast_cate
-- ----------------------------
DROP TABLE IF EXISTS `yzt_gxc_repast_cate`;
CREATE TABLE `yzt_gxc_repast_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL DEFAULT '' COMMENT '分类名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for yzt_gxc_user
-- ----------------------------
DROP TABLE IF EXISTS `yzt_gxc_user`;
CREATE TABLE `yzt_gxc_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(100) NOT NULL DEFAULT '' COMMENT '用户昵称',
  `realname` varchar(20) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `username` varchar(50) DEFAULT NULL COMMENT '注册用户名',
  `openid` char(28) DEFAULT '' COMMENT '微信OPENID',
  `phone` int(11) unsigned DEFAULT '0' COMMENT '手机',
  `qq` varchar(20) DEFAULT '' COMMENT 'QQ号',
  `qq_openid` varchar(32) DEFAULT '' COMMENT 'QQ登录openid',
  `passwd` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `salt` char(32) DEFAULT '' COMMENT '加密盐值',
  `avatar` varchar(255) NOT NULL DEFAULT '' COMMENT '微信头像',
  `sex` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '性别',
  `province` varchar(20) NOT NULL DEFAULT '' COMMENT '省',
  `city` varchar(20) NOT NULL DEFAULT '' COMMENT '市',
  `area` varchar(30) NOT NULL DEFAULT '' COMMENT '区',
  `address` varchar(200) DEFAULT '' COMMENT '地址',
  `cardsn` varchar(12) DEFAULT '' COMMENT '卡号',
  `recommend` int(11) DEFAULT '0' COMMENT '推荐人ID',
  `level` tinyint(3) unsigned DEFAULT '0' COMMENT '级别',
  `groupid` smallint(5) unsigned DEFAULT '0' COMMENT '用户群组',
  `vip` tinyint(4) DEFAULT '0' COMMENT 'VIP',
  `add_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间戳',
  `active` tinyint(3) unsigned DEFAULT '1' COMMENT '是否有效',
  `integral` int(10) unsigned DEFAULT '0' COMMENT '积分',
  `partner` tinyint(2) unsigned DEFAULT '0' COMMENT '合伙人,0:否,1:普通合伙人,2:高级合伙人',
  `partner_type` tinyint(2) unsigned DEFAULT '0' COMMENT '合伙人等级 1:县（区）代，2:市代,3:省代',
  `money` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '金额',
  `update_at` int(11) unsigned DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `openid` (`openid`),
  UNIQUE KEY `username` (`username`),
  KEY `active` (`active`),
  KEY `recommend` (`recommend`),
  KEY `phone` (`phone`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户';

-- ----------------------------
-- Table structure for yzt_gxc_userinfo
-- ----------------------------
DROP TABLE IF EXISTS `yzt_gxc_userinfo`;
CREATE TABLE `yzt_gxc_userinfo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `identity_no` char(18) DEFAULT '' COMMENT '身份证号',
  `identity_front` varchar(200) DEFAULT '' COMMENT '身份证正面照',
  `identity_back` varchar(200) DEFAULT '' COMMENT '身份证背面照',
  `recommend_pic` varchar(200) DEFAULT '' COMMENT '推荐分享图片',
  `recommend_mediaid` varchar(200) DEFAULT '' COMMENT '推荐分享图的mediaid',
  `mediaid_time` int(11) unsigned DEFAULT NULL COMMENT '推荐分享图mediaid的生成时间',
  `bank_name` varchar(20) DEFAULT '' COMMENT '银行名称',
  `bank_province` varchar(20) DEFAULT '' COMMENT '开户行省份',
  `bank_city` varchar(20) DEFAULT '' COMMENT '开户行市',
  `bank_deposit` varchar(40) DEFAULT NULL COMMENT '开户行名称',
  `bank_code` varchar(20) DEFAULT '' COMMENT '开户行卡号',
  `alipay_code` varchar(50) DEFAULT '' COMMENT '支付宝帐号',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for yzt_integral
-- ----------------------------
DROP TABLE IF EXISTS `yzt_integral`;
CREATE TABLE `yzt_integral` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  `integral` int(10) NOT NULL DEFAULT '1' COMMENT '积分变动数',
  `event_id` int(10) unsigned DEFAULT '0' COMMENT '事件ID',
  `type` tinyint(4) unsigned DEFAULT '0' COMMENT '类型',
  `remark` varchar(255) DEFAULT '' COMMENT '备注',
  `money` decimal(10,2) DEFAULT '0.00' COMMENT '金额',
  `add_at` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  `active` tinyint(1) unsigned DEFAULT '1' COMMENT '是否有效',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `active` (`active`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='积分列表';

-- ----------------------------
-- Table structure for yzt_merchant
-- ----------------------------
DROP TABLE IF EXISTS `yzt_merchant`;
CREATE TABLE `yzt_merchant` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '商家名称',
  `province_id` int(10) unsigned DEFAULT NULL COMMENT '省ID',
  `city_id` int(10) unsigned DEFAULT NULL COMMENT '市ID',
  `area_id` int(10) unsigned DEFAULT NULL COMMENT '区ID',
  `scope` varchar(255) DEFAULT '' COMMENT '经营范围',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `is_love` tinyint(1) unsigned DEFAULT '0' COMMENT '是否爱心商家',
  `lng` decimal(12,8) DEFAULT NULL COMMENT '地图经度',
  `lat` decimal(12,8) DEFAULT NULL COMMENT '纬度',
  `level` tinyint(4) DEFAULT '0' COMMENT '等级',
  `carousel` text COMMENT '轮播图',
  `parent` int(10) unsigned DEFAULT '0' COMMENT '父级ID(推荐人ID)',
  `phone` varchar(20) DEFAULT NULL COMMENT '电话',
  `keyword` varchar(255) DEFAULT NULL COMMENT '搜索关键词',
  `content` text COMMENT '描述内容',
  `principal` varchar(10) DEFAULT '' COMMENT '负责人',
  `license` varchar(60) DEFAULT '' COMMENT '营业执照',
  `license_pic` varchar(255) DEFAULT '' COMMENT '营业执照图片',
  `principal_phone` varchar(20) DEFAULT NULL COMMENT '法人联系号码',
  `principal_cardno` char(18) DEFAULT '' COMMENT '法人身份证号',
  `identity_front` varchar(200) DEFAULT NULL COMMENT '法人身份证正面',
  `identity_back` varchar(200) DEFAULT NULL COMMENT '法人身份证背面',
  `images` text COMMENT '相关图片',
  `registered_fund` int(11) unsigned DEFAULT NULL COMMENT '注册资金',
  `partner_number` smallint(6) unsigned DEFAULT '0' COMMENT '股东（合伙人）最大数',
  `partner_money` int(10) unsigned DEFAULT NULL COMMENT '股东（合伙人）最少加盟金额',
  `has_partner` smallint(6) unsigned DEFAULT '0' COMMENT '已有股东（合伙人）',
  `have_partner` tinyint(1) unsigned DEFAULT '1' COMMENT '是否需要合伙人',
  `add_at` int(11) unsigned DEFAULT NULL COMMENT '加入时间',
  `update_at` int(11) unsigned DEFAULT NULL COMMENT '最后修改时间',
  `active` tinyint(2) unsigned DEFAULT '1' COMMENT '是否有效。1：有效，0：无效',
  PRIMARY KEY (`id`),
  KEY `is_love` (`is_love`),
  KEY `active` (`active`),
  KEY `province_id` (`province_id`),
  KEY `have_partner` (`have_partner`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商家';

-- ----------------------------
-- Table structure for yzt_merchant_repast
-- ----------------------------
DROP TABLE IF EXISTS `yzt_merchant_repast`;
CREATE TABLE `yzt_merchant_repast` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  `merchant_id` int(10) unsigned NOT NULL COMMENT '商家ID',
  `content` text COMMENT '内容',
  `describe` varchar(255) DEFAULT '' COMMENT '描述',
  `picture` text COMMENT '图片',
  `is_new` tinyint(1) unsigned DEFAULT '0' COMMENT '是否新品',
  `is_recommend` tinyint(1) unsigned DEFAULT '0' COMMENT '是否推荐',
  `is_hot` tinyint(1) unsigned DEFAULT '0' COMMENT '是否热买',
  `floors` tinyint(4) DEFAULT '1' COMMENT '楼层',
  `rooms` tinyint(4) unsigned DEFAULT '1' COMMENT '房间（餐间）',
  `free_room` tinyint(4) unsigned DEFAULT NULL COMMENT '空间房间',
  `integral` int(10) unsigned DEFAULT '0' COMMENT '积分',
  `add_at` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  `update_at` int(11) unsigned DEFAULT NULL COMMENT '最后更新时间',
  `active` tinyint(1) unsigned DEFAULT '1' COMMENT '是否有效',
  `number` int(10) unsigned DEFAULT '0' COMMENT '数量',
  `send` int(10) unsigned DEFAULT '0' COMMENT '卖出份数',
  `remark` varchar(255) DEFAULT '' COMMENT '备注',
  PRIMARY KEY (`id`),
  KEY `repast_id` (`user_id`),
  KEY `merchant_id` (`merchant_id`),
  KEY `is_new` (`is_new`),
  KEY `is_recommend` (`is_recommend`),
  KEY `is_hot` (`is_hot`),
  KEY `active` (`active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for yzt_repast_reserve
-- ----------------------------
DROP TABLE IF EXISTS `yzt_repast_reserve`;
CREATE TABLE `yzt_repast_reserve` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `repast_id` int(10) unsigned NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `room_id` int(10) unsigned NOT NULL,
  `deserve_at` tinyint(3) unsigned DEFAULT '1' COMMENT '订餐时段(1:中餐，2晚餐)',
  `deserve_time` int(11) unsigned DEFAULT NULL COMMENT '订餐时间',
  `pay_sn` char(32) DEFAULT '' COMMENT '付款标识',
  `deserve_money` smallint(6) unsigned DEFAULT '0' COMMENT '订金',
  `add_at` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  `active` tinyint(2) unsigned DEFAULT '1' COMMENT '状态( 0:已作废,1:待付款，2：待确认，3:预订成功(已确认)，4：预订失败（待退款），5：已完成)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pay_sn` (`pay_sn`),
  KEY `user_id` (`user_id`),
  KEY `repast_id` (`repast_id`),
  KEY `merchant_id` (`merchant_id`),
  KEY `active` (`active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订餐';

-- ----------------------------
-- Table structure for yzt_repast_room
-- ----------------------------
DROP TABLE IF EXISTS `yzt_repast_room`;
CREATE TABLE `yzt_repast_room` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `repast_id` int(10) unsigned NOT NULL,
  `floor` tinyint(4) DEFAULT '1' COMMENT '楼层数',
  `room_no` smallint(5) unsigned DEFAULT '1' COMMENT '房间号',
  `room_name` varchar(20) DEFAULT '' COMMENT '房间名称',
  `active` tinyint(4) unsigned DEFAULT '1' COMMENT '0:未启用,1:空闲中，2:就餐中,3:预订中,4:预订成功',
  `update_at` int(11) unsigned DEFAULT '1' COMMENT '最后修改时间',
  `add_at` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `repast_id` (`repast_id`),
  KEY `active` (`active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for yzt_role
-- ----------------------------
DROP TABLE IF EXISTS `yzt_role`;
CREATE TABLE `yzt_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `remark` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for yzt_shop
-- ----------------------------
DROP TABLE IF EXISTS `yzt_shop`;
CREATE TABLE `yzt_shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '商品名称',
  `cate_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品类别ID(大类)',
  `child_cate` int(10) unsigned DEFAULT NULL COMMENT '二级分类(子分类)',
  `label` varchar(255) DEFAULT '' COMMENT '商品标签',
  `brand` varchar(50) DEFAULT '' COMMENT '品牌',
  `unit` varchar(10) DEFAULT '' COMMENT '单位',
  `number` int(10) unsigned DEFAULT '1' COMMENT '数量',
  `price` decimal(10,2) DEFAULT '1.00' COMMENT '价格',
  `member_price` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '会员价',
  `preferential_price` decimal(10,2) DEFAULT '1.00' COMMENT '优惠价',
  `color` varchar(50) DEFAULT '' COMMENT '颜色',
  `size` varchar(50) DEFAULT '' COMMENT '尺寸',
  `weight` varchar(20) DEFAULT '' COMMENT '重量',
  `type` varchar(50) DEFAULT '' COMMENT '类型',
  `material` varchar(50) DEFAULT '' COMMENT '材质',
  `origin` varchar(50) DEFAULT '' COMMENT '产地',
  `create_at` int(11) DEFAULT NULL COMMENT '上市时间',
  `describe` varchar(255) DEFAULT '' COMMENT '描述',
  `style` varchar(50) DEFAULT '' COMMENT '款式',
  `thickness` varchar(20) DEFAULT '' COMMENT '厚度',
  `fashion` varchar(50) DEFAULT '' COMMENT '流行元素',
  `is_love` tinyint(2) unsigned DEFAULT '0' COMMENT '是否爱心商品',
  `integral` smallint(6) unsigned DEFAULT '0' COMMENT '商品积分',
  `freight` tinyint(3) unsigned DEFAULT '0' COMMENT '运费',
  `free_area` varchar(40) DEFAULT '' COMMENT '免运费区域',
  `merchant_id` int(10) unsigned DEFAULT '0' COMMENT '商家ID',
  `img` text COMMENT '商品图片',
  `keyword` varchar(255) DEFAULT '' COMMENT '搜索关键词',
  `content` text COMMENT '商品内容',
  `is_hot` tinyint(2) unsigned DEFAULT '0' COMMENT '是否热销（卖）',
  `is_new` tinyint(2) unsigned DEFAULT '0' COMMENT '是否新款',
  `is_recommend` tinyint(2) unsigned DEFAULT '0' COMMENT '是否推荐',
  `sort` smallint(6) DEFAULT '0' COMMENT '排序，越大越前',
  `send_num` int(10) unsigned DEFAULT '0' COMMENT '累计销量',
  `add_at` int(11) unsigned DEFAULT NULL COMMENT '上架时间',
  `update_at` int(11) unsigned DEFAULT NULL COMMENT '最后修改时间',
  `active` tinyint(2) unsigned DEFAULT '1' COMMENT '是否有效,1:有效，0：无效',
  PRIMARY KEY (`id`),
  KEY `cate_id` (`cate_id`),
  KEY `type` (`type`),
  KEY `is_love` (`is_love`),
  KEY `is_hot` (`is_hot`),
  KEY `is_new` (`is_new`),
  KEY `is_recommend` (`is_recommend`),
  KEY `sort` (`sort`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品';

-- ----------------------------
-- Table structure for yzt_shop_cart
-- ----------------------------
DROP TABLE IF EXISTS `yzt_shop_cart`;
CREATE TABLE `yzt_shop_cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(10) unsigned NOT NULL COMMENT '商品ID',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  `number` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT '数量',
  `price` decimal(10,2) unsigned NOT NULL COMMENT '价格',
  `add_at` int(11) unsigned NOT NULL COMMENT '添加时间',
  `end_at` int(11) unsigned NOT NULL COMMENT '结束时间',
  `active` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '是否有效',
  PRIMARY KEY (`id`),
  KEY `shop_id` (`shop_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`,`active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='购物车';

-- ----------------------------
-- Table structure for yzt_shop_category
-- ----------------------------
DROP TABLE IF EXISTS `yzt_shop_category`;
CREATE TABLE `yzt_shop_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '种类名称',
  `level` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '等级',
  `parent` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级ID',
  `img` varchar(255) DEFAULT '' COMMENT '图片',
  `add_at` int(11) unsigned DEFAULT NULL COMMENT '添加时间戳',
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `level` (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品种类';

-- ----------------------------
-- Table structure for yzt_shop_comment
-- ----------------------------
DROP TABLE IF EXISTS `yzt_shop_comment`;
CREATE TABLE `yzt_shop_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL COMMENT '订单ID',
  `shop_id` int(10) unsigned NOT NULL COMMENT '商品ID',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  `level` tinyint(2) unsigned NOT NULL DEFAULT '3' COMMENT '1：差评，2：中评，3：好评',
  `stars` tinyint(4) unsigned NOT NULL DEFAULT '50' COMMENT '星',
  `content` varchar(255) DEFAULT '' COMMENT '评论内容',
  `img` text COMMENT '图片',
  `added` tinyint(1) unsigned DEFAULT '0' COMMENT '是否追评',
  `add_at` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  `reply` varchar(255) DEFAULT '' COMMENT '商家回复',
  `reply_at` int(11) unsigned DEFAULT NULL COMMENT '回复时间',
  `reply_user` varchar(50) DEFAULT NULL COMMENT '回复人',
  `praise` int(11) unsigned DEFAULT '0' COMMENT '评论点赞',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `order_id` (`order_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品评论';

-- ----------------------------
-- Table structure for yzt_shop_comment_praise
-- ----------------------------
DROP TABLE IF EXISTS `yzt_shop_comment_praise`;
CREATE TABLE `yzt_shop_comment_praise` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` int(10) unsigned NOT NULL COMMENT '评论ID',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  `add_at` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `comment_id` (`comment_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评论点赞LOG';

-- ----------------------------
-- Table structure for yzt_shop_label
-- ----------------------------
DROP TABLE IF EXISTS `yzt_shop_label`;
CREATE TABLE `yzt_shop_label` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品标签';

-- ----------------------------
-- Table structure for yzt_shop_list
-- ----------------------------
DROP TABLE IF EXISTS `yzt_shop_list`;
CREATE TABLE `yzt_shop_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(10) unsigned NOT NULL,
  `merchant_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT '',
  `number` int(10) unsigned DEFAULT '1',
  `member_price` decimal(10,2) DEFAULT NULL,
  `preferential_price` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `color` varchar(20) DEFAULT '',
  `size` varchar(20) DEFAULT '',
  `weight` varchar(20) DEFAULT NULL,
  `material` varchar(50) DEFAULT NULL,
  `style` varchar(20) DEFAULT NULL,
  `thickness` varchar(20) DEFAULT NULL,
  `fashion` varchar(20) DEFAULT NULL,
  `integral` smallint(6) DEFAULT '0',
  `img` text,
  `is_hot` tinyint(4) DEFAULT '0',
  `is_new` tinyint(4) DEFAULT '0',
  `is_recommend` tinyint(4) DEFAULT '0',
  `sale_number` int(10) unsigned DEFAULT '0',
  `month_number` int(11) DEFAULT '0',
  `add_at` int(11) unsigned DEFAULT NULL,
  `update_at` int(11) unsigned DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `shop_id` (`shop_id`),
  KEY `merchant_id` (`merchant_id`),
  KEY `active` (`active`),
  KEY `is_hot` (`is_hot`),
  KEY `is_new` (`is_new`),
  KEY `is_recommend` (`is_recommend`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `yzt_shop_list_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `yzt_shop` (`id`),
  CONSTRAINT `yzt_shop_list_ibfk_2` FOREIGN KEY (`merchant_id`) REFERENCES `yzt_merchant` (`id`),
  CONSTRAINT `yzt_shop_list_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `yzt_gxc_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for yzt_shop_log
-- ----------------------------
DROP TABLE IF EXISTS `yzt_shop_log`;
CREATE TABLE `yzt_shop_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(10) unsigned NOT NULL COMMENT '商品ID',
  `merchant_id` int(10) unsigned DEFAULT NULL COMMENT '商家ID',
  `number` int(10) unsigned DEFAULT NULL COMMENT '数量',
  `price` decimal(10,2) DEFAULT NULL COMMENT '价格',
  `user_id` int(10) unsigned DEFAULT NULL COMMENT '操作人',
  `type` tinyint(2) unsigned DEFAULT '1' COMMENT '类型',
  `serial` varchar(32) DEFAULT NULL COMMENT '序列号',
  `describe` varchar(255) DEFAULT '' COMMENT '描述',
  `add_at` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  `active` tinyint(2) unsigned DEFAULT '0' COMMENT '是否有效，1：有效，0：无效',
  PRIMARY KEY (`id`),
  KEY `shop_id` (`shop_id`),
  KEY `merchant_id` (`merchant_id`),
  KEY `user_id` (`user_id`),
  KEY `active` (`active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品进出日志';

-- ----------------------------
-- Table structure for yzt_shop_logistics
-- ----------------------------
DROP TABLE IF EXISTS `yzt_shop_logistics`;
CREATE TABLE `yzt_shop_logistics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned DEFAULT NULL COMMENT '订单ID',
  `express` varchar(20) DEFAULT '' COMMENT '快递公司',
  `express_no` varchar(40) DEFAULT '' COMMENT '快递单号',
  `dispatch_id` int(10) unsigned DEFAULT NULL,
  `status` tinyint(4) unsigned DEFAULT '0',
  `add_at` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  `active` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `dispatch_id` (`dispatch_id`),
  KEY `order_id` (`order_id`),
  KEY `active` (`active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单物流信息';

-- ----------------------------
-- Table structure for yzt_shop_order
-- ----------------------------
DROP TABLE IF EXISTS `yzt_shop_order`;
CREATE TABLE `yzt_shop_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(10) unsigned NOT NULL COMMENT '商品ID',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户ID ',
  `serial` char(32) NOT NULL DEFAULT '' COMMENT '序列号',
  `number` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT '数量',
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '价格',
  `total_price` decimal(10,2) unsigned DEFAULT '1.00' COMMENT '最终价格',
  `message` varchar(255) DEFAULT '' COMMENT '留言',
  `discount` varchar(20) DEFAULT '' COMMENT '折扣',
  `privilege_price` decimal(10,2) DEFAULT NULL COMMENT '优惠',
  `privilege_id` int(10) unsigned DEFAULT NULL COMMENT '优惠ID',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `deal_id` int(10) unsigned DEFAULT NULL COMMENT '商家用户ID ',
  `add_at` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  `pay_at` int(11) unsigned DEFAULT NULL COMMENT '支付时间',
  `pay_price` decimal(10,2) DEFAULT NULL COMMENT '支付价格',
  `status` tinyint(2) unsigned DEFAULT '0' COMMENT '状态,0:待付款，1:待发货,2:发货中,3:已签收,4:已完成,5:退款中,6:已撤消,7:退款成功,8:换货中',
  `active` tinyint(2) unsigned DEFAULT '0' COMMENT '是否有效',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `serial` (`serial`),
  KEY `shop_id` (`shop_id`,`deal_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单';

-- ----------------------------
-- Table structure for yzt_shop_relat
-- ----------------------------
DROP TABLE IF EXISTS `yzt_shop_relat`;
CREATE TABLE `yzt_shop_relat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(10) unsigned NOT NULL,
  `merchant_id` int(10) unsigned NOT NULL,
  `number` int(10) unsigned DEFAULT '0',
  `sale_number` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `shop_id` (`shop_id`),
  KEY `merchant_id` (`merchant_id`),
  KEY `number` (`number`),
  CONSTRAINT `yzt_shop_relat_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `yzt_shop` (`id`),
  CONSTRAINT `yzt_shop_relat_ibfk_2` FOREIGN KEY (`merchant_id`) REFERENCES `yzt_merchant` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for yzt_user_dispatch
-- ----------------------------
DROP TABLE IF EXISTS `yzt_user_dispatch`;
CREATE TABLE `yzt_user_dispatch` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  `province` smallint(6) unsigned DEFAULT NULL COMMENT '省ID',
  `city` smallint(6) unsigned DEFAULT NULL COMMENT '市ID',
  `area` smallint(6) unsigned DEFAULT NULL COMMENT '区域（县）ID',
  `street` varchar(20) DEFAULT '' COMMENT '街道（镇）',
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL COMMENT '电话',
  `linkman` varchar(20) DEFAULT NULL COMMENT '联系人',
  `default` tinyint(1) unsigned DEFAULT '0' COMMENT '是否默认',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户配送地址';

-- ----------------------------
-- Table structure for yzt_wechat_message
-- ----------------------------
DROP TABLE IF EXISTS `yzt_wechat_message`;
CREATE TABLE `yzt_wechat_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT '',
  `event` varchar(20) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT '',
  `eventkey` varchar(50) DEFAULT '',
  `reply_type` varchar(20) DEFAULT '',
  `reply_content` text,
  `reply_img` text,
  `reply_title` varchar(255) DEFAULT '',
  `reply_url` varchar(255) DEFAULT '',
  `media_id` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
DROP TRIGGER IF EXISTS `hit`;
DELIMITER ;;
CREATE TRIGGER `hit` AFTER INSERT ON `xdb_order_hit` FOR EACH ROW BEGIN 
 update xdb_order set hit_number=hit_number+1 where id=new.order_id;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `userinfo`;
DELIMITER ;;
CREATE TRIGGER `userinfo` AFTER INSERT ON `yzt_gxc_user` FOR EACH ROW BEGIN 
INSERT into yzt_gxc_userinfo (user_id) VALUES (new.id);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `updateIntegral`;
DELIMITER ;;
CREATE TRIGGER `updateIntegral` AFTER INSERT ON `yzt_integral` FOR EACH ROW BEGIN 
UPDATE yzt_mxc_user set yzt_mxc_user.integral=yzt_mxc_user.integral+new.integral,yzt_mxc_user.money=yzt_mxc_user.money+new.money where yzt_mxc_user.id=new.user_id;  
END
;;
DELIMITER ;
SET FOREIGN_KEY_CHECKS=1;
