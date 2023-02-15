<?php 
    require "../helpers/helpers.php";
    require_once("../config/koneksi_db.php");
    if (isset($_POST["tanggal_surat"]) &&
        isset($_POST["tanggal_entry"]) &&
        isset($_POST["jenis_surat"]) &&
        isset($_POST["asal_surat"]) &&
        isset($_POST["keterangan"]) &&
        isset($_POST["tag"]) &&
        isset($_POST["dokumen"])
    ) {
        $tanggal_surat = $_POST["tanggal_surat"];
        $tanggal_entry = $_POST["tanggal_entry"];
        $jenis_surat = $_POST["jenis_surat"];
        $asal_surat = $_POST["asal_surat"];
        $keterangan = $_POST["keterangan"];
        $tag = $_POST["tag"];
        $dokumen = upload();
        if (!$dokumen) {
            return false;
        }

        $query = "INSERT INTO surat VALUES ('', '$tanggal_surat', '$tanggal_entry', '$jenis_surat', '$asal_surat', '$keterangan', '$tag', '$dokumen')";
        
        $sql = mysqli_query($conn, $query);

        if ($sql) {
            echo json_encode(array('RESPONSE' => 'SUCCESS'));
        } else {
            echo "GAGAL";
        }

    }

?>