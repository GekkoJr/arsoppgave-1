<?php

include("../tilkoble.php");
$connect ->select_db ("users"); // velger database
$username = $_POST['email'];
$password = $_POST['password'];

// prevent sql injection
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($connect, $username);
$password = mysqli_real_escape_string($connect, $password);


$query = "SELECT * FROM brukere WHERE mail = '$username' AND passord = '$password'";
$login = mysqli_query($connect, $query); // spør databasen om brukere som matcher
$row = mysqli_fetch_array($login, MYSQLI_ASSOC); // flytter data inn i en array
$count = mysqli_num_rows($login); // sjekker hvor mange rader som eksiterer med de spesifikasjonene og lagrer de

if($count == 1) { // sjekker om det finnes akkurat en bruker 
    echo "<h1>login true</h1>";
}
else{
    echo "<h1>login failed</h1>";
}
