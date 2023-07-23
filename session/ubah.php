<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
</head>
<body>
    <?php
        session_start();

        if(!isset($_SESSION["login"])){
            header("Location: login.php");
            exit;
        }

        require 'functions.php';

        $id = $_GET["id"];

        $ubah_data = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

        if ($_POST) {
            if (ubah_data($_POST) > 0) {
                header("Location: index.php");
            }
            else {
                echo "Gagal mengubah data";
            }
        }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $ubah_data['id']?>">
        <input type="hidden" name="gambar_lama" value="<?= $ubah_data['id']?>">
        <label for="nim">NIM: </label>
        <input type="text" name="nim" id="nim" value="<?= $ubah_data['nim']?>" required><br>
        <label for="nama">Nama: </label>
        <input type="text" name="nama" id="nama" value="<?= $ubah_data['nama']?>" required><br>
        <label for="email">Email: </label>
        <input type="text" name="email" id="email" value="<?= $ubah_data['email']?>" required><br>
        <label for="jurusan">Jurusan: </label>
        <input type="text" name="jurusan" id="jurusan" value="<?= $ubah_data['jurusan']?>" required><br>
        <label for="gambar">Gambar: </label><br>
        <img src="<?= $ubah_data['gambar'] ?>" alt="gambar profil" width="50" height="50"><br>
        <input type="file" name="gambar" id="gambar" value="<?= $ubah_data['gambar']?>"><br>
        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>