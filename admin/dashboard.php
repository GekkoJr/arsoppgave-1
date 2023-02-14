<?php
session_start();
if ($_SESSION['id'] === 5) {
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
    <h2>Velkommen tilbake </h2>
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


