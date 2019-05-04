<div class="jumbotron text-center" style="margin-bottom:0">
    <h1>Social Library</h1>
    <p>Lend your unused book to help others</p>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="#">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <?php

            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                // echo "Welcome " . $_SESSION["user_name"];
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            <?php
        } else {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            <?php
        }
        ?>
        </ul>
    </div>
</nav>