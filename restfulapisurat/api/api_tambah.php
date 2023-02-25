<?php 
    require_once('../config/koneksi_db.php');
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json; charset=utf8');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $tanggal_surat = $_POST["tanggal_surat"];
        $tanggal_entry = $_POST["tanggal_entry"];
        $jenis_surat = $_POST["jenis_surat"];
        $asal_surat = $_POST["asal_surat"];
        $keterangan = $_POST["keterangan"];
        $tag = $_POST["tag"];

        $sql = "INSERT INTO surat VALUES ('', '$tanggal_surat', '$tanggal_entry', '$jenis_surat', '$asal_surat', '$keterangan', '$tag')";

        $query = mysqli_query($conn, $sql);

        if ($query) {
            $id = mysqli_insert_id($conn);
            $data = [
                'status' => 'SUCCESS',
                'message' => 'Surat berhasil ditambahkan.',
                'id' => $id
            ];
            echo json_encode([$data]);
        } else {
            $data = [
                'status' => 'FAILED',
                'message' => 'Surat gagal ditambahkan.'
            ];
            echo json_encode([$data]);
        }

        mysqli_close($conn);

    }

?>