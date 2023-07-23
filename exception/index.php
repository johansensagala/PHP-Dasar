<?php

function divide($numerator, $denominator) {
    if ($denominator === 0) {
        throw new Exception("Pembagian oleh nol tidak diperbolehkan!");
    }
    return $numerator / $denominator;
}

try {
    $result = divide(10, 0);
    echo "Hasil pembagian: " . $result;
} catch (Exception $e) {
    echo "Terjadi kesalahan: " . $e->getMessage();
}

?>