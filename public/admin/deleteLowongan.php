<?php session_start(); require '../../app/config.php';

$id = $_GET['id'];

if(deleteLowongan($id) > 0) {
    header("Location: tambah_lowongan.php");
} else {
    echo 'ggl';
}