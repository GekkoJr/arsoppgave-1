<?php
session_start();
include("tilkoble.php");
$connect->select_db("users");

$query ="SELECT proID, image, proNavn, miniBeskriv, pris FROM produkter";
$result = mysqli_query($connect, $query);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);


//print_r($rows[1]['proID']); henter rad 1(2) sin proID
?>
<html>
<head>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<header>

</header>
<main>
    <div class="product-gallery">
    <?php
while ($count !== 0) {
$count --;
$proNavn = $rows[$count]['proNavn'];
$imgSrc = "product_img/" . $rows[$count]['image'];
$pris = $rows[$count]['pris'];;
$miniBe = $rows[$count]['miniBeskriv'];
?>
    <div class="product">
        <div class="img-container">
            <img src="<?php echo $imgSrc ?>" alt="<?php echo $proNavn ?>">
        </div>
        <div class="mini-txt">
            <h4><?php echo $proNavn ?></h4>
            <p class="mini-beskriv"><?php echo $miniBe ?></p>
            <p><?php echo $pris . ' kr'?></p>
        </div>
    </div>

<?php } ?>
</div>
</main>
</html>



