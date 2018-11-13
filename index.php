<?php
session_start();

if (isset($_SESSION['id'])) {
  header("location: admin.php");
}

include "koneksi.php";
$error=$error2="";

if (isset($_POST['submit'])) {
$postusername = antiinjection($_POST['username']);
$postpassword = md5(antiinjection(trim($_POST['password'])));
$cek = mysql_query("SELECT id, username, password FROM admin WHERE username='$postusername'");
list($id, $username, $password) = mysql_fetch_array($cek);

if (mysql_num_rows($cek) > 0) {
  session_start();
  $_SESSION['id'] = $id;
  header("location: admin.php");
} else {
  $error = "<div class=\"error\">Username atau password salah...</div>";
}

}

if (isset($_POST['submit2'])) {
$postnis = antiinjection($_POST['nis']);

$ceks = mysql_query("SELECT nis FROM siswa WHERE nis='$postnis'");
list($nis) = mysql_fetch_array($ceks);

if (mysql_num_rows($ceks) >0) {
    session_start();
    $_SESSION['nis'] = $nis;

    header("location: siswa.php");
} else {
    $error2 = "<div class=\"error\">Nomor Induk siswa tidak terfaftar atau salah...</div>";
}

}
?>
<!DOCTYPE html>
<html>
<head>
<title>PPPPTK BMTI Bandung - Aplikasi Prakerin</title>
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

<br>
<div class="panel-body container">

<div class="row">
<div class="col-sm-9">
<img src="img/pppptk.jpg" class="img-responsive">
</div>
<div class="col-sm-3">

<div class="hidden-lg"><br><br></div>
<table class="table">
 <tbody>
 <tr>
 <td class="tdtop"><i class="fa fa-home fa-20"></i></td>
 <td class="tdtop">Jl. Pesantren KM. 2, Kel. Cibabat, Kec. Cimahi Utara, Kota Cimahi, Jawa Barat 40514, Indonesia.</td>
 </tr>
 <tr>
 <td class="tdtop"><i class="fa fa-facebook-square fa-20"></i></td>
 <td class="tdtop">PPPPTK BMTI Bandung</td>
 </tr>
 <tr>
 <td class="tdtop"><i class="fa fa-twitter-square fa-20"></i></td>
 <td class="tdtop">PPPPTK BMTI Bandung</td>
 </tr>
 </tbody>
 </table>

</div>
</div>

</div>

<div class="container-fluid content-web">
<div class="container">

<div class="row">

<div class="col-sm-12">
<div class="carousel slide" data-ride="carousel" id="carousel-1" margin-left="auto" margin-right="auto" width="10%">
        <div class="carousel-inner" role="listbox">
            <div class="item active"><img src="<?php echo $base_url; ?>img/largest.jpeg"></div>
            <div class="item"><img src="<?php echo $base_url; ?>img/largest.jpeg"></div>
            <div class="item"><img src="<?php echo $base_url; ?>img/largest.jpeg"></div>
        </div>
        <div>
        <a class="left carousel-control" href="#carousel-1" role="button" data-slide="prev">
            <i class="glyphicon glyphicon-chevron-left"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-1" role="button" data-slide="next">
            <i class="glyphicon glyphicon-chevron-right"></i>
            <span class="sr-only">Next</span>
        </a>
        </div>
        <ol class="carousel-indicators">
            <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-1" data-slide-to="1"></li>
            <li data-target="#carousel-1" data-slide-to="2"></li>
        </ol>
    </div>
</div>
</div>
<div class="row">
<div class="col-sm-8"><br>
    <h1>Aplikasi Prakerin Departemen Elektronika & Informatika</h1>
    <hr style="border: 2px solid red; height: 3px;">
    <b>PPPPTK BMTI Bandung</b><br>
    Pusat Penembangan dan Pemberdayaan Pendidik dan Tenaga Pendidikan Bidang Mesin dan Teknik Industri.
</div>
<div class="col-sm-4"><br>
  <div class="panel panel-primary">
    <div class="panel-heading">
        Login Admin
    </div>
    <div class="panel-body">
        <?php echo $error; ?>
        <form method="POST">
            <input type="text" class="form-control" name="username" placeholder="Username: admin" autocomplete="off">
            <br>
            <input type="password" class="form-control" name="password" placeholder="Password: admin" autocomplete="off">
            <br>
            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Login">
        </form>
    </div>
    </div>
</div>


</div>

<hr style="border: 2px solid red; height: 3px;">

<div class="row">
    <div class="col-sm-2">
        <img src="<?php echo  $base_url; ?>img/logo.jpg" class="img-responsive img-thumbnail">
    </div>
    <div class="col-sm-6">
        <h3>PPPPTK BMTI Bandung</h3>
Pusat Penembangan dan Pemberdayaan Pendidik dan Tenaga Pendidikan Bidang Mesin dan Teknik Industri.
    </div>
    <div class="col-sm-4">
        <div class="panel panel-primary">
    <div class="panel-heading">
        Cek data siswa
    </div>
    <div class="panel-body">
        <?php echo $error2; ?>
        <form method="POST">
            <input type="number" class="form-control" name="nis" placeholder="Nomor Induk Siswa: 23092018" autocomplete="off">
            <br>
            <input type="submit" name="submit2" class="btn btn-primary btn-block" value="Cek data">
        </form>
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