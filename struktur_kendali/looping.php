<?php
    
// looping for

for($i = 0; $i < 10; $i++){
    echo "Ini adalah perulangan ke $i<br>";
}

// looping while

$i = 10;
while($i > 0){
    echo 'Ini adalah perulangan ke-' . $i . ' dari belakang <br>';
    $i--;
}

// do while

$i = 10;
do {
    echo 'Ini adalah perulangan menggunakan do-while';
    $i--;
}
while($i > 20);

?>