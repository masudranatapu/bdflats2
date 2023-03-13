-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 05:57 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdflats2`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_customer_payments`
--

CREATE TABLE `acc_customer_payments` (
  `id` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `f_customer_no` int(11) DEFAULT NULL,
  `customer_no` int(11) DEFAULT NULL,
  `customer_name` varchar(200) DEFAULT NULL,
  `amount` float DEFAULT 0,
  `f_acc_payment_bank_no` int(10) DEFAULT NULL,
  `payment_bank_name` varchar(40) DEFAULT NULL,
  `payment_account_name` varchar(40) DEFAULT NULL,
  `payment_bank_acc_no` varchar(40) DEFAULT NULL,
  `payment_confirmed_status` int(11) DEFAULT NULL,
  `attachment_path` varchar(200) DEFAULT NULL,
  `payment_note` varchar(200) DEFAULT NULL,
  `slip_number` varchar(40) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `is_active` int(1) DEFAULT 1,
  `is_cod` int(1) DEFAULT 0,
  `f_ss_created_by` int(4) DEFAULT NULL,
  `ss_created_on` datetime DEFAULT NULL,
  `f_ss_modified_by` int(4) DEFAULT NULL,
  `ss_modified_on` datetime DEFAULT NULL,
  `f_ss_company_no` int(4) DEFAULT NULL,
  `payment_type` int(11) NOT NULL DEFAULT 1 COMMENT '1 = customer payment, 2 = bonus payment by bdflat'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `acc_customer_payments`
--

INSERT INTO `acc_customer_payments` (`id`, `code`, `f_customer_no`, `customer_no`, `customer_name`, `amount`, `f_acc_payment_bank_no`, `payment_bank_name`, `payment_account_name`, `payment_bank_acc_no`, `payment_confirmed_status`, `attachment_path`, `payment_note`, `slip_number`, `payment_date`, `is_active`, `is_cod`, `f_ss_created_by`, `ss_created_on`, `f_ss_modified_by`, `ss_modified_on`, `f_ss_company_no`, `payment_type`) VALUES
(30, 1001, 66, 1053, 'Monowar Hossain Khan', 10, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, 'Registration Bonus', NULL, '2021-09-14', 1, 0, NULL, '2021-09-14 23:05:40', NULL, '2021-09-14 23:05:40', NULL, 2),
(31, 1002, 65, 1052, 'RUMANA PROPERTIES LTD', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 00:04:17', NULL, '2021-09-16 00:04:17', NULL, 2),
(32, 1003, 64, 1051, 'Harun Or Rashid', 100, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 01:08:38', NULL, '2021-09-16 01:08:38', NULL, 2),
(33, 1004, 64, 1051, 'Harun Or Rashid', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 01:12:15', NULL, '2021-09-16 01:12:15', NULL, 2),
(34, 1005, 63, 1050, 'Nazmul Rahman', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 01:19:10', NULL, '2021-09-16 01:19:10', NULL, 2),
(35, 1006, 62, 1049, 'Salim Hassan', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 01:35:07', NULL, '2021-09-16 01:35:07', NULL, 2),
(36, 1007, 61, 1048, 'asif aftab', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 01:38:29', NULL, '2021-09-16 01:38:29', NULL, 2),
(37, 1008, 60, 1047, 'Sahera Khatun', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 01:39:53', NULL, '2021-09-16 01:39:53', NULL, 2),
(38, 1009, 59, 1046, 'Mahamudul Hasan Nayem', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 01:45:54', NULL, '2021-09-16 01:45:54', NULL, 2),
(39, 1010, 58, 1045, 'Munia Aman', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 01:47:09', NULL, '2021-09-16 01:47:09', NULL, 2),
(40, 1011, 57, 1044, 'Md Shah Jahan Chowdhury', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 01:48:34', NULL, '2021-09-16 01:48:34', NULL, 2),
(41, 1012, 56, 1043, 'SMART PROPERTIES LTD.', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 01:49:11', NULL, '2021-09-16 01:49:11', NULL, 2),
(42, 1013, 55, 1042, 'MERLIN BUILDER\'S', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 01:52:28', NULL, '2021-09-16 01:52:28', NULL, 2),
(43, 1014, 54, 1041, 'Ali', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 01:55:34', NULL, '2021-09-16 01:55:34', NULL, 2),
(44, 1015, 50, 1037, 'MOHAMMAD MOMINUR RAHMAN', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 01:57:00', NULL, '2021-09-16 01:57:00', NULL, 2),
(45, 1016, 53, 1040, 'S.Rahman', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 01:57:46', NULL, '2021-09-16 01:57:46', NULL, 2),
(46, 1017, 52, 1039, 'Md Mojibur Rahman Tuhin', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 02:08:14', NULL, '2021-09-16 02:08:14', NULL, 2),
(47, 1018, 51, 1038, 'Imran Hossain Imon', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 02:10:09', NULL, '2021-09-16 02:10:09', NULL, 2),
(48, 1019, 49, 1036, 'Sheikh Rasel', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 02:11:36', NULL, '2021-09-16 02:11:36', NULL, 2),
(49, 1020, 48, 1035, 'Imtiaz Ahmed', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 02:12:46', NULL, '2021-09-16 02:12:46', NULL, 2),
(50, 1021, 47, 1034, 'Saif Sajjad khan', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 02:13:57', NULL, '2021-09-16 02:13:57', NULL, 2),
(51, 1022, 46, 1033, 'Mamunur Rashid', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 02:14:50', NULL, '2021-09-16 02:14:50', NULL, 2),
(52, 1023, 45, 1032, 'Multicom Industrial Solution', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 02:15:37', NULL, '2021-09-16 02:15:37', NULL, 2),
(53, 1024, 40, 1027, 'M.S. Rana', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 02:19:29', NULL, '2021-09-16 02:19:29', NULL, 2),
(54, 1025, 39, 1026, 'Dr. Fazle Rabbi', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 02:20:41', NULL, '2021-09-16 02:20:41', NULL, 2),
(55, 1026, 38, 1025, 'kazi salimuddin', 100, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 02:22:24', NULL, '2021-09-16 02:22:24', NULL, 2),
(56, 1027, 37, 1024, 'Md. Abu Zahid', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 02:23:17', NULL, '2021-09-16 02:23:17', NULL, 2),
(57, 1028, 36, 1023, 'Md. Riazul Islam', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 21:30:02', NULL, '2021-09-16 21:30:02', NULL, 2),
(58, 1029, 35, 1022, 'Rayyan Properties', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 21:34:27', NULL, '2021-09-16 21:34:27', NULL, 2),
(59, 1030, 34, 1021, 'Md. Nurul Islam', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 21:38:17', NULL, '2021-09-16 21:38:17', NULL, 2),
(60, 1031, 33, 1020, 'Kh Nazmul', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 21:39:24', NULL, '2021-09-16 21:39:24', NULL, 2),
(61, 1032, 32, 1019, 'Minhaz', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 21:55:07', NULL, '2021-09-16 21:55:07', NULL, 2),
(62, 1033, 31, 1018, 'Effat Ara', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 21:57:15', NULL, '2021-09-16 21:57:15', NULL, 2),
(63, 1034, 30, 1017, 'Shah', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 22:00:03', NULL, '2021-09-16 22:00:03', NULL, 2),
(64, 1035, 29, 1016, 'anur mia', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 22:01:23', NULL, '2021-09-16 22:01:23', NULL, 2),
(65, 1036, 28, 1015, 'ismail munna', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 22:03:08', NULL, '2021-09-16 22:03:08', NULL, 2),
(66, 1037, 27, 1014, 'Richmond Developers Ltd.', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 22:05:21', NULL, '2021-09-16 22:05:21', NULL, 2),
(67, 1038, 26, 1013, 'Dhanshiri Residence', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 22:08:10', NULL, '2021-09-16 22:08:10', NULL, 2),
(68, 1039, 25, 1012, 'Purbachal Marine City', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 22:18:03', NULL, '2021-09-16 22:18:03', NULL, 2),
(69, 1040, 24, 1011, 'RAYYAN PROPERTIES', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 22:20:08', NULL, '2021-09-16 22:20:08', NULL, 2),
(70, 1041, 23, 1010, 'Rafiqul Islam Ratul', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 22:22:44', NULL, '2021-09-16 22:22:44', NULL, 2),
(71, 1042, 22, 1009, 'LUCKY ENGINEERING LIMITED', 100, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 22:23:34', NULL, '2021-09-16 22:23:34', NULL, 2),
(72, 1043, 22, 1009, 'LUCKY ENGINEERING LIMITED', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 22:26:28', NULL, '2021-09-16 22:26:28', NULL, 2),
(73, 1044, 21, 1008, 'IMAGINE PROPERTIES LTD.', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 22:31:28', NULL, '2021-09-16 22:31:28', NULL, 2),
(74, 1045, 13, 1000, 'maidul1', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 22:34:34', NULL, '2021-09-16 22:34:34', NULL, 2),
(75, 1046, 13, 1000, 'maidul1', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 22:35:09', NULL, '2021-09-16 22:35:09', NULL, 2),
(76, 1047, 16, 1003, 'Monowar Hossain Khan', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 22:37:04', NULL, '2021-09-16 22:37:04', NULL, 2),
(77, 1048, 15, 1002, 'Maidul Islam Babu', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 22:52:15', NULL, '2021-09-16 22:52:15', NULL, 2),
(78, 1049, 15, 1002, 'Maidul Islam Babu', 1000, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, NULL, NULL, '2016-09-20', 1, 0, 2, '2021-09-16 22:52:54', NULL, '2021-09-16 22:52:54', NULL, 2),
(79, 1050, 96, 1083, 'Kamal', 100, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, 'Registration Bonus', NULL, '2021-09-22', 1, 0, NULL, '2021-09-22 21:53:56', NULL, '2021-09-22 21:53:56', NULL, 2),
(80, 1051, 14, 1001, 'Maidul Islam Babu', 500, 1, 'SSL', 'SSL', '101', 1, NULL, 'VISA-Dutch Bangla', '614cac8edd968', '2021-09-23', 1, 0, 14, '2021-09-23 22:35:22', NULL, '2021-09-23 22:35:22', NULL, 1),
(81, 1052, 14, 1001, 'Maidul Islam Babu', 50, 5, 'Bkash', 'Bkash 1', '01918993427', NULL, NULL, NULL, '124555', '2021-09-22', 1, 0, 2, '2021-09-30 00:02:35', NULL, NULL, NULL, 1),
(82, 1053, 97, 1084, 'Rony', 100, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, 'Registration Bonus', NULL, '2021-10-10', 1, 0, NULL, '2021-10-10 12:49:01', NULL, '2021-10-10 12:49:01', NULL, 2),
(83, 1054, 97, 1084, 'Rony', 10, 1, 'SSL', 'SSL', '101', 1, NULL, 'BKASH-BKash', '6162a17ea2bb1', '2021-10-10', 1, 0, 97, '2021-10-10 14:17:16', NULL, '2021-10-10 14:17:16', NULL, 1),
(84, 1055, 98, 1085, 'Kamrul', 100, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, 'Registration Bonus', NULL, '2021-10-10', 1, 0, NULL, '2021-10-10 14:20:39', NULL, '2021-10-10 14:20:39', NULL, 2),
(85, 1056, 99, 1086, 'tset', 500, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, 'Registration Bonus', NULL, '2021-10-10', 1, 0, NULL, '2021-10-10 15:53:37', NULL, '2021-10-10 15:53:37', NULL, 2),
(86, 1057, 100, 1085, 'kamrul', 100, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, 'Registration Bonus', NULL, '2021-10-10', 1, 0, NULL, '2021-10-10 15:55:09', NULL, '2021-10-10 15:55:09', NULL, 2),
(87, 1058, 101, 1085, 'Kamrul', 500, 4, 'Bonus', 'BDF Bnous', 'BDF Bnous', 1, NULL, 'Registration Bonus', NULL, '2021-10-10', 1, 0, NULL, '2021-10-10 15:55:55', NULL, '2021-10-10 15:55:55', NULL, 2),
(90, 1059, 146, 1130, 'Suh', 10, 5, 'Bkash', 'Bkash 1', '01918993427', 1, NULL, NULL, '12222', '2023-03-06', 1, 0, 1, '2023-03-06 12:49:45', NULL, '2023-03-06 12:49:45', NULL, 1),
(91, 1060, 148, 1132, 'RAK', 100, 5, 'Bkash', 'Bkash 1', '01918993427', 1, NULL, NULL, NULL, '2023-03-07', 1, 0, 1, '2023-03-07 06:12:53', NULL, '2023-03-07 06:12:53', NULL, 1);

--
-- Triggers `acc_customer_payments`
--
DELIMITER $$
CREATE TRIGGER `aftert_acc_customer_payments_insert` AFTER INSERT ON `acc_customer_payments` FOR EACH ROW begin

declare var_code int(10) default null;
declare var_amount float default 0;
declare var_balance_actual float default 0;

select ifnull(max(code),1000) into var_code from acc_customer_transaction;

set var_code = var_code+1;

select ifnull(sum(amount),0) into var_amount from acc_customer_payments where f_customer_no = new.f_customer_no;

update users set actual_topup = var_amount where id = new.f_customer_no;

insert into acc_customer_transaction 
(code, f_customer_no, f_customer_payment_no, amount, transaction_date, transaction_type, in_out, f_ss_created_by, ss_created_on, f_ss_modified_by, ss_modified_on) 
values (var_code, new.f_customer_no, new.id, new.amount, new.payment_date, '1', '1', new.f_ss_created_by, now(), new.f_ss_modified_by, now());

select sum(amount) into var_balance_actual from acc_customer_payments where f_acc_payment_bank_no = new.f_acc_payment_bank_no;
update acc_payment_bank_acc set balance_actual = var_balance_actual where id = new.f_acc_payment_bank_no;

end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_acc_customer_payments_insert` BEFORE INSERT ON `acc_customer_payments` FOR EACH ROW begin



declare var_code int(10) default null;
declare var_customer_no varchar(40) default null;
declare var_customer_name varchar(40) default null;
declare var_payment_bank_name varchar(40) default null;
declare var_payment_account_name varchar(40) default null;
declare var_payment_bank_acc_no varchar(40) default null;

select code, name into var_customer_no, var_customer_name from users where id = new.f_customer_no;
select bank_name,bank_acc_name,bank_acc_no into var_payment_bank_name,var_payment_account_name,var_payment_bank_acc_no from acc_payment_bank_acc where id = new.f_acc_payment_bank_no;

select ifnull(max(code),1000) into var_code from acc_customer_payments;

set new.code = var_code+1;
set new.customer_no = var_customer_no;
set new.customer_name = var_customer_name;
set new.payment_bank_name = var_payment_bank_name;
set new.payment_account_name = var_payment_account_name;
set new.payment_bank_acc_no = var_payment_bank_acc_no;


end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `acc_customer_transaction`
--

CREATE TABLE `acc_customer_transaction` (
  `id` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `f_customer_no` int(11) DEFAULT NULL,
  `f_customer_payment_no` int(11) DEFAULT NULL,
  `f_listing_payment_no` int(11) DEFAULT NULL,
  `f_listing_lead_payment_no` int(11) DEFAULT NULL,
  `f_listing_no_for_comm` int(11) DEFAULT NULL COMMENT 'listing for commisiion',
  `f_lead_payment_no` int(11) DEFAULT NULL,
  `amount` float DEFAULT 0,
  `transaction_date` date DEFAULT NULL,
  `transaction_type` int(11) NOT NULL DEFAULT 1 COMMENT '1 = recharge,2 = property payment, 3 = listing lead purchase payment, 4=agent commisiion,5=lead purchase payment',
  `in_out` int(1) NOT NULL DEFAULT 1 COMMENT '1 = in, 2 = out payment by bdflat',
  `f_ss_created_by` int(4) DEFAULT NULL,
  `ss_created_on` datetime DEFAULT NULL,
  `f_ss_modified_by` int(4) DEFAULT NULL,
  `ss_modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `acc_customer_transaction`
--

INSERT INTO `acc_customer_transaction` (`id`, `code`, `f_customer_no`, `f_customer_payment_no`, `f_listing_payment_no`, `f_listing_lead_payment_no`, `f_listing_no_for_comm`, `f_lead_payment_no`, `amount`, `transaction_date`, `transaction_type`, `in_out`, `f_ss_created_by`, `ss_created_on`, `f_ss_modified_by`, `ss_modified_on`) VALUES
(22, 1001, 66, 30, NULL, NULL, 0, NULL, 10, '2021-09-14', 1, 1, NULL, '2021-09-14 23:05:40', NULL, '2021-09-14 23:05:40'),
(23, 1002, 65, 31, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 00:04:17', NULL, '2021-09-16 00:04:17'),
(24, 1003, 65, NULL, 5, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 00:13:02', NULL, '2021-09-16 00:13:02'),
(25, 1004, 65, NULL, 6, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 01:08:20', NULL, '2021-09-16 01:08:20'),
(26, 1005, 64, 32, NULL, NULL, 0, NULL, 100, '2016-09-20', 1, 1, 2, '2021-09-16 01:08:38', NULL, '2021-09-16 01:08:38'),
(27, 1006, 64, NULL, 7, NULL, 0, NULL, -50, '2021-09-16', 2, 2, 2, '2021-09-16 01:09:26', NULL, '2021-09-16 01:09:26'),
(28, 1007, 64, NULL, 8, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 01:11:59', NULL, '2021-09-16 01:11:59'),
(29, 1008, 64, 33, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 01:12:15', NULL, '2021-09-16 01:12:15'),
(30, 1009, 64, NULL, 9, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 01:13:06', NULL, '2021-09-16 01:13:06'),
(31, 1010, 64, NULL, 10, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 01:14:58', NULL, '2021-09-16 01:14:58'),
(32, 1011, 64, NULL, 11, NULL, 0, NULL, -100, '2021-09-16', 2, 2, 2, '2021-09-16 01:15:34', NULL, '2021-09-16 01:15:34'),
(33, 1012, 64, NULL, 12, NULL, 0, NULL, -70, '2021-09-16', 2, 2, 2, '2021-09-16 01:16:14', NULL, '2021-09-16 01:16:14'),
(34, 1013, 64, NULL, 13, NULL, 0, NULL, -50, '2021-09-16', 2, 2, 2, '2021-09-16 01:16:53', NULL, '2021-09-16 01:16:53'),
(35, 1014, 64, NULL, 14, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 01:17:55', NULL, '2021-09-16 01:17:55'),
(36, 1015, 64, NULL, 15, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 01:18:51', NULL, '2021-09-16 01:18:51'),
(37, 1016, 63, 34, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 01:19:10', NULL, '2021-09-16 01:19:10'),
(38, 1017, 63, NULL, 16, NULL, 0, NULL, -70, '2021-09-16', 2, 2, 2, '2021-09-16 01:20:17', NULL, '2021-09-16 01:20:17'),
(39, 1018, 63, NULL, 17, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 01:21:26', NULL, '2021-09-16 01:21:26'),
(40, 1019, 63, NULL, 18, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 01:22:29', NULL, '2021-09-16 01:22:29'),
(41, 1020, 63, NULL, 19, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 01:23:08', NULL, '2021-09-16 01:23:08'),
(42, 1021, 62, 35, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 01:35:07', NULL, '2021-09-16 01:35:07'),
(43, 1022, 62, NULL, 20, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 01:37:41', NULL, '2021-09-16 01:37:41'),
(44, 1023, 61, 36, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 01:38:29', NULL, '2021-09-16 01:38:29'),
(45, 1024, 61, NULL, 21, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 01:39:30', NULL, '2021-09-16 01:39:30'),
(46, 1025, 60, 37, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 01:39:53', NULL, '2021-09-16 01:39:53'),
(47, 1026, 60, NULL, 22, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 01:40:29', NULL, '2021-09-16 01:40:29'),
(48, 1027, 59, 38, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 01:45:54', NULL, '2021-09-16 01:45:54'),
(49, 1028, 59, NULL, 23, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 01:46:24', NULL, '2021-09-16 01:46:24'),
(50, 1029, 58, 39, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 01:47:09', NULL, '2021-09-16 01:47:09'),
(51, 1030, 58, NULL, 24, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 01:47:49', NULL, '2021-09-16 01:47:49'),
(52, 1031, 57, 40, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 01:48:34', NULL, '2021-09-16 01:48:34'),
(53, 1032, 57, NULL, 25, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 01:48:57', NULL, '2021-09-16 01:48:57'),
(54, 1033, 56, 41, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 01:49:11', NULL, '2021-09-16 01:49:11'),
(55, 1034, 56, NULL, 26, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 01:49:45', NULL, '2021-09-16 01:49:45'),
(56, 1035, 56, NULL, 27, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 01:50:18', NULL, '2021-09-16 01:50:18'),
(57, 1036, 56, NULL, 28, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 01:50:58', NULL, '2021-09-16 01:50:58'),
(58, 1037, 56, NULL, 29, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 01:51:35', NULL, '2021-09-16 01:51:35'),
(59, 1038, 56, NULL, 30, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 01:52:11', NULL, '2021-09-16 01:52:11'),
(60, 1039, 55, 42, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 01:52:28', NULL, '2021-09-16 01:52:28'),
(61, 1040, 55, NULL, 31, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 01:53:03', NULL, '2021-09-16 01:53:03'),
(62, 1041, 54, 43, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 01:55:34', NULL, '2021-09-16 01:55:34'),
(63, 1042, 54, NULL, 32, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 01:56:37', NULL, '2021-09-16 01:56:37'),
(64, 1043, 50, 44, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 01:57:00', NULL, '2021-09-16 01:57:00'),
(65, 1044, 50, NULL, 33, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 01:57:32', NULL, '2021-09-16 01:57:32'),
(66, 1045, 53, 45, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 01:57:46', NULL, '2021-09-16 01:57:46'),
(67, 1046, 53, NULL, 34, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 01:58:17', NULL, '2021-09-16 01:58:17'),
(68, 1047, 53, NULL, 35, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 01:59:24', NULL, '2021-09-16 01:59:24'),
(69, 1048, 53, NULL, 36, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 02:00:03', NULL, '2021-09-16 02:00:03'),
(70, 1049, 53, NULL, 37, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 02:00:57', NULL, '2021-09-16 02:00:57'),
(71, 1050, 53, NULL, 38, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 02:01:33', NULL, '2021-09-16 02:01:33'),
(72, 1051, 52, 46, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 02:08:14', NULL, '2021-09-16 02:08:14'),
(73, 1052, 52, NULL, 39, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 02:09:44', NULL, '2021-09-16 02:09:44'),
(74, 1053, 51, 47, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 02:10:09', NULL, '2021-09-16 02:10:09'),
(75, 1054, 51, NULL, 40, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 02:10:32', NULL, '2021-09-16 02:10:32'),
(76, 1055, 50, NULL, 41, NULL, 0, NULL, -50, '2021-09-16', 2, 2, 2, '2021-09-16 02:11:05', NULL, '2021-09-16 02:11:05'),
(77, 1056, 49, 48, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 02:11:36', NULL, '2021-09-16 02:11:36'),
(78, 1057, 49, NULL, 42, NULL, 0, NULL, -100, '2021-09-16', 2, 2, 2, '2021-09-16 02:12:06', NULL, '2021-09-16 02:12:06'),
(79, 1058, 48, 49, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 02:12:46', NULL, '2021-09-16 02:12:46'),
(80, 1059, 48, NULL, 43, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 02:13:36', NULL, '2021-09-16 02:13:36'),
(81, 1060, 47, 50, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 02:13:57', NULL, '2021-09-16 02:13:57'),
(82, 1061, 47, NULL, 44, NULL, 0, NULL, -50, '2021-09-16', 2, 2, 2, '2021-09-16 02:14:29', NULL, '2021-09-16 02:14:29'),
(83, 1062, 46, 51, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 02:14:50', NULL, '2021-09-16 02:14:50'),
(84, 1063, 46, NULL, 45, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 02:15:12', NULL, '2021-09-16 02:15:12'),
(85, 1064, 45, 52, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 02:15:37', NULL, '2021-09-16 02:15:37'),
(86, 1065, 45, NULL, 46, NULL, 0, NULL, -70, '2021-09-16', 2, 2, 2, '2021-09-16 02:16:07', NULL, '2021-09-16 02:16:07'),
(87, 1066, 45, NULL, 47, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 02:16:41', NULL, '2021-09-16 02:16:41'),
(88, 1067, 45, NULL, 48, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 02:17:36', NULL, '2021-09-16 02:17:36'),
(89, 1068, 45, NULL, 49, NULL, 0, NULL, -50, '2021-09-16', 2, 2, 2, '2021-09-16 02:18:15', NULL, '2021-09-16 02:18:15'),
(90, 1069, 45, NULL, 50, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 02:18:50', NULL, '2021-09-16 02:18:50'),
(91, 1070, 40, 53, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 02:19:29', NULL, '2021-09-16 02:19:29'),
(92, 1071, 40, NULL, 51, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 02:20:23', NULL, '2021-09-16 02:20:23'),
(93, 1072, 39, 54, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 02:20:41', NULL, '2021-09-16 02:20:41'),
(94, 1073, 39, NULL, 52, NULL, 0, NULL, -50, '2021-09-16', 2, 2, 2, '2021-09-16 02:21:37', NULL, '2021-09-16 02:21:37'),
(95, 1074, 38, 55, NULL, NULL, 0, NULL, 100, '2016-09-20', 1, 1, 2, '2021-09-16 02:22:24', NULL, '2021-09-16 02:22:24'),
(96, 1075, 38, NULL, 53, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 02:22:51', NULL, '2021-09-16 02:22:51'),
(97, 1076, 37, 56, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 02:23:17', NULL, '2021-09-16 02:23:17'),
(98, 1077, 37, NULL, 54, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 02:23:43', NULL, '2021-09-16 02:23:43'),
(99, 1078, 36, 57, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 21:30:02', NULL, '2021-09-16 21:30:02'),
(100, 1079, 36, NULL, 55, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 21:33:22', NULL, '2021-09-16 21:33:22'),
(101, 1080, 35, 58, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 21:34:27', NULL, '2021-09-16 21:34:27'),
(102, 1081, 35, NULL, 56, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 21:34:48', NULL, '2021-09-16 21:34:48'),
(103, 1082, 34, 59, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 21:38:17', NULL, '2021-09-16 21:38:17'),
(104, 1083, 34, NULL, 57, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 21:38:58', NULL, '2021-09-16 21:38:58'),
(105, 1084, 33, 60, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 21:39:24', NULL, '2021-09-16 21:39:24'),
(106, 1085, 33, NULL, 58, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 21:40:20', NULL, '2021-09-16 21:40:20'),
(107, 1086, 32, 61, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 21:55:07', NULL, '2021-09-16 21:55:07'),
(108, 1087, 32, NULL, 59, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 21:55:52', NULL, '2021-09-16 21:55:52'),
(109, 1088, 31, 62, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 21:57:15', NULL, '2021-09-16 21:57:15'),
(110, 1089, 31, NULL, 60, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 21:58:09', NULL, '2021-09-16 21:58:09'),
(111, 1090, 30, 63, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 22:00:03', NULL, '2021-09-16 22:00:03'),
(112, 1091, 30, NULL, 61, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:00:52', NULL, '2021-09-16 22:00:52'),
(113, 1092, 29, 64, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 22:01:23', NULL, '2021-09-16 22:01:23'),
(114, 1093, 29, NULL, 62, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:02:51', NULL, '2021-09-16 22:02:51'),
(115, 1094, 28, 65, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 22:03:08', NULL, '2021-09-16 22:03:08'),
(116, 1095, 28, NULL, 63, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 22:03:57', NULL, '2021-09-16 22:03:57'),
(117, 1096, 27, 66, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 22:05:21', NULL, '2021-09-16 22:05:21'),
(118, 1097, 27, NULL, 64, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:05:57', NULL, '2021-09-16 22:05:57'),
(119, 1098, 27, NULL, 65, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:07:29', NULL, '2021-09-16 22:07:29'),
(120, 1099, 26, 67, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 22:08:10', NULL, '2021-09-16 22:08:10'),
(121, 1100, 26, NULL, 66, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:09:23', NULL, '2021-09-16 22:09:23'),
(122, 1101, 26, NULL, 67, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:09:53', NULL, '2021-09-16 22:09:53'),
(123, 1102, 26, NULL, 68, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:10:28', NULL, '2021-09-16 22:10:28'),
(124, 1103, 26, NULL, 69, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:15:34', NULL, '2021-09-16 22:15:34'),
(125, 1104, 26, NULL, 70, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:16:05', NULL, '2021-09-16 22:16:05'),
(126, 1105, 26, NULL, 71, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:16:50', NULL, '2021-09-16 22:16:50'),
(127, 1106, 26, NULL, 72, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:17:40', NULL, '2021-09-16 22:17:40'),
(128, 1107, 25, 68, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 22:18:03', NULL, '2021-09-16 22:18:03'),
(129, 1108, 25, NULL, 73, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 22:18:40', NULL, '2021-09-16 22:18:40'),
(130, 1109, 25, NULL, 74, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 22:19:14', NULL, '2021-09-16 22:19:14'),
(131, 1110, 25, NULL, 75, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:19:48', NULL, '2021-09-16 22:19:48'),
(132, 1111, 24, 69, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 22:20:08', NULL, '2021-09-16 22:20:08'),
(133, 1112, 24, NULL, 76, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:20:30', NULL, '2021-09-16 22:20:30'),
(134, 1113, 24, NULL, 77, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:21:01', NULL, '2021-09-16 22:21:01'),
(135, 1114, 24, NULL, 78, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:21:46', NULL, '2021-09-16 22:21:46'),
(136, 1115, 24, NULL, 79, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:22:30', NULL, '2021-09-16 22:22:30'),
(137, 1116, 23, 70, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 22:22:44', NULL, '2021-09-16 22:22:44'),
(138, 1117, 23, NULL, 80, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 22:23:21', NULL, '2021-09-16 22:23:21'),
(139, 1118, 22, 71, NULL, NULL, 0, NULL, 100, '2016-09-20', 1, 1, 2, '2021-09-16 22:23:34', NULL, '2021-09-16 22:23:34'),
(140, 1119, 22, NULL, 81, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 22:23:59', NULL, '2021-09-16 22:23:59'),
(141, 1120, 22, NULL, 82, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:26:00', NULL, '2021-09-16 22:26:00'),
(142, 1121, 22, 72, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 22:26:28', NULL, '2021-09-16 22:26:28'),
(143, 1122, 22, NULL, 83, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 22:27:18', NULL, '2021-09-16 22:27:18'),
(144, 1123, 22, NULL, 84, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 22:27:48', NULL, '2021-09-16 22:27:48'),
(145, 1124, 22, NULL, 85, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:28:21', NULL, '2021-09-16 22:28:21'),
(146, 1125, 22, NULL, 86, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:29:03', NULL, '2021-09-16 22:29:03'),
(147, 1126, 22, NULL, 87, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 22:29:41', NULL, '2021-09-16 22:29:41'),
(148, 1127, 22, NULL, 88, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 22:30:27', NULL, '2021-09-16 22:30:27'),
(149, 1128, 22, NULL, 89, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:31:07', NULL, '2021-09-16 22:31:07'),
(150, 1129, 21, 73, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 22:31:28', NULL, '2021-09-16 22:31:28'),
(151, 1130, 21, NULL, 90, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:31:54', NULL, '2021-09-16 22:31:54'),
(152, 1131, 21, NULL, 91, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:32:58', NULL, '2021-09-16 22:32:58'),
(153, 1132, 21, NULL, 92, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:33:57', NULL, '2021-09-16 22:33:57'),
(154, 1133, 21, NULL, 93, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 22:34:27', NULL, '2021-09-16 22:34:27'),
(155, 1134, 13, 74, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 22:34:34', NULL, '2021-09-16 22:34:34'),
(156, 1135, 13, NULL, 94, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:34:59', NULL, '2021-09-16 22:34:59'),
(157, 1136, 13, 75, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 22:35:09', NULL, '2021-09-16 22:35:09'),
(158, 1137, 13, NULL, 95, NULL, 0, NULL, -30, '2021-09-16', 2, 2, 2, '2021-09-16 22:35:51', NULL, '2021-09-16 22:35:51'),
(159, 1138, 16, 76, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 22:37:04', NULL, '2021-09-16 22:37:04'),
(160, 1139, 16, NULL, 96, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 22:45:36', NULL, '2021-09-16 22:45:36'),
(161, 1140, 16, NULL, 97, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 22:49:22', NULL, '2021-09-16 22:49:22'),
(162, 1141, 16, NULL, 98, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 22:50:22', NULL, '2021-09-16 22:50:22'),
(163, 1142, 16, NULL, 99, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 22:50:56', NULL, '2021-09-16 22:50:56'),
(164, 1143, 13, NULL, 100, NULL, 0, NULL, -70, '2021-09-16', 2, 2, 2, '2021-09-16 22:52:09', NULL, '2021-09-16 22:52:09'),
(165, 1144, 15, 77, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 22:52:15', NULL, '2021-09-16 22:52:15'),
(166, 1145, 15, NULL, 101, NULL, 0, NULL, -50, '2021-09-16', 2, 2, 2, '2021-09-16 22:52:46', NULL, '2021-09-16 22:52:46'),
(167, 1146, 15, 78, NULL, NULL, 0, NULL, 1000, '2016-09-20', 1, 1, 2, '2021-09-16 22:52:54', NULL, '2021-09-16 22:52:54'),
(168, 1147, 15, NULL, 102, NULL, 0, NULL, -50, '2021-09-16', 2, 2, 2, '2021-09-16 22:53:20', NULL, '2021-09-16 22:53:20'),
(169, 1148, 13, NULL, 103, NULL, 0, NULL, -40, '2021-09-16', 2, 2, 2, '2021-09-16 22:54:02', NULL, '2021-09-16 22:54:02'),
(170, 1149, 96, 79, NULL, NULL, 0, NULL, 100, '2021-09-22', 1, 1, NULL, '2021-09-22 21:53:56', NULL, '2021-09-22 21:53:56'),
(171, 1150, 96, NULL, NULL, 8, 0, NULL, -50, '2021-09-22', 3, 2, 96, '2021-09-22 22:22:07', 96, '2021-09-22 22:22:07'),
(172, 1151, 14, 80, NULL, NULL, 0, NULL, 500, '2021-09-23', 1, 1, 14, '2021-09-23 22:35:22', NULL, '2021-09-23 22:35:22'),
(175, 1152, 14, NULL, NULL, 12, NULL, NULL, -15, '2021-09-29', 3, 2, 14, '2021-09-29 20:57:00', 14, '2021-09-29 20:57:00'),
(176, 1153, 14, 81, NULL, NULL, NULL, NULL, 50, '2021-09-22', 1, 1, 2, '2021-09-30 00:02:35', NULL, '2021-09-30 00:02:35'),
(177, 1154, 22, NULL, NULL, NULL, NULL, 1, -10, '2021-09-30', 5, 2, 15, '2021-09-30 22:08:59', 15, '2021-09-30 22:08:59'),
(178, 1155, 22, NULL, NULL, NULL, NULL, 2, -10, '2021-09-30', 5, 2, 15, '2021-09-30 23:04:59', 15, '2021-09-30 23:04:59'),
(179, 1156, 22, NULL, NULL, NULL, NULL, 3, -10, '2021-10-01', 5, 2, 16, '2021-10-01 00:28:59', 16, '2021-10-01 00:28:59'),
(180, 1157, 97, 82, NULL, NULL, NULL, NULL, 100, '2021-10-10', 1, 1, NULL, '2021-10-10 12:49:01', NULL, '2021-10-10 12:49:01'),
(181, 1158, 97, 83, NULL, NULL, NULL, NULL, 10, '2021-10-10', 1, 1, 97, '2021-10-10 14:17:16', NULL, '2021-10-10 14:17:16'),
(182, 1159, 98, 84, NULL, NULL, NULL, NULL, 100, '2021-10-10', 1, 1, NULL, '2021-10-10 14:20:39', NULL, '2021-10-10 14:20:39'),
(183, 1160, 99, 85, NULL, NULL, NULL, NULL, 500, '2021-10-10', 1, 1, NULL, '2021-10-10 15:53:37', NULL, '2021-10-10 15:53:37'),
(184, 1161, 100, 86, NULL, NULL, NULL, NULL, 100, '2021-10-10', 1, 1, NULL, '2021-10-10 15:55:09', NULL, '2021-10-10 15:55:09'),
(185, 1162, 101, 87, NULL, NULL, NULL, NULL, 500, '2021-10-10', 1, 1, NULL, '2021-10-10 15:55:55', NULL, '2021-10-10 15:55:55'),
(186, 1163, 14, NULL, NULL, 13, NULL, NULL, -10, '2021-10-11', 3, 2, 14, '2021-10-11 01:57:18', 14, '2021-10-11 01:57:18'),
(187, 1164, 146, 90, NULL, NULL, NULL, NULL, 10, '2023-03-06', 1, 1, 1, '2023-03-06 18:49:46', NULL, '2023-03-06 18:49:46'),
(188, 1165, 148, 91, NULL, NULL, NULL, NULL, 100, '2023-03-07', 1, 1, 1, '2023-03-07 12:12:53', NULL, '2023-03-07 12:12:53');

--
-- Triggers `acc_customer_transaction`
--
DELIMITER $$
CREATE TRIGGER `aftert_acc_customer_transaction_insert` AFTER INSERT ON `acc_customer_transaction` FOR EACH ROW begin

declare var_amount float default 0;

select ifnull(sum(amount),0) into var_amount from acc_customer_transaction where f_customer_no = new.f_customer_no;

update users set unused_topup = var_amount where id = new.f_customer_no;

end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `acc_payment_bank_acc`
--

CREATE TABLE `acc_payment_bank_acc` (
  `id` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `bank_name` varchar(40) DEFAULT NULL,
  `bank_acc_name` varchar(40) DEFAULT NULL,
  `bank_acc_no` varchar(40) DEFAULT NULL,
  `balance_actual` float DEFAULT 0,
  `balacne_buffer` float DEFAULT 0,
  `comments` varchar(200) DEFAULT NULL,
  `is_active` int(1) DEFAULT 1,
  `f_ss_created_by` int(4) DEFAULT NULL,
  `f_user_no` int(4) DEFAULT NULL,
  `is_cod` int(1) DEFAULT 0,
  `ss_created_on` datetime DEFAULT NULL,
  `f_ss_modified_by` int(4) DEFAULT NULL,
  `ss_modified_on` datetime DEFAULT NULL,
  `f_ss_company_no` int(4) DEFAULT NULL,
  `f_payment_method_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `acc_payment_bank_acc`
--

INSERT INTO `acc_payment_bank_acc` (`id`, `code`, `bank_name`, `bank_acc_name`, `bank_acc_no`, `balance_actual`, `balacne_buffer`, `comments`, `is_active`, `f_ss_created_by`, `f_user_no`, `is_cod`, `ss_created_on`, `f_ss_modified_by`, `ss_modified_on`, `f_ss_company_no`, `f_payment_method_no`) VALUES
(1, 101, 'SSL', 'SSL', '101', 510, 0, NULL, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1),
(2, 102, 'CASH- Admin', 'CASH', '102', 0, 0, NULL, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, 6),
(3, 103, 'NRB', 'Admin', '122211', 0, 0, NULL, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, 4),
(4, 104, 'Bonus', 'BDF Bnous', 'BDF Bnous', 46710, 0, NULL, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, 7),
(5, 105, 'Bkash', 'Bkash 1', '01918993427', 160, 0, 'Bkash', 1, 2, NULL, 0, '2021-09-29 01:21:50', NULL, '2021-09-29 01:21:50', NULL, 2),
(6, 106, 'Bkash', 'Bkash 2', '01918993428', 0, 0, 'Bkash Account number', 1, 2, NULL, 0, '2021-09-29 01:22:26', NULL, '2021-09-29 01:22:26', NULL, 2),
(7, 107, 'Roket', 'Roket 1', '01918993420', 0, 0, 'Roket Account Number', 1, 2, NULL, 0, '2021-09-29 01:23:04', NULL, '2021-09-29 01:23:04', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `acc_payment_methods`
--

CREATE TABLE `acc_payment_methods` (
  `id` int(11) NOT NULL,
  `code` int(4) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL COMMENT '1=active, 0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acc_payment_methods`
--

INSERT INTO `acc_payment_methods` (`id`, `code`, `name`, `is_active`) VALUES
(1, 101, 'SSL Payment', 1),
(2, 102, 'Bkash', 1),
(3, 103, 'Roket', 1),
(4, 104, 'Bank', 1),
(5, 105, 'Surja Payment', 1),
(6, 106, 'CASH', 1),
(7, 107, 'BONUS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'backend/image/default-user.png',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Supper Admin', 'arobil@gmail.com', '2022-07-25 05:09:47', '$2y$10$/iBkG/TQacrA2KOj9l7XoeE85CQm6oKVCswEzsb13Mj7k2hELCcBe', 'backend/image/default-user.png', 'wArU8bg7sIvacA4XN3oHVijlS7yXn2Jy6Aew70dhQ1pcTUFYqGXkF7oOWDWe', '2022-07-25 05:09:47', '2022-11-17 19:10:59'),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$/iBkG/TQacrA2KOj9l7XoeE85CQm6oKVCswEzsb13Mj7k2hELCcBe', 'backend/image/default-user.png', NULL, '2022-08-22 05:56:33', '2022-08-22 05:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(1, 'App\\Models\\User', 7),
(2, 'App\\Models\\Admin', 2),
(2, 'App\\Models\\Admin', 4),
(2, 'App\\Models\\Admin', 5),
(2, 'App\\Models\\Admin', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(124) NOT NULL,
  `group_name` varchar(124) DEFAULT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `group_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin.user.index', 'admin', 'admin', '2023-01-23 19:52:41', '2023-01-23 19:52:41'),
(2, 'admin.user.create', 'admin', 'admin', '2023-01-23 19:52:50', '2023-01-23 19:52:50'),
(3, 'admin.user.edit', 'admin', 'admin', NULL, NULL),
(4, 'admin.user.destroy', 'admin', 'admin', NULL, NULL),
(5, 'admin.cpage.index', 'custom-page', 'admin', NULL, NULL),
(6, 'admin.cpage.create', 'custom-page', 'admin', NULL, NULL),
(7, 'admin.cpage.store', 'custom-page', 'admin', NULL, NULL),
(8, 'admin.cpage.edit', 'custom-page', 'admin', NULL, NULL),
(9, 'admin.cpage.view', 'custom-page', 'admin', NULL, NULL),
(10, 'admin.cpage.update', 'custom-page', 'admin', NULL, NULL),
(11, 'admin.cpage.delete', 'custom-page', 'admin', NULL, NULL),
(16, 'admin.faq.index', 'faq', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(17, 'admin.faq.create', 'faq', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(18, 'admin.faq.store', 'faq', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(19, 'admin.faq.edit', 'faq', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(20, 'admin.faq.view', 'faq', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(21, 'admin.faq.update', 'faq', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(22, 'admin.blog-category.index', 'blog-category', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(23, 'admin.blog-category.create', 'blog-category', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(24, 'admin.blog-category.store', 'blog-category', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(25, 'admin.blog-category.edit', 'blog-category', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(26, 'admin.blog-category.view', 'blog-category', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(27, 'admin.blog-category.update', 'blog-category', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(28, 'admin.blog-category.delete', 'blog-category', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(29, 'admin.blog-post.index', 'blog-post', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(30, 'admin.blog-post.create', 'blog-post', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(31, 'admin.blog-post.store', 'blog-post', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(32, 'admin.blog-post.edit', 'blog-post', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(33, 'admin.blog-post.view', 'blog-post', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(34, 'admin.blog-post.update', 'blog-post', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(35, 'admin.blog-post.delete', 'blog-post', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(36, 'admin.contact.index', 'contact', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(37, 'admin.contact.create', 'contact', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(38, 'admin.contact.store', 'contact', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(39, 'admin.contact.edit', 'contact', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(40, 'admin.contact.view', 'contact', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(41, 'admin.contact.update', 'contact', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(42, 'admin.contact.delete', 'contact', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(43, 'admin.category.index', 'category', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(44, 'admin.category.create', 'category', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(45, 'admin.category.store', 'category', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(46, 'admin.category.edit', 'category', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(47, 'admin.category.view', 'category', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(48, 'admin.category.update', 'category', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(49, 'admin.category.delete', 'category', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(50, 'admin.subcategory.index', 'subcategory', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(51, 'admin.subcategory.create', 'subcategory', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(52, 'admin.subcategory.store', 'subcategory', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(53, 'admin.subcategory.edit', 'subcategory', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(54, 'admin.subcategory.view', 'subcategory', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(55, 'admin.subcategory.update', 'subcategory', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(56, 'admin.subcategory.delete', 'subcategory', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(57, 'admin.faq.delete', 'faq', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(58, 'admin.customer.index', 'customer', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(59, 'admin.customer.create', 'customer', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(60, 'admin.customer.store', 'customer', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(61, 'admin.customer.edit', 'customer', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(62, 'admin.customer.view', 'customer', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(63, 'admin.customer.update', 'customer', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(64, 'admin.customer.delete', 'customer', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(65, 'admin.country.index', 'country', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(66, 'admin.country.create', 'country', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(67, 'admin.country.store', 'country', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(68, 'admin.country.edit', 'country', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(69, 'admin.country.view', 'country', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(70, 'admin.country.update', 'country', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(71, 'admin.country.delete', 'country', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(72, 'admin.region.index', 'region', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(73, 'admin.region.create', 'region', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(74, 'admin.region.store', 'region', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(75, 'admin.region.edit', 'region', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(76, 'admin.region.view', 'region', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(77, 'admin.region.update', 'region', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(78, 'admin.region.delete', 'region', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(79, 'admin.city.index', 'city', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(80, 'admin.city.create', 'city', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(81, 'admin.city.store', 'city', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(82, 'admin.city.edit', 'city', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(83, 'admin.city.view', 'city', 'admin', '2023-01-23 13:52:41', '2023-01-23 13:52:41'),
(84, 'admin.city.update', 'city', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(85, 'admin.city.delete', 'city', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(86, 'admin.property.index', 'property', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(87, 'admin.property.create', 'property', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(88, 'admin.property.store', 'property', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(89, 'admin.property.view', 'property', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(90, 'admin.property.edit', 'property', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(91, 'admin.property.update', 'property', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(92, 'admin.property.delete', 'city', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50'),
(93, 'admin.property.activity', 'property', 'admin', '2023-01-23 13:52:50', '2023-01-23 13:52:50');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prd_ads`
--

CREATE TABLE `prd_ads` (
  `id` bigint(20) NOT NULL,
  `f_ad_position_no` int(11) DEFAULT NULL,
  `code` bigint(20) DEFAULT NULL,
  `url_slug` varchar(300) DEFAULT NULL,
  `available_to` datetime DEFAULT NULL,
  `available_from` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(10) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0= pending,1=published'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prd_ads`
--

INSERT INTO `prd_ads` (`id`, `f_ad_position_no`, `code`, `url_slug`, `available_to`, `available_from`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 10, NULL, NULL, '2021-09-23 00:00:00', '2020-08-20', '2021-08-08 01:16:22', 2, '2021-08-24 02:32:44', 2, 1),
(2, 102, NULL, NULL, '2021-08-23 00:00:00', '2020-09-01', '2021-08-21 23:33:49', 2, '2021-08-27 21:40:21', 2, 1),
(3, 101, NULL, NULL, '2021-08-31 00:00:00', '2021-08-20', '2021-08-21 23:44:06', 2, '2021-08-21 23:44:06', NULL, 1),
(4, 200, NULL, NULL, '2021-10-06 00:00:00', '2021-08-23', '2021-08-24 22:47:30', 2, '2021-08-24 22:47:30', NULL, 1),
(5, 300, NULL, NULL, '2021-09-11 00:00:00', '2021-08-25', '2021-08-26 20:58:47', 2, '2021-08-26 20:58:47', NULL, 1),
(6, 301, NULL, NULL, '2021-09-11 00:00:00', '2021-08-26', '2021-08-26 20:58:59', 2, '2021-08-26 20:58:59', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prd_ads_images`
--

CREATE TABLE `prd_ads_images` (
  `id` int(11) NOT NULL,
  `f_ads_no` bigint(20) DEFAULT NULL,
  `image_path` varchar(100) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `url` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prd_ads_images`
--

INSERT INTO `prd_ads_images` (`id`, `f_ads_no`, `image_path`, `image`, `order_id`, `url`) VALUES
(1, 1, '/uploads/ads/1/612138ddd9945.png', NULL, 101, NULL),
(2, 1, '/uploads/ads/1/612139b0a32be.png', NULL, 102, NULL),
(3, 2, '/uploads/ads/2/61213a3b35fe4.png', NULL, 102, NULL),
(4, 3, '/uploads/ads/3/61213b702be70.jpg', NULL, 101, NULL),
(5, 4, '/uploads/ads/4/612522bfc612c.jpg', NULL, 100, NULL),
(6, 5, '/uploads/ads/5/6127ac4c051ab.jpg', NULL, 100, NULL),
(7, 6, '/uploads/ads/6/6127ac5f24535.jpg', NULL, 100, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prd_floor_list`
--

CREATE TABLE `prd_floor_list` (
  `id` int(2) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `order_id` int(5) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prd_floor_list`
--

INSERT INTO `prd_floor_list` (`id`, `name`, `is_active`, `order_id`) VALUES
(1, 'Ground Floor', 1, 0),
(2, '1 Storied', 1, 0),
(3, '2 Storied', 1, 0),
(4, '3 Storied', 1, 0),
(5, '4 Storied', 1, 1),
(6, '5 Storied', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prd_listings`
--

CREATE TABLE `prd_listings` (
  `id` bigint(20) NOT NULL,
  `code` bigint(20) DEFAULT NULL,
  `property_for` varchar(20) DEFAULT NULL COMMENT 'rent or buy or roommate',
  `f_property_type_no` int(10) DEFAULT NULL,
  `property_type` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `property_condition` varchar(200) DEFAULT NULL,
  `f_property_condition` int(2) DEFAULT NULL,
  `price_type` int(1) NOT NULL DEFAULT 1 COMMENT '1=fixed, 2=nagotiable',
  `title` varchar(250) DEFAULT NULL,
  `url_slug` varchar(300) DEFAULT NULL,
  `url_slug_locked` int(1) NOT NULL DEFAULT 0,
  `f_city_no` int(2) DEFAULT NULL,
  `city_name` varchar(50) DEFAULT NULL,
  `f_area_no` int(10) DEFAULT NULL,
  `area_name` varchar(50) DEFAULT NULL,
  `f_subarea_no` int(11) DEFAULT NULL,
  `subarea_name` varchar(50) DEFAULT NULL,
  `road` varchar(100) DEFAULT NULL,
  `house` varchar(100) DEFAULT NULL,
  `f_user_no` int(10) DEFAULT NULL,
  `user_type` int(1) DEFAULT 2 COMMENT '2=owner,3=builder,4=agency, 5=agent',
  `contact_person1` varchar(50) DEFAULT NULL,
  `contact_person2` varchar(50) DEFAULT NULL,
  `mobile1` varchar(15) NOT NULL,
  `mobile2` varchar(15) DEFAULT NULL,
  `mobile3` varchar(15) DEFAULT NULL,
  `f_listing_type` int(2) DEFAULT NULL,
  `listing_type` varchar(50) DEFAULT NULL,
  `f_prep_tenant_no` int(2) DEFAULT NULL,
  `prep_tenant` varchar(50) DEFAULT NULL,
  `available_from` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `is_verified` int(1) NOT NULL DEFAULT 0,
  `verified_by` int(2) DEFAULT NULL,
  `verified_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(10) DEFAULT NULL,
  `total_floors` int(2) DEFAULT NULL,
  `floors_avaiable` varchar(100) DEFAULT NULL COMMENT 'comma seperated values',
  `expaired_at` date DEFAULT NULL COMMENT 'payment expiry date ',
  `status` int(2) NOT NULL DEFAULT 0 COMMENT '0 = pending, 10=published,20=unpublished, 30=rejected, 40= expaired,50=deleted',
  `payment_status` int(1) NOT NULL DEFAULT 0 COMMENT '0=not paid,1=paid',
  `ci_payment` int(11) NOT NULL DEFAULT 0 COMMENT 'payment for contact view 0 = no need, 1 = need payment ',
  `ci_price` int(11) NOT NULL DEFAULT 0,
  `is_top` int(1) NOT NULL DEFAULT 0,
  `payment_auto_renew` int(1) NOT NULL DEFAULT 1 COMMENT 'when status = 10(published) but payment_status = 0 , the listing will update payment_status = 1 if enough balance in account   ',
  `max_sharing_permission` int(11) NOT NULL DEFAULT 0,
  `agent_commission_amt` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `prd_listings`
--

INSERT INTO `prd_listings` (`id`, `code`, `property_for`, `f_property_type_no`, `property_type`, `address`, `property_condition`, `f_property_condition`, `price_type`, `title`, `url_slug`, `url_slug_locked`, `f_city_no`, `city_name`, `f_area_no`, `area_name`, `f_subarea_no`, `subarea_name`, `road`, `house`, `f_user_no`, `user_type`, `contact_person1`, `contact_person2`, `mobile1`, `mobile2`, `mobile3`, `f_listing_type`, `listing_type`, `f_prep_tenant_no`, `prep_tenant`, `available_from`, `gender`, `is_verified`, `verified_by`, `verified_at`, `created_at`, `created_by`, `modified_at`, `modified_by`, `total_floors`, `floors_avaiable`, `expaired_at`, `status`, `payment_status`, `ci_payment`, `ci_price`, `is_top`, `payment_auto_renew`, `max_sharing_permission`, `agent_commission_amt`) VALUES
(5, 1001, 'sale', 1, 'Apartment', 'Banasree, Dhaka', 'Ongoing', 3, 1, '1690 sqft, 3 Beds Under Construction Apartment/Flats for Sale at Banasree', '1690-sqft-3-beds-under-construction', 1, 1, 'Dhaka', 2, 'Banani', NULL, NULL, NULL, NULL, 15, 3, 'Hyperion Design & Development Ltd.', 'Hyperion Design & Development Ltd.', '01817158000', '01817158000', NULL, 2, 'Feature Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-03 20:35:32', 15, '2021-09-30 00:54:48', 2, 6, '[\"2\",\"3\",\"4\",\"5\",\"6\"]', '2021-10-16', 10, 1, 1, 10, 1, 1, 50, 0),
(6, 1002, 'sale', 1, 'Apartment', 'Eskaton, Dhaka', 'Ongoing', 3, 1, '1478 sqft, 3 Beds Under Construction Apartment/Flats for Sale at Eskaton', '1478-sqft-3-beds-under-construction', 1, 1, 'Dhaka', 2, 'Banani', NULL, NULL, NULL, NULL, 15, 3, 'Runner Properties Ltd.', 'Runner Properties Ltd.', '01730406', '01730406', NULL, 2, 'Feature Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-03 20:49:12', 15, '2021-09-30 00:54:32', 2, 6, '[\"2\",\"3\",\"4\",\"5\",\"6\"]', '2021-10-16', 10, 1, 1, 10, 0, 1, 50, 0),
(7, 1003, 'sale', 2, 'Office', 'Uttara, Dhaka', 'Ongoing', 3, 1, '2500 sqft, Under Construction Office Space for Sale at Uttara', '2500-sqft-under-construction', 1, 1, 'Dhaka', 9, 'Uttara', NULL, NULL, NULL, NULL, 13, 2, 'Ark Builders Ltd', 'Ark Builders Ltd', '01926993000', '01926993000', NULL, 3, 'General Listing with daily auto update f', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-03 21:02:31', 13, '2021-09-16 22:52:09', 1, 6, '[\"2\",\"3\",\"4\",\"5\",\"6\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(8, 1004, 'rent', 1, 'Apartment', 'Rampura, Dhaka', 'Ready', 1, 1, '1800 sqft, 3 Beds Apartment/Flats for Rent at Rampura', '1800-sqft-under-construction', 1, 1, 'Dhaka', 10, 'Rampura', NULL, NULL, NULL, NULL, 13, 2, 'Rayyan Properties', 'Rayyan Properties', '01300773000', '01300773000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-03 21:07:11', 13, '2021-09-16 22:54:02', 1, 6, '[\"6\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(9, 1005, 'rent', 2, 'Office', 'Hyperion Tower, House - 02, Block - A, Road - 04, Section - 10Mirpur, Dhaka-1216', 'Ready', 1, 1, '3500 sqft, Office Space for Rent at Mirpur 10', '3500-sqft-office-space', 1, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, NULL, NULL, 16, 4, 'Arafatul Alam', 'Arafatul Alam', '01817158000', '01817158000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-04 15:34:14', 16, '2021-09-16 22:50:56', 1, 6, '[\"2\",\"3\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(10, 1006, 'rent', 1, 'Apartment', 'Mirbag, Dhaka', 'Ready', 1, 1, '16000 sqft, 6 Beds Duplex Home for Rent at Mirbag', '16000-sqft-6-beds-duplex-home', 1, 1, 'Dhaka', 11, 'Mirbag', NULL, NULL, NULL, NULL, 16, 4, 'Tallal Ziad', 'Tallal Ziad', '20100139292', '20100139292', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-04 15:41:35', 16, '2021-09-16 22:50:22', 1, 3, '[\"2\",\"3\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(11, 1007, 'rent', 1, 'Apartment', 'BLOCK C, ROAD 2, HOUSE 1F', 'Ready', 1, 1, '400 sqft, 2 Beds Studio Apartment for Rent at Bashundhara R/A', '400-sqft-2-beds-studio-apartment', 1, 1, 'Dhaka', 12, 'Basundhara', NULL, NULL, NULL, NULL, 16, 4, 'MUSFAQUE RAIHAN MUSA', 'MUSFAQUE RAIHAN MUSA', '01712503000', '01712503000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-04 18:59:39', 16, '2021-09-16 22:49:22', 1, 6, '[\"6\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(12, 1008, 'rent', 1, 'Apartment', 'Shewrapara', 'Ready', 1, 1, '500 sqft, 1 Bed Sublet/Room for Rent at Shewrapara', '500-sqft-2-beds-studio-apartment', 1, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, NULL, NULL, 16, 4, 'Shahid Sajjad Huq', 'Shahid Sajjad Huq', '01977149000', '01977149000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-04 19:03:12', 16, '2021-09-16 22:45:36', 1, 1, '[\"1\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(13, 1009, 'roommate', 1, 'Apartment', 'house : 22. road : 3. block : E. section : 12. Pallabi. Mirpur', 'Ready', 1, 1, 'sublet Female for a Roommates at Mirpur 12', 'sublet-female-roommate', 1, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, NULL, NULL, 17, 5, 'Effat ara', 'Effat ara', '01739252000', '01739252000', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-04 19:37:05', 17, '2021-09-16 22:47:38', 1, 6, '[\"3\"]', NULL, 10, 1, 1, 0, 0, 1, 0, 0),
(14, 1010, 'roommate', 1, 'Apartment', 'Aftab Nagar', 'Ready', 1, 1, 'Hostel Male for a Roommates/Paying Guest at Aftab Nagar', 'hostel-male-roommate', 1, 1, 'Dhaka', 10, 'Rampura', NULL, NULL, NULL, NULL, 17, 5, 'Super Hostel BD', 'Super Hostel BD', '016784038820', '1678403884', NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-04 19:48:22', 17, '2021-09-19 01:24:21', 17, 6, 'null', NULL, 10, 1, 0, 0, 0, 1, 0, 0),
(15, 1011, 'sale', 1, 'Apartment', 'Cantonment, Dhaka', 'Ready', 1, 2, '1125 sqft, 3 Beds Ready Studio Apartment for Sale at Cantonment', '1125-sqft-3-beds-ready-studio-apartment-for-sale-at-cantonment', 1, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, NULL, NULL, 13, 2, 'Rafath', NULL, '01717164000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-26 16:09:00', 13, '2021-09-16 22:35:51', 1, 6, '[\"2\",\"3\",\"4\",\"5\",\"6\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(16, 1012, 'sale', 1, 'Apartment', 'Bashundhara R/A, Dhaka', 'Ready', 1, 2, '2300 sqft, 3 Beds Ready Flats for Sale at Bashundhara R/A', '2300-sqft-3-beds-ready-flats-for-sale-at-bashundhara-ra', 1, 1, 'Dhaka', 12, 'Basundhara', NULL, NULL, NULL, NULL, 13, 2, 'IMAGINE PROPERTIES LTD.', NULL, '01939919000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-26 16:16:04', 13, '2021-09-16 22:34:59', 1, 6, '[\"2\",\"3\",\"4\",\"5\",\"6\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(17, 1013, 'rent', 2, 'Office', '61, Bijoy nagar, Dhaka', 'Ready', 1, 1, '2000 sqft, Office Space for Rent at Naya Paltan', '2000-sqft-office-space-for-rent-at-naya-paltan', 1, 1, 'Dhaka', 13, 'Naya Paltan', NULL, NULL, NULL, NULL, 21, 2, 'IMAGINE PROPERTIES LTD', NULL, '01939919000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-26 16:27:30', 21, '2021-09-16 22:34:27', 1, 6, '[\"2\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(18, 1014, 'sale', 1, 'Apartment', 'Basundhara R/A, Dhaka', 'Ready', 1, 2, '2935 sqft, 4 Beds Ready Flats for Sale at Bashundhara R/A', '2935-sqft-4-beds-ready-flats-for-sale-at-bashundhara-ra', 1, 1, 'Dhaka', 12, 'Basundhara', NULL, NULL, NULL, NULL, 21, 2, 'IMAGINE PROPERTIES LTD.', NULL, '01939919000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-26 16:54:10', 21, '2021-09-16 22:33:57', 1, 6, '[\"2\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(19, 1015, 'sale', 1, 'Apartment', '2300 sqft, 3 Beds Ready Flats for Sale at Bashundhara R/A  SALE', 'Ready', 1, 1, '2300 sqft, 3 Beds Ready Flats for Sale at Bashundhara R/A', '2300-sqft-3-beds-ready-flats-for-sale-at-bashundhara-ra-1015', 1, 1, 'Dhaka', 12, 'Basundhara', NULL, NULL, NULL, NULL, 21, 2, 'IMAGINE PROPERTIES LTD', NULL, '01939919000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-26 17:03:37', 21, '2021-09-16 22:32:58', 1, 6, '[\"6\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(20, 1016, 'sale', 1, 'Apartment', 'Bashundhara R/A , Dhaka', 'Ready', 1, 2, '2300 sqft, 3 Beds Ready Flats for Sale at Bashundhara R/A', '2300-sqft-3-beds-ready-flats-for-sale-at-bashundhara-ra-1016', 1, 1, 'Dhaka', 12, 'Basundhara', NULL, NULL, NULL, NULL, 21, 2, 'IMAGINE PROPERTIES LTD.', NULL, '01939919000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-26 17:13:38', 21, '2021-09-16 22:31:54', 1, 6, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(21, 1017, 'sale', 1, 'Apartment', 'Adabor , Dhaka', 'Ongoing', 3, 2, '1600 sqft, 4 Beds Under Construction Apartment/Flats for Sale at Adabor', '1600-sqft-4-beds-under-construction-apartmentflats-for-sale-at-adabor', 1, 1, 'Dhaka', 14, 'Adabor', NULL, NULL, NULL, NULL, 22, 2, 'Lucky Engineering Limited', NULL, '01312131000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-26 17:36:25', 22, '2021-09-16 22:31:07', 1, 6, '[\"3\",\"4\",\"6\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(22, 1018, 'rent', 3, 'Shop', 'House#13-23,Road #01 Janata Co-Operative Housing Society Ltd. Ring Road,Adabor,Dhaka-1207', 'Ready', 1, 1, '125 sqft, Showroom/Shop/Restaurant for Rent at Adabor', '125-sqft-showroomshoprestaurant-for-rent-at-adabor', 1, 1, 'Dhaka', 14, 'Adabor', NULL, NULL, NULL, NULL, 22, 2, 'Lucky Engineering Limited', NULL, '01312131000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-26 17:44:48', 22, '2021-09-16 22:30:27', 1, 4, '[\"1\",\"2\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(23, 1019, 'rent', 2, 'Office', 'SHAHABUDDIN PLAZA,House:13-23,Road#01,Janata Co-Operative Housing Society Ltd.Ring Road,Adabor Dhaka-1207', 'Ready', 1, 2, '1100 sqft, Office Space for Rent at Adabor', '1100-sqft-office-space-for-rent-at-adabor', 1, 1, 'Dhaka', 14, 'Adabor', NULL, NULL, NULL, NULL, 22, 2, 'Lucky Engineering Limited', NULL, '01312131000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-26 17:58:41', 22, '2021-09-16 22:29:41', 1, 6, '[\"5\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(24, 1020, 'sale', 1, 'Apartment', 'Adabor, Dhaka', 'Ongoing', 3, 2, '1438 sqft, 3 Beds Under Construction Apartment/Flats for Sale at Adabor', '1438-sqft-3-beds-under-construction-apartmentflats-for-sale-at-adabor', 1, 1, 'Dhaka', 14, 'Adabor', NULL, NULL, NULL, NULL, 22, 2, 'Lucky Engineering Limited', NULL, '01312131000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-26 18:43:18', 22, '2021-09-16 22:29:03', 1, 6, '[\"3\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 56, 0),
(25, 1021, 'sale', 1, 'Apartment', 'Adabor, Dhaka', 'Ongoing', 3, 1, '1912 sqft, 4 Beds Under Construction Apartment/Flats for Sale at Adabor', '1912-sqft-4-beds-under-construction-apartmentflats-for-sale-at-adabor', 1, 1, 'Dhaka', 14, 'Adabor', NULL, NULL, NULL, NULL, 22, 2, 'Lucky Engineering Limited', NULL, '01312131000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-26 19:32:05', 22, '2021-09-16 22:28:21', 1, 6, '[\"2\",\"5\",\"6\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(26, 1022, 'rent', 2, 'Office', 'Adabor, Dhaka', 'Ongoing', 3, 2, '700 sqft, Office Space for Rent at Adabor', '700-sqft-office-space-for-rent-at-adabor', 1, 1, 'Dhaka', 14, 'Adabor', NULL, NULL, NULL, NULL, 22, 2, 'Lucky Engineering Limited', NULL, '01312131000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-26 19:40:15', 22, '2021-09-16 22:27:48', 1, 6, '[\"5\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(27, 1023, 'rent', 3, 'Shop', 'Adabor, Dhaka', 'Ready', 1, 1, '264 sqft, Shop for Rent at Adabor', '264-sqft-shop-for-rent-at-adabor', 1, 1, 'Dhaka', 14, 'Adabor', NULL, NULL, NULL, NULL, 22, 2, 'Lucky Engineering Limited', NULL, '01312131000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-26 19:48:02', 22, '2021-09-16 22:27:18', 1, 6, '[\"1\",\"2\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(28, 1024, 'sale', 1, 'Apartment', 'Mirpur 14, Dhaka', 'Ongoing', 3, 2, '1980 sqft, 3 Beds Under Construction Flats for Sale at Mirpur 14', '1980-sqft-3-beds-under-construction-flats-for-sale-at-mirpur-14', 1, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, NULL, NULL, 22, 2, 'Lucky Engineering Limited', NULL, '01312131000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-26 19:56:52', 22, '2021-09-16 22:26:00', 1, 6, '[\"3\",\"5\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(29, 1025, 'rent', 3, 'Shop', 'Adabor', 'Ready', 1, 1, '1000 sqft, Shop for Rent at Adabor  RENT', '1000-sqft-shop-for-rent-at-adabor-rent', 1, 1, 'Dhaka', 14, 'Adabor', NULL, NULL, NULL, NULL, 22, 2, 'Lucky Engineering Limited', NULL, '01312131000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-26 20:41:20', 22, '2021-09-16 22:23:59', 1, 4, '[\"2\",\"3\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(30, 1026, 'rent', 2, 'Office', 'Narayangonj Sadar , Narayanganj', 'Ready', 1, 1, 'Commercial Space for Rent at Bangabandhu Road, Narayangonj.', 'commercial-space-for-rent-at-bangabandhu-road-narayangonj', 1, 4, 'Narayanganj', 15, 'Narayanganj Sadar', NULL, NULL, NULL, NULL, 23, 2, 'Rafiqul Islam Ratul', NULL, '01709659000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-26 20:50:13', 23, '2021-09-16 22:23:21', 1, 5, '[\"1\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(31, 1027, 'sale', 1, 'Apartment', 'Malibag, Dhaka', 'Ready', 1, 2, '1290 sqft, 3 Beds Ready Apartment/Flats for Sale at Malibag', '1290-sqft-3-beds-ready-apartmentflats-for-sale-at-malibag', 1, 1, 'Dhaka', 16, 'Malibag', NULL, NULL, NULL, NULL, 24, 2, 'RAYYAN PROPERTIES', NULL, '01300773000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-26 20:55:54', 24, '2021-09-16 22:22:30', 1, 6, '[\"3\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(32, 1028, 'sale', 1, 'Apartment', 'Basundhara R/A, Dhaka', 'Ongoing', 3, 2, 'সুলভ মূল্যে জমির অংশ কিনুন এবং বসুন্ধরা আ/এ-তে নির্মাণ ব্যয়ে আপনার অ্যাপার্টমেন্ট তৈরি করুন', '', 1, 1, 'Dhaka', 12, 'Basundhara', NULL, NULL, NULL, NULL, 24, 2, 'RAYYAN PROPERTIES', NULL, '01300773000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-26 20:58:29', 24, '2021-09-16 22:21:46', 1, 6, '[\"2\",\"3\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(33, 1029, 'sale', 1, 'Apartment', 'Mirpur 6', 'Ongoing', 3, 1, '1590 sqft, 3 Beds Under Construction Flats for Sale at Mirpur 6', '1590-sqft-3-beds-under-construction-flats-for-sale-at-mirpur-6', 1, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, NULL, NULL, 24, 2, 'RAYYAN PROPERTIES', NULL, '01300773000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-26 21:00:30', 24, '2021-09-16 22:21:01', 1, 6, '[\"6\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(34, 1030, 'sale', 1, 'Apartment', 'Baridhara', 'Ready', 1, 2, '2480 sqft, 4 Beds Ready Apartment/Flats for Sale at Baridhara', '2480-sqft-4-beds-ready-apartmentflats-for-sale-at-baridhara', 1, 1, 'Dhaka', 17, 'Baridhara', NULL, NULL, NULL, NULL, 24, 2, 'RAYYAN PROPERTIES', NULL, '01300773000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-26 21:03:04', 24, '2021-09-16 22:20:30', 1, 6, '[\"3\",\"6\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(35, 1031, 'sale', 7, 'Land', 'Purbachal', 'Ready', 1, 2, '3 katha,Residential Plot for Sale at Purbachal', '3-katharesidential-plot-for-sale-at-purbachal', 1, 1, 'Dhaka', 18, 'Purbachal', NULL, NULL, NULL, NULL, 25, 2, 'Purbachal Marine City', NULL, '01345217032', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-27 18:05:48', 25, '2021-09-16 22:19:48', 1, NULL, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(36, 1032, 'rent', 7, 'Land', 'Purbachal', 'Ready', 1, 1, '5 katha, Ready Residential Plot for Sale at Purbachal', '5-katha-ready-residential-plot-for-sale-at-purbachal', 1, 1, 'Dhaka', 18, 'Purbachal', NULL, NULL, NULL, NULL, 25, 2, 'Purbachal Marine City', NULL, '01345217032', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-27 18:47:15', 25, '2021-09-16 22:19:14', 1, NULL, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(37, 1033, 'rent', 7, 'Land', 'Purbachal', 'Ready', 1, 1, 'Rare plot at Vip sector_17, 3 katha, Ready Residential Plot for Sale at Purbachal', 'rare-plot-at-vip-sector-17-3-katha-ready-residential-plot-for-sale-at-purbachal', 1, 1, 'Dhaka', 18, 'Purbachal', NULL, NULL, NULL, NULL, 25, 2, 'Purbachal Marine City', NULL, '01345217032', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-27 19:10:10', 25, '2021-09-16 22:18:40', 1, NULL, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 42, 0),
(38, 1034, 'sale', 7, 'Land', 'Savar', 'Semi Ready', 2, 1, '5 katha, Almost Ready Residential Plot for Sale at Savar', '5-katha-almost-ready-residential-plot-for-sale-at-savar', 1, 1, 'Dhaka', 19, 'Savar', NULL, NULL, NULL, NULL, 26, 2, 'Rifat Al Islam', NULL, '01923847564', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-27 19:21:35', 26, '2021-09-16 22:17:40', 1, NULL, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 57, 0),
(39, 1035, 'sale', 7, 'Land', 'Hemayetpur', 'Ready', 1, 1, '5 katha, Ready Residential Plot for Sale at Hemayetpur', '5-katha-ready-residential-plot-for-sale-at-hemayetpur', 1, 1, 'Dhaka', 19, 'Savar', NULL, NULL, NULL, NULL, 26, 2, 'Rifat Al Islam', NULL, '01923847564', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-27 19:30:02', 26, '2021-09-16 22:16:50', 1, NULL, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(40, 1036, 'sale', 7, 'Land', 'Hemayetpur', 'Ready', 1, 1, '10 katha, Ready Residential Plot for Sale at Hemayetpur', '10-katha-ready-residential-plot-for-sale-at-hemayetpur', 1, 1, 'Dhaka', 19, 'Savar', NULL, NULL, NULL, NULL, 26, 2, 'Rifat Al Islam', NULL, '01923847564', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-27 19:34:17', 26, '2021-09-16 22:16:05', 1, NULL, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 25, 0),
(41, 1037, 'sale', 7, 'Land', 'Hemayetpur', 'Ready', 1, 1, '5 katha, Almost Ready Residential Plot for Sale at Savar', '5-katha-almost-ready-residential-plot-for-sale-at-savar-1037', 1, 1, 'Dhaka', 19, 'Savar', NULL, NULL, NULL, NULL, 26, 2, 'Rifat Al Islam', NULL, '01923847564', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-27 19:38:37', 26, '2021-09-16 22:15:34', 1, NULL, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(42, 1038, 'sale', 7, 'Land', 'Savar', 'Ready', 1, 1, '10 katha, Under Development Residential Plot for Sale at Savar', '10-katha-under-development-residential-plot-for-sale-at-savar', 1, 1, 'Dhaka', 19, 'Savar', NULL, NULL, NULL, NULL, 26, 2, 'Rifat Al Islam', NULL, '01923847564', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-27 19:42:08', 26, '2021-09-16 22:10:28', 1, NULL, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 15, 0),
(43, 1039, 'sale', 7, 'Land', 'Savar', 'Ready', 1, 1, '3 katha, Under Development Residential Plot for Sale at Savar', '3-katha-under-development-residential-plot-for-sale-at-savar', 1, 1, 'Dhaka', 19, 'Savar', NULL, NULL, NULL, NULL, 26, 2, 'Rifat Al Islam', NULL, '01923847564', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-27 19:44:58', 26, '2021-09-16 22:09:53', 1, NULL, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(44, 1040, 'sale', 7, 'Land', 'savar', 'Ready', 1, 1, '3 katha, Under Development Residential Plot for Sale at Savar', '3-katha-under-development-residential-plot-for-sale-at-savar-1040', 1, 1, 'Dhaka', 19, 'Savar', NULL, NULL, NULL, NULL, 26, 2, 'Rifat Al Islam', NULL, '01923847564', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-27 19:48:16', 26, '2021-09-16 22:09:23', 1, NULL, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(45, 1041, 'sale', 7, 'Land', 'Narayangonj Sadar, Narayanganj', 'Ready', 1, 1, '4 katha, Under Development Residential Plot for Sale at Narayangonj Sadar', '4-katha-under-development-residential-plot-for-sale-at-narayangonj-sadar', 1, 4, 'Narayanganj', 15, 'Narayanganj Sadar', NULL, NULL, NULL, NULL, 27, 2, 'Tarikul Islam', NULL, '01484773892', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-27 19:59:18', 27, '2021-09-16 22:07:29', 1, NULL, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(46, 1042, 'sale', 1, 'Apartment', 'Basundhara', 'Ongoing', 3, 1, '1675 sqft, 3 Beds Under Construction Apartment/Flats for Sale at Bashundhara R/A', '1675-sqft-3-beds-under-construction-apartmentflats-for-sale-at-bashundhara-ra', 1, 1, 'Dhaka', 1, 'Mirpur', 26, 'Mirpur 1 Panirtanki', NULL, NULL, 27, 2, 'Tarikul Islam', NULL, '01484773892', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-27 20:06:11', 27, '2021-09-16 22:05:57', 1, 6, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 23, 0),
(47, 1043, 'rent', 7, 'Land', 'Badda', 'Ongoing', 3, 1, '3-10 katha, Rajuk Approved Ready Residential Plot for Sale at Satarkul, Badda.', '3-10-katha-rajuk-approved-ready-residential-plot-for-sale-at-satarkul-badda', 1, 1, 'Dhaka', 20, 'Badda', NULL, NULL, NULL, NULL, 28, 2, 'ismail munna', NULL, '01708042445', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-27 20:21:31', 28, '2021-09-16 22:03:57', 1, NULL, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(48, 1044, 'sale', 7, 'Land', 'Basundhara', 'Ready', 1, 1, '4 katha, Ready Residential Plot for Sale at Bashundhara R/A', '4-katha-ready-residential-plot-for-sale-at-bashundhara-ra', 1, 1, 'Dhaka', 12, 'Basundhara', NULL, NULL, NULL, NULL, 29, 2, 'anur mia', NULL, '01928374854', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-27 20:28:41', 29, '2021-09-16 22:02:51', 1, NULL, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 40, 0),
(49, 1045, 'sale', 7, 'Land', 'Aftab nagar', 'Ready', 1, 1, '3 katha, Ready Residential Plot for Sale at Aftab Nagar', '3-katha-ready-residential-plot-for-sale-at-aftab-nagar', 1, 1, 'Dhaka', 21, 'Aftab Nagar', NULL, NULL, NULL, NULL, 30, 2, 'Shah', NULL, '01982737464', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-27 20:38:26', 30, '2021-09-16 22:00:52', 1, NULL, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(50, 1046, 'roommate', 1, 'Apartment', 'Mirpur 12', 'Ready', 1, 1, 'sublet Female for a Roommates at Mirpur 12', 'sublet-female-for-a-roommates-at-mirpur-12', 1, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, NULL, NULL, 31, 2, 'Effat ara', NULL, '01675463792', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-27 20:53:28', 31, '2021-09-16 21:58:09', 1, 4, '[\"2\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(51, 1047, 'roommate', 1, 'Apartment', 'mirpur 1', 'Ready', 1, 1, 'Independent Mess Male for a Roommates at Mirpur 1', 'independent-mess-male-for-a-roommates-at-mirpur-1', 1, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, NULL, NULL, 32, 2, 'minhaz', NULL, '01787658769', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-27 20:59:33', 32, '2021-09-16 21:55:52', 1, 3, '[\"2\",\"3\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 50, 0),
(52, 1048, 'rent', 2, 'Office', 'mirpur 1', 'Ready', 1, 1, 'সুদৃশ্য ডেকোরেশনসহ একটি আউটলেট অফিস ভাড়া দেওয়া হবে।', '-1048', 1, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, NULL, NULL, 33, 2, 'Kh Nazmul', NULL, '01523647392', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-27 21:10:15', 33, '2021-09-16 21:40:20', 1, 3, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(53, 1049, 'rent', 3, 'Shop', 'Mirpur 2', 'Used', 4, 1, '1000 sqft, Showroom/Shop/Restaurant for Rent at Mirpur 2', '1000-sqft-showroomshoprestaurant-for-rent-at-mirpur-2', 1, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, NULL, NULL, 34, 2, 'Md. Nurul Islam', NULL, '01978541254', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-28 04:45:25', 34, '2021-09-16 21:38:58', 1, 1, '[\"1\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(54, 1050, 'rent', 1, 'Apartment', 'rampura', 'Used', 4, 1, '1800 sqft, 3 Beds Apartment/Flats for Rent at Rampura', '1800-sqft-3-beds-apartmentflats-for-rent-at-rampura', 1, 1, 'Dhaka', 10, 'Rampura', NULL, NULL, NULL, NULL, 35, 2, 'Rayyan Properties', NULL, '01821547896', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-28 04:55:31', 35, '2021-09-16 21:37:05', 1, 6, '[\"4\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(55, 1051, 'rent', 1, 'Apartment', 'uttara', 'Ready', 1, 1, '1654 sqft, 3 Beds Apartment/Flats for Rent at Uttara', '1654-sqft-3-beds-apartmentflats-for-rent-at-uttara', 1, 1, 'Dhaka', 9, 'Uttara', NULL, NULL, NULL, NULL, 36, 2, 'Md. Riazul Islam', NULL, '01865239874', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-28 05:09:01', 36, '2021-09-16 21:33:22', 1, 6, '[\"4\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(56, 1052, 'rent', 1, 'Apartment', 'Mirpur', 'Used', 4, 1, '1300 sqft, 3 Beds Apartment/Flats for Rent at Mirpur 12', '1300-sqft-3-beds-apartmentflats-for-rent-at-mirpur-12', 1, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, NULL, NULL, 37, 2, 'Md. Abu Zahid', NULL, '071785421365', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-08-28 05:31:29', 37, '2021-09-20 00:36:21', 2, 6, '[\"4\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(57, 1053, 'rent', 1, 'Apartment', 'Basundhara', 'Ready', 1, 1, '2250 sqft, 4 Beds Flats for Rent at Bashundhara R/A', '2250-sqft-4-beds-flats-for-rent-at-bashundhara-ra', 1, 1, 'Dhaka', 12, 'Basundhara', NULL, NULL, NULL, NULL, 38, 2, 'kazi salimuddin', NULL, '01698547993', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-28 05:46:00', 38, '2021-09-16 02:22:51', 1, 5, '[\"5\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(58, 1054, 'rent', 1, 'Apartment', 'Kathalbagan', 'Ready', 1, 1, '1250 sqft, 2 Beds Flats for Rent at Kathalbagan', '1250-sqft-2-beds-flats-for-rent-at-kathalbagan', 1, 1, 'Dhaka', 22, 'Kathalbagan', NULL, NULL, NULL, NULL, 39, 2, 'Dr. Fazle Rabbi', NULL, '01987541254', NULL, NULL, 2, 'Feature Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-28 05:52:44', 39, '2021-09-16 02:21:37', 1, 6, '[\"2\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(59, 1055, 'sale', 5, 'Industrial space', 'Gazipur Sadar', 'Ready', 1, 2, '20000 sqft, Ready Industrial Space for Sale at Gazipur Sadar', '20000-sqft-ready-industrial-space-for-sale-at-gazipur-sadar', 1, 5, 'Gazipur', 24, 'Gazipur Sadar', NULL, NULL, NULL, NULL, 40, 2, 'M.S. Rana', NULL, '01558745698', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-08-28 06:00:35', 40, '2021-09-16 02:20:23', 1, 2, '[\"1\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(60, 1056, 'rent', 1, 'Apartment', 'Basundhara R/A, Dhaka', 'Ready', 1, 1, '100000 sqft, Industrial Space for Rent at dhk-syl highway', '100000-sqft-industrial-space-for-rent-at-dhk-syl-highway', 1, 1, 'Dhaka', 12, 'Basundhara', 0, NULL, NULL, NULL, 45, 2, 'Multicom Industrial Solution', NULL, '01701010000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-13 21:23:46', 45, '2021-09-16 02:18:50', 1, 2, '[\"1\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(61, 1057, 'rent', 5, 'Industrial space', 'Gwsia', 'Ready', 1, 1, '21500 sqft, Industrial Space for Rent at gawsia', '21500-sqft-industrial-space-for-rent-at-gawsia', 1, 1, 'Dhaka', 30, 'Arambagh', 31, 'Gawsia', NULL, NULL, 45, 2, 'Multicom Industrial Solution', NULL, '01701010000', NULL, NULL, 2, 'Feature Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-13 21:54:12', 45, '2021-09-16 02:18:15', 1, 1, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(62, 1058, 'rent', 5, 'Industrial space', 'Gazipur', 'Ready', 1, 1, '30000 sqft, Industrial Space for Rent at Gazipur Sadar', '30000-sqft-industrial-space-for-rent-at-gazipur-sadar', 1, 5, 'Gazipur', 24, 'Gazipur Sadar', NULL, NULL, NULL, NULL, 45, 2, 'Multicom Industrial Solution', NULL, '0170101000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-13 22:03:40', 45, '2021-09-16 02:17:36', 1, 2, '[\"1\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(63, 1059, 'rent', 5, 'Industrial space', 'Gazipur', 'Ready', 1, 1, '175000 sqft, Industrial Space for Rent at Gazipur Sadar', '175000-sqft-industrial-space-for-rent-at-gazipur-sadar', 1, 5, 'Gazipur', 24, 'Gazipur Sadar', NULL, NULL, NULL, NULL, 45, 2, 'Multicom Industrial Solution', NULL, '01701010000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-13 22:16:10', 45, '2021-09-16 02:16:41', 1, 2, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(64, 1060, 'rent', 5, 'Industrial space', 'Gazipur', 'Ready', 1, 1, '120000sqft industrial factory building for rent at gazipur', '120000sqft-industrial-factory-building-for-rent-at-gazipur', 1, 5, 'Gazipur', 24, 'Gazipur Sadar', NULL, NULL, NULL, NULL, 45, 2, 'Multicom Industrial Solution', NULL, '01701010000', NULL, NULL, 3, 'General Listing with daily auto update f', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-13 22:18:04', 45, '2021-09-16 02:16:07', 1, 2, '[\"1\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 10, 0),
(65, 1061, 'rent', 5, 'Industrial space', 'Gazipur', 'Ready', 1, 1, '4000 sqft, Industrial Space for Rent at Gazipur Sadar', '4000-sqft-industrial-space-for-rent-at-gazipur-sadar', 1, 5, 'Gazipur', 24, 'Gazipur Sadar', NULL, NULL, NULL, NULL, 46, 2, 'Mamunur Rashid', NULL, '01987701000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-13 22:21:09', 46, '2021-09-16 02:15:12', 1, 2, '[\"1\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(66, 1062, 'rent', 5, 'Industrial space', 'Konabari, Gazipur', 'Ready', 1, 1, '10000 sqft, Industrial Space for Rent at Konabari', '10000-sqft-industrial-space-for-rent-at-konabari', 1, 5, 'Gazipur', 32, 'Konabari', 0, NULL, NULL, NULL, 47, 2, 'Saif Sajjad khan', NULL, '01818352000', NULL, NULL, 2, 'Feature Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-13 22:30:05', 47, '2021-09-16 02:14:29', 1, 2, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(67, 1063, 'rent', 5, 'Industrial space', 'Tejgaon Industrial Area , Dhaka 1208', 'Ready', 1, 1, 'sqft, Industrial Space for Rent at', 'sqft-industrial-space-for-rent-at', 1, 1, 'Dhaka', 33, 'Karwan Bazaar', 0, NULL, NULL, NULL, 48, 2, 'Imtiaz Ahmed', NULL, '01713068295', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-13 22:38:48', 48, '2021-09-16 02:13:36', 1, 2, '[\"1\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(68, 1064, 'rent', 5, 'Industrial space', 'Uttara, Dhaka', 'Ready', 1, 1, '4000 sqft, Industrial Space for Rent at Uttara', '4000-sqft-industrial-space-for-rent-at-uttara', 1, 1, 'Dhaka', 9, 'Uttara', 0, NULL, NULL, NULL, 49, 2, 'Sheikh Rasel', NULL, '01842174000', NULL, NULL, 4, 'Feature Listing with daily auto update f', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-13 22:48:19', 49, '2021-09-16 02:12:06', 1, 2, '[\"1\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 50, 0),
(69, 1065, 'rent', 5, 'Industrial space', 'Mirpur 7, Mirpur, Dhaka', 'Ready', 1, 1, '15825 sqft, Industrial Space for Rent at Mirpur 7 Industrial Area', '15825-sqft-industrial-space-for-rent-at-mirpur-7-industrial-area', 1, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, NULL, NULL, 50, 2, 'MOHAMMAD MOMINUR RAHMAN', NULL, '01556365000', NULL, NULL, 2, 'Feature Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-13 22:56:20', 50, '2021-09-16 02:11:05', 1, 2, '[\"1\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 20, 0),
(70, 1066, 'rent', 5, 'Industrial space', 'Khan Jahan Ali, Khulna', 'Ready', 1, 1, '28000 sqft, Industrial Space for Rent at Khan Jahan Ali', '28000-sqft-industrial-space-for-rent-at-khan-jahan-ali', 1, 6, 'Khulna', 34, 'Khan Jahan Ali', NULL, NULL, NULL, NULL, 51, 2, 'Imran Hossain Imon', NULL, '0170000000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-13 23:01:09', 51, '2021-09-16 02:10:32', 1, 2, '[\"1\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(71, 1067, 'rent', 5, 'Industrial space', 'Demra, Dhaka', 'Ongoing', 3, 1, '5000 sqft, Industrial Space for Rent at Demra', '5000-sqft-industrial-space-for-rent-at-demra', 1, 1, 'Dhaka', 35, 'Demra', 0, NULL, NULL, NULL, 52, 2, 'Md Mojibur Rahman Tuhin', NULL, '01797192000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-13 23:04:29', 52, '2021-09-16 02:09:44', 1, 2, '[\"1\",\"2\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(72, 1068, 'rent', 5, 'Industrial space', 'Konabari', 'Ready', 1, 1, '19999 sqft, Industrial Space for Rent at Konabari', '19999-sqft-industrial-space-for-rent-at-konabari', 1, 5, 'Gazipur', 32, 'Konabari', 0, NULL, NULL, NULL, 53, 2, 'S.Rahman', NULL, '00174357000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-13 23:08:50', 53, '2021-09-16 02:01:33', 1, 1, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(73, 1069, 'rent', 5, 'Industrial space', 'Konabari', 'Ready', 1, 1, '20000 sqft, Industrial Space for Rent at Konabari', '20000-sqft-industrial-space-for-rent-at-konabari', 1, 5, 'Gazipur', 32, 'Konabari', 0, NULL, NULL, NULL, 53, 2, 'S.Rahman', NULL, '00174357000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-13 23:14:12', 53, '2021-09-16 02:00:57', 1, 1, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(74, 1070, 'rent', 5, 'Industrial space', 'Konabari, Gazipur', 'Ready', 1, 1, '38700 sqft, Industrial Space for Rent at Konabari', '38700-sqft-industrial-space-for-rent-at-konabari', 1, 5, 'Gazipur', 32, 'Konabari', 0, NULL, NULL, NULL, 53, 2, 'S.Rahman', NULL, '00174357000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-13 23:24:34', 53, '2021-09-16 02:00:03', 1, 1, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(75, 1071, 'rent', 5, 'Industrial space', 'Konabari, Gazipur', 'Ready', 1, 1, '4300 sqft, Office Space for Rent at Konabari', '4300-sqft-office-space-for-rent-at-konabari', 1, 5, 'Gazipur', 32, 'Konabari', 0, NULL, NULL, NULL, 53, 2, 'S.Rahman', NULL, '00174357000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-13 23:26:29', 53, '2021-09-16 01:59:24', 1, 1, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(76, 1072, 'rent', 5, 'Industrial space', 'Konabar, Dhaka', 'Ready', 1, 1, '10000 sqft, Industrial Space for Rent at Konabari', '10000-sqft-industrial-space-for-rent-at-konabari-1072', 1, 5, 'Gazipur', 32, 'Konabari', 0, NULL, NULL, NULL, 53, 2, 'Saif Sajjad khan', NULL, '01818352000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-13 23:31:05', 53, '2021-09-16 01:58:17', 1, 1, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(77, 1073, 'rent', 2, 'Office', 'Mirpur', 'Ready', 1, 1, '700 sqft, Office Space for Rent at Mirpur 6', '700-sqft-office-space-for-rent-at-mirpur-6', 1, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, NULL, NULL, 50, 2, 'Morshed', NULL, '01672605000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-13 23:50:37', 50, '2021-09-16 01:57:32', 1, 2, '[\"2\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 13, 0),
(78, 1074, 'sale', 1, 'Apartment', 'Akhalia, Sylhet', 'Ready', 1, 1, '5000 sqft, 6 Beds Ready Independent House for Sale at', '5000-sqft-6-beds-ready-independent-house-for-sale-at', 1, 7, 'Sylhet', 36, 'Akhalia', NULL, NULL, NULL, NULL, 54, 2, 'Ali', NULL, '44795111717', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 00:02:29', 54, '2021-09-16 01:56:37', 1, 3, '[\"1\",\"2\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(79, 1075, 'sale', 1, 'Apartment', 'Akhalia', 'Ready', 1, 1, '1400 sqft, 3 Beds Ready Apartment/Flats for Sale at Akhalia', '1400-sqft-3-beds-ready-apartmentflats-for-sale-at-akhalia', 1, 7, 'Sylhet', 36, 'Akhalia', NULL, NULL, NULL, NULL, 55, 2, 'MERLIN BUILDER\'S', NULL, '01977660000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 00:10:08', 55, '2021-09-16 01:53:03', 1, 6, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(80, 1076, 'sale', 1, 'Apartment', 'Kallyanpur, Dhaka', 'Ongoing', 3, 1, '1380 sqft, 3 Beds Ready Flats for Sale at Kallyanpur', '1380-sqft-3-beds-ready-flats-for-sale-at-kallyanpur', 1, 1, 'Dhaka', 37, 'Kallyanpur', 0, NULL, NULL, NULL, 56, 2, 'SMART PROPERTIES LTD.', NULL, '01755606000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 00:32:04', 56, '2021-09-16 01:52:11', 1, 6, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(81, 1077, 'sale', 1, 'Apartment', 'Kallyanpur', 'Ongoing', 3, 1, '1500 sqft, 3 Beds Under Construction Apartment/Flats for Sale at Kallyanpur', '1500-sqft-3-beds-under-construction-apartmentflats-for-sale-at-kallyanpur', 1, 1, 'Dhaka', 37, 'Kallyanpur', 0, NULL, NULL, NULL, 56, 2, 'SMART PROPERTIES LTD.', NULL, '01755606000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 00:43:01', 56, '2021-09-16 01:51:35', 1, 6, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 15, 0),
(82, 1078, 'sale', 1, 'Apartment', 'Kallyanpur', 'Ongoing', 3, 1, '1800 sqft, 3 Beds Under Construction Apartment/Flats for Sale at Kallyanpur', '1800-sqft-3-beds-under-construction-apartmentflats-for-sale-at-kallyanpur', 1, 1, 'Dhaka', 37, 'Kallyanpur', 0, NULL, NULL, NULL, 56, 2, 'SMART PROPERTIES LTD.', NULL, '01755606000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 00:54:23', 56, '2021-09-16 01:50:58', 1, 6, '[\"3\",\"5\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(83, 1079, 'sale', 1, 'Apartment', 'Kallyanpur', 'Ongoing', 3, 1, '1200 sqft, 3 Beds Under Construction Flats for Sale at Kallyanpur', '1200-sqft-3-beds-under-construction-flats-for-sale-at-kallyanpur', 1, 1, 'Dhaka', 37, 'Kallyanpur', 0, NULL, NULL, NULL, 56, 2, 'SMART PROPERTIES LTD.', NULL, '01755606000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 00:56:26', 56, '2021-09-16 01:50:18', 1, 6, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(84, 1080, 'sale', 1, 'Apartment', 'Kallyanpur', 'Ongoing', 3, 1, '1400 sqft, 3 Beds Under Construction Apartment/Flats for Sale at Kallyanpur', '1400-sqft-3-beds-under-construction-apartmentflats-for-sale-at-kallyanpur', 1, 1, 'Dhaka', 37, 'Kallyanpur', 0, NULL, NULL, NULL, 56, 2, 'SMART PROPERTIES LTD.', NULL, '01755606000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 01:04:50', 56, '2021-09-16 01:49:45', 1, 6, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 15, 0),
(85, 1081, 'sale', 1, 'Apartment', 'Kallyanpur', 'Ongoing', 3, 1, '1200 sqft, 3 Beds Ready Flat for Sale at Kallyanpur', '1200-sqft-3-beds-ready-flat-for-sale-at-kallyanpur', 1, 1, 'Dhaka', 37, 'Kallyanpur', 0, NULL, NULL, NULL, 57, 2, 'Md Shah Jahan Chowdhury', NULL, '01819210000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 01:18:36', 57, '2021-09-16 01:48:57', 1, 6, '[\"3\",\"4\",\"5\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(86, 1082, 'sale', 1, 'Apartment', 'Mirpur', 'Ready', 1, 1, '৬ তালা কমপ্লিট বাড়ি আকর্ষণীয় লোকেশনে মিরপুর ২', '-1082', 1, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, NULL, NULL, 58, 2, 'Munia Aman', NULL, '01990005000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 01:28:36', 58, '2021-09-16 01:47:49', 1, 6, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 10, 0),
(87, 1083, 'sale', 1, 'Apartment', 'Tongi', 'Ready', 1, 1, '1600 sqft, 1 Bed Ready Independent House for Sale at Tongi', '1600-sqft-1-bed-ready-independent-house-for-sale-at-tongi', 1, 5, 'Gazipur', 38, 'Tongi', 0, NULL, NULL, NULL, 59, 2, 'Mahamudul Hasan Nayem', NULL, '01536108000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 01:46:10', 59, '2021-09-16 01:46:24', 1, 3, '[\"1\",\"2\",\"3\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(89, 1084, 'sale', 8, 'Flats', 'Tongi', 'Semi Ready', 2, 1, '980 sqft, 3 Beds Under Construction Apartment/Flats for Sale at Tongi', '980-sqft-3-beds-under-construction-apartmentflats-for-sale-at-tongi', 1, 5, 'Gazipur', 38, 'Tongi', 0, NULL, NULL, NULL, 60, 2, 'Sahera Khatun', NULL, '01714832000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 02:08:46', 60, '2021-09-16 01:41:15', 1, NULL, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 58, 0),
(90, 1085, 'rent', 5, 'Industrial space', 'Savar', 'Ready', 1, 1, '70000 sqft, Industrial Space for Rent at Savar', '70000-sqft-industrial-space-for-rent-at-savar', 1, 1, 'Dhaka', 19, 'Savar', 0, NULL, NULL, NULL, 61, 2, 'asif aftab', NULL, '01819408000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 20:23:47', 61, '2021-09-16 01:39:30', 1, 1, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 20, 0),
(91, 1086, 'rent', 2, 'Office', 'Savar', 'Ready', 1, 1, '1550 sqft, Office Space for Rent at Savar', '1550-sqft-office-space-for-rent-at-savar', 1, 1, 'Dhaka', 19, 'Savar', 0, NULL, NULL, NULL, 62, 2, 'Salim Hassan', NULL, '01799733000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 20:26:07', 62, '2021-09-16 01:37:41', 1, 1, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 20, 0),
(92, 1087, 'rent', 5, 'Industrial space', 'Dhour, Dhaka', 'Ready', 1, 1, '6998 sqft, Industrial Space for Rent at Dhour', '6998-sqft-industrial-space-for-rent-at-dhour', 1, 1, 'Dhaka', 1, 'Mirpur', 39, 'Dhour', NULL, NULL, 63, 2, 'Nazmul Rahman', NULL, '01674379000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 20:29:01', 63, '2021-09-16 01:23:08', 1, 1, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(93, 1088, 'rent', 5, 'Industrial space', 'Purbachal', 'Ongoing', 3, 1, '100000 sqft, Industrial Space for Rent at Purbachal', '100000-sqft-industrial-space-for-rent-at-purbachal', 1, 1, 'Dhaka', 18, 'Purbachal', 0, NULL, NULL, NULL, 63, 2, 'Times Square ltd', NULL, '01939993000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 20:31:50', 63, '2021-09-16 01:22:29', 1, 1, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 23, 0),
(94, 1089, 'rent', 5, 'Industrial space', 'Gazipur', 'Ready', 1, 2, '18000 sqft, Industrial Space for Rent at Gazipur Sadar', '18000-sqft-industrial-space-for-rent-at-gazipur-sadar', 1, 5, 'Gazipur', 24, 'Gazipur Sadar', NULL, NULL, NULL, NULL, 63, 2, 'Zahidul Islam', NULL, '01791498000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 20:33:38', 63, '2021-09-16 01:21:26', 1, 1, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 15, 0),
(95, 1090, 'rent', 5, 'Industrial space', 'Pallabi', 'Ready', 1, 1, '3150 sqft, Industrial Space for Rent at Pallabi', '3150-sqft-industrial-space-for-rent-at-pallabi', 1, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, NULL, NULL, 63, 2, 'Md.Kamruzzaman Shagor', NULL, '01919588000', NULL, NULL, 3, 'General Listing with daily auto update f', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 20:37:47', 63, '2021-09-16 01:20:17', 1, 1, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 10, 0),
(96, 1091, 'sale', 3, 'Shop', 'Dhanmondi', 'Semi Ready', 2, 2, '195 sqft, Ready Showroom/Shop/Restaurant for Sale at Dhanmondi', '195-sqft-ready-showroomshoprestaurant-for-sale-at-dhanmondi', 1, 1, 'Dhaka', 40, 'Dhanmondi', 0, NULL, NULL, NULL, 64, 2, 'Harun Or Rashid', NULL, '01911359', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 20:45:00', 64, '2021-09-16 01:18:51', 1, 6, '[\"3\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(97, 1092, 'sale', 3, 'Shop', 'Uttara', 'Ready', 1, 2, '239 sqft, Ready Showroom/Shop/Restaurant for Sale at Uttara', '239-sqft-ready-showroomshoprestaurant-for-sale-at-uttara', 1, 1, 'Dhaka', 9, 'Uttara', 0, NULL, NULL, NULL, 64, 2, 'Rawha khan', NULL, '01797520000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 20:56:55', 64, '2021-09-16 01:17:55', 1, 1, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(98, 1093, 'sale', 2, 'Office', 'Uttara', 'Ready', 1, 2, '441 sqft, Handed Over Office Space for Sale at Uttara', '441-sqft-handed-over-office-space-for-sale-at-uttara', 1, 1, 'Dhaka', 9, 'Uttara', 0, NULL, NULL, NULL, 64, 2, 'Md. Majidul Haque Bhuiyan', NULL, '01749750000', NULL, NULL, 2, 'Feature Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 20:58:45', 64, '2021-09-16 01:16:53', 1, 6, '[\"2\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(99, 1094, 'sale', 3, 'Shop', 'Uttara', 'Ready', 1, 2, '228 sqft, Ready Showroom/Shop/Restaurant for Sale at Uttara', '228-sqft-ready-showroomshoprestaurant-for-sale-at-uttara', 1, 1, 'Dhaka', 9, 'Uttara', 0, NULL, NULL, NULL, 64, 2, 'Aziz Rahman', NULL, '01315632000', NULL, NULL, 3, 'General Listing with daily auto update f', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 21:00:38', 64, '2021-09-16 01:16:14', 1, 1, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 32, 0),
(100, 1095, 'sale', 2, 'Office', 'Tongi', 'Ready', 1, 2, '33000 sqft, Under Construction Office Space for Sale at Tongi, Ashulia', '33000-sqft-under-construction-office-space-for-sale-at-tongi-ashulia', 1, 5, 'Gazipur', 38, 'Tongi', 0, NULL, NULL, NULL, 64, 2, 'Tech Business Solution', NULL, '01969456000', NULL, NULL, 4, 'Feature Listing with daily auto update f', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 21:02:22', 64, '2021-09-16 01:15:34', 1, 1, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(101, 1096, 'sale', 3, 'Shop', 'Uttara', 'Ready', 1, 2, '150 sqft, Ready Showroom/Shop/Restaurant for Sale at Uttara', '150-sqft-ready-showroomshoprestaurant-for-sale-at-uttara', 1, 1, 'Dhaka', 9, 'Uttara', 0, NULL, NULL, NULL, 64, 2, 'Syed Mohammed Meharab Ahsan', NULL, '01689519000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 21:04:29', 64, '2021-09-16 01:14:58', 1, 1, 'null', '2021-10-16', 10, 1, 1, 0, 0, 1, 63, 0),
(102, 1097, 'sale', 1, 'Apartment', 'Banani', 'Ready', 1, 2, '1800 sqft, Ready Showroom/Shop/Restaurant for Sale at Banasree', '1800-sqft-ready-showroomshoprestaurant-for-sale-at-banasree', 1, 1, 'Dhaka', 2, 'Banani', 0, NULL, NULL, NULL, 64, 2, 'Arshinagar Construction Ltd.', NULL, '01610350000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 21:06:28', 64, '2021-09-29 20:42:14', 2, 3, '[\"2\"]', '2021-10-16', 10, 1, 1, 15, 0, 1, 96, 0),
(103, 1098, 'sale', 3, 'Shop', 'Shantinagar', 'Ready', 1, 2, '125 sqft, Ready Shop for Sale at Shantinagar', '125-sqft-ready-shop-for-sale-at-shantinagar', 1, 1, 'Dhaka', 41, 'Shantinagar', 0, NULL, NULL, NULL, 64, 2, 'Shaikat Khan', NULL, '01683458000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 21:08:59', 64, '2021-09-16 01:11:59', 1, 4, '[\"2\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 5, 0),
(104, 1099, 'sale', 3, 'Shop', 'Shantinagar', 'Ready', 1, 1, '88 sqft, Ready Shop for Sale at Shantinagar', '88-sqft-ready-shop-for-sale-at-shantinagar', 1, 1, 'Dhaka', 41, 'Shantinagar', 0, NULL, NULL, NULL, 64, 2, 'AR diamond', NULL, '01797270000', NULL, NULL, 2, 'Feature Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 21:10:27', 64, '2021-09-16 01:09:26', 1, 4, '[\"2\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 0, 0),
(105, 1100, 'sale', 3, 'Shop', 'Karwan Bazaar', 'Ready', 1, 1, '4500 sqft, Ready Showroom/Shop/Restaurant for Sale at Kawran Bazar', '4500-sqft-ready-showroomshoprestaurant-for-sale-at-kawran-bazar', 1, 1, 'Dhaka', 33, 'Karwan Bazaar', 0, NULL, NULL, NULL, 65, 2, 'RUMANA PROPERTIES LTD', NULL, '0179209000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 21:13:03', 65, '2021-09-18 23:35:28', 1, 6, '[\"2\"]', '2021-10-16', 10, 1, 1, 0, 0, 1, 12, 0),
(106, 1101, 'sale', 1, 'Apartment', 'Karwan Bazaar', 'Ready', 1, 1, '1350 sqft, 3 Beds Ready Apartment/Flats for Sale at Kawran Bazar', '1350-sqft-3-beds-ready-apartmentflats-for-sale-at-kawran-bazar', 1, 1, 'Dhaka', 2, 'Banani', 0, NULL, NULL, NULL, 65, 2, 'Rumana Properties Ltd', NULL, '01792090000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-14 21:15:41', 65, '2021-09-23 01:33:39', 2, 6, '[\"4\",\"5\",\"6\"]', '2021-10-16', 10, 1, 1, 10, 0, 1, 50, 0);
INSERT INTO `prd_listings` (`id`, `code`, `property_for`, `f_property_type_no`, `property_type`, `address`, `property_condition`, `f_property_condition`, `price_type`, `title`, `url_slug`, `url_slug_locked`, `f_city_no`, `city_name`, `f_area_no`, `area_name`, `f_subarea_no`, `subarea_name`, `road`, `house`, `f_user_no`, `user_type`, `contact_person1`, `contact_person2`, `mobile1`, `mobile2`, `mobile3`, `f_listing_type`, `listing_type`, `f_prep_tenant_no`, `prep_tenant`, `available_from`, `gender`, `is_verified`, `verified_by`, `verified_at`, `created_at`, `created_by`, `modified_at`, `modified_by`, `total_floors`, `floors_avaiable`, `expaired_at`, `status`, `payment_status`, `ci_payment`, `ci_price`, `is_top`, `payment_auto_renew`, `max_sharing_permission`, `agent_commission_amt`) VALUES
(107, 1102, 'sale', 7, 'Land', 'Purbachal', 'Ready', 1, 1, '5 katha, Ready Residential Plot for Sale at Purbachal', '5-katha-ready-residential-plot-for-sale-at-purbachal-1102', 0, 1, 'Dhaka', 18, 'Purbachal', NULL, NULL, NULL, NULL, 17, 5, 'Purbachal Marine City', NULL, '01617517000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-09-28 02:07:21', 17, '2021-09-28 02:09:01', 17, 1, 'null', NULL, 0, 0, 0, 10, 0, 1, 0, 0),
(108, 1103, 'sale', 7, 'Land', 'Purbachal', 'Ready', 1, 1, '3 katha,Residential Plot for Sale at Purbachal', '3-katharesidential-plot-for-sale-at-purbachal-1103', 0, 1, 'Dhaka', 18, 'Purbachal', 0, NULL, NULL, NULL, 17, 5, 'Purbachal Marine City', NULL, '01617517000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-09-28 02:19:17', 17, '2021-09-28 02:19:17', NULL, NULL, NULL, NULL, 0, 0, 0, 10, 0, 1, 0, 10),
(109, 1104, 'sale', 1, 'Apartment', 'Banani', 'Ongoing', 3, 1, '2507 sqft, 3 Beds Under Construction Flats for Sale at Banani', '2507-sqft-3-beds-under-construction-flats-for-sale-at-banani', 0, 1, 'Dhaka', 2, 'Banani', 0, NULL, NULL, NULL, 17, 5, 'Anwar Landmark Ltd', NULL, '01973091000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-09-28 02:23:34', 17, '2021-09-28 02:23:34', NULL, 6, '[\"3\",\"4\",\"5\"]', NULL, 0, 0, 0, 10, 0, 1, 0, 10),
(110, 1105, 'sale', 2, 'Office', 'Uttara', 'Ongoing', 3, 1, '1216 sqft, Under Construction Office Space for Sale at Uttara', '1216-sqft-under-construction-office-space-for-sale-at-uttara', 0, 1, 'Dhaka', 9, 'Uttara', 0, NULL, NULL, NULL, 17, 5, 'Quantum Properties Ltd.', NULL, '01922115000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-09-28 02:30:01', 17, '2021-09-28 02:30:01', NULL, 6, '[\"1\",\"2\"]', NULL, 0, 0, 0, 10, 0, 1, 0, 10),
(111, 1106, 'rent', 3, 'Shop', '4 Zakuir Hossain road West Chittagong', 'Ready', 1, 1, '133 sqft, Showroom/Shop/Restaurant for Rent at Khulshi', '133-sqft-showroomshoprestaurant-for-rent-at-khulshi', 0, 2, 'Chittagong', 42, 'Khulshi', 0, NULL, NULL, NULL, 17, 5, 'Md.mamun', NULL, '01811019000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-09-28 02:34:37', 17, '2021-09-28 02:34:37', NULL, 2, '[\"1\"]', NULL, 0, 0, 0, 10, 0, 1, 0, 10),
(112, 1107, 'rent', 3, 'Shop', 'Khulshi', 'Ready', 1, 1, '1280 sqft, Office Space for Rent at Khulshi', '1280-sqft-office-space-for-rent-at-khulshi', 0, 2, 'Chittagong', 42, 'Khulshi', 0, NULL, NULL, NULL, 17, 5, 'Abu Sayed Raybi', NULL, '01844637000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-09-28 02:36:36', 17, '2021-09-28 02:36:36', NULL, 2, '[\"1\"]', NULL, 0, 0, 0, 10, 0, 1, 0, 10),
(113, 1108, 'rent', 3, 'Shop', 'Dhanmondi', 'Ready', 1, 1, '3800 sqft, Showroom/Shop/Restaurant for Rent at Dhanmondi', '3800-sqft-showroomshoprestaurant-for-rent-at-dhanmondi', 0, 1, 'Dhaka', 40, 'Dhanmondi', 0, NULL, NULL, NULL, 17, 5, 'Faisal', NULL, '01711193000', NULL, NULL, 1, 'General Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-09-28 02:38:49', 17, '2021-09-28 02:38:49', NULL, 6, '[\"1\",\"2\",\"6\"]', NULL, 0, 0, 0, 10, 0, 1, 0, 10),
(114, 1109, 'rent', 3, 'Shop', 'Khilgaon', 'Ready', 1, 1, '1250 sqft, Showroom/Shop/Restaurant for Rent at Khilgaon', '1250-sqft-showroomshoprestaurant-for-rent-at-khilgaon', 0, 1, 'Dhaka', 43, 'Khilgaon', 0, NULL, NULL, NULL, 17, 5, 'Kazi Rahat Mostafa', NULL, '01685447000', NULL, NULL, 3, 'General Listing with daily auto update f', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-09-28 02:42:06', 17, '2021-09-28 02:42:06', NULL, 3, '[\"2\"]', NULL, 0, 0, 0, 10, 0, 1, 0, 10),
(115, 1110, 'rent', 3, 'Shop', 'Mirpur 1', 'Ready', 1, 1, '730 sqft, Showroom/Shop/Restaurant for Rent at Mirpur 1', '730-sqft-showroomshoprestaurant-for-rent-at-mirpur-1', 0, 1, 'Dhaka', 1, 'Mirpur', 0, NULL, NULL, NULL, 17, 5, 'MUHAMMAD CHANCHAL AZAD', NULL, '01700677000', NULL, NULL, 2, 'Feature Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-09-28 02:44:25', 17, '2021-09-28 02:44:25', NULL, 2, '[\"1\"]', NULL, 0, 0, 0, 10, 0, 1, 0, 10),
(116, 1111, 'rent', 3, 'Shop', 'Mirpur 2', 'Ready', 1, 1, '1000 sqft, Showroom/Shop/Restaurant for Rent at Mirpur 2', '1000-sqft-showroomshoprestaurant-for-rent-at-mirpur-2-1111', 1, 1, 'Dhaka', 1, 'Mirpur', NULL, NULL, NULL, NULL, 17, 5, 'MUHAMMAD CHANCHAL AZAD', NULL, '01700677000', NULL, NULL, 4, 'Feature Listing with daily auto update f', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2021-09-28 02:45:44', 17, '2023-03-05 14:21:14', 1, 2, '[\"1\"]', NULL, 0, 0, 1, 10, 0, 1, 0, 10),
(117, 1112, 'sale', 1, 'Apartment', '4,3,Mirpur 1 Panirtanki,Mirpur,Dhaka', 'Ready', 1, 1, 'flat', 'flat', 0, 1, 'Dhaka', 1, 'Mirpur', 26, 'Mirpur 1 Panirtanki', NULL, NULL, 13, 2, 'maidul1', NULL, '123456', '015655458', '058965544', 2, 'Feature Listing for 30 days', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-12 20:27:30', 13, '2022-05-12 20:27:30', NULL, 4, '[\"2\",\"3\"]', NULL, 0, 0, 0, 10, 0, 1, 0, 0);

--
-- Triggers `prd_listings`
--
DELIMITER $$
CREATE TRIGGER `after_prd_listings_delete` AFTER DELETE ON `prd_listings` FOR EACH ROW begin

declare var_total_listing int(10) default 0;
declare var_total_type_listing int(10) default 0;
declare var_total_listing_city int(10) default 0;

select count(*) into var_total_listing from prd_listings where f_user_no = old.f_user_no and status <> 50 ;
update users set total_listing =  var_total_listing where id = old.f_user_no;


select count(*) into var_total_type_listing from prd_listings where f_property_type_no = old.f_property_type_no and status = 10 ;
select count(*) into var_total_listing_city from prd_listings where f_city_no = old.f_city_no and status = 10 ;

update prd_property_type set total_listing =  var_total_type_listing where id = old.f_property_type_no;
update ss_city set total_listing =  var_total_listing_city where id = old.f_city_no; 



delete from prd_listing_variants where f_listing_no = old.id;

end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_prd_listings_insert` AFTER INSERT ON `prd_listings` FOR EACH ROW begin

declare var_total_listing int(10) default 0;



select count(*) into var_total_listing from prd_listings where f_user_no = new.f_user_no and status <> 50 ;



update users set total_listing =  var_total_listing where id = new.f_user_no;



end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_prd_listings_update` AFTER UPDATE ON `prd_listings` FOR EACH ROW begin

declare var_total_listing int(10) default 0;
declare var_total_type_listing int(10) default 0;
declare var_total_listing_city int(10) default 0;

select count(*) into var_total_listing from prd_listings where f_user_no = new.f_user_no and status <> 50 ;
update users set total_listing =  var_total_listing where id = new.f_user_no;


select count(*) into var_total_type_listing from prd_listings where f_property_type_no = new.f_property_type_no and status = 10 ;
select count(*) into var_total_listing_city from prd_listings where f_city_no = new.f_city_no and status = 10 ;

update prd_property_type set total_listing =  var_total_type_listing where id = new.f_property_type_no;
update ss_city set total_listing =  var_total_listing_city where id = new.f_city_no; 



end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_prd_listings_insert` BEFORE INSERT ON `prd_listings` FOR EACH ROW begin

declare var_code int(40) default 0;
declare var_city_name varchar(40) default null;
declare var_area_name varchar(40) default null;
declare var_subarea_name varchar(40) default null;
declare var_property_type varchar(40) default null;
declare var_property_condition varchar(40) default null;
declare var_listing_type varchar(40) default null;
declare var_ci_price float default 0;
declare var_agent_commission_amt float default 0;


select ifnull(max(code),1000) into var_code from prd_listings;
select city_name into var_city_name from ss_city where id = new.f_city_no;
select area_name into var_area_name from ss_area where id = new.f_area_no;
select area_name into var_subarea_name from ss_area where id = new.f_subarea_no;
select property_type into var_property_type from prd_property_type where id = new.f_property_type_no;
select prod_condition into var_property_condition from prd_property_condition where id = new.f_property_condition;
select name into var_listing_type from prd_listing_type where id = new.f_listing_type;

select case 
when new.property_for = 'sale' then ci_view_sales_price 
when new.property_for = 'rent' then ci_view_rent_price
when new.property_for = 'roommate' then ci_view_roommate_price
else 0
end 
into var_ci_price from ss_lead_price; 

if new.user_type = 5 then 
select case 
when new.property_for = 'sale' then lead_view_sales_price 
when new.property_for = 'rent' then lead_view_rent_price
when new.property_for = 'roommate' then lead_view_roommate_price
else 0
end
into var_agent_commission_amt from ss_lead_price;
end if;


set new.code = var_code+1;
set new.city_name = var_city_name;
set new.area_name = var_area_name;
set new.subarea_name = var_subarea_name;
set new.property_type = var_property_type;
set new.property_condition = var_property_condition;
set new.listing_type = var_listing_type;
set new.ci_price = var_ci_price;
set new.agent_commission_amt = var_agent_commission_amt;

end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_prd_listings_update` BEFORE UPDATE ON `prd_listings` FOR EACH ROW begin

declare var_city_name varchar(40) default null;
declare var_area_name varchar(40) default null;
declare var_subarea_name varchar(40) default null;
declare var_property_type varchar(40) default null;
declare var_property_condition varchar(40) default null;
declare var_listing_type varchar(40) default null;

select city_name into var_city_name from ss_city where id = new.f_city_no;
select area_name into var_area_name from ss_area where id = new.f_area_no;
select area_name into var_subarea_name from ss_area where id = new.f_subarea_no;
select property_type into var_property_type from prd_property_type where id = new.f_property_type_no;
select prod_condition into var_property_condition from prd_property_condition where id = new.f_property_condition;
select name into var_listing_type from prd_listing_type where id = new.f_listing_type;

set new.city_name = var_city_name;
set new.area_name = var_area_name;
set new.subarea_name = var_subarea_name;
set new.property_type = var_property_type;
set new.property_condition = var_property_condition;
set new.listing_type = var_listing_type;

end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `prd_listings_seo`
--

CREATE TABLE `prd_listings_seo` (
  `id` int(10) NOT NULL,
  `f_listing_no` int(10) DEFAULT NULL,
  `meta_title` varchar(100) DEFAULT NULL,
  `meta_description` varchar(300) DEFAULT NULL,
  `meta_url` varchar(100) DEFAULT NULL,
  `og_image_path` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prd_listings_seo`
--

INSERT INTO `prd_listings_seo` (`id`, `f_listing_no`, `meta_title`, `meta_description`, `meta_url`, `og_image_path`) VALUES
(1, 14, 'Hostel Male for a Roommates/Paying Guest', 'Hostel Male for a Roommates/Paying', 'hostel-male-roommate', 'uploads/listings/14/seo/614374e302a93.jpg'),
(2, 6, '1478 sqft, 3 Beds Under Construction Apartment/Flats', 'description Under Construction Apartment/Flats for Sale at Eskaton', '1478-sqft-3-beds-under-construction', 'uploads/listings/6/seo/6143765e31fa8.jpeg'),
(3, 59, '20000 sqft, Ready Industrial Space for Sale at Gazip', '20000 sqft, Ready Industrial S', '20000-sqft-ready-industrial-space-for-sale-at-gazipur-sadar', 'uploads/listings/59/seo/61425587505a2.jpg'),
(4, 15, '1125 sqft, 3 Beds Ready Studio Apartment fo title', '1125 sqft, 3 Beds Ready Studio description', '1125-sqft-3-beds-ready-studio-apartment-for-sale-at-cantonment', 'uploads/listings/15/seo/6143726707859.jpeg'),
(5, 58, '1250 sqft, 2 Beds', '1250 sqft, 2 Beds Flats for Rent', '1250-sqft-2-beds-flats-for-rent-at-kathalbagan', 'uploads/listings/58/seo/614255d150e36.jpeg'),
(6, 106, '1350 sqft, 3 Beds Ready Apartment/Flats for Sale at Kawran Bazar 1', '1350 sqft, 3 Beds Ready Apartment/Flats for Sale at Kawran Bazar meta description', '1350-sqft-3-beds-ready-apartmentflats-for-sale-at-kawran-bazar', 'uploads/listings/106/seo/614237aea4281.jpg'),
(7, 105, '4500 sqft, Ready Showroom/Shop/Restaurant for Sale Kawran Bazar', '4500 sqft, Ready Showroom/Shop/Restaurant for Sale at Kawran Bazar meta des', '4500-sqft-ready-showroomshoprestaurant-for-sale-at-kawran-bazar', 'uploads/listings/105/seo/614244a4a9b5f.jpg'),
(8, 104, '88 sqft, Ready Shop for Sale', 'meta description 88 sqft, Ready Shop for Sale at Shantinagar', '88-sqft-ready-shop-for-sale-at-shantinagar', 'uploads/listings/104/seo/614244e677a6c.jpg'),
(9, 103, '125 sqft, Ready Shop for Sale at Shanti', '125 sqft, Ready Shop for Sale at Shantinagar 2', '125-sqft-ready-shop-for-sale-at-shantinagar', 'uploads/listings/103/seo/6142457f4d5ee.jpg'),
(10, 102, '1800 sqft, Ready Showroom/Shop/Restaurant for Sale 2', '1800 sqft, Ready Showroom/Shop/Restaurant for Sale 4', '1800-sqft-ready-showroomshoprestaurant-for-sale-at-banasree', 'uploads/listings/102/seo/614245c2c255a.jpg'),
(11, 101, '150 sqft, Ready Showroom/Shop/Restaurant', '150 sqft, Ready Showroom/Shop/Restaurant 3', '150-sqft-ready-showroomshoprestaurant-for-sale-at-uttara', 'uploads/listings/101/seo/614246323589f.jpg'),
(12, 100, '33000 sqft, Under Construction Office Space', '33000 sqft, Under Construction Office meta description', '33000-sqft-under-construction-office-space-for-sale-at-tongi-ashulia', 'uploads/listings/100/seo/6142465663ad7.jpg'),
(13, 99, '228 sqft, Showroom/Shop/Restaurant for Sale at Uttara', '228 sqft, Ready Showroom/Shop/Restaurant for Sale description', '228-sqft-ready-showroomshoprestaurant-for-sale-at-uttara', 'uploads/listings/99/seo/6142467e9c742.jpg'),
(14, 98, '441 sqft, Handed Over Office Space', '441 sqft, Handed Over Office Space meta description', '441-sqft-handed-over-office-space-for-sale-at-uttara', 'uploads/listings/98/seo/614246a52051a.jpg'),
(15, 97, '239 sqft, Ready Showroom/Shop 1', '239 sqft, Ready Showroom/Shop meta description', '239-sqft-ready-showroomshoprestaurant-for-sale-at-uttara', 'uploads/listings/97/seo/614246e3754ab.jpg'),
(16, 96, '195 sqft, Ready Showroom/Shop/Restaurant for Sale at Dhanmondi 1', '195 sqft, Ready Showroom/Shop/Restaurant for Sale at Dhanmondi 1 meta description', '195-sqft-ready-showroomshoprestaurant-for-sale-at-dhanmondi', 'uploads/listings/96/seo/6142471b7b720.jpg'),
(17, 95, '3150 sqft, Industrial Space for Rent at Pallabi 23', '3150 sqft, Industrial Space for Rent at Pallabi 34 meta description', '3150-sqft-industrial-space-for-rent-at-pallabi', 'uploads/listings/95/seo/61424771175f7.jpg'),
(18, 94, '18000 sqft, Industrial Space for Rent at dhaka', '18000 sqft, Industrial Space for Rent at dhaka description', '18000-sqft-industrial-space-for-rent-at-gazipur-sadar', 'uploads/listings/94/seo/614247b6eecdc.jpg'),
(19, 93, '100000 sqft, Industrial Space for Rent at', '100000 sqft, Industrial Space for Rent description', '100000-sqft-industrial-space-for-rent-at-purbachal', 'uploads/listings/93/seo/614247f5b68e0.png'),
(20, 92, '6998 sqft, Industrial Space for23', 'meta description 6998 sqft, Industrial Space for Rent at Dhour', '6998-sqft-industrial-space-for-rent-at-dhour', 'uploads/listings/92/seo/6142481ca2552.jpg'),
(21, 91, '1550 sqft, Office Space for Rent at Savar 1', '1550 sqft, Office Space for Rent at Savar 1 description', '1550-sqft-office-space-for-rent-at-savar', 'uploads/listings/91/seo/61424b85ed78b.jpg'),
(22, 90, '70000 sqft, Industrial Space for Rent at Savar 34', '70000 sqft, Industrial Space for Rent at Savar 43 meta des', '70000-sqft-industrial-space-for-rent-at-savar', 'uploads/listings/90/seo/61424bf2bbf63.jpg'),
(23, 89, '980 sqft, 3 Beds Under Construction Apartment/Flats', '980 sqft, 3 Beds Under Construction Apartment/Flats description', '980-sqft-3-beds-under-construction-apartmentflats-for-sale-at-tongi', 'uploads/listings/89/seo/61424c5bd25be.jpg'),
(24, 87, '1600 sqft, 1 Bed Ready Independent House for', '1600 sqft, 1 Bed Ready Independent House for meta description', '1600-sqft-1-bed-ready-independent-house-for-sale-at-tongi', 'uploads/listings/87/seo/61424d902532b.jpg'),
(25, 86, '৬ তালা কমপ্লিট বাড়ি আকর্ষণীয় লোকেশনে মিরপুর', 'meat description 3 তালা কমপ্লিট বাড়ি আকর্ষণীয় লোকেশনে মিরপুর', '-1082', 'uploads/listings/86/seo/61424de59f4c0.jpg'),
(26, 85, '1200 sqft, 3 Beds Ready Flat for Sale', '1200 sqft, 3 Beds Ready Flat for', '1200-sqft-3-beds-ready-flat-for-sale-at-kallyanpur', 'uploads/listings/85/seo/61424e297688d.jpg'),
(27, 84, '1400 sqft, 3 Beds Under Construction Apartment/Flats', '1400 sqft, 3 Beds Under Construction Apartment/Flats meta', '1400-sqft-3-beds-under-construction-apartmentflats-for-sale-at-kallyanpur', 'uploads/listings/84/seo/61424e5918ed7.jpeg'),
(28, 83, '1200 sqft, 3 Beds Flats for Sale at Kallyanpur', '1200 sqft, 3 Beds Flats for Sale at Kallyanpur meta desc', '1200-sqft-3-beds-under-construction-flats-for-sale-at-kallyanpur', 'uploads/listings/83/seo/61424e7a576d3.jpg'),
(29, 82, '1800 sqft, 5 Beds Under Construction Apartment/Flats for Sale at Kallyanpur', '1800 sqft, 4 Beds Under Construction Apartment/Flats for Sale at Kallyanpur', '1800-sqft-3-beds-under-construction-apartmentflats-for-sale-at-kallyanpur', 'uploads/listings/82/seo/61424ea2ce7bb.jpg'),
(30, 81, '1500 sqft, 3 Beds Under Construction Apartment/Flats', '1500 sqft, 3 Beds Under Construction Apartment/Flats meta', '1500-sqft-3-beds-under-construction-apartmentflats-for-sale-at-kallyanpur', 'uploads/listings/81/seo/61424ec7bbdf1.jpeg'),
(31, 80, '1000 sqft, 1 Beds Ready Flats for Sale at Kallyanpur', '1000 sqft, 1 Beds Ready Flats for Sale at Kallyanpur meta description', '1380-sqft-3-beds-ready-flats-for-sale-at-kallyanpur', 'uploads/listings/80/seo/61424eebc79db.jpg'),
(32, 79, '1400 sqft, 3 Beds Ready Apartment/Flats', '1200 sqft, 2 Beds Ready Apartment/Flats for Sale at Akhalia', '1400-sqft-3-beds-ready-apartmentflats-for-sale-at-akhalia', 'uploads/listings/79/seo/61424f1fe867a.jpeg'),
(33, 78, '5000 sqft, 6 Beds Ready Independent House for Sale at sylhet', '5000 sqft, 6 Beds Ready Independent House for Sale meta desc', '5000-sqft-6-beds-ready-independent-house-for-sale-at', 'uploads/listings/78/seo/61424ff533db2.jpg'),
(34, 77, '700 sqft, Office Space for Rent', '700 sqft, Office Space for Rent at Mirpur', '700-sqft-office-space-for-rent-at-mirpur-6', 'uploads/listings/77/seo/6142502c2b24f.jpg'),
(35, 76, '10000 sqft, Industrial area for Rent at Konabari', '10000 sqft, space for Rent at Konabari', '10000-sqft-industrial-space-for-rent-at-konabari-1072', 'uploads/listings/76/seo/61425059c337e.jpg'),
(36, 75, '1230 sqft, Office Space for Rent at Konabari', '522 sqft, Office Space for Rent at Konabari', '4300-sqft-office-space-for-rent-at-konabari', 'uploads/listings/75/seo/6142509cdc885.jpeg'),
(37, 74, '38700 sqft, Industrial Space for', '38700 sqft, Industrial Space for Rent at K', '38700-sqft-industrial-space-for-rent-at-konabari', 'uploads/listings/74/seo/614250c3da965.jpg'),
(38, 73, '20000 sqft, Industrial Space', '20000 sqft, Industrial meta description', '20000-sqft-industrial-space-for-rent-at-konabari', 'uploads/listings/73/seo/614250f9e7e1a.jpg'),
(39, 72, '19999 sqft,Space for Rent at Konabari', '1450  sqft, Industrial Space for Rent at Konabari', '19999-sqft-industrial-space-for-rent-at-konabari', 'uploads/listings/72/seo/6142511d1b044.jpg'),
(40, 71, '5000 sqft, Industrial Space for Rent', '5000 sqft, Industrial Space for Rent at Demra meta description', '5000-sqft-industrial-space-for-rent-at-demra', 'uploads/listings/71/seo/6142530816152.jpg'),
(41, 70, '28000 sqft, Industrial Space for Rent at Kha', '28000 sqft, Industrial Space for Rent', '28000-sqft-industrial-space-for-rent-at-khan-jahan-ali', 'uploads/listings/70/seo/61425338f1803.jpg'),
(42, 69, '15825 sqft, Industrial Space for Rent at Mirpur', '15825 sqft, Industrial Space for Rent at', '15825-sqft-industrial-space-for-rent-at-mirpur-7-industrial-area', 'uploads/listings/69/seo/61425359d97fe.jpg'),
(43, 68, '4000 sqft, Industrial Space', '4000 sqft, Space for Rent at Uttara', '4000-sqft-industrial-space-for-rent-at-uttara', 'uploads/listings/68/seo/614253965f947.jpg'),
(44, 67, 'sqft, Industrial Space for Rent at mirpur', 'sqft, Industrial Space for Rent at mirpur 2', 'sqft-industrial-space-for-rent-at', 'uploads/listings/67/seo/614253f02aa14.jpeg'),
(45, 66, '10000 sqft, Industrial Space for Ren', '10000 sqft, Industrial Space at Konabari', '10000-sqft-industrial-space-for-rent-at-konabari', 'uploads/listings/66/seo/6142542529f1c.jpg'),
(46, 65, '4000 sqft, Industrial Space for Rent a', '4000 sqft, Industrial Space for R', '4000-sqft-industrial-space-for-rent-at-gazipur-sadar', 'uploads/listings/65/seo/61425450ad0c2.jpg'),
(47, 64, '1200 sqft industrial factory building for rent at gazipur', '12050 sqft industrial factory building for rent at', '120000sqft-industrial-factory-building-for-rent-at-gazipur', 'uploads/listings/64/seo/6142548776bf9.jpg'),
(48, 63, '175000 sqft, Space for at Gazipur Sadar', '175000 sqfI ndustrial Space for at Gazipur', '175000-sqft-industrial-space-for-rent-at-gazipur-sadar', 'uploads/listings/63/seo/614254a9b0672.jpg'),
(49, 62, '30000 sqft, Industrial Space for Rent', '30000 sqft, Space for Rent at Gazipur Sadar', '30000-sqft-industrial-space-for-rent-at-gazipur-sadar', 'uploads/listings/62/seo/614254e0c4e97.jpg'),
(50, 61, '21500 sqft, Industrial Space for at gawsia', '21500 sqft, Industrial Space for Rent at gawsia desc', '21500-sqft-industrial-space-for-rent-at-gawsia', 'uploads/listings/61/seo/614255075072d.jpg'),
(51, 60, '100000 sqft, Industrial Space for dhk-syl highway', '100000 sqft, Industrial Space for Rent', '100000-sqft-industrial-space-for-rent-at-dhk-syl-highway', 'uploads/listings/60/seo/6142552af4136.jpeg'),
(52, 57, '2250 sqft, 4 Beds Flats for Rent', '2250 sqft, 4 Beds Flats', '2250-sqft-4-beds-flats-for-rent-at-bashundhara-ra', 'uploads/listings/57/seo/6142561b62ec7.jpeg'),
(53, 56, '1300 sqft, 3 Beds Apartment/Flats 12', '1120 sqft, 3 Apartment/Flats 12', '1300-sqft-3-beds-apartmentflats-for-rent-at-mirpur-12', 'uploads/listings/56/seo/6142564f60779.jpeg'),
(54, 55, '1654 sqft, 3 Beds Apartment/Flats', '1654 sqft, 3 Beds Apartment/Flats for Rent at Uttara 2 desc', '1654-sqft-3-beds-apartmentflats-for-rent-at-uttara', 'uploads/listings/55/seo/614363c24e2b2.jpg'),
(55, 54, '1800 sqft, 3 Beds Apartment/Flats for Rent at', '1800 sqft, 3 Beds Apartment/Flats for Rent at Rampura meta', '1800-sqft-3-beds-apartmentflats-for-rent-at-rampura', 'uploads/listings/54/seo/614364a1e7e84.jpeg'),
(56, 53, '1000 sqft, Showroom/Shop/Restaurant for Rent at Mir', '1000 sqft, Showroom/Shop/Restaurant', '1000-sqft-showroomshoprestaurant-for-rent-at-mirpur-2', 'uploads/listings/53/seo/61436512c82bc.jpg'),
(57, 52, 'সুদৃশ্য ডেকোরেশনসহ একটি আউটলেট অফিস', 'সুদৃশ্য ডেকোরেশনসহ একটি', '-1048', 'uploads/listings/52/seo/61436564244be.jpg'),
(58, 51, 'Independent Mess Male for a Roommates', 'Independent Mess Male for a', 'independent-mess-male-for-a-roommates-at-mirpur-1', 'uploads/listings/51/seo/61436908e1ec6.jpg'),
(59, 50, 'sublet Female for a Roommates', 'sublet Female for a', 'sublet-female-for-a-roommates-at-mirpur-12', 'uploads/listings/50/seo/61436991aa094.jpg'),
(60, 49, '3 katha, Ready Residential', '3 katha, Ready Residential Plot', '3-katha-ready-residential-plot-for-sale-at-aftab-nagar', 'uploads/listings/49/seo/61436a34a6139.jpg'),
(61, 48, '4 katha, Ready Residential Plot for', '4 katha, Ready Residential', '4-katha-ready-residential-plot-for-sale-at-bashundhara-ra', 'uploads/listings/48/seo/61436aab5af70.jpeg'),
(62, 47, '3-10 katha, Rajuk Approved Ready Residential', '3-10 katha, Rajuk Approved Ready meta description', '3-10-katha-rajuk-approved-ready-residential-plot-for-sale-at-satarkul-badda', 'uploads/listings/47/seo/61436aedbc598.jpg'),
(63, 46, '1675 sqft, 3 Beds Under Construction Apartment/Flats for', '1675 sqft, 3 Beds Under Construction Apartment/Flats for Sale at meta', '1675-sqft-3-beds-under-construction-apartmentflats-for-sale-at-bashundhara-ra', 'uploads/listings/46/seo/61436b658aa4c.jpg'),
(64, 45, '4 katha, Under Development Residential Plot for Sale', 'Under Development Residential Plot for Sale at Narayangonj Sadar', '4-katha-under-development-residential-plot-for-sale-at-narayangonj-sadar', 'uploads/listings/45/seo/61436bc1c34fa.jpg'),
(65, 44, '3 katha, Under Development Residential Plot for', '3 katha, Under Development Residential', '3-katha-under-development-residential-plot-for-sale-at-savar-1040', 'uploads/listings/44/seo/61436c3382f83.jpg'),
(66, 43, '3 katha, Under Development Residential', 'Under Development Residential Plot for Sale at Savar', '3-katha-under-development-residential-plot-for-sale-at-savar', 'uploads/listings/43/seo/61436c5125b42.jpg'),
(67, 42, '10 katha, Under Plot for Sale at Savar', 'Under Development Plot for Sale at Savar', '10-katha-under-development-residential-plot-for-sale-at-savar', 'uploads/listings/42/seo/61436c7471515.jpg'),
(68, 41, '5 katha, Almost Ready Residential Plot for', '6 katha, Almost Ready Residential Plot for Sale at Savar meta description', '5-katha-almost-ready-residential-plot-for-sale-at-savar-1037', 'uploads/listings/41/seo/61436da692b34.jpg'),
(69, 40, '10 katha, Ready Residential Plot for', 'Residential Plot for Sale at Hemayetpur', '10-katha-ready-residential-plot-for-sale-at-hemayetpur', 'uploads/listings/40/seo/61436dc541e0e.jpg'),
(70, 39, '5 katha, Plot for Sale at Hemayetpur', '5 katha, Ready Residential Plot meta', '5-katha-ready-residential-plot-for-sale-at-hemayetpur', 'uploads/listings/39/seo/61436df21d347.jpg'),
(71, 38, '5 katha, Almost Plot for Sale at Savar', 'Almost Ready Residential Plot', '5-katha-almost-ready-residential-plot-for-sale-at-savar', 'uploads/listings/38/seo/61436e24a140b.jpg'),
(72, 37, 'Rare plot at Vip sector_17, 3 katha, Ready', 'Ready Residential Plot for Sale at Purbachal', 'rare-plot-at-vip-sector-17-3-katha-ready-residential-plot-for-sale-at-purbachal', 'uploads/listings/37/seo/61436e6042bfd.jpg'),
(73, 36, '5 katha, Ready Residential Plo', '5 katha, Ready Residential Plot for meta description', '5-katha-ready-residential-plot-for-sale-at-purbachal', 'uploads/listings/36/seo/61436e826f964.jpg'),
(74, 35, '3 katha,Residential Plot for Sale at Purbachal title', '3 katha,Residential Plot for Sale at Purbachal meta description', '3-katharesidential-plot-for-sale-at-purbachal', 'uploads/listings/35/seo/61436ea4e84f5.jpg'),
(75, 34, '2480 sqft, 4 Beds Ready Apartment/Flats', 'Beds Ready Apartment/Flats for Sale at Baridhara', '2480-sqft-4-beds-ready-apartmentflats-for-sale-at-baridhara', 'uploads/listings/34/seo/61436ecee2862.jpeg'),
(76, 33, '1590 sqft, 3 Beds Under Constructio', 'Construction Flats for Sale at Mirpur 6', '1590-sqft-3-beds-under-construction-flats-for-sale-at-mirpur-6', 'uploads/listings/33/seo/61436eedda24d.jpg'),
(77, 32, 'সুলভ মূল্যে জমির অংশ কিনুন এবং বসুন্ধরা আ/এ-তে', 'সুলভ মূল্যে জমির অংশ কিনুন', NULL, 'uploads/listings/32/seo/61436f1a72319.jpeg'),
(78, 31, '1290 sqft, 3 Beds Ready Apartment/Flats', 'Beds Ready Apartment/Flats for Sale at Malibag', '1290-sqft-3-beds-ready-apartmentflats-for-sale-at-malibag', 'uploads/listings/31/seo/61436f46a7b1b.jpg'),
(79, 30, 'Commercial Space for Rent at', 'for Rent at Bangabandhu Road, Narayangonj.', 'commercial-space-for-rent-at-bangabandhu-road-narayangonj', 'uploads/listings/30/seo/61436f79c863d.png'),
(80, 29, '1000 sqft, Shop for Rent at Adabor  RENT title', '1000 sqft, Shop for Rent at Adabor  RENT description', '1000-sqft-shop-for-rent-at-adabor-rent', 'uploads/listings/29/seo/61436f9fa8975.jpg'),
(81, 28, '1980 sqft, 3 Beds Under Construction Flats', 'Construction Flats for Sale at Mirpur 14', '1980-sqft-3-beds-under-construction-flats-for-sale-at-mirpur-14', 'uploads/listings/28/seo/6143701849236.jpeg'),
(82, 27, '264 sqft, Shop for', 'for Rent at Adabor', '264-sqft-shop-for-rent-at-adabor', 'uploads/listings/27/seo/6143706638383.jpg'),
(83, 26, '700 sqft, Office Space for Rent', '700 sqft, Rent at Adabor', '700-sqft-office-space-for-rent-at-adabor', 'uploads/listings/26/seo/614370844f72e.jpg'),
(84, 25, 'Beds Under Construction Apartment/Flats for Sale at Adabor', '1912 sqft, 4 Beds Apartment/Flats for Sale at Adabor', '1912-sqft-4-beds-under-construction-apartmentflats-for-sale-at-adabor', 'uploads/listings/25/seo/614370a59dd81.jpg'),
(85, 24, '1438 sqft, 3 Beds Under Construction', 'Under Construction Apartment/Flats for Sale at Adabor', '1438-sqft-3-beds-under-construction-apartmentflats-for-sale-at-adabor', 'uploads/listings/24/seo/614370cf32852.jpg'),
(86, 23, '1100 sqft, Office Space for Rent at Adabor title', '1100 sqft, Office Space for Rent at Adabor meta description', '1100-sqft-office-space-for-rent-at-adabor', 'uploads/listings/23/seo/614370f5d72a4.jpg'),
(87, 22, '125 sqft, Showroom/Shop/Restaurant', 'Showroom/Shop/Restaurant for Rent at Adabor', '125-sqft-showroomshoprestaurant-for-rent-at-adabor', 'uploads/listings/22/seo/6143712345e22.jpg'),
(88, 21, 'Construction Apartment/Flats for Sale at Adabor', '1600 sqft, 4 Beds Under Construction', '1600-sqft-4-beds-under-construction-apartmentflats-for-sale-at-adabor', 'uploads/listings/21/seo/6143714b9d06f.jpg'),
(89, 20, '2300 sqft, 3 Beds Ready Flats for Sale at', '2300 sqft, 3 Beds Ready Flats', '2300-sqft-3-beds-ready-flats-for-sale-at-bashundhara-ra-1016', 'uploads/listings/20/seo/6143717ac8d11.jpg'),
(90, 19, '2300 sqft, 3 Beds Ready Flats for Sale at Bashundhara R/A ttile', '2300 sqft, 3 Beds Ready Flats for Sale at Bashundhara R/A meta description', '2300-sqft-3-beds-ready-flats-for-sale-at-bashundhara-ra-1015', 'uploads/listings/19/seo/614371ba9c8cd.jpg'),
(91, 18, '2935 sqft, 4 Beds Ready Flats for Sale', '2935 sqft, 4 Beds Ready Flats', '2935-sqft-4-beds-ready-flats-for-sale-at-bashundhara-ra', 'uploads/listings/18/seo/614371f598d00.jpg'),
(92, 17, '2000 sqft, Office Space for Rent', 'Office Space for Rent at Naya Paltan', '2000-sqft-office-space-for-rent-at-naya-paltan', 'uploads/listings/17/seo/61437213c89d2.jpg'),
(93, 16, '2300 sqft, 3 Beds Ready Flats for Sale', '2300 sqft, 3 Beds Ready', '2300-sqft-3-beds-ready-flats-for-sale-at-bashundhara-ra', 'uploads/listings/16/seo/614372338813e.jpg'),
(94, 12, '500 sqft, 1 Bed Sublet/Room for Rent at Shewrapara title', '500 sqft, 1 Bed Sublet/Room for Rent at Shewrapara description', '500-sqft-2-beds-studio-apartment', 'uploads/listings/12/seo/614374b031a1b.jpg'),
(95, 13, 'sublet Female for a Roommates at Mirpur 12 ttile', 'description sublet Female for a Roommates at Mirpur 12', 'sublet-female-roommate', 'uploads/listings/13/seo/6143752a5488d.jpg'),
(96, 11, '400 sqft, 2 Beds Studio Apartment for Rent at Bashundhara R/A title', '400 sqft, 2 Beds Studio Apartment for Rent at Bashundhara R/A description', '400-sqft-2-beds-studio-apartment', 'uploads/listings/11/seo/61437592c4d7f.jpg'),
(97, 10, '16000 sqft, 6 Beds Duplex Home for Rent at Mirbag title', '16000 sqft, 6 Beds Duplex Home for Rent at Mirbag description', '16000-sqft-6-beds-duplex-home', 'uploads/listings/10/seo/614375ce07888.jpg'),
(98, 9, '3500 sqft, Office Space for Rent', 'Office Space for Rent at Mirpur 10', '3500-sqft-office-space', 'uploads/listings/9/seo/614375f07adfb.jpg'),
(99, 7, '2500 sqft, Under Construction Office Spac', 'Construction Office Space for Sale at Uttara', '2500-sqft-under-construction', 'uploads/listings/7/seo/614376392ff18.jpeg'),
(100, 5, '1690 sqft, 3 Beds Under Construction', 'Construction Apartment/Flats for Sale at Banasree', '1690-sqft-3-beds-under-construction', 'uploads/listings/5/seo/61437680542b9.jpg'),
(101, 8, '1800 sqft, 3 Beds Apartment/Flat', 'beds Apartment/Flats for Rent at Rampura', '1800-sqft-under-construction', 'uploads/listings/8/seo/614376aacb0fa.jpg'),
(102, 116, NULL, NULL, '1000-sqft-showroomshoprestaurant-for-rent-at-mirpur-2-1111', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prd_listing_additional_info`
--

CREATE TABLE `prd_listing_additional_info` (
  `id` bigint(20) NOT NULL,
  `f_facing_no` int(2) DEFAULT NULL,
  `f_listing_no` bigint(20) NOT NULL,
  `facing` varchar(50) DEFAULT NULL,
  `handover_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `f_feature_nos` varchar(50) DEFAULT NULL COMMENT 'comma separated values',
  `features` varchar(500) DEFAULT NULL COMMENT 'insert by comma seperated',
  `f_nearby_nos` varchar(50) DEFAULT NULL COMMENT 'comma separated values',
  `nearby` varchar(500) DEFAULT NULL COMMENT 'insert by comma seperated',
  `location_map` varchar(500) DEFAULT NULL,
  `video_code` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prd_listing_additional_info`
--

INSERT INTO `prd_listing_additional_info` (`id`, `f_facing_no`, `f_listing_no`, `facing`, `handover_date`, `description`, `f_feature_nos`, `features`, `f_nearby_nos`, `nearby`, `location_map`, `video_code`) VALUES
(1, NULL, 1, '1', '2021-05-08', 'Test Description', '[\"1\",\"2\"]', NULL, '[\"1\",\"2\",\"3\"]', NULL, 'https://www.google.com/maps/place/Uttara+House+Building/@23.8710489,90.4062432,15z/data=!4m5!3m4!1s0x3755c43bb6228489:0xeeba9aedb454ee7f!8m2!3d23.874278!4d90.400369', 'https://www.youtube.com/watch?v=OGI0fNvr4fo'),
(2, NULL, 1, '1', '2021-05-08', 'Test Description', '[\"1\",\"2\",\"4\"]', NULL, '[\"2\",\"3\",\"4\"]', NULL, 'https://www.google.com/maps/place/Uttara+House+Building/@23.8710489,90.4062432,15z/data=!4m5!3m4!1s0x3755c43bb6228489:0xeeba9aedb454ee7f!8m2!3d23.874278!4d90.400369', 'https://www.youtube.com/watch?v=OGI0fNvr4fo'),
(3, NULL, 2, NULL, '2021-05-10', 'মিউকরমাইকোসিস একটি বিরল সংক্রমণ। মিউকর নামে একটি ছত্রাকের সংস্পর্শে এলে এই সংক্রমণ হয়। সাধারণত মাটি, গাছপালা, পচনশীল ফল ও শাকসবজিতে এই ছত্রাক দেখা যায়। ডা. নায়ের বলেন, এই ছত্রাক সব জায়গায় থাকে। মাটি, বাতাস, এমনকি স্বাস্থ্যবান লোকের নাক ও শ্লেষ্মায়ও এটা পাওয়া যায়।', '[\"1\",\"2\",\"3\"]', NULL, '[\"1\",\"2\"]', NULL, NULL, NULL),
(4, NULL, 3, '1', '2021-05-29', 'tttt', '[\"1\",\"2\"]', NULL, '[\"1\",\"2\"]', NULL, NULL, NULL),
(5, NULL, 4, '1', '2021-09-11', '<p>This is New Under construction Apartment.Just few minutes walking distance from kollanpur bus stop. There are 3beds, 3toiets, Drawing, dunning, 3 verandha, kitchen with all ulitilites and parking available. I will suggest to visit the apartment. Thanks</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(6, 2, 5, 'North Facing', '2022-12-31', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;Hyperion Park View</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Banasree , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Under Construction</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1690 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;5th Floor, 9th Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;03</li>\r\n	<li>&nbsp;Baths :&nbsp;03</li>\r\n	<li>&nbsp;Balconies:&nbsp;4</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;13</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Unfurnished</li>\r\n	<li>&nbsp;Facing:&nbsp;South Facing</li>\r\n	<li>&nbsp;Land Area:&nbsp;57.5 katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;December 31, 2022</li>\r\n</ul>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, 'https://www.google.com/maps?ll=23.757667,90.429444&z=16&t=m&hl=en&gl=BD&mapclient=embed', NULL),
(7, 1, 6, 'South Facing', '2022-09-30', '<p>Project Name: Runner Sheikh Khairuddin Palace.</p>\r\n\r\n<p>Address: 344, Dilu Road. New Eskaton.</p>\r\n\r\n<p>Storied: B+G+9</p>\r\n\r\n<p>Facing: West.</p>\r\n\r\n<p>Apt. Size: 1350-1480 sft.</p>\r\n\r\n<p>Handover Time: 36 month.</p>\r\n\r\n<p>For desing &amp; more details plz feel free to call.</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(8, 1, 7, 'South Facing', '2021-11-25', '<p>Project Name: Zk Tower</p>\r\n\r\n<p>Loaction: 58 Gausal Azam Avenue, Sector-13, Uttara, Dhaka-1230.</p>\r\n\r\n<p>Land Area: 5 Katha</p>\r\n\r\n<p>Floor Size: +/-2500 sft.</p>\r\n\r\n<p>N.B: (+/- 1000 sft) usable space in ground floor with duplex nature.&nbsp;</p>\r\n\r\n<p>Exclusive Commercial Project on the Gausal Azam Avenue, Uttara,</p>\r\n\r\n<p>Available Open Space for Office, Showroom (Space are Open, You can design as your own Imagine)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>24 Hours Generator Backup and Car-parking, Lift with other Facilities</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Work Condition: Under Construction (Just Start the Construction), Already plan approved from Rajuk.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Installment Facility: You will pay the installment up to Handover date.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Hand Over: Dec 2022</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Home Loan: IDLC,DBH , Brac Bank,City Bank. (We support you by provide Document to approved the loan from other Financial Institution.)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Exclusive Double Unit Apartment with attractive Price.......</p>', '[\"1\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\"]', NULL, NULL, NULL),
(9, 1, 8, 'South Facing', '2021-08-07', '<p>This description update</p>', '[\"1\",\"2\",\"3\"]', NULL, '[\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(10, 1, 9, 'South Facing', '2021-08-31', '<p>Office Rent in Mirpur original 10 main road, opposite Mirpur -6 Popular Diagnostic, Hyperion Tower. 1st floor and 2nd floor, each floor 3500 sft,</p>\r\n\r\n<p><strong>Bank, Bima, Corporate Office preferable.</strong></p>\r\n\r\n<p>Contact:</p>\r\n\r\n<p>Attn. Arafatul Alam</p>\r\n\r\n<p>Hyperion Design &amp; Development Ltd.</p>\r\n\r\n<p>House # 02, Block # A, Road # 04, Section # 10<br />\r\nMirpur, Dhaka-1216, Bangladesh.</p>', '[\"1\",\"4\"]', NULL, '[\"1\",\"3\"]', NULL, NULL, NULL),
(11, 2, 10, 'North Facing', '2021-08-28', NULL, '[\"1\",\"2\",\"3\"]', NULL, '[\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(12, 1, 11, 'South Facing', '2021-08-04', '<p>FULLY FURNISHED, ONE MASTER BED, ONE LIVING ROOM WITH SOFA CUM BED, TWO AIR CONDITIONER, GEYSER, 42 INCH TV, FRIDGE, WIFI, MICROWAVE OVEN, COFFEE MAKER.</p>', '[\"1\",\"2\",\"3\"]', NULL, '[\"2\",\"3\"]', NULL, NULL, NULL),
(13, 1, 12, 'South Facing', '2021-08-05', '<p>Rent will be from 1st April 2020. In 1 flat 2 bedrooms with 2 bathrooms. I&#39;m staying in one room.&nbsp; another bedroom wants to give rent. Separate Bathrooms. Flat on the 1st floor. Job holder single person needs.</p>', '[\"2\",\"3\"]', NULL, '[\"2\"]', NULL, NULL, NULL),
(14, 1, 13, 'South Facing', '2021-08-05', '<ul>\r\n	<li>Property Name:&nbsp;মেয়ে রুমমেট আবশ্যক-জুলাই/আগস্ট</li>\r\n	<li>&nbsp;Property Type &nbsp;:&nbsp;Independent Mess</li>\r\n	<li>&nbsp;Property For &nbsp;:&nbsp;Roommates/Paying Guest</li>\r\n	<li>&nbsp;Location &nbsp;:&nbsp;Mirpur 12 , Dhaka</li>\r\n	<li>&nbsp;Address &nbsp;:&nbsp;house : 22. road : 3. block : E. section : 12. Pallabi. Mirpur</li>\r\n	<li>&nbsp;&nbsp;Residence Type &nbsp;:&nbsp;Independent Mess</li>\r\n	<li>&nbsp;&nbsp;Gender &nbsp;:&nbsp;Female</li>\r\n	<li>&nbsp;&nbsp;Room Type &nbsp;:&nbsp;3 person in one Room</li>\r\n	<li>&nbsp;&nbsp;Bathroom &nbsp;:&nbsp;&nbsp;Attach</li>\r\n	<li>&nbsp;&nbsp;Balconies &nbsp;:&nbsp;&nbsp;No</li>\r\n	<li>&nbsp;&nbsp;Deposit Amount &nbsp;:&nbsp;&nbsp;2,500</li>\r\n	<li>&nbsp;&nbsp;Floor Number &nbsp;:&nbsp;&nbsp;1st Floor,</li>\r\n	<li>&nbsp;&nbsp;Total Number&nbsp;:&nbsp;&nbsp;7</li>\r\n	<li>&nbsp;&nbsp;Facing :South Facing</li>\r\n	<li>&nbsp;&nbsp;Available From:&nbsp;July 08, 2020</li>\r\n</ul>', '[\"2\",\"3\"]', NULL, '[\"1\",\"2\",\"3\"]', NULL, NULL, NULL),
(15, 1, 14, 'South Facing', '2021-08-05', '<p>(SUPER HOSTEL BD)<br />\r\nAddress: Aftabnagar (near EWU) and Uttara (Near House building/north tower)<br />\r\nWe are offering hostel seat for bachelor, Male only.<br />\r\ntwo unit in this building with every floor.<br />\r\nwe are providing: multi functional bed, where you can stay and use like a room or cabinet process locker, reading table, wardrobe withdrwaer and so on. Its totally new in Bangladesh.<br />\r\nfacilities:<br />\r\n-3 time proper set manue and fixed meal<br />\r\n-generator, elevator,Air conditioner,<br />\r\n-washing machine, reading room, theatre common room,<br />\r\n-fiber pillow and cover, mattress and cover, personal locker, wight machine, RO system, 24 hour security, fire security,&nbsp;<br />\r\n-Hair dryer, electric shaver, cleaning service, auto shoe polisher and box, rechargeable desk lamp and so on with other 10 more facilties.<br />\r\nat first please visit our office and see your desire room than fix it for your next living way. contact us : 01678403882 / 01678403884</p>', '[\"2\",\"3\"]', NULL, '[\"1\",\"2\"]', NULL, NULL, NULL),
(16, 2, 15, 'North Facing', '2021-06-25', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;Kingdom Habil Complex</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Studio Apartment</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Cantonment , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Ready</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1125 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;1st Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;03</li>\r\n	<li>&nbsp;Baths :&nbsp;03</li>\r\n	<li>&nbsp;Balconies:&nbsp;2</li>\r\n	<li>&nbsp;Garages:&nbsp;No Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;9</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Furnished</li>\r\n	<li>&nbsp;Facing:&nbsp;East Facing</li>\r\n	<li>&nbsp;Land Area:&nbsp;10 katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;June 25, 2021</li>\r\n</ul>', '[\"1\",\"2\",\"3\"]', NULL, '[\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(17, 1, 16, 'South Facing', '2021-03-30', '<ul>\r\n	<li>\r\n	<p>Safety &amp; Security:&nbsp;<br />\r\n	Common areas surveillance under CCTV;<br />\r\n	Firefighting equipment available in common area;<br />\r\n	Lighting of common area supported by solar energy &amp; generator;</p>\r\n\r\n	<p>Key Features :<br />\r\n	Lavish community hall;<br />\r\n	Marble on staircase and lift lobby;<br />\r\n	Cross ventilation facility in all rooms;<br />\r\n	Granite finished lift wall;<br />\r\n	Gardens on suitable location;<br />\r\n	Spaces lobby and driveway; Our main feature is handover on time with other commitment. We count every minutes; &nbsp;<br />\r\n	&nbsp;1 (one) apartment each floor and excellent floor layout;<br />\r\n	&nbsp;CC camera in front of main gate and lift lobby of typical floor;<br />\r\n	&nbsp;Marble on staircase and lift lobby;<br />\r\n	&nbsp;Full height windows on front side;<br />\r\n	&nbsp;Cross Ventilation facility in all rooms;<br />\r\n	&nbsp;1 Lift manufactured by ThyssenKrupp (Germany);<br />\r\n	&nbsp;16 unit&rsquo;s generator backup in every apartment;<br />\r\n	&nbsp;High capacity Generator manufactured by Parkins, UK (Supplier and maintenance by Energy pack);<br />\r\n	&nbsp;Ground floor &amp; Roof top gardens.</p>\r\n\r\n	<p>Feature List in Apartment:&nbsp;<br />\r\n	3 Bedrooms<br />\r\n	&nbsp;4 Large Veranda<br />\r\n	2 individual Living Rooms<br />\r\n	4 Bathrooms&nbsp;<br />\r\n	1 Dressing Area<br />\r\n	Cabinet Provision in all beds<br />\r\n	6 A/C Provision&nbsp;<br />\r\n	&nbsp;2 Fridge Provision<br />\r\n	1 Washing Machine Provision<br />\r\n	Maid Rooms &amp; Bathrooms<br />\r\n	1 Car parking space for each unit</p>\r\n	</li>\r\n</ul>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(18, 1, 17, 'South Facing', '2021-08-26', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;Furnished office for rent</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;&nbsp;Office Space</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;&nbsp;Rent</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;&nbsp;Naya Paltan , Dhaka</li>\r\n	<li>&nbsp;Address&nbsp;:&nbsp;&nbsp;61, Bijoy nagar, Dhaka</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;&nbsp;2000 sqft</li>\r\n	<li>&nbsp;Deposit Amount&nbsp;:&nbsp;&nbsp;1.80 Lac</li>\r\n	<li>&nbsp;Furnishing&nbsp;:&nbsp;&nbsp;Furnished</li>\r\n	<li>&nbsp;Floor Available On&nbsp;:&nbsp;&nbsp;14th Floor,</li>\r\n	<li>&nbsp;Total Floor:&nbsp;17</li>\r\n	<li>&nbsp;Available From :&nbsp;June 23, 2021</li>\r\n</ul>', '[\"1\",\"3\",\"4\"]', NULL, '[\"1\",\"3\"]', NULL, NULL, NULL),
(19, 1, 18, 'South Facing', '2023-12-30', '<p>Project Name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; IMAGINE EASTWOOD</p>\r\n\r\n<p>Address &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Plot- 208, Road- 03, Block- B, Bashundhara R/A.</p>\r\n\r\n<p>Size &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2935 SFT,</p>\r\n\r\n<p>Land &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 7.5 Katha</p>\r\n\r\n<p>Facing &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; west</p>\r\n\r\n<p>Building Height &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; G+9</p>\r\n\r\n<p>Total Units &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 9 no&rsquo;s</p>\r\n\r\n<p>Parking &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 16 no&rsquo;s</p>\r\n\r\n<p>Handover &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; December 2023</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Apartment inside: &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n\r\n<p>4 Bedrooms;</p>\r\n\r\n<p>2 Living Rooms;</p>\r\n\r\n<p>5 Bathrooms;</p>\r\n\r\n<p>Dressing Area;</p>\r\n\r\n<p>6 A/C Provision;</p>\r\n\r\n<p>2 Fridge Provision;</p>\r\n\r\n<p>1 Car parking spaces;</p>\r\n\r\n<p>Water purification device in kitchen;</p>\r\n\r\n<p>Washing Machine Provision;</p>\r\n\r\n<p>Maid Rooms &amp; Bathrooms;</p>\r\n\r\n<p>19 unit&rsquo;s emergency generator backup.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Safety &amp; Security:</p>\r\n\r\n<p>&uuml; &nbsp;Common areas surveillance under CCTV.</p>\r\n\r\n<p>&uuml; &nbsp;Firefighting equipment available in common area.</p>\r\n\r\n<p>&uuml; &nbsp;Lighting of common area supported by solar energy &amp; generator.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Common Key Features:</p>\r\n\r\n<p>&uuml; &nbsp;50% open space.</p>\r\n\r\n<p>&uuml; &nbsp;Lavish community hall.</p>\r\n\r\n<p>&uuml; &nbsp;GYM;</p>\r\n\r\n<p>&uuml; &nbsp;Indoor playing room.</p>\r\n\r\n<p>&uuml; &nbsp;Decorative guest room and all common area.</p>\r\n\r\n<p>&uuml; &nbsp;Gardens on suitable location.</p>\r\n\r\n<p>&uuml; &nbsp;Water fountain in ground floor.</p>\r\n\r\n<p>&uuml; &nbsp;Spaces lobby and driveway.</p>\r\n\r\n<p>&uuml; &nbsp;Driver&rsquo;s waiting room with other facility.</p>\r\n\r\n<p>&uuml; &nbsp;1 Lifts&nbsp;</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(20, 1, 19, 'South Facing', '2021-05-04', '<p>Project Detail&nbsp;<br />\r\nPlot Area&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5 Katha&nbsp;<br />\r\nNumber of Apt&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7 Nos. (Single Unit each floor)&nbsp;<br />\r\nApartment Size&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2300 sft (7th&nbsp;floor)<br />\r\nNumber of Parking&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;08 Cars&nbsp;<br />\r\nBuilding Height&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7 Storied&nbsp;<br />\r\nHandover&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;March 2021</p>\r\n\r\n<p>Safety &amp; Security:&nbsp;<br />\r\nCommon areas surveillance under CCTV;<br />\r\nFirefighting equipment available in common area;<br />\r\nLighting of common area supported by solar energy &amp; generator;</p>\r\n\r\n<p>Key Features :<br />\r\nLavish community hall;<br />\r\nMarble on staircase and lift lobby;<br />\r\nCross ventilation facility in all rooms;<br />\r\nGranite finished lift wall;<br />\r\nGardens on suitable location;<br />\r\nSpaces lobby and driveway; Our main feature is handover on time with other commitment. We count every minutes; &nbsp;<br />\r\n&nbsp;1 (one) apartment each floor and excellent floor layout;<br />\r\n&nbsp;CC camera in front of main gate and lift lobby of typical floor;<br />\r\n&nbsp;Marble on staircase and lift lobby;<br />\r\n&nbsp;Full height windows on front side;<br />\r\n&nbsp;Cross Ventilation facility in all rooms;<br />\r\n&nbsp;1 Lift manufactured by ThyssenKrupp (Germany);<br />\r\n&nbsp;16 unit&rsquo;s generator backup in every apartment;<br />\r\n&nbsp;High capacity Generator manufactured by Parkins, UK (Supplier and maintenance by Energy pack);<br />\r\n&nbsp;Ground floor &amp; Roof top gardens.</p>\r\n\r\n<p>Feature List in Apartment:&nbsp;<br />\r\n3 Bedrooms<br />\r\n&nbsp;4 Large Veranda<br />\r\n2 individual Living Rooms<br />\r\n4 Bathrooms&nbsp;<br />\r\n1 Dressing Area<br />\r\nCabinet Provision in all beds<br />\r\n6 A/C Provision&nbsp;<br />\r\n&nbsp;2 Fridge Provision<br />\r\n1 Washing Machine Provision<br />\r\nMaid Rooms &amp; Bathrooms<br />\r\n1 Car parking space for each unit</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(21, 1, 20, 'South Facing', '2021-03-21', '<p>Safety &amp; Security:&nbsp;<br />\r\nCommon areas surveillance under CCTV;<br />\r\nFirefighting equipment available in common area;<br />\r\nLighting of common area supported by solar energy &amp; generator;</p>\r\n\r\n<p>Key Features :<br />\r\nLavish community hall;<br />\r\nMarble on staircase and lift lobby;<br />\r\nCross ventilation facility in all rooms;<br />\r\nGranite finished lift wall;<br />\r\nGardens on suitable location;<br />\r\nSpaces lobby and driveway; Our main feature is handover on time with other commitment. We count every minutes; &nbsp;<br />\r\n&nbsp;1 (one) apartment each floor and excellent floor layout;<br />\r\n&nbsp;CC camera in front of main gate and lift lobby of typical floor;<br />\r\n&nbsp;Marble on staircase and lift lobby;<br />\r\n&nbsp;Full height windows on front side;<br />\r\n&nbsp;Cross Ventilation facility in all rooms;<br />\r\n&nbsp;1 Lift manufactured by ThyssenKrupp (Germany);<br />\r\n&nbsp;16 unit&rsquo;s generator backup in every apartment;<br />\r\n&nbsp;High capacity Generator manufactured by Parkins, UK (Supplier and maintenance by Energy pack);<br />\r\n&nbsp;Ground floor &amp; Roof top gardens.</p>\r\n\r\n<p>Feature List in Apartment:&nbsp;<br />\r\n3 Bedrooms<br />\r\n&nbsp;4 Large Veranda<br />\r\n2 individual Living Rooms<br />\r\n4 Bathrooms&nbsp;<br />\r\n1 Dressing Area<br />\r\nCabinet Provision in all beds<br />\r\n6 A/C Provision&nbsp;<br />\r\n&nbsp;2 Fridge Provision<br />\r\n1 Washing Machine Provision<br />\r\nMaid Rooms &amp; Bathrooms<br />\r\n1 Car parking space for each unit</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"3\",\"4\"]', NULL, NULL, NULL),
(22, 1, 21, 'South Facing', '2022-12-30', '<ul>\r\n	<li>Property Name&nbsp;:&nbsp;&nbsp;LUCKY ROWSHAN</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Adabor , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Under Construction</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1600 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;2nd Floor, 5th Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;04</li>\r\n	<li>&nbsp;Baths :&nbsp;03</li>\r\n	<li>&nbsp;Balconies:&nbsp;3</li>\r\n	<li>&nbsp;Garages:&nbsp;No Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;9</li>\r\n	<li>&nbsp;Furnishing:&nbsp;N/A</li>\r\n	<li>&nbsp;Facing:&nbsp;South Facing</li>\r\n	<li>&nbsp;Land Area:&nbsp;N/A</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;December 30, 2022</li>\r\n</ul>', '[\"2\",\"3\",\"4\"]', NULL, '[\"2\",\"3\"]', NULL, NULL, NULL),
(23, 1, 22, 'South Facing', '2021-05-23', '<p>SHAHABUDDIN PLAZA&nbsp;</p>\r\n\r\n<p>HOUSE#13-23,ROAD#01,JANATA CO-OPERATIVE HOUSING SOCIETY LTD.</p>\r\n\r\n<p>RING ROAD,ADABOR,DHAKA-1207,BANGLADESH</p>', '[\"3\",\"4\"]', NULL, '[\"2\"]', NULL, NULL, NULL),
(24, 1, 23, 'South Facing', '2021-03-03', '<ul>\r\n	<li>roperty Name&nbsp;:&nbsp;&nbsp;SHAHABUDDIN PLAZA</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;&nbsp;Office Space</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;&nbsp;Rent</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;&nbsp;Adabor , Dhaka</li>\r\n	<li>&nbsp;Address&nbsp;:&nbsp;&nbsp;SHAHABUDDIN PLAZA,House:13-23,Road#01,Janata Co-Operative Housing Society Ltd.Ring Road,Adabor Dhaka-1207</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;&nbsp;1100 sqft</li>\r\n	<li>&nbsp;Deposit Amount&nbsp;:&nbsp;&nbsp;0</li>\r\n	<li>&nbsp;Furnishing&nbsp;:&nbsp;&nbsp;Furnished</li>\r\n	<li>&nbsp;Floor Available On&nbsp;:&nbsp;&nbsp;4th Floor,</li>\r\n	<li>&nbsp;Total Floor:&nbsp;15</li>\r\n	<li>&nbsp;Available From :&nbsp;March 03, 2021</li>\r\n</ul>', '[\"1\",\"3\",\"4\"]', NULL, '[\"1\",\"3\"]', NULL, NULL, NULL),
(25, 1, 24, 'South Facing', '2021-05-02', '<ul>\r\n	<li>Property Name&nbsp;:&nbsp;&nbsp;Lucky Rowshan</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Adabor , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Under Construction</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1438 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;2nd Floor, 6th Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;03</li>\r\n	<li>&nbsp;Baths :&nbsp;03</li>\r\n	<li>&nbsp;Balconies:&nbsp;3</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;3</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Semi-Furnished</li>\r\n	<li>&nbsp;Facing:&nbsp;South Facing</li>\r\n	<li>&nbsp;Land Area:&nbsp;10 katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;March 02, 2021</li>\r\n</ul>', '[\"1\",\"2\",\"3\"]', NULL, '[\"1\",\"2\",\"3\"]', NULL, NULL, NULL),
(26, 1, 25, 'South Facing', '2022-12-30', '<ul>\r\n	<li>Property Name&nbsp;:&nbsp;&nbsp;LUCKY ROWSHAN</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Adabor , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Under Construction</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1912 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;2nd Floor, 8th Floor, 9th Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;04</li>\r\n	<li>&nbsp;Baths :&nbsp;04</li>\r\n	<li>&nbsp;Balconies:&nbsp;4</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;15</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Furnished</li>\r\n	<li>&nbsp;Facing:&nbsp;South Facing</li>\r\n	<li>&nbsp;Land Area:&nbsp;10 katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;December 30, 2022</li>\r\n</ul>', '[\"1\",\"2\",\"3\"]', NULL, '[\"2\",\"3\"]', NULL, NULL, NULL),
(27, 1, 26, 'South Facing', '2021-03-02', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;Shahabuddin Plaza</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;&nbsp;Office Space</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;&nbsp;Rent</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;&nbsp;Adabor , Dhaka</li>\r\n	<li>&nbsp;Address&nbsp;:&nbsp;&nbsp;SHAHABUDDIN PLAZA (3rd FLOOR), House: 13-23, Road # 1, Janata Co-operative Housing society ltd, Ring Road, Adabor, Dhaka- 1207</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;&nbsp;700 sqft</li>\r\n	<li>&nbsp;Deposit Amount&nbsp;:&nbsp;&nbsp;0</li>\r\n	<li>&nbsp;Furnishing&nbsp;:&nbsp;&nbsp;Unfurnished</li>\r\n	<li>&nbsp;Floor Available On&nbsp;:&nbsp;&nbsp;4th Floor,</li>\r\n	<li>&nbsp;Total Floor:&nbsp;15</li>\r\n	<li>&nbsp;Available From :&nbsp;March 02, 2021</li>\r\n</ul>', '[\"2\",\"3\"]', NULL, '[\"2\",\"3\"]', NULL, NULL, NULL),
(28, 1, 27, 'South Facing', '2021-03-03', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;Shahabuddin Plaza</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;&nbsp;Showroom/Shop/Restaurant</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;&nbsp;Rent</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;&nbsp;Adabor , Dhaka</li>\r\n	<li>&nbsp;Address&nbsp;:&nbsp;&nbsp;SHAHABUDDIN PLAZA (3rd FLOOR), House: 13-23, Road # 1, Janata Co-operative Housing society ltd, Ring Road, Adabor, Dhaka- 1207</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;&nbsp;264 sqft</li>\r\n	<li>&nbsp;Deposit Amount&nbsp;:&nbsp;&nbsp;0</li>\r\n	<li>&nbsp;Furnishing&nbsp;:&nbsp;&nbsp;Unfurnished</li>\r\n	<li>&nbsp;Floor Available On&nbsp;:&nbsp;&nbsp;Ground Floor, 1st Floor, 2nd Floor,</li>\r\n	<li>&nbsp;Total Floor:&nbsp;15</li>\r\n	<li>&nbsp;Available From :&nbsp;March 02, 2021</li>\r\n</ul>', '[\"3\"]', NULL, '[\"2\"]', NULL, NULL, NULL),
(29, 2, 28, 'North Facing', '2020-12-01', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;Lucky Light House</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Mirpur 14 , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Under Construction</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1980 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;2nd Floor, 4th Floor, 6th Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;03</li>\r\n	<li>&nbsp;Baths :&nbsp;03</li>\r\n	<li>&nbsp;Balconies:&nbsp;3</li>\r\n	<li>&nbsp;Garages:&nbsp;No Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;7</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Unfurnished</li>\r\n	<li>&nbsp;Facing:&nbsp;West Facing</li>\r\n	<li>&nbsp;Land Area:&nbsp;3 katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;December 01, 2020</li>\r\n</ul>', '[\"1\",\"2\",\"3\"]', NULL, '[\"2\",\"3\"]', NULL, NULL, NULL),
(30, 1, 29, 'South Facing', '2021-02-21', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;SHAHABUDDIN PLAZA</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;&nbsp;Showroom/Shop/Restaurant</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;&nbsp;Rent</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;&nbsp;Adabor , Dhaka</li>\r\n	<li>&nbsp;Address&nbsp;:&nbsp;&nbsp;SHAHABUDDIN PLAZA,House:13-23,Road#01,Janata Co-Operative Housing Society Ltd.Ring Road,Adabor Dhaka-1207</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;&nbsp;1000 sqft</li>\r\n	<li>&nbsp;Deposit Amount&nbsp;:&nbsp;&nbsp;50.00 Lac</li>\r\n	<li>&nbsp;Furnishing&nbsp;:&nbsp;&nbsp;Semi-Furnished</li>\r\n	<li>&nbsp;Floor Available On&nbsp;:&nbsp;&nbsp;1st Floor, 2nd Floor,</li>\r\n	<li>&nbsp;Total Floor:&nbsp;3</li>\r\n	<li>&nbsp;Available From :&nbsp;February 14, 2021</li>\r\n</ul>', '[\"1\"]', NULL, '[\"1\",\"2\"]', NULL, NULL, NULL),
(31, 1, 30, 'South Facing', '2021-08-27', '<ul>\r\n	<li>Property Name&nbsp;:&nbsp;&nbsp;Agrani Bank, Bangabandhu Road Corporate Branch, Narayanganj</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;&nbsp;Office Space</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;&nbsp;Rent</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;&nbsp;Narayangonj Sadar , Narayanganj</li>\r\n	<li>&nbsp;Address&nbsp;:&nbsp;&nbsp;Ground Floor of 32/1, Bangabandhu Road, Narayanganj</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;&nbsp;3200 sqft</li>\r\n	<li>&nbsp;Deposit Amount&nbsp;:&nbsp;&nbsp;5.00 Lac</li>\r\n	<li>&nbsp;Furnishing&nbsp;:&nbsp;&nbsp;Semi-Furnished</li>\r\n	<li>&nbsp;Floor Available On&nbsp;:&nbsp;&nbsp;Ground Floor,</li>\r\n	<li>&nbsp;Total Floor:&nbsp;4</li>\r\n	<li>&nbsp;Available From :&nbsp;February 12, 2020</li>\r\n</ul>', '[\"1\",\"3\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(32, 1, 31, 'South Facing', '2021-12-22', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;NP House</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Malibag , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Ready</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1290 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;2nd Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;03</li>\r\n	<li>&nbsp;Baths :&nbsp;03</li>\r\n	<li>&nbsp;Balconies:&nbsp;2</li>\r\n	<li>&nbsp;Garages:&nbsp;No Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;9</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Unfurnished</li>\r\n	<li>&nbsp;Facing:&nbsp;South Facing</li>\r\n	<li>&nbsp;Land Area:&nbsp;19 katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;December 22, 2021</li>\r\n</ul>', '[\"2\",\"3\"]', NULL, '[\"1\",\"2\"]', NULL, NULL, NULL),
(33, 1, 32, 'South Facing', '2021-06-30', '<ul>\r\n	<li>Property Name&nbsp;:&nbsp;&nbsp;Mustaha Mansion.</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Bashundhara R/A , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Under Construction</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1300 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;Resale</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;1st Floor, 2nd Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;03</li>\r\n	<li>&nbsp;Baths :&nbsp;03</li>\r\n	<li>&nbsp;Balconies:&nbsp;2</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;9</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Unfurnished</li>\r\n	<li>&nbsp;Facing:&nbsp;South Facing</li>\r\n	<li>&nbsp;Land Area:&nbsp;6 katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;June 30, 2021</li>\r\n</ul>', '[\"1\",\"2\",\"3\"]', NULL, '[\"1\",\"2\"]', NULL, NULL, NULL),
(34, 1, 33, 'South Facing', '2023-12-29', '<ul>\r\n	<li>Property Name&nbsp;:&nbsp;&nbsp;RP House</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Mirpur 6 , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Under Construction</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1590 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;8th Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;03</li>\r\n	<li>&nbsp;Baths :&nbsp;03</li>\r\n	<li>&nbsp;Balconies:&nbsp;2</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;9</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Unfurnished</li>\r\n	<li>&nbsp;Facing:&nbsp;North Facing</li>\r\n	<li>&nbsp;Land Area:&nbsp;7.5 katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;December 29, 2023</li>\r\n</ul>', '[\"1\",\"2\",\"3\"]', NULL, '[\"1\",\"2\"]', NULL, NULL, NULL),
(35, 1, 34, 'South Facing', '2021-08-03', '<ul>\r\n	<li>Property Name&nbsp;:&nbsp;&nbsp;Mohananda Maloti</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Baridhara , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Ready</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;2583 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;Resale</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;2nd Floor, 5th Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;04</li>\r\n	<li>&nbsp;Baths :&nbsp;05</li>\r\n	<li>&nbsp;Balconies:&nbsp;3</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;5</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Unfurnished</li>\r\n	<li>&nbsp;Facing:&nbsp;South Facing</li>\r\n	<li>&nbsp;Land Area:&nbsp;N/A katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;July 11, 2020</li>\r\n</ul>', '[\"1\",\"2\",\"3\"]', NULL, '[\"1\",\"2\",\"3\"]', NULL, NULL, NULL),
(36, 1, 35, 'South Facing', '2022-09-28', '<p>Project Name : Purbachal Marine City</p>\r\n\r\n<p>Developer : Atlantic Properties &amp; Development Ltd</p>\r\n\r\n<p>Project Size : 1,338 Bigha</p>\r\n\r\n<p>Number Of Plots : 4000 (approx)</p>\r\n\r\n<p>Blocks : A, B and C</p>\r\n\r\n<p>Plot Sizes : 3, 5, 10</p>\r\n\r\n<p>Road Sizes : 100 ft. Main Avenue Road,</p>\r\n\r\n<p>60 ft. &amp; 40 ft. and 25 ft. Inner Roads</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(37, 1, 36, 'South Facing', '2020-09-28', '<p>Project Name : Purbachal Marine City</p>\r\n\r\n<p>Developers : Atlantic Properties and development ltd</p>\r\n\r\n<p>Project Sizes : 1,338 Bigha</p>\r\n\r\n<p>Number Of Plots : 4000 approx</p>\r\n\r\n<p>Blocks : A, B, C</p>\r\n\r\n<p>Plot Sizes : 3,5,10</p>\r\n\r\n<p>Road Sizes : 100 ft Main Avenue Road, 60 ft. &amp; 40 ft and 25 ft Inner road</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(38, 1, 37, 'South Facing', '2021-08-20', NULL, '[\"2\",\"3\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(39, 1, 38, 'South Facing', '2021-12-16', '<p>একটি সনামধন্য গ্রুপ অফ কোম্পানির উদ্যোগে -&nbsp;</p>\r\n\r\n<p>Gandhariya, Boliyarpur, hemayetpur.</p>\r\n\r\n<p>সরকার অনুমোদিত মেট্রোরেল MRT-5 ডিপো এর সন্নিকটে প্রস্তাবিত ৮০&#39; ও ৬০&#39; রোডের সাথেই&nbsp; হেমায়েতপুর, ব্যাংক কলোনি, সাভার, বিরুলিয়া, উত্তরা, ইপিজেড ও আশুলিয়ার সংযোগ পয়েন্ট এ প্রকৃতিগতভাবে উঁচু জমিতে ৩, ৫, ১০,২০ কাঠার প্লট বিক্রয় চলছে। এটি কোন প্রজেক্ট নয়, একটি &quot;মিনি রেসিডেন্স কমিউনিটি প্লান&quot;। ভবিষ্যতের একটি নিরাপদ ও লাভজনক বিনিয়োগের একটি সুবর্ণ সুযোগ। বিভিন্ন করপোরেট ও একক বিনিয়োগকারীদের ঘুরে দেখে যাওয়ার আমন্ত্রণ রইলো।।।</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(40, 1, 39, 'South Facing', '2021-02-08', '<p>Sand filling work is Running. বালি ভরাটের কাজ চলছে। ছবিতে দেখুন।</p>\r\n\r\n<p>MRT Mettro rail line 5 work is running. মেট্টোরেলের কাজ শুরু হয়েছে। ছবিতে দেখুন।&nbsp;</p>\r\n\r\n<p>আগামী ২ বছরে মুল্য ৩ গুণ হওয়ার নিশ্চয়তা।</p>\r\n\r\n<p>একটি সনামধন্য গ্রুপ অফ কোম্পানির উদ্যোগে -&nbsp;</p>\r\n\r\n<p>Gandhariya, Boliyarpur, hemayetpur.</p>\r\n\r\n<p>সরকার অনুমোদিত মেট্রোরেল MRT-5 ডিপো এর সন্নিকটে প্রস্তাবিত ৮০&#39; ও ৬০&#39; রোডের সাথেই&nbsp; হেমায়েতপুর, ব্যাংক কলোনি, সাভার, বিরুলিয়া, উত্তরা, ইপিজেড ও আশুলিয়ার সংযোগ পয়েন্ট এ প্রকৃতিগতভাবে উঁচু জমিতে ৩, ৫, ১০,২০ কাঠার প্লট বিক্রয় চলছে। এটি কোন প্রজেক্ট নয়, একটি &quot;মিনি রেসিডেন্স কমিউনিটি প্লান&quot;। ভবিষ্যতের একটি নিরাপদ ও লাভজনক বিনিয়োগের একটি সুবর্ণ সুযোগ। বিভিন্ন করপোরেট ও একক বিনিয়োগকারীদের ঘুরে দেখে যাওয়ার আমন্ত্রণ রইলো।।।</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(41, 2, 40, 'North Facing', '2021-02-10', '<p>একটি সনামধন্য গ্রুপ অফ কোম্পানির উদ্যোগে -&nbsp;</p>\r\n\r\n<p>Gandhariya, Boliyarpur, hemayetpur.</p>\r\n\r\n<p>সরকার অনুমোদিত মেট্রোরেল MRT-5 ডিপো এর সন্নিকটে প্রস্তাবিত ৮০&#39; ও ৬০&#39; রোডের সাথেই&nbsp; হেমায়েতপুর, ব্যাংক কলোনি, সাভার, বিরুলিয়া, উত্তরা, ইপিজেড ও আশুলিয়ার সংযোগ পয়েন্ট এ প্রকৃতিগতভাবে উঁচু জমিতে ৩, ৫, ১০,২০ কাঠার প্লট বিক্রয় চলছে। এটি কোন প্রজেক্ট নয়, একটি &quot;মিনি রেসিডেন্স কমিউনিটি প্লান&quot;। ভবিষ্যতের একটি নিরাপদ ও লাভজনক বিনিয়োগের একটি সুবর্ণ সুযোগ। বিভিন্ন করপোরেট ও একক বিনিয়োগকারীদের ঘুরে দেখে যাওয়ার আমন্ত্রণ রইলো।।।</p>', 'null', NULL, 'null', NULL, NULL, NULL),
(42, 1, 41, 'South Facing', '2021-12-16', '<p>একটি সনামধন্য গ্রুপ অফ কোম্পানির উদ্যোগে -&nbsp;</p>\r\n\r\n<p>Gandhariya, Boliyarpur, hemayetpur.</p>\r\n\r\n<p>সরকার অনুমোদিত মেট্রোরেল MRT-5 ডিপো এর সন্নিকটে প্রস্তাবিত ৮০&#39; ও ৬০&#39; রোডের সাথেই&nbsp; হেমায়েতপুর, ব্যাংক কলোনি, সাভার, বিরুলিয়া, উত্তরা, ইপিজেড ও আশুলিয়ার সংযোগ পয়েন্ট এ প্রকৃতিগতভাবে উঁচু জমিতে ৩, ৫, ১০,২০ কাঠার প্লট বিক্রয় চলছে। এটি কোন প্রজেক্ট নয়, একটি &quot;মিনি রেসিডেন্স কমিউনিটি প্লান&quot;। ভবিষ্যতের একটি নিরাপদ ও লাভজনক বিনিয়োগের একটি সুবর্ণ সুযোগ। বিভিন্ন করপোরেট ও একক বিনিয়োগকারীদের ঘুরে দেখে যাওয়ার আমন্ত্রণ রইলো।।।</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(43, 1, 42, 'South Facing', '2021-12-30', '<p>&sect;&nbsp; Project Location: 15 km from National Sangsad Bhaban, just by the way of Gabtoli, Amin Bazar and 2.8 Km from Dhaka Aricha Highway.</p>\r\n\r\n<p>&sect;&nbsp; Project Type: Residential &amp; Commercial.</p>\r\n\r\n<p>&sect;&nbsp; Dhanshiri Residence Land Area: 35 Bigha (1300 Katha/ 936000 Sft/ 2146.78 Decimal.)</p>\r\n\r\n<p>&sect;&nbsp; Total Plot: 131 No&rsquo;s (Approx.)</p>\r\n\r\n<p>&sect;&nbsp; Plot Size: 3, 4.5, 5, 6, 10Katha.</p>\r\n\r\n<p>&sect;&nbsp; Proposed Road: 170&#39; Asian Highway Road, 60&#39; attached Road with Asian Highway and 80&#39; Road attached with Dhaka-Aricha Highway.</p>\r\n\r\n<p>&sect;&nbsp; Project Road: 25 Feet inner Road and 40 Feet wide main Road.</p>\r\n\r\n<p>&sect;&nbsp; Type: North, North Corner, South, South Corner, Lake View, River View.</p>\r\n\r\n<p>&sect;&nbsp; Location: 15 km from National Sangsad Bhaban, just by the road of Gabtoli, Amin Bazar and 2.8 Km from Dhaka Aricha Highway.</p>\r\n\r\n<p>&sect;&nbsp; Connecting Roads.It is more effective location in the Geographical point of view. Boliyarpur Bazar Road, 300&rsquo; Feet Dhaka-Aricha Bypass Road and 60&#39; attached road, 80&rsquo; Feet Connecting road opposite of Hemayetpur Bazar. Surrounded by Gabtoli, Hemayetpur, Savar, EPZ, Chondra, Birulia and Ashulia.</p>\r\n\r\n<p>Advantages: (Why invest here)</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Very Near to MRT-5 central landing station (Metro Rail)</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Complete gated community.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Beside Kornomoti River.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; No need to pile.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Short Term/Quick Development.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Out of flood flow zone.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Under DAP (Detail Area Plan).</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Organized by Renowned Group of Company.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Standard Community maintain by Co-Operative Society.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; High land with natural greeneries &amp; ecofriendly environment.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Reasonable Price &amp; Conditions.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Easy Installment system.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Quick Registration and handover on at a time payment.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Secure investment and Double cash after 3 years.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; The Company is ensuring after sales services.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Only ten minutes far from Gabtoli Bus Terminal.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Circular city &amp; far away from traffic jam.</p>\r\n\r\n<p>&nbsp;And Many More....</p>\r\n\r\n<p>Finally, to make your dreams come true we &ldquo;Runner Land Development Ltd (RLDL).&rdquo; are waiting to serve you an absolute Residential &amp; commercial Land through all possible manners. So, definitely your proposal will get the top priority and as a business friend to extend the relationship with you, it is our commitment that, we will provide our best service ever.</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"2\",\"3\"]', NULL, NULL, NULL),
(44, 1, 43, 'South Facing', '2021-10-13', '<p>&sect;&nbsp; Project Location: 15 km from National Sangsad Bhaban, just by the way of Gabtoli, Amin Bazar and 2.8 Km from Dhaka Aricha Highway.</p>\r\n\r\n<p>&sect;&nbsp; Project Type: Residential &amp; Commercial.</p>\r\n\r\n<p>&sect;&nbsp; Dhanshiri Residence Land Area: 35 Bigha (1300 Katha/ 936000 Sft/ 2146.78 Decimal.)</p>\r\n\r\n<p>&sect;&nbsp; Total Plot: 131 No&rsquo;s (Approx.)</p>\r\n\r\n<p>&sect;&nbsp; Plot Size: 3, 4.5, 5, 6, 10Katha.</p>\r\n\r\n<p>&sect;&nbsp; Proposed Road: 170&#39; Asian Highway Road, 60&#39; attached Road with Asian Highway and 80&#39; Road attached with Dhaka-Aricha Highway.</p>\r\n\r\n<p>&sect;&nbsp; Project Road: 25 Feet inner Road and 40 Feet wide main Road.</p>\r\n\r\n<p>&sect;&nbsp; Type: North, North Corner, South, South Corner, Lake View, River View.</p>\r\n\r\n<p>&sect;&nbsp; Location: 15 km from National Sangsad Bhaban, just by the road of Gabtoli, Amin Bazar and 2.8 Km from Dhaka Aricha Highway.</p>\r\n\r\n<p>&sect;&nbsp; Connecting Roads.It is more effective location in the Geographical point of view. Boliyarpur Bazar Road, 300&rsquo; Feet Dhaka-Aricha Bypass Road and 60&#39; attached road, 80&rsquo; Feet Connecting road opposite of Hemayetpur Bazar. Surrounded by Gabtoli, Hemayetpur, Savar, EPZ, Chondra, Birulia and Ashulia.</p>\r\n\r\n<p>Advantages: (Why invest here)</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Very Near to MRT-5 central landing station (Metro Rail)</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Complete gated community.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Beside Kornomoti River.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; No need to pile.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Short Term/Quick Development.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Out of flood flow zone.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Under DAP (Detail Area Plan).</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Organized by Renowned Group of Company.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Standard Community maintain by Co-Operative Society.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; High land with natural greeneries &amp; ecofriendly environment.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Reasonable Price &amp; Conditions.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Easy Installment system.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Quick Registration and handover on at a time payment.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Secure investment and Double cash after 3 years.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; The Company is ensuring after sales services.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Only ten minutes far from Gabtoli Bus Terminal.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Circular city &amp; far away from traffic jam.</p>\r\n\r\n<p>&nbsp;And Many More....</p>\r\n\r\n<p>Finally, to make your dreams come true we &ldquo;Runner Land Development Ltd (RLDL).&rdquo; are waiting to serve you an absolute Residential &amp; commercial Land through all possible manners. So, definitely your proposal will get the top priority and as a business friend to extend the relationship with you, it is our commitment that, we will provide our best service ever.</p>', 'null', NULL, 'null', NULL, NULL, NULL),
(45, 1, 44, 'South Facing', '2021-10-23', '<p>&sect;&nbsp; Project Location: 15 km from National Sangsad Bhaban, just by the way of Gabtoli, Amin Bazar and 2.8 Km from Dhaka Aricha Highway.</p>\r\n\r\n<p>&sect;&nbsp; Project Type: Residential &amp; Commercial.</p>\r\n\r\n<p>&sect;&nbsp; Dhanshiri Residence Land Area: 35 Bigha (1300 Katha/ 936000 Sft/ 2146.78 Decimal.)</p>\r\n\r\n<p>&sect;&nbsp; Total Plot: 131 No&rsquo;s (Approx.)</p>\r\n\r\n<p>&sect;&nbsp; Plot Size: 3, 4.5, 5, 6, 10Katha.</p>\r\n\r\n<p>&sect;&nbsp; Proposed Road: 170&#39; Asian Highway Road, 60&#39; attached Road with Asian Highway and 80&#39; Road attached with Dhaka-Aricha Highway.</p>\r\n\r\n<p>&sect;&nbsp; Project Road: 25 Feet inner Road and 40 Feet wide main Road.</p>\r\n\r\n<p>&sect;&nbsp; Type: North, North Corner, South, South Corner, Lake View, River View.</p>\r\n\r\n<p>&sect;&nbsp; Location: 15 km from National Sangsad Bhaban, just by the road of Gabtoli, Amin Bazar and 2.8 Km from Dhaka Aricha Highway.</p>\r\n\r\n<p>&sect;&nbsp; Connecting Roads.It is more effective location in the Geographical point of view. Boliyarpur Bazar Road, 300&rsquo; Feet Dhaka-Aricha Bypass Road and 60&#39; attached road, 80&rsquo; Feet Connecting road opposite of Hemayetpur Bazar. Surrounded by Gabtoli, Hemayetpur, Savar, EPZ, Chondra, Birulia and Ashulia.</p>\r\n\r\n<p>Advantages: (Why invest here)</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Very Near to MRT-5 central landing station (Metro Rail)</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Complete gated community.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Beside Kornomoti River.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; No need to pile.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Short Term/Quick Development.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Out of flood flow zone.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Under DAP (Detail Area Plan).</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Organized by Renowned Group of Company.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Standard Community maintain by Co-Operative Society.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; High land with natural greeneries &amp; ecofriendly environment.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Reasonable Price &amp; Conditions.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Easy Installment system.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Quick Registration and handover on at a time payment.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Secure investment and Double cash after 3 years.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; The Company is ensuring after sales services.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Only ten minutes far from Gabtoli Bus Terminal.</p>\r\n\r\n<p>&Oslash;&nbsp; &nbsp; Circular city &amp; far away from traffic jam.</p>\r\n\r\n<p>&nbsp;And Many More....</p>\r\n\r\n<p>Finally, to make your dreams come true we &ldquo;Runner Land Development Ltd (RLDL).&rdquo; are waiting to serve you an absolute Residential &amp; commercial Land through all possible manners. So, definitely your proposal will get the top priority and as a business friend to extend the relationship with you, it is our commitment that, we will provide our best service ever.</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"3\",\"4\"]', NULL, NULL, NULL),
(46, 1, 45, 'South Facing', '2021-09-16', NULL, '[\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(47, 1, 46, 'South Facing', '2022-12-30', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(48, 1, 47, 'South Facing', '2019-03-06', '<p><strong>We are highly glad to inform you that&nbsp;&nbsp;&ldquo;Swadesh Properties Limited &ldquo; is one of the largest and credible land development company&nbsp;&nbsp;in Dhaka City. Since 2004 we are developing this business with fame and fulfillment of customer&rsquo;s demand and satisfaction. We have two different project in north city corporation &amp; both the projects are under rajuk approval.</strong></p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(49, 1, 48, 'South Facing', '2017-02-15', '<p><em><strong>Bashundhara P block 4 Katha North facing Plot @15,00,000tk.</strong></em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Basic Plot Information:</p>\r\n\r\n<p>Block : P</p>\r\n\r\n<p>Plot no: 4***</p>\r\n\r\n<p>Plot Size : 4</p>\r\n\r\n<p>Face : North</p>\r\n\r\n<p>Front Road Size: 25&#39;ft</p>\r\n\r\n<p>Registration:</p>\r\n\r\n<p>Mutation:</p>\r\n\r\n<p>Demarcation :Ok</p>\r\n\r\n<p>Gat Pass :</p>\r\n\r\n<p>Rajuk Approval :ok</p>\r\n\r\n<p>Sand Filling:Ok</p>\r\n\r\n<p>Name transfer: Ok</p>\r\n\r\n<p>Ready for building construction After Few time</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(50, 1, 49, 'South Facing', '2021-11-12', '<p>Aftabnagar 3.5 Katha.</p>\r\n\r\n<p>50 lakh per Katha.</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(51, 1, 50, 'South Facing', '2021-09-23', NULL, '[\"2\",\"3\"]', NULL, 'null', NULL, NULL, NULL),
(52, 1, 51, 'South Facing', '2021-09-01', NULL, '[\"2\",\"3\"]', NULL, 'null', NULL, NULL, NULL),
(53, 1, 52, 'South Facing', '2021-09-05', NULL, '[\"1\",\"2\"]', NULL, 'null', NULL, NULL, NULL),
(54, 1, 53, 'South Facing', '2021-10-04', '<p>100-1000sft shop &amp; commercial space are available at new 60 feet road of Mirpur 2 behind Grammen Bank to Agargaon, Already, running Fast Food Restaurant, Burber shop, Fruit shop, ATM booth, Doctor Chamber, Pharmacy and many more ...Only 3 shops available in ground floor and will be are rented based on 1st come 1st serve basis ...Genuine and interested businessman are encourage to call</p>', 'null', NULL, 'null', NULL, NULL, NULL),
(55, 2, 54, 'North Facing', '2021-09-10', NULL, 'null', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(56, 1, 55, 'South Facing', '2021-10-09', '<p>1654 sqf, flat no. 305, building no. 3C, RAJUK UTTARA APARTMENT PROJECT, UTTARA SECTOR 18.</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, 'null', NULL, NULL, NULL),
(57, 1, 56, 'South Facing', '2021-09-01', '<p>Flat is on the 4th Floor, South Side, 3 Bed Rooms, 3 Toilets, Drawing cum Dinning, Kitchen, 1300 sft. Rent: Tk.20,000 (negotiable) per month and Service Charge: Tk.4,000</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Floor and Bathrooms are fully having with tiles, good quality fittings at the toilets, AC and IPS options are available, good security with extra collapsible gate in the main door, good location, well maintained and ready flat, garage is not available, all time water and gas supply, electricity bill of the flat should pay by the tenant. the building is located at a prime place of B Block, Mirpur-12, all facilities such as bazar, shopping malls, education institutions, bus stand are nearby.</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(58, 2, 57, 'North Facing', '2021-09-09', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(59, 2, 58, 'North Facing', '2021-10-07', '<p>Flat for rent at Kathalbagan</p>\r\n\r\n<p>Address :&nbsp;&nbsp;64/1, Free School Street, Kathalbagan, Dhaka.</p>\r\n\r\n<p>At 1st &amp; 4th&nbsp;&nbsp;floor</p>\r\n\r\n<p>Flat size : 1250 sq feet</p>\r\n\r\n<p>2 bed,</p>\r\n\r\n<p>Drawing, dining,</p>\r\n\r\n<p>3 bath,</p>\r\n\r\n<p>3 balconi</p>\r\n\r\n<p>Car parking : 1</p>\r\n\r\n<p>Rent : 22000 BDT ( 4th floor) &amp; 23000 BDT ( 1st floor)</p>\r\n\r\n<p>Service charge &amp; others: 3000 BDT ( including water, gas &amp; sewerage bill)</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(60, 1, 59, 'South Facing', '2021-10-21', NULL, 'null', NULL, 'null', NULL, NULL, NULL);
INSERT INTO `prd_listing_additional_info` (`id`, `f_facing_no`, `f_listing_no`, `facing`, `handover_date`, `description`, `f_feature_nos`, `features`, `f_nearby_nos`, `nearby`, `location_map`, `video_code`) VALUES
(61, 1, 60, 'South Facing', '2020-08-19', '<p>INDUSTRIAL WEREHOUSE &amp; FACTORY SHED AT&nbsp;Dhk-syl highway</p>\r\n\r\n<p>100000sqft<br />\r\n15 km&nbsp;distance from gawsia</p>\r\n\r\n<p>Shed Height &ndash;12.33 ft<br />\r\nWidth:60ft<br />\r\nLength:&nbsp;420ft<br />\r\nElectricity:&nbsp;upon discussion<br />\r\nFactory:<br />\r\nOwners of the factory shed &ndash; single<br />\r\nRent: Tk.22/- P/sft.<br />\r\nAdvance: 9 months &amp; 3 Month for security advance.<br />\r\nAfter 3 years will be 10% increase of rent for next 2 years.</p>\r\n\r\n<p><a href=\"https://youtu.be/Ljy_0CRwqT8\" target=\"_blank\">https://youtu.be/Ljy_0CRwqT8</a></p>\r\n\r\n<p><br />\r\nUtility: So many big and small industry with in 2/3 km, Land is 100% fit for any kind of Garments, Battery Factory, Fashion Industry, Packaging Factory.<br />\r\nIt&#39;s the best place also to made warehouse, could storage or storage of goods because from here you can transport your goods anywhere in the country in any time. Because cargoes or trucks are running in this road 24 hours. In resent days lots of warehouse and business center were established in this area due to well communication.<br />\r\nBroker / Service commission 1 month rent from buyer side no sharing for rent<br />\r\nOnly real and interested customers are requested to contact</p>', '[\"1\",\"2\",\"3\"]', NULL, '[\"1\"]', NULL, NULL, 'https://youtu.be/Ljy_0CRwqT8'),
(62, 1, 61, 'South Facing', '2021-09-13', '<p>INDUSTRIAL WEREHOUSE &amp; FACTORY SHED AT&nbsp;Dhk-syl highway</p>\r\n\r\n<p>20000sqft<br />\r\nShed Height &ndash;20ft<br />\r\nWidth:<br />\r\nLength:<br />\r\nElectricity:&nbsp;upon discussion<br />\r\nFactory:<br />\r\nOwners of the factory shed &ndash; single<br />\r\nRent: Tk.12/- P/sft.<br />\r\nAdvance: 9 months &amp; 3 Month for security advance.<br />\r\nAfter 3 years will be 10% increase of rent for next 2 years.</p>\r\n\r\n<p><br />\r\nUtility: So many big and small industry with in 2/3 km, Land is 100% fit for any kind of Garments, Battery Factory, Fashion Industry, Packaging Factory.<br />\r\nIt&#39;s the best place also to made warehouse, could storage or storage of goods because from here you can transport your goods anywhere in the country in any time. Because cargoes or trucks are running in this road 24 hours. In resent days lots of warehouse and business center were established in this area due to well communication.<br />\r\nBroker / Service commission 1 month rent from buyer side no sharing for rent<br />\r\nOnly real and interested customers are requested to contact</p>', '[\"1\"]', NULL, 'null', NULL, NULL, NULL),
(63, 1, 62, 'South Facing', '2021-09-13', '<p><strong>INDUSTRIAL WEREHOUSE &amp; FACTORY SHED AT GAZIPUR KALIGONG, ULUKHOLA, GAZIPUR</strong><br />\r\nLand Size-</p>\r\n\r\n<p>32000 sft fabrication still structure shed with RCC wall.</p>\r\n\r\n<p>25000 sft. Shed &amp; 5000 sft. Open Space for loading Unloading Space</p>\r\n\r\n<p><strong>15 km &amp; 20 minute distance from Tongi bridge</strong></p>\r\n\r\n<p>Shed Height &ndash; 23- 37 feet.</p>\r\n\r\n<p>Width: 132 Feet</p>\r\n\r\n<p>Length: 186 feet</p>\r\n\r\n<p>Electricity: 20 KVA is ready &ndash; To be added up to 90 KVA by max. 1 month</p>\r\n\r\n<p>Factory:</p>\r\n\r\n<p>Owners of the factory shed &ndash; single</p>\r\n\r\n<p>Rent: Tk.18/- P/sft.</p>\r\n\r\n<p>Advance: 9 months &amp; 3 Month for security advance.</p>\r\n\r\n<p>After 3 years will be 10% increase of rent for next 2 years.</p>\r\n\r\n<p>Only Half km meter distance from Asian Highway Road</p>\r\n\r\n<p>After finishing the bridge the distance of Dhk-NB, Dhk-Syl, Dhk - Ctg &amp; Asia Highway will be very shorter.</p>\r\n\r\n<p>Utility: So many big and small industry with in 2/3 km, Land is 100% fit for any kind of&nbsp;&nbsp;Garments, Battery Factory, Fashion Industry, Packaging Factory.</p>\r\n\r\n<p>It&#39;s the best place also to made warehouse, could storage or storage of goods because from here you can transport your goods anywhere in the country in any time. Because cargoes or trucks are running in this road 24 hours. In resent days lots of warehouse and business center were established in this area due to well communication.</p>\r\n\r\n<p>Broker / Service commission 1 month rent from buyer side no sharing for rent</p>\r\n\r\n<p><strong>Only real and interested customers are requested to contact</strong></p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(64, 1, 63, 'South Facing', '2021-09-13', '<p>Factory shade for rent at Gazipur</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shade space : 175000sqft</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shade height 24-28ft</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Current 421kva</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transformer 2100kva</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diesel generator capacity 1500kva</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gas capacity : available (exact fig needs to be updated)</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Two boilers</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Asking rent 18tk per sqft</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Advance 30000000 bdt</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Minimum Contact period 5yrs</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BNBC and Accord standard Shade (as per discussion)</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shade is excellent for woven, knitting, sweater factory</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dyeing setup</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;60000sqft Shade dying setup</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Per day 40000 pound capacity</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rent 1500000 (negotiable)</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Advance as per discussion</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hank Dyeing</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dapam Japanese machinery setup</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Some minor repairment needed</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Advance as per discussionand conditions will be subject to be discussed between both parties.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Shade location Gazipur. Rest exact location will be given after discussion.</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(65, 2, 64, 'North Facing', '2021-09-13', '<p>120000sqft Industrial garments building with Accord certificate</p>\r\n\r\n<p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total 6 floors 20500sqft each floor</p>\r\n\r\n<p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Each floor height 10-12ft</p>\r\n\r\n<p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Previous used for garments purpose</p>\r\n\r\n<p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accord certified, bsci, sedex, ocs,C&amp;A, general bond, Sel clearing certified</p>\r\n\r\n<p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Office space with furniture</p>\r\n\r\n<p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Security guard room</p>\r\n\r\n<p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Loading Unloading space</p>\r\n\r\n<p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Another 12000sqft one floored building available can be rented as well, just beside the building</p>\r\n\r\n<p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total land area 130 decimal, total building area 70 decimal approx</p>\r\n\r\n<p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Electricity 400kva</p>\r\n\r\n<p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gas connection 2inch dia pipe ( capacity will be updated during the meeting)</p>\r\n\r\n<p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Generator 500kva and 68 kva</p>\r\n\r\n<p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rent fixed 20tk sqft</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(66, 1, 65, 'South Facing', '2021-09-13', '<p>4000 SFT Warehouse/Godown is available for rental basis for long term/short term basis.</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(67, 2, 66, 'North Facing', '2021-09-06', '<p>Newly constructed 10,000 sft Shade or Building is ready for rent for Garments or Knitting Factory or Warehouse or Other Factories.</p>\r\n\r\n<p>Any type of vehecle can get inside the Shade or Building easily. It has good vehical parking area.</p>\r\n\r\n<p>This Shade or Building is secured with the boundary wall.</p>\r\n\r\n<p>There are many different types of industries are available&nbsp; in this area.</p>\r\n\r\n<p>So, you will find all types of facilities here.</p>\r\n\r\n<p>Distance of Mosque and Bazar is only 200 meter. There are many ways for moving to Dhaka/Shaver/Gazipur/Tangail from this location.</p>\r\n\r\n<p>I believe you can enjoy your business in this location with less investment and less effort.</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(68, 1, 67, 'South Facing', '2021-09-13', '<p>Contact for more information.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sms - 01713068295</p>\r\n\r\n<p>Email - imtiaz.lalbaghchemical@gmail.com</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(69, 1, 68, 'South Facing', '2021-09-13', '<h1>Security: Well secured commercial shed with a strong gate<br />\r\nLocation: Great location close to all transport link, very close to airport, train station and bus services.<br />\r\nParking: Car Parking available nearby<br />\r\nLoading and Unloading: Well secured loading and unloading facilities available.<br />\r\nArea: Large usable space of 4000 sqft<br />\r\nTerms: Long term lease available with minimum 3 years break clase with upward rent review.<br />\r\nSecurity Deposit/ Advance: Required ( Negotiable for the right Tenant)</h1>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(70, 1, 69, 'South Facing', '2021-09-13', '<p>Looking for tenant to rent factory space (garments is preferred) located at Mirpur 7 Industrial Area, Dhaka.</p>\r\n\r\n<p>Total Factory Space: 15825 Square Feet (5 storied building)</p>\r\n\r\n<p>Building structure is approved by ACCORD (green status).</p>\r\n\r\n<p>Have emergency stairs, water, electricity and other facilities.</p>\r\n\r\n<p>Rent: BDT 20/Sqft</p>\r\n\r\n<p>Available from 1st January, 2020.</p>\r\n\r\n<p>Advance amount will be determined upon discussion.</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(71, 1, 70, 'South Facing', '2021-09-13', '<p>We have a commercial property for rent at Afil Gate,Khulna. A warehouse of about 28,000 sft, height about 40 ft, completely secured by 24/7 guard posts and 12ft boundary wall. So, no need for any extra security from your side. It&rsquo;s a fortress in short. Location is by the side of river Voirob, so you can use river transportation also as we do have jetty facility also. Very good transportation for trucks and other vehicle. No hassle from any party. Emergency firefighting system installed. Housing facility for officials also. We will be grateful if you pay visit and accept our invitation.</p>', '[\"1\",\"4\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(72, 1, 71, 'South Facing', '2021-09-13', '<h3>PROPERTY SUMMARY</h3>\r\n\r\n<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;No Name</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;&nbsp;Industrial Space</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;&nbsp;Rent</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;&nbsp;Demra , Dhaka</li>\r\n	<li>&nbsp;Address&nbsp;:&nbsp;&nbsp;Demra, Rajakhali</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;&nbsp;5000 sqft</li>\r\n	<li>&nbsp;Deposit Amount&nbsp;:&nbsp;&nbsp;10.00 Lac</li>\r\n	<li>&nbsp;Furnishing&nbsp;:&nbsp;&nbsp;N/A</li>\r\n	<li>&nbsp;Floor Available On&nbsp;:&nbsp;&nbsp;1st Floor,</li>\r\n	<li>&nbsp;Total Floor:&nbsp;2</li>\r\n	<li>&nbsp;Available From :&nbsp;June 23, 2021</li>\r\n</ul>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(73, 1, 72, 'South Facing', '2021-09-13', '<p>Dear Sir,</p>\r\n\r\n<p><strong><em>Rahman Industrial Park&nbsp;</em></strong><em>is our new venture where<strong>&nbsp;</strong>we are planning to build around 25 to 30 industrial sheds of different size&nbsp;<strong>(10&rsquo;000, 15&rsquo;000, 20&rsquo;000, even up to 100&rsquo;000 sqft)</strong>&nbsp;as per the requirement of our tenant.</em></p>\r\n\r\n<p><em>The park is situated on&nbsp;<strong>400&rsquo;000 sqft</strong>&nbsp;of land &amp; the entire area is fully secured &amp; is surrounded by boundary wall</em></p>\r\n\r\n<p><em>Usually we handover the building to the tenant according to their requirement of (length &amp; width) within&nbsp;<strong>90 to 120 days</strong>&nbsp;of confirmation.</em></p>\r\n\r\n<p><em>Depending&nbsp;on the quality &amp; specification of the&nbsp;shed the rent varies from&nbsp;<strong>tk-20, tk-18, tk-16 per sqft</strong>&nbsp;(negotiable) and the agreement period are of&nbsp;<strong>10 years to 7 years</strong>, we need security deposit &amp; advance while signing the contact.</em></p>\r\n\r\n<p>Best Regards,</p>\r\n\r\n<p>S Rahman</p>\r\n\r\n<p><strong><em>01921-822877, 01743-573812</em></strong><em>&nbsp;(Saturday to Thursday) / 9 am to 5 pm)</em></p>\r\n\r\n<p><a href=\"mailto:rahmanindlpark@gmail.com\" target=\"_blank\"><em>rahmanindlpark@gmail.com</em></a></p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(74, 1, 73, 'South Facing', '2021-09-13', '<ul>\r\n	<li><em>Interested in renting out few industrial sheds (prefab steel buildings) measuring&nbsp;<strong>10&rsquo;000/ 15&rsquo;000/20&rsquo;000 even up to 100&rsquo;000 sqft.</strong></em></li>\r\n	<li>We are in a position to assist you in getting electric line.</li>\r\n	<li>We also have full central security system with CCTV Camera &amp; Security Guard 24/7.</li>\r\n	<li><em>Hand over within 90/120 days (Depend on quality &amp; size).</em></li>\r\n	<li><em>There is some picture of buildings we do make for our tenants.</em></li>\r\n	<li><em>Rent as per sqft &ndash;16/18/20 tk. According to building types.</em></li>\r\n	<li><em>Intercom,</em>&nbsp;Water supply, Security Guard, Cleaner, Broad-Band connection (For your own factory) are available for monthly charge.</li>\r\n</ul>', '[\"1\",\"4\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(75, 1, 74, 'South Facing', '2021-09-13', '<p><strong>Rahman Industrial Park</strong>&nbsp;is our new venture where we are planning to build around 25 to 30 industrial sheds of different size (<strong>10&rsquo;000, 15&rsquo;000, and 20&rsquo;000, even up to 100&rsquo;000 sqft)</strong>&nbsp;as per the requirement of our tenant.</p>\r\n\r\n<p>&nbsp;The park is situated on&nbsp;<strong>400&rsquo;000 sqft</strong>&nbsp;of land &amp; the entire area is fully secured &amp; is surrounded by boundary wall.</p>\r\n\r\n<p>Usually we handover the building to the tenant according to their requirement of (length &amp; width) within&nbsp;<strong>150 to 180 days</strong>&nbsp;of confirmation.</p>\r\n\r\n<p>&nbsp;Depending on the quality &amp; specification of the shed the rent varies from&nbsp;<strong>tk-20,tk-18,tk-16 per</strong>&nbsp;sqft (negotiable) and the arrangement period are&nbsp;<strong>of 10 years to 7 years</strong>, we need security deposit &amp; advance while signing the contract.</p>\r\n\r\n<p>&nbsp;Best Regards,</p>\r\n\r\n<p>&nbsp;S Rahman</p>\r\n\r\n<p>Land Lord</p>\r\n\r\n<p>Rahman Industrial Park</p>\r\n\r\n<p>Sunday to Thursday</p>\r\n\r\n<p>10am to 5 pm</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(76, 1, 75, 'South Facing', '2021-09-13', '<p>1. Eight storey building and it is under construction.</p>\r\n\r\n<p>2.Till this date 4th floor is completed and work in process..</p>\r\n\r\n<p>3. The commercial building is Just besides the Main road</p>\r\n\r\n<p>4. Road is 30 foot width &amp; Concreat Road</p>\r\n\r\n<p>5. Road is plain and the road connects to the north Konabari and to the south Baipail,ashulia Road.</p>\r\n\r\n<p>6. There are many Commercial building and Industries nearby.</p>\r\n\r\n<p>7. Building is welly constructed and is suitable for any kind of instution/ Business like, Garments, office , Bank, hospital, school etc to process there work.</p>\r\n\r\n<p>8. And building is built by following all particular Government plan for building.</p>\r\n\r\n<p>9.&nbsp; other facility available like, electricity, Gas, sewage system, peaceful environment, mosque nearby, Market nearby, Available transport system, Lift etc.</p>\r\n\r\n<p>we are looking forward to rent our building to a suitable client who will ensure peace between us and offer us handsome rental money and security money. The building is 8 floor building and under construction (1st 4 floor completed ).4300 squre feet building. The rent is 120000 taka per floor which is only 28 taka per sqft(negotiable) and if any one want to take the full building or more then 3 floor there will be discount for them.&nbsp;</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(77, 1, 76, 'South Facing', '2021-09-13', '<p>Newly constructed 10,000 sft Shade or Building is ready for rent for Garments or Knitting Factory or Warehouse or Other Factories.</p>\r\n\r\n<p>Any type of vehecle can get inside the Shade or Building easily. It has good vehical parking area.</p>\r\n\r\n<p>This Shade or Building is secured with the boundary wall.</p>\r\n\r\n<p>There are many different types of industries are available&nbsp; in this area.</p>\r\n\r\n<p>So, you will find all types of facilities here.</p>\r\n\r\n<p>Distance of Mosque and Bazar is only 200 meter. There are many ways for moving to Dhaka/Shaver/Gazipur/Tangail from this location.</p>\r\n\r\n<p>I believe you can enjoy your business in this location with less investment and less effort.</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(78, 1, 77, 'South Facing', '2021-09-13', '<p>Detail:</p>\r\n\r\n<p>Commercial space rent in Mirpur 6</p>\r\n\r\n<p>Size: 700 sqft approx</p>\r\n\r\n<p>4 Rooms, 2 wash room, 1 kitchen, 1 veranda</p>\r\n\r\n<p>situated in 1st floor</p>\r\n\r\n<p>Only genuine business owners are requested to contact</p>\r\n\r\n<p>Rent: 20,000</p>\r\n\r\n<p>Advance: 1,00,000</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(79, 1, 78, 'South Facing', '2021-09-14', '<p>7 bedroom 2 reception one big kitchen&nbsp; 5 bathroom for sale&nbsp;</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(80, 1, 79, 'South Facing', '2021-09-14', '<p>1400 sqft, 3 Beds Ready Apartment/Flats for Sale at Akhalia</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(81, 1, 80, 'South Facing', '2021-09-14', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;Smart fokhrey Ara Ashan Garden.</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Kallyanpur , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Ready</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1380 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;2nd Floor, 4th Floor, 6th Floor, 8th Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;03</li>\r\n	<li>&nbsp;Baths :&nbsp;03</li>\r\n	<li>&nbsp;Balconies:&nbsp;3</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;9</li>\r\n	<li>&nbsp;Furnishing:&nbsp;N/A</li>\r\n	<li>&nbsp;Facing:&nbsp;N/A</li>\r\n	<li>&nbsp;Land Area:&nbsp;24 katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;July 01, 2020</li>\r\n</ul>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(82, 1, 81, 'South Facing', '2021-09-14', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;Smart fokrey Ara Ashan Garden.</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Kallyanpur , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Under Construction</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1500 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;2nd Floor, 4th Floor, 6th Floor, 8th Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;03</li>\r\n	<li>&nbsp;Baths :&nbsp;03</li>\r\n	<li>&nbsp;Balconies:&nbsp;3</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;9</li>\r\n	<li>&nbsp;Furnishing:&nbsp;N/A</li>\r\n	<li>&nbsp;Facing:&nbsp;N/A</li>\r\n	<li>&nbsp;Land Area:&nbsp;24 katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;July 31, 2020</li>\r\n</ul>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(83, 1, 82, 'South Facing', '2021-09-14', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;Smart Fokhrey-Ara Garden</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Kallyanpur , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Under Construction</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1800 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;2nd Floor, 4th Floor, 6th Floor, 8th Floor, 9th Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;03</li>\r\n	<li>&nbsp;Baths :&nbsp;03</li>\r\n	<li>&nbsp;Balconies:&nbsp;3</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;9</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Unfurnished</li>\r\n	<li>&nbsp;Facing:&nbsp;N/A</li>\r\n	<li>&nbsp;Land Area:&nbsp;24 katha</li>\r\n</ul>', '[\"1\"]', NULL, '[\"1\",\"3\"]', NULL, NULL, NULL),
(84, 1, 83, 'South Facing', '2021-09-14', '<ul>\r\n	<li>Property Name&nbsp;:&nbsp;&nbsp;Smart Fokhray Ara Ashan Garden</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Kallyanpur , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Under Construction</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1200 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;1st Floor, 3rd Floor, 4th Floor, 6th Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;03</li>\r\n	<li>&nbsp;Baths :&nbsp;03</li>\r\n	<li>&nbsp;Balconies:&nbsp;3</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;9</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Unfurnished</li>\r\n	<li>&nbsp;Facing:&nbsp;N/A</li>\r\n	<li>&nbsp;Land Area:&nbsp;24 katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;July 31, 2020</li>\r\n</ul>', '[\"1\",\"2\",\"3\"]', NULL, '[\"1\",\"3\"]', NULL, NULL, NULL),
(85, 1, 84, 'South Facing', '2021-09-14', '<p>Smart Fittings&nbsp;</p>\r\n\r\n<p>1200,1380,1400,1450,1500,1750,1800. sqft, 3 Beds Flat for Sale at Kallyanpur.</p>', '[\"1\",\"2\",\"3\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(86, 1, 85, 'South Facing', '2021-09-14', '<p>A completely ready 1200 square feet flat for sale at the 9th Storey of a 10 storey building very near to Kallyanpur Bus Stand (only 2 minutes walking) in an excellent location. All 3 sides are open and there are lots of Air and Sunlight because the adjacent bulidings height is only 6 storey. South and West sides completely wide open until the Sky! It has 3 bed, 3 bath, drawing, dining and 2 verandas.</p>\r\n\r\n<p>Fitted with electricity line, Titas gas line, and 2 water supply lines (1 from WASA and the other from own deep tubewel), so there are no worries about any utilities.&nbsp;</p>\r\n\r\n<p>2 Lifts, generator, CCTV in every floor, and low service charge per month (only 2500 taka).</p>\r\n\r\n<p>Price 5500 taka per square feet + 400,000 taka for parking. Registration, Nam jari, Tax papers everything completed.&nbsp;&nbsp;</p>', '[\"2\",\"3\"]', NULL, '[\"1\",\"2\",\"3\",\"4\"]', NULL, NULL, NULL),
(87, 1, 86, 'South Facing', '2021-09-14', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;Munia Aman house টোটাল ১১ টা ফ্লাট প্রতিটা ১৬৫০ স্কোয়ার ফিট</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Independent House</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Mirpur 2 , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Ready</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1650 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;1st Floor, 2nd Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;03</li>\r\n	<li>&nbsp;Baths :&nbsp;02</li>\r\n	<li>&nbsp;Balconies:&nbsp;2</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;6</li>\r\n	<li>&nbsp;Furnishing:&nbsp;N/A</li>\r\n	<li>&nbsp;Facing:&nbsp;N/A</li>\r\n	<li>&nbsp;Land Area:&nbsp;2.5 katha katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;July 05, 2021</li>\r\n</ul>', '[\"1\",\"2\",\"3\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(88, 1, 87, 'South Facing', '2021-09-14', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;৩ তলা বিল্ডিং মাএ ১ কোটি ৩০ লাখ</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Independent House</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Tongi , Gazipur</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Ready</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1600 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;3rd Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;01</li>\r\n	<li>&nbsp;Baths :&nbsp;01</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;3</li>\r\n	<li>&nbsp;Furnishing:&nbsp;N/A</li>\r\n	<li>&nbsp;Facing:&nbsp;N/A</li>\r\n	<li>&nbsp;Land Area:&nbsp;2.25 katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;June 26, 2021</li>\r\n</ul>', '[\"2\",\"3\"]', NULL, '[\"1\",\"3\"]', NULL, NULL, NULL),
(89, 1, 89, 'South Facing', '2021-09-14', '<p>Stone foundation, high longevity.</p>\r\n\r\n<p>Peace and Silent environment.</p>\r\n\r\n<p>Around the building there is no high raised building blockage, which gives peace of eyes.</p>', '[\"1\",\"2\",\"3\"]', NULL, '[\"2\",\"4\"]', NULL, NULL, NULL),
(90, 1, 90, 'South Facing', '2021-09-14', '<p>70,000 SFT Commercial Facility for Rent.</p>\r\n\r\n<p>Ideal for Fulfilment Center, Warehousing, Factory &amp; Data Center</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&bull;Aesthetic windows can be complete closed off to block sunlight</p>\r\n\r\n<p>&bull;</p>\r\n\r\n<p>&bull;Front design and Color and glass can be done based on the choice of the tenant</p>\r\n\r\n<p>&bull;</p>\r\n\r\n<p>&bull;Top Floor with Roof Top Garden and Office facility</p>\r\n\r\n<p>&bull;</p>\r\n\r\n<p>&bull;Ample Parking Space with Truck ramp and Dock facility</p>\r\n\r\n<p>&bull;</p>\r\n\r\n<p>&bull;Raised Land with no exposure of flood</p>\r\n\r\n<p>&bull;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&bull;Freight Elevator Option</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(91, 1, 91, 'South Facing', '2021-09-14', '<p>Space rent for Office, Mini Factory, Gadowns etc.</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(92, 1, 92, 'South Facing', '2021-09-14', '<p>Total12 katha land for rent 7 katha open land shade will be made by owner and rest 5 katha with two house 7 rooms available. Gas, current, water supply available. Good location for a factory or godown place. Corner plot. Good communication to all Dhaka city and city out location. No local or political influences.</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(93, 1, 93, 'South Facing', '2021-09-14', '<p><strong>আমেরিকান</strong><strong>&nbsp;</strong><strong>স্টাইল&nbsp;</strong><strong>&nbsp;</strong><strong>শপিং</strong><strong>&nbsp;</strong><strong>মলে</strong><strong>&nbsp;</strong><strong>সুবিশাল</strong><strong>&nbsp;</strong><strong>পার্কিংয়ের</strong><strong>&nbsp;</strong><strong>ব্যবস্থা</strong><strong>&nbsp;</strong><strong>সহ ৫০০</strong><strong>-</strong><strong>২৫০০০ বর্গফুট বেকারী</strong><strong>,&nbsp;</strong><strong>রেস্টুরেন্ট</strong><strong>,&nbsp;</strong><strong>কনভেনশন</strong><strong>&nbsp;</strong><strong>হল এবং মডার্ন কার ওয়াসের জন্য ২ বিঘা জমি</strong><strong>&nbsp;</strong><strong>ভাড়া</strong><strong>/</strong><strong>বিক্রয়</strong></p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(94, 1, 94, 'South Facing', '2021-09-14', '<p>It is located opposite the BRTC staff quarters on Mymensingh road from gazipur intersection.The factory is located along main street.The land has 4500 CMB industrial gas line connections and there is 150KVA industrial electric line. the total space amount is 38 decimal or 18000 squarefit.The whole place is set in tin.&nbsp;</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(95, 2, 95, 'North Facing', '2021-09-14', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;Alom Vila</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;&nbsp;Industrial Space</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;&nbsp;Rent</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;&nbsp;Pallabi , Dhaka</li>\r\n	<li>&nbsp;Address&nbsp;:&nbsp;&nbsp;11/C, Avenue-5, Road-5/1, House-6, Alomnagar society, pallabi Dhaka.</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;&nbsp;3150 sqft</li>\r\n	<li>&nbsp;Deposit Amount&nbsp;:&nbsp;&nbsp;5.00 Lac</li>\r\n	<li>&nbsp;Furnishing&nbsp;:&nbsp;&nbsp;Unfurnished</li>\r\n	<li>&nbsp;Floor Available On&nbsp;:&nbsp;&nbsp;1st Floor, 2nd Floor, Basement Floor,</li>\r\n	<li>&nbsp;Total Floor:&nbsp;3</li>\r\n	<li>&nbsp;Available From :&nbsp;June 01, 2020</li>\r\n</ul>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(96, 1, 96, 'South Facing', '2018-06-08', '<p>Main Road on Mirpur road at Dhanmondi road no. 3.</p>\r\n\r\n<p>Market is not classified (You can use this shop for any business or office or any purpose)</p>\r\n\r\n<p>Registry with Sabkawla.</p>\r\n\r\n<p>1 minutes walking distance from Dhaka City Collage. This area is occupied with many Hospital, Business shops, Markets, Offices, School and Colleges. A comfortable place to move all around City Easily. Location is very prime.</p>\r\n\r\n<p>Price: 25,000/- Per Sft (total-4875000)</p>\r\n\r\n<p>Size: 195 Sq.ft</p>\r\n\r\n<p>Dr. Refatullah&#39;s Happy Arcade (2nd floor)</p>\r\n\r\n<p>House # 3, Road # 3,</p>\r\n\r\n<p>Dhanmondi,Dhaka.</p>\r\n\r\n<p>Contact: 01911359354</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(97, 1, 97, 'South Facing', '2021-09-14', '<ul>\r\n	<li>Property Name&nbsp;:&nbsp;&nbsp;Urgent sale shop@Polwell carnation</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Showroom/Shop/Restaurant</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Uttara , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Ready</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;239 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;4th Floor,</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Furnishing:&nbsp;N/A</li>\r\n	<li>&nbsp;Facing:&nbsp;N/A</li>\r\n	<li>&nbsp;Land Area:&nbsp;N/A</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;February 11, 2018</li>\r\n</ul>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(98, 1, 98, 'South Facing', '2021-09-14', '<ul>\r\n	<li>Property Name&nbsp;:&nbsp;&nbsp;Rupayon City Uttara</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Office Space</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Uttara , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Almost Ready</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;441 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;1st Floor,</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Furnished</li>\r\n	<li>&nbsp;Facing:&nbsp;N/A</li>\r\n	<li>&nbsp;Land Area:&nbsp;N/A</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;May 18, 2021</li>\r\n</ul>', '[\"1\"]', NULL, '[\"3\"]', NULL, NULL, NULL),
(99, 1, 99, 'South Facing', '2021-09-14', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;Excellent Food Shop in a Food Court in Grand Zam Zam Tower</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Showroom/Shop/Restaurant</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Uttara , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Ready</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;228 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Furnishing:&nbsp;N/A</li>\r\n	<li>&nbsp;Facing:&nbsp;N/A</li>\r\n	<li>&nbsp;Land Area:&nbsp;N/A</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;May 27, 2021</li>\r\n</ul>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(100, 1, 100, 'South Facing', '2021-09-14', '<p>We would like to offer for selling property and it is a commercial space for office. It would be much better for building up business near bus station, ashulia highway,police station,Bank, standard restaurant , University, world class hotel for developing business relation all over the world.&nbsp;<br />\r\n<br />\r\nAddress: Tongi / Ashulia Area. (15 minutes from Uttara Sector 9 to sector 12 and 30 minutes from Baridhara/Gulshan/Bashundhara R/A/Khilkhet)<br />\r\n<br />\r\nFloor Area: Approximately 33000/ 60,000 sft.<br />\r\nNo. Of Floors: 10 Floor<br />\r\nPrice:BDT 18,500 per square feet<br />\r\n<br />\r\n<br />\r\nPROJECT FEATURES :<br />\r\n<br />\r\n&bull; Excellent entry area<br />\r\n&bull; Fire Escape<br />\r\n&bull; Excellent Reception Lobby<br />\r\n&bull; Security: All Entry &amp; Exits Are Watched With CCTV and Controlled From a Central Security Center.<br />\r\n&bull; Lifts&nbsp;<br />\r\n<br />\r\nWe Ensure 100% Quality &amp; Commitment.<br />\r\n<br />\r\nTech Business Solution is an independent interactive agency comprised of the world&rsquo;s most creative minds. It provides outsourcing solution to customers around the globe including companies from United States, Canada and UK.&nbsp;<br />\r\n<br />\r\nGet In Touch&nbsp;<br />\r\n<br />\r\nTech Business Solution<br />\r\n<br />\r\n259, Afroza Begum Road, Block-F, Bashundhara Residential Area, Dhaka - 1229, BD, Email: bd@techbusinesssolution.org, Cell: 8801969456185<br />\r\n<br />\r\nwww.techbusinesssolution.org</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(101, 1, 101, 'South Facing', '2020-07-14', '<p>&nbsp;145 sqft shop on ground floor, very close to main enterence. Shop is on perfect condition. I want to sell the shop urgently and fixed price. Only interested persons are requested to contact at&nbsp;</p>\r\n\r\n<p>Syed Meharab Ahsan</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(102, 1, 102, 'South Facing', '2021-09-14', '<p>Ready commercial space sale at South Banasrer.<br />\r\nদক্ষিণ&nbsp;বনশ্রীর&nbsp;সবচেয়ে&nbsp;আকর্ষণীয়&nbsp;প্লেস&nbsp;,&nbsp;মেইন&nbsp;&nbsp;রোড&nbsp;কর্নার&nbsp;প্লট&nbsp;১০&nbsp;তালা&nbsp;মার্কেট&nbsp;ও&nbsp;ইসলামী&nbsp;&nbsp;ব্যাংক&nbsp;এর&nbsp;&nbsp;অপোজিট&nbsp;এ&nbsp;কমার্শিয়াল&nbsp;স্পেস&nbsp;,সম্পূর্ণ&nbsp;&nbsp;ওপেন&nbsp;স্পেস&nbsp;,</p>\r\n\r\n<p>A)&nbsp;দ্বিতীয়&nbsp;তালা&nbsp;১৮০০&nbsp;স্কnoয়ার&nbsp;ফিট&nbsp;+&nbsp;&nbsp;গ্যারেজ<br />\r\nB)&nbsp;তৃতীয়&nbsp;তালা&nbsp;১৫০০&nbsp;স্কয়ার&nbsp;ফিট<br />\r\nযেকোনো&nbsp;একটি&nbsp;বিক্রয়&nbsp;হবে&nbsp;۔</p>\r\n\r\n<p>সুবিধা&nbsp;:<br />\r\n1)&nbsp;&nbsp;ব্যাংক&nbsp;/বীমা<br />\r\n2)&nbsp;কমিউনিটি&nbsp;/পার্টি&nbsp;সেন্টার<br />\r\n3)&nbsp;রেস্টুরেন্ট<br />\r\n4)&nbsp;&nbsp;শোরুম&nbsp;/অফিস<br />\r\nইত্যাদির&nbsp;জন্য&nbsp;একটি&nbsp;উত্তম&nbsp;প্লেস</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(103, 1, 103, 'South Facing', '2021-09-14', '<ul>\r\n	<li>Property Name&nbsp;:&nbsp;&nbsp;দোকান</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Showroom/Shop/Restaurant</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Shantinagar , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Ready</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;125 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;1st Floor,</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;3</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Furnished</li>\r\n	<li>&nbsp;Facing:&nbsp;N/A</li>\r\n	<li>&nbsp;Land Area:&nbsp;N/A</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;March 30, 2021</li>\r\n</ul>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(104, 1, 104, 'South Facing', '2021-09-14', '<p>টুইন টাওয়ার মার্কেট শান্তিনগর ২য় তালায়।&nbsp;</p>\r\n\r\n<p>মাসে ২০০০০ টাকা ভাড়া ৩ লক্ষ্য টাকা অগ্রিম। একদম সামনের দিকের দোকান খুবই সুন্দর পজিশন দেখলেই বুঝতে পারবেন দেশের বাহিরে চলে যাচ্ছি তাই বিক্রি করে দিব। যদি এই দামে কাওরির ভালো লাগে তাহলে ফোন দিয়েন। ৪২ লাখ টাকা দাম ফিক্সড।</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(105, 1, 105, 'South Facing', '2021-09-14', '<p>4500 sqft, Ready&nbsp; Showroom/Shop/Restaurant for Sale at Kawran Bazar</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(106, 1, 106, 'South Facing', '2021-09-14', '<p>1350 sqft, 3 Beds Ready Apartment/Flats for Sale at Kawran Bazar</p>', '[\"2\",\"3\"]', NULL, '[\"2\",\"3\"]', NULL, NULL, NULL),
(107, 1, 107, 'South Facing', '2021-09-28', '<p>Project Name : Purbachal Marine City</p>\r\n\r\n<p>Developers : Atlantic Properties and development ltd</p>\r\n\r\n<p>Project Sizes : 1,338 Bigha</p>\r\n\r\n<p>Number Of Plots : 4000 approx</p>\r\n\r\n<p>Blocks : A, B, C</p>\r\n\r\n<p>Plot Sizes : 3,5,10</p>\r\n\r\n<p>Road Sizes : 100 ft Main Avenue Road, 60 ft. &amp; 40 ft and 25 ft Inner road</p>', '[\"1\"]', NULL, '[\"4\"]', NULL, NULL, 'https://youtu.be/CXgwkeIEGY4'),
(108, 1, 108, 'South Facing', '2021-09-28', '<p>Project Name : Purbachal Marine City</p>\r\n\r\n<p>Developer : Atlantic Properties &amp; Development Ltd</p>\r\n\r\n<p>Project Size : 1,338 Bigha</p>\r\n\r\n<p>Number Of Plots : 4000 (approx)</p>\r\n\r\n<p>Blocks : A, B and C</p>\r\n\r\n<p>Plot Sizes : 3, 5, 10</p>\r\n\r\n<p>Road Sizes : 100 ft. Main Avenue Road,</p>\r\n\r\n<p>60 ft. &amp; 40 ft. and 25 ft. Inner Roads</p>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(109, 1, 109, 'South Facing', '2021-09-28', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;Landmark Whistling Woods</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Apartment/Flats</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Banani , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Under Construction</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;2507 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;3rd Floor, 5th Floor, 7th Floor,</li>\r\n	<li>&nbsp;Bedroom :&nbsp;03</li>\r\n	<li>&nbsp;Baths :&nbsp;03</li>\r\n	<li>&nbsp;Balconies:&nbsp;3</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;12</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Unfurnished</li>\r\n	<li>&nbsp;Facing:&nbsp;South Facing</li>\r\n	<li>&nbsp;Land Area:&nbsp;11.72 katha</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;June 30, 2023</li>\r\n</ul>', '[\"1\",\"2\",\"3\"]', NULL, '[\"3\",\"4\"]', NULL, NULL, NULL),
(110, 1, 110, 'South Facing', '2021-09-28', '<ul>\r\n	<li>roperty Name&nbsp;:&nbsp;&nbsp;Quantum Satisfaction</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;Office Space</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;Sale</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;Uttara , Dhaka</li>\r\n	<li>&nbsp;Construction Status&nbsp;:&nbsp;Under Construction</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;1216 sqft</li>\r\n	<li>&nbsp;Transaction Type&nbsp;:&nbsp;New</li>\r\n	<li>&nbsp;Floor Avaiable On&nbsp;:&nbsp;2nd Floor,</li>\r\n	<li>&nbsp;Garages:&nbsp;1 Car Parking</li>\r\n	<li>&nbsp;Total Floor:&nbsp;6</li>\r\n	<li>&nbsp;Furnishing:&nbsp;Unfurnished</li>\r\n	<li>&nbsp;Facing:&nbsp;N/A</li>\r\n	<li>&nbsp;Land Area:&nbsp;N/A</li>\r\n	<li>&nbsp;Handover Date :&nbsp;&nbsp;&nbsp;January 30, 2019</li>\r\n</ul>', '[\"1\",\"3\"]', NULL, '[\"1\",\"4\"]', NULL, NULL, NULL),
(111, 1, 111, 'South Facing', '2021-09-28', '<p><strong>Don&#39;t miss this great opportunity of the year!! &nbsp;</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Rental Fair at Khulshi Town Center Concord (KTCC),</strong>&nbsp;Chittagong is on.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Shop rent rates are drastically slashed for the upcoming Eid and Pohela Boishak festivals.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Book early. Book now!!</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Attractive bonuses for the first 30 rentals. Choice locations available in this mega mall of over 250 shops. Many amenities, including huge volume atrium, food court, modern washrooms, wide corridors, CCTV system, piped music and PA system. FADS, ample parking,, security system, elegant drop off canopy and grand entrance, multiple lifts and escalators.</p>', '[\"1\",\"2\",\"3\"]', NULL, '[\"1\",\"2\"]', NULL, NULL, NULL),
(112, 1, 112, 'South Facing', '2021-09-28', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;Self</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;&nbsp;Office Space</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;&nbsp;Rent</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;&nbsp;Khulshi , Chittagong</li>\r\n	<li>&nbsp;Address&nbsp;:&nbsp;&nbsp;Opposite of Nasirabad Women College, Road-2, Nasirabad Properties, Khulshi, Chattogram</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;&nbsp;1280 sqft</li>\r\n	<li>&nbsp;Deposit Amount&nbsp;:&nbsp;&nbsp;40,000</li>\r\n	<li>&nbsp;Furnishing&nbsp;:&nbsp;&nbsp;Unfurnished</li>\r\n	<li>&nbsp;Floor Available On&nbsp;:&nbsp;&nbsp;2nd Floor,</li>\r\n	<li>&nbsp;Total Floor:&nbsp;1</li>\r\n	<li>&nbsp;Available From :&nbsp;December 16, 2020</li>\r\n</ul>', '[\"1\",\"3\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(113, 1, 113, 'South Facing', '2021-09-28', '<ul>\r\n	<li>Property Name&nbsp;:&nbsp;&nbsp;AMM Center</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;&nbsp;Showroom/Shop/Restaurant</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;&nbsp;Rent</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;&nbsp;Dhanmondi , Dhaka</li>\r\n	<li>&nbsp;Address&nbsp;:&nbsp;&nbsp;House-56/A, Road-3/A, Dhanmondi, DHaka</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;&nbsp;3800 sqft</li>\r\n	<li>&nbsp;Deposit Amount&nbsp;:&nbsp;&nbsp;36</li>\r\n	<li>&nbsp;Furnishing&nbsp;:&nbsp;&nbsp;Semi-Furnished</li>\r\n	<li>&nbsp;Floor Available On&nbsp;:&nbsp;&nbsp;Ground Floor, 1st Floor, 6th Floor,</li>\r\n	<li>&nbsp;Total Floor:&nbsp;6</li>\r\n	<li>&nbsp;Available From :&nbsp;August 10, 2021</li>\r\n</ul>', '[\"1\",\"4\"]', NULL, '[\"1\",\"3\"]', NULL, NULL, NULL),
(114, 1, 114, 'South Facing', '2021-09-28', '<ul>\r\n	<li>&nbsp;Property Name&nbsp;:&nbsp;&nbsp;Commercial Flat for Bank,Restaurant,Boutique,Showroom,or any other commercial businesses are preferable.</li>\r\n	<li>&nbsp;Property Type&nbsp;:&nbsp;&nbsp;Showroom/Shop/Restaurant</li>\r\n	<li>&nbsp;Property For&nbsp;:&nbsp;&nbsp;Rent</li>\r\n	<li>&nbsp;Location&nbsp;:&nbsp;&nbsp;Khilgaon , Dhaka</li>\r\n	<li>&nbsp;Address&nbsp;:&nbsp;&nbsp;730/12 Block C Taltola Khilgaon Dhaka 1219</li>\r\n	<li>&nbsp;Property Size&nbsp;:&nbsp;&nbsp;1250 sqft</li>\r\n	<li>&nbsp;Deposit Amount&nbsp;:&nbsp;&nbsp;3.00 Lac</li>\r\n	<li>&nbsp;Furnishing&nbsp;:&nbsp;&nbsp;Furnished</li>\r\n	<li>&nbsp;Floor Available On&nbsp;:&nbsp;&nbsp;2nd Floor,</li>\r\n	<li>&nbsp;Total Floor:&nbsp;1</li>\r\n	<li>&nbsp;Available From :&nbsp;August 14, 2020</li>\r\n</ul>', '[\"1\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(115, 1, 115, 'South Facing', '2021-09-28', '<p>1. A personal parking with adequate guest parkings in front.</p>\r\n\r\n<p>2. Ground Floor with easy access from main road.</p>\r\n\r\n<p>3. Beside main campus of Prime university.</p>\r\n\r\n<p>4. In a landmark project of Sheltech which includes 4 towers with 184 families.</p>', '[\"2\",\"3\"]', NULL, '[\"1\"]', NULL, NULL, NULL),
(116, 1, 116, 'South Facing', '2021-09-28', '<p>100-1000sft shop &amp; commercial space are available at new 60 feet road of Mirpur 2 behind Grammen Bank to Agargaon, Already, running Fast Food Restaurant, Burber shop, Fruit shop, ATM booth, Doctor Chamber, Pharmacy and many more ...Only 3 shops available in ground floor and will be are rented based on 1st come 1st serve basis ...Genuine and interested businessman are encourage to call</p>', 'null', NULL, 'null', NULL, NULL, NULL),
(117, 1, 117, 'South Facing', '2022-05-12', '<p>demo</p>', '[\"1\",\"2\",\"3\",\"4\"]', NULL, '[\"1\"]', NULL, 'demo', 'demo');

--
-- Triggers `prd_listing_additional_info`
--
DELIMITER $$
CREATE TRIGGER `before_prd_listing_additional_info_insert` BEFORE INSERT ON `prd_listing_additional_info` FOR EACH ROW begin
declare var_facing varchar(50) default null;

select title into var_facing from prd_property_facing where id = new.f_facing_no;

set new.facing = var_facing;

end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_prd_listing_additional_info_update` BEFORE UPDATE ON `prd_listing_additional_info` FOR EACH ROW begin
declare var_facing varchar(50) default null;

select title into var_facing from prd_property_facing where id = new.f_facing_no;

set new.facing = var_facing;

end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `prd_listing_features`
--

CREATE TABLE `prd_listing_features` (
  `id` int(2) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `url_slug` varchar(50) DEFAULT NULL,
  `is_active` int(2) NOT NULL DEFAULT 1,
  `order_id` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prd_listing_features`
--

INSERT INTO `prd_listing_features` (`id`, `title`, `icon`, `url_slug`, `is_active`, `order_id`) VALUES
(1, 'Parking', NULL, 'parking', 1, 1),
(2, 'Gas', NULL, 'gas', 1, 2),
(3, 'Water', NULL, 'water', 1, 3),
(4, 'Generator', 'uploads/listings/features/62f2667bd90a5.png', 'generator', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `prd_listing_images`
--

CREATE TABLE `prd_listing_images` (
  `id` int(11) NOT NULL,
  `f_listing_no` bigint(20) DEFAULT NULL,
  `image_path` varchar(100) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `thumb_path` varchar(100) DEFAULT NULL,
  `thumb` varchar(100) DEFAULT NULL,
  `og_path` int(150) DEFAULT NULL,
  `og_image` int(100) DEFAULT NULL,
  `sm_path` int(150) DEFAULT NULL,
  `sm_image` int(100) DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prd_listing_images`
--

INSERT INTO `prd_listing_images` (`id`, `f_listing_no`, `image_path`, `image`, `thumb_path`, `thumb`, `og_path`, `og_image`, `sm_path`, `sm_image`, `is_default`) VALUES
(28, 2, '/uploads/listings/2/6099597e40a92.jpg', '6099597e40a92.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(29, 2, '/uploads/listings/2/6099597e416a7.jpg', '6099597e416a7.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(30, 3, '/uploads/listings/3/60ac10ac9616b.jpg', '60ac10ac9616b.jpg', '/uploads/listings/3/thumb/60ac10ac96184.jpg', '60ac10ac96184.jpg', NULL, NULL, NULL, NULL, 1),
(31, 4, '/uploads/listings/4/6109911f5a117.webp', '6109911f5a117.webp', '/uploads/listings/4/thumb/6109911f5a120.webp', '6109911f5a120.webp', NULL, NULL, NULL, NULL, 1),
(32, 4, '/uploads/listings/4/6109911fae1be.jpg', '6109911fae1be.jpg', '/uploads/listings/4/thumb/6109911fae1c7.jpg', '6109911fae1c7.jpg', NULL, NULL, NULL, NULL, 0),
(33, 5, '/uploads/listings/5/6109a894b0cf0.jpg', '6109a894b0cf0.jpg', '/uploads/listings/5/thumb/6109a894b0cf9.jpg', '6109a894b0cf9.jpg', NULL, NULL, NULL, NULL, 1),
(34, 7, '/uploads/listings/7/6109aee7c6413.jpg', '6109aee7c6413.jpg', '/uploads/listings/7/thumb/6109aee7c641b.jpg', '6109aee7c641b.jpg', NULL, NULL, NULL, NULL, 1),
(35, 8, '/uploads/listings/8/6109afff619de.jpg', '6109afff619de.jpg', '/uploads/listings/8/thumb/6109afff619f2.jpg', '6109afff619f2.jpg', NULL, NULL, NULL, NULL, 1),
(36, 8, '/uploads/listings/8/6109afffbe76d.jpg', '6109afffbe76d.jpg', '/uploads/listings/8/thumb/6109afffbe775.jpg', '6109afffbe775.jpg', NULL, NULL, NULL, NULL, 0),
(37, 9, '/uploads/listings/9/610ab376ebbf1.jpg', '610ab376ebbf1.jpg', '/uploads/listings/9/thumb/610ab376ebbfc.jpg', '610ab376ebbfc.jpg', NULL, NULL, NULL, NULL, 1),
(38, 10, '/uploads/listings/10/610ab52fc0fd0.jpg', '610ab52fc0fd0.jpg', '/uploads/listings/10/thumb/610ab52fc0fd9.jpg', '610ab52fc0fd9.jpg', NULL, NULL, NULL, NULL, 1),
(39, 10, '/uploads/listings/10/610ab52fd3582.jpg', '610ab52fd3582.jpg', '/uploads/listings/10/thumb/610ab52fd358a.jpg', '610ab52fd358a.jpg', NULL, NULL, NULL, NULL, 0),
(40, 11, '/uploads/listings/11/610ae39b54a0f.jpg', '610ae39b54a0f.jpg', '/uploads/listings/11/thumb/610ae39b54a19.jpg', '610ae39b54a19.jpg', NULL, NULL, NULL, NULL, 1),
(41, 12, '/uploads/listings/12/610ae470d102f.jpg', '610ae470d102f.jpg', '/uploads/listings/12/thumb/610ae470d103b.jpg', '610ae470d103b.jpg', NULL, NULL, NULL, NULL, 1),
(42, 13, '/uploads/listings/13/610aec6154264.jpg', '610aec6154264.jpg', '/uploads/listings/13/thumb/610aec6154271.jpg', '610aec6154271.jpg', NULL, NULL, NULL, NULL, 1),
(43, 15, '/uploads/listings/15/6127bc9ca72e5.jpg', '6127bc9ca72e5.jpg', '/uploads/listings/15/thumb/6127bc9ca72f1.jpg', '6127bc9ca72f1.jpg', NULL, NULL, NULL, NULL, 1),
(44, 15, '/uploads/listings/15/6127bc9e97463.jpg', '6127bc9e97463.jpg', '/uploads/listings/15/thumb/6127bc9e9746d.jpg', '6127bc9e9746d.jpg', NULL, NULL, NULL, NULL, 0),
(45, 16, '/uploads/listings/16/6127be44f1e85.jpg', '6127be44f1e85.jpg', '/uploads/listings/16/thumb/6127be44f1e90.jpg', '6127be44f1e90.jpg', NULL, NULL, NULL, NULL, 1),
(46, 16, '/uploads/listings/16/6127be453699b.jpg', '6127be453699b.jpg', '/uploads/listings/16/thumb/6127be45369aa.jpg', '6127be45369aa.jpg', NULL, NULL, NULL, NULL, 0),
(47, 17, '/uploads/listings/17/6127c0f2347a2.jpeg', '6127c0f2347a2.jpeg', '/uploads/listings/17/thumb/6127c0f2347b4.jpeg', '6127c0f2347b4.jpeg', NULL, NULL, NULL, NULL, 1),
(48, 17, '/uploads/listings/17/6127c0f24e968.jpeg', '6127c0f24e968.jpeg', '/uploads/listings/17/thumb/6127c0f24e977.jpeg', '6127c0f24e977.jpeg', NULL, NULL, NULL, NULL, 0),
(49, 18, '/uploads/listings/18/6127c73271f44.jpg', '6127c73271f44.jpg', '/uploads/listings/18/thumb/6127c73271f52.jpg', '6127c73271f52.jpg', NULL, NULL, NULL, NULL, 1),
(50, 18, '/uploads/listings/18/6127c732b1d94.jpeg', '6127c732b1d94.jpeg', '/uploads/listings/18/thumb/6127c732b1da5.jpeg', '6127c732b1da5.jpeg', NULL, NULL, NULL, NULL, 0),
(51, 19, '/uploads/listings/19/6127c969c7b66.jpg', '6127c969c7b66.jpg', '/uploads/listings/19/thumb/6127c969c7b72.jpg', '6127c969c7b72.jpg', NULL, NULL, NULL, NULL, 1),
(52, 19, '/uploads/listings/19/6127c96a0c72f.jpg', '6127c96a0c72f.jpg', '/uploads/listings/19/thumb/6127c96a0c739.jpg', '6127c96a0c739.jpg', NULL, NULL, NULL, NULL, 0),
(53, 20, '/uploads/listings/20/6127cbc225b78.jpg', '6127cbc225b78.jpg', '/uploads/listings/20/thumb/6127cbc225b83.jpg', '6127cbc225b83.jpg', NULL, NULL, NULL, NULL, 1),
(54, 21, '/uploads/listings/21/6127d119db3c4.jpg', '6127d119db3c4.jpg', '/uploads/listings/21/thumb/6127d119db3db.jpg', '6127d119db3db.jpg', NULL, NULL, NULL, NULL, 1),
(55, 22, '/uploads/listings/22/6127d310094ef.jpeg', '6127d310094ef.jpeg', '/uploads/listings/22/thumb/6127d310094ff.jpeg', '6127d310094ff.jpeg', NULL, NULL, NULL, NULL, 1),
(56, 22, '/uploads/listings/22/6127d3102ec79.jpeg', '6127d3102ec79.jpeg', '/uploads/listings/22/thumb/6127d3102ec84.jpeg', '6127d3102ec84.jpeg', NULL, NULL, NULL, NULL, 0),
(57, 23, '/uploads/listings/23/6127d6517c725.jpg', '6127d6517c725.jpg', '/uploads/listings/23/thumb/6127d6517c733.jpg', '6127d6517c733.jpg', NULL, NULL, NULL, NULL, 1),
(58, 23, '/uploads/listings/23/6127d651a1446.jpg', '6127d651a1446.jpg', '/uploads/listings/23/thumb/6127d651a1450.jpg', '6127d651a1450.jpg', NULL, NULL, NULL, NULL, 0),
(59, 24, '/uploads/listings/24/6127e0c62b6fa.jpg', '6127e0c62b6fa.jpg', '/uploads/listings/24/thumb/6127e0c62b706.jpg', '6127e0c62b706.jpg', NULL, NULL, NULL, NULL, 1),
(60, 24, '/uploads/listings/24/6127e0c64cd7a.jpg', '6127e0c64cd7a.jpg', '/uploads/listings/24/thumb/6127e0c64cd85.jpg', '6127e0c64cd85.jpg', NULL, NULL, NULL, NULL, 0),
(61, 25, '/uploads/listings/25/6127ec3530f37.jpg', '6127ec3530f37.jpg', '/uploads/listings/25/thumb/6127ec3530f47.jpg', '6127ec3530f47.jpg', NULL, NULL, NULL, NULL, 1),
(62, 26, '/uploads/listings/26/6127ee1f67c66.jpg', '6127ee1f67c66.jpg', '/uploads/listings/26/thumb/6127ee1f67c74.jpg', '6127ee1f67c74.jpg', NULL, NULL, NULL, NULL, 1),
(63, 26, '/uploads/listings/26/6127ee1f8b947.jpg', '6127ee1f8b947.jpg', '/uploads/listings/26/thumb/6127ee1f8b952.jpg', '6127ee1f8b952.jpg', NULL, NULL, NULL, NULL, 0),
(64, 27, '/uploads/listings/27/6127eff2d03bc.jpeg', '6127eff2d03bc.jpeg', '/uploads/listings/27/thumb/6127eff2d03cb.jpeg', '6127eff2d03cb.jpeg', NULL, NULL, NULL, NULL, 1),
(65, 28, '/uploads/listings/28/6127f2047a823.jpg', '6127f2047a823.jpg', '/uploads/listings/28/thumb/6127f2047a83b.jpg', '6127f2047a83b.jpg', NULL, NULL, NULL, NULL, 1),
(66, 29, '/uploads/listings/29/6127fc7081d32.jpeg', '6127fc7081d32.jpeg', '/uploads/listings/29/thumb/6127fc7081d3f.jpeg', '6127fc7081d3f.jpeg', NULL, NULL, NULL, NULL, 1),
(67, 30, '/uploads/listings/30/6127fe85d8a19.jpg', '6127fe85d8a19.jpg', '/uploads/listings/30/thumb/6127fe85d8a2c.jpg', '6127fe85d8a2c.jpg', NULL, NULL, NULL, NULL, 1),
(68, 31, '/uploads/listings/31/6127ffda6db27.png', '6127ffda6db27.png', '/uploads/listings/31/thumb/6127ffda6db33.png', '6127ffda6db33.png', NULL, NULL, NULL, NULL, 1),
(69, 32, '/uploads/listings/32/61280075b9e6f.jpg', '61280075b9e6f.jpg', '/uploads/listings/32/thumb/61280075b9e7c.jpg', '61280075b9e7c.jpg', NULL, NULL, NULL, NULL, 1),
(70, 33, '/uploads/listings/33/612800ef338ac.jpg', '612800ef338ac.jpg', '/uploads/listings/33/thumb/612800ef338b7.jpg', '612800ef338b7.jpg', NULL, NULL, NULL, NULL, 1),
(71, 34, '/uploads/listings/34/612801883aa8a.jpeg', '612801883aa8a.jpeg', '/uploads/listings/34/thumb/612801883aa96.jpeg', '612801883aa96.jpeg', NULL, NULL, NULL, NULL, 1),
(72, 34, '/uploads/listings/34/612801885b9a6.jpeg', '612801885b9a6.jpeg', '/uploads/listings/34/thumb/612801885b9b0.jpeg', '612801885b9b0.jpeg', NULL, NULL, NULL, NULL, 0),
(73, 35, '/uploads/listings/35/6129297cb16a1.jpg', '6129297cb16a1.jpg', '/uploads/listings/35/thumb/6129297cb16b1.jpg', '6129297cb16b1.jpg', NULL, NULL, NULL, NULL, 1),
(74, 35, '/uploads/listings/35/6129297cec7be.jpg', '6129297cec7be.jpg', '/uploads/listings/35/thumb/6129297cec7c6.jpg', '6129297cec7c6.jpg', NULL, NULL, NULL, NULL, 0),
(75, 35, '/uploads/listings/35/6129297d27561.jpg', '6129297d27561.jpg', '/uploads/listings/35/thumb/6129297d2756a.jpg', '6129297d2756a.jpg', NULL, NULL, NULL, NULL, 0),
(76, 36, '/uploads/listings/36/61293333d95c4.jpg', '61293333d95c4.jpg', '/uploads/listings/36/thumb/61293333d95d2.jpg', '61293333d95d2.jpg', NULL, NULL, NULL, NULL, 1),
(77, 36, '/uploads/listings/36/6129333447282.jpg', '6129333447282.jpg', '/uploads/listings/36/thumb/612933344728d.jpg', '612933344728d.jpg', NULL, NULL, NULL, NULL, 0),
(78, 36, '/uploads/listings/36/612933346b0dd.jpg', '612933346b0dd.jpg', '/uploads/listings/36/thumb/612933346b0e8.jpg', '612933346b0e8.jpg', NULL, NULL, NULL, NULL, 0),
(79, 37, '/uploads/listings/37/61293892c0112.jpeg', '61293892c0112.jpeg', '/uploads/listings/37/thumb/61293892c0120.jpeg', '61293892c0120.jpeg', NULL, NULL, NULL, NULL, 1),
(80, 37, '/uploads/listings/37/61293892e0c37.jpeg', '61293892e0c37.jpeg', '/uploads/listings/37/thumb/61293892e0c49.jpeg', '61293892e0c49.jpeg', NULL, NULL, NULL, NULL, 0),
(81, 38, '/uploads/listings/38/61293b3f77852.jpg', '61293b3f77852.jpg', '/uploads/listings/38/thumb/61293b3f77860.jpg', '61293b3f77860.jpg', NULL, NULL, NULL, NULL, 1),
(82, 38, '/uploads/listings/38/61293b3fb3e8e.jpg', '61293b3fb3e8e.jpg', '/uploads/listings/38/thumb/61293b3fb3ea1.jpg', '61293b3fb3ea1.jpg', NULL, NULL, NULL, NULL, 0),
(83, 39, '/uploads/listings/39/61293d3ac72fb.jpeg', '61293d3ac72fb.jpeg', '/uploads/listings/39/thumb/61293d3ac7309.jpeg', '61293d3ac7309.jpeg', NULL, NULL, NULL, NULL, 1),
(84, 39, '/uploads/listings/39/61293d3aef1a6.jpg', '61293d3aef1a6.jpg', '/uploads/listings/39/thumb/61293d3aef1b1.jpg', '61293d3aef1b1.jpg', NULL, NULL, NULL, NULL, 0),
(85, 40, '/uploads/listings/40/61293e39588dc.jpg', '61293e39588dc.jpg', '/uploads/listings/40/thumb/61293e39588ec.jpg', '61293e39588ec.jpg', NULL, NULL, NULL, NULL, 1),
(86, 40, '/uploads/listings/40/61293e399bb04.jpg', '61293e399bb04.jpg', '/uploads/listings/40/thumb/61293e399bb0f.jpg', '61293e399bb0f.jpg', NULL, NULL, NULL, NULL, 0),
(87, 40, '/uploads/listings/40/61293e39c3ec9.jpg', '61293e39c3ec9.jpg', '/uploads/listings/40/thumb/61293e39c3ede.jpg', '61293e39c3ede.jpg', NULL, NULL, NULL, NULL, 0),
(88, 41, '/uploads/listings/41/61293f3d444f2.jpg', '61293f3d444f2.jpg', '/uploads/listings/41/thumb/61293f3d444fe.jpg', '61293f3d444fe.jpg', NULL, NULL, NULL, NULL, 1),
(89, 41, '/uploads/listings/41/61293f3d81f45.jpg', '61293f3d81f45.jpg', '/uploads/listings/41/thumb/61293f3d81f4f.jpg', '61293f3d81f4f.jpg', NULL, NULL, NULL, NULL, 0),
(90, 42, '/uploads/listings/42/61294010abd24.jpg', '61294010abd24.jpg', '/uploads/listings/42/thumb/61294010abd31.jpg', '61294010abd31.jpg', NULL, NULL, NULL, NULL, 1),
(91, 42, '/uploads/listings/42/61294010db5cb.jpg', '61294010db5cb.jpg', '/uploads/listings/42/thumb/61294010db5dd.jpg', '61294010db5dd.jpg', NULL, NULL, NULL, NULL, 0),
(92, 43, '/uploads/listings/43/612940bac5063.jpg', '612940bac5063.jpg', '/uploads/listings/43/thumb/612940bac5070.jpg', '612940bac5070.jpg', NULL, NULL, NULL, NULL, 1),
(93, 43, '/uploads/listings/43/612940bb20fb9.jpg', '612940bb20fb9.jpg', '/uploads/listings/43/thumb/612940bb20fcd.jpg', '612940bb20fcd.jpg', NULL, NULL, NULL, NULL, 0),
(94, 44, '/uploads/listings/44/6129418044b1b.jpg', '6129418044b1b.jpg', '/uploads/listings/44/thumb/6129418044b27.jpg', '6129418044b27.jpg', NULL, NULL, NULL, NULL, 1),
(95, 44, '/uploads/listings/44/61294180873f5.jpg', '61294180873f5.jpg', '/uploads/listings/44/thumb/6129418087408.jpg', '6129418087408.jpg', NULL, NULL, NULL, NULL, 0),
(96, 45, '/uploads/listings/45/6129441668e59.jpg', '6129441668e59.jpg', '/uploads/listings/45/thumb/6129441668e66.jpg', '6129441668e66.jpg', NULL, NULL, NULL, NULL, 1),
(97, 45, '/uploads/listings/45/61294416a2f73.jpg', '61294416a2f73.jpg', '/uploads/listings/45/thumb/61294416a2f7e.jpg', '61294416a2f7e.jpg', NULL, NULL, NULL, NULL, 0),
(98, 45, '/uploads/listings/45/61294416d05e9.jpg', '61294416d05e9.jpg', '/uploads/listings/45/thumb/61294416d05f5.jpg', '61294416d05f5.jpg', NULL, NULL, NULL, NULL, 0),
(99, 46, '/uploads/listings/46/612945b33e3e3.jpg', '612945b33e3e3.jpg', '/uploads/listings/46/thumb/612945b33e3f8.jpg', '612945b33e3f8.jpg', NULL, NULL, NULL, NULL, 1),
(100, 46, '/uploads/listings/46/612945b374689.jpg', '612945b374689.jpg', '/uploads/listings/46/thumb/612945b37469b.jpg', '612945b37469b.jpg', NULL, NULL, NULL, NULL, 0),
(101, 46, '/uploads/listings/46/612945b39bb18.jpg', '612945b39bb18.jpg', '/uploads/listings/46/thumb/612945b39bb23.jpg', '612945b39bb23.jpg', NULL, NULL, NULL, NULL, 0),
(102, 46, '/uploads/listings/46/612945b3c9911.jpg', '612945b3c9911.jpg', '/uploads/listings/46/thumb/612945b3c991c.jpg', '612945b3c991c.jpg', NULL, NULL, NULL, NULL, 0),
(103, 47, '/uploads/listings/47/6129494bd77e1.jpg', '6129494bd77e1.jpg', '/uploads/listings/47/thumb/6129494bd77ef.jpg', '6129494bd77ef.jpg', NULL, NULL, NULL, NULL, 1),
(104, 47, '/uploads/listings/47/6129494c1171b.jpg', '6129494c1171b.jpg', '/uploads/listings/47/thumb/6129494c11727.jpg', '6129494c11727.jpg', NULL, NULL, NULL, NULL, 0),
(105, 48, '/uploads/listings/48/61294af9c3f9a.jpg', '61294af9c3f9a.jpg', '/uploads/listings/48/thumb/61294af9c3faf.jpg', '61294af9c3faf.jpg', NULL, NULL, NULL, NULL, 1),
(106, 49, '/uploads/listings/49/61294d424980d.jpg', '61294d424980d.jpg', '/uploads/listings/49/thumb/61294d424981b.jpg', '61294d424981b.jpg', NULL, NULL, NULL, NULL, 1),
(107, 49, '/uploads/listings/49/61294d425b26b.jpg', '61294d425b26b.jpg', '/uploads/listings/49/thumb/61294d425b275.jpg', '61294d425b275.jpg', NULL, NULL, NULL, NULL, 0),
(108, 50, '/uploads/listings/50/612950c8f0bbf.jpg', '612950c8f0bbf.jpg', '/uploads/listings/50/thumb/612950c8f0bcf.jpg', '612950c8f0bcf.jpg', NULL, NULL, NULL, NULL, 1),
(109, 51, '/uploads/listings/51/61295235d8e65.jpg', '61295235d8e65.jpg', '/uploads/listings/51/thumb/61295235d8e73.jpg', '61295235d8e73.jpg', NULL, NULL, NULL, NULL, 1),
(110, 52, '/uploads/listings/52/612954b7351c1.jpeg', '612954b7351c1.jpeg', '/uploads/listings/52/thumb/612954b7351cf.jpeg', '612954b7351cf.jpeg', NULL, NULL, NULL, NULL, 1),
(111, 52, '/uploads/listings/52/612954b757418.jpeg', '612954b757418.jpeg', '/uploads/listings/52/thumb/612954b757423.jpeg', '612954b757423.jpeg', NULL, NULL, NULL, NULL, 0),
(112, 53, '/uploads/listings/53/6129bf6587f69.jpg', '6129bf6587f69.jpg', '/uploads/listings/53/thumb/6129bf6587f79.jpg', '6129bf6587f79.jpg', NULL, NULL, NULL, NULL, 1),
(113, 53, '/uploads/listings/53/6129bf65aa1f8.jpg', '6129bf65aa1f8.jpg', '/uploads/listings/53/thumb/6129bf65aa204.jpg', '6129bf65aa204.jpg', NULL, NULL, NULL, NULL, 0),
(114, 54, '/uploads/listings/54/6129c1c3dcff0.jpg', '6129c1c3dcff0.jpg', '/uploads/listings/54/thumb/6129c1c3dcffd.jpg', '6129c1c3dcffd.jpg', NULL, NULL, NULL, NULL, 1),
(115, 54, '/uploads/listings/54/6129c1c441ba3.jpg', '6129c1c441ba3.jpg', '/uploads/listings/54/thumb/6129c1c441baf.jpg', '6129c1c441baf.jpg', NULL, NULL, NULL, NULL, 0),
(116, 55, '/uploads/listings/55/6129c4edf32f8.jpg', '6129c4edf32f8.jpg', '/uploads/listings/55/thumb/6129c4edf3305.jpg', '6129c4edf3305.jpg', NULL, NULL, NULL, NULL, 1),
(117, 56, '/uploads/listings/56/6129ca3142028.jpg', '6129ca3142028.jpg', '/uploads/listings/56/thumb/6129ca3142042.jpg', '6129ca3142042.jpg', NULL, NULL, NULL, NULL, 1),
(118, 56, '/uploads/listings/56/6129ca3161c44.jpg', '6129ca3161c44.jpg', '/uploads/listings/56/thumb/6129ca3161c4f.jpg', '6129ca3161c4f.jpg', NULL, NULL, NULL, NULL, 0),
(119, 57, '/uploads/listings/57/6129cd98e087d.jpg', '6129cd98e087d.jpg', '/uploads/listings/57/thumb/6129cd98e088b.jpg', '6129cd98e088b.jpg', NULL, NULL, NULL, NULL, 1),
(120, 57, '/uploads/listings/57/6129cd9939343.jpg', '6129cd9939343.jpg', '/uploads/listings/57/thumb/6129cd993934d.jpg', '6129cd993934d.jpg', NULL, NULL, NULL, NULL, 0),
(121, 58, '/uploads/listings/58/6129cf2c38748.jpg', '6129cf2c38748.jpg', '/uploads/listings/58/thumb/6129cf2c38755.jpg', '6129cf2c38755.jpg', NULL, NULL, NULL, NULL, 1),
(122, 58, '/uploads/listings/58/6129cf2c74691.jpg', '6129cf2c74691.jpg', '/uploads/listings/58/thumb/6129cf2c746a5.jpg', '6129cf2c746a5.jpg', NULL, NULL, NULL, NULL, 0),
(123, 59, '/uploads/listings/59/6129d1035d6c4.jpg', '6129d1035d6c4.jpg', '/uploads/listings/59/thumb/6129d1035d6da.jpg', '6129d1035d6da.jpg', NULL, NULL, NULL, NULL, 1),
(124, 60, '/uploads/listings/60/613f6d022700b.jpg', '613f6d022700b.jpg', '/uploads/listings/60/thumb/613f6d022c696.jpg', '613f6d022c696.jpg', NULL, NULL, NULL, NULL, 1),
(125, 61, '/uploads/listings/61/613f74249990e.jpg', '613f74249990e.jpg', '/uploads/listings/61/thumb/613f742499919.jpg', '613f742499919.jpg', NULL, NULL, NULL, NULL, 1),
(126, 61, '/uploads/listings/61/613f7424bd649.jpg', '613f7424bd649.jpg', '/uploads/listings/61/thumb/613f7424bd65a.jpg', '613f7424bd65a.jpg', NULL, NULL, NULL, NULL, 0),
(127, 62, '/uploads/listings/62/613f765c83502.jpg', '613f765c83502.jpg', '/uploads/listings/62/thumb/613f765c8350f.jpg', '613f765c8350f.jpg', NULL, NULL, NULL, NULL, 1),
(128, 62, '/uploads/listings/62/613f765cc45a7.jpg', '613f765cc45a7.jpg', '/uploads/listings/62/thumb/613f765cc45b3.jpg', '613f765cc45b3.jpg', NULL, NULL, NULL, NULL, 0),
(129, 63, '/uploads/listings/63/613f794a05610.jpg', '613f794a05610.jpg', '/uploads/listings/63/thumb/613f794a05620.jpg', '613f794a05620.jpg', NULL, NULL, NULL, NULL, 1),
(130, 63, '/uploads/listings/63/613f794a25c86.jpg', '613f794a25c86.jpg', '/uploads/listings/63/thumb/613f794a25c90.jpg', '613f794a25c90.jpg', NULL, NULL, NULL, NULL, 0),
(131, 64, '/uploads/listings/64/613f79bc82524.jpg', '613f79bc82524.jpg', '/uploads/listings/64/thumb/613f79bc82530.jpg', '613f79bc82530.jpg', NULL, NULL, NULL, NULL, 1),
(132, 65, '/uploads/listings/65/613f7a75a77bb.jpg', '613f7a75a77bb.jpg', '/uploads/listings/65/thumb/613f7a75a77c6.jpg', '613f7a75a77c6.jpg', NULL, NULL, NULL, NULL, 1),
(133, 66, '/uploads/listings/66/613f7c8d26065.jpg', '613f7c8d26065.jpg', '/uploads/listings/66/thumb/613f7c8d26072.jpg', '613f7c8d26072.jpg', NULL, NULL, NULL, NULL, 1),
(134, 66, '/uploads/listings/66/613f7c8d4b45f.jpg', '613f7c8d4b45f.jpg', '/uploads/listings/66/thumb/613f7c8d4b46a.jpg', '613f7c8d4b46a.jpg', NULL, NULL, NULL, NULL, 0),
(135, 67, '/uploads/listings/67/613f7e98af5db.jpeg', '613f7e98af5db.jpeg', '/uploads/listings/67/thumb/613f7e98af5ec.jpeg', '613f7e98af5ec.jpeg', NULL, NULL, NULL, NULL, 1),
(136, 67, '/uploads/listings/67/613f7e98dd5e5.jpeg', '613f7e98dd5e5.jpeg', '/uploads/listings/67/thumb/613f7e98dd5f5.jpeg', '613f7e98dd5f5.jpeg', NULL, NULL, NULL, NULL, 0),
(137, 67, '/uploads/listings/67/613f7e990e952.jpeg', '613f7e990e952.jpeg', '/uploads/listings/67/thumb/613f7e990e95e.jpeg', '613f7e990e95e.jpeg', NULL, NULL, NULL, NULL, 0),
(138, 68, '/uploads/listings/68/613f80d38155a.jpeg', '613f80d38155a.jpeg', '/uploads/listings/68/thumb/613f80d381567.jpeg', '613f80d381567.jpeg', NULL, NULL, NULL, NULL, 1),
(139, 68, '/uploads/listings/68/613f80d3a1ef3.jpeg', '613f80d3a1ef3.jpeg', '/uploads/listings/68/thumb/613f80d3a1efd.jpeg', '613f80d3a1efd.jpeg', NULL, NULL, NULL, NULL, 0),
(140, 69, '/uploads/listings/69/613f82b47d750.jpg', '613f82b47d750.jpg', '/uploads/listings/69/thumb/613f82b47d774.jpg', '613f82b47d774.jpg', NULL, NULL, NULL, NULL, 1),
(141, 70, '/uploads/listings/70/613f83d56eb85.jpg', '613f83d56eb85.jpg', '/uploads/listings/70/thumb/613f83d56eb9a.jpg', '613f83d56eb9a.jpg', NULL, NULL, NULL, NULL, 1),
(142, 70, '/uploads/listings/70/613f83d58f1cc.jpg', '613f83d58f1cc.jpg', '/uploads/listings/70/thumb/613f83d58f1de.jpg', '613f83d58f1de.jpg', NULL, NULL, NULL, NULL, 0),
(143, 71, '/uploads/listings/71/613f849d8269e.jpg', '613f849d8269e.jpg', '/uploads/listings/71/thumb/613f849d826aa.jpg', '613f849d826aa.jpg', NULL, NULL, NULL, NULL, 1),
(144, 72, '/uploads/listings/72/613f85a2814f5.jpg', '613f85a2814f5.jpg', '/uploads/listings/72/thumb/613f85a281501.jpg', '613f85a281501.jpg', NULL, NULL, NULL, NULL, 1),
(145, 72, '/uploads/listings/72/613f85a2a3b29.jpg', '613f85a2a3b29.jpg', '/uploads/listings/72/thumb/613f85a2a3b33.jpg', '613f85a2a3b33.jpg', NULL, NULL, NULL, NULL, 0),
(146, 73, '/uploads/listings/73/613f86e468e37.jpg', '613f86e468e37.jpg', '/uploads/listings/73/thumb/613f86e468e42.jpg', '613f86e468e42.jpg', NULL, NULL, NULL, NULL, 1),
(147, 73, '/uploads/listings/73/613f86e4813fc.jpg', '613f86e4813fc.jpg', '/uploads/listings/73/thumb/613f86e481406.jpg', '613f86e481406.jpg', NULL, NULL, NULL, NULL, 0),
(148, 74, '/uploads/listings/74/613f89526531f.jpg', '613f89526531f.jpg', '/uploads/listings/74/thumb/613f895265332.jpg', '613f895265332.jpg', NULL, NULL, NULL, NULL, 1),
(149, 74, '/uploads/listings/74/613f895288f45.jpg', '613f895288f45.jpg', '/uploads/listings/74/thumb/613f895288f63.jpg', '613f895288f63.jpg', NULL, NULL, NULL, NULL, 0),
(150, 75, '/uploads/listings/75/613f89c5701d2.jpg', '613f89c5701d2.jpg', '/uploads/listings/75/thumb/613f89c5701e0.jpg', '613f89c5701e0.jpg', NULL, NULL, NULL, NULL, 1),
(151, 76, '/uploads/listings/76/613f8ad9dfe3a.jpg', '613f8ad9dfe3a.jpg', '/uploads/listings/76/thumb/613f8ad9dfe49.jpg', '613f8ad9dfe49.jpg', NULL, NULL, NULL, NULL, 1),
(152, 76, '/uploads/listings/76/613f8ada143ac.jpg', '613f8ada143ac.jpg', '/uploads/listings/76/thumb/613f8ada143be.jpg', '613f8ada143be.jpg', NULL, NULL, NULL, NULL, 0),
(153, 77, '/uploads/listings/77/613f8f6ddc22e.jpg', '613f8f6ddc22e.jpg', '/uploads/listings/77/thumb/613f8f6ddc23a.jpg', '613f8f6ddc23a.jpg', NULL, NULL, NULL, NULL, 1),
(154, 78, '/uploads/listings/78/613f92352dd87.jpg', '613f92352dd87.jpg', '/uploads/listings/78/thumb/613f92352dd93.jpg', '613f92352dd93.jpg', NULL, NULL, NULL, NULL, 1),
(155, 78, '/uploads/listings/78/613f92356a369.jpg', '613f92356a369.jpg', '/uploads/listings/78/thumb/613f92356a373.jpg', '613f92356a373.jpg', NULL, NULL, NULL, NULL, 0),
(156, 79, '/uploads/listings/79/613f940018b30.jpg', '613f940018b30.jpg', '/uploads/listings/79/thumb/613f940018b3c.jpg', '613f940018b3c.jpg', NULL, NULL, NULL, NULL, 1),
(157, 80, '/uploads/listings/80/613f9924855a6.jpg', '613f9924855a6.jpg', '/uploads/listings/80/thumb/613f9924855bc.jpg', '613f9924855bc.jpg', NULL, NULL, NULL, NULL, 1),
(158, 81, '/uploads/listings/81/613f9bb58bd1f.jpg', '613f9bb58bd1f.jpg', '/uploads/listings/81/thumb/613f9bb58bd2b.jpg', '613f9bb58bd2b.jpg', NULL, NULL, NULL, NULL, 1),
(159, 82, '/uploads/listings/82/613f9e5fccc1a.jpg', '613f9e5fccc1a.jpg', '/uploads/listings/82/thumb/613f9e5fccc28.jpg', '613f9e5fccc28.jpg', NULL, NULL, NULL, NULL, 1),
(160, 83, '/uploads/listings/83/613f9edabb46f.jpg', '613f9edabb46f.jpg', '/uploads/listings/83/thumb/613f9edabb47b.jpg', '613f9edabb47b.jpg', NULL, NULL, NULL, NULL, 1),
(161, 84, '/uploads/listings/84/613fa0d204b34.jpg', '613fa0d204b34.jpg', '/uploads/listings/84/thumb/613fa0d204b40.jpg', '613fa0d204b40.jpg', NULL, NULL, NULL, NULL, 1),
(162, 85, '/uploads/listings/85/613fa40c5af05.jpeg', '613fa40c5af05.jpeg', '/uploads/listings/85/thumb/613fa40c5af1b.jpeg', '613fa40c5af1b.jpeg', NULL, NULL, NULL, NULL, 1),
(163, 86, '/uploads/listings/86/613fa664ab756.jpg', '613fa664ab756.jpg', '/uploads/listings/86/thumb/613fa664ab76a.jpg', '613fa664ab76a.jpg', NULL, NULL, NULL, NULL, 1),
(164, 87, '/uploads/listings/87/613faa828d9fe.jpg', '613faa828d9fe.jpg', '/uploads/listings/87/thumb/613faa828da12.jpg', '613faa828da12.jpg', NULL, NULL, NULL, NULL, 1),
(165, 89, '/uploads/listings/89/613fafce9745a.jpg', '613fafce9745a.jpg', '/uploads/listings/89/thumb/613fafce9746f.jpg', '613fafce9746f.jpg', NULL, NULL, NULL, NULL, 1),
(166, 90, '/uploads/listings/90/6140b073f0a73.jpg', '6140b073f0a73.jpg', '/uploads/listings/90/thumb/6140b073f0a86.jpg', '6140b073f0a86.jpg', NULL, NULL, NULL, NULL, 1),
(167, 91, '/uploads/listings/91/6140b0ff2a809.jpg', '6140b0ff2a809.jpg', '/uploads/listings/91/thumb/6140b0ff2a815.jpg', '6140b0ff2a815.jpg', NULL, NULL, NULL, NULL, 1),
(168, 92, '/uploads/listings/92/6140b1ad9da1f.jpg', '6140b1ad9da1f.jpg', '/uploads/listings/92/thumb/6140b1ad9da2d.jpg', '6140b1ad9da2d.jpg', NULL, NULL, NULL, NULL, 1),
(169, 93, '/uploads/listings/93/6140b25699808.jpg', '6140b25699808.jpg', '/uploads/listings/93/thumb/6140b25699817.jpg', '6140b25699817.jpg', NULL, NULL, NULL, NULL, 1),
(170, 94, '/uploads/listings/94/6140b2c2e6609.jpg', '6140b2c2e6609.jpg', '/uploads/listings/94/thumb/6140b2c2e6637.jpg', '6140b2c2e6637.jpg', NULL, NULL, NULL, NULL, 1),
(171, 94, '/uploads/listings/94/6140b2c3155a1.jpg', '6140b2c3155a1.jpg', '/uploads/listings/94/thumb/6140b2c3155aa.jpg', '6140b2c3155aa.jpg', NULL, NULL, NULL, NULL, 0),
(172, 95, '/uploads/listings/95/6140b3bb7e189.png', '6140b3bb7e189.png', '/uploads/listings/95/thumb/6140b3bb7e196.png', '6140b3bb7e196.png', NULL, NULL, NULL, NULL, 1),
(173, 96, '/uploads/listings/96/6140b56c98c5e.jpg', '6140b56c98c5e.jpg', '/uploads/listings/96/thumb/6140b56c98c69.jpg', '6140b56c98c69.jpg', NULL, NULL, NULL, NULL, 1),
(174, 97, '/uploads/listings/97/6140b837a4cc4.jpeg', '6140b837a4cc4.jpeg', '/uploads/listings/97/thumb/6140b837a4cd1.jpeg', '6140b837a4cd1.jpeg', NULL, NULL, NULL, NULL, 1),
(175, 98, '/uploads/listings/98/6140b8a595055.jpeg', '6140b8a595055.jpeg', '/uploads/listings/98/thumb/6140b8a595067.jpeg', '6140b8a595067.jpeg', NULL, NULL, NULL, NULL, 1),
(176, 99, '/uploads/listings/99/6140b9162b288.jpg', '6140b9162b288.jpg', '/uploads/listings/99/thumb/6140b9162b293.jpg', '6140b9162b293.jpg', NULL, NULL, NULL, NULL, 1),
(177, 100, '/uploads/listings/100/6140b97ed2be5.jpg', '6140b97ed2be5.jpg', '/uploads/listings/100/thumb/6140b97ed2bf0.jpg', '6140b97ed2bf0.jpg', NULL, NULL, NULL, NULL, 1),
(178, 101, '/uploads/listings/101/6140b9fd483fd.jpg', '6140b9fd483fd.jpg', '/uploads/listings/101/thumb/6140b9fd48408.jpg', '6140b9fd48408.jpg', NULL, NULL, NULL, NULL, 1),
(179, 102, '/uploads/listings/102/6140ba74ad440.jpg', '6140ba74ad440.jpg', '/uploads/listings/102/thumb/6140ba74ad44c.jpg', '6140ba74ad44c.jpg', NULL, NULL, NULL, NULL, 1),
(180, 103, '/uploads/listings/103/6140bb0b4aab9.jpeg', '6140bb0b4aab9.jpeg', '/uploads/listings/103/thumb/6140bb0b4aac4.jpeg', '6140bb0b4aac4.jpeg', NULL, NULL, NULL, NULL, 1),
(181, 104, '/uploads/listings/104/6140bb630b307.jpg', '6140bb630b307.jpg', '/uploads/listings/104/thumb/6140bb630b312.jpg', '6140bb630b312.jpg', NULL, NULL, NULL, NULL, 1),
(182, 105, '/uploads/listings/105/6140bbffa8d90.jpg', '6140bbffa8d90.jpg', '/uploads/listings/105/thumb/6140bbffa8da0.jpg', '6140bbffa8da0.jpg', NULL, NULL, NULL, NULL, 1),
(183, 106, '/uploads/listings/106/6140bc9d08615.jpg', '6140bc9d08615.jpg', '/uploads/listings/106/thumb/6140bc9d08624.jpg', '6140bc9d08624.jpg', NULL, NULL, NULL, NULL, 1),
(185, 6, '/uploads/listings/6/6144b2ce6524b.jpg', '6144b2ce6524b.jpg', '/uploads/listings/6/thumb/6144b2ce65257.jpg', '6144b2ce65257.jpg', NULL, NULL, NULL, NULL, 1),
(186, 14, '/uploads/listings/14/61463ce50b108.jpg', '61463ce50b108.jpg', '/uploads/listings/14/thumb/61463ce50b136.jpg', '61463ce50b136.jpg', NULL, NULL, NULL, NULL, 1),
(187, 107, '/uploads/listings/107/615224792906a.jpg', '615224792906a.jpg', '/uploads/listings/107/thumb/6152247929078.jpg', '6152247929078.jpg', NULL, NULL, NULL, NULL, 1),
(188, 108, '/uploads/listings/108/615227460d040.jpg', '615227460d040.jpg', '/uploads/listings/108/thumb/615227460d04c.jpg', '615227460d04c.jpg', NULL, NULL, NULL, NULL, 1),
(189, 109, '/uploads/listings/109/61522846a21ed.jpg', '61522846a21ed.jpg', '/uploads/listings/109/thumb/61522846a21f9.jpg', '61522846a21f9.jpg', NULL, NULL, NULL, NULL, 1),
(190, 110, '/uploads/listings/110/615229c945367.jpg', '615229c945367.jpg', '/uploads/listings/110/thumb/615229c945372.jpg', '615229c945372.jpg', NULL, NULL, NULL, NULL, 1),
(191, 111, '/uploads/listings/111/61522add429fe.jpg', '61522add429fe.jpg', '/uploads/listings/111/thumb/61522add42a0b.jpg', '61522add42a0b.jpg', NULL, NULL, NULL, NULL, 1),
(192, 112, '/uploads/listings/112/61522b5503724.jpg', '61522b5503724.jpg', '/uploads/listings/112/thumb/61522b5503734.jpg', '61522b5503734.jpg', NULL, NULL, NULL, NULL, 1),
(193, 113, '/uploads/listings/113/61522bd96c6f7.jpeg', '61522bd96c6f7.jpeg', '/uploads/listings/113/thumb/61522bd96c70a.jpeg', '61522bd96c70a.jpeg', NULL, NULL, NULL, NULL, 1),
(194, 114, '/uploads/listings/114/61522c9ee3a47.jpg', '61522c9ee3a47.jpg', '/uploads/listings/114/thumb/61522c9ee3a55.jpg', '61522c9ee3a55.jpg', NULL, NULL, NULL, NULL, 1),
(195, 115, '/uploads/listings/115/61522d2960807.jpg', '61522d2960807.jpg', '/uploads/listings/115/thumb/61522d2960812.jpg', '61522d2960812.jpg', NULL, NULL, NULL, NULL, 1),
(196, 116, '/uploads/listings/116/61522d78867e0.jpg', '61522d78867e0.jpg', '/uploads/listings/116/thumb/61522d78867f7.jpg', '61522d78867f7.jpg', NULL, NULL, NULL, NULL, 1),
(197, 116, '/uploads/listings/116/6404a54565162.jpg', '6404a54565162.jpg', '/uploads/listings/116/thumb/6404a54565167.jpg', '6404a54565167.jpg', NULL, NULL, NULL, NULL, 0),
(198, 116, '/uploads/listings/116/6404a54588705.png', '6404a54588705.png', '/uploads/listings/116/thumb/6404a54588708.png', '6404a54588708.png', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prd_listing_type`
--

CREATE TABLE `prd_listing_type` (
  `id` int(2) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `order_id` int(2) NOT NULL DEFAULT 1,
  `duration` int(3) DEFAULT 0,
  `short_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prd_listing_type`
--

INSERT INTO `prd_listing_type` (`id`, `name`, `is_active`, `order_id`, `duration`, `short_name`) VALUES
(1, 'General Listing for 30 days', 1, 1, 30, 'General'),
(2, 'Feature Listing for 30 days', 1, 2, 30, 'Feature'),
(3, 'General Listing with daily auto update for 30 days', 1, 3, 30, 'General'),
(4, 'Feature Listing with daily auto update for 30 days', 1, 4, 30, 'Feature');

-- --------------------------------------------------------

--
-- Table structure for table `prd_listing_variants`
--

CREATE TABLE `prd_listing_variants` (
  `id` int(10) NOT NULL,
  `f_listing_no` int(10) DEFAULT NULL,
  `property_size` decimal(10,0) NOT NULL DEFAULT 0,
  `bedroom` int(2) DEFAULT 0,
  `bathroom` int(2) DEFAULT 0,
  `balcony` int(4) DEFAULT NULL,
  `total_price` float NOT NULL DEFAULT 0,
  `car_parking` varchar(100) DEFAULT NULL,
  `land_area` varchar(100) DEFAULT NULL,
  `is_default` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prd_listing_variants`
--

INSERT INTO `prd_listing_variants` (`id`, `f_listing_no`, `property_size`, `bedroom`, `bathroom`, `balcony`, `total_price`, `car_parking`, `land_area`, `is_default`) VALUES
(44, 2, '5000', 4, 4, NULL, 8000000, NULL, NULL, 1),
(47, 3, '1000', 2, 2, NULL, 500000, NULL, NULL, 1),
(48, 3, '1500', 3, 2, NULL, 700000, NULL, NULL, 0),
(49, 1, '123', 1, 2, NULL, 456, NULL, NULL, 0),
(50, 1, '789', 4, 4, NULL, 789, NULL, NULL, 0),
(54, 4, '12000', 3, 3, NULL, 15000000, NULL, NULL, 0),
(181, 105, '4500', NULL, NULL, NULL, 33800000, NULL, NULL, 1),
(182, 104, '88', NULL, NULL, NULL, 4200000, NULL, NULL, 1),
(183, 103, '125', NULL, NULL, NULL, 4563000, NULL, NULL, 1),
(185, 101, '150', NULL, NULL, NULL, 1, NULL, NULL, 1),
(186, 100, '33000', NULL, NULL, NULL, 610500000, NULL, NULL, 1),
(187, 99, '228', NULL, NULL, NULL, 185000, NULL, NULL, 1),
(188, 98, '441', NULL, NULL, NULL, 1, NULL, NULL, 1),
(189, 97, '239', NULL, NULL, NULL, 1, NULL, NULL, 1),
(190, 96, '195', NULL, NULL, NULL, 4875000, NULL, NULL, 1),
(191, 95, '3150', NULL, NULL, NULL, 65000, NULL, NULL, 1),
(192, 94, '18000', NULL, NULL, NULL, 200000, NULL, NULL, 1),
(193, 93, '100000', NULL, NULL, NULL, 40000, NULL, NULL, 1),
(194, 92, '6998', NULL, NULL, NULL, 50000, NULL, NULL, 1),
(195, 91, '1550', NULL, NULL, NULL, 30000, NULL, NULL, 1),
(196, 90, '70000', NULL, NULL, NULL, 1500000, NULL, NULL, 1),
(198, 89, '980', NULL, NULL, NULL, 1, NULL, NULL, 1),
(199, 87, '1600', 1, 1, NULL, 130000, NULL, NULL, 1),
(200, 86, '1650', 3, 2, NULL, 0, NULL, NULL, 1),
(201, 85, '1200', 3, 3, NULL, 6600000, NULL, NULL, 1),
(202, 84, '1400', 3, 3, NULL, 7700000, NULL, NULL, 1),
(203, 83, '1200', 3, 3, NULL, 6600000, NULL, NULL, 1),
(204, 82, '1800', 3, 3, NULL, 9900000, NULL, NULL, 1),
(205, 81, '1500', 3, 3, NULL, 8250000, NULL, NULL, 1),
(206, 80, '1380', 2, 3, NULL, 7590000, NULL, NULL, 1),
(207, 79, '1400', 3, 3, NULL, 3500000, NULL, NULL, 1),
(208, 78, '5000', 4, 4, NULL, 0, NULL, NULL, 1),
(209, 77, '700', NULL, NULL, NULL, 20000, NULL, NULL, 1),
(210, 76, '10000', NULL, NULL, NULL, 130000, NULL, NULL, 1),
(211, 75, '4300', NULL, NULL, NULL, 120000, NULL, NULL, 1),
(212, 74, '38700', NULL, NULL, NULL, 661000, NULL, NULL, 1),
(213, 73, '20000', NULL, NULL, NULL, 320000, NULL, NULL, 1),
(214, 72, '19999', NULL, NULL, NULL, 320000, NULL, NULL, 1),
(215, 71, '5000', NULL, NULL, NULL, 45000, NULL, NULL, 1),
(216, 70, '28000', NULL, NULL, NULL, 20000, NULL, NULL, 1),
(217, 69, '15825', NULL, NULL, NULL, 316500, NULL, NULL, 1),
(218, 68, '4000', NULL, NULL, NULL, 70000, NULL, NULL, 1),
(219, 67, '0', NULL, NULL, NULL, 1200000, NULL, NULL, 1),
(220, 66, '10000', NULL, NULL, NULL, 130000, NULL, NULL, 1),
(221, 65, '4000', NULL, NULL, NULL, 50000, NULL, NULL, 1),
(222, 64, '120000', NULL, NULL, NULL, 2400000, NULL, NULL, 1),
(223, 63, '175000', NULL, NULL, NULL, 3000000, NULL, NULL, 1),
(224, 62, '30000', NULL, NULL, NULL, 550000, NULL, NULL, 1),
(225, 61, '21500', NULL, NULL, NULL, 240000, NULL, NULL, 1),
(226, 60, '100000', NULL, NULL, NULL, 2200000, NULL, NULL, 1),
(227, 59, '20000', NULL, NULL, NULL, 5000000, NULL, NULL, 1),
(228, 58, '1250', 2, 2, NULL, 22000, NULL, NULL, 1),
(229, 58, '1500', 2, 2, NULL, 22000, NULL, NULL, 0),
(230, 57, '22550', 4, 3, NULL, 27000, NULL, NULL, 1),
(232, 55, '1654', 3, 3, NULL, 25000, NULL, NULL, 1),
(234, 54, '1800', 3, 3, NULL, 30000, NULL, NULL, 1),
(235, 53, '1000', NULL, NULL, NULL, 55000, NULL, NULL, 1),
(236, 52, '800', NULL, NULL, NULL, 15000, NULL, NULL, 1),
(237, 51, '1436', 1, 1, NULL, 2500, NULL, NULL, 1),
(238, 50, '1200', 1, 1, NULL, 2500, NULL, NULL, 1),
(239, 49, '3', NULL, NULL, NULL, 6700000, NULL, NULL, 1),
(240, 48, '4', NULL, NULL, NULL, 1500000, NULL, NULL, 1),
(241, 47, '3', NULL, NULL, NULL, 700000, NULL, NULL, 1),
(242, 46, '1675', 3, 3, NULL, 1340000, NULL, NULL, 1),
(243, 45, '4', NULL, NULL, NULL, 10000000, NULL, NULL, 1),
(244, 44, '3', NULL, NULL, NULL, 6400000, NULL, NULL, 1),
(245, 43, '3', NULL, NULL, NULL, 6500000, NULL, NULL, 1),
(246, 42, '10', NULL, NULL, NULL, 5500000, NULL, NULL, 1),
(247, 41, '3', NULL, NULL, NULL, 550000, NULL, NULL, 1),
(248, 40, '10', NULL, NULL, NULL, 13000000, NULL, NULL, 1),
(249, 39, '5', NULL, NULL, NULL, 600000, NULL, NULL, 1),
(250, 38, '5', NULL, NULL, NULL, 9000000, NULL, NULL, 1),
(251, 37, '3', NULL, NULL, NULL, 10000000, NULL, NULL, 1),
(252, 36, '5', NULL, NULL, NULL, 1400000, NULL, NULL, 1),
(253, 35, '3', NULL, NULL, NULL, 650000, NULL, NULL, 1),
(254, 34, '2480', 4, 4, NULL, 0, NULL, NULL, 1),
(255, 33, '1590', 3, 3, NULL, 0, NULL, NULL, 1),
(256, 32, '1300', 3, 3, NULL, 0, NULL, NULL, 1),
(257, 31, '1290', 3, 3, NULL, 0, NULL, NULL, 1),
(258, 30, '3200', NULL, NULL, NULL, 100000, NULL, NULL, 1),
(259, 29, '1000', NULL, NULL, NULL, 200, NULL, NULL, 1),
(260, 28, '1980', 3, 2, NULL, 0, NULL, NULL, 1),
(261, 27, '264', NULL, NULL, NULL, 0, NULL, NULL, 1),
(262, 26, '700', NULL, NULL, NULL, 0, NULL, NULL, 1),
(263, 25, '1912', 4, 4, NULL, 12300000, NULL, NULL, 1),
(264, 24, '1438', 3, 3, NULL, 9428000, NULL, NULL, 1),
(265, 23, '1100', NULL, NULL, NULL, 0, NULL, NULL, 1),
(266, 22, '125', NULL, NULL, NULL, 12500, NULL, NULL, 1),
(267, 21, '1600', 4, 3, NULL, 9680000, NULL, NULL, 1),
(268, 20, '2300', 3, 4, NULL, 19200000, NULL, NULL, 1),
(269, 19, '1800', 3, 4, NULL, 1500, NULL, NULL, 1),
(270, 18, '2935', 4, 4, NULL, 0, NULL, NULL, 1),
(271, 17, '2000', NULL, NULL, NULL, 180000, NULL, NULL, 1),
(272, 16, '2300', 3, 3, NULL, 19200000, NULL, NULL, 1),
(273, 15, '1125', 3, 3, NULL, 6650000, NULL, NULL, 1),
(274, 12, '500', 1, 1, NULL, 6500, NULL, NULL, 1),
(276, 13, '250', 1, NULL, NULL, 2500, NULL, NULL, 1),
(277, 11, '400', 2, 1, NULL, 30000, NULL, NULL, 1),
(278, 10, '16000', 4, 3, NULL, 9000, NULL, NULL, 1),
(279, 9, '3500', NULL, NULL, NULL, 105, NULL, NULL, 1),
(280, 7, '2500', NULL, NULL, NULL, 50000, NULL, NULL, 1),
(283, 8, '1800', 3, 3, NULL, 30000, NULL, NULL, 1),
(292, 14, '250', 1, 1, NULL, 4999, NULL, NULL, 1),
(293, 56, '1300', 3, 3, NULL, 20000, NULL, NULL, 1),
(295, 106, '1350', 3, 3, NULL, 4725000, NULL, NULL, 1),
(297, 107, '3600', NULL, NULL, NULL, 1400000, NULL, NULL, 1),
(298, 108, '2160', 0, 0, NULL, 650000, NULL, NULL, 1),
(299, 109, '2507', 3, 3, NULL, 1, NULL, NULL, 1),
(300, 110, '1216', 0, 0, NULL, 8000000, NULL, NULL, 1),
(301, 111, '133', 0, 0, NULL, 25000, NULL, NULL, 1),
(302, 112, '1280', 0, 0, NULL, 20000, NULL, NULL, 1),
(303, 113, '3800', 0, 0, NULL, 450, NULL, NULL, 1),
(304, 114, '1250', 0, 0, NULL, 32000, NULL, NULL, 1),
(305, 115, '730', 0, 0, NULL, 50000, NULL, NULL, 1),
(309, 102, '1800', NULL, NULL, NULL, 100000, NULL, NULL, 1),
(310, 6, '1478', 3, 3, NULL, 3000, NULL, NULL, 1),
(311, 5, '1690', 3, 3, NULL, 3700, NULL, NULL, 1),
(312, 5, '1200', 2, 2, NULL, 3100, NULL, NULL, 0),
(313, 117, '1000', 2, 2, NULL, 20000, '2', 'uttara', 1),
(316, 116, '1000', NULL, NULL, NULL, 55000, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prd_listing_view`
--

CREATE TABLE `prd_listing_view` (
  `id` int(11) NOT NULL,
  `f_prd_listing_no` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `counter` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prd_listing_view`
--

INSERT INTO `prd_listing_view` (`id`, `f_prd_listing_no`, `date`, `counter`) VALUES
(1, 5, '2021-08-10', 10),
(2, 6, '2021-08-11', 10),
(3, 14, '2021-08-11', 5),
(4, 14, '2021-08-10', 15),
(5, 15, '2021-09-01', 1),
(6, 15, '2021-09-01', 1),
(7, 15, '2021-09-02', 4),
(8, 15, '2021-09-02', 1),
(9, 15, '2021-09-02', 1),
(10, 15, '2021-09-02', 1),
(11, 15, '2021-09-02', 1),
(12, 58, '2021-09-02', 1),
(13, 58, '2021-09-02', 1),
(14, 58, '2021-09-02', 1),
(15, 15, '2021-09-02', 1),
(16, 15, '2021-09-04', 1),
(17, 58, '2021-09-04', 1),
(18, 58, '2021-09-05', 3),
(19, 15, '2021-09-05', 6),
(20, 15, '2021-09-05', 1),
(21, 15, '2021-09-05', 1),
(22, 59, '2021-09-05', 1),
(23, 59, '2021-09-05', 1),
(24, 59, '2021-09-05', 1),
(25, 59, '2021-09-05', 1),
(26, 59, '2021-09-05', 1),
(27, 59, '2021-09-05', 1),
(28, 59, '2021-09-05', 1),
(29, 59, '2021-09-05', 1),
(30, 59, '2021-09-05', 1),
(31, 59, '2021-09-05', 1),
(32, 15, '2021-09-05', 1),
(33, 15, '2021-09-05', 1),
(34, 15, '2021-09-05', 1),
(35, 15, '2021-09-05', 1),
(36, 15, '2021-09-05', 1),
(37, 15, '2021-09-05', 1),
(38, 15, '2021-09-05', 1),
(39, 15, '2021-09-05', 1),
(40, 15, '2021-09-05', 1),
(41, 15, '2021-09-05', 1),
(42, 15, '2021-09-05', 1),
(43, 15, '2021-09-05', 1),
(44, 59, '2021-09-05', 1),
(45, 15, '2021-09-05', 1),
(46, 15, '2021-09-05', 1),
(47, 15, '2021-09-05', 1),
(48, 15, '2021-09-05', 1),
(49, 15, '2021-09-05', 1),
(50, 15, '2021-09-05', 1),
(51, 15, '2021-09-05', 1),
(52, 15, '2021-09-05', 1),
(53, 59, '2021-09-05', 1),
(54, 59, '2021-09-05', 1),
(55, 59, '2021-09-05', 1),
(56, 59, '2021-09-05', 1),
(57, 59, '2021-09-05', 1),
(58, 59, '2021-09-05', 1),
(59, 59, '2021-09-05', 1),
(60, 59, '2021-09-05', 1),
(61, 59, '2021-09-05', 1),
(62, 59, '2021-09-05', 1),
(63, 59, '2021-09-05', 1),
(64, 59, '2021-09-05', 1),
(65, 15, '2021-09-06', 3),
(66, 59, '2021-09-06', 4),
(67, 59, '2021-09-06', 1),
(68, 15, '2021-09-06', 1),
(69, 15, '2021-09-06', 1),
(70, 59, '2021-09-06', 1),
(71, 59, '2021-09-06', 1),
(72, 59, '2021-09-06', 1),
(73, 59, '2021-09-06', 1),
(74, 59, '2021-09-06', 1),
(75, 59, '2021-09-06', 1),
(76, 59, '2021-09-06', 1),
(77, 59, '2021-09-06', 1),
(78, 59, '2021-09-06', 1),
(79, 59, '2021-09-06', 1),
(80, 59, '2021-09-06', 1),
(81, 59, '2021-09-06', 1),
(82, 59, '2021-09-06', 1),
(83, 15, '2021-09-06', 1),
(84, 59, '2021-09-06', 1),
(85, 59, '2021-09-06', 1),
(86, 59, '2021-09-06', 1),
(87, 59, '2021-09-06', 1),
(88, 59, '2021-09-06', 1),
(89, 59, '2021-09-06', 1),
(90, 15, '2021-09-07', 1),
(91, 59, '2021-09-07', 1),
(92, 59, '2021-09-07', 1),
(93, 59, '2021-09-07', 1),
(94, 59, '2021-09-07', 1),
(95, 59, '2021-09-07', 1),
(96, 59, '2021-09-07', 1),
(97, 58, '2021-09-08', 1),
(98, 58, '2021-09-08', 1),
(99, 58, '2021-09-08', 1),
(100, 58, '2021-09-08', 1),
(101, 58, '2021-09-08', 1),
(102, 58, '2021-09-08', 1),
(103, 58, '2021-09-08', 1),
(104, 58, '2021-09-08', 1),
(105, 58, '2021-09-08', 1),
(106, 58, '2021-09-08', 1),
(107, 58, '2021-09-08', 1),
(108, 58, '2021-09-08', 1),
(109, 58, '2021-09-08', 1),
(110, 58, '2021-09-08', 1),
(111, 58, '2021-09-08', 1),
(112, 58, '2021-09-08', 1),
(113, 58, '2021-09-08', 1),
(114, 58, '2021-09-08', 1),
(115, 58, '2021-09-08', 1),
(116, 58, '2021-09-08', 1),
(117, 58, '2021-09-08', 1),
(118, 58, '2021-09-08', 1),
(119, 58, '2021-09-08', 1),
(120, 58, '2021-09-08', 1),
(121, 58, '2021-09-08', 1),
(122, 58, '2021-09-08', 1),
(123, 58, '2021-09-08', 1),
(124, 58, '2021-09-08', 1),
(125, 58, '2021-09-08', 1),
(126, 58, '2021-09-08', 1),
(127, 58, '2021-09-08', 1),
(128, 58, '2021-09-08', 1),
(129, 58, '2021-09-08', 1),
(130, 58, '2021-09-08', 1),
(131, 58, '2021-09-08', 1),
(132, 58, '2021-09-08', 1),
(133, 58, '2021-09-08', 1),
(134, 58, '2021-09-08', 1),
(135, 58, '2021-09-08', 1),
(136, 58, '2021-09-08', 1),
(137, 58, '2021-09-08', 1),
(138, 58, '2021-09-08', 1),
(139, 58, '2021-09-08', 1),
(140, 58, '2021-09-08', 1),
(141, 58, '2021-09-08', 1),
(142, 58, '2021-09-08', 1),
(143, 58, '2021-09-08', 1),
(144, 58, '2021-09-08', 1),
(145, 58, '2021-09-08', 1),
(146, 58, '2021-09-08', 1),
(147, 58, '2021-09-08', 1),
(148, 58, '2021-09-08', 1),
(149, 58, '2021-09-08', 1),
(150, 58, '2021-09-08', 1),
(151, 58, '2021-09-08', 1),
(152, 58, '2021-09-08', 1),
(153, 58, '2021-09-08', 1),
(154, 58, '2021-09-08', 1),
(155, 58, '2021-09-08', 1),
(156, 58, '2021-09-08', 1),
(157, 58, '2021-09-08', 1),
(158, 58, '2021-09-08', 1),
(159, 58, '2021-09-09', 4),
(160, 15, '2021-09-11', 7),
(161, 58, '2021-09-11', 17),
(162, 59, '2021-09-12', 1),
(163, 58, '2021-09-12', 1),
(164, 5, '2021-09-17', 1),
(165, 14, '2021-09-18', 1),
(166, 58, '2021-09-18', 4),
(167, 5, '2021-09-18', 2),
(168, 6, '2021-09-18', 1),
(169, 58, '2021-09-19', 1),
(170, 5, '2021-09-19', 3),
(171, 14, '2021-09-19', 2),
(172, 56, '2021-09-20', 1),
(173, 15, '2021-09-20', 1),
(174, 16, '2021-09-20', 1),
(175, 16, '2021-09-21', 1),
(176, 5, '2021-09-22', 1),
(177, 6, '2021-09-22', 9),
(178, 106, '2021-09-23', 6),
(179, 58, '2021-09-23', 1),
(180, 8, '2021-09-23', 1),
(181, 9, '2021-09-23', 1),
(182, 5, '2021-09-24', 3),
(183, 106, '2021-09-24', 1),
(184, 5, '2021-09-25', 1),
(185, 14, '2021-09-28', 1),
(186, 5, '2021-09-29', 1),
(187, 105, '2021-09-29', 1),
(188, 103, '2021-09-29', 2),
(189, 102, '2021-09-29', 6),
(190, 106, '2021-09-29', 1),
(191, 89, '2021-10-10', 1),
(192, 58, '2021-10-10', 3),
(193, 5, '2021-10-10', 2),
(194, 102, '2021-10-10', 1),
(195, 6, '2021-10-10', 2),
(196, 61, '2021-10-10', 1),
(197, 62, '2021-10-10', 1),
(198, 100, '2021-10-10', 1),
(199, 68, '2021-10-10', 1),
(200, 64, '2021-10-10', 1),
(201, 57, '2021-10-10', 1),
(202, 6, '2021-10-11', 4),
(203, 6, '2022-05-10', 1),
(204, 61, '2022-05-22', 1),
(205, 58, '2022-05-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prd_nearby`
--

CREATE TABLE `prd_nearby` (
  `id` int(2) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `url_slug` varchar(50) DEFAULT NULL,
  `is_active` int(2) NOT NULL DEFAULT 1,
  `order_id` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prd_nearby`
--

INSERT INTO `prd_nearby` (`id`, `title`, `icon`, `url_slug`, `is_active`, `order_id`) VALUES
(1, 'Bus Stand', NULL, 'bus-stand', 1, 1),
(2, 'Super Shop', NULL, 'super-shop', 1, 2),
(3, 'Hospital', NULL, 'hospital', 1, 3),
(4, 'School', NULL, 'school', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `prd_property_condition`
--

CREATE TABLE `prd_property_condition` (
  `id` int(2) NOT NULL,
  `prod_condition` varchar(50) DEFAULT NULL,
  `url_slug` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order_id` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prd_property_condition`
--

INSERT INTO `prd_property_condition` (`id`, `prod_condition`, `url_slug`, `is_active`, `order_id`) VALUES
(1, 'Ready', 'ready', 1, 1),
(2, 'Semi Ready', 'semi-ready', 1, 2),
(3, 'Ongoing', 'ongoing', 1, 3),
(4, 'Used', 'used', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `prd_property_facing`
--

CREATE TABLE `prd_property_facing` (
  `id` int(2) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url_slug` varchar(50) DEFAULT NULL,
  `is_active` int(2) NOT NULL DEFAULT 1,
  `order_id` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prd_property_facing`
--

INSERT INTO `prd_property_facing` (`id`, `title`, `url_slug`, `is_active`, `order_id`) VALUES
(1, 'South Facing', 'south-facing', 1, 1),
(2, 'North Facing', 'north-facing', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `prd_property_type`
--

CREATE TABLE `prd_property_type` (
  `id` int(10) NOT NULL,
  `property_type` varchar(50) DEFAULT NULL,
  `url_slug` varchar(50) DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `order_id` int(3) NOT NULL DEFAULT 1,
  `type` varchar(10) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desc` text DEFAULT NULL,
  `body_desc` text DEFAULT NULL,
  `category_url` varchar(255) DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `icon_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `total_listing` int(5) NOT NULL DEFAULT 0 COMMENT 'total listing in the category'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prd_property_type`
--

INSERT INTO `prd_property_type` (`id`, `property_type`, `url_slug`, `is_active`, `order_id`, `type`, `meta_title`, `meta_desc`, `body_desc`, `category_url`, `img_path`, `icon_path`, `created_at`, `created_by`, `modified_by`, `modified_at`, `total_listing`) VALUES
(1, 'Apartment', 'apartment', 1, 1, 'A', 'Apartment', 'Apartment', NULL, NULL, NULL, '/media/images/property-category/img_21082021_6121388ceb546.png', '2021-06-01 13:28:13', NULL, 2, '2021-08-21 23:31:56', 42),
(2, 'Office', 'office', 1, 2, 'B', 'Office', 'Office', NULL, NULL, NULL, '/media/images/property-category/img_21082021_6121389b5438e.png', '2021-06-01 13:28:13', NULL, 2, '2021-08-21 23:32:11', 11),
(3, 'Shop', 'shop', 1, 3, 'B', 'Shop', 'Shop', NULL, NULL, NULL, '/media/images/property-category/img_21082021_6121387ee018b.png', '2021-06-01 13:28:13', NULL, 2, '2021-08-21 23:31:42', 11),
(4, 'Warehouse', 'warehouse', 1, 4, 'B', 'Warehouse', 'Warehouse', NULL, NULL, NULL, '/media/images/property-category/img_21082021_612138b6b1f2f.png', '2021-06-01 13:28:13', NULL, 2, '2021-08-21 23:32:38', 0),
(5, 'Industrial space', 'industrial-space', 1, 5, 'B', 'Industrial space', 'Industrial space', NULL, NULL, NULL, '/media/images/property-category/img_21082021_612138657e22e.png', '2021-06-01 13:28:13', NULL, 2, '2021-08-21 23:31:17', 22),
(6, 'Garage', 'garage', 1, 6, 'B', 'Garage', 'Garage', 'Garage', NULL, NULL, '/media/images/property-category/img_20082021_611eb90a87e97.png', '2021-06-01 13:28:13', NULL, 2, '2021-08-20 02:03:22', 0),
(7, 'Land', 'land', 1, 7, 'C', 'Land', 'Land', NULL, NULL, '/media/images/property-category/img_20082021_611eb8e5e1f1e.jpg', '/media/images/property-category/img_21082021_6121380b69140.png', '2021-06-01 13:28:13', NULL, 2, '2021-08-21 23:29:47', 14),
(8, 'Flats', 'flats', 1, 101, NULL, 'Flats', 'Flats available.', NULL, NULL, '/media/images/property-category/img_21082021_61213840b541b.png', '/media/images/property-category/img_21082021_61213840b5cc7.png', '2021-08-21 11:30:40', 2, NULL, '2021-08-21 23:30:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prd_requirements`
--

CREATE TABLE `prd_requirements` (
  `id` int(10) NOT NULL,
  `f_user_no` int(11) DEFAULT NULL,
  `f_city_no` int(10) DEFAULT NULL,
  `city_name` varchar(50) DEFAULT NULL,
  `f_areas` varchar(100) DEFAULT NULL COMMENT 'area id''s by comma separeted',
  `area_names` varchar(200) DEFAULT NULL COMMENT 'area name by comma separeted',
  `property_for` varchar(20) DEFAULT NULL COMMENT 'rent or buy',
  `f_property_type_no` int(2) DEFAULT NULL,
  `property_type` varchar(50) DEFAULT NULL,
  `min_size` int(5) DEFAULT 0,
  `max_size` int(5) DEFAULT 0,
  `min_budget` float DEFAULT 0,
  `max_budget` float DEFAULT 0,
  `bedroom` varchar(200) DEFAULT NULL,
  `f_property_condition` varchar(50) DEFAULT NULL COMMENT 'comma separated id from prd_property_condition ',
  `property_condition` varchar(50) DEFAULT NULL,
  `requirement_details` text DEFAULT NULL,
  `prep_cont_time` time DEFAULT NULL COMMENT 'preferred time to contact',
  `email_alert` varchar(50) NOT NULL DEFAULT 'weekly' COMMENT 'daily, weekly, monthly',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(10) DEFAULT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending,1=valid,2=invalid,3=updated by user need again verification',
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive(it will be old data)',
  `f_verified_by` int(10) DEFAULT NULL,
  `verified_at` datetime DEFAULT NULL,
  `max_sharing_permission` int(11) NOT NULL DEFAULT 0,
  `lead_price` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prd_requirements`
--

INSERT INTO `prd_requirements` (`id`, `f_user_no`, `f_city_no`, `city_name`, `f_areas`, `area_names`, `property_for`, `f_property_type_no`, `property_type`, `min_size`, `max_size`, `min_budget`, `max_budget`, `bedroom`, `f_property_condition`, `property_condition`, `requirement_details`, `prep_cont_time`, `email_alert`, `created_at`, `created_by`, `modified_at`, `modified_by`, `is_verified`, `is_active`, `f_verified_by`, `verified_at`, `max_sharing_permission`, `lead_price`) VALUES
(7, 20, 1, 'Dhaka', '[\"2\",\"3\",\"5\"]', NULL, 'sale', 2, 'Office', 800, 1800, 2000000, 3000000, '[\"any\"]', '[\"1\"]', '[\"ready\"]', '<p>I need a perfect property&nbsp;</p>', '01:00:00', 'daily', NULL, 20, '2021-09-10 22:09:11', 20, 0, 0, NULL, NULL, 0, 10),
(9, 20, 1, 'Dhaka', '[\"5\",\"3\",\"2\"]', NULL, 'sale', 2, 'Office', 800, 1800, 2000000, 3000000, '[\"any\"]', '[\"1\"]', '[\"ready\"]', '<p>I need a perfect property&nbsp;</p>', '01:00:00', 'daily', NULL, 20, '2021-09-10 22:09:21', 20, 0, 1, NULL, NULL, 0, 10),
(10, 41, 1, 'Dhaka', '[\"1\",\"5\",\"12\"]', NULL, 'sale', 1, 'Apartment', 100, 1000, 10, 100, 'null', '[]', '[]', '<p>test</p>', '04:10:00', 'daily', NULL, 41, '2021-09-21 00:57:29', 2, 1, 1, 2, '2021-09-21 00:57:29', 10, 10),
(12, 14, 1, 'Dhaka', '[\"2\",\"3\"]', NULL, 'sale', 1, 'Apartment', 1000, 1500, 1000000, 2000000, '[\"3bed\"]', '[\"1\",\"2\",\"3\"]', '[\"ready\",\"semi\",\"ongoing\"]', '<p>test</p>', '02:40:00', 'weekly', NULL, 14, '2021-09-10 22:09:27', 14, 0, 0, NULL, NULL, 0, 10),
(13, 42, 1, 'Dhaka', '[\"2\",\"3\"]', NULL, 'sale', 1, 'Apartment', 1000, 2000, 1000000, 2000000, '[\"3bed\"]', '[\"1\"]', '[\"ready\"]', '<p>test</p>', '07:56:00', 'weekly', NULL, 42, '2021-09-10 22:10:33', 2, 0, 0, NULL, NULL, 10, 10),
(14, 42, 1, 'Dhaka', '[\"2\",\"3\"]', NULL, 'sale', 1, 'Apartment', 1000, 2000, 1000000, 2000000, '[\"3bed\"]', '[3,2,1]', '[\"Ongoing\",\"Semi Ready\",\"Ready\"]', '<p>test</p>', '07:56:00', 'weekly', NULL, 42, '2021-09-13 01:38:23', 2, 1, 1, 2, '2021-09-13 01:38:23', 0, 10),
(15, 14, 1, 'Dhaka', '[\"2\",\"3\"]', NULL, 'sale', 1, 'Apartment', 1000, 1500, 1000000, 2000000, '[\"3bed\"]', NULL, '[\"1,Ready\",\"2,Semi Ready\",\"3,Ongoing\"]', '<p>test</p>', '02:40:00', 'weekly', NULL, 14, NULL, 14, 0, 0, NULL, NULL, 0, 10),
(16, 14, 1, 'Dhaka', '[\"2\",\"3\"]', NULL, 'sale', 1, 'Apartment', 1000, 1500, 1000000, 2000000, '[\"3bed\"]', '[1,2,3]', '[\"Ready\",\"Semi Ready\",\"Ongoing\"]', '<p>test</p>', '02:40:00', 'weekly', NULL, 14, NULL, 14, 0, 0, NULL, NULL, 0, 10),
(17, 14, 1, 'Dhaka', '[\"2\",\"3\"]', NULL, 'sale', 1, 'Apartment', 1000, 1500, 1000000, 2000000, '[\"3bed\"]', '[5,3,2,1]', '[\"nn\",\"Ongoing\",\"Semi Ready\",\"Ready\"]', '<p>test</p>', '02:40:00', 'weekly', NULL, 14, '2021-09-12 23:46:32', 2, 0, 0, NULL, NULL, 0, 10),
(18, 14, 1, 'Dhaka', '[\"2\",\"3\"]', NULL, 'sale', 1, 'Apartment', 1000, 1500, 1000000, 2000000, '[\"3bed\"]', '[5,3,1]', '[\"nn\",\"Ongoing\",\"Ready\"]', '<p>test</p>', '02:40:00', 'weekly', NULL, 14, NULL, 14, 0, 0, NULL, NULL, 0, 10),
(19, 44, 1, 'Dhaka', '[\"2\",\"6\"]', NULL, 'rent', 1, 'Apartment', 150, 400, 15000, 50000, '[\"1\",\"3\"]', '[4,2,1]', '[\"Used\",\"Semi Ready\",\"Ready\"]', '<p>Property details.</p>', '07:12:00', 'weekly', '2021-09-13 01:12:39', 2, '2021-09-13 21:05:50', 2, 1, 1, 2, '2021-09-13 21:05:50', 10, 10),
(24, 36, 2, 'Chittagong', '[\"4\"]', NULL, 'sale', 3, 'Shop', 200, 2000, 1800, 180000, 'null', '[4,2,1]', '[\"Used\",\"Semi Ready\",\"Ready\"]', '<p>Need Shop</p>', '02:41:00', 'monthly', '2021-09-13 01:46:05', 2, '2021-09-13 01:46:05', 2, 1, 1, 2, '2021-09-13 01:46:05', 10, 10),
(25, 35, 4, 'Narayanganj', '[\"15\"]', NULL, 'sale', 4, 'Warehouse', 1200, 4000, 250000, 5000000, '[\"any\"]', '[3,2,1]', '[\"Ongoing\",\"Semi Ready\",\"Ready\"]', '<p>Warehouse needed.</p>', '02:49:00', 'monthly', '2021-09-13 01:49:37', 2, '2021-09-13 01:49:37', 2, 1, 1, 2, '2021-09-13 01:49:37', 5, 10),
(26, 34, 1, 'Dhaka', '[\"14\",\"29\"]', NULL, 'rent', 5, 'Industrial space', 1250, 5000, 270000, 1000000, '[\"3bed\",\"4plus\"]', '[4,3,1]', '[\"Used\",\"Ongoing\",\"Ready\"]', '<p>Industrial Space</p>', '03:00:00', 'weekly', '2021-09-13 01:51:21', 2, '2021-09-13 01:51:21', 2, 0, 0, NULL, NULL, 10, 10),
(27, 33, 5, 'Gazipur', '[\"24\"]', NULL, 'rent', 6, 'Garage', 1200, 3000, 120000, 250000, 'null', '[4,2,1]', '[\"Used\",\"Semi Ready\",\"Ready\"]', '<p>Garage for car.</p>', '12:53:00', 'weekly', '2021-09-13 01:53:47', 2, '2021-09-13 01:53:47', 2, 0, 1, NULL, NULL, 2, 10),
(28, 32, 2, 'Chittagong', '[\"4\"]', NULL, 'rent', 8, 'Flats', 1500, 3000, 14400, 16600, '[\"2bed\",\"3bed\"]', '[4,2,1]', '[\"Used\",\"Semi Ready\",\"Ready\"]', '<p>Flats</p>', '03:10:00', 'monthly', '2021-09-13 02:07:36', 2, '2021-09-13 02:07:36', 2, 0, 1, NULL, NULL, 5, 10),
(29, 31, 1, 'Dhaka', '[\"7\",\"8\",\"9\"]', NULL, 'rent', 1, 'Apartment', 1200, 2000, 30000, 60000, '[\"2bed\",\"3bed\"]', '[4,1]', '[\"Used\",\"Ready\"]', '<p>Apartment</p>', '02:11:00', 'monthly', '2021-09-13 02:12:07', 2, '2021-09-13 02:12:07', 2, 0, 1, NULL, NULL, 10, 10),
(30, 18, 1, 'Dhaka', '[\"1\"]', NULL, 'sale', 7, 'Land', 4000, 10000, 300000, 700000, '[\"any\"]', '[3]', '[\"Ongoing\"]', '<p>Land</p>', '02:22:00', 'monthly', '2021-09-13 02:22:38', 2, '2021-09-13 02:22:38', 2, 1, 1, 2, '2021-09-13 02:22:38', 5, 10),
(31, 68, 1, 'Dhaka', '[\"1\",\"2\",\"3\"]', NULL, 'rent', 5, 'Industrial space', 150, 5000, 15000, 1500000, '[\"any\"]', '[3,2]', '[\"Ongoing\",\"Semi Ready\"]', '<p>Industrial Space</p>', '11:56:00', 'weekly', '2021-09-14 23:56:22', 2, '2021-09-14 23:56:22', 2, 1, 1, 2, '2021-09-14 23:56:22', 10, 10),
(32, 67, 1, 'Dhaka', '[\"9\"]', NULL, 'sale', 1, 'Apartment', 170, 6000, 12000, 5000000, '[\"2\",\"3\",\"4\"]', '[2,1]', '[\"Semi Ready\",\"Ready\"]', '<p>Apartment</p>', '11:58:00', 'monthly', '2021-09-14 23:58:19', 2, '2021-09-14 23:58:19', 2, 0, 1, NULL, NULL, 5, 10),
(33, 69, 7, 'Sylhet', '[\"36\"]', NULL, 'rent', 2, 'Office', 80, 4000, 8000, 300000, '[\"any\"]', '[4,2,1]', '[\"Used\",\"Semi Ready\",\"Ready\"]', '<p>Office</p>', '12:01:00', 'daily', '2021-09-15 00:01:57', 2, '2021-09-15 00:01:57', 2, 0, 1, NULL, NULL, 2, 10),
(34, 70, 7, 'Sylhet', '[\"36\"]', NULL, 'sale', 3, 'Shop', 140, 3200, 12000, 320000, '[\"any\"]', '[5,4,1]', '[\"nn\",\"Used\",\"Ready\"]', '<p>Shop</p>', '12:05:00', 'daily', '2021-09-15 00:05:51', 2, '2021-09-15 00:05:51', 2, 1, 1, 2, '2021-09-15 00:05:51', 3, 10),
(35, 71, 1, 'Dhaka', '[\"2\",\"3\",\"5\",\"6\"]', NULL, 'sale', 4, 'Warehouse', 60, 6000, 450, 3200, '[\"any\"]', '[5,3,1]', '[\"nn\",\"Ongoing\",\"Ready\"]', '<p>Warehouse</p>', '12:08:00', 'monthly', '2021-09-15 00:09:04', 2, '2021-09-15 00:09:04', 2, 0, 1, NULL, NULL, 36, 10),
(36, 72, 6, 'Khulna', '[\"34\"]', NULL, 'sale', 3, 'Shop', 3200, 4100, 150000, 5000000, '[\"any\"]', '[4,3,2,1]', '[\"Used\",\"Ongoing\",\"Semi Ready\",\"Ready\"]', '<p>Shop</p>', '12:11:00', 'weekly', '2021-09-15 00:11:14', 2, '2021-09-15 00:11:14', 2, 1, 1, 2, '2021-09-15 00:11:14', 5, 10),
(37, 73, 6, 'Khulna', '[\"34\"]', NULL, 'rent', 5, 'Industrial space', 1400, 9000, 150000, 50000000, '[\"any\"]', '[]', '[]', '<p>Industrial Space</p>', '12:12:00', 'weekly', '2021-09-15 00:14:02', 2, '2021-09-15 00:14:02', 2, 1, 1, 2, '2021-09-15 00:14:02', 3, 10),
(38, 84, 5, 'Gazipur', '[\"24\",\"32\",\"38\"]', NULL, 'sale', 6, 'Garage', 300, 1200, 15000, 300000, '[\"any\"]', '[5,4]', '[\"nn\",\"Used\"]', '<p>Garage</p>', '12:30:00', 'monthly', '2021-09-15 00:30:50', 2, '2021-09-15 00:30:50', 2, 1, 1, 2, '2021-09-15 00:30:50', 5, 10),
(39, 83, 5, 'Gazipur', '[\"24\",\"32\",\"38\"]', NULL, 'rent', 5, 'Industrial space', 50, 300, 15000, 220000, '[\"any\"]', '[4,3,1]', '[\"Used\",\"Ongoing\",\"Ready\"]', '<p>Industrial Space</p>', '12:36:00', 'weekly', '2021-09-15 00:36:46', 2, '2021-09-15 00:36:46', 2, 0, 1, NULL, NULL, 6, 10),
(40, 74, 6, 'Khulna', '[\"34\"]', NULL, 'rent', 3, 'Shop', 600, 4000, 20000, 3000000, '[\"any\"]', '[4,2,1]', '[\"Used\",\"Semi Ready\",\"Ready\"]', '<p>Shop</p>', '12:38:00', 'weekly', '2021-09-15 00:38:14', 2, '2021-09-15 00:38:14', 2, 1, 1, 2, '2021-09-15 00:38:14', 6, 10),
(41, 82, 1, 'Dhaka', '[\"37\",\"40\"]', NULL, 'rent', 2, 'Office', 150, 300, 15200, 250000, '[\"any\"]', '[4,3,2]', '[\"Used\",\"Ongoing\",\"Semi Ready\"]', '<p>Office</p>', '12:41:00', 'monthly', '2021-09-15 00:42:03', 2, '2021-09-15 00:42:03', 2, 1, 1, 2, '2021-09-15 00:42:03', 8, 10),
(42, 81, 1, 'Dhaka', '[\"3\",\"6\"]', NULL, 'sale', 5, 'Industrial space', 500, 4000, 350000, 4500000, '[\"any\"]', '[5,4,1]', '[\"nn\",\"Used\",\"Ready\"]', '<p>Industrial space</p>', '12:42:00', 'weekly', '2021-09-15 00:43:01', 2, '2021-09-15 00:43:01', 2, 0, 1, NULL, NULL, 7, 10),
(43, 80, 1, 'Dhaka', '[\"1\",\"2\",\"12\"]', NULL, 'rent', 1, 'Apartment', 1500, 2400, 150000, 150000, '[\"any\"]', '[4,1]', '[\"Used\",\"Ready\"]', '<p>Apartment</p>', '12:43:00', 'weekly', '2021-09-15 00:43:43', 2, '2021-09-21 00:16:26', 2, 1, 1, 2, '2021-09-21 00:16:26', 58, 10),
(44, 79, 5, 'Gazipur', '[\"24\",\"32\",\"38\"]', NULL, 'rent', 8, 'Flats', 150, 300, 12000, 18000, '[\"any\"]', '[4,2,1]', '[\"Used\",\"Semi Ready\",\"Ready\"]', '<p>Flats</p>', '12:46:00', 'monthly', '2021-09-15 00:46:33', 2, '2021-09-15 00:46:33', 2, 0, 1, NULL, NULL, 5, 10),
(45, 78, 2, 'Chittagong', '[\"4\"]', NULL, 'rent', 1, 'Apartment', 400, 3200, 18000, 25000, '[\"2\",\"3\"]', '[4,1]', '[\"Used\",\"Ready\"]', '<p>Apartment</p>', '12:47:00', 'weekly', '2021-09-15 00:47:28', 2, '2021-09-15 00:47:28', 2, 1, 1, 2, '2021-09-15 00:47:28', 5, 10),
(46, 77, 4, 'Narayanganj', '[\"15\"]', NULL, 'sale', 1, 'Apartment', 350, 6000, 15000, 30000, '[\"3\",\"4\"]', '[4,1]', '[\"Used\",\"Ready\"]', '<p>Apartment</p>', '12:48:00', 'daily', '2021-09-15 00:48:19', 2, '2021-09-15 00:48:19', 2, 0, 1, NULL, NULL, 6, 10),
(47, 76, 6, 'Khulna', '[\"34\"]', NULL, 'rent', 7, 'Land', 1500, 6000, 150000, 800000, '[\"any\"]', '[4,3,2,1]', '[\"Used\",\"Ongoing\",\"Semi Ready\",\"Ready\"]', '<p>Land</p>', '12:49:00', 'weekly', '2021-09-15 00:49:14', 2, '2021-09-15 00:49:14', 2, 1, 1, 2, '2021-09-15 00:49:14', 9, 10),
(48, 75, 1, 'Dhaka', '[\"7\"]', NULL, 'rent', 1, 'Apartment', 350, 500, 18000, 30000, '[\"3\"]', '[4,1]', '[\"Used\",\"Ready\"]', '<p>Apartment</p>', '12:49:00', 'weekly', '2021-09-15 00:49:56', 2, '2021-09-15 00:49:56', 2, 1, 1, 2, '2021-09-15 00:49:56', 8, 10),
(49, 34, 1, 'Dhaka', '[\"7\"]', NULL, 'sale', 1, 'Apartment', 1600, 1700, 3700, 4000, '[\"3\"]', '[3]', '[\"Ongoing\"]', '<p>test</p>', '10:21:00', 'daily', NULL, 34, '2021-09-19 22:26:46', 2, 1, 1, 2, '2021-09-19 22:26:46', 10, 10),
(50, 14, 1, 'Dhaka', '[\"2\",\"3\"]', NULL, 'sale', 1, 'Apartment', 1000, 1500, 1000000, 2000000, '[\"3\"]', '[3,1]', '[\"Ongoing\",\"Ready\"]', '<p>test</p>', '02:40:00', 'weekly', NULL, 14, NULL, 14, 3, 0, NULL, NULL, 0, 10),
(51, 14, 1, 'Dhaka', '[\"2\",\"3\"]', NULL, 'sale', 1, 'Apartment', 1000, 1500, 1000, 2000000, '[\"any\"]', '[3,1]', '[\"Ongoing\",\"Ready\"]', '<p>test</p>', '02:40:00', 'weekly', NULL, 14, '2021-09-23 01:22:26', 2, 1, 1, 2, '2021-09-23 01:22:26', 10, 10);

--
-- Triggers `prd_requirements`
--
DELIMITER $$
CREATE TRIGGER `before_prd_requirements_insert` BEFORE INSERT ON `prd_requirements` FOR EACH ROW begin

declare var_city_name varchar(100) default null;
declare var_property_type varchar(100) default null;
declare var_lead_price float(10) default 0;

select city_name into var_city_name from ss_city where id = new.f_city_no;
select property_type into var_property_type from prd_property_type where id = new.f_property_type_no;

select case 
when new.property_for = 'sale' then lead_view_sales_price 
when new.property_for = 'rent' then lead_view_rent_price
when new.property_for = 'roommate' then lead_view_roommate_price
else 0
end 
into var_lead_price from ss_lead_price; 


set new.city_name = var_city_name;
set new.property_type = var_property_type;
set new.lead_price = var_lead_price;

end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_prd_requirements_update` BEFORE UPDATE ON `prd_requirements` FOR EACH ROW begin

declare var_city_name varchar(100) default null;
declare var_property_type varchar(100) default null;

select city_name into var_city_name from ss_city where id = new.f_city_no;
select property_type into var_property_type from prd_property_type where id = new.f_property_type_no;

set new.city_name = var_city_name;
set new.property_type = var_property_type;

end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin', '2023-01-17 23:50:17', NULL),
(2, 'admin', 'admin', '2023-01-17 23:50:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(7, 1),
(8, 1),
(8, 2),
(9, 1),
(10, 1),
(11, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ss_area`
--

CREATE TABLE `ss_area` (
  `id` int(10) NOT NULL,
  `area_name` varchar(50) DEFAULT NULL,
  `f_parent_area_no` int(11) DEFAULT NULL,
  `is_parent` int(1) NOT NULL DEFAULT 1,
  `url_slug` varchar(50) DEFAULT NULL,
  `f_city_no` int(10) DEFAULT NULL,
  `city_name` varchar(50) DEFAULT NULL,
  `is_active` int(1) DEFAULT 1,
  `order_id` int(10) NOT NULL DEFAULT 1,
  `lat` varchar(100) DEFAULT NULL,
  `lon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `ss_area`
--

INSERT INTO `ss_area` (`id`, `area_name`, `f_parent_area_no`, `is_parent`, `url_slug`, `f_city_no`, `city_name`, `is_active`, `order_id`, `lat`, `lon`) VALUES
(1, 'Mirpur', NULL, 1, 'mirpur', 1, 'Dhaka', 1, 1, NULL, NULL),
(2, 'Banani', NULL, 1, 'banani', 1, 'Dhaka', 1, 50, NULL, NULL),
(3, 'Mohakhali', NULL, 1, 'mohakhali', 1, 'Dhaka', 1, 3, NULL, NULL),
(4, 'GOC', NULL, 1, 'goc', 2, 'Chittagong', 1, 1, NULL, NULL),
(5, 'Mogbazar', NULL, 1, 'mogbazar', 1, 'Dhaka', 1, 4, NULL, NULL),
(6, 'Mohammadpur', NULL, 1, 'mohammadpur', 1, 'Dhaka', 1, 5, NULL, NULL),
(7, 'Banasree', NULL, 1, 'banasree', 1, 'Dhaka', 1, 6, NULL, NULL),
(8, 'Eskaton', NULL, 1, 'eskaton', 1, 'Dhaka', 1, 7, NULL, NULL),
(9, 'Uttara', NULL, 1, 'uttara', 1, 'Dhaka', 1, 8, NULL, NULL),
(10, 'Rampura', NULL, 1, 'rampura', 1, 'Dhaka', 1, 9, NULL, NULL),
(11, 'Mirbag', NULL, 1, 'mirbag', 1, 'Dhaka', 1, 10, NULL, NULL),
(12, 'Basundhara', NULL, 1, 'basundhara', 1, 'Dhaka', 1, 11, NULL, NULL),
(13, 'Naya Paltan', NULL, 1, 'naya-paltan', 1, 'Dhaka', 1, 12, NULL, NULL),
(14, 'Adabor', NULL, 1, 'adabor', 1, 'Dhaka', 1, 13, NULL, NULL),
(15, 'Narayanganj Sadar', NULL, 1, 'narayanganj-sadar', 4, 'Narayanganj', 1, 1, NULL, NULL),
(16, 'Malibag', NULL, 1, 'malibag', 1, 'Dhaka', 1, 14, NULL, NULL),
(17, 'Baridhara', NULL, 1, 'baridhara', 1, 'Dhaka', 1, 15, NULL, NULL),
(18, 'Purbachal', NULL, 1, 'purbachal', 1, 'Dhaka', 1, 16, NULL, NULL),
(19, 'Savar', NULL, 1, 'savar', 1, 'Dhaka', 1, 17, NULL, NULL),
(20, 'Badda', NULL, 1, 'badda', 1, 'Dhaka', 1, 18, NULL, NULL),
(21, 'Aftab Nagar', NULL, 1, 'aftab-nagar', 1, 'Dhaka', 1, 19, NULL, NULL),
(22, 'Kathalbagan', NULL, 1, 'kathalbagan', 1, 'Dhaka', 1, 20, NULL, NULL),
(23, 'Kathalbagan', NULL, 1, 'kathalbagan', 1, 'Dhaka', 1, 21, NULL, NULL),
(24, 'Gazipur Sadar', NULL, 1, 'gazipur-sadar', 5, 'Gazipur', 1, 1, NULL, NULL),
(25, 'Banani ( #6 to #10 Road) ', 2, 0, NULL, 1, 'Dhaka', 1, 22, NULL, NULL),
(26, 'Mirpur 1 Panirtanki', 1, 0, NULL, 1, 'Dhaka', 1, 23, NULL, NULL),
(27, 'Banani ( #1 to #5 Road) ', 2, 0, NULL, 1, 'Dhaka', 1, 24, NULL, NULL),
(28, 'Banani ( #6 to #10 Road) ', 2, 0, NULL, 1, 'Dhaka', 1, 25, NULL, NULL),
(29, 'Basundhara (1-10)', 12, 0, 'basundhara-1-10', 1, 'Dhaka', 1, 51, '48.45555', '48.45555'),
(30, 'Arambagh', NULL, 1, 'arambagh', 1, 'Dhaka', 1, 52, NULL, NULL),
(31, 'Gawsia', 30, 0, 'gawsia', 1, 'Dhaka', 1, 53, NULL, NULL),
(32, 'Konabari', NULL, 1, 'konabari', 5, 'Gazipur', 1, 2, NULL, NULL),
(33, 'Karwan Bazaar', NULL, 1, 'karwan-bazaar', 1, 'Dhaka', 1, 54, NULL, NULL),
(34, 'Khan Jahan Ali', NULL, 1, 'khan-jahan-ali', 6, 'Khulna', 1, 1, NULL, NULL),
(35, 'Demra', NULL, 1, 'demra', 1, 'Dhaka', 1, 55, NULL, NULL),
(36, 'Akhalia', NULL, 1, 'akhalia', 7, 'Sylhet', 1, 1, NULL, NULL),
(37, 'Kallyanpur', NULL, 1, 'kallyanpur', 1, 'Dhaka', 1, 56, NULL, NULL),
(38, 'Tongi', NULL, 1, 'tongi', 5, 'Gazipur', 1, 3, NULL, NULL),
(39, 'Dhour', 1, 0, 'dhour', 1, 'Dhaka', 1, 57, NULL, NULL),
(40, 'Dhanmondi', NULL, 1, 'dhanmondi', 1, 'Dhaka', 1, 58, NULL, NULL),
(41, 'Shantinagar', NULL, 1, 'shantinagar', 1, 'Dhaka', 1, 59, NULL, NULL),
(42, 'Khulshi', NULL, 1, 'khulshi', 2, 'Chittagong', 1, 2, NULL, NULL),
(43, 'Khilgaon', NULL, 1, 'khilgaon', 1, 'Dhaka', 1, 60, NULL, NULL);

--
-- Triggers `ss_area`
--
DELIMITER $$
CREATE TRIGGER `before_ss_area_insert` BEFORE INSERT ON `ss_area` FOR EACH ROW begin
declare var_city_name varchar(50) default null;
declare var_order_id int(10) default 0;

select ifnull(max(order_id),0) into var_order_id from ss_area where f_city_no =  new.f_city_no;

select city_name into var_city_name from ss_city where id = new.f_city_no;

set new.city_name = var_city_name ;
set new.order_id = var_order_id+1 ;


end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ss_city`
--

CREATE TABLE `ss_city` (
  `id` int(11) NOT NULL,
  `city_name` varchar(50) DEFAULT NULL,
  `url_slug` varchar(50) DEFAULT NULL,
  `f_country_no` int(4) DEFAULT NULL,
  `is_active` int(1) DEFAULT 1,
  `order_id` int(2) NOT NULL DEFAULT 1,
  `lat` varchar(100) DEFAULT NULL,
  `lon` varchar(100) DEFAULT NULL,
  `is_populated` int(1) NOT NULL DEFAULT 1,
  `total_listing` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ss_city`
--

INSERT INTO `ss_city` (`id`, `city_name`, `url_slug`, `f_country_no`, `is_active`, `order_id`, `lat`, `lon`, `is_populated`, `total_listing`) VALUES
(1, 'Dhaka', 'dhaka', 1, 1, 19, NULL, NULL, 1, 81),
(2, 'Chittagong', 'chittagong', 1, 1, 2, NULL, NULL, 1, 0),
(3, 'Bhola', 'bhola', NULL, 1, 15, '48.45555', '48.45555', 1, 0),
(4, 'Narayanganj', 'narayanganj', NULL, 1, 101, NULL, NULL, 0, 2),
(5, 'Gazipur', 'gazipur', NULL, 1, 8, NULL, NULL, 1, 15),
(6, 'Khulna', 'khulna', NULL, 1, 101, NULL, NULL, 0, 1),
(7, 'Sylhet', 'sylhet', NULL, 1, 11, NULL, NULL, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ss_listing_price`
--

CREATE TABLE `ss_listing_price` (
  `id` int(5) NOT NULL,
  `f_listing_type_no` int(5) DEFAULT NULL,
  `sell_price` float NOT NULL DEFAULT 0,
  `rent_price` float NOT NULL DEFAULT 0,
  `roommat_price` float NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ss_listing_price`
--

INSERT INTO `ss_listing_price` (`id`, `f_listing_type_no`, `sell_price`, `rent_price`, `roommat_price`) VALUES
(1, 1, 30, 40, 40),
(2, 2, 50, 50, 50),
(3, 3, 70, 70, 0),
(4, 4, 100, 100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `ss_user_type`
--

CREATE TABLE `ss_user_type` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `type_no` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ss_user_type`
--

INSERT INTO `ss_user_type` (`id`, `title`, `type_no`, `modified_at`, `create_at`, `created_by`, `modified_by`) VALUES
(1, 'seeker', 1, NULL, NULL, NULL, NULL),
(2, 'owner', 2, NULL, NULL, NULL, NULL),
(3, 'builder', 3, NULL, NULL, NULL, NULL),
(4, 'agency', 4, NULL, NULL, NULL, NULL),
(5, 'Agent', 5, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(10) DEFAULT NULL,
  `mobile_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) DEFAULT 1,
  `dob` date DEFAULT NULL,
  `facebook_id` int(20) DEFAULT NULL,
  `google_id` int(20) DEFAULT NULL,
  `profile_pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activation_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activation_code_expire` datetime DEFAULT NULL,
  `is_first_login` int(11) NOT NULL DEFAULT 1,
  `user_type` int(1) NOT NULL DEFAULT 1 COMMENT '1=seeker,2=owner,3=builder,4=agency, 5 =agent of bdflat',
  `can_login` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active,0=pending,2=inactive,3=deleted',
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_email_verified` int(11) DEFAULT 0,
  `is_mobile_verified` int(11) DEFAULT 0,
  `email_verify_code` varchar(50) DEFAULT NULL,
  `email_verify_expire` datetime DEFAULT NULL,
  `mobile_verity_code` varchar(50) DEFAULT NULL,
  `mobile_verify_expire` datetime DEFAULT NULL,
  `contact_per_name` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `actual_topup` float NOT NULL DEFAULT 0 COMMENT 'cumulative balance',
  `pending_topup` float NOT NULL DEFAULT 0 COMMENT 'only pending',
  `used_topup` float NOT NULL DEFAULT 0,
  `unused_topup` float NOT NULL DEFAULT 0 COMMENT 'only unused',
  `total_listing` int(5) NOT NULL DEFAULT 0,
  `listing_limit` int(5) NOT NULL DEFAULT 1,
  `total_lead` int(10) NOT NULL DEFAULT 0,
  `is_feature` int(1) NOT NULL DEFAULT 0,
  `payment_auto_renew` int(1) NOT NULL DEFAULT 1 COMMENT 'listing when status = 10(published) but payment_status = 0 , the listing will update payment_status = 1 if enough balance in account',
  `is_verified` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `code`, `name`, `designation`, `email`, `country_code`, `mobile_no`, `password`, `gender`, `dob`, `facebook_id`, `google_id`, `profile_pic`, `profile_pic_url`, `activation_code`, `activation_code_expire`, `is_first_login`, `user_type`, `can_login`, `remember_token`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `is_email_verified`, `is_mobile_verified`, `email_verify_code`, `email_verify_expire`, `mobile_verity_code`, `mobile_verify_expire`, `contact_per_name`, `address`, `actual_topup`, `pending_topup`, `used_topup`, `unused_topup`, `total_listing`, `listing_limit`, `total_lead`, `is_feature`, `payment_auto_renew`, `is_verified`) VALUES
(13, 1000, 'maidul1', NULL, 'owner@gmail.com', 'bd', '01918998855', '$2y$10$aAANKQzyqfRinNTVZ1tlfesvIGYHWa4.Hg5IER24IiykshzpqhZeC', 1, NULL, NULL, NULL, '62ee3623a27ee.jpg', '/uploads/user/13/62ee3623a27ee.jpg', NULL, NULL, 1, 2, 1, 'QKNa0w9EBta2Cz49obBMpTJCZai7AnyE2JriN51jdwrSNtg9jwKCnk3rKzKi', 1, 0, 0, '2021-04-11 20:33:09', '2022-08-06 15:36:35', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, 2000, 0, 0, 1830, 5, 5, 0, 0, 0, 1),
(14, 1001, 'Maidul Islam Babu', NULL, 'seeker@gmail.com', 'bd', '01681944139', '$2y$10$uDfNvGFGnLQoltKrDaAuk.bipD33SYs.AWxvL3D2UyeahDBGwaCvy', 1, NULL, NULL, NULL, '61648969c44b2.jpg', '/uploads/user/14/61648969c44b2.jpg', NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-04-14 10:00:54', '2021-10-12 00:58:49', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 550, 0, 0, 525, 0, 5, 0, 0, 0, 0),
(15, 1002, 'Maidul Islam Babu', 'Data analyst', 'developer@gmail.com', 'bd', '01681944127', '$2y$10$WAp/98uhcPn2e06RQCf3KuCX9wFSwds/Oz/yJklaiStsYB5R882b.', 1, NULL, NULL, NULL, '60b11641916e1.jpg', '/uploads/user/14/60b11641916e1.jpg', NULL, NULL, 1, 3, 1, NULL, 1, 0, 2, '2021-04-14 10:00:54', '2021-09-18 23:36:06', 0, 0, NULL, NULL, NULL, NULL, 'Maidul Islam Babu', 'mirur', 2000, 0, 0, 1900, 2, 20, 0, 1, 1, 0),
(16, 1003, 'Monowar Hossain Khan', 'Donno', 'agency@gmail.com', 'bd', '01700000006', '$2y$10$uvycUE.pzSq/WKN/cxFdWeIwDrWlji8U.Sqs3gvWvygud3QNOGN76', 1, NULL, NULL, NULL, '610aace6e3724.jpeg', '/uploads/user/16/610aace6e3724.jpeg', NULL, NULL, 1, 4, 1, NULL, 1, 0, 2, '2021-08-04 07:22:48', '2021-08-26 01:07:46', 0, 0, NULL, NULL, NULL, NULL, 'Sazol Khan', 'Tongi', 1000, 0, 0, 840, 4, 5, 0, 0, 1, 0),
(17, 1004, 'Sazol Khan', 'Agent', 'agent@gmail.com', 'bd', '01700000000', '$2y$10$MuWw/4agzfMUrr.2sqatCu77Dxv5F57kwjkPVPKGKOupjSj3zTgwi', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, 1, NULL, 1, 0, 0, '2021-08-04 19:15:24', '2021-08-04 19:15:24', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Janata Road', 0, 0, 0, 0, 12, 15, 0, 0, 1, 0),
(18, 1005, 'Maidul Islam', NULL, 'maidul@gmail.com', 'bd', '01788888888', '$2y$10$ecx6SE11Em32.OBM99BwdO7/iZIl0hwwjl0v/WkIuxJGLcH28i/eS', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 'NyRKwpTmcycmN8t5lw0WbuTZbit6xZ077fLtzRtDEPsLcIvGGLHuIlsSodcQ', 1, 0, 0, '2021-08-05 20:38:54', '2022-08-03 11:40:46', 0, 1, NULL, NULL, NULL, NULL, 'Anawar', 'Mohakhali, Dhaka', 0, 0, 0, 0, 0, 5, 0, 0, 1, 1),
(19, 1006, 'Anawar Landmark', 'CEO', 'anawar@gmail.com', 'bd', '016819441266', '$2y$10$rwDftOAqpZ/HGlEj3GL9eetz9yh/gzc9jE.hkJszvjNb/.jLo1TA.', 1, NULL, NULL, NULL, '61118b935657a.jpg', '/uploads/user/19/61118b935657a.jpg', NULL, NULL, 1, 3, 1, NULL, 1, 0, 2, '2021-08-09 20:09:23', '2021-09-18 23:39:39', 0, 0, NULL, NULL, NULL, NULL, 'Anawar', 'Banani', 0, 0, 0, 0, 0, 10, 0, 1, 1, 0),
(20, 1007, 'Md Monowar', NULL, 'monowar@gmail.com', 'bd', '01681944128', '$2y$10$FW8ofpMXZSL6eetYq39LXeJrkF/W6tpab2Re3/vDaN1Fo3hL84vn6', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-08-17 18:56:16', '2021-08-17 18:56:16', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 5, 0, 0, 1, 0),
(21, 1008, 'IMAGINE PROPERTIES LTD.', 'Builder', 'imaginep@gmail.com', 'bd', '01939919000', '$2y$10$origRanuRU96nGVUMeyhuusu2uAul.M2EiKwvqoiEfdzwgDBKhefq', 1, NULL, NULL, NULL, '6127bf3da3586.jpg', '/uploads/user/21/6127bf3da3586.jpg', NULL, NULL, 1, 3, 1, NULL, 1, 0, 2, '2021-08-26 16:19:19', '2021-08-26 22:52:15', 0, 0, NULL, NULL, NULL, NULL, 'IMAGINE PROPERTIES LTD.', 'House 71, Road No.: 27, Gulshan - 1, Dhaka - 1212', 1000, 0, 0, 870, 4, 10, 0, 0, 1, 0),
(22, 1009, 'LUCKY ENGINEERING LIMITED', 'Builder', 'luckye@gmail.com', 'bd', '01312131458', '$2y$10$B1/JDEWu/YmbhhUB3yHeR.fU/Z6S0FCjK5qgqDtxx9LW3vCEiZkzu', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, NULL, 1, 0, 2, '2021-08-26 17:19:32', '2021-08-26 23:25:11', 0, 0, NULL, NULL, NULL, NULL, 'LUCKY ENGINEERING LIMITED', 'Dhaka', 1100, 0, 0, 750, 9, 10, 0, 0, 1, 0),
(23, 1010, 'Rafiqul Islam Ratul', NULL, 'rafiqul@gmail.com', 'bd', '01709659000', '$2y$10$RMslr5bNLcBZcS50ciUGUejel7Ck9rF9NYZLFISkL21m8YNKwdTYC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-08-26 20:46:22', '2021-08-26 20:46:22', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 960, 1, 1, 0, 0, 1, 0),
(24, 1011, 'RAYYAN PROPERTIES', 'Buuilder', 'rayyan@gmail.com', 'bd', '01300773000', '$2y$10$8Nq9Tu24MFjGGPoLJe3LLOw4jbSVVFVr25TmADp3KNg2NMwOzonMy', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, NULL, 1, 0, 2, '2021-08-26 20:52:01', '2021-08-27 02:53:17', 0, 0, NULL, NULL, NULL, NULL, 'RAYYAN PROPERTIES', 'Basundhara', 1000, 0, 0, 880, 4, 10, 0, 0, 1, 0),
(25, 1012, 'Purbachal Marine City', NULL, 'purbachalmarinecity@gmail.com', 'bd', '01345217032', '$2y$10$./A.yFT0s/6Ns3HMy1H.Q.TGKDRYUcro5AxROndPQaUitjIv9HLNm', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, NULL, 1, 0, 0, '2021-08-27 17:50:05', '2021-08-27 17:50:05', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 890, 3, 10, 0, 0, 1, 0),
(26, 1013, 'Dhanshiri Residence', 'Owner', 'dhanshiriresidensial@gmail.com', 'bd', '01923847564', '$2y$10$MgKpU.PSuOiBAWE0EksIEOplUcDenCEOzQ7DUkvm982siBeqA8Ta.', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, NULL, 1, 0, 0, '2021-08-27 19:17:22', '2021-08-27 19:17:22', 0, 0, NULL, NULL, NULL, NULL, 'Rifat Al Islam', 'Savar, Dhaka', 1000, 0, 0, 790, 7, 10, 0, 0, 1, 0),
(27, 1014, 'Richmond Developers Ltd.', 'Manager', 'richmonddevltd@gmail.com', 'bd', '01484773892', '$2y$10$CxGcTvpmiEy4Yj5MkfmWcOm/P4A4Pb2G.wxxb8fdi4Xzfu21ppaaG', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, NULL, 1, 0, 0, '2021-08-27 19:53:30', '2021-08-27 19:53:30', 0, 0, NULL, NULL, NULL, NULL, 'Tarikul Islam', 'Narayangonj Sadar, Narayanganj', 1000, 0, 0, 940, 2, 10, 0, 0, 1, 0),
(28, 1015, 'ismail munna', NULL, 'ismailmunna@gmail.com', 'bd', '01708042445', '$2y$10$grZBJhpmvN0M2DIjnOySn.DvLplNgmBAA/xr73s2l8aM5PFGkxir.', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-08-27 20:14:26', '2021-08-27 20:14:26', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 960, 1, 1, 0, 0, 1, 0),
(29, 1016, 'anur mia', NULL, 'anurmia@yahoo.com', 'bd', '01928374854', '$2y$10$Pf24Y.7u7ETrHkuo.vbWFeVHkOTF1ZMicm3DWY79dyMdIVtFJyjfu', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-08-27 20:23:33', '2021-08-27 20:23:33', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 970, 1, 1, 0, 0, 1, 0),
(30, 1017, 'Shah', NULL, 'shahalam232@gmail.com', 'bd', '01982737464', '$2y$10$ZGStQx0gfnJIjuAIgwxyteM9OrwkkuXVeOBxdgKweiABLsJHnpK9O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-08-27 20:34:32', '2021-08-27 20:34:32', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 970, 1, 1, 0, 0, 1, 0),
(31, 1018, 'Effat Ara', NULL, 'effat234ara@gmail.com', 'bd', '01675463792', '$2y$10$iIafRkxMKHAaqfHuAtc2HO2DLrCaU9EqeN94/5LTk7UMFVUY0FRGK', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-08-27 20:47:11', '2021-08-27 20:47:11', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Dhaka', 1000, 0, 0, 960, 1, 1, 0, 0, 1, 0),
(32, 1019, 'Minhaz', NULL, 'minhaz67263@gmail.com', 'bd', '01387654354', '$2y$10$xEhHC3NRuOfqUMVPHJjXm.9Xt8bJmzEUN1OoPPareq.B/rUOLdAQO', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 0, 0, 0, '2021-08-27 20:56:49', '2021-08-27 20:56:49', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Goc, Chittagong', 1000, 0, 0, 960, 1, 1, 0, 0, 1, 0),
(33, 1020, 'Kh Nazmul', NULL, 'khnazmul@gmail.com', 'bd', '01523647392', '$2y$10$XxQ6.sMswGHOuXNBGZfSKuT.k9YWynhtIQMON2j9oIeKEcyZkg382', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 0, 0, 0, '2021-08-27 21:03:10', '2021-08-27 21:03:10', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Gazipur', 1000, 0, 0, 960, 1, 1, 0, 0, 1, 0),
(34, 1021, 'Md. Nurul Islam', NULL, 'nurulislam453@gmail.com', 'bd', '01978541254', '$2y$10$w9RA4HLX0s77BXW9oNmDDOLcNPGU7BsxirGIj0sUGsAabHJHELdLG', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-08-28 04:40:41', '2021-08-28 04:40:41', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Mirpur', 1000, 0, 0, 960, 1, 1, 0, 0, 1, 0),
(35, 1022, 'Rayyan Properties', NULL, 'rayyanprop@gmail.com', 'bd', '01821547896', '$2y$10$7yOilca8cnBy5nq31PFXHuqBXns18dHMPrSdvS/mA8uSr1kj7ZnL6', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-08-28 04:50:22', '2021-08-28 04:50:22', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Narayanganj', 1000, 0, 0, 960, 1, 1, 0, 0, 1, 0),
(36, 1023, 'Md. Riazul Islam', NULL, 'riazulislam@gmail.com', 'bd', '01865239874', '$2y$10$/p9ThOdUVIMk.FyyW0iQsuDuCi7lv7bt.BE4.677hLN9to01hqSiu', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-08-28 05:05:35', '2021-08-28 05:05:35', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Chittagong', 1000, 0, 0, 960, 1, 1, 0, 0, 1, 0),
(37, 1024, 'Md. Abu Zahid', NULL, 'mdabuzahid902@gmail.com', 'bd', '071785421365', '$2y$10$eMIci4Hct1KR9M8zMdCFZ.c8i3NItkhVsDGegQNqp2VFowphCs0Ne', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-08-28 05:21:47', '2021-08-28 05:21:47', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 960, 1, 1, 0, 0, 1, 0),
(38, 1025, 'kazi salimuddin', NULL, 'kazisalimuddin245@gmail.com', 'bd', '01698547993', '$2y$10$RgF1/b31oSSj55/D5F3aK.LUNFrp/GuuiV51ZE693MU/H5R6jWlSC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-08-28 05:42:57', '2021-08-28 05:42:57', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 100, 0, 0, 60, 1, 1, 0, 0, 1, 0),
(39, 1026, 'Dr. Fazle Rabbi', NULL, 'fazlerabbi34@yahoo.com', 'bd', '01987541254', '$2y$10$yEGcHZKpYykom0CkWp0qZeLXDGJffbSyYqMINbt95ALaeNZ.i3HQe', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-08-28 05:47:45', '2021-08-28 05:47:45', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 950, 1, 1, 0, 0, 1, 0),
(40, 1027, 'M.S. Rana', NULL, 'ranams34@yahoo.com', 'bd', '01558745698', '$2y$10$iDHPf2rjACWpSctKgMHIge7cNOpP1wPIYgNkpVdwc8kO8QMe4g9D.', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-08-28 05:55:11', '2021-08-28 05:55:11', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 970, 1, 1, 0, 0, 1, 0),
(41, 1028, 'Post1', NULL, 'post1@gmail.com', 'bd', '0171234567', '$2y$10$mO.bH9u5e0Jx66KweEtmZer8v07X4wbMiVfVvVaLn4BLQ1IQPBWEy', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-08-30 10:10:56', '2021-08-30 10:10:56', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Jessore', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(42, 1029, 'Md Kamrul', NULL, 'kamrul@gmail.com', 'bd', '01918993427', '$2y$10$wJWBBejkhC3YDgxzVtA9Du8faKIDeIf9nYqsBKID965ctzOx9SkM.', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-02 18:18:32', '2021-09-02 18:18:32', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(43, 1030, 'kamalbuilder', NULL, 'kamalbuilder@gmail.com', 'bd', '01918993428', '$2y$10$AOQdMwVvlMDYRlIgqVwD3.7SGE3oq5i2odqVpVd0M8RZnN21Hm.8u', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, NULL, 1, 0, 0, '2021-09-05 04:10:44', '2021-09-05 04:10:44', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(44, 1031, 'Md Sakib', NULL, 'sakib@gmail.com', 'bd', '016819441111', '$2y$10$gT1W6AN1grFkIOCobJGHk.IjcSb4RFRs8kiwCseIs78FDlQVGHETS', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-11 01:47:22', '2021-09-11 01:47:22', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Dhaka', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(45, 1032, 'Multicom Industrial Solution', 'Builder', 'multicon@gmail.com', 'bd', '01701010000', '$2y$10$GpTSt.Em5H99eYYrZUW0reWu1Iz3r71AAfWDTDoari2dyA/Ea3QrC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, NULL, 1, 0, 2, '2021-09-13 21:16:31', '2021-09-13 21:28:08', 0, 0, NULL, NULL, NULL, NULL, 'Multicom Industrial Solution', 'Dhaka', 1000, 0, 0, 760, 5, 10, 0, 0, 1, 0),
(46, 1033, 'Mamunur Rashid', NULL, 'mamunur@gmail.com', 'bd', '01987701000', '$2y$10$PXBWa71gCYRilsPQYu3houTq/0qYTU9Nhm8TVX8/FyD0pfMG82u4y', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-09-13 22:19:40', '2021-09-13 22:19:40', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 960, 1, 1, 0, 0, 1, 0),
(47, 1034, 'Saif Sajjad khan', NULL, 'saif@gmail.com', 'bd', '01818352000', '$2y$10$186GSUCC7qSO9pwNK42RXO4vz1v6OV08HMjYM8iYKvPGhKzhsFqOm', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-09-13 22:24:40', '2021-09-13 22:24:40', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 950, 1, 1, 0, 0, 1, 0),
(48, 1035, 'Imtiaz Ahmed', NULL, 'imtiaz@gmail.com', 'bd', '01961118000', '$2y$10$.4inGEQtmk4jxKW8iCb/zeLshmpP8cE5S6Ebl7as.9G8.JzJ3Bi6u', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-09-13 22:36:39', '2021-09-13 22:36:39', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 960, 1, 1, 0, 0, 1, 0),
(49, 1036, 'Sheikh Rasel', NULL, 'sheikhrasel@gmail.com', 'bd', '01842174000', '$2y$10$I53OlyDoGv2W1AnTSqtyKeAv3tqaNmsPqJRSF5gUn2ObvdWp1GQLu', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-09-13 22:43:34', '2021-09-13 22:43:34', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 900, 1, 1, 0, 0, 1, 0),
(50, 1037, 'MOHAMMAD MOMINUR RAHMAN', NULL, 'mominur@gmail.com', 'bd', '01556365000', '$2y$10$mnl.Zoelx4W8k1ZBgouWgOVyyh0aH4ZJobOP4GSCxmWUgF2bzIIxC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 2, '2021-09-13 22:54:26', '2021-09-13 23:49:08', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 910, 2, 5, 0, 0, 1, 0),
(51, 1038, 'Imran Hossain Imon', NULL, 'imranimon@gmail.com', 'bd', '0170000000', '$2y$10$yuvwkBCnFobItSVhpwSwVuJRzQIOFkqO.u5z64XxiNmelk8y2jLvG', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-09-13 22:57:57', '2021-09-13 22:57:57', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 960, 1, 1, 0, 0, 1, 0),
(52, 1039, 'Md Mojibur Rahman Tuhin', NULL, 'mojibur@gmail.com', 'bd', '01797192000', '$2y$10$OgRttYWZ4k1bd/gZVW9FROmjOIHtSO4IIeClLtEFRcNlYyPFmICFe', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-09-13 23:01:59', '2021-09-13 23:01:59', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 960, 1, 1, 0, 0, 1, 0),
(53, 1040, 'S.Rahman', NULL, 'rahman@gmail.com', 'bd', '00174357000', '$2y$10$9hfdbIkEVrOxnS64B02FJurCrFVKfbHnlseJ4TQ.GmIPFQkKez5VW', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 2, '2021-09-13 23:06:19', '2021-09-13 23:12:07', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 800, 5, 5, 0, 0, 1, 0),
(54, 1041, 'Ali', NULL, 'ali@gmail.com', 'bd', '+447951117 17', '$2y$10$LN8gxVJftyGgAaIEm32JRuS3Yz7clAWrsJsT/YCeLgTnfqbyPrLvi', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-09-13 23:58:31', '2021-09-13 23:58:31', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 970, 1, 1, 0, 0, 1, 0),
(55, 1042, 'MERLIN BUILDER\'S', NULL, 'merlin@gmail.com', 'bd', '01977660000', '$2y$10$Gjc8WvkOm.Ml387zJ0i.LemezJPOjmSYphl.7Sb6gK8lOXRBLDnVW', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, NULL, 1, 0, 0, '2021-09-14 00:07:52', '2021-09-14 00:07:52', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 970, 1, 1, 0, 0, 1, 0),
(56, 1043, 'SMART PROPERTIES LTD.', 'Agency', 'smart@gmail.com', 'bd', '01755606000', '$2y$10$DCKGAbcOvol6kSzvEqPglexY9QIA9/B9WDgQA1ymyEYxknDGOWWTm', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, 1, NULL, 1, 0, 2, '2021-09-14 00:19:51', '2021-09-14 00:33:30', 0, 0, NULL, NULL, NULL, NULL, 'SMART PROPERTIES LTD.', 'Dhaka', 1000, 0, 0, 850, 5, 20, 0, 0, 1, 0),
(57, 1044, 'Md Shah Jahan Chowdhury', NULL, 'shahjahan@gmail.com', 'bd', '01819210000', '$2y$10$RKzOqFLHwJ.L2a25YUogDuUtJFj1cD/owx82wjgWbY.Jd7YCC3hwq', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-09-14 01:16:07', '2021-09-14 01:16:07', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 970, 1, 1, 0, 0, 1, 0),
(58, 1045, 'Munia Aman', NULL, 'munia@gmail.com', 'bd', '01990005000', '$2y$10$1cVFD8T6ekt1vZsH3PgyVOlkiqh.Nbna2VJ0xl5njhYK4y9uE3gRy', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-09-14 01:25:33', '2021-09-14 01:25:33', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 970, 1, 1, 0, 0, 1, 0),
(59, 1046, 'Mahamudul Hasan Nayem', NULL, 'nayem@gmail.com', 'bd', '01536108000', '$2y$10$jUuyyh4mOXiiH3wiBvk3XukeIfQc9ANLM4Tsyiyp/L.JrdVm/wt2S', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-09-14 01:42:09', '2021-09-14 01:42:09', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 970, 1, 1, 0, 0, 1, 0),
(60, 1047, 'Sahera Khatun', NULL, 'sahera@gmail.com', 'bd', '01714832000', '$2y$10$DG4yFYDSWP/KlyikUf9a8eKvMp4HFgCW/Tmr2axO8lPUC1FTBBImy', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-09-14 01:52:20', '2021-09-14 01:52:20', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 970, 1, 1, 0, 0, 1, 0),
(61, 1048, 'asif aftab', NULL, 'asif@gmail.com', 'bd', '01819408000', '$2y$10$7DVYhkEDJMw7sNCtbNwQyOktJlQ.nW6d5BE7QwkKKwsGVrVH6WGAu', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-09-14 20:21:24', '2021-09-14 20:21:24', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 960, 1, 1, 0, 0, 1, 0),
(62, 1049, 'Salim Hassan', NULL, 'salim@gmail.com', 'bd', '01799733000', '$2y$10$3S6v8vJIrLN9ELSJwNMuXuwwOHSSuuNDc39LFtX2g7BUciTEkg4sK', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-09-14 20:24:36', '2021-09-14 20:24:36', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 960, 1, 1, 0, 0, 1, 0),
(63, 1050, 'Nazmul Rahman', NULL, 'nazmul@gmail.com', 'bd', '01674379000', '$2y$10$zkVHmSUV03sZJDOZ1qlS/.8NEJ46dQUvltPP1Z7JhCRsDgd/0UqgO', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 2, '2021-09-14 20:27:39', '2021-09-14 20:30:12', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0, 0, 810, 4, 5, 0, 0, 1, 0),
(64, 1051, 'Harun Or Rashid', NULL, 'harun@gmail.com', 'bd', '01911359000', '$2y$10$lCXauGm6mEgRXqYyn9Ng5OOyjfKOjQ5Hd.rjVbB66IwKBXKCSE26W', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 2, '2021-09-14 20:41:07', '2021-09-14 20:54:32', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1100, 0, 0, 680, 9, 10, 0, 0, 1, 0),
(65, 1052, 'RUMANA PROPERTIES LTD', 'Agency', 'rumanaltd@gmail.com', 'bd', '01792090000', '$2y$10$R.6pCJRE/A0xi7a.L95fROSSzu7yaWkIrBZNlasdh3tTftenZJXgq', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, 1, NULL, 1, 0, 2, '2021-09-14 21:11:40', '2021-09-18 23:35:28', 0, 0, NULL, NULL, NULL, NULL, 'RUMANA PROPERTIES LTD', 'Dhaka', 1000, 0, 0, 940, 2, 10, 0, 1, 1, 0),
(66, 1053, 'Monowar Hossain Khan', NULL, 'mhk@gmail.com', 'bd', '01703434006', '$2y$10$5O50GDyPLw0PZLYvvpvK7uILgQ7AfwVZCXlODBVM0.GJshS/iwXES', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-14 23:05:40', '2021-09-14 23:05:40', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 10, 0, 0, 10, 0, 1, 0, 0, 1, 0),
(67, 1054, 'Rummon', NULL, 'rummon@gmail.com', 'bd', '01700000011', '$2y$10$qU8mAytwrRqnMeyyfocTy.KdmCtUuMLSnuDu4LAaUha5FVO9AtZ8O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-14 23:53:20', '2021-09-14 23:53:20', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Uttara', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(68, 1055, 'Ruman', NULL, 'ruman@gmail.com', 'bd', '01700000012', '$2y$10$qU8mAytwrRqnMeyyfocTy.KdmCtUuMLSnuDu4LAaUha5FVO9AtZ8O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-14 23:53:20', '2021-09-14 23:53:20', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Gazipur', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(69, 1056, 'Nirob', NULL, 'nirob@gmail.com', 'bd', '01700000013', '$2y$10$qU8mAytwrRqnMeyyfocTy.KdmCtUuMLSnuDu4LAaUha5FVO9AtZ8O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-14 23:53:20', '2021-09-14 23:53:20', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Sylhet', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(70, 1057, 'Monuddin', NULL, 'moinuddin@gmail.com', 'bd', '01700000014', '$2y$10$qU8mAytwrRqnMeyyfocTy.KdmCtUuMLSnuDu4LAaUha5FVO9AtZ8O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-14 23:53:20', '2021-09-14 23:53:20', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Sylhet', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(71, 1058, 'Nurul', NULL, 'nurul@gmail.com', 'bd', '01700000015', '$2y$10$qU8mAytwrRqnMeyyfocTy.KdmCtUuMLSnuDu4LAaUha5FVO9AtZ8O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-14 23:53:20', '2021-09-14 23:53:20', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Dhaka', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(72, 1059, 'Imrul', NULL, 'imrul@gmail.com', 'bd', '01700000016', '$2y$10$qU8mAytwrRqnMeyyfocTy.KdmCtUuMLSnuDu4LAaUha5FVO9AtZ8O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-14 23:53:20', '2021-09-14 23:53:20', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Khulna', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(73, 1060, 'Shihab', NULL, 'shihab@gmail.com', 'bd', '01700000017', '$2y$10$qU8mAytwrRqnMeyyfocTy.KdmCtUuMLSnuDu4LAaUha5FVO9AtZ8O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-14 23:53:20', '2021-09-14 23:53:20', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Khulna', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(74, 1061, 'Banna', NULL, 'banna@gmail.com', 'bd', '01700000018', '$2y$10$qU8mAytwrRqnMeyyfocTy.KdmCtUuMLSnuDu4LAaUha5FVO9AtZ8O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-14 23:53:20', '2021-09-14 23:53:20', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Jessore, Khulna', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(75, 1062, 'Majedul', NULL, 'majedul@gmail.com', 'bd', '01700000020', '$2y$10$qU8mAytwrRqnMeyyfocTy.KdmCtUuMLSnuDu4LAaUha5FVO9AtZ8O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-14 23:53:20', '2021-09-14 23:53:20', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Jessore, Khulna', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(76, 1063, 'Rakib Ahmed', NULL, 'rakib@gmail.com', 'bd', '01700000021', '$2y$10$qU8mAytwrRqnMeyyfocTy.KdmCtUuMLSnuDu4LAaUha5FVO9AtZ8O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-14 23:53:20', '2021-09-14 23:53:20', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Jessore, Khulna', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(77, 1064, 'Nokib Ahmed', NULL, 'nokib@gmail.com', 'bd', '01700000022', '$2y$10$qU8mAytwrRqnMeyyfocTy.KdmCtUuMLSnuDu4LAaUha5FVO9AtZ8O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-14 23:53:20', '2021-09-14 23:53:20', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Mohammadpur, Dhaka', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(78, 1065, 'Mehedi Hasan', NULL, 'mehedi@gmail.com', 'bd', '01700000023', '$2y$10$qU8mAytwrRqnMeyyfocTy.KdmCtUuMLSnuDu4LAaUha5FVO9AtZ8O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-14 23:53:20', '2021-09-14 23:53:20', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Dhaka', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(79, 1066, 'Sabbir Ahmed', NULL, 'sabbir@gmail.com', 'bd', '01700000024', '$2y$10$qU8mAytwrRqnMeyyfocTy.KdmCtUuMLSnuDu4LAaUha5FVO9AtZ8O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-14 23:53:20', '2021-09-14 23:53:20', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Ashulia', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(80, 1067, 'Raj Sarker', NULL, 'raj@gmail.com', 'bd', '01700000025', '$2y$10$qU8mAytwrRqnMeyyfocTy.KdmCtUuMLSnuDu4LAaUha5FVO9AtZ8O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-14 23:53:20', '2021-09-14 23:53:20', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Gopalganj', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(81, 1068, 'Salman Shikder', NULL, 'salmans@gmail.com', 'bd', '01700000026', '$2y$10$qU8mAytwrRqnMeyyfocTy.KdmCtUuMLSnuDu4LAaUha5FVO9AtZ8O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-14 23:53:20', '2021-09-14 23:53:20', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Golabari, Gopalganj', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(82, 1069, 'Tanima Hasan', NULL, 'tanima@gmail.com', 'bd', '01700000027', '$2y$10$qU8mAytwrRqnMeyyfocTy.KdmCtUuMLSnuDu4LAaUha5FVO9AtZ8O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-14 23:53:20', '2021-09-14 23:53:20', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Dhaka', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(83, 1070, 'Sabbir Islam', NULL, 'sabbiri@gmail.com', 'bd', '01700000028', '$2y$10$qU8mAytwrRqnMeyyfocTy.KdmCtUuMLSnuDu4LAaUha5FVO9AtZ8O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-14 23:53:20', '2021-09-14 23:53:20', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Tongi', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(84, 1071, 'Biplob Khan Beejoy', NULL, 'biplob@gmail.com', 'bd', '01700000029', '$2y$10$qU8mAytwrRqnMeyyfocTy.KdmCtUuMLSnuDu4LAaUha5FVO9AtZ8O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-14 23:53:20', '2021-09-14 23:53:20', 0, 0, NULL, NULL, NULL, NULL, NULL, 'Jamai Bazaar, Tongi', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(85, 1072, 'Hossen Forhad', NULL, 'hossenforhad23@gmail.com', 'bd', '01785421478', '$2y$10$iU5KcUUCYGAex1WnurVJTO343Xia1qvXeXjK12dEAjp6tpNlea7Ne', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-19 01:30:22', '2021-09-19 01:30:22', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(86, 1073, 'Mahmud Hasan', NULL, 'mahmudhasan232@gmail.com', 'bd', '01965214785', '$2y$10$K2i5tARYZ81Mg9Onn2aIbOvYEXmGMSNdTgolhbLpmmCL1kXdNTroe', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-19 01:37:00', '2021-09-19 01:37:00', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(87, 1074, 'Jahangir Babu', NULL, 'jahangirbabu2@gmail.com', 'bd', '01398545752', '$2y$10$BdW6Lgyxq9fRFeW8gocuMOTKD1RvnblnEZINWGpDp4iCa0Ofpsn8y', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-19 01:38:11', '2021-09-19 01:38:11', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(88, 1075, 'Hasan Masud', NULL, 'hasanmasudhm@yahoo.com', 'bd', '01652147856', '$2y$10$lgq2UV6pTwDshI6pm1witOodddVcMbTDg2gjFS3SU4XUe3sjyTvH.', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-19 01:39:49', '2021-09-19 01:39:49', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(89, 1076, 'Kazi Sabbir Mia', NULL, 'kazisabbirmia@gmail.com', 'bd', '01821457657', '$2y$10$FzvfSX3ObZB1Ex4FaZ6FfOOQFYD8Euvhg6fhHSl6/QOEePP4/Yg5O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-19 01:40:39', '2021-09-19 01:40:39', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(90, 1077, 'Rezaul Karim Molla', NULL, 'rezaulkarimmolla33@gmail.com', 'bd', '019754121458', '$2y$10$ESqG.RXBXrQx9UTxPcUDi.1J2IlmuPRSFVLJYMUCo0PuJHP4stm8m', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-19 01:41:37', '2021-09-19 01:41:37', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(91, 1078, 'Ashikur Rahman Polash', NULL, 'rahmanashikurpolash@gmail.com', 'bd', '01487541236', '$2y$10$gLHPeVmudmeafuncpOMgWOrcoubriT3mQkJpTBCPH2brYabA8rVQO', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-19 01:43:35', '2021-09-19 01:43:35', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(92, 1079, 'Sirazul Islam', NULL, 'sirazul1980islam@yahoo.com', 'bd', '01554789651', '$2y$10$1iU7g.ILdAeRX9mDFVyvne.H5Q7OeoEe0mNsc3r/g0ctSjsQwy4JO', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-19 01:45:26', '2021-09-19 01:45:26', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(93, 1080, 'Tarek Mahmud', NULL, 'tarekmahmud2022@gmail.com', 'bd', '01687452139', '$2y$10$RsAg/BzgnyqCPPhSAOspYOIJaojoBvZH.0KLyG1eQpDIVjeLMybOa', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-19 01:46:37', '2021-09-19 01:46:37', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(94, 1081, 'Mostafizur Rahman', NULL, 'mostafizurrahman2234@gmail.com', 'bd', '01654125896', '$2y$10$I9bm.oV.GhnqhoGahIZ/lerSzFJuZlxju9bbr3sMbnZfW.OXicI3q', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-19 01:48:31', '2021-09-19 01:48:31', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(95, 1082, 'Md Rakib', NULL, 'manik@gmail.com', 'bd', '01918994327', '$2y$10$N5eudqWzuNo6kQvwhFjhgeWB8fIlj8OhnMIrdQfyQRisndHDnVj3.', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-22 21:14:49', '2021-09-22 21:14:49', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(96, 1083, 'Kamal', NULL, 'kamala@gmail.com', 'bd', '7896524123', '$2y$10$e41xhGZxUVHsacovvSJWxeocICRVdI427y18Jshv/nhR79Jf1UQ9W', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-09-22 21:53:56', '2021-09-22 21:53:56', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 50, 0, 0, 50, 0, 1, 0, 0, 1, 0),
(97, 1084, 'Rony', NULL, 'rony@gmail.com', 'bd', '01990572321', '$2y$10$IjHBy4ZFEA64bT93CB6uyehYXn3i4rYUVmye1ZxsOQg3EjzV2CbQa', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2021-10-10 12:49:01', '2021-10-10 12:49:01', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 110, 0, 0, 110, 0, 1, 0, 0, 1, 0),
(101, 1085, 'Kamrul', NULL, 'kamrul1@gmail.com', 'usa', '01990572322', '$2y$10$0mPd3b7t9bXBF3hcCW3fiu0szuAhe7BYLGQWvbmMur4Wv6L6.tiC.', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2021-10-10 15:55:55', '2021-10-10 15:55:55', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 500, 0, 0, 500, 0, 1, 0, 0, 1, 0),
(102, 1086, '01916962118', NULL, '01916962118', 'bd', '01916962118', '$2y$10$B05fPctUMabnMuKsGjjzN.CYMpNLG2zjVdBa9o96/f2CRBmpLS1f.', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-10 00:38:02', '2022-05-10 00:38:02', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(103, 1087, '0156', NULL, '0156', 'bd', '0156', '$2y$10$SdYZa.F/wkdwV6m0CRYlD.q7pNxFB.F1XkO4LFq5mpa9DSnvHSlTm', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-10 23:42:47', '2022-05-10 23:42:47', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(104, 1088, '01521108118', NULL, '01521108118', 'bd', '01521108118', '$2y$10$BEjqM4ZpYYNNzd59gC5nRuuLJWLIPxpt8FfM2f6pWsLwj5bmcqllq', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 09:53:05', '2022-05-11 09:53:05', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(105, 1089, '015521108118', NULL, '015521108118', 'bd', '015521108118', '$2y$10$/ULUs4H7xm7.FSYK80LTTemQ.fx8rP6TuhZ8fjk8Ur0faIlKUAw0O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 12:06:40', '2022-05-11 12:06:40', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(106, 1090, '01965986545', NULL, '01965986545', 'bd', '01965986545', '$2y$10$6BhumtDywPgQCDXDqDchd.j1vuzfGATZAzdSJsVDY2UIHpHkHXKo.', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 17:25:27', '2022-05-11 17:25:27', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(107, 1091, '01916962119', NULL, '01916962119', 'bd', '01916962119', '$2y$10$oduJUljgKqe3pN7j39y9yeO939j4tZZBMi4UUBPrOLtZoR37p6lOC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 17:30:07', '2022-05-11 17:30:07', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(108, 1092, '01589665555', NULL, '01589665555', 'bd', '01589665555', '$2y$10$rmGxadmfp1M8ha/q6xD8COEkkU.Wtwu51ClRopgdhfzttjA5IQZju', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 17:57:13', '2022-05-11 17:57:13', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(109, 1093, '0191696589865', NULL, '0191696589865', 'bd', '0191696589865', '$2y$10$.5tTjicmd7MmmQzKsgQle.J.Xa7YdVGeX0xY6VCTzcHB6RbI1FY42', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 18:04:40', '2022-05-11 18:04:40', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(110, 1094, '01569896655', NULL, '01569896655', 'bd', '01569896655', '$2y$10$8FiF8EL4GeqRy4sV1uGknOm1Phhh3m6WJNzfH5tlZrr2PvtC5vkHa', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 18:08:12', '2022-05-11 18:08:12', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(111, 1095, '015698554896', NULL, '015698554896', 'bd', '015698554896', '$2y$10$s4mIthWBh/rgf3BHbXz2oeO.HYvKo2J0.V3RtbrE8HWqBRjk0..li', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 18:17:46', '2022-05-11 18:17:46', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(112, 1096, '01589658845', NULL, '01589658845', 'bd', '01589658845', '$2y$10$uXxizi5urulwBrwlqHRINebkMRAZlPE9PsCG9FMVH45EQUGeKsjB.', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 18:23:08', '2022-05-11 18:23:08', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(113, 1097, '018965986899', NULL, '018965986899', 'bd', '018965986899', '$2y$10$jbtctgHr5UkcXq4oHiixeeKBMT4miGj3JI2gO.GjLK5JTKwmrHqSG', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 18:26:12', '2022-05-11 18:26:12', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(114, 1098, '018965455255', NULL, '018965455255', 'bd', '018965455255', '$2y$10$I9fmOmcv3zvqsKTqrlOZm.YTLuamT1sKgfXu8ol6Iy/koytcfAsQ.', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 18:28:28', '2022-05-11 18:28:28', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(115, 1099, '01963698595', NULL, '01963698595', 'bd', '01963698595', '$2y$10$wTaE5KZFdLKpUPtua2.JPO950v6p02g9LuqpRD9PkvL2u3P5YOXTC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 18:32:27', '2022-05-11 18:32:27', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(116, 1100, '0194569865555', NULL, '0194569865555', 'bd', '0194569865555', '$2y$10$BmuJrAtiLnAo9EvhrvhCHeq2uflA0V9VdW3kIEGJEkQpehHPZo1W6', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 18:34:10', '2022-05-11 18:34:10', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(117, 1101, '04568956565', NULL, '04568956565', 'bd', '04568956565', '$2y$10$gO2893DrL7.qBWU.Wlmy2OjLg8iVXYEuPxsvLiRb6xGxdObh.iUNq', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 18:41:21', '2022-05-11 18:41:21', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(118, 1102, '0156985698', NULL, '0156985698', 'bd', '0156985698', '$2y$10$VdNaFlW7rv4/AVoWn0k/x.r7XqoLxQS4uCQDZLV8Ugf0Lr18se/ki', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 18:43:11', '2022-05-11 18:43:11', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(119, 1103, '01598698656', NULL, '01598698656', 'bd', '01598698656', '$2y$10$MpGvqiG.kfVVgMxwZum4qeiasjnjwkuhnajRMHW8U4Ieg/CpTLIzy', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 18:50:03', '2022-05-11 18:50:03', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(120, 1104, '01598686556', NULL, '01598686556', 'bd', '01598686556', '$2y$10$.awwMHHrzYcXseqxPzIiFejd7a2rMyY4HfJnphZV/Rf.uah/Z0dxG', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 18:52:09', '2022-05-11 18:52:09', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(121, 1105, '0156986598', NULL, '0156986598', 'bd', '0156986598', '$2y$10$NmYBJmVon2E1WzfqZBQKDeyPythqpOsLxkwLfneQAcYJ0mzuKZxYm', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 19:02:39', '2022-05-11 19:02:39', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(122, 1106, '0154585655', NULL, '0154585655', 'bd', '0154585655', '$2y$10$wg7s9zb0w7JhJfCVlnCWuuICz3d1c2DXe2etnAGhWL3klTxypG61K', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 19:33:24', '2022-05-11 19:33:24', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(123, 1107, '01456989655', NULL, '01456989655', 'bd', '01456989655', '$2y$10$agCfPO38DK9Wo/hgE1NPjuSI/d4PmnNLYZPJy9FsQApE0Yd8ficvO', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 19:34:01', '2022-05-11 19:34:01', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(124, 1108, '015896589878', NULL, '015896589878', 'bd', '015896589878', '$2y$10$D824uc4ha/kHk0ewgkKiluEkhrhEBRmtvH2Zj1QLmiLFcOEUj42G6', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 20:19:57', '2022-05-11 20:19:57', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(125, 1109, '01598658895', NULL, '01598658895', 'bd', '01598658895', '$2y$10$a5uRvlZoPpG/brVaQzI3tOTLhWdGcAhHkv3xBo4cLB9xhbnszKULe', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 20:20:32', '2022-05-11 20:20:32', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(126, 1110, '01589689756', NULL, '01589689756', 'bd', '01589689756', '$2y$10$z8rxj0xxynXuX1xUk3IaLeFGqf/IEDHfv0VXNfl81fcZa2W3kULtu', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 20:29:30', '2022-05-11 20:29:30', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(127, 1111, '0156899655', NULL, '0156899655', 'bd', '0156899655', '$2y$10$WCRiw8Wh6QtaPS3C/bIUqO0S28uxXbBHuNeyMsdH.cAAG4BXq6R8S', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 20:33:34', '2022-05-11 20:33:34', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(128, 1112, '0158965545', NULL, '0158965545', 'bd', '0158965545', '$2y$10$nMo/RSZkayOjpVfy5gTYHuo8.u2u5n6e.TaBYuyJrFr2sGjfoOrDS', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 20:34:33', '2022-05-11 20:34:33', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(129, 1113, '01589654865', NULL, '01589654865', 'bd', '01589654865', '$2y$10$hUYGLiHaqokwT61LpMIAQe8de35zz4cgqohMQGSN//wlV7C64D.4W', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 20:36:50', '2022-05-11 20:36:50', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(130, 1114, '01546565444', NULL, '01546565444', 'bd', '01546565444', '$2y$10$u7a6CeGUjXATh7isd5OGJ.9L/43Xry8c1feFC4iHM7cxw3IRnqFIG', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-11 22:14:00', '2022-05-11 22:14:00', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(131, 1115, '0168', NULL, '0168', 'bd', '0168', '$2y$10$jVGbN7xXh3C/mLUONsRS7O5a//XWq/5uk//SrnJdkqG9dp4TA0DDC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-19 00:07:06', '2022-05-19 00:07:06', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(132, 1116, '+880168194411', NULL, '+880168194411', 'bd', '+880168194411', '$2y$10$Nzij.qre/v9F/SrKrBcxlOj8YKcVIElHA.pip5L7dWbQkWS4Dxop2', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-19 21:44:56', '2022-05-19 21:44:56', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(133, 1117, '+880168194412', NULL, '+880168194412', 'bd', '+880168194412', '$2y$10$WdKAJfgdmqRw64.169pMRel41CVSqX3gNxSfqKG2RKlW5IdW0480K', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-19 21:45:43', '2022-05-19 21:45:43', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(134, 1118, '+8801681944126', NULL, '+8801681944126', 'bd', '+8801681944126', '$2y$10$mOBD49pDHrbzIrpBGc7QtOlpYBZKOdvQc1Sk/lIhD1AAd/oBS8aEC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-19 22:18:37', '2022-05-19 22:18:37', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(135, 1119, 'Maidul', NULL, 'maidul1@gmail.com', 'bd', '016819944126', '$2y$10$VCkhJUCkzNl9tzvRdPlslucRxckqkCrP.kgJSw9Fa8NCLK8No.61i', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-05-22 13:51:24', '2022-05-22 13:51:24', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(136, 1120, NULL, NULL, NULL, 'bd', '01681944116', '$2y$10$Br1O32PGZBdUKdHPMW0PtujLEKEVnMQLdK3VF6xsUbrvuJTWLeO6O', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-06-12 00:50:37', '2022-06-12 00:50:37', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(137, 1121, NULL, NULL, NULL, 'bd', '01681944129', '$2y$10$0OUQ4z65h1eIO9.DFtIF/uJfAZkEm7PlBZ2EnyAOX1lnuZS9hrjJa', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-06-12 00:54:27', '2022-06-12 00:54:27', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(138, 1122, 'Maidul', NULL, 'maidul1@gmail.com', 'bd', '01117888888', '$2y$10$e9ABYcZ0.1pwrHnZN9pHV.3RJNARP9Hs12ya3aMOd5.KrRW8pXbuq', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 'K5BhC6aSun0LrCn8OTHlQApAjIoyoLzu7vmHvQdhvMfKFHKmkyG4nG3cDSle', 1, 0, 0, '2022-06-14 00:55:01', '2022-06-14 00:55:01', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(139, 1123, 'Maidul', NULL, 'maidul1@gmail.com', 'bd', '7983798502', '$2y$10$DhTImnB9sDj7w3mffu0LLO2JC4MKxATTJthG6PEj67cwHlqGEwPGC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-06-14 01:28:01', '2022-06-14 01:28:01', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(140, 1124, 'Maidul', NULL, 'maidul1@gmail.com', 'bd', '01681944126', '$2y$10$f0yvYmG1rr8jvOuLVGA3POfhdTRoRY7JMos5/gqob6U.z.CHZC.HC', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 'eB1oFuay8FrIu1ZBYByMjL3IEFk6JIrrDT4nnSAkmZnaBN0WuYmQSjguXXqT', 1, 0, 0, '2022-06-14 01:58:54', '2022-06-14 01:58:54', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(141, 1125, 'Maidul', NULL, 'maidul1@gmail.com', 'bd', '01781631681', '$2y$10$hYvN8qBjDoPVHkmoIykNdOBk1Jz.xFfIoEhZIOX9iQOogHP.gyRDe', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-06-14 02:13:10', '2022-06-14 02:13:10', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(142, 1126, 'Maidul', NULL, 'maidul.tech@gmail.com', 'bd', '01781944126', '$2y$10$xuneolBCH8Mt.AzBSTn8X.uDjxhB5milIPuXfjnmV4eYcCly69646', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-06-14 22:34:30', '2022-06-14 22:34:30', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(143, 1127, 'Maidul', NULL, 'maidul.tech@gmail.com', 'bd', '0188888', '$2y$10$CCHHHW1oT2Bc5Daq1Z.nzed3yjbJfjQSadm3T.Sb72EK.EPJBkz1S', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-06-21 16:51:45', '2022-06-21 16:51:45', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(144, 1128, 'Maidul', NULL, 'maidul.tech@gmail.com', 'bd', '0188888111', '$2y$10$rKvkyvZUgrj3FU7mmsa.Z.PM9R3ik7OLxB/YU/ftVOhp5dwv2OJYy', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-06-21 16:51:57', '2022-06-21 16:51:57', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(145, 1129, 'Maidul', NULL, 'maidul.tech@gmail.com', 'bd', '0168194412', '$2y$10$3rwLj24H2LzRDc/fk5EbYudQdILdO6.ai9lzWpBF.naYIUfcyaT5i', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, 0, 0, '2022-06-21 16:52:13', '2022-06-21 16:52:13', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(146, 1130, 'Suh', NULL, 'mahibc1@gmail.com', 'bd', '9038318520', '$2y$10$3JU4iw/cxYDblwW0N9evaeFiGpoV6xYdyRgbsdeUL95HQ90qb0pri', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '27jBfyFwN5ZLcdu347gewzzyIETsXAOZ9jYzYZcij1UbtOoiKd2gIlFBflTI', 1, 0, 0, '2022-06-21 17:12:58', '2022-06-21 17:12:58', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 10, 0, 0, 10, 0, 1, 0, 0, 1, 0),
(147, 1131, 'Maidul', NULL, 'xyz4@gmail.com', 'bd', '01681944133', '$2y$10$yN6XJkWHfVbmGc.8eTnmQuqHm8whOu4k4V3trgoZV8g7Dvil.sB52', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, 0, 0, '2022-08-03 10:53:48', '2022-08-03 10:53:48', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(148, 1132, 'RAK', 'Admin', 'rak@gmail.com', 'bd', '01681944111', '$2y$10$bqIEd0RMBlcveL5V7VYoZOYCuX62hGNjuDYryJu0Q1xini1K6WqM6', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, 'mKIrpyS6Z6AXqbRmyB6FT7dbTomoFljOhRItHEkRl6z4ljIFXBiKKxKVgGsh', 1, 0, 0, '2022-08-03 16:26:37', '2022-08-03 16:27:06', 0, 1, NULL, NULL, NULL, NULL, 'Jaman', 'Dhaka', 100, 0, 0, 100, 0, 1, 0, 0, 1, 1);

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `before_users_insert` BEFORE INSERT ON `users` FOR EACH ROW begin
declare var_code int default 0;

select ifnull(max(code),1000) into var_code
from users;
set new.code = var_code+1 ;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `id` int(11) NOT NULL,
  `f_user_no` int(11) DEFAULT NULL,
  `meta_title` varchar(200) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `about_company` text DEFAULT NULL,
  `site_url` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `shop_open_time` varchar(100) DEFAULT NULL,
  `shop_close_time` varchar(100) DEFAULT NULL,
  `working_days` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `f_user_no`, `meta_title`, `meta_description`, `about_company`, `site_url`, `logo`, `banner`, `shop_open_time`, `shop_close_time`, `working_days`) VALUES
(1, 19, 'Anawar Landmark', 'test', 'Anawar Landmark', 'https://www.prothomalo.com/', '/uploads/owner/19/img_10082021_6112bd1bec8f6.jpg', '/uploads/images/owner/19/img_10082021_6112bd1becca8.jpg', '08:00', '04:00', '[\"2\",\"3\"]'),
(2, 15, 'Apartment', 'ff', 'xcvcv', 'www.google.com', NULL, NULL, '02:17', '02:18', '[\"0\",\"1\",\"2\",\"4\",\"5\"]'),
(3, 16, 'Company Name', 'Donno', 'Donno', 'http://company.com', NULL, NULL, '16:00', '04:00', '[\"1\",\"2\",\"3\"]'),
(4, 21, 'IMAGINE PROPERTIES LTD.', 'IMAGINE PROPERTIES LTD.', 'About', 'http://company.com', NULL, NULL, '10:00', '22:19', '[\"0\",\"1\",\"2\",\"3\",\"4\"]'),
(5, 22, 'LUCKY ENGINEERING LIMITED', 'It’s a company build with trust & Quality LUCKY ENGINEERING LTD. (LEL) since 1993 At Lalmatia. We did a lots of projects. Providing clients a complete product with no loose ends for years to come is our end goal. A powerful portfolio of the country’s most distinctive and selective developments, with an excellent reputation in the Real Estate market, and enviable relationships that give our clients exclusive access to the ultimate in luxury apartments and exquisite commercial spaces, all in prime locations of Dhaka city. It is the commitment to both impeccably high standards and attention to detail that drive us to our success.   Our existing customers are the brand ambassadors of our products. Whether it be a Landowner or a Buyer, focusing on customer service is our 100% priority. We always try to keep our promises. Finally, when clients experience our product, they refer it to their friends and families.', 'It’s a company build with trust & Quality LUCKY ENGINEERING LTD. (LEL) since 1993 At Lalmatia. We did a lots of projects. Providing clients a complete product with no loose ends for years to come is our end goal. A powerful portfolio of the country’s most distinctive and selective developments, with an excellent reputation in the Real Estate market, and enviable relationships that give our clients exclusive access to the ultimate in luxury apartments and exquisite commercial spaces, all in prime locations of Dhaka city. It is the commitment to both impeccably high standards and attention to detail that drive us to our success.   Our existing customers are the brand ambassadors of our products. Whether it be a Landowner or a Buyer, focusing on customer service is our 100% priority. We always try to keep our promises. Finally, when clients experience our product, they refer it to their friends and families.', 'http://company.com', '/uploads/owner/22/img_27082021_6127f5ee67ac7.jpg', NULL, '11:00', '16:25', '[\"0\",\"1\",\"2\",\"3\",\"4\"]'),
(6, 24, 'RAYYAN PROPERTIES', 'As a real estate owner our management team brings unmatched insights to property and leasing management that lead the market in increasing property value and decreasing operating expenses . Our unique , flexible strategies and our history of increasing the value of managed assets is proven. So you will get the most out of your building’s story now and for years to come.', 'As a real estate owner our management team brings unmatched insights to property and leasing management that lead the market in increasing property value and decreasing operating expenses . Our unique , flexible strategies and our history of increasing the value of managed assets is proven. So you will get the most out of your building’s story now and for years to come.', 'http://company.com', NULL, NULL, '03:52', '03:52', '[\"1\",\"2\",\"3\",\"4\"]'),
(7, 38, NULL, NULL, NULL, NULL, NULL, NULL, '11:48', '05:48', '[\"0\",\"1\",\"2\",\"3\",\"4\",\"5\"]'),
(8, 45, 'Multicom Industrial Solution', 'Multicom Industrial Solution', 'Multicom Industrial Solution', NULL, NULL, NULL, '09:30', '08:30', '[\"0\",\"1\",\"2\"]'),
(9, 53, NULL, NULL, NULL, NULL, NULL, NULL, '12:11', '11:11', '[\"1\",\"2\",\"4\"]'),
(10, 50, NULL, NULL, NULL, NULL, NULL, NULL, '11:49', '12:49', '[\"0\",\"1\",\"2\",\"3\",\"4\",\"6\"]'),
(11, 56, 'SMART PROPERTIES LTD.', 'Smart Group as a leading group of Companies in Bangladesh, Smart Properties Limited as a sister Concern of this Group has been established as a real estate company and it emerge within a very short span of time as one of the Dynamic Developers in specializing in superior quality residential as well as commercial developments within Dhaka city. Our traditional business model is based on the accomplishment of properties in the real estate market. We give personal attention to the details of building design, construction and turnkey basis project construction work, while providing day-to-day hands-on management. We specialize in the Development of joint venture Corporate Commercial and Residential Building complexes. We always ensure the building meets or exceeds client expectations.', 'Smart Group as a leading group of Companies in Bangladesh, Smart Properties Limited as a sister Concern of this Group has been established as a real estate company and it emerge within a very short span of time as one of the Dynamic Developers in specializing in superior quality residential as well as commercial developments within Dhaka city. Our traditional business model is based on the accomplishment of properties in the real estate market. We give personal attention to the details of building design, construction and turnkey basis project construction work, while providing day-to-day hands-on management. We specialize in the Development of joint venture Corporate Commercial and Residential Building complexes. We always ensure the building meets or exceeds client expectations.', 'https://www.smartpropertiesbd.com/', NULL, NULL, '12:33', '12:33', '[\"0\",\"1\",\"2\",\"3\",\"4\"]'),
(12, 63, NULL, NULL, NULL, NULL, NULL, NULL, '08:30', '08:30', '[\"1\",\"3\"]'),
(13, 64, NULL, NULL, NULL, NULL, NULL, NULL, '08:46', '12:46', '[\"0\",\"1\",\"2\",\"3\",\"4\"]'),
(14, 65, 'RUMANA PROPERTIES LTD', 'RUMANA PROPERTIES LTD', 'RUMANA PROPERTIES LTD', 'http://company.com', NULL, NULL, '09:13', '08:13', '[\"0\",\"1\",\"2\",\"3\",\"4\"]'),
(15, 101, NULL, NULL, NULL, NULL, NULL, NULL, '04:04', '04:04', '[\"1\"]'),
(16, 147, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 148, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, 'null');

-- --------------------------------------------------------

--
-- Table structure for table `web_page_category`
--

CREATE TABLE `web_page_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_active` int(1) DEFAULT 1,
  `meta_keywards` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `order_id` int(5) DEFAULT NULL,
  `f_created_by` int(4) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `f_modified_by` int(4) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `property_for` varchar(50) DEFAULT NULL COMMENT 'sell,rent,roommate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `web_page_category`
--

INSERT INTO `web_page_category` (`id`, `name`, `is_active`, `meta_keywards`, `meta_description`, `order_id`, `f_created_by`, `created_on`, `f_modified_by`, `modified_on`, `property_for`) VALUES
(1, 'FLAT AND APARTMENT', 0, 'FLAT AND APARTMENT', 'FLAT AND APARTMENT', 100, 2, '2021-08-18 00:20:27', 2, '2021-08-23 23:38:31', 'sell'),
(2, 'LAND AND PLOAT', 1, 'LAND AND PLOAT', 'LAND AND PLOAT', 101, 2, '2021-08-23 21:21:59', NULL, '2021-08-23 21:21:59', 'sell'),
(3, 'OFFICE SPACE', 1, 'OFFICE SPACE', 'OFFICE SPACE', 102, 2, '2021-08-23 21:22:17', NULL, '2021-08-23 21:22:17', 'sell'),
(4, 'FLAT AND APARTMENT', 1, 'FLAT AND APARTMENT', 'FLAT AND APARTMENT', 103, 2, '2021-08-23 21:22:32', NULL, '2021-08-23 21:22:32', 'rent'),
(5, 'LAND AND PLOAT', 1, 'LAND AND PLOAT', 'LAND AND PLOAT', 104, 2, '2021-08-23 21:22:53', NULL, '2021-08-23 21:22:53', 'rent'),
(6, 'OFFICE SPACE', 1, 'OFFICE SPACE', 'OFFICE SPACE', 105, 2, '2021-08-23 21:23:09', 2, '2021-08-23 21:23:28', 'rent'),
(7, 'FLAT AND APARTMENT', 1, 'FLAT AND APARTMENT', 'FLAT AND APARTMENT', 100, 2, '2021-08-18 00:20:27', 2, '2021-08-23 21:23:19', 'roommate'),
(8, 'LAND AND PLOAT', 1, 'LAND AND PLOAT', 'LAND AND PLOAT', 101, 2, '2021-08-23 21:21:59', NULL, '2021-08-23 21:21:59', 'roommate'),
(9, 'OFFICE SPACE', 1, 'OFFICE SPACE', 'OFFICE SPACE', 102, 2, '2021-08-23 21:22:17', NULL, '2021-08-23 21:22:17', 'roommate');

-- --------------------------------------------------------

--
-- Table structure for table `web_search_pages`
--

CREATE TABLE `web_search_pages` (
  `id` int(11) NOT NULL,
  `f_page_category_no` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `url_slug` varchar(255) NOT NULL,
  `search_url` varchar(200) DEFAULT NULL,
  `image_path` varchar(100) DEFAULT NULL,
  `is_bottom_view` int(1) DEFAULT 1,
  `order_id` tinyint(5) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywards` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `modified_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `f_created_by` int(4) DEFAULT NULL,
  `f_modified_by` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `web_search_pages`
--

INSERT INTO `web_search_pages` (`id`, `f_page_category_no`, `title`, `url_slug`, `search_url`, `image_path`, `is_bottom_view`, `order_id`, `meta_description`, `meta_keywards`, `is_active`, `modified_at`, `created_at`, `f_created_by`, `f_modified_by`) VALUES
(1, 1, 'Apartment and flat sale in Dhaka', 'http://bdflatpanel.local/page/123', 'http://bdflatpanel.local/page/123', '/uploads/pages/6123be54bb758.jpg', 1, 10, 'Apartment and flat sale in Dhaka', 'Apartment and flat sale in Dhaka', 1, '2021-08-23 21:27:16', '2021-08-23 21:27:16', 2, NULL),
(2, 4, 'Apartment and flat sale in Dhaka', 'http://bdflatpanel.local/page/apartment', NULL, NULL, 1, 100, 'Apartment and flat sale in Dhaka', 'Apartment and flat sale in Dhaka', 1, '2021-08-23 22:16:42', '2021-08-23 22:16:28', 2, 2),
(3, 5, 'Apartment and flat sale in Dhaka', 'http://bdflatpanel.local/page/apartment', NULL, NULL, 1, 100, 'Apartment and flat sale in Dhaka', 'Apartment and flat sale in Dhaka', 1, '2021-08-23 22:16:42', '2021-08-23 22:16:28', 2, 2),
(4, 2, 'Apartment and flat sale in Dhaka', 'http://bdflatpanel.local/page/apartment', NULL, NULL, 1, 100, 'Apartment and flat sale in Dhaka', 'Apartment and flat sale in Dhaka', 1, '2021-08-23 22:16:42', '2021-08-23 22:16:28', 2, 2),
(5, 3, 'Apartment and flat sale in Dhaka', 'http://bdflatpanel.local/page/apartment', NULL, NULL, 1, 100, 'Apartment and flat sale in Dhaka', 'Apartment and flat sale in Dhaka', 1, '2021-08-23 22:16:42', '2021-08-23 22:16:28', 2, 2),
(6, 6, 'Apartment and flat sale in Dhaka', 'http://bdflatpanel.local/page/apartment', NULL, NULL, 1, 100, 'Apartment and flat sale in Dhaka', 'Apartment and flat sale in Dhaka', 1, '2021-08-23 22:16:42', '2021-08-23 22:16:28', 2, 2),
(7, 7, 'Apartment and flat sale in Dhaka', 'http://bdflatpanel.local/page/apartment', NULL, NULL, 1, 100, 'Apartment and flat sale in Dhaka', 'Apartment and flat sale in Dhaka', 1, '2021-08-23 22:16:42', '2021-08-23 22:16:28', 2, 2),
(8, 8, 'Apartment and flat sale in Dhaka', 'http://bdflatpanel.local/page/apartment', NULL, NULL, 1, 100, 'Apartment and flat sale in Dhaka', 'Apartment and flat sale in Dhaka', 1, '2021-08-23 22:16:42', '2021-08-23 22:16:28', 2, 2),
(9, 9, 'Apartment and flat sale in Dhaka', 'http://bdflatpanel.local/page/123', 'http://bdflatpanel.local/page/123', '/uploads/pages/6123be54bb758.jpg', 1, 10, 'Apartment and flat sale in Dhaka', 'Apartment and flat sale in Dhaka', 1, '2021-08-23 21:27:16', '2021-08-23 21:27:16', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

CREATE TABLE `web_settings` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `site_name` varchar(155) NOT NULL,
  `description` text DEFAULT NULL,
  `header_logo` varchar(255) DEFAULT NULL,
  `footer_logo` varchar(255) DEFAULT NULL,
  `app_logo` varchar(255) DEFAULT NULL,
  `meta_image` varchar(255) DEFAULT NULL,
  `favicon` varchar(200) DEFAULT NULL,
  `phone_1` varchar(15) DEFAULT NULL,
  `phone_2` varchar(15) DEFAULT NULL,
  `email_1` varchar(100) DEFAULT NULL,
  `email_2` varchar(100) DEFAULT NULL,
  `hq_address` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `facebook_url` varchar(150) DEFAULT NULL,
  `twitter_url` varchar(150) DEFAULT NULL,
  `instagram_url` varchar(150) DEFAULT NULL,
  `youtube_url` varchar(150) DEFAULT NULL,
  `pinterest_url` varchar(150) DEFAULT NULL,
  `whats_app` varchar(150) DEFAULT NULL,
  `fb_app_id` varchar(150) DEFAULT NULL,
  `facebook_secret_id` varchar(150) DEFAULT NULL,
  `google_map` text DEFAULT NULL,
  `google_app_id` varchar(100) DEFAULT NULL,
  `google_client_id` varchar(150) DEFAULT NULL,
  `google_client_secret` varchar(150) DEFAULT NULL,
  `android_app_link` varchar(255) DEFAULT NULL,
  `android_app_version` varchar(200) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywards` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `analytic_id` varchar(50) DEFAULT NULL,
  `language_id` tinyint(1) DEFAULT NULL,
  `f_ss_created_by` int(4) DEFAULT NULL,
  `ss_created_on` datetime DEFAULT NULL,
  `f_ss_modified_by` int(4) DEFAULT NULL,
  `ss_modified_on` datetime DEFAULT NULL,
  `iphone_app_link` varchar(200) DEFAULT NULL,
  `iphone_app_version` varchar(10) DEFAULT NULL,
  `copyright_text` varchar(255) DEFAULT NULL,
  `feature_property_limit` int(11) DEFAULT 0,
  `verified_property_limit` int(11) DEFAULT 0,
  `sale_property_limit` int(11) DEFAULT 0,
  `rent_property_limit` int(11) DEFAULT 0,
  `roommate_property_limit` int(11) DEFAULT 0,
  `similar_property_limit` int(11) DEFAULT 0,
  `listing_lead_claimed_time` int(11) DEFAULT 0,
  `seeker_bonus_balance` int(11) DEFAULT NULL COMMENT 'initial bonus balance for seeker',
  `owner_bonus_balance` int(11) DEFAULT NULL COMMENT 'initial bonus balance for owner,builder,agency',
  `default_ci_price` float NOT NULL DEFAULT 0,
  `app_mode` enum('local','live') NOT NULL,
  `web_public_url` varchar(255) DEFAULT NULL,
  `admin_public_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `web_settings`
--

INSERT INTO `web_settings` (`id`, `title`, `site_name`, `description`, `header_logo`, `footer_logo`, `app_logo`, `meta_image`, `favicon`, `phone_1`, `phone_2`, `email_1`, `email_2`, `hq_address`, `url`, `facebook_url`, `twitter_url`, `instagram_url`, `youtube_url`, `pinterest_url`, `whats_app`, `fb_app_id`, `facebook_secret_id`, `google_map`, `google_app_id`, `google_client_id`, `google_client_secret`, `android_app_link`, `android_app_version`, `meta_title`, `meta_keywards`, `meta_description`, `analytic_id`, `language_id`, `f_ss_created_by`, `ss_created_on`, `f_ss_modified_by`, `ss_modified_on`, `iphone_app_link`, `iphone_app_version`, `copyright_text`, `feature_property_limit`, `verified_property_limit`, `sale_property_limit`, `rent_property_limit`, `roommate_property_limit`, `similar_property_limit`, `listing_lead_claimed_time`, `seeker_bonus_balance`, `owner_bonus_balance`, `default_ci_price`, `app_mode`, `web_public_url`, `admin_public_url`) VALUES
(1, 'BDFLAT', '', 'Lorem ipsum dolor, sit, amet consectetur adipisicing elit. A quibusdam nisi corrupti minus architecto at impedit amet repudiandae voluptate sed.', NULL, NULL, NULL, NULL, 'assets/img/favicon.png', '01918993427', NULL, 'info@bdflat.com', NULL, 'Unit 1A, House 01, Road 02, Block A Banani C/A, Dhaka 1213', 'https://bdflat.com', 'https://facebook.com', 'https://twitter.com', 'https://instagram.com', 'httsp://youtube.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bdflat', 5, 5, 5, 5, 5, 5, 24, 100, 500, 10, 'local', 'http://localhost/test/bdflat/public/', 'http://localhost/test/bdflat_panel/public/');

-- --------------------------------------------------------

--
-- Table structure for table `web_slider`
--

CREATE TABLE `web_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `subtitle` varchar(20) DEFAULT NULL,
  `banner` varchar(200) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `url_link` varchar(200) DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `is_feature` int(1) DEFAULT 0,
  `is_active` int(1) DEFAULT 1,
  `created_by` int(4) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` int(4) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  `position` tinyint(2) DEFAULT 1,
  `mobile_banner` varchar(200) DEFAULT NULL,
  `mobile_image_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='WEB_WHATSAPP' ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `web_slider`
--

INSERT INTO `web_slider` (`id`, `title`, `subtitle`, `banner`, `image_name`, `url_link`, `order_by`, `is_feature`, `is_active`, `created_by`, `created_on`, `modified_by`, `modified_on`, `position`, `mobile_banner`, `mobile_image_name`) VALUES
(2, 'Coming Soon', 'Coming Soon', '/uploads/banner/prod_20082021_611eb3c9433a1.jpg', 'prod_20082021_611eb3c9433a1.jpg', 'https://www.bdhousing.com/', 1, 1, 1, 2, '2021-08-20 01:40:57', NULL, NULL, 1, NULL, NULL),
(3, 'This bdhousing', 'This bdhousing', '/uploads/banner/prod_20082021_611eb6e466370.jpg', 'prod_20082021_611eb6e466370.jpg', 'https://www.bdhousing.com/', 2, 1, 1, 2, '2021-08-20 01:54:12', NULL, NULL, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_customer_payments`
--
ALTER TABLE `acc_customer_payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_acc_customer_payments` (`slip_number`);

--
-- Indexes for table `acc_customer_transaction`
--
ALTER TABLE `acc_customer_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc_payment_bank_acc`
--
ALTER TABLE `acc_payment_bank_acc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_acc_payment_bank_acc` (`bank_name`,`bank_acc_name`,`bank_acc_no`);

--
-- Indexes for table `acc_payment_methods`
--
ALTER TABLE `acc_payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_acc_payment_methods` (`name`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prd_ads`
--
ALTER TABLE `prd_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prd_ads_images`
--
ALTER TABLE `prd_ads_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prd_floor_list`
--
ALTER TABLE `prd_floor_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prd_listings`
--
ALTER TABLE `prd_listings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_code` (`code`),
  ADD UNIQUE KEY `u_url_slug` (`url_slug`);

--
-- Indexes for table `prd_listings_seo`
--
ALTER TABLE `prd_listings_seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prd_listing_additional_info`
--
ALTER TABLE `prd_listing_additional_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prd_listing_features`
--
ALTER TABLE `prd_listing_features`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_url_slug` (`url_slug`);

--
-- Indexes for table `prd_listing_images`
--
ALTER TABLE `prd_listing_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prd_listing_type`
--
ALTER TABLE `prd_listing_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prd_listing_variants`
--
ALTER TABLE `prd_listing_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prd_listing_view`
--
ALTER TABLE `prd_listing_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prd_nearby`
--
ALTER TABLE `prd_nearby`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_url_slug` (`url_slug`);

--
-- Indexes for table `prd_property_condition`
--
ALTER TABLE `prd_property_condition`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_url_slug` (`url_slug`);

--
-- Indexes for table `prd_property_facing`
--
ALTER TABLE `prd_property_facing`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_url_slug` (`url_slug`);

--
-- Indexes for table `prd_property_type`
--
ALTER TABLE `prd_property_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_url_slug` (`url_slug`);

--
-- Indexes for table `prd_requirements`
--
ALTER TABLE `prd_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `ss_area`
--
ALTER TABLE `ss_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ss_area_city` (`f_city_no`);

--
-- Indexes for table `ss_city`
--
ALTER TABLE `ss_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ss_listing_price`
--
ALTER TABLE `ss_listing_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ss_user_type`
--
ALTER TABLE `ss_user_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_mobile` (`mobile_no`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_page_category`
--
ALTER TABLE `web_page_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_search_pages`
--
ALTER TABLE `web_search_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_settings`
--
ALTER TABLE `web_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_slider`
--
ALTER TABLE `web_slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_customer_payments`
--
ALTER TABLE `acc_customer_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `acc_customer_transaction`
--
ALTER TABLE `acc_customer_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `acc_payment_bank_acc`
--
ALTER TABLE `acc_payment_bank_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `acc_payment_methods`
--
ALTER TABLE `acc_payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prd_ads`
--
ALTER TABLE `prd_ads`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prd_ads_images`
--
ALTER TABLE `prd_ads_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prd_floor_list`
--
ALTER TABLE `prd_floor_list`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prd_listings`
--
ALTER TABLE `prd_listings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `prd_listings_seo`
--
ALTER TABLE `prd_listings_seo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `prd_listing_additional_info`
--
ALTER TABLE `prd_listing_additional_info`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `prd_listing_features`
--
ALTER TABLE `prd_listing_features`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prd_listing_images`
--
ALTER TABLE `prd_listing_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `prd_listing_type`
--
ALTER TABLE `prd_listing_type`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prd_listing_variants`
--
ALTER TABLE `prd_listing_variants`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;

--
-- AUTO_INCREMENT for table `prd_listing_view`
--
ALTER TABLE `prd_listing_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `prd_nearby`
--
ALTER TABLE `prd_nearby`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prd_property_condition`
--
ALTER TABLE `prd_property_condition`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prd_property_facing`
--
ALTER TABLE `prd_property_facing`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prd_property_type`
--
ALTER TABLE `prd_property_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prd_requirements`
--
ALTER TABLE `prd_requirements`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ss_area`
--
ALTER TABLE `ss_area`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `ss_city`
--
ALTER TABLE `ss_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ss_listing_price`
--
ALTER TABLE `ss_listing_price`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ss_user_type`
--
ALTER TABLE `ss_user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `web_page_category`
--
ALTER TABLE `web_page_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `web_search_pages`
--
ALTER TABLE `web_search_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `web_settings`
--
ALTER TABLE `web_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_slider`
--
ALTER TABLE `web_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ss_area`
--
ALTER TABLE `ss_area`
  ADD CONSTRAINT `fk_ss_area_city` FOREIGN KEY (`f_city_no`) REFERENCES `ss_city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
