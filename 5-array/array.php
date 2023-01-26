<?php 
// array
// variabel yg dapat memiliki banyak nilai
// elemen pada array boleh memiliki tipe data yang berbeda
// pasangan antara key dan value, keynya adalah index (yg dimulai dari nol)

$bulan = ["Januari", "Februari", "Maret"];
$arr = [123, "string", false];

// Menampilkan Array
// var_dump(), print_r()  -> debugging

// var_dump($bulan);
// echo "<br>";
// print_r($arr);
// echo "<br>";

// menampilkan 1 elemen pada array
// echo $bulan[2];
// echo "<br>";
// echo $arr[0];


// menambahkan elemen baru pada array
var_dump($bulan);
$bulan[] = "April";
$bulan[] = "Mei";
echo "<br>";
var_dump($bulan);


?>