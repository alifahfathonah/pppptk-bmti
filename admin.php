<?php
include "koneksi.php";
session_start();

if (empty($_SESSION['id'])) {
	header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin - Aplikasi Prakerin</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include "dir/navbar.php"; ?>

<br><br>
<div class="content-wrapper" style="min-height: 620px;">

<div class="container-fluid content-web">
<div class="container">

<div class="row">
<div class="col-sm-9">

<a href="tambah-siswa.php"><button class="btn btn-primary">Tambah Data Siswa</button></a><br><br>
<div class="panel panel-primary">
<div class="panel-heading">
Data Siswa Prakerin
</div>
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <th>NIS</th>
      <th>Nama</th>
      <th>Sekolah</th>
      <th>Jurusan</th>
      <th>Alamat</th>
      <th>Gender</th>
      <th>Telepon</th>
      <th>Lab</th>
      <th>Edit</th>
      <th>Hapus</th>
    </tr>
  </thead>
  <tbody>
        <?php
        $query_mysql = mysql_query("SELECT * FROM siswa");
        if (mysql_num_rows($query_mysql)<1) {
            echo "<tr><td colspan=\"10\">Data siswa tidak ditemukan...</td></tr>";
        }

        while($data = mysql_fetch_array($query_mysql)){
        	if ($data['gender'] == 1) {
        		$data['gender'] = "Laki-Laki";
        	} else {
        		$data['gender'] = "Perempuan";
        	}
        ?>
    <tr>
        <td><?php echo $data['nis']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['sekolah']; ?></td>
        <td><?php echo $data['jurusan']; ?></td>
        <td><?php echo $data['alamat']; ?></td>
        <td><?php echo $data['gender']; ?></td>
        <td><?php echo $data['phone']; ?></td>

        <?php
        $sql = mysql_query("SELECT nama FROM lab WHERE id='$data[lab]'");
        $ress = mysql_fetch_array($sql);
        echo "<td>$ress[nama]</td>";
        ?>


        <td><a href="edit-siswa.php?id=<?php echo $data['id']; ?>"><i class="fa fa-edit fa-2x"></i></a></td>
        <td><a href="#" data-toggle="modal" data-target="#myModal<?php echo $data['id']; ?>"><i class="fa fa-trash fa-2x"></i></a></td>
        <div class="modal fade" id="myModal<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <b class="modal-title" id="myModalLabel">Hapus data siswa</b>
        </div>
        <div class="modal-body">
        <i class="fa fa-exclamation-triangle"></i> Data siswa akan dihapus permanen...
        <br><br>
        <button class="btn-modal btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
        <a href="hapus-siswa.php?id=<?php echo $data['id']; ?>"><button class="btn-modal btn btn-danger">Lanjutkan</button></a>
        </div>
        </div>
        </div>
        </div>
      </tr>
<?php } ?>

</tbody>
</table>
</div>

</div>

</div>

<div class="col-sm-3">
<a href="tambah-lab.php"><button class="btn btn-primary">Tambah Data LAB</button></a><br><br>

<div class="panel panel-primary">
<div class="panel-heading">
	LAB Komputer
</div>

<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <th>Nama LAB</th>
      <th>Edit</th>
      <th>Hapus</th>
    </tr>
  </thead>
  <tbody>
        <?php 
        $query_mysqli = mysql_query("SELECT * FROM lab");
        if (mysql_num_rows($query_mysqli)<1) {
            echo "<tr><td colspan=\"3\">Data Laboratorium tidak ditemukan...</td></tr>";
        }

        while($datas = mysql_fetch_array($query_mysqli)){
        ?>
    <tr>
      <td><?php echo $datas['nama']; ?></td>
      <td><a href="edit-lab.php?id=<?php echo $datas['id']; ?>"><i class="fa fa-edit fa-2x"></i></a></td>
      <td><a href="#" data-toggle="modal" data-target="#myModals<?php echo $datas['id']; ?>"><i class="fa fa-trash fa-2x"></i></a></td>
        <div class="modal fade" id="myModals<?php echo $datas['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <b class="modal-title" id="myModalLabel">Hapus Data Laboratorium</b>
        </div>
        <div class="modal-body">
        <i class="fa fa-exclamation-triangle"></i> Data Laboratorium akan dihapus permanen...
        <br><br>
        <button class="btn-modal btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
        <a href="hapus-lab.php?id=<?php echo $datas['id']; ?>"><button class="btn-modal btn btn-danger">Lanjutkan</button></a>
        </div>
        </div>
        </div>
        </div>

      </tr>
<?php } ?>

  </tbody>
</table>
</div>

</div>
</div>

</div>

</div>
</div>

<div class="container panel-body">
<?php include "dir/footer.php"; ?>
</div>
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>