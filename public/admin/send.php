<?php session_start(); require '../../app/config.php';
    $title = "Dashboard"; require 'templates/header.php';
    if(!isset($_SESSION['login']['status']) == true && !isset($_SESSION['login']['role']) == 'admin') {
        header("Location: http://localhost/aplikasi-pendaftaran-prakerin/gate.php");
    }

    if($_SESSION['login']['status'] == true && $_SESSION['login']['role'] == 'user') {
        header("Location: " . BASEURL . "user/");
    }

    // $data = getAllCompleteData();

    if(isset($_POST['btn_send'])) {
        if(send($_POST) > 0) {
            flasher("Email berhasil", "success", "Dikirim dan disimpan");
        } else {
            flasher("Email gagal", "warning", "Dikirim dan disimpan");
        }
    }
?>

<!-- main -->
<div class="row m-0">
    <div class="col-2 col-lg-1.1 mr-3">
        <?php require 'templates/side.php'; ?>
    </div>

    <div class="col mb-4">
        <div class="row">
            <div class="col">
                <h3>Hallo Admin, <b><?php echo $_SESSION['login']['username']; ?>.</b></h3>
                <p class="text-sec">Halaman ini untuk mengirim email kepada siswa yang diterima untuk prakerin.🥳</p>
            </div>
        </div>

        <!-- search siswa dan kirim email -->
        <div class="row">
            <div class="col col-lg-5 p-2 rounded mr-2 bg-prim">
                <h5>Cari siswanya yuk!</h5>
                <form action="" method="post">
                <div class="form-group mt-3">
                    <div class="row">
                        <div class="col col-lg-9">
                            <label for="id">Id Siswa</label>
                            <input type="text" class="form-control" id="id" name="id" autocomplete="off" readonly>
                        </div>
                        <div class="col mt-4">
                            <button type="button" class="btn bg-orange mt-2"  onclick="window.open('daftarCompleteSiswa.php', 'newwindow', 'width=840,height=900, top=110, left=200', 'titlebar=0'); return false;">Cari</button>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="nama">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" readonly>
                </div>
                <div class="form-group mt-3">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" class="form-control" id="jurusan" name="jurusan" autocomplete="off" readonly>
                </div>
                <div class="form-group mt-3">
                    <label for="lowongan">lowongan yang dipilih</label>
                    <input type="text" class="form-control" id="lowongan" name="lowongan" autocomplete="off" readonly>
                </div>
            </div>
            <div class="col col-lg-6 bg-light p-2 rounded">
                <h5>Kirim Email</h5>
                <div class="form-group mt-3">
                    <label for="from">Email</label>
                    <input type="text" class="form-control" id="from" name="from" autocomplete="off">
                </div>
                <div class="form-group mt-3">
                    <label for="from">Password</label>
                    <input type="password" class="form-control" name="password" autocomplete="off">
                </div>
                <div class="form-group mt-3">
                    <label for="to">To</label>
                    <input type="text" class="form-control" id="to" name="to" autocomplete="off" readonly>
                </div>
                <div class="form-group mt-3">
                    <label for="subjek">Subject</label>
                    <input type="text" class="form-control" id="subjek" name="subjek" autocomplete="off">
                </div>
                <div class="form-group mt-3">
                    <label for="lowongan">Isi email</label>
                    <textarea class="form-control" id="isi" name="isi" autocomplete="off"></textarea>
                </div>

                <button type="submit" class="btn bg-orange px-4" name="btn_send">Kirim</button>
                </form>
            </div>
        </div>
        <!-- search siswa dan kirim email -->
    </div>
</div>
<!-- // main -->

<!-- footer -->
<?php require 'templates/footer.php'; ?>
<!-- // footer -->