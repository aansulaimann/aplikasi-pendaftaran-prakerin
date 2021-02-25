<?php session_start(); require '../../app/config.php'; 
    $title = "My Profile"; require 'templates/header.php';
    if(!isset($_SESSION['login']['status']) == true && !isset($_SESSION['login']['role']) == 'user') {
        header("Location:  http://localhost/aplikasi-pendaftaran-prakerin/gate.php");
        exit;
    }

    if($_SESSION['login']['status'] == true && $_SESSION['login']['role'] == 'admin') {
        header("Location: " . BASEURL . "admin/");
    }

    // query data
    $id = $_SESSION['login']['id'];
    if(mysqli_num_rows(getDataById($id)) === 1) {
        $data = mysqli_fetch_assoc(getDataById($id));
    } else {
        header("Location: empty.php");
    }

    // update data
    if(isset($_POST['btn_ubah'])) {
        if(updateProfile($_POST) > 0) {
            header("Location: profile.php");
            flasher("Data berhasil", "success", "diubah");
        } else {
            flasher("Data gagal", "danger", "diubah");
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
        <!-- profile -->
        <div class="row mt-4" id="profile">
            <div class="col">
                <h3>Edit Profile</h3>
                <p class="text-sec">Halaman ini untuk mengedit profile kamu😆.</p>
            </div>
            <div class="col col-lg-11 border shadow-sm p-4 rounded">
                <div class="row">
                    <div class="col mt-3">
                        <form action="" method="post">
                        <div class="form-group mt-3">
                            <input type="hidden" value="<?php echo $data['user_id']; ?>" name="user_id">
                            <label for="nm_lengkap" class="font-weight-bold">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nm_lengkap" name="nm_lengkap" autocomplete="off" value="<?php echo $data['nama_lengkap']; ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="email" class="font-weight-bold">Email</label>
                            <input type="text" class="form-control" id="email" name="email" autocomplete="off" value="<?php echo $data['email']; ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="no_telp" class="font-weight-bold">No telepon</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" autocomplete="off" value="<?php echo $data['no_telp']; ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="tgl_lahir" class="font-weight-bold">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" autocomplete="off" value="<?php echo $data['tgl_lahir']; ?>">
                        </div>
                    </div>

                    <div class="col mt-3">
                        <div class="form-group mt-3">
                            <label for="asal_sekolah" class="font-weight-bold">Asal Sekolah</label>
                            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" autocomplete="off" value="<?php echo $data['asal_sekolah']; ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="nisn" class="font-weight-bold">NISN</label>
                            <input type="text" class="form-control" id="nisn" name="nisn" autocomplete="off" value="<?php echo $data['nisn']; ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="jurusan" class="font-weight-bold">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan" autocomplete="off" value="<?php echo $data['jurusan']; ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="prestasi" class="font-weight-bold">Jurusan</label>
                            <input type="text" class="form-control" id="prestasi" name="prestasi" autocomplete="off" value="<?php echo $data['prestasi']; ?>">
                        </div>
                        
                        <button type="submit" class="btn bg-orange px-3" name="btn_ubah">Ubah Profile</button>
                        <a href="profile.php" class="btn bg-outline-orange px-3">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- // profile -->
    </div>
    <!-- // content -->
</div>
<!-- // main -->


<!-- footer -->
<?php require 'templates/footer.php'; ?>