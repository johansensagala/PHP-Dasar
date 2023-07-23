<?php

require 'functions.php';

if (isset($_POST["register"])){
    if(registrasi($_POST) > 0){
        echo "<script>alert('User baru berhasil ditambahkan!')</script>";
    }
    else{
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>
    
<h1>Halaman Registrasi</h1>

<form action="" method="post">
    <label for="username">Username: </label>
    <input type="text" name="username" id="username">
    <label for="password">Password: </label>
    <input type="password" name="password" id="password">
    <label for="password_confirm">Konfirmasi password: </label>
    <input type="password" name="password_confirm" id="password_confirm"><br>
    <div id="alert"></div>
    <button type="submit" name="register">Register</button>
</form>

</body>
</html>