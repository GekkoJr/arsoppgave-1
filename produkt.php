<?php
session_start();
include("tilkoble.php");
$connect->select_db("users");

//tar produkt id fra url
$produktID = $_GET["id"];

// henter produktet fra databasen
$query = "SELECT * FROM produkter WHERE proID = '$produktID'";
$result = mysqli_query($connect, $query);
$produkt = mysqli_fetch_array($result, MYSQLI_ASSOC);

// henter all info til produkt artiklen
$proNavn = $produkt['proNavn'];
$images = explode(" ", $produkt['image']);
$dirNavn = $produkt['dirNavn']; // directory navnet bildene er i
$miniBeskriv = $produkt['miniBeskriv'];
$pris = $produkt['pris']

?>
<html lang="en">
<head>
    <link href="style.css" rel="stylesheet">
    <title><?php echo $proNavn; ?></title>
</head>

<body>
<?php include("komponenter/header.html")?>
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
                    <img class="slide-img" src="<?php echo $src; ?>" alt="bilde av produktet">

                </div>
            <?php
            }
            ?>
              <a class="tilbake" onclick="bytt(-1)">&#10094;</a>
              <a class="frem" onclick="bytt(1)">&#10095;</a>
            <script src="js/slide.js"></script>
        </div>
        <div class="kjop-container">
            <h2><?php echo $pris . " kr" ?></h2>
            <form action="produkt.php?id=<?php echo $produktID ?>" method="post">
                <input style="display:none" value="<?php echo $produktID; ?>" name="leggTil">
                <p>Antall</p>
                <input type="number" name="antall" value="1">
                <button type="submit">Legg til i handlevogn</button>
            </form>
        </div>

    </div>
</main>
</body>


</html>