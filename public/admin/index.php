<?php session_start(); require '../../app/config.php';
    $title = "Dashboard"; require 'templates/header.php';
    if(!isset($_SESSION['login']['status']) == true && !isset($_SESSION['login']['role']) == 'admin') {
        header("Location: http://localhost/aplikasi-pendaftaran-prakerin/gate.php");
    }

    if($_SESSION['login']['status'] == true && $_SESSION['login']['role'] == 'user') {
        header("Location: " . BASEURL . "user/");
    }

    // query data
    $data = getAllDataRegist();
    
    // query all data
    $complete = getAllComplete();
?>

<!-- main -->
<div class="row m-0">
    <div class="col-2 col-lg-1.1">
        <?php require 'templates/side.php'; ?>
    </div>

    <div class="col ml-3">
        <!-- headline -->
        <div class="row mt-4">
            <div class="col col-lg-10 bg-prim p-4 rounded shadow">
                <div class="row">
                    <div class="col col-lg-8 align-self-center">
                        <h3>Selamat datang admin, <b><?php echo $_SESSION['login']['username']; ?></b>.</h3>
                        <p class="text-sec">Dashboard ini berisi informasi dan data seputar pendaftaran prakerin 😁.</p>
                        <a href="pendaftar.php" class="btn bg-orange">Data Pendaftar</a>
                    </div>
                    <div class="col">
                        <img src="../assets/img/wfh.svg">
                    </div>
                </div>
            </div>
        </div>
        <!-- // headline -->

        <!-- data -->
        <div class="row mt-4">
            <!-- jumlah pendaftar & complete biodata -->
            <div class="col col-lg-5 border pb-4 pt-2 rounded shadow-sm">
                <p><b>Pendaftar</b></p>
                <?php foreach($data as $row) : ?>
                <div class="row">
                    <div class="col align-self-center">
                        <p><?php echo $row["username"] . " | "; echo $row["email"]; ?></p>
                    </div>
                </div>
                <hr>
                <?php endforeach; ?>
                <a href="pendaftar.php">Lebih banyak</a>
            </div>

            <div class="col col-lg-4 ml-4 border pb-4 pt-2 rounded shadow-sm">
                <p><b>Pendaftar komplit data</b></p>
                <?php foreach($complete as $c) : ?>
                <div class="row">
                    <div class="col col-lg-2">
                        <img src="<?php 
                            if(!empty($c["foto"])) {
                                echo BASEURL . "user/uploads/profile/" . $c["foto"];
                            } else {
                                echo BASEURL . "assets/img/logo_user.png";
                            }
                        ?>" alt="foto" width="40">
                    </div>
                    <div class="col align-self-center mt-1">
                        <p><?php echo $c["nama_lengkap"]; ?></p>
                    </div>
                </div>
                <hr>
                <?php endforeach; ?>
                <a href="complete.php">Lebih banyak</a>
            </div>
            <!-- jumlah pendaftar & complete biodata -->
        </div>
        <!-- // data -->
    </div>
</div>
<!-- // main -->

<!-- footer -->
<?php require 'templates/footer.php'; ?>
<!-- // footer -->