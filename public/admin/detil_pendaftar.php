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
    $data = getDataPendaftarById($id);
?>
<!-- main -->
<div class="container">
    <div class="row">
        <div class="col">
            <ul class="list-group border p-4">
                <li class="list-group-item bg-prim"><b>Detail</b></li>
                <label><b>Username</b></label>
                <li class="list-group-item"><?php echo $data['username']; ?></li>
                <label><b>Email</b></label>
                <li class="list-group-item"><?php echo $data['email']; ?></li>
            </ul>
            <button type="button" class="btn bg-orange mt-2 px-3" onclick="window.close();">Tutup</button>
        </div>
    </div>
</div>
<!-- // main -->

<!-- footer -->
<?php require 'templates/footer.php'; ?>
<!-- // footer -->