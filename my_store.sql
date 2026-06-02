-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for my_store
CREATE DATABASE IF NOT EXISTS `my_store` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `my_store`;

-- Dumping structure for table my_store.account
CREATE TABLE IF NOT EXISTS `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.account: ~2 rows (approximately)
INSERT INTO `account` (`id`, `username`, `fullname`, `password`, `role`) VALUES
	(1, 'admin@gmail.com', 'Admin', '$2y$12$7l9MvYHyhGJ0oxezLlFB4uJ2gH089ZbNdMLvwB.Sj97U1NiJBug/i', 'admin'),
	(2, 'User01@gmail.com', 'User01', '$2y$12$cfUiHw557zw1Ek6PX7bkk.pt8YNczXdsxl7.D6YIU12Gp8j7WhMQ2', 'user');

-- Dumping structure for table my_store.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.category: ~6 rows (approximately)
INSERT INTO `category` (`id`, `name`, `description`) VALUES
	(1, 'IPhone', 'Danh mục các loại điện thoại'),
	(2, 'MAC', 'Danh mục các loại laptop'),
	(3, 'IPad', 'Danh mục các loại máy tính bảng'),
	(4, 'Phụ kiện', 'Danh mục phụ kiện điện tử'),
	(5, 'Air Pods', 'Danh mục loa, tai nghe, micro'),
	(16, 'Apple Watch', 'Đông hồ thông minh');

-- Dumping structure for table my_store.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.orders: ~0 rows (approximately)

-- Dumping structure for table my_store.order_details
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_order_details_order` (`order_id`),
  KEY `idx_order_details_product` (`product_id`),
  CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.order_details: ~0 rows (approximately)

