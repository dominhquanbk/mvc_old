<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">


            <?php if (!isset($_SESSION["user"])) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="App/Views/Login.php">Login</a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">ようこそ！ <?php echo $_SESSION["user"] ?> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="App/Controllers/Logout.php">Log Out</a>
                </li>
            <?php endif; ?>

            <?php if (isset($_SESSION["user"]) && $_SESSION["isAdmin"] == 1) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="App/Views/Add_Database.php">Add <span class="sr-only"></span></a>
                </li>
            <?php endif ?>



        </ul>

    </div>
</nav>