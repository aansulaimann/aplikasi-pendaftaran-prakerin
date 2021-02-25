<?php session_start(); require '../../app/config.php';
    $title = "Dashboard"; require 'templates/header.php';
    if(!isset($_SESSION['login']['status']) == true && !isset($_SESSION['login']['role']) == 'admin') {
        header("Location: http://localhost/aplikasi-pendaftaran-prakerin/gate.php");
    }

    if($_SESSION['login']['status'] == true && $_SESSION['login']['role'] == 'user') {
        header("Location: " . BASEURL . "user/");
    }

    $id = $_GET['id'];

    // search data with id
    $data = getAllCompleteDataById($id);
?>
<!-- main -->
<div class="container">
    <div class="row m-0">
        <div class="col">
            <h3>Detail Siswa</h3>
            <p class="text-sec">Halaman ini menunjukan detail dari siswa <b><?php echo $data['nama_lengkap']; ?>.</b></p>
            <button type="button" class="btn bg-orange px-4" onclick="window.close();">Close</button>
        </div>
    </div>

    <!-- profile -->
    <div class="row mt-4 m-0" id="profile">
        <div class="col col-lg-11 border shadow-sm p-4 rounded">
            <div class="row">
                <div class="col text-center mt-3">
                    <img src="<?php
                        if(!empty($data['foto'])) {
                            echo BASEURL . "user/uploads/profile/" . $data['foto'];
                        } else {
                            echo BASEURL . "assets/img/logo_user.png";
                        }
                    ?>" class="img-fluid rounded-circle" alt="404" width="120">
                    <ul class="list-group text-left">
                    <?php if(!empty($data['asal_sekolah'])) {
                        echo '<label for="asal_sekolah" class="mb-3 font-weight-bold">Asal Sekolah</label>';
                        echo '<li class="list-group-item">'. $data['asal_sekolah'] .'</li>';
                    }

                    if(!empty($data['nisn'])) {
                        echo '<label for="nisn" class="mb-3 mt-3 font-weight-bold">NISN</label>';
                        echo '<li class="list-group-item">'. $data['nisn'] .'</li>';
                    }

                    if(!empty($data['jurusan'])) {
                        echo '<label for="jurusan" class="mb-3 mt-3 font-weight-bold">Jurusan</label>';
                        echo '<li class="list-group-item">'. $data['jurusan'] .'</li>';
                    }

                    if(!empty($data['prestasi'])) {
                        echo '<label for="prestasi" class="mb-3 mt-3 font-weight-bold">Prestasi</label>';
                        echo '<li class="list-group-item">'. $data['prestasi'] .'</li>';
                    }

                    ?>
                        <label for="nama_lengkap" class="mb-3 mt-3 font-weight-bold">Sertifikat</label>
                        <img src="<?php 
                            if(!empty($data['sertifikat'])) {
                                echo BASEURL . "user/uploads/sertif/" . $data['sertifikat'];
                            } else {
                                echo BASEURL . "assets/img/sertif.svg";
                            }
                        ?>" alt="sertifikat" width="250">
                    </ul>
                </div>

                <div class="col mt-3">
                    <div class="name bg-orange p-3 rounded mb-4">
                        <h3><?php echo $data['nama_lengkap']; ?></h3>
                        <p><?php echo $data['jurusan']; ?></p>
                    </div>
                    <ul class="list-group">
                    <?php if(!empty($data['nama_lengkap'])) {
                        echo '<label for="nama_lengkap" class="mb-3 font-weight-bold">Nama Lengkap</label>';
                        echo '<li class="list-group-item">'. $data['nama_lengkap'] .'</li>';
                    }
                    
                    if(!empty($data['email'])) {
                        echo '<label for="email" class="mb-3 mt-4 font-weight-bold">Email</label>';
                        echo '<li class="list-group-item">'. $data['email'] .'</li>';
                    }
                    
                    if(!empty($data['no_telp'])) {
                        echo '<label for="no_telp" class="mb-3 mt-4 font-weight-bold">No telepon</label>';
                        echo '<li class="list-group-item">'. $data['no_telp'] .'</li>';
                    }
                    
                    if(!empty($data['tgl_lahir'])) {
                        echo '<label for="nama_lengkap" class="mb-3 mt-4 font-weight-bold">Tanggal Lahir</label>';
                        echo '<li class="list-group-item">'. date('D d F Y', strtotime( $data['tgl_lahir'])) .'</li>';
                    }
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- // profile -->
</div>
<!-- // main -->

<!-- footer -->
<?php require 'templates/footer.php'; ?>
<!-- // footer -->