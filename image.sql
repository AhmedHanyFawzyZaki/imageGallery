/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : image

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2016-09-13 16:37:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `img_categorized_image`
-- ----------------------------
DROP TABLE IF EXISTS `img_categorized_image`;
CREATE TABLE `img_categorized_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `img_categorized_image_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `img_category` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of img_categorized_image
-- ----------------------------
INSERT INTO `img_categorized_image` VALUES ('8', '1412335497-1411653229---465-Butterfly Pink & Blue HPLow Res.jpg', '1', null);
INSERT INTO `img_categorized_image` VALUES ('9', '1412335508-1411653235---2563-English Rose & Cubic Disco Low Res.jpg', '1', null);
INSERT INTO `img_categorized_image` VALUES ('10', '1412335517-1411653240---5417-home.jpg', '1', null);
INSERT INTO `img_categorized_image` VALUES ('11', '1412335527-1411653249---6790-home2.jpg', '1', null);
INSERT INTO `img_categorized_image` VALUES ('12', '1412335600-1411652952---3877-caravan-12.jpg', '2', null);
INSERT INTO `img_categorized_image` VALUES ('13', '1412335628-1411653075---925-26-Dollarphotoclub_32484302.jpg', '3', null);
INSERT INTO `img_categorized_image` VALUES ('14', '1412335642-1411653084---2697-8380-stockfresh_3827199_san-francisco-golden-gate-bridge-california_sizeS.jpg', '3', null);
INSERT INTO `img_categorized_image` VALUES ('15', '1412335653-1411652978---8556-fantasy-art-hd-wallpixy.jpg', '4', null);
INSERT INTO `img_categorized_image` VALUES ('16', '1412335664-1411652965---1124-paris.png', '5', null);
INSERT INTO `img_categorized_image` VALUES ('19', '1412336096-1412335345---1411653244---4055-2398-Celebrity-Cruises-picture_5037ce5774cec.jpg', '4', null);
INSERT INTO `img_categorized_image` VALUES ('22', '1413057964-designservices.png', '5', null);

