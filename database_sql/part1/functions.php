<?php

$host = "localhost"; // nama host (biasanya localhost)
$user = "root"; // username untuk database MySQL
$password = ""; // password untuk database MySQL
$database = "phpdasar"; // nama database yang telah dibuat sebelumnya

// membuat koneksi ke database
$conn = mysqli_connect($host, $user, $password, $database);

// cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
echo "<script>console.log('Koneksi berhasil');</script>";

// query data database

$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

function query ($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($mhs = mysqli_fetch_row($result)) {
        $rows[] = $mhs;
    }

    return $rows;
}

if (!$result) {
    echo "Koneksi gagal: " . mysqli_error($conn);
}

// while ($mhs = mysqli_fetch_row($result)) {
//     print_r($mhs);
// }

?>
