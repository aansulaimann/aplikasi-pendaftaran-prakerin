<?php session_start(); require '../../app/config.php';
    $title = "Dashboard"; require 'templates/header.php';
    if(!isset($_SESSION['login']['status']) == true && !isset($_SESSION['login']['role']) == 'admin') {
        header("Location: http://localhost/aplikasi-pendaftaran-prakerin/gate.php");
    }

    if($_SESSION['login']['status'] == true && $_SESSION['login']['role'] == 'user') {
        header("Location: " . BASEURL . "user/");
    }

    if(isset($_POST['btn_laporan'])) {
        $data = getDataLaporan($_POST);
    }
?>

<!-- main -->
<div class="row m-0">
    <div class="col-2 col-lg-1.1">
        <?php require 'templates/side.php'; ?>
    </div>

    <div class="col ml-3">
        <!-- headline -->
        <div class="row mt-3">
            <div class="col">
                <h3>Hallo Admin, <b><?php echo $_SESSION['login']['username'];?>.</b></h3>
                <p class="text-sec">halaman ini adalah halaman untuk mencetak laporan berdasarkan tanggal</p>
            </div>
        </div>
        <!-- // headline -->

        <!-- cari tanggal -->
        <div class="row mt-2">
            <div class="col col-lg-10 p-4 rounded bg-prim">
                <h5>Masukan tanggal dibawah ini</h5>
                <p class="text-sec">untuk mencari data mulai dari tanggal berapa dan sampai tanggal berapa.</p>
                <form action="" method="post">
                    <input type="date" name="from" class="p-2 rounded" id="from"> s/d
                    <input type="date" name="to" class="p-2 rounded" id="to">
                    <button type="submit" class="btn bg-orange ml-4 px-4" name="btn_laporan">Cari</button>
                    <button type="button" class="btn bg-outline-orange text-white" onclick="cetak('data');">Cetak</button>
                </form>
            </div>
        </div>
        <!-- // cari tanggal -->
        
        <!-- data hasil pencarian -->
        <div class="row" id="data">
            <div class="col col-lg-10 rounded mt-4">
            <h3>Hasil Data</h3>
                <table class="table border">
                    <thead class="bg-prim">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Email</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Asal Sekolah</th>
                            <th scope="col">Jurusan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($_POST['btn_laporan'])) {
                        $i = 1; foreach($data as $row) : ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td>
                                <img src="<?php if(!empty($row['foto'])) {
                                    echo BASEURL . "user/uploads/profile/" . $row['foto'];
                                } else {
                                    echo BASEURL . "assets/img/logo_user.png";
                                }
                                
                                ?>" alt="foto" class="img-fluid rounded-circle" width="30">
                            </td>
                            <td><?php echo $row['nama_lengkap']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['nisn']; ?></td>
                            <td><?php echo $row['asal_sekolah']; ?></td>
                            <td><?php echo $row['jurusan']; ?></td>
                        </tr>
                    <?php endforeach; } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- // data hasil pencarian -->
    </div>
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
</script>
<!-- // footer -->