-- ----------------------------
-- Table structure for `img_category`
-- ----------------------------
DROP TABLE IF EXISTS `img_category`;
CREATE TABLE `img_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of img_category
-- ----------------------------
INSERT INTO `img_category` VALUES ('1', 'Category 1', null);
INSERT INTO `img_category` VALUES ('2', 'Category 2', null);
INSERT INTO `img_category` VALUES ('3', 'Category 3', null);
INSERT INTO `img_category` VALUES ('4', 'Category 4', null);
INSERT INTO `img_category` VALUES ('5', 'Category 5', null);

-- ----------------------------
-- Table structure for `img_image_lib`
-- ----------------------------
DROP TABLE IF EXISTS `img_image_lib`;
CREATE TABLE `img_image_lib` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `alt_image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `click_event` tinyint(4) DEFAULT '0',
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `img_image_lib_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `img_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of img_image_lib
-- ----------------------------
INSERT INTO `img_image_lib` VALUES ('67', '1412335249---1411652919---images.jpg', '4', null, null, '0', '2014-10-03 13:20:49', null);
INSERT INTO `img_image_lib` VALUES ('68', '1412335290---1411652892---front.jpeg', '4', null, null, '0', '2014-10-03 13:21:31', null);
INSERT INTO `img_image_lib` VALUES ('69', '1412335292---1411652965---1124-paris.png', '4', null, null, '0', '2014-10-03 13:21:32', null);
INSERT INTO `img_image_lib` VALUES ('70', '1412335294---1411652952---3877-caravan-12.jpg', '4', null, null, '0', '2014-10-03 13:21:34', null);
INSERT INTO `img_image_lib` VALUES ('71', '1412335295---1411652969---1149-3D-Abstract-art-hd-wallpaper-2.jpg', '4', null, null, '0', '2014-10-03 13:21:36', null);
INSERT INTO `img_image_lib` VALUES ('72', '1412335297---1411652974---3408-HD-Wallpaper-1080p-06.jpg', '4', null, null, '0', '2014-10-03 13:21:38', null);
INSERT INTO `img_image_lib` VALUES ('73', '1412335299---1411652978---8556-fantasy-art-hd-wallpixy.jpg', '4', null, null, '0', '2014-10-03 13:21:40', null);
INSERT INTO `img_image_lib` VALUES ('74', '1412335301---1411652982---8165-HD-Wallpaper-1080p.jpg', '4', null, null, '0', '2014-10-03 13:21:42', null);
INSERT INTO `img_image_lib` VALUES ('75', '1412335328---1411653014---front.jpeg', '4', null, null, '0', '2014-10-03 13:22:08', null);
INSERT INTO `img_image_lib` VALUES ('76', '1412335331---1411653000---3027-stockfresh_1414073_woman-enjoying-her-holidays_sizeXS.jpg', '4', null, null, '0', '2014-10-03 13:22:11', null);
INSERT INTO `img_image_lib` VALUES ('77', '1412335333---1411653075---925-26-Dollarphotoclub_32484302.jpg', '4', null, null, '0', '2014-10-03 13:22:13', null);
INSERT INTO `img_image_lib` VALUES ('78', '1412335335---1411653078---2094-6797-stockfresh_3121452_new-york-city-cityscape_sizeS.jpg', '4', null, null, '0', '2014-10-03 13:22:15', null);
INSERT INTO `img_image_lib` VALUES ('79', '1412335336---1411653084---2697-8380-stockfresh_3827199_san-francisco-golden-gate-bridge-california_sizeS.jpg', '4', null, null, '0', '2014-10-03 13:22:17', null);
INSERT INTO `img_image_lib` VALUES ('80', '1412335338---1411653087---2872-2262-Lanikai_Beach.jpg', '4', null, null, '0', '2014-10-03 13:22:18', null);
INSERT INTO `img_image_lib` VALUES ('81', '1412335341---1411653096---1016-flights.jpg', '4', null, null, '0', '2014-10-03 13:22:21', null);
INSERT INTO `img_image_lib` VALUES ('82', '1412335342---1411653101---1621-stockfresh_259242_brighton-beach-bathing-boxes_sizeS_ef460e.jpg', '4', null, null, '0', '2014-10-03 13:22:23', null);
INSERT INTO `img_image_lib` VALUES ('83', '1412335345---1411653244---4055-2398-Celebrity-Cruises-picture_5037ce5774cec.jpg', '4', null, null, '0', '2014-10-03 13:22:26', null);
INSERT INTO `img_image_lib` VALUES ('84', '1412335346---1411653271---305-item.jpg', '4', null, null, '0', '2014-10-03 13:22:26', null);
INSERT INTO `img_image_lib` VALUES ('85', '1412335348---1411653274---9332-item2.jpg', '4', null, null, '0', '2014-10-03 13:22:28', null);
INSERT INTO `img_image_lib` VALUES ('86', '1412335349---1411654148---1411653282---2119-item1.jpg', '4', null, null, '0', '2014-10-03 13:22:29', null);
INSERT INTO `img_image_lib` VALUES ('87', '1412335355---1411896643-d72f563a611c0655ec2a2ab2cdbe52268fe97a67.jpeg', '4', null, null, '0', '2014-10-03 13:22:35', null);
INSERT INTO `img_image_lib` VALUES ('88', '1412335369---1411896711-5975-BAG ENVY.jpg', '4', null, null, '0', '2014-10-03 13:22:49', null);
INSERT INTO `img_image_lib` VALUES ('90', '1412352189---1412335297---1411652974---3408-HD-Wallpaper-1080p-06.jpg', '4', null, null, '0', '2014-10-03 18:03:09', null);
INSERT INTO `img_image_lib` VALUES ('91', '1412352240---1412336096-1412335345---1411653244---4055-2398-Celebrity-Cruises-picture_5037ce5774cec.jpg', '4', null, null, '0', '2014-10-03 18:04:02', null);
INSERT INTO `img_image_lib` VALUES ('92', '1412352259---1412335341---1411653096---1016-flights.jpg', '4', null, null, '0', '2014-10-03 18:04:19', null);
INSERT INTO `img_image_lib` VALUES ('93', '1412352916---1412352240---1412336096-1412335345---1411653244---4055-2398-Celebrity-Cruises-picture_5037ce5774cec.jpg', '4', null, null, '0', '2014-10-03 18:15:17', null);
INSERT INTO `img_image_lib` VALUES ('94', '1412352920---1412352189---1412335297---1411652974---3408-HD-Wallpaper-1080p-06.jpg', '4', null, null, '0', '2014-10-03 18:15:21', null);
INSERT INTO `img_image_lib` VALUES ('95', '1412352926---1412335653-1411652978---8556-fantasy-art-hd-wallpixy.jpg', '4', null, null, '0', '2014-10-03 18:15:26', null);
INSERT INTO `img_image_lib` VALUES ('96', '1412352929---1412335664-1411652965---1124-paris.png', '4', null, null, '0', '2014-10-03 18:15:30', null);
INSERT INTO `img_image_lib` VALUES ('97', '1412352953---1409292887-user.jpg', '4', null, null, '0', '2014-10-03 18:15:53', null);
INSERT INTO `img_image_lib` VALUES ('98', '1412352966---1408619628-index1.jpg', '4', null, null, '0', '2014-10-03 18:16:07', null);
INSERT INTO `img_image_lib` VALUES ('99', '1412352973---1408619628-index.jpg', '4', null, null, '0', '2014-10-03 18:16:13', null);
INSERT INTO `img_image_lib` VALUES ('100', '1412352978---1408624638-logo1.png', '4', null, null, '0', '2014-10-03 18:16:18', null);
INSERT INTO `img_image_lib` VALUES ('101', '1412353001---album-cover-270x200.jpg', '4', null, null, '0', '2014-10-03 18:16:41', null);
INSERT INTO `img_image_lib` VALUES ('102', '1412353003---album-img-2-695x500.jpg', '4', null, null, '0', '2014-10-03 18:16:44', null);
INSERT INTO `img_image_lib` VALUES ('103', '1412353008---album-img-695x500.jpg', '4', null, null, '0', '2014-10-03 18:16:48', null);
INSERT INTO `img_image_lib` VALUES ('104', '1412353010---album-thumb-100x100.jpg', '4', null, null, '0', '2014-10-03 18:16:50', null);
INSERT INTO `img_image_lib` VALUES ('105', '1412353019---avatar-100x100.jpg', '4', null, null, '0', '2014-10-03 18:16:59', null);
INSERT INTO `img_image_lib` VALUES ('106', '1412353021---avatar-180x180.jpg', '4', null, null, '0', '2014-10-03 18:17:01', null);
INSERT INTO `img_image_lib` VALUES ('107', '1412353025---contest-cover.jpg', '4', null, null, '0', '2014-10-03 18:17:05', null);
INSERT INTO `img_image_lib` VALUES ('108', '1412353027---contest-thumb-2-268x240.jpg', '4', null, null, '0', '2014-10-03 18:17:07', null);
INSERT INTO `img_image_lib` VALUES ('109', '1412353029---contest-thumb-268x240.jpg', '4', null, null, '0', '2014-10-03 18:17:09', null);
INSERT INTO `img_image_lib` VALUES ('110', '1412353031---market-thumb-120x120.jpg', '4', null, null, '0', '2014-10-03 18:17:11', null);
INSERT INTO `img_image_lib` VALUES ('111', '1412353035---photo-baby-profil.jpg', '4', null, null, '0', '2014-10-03 18:17:15', null);
INSERT INTO `img_image_lib` VALUES ('112', '1412353037---picture-2-180x180.jpg', '4', null, null, '0', '2014-10-03 18:17:17', null);
INSERT INTO `img_image_lib` VALUES ('113', '1412353039---picture-3-180x180.jpg', '4', null, null, '0', '2014-10-03 18:17:19', null);
INSERT INTO `img_image_lib` VALUES ('114', '1412353043---picture-180x180.jpg', '4', null, null, '0', '2014-10-03 18:17:23', null);
INSERT INTO `img_image_lib` VALUES ('115', '1412353047---story-242x362.jpg', '4', null, null, '0', '2014-10-03 18:17:28', null);
INSERT INTO `img_image_lib` VALUES ('116', '1412353068---story-540x372.jpg', '4', null, null, '0', '2014-10-03 18:17:48', null);
INSERT INTO `img_image_lib` VALUES ('120', 'lol.jpg', '4', null, null, '0', '2014-10-07 17:12:42', null);
INSERT INTO `img_image_lib` VALUES ('124', 'yassir.jpg', '4', null, null, '0', '2014-10-10 15:08:12', null);
INSERT INTO `img_image_lib` VALUES ('125', 'kk.jpg', '4', null, null, '0', '2014-10-10 15:09:44', null);
INSERT INTO `img_image_lib` VALUES ('126', 'mm.jpg', '4', null, null, '0', '2014-10-10 16:26:31', null);
INSERT INTO `img_image_lib` VALUES ('127', 'image.jpg', '4', null, null, '0', '2014-10-11 21:58:41', null);
INSERT INTO `img_image_lib` VALUES ('128', '1414158045---Chat-main-chat.jpg', '1', null, null, '0', '2014-10-24 15:40:45', null);
INSERT INTO `img_image_lib` VALUES ('129', 'sdas.jpg', '1', null, null, '0', '2014-10-24 15:43:06', null);

