<?php
require '../app/config.php';

if(!isset($_SESSION['login']['status']) == true && !isset($_SESSION['login']['role']) == 'user') {
    header("Location: http://localhost/aplikasi-pendaftaran-prakerin/gate.php");
} else if(!isset($_SESSION['login']['status']) == true && !isset($_SESSION['login']['role']) == 'admin') {
    header("Location: http://localhost/aplikasi-pendaftaran-prakerin/gate.php");
}

if(isset($_SESSION['login']['status']) == true && isset($_SESSION['login']['role']) == 'user') {
    header("Location: " . BASEURL . "user/");
} else if(isset($_SESSION['login']['status']) == true && isset($_SESSION['login']['role']) == 'user'){
    header("Location: " . BASEURL . "admin/");
}