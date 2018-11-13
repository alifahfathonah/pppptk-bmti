<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-toggle" data-target="#myNavbar" data-toggle="collapse">
        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
      </a>
      <a class="navbar-brand" href="<?php echo $base_url; ?>">
        <b><i class="fa fa-desktop"></i> PPPPTK BMTI</b>
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="<?php echo $base_url; ?>#">
            <i aria-hidden="true" class="fa fa-home"></i> Home
          </a>
        </li>
        <li>
          <a href="<?php echo $base_url; ?>#">
            <i aria-hidden="true" class="fa fa-image"></i> Galery
          </a>
        </li>
          <li>
          <a href="<?php echo $base_url; ?>#">
            <i aria-hidden="true" class="fa fa-sitemap"></i> Fasilitas
          </a>
        </li>

        <li>
          <a href="<?php echo $base_url; ?>#">
            <i aria-hidden="true" class="fa fa-user-circle"></i> About
          </a>
        </li>
        <?php
        if (isset($_SESSION['id'])) {
            echo "
        <li>
          <a href=\"$base_url\r\ndir/logout.php\">
            <i aria-hidden=\"true\" class=\"fa fa-sign-out\"></i> Logout
          </a>
        </li>";
        }
        ?>
      </ul>
    </div>
  </div>
</nav>