<?php
session_start();
$error_type = "";
$error_message = "";
if (isset($_SESSION['user'])) {
    echo "<script>alert('You have already logged in');</script>";
    echo "<script>window.location.href = '../../';</script>";
    exit();
}
if (isset($_POST["submit"])) {
    $account = $_POST["account"];
    $password = $_POST["password"];
    //if password length is lower than 8 then error message will be displayed
    if (strlen($password) < 8) {
        $error_type = "password";
        $error_message="Password must be at least 8 characters long";
        
    }
    //if account length is lower than 8 then error message will be displayed
    else if (strlen($account) < 8) {
        $error_type = "account";
        $error_message="Account must be at least 8 characters long";
    } 
    //if account and password are correct then user will be redirected to the home page
    else {
        //check from db if the entered account and password are correct
        $sql = "SELECT * from logininfo WHERE Account= '$account' and Password= '$password' ";
        $result = $databaseObj->FetchAll($sql);

        if (!empty($result)) {
            $_SESSION["user"] = $account;
            $_SESSION["isAdmin"] = $result[0]["isAdmin"];
            header("Location: ../../");
            exit;
        } 
        else {
            $error_type = "incorrect";
            $error_message = "Incorrect account or password";
        }
    }
}
