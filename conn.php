<?php

$sira = 1;

try {

    $baglanti = new PDO("mysql:host=localhost;dbname=cansu", "root", "");
    $baglanti->exec("SET NAMES utf8");
    $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sorgu = $baglanti->prepare("SELECT * FROM setting WHERE id = ?");
    $sorgu->bindParam(1, $sira, PDO::PARAM_INT);
    $sorgu->execute();

    $sorgu1 = $baglanti->prepare("SELECT * FROM services WHERE id = ?");
    $sorgu1->bindParam(1, $sira, PDO::PARAM_INT);
    $sorgu1->execute();

    $cikti = $sorgu->fetch(PDO::FETCH_ASSOC);

    $hizmet = $sorgu1->fetch(PDO::FETCH_ASSOC);
    
    echo "Adı: " . $cikti["name"] . "<br /> Soyadı: " . $cikti["surname"] . "<br /> E-posta: " . $cikti["email"] . "<br /> Deneyim: " . $cikti["experience_year"] ." Yıl";

} catch (PDOException $e) {
    die($e->getMessage());
}

$baglanti = null;
