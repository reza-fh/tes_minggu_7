<?php 

include "connection.php";
$siswa=$db->query("select * from Table_siswa");
$data=$siswa->fetchAll();

if(isset($_POST['search']))
{
    $filter=$_POST['search'];
    $search=$db->prepare("select * from Table_siswa where nama_siswa=? or sekolah=? or motivasi=?");
    $search->bindValue(1,$filter,PDO::PARAM_STR);
    $search->bindValue(2,$filter,PDO::PARAM_STR);
    $search->bindValue(3,$filter,PDO::PARAM_STR);
    $search->execute();     

    $tampil_data=$search->fetchAll();
    $row=$search->rowCount();
  
}else{
    $data=$db->query("select * from Table_siswa");
    $tampil_data=$data->fetchAll();
  
}

$temp_arr=[];
foreach ($data as $value) {
    $temp_arr[]=$value['sekolah'];
}
$temp_new=array_unique($temp_arr);

$showFilter=[];
if (isset($_POST['filter'])) {
  $filter=$_POST['filter'];
  if ($filter=="") {
    $showFilter=$data;
  }else {
    foreach ($data as $key) {
      if ($key[2]==$filter) {
        $showFilter[]=[$key['id_siswa'],$key['nama_siswa'],$key['sekolah'],$key['motivasi']];
      }
    }
  }
}else {
  $showFilter=$data;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>My SQL</title>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col">

    <div class="d-flex mx-auto mt-2">
       <h2 class="mx-auto">~ Tabel Siswa Magang ~</h2>
   </div>

    
<table class="table table-striped border 1px">
  <thead>
    <tr>
      <th scope="col">Id Siswa</th>
      <th scope="col">Nama Siswa</th>
      <th scope="col">Sekolah</th>
      <th scope="col">Motivasi</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($data as $key) : ?>
    <tr>
      <td><?php echo $key["id_siswa"]; ?></td>
      <td><?php echo $key["nama_siswa"]; ?></td>
      <td><?php echo $key["sekolah"]; ?></td>
      <td><?php echo $key["motivasi"]; ?></td>
      <td><a class="btn btn-light" data-toggle="modal" data-target="#hapus">hapus</a>|<a class="btn btn-light" href="edit.php?id_siswa=<?php echo $key["id_siswa"]; ?>">edit</a></td>
    </tr>
      <?php endforeach; ?>
  </tbody>
</table>
</div>
  </div>
</div>

<!-- form input siswa -->

<div class="container">
    <div class="row">
        <div class="col-6">
            <form action="input.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="nama_siswa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Sekolah</label>
                    <input type="text" name="sekolah" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Motivasi</label>
                    <input type="text" name="motivasi" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>

       <div class="col-6">
       <h2><i>Cari Data Siswa</i></h2>
        <?php if(isset($row)): ?>
        <div class="alert alert-warning alert-dimissinle fade show" role="alert">
          <p class="lead"> <?php echo $row; ?>Data Ditemukan</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria_hidden="true">&times;</span>
          </button>
        </div>
          <?php endif; ?>
          <form class="form-inline" action="index.php" method="POST">
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" name="search" placeholder="nama_siswa">
                    <input type="submit" value="Cari">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Munculkan Popup -->

<div class="modal" id="hapus" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Popup Hapus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin Ingin Menghapus Data Siswa</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-secondary"><a style="color: white" href="delete.php?id_siswa=<?php echo $key["id_siswa"]; ?>">hapus</a></button>
      </div>
    </div>
  </div>
</div>

<div class="d-flex mx-auto">
  <h2 class="mx-auto">~ Tabel Tim ~</h2>
</div>

<div class="container">
  <div class="row">
    <div class="col">

    <div class="d-flex mx-auto mt-2">
       <h2 class="mx-auto">~ Tabel Siswa Magang ~</h2>
   </div>

    
<table class="table table-striped border 1px">
  <thead>
    <tr>
      <th scope="col">Id Tim</th>
      <th scope="col">Id Siswa</th>
      <th scope="col">Nama Tim</th>
      
    </tr>
  </thead>
  <tbody>
      <?php foreach ($data as $key) : ?>
    <tr>
      <td><?php echo $key["id_tim"]; ?></td>
      <td><?php echo $key["id_Siswa"]; ?></td>
      <td><?php echo $key["nama_tim"]; ?></td>
      <td><a class="btn btn-light" data-toggle="modal" data-target="#hapus">hapus</a>|<a class="btn btn-light" href="edit.php?id_siswa=<?php echo $key["id_siswa"]; ?>">edit</a></td>
    </tr>
      <?php endforeach; ?>
  </tbody>
</table>
</div>
  </div>
</div>

<!-- form input siswa -->

<div class="container">
    <div class="row">
        <div class="col-6">
            <form action="input.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="nama_siswa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Sekolah</label>
                    <input type="text" name="sekolah" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Motivasi</label>
                    <input type="text" name="motivasi" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>

       <div class="col-6">
       <h2><i>Cari Data Siswa</i></h2>
        <?php if(isset($row)): ?>
        <div class="alert alert-warning alert-dimissinle fade show" role="alert">
          <p class="lead"> <?php echo $row; ?>Data Ditemukan</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria_hidden="true">&times;</span>
          </button>
        </div>
          <?php endif; ?>
          <form class="form-inline" action="index.php" method="POST">
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" name="search" placeholder="nama_siswa">
                    <input type="submit" value="Cari">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Munculkan Popup -->

<div class="modal" id="hapus" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Popup Hapus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin Ingin Menghapus Data Siswa</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-secondary"><a style="color: white" href="delete.php?id_siswa=<?php echo $key["id_siswa"]; ?>">hapus</a></button>
      </div>
    </div>
  </div>
</div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>