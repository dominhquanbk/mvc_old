<?php
include "../Controllers/Add_Database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Add Person</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../../">Home <span class="sr-only">(current)</span></a>
                </li>
                <?php if (!isset($_SESSION["user"])) : ?>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="../Views/Login.php">Login</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../Controllers/Logout.php">Log Out</a>
                    </li>
                <?php endif; ?>
                <?php  ?>


            </ul>

        </div>
    </nav>

    <div style="width: 50%; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <form method="POST" enctype="multipart/form-data">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="formGroupExampleInput">FirstName</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="FirstName" placeholder="FirstName">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">LastName</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="LastName" placeholder="LastName">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput4">Address</label>
                    <input type="text" class="form-control" id="formGroupExampleInput4" name="Address" placeholder="Address">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput5">City</label>
                    <input type="text" class="form-control" id="formGroupExampleInput5" name="City" placeholder="City">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput6">Image</label>
                    <input type="file" class="form-control" id="formGroupExampleInput6" name="Image" placeholder="Image">
                    <p style='color:red; text-align:center' id='error'><?php echo $error_message; ?></p>
                    <p style='color:green; text-align:center' id='error'><?php echo $success_message; ?></p>
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Submit form</button>
            </form>
        </form>
    </div>
</body>

</html>