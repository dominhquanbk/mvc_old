<?php
session_start();
$error_type = '';
$error_message="";
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
        $error_message = "Password must be at least 8 characters long";
    }
    //if account length is lower than 8 then error message will be displayed
    else if (strlen($account) < 8) {
        $error_type = "account";
        $error_message = "Account must be at least 8 characters long";
    } 
    else {
        $sql = "SELECT * from logininfo WHERE Account= '$account' ";


        $result = $databaseObj->FetchAll($sql);

        if (!empty($result)) {

            $error_type = 'existed';
            $error_message="Account already exists";
        } else {
            $sql = "INSERT logininfo VALUES ('$account','$password',0)";
            $databaseObj->Query($sql);
            echo "<script>alert('Succeed');</script>";
            echo "<script>window.location.href = '../Views/Login.php';</script>";
        }
    }
}
