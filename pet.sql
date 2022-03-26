-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: localhost    Database: pet
-- ------------------------------------------------------
-- Server version	5.7.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bengoantrongtuan`
--

DROP TABLE IF EXISTS `bengoantrongtuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bengoantrongtuan` (
  `mapet` int(11) NOT NULL AUTO_INCREMENT,
  `tenpet` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tuoi` varchar(13) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tiemphong` tinyint(1) NOT NULL,
  `hinh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xoa` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mapet`),
  KEY `mapet` (`mapet`),
  CONSTRAINT `FK_bengoantrongtuan_thucung` FOREIGN KEY (`mapet`) REFERENCES `thucung` (`mapet`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bengoantrongtuan`
--

LOCK TABLES `bengoantrongtuan` WRITE;
/*!40000 ALTER TABLE `bengoantrongtuan` DISABLE KEYS */;
INSERT INTO `bengoantrongtuan` VALUES (1,'Cún vàng','Đực','Trẻ',0,'cun-vang.jpg',0),(2,'Tôm','Đực','Trẻ',0,'tom.jpg',0),(3,'Chewie','Đực','Trưởng thành',1,'chewie.jpg',0),(4,'Beo','Đực','Trưởng thành',1,'bao.jpg',0);
/*!40000 ALTER TABLE `bengoantrongtuan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donhang`
--

DROP TABLE IF EXISTS `donhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donhang` (
  `madon` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `hoten` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `dienthoai` int(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pttt` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:tien mat,1:online',
  `trangthai` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:chờ xác nhận,1:chờ lấy hàng,2:đang giao,3:đã giao,4:đã hủy',
  `thanhtien` int(25) NOT NULL DEFAULT '0',
  PRIMARY KEY (`madon`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donhang`
--

LOCK TABLES `donhang` WRITE;
/*!40000 ALTER TABLE `donhang` DISABLE KEYS */;
INSERT INTO `donhang` VALUES (4,'','Phạm Đức Long','abc',12312412,'lpham776@gmail.com',0,3,100000),(5,'','Phan Lê Hữu Nhân','abc',467568677,'kevilmitnick09@gmail.com',0,1,100000),(6,'','Phạm Đức Long','abc',12312412,'kevil_mitnick@yahoo.com',0,0,100000),(7,'','Phạm Đức Long','abc',12312412,'lpham776@gmail.com',0,0,1000000),(8,'','Phạm Đức Long','abc',12312412,'kevilmitnick09@gmail.com',0,2,100000),(10,'','Phạm Đức Long','abc',12312412,'lpham776@gmail.com',0,4,100000),(36,'user1','Phan Lê Hữu Nhân','abc',12312412,'kevil_mitnick@yahoo.com',0,3,500000),(37,'user1','Phan Lê Hữu Nhân','abc',12312412,'lpham776@gmail.com',1,4,500000),(38,'','Phạm Đức Long','abc',12312412,'kevilmitnick09@gmail.com',1,0,700000),(39,'','Phạm Đức Long','abc',12312412,'lpham776@gmail.com',1,0,400000),(40,'user1','Phạm Đức Long','abc',12312412,'lpham776@gmail.com',1,4,200000);
/*!40000 ALTER TABLE `donhang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giohang`
--

DROP TABLE IF EXISTS `giohang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `giohang` (
  `stt` int(11) NOT NULL AUTO_INCREMENT,
  `masp` char(10) NOT NULL,
  `tensp` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gia` float NOT NULL,
  `hinh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` float NOT NULL DEFAULT '0',
  `madon` int(15) NOT NULL,
  `xoa` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`stt`),
  KEY `masp` (`masp`),
  KEY `madon` (`madon`),
  CONSTRAINT `FK_giohang_donhang` FOREIGN KEY (`madon`) REFERENCES `donhang` (`madon`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_giohang_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giohang`
--

LOCK TABLES `giohang` WRITE;
/*!40000 ALTER TABLE `giohang` DISABLE KEYS */;
INSERT INTO `giohang` VALUES (1,'sp0032','Thức ăn Smartheart Puppy Power Pack 1kg',100000,'product_1.jpg',1,100000,4,0),(2,'sp0132','SmartHeart – Thức ăn dinh dưỡng cho chó to vị bò nướng (400g)',100000,'product_2.jpg',1,100000,5,0),(3,'sp0132','SmartHeart – Thức ăn dinh dưỡng cho chó to vị bò nướng (400g)',100000,'product_2.jpg',1,100000,6,0),(4,'sp0032','Thức ăn Smartheart Puppy Power Pack 1kg',100000,'product_1.jpg',3,300000,7,0),(5,'sp0132','SmartHeart – Thức ăn dinh dưỡng cho chó to vị bò nướng (400g)',100000,'product_2.jpg',7,700000,7,0),(6,'sp0132','SmartHeart – Thức ăn dinh dưỡng cho chó to vị bò nướng (400g)',100000,'product_2.jpg',1,100000,8,0),(7,'sp0132','SmartHeart – Thức ăn dinh dưỡng cho chó to vị bò nướng (400g)',100000,'product_2.jpg',1,100000,10,0),(8,'sp0032','Thức ăn Smartheart Puppy Power Pack 1kg',100000,'product_1.jpg',4,400000,36,0),(9,'sp0132','SmartHeart – Thức ăn dinh dưỡng cho chó to vị bò nướng (400g)',100000,'product_2.jpg',1,100000,36,0),(10,'sp0032','Thức ăn Smartheart Puppy Power Pack 1kg',100000,'product_1.jpg',1,100000,37,0),(11,'sp0132','SmartHeart – Thức ăn dinh dưỡng cho chó to vị bò nướng (400g)',100000,'product_2.jpg',4,400000,37,0),(12,'sp0032','Thức ăn Smartheart Puppy Power Pack 1kg',100000,'product_1.jpg',4,400000,38,0),(13,'sp0132','SmartHeart – Thức ăn dinh dưỡng cho chó to vị bò nướng (400g)',100000,'product_2.jpg',2,200000,38,0),(14,'sp0232','Xương gặm sạch răng cho chó vị pho mát – 7 Dental Effects',100000,'product_3.jpg',1,100000,38,0),(15,'sp0032','Thức ăn Smartheart Puppy Power Pack 1kg',100000,'product_1.jpg',4,400000,39,0),(16,'sp0032','Thức ăn Smartheart Puppy Power Pack 1kg',100000,'product_1.jpg',1,100000,40,0),(17,'sp0132','SmartHeart – Thức ăn dinh dưỡng cho chó to vị bò nướng (400g)',100000,'product_2.jpg',1,100000,40,0);
/*!40000 ALTER TABLE `giohang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gopy`
--

DROP TABLE IF EXISTS `gopy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gopy` (
  `magopy` int(255) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `tieude` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xoa` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`magopy`)
) ENGINE=MyISAM AUTO_INCREMENT=10004 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gopy`
--

LOCK TABLES `gopy` WRITE;
/*!40000 ALTER TABLE `gopy` DISABLE KEYS */;
INSERT INTO `gopy` VALUES (10000,'Phạm Đức Long','lpham776@gmail.com','abc','xyz',0),(10001,'Phạm Đức Long','lpham776@gmail.com','abc','abc',0),(10002,'Phạm Đức Long','lpham776@gmail.com','abc','ádasdas',0),(10003,'Phan Lê Hữu Nhân','lpham776@gmail.com','abc','đâsdaw',0);
/*!40000 ALTER TABLE `gopy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lienhenhannuoi`
--

DROP TABLE IF EXISTS `lienhenhannuoi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lienhenhannuoi` (
  `stt` int(11) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `hinh` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mapet` int(11) NOT NULL,
  `xoa` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`stt`),
  KEY `mapet` (`mapet`),
  CONSTRAINT `FK_lienhenhannuoi_thucung` FOREIGN KEY (`mapet`) REFERENCES `thucung` (`mapet`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lienhenhannuoi`
--

LOCK TABLES `lienhenhannuoi` WRITE;
/*!40000 ALTER TABLE `lienhenhannuoi` DISABLE KEYS */;
INSERT INTO `lienhenhannuoi` VALUES (1,'Phạm Đức Long',12312412,'lpham776@gmail.com','https://www.facebook.com/kevilmitnick/','about.png',1,0),(2,'Phạm Đức Long',12312412,'kevilmitnick09@gmail.com','https://www.facebook.com/kevilmitnick/','apple-icon.png',1,0),(3,'Phạm Đức Long',12312412,'lpham776@gmail.com','https://www.facebook.com/kevilmitnick/','about.png',1,0);
/*!40000 ALTER TABLE `lienhenhannuoi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loaipet`
--

DROP TABLE IF EXISTS `loaipet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loaipet` (
  `maloai` int(11) NOT NULL AUTO_INCREMENT,
  `tenloai` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xoa` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`maloai`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loaipet`
--

LOCK TABLES `loaipet` WRITE;
/*!40000 ALTER TABLE `loaipet` DISABLE KEYS */;
INSERT INTO `loaipet` VALUES (1,'Chó',0),(2,'Mèo',0),(3,'abcd',0);
/*!40000 ALTER TABLE `loaipet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loaisp`
--

DROP TABLE IF EXISTS `loaisp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loaisp` (
  `maloai` int(11) NOT NULL AUTO_INCREMENT,
  `tenloai` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xoa` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`maloai`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loaisp`
--

LOCK TABLES `loaisp` WRITE;
/*!40000 ALTER TABLE `loaisp` DISABLE KEYS */;
INSERT INTO `loaisp` VALUES (1,'Thức ăn cho mèo',1),(2,'Thức ăn cho chó',0);
/*!40000 ALTER TABLE `loaisp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quantri`
--

DROP TABLE IF EXISTS `quantri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quantri` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `hoten` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `quyen` int(1) NOT NULL COMMENT '1:superadmin,2:staff,3:client',
  `xoa` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quantri`
--

LOCK TABLES `quantri` WRITE;
/*!40000 ALTER TABLE `quantri` DISABLE KEYS */;
INSERT INTO `quantri` VALUES ('admin','123456','Phạm Đức Long','lpham776@gmail.com',1,0),('staff1','123456','Phan Lê Hữu Nhân','kevil_mitnick@yahoo.com',1,0),('xyz','123456','Phạm Đức Long','dh51800895@student.stu.edu.vn',3,0),('abc','123456','Phạm Đức Long','dh51800895@gmail.com',3,0),('user2','123456','Phạm Đức Long','kevilmitnick09@gmail.com',3,0),('user1','123456','Phạm Đức Long','kevil_mitnick@yahoo.com',3,0),('','','','',3,0);
/*!40000 ALTER TABLE `quantri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sanpham` (
  `masp` char(10) NOT NULL,
  `tensp` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mota` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `congdung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gia` float NOT NULL,
  `math` int(11) NOT NULL,
  `loaisp` int(11) NOT NULL,
  `hinh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xoa` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`masp`),
  KEY `math` (`math`),
  KEY `loaisp` (`loaisp`),
  CONSTRAINT `FK_sanpham_loaisp` FOREIGN KEY (`loaisp`) REFERENCES `loaisp` (`maloai`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_sanpham_thuonghieu` FOREIGN KEY (`math`) REFERENCES `thuonghieu` (`math`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sanpham`
--

LOCK TABLES `sanpham` WRITE;
/*!40000 ALTER TABLE `sanpham` DISABLE KEYS */;
INSERT INTO `sanpham` VALUES ('sp0032','Thức ăn Smartheart Puppy Power Pack 1kg','SmartHeart Power Pack Puppy – Thức ăn khô cho chó con tạo cơ bắp','Làm tăng sức mạnh cơ bắp\r\nL-carnitine được thêm vào làm săn chắc cơ bắp\r\nTạo thêm khối cơ bắp\r\nNăng lượng cao danh cho các chú chó năng động và mạnh mẽ\r\nLàn da khỏe mạnh, lông óng mượt\r\nHệ tiêu hóa khỏe mạnh\r\nHệ miễn dịch mạnh mẽ',100000,3,2,'product_1.jpg',0),('sp0132','SmartHeart – Thức ăn dinh dưỡng cho chó to vị bò nướng (400g)','Thức Ăn Cho Chó Hạt Smartheart Adult Vị bò giúp cung cấp đầy đủ dưỡng chất cần thiết cho sự phát triển của thú cưng. Sản xuất bởi dây truyền hiện đại, đảm bảo vệ sinh an toàn thực phẩm. Sản phẩm được đóng gói tiện lợi, dễ dàng sử dụng và bảo quản. Smartheart Adult là loại thức ăn cho chó lớn phổ biến nhất hiện nay, được xuất xứ từ Thái Lan và thích hợp với hầu hết mọi giống chó.','Tăng cường hệ thống miễn dịch: Vitamin E và Selen cho hệ thống miễn dịch mạch mẽ.Tiêu hóa khỏe mạnh: Thành phần để tiêu hóa cao giúp cải thiện tiêu hóa và chất lượng phân.\r\nXương chắc và răng khỏe: Canxi và phốt pho cho xương chắc và răng khỏe.\r\nTăng cường chức năng não: DHA ( từ Dầu cá ) và Cholin (từ Lecithin ) giúp tăng cường chức năng não bộ và hệ thần kinh.\r\nTrái tim khỏe mạnh: Axit béo Omega 3 từ dầu cá cho một trái tim khỏe mạnh.\r\nDa và lông khỏe mạnh: Axit béo Omega 3 và 6 cân bằng và đảm bảo cho da óng mượt, khỏe mạnh.',100000,3,2,'product_2.jpg',0),('sp0232','Xương gặm sạch răng cho chó vị pho mát – 7 Dental Effects','Bánh thưởng cho chó dạng que vị cá WUJI  Jerky Stick Fish Flavor dành cho tất cả các giống chó qua các giai đoạn phát triển.','Kẽm giúp duy trì tính toàn vẹn của da và lông.\r\nCollagen làm giảm các dấu hiệu lão hóa.\r\nVitamin E & Selen giúp bảo vệ tổn thương do các gốc tự do gây ra (Chất chống oxy hóa).\r\nVitamin A cần thiết để giữ cho thị lực rõ ràng và lâu hơn.\r\nProtein giúp phát triển cơ bắp và sửa chữa các mô.\r\nVitamin D3 giúp xương và răng chắc khỏe.\r\nVitamin B1, B5, B6, B12 cần thiết cho các chức năng của não.\r\nVitamin B1 giúp tăng cường trao đổi chất.',100000,3,2,'product_3.jpg',0),('sp0332','abc','ádasdsdf','ấdfgsafgsa',324234000,1,2,'apple-icon.png',0);
/*!40000 ALTER TABLE `sanpham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spnoibat`
--

DROP TABLE IF EXISTS `spnoibat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spnoibat` (
  `masp` char(10) NOT NULL,
  `tensp` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mota` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gia` float NOT NULL,
  `hinh` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `xoa` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`masp`),
  KEY `masp` (`masp`),
  CONSTRAINT `FK_spnoibat_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spnoibat`
--

LOCK TABLES `spnoibat` WRITE;
/*!40000 ALTER TABLE `spnoibat` DISABLE KEYS */;
INSERT INTO `spnoibat` VALUES ('sp0032','Thức ăn Smartheart Puppy Power Pack 1kg','SmartHeart Power Pack Puppy – Thức ăn khô cho chó con tạo cơ bắp',100000,'product_1.jpg',0),('sp0132','SmartHeart – Thức ăn dinh dưỡng cho chó to vị bò nướng (400g)','Thức Ăn Cho Chó Hạt Smartheart Adult Vị bò giúp cung cấp đầy đủ dưỡng chất cần thiết cho sự phát triển của thú cưng. Sản xuất bởi dây truyền hiện đại, đảm bảo vệ sinh an toàn thực phẩm. Sản phẩm được đóng gói tiện lợi, dễ dàng sử dụng và bảo quản. Smartheart Adult là loại thức ăn cho chó lớn phổ biến nhất hiện nay, được xuất xứ từ Thái Lan và thích hợp với hầu hết mọi giống chó.',100000,'product_2.jpg',0),('sp0232','Xương gặm sạch răng cho chó vị pho mát – 7 Dental Effects','Bánh thưởng cho chó dạng que vị cá WUJI  Jerky Stick Fish Flavor dành cho tất cả các giống chó qua các giai đoạn phát triển.',100000,'product_3.jpg',0);
/*!40000 ALTER TABLE `spnoibat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thucung`
--

DROP TABLE IF EXISTS `thucung`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thucung` (
  `mapet` int(11) NOT NULL AUTO_INCREMENT,
  `tenpet` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tuoi` varchar(13) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tiemphong` tinyint(1) NOT NULL DEFAULT '0',
  `maloai` int(11) NOT NULL,
  `hinh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nhannuoi` tinyint(1) NOT NULL DEFAULT '0',
  `xoa` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mapet`),
  KEY `maloai` (`maloai`),
  CONSTRAINT `FK_thucung_loaipet` FOREIGN KEY (`maloai`) REFERENCES `loaipet` (`maloai`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thucung`
--

LOCK TABLES `thucung` WRITE;
/*!40000 ALTER TABLE `thucung` DISABLE KEYS */;
INSERT INTO `thucung` VALUES (1,'Cún vàng','Cái','Trẻ',0,1,'cun-vang.jpg',0,0),(2,'Tôm','Đực','Trẻ',0,2,'tom.jpg',0,0),(3,'Chewie','Đực','Trưởng thành',1,1,'chewie.jpg',0,0),(4,'Beo','Đực','Trưởng thành',1,2,'bao.jpg',0,0),(5,'Bánh bao','Cái','Trẻ',0,1,'banhbao.jpg',0,0),(6,'Christmas','Đực','Trẻ',0,2,'christmas.png',0,0),(7,'Alice','Cái','Trẻ',0,1,'Alice.png',0,0),(8,'Tatsu','Đực','Trưởng thành',0,2,'tatsu.png',0,0),(9,'Charlie','Đực','Trẻ',0,2,'Charlie.png',0,0),(10,'Mỡ','Đực','Trưởng thành',0,2,'mo.png',0,0),(11,'Bingo','Đực','Trẻ',0,2,'bingo.png',0,0);
/*!40000 ALTER TABLE `thucung` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thuonghieu`
--

DROP TABLE IF EXISTS `thuonghieu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thuonghieu` (
  `math` int(11) NOT NULL AUTO_INCREMENT,
  `tenth` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xoa` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`math`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thuonghieu`
--

LOCK TABLES `thuonghieu` WRITE;
/*!40000 ALTER TABLE `thuonghieu` DISABLE KEYS */;
INSERT INTO `thuonghieu` VALUES (1,'Royal',0),(2,'Ganador',1),(3,'SmartHeart',0),(4,'Minino',0),(5,'meo-o',0),(6,'Pedigree',0),(7,'ClassicPets',0),(8,'NultriSouroe',0),(9,'Fitmin',0),(10,'ANF',0),(11,'IsKhan',0),(12,'abcd',0);
/*!40000 ALTER TABLE `thuonghieu` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-12 15:19:53
