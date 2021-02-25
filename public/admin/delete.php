<?php session_start(); require '../../app/config.php';

$id = $_GET['id'];

if(deleteComplete($id) > 0) {
    header("Location: complete.php");
} else {
    echo 'ggl';
}