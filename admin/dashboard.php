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
                $rowCount = mysqli_num_rows($result);
                $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

                if($page * $itemsPerPage > $rowCount) {
                    $forLong = $rowCount;
                } else {
                    $forLong = $itemsPerPage * $page;
                }

                for ($i = $page; $i <= $forLong; $i++) {
                    ?>
                    <div class="ordre-container">
                        <div class="ordre-info">
                            <h3>
                                Ordre:
                                <?php echo $result[$i -1]['ordreNr'] ?>
                            </h3>
                            <h3>
                                <?php
                                if ($result[$i-1]['Navn'] !== null) {
                                    echo $result[$i-1]['Navn'];
                                } else {
                                    $id = $result[$i-1]['kundeID'];
                                    $query = "SELECT * FROM brukere WHERE id = '$id'";
                                    $kundeArr = mysqli_query($connect ,$query);
                                    $kundeArr = mysqli_fetch_array($kundeArr, MYSQLI_ASSOC);

                                    echo $kundeArr['navn'] . " " . $kundeArr['etternavn'];
                                }
                                ?>
                            </h3>
                            <p><?php echo $result[$i-1]['addresee'] . " " . $result[$i-1]['city'] . " " . $result[$i-1]['postnr']?></p>
                            <p id="<?php echo "part1dropdown" . $i?>">&#8595;</p>
                        </div>

                        <div class="ordre">
                            <div class="ordre-produkt">
                                <p></p>
                                <p>Navn</p>
                                <p>Antall</p>
                                <P></P>
                            </div>
                            <?php
                            $produktArr = $result[$i-1]['produkter'];
                            $produktArr = explode(',', $produktArr);
                            $antallArr = $result[$i-1]['antall'];
                            $antallArr = explode(',', $antallArr);

                            $proIndex = 0;
                            foreach ($produktArr as $element) {
                                ?>

                                <?php
                                $proIndex++;
                            }
                            ?>

                        </div>
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


