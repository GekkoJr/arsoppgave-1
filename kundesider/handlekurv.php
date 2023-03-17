<?php
session_start();
//error_reporting(0);

include("../tilkoble.php");
$connect->select_db("users");
?>

<html lang="en">
<head>
    <link href="/style.css" rel="stylesheet">
</head>
<body>
<?php include("../komponenter/header.html"); ?>
<main>
    <div class="handlekurv-item">
        <br>
        <p>produkt</p>
        <p>Antall</p>
        <p>Pris .stk</p>
        <p>Totalt</p>
        <br>
    </div>
    <?php
    if ($_SESSION['handlekurv']) {
        $index = 0;
        foreach ($_SESSION['handlekurv'] as $element) {
            $query = "SELECT * from produkter WHERE proID = '$element'";
            $result = mysqli_query($connect, $query);
            $result = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $images = explode(" ", $result['image']);
            $image = "../product_img/" . $result['dirNavn'] . "/" . $images[0];

            ?>
                <form action="fjern_item.php" method="post">
                    <input value="<?php echo $result['proID'] ?>" style="display: none" name="id">
            <div class="handlekurv-item" id="<?php echo $result['proID'] ?>">
                <img src="<?php echo $image ?>" alt="<?php echo $result['miniBeskriv'] ?>">
                <div>
                    <h3><?php echo $result['proNavn'] ?></h3>
                    <p><?php echo $result['miniBeskriv'] ?></p>
                </div>
                <p class="handlekurv-tall center"><?php echo $_SESSION['mengde'][$index] ?></p>
                <p class="handlekurv-tall"><?php echo $result['pris'] ?></p>
                <p class="handlekurv-tall"><?php echo $_SESSION['mengde'][$index] * $result['pris'] ?></p>
                <button type="submit">&#9747;</button>
            </div>
                </form>
            <?php
            $index++;
        }
    }


    ?>
</main>
</body>
</html>
