<?php session_start(); require '../../app/config.php';
    $title = "Dashboard"; require 'templates/header.php';
    if(!isset($_SESSION['login']['status']) == true && !isset($_SESSION['login']['role']) == 'admin') {
        header("Location: http://localhost/aplikasi-pendaftaran-prakerin/gate.php");
    }

    if($_SESSION['login']['status'] == true && $_SESSION['login']['role'] == 'user') {
        header("Location: " . BASEURL . "user/");
    }

    // query data
    $data = getAllData();

    // search
    if(isset($_POST['btn_cari'])) {
        $data = getAllDataByKey($_POST);
    }
?>

<!-- main -->
<div class="row m-0">
    <div class="col-2 col-lg-1.1">
        <?php require 'templates/side.php'; ?>
    </div>

    <div class="col ml-3">
        <!-- headline -->
        <div class="row mt-4 mb-4">
            <div class="col">
                <h3>Hallo admin, <b><?php echo $_SESSION['login']['username']; ?></b></h3>
                <p class="text-sec">Dibawah ini merupakan data pendaftar yang belum melengkapi biodata 😎.</p>
            </div>
        </div>
        <!-- // headline -->

        <!-- search -->
        <div class="row">
            <div class="col col-lg-6">
                <form acrion="" method="post" class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="key" autocomplete="off">
                    <button class="btn btn-outline-success my-2 my-sm-0 px-3" type="submit" name="btn_cari">Cari</button>
                </form>
            </div>
        </div>
        <!-- // search -->

        <!-- table data pendaftar -->
        <div class="row mt-4">
            <div class="col col-lg-10">
                <table class="table border shadow-sm">
                    <thead class="bg-prim">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; foreach($data as $row) : ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td>
                                <a href="#" onclick="window.open('detil_pendaftar.php?id=<?php echo $row['id']; ?>', 'newwindow', 'width=800,height=380, top=110, left=300', 'titlebar=0'); return false;" class="badge badge-success p-2">detail</a>
                                <a href="deleteUser.php?id=<?php echo $row['id']; ?>" class="badge badge-danger p-2" onclick="return confirm('yakin hapus data?');">hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- // table data pendaftar -->
    </div>
</div>
<!-- // main -->


<!-- footer -->
<?php require 'templates/footer.php'; ?>