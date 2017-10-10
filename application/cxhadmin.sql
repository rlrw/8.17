-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 08 月 17 日 06:46
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `cxhadmin`
--

-- --------------------------------------------------------

--
-- 表的结构 `agent`
--

CREATE TABLE IF NOT EXISTS `agent` (
  `agent_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL COMMENT '用户姓名',
  `user_number` varchar(20) NOT NULL COMMENT '用户编号',
  `agent_level` varchar(20) NOT NULL,
  `license_number` varchar(20) NOT NULL COMMENT '营业执照编号',
  `corporate_phone` varchar(20) NOT NULL COMMENT '公司电话',
  `corporate_address` varchar(255) NOT NULL COMMENT '公司地址',
  `corporate_name` varchar(255) NOT NULL COMMENT '公司名称',
  `province` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `county` varchar(20) NOT NULL,
  `user_id` int(10) NOT NULL COMMENT '用户ID',
  `time` int(11) NOT NULL COMMENT '申请时间',
  `agent_state` tinyint(1) NOT NULL COMMENT '申请状态',
  PRIMARY KEY (`agent_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `agent`
--

INSERT INTO `agent` (`agent_id`, `user_name`, `user_number`, `agent_level`, `license_number`, `corporate_phone`, `corporate_address`, `corporate_name`, `province`, `city`, `county`, `user_id`, `time`, `agent_state`) VALUES
(1, '成都', 'CXH20171', '省代理商', '12313213123213', '1213211231', '测试地址', '测试公司', '上海', '杨浦区', '', 1, 1502691969, 0),
(2, '成都', 'CXH20171', '市代理商', '231321321231', '135465465456', '测试地址', '测试公司', '天津', '河东区', '', 1, 1502702529, 0);

-- --------------------------------------------------------

--
-- 表的结构 `agent_images`
--

CREATE TABLE IF NOT EXISTS `agent_images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `self_url` varchar(50) NOT NULL,
  `small_url` varchar(50) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `agent_images`
--

INSERT INTO `agent_images` (`image_id`, `user_id`, `self_url`, `small_url`) VALUES
(1, 1, 'self/2017/08/14/15026919694237.jpg', 'small/2017/08/14/15026919693142.jpg'),
(2, 1, 'self/2017/08/14/15027025295237.jpg', 'small/2017/08/14/15027025294854.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `area_name` varchar(50) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `area_id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`area_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `audit`
--

CREATE TABLE IF NOT EXISTS `audit` (
  `audit_remarks` text,
  `audit_time` int(10) NOT NULL,
  `audit_state` tinyint(1) NOT NULL,
  `staff_id` int(10) NOT NULL,
  `menu_id` int(10) NOT NULL,
  `record_id` int(10) NOT NULL,
  `audit_id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`audit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `bank_name` varchar(50) NOT NULL,
  `bank_id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`bank_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `bank`
--

INSERT INTO `bank` (`bank_name`, `bank_id`) VALUES
('中国银行', 1),
('中国工商银行', 2),
('中国建设银行', 3),
('中国农业银行', 4),
('中国邮政储蓄', 5),
('招商银行', 6),
('中国光大银行', 7),
('交通银行', 8);

-- --------------------------------------------------------

--
-- 表的结构 `buying`
--

CREATE TABLE IF NOT EXISTS `buying` (
  `buy_id` int(10) NOT NULL AUTO_INCREMENT,
  `plate_number` varchar(20) NOT NULL COMMENT '车牌号',
  `vin_number` varchar(17) NOT NULL,
  `car_model` varchar(50) NOT NULL COMMENT '车型',
  `buy_total` decimal(12,2) NOT NULL COMMENT '购车金额',
  `buy_time` int(11) NOT NULL COMMENT '购车时间',
  `user_id` int(10) NOT NULL,
  `time` int(11) NOT NULL,
  `buy_state` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`buy_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `buying`
--

INSERT INTO `buying` (`buy_id`, `plate_number`, `vin_number`, `car_model`, `buy_total`, `buy_time`, `user_id`, `time`, `buy_state`) VALUES
(1, '川A 35654', '32123123121', '2223', '0.00', 1502121600, 1, 1502694011, 0),
(2, '川B 54565', '3212312', '宝马', '520000.00', 1502294400, 1, 1502695114, 0),
(3, '川B 54565', '3212312', '宝马', '520000.00', 1502294400, 1, 1502695146, 0),
(4, '川M 52432', '6546545645645', '奔驰', '1000000.00', 1501603200, 1, 1502695282, 0);

-- --------------------------------------------------------

--
-- 表的结构 `examine`
--

CREATE TABLE IF NOT EXISTS `examine` (
  `examine_id` int(10) NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `sort` int(2) NOT NULL,
  PRIMARY KEY (`examine_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `examine`
--

INSERT INTO `examine` (`examine_id`, `menu_id`, `role_id`, `sort`) VALUES
(25, 1, 1, 3),
(22, 5, 3, 3),
(24, 1, 3, 2),
(4, 3, 3, 1),
(5, 3, 2, 2),
(6, 2, 1, 1),
(7, 5, 1, 1),
(8, 5, 2, 2),
(9, 2, 6, 2),
(10, 2, 4, 3),
(11, 4, 2, 1),
(12, 4, 1, 2),
(23, 1, 4, 1);

-- --------------------------------------------------------

--
-- 表的结构 `fx_user`
--

CREATE TABLE IF NOT EXISTS `fx_user` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `uid` int(200) NOT NULL,
  `pid` int(200) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `lv` varchar(20) DEFAULT NULL,
  `reg_time` varchar(40) DEFAULT NULL,
  `userid` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `fx_user`
--

INSERT INTO `fx_user` (`id`, `uid`, `pid`, `name`, `lv`, `reg_time`, `userid`) VALUES
(2, 1, 0, '成都', '20000', '2017-08-16 17:09:23', 'CXH201758'),
(3, 45, 1, '绵阳', '3000', '2017-08-16 17:09:23', 'CXH201758'),
(13, 59, 1, '内江', '3000', '2017-08-16 17:09:23', 'CXH201758'),
(14, 60, 1, '上海', '3000', '2017-08-16 17:09:23', 'CXH201758'),
(15, 61, 1, '天津', '20000', '2017-08-16 17:09:58', 'CXH201758'),
(16, 62, 61, '广州', '20000', '2017-08-16 17:15:38', 'CXH201758'),
(17, 63, 60, '长春', 'VIP经销商', '2017-08-17 09:58:20', ''),
(18, 69, 1, '546546', 'VIP经销商', '2017-08-17 10:21:40', ''),
(19, 70, 61, '德阳', 'VIP经销商', '2017-08-17 10:23:59', ''),
(20, 71, 1, '广元', 'VIP经销商', '2017-08-17 10:27:58', 'CXH201771');

-- --------------------------------------------------------

--
-- 表的结构 `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(10) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(30) NOT NULL,
  `menu_url` varchar(50) NOT NULL,
  `parent_id` int(10) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_url`, `parent_id`) VALUES
(1, '汇款申请审核', 'remittance', 1),
(2, '提现申请审核', 'withdraw', 1),
(3, '代理商申请审核', 'agent', 1),
(4, '服务中心申请审核', 'service', 1),
(5, '购车返现申请审核', 'buying_information', 1),
(9, '员工管理', 'staff', 0),
(10, '审核流程管理', 'procedure', 0);

-- --------------------------------------------------------

--
-- 表的结构 `public_notice`
--

CREATE TABLE IF NOT EXISTS `public_notice` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `remittance`
--

CREATE TABLE IF NOT EXISTS `remittance` (
  `remittance_id` int(11) NOT NULL AUTO_INCREMENT,
  `payee_number` varchar(19) NOT NULL COMMENT '收款账户',
  `bank_id` int(11) NOT NULL COMMENT '汇款银行',
  `subBranch` varchar(255) NOT NULL COMMENT '支行',
  `remitter` varchar(30) NOT NULL COMMENT '汇款人',
  `remit_number` varchar(19) NOT NULL COMMENT '汇款账号',
  `remit_total` decimal(12,2) NOT NULL COMMENT '汇款金额',
  `remit_state` tinyint(1) NOT NULL COMMENT '申请状态',
  `remit_time` int(11) NOT NULL COMMENT '汇款日期',
  `remit_order` varchar(50) NOT NULL COMMENT '汇款单号',
  `remitter_phone` varchar(11) NOT NULL COMMENT '联系电话',
  `remarks` text COMMENT '备注',
  `time` int(11) NOT NULL COMMENT '申请时间',
  `user_id` int(10) NOT NULL COMMENT '用户id',
  `state_level` int(2) NOT NULL,
  PRIMARY KEY (`remittance_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1010 ;

--
-- 转存表中的数据 `remittance`
--

INSERT INTO `remittance` (`remittance_id`, `payee_number`, `bank_id`, `subBranch`, `remitter`, `remit_number`, `remit_total`, `remit_state`, `remit_time`, `remit_order`, `remitter_phone`, `remarks`, `time`, `user_id`, `state_level`) VALUES
(1001, '64325321654782153', 1, '高新区分行', '张三', '65412354452168975', '6524.00', 2, 1502269363, '1102354442153556', '13526487523', '请审核快点！', 1502208000, 1, 0),
(1002, '64325321654782153', 1, '高新区分行', '张三', '65412354452168975', '6524.00', 1, 1502269455, '1102354442153556', '13526487523', '请审核快点！', 1502208000, 1, 0),
(1003, '64325321654782153', 1, '高新区分行', '张三', '65412354452168975', '6524.00', 0, 1502269459, '1102354442153556', '13526487523', '请审核快点！', 1502208000, 1, 0),
(1004, '64321521321322221', 4, '南区', '李四', '65131222231221222', '4545.00', 0, 1502346317, '13212213232123', '15432545555', '大神', 1503417600, 0, 0),
(1005, '64321521321322221', 4, '南区', '李四', '65131222231221222', '4545.00', 0, 1502346492, '13212213232123', '15432545555', '大神', 1503417600, 0, 0),
(1006, '', 0, '青羊区', '张三', '654653212121221321', '12000.00', 0, 1502640000, '132132121332', '13522121212', NULL, 1503417623, 0, 0),
(1007, '(中国农业银行绵阳西南科技大学支行)2', 0, '金牛区', '李四', '654653212121221321', '5200.00', 0, 1502467200, '13213212132132', '15564546845', NULL, 1502680765, 0, 0),
(1008, '(中国农业银行绵阳西南科技大学支行)2', 1, '测试银行1', '测试姓名', '65465454545454565', '65100.00', 0, 1502294400, '12312132212', '13562266665', NULL, 1502700980, 0, 0),
(1009, '(中国农业银行绵阳西南科技大学支行)2', 6, '测试银行2', '测试姓名2', '654654564545', '12500.00', 0, 0, '345465456', '13526654654', NULL, 1502701325, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_name` varchar(30) NOT NULL,
  `role_id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `role`
--

INSERT INTO `role` (`role_name`, `role_id`) VALUES
('董事长', 1),
('总经理', 2),
('财务总监', 3),
('出纳', 4),
('系统管理员', 5),
('汇款人', 6);

-- --------------------------------------------------------

--
-- 表的结构 `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `service_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `user_number` varchar(20) NOT NULL,
  `license_number` varchar(20) NOT NULL,
  `corporate_phone` varchar(20) NOT NULL,
  `corporate_address` varchar(255) NOT NULL,
  `corporate_name` varchar(255) NOT NULL,
  `province` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `county` varchar(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `time` int(11) NOT NULL,
  `service_state` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`service_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `service`
--

INSERT INTO `service` (`service_id`, `user_name`, `user_number`, `license_number`, `corporate_phone`, `corporate_address`, `corporate_name`, `province`, `city`, `county`, `user_id`, `time`, `service_state`) VALUES
(1, '张三', 'CXH201423', '3434234234234', '12324124', '水电费', '大公司', '天津', '河东区', '', 1, 1502685092, 0),
(2, '', 'CXH201423', '2132121232', '35213212', '青羊区', '小公司', '山西', '太原', '迎泽区', 1, 1502685577, 0),
(3, '', 'CXH201423', '6546545', '21321', '水电', '水电费', '天津', '河东区', '', 1, 1502685724, 0),
(4, '', '', '6546545', '21321', '水电', '水电费', '天津', '', '', 1, 1502685747, 0),
(5, '', 'CXH201423', '31121212312', '132121', '金牛区', '开发公司', '黑龙江', '齐齐哈尔', '铁锋区', 1, 1502685853, 0),
(6, '', '', '32135454545', '1354625665', '上海', '新能源', '吉林', '白城', '镇赉县', 1, 1502691771, 0),
(7, '', 'CXH201423', '13212312312', '13546545645', '测试', '测试', '河北', '秦皇岛', '山海关区', 1, 1502786935, 0);

-- --------------------------------------------------------

--
-- 表的结构 `service_images`
--

CREATE TABLE IF NOT EXISTS `service_images` (
  `image_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `small_url` varchar(50) NOT NULL COMMENT '缩略图路劲',
  `self_url` varchar(50) NOT NULL COMMENT '原图路径',
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `service_images`
--

INSERT INTO `service_images` (`image_id`, `user_id`, `small_url`, `self_url`) VALUES
(6, 1, 'small/2017/08/14/15026917716892.jpg', 'self/2017/08/14/15026917713187.jpg'),
(2, 1, 'small/2017/08/14/15026855773742.jpg', 'self/2017/08/14/15026855779672.jpg'),
(3, 1, 'small/2017/08/14/15026857242354.jpg', 'self/2017/08/14/15026857242673.jpg'),
(4, 1, 'small/2017/08/14/15026857476103.jpg', 'self/2017/08/14/15026857472859.jpg'),
(5, 1, 'small/2017/08/14/15026858536851.jpg', 'self/2017/08/14/15026858531498.jpg'),
(7, 1, 'small/2017/08/15/15027869352251.jpg', 'self/2017/08/15/15027869351435.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(10) NOT NULL AUTO_INCREMENT,
  `staff_number` varchar(10) NOT NULL,
  `staff_account` varchar(50) NOT NULL,
  `staff_password` varchar(50) NOT NULL,
  `staff_name` varchar(20) NOT NULL,
  `staff_sex` enum('1','0') NOT NULL,
  `staff_phone` varchar(11) NOT NULL,
  `staff_address` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `staff_role` varchar(50) NOT NULL,
  `staff_state` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`staff_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_number`, `staff_account`, `staff_password`, `staff_name`, `staff_sex`, `staff_phone`, `staff_address`, `time`, `staff_role`, `staff_state`) VALUES
(1, 'cxh100001', 'jm000001', 'e10adc3949ba59abbe56e057f20f883e', '测试姓名5', '0', '13564524525', '青羊区', 1503526652, '1', 1),
(2, 'cxh100002', 'jm000002', 'f379eaf3c831b04de153469d1bec345e', 'hello', '0', '1356452555', '金牛区', 1502654212, '2', 2),
(3, 'cxh100003', 'jm000003', 'f379eaf3c831b04de153469d1bec345e', '测试姓名3', '1', '13564524525', '开发区', 1502268516, '3', 2),
(4, 'cxh100004', 'jm000004', 'f379eaf3c831b04de153469d1bec345e', '测试姓名4', '1', '13564524525', '高新区', 1502235201, '4', 2),
(5, 'cxh100005', 'jm000005', 'f379eaf3c831b04de153469d1bec345e', '测试姓名5', '1', '13564524525', '锦江区', 1502165200, '5', 1),
(6, 'cxh100006', 'jm000006', 'f379eaf3c831b04de153469d1bec345e', '测试姓名6', '0', '13554654655', '软件园', 1502210000, '6', 1),
(11, 'cxh100010', 'jm111101', 'f379eaf3c831b04de153469d1bec345e', '张三', '1', '13545654567', '青羊区', 1502220000, '6', 2),
(12, 'CXH100020', 'jm000020', 'e10adc3949ba59abbe56e057f20f883e', '测试姓名', '0', '13562266665', '成都市', 1502230000, '4', 2),
(13, 'CXH231512', 'jm156222', 'e10adc3949ba59abbe56e057f20f883e', '测试', '1', '1563236548', 'ces', 1502269455, '2', 2);

-- --------------------------------------------------------

--
-- 表的结构 `ulist`
--

CREATE TABLE IF NOT EXISTS `ulist` (
  `remark` varchar(255) DEFAULT NULL,
  `cid` mediumint(8) NOT NULL,
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `money` int(11) NOT NULL,
  `balance` int(11) NOT NULL COMMENT '余额',
  `act` varchar(60) CHARACTER SET utf8 NOT NULL COMMENT '产生途径',
  `uid` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`,`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `ulist`
--

INSERT INTO `ulist` (`remark`, `cid`, `id`, `datetime`, `money`, `balance`, `act`, `uid`) VALUES
('好', 0, 6, '2017-08-14 07:58:52', 20000, 888631888, '定金加盟', 1),
('啊', 0, 5, '2017-08-14 07:44:57', 3333, 3333, '添加', 1),
(NULL, 0, 4, '2017-08-14 07:35:54', 20000, 888651888, '定金加盟', 1),
(NULL, 0, 7, '2017-08-14 07:59:22', 3000, 888628888, '定金加盟', 1),
(NULL, 57, 8, '2017-08-15 06:42:04', 20000, 888608888, '定金加盟', 1),
(NULL, 1, 9, '2017-08-16 06:10:39', 100, 0, '收益转现金', 1),
(NULL, 1, 10, '2017-08-16 06:19:08', 100, 100, '收益转现金', 1),
(NULL, 1, 11, '2017-08-16 06:36:07', 6000, 6000, '收益转现金', 1),
(NULL, 1, 12, '2017-08-16 06:40:26', 2000, 8000, '收益转现金', 1),
(NULL, 58, 13, '2017-08-16 09:00:32', 3000, 5000, '定金加盟', 1),
(NULL, 59, 14, '2017-08-16 09:00:44', 3000, 2000, '定金加盟', 1),
(NULL, 60, 15, '2017-08-16 09:09:23', 3000, 1997000, '定金加盟', 1),
(NULL, 61, 16, '2017-08-16 09:09:58', 20000, 1977000, '定金加盟', 1),
(NULL, 62, 17, '2017-08-16 09:15:38', 20000, 1957000, '定金加盟', 1),
(NULL, 63, 18, '2017-08-17 01:58:20', 20000, 1937000, '定金加盟', 1),
(NULL, 64, 19, '2017-08-17 02:06:11', 3000, 1934000, '定金加盟', 1),
(NULL, 65, 20, '2017-08-17 02:06:17', 3000, 1931000, '定金加盟', 1),
(NULL, 69, 21, '2017-08-17 02:21:40', 20000, 1911000, '定金加盟', 1),
(NULL, 70, 22, '2017-08-17 02:23:59', 20000, 1891000, '定金加盟', 1),
(NULL, 71, 23, '2017-08-17 02:27:58', 20000, 1871000, '定金加盟', 1);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) CHARACTER SET utf8 NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 NOT NULL,
  `last_login` varchar(60) CHARACTER SET utf8 NOT NULL COMMENT '上次登录时间',
  `last_ip` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '上次登录IP',
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  `pay_points` int(20) unsigned NOT NULL COMMENT '收益积分',
  `car_nowpoints` int(20) unsigned NOT NULL COMMENT '当日车补积分',
  `dj_points` int(20) NOT NULL COMMENT '冻结收益积分',
  `cx_points` int(20) unsigned NOT NULL COMMENT '重消积分',
  `shoping_points` int(20) unsigned NOT NULL COMMENT '购物积分',
  `pocess_points` int(20) unsigned NOT NULL COMMENT '已返积分',
  `no_points` int(20) unsigned NOT NULL COMMENT '未返积分',
  `cash_points` int(20) unsigned NOT NULL COMMENT '现金积分',
  `perf` int(20) unsigned NOT NULL COMMENT '累计销售额',
  `userid` varchar(60) CHARACTER SET utf8mb4 NOT NULL,
  `card` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '身份证',
  `fwzx` varchar(60) CHARACTER SET utf8 NOT NULL COMMENT '服务中心',
  `province` varchar(60) CHARACTER SET utf8 NOT NULL,
  `city` varchar(60) CHARACTER SET utf8 NOT NULL,
  `county` varchar(60) CHARACTER SET utf8 NOT NULL,
  `lv` varchar(60) CHARACTER SET utf8 NOT NULL,
  `ejmm` int(20) NOT NULL COMMENT '二级密码',
  `bank` varchar(60) CHARACTER SET utf8 NOT NULL,
  `bankcard` varchar(60) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=72 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `phone`, `last_login`, `last_ip`, `reg_time`, `pay_points`, `car_nowpoints`, `dj_points`, `cx_points`, `shoping_points`, `pocess_points`, `no_points`, `cash_points`, `perf`, `userid`, `card`, `fwzx`, `province`, `city`, `county`, `lv`, `ejmm`, `bank`, `bankcard`) VALUES
(1, '成都', 'e10adc3949ba59abbe56e057f20f883e', '1566666666', '2017-08-17 09:24:12', '127.0.0.1', '2017-08-08 16:00:00', 12000, 2000, 20, 211, 44444, 66666, 50, 1871000, 222, 'CXH20171', '0', '', '', '', '', '20000', 123456, 'cdSS', '888888888888'),
(61, '天津', 'c8ffe9a587b126f152ed3d89a146b445', '15666666661', '', '', '2017-08-16 09:09:58', 0, 0, 0, 0, 20000, 0, 0, 0, 0, 'CXH201761', '454', 'cd', '天津', '和平区', '', '20000', 444444, '', ''),
(62, '广州', '1d72310edc006dadf2190caad5802983', '15666666661', '', '', '2017-08-16 09:15:38', 0, 0, 0, 0, 20000, 0, 0, 0, 0, 'CXH201762', '2121', 'my', '北京', '东城区', '', '20000', 111111, '', ''),
(63, '长春', 'c5fe25896e49ddfe996db7508cf00534', '15666666661', '', '', '2017-08-17 01:58:20', 0, 0, 0, 0, 20000, 0, 0, 0, 0, 'CXH201763', '512511555', 'cd', '北京', '东城区', '', '20000', 124556, '', ''),
(64, '854846', 'aee1bc7fa5da061b752d0efddbd16495', '15666666661', '', '', '2017-08-17 02:06:11', 0, 0, 0, 0, 3000, 0, 0, 0, 0, 'CXH201764', '846486', 'cd', '北京', '顺义区', '', '3000', 125554, '', ''),
(65, '854846', 'aee1bc7fa5da061b752d0efddbd16495', '15666666661', '', '', '2017-08-17 02:06:17', 0, 0, 0, 0, 3000, 0, 0, 0, 0, 'CXH201765', '846486', 'cd', '北京', '顺义区', '', '3000', 125554, '', ''),
(66, '854846', 'aee1bc7fa5da061b752d0efddbd16495', '15666666661', '', '', '2017-08-17 02:16:02', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '846486', 'cd', '北京', '顺义区', '', '3000', 125554, '', ''),
(67, '546546', 'a330238f5e5026982abe38b8f2215898', '15666666661', '', '', '2017-08-17 02:17:58', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '88888888888', 'cd', '北京', '顺义区', '', '20000', 456456, '', ''),
(68, '546546', 'a330238f5e5026982abe38b8f2215898', '15666666661', '', '', '2017-08-17 02:19:04', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '88888888888', 'cd', '北京', '顺义区', '', '20000', 456456, '', ''),
(69, '546546', 'a330238f5e5026982abe38b8f2215898', '15666666661', '', '', '2017-08-17 02:21:40', 0, 0, 0, 0, 20000, 0, 0, 0, 0, 'CXH201769', '88888888888', 'cd', '北京', '顺义区', '', '20000', 456456, '', ''),
(70, '德阳', '7f1de29e6da19d22b51c68001e7e0e54', '15666666661', '', '', '2017-08-17 02:23:59', 0, 0, 0, 0, 20000, 0, 0, 0, 0, 'CXH201770', '62656', 'cd', '北京', '东城区', '', '20000', 153513, '', ''),
(71, '广元', '02b1be0d48924c327124732726097157', '15666666661', '', '', '2017-08-17 02:27:58', 0, 0, 0, 0, 20000, 0, 0, 0, 0, 'CXH201771', '454444', 'cd', '北京', '东城区', '', '20000', 121222, '', ''),
(60, '上海', 'dbc4d84bfcfe2284ba11beffb853a8c4', '15666666664', '', '', '2017-08-16 09:09:23', 0, 0, 0, 0, 3000, 0, 0, 0, 0, 'CXH201760', '547', 'cd', '北京', '东城区', '', '3000', 455444, '', ''),
(58, '猩猩传媒', 'e10adc3949ba59abbe56e057f20f883e', '13500000001', '2017-08-16 17:01:55', '192.168.1.166', '2017-08-16 09:00:32', 0, 0, 0, 0, 3000, 0, 0, 0, 0, 'CXH201758', '510601321456478', 'cd', '福建', '福州', '福清市', '3000', 123456, '', ''),
(59, '内江', 'ae77127e4b686c28dcab89cc68d85aea', '15555555555', '', '', '2017-08-16 09:00:44', 0, 0, 0, 0, 3000, 0, 0, 0, 0, 'CXH201759', '3222', 'cd', '北京', '通州区', '', '3000', 123111, '', '');

-- --------------------------------------------------------

--
-- 表的结构 `withdraw`
--

CREATE TABLE IF NOT EXISTS `withdraw` (
  `withdraw_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '用户名',
  `user_number` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '用户编号',
  `profit_integral` decimal(12,2) NOT NULL COMMENT '收益积分',
  `freeze_integral` decimal(12,2) NOT NULL COMMENT '冻结收益积分',
  `bank` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '银行名',
  `bank_number` varchar(30) CHARACTER SET utf8 NOT NULL,
  `total` decimal(12,2) NOT NULL COMMENT '提现金额',
  `remarks` text CHARACTER SET utf8 NOT NULL COMMENT '备注',
  `user_id` int(10) NOT NULL COMMENT '用户ID',
  `time` int(11) NOT NULL COMMENT '申请时间',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '申请状态',
  PRIMARY KEY (`withdraw_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `withdraw`
--

INSERT INTO `withdraw` (`withdraw_id`, `user_name`, `user_number`, `profit_integral`, `freeze_integral`, `bank`, `bank_number`, `total`, `remarks`, `user_id`, `time`, `state`) VALUES
(1, '张三', 'CXH7281501', '50000.00', '0.00', '中国建设银行（xxxx支行）', '1234567891234', '5000.00', '可以', 1, 0, 0),
(2, '张三', 'CXH7281501', '50000.00', '0.00', '中国建设银行（xxxx支行）', '1234567891234', '12000.00', '行吧', 1, 0, 1),
(3, '张三1', 'CXH7281501', '50000.00', '0.00', '中国建设银行（xxxx支行）', '1234567891234', '6500.00', '号的', 1, 0, 2),
(4, '成都', 'CXH20171', '55555.00', '20.00', 'cdSS', '888888888888', '6500.00', '', 1, 1502674985, 2),
(5, '成都', 'CXH20171', '55555.00', '20.00', 'cdSS', '888888888888', '12000.00', '', 1, 1502675052, 0),
(6, '成都', '55555', '20.00', '0.00', '888888888888', '1234567891234', '2500.00', '', 1, 1502677667, 0),
(7, '成都', '55555', '20.00', '0.00', '888888888888', '1234567891234', '3500.00', '', 1, 1502677891, 0),
(8, '成都', '55555', '20.00', '0.00', '888888888888', '1234567891234', '12000.00', '', 1, 1502678434, 0),
(9, '成都', '55555', '20.00', '0.00', '888888888888', '1234567891234', '35000.00', '', 1, 1502678466, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
