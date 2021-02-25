<?php
  if(isset($_POST['btn_logout'])) {
    if(logout()) {
        header("Location: http://localhost/aplikasi-pendaftaran-prakerin/gate.php");
    }
  }
?>
<div class="row mt-4">
  <div class="col">
    <div class="row mt-4">
      <div class="col bg-active align-self-center p-2 text-right">
        <img src="../assets/img/icon/home.svg" alt="404" width="26">
      </div>
      <div class="col align-self-center mt-3">
        <p><a href="<?php echo BASEURL ?>user/" class="active trans">Home</a></p>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col align-self-center p-2 text-right">
        <img src="../assets/img/icon/data.svg" alt="404" width="22">
      </div>
      <div class="col align-self-center mt-3">
        <p><a href="<?php echo BASEURL ?>user/tambah.php" class="text-body trans">Biodata</a></p>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col align-self-center p-2 text-right">
        <img src="../assets/img/icon/profile.svg" alt="404" width="30">
      </div>
      <div class="col align-self-center mt-3">
        <p><a href="<?php echo BASEURL;?>user/profile.php" class="text-body">Profile</a></p>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col align-self-center p-2 text-right">
        <img src="../assets/img/icon/setting.svg" alt="404" width="26">
      </div>
      <div class="col align-self-center mt-3">
        <p><a href="#" class="text-body">Settings</a></p>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col align-self-center p-2 text-right">
        <img src="../assets/img/icon/quit.svg" alt="404" width="30">
      </div>
      <div class="col align-self-center mt-3">
        <form action="" method="post">
          <p><button type="submit" class="btn btn-transparent text-body p-0" name="btn_logout">Keluar</button></p>
        </form>
      </div>
    </div>
  </div>
</div>