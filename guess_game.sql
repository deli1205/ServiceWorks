-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-05-17 07:47:32
-- 伺服器版本: 10.1.13-MariaDB
-- PHP 版本： 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `guess_game`
--

-- --------------------------------------------------------

--
-- 資料表結構 `rank`
--

CREATE TABLE `rank` (
  `No` int(10) NOT NULL,
  `Name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Time` int(30) NOT NULL,
  `Cnt` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `rank`
--

INSERT INTO `rank` (`No`, `Name`, `Time`, `Cnt`) VALUES
(1, 'lulu', 77, 6),
(3, 'fook', 53, 7),
(5, 'JC', 439, 22),
(7, 'lulu', 86, 7),
(8, '豆漿', 138, 13),
(11, '1111', 237, 22),
(12, '林靖雯', 209, 17),
(13, 'andy', 151, 9),
(14, '1111', 145, 28),
(15, 'LIS', 152, 15),
(16, 'turtle', 94, 9),
(17, 'Cindy', 89, 9),
(18, '小孩', 194, 18),
(19, '展', 264, 14),
(20, 'Wei', 145, 19),
(21, 'Wei', 60, 8),
(22, '565', 155, 12),
(23, '123456789', 143, 12),
(24, '( ´_ゝ`)', 479, 18),
(25, '草泥馬', 51, 8),
(26, 'qwe', 512, 31),
(27, '陳則慎', 171, 13),
(28, 'roy', 352, 18),
(29, '侯皓元', 208, 6),
(30, '偉翔', 56, 7),
(31, 'fooooook', 39, 8),
(32, '偉翔', 55, 8),
(33, '骨頭', 187, 13),
(34, '????', 121, 7),
(35, '老大', 183, 13),
(36, 'p哥', 344, 23),
(37, '宏哥', 395, 21),
(38, '陳彥廷', 139, 9),
(39, '666666666666666666666666666', 110, 16),
(40, 'pola', 157, 16),
(41, '123', 113, 9),
(42, '珊', 171, 13),
(43, 'po祥', 70, 5),
(44, '阿星', 169, 6),
(45, '張育愷', 288, 28),
(46, '白邊', 311, 27),
(47, 'Tim', 158, 9),
(48, '-.-', 136, 8),
(49, 'Hiroki', 42, 3),
(50, 'qqqq', 88, 9),
(51, 'motherfucker', 211, 21),
(52, 'yee', 64, 8),
(53, '風火輪', 253, 18),
(54, 'yee', 107, 15),
(55, 'ddsdsd', 112, 12),
(56, 'ＮＩＵＥＥ', 130, 10),
(57, '彭宣繻', 15, 2),
(58, 'Ａlice', 221, 24),
(59, '羽', 168, 19),
(60, '597', 567, 39),
(61, '小建', 226, 14),
(62, '增', 100, 6),
(63, 'ＰＰ', 279, 9),
(64, 'c', 365, 19),
(65, '谭梦洁', 555, 32),
(66, 'wei', 172, 16),
(67, 'chi', 303, 20),
(68, '神奇寶貝大師', 210, 14),
(69, 'lllll', 329, 30),
(70, '嗨', 556, 32),
(71, 'stans', 217, 15),
(72, 'mmm', 225, 10),
(73, 'aaa', 210, 10),
(74, 'chiao', 217, 7),
(75, '拱', 366, 23),
(76, '西瓜', 148, 10),
(77, '77', 298, 34),
(78, '徐向陽', 67, 6),
(79, 'hmjm', 360, 12),
(80, '鵝鵝', 129, 18),
(81, '鳥哥', 29, 5),
(82, 'qq', 90, 9),
(83, '鵝鵝', 24, 5),
(84, '????', 193, 10),
(85, '????', 39, 5),
(86, 'w', 132, 19),
(87, '進步了', 160, 10),
(88, '！！！', 112, 9),
(89, '干', 204, 22),
(90, '????', 97, 8),
(91, 'mei', 165, 6),
(92, '獵艷馬', 78, 7),
(93, '', 0, 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`No`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `rank`
--
ALTER TABLE `rank`
  MODIFY `No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
