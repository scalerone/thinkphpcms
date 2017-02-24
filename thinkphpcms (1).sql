-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 �?02 �?24 �?17:36
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
(1, 'admin', '3b674368dda3dad11a1d4ff26d7733c0', NULL, 1487920039, '127.0.0.1', 1);

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
