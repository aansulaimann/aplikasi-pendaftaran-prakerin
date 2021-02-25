<?php session_start(); require '../../app/config.php'; 
    $title = "My Profile"; require 'templates/header.php';
    if(!isset($_SESSION['login']['status']) == true && !isset($_SESSION['login']['role']) == 'user') {
        header("Location:  http://localhost/aplikasi-pendaftaran-prakerin/gate.php");
        exit;
    }

    if($_SESSION['login']['status'] == true && $_SESSION['login']['role'] == 'admin') {
        header("Location: " . BASEURL . "admin/");
    }
?>

<!-- main -->
<div class="row m-0">
    <div class="col-2 col-lg-1.1">
        <?php require 'templates/side.php'; ?>
    </div>

    <div class="col mt-4">
        <div class="row">
            <div class="col col-lg-8 p-4 rounded bg-prim">
                <div class="row">
                    <div class="col align-self-center">
                        <h3>Hallo, <b><?php echo $_SESSION['login']['username']; ?>.</b></h3>
                        <p class="text-sec">Data mu masih kosong, Yuk isi dulu!😘.</p>
                        <a href="tambah.php" class="btn bg-orange px-4">tambah Biodata</a>
                    </div>

                    <div class="col">
                        <img src="../assets/img/going.svg">
                    </div>
                </div>
            
            </div>

            <!-- <div class="col col-lg-4 p-4 bg-prim">
            </div> -->
        </div>
    </div>
</div>
<!-- // main -->

<!-- footer -->
<?php require 'templates/footer.php'; ?>
<!-- // footer -->