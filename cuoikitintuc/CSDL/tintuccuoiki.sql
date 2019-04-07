-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 07, 2019 lúc 11:50 AM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tintuccuoiki`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `Id` int(10) UNSIGNED NOT NULL,
  `Idusers` int(10) UNSIGNED NOT NULL,
  `Idtintuc` int(10) UNSIGNED NOT NULL,
  `NoiDungCM` varchar(300) COLLATE utf8_vietnamese_ci NOT NULL,
  `Created` datetime DEFAULT NULL,
  `Updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`Id`, `Idusers`, `Idtintuc`, `NoiDungCM`, `Created`, `Updated`) VALUES
(1, 1, 2, 'a', NULL, NULL),
(2, 1, 2, 'bc', NULL, NULL),
(3, 2, 2, 'wow', NULL, NULL),
(4, 2, 3, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitin`
--

CREATE TABLE `loaitin` (
  `Id` int(10) UNSIGNED NOT NULL,
  `Idtheloai` int(10) UNSIGNED NOT NULL,
  `Ten` varchar(300) COLLATE utf8_vietnamese_ci NOT NULL,
  `TenKhongDau` varchar(300) COLLATE utf8_vietnamese_ci NOT NULL,
  `Created` datetime DEFAULT NULL,
  `Updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitin`
--

INSERT INTO `loaitin` (`Id`, `Idtheloai`, `Ten`, `TenKhongDau`, `Created`, `Updated`) VALUES
(1, 1, 'BÃ³ng Ä‘Ã¡ trong nÆ°á»›c', 'Bong-da-trong-nuoc', NULL, NULL),
(2, 1, 'BÃ³ng Ä‘Ã¡ tháº¿ giá»›i', 'Bong-da-the-gioi', NULL, NULL),
(3, 2, 'Sao viá»‡t ', 'Sao-Viet', NULL, NULL),
(4, 2, 'Sao Tháº¿ Giá»›i', 'Sao-The-Gioi', NULL, NULL),
(5, 3, 'EU-Nga', 'EU-Nga', NULL, NULL),
(6, 3, 'ChÃ¢u Ã‚u', 'Chau-Au', NULL, NULL),
(7, 4, 'ChÃ­nh Trá»‹', 'Chinh-Tri', NULL, NULL),
(8, 4, 'Giao ThÃ´ng ', 'Giao-Thong', NULL, NULL),
(9, 4, 'MÃ´i trÆ°á»ng', 'Moi-Truong', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `Id` int(15) UNSIGNED NOT NULL,
  `Ten` varchar(300) COLLATE utf8_vietnamese_ci NOT NULL,
  `TenKhongDau` varchar(300) COLLATE utf8_vietnamese_ci NOT NULL,
  `Created` datetime DEFAULT NULL,
  `Updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`Id`, `Ten`, `TenKhongDau`, `Created`, `Updated`) VALUES
