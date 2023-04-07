<?php
session_start();
error_reporting(0)
?>
<html lang="en">
<body>
<head>
    <meta name="viewport" content="width=device-width, initial-1">
    <link rel="stylesheet" href="../style.css">
</head>
<?php include("../komponenter/header.html"); ?>
<main>
    <?php
    if ($_SESSION['id']) {
        header("Location: checkout.php");
        ?>
        <p>Redirifering<p>
        <?php
    } else {
        ?>
        <div class="checkoutRedirectChoice">
            <h3>Du er ikke logget inn ønsker du å logge inn for å fortsette</h3>
            <button href="../login-system/loginf.php">Ja, gå til login &#8594;</button>
            <button href="checkout.php">Nei, fortsett uten bruker</button>
        </div>


        <?php
    }


    ?>
</main>
</body>
</html>