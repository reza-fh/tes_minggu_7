<?php

include "connection.php";

$input=$db->exec("INSERT INTO Table_siswa(nama_siswa,sekolah,motivasi) VALUES('".$_POST["nama_siswa"]."','".$_POST["sekolah"]."','".$_POST["motivasi"]."')");
if ($input) {
    header("Location:index.php");
}

// var_dump($_POST); 