-- Dumping structure for table my_store.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(15,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_product_category` (`category_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.product: ~19 rows (approximately)
INSERT INTO `product` (`id`, `name`, `description`, `price`, `image`, `category_id`) VALUES
	(1, 'MacBook Neo', 'Điều tuyệt diệu của Mac ở mức giá bất ngờ. Bốn màu tuyệt đẹp và một thiết kế nhôm bền chắc.\r\nChạy xuyên các tác vụ hàng ngày và các ứng dụng nhanh như bay với chip A18 Pro\r\nPin dùng cả ngày, thời lượng lên đến 16 giờ, theo bạn từ sáng đến đêm Chú thích 2\r\nMàn hình Liquid Retina 13 inch tuyệt đẹp, hỗ trợ 1 tỷ màu sắc Chú thích 3\r\nCamera FaceTime HD 1080p mang đến video sắc nét, sống động để bạn luôn trông đỉnh nhất\r\nĐược thiết kế cho AI, bao gồm các tính năng Apple Intelligence mạnh mẽ Chú thích #', 13999000.00, 'public/images/1780387338_macbook-neo-digitalmat-gallery-2-202603.jfif', 2),
	(2, 'MacBook Air 15 inch', 'MacBook Air nhẹ và mỏng dưới 2 cm, nên bạn có thể đem theo ở bất cứ nơi đâu\r\nSiêu mạnh mẽ với M5, CPU 10 lõi và GPU 10 lõi với Neural Accelerators\r\nThời lượng pin lên đến 18 giờ, cứ để bộ sạc ở nhà Chú thích 4\r\nĐược thiết kế cho AI, bao gồm các tính năng Apple Intelligence mạnh mẽ Chú thích #\r\nMàn hình Liquid Retina 15,3 inch hỗ trợ 1 tỷ màu Chú thích 5\r\nCamera 12MP Center Stage giữ bạn luôn ở giữa khung hình khi gọi video, kể cả khi bạn dịch chuyển', 32299000.00, 'public/images/1780387482_macbook-air-15-digitalmat-gallery-1-202503.png', 2),
	(3, 'MacBook Pro 16 inch', 'Nay với M5 Pro hoặc M5 Max và ổ lưu trữ SSD nhanh hơn đến 2x, MacBook Pro trao cho bạn sức mạnh để thực hiện các dự án phức tạp nhất Chú thích 11\r\nHoạt động bền bỉ cả ngày lẫn đêm với thời lượng pin lên đến 24 giờ Chú thích 7\r\nĐược thiết kế cho AI, bao gồm các tính năng Apple Intelligence mạnh mẽ Chú thích #\r\nMàn hình Liquid Retina XDR 16.2 inch có độ sáng đỉnh 1600 nit, độ sáng liên tục lên đến 1000 nit, cùng độ tương phản 1.000.000:1. Chú thích 8, Chú thích 9 Có tùy chọn Nano-texture.\r\nLuôn ở khung hình hoàn hảo và âm thanh tuyệt hay với camera 12MP Center Stage, các micrô chất lượng chuẩn studio và sáu loa với chế độ Âm Thanh Không Gian\r\nKết nối mọi thứ với ba cổng Thunderbolt 5, một cổng HDMI, một khe cắm thẻ SDXC, một jack cắm tai nghe và một cổng sạc MagSafe Chú thích 10', 67589000.00, 'public/images/1780387682_mbp-16-digitalmat-gallery-1-202410.jfif', 2),
	(4, 'iMac', 'iMac là chiếc máy tính để bàn tất cả trong một, mỏng ấn tượng, với bảy màu rực rỡ sẽ là mảnh ghép ăn ý cho mọi căn phòng\r\nChip M4 mạnh mẽ với CPU lên đến 10 lõi và GPU lên đến 10 lõi giúp mọi thứ hoạt động trơn tru\r\nĐược thiết kế cho AI, bao gồm các tính năng Apple Intelligence mạnh mẽ Chú thích #\r\nMàn hình Retina 4,5K 24 inch có độ sáng 500 nit và hỗ trợ lên đến 1 tỷ màu, với tùy chọn mặt kính Nano-texture để giảm độ chói trong môi trường rất sáng Chú thích 12\r\nCamera 12MP Center Stage, các micrô chất lượng chuẩn studio và sáu loa với chế độ Âm Thanh Không Gian giúp bạn luôn trong khung hình một cách hoàn hảo cùng âm thanh tuyệt vời.\r\nBao gồm Magic Mouse và Magic Keyboard cùng tông màu', 33676000.00, 'public/images/1780387806_imac-digitalmat-gallery-2-202410.png', 2),
	(5, 'Mac Studio', 'Siêu mạnh mẽ với M3 Ultra, CPU lên đến 32 lõi, GPU lên đến 80 lõi và Neural Engine 32 lõi\r\nSở hữu sáu cổng Thunderbolt 5, hai cổng USB-A, một cổng HDMI, một khe thẻ nhớ SDXC và một jack cắm tai nghe\r\nThiết kế nhỏ gọn tuyệt đẹp vừa vặn ngay trên bàn làm việc của bạn, cùng hệ thống tản nhiệt giúp Mac Studio vận hành một cách mát mẻ và êm ái\r\nPhối hợp hoàn hảo với Studio Display và hỗ trợ tối đa tám màn hình\r\nĐược thiết kế cho AI, bao gồm các tính năng Apple Intelligence mạnh mẽ Chú thích #', 109301000.00, 'public/images/1780388081_mac-studio-digitalmat-gallery-1-202503.png', 2),
	(6, 'iPhone 17 Pro', 'Màn hình 6,3 inch với ProMotion lên đến 120Hz. Chú thích 2 Mặt trước Ceramic Shield 2 cho khả năng chống trầy xước tốt hơn gấp 3 lần. Thiết kế nguyên khối nhôm rèn.\r\nHệ thống camera pro. Chụp cận hơn nữa với thu phóng chất lượng quang học 8x và camera sau 48MP.\r\nCamera trước 18MP Center Stage. Nhiều cách linh hoạt để căn chỉnh khung hình. Chụp selfie nhóm thông minh hơn, video Ghi Hình Kép để quay đồng thời cả phía trước và phía sau, và hơn thế nữa.\r\nChip A19 Pro với GPU 6 lõi. Tản nhiệt hơi nước. Nhanh thần tốc.\r\nThời lượng pin đột phá với thời gian xem video lên đến 31 giờ. Chú thích 3\r\niOS. Diện mạo mới. Còn diệu kỳ hơn. Được thiết kế cho Apple Intelligence. Chú thích 1', 34999000.00, 'public/images/1780388197_iphone-card-40-17pro-202509.jfif', 1),
	(7, 'iPhone 17 Pro Max', 'Màn hình 6,9 inch với ProMotion lên đến 120Hz. Chú thích 2 Mặt trước Ceramic Shield 2 cho khả năng chống trầy xước tốt hơn gấp 3 lần. Thiết kế nguyên khối nhôm rèn.\r\nHệ thống camera pro. Chụp cận hơn nữa với thu phóng chất lượng quang học 8x và camera sau 48MP.\r\nCamera trước 18MP Center Stage. Nhiều cách linh hoạt để căn chỉnh khung hình. Chụp selfie nhóm thông minh hơn, video Ghi Hình Kép để quay đồng thời cả phía trước và phía sau, và hơn thế nữa.\r\nChip A19 Pro với GPU 6 lõi. Tản nhiệt hơi nước. Nhanh thần tốc.\r\nThời lượng pin tốt nhất từng có trên iPhone với thời gian xem video lên đến 37 giờ. Chú thích 3\r\niOS. Diện mạo mới. Còn diệu kỳ hơn. Được thiết kế cho Apple Intelligence. Chú thích 1', 37999000.00, 'public/images/1780388292_iphone-card-40-17pro-202509.jfif', 1),
	(8, 'iPhone Air', 'Màn hình 6,5 inch với ProMotion lên đến 120Hz. Chú thích 2 Mặt trước Ceramic Shield 2 cho khả năng chống trầy xước tốt hơn gấp 3 lần. Thiết kế titan siêu mỏng, siêu nhẹ.\r\nCamera trước 18MP Center Stage. Nhiều cách linh hoạt để căn chỉnh khung hình. Chụp selfie nhóm thông minh hơn, video Ghi Hình Kép để quay đồng thời cả phía trước và phía sau, và hơn thế nữa.\r\nCamera 48MP Fusion Main với khả năng thu phóng chất lượng quang học 2x. Sức mạnh của hai camera tiên tiến trong một.\r\nChip A19 Pro với GPU 5 lõi. Hiệu năng chuyên nghiệp cho các tác vụ phức tạp nhất và chơi game nâng cao.\r\nPin dùng cả ngày với thời gian xem video lên đến 27 giờ. Chú thích 3\r\niOS. Diện mạo mới. Còn diệu kỳ hơn. Được thiết kế cho Apple Intelligence. Chú thích 1', 31999000.00, 'public/images/1780388389_iphone-card-40-17air-202509.jfif', 1),
	(9, 'iPhone 17', 'Màn hình 6,3 inch với ProMotion lên đến 120Hz. Chú thích 2 Mặt trước Ceramic Shield 2 cho khả năng chống trầy xước tốt hơn gấp 3 lần. Thiết kế nhôm và kính.\r\nCamera trước 18MP Center Stage. Nhiều cách linh hoạt để căn chỉnh khung hình. Chụp selfie nhóm thông minh hơn, video Ghi Hình Kép để quay đồng thời cả phía trước và phía sau, và hơn thế nữa.\r\nChụp ảnh có độ phân giải siêu cao theo mặc định với hệ thống camera 48MP Dual Fusion, với khả năng thu phóng chất lượng quang học 2x.\r\nChip A19 với GPU 5 lõi. Sức mạnh cho mọi thứ bạn làm trên iPhone.\r\nPin dùng cả ngày với thời gian xem video lên đến 30 giờ. Chú thích 3\r\niOS. Diện mạo mới. Còn diệu kỳ hơn. Được thiết kế cho Apple Intelligence. Chú thích 1', 24999000.00, 'public/images/1780388465_iphone-card-40-17-202509.jfif', 1),
	(10, 'iPhone 17e', 'Màn hình Super Retina XDR 6,1 inch tuyệt đẹp, Chú thích ∆ được bảo vệ bởi Ceramic Shield 2 cho khả năng chống trầy xước tốt hơn gấp 3 lần. Chú thích §\r\nThời lượng pin cả ngày với thời gian xem video lên đến 26 giờ. Chú thích 4 Sạc nhanh với USB-C và nay hỗ trợ MagSafe.\r\nChip A19 thế hệ mới nhất với GPU 4 lõi. Mạnh mẽ cho game AAA, phát trực tuyến 4K và hơn thế nữa.\r\nCamera Fusion 48MP với Telephoto 2x chất lượng quang học cùng camera trước 12MP. Chụp những bức ảnh xứng đáng được lưu giữ với ảnh chân dung thế hệ mới.\r\nDung lượng lưu trữ khởi điểm 256GB. Chú thích 5 Thêm không gian cho những điều quan trọng.\r\niOS 26 và Apple Intelligence. Diện mạo mới. Còn diệu kỳ hơn. Chú thích 1', 17999000.00, 'public/images/1780388520_iphone-card-40-17e-202603.jfif', 1),
	(11, 'iPhone 16 Plus', 'Thiết kế nhôm chuẩn hàng không vũ trụ 6,7 inch Chú thích 6 với mặt trước Ceramic Shield bền chắc, nút Tác Vụ và USB‑C.\r\niOS. Diện mạo mới. Còn diệu kỳ hơn. Được thiết kế cho Apple Intelligence. Chú thích 1\r\nĐiều Khiển Camera giúp bạn truy cập nhanh các công cụ camera dễ dàng hơn.\r\nChip A18 hỗ trợ Apple Intelligence và chơi game như dùng máy console với hiệu quả tiết kiệm điện vượt trội.\r\nThời lượng pin cả ngày, thời gian xem video lên đến 27 giờ. Chú thích 3\r\nChụp ảnh và quay video không gian cực đỉnh trên iPhone 16 Plus, rồi xem lại trên Apple Vision Pro. chú thích ⁴', 25999000.00, 'public/images/1780388587_iphone-card-40-16plus-202509.jfif', 1),
	(12, 'iPad Pro 13 inch', 'Chip M5 của Apple mang đến tốc độ thế hệ mới và AI trên thiết bị mạnh mẽ cho các tác vụ cá nhân, chuyên nghiệp và sáng tạo mà bạn thực hiện hàng ngày\r\nApple Intelligence giúp bạn sáng tạo, giao tiếp và hoàn thành công việc dễ dàng, đồng thời mang đến sự yên tâm với các tính năng bảo vệ quyền riêng tư đột phá chú thích  Chú thích 1\r\nMàn hình Ultra Retina XDR chú thích  Chú thích 2 với ProMotion, dải màu rộng P3 và True Tone. Tùy chọn mặt kính Nano-texture.\r\nCamera chuyên nghiệp tích hợp công nghệ LiDAR Scanner cùng camera Center Stage 12MP để quay chụp theo chiều ngang\r\nTương thích với Apple Pencil Pro, Apple Pencil (USB-C), Magic Keyboard cho iPad Pro và Smart Folio chú thích  Chú thích 3', 37199000.00, 'public/images/1780388919_ipadpro11-digitalmat-gallery-1-202404.png', 3),
	(13, 'iPad Air 13 inch', 'Chip Apple M4 tiếp sức mạnh cho hiệu năng phi thường, đồ họa tiên tiến và AI trên thiết bị\r\nApple Intelligence giúp bạn sáng tạo, giao tiếp và hoàn thành công việc dễ dàng, đồng thời mang đến sự yên tâm với các tính năng bảo vệ quyền riêng tư đột phá Chú thích 1\r\nMàn hình Liquid Retina mang đến trải nghiệm xem sống động, chân thực\r\nCamera trước 12MP Center Stage cho các cuộc gọi video sống động\r\nTương thích với Apple Pencil Pro, Apple Pencil (USB-C), Magic Keyboard cho iPad Air và Smart Folio Chú thích 3', 20689000.00, 'public/images/1780389034_ipadair13-digitalmat-gallery-1-202404.jfif', 3),
	(14, 'iPad', 'Chip Apple A16 mang đến hiệu năng thần tốc cho các tác vụ yêu thích của bạn\r\nThiết kế toàn màn hình với màn hình Liquid Retina 11 inch mang lại trải nghiệm xem tuyệt vời Chú thích 4\r\nCamera trước 12MP Center Stage — phù hợp hoàn hảo để gọi video\r\nDuy trì kết nối với Wi-Fi 6 và mạng không dây 5G Chú thích 5 nhanh như chớp\r\nTương thích với Apple Pencil (USB‑C), Apple Pencil (thế hệ thứ 1) Chú thích 6, Magic Keyboard Folio và Smart Folio Chú thích 3', 9257000.00, 'public/images/1780389165_ipad-digitalmat-gallery-1-202210.png', 3),
	(15, 'iPad mini', 'Màn hình Liquid Retina 8,3 inch tuyệt đẹp với True Tone và dải màu rộng P3 Chú thích 7\r\nChip A17 Pro cho hiệu năng siêu nhanh và thời lượng pin dùng cả ngày Chú thích 8\r\nApple Intelligence giúp bạn sáng tạo, giao tiếp và hoàn thành công việc dễ dàng, đồng thời mang đến sự yên tâm với các tính năng bảo vệ quyền riêng tư đột phá Chú thích 1\r\nCamera 12MP Center Stage cực kỳ phù hợp để gọi video\r\nTương thích với Apple Pencil Pro, Apple Pencil (USB-C) và Smart Folio Chú thích 3', 12344000.00, 'public/images/1780389300_ipad-mini-digitalmat-gallery-1-202410.png', 3),
	(16, 'AirPods 4', 'Bước đột phá về âm thanh và sự thoải mái.', 3799000.00, 'public/images/1780389584_explore_airpods_4_closed__dgo55jp7r7gy_xlarge.jpg', 5),
	(17, 'AirPods 4 Chủ Động Khử Tiếng Ồn', 'Bước đột phá về âm thanh, sự thoải mái và khả năng kiểm soát tiếng ồn.', 4999000.00, 'public/images/1780389673_explore_airpods_4_opened__d1lvsgfc59me_xlarge.jpg', 5),
	(18, 'AirPods Pro 3', 'Chủ Động Khử Tiếng Ồn◊\r\ntai bạn chưa từng nghe,\r\ncùng cảm biến nhịp tim trong khi tập luyện.◊◊', 6799000.00, 'public/images/1780389757_case__b87ou7jna9de_large.png', 5),
	(19, 'AirPods Max 2', 'Một trải nghiệm nghe riêng tư với tai nghe dạng chụp.', 14999000.00, 'public/images/1780389817_airpods_max_midnight__ddy8oa1y3y4i_large.png', 5);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
