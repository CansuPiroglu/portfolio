<?php
/**
 * Veritabanı Otomatik Kurulum ve Veri Aktarım Scripti
 * Bu dosya veritabanını ve tabloları oluşturur, eksik verileri ekler.
 */

$host = "127.0.0.1";
$user = "root";
$pass = "";
$dbname = "cansu";

header('Content-Type: text/html; charset=utf-8');

try {
    // 1. MySQL Sunucusuna Bağlan (Veritabanı seçmeden)
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES utf8mb4");

    echo "<h2>🚀 Veritabanı Kurulumu Başladı</h2>";

    // 2. Veritabanını Oluştur
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
    $pdo->exec("USE `$dbname` ");
    echo "✅ Veritabanı '$dbname' kontrol edildi ve seçildi.<br>";
    
    // 3. (Opsiyonel) Bağlantıyı tam kesinleştirmek için yeniden bağlanabiliriz ama USE yeterlidir.
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 4. Tablo Yapılarını Oluştur
    $tables = [
        "categories" => "CREATE TABLE IF NOT EXISTS `categories` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(100) NOT NULL,
            `slug` varchar(100) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",

        "comments" => "CREATE TABLE IF NOT EXISTS `comments` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `yorum` text DEFAULT NULL,
            `ad_soyad` varchar(100) DEFAULT NULL,
            `unvan` varchar(150) DEFAULT NULL,
            `foto` varchar(255) DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",

        "subcategories" => "CREATE TABLE IF NOT EXISTS `subcategories` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `category_id` int(11) NOT NULL,
            `name` varchar(100) NOT NULL,
            `slug` varchar(100) NOT NULL,
            PRIMARY KEY (`id`),
            KEY `category_id` (`category_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",

        "posts" => "CREATE TABLE IF NOT EXISTS `posts` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `subcategory_id` int(11) NOT NULL,
            `title` varchar(255) NOT NULL,
            `content` text NOT NULL,
            `status` enum('passive','active','draft') DEFAULT 'active',
            `created_at` datetime DEFAULT current_timestamp(),
            `resim` varchar(255) DEFAULT 'img/blog/inner_b1.jpg',
            PRIMARY KEY (`id`),
            KEY `subcategory_id` (`subcategory_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",

        "recent_works" => "CREATE TABLE IF NOT EXISTS `recent_works` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `kategori` varchar(100) DEFAULT NULL,
            `baslik` varchar(100) DEFAULT NULL,
            `resim` varchar(255) DEFAULT NULL,
            `link` varchar(255) DEFAULT NULL,
            `sinif` varchar(100) DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",

        "services" => "CREATE TABLE IF NOT EXISTS `services` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `baslik` varchar(255) NOT NULL,
            `icerik` text NOT NULL,
            `ikon` varchar(255) DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",

        "setting" => "CREATE TABLE IF NOT EXISTS `setting` (
            `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            `surname` varchar(255) NOT NULL,
            `email` varchar(255) DEFAULT NULL,
            `phone` varchar(255) DEFAULT NULL,
            `experience_year` int(10) DEFAULT NULL,
            `birth` date DEFAULT NULL,
            `tarih` date DEFAULT NULL,
            `profile_image` varchar(255) DEFAULT NULL,
            `title` varchar(255) DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;"
    ];

    foreach ($tables as $name => $sql) {
        $pdo->exec($sql);
        echo "✅ Tablo '$name' kontrol edildi/oluşturuldu.<br>";
    }

    // 5. Veri Ekleme Fonksiyonu
    function fillTable($pdo, $table, $data) {
        $check = $pdo->query("SELECT COUNT(*) FROM `$table`")->fetchColumn();
        if ($check == 0) {
            foreach ($data as $row) {
                $cols = implode("`, `", array_keys($row));
                $vals = ":" . implode(", :", array_keys($row));
                $stmt = $pdo->prepare("INSERT INTO `$table` (`$cols`) VALUES ($vals)");
                $stmt->execute($row);
            }
            echo "📥 '$table' tablosuna veriler aktarıldı.<br>";
        } else {
            echo "ℹ️ '$table' tablosu zaten dolu, veri aktarımı atlandı.<br>";
        }
    }

    // --- DATA ITEMS ---
    
    // Categories
    fillTable($pdo, 'categories', [
        ['id' => 1, 'name' => 'Teknoloji', 'slug' => 'teknoloji'],
        ['id' => 2, 'name' => 'Tasarım', 'slug' => 'tasarim'],
        ['id' => 3, 'name' => 'Yazılım', 'slug' => 'yazilim']
    ]);

    // Subcategories
    fillTable($pdo, 'subcategories', [
        ['id' => 1, 'category_id' => 1, 'name' => 'Yapay Zeka', 'slug' => 'yapay-zeka'],
        ['id' => 2, 'category_id' => 1, 'name' => 'Mobil Uygulama', 'slug' => 'mobil-uygulama'],
        ['id' => 3, 'category_id' => 2, 'name' => 'UI Tasarım', 'slug' => 'ui-tasarim'],
        ['id' => 4, 'category_id' => 2, 'name' => 'UX Tasarım', 'slug' => 'ux-tasarim'],
        ['id' => 5, 'category_id' => 3, 'name' => 'PHP', 'slug' => 'php'],
        ['id' => 6, 'category_id' => 3, 'name' => 'Veritabanı', 'slug' => 'veritabani']
    ]);

    // Setting
    fillTable($pdo, 'setting', [
        [
            'id' => 1, 
            'name' => 'Cansu', 
            'surname' => 'Piroğlu', 
            'email' => 'c@c.s', 
            'phone' => '5568789988', 
            'experience_year' => 5, 
            'birth' => '2000-02-12', 
            'tarih' => '2026-03-03', 
            'profile_image' => 'img/profile.jpg', 
            'title' => 'WEB DEVELOPER'
        ]
    ]);

    // Services
    fillTable($pdo, 'services', [
        ['id' => 1, 'baslik' => 'Web Geliştirme', 'icerik' => 'PHP ve MySQL kullanarak dinamik ve hızlı veritabanı yönetim sistemleri geliştiriyorum.', 'ikon' => 'img/icon/se-icon1.png'],
        ['id' => 2, 'baslik' => 'Veritabanı Mimarı', 'icerik' => 'Karmaşık veri yapılarını düzenli tablolar haline getiriyor, SQL sorgularıyla performanslı çözümler sunuyorum.', 'ikon' => 'img/icon/se-icon2.png'],
        ['id' => 3, 'baslik' => 'Arayüz Entegrasyonu', 'icerik' => 'Modern HTML5 ve CSS3 tasarımlarını, PHP ile canlandırarak statik yapıları dinamik kullanıcı deneyimlerine dönüştürüyorum.', 'ikon' => 'img/icon/se-icon3.png']
    ]);

    // Recent Works
    fillTable($pdo, 'recent_works', [
        ['id' => 1, 'kategori' => 'Website', 'baslik' => 'Ev Aletleri Satış Sitesi', 'resim' => 'img/ev_aletleri.jpg', 'link' => 'https://github.com/CansuPiroglu/Elektrikli-Ev-Aletleri-Sat-Sitesi', 'sinif' => 'financial'],
        ['id' => 2, 'kategori' => 'Website', 'baslik' => 'Arıza Kayı Formu', 'resim' => 'img/ariza.png', 'link' => 'https://github.com/CansuPiroglu/Staj-Ariza-Kayit-Form-Sitesi', 'sinif' => 'financial banking'],
        ['id' => 3, 'kategori' => 'Veri Analizi', 'baslik' => 'Veri Seti İşleme', 'resim' => 'img/veri_isleme.png', 'link' => 'https://github.com/CansuPiroglu/Titanic-Dataset-Veri-Isleme', 'sinif' => 'insurance'],
        ['id' => 4, 'kategori' => 'Web Sitesi', 'baslik' => 'CV Sitesi', 'resim' => 'img/cv_proje.png', 'link' => 'https://github.com/CansuPiroglu/cv-projesi', 'sinif' => 'financial']
    ]);

    // Comments
    fillTable($pdo, 'comments', [
        ['id' => 1, 'yorum' => 'Sizinle çalışmak harikaydı, projemizi zamanında ve beklentilerin üzerinde teslim etti.', 'ad_soyad' => 'Ahmet Yılmaz', 'unvan' => 'CEO, Dijital Ajans', 'foto' => 'img/erkek_profil.png'],
        ['id' => 2, 'yorum' => 'Web sitemizi baştan tasarladı, hem estetik hem de kullanışlı bir sonuç çıktı.', 'ad_soyad' => 'Elif Kaya', 'unvan' => 'Kurucu, StartupHub', 'foto' => 'img/kadın_profil.png'],
        ['id' => 3, 'yorum' => 'PHP ve veritabanı entegrasyonunu çok profesyonelce halletti, kesinlikle tavsiye ederim.', 'ad_soyad' => 'Mehmet Demir', 'unvan' => 'CTO, TechCo', 'foto' => 'img/erkek_profil2.png'],
        ['id' => 4, 'yorum' => 'Portfolyo sitemizi sıfırdan tasarladı, her detayı özenle düşünmüş. Çok memnun kaldık.', 'ad_soyad' => 'Zeynep Arslan', 'unvan' => 'Marka Direktörü, CreativeStudio', 'foto' => 'img/kadın_profil2.jpg'],
        ['id' => 5, 'yorum' => 'Hem frontend hem backend tarafında oldukça yetenekli, projeyi eksiksiz teslim etti.', 'ad_soyad' => 'Burak Şahin', 'unvan' => 'Genel Müdür, NetSoft', 'foto' => 'img/erkek_profil3.png'],
        ['id' => 6, 'yorum' => 'Kodları temiz ve anlaşılır, ileride üzerine geliştirme yapmak çok kolaylaştı.', 'ad_soyad' => 'Selin Öztürk', 'unvan' => 'Proje Yöneticisi, AgileTeam', 'foto' => 'img/kadın_profil3.jpg']
    ]);

    // Posts
    fillTable($pdo, 'posts', [
        ['id' => 31, 'subcategory_id' => 1, 'title' => 'ChatGPT ve Yapay Zeka Devrimi', 'content' => 'Yapay zeka artık hayatımızın her alanında...', 'status' => 'active', 'resim' => 'img/blog/yapay_zeka.png'],
        ['id' => 32, 'subcategory_id' => 2, 'title' => 'Flutter ile İlk Mobil Uygulama', 'content' => 'Flutter kullanarak cross-platform bir uygulama...', 'status' => 'active', 'resim' => 'img/blog/flutter.png'],
        ['id' => 33, 'subcategory_id' => 3, 'title' => 'Modern UI Tasarımında Renk Teorisi', 'content' => 'Doğru renk paleti seçimi...', 'status' => 'active', 'resim' => 'img/blog/renk.webp']
    ]);

    echo "<h2>🎉 Kurulum Tamamlandı!</h2>";
    echo "<p>Artık her şey hazır. <a href='index.php' style='color:blue; font-weight:bold;'>Siteye Gitmek İçin Tıklayın</a></p>";

} catch (PDOException $e) {
    echo "<h2 style='color:red;'>❌ Hata Oluştu</h2>";
    echo "Detay: " . $e->getMessage();
    echo "<br><br><b>Not:</b> Veritabanı sunucunuzun (MySQL/MariaDB) açık olduğundan ve 'root' kullanıcısının şifresiz olduğundan emin olun.";
}
