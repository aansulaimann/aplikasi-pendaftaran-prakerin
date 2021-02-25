<?php session_start(); require '../../app/config.php'; $title = "Tambah Biodata"; require 'templates/header.php';
    if(!isset($_SESSION['login']['status']) == true && !isset($_SESSION['login']['role']) == 'user') {
        header("Location:  http://localhost/aplikasi-pendaftaran-prakerin/gate.php");
        exit;
    }

    if($_SESSION['login']['status'] == true && $_SESSION['login']['role'] == 'admin') {
        header("Location: " . BASEURL . "admin/");
    }

    if(isset($_POST['btn_submit'])) {
        if(tambah($_POST) > 0) {
            header("Location: " . BASEURL . "user/profile.php");
        } else if(tambah($_POST) == false) {
            flasher('Data anda', 'warning', 'Sudah tersedia!');
        } else {
            flasher('Data anda Gagal', 'warning', 'Ditambahkan');
        }
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
    <div class="col">
        <!-- headline -->
        <div class="row mt-4">
            <div class="col">
                <h3 class="text-pink">Hallo, <b><?php echo $_SESSION['login']['username']; ?></b>.</h3>
                <p class="text-sec">Silahkan lengkapi biodata mu dibawah ya 😁.</p>
            </div>
        </div>
        <!-- // headline -->

        <!-- form biodata -->
        <div class="row">
            <div class="col col-lg-11 border shadow-sm p-4 rounded">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Data Diri</a>
                        <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Riwayat Sekolah</a>
                        <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Prestasi</a>
                        <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-pkl" role="tab" aria-controls="nav-pkl" aria-selected="false">Lowongan PKL</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group mt-3">
                            <label for="nm_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nm_lengkap" name="nm_lengkap" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" autocomplete="off" value="<?php echo $_SESSION['login']['email']; ?>" readonly>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No Telepon</label>
                            <input type="number" class="form-control" id="no_telp" name="no_telp" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" autocomplete="off">
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select class="custom-select" name="jurusan" id="jurusan" autocomplete="off">
                                <option selected>Open this select menu</option>
                                <option value="Rekayasa prangkat lunak">Rekayasa prangkat lunak</option>
                                <option value="Multimedia">Multimedia</option>
                                <option value="Teknik komputer jaringan">Teknik komputer jaringan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="NISN">NISN</label>
                            <input type="number" class="form-control" id="NISN" name="nisn" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="asal_sekolah">Asal Sekolah</label>
                            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" autocomplete="off">
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="form-group">
                            <label for="prestasi">Nama Prestasi</label>
                            <input type="text" class="form-control" id="prestasi" name="prestasi" autocomplete="off">
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-pkl" role="tabpanel" aria-labelledby="nav-pkl-tab">
                        <div class="form-group">
                            <label for="lowongan">Lowongan PKL</label>
                            <select class="custom-select" name="lowongan" id="lowongan" autocomplete="off">
                                <option selected>Open this select menu</option>
                                <option value="Junior Programmer">Junior Programmer</option>
                                <option value="Junior video editor">Junior video editor</option>
                                <option value="Teknikal support">Teknikal support</option>
                            </select>
                        </div>

                        <button type="submit" class="btn bg-orange" name="btn_submit">Simpan data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- // form biodata -->
    </div>
    <!-- // content -->
</div>
<!-- // main -->

<!-- footer -->
<?php require 'templates/footer.php'; ?>
