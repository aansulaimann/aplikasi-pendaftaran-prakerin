<?php
  if(isset($_POST['btn_logout'])) {
    if(logout()) {
        header("Location: http://localhost/aplikasi-pendaftaran-prakerin/gate.php");
    }
  }
?>
<div class="row mt-4">
  <div class="col bg-light rounded">
    <div class="row mt-4 pr-2">
      <div class="col align-self-center p-2 text-right">
        <img src="../assets/img/icon/home.svg" alt="404"  width="20">
      </div>
      <div class="col align-self-center mt-3">
        <p><a href="<?php echo BASEURL ?>admin/" class="active trans">Home</a></p>
      </div>
    </div>
    <div class="row mt-4 pr-2">
      <div class="col align-self-center p-2 text-right">
        <img src="../assets/img/icon/data.svg" alt="404"  width="20">
      </div>
      <div class="col align-self-center">
        <p>
          <div class="dropdown">
            <button class="btn dropdown-toggle p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              data
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item my-3" href="<?php echo BASEURL; ?>admin/pendaftar.php">Data pendaftar</a>
              <a class="dropdown-item my-3" href="<?php echo BASEURL; ?>admin/complete.php">pendaftar data lengkap</a>
              <a class="dropdown-item my-3" href="<?php echo BASEURL; ?>admin/tambah_lowongan.php">Entry data lowongan</a>
              <a class="dropdown-item my-3" href="<?php echo BASEURL; ?>admin/tambah_jurusan.php">Entry data Jurusan</a>
            </div>
          </div>
        </p>
      </div>
    </div>
    <div class="row mt-4 pr-2">
      <div class="col align-self-center p-2 text-right">
        <img src="../assets/img/icon/mail.svg" alt="404" width="20">
      </div>
      <div class="col align-self-center mt-3">
        <p><a href="<?php echo BASEURL; ?>admin/send.php" class="text-body">Send Email</a></p>
      </div>
    </div>
    <div class="row mt-4 pr-2">
      <div class="col align-self-center p-2 text-right">
        <img src="../assets/img/icon/report.svg" alt="404" width="20">
      </div>
      <div class="col align-self-center mt-3">
        <p><a href="<?php echo BASEURL; ?>admin/laporan.php" class="text-body">Laporan</a></p>
      </div>
    </div>
    <div class="row mt-4 pr-2">
      <div class="col align-self-center p-2 text-right">
        <img src="../assets/img/icon/setting.svg" alt="404" width="20">
      </div>
      <div class="col align-self-center mt-3">
        <p><a href="#" class="text-body">Settings</a></p>
      </div>
    </div>
    <div class="row mt-4 pr-2">
      <div class="col align-self-center p-2 text-right">
        <img src="../assets/img/icon/quit.svg" alt="404" width="20">
      </div>
      <div class="col align-self-center mt-3">
        <form action="" method="post">
          <p><button type="submit" class="btn btn-transparent text-body p-0" name="btn_logout">Keluar</button></p>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row mt-3">
  <div class="col p-4 m-4 bg-prim rounded align-self-center">
    <p class="text-sec">Lorem, ipsum dolor.</p>
  </div>
</div>