<?php
session_start();
include('../tilkoble.php');
$connect->select_db('users');
if ($_SESSION['admin'] === true) {
    ?>
<html>
<body>
<head>
    <meta name="viewport" content="width=initial-scale, initial-scale">
    <meta charset="UTF-8" />
    <title>Admin dashboard</title>
    <link href="../style.css" rel="stylesheet">

</head>
<?php include("../komponenter/header.html"); ?>
<main>
    <h2>Velkommen tilbake
    <?php
    $id = $_SESSION['id'];
    $personNavn = mysqli_query($connect,"SELECT navn FROM brukere WHERE ID='$id'");
    $personNavn = mysqli_fetch_array($personNavn, MYSQLI_ASSOC);
    echo $personNavn['navn']
    ?>
    </h2>
</main>
</body>
</html>
<?php
} else {
    include("../komponenter/unathorized.html");
}