-- ----------------------------
-- Table structure for `img_image_option`
-- ----------------------------
DROP TABLE IF EXISTS `img_image_option`;
CREATE TABLE `img_image_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` tinyint(4) DEFAULT '0' COMMENT '0=category, 1=my_image',
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `alt_text` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `action_performed` tinyint(4) DEFAULT '1' COMMENT '1=zoomin, 2=open larger imae, 3=url',
  `url` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `border_color` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `border_width` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `border_radius` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `shadow` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `border` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of img_image_option
-- ----------------------------
INSERT INTO `img_image_option` VALUES ('1', '8', '4', '0', 'mittens', 'baby mittens', '3', 'http://test.com', '#f24b4b', '7', '10px 0px 10px 0px', null, 'solid');
INSERT INTO `img_image_option` VALUES ('2', '68', '4', '1', 'jacket', '', '2', '', '#706a6a', '3px', '5px 5px 5px 5px', null, 'dotted');
INSERT INTO `img_image_option` VALUES ('3', '9', '4', '0', 'test', 'alt text ', '3', 'http://google.com', '#e09f9f', '1', '4px 6px 3px 5px', null, 'dashed');
INSERT INTO `img_image_option` VALUES ('4', '126', '4', '1', '', '', '1', '', '', '', '', null, 'unset');

