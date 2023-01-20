<?php
session_start();
error_reporting(0);
if ($_SESSION['id'] == 5) {
        include('../tilkoble.php');
        $connect->select_db("users");

        $pNavn = $_POST['pNavn'];
        $miBe = $_POST['minibeskriv'];
        $beskriv = $_POST['beskriv'];
        $pris = $_POST['pris'];

        $destination = "../product_img/";
        $upload_file = $destination . basename($_FILES['uploadImg']['name']);



        if (move_uploaded_file($tempname, $destination)) {
            echo 'upload succes';
        } else {
            echo 'upload failed';
        }
} else {
    echo "Ingen tilgang";
}



//$query = "INSERT INTO produkter (proNavn, miniBeskriv, beskrivelse, pris) VALUES ('$pNavn', '$miBe', '$beskriv', '$pris')";
//mysqli_query($connect, $query);