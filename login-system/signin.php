<?php
include("../tilkoble.php");
$connect ->select_db("users");

$navn = $_POST['navn'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];

//TODO: sql injection proofing

$query = "INSERT INTO brukere (navn, mail, passord) VALUES ('$navn', '$mail', '$pass')";

if (mysqli_query($connect, $query)) {
    echo "ny bruker opprettet, du kan nå logge inn";
} else {
    echo "Feil i oppretning av bruker, prøv igjenn senere";
}

mysqli_close($connect);