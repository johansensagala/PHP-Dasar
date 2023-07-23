<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h3>Selamat Datang, <?php echo $_GET['nama'] ?>!</h3>
    <div>Nama: <?php echo $_GET['nama'] ?></div>
    <div>Jurusan: <?php echo $_GET['jurusan'] ?></div>
    <div>NIM: <?php echo $_GET['nim'] ?></div>
</body>
</html>