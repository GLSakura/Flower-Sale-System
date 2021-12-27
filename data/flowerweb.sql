/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : flowerweb

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 27/12/2021 22:21:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `CommentId` int(11) NOT NULL AUTO_INCREMENT,
  `Time` datetime DEFAULT NULL,
  `GoodId` int(11) DEFAULT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CommentId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of comments
-- ----------------------------
BEGIN;
INSERT INTO `comments` VALUES (1, '2021-12-23 17:25:03', 1, 'admin', '产品和图片描述一致，颜色鲜艳，色彩比较正，包装完美，快递给力，香味纯正，爱人非常喜欢，鲜花搭配完美，外包装精致，档次很高，是情人节首选礼盒。');
INSERT INTO `comments` VALUES (2, '2021-12-23 17:25:31', 1, 'admin', '质量：不错不错，很漂亮，也很精致；\r\n物流：物流也很快，及时送达，很快；\r\n做工：做工很精细，包装也很好，推荐大家购买！很漂亮！');
INSERT INTO `comments` VALUES (3, '2021-12-23 17:26:26', 1, 'admin', '情人节给老婆买了这款花束，本来感觉差点事儿，结果买回去，媳妇很是喜欢！感觉在关键的时候，没有掉链子！这是一次比较完美的购物体验！！');
INSERT INTO `comments` VALUES (4, '2021-12-26 20:39:20', 1, 'admin', '这是评论');
COMMIT;

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `GoodId` int(11) NOT NULL AUTO_INCREMENT,
  `GoodName` varchar(255) DEFAULT NULL,
  `GoodSummary` varchar(1000) DEFAULT NULL,
  `GoodPrice1` varchar(255) DEFAULT NULL,
  `GoodPrice2` varchar(255) DEFAULT NULL,
  `GoodNumber` int(11) DEFAULT NULL,
  `SoldNumber` int(11) DEFAULT NULL,
  `GoodImage` varchar(255) DEFAULT NULL,
  `UpdateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`GoodId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of goods
-- ----------------------------
BEGIN;
INSERT INTO `goods` VALUES (1, '红玫瑰', '玫瑰在植物分类学上是指蔷薇科蔷薇属灌木（Rosa rugosa），极具观赏价值。玫瑰在日常生活中是蔷薇属一系列花大艳丽的栽培品种的统称，这些栽培品种在植物分类学上应称做月季或蔷薇。真正的红玫瑰是不存在的。切花红玫瑰实为月季。花草茶红玫瑰多为平阴玫瑰，严格来讲不是红色而是紫红。红玫瑰是保加利亚和伊拉克的国花。', '10', '8', 5, 8, 'images/goodImages/红玫瑰.jpeg', '2021-12-21 15:22:07');
INSERT INTO `goods` VALUES (2, '百合花', '百合花（学名：Lilium）是百合科百合属多年生草本球根植物，原产于北半球的几乎每个大陆的温带地区，主要分布在亚洲东部、欧洲、北美洲等，全球已发现有110多个品种，其中55种产于中国。近年更有不少经过人工杂交而产生的新品种，如：亚洲百合、麝香百合、香水百合、葵(火)百合、姬百合等。百合花姿雅致叶片青翠娟秀，茎干亭亭玉立，是名贵的切花新秀。学名(Lilium brownii var. viridulum Baker)又名强蜀、番韭、山丹、倒仙、重迈、中庭、摩罗、重箱、中逢花、百合蒜、大师傅蒜、蒜脑薯、夜合花等。', '15', '12', 28, 7, 'images/goodImages/百合花.jpeg', '2021-12-21 15:25:48');
INSERT INTO `goods` VALUES (3, '向日葵', '向日葵（学名：Helianthus annuus L.；英文名：Sunflowers）：是桔梗目、菊科、向日葵属的植物。因花序随太阳转动而得名。一年生草本，高1-3.5米，最高可达9米。茎直立，圆形多棱角，质硬被白色粗硬毛。广卵形的叶片通常互生，先端锐突或渐尖，有基出3脉，边缘具粗锯齿，两面粗糙，被毛，有长柄。头状花序，直径10-30厘米，单生于茎顶或枝端。总苞片多层，叶质，覆瓦状排列，被长硬毛，夏季开花，花序边缘生中性的黄色舌状花，不结实。花序中部为两性管状花，棕色或紫色，能结实。矩卵形瘦果，果皮木质化，灰色或黑色，称葵花籽。', '20', '15', 10, 0, 'images/goodImages/向日葵.jpeg', '2021-12-26 17:23:12');
INSERT INTO `goods` VALUES (4, '康乃馨', '康乃馨（学名：Dianthus Carnation）：是石竹科、石竹属多年生草本植物，是多种石竹属园艺品种的通称。为多年生草本植物，株高70-100厘米，基部半木质化。整个植株被有白粉，呈灰绿色。茎干硬而脆，节膨大。叶线状披针形，全缘，叶质较厚，上半部向外弯曲，对生，基部抱茎。花通常单生，聚伞状排列。花冠半球形，花萼长筒状，花蕾橡子状，花瓣扇形，花朵内瓣多呈皱缩状，花色有大红、粉红、鹅黄、白、深红等，还有玛瑙等复色及镶边等，有香气。', '30', '25', 10, 0, 'images/goodImages/康乃馨.jpeg', '2021-12-26 17:32:42');
INSERT INTO `goods` VALUES (5, '满天星', '满天星（学名：Gypsophila paniculata L.）是石竹科，石头花属的多年生草本植物，根粗壮。茎单生，直立，多分枝。叶片披针形或线状披针形，顶端渐尖，中脉明显。圆锥状聚伞花序多分枝，花小而多；花梗纤细，苞片三角形，花萼宽钟形，花瓣白色或淡红色，匙形。蒴果球形，种子小，圆形。花期6-8月，果期8-9月。', '30', '27', 19, 1, 'images/goodImages/满天星.jpeg', '2021-12-26 17:28:08');
INSERT INTO `goods` VALUES (6, '郁金香', '郁金香（学名：Tulipa gesneriana L ）是百合科郁金香属的多年生草本植物，具鳞茎。叶3-5枚，条状披针形至卵状披针状，花单朵顶生，大型而艳丽，花被片红色或杂有白色和黄色，有时为白色或黄色，长5-7厘米，宽2-4厘米，6枚雄蕊等长，花丝无毛，无花柱，柱头增大呈鸡冠状，花期4-5月。', '30', '25', 30, 0, 'images/goodImages/郁金香.jpeg', '2021-12-26 17:34:29');
COMMIT;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `OrderId` int(11) NOT NULL AUTO_INCREMENT,
  `OrderTime` datetime DEFAULT NULL,
  `Goods` varchar(255) DEFAULT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `ReceiveName` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Words` varchar(255) DEFAULT NULL,
  `OrderPrice` decimal(10,2) DEFAULT NULL,
  `IsPaid` int(11) DEFAULT NULL,
  PRIMARY KEY (`OrderId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of orders
