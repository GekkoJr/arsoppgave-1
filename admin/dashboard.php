<?php
session_start();
include('../tilkoble.php');
$connect->select_db('users');
if ($_SESSION['admin'] === true || $_SESSION['ordePerson'] === true) {

    $itemsPerPage = 24;

    ?>
    <!DOCTYPE html>
    <html>
    <body>
    <head>
        <meta name="viewport" content="width=initial-scale, initial-scale">
        <meta charset="UTF-8"/>
        <title>Admin dashboard</title>
        <link href="../style.css" rel="stylesheet">

    </head>
    <?php include("../komponenter/header.html"); ?>
    <main>
        <h2>Velkommen tilbake
            <?php
            $id = $_SESSION['id'];
            $personNavn = mysqli_query($connect, "SELECT navn FROM brukere WHERE ID='$id'");
            $personNavn = mysqli_fetch_array($personNavn, MYSQLI_ASSOC);
            echo $personNavn['navn']
            ?>
        </h2>

        <div class="tabcontainer">
            <div>
                <h3 class="tab">Nye-ordre</h3>
                <h3 class="tab">ordre</h3>
                <?php
                if ($_SESSION['admin'] === true) {
                    ?>
                    <h3 class="tab">Brukere</h3>
                    <?php
                }
                ?>
                <h3 class="tab">Din info</h3>
            </div>
            <div class="tab-con">
                <?php
                $page = 1;
                $query = "SELECT * FROM ordre WHERE status = 'mottat'";
                $result = mysqli_query($connect, $query);
                $result = mysqli_fetch_array($result, MYSQLI_ASSOC);

                for ($i = $page; $i <= $page * $itemsPerPage; $i++) {
                    ?>
                    <div class="ordre-container">
                        <div class="ordre-info"></div>
                    </div>

                    <?php
                }

                ?>
            </div>
            <div class="tab-con">

            </div>
            <?php
            if ($_SESSION['admin'] === true) {
                ?>
                <div class="tab-con">

                </div>
                <?php
            }
            ?>
            <div class="tab-con">

            </div>
        </div>
        <script src="/js/tabs.js"></script>
    </main>
    </body>
    </html>
    <?php
} else {
    include("../komponenter/unathorized.html");
}


