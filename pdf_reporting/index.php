<?php

session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

// $data = "SELECT * FROM mahasiswa";

$mahasiswa = query("SELECT * FROM mahasiswa");

if(isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
    <style>
        .loading {
            width: 100px;
            position: absolute;
            top: 105px;
            left: 150px;
            z-index: -1;
            display: none;
        }

    @media print {
        .logout, .tambah, .cari, .aksi {
            display: none;
        }
    }

    </style>
</head>
<body>

<a href="logout.php" class="logout">Logout</a>
    
<h1>Daftar Mahasiswa</h1>
<a href="tambah.php" class="tambah">Tambah Data</a><br><br>

<form action="" method="post" class="cari">
    <input type="text" name="keyword" placeholder="Masukkan keyword pencarian" autocomplete="off" id="keyword" autofocus>
    <button type="submit" name="cari" id="tombol-cari">Cari</button>
    <img src="loading.gif" class="loading">
</form>

<div id="container">

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No. Urut</th>
        <th class="aksi">Aksi</th>
        <th>Gambar</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>
    <?php
        $no = 1;
        foreach($mahasiswa as $mhs) {
    ?>
    <tr>
        <?php
            echo "<td>$no</td>";
        ?>
        <td class="aksi">
            <a href="ubah.php?id=<?php echo $mhs["id"] ?>">Ubah</a> |
            <a href="hapus.php?id=<?php echo $mhs["id"] ?>" onclick="return confirm('Yakin?');">Hapus</a> |
        </td>
        <td>
            <img src=<?php echo $mhs["gambar"] ?> alt="foto <?php echo $mhs["nama"] ?>" width="50">
        </td>
        <td><?php echo $mhs["nim"] ?></td>
        <td><?php echo $mhs["nama"] ?></td>
        <td><?php echo $mhs["email"] ?></td>
        <td><?php echo $mhs["jurusan"] ?></td>
    </tr>
    <?php
        $no++;
        }
    ?>
</table>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>