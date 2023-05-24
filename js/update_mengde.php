<?php
session_start();
// dette er en ddel av update_mengde.js og endrer det faktisk
// om dette scripted blir påkalt med post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents("php://input");
    $data = json_decode($json);
    // henter data og gjør det til et array
    $mengde = $data->string;
    $mengde = explode(',', $mengde);

    // setter ny session produkt mengde
    unset($_SESSION['mengde']);
    $_SESSION['mengde'] = $mengde;
}


