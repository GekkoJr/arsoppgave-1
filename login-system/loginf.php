<?php
session_start();
error_reporting(0);
if($_SESSION['id']) {
    if($_SESSION['admin'] === true) {
    header('Location: ../admin/dashboard.php');
    } else if ($_SESSION['ordePerson'] === true) {
        header('Location: ../admin/dashboard.php');
    } else {
        header('Location: ../kundesider/dashboard.php');
    }
}

?>

<!doctype html>
<html lang="en">

<?php
include("../komponenter/meta.php")
?>

<body>
<?php include("../komponenter/header.html") ?>
<main>
<div id="login-form">
    <form action="login.php" method="post"> <!-- kan legge til validdering senere onsubmit="return validering()"--->
        <div>
            <label>E-Mail<input type="email" id="email" name="email" placeholder="per@permail.com"></label>
        </div>
       <div>
            <label>Passord<input type="password" id="password" name="password"></label>
        </div>
        <button type="submit" id="sub-btn">Logg Inn</button>
        <p>Har du ikke en bruker <a style="color: blue" href="signupf.php">Lag en her</a></p>
    </form></div></main>
</body>

</html>