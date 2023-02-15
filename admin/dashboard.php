<?php
session_start();
include('../tilkoble.php');
$connect->select_db('users');
if ($_SESSION['admin']) {
    ?>
<html>
<body>
<head>
    <meta name="viewport" content="width=initial-scale, initial-scale">
    <meta charset="UTF-8" />
    <title>Admin dashboard</title>
    <link href="../style.css" rel="stylesheet">

</head>
<header>

</header>
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
    ?>
    <html>
    <img src="https://http.cat/401">
    <a href="../login-system/login.html">Logg inn som administrator</a>
    <style>
        html {
            background-color: black;
        }
        img {
            margin: auto;
        }
        a {
            color: aliceblue;
            text-decoration: none;
            background-color: dimgrey;
            padding: 5px;
            border-radius: 5px;
        }
    </style>
    </html>
<?php
}


