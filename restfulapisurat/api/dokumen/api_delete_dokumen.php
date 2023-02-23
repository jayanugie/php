<?php

require_once('../../config/koneksi_db.php');

// mengambil data dari parameter
$id_surat = $_GET['id_surat'];
$nama_file = $_GET['nama_file'];

// query untuk mengambil path file
$sql = "SELECT path_file FROM dokumen WHERE id_surat='$id_surat' AND nama_file='$nama_file'";

// menjalankan query
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $path_file = $row["path_file"];

    // query untuk menghapus baris dari tabel dokumen berdasarkan id_surat dan nama_file
    $sql_delete = "DELETE FROM dokumen WHERE id_surat='$id_surat' AND nama_file='$nama_file'";

    // menjalankan query
    if (mysqli_query($conn, $sql_delete)) {
        echo "Data berhasil dihapus.";

        // melakukan unlink file yang akan dihapus
        unlink($path_file);
    } else {
        echo "Error: " . $sql_delete . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Data tidak ditemukan.";
}

// menutup koneksi ke database
mysqli_close($conn);



?>