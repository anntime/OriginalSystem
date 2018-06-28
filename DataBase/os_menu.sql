-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 03 月 21 日 14:00
-- 服务器版本: 5.5.16
-- PHP 版本: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `original`
--

-- --------------------------------------------------------

--
-- 表的结构 `os_menu`
--

CREATE TABLE IF NOT EXISTS `os_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '标题',
  `Pid` int(10) NOT NULL,
  `Url` varchar(64) CHARACTER SET utf8 NOT NULL,
  `Group` varchar(64) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `os_menu`
--

INSERT INTO `os_menu` (`id`, `Title`, `Pid`, `Url`, `Group`) VALUES
(1, '管理首页', 0, 'Index/index', '首页'),
(2, '用户管理', 0, 'UserManage/index', '用户管理'),
(3, '用户管理', 2, 'UserManage/listinfo', '用户信息'),
(4, '用户列表', 3, 'UserManage/listUserInfo', ''),
(5, '新增用户', 2, 'UserManage/UserAdd', '编辑用户'),
(6, '编辑用户', 2, 'UserManage/EditUser', ''),
(7, '预留模块', 2, 'UserManage/Remain', ''),
(8, '信任评估', 0, 'Evalue/index', '信任评估'),
(9, '间接信任', 8, 'Evalue/Indirect', '评估设置'),
(10, '信任评估', 9, 'Evalue/IndirectSetting', ''),
(11, '直接信任', 8, 'Evalue/direct', ''),
(12, '所占比重', 8, 'Evalue/Percent', ''),
(13, '综合仲裁', 11, 'Evalue/TotalJudge', ''),
(14, '参数设定', 11, 'Evalue/directSetting', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
