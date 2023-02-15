<?php

$conn = mysqli_connect("localhost", "root", "", "dokumentasi_surat");

if (!$conn) {
    die ("Koneksi gagal: ". mysqli_connect_error());
}
?>