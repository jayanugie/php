<?php 

require "functions.php";

$id = $_GET["id"];

if (delete($id) > 0) {
    echo "
        <script>
            alert('Surat berhasil dihapus.');
            document.location.href = 'index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Surat gagal dihapus.');
            document.location.href = 'index.php';
        </script>
    ";
}

?>