-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 02:51 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oldersmile_260166`
--

-- --------------------------------------------------------

--
-- Table structure for table `advert`
--

CREATE TABLE `advert` (
  `ad_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `ad_body` text NOT NULL,
  `ad_link` text NOT NULL,
  `ad_point` int(11) NOT NULL,
  `ad_image` varchar(60) NOT NULL,
  `ad_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `advert`
--

INSERT INTO `advert` (`ad_id`, `user_id`, `cat_id`, `ad_body`, `ad_link`, `ad_point`, `ad_image`, `ad_status`) VALUES
(7, 2, 2, 'OlderSmile', 'https://shopee.co.th/', 10, 'b7f95001e7ac972761edbc214991d87d.png', 1),
(8, 2, 2, '7 นมทางเลือกเพื่อคนรักสุขภาพ : นมข้าวโอ๊ต นมพิสตาชิโอ นมอัลมอนด์ นมถั่วเหลือง', 'https://shopee.co.th/', 9, '40a3eb55b4b64e6bbf3c6ad3d851e0e5.png', 1),
(9, 2, 5, 'OlderSmile', 'https://shopee.co.th/', 10, '1bd11af5b6022fe2798c3cbac5842529.png', 1),
(10, 2, 5, 'เมนูลดน้ำหนัก 7-11 นม ขนม และน้ำ ไม่เกิน 100 แคล', 'https://shopee.co.th/', 10, '157b1d02fcd9496f8a52d1629170d2f0.jpg', 1),
(11, 2, 6, 'OlderSmile', 'https://shopee.co.th/', 10, '8638fdf469783fe08179d9fd2e849faa.png', 1),
(12, 2, 6, 'นอกจากการลดความเสี่ยงการเกิดโรคแล้ว การออกกำลังกายอย่างเป็นประจำยังช่วยลดภาวะความเครียด ทั้งยังส่งผลให้คุณภาพชีวิตดีขึ้น', 'https://shopee.co.th/', 10, 'ac032227c4835b9cbf3c985512676106.jpg', 1),
(13, 2, 7, 'OlderSmile', 'https://shopee.co.th/', 10, 'da35dc7738be98345ffe4204c4e7c9c0.png', 1),
(14, 2, 7, 'การออกกำลังกายไม่ได้จำกัดแค่ฟิตเนส สวนสาธารณะหรือใช้เครื่องออกกำลังกายราคาแพง เพราะการออกกำลังกายจริงๆ', 'https://shopee.co.th/', 10, 'ad50cf0cb64293c85aa6eb8c34d297f4.jpg', 1),
(15, 2, 8, 'OlderSmile', 'https://shopee.co.th/', 10, '79ddfb247e2a7e13ee3e0902d984b180.png', 1),
(16, 2, 8, 'หากคุณเป็นคนหนึ่ง ที่กำลังรู้สึกเจ็บเข่าเวลางอ รู้สึกปวดตึง ขัดข้อ เดินได้ไม่สะดวก รู้สึกว่าตัวเองมีอาการปวดเข่า เข่าบวมผิดปกติ และ บริเวณลักยิ้มใกล้กับลูกสะบ้าไม่มีรอยบุ๋มด้วย', 'https://shopee.co.th/', 10, '4a520eaf08e0bdbe84cc6f34aafddfec.png', 1),
(17, 2, 9, 'OlderSmile', 'https://shopee.co.th/', 10, 'd7950ea39e0b9417b819937eecdd4c34.png', 1),
(18, 2, 9, '“อาหารเสริม” เป็นอาหารที่เสริมเพิ่มเติมขึ้นมาจากอาหารปกติ ที่เราต้องกินอาหารเสริมก็เพื่อทดแทนสารอาหารบางอย่างที่เราอาจจะขาด หรือได้รับไม่เพียงพอ', 'https://shopee.co.th/', 10, '26798e87a74240730df00480a7b2826c.jpg', 1),
(20, 9, 7, 'test ad', 'https://shopee.co.th/', 10, '7ce58effd722e3e256d0934168719ec8.png', 0),
(21, 15, 9, 'test ad', 'https://shopee.co.th/', 10, '554a69a7745bc2e9ba81720f415a0a38.png', 0),
(23, 6, 5, 'test test', 'https://shopee.co.th/', 50, 'e88a42e86978a030c7366eb826841ea3.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'ประชาสัมพันธ์'),
(2, 'เบาหวาน'),
(5, 'รักสุขภาพ'),
(6, 'ออกกำลังกาย'),
(7, 'Older Smile'),
(8, 'ปวดเข่า'),
(9, 'แบ่งปันความรู้');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `com_body` text NOT NULL,
  `com_created` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `post_id`, `user_id`, `com_body`, `com_created`) VALUES
(1, 6, 10, 'น่าสนใจ', '26-01-2023'),
(3, 11, 8, 'test', '26-01-2023'),
(4, 11, 8, 'test2', '26-01-2023'),
(5, 11, 8, 'test1', '26-01-2023'),
(6, 11, 8, 'est', '26-01-2023'),
(7, 11, 8, 'wefwe', '26-01-2023'),
(8, 10, 2, 'สวัสดีครับ', '26-01-2023'),
(9, 8, 2, 'test', '26-01-2023'),
(10, 8, 2, 'test1', '26-01-2023'),
(11, 8, 2, 'test3', '26-01-2023'),
(12, 8, 2, 'test2', '26-01-2023'),
(13, 7, 2, 'test1', '26-01-2023'),
(14, 7, 2, 'test2', '26-01-2023'),
(17, 8, 2, '123', '26-01-2023'),
(18, 8, 2, '1233213', '26-01-2023'),
(19, 11, 25, 'test1', '26-01-2023'),
(20, 11, 25, 'test2', '26-01-2023'),
(21, 8, 2, '123', '26-01-2023');

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

CREATE TABLE `market` (
  `mar_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mar_name` varchar(255) NOT NULL,
  `mar_fname` varchar(255) NOT NULL,
  `mar_email` varchar(60) NOT NULL,
  `mar_tel` varchar(13) NOT NULL,
  `mar_address` text NOT NULL,
  `mar_type` varchar(60) NOT NULL,
  `mar_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`mar_id`, `user_id`, `mar_name`, `mar_fname`, `mar_email`, `mar_tel`, `mar_address`, `mar_type`, `mar_status`) VALUES
