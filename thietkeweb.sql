-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 18, 2018 lúc 01:31 PM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thietkeweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblbaiviet`
--

CREATE TABLE `tblbaiviet` (
  `id` int(10) NOT NULL,
  `danhmucbaiviet` int(10) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tomtat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `anh` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anh_thumb` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `view` int(10) NOT NULL,
  `ngaydang` date NOT NULL,
  `giodang` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ordernum` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblbaiviet`
--

INSERT INTO `tblbaiviet` (`id`, `danhmucbaiviet`, `title`, `tomtat`, `noidung`, `anh`, `anh_thumb`, `view`, `ngaydang`, `giodang`, `ordernum`, `status`) VALUES
(1, 6, 'Messi Ghi Bàn', 'Messi ghi bàn ', 'Messi ghi bàn vào lưới chelsea', 'upload/messi.jpg', 'upload/resized/messi_thumb.jpg', 5, '0000-00-00', '8:56 PM', 1, 1),
(2, 13, 'Tâng bóng nghệ thuật - Đặng Việt Dũng', 'Tâng bóng nghệ thuật - Đặng Việt Dũng', 'Tâng bóng nghệ thuật - Đặng Việt Dũng', '', '', 2, '0000-00-00', '2:32 PM', 10, 1),
(3, 6, 'Dembele ghi bàn', 'Dembele đã ghi bàn.', 'Dembele đã ghi bàn.', 'upload/dembele-1.jpg', 'upload/resized/dembele-1_thumb.jpg', 1, '0000-00-00', '1:08 PM', 0, 1),
(4, 6, 'Coutinho', 'Coutinho ghi bàn ', 'Coutinho ghi bàn ', 'upload/960.jpg', 'upload/resized/960_thumb.jpg', 1, '0000-00-00', '1:09 PM', 0, 1),
(5, 6, 'iniesta', 'iniesta ra đi', 'iniesta ra đi', '', '', 3, '0000-00-00', '1:09 PM', 0, 1),
(6, 6, 'Roberto', 'Roberto ghi bàn', 'Roberto ghi bàn', 'upload/gettyimages-649683196.jpg', 'upload/resized/gettyimages-649683196_thumb.jpg', 0, '0000-00-00', '1:10 PM', 0, 1),
(7, 6, 'Umtiti đẹp trai', 'Umtiti đẹp trai', 'Umtiti đẹp trai', 'upload/maxresdefault.jpg', 'upload/resized/maxresdefault_thumb.jpg', 4, '0000-00-00', '1:11 PM', 0, 1),
(8, 0, 'Messi', 'Messi ghi bàn', 'Messi ghi 2 bàn', 'upload/messi.jpg', 'upload/resized/messi_thumb.jpg', 0, '0000-00-00', '4:24 PM', 0, 1),
(9, 6, 'Messi', 'Messi ghi bàn', 'Messi ghi 2 bàn vào lưới Chelsea', '', '', 6, '0000-00-00', '4:25 PM', 0, 1),
(10, 6, 'Messi lập cú đúp: Thiên tài \"xỏ háng\", nhấn chìm Chelsea', 'Barca đánh bại Chelsea 3-0, Messi đóng góp 2 bàn và cả hai đều là những pha dứt điểm qua hai chân thủ môn Courtois.\r\n', 'Ở lượt đi, Messi là người gỡ hòa cho Barca dù hôm ấy, anh bị Kante theo kèm như hình với bóng, hạn chế khá nhiều tầm hoạt động. Tuy nhiên trở về \"đất Mẹ\" Nou Camp, siêu sao người Argentina được tăng thêm sức mạnh và \"cày nát\" hàng thủ Chelsea.\r\n\r\nNgay phút thứ 3, Messi phối hợp với đồng đội, xâm nhập vòng cấm trước khi dứt điểm bằng chân phải không thuận ở góc hẹp qua hai chân thủ môn Courtois. Đó là giải pháp khó. M10 đã quyết đoán lựa chọn và thành công.\r\n\r\nPhút 20, Messi lại làm các hậu vệ Chelsea hoa mắt chóng mặt. Messi cướp được bóng từ sự lóng ngóng của Fabregas. Messi bứt tốc, xử lý kỹ thuật loại bỏ 2 cầu thủ \"The Blues\" rồi \"dọn cỗ\" cho Dembele sút vào góc cao nhân đôi cách biệt cho Barca.\r\n\r\nSang hiệp 2, Messi khiến hàng thủ Chelsea sụp đổ hoàn toàn còn thủ môn Courtois bẽ mặt khi lại bị xỏ háng. Siêu sao 31 tuổi đi bóng lắt léo vào vòng cấm, sút tinh khôn bằng chân trái qua hai chân Courtois, ấn định chiến thắng 3-0 cho Barca.\r\n\r\nNói về cú đúp ghi bàn xỏ háng trước Chelsea, Messi xưa nay quá quen thuộc làm điều này. Từ những thủ môn hàng đầu, danh sách nạn nhân của anh dài dằng dặc.\r\n\r\n', 'upload/Messi-lap-cu-dup-Thien-tai-messi1-1521064411-709-width660height383.jpg', 'upload/resized/Messi-lap-cu-dup-Thien-tai-messi1-1521064411-709-width660height383_thumb.jpg', 8, '0000-00-00', '12:28 AM', 0, 1),
(11, 6, 'Barcelona 2-0: Bilbao: Messi ghi bàn đẳng cấp', 'Pha lập công từ cú sút ngoài vùng cấm đẳng cấp của Lionel Messi góp phần giúp Barcelona đánh bại Athletic Bilbao 2-0, qua đó tạm nới rộng cách biệt với Atletico lên thành 11 điểm.', '<p>Thiếu vắng Luis Suarez vì án treo giò, <a class=\"topic person autolink\" href=\"https://news.zing.vn/lionel-messi-nhan-vat-tieu-diem.html\" title=\"Tin tức Lionel Messi\">Lionel Messi</a> tiếp tục trở thành nguồn cảm hứng giúp Barcelona lần đầu tiên trong lịch sử thắng Athletic Bilbao 9 trận liên tiếp tại La Liga. Đội chủ sân Camp Nou đã có thể rời sân với cách biệt lớn hơn tỷ số 2-0 nếu Leo và các đồng đội tận dụng tốt hơn những cơ hội tạo ra.</p>\r\n\r\n<p>Hiệp 1 chứng kiến thế trận tấn công áp đảo của đội chủ nhà. Hai bàn thắng của Paco Alcacer và Messi như hệ quả tất yếu sau cả tá pha bắn phá nguy hiểm mà các chân sút Barca tạo ra.</p>\r\n\r\n<p>Bóng thậm chí đã 3 lần tìm tới xà ngang và cột dọc khung thành đội khách sau 2 pha dứt điểm đẳng cấp của Coutinho và Paulinho.</p>\r\n\r\n<p>Trở lại sân với cách biệt 2 bàn dường như đủ khiến các ngôi sao chủ nhà thỏa mãn. Sự chùng xuống của Barca tạo điều kiện để đội bóng đến từ xứ Basque nỗ lực cầm bóng tấn công.</p>\r\n\r\n<p>Dẫu vậy, những pha phối hợp chậm rãi, thiếu đột biến và tốc độ của Bilbao khiến họ không thể một lần xuyên thủng mành lưới của thủ thành Ter Stegen.</p>\r\n\r\n<p>Thắng nhẹ nhàng 2-0, Barca tạm nới rộng cách biệt trên bảng xếp hạng với đội bóng xếp thứ hai Atletico Madrid lên thành 11 điểm.</p>\r\n', 'upload/Messi-lap-cu-dup-Thien-tai-messi1-1521064411-709-width660height383.jpg', 'upload/resized/Messi-lap-cu-dup-Thien-tai-messi1-1521064411-709-width660height383_thumb.jpg', 16, '0000-00-00', '7:52 PM', 0, 1),
(12, 6, 'Coutinho ghi bàn đưa Barcelona vào chung kết cúp Nhà Vua', ' Pha lập công đầu tiên của Coutinho giúp Barcelona khai thông thế bế tắc và có được chiến thắng 2-0 trước Valencia để giành quyền tiến vào chung kết cúp Nhà Vua Tây Ban Nha. ', '<p>Chiến thắng 1-0 trên sân nhà giúp <a class=\"topic company autolink\" href=\"https://news.zing.vn/barcelona-fc-tieu-diem.html\" title=\"Tin tức Barcelona\">Barcelona</a> có lợi thế khá lớn trong chuyến làm khách tới sân của Valencia ở trận Bán kết lượt về cúp Nhà Vua Tây Ban Nha diễn ra rạng sáng nay (9/2). Tuy nhiên, HLV&nbsp;Valverde vẫn tỏ rõ sự thận trọng khi tung ra sân đội hình rất mạnh và không vội sử dụng các tân binh như Coutinho, Yerry Mina, hay Paulinho.&nbsp;Gerard Pique vẫn xuất hiện trong đội hình chính cho dù trung vệ người Tây Ban Nha đã dính chấn thương ở trận đấu với&nbsp;Espanyol hôm 4/2.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/xaydungweb/upload/images/Messi-lap-cu-dup-Thien-tai-messi1-1521064411-709-width660height383.jpg\" style=\"height:383px; width:660px\" /></p>\r\n\r\n<p>Cũng giống như trận lượt đi trên sân Nou Camp, Valencia lựa chọn lối chơi phòng ngự phản công để đối đầu với Barcelona. Hàng thủ chơi kỷ luật và chắc chắn của đội chủ nhà tiếp tục khiến những chân sút hàng đầu thế giới như Messi và Suarez phải nản lòng.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/xaydungweb/upload/images/960.jpg\" style=\"height:452px; width:700px\" /></p>\r\n', 'upload/andres-iniesta.jpg', 'upload/resized/andres-iniesta_thumb.jpg', 23, '0000-00-00', '8:54 PM', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblbinhluansp`
--

CREATE TABLE `tblbinhluansp` (
  `id` int(10) NOT NULL,
  `idbaiviet` int(10) NOT NULL,
  `iduser` int(10) NOT NULL,
  `binhluan` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ngaydang` date NOT NULL,
  `giodang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblbinhluansp`
--

INSERT INTO `tblbinhluansp` (`id`, `idbaiviet`, `iduser`, `binhluan`, `ngaydang`, `giodang`) VALUES
(3, 26, 6, 'điện thoại đẹp đó', '0000-00-00', '00:00:00'),
(7, 26, 6, 'điện thoại ok', '0000-00-00', '00:00:00'),
(8, 26, 6, 'điện thoại đen trắng', '0000-00-00', '00:00:00'),
(9, 21, 6, 'ghe dep', '0000-00-00', '00:00:00'),
(10, 26, 6, 'dep', '2018-05-14', '08:40:15'),
(11, 22, 6, 'hay qua', '2018-05-15', '08:00:52'),
(12, 22, 6, 'that la hanh phuc', '2018-05-15', '08:01:29'),
(13, 22, 6, 'that la hanh phuc', '2018-05-15', '08:01:34'),
(14, 26, 6, 'hieu bd', '2018-05-15', '09:55:28'),
(15, 26, 6, 'asdfghj\r\n', '2018-05-15', '09:57:18'),
(16, 26, 6, 'dfghjkxcnm', '2018-05-15', '10:03:21'),
(17, 15, 6, 'dien thoai dep', '2018-05-18', '14:14:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbldanhmucbaiviet`
--

CREATE TABLE `tbldanhmucbaiviet` (
  `id` int(10) NOT NULL,
  `danhmucbaiviet` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) NOT NULL,
  `menu` int(1) NOT NULL,
  `home` int(1) NOT NULL,
  `ordernum` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbldanhmucbaiviet`
--

INSERT INTO `tbldanhmucbaiviet` (`id`, `danhmucbaiviet`, `parent_id`, `menu`, `home`, `ordernum`, `status`) VALUES
(6, 'Thể Thao', 0, 1, 1, 0, 1),
(7, 'Giải trí', 0, 1, 1, 0, 1),
(8, 'Giáo dục', 0, 1, 1, 0, 1),
(9, 'Giáo dục trẻ em', 8, 1, 1, 0, 1),
(10, 'Giáo dục giới tính', 8, 1, 1, 0, 1),
(11, 'Game online', 7, 1, 1, 0, 1),
(12, 'Game offline', 7, 1, 1, 0, 1),
(13, 'Thể Thao trong nước', 6, 1, 1, 0, 1),
(14, 'Thể thao ngoài nước', 6, 1, 1, 0, 1),
(15, 'Chạy bộ', 13, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbldanhmucsanpham`
--

CREATE TABLE `tbldanhmucsanpham` (
  `id` int(10) NOT NULL,
  `danhmucsanpham` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) NOT NULL,
  `menu` int(1) NOT NULL,
  `home` int(1) NOT NULL,
  `ordernum` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbldanhmucsanpham`
--

INSERT INTO `tbldanhmucsanpham` (`id`, `danhmucsanpham`, `parent_id`, `menu`, `home`, `ordernum`, `status`) VALUES
(1, 'Quà tặng', 0, 1, 1, 0, 1),
(2, 'Từng là của chung', 0, 1, 1, 0, 1),
(5, 'Qua tặng 20/10', 1, 0, 1, 1, 1),
(6, 'Quà Tặng Sinh Nhật', 1, 0, 0, 0, 0),
(7, 'Quà Tặng 8/3', 1, 0, 0, 0, 0),
(8, 'Valentine', 1, 0, 0, 0, 0),
(9, 'Khác', 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblgopy`
--

CREATE TABLE `tblgopy` (
  `id` int(10) NOT NULL,
  `idbv` int(10) NOT NULL,
  `hoten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbllienhe`
--

CREATE TABLE `tbllienhe` (
  `id` int(10) NOT NULL,
  `hoten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `ngaydang` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblsanpham`
--

CREATE TABLE `tblsanpham` (
  `id` int(10) NOT NULL,
  `idnguoidang` int(10) NOT NULL,
  `danhmucsanpham` int(5) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ngaydang` date NOT NULL,
  `giodang` time NOT NULL,
  `tomtat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(4000) COLLATE utf8_unicode_ci NOT NULL,
  `anh` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` int(10) NOT NULL,
  `donvitinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `view` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `thoigian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblsanpham`
--

INSERT INTO `tblsanpham` (`id`, `idnguoidang`, `danhmucsanpham`, `ten`, `ngaydang`, `giodang`, `tomtat`, `noidung`, `anh`, `gia`, `donvitinh`, `view`, `status`, `thoigian`) VALUES
(1, 0, 4, 'Điện Thoại SamSung Note8', '0000-00-00', '00:00:00', '', 'Cụ thể, đoạn quảng cáo trên đã ghi lại toàn bộ quá trình thay đổi của một chàng trai vốn là iFan chân chính từ năm 2007, nhưng cuối cùng lại quyết định chuyển sang sử dụng Galaxy Note 8 của Samsung vì những tính năng cao cấp \"không thể cưỡng lại được\". Đã lâu lắm rồi, kể từ thời Galaxy S II và Galaxy S III, người ra mới thấy một quảng cáo táo bạo và hài hước như vậy đến từ Samsung.\r\n\r\nMở đầu bằng bối cảnh năm 2007 - năm ra mắt dòng iPhone đầu tiên của Apple, anh chàng nhân vật chính của chúng ta đã bị cuốn hút bởi hình ảnh một dòng người xếp hàng dài đứng đợi trước Apple Store. Và cuối cùng chính anh cũng đã \"mở hầu bao\" để sở hữu một chiếc iPhone cho riêng mình. Ngay sau khi \"đập hộp\", anh lập tức gọi điện cho một người bạn với giọng điệu vô cùng đắc ý: \"Đoán xem tớ vừa mua được gì này\". Ở thời điểm ấy, có thể nói iPhone là một cái gì đó quá hấp dẫn, quá mới lạ mà bất cứ tín đồ công nghệ nào cũng muốn có được.\r\n\r\n', 'andres-iniesta.jpg', 1000000, 'VND', 2, 1, '0000-00-00 00:00:00'),
(7, 6, 4, 'Note 8', '0000-00-00', '00:00:00', '', 'Diện thoại Note 8', 'upload/636506554439585001_1.jpg', 1000, '$', 9, 0, '0000-00-00 00:00:00'),
(11, 6, 4, 'Iphone 7', '2018-04-02', '14:28:45', '', 'điện thoại cũ xài tốt', 'upload/iphone-7-gold_6e02-ls.jpg', 10000000, 'VNĐ', 6, 1, '0000-00-00 00:00:00'),
(12, 6, 4, 'Macbook', '2018-04-03', '10:17:23', '', '<p style=\"text-align:start\">Tính năng mã hoá&nbsp;<strong>FileVault Disk Encryption</strong>&nbsp;được bật mặt định trên Mac OS từ phiên bản Yosemite trở đi. Điều này giúp bảo vệ file trên MacBook của bạn, ngăn chặn việc truy cập trái phép trong trường hợp máy bị đánh cắp.</p>\r\n\r\n<p style=\"text-align:start\">Trong một số trường hợp, tính năng này có thể làm giảm tốc độ của MacBook. Để cải thiện tốc độ giúp MacBook chạy nhanh hơn, bạn có thể vào&nbsp;<strong>System Preferences</strong>, chọn&nbsp;<strong>Security &amp; Privacy</strong>&nbsp;--&gt;&nbsp;<strong>FileVault</strong>&nbsp;và tắt nó đi.</p>\r\n', 'upload/s-l1000.jpg', 2000, '$', 9, 1, '0000-00-00 00:00:00'),
(13, 0, 4, 'Nokia 1280', '2018-04-06', '15:47:59', 'điện thoại đen trắng', '<p>điện thoại cục gạch cực bền<br />\r\n&nbsp;</p>\r\n', 'upload/nokia-1280.jpg', 199000, 'VNĐ', 29, 0, '0000-00-00 00:00:00'),
(14, 0, 4, 'Note 3', '2018-04-09', '19:46:45', 'Note 3 k xài nữa', '<p>Note 3 k xài nữa bán</p>\r\n', 'upload/note3.jpg', 1500000, 'VNĐ', 2, 1, '0000-00-00 00:00:00'),
(15, 0, 4, 'Note 4', '2018-04-09', '19:50:29', 'Bán note 4', '<p>Note 4 xài ok</p>\r\n', 'upload/note4.png', 2000000, 'VNĐ', 13, 0, '2018-05-06 17:52:13'),
(16, 0, 4, 'Note 5', '2018-04-09', '19:51:00', 'note 5 xài rất ok', '<p>note 5 hàng cũ</p>\r\n', 'upload/note5.jpg', 2500000, 'VNĐ', 25, 0, '0000-00-00 00:00:00'),
(19, 0, 4, 'New macbook 12 MNYF2 Space Gray- Model 2017 (Hàng chính Hãng)', '2018-04-11', '11:16:49', 'Apple cập nhật toàn bộ dòng MacBook của hãng lên hệ phần cứng sử dụng chip Kaby Lake của Intel. MacBook 12 (2017) cũng không là ngoại lệ khi được thiết kế bộ vi xử lý Intel Core m3, i5 và i7 thế hệ th', '<p style=\"text-align:justify\"><strong><span style=\"font-family:open sans,sans-serif !important\">Màn hình Retina&nbsp;</span></strong></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:open sans,sans-serif !important\">Màn hình Retina 12 inch tuyệt đẹp trên MacBook thực sự là điều cần quan tâm.</span>&nbsp;<span style=\"font-family:open sans,sans-serif !important\">Với hơn 3 triệu điểm ảnh và không viền màn hình, mỗi bức ảnh đều nhảy ra khỏi màn hình với chi tiết phong phú, rực rỡ.</span>&nbsp;<span style=\"font-family:open sans,sans-serif !important\">Tất cả trên một màn hình Retina mỏng đáng kinh ngạc.</span></p>\r\n\r\n<p style=\"text-align:start\"><img src=\"https://file.hstatic.net/1000190192/file/macbook-1024x576_grande.jpg\" style=\"border:0px; box-sizing:border-box; display:block; font-family:open sans,sans-serif !important; height:auto; margin-left:auto; margin-right:auto; max-width:100%; vertical-align:middle\" /></p>\r\n\r\n<p style=\"text-align:justify\"><strong><span style=\"font-family:open sans,sans-serif !important\">Kiến trúc không quạt</span></strong></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:open sans,sans-serif !important\">MacBook được xây dựng để các thao tác gần như không gây ra tiếng ồn.</span>&nbsp;<span style=\"font-family:open sans,sans-serif !important\">Bộ xử lý của nó chạy chỉ với 5 watt điện, tạo ra ít nhiệt hơn và loại bỏ sự cần thiết phải có một quạt để làm mát máy tính.</span>&nbsp;<span style=\"font-family:open sans,sans-serif !important\">Thay vào đó, bảng logic nằm trên một tấm graphite dị hướng giúp giải tán bất kỳ nhiệt nào.</span>&nbsp;<span style=\"font-family:open sans,sans-serif !important\">Vì vậy, bạn sẽ không nghe thấy một tiếng ồn nào trong khi MacBook của bạn là khó làm việc.</span></p>\r\n\r\n<p style=\"text-align:start\"><img src=\"https://file.hstatic.net/1000190192/file/2_grande.jpg\" style=\"border:0px; box-sizing:border-box; display:block; font-family:open sans,sans-serif !important; height:auto; margin-left:auto; margin', 'upload/s-l1000.jpg', 27790000, 'VNĐ', 9, 1, '2018-05-15 17:50:49'),
(20, 0, 4, 'New macbook 12 MNYF2 Space Gray- Model 2017', '2018-04-11', '11:58:37', 'Apple cập nhật toàn bộ dòng MacBook của hãng lên hệ phần cứng sử dụng chip Kaby Lake của Intel. MacBook 12 (2017) cũng không là ngoại lệ khi được thiết kế bộ vi xử lý Intel Core m3, i5 và i7 thế hệ th', '<p style=\"text-align:justify\"><strong><span style=\"font-family:open sans,sans-serif !important\">Màn hình Retina&nbsp;</span></strong></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:open sans,sans-serif !important\">Màn hình Retina 12 inch tuyệt đẹp trên MacBook thực sự là điều cần quan tâm.</span>&nbsp;<span style=\"font-family:open sans,sans-serif !important\">Với hơn 3 triệu điểm ảnh và không viền màn hình, mỗi bức ảnh đều nhảy ra khỏi màn hình với chi tiết phong phú, rực rỡ.</span>&nbsp;<span style=\"font-family:open sans,sans-serif !important\">Tất cả trên một màn hình Retina mỏng đáng kinh ngạc.</span></p>\r\n\r\n<p style=\"text-align:start\"><img src=\"https://file.hstatic.net/1000190192/file/macbook-1024x576_grande.jpg\" style=\"border:0px; box-sizing:border-box; display:block; font-family:open sans,sans-serif !important; height:auto; margin-left:auto; margin-right:auto; max-width:100%; vertical-align:middle\" /></p>\r\n\r\n<p style=\"text-align:justify\"><strong><span style=\"font-family:open sans,sans-serif !important\">Kiến trúc không quạt</span></strong></p>\r\n', 'upload/s-l1000.jpg', 27790000, 'VNĐ', 7, 1, '0000-00-00 00:00:00'),
(21, 6, 2, 'Ghê đôi tình nhân', '2018-04-17', '23:32:27', 'Ghê đôi đẹp', '<p>Ghế đôi tình nhân xuất xứ từ nhật bản, êm ái mềm mại</p>\r\n', 'upload/jonah2cho-01_master.jpg', 1000000, 'VNĐ', 73, 0, '0000-00-00 00:00:00'),
(22, 6, 3, 'Đồng hồ người yêu cũ tặng', '2018-04-17', '23:38:23', 'Đồng hồ người yêu cũ tặng', '<p>Đồng hộ chạy tốt, của người yêu cũ tặng, màu đồng rất đẹp.<br />\r\n&nbsp;</p>\r\n', 'upload/big-bang-44-467149f15489.jpg', 1000000, '', 35, 1, '0000-00-00 00:00:00'),
(23, 0, 4, 'Dien Thoai', '2018-04-22', '10:39:57', 'Điện thoại mới ', '<p>điện thoại mới mua, xài rât ok</p>\r\n', 'upload/iphone-7-gold_6e02-ls.jpg', 10000000, '', 4, 1, '0000-00-00 00:00:00'),
(25, 0, 0, 'Lắc tay bạc', '2018-05-05', '16:42:16', 'Lắc tay bạc', '<p>lắc tay bạc người yêu tặng</p>\r\n', 'upload/lactay.bmp', 200000, 'VNĐ', 30, 1, '2018-05-05 16:42:16'),
(26, 6, 2, 'A', '2018-05-12', '15:56:45', 'aaaaaaaaaaaaaaaaaaa', '<p>aaaaaaaaaaaaaaaaaaaaaa<br />\r\n&nbsp;</p>\r\n', 'upload/nokia-1280.jpg', 100000, 'VNĐ', 66, 0, '2018-05-12 15:56:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblslider`
--

CREATE TABLE `tblslider` (
  `id` int(10) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `anh` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anh_thumb` varchar(200) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ordernum` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblslider`
--

INSERT INTO `tblslider` (`id`, `title`, `anh`, `anh_thumb`, `link`, `ordernum`, `status`) VALUES
(1, 'Umtiti', 'upload/maxresdefault.jpg', NULL, '', 0, 1),
(2, 'Messi', 'upload/18034203_10158717486355601_2767969988716011062_n.jpg', NULL, '', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblsupports`
--

CREATE TABLE `tblsupports` (
  `id` int(10) NOT NULL,
  `yahoo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `skyper` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ordernum` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbltaikhoan`
--

CREATE TABLE `tbltaikhoan` (
  `id` int(10) NOT NULL,
  `hoten` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sodienthoai` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `sobaidang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbltaikhoan`
--

INSERT INTO `tbltaikhoan` (`id`, `hoten`, `diachi`, `sodienthoai`, `sobaidang`) VALUES
(1, 'Nguyễn Công Hoan', 'Trường đại học công nghệ thông tin', '0985315125', 1),
(2, 'Tiến Đạt', 'Việt Nam', '0990xxx999', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblthantho`
--

CREATE TABLE `tblthantho` (
  `id` int(10) NOT NULL,
  `idnguoidang` int(10) NOT NULL,
  `ngaydang` date NOT NULL,
  `giodang` time NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tomtat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(4000) COLLATE utf8_unicode_ci NOT NULL,
  `anh` varchar(200) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblthantho`
--

INSERT INTO `tblthantho` (`id`, `idnguoidang`, `ngaydang`, `giodang`, `ten`, `tomtat`, `noidung`, `anh`, `view`) VALUES
(1, 2, '2018-05-07', '19:35:46', 'Hari Won đã bỏ tôi mà đi', 'Hari Won đã bỏ tôi mà đi sau 9 năm yêu nhau', '<p style=\"text-align:start\">Được khán giả yêu mến và ngưỡng mộ bởi chuyện tình 9 năm đẹp như mơ, do đó&nbsp;<a class=\"topic person autolink\" href=\"https://news.zing.vn/hari-won-tieu-diem.html\" style=\"box-sizing: border-box; text-rendering: geometricPrecision; margin: 0px; padding: 0px; font-size: 16px; vertical-align: baseline; background: transparent; text-decoration: none; color: rgb(0, 0, 0); border-bottom: 1px solid rgb(51, 51, 51);\" title=\"Tin tức Hari Won\">Hari Won</a>&nbsp;không khỏi đắn đo khi quyết định công khai chuyện cô và bạn trai Đinh Tiến Đạt chia tay. Cố gắng giữ bình tĩnh khi tâm sự, nhưng cuộc trò chuyện nhiều lần bị gián đoạn do Hari Won không kìm nén được cảm xúc và bật khóc.</p>\r\n\r\n<p style=\"text-align:start\">“9 năm qua với tôi là một ký ức rất đẹp. Nhưng có những thứ không thể thay đổi thì biết phải làm sao?” - cô nghẹn ngào.</p>\r\n\r\n<table align=\"center\" class=\"picture\" style=\"-webkit-font-smoothing:antialiased; -webkit-text-stroke-width:0px; background:rgb(255, 255, 255); border-collapse:collapse; border-spacing:0px; border:0px; box-sizing:border-box; color:rgb(85, 85, 85); font-family:sans-serif; font-size:14px; font-style:normal; font-variant-caps:normal; font-variant-ligatures:normal; font-weight:400; letter-spacing:normal; line-height:20px; margin:14px 0px; orphans:2; outline:0px; padding:0px; text-align:start; text-decoration-color:initial; text-decoration-style:initial; text-indent:0px; text-rendering:geometricPrecision; text-size-adjust:100%; text-transform:none; vertical-align:baseline; white-space:normal; widows:2; width:560px; word-spacing:0px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:baseline\">\r\n			<div class=\"photoset-item\" style=\"box-sizing: border-box; text-rendering: geometricPrecision; margin: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 14px; vertical-align: baseline; background: transparent; text-size-adjust: 100%;\"><img alt=\"Hari Won thua nhan chia tay Tien Dat sau 9 nam gan bo hinh anh 1\" src=\"https://znews-photo-td.zadn.vn/w660/Uploaded/Nphunow/2016_01_18/hariwon_zing_2.jpg\" style=\"background:transparent; border:0px; box-sizing:border-box; display:block; font-size:14px; height:373px; margin:0px; max-width:100%; outline:0px; padding:0px; text-rendering:geometricPrecision; text-size-adjust:100%; vertical-align:baseline; width:559.5px\" /></div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:baseline\">Hari Won xác nhận chấm dứt cuộc tình 9 năm với Đinh Tiến Đạt</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'upload/150950310380250-hari-1.jpg', 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblthongtincongty`
--

CREATE TABLE `tblthongtincongty` (
  `id` int(11) NOT NULL,
  `tencongty` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hotline` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(10) NOT NULL,
  `taikhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbluser`
--

INSERT INTO `tbluser` (`id`, `taikhoan`, `matkhau`, `hoten`, `dienthoai`, `email`, `diachi`, `admin`) VALUES
(2, 'tiendat', 'tiendat', 'Tiến Đạt', '0999xxx999', 'tiendat@gmail.com', 'Việt Nam', 0),
(6, 'nguyenconghoan', 'conghoan', 'Nguyễn Công Hoan', '0985315125', 'hoannc@edu.vn', 'Trường đại học công nghệ thông tin', 0),
(7, '1111', 'matkhau', 'Admin', '0949930259', '', 'Đại học công nghệ thông tin', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblvideo`
--

CREATE TABLE `tblvideo` (
  `id` int(10) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ordernum` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblvideo`
--

INSERT INTO `tblvideo` (`id`, `title`, `link`, `ordernum`, `status`) VALUES
(4, 'Vợ Người Ta - Phan Mạnh Quỳnh', 'https://www.youtube.com/watch?v=eyFP5s403jY', 2, 1),
(5, 'Hương Tràm - Em Gái Mưa', 'https://www.youtube.com/watch?v=Y29OrOVJUKs', 3, 1),
(6, 'Lionel Messi — 2018', 'https://www.youtube.com/watch?v=NymRLQmtURY', 10, 1),
(10, 'Tâng bóng nghệ thuật - Đặng Việt Dũng', 'https://www.youtube.com/watch?v=S7UR6Othw0w', 20, 1),
(11, 'M10', 'https://www.youtube.com/watch?v=9lSOHm5liZo', 10, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tblbaiviet`
--
ALTER TABLE `tblbaiviet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblbinhluansp`
--
ALTER TABLE `tblbinhluansp`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbldanhmucbaiviet`
--
ALTER TABLE `tbldanhmucbaiviet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbldanhmucsanpham`
--
ALTER TABLE `tbldanhmucsanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblgopy`
--
ALTER TABLE `tblgopy`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbllienhe`
--
ALTER TABLE `tbllienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblsanpham`
--
ALTER TABLE `tblsanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblslider`
--
ALTER TABLE `tblslider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblsupports`
--
ALTER TABLE `tblsupports`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbltaikhoan`
--
ALTER TABLE `tbltaikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblthantho`
--
ALTER TABLE `tblthantho`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblthongtincongty`
--
ALTER TABLE `tblthongtincongty`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblvideo`
--
ALTER TABLE `tblvideo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tblbaiviet`
--
ALTER TABLE `tblbaiviet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tblbinhluansp`
--
ALTER TABLE `tblbinhluansp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbldanhmucbaiviet`
--
ALTER TABLE `tbldanhmucbaiviet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbldanhmucsanpham`
--
ALTER TABLE `tbldanhmucsanpham`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tblgopy`
--
ALTER TABLE `tblgopy`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbllienhe`
--
ALTER TABLE `tbllienhe`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tblsanpham`
--
ALTER TABLE `tblsanpham`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tblslider`
--
ALTER TABLE `tblslider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tblsupports`
--
ALTER TABLE `tblsupports`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbltaikhoan`
--
ALTER TABLE `tbltaikhoan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tblthantho`
--
ALTER TABLE `tblthantho`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tblthongtincongty`
--
ALTER TABLE `tblthongtincongty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tblvideo`
--
ALTER TABLE `tblvideo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
