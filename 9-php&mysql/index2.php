<?php
// CARA LAMA
/**
 * KONEKSI DATABASE
 * syntax: mysqli_connect("nama host", "username mysql", "password", "nama database")
 */
$connect = mysqli_connect("localhost", "root", "", "phpdasar");

/**
 * Ambil data dari tabel mahasiswa / query data mahasiswa
 * syntax: mysqli_query(koneksi database, query sql)
 */
$result = mysqli_query($connect, "SELECT * FROM mahasiswa");

/**
 * Ambil data (fetch) mahasiswa dari object result
 * - mysqli_fetch_row() -> return array numerik
 * - mysqli_fetch_assoc() -> return array associative
 * - mysqli_fetch_array() -> return array numerik dan associative
 * - mysqli_fetch_object() -> return object -> var_dump($mhs->nama)
 * 
 * LOOPING
 * while ($mhs = mysqli_fetch_assoc($result)) {
 *   var_dump(($mhs));
 * }
 */


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>

<h1>Daftar Mahasiswa</h1>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>

    <!-- LOOPING -->
    <?php $i = 1 ?><!-- menambahkan no urut -->
    <?php while($row = mysqli_fetch_assoc($result)) : ?>
        
        <tr>
            <td><?= $i ?></td>
            <td>
                <a href="">ubah</a> |
                <a href="">hapus</a>
            </td>
            <td><img src="images/avatar.jpg" width="50"></td>
            <td><?= $row["nrp"] ?></td>
            <td><?= $row["nama"] ?></td>
            <td><?= $row["email"] ?></td>
            <td><?= $row["jurusan"] ?></td>
        </tr>

    <?php $i++ ?>
    <?php endwhile; ?>
    
</table>
    
</body>
</html>