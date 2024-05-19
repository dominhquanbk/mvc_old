<?php

if (isset($_SESSION['user'])) {
    echo "<script>alert('You have already logged in');</script>";
    echo "<script>window.location.href = '../../';</script>";
    exit();
}

include "../../../MVC/App/Models/Connection.php";
include "../../../MVC/App/Controllers/Login.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="../Bootstrap/draw2.png" class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form method="POST">
                        <!-- Email input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="text" id="form1Example13" class="form-control form-control-lg <?php echo $error_type == 'account' ? 'border-danger' : ''; ?>" name="account" />
                            <label class="form-label" for="form1Example13">Account</label>
                        </div>

                        <!-- Password input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" id="password" class="form-control form-control-lg <?php echo $error_type == 'password' ? 'border-danger' : ''; ?>" name="password" />
                            <label class="form-label" for="password">Password</label>
                        </div>
                        <!-- add div to display the error -->
                        <div class="form-outline mb-4">
                            <p style='color:red; text-align:center' id='error'><?php echo $error_message; ?></p>
                        </div>


                        <!-- Submit button -->
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" name="submit">Sign in</button>
                        <!-- signup -->
                        <div style="display: flex; justify-content: space-between;">
                            <a href="../Views/Signup.php">
                                <p> Don't have an account ? </p>
                            </a>
                            <a href="../../">
                                <p> Back to Home </p>
                            </a>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>