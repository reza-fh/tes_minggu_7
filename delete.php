<?php

include "connection.php";

$delete=$db->exec("DELETE FROM Table_siswa WHERE id_siswa=".$_GET["id_siswa"]);

if ($delete) {
    header("Location:index.php");
}

// var_dump($_GET['id_siswa']);