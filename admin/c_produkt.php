<?php
session_start();
error_reporting(0);
// sjekker om du er logget inn som admin aka id 5
if ($_SESSION['id'] == 5) {
        include('../tilkoble.php');
        $connect->select_db("users");

        // henter informasjon om produktet
        $pNavn = $_POST['pNavn'];
        $miBe = $_POST['minibeskriv'];
        $beskriv = $_POST['beskriv'];
        $pris = $_POST['pris'];

        //definerer variabler som blir brukt senere
        $ok = FALSE;
        $destination = "../product_img/";
        $upload_file = $destination . basename($_FILES['uploadImg']['name']);
        $temp_name = $_FILES['uploadImg']['tmp_name'];
        $filename = $_FILES['uploadImg']['name'];
        $imageType = strtolower(pathinfo($upload_file, PATHINFO_EXTENSION));

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

        // laster opp bilde om det passerte alle sjekkende
        if ($ok == FALSE) {
            echo "bilde ble ikke opplasted";
        } else {
            if (move_uploaded_file($_FILES['uploadImg']['tmp_name'], $upload_file)) {
                echo 'upload succes';
                mysqli_query($connect, $query);

            } else {
                echo 'upload failed';
            }
        }
} else {
    echo "Ingen tilgang";
}




