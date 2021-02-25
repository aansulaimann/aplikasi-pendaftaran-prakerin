<!-- header -->
<?php session_start(); require '../../app/config.php';
    $title = "home"; require 'templates/header.php';
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
    <!-- sidebar -->
    <div class="col-2 col-lg-1.1">
        <?php require 'templates/side.php'; ?>
    </div>
    <!-- // sidebar -->

    <!-- content -->
    <div class="col mt-4">
        <!-- <div class="row">
            <div class="col">
                <h3 class="text-pink">Selamat datang, <b><?php echo $_SESSION['login']['username']; ?></b>.</h3>
                <p class="text-sec">Silahkan pilih menu biodata untuk menambahkan data.</p>
            </div>
        </div> -->
        <div class="row">
            <div class="col-10 bg-prim p-4 rounded shadow-sm">
                <div class="row">
                    <div class="col col-lg-7 align-self-center">
                        <h3>Aplikasi Penerimaan Prakerin</h3>
                        <p class="text-sec">Selamat datang di aplikasi penerimaan prakerin. silahkan lengkapi biodata dan pilih posisi prakerin yang kami dibuka😄.</p>
                        <a href="tambah.php" class="btn bg-orange px-4 shadow-sm mt-4">Tambah Biodata</a>
                    </div>
                    <div class="col">
                        <img src="../assets/img/wfh.svg">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 m-0 mb-4">
            <div class="row mt-4 mb-2">
                <div class="col">
                    <h5 class="text-prim">Biodata <span class="badge badge-warning">data mu belum lengkap nih, lengkapi yuk!</span></h5>
                    <p class="text-sec">Progress data kamu dibawah nih!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-4 bg-light p-4 rounded shadow mr-4">
                    <h5>Data Diri</h5>
                    <p class="text-sec">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque autem veniam possimus ratione laborum quibusdam animi est sit quod porro.</p>
                    <button class="btn bg-outline-orange px-4 shadow-sm mt-4">add Biodata</button>
                </div>
                <div class="col-4 bg-light p-4 rounded shadow ml-4">
                    <h5>Riwayat Sekolah</h5>
                    <p class="text-sec">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque autem veniam possimus ratione laborum quibusdam animi est sit quod porro.</p>
                    <button class="btn bg-outline-orange px-4 shadow-sm mt-4">add Biodata</button>
                </div>
            </div>
        </div>
    </div>
    <!-- // content -->
</div>
<!-- // main -->


<!-- footer -->
<?php require 'templates/footer.php'; ?>