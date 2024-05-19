<?php
session_start();
include "../Models/Connection.php";
$id = $_GET['id'];
$sql = "SELECT * from testhuman where PersonID = '$id'";
$result = $databaseObj->FetchAll($sql);
