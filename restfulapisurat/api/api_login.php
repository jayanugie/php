<?php
    require_once('../config/koneksi_db.php');
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json; charset=utf8');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // lakukan validasi input
        if (empty($username) || empty($password)) {
            $response = array(
                'status' => false,
                'message' => 'Kolom username atau password tidak boleh kosong'
            );
            echo json_encode($response);
            return;
        }

        // cek apakah user terdaftar di database
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // user ditemukan, set session atau token dan kembalikan response
            session_start();
            $_SESSION['username'] = $username;

            $response = array(
                'status' => true,
                'message' => 'Login berhasil',
            );
            echo json_encode($response);
        } else {
            // user tidak ditemukan, kembalikan response
            $response = array(
                'status' => false,
                'message' => 'Username atau password salah'
            );
            echo json_encode($response);
        }
        $conn->close();
    } else {
        // request tidak valid, kembalikan response
        $response = array(
            'status' => false,
            'message' => 'Invalid Request'
        );
        echo json_encode($response);
        
        $conn->close();
    }
?>