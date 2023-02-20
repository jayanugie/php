<?php 
    require_once('../config/koneksi_db.php');
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json; charset=utf8');

    // Mengambil parameter "q" dari query string
    $q = $_GET['q'];

    // Membuat query untuk mencari data yang sesuai dengan parameter "q"
    $sql = "SELECT * FROM surat WHERE 
            tanggal_surat LIKE '%$q%' OR 
            tanggal_entry LIKE '%$q%' OR
            jenis_surat LIKE '%$q%' OR 
            asal_surat LIKE '%$q%' OR 
            tag LIKE '%$q%' OR
            keterangan LIKE '%$q%'
        ";

    // Menjalankan query dan mengambil data hasil pencarian
    $result = mysqli_query($conn, $sql);

    // Membuat array untuk menyimpan hasil pencarian
    $search_results = array();

    // Memasukkan data hasil pencarian ke dalam array
    while ($row = mysqli_fetch_assoc($result)) {
        $search_results[] = $row;
    }

    // Mengubah array menjadi format JSON dan mengirimkan sebagai response API
    echo json_encode($search_results);

    // menutup koneksi ke database
    mysqli_close($conn);

?>