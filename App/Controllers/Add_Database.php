<?php
session_start();
$error_message = "";
$success_message="";
include "../Models/Connection.php";

if (!isset($_SESSION['user']) || $_SESSION['isAdmin'] == 0) {
    $_SESSION['message'] = 'You do not have permission to access this page';

    header("Location: ../../index.php");
    exit();
}
if (isset($_POST["submit"])) {
    // Check if any field is empty
    if (empty($_POST["FirstName"]) || empty($_POST["LastName"])  || empty($_POST["Address"]) || empty($_POST["City"]) || empty($_FILES["Image"]["name"])) {
        // Alert the user
        $error_message = "Please input all the fields";
    } else {
        $check = getimagesize($_FILES["Image"]["tmp_name"]);
        if ($check === false) {
            $error_message = "File is not an image.";
        }
        // Retrieve form data
        else {
            $firstName = $_POST["FirstName"];
            $lastName = $_POST["LastName"];
            //check if the file is image or not, if not then alert the user

            $Image = $_FILES['Image']['tmp_name'];  // Temporary location of the uploaded file
            $imageData = file_get_contents($Image);  // Read the contents of the file
            $imageData = base64_encode($imageData);  // Encode the binary data into a base64 string
            $address = $_POST["Address"];
            $city = $_POST["City"];

            // Prepare SQL statement
            $sql = "INSERT INTO testhuman (FirstName, LastName, PersonID, Address, City, Image) VALUES (" .
                "'" . $_POST["FirstName"] . "', '" . $_POST["LastName"] . "', 'NULL', '" . $_POST["Address"] . "', '" . $_POST["City"] . "','$imageData')";
            // Execute the SQL statement
            $databaseObj->Query($sql);
            $success_message = "Successfully added a new person";
        }
    }
}
