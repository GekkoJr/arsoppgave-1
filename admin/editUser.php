<?php
session_start();
error_reporting(1);
include("../tilkoble.php");
$connect->select_db("users");

// For å endre bruker greier (kun adnmin)

?>
<!DOCTYPE HTML>
<html lang="en">
<?php
include("../komponenter/meta.php")
?>
<body>
<?php
include("../komponenter/header.html")
 ?>
<main>

<?php
if ($_SESSION['admin'] === true) {
    $userToEdit = $_GET['user'];
    // henter inn bruker edit med bruker for å redigere
    include("../komponenter/userInfo.php");

} else {
    include('../komponenter/unathorized.html');
}

?>
</main>
</body>
</html>