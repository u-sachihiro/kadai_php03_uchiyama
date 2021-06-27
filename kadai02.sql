-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 27, 2021 at 09:34 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kadai02`
--

-- --------------------------------------------------------

--
-- Table structure for table `kadai02_a_table`
--

CREATE TABLE `kadai02_a_table` (
  `id` int(12) NOT NULL,
  `filename` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `filedate` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `tag1` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tag2` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tag3` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filelink` varchar(356) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mcgroup` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `dept` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `PIC` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kadai02_a_table`
--

INSERT INTO `kadai02_a_table` (`id`, `filename`, `filedate`, `content`, `tag1`, `tag2`, `tag3`, `filelink`, `mcgroup`, `dept`, `PIC`, `email`, `indate`) VALUES
(1, 'X市場調査資料', '2021年6月', '', 'X市場', '日本', 'Z社', NULL, '未選択', 'タイヤ部', '内山', 'test@test.jp', '2021-06-20 19:59:25'),
(2, 'X市場調査資料', '2021年6月', NULL, 'X市場', '日本', 'Z社', NULL, 'コンシューマー産業グループ', 'タイヤ部', '内山', 'test@test.jp', '2021-06-20 20:12:45'),
(3, 'X市場調査資料', '2021年6月', NULL, 'X市場', '日本', 'Z社', NULL, 'コンシューマー産業グループ', 'タイヤ部', '内山', 'test@test.jp', '2021-06-20 20:13:19'),
(4, 'X市場調査資料', '2021年6月', NULL, 'X市場', '日本', 'Z社', 'test.com', 'コンシューマー産業グループ', 'タイヤ部', '内山', 'u_sachihiro@yahoo.co.jp', '2021-06-20 20:46:44'),
(5, 'X市場調査資料', '2021年6月', 'テストテキスト', 'テスト', '日本', 'Z社', 'test.com', 'コンシューマー産業グループ', 'タイヤ部', '内山', 'test@test.com', '2021-06-20 21:53:18'),
(6, 'Y社ヒアリングメモ', '2021年6月', 'テストテキスト', 'Y社', '自動車', '日本', 'testtest.jp', 'コンシューマー産業グループ', 'タイヤ部', '内山', 'test@test.jp', '2021-06-20 21:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `kadai03_user_table`
--

CREATE TABLE `kadai03_user_table` (
  `id` int(12) NOT NULL,
  `u_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `u_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `u_pw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `life_flg` int(1) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kadai03_user_table`
--

INSERT INTO `kadai03_user_table` (`id`, `u_name`, `u_id`, `u_pw`, `life_flg`, `indate`) VALUES
(1, 'u_sachihiro', 'u_sachihiro', 'test', 0, '2021-06-26 17:08:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kadai02_a_table`
--
ALTER TABLE `kadai02_a_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kadai03_user_table`
--
ALTER TABLE `kadai03_user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kadai02_a_table`
--
ALTER TABLE `kadai02_a_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kadai03_user_table`
--
ALTER TABLE `kadai03_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
