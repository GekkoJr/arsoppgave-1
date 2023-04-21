<?php
session_start();
include("../tilkoble.php");
$connect->select_dB("users");

$addresse = mysqli_real_escape_string($connect ,$_POST['addresse']);
$postnr = mysqli_real_escape_string($connect ,$_POST['postnr']);
$by = mysqli_real_escape_string($connect ,$_POST['by']);

$produkter =

if(!$_SESSION['id']) {
    $fornavn = mysqli_real_escape_string($connect ,$_POST['fornavn']);
    $etternavn = mysqli_real_escape_string($connect , $_POST['etternavn']);
    $epost = mysqli_real_escape_string($connect , $_POST['epost']);

    $query = "INSERT INTO ordre (produkter, prisPerStk, pris, epost, navn) VALUES () "


}