-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 15 Mar 2026, 20:08:02
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cansu`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1, 'Teknoloji', 'teknoloji'),
(2, 'Tasarım', 'tasarim'),
(3, 'Yazılım', 'yazilim');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `yorum` text DEFAULT NULL,
  `ad_soyad` varchar(100) DEFAULT NULL,
  `unvan` varchar(150) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`id`, `yorum`, `ad_soyad`, `unvan`, `foto`) VALUES
(1, 'Sizinle çalışmak harikaydı, projemizi zamanında ve beklentilerin üzerinde teslim etti.', 'Ahmet Yılmaz', 'CEO, Dijital Ajans', 'img/erkek_profil.png'),
(2, 'Web sitemizi baştan tasarladı, hem estetik hem de kullanışlı bir sonuç çıktı.', 'Elif Kaya', 'Kurucu, StartupHub', 'img/kadın_profil.png'),
(3, 'PHP ve veritabanı entegrasyonunu çok profesyonelce halletti, kesinlikle tavsiye ederim.', 'Mehmet Demir', 'CTO, TechCo', 'img/erkek_profil2.png'),
(4, 'Portfolyo sitemizi sıfırdan tasarladı, her detayı özenle düşünmüş. Çok memnun kaldık.', 'Zeynep Arslan', 'Marka Direktörü, CreativeStudio', 'img/kadın_profil2.jpg'),
(5, 'Hem frontend hem backend tarafında oldukça yetenekli, projeyi eksiksiz teslim etti.', 'Burak Şahin', 'Genel Müdür, NetSoft', 'img/erkek_profil3.png'),
(6, 'Kodları temiz ve anlaşılır, ileride üzerine geliştirme yapmak çok kolaylaştı.', 'Selin Öztürk', 'Proje Yöneticisi, AgileTeam', 'img/kadın_profil3.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` enum('passive','active','draft') DEFAULT 'active',
  `created_at` datetime DEFAULT current_timestamp(),
  `resim` varchar(255) DEFAULT 'img/blog/inner_b1.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`id`, `subcategory_id`, `title`, `content`, `status`, `created_at`, `resim`) VALUES
(31, 1, 'ChatGPT ve Yapay Zeka Devrimi', 'Yapay zeka artık hayatımızın her alanında. ChatGPT ile birlikte bu dönüşüm çok daha hızlandı.', 'active', '2026-03-13 11:33:23', 'img/blog/yapay_zeka.png'),
(32, 2, 'Flutter ile İlk Mobil Uygulama', 'Flutter kullanarak cross-platform bir uygulama nasıl geliştirilir? Adım adım anlattım.', 'active', '2026-03-13 11:33:23', 'img/blog/flutter.png'),
(33, 3, 'Modern UI Tasarımında Renk Teorisi', 'Doğru renk paleti seçimi kullanıcı deneyimini doğrudan etkiler.', 'active', '2026-03-13 11:33:23', 'img/blog/renk.webp'),
(34, 4, 'UX Tasarımında Kullanıcı Testleri', 'Kullanıcı testleri yapmadan iyi bir UX tasarımı olmaz. İşte yöntemler.', 'active', '2026-03-13 11:33:23', 'img/blog/kullanici.png'),
(35, 5, 'PHP 8 ile OOP Temelleri', 'Nesne yönelimli programlamayı PHP 8 üzerinde örneklerle anlattım.', 'active', '2026-03-13 11:33:23', 'img/blog/php.jpg'),
(36, 6, 'MySQL İndexleme ve Performans', 'Büyük veritabanlarında sorgu performansını artırmanın yolları.', 'active', '2026-03-13 11:33:23', 'img/blog/mysql.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `recent_works`
--

CREATE TABLE `recent_works` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `baslik` varchar(100) DEFAULT NULL,
  `resim` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `sinif` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `recent_works`
--

INSERT INTO `recent_works` (`id`, `kategori`, `baslik`, `resim`, `link`, `sinif`) VALUES
(1, 'Website', 'Ev Aletleri Satış Sitesi', 'img/ev_aletleri.jpg', 'https://github.com/CansuPiroglu/Elektrikli-Ev-Aletleri-Sat-Sitesi', 'financial'),
(2, 'Website', 'Arıza Kayı Formu', 'img/ariza.png', 'https://github.com/CansuPiroglu/Staj-Ariza-Kayit-Form-Sitesi', 'financial banking'),
(3, 'Veri Analizi', 'Veri Seti İşleme', 'img/veri_isleme.png', 'https://github.com/CansuPiroglu/Titanic-Dataset-Veri-Isleme', 'insurance'),
(4, 'Web Sitesi', 'CV Sitesi', 'img/cv_proje.png', 'https://github.com/CansuPiroglu/cv-projesi', 'financial');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `icerik` text NOT NULL,
  `ikon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `services`
--

INSERT INTO `services` (`id`, `baslik`, `icerik`, `ikon`) VALUES
(1, 'Web Geliştirme', 'PHP ve MySQL kullanarak dinamik ve hızlı veritabanı yönetim sistemleri geliştiriyorum.', 'img/icon/se-icon1.png'),
(2, 'Veritabanı Mimarı', 'Karmaşık veri yapılarını düzenli tablolar haline getiriyor, SQL sorgularıyla performanslı çözümler sunuyorum.', 'img/icon/se-icon2.png'),
(3, 'Arayüz Entegrasyonu', 'Modern HTML5 ve CSS3 tasarımlarını, PHP ile canlandırarak statik yapıları dinamik kullanıcı deneyimlerine dönüştürüyorum.', 'img/icon/se-icon3.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `setting`
--

CREATE TABLE `setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `experience_year` int(10) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `tarih` date DEFAULT curdate(),
  `profile_image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `setting`
--

INSERT INTO `setting` (`id`, `name`, `surname`, `email`, `phone`, `experience_year`, `birth`, `tarih`, `profile_image`, `title`) VALUES
(1, 'Cansu', 'Piroğlu', 'c@c.s', '5568789988', 5, '2000-02-12', '2026-03-03', 'img\\profile.jpg', 'WEB DEVELOPER');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `slug`) VALUES
(1, 1, 'Yapay Zeka', 'yapay-zeka'),
(2, 1, 'Mobil Uygulama', 'mobil-uygulama'),
(3, 2, 'UI Tasarım', 'ui-tasarim'),
(4, 2, 'UX Tasarım', 'ux-tasarim'),
(5, 3, 'PHP', 'php'),
(6, 3, 'Veritabanı', 'veritabani');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Tablo için indeksler `recent_works`
--
ALTER TABLE `recent_works`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Tablo için AUTO_INCREMENT değeri `recent_works`
--
ALTER TABLE `recent_works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);

--
-- Tablo kısıtlamaları `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
