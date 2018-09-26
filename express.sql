-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-08-21 15:51:51
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `express`
--

-- --------------------------------------------------------

--
-- 表的结构 `ui_adress`
--

CREATE TABLE `ui_adress` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` text NOT NULL,
  `mobile` text NOT NULL,
  `area` text NOT NULL,
  `location` text NOT NULL,
  `sort` int(5) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ui_adress`
--

INSERT INTO `ui_adress` (`id`, `userid`, `name`, `mobile`, `area`, `location`, `sort`) VALUES
(1, 15, '石万', '18691418842', '东区', '北七319', 43),
(3, 15, '石万', '18329684862', '西区', '北三405', 45),
(28, 15, '石万', '18691418842', '东区', '北三304', 39),
(7, 15, '石万', '18329684862', '东区', '北三406', 41),
(37, 11, '石万啊', '18691418842', '东区', '北三328', 3),
(36, 11, '石万', '18329684862', '东区', '北三319', 1);

-- --------------------------------------------------------

--
-- 表的结构 `ui_express`
--

CREATE TABLE `ui_express` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ui_express`
--

INSERT INTO `ui_express` (`id`, `name`) VALUES
(1, '圆通快递'),
(2, '中通快递'),
(3, '申通快递'),
(4, '韵达快递');

-- --------------------------------------------------------

--
-- 表的结构 `ui_floor`
--

CREATE TABLE `ui_floor` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ui_order`
--

CREATE TABLE `ui_order` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `ordernum` text NOT NULL,
  `number` text NOT NULL,
  `express` text NOT NULL,
  `name` text NOT NULL,
  `mobile` text NOT NULL,
  `area` text NOT NULL,
  `location` text NOT NULL,
  `paytime` int(11) NOT NULL,
  `finishtime` int(11) DEFAULT NULL,
  `note` text,
  `status` int(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ui_order`
--

INSERT INTO `ui_order` (`id`, `userid`, `ordernum`, `number`, `express`, `name`, `mobile`, `area`, `location`, `paytime`, `finishtime`, `note`, `status`) VALUES
(8, 15, '2018081800555651101', '467349', '中通快递', '石万', '18329684862', '西区', '北三405', 1534524916, NULL, '拉啦啦啦', 1),
(7, 11, '2018081800374948975', '4461616', '申通快递', '石万', '18329684862', '东区', '北三319', 1534523872, NULL, '啊啦啦啦啦', 1),
(6, 11, '2018081800374948975', '4461616', '申通快递', '石万', '18329684862', '东区', '北三319', 1534523872, NULL, '啊啦啦啦啦', 2);

-- --------------------------------------------------------

--
-- 表的结构 `ui_userinfo`
--

CREATE TABLE `ui_userinfo` (
  `id` int(11) NOT NULL,
  `headimgurl` varchar(150) DEFAULT NULL,
  `openid` text,
  `nickname` varchar(60) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `integral` int(4) NOT NULL DEFAULT '0',
  `sex` int(2) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ui_userinfo`
--

INSERT INTO `ui_userinfo` (`id`, `headimgurl`, `openid`, `nickname`, `level`, `integral`, `sex`, `addtime`) VALUES
(13, 'http://thirdwx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTJ2Ynhnd93otBjNl4xCzBic44xKhahQicKicFOXvTE57wibRxAwDwOicynw2DaoyvhD0WIgqYTvzibqKFfQ/132', 'o1hEn1W9oVzYQ4jZcWADD4HDS_3U', '黄青。', NULL, 0, 1, 1534638825),
(11, 'http://thirdwx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTIjXUeZp8qU22zUzdtJDLNng8tawlHb009Fx7vp2AVdJgbZqvd4KmOjCBHfKUK4bh826Aq3HLicZ1g/132', 'o1hEn1alhPweFdSFAlRvtZ0s49ts', 'Mis&los', NULL, 0, 1, 1534865109),
(15, 'http://thirdwx.qlogo.cn/mmopen/vi_32/mhVD1iaZW2lkgxbjUibiajQ7lr7CaJThicgUGafFxp1FeqG5pgDJcOuxSXwNQoN6GTeDDMDGR7NTeInZpxZLu7LSIQ/132', 'o1hEn1Sk8wx1ZpXAKm30yyi9dbNY', '匆匆幾年。', NULL, 0, 0, 1534864560);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ui_adress`
--
ALTER TABLE `ui_adress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ui_express`
--
ALTER TABLE `ui_express`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ui_floor`
--
ALTER TABLE `ui_floor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ui_order`
--
ALTER TABLE `ui_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ui_userinfo`
--
ALTER TABLE `ui_userinfo`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `ui_adress`
--
ALTER TABLE `ui_adress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- 使用表AUTO_INCREMENT `ui_express`
--
ALTER TABLE `ui_express`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `ui_floor`
--
ALTER TABLE `ui_floor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `ui_order`
--
ALTER TABLE `ui_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `ui_userinfo`
--
ALTER TABLE `ui_userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
