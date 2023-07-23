<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nim">NIM: </label>
        <input type="text" name="nim" id="nim" required><br>
        <label for="nama">Nama: </label>
        <input type="text" name="nama" id="nama" required><br>
        <label for="email">Email: </label>
        <input type="text" name="email" id="email" required><br>
        <label for="jurusan">Jurusan: </label>
        <input type="text" name="jurusan" id="jurusan" required><br>
        <label for="gambar">Gambar: </label>
        <input type="file" name="gambar" id="gambar"><br>
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
        session_start();

        if(!isset($_SESSION["login"])){
            header("Location: login.php");
            exit;
        }
        
        require 'functions.php';

        if ($_POST) {
            if (tambah_data($_POST) > 0) {
                header("Location: index.php");
            }
            else {
                echo "Gagal menambahkan data";
            }
        }
    ?>
</body>
</html>