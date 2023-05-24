<?php
session_start();
include("tilkoble.php");
$connect->select_db("users");
// henter produkter
$query = "SELECT proID, image, proNavn, miniBeskriv, pris, dirNavn FROM produkter";
$result = mysqli_query($connect, $query);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
$count = 4

?>
<!DOCTYPE html>
<html lang="en">
<?php
include("komponenter/meta.php")
?>
<body>
<?php
include("komponenter/header.html")
?>
<main class="homepageEdt">
    <img alt="Velkommen til Digistore" src="ikoner/homepage.jpg">
    <h3 style="text-align: center">Kunne dette vært interessant?</h3>
        <div class="product-gallery" style="justify-content: center; margin-bottom: 20px">
        <?php
        // henter 4 produkter å vise
        while ($count !== 0) {
            $count--;
            $dirNavn = $rows[$count]['dirNavn'];
            $proNavn = $rows[$count]['proNavn'];
            $imgArr = $rows[$count]['image'];
            $pris = $rows[$count]['pris'];;
            $miniBe = $rows[$count]['miniBeskriv'];
            $id = $rows[$count]['proID'];
            $imgArr = explode(' $,$ ', $imgArr);
            $imgSrc = "product_img/" . $dirNavn . "/" . $imgArr[0];
            ?>
            <a href=produkt.php?id=<?php echo $id ?>>
                <div class="product">
                    <div class="img-container">
                        <img src="<?php echo $imgSrc ?>" alt="<?php echo $proNavn ?>">
                    </div>
                    <div class="mini-txt">
                        <h4><?php echo $proNavn ?></h4>
<!--                        <p class="mini-beskriv">--><?php //echo $miniBe ?><!--</p>-->
                        <p><?php echo $pris . ' kr' ?></p>
                    </div>
                </div>
            </a>

        <?php } ?>
    </div>
</main>

<?php
include("komponenter/footer.html")
?>
</body>


</html>