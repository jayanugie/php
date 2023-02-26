<?php 
    require_once('../config/koneksi_db.php');
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json; charset=utf8');


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $id = $_POST['id'];
        $tanggal_surat = $_POST['tanggal_surat'];
        $tanggal_entry = $_POST['tanggal_entry'];
        $jenis_surat = $_POST['jenis_surat'];
        $asal_surat = $_POST['asal_surat'];
        $keterangan = $_POST['keterangan'];
        $tag = $_POST['tag'];

        $sql = "UPDATE surat SET 
                    tanggal_surat = '$tanggal_surat',
                    tanggal_entry = '$tanggal_entry',
                    jenis_surat = '$jenis_surat',
                    asal_surat = '$asal_surat',
                    keterangan = '$keterangan',
                    tag = '$tag'
                WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            $response = array(
                'status' => true,
                'message' => 'Data berhasil diupdate.'
            );
        } else {
            $response = array(
                'status' => false,
                'message' => 'Error: ' . $sql . '<br>' . $conn->error
            );
        }
    } else {
        $response = array(
            'status' => false,
            'message' => 'Invalid Request'
        );
    }

    $conn->close();

    echo json_encode($response);



?>