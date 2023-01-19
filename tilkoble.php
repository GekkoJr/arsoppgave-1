<?php

$connect = new mysqli("localhost", "gekk", "data base1");
if(mysqli_connect_error()) {
    die("Error connecting to database");
}
