<?php
session_start();
// dette er en ddel av update_mengde.js og endrer det faktisk
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents("php://input");
    $data = json_decode($json);

    $mengde = $data->string;
    $mengde = explode(',', $mengde);

    unset($_SESSION['mengde']);
    $_SESSION['mengde'] = $mengde;
}


