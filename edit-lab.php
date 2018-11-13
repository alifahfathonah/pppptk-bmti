<?php
include "koneksi.php";
session_start();

if (empty($_SESSION['id'])) {
    header("location: index.php");
}

$id 		= antiinjection($_GET['id']);

if (isset($_POST['submit'])) {
$nama       = antiinjection($_POST['nama']);

mysql_query("UPDATE lab SET nama='$nama' WHERE lab.id='$id'");

header("location: admin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Data Laboratorium - Aplikasi Prakerin</title>
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

$query_mysql = mysql_query("SELECT * FROM lab WHERE id='$id'");
if (mysql_num_rows($query_mysql)<1) {
	echo "Data laboratorium tidak ditemukan...";
}
while($data  = mysql_fetch_array($query_mysql)){

?>

<b>Nama Laboratorium</b>
<input type="text" name="nama" class="form-control" autocomplete="off" value="<?php echo $data['nama']; ?>"/><br>
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