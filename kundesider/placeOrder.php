<?php
session_start();
include("../tilkoble.php");
$connect->select_dB("users");

$addresse = mysqli_real_escape_string($connect, $_POST['addresse']);
$postnr = mysqli_real_escape_string($connect, $_POST['postnr']);
$by = mysqli_real_escape_string($connect, $_POST['by']);
$antall = implode(",", $_SESSION['mengde']);
$status = "mottat";

$produkter = $_SESSION['handlekurv'];
$prisPer = array();
$sum = 0;

// rengner ut total pris
foreach ($produkter as $element) {
    $query = "SELECT * From produkter WHERE proID = '$element'";
    $result = mysqli_query($connect, $query);
    $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
    print_r($result['pris']);
    $pris = intval($result['pris']);
    array_push($prisPer, $result['pris']);
    $sum = $sum + $pris;
}

// gjør om til strings for databasen
$prisPerS = implode(', ', $prisPer);
$produkterS = implode(', ', $produkter);

// om det er betalt legg det til i databasen
if ($_POST['paid']) {
    if (!$_SESSION['id']) {
        $fornavn = mysqli_real_escape_string($connect, $_POST['fornavn']);
        $etternavn = mysqli_real_escape_string($connect, $_POST['etternavn']);
        $epost = mysqli_real_escape_string($connect, $_POST['email']);
        $navn = $fornavn . " " . $etternavn;

        $query = "INSERT INTO ordre (produkter, prisPerStk, pris, kundeID, navn, addresee, postnr, city, antall, status) VALUES ('$produkterS', '$prisPerS', '$sum', '$epost' , '$navn', '$addresse', '$postnr', '$by', '$antall', '$status')";
        mysqli_query($connect, $query);
    } else {
        $kundeID = $_SESSION['id'];

        $query = "INSERT INTO ordre (produkter, prisPerStk, pris, kundeID, addresee, postnr, city, antall, status) VALUES ('$produkterS', '$prisPerS', '$sum', '$kundeID', '$addresse', '$postnr', '$by', '$antall', '$status')";
        mysqli_query($connect, $query);
    }
    header("Location: ../nettbutikk.php");
} else {
    echo "Error: Betaling failed";
    echo "<a href='checkout.php'><button>Gå tilbake</button></a>";
}


