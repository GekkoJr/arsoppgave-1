<?php
session_start();
error_reporting(1);


if ($_SESSION['admin'] === true) {
    $userToEdit = $_GET['user'];

    include("../komponenter/userInfo.php");

} else {
    include('../komponenter/unathorized.html');
}

