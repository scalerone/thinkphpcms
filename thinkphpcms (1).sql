-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 �?02 �?28 �?17:44
-- 服务器版本: 5.5.47
-- PHP 版本: 5.5.30

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `thinkphpcms`
--

-- --------------------------------------------------------

--
-- 表的结构 `cms_admin`
--

CREATE TABLE IF NOT EXISTS `cms_admin` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `email` varchar(50) DEFAULT NULL,
  `lastlogintime` int(10) DEFAULT NULL,
  `lastloginip` varchar(20) DEFAULT '',
  `status` smallint(1) NOT NULL DEFAULT '1' COMMENT '1:正常0:锁定',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `cms_admin`
--

INSERT INTO `cms_admin` (`id`, `username`, `password`, `email`, `lastlogintime`, `lastloginip`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, 1488244111, '127.0.0.1', 1);

-- --------------------------------------------------------

--
-- 表的结构 `cms_article`
--

CREATE TABLE IF NOT EXISTS `cms_article` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `summary` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `catid` mediumint(10) NOT NULL,
  `addtime` int(10) NOT NULL,
  `author` varchar(35) DEFAULT '',
  `alias` varchar(35) DEFAULT NULL,
  `thumb` varchar(50) DEFAULT NULL,
  `sort` mediumint(10) DEFAULT '0',
  `status` int(1) DEFAULT '1' COMMENT '1:显示，2:回收站，0:锁定',
  `is_top` int(1) NOT NULL DEFAULT '0' COMMENT '置顶',
  `is_rec` int(1) NOT NULL DEFAULT '0' COMMENT '推荐',
  `is_hot` int(1) NOT NULL DEFAULT '0' COMMENT '热门',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- 转存表中的数据 `cms_article`
--

INSERT INTO `cms_article` (`id`, `title`, `summary`, `content`, `catid`, `addtime`, `author`, `alias`, `thumb`, `sort`, `status`, `is_top`, `is_rec`, `is_hot`) VALUES
(37, 'asdasd', 'asdasdasd', 'asdasd&lt;img src=&quot;./Uploads/2017-02-27/58b3d1e58abc8.jpg&quot; alt=&quot;58b3d1e58abc8.jpg&quot;&gt;', 0, 1488124800, '', '', './Uploads/2017-02-27/58b3d1d092540.jpg', 0, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `cms_category`
--

CREATE TABLE IF NOT EXISTS `cms_category` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- 转存表中的数据 `cms_category`
--

INSERT INTO `cms_category` (`id`, `catname`, `sort`, `pid`, `thumb`, `addtime`, `alias`, `status`, `type`, `summary`) VALUES
(1, '三语课堂', 1, 0, './Uploads/2017-02-27/58b3e98d5a838.jpg', 1488185754, '别名', 1, 1, '描述'),
(2, '招聘信息', 0, 0, '', 1488185971, '', 1, 2, ''),
(46, '测试', 0, 0, './Uploads/2017-02-28/58b5343147cd7.jpg', 1488270397, '栏目别名', 1, 3, '测试栏目描述'),
(47, '测试22', 0, 46, '', 1488270895, '栏目别名1222', 2, 3, '测试栏目描述122');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
