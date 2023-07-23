<?php
date_default_timezone_set('Asia/Jakarta');

function greeting($nama){
    $greet = "Selamat ";

    if(date('H') >= 5 && date('H') <= 10){
        $greet .= "pagi, ";
    }
    else if(date('H') >= 11 && date('H') <= 14 ){
        $greet .= "siang, ";
    }
    else if(date('H') >= 15 && date('H') <= 18){
        $greet .= "sore, ";
    }
    else{
        $greet .= "malam, ";
    }

    return $greet . $nama . '!';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function</title>
</head>
<body>
    <?php
        echo greeting('Johansen');
    ?>
</body>
</html>