/* This file is created by MySQLReback 2017-03-10 11:34:07 */
 /* 创建表结构 `cms_admin` */
 DROP TABLE IF EXISTS `cms_admin`;/* MySQLReback Separation */ CREATE TABLE `cms_admin` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `email` varchar(50) DEFAULT NULL,
  `lastlogintime` int(10) DEFAULT NULL,
  `lastloginip` varchar(20) DEFAULT '',
  `status` smallint(1) NOT NULL DEFAULT '1' COMMENT '1:正常0:锁定',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_admin` */
 INSERT INTO `cms_admin` VALUES ('1','admin','21232f297a57a5a743894a0e4a801fc3','','1489023709','127.0.0.1','1'),('3','test','098f6bcd4621d373cade4e832627b4f6','','1488954587','127.0.0.1','1'),('4','ads','2deb000b57bfac9d72c14d4ed967b572','','','','1'),('5','test2','ad0234829205b9033196ba818f7a872b','','1488965209','127.0.0.1','1');/* MySQLReback Separation */
 /* 创建表结构 `cms_article` */
 DROP TABLE IF EXISTS `cms_article`;/* MySQLReback Separation */ CREATE TABLE `cms_article` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `summary` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `catid` mediumint(10) NOT NULL,
  `addtime` int(10) NOT NULL,
  `author` varchar(35) DEFAULT '',
  `alias` varchar(35) DEFAULT NULL,
  `thumb` varchar(50) DEFAULT '',
  `sort` mediumint(10) DEFAULT '0',
  `status` int(1) DEFAULT '1' COMMENT '1:显示，2:回收站，0:锁定',
  `is_top` int(1) NOT NULL DEFAULT '0' COMMENT '置顶',
  `is_rec` int(1) NOT NULL DEFAULT '0' COMMENT '推荐',
  `is_hot` int(1) NOT NULL DEFAULT '0' COMMENT '热门',
  `hits` int(10) DEFAULT '0' COMMENT '点击数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_article` */
 INSERT INTO `cms_article` VALUES ('64','sanyuketang111','课堂111','2宇铿发阿斯达斯的&lt;img src=&quot;./Uploads/2017-03-02/58b78fb3929cd.jpg&quot; alt=&quot;58b78fb3929cd.jpg&quot;&gt;','2','1488384000','admin11','三语课程111','','1','1','0','0','1','0'),('63','asdas','asd','dasdad','47','1488297600','','','./Uploads/2017-03-01/58b694f7d3e2f.jpg','0','1','0','1','0','0');/* MySQLReback Separation */
 /* 创建表结构 `cms_auth_group` */
 DROP TABLE IF EXISTS `cms_auth_group`;/* MySQLReback Separation */ CREATE TABLE `cms_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_auth_group` */
 INSERT INTO `cms_auth_group` VALUES ('1','超级管理员','1','4,5,6,9,47,48,49,24,8,10,34,50,51,11,26,27,28,30,32,33,36,37,38,41,40,43,44,45,46,53,54,55,56,57'),('2','普通管理员','1','4,5,6,9,47,48,49,24,8,10,34,50,51,11'),('3','网站编辑','1','4,5,48,49,24,8,50,51');/* MySQLReback Separation */
 /* 创建表结构 `cms_auth_group_access` */
 DROP TABLE IF EXISTS `cms_auth_group_access`;/* MySQLReback Separation */ CREATE TABLE `cms_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_auth_group_access` */
 INSERT INTO `cms_auth_group_access` VALUES ('1','1'),('3','1'),('4','2'),('5','3');/* MySQLReback Separation */
 /* 创建表结构 `cms_auth_rule` */
 DROP TABLE IF EXISTS `cms_auth_rule`;/* MySQLReback Separation */ CREATE TABLE `cms_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) DEFAULT '',
  `pid` mediumint(8) NOT NULL DEFAULT '0',
  `sort` mediumint(8) DEFAULT '20',
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_auth_rule` */
 INSERT INTO `cms_auth_rule` VALUES ('1','Article','文章管理','1','1','','0','20','1488605344'),('2','Category','栏目管理','1','1','','0','20','1488606145'),('3','Member','用户管理','1','1','','0','20','1488606167'),('4','Article/index','文章列表','1','1','','1','20','1488606201'),('5','Article/add','添加文章','1','1','','1','20','1488606219'),('6','Article/del','删除文章','1','1','','1','20','1488606240'),('24','Category/index','栏目列表','1','1','','2','20','1488804001'),('8','Category/add','添加栏目','1','1','','2','20','1488606786'),('9','Article/edit','修改文章','1','1','','1','20','1488606940'),('10','Category/edit','修改栏目','1','1','','2','20','1488606965'),('11','Member/index','用户列表','1','1','','3','20','1488606991'),('25','Rule','权限管理','1','1','','0','20','1488953951'),('26','Rule/add','添加权限','1','1','','25','20','1488953970'),('27','Rule/index','权限列表','1','1','','25','20','1488953998'),('28','Rule/del','删除权限','1','1','','25','20','1488954016'),('30','Rule/updateStatus','更新权限状态','1','1','','25','20','1488954073'),('31','System','系统设置','1','1','','0','20','1488954102'),('32','System/index','系统设置','1','1','','31','20','1488954127'),('33','System/set','保存设置','1','1','','31','20','1488954164'),('34','Category/del','删除栏目','1','1','','2','20','1488961292'),('35','Admin','管理员管理','1','1','','0','20','1488963341'),('36','Admin/add','添加管理员','1','1','','35','20','1488963373'),('37','Admin/index','管理员列表','1','1','','35','20','1488963399'),('38','Admin/edit','修改信息','1','1','','35','20','1488963421'),('41','Admin/checkUname','检测管理员是否存在','1','1','','35','20','1488963543'),('40','admin/del','删除管理员','1','1','','35','20','1488963475'),('42','Group','管理员组','1','1','','0','20','1488963848'),('43','Admin/addGroup','添加组','1','1','','42','20','1488963902'),('44','Admin/delGroup','删除组','1','1','','42','20','1488963924'),('45','Admin/setRules','配置权限','1','1','','42','20','1488963943'),('46','Admin/group','组列表','1','1','','42','20','1488964124'),('47','Article/remove','文章移动','1','1','','1','20','1488964594'),('48','Article/search','搜索文章','1','1','','1','20','1488964614'),('49','Article/updateSort','更新排序','1','1','','1','20','1488964632'),('50','Category/updateSort','更新排序','1','1','','2','20','1488964675'),('51','Category/updateStatus','更新状态','1','1','','2','20','1488964696'),('52','Links','友情链接','1','1','','0','20','1488964784'),('53','Links/index','链接列表','1','1','','52','20','1488964815'),('54','Links/add','添加链接','1','1','','52','20','1488964848'),('55','Links/del','删除链接','1','1','','52','20','1488964871'),('56','Links/edit','修改链接','1','1','','52','20','1488964887'),('57','Links/updateSort','更新排序','1','1','','52','20','1488964906');/* MySQLReback Separation */
 /* 创建表结构 `cms_category` */
 DROP TABLE IF EXISTS `cms_category`;/* MySQLReback Separation */ CREATE TABLE `cms_category` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `catname` varchar(35) NOT NULL DEFAULT '',
  `sort` smallint(5) NOT NULL DEFAULT '0',
  `pid` mediumint(10) NOT NULL DEFAULT '0',
  `thumb` varchar(50) DEFAULT '',
  `addtime` int(10) NOT NULL,
  `alias` varchar(50) DEFAULT NULL,
  `status` smallint(1) DEFAULT '2' COMMENT '1:正常2:导航栏不显示',
  `type` smallint(1) DEFAULT '1' COMMENT '1:栏目2:单篇3:链接',
  `summary` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_category` */
 INSERT INTO `cms_category` VALUES ('1','三语课堂','1','0','./Uploads/2017-02-27/58b3e98d5a838.jpg','1488185754','别名','1','1','描述'),('2','招聘信息','0','0','','1488185971','','1','2',''),('52','asdasd','0','0','','1488513209','asd','1','1',''),('46','测试','0','0','./Uploads/2017-03-08/58bfbc21c6c21.jpg','1488270397','栏目别名','1','3','测试栏目描述'),('47','测试22','0','46','./Uploads/2017-03-01/58b662e4e405a.jpg','1488270895','栏目别名1222','1','3','测试栏目描述122'),('48','asdasd','0','0','','1488442235','','1','1','asd'),('53','333','0','47','','1488964524','33','1','1','33'),('54','444','0','53','','1488964536','44','1','1','444');/* MySQLReback Separation */
 /* 创建表结构 `cms_links` */
 DROP TABLE IF EXISTS `cms_links`;/* MySQLReback Separation */ CREATE TABLE `cms_links` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(35) NOT NULL,
  `desc` varchar(255) DEFAULT '',
  `thumb` varchar(55) DEFAULT '',
  `url` varchar(55) DEFAULT '',
  `sort` mediumint(8) DEFAULT '20',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_links` */
 INSERT INTO `cms_links` VALUES ('1','百度','百度地址','./Uploads/2017-03-02/58b7e3785401e.jpg','http://www.baidu.com','0'),('8','腾讯','','','http://www.qq.com','2'),('7','sina','','','http://www.sina.com.cn','1');/* MySQLReback Separation */
 /* 创建表结构 `cms_member` */
 DROP TABLE IF EXISTS `cms_member`;/* MySQLReback Separation */ CREATE TABLE `cms_member` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL DEFAULT '',
  `pass` char(32) NOT NULL DEFAULT '',
  `email` varchar(25) NOT NULL DEFAULT '',
  `phone` varchar(25) NOT NULL DEFAULT '',
  `member_group_id` mediumint(8) NOT NULL COMMENT '会员类型(注册会员，普通会员，VIP会员等)',
  `en_name` varchar(55) NOT NULL DEFAULT '',
  `sex` smallint(1) NOT NULL DEFAULT '1' COMMENT '1:男2:女',
  `avatar` varchar(55) NOT NULL DEFAULT '' COMMENT '头像',
  `intro` varchar(255) NOT NULL DEFAULT '' COMMENT '个人介绍',
  `registertime` int(10) DEFAULT '0' COMMENT '注册时间',
  `lastlogintime` int(10) DEFAULT '0',
  `lastloginip` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_member` */
 INSERT INTO `cms_member` VALUES ('1','admin','123','asdasd@qq.com','','0','','1','','内能够','1488532755','0','0'),('2','lisi','lisi','lisi@qq.com','','0','','1','','asd','1488547833','0','0'),('4','asda','dasda','sdasd@qq.com','','0','','1','','asdasd','1488548063','0','0'),('5','asd','admin','asdasd','','0','','1','./Uploads/2017-03-03/58b9762221d0d.jpg','asdasd','1488548132','0','0');/* MySQLReback Separation */
 /* 创建表结构 `cms_member_group` */
 DROP TABLE IF EXISTS `cms_member_group`;/* MySQLReback Separation */ CREATE TABLE `cms_member_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(55) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_member_group` */
 INSERT INTO `cms_member_group` VALUES ('1','注册会员'),('2','普通会员'),('3','VIP会员');/* MySQLReback Separation */