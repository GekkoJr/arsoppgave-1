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

// henter brukeren hvor mail addresen mtvher
$query = "SELECT passord, ID, admin, ordePerson FROM brukere WHERE mail = '$username'"; //henter passordet knyttet til eposten, returnerer bare en rad pga sjekken om emailen er i databasen
$login = mysqli_query($connect, $query); // spør databasen om brukere som matcher
$row = mysqli_fetch_array($login, MYSQLI_ASSOC); // flytter data inn i en array

// verifiserer passordet
if(password_verify($password, $row['passord'])) {
    echo "login succes";
    $_SESSION['id'] = $row['ID'];
    if ($row['admin'] == 1) {
        $_SESSION['admin'] = true;
        header("Location: ../admin/dashboard.php");
    } else if ($row['ordePerson'] == 1){
        $_SESSION['ordePerson'] = true;
        header('Location: ../admin/dashboard.php');
    } else {
        $_SESSION['admin'] = false;
        $_SESSION['ordePerson'] = false;
        header('Location: ../kundesider/dashboard.php');
    }


} else {
    echo "Feil bruker navn eller passord";
    header("Location: loginf.php");
}

$count = mysqli_num_rows($login); // sjekker hvor mange rader som eksiterer med de spesifikasjonene og lagrer de


