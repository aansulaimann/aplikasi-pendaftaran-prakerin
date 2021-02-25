<?php session_start(); require '../../app/config.php';

$id = $_GET['id'];

if(delete($id) > 0) {
    header("Location: pendaftar.php");
}