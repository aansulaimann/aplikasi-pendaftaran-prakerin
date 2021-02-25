<?php require 'app/config.php';

    if(isset($_POST['btn_reg'])) {
        if(register($_POST) > 0) {
            flasher("Selamat!", "success", "berhasil membuat akun");
        } else {
            flasher("Oops!", "danger", "berhasil membuat akun");  
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>

  <!-- link bootstrap 4.6 -->
  <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
  <!-- link favicon -->
  <link rel="shortcut icon" href="public/assets/img/favicon.ico" type="image/x-icon">
</head>
<body>
<div class="container">
    <div class="row mt-4 bg-light p-4 rounded shadow">
        <div class="col">
        <h3>Register page</h3>
        <p class="text-muted">please add your username, email and password.</p>
            <form action="" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" autocomplete="off">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username" autocomplete="off">
                </div>
                <div class="form-group mb-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                </div>
                <div class="form-group mb-4">
                    <label for="konfirPass">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="konfirPass" name="konfirmPass" autocomplete="off">
                </div>
                <button type="submit" class="btn btn-primary px-4" name="btn_reg">Buat Akun</button>
                <a href="gate.php" class="btn btn-outline-primary">batal</a>
            </form>
        </div>
    </div>
</div>

  <script src="public/assets/js/jquery-3.4.1.min.js"></script>
  <script src="public/assets/js/popper.min.js"></script>
<script src="public/assets/js/bootstrap.min.js"></script>
</body>
</html>