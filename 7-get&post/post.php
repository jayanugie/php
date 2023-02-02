<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
</head>
<body>
    <!-- mengirim data ke halaman ini -->
    <?php if(isset($_POST["submit"])) : ?>
        <h1>Halo, Selamat Datang <?= $_POST["name"]; ?></h1>
    <?php endif; ?>

    <!-- 
        default method pada form adalah get,
        jika action tidak ada, maka akan dikirimkan ke halaman ini 
    -->
    <form action="posted.php" method="post">  
        Masukkan nama:
        <input type="text" name="name">
        <br>
        <button type="submit" name="submit">Kirim!</button>
    </form>
</body>
</html>