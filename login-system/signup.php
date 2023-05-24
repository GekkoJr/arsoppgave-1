<?php
include("../tilkoble.php");
$connect ->select_db("users");
// henter inn info
$navn = $_POST['navn'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$etterNavn = $_POST['etterNavn'];

// passer på at ingen er tomme
if($navn == "" || $mail == "" || $pass == "" || $etterNavn == "") {
    echo "Et eller flere felt er tomme";
    echo "<a href=signup.html> Prøv igjen </a>";
} else {

    // sjekker om brukerern eksysterer
    $query0 = "SELECT * FROM brukere WHERE mail = '$mail'";
    $eksi = mysqli_query($connect, $query0);
    $row = mysqli_fetch_array($eksi, MYSQLI_ASSOC); // flytter data inn i en array
    $num = mysqli_num_rows($eksi); // sjekker hvor mange rader som eksiterer med de spesifikasjonene og lagrer de
    if ($num > 0) {
        echo "det finnes alerede en bruker med denne eposten";
        die();
    } else {

        $navn = stripslashes($navn);
        $navn = mysqli_real_escape_string($connect, $navn);
        $mail = stripslashes($mail);
        $mail = mysqli_real_escape_string($connect, $mail);
        $pass = stripslashes($pass);
        $pass = mysqli_real_escape_string($connect, $pass);
        $pass = password_hash($pass, CRYPT_SHA512);

        // legger inn brukeren
        $query = "INSERT INTO brukere (navn, etternavn, mail, passord, admin) VALUES ('$navn', '$etterNavn', '$mail', '$pass', 0)";

        if (mysqli_query($connect, $query)) {
            echo "ny bruker opprettet, du kan nå logge inn";
            header("Location: loginf.php");
        } else {
            echo "Feil i oppretning av bruker, prøv igjenn senere";
        }

        mysqli_close($connect);
    }
}