(1, 'BÃ³ng Ä‘Ã¡', 'Bong-Da', NULL, NULL),
(2, 'Sao', 'Sao', NULL, NULL),
(3, 'Tháº¿ giá»›i', 'The-Gioi\r\n', NULL, NULL),
(4, 'XÃ£ Há»™i', 'Xa-hoi', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `Id` int(10) UNSIGNED NOT NULL,
  `TieuDe` varchar(300) COLLATE utf8_vietnamese_ci NOT NULL,
  `TieuDeKhongDau` varchar(300) COLLATE utf8_vietnamese_ci NOT NULL,
  `TomTat` text COLLATE utf8_vietnamese_ci NOT NULL,
  `NoiDung` longtext COLLATE utf8_vietnamese_ci NOT NULL,
  `HinhAnh` varchar(300) COLLATE utf8_vietnamese_ci NOT NULL,
  `NoiBat` int(11) NOT NULL DEFAULT '0',
  `SoLuotXem` int(11) NOT NULL DEFAULT '0',
  `Idloaitin` int(10) UNSIGNED NOT NULL,
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`Id`, `TieuDe`, `TieuDeKhongDau`, `TomTat`, `NoiDung`, `HinhAnh`, `NoiBat`, `SoLuotXem`, `Idloaitin`, `Created`, `Updated`) VALUES
(1, 'Messi vÆ°á»£t Casillas, Ä‘á»™c chiáº¿m má»™t ká»· lá»¥c á»Ÿ La Liga', 'Bong-da', 'TrÆ°á»›c tráº­n Ä‘áº¥u trÃªn sÃ¢n Nou Camp hÃ´m qua, Lionel Messi vÃ  Iker Casillas Ä‘á»“ng giá»¯ ká»· lá»¥c vá» sá»‘ tráº­n tháº¯ng táº¡i La Liga, vá»›i 334 tráº­n má»—i ngÆ°á»i. Nhá» káº¿t quáº£ 2-0 trÆ°á»›c Atletico Madrid, Messi Ä‘Ã£ vÆ°á»£t lÃªn thá»§ mÃ´n huyá»n thoáº¡i cá»§a Real Madrid, trá»Ÿ thÃ nh cáº§u thá»§ cÃ³ nhiá»u tráº­n tháº¯ng nháº¥t táº¡i giáº£i VÄQG TÃ¢y Ban Nha.', 'KhÃ´ng chá»‰ vÆ°á»£t qua Casillas, Messi cÃ²n gÃ¢y áº¥n tÆ°á»£ng máº¡nh vá» tá»‘c Ä‘á»™ cháº¡m Ä‘áº¿n ká»· lá»¥c. Thá»§ mÃ´n cá»§a Real Madrid cáº§n tá»›i 510 láº§n ra sÃ¢n Ä‘á»ƒ cÃ³ 334 tráº­n tháº¯ng. Trong khi Ä‘Ã³, tháº¯ng lá»£i trÆ°á»›c Atletico hÃ´m qua má»›i lÃ  tráº­n La Liga thá»© 447 cá»§a Messi cÃ¹ng Barca, Ä‘á»“ng nghÄ©a vá»›i viá»‡c Ä‘á»™i chá»§ sÃ¢n Nou Camp Ä‘áº¡t tá»· lá»‡ tháº¯ng tá»›i 75% trong cÃ¡c tráº­n Ä‘áº¥u cÃ³ siÃªu sao ngÆ°á»i Argentina gÃ³p máº·t. \r\n\r\nBÃ n tháº¯ng cá»§a Messi vÃ o lÆ°á»›i Atletico Madrid hÃ´m qua Ä‘áº¿n trong má»™t pha pháº£n cÃ´ng nhanh máº«u má»±c á»Ÿ phÃºt 86. Tiá»n Ä‘áº¡o Ä‘á»™i trÆ°á»Ÿng Barca thoÃ¡t xuá»‘ng bÃªn cÃ¡nh pháº£i, loáº¡i má»™t háº­u vá»‡ Ä‘á»‘i phÆ°Æ¡ng, rá»“i bÃ¬nh tÄ©nh sá»­a bÃ³ng vÃ o gÃ³c gáº§n lÃ m bÃ³ tay thá»§ mÃ´n Jan Oblak.\r\n\r\nPha lÃ m bÃ n nÃ y cá»§a Messi cá»™ng vá»›i bÃ n má»Ÿ tá»· sá»‘ cá»§a Suarez trÆ°á»›c Ä‘Ã³ hai phÃºt, giÃºp Barca cÃ³ tháº¯ng lá»£i quan trá»ng trÃªn Ä‘Æ°á»ng Ä‘ua vÃ´ Ä‘á»‹ch La Liga. Messi vÃ  Ä‘á»“ng Ä‘á»™i ná»›i rá»™ng cÃ¡ch biá»‡t vá»›i chÃ­nh Atletico - Ä‘ang xáº¿p nhÃ¬ báº£ng - lÃªn thÃ nh 11 Ä‘iá»ƒm. Khoáº£ng cÃ¡ch giá»¯a Barca vá»›i Real xáº¿p thá»© ba lÃ  13 Ä‘iá»ƒm. Vá»›i báº£y vÃ²ng Ä‘áº¥u cÃ²n láº¡i, trá»« khi cÃ³ báº¥t ngá» quÃ¡ lá»›n, Barca cÃ³ cÆ¡ há»™i lá»›n Ä‘á»ƒ báº£o vá»‡ ngÃ´i bÃ¡u La Liga.\r\n\r\nCÃ¡c bÃ n vÃ o lÆ°á»›i Atletico hÃ´m qua cÅ©ng giÃºp Messi vÃ  Suarez cá»§ng cá»‘ vá»‹ tháº¿ cá»§a há» trong cuá»™c Ä‘ua phÃ¡ lÆ°á»›i. Messi cÃ³ 33 bÃ n, dáº«n Ä‘áº§u. Suarez Ä‘á»©ng thá»© hai vá»›i 20 bÃ n. ', 'tinvit.jpg', 1, 1, 2, '2017-12-11 03:25:25', '2019-04-07 04:18:09'),
(2, 'Neville: \'Van Dijk chÆ¡i ngang bá»‘n ngÆ°á»i', 'Neville: \'Van Dijk choi ngang bon nguoi', '\"Van Dijk quÃ¡ hay\", Gary Neville nÃ³i trÃªn kÃªnh Sky Sports. \"TÃ´i nhÃ¬n vÃ o nhá»¯ng cáº§u thá»§ lá»›n trong suá»‘t sá»± nghiá»‡p cá»§a mÃ¬nh, nhÆ° Jaap Stam, Gary Pallister, Rio Ferdinand..., vÃ  Van Dijk lÃ  máº«u cáº§u thá»§ khiáº¿n má»i ngÆ°á»i yÃªn tÃ¢m. Cáº­u áº¥y lÃ m cÃ´ng viá»‡c cá»§a cáº£ bá»‘n háº­u vá»‡. TÃ´i nghÄ© Sergio Ramos vÃ  Varane lÃ  nhá»¯ng ngÆ°á»i hay nháº¥t gáº§n Ä‘Ã¢y nhÆ°ng Van Dijk xá»©ng Ä‘Ã¡ng á»Ÿ ngang táº§m\".', '\"Van Dijk quÃ¡ hay\", Gary Neville nÃ³i trÃªn kÃªnh Sky Sports. \"TÃ´i nhÃ¬n vÃ o nhá»¯ng cáº§u thá»§ lá»›n trong suá»‘t sá»± nghiá»‡p cá»§a mÃ¬nh, nhÆ° Jaap Stam, Gary Pallister, Rio Ferdinand..., vÃ  Van Dijk lÃ  máº«u cáº§u thá»§ khiáº¿n má»i ngÆ°á»i yÃªn tÃ¢m. Cáº­u áº¥y lÃ m cÃ´ng viá»‡c cá»§a cáº£ bá»‘n háº­u vá»‡. TÃ´i nghÄ© Sergio Ramos vÃ  Varane lÃ  nhá»¯ng ngÆ°á»i hay nháº¥t gáº§n Ä‘Ã¢y nhÆ°ng Van Dijk xá»©ng Ä‘Ã¡ng á»Ÿ ngang táº§m\".\r\n\r\nTrung vá»‡ ngÆ°á»i HÃ  Lan lÃ  cáº§u thá»§ phÃ²ng ngá»± Ä‘áº¯t giÃ¡ nháº¥t tháº¿ giá»›i khi khiáº¿n Liverpool bá» ra 99 triá»‡u Ä‘Ã´la chiÃªu má»™ tá»« Southampton. Van Dijk Ä‘Ã£ chÆ¡i 31 tráº­n á»Ÿ Ngoáº¡i háº¡ng Anh mÃ¹a nÃ y, giÃºp Liverpool theo Ä‘uá»•i chá»©c vÃ´ Ä‘á»‹ch quá»‘c gia sau gáº§n ba tháº­p niÃªn.\r\n\r\n\"Cáº­u áº¥y cÃ³ thá»ƒ Ä‘Ã¡nh Ä‘áº§u, kháº£ nÄƒng phÃ²ng ngá»± xuáº¥t sáº¯c vÃ  kiá»ƒm soÃ¡t vÃ  chuyá»n bÃ³ng khÃ´ng khÃ¡c tiá»n vá»‡. TÃ´i cháº¯c cháº¯n 100% lÃ  cáº­u áº¥y sáº½ giÃ nh danh hiá»‡u Cáº§u thá»§ hay nháº¥t nÄƒm. KhÃ´ng cÃ³ Ä‘á»‘i thá»§ nÃ o cáº¡nh tranh Ä‘Æ°á»£c vá»›i Van Dijk\", Neville nháº¥n máº¡nh.\r\n\r\nLáº§n cuá»‘i cÃ¹ng má»™t ngÆ°á»i chÆ¡i á»Ÿ hÃ ng phÃ²ng ngá»± giÃ nh danh hiá»‡u Cáº§u thá»§ hay nháº¥t nÄƒm bÃ³ng Ä‘Ã¡ Anh lÃ  John Terry, vÃ o nÄƒm 2005. MÃ¹a giáº£i nÃ y, Van Dijk sáº½ pháº£i cáº¡nh tranh vá»›i bá»™ Ä‘Ã´i Sergio Aguero vÃ  Raheem Sterling cá»§a Man City.', 'bongda.jpg', 0, 0, 1, '2018-01-11 11:44:23', '2019-04-07 04:16:16'),
(3, 'BÃ³ng Ä‘Ã¡\r\nTháº¿ giá»›i\r\nXÃ£ Há»™i', '', 'BÃ³ng Ä‘Ã¡ trong nÆ°á»›c\r\nBÃ³ng Ä‘Ã¡ tháº¿ giá»›i', 'Sao viá»‡t \r\nSao Tháº¿ Giá»›i\r\nChÃ¢u Ã‚u\r\nChÃ­nh Trá»‹\r\nGiao ThÃ´ng \r\nMÃ´i trÆ°á»ng', 'immobile.jpg', 0, 0, 3, '2019-04-07 09:21:41', '2019-04-07 09:21:41'),
(4, 'Äáº¡i chiáº¿n MU - Barca: Pogba tá»‹t ngÃ²i 855 phÃºt, Solskjaer \"giáº£i cá»©u binh nhÃ¬\"', 'BONGDA', 'MU thua Ä‘au Wolverhampton, vÃ  nÃ³ cÃ³ thá»ƒ khiáº¿n â€œQuá»· Ä‘á»â€ bá»‹ loáº¡i khá»i cuá»™c Ä‘ua top 4. Trong nhá»¯ng ngÆ°á»i chÆ¡i tá»‡ á»Ÿ Molineux, Paul Pogba xá»©ng Ä‘Ã¡ng pháº£i nháº­n nhá»¯ng lá»i chá»‰ trÃ­ch.', 'Pogba tá»‹t ngÃ²i 855 phÃºt\r\n\r\nKhi HLV Solskjaer vá»«a má»›i Ä‘áº¿n MU trong vai trÃ² táº¡m quyá»n, Paul Pogba chÆ¡i bÃ³ng trong tá»™t Ä‘á»‰nh thÄƒng hoa. Chá»‰ trong 12 tráº­n Ä‘áº¥u Ä‘áº§u tiÃªn cÃ¹ng nhÃ  cáº§m quÃ¢n ngÆ°á»i Na Uy, Pogba ghi Ä‘áº¿n 9 bÃ n tháº¯ng vÃ  cÃ³ thÃªm 6 Ä‘Æ°á»ng kiáº¿n táº¡o. ÄÃ³ lÃ  khoáº£ng thá»i gian tuyá»‡t vá»i nháº¥t ká»ƒ tá»« khi cáº§u thá»§ nÃ y trá»Ÿ láº¡i Manchester.\r\n\r\nÄáº¡i chiáº¿n MU - Barca: Pogba tá»‹t ngÃ²i 855 phÃºt, Solskjaer &#34;giáº£i cá»©u binh nhÃ¬&#34; - 1\r\n\r\nPogba chÆ¡i tá»‡ trÆ°á»›c Wolves\r\n\r\nNhÆ°ng á»Ÿ Molineux vá»«a qua, Paul Pogba gÃ¢y tháº¥t vá»ng toÃ n táº­p. TrÆ°á»›c Wolverhampton, Pogba chá»‰ cÃ³ Ä‘Ãºng 1 cÃº sÃºt nhÆ°ng khÃ´ng trÃºng Ä‘Ã­ch. NgoÃ i ra, tiá»n vá»‡ nÃ y dÃ¹ chÆ¡i Ä‘á»§ 90 phÃºt cÅ©ng chá»‰ thá»±c hiá»‡n 47 Ä‘Æ°á»ng chuyá»n vá»›i Ä‘á»™ chÃ­nh xÃ¡c vá»n váº¹n 70%. Kháº£ nÄƒng há»— trá»£ phÃ²ng ngá»± cá»§a nhÃ  vÃ´ Ä‘á»‹ch World Cup 2018 cÅ©ng ráº¥t háº¡n cháº¿, chá»‰ vá»›i 1 pha táº¯c bÃ³ng thÃ nh cÃ´ng.\r\n\r\nBá»Ÿi tháº¿, Paul Pogba chá»‰ nháº­n Ä‘Æ°á»£c Ä‘iá»ƒm 6,9 tá»« trang thá»‘ng kÃª Whoscored. NÃ³ kÃ©m xa nhá»¯ng Ä‘iá»ƒm sá»‘ rá»±c rá»¡ mÃ  báº£n há»£p Ä‘á»“ng 89 triá»‡u báº£ng nÃ y váº«n nháº­n Ä‘Æ°á»£c trong giai Ä‘oáº¡n thÄƒng hoa cá»§a mÃ¬nh. Pogba suy giáº£m phong Ä‘á»™, Ä‘Ã³ lÃ  Ä‘iá»u khÃ´ng cáº§n pháº£i bÃ n cÃ£i.\r\n\r\nThá»‘ng kÃª cho tháº¥y, Paul Pogba Ä‘Ã£ tráº£i qua 855 phÃºt tá»‹t ngÃ²i trÃªn má»i máº·t tráº­n, vá»›i 9 tráº­n liÃªn tiáº¿p khÃ´ng ghi bÃ n. Trong sá»‘ 9 tráº­n nÃ y, cÃ³ 7 tráº­n trong mÃ u Ã¡o MU, vÃ  2 tráº­n trong mÃ u Ã¡o ÄT PhÃ¡p, khi anh trá»Ÿ vá» thá»±c hiá»‡n nghÄ©a vá»¥ quá»‘c táº¿ khi Ä‘á»‘i Ä‘áº§u nhá»¯ng Ä‘á»‘i thá»§ yáº¿u nhÆ° Moldova hay Iceland.\r\n\r\nBÃ i toÃ¡n hÃ³c bÃºa vá»›i Solskjaer\r\n\r\nLáº§n gáº§n nháº¥t Pogba ghi bÃ n, Ä‘Ã³ lÃ  trÆ°á»›c Chelsea, vá»‘n Ä‘Ã£ cÃ¡ch nay 9 tráº­n. Láº§n cuá»‘i Pogba kiáº¿n táº¡o cÅ©ng Ä‘Ã£ cÃ¡ch hiá»‡n táº¡i 7 tráº­n. NgÆ°á»i ta khÃ´ng cÃ²n nháº­n ra bÃ³ng dÃ¡ng cá»§a tiá»n vá»‡ trung tÃ¢m Ä‘Æ°á»£c Ä‘Ã¡nh giÃ¡ lÃ  hay nháº¥t tháº¿ giá»›i thá»i Ä‘iá»ƒm nÃ y Ä‘Ã¢u ná»¯a. â€œPogboomâ€ hoÃ n toÃ n láº¡c nhá»‹p, láº©n khuáº¥t trÆ°á»›c hÃ ng tiá»n vá»‡ cÆ¡ Ä‘á»™ng cá»§a cÃ¡c Ä‘á»‘i thá»§.\r\n\r\nÄáº¡i chiáº¿n MU - Barca: Pogba tá»‹t ngÃ²i 855 phÃºt, Solskjaer &#34;giáº£i cá»©u binh nhÃ¬&#34; - 2\r\n\r\nHLV Solskjaer cáº§n sá»›m tÃ¬m láº¡i phong Ä‘á»™ cho Pogba\r\n\r\nTrÆ°á»›c Ä‘Ã¢y, Pogba á»Ÿ tá»™t Ä‘á»‰nh thÄƒng hoa vÃ  liÃªn tá»¥c nháº­n Ä‘Æ°á»£c nhá»¯ng lá»i ngá»£i khen. NhÆ°ng giá» Ä‘Ã¢y, ngÆ°á»i ta chá»‰ nÃ³i vá» cáº§u thá»§ nÃ y báº±ng nhá»¯ng lá»i chá»‰ trÃ­ch. Bá»Ÿi láº½, má»™t pháº§n xuáº¥t phÃ¡t tá»« nhá»¯ng phÃ¡t ngÃ´n thiáº¿u cÃ¢n nháº¯c cá»§a Pogba trong Ä‘á»£t táº­p trung cho ÄTQG vá»«a qua. Khi áº¥y, cáº§u thá»§ 25 tuá»•i nÃ y dáº¡i dá»™t nÃ³i trÆ°á»›c truyá»n thÃ´ng ráº±ng Real Madrid lÃ  giáº¥c mÆ¡ cá»§a mÃ¬nh, vÃ  anh khao khÃ¡t Ä‘Æ°á»£c lÃ m viá»‡c vá»›i HLV Zidane.\r\n\r\nKhi nÃ³i vá» Pogba, HLV Solskjaer chá»‰ dÃ nh nhá»¯ng lá»i ngá»£i khen. NhÆ°ng vÃ o lÃºc nÃ y, â€œSolsaâ€ pháº£i cá»‘ gáº¯ng bÃªnh vá»±c há»c trÃ² trÆ°á»›c nhá»¯ng chá»‰ trÃ­ch Ä‘áº¿n tá»« truyá»n thÃ´ng. Ã”ng tháº§y ngÆ°á»i Na Uy cho ráº±ng Pogba khÃ´ng há» chÆ¡i tá»‡ nhÆ° táº¥t cáº£ váº«n Ä‘ang chá»‰ trÃ­ch, Ä‘á»“ng thá»i kháº³ng Ä‘á»‹nh má»™t Pogba tá»‘t nháº¥t sáº½ sá»›m trá»Ÿ láº¡i.\r\n\r\nNÃ³i thÃ¬ dá»…, lÃ m má»›i khÃ³. Nhiá»‡m vá»¥ quan trá»ng vá»›i HLV Ole Gunnar Solskjaer trÆ°á»›c Ä‘áº¡i chiáº¿n vá»›i Barcelona á»Ÿ tá»© káº¿t lÆ°á»£t Ä‘i Champions League vÃ o 2h ngÃ y 11/4 (giá» Viá»‡t Nam), Ä‘Ã³ lÃ  tÃ¬m láº¡i phong Ä‘á»™ cho Paul Pogba. Náº¿u tiá»n vá»‡ mang Ã¡o sá»‘ 6 nÃ y khÃ´ng láº¥y láº¡i phong Ä‘á»™ vá»‘n cÃ³, thÃ¬ MU sáº½ khÃ³ lÃ²ng táº¡o ra má»™t tháº¿ tráº­n cÃ³ lá»£i trÆ°á»›c nhá»¯ng vá»‹ khÃ¡ch xá»© Catalan.\r\n\r\nNÃªn nhá»› Ä‘iá»ƒm máº¡nh cá»§a Barcelona lÃ  cáº§m bÃ³ng, Ã¡p Ä‘áº·t tháº¿ tráº­n dÃ¹ há» pháº£i Ä‘Ã¡ trÃªn sÃ¢n khÃ¡ch. Trong tháº¿ tráº­n áº¥y, MU ráº¥t cáº§n Ä‘áº¿n nhá»¯ng Ä‘Æ°á»ng chuyá»n cÃ³ tÃ­nh Ä‘á»™t biáº¿n cao cá»§a Pogba, nhá»¯ng cÃº sÃºt xa cÃ³ Ä‘á»™ hiá»ƒm hÃ³c cao cá»§a nhÃ  vÃ´ Ä‘á»‹ch World Cup 2018.', 'wales.jpg', 0, 0, 1, '2019-04-07 09:38:05', '2019-04-07 09:38:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `Id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(300) COLLATE utf8_vietnamese_ci NOT NULL,
  `Email` varchar(300) COLLATE utf8_vietnamese_ci NOT NULL,
  `Phanquyen` varchar(300) COLLATE utf8_vietnamese_ci NOT NULL,
  `Password` varchar(300) COLLATE utf8_vietnamese_ci NOT NULL,
  `Created` datetime DEFAULT CURRENT_TIMESTAMP,
  `Updated` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`Id`, `Name`, `Email`, `Phanquyen`, `Password`, `Created`, `Updated`) VALUES
(1, 'Duyhoan', 'Doduyhoan1996@gmail.com', '', '123456', '2018-01-10 22:10:35', '2018-01-10 22:10:35'),
(2, 'Admin', 'a@gmail.com', '', '123456', '2018-01-10 22:23:48', '2018-01-10 22:23:48');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `foreign_keycm2` (`Idtintuc`) USING BTREE,
  ADD KEY `foreign_keycm1` (`Idusers`);

--
-- Chỉ mục cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `foreign_key` (`Idtheloai`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `foreign_keytintuc` (`Idloaitin`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `foreign_keyusers` (`Email`(10)) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `Id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `foreign_keycm1` FOREIGN KEY (`Idusers`) REFERENCES `users` (`Id`),
  ADD CONSTRAINT `foreign_keycm2` FOREIGN KEY (`Idtintuc`) REFERENCES `tintuc` (`Id`);

--
-- Các ràng buộc cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  ADD CONSTRAINT `foreign_key` FOREIGN KEY (`Idtheloai`) REFERENCES `theloai` (`Id`);

--
-- Các ràng buộc cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `foreign_keytintuc` FOREIGN KEY (`Idloaitin`) REFERENCES `loaitin` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
