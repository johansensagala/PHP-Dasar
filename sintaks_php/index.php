<?php
/* Sintaks PHP

Standar Output
echo, print
print_r
var_dump */

echo "Johansen Sagala<br>";
print "Johansen Sagala<br>";
var_dump("Johansen Sagala");
print "<br>";
echo 123;
echo "<br>";
echo true;

$nama = "Johansen";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
    <h1>Selamat Datang! <?php echo "Johansen" ?></h1>
    <?php echo "<p>Ini adalah paragraf!</p>" ?>
    <p><?php echo "Sekali lagi, selamat datang $nama!" ?></p>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 2</title>
</head>
<body>
    <p><?php echo "Ini adalah file HTML ke-2" ?></p>
    <?php 
    echo '<p>Selamat datang, $nama</p>'; // kutip satu tidak dapat menampung nama variabel (interpolasi)
    echo '<p>Selamat datang, </p>' . $nama;
    echo '<br>';

    $nama = "Johansen";
    $nama .= " ";
    $nama .= "Sagala";

    echo $nama;
    ?>

</body>
</html>