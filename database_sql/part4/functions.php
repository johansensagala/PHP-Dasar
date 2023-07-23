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

global $data;
global $mahasiswa;

function query ($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($mhs = mysqli_fetch_assoc($result)) {
        $rows[] = $mhs;
    }

    return $rows;
}

function tambah_data ($data) {
    global $conn;
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "INSERT INTO mahasiswa (id, nama, nim, email, jurusan, gambar) VALUES ('', '$nama', '$nim', '$email', '$jurusan', '$gambar')";

    $tambah = mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus_data ($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah_data ($data) {
    global $conn;
    
    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', email = '$email', jurusan = '$jurusan', gambar = '$gambar' WHERE id = $id";

    $tambah = mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari ($keyword) {
    $query = "SELECT * FROM mahasiswa 
              WHERE nama LIKE '%$keyword%' OR
              nim LIKE '%$keyword%' OR
              email LIKE '%$keyword%' OR
              jurusan LIKE '%$keyword%'";

    return query($query);
}
?>
