<?php 

require_once('../../config/koneksi_db.php');
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=utf8');


// Mendapatkan id_surat dari parameter GET
$id_surat = $_GET['id_surat'];

// Query untuk mendapatkan data dokumen dari database
$query = "SELECT id_surat, nama_file, tipe_file, ukuran_file, path_file FROM dokumen WHERE id_surat = '$id_surat'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
  // Membuat array untuk menyimpan data dokumen
  $dokumen = array();
  
  // Looping untuk mendapatkan data dokumen dari hasil query
  while ($row = mysqli_fetch_assoc($result)) {
    $dokumen[] = $row;
  }

  // Mengirimkan data dokumen dalam format JSON
  header('Content-Type: application/json');
  echo json_encode($dokumen);
} else {
  echo "Dokumen tidak ditemukan";
}

// Menutup koneksi ke database
mysqli_close($conn);

?>