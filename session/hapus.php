<?php

session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id = $_GET["id"];

if (hapus_data($id) > 0) {
    header("Location: index.php");
}
else {
    echo "Gagal menghapus data";
}

?>