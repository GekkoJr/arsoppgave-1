<?php
session_start();
include("../tilkoble.php");
$connect->select_db("users");

if ($_SESSION['handlekurv']) {
    $index = 0;
    $pris = 0;
    foreach ($_SESSION['handlekurv'] as $element) {
        $query = "SELECT * from produkter WHERE proID = '$element'";
        $result = mysqli_query($connect, $query);
        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $addidion = $result['pris'] * $_SESSION['mengde'][$index];
        $pris += $addidion;
        $index++;
    }
}
?>
<!DOCTYPE html>
<html lang=en>
<?php
$title = "checkout";
include("../komponenter/meta.php");
?>
<body>
<?php include("../komponenter/header.html") ?>
<main>
    <div class="payment">
        <form method="post" action="placeOrder.php">
            <div class="payment-proccessing">
                <label>
                    <input type="checkbox" id="paid">
                    Bank info / kort
                </label>
            </div>
            <div class="info">
                <div class="grid3x1">
                    <div>
                        <p>Addresse</p>
                        <label>
                            <input type="text" name="addresse">
                        </label></div>
                    <div>
                        <p>Post Nummer</p>
                        <label>
                            <input type="text" name="postnr">
                        </label></div>
                    <div>
                        <p>By</p>
                        <label>
                            <input type="text" name="by">
                        </label></div>
                </div>

                <?php
                if (!$_SESSION['id']) {
                    ?>
                    <hr>
                        <p>Lag en bruker for å slippe å skrive inn navn og epost hvergang</p>
                    <div class="grid3x1">
                        <div>
                            <p>Fornavn</p>
                            <label>
                                <input type="text" name="fornavn">
                            </label></div>
                        <div>
                            <p>Etternavn</p>
                            <label>
                                <input type="text" name="etternavn">
                            </label></div>
                        <div>
                            <p>EpostAddresse</p>
                            <label>
                                <input type="text" name="email"
                            </label></div>
                    </div>
                    <?php
                }

                ?>
            </div>
            <div>
                <p>
                    <?php echo "Totalt og betale: " . $pris . " Nok" ?>
                </p>
            </div>
            <button type="submit" class="generic-button">Bestill</button>
        </form>
    </div>
</main>
</body>
</html>
