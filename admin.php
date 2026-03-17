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

    include 'conn.php';

    $sorgu = $baglanti->prepare("UPDATE setting SET name = ?, surname = ?, email = ? WHERE id = 1");
    $sorgu->bindParam(1, $adi, PDO::PARAM_STR);
    $sorgu->bindParam(2, $soyadi, PDO::PARAM_STR);
    $sorgu->bindParam(3, $eposta, PDO::PARAM_STR);

    $sorgu1 = $baglanti->prepare("UPDATE setting SET name = ?, surname = ?, email = ? WHERE id = 2");
    $sorgu1->bindParam(1, $adi, PDO::PARAM_STR);
    $sorgu1->bindParam(2, $soyadi, PDO::PARAM_STR);
    $sorgu1->bindParam(3, $eposta, PDO::PARAM_STR);

echo $adi;
    $sorgu->execute();

    $sorgu1->execute();

    echo "<p>Bilgiler başarılı bir şekilde kaydedildi.</p>";
}

?>