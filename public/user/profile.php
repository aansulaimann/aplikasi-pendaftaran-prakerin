<?php session_start(); require '../../app/config.php'; 
    $title = "My Profile"; require 'templates/header.php';
    if(!isset($_SESSION['login']['status']) == true && !isset($_SESSION['login']['role']) == 'user') {
        header("Location:  http://localhost/aplikasi-pendaftaran-prakerin/gate.php");
        exit;
    }

    if($_SESSION['login']['status'] == true && $_SESSION['login']['role'] == 'admin') {
        header("Location: " . BASEURL . "admin/");
    }

    if(isset($_SESSION['flash'])) {
        flasher('Data anda Berhasi', 'success', 'Ditambahkan');
    }

    // query data
    $id = $_SESSION['login']['id'];
    if(mysqli_num_rows(getDataById($id)) === 1) {
        $data = mysqli_fetch_assoc(getDataById($id));
    } else {
        header("Location: empty.php");
    }
    
    // upload foto
    if(isset($_POST['btn_foto'])) {
        if(upload() > 0) {
            flasher('Foto anda Berhasi', 'success', 'Ditambahkan');
        } else {
            flasher('Foto anda Gagal', 'danger', 'Ditambahkan');
        }
    }

    // upload sertif
    if(isset($_POST['btn_sertif'])) {
        if(uploadSertif() > 0) {
            flasher('Sertifikat anda Berhasi', 'success', 'Ditambahkan');
        } else {
            flasher('Sertifikat anda Gagal', 'danger', 'Ditambahkan');
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
        <!-- CTA -->
        <div class="row mt-4">
            <div class="col">
                <button type="button" class="btn mr-2 px-4 bg-orange" onclick="cetak('profile')" id="btn_cetak">Cetak</button>
                <a href="edit.php" class="btn bg-outline-orange">Edit</a>
            </div>
        </div>
        <!-- // CTA -->

        <!-- profile -->
        <div class="row mt-4" id="profile">
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
                        <form action="" method="post" enctype="multipart/form-data" class="my-4" id="form">
                            <input type="file" name="foto">
                            <button type="submit" class="btn badge bg-prim p-2 shadow" name="btn_foto">upload foto</button>
                        </form>
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
                            <form action="" method="post" enctype="multipart/form-data" class="my-4" id="form">
                                <input type="file" name="sertif">
                                <button type="submit" class="btn badge bg-prim p-2 shadow" name="btn_sertif">upload sertif</button>
                            </form>
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
    <!-- // content -->
</div>
<!-- // main -->


<!-- footer -->
<?php require 'templates/footer.php'; ?>
<script>
    function cetak(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}

// const form = document.querySelectorAll("#form");
// const btnCetak = document.getElementById("btn_cetak");

// btnCetak.addEventListener("click", function() {
//     while(form) {
//         let i = 0;
//         document.removeChild(form[i]);
//         i++;
//     }
// });
</script>