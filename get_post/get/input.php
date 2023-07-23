<?php

$mahasiswa = [
    ["nama" => "Johansen",
    "jurusan" => "Teknik Informatika",
    "nim" => 2081031],
    ["nama" => "Jonatan",
    "jurusan" => "Perkebunan",
    "nim" => 2081032],
    ["nama" => "Irpan",
    "jurusan" => "Teknik Sipil",
    "nim" => 2081033],
    ["nama" => "Josua",
    "jurusan" => "Hukum",
    "nim" => 2081034]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data</title>
</head>
<body>
    <div>
        <ul>
            <?php foreach ($mahasiswa as $mhs) : ?>
                <li>
                    <?php foreach ($mhs as $m) :?>
                        <h3><a href="output.php?nama=<?php echo $mhs['nama'] ?>&jurusan=<?php echo $mhs['jurusan'] ?>&nim=<?php echo $mhs['nim'] ?>">
                    <?php endforeach ?>
                    <?php echo $mhs['nama'] ?></a></h3>
                </li>
            <?php endforeach ?>
        </ul>   
    </div>
</body>
</html>