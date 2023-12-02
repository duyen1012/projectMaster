-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 06:26 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ismart`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id_image` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `url_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checkout`
--

CREATE TABLE `tbl_checkout` (
  `id` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `note` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `phone_number` varchar(14) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `date_created` date NOT NULL,
  `content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_introduce`
--

CREATE TABLE `tbl_introduce` (
  `id` int(11) NOT NULL,
  `introduce_title` varchar(250) NOT NULL,
  `introduce_content` varchar(250) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_customer`
--

CREATE TABLE `tbl_list_customer` (
  `id_customer` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `phone_number` varchar(14) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_list_customer`
--

INSERT INTO `tbl_list_customer` (`id_customer`, `fullname`, `phone_number`, `address`, `email`, `date_created`) VALUES
(1, 'Nguyễn Mỹ Duyên', '0123456789', 'Cần Thơ', 'ntmduyen@gmail.com.vn', '2023-09-14'),
(2, 'Nguyễn Ngọc Tường Vy', '06324242424', 'Cà Mau', 'ntvy@gmail.com.vn', '2023-09-06'),
(3, 'Lê Tuyết Nhi', '097565664', 'Cờ Đỏ', 'ltuyetnhi@gmail.ocm', '2023-09-10'),
(4, 'Nguyễn Hùng Cường', '0767555656', 'Cờ Đỏ', 'nhcuong2gmail.com', '2023-09-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_order`
--

CREATE TABLE `tbl_list_order` (
  `id_order` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `order_name` varchar(100) NOT NULL,
  `code_order` varchar(100) NOT NULL,
  `product_number` varchar(100) NOT NULL,
  `total_price` varchar(250) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_list_order`
--

INSERT INTO `tbl_list_order` (`id_order`, `id_customer`, `order_name`, `code_order`, `product_number`, `total_price`, `order_date`, `order_status`) VALUES
(1, 1, 'Laptop', 'UNI#1', '2', '42100000', '2023-09-14', 'Đang vận chuyển'),
(2, 2, 'Điện thoại', 'UNI#2', '1', '25900000', '2023-09-12', 'Giao hàng thành công');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity_order` varchar(250) NOT NULL,
  `unit_prices` varchar(250) NOT NULL,
  `order_detail_status` varchar(250) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `page_name` varchar(250) NOT NULL,
  `friendly_url` varchar(250) NOT NULL,
  `creator` varchar(100) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `page_name`, `friendly_url`, `creator`, `date_created`) VALUES
(1, 'Thế giới di đông', 'https://www.thegioididong.com/dtdd-apple-iphone', 'Admin', '2023-09-05'),
(2, 'Unitop', 'https://unitop.vn/', 'Amdin', '2023-09-14'),
(3, 'fpt', 'https://fptshop.com.vn/', 'Admin', '2023-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `post_id` int(11) NOT NULL,
  `post_cat_id` int(11) NOT NULL,
  `post_name` varchar(100) NOT NULL,
  `post_title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`post_id`, `post_cat_id`, `post_name`, `post_title`) VALUES
(1, 1, 'Laptop Apple MacBook Pro 16 inch M2 Pro', 'Apple vừa giới thiệu đến người dùng chiếc MacBook Pro 16 inch M2 Pro 2023 có kiểu dáng mỏng nhẹ nhưng bên trong là một hiệu năng vô cùng mạnh mẽ đáp ứng được mọi tác vụ, hứa hẹn sẽ trở thành một người bạn đồng hành tuyệt vời trong công việc, học tập '),
(2, 2, 'Điện thoại iPhone 14 Plus ', 'Giống như những thế hệ “Plus” trước đây, iPhone 14 Plus vẫn sẽ là phiên bản phóng to từ iPhone 14 với ngôn ngữ thiết kế không đổi, vẫn sẽ là cạnh viền vuông vức đi kèm với mặt lưng phẳng để tạo nên cái nhìn bắt trend và đặc trưng.'),
(3, 3, 'Đồng hồ CITIZEN 42 mm Nam', 'Đơn giản và thanh lịch \r\nXu hướng thiết kế chính của đồng hồ Citizen là đơn giản và thanh lịch. Citizen luôn chú trọng đến việc đổi mới và tạo sự phong phú cho các mẫu thiết kế. Các chi tiết cũng được Citizen đầu tư kỹ lưỡng trong khâu chế tác.'),
(4, 4, 'Tai nghe Bluetooth True Wireless AVA+ FreeGo A20', 'Tai nghe Bluetooth True Wireless AVA+ FreeGo A20 với gam màu thanh lịch, kiểu dáng đẹp mắt, âm thanh sống động và rõ ràng, kết nối không dây nhanh chóng, mang đến cho người dùng những trải nghiệm tuyệt vời.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post_cat`
--

CREATE TABLE `tbl_post_cat` (
  `post_cat_id` int(11) NOT NULL,
  `post_cat_name` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `images` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_post_cat`
--

INSERT INTO `tbl_post_cat` (`post_cat_id`, `post_cat_name`, `date_created`, `images`) VALUES
(1, 'Lap top', '2023-09-13', 'https://cdn.tgdd.vn/Products/Images/44/305010/asus-vivobook-x515ea-i3-ej3948w-1.jpg'),
(2, 'Điện thoại', '2023-09-13', 'https://cdn.tgdd.vn/Products/Images/42/247508/iphone14-pro-1.jpg'),
(3, 'Đồng hồ', '2023-09-05', '	https://cdn.tgdd.vn/Products/Images/7264/237989/citizen-eq0601-54f-nu-1-1.jpg'),
(4, 'Tai nghe', '2023-09-11', 'https://cdn.tgdd.vn/Products/Images/54/310762/tai-nghe-bluetooth-true-wireless-havit-tw945-cam-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id_product` int(11) NOT NULL,
  `id_product_cat` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `prices` varchar(100) NOT NULL,
  `prices_new` varchar(100) NOT NULL,
  `prices_old` varchar(100) NOT NULL,
  `product_desc` varchar(250) NOT NULL,
  `images` varchar(500) NOT NULL,
  `product_content` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id_product`, `id_product_cat`, `product_name`, `product_title`, `prices`, `prices_new`, `prices_old`, `product_desc`, `images`, `product_content`) VALUES
(3, 2, 'Điện thoại iPhone 14 Plus 128GB', 'Giống như những thế hệ “Plus” trước đây, iPhone 14 Plus vẫn sẽ là phiên bản phóng to từ iPhone 14 vớ', '22100000', '21690000', '21500000', 'nổi trội với ngoại hình bắt trend cùng màn hình kích thước lớn để đem đến không gian hiển thị tốt hơn cùng ', '	https://cdn.tgdd.vn/Products/Images/42/153856/iphone-11-trang-1-2-org.jpg', 'Sau nhiều thế hệ điện thoại của Apple thì cái tên “Plus” cũng đã chính thức trở lại vào năm 2022 và xuất hiện trên chiếc iPhone 14 Plus 128GB, nổi trội với ngoại hình bắt trend cùng màn hình kích thước lớn để đem đến không gian hiển thị tốt hơn cùng '),
(4, 2, 'Điện thoại iPhone 11 64GB', 'Nói về nâng cấp thì camera chính là điểm có nhiều cải tiến nhất trên thế hệ iPhone mới.', '8700000', '9200000', '11210000', 'Apple đã chính thức trình làng bộ 3 siêu phẩm iPhone 11, trong đó phiên bản iPhone 11 64GB có mức giá rẻ nhất nhưng vẫn được nâng cấp mạnh mẽ như iPhone Xr ra mắt trước đó.', '	https://cdn.tgdd.vn/Products/Images/42/245545/iphone-14-plus-gold-1.jpeg', 'Còn ở mặt lưng thì hãng đã sử dụng hoàn toàn từ kính cường lực, bộ phận này được làm theo kiểu nhẵn bóng nên máy sẽ trở nên rất bắt mắt và mới mẻ, tạo cho mình cảm giác sang trọng hơn khi sử dụng.'),
(7, 2, 'Điện thoại iPhone 14 Pro Max 128GB', 'iPhone 14 Pro Max một siêu phẩm trong giới smartphone được nhà Táo tung ra thị trường vào tháng 09/2', '23500000', '25780000', '26420000', 'iPhone năm nay sẽ được thừa hưởng nét đặc trưng từ người anh iPhone 13 Pro Max, vẫn sẽ là khung thép không gỉ và mặt lưng kính cường lực kết hợp với tạo hình vuông vức hiện đại thông qua cách tạo hình phẳng ở các cạnh và phần mặt lưng.', 'https://cdn.tgdd.vn/Products/Images/42/251192/iphone-14-pro-max-purple-1.jpg', 'iPhone 14 Pro Max một siêu phẩm trong giới smartphone được nhà Táo tung ra thị trường vào tháng 09/2022. Máy trang bị con chip Apple A16 Bionic vô cùng mạnh mẽ, đi kèm theo đó là thiết kế hình màn hình mới, hứa hẹn mang lại những trải nghiệm đầy mới '),
(8, 2, 'Điện thoại iPhone 13 128GB ', 'Hiệu năng vượt trội nhờ chip Apple A15 Bionic', '13500000', '15410000', '16300000', 'Con chip Apple A15 Bionic siêu mạnh được sản xuất trên quy trình 5 nm giúp iPhone 13 đạt hiệu năng ấn tượng, với CPU nhanh hơn 50%, GPU nhanh hơn 30% so với các đối thủ trong cùng phân khúc.', 'https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-xanh-glr-1.jpg', 'Trong khi sức hút đến từ bộ 4 phiên bản iPhone 12 vẫn chưa nguội đi, thì hãng điện thoại Apple đã mang đến cho người dùng một siêu phẩm mới iPhone 13 với nhiều cải tiến thú vị sẽ mang lại những trải nghiệm hấp dẫn nhất cho người dùng.'),
(9, 2, 'Điện thoại iPhone 13 256GB', 'Hiệu năng đột phá cùng bộ xử lý Apple A15 Bionic', '16800000', '17100000', '19210000', 'Bộ vi xử lý Apple A15 mới gia tăng tốc độ CPU tới 50% và GPU đồ họa nhanh hơn 30% so với các đối thủ cạnh tranh trong cùng phân khúc, giúp iPhone 13 thể hiện sức mạnh khả năng xử lý ấn tượng hơn, mượt mà trên mọi tác vụ.', '	https://cdn.tgdd.vn/Products/Images/42/250258/iphone-13-xanh-1.jpg', 'Apple thỏa mãn sự chờ đón của iFan và người dùng với sự ra mắt của iPhone 13. Dù ngoại hình không có nhiều thay đổi so với iPhone 12 nhưng với cấu hình mạnh mẽ hơn, đặc biệt pin “trâu” hơn và khả năng quay phim chụp ảnh cũng ấn tượng hơn, hứa hẹn man'),
(10, 2, 'Điện thoại iPhone 12 64GB ', 'Hiệu năng vượt xa mọi giới hạn', '9210000', '10200000', '8300000', 'Apple đã trang bị con chip mới nhất của hãng (tính đến 11/2020) cho iPhone 12 đó là A14 Bionic, được sản xuất trên tiến trình 5 nm với hiệu suất ổn định hơn so với chip A13 được trang bị trên phiên bản tiền nhiệm iPhone 11.', 'https://cdn.tgdd.vn/Products/Images/42/213031/iphone-12-1-2.jpg', 'Trong những tháng cuối năm 2020, Apple đã chính thức giới thiệu đến người dùng cũng như iFan thế hệ iPhone 12 series mới với hàng loạt tính năng bứt phá, thiết kế được lột xác hoàn toàn, hiệu năng đầy mạnh mẽ và một trong số đó chính là iPhone 12 64G'),
(11, 2, 'Điện thoại iPhone 12 128GB ', 'Hiệu năng vượt trội, thách thức mọi giới hạn', '13900000', '12870000', '14820000', 'Apple đã trình diện đến người dùng mẫu điện thoại iPhone 12 128GB với sự tuyên bố về một kỷ nguyên mới của iPhone 5G, nâng cấp về màn hình và hiệu năng hứa hẹn đây sẽ là smartphone cao cấp đáng để mọi người đầu tư sở hữu. ', '	https://cdn.tgdd.vn/Products/Images/42/228736/iphone-12-xanh-la-1-org.jpg', 'iPhone 12 được trang bị chipset A14 Bionic - bộ xử lý được trang bị lần đầu trên iPad Air 4 vừa cho ra mắt cách đây không lâu, mở đầu xu thế chip 5 nm thương mại trên toàn thế giới.'),
(12, 2, 'Điện thoại iPhone 14 Pro 512GB', 'Phong cách thiết kế dẫn đầu xu thế thường thấy trên các phiên bản như iPhone 13 series vẫn được Appl', '32000000', '33100000', '30190000', 'Apple luôn mang đến những cải tiến trên các mẫu iPhone qua từng năm, iPhone 14 Pro 512GB năm nay được nâng cấp mạnh về hiệu năng cũng như thiết kế, một sản phẩm hứa hẹn sẽ cho người dùng những trải nghiệm trọn vẹn nhất đối với thế hệ iPhone 14 năm na', 'https://cdn.tgdd.vn/Products/Images/42/289694/iphone-14-pro-tim-1-1.jpg', 'Những cải tiến tinh tế về mặt thiết kế cùng hiệu năng siêu mạnh mẽ đến từ bộ vi xử lý A16 Bionic làm cho iPhone 14 Pro 512GB trở thành mẫu điện thoại hoàn hảo hơn bao giờ hết, sẵn sàng phục vụ mọi nhu cầu của bạn.'),
(13, 1, 'Laptop Acer Aspire 3 A314 36M 391A i3 N305', 'Laptop Acer sử dụng chip Intel Core i3 N305 kết hợp cùng card Intel UHD Graphics cho phép người dùng', '8900000', '7990000', '87000000', 'Dung lượng RAM 8 GB cho phép người dùng mở cùng lúc được nhiều cửa sổ trình duyệt, thao tác trơn tru với bảng tính phức tạp hoặc các văn bản dài, tối ưu và không lo gặp các tình trạng đơ máy trong quá trình sử dụng.\r\n\r\n• Thêm vào đó, ổ cứng SSD 512 G', 'https://cdn.tgdd.vn/Products/Images/44/310768/acer-aspire-3-a314-36m-391a-i3-nxkdmsv002-glr-2-1.jpg', 'Thiết bị có nhiều cổng kết nối thông dụng như: HDMI, Jack tai nghe 3.5 mm, USB 3.2 và USB Type-C hỗ trợ truyền xuất dữ liệu thuận lợi và thêm hiệu quả.'),
(14, 1, 'Laptop Asus TUF Gaming F15 FX506HF i5', 'Asus TUF Gaming F15 được trang bị card đồ họa NVIDIA GeForce RTX 2050 với bộ nhớ đồ họa 4 GB, giúp đ', '16200000', '15990000', '16300000', 'Với bộ vi xử lý Intel Core i5 11400H có tốc độ lên đến 4.5 GHz, chiếc laptop Asus TUF Gaming này đảm bảo hoạt động mượt mà và có thể đáp ứng tốt các tác vụ đa nhiệm, mang lại trải nghiệm sử dụng tuyệt vời trong cả công việc lẫn giải trí, chiến game ở', '	https://cdn.tgdd.vn/Products/Images/44/304867/asus-tuf-gaming-f15-fx506hf-i5-hn014w-2.jpg', 'Asus TUF Gaming F15 được trang bị card đồ họa NVIDIA GeForce RTX 2050 với bộ nhớ đồ họa 4 GB, giúp đáp ứng tốt nhu cầu chơi game cấu hình cao và xử lý các file thiết kế nặng. Từ đó mang lại cho người dùng trải nghiệm chơi game đỉnh cao và hiệu suất l'),
(15, 1, 'Laptop Asus Vivobook 15 OLED A1505VA i5 ', 'Cấu hình vượt trội, đáp ứng đa dạng nhu cầu', '18200000', '17990000', '17450000', 'Mặc dù là chiếc laptop văn phòng nhưng lại sở hữu con chip dòng H siêu mạnh mẽ, vượt trội hơn những sản phẩm cùng giá, với bộ vi xử lý Intel Core i5 13500H cùng card đồ họa Intel Iris Xe Graphics tạo thành “tổ hợp” giúp bạn vận hành trơn tru từ các t', 'https://cdn.tgdd.vn/Products/Images/44/310839/asus-vivobook-15-oled-a1505va-i5-l1341w-2.jpg', 'Mặc dù là chiếc laptop văn phòng nhưng lại sở hữu con chip dòng H siêu mạnh mẽ, vượt trội hơn những sản phẩm cùng giá, với bộ vi xử lý Intel Core i5 13500H cùng card đồ họa Intel Iris Xe Graphics tạo thành “tổ hợp” giúp bạn vận hành trơn tru từ các t'),
(16, 1, 'Laptop Acer Nitro 5 Tiger AN515 58 52SP i5 ', 'Bùng nổ sức mạnh với con chip Intel Gen 12 mạnh mẽ', '23100000', '22050000', '22900000', 'Một bước tiến cấu hình vượt bật được Acer ưu ái trên chiếc laptop Acer Nitro 5 Tiger AN515 58 52SP i5 (NH.QFHSV.001) khi trang bị bộ vi xử lý Intel Gen 12 đầy mạnh mẽ cùng phong cách thiết kế đậm chất “mãnh hổ”, khơi nguồn sức mạnh tiềm ẩn bên trong ', '		https://cdn.tgdd.vn/Products/Images/44/292389/lenovo-legion-5-15iah7-i5-82rc003wvn-2-1.jpg', 'Mình đã rất kinh ngạc khi Nitro 5 Tiger không chỉ đặc biệt với cái tên trùng với con giáp Mãnh Hổ của năm 2022 mà còn là một trong những nhân vật đại diện đầu tiên của nhà Acer tân trang con chip Intel thế hệ 12 đầy mạnh mẽ. Để giải đáp sự tò mò về s'),
(17, 1, 'Laptop MacBook Air 15 inch M2 2023 8CPU', 'rải nghiệm không gian sống trọn vẹn với khung hình lớn', '36700000', '35890000', '36100000', 'MacBook Air 15 inch M2 2023 sở hữu màn hình có kích thước 15.3 inch được nâng cấp đáng kể so với phiên bản cũ, bên cạnh đó với tấm nền IPS có độ phân giải Liquid Retina (2880 x 1864) cho phép người dùng có thể thoải mái tận hưởng những giờ phút giải ', 'https://cdn.tgdd.vn/Products/Images/44/309018/apple-macbook-air-m2-2023-starlight-1.jpg', 'Sự kiện 2023 của nhà Apple với sự ra mắt cùng diện mạo mới của chiếc MacBook Air 15 inch M2 2023 10-core GPU, có không gian trải nghiệm nội dung rộng lớn với màn hình 15 inch. Với những người dùng yêu thích tính gọn nhẹ cũng như sở hữu hiệu năng mạnh'),
(18, 1, 'Laptop MSI Gaming GF63 Thin 11SC i5', 'Bộ vi xử lý Intel Core i5 11400H kết hợp cùng card đồ họa NVIDIA GeForce GTX 1650 Max-Q Design, 4 GB', '1520000', '14870000', '15200000', 'Mang trong mình sức mạnh hiệu năng của bộ vi xử lý Intel Core i5 dòng H mạnh mẽ và card đồ họa rời NVIDIA GeForce GTX, laptop MSI Gaming GF63 Thin 11SC i5 (664VN) có khả năng chiến game nặng và thiết kế đồ họa một cách mượt mà.', 'https://cdn.tgdd.vn/Products/Images/44/303500/msi-gaming-gf63-thin-11sc-i5-664vn-123-glr-2.jpg', 'RAM 8 GB với khả năng nâng cấp lên đến tối đa 64 GB cho khả năng xử lý đa nhiệm tốt, chạy nhiều ứng dụng cùng một lúc mà không gặp phải giật lag gây khó chịu. Ổ SSD 512 GB NVMe PCIe có thể lưu trữ nhiều tệp tin lớn, cải thiện hiệu suất khi chơi game '),
(19, 1, 'Laptop Lenovo V14 G3 IAP i5 ', ' Bộ vi xử lý Intel Core i5 1235U cùng card tích hợp Intel UHD Graphics hỗ trợ người dùng vận hành mư', '9760000', '11090000', '10890000', 'Đa nhiệm mượt mà hơn với bộ nhớ RAM 8 GB cùng khả năng nâng cấp lên tối đa 16 GB. Máy sẽ kích hoạt cơ chế RAM kênh đôi và card Iris Xe Graphics với khả năng xử lý công việc nặng hơn khi bạn lắp thêm một thanh RAM. ', '	https://cdn.tgdd.vn/Products/Images/44/299801/lenovo-v14-g3-iap-i5-82ts005rvn-4.jpg', 'Bộ vi xử lý Intel Core i5 1235U cùng card tích hợp Intel UHD Graphics hỗ trợ người dùng vận hành mượt mà mọi tác vụ văn phòng trên Word, Excel, PowerPoint,... cũng như chỉnh sửa hình ảnh 2D trên các ứng dụng Adobe.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_cat`
--

CREATE TABLE `tbl_product_cat` (
  `id_product_cat` int(11) NOT NULL,
  `name_product_cat` varchar(100) NOT NULL,
  `product_cat_creator` varchar(100) NOT NULL,
  `images` varchar(500) NOT NULL,
  `product_cat_content` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_product_cat`
--

INSERT INTO `tbl_product_cat` (`id_product_cat`, `name_product_cat`, `product_cat_creator`, `images`, `product_cat_content`) VALUES
(1, 'Laptop', 'Admin', 'https://cdn.tgdd.vn/Products/Images/44/301634/hp-15s-fq2716tu-i3-7c0x3pa-glr-1.jpg', 'iPhone 14 Pro Max một siêu phẩm trong giới smartphone được nhà Táo tung ra thị trường vào tháng 09/2022. Máy trang bị con chip Apple A16 Bionic vô cùng mạnh mẽ, đi kèm theo đó là thiết kế hình màn hình mới, hứa hẹn mang lại những trải nghiệm đầy mới '),
(2, 'Điện Thoại', 'Admin', '	https://cdn.tgdd.vn/Products/Images/42/247508/iphone-14-pro-trang-1.jpg', 'iPhone 14 Pro 128GB - Mẫu smartphone đến từ nhà Apple được mong đợi nhất năm 2022, lần này nhà Táo mang đến cho chúng ta một phiên bản với kiểu thiết kế hình notch mới, cấu hình mạnh mẽ nhờ con chip Apple A16 Bionic và cụm camera có độ phân giải được');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sliders`
--

CREATE TABLE `tbl_sliders` (
  `id_slider` int(11) NOT NULL,
  `slider_img` varchar(255) NOT NULL,
  `link` varchar(250) NOT NULL,
  `number_order` int(11) NOT NULL,
  `creator` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_sliders`
--

INSERT INTO `tbl_sliders` (`id_slider`, `slider_img`, `link`, `number_order`, `creator`, `date_created`, `status`) VALUES
(1, 'slider1.jpg', '	https://cdn.tgdd.vn/Products/Images/42/251192/iphone-14-pro-max-vang-1.jpg', 1, 'myduyen123', '2023-09-06', 'Chờ duyệt'),
(2, 'slider2.jpg', 'https://cdn.tgdd.vn/Products/Images/44/309721/lenovo-ideapad-3-15itl6-i3-82h803sgvn-2.jpg', 2, 'myduyen123', '2023-09-06', 'Chờ duyệt'),
(3, 'slider3.jpg', 'https://cdn.tgdd.vn/Products/Images/44/309113/gigabyte-gaming-g5-i5-ge-51vn263sh-glr-2-2.jpg', 2, 'myduyen123', '2023-09-21', 'Chờ xét duyệt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_date` date NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `fullname`, `username`, `password`, `created_date`, `phone_number`, `address`) VALUES
(1, 'Nguyen My Duyen', 'myduyen123', 'c047870920d819c9906e6c7d85901d55', '2023-08-08', '0123456789', 'Cần Thơ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_introduce`
--
ALTER TABLE `tbl_introduce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_list_customer`
--
ALTER TABLE `tbl_list_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tbl_list_order`
--
ALTER TABLE `tbl_list_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_cat_id` (`post_cat_id`);

--
-- Indexes for table `tbl_post_cat`
--
ALTER TABLE `tbl_post_cat`
  ADD PRIMARY KEY (`post_cat_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_product_cat` (`id_product_cat`);

--
-- Indexes for table `tbl_product_cat`
--
ALTER TABLE `tbl_product_cat`
  ADD PRIMARY KEY (`id_product_cat`);

--
-- Indexes for table `tbl_sliders`
--
ALTER TABLE `tbl_sliders`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_introduce`
--
ALTER TABLE `tbl_introduce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_list_customer`
--
ALTER TABLE `tbl_list_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_list_order`
--
ALTER TABLE `tbl_list_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_post_cat`
--
ALTER TABLE `tbl_post_cat`
  MODIFY `post_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_product_cat`
--
ALTER TABLE `tbl_product_cat`
  MODIFY `id_product_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sliders`
--
ALTER TABLE `tbl_sliders`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `tbl_product` (`id_product`);

--
-- Constraints for table `tbl_list_order`
--
ALTER TABLE `tbl_list_order`
  ADD CONSTRAINT `tbl_list_order_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `tbl_list_customer` (`id_customer`);

--
-- Constraints for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD CONSTRAINT `tbl_order_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `tbl_list_order` (`id_order`),
  ADD CONSTRAINT `tbl_order_detail_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `tbl_product` (`id_product`);

--
-- Constraints for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `tbl_post_ibfk_1` FOREIGN KEY (`post_cat_id`) REFERENCES `tbl_post_cat` (`post_cat_id`);

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`id_product_cat`) REFERENCES `tbl_product_cat` (`id_product_cat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
