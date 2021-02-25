<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>

  <!-- link bootstrap 4.6 -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <!-- link favicon -->
  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
  <!-- link css -->
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 px-4">
  <a class="navbar-brand" href="#">App Prakerin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
        <a class="nav-link"><?php echo $_SESSION['login']['username']; ?></a>
        <a class="nav-link" href="./profile.php"><img src="../assets/img/logo_user.png" alt="404" width="20"></a>
    </div>
  </div>
</nav>
<!-- // navbar -->
