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
</head>
<body>

<a href="logout.php">Logout</a>
    
<h1>Daftar Mahasiswa</h1>
<a href="tambah.php">Tambah Data</a><br><br>

<form action="" method="post">
    <input type="text" name="keyword" placeholder="Masukkan keyword pencarian" autocomplete="off" autofocus>
    <button type="submit" name="cari">Cari</button>    
</form>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No. Urut</th>
        <th>Aksi</th>
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
        <td>
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

</body>
</html>