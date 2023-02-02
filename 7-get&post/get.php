<?php 
/**
 * Script ini dibuat agar menghindari user yg ingin masuk ke halaman
 * melalui url
 * 
 * 
 * Deskripsi: 
 * Jika GET tidak ada
 * maka kembalikan ke halaman utama
 * exit agar code di bawah tidak berjalan
 * 
 */

if (!isset($_GET["title"]) ||
    !isset($_GET["director"]) ||
    !isset($_GET["release_date"]) ||
    !isset($_GET["image"])) {
        header("Location: superglobals.php");
        exit;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies Detail</title>
</head>
<body>
    <ul>
        <li><img src="images/<?= $_GET["image"]; ?>" alt="image"></li>
        <li><?= $_GET["title"]; ?></li>
        <li><?= $_GET["release_date"]; ?></li>
        <li><?= $_GET["director"]; ?></li>
    </ul>
    <a href="superglobals.php">Back to home</a>    
</body>
</html>