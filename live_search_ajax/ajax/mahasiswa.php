<?php

require '../functions.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM mahasiswa 
WHERE nama LIKE '%$keyword%' OR
nim LIKE '%$keyword%' OR
email LIKE '%$keyword%' OR
jurusan LIKE '%$keyword%'";

$mahasiswa = query($query);
?>

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
