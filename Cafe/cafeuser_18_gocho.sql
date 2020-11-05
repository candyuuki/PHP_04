-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2020 年 11 月 05 日 23:48
-- サーバのバージョン： 5.7.26
-- PHP のバージョン: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `cafe`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `cafe_user_table`
--

CREATE TABLE `cafe_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(64) NOT NULL,
  `kanri_flg` varchar(10) NOT NULL,
  `life_flg` int(1) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `cafe_user_table`
--

INSERT INTO `cafe_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`, `date`) VALUES
(20, 'たなか', 'yyyyyy', '0000', '管理者', 0, '2020-11-03 20:41:30'),
(25, 'たかはし', 'aaaaa', '0000', 'ユーザー', 0, '2020-11-05 22:59:56'),
(26, 'スティーブ', 'test1', '0000', '管理者', 0, '2020-11-05 23:00:29');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `cafe_user_table`
--
ALTER TABLE `cafe_user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `cafe_user_table`
--
ALTER TABLE `cafe_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
