<?php
// Central Database Connection
$host = "127.0.0.1";
$dbname = "cansu";
$user = "root";
$pass = "";

try {
    $baglanti = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $baglanti->exec("SET NAMES utf8");
    $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Veritabanı bağlantı hatası: " . $e->getMessage());
}
?>
