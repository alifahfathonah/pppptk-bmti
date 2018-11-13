<?php
include "koneksi.php";
session_start();

if (empty($_SESSION['id'])) {
    header("location: index.php");
}

$error = false;
$error1=$error2=$nis=$nama=$sekolah=$jurusan=$alamat=$gender=$phone=$lab="";

if (isset($_POST['submit'])) {
$nis        = antiinjection($_POST['nis']);
$nama       = antiinjection($_POST['nama']);
$sekolah    = antiinjection($_POST['sekolah']);
$jurusan    = antiinjection($_POST['jurusan']);
$alamat     = antiinjection($_POST['alamat']);
$gender     = antiinjection($_POST['gender']);
$phone      = antiinjection($_POST['phone']);
$lab        = antiinjection($_POST['lab']);

$ceknis        = mysql_query("SELECT nis FROM siswa WHERE nis='$nis'");
$hasilceknis   = mysql_num_rows($ceknis);
if ($hasilceknis!=0) {
    $error   = true;
    $error2  = "<div class=\"error\">Nomor Induk siswa telah terdaftar...</div>";
}


if (empty($nis AND $nama AND $sekolah AND $jurusan AND $alamat AND $gender AND $phone AND $lab)) {
    $error 	= true;
    $error1 = "<div class=\"error\">Semua bidang harus di isi...</div>";
}

if (!$error) {
mysql_query("INSERT INTO siswa VALUES('','$nis','$nama','$sekolah', '$jurusan', '$alamat', '$gender', '$phone', '$lab')");
header("location: admin.php");
}

}
?>
<!DOCTYPE html>
<html>
<head>
<title>Tambah Data Siswa - Aplikasi Prakerin</title>
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

<?php echo $error1; ?>
<?php echo $error2; ?>

<form method="POST">
<b>NIS siswa</b>
<input type="number" name="nis" class="form-control" autocomplete="off" value="<?php echo $nis; ?>"/><br>
<b>Nama Siswa</b>
<input type="text" name="nama" class="form-control" autocomplete="off" value="<?php echo $nama; ?>"/><br>
<b>Asal Sekolah</b>
<input type="text" name="sekolah" class="form-control" autocomplete="off" value="<?php echo $sekolah; ?>"/><br>
<b>Jurusan</b>
<input type="text" name="jurusan" class="form-control" autocomplete="off" value="<?php echo $jurusan; ?>"/><br>
<b>Alamat Siswa</b>
<input type="text" name="alamat" class="form-control" autocomplete="off" value="<?php echo $alamat; ?>"/><br>
<b>Jenis Kelamin</b>
<select name="gender" class="form-control">
<option value="1">Laki-Laki</option>
<option value="2">Perempuan</option>
</select>
<br>
<b>Nomor Telepon</b>
<input type="number" name="phone" class="form-control" autocomplete="off" value="<?php echo $phone; ?>"/><br>
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