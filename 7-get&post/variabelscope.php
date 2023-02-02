<?php
// variable scope / ligkup variabel
$x = 10;

function tampilX() {
    global $x;   // global untuk mengambil data dari luar lingkup func
    echo $x;
}

tampilX();
echo "<br>";
echo $x;

?>