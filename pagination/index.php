<?php

session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

// $data = "SELECT * FROM mahasiswa";

$jumlah_perhal = 5;
$jumlah_data = count(query("SELECT * FROM MAHASISWA"));
$jumlah_hal = ceil($jumlah_data / $jumlah_perhal);
$page = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
// $awal_data = ($page - 1) * $jumlah_perhal;   
$awal_data = ($page - 1) * $jumlah_perhal;

$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awal_data, $jumlah_perhal");

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
            echo "<td>" . ($no + $awal_data) . "</td>";
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
</table><br>

<?php if($page > 1) :?>
    <a href="?halaman=<?= $page - 1 ?>" style="font-weight: normal;">&laquo;</a>
<?php endif; ?>

<?php for($i = 1; $i <= $jumlah_hal; $i++) :?>
    <?php if($i == $page) : ?>
        <span style="font-weight: bold;"><?= $i; ?></span>
    <?php else: ?>
        <a href="?halaman=<?= $i ?>" style="font-weight: normal;"><?= $i; ?></a>
    <?php endif; ?>
<?php endfor; ?>

<?php if($page < $jumlah_hal) :?>
    <a href="?halaman=<?= $page + 1 ?>" style="font-weight: normal;">&raquo;</a>
<?php endif; ?>

</body>
</html>