-- ----------------------------
-- Table structure for `img_settings`
-- ----------------------------
DROP TABLE IF EXISTS `img_settings`;
CREATE TABLE `img_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_banner_image_width` decimal(10,0) DEFAULT NULL,
  `slider_banner_image_height` decimal(10,0) DEFAULT NULL,
  `logo_image_width` decimal(10,0) DEFAULT NULL,
  `logo_image_height` decimal(10,0) DEFAULT NULL,
  `inner_page_image_width` decimal(10,0) DEFAULT NULL,
  `inner_page_image_height` decimal(10,0) DEFAULT NULL,
  `testimonial_image_width` decimal(10,0) DEFAULT NULL,
  `testimonial_image_height` decimal(10,0) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `border_max_width` decimal(10,0) DEFAULT NULL,
  `border_max_radius` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of img_settings
-- ----------------------------
INSERT INTO `img_settings` VALUES ('1', '750', '150', '180', '180', '250', '200', '200', '100', null, '15', '50');

-- ----------------------------
-- Table structure for `img_user`
-- ----------------------------
DROP TABLE IF EXISTS `img_user`;
CREATE TABLE `img_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `groups_id` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_ibfk_1` (`groups_id`),
  CONSTRAINT `img_user_ibfk_1` FOREIGN KEY (`groups_id`) REFERENCES `img_user_groups` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of img_user
-- ----------------------------
INSERT INTO `img_user` VALUES ('1', 'admin', 'GyAYtNO6XVtVbsnayx9ubQ==', 'admin@admin.com', '2', null);
INSERT INTO `img_user` VALUES ('4', 'ahmed', 'GyAYtNO6XVtVbsnayx9ubQ==', 'ahmed@admin.com', null, null);
INSERT INTO `img_user` VALUES ('5', 'test', 'GyAYtNO6XVtVbsnayx9ubQ==', 'ahmed2@admin.com', null, null);

-- ----------------------------
-- Table structure for `img_user_groups`
-- ----------------------------
DROP TABLE IF EXISTS `img_user_groups`;
CREATE TABLE `img_user_groups` (
  `id` int(11) NOT NULL,
  `group_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of img_user_groups
-- ----------------------------
INSERT INTO `img_user_groups` VALUES ('1', 'Super Admin ');
INSERT INTO `img_user_groups` VALUES ('2', 'Admin');
INSERT INTO `img_user_groups` VALUES ('3', 'Normal User');
