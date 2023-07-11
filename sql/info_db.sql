-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2023-07-10 22:48:48
-- 服务器版本： 8.0.23
-- PHP 版本： 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `info_db`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `admin_id` tinyint NOT NULL COMMENT '管理员ID',
  `username` varchar(20) NOT NULL COMMENT '管理员用户名',
  `pwd` varchar(70) NOT NULL COMMENT '管理员密码',
  `group_id` mediumint DEFAULT NULL COMMENT '分组ID',
  `email` varchar(30) DEFAULT NULL COMMENT '邮箱',
  `realname` varchar(10) DEFAULT NULL COMMENT '真实姓名',
  `tel` varchar(30) DEFAULT NULL COMMENT '电话号码',
  `ip` varchar(20) DEFAULT NULL COMMENT 'IP地址',
  `add_time` int DEFAULT NULL COMMENT '添加时间',
  `mdemail` varchar(50) DEFAULT '0' COMMENT '传递修改密码参数加密',
  `is_open` tinyint DEFAULT '0' COMMENT '审核状态',
  `avatar` varchar(120) DEFAULT '' COMMENT '头像'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='后台管理员' ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `pwd`, `group_id`, `email`, `realname`, `tel`, `ip`, `add_time`, `mdemail`, `is_open`, `avatar`) VALUES
(10, 'yydsxyh', 'd23031d207cb8bca0bebd127782c944f', NULL, NULL, NULL, '13129770302', NULL, 1619255451, '0', 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `order`
--

CREATE TABLE `order` (
  `id` int NOT NULL,
  `email` varchar(100) NOT NULL DEFAULT '',
  `contact` varchar(100) NOT NULL DEFAULT '',
  `pay_to` varchar(100) NOT NULL DEFAULT '',
  `account_name` varchar(50) NOT NULL DEFAULT '',
  `account_no` varchar(100) NOT NULL DEFAULT '',
  `reference_number` varchar(100) NOT NULL DEFAULT '',
  `amount` int NOT NULL DEFAULT '0',
  `remark` text,
  `pay_date` varchar(10) NOT NULL DEFAULT '',
  `receipt` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `addtime` int NOT NULL DEFAULT '0',
  `back_remark` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `order`
--

INSERT INTO `order` (`id`, `email`, `contact`, `pay_to`, `account_name`, `account_no`, `reference_number`, `amount`, `remark`, `pay_date`, `receipt`, `status`, `addtime`, `back_remark`) VALUES
(1, 'test@qq.com', '3333', 'DuitNow 180489609731 WongYuHang', '3', '3', '', 3, '33344', '2023-07-04', '/public/uploads/20230710/b574d90c39112691477948fa124ec856.png', 0, 1688984335, '444444'),
(2, 'test@qq.com', '333', 'DuitNow 180489609731 WongYuHang', '3', '3', '', 3, '', '2023-07-04', '/public/uploads/20230709/d11e26ecdc9ebd1619b556e3a5bb93cd.png', 1, 1688904421, NULL),
(13, 'yydsxyh@gmail.com', '12356788', 'Touch n Go 0126673726 WongYuHang', 'dhsjkakak', 'hejsjwjqj', '', 100, '', '2023-07-10', '/public/uploads/20230710/de8c43635ecaa5dec7d6f8df2a5705c2.png', 2, 1688967810, NULL),
(14, 'yydsxyh@gmail.com', '12345789', 'DuitNow 180489609731 WongYuHang', 'WongYuHang', '3748492993', '', 50, '', '2023-07-10', '/public/uploads/20230710/080b3e42b070cb44affa29750f243463.png', 2, 1688968955, 'WRONG320942095345834589038509'),
(15, 'SBDAFJJFjwf', 'ADBASNAKSBKJANF', 'Paypal @yydspersonal', 'SDASDASD', 'ASDASDA', '', 90, '', '2023-07-10', '/public/uploads/20230710/c1d6d968527f801c06442381f32115fb.jpg', 0, 1688976406, NULL),
(16, 'djajakaka', 'sbjsjajaj', 'PublicBank 6466329711 WongYuHang', 'jdjsjsj', 'jsjssjsj', '', 50, '', '2023-07-10', '/public/uploads/20230710/3e02e1316996ac53fbab469b06308fba.jpeg', 0, 1689000152, NULL);

--
-- 转储表的索引
--

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`) USING BTREE,
  ADD KEY `admin_username` (`username`) USING BTREE;

--
-- 表的索引 `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` tinyint NOT NULL AUTO_INCREMENT COMMENT '管理员ID', AUTO_INCREMENT=11;

--
-- 使用表AUTO_INCREMENT `order`
--
ALTER TABLE `order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
