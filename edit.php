<?php

include "connection.php";

$siswa=$db->query("select * from Table_siswa where id_siswa=".$_GET["id_siswa"]);

$data_siswa=$siswa->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Update</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    
<div class="container">
    <div class="row">
        <div class="col">
            <form action="update.php" method="POST">
                <input type="hidden" name="id_siswa" value="<?php echo $data_siswa[0]["id_siswa"]; ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" name="nama_siswa" value="<?php echo $data_siswa[0]["nama_siswa"]; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Sekolah</label>
                <input type="text" name="sekolah" value="<?php echo $data_siswa[0]["sekolah"]; ?>" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Motivasi</label>
                <input type="text" name="motivasi" value="<?php echo $data_siswa[0]["motivasi"]; ?>" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
</div>

<?php

include 'connection.php';
$siswa=$db->query("select * from Table_tim where id_tim=".$_GET["id_tim"]);

$data_siswa=$siswa->fetchAll();

?>

    
<div class="container">
    <div class="row">
        <div class="col">
            <form action="update.php" method="POST">
                <input type="hidden" name="id_siswa" value="<?php echo $data_siswa[0]["id_tim"]; ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" name="nama_siswa" value="<?php echo $data_siswa[0]["id_siswa"]; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Sekolah</label>
                <input type="text" name="sekolah" value="<?php echo $data_siswa[0]["nama_tim"]; ?>" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>