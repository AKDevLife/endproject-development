-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 17 ก.ค. 2022 เมื่อ 06:40 AM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.3.31-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electron_borrow`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_admin`
--

CREATE TABLE `tb_admin` (
  `a_id` int(10) UNSIGNED NOT NULL,
  `a_user` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_firstname` varchar(100) NOT NULL,
  `a_lastname` varchar(100) NOT NULL,
  `a_email` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `tb_admin`
--

INSERT INTO `tb_admin` (`a_id`, `a_user`, `a_password`, `a_firstname`, `a_lastname`, `a_email`, `created_at`) VALUES
(1, 'a1', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'admin', 'test@silpakorn.edu', '2021-11-29 18:16:45');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_endoser`
--

CREATE TABLE `tb_endoser` (
  `e_id` int(10) UNSIGNED NOT NULL,
  `e_user` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_firstname` varchar(100) NOT NULL,
  `e_lastname` varchar(100) NOT NULL,
  `e_email` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `tb_endoser`
--

INSERT INTO `tb_endoser` (`e_id`, `e_user`, `e_password`, `e_firstname`, `e_lastname`, `e_email`, `created_at`) VALUES
(1, 'e1', '81dc9bdb52d04dc20036dbd8313ed055', 'ชัยวุฒ', 'ชูรักษ์', 'pradutong_g@silpakorn.edu', '2021-11-29 19:03:13');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_equipment`
--

CREATE TABLE `tb_equipment` (
  `eq_id` int(100) NOT NULL,
  `eq_name` varchar(255) NOT NULL,
  `eq_typeid` int(11) NOT NULL,
  `eq_descriptions` longtext DEFAULT NULL,
  `eq_image` varchar(255) DEFAULT NULL,
  `eq_remain` int(100) NOT NULL,
  `eq_total` int(100) NOT NULL,
  `eq_status` int(10) NOT NULL DEFAULT 1,
  `added_time` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `tb_equipment`
--

INSERT INTO `tb_equipment` (`eq_id`, `eq_name`, `eq_typeid`, `eq_descriptions`, `eq_image`, `eq_remain`, `eq_total`, `eq_status`, `added_time`) VALUES
(1, '7400', 1, 'เป็นไอซี NAND gate 2 อินพุตสี่ตัว', '345438472.jpg', 10, 10, 1, '2021-01-01'),
(2, '7402', 1, 'เป็นไอซี NOR gate 2 อินพุตสี่ตัว', '7402.jpg', 6, 6, 1, '2021-01-02'),
(3, '7404', 1, 'เป็นไอซี NOT gate 1 อินพุตหกตัว', '744218725.jpg', 8, 8, 1, '2021-01-03'),
(4, '7407', 1, 'เป็นไอซี Buffer แบบ Open-Collector', '7407.jpg', 4, 4, 1, '2021-01-04'),
(5, '7408', 1, 'เป็นไอซี AND gate 2 อินพุตสี่ตัว', '601481305.jpg', 5, 5, 1, '2021-01-05'),
(6, '7410', 1, 'เป็นไอซี NAND gate 3 อินพุตสามตัว', '7410.jpg', 7, 7, 1, '2021-01-06'),
(7, '7411', 1, 'เป็นไอซี AND gate 3 อินพุตสามตัว', '1470583124.jpg', 6, 6, 1, '2021-01-07'),
(8, '7413', 1, 'เป็นไอซี NAND gate 4 อินพุตสองตัว', '1813298117.jpg', 1, 1, 1, '2021-01-08'),
(9, '7414', 1, 'ประกอบด้วย Inverting Schmitt จำนวน 6 ขา สามารถใช้เพื่อการสร้างหรือเปลี่ยนสัญญาณให้มีความคมชัดราบรื่น', '7414.jpg', 5, 5, 1, '2021-01-09'),
(10, '7420', 1, 'เป็นไอซี NAND gate 4 อินพุตสองตัว', '543589014.jpg', 8, 8, 1, '2021-01-10'),
(157, 'ZENER-1N5231', 2, 'ซีเนอร์ไดโอด 5.1V 500mW', '2084883055.jpg', 8, 8, 1, '2022-06-03'),
(158, '7485', 1, 'เป็นไอซีเปรียบเทียบสำหรับ 4 บิตโดยเอาท์พุตมี มากกว่า น้อยกว่า หรือเท่ากับ', '1831439813.jpg', 8, 8, 1, '2022-06-04'),
(159, '74138', 1, 'ไอซีที่ใช้ในการถอดรหัสเลขไบนารีขนาด 3 บิต ให้เป็นรหัสขนาด 8 บิตที่เอาต์พุต', '1794417670.jpg', 7, 7, 1, '2022-06-04'),
(160, 'HA17741', 2, 'เป็น แอมพลิฟายเออร์สำหรับการดำเนินงานที่มีประสิทธิภาพสูงชดเชยเฟสภายในซึ่งเหมาะสำหรับการใช้งานที่หลากหลายในด้านการทดสอบและการควบคุม', '1540373880.jpg', 7, 7, 1, '2022-06-04'),
(161, 'AT892051', 2, 'เป็นไอซีไมโครคอนโทรลเลอร์ขนาด 8 บิต', '2028589678.jpg', 6, 6, 1, '2022-06-04'),
(162, '0.47-uF/100V', 3, 'ตัวเก็บประจุขนาด 0.47uF 100V ชนิดไมล่าร์', '1305114426.jpg', 5, 5, 1, '2022-06-04'),
(163, 'Capacitor AC  8uF', 3, 'ตัวเก็บประจุ 8uF สำหรับ AC', '793776839.jpg', 5, 5, 1, '2022-06-04'),
(164, '470-uF/50V', 3, 'ตัวเก็บประจุขนาด 470uF 50V ชนิดอิเล็กโตรไลต', '48725037.jpg', 6, 6, 1, '2022-06-04'),
(165, '1.5-mH', 4, 'ตัวเหนี่ยวนำขนาด 1.5mH', '1095792733.jpg', 6, 6, 1, '2022-06-04'),
(166, '100-uH', 4, 'ตัวเหนี่ยวนำขนาด 100uH', '274170925.jpg', 7, 7, 1, '2022-06-04'),
(167, 'Raindrops Detection Sensor', 5, 'เซ็นเซอร์สำหรับตรวจสอบสภาพอากาศ, วัดความชื้นในอากาศและน้ำฝน', '540937051.jpg', 4, 5, 1, '2022-06-04'),
(168, ' HY-SRF05 Ultrasonic Sensor Module', 5, 'โมดูลวัดระยะด้วยคลื่นอัลตร้าโซนิค ใช้การสื่อสารกับไมโครคอนโทรลเลอร์ผ่านการทริกสัญญาณ สามารถวัดระยะห่างได้ตั้งแต่ 2 เซ็นติเมตร ไปจนถึง 4 เมตร ', '1397603981.jpg', 2, 4, 1, '2022-06-04'),
(169, '4x3 Matrix Keypad Module', 5, 'สวิตช์ Keypad Matrix ขนาด 4x3', '937203863.jpg', 4, 4, 1, '2022-06-04'),
(170, 'Arduino UNO R3', 6, 'บอร์ดไมโครคอนโทรลเลอร์แบบ Open-source บนแพลตฟอร์ม Arduino ออกแบบมาให้ใช้งานได้ง่าย ใช้ชิพ ATmega328 รันที่ความถี่ 16 MHz หน่วยความจำแฟลช 32 KB แรม 2 KB บอร์ดใช้ไฟเลี้ยง 7 ถึง 12 V', '984412303.jpg', 1, 2, 1, '2022-06-04'),
(171, 'ESP-32S NodeMCU', 6, 'โมดูล Wifi ESP-32 รุ่น ESP-WROOM-32 โมดูล Wifi + Bluetooth 4.2 + Touch/Temp Sensorทำงานแบบ Dual Core ที่ความเร็ว 160Mhz มี SRAM 512K หน่วยความจำ Flash สำหรับอัพโหลดโปรแกรมขนาด 16M มีขา GPIO 36 ขา ความละเอียดในการอ่านค่า ADC 12Bit  สามารถเขียนโปรแกรม ผ่าน Arduino IDE เหมือนเขียน Arduino ได้', '791108006.jpg', 3, 3, 1, '2022-06-04'),
(172, 'NodeMCU ESP8266 V2', 6, 'เป็นบอร์ดพัฒนาโปรแกรม ที่มีชิบ ESP8266 ในตัว ซึ่งช่วยให้บอร์ดนี้สามารถเชื่อมต่อไวไฟได้โดยที่ไม่ต้องติดโมดูลเพิ่มเติม บอร์ดตัวนี้ มีขนาดเล็กกว่า NodeMCU V3 โดยบอร์ดกว้าง 2.5CM สามารถปักเข้าบอร์ดทดลอง Breadboard 400 หรือ 720 รูได้ บอร์ดตัวนี้ ใช้ชิฟ USB เบอร์ CP2102 ในการติดต่อกับคอมพิวเตอร์เพื่อลงโปรแกรม สามารถลง Firmware NodeMCU และเขียนโปรแกรมด้วยภาษา Lau และ Arduino ได้', '1993358708.jpg', 3, 3, 1, '2022-06-04'),
(173, 'LED Dot Matrix 8x8 3.75mm Red Color common cathode', 7, 'หลอดไฟเมทริกซ์ขนาด 8x8 ชนิดแคโทด ขนาด 3.75 มิลลิเมตร', '1110136410.jpg', 5, 5, 1, '2022-06-04'),
(174, '7 Segment-2 หลัก', 7, 'โมดูลหน้าจอแสดงผลตัวเลข 2 หลัก', '1909453984.jpg', 10, 10, 1, '2022-06-04'),
(175, 'Switch 7 Segment', 7, 'บอร์ดแสดงผลตัวเลข 8 หลักพร้อม LED และปุ่มกด', '1671621851.jpg', 9, 9, 1, '2022-06-04'),
(176, 'LCD 1604 Module(Blue Screen)', 8, 'จอแสดงผล LCD สีน้ำเงิน ขนาด 16x4 ตัวอักษร', '1432250726.jpg', 4, 4, 1, '2022-06-04'),
(177, 'LCD 128x64 Dots Graphic Blue Color', 8, 'จอแสดงผล LCD สีน้ำเงิน ขนาด 128 x 64 ตัวอักษร', '134376089.jpg', 3, 3, 1, '2022-06-04'),
(178, '1602 LCD (Blue Screen)', 8, 'จอ LCD สีน้ำเงิน ขนาด 16 ตัวอักษร 2 บรรทัด', '748888472.jpg', 3, 3, 1, '2022-06-04'),
(179, 'วัตต์มิเตอร์แบบ 3 เฟส', 9, 'เครื่องมือวัดวัตต์ไฟฟ้า', '577255469.jpg', 2, 2, 1, '2022-06-04'),
(180, 'RLC Digital Bridge Meter', 9, 'ทำหน้าที่วัดหาค่าของอุปกรณ์จำพวกตัวต้านทาน ตัวเหนี่ยวนำและตัวเก็บประจุ', '2088438155.jpg', 2, 2, 1, '2022-06-04'),
(181, 'UT200A UNI-T Digital Multimeter Clamp Meter ', 9, 'สามารถใช้วัดแรงดันไฟ AC และ DC, กระแสไฟ AC, ความต้านทาน, Diode', '1567150373.jpg', 2, 2, 1, '2022-06-04'),
(182, 'Breadboard Protoboard Test Circuit Board Tie-point 1660 ZY-204', 9, 'บอร์ดทดลองวงจรขนาด 830 จุด ประกบติดกันสองมีหัวรับแรงดันจากแหล่างจ่ายภายนอก 3 หัว ', '1671543840.jpg', 4, 5, 1, '2022-06-04'),
(183, 'Connector-2 ขา', 10, 'ใช้ในการเชื่อมต่อวงจรโดยมี 2 pin', '443042573.jpg', 10, 15, 1, '2022-06-04'),
(184, 'Connector-3 ขา', 10, 'ใช้ในการเชื่อมต่อวงจรโดยมี 3 pin', '498547555.jpg', 15, 15, 1, '2022-06-04'),
(185, 'Switch DC -2ขา', 10, 'สวิตช์เปิดปิด 2 pin', '227355988.jpg', 10, 10, 1, '2022-06-04');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_eq_borrow`
--

CREATE TABLE `tb_eq_borrow` (
  `id` int(10) NOT NULL,
  `borrow_id` int(255) NOT NULL,
  `s_user` varchar(255) NOT NULL,
  `eq_id` int(100) NOT NULL,
  `eq_number` int(100) NOT NULL,
  `FromDate` varchar(255) NOT NULL,
  `ToDate` varchar(255) NOT NULL,
  `Descriptions` varchar(255) NOT NULL,
  `Status` int(10) NOT NULL DEFAULT 1,
  `DateTime` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `tb_eq_borrow`
--

INSERT INTO `tb_eq_borrow` (`id`, `borrow_id`, `s_user`, `eq_id`, `eq_number`, `FromDate`, `ToDate`, `Descriptions`, `Status`, `DateTime`) VALUES
(1, 90228, '09610747', 1, 1, '2022-01-12', '2022-01-30', 'งานวิจัย', 8, '2022-06-09'),
(2, 90228, '09610747', 3, 1, '2022-01-12', '2022-01-30', 'งานวิจัย', 8, '2022-06-09'),
(3, 90228, '09610747', 4, 1, '2022-01-12', '2022-01-30', 'งานวิจัย', 8, '2022-06-09'),
(4, 73437, '09610599', 175, 1, '2021-01-09', '2021-01-12', 'อื่นๆ', 8, '2022-06-09'),
(5, 45373, '09610747', 6, 1, '2022-02-10', '2022-06-20', 'งานโครงงานวิศกรรมไฟฟ้า', 8, '2022-06-09'),
(6, 45373, '09610747', 7, 1, '2022-02-10', '2022-06-20', 'งานโครงงานวิศกรรมไฟฟ้า', 8, '2022-06-09'),
(7, 45373, '09610747', 5, 1, '2022-02-10', '2022-06-20', 'งานโครงงานวิศกรรมไฟฟ้า', 8, '2022-06-09'),
(8, 43699, '09610599', 176, 1, '2021-01-13', '2021-01-15', 'อื่นๆ', 8, '2022-06-09'),
(9, 24575, '09610747', 9, 1, '2022-03-07', '2022-03-25', 'อื่นๆ', 8, '2022-06-09'),
(10, 24575, '09610747', 6, 1, '2022-03-07', '2022-03-25', 'อื่นๆ', 8, '2022-06-09'),
(11, 24575, '09610747', 7, 1, '2022-03-07', '2022-03-25', 'อื่นๆ', 8, '2022-06-09'),
(12, 95313, '09610599', 167, 1, '2021-02-10', '2021-02-12', 'งานวิจัย', 8, '2022-06-09'),
(13, 51506, '09610747', 1, 1, '2022-01-14', '2022-02-25', 'งานบริการวิชาการ', 8, '2022-06-09'),
(14, 51506, '09610747', 3, 1, '2022-01-14', '2022-02-25', 'งานบริการวิชาการ', 8, '2022-06-09'),
(15, 51506, '09610747', 168, 1, '2022-01-14', '2022-02-25', 'งานบริการวิชาการ', 8, '2022-06-09'),
(16, 82728, '09610599', 170, 1, '2021-02-16', '2021-02-18', 'อื่นๆ', 8, '2022-06-09'),
(17, 82728, '09610599', 168, 1, '2021-02-16', '2021-02-18', 'อื่นๆ', 8, '2022-06-09'),
(18, 13609, '09610747', 166, 1, '2022-02-17', '2022-03-10', 'งานวิจัย', 8, '2022-06-09'),
(19, 13609, '09610747', 10, 1, '2022-02-17', '2022-03-10', 'งานวิจัย', 8, '2022-06-09'),
(20, 13609, '09610747', 1, 1, '2022-02-17', '2022-03-10', 'งานวิจัย', 8, '2022-06-09'),
(21, 48211, '09610599', 164, 1, '2021-03-09', '2021-03-12', 'งานโครงงานวิศกรรมไฟฟ้า', 8, '2022-06-09'),
(22, 48211, '09610599', 161, 1, '2021-03-09', '2021-03-12', 'งานโครงงานวิศกรรมไฟฟ้า', 8, '2022-06-09'),
(23, 54731, '09610599', 171, 1, '2021-03-16', '2021-03-19', 'อื่นๆ', 8, '2022-06-09'),
(24, 54731, '09610599', 175, 1, '2021-03-16', '2021-03-19', 'อื่นๆ', 8, '2022-06-09'),
(25, 54731, '09610599', 183, 5, '2021-03-16', '2021-03-19', 'อื่นๆ', 8, '2022-06-09'),
(26, 54731, '09610599', 182, 1, '2021-03-16', '2021-03-19', 'อื่นๆ', 8, '2022-06-09'),
(27, 74647, '09610599', 7, 2, '2021-04-09', '2021-04-13', 'อื่นๆ', 8, '2022-06-09'),
(28, 74647, '09610599', 4, 2, '2021-04-09', '2021-04-13', 'อื่นๆ', 8, '2022-06-09'),
(29, 77002, '09610599', 158, 1, '2021-05-09', '2021-05-12', 'งานโครงงานวิศกรรมไฟฟ้า', 8, '2022-06-09'),
(30, 77002, '09610599', 169, 1, '2021-05-09', '2021-05-12', 'งานโครงงานวิศกรรมไฟฟ้า', 8, '2022-06-09'),
(31, 77002, '09610599', 173, 1, '2021-05-09', '2021-05-12', 'งานโครงงานวิศกรรมไฟฟ้า', 8, '2022-06-09'),
(32, 23577, '09610747', 1, 1, '2022-03-09', '2022-03-17', 'งานบริการวิชาการ', 8, '2022-06-09'),
(33, 23577, '09610747', 3, 1, '2022-03-09', '2022-03-17', 'งานบริการวิชาการ', 8, '2022-06-09');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_eq_type`
--

CREATE TABLE `tb_eq_type` (
  `eq_typeid` int(11) NOT NULL,
  `eq_typename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `tb_eq_type`
--

INSERT INTO `tb_eq_type` (`eq_typeid`, `eq_typename`) VALUES
(1, 'IC Digital'),
(2, 'Controller and Electronic'),
(3, 'ตัวเก็บประจุ'),
(4, 'ขดลวดเหนี่ยวนำ (L)'),
(5, 'โมดูลเซ็นเซอร์'),
(6, 'Embedded Boards'),
(7, 'LED'),
(8, 'โมดูลจอ LCD'),
(9, 'ครุภัณฑ์'),
(10, 'อุปกรณ์อื่นๆ');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_professor`
--

CREATE TABLE `tb_professor` (
  `p_id` int(100) NOT NULL,
  `p_user` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_firstname` varchar(100) NOT NULL,
  `p_lastname` varchar(100) NOT NULL,
  `p_email` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `tb_professor`
--

INSERT INTO `tb_professor` (`p_id`, `p_user`, `p_password`, `p_firstname`, `p_lastname`, `p_email`, `created_at`) VALUES
(1, 'p1', '81dc9bdb52d04dc20036dbd8313ed055', 'อรทัย', 'วัชรกฤชกรณ์', 'pradutong_g@silpakorn.edu', '2022-02-04 13:41:42'),
(2, 'p2', '81dc9bdb52d04dc20036dbd8313ed055', 'ชูเกียรติ', 'สอดศรี', 'test@silpakorn.edu', '2022-03-23 23:29:48'),
(3, 'p3', '81dc9bdb52d04dc20036dbd8313ed055', 'ระพีพันธ์', 'แก้วอ่อน', 'test@silpakorn.edu', '2022-03-23 23:29:48'),
(4, 'p4', '81dc9bdb52d04dc20036dbd8313ed055', 'ณัฐพงศ์', 'วงศ์พร้อมมูล', 'test@silpakorn.edu', '2022-03-23 23:31:41');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_student`
--

CREATE TABLE `tb_student` (
  `s_id` int(100) NOT NULL,
  `s_user` varchar(100) NOT NULL,
  `s_password` varchar(100) NOT NULL,
  `s_firstname` varchar(100) NOT NULL,
  `s_lastname` varchar(100) NOT NULL,
  `s_email` varchar(100) NOT NULL,
  `s_phone` char(11) NOT NULL,
  `s_image` varchar(255) DEFAULT NULL,
  `p_id` int(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `s_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- dump ตาราง `tb_student`
--

INSERT INTO `tb_student` (`s_id`, `s_user`, `s_password`, `s_firstname`, `s_lastname`, `s_email`, `s_phone`, `s_image`, `p_id`, `created_at`, `s_status`) VALUES
(1, '09610597', '81dc9bdb52d04dc20036dbd8313ed055', 'นายกฤษฎา', 'สมโภชน์', 'test@silpakorn.edu', '0101231234', '489579715.jpg', 1, '2022-03-22 14:48:28', 1),
(2, '09610605', '81dc9bdb52d04dc20036dbd8313ed055', 'นายกิตติคุณ', 'บุญเคลือบ', 'test@silpakorn.edu', '0101231234', '1757826009.jpg', 2, '2022-03-22 14:49:46', 1),
(3, '09610694', '81dc9bdb52d04dc20036dbd8313ed055', 'นายมงคล', 'ศรีประสิทธิ์', 'test@silpakorn.edu', '0101231234', '785554735.jpg', 2, '2022-03-22 14:50:20', 1),
(4, '09610704', '81dc9bdb52d04dc20036dbd8313ed055', 'นายวรศักดิ์', 'วัฒนพิทักษ์พงศ์', 'test@silpakorn.edu', '0101231234', '592544090.jpg', 3, '2022-03-22 14:50:50', 1),
(5, '09610750', '81dc9bdb52d04dc20036dbd8313ed055', 'นายอมร', 'มีแสงพันธ์', 'test@silpakorn.edu', '0101231234', '555979900.jpg', 4, '2022-03-22 14:53:12', 1),
(6, '09610599', '81dc9bdb52d04dc20036dbd8313ed055', 'นายกฤษนันท์', 'ประดู่ทอง', 'pradutong_g@silpakorn.edu', '0111111111', '1573939487.jpg', 1, '2022-03-29 14:50:17', 1),
(7, '09610747', 'b7da6669894867f04b8727876a69ffc0', 'Athipong', 'Hongklin', 'hongklin_a@su.ac.th', '0804275019', '712566008.jpg', 3, '2022-06-09 13:18:16', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tb_endoser`
--
ALTER TABLE `tb_endoser`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `tb_equipment`
--
ALTER TABLE `tb_equipment`
  ADD PRIMARY KEY (`eq_id`),
  ADD UNIQUE KEY `Name` (`eq_name`),
  ADD KEY `EmpId` (`eq_name`) USING BTREE,
  ADD KEY `eq_name` (`eq_name`),
  ADD KEY `eq_typeid` (`eq_typeid`);

--
-- Indexes for table `tb_eq_borrow`
--
ALTER TABLE `tb_eq_borrow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eq_id` (`eq_id`);

--
-- Indexes for table `tb_eq_type`
--
ALTER TABLE `tb_eq_type`
  ADD PRIMARY KEY (`eq_typeid`);

--
-- Indexes for table `tb_professor`
--
ALTER TABLE `tb_professor`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tb_student`
--
ALTER TABLE `tb_student`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `p_id` (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `a_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_endoser`
--
ALTER TABLE `tb_endoser`
  MODIFY `e_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_equipment`
--
ALTER TABLE `tb_equipment`
  MODIFY `eq_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `tb_eq_borrow`
--
ALTER TABLE `tb_eq_borrow`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_professor`
--
ALTER TABLE `tb_professor`
  MODIFY `p_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_student`
--
ALTER TABLE `tb_student`
  MODIFY `s_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_equipment`
--
ALTER TABLE `tb_equipment`
  ADD CONSTRAINT `tb_equipment_ibfk_1` FOREIGN KEY (`eq_typeid`) REFERENCES `tb_eq_type` (`eq_typeid`);

--
-- Constraints for table `tb_eq_borrow`
--
ALTER TABLE `tb_eq_borrow`
  ADD CONSTRAINT `tb_eq_borrow_ibfk_1` FOREIGN KEY (`eq_id`) REFERENCES `tb_equipment` (`eq_id`);

--
-- Constraints for table `tb_student`
--
ALTER TABLE `tb_student`
  ADD CONSTRAINT `tb_student_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `tb_professor` (`p_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
