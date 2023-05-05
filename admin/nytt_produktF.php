<?php
session_start();
error_reporting(0);
if ($_SESSION['admin']) {
    ?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nytt produkt</title>
</head>
<body>
    <form action="nytt_produkt.php" method="post" enctype="multipart/form-data" class="nytt-produkt">
        <label>Produktnavn &#8205 &#8205 &#8205 &#8205 &#8205
        <input type="text" placeholder="Asus gtx 1070" name="pNavn"></label>
        <label>
            Kort beskrvelse
            <input type="text" placeholder="8Gb vram zoom" name="minibeskriv">
        </label>
        <label>Full beskrivelse
            <input type="text" placeholder="Dette produktet..." name="beskriv">
        </label>
        <label>
            Pris &#8205 &#8205 &#8205 &#8205 &#8205 &#8205 &#8205 &#8205 &#8205 &#8205 &#8205 &#8205 &#8205 &#8205 &#8205 &#8205 &#8205 &#8205
             &#8205 &#8205 &#8205
            <input type="number" placeholder="420.69" name="pris">
        </label>
        <label>
            Antall på lager &#8205 &#8205
            <input type="text" placeholder="30" name="Antall">
        </label>
        <p>Last opp produkt bilder:</p>
        <input type="file" name="uploadImg[]" id="uploadImg" multiple>
        <button class="generic-button" type="submit" name="upload">Last opp</button>
    </form>

</body>
</html>
<?php
} else {
    include("../komponenter/unathorized.html");
}
?>