(3, 12, 'shopee', 'leo leo', 'test@gmail.com', '0956158072', 'address test', 'ร้านขายของ', 0),
(4, 7, 'Lazada', 'guy guy', 'test@gmail.com', '0956158072', 'address test', 'ร้านค้าออนไลน์', 0),
(5, 19, 'shopee', 'test test ', 'test@gmail.com', '095615804', 'test', 'ร้านค้าออนไลน์', 1),
(6, 6, 'test test', 'test', 'test@gmail.com', '0956187051', 'sdfsdnfjk', 'ร้านค้าออนไลน์', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `message` text NOT NULL,
  `mes_created` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`sender`, `receiver`, `message`, `mes_created`) VALUES
(2, 10, 'test', '05:01:10 26-01-2023'),
(2, 10, 'test2', '05:01:13 26-01-2023'),
(2, 10, 'test', '05:01:12 26-01-2023'),
(2, 10, 'test4', '05:01:44 26-01-2023'),
(10, 2, 'test', '05:01:28 26-01-2023'),
(10, 2, 'hello', '05:01:31 26-01-2023'),
(2, 10, 'test1', '08:01:04 26-01-2023'),
(10, 2, 'hello', '08:01:09 26-01-2023');

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `part_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `part_fname` varchar(255) NOT NULL,
  `part_email` varchar(60) NOT NULL,
  `part_address` text NOT NULL,
  `part_detail` text NOT NULL,
  `part_bank_number` varchar(60) NOT NULL,
  `part_bank_acc` varchar(255) NOT NULL,
  `part_bank_name` varchar(60) NOT NULL,
  `part_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`part_id`, `user_id`, `part_fname`, `part_email`, `part_address`, `part_detail`, `part_bank_number`, `part_bank_acc`, `part_bank_name`, `part_status`) VALUES
(3, 13, 'aom aom', 'aom@gmail.com', 'address test ', 'doctor', '123456789111', 'test test', 'next', 0),
(4, 14, 'yam yam', 'yam@gmail.com', 'address test ', 'doctor', '123456789111', 'test test', 'next', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `post_body` text NOT NULL,
  `post_media` varchar(60) NOT NULL,
  `post_created` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `cat_id`, `post_body`, `post_media`, `post_created`) VALUES
(6, 2, 1, 'สรุปข่าวเด่น', '08fe6278377d5524054f21d6c773b869.png', '26-01-2023'),
(7, 2, 1, 'ทริปเที่ยวเป็นครอบครัว', 'a895349a03fc1ba3da13cab377ec5184.png', '26-01-2023'),
(8, 2, 1, 'กิจกรรมวิ่งมาราธอน', '638c6495b15780a04699ebcfffcf48b3.png', '26-01-2023'),
(10, 15, 5, 'น้ำเต้าหู้นมสด จากถั่วเหลืองธรรมชาติ', '73e9c8b016714ca41e3f8e046d4a6c98.png', '26-01-2023'),
(11, 10, 2, 'คลินิกหมอเทพ\r\nรักษาทุกโรค\r\nรักษาทุกช่วงเวลา\r\nรักษาทุกวัน\r\nรักษาใจทุกคน', '463673467a912fb747d7f7fa733a8550.png', '26-01-2023');

