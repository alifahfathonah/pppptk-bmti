<?php
include "koneksi.php";
session_start();

if (empty($_SESSION['id'])) {
    header("location: index.php");
}

$id 		= antiinjection($_GET['id']);

if (isset($_POST['submit'])) {
$nis        = antiinjection($_POST['nis']);
$nama       = antiinjection($_POST['nama']);
$sekolah    = antiinjection($_POST['sekolah']);
$jurusan    = antiinjection($_POST['jurusan']);
$alamat     = antiinjection($_POST['alamat']);
$gender     = antiinjection($_POST['gender']);
$phone      = antiinjection($_POST['phone']);
$lab        = antiinjection($_POST['lab']);

mysql_query("UPDATE siswa SET nis='$nis', nama='$nama', sekolah='$sekolah', jurusan='$jurusan', alamat='$alamat', gender='$gender', phone='$phone', lab='$lab' WHERE siswa . id='id'");

header("location: admin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Data Siswa - Aplikasi Prakerin</title>
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
<div class="col-sm-3">

<a href="<?php echo $base_url; ?>">
<div class="panel panel-body panel-primary">
<i class="fa fa-home"></i> Kembali
</div>
</a>

</div>

<div class="col-sm-9">

<div class="panel panel-primary">
<div class="panel-heading">
    Tambah data siswa
</div>

<div class="panel-body">
<div class="table-responsive">

<form method="POST">
<?php

$query_mysql = mysql_query("SELECT * FROM siswa WHERE id='$id'");
if (mysql_num_rows($query_mysql)<1) {
	echo "Data siswa tidak ditemukan...";
}
while($data  = mysql_fetch_array($query_mysql)){

?>

<b>NIS siswa</b>
<input type="number" name="nis" class="form-control" autocomplete="off" value="<?php echo $data['nis']; ?>"/><br>
<b>Nama Siswa</b>
<input type="text" name="nama" class="form-control" autocomplete="off" value="<?php echo $data['nama']; ?>"/><br>
<b>Asal Sekolah</b>
<input type="text" name="sekolah" class="form-control" autocomplete="off" value="<?php echo $data['sekolah']; ?>"/><br>
<b>Jurusan</b>
<input type="text" name="jurusan" class="form-control" autocomplete="off" value="<?php echo $data['jurusan']; ?>"/><br>
<b>Alamat Siswa</b>
<input type="text" name="alamat" class="form-control" autocomplete="off" value="<?php echo $data['alamat']; ?>"/><br>
<b>Jenis Kelamin</b>
<select name="gender" class="form-control">
<option value="1">Laki-Laki</option>
<option value="2">Perempuan</option>
</select>
<br>
<b>Nomor Telepon</b>
<input type="number" name="phone" class="form-control" autocomplete="off" value="<?php echo $data['phone']; ?>"/><br>
<b>Laboratorium</b>
<select name="lab" class="form-control" required="required">
<?php 
$query_mysql = mysql_query("SELECT * FROM lab");
while($data = mysql_fetch_array($query_mysql)){
?>
<?php echo "
<option value=\"$data[id]\">$data[nama]</option>"; } ?>
</select>
<br>
<input type="submit" name="submit" class="btn btn-primary" value="Tambah Data">
<?php } ?>

</form>

</div>
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