<?php
session_start();
include("tilkoble.php");
$connect->select_db("users");

$produktID = $_GET["id"];

$query = "SELECT * FROM produkter WHERE proID = '$produktID'";
$result = mysqli_query($connect, $query);
$produkt = mysqli_fetch_array($result, MYSQLI_ASSOC);

// henter all info til produkt artiklen
$proNavn = $produkt['proNavn'];
$images = explode(" ", $produkt['image']);
$dirNavn = $produkt['dirNavn'] // directory navnet bildene er i

?>
<html lang="en">
<head>
    <link href="style.css" rel="stylesheet">
    <title><?php echo $proNavn; ?></title>
</head>

<body>
<main>
    <h1><?php echo $proNavn ?></h1>
    <div class="produkt">
        <div class="img-slide-container">
            <?php
            foreach ($images as $src) {
                $src = "product_img/" . $dirNavn . "/" . $src;
                
            }
            ?>
        </div>


    </div>
</main>
</body>


</html>