-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 04 月 18 日 05:35
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `ibm`
--
CREATE DATABASE IF NOT EXISTS `ibm` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ibm`;

-- --------------------------------------------------------

--
-- 表的结构 `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `time` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `content`
--

INSERT INTO `content` (`id`, `type`, `content`, `time`) VALUES
(1, 'description', '<p>test</p>', '1429353039'),
(2, 'summary', '<p>å†…å®¹ç®€ä»‹</p>', '1429353051'),
(3, 'plan', '<p><img src="/ueditor/php/upload/image/panda.jpg" title="panda.jpg" alt="panda.jpg"/></p><p style="line-height: 16px;"><img style="vertical-align: middle; margin-right: 2px;" src="http://localhost/IBM-BigData-course-mainpage/lib/ueditor/dialogs/attachment/fileTypeImages/icon_jpg.gif"/><a style="font-size:12px; color:#0066cc;" href="/ueditor/php/upload/file/panda.jpg" title="panda.jpg">panda.jpg</a></p><p style="line-height: 16px;"><img style="vertical-align: middle; margin-right: 2px;" src="http://localhost/IBM-BigData-course-mainpage/lib/ueditor/dialogs/attachment/fileTypeImages/icon_jpg.gif"/><a style="font-size:12px; color:#0066cc;" href="/ueditor/php/upload/file/panda.jpg" title="panda.jpg">panda.jpg</a></p><p><br/></p>', '1429354427'),
(4, 'outline', '', '1429096418'),
(5, 'ppt_download', '', '1429096418'),
(6, 'video_download', '', '1429096418'),
(7, 'lab1', '', '1429096418'),
(8, 'lab2', '', '1429096418'),
(9, 'lab3', '', '1429096418'),
(10, 'lab4', '', '1429096418'),
(11, 'homework', '', '1429096418'),
(12, 'answer', '', '1429096418'),
(13, 'test_outline', '', '1429096418'),
(14, 'simulating1', '', '1429096418'),
(15, 'simulating2', '', '1429096418'),
(16, 'reference', '', '1429096418'),
(17, 'assessment', '', '1429096418'),
(18, 'resource', '', '1429096418');

-- --------------------------------------------------------

--
-- 表的结构 `inform`
--

CREATE TABLE IF NOT EXISTS `inform` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8 NOT NULL,
  `content` text NOT NULL,
  `time` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uname` varchar(40) CHARACTER SET utf8 NOT NULL,
  `password` varchar(40) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `teacher`
--

INSERT INTO `teacher` (`id`, `uname`, `password`) VALUES
(1, 'test', '098f6bcd4621d373cade4e832627b4f6');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
