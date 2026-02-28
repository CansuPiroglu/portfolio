<?php
if (isset($_POST['adi'], $_POST['soyadi'], $_POST['eposta'])) {

    $adi = trim(filter_input(INPUT_POST, 'adi', FILTER_SANITIZE_STRING));
    $soyadi = trim(filter_input(INPUT_POST, 'soyadi', FILTER_SANITIZE_STRING));
    $eposta = trim(filter_input(INPUT_POST, 'eposta', FILTER_SANITIZE_EMAIL));

    if (empty($adi) || empty($soyadi) || empty($eposta)) {
        die("<p>Lütfen formu eksiksiz doldurun!</p>");
    }

    if (!filter_var($eposta, FILTER_VALIDATE_EMAIL)) {
        die("<p>Lütfen geçerli bir e-posta adresin girin!</p>");
    }

    try {

        $baglanti = new PDO("mysql:host=localhost;dbname=cansu", "root", "");
        $baglanti->exec("SET NAMES utf8");
        $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sorgu = $baglanti->prepare("UPDATE setting SET name = ?, surname = ?, email = ? WHERE id = 1");
        $sorgu->bindParam(1, $adi, PDO::PARAM_STR);
        $sorgu->bindParam(2, $soyadi, PDO::PARAM_STR);
        $sorgu->bindParam(3, $eposta, PDO::PARAM_STR);

echo $adi;
        $sorgu->execute();

        echo "<p>Bilgiler başarılı bir şekilde kaydedildi.</p>";

    } catch (PDOException $e) {
        die($e->getMessage());
    }

    $baglanti = null;
}

?>