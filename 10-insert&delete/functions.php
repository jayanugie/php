<?php

$connect = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query) {
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc(($result))) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data) {
    global $connect;

    // ambil data dari tiap elemen form
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);
    /**
     * htmlspecialchars digunakan untuk menghindari user untuk 
     * menulis dan mengaplikasikan tag html pada input.
     */

    // query insert data
    $query = "INSERT INTO mahasiswa VALUES ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')";
    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}


function delete($id) {
    global $connect;
    mysqli_query($connect, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($connect);
}



?>