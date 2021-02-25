<?php session_start(); require '../../app/config.php';
    $title = "Dashboard"; require 'templates/header.php';
    if(!isset($_SESSION['login']['status']) == true && !isset($_SESSION['login']['role']) == 'admin') {
        header("Location: http://localhost/aplikasi-pendaftaran-prakerin/gate.php");
    }

    if($_SESSION['login']['status'] == true && $_SESSION['login']['role'] == 'user') {
        header("Location: " . BASEURL . "user/");
    }

    $data = getAllCompleteData();
?>

<!-- main -->
<div class="container">
    <!-- table data pendaftar -->
    <div class="row mt-4">
        <div class="col col-lg-11">
            <table class="table border shadow-sm">
                <thead class="bg-prim">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">id</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">NISN</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Asal Sekolah</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; foreach($data as $row) : ?>
                    <tr>
                        <th scope="row"><?php echo $i++; ?></th>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nama_lengkap']; ?></td>
                        <td><?php echo $row['nisn']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['jurusan']; ?></td>
                        <td><?php echo $row['asal_sekolah']; ?></td>
                        <td>
                            <badge class="badge bg-orange p-2" onclick="sendValue('<?php echo $row['id']; ?>', '<?php echo $row['nama_lengkap']; ?>', '<?php echo $row['jurusan']; ?>', '<?php echo $row['pilihan_lowongan']; ?>', '<?php echo $row['email']; ?>');">pilih</badge>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- // table data pendaftar -->
</div>
<!-- // main -->

<!-- footer -->
<script>
    function sendValue(id, nmSiswa, jurusan, pilihan, email) {
    window.opener.document.getElementById('id').value = id;
    window.opener.document.getElementById('nama').value = nmSiswa;
    window.opener.document.getElementById('jurusan').value = jurusan;
    window.opener.document.getElementById('lowongan').value = pilihan;
    window.opener.document.getElementById('to').value = email;
    window.close();
}
</script>
<?php require 'templates/footer.php'; ?>

<!-- // footer -->