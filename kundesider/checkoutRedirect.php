<?php
session_start();
error_reporting(0)
?>
<html lang="en">
<body>
<?php
// dette dokumentet ber brukeren logge inn får å se alle sine ordre
$title = "Redirigerer";
include("../komponenter/meta.php"); ?>
<body>
<?php
include("../komponenter/header.html"); ?>
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
            <a href="../login-system/loginf.php">
                <button> Ja, gå til login &#8594;</button>
            </a>
            <a href="checkout.php">
                <button>Nei, fortsett uten bruker</button>
            </a>
        </div>


        <?php
    }
    ?>
</main>
</body>
</html>