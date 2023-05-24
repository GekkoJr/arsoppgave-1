<?php
session_start();
include('../tilkoble.php');
if ($_SESSION['admin'] === true || $_SESSION['ordePerson'] === true) {
    // henter hvilken bestilling som skal endres og setter den til fullført
    $ordre = $_GET['item'];

    $connect->select_db('users');

    $ordre = mysqli_real_escape_string($connect ,$ordre);
    $query = "UPDATE ordre SET status = 'fullført' WHERE ordreNr = '$ordre'";
    $result = mysqli_query($connect, $query);

    header('Location: dashboard.php');
} else {
    include('../komponenter/unathorized.html');
}
