-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2022 at 11:59 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `end_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
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
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`a_id`, `a_user`, `a_password`, `a_firstname`, `a_lastname`, `a_email`, `created_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'admin@admin', '2021-11-29 18:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_endoser`
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
-- Dumping data for table `tb_endoser`
--

INSERT INTO `tb_endoser` (`e_id`, `e_user`, `e_password`, `e_firstname`, `e_lastname`, `e_email`, `created_at`) VALUES
(1, 'endoser', '811376de7e4a6815a8bc7dc39b3fc15a', 'endoser', 'endoser', 'pradutong_g@silpakorn.edu', '2021-11-29 19:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_equipment`
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
-- Dumping data for table `tb_equipment`
--

INSERT INTO `tb_equipment` (`eq_id`, `eq_name`, `eq_typeid`, `eq_descriptions`, `eq_image`, `eq_remain`, `eq_total`, `eq_status`, `added_time`) VALUES
(1, '7400', 1, 'เป็นไอซี NAND gate 2 อินพุตสี่ตัว', '7400.jpg', 0, 10, 1, '2021-01-01'),
(2, '7402', 1, 'เป็นไอซี NOR gate 2 อินพุตสี่ตัว', '7402.jpg', 0, 6, 1, '2021-01-02'),
(3, '7404', 1, 'เป็นไอซี NOT gate 1 อินพุตหกตัว', '7404.jpg', 0, 8, 1, '2021-01-03'),
(4, '7407', 1, 'เป็นไอซี Buffer แบบ Open-Collector', '7407.jpg', 0, 4, 1, '2021-01-04'),
(5, '7408', 1, 'เป็นไอซี AND gate 2 อินพุตสี่ตัว', '7408.jpg', 0, 5, 1, '2021-01-05'),
(6, '7410', 1, 'เป็นไอซี NAND gate 3 อินพุตสามตัว', '7410.jpg', 0, 7, 1, '2021-01-06'),
(7, '7411', 1, 'เป็นไอซี AND gate 3 อินพุตสามตัว', '7411.jpg', 0, 6, 1, '2021-01-07'),
(8, '7413', 1, 'เป็นไอซี NAND gate 4 อินพุตสองตัว', '7413.jpg', 0, 1, 1, '2021-01-08'),
(9, '7414', 1, 'ประกอบด้วย Inverting Schmitt จำนวน 6 ขา สามารถใช้เพื่อการสร้างหรือเปลี่ยนสัญญาณให้มีความคมชัดราบรื่น', '7414.jpg', 5, 5, 1, '2021-01-09'),
(10, '7420', 1, 'เป็นไอซี NAND gate 4 อินพุตสองตัว', '7420.jpg', 8, 8, 1, '2021-01-10'),
(11, '7430', 1, 'เป็นไอซี NAND gate 8 อินพุตหนึงตัว', '7430.jpg', 9, 9, 1, '2021-01-11'),
(12, '7432', 1, 'เป็นไอซี OR gate 2 อินพุตสี่ตัว', '7432.jpg', 5, 5, 1, '2021-01-12'),
(13, '7438', 1, 'เป็นไอซี NAND Buffers 2 อินพุตสี่ตัว', '7438.jpg', 7, 7, 1, '2021-01-13'),
(14, '7473', 1, 'เป็นไอซี  J-K Flip-Flop สองตัว', '7473.jpg', 1, 8, 1, '2021-01-14'),
(15, '7474', 1, 'เป็นไอซี  D-Type Flip-Flops สองตัว', '7474.jpg', 6, 6, 1, '2021-01-15'),
(16, '7476', 1, 'เป็นไอซี J-K Master-Slave Flip-Flops สองตัวที่มี Preset และ Clear', '7476.jpg', 2, 2, 1, '2021-01-16'),
(17, '7480', 1, 'เป็นไอซีวงจรบวกแบบคิดค่าตัวทด', '7480.jpg', 4, 4, 1, '2021-01-17'),
(18, '7485', 1, 'เป็นไอซีเปรียบเทียบสำหรับ 4 บิตโดยเอาท์พุตมี มากกว่า น้อยกว่า หรือเท่ากับ', '7485.jpg', 8, 8, 1, '2021-01-18'),
(19, '7486', 1, 'เป็นไอซี Exclusive OR Gates 2 อินพุตสี่ตัว', '7486.jpg', 5, 5, 1, '2021-01-19'),
(20, '74123', 1, 'โมโนสเตเบิลมัลติไวเบรเตอร์ ', '74123.jpg', 4, 4, 1, '2021-01-20'),
(21, '74138', 1, 'ไอซีที่ใช้ในการถอดรหัสเลขไบนารีขนาด 3 บิต ให้เป็นรหัสขนาด 8 บิตที่เอาต์พุต', '74138.jpg', 8, 8, 1, '2021-01-21'),
(22, '74147', 1, 'ไอซีเข้ารหัสที่เปลี่ยนรหัสจากการกดคีย์สวิตช์อินพุต 9 ตัว ให้เป็นรหัสบีซีดี ขนาด 4 บิต', '74147.jpg', 5, 5, 1, '2021-01-22'),
(23, '74125', 1, 'เป็นไอซีที่เป็น บัฟเฟอร์, ไม่มีการอินเวอร์ 4 องค์ประกอบ 1 bit per element 3-สถานะ', '74125.jpg', 4, 4, 1, '2021-01-23'),
(24, '74139', 1, 'ไอซีที่ใช้ในการถอดรหัสเลขไบนารีขนาด 2 บิต ให้เป็นรหัสขนาด    4 บิต', '74139.jpg', 10, 10, 1, '2021-01-24'),
(25, '74194', 1, 'เป็นไอซี 4-Bit Bidirectional Universal Shift Register', '74194.jpg', 15, 15, 1, '2021-01-25'),
(26, '74244', 1, 'เป็นไอซี Octal Buffer with Noninverted Three-state Outputs', '74244.jpg', 14, 14, 1, '2021-01-26'),
(27, '74541', 1, 'เป็นไอซี octal non-inverting buffer/line driver with 3-state outputs', '74541.jpg', 12, 12, 1, '2021-01-27'),
(28, '74573', 1, 'เป็นไอซี 8-bit D-type transparent latch with 3-state outputs', '74573.jpg', 5, 5, 1, '2021-01-28'),
(29, '4013', 1, 'เป็นไอซี dual D-type flip-flop ที่มี asynchronous set/reset inputs', '4013.jpg', 7, 7, 1, '2021-01-29'),
(30, '4029', 1, 'เป็นไอซีที่มี Presettable Binary/Decade ซึ่งมีตัวนับแบบ Up/Down ', '4029.jpg', 4, 4, 1, '2021-01-30'),
(31, '4069', 1, 'เป็นไอซี Inverter Not gate 1 อินพุตหกตัว', '4069.jpg', 8, 8, 1, '2021-01-31'),
(32, '4511', 1, 'เป็นไอซีแปลง BCD เป็น 7-segment ที่มี 4 อินพุต', '4511.jpg', 11, 11, 1, '2021-02-01'),
(33, '4516', 1, 'เป็นไอซีที่มี presettable CMOS BCD up down synchronous counter', '4516.jpg', 2, 2, 1, '2021-02-02'),
(34, '4543', 1, 'เป็นไอซีที่แปลง BCD-to-Seven Segment Latch/Decoder/Driver for Liquid Crystals', '4543.jpg', 13, 13, 1, '2021-02-03'),
(35, 'LF351N', 2, 'J-FET เครื่องขยาย 1 วงจร', 'LF351N.jpg', 5, 5, 1, '2021-02-04'),
(36, 'LF356N', 2, 'วงจรขยายสัญญาณ - ออปแอมป์', 'LF356N.jpg', 7, 7, 1, '2021-02-05'),
(37, 'LM324N', 2, 'มี Op-Amps อยู่ภายในสี่ตัว', 'LM324N.jpg', 8, 8, 1, '2021-02-06'),
(38, 'LM386N-1', 2, 'วงจรขยายเสียงที่ใช้แรงดันต่ำก็สามารถทำให้ทำงานได้', 'LM386N-1.jpg', 9, 9, 1, '2021-02-07'),
(39, 'LM555', 2, 'วงจรสร้างสัญญาณนาฬิกาความเสถียรสูง', 'LM555.jpg', 4, 4, 1, '2021-02-08'),
(40, 'CD40106', 2, 'ภายในมีวงจร Schmitt Trigger อยู่หกตัว', 'CD40106.jpg', 5, 5, 1, '2021-02-09'),
(41, 'HA17741', 2, 'เป็น แอมพลิฟายเออร์สำหรับการดำเนินงานที่มีประสิทธิภาพสูงชดเชยเฟสภายในซึ่งเหมาะสำหรับการใช้งานที่หลากหลายในด้านการทดสอบและการควบคุม', 'HA17741.jpg', 7, 7, 1, '2021-02-10'),
(42, '74HC4052AN', 2, 'วงจร Analog Multiplexer/Demultiplexer', '74HC4052AN.jpg', 4, 4, 1, '2021-02-11'),
(43, 'AT892051', 2, 'เป็นไอซีไมโครคอนโทรลเลอร์ขนาด 8 บิต', 'AT892051.jpg', 8, 8, 1, '2021-02-12'),
(44, 'ADC0804 LCN', 2, 'วงจรแปลงอะนาล็อก 8 บิตเป็นดิจิตอล', 'ADC0804 LCN.jpg', 3, 3, 1, '2021-02-13'),
(45, 'ADC0820 CCN', 2, 'วงจรแปลงอะนาล็อก 8 บิตเป็นดิจิตอล', 'ADC0820 CCN.jpg', 5, 5, 1, '2021-02-14'),
(46, 'Transister-2N3906 (PNP)', 2, 'ทรานซิสเตอร์ชนิด PNP', 'Transister-2N3906 (PNP).jpg', 6, 6, 1, '2021-02-15'),
(47, 'Transister-2N3904 (NPN)', 2, 'ทรานซิสเตอร์ชนิด NPN', 'Transister-2N3904 (NPN).jpg', 4, 4, 1, '2021-02-16'),
(48, 'JFET-2SK30A', 2, 'J-FET แบบ n-channel', 'JFET-2SK30A.jpg', 8, 8, 1, '2021-02-17'),
(49, 'UA-741CN', 2, 'ไอซีออฟแอมป์', 'UA-741CN.jpg', 7, 7, 1, '2021-02-18'),
(50, 'Diode-1N4001', 2, 'เป็นไดโอด 1A 50V', 'Diode-1N4001.jpg', 5, 5, 1, '2021-02-19'),
(51, 'Diode-1N4148', 2, 'เป็นไดโอดที่มีความเร็วสูง 200mA 100V', 'Diode-1N4148.jpg', 4, 4, 1, '2021-02-20'),
(52, 'ZENER-1N5231', 2, 'ซีเนอร์ไดโอด 5.1V 500mW', 'ZENER-1N5231.jpg', 8, 8, 1, '2021-02-21'),
(53, '1-pF', 3, 'ตัวเก็บประจุขนาด 1pF ชนิดเซรามิค', '1-pF.jpg', 5, 5, 1, '2021-02-22'),
(54, '10-pF', 3, 'ตัวเก็บประจุขนาด 10pF ชนิดเซรามิค', '10-pF.jpg', 4, 4, 1, '2021-02-23'),
(55, '0.033/33-uF/nF', 3, 'ตัวเก็บประจุขนาด 3.3nf ชนิดเซรามิค', '33-uF.jpg', 7, 7, 1, '2021-02-24'),
(56, '0.022/22-uF/nF', 3, 'ตัวเก็บประจุขนาด 22nf ชนิดเซรามิค', '22-uF.jpg', 8, 8, 1, '2021-02-25'),
(57, '0.01-uF', 3, 'ตัวเก็บประจุขนาด 0.01uF ชนิดเซรามิค', '0.01-uF.jpg', 9, 9, 1, '2021-02-26'),
(58, '0.1-uF', 3, 'ตัวเก็บประจุขนาด 0.01uF ชนิดเซรามิค', '0.1-uF.jpg', 5, 5, 1, '2021-02-27'),
(59, '27-nF/100V', 3, 'ตัวเก็บประจุขนาด 27nF 100V ชนิดไมล่าร์', '27-nF.jpg', 6, 6, 1, '2021-02-28'),
(60, '56-nF/100V', 3, 'ตัวเก็บประจุขนาด 56nF 100V ชนิดไมล่าร์', '56-nF.jpg', 8, 8, 1, '2021-03-01'),
(61, '0.47-uF/100V', 3, 'ตัวเก็บประจุขนาด 0.47uF 100V ชนิดไมล่าร์', '0.47-uF mi.jpg', 5, 5, 1, '2021-03-02'),
(62, 'Capacitor AC  2uF', 3, 'ตัวเก็บประจุ 2uF  สำหรับ AC', 'Capacitor AC  2uF.jpg', 4, 4, 1, '2021-03-03'),
(63, 'Capacitor AC  4uF', 3, 'ตัวเก็บประจุ 4uF สำหรับ AC', 'Capacitor AC  4uF.jpg', 8, 8, 1, '2021-03-04'),
(64, 'Capacitor AC  6uF', 3, 'ตัวเก็บประจุ 6uF สำหรับ AC', 'Capacitor AC  6uF.jpg', 5, 5, 1, '2021-03-05'),
(65, 'Capacitor AC  8uF', 3, 'ตัวเก็บประจุ 8uF สำหรับ AC', 'Capacitor AC  8uF.jpg', 5, 5, 1, '2021-03-06'),
(66, '0.47-uF/50V', 3, 'ตัวเก็บประจุขนาด 0.47uF 50V ชนิดอิเล็กโตรไลต', '0.47-uF.jpg', 4, 4, 1, '2021-03-07'),
(67, '1-uF/50V', 3, 'ตัวเก็บประจุขนาด 1uF 50V ชนิดอิเล็กโตรไลต', '1-uF.jpg', 7, 7, 1, '2021-03-08'),
(68, '10-uF/50V', 3, 'ตัวเก็บประจุขนาด 107uF 50V ชนิดอิเล็กโตรไลต', '10-uF.jpg', 8, 8, 1, '2021-03-09'),
(69, '220-uF/63V', 3, 'ตัวเก็บประจุขนาด 220uF 63V ชนิดอิเล็กโตรไลต', '220-uF.jpg', 5, 5, 1, '2021-03-10'),
(70, '470-uF/25V', 3, 'ตัวเก็บประจุขนาด 470uF 25V ชนิดอิเล็กโตรไลต', '470-uF 25V.jpg', 8, 8, 1, '2021-03-11'),
(71, '470-uF/50V', 3, 'ตัวเก็บประจุขนาด 470uF 50V ชนิดอิเล็กโตรไลต', '470-uF 50V.jpg', 9, 9, 1, '2021-03-12'),
(72, '1.5-mH', 4, 'ตัวเหนี่ยวนำขนาด 1.5mH', '1.5-mH.jpg', 6, 6, 1, '2021-03-13'),
(73, '100-uH', 4, 'ตัวเหนี่ยวนำขนาด 100uH', '100-uH.jpg', 8, 8, 1, '2021-03-14'),
(74, '680-uH', 4, 'ตัวเหนี่ยวนำขนาด 680uH', '680-uH.jpg', 7, 7, 1, '2021-03-15'),
(75, 'DHT-11 ', 5, 'เซ็นเซอร์วัดอุณหภูมิความชื้นในอากาศ', 'DHT-11.jpg', 5, 5, 1, '2021-03-16'),
(76, 'Soil Moisture Sensor', 5, 'เซ็นเซอร์วัดความชื้นในดิน', 'Soil Moisture Sensor.jpg', 4, 4, 1, '2021-03-17'),
(77, 'LM35DZ Temperature Sensors', 5, 'เซ็นเซอร์วัดอุณหภูมิแบบ analog', 'LM35DZ Temperature Sensors.jpg', 2, 2, 1, '2021-03-18'),
(78, 'Raindrops Detection Sensor', 5, 'เซ็นเซอร์สำหรับตรวจสอบสภาพอากาศ, วัดความชื้นในอากาศและน้ำฝน', 'Raindrops Detection Sensor.jpg', 5, 5, 1, '2021-03-19'),
(79, 'TMP36GZ Temperature Sensors', 5, 'เซนเซอร์วัดอุณหภูมิให้สัญญาณออกมาเป็นแบบ analog', 'TMP36GZ Temperature Sensors.jpg', 6, 6, 1, '2021-03-20'),
(80, 'DHT22 ', 5, 'เซ็นเซอร์วัดอุณหภูมิและความชื้นในอากาศ', 'DHT22.jpg', 3, 3, 1, '2021-03-21'),
(81, 'DS18B20 TO92 1 Wire Temperature sensor', 5, 'เซนเซอร์วัดอุณหภูมิให้ค่าแบบดิจิทัล', 'DS18B20 TO92 1 Wire Temperature sensor.jpg', 2, 2, 1, '2021-03-22'),
(82, ' HY-SRF05 Ultrasonic Sensor Module', 5, 'โมดูลวัดระยะด้วยคลื่นอัลตร้าโซนิค ใช้การสื่อสารกับไมโครคอนโทรลเลอร์ผ่านการทริกสัญญาณ สามารถวัดระยะห่างได้ตั้งแต่ 2 เซ็นติเมตร ไปจนถึง 4 เมตร ', 'HY-SRF05 Ultrasonic Sensor Module.jpg', 5, 5, 1, '2021-03-23'),
(83, 'GP2Y0A21 Infrared Sensor', 5, 'ใช้ในการวัดระยะจากวัตถุ ที่อยู่ในทิศทางการวัด โดยใช้ Infrared เป็นสื่อในการวัด  โดยให้สัญญาณวัดเป็นแบบ Analog และให้ค่าวัดตลอดเวลา โดยมีย่านวัดที่ 10 - 80 ซม.', 'GP2Y0A21 Infrared Sensor.jpg', 5, 5, 1, '2021-03-24'),
(84, 'GP2Y0A41SK Infrared Sensor', 5, 'เซนเซอร์วัดระยะทางแบบอินฟาเรด Sharp GP2Y0A41SK วัดได้ระยะ 4-30cm ให้สัญญาณเป็นแบบ analog', 'GP2Y0A41SK Infrared Sensor.jpg', 2, 2, 1, '2021-03-25'),
(85, 'GP2Y0A02 Infrared Sensor', 5, 'ใช้ในการวัดระยะจากวัตถุ ที่อยู่ในทิศทางการวัด โดยใช้ Infrared เป็นสื่อในการวัด โดยให้สัญญาณวัดเป็นแบบ Analog และให้ค่าวัดตลอดเวลา โดยมีย่านวัดที่ 20 - 150 ซม.', 'GP2Y0A02 Infrared Sensor.jpg', 4, 4, 1, '2021-03-26'),
(86, 'GP2Y0A710K0F Infrared Sensor', 5, 'เซนเซอร์ วัดระยะทาง 100-550cm ให้เอาต์พุตออกมาเป็นแบบ Analog', 'GP2Y0A710K0F Infrared Sensor.jpg', 3, 3, 1, '2021-03-27'),
(87, 'DS3231 High Accuracy Real Time Clock Module Arduino', 5, 'โมดูลนาฬิกาตามจริงมีความแม่นยำสูง มีถ่าน CR2032 สามารถแสดงเวลาได้ถูกต้องแม้ไม่ได้ต่อไฟอยู่ตลอด', 'DS3231 High Accuracy Real Time Clock Module Arduino.jpg', 8, 8, 1, '2021-03-28'),
(88, 'MH-SR602 PIR MINI Motion Sensor Detector Module', 5, 'เซ็นเซอร์ตรวจจับความเคลื่อนไหวความไวสูง', 'MH-SR602 PIR MINI Motion Sensor Detector Module.jpg', 6, 6, 1, '2021-03-29'),
(89, '2-way angle tilt dumping sensor module', 5, 'เซ็นเซอร์วัดความเอียง/สั่น แบบ 2 ช่อง', '2-way angle tilt dumping sensor module.jpg', 3, 3, 1, '2021-03-30'),
(90, 'Camera Module', 5, 'โมดูลกล้องพร้อมชิฟ FIFO', 'Camera Module.jpg', 2, 2, 1, '2021-03-31'),
(91, 'Light Intensity Light Module', 5, 'เซ็นเซอร์วัดความเข้มแสง', 'Light Intensity Light Module.jpg', 3, 3, 1, '2021-04-01'),
(92, 'RGB Colour Sensor', 5, 'โมดูลตรวจสอบสีของวัตถุ โดยใช้แสงจาก LED สะท้อนไปที่วัตถุ และใช้ Chip TCS3200  เพื่อตรวจสอบสีทีสะท้อนกลับ  โดยให้ค่าเป็น RGB 0-256 มีไฟ Flash สำหรับตรวจจับสีวัตถุในที่มืด', 'RGB Colour Sensor.jpg', 4, 4, 1, '2021-04-02'),
(93, 'Active Buzzer Module 5V', 5, 'โมดูลเสียงบัซเซอร์ สามารถสร้างเสียงเตือนได้อย่างง่าย ๆ', 'Active Buzzer Module 5V.jpg', 5, 5, 1, '2021-04-03'),
(94, '4x3 Matrix Keypad Module', 5, 'สวิตช์ Keypad Matrix ขนาด 4x3', '4x3 Matrix Keypad Module.jpg', 4, 4, 1, '2021-04-04'),
(95, 'I2C Matrix 4x4 Keypad', 5, 'ปุ่มกดคีย์แพ็ดแบบ Martix พร้อมโมดูลขยายขาแบบ I2C', 'I2C Matrix 4x4 Keypad.jpg', 8, 8, 1, '2021-04-05'),
(96, 'โมดูลแปลงกระแสเป็นแรงดัน 4-20mA to 0-5V', 5, 'ใช้สำหรับ แปลงสัญญาณอินพุตกระแสไฟฟ้า 4-20mA หรือ 0-20mA ให้เป็นสัญญาณแรงดันไฟฟ้า 0-3.3V หรือ 0-5V หรือ 0-10V', '4-20mA to 0-5V.jpg', 4, 4, 1, '2021-04-06'),
(97, 'โมดูลแปลงความถี่เป็นโวลต์ frequency to voltage 0-1KHz to 0-10V ', 5, 'โมดูลแปลงความถี่ pwm 0-1Khz เป็นแรงดันไฟฟ้า 0-10V', 'frequency to voltage 0-1KHz to 0-10V.jpg', 5, 5, 1, '2021-04-07'),
(98, 'Raspberry Pi 3 Model B V1.2 1GB for ram', 6, 'บอร์ด Raspberry Pi 3 Model B จาก Raspberry Pi Foundation ใช้ซีพียู Broadcom BCM2837 64-bit Quad-Core ARM Cortex-A53 ARMv8 ความเร็ว 1.2 GHz มีหน่วยความจำ LPDDR 2 SDRAM ขนาด 1 GB ชิพ Broadcom BCM43438 เป็น Wi-Fi 802.11 b/g/n และ Bluetooth 4.1 (Classic and Low-Energy) พร้อมสายอากาศแบบ Chip Antenna บนบอร์ด ', 'Raspberry Pi 3 Model B V1.2 1GB for ram.jpg', 5, 5, 1, '2021-04-08'),
(99, '3.5 inch (320*480) TFT LCD with Touchscreen for Raspberry Pi', 6, 'บอร์ดจอภาพ LCD พร้อมระบบสัมผัสสำหรับ Raspberry Pi', 'TFT LCD with Touchscreen for Raspberry Pi.jpg', 4, 4, 1, '2021-04-09'),
(100, 'Raspberry Pi Zero W V1.1', 6, 'บอร์ดคอมพิวเตอร์ขนาดเล็กที่สามารถลงโปรแกรมได้', 'Raspberry Pi Zero W V1.1.jpg', 2, 2, 1, '2021-04-10'),
(101, 'Arduino DUE', 6, 'เป็นบอร์ดที่ใช้ชิป Atmel AT91SAM3X8E ที่อยู่ในตระกูล ARM Cortex-M3 ซึ่งแตกต่างจากบอร์ด Arduino อื่นๆ ที่ใช้ Micro-controller(ชิป) ตระกูล AVR ทำให้การประมวลผลของ Arduino Due เร็ว แต่ยังใช้รูปแบบโค้ดโปรแกรมของ Arduino', 'Arduino DUE.jpg', 3, 3, 1, '2021-04-11'),
(102, 'Arduino Leonardo', 6, 'บอร์ดไมโครคอนโทรลเลอร์ที่ใช้ชิป ATmega32u4 โดยมีช่องอินพุตและเอาต์พุตสำหรับข้อมูลดิจิตอล 20 ช่อง และ ช่องอินพุตสำหรับรับข้อมูลอนาล็อก 12 ช่อง มีความเร็วการทำงานของตัวไมโครคอนโทนเลอร์ที่ 16 MHz', 'Arduino Leonardo.jpg', 5, 5, 1, '2021-04-12'),
(103, 'Arduino MEGA 2560 R3', 6, 'บอร์ดไมโครคอนโทรลเลอร์ที่พัฒนาจาก ATmega2560 มี 54 digital input/output โดยมี 14 ขา สามารถใช้เป็น output แบบ PWM ได้ มี analog inputs 16 ขา มี UARTs(hardware serial ports) 4 ขา ทำงานที่ความถี่ 16 MHz สามารถเชื่อมต่อกับคอมพิวเตอร์ด้วยสายเคเบิล USB หรือใช้ adaptor AC-to-DC เพื่อเริ่มต้นใช้งาน และมีปุ่ม reset สามารถต่อเข้ากับ shields ที่ออกแบบเพื่อใช้งานกับ Arduino Duemilanove หรือ Diecimila', 'Arduino MEGA 2560 R3.jpg', 4, 4, 1, '2021-04-13'),
(104, 'Arduino UNO R3', 6, 'บอร์ดไมโครคอนโทรลเลอร์แบบ Open-source บนแพลตฟอร์ม Arduino ออกแบบมาให้ใช้งานได้ง่าย ใช้ชิพ ATmega328 รันที่ความถี่ 16 MHz หน่วยความจำแฟลช 32 KB แรม 2 KB บอร์ดใช้ไฟเลี้ยง 7 ถึง 12 V', 'Arduino UNO R3.jpg', 2, 2, 1, '2021-04-14'),
(105, 'ESP-32S NodeMCU', 6, 'โมดูล Wifi ESP-32 รุ่น ESP-WROOM-32 โมดูล Wifi + Bluetooth 4.2 + Touch/Temp Sensorทำงานแบบ Dual Core ที่ความเร็ว 160Mhz มี SRAM 512K หน่วยความจำ Flash สำหรับอัพโหลดโปรแกรมขนาด 16M มีขา GPIO 36 ขา ความละเอียดในการอ่านค่า ADC 12Bit  สามารถเขียนโปรแกรม ผ่าน Arduino IDE เหมือนเขียน Arduino ได้', 'ESP-32S NodeMCU.jpg', 4, 4, 1, '2021-04-15'),
(106, 'NodeMCU ESP8266 V2', 6, 'เป็นบอร์ดพัฒนาโปรแกรม ที่มีชิบ ESP8266 ในตัว ซึ่งช่วยให้บอร์ดนี้สามารถเชื่อมต่อไวไฟได้โดยที่ไม่ต้องติดโมดูลเพิ่มเติม บอร์ดตัวนี้ มีขนาดเล็กกว่า NodeMCU V3 โดยบอร์ดกว้าง 2.5CM สามารถปักเข้าบอร์ดทดลอง Breadboard 400 หรือ 720 รูได้ บอร์ดตัวนี้ ใช้ชิฟ USB เบอร์ CP2102 ในการติดต่อกับคอมพิวเตอร์เพื่อลงโปรแกรม สามารถลง Firmware NodeMCU และเขียนโปรแกรมด้วยภาษา Lau และ Arduino ได้', 'NodeMCU ESP8266 V2.jpg', 5, 5, 1, '2021-04-16'),
(107, 'MCS51RE2', 6, 'บอร์ดไมโครคอนโทรลเลอร์', 'MCS51RE2.jpg', 3, 3, 1, '2021-04-17'),
(108, 'LED Dot Matrix 8x8 1.9mm Red Color common cathode', 7, 'หลอดไฟเมทริกซ์ขนาด 8x8 ชนิดแคโทด ขนาด 1.9 มิลลิเมตร', 'LED Dot Matrix 8x8 1.9mm Red Color common cathode.jpg', 5, 5, 1, '2021-04-18'),
(109, 'LED Dot Matrix 8x8 3.75mm Red Color common cathode', 7, 'หลอดไฟเมทริกซ์ขนาด 8x8 ชนิดแคโทด ขนาด 3.75 มิลลิเมตร', 'LED Dot Matrix 8x8 3.75mm Red Color common cathode.jpg', 5, 5, 1, '2021-04-19'),
(110, 'LED Dot Matrix 8x8 3mm Red Color Common Anode', 7, 'หลอดไฟเมทริกซ์ขนาด 8x8 ชนิดแอโนด ขนาด 3 มิลลิเมตร', 'LED Dot Matrix 8x8 3mm Red Color Common Anode.jpg', 5, 5, 1, '2021-04-20'),
(111, 'LED Dot Matrix 8x8 3mm Red Color common cathode', 7, 'หลอดไฟเมทริกซ์ขนาด 8x8 ชนิดแคโทด ขนาด 3 มิลลิเมตร', 'LED Dot Matrix 8x8 3mm Red Color common cathode.jpg', 5, 5, 1, '2021-04-21'),
(112, 'LED Dot Matrix 8x8 5mm Red Color Common Anode', 7, 'หลอดไฟเมทริกซ์ขนาด 8x8 ชนิดแอโนด ขนาด 5 มิลลิเมตร', 'LED Dot Matrix 8x8 5mm Red Color Common Anode.jpg', 5, 5, 1, '2021-04-22'),
(113, 'หลอด LED-แดง', 7, 'หลอด LED ขนาด 5 mm สีแดง', 'หลอด LED-แดง.jpg', 20, 20, 1, '2021-04-23'),
(114, 'หลอด LED-เขียว', 7, 'หลอด LED ขนาด 5 mm สีเขียว', 'หลอด LED-เขียว.jpg', 20, 20, 1, '2021-04-24'),
(115, '7 Segment-1 หลัก', 7, 'โมดูลหน้าจอแสดงผลตัวเลข 1 หลัก', '7 Segment-1 หลัก.jpg', 10, 10, 1, '2021-04-25'),
(116, '7 Segment-2 หลัก', 7, 'โมดูลหน้าจอแสดงผลตัวเลข 2 หลัก', '7 Segment-2 หลัก.jpg', 12, 12, 1, '2021-04-26'),
(117, '7 Segment-3 หลัก', 7, 'โมดูลหน้าจอแสดงผลตัวเลข 3 หลัก', '7 Segment-3 หลัก.jpg', 13, 13, 1, '2021-04-27'),
(118, '7 Segment-4 หลัก', 7, 'โมดูลหน้าจอแสดงผลตัวเลข 4 หลัก', '7 Segment-4 หลัก.jpg', 14, 14, 1, '2021-04-28'),
(119, 'Switch 7 Segment', 7, 'บอร์ดแสดงผลตัวเลข 8 หลักพร้อม LED และปุ่มกด', 'Switch 7 Segment.jpg', 25, 25, 1, '2021-04-29'),
(120, '0802 LCD (Blue Screen)', 8, 'จอ LCD ขนาด 8 ตัวอักษร 2 บรรทัด สีน้ำเงิน', '0802 LCD (Blue Screen).jpg', 5, 5, 1, '2021-04-30'),
(121, '0802 LCD (Yellow Screen)', 8, 'จอ LCD ขนาด 8 ตัวอักษร 2 บรรทัด สีเหลือง', '0802 LCD (Yellow Screen).jpg', 4, 4, 1, '2021-05-01'),
(122, '1602 LCD (Blue Screen)', 8, 'จอ LCD สีน้ำเงิน ขนาด 16 ตัวอักษร 2 บรรทัด', '1602 LCD (Blue Screen).jpg', 6, 6, 1, '2021-05-02'),
(123, '1602 LCD (Yellow Screen)', 8, 'จอ LCD สีเหลือง ขนาด 16 ตัวอักษร 2 บรรทัด', '1602 LCD (Yellow Screen).jpg', 2, 2, 1, '2021-05-03'),
(124, '1602 LCD Acrylic housing shell', 8, 'จอ LCD ขนาด 16 ตัวอักษร 2 บรรทัด มีที่ตั้งอะคริลิก', '1602 LCD Acrylic housing shell.jpg', 4, 4, 1, '2021-05-04'),
(125, '2004 LCD (Blue Screen)', 8, 'จอ LCD สีน้ำเงิน ขนาด 20 ตัวอักษร 4 แถว', '2004 LCD (Blue Screen).jpg', 5, 5, 1, '2021-05-05'),
(126, '2004 LCD (Yellow Screen)', 8, 'จอ LCD สีเหลือง ขนาด 20 ตัวอักษร 4 แถว', '2004 LCD (Yellow Screen).jpg', 2, 2, 1, '2021-05-06'),
(127, 'LCD 128x64 Dots Graphic Blue Color', 8, 'จอแสดงผล LCD สีน้ำเงิน ขนาด 128 x 64 ตัวอักษร', 'LCD 128x64 Dots Graphic Blue Color.jpg', 4, 4, 1, '2021-05-07'),
(128, 'LCD 128x64 Dots Graphic Yellow Color', 8, 'จอแสดงผล LCD สีเหลือง ขนาด 128 x 64 ตัวอักษร', 'LCD 128x64 Dots Graphic Yellow Color.jpg', 5, 5, 1, '2021-05-08'),
(129, 'LCD 1604 Module(Blue Screen)', 8, 'จอแสดงผล LCD สีน้ำเงิน ขนาด 16x4 ตัวอักษร', 'LCD 1604 Module(Blue Screen).jpg', 3, 3, 1, '2021-05-09'),
(130, 'LCD 1604 Module(Yellow Screen)', 8, 'จอแสดงผล LCD สีเหลือง ขนาด 16x4 ตัวอักษร', 'LCD 1604 Module(Yellow Screen).jpg', 2, 2, 1, '2021-05-10'),
(131, 'เครื่องกำเนิดสัญญาณฟังก์ชั่น(Function Generator)', 9, 'เครื่องกำเนิดที่สามารถผลิตสัญญาณออกมาได้หลายรูปแบบให้เลือก ตามลักษณะการใช้งาน', 'Function Generator.jpg', 3, 3, 1, '2021-05-11'),
(132, 'เครื่องจ่ายไฟ DC 0-30 V/3 A ', 9, 'เป็นเครื่องจ่ายแรงดันไฟฟ้ากระแสตรงปรับค่าได้0-30 V /3 A ชนิดคู่และมีวงจรป้องกันการลัดวงจรที่เอาท์พุท', 'เครื่องจ่ายไฟ DC 0-30 V.jpg', 2, 2, 1, '2021-05-12'),
(133, 'เครื่องจ่ายไฟ DC 0-50 V/5 A ', 9, 'เป็นเครื่องจ่ายแรงดันไฟฟ้ากระแสตรงปรับค่าได้0-50 V /5 A ชนิดคู่และมีวงจรป้องกันการลัดวงจรที่เอาท์พุท', 'เครื่องจ่ายไฟ DC 0-50 V.jpg', 3, 3, 1, '2021-05-13'),
(134, 'เครื่องจ่ายไฟ ดีซีคงที่+5V, +12V, + 15V/3A', 9, 'เป็นเครื่องจ่ายไฟตรง +5V, +12V, +15V จ่ายกระแสไม่น้อยกว่า 3 A และมีวงจรป้องกันการลัดวงจรที่เอาท์พุท', 'เครื่องจ่ายไฟ ดีซีคงที่.jpg', 3, 3, 1, '2021-05-14'),
(135, 'หัวแร้งบัดกรี', 9, 'หัวแร้งใช้บัดกีแบบเซรามิก ไม่สามารถปรับระดับความร้อนได้', 'หัวแร้งบัดกรี.jpg', 6, 6, 1, '2021-05-15'),
(136, 'หัวแร้งบัดกรี พร้อมปุ่มปรับระดับความร้อน', 9, 'หัวแร้งใช้บัดกีแบบเซรามิก สามารถปรับระดับความร้อนได้', 'หัวแร้งบัดกรี พร้อมปุ่มปรับระดับความร้อน.jpg', 6, 6, 1, '2021-05-16'),
(137, 'หัวแร้งบัดกรีด้ามปืน', 9, 'หัวแร้งใช้บัดกี มีที่จับแบบด้ามปืนเร่งความร้อนได้', 'หัวแร้งบัดกรีด้ามปืน.jpg', 5, 5, 1, '2021-05-17'),
(138, 'เครื่องดูดตะกั่วไฟฟ้า', 9, 'ใช้ดูดตะกั่วบัดกีที่ต้องการแก้ไข แบบใช้ไฟฟ้า', 'เครื่องดูดตะกั่วไฟฟ้า.jpg', 7, 7, 1, '2021-05-18'),
(139, 'กระบอกดูดตะกั่ว Desoldering Pump DP-366D', 9, ' ใช้ดูดตะกั่วบัดกีที่ต้องการแก้ไข ไม่ต้องใช้ไฟฟ้า', 'Desoldering Pump DP-366D.jpg', 6, 6, 1, '2021-05-19'),
(140, 'Breadboard Protoboard Test Circuit Board Tie-point 1660 ZY-204', 9, 'บอร์ดทดลองวงจรขนาด 830 จุด ประกบติดกันสองมีหัวรับแรงดันจากแหล่างจ่ายภายนอก 3 หัว ', 'Breadboard Protoboard Test Circuit Board Tie-point 1660 ZY-204.jpg', 9, 9, 1, '2021-05-20'),
(141, 'Breadboard 840 Point GL-12', 9, 'บอร์ดทดลองวงจรขนาด 840 จุด ', 'Breadboard 840 Point GL-12.jpg', 9, 9, 1, '2021-05-21'),
(142, 'Digital Multimeter A830L', 9, 'สามารถวัดแรงดันไฟฟ้า AC/DC,DC current,Resistance', 'Digital Multimeter A830L.jpg', 9, 9, 1, '2021-05-22'),
(143, 'คีมปอกสายไฟ', 9, 'ใช้ปอกสายไฟ', 'คีมปอกสายไฟ.jpg', 8, 8, 1, '2021-05-23'),
(144, 'ปากกาเช็คไฟ', 9, 'เครื่องทดสอบแรงดันไฟฟ้าแบบไม่สัมผัสสำหรับ AC เมื่อปลายหัวแหวนสีแดงและหน่วยดังคือมีแรงดันไฟฟ้าอยู่ ', 'ปากกาเช็คไฟ.jpg', 7, 7, 1, '2021-05-24'),
(145, 'UT200A UNI-T Digital Multimeter Clamp Meter ', 9, 'สามารถใช้วัดแรงดันไฟ AC และ DC, กระแสไฟ AC, ความต้านทาน, Diode', 'UT200A UNI-T Digital Multimeter Clamp Meter.jpg', 4, 4, 1, '2021-05-25'),
(146, 'Digital Vernier caliper 0-150mm', 9, 'เครื่องมือวัดไมโครมิเตอร์แบบมี LCD อ่านค่า', 'Digital Vernier caliper 0-150mm.jpg', 5, 5, 1, '2021-05-26'),
(147, 'analog multimeter', 9, 'สามารถวัดแรงดันไฟฟ้า AC/DC,DC current,Resistance ', 'analog multimeter.jpg', 4, 4, 1, '2021-05-27'),
(148, 'วัตต์มิเตอร์แบบ 3 เฟส', 9, 'เครื่องมือวัดวัตต์ไฟฟ้า', 'วัตต์มิเตอร์แบบ 3 เฟส.jpg', 1, 1, 1, '2021-05-28'),
(149, 'RLC Digital Bridge Meter', 9, 'ทำหน้าที่วัดหาค่าของอุปกรณ์จำพวกตัวต้านทาน ตัวเหนี่ยวนำและตัวเก็บประจุ', 'RLC Digital Bridge Meter.jpg', 2, 2, 1, '2021-05-29'),
(150, 'Hantek DSO5102P ออสซิลโลสโคปขนาด 100 MHz 2 ช่อง', 9, 'เครื่องมือวัดสัญญาณไฟฟ้า แสดงผลออกมาเป็นกราฟ', 'Hantek DSO5102P ออสซิลโลสโคปขนาด 100 MHz 2 ช่อง.jpg', 5, 5, 1, '2021-05-30'),
(151, 'Digital Thermometer ', 9, 'เครื่องวัดอุณหภูมิแบบดิจิตอล', 'Digital Thermometer.jpg', 8, 8, 1, '2021-05-31'),
(152, 'Connector-2 ขา', 10, 'ใช้ในการเชื่อมต่อวงจรโดยมี 2 pin', 'Connector-2 ขา.jpg', 12, 12, 1, '2021-06-01'),
(153, 'Connector-3 ขา', 10, 'ใช้ในการเชื่อมต่อวงจรโดยมี 3 pin', 'Connector-3 ขา.jpg', 15, 15, 1, '2021-06-02'),
(154, 'สายโพรบ-50M Hz-1 GSa/s', 10, 'สายเคเบิ้ลเชื่อมต่อสำหรับ ออสซิโลสโคป', 'สายโพรบ-50M.jpg', 10, 10, 1, '2021-06-03'),
(155, 'Switch DC -2ขา', 10, 'สวิตช์เปิดปิด 2 pin', 'Switch DC-2ขา.jpg', 25, 25, 1, '2021-06-04'),
(156, 'Switch DC -6ขา', 10, 'สวิตช์เปิดปิด 6 pin', 'Switch DC-6ขา.jpg', 25, 25, 1, '2021-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_eq_borrow`
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
-- Dumping data for table `tb_eq_borrow`
--

INSERT INTO `tb_eq_borrow` (`id`, `borrow_id`, `s_user`, `eq_id`, `eq_number`, `FromDate`, `ToDate`, `Descriptions`, `Status`, `DateTime`) VALUES
(7, 94631, '09610555', 1, 10, '2022-02-21', '2022-02-21', 'งานโครงงานวิศกรรมไฟฟ้า', 3, '2022-02-21'),
(8, 94631, '09610555', 2, 6, '2022-02-21', '2022-02-21', 'งานโครงงานวิศกรรมไฟฟ้า', 3, '2022-02-21'),
(9, 5427, '09610555', 3, 8, '2022-02-22', '2022-02-23', 'งานวิจัย', 6, '2022-02-21'),
(10, 76213, '09610555', 4, 4, '2022-03-01', '2022-02-06', 'อื่นๆ', 1, '2022-02-21'),
(11, 76213, '09610555', 5, 5, '2022-03-01', '2022-02-06', 'อื่นๆ', 1, '2022-02-21'),
(12, 76213, '09610555', 6, 7, '2022-03-01', '2022-02-06', 'อื่นๆ', 1, '2022-02-21'),
(13, 78244, '09610555', 7, 6, '2022-02-25', '2022-02-26', 'งานโครงงานวิศกรรมไฟฟ้า', 1, '2022-02-25'),
(14, 78244, '09610555', 8, 1, '2022-02-25', '2022-02-26', 'งานโครงงานวิศกรรมไฟฟ้า', 1, '2022-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_eq_type`
--

CREATE TABLE `tb_eq_type` (
  `eq_typeid` int(11) NOT NULL,
  `eq_typename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_eq_type`
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
-- Table structure for table `tb_professor`
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
-- Dumping data for table `tb_professor`
--

INSERT INTO `tb_professor` (`p_id`, `p_user`, `p_password`, `p_firstname`, `p_lastname`, `p_email`, `created_at`) VALUES
(1, 'p1', 'ec6ef230f1828039ee794566b9c58adc', 'อรทัย', 'วัชรกฤชกรณ์', 'pradutong_g@silpakorn.edu', '2022-02-04 13:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `tb_student`
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
-- Dumping data for table `tb_student`
--

INSERT INTO `tb_student` (`s_id`, `s_user`, `s_password`, `s_firstname`, `s_lastname`, `s_email`, `s_phone`, `s_image`, `p_id`, `created_at`, `s_status`) VALUES
(1, '09610555', 'b7c09f613afcc1f88dd2e839af95cfdf', 'student', 'dekdee', 'pradutong_g@silpakorn.edu', '0611111111', '792852598.jpg', 1, '2022-02-04 13:47:41', 1);

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
  MODIFY `eq_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `tb_eq_borrow`
--
ALTER TABLE `tb_eq_borrow`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_professor`
--
ALTER TABLE `tb_professor`
  MODIFY `p_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_student`
--
ALTER TABLE `tb_student`
  MODIFY `s_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
