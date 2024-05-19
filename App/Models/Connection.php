<?php
require_once __DIR__ . '../../../vendor/autoload.php';

$servername = "localhost";
$username = "minhquan";
$password = "qazwsx12";
$database = "training_php";

$databaseObj = new Database($servername, $username, $password, $database);
$databaseObj->connect();