-- --------------------------------------------------------

--
-- Table structure for table `post_like`
--

CREATE TABLE `post_like` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_like` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_like`
--

INSERT INTO `post_like` (`post_id`, `user_id`, `post_like`) VALUES
(11, 6, 1),
(11, 11, 1),
(10, 11, 1),
(8, 11, 1),
(7, 11, 1),
(6, 11, 1),
(11, 2, 1),
(10, 2, 1),
(8, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `ques_id` int(11) NOT NULL,
  `ques_body` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`ques_id`, `ques_body`) VALUES
(6, 'ด้านเนื้อหา'),
(7, 'ด้านประโยชน์และการนำไปใช้'),
(8, 'เมนูง่ายต่อการใช้งาน'),
(9, 'ความสวยงาม ความทันสมัย น่าสนใจของหน้าแรก');

-- --------------------------------------------------------

--
-- Table structure for table `ques_answer`
--

CREATE TABLE `ques_answer` (
  `ques_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ques_answer` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ques_answer`
--

INSERT INTO `ques_answer` (`ques_id`, `user_id`, `ques_answer`) VALUES
(6, 6, 5),
(7, 6, 3),
(8, 6, 5),
(9, 6, 3),
(6, 11, 5),
(7, 11, 4),
(8, 11, 4),
(9, 11, 2),
(6, 15, 5),
(7, 15, 4),
(8, 15, 3),
(9, 15, 3),
(6, 2, 5),
(7, 2, 5),
(8, 2, 4),
(9, 2, 3),
(6, 7, 5),
(7, 7, 3),
(8, 7, 3),
(9, 7, 3),
(6, 15, 5),
(7, 15, 3),
(8, 15, 3),
(9, 15, 2),
(6, 25, 5),
(7, 25, 3),
(8, 25, 3),
(9, 25, 3);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `user_id` int(11) NOT NULL,
  `font_size` int(2) NOT NULL DEFAULT 18
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`user_id`, `font_size`) VALUES
(2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_dob` varchar(20) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_tel` varchar(13) NOT NULL,
  `user_role` varchar(10) NOT NULL,
  `user_pass` varchar(60) NOT NULL,
  `user_wallet` decimal(8,2) NOT NULL,
  `user_image` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_dob`, `user_gender`, `user_tel`, `user_role`, `user_pass`, `user_wallet`, `user_image`) VALUES
(2, 'admin', '2023-01-19', 'ชาย', '0910142691', 'admin', '202cb962ac59075b964b07152d234b70', '200.00', 'a905649de7ed0821f1b01357f5b074a0.png'),
(6, 'user', '2023-01-26', 'หญิง', '0956158070', 'market', '202cb962ac59075b964b07152d234b70', '50.00', '033119fe7b4cd96f71ab9cdea18f752d.png'),
(7, 'guy', '2023-01-26', 'ชาย', '0956158072', 'user', '202cb962ac59075b964b07152d234b70', '2000.00', 'f8708a669c0bb2238a620c940bde5650.png'),
(8, 'kong', '2023-01-26', 'ชาย', '0956158072', 'market', '202cb962ac59075b964b07152d234b70', '0.00', 'a0ec133a3d0525f2a44c348914b14f56.jpg'),
(9, 'market', '2023-01-26', 'หญิง', '0956158072', 'market', '202cb962ac59075b964b07152d234b70', '1000.00', '4ecf3f05c9401729765d6bc0587d7f25.png'),
(10, 'partner', '2023-01-26', 'หญิง', '0956158072', 'partner', '202cb962ac59075b964b07152d234b70', '0.00', '4f896f4699c3844e0a9719e69c76d8cd.png'),
(11, 'kraiwit', '2023-01-26', 'ชาย', '0956158072', 'user', '202cb962ac59075b964b07152d234b70', '0.00', 'f563f93aa304d61840ce1fc03f1a41eb.png'),
(12, 'leo', '2023-01-26', 'ชาย', '0956158072', 'user', '202cb962ac59075b964b07152d234b70', '1000.00', 'c03b127eecae9a9b6377a77d63dd7177.png'),
(13, 'aom', '2023-01-26', 'หญิง', '0956158072', 'user', '202cb962ac59075b964b07152d234b70', '0.00', '48c0de2d56733a2caa4b484bcf37235c.png'),
(14, 'yam', '2023-01-26', 'ชาย', '0956158072', 'user', '202cb962ac59075b964b07152d234b70', '0.00', 'aa71eabc7b7e48944b4b9fb69f109d56.png'),
(15, 'focus', '2023-01-05', 'ชาย', '0956158072', 'market', '202cb962ac59075b964b07152d234b70', '11000.00', '741b2aa308835dc042734595501f7750.png'),
(16, 'jack', '2023-01-16', 'ชาย', '0956158072', 'user', '202cb962ac59075b964b07152d234b70', '0.00', '9758dc54076da6ffae663502d1839131.png'),
(17, 'block', '2023-01-20', 'ชาย', '0956158072', 'user', '202cb962ac59075b964b07152d234b70', '0.00', '6306e0470f9f1e3752c246522d7431e5.png'),
(18, 'max', '2023-01-26', 'ชาย', '095615872', 'user', '202cb962ac59075b964b07152d234b70', '0.00', 'd62117aaac20595b21f14bee2b61ba6e.png'),
(19, 'boy', '2023-01-26', 'ชาย', '095615702', 'market', '202cb962ac59075b964b07152d234b70', '100.00', 'd3578ebe2fe41caa37de6d72409ff76b.png'),
(21, 'king', '2023-01-26', 'หญิง', '0956158702', 'admin', '202cb962ac59075b964b07152d234b70', '0.00', '9251f76a098bc84c15e9aac168362022.png'),
(25, 'non tawat', '2023-01-26', 'ชาย', '0956158702', 'user', '202cb962ac59075b964b07152d234b70', '0.00', '9244d2013876dc4efd26e8975f84f3d7.png');

