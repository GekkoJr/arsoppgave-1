<?php
session_start();
include('../tilkoble.php');
$connect->select_db('users');;
if ($_SESSION['admin'] === true || $_SESSION['ordePerson'] === true) {

    $itemsPerPage = 24;

    ?>
    <!DOCTYPE html>
    <html>
    <?php
    $title = "Admin dashboard";
    include('../komponenter/meta.php');
    ?>
    <body>
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
                <h3 class="tab">fullførte-ordre</h3>
                <?php
                if ($_SESSION['admin'] === true) {
                    ?>
                    <h3 class="tab">Brukere</h3>
                    <h3 class="tab">Legg til produkt</h3>
                    <?php
                }
                ?>
                <h3 class="tab">Din info</h3>
            </div>
            <div class="tab-con">
                <div class="main-ordre-container">
                    <?php

                    if ($_GET['page1']) {
                        $page = $_GET['page1'];
                    } else {
                        $page = 1;
                    }
                    $query = "SELECT * FROM ordre WHERE status = 'mottat'";
                    $result = mysqli_query($connect, $query);
                    $rowCount = mysqli_num_rows($result);
                    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    if ($page * $itemsPerPage > $rowCount) {
                        $forLong = $rowCount;
                    } else {
                        $forLong = $itemsPerPage * $page;
                    }

                    $startValue = ($page - 1) * $itemsPerPage;
                    if ($startValue === 0) {
                        $startValue = 1;
                    }

                    for ($i = $startValue; $i <= $forLong; $i++) {
                        ?>
                        <div class="ordre-container">
                            <div class="ordre-info dropdown-activate">
                                <div>
                                    <h3>
                                        Ordre:
                                        <?php echo $result[$i - 1]['ordreNr'] ?>
                                    </h3>
                                    <h3>
                                        <?php
                                        if ($result[$i - 1]['Navn'] !== null) {
                                            echo $result[$i - 1]['Navn'];
                                        } else {
                                            $id = $result[$i - 1]['kundeID'];
                                            $query = "SELECT * FROM brukere WHERE id = '$id'";
                                            $kundeArr = mysqli_query($connect, $query);
                                            $kundeArr = mysqli_fetch_array($kundeArr, MYSQLI_ASSOC);

                                            echo $kundeArr['navn'] . " " . $kundeArr['etternavn'];
                                        }
                                        ?>
                                    </h3>
                                </div>
                                <p><?php echo "Addresse: " . $result[$i - 1]['addresee'] . " " . $result[$i - 1]['city'] . " " . $result[$i - 1]['postnr'] ?></p>
                                <p>&#8595;</p>
                            </div>

                            <div class="ordre dropdown-content">
                                <div class="ordre-produkt">
                                    <p>Navn</p>
                                    <p>Antall</p>
                                    <P></P>
                                </div>
                                <?php
                                $produktArr = $result[$i - 1]['produkter'];
                                $produktArr = explode(',', $produktArr);
                                $antallArr = $result[$i - 1]['antall'];
                                $antallArr = explode(',', $antallArr);

                                $proIndex = 0;
                                foreach ($produktArr as $element) {
                                    $query = "SELECT * FROM produkter WHERE proID = '$element'";
                                    $produkt = mysqli_query($connect, $query);
                                    $produkt = mysqli_fetch_array($produkt, MYSQLI_ASSOC);

                                    ?>
                                    <div class="ordre-produkt">
                                        <p><?php echo $produkt['proNavn'] ?> </p>
                                        <p><?php echo $antallArr[$proIndex] ?></p>
                                        <input type="checkbox">
                                    </div>

                                    <?php
                                    $proIndex++;
                                }
                                ?>
                                <a href="completeOrder.php?item=<?php echo $result[$i-1]['ordreNr'] ?>">
                                <button class="generic-button">fullfør ordre</button>
                                </a>
                            </div>
                        </div>

                        <?php
                    }
                    ?>
                    <div class="sidevalg">
                        <a href="dashboard.php?page1=<?php echo $page - 1 ?>"><p>-</p></a>
                        <p><?php echo $page ?></p><a href="dashboard.php?page1=<?php echo $page + 1 ?>"><P>+</P></a>
                    </div>

                </div>
            </div>
            <div class="tab-con">
                <div class="main-ordre-container">
                    <?php

                    if ($_GET['page2']) {
                        $page2 = $_GET['page2'];
                    } else {
                        $page2 = 1;
                    }
                    $query = "SELECT * FROM ordre WHERE status = 'fullført'";
                    $result = mysqli_query($connect, $query);
                    $rowCount = mysqli_num_rows($result);
                    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    if ($page2 * $itemsPerPage > $rowCount) {
                        $forLong = $rowCount;
                    } else {
                        $forLong = $itemsPerPage * $page2;
                    }

                    $startValue = ($page2 - 1) * $itemsPerPage;
                    if ($startValue === 0) {
                        $startValue = 1;
                    }

                    for ($i = $startValue; $i <= $forLong; $i++) {
                        ?>
                        <div class="ordre-container">
                            <div class="ordre-info dropdown-activate">
                                <div>
                                    <h3>
                                        Ordre:
                                        <?php echo $result[$i - 1]['ordreNr'] ?>
                                    </h3>
                                    <h3>
                                        <?php
                                        if ($result[$i - 1]['Navn'] !== null) {
                                            echo $result[$i - 1]['Navn'];
                                        } else {
                                            $id = $result[$i - 1]['kundeID'];
                                            $query = "SELECT * FROM brukere WHERE id = '$id'";
                                            $kundeArr = mysqli_query($connect, $query);
                                            $kundeArr = mysqli_fetch_array($kundeArr, MYSQLI_ASSOC);

                                            echo $kundeArr['navn'] . " " . $kundeArr['etternavn'];
                                        }
                                        ?>
                                    </h3>
                                </div>
                                <p><?php echo "Addresse: " . $result[$i - 1]['addresee'] . " " . $result[$i - 1]['city'] . " " . $result[$i - 1]['postnr'] ?></p>
                                <p>&#8595;</p>
                            </div>

                            <div class="ordre dropdown-content">
                                <div class="ordre-produkt">
                                    <p>Navn</p>
                                    <p>Antall</p>
                                    <P></P>
                                </div>
                                <?php
                                $produktArr = $result[$i - 1]['produkter'];
                                $produktArr = explode(',', $produktArr);
                                $antallArr = $result[$i - 1]['antall'];
                                $antallArr = explode(',', $antallArr);

                                $proIndex = 0;
                                foreach ($produktArr as $element) {
                                    $query = "SELECT * FROM produkter WHERE proID = '$element'";
                                    $produkt = mysqli_query($connect, $query);
                                    $produkt = mysqli_fetch_array($produkt, MYSQLI_ASSOC);

                                    ?>
                                    <div class="ordre-produkt">
                                        <p><?php echo $produkt['proNavn'] ?> </p>
                                        <p><?php echo $antallArr[$proIndex] ?></p>
                                        <input type="checkbox">
                                    </div>

                                    <?php
                                    $proIndex++;
                                }
                                ?>
                            </div>
                        </div>

                        <?php
                    }
                    ?>
                    <div class="sidevalg">
                        <a href="dashboard.php?page2=<?php echo $page2 - 1 ?>"><p>-</p></a>
                        <p><?php echo $page2 ?></p><a href="dashboard.php?page2=<?php echo $page2 + 1 ?>"><P>+</P></a>
                    </div>

                </div>
            </div>
        </div>
        <?php
        if ($_SESSION['admin'] === true) {
            ?>
            <div class="tab-con">
                <?php
                if ($_GET['page3']) {
                    $page3 = $_GET['page3'];
                } else {
                    $page3 = 1;
                }
                $query = "SELECT * FROM brukere";
                $result = mysqli_query($connect, $query);
                $rowCount = mysqli_num_rows($result);
                $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

                if ($page3 * $itemsPerPage > $rowCount) {
                    $forLong = $rowCount;
                } else {
                    $forLong = $itemsPerPage * $page3;
                }

                $startValue = ($page3 - 1) * $itemsPerPage;
                if ($startValue === 0) {
                    $startValue = 1;
                }

                ?>
                <div class="table-container">
                    <table>
                        <tr>
                            <th>KundeID</th>
                            <th>Fornavn</th>
                            <th>Etternavn</th>
                            <th>Epost</th>
                            <th>Ordre Rettigheter</th>
                            <th>Admin</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                        for ($i = $startValue; $i <= $forLong; $i++) {
                            ?>
                            <tr>
                                <td><?php echo $result[$i - 1]['ID'] ?></td>
                                <td><?php echo $result[$i - 1]['navn'] ?></td>
                                <td><?php echo $result[$i - 1]['etternavn'] ?></td>
                                <td><?php echo $result[$i - 1]['mail'] ?></td>
                                <td><?php echo $result[$i - 1]['ordePerson'] ?></td>
                                <td><?php echo $result[$i - 1]['admin'] ?></td>
                                <td><a href="<?php echo "editUser.php?user=" . $result[$i - 1]['ID'] ?>"><button>Rediger</button></a> </td>

                            </tr>
                            <?php
                        }

                        ?>
                    </table>
                    <div class="sidevalg">
                        <a href="dashboard.php?page3=<?php echo $page3 - 1 ?>"><p>-</p></a>
                        <p><?php echo $page3 ?></p><a href="dashboard.php?page3=<?php echo $page3 + 1 ?>"><P>+</P></a>
                    </div>
                </div>
            </div>
            <div class="tab-con">
                <?php
                include('nytt_produktF.php');
                ?>

            </div>

            <?php
        }
        ?>
        <div class="tab-con">
            <?php
            $userToEdit = $_SESSION['id'];
            include("../komponenter/userInfo.php")

            ?>
        </div>
        </div>
        <script src="/js/dropdown.js"></script>
        <script src="/js/tabs.js"></script>
    </main>
    </body>
    </html>
    <?php
} else {
    include("../komponenter/unathorized.html");
}


