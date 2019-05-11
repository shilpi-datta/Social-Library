<div class="jumbotron" style="margin:0;padding:0">
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="images/library-icon.png" style="float:right">
            </div>
            <div class="col" style="float:left;padding-top:65px;margin-left:-40px">
                <h1>Social Library</h1>
                <p>Lend your unused book to help others</p>
            </div>
        </div>
    </div>
</div>

<!-- Content here -->

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <?php

                if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                    ?>
                    <!--<li class="nav-item">
                                    <a class="nav-link" href="logout.php">Logout</a>
                                </li> -->

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            <?= $_SESSION["user_name"] ?>
                        </a>
                        <div class="dropdown-menu">

                            <a class="dropdown-item" href="lend.php"> Lend Books </a>
                            <a class="dropdown-item" href="index.php"> Borrow Books </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="borrowed.php"> Borrowed Books </a>
                            <a class="dropdown-item" href="mybooks.php"> My Books </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php"> Logout </a>

                        </div>
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <?php
                        if (isset($locality)) {
                            echo $locality;
                        } else {
                            echo "Select Area";
                        }
                        ?>
                    </a>
                    <div class="dropdown-menu">
                        <?php
                        $sql = "SELECT distinct locality FROM `users`";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <a class="dropdown-item" href="index.php?locality=<?= $row["locality"] ?>"><?= $row["locality"] ?></a>
                            <?php
                        }
                    }
                    ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>