-- --------------------------------------------------------

--
-- Table structure for table `view_post`
--

CREATE TABLE `view_post` (
  `view_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `view` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `view_post`
--

INSERT INTO `view_post` (`view_id`, `post_id`, `user_id`, `view`) VALUES
(1, 11, 8, 1),
(2, 8, 2, 1),
(3, 10, 2, 1),
(4, 7, 2, 1),
(5, 11, 6, 1),
(7, 10, 19, 1),
(8, 10, 6, 1),
(9, 11, 25, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`ad_id`),
  ADD KEY `ad_cat` (`cat_id`),
  ADD KEY `ad_user` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `com_post` (`post_id`),
  ADD KEY `com_user` (`user_id`);

--
-- Indexes for table `market`
--
ALTER TABLE `market`
  ADD PRIMARY KEY (`mar_id`),
  ADD KEY `mar_user` (`user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD KEY `mes_user1` (`sender`),
  ADD KEY `mes_user2` (`receiver`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`part_id`),
  ADD KEY `part_user` (`user_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_cat` (`cat_id`),
  ADD KEY `post_user` (`user_id`);

--
-- Indexes for table `post_like`
--
ALTER TABLE `post_like`
  ADD KEY `like_post` (`post_id`),
  ADD KEY `like_user` (`user_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ques_id`);

--
-- Indexes for table `ques_answer`
--
ALTER TABLE `ques_answer`
  ADD KEY `answer_ques` (`ques_id`),
  ADD KEY `answer_user` (`user_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `view_post`
--
ALTER TABLE `view_post`
  ADD PRIMARY KEY (`view_id`),
  ADD KEY `view_post` (`post_id`),
  ADD KEY `view_user` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advert`
--
ALTER TABLE `advert`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `market`
--
ALTER TABLE `market`
  MODIFY `mar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `part_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `ques_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `view_post`
--
ALTER TABLE `view_post`
  MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advert`
--
ALTER TABLE `advert`
  ADD CONSTRAINT `ad_cat` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ad_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `com_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `com_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `market`
--
ALTER TABLE `market`
  ADD CONSTRAINT `mar_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `mes_user1` FOREIGN KEY (`sender`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mes_user2` FOREIGN KEY (`receiver`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `partner`
--
ALTER TABLE `partner`
  ADD CONSTRAINT `part_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_cat` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_like`
--
ALTER TABLE `post_like`
  ADD CONSTRAINT `like_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ques_answer`
--
ALTER TABLE `ques_answer`
  ADD CONSTRAINT `answer_ques` FOREIGN KEY (`ques_id`) REFERENCES `question` (`ques_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answer_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `setting`
--
ALTER TABLE `setting`
  ADD CONSTRAINT `set_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `view_post`
--
ALTER TABLE `view_post`
  ADD CONSTRAINT `view_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `view_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
