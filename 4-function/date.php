<?php
// DATE
// untuk menampilkan tanggal dengan format
echo date("l, d-M-Y");

echo "<br>";

// TIME
// UNIX Timestamp / EPOCH time
echo time(); // detik yang sudah berlalu sejak 1 Januari 1970

echo "<br>";

// menghitung 100 hari dari sekarang hari apa
echo date("d M Y", time()+60*60*24*100);

echo "<br>";

// mktime
// membuat sendiri detik
// mktime(0,0,0,0,0,0)
// jam, menit, detik, bulan, tanggal, tahun
echo date("l", mktime(0,0,0,12,14,1998));  // menghitung hari pada tanggal lahir

echo "<br>";

// strtotime
// format tanggal, munculnya detik
echo date("l", strtotime("14 dec 1998"));



/*
FUNGSI LAINNYA:

STRING
-> strlen() = untuk menghitung panjang sebuah string
-> strcmp() = membandingkan dua buah string
-> explode() = memecah sebuah string menjadi array
-> htmlspecialchars() = menjaga kita dari orang yg ingin masuk ke website kita

UTILITY
-> var_dump() = untuk mencetak isi dari sebuah variabel, array, object
-> isset() = cek apakah variabel sudah pernah dibuat atau belum (false atau true)
-> empty() = apakah variabel yg ada apakah kosong atau tidak
-> die() = memberhentikan program yg di bawahnya
-> sleep() = memberhentikan sementara program
*/



?>