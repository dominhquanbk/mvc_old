<?php
session_start();
$error_message = "";
$success_message = "";
include "../Models/Connection.php";
if (!isset($_SESSION['user']) || $_SESSION['isAdmin'] == 0) {
    $_SESSION['message'] = 'You do not have permission to access this page';
    
    header("Location: ../../index.php");
    exit();
}
$id = $_GET['id'];
$sql = "SELECT * from testhuman where PersonID = '$id'";
$result = $databaseObj->FetchAll($sql);

if (isset($_POST["submit"])) {
    if (empty($_POST["FirstName"]) || empty($_POST["LastName"])  || empty($_POST["Address"]) || empty($_POST["City"])) {
        // Alert the user
        $error_message = "please input all the fields";
        //no image
    } else if (empty($_FILES["Image"]["name"])) {
        $firstName = $_POST["FirstName"];
        $lastName = $_POST["LastName"];
        $address = $_POST["Address"];
        $city = $_POST["City"];
        $sql = "UPDATE testhuman SET FirstName='$firstName', LastName='$lastName', Address='$address', City='$city' WHERE PersonID='$id'";
        $databaseObj->Query($sql);
        $success_message = "Successfully Added";

        //have image
    } else {

        $check = getimagesize($_FILES["Image"]["tmp_name"]);
        if ($check === false) {
            $error_message = "File is not an image.";
        } else {
            $firstName = $_POST["FirstName"];
            $lastName = $_POST["LastName"];
            $Image = $_FILES['Image']['tmp_name'];  // Temporary location of the uploaded file
            $imageData = file_get_contents($Image);  // Read the contents of the file
            $imageData = base64_encode($imageData);  // Encode the binary data into a base64 string
            $address = $_POST["Address"];
            $city = $_POST["City"];
            $sql = "UPDATE testhuman SET FirstName='$firstName', LastName='$lastName', Address='$address', City='$city', Image='$imageData' WHERE PersonID='$id'";
            $databaseObj->Query($sql);

            $success_message = "Successfully Added";
            // header("Location: " . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
            // exit();
        }
    }
}
