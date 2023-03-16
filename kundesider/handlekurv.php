<?php
session_start();
//error_reporting(0);

include("../tilkoble.php");
$connect->select_db("users");
?>

<html lang="en">
<head>
    <link href="../style.css" rel="stylesheet">
</head>
<body>
<?php include("../komponenter/header.html"); ?>;
<main>
    <?php
    if($_SESSION['handlekurv']) {
        $index = 0;
        foreach ($_SESSION['handlekurv'] as $element) {
            $query = "SELECT * from produkter WHERE proID = '$element'";
            $result = mysqli_query($connect, $query);
            $result = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $images = explode(" ", $result['image']);
            $image = "../product_img/" . $result['dirNavn'] . "/" . $images[0];

            ?>
            <div class="handlekurv-item">
                <img src="<?php echo $image; ?>" alt="<?php echo $result['miniBeskriv'] ?>">
                <h3><?php echo $result['proNavn'] ?></h3>
                <p><?php echo $result['miniBeskriv'] ?></p>
                <p class="handlekurv-tall"><?php echo $_SESSION['mengde'][$index] ?></p>
                <p class="handlekurv-tall"><?php echo $_SESSION['mengde'][$index] * $result['pris'] ?></p>
            </div>
    <?php
            $index++;
        }
    }



    ?>
</main>
</body>
</html>
