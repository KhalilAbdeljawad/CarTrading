/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : ltnet_db

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-02-16 11:49:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `division`
-- ----------------------------
DROP TABLE IF EXISTS `division`;
CREATE TABLE `division` (
  `division_id` int(11) NOT NULL,
  `management_id` int(11) NOT NULL DEFAULT '0',
  `division_code` char(5) NOT NULL DEFAULT '',
  `division_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`division_id`,`management_id`,`division_code`),
  KEY `mang_id_idx` (`management_id`),
  KEY `division_id` (`division_id`),
  CONSTRAINT `division_ibfk_1` FOREIGN KEY (`management_id`) REFERENCES `management` (`management_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of division
-- ----------------------------
INSERT INTO `division` VALUES ('1', '11', '', 'التدريب');
INSERT INTO `division` VALUES ('2', '4', '', 'الخدمات');
INSERT INTO `division` VALUES ('100', '4', '', '');
INSERT INTO `division` VALUES ('100', '5', '', '');
INSERT INTO `division` VALUES ('100', '6', '', '');
INSERT INTO `division` VALUES ('100', '7', '', '');
INSERT INTO `division` VALUES ('100', '8', '', '');
INSERT INTO `division` VALUES ('100', '10', '', '');
INSERT INTO `division` VALUES ('100', '11', '', null);
INSERT INTO `division` VALUES ('100', '12', '', '');

-- ----------------------------
-- Table structure for `employee`
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(65) DEFAULT NULL,
  `employee_email` varchar(45) DEFAULT NULL,
  `employee_username` char(30) DEFAULT NULL,
  `employee_pwd` char(34) NOT NULL COMMENT 'pwd',
  `management_id` int(11) DEFAULT NULL,
  `division_id` int(11) DEFAULT '0',
  `employee_state_id` int(11) DEFAULT NULL,
  `employee_ip` varchar(20) DEFAULT NULL,
  `employee_mac` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`employee_id`),
  KEY `mang2_fk_idx` (`management_id`),
  KEY `division2_fk_idx` (`division_id`),
  KEY `employee_state1+fk_idx` (`employee_state_id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`division_id`) REFERENCES `division` (`division_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`employee_state_id`) REFERENCES `employee_state` (`employee_state_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`management_id`) REFERENCES `management` (`management_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES ('2', 'هيثم مصباح', 'h.msahbin@ltnet.ly', 'haitham', 'f14ab06e63aecac642e7f1879d8ed93e', '12', '100', '7', '172.16.10.72', '08-ed-b9-2f-ff-84');
INSERT INTO `employee` VALUES ('3', 'فتحي يونس محمد التومي', 'fathi@ltnet.ly', 'Fathi', 'dde816751a0af76e9ff609589f09c6d1', '7', '100', '3', '172.16.30.20', '90-b1-1c-84-ef-a8');
INSERT INTO `employee` VALUES ('4', 'محفوظ محمد خليفة جعاكه', 'm.jaaka@ltnet.ly', 'Mahfud', 'f6b4b8a876308153959eba1c07b04f80', '5', '100', '4', '172.16.30.17', 'b8-ca-3a-a6-ee-49');
INSERT INTO `employee` VALUES ('6', 'بشير احمد بادي', 'b.badi@ltnet.ly', 'Bashir', '7a254065dd0fdaaf9b169de13f25edbf', '12', '100', '35', '172.16.10.75', '9c-2a-70-1d-8d-c8');
INSERT INTO `employee` VALUES ('7', 'محمد المبروك اللطيف', 'm.l@ltnet.ly', 'Ltaif', 'f83786eba06b956e5d427c5bca19e4fa', '11', '100', '37', '172.16.20.14', '90-b1-1c-84-ef-a2');
INSERT INTO `employee` VALUES ('8', 'المحفوظات', 'master', 'master', 'eb0a191797624dd3a48fa681d3061212', '4', '100', '100', null, null);
INSERT INTO `employee` VALUES ('12', 'حسني عبدالسلام محمد التومي', 'h.thomi@ltnet.ly', 'Hosni', '57b71c456afe592b528ad78a3bb1d792', '4', '2', '48', '172.16.30.41', '90-b1-1c-84-f1-f2');
INSERT INTO `employee` VALUES ('13', 'عمر محمد بارة', 'bara@ltnet.com', 'Bara', '4a9ebbf5505657334b669ce98fa5496f', '12', '100', '30', '172.16.10.15', 'c8-0a-a9-f0-17-d1');
INSERT INTO `employee` VALUES ('15', 'على محمد رمضان عصمان', 'a.osman@ltnet.ly', 'Ali', '86318e52f5ed4801abe1d13d509443de', '4', '100', '15', '172.16.30.30', '3c-77-e6-02-f7-c3');
INSERT INTO `employee` VALUES ('23', 'حافظ محمد عمران', 'omranhafed@gmail.ly', 'Hafed', 'a87ac84fa537352f0877f7bdc276f467', '11', '100', '23', '172.16.20.11', '90-b1-1c-84-ef-37');
INSERT INTO `employee` VALUES ('24', 'غزالة مصطفي خلف الله عبد العزيز', 'g.ghazala@ltnet.ly', 'Ghazala', 'c91ff270a6591599fbfe37fd33990327', '4', '2', '37', '172.16.30.32', '5c-f9-dd-74-3a-d4');
INSERT INTO `employee` VALUES ('25', 'محمد عياد سالم العباني', 'm.abani@ltnet.ly', 'Mohamed1', '309cd3800aacbd003ac36199fa537295', '10', '100', '25', '172.16.30.54', '9c-2a-70-34-fb-0d');
INSERT INTO `employee` VALUES ('29', 'محمد منصور عزيز', 'm.aziz@ltnet.ly', 'Mohamed2', '309cd3800aacbd003ac36199fa537295', '12', '100', '18', '172.16.10.53', 'b8-ca-3a-a6-e5-6e');
INSERT INTO `employee` VALUES ('30', 'عبد الرحمن محمد ريحان', 'a.rihan@ltnet.ly', 'rihan', 'dd143c914879ffcae595f000b2a43cfc', '12', '100', '16', '172.16.10.29', 'b8-ca-3a-a6-e6-75');
INSERT INTO `employee` VALUES ('31', 'مي محمد فؤاد الكريكشي', 'm.alkrekshi@ltnet.ly', 'mai', '2b28587f6d880ea9fc27c6c48fe3f1eb', '12', '100', '18', '172.16.10.59', 'b8-ca-3a-a6-e7-3a');
INSERT INTO `employee` VALUES ('32', 'أنسام يوسف بالريش', 'a.berrish@ltnet.ly', 'Ansam', '6355090a240ffd22ecf8501b9418ac33', '12', '100', '16', '172.16.10.26', 'b8-ca-3a-a8-14-6f');
INSERT INTO `employee` VALUES ('33', 'أحمد خليفة حمود', 'a.hammod@ltnet.ly', 'Ahmed', '9193ce3b31332b03f7d8af056c692b84', '12', '100', '32', '172.16.10.41', 'b8-ca-3a-a8-1c-37');
INSERT INTO `employee` VALUES ('34', 'محمد علي فرحات', 'm.farhat@ltnet.ly', 'Mohamed3', '309cd3800aacbd003ac36199fa537295', '12', '100', '8', '172.16.10.65', 'b8-ca-3a-a6-e8-05');
INSERT INTO `employee` VALUES ('35', 'أشرف محمد فاضل عراب', 'aa@ltnet.ly', 'ashraf', '508924b0eac2ba101ada28841c931e44', '12', '100', '33', '172.16.10.18', '9c-2a-70-1d-aa-d0');
INSERT INTO `employee` VALUES ('36', 'عبدالرؤوف الستوتي', 'satoti@ltnet.ly', 'Satoti', '1a83420623eaabaa0797f37fcddd327d', '12', '100', '36', '172.16.10.11', 'b8-ca-3a-a6-e7-d1');
INSERT INTO `employee` VALUES ('37', 'كمال الطاهر إبراهيم بن طاهر', 'k.bentaher@ltnet.ly', 'Kamal', 'aa63b0d5d950361c05012235ab520512', '12', '100', '32', '172.16.10.47', 'b8-ca-3a-a6-e7-36');
INSERT INTO `employee` VALUES ('38', 'بهاء الدين البهلول العربي', 'b.elarbi@ltnet.ly', 'Baha', '38cc20041eaa6e03c92c0a7d17b21b9a', '12', '100', '34', '172.16.10.20', 'b8-ca-3a-a8-1b-69');
INSERT INTO `employee` VALUES ('39', 'أية عبدالمجيد ميلاد قشوطة', 'a.gashota@ltnet.ly', 'Aya', '80a095a2da9695ccf95662827e02c5c0', '4', '2', '37', '172.16.30.35', '90-b1-1c-84-f1-fe');
INSERT INTO `employee` VALUES ('40', 'محمد فريد رجب', 'm.fared@ltnet.ly', 'fareed', '287991bc0a634b67a92c2c5881d2abff', '12', '100', '24', '172.16.10.62', 'b8-ca-3a-a6-e4-6f');
INSERT INTO `employee` VALUES ('41', 'نادرة الشتوي', 'n.elshetwi@ltnet.ly', 'nadra', '428bb12c1423a37b1a22f6d5d638fdc4', '12', '100', '6', '172.16.10.56', 'b8-ca-3a-a6-ee-2e');
INSERT INTO `employee` VALUES ('42', 'عبد الله محمد المشيطي ', 'a.elmsheti@ltnet.ly', 'Abdullah', 'd93ec75bca4b7ef88df5a6c591654422', '12', '100', '26', '172.16.10.32', 'b8-ca-3a-a6-e7-a7');
INSERT INTO `employee` VALUES ('43', 'سليمان محمد مفتاح علي', 's.ali@ltnet.ly', 'Soliman', '05ae28f580d0ceff63f5e528c6f30691', '12', '100', '26', '172.16.10.35', 'b8-ca-3a-a6-e6-0a');
INSERT INTO `employee` VALUES ('44', 'هيثم أحمد القلهود', 'h.galhoud@ltnet.ly', 'Haithem', 'f14ab06e63aecac642e7f1879d8ed93e', '12', '100', '31', '172.16.10.38', 'b8-ca-3a-a6-eb-45');
INSERT INTO `employee` VALUES ('46', 'خليل الأمين عبدالجواد', 'k.elamin@ltnet.ly', 'Khalil', 'ffadd3bb28d3086971fc23cad4d8eab1', '12', '100', '28', '::1', '64-27-37-9d-ef-61');
INSERT INTO `employee` VALUES ('47', 'عبد الحميد عبد السلام أبو غنية', 'hameedltnet.ly', 'hamed', '739b7af086e8c8873d6c8c7378f224c8', '11', '1', '47', '172.16.30.24', '9c-2a-70-1d-8d-8b');
INSERT INTO `employee` VALUES ('49', 'فريد عميرة الجاهلي', 'f.eljahli@ltnet.ly', 'Fared', '3b418b1d89b12317bca2940a9de8c74a', '12', '100', '11', '172.16.10.24', '9c-2a-70-1d-8d-a1');
INSERT INTO `employee` VALUES ('52', 'ماجد نور الدين حميدان', 'm.homedaan@ltnet.ly', 'Majed', 'ce9a639570c2b20d7e7c16e8ae1a0837', '12', '100', '24', '172.16.10.44', 'b8-ca-3a-a8-1b-50');
INSERT INTO `employee` VALUES ('53', 'عبد الرزاق معتوق شليبك', 'a.shelibek@ltnet.ly', 'Abderrazag', 'fdb1ee3200b1d4ee1c8abdb96012fc8f', '12', '100', '13', '172.16.10.50', 'b8-ca-3a-a6-ea-e9');

-- ----------------------------
-- Table structure for `employee_level`
-- ----------------------------
DROP TABLE IF EXISTS `employee_level`;
CREATE TABLE `employee_level` (
  `employee_level_id` tinyint(1) NOT NULL DEFAULT '0',
  `employee_level_name` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`employee_level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of employee_level
-- ----------------------------
INSERT INTO `employee_level` VALUES ('3', 'المدير التنفيذي');
INSERT INTO `employee_level` VALUES ('4', 'مدير ');
INSERT INTO `employee_level` VALUES ('5', 'رئيس');
INSERT INTO `employee_level` VALUES ('6', 'موظف');

-- ----------------------------
-- Table structure for `employee_state`
-- ----------------------------
DROP TABLE IF EXISTS `employee_state`;
CREATE TABLE `employee_state` (
  `employee_state_id` int(22) NOT NULL,
  `employee_state_name` varchar(200) DEFAULT NULL,
  `employee_level_id` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`employee_state_id`,`employee_level_id`),
  KEY `employee_state_id` (`employee_state_id`),
  KEY `emloy_level_id` (`employee_level_id`),
  CONSTRAINT `employee_state_ibfk_1` FOREIGN KEY (`employee_level_id`) REFERENCES `employee_level` (`employee_level_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of employee_state
-- ----------------------------
INSERT INTO `employee_state` VALUES ('1', 'مدير مكتب المراجعة', '4');
INSERT INTO `employee_state` VALUES ('2', 'مطور تطبيقات انترنت أول', '6');
INSERT INTO `employee_state` VALUES ('3', 'مدير مكتب الشؤون القانونية', '4');
INSERT INTO `employee_state` VALUES ('4', 'مدير مكتب مراقبة الجودة', '4');
INSERT INTO `employee_state` VALUES ('5', 'مدير مكتب العلاقات والتعاون', '4');
INSERT INTO `employee_state` VALUES ('6', 'فني نظم تشغيل ثالث', '6');
INSERT INTO `employee_state` VALUES ('7', 'مهندس شبكات أول', '6');
INSERT INTO `employee_state` VALUES ('8', 'مهندس شبكات ثالث', '6');
INSERT INTO `employee_state` VALUES ('9', 'مهندس حاسب أول', '6');
INSERT INTO `employee_state` VALUES ('11', 'فني قواعد بيانات أول', '6');
INSERT INTO `employee_state` VALUES ('12', 'رئيس قسم الخدمات', '6');
INSERT INTO `employee_state` VALUES ('13', 'فني قواعد بيانات ثاني', '6');
INSERT INTO `employee_state` VALUES ('15', 'مدير إدراة الشؤون الادراية والمالية', '4');
INSERT INTO `employee_state` VALUES ('16', 'فني قواعد بيانات ثالث', '6');
INSERT INTO `employee_state` VALUES ('18', 'محلل ومبرمج نظم ثالث', '6');
INSERT INTO `employee_state` VALUES ('23', ' مدير إدارة تنمية  الموارد البشرية والتأهيل', '4');
INSERT INTO `employee_state` VALUES ('24', 'مهندس صيانة حاسوب ثالث', '6');
INSERT INTO `employee_state` VALUES ('25', 'مدير إدراة التجارة الالكترونية', '4');
INSERT INTO `employee_state` VALUES ('26', 'مشغل حاسوب ثالث', '6');
INSERT INTO `employee_state` VALUES ('28', 'مطور تطبيقات انترنت أول', '6');
INSERT INTO `employee_state` VALUES ('29', 'مهندس شبكات ثاني', '6');
INSERT INTO `employee_state` VALUES ('30', 'مهندس اتصالات أول', '6');
INSERT INTO `employee_state` VALUES ('31', 'مهندس اتصالات ثاني', '6');
INSERT INTO `employee_state` VALUES ('32', 'مهندس اتصالات ثالث', '6');
INSERT INTO `employee_state` VALUES ('33', 'مشغل حاسوب أول', '6');
INSERT INTO `employee_state` VALUES ('34', 'فني أمن معلومات ثاني', '6');
INSERT INTO `employee_state` VALUES ('35', 'مهندس حاسب أول', '6');
INSERT INTO `employee_state` VALUES ('36', 'مدير إدارة تقنية المعلومات', '4');
INSERT INTO `employee_state` VALUES ('37', 'موظف', '6');
INSERT INTO `employee_state` VALUES ('47', 'رئيس قسم التدريب', '5');
INSERT INTO `employee_state` VALUES ('48', 'رئيس قسم شؤون الموظفين', '5');
INSERT INTO `employee_state` VALUES ('100', 'المدير التنفيذي', '3');

-- ----------------------------
-- Table structure for `management`
-- ----------------------------
DROP TABLE IF EXISTS `management`;
CREATE TABLE `management` (
  `management_id` int(11) NOT NULL,
  `management_code` char(5) DEFAULT NULL,
  `management_name` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`management_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of management
-- ----------------------------
INSERT INTO `management` VALUES ('0', null, 'رئيس كد');
INSERT INTO `management` VALUES ('1', null, 'مجلس الإدارة');
INSERT INTO `management` VALUES ('3', null, 'إدارة الشؤون الفنية');
INSERT INTO `management` VALUES ('4', '', 'إدارة الشؤون الإدارية و المالية');
INSERT INTO `management` VALUES ('5', '', 'مكتب مراقبة الجودة');
INSERT INTO `management` VALUES ('6', '', 'مكتب العلاقات والتعاون');
INSERT INTO `management` VALUES ('7', '', 'مكتب الشؤون القانونية');
INSERT INTO `management` VALUES ('8', '', 'مكتب المراجعة الداخلية');
INSERT INTO `management` VALUES ('10', '', 'إدارة التجارة الالكترونية');
INSERT INTO `management` VALUES ('11', '', 'إدارة الموراد البشرية');
INSERT INTO `management` VALUES ('12', '', 'إداراة تشغيل البرامج والتطبيقات');
INSERT INTO `management` VALUES ('100', 'admin', 'المحفوظات');

-- ----------------------------
-- Table structure for `needed_software`
-- ----------------------------
DROP TABLE IF EXISTS `needed_software`;
CREATE TABLE `needed_software` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `employee_id_by_ip` int(11) NOT NULL,
  `software_name` varchar(255) NOT NULL,
  `software_description` text,
  PRIMARY KEY (`id`),
  KEY `emp_85_fk` (`employee_id`),
  KEY `emp_77_fk` (`employee_id_by_ip`),
  CONSTRAINT `emp_77_fk` FOREIGN KEY (`employee_id_by_ip`) REFERENCES `employee` (`employee_id`) ON UPDATE CASCADE,
  CONSTRAINT `emp_85_fk` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of needed_software
-- ----------------------------
INSERT INTO `needed_software` VALUES ('2', '35', '35', 'AutoCAD', '<p>\r\n	برنامج رسم معماري</p>\r\n');
INSERT INTO `needed_software` VALUES ('5', '35', '35', 'adfas', null);
INSERT INTO `needed_software` VALUES ('13', '46', '46', 'اوتوكاد', '<p>\r\n	برنامج للرسم المعماري</p>\r\n');
INSERT INTO `needed_software` VALUES ('14', '46', '46', 'اوتوكاد', '<p>\r\n	afasfasfيسبشسب شسبشسيب</p>\r\n');
INSERT INTO `needed_software` VALUES ('16', '12', '46', '55555555', '<p>\r\n	455555555555555</p>\r\n');
INSERT INTO `needed_software` VALUES ('17', '32', '46', '', null);
