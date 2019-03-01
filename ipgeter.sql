-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2019-02-03 12:09:02
-- 服务器版本： 5.5.53
-- PHP 版本： 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `ipgeter`
--

-- --------------------------------------------------------

--
-- 表的结构 `record`
--

CREATE TABLE `record` (
  `ID` int(11) NOT NULL,
  `source` varchar(512) NOT NULL COMMENT '来源索引',
  `IP` varchar(512) NOT NULL COMMENT '访问IP',
  `QQ` varchar(512) NOT NULL COMMENT '访问QQ',
  `actTime` datetime NOT NULL COMMENT '访问时间',
  `viewFlag` varchar(512) NOT NULL COMMENT '浏览器标识'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `record`
--

INSERT INTO `record` (`ID`, `source`, `IP`, `QQ`, `actTime`, `viewFlag`) VALUES
(3, 'shituae', '127.0.0.1', '6666666', '2019-02-03 00:00:00', 'chrome'),
(4, 'test', '127.0.0.1', '未开发', '2019-02-03 00:00:00', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36'),
(5, 'test', '127.0.0.1', '未开发', '2019-02-03 18:28:22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36'),
(6, 'test2', '127.0.0.1', '未开发', '2019-02-03 18:29:41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36'),
(7, 'test2', '127.0.0.1', '未开发', '2019-02-03 18:30:57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36'),
(8, 'test2', '127.0.0.1', '未开发', '2019-02-03 18:31:21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36'),
(9, 'test', '127.0.0.1', '未开发', '2019-02-03 18:32:43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36'),
(10, 'test', '127.0.0.1', '未开发', '2019-02-03 18:32:49', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36'),
(11, 'test5', '127.0.0.1', '未开发', '2019-02-03 19:52:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36'),
(12, 'test5', '127.0.0.1', '未开发', '2019-02-03 19:59:15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36');

-- --------------------------------------------------------

--
-- 表的结构 `request`
--

CREATE TABLE `request` (
  `ID` int(11) NOT NULL COMMENT '顺序ID',
  `genID` varchar(512) NOT NULL COMMENT '访问ID',
  `viewPassword` varchar(32) NOT NULL COMMENT '查看记录密码',
  `jmpURL` varchar(512) NOT NULL COMMENT '跳转地址',
  `registerTime` datetime NOT NULL COMMENT '注册时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `request`
--

INSERT INTO `request` (`ID`, `genID`, `viewPassword`, `jmpURL`, `registerTime`) VALUES
(9, 'test2', 'e10adc3949ba59abbe56e057f20f883e', 'www.baidu.com', '2019-02-03 18:29:32'),
(10, 'test5', 'e10adc3949ba59abbe56e057f20f883e', 'https://space.bilibili.com/87649893', '2019-02-03 19:52:27'),
(8, 'test', '596a96cc7bf9108cd896f33c44aedc8a', 'https://space.bilibili.com/87649893', '2019-02-03 18:16:43'),
(7, 'shituae', 'b206e95a4384298962649e58dc7b39d4', 'www.bilibili.com', '2019-02-03 13:31:08');

--
-- 转储表的索引
--

--
-- 表的索引 `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`ID`);

--
-- 表的索引 `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`ID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `record`
--
ALTER TABLE `record`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用表AUTO_INCREMENT `request`
--
ALTER TABLE `request`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '顺序ID', AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
