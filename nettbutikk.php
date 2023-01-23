<?php
session_start();
include("tilkoble.php");
$connect->select_db("users");

$query ="SELECT proID, image, proNavn, miniBeskriv FROM produkter";
$result = mysqli_query($connect, $query);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

//print_r($rows[1]['proID']); henter rad 1(2) sin proID
?>
<html>
<head>

</head>
<header>

</header>
<main>
    <?php
while ($count !== 0) {
$count --;



}
?>
</main>
</html>



