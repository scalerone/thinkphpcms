/* This file is created by MySQLReback 2017-03-17 17:13:49 */
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
 INSERT INTO `cms_admin` VALUES ('1','admin','e00cf25ad42683b3df678c61f42c6bda','','1489730160','127.0.0.1','1'),('3','test','098f6bcd4621d373cade4e832627b4f6','','1488954587','127.0.0.1','1'),('4','ads','2deb000b57bfac9d72c14d4ed967b572','','0','','1'),('5','test2','ad0234829205b9033196ba818f7a872b','','1488965209','127.0.0.1','1');/* MySQLReback Separation */
 /* 创建表结构 `cms_ads_plate` */
 DROP TABLE IF EXISTS `cms_ads_plate`;/* MySQLReback Separation */ CREATE TABLE `cms_ads_plate` (
  `id` smallint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(55) DEFAULT '',
  `desc` varchar(255) DEFAULT '',
  `addtime` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_ads_plate` */
 INSERT INTO `cms_ads_plate` VALUES ('1','首页banner图','首页大图','1489733548');/* MySQLReback Separation */
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
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
  `status` int(1) DEFAULT '1' COMMENT '1:显示，2:回收站，0:锁定',
  `is_top` int(1) NOT NULL DEFAULT '0' COMMENT '置顶',
  `is_rec` int(1) NOT NULL DEFAULT '0' COMMENT '推荐',
  `is_hot` int(1) NOT NULL DEFAULT '0' COMMENT '热门',
  `hits` int(10) DEFAULT '0' COMMENT '点击数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_article` */
 INSERT INTO `cms_article` VALUES ('70','3333','','333','72','1489334400','','','/Uploads/2017-03-13/58c642b0b7587.jpg','20','1','0','0','1','0'),('72','2222','','2222','73','1489334400','','','/Uploads/2017-03-13/58c654a384846.jpg','20','1','0','1','0','0'),('69','222','','2222','72','1489334400','','','/Uploads/2017-03-13/58c6429907f72.jpg','20','1','1','0','0','0'),('68','空间1','','内容','72','1489334400','','','/Uploads/2017-03-13/58c64277d64a2.jpg','20','1','0','1','0','0'),('73','333','','333','73','1489334400','','','/Uploads/2017-03-13/58c65519188a2.jpg','20','1','0','1','0','0'),('74','55','','55','73','1489334400','','','/Uploads/2017-03-13/58c6563702a73.jpg','20','1','0','1','0','0'),('75','启航创客案例 1','','asdasd','61','1489334400','','','/Uploads/2017-03-13/58c6578b31654.jpg','20','1','0','1','0','0'),('76','2112','','asdasd','61','1489334400','','','/Uploads/2017-03-13/58c657a074965.jpg','20','1','0','1','0','0');/* MySQLReback Separation */
 /* 插入数据 `cms_article` */
 INSERT INTO `cms_article` VALUES ('78','创客教育的理论关联','在新兴科技和互联网社区的发展大背景下，创新教育以信息技术的融合为基础，传承了体验教育、项目学习法、创新教育、DIY理念的思想','<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, arial; font-size: 14px; background-color: rgb(255, 255, 255);\">在新兴科技和互联网社区的发展大背景下，创新教育以信息技术的融合为基础，传承了体验教育、项目学习法、创新教育、DIY理念的思想</span><span style=\"color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, arial; font-size: 14px; background-color: rgb(255, 255, 255);\">在新兴科技和互联网社区的发展大背景下，创新教育以信息技术的融合为基础，传承了体验教育、项目学习法、创新教育、DIY理念的思想</span><span style=\"color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, arial; font-size: 14px; background-color: rgb(255, 255, 255);\">在新兴科技和互联网社区的发展大背景下，创新教育以信息技术的融合为基础，传承了体验教育、项目学习法、创新教育、DIY理念的思想</span><span style=\"color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, arial; font-size: 14px; background-color: rgb(255, 255, 255);\">在新兴科技和互联网社区的发展大背景下，创新教育以信息技术的融合为基础，传承了体验教育、项目学习法、创新教育、DIY理念的思想</span><span style=\"color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, arial; font-size: 14px; background-color: rgb(255, 255, 255);\">在新兴科技和互联网社区的发展大背景下，创新教育以信息技术的融合为基础，传承了体验教育、项目学习法、创新教育、DIY理念的思想</span><span style=\"color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, arial; font-size: 14px; background-color: rgb(255, 255, 255);\">在新兴科技和互联网社区的发展大背景下，创新教育以信息技术的融合为基础，传承了体验教育、项目学习法、创新教育、DIY理念的思想</span><span style=\"color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, arial; font-size: 14px; background-color: rgb(255, 255, 255);\">在新兴科技和互联网社区的发展大背景下，创新教育以信息技术的融合为基础，传承了体验教育、项目学习法、创新教育、DIY理念的思想</span><span style=\"color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, arial; font-size: 14px; background-color: rgb(255, 255, 255);\">在新兴科技和互联网社区的发展大背景下，创新教育以信息技术的融合为基础，传承了体验教育、项目学习法、创新教育、DIY理念的思想</span><span style=\"color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, arial; font-size: 14px; background-color: rgb(255, 255, 255);\">在新兴科技和互联网社区的发展大背景下，创新教育以信息技术的融合为基础，传承了体验教育、项目学习法、创新教育、DIY理念的思想</span><span style=\"color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, arial; font-size: 14px; background-color: rgb(255, 255, 255);\">在新兴科技和互联网社区的发展大背景下，创新教育以信息技术的融合为基础，传承了体验教育、项目学习法、创新教育、DIY理念的思想</span><span style=\"color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, arial; font-size: 14px; background-color: rgb(255, 255, 255);\">在新兴科技和互联网社区的发展大背景下，创新教育以信息技术的融合为基础，传承了体验教育、项目学习法、创新教育、DIY理念的思想</span><span style=\"color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, arial; font-size: 14px; background-color: rgb(255, 255, 255);\">在新兴科技和互联网社区的发展大背景下，创新教育以信息技术的融合为基础，传承了体验教育、项目学习法、创新教育、DIY理念的思想</span><span style=\"color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, arial; font-size: 14px; background-color: rgb(255, 255, 255);\">在新兴科技和互联网社区的发展大背景下，创新教育以信息技术的融合为基础，传承了体验教育、项目学习法、创新教育、DIY理念的思想</span><span style=\"color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, arial; font-size: 14px; background-color: rgb(255, 255, 255);\">在新兴科技和互联网社区的发展大背景下，创新教育以信息技术的融合为基础，传承了体验教育、项目学习法、创新教育、DIY理念的思想</span></p>','58','1489507200','admin','','/Uploads/2017-03-15/58c900fc2a37f.jpg','20','1','0','1','0','0');/* MySQLReback Separation */
 /* 插入数据 `cms_article` */
 INSERT INTO `cms_article` VALUES ('79','启航创客与教育的融合','启航创客与教育的融合','<h2 style=\"margin: 0px; padding: 10px 0px; color: rgb(51, 51, 51); font-size: 18px; font-weight: 100; font-family: &quot;microsoft yahei&quot;, arial; white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.szqhmaker.com/index.php?m=content&c=index&a=show&catid=3&id=52\" style=\"text-decoration: none; color: rgb(51, 51, 51);\">启航创客与教育的融合</a></h2><h2 style=\"margin: 0px; padding: 10px 0px; color: rgb(51, 51, 51); font-size: 18px; font-weight: 100; font-family: &quot;microsoft yahei&quot;, arial; white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.szqhmaker.com/index.php?m=content&c=index&a=show&catid=3&id=52\" style=\"text-decoration: none; color: rgb(51, 51, 51);\">启航创客与教育的融合</a></h2><h2 style=\"margin: 0px; padding: 10px 0px; color: rgb(51, 51, 51); font-size: 18px; font-weight: 100; font-family: &quot;microsoft yahei&quot;, arial; white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.szqhmaker.com/index.php?m=content&c=index&a=show&catid=3&id=52\" style=\"text-decoration: none; color: rgb(51, 51, 51);\">启航创客与教育的融合</a></h2><h2 style=\"margin: 0px; padding: 10px 0px; color: rgb(51, 51, 51); font-size: 18px; font-weight: 100; font-family: &quot;microsoft yahei&quot;, arial; white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.szqhmaker.com/index.php?m=content&c=index&a=show&catid=3&id=52\" style=\"text-decoration: none; color: rgb(51, 51, 51);\">启航创客与教育的融合</a></h2><h2 style=\"margin: 0px; padding: 10px 0px; color: rgb(51, 51, 51); font-size: 18px; font-weight: 100; font-family: &quot;microsoft yahei&quot;, arial; white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.szqhmaker.com/index.php?m=content&c=index&a=show&catid=3&id=52\" style=\"text-decoration: none; color: rgb(51, 51, 51);\">启航创客与教育的融合</a></h2><h2 style=\"margin: 0px; padding: 10px 0px; color: rgb(51, 51, 51); font-size: 18px; font-weight: 100; font-family: &quot;microsoft yahei&quot;, arial; white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.szqhmaker.com/index.php?m=content&c=index&a=show&catid=3&id=52\" style=\"text-decoration: none; color: rgb(51, 51, 51);\">启航创客与教育的融合</a></h2><h2 style=\"margin: 0px; padding: 10px 0px; color: rgb(51, 51, 51); font-size: 18px; font-weight: 100; font-family: &quot;microsoft yahei&quot;, arial; white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.szqhmaker.com/index.php?m=content&c=index&a=show&catid=3&id=52\" style=\"text-decoration: none; color: rgb(51, 51, 51);\">启航创客与教育的融合</a></h2><h2 style=\"margin: 0px; padding: 10px 0px; color: rgb(51, 51, 51); font-size: 18px; font-weight: 100; font-family: &quot;microsoft yahei&quot;, arial; white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.szqhmaker.com/index.php?m=content&c=index&a=show&catid=3&id=52\" style=\"text-decoration: none; color: rgb(51, 51, 51);\">启航创客与教育的融合</a></h2><h2 style=\"margin: 0px; padding: 10px 0px; color: rgb(51, 51, 51); font-size: 18px; font-weight: 100; font-family: &quot;microsoft yahei&quot;, arial; white-space: normal; background-color: rgb(255, 255, 255);\"><a href=\"http://www.szqhmaker.com/index.php?m=content&c=index&a=show&catid=3&id=52\" style=\"text-decoration: none; color: rgb(51, 51, 51);\">启航创客与教育的融合</a></h2><p><br/></p>','58','1489507200','','','/Uploads/2017-03-15/58c90175e1777.jpg','20','1','0','1','0','0');/* MySQLReback Separation */
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
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_category` */
 INSERT INTO `cms_category` VALUES ('55','关于我们','20','0','/Uploads/2017-03-11/58c3b4f43986f.jpg','1489220186','About Us','1','2','','<h2>启航创客</h2><p>深圳市启航创客科技有限公司是一家领先的青少年创客教育服务商，为中小学学校提供创客空间设计搭建、创客课程、创客师资培训、创客电子物料等专业服务。</p><p><img src=\"/Uploads/2017-03-14/58c7f38e790c9.jpg\" alt=\"58c7f38e790c9.jpg\"/><br/></p><p><img src=\"/Uploads/images/20170315/1489550738174407.jpg\" title=\"1489550738174407.jpg\" alt=\"about02.jpg\"/></p><p><img src=\"/Uploads/images/20170315/1489553508557820.jpg\" title=\"1489553508557820.jpg\" alt=\"about03.jpg\"/></p>','','','1'),('57','创客教育','20','0','','1489221158','','1','2','','<h2 style=\"margin: 0px; padding: 10px 0px; color: rgb(51, 51, 51); font-size: 24px; font-weight: 100; font-family: &quot;microsoft yahei&quot;, arial; white-space: normal; background-color: rgb(255, 255, 255);\">中小学创客空间</h2><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;, arial; font-size: 13px; white-space: normal; background-color: rgb(255, 255, 255);\">创客教室空间用于培养学生的创新能力，让学生的新奇创意思维变成现实。</p><p><img src=\"/Uploads/images/20170315/1489553718604295.jpg\" title=\"1489553718604295.jpg\" alt=\"show_ck01.jpg\"/></p>','','','1'),('58','新闻资讯','20','0','','1489221178','','1','1','','','','','1'),('59','下载中心','20','0','','1489221197','','1','1','','','','','1'),('60','服务支持','20','0','','1489221219','','1','2','','111','','','1'),('61','成功案例','20','0','','1489221241','','1','1','','','','','1'),('62','在线留言','20','0','','1489221380','','1','1','','','','','1'),('68','师资培训','20','60','','1489385409','师资培训','1','1','师资培训','','','','1'),('65','中小学创客空间','20','57','','1489373593','','1','2','asd','asdasd','','','1'),('66','高效创客空间','20','57','','1489373608','高效创客空间','1','2','高效创客空间','asd','','','1'),('67','社会创客空间','20','57','','1489373622','社会创客空间','1','2','社会创客空间','asd','','','1'),('69','赛事活动','20','60','','1489385422','赛事活动','1','1','赛事活动','','','','1'),('70','首页','20','0','','1489385718','首页','2','1','首页','','','','1'),('71','创客课程思路','20','70','','1489385738','创客课程思路','1','1','以培养学习者，特别是青少年学习者的创客素养为导向的教育模式。它包含正式学习，也包含贯穿学习者一生的非正式学习。','','','','1'),('72','创客教育课堂 —为学生筑“造梦空间”','20','70','','1489385752','创客教育课堂 —为学生筑“造梦空间”','1','1','创客教育课堂 —为学生筑“造梦空间”','','','','1'),('73',' 小创客的作品','20','70','','1489385766',' 小创客的作品','1','1',' 小创客的作品','','','','1'),('74','创客教育在美国','20','70','','1489385805','创客教育在美国','1','1','奥巴马在2009年的竞选演讲中说：“我希望我们所有人去思考创新的 方法，激发年轻人从事到科学和工程中来，鼓励年轻人去创造、构建 和发明——去做事物的创造者，而不仅仅是事物的消费者“。2012年 初美国政府又推出一个新项目，计划在未来四年内在1000所美国学校 引入创客空间。','','','','1'),('75','创客教育进中国','20','70','','1489385818',' 创客教育进中国','1','1','李克强主持召开国务院常务会议，确定支持发展“众创空间”的政策措施为创业创新搭建新平台，在内的各类青年创新人才和创新团队，带动扩大 就压，打造经济发展新的“发动机”，具有重要意义。医药在创客空间、 创新工厂等孵化模式的基础上，大力发展市场化、专业化、集成化、网络 化的模式','','','','1'),('76','小学','20','71','/Uploads/2017-03-13/58c63b1ba2967.png','1489385832','小学','1','1','发明制作一个有趣的玩具，感受造物乐趣，培养探究精神及动手实践的兴趣和能力学会简单编程，学习定格动画制作等。','','','','1'),('77','初中','20','71','/Uploads/2017-03-13/58c63b2c64cf5.png','1489385845','初中','1','1','综合活动与工作坊相结合，让学生“做中玩、 玩中学”，以arduino和图形化编程为基础， 融合各学科知识，培养动手解决问题的能力。','','','','1'),('78','高中','20','71','/Uploads/2017-03-13/58c63b3cdd66c.png','1489385856','高中','1','1','发明制作一个有趣的玩具，感受造物乐趣， 培养探究精神及动手实践的兴趣和能力学 会简单编程，学习定格动画制作等。','','','','1'),('83','测试模版','20','0','','1489650585','阿斯达','1','2','asd','<p>测试模版neirong&nbsp;</p>','','page.html','1'),('84','测试栏目','20','0','','1489730299','','2','2','','<p>测试内容</p>','','page_test.html','1');/* MySQLReback Separation */
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
 INSERT INTO `cms_links` VALUES ('1','百度','百度地址','./Uploads/2017-03-02/58b7e3785401e.jpg','http://www.baidu.com','0'),('8','腾讯','','','http://www.qq.com','2'),('7','sina','','','http://www.sina.com.cn','1'),('12','12','112','./Uploads/2017-03-11/58c372a215dc0.jpg','http://jonny.93sucai.com/','20');/* MySQLReback Separation */
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_member` */
 INSERT INTO `cms_member` VALUES ('1','admin','admin','asdasd@qq.com','','0','','1','','内能够','1488532755','0','0'),('2','lisi','lisi','lisi@qq.com','','0','','1','','asd','1488547833','0','0'),('4','asda','dasda','sdasd@qq.com','','0','','1','','asdasd','1488548063','0','0'),('5','asd','admin','asdasd','','0','','1','./Uploads/2017-03-03/58b9762221d0d.jpg','asdasd','1488548132','0','0'),('6','asd','asdasd','asdasd','','0','','1','./Uploads/2017-03-11/58c3735605d14.jpg','','1489204068','0','0'),('7','111','111','111@qq.com','','0','','1','','11','1489204090','0','0');/* MySQLReback Separation */
 /* 创建表结构 `cms_member_group` */
 DROP TABLE IF EXISTS `cms_member_group`;/* MySQLReback Separation */ CREATE TABLE `cms_member_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(55) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `cms_member_group` */
 INSERT INTO `cms_member_group` VALUES ('1','注册会员'),('2','普通会员'),('3','VIP会员');/* MySQLReback Separation */