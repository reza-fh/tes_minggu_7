<?php 


function tabelSiswa() 
{
    include 'connection.php';

    try {
        $nama= $db->query('SELECT * FROM Table_siswa');
        return $nama->fetchAll();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "</br>";
    }
}

function tabelTim() 
{
    include 'connection.php';

    try {
        return $db->query('SELECT * FROM Table_Tim');
        return $nama->fetchAll();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "</br>";
    }
}


function insertTim() 
{
    include 'connection.php';

    try {
        return $db->query('INSERT INTO Table_Tim (id_siswa,nama_tim) VALUES ("'.$_POST["id_siswa"].'","'.$_POST["id_siswa"]."')");
        return $nama->fetchAll();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "</br>";
    }
}


