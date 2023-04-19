<?php
session_start();
include("tilkoble.php");
$connect->select_db("users");
// defult value for hvor mange du skal ha
$defultValue = 1;

//tar produkt id fra url
$produktID = $_GET["id"];

// henter produktet fra databasen
$query = "SELECT * FROM produkter WHERE proID = '$produktID'";
$result = mysqli_query($connect, $query);
$produkt = mysqli_fetch_array($result, MYSQLI_ASSOC);

// henter all info til produkt artiklen
$proNavn = $produkt['proNavn'];
$images = explode(" $,$ ", $produkt['image']);
$dirNavn = $produkt['dirNavn']; // directory navnet bildene er i
$miniBeskriv = $produkt['miniBeskriv'];
$pris = $produkt['pris']

?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = $proNavn;
include("komponenter/meta.php")
?>

<body>
<?php include("komponenter/header.html");
// sjekker om den ble kjøpt og legger til i handlekurv
error_reporting(0); // fordi linjen under kan gi feilmeldinger skrur vi de av
if ($_POST['antall']) {
    if ($_SESSION['handlekurv']) {
        $sjekk = true;
        $index = 0;
        // sjekker om den allerede ligger i handlekurven, hvis så legger til flere
        foreach ($_SESSION['handlekurv'] as $element) {
            if ($element === $produktID) {
                $sjekk = false;
                $_SESSION['mengde'][$index] += $_POST['antall'];
                $index++;
            }
        }
        if ($sjekk) {
            array_push($_SESSION['handlekurv'], $produktID);
            array_push($_SESSION['mengde'], $_POST['antall']);
        }
    } else {
        $_SESSION['handlekurv'] = array();
        $_SESSION['mengde'] = array();
        array_push($_SESSION['handlekurv'], $produktID);
        array_push($_SESSION['mengde'], $_POST['antall']);
    }
    ?>
    <script>
        alert("produktet er lagt i handlevognen")
    </script>
    <?php
}
?>
<main>
    <h1><?php echo $proNavn ?></h1>
    <p><?php echo $miniBeskriv ?></p>
    <div class="produkt">
        <div class="img-slide-container">
            <?php
            foreach ($images as $src) {
                $src = "product_img/" . $dirNavn . "/" . $src;
                ?>
                <div class="slide slide-overgang">
                    <img class="slide-img" src="<?php echo $src; ?>" alt="<?php echo $proNavn ?>>">

                </div>
                <?php
            }
            ?>
            <a class="tilbake stopp-selection" onclick="bytt(-1)">&#10094;</a>
            <a class="frem stopp-selection" onclick="bytt(1)">&#10095;</a>
            <script src="js/slide.js"></script>
        </div>
        <div class="kjop-container">
            <h2><?php echo $pris . " kr" ?></h2>
            <p>ANTALL STJERNER KOMMER HER</p>
            <form action="produkt.php?id=<?php echo $produktID ?>" method="post">
                <input style="display:none" value="<?php echo $produktID; ?>" name="leggTil">
                <p>Antall</p>
                <?php
                include("komponenter/select_number.php");
                if ($produkt['Antall'] > 50) {
                    ?> <p class="tiny">Det er 50+ produkter på nettlager</p> <?php
                } else if ($produkt['Antall'] > 0) {
                    ?> <p class="tiny">Det er <?php echo $produkt['Antall'] ?> produkter på nettlager</p>
                    <?php
                } else {
                    echo "<p class='tiny'>Produktet er ikke tilgjengelig på vårt lager</p>";
                }
                ?>
                <button type="submit">Legg til i handlevogn</button>
            </form>
        </div>

    </div>

    <div class="tabcontainer">
        <div>
            <h3 class="tab">Produkt detaljer</h3>
            <h3 class="tab">Annmeldelser</h3>
        </div>
        <div class="tab-con">
            <p><?php echo $produkt['beskrivelse'] ?></p>
        </div>
        <div class="tab-con">
            <p>Det er ingen annmeldeser tilgjegelig</p>
        </div>
        <script src="js/tabs.js"></script>
        <script src="js/velgAntall.js"></script>
</main>
</body>


</html>