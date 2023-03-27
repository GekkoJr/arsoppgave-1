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
    $masterOK = true; // en sjekk som ligger i programet og som kan stoppe opplastningen av ting

    //definerer variabler som blir brukt senere
    $images = array();

    // om det er filer til produktet legg de til i et eget directory
    if (isset($_FILES)) {
        // sjekker om filmappen allerede eksisterer
        if (file_exists('../product_img/' . $pNavn)) {
            echo "produktet eksisterer allerede. Prøv og endre det istedenfor";
            $masterOK = false;
        } else {
            mkdir('../product_img/' . $pNavn);
        }
    }
    $destination = "../product_img/" . $pNavn . "/";
    // går igjennom alle bildene som er lastet opp og setter variabler til det bildet
    foreach ($_FILES['uploadImg']['tmp_name'] as $key => $tmp_name) {
        $ok = FALSE;
        $upload_file = $destination . basename($_FILES['uploadImg']['name'][$key]);
        $temp_name = $_FILES['uploadImg']['tmp_name'][$key];
        $filename = $_FILES['uploadImg']['name'][$key];
        $imageType = strtolower(pathinfo($upload_file, PATHINFO_EXTENSION));

        // sjekker om det er et faktisk bilde ved å se om det har dimensjoner
        if (isset($_POST['upload'])) {
            $sjekk = getimagesize($temp_name);
            if ($sjekk !== false) {
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
        if ($imageType != 'jpg' && $imageType != 'png' && $imageType != 'jpeg') {
            echo "filformat ikke akseptert";
            $ok = FALSE;
        }

        // laster opp bilde om det passerte alle sjekkende
        if ($ok == FALSE || $masterOK == false) {
            echo "bilde ble ikke opplasted";
        } else {
            if (move_uploaded_file($_FILES['uploadImg']['tmp_name'][$key], $upload_file)) {
                echo 'upload succes';
                echo $upload_file;
                array_push($images, $filename);
                print_r($images);
            } else {
                echo 'upload failed';
            }

        }


    }
    $arrayIMG = implode(" ", $images);
    $query = "INSERT INTO produkter (image , proNavn, miniBeskriv, beskrivelse, pris, dirNavn) VALUES ('$arrayIMG' , '$pNavn', '$miBe', '$beskriv', '$pris', '$pNavn')";
    if ($masterOK) {
        mysqli_query($connect, $query);
    }
} else {
    echo "Ingen tilgang";
}




