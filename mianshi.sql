-- phpMyAdmin SQL Dump
-- version 3.1.0
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 09 月 29 日 02:14
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `mianshi`
--

-- --------------------------------------------------------

--
-- 表的结构 `pre_dev`
--

CREATE TABLE IF NOT EXISTS `pre_dev` (
  `id` int(11) NOT NULL auto_increment,
  `dev_name` varchar(50) NOT NULL,
  `sn` int(12) NOT NULL,
  `type_id` tinyint(3) NOT NULL,
  `price` decimal(8,0) NOT NULL,
  `time` int(10) NOT NULL,
  `contract_sn` int(12) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `config_info` varchar(255) NOT NULL,
  `buy_user` varchar(50) NOT NULL,
  `store_place` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `pre_dev`
--


-- --------------------------------------------------------

--
-- 表的结构 `pre_role`
--

CREATE TABLE IF NOT EXISTS `pre_role` (
  `id` int(11) NOT NULL auto_increment,
  `role_name` varchar(90) NOT NULL,
  `node_ids` varchar(90) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=9 ;

--
-- 导出表中的数据 `pre_role`
--

INSERT INTO `pre_role` (`id`, `role_name`, `node_ids`) VALUES
(5, '33333322222', ''),
(6, 'qqqqqq', ''),
(7, '3333332222', '');

-- --------------------------------------------------------

--
-- 表的结构 `pre_type`
--

CREATE TABLE IF NOT EXISTS `pre_type` (
  `id` tinyint(5) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `pre_type`
--


-- --------------------------------------------------------

--
-- 表的结构 `pre_user`
--

CREATE TABLE IF NOT EXISTS `pre_user` (
  `id` int(10) NOT NULL auto_increment,
  `user_name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `pre_user`
--

