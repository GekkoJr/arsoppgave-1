<?php
session_start();
include("../tilkoble.php");
$connect->select_db("users");

$toEdit = $_POST['toEdit'];
echo $toEdit;

$navn = $_POST['navn'];
$etternavn = $_POST['etternavn'];
$mail = $_POST['mail'];

$query = "UPDATE brukere SET navn = '$navn', etternavn = '$etternavn', mail = '$mail' WHERE ID='$toEdit'";
$query = mysqli_real_escape_string($connect, $query);
mysqli_query($connect, $query);

if($_POST['admin']) {
    mysqli_query($connect, "UPDATE brukere SET admin = 1 WHERE ID = '$toEdit'");
} else {
    mysqli_query($connect, "UPDATE brukere SET admin = 0 WHERE ID = '$toEdit'");
}

if($_POST['ordre']) {
    mysqli_query($connect, "UPDATE brukere SET ordePerson = 1 WHERE ID = '$toEdit'");
} else {
    mysqli_query($connect, "UPDATE brukere SET ordePerson = 0 WHERE ID = '$toEdit'");
}

