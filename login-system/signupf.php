<!DOCTYPE html>
<html lang="en">
<?php
include("../komponenter/meta.php")
// alt denne siden gjør er å hente data og yeete det inn i php
?>

<body>
<?php include("../komponenter/header.html") ?>
<main>
    <div id="login-form">

    <form name="form" action="signup.php" method="post">
        <h3>Lag ny bruker</h3>
        <div><label>Fornavn<input type="text" id="navn" name="navn" placeholder="Kari"></label></div>
        <div><label>Etternavn<input type="text" id="etterNavn" name="etterNavn" placeholder="Nordman"></label></div>
        <div><label>E-Mail<input type="email" id="mail" name="mail" placeholder="mail@mail.com"></label></div>
        <div><label>Passord<input type="password" id="pass" name="pass"></label></div>
        <button type="submit" id="sub-btn">Lag bruker</button>
        <p>Har du allerede en bruker <a style="color: blue" href="loginf.php">Logg inn</a></p>
    </form>
    </div>

</main>


</body>
</html>