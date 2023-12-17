-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Ara 2023, 03:55:40
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `admin`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(11) NOT NULL,
  `ayar_title` varchar(50) NOT NULL,
  `ayar_descr` varchar(255) NOT NULL,
  `ayar_keywords` varchar(250) NOT NULL,
  `ayar_auth` varchar(200) NOT NULL,
  `ayar_tel` varchar(50) NOT NULL,
  `ayar_gsm` varchar(20) NOT NULL,
  `ayar_fax` varchar(20) NOT NULL,
  `ayar_mail` varchar(100) NOT NULL,
  `ayar_ilce` varchar(100) NOT NULL,
  `ayar_il` varchar(50) NOT NULL,
  `ayar_adres` varchar(350) NOT NULL,
  `ayar_mesai` varchar(150) NOT NULL,
  `ayar_maps` text NOT NULL,
  `ayar_analystic` text NOT NULL,
  `ayar_zopim` text NOT NULL,
  `ayar_facebook` varchar(255) NOT NULL,
  `ayar_twitter` varchar(255) NOT NULL,
  `ayar_instagram` varchar(255) NOT NULL,
  `ayar_google` varchar(255) NOT NULL,
  `ayar_youtube` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_title`, `ayar_descr`, `ayar_keywords`, `ayar_auth`, `ayar_tel`, `ayar_gsm`, `ayar_fax`, `ayar_mail`, `ayar_ilce`, `ayar_il`, `ayar_adres`, `ayar_mesai`, `ayar_maps`, `ayar_analystic`, `ayar_zopim`, `ayar_facebook`, `ayar_twitter`, `ayar_instagram`, `ayar_google`, `ayar_youtube`) VALUES
(0, 'asd', 'asd', 'asd', 'asd', '05066913647', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_adi` varchar(250) NOT NULL,
  `blog_icerik` text NOT NULL,
  `blog_descr` varchar(300) NOT NULL,
  `blog_keywords` varchar(250) NOT NULL,
  `onay` tinyint(1) NOT NULL,
  `blog_resim` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_adi`, `blog_icerik`, `blog_descr`, `blog_keywords`, `onay`, `blog_resim`) VALUES
(1, 'blog1', '<p>Açıklama alanı</p>', 'Description alanı', 'Anahtar,kelimeler', 1, '1.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galeri`
--

