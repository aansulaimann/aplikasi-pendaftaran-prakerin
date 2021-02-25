<?php session_start(); require '../../app/config.php';
    $title = "Dashboard"; require 'templates/header.php';
    if(!isset($_SESSION['login']['status']) == true && !isset($_SESSION['login']['role']) == 'admin') {
        header("Location: http://localhost/aplikasi-pendaftaran-prakerin/gate.php");
    }

    if($_SESSION['login']['status'] == true && $_SESSION['login']['role'] == 'user') {
        header("Location: " . BASEURL . "user/");
    }

    if(isset($_POST['btn_tambah'])) {
        if(tambahJurusan($_POST) > 0) {
            flasher("Data Jurusan", "success", "Berhasil ditambahkan");
        } else {
            flasher("Data Jurusan", "success", "Berhasil ditambahkan");
        }
    }

    // Jurusan tersedia
    $data = getDataJurusan();
?>

<!-- main -->
<div class="row m-0">
    <div class="col-2 col-lg-1.1 mr-3">
        <?php require 'templates/side.php'; ?>
    </div>

    <div class="col mt-3">
        <div class="row">
            <div class="col">
                <h3>Hallo Admin, <b><?php echo $_SESSION['login']['username']; ?>.</b></h3>
                <p class="text-sec">halaman ini untuk menambah lowongan yang sedang dibuka.🤩</p>
            </div>
        </div>

        <!-- form lowongan -->
        <div class="row">
            <div class="col col-lg-10 bg-prim p-3 rounded">
                <h5>Tambah Jurusan.</h5>

                <form action="" method="post">
                    <div class="form-group mt-3">
                        <label for="jurusan">Nama Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" name="nm_jurusan" autocomplete="off">
                    </div>
                    <div class="form-group mt-3">
                        <label for="singkatan">Singkatan</label>
                        <input type="text" class="form-control" id="singkatan" name="singkatan" autocomplete="off">
                    </div>

                    <button type="submit" class="btn bg-orange mt-4" name="btn_tambah">Tambah Jurusan!</button>
                </form>
            </div>
        </div>
        <!-- // form lowongan -->

        <!-- lowongan tersedia -->
        <div class="row">
            <div class="col col-lg-10 mt-4 mb-4">
                <h5>Data Jurusan tersedia</h5>
                <ul class="list-group">
                    <?php $i = 1; foreach($data as $row) :?>
                        <li class="list-group-item">
                            <?php echo "<b>" . $i++ . ".</b> "; echo $row['nama_jurusan'] . " | "; echo $row['singkatan']; ?>
                            <a href="deleteJurusan.php?id=<?php echo $row['id']; ?>" class="badge badge-danger float-right p-2" onclick="return confirm('yakin hapus data jurusan?');">hapus</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <!-- // lowongan tersedia -->
    </div>
</div>
<!-- // main -->

<!-- footer -->
<?php require 'templates/footer.php'; ?>
<!-- // footer -->