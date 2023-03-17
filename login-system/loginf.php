<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <title>Login</title>
</head>

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