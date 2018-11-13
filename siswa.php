<?php
session_start();
include "koneksi.php";

if (empty($_SESSION['nis'])) {
    header("location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Data Siswa - Aplikasi Prakerin</title>
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
    </tr>
  </thead>
  <tbody>
        <?php 

        $query_mysql = mysql_query("SELECT * FROM siswa WHERE nis='$_SESSION[nis]'");
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
      </tr>
<?php } ?>

</tbody>
</table>
</div>

</div>

</div>
<div class="col-sm-3">
<a href="<?php echo $base_url; ?>dir/logout.php">
<div class="panel panel-body panel-primary">
<i class="fa fa-sign-out"></i> Logout
</div>
</a>
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