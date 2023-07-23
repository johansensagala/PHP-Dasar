<?php

require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

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
    
<h1>Daftar Mahasiswa</h1>

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
            <a href="">Ubah</a> |
            <a href="">Hapus</a> |
        </td>
        <td>
            <img src=<?php echo $mhs[5] ?> alt="foto <?php echo $mhs[1] ?>" width="50">
        </td>
        <td><?php echo $mhs[2] ?></td>
        <td><?php echo $mhs[1] ?></td>
        <td><?php echo $mhs[3] ?></td>
        <td><?php echo $mhs[4] ?></td>
    </tr>
    <?php
        $no++;
        }
    ?>
</table>

</body>
</html>