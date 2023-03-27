<html lang="en">
<body>
<head>
    <meta name="viewport" content="width=device-width, initial-1">
    <link rel="stylesheet" href="../style.css">
</head>
<?php include("../komponenter/header.html"); ?>
<main>
<?php
try {
    if(!isset($_SESSION['id'])) {
        header("Location: checkout.php");
        throw new Exception();
        ?>
            <p>Redirifering<p>
            <?php
    }

} catch(Exception $e) {
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