CREATE TABLE `galeri` (
  `resim_id` int(11) NOT NULL,
  `resim_baslik` varchar(250) NOT NULL,
  `resim_durum` tinyint(1) NOT NULL,
  `resim` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `galeri`
--

INSERT INTO `galeri` (`resim_id`, `resim_baslik`, `resim_durum`, `resim`) VALUES
(1, 'Test', 1, '2.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_id` int(11) NOT NULL,
  `hakkimizda_baslik` varchar(100) NOT NULL,
  `hakkimizda_icerik` text NOT NULL,
  `hakkimizda_resim` varchar(200) NOT NULL,
  `hakkimizda_video` varchar(200) DEFAULT NULL,
  `hakkimizda_vizyon` text NOT NULL,
  `hakkimizda_misyon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_icerik`, `hakkimizda_resim`, `hakkimizda_video`, `hakkimizda_vizyon`, `hakkimizda_misyon`) VALUES
(0, 'Hakkımızda Başlık', '<p>İçerik</p>', '656997108-tarot-cassandra.png', 'video', 'vizyon', 'misyon');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmet`
--

CREATE TABLE `hizmet` (
  `hizmet_id` int(11) NOT NULL,
  `hizmet_adi` varchar(100) NOT NULL,
  `hizmet_icerik` text NOT NULL,
  `hizmet_durum` tinyint(1) NOT NULL,
  `hizmet_resim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_ust` int(11) NOT NULL,
  `menu_ad` varchar(55) NOT NULL,
  `menu_url` varchar(255) DEFAULT NULL,
  `menu_sira` int(11) NOT NULL,
  `menu_durum` tinyint(1) NOT NULL,
  `sayfa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_ust`, `menu_ad`, `menu_url`, `menu_sira`, `menu_durum`, `sayfa_id`) VALUES
(1, 0, 'İletişim', '', 1, 1, 6),
(3, 0, 'ürünler', '', 2, 1, 7),
(4, 3, 'Test', '', 1, 1, 8),
(5, 4, 'Testsss', '', 1, 1, 6),
(10, 0, 'aa', 'aa', 9, 1, 10),
(11, 0, 'yeni', NULL, 2, 1, 8);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `referans`
--

CREATE TABLE `referans` (
  `referans_id` int(11) NOT NULL,
  `referans_adi` varchar(250) NOT NULL,
  `referans_durum` tinyint(1) NOT NULL,
  `referans_resim` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `referans`
--

INSERT INTO `referans` (`referans_id`, `referans_adi`, `referans_durum`, `referans_resim`) VALUES
(1, 'referans1', 1, 'ankara-elektrikci-logo.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfa`
--

CREATE TABLE `sayfa` (
  `sayfa_id` int(11) NOT NULL,
  `baslik` varchar(250) NOT NULL,
  `sayfa_url` varchar(255) NOT NULL,
  `sayfa_resim` varchar(150) NOT NULL,
  `sayfa_icerik` text NOT NULL,
  `sayfa_keywords` varchar(255) NOT NULL,
  `sayfa_descr` varchar(255) NOT NULL,
  `sayfa_durum` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `sayfa`
--

INSERT INTO `sayfa` (`sayfa_id`, `baslik`, `sayfa_url`, `sayfa_resim`, `sayfa_icerik`, `sayfa_keywords`, `sayfa_descr`, `sayfa_durum`) VALUES
(6, 'İletişim', 'iletisim', '1.png', '<p>İletişim Sayfası İçerik alanı</p>', 'keywords', 'description', 1),
(7, 'Ürünler', 'urunler', '2.png', '<p>Ürünler Sayfası Açıklama alanı</p>', 'keyword', 'description', 1),
(8, 'Gizlilik Sözleşmemiz', 'gizlilik-sozlesmemiz', '3.png', '<p>Gizlilik sözleşmemiz içerik alanı</p>', 'keyword', 'description', 1),
(9, 'KVKK', 'kvkk', '', '<p>kvkk içerik alanı</p>', 'keyword', 'description', 1),
(10, 'aa', 'aa', 'ankara-elektrikci-logo.jpg', '<p>aa</p>', 'aa', 'aa', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_ustbaslik` varchar(255) NOT NULL,
  `slider_altbaslik` varchar(255) NOT NULL,
  `slider_aciklama` varchar(300) NOT NULL,
  `durum` tinyint(1) NOT NULL,
  `slider_resim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_ustbaslik`, `slider_altbaslik`, `slider_aciklama`, `durum`, `slider_resim`) VALUES
(2, 'ÜST BAŞLIK1', 'Alt Başlık1', 'asd', 1, '3.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sorular`
--

CREATE TABLE `sorular` (
  `s_id` int(11) NOT NULL,
  `soru_adi` varchar(250) NOT NULL,
  `soru_cevap` text NOT NULL,
  `soru_durum` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `takim`
--

CREATE TABLE `takim` (
  `takim_id` int(11) NOT NULL,
  `kisi_adi` varchar(100) NOT NULL,
  `kisi_gorev` varchar(150) NOT NULL,
  `kisi_hakkinda` varchar(300) NOT NULL,
  `kisi_durum` tinyint(1) NOT NULL,
  `kisi_resim` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetici`
--

CREATE TABLE `yonetici` (
  `yonetici_id` int(11) NOT NULL,
  `yonetici_adi` varchar(100) NOT NULL,
  `yonetici_soyadi` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kullanici_mail` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `yonetici`
--

INSERT INTO `yonetici` (`yonetici_id`, `yonetici_adi`, `yonetici_soyadi`, `username`, `password`, `kullanici_mail`) VALUES
(1, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Tablo için indeksler `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`resim_id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`hakkimizda_id`);

--
-- Tablo için indeksler `hizmet`
--
ALTER TABLE `hizmet`
  ADD PRIMARY KEY (`hizmet_id`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `sayfa_id` (`sayfa_id`);

--
-- Tablo için indeksler `referans`
--
ALTER TABLE `referans`
  ADD PRIMARY KEY (`referans_id`);

--
-- Tablo için indeksler `sayfa`
--
ALTER TABLE `sayfa`
  ADD PRIMARY KEY (`sayfa_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `sorular`
--
ALTER TABLE `sorular`
  ADD PRIMARY KEY (`s_id`);

--
-- Tablo için indeksler `takim`
--
ALTER TABLE `takim`
  ADD PRIMARY KEY (`takim_id`);

--
-- Tablo için indeksler `yonetici`
--
ALTER TABLE `yonetici`
  ADD PRIMARY KEY (`yonetici_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayar`
--
ALTER TABLE `ayar`
  MODIFY `ayar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `galeri`
--
ALTER TABLE `galeri`
  MODIFY `resim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `hakkimizda`
--
ALTER TABLE `hakkimizda`
  MODIFY `hakkimizda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `hizmet`
--
ALTER TABLE `hizmet`
  MODIFY `hizmet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `referans`
--
ALTER TABLE `referans`
  MODIFY `referans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `sayfa`
--
ALTER TABLE `sayfa`
  MODIFY `sayfa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `sorular`
--
ALTER TABLE `sorular`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `takim`
--
ALTER TABLE `takim`
  MODIFY `takim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `yonetici`
--
ALTER TABLE `yonetici`
  MODIFY `yonetici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`sayfa_id`) REFERENCES `sayfa` (`sayfa_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
