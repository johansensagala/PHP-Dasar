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
    
    // upload gambar
    $gambar = upload();

    if(!$gambar) {
        return false;
    }

    $query = "INSERT INTO mahasiswa (id, nama, nim, email, jurusan, gambar) VALUES ('', '$nama', '$nim', '$email', '$jurusan', '$gambar')";

    $tambah = mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload () {
    $nama_file = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp_name = $_FILES['gambar']['tmp_name'];

    if($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu')</script>";
    }

    // cek gambar atau tidak
    $ekstensi_valid = ['jpg', 'jpeg', 'png'];
    $ekstensi = explode('.', $nama_file);
    $ekstensi = strtolower((end($ekstensi)));

    if(!in_array($ekstensi, $ekstensi_valid)){
        echo "<script>alert('Yang anda upload bukanlah gambar!')</script>";
    }

    // cek ukuran gambar
    if($ukuran_file > 10000000){
        echo "<script>alert('Ukuran gambar terlalu besar!')</script>";
    }

    // lolos pengecekan
    $nama_file_baru = uniqid(20).$nama_file;

    move_uploaded_file($tmp_name, 'img/'.$nama_file_baru);

    return 'img/'.$nama_file_baru;
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
    $gambar_lama = htmlspecialchars($data["gambar_lama"]);

    if( $_FILES['gambar']['error'] === 4){
        $gambar = $gambar_lama;
    }
    else {
        $gambar = upload();
    }
    
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

function registrasi ($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password_confirm = mysqli_real_escape_string($conn, $data["password_confirm"]);

    // autentikasi username

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert('Username sudah terdaftar!');
        </script>";

        return false;
    }

    // cek konfirmasi password
    if($password != $password_confirm){
        echo "<script>
            alert('Password Tidak cocok');
            // document.getElementById('alert').innerHTML = 'Password Tidak cocok';
        </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambah ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}



?>