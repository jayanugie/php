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

    // upload gambar
    $dokumen = upload();
    if (!$dokumen) {
        return false;
    }

    
    $query = "INSERT INTO surat VALUES ('', '$tanggal_surat', '$tanggal_entry', '$jenis_surat', '$asal_surat', '$keterangan', '$tag', '$dokumen')";

    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}


function upload() {
    $nama_file = $_FILES['dokumen']['name'];
    $ukuran_file = $_FILES['dokumen']['size'];
    $error = $_FILES['dokumen']['error'];
    $tmp_name = $_FILES['dokumen']['tmp_name'];

    if ($error === 4) {
        echo "
            <script>
                alert('Pilih dokumen terlebih dahulu!');
            </script>
        ";
        return false;
    }

    $ekstensi_dokumen_valid = ['doc', 'docx', 'pdf', 'xlsx'];
    $ekstensi_dokumen = explode('.', $nama_file);
    $ekstensi_dokumen = strtolower(end($ekstensi_dokumen));

    if (!in_array($ekstensi_dokumen, $ekstensi_dokumen_valid)) {
        echo "
            <script>
                alert('Yang Anda upload bukan dokumen!');
            </script>
        ";
        return false;
    }

    if ($ukuran_file > 1000000) {
        echo "
            <script>
                alert('Ukuran gambar terlalu besar!');
            </script>
        ";
        return false;
    }

    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_dokumen;

    move_uploaded_file($tmp_name, 'berkas/'.$nama_file_baru);

    return $nama_file_baru;
}


function delete($id) {
    global $connect;
    $file = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM surat WHERE id = '$id' "));

    unlink('berkas/'.$file["dokumen"]);
    mysqli_query($connect, "DELETE FROM surat WHERE id='$id' ");

    return mysqli_affected_rows($connect);
}


function update($data) {
    global $connect;

    $id = $data["id"];
    $tanggal_surat = $data["tanggal_surat"];
    $tanggal_entry = $data["tanggal_entry"];
    $jenis_surat = htmlspecialchars($data["jenis_surat"]);
    $asal_surat = htmlspecialchars($data["asal_surat"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $tag = htmlspecialchars($data["tag"]);
    $dokumen_lama = $data["dokumen_lama"];

    if($_FILES['dokumen']['error'] === 4) {
        $dokumen = $dokumen_lama;
    } else {
        unlink('berkas/'.$dokumen_lama);
        $dokumen = upload();
    }

    $query = "UPDATE surat SET 
                tanggal_surat = '$tanggal_surat', 
                tanggal_entry = '$tanggal_entry',
                jenis_surat = '$jenis_surat',
                asal_surat = '$asal_surat',
                keterangan = '$keterangan',
                tag = '$tag',
                dokumen = '$dokumen'
              WHERE id = $id
            ";
    
    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}


function search($keyword) {
    $query = "SELECT * FROM surat WHERE 
                tag LIKE '%$keyword%' OR
                tanggal_surat LIKE '%$keyword%' OR
                tanggal_entry LIKE '%$keyword%' OR
                jenis_surat LIKE '%$keyword%' OR
                asal_surat LIKE '%$keyword%' OR
                tag LIKE '%$keyword%' OR
                dokumen LIKE '%$keyword%' 
            ";

    return query($query);
}

?>