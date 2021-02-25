<?php session_start();
  require 'app/config.php';
  if(isset($_POST['btn_login'])) {
    if($fetch = login($_POST)) {
      $_SESSION['login'] = [
        'status' => true,
        'role' => $fetch['role'],
        'username' => $fetch['username'],
        'email' => $fetch['email'],
        'id' => $fetch['id']
      ];

      if(isset($_SESSION['login']['status']) == true && isset($_SESSION['login']['role']) == 'user') {
        header("Location: " . BASEURL . "user/");
      } else if(isset($_SESSION['login']['status']) == true && isset($_SESSION['login']['role']) == 'admin'){
        header("Location: " . BASEURL . "admin/");
      }
    } else {
      flasher('Invalid!', 'danger', 'login, please check your email and password');
    }
  }

  if(isset($_SESSION['login']['status']) == true && isset($_SESSION['login']['role']) == 'user') {
    header("Location: " . BASEURL . "user/");
  }

  if(isset($_SESSION['login']['status']) == true && isset($_SESSION['login']['role']) == 'admin') {
    header("Location: " . BASEURL . "admin/");
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
    <div class="row">
      <div class="col mt-4 p-4 border-light shadow bg-light">
        <div class="row">
          <div class="col d-none col-lg-4 d-lg-block">
            <img src="https://images.unsplash.com/photo-1577670552647-6ce12a463e7d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=375&q=80" alt="img" class="img-fluid">
          </div>
          <div class="col">
            <form action="" method="post">
              <h3>Halaman Login</h3>
              <p class="text-muted">Hai, selamat datang. Silahkan login untuk mendaftar</p>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" autocomplete="off">
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div>
              <button type="submit" class="btn btn-primary px-4" name="btn_login"><b>Log in</b></button>
              <hr>
              <p class="text-muted">Don't have an account? <a href="reg.php">Sign Up</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="public/assets/js/bootstrap.min.js"></script>
  <script src="public/assets/js/popper.min.js"></script>
  <script src="public/assets/js/jquery-3.4.1.min.js"></script>
</body>
</html>