-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-05-17 07:50:02
-- 伺服器版本: 10.1.13-MariaDB
-- PHP 版本： 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `class_system`
--

-- --------------------------------------------------------

--
-- 資料表結構 `classtab`
--

CREATE TABLE `classtab` (
  `No` int(10) NOT NULL,
  `ClassID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ClassName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Year` int(4) NOT NULL,
  `School` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Department` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Note` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `classtab`
--

INSERT INTO `classtab` (`No`, `ClassID`, `ClassName`, `Year`, `School`, `Department`, `Note`) VALUES
(1, 'csie001', '資訊工程學士班', 100, '國立宜蘭大學', '電機資訊學院', '無'),
(2, 'fs001', '食品科學學士班', 100, '國立宜蘭大學', '生物資源學系', '無'),
(3, 'AS001', '動物系學士班', 101, '國立宜蘭大學', '生物資源學院', '新班級'),
(4, 'csie002', '資訊工程學士班', 101, '國立宜蘭大學', '電機資訊學院', '無');

-- --------------------------------------------------------

--
-- 資料表結構 `coursetab`
--

CREATE TABLE `coursetab` (
  `No` int(10) NOT NULL,
  `CourseID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `CourseName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `coursetab`
--

INSERT INTO `coursetab` (`No`, `CourseID`, `CourseName`, `Note`) VALUES
(1, 'FS001', '自然科學', ''),
(2, 'CCS001', '程式設計一', '人氣課程＊＊＊＊＊'),
(3, 'CCS002', '程式語言', NULL),
(4, 'CCS003', '電腦視覺', NULL),
(5, 'CCS004', '行動裝置程式設計', NULL),
(6, 'CFS001', '食品加工', NULL),
(7, 'CAS001', '生物概論', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `registrationtab`
--

CREATE TABLE `registrationtab` (
  `No` int(20) NOT NULL,
  `Year` int(20) NOT NULL,
  `Season` int(2) NOT NULL,
  `CourseID` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TeacherID` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ClassID` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `registrationtab`
--

INSERT INTO `registrationtab` (`No`, `Year`, `Season`, `CourseID`, `TeacherID`, `ClassID`) VALUES
(15, 102, 0, 'CCS002', 'T001', 'csie001'),
(16, 101, 2, 'CCS002', 'T002', 'csie001'),
(17, 100, 1, 'CCS001', 'T003', 'fs001'),
(18, 101, 0, 'CCS003', 'T002', 'csie001'),
(19, 100, 1, 'CCS001', 'T004', 'csie001'),
(21, 102, 2, 'CCS004', 'T004', 'csie001');

-- --------------------------------------------------------

--
-- 資料表結構 `studenttab`
--

CREATE TABLE `studenttab` (
  `No` int(10) NOT NULL,
  `StudnetID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `StudentName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ClassID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TELE` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Addr` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Note` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `studenttab`
--

INSERT INTO `studenttab` (`No`, `StudnetID`, `StudentName`, `ClassID`, `TELE`, `Email`, `Addr`, `Note`) VALUES
(1, 'b0044024', '蔡德里', 'csie001', '09587654321', 'a597314@gmail.com', '彰化', '無'),
(2, 'b0044002', '陳曉明', 'csie001', '0988765432', 'gg123@gmail.com', '宜蘭', ''),
(3, 'b0043008', '王小華', 'fs001', '0952645852', 'wang810802@gmail.com', '台北', ''),
(4, 'b0043009', '陳美美', 'fs001', '0954565758', 'chenmm2001@gmail.com', '台北', ''),
(5, 'b0033009', '張仙生', 'AS001', '0953899777', 'chang100@gmail.com', '台中', ''),
(6, 'b0033012', '葉素材', 'AS001', '0989665500', 'yaya800@gmail.com', '南投', ''),
(43, 'AS001', '問圍城', 'AS001', '0953765432', 'Aaqqgmail', 'La', '');

-- --------------------------------------------------------

--
-- 資料表結構 `teachertab`
--

CREATE TABLE `teachertab` (
  `No` int(10) NOT NULL,
  `TeacherID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TeacherName` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `TELE` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `NOTE` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `teachertab`
--

INSERT INTO `teachertab` (`No`, `TeacherID`, `TeacherName`, `Email`, `TELE`, `NOTE`) VALUES
(1, 'T001', '馬得利', 'a123456@gmail.com', '0987654321', '測試機器人'),
(2, 'T002', '馬英', 'horse09@gmail.com', '098989898989', '跑啊'),
(3, 'T003', '馬雲', 'alibaba@gmail.com', '09588888888', '愛網購'),
(4, 'T004', '黃朝東', 'east8080@gmail.com', '09882233445', ''),
(5, 'T005', '劉昂興', 'food100@yahoo.com.tw', '0958866448', '');

-- --------------------------------------------------------

--
-- 資料表結構 `yeartab`
--

CREATE TABLE `yeartab` (
  `No` int(11) NOT NULL,
  `Year` int(11) DEFAULT NULL,
  `Season` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Note` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `yeartab`
--

INSERT INTO `yeartab` (`No`, `Year`, `Season`, `Note`) VALUES
(1, 100, '上', '建校百年紀念'),
(4, 101, '下', '建國百年紀念'),
(8, 102, '上', '奧運年');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `classtab`
--
ALTER TABLE `classtab`
  ADD PRIMARY KEY (`ClassID`),
  ADD UNIQUE KEY `No` (`No`);

--
-- 資料表索引 `coursetab`
--
ALTER TABLE `coursetab`
  ADD PRIMARY KEY (`CourseID`),
  ADD UNIQUE KEY `No` (`No`);

--
-- 資料表索引 `registrationtab`
--
ALTER TABLE `registrationtab`
  ADD PRIMARY KEY (`No`);

--
-- 資料表索引 `studenttab`
--
ALTER TABLE `studenttab`
  ADD PRIMARY KEY (`StudnetID`),
  ADD UNIQUE KEY `No` (`No`);

--
-- 資料表索引 `teachertab`
--
ALTER TABLE `teachertab`
  ADD PRIMARY KEY (`TeacherID`),
  ADD UNIQUE KEY `No` (`No`);

--
-- 資料表索引 `yeartab`
--
ALTER TABLE `yeartab`
  ADD UNIQUE KEY `No` (`No`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `classtab`
--
ALTER TABLE `classtab`
  MODIFY `No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- 使用資料表 AUTO_INCREMENT `coursetab`
--
ALTER TABLE `coursetab`
  MODIFY `No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用資料表 AUTO_INCREMENT `registrationtab`
--
ALTER TABLE `registrationtab`
  MODIFY `No` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- 使用資料表 AUTO_INCREMENT `studenttab`
--
ALTER TABLE `studenttab`
  MODIFY `No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- 使用資料表 AUTO_INCREMENT `teachertab`
--
ALTER TABLE `teachertab`
  MODIFY `No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用資料表 AUTO_INCREMENT `yeartab`
--
ALTER TABLE `yeartab`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
