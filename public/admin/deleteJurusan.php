<?php session_start(); require '../../app/config.php';

$id = $_GET['id'];

if(deleteJurusan($id) > 0) {
    header("Location: tambah_jurusan.php");
} else {
    echo 'ggl';
}