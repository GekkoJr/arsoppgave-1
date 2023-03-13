<?php
session_start();
error_reporting(0);
// sjekker om du er logget inn som admin
if ($_SESSION['admin']) {
        include('../tilkoble.php');
        $connect->select_db("users");

        // henter informasjon om produktet
        $pNavn = $_POST['pNavn'];
        $miBe = $_POST['minibeskriv'];
        $beskriv = $_POST['beskriv'];
        $pris = $_POST['pris'];

        //definerer variabler som blir brukt senere

        $destination = "../product_img/";
        echo "kom vi hit";
        foreach($_FILES['uploadImg']['tmp_name'] as $key => $tmp_name) {
        $ok = FALSE;
        $upload_file = $destination . basename($_FILES['uploadImg']['name'][$key]);
        $temp_name = $_FILES['uploadImg']['tmp_name'][$key];
        $filename = $_FILES['uploadImg']['name'][$key];
        $imageType = strtolower(pathinfo($upload_file, PATHINFO_EXTENSION));

        echo "check 1" . $upload_file;

        // spørringen for å laste opp til db
        $query = "INSERT INTO produkter (image , proNavn, miniBeskriv, beskrivelse, pris) VALUES ('$filename' , '$pNavn', '$miBe', '$beskriv', '$pris')";

        // sjekker om det er et faktisk bilde ved å se om det har dimensjoner
        if(isset($_POST['upload'])) {
            $sjekk = getimagesize($temp_name);
            if($sjekk !== false) {
                $ok = TRUE;
            } else {
                echo "filen er ikke et bilde";
                $ok = FALSE;
            }
        }
        echo "-- hve med ?--";
        //sjekker om det allerde finnes et bilde med samme navn
        if (file_exists($upload_file)) {
            echo "filen eksister allerede";
            $ok = FALSE;
        }


        //sjekker om filformattet skal støttes
        if ($imageType != 'jpg' && $imageType != 'png' && $imageType != 'gif' && $imageType != 'jpeg') {
            echo "filformat ikke akseptert";
            $ok = FALSE;
        }
echo "-- hva med hit--" . $ok;
        // laster opp bilde om det passerte alle sjekkende
        if ($ok == FALSE) {
            echo "bilde ble ikke opplasted";
        } else {
            echo "-- her pls--";
            if (move_uploaded_file($_FILES['uploadImg']['tmp_name'][$key], $upload_file)) {
                echo 'upload succes';

            } else {
                echo 'upload failed';
            }

        }
        echo "-- hit da?";
        }
        // mysqli_query($connect, $query);
} else {
    echo "Ingen tilgang";
}




