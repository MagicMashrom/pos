/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : pos

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 30/12/2022 07:23:15
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer`  (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`customer_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES (2, 'rudi', 'L', '02313124', 'gang mangga', '2021-05-10 02:17:43', NULL);

-- ----------------------------
-- Table structure for detail_penjualan
-- ----------------------------
DROP TABLE IF EXISTS `detail_penjualan`;
CREATE TABLE `detail_penjualan`  (
  `kode_penjualan` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `total_bayar` int NOT NULL,
  `bayar` int NOT NULL,
  `kembalian` int NOT NULL,
  PRIMARY KEY (`kode_penjualan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of detail_penjualan
-- ----------------------------
INSERT INTO `detail_penjualan` VALUES ('KDP1812220001', 18000, 20000, 2000);
INSERT INTO `detail_penjualan` VALUES ('KDP2412220001', 8000, 8000, 0);
INSERT INTO `detail_penjualan` VALUES ('KDP2412220002', 13000, 13000, 0);
INSERT INTO `detail_penjualan` VALUES ('KDP2412220003', 6500, 6500, 0);
INSERT INTO `detail_penjualan` VALUES ('KDP2412220004', 6500, 6500, 0);
INSERT INTO `detail_penjualan` VALUES ('KDP3012220001', 3000, 3000, 0);

-- ----------------------------
-- Table structure for p_category
-- ----------------------------
DROP TABLE IF EXISTS `p_category`;
CREATE TABLE `p_category`  (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of p_category
-- ----------------------------
INSERT INTO `p_category` VALUES (1, 'Makanan', '2021-05-12 23:19:35', '2021-05-15 14:30:01');
INSERT INTO `p_category` VALUES (3, 'Minuman', '2021-05-12 23:36:23', NULL);
INSERT INTO `p_category` VALUES (4, 'ATK', '2021-05-15 19:30:08', NULL);
INSERT INTO `p_category` VALUES (5, 'Obat', '2021-05-24 16:27:39', NULL);
INSERT INTO `p_category` VALUES (6, 'Sembako', '2021-05-24 16:28:49', NULL);
INSERT INTO `p_category` VALUES (7, 'Lain-lain', '2021-05-24 16:29:03', NULL);
INSERT INTO `p_category` VALUES (8, 'Rokok', '2021-05-24 16:29:45', NULL);

-- ----------------------------
-- Table structure for p_item
-- ----------------------------
DROP TABLE IF EXISTS `p_item`;
CREATE TABLE `p_item`  (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `barcode` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `category_id` int NOT NULL,
  `unit_id` int NOT NULL,
  `price` int NULL DEFAULT NULL,
  `stock` int NOT NULL DEFAULT 0,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`item_id`) USING BTREE,
  UNIQUE INDEX `item_id`(`item_id`) USING BTREE,
  UNIQUE INDEX `barcode`(`barcode`) USING BTREE,
  INDEX `category_id`(`category_id`) USING BTREE,
  INDEX `unit_id`(`unit_id`) USING BTREE,
  CONSTRAINT `p_item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `p_category` (`category_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `p_item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `p_unit` (`unit_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of p_item
-- ----------------------------
INSERT INTO `p_item` VALUES (5, 'A005', 'Es Cream Waku Coklat ', 1, 3, 5000, 48, 'item-210516-1.jpg', '2021-05-16 00:13:32', '2021-05-16 08:29:28');
INSERT INTO `p_item` VALUES (6, 'A003', 'Mie Goreng', 1, 3, 3000, 54, NULL, '2021-05-16 00:14:12', NULL);
INSERT INTO `p_item` VALUES (8, 'A004', 'susu', 3, 3, 1500, 0, NULL, '2021-05-16 01:12:20', NULL);
INSERT INTO `p_item` VALUES (11, 'A007', 'biskuit', 1, 3, 1000, 52, 'item-210524-.PNG', '2021-05-24 14:16:03', NULL);
INSERT INTO `p_item` VALUES (12, 'A008', 'Indomie mie goreng', 1, 3, 3000, 59, NULL, '2021-05-24 14:19:30', NULL);
INSERT INTO `p_item` VALUES (13, 'A009', 'Indomie Mie Soto', 1, 3, 3000, 55, NULL, '2021-05-24 14:20:38', NULL);
INSERT INTO `p_item` VALUES (14, 'A006', 'Kecap bango 210ML', 1, 3, 13000, 55, NULL, '2021-05-24 14:22:02', NULL);
INSERT INTO `p_item` VALUES (15, 'A010', 'Indomie Mie Ayam Bawang', 1, 3, 3000, 61, NULL, '2021-05-24 14:23:37', NULL);
INSERT INTO `p_item` VALUES (16, 'A011', 'Indomie Mie Kari Ayam', 1, 3, 3000, 64, NULL, '2021-05-24 14:26:19', NULL);
INSERT INTO `p_item` VALUES (17, 'A001', 'Aqua  220ML', 3, 4, 30000, 65, NULL, '2021-05-27 16:25:28', NULL);
INSERT INTO `p_item` VALUES (18, 'A012', 'Minyak Sedap 2L', 7, 3, 30000, 0, NULL, '2021-06-08 13:25:17', '2021-08-30 19:11:24');
INSERT INTO `p_item` VALUES (28, 'CF011', 'Ciki Potato', 7, 1, 1500, 49, NULL, '2022-11-27 15:10:31', NULL);

-- ----------------------------
-- Table structure for p_unit
-- ----------------------------
DROP TABLE IF EXISTS `p_unit`;
CREATE TABLE `p_unit`  (
  `unit_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`unit_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of p_unit
-- ----------------------------
INSERT INTO `p_unit` VALUES (1, 'Kilogram', '2021-05-12 23:19:35', '2021-05-13 18:48:22');
INSERT INTO `p_unit` VALUES (3, 'Pcs', '2021-05-12 23:36:23', '2021-05-13 22:07:41');
INSERT INTO `p_unit` VALUES (4, 'Lusin', '2021-05-13 23:48:43', NULL);
INSERT INTO `p_unit` VALUES (6, 'inchs', '2022-11-27 14:41:50', '2022-11-27 08:41:57');

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier`  (
  `supplier_id` int NOT NULL AUTO_INCREMENT,
  `name_perusahaan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone_perusahaan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name_sales` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone_sales` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`supplier_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES (2, 'Unilever Makanan', '021317321', 'jalan a', 'sales a', '0827312131', 'sales', '2021-05-01 23:20:00', '2022-11-27 08:35:57');
INSERT INTO `supplier` VALUES (3, 'Unilever Minuman', '02312512', 'alamat b', 'sales b', '0978979872', 'kunjungan hari selasa 1 hari dalam seminggu', '2021-05-01 23:51:44', '2021-05-28 10:38:52');
INSERT INTO `supplier` VALUES (4, 'Wings', '9812381', 'pemancingan           ', 'ganti sales m', '091283123', 'sales makanan ganti', '2021-05-07 22:13:27', '2021-05-28 10:39:03');
INSERT INTO `supplier` VALUES (7, 'Wings', '0822123123', 'jakarta', 'chandra', '08999123123', 'sales', '2022-11-27 14:40:44', '2022-11-27 08:41:37');

-- ----------------------------
-- Table structure for t_penjualan
-- ----------------------------
DROP TABLE IF EXISTS `t_penjualan`;
CREATE TABLE `t_penjualan`  (
  `penjualan_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `kode_penjualan` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kode_barang` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `total` int NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`penjualan_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_penjualan
-- ----------------------------
INSERT INTO `t_penjualan` VALUES (1, 1, 'KDP1812220001', 'A005', 3, 15000, '2022-12-18');
INSERT INTO `t_penjualan` VALUES (2, 1, 'KDP1812220001', 'CF011', 2, 3000, '2022-12-18');
INSERT INTO `t_penjualan` VALUES (4, 1, 'KDP2412220001', 'CF011', 2, 3000, '2022-12-24');
INSERT INTO `t_penjualan` VALUES (5, 1, 'KDP2412220001', 'A005', 1, 5000, '2022-12-24');
INSERT INTO `t_penjualan` VALUES (6, 1, 'KDP2412220002', 'CF011', 2, 3000, '2022-12-24');
INSERT INTO `t_penjualan` VALUES (7, 1, 'KDP2412220002', 'A005', 2, 10000, '2022-12-24');
INSERT INTO `t_penjualan` VALUES (8, 1, 'KDP2412220003', 'CF011', 1, 1500, '2022-12-24');
INSERT INTO `t_penjualan` VALUES (9, 1, 'KDP2412220003', 'A005', 1, 5000, '2022-12-24');
INSERT INTO `t_penjualan` VALUES (10, 1, 'KDP2412220004', 'CF011', 1, 1500, '2022-12-24');
INSERT INTO `t_penjualan` VALUES (11, 1, 'KDP2412220004', 'A005', 1, 5000, '2022-12-24');
INSERT INTO `t_penjualan` VALUES (12, 1, 'KDP3012220001', 'CF011', 2, 3000, '2022-12-30');

-- ----------------------------
-- Table structure for t_stock
-- ----------------------------
DROP TABLE IF EXISTS `t_stock`;
CREATE TABLE `t_stock`  (
  `stock_id` int NOT NULL AUTO_INCREMENT,
  `item_id` int NOT NULL,
  `type` enum('in','out','return') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `detail` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `supplier_id` int NULL DEFAULT NULL,
  `qty` int NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `harga_beli` int NULL DEFAULT NULL,
  PRIMARY KEY (`stock_id`) USING BTREE,
  INDEX `item_id`(`item_id`) USING BTREE,
  INDEX `supplier_id`(`supplier_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `t_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_stock_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `t_stock_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_stock
-- ----------------------------
INSERT INTO `t_stock` VALUES (1, 11, 'in', '-', 3, 52, '2021-05-28', '2021-05-28 14:28:20', 1, NULL);
INSERT INTO `t_stock` VALUES (2, 11, 'out', '-', 3, 47, '2021-05-29', '2021-05-27 16:37:31', 1, NULL);
INSERT INTO `t_stock` VALUES (3, 11, 'return', '-', 3, 10, '2021-05-30', '2021-05-27 16:37:45', 1, NULL);
INSERT INTO `t_stock` VALUES (4, 12, 'in', '-', 3, 59, '2021-05-31', '2021-05-28 14:28:01', 1, NULL);
INSERT INTO `t_stock` VALUES (5, 12, 'out', '-', 3, 47, '2021-06-01', '2021-05-28 15:59:51', 1, NULL);
INSERT INTO `t_stock` VALUES (6, 12, 'return', '-', 3, 15, '2021-06-02', '2021-05-27 16:37:58', 1, NULL);
INSERT INTO `t_stock` VALUES (7, 13, 'in', '-', 3, 55, '2021-06-03', '2021-05-28 14:28:42', 1, NULL);
INSERT INTO `t_stock` VALUES (8, 13, 'out', '-', 3, 50, '2021-06-04', '2021-05-27 16:36:27', 1, NULL);
INSERT INTO `t_stock` VALUES (9, 13, 'return', '-', 3, 13, '2021-06-05', '2021-08-31 02:12:01', 1, NULL);
INSERT INTO `t_stock` VALUES (10, 14, 'in', '-', 3, 55, '2021-06-06', '2022-11-27 16:03:01', 1, NULL);
INSERT INTO `t_stock` VALUES (11, 14, 'out', '-', 3, 40, '2021-06-07', '2022-11-27 16:08:04', 1, NULL);
INSERT INTO `t_stock` VALUES (12, 14, 'return', '-', 3, 12, '2021-06-08', '2022-11-27 16:15:34', 1, NULL);
INSERT INTO `t_stock` VALUES (13, 15, 'in', '-', 3, 61, '2021-06-09', '2021-05-28 14:28:20', 1, NULL);
INSERT INTO `t_stock` VALUES (14, 15, 'out', '-', 3, 40, '2021-06-10', '2021-05-27 16:37:31', 1, NULL);
INSERT INTO `t_stock` VALUES (15, 15, 'return', '-', 3, 11, '2021-06-11', '2021-05-27 16:37:45', 1, NULL);
INSERT INTO `t_stock` VALUES (16, 16, 'in', '-', 3, 64, '2021-06-12', '2021-05-28 14:28:01', 1, NULL);
INSERT INTO `t_stock` VALUES (17, 16, 'out', '-', 3, 41, '2021-06-13', '2021-05-28 15:59:51', 1, NULL);
INSERT INTO `t_stock` VALUES (18, 16, 'return', '-', 3, 12, '2021-06-14', '2021-05-27 16:37:58', 1, NULL);
INSERT INTO `t_stock` VALUES (19, 17, 'in', '-', 3, 65, '2021-06-15', '2021-05-28 14:28:42', 1, NULL);
INSERT INTO `t_stock` VALUES (20, 17, 'out', '-', 3, 44, '2021-06-16', '2021-05-27 16:36:27', 1, NULL);
INSERT INTO `t_stock` VALUES (21, 17, 'return', '-', 3, 11, '2021-06-17', '2021-08-31 02:12:01', 1, NULL);
INSERT INTO `t_stock` VALUES (22, 28, 'in', '-', 3, 58, '2021-06-18', '2021-05-28 14:28:42', 1, NULL);
INSERT INTO `t_stock` VALUES (23, 28, 'out', '-', 3, 35, '2021-06-19', '2021-05-27 16:36:27', 1, NULL);
INSERT INTO `t_stock` VALUES (24, 28, 'return', '-', 3, 13, '2021-06-20', '2021-08-31 02:12:01', 1, NULL);
INSERT INTO `t_stock` VALUES (25, 5, 'in', '-', 3, 53, '2021-06-21', '2021-05-28 14:28:42', 1, NULL);
INSERT INTO `t_stock` VALUES (26, 5, 'out', '-', 3, 44, '2021-06-22', '2021-05-27 16:36:27', 1, NULL);
INSERT INTO `t_stock` VALUES (27, 5, 'return', '-', 3, 15, '2021-06-23', '2021-08-31 02:12:01', 1, NULL);
INSERT INTO `t_stock` VALUES (28, 6, 'in', '-', 3, 54, '2021-06-24', '2021-05-28 14:28:42', 1, NULL);
INSERT INTO `t_stock` VALUES (29, 6, 'out', '-', 3, 41, '2021-06-25', '2021-05-27 16:36:27', 1, NULL);
INSERT INTO `t_stock` VALUES (30, 6, 'return', '-', 3, 13, '2021-06-26', '2021-08-31 02:12:01', 1, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` int NOT NULL COMMENT '1 admin, 2 kasir, 3 inventori, 4 report',
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Chairul Anwar', 'Sawangan Depok', 1);
INSERT INTO `users` VALUES (2, 'kasir1', '874c0ac75f323057fe3b7fb3f5a8a41df2b94b1d', 'malik makul', 'jalan baru', 2);
INSERT INTO `users` VALUES (4, 'opay123', '698748ec31e008f167288bb9855b977dbfe2018d', 'opay', 'jalan sawah', 1);

SET FOREIGN_KEY_CHECKS = 1;
