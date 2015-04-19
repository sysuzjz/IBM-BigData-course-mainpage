-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 04 月 19 日 07:01
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
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `author` varchar(40) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `time` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `content`
--

INSERT INTO `content` (`id`, `type`, `content`, `time`) VALUES
(1, 'description', '', '1429440429'),
(2, 'summary', '', '1429353051'),
(3, 'plan', '', '1429354427'),
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
(17, 'assessment', '<p>å¯ä»¥åœ¨ä¸‹é¢å‘è¡¨è¯„è®º</p>', '1429442888'),
(18, 'resource', '', '1429096418'),
(19, 'teacher', '', '1429096418');

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
-- 表的结构 `pageview`
--

CREATE TABLE IF NOT EXISTS `pageview` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `count` int(10) NOT NULL DEFAULT '0',
  `year` varchar(4) NOT NULL,
  `month` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

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