-- ----------------------------
BEGIN;
INSERT INTO `orders` VALUES (1, '2021-12-21 13:46:46', '1,1', 'admin', '和音', '9962854', '香港观塘区观塘茜发道130号', '', 1.00, 1);
INSERT INTO `orders` VALUES (2, '2021-12-21 16:20:07', '2,1', 'admin', '和音', '9962854', '香港观塘区观塘茜发道130号', '', 15.00, 1);
INSERT INTO `orders` VALUES (3, '2021-12-22 14:52:45', '1,2|2,1', 'admin', '和音', '9962854', '香港观塘区观塘茜发道130号', '', 35.00, 1);
INSERT INTO `orders` VALUES (4, '2021-12-22 23:02:35', '1,1', 'admin', '和音', '9962854', '香港观塘区观塘茜发道130号', '快递速度！', 10.00, 1);
INSERT INTO `orders` VALUES (5, '2021-12-26 17:44:17', '5,1', 'user1', '韩青辰', '7595939', '香港东区香港鲗鱼涌海泽街161号', '超级喜欢满天星，希望卖家不会让我失望！', 30.00, 1);
INSERT INTO `orders` VALUES (6, '2021-12-26 20:40:31', '1,1', 'admin', '和音', '9962854', '香港观塘区观塘茜发道130号', '快点发货', 10.00, 1);
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(255) DEFAULT NULL,
  `TrueName` varchar(255) DEFAULT NULL,
  `UserPassword` varchar(255) DEFAULT NULL,
  `UserSex` varchar(255) DEFAULT NULL,
  `UserAge` int(255) DEFAULT NULL,
  `UserEmail` varchar(255) DEFAULT NULL,
  `UserPhone` varchar(255) DEFAULT NULL,
  `UserAddress` varchar(255) DEFAULT NULL,
  `UserPower` varchar(255) DEFAULT NULL,
  `ConsumeNum` float(255,0) DEFAULT NULL,
  `RegisterTime` datetime DEFAULT NULL,
  `IsVIP` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'admin', '和音', '123', '男', 18, 'dvctvklawj@qq.com', '9962854', '香港观塘区观塘茜发道130号', '1', 73, '2021-12-11 11:50:08', '0');
INSERT INTO `users` VALUES (2, 'user1', '韩青辰', '123', '男', 31, 'rodlehzbbl@qq.com', '7595939', '香港东区香港鲗鱼涌海泽街161号', '0', 30, '2021-12-11 11:50:08', '0');
INSERT INTO `users` VALUES (3, 'user2', '蒋芬芬', '123', '女', 25, 'esemedxqpn@qq.com', '4302954', '香港油尖旺区大角咀利得街781号', '0', 0, '2021-12-11 11:50:08', '0');
INSERT INTO `users` VALUES (4, 'user3', '方宣', '123', '女', 26, 'knsxjmkgkg@163.com', '78116521', '香港沙田区新界沙田正街528号', '0', 0, '2021-12-23 17:20:06', '0');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
