<?php 

$connect = mysqli_connect("localhost", "root", "", "dokumentasi_surat");


function query($query) {
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc(($result))) {
        $rows[] = $row;
    }
    return $rows;
}


function create($data) {
    global $connect;

    $tanggal_surat = $data["tanggal_surat"];
    $tanggal_entry = $data["tanggal_entry"];
    $jenis_surat = htmlspecialchars($data["jenis_surat"]);
    $asal_surat = htmlspecialchars($data["asal_surat"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $tag = htmlspecialchars($data["tag"]);

    $directory = "berkas/";
    $dokumen = $_FILES['dokumen']['name'];
    move_uploaded_file($_FILES['dokumen']['tmp_name'], $directory.$dokumen);
    
    $query = "INSERT INTO surat VALUES ('', '$tanggal_surat', '$tanggal_entry', '$jenis_surat', '$asal_surat', '$keterangan', '$tag', '$dokumen')";

    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}


function delete($id) {
    global $connect;
    mysqli_query($connect, "DELETE FROM surat WHERE id = $id");

    return mysqli_affected_rows($connect);
}


?>