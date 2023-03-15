<?php
session_start();
include("../tilkoble.php");
$connect ->select_db ("users"); // velger database
$username = $_POST['email'];
$password = $_POST['password'];

// prevent sql injection
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($connect, $username);
$password = mysqli_real_escape_string($connect, $password);

$query = "SELECT passord, ID, admin FROM brukere WHERE mail = '$username'"; //henter passordet knyttet til eposten, returnerer bare en rad pga sjekken om emailen er i databasen
$login = mysqli_query($connect, $query); // spør databasen om brukere som matcher
$row = mysqli_fetch_array($login, MYSQLI_ASSOC); // flytter data inn i en array

if(password_verify($password, $row['passord'])) {
    echo "login succes";
    $_SESSION['id'] = $row['ID'];
    if ($row['admin'] == 1) {
        $_SESSION['admin'] = True;
        header("Location: ../admin/dashboard.php");
    } else {
        $_SESSION['admin'] = False;
    }
} else {
    echo "Feil bruker navn eller passord";
}

$count = mysqli_num_rows($login); // sjekker hvor mange rader som eksiterer med de spesifikasjonene og lagrer de


