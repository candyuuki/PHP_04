-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2020 年 11 月 05 日 23:46
-- サーバのバージョン： 5.7.26
-- PHP のバージョン: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `cafe`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `cafe_table`
--

CREATE TABLE `cafe_table` (
  `id` int(12) NOT NULL,
  `cafeName` varchar(64) NOT NULL,
  `cafeUrl` text NOT NULL,
  `comment` varchar(140) DEFAULT NULL,
  `reputation` varchar(12) DEFAULT NULL,
  `date` datetime NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `cafe_table`
--

INSERT INTO `cafe_table` (`id`, `cafeName`, `cafeUrl`, `comment`, `reputation`, `date`, `img`) VALUES
(79, 'Piggy back cafe', 'https://www.instagram.com/piggybackcafe/?hl=ja', 'レインボーなラテが可愛かった♡', '5', '2020-11-01 03:56:59', '2020103118565962A66FDF-DDE2-4A5D-95F7-6F05305E8AA2.jpg'),
(83, 'LATTEST', 'http://lattest.jp', 'チャコールラテがめずらしくて、美味しかった！', '5', '2020-11-01 05:13:25', '20201031201325IMG_3052.JPG'),
(92, 'Piggy back cafe', 'https://www.instagram.com/piggybackcafe/?hl=ja', 'カラフルなラテが可愛かった♡', '5', '2020-11-05 23:33:27', '2020110514332762A66FDF-DDE2-4A5D-95F7-6F05305E8AA2.jpg'),
(93, '下灘珈琲', 'https://tabelog.com/ehime/A3801/A380103/38011835/', '景色がいいところで飲むコーヒーは最高だった！', '5', '2020-11-05 23:44:00', '20201105144400IMG_5637.JPG');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `cafe_table`
--
ALTER TABLE `cafe_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `cafe_table`
--
ALTER TABLE `cafe_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
