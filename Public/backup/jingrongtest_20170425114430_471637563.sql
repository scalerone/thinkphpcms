/* This file is created by MySQLReback 2017-04-25 11:44:30 */
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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_admin` */
 INSERT INTO `cms_admin` VALUES ('1','admin','21232f297a57a5a743894a0e4a801fc3','','1493091808','127.0.0.1','1'),('11','zhangsan','01d7f40760960e7bd9443513f22ab9af','','1493091822','127.0.0.1','1');/* MySQLReback Separation */
 /* 创建表结构 `cms_ads_plate` */
 DROP TABLE IF EXISTS `cms_ads_plate`;/* MySQLReback Separation */ CREATE TABLE `cms_ads_plate` (
  `id` smallint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(55) DEFAULT '',
  `desc` varchar(255) DEFAULT '',
  `addtime` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_ads_plate` */
 INSERT INTO `cms_ads_plate` VALUES ('1','首页banner图1','首页大图','1489733548');/* MySQLReback Separation */
 /* 创建表结构 `cms_ads_plate_list` */
 DROP TABLE IF EXISTS `cms_ads_plate_list`;/* MySQLReback Separation */ CREATE TABLE `cms_ads_plate_list` (
  `id` smallint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(55) DEFAULT '',
  `url` varchar(55) DEFAULT '',
  `alt` varchar(55) DEFAULT NULL,
  `createtime` int(10) DEFAULT NULL,
  `thumb` varchar(55) DEFAULT '',
  `plate_id` smallint(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_ads_plate_list` */
 INSERT INTO `cms_ads_plate_list` VALUES ('17','2','','','1493090054','/Uploads/2017-04-25/58febf05631b3.jpg','1'),('16','01','','','1493090046','/Uploads/2017-04-25/58febefb63b2f.jpg','1');/* MySQLReback Separation */
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
  `sort` mediumint(10) DEFAULT '20',
  `status` smallint(1) DEFAULT '1' COMMENT '1:显示，2:回收站，0:锁定',
  `is_top` smallint(1) NOT NULL DEFAULT '0' COMMENT '置顶',
  `is_rec` smallint(1) NOT NULL DEFAULT '0' COMMENT '推荐',
  `is_hot` smallint(1) NOT NULL DEFAULT '0' COMMENT '热门',
  `hits` int(10) DEFAULT '0' COMMENT '点击数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_article` */
 INSERT INTO `cms_article` VALUES ('96','测试视频01','测试视频01测试视频01测试视频01','<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, &quot;PingFang SC&quot;, 微软雅黑, Tahoma, Arial, sans-serif; font-size: 14px; background-color: rgba(248, 248, 248, 0.423529);\">测试视频01</span><span style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, &quot;PingFang SC&quot;, 微软雅黑, Tahoma, Arial, sans-serif; font-size: 14px; background-color: rgba(248, 248, 248, 0.423529);\">测试视频01</span></p>','85','1492963200','','','/Uploads/2017-04-24/58fdc11744add.jpg','20','1','0','1','0','59'),('97','文件下载001','文件下载001文件下载001摘要','<p>内容信息文本</p>','86','1493049600','','','/Uploads/2017-04-25/58feb12893f07.jpg','20','1','0','1','0','10'),('98','文件2','文件摘要','<p>内容信息&nbsp;&nbsp;&nbsp;&nbsp;</p>','86','1493049600','','','/Uploads/2017-04-25/58febb25b66d3.jpg','20','1','0','1','0','0');/* MySQLReback Separation */
 /* 创建表结构 `cms_article_files` */
 DROP TABLE IF EXISTS `cms_article_files`;/* MySQLReback Separation */ CREATE TABLE `cms_article_files` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(55) DEFAULT '',
  `fileurl` varchar(100) DEFAULT '',
  `article_id` mediumint(10) NOT NULL,
  `filesize` varchar(55) DEFAULT NULL,
  `filetype` varchar(25) DEFAULT NULL,
  `filepath` varchar(100) DEFAULT NULL,
  `filesavepath` varchar(100) DEFAULT NULL,
  `status` smallint(1) DEFAULT '1',
  `addtime` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_article_files` */
 INSERT INTO `cms_article_files` VALUES ('48','movie.mp4','/Uploads/2017-04-24/58fdc127684e0.mp4','96','243104','mp4','','E:/phpstudy/WWW/jinrong.com/Uploads/2017-04-24/58fdc127684e0.mp4','1','1493025064'),('49','被挂马处理方法.docx','/Uploads/2017-04-25/58feb13c87c44.docx','97','127400','docx','','E:/phpstudy/WWW/jinrong.com/Uploads/2017-04-25/58feb13c87c44.docx','1','1493086526'),('51','phpcms可写目录.png','/Uploads/2017-04-25/58febb578783c.png','98','8949','png','','E:/phpstudy/WWW/jinrong.com/Uploads/2017-04-25/58febb578783c.png','1','1493089127');/* MySQLReback Separation */
 /* 创建表结构 `cms_auth_group` */
 DROP TABLE IF EXISTS `cms_auth_group`;/* MySQLReback Separation */ CREATE TABLE `cms_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` varchar(355) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_auth_group` */
 INSERT INTO `cms_auth_group` VALUES ('1','超级管理员','1','4,5,6,9,47,48,49,24,8,10,34,50,51,11,59,60,61,26,27,28,30,32,33,77,36,37,38,62,63,43,44,45,46,53,54,55,56,57,65,66,67,68,69,70,71,72,74,75,76'),('2','普通管理员','1','4,5,6,9,47,48,49,24,8,10,34,50,51,11,59,60,61,32,33,77,53,54,55,56,57,65,66,67,68,69,70,71,72,74,75,76'),('3','网站编辑','1','4,5,6,9,47,48,49,24,8,10,34,50,51');/* MySQLReback Separation */
 /* 创建表结构 `cms_auth_group_access` */
 DROP TABLE IF EXISTS `cms_auth_group_access`;/* MySQLReback Separation */ CREATE TABLE `cms_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_auth_group_access` */
 INSERT INTO `cms_auth_group_access` VALUES ('1','1'),('11','2');/* MySQLReback Separation */
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
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_auth_rule` */
 INSERT INTO `cms_auth_rule` VALUES ('1','Article','文章管理','1','1','','0','20','1488605344'),('2','Category','栏目管理','1','1','','0','20','1488606145'),('3','Member','用户管理','1','1','','0','20','1488606167'),('4','Article/index','文章列表','1','1','','1','20','1488606201'),('5','Article/add','添加文章','1','1','','1','20','1488606219'),('6','Article/del','删除文章','1','1','','1','20','1488606240'),('24','Category/index','栏目列表','1','1','','2','20','1488804001'),('8','Category/add','添加栏目','1','1','','2','20','1488606786'),('9','Article/edit','修改文章','1','1','','1','20','1488606940'),('10','Category/edit','修改栏目','1','1','','2','20','1488606965'),('11','Member/index','用户列表','1','1','','3','20','1488606991'),('25','Rule','权限管理','1','1','','0','20','1488953951'),('26','Rule/add','添加权限','1','1','','25','20','1488953970'),('27','Rule/index','权限列表','1','1','','25','20','1488953998'),('28','Rule/del','删除权限','1','1','','25','20','1488954016'),('30','Rule/updateStatus','更新权限状态','1','1','','25','20','1488954073'),('31','System','系统设置','1','1','','0','20','1488954102'),('32','System/index','系统设置','1','1','','31','20','1488954127'),('33','System/set','保存设置','1','1','','31','20','1488954164'),('34','Category/del','删除栏目','1','1','','2','20','1488961292'),('35','Admin','管理员管理','1','1','','0','20','1488963341'),('36','Admin/add','添加管理员','1','1','','35','20','1488963373'),('37','Admin/index','管理员列表','1','1','','35','20','1488963399'),('38','Admin/edit','修改信息','1','1','','35','20','1488963421'),('62','Admin/del','删除管理员','1','1','','35','20','1492501826'),('63','Admin/updateStatus','更新状态','1','1','','35','20','1492501867'),('42','Group','管理员组','1','1','','0','20','1488963848'),('43','Admin/addGroup','添加组','1','1','','42','20','1488963902'),('44','Admin/delGroup','删除组','1','1','','42','20','1488963924'),('45','Admin/setRules','配置权限','1','1','','42','20','1488963943'),('46','Admin/group','组列表','1','1','','42','20','1488964124'),('47','Article/remove','文章移动','1','1','','1','20','1488964594'),('48','Article/search','搜索文章','1','1','','1','20','1488964614'),('49','Article/updateSort','更新排序','1','1','','1','20','1488964632'),('50','Category/updateSort','更新排序','1','1','','2','20','1488964675'),('51','Category/updateStatus','更新状态','1','1','','2','20','1488964696'),('52','Links','友情链接','1','1','','0','20','1488964784'),('53','Links/index','链接列表','1','1','','52','20','1488964815'),('54','Links/add','添加链接','1','1','','52','20','1488964848'),('55','Links/del','删除链接','1','1','','52','20','1488964871'),('56','Links/edit','修改链接','1','1','','52','20','1488964887'),('57','Links/updateSort','更新排序','1','1','','52','20','1488964906'),('59','Member/add','添加会员','1','1','','3','20','1492501621'),('60','Member/del','删除用户','1','1','','3','20','1492501651'),('61','Member/edit','修改信息','1','1','','3','20','1492501669'),('64','Ads','广告管理','1','1','','0','20','1492501909'),('65','Ads/index','广告列表','1','1','','64','20','1492501934'),('66','Ads/addPlate','添加面板','1','1','','64','20','1492501968'),('67','Ads/editPlate','修改面板','1','1','','64','20','1492501992'),('68','Ads/delPlate','删除面板','1','1','','64','20','1492502006'),('69','Ads/addAds','添加广告','1','1','','64','20','1492502037'),('70','Ads/delAds','删除广告','1','1','','64','20','1492502052'),('71','Ads/editAds','修改广告','1','1','','64','20','1492502073'),('72','Ads/adsList','查看广告列表','1','1','','64','20','1492502092'),('73','Contact','留言管理','1','1','','0','20','1492502312'),('74','Contact/index','显示留言列表','1','1','','73','20','1492502352'),('75','Contact/look','查看留言','1','1','','73','20','1492502376'),('76','Contact/del','删除留言','1','1','','73','20','1492502395'),('77','System/backup','数据备份','1','1','','31','20','1492504444');/* MySQLReback Separation */
 /* 创建表结构 `cms_category` */
 DROP TABLE IF EXISTS `cms_category`;/* MySQLReback Separation */ CREATE TABLE `cms_category` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `catname` varchar(35) NOT NULL DEFAULT '',
  `sort` smallint(5) NOT NULL DEFAULT '20',
  `pid` mediumint(10) NOT NULL DEFAULT '0',
  `thumb` varchar(50) DEFAULT '',
  `addtime` int(10) NOT NULL,
  `alias` varchar(50) DEFAULT NULL,
  `status` smallint(1) DEFAULT '2' COMMENT '1:正常2:导航栏不显示',
  `type` smallint(1) DEFAULT '1' COMMENT '1:栏目2:单篇3:链接',
  `summary` varchar(255) DEFAULT '',
  `content` text,
  `url` varchar(255) DEFAULT '',
  `template` varchar(50) DEFAULT '' COMMENT '对应的模版文件:list.html',
  `app_sub` smallint(1) DEFAULT '1' COMMENT '模版是否应用到子栏目',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_category` */
 INSERT INTO `cms_category` VALUES ('86','文件下载','2','0','','1492505276','','1','1','','','/list/86.html','file_list.html','1'),('85','视频中心','1','0','','1492505251','','1','1','','','/list/85.html','movies_list.html','1');/* MySQLReback Separation */
 /* 创建表结构 `cms_contact` */
 DROP TABLE IF EXISTS `cms_contact`;/* MySQLReback Separation */ CREATE TABLE `cms_contact` (
  `id` smallint(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` smallint(10) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `telphone` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `qq` varchar(25) DEFAULT NULL,
  `content` varchar(525) DEFAULT NULL,
  `status` smallint(1) DEFAULT '1' COMMENT '0:不显示,1:显示，3:删除',
  `ip` varchar(20) DEFAULT NULL,
  `addtime` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_contact` */
 INSERT INTO `cms_contact` VALUES ('4','0','4545','','545','','','','','4548','1','127.0.0.1','1490256259'),('3','0','asdasd2','','asd2','','','','','asd2','1','127.0.0.1','1490255645'),('5','0','111','','111','','','','','111','1','127.0.0.1','1492155717');/* MySQLReback Separation */
 /* 创建表结构 `cms_links` */
 DROP TABLE IF EXISTS `cms_links`;/* MySQLReback Separation */ CREATE TABLE `cms_links` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(35) NOT NULL,
  `desc` varchar(255) DEFAULT '',
  `thumb` varchar(55) DEFAULT '',
  `url` varchar(55) DEFAULT '',
  `sort` mediumint(8) DEFAULT '20',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_links` */
 INSERT INTO `cms_links` VALUES ('1','百度','百度地址','','http://www.baidu.com','0');/* MySQLReback Separation */
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
  `registertime` int(10) DEFAULT NULL COMMENT '注册时间',
  `lastlogintime` int(10) DEFAULT NULL,
  `lastloginip` varchar(20) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_member` */
 INSERT INTO `cms_member` VALUES ('23','15210987765','20917c851c4a54f2a054390dac9085b7','','15210987765','0','','1','','','1493022375','1493022470','127.0.0.1'),('22','adminasds@qq.com','20917c851c4a54f2a054390dac9085b7','adminasds@qq.com','','0','','1','','','1493022002','',''),('20','admin@qq.com','20917c851c4a54f2a054390dac9085b7','admin@qq.com','','0','','1','','','','1493086978','127.0.0.1');/* MySQLReback Separation */
 /* 创建表结构 `cms_member_group` */
 DROP TABLE IF EXISTS `cms_member_group`;/* MySQLReback Separation */ CREATE TABLE `cms_member_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(55) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_member_group` */
 INSERT INTO `cms_member_group` VALUES ('1','注册会员'),('2','普通会员'),('3','VIP会员');/* MySQLReback Separation */